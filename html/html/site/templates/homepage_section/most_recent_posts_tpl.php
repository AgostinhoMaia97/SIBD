<section id="posts">
  <article>
  <aside id="related">
   
   <h1> Most Recent Posts</h1>
   <?php foreach ($stories as $story) { ?>
   <article>
   
       <h1><a href="../php/full_article.php"><?php echo $story["posttitle"]?></a></h1>
       <p><?php echo $story['story'] ?></p>
       
   </article>
  </aside>
<?php  } ?>