-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2012 at 10:31 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mvpn`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `server_id_idx` (`server_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `log`
--


-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE IF NOT EXISTS `server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `srvnom` varchar(255) NOT NULL,
  `srvip` varchar(30) NOT NULL,
  `srvpor` int(11) NOT NULL,
  `srvptc` varchar(30) NOT NULL,
  `srvca` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`id`, `srvnom`, `srvip`, `srvpor`, `srvptc`, `srvca`) VALUES
(1, 'BIBABOX', 'bibabox.fr', 1923, 'udp', 'êokfpzoefkzpoe'),
(4, 'BIBABOX.test', 'bibabox.fr.test', 1923, 'tcp', 'êokfpzoefkzpoe.test');

-- --------------------------------------------------------

--
-- Table structure for table `server_user`
--

CREATE TABLE IF NOT EXISTS `server_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` int(11) NOT NULL COMMENT 'id du serveur',
  `user_id` int(11) NOT NULL COMMENT 'id de l''utilisateur',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='table liaison serveurs-utilisateurs' AUTO_INCREMENT=105 ;

--
-- Dumping data for table `server_user`
--

INSERT INTO `server_user` (`id`, `server_id`, `user_id`) VALUES
(103, 1, 2),
(104, 4, 1),
(102, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrlog` varchar(255) NOT NULL,
  `usrpwd` varchar(255) NOT NULL,
  `usrnom` varchar(255) DEFAULT NULL,
  `usrpre` varchar(255) DEFAULT NULL,
  `usrloc` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `usrlog`, `usrpwd`, `usrnom`, `usrpre`, `usrloc`) VALUES
(1, 'Bewiwi', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'PORTE', 'Loïc', 0),
(2, 'g0tcha', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'GROSSIER', 'Vincent', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_server_id_server_id` FOREIGN KEY (`server_id`) REFERENCES `server` (`id`),
  ADD CONSTRAINT `log_user_id_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
