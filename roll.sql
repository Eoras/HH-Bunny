-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 01 avr. 2018 à 22:43
-- Version du serveur :  5.7.20
-- Version de PHP :  7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `HH-Bunny`
--

-- --------------------------------------------------------

--
-- Structure de la table `roll`
--

CREATE TABLE `roll` (
  `id` int(11) NOT NULL,
  `dateRoll` datetime NOT NULL,
  `dateRaid` datetime NOT NULL,
  `numberMin` int(11) NOT NULL,
  `numberMax` int(11) NOT NULL,
  `roll` float NOT NULL,
  `peopleWhoRolled` varchar(255) NOT NULL,
  `broochFor` varchar(255) DEFAULT NULL,
  `whoGetBrooch` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `roll`
--
ALTER TABLE `roll`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT pour la table `roll`
--
ALTER TABLE `roll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
