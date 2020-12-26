<?php 
session_start();

require_once("../database/init.php");
require_once("../database/posts.php");
require_once("../database/comments.php");
require_once("../database/collection.php");

include_once("../templates/homepage_section/header_pagina_inicial_tpl.php");

$postid = $_GET['postid'];
$result = getPostbyID($postid);
$postrate = getPostRate($postid);
$comments = getCommentsByPostId($postid);

?>
    <p> <br></p>
    <p>Title: <?php echo $result["posttitle"] ?></p>
    <br>
    <p>Content: <?php echo $result["content"] ?></p>
    <br>
    <p>Author: <?php echo $result["username"] ?></p>
    <br>
    <p class="date"> Date: <?= $result["published"] ;?></p>
    <br>

    <?php if (isset($_SESSION["username"])) { ?>
        <div class = "post-rate">
            Rate this article:
        <?php foreach(range(1,5) as $rating) { ?>
            <a href="../php/postrate.php?rating=<?php echo $rating ?>&postid=<?php echo $postid ?>"> <?php echo $rating; ?> </a>
        <?php  } } ?>

    <p> PostRate: <?php echo $postrate["rating"];?> </p>

    <?php if (isset($_SESSION["username"]) && (findUserCollectionID($_SESSION["username"])["collectionid"] != NULL) && checkIfPostAlreadyAdded($postid, findUserCollectionID($_SESSION["username"])["collectionid"]) == NULL)   { ?>
    <form name = "collectpost" method = "post" action = "../actions/action_collectpost.php">
        <input type="hidden" name="postid" value="<?php echo $postid?>">
        <button type="submit" >Add post to collection!</button> 
    </form>
    <?php } ?>
    
    <?php if($_SESSION["username"] == $result["username"]){ ?>
        <form name = "deletepost" method = "post" action="../actions/action_delete_post.php">
            <input type="hidden" name ="postid" value = "<?php echo $postid?>">
            <button type = "submit">Delete Forum Post</button>
        </form>     
    <?php } ?>
<?php
include_once("../templates/comments/list_comments_tpl.php"); 
include_once("../templates/static_sections/footer_tpl.php"); 
?>