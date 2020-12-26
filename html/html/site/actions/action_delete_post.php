<?php

session_start();
require_once("../database/init.php");
require_once("../database/posts.php");

$postid = $_POST["postid"];
deletePostByID($postid);
deleteCommentsOfPost($postid)

?>