<?php
include "Includes/loginreq.inc.php";
include "Includes/navbar.inc.php";

if (!$_SESSION["admin"]==1){
    echo "Nincs hozzáférésed az admin felülethez, kérlek használj admin jogú felhasználót!";
}
else{
    ?>
    <!doctype html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="js/manageadmins.js"></script>
        <link rel="stylesheet" href="./css/adminkezeles.css">
        <title>Adminisztrátorok kezelése</title>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <div id="tartalom">
        <h1>Adminisztrátorok kezelése</h1>

        <form method="post">
        <div class="input-group mb-3" id="bevitel">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="E-Mail cím" aria-label="E-Mail cím" aria-describedby="basic-addon1" name="email">
                <button class="btn btn-outline-secondary" type="submit" name="submit" id="button-addon2">Felhasználó hozzáadása adminisztrátorként</button>
        </div>
        </form>

            <?php
                if(isset($_POST["submit"]))
                {
                    $e = $_POST['email'];
                    include "Controllers/UserController.php";
                    toAdmin($e);
                }
            ?>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>Teljes név</td>
                        <td>E-Mail cím</td>
                        <td>#</td>
                    </tr>
                </thead>
                <tbody id="adatok">

                </tbody>
            </table>
        </div>
    </body>
    <?php
    }
    include "Includes/footer.inc.php";
    ?>
    </html>
