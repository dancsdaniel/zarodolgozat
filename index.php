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
    <link rel="stylesheet" href="css/index.css">
    <title>Főoldal</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php  ?>
        <h1>Üdvözlünk <?php echo $_SESSION["teljesnev"] ?> a Rentaka autókölcsönző oldalán!</h1>

            <div class="card helpcard">
                <div class="card-body">
                    <h5 class="card-title">Dokumentáció</h5>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 231.306 231.306" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 231.306 231.306" width="50">
                        <g>
                            <path d="M229.548,67.743L163.563,1.757C162.438,0.632,160.912,0,159.32,0H40.747C18.279,0,0,18.279,0,40.747v149.813   c0,22.468,18.279,40.747,40.747,40.747h149.813c22.468,0,40.747-18.279,40.747-40.747V71.985   C231.306,70.394,230.673,68.868,229.548,67.743z M164.32,19.485l47.5,47.5h-47.5V19.485z M190.559,219.306H40.747   C24.896,219.306,12,206.41,12,190.559V40.747C12,24.896,24.896,12,40.747,12H152.32v60.985c0,3.313,2.687,6,6,6h60.985v111.574   C219.306,206.41,206.41,219.306,190.559,219.306z"/>
                            <path d="m103.826,52.399c-5.867-5.867-13.667-9.098-21.964-9.098s-16.097,3.231-21.964,9.098c-5.867,5.867-9.098,13.667-9.098,21.964 0,8.297 3.231,16.097 9.098,21.964l61.536,61.536c7.957,7.956 20.9,7.954 28.855,0 7.955-7.956 7.955-20.899 0-28.855l-60.928-60.926c-2.343-2.343-6.143-2.343-8.485,0-2.343,2.343-2.343,6.142 0,8.485l60.927,60.927c3.276,3.276 3.276,8.608 0,11.884s-8.607,3.276-11.884,0l-61.536-61.535c-3.601-3.601-5.583-8.388-5.583-13.479 0-5.092 1.983-9.879 5.583-13.479 7.433-7.433 19.525-7.433 26.958,0l64.476,64.476c11.567,11.567 11.567,30.388 0,41.955-5.603,5.603-13.053,8.689-20.977,8.689s-15.374-3.086-20.977-8.689l-49.573-49.574c-2.343-2.343-6.143-2.343-8.485,0-2.343,2.343-2.343,6.142 0,8.485l49.573,49.573c7.87,7.87 18.333,12.204 29.462,12.204s21.593-4.334 29.462-12.204 12.204-18.333 12.204-29.463c0-11.129-4.334-21.593-12.204-29.462l-64.476-64.476z"/>
                        </g>
                    </svg>
                    <p class="card-text">Amennyiben ismerkedne a program működésével, valamint megismerné a fejlesztéshez kapcsolódó részleteket, olvassa el a dokumentációt.</p>
                    <a href="./documentation.pdf" class="btn btn-primary">Ugrás a dokumentációra</a>
                </div>
            </div>

    <?php include_once "Includes/footer.inc.php"; ?>
</body>
</html>