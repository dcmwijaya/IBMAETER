-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 06:53 PM
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
(4, 'Pepsodent', 44, 'Daging', 'G'),
(5, 'Dodo Mainanmu', 22, 'Padat', 'C'),
(8, 'Meme', 22, 'Cair', 'C'),
(9, 'Solonensi', 22, 'Cair', 'C'),
(10, 'Ash', 22, 'Minyak', 'D'),
(13, 'Sikat Gigih', 44, 'Padat', 'A'),
(14, 'Memeqaw', 42, 'Mudah Terbakar', 'A'),
(15, 'So Clean 320ml', 12, 'Cair', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `no_log` varchar(99) NOT NULL,
  `uid` int(7) NOT NULL,
  `tgl` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(7) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `nama`, `email`, `password`, `role`) VALUES
(1, 'Asas', 'rifkyakhmad911@gmail.com', 'Admin123', 1);

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
  MODIFY `no_in` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_out`
--
ALTER TABLE `detail_out`
  MODIFY `no_out` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
