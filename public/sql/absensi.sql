-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 11:58 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(7) NOT NULL,
  `uid_absen` int(7) NOT NULL,
  `email_absen` varchar(99) NOT NULL,
  `status_absen` varchar(99) NOT NULL,
  `alasan_izin` varchar(50) NOT NULL,
  `bukti_izin` varchar(256) NOT NULL,
  `tgl_absen` date NOT NULL,
  `waktu_absen` time NOT NULL,
  `respons` varchar(15) NOT NULL COMMENT 'tiga kategori :"Masuk", "Pending", "Diterima", "Ditolak"',
  `komen_izin` varchar(99) NOT NULL,
  `waktu_komen` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `uid_absen`, `email_absen`, `status_absen`, `alasan_izin`, `bukti_izin`, `tgl_absen`, `waktu_absen`, `respons`, `komen_izin`, `waktu_komen`) VALUES
(1, 4, 'billy@gantx.com', 'Hadir', '-', '-', '2021-05-16', '07:00:00', 'Masuk', '-', NULL),
(2, 3, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-16', '07:33:00', 'Masuk', '-', NULL),
(3, 4, 'billy@gantx.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(4, 3, 'erwin@gmail.com', 'Terlambat', '-', '-', '2021-05-17', '09:24:42', 'Masuk', '-', NULL),
(8, 4, 'billy@gantx.com', 'Izin', 'sakit', '1621424790_8940a7bc5456eff24ddc.png', '2021-05-19', '18:46:30', 'Diterima', '-', NULL),
(10, 4, 'billy@gantx.com', 'Izin', 'Dinas Luar Kota', '1621495134_bce3a2ad6e8785a39a3b.png', '2021-05-20', '14:18:54', 'Diterima', 'Terverifikasi!', '2021-05-20 09:00:00'),
(17, 3, 'erwin@gmail.com', 'Izin', 'Cuti', '1621496496_a858e9662a0dd082efda.png', '2021-05-20', '14:41:36', 'Ditolak', 'Izin tidak diterima', '2021-05-20 09:18:30'),
(18, 69, 'alfhaff@invenbar.ac.id', 'Izin', 'kesiangan', '1621497689_827a29249e1f5145af5d.png', '2021-05-20', '15:01:29', 'Ditolak', '-', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
