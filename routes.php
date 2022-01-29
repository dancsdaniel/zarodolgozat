<?php
    include "Controllers/CarController.php";
    include "Controllers/UserController.php";
    include "Controllers/MailController.php";

    #CarController
    if($_GET['action']=='allCar')
        allCar();

    if($_GET['action']=='findCar'){
        $id = $_GET['id'];
        $idszam = (int)$id;
        findCar($id);
    }
    #########################################################
    #UserController
    if($_GET['action']=='allAdmin')
        allAdmin();

    if($_GET['action']=='toUser'){
        $e = $_GET['email'];
        toUser($e);
    }

    if($_GET['action']=='toAdmin'){
        $e = $_GET['email'];
        toAdmin($e);
    }
    #########################################################
?>