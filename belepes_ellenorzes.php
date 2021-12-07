<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["teljesnev"])) {
    header("Location: belepes_regisztralas.php");
    exit();
}