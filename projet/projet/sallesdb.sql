-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 02 juin 2024 à 21:29
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sallesdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

DROP TABLE IF EXISTS `salles`;
CREATE TABLE IF NOT EXISTS `salles` (
  `nom` varchar(255) NOT NULL,
  `numero` int NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL
) ;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`nom`, `numero`, `categorie`, `courriel`, `lieu`) VALUES
('Salle Omnes', 6450605, 'Sport fitness', 'Omnes.salle@gmail.com', '10 rue Michel Sextius');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
