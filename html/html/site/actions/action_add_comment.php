<?php
session_start();

require_once("../database/init.php");
require_once("../database/posts.php");
require_once("../database/comments.php");

$content = $_POST["content"];
$postid = $_POST["postid"];
$username = $_SESSION["username"];

insertCommentsInPost($postid, $content, $username);
header("location:" . $_SERVER['HTTP_REFERER']);


?>