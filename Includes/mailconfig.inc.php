<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Includes/PHPMailer/Exception.php';
require 'Includes/PHPMailer/PHPMailer.php';
require 'Includes/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_OFF;
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'autokolcsonzoinfo@gmail.com';
$mail->Password   = 'Autokolcsonzo2022';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;
$mail->CharSet = 'UTF-8';