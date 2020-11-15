<?php
include("logic.php");
$db = new logic;
$id = $_GET['id'];


if (!empty($id)) {
    $get_id = $db->get_id($id);
    $kategori = $get_id['kategori'];
    $benefit = explode(",", $get_id['benefit']);
} else {
    echo
        "
        <script> 
            alert('Gagal mendapat id');
            document.location.href = 'home.php';
        </script>
    ";
}

if (isset($_POST['delete'])) {
    $del = $db->delete($id);

    if ($del > 0) {
        echo
            "
        <script> 
            alert('Berhasil Delete Event');
            document.location.href = 'home.php';
        </script>
    ";
    }
} else {
    "
    <script> 
        alert('Gagal Delete Event');
        document.location.href = 'DetailsEvent.php';
    </script>
";
}

if (isset($_POST['edit'])) {
    $idd = $_POST['idd'];
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

    $db->upload($namaIMG, $ukuranIMG, $errorIMG, $tmptIMG);

    $edit = $db->edit($idd, $nama, $desc, $kategori, $tgl, $mulai, $selesai, $tempat, $harga, $benefit, $namaIMG, $ukuranIMG, $errorIMG, $tmptIMG);

    if ($edit > 0) {
        echo
            "
        <script> 
            alert('Berhasil Edit Event');
            document.location.href = 'DetailsEvent.php?id=$idd';
        </script>
        ";
    } else {
        "
        <script> 
            alert('Gagal Edit Event');
            document.location.href = 'home.php';
        </script>
    ";
        exit();
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

    <title>Detail Event</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="home.php">EAD EVENTS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <a href="BuatEvent.php"><button class="btn btn-outline-light my-2 my-sm-0 mr-5" type="button">Buat
                    Event</button></a>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3">
            <h3 class="text-info w-100 text-center">Detail Event!</h3>
        </div>

        <div class="row">
            <form action="" method="post">
                <div class="card ml-5 mr-5 mb-5 shadow mt-3">
                    <img src="./assets/img/<?= $get_id['gambar'] ?>" class="card-img-top" alt="" height="500px">
                    <div class="card-body">
                        <h3 class="card-title"><?= $get_id['name'] ?></h3>
                        <h6 class="mt-4 h6">Deskripsi</h6>
                        <p class="card-text"><?= $get_id['deskripsi'] ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="h6">Informasi Event</h6>
                                <p><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar3 text-warning mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                        <path fill-rule="evenodd" d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg> <?= $get_id['tanggal'] ?></p>
                                <p>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt-fill text-warning mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg> <?= $get_id['tempat'] ?>
                                </p>
                                <p>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock text-warning mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z" />
                                        <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                    </svg> <?= $get_id['mulai'] ?> - <?= $get_id['berakhir'] ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="h6">Benefit</h6>
                                <ul>
                                    <li>
                                        <?= $get_id['benefit'] ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h6 class="h6">Kategori : <?= $get_id['kategori'] ?></h6>
                        <h6 class="h6">HTM Rp. <?= $get_id['harga'] ?></h6>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" name="edit">
                                Edit
                            </button>
                            <button type="submit" class="btn btn-danger ml-2" name="delete" onclick="return confirm('Yakin Delete Event?');">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:1000px;">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Content Event</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="container ml-3 mr-3">
                                <input type="hidden" name="idd" value="<?= $get_id['id'] ?>">
                                <div class="card-group">
                                    <div class="col-sm-6">
                                        <div class="card h-100">
                                            <div class="card-header bg-danger">
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?= $get_id['name'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="desc">Deskripsi</label>
                                                    <textarea class="form-control" rows="3" name="desc"><?= $get_id['deskripsi'] ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="img">Upload Gambar</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="img" id="customFile" value="<?= $get_id['gambar'] ?>">
                                                        <label class="custom-file-label" for="img">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kategori</label> <br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="kategori[]" id="inlineRadio1" value="Online" <?php if ($kategori === "Online") echo "checked"; ?>>
                                                        <label class="form-check-label" for="inlineRadio1">Online</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="kategori[]" id="inlineRadio2" value="Offline" <?php if ($kategori === "Offline") echo "checked"; ?>>
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
                                                    <input type="date" class="form-control" name="tanggal" value="<?= $get_id['tanggal'] ?>">
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="mulai">Jam Mulai</label>
                                                            <input type="time" class="form-control" name="mulai" value="<?= $get_id['mulai'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="selesai">Jam Berakhir</label>
                                                            <input type="time" class="form-control" name="selesai" value="<?= $get_id['berakhir'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Tempat</label>
                                                    <input type="text" class="form-control" name="tempat" value="<?= $get_id['tempat'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Harga</label>
                                                    <input type="text" class="form-control" name="harga" value="<?= $get_id['harga'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Benefit</label> <br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="benefit[]" value="Snacks" <?php if (in_array("Snacks", $benefit)) echo "checked"; ?>>
                                                        <label class="form-check-label">Snacks</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="benefit[]" value="Sertifikat" <?php if (in_array("Sertifikat", $benefit)) echo "checked"; ?>>
                                                        <label class="form-check-label">Sertifikat</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="benefit[]" value="Souvenir" <?php if (in_array("Souvenir", $benefit)) echo "checked"; ?>>
                                                        <label class="form-check-label">Souvenir</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
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