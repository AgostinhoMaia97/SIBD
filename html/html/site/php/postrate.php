<?php 
session_start();
require_once("../database/init.php");
require_once("../database/posts.php");


$postid= $_GET['postid'];
$rating = $_GET['rating'];

$rated = CheckifPostRated($postid);
if ($rated["number"] == NULL) 
{
 
    echo ("Thanks for rating the post! You only can do this one time in each post!"); ?>
    <form>
        <input type="button" value="Go back!" onclick="history.back()">
    </form>
    <?php
        insertPostEvaluation($postid, $rating);
}


else 
{
    echo('You already rated this post!<br><a href="../php/initialpage.php">Click here</a> to return to the main page.');
}
?>