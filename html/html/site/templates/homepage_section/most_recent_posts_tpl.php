<section id="posts">
  <article>
  <aside id="related">
   
   <h1> Most Recent Posts</h1>
   <?php foreach ($stories as $story) { ?>
   <article>
   
    <a href="../php/post.php?postitle=<?php echo $story['posttitle'] ?>"><?php echo $story['posttitle'] ?></a>
    <p><?php echo $story['content'] ?></p>
    
       
   </article>
  </aside>
<?php  } ?>