<?php

require 'db.inc';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($username) or empty($email) or empty($password)) {
    echo "Invalid Input";
} else {

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $adduser = "INSERT INTO admin (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $adduser);

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);

    if (mysqli_stmt_execute($stmt)){
        echo 'User Added';
        header('Location: login.php');
    } else {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);
}
mysqli_close($conn);