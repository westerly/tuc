-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Serveur: sql.mde.utc:3306
-- Généré le : Lun 17 Juin 2013 à 21:59
-- Version du serveur: 5.5.30
-- Version de PHP: 5.3.25-1~dotdeb.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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

DROP TABLE IF EXISTS `form_actualites`;
CREATE TABLE IF NOT EXISTS `form_actualites` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `date_creation` datetime NOT NULL,
  `titre` varchar(60) NOT NULL,
  `contenu` longtext NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `form_actualites`
--

INSERT INTO `form_actualites` (`id`, `date_creation`, `titre`, `contenu`, `last_updated`) VALUES
(22, '2013-06-12 16:43:53', 'Site web', 'Le site web est en cours de finalisation. Merci', '2013-06-12 16:43:53');

-- --------------------------------------------------------

--
-- Structure de la table `form_associations`
--

DROP TABLE IF EXISTS `form_associations`;
CREATE TABLE IF NOT EXISTS `form_associations` (
  `association_id` int(11) NOT NULL AUTO_INCREMENT,
  `association` varchar(80) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`association_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `form_associations`
--


-- --------------------------------------------------------

--
-- Structure de la table `form_clans`
--

DROP TABLE IF EXISTS `form_clans`;
CREATE TABLE IF NOT EXISTS `form_clans` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `form_clans`
--

INSERT INTO `form_clans` (`id`, `nom`) VALUES
(1, 'Varelbor'),
(3, 'Tampilaguul'),
(4, 'Youarille'),
(5, 'Klarf Binn');

-- --------------------------------------------------------

--
-- Structure de la table `form_defis`
--

DROP TABLE IF EXISTS `form_defis`;
CREATE TABLE IF NOT EXISTS `form_defis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET latin1 NOT NULL,
  `demandeur` varchar(255) CHARACTER SET latin1 NOT NULL,
  `horaire` int(11) NOT NULL,
  `ip_demandeur` char(15) CHARACTER SET latin1 NOT NULL,
  `nature` varchar(160) CHARACTER SET latin1 NOT NULL,
  `localisation_id` int(11) NOT NULL,
  `nbr_etu` int(11) NOT NULL,
  `principe_orga` text CHARACTER SET latin1 NOT NULL,
  `orga_equipe_projet` text CHARACTER SET latin1 NOT NULL,
  `precautions` text CHARACTER SET latin1 NOT NULL,
  `resultats` text CHARACTER SET latin1 NOT NULL,
  `valo_citoyenne` text CHARACTER SET latin1 NOT NULL,
  `valo_media` text CHARACTER SET latin1 NOT NULL,
  `etapes` text CHARACTER SET latin1 NOT NULL,
  `commentaires` text CHARACTER SET latin1 NOT NULL,
  `date_soumission` datetime NOT NULL,
  `afficher` tinyint(1) DEFAULT '0',
  `demandeur_tel` char(10) CHARACTER SET latin1 DEFAULT NULL,
  `demandeur_mail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `localisation_id` (`localisation_id`),
  KEY `horaire` (`horaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `form_defis`
--

INSERT INTO `form_defis` (`id`, `nom`, `demandeur`, `horaire`, `ip_demandeur`, `nature`, `localisation_id`, `nbr_etu`, `principe_orga`, `orga_equipe_projet`, `precautions`, `resultats`, `valo_citoyenne`, `valo_media`, `etapes`, `commentaires`, `date_soumission`, `afficher`, `demandeur_tel`, `demandeur_mail`) VALUES
(30, 'Vélos Roberval', 'CROUS', 1, '194.254.133.226', 'Réparation vélos abandonnés', 24, 10, '', '', '', 'remettre des vélos abandonnés par des étudiants en état de rouler pour les nouveaux arrivants', '', '', '', '', '2013-06-11 17:13:00', 1, '0322719110', 'f.joly@crous-amiens.fr'),
(31, 'Coup de main verte dans un foyer de l''arche à  compiègne', 'Le Levain', 7, '62.244.88.16', 'Avec un animateur du foyer, préparer des plates bandes et massifs (désherbages, nivelage) et planter  des végétaux', 25, 0, '', '', '', 'Un bel environnement pour un foyer de personnes en situation de handicap mental, à l''entrée de l''automne, donnant envie de l''entretenir pas ses habitants', 'Apéritif avec les personnes accueillies au foyer en fin d''après-midi', '', '', 'Deux étudiants ou plus peuvent participer à ce défi. ', '2013-06-12 10:39:00', 1, '', 'l''arche Ã  CompiÃ¨gne');

-- --------------------------------------------------------

--
-- Structure de la table `form_defis_associations`
--

DROP TABLE IF EXISTS `form_defis_associations`;
CREATE TABLE IF NOT EXISTS `form_defis_associations` (
  `defi_id` int(11) NOT NULL,
  `association_id` int(11) NOT NULL,
  PRIMARY KEY (`defi_id`,`association_id`),
  KEY `association_id` (`association_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `form_defis_associations`
--


-- --------------------------------------------------------

--
-- Structure de la table `form_defis_clans`
--

DROP TABLE IF EXISTS `form_defis_clans`;
CREATE TABLE IF NOT EXISTS `form_defis_clans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `defi_id` int(11) NOT NULL,
  `clan_id` int(4) NOT NULL,
  `nbVotesPour` int(11) DEFAULT NULL,
  `nbVotesContre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `defi_clan_id` (`defi_id`,`clan_id`),
  KEY `clan_id` (`clan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `form_defis_clans`
--

INSERT INTO `form_defis_clans` (`id`, `defi_id`, `clan_id`, `nbVotesPour`, `nbVotesContre`) VALUES
(9, 31, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `form_defis_entites`
--

DROP TABLE IF EXISTS `form_defis_entites`;
CREATE TABLE IF NOT EXISTS `form_defis_entites` (
  `defi_id` int(11) NOT NULL,
  `entite_id` int(11) NOT NULL,
  PRIMARY KEY (`defi_id`,`entite_id`),
  KEY `entite_id` (`entite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `form_defis_entites`
--

INSERT INTO `form_defis_entites` (`defi_id`, `entite_id`) VALUES
(31, 44),
(30, 45);

-- --------------------------------------------------------

--
-- Structure de la table `form_defis_materiels`
--

DROP TABLE IF EXISTS `form_defis_materiels`;
CREATE TABLE IF NOT EXISTS `form_defis_materiels` (
  `defi_id` int(11) NOT NULL,
  `materiel_id` int(11) NOT NULL,
  PRIMARY KEY (`defi_id`,`materiel_id`),
  KEY `materiel_id` (`materiel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `form_defis_materiels`
--


-- --------------------------------------------------------

--
-- Structure de la table `form_defis_partenaires`
--

DROP TABLE IF EXISTS `form_defis_partenaires`;
CREATE TABLE IF NOT EXISTS `form_defis_partenaires` (
  `defi_id` int(11) NOT NULL,
  `partenaire_id` int(11) NOT NULL,
  PRIMARY KEY (`defi_id`,`partenaire_id`),
  KEY `partenaire_id` (`partenaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `form_defis_partenaires`
--


-- --------------------------------------------------------

--
-- Structure de la table `form_defis_profils`
--

DROP TABLE IF EXISTS `form_defis_profils`;
CREATE TABLE IF NOT EXISTS `form_defis_profils` (
  `defi_id` int(11) NOT NULL,
  `profil_id` int(11) NOT NULL,
  PRIMARY KEY (`defi_id`,`profil_id`),
  KEY `profil_id` (`profil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `form_defis_profils`
--

INSERT INTO `form_defis_profils` (`defi_id`, `profil_id`) VALUES
(31, 30),
(31, 31),
(31, 32),
(31, 33);

-- --------------------------------------------------------

--
-- Structure de la table `form_defis_superviseurs`
--

DROP TABLE IF EXISTS `form_defis_superviseurs`;
CREATE TABLE IF NOT EXISTS `form_defis_superviseurs` (
  `defi_id` int(11) NOT NULL,
  `superviseur_id` int(11) NOT NULL,
  PRIMARY KEY (`defi_id`,`superviseur_id`),
  KEY `superviseur_id` (`superviseur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `form_defis_superviseurs`
--

INSERT INTO `form_defis_superviseurs` (`defi_id`, `superviseur_id`) VALUES
(30, 52);

-- --------------------------------------------------------

--
-- Structure de la table `form_departements`
--

DROP TABLE IF EXISTS `form_departements`;
CREATE TABLE IF NOT EXISTS `form_departements` (
  `num_departement` varchar(2) CHARACTER SET latin1 NOT NULL,
  `num_region` varchar(2) CHARACTER SET latin1 NOT NULL,
  `nom` char(32) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`num_departement`),
  KEY `FK_DEPARTEMENT_REGION` (`num_region`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `form_entites`;
CREATE TABLE IF NOT EXISTS `form_entites` (
  `entite_id` int(11) NOT NULL AUTO_INCREMENT,
  `entite` varchar(160) CHARACTER SET latin1 NOT NULL,
  `type` enum('Collectivite','UTC','Partenaire','Association') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`entite_id`),
  UNIQUE KEY `entite` (`entite`,`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `form_entites`
--

INSERT INTO `form_entites` (`entite_id`, `entite`, `type`) VALUES
(45, 'CROUS', 'Partenaire'),
(43, 'L''Espérance', 'Collectivite'),
(44, 'Pierrefonds', 'UTC');

-- --------------------------------------------------------

--
-- Structure de la table `form_horaires`
--

DROP TABLE IF EXISTS `form_horaires`;
CREATE TABLE IF NOT EXISTS `form_horaires` (
  `horaire_id` int(11) NOT NULL AUTO_INCREMENT,
  `horaire` varchar(60) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`horaire_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

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

DROP TABLE IF EXISTS `form_localisations`;
CREATE TABLE IF NOT EXISTS `form_localisations` (
  `localisation_id` int(11) NOT NULL AUTO_INCREMENT,
  `lieu` varchar(160) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`localisation_id`),
  UNIQUE KEY `lieu` (`lieu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `form_localisations`
--

INSERT INTO `form_localisations` (`localisation_id`, `lieu`) VALUES
(23, 'BF'),
(24, 'Cité Universitaire Roberval'),
(25, 'Compiègne, foyer du Rocher rue George Charpak');

-- --------------------------------------------------------

--
-- Structure de la table `form_materiels`
--

DROP TABLE IF EXISTS `form_materiels`;
CREATE TABLE IF NOT EXISTS `form_materiels` (
  `materiel_id` int(11) NOT NULL AUTO_INCREMENT,
  `materiel` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`materiel_id`),
  UNIQUE KEY `materiel` (`materiel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `form_materiels`
--


-- --------------------------------------------------------

--
-- Structure de la table `form_messages`
--

DROP TABLE IF EXISTS `form_messages`;
CREATE TABLE IF NOT EXISTS `form_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `entite_id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entite_id` (`entite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `form_messages`
--


-- --------------------------------------------------------

--
-- Structure de la table `form_no_proxy_users`
--

DROP TABLE IF EXISTS `form_no_proxy_users`;
CREATE TABLE IF NOT EXISTS `form_no_proxy_users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ip` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `form_no_proxy_users`
--


-- --------------------------------------------------------

--
-- Structure de la table `form_partenaires`
--

DROP TABLE IF EXISTS `form_partenaires`;
CREATE TABLE IF NOT EXISTS `form_partenaires` (
  `partenaire_id` int(11) NOT NULL AUTO_INCREMENT,
  `partenaire` varchar(50) CHARACTER SET latin1 NOT NULL,
  `adresseWeb` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `cp` int(5) DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  `fichierLogo` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `departement_id` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `afficher` tinyint(1) DEFAULT '0',
  `email` varchar(100) CHARACTER SET latin1 DEFAULT '',
  `adresse` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `ville` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`partenaire_id`),
  UNIQUE KEY `partenaire` (`partenaire`),
  KEY `fk_partenaire_departement` (`departement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `form_partenaires`
--


-- --------------------------------------------------------

--
-- Structure de la table `form_photos`
--

DROP TABLE IF EXISTS `form_photos`;
CREATE TABLE IF NOT EXISTS `form_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chemin_fichier` varchar(250) NOT NULL,
  `afficher` tinyint(1) DEFAULT '0',
  `clan_id` int(4) NOT NULL,
  `defi_id` int(11) NOT NULL,
  `date_upload` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clan_id` (`clan_id`),
  KEY `defi_id` (`defi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

--
-- Contenu de la table `form_photos`
--


--
-- Déclencheurs `form_photos`
--
DROP TRIGGER IF EXISTS `handle_insert_photos`;
DELIMITER //
CREATE TRIGGER `handle_insert_photos` BEFORE INSERT ON `form_photos`
 FOR EACH ROW BEGIN
  declare isClanDefiTuple int;
  
  SELECT count(*) INTO isClanDefiTuple from form_defis_clans fdc
  WHERE fdc.clan_id = NEW.clan_id AND fdc.defi_id = NEW.defi_id 
  GROUP BY fdc.clan_id, fdc.defi_id;
  
  IF (isClanDefiTuple is null OR isClanDefiTuple < 1) THEN
	INSERT INTO form_defis_clans SET defi_id = NEW.defi_id, clan_id = NEW.clan_id;
  END IF;
 
  END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `form_profils`
--

DROP TABLE IF EXISTS `form_profils`;
CREATE TABLE IF NOT EXISTS `form_profils` (
  `profil_id` int(11) NOT NULL AUTO_INCREMENT,
  `profil` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`profil_id`),
  UNIQUE KEY `profil` (`profil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `form_profils`
--

INSERT INTO `form_profils` (`profil_id`, `profil`) VALUES
(33, ' créatif'),
(30, 'Aimant jardiner'),
(31, 'efficace'),
(32, 'relationnel');

-- --------------------------------------------------------

--
-- Structure de la table `form_proxy_users`
--

DROP TABLE IF EXISTS `form_proxy_users`;
CREATE TABLE IF NOT EXISTS `form_proxy_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(32) NOT NULL,
  `proxy` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`,`proxy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `form_proxy_users`
--


-- --------------------------------------------------------

--
-- Structure de la table `form_regions`
--

DROP TABLE IF EXISTS `form_regions`;
CREATE TABLE IF NOT EXISTS `form_regions` (
  `num_region` varchar(2) CHARACTER SET latin1 NOT NULL,
  `nom` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`num_region`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `form_superviseurs`;
CREATE TABLE IF NOT EXISTS `form_superviseurs` (
  `superviseur_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(80) CHARACTER SET latin1 NOT NULL,
  `fonction` varchar(160) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tel` char(10) CHARACTER SET latin1 NOT NULL,
  `entite_id` int(11) NOT NULL,
  `entite_type` enum('Collectivite','UTC','Partenaire','Association') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`superviseur_id`),
  UNIQUE KEY `nom` (`email`,`entite_id`),
  KEY `entite_id` (`entite_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Contenu de la table `form_superviseurs`
--

INSERT INTO `form_superviseurs` (`superviseur_id`, `nom`, `prenom`, `fonction`, `email`, `tel`, `entite_id`, `entite_type`) VALUES
(51, 'OLIVIER Emmanuel Responsable de Service d''Accuel de jour', 'pongoa@free.fr', '', '', '', 43, 'Collectivite'),
(52, 'JOLY', 'Fanny', 'Directrice résidences', 'f.joly@crous-amiens.fr', '0662985060', 45, 'Partenaire');

-- --------------------------------------------------------

--
-- Structure de la table `form_users`
--

DROP TABLE IF EXISTS `form_users`;
CREATE TABLE IF NOT EXISTS `form_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `clan_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clan_id` (`clan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `form_users`
--

INSERT INTO `form_users` (`id`, `login`, `password`, `clan_id`) VALUES
(11, 'admin', '22542cd21a60d929e0adbcfe112d5261f7c929fe', NULL),
(12, 'hugo', '287eddea2672e7a7e6375af0624f9ba0231ee8c4', NULL),
(13, 'chloe', '1116afc9385ab95e2c5de7df13ac218897d4b14b', NULL),
(14, 'maxime', '3f824825fa301b16dd3650c5facf9657bcefae92', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `form_vote`
--

DROP TABLE IF EXISTS `form_vote`;
CREATE TABLE IF NOT EXISTS `form_vote` (
  `user` int(5) NOT NULL DEFAULT '0',
  `defi_clan` int(11) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL,
  `date_vote` date NOT NULL,
  PRIMARY KEY (`user`,`defi_clan`),
  KEY `defi_clan` (`defi_clan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `form_vote`
--


-- --------------------------------------------------------

--
-- Structure de la table `form_vote_proxy`
--

DROP TABLE IF EXISTS `form_vote_proxy`;
CREATE TABLE IF NOT EXISTS `form_vote_proxy` (
  `user` int(5) NOT NULL DEFAULT '0',
  `defi_clan` int(11) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL,
  `date_vote` date NOT NULL,
  PRIMARY KEY (`user`,`defi_clan`,`date_vote`),
  KEY `defi_clan` (`defi_clan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `form_vote_proxy`
--


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
-- Contraintes pour la table `form_defis_clans`
--
ALTER TABLE `form_defis_clans`
  ADD CONSTRAINT `form_defis_clans_ibfk_1` FOREIGN KEY (`defi_id`) REFERENCES `form_defis` (`id`),
  ADD CONSTRAINT `form_defis_clans_ibfk_2` FOREIGN KEY (`clan_id`) REFERENCES `form_clans` (`id`);

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
-- Contraintes pour la table `form_messages`
--
ALTER TABLE `form_messages`
  ADD CONSTRAINT `form_messages_ibfk_1` FOREIGN KEY (`entite_id`) REFERENCES `form_entites` (`entite_id`);

--
-- Contraintes pour la table `form_partenaires`
--
ALTER TABLE `form_partenaires`
  ADD CONSTRAINT `fk_partenaire_departement` FOREIGN KEY (`departement_id`) REFERENCES `form_departements` (`num_departement`);

--
-- Contraintes pour la table `form_photos`
--
ALTER TABLE `form_photos`
  ADD CONSTRAINT `form_photos_ibfk_1` FOREIGN KEY (`clan_id`) REFERENCES `form_clans` (`id`),
  ADD CONSTRAINT `form_photos_ibfk_2` FOREIGN KEY (`defi_id`) REFERENCES `form_defis` (`id`);

--
-- Contraintes pour la table `form_users`
--
ALTER TABLE `form_users`
  ADD CONSTRAINT `form_users_ibfk_1` FOREIGN KEY (`clan_id`) REFERENCES `form_clans` (`id`);

--
-- Contraintes pour la table `form_vote`
--
ALTER TABLE `form_vote`
  ADD CONSTRAINT `form_vote_ibfk_1` FOREIGN KEY (`user`) REFERENCES `form_no_proxy_users` (`id`),
  ADD CONSTRAINT `form_vote_ibfk_2` FOREIGN KEY (`defi_clan`) REFERENCES `form_defis_clans` (`id`);

--
-- Contraintes pour la table `form_vote_proxy`
--
ALTER TABLE `form_vote_proxy`
  ADD CONSTRAINT `form_vote_proxy_ibfk_1` FOREIGN KEY (`user`) REFERENCES `form_proxy_users` (`id`),
  ADD CONSTRAINT `form_vote_proxy_ibfk_2` FOREIGN KEY (`defi_clan`) REFERENCES `form_defis_clans` (`id`);
