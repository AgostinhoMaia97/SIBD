<?php
 
  require_once("../database/init.php");
  require_once("../database/posts.php");
  require_once("../database/comments.php");

  include_once("../templates/homepage_section/header_pagina_inicial_tpl.php");
  include_once("../templates/homepage_section/topics_tpl.php");
  
  $n_posts = getNumberOfPosts();
  $n_pages = ceil($n_posts/3);

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

    $stories = getAllPosts($page);
    $maxrates = getPostsWithBestRating();
  
  include_once("../templates/homepage_section/max_rated_tpl.php");
  include_once("../templates/homepage_section/most_recent_posts_tpl.php");
  include_once("../templates/static_sections/footer_tpl.php");
?>
