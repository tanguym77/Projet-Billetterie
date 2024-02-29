-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 29 fév. 2024 à 14:59
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
  `prix` float DEFAULT NULL,
  `id_evenement` int(11) NOT NULL,
  PRIMARY KEY (`id_billet`),
  KEY `fk_1` (`id_evenement`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id_billet`, `prix`, `id_evenement`) VALUES
(121, 50, 3),
(122, 50, 3),
(123, 50, 3),
(124, 50, 3),
(125, 50, 3),
(126, 60, 4),
(127, 60, 4),
(128, 60, 4),
(129, 60, 4),
(130, 60, 4),
(131, 60, 4),
(132, 60, 4),
(133, 60, 4),
(134, 60, 4),
(135, 60, 4);

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

DROP TABLE IF EXISTS `equipes`;
CREATE TABLE IF NOT EXISTS `equipes` (
  `id_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_equipe` varchar(50) NOT NULL,
  `logo` text,
  PRIMARY KEY (`id_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`id_equipe`, `nom_equipe`, `logo`) VALUES
(1, 'Jordan', NULL),
(2, 'Qatar', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `nom_match` varchar(50) DEFAULT NULL,
  `date_match` date DEFAULT NULL,
  `id_stade` int(11) NOT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `id_stade` (`id_stade`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_match`, `date_match`, `id_stade`) VALUES
(3, 'Jordan vs Qatar', '2024-02-22', 1),
(4, 'Jordan vs Qatar 2', '2024-02-23', 1);

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

DROP TABLE IF EXISTS `jouer`;
CREATE TABLE IF NOT EXISTS `jouer` (
  `id_evenement` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL,
  PRIMARY KEY (`id_evenement`,`id_equipe`),
  KEY `id_equipe` (`id_equipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jouer`
--

INSERT INTO `jouer` (`id_evenement`, `id_equipe`) VALUES
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE IF NOT EXISTS `reserver` (
  `id_utilisateur` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  `date_reservation` date NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_billet`),
  KEY `id_billet` (`id_billet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`id_utilisateur`, `id_billet`, `date_reservation`) VALUES
(1, 121, '2024-02-13');

-- --------------------------------------------------------

--
-- Structure de la table `stades`
--

DROP TABLE IF EXISTS `stades`;
CREATE TABLE IF NOT EXISTS `stades` (
  `id_stade` int(11) NOT NULL AUTO_INCREMENT,
  `nom_stade` varchar(50) NOT NULL,
  `capacite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_stade`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stades`
--

INSERT INTO `stades` (`id_stade`, `nom_stade`, `capacite`) VALUES
(1, 'Stade Lusail, Doha, Qatar', '5000');

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
  `id_zone` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_zone` varchar(50) NOT NULL,
  `nb_place` int(11) DEFAULT NULL,
  `id_stade` int(11) NOT NULL,
  PRIMARY KEY (`id_zone`),
  KEY `id_stade` (`id_stade`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `zones`
--

INSERT INTO `zones` (`id_zone`, `libelle_zone`, `nb_place`, `id_stade`) VALUES
(1, '1', 100, 1),
(2, '2', 200, 1);

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
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_stade`) REFERENCES `stades` (`id_stade`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `jouer`
--
ALTER TABLE `jouer`
  ADD CONSTRAINT `jouer_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jouer_ibfk_2` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `zones_ibfk_1` FOREIGN KEY (`id_stade`) REFERENCES `stades` (`id_stade`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
