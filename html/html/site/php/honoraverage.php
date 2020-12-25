<?php 
session_start();
require_once("../database/init.php");
require_once("../database/user.php");

$userpostrate = getUserPostRate($_SESSION["username"]);
$usercommentrate = getUserCommentRate($_SESSION["username"]);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honor Average Page</title>
    <h1> Welcome to <?php echo $_SESSION["username"] ?> Honor Page! </h1>
</head>
<body>
    <p> Currently your honor average is <?php echo (($userpostrate["userpostrate"] + $usercommentrate["usercommentrate"])/2); ?>

</body>
</html>