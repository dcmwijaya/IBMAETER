-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 10:32 PM
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
  `uid` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `request` enum('Masuk','Keluar') NOT NULL COMMENT 'Awas dengan trigger!',
  `status` enum('Pending','Diterima','Ditolak') NOT NULL,
  `ubah_stok` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alur_barang`
--

INSERT INTO `alur_barang` (`no_log`, `uid`, `tgl`, `nama_barang`, `request`, `status`, `ubah_stok`, `ket`) VALUES
(8, 41, '2021-05-17 02:57:25', 'Mentari SimCard 20GB/Bulan', 'Masuk', 'Ditolak', 500, 'cek trigger dec=&gt;masuk\r\n'),
(31, 29, '2021-05-16 06:25:42', 'Soda Gembira 210ml', 'Masuk', 'Diterima', 6, 'Save Palestina'),
(32, 29, '2021-05-16 06:52:42', 'Dodo Mainanmu', 'Masuk', 'Ditolak', 13, 'Admin : Billy Gate\r\nBensin Abis'),
(36, 29, '2021-05-16 07:11:35', 'Mixin 210ml', 'Masuk', 'Diterima', 46, 'We Stand With Palestine!'),
(39, 8, '2021-05-17 02:24:50', 'So Clean 320ml', 'Masuk', 'Diterima', 100, 'Tes Count Notifs Berhasil\r\n'),
(46, 8, '2021-05-17 02:56:35', 'Adem Sari 10gr', 'Masuk', 'Diterima', 500, 'cek trigger acc=&gt;masuk'),
(51, 8, '2021-05-17 03:06:29', 'Adem Sari 10gr', 'Keluar', 'Diterima', 30, 'cek trigger acc=&gt;keluar'),
(52, 30, '2021-05-17 03:07:21', 'Minyak Pijat 210ml', 'Keluar', 'Ditolak', 30, 'cek trigger dec=&gt;keluar'),
(54, 30, '2021-05-17 08:07:57', 'Madu Kuat 210ml', 'Masuk', 'Diterima', 55, 'Terverifikasi !'),
(55, 41, '2021-05-17 18:53:00', 'Mentari SimCard 20GB/Bulan', 'Keluar', 'Pending', 20, 'FF'),
(56, 30, '2021-05-17 18:56:00', 'El Perfume de cologne 150ml', 'Masuk', 'Pending', 60, 'Tolak Impresialisme'),
(57, 41, '2021-05-17 20:02:00', 'Bearbrando 210ml', 'Masuk', 'Pending', 92, 'Cek Pekerja');

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
  MODIFY `no_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
