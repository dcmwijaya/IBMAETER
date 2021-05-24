-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 11:13 AM
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
(1, 'K-230521-029-666', 29, 'Keluh Kesah Pemain Homkei', 'Yahaha Komplen :v', '1621763502_61a4a7258d48b2d3eb9f.jpg', '2021-05-23 04:51:42'),
(2, 'K-230521-029-920', 29, 'Test AJAX Pengaduan EA', 'TESTING', '1621763545_2885d3a409028cae129d.jpg', '2021-05-23 04:52:25'),
(3, 'K-230521-029-769', 29, 'Uji COBA AJAX KOMPLEN', 'YAHAHAHA', '1621763582_3ccee010cb16bd3ee53e.jpg', '2021-05-23 04:53:02'),
(4, 'K-230521-029-415', 29, 'Yahaha Hayoek :&#039;v', 'Tet', '1621763636_65496a52643a38e93cb2.jpg', '2021-05-23 04:53:56'),
(5, 'K-230521-029-665', 29, 'Kita SPAM :V', 'Yahaha pengadoe :v', '1621763671_85466bb89e6ffa144109.jpg', '2021-05-23 04:54:31');

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
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
