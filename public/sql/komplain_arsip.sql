-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 03:48 PM
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
-- Table structure for table `komplain_arsip`
--

CREATE TABLE `komplain_arsip` (
  `id_arsipKomp` int(11) NOT NULL,
  `no_arsipKomp` varchar(20) NOT NULL,
  `uid_arsipKomp` int(7) NOT NULL,
  `judul_arsipKomp` varchar(100) NOT NULL,
  `isi_arsipKomp` varchar(256) NOT NULL,
  `foto_arsipKomp` varchar(256) NOT NULL,
  `waktu_arsipKomp` datetime NOT NULL,
  `uid_arsipKomp_admin` int(11) NOT NULL,
  `status_arsipKomp` varchar(10) NOT NULL,
  `comment_arsipKomp` varchar(256) DEFAULT NULL,
  `commented_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komplain_arsip`
--

INSERT INTO `komplain_arsip` (`id_arsipKomp`, `no_arsipKomp`, `uid_arsipKomp`, `judul_arsipKomp`, `isi_arsipKomp`, `foto_arsipKomp`, `waktu_arsipKomp`, `uid_arsipKomp_admin`, `status_arsipKomp`, `comment_arsipKomp`, `commented_at`) VALUES
(1, 'K-240521-008-395', 8, 'Ajax Edit Test', 'Ajax Edit Test', '-', '2021-05-24 01:49:36', 29, 'accepted', 'Terverifikasi!', '2021-05-24 01:52:08'),
(2, 'K-240521-008-577', 8, 'Ajax Edit TestAjax Edit Test', 'Ajax Edit Test', '-', '2021-05-24 01:49:45', 29, 'rejected', 'Terverifikasi!', '2021-05-24 01:52:11'),
(3, 'K-240521-008-406', 8, 'sadasd', 'Ajax Edit TestAjax Edit Test', '-', '2021-05-24 01:50:23', 8, 'accepted', 'Terverifikasi!', '2021-05-24 02:05:17'),
(4, 'K-240521-008-422', 8, 'Ajax Edit Test', 'Ajax Edit TestAjax Edit Test', '-', '2021-05-24 01:50:01', 29, 'rejected', 'Terverifikasi!', '2021-05-24 02:11:17'),
(5, 'K-240521-008-188', 8, 'arsipKompModelarsipKompModel', 'arsipKompModel', '1621839265_426df80ccf9f94af11a1.jpg', '2021-05-24 01:54:25', 41, 'accepted', 'Tes untuk mengkonfirmasi', '2021-05-24 02:38:41'),
(6, 'K-240521-008-652', 8, 'Ajax Edit Test', 'Ajax Edit TestAjax Edit Test', '-', '2021-05-24 01:50:12', 47, 'accepted', 'Tes UID', '2021-05-24 03:11:10'),
(7, 'K-230521-029-415', 29, 'Yahaha Hayoek :&#039;v', 'Tet', '1621763636_65496a52643a38e93cb2.jpg', '2021-05-23 04:53:56', 8, 'accepted', 'ASDSAD', '2021-05-24 03:17:23'),
(8, 'K-240521-008-962', 8, 'Bisita hari damdam', 'hehehe buoy :vhehehe buoy :vhehehe buoy :v', '1621842796_a570c5cf7187b9c8c43c.jpg', '2021-05-24 02:53:16', 47, 'accepted', 'JOJOW', '2021-05-24 03:22:21'),
(9, 'K-240521-008-641', 8, 'Tes tumbal', 'sadasdsad', '1621845525_3b00ff9017be8ec3b513.jpg', '2021-05-24 03:38:45', 47, 'accepted', 'TESTING UID INT APAKAH MASUK APA TIDAK KARENA MEMPENGARUHI SEKALI', '2021-05-24 03:40:04'),
(10, 'K-240521-047-742', 47, 'Aawkoawkoaw ', 'AOWKOAWKOWAKOKWA', '1621845984_3c3b94d427f668e898e0.jpg', '2021-05-24 03:46:24', 29, 'accepted', 'Diterima oleh UID BILI GET', '2021-05-24 03:47:04'),
(11, 'K-240521-047-169', 47, 'Testing AJAX Komplain', 'Tumbal Only', '1621845723_9a36e67021bbfddefe71.jpg', '2021-05-24 03:42:03', 29, 'rejected', 'Ditolak oleh admin adalah saya yaitu bily get', '2021-05-24 03:47:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komplain_arsip`
--
ALTER TABLE `komplain_arsip`
  ADD PRIMARY KEY (`id_arsipKomp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komplain_arsip`
--
ALTER TABLE `komplain_arsip`
  MODIFY `id_arsipKomp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
