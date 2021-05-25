-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2021 pada 20.45
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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `uid` int(7) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`uid`, `nama`, `email`, `password`, `role`, `picture`, `department`, `gender`) VALUES
(1, 'Adielya Moline', 'adeline@gmail.com', '$2y$10$mGZwaegr6mQkD03k1KBLoeXoeRvm2JVr3jEs2WWZopUCZIyGnlO7O', 0, 'default.jpg', 'Information Technology', 'Female'),
(8, 'Nikola Tesla', 'tesla@gmail.com', '$2y$10$NHGv1T3eNUlnNfPjlgCiB.npk/.9o8.B5lwZ2QiHcPsTA6r/Q9XH2', 0, 'default.jpg', 'Dokumentasi Aset', 'Male'),
(22, 'Daemon Yukata', 'yukatadae@gmail.com', '$2y$10$oEZ2N2cpnzo8OsWbVYGXKuYjqFyh9wNoHEAD0OXc/cCO.kBr1KRIm', 0, 'default.jpg', 'Warehouse', 'Male'),
(29, 'Kurniawan Kuntoro', 'kukun@gmail.com', '$2y$10$ffptJql9WmysGHENlyUile/blayl4iLAvyvMRZd.9g2TaySULlfIG', 0, 'default.jpg', 'Human Resource', 'Male'),
(30, 'Erwin Edith', 'erwin1@gmail.com', '$2y$10$xhULUdOUhwxBH1hCwrUoPeImopBifkkAeXwmD7NVg6uIV5HNiCYiy', 1, 'default.jpg', 'Inventarisasi Aset', 'Male'),
(41, 'Makinami', 'makinami@gmail.com', '$2y$10$bs0KTnI2k1M8BMw8onU8C.frt28siCF5talRoKMTjotz4kOehkFSG', 1, 'default.jpg', 'Spesifikasi Aset', 'Female'),
(47, 'Erlando Dwi Wicaksono', 'erland@gmail.com', '$2y$10$qkWqu1ODqi.744EeV3Re3OqBtLYnH8wxD4csHrJEylRU1jp.Ppgqi', 1, 'default.jpg', 'Dokumentasi Aset', 'Male'),
(53, 'Serline Claudya', 'serline@gmail.com', '$2y$10$ba3UBtfBOTOH5eDquRNZsOIBiYgOVq83WDbb2CXE3WhjJy.kAzTN.', 1, 'default.jpg', 'Information Technology', 'Female'),
(69, 'Alfha Fierly Firdaus', 'alfhaff@gmail.com', '$2y$10$wc851oFM4IwkxFJayGWyLuWuu4e2HImDwVaPD6MlWKUGnqp8u0eVG', 0, 'default.jpg', 'Dewan Direksi', 'Male'),
(73, 'Tasya Anastasya Mufida', 'tasyamufida@gmail.com', '$2y$10$lWgQ/EmPhz1G5vo.QXEAm.n8ac.21PZUgZV0zx4Tks2zASTH5TTya', 0, 'default.jpg', 'Dewan Direksi', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
