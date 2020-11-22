<?php
session_start();

include("logic.php");

$db = new logic();

if (isset($_SESSION['email'])) {
    $nama = $_SESSION['nama'];
    $id = $_SESSION['id'];
} else {
    header("Location:login.php");
}

if (!is_null($id)) {
    $id_usr = $db->get_id($id);
}

if (isset($_POST['edit'])) {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $pwd = $_POST['password'];
    $warna = $_POST['warna'];

    $edit = $db->edit($id, $nama, $email, $hp, $pwd, $warna);

    $flag = false;

    if ($edit > 0) {
        $flag = true;
    }
}

$nav = $_COOKIE['colors'] ?? 'light';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Profile</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-<?= $nav ?> bg-<?= $nav ?>">
        <a class="navbar-brand text-secondary" href="index.php">WAD Beauty</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto mt-2 mr-4">
                <p>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg> Selamat Datang,
                </p>
                <div class="dropdown">
                    <a class="dropdown-toggle mt-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $nama ?>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <?php if (isset($_POST['edit'])) { ?>
        <?php if ($flag) { ?>
            <div class="alert alert-warning" role="alert">
                Berhasil Diupdate!
            </div>
        <?php } else { ?>
            <div class="alert alert-warning" role="alert">
                Gagal Diupdate!
            </div>
        <?php } ?>
    <?php } ?>

    <div class="container">
        <h1 class="text-center mt-5">Profile</h1>
        <div class="d-flex justify-content-center">
            <form class="col-sm-10" action="" method="post">
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" name="email" value="<?= $id_usr['email'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" value="<?= $id_usr['nama'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="hp" value="<?= $id_usr['no_hp'] ?>">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password2" class="col-sm-2 col-form-label">Password Confirm</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="warna" class="col-sm-2 col-form-label">Warna Navbar</label>
                    <div class="col-sm-10">
                        <select name="warna">
                            <option value="light">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="edit">Submit</button>
                <p class="text-center mt-4">Cancel</p>
                <p class="text-center mt-5">&#169; 2020 Copyright <a href="index.html">WAD Beauty</a></p>
            </form>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>