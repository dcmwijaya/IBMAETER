-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 06:35 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
-- Table structure for table `user_divisi`
--

CREATE TABLE `user_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(35) NOT NULL,
  `kode_divisi` varchar(35) NOT NULL,
  `role_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_divisi`
--

INSERT INTO `user_divisi` (`id_divisi`, `nama_divisi`, `kode_divisi`, `role_divisi`) VALUES
(1, 'Dewan Direksi', 'DIR', 0),
(2, 'Manager Gudang', 'MNG', 0),
(3, 'Humas Gudang', 'HMS', 0),
(4, 'Pengadaan Barang', 'PGD', 0),
(5, 'Stacker Barang', 'STR', 1),
(6, 'Receiving Barang', 'RCV', 1),
(7, 'Checker Barang', 'CHK', 1),
(8, 'Dispatcher Barang', 'DSP', 1),
(9, 'Picker Barang', 'PCK', 1),
(10, 'IT Staff', 'ITS', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_divisi`
--
ALTER TABLE `user_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_divisi`
--
ALTER TABLE `user_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
