<?php
    include_once "Controllers/CarController.php";
    include_once "Controllers/UserController.php";
    include_once "Controllers/ReservationController.php";

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
    #ReservationController
    if($_GET['action']=='myReservation')
        myReservation();

    if($_GET['action']=='reservedDates'){
        $id = $_GET['id'];
        reservedDates($id);
    }

    if($_GET['action']=='findReservation'){
        $id = $_GET['id'];
        if ($id==0){
            allReservation();
        }
        findReservation($id);
    }

    if($_GET['action']=='delReservation'){
        $id = $_GET['id'];
        delReservation($id);
    }
?>