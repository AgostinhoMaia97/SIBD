<?

    require_once("../database/init.php");
    require_once("../database/posts.php");

    $topic = $_POST["topic"];
    $post_title = $_POST["posttitle"];
    $content = $_POST["content"];
    //$preview = $_POST["preview"];

    
    insertPosts($topic, $post_title, $content);
    
?>
