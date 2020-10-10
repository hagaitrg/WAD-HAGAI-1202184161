<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Home</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking.php">Booking</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3 mb-5">
        <h2 class="text-center text-primary">EAD HOTEL</h2>
        <h5 class="text-center text-primary">Welcome To 5 Star Hotel</h5>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card shadow bg-white rounded">
                    <img src="./img/standar.jpg" class="card-img-top" height="300px" width="300px" name="img">
                    <div class="card-body">
                        <h5 class="card-title text-center">Standard</h5>
                        <h5 class="card-title text-primary text-center mb-4">$ 90/Day</h5>
                        <div class="card-header text-center">
                            Facilities
                        </div>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">1 Single Bed</li>
                            <li class="list-group-item">1 Bathroom</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center mt-4">
                        <a href="booking.php?type=<?php echo'Standard&img=standar'?>"><button type="button"
                                class="btn btn-primary">Book Now</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card shadow bg-white rounded">
                    <img src="./img/superior.jpg" class="card-img-top" height="300px" width="300px">
                    <div class="card-body">
                        <h5 class="card-title text-center">Superior</h5>
                        <h5 class="card-title text-primary text-center mb-4">$ 150/Day</h5>
                        <div class="card-header text-center">
                            Facilities
                        </div>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">1 Double Bed</li>
                            <li class="list-group-item">1 Television and Wi-Fi</li>
                            <li class="list-group-item">1 Bathroom with hot water</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center mt-4">
                        <a href="booking.php?type=<?php echo'Superior&img=superior'?>"><button type="button" class="btn btn-primary">Book Now</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card shadow bg-white rounded mb-5">
                    <img src="./img/luxury.jpg" class="card-img-top" height="300px" width="300px">
                    <div class="card-body">
                        <h5 class="card-title text-center">Luxury</h5>
                        <h5 class="card-title text-primary text-center mb-4">$ 200/Day</h5>
                        <div class="card-header text-center">
                            Facilities
                        </div>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">2 Double Bed</li>
                            <li class="list-group-item">2 Bathroom with hot water</li>
                            <li class="list-group-item">1 Kitchen</li>
                            <li class="list-group-item">1 Television and Wi-Fi</li>
                            <li class="list-group-item">1 Workroom</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center mt-4">
                        <a href="booking.php?type=<?php echo'Luxury&img=luxury'?>"><button type="button" class="btn btn-primary">Book Now</button></a>
                    </div>
                </div>
            </div>
        </div>
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