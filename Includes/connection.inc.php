<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "autokolcsonzo";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kapcsolódás sikertelen: " . mysqli_connect_error());
}

mysqli_set_charset($conn,"utf8");