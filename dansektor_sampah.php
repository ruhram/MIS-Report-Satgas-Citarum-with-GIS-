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
    .info { 
        padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; 
    } 
    .info h4 { 
        margin: 0 0 5px; color: #777; 
    }
    .legend { 
        text-align: left; line-height: 19px; color: #555; 
    } 
    .legend i { 
        width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; 
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
            <h3><i class="fas fa-recycle mr-2"></i>Volume Sampah</h3>
            <hr>
            <div id="mapid"></div>
            <br>
            <h3><i class="fas fa-recycle mr-2"></i>Statistik Volume Sampah 2019</h3>
            <hr>
            <canvas id="myChart"></canvas>
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Subsektor</th>
                <th scope="col">Kelurahan</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Volume Sampah</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT * FROM sampah INNER JOIN wilayah_subsektor ON sampah.id_subsektor = wilayah_subsektor.id_subsektor ORDER BY sampah.id_subsektor ASC";
                $sql = mysqli_query($conn, $query);
                $no = 1;
                while($row = mysqli_fetch_array($sql)){
                echo "
                    <tr>
                    <td>$no</td>
                    <td>$row[id_subsektor]</td>
                    <td>$row[kecamatan]</td>
                    <td>$row[kelurahan]</td>
                    <td>$row[volume_sampah] m<sup>3</sup></td>
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
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
    <script src="panel/src/leaflet-panel-layers.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var label = [];
        <?php
            $query = "SELECT * FROM sampah INNER JOIN wilayah_subsektor ON sampah.id_subsektor = wilayah_subsektor.id_subsektor";
            $sql = mysqli_query($conn, $query);
            while($rows = mysqli_fetch_array($sql)){
        ?>
            var subsektor =  "<?php echo $rows['kelurahan'] ?>";
            label.push(subsektor);
        <?php } ?>
        
        var volumes = [];
        <?php
            $query = "SELECT * FROM sampah ";
            $sql = mysqli_query($conn, $query);
            while($rows = mysqli_fetch_array($sql)){
        ?>
            var volume =  <?php echo $rows['volume_sampah'] ?>;
            volumes.push(volume);
        <?php } ?>

        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: label,
                datasets: [{
                    label: 'Volume Sedimentasi',
                    backgroundColor: 'lightblue',
                    borderColor: 'rgb(255, 99, 132)',
                    data: volumes
                }]
            },

            // Configuration options go here
            options: {}
        });

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

        //script untuk peta tematik    
            // control that shows state info on hover
	        var info = L.control();

            info.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };

            info.update = function (props) {
                this._div.innerHTML = '<h4>Volume Sampah Domestik</h4>' +  (props ?
                    '<b>' + props.kelurahan + '</b><br />' 
                    : 'Arahkan ke atas subsektor');
            };

	        info.addTo(map);
            <?php
                $sql = mysqli_query($conn, "SELECT * FROM sampah WHERE id_subsektor = 1");
                $sampah1 = mysqli_fetch_array($sql);
                $sql = mysqli_query($conn, "SELECT * FROM sampah WHERE id_subsektor = 602");
                $sampah2 = mysqli_fetch_array($sql);
                $sql = mysqli_query($conn, "SELECT * FROM sampah WHERE id_subsektor = 603");
                $sampah3 = mysqli_fetch_array($sql);
                $sql = mysqli_query($conn, "SELECT * FROM sampah WHERE id_subsektor = 604");
                $sampah4 = mysqli_fetch_array($sql);
                $sql = mysqli_query($conn, "SELECT * FROM sampah WHERE id_subsektor = 605");
                $sampah5 = mysqli_fetch_array($sql);
                $sql = mysqli_query($conn, "SELECT * FROM sampah WHERE id_subsektor = 606");
                $sampah6 = mysqli_fetch_array($sql);
                $sql = mysqli_query($conn, "SELECT * FROM sampah WHERE id_subsektor = 607");
                $sampah7 = mysqli_fetch_array($sql);
                $sql = mysqli_query($conn, "SELECT * FROM sampah WHERE id_subsektor = 608");
                $sampah8 = mysqli_fetch_array($sql);
                $sql = mysqli_query($conn, "SELECT * FROM sampah WHERE id_subsektor = 609");
                $sampah9 = mysqli_fetch_array($sql);
                $sql = mysqli_query($conn, "SELECT * FROM sampah WHERE id_subsektor = 610");
                $sampah10 = mysqli_fetch_array($sql);
                $sql = mysqli_query($conn, "SELECT * FROM sampah WHERE id_subsektor = 611");
                $sampah11 = mysqli_fetch_array($sql);
            ?>
            var sampah = {"Tegalluar": <?= $sampah1['volume_sampah']?>, "Bojongsari":<?=$sampah2['volume_sampah']?>, "Cikoneng":<?=$sampah3['volume_sampah']?>, "Citeureup":<?=$sampah4['volume_sampah']?>, "Bojongsoang":<?=$sampah5['volume_sampah']?>,"Wargamekar":<?=$sampah6['volume_sampah']?>,"Jelekong":<?=$sampah7['volume_sampah']?>,"Manggahang":<?=$sampah8['volume_sampah']?>,"Baleendah":<?=$sampah9['volume_sampah']?>,"Cibisoro":<?=$sampah10['volume_sampah']?>,"Oxbow Cijagra":<?=$sampah11['volume_sampah']?>}
            // get color depending on population density value
            function getColor(d) {
                return  d > 20000  ? '#7D2715' :
                        d > 15000  ? '#FC4E2A' :
                        d > 10000   ? '#FD8D3C' :
                        d > 5000   ? '#FEB24C' :
                        d > 1000   ? '#FED976' :
                                    '#FFEDA0';
            }

            function style(feature) {
		        return {
                    weight: 2,
                    opacity: 1,
                    color: 'white',
                    dashArray: '3',
                    fillOpacity: 0.7,
                    fillColor: getColor(sampah[feature.properties.kelurahan])
                };
	        }

            function highlightFeature(e) {
                var layer = e.target;

                layer.setStyle({
                    weight: 5,
                    color: '#666',
                    dashArray: '',
                    fillOpacity: 0.7
                });

                if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                    layer.bringToFront();
                }

                info.update(layer.feature.properties);
            }

            var geojson;

            function resetHighlight(e) {
                var layer = e.target;

                layer.setStyle({
                    weight: 2,
                    opacity: 1,
                    color: 'white',
                    dashArray: '3'
                });
                info.update();
            }

            function zoomToFeature(e) {
                map.fitBounds(e.target.getBounds());
            }

            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    click: zoomToFeature
                });
            }

            var legend = L.control({position: 'bottomright'});

            legend.onAdd = function (map) {

                var div = L.DomUtil.create('div', 'info legend'),
                    grades = [0, 1000, 5000, 10000, 15000, 20000],
                    labels = [],
                    from, to;

                for (var i = 0; i < grades.length; i++) {
                    from = grades[i];
                    to = grades[i + 1];

                    labels.push(
                        '<i style="background:' + getColor(from + 1) + '"></i> ' +
                        from + (to ? '&ndash;' + to : '+'));
                }

                div.innerHTML = labels.join('<br>');
                return div;
            };

            legend.addTo(map);

            var subsektor1 = new L.GeoJSON.AJAX(["geojson/Tegalluar.geojson"],{style: style,onEachFeature: onEachFeature}).addTo(map).bindPopup('Subsektor 1');
            var subsektor2 = new L.GeoJSON.AJAX(["geojson/Bojongsari.geojson"],{style: style,onEachFeature: onEachFeature}).addTo(map).bindPopup('Subsektor 2');
            var subsektor3 = new L.GeoJSON.AJAX(["geojson/cikoneng1.geojson"],{style: style,onEachFeature: onEachFeature}).addTo(map).bindPopup('Subsektor 3');
            var subsektor4 = new L.GeoJSON.AJAX(["geojson/Citeureup1.geojson"],{style: style,onEachFeature: onEachFeature}).addTo(map).bindPopup('Subsektor 4');
            var subsektor5 = new L.GeoJSON.AJAX(["geojson/bojongsoang1.geojson"],{style: style,onEachFeature: onEachFeature}).addTo(map).bindPopup('Subsektor 5');
            var subsektor6 = new L.GeoJSON.AJAX(["geojson/wargamekar1.geojson"],{style: style,onEachFeature: onEachFeature}).addTo(map).bindPopup('Subsektor 6');
            var subsektor7 = new L.GeoJSON.AJAX(["geojson/jelekong1.geojson"],{style: style,onEachFeature: onEachFeature}).addTo(map).bindPopup('Subsektor 7');
            var subsektor8 = new L.GeoJSON.AJAX(["geojson/manggahang1.geojson"],{style: style,onEachFeature: onEachFeature}).addTo(map).bindPopup('Subsektor 8');
            var subsektor9 = new L.GeoJSON.AJAX(["geojson/Baleendah.geojson"],{style: style,onEachFeature: onEachFeature}).addTo(map).bindPopup('Subsektor 9');
            var subsektor10 = new L.GeoJSON.AJAX(["geojson/Cibisoro1.geojson"],{style: style,onEachFeature: onEachFeature}).addTo(map).bindPopup('Subsektor 10');
            var subsektor11 = new L.GeoJSON.AJAX(["geojson/Oxbowcijagra.geojson"],{style: style,onEachFeature: onEachFeature}).addTo(map).bindPopup('Subsektor 11');
            
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>