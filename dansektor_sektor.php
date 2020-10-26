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
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="crossorigin=""/>
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
    #mapid { height: 450px; }
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
                        <a href="dansubsektor_dashboard.php?logout='1'" class="text-decoration-none"><i class="fas fa-sign-out-alt mr-2" data-toggle="tooltip" title="Logout"></i></a>
                    </h4>
                </div>
        </nav>
        
        <div class="row no-gutters mt-5">
        <div class="col-md-2 pt-2 sidebar" style="background-color:#1A5722">
        <ul class="nav flex-column pl-3 pr-3 pb-3 p-1 pt-3" style="background-color: #1A5722">
            <li class="nav-item">
                <a class="nav-link text-white active" href="dansektor_dashboard.php"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_dansubsektor.php"><i class="fas fa-users mr-2"></i>Dansubsektor</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_sektor.php" ><i class="fas fa-cube mr-2"></i>Sektor</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_subsektor.php"><i class="fas fa-cubes mr-2"></i>Subsektor</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_laporandansubsektor.php"><i class="fas fa-flag mr-2"></i>Laporan Dansubsektor</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_laporansektor.php" style="margin-bottom: 410px;"><i class="fab fa-elementor mr-2"></i>Laporan Sektor</a><hr>
            </li>
        </ul>
        </div>
        <div class="col-md-10 p-5">
            <h3><i class="fas fa-users mr-2"></i> Informasi Keseluruhan Sektor</h3>
            <hr>
            <div id="mapid"></div>
            <div class="p-4"id="informasi">
            <?php 
                $id_dansektor = $_SESSION["id_dansektor"];
                $query = "SELECT * FROM `sektor` INNER JOIN `dansektor` ON sektor.id_sektor = dansektor.id_sektor ";
                $sql = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($sql);

                $result = mysqli_query($conn, "SELECT * FROM subsektor");
                $jumlah_subsektor = mysqli_num_rows($result);

                $taman = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah FROM `taman`");
                $jumlah_taman = mysqli_fetch_array($taman);

                $tps = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah FROM `tps`");
                $jumlah_tps = mysqli_fetch_array($tps);

                $tempatsampah = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah FROM `tempatsampah`");
                $jumlah_tempatsampah = mysqli_fetch_array($tempatsampah);

                $incinerator = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah FROM `incinerator`");
                $jumlah_incinerator = mysqli_fetch_array($incinerator);

                $perusahaan = mysqli_query($conn, "SELECT * FROM perusahaan");
                $jumlah_perusahaan = mysqli_num_rows($perusahaan);

                $sanitasi = mysqli_query($conn, "SELECT SUM(jumlah_sanitasi) AS jumlah FROM `sanitasi`");
                $jumlah_sanitasi = mysqli_fetch_array($sanitasi);
                
                $pohon = mysqli_query($conn, "SELECT SUM(jumlah_pohon) AS jumlah FROM `pohon`");
                $jumlah_pohon = mysqli_fetch_array($pohon);

                $sampah = mysqli_query($conn, "SELECT SUM(volume_sampah) AS jumlah FROM `sampah`");
                $jumlah_sampah = mysqli_fetch_array($sampah);

                $sedimentasi = mysqli_query($conn, "SELECT SUM(volume_sedimentasi) AS jumlah FROM `sedimentasi`");
                $jumlah_sedimentasi = mysqli_fetch_array($sedimentasi);
            ?>
             <table class="table table-striped table-bordered">
                <tr>
                    <td><h5>Nomor Sektor </td> 
                    <td><?php echo $row['nomor_sektor']?></td>
                </tr>
                <tr>
                    <td><h5>Nama Dansektor</h5></td> 
                    <td><?php echo $row['nama_dansektor']?> </td>
                </tr>
                <tr>
                    <td><h5>Jumlah Subsektor</h5></td>
                    <td><?php echo $jumlah_subsektor?></td>
                </tr>
                <tr>
                    <td><h5>Panjang Sungai Citarum </td> 
                    <td>10.24 Km</td>
                </tr>
                <tr>
                    <td><h5>Jumlah Taman</h5></td>
                    <td><?php echo $jumlah_taman['jumlah']?></td>
                </tr>
                <tr>
                    <td><h5>Jumlah TPS</h5></td>
                    <td><?php echo $jumlah_tps['jumlah']?></td>
                </tr>
                <tr>
                    <td><h5>Jumlah Tempat Sampah</h5></td>
                    <td><?php echo $jumlah_tempatsampah['jumlah']?></td>
                </tr>
                <tr>
                    <td><h5>Jumlah Incinerator</h5></td>
                    <td><?php echo $jumlah_incinerator['jumlah']?></td>
                </tr>
                <tr>
                    <td><h5>Jumlah Perusahaan</h5></td>
                    <td><?php echo  $jumlah_perusahaan?></td>
                </tr>
                <tr>
                    <td><h5>Jumlah IPAL Komunal</h5></td>
                    <td><?php echo $jumlah_sanitasi['jumlah']?></td>
                </tr>
                <tr>
                    <td><h5>Jumlah Pohon</h5></td>
                    <td><?php echo $jumlah_pohon['jumlah']?></td>
                </tr>
                <tr>
                    <td><h5>Volume Sampah (m3)</h5></td>
                    <td><?php echo $jumlah_sampah['jumlah']?></td>
                </tr>
                <tr>
                    <td><h5>Volume Sedimentasi Tanah (m3)</h5></td>
                    <td><?php echo $jumlah_sedimentasi['jumlah']?></td>
                </tr>
            </table>
            </div>
        </div>
    </div>
        <footer>
            <div class="footer-copyright text-center py-3">© 2020 Copyright: Rully Rachman
            </div>
        </footer>
    
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
    <script src="panel/src/leaflet-panel-layers.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
    
    <script>
        var mymap = L.map('mapid').setView([-7.000074, 107.651766], `13`);
        var awal = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoicnVsbHlyIiwiYSI6ImNrNnZ2anhlODA2NWszbW1nZWJmMWVuOGUifQ.gVJkBGCAoGh5X-y-0s9WBg'
            });
            mymap.addLayer(awal);
        var stylecitarum = {
            "color" : "orange",
            "weight" : 5 
        };
            var sektor6 = new L.GeoJSON.AJAX(["geojson/Sektor6.geojson"],{}).addTo(mymap).bindPopup('Sektor 6');
            var citarum = new L.GeoJSON.AJAX(["geojson/citarum.geojson"],{style: stylecitarum}).addTo(mymap).bindPopup('Sungai Citarum');    
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>