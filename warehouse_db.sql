-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 04:38 PM
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
-- Table structure for table `detail_in`
--

CREATE TABLE `detail_in` (
  `no_in` int(5) NOT NULL,
  `no_log` varchar(99) NOT NULL,
  `id_item` int(4) NOT NULL,
  `jumlah_in` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_in`
--

INSERT INTO `detail_in` (`no_in`, `no_log`, `id_item`, `jumlah_in`) VALUES
(1, '', 0, 80),
(2, '', 0, 75),
(3, '', 3, 24),
(4, '', 13, 20),
(5, '', 9, 78),
(6, '', 2, 70),
(7, '', 1, 63),
(8, '', 4, 63),
(9, '', 1, 40),
(10, '', 9, 91),
(11, '', 8, 91),
(12, '', 9, 27),
(13, '', 8, 82),
(14, '', 9, 11),
(15, '', 4, 20),
(16, '', 8, 10),
(17, '', 3, 22),
(18, '', 1, 83),
(19, '', 4, 20),
(20, '', 4, 23);

-- --------------------------------------------------------

--
-- Table structure for table `detail_out`
--

CREATE TABLE `detail_out` (
  `no_out` int(5) NOT NULL,
  `no_log` varchar(99) NOT NULL,
  `id_item` int(4) NOT NULL,
  `jumlah_out` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_out`
--

INSERT INTO `detail_out` (`no_out`, `no_log`, `id_item`, `jumlah_out`) VALUES
(1, '', 3, 10),
(2, '', 1, 12),
(3, '', 15, 20);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(4) NOT NULL,
  `nama_item` varchar(99) NOT NULL,
  `stok` int(4) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `penyimpanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `nama_item`, `stok`, `jenis`, `penyimpanan`) VALUES
(1, 'Sabun Mandieh', 33, 'Cair', 'B'),
(2, 'Antangin JRG', 11, 'Minyak', 'A'),
(3, 'Sikat Gigih', 44, 'Mudah Terbakar', 'D'),
(4, 'Pepsodent 102gr', 44, 'Cair', 'A'),
(5, 'Dodo Mainanmu', 22, 'Padat', 'C'),
(8, 'Mentari SimCard', 100, 'Padat', 'A'),
(9, 'Solonensi Ajaib', 33, 'Cair', 'C'),
(10, 'Bearbrando 210ml', 22, 'Cair', 'B'),
(15, 'So Clean 320ml', 12, 'Cair', 'C'),
(16, 'Betadine', 22, 'Cair', 'B'),
(17, 'Barang', 33, 'Cair', 'D'),
(20, 'Antangin Ngelu', 33, 'Padat', 'A'),
(21, 'Sikat Gigih', 44, 'Mudah Terbakar', 'F'),
(22, 'Dodo Sakti', 44, 'Minyak', 'D'),
(23, 'Mixin 210ml', 12, 'Cair', 'C'),
(24, 'Madu Kuat 210ml', 15, 'Mudah Terbakar', 'C'),
(25, 'Mayoness', 24, 'Minyak', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `no_log` int(11) NOT NULL,
  `uid` int(7) NOT NULL,
  `tgl` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`no_log`, `uid`, `tgl`, `status`, `ket`) VALUES
(1, 0, '2021-04-23 13:44:00', 'Masuk', 'lorem ipsum dolar amit amit jabang bayi'),
(2, 0, '2021-04-29 13:45:00', 'Masuk', 'lorem ipsum dolar amit amit jabang bayi'),
(3, 0, '2021-04-10 13:45:00', 'Masuk', 'lorem ipsum dolar amit amit jabang bayi'),
(4, 1, '2021-04-25 14:16:00', 'Masuk', ''),
(6, 1, '2021-04-23 14:40:00', 'Masuk', 'hay'),
(7, 1, '2021-04-04 16:40:00', 'Masuk', 'nunggak 1 bulan'),
(8, 1, '2021-04-02 15:50:00', 'Masuk', 'butuh 10 dari toko wkwk'),
(9, 1, '2010-01-21 14:02:00', 'Keluar', 'wkwkwk'),
(10, 1, '2021-04-02 15:57:00', 'Masuk', 'test'),
(11, 1, '2021-04-03 15:57:00', 'Keluar', 'sesat');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(256) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi`, `foto`) VALUES
(1, 'Jadwal Supplier Masuk Mei 2025', '1. pt indah\r\n2. pt makmur\r\n3. pt sentosa\r\n4. pt awokawok\r\n5. pt entahlah\r\n', 'image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(7) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `picture` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `nama`, `email`, `password`, `role`, `picture`) VALUES
(1, 'Venti Girl', 'saber.genshin@gmail.com', '$2y$10$FNpnGwUIbeXn066yNh2Y2OOieRJxWfeX.1jx.LTwrVSkGyoWMiAD6', 0, 'venti.jpg'),
(2, 'Fischl', 'electro.chuuni@gmail.com', '$2y$10$GJ5cL0DROJ45x07LICrhIuG6tbLZLBBMxRJamXKe6St53BuarLfeS', 1, '1617703302_42c2caa0966e587ae300.jpg'),
(5, 'Ini Boedi', 'boedi@iv.com', '1', 0, ''),
(6, 'Santoso', '111@gmail.com', 's', 1, ''),
(7, 'paimonte', '1211@gmail.com', 'sdw', 1, ''),
(8, 'Keqing Wangy', 'wangy.genshin@gmail.com', '$2y$10$FNpnGwUIbeXn066yNh2Y2OOieRJxWfeX.1jx.LTwrVSkGyoWMiAD6', 1, 'keqing.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_in`
--
ALTER TABLE `detail_in`
  ADD PRIMARY KEY (`no_in`);

--
-- Indexes for table `detail_out`
--
ALTER TABLE `detail_out`
  ADD PRIMARY KEY (`no_out`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`no_log`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_in`
--
ALTER TABLE `detail_in`
  MODIFY `no_in` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detail_out`
--
ALTER TABLE `detail_out`
  MODIFY `no_out` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `no_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
