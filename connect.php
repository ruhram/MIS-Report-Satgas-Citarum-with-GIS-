<?php

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "citarum";
    session_start();

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Koneksi Database Gagal");

     //Login dansubsektor clicked
     if(isset($_POST["login_dansubsektor"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if(empty($username) && empty($password)){
            $null = true;
        }else{
        $result = mysqli_query($conn, "SELECT * FROM dansubsektor WHERE username_dansubsektor = '$username'");
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            if($row['password_dansubsektor'] == $password){
                $id = $row['id_dansubsektor'];
                $sektor = $row['sektor_dansubsektor'];
                $_SESSION["name"] = "$username";
                $_SESSION["id"] = "$id";
                $_SESSION["sektor"] = "$sektor";
                $_SESSION["login"] = true;
                header("location: dansubsektor_dashboard.php");
            }else{
                $error_password = true;
            }
        }else{
            $error_username = true;
        }
        }   
    }

     //Login dansektor clicked
     if(isset($_POST["login_dansektor"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if(empty($username) && empty($password)){
            $null = true;
        }else{
        $result = mysqli_query($conn, "SELECT * FROM `dansektor` WHERE username_dansektor = '$username'");
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            if($row['password_dansektor'] == $password){
                $id = $row['id_dansektor'];
                $_SESSION["name"] = $row['nama_dansektor'];
                $_SESSION["id_dansektor"] = "$id";
                $_SESSION["login"] = true;
                header("location: dansektor_dashboard.php");
            }else{
                $error_password = true;
            }
        }else{
            $error_username = true;
        }
        }   
    }

    //Login admin clicked
    if(isset($_POST["login_admin"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if(empty($username) && empty($password)){
            $null = true;
        }else{
        $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE username_admin = '$username'");
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            if($row['password_admin'] == $password){
                $id = $row['id_admin'];
                $_SESSION["name"] = "$username";
                $_SESSION["id_admin"] = "$id";
                $_SESSION["login"] = true;
                header("location: admin_dashboard.php");
            }else{
                $error_password = true;
            }
        }else{
            $error_username = true;
        }
        }   
    }

    //Tambah Rencana Clicked
    if(isset($_POST["tambahrencana"])){
        $tanggal = $_POST["tanggal"];
        $deskripsi = $_POST["deskripsi"];
        $target = $_POST["target"];
        $id = $_SESSION["id"];
        $sektor = $_SESSION["sektor"];
        $lokasi = $_POST["lokasi"];
        $status = "Unfinish";

            $query = "INSERT INTO `rencana`(`tanggal`, `deskripsi`, `target`, `id_dansubsektor`, `sektor`, `id_lokasi`, `status`) VALUES ('$tanggal','$deskripsi','$target','$id','$sektor','$lokasi','$status')";
            $sql = mysqli_query($conn, $query);
        header('location: dansubsektor_rencana.php');
    }

    //Tambah Masalah Clicked Clicked
    if(isset($_POST["tambah_masalah"])){
        $id_dansubsektor = $_SESSION["id"];

        $tanggal = $_POST['tanggal'];
        $lokasi = $_POST['lokasi'];
        $masalah = $_POST['masalah'];

        $file = $_FILES['gambar'];
        $fileName = $_FILES['gambar']['name'];
        $fileSource = $_FILES['gambar']['tmp_name'];
        $fileSize = $_FILES['gambar']['size'];
        $fileError = $_FILES['gambar']['error'];
        $folder = './upload/';

        move_uploaded_file($fileSource, $folder.$fileName);

        $query = "INSERT INTO `masalah`(`id_dansubsektor`, `tanggal`, `lokasi`, `masalah`, `gambar`, `status`) VALUES ('$id_dansubsektor','$tanggal','$lokasi','$masalah','$fileName','Not Approve')";
        $sql = mysqli_query($conn, $query);
        header('location: dansubsektor_masalah.php');

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','pdf','png');
    }

    //Tambah Laporan Clicked
    if(isset($_POST["laporan"])){
        $id_dansubsektor = $_SESSION["id"];

        $id_rencana = $_POST['tanggal'];
        $deskripsi = $_POST['deskripsi'];
        $kendala = $_POST['kendala'];

        $file = $_FILES['gambar'];
        $fileName = $_FILES['gambar']['name'];
        $fileSource = $_FILES['gambar']['tmp_name'];
        $fileSize = $_FILES['gambar']['size'];
        $fileError = $_FILES['gambar']['error'];
        $folder = './upload/';

        move_uploaded_file($fileSource, $folder.$fileName);

        $query = "INSERT INTO `capaian`(`id_rencana`,`id_dansubsektor`, `laporan`, `kendala`, `gambar`) VALUES ('$id_rencana','$id_dansubsektor','$deskripsi','$kendala','$fileName')";
        $sql = mysqli_query($conn, $query);
        header('location: dansubsektor_target.php');

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','pdf','png');
    }

    //Tambah Dansubsektor Clicked
    if(isset($_POST["tambah_dansubsektor"])){
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $pangkat = $_POST["pangkat"];
        $sektor = $_POST["sektor"];
        $subsektor = $_POST["subsektor"];

            $query = "INSERT INTO `dansubsektor`(`id_dansubsektor`, `username_dansubsektor`, `password_dansubsektor`, `nama_dansubsektor`, `pangkat_dansubsektor`, `id_sektor`, `id_subsektor`) VALUES ('$id','$username','$password','$nama','$pangkat','$sektor','$subsektor')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_user.php');
    }

     //edit dansubsektor clicked
     if(isset($_POST['edit_dansubsektor'])){
        $id = $_SESSION['id_dansubsektor'];
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $pangkat = $_POST["pangkat"];
        $sektor = $_POST["sektor"];
        $subsektor = $_POST["subsektor"];
        $query = "UPDATE `dansubsektor` SET `id_dansubsektor`='$id',`username_dansubsektor`='$username',`password_dansubsektor`='$password',`nama_dansubsektor`='$nama',`pangkat_dansubsektor`='$pangkat',`id_sektor`='$sektor',`id_subsektor`='$subsektor' WHERE `id_dansubsektor`='$id'";
        $edit = mysqli_query($conn, $query);
        header('location: admin_user.php');
    }

    //Delete Dansubsektor Clicked
    if(isset($_GET['deletedansubsektor'])){
        $id = $_GET['deletedansubsektor'];
        $query = "DELETE FROM `dansubsektor` WHERE `id_dansubsektor` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_user.php');
    }

    //Tambah Dansektor Clicked
    if(isset($_POST["tambah_dansektor"])){
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $pangkat = $_POST["pangkat"];
        $sektor = $_POST["sektor"];

            $query = "INSERT INTO `dansektor`(`id_dansektor`, `username_dansektor`, `password_dansektor`, `nama_dansektor`, `pangkat_dansektor`, `id_sektor`) VALUES ('$id','$username','$password','$nama','$pangkat','$sektor')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_dansektor.php');
    }

    //edit dansubsektor clicked
    if(isset($_POST['edit_dansektor'])){
        $id = $_SESSION['id_dansektor'];
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $pangkat = $_POST["pangkat"];
        $sektor = $_POST["sektor"];
        $query = "UPDATE `dansektor` SET `id_dansektor`='$id',`username_dansektor`='$username',`password_dansektor`='$password',`nama_dansektor`='$nama',`pangkat_dansektor`='$pangkat',`id_sektor`='$sektor' WHERE `id_dansektor`='$id'";
        $edit = mysqli_query($conn, $query);
        header('location: admin_dansektor.php');
    }

    //Delete Dansektor Clicked
    if(isset($_GET['deletedansektor'])){
        $id = $_GET['deletedansektor'];
        $query = "DELETE FROM `dansektor` WHERE `id_dansektor` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_dansektor.php');
    }

    //Tambah Admin Clicked
    if(isset($_POST["tambah_admin"])){
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $jabatan = $_POST["jabatan"];
        $username = $_POST["username"];
        $password = $_POST["password"];

            $query = "INSERT INTO `admin`(`id_admin`, `username_admin`, `password_admin`, `nama_admin`, `jabatan_admin`) VALUES ('$id','$username','$password','$nama','$jabatan')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_admin.php');
    }

    //Delete Admin Clicked
    if(isset($_GET['deleteadmin'])){
        $id = $_GET['deleteadmin'];
        $query = "DELETE FROM `admin` WHERE `id_admin` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_admin.php');
    }

    //Tambah Sektor Clicked
    if(isset($_POST["tambah_sektor"])){
        $id = $_POST["id"];
        $nomor = $_POST["nomor"];

            $query = "INSERT INTO `sektor`(`id_sektor`, `nomor_sektor`) VALUES ('$id','$nomor')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_sektor.php');
    }

    //edit dansubsektor clicked
    if(isset($_POST['edit_sektor'])){
        $id = $_POST["id"];
        $nomor = $_POST["nama"];
        $query = "UPDATE `sektor` SET `id_sektor`='$id',`nomor_sektor`='$nomor' WHERE id_sektor = '$id'";
        $edit = mysqli_query($conn, $query);
        header('location: admin_sektor.php');
    }

     //Delete Sektor Clicked
     if(isset($_GET['deletesektor'])){
        $id = $_GET['deletesubsektor'];
        $query = "DELETE FROM `sektor` WHERE `id_sektor` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_sektor.php');
    }

    //Tambah Subsektor Clicked
    if(isset($_POST["tambah_subsektor"])){
        $id = $_POST["id"];
        $sektor = $_POST['sektor'];
        $nomor = $_POST["nomor"];

            $query = "INSERT INTO `subsektor`(`id_subsektor`, `nama_subsektor`, `id_sektor`) VALUES ('$id','$nomor','$sektor')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_subsektor.php');
    }

    //edit subsektor clicked
    if(isset($_POST['edit_subsektor'])){
        $id = $_POST["id"];
        $sektor = $_POST['sektor'];
        $nomor = $_POST["nomor"];
        $query = "UPDATE `subsektor` SET `id_subsektor`='$id'`nama_subsektor`='$sektor',`id_sektor`='$nomor' WHERE id_subsektor = '$id'";
        $edit = mysqli_query($conn, $query);
        header('location: admin_subsektor.php');
    }

     //Delete Subsektor Clicked
     if(isset($_GET['deletesubsektor'])){
        $id = $_GET['deletesubsektor'];
        $query = "DELETE FROM `subsektor` WHERE `id_subsektor` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_subsektor.php');
    }

    //Tambah Wilayah Subsektor Clicked
    if(isset($_POST["tambah_wilayahsubsektor"])){
        $id = $_POST['id'];
        $kecamatan = $_POST['kecamatan'];
        $kelurahan = $_POST['kelurahan'];
        $sektor = $_POST['sektor'];
        $subsektor = $_POST['subsektor'];

        $file = $_FILES['peta'];
        $fileName = $_FILES['peta']['name'];
        $fileSource = $_FILES['peta']['tmp_name'];
        $fileSize = $_FILES['peta']['size'];
        $fileError = $_FILES['peta']['error'];
        $folder = './geojson/';

        move_uploaded_file($fileSource, $folder.$fileName);

        $query = "INSERT INTO `wilayah_subsektor`(`id_wilayahsubsektor`, `id_sektor`, `id_subsektor`, `peta_subsektor`, `kecamatan`, `kelurahan`) VALUES ('$id','$sektor','$subsektor','$fileName','$kecamatan','$kelurahan')";
        $sql = mysqli_query($conn, $query);
        header('location: wilayah.php');

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','pdf','png');
    }
   
    //delete wilayah subsektor Clicked
    if(isset($_GET['deletewilayahsubsektor'])){
        $id = $_GET['deletewilayahsubsektor'];
        $folder = './geojson/';
            $query = "SELECT * FROM wilayah_subsektor WHERE `id_wilayahsubsektor` = '$id'";
            $sql = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($sql);
            $foto = $row['peta_subsektor'];
        unlink($folder.$foto);
        $query = "DELETE FROM `wilayah_subsektor` WHERE `id_wilayahsubsektor` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: wilayah.php');
    }

    //edit wilayah subsektor clicked
    if(isset($_POST['edit_wilayahsubsektor'])){
        $id = $_POST['id'];
        $kecamatan = $_POST['kecamatan'];
        $kelurahan = $_POST['kelurahan'];
        $sektor = $_POST['sektor'];
        $subsektor = $_POST['subsektor'];
        $file = $_FILES['peta'];
        $fileName = $_FILES['peta']['name'];
        $fileSource = $_FILES['peta']['tmp_name'];
        $folder = './geojson/';
        move_uploaded_file($fileSource, $folder.$fileName);
        $query = "UPDATE `wilayah_subsektor` SET `id_wilayahsubsektor`='$id',`id_sektor`='$sektor',`id_subsektor`='$subsektor',`peta_subsektor`='$fileName',`kecamatan`='$kecamatan',`kelurahan`='$kelurahan' WHERE `id_wilayahsubsektor`='$id'";
        $edit = mysqli_query($conn, $query);
        header('location: wilayah.php');
    }

    //Tambah Wilayah Sektor Clicked
    if(isset($_POST["tambah_wilayahsektor"])){
        $id = $_POST['id'];
        $sektor = $_POST['sektor'];

        $file = $_FILES['peta'];
        $fileName = $_FILES['peta']['name'];
        $fileSource = $_FILES['peta']['tmp_name'];
        $fileSize = $_FILES['peta']['size'];
        $fileError = $_FILES['peta']['error'];
        $folder = './geojson/';

        move_uploaded_file($fileSource, $folder.$fileName);

        $query = "INSERT INTO `wilayah_sektor`(`id_wilayahsektor`, `id_sektor`, `peta_sektor`) VALUES ('$id','$sektor','$fileName')";
        $sql = mysqli_query($conn, $query);
        header('location: wilayah_sektor.php');

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','pdf','png');
    }

    //delete wilayah sektor clicked
    if(isset($_GET['deletewilayahsektor'])){
        $id = $_GET['deletewilayahsektor'];
        $folder = './geojson/';
            $query = "SELECT * FROM wilayah_sektor WHERE `id_wilayahsektor` = '$id'";
            $sql = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($sql);
            $foto = $row['peta_sektor'];
        unlink($folder.$foto);
        $query = "DELETE FROM `wilayah_sektor` WHERE `id_wilayahsektor` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: wilayah_sektor.php');
    }

    //Tambah Sedimentasi Clicked
    if(isset($_POST["tambah_sedimentasi"])){
        $id = $_POST["id"];
        $subsektor = $_POST['subsektor'];
        $sungai = $_POST["sungai"];
        $panjang = $_POST["panjang_sungai"];
        $lebar = $_POST["lebar_sungai"];
        $tahun = $_POST["tahun"];
        $volume = $_POST["volume"];
        $keterangan = $_POST["keterangan"];

            $query = "INSERT INTO `sedimentasi`(`id_sedimentasi`, `id_subsektor`, `nama_sungai`, `panjang_sungai`, `lebar_sungai`, `volume_sedimentasi`, `tahun_sedimentasi`, `keterangan_sedimentasi`) VALUES ('$id','$subsektor','$sungai','$panjang','$lebar','$volume','$tahun','$keterangan')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_elemen.php');
    }

    //Delete Sedimentasi Clicked
    if(isset($_GET['deletesedimentasi'])){
        $id = $_GET['deletesedimentasi'];
        $query = "DELETE FROM `sedimentasi` WHERE `id_sedimentasi` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_elemen.php');
    }

    //Edit Sedimentasi Clicked
    if(isset($_POST["edit_sedimentasi"])){
        $id = $_SESSION['id'];
        $subsektor = $_POST['subsektor'];
        $sungai = $_POST["sungai"];
        $panjang = $_POST["panjang_sungai"];
        $lebar = $_POST["lebar_sungai"];
        $tahun = $_POST["tahun"];
        $volume = $_POST["volume"];
        $keterangan = $_POST["keterangan"];

            $query = "UPDATE `sedimentasi` SET `id_sedimentasi`='$id',`id_subsektor`='$subsektor',`nama_sungai`='$sungai',`panjang_sungai`='$panjang',`lebar_sungai`='$lebar',`volume_sedimentasi`='$volume',`tahun_sedimentasi`='$tahun',`keterangan_sedimentasi`='$keterangan' WHERE `id_sedimentasi` = '$id'";
            $sql = mysqli_query($conn, $query);
            header('location: admin_elemen.php');
    }

    //Tambah Perusahaan Clicked
    if(isset($_POST["tambah_perusahaan"])){
        $id = $_POST["id"];
        $subsektor = $_POST['subsektor'];
        $nama = $_POST["nama"];
        $kecamatan = $_POST["kecamatan"];
        $kelurahan = $_POST["kelurahan"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $keterangan = $_POST["keterangan"];

            $query = "INSERT INTO `perusahaan`(`id_perusahaan`, `nama_perusahaan`, `id_subsektor`,`kelurahan`, `kecamatan`, `latitude`, `longitude`) VALUES ('$id','$nama','$subsektor','$kelurahan','$kecamatan','$latitude','$longitude')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_perusahaan.php');
    }

    //Delete Perusahaan Clicked
    if(isset($_GET['deleteperusahaan'])){
        $id = $_GET['deleteperusahaan'];
        $query = "DELETE FROM `perusahaan` WHERE `id_perusahaan` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_perusahaan.php');
    }
    
    //Edit Perusahaan Clicked
    if(isset($_POST["edit_perusahaan"])){
        $id = $_SESSION['id'];
        $subsektor = $_POST['subsektor'];
        $nama = $_POST["nama"];
        $kecamatan = $_POST["kecamatan"];
        $kelurahan = $_POST["kelurahan"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $keterangan = $_POST["keterangan"];

            $query = "UPDATE `perusahaan` SET `id_perusahaan`='$id',`nama_perusahaan`='$nama',`kelurahan`='$kelurahan',`kecamatan`='$kecamatan',`latitude`='$latitude',`longitude`='$longitude',`keterangan`='$keterangan' WHERE `id_perusahaan`='$id'";
            $sql = mysqli_query($conn, $query);
            header('location: admin_perusahaan.php');
    }

    //Tambah TPS Clicked
    if(isset($_POST["tambah_tps"])){
        $id = $_POST["id"];
        $subsektor = $_POST['subsektor'];
        $kecamatan = $_POST["kecamatan"];
        $kelurahan = $_POST["kelurahan"];
        $tahun = $_POST["tahun"];
        $jumlah = $_POST["jumlah"];

            $query = "INSERT INTO `tps`(`id_tps`, `id_subsektor`, `kecamatan`, `kelurahan`, `tahun`, `jumlah`) VALUES ('$id','$subsektor','$kecamatan','$kelurahan','$tahun','$jumlah')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_tps.php');
    }

    //Delete TPS Clicked
    if(isset($_GET['deletetps'])){
        $id = $_GET['deletetps'];
        $query = "DELETE FROM `tps` WHERE `id_tps` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_tps.php');
    }
    
    //Edit TPS Clicked
    if(isset($_POST["edit_tps"])){
        $id = $_SESSION['id'];
        $subsektor = $_POST['subsektor'];
        $kecamatan = $_POST["kecamatan"];
        $kelurahan = $_POST["kelurahan"];
        $tahun = $_POST["tahun"];
        $jumlah = $_POST["jumlah"];

            $query = "UPDATE `tps` SET `id_tps`='$id',`id_subsektor`='$subsektor',`kecamatan`='$kecamatan',`kelurahan`='$kelurahan',`tahun`='$tahun',`jumlah`='$jumlah' WHERE `id_tps`='$id'";
            $sql = mysqli_query($conn, $query);
            header('location: admin_tps.php');
    }

    //Tambah Incinerator Clicked
    if(isset($_POST["tambah_incinerator"])){
        $id = $_POST["id"];
        $subsektor = $_POST['subsektor'];
        $kecamatan = $_POST["kecamatan"];
        $kelurahan = $_POST["kelurahan"];
        $tahun = $_POST["tahun"];
        $jumlah = $_POST["jumlah"];

            $query = "INSERT INTO `incinerator`(`id_incinerator`, `id_subsektor`, `kecamatan`, `kelurahan`, `tahun`, `jumlah`) VALUES ('$id','$subsektor','$kecamatan','$kelurahan','$tahun','$jumlah')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_incinerator.php');
    }

    //Delete Incinerator Clicked
    if(isset($_GET['deleteincinerator'])){
        $id = $_GET['deleteincinerator'];
        $query = "DELETE FROM `incinerator` WHERE `id_incinerator` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_incinerator.php');
    }
    
    //Edit Incinerator Clicked
    if(isset($_POST["edit_incinerator"])){
        $id = $_SESSION['id'];
        $subsektor = $_POST['subsektor'];
        $kecamatan = $_POST["kecamatan"];
        $kelurahan = $_POST["kelurahan"];
        $tahun = $_POST["tahun"];
        $jumlah = $_POST["jumlah"];

            $query = "UPDATE `incinerator` SET `id_incinerator`='$id',`id_subsektor`='$subsektor',`kecamatan`='$kecamatan',`kelurahan`='$kelurahan',`tahun`='$tahun',`jumlah`='$jumlah' WHERE `id_incinerator`='$id'";
            $sql = mysqli_query($conn, $query);
            header('location: admin_incinerator.php');
    }

    //Tambah Tempat Sampah Clicked
    if(isset($_POST["tambah_tong"])){
        $id = $_POST["id"];
        $subsektor = $_POST['subsektor'];
        $kecamatan = $_POST["kecamatan"];
        $kelurahan = $_POST["kelurahan"];
        $tahun = $_POST["tahun"];
        $jumlah = $_POST["jumlah"];

            $query = "INSERT INTO `tempatsampah`(`id_tempatsampah`, `id_subsektor`, `kecamatan`, `kelurahan`, `tahun`, `jumlah`) VALUES ('$id','$subsektor','$kecamatan','$kelurahan','$tahun','$jumlah')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_tong.php');
    }

    //Delete Tempat Sampah Clicked
    if(isset($_GET['deletetempatsampah'])){
        $id = $_GET['deletetempatsampah'];
        $query = "DELETE FROM `tempatsampah` WHERE `id_tempatsampah` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_tong.php');
    }

    //Edit Tempat Sampah Clicked
    if(isset($_POST["edit_tempatsampah"])){
        $id = $_SESSION['id'];
        $subsektor = $_POST['subsektor'];
        $kecamatan = $_POST["kecamatan"];
        $kelurahan = $_POST["kelurahan"];
        $tahun = $_POST["tahun"];
        $jumlah = $_POST["jumlah"];

            $query = "UPDATE `tempatsampah` SET `id_tps`='$id',`id_subsektor`='$subsektor',`kecamatan`='$kecamatan',`kelurahan`='$kelurahan',`tahun`='$tahun',`jumlah`='$jumlah' WHERE `id_tps`='$id'";
            $sql = mysqli_query($conn, $query);
            header('location: admin_tong.php');
    }

    //Tambah Volume Sampah Clicked
    if(isset($_POST["tambah_sampah"])){
        $id = $_POST["id"];
        $subsektor = $_POST['subsektor'];
        $tahun = $_POST["tahun"];
        $volume = $_POST["volume"];

            $query = "INSERT INTO `sampah`(`id_sampah`, `id_subsektor`, `tahun`, `volume_sampah`) VALUES ('$id','$subsektor','$tahun','$volume')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_sampah.php');
    }

    //Delete Volume Sampah Clicked
    if(isset($_GET['deletesampah'])){
        $id = $_GET['deletesampah'];
        $query = "DELETE FROM `sampah` WHERE `id_sampah` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_tong.php');
    }

    //Edit Volume Sampah Clicked
    if(isset($_POST["edit_sampah"])){
        $id = $_SESSION['id'];
        $subsektor = $_POST['subsektor'];
        $tahun = $_POST["tahun"];
        $volume = $_POST["volume"];

            $query = "UPDATE `sampah` SET `id_sampah`='$id',`id_subsektor`='$subsektor',`tahun`='$tahun',`volume_sampah`='$volume' WHERE `id_sampah`='$id'";
            $sql = mysqli_query($conn, $query);
            header('location: admin_sampah.php');
    }

    //Tambah Taman Clicked
    if(isset($_POST["tambah_taman"])){
        $id = $_POST["id"];
        $subsektor = $_POST['subsektor'];
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $tahun = $_POST["tahun"];
        $jumlah = $_POST['jumlah'];

            $query = "INSERT INTO `taman`(`id_taman`, `id_subsektor`, `kelurahan`, `kecamatan`, `tahun`, `jumlah`) VALUES ('$id','$subsektor','$kelurahan','$kecamatan','$tahun','$jumlah')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_taman.php');
    }

    //Delete Taman Clicked
    if(isset($_GET['deletetaman'])){
        $id = $_GET['deletetaman'];
        $query = "DELETE FROM `taman` WHERE `id_taman` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_taman.php');
    }

    //Edit Taman Clicked
    if(isset($_POST["edit_taman"])){
        $id = $_SESSION['id'];
        $subsektor = $_POST['subsektor'];
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $tahun = $_POST["tahun"];
        $jumlah = $_POST['jumlah'];

            $query = "UPDATE `taman` SET `id_taman`='$id',`id_subsektor`='$subsektor',`kelurahan`='$kelurahan',`kecamatan`='$kecamatan',`tahun`='$tahun',`jumlah`='$jumlah' WHERE `id_taman`='$id'";
            $sql = mysqli_query($conn, $query);
            header('location: admin_taman.php');
    }

    //Tambah Sanitasi Clicked
    if(isset($_POST["tambah_sanitasi"])){
        $id = $_POST["id"];
        $subsektor = $_POST['subsektor'];
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $tahun = $_POST["tahun"];
        $jumlah = $_POST['jumlah'];

            $query = "INSERT INTO `sanitasi`(`id_sanitasi`, `id_subsektor`, `kelurahan`, `kecamatan`, `tahun`, `jumlah_sanitasi`) VALUES ('$id','$subsektor','$kelurahan','$kecamatan','$tahun','$jumlah')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_sanitasi.php');
    }

    //Delete Sanitasi Clicked
    if(isset($_GET['deletesanitasi'])){
        $id = $_GET['deletetaman'];
        $query = "DELETE FROM `sanitasi` WHERE `id_sanitasi` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_sanitasi.php');
    }

    //Edit Sanitasi Clicked
    if(isset($_POST["edit_sanitasi"])){
        $id = $_SESSION['id'];
        $subsektor = $_POST['subsektor'];
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $tahun = $_POST["tahun"];
        $jumlah = $_POST['jumlah'];

            $query = "UPDATE `sanitasi` SET `id_sanitasi`='$id',`id_subsektor`='$subsektor',`kecamatan`='$kecamatan',`kelurahan`='$kelurahan',`tahun`='$tahun',`jumlah_sanitasi`='$jumlah' WHERE `id_sanitasi`='$id'";
            $sql = mysqli_query($conn, $query);
            header('location: admin_sanitasi.php');
    }

    //Tambah Pohon Clicked
    if(isset($_POST["tambah_pohon"])){
        $id = $_POST["id"];
        $subsektor = $_POST['subsektor'];
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $tahun = $_POST["tahun"];
        $jenis = $_POST["jenis"];
        $jumlah = $_POST['jumlah'];

            $query = "INSERT INTO `pohon`(`id_pohon`, `id_subsektor`, `kecamatan`, `kelurahan`, `tahun`, `jenis_pohon`, `jumlah_pohon`) VALUES ('$id','$subsektor','$kecamatan','$kelurahan','$tahun','$jenis','$jumlah')";
            $sql = mysqli_query($conn, $query);
            header('location: admin_pohon.php');
    }

    //Delete Pohon Clicked
    if(isset($_GET['deletepohon'])){
        $id = $_GET['deletepohon'];
        $query = "DELETE FROM `pohon` WHERE `id_pohon` = '$id'";
        $sql = mysqli_query($conn, $query);
        header('location: admin_pohon.php');
    }

    //Edit Pohon Clicked
    if(isset($_POST["edit_pohon"])){
        $id = $_SESSION['id_pohon'];
        $subsektor = $_POST['subsektor'];
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $tahun = $_POST["tahun"];
        $jenis = $_POST["jenis"];
        $jumlah = $_POST['jumlah'];

            $query = "UPDATE `pohon` SET `id_pohon`='$id',`id_subsektor`='$subsektor',`kecamatan`='$kecamatan',`kelurahan`='$kelurahan',`tahun`='$tahun',`jenis_pohon`='$jenis',`jumlah_pohon`='$jumlah' WHERE `id_pohon`='$id'";
            $sql = mysqli_query($conn, $query);
            header('location: admin_pohon.php');
    }

    //logout clicked
    if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['name']);
		header('location: index.php');
    }

    //trim input
    function input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        return $data;
    }

    //daftar clicked
    if(isset($_POST['daftar'])){
        $fullname = trim(stripslashes($_POST['fullname']));
        $email = trim(stripcslashes($_POST['email']));
        $job = trim(stripslashes($_POST['job']));
        $username = strtolower(stripslashes($_POST['username']));
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);

        //cek ketersediaan character
        if(empty($fullname) or empty($email) or empty($username) or empty($password) or empty($password2) or empty($job)){
            $null = true;
        }elseif($password != $password2){
            $repeat = true;
        }else{
            $sql = "INSERT INTO member(`username_member`,`password_member`,`email_member`,`fullname_member`,`job_member`) VALUES ('$username','$password','$email','$fullname','$job')";
            mysqli_query($conn, $sql);
            $_SESSION["name"] = "$username";
            $_SESSION["login"] = true;
            header('location: home.php');
        }
    }

    //hapus member clicked
    if(isset($_GET['deletemember'])){
        $id = $_GET['deletemember'];
        $query = "DELETE FROM `member` WHERE `id_member`='$id'";
        $delete = mysqli_query($conn, $query) or die('Error: '.mysqli_error($conn).' on query');
        header('location: member.php');
    }

    //edit member clicked
    if(isset($_POST['editmember'])){
        $idedit = $_SESSION['id'];
        $id = input($_POST['id']);
        $fullname = input($_POST['fullname']);
        $email = input($_POST['email']);
        $job = input($_POST['job']);
        $username = input($_POST['username']);
        $password = input($_POST['password']);
        $query = "UPDATE `member` SET `id_member` = '$id',`fullname_member` = '$fullname',`email_member` = '$email',`job_member` = '$job',`username_member` = '$username',`password_member` = '$password' WHERE `id_member` = '$idedit'";
        $edit = mysqli_query($conn, $query);
        header('location: member.php');
        unset($_SESSION['id']);
    }

    //tambah member clicked
    if(isset($_POST['tambahmember'])){
        if($password == $password2){
            $fullname = input($_POST['fullname']);
            $email = input($_POST['email']);
            $job = input($_POST['job']);
            $username = input($_POST['username']);
            $password = input($_POST['password']);
            $query = "INSERT INTO member(`fullname_member`,`email_member`,`job_member`,`username_member`,`password_member`) VALUES ('$fullname','$email','$job','$username','$password')";
            $sql = mysqli_query($conn, $query);
            header('location: member.php');
        }
        $salah = TRUE;
    }
    
    //tambah admin clicked
    if(isset($_POST['tambahadmin'])){
        
        if($password == $password2){
            $fullname = input($_POST['fullname']);
            $email = input($_POST['email']);
            $username = input($_POST['username']);
            $password = input($_POST['password']);
            $query = "INSERT INTO  `admin`(`fullname_admin`,`email_admin`,`username_admin`,`password_admin`) VALUES ('$fullname','$email','$username','$password')";
            $sql = mysqli_query($conn, $query);
            header('location: daftar_admin.php');
        }
        $salah = TRUE;
    }

    //edit admin clicked
    if(isset($_POST['editadmin'])){
        $idedit = $_SESSION['id'];
        $id = input($_POST['id']);
        $fullname = input($_POST['fullname']);
        $email = input($_POST['email']);
        $job = input($_POST['job']);
        $username = input($_POST['username']);
        $password = input($_POST['password']);
        $query = "UPDATE `admin` SET `id_admin` = '$id',`fullname_admin` = '$fullname',`email_admin` = '$email',`job_admin` = '$job',`username_admin` = '$username',`password_admin` = '$password' WHERE `id_admin` = '$idedit'";
        $edit = mysqli_query($conn, $query);
        header('location: daftar_admin.php');
        unset($_SESSION['id']);
    }

    //tambah sektor clicked
    if(isset($_POST['tambahsektor'])){
        $nama = input($_POST['nama']);
        $kecamatan = input($_POST['kecamatan']);
        $kelurahan = input($_POST['kelurahan']);
        $latitude = input($_POST['latitude']);
        $longtitude = input($_POST['longtitude']);
        $query = "INSERT INTO `sektor`(`nama_sektor`,`kecamatan`,`kelurahan`,`latitude`,`longtitude`) VALUES ('$nama','$kecamatan','$kelurahan','$latitude','$longtitude')";
        $sql = mysqli_query($conn, $query);
        header('location: daftar_sektor.php');
    }

    //edit sektor clicked
    if(isset($_POST['editsektor'])){
        $idedit = $_SESSION['id'];
        $id = input($_POST['id']);
        $nama = input($_POST['nama']);
        $kecamatan = input($_POST['kecamatan']);
        $kelurahan = input($_POST['kelurahan']);
        $latitude = input($_POST['latitude']);
        $longtitude = input($_POST['longtitude']);
        $query="UPDATE `sektor` SET `id_sektor` = '$id',`nama_sektor` = '$nama',`kecamatan` = '$kecamatan',`kelurahan` = '$kelurahan',`latitude` = '$latitude',`longtitude` = '$longtitude' WHERE `id_sektor` = '$idedit'";
        $sql = mysqli_query($conn, $query);
        unset($_SESSION['id']);
        header('location: daftar_sektor.php');
    }

    //tambah nilai clicked
    if(isset($_POST['tambahnilai'])){
        $titik = input($_POST['titik']);
        $sungai = input($_POST['sungai']);
        $tds = input($_POST['tds']);
        $turbidity = input($_POST['turbidity']);
        $temperature = input($_POST['temperature']);
        $ph = input($_POST['ph']);
        $konduktivitas = input($_POST['konduktivitas']);
        $warna = input($_POST['warna']);
        $query = "INSERT INTO `nilai`(`id_sektor`,`nama_sungai`,`tds`,`turbidity`,`temperature`,`ph`,`konduktivitas`,`warna`) VALUES ('$titik','$sungai','$tds','$turbidity','$temperature','$ph','$konduktivitas','$warna')";
        $sql = mysqli_query($conn, $query);
        header('location: nilai.php');
    }

    //delete nilai clicked
    if(isset($_GET['deletenilai'])){
        $id = $_GET['deletenilai'];
        $query = "DELETE FROM `nilai` WHERE `id_nilai` = '$id'";
        $sql = mysqli_query($conn, $query);
        header("location: nilai.php");
    }

    //edit nilai clicked
    if(isset($_POST['editnilai'])){
        $idedit = $_SESSION['id'];
        $id = input($_POST['id']);
        $sungai = input($_POST['sungai']);
        $tds = input($_POST['tds']);
        $turbidity = input($_POST['turbid']);
        $temperature = input($_POST['temper']);
        $ph = input($_POST['ph']);
        $konduktivitas = input($_POST['konduktivitas']);
        $warna = input($_POST['warna']);
        $query = "UPDATE `nilai` SET `id_nilai` = '$id',`nama_sungai`='$sungai',`tds`='$tds',`turbidity`='$turbidity',`temperature`='$temperature',`ph`='$ph',`konduktivitas`='$konduktivitas',`warna`='$warna' WHERE `id_nilai` = '$idedit'";
        $sql = mysqli_query($conn, $query);
        unset($_SESSION['id']);
        header('location: nilai.php');
    }

    //edit batas clicked
    if(isset($_POST['editbatas'])){
        $idedit = $_SESSION['id'];
        $tds = input($_POST['tds']);
        $turbidity = input($_POST['turbidity']);
        $temperature = input($_POST['temperature']);
        $ph = input($_POST['ph']);
        $konduktivitas = input($_POST['konduktivitas']);
        $warna = input($_POST['warna']);
        $query = "UPDATE `batas` SET `tds`='$tds',`turbidity`='$turbidity',`temperature`='$temperature',`ph`='$ph',`konduktivitas`='$konduktivitas',`warna`='$warna' WHERE `id_batas` = '$idedit'";
        $sql = mysqli_query($conn, $query);
        unset($_SESSION['id']);
        header('location: ambang_batas.php');
    }
?>
