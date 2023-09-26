-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 25 sep. 2023 à 09:32
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `arbrecompetences_prototype`
--

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `CNE` varchar(11) NOT NULL,
  `Ville_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`Id`, `Nom`, `Type`, `CNE`, `Ville_Id`) VALUES
(1, 'Jalil Betroji', 'Stagiaire', 'G627353', 1),
(2, 'Hamid Achauo', 'Stagiaire', 'G6734', 1),
(3, 'Amine Lamchatab', 'Stagiaire', 'G23823', 1),
(4, 'Adnane Benasar', 'Stagiaire', 'G23823', 1),
(5, 'Mohamed-Amine Bkhit', 'Stagiaire', 'G9587', 1),
(6, 'Imrane Sarsri', 'Stagiaire', 'G9850', 1),
(7, 'Amina Assaid', 'Stagiaire', 'G984545', 1),
(8, 'Yassmine Daifane', 'Stagiaire', 'G8945', 3),
(9, 'Hussein Bouik', 'Stagiaire', 'G45321', 3),
(10, 'Adnane Lharrak', 'Stagiaire', 'G56324', 3),
(11, 'Hamza zaani', 'Stagiaire', 'G456376', 3),
(12, 'Mohamed Baqqali', 'Stagiaire', 'G54356', 6),
(13, 'Soufian Boukhal', 'Stagiaire', 'GA76Z76', 6),
(14, 'Mohamed Aymane', 'Stagiaire', 'G765376', 5),
(15, 'Ayman Alli', 'personne', '', 11),
(16, 'Khlid Reda', 'personne', '', 11),
(17, 'Mohamed Ali', 'personne', '', 11),
(18, 'Ayman Asri', 'personne', '', 11),
(19, 'Fouad Essarje', 'Formateur', '', 1),
(22, 'Ayman ALI', 'personne', '', 19),
(23, 'mouad lhilali', 'Formateur', '', 12),
(24, 'Salah eghla', 'Stagiaire', 'P634774', 13),
(25, 'abdo asri', 'Stagiaire', 'P634755', 5),
(26, 'Ayman ALI', 'Stagiaire', 'P634755', 12);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`Id`, `Nom`) VALUES
(1, 'Tetouan'),
(2, 'Tanger'),
(3, 'Casablanca'),
(4, 'Rabat'),
(5, 'Larache'),
(6, 'Khouribga'),
(7, 'El Kelaa des Sraghna'),
(8, 'Khenifra'),
(9, 'Beni Mellal'),
(10, 'Tiznit'),
(11, 'Errachidia'),
(12, 'Taroudant'),
(13, 'Ouarzazate'),
(14, 'Safi'),
(15, 'Lahraouyine'),
(16, 'Berrechid'),
(17, 'Fkih Ben Salah'),
(18, 'Taourirt'),
(19, 'Sefrou'),
(20, 'Youssoufia');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Ville_Id` (`Ville_Id`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`Ville_Id`) REFERENCES `personne` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
