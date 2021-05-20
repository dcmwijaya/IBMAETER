-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 10:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
  `waktu_komen` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
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

-- --------------------------------------------------------

--
-- Table structure for table `alur_barang`
--

CREATE TABLE `alur_barang` (
  `no_log` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `request` enum('Masuk','Keluar') NOT NULL COMMENT 'Awas dengan trigger!',
  `status` enum('Pending','Diterima','Ditolak') NOT NULL,
  `ubah_stok` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alur_barang`
--

INSERT INTO `alur_barang` (`no_log`, `uid`, `tgl`, `nama_barang`, `request`, `status`, `ubah_stok`, `ket`) VALUES
(8, 41, '2021-05-17 02:57:25', 'Mentari SimCard 20GB/Bulan', 'Masuk', 'Ditolak', 500, 'cek trigger dec=&gt;masuk\r\n'),
(31, 29, '2021-05-16 06:25:42', 'Soda Gembira 210ml', 'Masuk', 'Diterima', 6, 'Save Palestina'),
(32, 29, '2021-05-16 06:52:42', 'Dodo Mainanmu', 'Masuk', 'Ditolak', 13, 'Admin : Billy Gate\r\nBensin Abis'),
(36, 29, '2021-05-16 07:11:35', 'Mixin 210ml', 'Masuk', 'Diterima', 46, 'We Stand With Palestine!'),
(39, 8, '2021-05-17 02:24:50', 'So Clean 320ml', 'Masuk', 'Diterima', 100, 'Tes Count Notifs Berhasil\r\n'),
(46, 8, '2021-05-17 02:56:35', 'Adem Sari 10gr', 'Masuk', 'Diterima', 500, 'cek trigger acc=&gt;masuk'),
(51, 8, '2021-05-17 03:06:29', 'Adem Sari 10gr', 'Keluar', 'Diterima', 30, 'cek trigger acc=&gt;keluar'),
(52, 30, '2021-05-17 03:07:21', 'Minyak Pijat 210ml', 'Keluar', 'Ditolak', 30, 'cek trigger dec=&gt;keluar'),
(54, 30, '2021-05-17 08:07:57', 'Madu Kuat 210ml', 'Masuk', 'Diterima', 55, 'Terverifikasi !'),
(55, 41, '2021-05-17 18:53:00', 'Mentari SimCard 20GB/Bulan', 'Keluar', 'Pending', 20, 'FF'),
(56, 30, '2021-05-17 18:56:00', 'El Perfume de cologne 150ml', 'Masuk', 'Pending', 60, 'Tolak Impresialisme'),
(57, 41, '2021-05-17 20:02:00', 'Bearbrando 210ml', 'Masuk', 'Pending', 92, 'Cek Pekerja');

--
-- Triggers `alur_barang`
--
DELIMITER $$
CREATE TRIGGER `stok_dinamis` AFTER UPDATE ON `alur_barang` FOR EACH ROW BEGIN
IF(new.`status`="Diterima") THEN
IF (new.`request`="Masuk") THEN
	UPDATE `item` SET `item`.`stok` = `item`.`stok` + new.`ubah_stok`
	WHERE `item`.`nama_item` = new.`nama_barang`;
ELSEIF(new.`request`="Keluar") THEN
UPDATE `item` SET `item`.`stok` = `item`.`stok` - new.`ubah_stok`
	WHERE `item`.`nama_item` = new.`nama_barang`;
    END IF;
    END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `alur_barang_visibility`
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
-- Table structure for table `arsip_komplain`
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
-- Dumping data for table `arsip_komplain`
--

INSERT INTO `arsip_komplain` (`no_arsipKomp`, `uid_arsipKomp`, `email_arsipKomp`, `judul_arsipKomp`, `isi_arsipKomp`, `foto_arsipKomp`, `waktu_arsipKomp`, `status_arsipKomp`, `comment_arsipKomp`, `commented_at`) VALUES
('K-020521-003-194', 3, 'erwin@gmail.com', 'Lembur bagai quda', 'permaslahan pada alur data dari manejer ke pegawai dan sebaliknya. bla bla bla.', '-', '2021-05-02 11:32:14', 'accepted', 'ss', '2021-05-06 07:18:33'),
('K-060521-003-285', 3, 'erwin@gmail.com', 'tes arsip komplain 2', 'pengujian fitur arsip komplain nomor 2 dengan akun karyawan erwing.', '-', '2021-05-06 04:02:15', 'rejected', 'komplain ditolak. mohon ikuti tata cara penggunaan fitur agar fungsi bisa berjalan dengan benar', '2021-05-06 04:18:55'),
('K-060521-004-186', 4, 'billy@gantx.com', 'tes arsip komplain 1', 'pengujian fitur arsip komplain dari akun admin billy the kid.', '1620291388_6e1c76cd5a9168729744.png', '2021-05-06 03:56:28', 'accepted', 'komplain diterima. kami sedang memproses permasalahannya', '2021-05-06 04:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(4) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `kode_barang` text NOT NULL COMMENT '[1]~ = alfabet tempat penyimpanan \r\n[2]~[3] = no Kategori\r\n[4]~[8] = no produksi',
  `nama_item` varchar(99) NOT NULL,
  `stok` int(4) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `penyimpanan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL COMMENT 'IDR only',
  `berat` float NOT NULL COMMENT 'gr/item'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `id_supplier`, `kode_barang`, `nama_item`, `stok`, `jenis`, `penyimpanan`, `harga`, `berat`) VALUES
(1, 1, 'B034343', 'Sabun Mandieh', 132, 'Cair', 'B', 8000, 320),
(2, 2, 'A044344', 'Antangin JRG', 119, 'Minyak', 'A', 4500, 200),
(3, 4, 'D014345', 'Sikat WC ARG Medium', 44, 'Padat', 'D', 15000, 500),
(4, 1, 'A034346', 'Pepsodent 220gr', 44, 'Cair', 'A', 12000, 220),
(5, 2, 'C014347', 'Dodo Mainanmu', 48, 'Padat', 'C', 32000, 300),
(8, 3, 'A014348', 'Mentari SimCard 20GB/Bulan', 280, 'Padat', 'A', 80000, 100),
(9, 2, 'C034349', 'Solonensi Ajaib Herbal', 33, 'Cair', 'C', 4000, 120),
(10, 2, 'B034350', 'Bearbrando 210ml', 22, 'Cair', 'B', 7500, 220),
(15, 4, 'C034351', 'So Clean 320ml', 270, 'Cair', 'C', 14000, 370),
(16, 4, 'B034352', 'Betadine 60ml', 81, 'Cair', 'B', 8000, 120),
(17, 3, 'B014353', 'Baterai ABC 80gr', 110, 'Padat', 'B', 12000, 40),
(21, 1, 'F024354', 'Sikat Gigi B', 44, 'Mudah Terbakar', 'F', 8000, 135),
(22, 3, 'D014355', 'Coklat Atlantis S', 44, 'Padat', 'D', 5000, 158),
(23, 5, 'C034356', 'Mixin 210ml', 104, 'Cair', 'C', 65000, 197),
(24, 5, 'C024357', 'Madu Kuat 210ml', 125, 'Mudah Terbakar', 'C', 25000, 400),
(26, 2, 'D034358', 'Soda Gembira 210ml', 45, 'Cair', 'D', 10000, 550),
(27, 5, 'D044359', 'Minyak Pijat 210ml', 60, 'Minyak', 'D', 7800, 250),
(28, 6, 'A014360', 'El Perfume de cologne 150ml', 22, 'Padat', 'A', 89000, 300),
(30, 6, 'E014361', 'Adem Sari 10gr', 1239, 'Padat', 'E', 2500, 24),
(31, 0, '', 'Awutan Sakura A', 50, 'Mudah Terbakar', 'G', 0, 0),
(32, 0, 'DMinyak363', 'Saus BBK Pedas ', 40, 'Minyak', '', 8000, 90),
(33, 0, 'XXXX364', 'Benshol Fighter A', 150, 'Mudah Terbakar', 'D', 3000, 120);

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
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
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`no_komplain`, `uid_komplain`, `email_komplain`, `judul_komplain`, `isi_komplain`, `foto_komplain`, `waktu_komplain`) VALUES
('K-020521-001-435', 1, 'saber.genshin@gmail.com', 'tes ke 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad cupiditate at cum, recusandae maiores enim debitis similique et sapiente soluta, minus dolor. Temporibus, tempore. Id mollitia ex voluptate vero sunt.', '1619973275_831f9e7fe4ad87c90ade.png', '2021-05-02 11:34:35'),
('K-020521-004-229', 4, 'billy@gantx.com', 'Fotonya menjadi blur', 'asda;sldkals aksdnalkdnal askdk', '-', '2021-05-02 10:56:34'),
('K-060521-029-780', 29, 'billy@gantx.com', 'Jam ku hilang', 'Woy !', '1620303698_f811c1c18114110d8994.jpg', '2021-05-06 07:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `komplain_visibility`
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
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `judul` varchar(55) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `waktu`, `judul`, `isi`, `uid`) VALUES
(1, '2021-05-19 08:51:54', 'Ajax Edit Test', 'Ajax is FUN', 8),
(2, '2021-05-20 01:05:28', 'Kunjungan Tamu Pt. Abstrak 22 Mei 2021', 'harap tenang\r\nharap tenang\r\nharap tenang\r\nedited', 8),
(3, '2011-01-02 22:11:08', 'Panduan Dalam Mengoperasikan Mesin DHFD-222', '1. test\r\n2. test\r\n3. test\r\nselesai', 69),
(112, '2021-05-20 03:36:46', 'Ajax Tambah Test', 'Berhasil !', 8),
(113, '2021-05-20 03:37:11', 'Ajax Tambah Test', 'Fix Bug : Duplikat tambah Berhasil!', 8),
(114, '2021-05-20 03:46:18', 'Test AJAX 1', 'Berhasil EA', 8),
(115, '2021-05-20 03:46:24', 'Test AJAX 2', 'Berhasil CUY', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman_visibility`
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
-- Dumping data for table `pengumuman_visibility`
--

INSERT INTO `pengumuman_visibility` (`id_visibility`, `id_pengumuman`, `uid`, `role`, `status`, `waktu`) VALUES
(5, 3, 29, 0, 'Belum Dilihat', '2021-05-20 20:08:42'),
(6, 2, 8, 0, 'Belum Dilihat', '2021-05-20 20:08:45'),
(7, 2, 8, 0, 'Belum Dilihat', '2021-05-20 20:20:15'),
(8, 0, 8, 0, 'Belum Dilihat', '2021-05-18 21:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telp` char(20) NOT NULL,
  `alamat` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
(1, 'Pt. Unileper', '081222320000', 'Jl. Kemayoran Baru kec. Salatiga Jakarta Barat'),
(2, 'Pt. Snakku', '0822222222', 'Jl. Selamat Jalan kec. Barong Kota Air'),
(3, 'Pt. Entahlah ', '081222320001', 'jl. dummy master22, kec. fake, kota Mastah2'),
(4, 'Pt. NgAB tbk', '081222320002', 'jl. dummy master33, kec. fake, kota Mastah3'),
(5, 'Pt. Biasakanlah tbk', '081222320003', 'jl. dummy master44, kec. fake, kota Mastah4'),
(6, 'Pt. Membagongkan', '081222320004', 'jl. dummy master55, kec. fake, kota Mastah5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(7) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `nama`, `email`, `password`, `role`, `picture`, `department`, `gender`) VALUES
(1, 'Admin Zero', 'saber.genshin@gmail.com', '$2y$10$QXi1weaBbKVPYI4/0pyAiuFpv9cB7dFOhHAhjU4HLCdOHSpyG/ZP.', 0, 'venti.jpg', 'Information Technology', 'Female'),
(8, 'Nikola Tesla', 'tesla@gmail.com', '$2y$10$WGSFqmKE91Tj5J9XD9zWl.a66QuWLozOrXJdE80gFrQxjwfXlG2q6', 0, 'keqing.jpg', 'Dokumentasi Aset', 'Male'),
(22, 'Sri Kandhi', 'yukatadae@gmail.com', '$2y$10$XNRdXAxp7x8XXSGZWMs8Se9kvQPNnI63FVu3zQMO2mDo0fNbqa/gG', 0, 'default.jpg', 'Warehouse', 'Female'),
(29, 'Billy Gate', 'billy@gantx.com', '$2y$10$ffptJql9WmysGHENlyUile/blayl4iLAvyvMRZd.9g2TaySULlfIG', 0, '1618827218_5cf23f7330b26292409a.jpg', 'Human Resource', 'Male'),
(30, 'Erwin Schrödinger', 'erwin@gmail.com', '$2y$10$ejFPqAjB/GTlLSjqA323NO5bBYk/SlyUswJOAPh6Ojp16zSiEXtdO', 1, 'erwin.jpg', 'Inventarisasi Aset', 'Male'),
(41, 'Makinami Mari', 'makinami@gmail.com', '$2y$10$z7jEnwBvnj4/DBS.gU3f3.zgEiWXTfXZgU2Rs9/8dSiP6jX8q5IEe', 1, 'default.jpg', 'Spesifikasi Aset', 'Female'),
(47, 'Einstein', 'einstein@gmail.com', '$2y$10$qkWqu1ODqi.744EeV3Re3OqBtLYnH8wxD4csHrJEylRU1jp.Ppgqi', 1, 'einstein.jpg', 'Dokumentasi Aset', 'Male'),
(53, 'Asuka', 'Asuka@gmail.com', '$2y$10$RAe.OW6IAoNnIWBkXvMbAeHTbX8rHGCPIUl5esD2OZclnlT8DSMwu', 1, 'default.jpg', 'Information Technology', 'Male'),
(69, 'Alfha Fierly Firdaus', 'alfhaff@invenbar.ac.id', '$2y$10$eNqNZPl9poDdVMwN2c1XFeCWN2PeCTnFS8GoYQTO8YJnd6YlVvQhe', 0, 'default.jpg', 'Founder', 'Male'),
(70, 'John Doe', 'john@gmail.com', '$2y$10$uRveWJJommK8M7FGejDH7ON1.PAPVsElBuh5Tyln9dnCNS6C.s9pW', 1, '1621256841_d014a3fb65e099562e62.png', NULL, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
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
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `alur_barang`
--
ALTER TABLE `alur_barang`
  ADD PRIMARY KEY (`no_log`);

--
-- Indexes for table `alur_barang_visibility`
--
ALTER TABLE `alur_barang_visibility`
  ADD PRIMARY KEY (`id_visibility`);

--
-- Indexes for table `arsip_komplain`
--
ALTER TABLE `arsip_komplain`
  ADD PRIMARY KEY (`no_arsipKomp`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`no_komplain`);

--
-- Indexes for table `komplain_visibility`
--
ALTER TABLE `komplain_visibility`
  ADD PRIMARY KEY (`id_visibility`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `pengumuman_visibility`
--
ALTER TABLE `pengumuman_visibility`
  ADD PRIMARY KEY (`id_visibility`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `alur_barang`
--
ALTER TABLE `alur_barang`
  MODIFY `no_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `alur_barang_visibility`
--
ALTER TABLE `alur_barang_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `komplain_visibility`
--
ALTER TABLE `komplain_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `pengumuman_visibility`
--
ALTER TABLE `pengumuman_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id_aktivitas` int(7) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
