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
                <a class="nav-link text-white" href="admin_elemen.php"><i class="fas fa-mountain mr-2"></i>Sedimentasi Tanah</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_sampah.php"><i class="fas fa-recycle mr-2"></i>Pengumpulan Sampah</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_tps.php"><i class="fas fa-dumpster mr-2"></i>TPS</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_incinerator.php"><i class="fas fa-dumpster-fire mr-2"></i>Incinerator</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_tong.php"><i class="fas fa-trash mr-2"></i>Tempat Sampah</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_perusahaan.php"><i class="fas fa-building mr-2"></i>Perusahaan</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_taman.php"><i class="fas fa-parachute-box mr-2"></i>Taman</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_sanitasi.php"><i class="fas fa-bath mr-2"></i>Sanitasi</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_pohon.php"><i class="fas fa-tree mr-2"></i>Pohon</a>
            </li>
        </ul>
        </div>
        <div class="col-md-10 p-5">
            <h3><i class="fas fa-mountain mr-2"></i> Sedimentasi Tanah</h3>
            <hr>
            <a href="tambah_sedimentasi.php" class="btn btn-primary mb-3"><i class="fas fa-plus mr-2"></i>Tambah Sedimentasi</a>
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Subsektor</th>
                <th scope="col">Nama Sungai</th>
                <th scope="col">Panjang</th>
                <th scope="col">Lebar</th>
                <th scope="col">Tahun</th>
                <th scope="col">Volume Sedimentasi</th>
                <th scope="col">Keterangan</th>
                <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT * FROM sedimentasi ORDER BY id_subsektor ASC";
                $sql = mysqli_query($conn, $query);
                $no = 1;
                while($row = mysqli_fetch_array($sql)){
                echo "
                    <tr>
                    <td>$no</td>
                    <td>$row[id_subsektor]</td>
                    <td>$row[nama_sungai]</td>
                    <td>$row[panjang_sungai] m</td>
                    <td>$row[lebar_sungai] m</td>
                    <td>$row[tahun_sedimentasi]</td>
                    <td>$row[volume_sedimentasi] m3</td>
                    <td>$row[keterangan_sedimentasi]</td>
                    <td colspan='2' class='text-center'><a href='edit_sedimentasi.php?id=$row[id_sedimentasi]'><i class='fas fa-edit bg-warning p-2 text-white rounded mr-0' data-toggle='tooltip' title='edit'></i></a>
                    <a class='m-2' href='admin_elemen.php?deletesedimentasi=$row[id_sedimentasi]'><i class='fas fa-trash-alt bg-danger text-white p-2 rounded'></i></a></td>
                    </tr>";
                    $no++;
                }
            ?>
            </tbody>
            </table>
            
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