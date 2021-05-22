-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 04:22 PM
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
-- Table structure for table `alur_barang`
--

CREATE TABLE `alur_barang` (
  `no_log` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `request` enum('Masuk','Keluar') NOT NULL COMMENT 'Awas dengan trigger!',
  `status` enum('Pending','Diterima','Ditolak') NOT NULL,
  `ubah_stok` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `uid_alur_admin` int(11) DEFAULT NULL COMMENT 'Admin Yang Memproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alur_barang`
--

INSERT INTO `alur_barang` (`no_log`, `id_item`, `uid`, `tgl`, `request`, `status`, `ubah_stok`, `ket`, `uid_alur_admin`) VALUES
(59, 22, 53, '2021-05-22 03:04:48', 'Masuk', 'Ditolak', 11, ':&#039;v ////', 8),
(60, 22, 53, '2021-05-21 19:44:00', 'Masuk', 'Pending', 36, '', 8),
(61, 32, 53, '2021-05-21 19:47:00', 'Keluar', 'Pending', 27, 'SAF', 8),
(62, 28, 53, '2021-05-22 03:18:20', 'Keluar', 'Diterima', 3, 'Yahaha Hayoek :&#039;v /////', 29),
(63, 24, 53, '2021-05-22 02:58:59', 'Masuk', 'Ditolak', 66, 'Jalur Ekspedisi Diblokir karena ada Kasus COVID-19', 29),
(64, 31, 53, '2021-05-21 19:48:00', 'Masuk', 'Pending', 61, 'SD', 53),
(65, 21, 53, '2021-05-22 02:59:21', 'Masuk', 'Ditolak', 20, 'Test Tolak', 53),
(66, 30, 53, '2021-05-22 03:19:47', 'Keluar', 'Diterima', 1000, 'Terverifikasi !', 53),
(67, 10, 53, '2021-05-22 03:21:05', 'Masuk', 'Diterima', 78, 'Terverifikasi !', NULL),
(68, 21, 53, '2021-05-22 03:31:48', 'Masuk', 'Ditolak', 24, 'Terverifikasi !', 53),
(69, 10, 53, '2021-05-22 03:33:20', 'Masuk', 'Diterima', 100, 'Terverifikasi !', 53),
(70, 17, 53, '2021-05-22 03:34:08', 'Masuk', 'Ditolak', 30, 'Terverifikasi !', 53),
(71, 17, 53, '2021-05-22 03:36:27', 'Masuk', 'Ditolak', 30, 'Terverifikasi !', 53),
(72, 17, 53, '2021-05-22 03:37:34', 'Keluar', 'Ditolak', 30, 'Test Tolak Keluar', 53),
(73, 17, 53, '2021-05-22 03:38:55', 'Masuk', 'Ditolak', 30, 'Test Tolak Masuk', 53),
(74, 17, 53, '2021-05-22 03:39:38', 'Keluar', 'Diterima', 30, 'Test Terima Keluar', 53),
(75, 17, 53, '2021-05-22 03:40:07', 'Masuk', 'Diterima', 30, 'Test Terima Masuk', 53),
(76, 9, 53, '2021-05-22 15:41:00', 'Masuk', 'Pending', 81, 'DQW', NULL),
(77, 3, 53, '2021-05-22 15:41:00', 'Masuk', 'Pending', 67, 'Dummy Master', NULL),
(78, 24, 53, '2021-05-22 15:41:00', 'Masuk', 'Pending', 26, 'QW', NULL),
(79, 30, 53, '2021-05-22 15:41:00', 'Masuk', 'Pending', 1000, 'QWE', NULL),
(80, 32, 53, '2021-05-22 15:41:00', 'Masuk', 'Pending', 87, 'Test Dummy Master', NULL),
(81, 35, 53, '2021-05-22 15:48:00', 'Keluar', 'Pending', 65, 'QSA', NULL),
(82, 3, 30, '2021-05-22 16:15:00', 'Masuk', 'Pending', 60, 'eqweqwewqe', NULL),
(83, 4, 30, '2021-05-22 16:15:00', 'Masuk', 'Pending', 20, 'wqewqeqwe', NULL),
(84, 9, 30, '2021-05-22 04:16:39', 'Masuk', 'Diterima', 65, 'Terverifikasi !', 53);

--
-- Triggers `alur_barang`
--
DELIMITER $$
CREATE TRIGGER `stok_dinamis` AFTER UPDATE ON `alur_barang` FOR EACH ROW BEGIN
IF (new.`status`="Diterima") THEN
IF (new.`request`="Masuk") THEN
	UPDATE `item` SET `item`.`stok` = `item`.`stok` + new.`ubah_stok`
	WHERE `item`.`id_item` = new.`id_item`;
ELSE
UPDATE `item` SET `item`.`stok` = `item`.`stok` - new.`ubah_stok`
	WHERE `item`.`id_item` = new.`id_item`;
    END IF;
    END IF;
    END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alur_barang`
--
ALTER TABLE `alur_barang`
  ADD PRIMARY KEY (`no_log`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alur_barang`
--
ALTER TABLE `alur_barang`
  MODIFY `no_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
