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
        <link rel="stylesheet" href="./css/adminkezeles.css">
        <title>Adminisztrátorok kezelése</title>
    </head>
    <body>
        <div id="tartalom">
        <h1>Adminisztrátorok kezelése</h1>

        <form action="./db_muveletek/update_usertoadmin.php" method="post">
        <div class="input-group mb-3" id="bevitel">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="E-Mail cím" aria-label="E-Mail cím" aria-describedby="basic-addon1" name="emailcim">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Felhasználó hozzáadása adminisztrátorként</button>
        </div>
        </form>

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
    </html>
    <?php
}
include "footer.php";
?>