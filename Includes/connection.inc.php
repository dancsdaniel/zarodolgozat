<?php
include_once "config.inc.php";

$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Kapcsolódás sikertelen: " . mysqli_connect_error());
}

mysqli_set_charset($conn,"utf8");