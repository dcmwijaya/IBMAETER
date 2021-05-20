-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 09:55 PM
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
-- Table structure for table `pengumuman_visibility`
--

CREATE TABLE `pengumuman_visibility` (
  `id_visibility` int(11) NOT NULL,
  `id_pengumuman` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `status` enum('Dilihat','Belum Dilihat') NOT NULL,
  `waktu` datetime NOT NULL COMMENT 'dilihat pada waktu?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman_visibility`
--

INSERT INTO `pengumuman_visibility` (`id_visibility`, `id_pengumuman`, `uid`, `role`, `status`, `waktu`) VALUES
(5, 3, 29, 0, 'Belum Dilihat', '2021-05-20 20:08:42'),
(6, 2, 8, 0, 'Belum Dilihat', '2021-05-20 20:08:45'),
(7, 2, 8, 0, 'Belum Dilihat', '2021-05-20 20:20:15'),
(8, 0, 8, 0, 'Belum Dilihat', '2021-05-18 21:24:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengumuman_visibility`
--
ALTER TABLE `pengumuman_visibility`
  ADD PRIMARY KEY (`id_visibility`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengumuman_visibility`
--
ALTER TABLE `pengumuman_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
