<?php
    require_once("../database/init.php");
    require_once("../database/posts.php");
    include_once("../templates/homepage_section/header_pagina_inicial_tpl.php");
    
?>

<section id="posts">
<article>
<aside id="related">

 <?php 
    $topic = $_GET["topic"]; 
    
 ?>
 <h1> <?php echo $topic;?> </h1>
 <?php $articles = getPostsByTopic($topic); ?>
 
 <?php foreach ($articles as $article) { ?>
        <article>
        
            <h1><a href="../php/post.php?postitle=<?php echo $article['posttitle'] ?>"><?php echo $article["posttitle"]?></a></h1>
            <p><?php echo $article["content"] ?></p>
            
        </article>
       </aside>
 <?php  } ?>

 <?php
include_once("../templates/static_sections/footer_tpl.php");
 ?>


