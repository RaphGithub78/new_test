-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 30 mai 2024 à 08:13
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author` varchar(50) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb3 COMMENT='La table qui va contenir tous les messages voyons !';

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `author`, `content`, `created_at`) VALUES
(81, 'Jean', 'Je suis ton coach de tennis', '2024-05-29 19:01:02'),
(80, 'Hugo', 'Je cherche un coach pour le tennis', '2024-05-29 19:00:47'),
(78, 'Hugo', 'Je m\'appelle Hugo et je souhaite obtenir un coach ', '2024-05-29 17:59:23'),
(79, 'John Doe', 'Je suis coach de basket pour OMNES ', '2024-05-29 17:59:36');

-- --------------------------------------------------------

--
-- Structure de la table `voice_messages`
--

DROP TABLE IF EXISTS `voice_messages`;
CREATE TABLE IF NOT EXISTS `voice_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `voice_messages`
--

INSERT INTO `voice_messages` (`id`, `author`, `file_path`, `created_at`) VALUES
(34, 'Anonymous', 'uploads/audio_1717002108.wav', '2024-05-29 17:01:48'),
(33, 'Anonymous', 'uploads/audio_1717002108.wav', '2024-05-29 17:01:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
