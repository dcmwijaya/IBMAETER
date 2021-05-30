-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2021 pada 09.02
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

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
-- Struktur dari tabel `absensi`
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
  `waktu_komen` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `uid_absen`, `email_absen`, `status_absen`, `alasan_izin`, `bukti_izin`, `tgl_absen`, `waktu_absen`, `respons`, `komen_izin`, `waktu_komen`) VALUES
(1, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-16', '07:00:00', 'Masuk', '-', NULL),
(2, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-16', '07:33:00', 'Masuk', '-', NULL),
(3, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(4, 6, 'erwin@gmail.com', 'Terlambat', '-', '-', '2021-05-17', '09:24:42', 'Masuk', '-', NULL),
(8, 15, 'billy@gmail.com', 'Izin', 'sakit', '1621424790_8940a7bc5456eff24ddc.png', '2021-05-19', '18:46:30', 'Diterima', '-', '2021-05-29 06:51:58'),
(10, 15, 'billy@gmail.com', 'Izin', 'Dinas Luar Kota', '1621495134_bce3a2ad6e8785a39a3b.png', '2021-05-20', '14:18:54', 'Diterima', 'Terverifikasi!', '2021-05-29 06:51:53'),
(17, 6, 'erwin@gmail.com', 'Izin', 'Undangan Rapat', '1621496496_a858e9662a0dd082efda.png', '2021-05-20', '14:41:36', 'Diterima', 'Terverifikasi!', '2021-05-29 07:36:21'),
(18, 13, 'alfhaff@invenbar.ac.id', 'Izin', 'Terjebak macet', '1621497689_827a29249e1f5145af5d.png', '2021-05-20', '15:01:29', 'Ditolak', '-', '2021-05-29 06:49:30'),
(22, 15, 'billy@gmail.com', 'Izin', 'Sakit', '1621679353_f067441139025d7166f5.png', '2021-05-22', '17:29:13', 'Pending', '-', '2021-05-29 06:51:49'),
(23, 6, 'erwin@gmail.com', 'Terlambat', '-', '-', '2021-05-23', '10:24:02', 'Masuk', '-', NULL),
(24, 15, 'billy@gmail.com', 'Terlambat', '-', '-', '2021-05-25', '10:02:48', 'Masuk', '-', NULL),
(25, 6, 'erwin@gmail.com', 'Terlambat', '-', '-', '2021-05-29', '13:47:20', 'Masuk', '-', NULL),
(26, 10, 'kukun@gmail.com', 'Izin', 'Terjebak Macet', '1622274291_57bcd00a4c4eb7afc61f.jpg', '2021-05-29', '14:44:50', 'Ditolak', 'bukti terlampir tidak relevan dengan alasan izin yang diajukan', '2021-05-29 08:40:07'),
(27, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(28, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(29, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(30, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(31, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(32, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(33, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(34, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(35, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(36, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(37, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(38, 12, 'serline@gmail.com', 'Terlambat', '-', '-', '2021-05-03', '07:39:00', 'Masuk', '-', NULL),
(39, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(40, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(41, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(42, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(43, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(44, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(45, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(46, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(47, 21, 'sophia@gmail.com', 'Terlambat', '-', '-', '2021-05-03', '07:40:00', 'Masuk', '-', NULL),
(48, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(49, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(50, 24, 'fathur@gmail.com', 'Terlambat', '-', '-', '2021-05-03', '07:50:00', 'Masuk', '-', NULL),
(51, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(52, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(53, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(54, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(55, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(56, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(57, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(58, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(59, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-03', '07:00:00', 'Masuk', '-', NULL),
(60, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(61, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(62, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(63, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(64, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(65, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(66, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(67, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(68, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(69, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(70, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(71, 12, 'serline@gmail.com', 'Terlambat', '-', '-', '2021-05-04', '07:39:00', 'Masuk', '-', NULL),
(72, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(73, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(74, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(75, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(76, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(77, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(78, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(79, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(80, 21, 'sophia@gmail.com', 'Terlambat', '-', '-', '2021-05-04', '07:40:00', 'Masuk', '-', NULL),
(81, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(82, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(83, 24, 'fathur@gmail.com', 'Terlambat', '-', '-', '2021-05-04', '07:50:00', 'Masuk', '-', NULL),
(84, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(85, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(86, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(87, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(88, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(89, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(90, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(91, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(92, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-04', '07:00:00', 'Masuk', '-', NULL),
(93, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(94, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(95, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(96, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(97, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(98, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(99, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(100, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(101, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(102, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(103, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(104, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(105, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(106, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(107, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(108, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(109, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(110, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(111, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(112, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(113, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(114, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(115, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(116, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(117, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(118, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(119, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(120, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(121, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(122, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(123, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(124, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(125, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-05', '07:00:00', 'Masuk', '-', NULL),
(126, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(127, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(128, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(129, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(130, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(131, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(132, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(133, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(134, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(135, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(136, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(137, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(138, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(139, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(140, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(141, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(142, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(143, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(144, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(145, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(146, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(147, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(148, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(149, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(150, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(151, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(152, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(153, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(154, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(155, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(156, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(157, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(158, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-06', '07:00:00', 'Masuk', '-', NULL),
(159, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(160, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(161, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(162, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(163, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(164, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(165, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(166, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(167, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(168, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(169, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(170, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(171, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(172, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(173, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(174, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(175, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(176, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(177, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(178, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(179, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(180, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(181, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(182, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(183, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(184, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(185, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(186, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(187, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(188, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(189, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(190, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(191, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-07', '07:00:00', 'Masuk', '-', NULL),
(192, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(193, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(194, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(195, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(196, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(197, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(198, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(199, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(200, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(201, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(202, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(203, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(204, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(205, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(206, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(207, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(208, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(209, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(210, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(211, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(212, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(213, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(214, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(215, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(216, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(217, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(218, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(219, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(220, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(221, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(222, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(223, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(224, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-10', '07:00:00', 'Masuk', '-', NULL),
(225, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(226, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(227, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(228, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(229, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(230, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(231, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(232, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(233, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(234, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(235, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(236, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(237, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(238, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(239, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(240, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(241, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(242, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(243, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(244, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(245, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(246, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(247, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(248, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(249, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(250, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(251, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(252, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(253, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(254, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(255, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(256, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(257, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-11', '07:00:00', 'Masuk', '-', NULL),
(258, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(259, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(260, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(261, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(262, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(263, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(264, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(265, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(266, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(267, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(268, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(269, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(270, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(271, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(272, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(273, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(274, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(275, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(276, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(277, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(278, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(279, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(280, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(281, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(282, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(283, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(284, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(285, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(286, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(287, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(288, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(289, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(290, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-12', '07:00:00', 'Masuk', '-', NULL),
(291, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(292, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(293, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(294, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(295, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(296, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(297, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(298, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(299, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(300, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(301, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(302, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(303, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(304, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(305, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(306, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(307, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(308, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(309, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(310, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(311, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(312, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(313, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(314, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(315, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(316, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(317, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(318, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(319, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(320, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(321, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(322, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(323, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-13', '07:00:00', 'Masuk', '-', NULL),
(324, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(325, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(326, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(327, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(328, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(329, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(330, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(331, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(332, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(333, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(334, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(335, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(336, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(337, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(338, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(339, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(340, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(341, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(342, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(343, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(344, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(345, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(346, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(347, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(348, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(349, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(350, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(351, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(352, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(353, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(354, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(355, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(356, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-14', '07:00:00', 'Masuk', '-', NULL),
(357, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(358, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(359, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(360, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(361, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(362, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(363, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(364, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(365, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(366, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(367, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(368, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(369, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(370, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(371, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(372, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(373, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(374, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(375, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(376, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(377, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(378, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(379, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(380, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(381, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(382, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(383, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(384, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(385, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(386, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(387, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(388, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(389, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(390, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(391, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(392, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(393, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(394, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(395, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(396, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(397, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(398, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(399, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(400, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(401, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(402, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(403, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(404, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(405, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(406, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(407, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(408, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(409, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(410, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(411, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(412, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(413, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(414, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(415, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(416, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(417, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(418, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(419, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(420, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-18', '07:00:00', 'Masuk', '-', NULL),
(421, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(422, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(423, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(424, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(425, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(426, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(427, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(428, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(429, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(430, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(431, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(432, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(433, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(434, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(435, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(436, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(437, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(438, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(439, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(440, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(441, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(442, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(443, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(444, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(445, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(446, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(447, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(448, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(449, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(450, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(451, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(452, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-19', '07:00:00', 'Masuk', '-', NULL),
(453, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(454, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(455, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(456, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(457, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(458, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(459, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(460, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(461, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(462, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(463, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(464, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(465, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(466, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(467, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(468, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(469, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(470, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(471, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(472, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(473, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(474, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(475, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(476, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(477, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(478, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(479, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(480, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(481, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(482, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-20', '07:00:00', 'Masuk', '-', NULL),
(483, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(484, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(485, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(486, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(487, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(488, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(489, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(490, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(491, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(492, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(493, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(494, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(495, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(496, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(497, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(498, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(499, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(500, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(501, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(502, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(503, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(504, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(505, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(506, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(507, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(508, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(509, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(510, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(511, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(512, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(513, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(514, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(515, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-21', '07:00:00', 'Masuk', '-', NULL),
(516, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(517, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(518, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(519, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(520, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(521, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(522, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(523, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(524, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(525, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(526, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(527, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(528, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(529, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(530, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(531, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(532, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(533, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(534, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(535, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(536, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(537, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(538, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL);
INSERT INTO `absensi` (`id_absen`, `uid_absen`, `email_absen`, `status_absen`, `alasan_izin`, `bukti_izin`, `tgl_absen`, `waktu_absen`, `respons`, `komen_izin`, `waktu_komen`) VALUES
(539, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(540, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(541, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(542, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(543, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(544, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(545, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(546, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(547, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(548, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-24', '07:00:00', 'Masuk', '-', NULL),
(549, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(550, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(551, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(552, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(553, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(554, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(555, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(556, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(557, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(558, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(559, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(560, 12, 'serline@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(561, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(562, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', NULL),
(563, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:36:22'),
(564, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:36:30'),
(565, 18, 'makinami@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:36:36'),
(566, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:36:40'),
(567, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:36:44'),
(568, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:36:47'),
(569, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:36:54'),
(570, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:37:00'),
(571, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:37:05'),
(572, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:37:09'),
(573, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:37:12'),
(574, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:37:16'),
(575, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:37:20'),
(576, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:37:26'),
(577, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:37:30'),
(578, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:37:34'),
(579, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:37:40'),
(580, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-25', '07:00:00', 'Masuk', '-', '2021-05-29 17:37:44'),
(581, 1, 'tesla@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(582, 2, 'johndoe@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(583, 3, 'fatih@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(584, 4, 'khalid@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(585, 5, 'einstein@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(586, 6, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(587, 7, 'allan@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(588, 8, 'dirac@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(589, 9, 'ibnu@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(590, 10, 'kukun@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(591, 11, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(592, 12, 'serline@gmail.com', 'Terlambat', '-', '-', '2021-05-26', '07:50:00', 'Masuk', '-', NULL),
(593, 13, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(594, 14, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(595, 15, 'billy@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(596, 16, 'janedoe@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(597, 17, 'asuka@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(598, 18, 'makinami@gmail.com', 'Terlambat', '-', '-', '2021-05-26', '07:50:00', 'Masuk', '-', NULL),
(599, 19, 'budi@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(600, 20, 'nabila@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(601, 21, 'sophia@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(602, 22, 'aqila@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(603, 23, 'wahyu@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(604, 24, 'fathur@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(605, 25, 'cantika@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(606, 26, 'ifrida@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(607, 27, 'david@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(608, 28, 'rifkyakhmad911@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(609, 29, 'rifkxc@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(610, 30, 'jean.brindilr@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(611, 31, 'cv1@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(612, 32, 'sdd911@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL),
(613, 33, 'qiqi@gmail.com', 'Hadir', '-', '-', '2021-05-26', '07:00:00', 'Masuk', '-', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `alur_barang`
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
  `uid_alur_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `alur_barang`
--

INSERT INTO `alur_barang` (`no_log`, `id_item`, `uid`, `tgl`, `request`, `status`, `ubah_stok`, `ket`, `uid_alur_admin`) VALUES
(5, 27, 29, '2021-05-23 15:03:00', 'Masuk', 'Pending', 20, NULL, 0),
(6, 5, 4, '2021-05-24 06:50:08', 'Masuk', 'Diterima', 10, 'Terverifikasi !', 4),
(7, 1, 4, '2021-05-25 10:08:23', 'Masuk', 'Diterima', 10, 'Barang disetujui', 4),
(8, 8, 4, '2021-05-26 01:00:00', 'Keluar', 'Pending', 5, NULL, 0),
(9, 8, 4, '2021-04-01 04:00:00', 'Keluar', 'Diterima', 7, 'Terverifikasi !', 1);

--
-- Trigger `alur_barang`
--
DELIMITER $$
CREATE TRIGGER `log_visibilitas` AFTER INSERT ON `alur_barang` FOR EACH ROW BEGIN
DECLARE done INT DEFAULT FALSE;
DECLARE ids INT;
DECLARE roles INT;
DECLARE cur1 CURSOR FOR SELECT `uid` FROM `user`;
DECLARE cur2 CURSOR FOR SELECT `role` FROM `user`;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

OPEN cur1;
OPEN cur2;

	ins_loop: LOOP
            FETCH cur1 INTO ids;
            FETCH cur2 INTO roles;
            IF done THEN
                LEAVE ins_loop;
            END IF;
            INSERT INTO `alur_barang_visibility` VALUES (NULL, new.`no_log`, ids, roles, "Belum Dilihat", CURDATE());
        END LOOP;

CLOSE cur1;
CLOSE cur2;
END
$$
DELIMITER ;
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `alur_barang_visibility`
--

CREATE TABLE `alur_barang_visibility` (
  `id_visibility` int(11) NOT NULL,
  `no_log` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `status` enum('Dilihat','Belum Dilihat') NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alur_barang_visibility`
--

INSERT INTO `alur_barang_visibility` (`id_visibility`, `no_log`, `uid`, `role`, `status`, `waktu`) VALUES
(1, 8, 1, 0, 'Belum Dilihat', '2021-05-26'),
(2, 8, 2, 1, 'Belum Dilihat', '2021-05-26'),
(3, 8, 3, 1, 'Belum Dilihat', '2021-05-26'),
(4, 8, 4, 0, 'Belum Dilihat', '2021-05-26'),
(5, 8, 53, 1, 'Belum Dilihat', '2021-05-26'),
(6, 8, 69, 0, 'Belum Dilihat', '2021-05-26'),
(7, 8, 73, 0, 'Belum Dilihat', '2021-05-26'),
(8, 9, 11, 0, 'Belum Dilihat', '2021-05-27'),
(9, 9, 13, 0, 'Belum Dilihat', '2021-05-27'),
(10, 9, 7, 0, 'Belum Dilihat', '2021-05-27'),
(11, 9, 22, 0, 'Belum Dilihat', '2021-05-27'),
(12, 9, 17, 0, 'Belum Dilihat', '2021-05-27'),
(13, 9, 15, 0, 'Belum Dilihat', '2021-05-27'),
(14, 9, 19, 1, 'Belum Dilihat', '2021-05-27'),
(15, 9, 25, 1, 'Belum Dilihat', '2021-05-27'),
(16, 9, 31, 1, 'Belum Dilihat', '2021-05-27'),
(17, 9, 27, 1, 'Belum Dilihat', '2021-05-27'),
(18, 9, 8, 1, 'Belum Dilihat', '2021-05-27'),
(19, 9, 5, 1, 'Belum Dilihat', '2021-05-27'),
(20, 9, 6, 0, 'Belum Dilihat', '2021-05-27'),
(21, 9, 24, 0, 'Belum Dilihat', '2021-05-27'),
(22, 9, 3, 0, 'Belum Dilihat', '2021-05-27'),
(23, 9, 9, 1, 'Belum Dilihat', '2021-05-27'),
(24, 9, 26, 0, 'Belum Dilihat', '2021-05-27'),
(25, 9, 16, 0, 'Belum Dilihat', '2021-05-27'),
(26, 9, 2, 1, 'Belum Dilihat', '2021-05-27'),
(27, 9, 4, 1, 'Belum Dilihat', '2021-05-27'),
(28, 9, 10, 1, 'Belum Dilihat', '2021-05-27'),
(29, 9, 18, 1, 'Belum Dilihat', '2021-05-27'),
(30, 9, 20, 1, 'Belum Dilihat', '2021-05-27'),
(31, 9, 33, 1, 'Belum Dilihat', '2021-05-27'),
(32, 9, 29, 1, 'Belum Dilihat', '2021-05-27'),
(33, 9, 28, 1, 'Belum Dilihat', '2021-05-27'),
(34, 9, 30, 1, 'Belum Dilihat', '2021-05-27'),
(35, 9, 32, 0, 'Belum Dilihat', '2021-05-27'),
(36, 9, 12, 0, 'Belum Dilihat', '2021-05-27'),
(37, 9, 21, 0, 'Belum Dilihat', '2021-05-27'),
(38, 9, 14, 0, 'Belum Dilihat', '2021-05-27'),
(39, 9, 1, 0, 'Belum Dilihat', '2021-05-27'),
(40, 9, 23, 0, 'Belum Dilihat', '2021-05-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id_item` int(4) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `kode_barang` text NOT NULL COMMENT '[1] = no kategori \r\n[2]~[4] = no alfabet tempat penyimpanan\r\n[5]~[8] = no produksi',
  `nama_item` varchar(99) NOT NULL,
  `stok` int(4) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `penyimpanan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL COMMENT 'IDR only',
  `berat` float NOT NULL COMMENT 'gr/item'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id_item`, `id_supplier`, `kode_barang`, `nama_item`, `stok`, `jenis`, `penyimpanan`, `harga`, `berat`) VALUES
(1, 2, '2-006-9707', 'Sosis Sonice', 300, 'Daging', 'F', 21000, 432),
(2, 15, '1-002-0896', 'Ultra Milk Jumbo', 102, 'Cair', 'B', 112000, 250),
(3, 10, '1-003-3822', 'Listerine', 350, 'Cair', 'C', 18000, 120),
(4, 3, '5-001-4660', 'Roti Sisir Mr. Bread', 300, 'Padat', 'A', 5000, 100),
(5, 11, '2-001-3302', 'Daging Sapi', 42, 'Daging', 'A', 130000, 200),
(6, 8, '5-004-9425', 'Sikat Gigi Formula', 500, 'Padat', 'D', 12000, 50),
(7, 11, '4-005-6596', 'Wipol Karbol Cemara', 900, 'Mudah Terbakar', 'E', 15000, 900),
(8, 7, '3-007-9610', 'Minyak Goreng Filma', 200, 'Minyak', 'G', 210000, 8000),
(9, 10, '1-006-2539', 'Pepsodent Pasta Gigi', 2000, 'Cair', 'F', 5000, 75),
(10, 2, '5-006-9524', 'Permen Kopiko', 500, 'Padat', 'F', 7000, 150),
(11, 1, '5-004-7415', 'Yaki Sushi Nori (Rumput Laut)', 400, 'Padat', 'D', 50000, 50),
(12, 6, '3-005-6887', 'Minyak Kayu Putih Cap Lang', 470, 'Minyak', 'E', 22000, 60),
(13, 2, '5-007-2744', 'Silverqueen Coklat Piramid', 700, 'Padat', 'G', 50000, 500),
(14, 2, '5-006-9973', 'Leo Sapi Panggang Keripik Kentang Snack', 700, 'Padat', 'F', 15000, 48),
(15, 1, '5-007-5288', 'Lemonilo Mie Instant', 2000, 'Padat', 'G', 106500, 70),
(16, 1, '5-003-3373', 'Indomie Goreng 1 Dus', 400, 'Padat', 'C', 100000, 3000),
(17, 1, '5-002-2852', 'Mie Sedaap Goreng 1 Dus', 1900, 'Padat', 'B', 70000, 4500),
(18, 2, '1-001-3770', 'Buavita Jus Buah Jambu', 500, 'Cair', 'A', 25000, 1300),
(19, 12, '1-005-9649', 'Sunkist Orange Jus', 50, 'Cair', 'E', 34000, 750),
(20, 13, '5-007-7018', 'Facial Tissue Tisu Nice', 800, 'Padat', 'G', 29500, 900),
(21, 8, '5-005-4785', 'Chocolatos Dark Family Pack', 300, 'Padat', 'E', 22500, 66),
(22, 7, '1-006-4190', 'Blue Band Cake and Cookie Margarine Sachet', 450, 'Cair', 'F', 49700, 200),
(23, 2, '5-004-0566', 'Softex Comfort Slim', 500, 'Padat', 'D', 14500, 350),
(24, 13, '3-006-3854', 'Kara Minyak Kelapa', 300, 'Minyak', 'F', 57000, 2000),
(25, 3, '3-005-4261', 'Minyak Wijen Oh Guan Hing', 560, 'Minyak', 'E', 27500, 100),
(26, 14, '3-004-2981', 'Minyak Goreng Bimoli', 600, 'Minyak', 'D', 28000, 2100),
(27, 13, '3-003-8393', 'Minyak Goreng Sunco', 800, 'Minyak', 'C', 30000, 2100),
(28, 11, '2-005-9749', 'Premium Saikoro Wagyu Cubes Beef Meltic Pack', 300, 'Daging', 'E', 72000, 500),
(29, 2, '2-001-9015', 'Ayam Kampung Segar Fresh', 500, 'Daging', 'A', 60000, 700),
(30, 10, '2-001-1903', 'Ikan Salmon Norwegian Premium Fillet Fresh', 250, 'Daging', 'A', 29900, 100),
(31, 11, '2-002-0896', 'Fresh Daging Giling Ikan Tenggiri Papan', 500, 'Daging', 'B', 105000, 100),
(32, 11, '2-006-9190', 'Ikan Kakap Merah Fillet (Red Snapper)', 200, 'Daging', 'F', 87500, 500),
(33, 11, '2-005-8238', 'Fresh Kepiting Bakau', 50, 'Daging', 'E', 165000, 100),
(34, 13, '2-002-1389', 'Cumi Tube Kupas Bersih Segar Beku Kualitas Premium Super', 700, 'Daging', 'B', 47000, 100),
(35, 13, '2-006-9864', 'Cumi Ring Frozen', 220, 'Daging', 'F', 37500, 500),
(36, 13, '2-006-7135', 'Frozen Canadian Lobster Canada Udang Lobster Capit Import', 50, 'Daging', 'F', 695000, 500),
(37, 3, '4-003-1936', 'Baterai Remote ABC', 400, 'Mudah Terbakar', 'C', 5500, 200),
(38, 3, '4-002-1490', 'Baterai Alkalin', 500, 'Mudah Terbakar', 'B', 10500, 50),
(39, 14, '4-002-0763', 'Parfum Hugo Boss The Scent Edt Man', 350, 'Mudah Terbakar', 'B', 900000, 500),
(40, 10, '4-001-5972', 'Original Parfum Jaguar Classic Gold', 200, 'Mudah Terbakar', 'A', 205000, 500),
(41, 11, '4-007-9299', 'Evangeline Sakura Black Sakura Eau De Parfum', 255, 'Mudah Terbakar', 'G', 25500, 350),
(42, 15, '5-004-9328', 'Boneeto Coklat', 475, 'Padat', 'D', 53000, 750),
(43, 6, '1-001-5164', 'Good Day Rasa Moccachino', 250, 'Cair', 'A', 5000, 250),
(44, 6, '1-005-5606', 'Good Day Coffee Cappuccino', 225, 'Cair', 'E', 5000, 250),
(45, 6, '5-004-4727', 'Beng Beng Drink', 100, 'Padat', 'D', 15500, 375),
(46, 1, '5-004-7984', 'Biskuit &amp; Wafer Beng Beng Box', 500, 'Padat', 'D', 27500, 800),
(47, 5, '5-005-9967', 'Sido Muncul Vitamin D3 400 + Vitamin E 100 IU Soft Capsule', 600, 'Padat', 'E', 171475, 700),
(48, 5, '1-005-4636', 'Minyak Telon Tiga', 140, 'Cair', 'E', 42000, 500),
(49, 5, '5-003-9960', 'Fatraper', 130, 'Padat', 'C', 62000, 120),
(50, 5, '5-003-1105', 'Ramuan Minuman Tradisional TeJamu Kesehatan Daya Tahan Tubuh', 100, 'Padat', 'C', 12000, 250),
(51, 2, '2-001-6427', 'Sosis Sonice Spesial', 300, 'Daging', 'A', 70000, 432),
(52, 15, '1-002-3977', 'Ultra Milk Jumbo Spesial', 102, 'Cair', 'B', 200000, 250),
(53, 10, '1-003-1951', 'Listerine Spesial', 350, 'Cair', 'C', 30000, 120),
(54, 3, '5-001-9032', 'Roti Sisir Mr. Bread Spesial', 300, 'Padat', 'A', 7000, 100),
(55, 11, '2-001-1424', 'Daging Sapi Spesial', 42, 'Daging', 'A', 240000, 200),
(56, 8, '5-004-2307', 'Sikat Gigi Formula Spesial', 500, 'Padat', 'D', 18000, 50),
(57, 11, '4-005-0269', 'Wipol Karbol Cemara Spesial', 900, 'Mudah Terbakar', 'E', 28000, 900),
(58, 7, '3-007-2672', 'Minyak Goreng Filma Spesial', 200, 'Minyak', 'G', 180000, 8000),
(59, 10, '1-006-3816', 'Pepsodent Pasta Gigi Spesial', 2000, 'Cair', 'F', 7000, 75),
(60, 2, '5-006-7494', 'Permen Kopiko Spesial', 500, 'Padat', 'F', 10000, 150),
(61, 1, '5-004-1803', 'Yaki Sushi Nori (Rumput Laut) Spesial', 400, 'Padat', 'D', 80000, 50),
(62, 6, '3-005-8055', 'Minyak Kayu Putih Cap Lang Spesial', 470, 'Minyak', 'E', 40000, 60),
(63, 2, '5-007-7532', 'Silverqueen Coklat Piramid Spesial', 700, 'Padat', 'G', 80000, 500),
(64, 2, '5-006-1339', 'Leo Sapi Panggang Keripik Kentang Snack Spesial', 700, 'Padat', 'F', 28000, 48),
(65, 1, '5-007-2379', 'Lemonilo Mie Instant Spesial', 2000, 'Padat', 'G', 130000, 70),
(66, 1, '5-003-5908', 'Indomie Goreng 1 Dus Spesial', 400, 'Padat', 'C', 135000, 3000),
(67, 1, '5-002-1263', 'Mie Sedaap Goreng 1 Dus Spesial', 1900, 'Padat', 'B', 130000, 4500),
(68, 2, '1-001-6649', 'Buavita Jus Buah Jambu Spesial', 500, 'Cair', 'A', 18000, 1300),
(69, 12, '1-005-7782', 'Sunkist Orange Jus Spesial', 50, 'Cair', 'E', 50000, 750),
(70, 13, '5-007-3593', 'Facial Tissue Tisu Nice Spesial', 800, 'Padat', 'G', 98000, 900),
(71, 8, '5-005-9240', 'Chocolatos Dark Family Pack Spesial', 300, 'Padat', 'E', 40000, 66),
(72, 7, '1-006-3526', 'Blue Band Cake and Cookie Margarine Sachet Spesial', 450, 'Cair', 'F', 90000, 200),
(73, 2, '5-004-4431', 'Softex Comfort Slim Spesial', 500, 'Padat', 'D', 20000, 350),
(74, 13, '3-006-0863', 'Kara Minyak Kelapa Spesial', 300, 'Minyak', 'F', 100000, 2000),
(75, 3, '3-005-5409', 'Minyak Wijen Oh Guan Hing Spesial', 560, 'Minyak', 'E', 50000, 100),
(76, 14, '3-004-3615', 'Minyak Goreng Bimoli Spesial', 600, 'Minyak', 'D', 48000, 2100),
(77, 13, '3-003-2117', 'Minyak Goreng Sunco Spesial', 800, 'Minyak', 'C', 50000, 2100),
(78, 11, '2-005-1730', 'Premium Saikoro Wagyu Cubes Beef Meltic Pack Spesial', 300, 'Daging', 'E', 138000, 500),
(79, 2, '2-001-6511', 'Ayam Kampung Segar Fresh Spesial', 500, 'Daging', 'A', 110000, 700),
(80, 10, '2-001-9381', 'Ikan Salmon Norwegian Premium Fillet Fresh Spesial', 250, 'Daging', 'A', 25000, 100),
(81, 11, '2-002-7885', 'Fresh Daging Giling Ikan Tenggiri Papan Spesial', 500, 'Daging', 'B', 180000, 100),
(82, 11, '2-006-5217', 'Ikan Kakap Merah Fillet (Red Snapper) Spesial', 200, 'Daging', 'F', 168000, 500),
(83, 11, '2-005-9336', 'Fresh Kepiting Bakau Spesial', 50, 'Daging', 'E', 300000, 100),
(84, 13, '2-002-9254', 'Cumi Tube Kupas Bersih Segar Beku Kualitas Premium Super Spesial', 700, 'Daging', 'B', 88000, 100),
(85, 13, '2-006-5224', 'Cumi Ring Frozen Spesial', 220, 'Daging', 'F', 70000, 500),
(86, 13, '2-006-2295', 'Frozen Canadian Lobster Canada Udang Lobster Capit Import Spesial', 50, 'Daging', 'F', 1350000, 500),
(87, 3, '4-003-3900', 'Baterai Remote ABC Spesial', 400, 'Mudah Terbakar', 'C', 7000, 200),
(88, 3, '4-002-0439', 'Baterai Alkalin Spesial', 500, 'Mudah Terbakar', 'B', 18000, 50),
(89, 14, '4-002-4998', 'Parfum Hugo Boss The Scent Edt Man Spesial', 350, 'Mudah Terbakar', 'B', 1200000, 500),
(90, 10, '4-001-1437', 'Original Parfum Jaguar Classic Gold Spesial', 200, 'Mudah Terbakar', 'A', 380000, 500),
(91, 11, '4-007-9977', 'Evangeline Sakura Black Sakura Eau De Parfum Spesial', 255, 'Mudah Terbakar', 'G', 42500, 350),
(92, 15, '5-004-4951', 'Boneeto Coklat Spesial', 475, 'Padat', 'D', 80000, 750),
(93, 6, '1-001-0542', 'Good Day Rasa Moccachino Spesial', 250, 'Cair', 'A', 7000, 250),
(94, 6, '1-005-6110', 'Good Day Coffee Cappuccino Spesial', 225, 'Cair', 'E', 7000, 250),
(95, 6, '5-004-3233', 'Beng Beng Drink Spesial', 100, 'Padat', 'D', 25000, 375),
(96, 1, '5-004-5102', 'Biskuit &amp; Wafer Beng Beng Box Spesial', 500, 'Padat', 'D', 48000, 800),
(97, 5, '5-005-9817', 'Sido Muncul Vitamin D3 400 + Vitamin E 100 IU Soft Capsule Spesial', 600, 'Padat', 'E', 300000, 700),
(98, 5, '1-005-2386', 'Minyak Telon Tiga Spesial', 140, 'Cair', 'E', 75000, 500),
(99, 5, '5-003-6935', 'Fatraper Spesial', 130, 'Padat', 'C', 100000, 120),
(100, 5, '5-003-7026', 'Ramuan Minuman Tradisional TeJamu Kesehatan Daya Tahan Tubuh Spesial', 100, 'Padat', 'C', 18000, 250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
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
-- Dumping data untuk tabel `komplain`
--

INSERT INTO `komplain` (`id_komplain`, `no_komplain`, `uid_komplain`, `judul_komplain`, `isi_komplain`, `foto_komplain`, `waktu_komplain`) VALUES
(3, 'K-250521-008-979', 8, 'Gambar Profile', 'Mohon ijin bertanya pak / bu, untuk gambar profile saya kenapa ya kok berubah ? adakah maintenance pada sistem atau bagaimana ? Mohon kejelasannya, terima kasih.', '1621952244_3c76d39cfcbe88d0e376.jpg', '2021-05-25 09:17:24'),
(4, 'K-250521-030-992', 30, 'Laporan Error Sistem', 'Mohon maaf pak / bu, ini kenapa ya kok ketika saya klik laporan bulanan malah error ? , sehingga pekerjaan saya tertunda. Mohon penjelasannya terima kasih.', '1621952717_8db7b2ddee2bb986be39.jpg', '2021-05-25 09:25:17');

--
-- Trigger `komplain`
--
DELIMITER $$
CREATE TRIGGER `del_komp_visib` AFTER DELETE ON `komplain` FOR EACH ROW BEGIN
DELETE FROM `komplain_visibility` WHERE `no_komplain` = old.`no_komplain`;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `komp_visibilitas` AFTER INSERT ON `komplain` FOR EACH ROW BEGIN
DECLARE done INT DEFAULT FALSE;
DECLARE ids INT;
DECLARE roles INT;
DECLARE cur1 CURSOR FOR SELECT `uid` FROM `user`;
DECLARE cur2 CURSOR FOR SELECT `role` FROM `user`;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

OPEN cur1;
OPEN cur2;

	ins_loop: LOOP
            FETCH cur1 INTO ids;
            FETCH cur2 INTO roles;
            IF done THEN
                LEAVE ins_loop;
            END IF;
            INSERT INTO `komplain_visibility` VALUES (NULL, new.`no_komplain`, ids, roles, "Belum Dilihat", CURDATE());
        END LOOP;

CLOSE cur1;
CLOSE cur2;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain_arsip`
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
-- Dumping data untuk tabel `komplain_arsip`
--

INSERT INTO `komplain_arsip` (`id_arsipKomp`, `no_arsipKomp`, `uid_arsipKomp`, `judul_arsipKomp`, `isi_arsipKomp`, `foto_arsipKomp`, `waktu_arsipKomp`, `uid_arsipKomp_admin`, `status_arsipKomp`, `comment_arsipKomp`, `commented_at`) VALUES
(1, 'K-250521-041-560', 41, 'Bantuan Informasi Admin', 'Ingin bertanya pak / bu, informasi dan bantuan penggunaan website saya dapat melihat dimana ya ?', '1621950646_4e9f561bf25bd4f09715.jpg', '2021-05-25 08:50:46', 69, 'accepted', 'Baik akan kami beritahukan lebih lanjut nanti. Mohon bersabar ya.', '2021-05-25 08:56:43'),
(2, 'K-250521-022-855', 22, 'Toleransi Absensi', 'Mohon ijin pak / bu, sebelumnya saya mohon maaf atas kesalahan yang saya perbuat yaitu lupa absen pada waktu bekerja dikarenakan sibuk mengawasi tabel spesifikasi.', '1621951446_3568315bd61e20fd2922.jpg', '2021-05-25 09:04:06', 73, 'accepted', 'Oke tidak apa2, saya memaklumi. Lain kali jangan diulangi lagi.', '2021-05-25 09:09:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain_visibility`
--

CREATE TABLE `komplain_visibility` (
  `id_visibility` int(11) NOT NULL,
  `no_komplain` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `status` enum('Dilihat','Belum Dilihat') NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `judul` varchar(55) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `waktu`, `judul`, `isi`, `uid`) VALUES
(1, '2021-05-25 07:57:43', 'Agenda Rapat Bulanan (Mei 2021)', 'Lokasi : Ruang Meeting\r\nWaktu : Rabu, 26 - 05 - 2021\r\nPukul : 07.00 - selesai', 1),
(2, '2021-05-25 08:11:59', 'Liburan Bulanan (Mei 2021)', 'Menurut koordinasi rapat dewan direksi, agenda liburan bulanan kali ini bisa dilaksanakan pada akhir bulan Mei.', 3),
(3, '2021-05-25 08:14:11', 'Komplain Pekerja (2021)', 'Segala bentuk komplain mohon dilakukan dengan menjunjung tinggi etika ketika berargumen, lalu juga menunjukkan bukti.', 2),
(4, '2021-05-25 08:16:19', 'Perizinan Barang (2021)', 'Pekerja harap bersabar ketika melakukan request pemasukkan / pengeluaran barang, kami perlu meninjau dengan teliti dan akan memberikan respon sesuai keadaan yang sebenarnya.', 2),
(5, '2021-05-25 08:17:56', 'Aktivitas Pekerja (2021)', 'Pastikan anda semua tidak lupa untuk absensi dan jangan pernah melakukan upaya penipuan kepada atasan, karna kegiatan anda di website dapat kami pantau secara realtime.', 1);

--
-- Trigger `pengumuman`
--
DELIMITER $$
CREATE TRIGGER `del_pengumuman_visib` AFTER DELETE ON `pengumuman` FOR EACH ROW BEGIN
DELETE FROM `pengumuman_visibility` WHERE `id_pengumuman` = old.`id_pengumuman`;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `isi_visibilitas` AFTER INSERT ON `pengumuman` FOR EACH ROW BEGIN
DECLARE done INT DEFAULT FALSE;
DECLARE ids INT;
DECLARE roles INT;
DECLARE cur1 CURSOR FOR SELECT `uid` FROM `user`;
DECLARE cur2 CURSOR FOR SELECT `role` FROM `user`;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

OPEN cur1;
OPEN cur2;

	ins_loop: LOOP
            FETCH cur1 INTO ids;
            FETCH cur2 INTO roles;
            IF done THEN
                LEAVE ins_loop;
            END IF;
            INSERT INTO `pengumuman_visibility` VALUES (NULL, new.`id_pengumuman`, ids, roles, "Belum Dilihat", new.`waktu`);
        END LOOP;

CLOSE cur1;
CLOSE cur2;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman_visibility`
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
-- Dumping data untuk tabel `pengumuman_visibility`
--

INSERT INTO `pengumuman_visibility` (`id_visibility`, `id_pengumuman`, `uid`, `role`, `status`, `waktu`) VALUES
(1, 1, 11, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(2, 1, 13, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(3, 1, 7, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(4, 1, 22, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(5, 1, 17, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(6, 1, 15, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(7, 1, 19, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(8, 1, 25, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(9, 1, 31, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(10, 1, 27, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(11, 1, 8, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(12, 1, 5, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(13, 1, 6, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(14, 1, 24, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(15, 1, 3, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(16, 1, 9, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(17, 1, 26, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(18, 1, 16, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(19, 1, 30, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(20, 1, 2, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(21, 1, 4, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(22, 1, 10, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(23, 1, 18, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(24, 1, 20, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(25, 1, 33, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(26, 1, 29, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(27, 1, 28, 1, 'Belum Dilihat', '2021-05-25 07:57:43'),
(28, 1, 32, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(29, 1, 12, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(30, 1, 21, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(31, 1, 14, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(32, 1, 1, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(33, 1, 23, 0, 'Belum Dilihat', '2021-05-25 07:57:43'),
(34, 2, 1, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(35, 2, 2, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(36, 2, 3, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(37, 2, 4, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(38, 2, 5, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(39, 2, 6, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(40, 2, 7, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(41, 2, 8, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(42, 2, 9, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(43, 2, 10, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(44, 2, 11, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(45, 2, 12, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(46, 2, 13, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(47, 2, 14, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(48, 2, 15, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(49, 2, 16, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(50, 2, 17, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(51, 2, 18, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(52, 2, 19, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(53, 2, 20, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(54, 2, 21, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(55, 2, 22, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(56, 2, 23, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(57, 2, 24, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(58, 2, 25, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(59, 2, 26, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(60, 2, 27, 1, 'Belum Dilihat', '2021-05-25 08:11:59'),
(61, 2, 28, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(62, 2, 29, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(63, 2, 30, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(64, 2, 31, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(65, 2, 32, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(66, 2, 33, 0, 'Belum Dilihat', '2021-05-25 08:11:59'),
(67, 3, 1, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(68, 3, 2, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(69, 3, 3, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(70, 3, 4, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(71, 3, 5, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(72, 3, 6, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(73, 3, 7, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(74, 3, 8, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(75, 3, 9, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(76, 3, 10, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(77, 3, 11, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(78, 3, 12, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(79, 3, 13, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(80, 3, 14, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(81, 3, 15, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(82, 3, 16, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(83, 3, 17, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(84, 3, 18, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(85, 3, 19, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(86, 3, 20, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(87, 3, 21, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(88, 3, 22, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(89, 3, 23, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(90, 3, 24, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(91, 3, 25, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(92, 3, 26, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(93, 3, 27, 1, 'Belum Dilihat', '2021-05-25 08:14:11'),
(94, 3, 28, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(95, 3, 29, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(96, 3, 30, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(97, 3, 31, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(98, 3, 32, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(99, 3, 33, 0, 'Belum Dilihat', '2021-05-25 08:14:11'),
(100, 4, 1, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(101, 4, 2, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(102, 4, 3, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(103, 4, 4, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(104, 4, 5, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(105, 4, 6, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(106, 4, 7, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(107, 4, 8, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(108, 4, 9, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(109, 4, 10, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(110, 4, 11, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(111, 4, 12, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(112, 4, 13, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(113, 4, 14, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(114, 4, 15, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(115, 4, 16, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(116, 4, 17, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(117, 4, 18, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(118, 4, 19, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(119, 4, 20, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(120, 4, 21, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(121, 4, 22, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(122, 4, 23, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(123, 4, 24, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(124, 4, 25, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(125, 4, 26, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(126, 4, 27, 1, 'Belum Dilihat', '2021-05-25 08:16:19'),
(127, 4, 28, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(128, 4, 29, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(129, 4, 30, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(130, 4, 31, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(131, 4, 32, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(132, 4, 33, 0, 'Belum Dilihat', '2021-05-25 08:16:19'),
(133, 5, 1, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(134, 5, 2, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(135, 5, 3, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(136, 5, 4, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(137, 5, 5, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(138, 5, 6, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(139, 5, 7, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(140, 5, 8, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(141, 5, 9, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(142, 5, 10, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(143, 5, 11, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(144, 5, 12, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(145, 5, 13, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(146, 5, 14, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(147, 5, 15, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(148, 5, 16, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(149, 5, 17, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(150, 5, 18, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(151, 5, 19, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(152, 5, 20, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(153, 5, 21, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(154, 5, 22, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(155, 5, 23, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(156, 5, 24, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(157, 5, 25, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(158, 5, 26, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(159, 5, 27, 1, 'Belum Dilihat', '2021-05-25 08:17:56'),
(160, 5, 28, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(161, 5, 29, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(162, 5, 30, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(163, 5, 31, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(164, 5, 32, 0, 'Belum Dilihat', '2021-05-25 08:17:56'),
(165, 5, 33, 0, 'Belum Dilihat', '2021-05-25 08:17:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telp` char(20) NOT NULL,
  `alamat` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
(1, 'PT Indofood CBP Sukses Makmur, Tbk', '081282320000', 'Sudirman Plaza, Indofood Tower Lantai 23 Jl. Jend. Sudirman Kav 76-78 Jakarta 12'),
(2, 'PT Tiga Pilar Sejahtera Food, Tbk', '082822422223', 'Jl. Grompol - Jambangan No.km. 5,5, Dusun 3, Sepat, Kec. Masaran, Kabupaten Srag'),
(3, 'PT Akasha Wira International, Tbk', '083712239502', 'No., Jl. Raya Malang - Gempol No.25, Sengon, Sengonagun, Purwosari, Pasuruan, Ja'),
(4, 'PT ABC President Indonesia', '083782289504', 'Office Tower A Lantai 31 Unit A-H - Jl Casablanca Raya Kav 88, Jakarta Selatan -'),
(5, 'PT Sido Muncul, Tbk', '083932239555', 'Jl Cipete Raya No 81 Jakarta 12410, Indonesia. Nomor Telepon: 021 765 3535 Fax 7'),
(6, 'PT Tri Banyan Tirta Tbk', '083731395221', 'Kampung Pasir Dalem, Desa Babakan Pari, Sukabumi, Jawa Barat'),
(7, 'PT Wilmar Cahaya Indonesia Tbk', '083729502512', 'Jalan Industri Selatan 3 Blok GG 1, Kawasan Industri Jababeka, Cikarang, Bekasi'),
(8, 'PT Delta Djakarta Tbk', '083712221340', 'Jalan Jenderal Sudirman Kavling 76 -78, Sudirman Plaza lantai 27, Jakarta Selata'),
(9, 'PT Multi Bintang Indonesia Tbk', '085756782950', 'Jalan Daan Mogot Kilometer 19, Tangerang, Banten'),
(10, 'PT Mayora Indah Tbk', '085756882953', 'Jalan Tomang Raya Nomor 21 – 23, Jakarta Barat, Jakarta'),
(11, 'PT Nippon Indosari Corpindo Tbk', '085756766667', 'Jalan Selayar Blok A9, Kawasan Industri, Bekasi'),
(12, 'PT Sekar Bumi Tbk', '085256764668', 'Jalan Jenderal Sudirman Kavling 59, Plaza Asia Fl. Jakarta Selatan, Jakarta'),
(13, 'PT Sekar Laut Tbk', '081235914512', 'Jalan Jenderal Sudirman Kavling 7 -8, Wisma Nugra Santana lantai 8, Jakarta Sela'),
(14, 'PT Siantar Top Tbk', '082723423414', 'Jalan Tambak Sawah Nomor 21 – 23, Waru Sidoarjo'),
(15, 'PT Ultrajaya Milk Industry Co. Tbk', '083790904444', 'Jalan Rawaterate 1 Nomor 5, Cakung, Jakarta Timur, Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `uid` int(7) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `divisi_user` int(11) DEFAULT NULL,
  `picture` varchar(256) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`uid`, `nama`, `email`, `password`, `role`, `divisi_user`, `picture`, `gender`, `tanggal_lahir`) VALUES
(1, 'Nikola Tesla', 'tesla@gmail.com', '$2y$10$NHGv1T3eNUlnNfPjlgCiB.npk/.9o8.B5lwZ2QiHcPsTA6r/Q9XH2', 0, 1, 'default.jpg', 'Laki-laki', '1977-05-25'),
(2, 'John Doe', 'johndoe@gmail.com', ' ', 0, 10, 'default.jpg', 'Laki-laki', '1974-05-05'),
(3, 'Muhammad Al Fatih', 'fatih@gmail.com', ' ', 0, 2, 'default.jpg', 'Laki-laki', '1979-07-26'),
(4, 'Khalid Walid', 'khalid@gmail.com', ' ', 0, 2, 'default.jpg', 'Laki-laki', '1976-02-10'),
(5, 'Albert Einstein', 'einstein@gmail.com', '', 0, 10, 'default.jpg', 'Laki-laki', '1974-05-05'),
(6, 'Erwin Schrödinger', 'erwin@gmail.com', '$2y$10$NHGv1T3eNUlnNfPjlgCiB.npk/.9o8.B5lwZ2QiHcPsTA6r/Q9XH2', 0, 4, 'default.jpg', 'Laki-laki', '1977-05-25'),
(7, 'Allan Poe', 'allan@gmail.com', ' ', 1, 6, 'default.jpg', 'Laki-laki', '1987-01-30'),
(8, 'Paul A.M. Dirac', 'dirac@gmail.com', '$2y$10$xhULUdOUhwxBH1hCwrUoPeImopBifkkAeXwmD7NVg6uIV5HNiCYiy', 1, 5, 'default.jpg', 'Laki-laki', '1985-03-21'),
(9, 'Muhammad Ibnu', 'ibnu@gmail.com', ' ', 1, 5, 'default.jpg', 'Laki-laki', '1992-02-10'),
(10, 'Kurniawan Kuntoro', 'kukun@gmail.com', '$2y$10$ffptJql9WmysGHENlyUile/blayl4iLAvyvMRZd.9g2TaySULlfIG', 1, 8, 'default.jpg', 'Laki-laki', '1985-05-14'),
(11, 'Adielya Moline', 'adeline@gmail.com', '$2y$10$qkWqu1ODqi.744EeV3Re3OqBtLYnH8wxD4csHrJEylRU1jp.Ppgqi', 1, 7, 'default.jpg', 'Laki-laki', '1984-09-17'),
(12, 'Serline Claudya', 'serline@gmail.com', '$2y$10$ba3UBtfBOTOH5eDquRNZsOIBiYgOVq83WDbb2CXE3WhjJy.kAzTN.', 1, 6, 'default.jpg', 'Perempuan', '1989-05-14'),
(13, 'Alfha Fierly Firdaus', 'alfhaff@gmail.com', '$2y$10$wc851oFM4IwkxFJayGWyLuWuu4e2HImDwVaPD6MlWKUGnqp8u0eVG', 0, 1, 'default.jpg', 'Laki-laki', '1992-02-04'),
(14, 'Tasya Anastasya Mufida', 'tasyamufida@gmail.com', '$2y$10$lWgQ/EmPhz1G5vo.QXEAm.n8ac.21PZUgZV0zx4Tks2zASTH5TTya', 0, 1, 'default.jpg', 'Perempuan', '1994-02-02'),
(15, 'Billy Gate', 'billy@gmail.com', '$2y$10$oEZ2N2cpnzo8OsWbVYGXKuYjqFyh9wNoHEAD0OXc/cCO.kBr1KRIm', 0, 0, 'default.jpg', 'Laki-laki', '1984-05-08'),
(16, 'Jane Doe', 'janedoe@gmail.com', ' ', 1, 9, 'default.jpg', 'Perempuan', '0000-00-00'),
(17, 'Asuka Langley', 'asuka@gmail.com', ' ', 0, 2, 'default.jpg', 'Perempuan', '1995-08-24'),
(18, 'Makinami Mari', 'makinami@gmail.com', '$2y$10$bs0KTnI2k1M8BMw8onU8C.frt28siCF5talRoKMTjotz4kOehkFSG', 0, 3, 'default.jpg', 'Perempuan', '1990-01-28'),
(19, 'Budi Anwar', 'budi@gmail.com', ' ', 1, 6, 'default.jpg', 'Laki-laki', '1994-06-05'),
(20, 'Nabila Sabila', 'nabila@gmail.com', ' ', 1, 7, 'default.jpg', 'Perempuan', '1991-03-26'),
(21, 'Sophia', 'sophia@gmail.com', ' ', 1, 8, 'default.jpg', 'Perempuan', '1989-02-20'),
(22, 'Aqila Waqidah', 'aqila@gmail.com', ' ', 1, 8, 'default.jpg', 'Perempuan', '1988-02-14'),
(23, 'Wahyu', 'wahyu@gmail.com', ' ', 1, 8, 'default.jpg', 'Laki-laki', '1991-02-16'),
(24, 'Fathur Rohman', 'fathur@gmail.com', ' ', 1, 9, 'default.jpg', 'Laki-laki', '1991-04-26'),
(25, 'Cantika', 'cantika@gmail.com', '', 1, 9, 'default.jpg', 'Perempuan', '1990-05-15'),
(26, 'Ifrida Nabila', 'ifrida@gmail.com', ' ', 1, 9, 'default.jpg', 'Perempuan', '1993-02-20'),
(27, 'David Joestar', 'david@gmail.com', '', 1, 9, 'default.jpg', 'Laki-laki', '1994-05-25'),
(28, 'Rizky Ahmad', 'rifkyakhmad911@gmail.com', '$2y$10$S4lLu3JNtZ7K2F8MB3iAiu84Pui4iEDuJAdYcEvf4eW/cTt.Pw5Pq', 0, 1, 'default.jpg', 'Laki-laki', '1998-05-26'),
(29, 'Eula Lawrence', 'rifkxc@gmail.com', '$2y$10$7UotMRfbctgZZK9kSh4FFeGCuSuSIFgHOT3IufP83PwPqmy/e67uu', 0, 2, '1622037230_75166a9e82e12977fa0d.jpg', 'Perempuan', '1994-10-25'),
(30, 'Jean', 'jean.brindilr@gmail.com', '$2y$10$LHZUsw3/Spyma54o8ydNiO0CGisJuYkGeEtzB7LmX8iDgvrSC5ASC', 0, 1, '1620096456_33597a2991cdf418daf9.jpg', 'Perempuan', '2021-05-26'),
(31, 'Faisal', 'cv1@gmail.com', '$2y$10$bZTeYYc4vcfVUyrcrGpb4OgPFTB2LDNJ9jeE.zXHAX7K8rSr.dv2u', 0, 3, '1622037550_6e1ded068646cf71ffd5.jpg', 'Laki-laki', '2021-05-26'),
(32, 'rifkya911', 'sdd911@gmail.com', '$2y$10$0XwDQb.gsioR4khSMMCvyONjoxYGtdCyX6ZnRzG8kh7IKgY4YoHJ.', 0, 8, '1622037819_b141b00d72e0d792ce5a.jpg', 'Laki-laki', '2021-05-13'),
(33, 'Qiqi', 'qiqi@gmail.com', '$2y$10$LHZUsw3/Spyma54o8ydNiO0CGisJuYkGeEtzB7LmX8iDgvrSC5ASC', 0, 1, 'default.jpg', 'Perempuan', '1987-07-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_activity`
--

CREATE TABLE `user_activity` (
  `id_aktivitas` int(7) NOT NULL,
  `uid_aktivitas` int(7) NOT NULL,
  `aktivitas` varchar(256) NOT NULL,
  `waktu_aktivitas` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_divisi`
--

CREATE TABLE `user_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(35) NOT NULL,
  `kode_divisi` varchar(35) NOT NULL,
  `role_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_divisi`
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
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `alur_barang`
--
ALTER TABLE `alur_barang`
  ADD PRIMARY KEY (`no_log`);

--
-- Indeks untuk tabel `alur_barang_visibility`
--
ALTER TABLE `alur_barang_visibility`
  ADD PRIMARY KEY (`id_visibility`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`);

--
-- Indeks untuk tabel `komplain_arsip`
--
ALTER TABLE `komplain_arsip`
  ADD PRIMARY KEY (`id_arsipKomp`);

--
-- Indeks untuk tabel `komplain_visibility`
--
ALTER TABLE `komplain_visibility`
  ADD PRIMARY KEY (`id_visibility`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `pengumuman_visibility`
--
ALTER TABLE `pengumuman_visibility`
  ADD PRIMARY KEY (`id_visibility`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indeks untuk tabel `user_divisi`
--
ALTER TABLE `user_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=614;

--
-- AUTO_INCREMENT untuk tabel `alur_barang`
--
ALTER TABLE `alur_barang`
  MODIFY `no_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `alur_barang_visibility`
--
ALTER TABLE `alur_barang_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `komplain_arsip`
--
ALTER TABLE `komplain_arsip`
  MODIFY `id_arsipKomp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `komplain_visibility`
--
ALTER TABLE `komplain_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengumuman_visibility`
--
ALTER TABLE `pengumuman_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id_aktivitas` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_divisi`
--
ALTER TABLE `user_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
