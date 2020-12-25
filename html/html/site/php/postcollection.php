<?php 

session_start();
require_once("../database/init.php");
require_once("../database/collection.php");
require_once("../database/posts.php");
require_once("../database/user.php");



$usercollection = findUserCollectionID($_SESSION["username"]);
$postcollection = getAllPostsfromCollection($usercollection["collectionid"]);


?>

<h1> Welcome to <?php echo $_SESSION["username"] ?> Collection! </h1>


<?php foreach($postcollection as $post) { ?>

<a href="../php/post.php?postid=<?php echo $post["forumpostid"]?> "><?php echo (getTitlebyID($post["forumpostid"])["posttitle"]); ?> </a>

<?php } ?>

<form>
      <input type="button" value="Go to initial page!" onclick=document.location.href="../php/initialpage.php" </input>
</form>







