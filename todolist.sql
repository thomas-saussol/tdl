-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 11 avr. 2020 à 12:12
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `todolist`
--
CREATE DATABASE IF NOT EXISTS `todolist` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `todolist`;

-- --------------------------------------------------------

--
-- Structure de la table `acces`
--

DROP TABLE IF EXISTS `acces`;
CREATE TABLE IF NOT EXISTS `acces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_utilisateur_acces` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `todolist`
--

DROP TABLE IF EXISTS `todolist`;
CREATE TABLE IF NOT EXISTS `todolist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `tache` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `finie` int(11) NOT NULL DEFAULT '0',
  `date_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=220 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `todolist`
--

INSERT DELAYED INTO `todolist` (`id`, `id_utilisateur`, `tache`, `date`, `finie`, `date_fin`) VALUES
(193, 14, 'CA MARCHE OU PAS ?', '2020-04-10 21:05:18', 0, NULL),
(194, 14, 'test', '2020-04-10 21:05:54', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT DELAYED INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(12, 'Walken99', '$2y$12$mdboCpBngibR31UGOvN.feAlWhZBzZczIjsGyGAUiBcD2iDUjhXa2'),
(13, 'adrien', '$2y$12$qEQr8f1.Y93waQADQ7EkH.XmiIis9XHkT7DxaaPAISHiY1JIjdNXu'),
(14, 'Firefou', '$2y$12$gBYfmMrFI2GENLsHpOf0VuIjO0Riz6e4.1dRB.Qk0xtl2SeXCBo..');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
