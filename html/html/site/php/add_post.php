<?php
session_start();
?>


<html>
<head>
<title>Add your Forum Post!</title>
<meta charset= "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/layoutAboutUs.css" />
</head>
<body>

<form name="form1" method="post" action="../actions/action_add_post.php">
  <table width="50%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Post Title</td>
      <td><textarea type="text" placeholder="Title" name = "posttitle"></textarea></td>
    </tr>

    <tr>
      <td>Topic</td>
      <td><textarea type="text" placeholder ="Topic" name = "topic"></textarea></td>
    </tr>
    
      <td>Post Story</td>
      <td><textarea type="text" placeholder ="Content" name = "content"></textarea></td>
    </tr>
    
    <tr>
      <td colspan="4"><div align = "center">
            
            <input name="add" type="submit" id="add" value="Create Post!">
            <button type="submit" formaction="../php/initialpage.php">Cancel</button>
      </div>
    </td>
    </tr>
  </table>
</form>

<?php include_once("../templates/static_sections/footer_tpl.php"); ?>