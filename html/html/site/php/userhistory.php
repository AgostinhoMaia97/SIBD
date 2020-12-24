<?php
session_start();
require_once("../database/init.php");
require_once("../database/user.php");

$idofpostscommentedbyUser = IDofpostscommentedbyUser($_SESSION["username"]);

?>

<section id="postscommented">
<h1> Posts in which you have commented! </h1>
<?php foreach($idofpostscommentedbyUser as $posts) { ?>
<p> Post: <?php echo(getTitlebyID($posts["postid"])["posttitle"]); ?></p>
<p> Comment Date: <?php echo($posts["published"]); ?>
<p> Comment Content: <?php echo($posts["content"]); ?> </p>
<a href="../php/post.php?postid=<?php echo $posts["postid"]?> ">Access it now!</a>


<?php } ?>


</section>