-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 10:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `judul` varchar(55) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `waktu`, `judul`, `isi`, `uid`) VALUES
(1, '2021-05-19 08:51:54', 'Ajax Edit Test', 'Ajax is FUN', 8),
(2, '2011-05-14 21:25:05', 'Kunjungan Tamu Pt. Abstrak 22 Mei 2021', 'harap tenang\r\nharap tenang\r\nharap tenang', 8),
(3, '2011-01-02 22:11:08', 'Panduan Dalam Mengoperasikan Mesin DHFD-222', '1. test\r\n2. test\r\n3. test\r\nselesai', 69),
(4, '2021-05-19 09:24:53', '4132124werased', 'Yahaha Hayuk', 29),
(5, '2021-05-19 09:25:06', 'Jadwal Supplier Masuk Mei 2027', 'Yahaha Hayoek :v', 29),
(39, '2021-05-19 08:17:43', 'Rahmat Nur Hidayar', 'Yahahaha wahyus', 8),
(40, '2021-05-19 08:51:57', 'Ajax Edit Test', 'Hay Zionis Lucknud', 8),
(41, '2021-05-19 08:52:12', 'Ajax Edit Test', 'Ajax is FUN', 8),
(42, '2021-05-19 09:49:41', 'Yahaha Wahyu A', 'Ajax Ajax', 29),
(43, '2021-05-19 09:05:20', '', '', 8),
(44, '2021-05-19 09:11:16', 'Ajax Edit Test', 'Ajax is FUN', 8),
(45, '2021-05-19 09:22:35', 'Jadwal Supplier Masuk Mei 2027', 'FFFFFFFFFFFFF', 29),
(46, '2021-05-19 09:49:10', 'Ajax Tambah, Edit CLEAR', 'CLEAR AT 21:49 ', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
