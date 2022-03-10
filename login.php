<?php
   include "Controllers/UserController.php";
?>

<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Azonosítás</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="d-flex flex-column min-vh-100">
<div style="padding: 10px;">
<h1>Üdvözlünk a Rentaka autókölcsönző oldalán!</h1>
<h2> Az elérhető járműkínálatunk megtekintéséhez kérjük lépjen be, vagy regisztráljon ingyenesen oldaunkra!</h2>

<div id="login-button">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">
    Bejelentkezés
</button>
</div>
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bejelentkezés</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">

                    <p>E-mail: <input type="text" name="email" class="form-control"></p>
                    <p>Jelszó: <input type="password" name="jelszo" class="form-control"></p>

                    <input type="submit" name="login" class="btn btn-success" value="Bejelentkezés">

                </form>
                
            </div>
        </div>
    </div>
</div>

<div id="reg-button">
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#reg">
    Regisztráció
</button>
</div>
<?php
                    if(isset($_POST["login"]))
                    {
                        $e = $_POST['email'];
                        $j = $_POST['jelszo'];

                        findUser($e, $j);
                    }
?>
<?php
                if(isset($_POST["reg"]))
                {
                    $t = $_POST['reg_teljesnev'];
                    $e = $_POST['reg_email'];
                    $pw1 = $_POST['reg_jelszo1'];
                    $pw2 = $_POST['reg_jelszo2'];

                    addUser($t, $e, $pw1, $pw2);
                }
?>
<div class="modal fade" id="reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Regisztráció</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">

                    <p>Teljes név: <input type="text" name="reg_teljesnev" class="form-control"></p>
                    <p>E-mail: <input type="text" name="reg_email" class="form-control"></p>
                    <p>Jelszó: <input type="password" name="reg_jelszo1" class="form-control"></p>
                    <p>Jelszó újra: <input type="password" name="reg_jelszo2" class="form-control"></p>

                    <input type="submit" name="reg" class="btn btn-success" value="Regisztráció">

                </form>
                

            </div>
        </div>
    </div>
</div>
</div>
<?php include "Includes/footer.inc.php" ?>
</body>
</html>
