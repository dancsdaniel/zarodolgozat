<?php
include "belepes_ellenorzes.php";
include "navbar.php";
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
        <script src="js/adminkezeles.js"></script>
        <title>Adminisztrátorok kezelése</title>
    </head>
    <body>
        <h1>Jelenlegi adminisztrátorok listája</h1>
        <div class="row" id="adatok">

        </div>
    </body>
    </html>
    <?php
}
include "footer.php";
?>