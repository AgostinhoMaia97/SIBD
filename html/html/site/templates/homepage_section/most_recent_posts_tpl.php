<?php 
require_once("../database/comments.php"); 
?>

<section id="posts">
  <article>
  <aside id="related">
   <h1> Most Recent Posts</h1>
   <?php foreach ($stories as $story) { ?>
   <article>
   
    <a href="../php/post.php?postid=<?php echo $story['postid'] ?>"><?php echo $story['posttitle'] ?></a>
    <p><?php echo $story['content'] ?></p>
    
    <p class="date"><?= $story['published'] ;?></p>
    
    <?php $numbOfComments = getTotalOfCommentsOnPost($story['postid']); ?>
    <p>Total Comments: <a href="../php/post.php?postitle=<?php echo $story['posttitle'] ?>&postid=<?php echo $story['postid']?>"> 
    <?php echo $numbOfComments; ?></a>

    <p>Post rate: <?php echo number_format($story["postrate"], 2, '.', ''); ?></p>  
   </article>
  </aside>
<?php  } ?>