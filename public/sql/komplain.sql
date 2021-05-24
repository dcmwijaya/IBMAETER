-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 03:49 PM
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
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `id_komplain` int(11) NOT NULL,
  `no_komplain` varchar(50) NOT NULL,
  `uid_komplain` int(7) NOT NULL,
  `judul_komplain` varchar(100) NOT NULL,
  `isi_komplain` varchar(256) NOT NULL,
  `foto_komplain` varchar(256) NOT NULL,
  `waktu_komplain` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`id_komplain`, `no_komplain`, `uid_komplain`, `judul_komplain`, `isi_komplain`, `foto_komplain`, `waktu_komplain`) VALUES
(15, 'K-240521-008-576', 8, 'hehehe buoy :v', 'hehehe buoy :vhehehe buoy :vhehehe buoy :v', '1621842762_28fa3d81a3177f200e27.jpg', '2021-05-24 02:52:42'),
(17, 'K-240521-008-109', 8, 'Awaokawokawokwak :v', 'hehehe buoy :vhehehe buoy :vhehehe buoy :vhehehe buoy :vhehehe buoy :v', '1621842834_aec6ae12cb9a34f9ea2a.jpg', '2021-05-24 02:53:54'),
(18, 'K-240521-008-410', 8, 'Mantap ', 'hehehe buoy :vhehehe buoy :vhehehe buoy :v', '1621842869_fd9ff2f2a70c4e91fd55.jpg', '2021-05-24 02:54:29'),
(19, 'K-240521-008-902', 8, 'OK', 'hehehe buoy :vhehehe buoy :vhehehe buoy :v', '1621842911_a47713ce5b189d2b1805.jpg', '2021-05-24 02:55:11'),
(22, 'K-240521-047-909', 47, 'Patrick', 'Patrick Testing', '1621845785_bcc46d6976ff3609c297.jpg', '2021-05-24 03:43:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
