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

</head>
<body>
<h1>Üdvözlünk autokölcsönzőnk oldalán!</h1>
<h2> Az elérhető járműkínálatunk megtekintéséhez kérjük lépjen be, vagy regisztráljon ingyenesen oldaunkra!</h2>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">
    Bejelentkezés
</button>
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bejelentkezés</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./db_muveletek/select_bejelentkezes.php">

                    <p>E-mail: <input type="text" name="login_email" class="form-control"></p>
                    <p>Jelszó: <input type="password" name="login_jelszo" class="form-control"></p>

                    <input type="submit" class="btn btn-success" value="Bejelentkezés">

                </form>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reg">
    Regisztráció
</button>
<div class="modal fade" id="reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Regisztráció</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./db_muveletek/insert_regisztracio.php">

                    <p>Teljes név: <input type="text" name="reg_teljesnev" class="form-control"></p>
                    <p>E-mail: <input type="text" name="reg_email" class="form-control"></p>
                    <p>Jelszó: <input type="password" name="reg_jelszo1" class="form-control"></p>
                    <p>Jelszó újra: <input type="password" name="reg_jelszo2" class="form-control"></p>

                    <input type="submit" class="btn btn-success" value="Regisztráció">

                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
