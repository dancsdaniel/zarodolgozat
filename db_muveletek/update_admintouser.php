<?php
session_start();
include "./kapcsolat.php";
if (!$_SESSION["admin"]==1){
    echo "Nincs hozzáférésed az admin felülethez, kérlek használj admin jogú felhasználót!";
}
else{
    $email = $_GET['email'];
    echo $email;
    $sql = "UPDATE felhasznalok SET felhasznalok_admin=0 WHERE felhasznalok_email='$email'";
    if (isset($conn)) {
        $result = mysqli_query($conn, $sql);
        echo $result;
        header('Location: ../adminkezeles.php');
    }
}