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

        <div class="input-group mb-3" style="width: 60%">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="E-Mail cím" aria-label="E-Mail cím" aria-describedby="basic-addon1" name="emailcim">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Felhasználó hozzáadása adminisztrátorként</button>
        </div>

        <div class="row" id="adatok">

        </div>
    </body>
    </html>
    <?php
}
include "footer.php";
?>