<html>
<head>
    <script type="text/javascript" src="functions.js"></script>
</head>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "db.inc";
    $house_name = $_POST['house-name'];
    error_log(print_r($house_name, true));
    $bool_value = false;
    $update_clients = "UPDATE clients SET tenancy = ? WHERE housename = ?";
    $update_houses = "UPDATE houses SET occupied = ? WHERE housename = ?";
    $stmt1 = mysqli_prepare($conn, $update_clients);
    $stmt2 = mysqli_prepare($conn, $update_houses);
    mysqli_stmt_bind_param($stmt1, 'is', $bool_value, $house_name);
    mysqli_stmt_bind_param($stmt2, 'is', $bool_value, $house_name);
    if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {
        echo '
        <script>alert();</script>';
        header("Location: ../tenants.php");
    }
    mysqli_stmt_close();
    mysqli_close($conn);
}







