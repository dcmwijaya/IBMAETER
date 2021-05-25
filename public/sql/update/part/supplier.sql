-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2021 pada 18.28
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
