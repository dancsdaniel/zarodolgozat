<?php
include "loginreq.inc.php";
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="icon" type="image/x" href="/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>

<div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jelszó megváltoztatása</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST">
                <p>Új jelszó megadása: <input type="password" name="newpass" class="form-control"></p>
                <input type="submit" name="changepass" class="btn btn-danger" value="Jelszó megváltoztatása">
            </form>
            </div>
        </div>
    </div>
</div>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Rentaka</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../carlist.php">Járműveink listája</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../reservationlist.php">Járműkölcsönzés</a>
                </li>
                <li class="nav-item dropdown" style="display: <?php if(!$_SESSION["admin"]==1) echo "none";?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="../managecars.php">Járművek kezelése</a></li>
                        <li><a class="dropdown-item" href="../managereservations.php">Foglalások kezelése</a></li>
                        <li><a class="dropdown-item" href="../manageadmins.php">Adminisztrátorok kezelése</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bejelentkezve mint: <?php echo $_SESSION["teljesnev"]; ?></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changepass">Jelszó megváltoztatása</a></li>
                    </ul>
                </li>
                <a class="nav-link nav-item" style="text-align: center" href="../logout.php"> Kijelentkezés</a>
            </ul>
        </div>
    </div>
</nav>

<?php
    if(isset($_POST["changepass"]))
    {
        $newpassword = $_POST['newpass'];

        include "Controllers/UserController.php";
        changePassword($newpassword);
    }
?>