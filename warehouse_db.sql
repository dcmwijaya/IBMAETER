-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 03:34 PM
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
(11, 1, '2021-04-03 15:57:00', 'Keluar', 'sesat'),
(12, 1, '2021-04-19 13:33:00', 'Masuk', 'eaea'),
(13, 0, '2021-04-19 13:40:00', 'Keluar', 'f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`no_log`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `no_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
