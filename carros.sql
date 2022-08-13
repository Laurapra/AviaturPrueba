-- Adminer 4.8.1 MySQL 10.4.24-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ingreso`;
CREATE TABLE `ingreso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTipos` int(11) NOT NULL,
  `placa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `salida` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idTipos` (`idTipos`),
  CONSTRAINT `fk_idTipos` FOREIGN KEY (`idTipos`) REFERENCES `tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `ingreso` (`id`, `idTipos`, `placa`, `registro`, `salida`) VALUES
(31,	6,	'Kia123',	'2022-08-13 01:03:47',	'2022-08-13 01:28:46'),
(32,	2,	'232',	'2022-08-13 17:05:13',	NULL);

DROP TABLE IF EXISTS `tipos`;
CREATE TABLE `tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tipos` (`id`, `nombre`, `precio`) VALUES
(1,	'Carros particulares',	40),
(2,	'Motos',	20),
(3,	'Bicicletas',	5),
(5,	'Vehiculos oficiales',	0),
(6,	'Vehiculos pesados',	50);

-- 2022-08-13 17:16:08
