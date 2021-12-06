<?php
session_start();
include "kapcsolat.php";

$kod = "59984389887635";
$email = $_POST["login_email"];
$jelszo = md5($_POST["login_jelszo"] . $kod);

$sql = "SELECT * FROM felhasznalok WHERE felhasznalok_email = '$email' AND felhasznalok_jelszo = '$jelszo'";
if (isset($conn)) {
    $eredmeny = mysqli_query($conn, $sql);
    $sorok = mysqli_num_rows($eredmeny);
    if ($sorok>=1){
        while($row = mysqli_fetch_array($eredmeny)) {
            $_SESSION["id"] = $row['felhasznalok_id'];
            $_SESSION["teljesnev"] = $row['felhasznalok_teljesnev'];
            $_SESSION["email"] = $row['felhasznalok_email'];
            $_SESSION["kredit"] = $row['felhasznalok_kredit'];
            $_SESSION["admin"] = $row['felhasznalok_admin'];

            header("Location: ../index.php");
    }}
    else {
        echo "Hibás felhasználónév vagy jelszó!";
        header("Location: ../index.php");
    }}