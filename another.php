<html lang="en">
<head>
    <title>Testing Stuff</title>
    <style>
        html, body {
            color-scheme: dark;
        }
    </style>
</head>
</html>
<?php
/*$to = "koomefranklinm@gmail.com";
$subject = "Test";
$txt = "Testing this mail function in php";
$headers = "From: escapistcyber@gmail.com";

mail($to,$subject,$txt,$headers);*/

require "include/mail.inc";
$address = 'koomefranklinm@gmail.com';
try {
    //Recipients
    $mail->addAddress($address, 'Frank');     //Add a recipient name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML();                                  //Set email format to HTML
    $mail->Subject = 'PHP STMP Test';
    $mail->Body = 'Hello Frank.<br>Trying including the mail function';

//    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";
}