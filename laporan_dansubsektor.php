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
    .icon a{
        color: white;
        text-decoration: none;
    }
    .icon a:hover{
        color: #555;
    }
    .footer-copyright{
        background-color: #2f2f2f;
        color: white;
    }
    .card-body-icon{
        position: absolute;
        z-index: 0;
        top: 25px;
        right: 4px;
        opacity: 0.4;
        font-size: 90px;
    }
    .card a{
        text-decoration: none;
    }
    </style>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary fixed-top" style="background-color: #00A316" id="bar">
            <div class="container">
                <a href="dansektor_dashboard.php" class="navbar-brand" href="index.php">
                    <img src="img/logocitarum.png" width="30" height="30" class="d-inline-block align-top" alt="">  CitaCitarum</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                </ul>
                <span class="mr-5"><h5>Selamat Datang <?php echo $_SESSION["name"]?></h5></span>
                <div class="icon">
                    <h4>
                        <a href="admin_dashboard.php?logout='1'" class="text-decoration-none"><i class="fas fa-sign-out-alt mr-2" data-toggle="tooltip" title="Logout"></i></a>
                    </h4>
                </div>
        </nav>
        
        <div class="row no-gutters mt-5">
        <div class="col-md-2 pt-2 sidebar" style="background-color: #1A5722">
        <ul class="nav flex-column pl-3 pr-3 pb-3 p-1 pt-3" style="background-color: #1A5722">
            <li class="nav-item">
                <a class="nav-link text-white active" href="dansektor_dashboard.php"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_dansubsektor.php"><i class="fas fa-users mr-2"></i>Dansubsektor</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_sektor.php"><i class="fas fa-cube mr-2"></i>Sektor</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_subsektor.php"><i class="fas fa-cubes mr-2"></i>Subsektor</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_laporandansubsektor.php"><i class="fas fa-flag mr-2"></i>Laporan Dansubsektor</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_laporansektor.php"><i class="fab fa-elementor mr-2"></i>Laporan Sektor</a><hr>
            </li>
        </ul>
        </div>
        <div class="col-md-10 p-5">
            <h3><i class="fas fa-users-cog"></i> Profile Komando Sektor</h3>
            <hr>
            <div class="row">
                <div class="col-md-2 mr-5">
                    <img src="img/avatar.png" alt="Avatar" style="width:200px; border-radius:50%;">
                </div>
                <div class="col-md-9">
                    <?php
                        $id = $_SESSION["id_dansektor"];
                        $result = mysqli_query($conn, "SELECT * FROM `dansektor` WHERE id_dansektor = '$id'");
                        $row = mysqli_fetch_array($result);
                        $id = $row['id_dansektor'];
                        $sektor = $row['id_sektor'];
                        $username = $row['username_dansektor'];
                        $nama = $row['nama_dansektor'];
                        $jabatan = $row['pangkat_dansektor'];
                    ?>
                    <div class="p-2" id="id">
                        <h7><b><span style="margin-right: 82px;">ID</span> <span class="mr-2">:</span> </b> <?php echo $id ?></h7>
                    </div>
                    <div class="p-2" id="sektor">
                        <h7><b><span style="margin-right: 50px;">Sektor</span> <span class="mr-2">:</span> </b> <?php echo $sektor ?></h7>
                    </div>
                    <div class="p-2" id="username">
                        <h7><b><span class="mr-4">Username</span> <span class="mr-2">:</span> </b> <?php echo $username ?></h7>
                    </div>
                    <div class="p-2" id="nama">
                        <h7><b><span style="margin-right: 55px;">Nama</span> <span class="mr-2">:</span> </b> <?php echo $nama ?></h7>
                    </div>
                    <div class="p-2" id="pangkat">
                        <h7><b><span style="margin-right: 38px;">Pangkat</span> <span class="mr-2">:</span> </b> <?php echo $jabatan ?></h7>
                    </div>
                </div> 
            </div>
            <br><br>
            <h3><i class="fas fa-info-circle mr-2"></i>Summary </h3>
            <hr>
            <div class="row text-white">

                <div class="card bg-info ml-3" style="width: 18rem;">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-users mr-2"></i>
                        </div>
                        <h5 class="card-title text-white">JUMLAH DANSUBSEKTOR</h5>
                        <div class="text-white display-4">
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM dansubsektor");
                            $member = mysqli_num_rows($result);
                            echo"$member";
                            ?>
                        </div>
                        <a href="dansektor_dansubsektor.php"><p class="card-text text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></p></a>
                    </div>
                </div>

               
            </div>
        </div>
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