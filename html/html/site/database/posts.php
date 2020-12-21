<?php
session_start();

function getAllPosts() 
{
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM forumpost');
  $stmt->execute();
  return $stmt->fetchAll();
}

function getPostbyID($postid)
{
   
  global $dbh;
   $stmt = $dbh->prepare('SELECT posttitle, content, username from forumpost where postid = ?');
   $stmt->execute(array($postid));
   return $stmt->fetch();

}
function getPostsByTopic($topic)
{

  global $dbh;
  $stmt = $dbh->prepare('SELECT postid, posttitle,content,topic FROM forumpost  WHERE topic = ?');
  $stmt->execute(array($topic));
  return $stmt->fetchAll();
}

function getPostbyTitle($title)
{

   global $dbh;   
   $stmt = $dbh->prepare('SELECT posttitle, content, username from forumpost where posttitle = ?');
   $stmt->execute(array($title));
   return $stmt->fetch();

}

function insertPosts($topic, $post_title, $content)
{
    
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO forumpost (topic, posttitle, content, username) VALUES (?, ?, ?, ?)');
    $stmt->execute(array($topic, $post_title, $content, $_SESSION["username"]));
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