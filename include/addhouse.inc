<?php
require 'db.inc';

$housetype = $_POST['house-type'];
$housename = $_POST['house-name'];
$location = $_POST['location'];
$rent = $_POST['rent'];
$description = $_POST['description'];

if (empty($housename) or empty($housetype) or empty($location) or empty($rent) or empty($description)) {
    echo 'Invalid Input';
} else {
    $query = "INSERT INTO houses (housetype, housename, location, monthlyrent, description) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $housetype, $housename, $location, $rent, $description);

    if (mysqli_stmt_execute($stmt)) {
        echo "House added successfully";
    } else {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);
}
mysqli_close($conn);