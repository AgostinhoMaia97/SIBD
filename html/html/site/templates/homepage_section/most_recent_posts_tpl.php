<section id="posts">
  <article>
  <aside id="related">
   
   <h1> Most Recent Posts</h1>
   <?php foreach ($stories as $story) { ?>
   <article>
   
    <a href="../php/post.php?postid=<?php echo $story['postid'] ?>"><?php echo $story['posttitle'] ?></a>
    <p><?php echo $story['content'] ?></p>
    <p>Total Comments: <a href="../php/post.php?postitle=<?php echo $story['posttitle'] ?>&postid=<?php echo $story['postid']?>"> <?php print_r("99 coments") ?></a>
       
   </article>
  </aside>
<?php  } ?>