-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 29 fév. 2024 à 11:50
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_billetterie`
--
CREATE DATABASE IF NOT EXISTS `db_billetterie` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_billetterie`;

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id_billet` int(11) NOT NULL AUTO_INCREMENT,
  `date_reservation` varchar(50) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `id_evenement` int(11) NOT NULL,
  PRIMARY KEY (`id_billet`),
  KEY `fk_1` (`id_evenement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

DROP TABLE IF EXISTS `equipes`;
CREATE TABLE IF NOT EXISTS `equipes` (
  `nom_equipe` varchar(50) NOT NULL,
  PRIMARY KEY (`nom_equipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`nom_equipe`) VALUES
('Jordan'),
('Qatar');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `nom_match` varchar(50) DEFAULT NULL,
  `date_match` date DEFAULT NULL,
  `libelle_sta` varchar(50) NOT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `libelle_sta` (`libelle_sta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_match`, `date_match`, `libelle_sta`) VALUES
(1, 'Jordan vs Qatar', '2024-03-14', 'Stade Lusail, Doha, Qatar');

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

DROP TABLE IF EXISTS `jouer`;
CREATE TABLE IF NOT EXISTS `jouer` (
  `id_evenement` int(11) NOT NULL,
  `nom_equipe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_evenement`,`nom_equipe`),
  KEY `nom_equipe` (`nom_equipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jouer`
--

INSERT INTO `jouer` (`id_evenement`, `nom_equipe`) VALUES
(1, 'Jordan'),
(1, 'Qatar');

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE IF NOT EXISTS `reserver` (
  `id_utilisateur` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_billet`),
  KEY `id_billet` (`id_billet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `stades`
--

DROP TABLE IF EXISTS `stades`;
CREATE TABLE IF NOT EXISTS `stades` (
  `libelle_sta` varchar(50) NOT NULL,
  `capacite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`libelle_sta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stades`
--

INSERT INTO `stades` (`libelle_sta`, `capacite`) VALUES
('Stade Lusail, Doha, Qatar', '5000');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `mail`, `password`, `status`) VALUES
(1, 'Pignion', 'Louis', '1@1.fr', '1', '0'),
(2, 'Hales', 'Mathieu', '2@2.fr', '2', '1');

-- --------------------------------------------------------

--
-- Structure de la table `zones`
--

DROP TABLE IF EXISTS `zones`;
CREATE TABLE IF NOT EXISTS `zones` (
  `libelle_zone` varchar(50) NOT NULL,
  `nb_place` varchar(50) DEFAULT NULL,
  `libelle_sta` varchar(50) NOT NULL,
  PRIMARY KEY (`libelle_zone`),
  KEY `libelle_sta` (`libelle_sta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `zones`
--

INSERT INTO `zones` (`libelle_zone`, `nb_place`, `libelle_sta`) VALUES
('1', '100', 'Stade Lusail, Doha, Qatar'),
('2', '200', 'Stade Lusail, Doha, Qatar');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billets`
--
ALTER TABLE `billets`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`libelle_sta`) REFERENCES `stades` (`libelle_sta`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `jouer`
--
ALTER TABLE `jouer`
  ADD CONSTRAINT `jouer_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jouer_ibfk_2` FOREIGN KEY (`nom_equipe`) REFERENCES `equipes` (`nom_equipe`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`id_billet`) REFERENCES `billets` (`id_billet`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_ibfk_1` FOREIGN KEY (`libelle_sta`) REFERENCES `stades` (`libelle_sta`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
