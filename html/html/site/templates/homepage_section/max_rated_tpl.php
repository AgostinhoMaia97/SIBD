<aside id="maxrated">
        <h1> MAX RATED POSTS</h1>
        <article>
            <?php foreach($maxrates as $maxrated) {  ?>
              <p><a href="../php/post.php?postid=<?php echo $maxrated['postid'] ?>">
              <?php echo $maxrated['posttitle'] ?></a></p>
              <p>Post Rate = <?php echo number_format($maxrated['postrate'], 2, '.', ''); ?></p>
              
            <?php  } ?>
        </article>        
          
</aside> 