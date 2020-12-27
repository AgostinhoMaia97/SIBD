<?php 
session_start();
require_once("../database/init.php");
require_once("../database/user.php");

$userpostrate = getUserPostRate($_SESSION["username"]);
$usercommentrate = getUserCommentRate($_SESSION["username"]);

?>


<!DOCTYPE html>
<html lang="en">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/honoraverage.css" />
    <title>Honor Average Page</title>
    <h1> Welcome to <?php echo $_SESSION["username"] ?> Honor Page! </h1>
    <h2> User Honor Average is calculated as the average between the rates that you achieve in your posts and the rates that you achieve in your comments. </h2>
</header>

<div id="star">
<img src="../images/star.png" alt="stars">
</div>

<body>
    <p> Currently your honor average is <?php echo (($userpostrate["userpostrate"] + $usercommentrate["usercommentrate"])/2); ?> !<p>

    <form>
      <input type="button" value="Go to initial page!" onclick=document.location.href="../php/initialpage.php" </input>
    </form>

</body>
</html>