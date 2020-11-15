<?php

include("logic.php");

$konek = new logic();

if (isset($_POST['submit'])) {
    $nama = $_POST['name'];
    $desc = $_POST['desc'];
    $kategori = implode(" ", $_POST['kategori']);
    $tgl = $_POST['tanggal'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];
    $tempat = $_POST['tempat'];
    $harga = $_POST['harga'];
    $benefit = implode(",", $_POST['benefit']);

    $namaIMG = $_FILES['img']['name'];
    $ukuranIMG = $_FILES['img']['size'];
    $errorIMG = $_FILES['img']['error'];
    $tmptIMG = $_FILES['img']['tmp_name'];

    $konek->upload($namaIMG, $ukuranIMG, $errorIMG, $tmptIMG);

    $cek = $konek->create($nama, $desc, $kategori, $tgl, $mulai, $selesai, $tempat, $harga, $benefit, $namaIMG, $ukuranIMG, $errorIMG, $tmptIMG);

    if ($cek > 0) {
        echo
            "
        <script> 
            alert('Berhasil Input Event');
            document.location.href = 'home.php';
        </script>
    ";
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <title>Buat Event</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="home.html">EAD EVENTS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item">
                    <a class="nav-link text-light" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <a href="BuatEvent.html"></a><button class="btn btn-outline-light my-2 my-sm-0 mr-5" type="submit">Buat
                Event</button>
        </div>
    </nav>

    <div class="row">
        <div class="container-fluid">
            <h3 class="text-info ml-5 mt-3">Buat Event</h3>
        </div>
    </div>

    <div class="row">
        <div class="container-fluid ml-4 mr-4 mt-3">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="card-group">
                    <div class="col-sm-6">
                        <div class="card h-100">
                            <div class="card-header bg-danger">
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Deskripsi</label>
                                    <textarea class="form-control" rows="3" name="desc"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="img">Upload Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="img" id="customFile">
                                        <label class="custom-file-label" for="img">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label> <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori[]" id="inlineRadio1" value="Online">
                                        <label class="form-check-label" for="inlineRadio1">Online</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori[]" id="inlineRadio2" value="Offline">
                                        <label class="form-check-label" for="inlineRadio2">Offline</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card h-100">
                            <div class="card-header bg-primary">
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="mulai">Jam Mulai</label>
                                            <input type="time" class="form-control" name="mulai" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="selesai">Jam Berakhir</label>
                                            <input type="time" class="form-control" name="selesai" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tempat</label>
                                    <input type="text" class="form-control" name="tempat">
                                </div>
                                <div class="form-group">
                                    <label for="name">Harga</label>
                                    <input type="text" class="form-control" name="harga">
                                </div>
                                <div class="form-group">
                                    <label>Benefit</label> <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="benefit[]" value="Snacks">
                                        <label class="form-check-label">Snacks</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="benefit[]" value="Sertifikat">
                                        <label class="form-check-label">Sertifikat</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="benefit[]" value="Souvenir">
                                        <label class="form-check-label">Souvenir</label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mr-1" name="submit">Submit</button>
                                    <a href="BuatEvent.php"><button type="button" class="btn btn-danger">Cancel</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#customFile').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
</body>

</html>