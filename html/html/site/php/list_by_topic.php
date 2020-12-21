<?php
    require_once("../database/init.php");
    require_once("../database/posts.php");
    require_once("../database/comments.php");
    include_once("../templates/homepage_section/header_pagina_inicial_tpl.php");
    
?>

<section id="posts">
<article>
<aside id="related">

 <?php
    $postid = $_GET["postid"];
    $topic = $_GET["topic"]; 
    
 ?>
 <h1> <?php echo $topic;?> </h1>
 <?php $articles = getPostsByTopic($topic); ?>
 
 <?php foreach ($articles as $article) { ?>
        <article>
            <a href="../php/post.php?postid=<?php echo $article['postid'] ?>"><?php echo $article['posttitle'] ?></a>
            <p><?php echo $article['content'] ?></p>
            <p>Total Comments: <a href="../php/post.php?postitle=<?php echo $article['posttitle'] ?>&postid=<?php echo $article['postid']?>"> <?php print_r("99 coments") ?></a>
        </article>
       </aside>
 <?php  } ?>

 <?php
include_once("../templates/static_sections/footer_tpl.php");
 ?>


