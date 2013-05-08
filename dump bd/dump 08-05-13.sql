-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 08 Mai 2013 à 12:37
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
-- Structure de la table `form_actualites`
--

CREATE TABLE IF NOT EXISTS `form_actualites` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `date_creation` datetime NOT NULL,
  `titre` varchar(60) NOT NULL,
  `contenu` longtext NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `form_actualites`
--

INSERT INTO `form_actualites` (`id`, `date_creation`, `titre`, `contenu`, `last_updated`) VALUES
(4, '2013-04-17 00:00:00', 'tests actu', 'ceci est une actualité', NULL),
(5, '2013-04-23 00:00:00', 'tests adzdzdctu', 'ceci eszdzdzdzdt une actualité', NULL),
(6, '2013-04-24 00:00:00', 'erfref fefeff', 'efefef fefefef fefef', NULL),
(7, '2013-10-24 00:00:00', 'erfref fefeff', 'efefef fefefef fefef', NULL),
(8, '2013-10-24 00:00:00', 'erfref fefeff', 'efefef fefefef fefef', NULL),
(9, '2013-10-24 00:00:00', 'erfref fefeff', 'efefef fefefef fefef', NULL),
(10, '2013-10-24 00:00:00', 'erfref fefeff', 'efefef fefefef fefef', NULL),
(11, '2013-10-24 00:00:00', 'erfref fefeff', 'efefef fefefef fefef', NULL),
(12, '2013-04-22 16:27:00', 'Nouveau titre de news', 'zifheifhf zojzeffj\r\ndzoddd dz dzdzdkd dzdzdzkd ', NULL),
(13, '2030-04-22 16:33:00', 'zeeIHJIÃ–ZDFHIDFHIUHF', 'zfiehjfekijeiofjeiof', NULL),
(14, '2030-04-22 16:33:00', 'zeeIHJIÃ–ZDFHIDFHIUHF', 'zfiehjfekijeiofjeiof', NULL),
(15, '2013-05-02 00:00:00', 'éééééééééé&eacute;', 'ééééééééé&eacute;', NULL),
(16, '2013-05-25 00:00:00', 'ééééééé', 'ééééééé', NULL),
(17, '2013-05-03 11:15:00', '', '', '2013-05-03 11:15:00');

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
-- Structure de la table `form_clans`
--

CREATE TABLE IF NOT EXISTS `form_clans` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `form_clans`
--

INSERT INTO `form_clans` (`id`, `nom`) VALUES
(1, 'Les tortulagules'),
(2, 'Les perchmans');

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
  `afficher` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `localisation_id` (`localisation_id`),
  KEY `horaire` (`horaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `form_defis`
--

INSERT INTO `form_defis` (`id`, `nom`, `demandeur`, `horaire`, `ip_demandeur`, `nature`, `localisation_id`, `nbr_etu`, `principe_orga`, `orga_equipe_projet`, `precautions`, `resultats`, `valo_citoyenne`, `valo_media`, `etapes`, `commentaires`, `date_soumission`, `afficher`) VALUES
(19, 'Le dÃ©fi Test', 'Hugo Rodde', 2, '195.83.155.55', 'Simple', 12, 123, '', '', '', '', '', '', '', '', '2013-04-09 19:09:00', 0),
(20, 'tests', 'efefef', 2, '', '', 12, 0, '', '', '', '', '', '', '', '', '2013-05-02 00:00:00', 0),
(22, 'Defis drapeau', 'Asso drapeau', 7, '', '', 13, 111, '', '', '', '', '', '', '', '', '2013-05-04 16:00:00', 0),
(23, 'Defis voiture', 'Ferrari', 5, '', '', 12, 10, '', '', '', '', '', '', '', '', '2013-05-04 16:00:00', 0),
(24, 'Test', 'Test', 1, '', '', 12, 3, '', '', '', '', '', '', '', '', '2013-05-04 16:01:00', 0);

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
-- Structure de la table `form_defis_clans`
--

CREATE TABLE IF NOT EXISTS `form_defis_clans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `defi_id` int(11) NOT NULL,
  `clan_id` int(4) NOT NULL,
  `nbVotesPour` int(11) DEFAULT NULL,
  `nbVotesContre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `defi_clan_id` (`defi_id`,`clan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `form_defis_clans`
--

INSERT INTO `form_defis_clans` (`id`, `defi_id`, `clan_id`, `nbVotesPour`, `nbVotesContre`) VALUES
(3, 19, 1, NULL, NULL);

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
(20, 14);

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
-- Structure de la table `form_departements`
--

CREATE TABLE IF NOT EXISTS `form_departements` (
  `num_departement` varchar(2) NOT NULL,
  `num_region` varchar(2) NOT NULL,
  `nom` char(32) NOT NULL,
  PRIMARY KEY (`num_departement`),
  KEY `FK_DEPARTEMENT_REGION` (`num_region`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `form_departements`
--

INSERT INTO `form_departements` (`num_departement`, `num_region`, `nom`) VALUES
('1', '22', 'Ain'),
('10', '8', 'Aube'),
('11', '13', 'Aude'),
('12', '16', 'Aveyron'),
('13', '18', 'Bouches du rhône'),
('14', '4', 'Calvados'),
('15', '3', 'Cantal'),
('16', '21', 'Charente'),
('17', '21', 'Charente maritime'),
('18', '7', 'Cher'),
('19', '14', 'Corrèze'),
('2', '20', 'Aisne'),
('21', '5', 'Côte d''or'),
('22', '6', 'Côtes d''Armor'),
('23', '14', 'Creuse'),
('24', '2', 'Dordogne'),
('25', '10', 'Doubs'),
('26', '22', 'Drôme'),
('27', '11', 'Eure'),
('28', '7', 'Eure et Loir'),
('29', '6', 'Finistère'),
('2a', '9', 'Corse du Sud'),
('2b', '9', 'Haute Corse'),
('3', '3', 'Allier'),
('30', '13', 'Gard'),
('31', '16', 'Haute garonne'),
('32', '16', 'Gers'),
('33', '2', 'Gironde'),
('34', '13', 'Hérault'),
('35', '6', 'Ile et Vilaine'),
('36', '7', 'Indre'),
('37', '7', 'Indre et Loire'),
('38', '22', 'Isère'),
('39', '10', 'Jura'),
('4', '18', 'Alpes de haute provence'),
('40', '2', 'Landes'),
('41', '7', 'Loir et Cher'),
('42', '22', 'Loire'),
('43', '3', 'Haute loire'),
('44', '19', 'Loire Atlantique'),
('45', '7', 'Loiret'),
('46', '16', 'Lot'),
('47', '2', 'Lot et Garonne'),
('48', '13', 'Lozère'),
('49', '19', 'Maine et Loire'),
('5', '18', 'Hautes alpes'),
('50', '4', 'Manche'),
('51', '8', 'Marne'),
('52', '8', 'Haute Marne'),
('53', '19', 'Mayenne'),
('54', '15', 'Meurthe et Moselle'),
('55', '15', 'Meuse'),
('56', '6', 'Morbihan'),
('57', '15', 'Moselle'),
('58', '5', 'Nièvre'),
('59', '17', 'Nord'),
('6', '18', 'Alpes maritimes'),
('60', '20', 'Oise'),
('61', '4', 'Orne'),
('62', '17', 'Pas de Calais'),
('63', '3', 'Puy de Dôme'),
('64', '2', 'Pyrénées Atlantiques'),
('65', '16', 'Hautes Pyrénées'),
('66', '13', 'Pyrénées Orientales'),
('67', '1', 'Bas Rhin'),
('68', '1', 'Haut Rhin'),
('69', '22', 'Rhône'),
('7', '22', 'Ardèche'),
('70', '10', 'Haute Saône'),
('71', '5', 'Saône et Loire'),
('72', '19', 'Sarthe'),
('73', '22', 'Savoie'),
('74', '22', 'Haute Savoie'),
('75', '12', 'Paris'),
('76', '11', 'Seine Maritime'),
('77', '12', 'Seine et Marne'),
('78', '12', 'Yvelines'),
('79', '21', 'Deux Sèvres'),
('8', '8', 'Ardennes'),
('80', '20', 'Somme'),
('81', '16', 'Tarn'),
('82', '16', 'Tarn et Garonne'),
('83', '18', 'Var'),
('84', '18', 'Vaucluse'),
('85', '19', 'Vendée'),
('86', '21', 'Vienne'),
('87', '14', 'Haute Vienne'),
('88', '15', 'Vosge'),
('89', '5', 'Yonne'),
('9', '16', 'Ariège'),
('90', '10', 'Territoire de Belfort'),
('91', '12', 'Essonne'),
('92', '12', 'Haut de seine'),
('93', '12', 'Seine Saint Denis'),
('94', '12', 'Val de Marne'),
('95', '12', 'Val d''Oise');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `form_localisations`
--

INSERT INTO `form_localisations` (`localisation_id`, `lieu`) VALUES
(12, 'BF'),
(13, 'Royallieux');

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
-- Structure de la table `form_messages`
--

CREATE TABLE IF NOT EXISTS `form_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fk_entite` int(11) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entite` (`fk_entite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `form_partenaires`
--

CREATE TABLE IF NOT EXISTS `form_partenaires` (
  `partenaire_id` int(11) NOT NULL AUTO_INCREMENT,
  `partenaire` varchar(255) NOT NULL,
  `adresseWeb` varchar(100) DEFAULT NULL,
  `cp` int(5) NOT NULL,
  `description` text NOT NULL,
  `fichierLogo` varchar(250) DEFAULT NULL,
  `departement_id` varchar(2) DEFAULT NULL,
  `afficher` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`partenaire_id`),
  UNIQUE KEY `partenaire` (`partenaire`),
  KEY `fk_partenaire_departement` (`departement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `form_partenaires`
--

INSERT INTO `form_partenaires` (`partenaire_id`, `partenaire`, `adresseWeb`, `cp`, `description`, `fichierLogo`, `departement_id`, `afficher`) VALUES
(13, 'ww', '', 31300, '', '', '16', 0),
(14, 'xx', '', 0, '', '', '1', 0),
(15, 'cc', NULL, 0, '', NULL, NULL, 0),
(16, 'vv', NULL, 0, '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `form_photos`
--

CREATE TABLE IF NOT EXISTS `form_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fichier` varchar(50) NOT NULL,
  `afficher` tinyint(1) DEFAULT '0',
  `clan_id` int(4) NOT NULL,
  `defi_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `form_photos`
--

INSERT INTO `form_photos` (`id`, `nom_fichier`, `afficher`, `clan_id`, `defi_id`) VALUES
(1, 'test.png', 0, 2, 20);

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
-- Structure de la table `form_regions`
--

CREATE TABLE IF NOT EXISTS `form_regions` (
  `num_region` varchar(2) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`num_region`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `form_regions`
--

INSERT INTO `form_regions` (`num_region`, `nom`) VALUES
('1', 'Alsace'),
('10', 'Franche Comte'),
('11', 'Haute Normandie'),
('12', 'Ile de France'),
('13', 'Languedoc Roussillon'),
('14', 'Limousin'),
('15', 'Lorraine'),
('16', 'Midi-Pyrénées'),
('17', 'Nord Pas de Calais'),
('18', 'Provence Alpes Côte d''Azur'),
('19', 'Pays de la Loire'),
('2', 'Aquitaine'),
('20', 'Picardie'),
('21', 'Poitou Charente'),
('22', 'Rhone Alpes'),
('3', 'Auvergne'),
('4', 'Basse Normandie'),
('5', 'Bourgogne'),
('6', 'Bretagne'),
('7', 'Centre'),
('8', 'Champagne Ardenne'),
('9', 'Corse');

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
-- Structure de la table `form_users`
--

CREATE TABLE IF NOT EXISTS `form_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `clan_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `form_users`
--

INSERT INTO `form_users` (`id`, `login`, `password`, `clan_id`) VALUES
(2, 'test', '5f0745c5c50dbe007d5912d44396d220decdece5', NULL),
(4, 'admin', '5f0745c5c50dbe007d5912d44396d220decdece5', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `form_defis`
--
ALTER TABLE `form_defis`
  ADD CONSTRAINT `form_defis_ibfk_1` FOREIGN KEY (`horaire`) REFERENCES `form_horaires` (`horaire_id`),
  ADD CONSTRAINT `form_defis_ibfk_2` FOREIGN KEY (`localisation_id`) REFERENCES `form_localisations` (`localisation_id`);

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

--
-- Contraintes pour la table `form_departements`
--
ALTER TABLE `form_departements`
  ADD CONSTRAINT `form_departements_ibfk_1` FOREIGN KEY (`num_region`) REFERENCES `form_regions` (`num_region`);

--
-- Contraintes pour la table `form_partenaires`
--
ALTER TABLE `form_partenaires`
  ADD CONSTRAINT `fk_partenaire_departement` FOREIGN KEY (`departement_id`) REFERENCES `form_departements` (`num_departement`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
