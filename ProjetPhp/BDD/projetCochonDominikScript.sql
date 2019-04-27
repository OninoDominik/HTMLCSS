-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 27 avr. 2019 à 11:34
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetcochon`
CREATE DATABASE IF NOT EXISTS `projetCochonDominik`;
use projetCochonDominik;

--

-- --------------------------------------------------------

--
-- Structure de la table `cochon`
--

CREATE TABLE `cochon` (
  `id_cochons` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Poids` int(11) NOT NULL,
  `Heure_naissance` datetime NOT NULL,
  `Heure_mort` datetime DEFAULT NULL,
  `Url_img` varchar(200) NOT NULL,
  `Sexe` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cochon`
--

INSERT INTO `cochon` (`id_cochons`, `Nom`, `Poids`, `Heure_naissance`, `Heure_mort`, `Url_img`, `Sexe`) VALUES
(1, 'Peggy', 101, '1974-11-01 09:00:00', NULL, 'cochon.jpeg', 0),
(2, 'Babe', 201, '1996-02-21 20:00:00', '2017-04-01 22:00:00', 'cochon.jpeg', 1),
(3, 'Rudy', 321, '1995-04-01 09:09:00', NULL, 'cochon.jpeg', 1),
(4, 'GenyPig', 2, '1995-04-01 09:09:00', NULL, 'cochon.jpeg', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cochon`
--
ALTER TABLE `cochon`
  ADD PRIMARY KEY (`id_cochons`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cochon`
--
ALTER TABLE `cochon`
  MODIFY `id_cochons` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
