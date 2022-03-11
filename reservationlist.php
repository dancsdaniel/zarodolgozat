<?php
include_once "Includes/loginreq.inc.php";
include_once "Includes/navbar.inc.php";
?>

<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reservationlist.css">
    <title>Jármű foglalásaid</title>
    <script src="js/reservationlist.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">

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

<?php include_once "Includes/footer.inc.php"; ?>
</body>
</html>
