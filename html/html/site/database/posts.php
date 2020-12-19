<?php
session_start();

function getAllPosts() 
{
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM forumpost');
  
  $stmt->execute();
  return $stmt->fetchAll();
}


function getPostsByTopic($topic){
  global $dbh;
  $stmt = $dbh->prepare('SELECT posttitle,content,topic FROM forumpost  WHERE topic = ?');
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
