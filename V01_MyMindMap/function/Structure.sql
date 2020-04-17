-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 27 jan. 2020 à 15:10
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mind_map_version_optimal`
--

-- --------------------------------------------------------

--
-- Structure de la table `bulle`
--

CREATE TABLE `bulle` (
  `id_bulle` int(11) NOT NULL,
  `name_bulle` varchar(75) NOT NULL,
  `num_bulle` varchar(50) NOT NULL,
  `color_bulle` varchar(255) NOT NULL,
  `id_relation` int(11) NOT NULL,
  `id_mind_map` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mind_map`
--

CREATE TABLE `mind_map` (
  `id_mind_map` int(11) NOT NULL,
  `nom_mind_map` varchar(75) DEFAULT NULL,
  `id_note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `desc_note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `relation`
--

CREATE TABLE `relation` (
  `id_relation` int(11) NOT NULL,
  `type_relation` varchar(50) DEFAULT NULL,
  `identite_bulle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bulle`
--
ALTER TABLE `bulle`
  ADD PRIMARY KEY (`id_bulle`),
  ADD KEY `FK_id_relation` (`id_relation`),
  ADD KEY `FK_id_mind_map` (`id_mind_map`);

--
-- Index pour la table `mind_map`
--
ALTER TABLE `mind_map`
  ADD PRIMARY KEY (`id_mind_map`),
  ADD KEY `id_note` (`id_note`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`);

--
-- Index pour la table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id_relation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bulle`
--
ALTER TABLE `bulle`
  MODIFY `id_bulle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mind_map`
--
ALTER TABLE `mind_map`
  MODIFY `id_mind_map` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `relation`
--
ALTER TABLE `relation`
  MODIFY `id_relation` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bulle`
--
ALTER TABLE `bulle`
  ADD CONSTRAINT `FK_id_mind_map` FOREIGN KEY (`id_mind_map`) REFERENCES `mind_map` (`id_mind_map`) ON DELETE CASCADE ,
  ADD CONSTRAINT `FK_id_relation` FOREIGN KEY (`id_relation`) REFERENCES `relation` (`id_relation`);

--
-- Contraintes pour la table `mind_map`
--
ALTER TABLE `mind_map`
  ADD CONSTRAINT `mind_map_ibfk_1` FOREIGN KEY (`id_note`) REFERENCES `note` (`id_note`) ON DELETE CASCADE ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
