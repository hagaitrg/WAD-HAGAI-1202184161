<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Booking</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="booking.php">Booking <span class="sr-only">(current)</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <form class="mt-5" method="post">
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="checkin">Check-in</label>
                        <input type="date" class="form-control" id="checkin" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" id="duration">
                        <small>Day(S)</small>
                    </div>
                    <div class="form-group">
                        <label for="type">Room Type</label>
                        <input type="text" class="form-control" id="type" placeholder="Luxury" value="Luxury" disabled>
                    </div>
                    <div>
                        <p>Add Services(S)</p>
                    </div>
                    <small>$ 20/Service</small>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="rmser">
                        <label class="form-check-label" for="Room Service">Room Service</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="breakfast">
                        <label class="form-check-label" for="Breakfast">Breakfast</label>
                    </div>
                    <div class="form-group">
                        <label for="no hp">Phone Number</label>
                        <input type="text" class="form-control" id="hp">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Book</button>
                </form>
            </div>
            <div class="col-sm-6">
                <div class="container ml-5">
                    <img src="./img/luxury.jpg" class="mt-5" width="500px" height="500px">
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