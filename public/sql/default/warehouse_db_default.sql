-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2021 pada 17.07
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
(1, 'Pt. Unileper', '081222320000', 'Jl. Kemayoran Baru kec. Salatiga Jakarta Barat'),
(2, 'Pt. Snakku', '0822222222', 'Jl. Selamat Jalan kec. Barong Kota Air');

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `alur_barang`
--
ALTER TABLE `alur_barang`
  MODIFY `no_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `alur_barang_visibility`
--
ALTER TABLE `alur_barang_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komplain_arsip`
--
ALTER TABLE `komplain_arsip`
  MODIFY `id_arsipKomp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komplain_visibility`
--
ALTER TABLE `komplain_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman_visibility`
--
ALTER TABLE `pengumuman_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id_aktivitas` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
