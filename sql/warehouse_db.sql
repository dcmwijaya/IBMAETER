-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2021 pada 14.37
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
  `absen` varchar(99) NOT NULL,
  `waktu_absen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `uid_absen`, `email_absen`, `absen`, `waktu_absen`) VALUES
(1, 4, 'billy@gantx.com', 'Attendance', '2021-05-16 07:00:00'),
(2, 3, 'erwin@gmail.com', 'Attendance', '2021-05-16 07:33:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alur_barang`
--

CREATE TABLE `alur_barang` (
  `no_log` int(11) NOT NULL,
  `nama_pekerja` varchar(50) NOT NULL,
  `tgl` datetime NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `request` enum('Masuk','Keluar') NOT NULL,
  `status` enum('Pending','Diterima','Ditolak') NOT NULL,
  `ubah_stok` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `alur_barang`
--

INSERT INTO `alur_barang` (`no_log`, `nama_pekerja`, `tgl`, `nama_barang`, `request`, `status`, `ubah_stok`, `ket`) VALUES
(26, 'Billy Gate', '2021-05-15 21:38:00', 'Antangin JRG', 'Masuk', 'Diterima', 14, 'PPP'),
(27, 'Billy Gate', '2021-05-15 21:39:00', 'Mentari SimCard', 'Keluar', 'Ditolak', 20, 'SS'),
(28, 'Billy Gate', '2021-05-15 21:40:00', 'Antangin JRG', 'Masuk', 'Pending', 40, 'A'),
(29, 'Billy Gate', '2021-05-15 21:41:00', 'So Clean 320ml', 'Masuk', 'Pending', 38, 'Perlu ditambah Supplier'),
(30, 'Billy Gate', '2021-05-15 21:42:00', 'Sabun Mandieh', 'Masuk', 'Pending', 100, 'Untuk Mengubah Jumlah Stok perlu ACC dari Admin terlebih dahulu'),
(31, 'Billy Gate', '2021-05-11 22:00:00', 'Soda Gembira 210ml', 'Masuk', 'Pending', 6, 'sss'),
(32, 'Billy Gate', '2021-05-16 16:36:00', 'Sabun Mandieh', 'Keluar', 'Pending', 20, 'Test'),
(33, 'Billy Gate', '2021-05-16 16:37:00', 'Sabun Mandieh', 'Keluar', 'Pending', 100, 'Mantap Lurr'),
(34, 'Billy Gate', '2021-05-16 16:37:00', 'Sabun Mandieh', 'Masuk', 'Pending', 300, 'Uji Masuk'),
(35, 'Billy Gate', '2021-05-16 16:38:00', 'So Clean 320ml', 'Masuk', 'Pending', 100, 'Uji'),
(36, 'Billy Gate', '2021-05-16 16:38:00', 'So Clean 320ml', 'Keluar', 'Pending', 100, 'Uji'),
(37, 'Erwin Edit', '2021-05-16 17:00:00', 'Sabun Mandieh', 'Masuk', 'Pending', 100, 'Cobaa ya'),
(38, 'Erwin Edit', '2021-05-21 17:00:00', 'Sabun Mandieh', 'Keluar', 'Pending', 50, 'Woww');

--
-- Trigger `alur_barang`
--
DELIMITER $$
CREATE TRIGGER `stok_dinamis` AFTER INSERT ON `alur_barang` FOR EACH ROW BEGIN
IF (new.`request`="Masuk") THEN
	UPDATE `item` SET `item`.`stok` = `item`.`stok` + new.`ubah_stok`
	WHERE `item`.`nama_item` = new.`nama_barang`;
ELSE
UPDATE `item` SET `item`.`stok` = `item`.`stok` - new.`ubah_stok`
	WHERE `item`.`nama_item` = new.`nama_barang`;
    END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_komplain`
--

CREATE TABLE `arsip_komplain` (
  `no_arsipKomp` varchar(20) NOT NULL,
  `uid_arsipKomp` int(7) NOT NULL,
  `email_arsipKomp` varchar(99) NOT NULL,
  `judul_arsipKomp` varchar(100) NOT NULL,
  `isi_arsipKomp` varchar(256) NOT NULL,
  `foto_arsipKomp` varchar(256) NOT NULL,
  `waktu_arsipKomp` datetime NOT NULL,
  `status_arsipKomp` varchar(10) NOT NULL,
  `comment_arsipKomp` varchar(256) DEFAULT NULL,
  `commented_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `arsip_komplain`
--

INSERT INTO `arsip_komplain` (`no_arsipKomp`, `uid_arsipKomp`, `email_arsipKomp`, `judul_arsipKomp`, `isi_arsipKomp`, `foto_arsipKomp`, `waktu_arsipKomp`, `status_arsipKomp`, `comment_arsipKomp`, `commented_at`) VALUES
('K-020521-003-194', 3, 'erwin@gmail.com', 'Lembur bagai quda', 'permaslahan pada alur data dari manejer ke pegawai dan sebaliknya. bla bla bla.', '-', '2021-05-02 11:32:14', 'accepted', 'ss', '2021-05-06 07:18:33'),
('K-060521-003-285', 3, 'erwin@gmail.com', 'tes arsip komplain 2', 'pengujian fitur arsip komplain nomor 2 dengan akun karyawan erwing.', '-', '2021-05-06 04:02:15', 'rejected', 'komplain ditolak. mohon ikuti tata cara penggunaan fitur agar fungsi bisa berjalan dengan benar', '2021-05-06 04:18:55'),
('K-060521-004-186', 4, 'billy@gantx.com', 'tes arsip komplain 1', 'pengujian fitur arsip komplain dari akun admin billy the kid.', '1620291388_6e1c76cd5a9168729744.png', '2021-05-06 03:56:28', 'accepted', 'komplain diterima. kami sedang memproses permasalahannya', '2021-05-06 04:09:26');

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
(1, 0, 'C123S43', 'Sabun Mandieh', 150, 'Cair', 'B', 8000, 1),
(2, 0, '', 'Antangin JRG', 65, 'Minyak', 'A', 0, 200),
(3, 0, '', 'sikat wc', 44, 'Padat', 'D', 0, 1.2),
(4, 0, '', 'Pepsodent 102gr', 44, 'Cair', 'A', 0, 0),
(5, 0, '', 'Dodo Mainanmu', 22, 'Padat', 'C', 0, 0),
(8, 0, '', 'Mentari SimCard', 80, 'Padat', 'A', 0, 0),
(9, 0, '', 'Solonensi Ajaib', 33, 'Cair', 'C', 0, 0),
(10, 0, '', 'Bearbrando 210ml', 22, 'Cair', 'B', 0, 0),
(15, 0, '', 'So Clean 320ml', 50, 'Cair', 'C', 0, 0),
(16, 0, '', 'Betadine', 30, 'Cair', 'B', 0, 0),
(17, 0, '', 'Baterai ABC 80gr', 33, 'Padat', 'B', 0, 0),
(21, 0, '', 'Sikat Gigih', 44, 'Mudah Terbakar', 'F', 0, 0),
(22, 0, '', 'Dodo Sakti', 44, 'Minyak', 'D', 0, 0),
(23, 0, '', 'Mixin 210ml', 12, 'Cair', 'C', 0, 0),
(24, 0, '', 'Madu Kuat 210ml', 15, 'Mudah Terbakar', 'C', 0, 0),
(26, 0, '', 'Soda Gembira 210ml', 39, 'Cair', 'D', 0, 0),
(27, 0, '', 'Minyak Pijat 210ml', 100, 'Minyak', 'D', 0, 0),
(28, 0, '', '&lt;div class=&quot;btn btn-success&quot;&gt;&lt;/div&gt;', 22, 'Padat', 'A', 0, 0),
(30, 0, '', 'Adem Sari 10gr', 20, 'Padat', 'E', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
--

CREATE TABLE `komplain` (
  `no_komplain` varchar(22) NOT NULL,
  `uid_komplain` int(7) NOT NULL,
  `email_komplain` varchar(99) NOT NULL,
  `judul_komplain` varchar(100) NOT NULL,
  `isi_komplain` varchar(256) NOT NULL,
  `foto_komplain` varchar(256) NOT NULL,
  `waktu_komplain` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `komplain`
--

INSERT INTO `komplain` (`no_komplain`, `uid_komplain`, `email_komplain`, `judul_komplain`, `isi_komplain`, `foto_komplain`, `waktu_komplain`) VALUES
('K-020521-001-435', 1, 'saber.genshin@gmail.com', 'tes ke 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad cupiditate at cum, recusandae maiores enim debitis similique et sapiente soluta, minus dolor. Temporibus, tempore. Id mollitia ex voluptate vero sunt.', '1619973275_831f9e7fe4ad87c90ade.png', '2021-05-02 11:34:35'),
('K-020521-004-229', 4, 'billy@gantx.com', 'Fotonya menjadi blur', 'asda;sldkals aksdnalkdnal askdk', '-', '2021-05-02 10:56:34'),
('K-060521-029-780', 29, 'billy@gantx.com', 'Jam ku hilang', 'Woy !', '1620303698_f811c1c18114110d8994.jpg', '2021-05-06 07:21:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(256) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi`, `foto`) VALUES
(1, 'Jadwal Supplier Masuk Mei 2027', 'Kuliii Bangunan', 'image.jpg');

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
  `department` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`uid`, `nama`, `email`, `password`, `role`, `picture`, `department`) VALUES
(1, 'Admin Zero', 'saber.genshin@gmail.com', '$2y$10$QXi1weaBbKVPYI4/0pyAiuFpv9cB7dFOhHAhjU4HLCdOHSpyG/ZP.', 0, 'venti.jpg', 'Information Technology'),
(8, 'Nikola Tesla', 'tesla@gmail.com', '$2y$10$NHGv1T3eNUlnNfPjlgCiB.npk/.9o8.B5lwZ2QiHcPsTA6r/Q9XH2', 0, 'keqing.jpg', 'Dokumentasi Aset'),
(22, 'Daemon Yukata', 'yukatadae@gmail.com', '$2y$10$XNRdXAxp7x8XXSGZWMs8Se9kvQPNnI63FVu3zQMO2mDo0fNbqa/gG', 0, 'default.jpg', 'Warehouse'),
(29, 'Billy Gate', 'billy@gantx.com', '$2y$10$ffptJql9WmysGHENlyUile/blayl4iLAvyvMRZd.9g2TaySULlfIG', 0, '1618827218_5cf23f7330b26292409a.jpg', 'Human Resource'),
(30, 'Erwin Edit', 'erwin1@gmail.com', '$2y$10$ejFPqAjB/GTlLSjqA323NO5bBYk/SlyUswJOAPh6Ojp16zSiEXtdO', 1, 'erwin.jpg', 'Inventarisasi Aset'),
(41, 'Makinami', 'makinami@gmail.com', '$2y$10$z7jEnwBvnj4/DBS.gU3f3.zgEiWXTfXZgU2Rs9/8dSiP6jX8q5IEe', 1, 'default.jpg', 'Spesifikasi Aset'),
(47, 'Einstein', 'einstein@gmail.com', '$2y$10$qkWqu1ODqi.744EeV3Re3OqBtLYnH8wxD4csHrJEylRU1jp.Ppgqi', 1, '1621160514_e284552c0c826a53b21a.jpg', 'Dokumentasi Aset'),
(53, '1234567', 'xcc@gmail.com', '$2y$10$RAe.OW6IAoNnIWBkXvMbAeHTbX8rHGCPIUl5esD2OZclnlT8DSMwu', 1, 'default.jpg', 'Information Technology'),
(69, 'Alfha Fierly Firdaus', 'alfhaff@invenbar.ac.id', '$2y$10$eNqNZPl9poDdVMwN2c1XFeCWN2PeCTnFS8GoYQTO8YJnd6YlVvQhe', 0, 'default.jpg', 'Founder');

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
-- Indeks untuk tabel `arsip_komplain`
--
ALTER TABLE `arsip_komplain`
  ADD PRIMARY KEY (`no_arsipKomp`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`no_komplain`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_absen` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `alur_barang`
--
ALTER TABLE `alur_barang`
  MODIFY `no_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id_aktivitas` int(7) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
