-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 02 juin 2024 à 21:30
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rdv`
--

-- --------------------------------------------------------

--
-- Structure de la table `rdvous`
--

DROP TABLE IF EXISTS `rdvous`;
CREATE TABLE IF NOT EXISTS `rdvous` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
);

--
-- Déchargement des données de la table `rdvous`
--

INSERT INTO `rdvous` (`nom`, `prenom`, `categorie`, `date`) VALUES
('didier', 'deschamps', 'foot', '0606'),
('didier', 'deschamps', 'foot', '0606'),
('didier', 'deschamps', 'foot', '0606'),
('didier', 'deschamps', 'foot', '0606');
;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
