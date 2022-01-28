<?php
include "loginreq.inc.php";
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Autókölcsönző</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../carlist.php">Járműveink listája</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../jarmufoglalas.php">Járműkölcsönzés</a>
                </li>
                <li class="nav-item dropdown" style="display: <?php if(!$_SESSION["admin"]==1) echo "none";?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="../managecars.php">Járművek kezelése</a></li>
                        <li><a class="dropdown-item" href="../foglalasokkezelese.php">Foglalások kezelése</a></li>
                        <li><a class="dropdown-item" href="../manageadmins.php">Adminisztrátorok kezelése</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <span class="nav-link">Bejelentkezve mint: <?php echo $_SESSION["teljesnev"]; ?>
                    <a class="nav-link" href="../logout.php"> Kijelentkezés</a>
                </li>
            </ul>
        </div>
    </div>
</nav>