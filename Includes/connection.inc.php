<?php
$servername = "sql213.epizy.com";
$username = "epiz_30928740";
$password = "D0nVH4mdSP";
$dbname = "epiz_30928740_autokolcsonzo";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kapcsolódás sikertelen: " . mysqli_connect_error());
}

mysqli_set_charset($conn,"utf8");