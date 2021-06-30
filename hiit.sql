-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2021 at 07:57 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiit`
--

-- --------------------------------------------------------

--
-- Table structure for table `choisir`
--

DROP TABLE IF EXISTS `choisir`;
CREATE TABLE IF NOT EXISTS `choisir` (
  `IDObjectif` int(11) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  `DateDeRealisation` date NOT NULL,
  PRIMARY KEY (`IDObjectif`,`IdUtilisateur`),
  UNIQUE KEY `ID_Choisir_IND` (`IDObjectif`,`IdUtilisateur`),
  KEY `FKCho_Uti_IND` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choisir`
--

INSERT INTO `choisir` (`IDObjectif`, `IdUtilisateur`, `DateDeRealisation`) VALUES
(1, 7, '2020-12-22'),
(2, 7, '2021-01-29'),
(2, 14, '2021-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `contient`
--

DROP TABLE IF EXISTS `contient`;
CREATE TABLE IF NOT EXISTS `contient` (
  `IDCours` int(11) NOT NULL,
  `IDMouvement` int(11) NOT NULL,
  `Ordre` int(3) DEFAULT NULL,
  PRIMARY KEY (`IDCours`,`IDMouvement`),
  UNIQUE KEY `ID_Contient_IND` (`IDCours`,`IDMouvement`),
  KEY `FKCon_Mou_IND` (`IDMouvement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contient`
--

INSERT INTO `contient` (`IDCours`, `IDMouvement`, `Ordre`) VALUES
(16, 2, 1),
(19, 1, 1),
(20, 2, 1),
(21, 1, 1),
(21, 3, 2),
(22, 1, 2),
(22, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `IDCours` int(11) NOT NULL AUTO_INCREMENT,
  `NomCours` varchar(50) NOT NULL,
  `NombreDeParticipants` int(3) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `IDTypeCours` int(11) NOT NULL,
  `IdUtilisateur` int(11) DEFAULT NULL,
  `IDObjectif` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDCours`),
  UNIQUE KEY `ID_Cours_IND` (`IDCours`),
  KEY `FKetre_IND` (`IDTypeCours`),
  KEY `FKCreer_IND` (`IdUtilisateur`),
  KEY `correspond` (`IDObjectif`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`IDCours`, `NomCours`, `NombreDeParticipants`, `Date`, `Heure`, `IDTypeCours`, `IdUtilisateur`, `IDObjectif`) VALUES
(16, 'ConcoursImportant', 12, '2021-03-10', '23:43:00', 2, 7, NULL),
(19, 'ABSIntense', 43, '2021-01-11', '14:13:00', 1, 7, 2),
(20, 'UpperBody', 32, '2021-01-18', '12:50:00', 1, 7, 1),
(21, 'KickBoxing', 10, '2021-01-13', '21:30:00', 1, 7, 2),
(22, 'Zumba', 10, '2021-02-20', '07:00:00', 1, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gagner`
--

DROP TABLE IF EXISTS `gagner`;
CREATE TABLE IF NOT EXISTS `gagner` (
  `IDCours` int(11) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  `DateDeVictoire` date NOT NULL,
  PRIMARY KEY (`IDCours`,`IdUtilisateur`),
  UNIQUE KEY `ID_Gagner_IND` (`IDCours`,`IdUtilisateur`),
  KEY `FKGag_Uti_IND` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gagner`
--

INSERT INTO `gagner` (`IDCours`, `IdUtilisateur`, `DateDeVictoire`) VALUES
(16, 6, '2020-12-29'),
(16, 14, '2021-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `mouvement`
--

DROP TABLE IF EXISTS `mouvement`;
CREATE TABLE IF NOT EXISTS `mouvement` (
  `IDMouvement` int(11) NOT NULL AUTO_INCREMENT,
  `NomMouvement` varchar(50) NOT NULL,
  `DureePause` time NOT NULL,
  `DureeMouvement` time NOT NULL,
  PRIMARY KEY (`IDMouvement`),
  UNIQUE KEY `ID_Mouvement_IND` (`IDMouvement`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mouvement`
--

INSERT INTO `mouvement` (`IDMouvement`, `NomMouvement`, `DureePause`, `DureeMouvement`) VALUES
(1, 'Plank', '17:08:42', '00:06:42'),
(2, 'Crunches', '00:00:20', '00:04:00'),
(3, 'Downward Dog', '00:00:09', '00:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `noter`
--

DROP TABLE IF EXISTS `noter`;
CREATE TABLE IF NOT EXISTS `noter` (
  `IDCours` int(11) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  `DateDeNotation` date NOT NULL,
  `Commentaire` varchar(100) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`IDCours`,`IdUtilisateur`),
  UNIQUE KEY `ID_Noter_IND` (`IDCours`,`IdUtilisateur`),
  KEY `FKNot_Uti_IND` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noter`
--

INSERT INTO `noter` (`IDCours`, `IdUtilisateur`, `DateDeNotation`, `Commentaire`, `note`) VALUES
(21, 14, '2021-01-13', 'bien', 5);

-- --------------------------------------------------------

--
-- Table structure for table `objectif`
--

DROP TABLE IF EXISTS `objectif`;
CREATE TABLE IF NOT EXISTS `objectif` (
  `IDObjectif` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(100) NOT NULL,
  `NomObjectif` varchar(50) NOT NULL,
  PRIMARY KEY (`IDObjectif`),
  UNIQUE KEY `ID_Objectif_IND` (`IDObjectif`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objectif`
--

INSERT INTO `objectif` (`IDObjectif`, `Description`, `NomObjectif`) VALUES
(1, 'Prendre Xkg', 'Maigrir '),
(2, '', 'Prendre de la masse');

-- --------------------------------------------------------

--
-- Table structure for table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `IDCours` int(11) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  `DateDinscription` date NOT NULL,
  PRIMARY KEY (`IDCours`,`IdUtilisateur`),
  UNIQUE KEY `ID_Participer_IND` (`IDCours`,`IdUtilisateur`),
  KEY `FKPar_Uti_IND` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participer`
--

INSERT INTO `participer` (`IDCours`, `IdUtilisateur`, `DateDinscription`) VALUES
(16, 6, '2020-12-16'),
(16, 14, '2021-01-13'),
(20, 7, '2021-01-07'),
(21, 14, '2021-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `regime_alimentaire`
--

DROP TABLE IF EXISTS `regime_alimentaire`;
CREATE TABLE IF NOT EXISTS `regime_alimentaire` (
  `IDRegime` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Restriction` varchar(50) NOT NULL,
  PRIMARY KEY (`IDRegime`),
  UNIQUE KEY `ID_Regime_Alimentaire_IND` (`IDRegime`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regime_alimentaire`
--

INSERT INTO `regime_alimentaire` (`IDRegime`, `Nom`, `Restriction`) VALUES
(1, 'Omnivore', 'Pas de restrictions'),
(2, 'Vegan', 'Lait');

-- --------------------------------------------------------

--
-- Table structure for table `repas`
--

DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas` (
  `IDRepas` int(11) NOT NULL AUTO_INCREMENT,
  `NomRepas` varchar(50) NOT NULL,
  `NombreDeCalories` int(5) NOT NULL,
  `IdUtilisateur` int(11) DEFAULT NULL,
  `IDRegime` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDRepas`),
  UNIQUE KEY `ID_Repas_IND` (`IDRepas`),
  KEY `FKProposer_IND` (`IdUtilisateur`),
  KEY `FKAppartenir_IND` (`IDRegime`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repas`
--

INSERT INTO `repas` (`IDRepas`, `NomRepas`, `NombreDeCalories`, `IdUtilisateur`, `IDRegime`) VALUES
(1, 'Pancakes Vegan', 227, 7, 2),
(2, 'MEAL1', 32, 7, 1),
(4, 'Sticky miso peppers', 45, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `typecours`
--

DROP TABLE IF EXISTS `typecours`;
CREATE TABLE IF NOT EXISTS `typecours` (
  `IDTypeCours` int(11) NOT NULL AUTO_INCREMENT,
  `Categorie` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`IDTypeCours`),
  UNIQUE KEY `ID_TypeCours_IND` (`IDTypeCours`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typecours`
--

INSERT INTO `typecours` (`IDTypeCours`, `Categorie`, `Description`) VALUES
(1, 'Cours', 'Découvrez toutes nos séances et vidéos de fitness'),
(2, 'Concours', 'Tous les concours de la filière sportive');

-- --------------------------------------------------------

--
-- Table structure for table `typeutilisateur`
--

DROP TABLE IF EXISTS `typeutilisateur`;
CREATE TABLE IF NOT EXISTS `typeutilisateur` (
  `IDTypeUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Fonction` char(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`IDTypeUtilisateur`),
  UNIQUE KEY `ID_TypeUtilisateur_IND` (`IDTypeUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeutilisateur`
--

INSERT INTO `typeutilisateur` (`IDTypeUtilisateur`, `Fonction`, `Description`) VALUES
(1, 'Pratiquant', 'Personne praticant du sport sans fonctions supp'),
(2, 'Coach Sportif', 'Proposer des repas'),
(3, 'Coach Nutritionel', 'Proposer des repas');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `NomUtilisateur` varchar(50) NOT NULL,
  `MotDePasse` varchar(50) NOT NULL,
  `Sexe` char(1) NOT NULL,
  `DateDeNaissance` date NOT NULL,
  `IDRegime` int(11) DEFAULT NULL,
  `IDTypeUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdUtilisateur`),
  UNIQUE KEY `ID_Utilisateur_IND` (`IdUtilisateur`),
  KEY `FKSuivre_IND` (`IDRegime`),
  KEY `FKEtre_IND` (`IDTypeUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUtilisateur`, `Nom`, `Prenom`, `NomUtilisateur`, `MotDePasse`, `Sexe`, `DateDeNaissance`, `IDRegime`, `IDTypeUtilisateur`) VALUES
(4, 'AhmadAl', 'Ahmad', 'AAhmad21', '333DF', 'M', '2020-11-18', 1, 1),
(5, 'Ali', 'Ammar', 'Ammar2004', 'AMAMAM', 'M', '2020-11-18', 1, 1),
(6, 'Ali', 'Sarah', 'Sarah1', '4444', 'F', '2020-11-20', 1, 1),
(7, 'Fotso', 'Rebecca', 'FReb12', '1234', 'F', '2020-11-13', 1, 3),
(14, 'Johnny', 'Smith', 'JohnS', '1212', 'M', '2021-01-11', 2, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choisir`
--
ALTER TABLE `choisir`
  ADD CONSTRAINT `choisir1` FOREIGN KEY (`IDObjectif`) REFERENCES `objectif` (`IDObjectif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `choisir2` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`IdUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `contient1` FOREIGN KEY (`IDCours`) REFERENCES `cours` (`IDCours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contient2` FOREIGN KEY (`IDMouvement`) REFERENCES `mouvement` (`IDMouvement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `Etre1` FOREIGN KEY (`IDTypeCours`) REFERENCES `typecours` (`IDTypeCours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Participants` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`IdUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `correspond` FOREIGN KEY (`IDObjectif`) REFERENCES `objectif` (`IDObjectif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gagner`
--
ALTER TABLE `gagner`
  ADD CONSTRAINT `gagner1` FOREIGN KEY (`IDCours`) REFERENCES `cours` (`IDCours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gagner2` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`IdUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `noter`
--
ALTER TABLE `noter`
  ADD CONSTRAINT `noter1` FOREIGN KEY (`IDCours`) REFERENCES `cours` (`IDCours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `noter2` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`IdUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `Participer1` FOREIGN KEY (`IDCours`) REFERENCES `cours` (`IDCours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participer2` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`IdUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repas`
--
ALTER TABLE `repas`
  ADD CONSTRAINT `Appartenir` FOREIGN KEY (`IDRegime`) REFERENCES `regime_alimentaire` (`IDRegime`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Proposer` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`IdUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `Etre` FOREIGN KEY (`IDTypeUtilisateur`) REFERENCES `typeutilisateur` (`IDTypeUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Suivre` FOREIGN KEY (`IDRegime`) REFERENCES `regime_alimentaire` (`IDRegime`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
