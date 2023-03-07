<?php
require 'db.inc';

$f_name = $_POST['fname'];
$s_name = $_POST['sname'];
$l_name = $_POST['lname'];
$phone = $_POST['phone'];
$house_name = $_POST['housename'];
$bool_value = 1;

$add_sql = "INSERT INTO clients(fname, sname, lname, phone, housename) VALUES (?,?,?,?,?)";
$update_sql = "UPDATE houses SET occupied = ? WHERE housename = ?";

$stmt1 = mysqli_prepare($conn, $add_sql);
$stmt2 = mysqli_prepare($conn, $update_sql);

mysqli_stmt_bind_param($stmt1, "sssss", $f_name, $s_name, $l_name, $phone, $house_name);
mysqli_stmt_bind_param($stmt2, "is", $bool_value, $house_name);

if (mysqli_stmt_execute($stmt1)) {
    echo "Client added successfully<br>";
    mysqli_stmt_execute($stmt2);
    if (mysqli_stmt_affected_rows($stmt2) > 0) {
        echo "records updated successfully";
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
mysqli_stmt_close($stmt1);
mysqli_stmt_close($stmt2);
mysqli_close($conn);