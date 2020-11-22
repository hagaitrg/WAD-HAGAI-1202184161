<?php
include("logic.php");
$db = new logic();



if (isset($_POST['regis'])) {
    if ($db->registrasi($_POST) > 0) {
        $coba = true;
    } else {
        echo mysqli_error($db->conn);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <style>
        body {
            background-color: aquamarine;
        }
    </style>

    <title>Registrasi</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand text-secondary" href="#">WAD Beauty</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="login.php">Login</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="register.php">Register <span class="sr-only">(current)</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if (isset($_POST['regis'])) { ?>
        <?php if (isset($coba)) { ?>
            <div class="alert alert-warning" role="alert">
                Berhasil registrasi!
            </div>
        <?php } else { ?>
            <div class="alert alert-warning" role="alert">
                Gagal registrasi!
            </div>
        <?php } ?>
    <?php } ?>

    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <div class="row">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 30rem;">
                    <div class="card-body">
                        <div class="container">
                            <h3 class="card-title text-center text-secondary">Registrasi</h3>
                            <hr>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control col-sm-10" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control col-sm-10" name="email" aria-describedby="emailHelp" required>
                                </div>
                                <div class="form-group">
                                    <label for="hp">No. Handphone</label>
                                    <input type="text" class="form-control col-sm-10" name="hp" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" class="form-control col-sm-10" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Konfirmasi Kata Sandi</label>
                                    <input type="password" class="form-control col-sm-10" name="password2" required>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary mb-2" name="regis">Daftar</button>
                                </div>
                                <p class="text-center">Sudah Punya akun? <a href="login.php">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>