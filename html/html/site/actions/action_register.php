<?php
require_once('../database/init.php');
require_once("../database/user.php");
session_start();


# access params from registration request

$username       =   $_POST['username'];
$firstname      =   $_POST['firstname'];
$lastname       =   $_POST['lastname'];
$age            =   $_POST['age'];
$email          =   $_POST['email'];
$password       =   $_POST['password'];


function insertUser($username, $firstname, $lastname, $age, $email, $password)
{
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO user(username, firstname, lastname, age, email, pwd) VALUES (?,?,?,?,?,?)');
    $stmt->execute(array($username, $firstname, $lastname, $age, $email, sha1($password)));
}

if(strlen($username) == 0) {
    $_SESSION["msg"] = "Invalid username!";
    header('Location: ../php/register.php');
    die();

}
/*
if(strlen($password) < 8) 
{
    $_SESSION["msg"] = "Password too short!";
    print_r("pass");
    header('Location: ../pages/register.php');
    die();


}
*/

try {
    insertUser($username, $firstname, $lastname, $age, $email, $password);
    saveProfilePic($username);
    $_SESSION["msg"] = "Registration successful!";
    header("Location: ../php/initialpage.php");

} catch(PDOException $e) {
    $err_msg = $e->getMessage();

    if(strpos($err_msg, "UNIQUE")) 
    {
        $_SESSION["msg"] = "Username already exists!";
    }
    else 
    {
        $_SESSION["msg"] = "Registration failed!";

    }

    header('Location: ../php/register.php');
}
?>
