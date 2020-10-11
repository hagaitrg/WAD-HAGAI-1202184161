<?php 

$flag = false;

if (isset($_POST['tekan'])) {
    $id_awal = 1;
    $id_akhir = 10000;
    $acak =rand($id_awal, $id_akhir);

    $nama = $_POST['nama'];
    $checkin = date('d/m/yy',strtotime($_POST['checkin']));
    $duration = $_POST['duration'];

    $start = new DateTimeImmutable($_POST['checkin']);
    $checkout = $start->modify('+'.$duration.' days');

    $tipe = $_POST['type'];
    $hp = $_POST['hp'];

    if ($tipe == 'Standard') {
        $harga = 90;
    }elseif($tipe == 'Superior'){
        $harga = 150;
    }elseif($tipe == 'Luxury'){
        $harga = 200;
    }

    $harga_serv=0;

    if (!empty($_POST['service'])) {
        $service = $_POST['service'];
        foreach($service as $key => $value){
            if($value == "Breakfast"){
                $harga_serv += 20;
            }
            if($value == "Room Service"){
                $harga_serv += 20;
            }
        }
        $total = ($harga * $duration) + $harga_serv;
    }else{
        $total = ($harga * $duration);
    }
    
    $flag = true;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>My Booking</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking.php">Booking</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Booking Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Check-out</th>
                    <th scope="col">Room Type</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Service</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php if($flag){ ?>
                    <th scope="row"><?=$acak ?></th>
                    <td><?=$nama ?></td>
                    <td><?=$checkin ?></td>
                    <td><?=$checkout->format('d/m/yy') ?></td>
                    <td><?=$tipe ?></td>
                    <td><?=$hp ?></td>
                    <td>
                        <?php if(empty($_POST['service'])) {?>
                        <?="No Service"?>
                        <ul>
                            <?php } else{?>
                            <?php foreach($service as $key => $value): ?>
                            <li><?=$value ?></li>
                            <?php endforeach;?>
                            <?php } ?>
                        </ul>
                    </td>
                    <td>$ <?=$total?></td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>