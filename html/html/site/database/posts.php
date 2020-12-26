<?php

function getAllPosts($page) 
{
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM forumpost ORDER BY published DESC LIMIT ? OFFSET ?');
  $stmt->execute(array(3, ($page-1)*3));
  return $stmt->fetchAll();
}

function getPostbyID($postid)
{
   
   global $dbh;
   $stmt = $dbh->prepare('SELECT posttitle, content, username,published from forumpost where postid = ?');
   $stmt->execute(array($postid));
   return $stmt->fetch();

}
function getPostsByTopic($topic, $page)
{

  global $dbh;
  $stmt = $dbh->prepare('SELECT postid, posttitle,content,topic, published, postrate FROM forumpost  
                          WHERE topic = ? ORDER BY published DESC LIMIT ? OFFSET ?');
  $stmt->execute(array($topic, 2, ($page-1)*2));
  return $stmt->fetchAll();
}

function getPostbyTitle($title)
{

   global $dbh;   
   $stmt = $dbh->prepare('SELECT posttitle, content, username from forumpost where posttitle = ?');
   $stmt->execute(array($title));
   return $stmt->fetch();

}

function insertPosts($topic, $post_title, $content, $published)
{
    
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO forumpost (topic, posttitle, content, username, published) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute(array($topic, $post_title, $content, $_SESSION["username"], $published));
    echo('Success!<br><a href="../php/add_post.php">Click here</a> to add more news.<br><a href="../php/initialpage.php">Click here</a> to return to the main page.');
}

function insertTopic($topic)
{
  
  global $dbh;
  
  $stmt = $dbh->prepare('INSERT INTO topic (name) VALUES (?)');
  $stmt->execute(array($topic));
}

function insertPostEvaluation($postid, $rating) 
{

  global $dbh;
  
  $stmt = $dbh->prepare('INSERT INTO postevaluation (username, postid, number) VALUES (?, ?, ?)');
  $stmt->execute(array($_SESSION["username"],$postid, $rating));
  
  
  $stmt = $dbh -> prepare( 'UPDATE forumpost
  SET
        postrate = (SELECT AVG(number) FROM postevaluation
                              WHERE postevaluation.postid = forumpost.postid )
  WHERE
      EXISTS (
          SELECT *
          FROM postevaluation
          WHERE postevaluation.postid = forumpost.postid
      )');
  $stmt->execute();

}

function getPostRate($postid) 
{

    global $dbh;
    
    $stmt = $dbh->prepare('SELECT postid, AVG(number) AS rating from postevaluation where postid = ?');
    $stmt->execute(array($postid));

    return $stmt->fetch();

}

function CheckifPostRated($postid)
{
  global $dbh;
    
  $stmt = $dbh->prepare('SELECT number from postevaluation where postid = ? AND username = ?');
  $stmt->execute(array($postid, $_SESSION["username"]));
  return $stmt->fetch();
  
}

function getPostsWithBestRating() {

  global $dbh;
    
  $stmt = $dbh->prepare('SELECT *  FROM forumpost ORDER BY forumpost.postrate DESC LIMIT 3');
  $stmt->execute();
  return $stmt->fetchAll();


}

function getNumberOfPosts(){
  global $dbh;
  $stmt = $dbh->prepare("SELECT COUNT(*) as count FROM forumpost");
  $stmt->execute();
  return $stmt->fetch()['count'];

}

function getNumberOfPostsByTopic($topic){
  global $dbh;
  $stmt = $dbh->prepare("SELECT COUNT(*) as TopicCounter FROM forumpost WHERE topic = ?");
  $stmt->execute(array($topic));
  return $stmt->fetch()['TopicCounter'];
}

function getPostsBySearch($title, $date, $minPostRate, $maxPostRate){
  global $dbh;
  $query = "SELECT * FROM forumpost WHERE published != ? ";
  $params = array(0);

    if($title != ''){
        $query = $query . " AND posttitle LIKE ?";
        $params[] = "%$title%";
    }
    if($date != ''){
        $query = $query . " AND published LIKE ?";
        $params[] = "%$date%";
    }
    if($minPostRate != ''){
        $query = $query . " AND postrate >= ?";
        $params[] = $minPostRate;
    }
    if($maxPostRate != ''){
      $query = $query . " AND postrate <= ?";
      $params[] = $maxPostRate;
  }
  $query = $query . " ORDER BY published DESC";
  
  $stmt = $dbh->prepare($query);
  $stmt->execute($params);
  return $stmt->fetchAll();

}

function deletePostByID($postid){

  global $dbh;
  $stmt = $dbh->prepare('DELETE FROM forumpost WHERE postid = ?');
  $stmt->execute(array($postid));
  echo('Success!<br>Your post was removed!<br><a href="../php/initialpage.php">Click here</a> to return to the main page.');

}

function deleteCommentsOfPost($postid){
  global $dbh;
  $stmt = $dbh->prepare('DELETE FROM comment WHERE postid = ?');
  $stmt->execute(array($postid));

}