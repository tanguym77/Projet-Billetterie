-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-marmier-tanguy.alwaysdata.net
-- Generation Time: Mar 21, 2024 at 06:23 PM
-- Server version: 10.6.16-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marmier-tanguy_db_billetterie`
--
CREATE DATABASE IF NOT EXISTS `marmier-tanguy_db_billetterie` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `marmier-tanguy_db_billetterie`;

-- --------------------------------------------------------

--
-- Table structure for table `billets`
--

CREATE TABLE `billets` (
  `id_billet` int(11) NOT NULL,
  `prix` float DEFAULT NULL,
  `id_evenement` int(11) NOT NULL,
  `id_zone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billets`
--

INSERT INTO `billets` (`id_billet`, `prix`, `id_evenement`, `id_zone`) VALUES
(157, 50, 3, 1),
(158, 50, 3, 1),
(159, 50, 3, 1),
(160, 50, 3, 1),
(161, 50, 3, 1),
(162, 60, 3, 2),
(163, 60, 3, 2),
(164, 60, 3, 2),
(165, 60, 3, 2),
(166, 60, 3, 2),
(167, 60, 3, 2),
(168, 45, 4, 1),
(169, 45, 4, 1),
(170, 45, 4, 1),
(171, 45, 4, 1),
(172, 65, 4, 2),
(173, 65, 4, 2),
(174, 65, 4, 2),
(175, 65, 4, 2),
(176, 65, 4, 2),
(177, 65, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `equipes`
--

CREATE TABLE `equipes` (
  `id_equipe` int(11) NOT NULL,
  `nom_equipe` varchar(50) NOT NULL,
  `photo_equipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipes`
--

INSERT INTO `equipes` (`id_equipe`, `nom_equipe`, `photo_equipe`) VALUES
(1, 'Jordan', 'Jordan.png'),
(2, 'Qatar', 'Qatar.png'),
(3, 'Australie', 'Australie.png'),
(4, 'Japon', 'Japon.png'),
(17, 'France', 'France.png'),
(19, 'Iran', 'Iran.jpg'),
(20, 'Corée du Sud', 'Corée du Sud.png');

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `nom_match` varchar(50) DEFAULT NULL,
  `date_match` date DEFAULT NULL,
  `id_stade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_match`, `date_match`, `id_stade`) VALUES
(3, 'Jordan vs Qatar', '2024-02-22', 1),
(4, 'Australie VS Japon', '2024-02-23', 1),
(5, 'Japon VS Iran', '2024-03-22', 8);

-- --------------------------------------------------------

--
-- Table structure for table `jouer`
--

CREATE TABLE `jouer` (
  `id_evenement` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jouer`
--

INSERT INTO `jouer` (`id_evenement`, `id_equipe`) VALUES
(3, 1),
(3, 2),
(4, 3),
(4, 4),
(5, 4),
(5, 19);

-- --------------------------------------------------------

--
-- Table structure for table `reserver`
--

CREATE TABLE `reserver` (
  `id_utilisateur` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  `date_reservation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserver`
--

INSERT INTO `reserver` (`id_utilisateur`, `id_billet`, `date_reservation`) VALUES
(1, 157, '2024-03-14'),
(1, 158, '2024-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `stades`
--

CREATE TABLE `stades` (
  `id_stade` int(11) NOT NULL,
  `nom_stade` varchar(50) NOT NULL,
  `capacite` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stades`
--

INSERT INTO `stades` (`id_stade`, `nom_stade`, `capacite`) VALUES
(1, 'Stade Lusail, Doha, Qatar', 5500),
(8, 'Stade de France', 2300);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `mail`, `password`, `status`) VALUES
(1, 'Pignion', 'Louis', '1@1.fr', '1', '0'),
(2, 'Hales', 'Mathieu', '2@2.fr', '2', '1'),
(14, 'POUPIPOU889', 'Alberto889', 'Boby@gmail.com', '3', '0');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id_zone` int(11) NOT NULL,
  `libelle_zone` varchar(50) NOT NULL,
  `nb_place` int(11) DEFAULT NULL,
  `id_stade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id_zone`, `libelle_zone`, `nb_place`, `id_stade`) VALUES
(1, 'Catégorie 1', 100, 1),
(2, 'Catégorie 2', 200, 1),
(4, 'Catégorie 1', 2000, 8),
(5, 'Catégorie 2', 300, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`id_billet`),
  ADD KEY `fk_1` (`id_evenement`),
  ADD KEY `id_zone` (`id_zone`);

--
-- Indexes for table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id_equipe`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`),
  ADD KEY `id_stade` (`id_stade`);

--
-- Indexes for table `jouer`
--
ALTER TABLE `jouer`
  ADD PRIMARY KEY (`id_evenement`,`id_equipe`),
  ADD KEY `id_equipe` (`id_equipe`);

--
-- Indexes for table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`id_utilisateur`,`id_billet`),
  ADD KEY `id_billet` (`id_billet`);

--
-- Indexes for table `stades`
--
ALTER TABLE `stades`
  ADD PRIMARY KEY (`id_stade`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id_zone`),
  ADD KEY `id_stade` (`id_stade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billets`
--
ALTER TABLE `billets`
  MODIFY `id_billet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stades`
--
ALTER TABLE `stades`
  MODIFY `id_stade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id_zone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billets`
--
ALTER TABLE `billets`
  ADD CONSTRAINT `fk_evenement` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_zone` FOREIGN KEY (`id_zone`) REFERENCES `zones` (`id_zone`) ON UPDATE CASCADE;

--
-- Constraints for table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_stade`) REFERENCES `stades` (`id_stade`) ON UPDATE CASCADE;

--
-- Constraints for table `jouer`
--
ALTER TABLE `jouer`
  ADD CONSTRAINT `jouer_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jouer_ibfk_2` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`) ON UPDATE CASCADE;

--
-- Constraints for table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `fk_billet` FOREIGN KEY (`id_billet`) REFERENCES `billets` (`id_billet`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON UPDATE CASCADE;

--
-- Constraints for table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `fk_stade` FOREIGN KEY (`id_stade`) REFERENCES `stades` (`id_stade`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
