-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 30 Avril 2024 à 07:40
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_roulette_v3`
--

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `idC` int(10) UNSIGNED NOT NULL,
  `libelleC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`idC`, `libelleC`) VALUES
(1, 'SISR'),
(2, 'SLAM');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `idN` int(10) UNSIGNED NOT NULL,
  `valeurN` decimal(4,2) NOT NULL,
  `dateN` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idU` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idU` int(10) UNSIGNED NOT NULL,
  `nomU` varchar(50) NOT NULL,
  `prenomU` varchar(50) NOT NULL,
  `passageU` tinyint(1) DEFAULT '0',
  `idC` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idU`, `nomU`, `prenomU`, `passageU`, `idC`) VALUES
(1, 'Aoudache', 'Karim', 0, 1),
(2, 'Aveline', 'Baptiste', 0, 1),
(3, 'Ballot', 'Alexis', 0, 1),
(4, 'Camus', 'Jordan', 0, 1),
(5, 'Chafaï', 'Yacine', 0, 1),
(6, 'Chateau', 'Clément', 0, 1),
(7, 'Delafaite', 'Nathan', 0, 1),
(8, 'Gadroy', 'Léo', 0, 1),
(9, 'Gérard', 'David', 1, 1),
(10, 'Malherbe', 'Arthur', 0, 1),
(11, 'Mao', 'Pauline', 0, 1),
(12, 'Nouvian', 'Pierre-Loup', 0, 1),
(13, 'Oudar', 'Nicolas', 0, 1),
(14, 'Ponsin', 'Flavien', 0, 1),
(15, 'Senhadji', 'Hamza', 0, 1),
(16, 'Turquier', 'Victor', 0, 1),
(17, 'Aubriet', 'Aurélien', 0, 2),
(18, 'Barial', 'Benjamin', 0, 2),
(19, 'De Lange', 'Aymeric', 0, 2),
(20, 'Guillaume', 'Corentin', 0, 2),
(21, 'Hubert', 'Léa', 0, 2),
(22, 'Kreir', 'Yanis', 0, 2),
(23, 'Sellier', 'Luka', 0, 2),
(24, 'Vandendrich', 'Bryan', 0, 2),
(25, 'Willig', 'Jules', 0, 2),
(26, 'Wintrebert', 'Mathéo', 0, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`idC`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`idN`),
  ADD KEY `idE` (`idU`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idU`),
  ADD KEY `idC` (`idC`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `idC` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `idN` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idU` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `utilisateurs` (`idU`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `classes` (`idC`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
