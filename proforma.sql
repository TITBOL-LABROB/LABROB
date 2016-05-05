-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2016 a las 17:35:30
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `labrob`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proforma`
--

CREATE TABLE IF NOT EXISTS `proforma` (
  `pkproforma` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `fecha` varchar(20) COLLATE utf8_bin NOT NULL,
  `fkcliente` int(11) NOT NULL,
  `persona_solicitante` varchar(100) COLLATE utf8_bin NOT NULL,
  `correo_solicitante` varchar(100) COLLATE utf8_bin NOT NULL,
  `fkinstitucion` int(11) DEFAULT NULL,
  `telefono_solicitante` varchar(50) COLLATE utf8_bin NOT NULL,
  `dias` varchar(10) COLLATE utf8_bin NOT NULL,
  `diriguido` varchar(100) COLLATE utf8_bin NOT NULL,
  `nro_muestras` int(11) DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pkproforma`),
  KEY `fkcliente` (`fkcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `proforma`
--

INSERT INTO `proforma` (`pkproforma`, `codigo`, `fecha`, `fkcliente`, `persona_solicitante`, `correo_solicitante`, `fkinstitucion`, `telefono_solicitante`, `dias`, `diriguido`, `nro_muestras`, `descuento`, `estado`) VALUES
(1, '1/2016', '2016-04-09', 2, 'Lizbet', 'liz@gmail.com', 1, '33564879', '5', 'Maria Perez', NULL, NULL, 1),
(3, '2/2016', '2016-04-06', 3, 'Angel Rangel', 'angel@gmail.com', 1, '33564897', '5', 'Antonio Valderas', 1, 30, 1),
(5, '1/2017', '2017-04-04', 6, 'Saul Avalos', 'saul@gmail.com', 1, '3356487', '10', 'Veronica Perez', NULL, NULL, 1),
(9, '2/2017', '2017-04-05', 7, 'Pepe aguilera', 'pep@gmail.com', 1, '33564897', '10', 'Jorge negrote', NULL, NULL, 1),
(10, '3/2016', '2016-04-02', 4, 'Mauricio Roca', 'mauricio@gmail.com', 1, '3356487', '3', 'Luis Perales', NULL, NULL, 1),
(17, '4/2016', '2016-04-12', 6, 'Saul Avalos', 'saul@gmail.com', 1, '33564897', '5', 'Mario Villarroel', NULL, NULL, 1),
(18, '5/2016', '2016-04-13', 2, 'yo', 'yo@gmail.com', NULL, '7565984', '12', 'El', NULL, NULL, 1),
(19, '6/2016', '2016-04-08', 2, 'Miguel bustamante', 'miguel@gmail.com', 2, '6987521', '15', 'jose cervantes', NULL, NULL, 1),
(20, '7/2016', '2016-04-20', 3, 'elb', 'eva@titbol.com', 1, '76006318', '10', 'eee', NULL, NULL, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proforma`
--
ALTER TABLE `proforma`
  ADD CONSTRAINT `proforma_ibfk_2` FOREIGN KEY (`fkcliente`) REFERENCES `cliente` (`pkcliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
