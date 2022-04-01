-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 07:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sl2`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `namaDepan` varchar(20) NOT NULL,
  `namaTengah` varchar(20) NOT NULL,
  `namaBelakang` varchar(20) NOT NULL,
  `tempatLahir` varchar(20) NOT NULL,
  `tglLahir` date NOT NULL,
  `nik` char(16) NOT NULL,
  `wargaNegara` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `noHp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `kodePos` char(5) NOT NULL,
  `fotoProfil` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`namaDepan`, `namaTengah`, `namaBelakang`, `tempatLahir`, `tglLahir`, `nik`, `wargaNegara`, `email`, `noHp`, `alamat`, `kodePos`, `fotoProfil`, `username`, `password`) VALUES
('COba', 'Aka', 'AJa', 'KalimatanBarat', '1999-08-06', '1546897856320156', 'Indonesia', 'hello@trash-mail.com', '089616460055', 'apel no5, kalimantan barat', '36132', './uploadFiles/messageImage_1647348500155', 'cobaaja', '$2y$10$k38SmSJMFFl9lJFB.B06j.VNBqrC2WBBb.wg9CZSq53I/koQ4lBMW'),
('Frederic', 'DIUPDATE', 'Setievi', 'Jakarta', '2002-01-17', '1574125698239999', 'Singapura', 'fredericsetievi@gmail.com', '08961649999', 'Orchard road, Singapore', '39999', './uploadFiles/1648485561090.png', 'frederic', '$2y$10$jae8gm6H6NhmYm1HmrL.YuQsifXsG8/nXN72Rd6ihehGHtSF7ct.q'),
('Irene', 'Iren', 'Setievi', 'jambi', '2005-08-08', '1546565656565656', 'Indonesia', 'fredericsetievi@gmail.com', '089616406600', 'kutilang', '31652', './uploadFiles/SDLC.png', 'irenesetievi', '$2y$10$FBDH2VRq2vhjeGb1kYXFg.sZCt7zWTn91W/JoNHNzACToPulMqWfS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
