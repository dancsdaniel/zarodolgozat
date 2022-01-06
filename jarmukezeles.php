<?php
include "belepes_ellenorzes.php";
include "navbar.php";
session_start();
{
    ?>
    <!doctype html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/jarmukezeles.css">
        <title>Járművek kezelése</title>
    </head>
    <body>
        <h1>Járművek kezelése</h1>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Új jármű felvitele
            </button>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Új jármű felvitele</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form enctype="multipart/form-data" action="./db_muveletek/insert_jarmu.php" method="post">

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Márka</span>
                                <input type="text" name="marka" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Típus</span>
                                <input type="text" name="tipus" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Gyártás éve</span>
                                <input type="number" name="gyartaseve" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Teljesítmény</span>
                                <input type="text" name="teljesitmeny" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Férőhely</span>
                                <input type="number" name="ferohely" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Díj</span>
                                <input type="number" name="dij" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Kép</label>
                                <input class="form-control" type="file" id="formFile" name="kep" accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-primary">Mentés</button>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>

                    </div>
                </div>
            </div>
        </div>

    </body>
    </html>
    <?php
}
include "footer.php";
?>