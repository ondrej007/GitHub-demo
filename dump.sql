-- Adminer 4.2.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `etnetera_demo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `etnetera_demo`;

CREATE TABLE `search_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phrase` varchar(255) NOT NULL,
  `search_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `search_history` (`id`, `phrase`, `search_datetime`, `ip`) VALUES
(82,	'cursedcoder',	'2015-11-10 19:07:10',	'127.0.0.1'),
(83,	'Amandine3003',	'2015-11-10 19:15:04',	'127.0.0.1'),
(84,	'nette',	'2015-11-10 19:16:41',	'127.0.0.1'),
(85,	'Kdyby',	'2015-11-10 20:33:05',	'127.0.0.1'),
(86,	'Kdyby',	'2015-11-10 21:01:47',	'127.0.0.1'),
(87,	'afdfd',	'2015-11-10 21:06:35',	'127.0.0.1'),
(88,	'Ondra',	'2015-11-10 21:06:40',	'127.0.0.1'),
(90,	'jiriknesl',	'2015-11-10 21:08:49',	'127.0.0.1'),
(92,	'mardix',	'2015-11-10 21:09:50',	'127.0.0.1'),
(93,	'voodoophp',	'2015-11-10 23:31:24',	'127.0.0.1'),
(94,	'KnpLabs',	'2015-11-11 01:01:06',	'127.0.0.1'),
(95,	'ondrej007',	'2015-11-11 01:03:04',	'127.0.0.1'),
(96,	'laravel',	'2015-11-11 01:06:23',	'127.0.0.1'),
(97,	'kdyby',	'2015-11-11 01:06:56',	'127.0.0.1'),
(98,	'mrtnzlml',	'2015-11-11 01:07:24',	'127.0.0.1'),
(99,	'KnpLabs',	'2015-11-11 01:07:48',	'127.0.0.1'),
(100,	'zendframework',	'2015-11-11 01:08:46',	'127.0.0.1'),
(101,	'sebastianbergmann',	'2015-11-11 01:09:38',	'127.0.0.1'),
(102,	'SpiderLabs',	'2015-11-11 01:11:19',	'127.0.0.1'),
(103,	'deliciousbrains',	'2015-11-11 01:11:34',	'127.0.0.1'),
(104,	'auraphp',	'2015-11-11 01:11:54',	'127.0.0.1'),
(105,	'indieteq',	'2015-11-11 01:13:33',	'127.0.0.1');

-- 2015-11-11 00:17:15