<?php
session_start();
include("../database/init.php");
include("../database/collection.php");

$postid = $_POST["postid"];

$usercollection = findUserCollectionID($_SESSION["username"]);

 addPosttoCollection($postid, $usercollection["collectionid"]);
 header("location:" . $_SERVER['HTTP_REFERER']);



?>