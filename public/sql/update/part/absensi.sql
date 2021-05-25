-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2021 pada 03.57
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
(2, 41, 'makinami@gmail.com', 'Izin', 'Mohon maaf saya terlambat absensi, dikarenakan min', '1621950755_3d75d3e6ced062f9cd27.jpg', '2021-05-25', '20:52:35', 'Diterima', 'Ok, izin disetujui', '2021-05-25 14:07:13'),
(3, 22, 'yukatadae@gmail.com', 'Izin', 'Mohon maaf bu / pak, saya terlambat absensi dikare', '1621951273_35871bb8787b1b59a7bc.jpg', '2021-05-25', '21:01:13', 'Diterima', 'Ok, izin disetujui', '2021-05-25 14:07:20'),
(4, 8, 'tesla@gmail.com', 'Izin', 'Mohon maaf pak / bu, saya terlambat dikarenakan lu', '1621952531_d1e3a97c8df167397f06.jpg', '2021-05-25', '21:22:11', 'Pending', '-', NULL),
(5, 30, 'erwin1@gmail.com', 'Izin', 'Mohon maaf pak / bu, saya lupa absen dikarenakan b', '1621952764_32ed5796fb6aea52598f.jpg', '2021-05-25', '21:26:04', 'Pending', '-', NULL),
(6, 69, 'alfhaff@gmail.com', 'Hadir', '-', '-', '2021-05-26', '02:19:24', 'Masuk', '-', NULL),
(7, 73, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-26', '03:55:31', 'Masuk', '-', NULL),
(8, 1, 'adeline@gmail.com', 'Hadir', '-', '-', '2021-05-26', '03:56:48', 'Masuk', '-', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
