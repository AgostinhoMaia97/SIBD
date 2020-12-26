<?php 
require_once("../database/comments.php"); 
require_once("../database/posts.php");
?>

<section id="posts">

  <form id="search" action="../php/list_search_results.php">
    <input type="text" name="posttitle" placeholder="Forum Post Title">
    <input type="date" name="published" placeholder="Date of Post">
    <input type="text" name="minPostRate" placeholder="Minimum Post Rate">
    <input type="text" name="maxPostRate" placeholder="Maximum Post Rate">
    <input type="submit" value="Search">
  </form>

  <article>
  <aside id="mostRecent">
   <h3> Most Recent Posts</h3>
   <?php foreach ($stories as $story) { ?>
   <article>
   
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

  <div id="pagination">
      <a href="../php/initialpage.php?page=<?php echo $page-1; ?>">&lt;</a>
        <?php echo $page ?>
      <a href="../php/initialpage.php?page=<?php echo $page+1; ?>">&gt;</a>
  </div>