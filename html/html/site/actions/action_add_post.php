<?
    session_start();

    require_once("../database/init.php");
    require_once("../database/posts.php");

    $topic = $_POST["topic"];
    $post_title = $_POST["posttitle"];
    $content = $_POST["content"];
    //$preview = $_POST["preview"];
    $published = date('Y-m-d H:i:s', time());
    
    insertPosts($topic, $post_title, $content, $published);
    
?>
