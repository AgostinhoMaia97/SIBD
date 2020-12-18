<?php
  session_start();
  $msg = $_SESSION["msg"];
  unset($_SESSION["msg"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/initialpage.css" rel="stylesheet">
    <title>Networking Forum</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://www.newhorizons.com/Portals/278/EasyGalleryImages/206/4516/networking-basics.jpg" />

</head>
<body>
    <header>

        <h1> FEUP Networking Forum </h1>
        <div id="signup">
            
            <a href="register.php">Register</a>
            <?php if (!isset($_SESSION["username"])) { ?>
            <a href="login.php">Login</a>
            <?php } else { ?>
              <form action="../actions/action_logout.php">
                <span> <?php echo $_SESSION["username"]; ?> </span>
                <input type="submit" value="Logout">
              </form>
            
            <?php } ?>
            <span> <?php echo $msg ?> </span>

        </div>
        <div id="otherpages">
            <a href="initialpage.php"> Home </a>
            
            <a href="../php/FAQ.php">FAQ</a>
            <a href="../php/contacts.php">Contacts</a>
            <a href="../php/aboutUs.html">About Us</a> <br> <br>

            <?php if (isset($_SESSION["username"])) { ?>
                <a href="add_post.php"> Add Post </a>
            <?php } ?>
        </div>

</head>
<body>

