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
    </style>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary fixed-top" style="background-color: #704414" id="bar">
            <div class="container">
                <a href="admin_dashboard.php" class="navbar-brand" href="index.php">
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
                        <a href="dansubsektor_dashboard.php?logout='1'" class="text-decoration-none"><i class="fas fa-sign-out-alt mr-2" data-toggle="tooltip" title="Logout"></i></a>
                    </h4>
                </div>
        </nav>
        
    <div class="row no-gutters mt-5">
        <div class="col-md-2 pt-2 sidebar" style="background-color: #BD6A11">
        <ul class="nav flex-column pl-3 pr-3 pb-3 p-1 pt-3" style="background-color: #BD6A11">
            <li class="nav-item">
                <a class="nav-link text-white" href="wilayah.php"><i class="fas fa-monument mr-2"></i>Subsektor</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="wilayah_sektor.php" style="margin-bottom: 450px"><i class="fas fa-landmark mr-2"></i>Sektor</a><hr>
            </li>
        </ul>
        </div>
        <div class="col-md-10 p-5">
            <h3><i class="fas fa-landmark mr-2"></i> Tambah Wilayah Sektor</h3>
            <hr>
            <form action="#" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="id">ID Wilayah Sektor</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="id" class="form-control" placeholder="ID Wilayah" id="id">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="sektor">Sektor</label>
                        </div>
                        <div class="col-md-9">
                            <select name="sektor" id="sektor">
                                <option value='' selected>-- Pilih Sektor --</option>
                                <?php
                                    $result = "SELECT * FROM sektor ORDER BY id_sektor ASC ";
                                    $query = mysqli_query($conn,$result);
                                    while($row=mysqli_fetch_array($query)){
                                    echo "<option value='$row[id_sektor]'>$row[id_sektor]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="peta">GeoJSON Wilayah</label>
                        </div>
                        <div class="col-md-9">
                            <input type="file" name="peta" class="form-control" placeholder="peta" id="peta">
                        </div>
                    </div>
                </div>                    

                <div class="text-center mb-5">
                    <button type="submit" class="btn btn-primary p-2 pr-5 pl-5" name="tambah_wilayahsektor">Submit</button>
                </div>
            </form>
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