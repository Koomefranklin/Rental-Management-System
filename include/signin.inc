<?php
session_start();
require 'db.inc';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT password FROM admin WHERE username = '$username'";
$getUser = mysqli_query($conn, $query);

if (mysqli_num_rows($getUser) > 0) {
    $_SESSION['rmsusername'] = $username;
    $user = mysqli_fetch_assoc($getUser);
    $userPassword = $user['password'];
    if (password_verify($password, $userPassword)) {
        $_SESSION['rmspassword'] = $password;
        echo "Login Success";
        header("Location: home.php");
    } else {
        echo "Incorrect Password";
    }    
} else {
    echo "User not Found";
    
}
mysqli_close($conn);