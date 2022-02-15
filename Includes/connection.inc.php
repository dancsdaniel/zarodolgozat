<?php
$local = 1;

$servername0 = "sql213.epizy.com";
$username0 = "epiz_30928740";
$password0 = "D0nVH4mdSP";
$dbname0 = "epiz_30928740_autokolcsonzo";

$servername1 = "localhost:3306";
$username1 = "root";
$password1 = "";
$dbname1 = "autokolcsonzo";

if ($local == 1){
    $conn = mysqli_connect($servername1, $username1, $password1, $dbname1);
    if (!$conn) {
        die("Kapcsolódás sikertelen: " . mysqli_connect_error());
    }
}
else {
    $conn = mysqli_connect($servername0, $username0, $password0, $dbname0);
    if (!$conn) {
        die("Kapcsolódás sikertelen: " . mysqli_connect_error());
    }
}


mysqli_set_charset($conn,"utf8");