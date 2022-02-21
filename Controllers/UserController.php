<?php
    session_start();
    include "Includes/connection.inc.php";

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

                    //header("Location: ../index.php");
                }}
            else {
                echo "Hibás felhasználónév vagy jelszó!";
                //header("Location: ../index.php");
            }
        }
    }

    function addUser($teljesnev, $email, $password1, $password2){
        global $conn;
        $kod = "59984389887635";

        $jelszo1 = md5($password1 . $kod);
        $jelszo2 = md5($password2 . $kod);
        $hiba = "";

        //megadta a felhasználónevet?
        if ($teljesnev == "")
            $hiba .= "A teljes név megadása kötelező!<br>";

        if ($email == "")
            $hiba .= "Az e-mail cím megadása kötelező!<br>";

        //Jelszó/jelszavak hosszúsága
        if ($jelszo1 == "")
            $hiba .= "A jelszó megadása kötelező!<br>";

        //Egyezik-e a két jelszó
        if ($jelszo1 != $jelszo2)
            $hiba .= "A két jelszó nem megegyező!<br>";

        //Lehetséges-e a regisztráció?
        if ($hiba != "") {
            echo $hiba;
            echo "<a href = '../login.php'> Vissza a regisztrációhoz. </a>";
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