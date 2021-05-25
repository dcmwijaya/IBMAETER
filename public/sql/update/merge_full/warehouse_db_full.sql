-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2021 pada 03.58
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

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id_item`, `id_supplier`, `kode_barang`, `nama_item`, `stok`, `jenis`, `penyimpanan`, `harga`, `berat`) VALUES
(1, 2, 'XX051', 'Sosis Sonice', 300, 'Daging', 'A', 21000, 432),
(2, 15, 'B021', 'Ultra Milk Jumbo', 102, 'Cair', 'B', 112000, 250),
(3, 10, 'C021', 'Listerine', 350, 'Cair', 'C', 18000, 120),
(4, 3, 'XXXX2', 'Roti Sisir Mr. Bread', 300, 'Padat', 'A', 5000, 100),
(5, 11, 'XX053', 'Daging Sapi', 42, 'Daging', 'A', 130000, 200),
(6, 8, 'DXX1', 'Sikat Gigi Formula', 500, 'Padat', 'D', 12000, 50),
(7, 11, 'E031', 'Wipol Karbol Cemara', 900, 'Mudah Terbakar', 'E', 15000, 900),
(8, 7, 'G041', 'Minyak Goreng Filma', 200, 'Minyak', 'G', 210000, 8000),
(9, 10, 'F021', 'Pepsodent Pasta Gigi', 2000, 'Cair', 'F', 5000, 75),
(10, 2, 'FXX1', 'Permen Kopiko', 500, 'Padat', 'F', 7000, 150),
(11, 1, 'DXX2', 'Yaki Sushi Nori (Rumput Laut)', 400, 'Padat', 'D', 50000, 50),
(12, 6, 'E0425', 'Minyak Kayu Putih Cap Lang', 470, 'Minyak', 'E', 22000, 60),
(13, 2, 'GXX849', 'Silverqueen Coklat Piramid', 700, 'Padat', 'G', 50000, 500),
(14, 2, 'FXX54', 'Leo Sapi Panggang Keripik Kentang Snack', 700, 'Padat', 'F', 15000, 48),
(15, 1, 'GXX48', 'Lemonilo Mie Instant', 2000, 'Padat', 'G', 106500, 70),
(16, 1, 'CXX401', 'Indomie Goreng 1 Dus', 400, 'Padat', 'C', 100000, 3000),
(17, 1, 'BXX401', 'Mie Sedaap Goreng 1 Dus', 1900, 'Padat', 'B', 70000, 4500),
(18, 2, 'XX0220', 'Buavita Jus Buah Jambu', 500, 'Cair', 'A', 25000, 1300),
(19, 12, 'E02301', 'Sunkist Orange Jus', 50, 'Cair', 'E', 34000, 750),
(20, 13, 'GXX206', 'Facial Tissue Tisu Nice', 800, 'Padat', 'G', 29500, 900),
(21, 8, 'EXX2192', 'Chocolatos Dark Family Pack', 300, 'Padat', 'E', 22500, 66),
(22, 7, 'F02213', 'Blue Band Cake and Cookie Margarine Sachet', 450, 'Cair', 'F', 49700, 200),
(23, 2, 'DXX214', 'Softex Comfort Slim', 500, 'Padat', 'D', 14500, 350),
(24, 13, 'F04204', 'Kara Minyak Kelapa', 300, 'Minyak', 'F', 57000, 2000),
(25, 3, 'E04300', 'Minyak Wijen Oh Guan Hing', 560, 'Minyak', 'E', 27500, 100),
(26, 14, 'D041', 'Minyak Goreng Bimoli', 600, 'Minyak', 'D', 28000, 2100),
(27, 13, 'C0412', 'Minyak Goreng Sunco', 800, 'Minyak', 'C', 30000, 2100),
(28, 11, 'E05400', 'Premium Saikoro Wagyu Cubes Beef Meltic Pack', 300, 'Daging', 'E', 72000, 500),
(29, 2, 'XX05208', 'Ayam Kampung Segar Fresh', 500, 'Daging', 'A', 60000, 700),
(30, 10, 'XX0526', 'Ikan Salmon Norwegian Premium Fillet Fresh', 250, 'Daging', 'A', 29900, 100),
(31, 11, 'B05234', 'Fresh Daging Giling Ikan Tenggiri Papan', 500, 'Daging', 'B', 105000, 100),
(32, 11, 'F05231', 'Ikan Kakap Merah Fillet (Red Snapper)', 200, 'Daging', 'F', 87500, 500),
(33, 11, 'E05123', 'Fresh Kepiting Bakau', 50, 'Daging', 'E', 165000, 100),
(34, 13, 'B05500', 'Cumi Tube Kupas Bersih Segar Beku Kualitas Premium Super', 700, 'Daging', 'B', 47000, 100),
(35, 13, 'F0510', 'Cumi Ring Frozen', 220, 'Daging', 'F', 37500, 500),
(36, 13, 'F05500', 'Frozen Canadian Lobster Canada Udang Lobster Capit Import', 50, 'Daging', 'F', 695000, 500),
(37, 3, 'C03212', 'Baterai Remote ABC', 400, 'Mudah Terbakar', 'C', 5500, 200),
(38, 3, 'B03100', 'Baterai Alkalin', 500, 'Mudah Terbakar', 'B', 10500, 50),
(39, 14, 'B03203', 'Parfum Hugo Boss The Scent Edt Man', 350, 'Mudah Terbakar', 'B', 900000, 500),
(40, 10, 'XX03250', 'Original Parfum Jaguar Classic Gold', 200, 'Mudah Terbakar', 'A', 205000, 500),
(41, 11, 'G032030', 'Evangeline Sakura Black Sakura Eau De Parfum', 255, 'Mudah Terbakar', 'G', 25500, 350),
(42, 15, 'DXX12000', 'Boneeto Coklat', 475, 'Padat', 'D', 53000, 750),
(43, 6, 'XX02210', 'Good Day Rasa Moccachino', 250, 'Cair', 'A', 5000, 250),
(44, 6, 'E02109', 'Good Day Coffee Cappuccino', 225, 'Cair', 'E', 5000, 250),
(45, 6, 'DXX45', 'Beng Beng Drink', 100, 'Padat', 'D', 15500, 375),
(46, 1, 'DXX700', 'Biskuit &amp; Wafer Beng Beng Box', 500, 'Padat', 'D', 27500, 800),
(47, 5, 'EXX212', 'Sido Muncul Vitamin D3 400 + Vitamin E 100 IU Soft Capsule', 600, 'Padat', 'E', 171475, 700),
(48, 5, 'E02123', 'Minyak Telon Tiga', 140, 'Cair', 'E', 42000, 500),
(49, 5, 'CXX127', 'Fatraper', 130, 'Padat', 'C', 62000, 120),
(50, 5, 'CXX3001', 'Ramuan Minuman Tradisional TeJamu Kesehatan Daya Tahan Tubuh', 100, 'Padat', 'C', 12000, 250),
(51, 2, 'XX052', 'Sosis Sonice Spesial', 300, 'Daging', 'A', 70000, 432),
(52, 15, 'B022', 'Ultra Milk Jumbo Spesial', 102, 'Cair', 'B', 200000, 250),
(53, 10, 'C022', 'Listerine Spesial', 350, 'Cair', 'C', 30000, 120),
(54, 3, 'XXXX3', 'Roti Sisir Mr. Bread Spesial', 300, 'Padat', 'A', 7000, 100),
(55, 11, 'XX054', 'Daging Sapi Spesial', 42, 'Daging', 'A', 240000, 200),
(56, 8, 'DXX2', 'Sikat Gigi Formula Spesial', 500, 'Padat', 'D', 18000, 50),
(57, 11, 'E032', 'Wipol Karbol Cemara Spesial', 900, 'Mudah Terbakar', 'E', 28000, 900),
(58, 7, 'G042', 'Minyak Goreng Filma Spesial', 200, 'Minyak', 'G', 180000, 8000),
(59, 10, 'F022', 'Pepsodent Pasta Gigi Spesial', 2000, 'Cair', 'F', 7000, 75),
(60, 2, 'FXX2', 'Permen Kopiko Spesial', 500, 'Padat', 'F', 10000, 150),
(61, 1, 'DXX3', 'Yaki Sushi Nori (Rumput Laut) Spesial', 400, 'Padat', 'D', 80000, 50),
(62, 6, 'E0426', 'Minyak Kayu Putih Cap Lang Spesial', 470, 'Minyak', 'E', 40000, 60),
(63, 2, 'GXX850', 'Silverqueen Coklat Piramid Spesial', 700, 'Padat', 'G', 80000, 500),
(64, 2, 'FXX55', 'Leo Sapi Panggang Keripik Kentang Snack Spesial', 700, 'Padat', 'F', 28000, 48),
(65, 1, 'GXX49', 'Lemonilo Mie Instant Spesial', 2000, 'Padat', 'G', 130000, 70),
(66, 1, 'CXX402', 'Indomie Goreng 1 Dus Spesial', 400, 'Padat', 'C', 135000, 3000),
(67, 1, 'BXX403', 'Mie Sedaap Goreng 1 Dus Spesial', 1900, 'Padat', 'B', 130000, 4500),
(68, 2, 'XX0221', 'Buavita Jus Buah Jambu Spesial', 500, 'Cair', 'A', 18000, 1300),
(69, 12, 'E02302', 'Sunkist Orange Jus Spesial', 50, 'Cair', 'E', 50000, 750),
(70, 13, 'GXX208', 'Facial Tissue Tisu Nice Spesial', 800, 'Padat', 'G', 98000, 900),
(71, 8, 'EXX2198', 'Chocolatos Dark Family Pack Spesial', 300, 'Padat', 'E', 40000, 66),
(72, 7, 'F02216', 'Blue Band Cake and Cookie Margarine Sachet Spesial', 450, 'Cair', 'F', 90000, 200),
(73, 2, 'DXX217', 'Softex Comfort Slim Spesial', 500, 'Padat', 'D', 20000, 350),
(74, 13, 'F04211', 'Kara Minyak Kelapa Spesial', 300, 'Minyak', 'F', 100000, 2000),
(75, 3, 'E043012', 'Minyak Wijen Oh Guan Hing Spesial', 560, 'Minyak', 'E', 50000, 100),
(76, 14, 'D042', 'Minyak Goreng Bimoli Spesial', 600, 'Minyak', 'D', 48000, 2100),
(77, 13, 'C0415', 'Minyak Goreng Sunco Spesial', 800, 'Minyak', 'C', 50000, 2100),
(78, 11, 'E05402', 'Premium Saikoro Wagyu Cubes Beef Meltic Pack Spesial', 300, 'Daging', 'E', 138000, 500),
(79, 2, 'XX05204', 'Ayam Kampung Segar Fresh Spesial', 500, 'Daging', 'A', 110000, 700),
(80, 10, 'XX05210', 'Ikan Salmon Norwegian Premium Fillet Fresh Spesial', 250, 'Daging', 'A', 25000, 100),
(81, 11, 'B052467', 'Fresh Daging Giling Ikan Tenggiri Papan Spesial', 500, 'Daging', 'B', 180000, 100),
(82, 11, 'F052312', 'Ikan Kakap Merah Fillet (Red Snapper) Spesial', 200, 'Daging', 'F', 168000, 500),
(83, 11, 'E051245', 'Fresh Kepiting Bakau Spesial', 50, 'Daging', 'E', 300000, 100),
(84, 13, 'B055012', 'Cumi Tube Kupas Bersih Segar Beku Kualitas Premium Super Spesial', 700, 'Daging', 'B', 88000, 100),
(85, 13, 'F05102', 'Cumi Ring Frozen Spesial', 220, 'Daging', 'F', 70000, 500),
(86, 13, 'F05510', 'Frozen Canadian Lobster Canada Udang Lobster Capit Import Spesial', 50, 'Daging', 'F', 1350000, 500),
(87, 3, 'C03250', 'Baterai Remote ABC Spesial', 400, 'Mudah Terbakar', 'C', 7000, 200),
(88, 3, 'B03120', 'Baterai Alkalin Spesial', 500, 'Mudah Terbakar', 'B', 18000, 50),
(89, 14, 'B03220', 'Parfum Hugo Boss The Scent Edt Man Spesial', 350, 'Mudah Terbakar', 'B', 1200000, 500),
(90, 10, 'XX03100', 'Original Parfum Jaguar Classic Gold Spesial', 200, 'Mudah Terbakar', 'A', 380000, 500),
(91, 11, 'G032300', 'Evangeline Sakura Black Sakura Eau De Parfum Spesial', 255, 'Mudah Terbakar', 'G', 42500, 350),
(92, 15, 'DXX12200', 'Boneeto Coklat Spesial', 475, 'Padat', 'D', 80000, 750),
(93, 6, 'XX022120', 'Good Day Rasa Moccachino Spesial', 250, 'Cair', 'A', 7000, 250),
(94, 6, 'E021090', 'Good Day Coffee Cappuccino Spesial', 225, 'Cair', 'E', 7000, 250),
(95, 6, 'DXX450', 'Beng Beng Drink Spesial', 100, 'Padat', 'D', 25000, 375),
(96, 1, 'DXX750', 'Biskuit &amp; Wafer Beng Beng Box Spesial', 500, 'Padat', 'D', 48000, 800),
(97, 5, 'EXX210', 'Sido Muncul Vitamin D3 400 + Vitamin E 100 IU Soft Capsule Spesial', 600, 'Padat', 'E', 300000, 700),
(98, 5, 'E02135', 'Minyak Telon Tiga Spesial', 140, 'Cair', 'E', 75000, 500),
(99, 5, 'CXX130', 'Fatraper Spesial', 130, 'Padat', 'C', 100000, 120),
(100, 5, 'CXX3028', 'Ramuan Minuman Tradisional TeJamu Kesehatan Daya Tahan Tubuh Spesial', 100, 'Padat', 'C', 18000, 250);

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
(1, '2021-05-25 07:57:43', 'Agenda Rapat Bulanan (Mei 2021)', 'Lokasi : Ruang Meeting\r\nWaktu : Rabu, 26 - 05 - 2021\r\nPukul : 07.00 - selesai', 69),
(2, '2021-05-25 08:11:59', 'Liburan Bulanan (Mei 2021)', 'Menurut koordinasi rapat dewan direksi, agenda liburan bulanan kali ini bisa dilaksanakan pada akhir bulan Mei.', 73),
(3, '2021-05-25 08:14:11', 'Komplain Pekerja (2021)', 'Segala bentuk komplain mohon dilakukan dengan menjunjung tinggi etika ketika berargumen, lalu juga menunjukkan bukti.', 73),
(4, '2021-05-25 08:16:19', 'Perizinan Barang (2021)', 'Pekerja harap bersabar ketika melakukan request pemasukkan / pengeluaran barang, kami perlu meninjau dengan teliti dan akan memberikan respon sesuai keadaan yang sebenarnya.', 69),
(5, '2021-05-25 08:17:56', 'Aktivitas Pekerja (2021)', 'Pastikan anda semua tidak lupa untuk absensi dan jangan pernah melakukan upaya penipuan kepada atasan, karna kegiatan anda di website dapat kami pantau secara realtime.', 69);

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
  MODIFY `id_absen` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `alur_barang`
--
ALTER TABLE `alur_barang`
  MODIFY `no_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `alur_barang_visibility`
--
ALTER TABLE `alur_barang_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengumuman_visibility`
--
ALTER TABLE `pengumuman_visibility`
  MODIFY `id_visibility` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
