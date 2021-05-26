-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 09:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(7) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `divisi_user` int(11) DEFAULT NULL,
  `picture` varchar(256) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `nama`, `email`, `password`, `role`, `divisi_user`, `picture`, `gender`, `tanggal_lahir`) VALUES
(1, 'Nikola Tesla', 'tesla@gmail.com', '$2y$10$NHGv1T3eNUlnNfPjlgCiB.npk/.9o8.B5lwZ2QiHcPsTA6r/Q9XH2', 0, 1, 'default.jpg', 'Laki-laki', '1977-05-25'),
(74, 'John Doe', 'johndoe@gmail.com', ' ', 0, 10, 'default.jpg', 'Laki-laki', '1974-05-05'),
(75, 'Muhammad Al Fatih', 'fatih@gmail.com', ' ', 0, 2, 'default.jpg', 'Laki-laki', '1979-07-26'),
(76, 'Khalid Walid', 'khalid@gmail.com', ' ', 0, 2, 'default.jpg', 'Laki-laki', '1976-02-10'),
(77, 'Albert Einstein', 'einstein@gmail.com', '', 0, 10, 'default.jpg', 'Laki-laki', '1974-05-05'),
(78, 'Erwin Schrödinger', 'erwin@gmail.com', '$2y$10$NHGv1T3eNUlnNfPjlgCiB.npk/.9o8.B5lwZ2QiHcPsTA6r/Q9XH2', 0, 4, 'default.jpg', 'Laki-laki', '1977-05-25'),
(79, 'Allan Poe', 'allan@gmail.com', ' ', 1, 6, 'default.jpg', 'Laki-laki', '1987-01-30'),
(80, 'Paul A.M. Dirac', 'dirac@gmail.com', '$2y$10$xhULUdOUhwxBH1hCwrUoPeImopBifkkAeXwmD7NVg6uIV5HNiCYiy', 1, 5, 'default.jpg', 'Laki-laki', '1985-03-21'),
(81, 'Muhammad Ibnu', 'ibnu@gmail.com', ' ', 1, 5, 'default.jpg', 'Laki-laki', '1992-02-10'),
(82, 'Kurniawan Kuntoro', 'kukun@gmail.com', '$2y$10$ffptJql9WmysGHENlyUile/blayl4iLAvyvMRZd.9g2TaySULlfIG', 1, 8, 'default.jpg', 'Laki-laki', '1985-05-14'),
(83, 'Adielya Moline', 'adeline@gmail.com', '$2y$10$qkWqu1ODqi.744EeV3Re3OqBtLYnH8wxD4csHrJEylRU1jp.Ppgqi', 1, 7, 'default.jpg', 'Laki-laki', '1984-09-17'),
(84, 'Serline Claudya', 'serline@gmail.com', '$2y$10$ba3UBtfBOTOH5eDquRNZsOIBiYgOVq83WDbb2CXE3WhjJy.kAzTN.', 1, 6, 'default.jpg', 'Perempuan', '1989-05-14'),
(85, 'Alfha Fierly Firdaus', 'alfhaff@gmail.com', '$2y$10$wc851oFM4IwkxFJayGWyLuWuu4e2HImDwVaPD6MlWKUGnqp8u0eVG', 0, 3, 'default.jpg', 'Laki-laki', '1992-02-04'),
(86, 'Tasya Anastasya Mufida', 'tasyamufida@gmail.com', '$2y$10$lWgQ/EmPhz1G5vo.QXEAm.n8ac.21PZUgZV0zx4Tks2zASTH5TTya', 0, 1, 'default.jpg', 'Perempuan', '1994-02-02'),
(87, 'Billy Gate', 'billy@gmail.com', '$2y$10$oEZ2N2cpnzo8OsWbVYGXKuYjqFyh9wNoHEAD0OXc/cCO.kBr1KRIm', 0, 0, 'default.jpg', 'Laki-laki', '1984-05-08'),
(88, 'Jane Doe', 'janedoe@gmail.com', ' ', 1, 9, 'default.jpg', 'Perempuan', '0000-00-00'),
(89, 'Asuka Langley', 'asuka@gmail.com', ' ', 0, 2, 'default.jpg', 'Perempuan', '1995-08-24'),
(90, 'Makinami Mari', 'makinami@gmail.com', '$2y$10$bs0KTnI2k1M8BMw8onU8C.frt28siCF5talRoKMTjotz4kOehkFSG', 0, 3, 'default.jpg', 'Perempuan', '1990-01-28'),
(92, 'Budi Anwar', 'budi@gmail.com', ' ', 1, 6, 'default.jpg', 'Laki-laki', '1994-06-05'),
(93, 'Nabila Sabila', 'nabila@gmail.com', ' ', 1, 7, 'default.jpg', 'Perempuan', '1991-03-26'),
(94, 'Sophia', 'sophia@gmail.com', ' ', 1, 8, 'default.jpg', 'Perempuan', '1989-02-20'),
(95, 'Aqila Waqidah', 'aqila@gmail.com', ' ', 1, 8, 'default.jpg', 'Perempuan', '1988-02-14'),
(96, 'Wahyu', 'wahyu@gmail.com', ' ', 1, 8, 'default.jpg', 'Laki-laki', '1991-02-16'),
(97, 'Fathur Rohman', 'fathur@gmail.com', ' ', 1, 9, 'default.jpg', 'Laki-laki', '1991-04-26'),
(98, 'Cantika', 'cantika@gmail.com', '', 1, 9, 'default.jpg', 'Perempuan', '1990-05-15'),
(99, 'Ifrida Nabila', 'ifrida@gmail.com', ' ', 1, 9, 'default.jpg', 'Perempuan', '1993-02-20'),
(100, 'David Joestar', 'david@gmail.com', '', 1, 9, 'default.jpg', 'Laki-laki', '1994-05-25'),
(101, 'qqq', 'rifkyakhmad911@gmail.com', '$2y$10$S4lLu3JNtZ7K2F8MB3iAiu84Pui4iEDuJAdYcEvf4eW/cTt.Pw5Pq', 0, 1, 'default.jpg', 'Laki-laki', '2021-05-26'),
(102, 'fff', 'rifkxc@gmail.com', '$2y$10$7UotMRfbctgZZK9kSh4FFeGCuSuSIFgHOT3IufP83PwPqmy/e67uu', 0, 2, '1622037230_75166a9e82e12977fa0d.jpg', 'Laki-laki', '2021-05-26'),
(103, 'rifkya911', 'cx@gmail.com', '$2y$10$QBwHzFaMclg98pCW4ZNHb.npA35MuNCinDyNC7Fy6sI9y.FwuR75e', 0, 1, 'default.jpg', 'Laki-laki', '2021-05-26'),
(104, 'rifkya911', 'cv1@gmail.com', '$2y$10$bZTeYYc4vcfVUyrcrGpb4OgPFTB2LDNJ9jeE.zXHAX7K8rSr.dv2u', 0, 3, '1622037550_6e1ded068646cf71ffd5.jpg', 'Laki-laki', '2021-05-26'),
(105, 'rifkya911', 'sdd911@gmail.com', '$2y$10$0XwDQb.gsioR4khSMMCvyONjoxYGtdCyX6ZnRzG8kh7IKgY4YoHJ.', 0, 8, '1622037819_b141b00d72e0d792ce5a.jpg', 'Perempuan', '2021-05-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
