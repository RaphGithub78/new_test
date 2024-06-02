-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 02 juin 2024 à 21:27
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `liste_comptes`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `disponibilite` varchar(255) NOT NULL,
  `courriel` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(255) NOT NULL
);

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `specialite`, `cv`, `disponibilite`, `courriel`, `mot_de_passe`) VALUES
(2, 'admin', 'admin', 'bonne', 'good', 'ok', 'admin.admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dossier` varchar(255) NOT NULL,
  `rdv` varchar(255) NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
);

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `dossier`, `rdv`, `courriel`, `mot_de_passe`) VALUES
(1, 'Lefort', 'Remy', 'reservations', 'rendez vous', 'remy.legrand@gmail.com', 'remy'),
(5, 'NULL', 'NULL', 'reservations', 'rendez vous', 'admn.admin@gmail.com', 'okokok'),
(5, 'NULL', 'NULL', 'reservations', 'rendez vous', 'admn.admin@gmail.com', 'okokok'),
(5, 'NULL', 'NULL', 'reservations', 'rendez vous', 'raph@gmail.com', 'raph'),
(5, 'NULL', 'NULL', 'reservations', 'rendez vous', 'raph@gmail.com', 'raph'),
(5, 'NULL', 'NULL', 'reservations', 'rendez vous', 'deded@ded.com', 'dede'),
(5, 'NULL', 'NULL', 'reservations', 'rendez vous', 'deded@ded.com', 'dede'),
(5, 'NULL', 'NULL', 'reservations', 'rendez vous', 'dzdz@frf.com', 'dede'),
(5, 'NULL', 'NULL', 'reservations', 'rendez vous', 'dedede@dede.com', 'dede'),
(5, 'NULL', 'NULL', 'reservations', 'rendez vous', 'ededede@dedem.com', 'dede'),
(50, 'Ladala', 'Antonia', 'ok', 'ok', 'antonia.ladala@gmail.com', 'antonia');

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE IF NOT EXISTS `coach` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `dossier` varchar(255) NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`id`, `nom`, `prenom`, `categorie`, `cv`, `dossier`, `courriel`, `mot_de_passe`) VALUES
(50, 'didier', 'deschamps', 'foot', 'dede', 'dede', 'didier.deschamps@gmail.com', 'didier'),
(5, 'didier', 'deschamps', 'foot', 'dede', 'NULL', 'NULL', 'NULL'),
(5, 'Toriveau', 'Simon', 'natation', 'cv_simontoriveau.html', 'NULL', 'simon.toriveau@gmail.com', 'simon'),
(5, 'Cockerille', 'Richard', 'rugby', 'cv_richardcockerill.html', 'NULL', 'richard.cockereillu@gmail.com', 'richard'),
(60, 'Forget', 'Louis', 'foot', 'cv_louisforget.html', 'NULL', 'louis.forget@gmail.com', 'louis'),
(55, 'lopez', 'david', 'tennis', 'cv_davidlopez.html', 'NuLL', 'david.lopez@gmail.com', 'david');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
