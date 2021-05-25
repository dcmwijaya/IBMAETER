-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2021 pada 20.18
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
(1, '2021-05-25 07:57:43', 'Agenda Rapat Bulanan (Mei 2021)', 'Lokasi : Ruang Meeting\r\nWaktu : Rabu, 26 - 05 - 2021\r\nPukul : 07.00 - selesai', 69),
(2, '2021-05-25 08:11:59', 'Liburan Bulanan (Mei 2021)', 'Menurut koordinasi rapat dewan direksi, agenda liburan bulanan kali ini bisa dilaksanakan pada akhir bulan Mei.', 73),
(3, '2021-05-25 08:14:11', 'Komplain Pekerja (2021)', 'Segala bentuk komplain mohon dilakukan dengan menjunjung tinggi etika ketika berargumen, lalu juga menunjukkan bukti.', 73),
(4, '2021-05-25 08:16:19', 'Perizinan Barang (2021)', 'Pekerja harap bersabar ketika melakukan request pemasukkan / pengeluaran barang, kami perlu meninjau dengan teliti dan akan memberikan respon sesuai keadaan yang sebenarnya.', 69),
(5, '2021-05-25 08:17:56', 'Aktivitas Pekerja (2021)', 'Pastikan anda semua tidak lupa untuk absensi dan jangan pernah melakukan upaya penipuan kepada atasan, karna kegiatan anda di website dapat kami pantau secara realtime.', 69);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
