<?php

  require_once("../database/init.php");
  require_once("../database/posts.php");
  require_once("../database/comments.php");
  include_once("../templates/homepage_section/header_pagina_inicial_tpl.php");
  include_once("../templates/homepage_section/topics_tpl.php");


  $posttitle = $_GET["posttitle"];
  $date = $_GET["published"];
  $minPostRate = $_GET["minPostRate"];
  $maxPostRate = $_GET["maxPostRate"];

  if(isset($posttitle) && isset($date) && isset($minPostRate) && isset($maxPostRate)){
    $stories = getPostsBySearch($posttitle, $date, $minPostRate, $maxPostRate);
  } else {
    $stories = getAllPosts($page);
  }

  $maxrates = getPostsWithBestRating();

  include_once("../templates/homepage_section/max_rated_tpl.php");
  include_once("../templates/homepage_section/search_results_tpl.php");
  include_once("../templates/static_sections/footer_tpl.php");
?>