<?php
    session_start();
    include "kapcsolat.php";

    if (!$_SESSION["admin"]==1){
    echo "Nincs hozzáférésed az admin felülethez, kérlek használj admin jogú felhasználót!";
    }
    else {

        $marka = $_POST['marka'];
        $tipus = $_POST['tipus'];
        $gyartaseve = $_POST['gyartaseve'];
        $teljesitmeny = $_POST['teljesitmeny'];
        $ferohely = $_POST['ferohely'];
        $dij = $_POST['dij'];

        if (isset($conn)){
        $r = mysqli_query($conn,'SELECT MAX(autok_id) FROM autok');
        $row = mysqli_fetch_array($r);
        $auto_increment = $row['MAX(autok_id)']+1;
        }

        $fajlnev = $auto_increment.'.'.pathinfo($_FILES['kep']['name'], PATHINFO_EXTENSION);
        $cel = "../kepek/".$fajlnev;

        if(!move_uploaded_file($_FILES['kep']['tmp_name'], $cel))
            echo "A kép feltöltése nem sikerült";

        $sql = "INSERT INTO autok 
        (autok_marka, autok_tipus, autok_gyartaseve, autok_teljesitmeny, autok_ferohely, autok_dij, autok_kep)
        VALUES ('$marka','$tipus', $gyartaseve, '$teljesitmeny', $ferohely, $dij, '$fajlnev')";

        if (isset($conn)) {
            if (mysqli_query($conn, $sql)) {
                echo "Sikeres járműfelvitel! 3 másodperc múlva átiránytunk az előző oldalra.";
                echo "<a href = ''> Kattints a bejelentkezéshez. </a>";
                header('Refresh: 3; URL=../jarmukezeles.php');
            } else {
                echo "Adatbázis hiba: " . $sql . "<br>" . mysqli_error($conn);
                echo "<a href = ''> Vissza. </a>";
            }
        }
    }
?>