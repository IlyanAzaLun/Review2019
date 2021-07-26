-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2019 at 07:29 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(80) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_telp`) VALUES
('56489f17-79ab-4b98-9f90-c311e018e549', 'Domino Domin', 'Jari Kaki', 'Jl Kumuh 20B', '09812731244'),
('c3d2f2eb-6058-4faa-8b99-636eaa91bf89', 'Fugushu Maja', 'Pikiran', 'Jl Layang Padalaman', '08888123811');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(80) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
('55efc6a5-d9db-11e9-a078-d05349e79cc7', 'Oskadon SP', 'Pereda Pegal'),
('55eff7ac-d9db-11e9-a078-d05349e79cc7', 'ProMag', 'Pereda sakit lapar'),
('55f02a00-d9db-11e9-a078-d05349e79cc7', 'Ultra Flu', 'Pereda Bersin'),
('da6a7d54-6aa9-4619-b2f4-87da7b94da7b', 'Paramex', 'pereda nyeri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nomor_identitas` varchar(30) NOT NULL,
  `nama_pasien` varchar(80) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nomor_identitas`, `nama_pasien`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('01d8be83-55fc-4555-872f-fb44d97ece15', '3211', 'indeai', 'P', 'Banten 90P90', '09801231'),
('28e833a2-ea5d-4020-96d0-ab6d5d42e0f2', '129379192', 'Jono Banturasu', 'L', 'Jl. Kemang 9011', '091823111'),
('2a1a26ad-c5b3-4adb-990d-ba6faa3953dc', '10220113', 'Agis', 'L', 'Jl Pinus bambu', '89221222122'),
('360c063b-2832-412c-9f03-7b4ab241444a', '1231', 'Danu', 'L', 'Sumedang Jl.301', '19028310'),
('47b6ad09-5b9c-40c3-8c09-7d24d897bf6d', '128391', 'Agis Pinus', 'L', 'Jl Pinus bambu', '0192831'),
('73b7de98-c816-4906-879e-fa3f8cda3631', '10220115', 'Cinday', 'P', 'Banten 90P90', '89123087909'),
('7fbd6e5d-f9d3-49b5-8699-7f7a9d42a4b5', '10220116', 'Pini', 'P', 'Jl. GatotGaca', '89123876234'),
('ddcc518f-2e45-411a-98ca-3504e5b9d824', '10220114', 'Jono Banturasu', 'L', 'Jl. Kemang 9011', '89221123987'),
('ea5dfb21-4a88-4e6c-ada0-09548ad4d559', '91823', 'Yudi', 'L', 'Jl. GatotGaca', '9102398');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poli`, `nama_poli`, `gedung`) VALUES
('545a2678-6e4f-443c-b002-b0b9b66bdfa2', 'Poli A11', 'B.Lt2'),
('6caeb8da-6adf-4228-8594-052b3836d063', 'Poli A21', 'C.Lt2'),
('7e7d7b70-54fd-4286-89f1-afa1992dbc3c', 'Poli B2', 'B. lt2'),
('92bf5399-d9f8-11e9-a078-d05349e79cc7', 'Poli A', 'J.lt1'),
('92bf7e42-d9f8-11e9-a078-d05349e79cc7', 'Poli B', 'J.lt 2'),
('9ab328e5-5339-4e3f-9074-9c26228c2051', 'A.Lt2asdas', 'asdasd'),
('fa9e581e-9cf0-4f74-8fdd-b59c6741ec53', 'Poli B1', 'B. lt1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekammedis`
--

INSERT INTO `tb_rekammedis` (`id_rm`, `id_pasien`, `keluhan`, `id_dokter`, `diagnosa`, `id_poli`, `tgl_periksa`) VALUES
('86d3e83a-85b8-410e-a908-f236f4c2cbac', '360c063b-2832-412c-9f03-7b4ab241444a', 'Muntah darah', '56489f17-79ab-4b98-9f90-c311e018e549', 'radang tenggorokan', '92bf5399-d9f8-11e9-a078-d05349e79cc7', '2019-09-21'),
('b6463eea-1343-4931-a912-365ed9cc322a', '01d8be83-55fc-4555-872f-fb44d97ece15', 'sakit perut', '56489f17-79ab-4b98-9f90-c311e018e549', 'Makan makanan pedas', '9ab328e5-5339-4e3f-9074-9c26228c2051', '2019-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rm_obat`
--

CREATE TABLE `tb_rm_obat` (
  `id` int(8) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rm_obat`
--

INSERT INTO `tb_rm_obat` (`id`, `id_rm`, `id_obat`) VALUES
(1, 'b6463eea-1343-4931-a912-365ed9cc322a', '55efc6a5-d9db-11e9-a078-d05349e79cc7'),
(2, 'b6463eea-1343-4931-a912-365ed9cc322a', '55eff7ac-d9db-11e9-a078-d05349e79cc7'),
(5, '86d3e83a-85b8-410e-a908-f236f4c2cbac', '55efc6a5-d9db-11e9-a078-d05349e79cc7'),
(6, '86d3e83a-85b8-410e-a908-f236f4c2cbac', 'da6a7d54-6aa9-4619-b2f4-87da7b94da7b'),
(7, '86d3e83a-85b8-410e-a908-f236f4c2cbac', '55eff7ac-d9db-11e9-a078-d05349e79cc7');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('91175ffa-d9ae-11e9-8d30-d05349e79cc7', 'Iyang Agung Supriatna', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rm` (`id_rm`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nama_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`);

--
-- Constraints for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD CONSTRAINT `tb_rm_obat_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rm_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
