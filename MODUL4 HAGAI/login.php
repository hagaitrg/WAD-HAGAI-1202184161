<?php

if (isset($_REQUEST['login'])) {
    if ($_REQUEST['login'] == 'true') {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $login = mysqli_query($db, "select * from user where email = '$email'");
    if (mysqli_fetch_assoc($login) > 0) {
        $data = mysqli_num_rows($login);
        if (password_verify($pwd, $data['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['login'] = true;
            if (isset($_POST['ingat'])) {

                setscookie('login', 'true', strtotime('+5 years'));
            }
        }
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

    <title>Login</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand text-secondary" href="index.php">WAD Beauty</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="register.php">Register </a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if (isset($_POST['login'])) { ?>
        <?php if ($flag) { ?>
            <div class="alert alert-warning" role="alert">
                Berhasil Login!
            </div>
        <?php } else { ?>
            <div class="alert alert-warning" role="alert">
                Gagal Login!
            </div>
        <?php } ?>
    <?php } ?>


    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <div class="row">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 30rem;">
                    <div class="card-body">
                        <div class="container">
                            <h3 class="card-title text-center text-secondary">Login</h3>
                            <hr>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control col-sm-10" name="email" aria-describedby="emailHelp" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" class="form-control col-sm-10" name="password" required>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="ingat">
                                    <label class="form-check-label" for="ingat">Remember me</label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary mb-2" name="login">Login</button>
                                </div>
                                <p class="text-center">Belum Punya akun? <a href="register.php">Registrasi</a></p>
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