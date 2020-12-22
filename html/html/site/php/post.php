<?php 
require_once("../database/init.php");
require_once("../database/posts.php");
require_once("../database/comments.php");

$postid= $_GET['postid'];
$result = getPostbyID($postid);
$postrate = getPostRate($postid);
$comments = getCommentsByPostId($postid);

?>

    <p>Title: <?php echo $result["posttitle"] ?></p>
    <p>Content: <?php echo $result["content"] ?></p>
    <p>Author: <?php echo $result["username"] ?></p>

    <?php if (isset($_SESSION["username"])) { ?>
        <div class = "post-rate">
            Rate this article:
        <?php foreach(range(1,5) as $rating) { ?>
            <a href="../php/postrate.php?rating=<?php echo $rating ?>&postid=<?php echo $postid ?>"> <?php echo $rating; ?> </a>
        <?php  } } ?>

    <p> PostRate: <?php echo $postrate["rating"];?> </p>

<?php
include_once("../templates/comments/list_comments_tpl.php"); 
include_once("../templates/static_sections/footer_tpl.php"); 
?>