<?php
session_start();

require_once("../database/init.php");
require_once("../database/posts.php");
require_once("../database/comments.php");

$content = $_POST["content"];
$postid = $_POST["postid"];
$username = $_SESSION["username"];
$published = date('Y-m-d H:i:s', time());

insertCommentsInPost($postid, $content, $username, $published);
//header("location:" . $_SERVER['HTTP_REFERER']);


?>