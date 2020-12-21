<?php
 
  require_once("../database/init.php");
  require_once("../database/posts.php");
  require_once("../database/comments.php");

  include_once("../templates/homepage_section/header_pagina_inicial_tpl.php");
  include_once("../templates/homepage_section/topics_tpl.php");
  
  $stories = getAllPosts();
 
  include_once("../templates/homepage_section/max_rated_tpl.php");
  include_once("../templates/homepage_section/most_recent_posts_tpl.php");
  include_once("../templates/static_sections/footer_tpl.php");
?>
