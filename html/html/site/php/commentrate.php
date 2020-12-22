<?php 

require_once("../database/init.php");
require_once("../database/comments.php");


$commentid= $_GET['commentid'];
$commentrate = $_GET['commentrate'];

$commentrated = CheckifCommentRated($commentid);
if ($commentrated["number"] == NULL) 
{
    echo ("Thanks for rating the comment! You only can do this one time in each comment!"); ?>
    <form>
    <input type="button" value="Go back!" onclick="history.back()">
   </form>
   <?php insertCommentEvaluation($commentid, $commentrate); 
}

else 
{

   echo('You already rated this post!<br><a href="../php/initialpage.php">Click here</a> to return to the main page.');
}

?> 