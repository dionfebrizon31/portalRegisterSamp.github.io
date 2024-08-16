<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Pastikan path ini sesuai dengan instalasi PHPMailer Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer();
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '3bcb01b382a478';
        $mail->Password = '68919d0b424978';

        // Sender and recipient settings
        $mail->setFrom('PG-RP@gmail.com', 'PGRP');
        $mail->addAddress('dionfebrizon42@gmail.com', 'Dion');
        
        // Email content
        $mail->isHTML(false);
        $mail->Subject = 'Message from ' . $name;
        $mail->Body    = "You have received a new message from $name ($email):\n\n$message";

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. PHPMailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
