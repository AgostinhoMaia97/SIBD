<?php 
    require_once('../database/init.php');
    session_start();    


    # access request params
    $username = $_POST["username"];
    $password = $_POST["password"];

    # verify username/password
    function loginIsValid($username, $password) 
    {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * from user WHERE username=? AND pwd=?');
        $stmt->execute(array($username, sha1($password)));
        return $stmt->fetch();
    }

    # if login success 
    # - create session attribute for user
    # else
    # - set error msg: "Login failed"
    # either case, redirect to main page

    if(loginIsValid($username, $password))
    {
        $_SESSION["username"] = $username;
    }
    
    else
    {
        $_SESSION["msg"] = "Login failed!";
    }

    header("Location: ../php/initialpage.php");
?>