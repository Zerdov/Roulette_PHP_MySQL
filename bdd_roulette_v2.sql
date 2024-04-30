-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 16 Janvier 2024 à 13:16
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_roulette_v2`
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
  `idE` int(10) UNSIGNED NOT NULL,
  `idP` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`idN`, `valeurN`, `dateN`, `idE`, `idP`) VALUES
(38, '0.00', '2024-01-16 11:41:57', 25, 27),
(39, '1.00', '2024-01-16 11:41:57', 25, 27),
(40, '2.00', '2024-01-16 11:41:57', 25, 27),
(41, '3.00', '2024-01-16 11:41:57', 25, 27),
(42, '4.00', '2024-01-16 11:41:57', 25, 27),
(43, '5.00', '2024-01-16 11:41:57', 25, 27),
(44, '6.00', '2024-01-16 11:41:57', 25, 27),
(45, '7.00', '2024-01-16 11:41:57', 25, 27),
(46, '8.00', '2024-01-16 11:41:57', 25, 27),
(47, '9.00', '2024-01-16 11:41:57', 25, 27),
(48, '10.00', '2024-01-16 11:41:57', 25, 27),
(49, '11.00', '2024-01-16 11:41:57', 25, 27),
(50, '12.00', '2024-01-16 11:41:57', 25, 27),
(51, '13.00', '2024-01-16 11:41:57', 25, 27),
(52, '14.00', '2024-01-16 11:41:57', 25, 27),
(53, '15.00', '2024-01-16 11:41:57', 25, 27),
(54, '16.00', '2024-01-16 11:41:57', 25, 27),
(55, '17.00', '2024-01-16 11:41:57', 25, 27),
(56, '18.00', '2024-01-16 11:41:57', 25, 27),
(57, '19.00', '2024-01-16 11:41:57', 25, 27),
(58, '20.00', '2024-01-16 11:41:57', 25, 27);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idU` int(10) UNSIGNED NOT NULL,
  `nomU` varchar(50) NOT NULL,
  `prenomU` varchar(50) NOT NULL,
  `mdpU` varchar(500) NOT NULL,
  `droitU` tinyint(1) NOT NULL DEFAULT '0',
  `passageU` tinyint(1) DEFAULT '0',
  `idC` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idU`, `nomU`, `prenomU`, `mdpU`, `droitU`, `passageU`, `idC`) VALUES
(1, 'Aoudache', 'Karim', '', 0, 0, 1),
(2, 'Aveline', 'Baptiste', '', 0, 0, 1),
(3, 'Ballot', 'Alexis', '', 0, 0, 1),
(4, 'Camus', 'Jordan', '', 0, 0, 1),
(5, 'Chafaï', 'Yacine', '', 0, 0, 1),
(6, 'Chateau', 'Clément', '', 0, 0, 1),
(7, 'Delafaite', 'Nathan', '', 0, 0, 1),
(8, 'Gadroy', 'Léo', '', 0, 0, 1),
(9, 'Gérard', 'David', '', 0, 0, 1),
(10, 'Malherbe', 'Arthur', '', 0, 0, 1),
(11, 'Mao', 'Pauline', '', 0, 0, 1),
(12, 'Nouvian', 'Pierre-Loup', '', 0, 0, 1),
(13, 'Oudar', 'Nicolas', '', 0, 0, 1),
(14, 'Ponsin', 'Flavien', '', 0, 0, 1),
(15, 'Senhadji', 'Hamza', '', 0, 0, 1),
(16, 'Turquier', 'Victor', '', 0, 0, 1),
(17, 'Sellier', 'Luka', '', 0, 0, 2),
(18, 'Kreir', 'Yanis', '', 0, 0, 2),
(19, 'Hubert', 'Léa', '', 0, 0, 2),
(20, 'Guillaume', 'Corentin', '', 0, 0, 2),
(21, 'De Lange', 'Aymeric', '', 0, 0, 2),
(22, 'Barial', 'Benjamin', '', 0, 0, 2),
(23, 'Aubriet', 'Aurélien', '', 0, 0, 2),
(24, 'Vandendrich', 'Bryan', '', 0, 0, 2),
(25, 'Willig', 'Jules', '$2y$10$A0NLQwPuCQxdmvQ.d9kEv.f2lxPuon.3ZeKBgxmIlnR6.opI56Xy6', 0, 0, 2),
(26, 'Wintrebert', 'Mathéo', '', 0, 0, 2),
(27, 'Prof', 'Prof', '$2y$10$cLHQ9fdJ0FfVcC0nMdrmUeUYLyiMR.eLN/edWofmZY9ReAW75Sw0C', 1, 0, NULL);

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
  ADD KEY `idE` (`idE`),
  ADD KEY `idP` (`idP`);

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
  MODIFY `idN` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idU` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`idE`) REFERENCES `utilisateurs` (`idU`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`idP`) REFERENCES `utilisateurs` (`idU`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `classes` (`idC`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
