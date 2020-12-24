<?php
session_start();

function createUsercollection($name, $username) 
{
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO collection (name, username) VALUES (?, ?)');
    $stmt->execute(array($name, $username));

}

function addPosttoCollection($postid, $collectionid) 
{
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO postcollection (forumpostid, collectionid) VALUES (?, ?)');
    $stmt->execute(array($postid, $collectionid));

}

function getCollectionID($name, $username) 
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT collectionid from collection WHERE name = ? AND username = ?');
    $stmt->execute(array($name, $username));
    return $stmt->fetch();

}

function checkifCollectionalreadycreated($username)
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT username from collection where username = ?');
    $stmt->execute(array($username));
    return $stmt->fetch();
}

 
?>