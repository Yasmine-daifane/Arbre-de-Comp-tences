-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 05:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prototype2`
--

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `CNE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`Id`, `Nom`, `CNE`) VALUES
(1, 'amine lamchatab', 'P134500206'),
(4, 'yassin lamchatab', NULL),
(5, 'bakkali mohammed', 'P134500102'),
(8, 'hamid achaou', 'K123456789'),
(10, 'ait lhssen mohammed', 'Q134500206'),
(12, 'Ronaldo', 'X123456789'),
(14, 'leo messi', 'H123456789'),
(20, 'jalil betroji', 'P987654321'),
(21, 'amina assaid', 'P456123789'),
(22, 'Vinícius', 'B123456789');

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `personneId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`id`, `Ville`, `personneId`) VALUES
(1, 'Tanger', 1),
(2, 'Tanger', 4),
(3, 'Tanger', 5),
(4, 'Agadir', 8),
(6, 'Casablanca', 10),
(7, 'Rosario', 14),
(8, 'Funchal', 12),
(9, 'Tetouan', 20),
(10, 'Tanger', 21),
(11, 'Sao Paulo', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UQ_CNE_Stagiaire` (`CNE`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ville_ibfk_1` (`personneId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`personneId`) REFERENCES `personne` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
