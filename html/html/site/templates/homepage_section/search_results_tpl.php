<?php 
require_once("../database/comments.php"); 
require_once("../database/posts.php");
?>
<section id="posts">
  <h1> Search Results:</h1>
<article>
  <aside id="related">
   
   <?php foreach ($stories as $story) { ?>
   <article id = "recentArticles">
   
    <a href="../php/post.php?postid=<?php echo $story['postid'] ?>"><?php echo $story['posttitle'] ?></a>
    <p><?php echo $story['content'] ?></p>
    
    <p class="date"> Date: <?= $story['published'] ;?></p>
    
    <?php $numbOfComments = getTotalOfCommentsOnPost($story['postid']); ?>
    <p>Total Comments: <a href="../php/post.php?postitle=<?php echo $story['posttitle'] ?>&postid=<?php echo $story['postid']?>"> 
    <?php echo $numbOfComments; ?></a>

    <p>Post rate: <?php echo number_format($story["postrate"], 2, '.', ''); ?></p>  
   </article>
  </aside>
<?php  } ?>