<?php
    require_once("../database/init.php");
    require_once("../database/posts.php");
    require_once("../database/comments.php");
    include_once("../templates/homepage_section/header_pagina_inicial_tpl.php");

    
    $topic = $_GET["topic"]; 
    $n_posts = getNumberOfPostsByTopic($topic);
    $n_pages = ceil($n_posts/2);

    if(isset($_GET["page"])){
      $page = $_GET["page"];
        
        if($page < 1){
          $page = 1;
        }
        if($page > $n_pages){
          $page = $n_pages;
        }
    } else{
        $page = 1;
    }
    
    $articles = getPostsByTopic($topic, $page); 
    $postid = $_GET["postid"];
    
    include_once("../templates/homepage_section/list_by_topic_tpl.php");
    include_once("../templates/static_sections/footer_tpl.php");
 ?>


