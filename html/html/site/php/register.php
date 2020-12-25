<?php 
session_start();
$msg = $_SESSION["msg"];
unset($_SESSION["msg"]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
   <header>
    <h1>Networking Forum</h1>
    <img src="../images/logo.png" alt = "logo">
   </header>   

    <section id="registration">
   <h2>Register</h2>
    <form action='../actions/action_register.php' method = 'post' enctype = "multipart/form-data">

     <label>
         Username: <input type="text" name="username">
     </label>
     
     <label>
        First Name: <input type="text" name="firstname">
    </label>

    <label>
        Last Name: <input type="text" name="lastname">
    </label>

    

    <label>
        Age: <input type="number" name="age">
    </label>

    <label>
        Email: <input type="text" name="email">
    </label>

    <label>
        Password: <input type="password" name="password">
    </label>
    <p></p>
    <input type="file" name = "pic">
    <input type="submit" value="SIGN UP">

    </form>

    <span> <?php echo $msg ?> </span>

</section>
    

    
</body>
</html>