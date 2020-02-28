-- phpMyAdmin SQL Dump
-- version 3.2.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 25 Novembre 2012 à 18:24
-- Version du serveur: 5.1.37
-- Version de PHP: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `formarmor`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `matricule` varchar(20) NOT NULL DEFAULT '',
  `nom` varchar(40) NOT NULL DEFAULT '',
  `password` varchar(25) NOT NULL DEFAULT '',
  `typestatut` varchar(20) NOT NULL DEFAULT '',
  `rue` varchar(45) DEFAULT NULL,
  `cp` varchar(6) DEFAULT NULL,
  `ville` varchar(30) NOT NULL DEFAULT '',
  `nbheurcpta` int(11) NOT NULL DEFAULT '0',
  `nbheurbur` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`matricule`),
  KEY `fk_typstat` (`typestatut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`matricule`, `nom`, `password`, `typestatut`, `rue`, `cp`, `ville`, `nbheurcpta`, `nbheurbur`) VALUES
('M301', 'DUPONT Alain', 'dupal', '1%', '3 rue de la gare', '22 200', 'Guingamp', 70, 175),
('M302', 'LAMBERT Alain', 'lamal', 'Autre', '17 rue de la ville', '22 200', 'Guingamp', 0, 105),
('M303', 'SARGES Annie', 'saran', 'CIF', '125 boulevard de Nantes', '35 000', 'Rennes', 160, 70),
('M304', 'CHARLES Patrick', 'chapa', 'SIFE individuel', '27 Bd Lamartine', '22 000', 'Saint Brieuc', 120, 105),
('M305', 'DUMAS Serge', 'dumse', 'SIFE collectif', 'Pors Braz', '22 200', 'Plouisy', 160, 175),
('M306', 'SYLVESTRE Marc', 'sylma', '1%', '17 rue des ursulines', '22 300', 'Lannion', 0, 70);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `libelle` varchar(25) NOT NULL DEFAULT '',
  `niveau` varchar(25) NOT NULL DEFAULT '',
  `type` varchar(25) NOT NULL DEFAULT '',
  `description` varchar(150) NOT NULL DEFAULT '',
  `diplomante` tinyint(1) NOT NULL DEFAULT '0',
  `duree` smallint(6) NOT NULL DEFAULT '0',
  `coutrevient` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`libelle`,`niveau`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`libelle`, `niveau`, `type`, `description`, `diplomante`, `duree`, `coutrevient`) VALUES
('Access', 'Initiation', 'Bureautique', 'Decouverte du logiciel Access', 0, 35, 140),
('Access', 'Perfectionnement', 'Bureautique', 'Fonctions avancees du logiciel Access', 0, 35, 100),
('Compta1', 'Initiation', 'Compta', 'D?couverte des principes d ?criture comptable', 0, 70, 180),
('Compta2', 'perfectionnement', 'Bureautique', 'Bilan et compte de r?sultat', 0, 70, 180),
('Compta3', 'Perfectionnement', 'Compta', 'Analyse du bilan', 0, 70, 100),
('Compta4', 'Perfectionnement', 'Bureautique', 'Op?rations d inventaire', 0, 70, 140),
('Excel', 'Initiation', 'Bureautique', 'D?couverte du logiciel Excel', 0, 35, 100),
('Excel', 'Perfectionnement', 'Bureautique', 'Fonctions avancees du logiciel Excel', 0, 35, 110),
('Word', 'Initiation', 'Bureautique', 'D?couverte du logiciel Word', 0, 35, 100),
('Word', 'Perfectionnement', 'Bureautique', 'Fonctions avanc?es du logiciel Word', 0, 35, 110);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `matricule` varchar(25) NOT NULL,
  `num_session` int(11) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`matricule`,`num_session`),
  KEY `fk4` (`num_session`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscription`
--


-- --------------------------------------------------------

--
-- Structure de la table `plan_formation`
--

CREATE TABLE IF NOT EXISTS `plan_formation` (
  `matricule` varchar(20) NOT NULL,
  `libelle_form` varchar(25) NOT NULL,
  `niveau` varchar(25) NOT NULL,
  `effectue` tinyint(1) NOT NULL,
  PRIMARY KEY (`matricule`,`libelle_form`,`niveau`),
  KEY `fk2` (`libelle_form`,`niveau`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `plan_formation`
--

INSERT INTO `plan_formation` (`matricule`, `libelle_form`, `niveau`, `effectue`) VALUES
('M301', 'Excel', 'Initiation', 0),
('M301', 'Word', 'Perfectionnement', 0),
('M302', 'Access', 'Initiation', 0);

-- --------------------------------------------------------

--
-- Structure de la table `session_form`
--

CREATE TABLE IF NOT EXISTS `session_form` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `libelleform` varchar(25) NOT NULL DEFAULT '',
  `niveauform` varchar(25) NOT NULL DEFAULT '',
  `datedebut` date DEFAULT NULL,
  `nb_places` smallint(6) NOT NULL DEFAULT '0',
  `nb_inscrits` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`numero`),
  KEY `fk_libniv` (`libelleform`,`niveauform`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `session_form`
--

INSERT INTO `session_form` (`numero`, `libelleform`, `niveauform`, `datedebut`, `nb_places`, `nb_inscrits`) VALUES
(1, 'Excel', 'Initiation', '2013-01-27', 18, 0),
(3, 'Access', 'Initiation', '2013-02-03', 16, 0),
(7, 'Access', 'Perfectionnement', '2013-02-24', 16, 0),
(8, 'Word', 'Initiation', '2013-01-20', 18, 0),
(9, 'Word', 'Perfectionnement', '2013-02-10', 18, 0),
(10, 'Excel', 'Perfectionnement', '2013-02-17', 18, 0);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
  `type` varchar(20) NOT NULL DEFAULT '',
  `taux_horaire` float DEFAULT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`type`, `taux_horaire`) VALUES
('1%', 12),
('Autre', 8),
('CIF', 6),
('SIFE collectif', 10),
('SIFE individuel', 11);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_typstat` FOREIGN KEY (`typestatut`) REFERENCES `statut` (`type`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`matricule`) REFERENCES `client` (`matricule`),
  ADD CONSTRAINT `fk4` FOREIGN KEY (`num_session`) REFERENCES `session_form` (`numero`);

--
-- Contraintes pour la table `plan_formation`
--
ALTER TABLE `plan_formation`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`matricule`) REFERENCES `client` (`matricule`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`libelle_form`, `niveau`) REFERENCES `formation` (`libelle`, `niveau`);

--
-- Contraintes pour la table `session_form`
--
ALTER TABLE `session_form`
  ADD CONSTRAINT `fk_libniv` FOREIGN KEY (`libelleform`, `niveauform`) REFERENCES `formation` (`libelle`, `niveau`);
