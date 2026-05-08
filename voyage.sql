-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 fév. 2026 à 07:02
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `voyage`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `id_client` int NOT NULL,
  `Depart` varchar(150) NOT NULL,
  `Arrivé` varchar(150) NOT NULL,
  `date_depart` date NOT NULL,
  `date_retour` date DEFAULT NULL,
  `passager` int NOT NULL,
  `status` enum('Accepté','Annulée','En attente de payement','Refusée','Terminé') DEFAULT 'En attente de payement',
  PRIMARY KEY (`id_reservation`),
  KEY `fk_reservation_client` (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `id_client`, `Depart`, `Arrivé`, `date_depart`, `date_retour`, `passager`, `status`) VALUES
(1, 2, 'YAOUNDE', 'Douala', '2026-02-28', '2026-02-28', 5, 'En attente de payement'),
(2, 2, 'YAOUNDE', 'Kribi', '2026-02-28', '2026-03-08', 5, 'En attente de payement');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `numero_telephone` varchar(20) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_telephone` (`numero_telephone`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `numero_telephone`, `pwd`) VALUES
(1, 'MBEPPA', 'Bill', '657248116', '1234'),
(2, 'lulu', 'ingride', '697183220', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
