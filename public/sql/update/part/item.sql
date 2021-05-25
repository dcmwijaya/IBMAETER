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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
