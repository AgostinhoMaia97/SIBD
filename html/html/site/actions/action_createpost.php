<?php 
session_start();
include("../database/init.php");
include("../database/collection.php");

$collectionname = $_POST["name"];
$collectionid= getCollectionID($collectionname, $_SESSION["username"]);
$check = checkifCollectionalreadycreated($_SESSION["username"]);

if($check["username"] == NULL) {
    createUsercollection($collectionname, $_SESSION["username"]);
    echo ("Thanks for creating your post collection!"); ?>
    <form>
      <input type="button" value="Go to initial page!" onclick=document.location.href="../php/initialpage.php" </input>
   </form>
<?php
} else {
    echo("As a user, you can only create one collection!");
}
?>