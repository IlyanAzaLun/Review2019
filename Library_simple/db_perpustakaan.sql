-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2020 pada 16.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `routine_anggota` (IN `ACT` VARCHAR(255), IN `P1` VARCHAR(255), IN `P2` VARCHAR(255), IN `P3` VARCHAR(255), IN `P4` VARCHAR(255), IN `P5` VARCHAR(255), IN `P6` VARCHAR(255), IN `P7` VARCHAR(255), IN `P8` VARCHAR(255), IN `P9` VARCHAR(255), IN `P10` VARCHAR(255))  SQL SECURITY INVOKER
BEGIN


IF (ACT = 'select_1') THEN
	SELECT id_anggota, nm_anggota, jk_anggota, tl_anggota,al_anggota FROM tbl_anggota
	;
	
	
ELSEIF (ACT = 'insert_1') THEN
	INSERT INTO tbl_anggota (nm_anggota, jk_anggota, tl_anggota, al_anggota)
	VALUES (P2,P3,P4,P5)
	;
	
	SELECT id_mahasiswa, nama, jurusan, alamat, nohp FROM mahasiswa
	;
	
	
ELSEIF (ACT = 'update_1') THEN
	UPDATE tbl_anggota SET
	nm_anggota = P2
    , jk_anggota = P3
	, tl_anggota = P4
	, al_anggota = P5
	WHERE id_anggota = P1
	;
	
	SELECT id_anggota, nm_anggota, jk_anggota, tl_anggota, al_anggota FROM tbl_anggota
	;
	
ELSEIF (ACT = 'delete_1') THEN
	DELETE FROM tbl_anggota
	WHERE id_anggota = P1
	;
	
	SELECT id_anggota, nm_anggota, jk_anggota, tl_anggota, al_anggota FROM tbl_anggota
	;
    
end if;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `routine_buku` (IN `ACT` VARCHAR(255), IN `P1` VARCHAR(255), IN `P2` VARCHAR(255), IN `P3` VARCHAR(255), IN `P4` VARCHAR(255), IN `P5` VARCHAR(255), IN `P6` VARCHAR(255), IN `P7` VARCHAR(255), IN `P8` VARCHAR(255), IN `P9` VARCHAR(255), IN `P10` VARCHAR(255))  SQL SECURITY INVOKER
BEGIN


IF (ACT = 'select_1') THEN
	SELECT id_buku, jdl_buku, pns_buku, pnb_buku, thn_tb_buku, no_rk_buku FROM tbl_buku
	;
	
	
ELSEIF (ACT = 'insert_1') THEN
	INSERT INTO tbl_buku (jdl_buku, pns_buku, pnb_buku, thn_tb_buku, no_rk_buku)
	VALUES (P2,P3,P4,P5,P6)
	;
    SELECT id_buku, jdl_buku, pns_buku, pnb_buku, thn_tb_buku, no_rk_buku FROM tbl_buku
	;
	
	
end if;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `routine_petugas` (IN `ACT` VARCHAR(255), IN `P1` VARCHAR(255), IN `P2` VARCHAR(255), IN `P3` VARCHAR(255), IN `P4` VARCHAR(255), IN `P5` VARCHAR(255), IN `P6` VARCHAR(255), IN `P7` VARCHAR(255), IN `P8` VARCHAR(255), IN `P9` VARCHAR(255), IN `P10` VARCHAR(255))  SQL SECURITY INVOKER
BEGIN


IF (ACT = 'select_1') THEN
	SELECT id_petugas, nm_petugas, jk_petugas, jabatan, shift, tl_petugas,al_petugas FROM tbl_petugas
	;
	
	
ELSEIF (ACT = 'insert_1') THEN
	INSERT INTO tbl_petugas (nm_petugas, jk_petugas, jabatan, shift, tl_petugas, al_petugas)
	VALUES (P2,P3,P4,P5,P6,P7)
	;
	
	
	SELECT id_petugas, nm_petugas, jk_petugas, jabatan, shift, tl_petugas,al_petugas FROM tbl_petugas
	;
	
	
end if;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `routine_transaksi` (IN `ACT` VARCHAR(255), IN `P1` VARCHAR(255), IN `P2` VARCHAR(255), IN `P3` VARCHAR(255), IN `P4` VARCHAR(255), IN `P5` VARCHAR(255), IN `P6` VARCHAR(255), IN `P7` VARCHAR(255), IN `P8` VARCHAR(255), IN `P9` VARCHAR(255), IN `P10` VARCHAR(255))  SQL SECURITY INVOKER
BEGIN


IF (ACT = 'select_1') THEN
	SELECT  tbl_transaksi_pinjam.kod_pinjam AS kd_pinjam,
		tbl_anggota.nm_anggota AS nm_anggota,
        tbl_anggota.al_anggota AS al_anggota,
        tbl_anggota.tl_anggota AS tl_anggota,
        tbl_buku.jdl_buku AS jdl_buku,
        tbl_buku.no_rk_buku AS no_rk_buku,
        tbl_buku.pns_buku AS pns_buku,
        tbl_buku.pnb_buku AS pnb_buku,
        tbl_buku.thn_tb_buku AS thn_tb_buku,
        tbl_petugas.nm_petugas AS nm_petugas,
        tbl_petugas.shift AS shift,
        tbl_petugas.tl_petugas AS tl_petugas,
        tbl_transaksi_pinjam.tgl_pinjam AS tgl_pinjam,
        tbl_transaksi_pinjam.tgl_kembali AS tgl_hrs_kembali,
        tbl_transaksi_kembali.tgl_kembali AS tgl_kembali,
        tbl_transaksi_kembali.tot_denda AS denda FROM
        ((((tbl_transaksi_pinjam 
          INNER JOIN tbl_anggota ON tbl_transaksi_pinjam.id_anggota = tbl_anggota.id_anggota)
          INNER JOIN tbl_buku ON tbl_transaksi_pinjam.id_buku = tbl_buku.id_buku)
          INNER JOIN tbl_petugas ON tbl_transaksi_pinjam.id_petugas = tbl_petugas.id_petugas)
      	  INNER JOIN tbl_transaksi_kembali ON tbl_transaksi_pinjam.kod_pinjam = tbl_transaksi_kembali.kod_pinjam);
	


ELSEIF (ACT = 'select_2') THEN
	SELECT  tbl_transaksi_pinjam.kod_pinjam AS kd_pinjam,
		tbl_anggota.nm_anggota AS nm_anggota,
        tbl_anggota.al_anggota AS al_anggota,
        tbl_anggota.tl_anggota AS tl_anggota,
        tbl_buku.jdl_buku AS jdl_buku,
        tbl_buku.no_rk_buku AS no_rk_buku,
        tbl_buku.pns_buku AS pns_buku,
        tbl_buku.pnb_buku AS pnb_buku,
        tbl_buku.thn_tb_buku AS thn_tb_buku,
        tbl_petugas.nm_petugas AS nm_petugas,
        tbl_petugas.shift AS shift,
        tbl_petugas.tl_petugas AS tl_petugas,
        tbl_transaksi_pinjam.tgl_pinjam AS tgl_pinjam,
        tbl_transaksi_pinjam.tgl_kembali AS tgl_hrs_kembali,
        tbl_transaksi_kembali.tgl_kembali AS tgl_kembali,
        tbl_transaksi_kembali.tot_denda AS denda FROM
        ((((tbl_transaksi_pinjam 
          INNER JOIN tbl_anggota ON tbl_transaksi_pinjam.id_anggota = tbl_anggota.id_anggota)
          INNER JOIN tbl_buku ON tbl_transaksi_pinjam.id_buku = tbl_buku.id_buku)
          INNER JOIN tbl_petugas ON tbl_transaksi_pinjam.id_petugas = tbl_petugas.id_petugas)
      	  INNER JOIN tbl_transaksi_kembali ON tbl_transaksi_pinjam.kod_pinjam = tbl_transaksi_kembali.kod_pinjam) WHERE kd_pinjam = p1;
		
end if;
	
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` varchar(25) NOT NULL,
  `nm_anggota` varchar(25) DEFAULT NULL,
  `jk_anggota` tinyint(1) DEFAULT NULL,
  `tl_anggota` varchar(25) DEFAULT NULL,
  `al_anggota` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nm_anggota`, `jk_anggota`, `tl_anggota`, `al_anggota`) VALUES
('ff430d6a-3e55-11ea-8945-5', 'Iyang Agung S', 1, '089991211', 'Sumedang'),
('2bc0b4f7-e055-42b0-bbfc-5', 'Abdul', 1, '098889111', 'Sumedang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` varchar(25) NOT NULL,
  `jdl_buku` varchar(25) DEFAULT NULL,
  `pns_buku` varchar(25) DEFAULT NULL,
  `pnb_buku` varchar(25) DEFAULT NULL,
  `thn_tb_buku` varchar(4) DEFAULT NULL,
  `no_rk_buku` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `jdl_buku`, `pns_buku`, `pnb_buku`, `thn_tb_buku`, `no_rk_buku`) VALUES
('33abd08b-3e55-11ea-8945-5', 'Metamormphosis', 'Unknown', 'Unknown', '2000', 'B21'),
('33ac04b6-3e55-11ea-8945-5', 'Neuron', 'Unknown', 'Unknown', '2020', 'C99'),
('30e0a5d0-0359-4298-8848-f', 'Experience', 'Oddlaught', 'Anemone', '2010', 'V41'),
('f23ad7c5-978b-4757-91eb-d', 'Sebuah Seni Untuk Bersika', 'Mark manson', 'X', '2020', 'A22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` varchar(25) NOT NULL,
  `nm_petugas` varchar(25) DEFAULT NULL,
  `jk_petugas` tinyint(1) DEFAULT NULL,
  `pw_petugas` varchar(25) DEFAULT NULL,
  `jabatan` varchar(25) DEFAULT NULL,
  `shift` tinyint(1) DEFAULT NULL,
  `tl_petugas` varchar(25) DEFAULT NULL,
  `al_petugas` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nm_petugas`, `jk_petugas`, `pw_petugas`, `jabatan`, `shift`, `tl_petugas`, `al_petugas`) VALUES
('bc41fc11-3e55-11ea-8945-5', 'Jajang Sumirja', 1, 'admin', 'Staff', 1, '081223808897', 'Jl. Didepan, Ds Dipayun, kec.Dimana, Kab. Bandai, Prov.JawaSunda'),
('8ec22a1c-3fea-11ea-8f28-5', 'admin', 1, 'admin', 'Administrator', 0, '888888888888', 'Sumedang'),
('e43675aa-4589-4726-b64e-3', 'Wahyu', 1, NULL, 'Manaegr', 1, '900000', 'Bandung\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_kembali`
--

CREATE TABLE `tbl_transaksi_kembali` (
  `kod_kembali` varchar(25) NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tot_denda` int(25) DEFAULT NULL,
  `kod_pinjam` varchar(25) DEFAULT NULL,
  `id_petugas` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi_kembali`
--

INSERT INTO `tbl_transaksi_kembali` (`kod_kembali`, `tgl_kembali`, `tot_denda`, `kod_pinjam`, `id_petugas`) VALUES
('60fe2523-725c-4907-a8a2-a', NULL, 0, 'bf1d6c41-b87d-4670-8381-0', 'bc41fc11-3e55-11ea-8945-5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_pinjam`
--

CREATE TABLE `tbl_transaksi_pinjam` (
  `kod_pinjam` varchar(25) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `id_petugas` varchar(25) DEFAULT NULL,
  `id_anggota` varchar(25) DEFAULT NULL,
  `id_buku` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi_pinjam`
--

INSERT INTO `tbl_transaksi_pinjam` (`kod_pinjam`, `tgl_pinjam`, `tgl_kembali`, `id_petugas`, `id_anggota`, `id_buku`) VALUES
('bf1d6c41-b87d-4670-8381-0', '2020-01-25', '2020-01-29', 'bc41fc11-3e55-11ea-8945-5', 'ff430d6a-3e55-11ea-8945-5', '33abd08b-3e55-11ea-8945-5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `tbl_transaksi_kembali`
--
ALTER TABLE `tbl_transaksi_kembali`
  ADD PRIMARY KEY (`kod_kembali`);

--
-- Indeks untuk tabel `tbl_transaksi_pinjam`
--
ALTER TABLE `tbl_transaksi_pinjam`
  ADD PRIMARY KEY (`kod_pinjam`),
  ADD KEY `kod_pinjam` (`kod_pinjam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
