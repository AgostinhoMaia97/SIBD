<?php 
session_start();

function getUserPostRate($username)
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT AVG(postrate) as userpostrate from forumpost where username = ? ');
    $stmt->execute(array($username));
    return $stmt->fetch();

}

function getUserCommentRate($username)
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT AVG(commentrate) as usercommentrate from comment where username = ? ');
    $stmt->execute(array($username));
    return $stmt->fetch();
    
}

function insertPostinCollection($postid)
{
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO postcollection  (forumpostid) VALUES (?, ?, ?, ?)');
    $stmt->execute(array($postid, $content, $username, $published));

}
 
function getUserHistory($username)
{

    global $dbh;
    $stmt = $dbh->prepare('SELECT commentid, content, postid, published FROM comment WHERE username = ? ');
    $stmt->execute(array($username));
    return $stmt->fetchall();

}

function getTitlebyID($postid) 
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT  posttitle FROM forumpost WHERE postid = ? ');
    $stmt->execute(array($postid));
    return $stmt->fetch();

}

function IDofpostscommentedbyUser($username) 
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT postid, published, content from comment WHERE username = ?');
    $stmt->execute(array($username));
    return $stmt->fetchall();

}

?>