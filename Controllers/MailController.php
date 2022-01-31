<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Includes/PHPMailer/Exception.php';
require 'Includes/PHPMailer/PHPMailer.php';
require 'Includes/PHPMailer/SMTP.php';

function reservationMail($email, $text){
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.freemail.hu';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'autokolcsonzoinfo@freemail.hu';
        $mail->Password   = 'Autokolcsonzo2022';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('autokolcsonzoinfo@freemail.hu');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Foglalás visszaigazolása!';
        $mail->Body    = $text;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}