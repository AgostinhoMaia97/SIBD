<?php
    
    require_once("../database/init.php"); 
    require_once("../database/news.php");
    include_once("../templates/static_sections/header_tpl.php"); 
    include_once("../templates/homepage_section/header_pagina_inicial.php");
    $keyword = $_GET['keyword'];
    $stories = getNewsByKeyword($keyword);

?>


<?php foreach ($stories as $story) { ?>
            <h1><?php $keyword ; ?></h1>            
            <article>

                <h1><a href="#"><?php echo $story["topic_name"]?></a></h1>
                <p><?php echo $story['story'] ?></p>
                
            </article>
<?php  }                             ?>



<?php include_once("../templates/static_sections/footer_tpl.php"); ?>