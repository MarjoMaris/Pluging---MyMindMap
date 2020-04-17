-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 27 jan. 2020 à 15:11
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

--
-- Déchargement des données de la table `bulle`
--

INSERT INTO `bulle` (`id_bulle`, `name_bulle`, `num_bulle`, `color_bulle`, `id_relation`, `id_mind_map`) VALUES
(1, 'Test_bulle_MM01', '1.1', '#9A65B9', 1, 1),
(2, 'Test_bulle_MM01', '1.2', '#9A65B9', 2, 1),
(3, 'Test_bulle_MM02', '1.1', '#B9656F', 1, 2),
(4, 'Test_bulle_MM02', '1.2', '#B9656F', 2, 2);

--
-- Déchargement des données de la table `mind_map`
--

INSERT INTO `mind_map` (`id_mind_map`, `nom_mind_map`, `id_note`) VALUES
(1, 'Test01', 1),
(2, 'Test02', 2),
(3, 'test03', NULL),
(4, 'test04', NULL),
(6, 'Test05', NULL);

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id_note`, `desc_note`) VALUES
(1, 'Intituler de la note01 pour le mind map 01'),
(2, 'Intituler de la note02 pour le mind map 02');

--
-- Déchargement des données de la table `relation`
--

INSERT INTO `relation` ( `id_relation`, `type_relation`, `identite_bulle`) VALUES
(1, '1.1','1.1'),
(2, '1.2','1.2'),
(3, '1.3','1.3'),
(4, '1.4','1.4'),
(5, '1.5','1.5'),
(6, '1.6','1.6'),
(7, '1.7','1.7'),
(8, '1.8','1.8'),
(9, '1.9','1.9'),
(10, '2.1','2.1'),
(11, '2.2','2.2'),
(12, '2.3','2.3'),
(13, '2.4','2.4'),
(14, '2.5','2.5'),
(15, '2.6','2.6'),
(16, '2.7','2.7'),
(17, '2.8','2.8'),
(18, '2.9','2.9'),
(19, '3.1','3.1'),
(20, '3.2','3.2'),
(21, '3.3','3.3'),
(22, '3.4','3.4'),
(23, '3.5','3.5'),
(24, '3.6','3.6'),
(25, '3.7','3.7'),
(26, '3.8','3.8'),
(27, '3.9','3.9'),
(28, '4.1','4.1'),
(29, '4.2','4.2'),
(30, '4.3','4.3'),
(31, '4.4','4.4'),
(32, '4.5','4.5'),
(33, '4.6','4.6'),
(34, '4.7','4.7'),
(35, '4.8','4.7');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
