<section id="posts">
<article>
<aside id="related">

    <h1> Search For Posts with Topic: <?php echo $topic;?> </h1>
    
    <?php foreach ($articles as $article) { ?>
            <article>
                <a href="../php/post.php?postid=<?php echo $article['postid'] ?>"><?php echo $article['posttitle'] ?></a>
                <p><?php echo $article['content'] ?></p>

                <p class="date"><?= $article['published'] ;?></p>

                <?php $numbOfComments = getTotalOfCommentsOnPost($article['postid']); ?>
                <p>Total Comments: <a href="../php/post.php?postitle=<?php echo $article['posttitle'] ?>&postid=<?php echo $article['postid']?>"> 
                <?php echo $numbOfComments; ?></a>

                <p>Post rate: <?php echo number_format($article["postrate"], 2, '.', ''); ?></p> 
    <?php  } ?>
</article>
</aside>
<div id="pagination">
      <a href="../php/list_by_topic.php?topic=<?php echo $topic;?>&page=<?php echo $page-1; ?>">&lt;</a>
        <?php echo $page ?>
      <a href="../php/list_by_topic.php?topic=<?php echo $topic;?>&page=<?php echo $page+1; ?>">&gt;</a>
</div>