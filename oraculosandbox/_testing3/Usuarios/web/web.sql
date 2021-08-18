-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-08-2018 a las 01:00:06
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabecera`
--

CREATE TABLE IF NOT EXISTS `cabecera` (
  `Cabecera_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Empresa_id` int(11) NOT NULL,
  `Menu` varchar(2) NOT NULL COMMENT 'Si o No',
  `Fondo_color` varchar(10) NOT NULL,
  `Imagen_id` int(11) NOT NULL,
  `Texto` varchar(500) NOT NULL,
  PRIMARY KEY (`Cabecera_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `cabecera`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `Clien_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(250) NOT NULL,
  `Mail` varchar(250) NOT NULL,
  `Fe_alta` date NOT NULL,
  `Fe_baja` date DEFAULT NULL,
  `Fe_ultima_con` date DEFAULT NULL,
  PRIMARY KEY (`Clien_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Clien_ID`, `Nombre`, `Mail`, `Fe_alta`, `Fe_baja`, `Fe_ultima_con`) VALUES
(1, 'Miguel', 'miguequil@gmail.com', '2018-08-26', NULL, NULL),
(2, 'Roy', 'roy@hotmail.com', '2018-08-26', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_codigo`
--

CREATE TABLE IF NOT EXISTS `cliente_codigo` (
  `Clien_ID` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `cliente_codigo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `Empresa_id` int(30) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Localidad_id` int(30) NOT NULL,
  `Telefono` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `URL` varchar(150) DEFAULT NULL,
  `texto` varchar(600) DEFAULT NULL,
  `logo_id` int(11) DEFAULT NULL,
  `FechaAlta` date DEFAULT NULL,
  `FechaBaja` date DEFAULT NULL,
  PRIMARY KEY (`Empresa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `empresas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mails`
--

CREATE TABLE IF NOT EXISTS `mails` (
  `mail_id` int(30) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `Empresa_id` varchar(50) DEFAULT NULL,
  `Direccion` varchar(150) DEFAULT NULL,
  `Telefono` varchar(150) DEFAULT NULL,
  `mail` varchar(150) DEFAULT NULL,
  `Ciudad_id` int(30) DEFAULT NULL,
  `estado` int(30) DEFAULT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `mails`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `Menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `Empresa_id` int(11) NOT NULL,
  `Texto` varchar(50) NOT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Proceso` varchar(500) DEFAULT NULL,
  `Orden` int(11) NOT NULL,
  `Id_padre` int(11) DEFAULT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_baja` date DEFAULT NULL,
  `class` varchar(2500) DEFAULT NULL,
  PRIMARY KEY (`Menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `menu`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `Permiso_id` int(30) NOT NULL AUTO_INCREMENT,
  `Alta` int(2) DEFAULT NULL,
  `Modif` int(2) DEFAULT NULL,
  `Baja` int(2) DEFAULT NULL,
  `Elimi` int(2) DEFAULT NULL,
  `Aplicacion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Permiso_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `permisos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pie`
--

CREATE TABLE IF NOT EXISTS `pie` (
  `Pie_id` int(11) NOT NULL AUTO_INCREMENT,
  `Empresa_id` int(11) NOT NULL,
  `menu` varchar(3) NOT NULL COMMENT 'Si o no',
  `Texto` varchar(2500) NOT NULL,
  `Derechos` varchar(500) NOT NULL,
  `Fondo_color` varchar(10) NOT NULL,
  PRIMARY KEY (`Pie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `pie`
--

INSERT INTO `pie` (`Pie_id`, `Empresa_id`, `menu`, `Texto`, `Derechos`, `Fondo_color`) VALUES
(1, 1, '', 'Declaraci&oacute;n de Privacidad | Terminos y condiciones | Juego responsable', 'Copyright &copy; 2013 OraculoSemanal.com - Todos los Derechos Reservados', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Usuario_ID` int(30) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Contrasenia` varchar(60) NOT NULL,
  `FechaAlta` date NOT NULL,
  `FechaBaja` date DEFAULT NULL,
  `FechaUltimaEntrada` date DEFAULT NULL,
  PRIMARY KEY (`Usuario_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_empresa`
--

CREATE TABLE IF NOT EXISTS `usu_empresa` (
  `Ue_ID` int(30) NOT NULL AUTO_INCREMENT,
  `Usuario_id` int(30) NOT NULL,
  `Empresa_id` int(30) NOT NULL,
  PRIMARY KEY (`Ue_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usu_empresa`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_per`
--

CREATE TABLE IF NOT EXISTS `usu_per` (
  `UP_ID` int(30) NOT NULL AUTO_INCREMENT,
  `Usuario_ID` int(30) NOT NULL,
  `Permiso_id` int(30) NOT NULL,
  `Empresa_id` int(30) NOT NULL,
  PRIMARY KEY (`UP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usu_per`
--

