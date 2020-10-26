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
    #mapid { height: 500px; }
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
                <a class="nav-link text-white active" href="dansektor_laporansektor.php"><i class="fas fa-parachute-box mr-2"></i>Taman</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_perusahaan.php"><i class="fas fa-building mr-2"></i>Perusahaan</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_tps.php" ><i class="fas fa-dumpster mr-2"></i>TPS</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_tempatsampah.php"><i class="fas fa-trash mr-2"></i>Tempat Sampah</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_Incinerator.php"><i class="fas fa-dumpster-fire mr-2"></i>Incinerator</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_pohon.php"><i class="fas fa-tree mr-2"></i>Pohon</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_sanitasi.php"><i class="fas fa-bath mr-2"></i>Sanitasi</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_sedimentasi.php"><i class="fas fa-mountain mr-2"></i>Volume Sedimentasi</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="dansektor_sampah.php" style="margin-bottom: 410px;"><i class="fas fa-recycle mr-2"></i>Volume Sampah</a><hr>
            </li>
        </ul>
        </div>
        <div class="col-md-10 p-5">
            <h3><i class="fas fa-building mr-2"></i>Perusahaan</h3>
            <hr>
            <div id="mapid"></div>
            <br>
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Perusahaan</th>
                <th scope="col">Subsektor</th>
                <th scope="col">Kelurahan</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT * FROM perusahaan ORDER BY id_subsektor ASC";
                $sql = mysqli_query($conn, $query);
                $no = 1;
                while($row = mysqli_fetch_array($sql)){
                echo "
                    <tr>
                    <td>$no</td>
                    <td>$row[nama_perusahaan]</td>
                    <td>$row[id_subsektor]</td>
                    <td>$row[kecamatan]</td>
                    <td>$row[kelurahan]</td>
                    <td>$row[latitude]</td>
                    <td>$row[longitude]</td>
                    <td>$row[keterangan]</td>
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
    
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
    <script src="panel/src/leaflet-panel-layers.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
    
    <script>
        var map = L.map('mapid').setView([-7.000074, 107.651766], `13`);
        var awal = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoicnVsbHlyIiwiYSI6ImNrNnZ2anhlODA2NWszbW1nZWJmMWVuOGUifQ.gVJkBGCAoGh5X-y-0s9WBg'
            });
            map.addLayer(awal);

            var subsektor1 = new L.GeoJSON.AJAX(["geojson/tegalluar.geojson"],{}).addTo(map).bindPopup('Subsektor 1');
            var subsektor2 = new L.GeoJSON.AJAX(["geojson/bojongsari.geojson"],{}).addTo(map).bindPopup('Subsektor 2');
            var subsektor3 = new L.GeoJSON.AJAX(["geojson/cikoneng1.geojson"],{}).addTo(map).bindPopup('Subsektor 3');
            var subsektor4 = new L.GeoJSON.AJAX(["geojson/citeureup1.geojson"],{}).addTo(map).bindPopup('Subsektor 4');
            var subsektor5 = new L.GeoJSON.AJAX(["geojson/bojongsoang1.geojson"],{}).addTo(map).bindPopup('Subsektor 5');
            var subsektor6 = new L.GeoJSON.AJAX(["geojson/wargamekar.geojson"],{}).addTo(map).bindPopup('Subsektor 6');
            var subsektor7 = new L.GeoJSON.AJAX(["geojson/jelekong.geojson"],{}).addTo(map).bindPopup('Subsektor 7');
            var subsektor8 = new L.GeoJSON.AJAX(["geojson/manggahang1.geojson"],{}).addTo(map).bindPopup('Subsektor 8');
            var subsektor9 = new L.GeoJSON.AJAX(["geojson/baleendah.geojson"],{}).addTo(map).bindPopup('Subsektor 9');
            var subsektor10 = new L.GeoJSON.AJAX(["geojson/cibisoro.geojson"],{}).addTo(map).bindPopup('Subsektor 10');
            var subsektor11 = new L.GeoJSON.AJAX(["geojson/oxbowcijagra.geojson"],{}).addTo(map).bindPopup('Subsektor 11');

            var markers = [];
            <?php 
            $query = "SELECT * FROM perusahaan";
            $sql = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($sql)){
            ?>
            var titik = L.marker([<?= $row['latitude'] ?>, <?=$row['longitude']?>]).addTo(map).bindPopup("<?=$row['nama_perusahaan']?><br> Keterangan : <?=$row['keterangan']?>");
            markers.push(titik);
            <?php } ?>
            
            var titiks = L.layerGroup(markers);
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>