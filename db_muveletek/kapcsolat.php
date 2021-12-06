<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "autokolcsonzo";

// Kapcsolat létrehozása
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Ellenőrzés
if (!$conn) {
    die("Kapcsolódás sikertelen: " . mysqli_connect_error());
}

mysqli_set_charset($conn,"utf-8");