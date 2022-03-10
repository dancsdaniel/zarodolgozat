<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Includes/PHPMailer/Exception.php';
require 'Includes/PHPMailer/PHPMailer.php';
require 'Includes/PHPMailer/SMTP.php';

function reservationMail($email, $text){
    require 'Includes/config.inc.php';
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $gmailuser;
        $mail->Password   = $gmailpass;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet = 'UTF-8';

        $mail->setFrom($gmailuser);
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Foglalás visszaigazolása!';
        $mail->Body    = $text;

        $mail->send();
    } catch (Exception $e) {
    }
}

function changePasswordMail($email, $text){
    require 'Includes/config.inc.php';
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $gmailuser;
        $mail->Password   = $gmailpass;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet = 'UTF-8';

        $mail->setFrom($gmailuser);
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Jelszóválatoztatás!';
        $mail->Body    = $text;

        $mail->send();
    } catch (Exception $e) {
    }
}