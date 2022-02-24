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
        <script src="js/managereservations.js"></script>
        <title>Foglalások kezelése</title>
    </head>
    <body>
        <h1>Foglalások kezelése</h1>
        <p>A kezdéshez válassza ki a járművet a hozzá kapcsolódó jármű megjelentítéséhez.</p>

        <select class="form-select" name="cars" id="cars" onchange="findReservation()">

        </select>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <td>Foglalás azonosítója</td>
                <td>Foglalás kezdete</td>
                <td>Foglalás vége</td>
                <td>Ügyfél neve</td>
            </tr>
            </thead>
            <tbody id="adatok">

            </tbody>
        </table>

    </body>
    </html>
    <?php
}
include "Includes/footer.inc.php";
?>