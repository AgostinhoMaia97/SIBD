<?php
  session_start();
  $msg = $_SESSION["msg"];
  unset($_SESSION["msg"]);
  require_once("../database/collection.php");
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
        <div id="menu-first">
          <div class="otherPages">
            <ul id = "listOtherPages">
              <li><a href="initialpage.php"> Home </a></li>
              
              <li><a href="../php/FAQ.php">FAQ</a></li>
              <li><a href="../php/contacts.php">Contacts</a></li>
              <li><a href="../php/aboutUs.php">About Us</a></li> 
          </ul> 
          </div>
        </div>

        <div id ="menu-signup">
          <div class = "signup">
            <?php if (isset($_SESSION["username"])) { ?>
             
            <?php }  else { ?> 
              <ul id = "signupOptions">
                <li><a href="register.php">Register</a></li>
              <?php } ?>
            
              <?php if (!isset($_SESSION["username"])) { ?>
                <li><a href="login.php">Login</a></li>
              <?php } else { ?>
                <form id = "logout" action="../actions/action_logout.php">
                  <img id = "profilePic" src="../images/users/<?php echo $_SESSION["username"] ?>.jpg" alt="profilepic">
                  <span> <?php echo $_SESSION["username"]; ?> </span>
                  <input type="submit" value="Logout">
              </form>
            
            <?php } ?>
            <span> <?php echo $msg ?> </span>
            </ul>
          </div>
        </div>
        
        
        <div id ="menu-features">
          <h1 id = "forumTitle"> FEUP Networking Forum </h1>  
          <div class = "features">
            <ul id = "listFeatures">  
              
              <?php if (isset($_SESSION["username"])) { ?>
                <li><a href="add_post.php"> Add Post </a></li>
                <li><a href="honoraverage.php"> Honor Average </a></li>
              <?php if (findUserCollectionID($_SESSION["username"])["collectionid"] != NULL) { ?>
                <li><a href="postcollection.php"> Check your Post Collection </a></li> 
              <?php  } else { ?>
                <li><a href="createcollection.php"> Create Post Collection </a></li>  
                  <?php } } ?>
            
            </ul> 
          </div>  
        </div>

</head>
<body>

