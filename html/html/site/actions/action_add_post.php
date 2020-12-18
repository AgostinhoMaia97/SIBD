<?

    require_once("../database/init.php");
    require_once("../database/posts.php");

    $post_title = $_POST["posttitle"];
    $story = $_POST["story"];
    $topic = $_POST["topic"];
    //$preview = $_POST["preview"];

    
    insertPosts($topic_name, $post_title, $story);
    insertTopic($topic);
    
?>
