<?php
    include "Includes/connection.inc.php";
    include "Includes/loginreq.inc.php";

    function findCar($id){
        global $conn;
        header("Content-type: application/json; charset=utf8");
        $sql = "SELECT * FROM cars WHERE cars_id=$id";
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

    function allCar(){
        global $conn;
        header("Content-type: application/json; charset=utf8");
        $sql = "SELECT * FROM cars";
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

    function editCar($id, $marka, $tipus, $gyartaseve, $teljesitmeny, $ferohely, $dij){
        global $conn;
        if (!$_SESSION["admin"]==1){
            echo "Nincs hozzáférésed az admin felülethez, kérlek használj admin jogú felhasználót!";
        }
        else {

            if(filesize($_FILES['kep']['name'])>=0){
                $fajlnev = $id;
                $cel = "pictures/".$fajlnev;
                move_uploaded_file($_FILES['kep']['tmp_name'], $cel);
                $sql = "UPDATE cars SET
                cars_brand='$marka', cars_model='$tipus', cars_year=$gyartaseve, cars_power='$teljesitmeny',
                cars_seats=$ferohely, cars_price=$dij, cars_picture='$fajlnev'
                WHERE cars_id=$id";
            }

            if (isset($conn)) {
                $query = mysqli_query($conn, $sql);
                if ($query){
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
    }

    function deleteCar($id){
        global $conn;
        if (!$_SESSION["admin"]==1){
            echo "Nincs hozzáférésed az admin felülethez, kérlek használj admin jogú felhasználót!";
        }
        else{
            $sql3 = "DELETE FROM reservations WHERE reservations_carid=$id";
            mysqli_query($conn, $sql3);
            $sql2 = "SELECT cars_picture FROM cars WHERE cars_id=$id";
            $sql = "DELETE FROM cars WHERE cars_id='$id'";
            if (isset($conn)) {
                $result2 = mysqli_query($conn, $sql2);
                $row = mysqli_fetch_array($result2);
                $kepid = $row['cars_picture'];
                unlink("pictures/$kepid");
                    $query = mysqli_query($conn, $sql);
                    if ($query){
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
    }

    function addCar($marka, $tipus, $gyartaseve, $teljesitmeny, $ferohely, $dij){
        global $conn;
        if (!$_SESSION["admin"]==1){
            echo "Nincs hozzáférésed az admin felülethez, kérlek használj admin jogú felhasználót!";
        }
        else {
            if (isset($conn)){
                mysqli_query($conn, "ANALYZE TABLE cars");
                $r = mysqli_query($conn,"SHOW TABLE STATUS LIKE 'cars';");
                $row = mysqli_fetch_array($r);
                $auto_increment = $row['Auto_increment'];
            }

            $fajlnev = $auto_increment.'.'.pathinfo($_FILES['kep']['name'], PATHINFO_EXTENSION);
            $cel = "pictures/".$fajlnev;
            move_uploaded_file($_FILES['kep']['tmp_name'], $cel);

            $sql = "INSERT INTO cars 
            (cars_brand, cars_model, cars_year, cars_power, cars_seats, cars_price, cars_picture)
            VALUES ('$marka','$tipus', $gyartaseve, '$teljesitmeny', $ferohely, $dij, '$fajlnev')";

            if (isset($conn)) {
                $query = mysqli_query($conn, $sql);
                if ($query){
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
    }

?>