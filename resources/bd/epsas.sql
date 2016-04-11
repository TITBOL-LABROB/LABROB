-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2016 a las 07:09:58
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `epsas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
`pkarea` int(11) NOT NULL,
  `sigla` varchar(25) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`pkarea`, `sigla`, `nombre`, `estado`) VALUES
(1, 'FQ', 'FisicoQuimica', 1),
(2, 'MP', 'Metales Pesados', 1),
(3, 'MIC', 'Microbiologia', 1),
(4, 'AR', 'Agua Residual', 1),
(5, 'MÂ°', 'Muestreo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `pkbitacora` int(11) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `accion` varchar(100) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `hora` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`pkbitacora`, `fkusuario`, `accion`, `fecha`, `hora`) VALUES
(0, 1, 'se agrego una nueva area FisicoQuimica', '2016/02/26', '11:54:12'),
(0, 1, 'Se agrego una nuevo parametro Cloro Residual Libre*', '2016/02/26', '03:17:04'),
(0, 1, 'Cierre de sesion del Usuario Ramiro Aquino Romero (aquino)', '2016/02/27', '10:15:32'),
(0, 1, 'Inicio de sesion del Usuario Ramiro Aquino Romero (aquino)', '2016/02/27', '11:44:45'),
(0, 1, 'Inicio de sesion del Usuario Ramiro Aquino Romero (aquino)', '2016/02/29', '02:55:25'),
(0, 1, 'se dio de baja el usuario Juanito Perez', '2016/02/29', '02:56:49'),
(0, 1, 'se agrego un nuevo tipo de servicio Filtracion', '2016/02/29', '03:29:10'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '04:52:49'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '04:54:22'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '04:55:16'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '04:56:15'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '04:58:59'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '04:59:12'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:00:16'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:00:55'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:03:52'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:04:27'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:05:51'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:07:09'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:08:52'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:09:37'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:11:56'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:11:58'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:12:17'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:13:31'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:16:50'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:16:54'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:18:02'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:40:24'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/02/29', '05:40:29'),
(0, 1, 'se dio de baja el tipo de servicio ', '2016/03/01', '09:08:25'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/03/01', '09:09:21'),
(0, 1, 'se dio de baja el tipo de servicio Filtracion', '2016/03/01', '09:14:00'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/03/01', '09:14:47'),
(0, 1, 'se agrego un nuevo laboratorio Central', '2016/03/01', '10:32:51'),
(0, 1, 'se agrego una nueva area Metales Pesados', '2016/03/01', '10:36:45'),
(0, 1, 'se agrego una nueva area Microbiologia', '2016/03/01', '10:37:15'),
(0, 1, 'se agrego una nueva area Agua Residual', '2016/03/01', '10:39:00'),
(0, 1, 'se agrego una nueva area Muestreo', '2016/03/01', '10:40:19'),
(0, 1, 'se agrego un nuevo parametro Coliformes Totales*', '2016/03/01', '10:54:24'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/03/01', '10:54:47'),
(0, 1, 'se agrego un nuevo parametro Aluminio', '2016/03/01', '11:12:21'),
(0, 1, 'se agrego un nuevo parametro Espectrococos Fecales', '2016/03/02', '10:28:14'),
(0, 1, 'se agrego un nuevo parametro pH', '2016/03/02', '10:41:56'),
(0, 1, 'Cierre de sesion del Usuario Ramiro Aquino Romero (aquino)', '2016/03/02', '03:20:00'),
(0, 1, 'Inicio de sesion del Usuario Ramiro Aquino Romero (aquino)', '2016/03/02', '03:20:08'),
(0, 1, 'se agrego un nuevo tipo de servicio Hidrantes', '2016/03/02', '03:57:41'),
(0, 1, 'Cierre de sesion del Usuario Ramiro Aquino Romero (aquino)', '2016/03/03', '03:33:14'),
(0, 1, 'Inicio de sesion del Usuario Ramiro Aquino Romero (aquino)', '2016/03/03', '03:33:22'),
(0, 1, 'se agrego un nuevo cargo Calidad', '2016/03/03', '03:36:57'),
(0, 1, 'se agrego una nueva area Muestra de Agua Basica', '2016/03/03', '04:11:18'),
(0, 1, 'Se agrego una nueva Matriz Agua', '2016/03/03', '04:13:13'),
(0, 1, 'Se modifico la matriz Agua', '2016/03/03', '04:15:35'),
(0, 1, 'Se modifico la matriz Agua', '2016/03/03', '04:16:42'),
(0, 1, 'se agrego un nuevo parametro Sulfato de Cadmio', '2016/03/03', '04:22:04'),
(0, 1, 'Se agrego una nueva Direccion Redes', '2016/03/04', '11:02:39'),
(0, 1, 'Se modifico la Direccion Redes', '2016/03/04', '11:03:26'),
(0, 1, 'Se modifico la Direccion Redes', '2016/03/04', '11:03:55'),
(0, 1, 'se dio de baja la direccion Redes', '2016/03/04', '11:04:01'),
(0, 1, 'se agrego un nuevo tipo de cliente Cliente Externo', '2016/03/04', '11:12:35'),
(0, 1, 'se agrego un nuevo cliente Pedro Fernandez', '2016/03/04', '11:41:12'),
(0, 1, 'se modifico el cliente Pedro Fernandez(S/CI)', '2016/03/04', '03:13:05'),
(0, 1, 'se modifico el cliente Pedro Fernandez()', '2016/03/04', '04:07:00'),
(0, 1, 'se modifico el cliente Pedro Fernandez()', '2016/03/04', '04:09:46'),
(0, 1, 'Se agrego un nueva Departamento Redes', '2016/03/05', '09:52:53'),
(0, 1, 'Se agrego un nueva Departamento Contabilidad', '2016/03/05', '09:53:10'),
(0, 1, 'Se modifico el Departamento Contabilidad', '2016/03/05', '09:55:20'),
(0, 1, 'se agrego un nuevo cliente Jorge Perales', '2016/03/05', '09:58:54'),
(0, 1, 'se agrego un nuevo cliente Jose Perales', '2016/03/05', '10:01:43'),
(0, 1, 'se agrego un nuevo cliente Angel Mendieta', '2016/03/05', '10:05:21'),
(0, 1, 'Inicio de sesion del Usuario Ramiro Aquino Romero (aquino)', '2016/03/07', '09:08:06'),
(0, 1, 'se agrego una nueva solicitud CI - 001', '2016/03/07', '11:31:44'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Hidrantes', '2016/03/07', '03:26:51'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/03/07', '03:27:52'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/03/07', '03:27:56'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/03/07', '03:28:04'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/03/07', '03:28:07'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/03/07', '03:32:29'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/03/07', '03:32:33'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/03/07', '03:32:38'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Filtracion', '2016/03/07', '03:32:41'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Hidrantes', '2016/03/07', '03:34:00'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Hidrantes', '2016/03/07', '03:34:04'),
(0, 1, 'se agrego un nuevo parametro al tipo de servicio Hidrantes', '2016/03/07', '03:34:07'),
(0, 1, 'Cierre de sesion del Usuario Ramiro Aquino Romero (aquino)', '2016/03/08', '09:32:39'),
(0, 1, 'Inicio de sesion del Usuario Ramiro Aquino Romero (aquino)', '2016/03/08', '09:32:43'),
(0, 1, 'se agrego una nueva localidad La Paz', '2016/03/09', '12:37:26'),
(0, 1, 'se modifico la localidad La Paz', '2016/03/09', '12:40:09'),
(0, 1, 'se dio de baja la localidad La Paz', '2016/03/09', '12:53:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
`pkcargo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`pkcargo`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Administrador', 'Encargado de la administracion del sistema', 1),
(2, 'Calidad', 'Calidad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`pkcliente` int(11) NOT NULL,
  `ci` varchar(50) NOT NULL DEFAULT 'S/CI',
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(80) DEFAULT 'S/T',
  `departamento` varchar(150) DEFAULT NULL,
  `tipo_cliente` int(11) NOT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`pkcliente`, `ci`, `nombre`, `direccion`, `telefono`, `departamento`, `tipo_cliente`, `estado`) VALUES
(1, 'S/CI', 'Juanito Perez', 'Los Cusis', '70770104', '1', 1, 1),
(2, 'S/CI', 'Pedro Fernandez', 'Los Cusis', 'INT 4888', '1', 1, 1),
(3, 'S/CI', 'Jorge Perales', 'Los Palmitos', '70770401', '<br />\r\n<b>Notice</b>:  Undefined property: stdClass::$pkdireccion in <b>C:\\xampp\\htdocs\\epsas\\view\\cliente\\cliente-new.php</b> on line <b>28</b><br /', 2, 1),
(4, 'S/CI', 'Jose Perales', 'Los Palmitos', '70770401', '2', 2, 1),
(5, '53691231', 'Angel Mendieta', 'Los Cuchis', '752361', '2', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
`pkdepartamento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`pkdepartamento`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Redes', 'Departamento de Redes', 1),
(2, 'Contabilidad', 'Contabilidad de toda la empresa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tipo_servicio`
--

CREATE TABLE IF NOT EXISTS `detalle_tipo_servicio` (
  `fktipo_servicio` int(11) NOT NULL,
  `fkparametro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_tipo_servicio`
--

INSERT INTO `detalle_tipo_servicio` (`fktipo_servicio`, `fkparametro`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 2),
(1, 3),
(1, 4),
(2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE IF NOT EXISTS `laboratorio` (
`pklaboratorio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `tipo_laboratorio` varchar(100) NOT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`pklaboratorio`, `nombre`, `telefono`, `direccion`, `tipo_laboratorio`, `estado`) VALUES
(1, 'Central', 70770104, 'En el centro de la empresa', 'interno', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE IF NOT EXISTS `localidad` (
`pklocalidad` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT 'Sin Descripcion',
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`pklocalidad`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'La Paz', 'Centro del Alto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriz`
--

CREATE TABLE IF NOT EXISTS `matriz` (
`pkmatriz` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matriz`
--

INSERT INTO `matriz` (`pkmatriz`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Agua', 'Servicio de Agua Basica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE IF NOT EXISTS `parametro` (
`pkparametro` int(11) NOT NULL,
  `matriz` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `metodo` varchar(150) NOT NULL,
  `tecnica` varchar(150) NOT NULL,
  `unidades` varchar(30) NOT NULL,
  `limite_max` float NOT NULL DEFAULT '0',
  `limite_min` float NOT NULL DEFAULT '0',
  `costo` float DEFAULT '0',
  `tipo_moneda` varchar(50) NOT NULL,
  `fkarea` int(11) NOT NULL,
  `fklaboratorio` int(11) NOT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`pkparametro`, `matriz`, `nombre`, `metodo`, `tecnica`, `unidades`, `limite_max`, `limite_min`, `costo`, `tipo_moneda`, `fkarea`, `fklaboratorio`, `estado`) VALUES
(1, '1', 'Sulfato de Cobre', 'Ninguno', 'Ninguno', 'Litros', 0, 6, 20, 'BOL', 1, 1, 1),
(2, '1', 'Sulfato de Calcio', 'Ninguno', 'ninguno', 'litos', 5, 0, 40, 'BOl', 1, 1, 1),
(3, '1', 'Coliformes Totales*', 'LAB ISO MET 12.05', 'Membrana Filtrante', 'Mililitros', 200, 5, 35, 'boliviano', 1, 1, 1),
(4, '1', 'Aluminio', 'SAA-Llama-AI', 'Absorcion Atomica-Llama', 'mg/L', 250, 0.3, 50, 'boliviano', 2, 1, 1),
(5, '1', 'Espectrococos Fecales', 'LAB ISO MET 12.05', 'Membrana Filtrante', 'UFC/100 mL', 200, 0, 69, 'boliviano', 3, 1, 1),
(6, '1', 'pH', 'SM-4500-B', 'Metodo Electromecanico', 'Unidad pH', 12, 2, 40, 'boliviano', 4, 1, 1),
(7, '1', 'Sulfato de Cadmio', 'IBM-100', 'Mejora de Calidad', 'ml', 20, 10, 52, 'boliviano', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proforma`
--

CREATE TABLE IF NOT EXISTS `proforma` (
`pkproforma` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `fktipo_servicio` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT 'Proforma Nueva',
  `fkcliente` int(11) NOT NULL,
  `solicitante` varchar(100) DEFAULT 'Sin Solicitante',
  `correo_solicitante` varchar(100) DEFAULT 'Sin Correo',
  `institucion_solicitante` varchar(100) DEFAULT 'Sin Insitucion',
  `telefono_solicitante` varchar(100) DEFAULT 'Sin Telefono',
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
`pksolicitud` int(11) NOT NULL,
  `codigo_laboratorio` varchar(50) NOT NULL,
  `fkcliente` int(11) NOT NULL,
  `fecha_muestra` varchar(30) NOT NULL,
  `hora_muestra` varchar(30) NOT NULL,
  `localidad` varchar(30) DEFAULT NULL,
  `zona` varchar(30) DEFAULT NULL,
  `fuente` varchar(50) DEFAULT NULL,
  `fktipo_muestra` int(11) NOT NULL,
  `punto_muestra` varchar(30) DEFAULT NULL,
  `responsable` varchar(50) NOT NULL,
  `otros` varchar(100) DEFAULT NULL,
  `fecha_recepcion` varchar(30) NOT NULL,
  `hora_recepcion` varchar(30) NOT NULL,
  `codigo_cliente` varchar(150) DEFAULT NULL,
  `fktipo_recipiente` int(11) NOT NULL,
  `cantidad_recipiente` int(11) DEFAULT '0',
  `volumen` varchar(30) DEFAULT NULL,
  `observacion_muestra` varchar(300) DEFAULT 'Sin Observacion la Muestra',
  `datos_insitu` varchar(300) DEFAULT 'Sin datos Insitu',
  `fktipo_servicio` int(11) NOT NULL,
  `observacion_ensayo` varchar(300) DEFAULT 'Sin observacion el Ensayo',
  `fecha_entrega` varchar(30) NOT NULL,
  `responsable_entrega` int(11) NOT NULL,
  `responsable_recepcion` int(11) NOT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`pksolicitud`, `codigo_laboratorio`, `fkcliente`, `fecha_muestra`, `hora_muestra`, `localidad`, `zona`, `fuente`, `fktipo_muestra`, `punto_muestra`, `responsable`, `otros`, `fecha_recepcion`, `hora_recepcion`, `codigo_cliente`, `fktipo_recipiente`, `cantidad_recipiente`, `volumen`, `observacion_muestra`, `datos_insitu`, `fktipo_servicio`, `observacion_ensayo`, `fecha_entrega`, `responsable_entrega`, `responsable_recepcion`, `estado`) VALUES
(1, 'CE - 001', 4, '2016/03/07', '11:21', 'Los Pozos', 'Los Pozos', 'Nada', 1, 'Nada', 'Nadie', 'Nada', '2016-03-19', '11:21', 'AAA-123', 1, 2, 'Ml', 'NAda', 'Nada', 1, 'Ninguna', '2016/03/22', 1, 4, 1),
(2, 'CI - 001', 2, '2016/03/07', '11:30', 'Calacoto', 'Ninguna', 'Nada', 1, 'Ninguno', 'Nadie', 'Nada', '2016-03-19', '11:30', 'AAA-3', 1, 2, 'Ml', 'Nada', 'Nada', 1, 'Ninguna', '2016/03/22', 1, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE IF NOT EXISTS `tipo_cliente` (
`pktipo_cliente` int(11) NOT NULL,
  `sigla` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT '1',
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`pktipo_cliente`, `sigla`, `nombre`, `descripcion`, `cantidad`, `estado`) VALUES
(1, 'CI', 'Cliente Interno', 'Cliente Interno de la empresa', 2, 1),
(2, 'CE', 'Cliente Externo', 'Clientes Externos a la empresa', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_muestra`
--

CREATE TABLE IF NOT EXISTS `tipo_muestra` (
`pktipo_muestra` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_muestra`
--

INSERT INTO `tipo_muestra` (`pktipo_muestra`, `nombre`, `estado`) VALUES
(1, 'Filtraciones', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_recipiente`
--

CREATE TABLE IF NOT EXISTS `tipo_recipiente` (
`pktipo_recipiente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_recipiente`
--

INSERT INTO `tipo_recipiente` (`pktipo_recipiente`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Plastico', 'Utilizado de Preferencia en Muestras Salinas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE IF NOT EXISTS `tipo_servicio` (
`pktipo_servicio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) DEFAULT 'Sin Descripcion',
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`pktipo_servicio`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Filtracion', 'La filtracion de los ensayos requeridos', 1),
(2, 'Hidrantes', 'Examinacion de Liquidos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`pkusuario` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `fkcargo` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`pkusuario`, `ci`, `nombre`, `email`, `telefono`, `username`, `pass`, `fkcargo`, `estado`) VALUES
(1, 9001961, 'Ramiro Aquino Romero', 'ramiroaquinoromero@gmail.com', 60000101, 'aquino', 'al1gYM/n5pKuz3s1TvVvucQFsI2BtjQ5QmEXQFYWYok=', 1, 1),
(2, 123456, 'Luis Daniel Lopez', 'luiyicpu@hotmail.com', 70759632, 'luis', '8KbDxbZiDTu50Go5nsFfzNgnEAam8AAj3We/t0N87HA=', 1, 1),
(3, 0, 'Juanito Perez', 'asdkjasdj@hotmail.com', 85422, 'juanito', '8KbDxbZiDTu50Go5nsFfzNgnEAam8AAj3We/t0N87HA=', 1, 0),
(4, 123456, 'Juan', 'ramiroaquinoromero@gmail.com', 75121, 'juan', '8KbDxbZiDTu50Go5nsFfzNgnEAam8AAj3We/t0N87HA=', 1, 1),
(5, 785231, 'Luis ', 'juan@hotmail.com', 896452, 'juancho', '8KbDxbZiDTu50Go5nsFfzNgnEAam8AAj3We/t0N87HA=', 1, 1),
(6, 8596232, 'Juancho Gonzales', 'ramiroaquinoromero@gmail.com', 784656, 'juancho1', '8KbDxbZiDTu50Go5nsFfzNgnEAam8AAj3We/t0N87HA=', 1, 1),
(7, 4235621, 'Javier Lora', 'ramiroaquinoromero@gmail.com', 854632, 'javier', '8KbDxbZiDTu50Go5nsFfzNgnEAam8AAj3We/t0N87HA=', 1, 1),
(8, 532629, 'Pedro Suarez', 'ramiroaquinoromero@gmail.com', 7859264, 'pedro', '8KbDxbZiDTu50Go5nsFfzNgnEAam8AAj3We/t0N87HA=', 1, 1),
(9, 365626, 'Pedro Infante', 'ramiroaquinoromero@gmail.com', 78652, 'pedro1', '8KbDxbZiDTu50Go5nsFfzNgnEAam8AAj3We/t0N87HA=', 1, 1),
(10, 32465656, 'Jorge Feliz', 'ramiroaquinoromero@gmail.com', 70770104, 'jorge', '8KbDxbZiDTu50Go5nsFfzNgnEAam8AAj3We/t0N87HA=', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
 ADD PRIMARY KEY (`pkarea`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
 ADD PRIMARY KEY (`pkcargo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`pkcliente`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
 ADD PRIMARY KEY (`pkdepartamento`);

--
-- Indices de la tabla `detalle_tipo_servicio`
--
ALTER TABLE `detalle_tipo_servicio`
 ADD PRIMARY KEY (`fktipo_servicio`,`fkparametro`), ADD KEY `fkparametro` (`fkparametro`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
 ADD PRIMARY KEY (`pklaboratorio`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
 ADD PRIMARY KEY (`pklocalidad`);

--
-- Indices de la tabla `matriz`
--
ALTER TABLE `matriz`
 ADD PRIMARY KEY (`pkmatriz`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
 ADD PRIMARY KEY (`pkparametro`), ADD KEY `fkarea` (`fkarea`);

--
-- Indices de la tabla `proforma`
--
ALTER TABLE `proforma`
 ADD PRIMARY KEY (`pkproforma`), ADD KEY `fkcliente` (`fkcliente`), ADD KEY `fktipo_servicio` (`fktipo_servicio`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
 ADD PRIMARY KEY (`pksolicitud`);

--
-- Indices de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
 ADD PRIMARY KEY (`pktipo_cliente`);

--
-- Indices de la tabla `tipo_muestra`
--
ALTER TABLE `tipo_muestra`
 ADD PRIMARY KEY (`pktipo_muestra`);

--
-- Indices de la tabla `tipo_recipiente`
--
ALTER TABLE `tipo_recipiente`
 ADD PRIMARY KEY (`pktipo_recipiente`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
 ADD PRIMARY KEY (`pktipo_servicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`pkusuario`), ADD KEY `fkcargo` (`fkcargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
MODIFY `pkarea` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
MODIFY `pkcargo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `pkcliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
MODIFY `pkdepartamento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
MODIFY `pklaboratorio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
MODIFY `pklocalidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `matriz`
--
ALTER TABLE `matriz`
MODIFY `pkmatriz` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `parametro`
--
ALTER TABLE `parametro`
MODIFY `pkparametro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `proforma`
--
ALTER TABLE `proforma`
MODIFY `pkproforma` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
MODIFY `pksolicitud` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
MODIFY `pktipo_cliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_muestra`
--
ALTER TABLE `tipo_muestra`
MODIFY `pktipo_muestra` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_recipiente`
--
ALTER TABLE `tipo_recipiente`
MODIFY `pktipo_recipiente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
MODIFY `pktipo_servicio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `pkusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_tipo_servicio`
--
ALTER TABLE `detalle_tipo_servicio`
ADD CONSTRAINT `detalle_tipo_servicio_ibfk_1` FOREIGN KEY (`fktipo_servicio`) REFERENCES `tipo_servicio` (`pktipo_servicio`),
ADD CONSTRAINT `detalle_tipo_servicio_ibfk_2` FOREIGN KEY (`fkparametro`) REFERENCES `parametro` (`pkparametro`);

--
-- Filtros para la tabla `parametro`
--
ALTER TABLE `parametro`
ADD CONSTRAINT `parametro_ibfk_1` FOREIGN KEY (`fkarea`) REFERENCES `area` (`pkarea`);

--
-- Filtros para la tabla `proforma`
--
ALTER TABLE `proforma`
ADD CONSTRAINT `proforma_ibfk_1` FOREIGN KEY (`fkcliente`) REFERENCES `cliente` (`pkcliente`),
ADD CONSTRAINT `proforma_ibfk_2` FOREIGN KEY (`fktipo_servicio`) REFERENCES `tipo_servicio` (`pktipo_servicio`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fkcargo`) REFERENCES `cargo` (`pkcargo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
