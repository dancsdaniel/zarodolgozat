<?php
function reservationMail($email, $text){
        require "Includes/mailconfig.inc.php";
        global $mail;

        $mail->setFrom('autokolcsonzoinfo@freemail.hu');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Foglalás visszaigazolása!';
        $mail->Body    = $text;

        $mail->send();
}