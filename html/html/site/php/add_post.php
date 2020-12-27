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

    <tr class = "topics">
      <td>Topic</td>
   
      <td> <input id = "SDN" type="radio" value ="SDN" name = "topic" required> SDN</td>
      <td> <input id = "VPN" type="radio" value ="VPN" name = "topic" required> VPN</td>
      <td> <input id = "WIRELESS" type="radio" value ="Wireless" name = "topic" required> WIRELESS</td>
    

    </tr>
  <table width="50%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Post Title</td>
      <td><textarea class = "postTitle" type="text" placeholder="Title" name = "posttitle" required></textarea></td>
    </tr>

    
    
      <td>Post Story</td>
      <td><textarea id = "postStory"type="text" placeholder ="Content" name = "content" required></textarea></td>
    </tr>
    
    <tr>
      <td colspan="4"><div align = "center">
            
            <input name="add" type="submit" id="add" value="Create Post!">
            <button type="submit" formaction="../php/initialpage.php" formnovalidate>Cancel</button>
      </div>
    </td>
    </tr>
  </table>
</form>

<?php include_once("../templates/static_sections/footer_tpl.php"); ?>