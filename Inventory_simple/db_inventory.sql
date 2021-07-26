-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2020 at 06:44 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_Sab21Sep19`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(6) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `harga_brg` int(6) NOT NULL,
  `stok_brg` int(6) NOT NULL,
  `detail_brg` text NOT NULL,
  `gbr_brg` varchar(50) NOT NULL,
  `tgl_publish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `harga_brg`, `stok_brg`, `detail_brg`, `gbr_brg`, `tgl_publish`) VALUES
(9, 'Kano - Album Blue', 100090, 120000, '', 'brg-1569553973.png', '2019-09-26'),
(10, 'Aimer - Album Noir', 120000, 120000, 'Aimer - Album DaysFortst : \'01. insane dream.mp3\'        \'10. closer.mp3\' \'02. ninelie.mp3\'             \'11. Falling Alone.mp3\' \'03. twoface.mp3\'             \'12. us.mp3\' \'04. Higher Ground.mp3\'       \'13. Stars in the rain.mp3\' \'05. for tzqi with juxc.mp3\'   Cover1.jpg \'06. uvwb.mp3\'                 Cover2.jpg \'07. fzeiy.mp3\'                Cover3.jpg \'08. Hz(yre).mp3\'             \'Download Japanese Music - HikarinoAkari OST.htm\' \'09. sk.mp3\'', 'brg-1569553998.jpg', '2019-09-27'),
(12, 'Aimer - Album Blanc', 201000, 220000, 'Aimer - Album DaysFortst : \'01. insane dream.mp3\'        \'10. closer.mp3\' \'02. ninelie.mp3\'             \'11. Falling Alone.mp3\' \'03. twoface.mp3\'             \'12. us.mp3\' \'04. Higher Ground.mp3\'       \'13. Stars in the rain.mp3\' \'05. for tzqi with juxc.mp3\'   Cover1.jpg \'06. uvwb.mp3\'                 Cover2.jpg \'07. fzeiy.mp3\'                Cover3.jpg \'08. Hz(yre).mp3\'             \'Download Japanese Music - HikarinoAkari OST.htm\' \'09. sk.mp3\'', 'brg-1569554013.jpg', '2019-09-27'),
(13, 'Aimer - Album DaysFortst', 201000, 20000, 'Aimer - Album DaysFortst : \'01. insane dream.mp3\'        \'10. closer.mp3\'\r\n\'02. ninelie.mp3\'             \'11. Falling Alone.mp3\'\r\n\'03. twoface.mp3\'             \'12. us.mp3\'\r\n\'04. Higher Ground.mp3\'       \'13. Stars in the rain.mp3\'\r\n\'05. for tzqi with juxc.mp3\'   Cover1.jpg\r\n\'06. uvwb.mp3\'                 Cover2.jpg\r\n\'07. fzeiy.mp3\'                Cover3.jpg\r\n\'08. Hz(yre).mp3\'             \'Download Japanese Music - HikarinoAkari OST.htm\'\r\n\'09. sk.mp3\'\r\n', 'brg-1569555696.jpg', '2019-09-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
