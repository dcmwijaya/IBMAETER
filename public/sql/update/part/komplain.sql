-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2021 pada 21.40
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
