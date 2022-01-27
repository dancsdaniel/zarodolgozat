<?php
    include "Includes/connection.inc.php";
    include "Includes/loginreq.inc.php";
    include "Controllers/MailController.php";

    function addReservation($carid, $userid, $from, $days, $carprice){
        global $conn;
        $fullName = $_SESSION["teljesnev"];
        $emailAddress = $_SESSION["email"];

        $to = date('Y-m-d', strtotime($from. ' + '.$days.' days'));
        $price = $carprice*$days;

        $sql = "INSERT INTO reservations 
        (reservations_carid, reservations_userid, reservations_from, reservations_to, reservations_price)
        VALUES ($carid, $userid, '$from', '$to', $price)";

        if (isset($conn)) {
            if (mysqli_query($conn, $sql)) {
                $text = "
                    <h1>Kedves <i>$fullName</i></h1>
                    <p>Ön legfoglalta <b>asd</b> járművünket <b>$from-tól $to-ig</b>.</p>
                    <p>Az autó napidíja <b>$carprice Ft</b>, A kölcsönzött napok száma <b>$days nap</b>, <br>
                    így a végösszeg <b>$price Ft</b><p>
                    <p style='text-align: right;'>Köszönjük, hogy minket választott!</p>
                    <p style='text-align: right;'>Üdvözlettel, az Autókölcsönző!</p>
                ";
                reservationMail($emailAddress, $text);
            } else {
                echo "Adatbázis hiba: " . $sql . "<br>" . mysqli_error($conn);
                echo "<a href = ''> Vissza. </a>";
            }
        }
    }