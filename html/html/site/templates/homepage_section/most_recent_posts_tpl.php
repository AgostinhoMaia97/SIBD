<?php 
require_once("../database/comments.php"); 
?>

<section id="posts">
  <form id="search" action="list_products.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name="title" placeholder="Forum Post Title">
    <input type="text" name="date" placeholder="Date of Post">
    <input type="text" name="minPostRate" placeholder="Minimum Post Rate">
    <input type="submit" value="Search">
  </form>

  <article>
  <aside id="related">
   <h1> Most Recent Posts</h1>
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