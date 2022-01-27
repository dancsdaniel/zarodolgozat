<?php
include "Includes/navbar.inc.php";
include "Includes/loginreq.inc.php";
?>

<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Járműveink listája</title>
    <script src="js/carlist.js"></script>
    <link rel="stylesheet" href="./css/jarmulista.css">
</head>
<body>

    <?php
    if(isset($_POST["submit"]))
    {
        $userid = $_SESSION["id"];
        $carid = $_POST["carid"];
        $from = $_POST["from"];
        $days = $_POST["days"];
        $carprice = $_POST["carprice"];


        include "Controllers/ReservationController.php";
            echo addReservation($carid, $userid, $from, $days, $carprice);
    }
    ?>

    <div class="row" id="adatok" style="margin-right: auto">

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Bezárás"></button>
                </div>
                <form method="POST">
                    <div class="modal-body" id="modaltest">

                    </div>
                    <div class="modal-body" id="szamitottdij">

                    </div>

                        <button type="submit" name="submit" class="btn btn-primary">Jármű kölcsönzése</button>
                </form>
            </div>
        </div>
    </div>

    <?php include "Includes/footer.inc.php"; ?>
</body>
</html>
