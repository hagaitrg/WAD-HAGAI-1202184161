<?php
include("logic.php");

$db = new logic();

if (isset($_COOKIE['email'])) {
    $nama = $_COOKIE['nama'];
} else {
    header("Location:index.php");
}


if (isset($_POST['tambah'])) {
    $id = $_COOKIE['id'];
    $barang = $_POST['barang'];
    $harga = $_POST['harga'];

    $cek = $db->create_cart($id, $barang, $harga);

    if ($cek > 0) {
    }
}

$nav = $_REQUEST['color'] ?? 'light';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        .header {
            background: rgb(114, 9, 121);
            background: linear-gradient(90deg, rgba(114, 9, 121, 1) 14%, rgba(0, 212, 255, 1) 100%);
        }
    </style>

    <title>Home</title>
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
                        <a class="dropdown-item" href="cart.php">Cart</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <?php if (isset($_POST['tambah'])) { ?>
        <?php if ($flag) { ?>
            <div class="alert alert-warning" role="alert">
                Berhasil Ditambahkan!
            </div>
        <?php } else { ?>
            <div class="alert alert-warning" role="alert">
                Gagal Tambah Barang!
            </div>
        <?php } ?>
    <?php } ?>

    <div class="conatainer">
        <div class="d-flex justify-content-center">
            <div class="row mt-3">
                <div class="card mb-5 " style="width: 70rem;">
                    <div class="card-body text-center header text-light">
                        <h3 class="card-title">WAD Beauty</h3>
                        <p>Tersedia Skin Care dengan harga murah tapi bukan murahan dan berkualitas</p>
                    </div>
                    <div class="card-group">
                        <div class="card">
                            <img src="/assetsimg/img1.jpg" class="card-img-top" height="350px">
                            <div class="card-body">
                                <h4 class="card-title">YUJA NIACIN 30 DAYS BLEMISH CARE SERUM</h4>
                                <p class="card-text">Produk terbaru dari somebymi yang memiliki manfaat untuk WHitening
                                    + blemish care + Anti-wrinkle, sangat recomended untuk masalah kulit
                                    kusam, kulit kering, dan bekas jerawat atau FLEK hitam.
                                </p>
                                <hr>
                                <p class="card-text">Rp169.000</p>
                                <form action="" method="post">
                                    <input type="hidden" name="barang" value="Yuja Niacin">
                                    <input type="hidden" name="harga" value="169000">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm btn-block" name="tambah">Tambah ke
                                    Keranjang</button>
                            </div>
                            </form>
                        </div>
                        <div class="card">
                            <img src="/assets/img/img2.jpg" class="card-img-top" height="350px">
                            <div class="card-body" style="height: 285px;">
                                <h5 class="card-title">SOMEBYMI Snail Truecica Miracle Rpair Cream</h5>
                                <p class="card-text">Sebagai pelembap, krim ini mampu memberikan kelembapan yang
                                    menyerluruh dan tahan lama bagi kulit, sehingga terasa halus, lembap, dan kenyal.
                                </p>
                                <hr>
                                <p class="card-text">Rp180.000</p>
                                <form action="" method="post">
                                    <input type="hidden" name="barang" value="Snail Truecica">
                                    <input type="hidden" name="harga" value="180000">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm btn-block" name="tambah">Tambah ke
                                    Keranjang</button>
                            </div>
                            </form>
                        </div>
                        <div class="card">
                            <img src="/assets/img/img3.jpg" class="card-img-top" height="350px">
                            <div class="card-body" style="height: 285px;">
                                <h5 class="card-title">30 DAYS MIRACLE TONER</h5>
                                <p class="card-text">Dengan kandungan AHA, BHA, dan PHA bekerja secara efektif untuk
                                    membuat kuliat lebih bersih dan lebih bersinar, mengandung 10.000 ppm ekstrak pohon
                                    teh alami.</p>
                                <hr>
                                <p class="card-text">Rp108.000</p>
                                <form action="" method="post">
                                    <input type="hidden" name="barang" value="Miracle Toner">
                                    <input type="hidden" name="harga" value="108000">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm btn-block" name="tambah">Tambah ke
                                    Keranjang</button>
                                </form>
                            </div>
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