-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 11 mai 2019 à 10:03
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jean_forteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'JeanForterocheAlaska', 'AlaskaLife');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `report` tinyint(1) NOT NULL DEFAULT '0',
  `date_comment` datetime NOT NULL,
  `FK_post` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `comment`, `report`, `date_comment`, `FK_post`) VALUES
(1, 'Yvain le cavalier Lion', 'Très bon début d\'aventure', 0, '2019-04-28 12:19:15', 1),
(2, 'Perceval', 'J\'aime beaucoup', 0, '2019-05-03 13:35:24', 2),
(3, 'Gauvin', 'Cool l\'histoire', 0, '2019-05-05 14:00:59', 2),
(4, 'Arthour', 'Pas changer assiette pour fromage', 0, '2019-05-05 14:02:26', 1),
(5, 'Gauvin', 'La suite', 0, '2019-05-07 15:47:02', 2),
(6, 'Arthour', 'bonjour', 0, '2019-05-09 11:13:34', 3);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_admin` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `date_hours` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_admin` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `FK_admin`, `title`, `content`, `state`, `date_hours`) VALUES
(1, 1, 'Un début de voyage du bon pied ', 'Lorem Ipsum', 1, '2019-04-20 15:32:31'),
(2, 1, 'Un voyage semé d\'embûches', 'Pour l\'instant, mon début de voyage commence bien ', 1, '2019-04-21 09:21:20'),
(3, 1, 'La suite du voyage', '<p><strong>Je prends la <em>rel&egrave;ve</em></strong></p>', 1, '2019-05-08 12:53:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
