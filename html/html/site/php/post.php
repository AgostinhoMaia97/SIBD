<?php 
require_once("../database/init.php");
require_once("../database/posts.php");


$title = $_GET['postitle'];
$result = getPostbyTitle($title);

?>

    <p>Title: <?php echo $result["posttitle"] ?></p>
    <p>Content: <?php echo $result["content"] ?></p>
    <p>Author: <?php echo $result["username"] ?></p>

<?php include_once("../templates/static_sections/footer_tpl.php"); ?>