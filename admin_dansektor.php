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
                <a class="nav-link text-white active" href="admin_user.php"><i class="fas fa-users mr-2"></i>Dansubsektor</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_dansektor.php"><i class="fas fa-user-tie mr-2"></i>Dansektor</a><hr>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_admin.php" style="margin-bottom: 410px"><i class="fas fa-users-cog mr-2"></i>Admin</a><hr>
            </li>
        </ul>
        </div>
        <div class="col-md-10 p-5">
            <h3><i class="fas fa-user-tie mr-2"></i> Dansektor</h3>
            <hr>
            <a href="tambah_dansektor.php" class="btn btn-primary mb-3"><i class="fas fa-plus mr-2"></i>Tambah Dansektor</a>
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Pangkat</th>
                <th scope="col">Sektor</th>
                <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT * FROM `dansektor` ORDER BY id_dansektor ASC";
                $sql = mysqli_query($conn, $query);
                $no = 1;
                while($row = mysqli_fetch_array($sql)){
                echo "
                    <tr>
                    <td>$no</td>
                    <td>$row[nama_dansektor]</td>
                    <td>$row[username_dansektor]</td>
                    <td>$row[password_dansektor]</td>
                    <td>$row[pangkat_dansektor]</td>
                    <td>$row[id_sektor]</td>
                    <td colspan='2' class='text-center'><a href='edit_dansektor.php?id=$row[id_dansektor]'><i class='fas fa-edit bg-warning p-2 text-white rounded mr-0' data-toggle='tooltip' title='edit'></i></a>
                    <a class='m-2' href='admin_dansektor.php?deletedansektor=$row[id_dansektor]'><i class='fas fa-trash-alt bg-danger text-white p-2 rounded'></i></a></td>
                    </tr>";
                    $no++;
                }
            ?>
            </tbody>
            </table>
            <br><br><br>
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