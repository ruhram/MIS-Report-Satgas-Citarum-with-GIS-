-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 06:39 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citarum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(50) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `nama_admin` varchar(200) NOT NULL,
  `jabatan_admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `nama_admin`, `jabatan_admin`) VALUES
(101, 'admin', 'admin', 'admin1', 'Sekretaris Satgas Citarum');

-- --------------------------------------------------------

--
-- Table structure for table `capaian`
--

CREATE TABLE `capaian` (
  `id_target` int(11) NOT NULL,
  `id_rencana` int(100) NOT NULL,
  `id_dansubsektor` int(100) NOT NULL,
  `laporan` varchar(255) NOT NULL,
  `kendala` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capaian`
--

INSERT INTO `capaian` (`id_target`, `id_rencana`, `id_dansubsektor`, `laporan`, `kendala`, `gambar`) VALUES
(7, 1, 101, 'Sedimentasi telah dikeruk semua di muara sungai cikapundung dengan volume 20 meter kubik', 'Alat berat yang digunakan tidak bisa dipakai karena arus sungai deras', 'citarum1.jpg'),
(8, 2, 101, 'Sudah ditanam 5 pohon mangga di sepanjang sungai citarum', 'Tidak ada ', 'citarum2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dansektor`
--

CREATE TABLE `dansektor` (
  `id_dansektor` int(50) NOT NULL,
  `username_dansektor` varchar(200) NOT NULL,
  `password_dansektor` varchar(200) NOT NULL,
  `nama_dansektor` varchar(200) NOT NULL,
  `pangkat_dansektor` varchar(100) NOT NULL,
  `id_sektor` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dansektor`
--

INSERT INTO `dansektor` (`id_dansektor`, `username_dansektor`, `password_dansektor`, `nama_dansektor`, `pangkat_dansektor`, `id_sektor`) VALUES
(6, 'dansektor6', '1234', 'Dodo Hermanto', 'Kolonel', 6);

-- --------------------------------------------------------

--
-- Table structure for table `dansubsektor`
--

CREATE TABLE `dansubsektor` (
  `id_dansubsektor` int(100) NOT NULL,
  `username_dansubsektor` varchar(100) NOT NULL,
  `password_dansubsektor` varchar(100) NOT NULL,
  `nama_dansubsektor` varchar(100) NOT NULL,
  `pangkat_dansubsektor` varchar(50) NOT NULL,
  `id_sektor` int(50) NOT NULL,
  `id_subsektor` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dansubsektor`
--

INSERT INTO `dansubsektor` (`id_dansubsektor`, `username_dansubsektor`, `password_dansubsektor`, `nama_dansubsektor`, `pangkat_dansubsektor`, `id_sektor`, `id_subsektor`) VALUES
(2, 'dansubsektor2', '4567', 'Dansubsektor2', 'Letda', 6, 602),
(3, 'dansubsektor3', '1234', 'Dansubsektor3', 'Letda', 6, 603),
(4, 'dansubsektor4', '1234', 'Dansubsektor4', 'Letda', 6, 604),
(5, 'dansubsektor5', '1234', 'Dansubsektor5', 'Letda', 6, 605),
(6, 'dansubsektor 6', '1234', 'Dansubsektor 6', 'Letda', 6, 606),
(7, 'dansubsektor 7', '1234', 'Dansubsektor 7', 'Letda', 6, 607),
(8, 'dansubsektor8', '1234', 'Dansubektor 8', 'Letda', 6, 608),
(9, 'dansubsektor9', '1234', 'Dansubektor 9', 'Letda', 6, 609),
(10, 'dansubsektor10', '1234', 'Dansubsektor 10', 'Letda', 6, 610),
(11, 'dansubsektor11', '1234', 'Dansubsektor 11', 'Letda', 6, 611),
(101, 'dansubsektor1', '1234', 'Dansubsektor1', 'Letda', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `incinerator`
--

CREATE TABLE `incinerator` (
  `id_incinerator` int(50) NOT NULL,
  `id_subsektor` int(50) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kelurahan` varchar(200) NOT NULL,
  `tahun` varchar(200) NOT NULL,
  `jumlah` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incinerator`
--

INSERT INTO `incinerator` (`id_incinerator`, `id_subsektor`, `kecamatan`, `kelurahan`, `tahun`, `jumlah`) VALUES
(1, 1, 'Bojongsoang', 'Tegalluar', '2019', '1'),
(2, 602, 'Bojongsoang', 'Bojongsari', '2019', '3'),
(3, 603, 'Bojongsoang', 'Cikoneng', '2019', '0'),
(4, 604, 'Dayeuhkolot', 'Citeureup', '2019', '1'),
(5, 605, 'Bojongsoang', 'Bojongsoang', '2019', '1'),
(6, 606, 'Baleendah', 'Wargamekar', '2019', '3'),
(7, 607, 'Baleendah', 'Jelekong', '2019', '1'),
(8, 608, 'Baleendah', 'Manggahang', '2019', '1'),
(9, 609, 'Baleendah', 'Baleendah', '2019', '2'),
(10, 610, 'Bojongsoang', 'Oxbow Cijagra', '2019', '1'),
(11, 611, 'Bojongsoang', 'Cibisoro', '2019', '2');

-- --------------------------------------------------------

--
-- Table structure for table `masalah`
--

CREATE TABLE `masalah` (
  `id_masalah` int(11) NOT NULL,
  `id_dansubsektor` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `masalah` varchar(200) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masalah`
--

INSERT INTO `masalah` (`id_masalah`, `id_dansubsektor`, `tanggal`, `lokasi`, `masalah`, `gambar`, `status`) VALUES
(4, 101, '2020-06-06', 'Bojongsari', 'Sampah domestik sudah menumpuk sehingga dibutuhkan alat berat untuk mengangkut sampah', 'sampah.jpg', 'Not Approve');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(50) NOT NULL,
  `nama_perusahaan` varchar(200) NOT NULL,
  `id_subsektor` int(50) NOT NULL,
  `kelurahan` varchar(200) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `id_subsektor`, `kelurahan`, `kecamatan`, `latitude`, `longitude`, `keterangan`) VALUES
(1, 'PT. Sinar Pusaka', 609, 'Baleendah', 'Baleendah', '-6.996338', ' 107.630993', ''),
(2, 'PT. Tridayamas Sinar Pusaka', 609, 'Baleendah', 'Baleendah', '-6.993205', ' 107.629701', 'Pembuangan limbah paralon ke sungai citarum'),
(3, 'PT. Anggana Kurnia Putra', 602, 'Bojongsari', 'Bojongsoang', '-7.009884', '107.649209', ''),
(4, 'PT. Internal Tekstil Group', 608, 'Manggahang', 'Baleendah', '-7.010253', '107.639679', ''),
(5, 'PT. Asta Tapioca Factory', 609, 'Baleendah', 'Baleendah', '-6.992306', '107.628325', ''),
(6, 'PT. Marga Asih Selaras', 608, 'Manggahang', 'Baleendah', '-7.013710', '107.648840', ''),
(7, 'PT. Koyukang', 608, 'Manggahang', 'Baleendah', '-7.008854', '107.637658', ''),
(8, 'PT. Kharisma Trijaya Mandiri', 608, 'Manggahang', 'Baleendah', '-7.011436', '107.643004', ''),
(9, 'CV. Matahari Terbit', 604, 'Citeureup', 'Dayeuhkolot', '-6.986003', '107.625846', 'Pembuangan limbah tanpa IPAL');

-- --------------------------------------------------------

--
-- Table structure for table `pohon`
--

CREATE TABLE `pohon` (
  `id_pohon` int(50) NOT NULL,
  `id_subsektor` int(50) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kelurahan` varchar(200) NOT NULL,
  `tahun` varchar(200) NOT NULL,
  `jenis_pohon` varchar(200) NOT NULL,
  `jumlah_pohon` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pohon`
--

INSERT INTO `pohon` (`id_pohon`, `id_subsektor`, `kecamatan`, `kelurahan`, `tahun`, `jenis_pohon`, `jumlah_pohon`) VALUES
(101, 1, 'Bojongsoang', 'Tegalluar', '2019', 'Durian', 572),
(102, 1, 'Bojongsoang', 'Tegalluar', '2019', 'Nangka', 566),
(103, 1, 'Bojongsoang', 'Tegalluar', '2019', 'Alpukat', 532),
(104, 1, 'Bojongsoang', 'Tegalluar', '2019', 'Mangga', 20),
(105, 1, 'Bojongsoang', 'Tegalluar', '2019', 'Pucuk Merah', 10),
(111, 611, 'Bojongsoang', 'Oxbow Cijagra', '2019', 'Nangka', 386),
(112, 611, 'Bojongsoang', 'Oxbow Cijagra', '2019', 'Sirsak', 487),
(113, 611, 'Bojongsoang', 'Oxbow Cijagra', '2019', 'Petai', 256),
(114, 611, 'Bojongsoang', 'Oxbow Cijagra', '2019', 'Mangga', 10),
(201, 602, 'Bojongsoang', 'Bojongsari', '2019', 'Sirsak', 455),
(202, 602, 'Bojongsoang', 'Bojongsari', '2019', 'Bambu ', 563),
(203, 602, 'Bojongsoang', 'Bojongsari', '2019', 'Nangka', 520),
(204, 602, 'Bojongsoang', 'Bojongsari', '2019', 'Mangga', 10),
(205, 602, 'Bojongsoang', 'Bojongsari', '2019', 'Pucuk Merah', 20),
(401, 604, 'Dayeuhkolot', 'Citeureup', '2019', 'Petai', 378),
(402, 604, 'Dayeuhkolot', 'Citeureup', '2019', 'Jengkol', 268),
(403, 604, 'Dayeuhkolot', 'Citeureup', '2019', 'Alpukat', 480),
(404, 604, 'Dayeuhkolot', 'Citeureup', '2019', 'Durian', 329),
(601, 606, 'Baleendah', 'Wargamekar', '2019', 'Nangka', 156),
(602, 606, 'Baleendah', 'Wargamekar', '2019', 'Sirsak', 367),
(603, 606, 'Baleendah', 'Wargamekar', '2019', 'Pucuk Merah', 9),
(701, 607, 'Baleendah', 'Jelekong', '2019', 'Petai', 258),
(702, 607, 'Baleendah', 'Jelekong', '2019', 'Jengkol', 365),
(703, 607, 'Baleendah', 'Jelekong', '2019', 'Alpukat', 265),
(801, 608, 'Baleendah', 'Manggahang', '2019', 'Nangka', 329),
(802, 608, 'Baleendah', 'Manggahang', '2019', 'Durian', 245),
(803, 608, 'Baleendah', 'Manggahang', '2019', 'Mangga', 8),
(901, 609, 'Baleendah', 'Baleendah', '2019', 'Alpukat', 364),
(902, 609, 'Baleendah', 'Baleendah', '2019', 'Mangga', 5),
(903, 609, 'Baleendah', 'Baleendah', '2019', 'Petai', 349);

-- --------------------------------------------------------

--
-- Table structure for table `rencana`
--

CREATE TABLE `rencana` (
  `id_rencana` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `target` varchar(250) NOT NULL,
  `id_dansubsektor` int(50) NOT NULL,
  `sektor` int(50) NOT NULL,
  `id_lokasi` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rencana`
--

INSERT INTO `rencana` (`id_rencana`, `tanggal`, `deskripsi`, `target`, `id_dansubsektor`, `sektor`, `id_lokasi`, `status`) VALUES
(1, '2020-06-06', 'Melanjutkan pengerukan sedimentasi tanah di muara Sungai Cikapundung dekat jembatan cijagra ', 'Pengerukan sedimentasi tanah selesai pada hari ini ', 101, 6, 'Bojongsoang', 'Finish'),
(2, '2020-06-09', 'Melakukan penanaman pohon mangga di sepanjang Sungai Citarum', 'Menanam 5 pohon mangga ', 101, 6, 'Bojongsoang', 'Finish');

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id_sampah` int(50) NOT NULL,
  `id_subsektor` int(50) NOT NULL,
  `tahun` varchar(200) NOT NULL,
  `volume_sampah` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id_sampah`, `id_subsektor`, `tahun`, `volume_sampah`) VALUES
(1, 1, '2019', '8760'),
(2, 602, '2019', '6570'),
(3, 603, '2019', '15330'),
(4, 604, '2019', '17520'),
(5, 605, '2019', '26280'),
(6, 606, '2019', '10950'),
(7, 607, '2019', '13140'),
(8, 608, '2019', '17520'),
(9, 609, '2019', '29200'),
(10, 610, '2019', '8760'),
(11, 611, '2019', '17520');

-- --------------------------------------------------------

--
-- Table structure for table `sanitasi`
--

CREATE TABLE `sanitasi` (
  `id_sanitasi` int(50) NOT NULL,
  `id_subsektor` int(50) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kelurahan` varchar(200) NOT NULL,
  `tahun` varchar(200) NOT NULL,
  `jumlah_sanitasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanitasi`
--

INSERT INTO `sanitasi` (`id_sanitasi`, `id_subsektor`, `kecamatan`, `kelurahan`, `tahun`, `jumlah_sanitasi`) VALUES
(1, 1, 'Bojongsoang', 'Tegalluar', '2019', '3'),
(2, 602, 'Bojongsoang', 'Bojongsari', '2019', '1'),
(3, 605, 'Bojongsoang', 'Bojongsoang', '2019', '1'),
(4, 604, 'Dayeuhkolot', 'Citeureup', '2019', '1'),
(5, 608, 'Baleendah', 'Manggahang', '2019', '1'),
(6, 609, 'Baleendah', 'Baleendah', '2019', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sedimentasi`
--

CREATE TABLE `sedimentasi` (
  `id_sedimentasi` int(50) NOT NULL,
  `id_subsektor` int(50) NOT NULL,
  `nama_sungai` varchar(200) NOT NULL,
  `panjang_sungai` int(150) NOT NULL,
  `lebar_sungai` int(150) NOT NULL,
  `volume_sedimentasi` int(100) NOT NULL,
  `tahun_sedimentasi` varchar(100) NOT NULL,
  `keterangan_sedimentasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sedimentasi`
--

INSERT INTO `sedimentasi` (`id_sedimentasi`, `id_subsektor`, `nama_sungai`, `panjang_sungai`, `lebar_sungai`, `volume_sedimentasi`, `tahun_sedimentasi`, `keterangan_sedimentasi`) VALUES
(1, 602, 'Citarum', 970, 40, 81310, '2019', 'Dibuat tanggul'),
(2, 605, 'Citarum', 510, 15, 47520, '2019', 'Dibuat tanggul'),
(3, 605, 'Cikapundung', 250, 35, 12400, '2019', 'Dibuat Tanggul'),
(4, 609, 'Citarum', 300, 20, 42750, '2019', 'Diangkut'),
(5, 606, 'Citarum', 450, 30, 7580, '2019', 'Dibuat Tanggul'),
(6, 611, 'Citarum', 300, 20, 10250, '2019', 'Dibuat Tanggul');

-- --------------------------------------------------------

--
-- Table structure for table `sektor`
--

CREATE TABLE `sektor` (
  `id_sektor` int(50) NOT NULL,
  `nomor_sektor` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sektor`
--

INSERT INTO `sektor` (`id_sektor`, `nomor_sektor`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `subsektor`
--

CREATE TABLE `subsektor` (
  `id_subsektor` int(50) NOT NULL,
  `nama_subsektor` varchar(50) NOT NULL,
  `id_sektor` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subsektor`
--

INSERT INTO `subsektor` (`id_subsektor`, `nama_subsektor`, `id_sektor`) VALUES
(1, '1', 6),
(602, '2', 6),
(603, '3', 6),
(604, '4', 6),
(605, '5', 6),
(606, '6', 6),
(607, '7', 6),
(608, '8', 6),
(609, '9', 6),
(610, '10', 6),
(611, '11', 6);

-- --------------------------------------------------------

--
-- Table structure for table `taman`
--

CREATE TABLE `taman` (
  `id_taman` int(50) NOT NULL,
  `id_subsektor` int(50) NOT NULL,
  `kelurahan` varchar(200) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `jumlah` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taman`
--

INSERT INTO `taman` (`id_taman`, `id_subsektor`, `kelurahan`, `kecamatan`, `tahun`, `jumlah`) VALUES
(1, 1, 'Tegalluar', 'Bojongsoang', '2019', 3),
(2, 602, 'Bojongsari', 'Bojongsoang', '2019', 3),
(4, 604, 'Citeureup', 'Dayeuhkolot', '2019', 3),
(5, 605, 'Bojongsoang', 'Bojongsoang', '2019', 3),
(6, 606, 'Wargamekar', 'Baleendah', '2019', 3),
(7, 607, 'Jelekong', 'Baleendah', '2019', 1),
(9, 609, 'Baleendah', 'Baleendah', '2019', 4),
(11, 611, 'Oxbow Cijagra', 'Bojongsoang', '2019', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tempatsampah`
--

CREATE TABLE `tempatsampah` (
  `id_tempatsampah` int(50) NOT NULL,
  `id_subsektor` int(50) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kelurahan` varchar(200) NOT NULL,
  `tahun` varchar(200) NOT NULL,
  `jumlah` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempatsampah`
--

INSERT INTO `tempatsampah` (`id_tempatsampah`, `id_subsektor`, `kecamatan`, `kelurahan`, `tahun`, `jumlah`) VALUES
(1, 1, 'Bojongsoang', 'Tegalluar', '2019', '4'),
(2, 602, 'Bojongsoang', 'Bojongsari', '2019', '3'),
(3, 603, 'Bojongsoang', 'Cikoneng ', '2019', '2'),
(4, 604, 'Dayeuhkolot', 'Citeureup', '2019', '5'),
(5, 605, 'Bojongsoang', 'Bojongsoang', '2019', '2'),
(7, 607, 'Baleendah', 'Jelekong', '2019', '6'),
(8, 608, 'Baleendah', 'Manggahang', '2019', '3'),
(9, 609, 'Baleendah', 'Baleendah', '2019', '3'),
(10, 610, 'Bojongsoang', 'Cibisoro', '2019', '4'),
(11, 611, 'Bojongsoang', 'Oxbow Cijagra', '2019', '4'),
(606, 606, 'Baleendah', 'Wargamekar', '2019', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tps`
--

CREATE TABLE `tps` (
  `id_tps` int(50) NOT NULL,
  `id_subsektor` int(50) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kelurahan` varchar(200) NOT NULL,
  `tahun` varchar(200) NOT NULL,
  `jumlah` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tps`
--

INSERT INTO `tps` (`id_tps`, `id_subsektor`, `kecamatan`, `kelurahan`, `tahun`, `jumlah`) VALUES
(1, 1, 'Bojongsoang', 'Tegalluar', '2019', '2'),
(2, 602, 'Bojongsoang', 'Bojongsari', '2019', '5'),
(3, 603, 'Bojongsoang', 'Cikoneng', '2019', '1'),
(4, 610, 'Bojongsoang', 'Cibisoro', '2019', '4'),
(5, 604, 'Dayeuhkolot', 'Citeureup', '2019', '3'),
(6, 606, 'Bojongsoang', 'Bojongsoang', '2019', '6'),
(7, 607, 'Baleendah', 'Wargamekar', '2019', '5'),
(8, 608, 'Baleendah', 'Manggahang', '2019', '4'),
(9, 609, 'Baleendah', 'Baleendah', '2019', '5'),
(11, 611, 'Bojongsoang', 'Oxbow Cijagra', '2019', '2');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_sektor`
--

CREATE TABLE `wilayah_sektor` (
  `id_wilayahsektor` int(50) NOT NULL,
  `id_sektor` int(50) NOT NULL,
  `peta_sektor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_sektor`
--

INSERT INTO `wilayah_sektor` (`id_wilayahsektor`, `id_sektor`, `peta_sektor`) VALUES
(6, 6, 'Sektor6.geojson');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_subsektor`
--

CREATE TABLE `wilayah_subsektor` (
  `id_wilayahsubsektor` int(50) NOT NULL,
  `id_sektor` int(50) NOT NULL,
  `id_subsektor` int(50) NOT NULL,
  `peta_subsektor` varchar(200) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kelurahan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_subsektor`
--

INSERT INTO `wilayah_subsektor` (`id_wilayahsubsektor`, `id_sektor`, `id_subsektor`, `peta_subsektor`, `kecamatan`, `kelurahan`) VALUES
(1, 6, 1, 'Tegalluar.geojson', 'Bojongsoang', 'Tegalluar'),
(2, 6, 602, 'bojongsari.geojson', 'Bojongsoang', 'Bojongsari'),
(3, 6, 603, 'Cikoneng.geojson', 'Bojongsoang', 'Cikoneng'),
(4, 6, 604, 'citeureup.geojson', 'Dayeuhkolot', 'Citeureup'),
(5, 6, 605, 'Bojongsoang.geojson', 'Bojongsoang', 'Bojongsoang'),
(6, 6, 606, 'Wargamekar.geojson', 'Baleendah', 'Wargamekar'),
(7, 6, 607, 'Jelekong.geojson', 'Baleendah', 'Jelekong'),
(8, 6, 608, 'Manggahang.geojson', 'Baleendah', 'Manggahang'),
(9, 6, 609, 'Baleendah.geojson', 'Baleendah', 'Baleendah'),
(10, 6, 610, 'Cibisoro.geojson', 'Bojongsoang', 'Cibisoro'),
(11, 6, 611, 'oxbow.geojson', 'Bojongsoang', 'Oxbow Cijagra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `capaian`
--
ALTER TABLE `capaian`
  ADD PRIMARY KEY (`id_target`),
  ADD KEY `id_rencana` (`id_rencana`),
  ADD KEY `id_dansubsektor` (`id_dansubsektor`);

--
-- Indexes for table `dansektor`
--
ALTER TABLE `dansektor`
  ADD PRIMARY KEY (`id_dansektor`),
  ADD KEY `id_sektor` (`id_sektor`);

--
-- Indexes for table `dansubsektor`
--
ALTER TABLE `dansubsektor`
  ADD PRIMARY KEY (`id_dansubsektor`),
  ADD KEY `id_sektor` (`id_sektor`),
  ADD KEY `id_subsektor` (`id_subsektor`);

--
-- Indexes for table `incinerator`
--
ALTER TABLE `incinerator`
  ADD PRIMARY KEY (`id_incinerator`),
  ADD KEY `id_subsektor` (`id_subsektor`);

--
-- Indexes for table `masalah`
--
ALTER TABLE `masalah`
  ADD PRIMARY KEY (`id_masalah`),
  ADD KEY `id_dansubsektor` (`id_dansubsektor`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD KEY `id_subsektor` (`id_subsektor`);

--
-- Indexes for table `pohon`
--
ALTER TABLE `pohon`
  ADD PRIMARY KEY (`id_pohon`),
  ADD KEY `id_subsektor` (`id_subsektor`);

--
-- Indexes for table `rencana`
--
ALTER TABLE `rencana`
  ADD PRIMARY KEY (`id_rencana`),
  ADD KEY `id_dansubsektor` (`id_dansubsektor`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id_sampah`),
  ADD KEY `id_subsektor` (`id_subsektor`);

--
-- Indexes for table `sanitasi`
--
ALTER TABLE `sanitasi`
  ADD PRIMARY KEY (`id_sanitasi`),
  ADD KEY `id_subsektor` (`id_subsektor`);

--
-- Indexes for table `sedimentasi`
--
ALTER TABLE `sedimentasi`
  ADD PRIMARY KEY (`id_sedimentasi`),
  ADD KEY `id_subsektor` (`id_subsektor`);

--
-- Indexes for table `sektor`
--
ALTER TABLE `sektor`
  ADD PRIMARY KEY (`id_sektor`);

--
-- Indexes for table `subsektor`
--
ALTER TABLE `subsektor`
  ADD PRIMARY KEY (`id_subsektor`),
  ADD KEY `id_sektor` (`id_sektor`);

--
-- Indexes for table `taman`
--
ALTER TABLE `taman`
  ADD PRIMARY KEY (`id_taman`),
  ADD KEY `id_subsektor` (`id_subsektor`);

--
-- Indexes for table `tempatsampah`
--
ALTER TABLE `tempatsampah`
  ADD PRIMARY KEY (`id_tempatsampah`),
  ADD KEY `id_subsektor` (`id_subsektor`);

--
-- Indexes for table `tps`
--
ALTER TABLE `tps`
  ADD PRIMARY KEY (`id_tps`),
  ADD KEY `id_subsektor` (`id_subsektor`);

--
-- Indexes for table `wilayah_sektor`
--
ALTER TABLE `wilayah_sektor`
  ADD PRIMARY KEY (`id_wilayahsektor`),
  ADD KEY `id_sektor` (`id_sektor`);

--
-- Indexes for table `wilayah_subsektor`
--
ALTER TABLE `wilayah_subsektor`
  ADD PRIMARY KEY (`id_wilayahsubsektor`),
  ADD KEY `id_subsektor` (`id_subsektor`),
  ADD KEY `id_sektor` (`id_sektor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `capaian`
--
ALTER TABLE `capaian`
  MODIFY `id_target` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `masalah`
--
ALTER TABLE `masalah`
  MODIFY `id_masalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rencana`
--
ALTER TABLE `rencana`
  MODIFY `id_rencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capaian`
--
ALTER TABLE `capaian`
  ADD CONSTRAINT `capaian_ibfk_1` FOREIGN KEY (`id_rencana`) REFERENCES `rencana` (`id_rencana`),
  ADD CONSTRAINT `capaian_ibfk_2` FOREIGN KEY (`id_dansubsektor`) REFERENCES `dansubsektor` (`id_dansubsektor`);

--
-- Constraints for table `dansektor`
--
ALTER TABLE `dansektor`
  ADD CONSTRAINT `dansektor_ibfk_1` FOREIGN KEY (`id_sektor`) REFERENCES `sektor` (`id_sektor`);

--
-- Constraints for table `dansubsektor`
--
ALTER TABLE `dansubsektor`
  ADD CONSTRAINT `dansubsektor_ibfk_1` FOREIGN KEY (`id_sektor`) REFERENCES `sektor` (`id_sektor`),
  ADD CONSTRAINT `dansubsektor_ibfk_2` FOREIGN KEY (`id_subsektor`) REFERENCES `subsektor` (`id_subsektor`);

--
-- Constraints for table `incinerator`
--
ALTER TABLE `incinerator`
  ADD CONSTRAINT `incinerator_ibfk_1` FOREIGN KEY (`id_subsektor`) REFERENCES `subsektor` (`id_subsektor`);

--
-- Constraints for table `masalah`
--
ALTER TABLE `masalah`
  ADD CONSTRAINT `masalah_ibfk_1` FOREIGN KEY (`id_dansubsektor`) REFERENCES `dansubsektor` (`id_dansubsektor`);

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`id_subsektor`) REFERENCES `subsektor` (`id_subsektor`);

--
-- Constraints for table `pohon`
--
ALTER TABLE `pohon`
  ADD CONSTRAINT `pohon_ibfk_1` FOREIGN KEY (`id_subsektor`) REFERENCES `subsektor` (`id_subsektor`);

--
-- Constraints for table `rencana`
--
ALTER TABLE `rencana`
  ADD CONSTRAINT `rencana_ibfk_1` FOREIGN KEY (`id_dansubsektor`) REFERENCES `dansubsektor` (`id_dansubsektor`);

--
-- Constraints for table `sampah`
--
ALTER TABLE `sampah`
  ADD CONSTRAINT `sampah_ibfk_1` FOREIGN KEY (`id_subsektor`) REFERENCES `subsektor` (`id_subsektor`);

--
-- Constraints for table `sanitasi`
--
ALTER TABLE `sanitasi`
  ADD CONSTRAINT `sanitasi_ibfk_1` FOREIGN KEY (`id_subsektor`) REFERENCES `subsektor` (`id_subsektor`);

--
-- Constraints for table `sedimentasi`
--
ALTER TABLE `sedimentasi`
  ADD CONSTRAINT `sedimentasi_ibfk_1` FOREIGN KEY (`id_subsektor`) REFERENCES `subsektor` (`id_subsektor`);

--
-- Constraints for table `subsektor`
--
ALTER TABLE `subsektor`
  ADD CONSTRAINT `subsektor_ibfk_1` FOREIGN KEY (`id_sektor`) REFERENCES `sektor` (`id_sektor`);

--
-- Constraints for table `taman`
--
ALTER TABLE `taman`
  ADD CONSTRAINT `taman_ibfk_1` FOREIGN KEY (`id_subsektor`) REFERENCES `subsektor` (`id_subsektor`);

--
-- Constraints for table `tempatsampah`
--
ALTER TABLE `tempatsampah`
  ADD CONSTRAINT `tempatsampah_ibfk_1` FOREIGN KEY (`id_subsektor`) REFERENCES `subsektor` (`id_subsektor`);

--
-- Constraints for table `tps`
--
ALTER TABLE `tps`
  ADD CONSTRAINT `tps_ibfk_1` FOREIGN KEY (`id_subsektor`) REFERENCES `subsektor` (`id_subsektor`);

--
-- Constraints for table `wilayah_sektor`
--
ALTER TABLE `wilayah_sektor`
  ADD CONSTRAINT `wilayah_sektor_ibfk_1` FOREIGN KEY (`id_sektor`) REFERENCES `sektor` (`id_sektor`);

--
-- Constraints for table `wilayah_subsektor`
--
ALTER TABLE `wilayah_subsektor`
  ADD CONSTRAINT `wilayah_subsektor_ibfk_1` FOREIGN KEY (`id_subsektor`) REFERENCES `subsektor` (`id_subsektor`),
  ADD CONSTRAINT `wilayah_subsektor_ibfk_2` FOREIGN KEY (`id_sektor`) REFERENCES `sektor` (`id_sektor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
