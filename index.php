<?php 
include("connect.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <title>Index</title>

    <style>
    .navbar{
        color: white;
    }
    #jumbotron1{
        background-image: url(img/opacity90.jpg);
        color: white;
        padding: 50px;
    }
    #jumbotron1 button{
        border-radius: 15px;
        padding: 10px 20px 10px 20px;
    }
    #jumbotron2{
        background-image: url(img/aircraft2.png);
        color: white;
        padding: 50px;
    }
    #jumbotron2 button{
        border-radius: 15px;
        padding: 10px 20px 10px 20px;
    }
    .footer-copyright{
        background-color: #2f2f2f;
        color: white;
    }
    </style>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="bar">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logocitarum.png" width="30" height="30" class="d-inline-block align-top" alt="">  CitaCitarum</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Kami</a>
                    </li>
                </ul>
                <span><h6><i class="fas fa-sign-in-alt ml-4 mr-1" data-toggle="tooltip" title="Login"></i></h6></span>
                <ul class="navbar-nav">
                <div class="icon">
                <li class="nav-item dropdown">
                    <h6>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="login_dansektor.php">Dansektor</a>
                            <a class="dropdown-item" href="login_dansubsektor.php">Dansubsektor</a>
                            <a class="dropdown-item" href="login_admin.php">Admin</a>
                        </div>
                    </h6>
                </li>
                </ul>
                </div>
        </nav>
        <div id="jumbotron1" class="container col-sm-12 text-center">
            <h1><strong>Technology for Better Future Citarum</strong></h1>
            <p class="mb-5">Semua Aktivitas Satuan Tugas Citarum Terintegrasi Disini</p>
            <p class="mb-5"><img src="img/river.png" alt="stream" width="200" height="200"></p>
            <form action="index.php" action="get">
                <button class="btn btn-primary mb-5" name="join">Join CitaCitarum Now</button>
            </form>
        </div>
        <div id="jumbotron2" class="container col-sm-12 text-center">
            <h1><strong>Tell Us What Do You Think</strong></h1>
            <p style="margin-bottom: 200px"> Your opinion</p>
            <form action="index.php" action="get">
                <button class="btn btn-primary mt-5 mb-5" name="join">Join CitaCitarum Now</button>
            </form>
        </div>
        <footer>
            <div class="footer-copyright text-center py-3">© 2020 Copyright: Rully Rachman
            </div>
        </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>