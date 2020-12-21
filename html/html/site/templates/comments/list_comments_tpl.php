<?php
session_start();
?>

<section id="comments">
  <h1><?=count($comments)?> Comment<?=count($comments)==1?'':'s'?></h1>
  <?php foreach ($comments as $comment) { ?>
    <article class="comment">
      <span class="user"><?=$comment["username"] ?>:"</span>
      <span><?=$comment["content"]?>"</span>
    </article>
  <?php } ?>
  
  <?php if (isset($_SESSION["username"])) { ?>
    <form name = "formComments" method = "post" action = "../actions/action_add_comment.php">
      <h2>Add your Own Comment!</h2>
      
      <label>Comment:
        <textarea name="content"></textarea>
      </label>
      
      <input type="hidden" name="postid" value="<?php echo $_GET["postid"]?>">
      <input type="submit" value="Submit">
      <button type="submit" formaction="../php/initialpage.php">Cancel</button>
    </form>
  <?php  }  ?>
</section>