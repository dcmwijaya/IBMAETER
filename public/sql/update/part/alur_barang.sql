-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2021 pada 20.07
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
(7, 21, 69, '2021-05-25 08:02:34', 'Masuk', 'Diterima', 100, 'Terverifikasi !', 69),
(8, 25, 69, '2021-05-25 08:02:30', 'Keluar', 'Diterima', 20, 'Terverifikasi !', 69),
(9, 7, 69, '2021-05-25 08:03:46', 'Keluar', 'Diterima', 100, 'Terverifikasi !', 69),
(10, 17, 69, '2021-05-25 08:03:42', 'Keluar', 'Diterima', 100, 'Terverifikasi !', 69),
(11, 2, 69, '2021-05-25 08:04:58', 'Masuk', 'Diterima', 2, 'Terverifikasi !', 69),
(12, 5, 69, '2021-05-25 08:05:01', 'Masuk', 'Diterima', 2, 'Terverifikasi !', 69),
(13, 25, 69, '2021-05-25 08:06:12', 'Keluar', 'Diterima', 20, 'Terverifikasi !', 69),
(14, 8, 69, '2021-05-25 08:06:56', 'Masuk', 'Diterima', 100, 'Terverifikasi !', 69);

--
-- Trigger `alur_barang`
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
-- Indeks untuk tabel `alur_barang`
--
ALTER TABLE `alur_barang`
  ADD PRIMARY KEY (`no_log`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alur_barang`
--
ALTER TABLE `alur_barang`
  MODIFY `no_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
