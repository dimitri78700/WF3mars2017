-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 10 Mai 2017 à 16:58
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exercice_3`
--

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id_movie` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `actors` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `producer` varchar(255) NOT NULL,
  `year_of_prod` year(4) NOT NULL,
  `language` varchar(15) NOT NULL,
  `category` enum('drame','aventure','guerre') NOT NULL,
  `storyline` text NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id_movie`, `title`, `actors`, `director`, `producer`, `year_of_prod`, `language`, `category`, `storyline`, `video`) VALUES
(4, 'jurassic park', 'Chris Pratt', 'Roberto', 'Steven Spielberg', 2015, 'francais', 'aventure', 'jurassic park le film des dinos', 'https://fr.wikipedia.org/wiki/Jurassic_Park'),
(5, 'Desperado', 'DeepJohn', 'Fabien Leon', 'Steven Spielberg', 2012, 'anglais', 'drame', 'efgegeg', 'https://fr.wikipedia.org/wiki/Jurassic_Park');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id_movie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id_movie` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
