<?php
$konek = new logic();

$data = $konek->read();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <title>Home</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="home.html">EAD EVENTS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item active">
                    <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <a href="BuatEvent.php"><button class="btn btn-outline-light my-2 my-sm-0 mr-5" type="button">Buat
                    Event</button></a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <h3 class="mt-5 text-info" style="width:100% ;text-align: center;">WELCOME TO EAD EVENTS!</h3>
        </div>

        <?php if ($data > 0) { ?>
            <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="card shadow" style="width: 20rem; height:100%;">
                            <img src="./assets/img/<?= $d['gambar'] ?>" class="card-img-top" alt="" width="250px" height="250px">
                            <div class="card-body">
                                <h3 class="card-title"><?= $d['name'] ?></h3>
                                <p class="card-text"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar3 text-warning" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                        <path fill-rule="evenodd" d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg> <?= $d['tanggal'] ?> </p>
                                <p class="card-text">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt-fill text-warning" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg> <?= $d['tempat'] ?></p>
                                <p class="card-text">Kategori : <?= $d['kategori'] ?> </p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="DetailsEvent.php?id=<?= $d['id'] ?>" class="btn btn-primary  btn-block">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
        <?php } else { ?>
            <div class="row">
                <h6 class="mt-5">No Events Found</h6>
            </div>
        <?php } ?>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>