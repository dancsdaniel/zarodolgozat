<?php
include "Includes/loginreq.inc.php";
include "Includes/navbar.inc.php";
{
    ?>
    <!doctype html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/managecars.css">
        <script src="js/managecars.js"></script>
        <title>Járművek kezelése</title>
    </head>
    <body class="d-flex flex-column min-vh-100">

    <?php
    if(isset($_POST["submit"]))
    {
        $marka = $_POST['marka'];
        $tipus = $_POST['tipus'];
        $gyartaseve = $_POST['gyartaseve'];
        $teljesitmeny = $_POST['teljesitmeny'];
        $ferohely = $_POST['ferohely'];
        $dij = $_POST['dij'];

        include "Controllers/CarController.php";
        if ($_POST["edit"]==1){
            echo editCar($_POST["id"],$marka,$tipus,$gyartaseve,$teljesitmeny,$ferohely,$dij);
        }
        if ($_POST["edit"]==0){
            echo addCar($marka, $tipus, $gyartaseve, $teljesitmeny, $ferohely, $dij);
        }
        if ($_POST["edit"]==2){
            echo deleteCar($_POST["id"]);
        }
    }
    ?>

        <h1>Járművek kezelése</h1>

        <span id="alertplace"></span>

        <div class="text-center">
            <button type="button" class="btn btn-primary" id="modalbutton" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Új jármű felvitele
            </button>
        </div>


        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Új jármű felvitele</h5>
                        <button onclick="formreset()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body">

                        <form enctype="multipart/form-data" id="crudform" method="POST">

                            <input type="hidden" name="edit" id="edit2" value="0">
                            <input type="hidden" name="id" id="id2" value="">

                            <span id="inputs">

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Márka</span>
                                <input type="text" name="marka" id="marka2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Típus</span>
                                <input type="text" name="tipus" id="tipus2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Gyártás éve</span>
                                <input type="number" name="gyartaseve" id="gyartaseve2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Teljesítmény</span>
                                <input type="text" name="teljesitmeny" id="teljesitmeny2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Férőhely</span>
                                <input type="number" name="ferohely" id="ferohely2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Díj</span>
                                <input type="number" name="dij" id="dij2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Kép</label>
                                <input class="form-control" type="file" id="formFile" name="kep" accept="image/*" value=null>
                            </div>

                            </span>

                            <div id="warningmessage"></div>

                            <button type="submit" name="submit" class="btn btn-primary">Mentés</button>


                        </form>



                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <td>Azonosító</td>
                <td>Márka</td>
                <td>Típus</td>
                <td>Gyártási év</td>
                <td>#</td>
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