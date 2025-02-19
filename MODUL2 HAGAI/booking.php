<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script type="text/javascript" language='javascript'>
    function flip() {
        myimage.src = ColorSelect.children[ColorSelect.selectedIndex].getAttribute('url');
    }
    </script>
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
                <form class="mt-5" action="mybooking.php" method="post">
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="checkin">Check-in</label>
                        <input type="date" class="form-control" name="checkin" required>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" name="duration" required>
                        <small>Day(S)</small>
                    </div>
                    <div class="form-group">
                        <label for="type">Room Type</label>
                        <?php if (empty($_GET['type'])){?>
                        <select class="custom-select" id="imgset" onchange="javascript:flip();" name="type" required>
                            <option value="Standard" url="./img/standar.jpg">
                                Standard</option>
                            <option value=" Superior" url="./img/superior.jpg">
                                Superior</option>
                            <option value=" Luxury" url="./img/luxury.jpg">Luxury</option>
                        </select>
                        <?php } else{
                            $type = $_GET['type'];
                            $check = is_null($type);
                            if ($check != 1) {
                                echo'<input type="text" class="form-control" name="type" value="'.$type.'" readonly>';
                            }else{
                                echo '
                                <select class="custom-select" id="imgset" onchange="javascript:flip();" nama="type" required>
                                    <option value="Standard" url="./img/standar.jpg">
                                        Standard</option>
                                    <option value="Superior" url="./img/superior.jpg">
                                        Superior</option>
                                    <option value="Luxury" url="./img/luxury.jpg">Luxury</option>
                                </select>';
                            }

                        } ?>
                    </div>
                    <div>
                        <p>Add Services(S)</p>
                    </div>
                    <small>$ 20/Service</small>
                    <div class=" form-group form-check">
                                <input type="checkbox" class="form-check-input" name="service[]" value="Room Service">
                                <label class="form-check-label" for="service">Room Service</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="service[]" value="Breakfast">
                        <label class="form-check-label" for="service">Breakfast</label>
                    </div>
                    <div class="form-group">
                        <label for="no hp">Phone Number</label>
                        <input type="text" class="form-control" name="hp" required>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" name="tekan" value="Book">
                </form>
            </div>
            <div class="col-sm-6">
                <div class="container ml-5">
                    <?php if (empty($_GET['img'])) {
                        echo '<img src="./img/standar.jpg" class="mt-5" width="500px" height="500px" id="img">'; 
                    }else{
                        echo '<img src="./img/'.$_GET['img'].'.jpg" class="mt-5" width="500px" height="500px" id="img">';
                    }?>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" language='javascript'>
    // place this after <body> to run it after body has loaded.
    var myimage = document.getElementById('img');
    var ColorSelect = document.getElementById('imgset');
    </script>

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