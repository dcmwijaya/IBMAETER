-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 04:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
('K-020521-003-194', 3, 'erwin@gmail.com', 'Lembur bagai quda', 'permaslahan pada alur data dari manejer ke pegawai dan sebaliknya. bla bla bla.', '-', '2021-05-02 11:32:14'),
('K-020521-004-229', 4, 'billy@gantx.com', 'Fotonya menjadi blur', 'asda;sldkals aksdnalkdnal askdk', '-', '2021-05-02 10:56:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`no_komplain`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
