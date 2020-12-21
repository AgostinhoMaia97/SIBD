<?php

  function getTotalOfCommentsOnPost($postid){

    global $dbh;
    $stmt = $dbh->prepare('SELECT COUNT(comment.commentid) as numbOfComments FROM comment ');
    $stmt->execute();
    return $stmt->fetchAll();

  }
  
  function getCommentsByPostId($postid) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM comment JOIN user USING (username) WHERE postid = ?');
    $stmt->execute(array($postid));
    return $stmt->fetchAll();
  }
  
  function insertCommentsInPost($postid, $content, $username){
    
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO comment (postid, content, username) VALUES (?, ?, ?)');
    $stmt->execute(array($postid, $content, $username));
  
    
  }
?>