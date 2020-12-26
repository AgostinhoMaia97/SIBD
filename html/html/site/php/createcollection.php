<?php
session_start()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection creation</title>
</head>
    <h1> Time to create your collection of posts! </h1>
<body>

<form action='../actions/action_createpost.php' method = 'post'>
    <label>
         Collection name: <input type="text" name="name">
    </label>
    <?php  ?>
    <input type="submit" value="Create!">
     
</form>
</body>
</html>