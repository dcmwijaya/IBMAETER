-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2021 pada 14.14
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
(1, 4, 'billy@gantx.com', 'Hadir', '-', '-', '2021-05-16', '07:00:00', 'Masuk', '-', NULL),
(2, 3, 'erwin@gmail.com', 'Hadir', '-', '-', '2021-05-16', '07:33:00', 'Masuk', '-', NULL),
(3, 4, 'billy@gantx.com', 'Hadir', '-', '-', '2021-05-17', '07:00:00', 'Masuk', '-', NULL),
(4, 3, 'erwin@gmail.com', 'Terlambat', '-', '-', '2021-05-17', '09:24:42', 'Masuk', '-', NULL),
(8, 4, 'billy@gantx.com', 'Izin', 'sakit', '1621424790_8940a7bc5456eff24ddc.png', '2021-05-19', '18:46:30', 'Diterima', '-', NULL),
(10, 4, 'billy@gantx.com', 'Izin', 'Dinas Luar Kota', '1621495134_bce3a2ad6e8785a39a3b.png', '2021-05-20', '14:18:54', 'Diterima', 'Terverifikasi!', '2021-05-20 09:00:00'),
(17, 3, 'erwin@gmail.com', 'Izin', 'Cuti', '1621496496_a858e9662a0dd082efda.png', '2021-05-20', '14:41:36', 'Ditolak', 'Izin tidak diterima', '2021-05-20 09:18:30'),
(18, 69, 'alfhaff@invenbar.ac.id', 'Izin', 'kesiangan', '1621497689_827a29249e1f5145af5d.png', '2021-05-20', '15:01:29', 'Ditolak', '-', NULL),
(19, 69, 'alfhaff@invenbar.ac.id', 'Hadir', '-', '-', '2021-05-21', '00:53:03', 'Masuk', '-', NULL),
(20, 29, 'billy@gantx.com', 'Terlambat', '-', '-', '2021-05-21', '12:14:41', 'Masuk', '-', NULL),
(21, 73, 'tasyamufida@gmail.com', 'Izin', 'Mohon maaf sebelumnya laptop saya sedang ada masal', '1621605805_fc85a5aa96e4dc08263d.jpg', '2021-05-21', '21:03:24', 'Diterima', 'Ok ijin diterima', '2021-05-22 10:57:35'),
(22, 73, 'tasyamufida@gmail.com', 'Hadir', '-', '-', '2021-05-22', '02:12:19', 'Masuk', '-', NULL),
(23, 1, 'adeline@gmail.com', 'Terlambat', '-', '-', '2021-05-22', '15:09:47', 'Masuk', '-', NULL);

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
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `alur_barang`
--

INSERT INTO `alur_barang` (`no_log`, `id_item`, `uid`, `tgl`, `request`, `status`, `ubah_stok`, `ket`) VALUES
(59, 22, 53, '2021-05-21 19:41:00', 'Masuk', 'Pending', 11, 'ddf'),
(60, 22, 53, '2021-05-21 19:44:00', 'Masuk', 'Pending', 36, 'sdsd'),
(61, 32, 53, '2021-05-21 19:47:00', 'Keluar', 'Pending', 27, 'SAF'),
(62, 28, 53, '2021-05-21 19:47:00', 'Keluar', 'Pending', 3, 'asd'),
(63, 24, 53, '2021-05-21 19:47:00', 'Masuk', 'Pending', 66, 'ASDASD'),
(64, 31, 53, '2021-05-21 19:48:00', 'Masuk', 'Pending', 61, 'SD'),
(65, 21, 53, '2021-05-21 19:53:00', 'Masuk', 'Pending', 20, 'Yahaha Hayoek :&#039;v'),
(0, 32, 73, '2021-05-22 22:27:00', 'Masuk', 'Pending', 30, 'Wkwkwkkkk.....'),
(0, 1, 73, '2021-05-22 22:37:00', 'Keluar', 'Pending', 30, 'Keluar'),
(0, 1, 41, '2021-05-22 23:32:00', 'Masuk', 'Pending', 16, 'Sabun Mandi Masuk 16 Boss'),
(0, 15, 41, '2021-05-22 23:33:00', 'Keluar', 'Pending', 20, 'So Clean Keluar 20 boss, barang tak layak pakai.');

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
('K-020521-001-435', 1, 'saber.genshin@gmail.com', 'tes ke 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad cupiditate at cum, recusandae maiores enim debitis similique et sapiente soluta, minus dolor. Temporibus, tempore. Id mollitia ex voluptate vero sunt.', '1619973275_831f9e7fe4ad87c90ade.png', '2021-05-02 11:34:35', 'rejected', 'Tidak layak', '2021-05-17 10:43:46'),
('K-020521-003-194', 3, 'erwin@gmail.com', 'Lembur bagai quda', 'permaslahan pada alur data dari manejer ke pegawai dan sebaliknya. bla bla bla.', '-', '2021-05-02 11:32:14', 'accepted', 'ss', '2021-05-06 07:18:33'),
('K-060521-003-285', 3, 'erwin@gmail.com', 'tes arsip komplain 2', 'pengujian fitur arsip komplain nomor 2 dengan akun karyawan erwing.', '-', '2021-05-06 04:02:15', 'rejected', 'komplain ditolak. mohon ikuti tata cara penggunaan fitur agar fungsi bisa berjalan dengan benar', '2021-05-06 04:18:55'),
('K-060521-004-186', 4, 'billy@gantx.com', 'tes arsip komplain 1', 'pengujian fitur arsip komplain dari akun admin billy the kid.', '1620291388_6e1c76cd5a9168729744.png', '2021-05-06 03:56:28', 'accepted', 'komplain diterima. kami sedang memproses permasalahannya', '2021-05-06 04:09:26'),
('K-170521-030-601', 30, 'erwin1@gmail.com', 'Test Coyyy Komplain', 'Wowww', '1621268620_ed16810d501a62572fed.jpg', '2021-05-17 11:23:40', 'accepted', 'Wuwww', '2021-05-17 11:34:44'),
('K-180521-069-342', 69, 'alfhaff@invenbar.ac.id', 'Test', 'Woww', '1621321703_2fefa39830d044b07d6d.jpg', '2021-05-18 02:08:23', 'rejected', 'Test', '2021-05-18 02:08:41');

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
(1, 1, 'C123S43', 'Sabun Mandi', 150, 'Cair', 'C', 8000, 1),
(2, 0, 'G123S32', 'Antangin JRG', 65, 'Minyak', 'A', 300, 20),
(3, 0, '', 'sikat wc', 44, 'Padat', 'D', 0, 1.2),
(4, 0, '', 'Pepsodent 102gr', 44, 'Cair', 'A', 0, 0),
(5, 0, '', 'Dodo Mainanmu', -3, 'Padat', 'C', 0, 0),
(8, 0, '', 'Mentari SimCard', 80, 'Padat', 'A', 0, 0),
(9, 0, '', 'Solonensi Ajaib', 33, 'Cair', 'C', 0, 0),
(10, 0, '', 'Bearbrando 210ml', 22, 'Cair', 'B', 0, 0),
(15, 0, '', 'So Clean 320ml', 82, 'Cair', 'C', 0, 0),
(16, 0, '', 'Betadine', 30, 'Cair', 'B', 0, 0),
(17, 0, '', 'Baterai ABC 80gr', 33, 'Padat', 'B', 0, 0),
(21, 0, '', 'Sikat Gigih', 44, 'Mudah Terbakar', 'F', 0, 0),
(22, 0, '', 'Dodo Sakti', 44, 'Minyak', 'D', 0, 0),
(23, 0, '', 'Mixin 210ml', 12, 'Cair', 'C', 0, 0),
(24, 0, '', 'Madu Kuat 210ml', 15, 'Mudah Terbakar', 'C', 0, 0),
(26, 0, '', 'Soda Gembira 210ml', 39, 'Cair', 'D', 0, 0),
(27, 0, '', 'Minyak Pijat 210ml', 100, 'Minyak', 'D', 0, 0),
(28, 0, '', '&lt;div class=&quot;btn btn-success&quot;&gt;&lt;/div&gt;', 22, 'Padat', 'A', 0, 0),
(30, 0, '', 'Adem Sari 10gr', 20, 'Padat', 'E', 0, 0),
(31, 0, '', 'Sosis Sonice', 200, 'Daging', 'G', 0, 0),
(32, 0, '', 'Karbol69', 100, 'Mudah Terbakar', 'F', 0, 0);

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
('K-020521-004-229', 4, 'billy@gantx.com', 'Fotonya menjadi blur', 'asda;sldkals aksdnalkdnal askdk', '-', '2021-05-02 10:56:34'),
('K-060521-029-780', 29, 'billy@gantx.com', 'Jam ku hilang', 'Woy !', '1620303698_f811c1c18114110d8994.jpg', '2021-05-06 07:21:38');

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
(1, '2021-05-20 02:25:35', 'Ajax Wooiii', 'Ajax Sangat Menyenangkan..', 69),
(2, '2011-05-14 21:25:05', 'Kunjungan Tamu Pt. Abstrak 22 Mei 2021', 'harap tenang\r\nharap tenang\r\nharap tenang', 8),
(3, '2011-01-02 22:11:08', 'Panduan Dalam Mengoperasikan Mesin DHFD-222', '1. test\r\n2. test\r\n3. test\r\nselesai', 69),
(4, '2021-05-19 09:24:53', '4132124werased', 'Yahaha Hayuk', 29),
(5, '2021-05-19 09:25:06', 'Jadwal Supplier Masuk Mei 2027', 'Yahaha Hayoek :v', 29),
(39, '2021-05-19 08:17:43', 'Rahmat Nur Hidayar', 'Yahahaha wahyus', 8),
(40, '2021-05-20 02:26:03', 'Mantap Cuy Ubah', 'Hay Zionis Lucknud', 69),
(41, '2021-05-19 08:52:12', 'Ajax Edit Test', 'Ajax is FUN', 8),
(42, '2021-05-19 09:49:41', 'Yahaha Wahyu A', 'Ajax Ajax', 29),
(43, '2021-05-19 09:05:20', '', '', 8),
(44, '2021-05-19 09:11:16', 'Ajax Edit Test', 'Ajax is FUN', 8),
(45, '2021-05-19 09:22:35', 'Jadwal Supplier Masuk Mei 2027', 'FFFFFFFFFFFFF', 29),
(46, '2021-05-19 09:49:10', 'Ajax Tambah, Edit CLEAR', 'CLEAR AT 21:49 ', 29),
(47, '2021-05-20 02:28:15', 'Aku sayang kamu...', 'Wahai jodoh yang kutunggu2.. :v', 69),
(48, '2021-05-21 08:07:51', 'Aku sayang kamu...', 'Wahai jodoh yang kutunggu2.. :v', 69),
(49, '2021-05-20 02:28:16', 'Aku sayang kamu...', 'Wahai jodoh yang kutunggu2.. :v', 69);

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
(5, 3, 29, 0, 'Belum Dilihat', '2021-05-20 20:08:42'),
(6, 2, 8, 0, 'Belum Dilihat', '2021-05-20 20:08:45'),
(7, 2, 8, 0, 'Belum Dilihat', '2021-05-20 20:20:15'),
(8, 0, 8, 0, 'Belum Dilihat', '2021-05-18 21:24:30');

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
(1, 'Adielya Moline', 'adeline@gmail.com', '$2y$10$mGZwaegr6mQkD03k1KBLoeXoeRvm2JVr3jEs2WWZopUCZIyGnlO7O', 0, 'adeline.jpg', 'Information Technology', 'Female'),
(8, 'Nikola Tesla', 'tesla@gmail.com', '$2y$10$NHGv1T3eNUlnNfPjlgCiB.npk/.9o8.B5lwZ2QiHcPsTA6r/Q9XH2', 0, 'keqing.jpg', 'Dokumentasi Aset', 'Male'),
(22, 'Daemon Yukata', 'yukatadae@gmail.com', '$2y$10$XNRdXAxp7x8XXSGZWMs8Se9kvQPNnI63FVu3zQMO2mDo0fNbqa/gG', 0, 'yukata.jpg', 'Warehouse', 'Male'),
(29, 'Billy Gate', 'billy@gantx.com', '$2y$10$ffptJql9WmysGHENlyUile/blayl4iLAvyvMRZd.9g2TaySULlfIG', 0, '1618827218_5cf23f7330b26292409a.jpg', 'Human Resource', 'Male'),
(30, 'Erwin Edith', 'erwin1@gmail.com', '$2y$10$xhULUdOUhwxBH1hCwrUoPeImopBifkkAeXwmD7NVg6uIV5HNiCYiy', 1, 'erwin.jpg', 'Inventarisasi Aset', 'Male'),
(41, 'Makinami', 'makinami@gmail.com', '$2y$10$bs0KTnI2k1M8BMw8onU8C.frt28siCF5talRoKMTjotz4kOehkFSG', 1, 'makinami.jpg', 'Spesifikasi Aset', 'Female'),
(47, 'Einstein', 'einstein@gmail.com', '$2y$10$qkWqu1ODqi.744EeV3Re3OqBtLYnH8wxD4csHrJEylRU1jp.Ppgqi', 1, '1621160514_e284552c0c826a53b21a.jpg', 'Dokumentasi Aset', 'Male'),
(53, 'Serline Claudya', 'serline@gmail.com', '$2y$10$ba3UBtfBOTOH5eDquRNZsOIBiYgOVq83WDbb2CXE3WhjJy.kAzTN.', 1, 'serline.jpg', 'Information Technology', 'Female'),
(69, 'Alfha Fierly Firdaus', 'alfhaff@invenbar.ac.id', '$2y$10$wc851oFM4IwkxFJayGWyLuWuu4e2HImDwVaPD6MlWKUGnqp8u0eVG', 0, 'alfha.jpg', 'Dewan Direksi', 'Male'),
(73, 'Tasya Anastasya Mufida', 'tasyamufida@gmail.com', '$2y$10$lWgQ/EmPhz1G5vo.QXEAm.n8ac.21PZUgZV0zx4Tks2zASTH5TTya', 0, 'tasyamufida.jpg', 'Dewan Direksi', 'Female');

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
-- Indeks untuk tabel `alur_barang_visibility`
--
ALTER TABLE `alur_barang_visibility`
  ADD PRIMARY KEY (`id_visibility`);

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
  MODIFY `id_absen` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `alur_barang_visibility`
--
ALTER TABLE `alur_barang_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `komplain_visibility`
--
ALTER TABLE `komplain_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `pengumuman_visibility`
--
ALTER TABLE `pengumuman_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_aktivitas` int(7) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
