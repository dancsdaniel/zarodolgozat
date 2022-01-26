<?php
session_start();
include "connection.inc.php";
include "../loginreq.inc.php";

    $autoid = $_POST['autoid'];
    $kezdodatum = $_POST['kezdodatum'];
    $napok = $_POST['napok'];
    $dij = $_POST['autodij'];
    $felhasznaloid = $_SESSION['id'];

    $vegedatum = date('Y-m-d', strtotime($kezdodatum. ' + '.$napok.' days'));

    $sql = "SELECT cars_price FROM cars WHERE cars_id = $autoid";
    if (isset($conn)) {
        $result = mysqli_query($conn, $sql);
    }
    $kimenet=array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            array_push($kimenet,$row);
            echo $row['cars_price'];
            $teljesdij = $row['cars_price']*$napok;
            echo $teljesdij;
        }
    }
    else {
        echo "no";
    }

    $sql = "INSERT INTO reservations 
        (reservations_carid, reservations_userid, reservations_from, reservations_to, reservations_price)
        VALUES ($autoid, $felhasznaloid, '$kezdodatum', '$vegedatum', $teljesdij)";

    if (isset($conn)) {
        if (mysqli_query($conn, $sql)) {
            echo "Sikeres kölcsönzés! 3 másodperc múlva átiránytunk az előző oldalra.";
            echo "<a href = ''> Kattints a bejelentkezéshez. </a>";
            header('Refresh: 3; URL=../jarmufoglalas.php');
        } else {
            echo "Adatbázis hiba: " . $sql . "<br>" . mysqli_error($conn);
            echo "<a href = ''> Vissza. </a>";
        }
    }
?>