<?php
require 'db.inc';

$f_name = $_POST['first-name'];
$s_name = $_POST['sir-name'];
$l_name = $_POST['last-name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$house_name = $_POST['housename'];
$rent = $_POST['rent'];
$deposit = $rent;
$bool_value = true;
$paid = 0;
$total_amount = $rent + $deposit;
$balance = $total_amount - $paid;

$add_sql = "INSERT INTO clients(first_name, sir_name, last_name, phone, email, housename, total_rent, paid_rent, balance) VALUES (?,?,?,?,?,?,?,?,?)";
$update_sql = "UPDATE houses SET occupied = ? WHERE housename = ?";

$stmt1 = mysqli_prepare($conn, $add_sql);
$stmt2 = mysqli_prepare($conn, $update_sql);

mysqli_stmt_bind_param($stmt1, "ssssssddd", $f_name, $s_name, $l_name, $phone, $email, $house_name, $total_amount, $paid, $balance);
mysqli_stmt_bind_param($stmt2, "is", $bool_value, $house_name);

if (mysqli_stmt_execute($stmt1)) {
    echo "Client added successfully<br>";
    mysqli_stmt_execute($stmt2);
    if (mysqli_stmt_affected_rows($stmt2) > 0) {
        require "mail.inc";
        try {
            $mail->addAddress($email, $s_name);
            $mail->isHTML();                                  //Set email format to HTML
            $mail->Subject = 'New Tenant';
            $mail->Body = 'Hello ' .$s_name .'.<br>Your have Successfully been registered as a new tenant to the house <b>'.$house_name.'</b><br>Your monthly rent will be <b>'.$rent.'</b><br>Enjoy your stay';

//            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";
        }
    } else {
        die("Error: " . mysqli_error($conn));
    }
} else {
    die("Error: " . mysqli_error($conn));
}
mysqli_stmt_close($stmt1);
mysqli_stmt_close($stmt2);
mysqli_close($conn);
