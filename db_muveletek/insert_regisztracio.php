<?php
include "kapcsolat.php";
    $kod = "59984389887635";
    $teljesnev = $_POST["reg_teljesnev"];
    $email = $_POST["reg_email"];
    $jelszo1 = md5($_POST["reg_jelszo1"] . $kod);
    $jelszo2 = md5($_POST["reg_jelszo2"] . $kod);
    $hiba = "";

    //megadta a felhasználónevet?
    if ($teljesnev == "")
        $hiba .= "A teljes név megadása kötelező!<br>";

    if ($email == "")
        $hiba .= "Az e-mail cím megadása kötelező!<br>";

    //Jelszó/jelszavak hosszúsága
    if ($jelszo1 == "")
        $hiba .= "A jelszó megadása kötelező!<br>";

    //Egyezik-e a két jelszó
    if ($jelszo1 != $jelszo2)
        $hiba .= "A két jelszó nem megegyező!<br>";

    //Lehetséges-e a regisztráció?
    if ($hiba != "") {
        echo $hiba;
        echo "<a href = '../belepes_regisztralas.php'> Vissza a regisztrációhoz. </a>";
        exit();
    }
    else {
        $sql = "INSERT INTO felhasznalok (felhasznalok_teljesnev, felhasznalok_email, felhasznalok_jelszo)
        VALUES ('$teljesnev','$email', '$jelszo1')";
        if (isset($conn)) {
            if (mysqli_query($conn, $sql)) {
                echo "Sikeres regisztráció!";
                echo "<a href = '../belepes_regisztralas.php'> Kattints a bejelentkezéshez. </a>";
                exit();
            } else {
                echo "Adatbázis hiba: " . $sql . "<br>" . mysqli_error($conn);
                echo "<a href = '../belepes_regisztralas.php'> Vissza. </a>";
            }
        }
    }

