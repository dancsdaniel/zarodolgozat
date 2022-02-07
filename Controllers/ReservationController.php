<?php
    include "Includes/connection.inc.php";
    include "Includes/loginreq.inc.php";
    include "Controllers/MailController.php";

    function delReservation($id){
        global $conn;
        if (!$_SESSION["admin"] == 1) {
            echo "Nincs hozzáférésed az admin felülethez, kérlek használj admin jogú felhasználót!";
        } else {
            $sql = "DELETE FROM reservations WHERE reservations_id='$id'";
            if (isset($conn)) {
                $result = mysqli_query($conn, $sql);
                echo $result;
                header('Location: ../managereservations.php');
            }
        }
    }

    function findReservation($id){
        global $conn;
        if (!$_SESSION["admin"] == 1) {
            echo "Nincs hozzáférésed az admin felülethez, kérlek használj admin jogú felhasználót!";
        }
        else{
            header("Content-type: application/json; charset=utf8");
            $sql = "SELECT * FROM reservations INNER JOIN users ON reservations_userid = users_id WHERE reservations_carid=$id";
            if (isset($conn)) {
                $result = mysqli_query($conn, $sql);
            }
            $kimenet=array();
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    array_push($kimenet,$row);
                }
                echo json_encode($kimenet, JSON_UNESCAPED_UNICODE);
            }
            else {
                echo 0;
            }
            mysqli_close($conn);
        }
    }

    function reservedDates($carid){
        global $conn;
        $sql = "SELECT reservations_from, reservations_to FROM reservations WHERE reservations_carid = $carid";

        if (isset($conn)) {
            $result = mysqli_query($conn, $sql);
        }
        $reserveddates=array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $from = new DateTime($row['reservations_from']);
                $to = new DateTime($row['reservations_to']);
                $period = new DatePeriod(
                    $from,
                    new DateInterval('P1D'),
                    $to
                );
                foreach ($period as $key => $value) {
                    $item = $value->format('Y-m-d');
                    array_push($reserveddates, $item);
                }
            }
            echo json_encode($reserveddates, JSON_UNESCAPED_UNICODE);
        }
        else {
            echo 0;
        }
        mysqli_close($conn);
    }

    function allReservation(){
        global $conn;
        if (!$_SESSION["admin"] == 1) {
            echo "Nincs hozzáférésed az admin felülethez, kérlek használj admin jogú felhasználót!";
        }
        else {
            header("Content-type: application/json; charset=utf8");
            $sql = "SELECT * FROM reservations INNER JOIN users ON reservations_userid = users_id";
            if (isset($conn)) {
                $result = mysqli_query($conn, $sql);
            }
            $kimenet=array();
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    array_push($kimenet,$row);
                }
                echo json_encode($kimenet, JSON_UNESCAPED_UNICODE);
            }
            else {
                echo 0;
            }
            mysqli_close($conn);
        }
    }

    function myReservation(){
        global $conn;
        header("Content-type: application/json; charset=utf8");

        $id = $_SESSION["id"];
        $sql = "SELECT * FROM reservations INNER JOIN cars ON reservations_carid=cars_id WHERE reservations_userid=$id";

        if (isset($conn)) {
            $result = mysqli_query($conn, $sql);
        }
        $kimenet=array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($kimenet,$row);
            }
            echo json_encode($kimenet, JSON_UNESCAPED_UNICODE);
        }
        else {
            echo 0;
        }
        mysqli_close($conn);
    }

    function addReservation($carid, $userid, $from, $days, $carprice){
        global $conn;
        $fullName = $_SESSION["teljesnev"];
        $emailAddress = $_SESSION["email"];

        $to = date('Y-m-d', strtotime($from. ' + '.$days.' days'));
        $price = $carprice*$days;

        $sql = "INSERT INTO reservations 
        (reservations_carid, reservations_userid, reservations_from, reservations_to, reservations_price)
        VALUES ($carid, $userid, '$from', '$to', $price)";

        if (isset($conn)) {
                $query = mysqli_query($conn, $sql);
                if ($query){
                    $text = "
                    <h1>Kedves <i>$fullName</i></h1>
                    <p>Ön legfoglalta <b>asd</b> járművünket <b>$from-tól $to-ig</b>.</p>
                    <p>Az autó napidíja <b>$carprice Ft</b>, A kölcsönzött napok száma <b>$days nap</b>, <br>
                    így a végösszeg <b>$price Ft</b><p>
                    <p style='text-align: right;'>Köszönjük, hogy minket választott!</p>
                    <p style='text-align: right;'>Üdvözlettel, az Autókölcsönző!</p>
                    ";
                    reservationMail($emailAddress, $text);
                    echo '<div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                                <svg style="margin-right: 8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>                                
                                <div>
                                    Sikeres művelet!
                                </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>';
                }
                else{
                    echo '<div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                                <div>
                                    Sikertelen művelet!
                                </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>';
                }
            }
    }