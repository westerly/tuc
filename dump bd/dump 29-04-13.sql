-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 29 Avril 2013 à 18:52
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tuc`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE IF NOT EXISTS `actualites` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `titre` varchar(60) NOT NULL,
  `contenu` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `actualites`
--

INSERT INTO `actualites` (`id`, `date`, `titre`, `contenu`) VALUES
(4, '2013-04-17 00:00:00', 'tests actu', 'ceci est une actualité'),
(5, '2013-04-23 00:00:00', 'tests adzdzdctu', 'ceci eszdzdzdzdt une actualité'),
(6, '2013-04-24 00:00:00', 'erfref fefeff', 'efefef fefefef fefef'),
(7, '2013-10-24 00:00:00', 'erfref fefeff', 'efefef fefefef fefef'),
(8, '2013-10-24 00:00:00', 'erfref fefeff', 'efefef fefefef fefef'),
(9, '2013-10-24 00:00:00', 'erfref fefeff', 'efefef fefefef fefef'),
(10, '2013-10-24 00:00:00', 'erfref fefeff', 'efefef fefefef fefef'),
(11, '2013-10-24 00:00:00', 'erfref fefeff', 'efefef fefefef fefef'),
(12, '2013-04-22 16:27:00', 'Nouveau titre de news', 'zifheifhf zojzeffj\r\ndzoddd dz dzdzdkd dzdzdzkd '),
(13, '2030-04-22 16:33:00', 'zeeIHJIÃ–ZDFHIDFHIUHF', 'zfiehjfekijeiofjeiof'),
(14, '2030-04-22 16:33:00', 'zeeIHJIÃ–ZDFHIDFHIUHF', 'zfiehjfekijeiofjeiof');

-- --------------------------------------------------------

--
-- Structure de la table `form_associations`
--

CREATE TABLE IF NOT EXISTS `form_associations` (
  `association_id` int(11) NOT NULL AUTO_INCREMENT,
  `association` varchar(80) NOT NULL,
  PRIMARY KEY (`association_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `form_associations`
--

INSERT INTO `form_associations` (`association_id`, `association`) VALUES
(17, 'qq'),
(18, 'ss'),
(19, 'dd'),
(20, 'ff');

-- --------------------------------------------------------

--
-- Structure de la table `form_defis`
--

CREATE TABLE IF NOT EXISTS `form_defis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `demandeur` varchar(255) NOT NULL,
  `horaire` int(11) NOT NULL,
  `ip_demandeur` char(15) NOT NULL,
  `nature` varchar(160) NOT NULL,
  `localisation_id` int(11) NOT NULL,
  `nbr_etu` int(11) NOT NULL,
  `principe_orga` text NOT NULL,
  `orga_equipe_projet` text NOT NULL,
  `precautions` text NOT NULL,
  `resultats` text NOT NULL,
  `valo_citoyenne` text NOT NULL,
  `valo_media` text NOT NULL,
  `etapes` text NOT NULL,
  `commentaires` text NOT NULL,
  `date_soumission` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `localisation_id` (`localisation_id`),
  KEY `horaire` (`horaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `form_defis`
--

INSERT INTO `form_defis` (`id`, `nom`, `demandeur`, `horaire`, `ip_demandeur`, `nature`, `localisation_id`, `nbr_etu`, `principe_orga`, `orga_equipe_projet`, `precautions`, `resultats`, `valo_citoyenne`, `valo_media`, `etapes`, `commentaires`, `date_soumission`) VALUES
(19, 'Le dÃ©fi Test', 'Hugo Rodde', 2, '195.83.155.55', 'Simple', 12, 123, '', '', '', '', '', '', '', '', '2013-04-09 19:09:02');

-- --------------------------------------------------------

--
-- Structure de la table `form_defis_associations`
--

CREATE TABLE IF NOT EXISTS `form_defis_associations` (
  `defi_id` int(11) NOT NULL,
  `association_id` int(11) NOT NULL,
  PRIMARY KEY (`defi_id`,`association_id`),
  KEY `association_id` (`association_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `form_defis_associations`
--

INSERT INTO `form_defis_associations` (`defi_id`, `association_id`) VALUES
(19, 17),
(19, 18),
(19, 19),
(19, 20);

-- --------------------------------------------------------

--
-- Structure de la table `form_defis_entites`
--

CREATE TABLE IF NOT EXISTS `form_defis_entites` (
  `defi_id` int(11) NOT NULL,
  `entite_id` int(11) NOT NULL,
  PRIMARY KEY (`defi_id`,`entite_id`),
  KEY `entite_id` (`entite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `form_defis_entites`
--

INSERT INTO `form_defis_entites` (`defi_id`, `entite_id`) VALUES
(19, 31),
(19, 32);

-- --------------------------------------------------------

--
-- Structure de la table `form_defis_materiels`
--

CREATE TABLE IF NOT EXISTS `form_defis_materiels` (
  `defi_id` int(11) NOT NULL,
  `materiel_id` int(11) NOT NULL,
  PRIMARY KEY (`defi_id`,`materiel_id`),
  KEY `materiel_id` (`materiel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `form_defis_materiels`
--

INSERT INTO `form_defis_materiels` (`defi_id`, `materiel_id`) VALUES
(19, 22),
(19, 23),
(19, 24),
(19, 25);

-- --------------------------------------------------------

--
-- Structure de la table `form_defis_partenaires`
--

CREATE TABLE IF NOT EXISTS `form_defis_partenaires` (
  `defi_id` int(11) NOT NULL,
  `partenaire_id` int(11) NOT NULL,
  PRIMARY KEY (`defi_id`,`partenaire_id`),
  KEY `partenaire_id` (`partenaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `form_defis_partenaires`
--

INSERT INTO `form_defis_partenaires` (`defi_id`, `partenaire_id`) VALUES
(19, 13),
(19, 14),
(19, 15),
(19, 16);

-- --------------------------------------------------------

--
-- Structure de la table `form_defis_profils`
--

CREATE TABLE IF NOT EXISTS `form_defis_profils` (
  `defi_id` int(11) NOT NULL,
  `profil_id` int(11) NOT NULL,
  PRIMARY KEY (`defi_id`,`profil_id`),
  KEY `profil_id` (`profil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `form_defis_profils`
--

INSERT INTO `form_defis_profils` (`defi_id`, `profil_id`) VALUES
(19, 25),
(19, 26),
(19, 27),
(19, 28),
(19, 29);

-- --------------------------------------------------------

--
-- Structure de la table `form_defis_superviseurs`
--

CREATE TABLE IF NOT EXISTS `form_defis_superviseurs` (
  `defi_id` int(11) NOT NULL,
  `superviseur_id` int(11) NOT NULL,
  PRIMARY KEY (`defi_id`,`superviseur_id`),
  KEY `superviseur_id` (`superviseur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `form_defis_superviseurs`
--

INSERT INTO `form_defis_superviseurs` (`defi_id`, `superviseur_id`) VALUES
(19, 39),
(19, 40);

-- --------------------------------------------------------

--
-- Structure de la table `form_entites`
--

CREATE TABLE IF NOT EXISTS `form_entites` (
  `entite_id` int(11) NOT NULL AUTO_INCREMENT,
  `entite` varchar(160) NOT NULL,
  `type` enum('Collectivite','UTC','Partenaire','Association') NOT NULL,
  PRIMARY KEY (`entite_id`),
  UNIQUE KEY `entite` (`entite`,`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `form_entites`
--

INSERT INTO `form_entites` (`entite_id`, `entite`, `type`) VALUES
(31, 'Direction', 'UTC'),
(32, 'Integ', 'Association');

-- --------------------------------------------------------

--
-- Structure de la table `form_horaires`
--

CREATE TABLE IF NOT EXISTS `form_horaires` (
  `horaire_id` int(11) NOT NULL AUTO_INCREMENT,
  `horaire` varchar(60) NOT NULL,
  PRIMARY KEY (`horaire_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `form_horaires`
--

INSERT INTO `form_horaires` (`horaire_id`, `horaire`) VALUES
(1, 'Matinée'),
(2, 'Midi'),
(3, 'Après-Midi'),
(4, 'Début d''après-midi'),
(5, 'Fin d''après-midi'),
(6, 'Soirée'),
(7, 'Journée Entière');

-- --------------------------------------------------------

--
-- Structure de la table `form_localisations`
--

CREATE TABLE IF NOT EXISTS `form_localisations` (
  `localisation_id` int(11) NOT NULL AUTO_INCREMENT,
  `lieu` varchar(160) NOT NULL,
  PRIMARY KEY (`localisation_id`),
  UNIQUE KEY `lieu` (`lieu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `form_localisations`
--

INSERT INTO `form_localisations` (`localisation_id`, `lieu`) VALUES
(12, 'BF');

-- --------------------------------------------------------

--
-- Structure de la table `form_materiels`
--

CREATE TABLE IF NOT EXISTS `form_materiels` (
  `materiel_id` int(11) NOT NULL AUTO_INCREMENT,
  `materiel` varchar(255) NOT NULL,
  PRIMARY KEY (`materiel_id`),
  UNIQUE KEY `materiel` (`materiel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `form_materiels`
--

INSERT INTO `form_materiels` (`materiel_id`, `materiel`) VALUES
(22, 'aa'),
(24, 'ere'),
(25, 'rr'),
(23, 'zz');

-- --------------------------------------------------------

--
-- Structure de la table `form_partenaires`
--

CREATE TABLE IF NOT EXISTS `form_partenaires` (
  `partenaire_id` int(11) NOT NULL AUTO_INCREMENT,
  `partenaire` varchar(255) NOT NULL,
  PRIMARY KEY (`partenaire_id`),
  UNIQUE KEY `partenaire` (`partenaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `form_partenaires`
--

INSERT INTO `form_partenaires` (`partenaire_id`, `partenaire`) VALUES
(15, 'cc'),
(16, 'vv'),
(13, 'ww'),
(14, 'xx');

-- --------------------------------------------------------

--
-- Structure de la table `form_profils`
--

CREATE TABLE IF NOT EXISTS `form_profils` (
  `profil_id` int(11) NOT NULL AUTO_INCREMENT,
  `profil` varchar(255) NOT NULL,
  PRIMARY KEY (`profil_id`),
  UNIQUE KEY `profil` (`profil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `form_profils`
--

INSERT INTO `form_profils` (`profil_id`, `profil`) VALUES
(25, 'aa'),
(27, 'ee'),
(28, 'rr'),
(29, 'tt'),
(26, 'zz');

-- --------------------------------------------------------

--
-- Structure de la table `form_superviseurs`
--

CREATE TABLE IF NOT EXISTS `form_superviseurs` (
  `superviseur_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  `prenom` varchar(80) NOT NULL,
  `fonction` varchar(160) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` char(10) NOT NULL,
  `entite_id` int(11) NOT NULL,
  `entite_type` enum('Collectivite','UTC','Partenaire','Association') NOT NULL,
  PRIMARY KEY (`superviseur_id`),
  UNIQUE KEY `nom` (`email`,`entite_id`),
  KEY `entite_id` (`entite_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `form_superviseurs`
--

INSERT INTO `form_superviseurs` (`superviseur_id`, `nom`, `prenom`, `fonction`, `email`, `tel`, `entite_id`, `entite_type`) VALUES
(39, 'Azerty', 'Uiop', 'resp', 'azeer.fdf@utc.fr', '0623568978', 31, 'UTC'),
(40, 'Qsdfg', 'jkl', 'uio', 'dsds@ufd.fr', '0612457845', 32, 'Association');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `titre` varchar(60) NOT NULL,
  `contenu` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `date`, `titre`, `contenu`) VALUES
(1, '2010-05-13 00:00:00', 'News Test', 'Ceci est une news test');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `form_defis_associations`
--
ALTER TABLE `form_defis_associations`
  ADD CONSTRAINT `form_defis_associations_ibfk_1` FOREIGN KEY (`defi_id`) REFERENCES `form_defis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_defis_associations_ibfk_2` FOREIGN KEY (`association_id`) REFERENCES `form_associations` (`association_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `form_defis_entites`
--
ALTER TABLE `form_defis_entites`
  ADD CONSTRAINT `form_defis_entites_ibfk_1` FOREIGN KEY (`defi_id`) REFERENCES `form_defis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_defis_entites_ibfk_2` FOREIGN KEY (`entite_id`) REFERENCES `form_entites` (`entite_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `form_defis_materiels`
--
ALTER TABLE `form_defis_materiels`
  ADD CONSTRAINT `form_defis_materiels_ibfk_1` FOREIGN KEY (`defi_id`) REFERENCES `form_defis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_defis_materiels_ibfk_2` FOREIGN KEY (`materiel_id`) REFERENCES `form_materiels` (`materiel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `form_defis_partenaires`
--
ALTER TABLE `form_defis_partenaires`
  ADD CONSTRAINT `form_defis_partenaires_ibfk_1` FOREIGN KEY (`defi_id`) REFERENCES `form_defis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_defis_partenaires_ibfk_2` FOREIGN KEY (`partenaire_id`) REFERENCES `form_partenaires` (`partenaire_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `form_defis_profils`
--
ALTER TABLE `form_defis_profils`
  ADD CONSTRAINT `form_defis_profils_ibfk_1` FOREIGN KEY (`defi_id`) REFERENCES `form_defis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_defis_profils_ibfk_2` FOREIGN KEY (`profil_id`) REFERENCES `form_profils` (`profil_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `form_defis_superviseurs`
--
ALTER TABLE `form_defis_superviseurs`
  ADD CONSTRAINT `form_defis_superviseurs_ibfk_1` FOREIGN KEY (`defi_id`) REFERENCES `form_defis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_defis_superviseurs_ibfk_2` FOREIGN KEY (`superviseur_id`) REFERENCES `form_superviseurs` (`superviseur_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
