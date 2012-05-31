-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Jeu 31 Mai 2012 à 08:23
-- Version du serveur: 5.1.62
-- Version de PHP: 5.3.6-13ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `youfood`
--

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

CREATE TABLE IF NOT EXISTS `boisson` (
  `idboisson` int(11) NOT NULL,
  `nomboisson` varchar(45) DEFAULT NULL,
  `descriptionboisson` varchar(45) DEFAULT NULL,
  `prixboisson` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idboisson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idclient` int(11) NOT NULL,
  `nomclient` varchar(45) DEFAULT NULL,
  `tableclient` int(11) DEFAULT NULL,
  PRIMARY KEY (`idclient`),
  KEY `fk_table_id` (`tableclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commanderboisson`
--

CREATE TABLE IF NOT EXISTS `commanderboisson` (
  `idboisson` int(11) NOT NULL,
  `idboissonclient` int(11) NOT NULL,
  PRIMARY KEY (`idboisson`,`idboissonclient`),
  KEY `fk_boisson_id` (`idboisson`),
  KEY `fk_boissonclient_id` (`idboissonclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commanderentree`
--

CREATE TABLE IF NOT EXISTS `commanderentree` (
  `identree` int(11) NOT NULL,
  `identreeclient` int(11) NOT NULL,
  PRIMARY KEY (`identree`,`identreeclient`),
  KEY `fk_entree_id` (`identree`),
  KEY `fk_entreeclient_id` (`identreeclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commanderplat`
--

CREATE TABLE IF NOT EXISTS `commanderplat` (
  `idplat` int(11) NOT NULL,
  `idplatclient` int(11) NOT NULL,
  PRIMARY KEY (`idplat`,`idplatclient`),
  KEY `fk_plat_1` (`idplat`),
  KEY `fk_platclient_id` (`idplatclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

CREATE TABLE IF NOT EXISTS `entree` (
  `identree` int(11) NOT NULL,
  `nomentree` varchar(45) DEFAULT NULL,
  `descriptionentree` varchar(45) DEFAULT NULL,
  `idpays` int(11) DEFAULT NULL,
  PRIMARY KEY (`identree`),
  KEY `fk_entreepays_id` (`idpays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `idpays` int(11) NOT NULL,
  `nompays` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE IF NOT EXISTS `plat` (
  `idplat` int(11) NOT NULL,
  `nomplat` varchar(45) DEFAULT NULL,
  `descriptionplat` varchar(45) DEFAULT NULL,
  `idpays` int(11) DEFAULT NULL,
  PRIMARY KEY (`idplat`),
  KEY `fk_platpays_1` (`idpays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `serveur`
--

CREATE TABLE IF NOT EXISTS `serveur` (
  `idserveur` int(11) NOT NULL,
  `nomserveur` varchar(45) DEFAULT NULL,
  `prenonserveur` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `table`
--

CREATE TABLE IF NOT EXISTS `table` (
  `idtable` int(11) NOT NULL,
  `idzone` int(11) NOT NULL,
  PRIMARY KEY (`idtable`,`idzone`),
  KEY `fk_zone_id` (`idzone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE IF NOT EXISTS `zone` (
  `idzone` int(11) NOT NULL,
  PRIMARY KEY (`idzone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_table_id` FOREIGN KEY (`tableclient`) REFERENCES `table` (`idtable`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commanderboisson`
--
ALTER TABLE `commanderboisson`
  ADD CONSTRAINT `fk_boissonclient_id` FOREIGN KEY (`idboissonclient`) REFERENCES `client` (`idclient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_boisson_id` FOREIGN KEY (`idboisson`) REFERENCES `boisson` (`idboisson`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commanderentree`
--
ALTER TABLE `commanderentree`
  ADD CONSTRAINT `fk_entreeclient_id` FOREIGN KEY (`identreeclient`) REFERENCES `client` (`idclient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entree_id` FOREIGN KEY (`identree`) REFERENCES `entree` (`identree`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commanderplat`
--
ALTER TABLE `commanderplat`
  ADD CONSTRAINT `fk_platclient_id` FOREIGN KEY (`idplatclient`) REFERENCES `client` (`idclient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plat_id` FOREIGN KEY (`idplat`) REFERENCES `plat` (`idplat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entree`
--
ALTER TABLE `entree`
  ADD CONSTRAINT `fk_entreepays_id` FOREIGN KEY (`idpays`) REFERENCES `pays` (`idpays`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `fk_platpays_1` FOREIGN KEY (`idpays`) REFERENCES `pays` (`idpays`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `table`
--
ALTER TABLE `table`
  ADD CONSTRAINT `fk_zone_id` FOREIGN KEY (`idzone`) REFERENCES `zone` (`idzone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
