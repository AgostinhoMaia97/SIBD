<?php 
require_once("../database/init.php");
require_once("../database/posts.php");


$postid= $_GET['postid'];
$rating = $_GET['rating'];

$rated = CheckifPostRated($postid);
if ($rated["number"] == NULL) 
{
    ?> <h1> Thanks for rating! You only can do this one time in each post!  <form>
    <input type="button" value="Go back!" onclick="history.back()">
   </form><h1> <?php
    insertPostEvaluation($postid, $rating);
}

else 
{
    header("Location: ../php/initialpage.php");
}
?>
