<?php
session_start();
require 'db.inc';
if ($username = $_SESSION['rmsusername']) {
    $password = $_SESSION['rmspassword'];
    $query = "SELECT password FROM admin WHERE username = '$username'";
    $getUser = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($getUser);
    $userPassword = $user['password'];

    if (!password_verify($password, $userPassword)) {
        header("Location: login.php");
    }
    
} else {
    header("Location: login.php");
}
mysqli_close($conn);