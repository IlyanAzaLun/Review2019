-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2018 at 05:22 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bengkel_motor`
--
CREATE DATABASE IF NOT EXISTS `bengkel_motor` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bengkel_motor`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `nomor_hp` varchar(25) DEFAULT NULL,
  `alamat` text,
  `tipe_motor` enum('Bebek','Trail','Vespa','Moge') NOT NULL,
  `plat_nomor` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `nomor_hp`, `alamat`, `tipe_motor`, `plat_nomor`) VALUES
(1, 'Dadan', NULL, NULL, 'Bebek', 'D-88811-BZ'),
(2, 'Kurniadi', NULL, NULL, 'Vespa', 'Z-4444-XW'),
(3, 'Brandon', NULL, NULL, 'Vespa', 'H-1111-HI'),
(4, 'Suryadi', NULL, NULL, 'Moge', 'L-12221-DX'),
(5, 'Andi', NULL, NULL, 'Moge', 'D-11311-WX'),
(6, 'Januar', NULL, NULL, 'Trail', 'L-13331-DX');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `montir`
--

DROP TABLE IF EXISTS `montir`;
CREATE TABLE `montir` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `nomor_hp` varchar(25) DEFAULT NULL,
  `alamat` text,
  `gaji` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `montir`
--

INSERT INTO `montir` (`id`, `nama`, `nomor_hp`, `alamat`, `gaji`) VALUES
(1, 'Wawan', '', '', 3500000),
(2, 'Gani', NULL, NULL, 2700000),
(3, 'Iwan', NULL, NULL, 2800000),
(4, 'Alex', NULL, NULL, 2200000),
(5, 'Surti', NULL, NULL, 2150000),
(6, 'Joni', NULL, NULL, 3500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `montir`
--
ALTER TABLE `montir`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `montir`
--
ALTER TABLE `montir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;