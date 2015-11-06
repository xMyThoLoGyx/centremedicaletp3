-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Jeu 22 Octobre 2015 à 22:15
-- Version du serveur :  5.5.44
-- Version de PHP :  5.4.43

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `centremedicale`
--

-- --------------------------------------------------------

--
-- Structure de la table `etages`
--

CREATE TABLE `etages` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `etages`
--

INSERT INTO `etages` (`id`, `name`) VALUES
(1, 'Etage 1'),
(2, 'Etage 2'),
(3, 'Etage 3');

-- --------------------------------------------------------

--
-- Structure de la table `medicaments`
--

CREATE TABLE `medicaments` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `medicaments`
--

INSERT INTO `medicaments` (`id`, `nom`, `user_id`) VALUES
(2, 'Glucosamine 2 dose', 1),
(3, 'Hectonamyl 3 dose.', 1),
(4, 'Chocolat', 2),
(5, 'Red Juice', 4),
(6, 'Black Pepper', 5),
(7, 'Germaphobe', 7),
(8, 'Honey', 7),
(9, 'sosa', NULL),
(10, 'Choco', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) unsigned NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageProfil` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `section_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `patients`
--

INSERT INTO `patients` (`id`, `nom`, `imageProfil`, `created`, `modified`, `section_id`, `user_id`) VALUES
(1, 'Jeff', '', '2015-08-27 14:14:24', '2015-10-08 21:59:36', 1, 1),
(2, 'Gregoire', '', '2015-08-27 14:14:24', NULL, 2, 1),
(3, 'Alexandra', '', '2015-08-27 14:14:24', NULL, 3, 2),
(4, 'Philippe', '', '2015-08-27 20:38:53', '2015-08-27 20:49:01', 1, 1),
(6, 'Idephonse', '', '2015-08-27 20:43:53', '2015-08-27 22:05:16', 1, 2),
(8, 'Antonio', '', '2015-08-27 22:07:16', '2015-08-27 22:07:16', 3, 3),
(12, 'LoL', '', '2015-09-25 20:09:48', '2015-09-30 18:14:13', 3, 7),
(15, 'Johnnyw', '', '2015-09-30 19:21:09', '2015-09-30 19:21:09', 2, 7),
(16, 'soasa', '', '2015-10-02 15:47:57', '2015-10-02 15:47:57', 2, 1),
(17, 'Yoyoy', 'uploads/Koala.jpg', '2015-10-08 22:04:37', '2015-10-08 22:18:01', 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `patients_medicaments`
--

CREATE TABLE `patients_medicaments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medicament_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `patients_medicaments`
--

INSERT INTO `patients_medicaments` (`id`, `patient_id`, `medicament_id`) VALUES
(1, 1, 2),
(2, 3, 3),
(3, 3, 4),
(4, 2, 5),
(5, 3, 6),
(6, 2, 7),
(7, 3, 7),
(12, 12, 5),
(13, 15, 2),
(14, 15, 8),
(15, 1, 9),
(16, 16, 4),
(17, 16, 5),
(18, 16, 6),
(19, 9, 10),
(20, 17, 2),
(21, 17, 7);

-- --------------------------------------------------------

--
-- Structure de la table `rencontres`
--

CREATE TABLE `rencontres` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `rencontres`
--

INSERT INTO `rencontres` (`id`, `date`, `patient_id`) VALUES
(1, '2015-09-30', 1),
(2, '2015-10-10', 2);

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL,
  `etage_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `sections`
--

INSERT INTO `sections` (`id`, `etage_id`, `name`) VALUES
(1, 1, '100 - 120'),
(2, 1, '121 - 150'),
(5, 1, '151 - 180'),
(6, 1, '181 - 199'),
(9, 2, '200 - 220'),
(10, 2, '221 - 250'),
(13, 2, '251 - 280'),
(14, 2, '281 - 299'),
(15, 3, '300 - 320'),
(16, 3, '321 - 350'),
(17, 3, '351 - 380');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `courriel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `role` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `courriel`, `password`, `active`, `role`, `created`, `modified`) VALUES
(1, 'Dr. Jean', 'drjean@hotmail.com', '$2a$10$xttqw3uy3m87Wpm8Hcw5JOYd438lwx0A2gH89lHSRrln5uo1mDGae', 0, 'admin', '2015-08-27 21:41:16', '2015-08-27 21:41:16'),
(2, 'Dr. Alex', 'drAlex@hotmail.com', '$2a$10$g5jLn7eTNudNFUFwKeLiPuwZ0E2kZ9GoatsHAXLf9tuQFw4BF1UBC', 0, 'admin', '2015-08-27 21:42:56', '2015-08-27 21:42:56'),
(3, 'Dr. Yve', 'drYve@hotmail.com', '$2a$10$3xLo8bbn2ho3HR3aoBdS7OyrrtOoVAvzNf3mxz8gFiZp9ZUGhjjmi', 0, 'admin', '2015-08-27 22:06:16', '2015-08-27 22:06:16'),
(5, 'Dr. Joe', 'drJoe@hotmail.com', '$2a$10$xttqw3uy3m87Wpm8Hcw5JOYd438lwx0A2gH89lHSRrln5uo1mDGae', 0, 'admin', '2015-08-27 22:07:16', NULL),
(7, 'Annie', 'anniemami@hotmail.com', '$2a$10$xttqw3uy3m87Wpm8Hcw5JOYd438lwx0A2gH89lHSRrln5uo1mDGae', 0, 'Infirmière', '2015-09-25 20:01:17', '2015-09-25 20:01:17'),
(8, 'Dr. Juce', 'drJuce@hotmail.com', '$2a$10$EBq657Sy6XEeoHVGeevoY.AvnRF2/i4wuyongwdjZ7/1sF8.xgDOi', 0, 'admin', '2015-10-01 22:15:57', '2015-10-01 22:15:57'),
(9, 'admin', 'admin@centremedicale.com', '$2a$10$gJFIEaKAxsJxoS510Q7sYeE0eLUAEhOccy/rjf6OggS6/pbA42s8e', 0, 'admin', '2015-10-02 19:43:20', '2015-10-02 19:43:20'),
(14, 'YoBroWhatsApp', 'xtechnoblastx@hotmail.com', '$2a$10$ncdfxEdaULTc/1JFk16kSeRbnrm8Y061DSu6pelp.CyfnlSCnZZhu', 0, NULL, '2015-10-22 21:32:51', '2015-10-22 21:32:51'),
(15, 'jdhcuiewfewf', 'xtechnoblastx@hotmail.com', '$2a$10$TE5305oi753n5wr6ehPk0.7gZR6wo6K5lsoYfUOAav/sqwAp8xSBy', 0, NULL, '2015-10-22 21:40:12', '2015-10-22 21:40:12');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `etages`
--
ALTER TABLE `etages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medicaments`
--
ALTER TABLE `medicaments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patients_medicaments`
--
ALTER TABLE `patients_medicaments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rencontres`
--
ALTER TABLE `rencontres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `etages`
--
ALTER TABLE `etages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `medicaments`
--
ALTER TABLE `medicaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `patients_medicaments`
--
ALTER TABLE `patients_medicaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `rencontres`
--
ALTER TABLE `rencontres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
