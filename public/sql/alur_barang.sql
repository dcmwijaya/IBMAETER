-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 07:54 PM
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
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alur_barang`
--

INSERT INTO `alur_barang` (`no_log`, `id_item`, `uid`, `tgl`, `request`, `status`, `ubah_stok`, `ket`) VALUES
(59, 22, 53, '2021-05-21 19:41:00', 'Masuk', 'Pending', 11, 'ddf'),
(60, 22, 53, '2021-05-21 19:44:00', 'Masuk', 'Pending', 36, 'sdsd'),
(61, 32, 53, '2021-05-21 19:47:00', 'Keluar', 'Pending', 27, 'SAF'),
(62, 28, 53, '2021-05-21 19:47:00', 'Keluar', 'Pending', 3, 'asd'),
(63, 24, 53, '2021-05-21 19:47:00', 'Masuk', 'Pending', 66, 'ASDASD'),
(64, 31, 53, '2021-05-21 19:48:00', 'Masuk', 'Pending', 61, 'SD'),
(65, 21, 53, '2021-05-21 19:53:00', 'Masuk', 'Pending', 20, 'Yahaha Hayoek :&#039;v');

--
-- Triggers `alur_barang`
--
DELIMITER $$
CREATE TRIGGER `stok_dinamis` AFTER UPDATE ON `alur_barang` FOR EACH ROW BEGIN
IF(new.`status`="Diterima") THEN
IF (new.`request`="Masuk") THEN
	UPDATE `item` SET `item`.`stok` = `item`.`stok` + new.`ubah_stok`
	WHERE `item`.`nama_item` = new.`nama_barang`;
ELSEIF(new.`request`="Keluar") THEN
UPDATE `item` SET `item`.`stok` = `item`.`stok` - new.`ubah_stok`
	WHERE `item`.`nama_item` = new.`nama_barang`;
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
  MODIFY `no_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
