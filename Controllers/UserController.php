<?php
    session_start();
    include_once "Includes/connection.inc.php";
    include_once "MailController.php";

    function findUser($email, $password){
        global $conn;
        $kod = "59984389887635";
        $jelszo = md5($password . $kod);

        $sql = "SELECT * FROM users WHERE users_email = '$email' AND users_password = '$jelszo'";

        if (isset($conn)) {
            $eredmeny = mysqli_query($conn, $sql);
            $sorok = mysqli_num_rows($eredmeny);
            if ($sorok==1){
                while($row = mysqli_fetch_array($eredmeny)) {
                    $_SESSION["id"] = $row['users_id'];
                    $_SESSION["teljesnev"] = $row['users_fullname'];
                    $_SESSION["email"] = $row['users_email'];
                    $_SESSION["admin"] = $row['users_admin'];
                }
                header("Location: ../index.php");
            }
            else{
                    echo "<h4 style='text-align: center; color: red;'>Nem megfelelő E-mail cím, vagy jelszó!</h4>";
            }
        }
    }

    function addUser($teljesnev, $email, $password1, $password2){
        global $conn;
        $kod = "59984389887635";

        $jelszo1 = md5($password1 . $kod);
        $jelszo2 = md5($password2 . $kod);
        $hiba = "";

        if ($teljesnev == "")
            $hiba .= "<h4 style='text-align: center; color: red;'>A teljes név megadása kötelező!</h4>";

        if ($email == "")
            $hiba .= "<h4 style='text-align: center; color: red;'>Az e-mail cím megadása kötelező!</h4>";

        if ($jelszo1 == "")
            $hiba .= "<h4 style='text-align: center; color: red;'>A jelszó megadása kötelező!</h4>";

        if ($jelszo1 != $jelszo2)
            $hiba .= "<h4 style='text-align: center; color: red;'>A két jelszó nem megegyező!</h4>";

        if ($hiba != "") {
            echo $hiba;
            exit();
        }

        else {
            $sql = "INSERT INTO users (users_fullname, users_email, users_password)
                    VALUES ('$teljesnev','$email', '$jelszo1')";
            if (isset($conn)) {
                if (mysqli_query($conn, $sql)) {
                    echo "Sikeres regisztráció!";
                    echo "<a href = '../login.php'> Kattints a bejelentkezéshez. </a>";
                    exit();
                } else {
                    echo "Adatbázis hiba: " . $sql . "<br>" . mysqli_error($conn);
                    echo "<a href = '../login.php'> Vissza. </a>";
                }
            }
        }
    }

    function changePassword($newpassword){
        global $conn;
        $fullName = $_SESSION["teljesnev"];
        $emailAddress = $_SESSION["email"];
        $kod = "59984389887635";
        $newpass = md5($newpassword . $kod);

        $sql = "UPDATE users SET users_password='$newpass' WHERE users_email='$emailAddress'";

        if (isset($conn)) {
                $query = mysqli_query($conn, $sql);
                if ($query){
                    $text = "
                        <h1>Kedves <i>$fullName</i></h1>
                        <p>Ön sikeresen módosította új jelszavát. Új jelszava: <b>$newpassword</b>.</p>
                        <p style='text-align: right;'>Köszönjük, hogy minket választott!</p>
                        <p style='text-align: right;'>Üdvözlettel, a Rentaka autókölcsönző!</p>
                    ";
                    sendMail($emailAddress, $text, 'Jelszó módosítás - Rektaka');
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

    function allAdmin(){
        global $conn;
        header("Content-type: application/json; charset=utf8");
        $sql = "SELECT * FROM users WHERE users_admin=1";
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

    function toUser($email){
        global $conn;
        if (!$_SESSION["admin"] == 1) {
            echo "Nincs hozzáférésed az admin felülethez, kérlek használj admin jogú felhasználót!";
        } else {
            $sql = "UPDATE users SET users_admin=0 WHERE users_email='$email'";
            if (isset($conn)) {
                $result = mysqli_query($conn, $sql);
                echo $result;
                header('Location: ../manageadmins.php');
            }
        }
    }

    function toAdmin($email){
        global $conn;
        if (!$_SESSION["admin"] == 1) {
            echo "Nincs hozzáférésed az admin felülethez, kérlek használj admin jogú felhasználót!";
        } else {
            $sql = "UPDATE users SET users_admin=1 WHERE users_email='$email'";
            if (isset($conn)) {
                $result = mysqli_query($conn, $sql);
                echo $result;
                header('Location: ../manageadmins.php');
            }
        }
    }

?>