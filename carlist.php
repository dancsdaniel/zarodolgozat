<?php
include_once "Includes/navbar.inc.php";
include_once "Includes/loginreq.inc.php";
?>

<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Járműveink listája</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="js/carlist.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="./css/carlist.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <?php
    if(isset($_POST["submit"]))
    {
        $userid = $_SESSION["id"];
        $carid = $_POST["carid"];
        $from = $_POST["from"];
        $days = $_POST["days"];
        $carprice = $_POST["carprice"];


        include_once "Controllers/ReservationController.php";
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Bezárás" id="closebutton"></button>
                </div>
                <form method="POST">
                    <div class="modal-body" id="modaltest">

                    </div>
                    <div class="modal-body" id="szamitottdij">

                    </div>

                    <span id="reservebutton" style="display: none">
                        <button type="submit" name="submit" class="btn btn-primary">Jármű kölcsönzése</button>
                    <span>
                </form>
            </div>
        </div>
    </div>

    <?php include_once "Includes/footer.inc.php"; ?>
</body>
</html>
