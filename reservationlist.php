<?php
include "Includes/loginreq.inc.php";
include "Includes/navbar.inc.php";
?>

<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jármű foglalásaid</title>
    <script src="js/reservationlist.js"></script>
</head>
<body>

    <h1>Jelenlegi foglalásaim</h1>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <td>Foglalás azonosítója</td>
            <td>Foglalt jármű</td>
            <td>Kezdete</td>
            <td>Vége</td>
            <td>Aktív</td>
        </tr>
        </thead>
        <tbody id="adatok">

        </tbody>
    </table>

<?php include "footer.inc.php"; ?>
</body>
</html>
