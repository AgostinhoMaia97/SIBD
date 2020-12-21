<?php 

require_once("../database/init.php");
require_once("../database/posts.php");


$postid= $_GET['postid'];
$rating = $_GET['rating'];


insertPostEvaluation($postid, $rating);

?>


<p>Thanks for rating! </p>