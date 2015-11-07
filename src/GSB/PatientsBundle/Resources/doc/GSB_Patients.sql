-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 08 Avril 2014 à 15:07
-- Version du serveur: 5.5.35
-- Version de PHP: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `GSB_Patients`
--

-- --------------------------------------------------------

--
-- Structure de la table `Assure`
--

CREATE TABLE IF NOT EXISTS `Assure` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Assure`
--

INSERT INTO `Assure` (`id`) VALUES
(1),
(2),
(4),
(8),
(9);

-- --------------------------------------------------------

--
-- Structure de la table `Caisse`
--

CREATE TABLE IF NOT EXISTS `Caisse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomCaisse` varchar(255) COLLATE utf8_bin NOT NULL,
  `rueCaisse` varchar(255) COLLATE utf8_bin NOT NULL,
  `villeCaisse` varchar(255) COLLATE utf8_bin NOT NULL,
  `codePostalCaisse` varchar(5) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=44 ;

--
-- Contenu de la table `Caisse`
--

INSERT INTO `Caisse` (`id`, `nomCaisse`, `rueCaisse`, `villeCaisse`, `codePostalCaisse`) VALUES
(1, 'Caisse d''Aurillac', '20 rue des Lilas', 'Aurillac', '15000'),
(2, 'Caisse de Lyon', '63 rue de Gerland', 'Lyon', '69000'),
(3, 'Caisse de Paris', '12 avenue de la République', 'Paris', '75000'),
(5, 'Caisse de Lille', '25 avenue des Volontaires', 'Lille', '59000'),
(14, 'Caisse de Guadeloupe', '21 avenue des Charra', 'Basse-Terre', '971'),
(20, 'Caisse de Rennes', '2 rue du Thabo ', 'Rennes', '35065'),
(21, 'Caisse de Nouvelle C', '30 rue des Tulipes', 'Nouméa', '98800'),
(25, 'Caisse de Martinique', '1 rue Frères Tok ', 'Saint-Pierre', '97250'),
(43, 'Caisse de Montpellie', '5 rue de Bougnol ', 'Montpellier', '34080');

-- --------------------------------------------------------

--
-- Structure de la table `DemandeEntente`
--

CREATE TABLE IF NOT EXISTS `DemandeEntente` (
  `dateDemande` varchar(50) COLLATE utf8_bin NOT NULL,
  `dateFin` varchar(50) COLLATE utf8_bin NOT NULL,
  `reponse` varchar(100) COLLATE utf8_bin NOT NULL,
  `numDossier` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`dateDemande`,`numDossier`),
  KEY `numDossier` (`numDossier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `DemandeEntente`
--

INSERT INTO `DemandeEntente` (`dateDemande`, `dateFin`, `reponse`, `numDossier`) VALUES
('2013-12-02', '2014-01-05', 'Oui', '5'),
('2013-12-04', '2014-01-07', 'Non', '6'),
('2013-12-06', '2014-01-09', 'Oui', '7'),
('2013-12-08', '2014-01-17', 'Oui', '1'),
('2013-12-10', '2014-01-19', 'Non', '2'),
('2013-12-12', '2014-01-01', 'Non', '3'),
('2013-12-14', '2014-01-03', 'Oui', '4'),
('2013-12-16', '2014-01-11', 'Non', '8'),
('2013-12-18', '2014-01-13', 'Oui', '9'),
('2013-12-20', '2014-01-15', 'Oui', '10');

-- --------------------------------------------------------

--
-- Structure de la table `Dossier`
--

CREATE TABLE IF NOT EXISTS `Dossier` (
  `id` varchar(15) COLLATE utf8_bin NOT NULL,
  `dateEntree` varchar(50) COLLATE utf8_bin NOT NULL,
  `motifAdmission` varchar(30) COLLATE utf8_bin NOT NULL,
  `dateSortie` date NOT NULL,
  `codeOrigine` int(11) NOT NULL,
  `codeMedecinPrescripteur` int(11) NOT NULL,
  `codeMedecinTraitant` int(11) NOT NULL,
  `codeMotif` int(11) DEFAULT NULL,
  `codeCaisse` int(11) NOT NULL,
  `numPersonnePatient` int(11) NOT NULL,
  `numPersonneAssure` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `numPersonnePatient` (`numPersonnePatient`),
  KEY `numPersonneAssure` (`numPersonneAssure`),
  KEY `codeCaisse` (`codeCaisse`),
  KEY `codeMotif` (`codeMotif`),
  KEY `codeMedecinPrescripteur` (`codeMedecinPrescripteur`),
  KEY `codeMedecinTraitant` (`codeMedecinTraitant`),
  KEY `codeOrigine` (`codeOrigine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Dossier`
--

INSERT INTO `Dossier` (`id`, `dateEntree`, `motifAdmission`, `dateSortie`, `codeOrigine`, `codeMedecinPrescripteur`, `codeMedecinTraitant`, `codeMotif`, `codeCaisse`, `numPersonnePatient`, `numPersonneAssure`) VALUES
('1', '2013-12-03', 'aucun', '2013-12-27', 1, 1, 1, 1, 1, 1, NULL),
('10', '2013-12-03', 'aucun', '2013-12-27', 1, 3, 4, 5, 3, 1, NULL),
('11', '2013-12-03', 'aucun', '2013-12-27', 1, 3, 6, 5, 21, 1, NULL),
('12', '2013-12-03', 'aucun', '2013-12-27', 2, 3, 6, 5, 25, 1, NULL),
('2', '2013-12-03', 'aucun', '2013-12-27', 2, 2, 2, 2, 2, 2, NULL),
('3', '2013-12-03', 'aucun', '2013-12-27', 2, 3, 2, 2, 3, 2, NULL),
('4', '2013-12-03', 'aucun', '2013-12-27', 5, 3, 2, 2, 3, 2, NULL),
('5', '2013-12-03', 'aucun', '2013-12-27', 2, 3, 2, 2, 43, 2, NULL),
('6', '2013-12-03', 'aucun', '2013-12-27', 2, 3, 4, 2, 3, 2, NULL),
('7', '2013-12-03', 'aucun', '2013-12-27', 2, 3, 4, 5, 3, 2, NULL),
('8', '2013-12-03', 'aucun', '2013-12-27', 1, 3, 4, 5, 43, 2, NULL),
('9', '2013-12-03', 'aucun', '2013-12-27', 1, 3, 4, 5, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fosuser`
--

CREATE TABLE IF NOT EXISTS `fosuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9E0D886492FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_9E0D8864A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `fosuser`
--

INSERT INTO `fosuser` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'fabrice', 'fabrice', 'missonnier@gmail.com', 'missonnier@gmail.com', 1, 'a29i3o8s0qw484sokog04kw4004sccw', 'aq5MDvuxCXq6ucFslb0Vc7FZKiSDjR9tG+mFJeviWIQUBqf+0gO+YY5HjWtigEuzUu7QCE2rJG1dyLn1F25gAQ==', '2014-04-08 13:55:26', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(2, 'thomas', 'thomas', 'Toto01$1314', 'toto01$1314', 1, '8b80o432i50c0c444go4wwwgoowo4c4', '7i+7cUQv5H9r9jWsSGCCpDsVgKFXbOQQ+c+GQRM2Qr3MKal0b2QM6+9T7JvOZriFoI5poOTTAhBK6zzg+X12Aw==', '2014-04-08 14:14:09', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `LettreCle`
--

CREATE TABLE IF NOT EXISTS `LettreCle` (
  `id` varchar(20) COLLATE utf8_bin NOT NULL,
  `libelleLettreCle` varchar(50) COLLATE utf8_bin NOT NULL,
  `tarif` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `LettreCle`
--

INSERT INTO `LettreCle` (`id`, `libelleLettreCle`, `tarif`) VALUES
('AMO', 'Acte pratiqué par l''ortophoniste', 22),
('C', 'Consultation d''un médecin', 23),
('C2', 'Avis d''un consultant', 46),
('CA', 'Consultation de synthèse annuelle ALD', 26),
('CS', 'Consultation de spécialiste', 23),
('ORT', 'Traitement orthopédique', 18),
('SPR', 'Prothèse dentaire', 30),
('V', 'Visite à domicile', 28),
('VL', 'Visite longue', 46),
('VS', 'Visite de spécialiste', 23);

-- --------------------------------------------------------

--
-- Structure de la table `Medecin`
--

CREATE TABLE IF NOT EXISTS `Medecin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomMedecin` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenomMedecin` varchar(50) COLLATE utf8_bin NOT NULL,
  `rueMedecin` varchar(100) COLLATE utf8_bin NOT NULL,
  `villeMedecin` varchar(50) COLLATE utf8_bin NOT NULL,
  `codePostalMedecin` varchar(5) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Contenu de la table `Medecin`
--

INSERT INTO `Medecin` (`id`, `nomMedecin`, `prenomMedecin`, `rueMedecin`, `villeMedecin`, `codePostalMedecin`) VALUES
(1, 'Dupont', 'Jean', 'Rue du Cantal', 'Aurillac', '15000'),
(2, 'Dupond', 'Jacques', 'Rue du Lycée', 'Aurillac', '15000'),
(3, 'Dubois', 'Michel', 'Rue de la Paix', 'Aurillac', '15000'),
(4, 'Dupuis', 'Clara', 'Avenue de la Nation', 'Aurillac', '15000'),
(5, 'Dufour', 'Paulette', 'Rue du Centre', 'Aurillac', '15000'),
(6, 'Deford', 'Ginette', 'Route de l autoroute', 'Aurillac', '15000'),
(7, 'Delafourchette', 'Madeleine', 'Rue du Mont', 'Aurillac', '15000'),
(8, 'DelaToiture', 'Marie', 'Rue du gland', 'Aurillac', '15000'),
(9, 'Delache', 'Marcelle', 'Rue du Lac', 'Aurillac', '15000'),
(11, 'Christophe', 'Tok', '15 rue du vignoble', 'Bordeaux', '33000');

-- --------------------------------------------------------

--
-- Structure de la table `MotifSortie`
--

CREATE TABLE IF NOT EXISTS `MotifSortie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelleMotif` varchar(70) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Contenu de la table `MotifSortie`
--

INSERT INTO `MotifSortie` (`id`, `libelleMotif`) VALUES
(1, 'Changement d''établissement de santé'),
(2, 'Connaître les causes du décès du patient'),
(3, 'Faire valoir les droits du demandeur du dossier'),
(5, 'Demande par le tuteur du patient'),
(6, 'Défendre la mémoire du défunt'),
(7, 'Demande du patient');

-- --------------------------------------------------------

--
-- Structure de la table `Origine`
--

CREATE TABLE IF NOT EXISTS `Origine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelleOrigine` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Contenu de la table `Origine`
--

INSERT INTO `Origine` (`id`, `libelleOrigine`) VALUES
(1, 'infection'),
(2, 'traumatisme'),
(3, 'handicap physiques'),
(4, 'handicap intellectue'),
(5, 'Vomissements'),
(6, 'Raideur méningée'),
(7, 'Génétique'),
(8, 'Cardiaque'),
(9, 'Rhumatisme'),
(10, 'Obésité'),
(11, 'Neurologique'),
(12, 'Inflammatoire');

-- --------------------------------------------------------

--
-- Structure de la table `Patient`
--

CREATE TABLE IF NOT EXISTS `Patient` (
  `ruePatient` varchar(100) COLLATE utf8_bin NOT NULL,
  `villePatient` varchar(50) COLLATE utf8_bin NOT NULL,
  `codePostalPatient` varchar(5) COLLATE utf8_bin NOT NULL,
  `dateNaissance` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Contenu de la table `Patient`
--

INSERT INTO `Patient` (`ruePatient`, `villePatient`, `codePostalPatient`, `dateNaissance`, `id`) VALUES
('bd du pavatou', 'Aurillac', '15000', '1985-12-17', 1),
('bd Jean Jaures', 'Aurillac', '15000', '1945-12-27', 2),
('place du square', 'Aurillac', '15000', '1956-08-20', 3),
('rue de la republique', 'Aurillac', '15000', '1965-02-20', 4),
('rue napoleon', 'Aurillac', '15000', '1932-01-08', 5),
('rue du docteur chibr', 'Aurillac', '15000', '1987-12-24', 6),
('rue napoleon', 'Paris', '75000', '1945-12-23', 7),
('champ de mars', 'Paris', '75000', '1989-12-14', 8),
('place de la concorde', 'Paris', '75000', '2013-12-10', 9),
('avenue des champs el', 'Paris', '75000', '1935-12-19', 10);

-- --------------------------------------------------------

--
-- Structure de la table `Personne`
--

CREATE TABLE IF NOT EXISTS `Personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomPersonne` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenomPersonne` varchar(50) COLLATE utf8_bin NOT NULL,
  `numSS` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`id`, `nomPersonne`, `prenomPersonne`, `numSS`) VALUES
(1, 'Petrie', 'Jérôme', '1530275325410'),
(2, 'Lamarre', 'Charlotte', '2870724587020'),
(3, 'Michel', 'Marcelle', '2890115740001'),
(4, 'Forrest', 'Sylvain', '1740892541223'),
(5, 'Vaillancourt', 'Zoé', '2671265487200'),
(6, 'Rhéaume', 'Ernest', '1570214123321'),
(7, 'Lacaille', 'Alexis', '1750540456654'),
(8, 'Guertain', 'Gilbert', '1610909789987'),
(9, 'Boivin', 'Rosemarie', '2580165258852'),
(10, 'Riviere', 'Catherine', '2730832147741');

-- --------------------------------------------------------

--
-- Structure de la table `Planifier`
--

CREATE TABLE IF NOT EXISTS `Planifier` (
  `codeSoin` int(11) NOT NULL,
  `numDossier` varchar(15) COLLATE utf8_bin NOT NULL,
  `frequenceHebdo` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`numDossier`,`codeSoin`),
  KEY `codeSoin` (`codeSoin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Planifier`
--

INSERT INTO `Planifier` (`codeSoin`, `numDossier`, `frequenceHebdo`) VALUES
(0, '3', '');

-- --------------------------------------------------------

--
-- Structure de la table `Soin`
--

CREATE TABLE IF NOT EXISTS `Soin` (
  `id` int(11) NOT NULL,
  `libelleSoin` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Soin`
--

INSERT INTO `Soin` (`id`, `libelleSoin`) VALUES
(0, 'dfsdergeg'),
(1, 'Soin dentaire'),
(2, 'Soin orthopédique'),
(3, 'Soin psychiatrique'),
(4, 'Soin pédiatrique'),
(5, 'Soin ophtalmologique'),
(6, 'Soin nutritionnel'),
(7, 'Soin gériatrique'),
(8, 'Soin chirurgical'),
(9, 'Soin cardiologique'),
(10, 'Soin dermatologique'),
(11, 'Soin neurologique');

-- --------------------------------------------------------

--
-- Structure de la table `SoinBase`
--

CREATE TABLE IF NOT EXISTS `SoinBase` (
  `id` int(11) NOT NULL,
  `tempEstime` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `SoinBase`
--

INSERT INTO `SoinBase` (`id`, `tempEstime`) VALUES
(2, '24 '),
(7, '72 '),
(8, '48 '),
(10, '48 ');

-- --------------------------------------------------------

--
-- Structure de la table `SoinTechnique`
--

CREATE TABLE IF NOT EXISTS `SoinTechnique` (
  `id` int(11) NOT NULL,
  `coefficientActe` float NOT NULL,
  `idLettreCle` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idLettreCle` (`idLettreCle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `SoinTechnique`
--

INSERT INTO `SoinTechnique` (`id`, `coefficientActe`, `idLettreCle`) VALUES
(1, 15, 'AMO'),
(2, 35.25, 'C'),
(3, 10, 'C2'),
(4, 13.7, 'CA'),
(5, 5.6, 'CS'),
(6, 57.2, 'ORT'),
(7, 64, 'SPR'),
(8, 9.3, 'V'),
(9, 70, 'VL'),
(10, 32.5, 'VS'),
(11, 28.4, 'AMO');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Assure`
--
ALTER TABLE `Assure`
  ADD CONSTRAINT `Assure_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Personne` (`id`);

--
-- Contraintes pour la table `DemandeEntente`
--
ALTER TABLE `DemandeEntente`
  ADD CONSTRAINT `DemandeEntente_ibfk_1` FOREIGN KEY (`numDossier`) REFERENCES `Dossier` (`id`);

--
-- Contraintes pour la table `Dossier`
--
ALTER TABLE `Dossier`
  ADD CONSTRAINT `Dossier_ibfk_1` FOREIGN KEY (`numPersonnePatient`) REFERENCES `Patient` (`id`),
  ADD CONSTRAINT `Dossier_ibfk_2` FOREIGN KEY (`numPersonneAssure`) REFERENCES `Assure` (`id`),
  ADD CONSTRAINT `Dossier_ibfk_3` FOREIGN KEY (`codeCaisse`) REFERENCES `Caisse` (`id`),
  ADD CONSTRAINT `Dossier_ibfk_4` FOREIGN KEY (`codeMotif`) REFERENCES `MotifSortie` (`id`),
  ADD CONSTRAINT `Dossier_ibfk_5` FOREIGN KEY (`codeMedecinPrescripteur`) REFERENCES `Medecin` (`id`),
  ADD CONSTRAINT `Dossier_ibfk_6` FOREIGN KEY (`codeMedecinTraitant`) REFERENCES `Medecin` (`id`),
  ADD CONSTRAINT `Dossier_ibfk_7` FOREIGN KEY (`codeOrigine`) REFERENCES `Origine` (`id`);

--
-- Contraintes pour la table `Patient`
--
ALTER TABLE `Patient`
  ADD CONSTRAINT `Patient_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Personne` (`id`);

--
-- Contraintes pour la table `Planifier`
--
ALTER TABLE `Planifier`
  ADD CONSTRAINT `Planifier_ibfk_1` FOREIGN KEY (`codeSoin`) REFERENCES `Soin` (`id`),
  ADD CONSTRAINT `Planifier_ibfk_2` FOREIGN KEY (`numDossier`) REFERENCES `Dossier` (`id`);

--
-- Contraintes pour la table `SoinBase`
--
ALTER TABLE `SoinBase`
  ADD CONSTRAINT `SoinBase_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Soin` (`id`);

--
-- Contraintes pour la table `SoinTechnique`
--
ALTER TABLE `SoinTechnique`
  ADD CONSTRAINT `SoinTechnique_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Soin` (`id`),
  ADD CONSTRAINT `SoinTechnique_ibfk_2` FOREIGN KEY (`idLettreCle`) REFERENCES `LettreCle` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
