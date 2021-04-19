-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 08:52 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(7) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `picture` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `nama`, `email`, `password`, `role`, `picture`) VALUES
(1, 'Admin Zero', 'saber.genshin@gmail.com', '$2y$10$QXi1weaBbKVPYI4/0pyAiuFpv9cB7dFOhHAhjU4HLCdOHSpyG/ZP.', 0, 'venti.jpg'),
(8, 'Pekerja 0', 'wangy.genshin@gmail.com', '$2y$10$FNpnGwUIbeXn066yNh2Y2OOieRJxWfeX.1jx.LTwrVSkGyoWMiAD6', 1, 'keqing.jpg'),
(29, 'Billy Gants', 'billy@gantx.com', '$2y$10$ffptJql9WmysGHENlyUile/blayl4iLAvyvMRZd.9g2TaySULlfIG', 0, '1618827218_5cf23f7330b26292409a.jpg'),
(30, 'Erwin', 'erwin@gmail.com', '$2y$10$OhMatXBOfCx3j.rwVuojX.LyAxca5xL2dZ0hRZmAWjzqff91RJ4Wu', 1, '1618827593_95cd59644ec1a22322d8.jpg'),
(35, 'Pekerja Dummy', 'pd@gmail.com', '$2y$10$6zYEY3RyNh1OxYOZU8QRi.o9dCOn5dAChZUU87g0RhIuW.ZjC17/6', 1, 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
