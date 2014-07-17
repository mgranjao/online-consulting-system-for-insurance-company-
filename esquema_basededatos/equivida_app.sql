-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 29. April 2013 um 17:51
-- Server Version: 5.1.44
-- PHP-Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `equivida_app`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `accionistas`
--

CREATE TABLE IF NOT EXISTS `accionistas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `tipo_accionista_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `accionistas`
--

INSERT INTO `accionistas` (`id`, `usuario_id`, `tipo_accionista_id`) VALUES
(1, 12, 1),
(2, 47, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `agentes`
--

CREATE TABLE IF NOT EXISTS `agentes` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `brokers` varchar(100) NOT NULL,
  `codigo` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `agentes`
--

INSERT INTO `agentes` (`id`, `brokers`, `codigo`) VALUES
(1, 'AON RISK', 1041),
(2, 'TECNISEGUROS', 162),
(3, 'RAUL COKA', 471),
(4, 'ECUAPRIMAS', 674),
(5, 'SEGUROSCA', 615);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `archivos`
--

CREATE TABLE IF NOT EXISTS `archivos` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `file` varchar(200) NOT NULL,
  `directorio_id` bigint(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_accionista_id` bigint(11) NOT NULL DEFAULT '0',
  `fecha_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `archivos`
--

INSERT INTO `archivos` (`id`, `titulo`, `descripcion`, `file`, `directorio_id`, `tipo`, `fecha`, `tipo_accionista_id`, `fecha_create`) VALUES
(2, 'Enero', 'Este es un archivo de prueba', 'archivos/db726a_4fac41_archivo.pdf', 11, 'application/pdf', '0000-00-00', 0, '2013-02-14 00:50:54'),
(3, 'Hackathon', 'Prueba Hackthon', 'archivos/b260f0_4fac41_archivo.pdf', 13, 'application/pdf', '0000-00-00', 0, '2013-02-13 23:40:14'),
(5, 'Dicmebre', 'Ciembre', 'archivos/73c845_e9d249_Estados Financieros Diciembre.pdf', 11, 'application/pdf', '0000-00-00', 0, '2013-02-21 12:10:35'),
(8, 'Prueba Archivo', 'Prueba Archivo', 'archivos/399983_b260f0_4fac41_archivo.pdf', 11, 'application/pdf', '2013-04-03', 1, '2013-04-03 00:49:08'),
(7, 'Prueba Archivo', 'Prueba Archivo', 'archivos/c1f427_b260f0_4fac41_archivo.pdf', 11, 'application/pdf', '2013-04-03', 2, '2013-04-03 00:46:59'),
(9, 'Prueba Archivo', 'Prueba Archivo', 'archivos/f9aa6a_b260f0_4fac41_archivo.pdf', 16, 'application/pdf', '2013-04-03', 2, '2013-04-03 00:52:22');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) NOT NULL,
  `seccion_id` bigint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `banners`
--

INSERT INTO `banners` (`id`, `imagen`, `seccion_id`) VALUES
(1, 'archivos/c49e9c_pantalla_accionistas.jpg', 4),
(2, 'archivos/820da7_pantalla_directorio.jpg', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `correos`
--

CREATE TABLE IF NOT EXISTS `correos` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `usuario_id` bigint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Daten für Tabelle `correos`
--

INSERT INTO `correos` (`id`, `email`, `tipo`, `usuario_id`) VALUES
(4, 'bedocc@gmail.com', 'PERSONAL', 2),
(5, 'bedo@equivida.com', 'TRABAJO', 2),
(6, 'arhr_02@hotmail.com', 'PERSONAL', 3),
(36, 'bedocc@gmail.com', 'TRABAJO', 1),
(8, 'crisdiaz_19@hotmail.com', 'PERSONAL', 4),
(9, 'mario@aunasoft.com', 'PERSONAL', 5),
(10, 'mirianmpz@hotmail.com', 'PERSONAL', 6),
(11, 'micaela.cevallos@gmail.com', 'PERSONAL', 7),
(12, 'fposligua@yahoo.com', 'PERSONAL', 8),
(13, 'mirianmpz@hotmail.com', 'PERSONAL', 9),
(44, 'bedo@3puntocero.com', 'PERSONAL', 37),
(15, 'tecniseguros@equivida.com', 'PERSONAL', 11),
(16, 'accionista@equivida.com', 'PERSONAL', 12),
(54, 'directorio@equivida.com', 'PERSONAL', 47),
(21, 'bedomax@gmail.com', 'PERSONAL', 15),
(22, 'bedomax@gmail.com', 'PERSONAL', 16),
(23, 'bedomax@live.com', 'PERSONAL', 17),
(25, 'bedomax1@gmail.com', 'PERSONAL', 19),
(26, 'bedomax3@gmail.com', 'PERSONAL', 20),
(27, 'bedomax4@gmail.com', 'PERSONAL', 21),
(28, 'bedomax5@gmail.com', 'PERSONAL', 22),
(29, 'maximiliano@bedomax.com', 'PERSONAL', 23);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `direcciones`
--

CREATE TABLE IF NOT EXISTS `direcciones` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(300) NOT NULL,
  `canton` varchar(100) NOT NULL,
  `provincia_id` varchar(100) NOT NULL,
  `calle_principal` varchar(100) NOT NULL,
  `calle_secundaria` varchar(100) NOT NULL,
  `usuario_id` tinyint(11) NOT NULL,
  `fecha_create` date NOT NULL,
  `tipo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Daten für Tabelle `direcciones`
--

INSERT INTO `direcciones` (`id`, `ciudad`, `canton`, `provincia_id`, `calle_principal`, `calle_secundaria`, `usuario_id`, `fecha_create`, `tipo`) VALUES
(2, 'Quito', 'Quito', '19', 'Calle Italia 214', 'Av. Eloy Alfaro', 2, '0000-00-00', 'DOMICILIO'),
(4, 'salinas', 'salinas', '20', 'malecon de salinas', 'chipipe', 3, '0000-00-00', 'DOMICILIO'),
(36, '', '', '9', 'XIMENA', 'COOP. 9 DE OCTUBRE', 1, '0000-00-00', 'DOMICILIO'),
(6, 'Guayaquil', 'Guayaquil', '10', 'Orquideas', 'Mz 1028 V 08', 4, '0000-00-00', 'DOMICILIO'),
(7, 'Quito', 'Quito', '19', 'Obispo Dias de la Mmadrid', 'San Felipe', 5, '0000-00-00', 'DOMICILIO'),
(8, 'Guayaquil', 'Guayaquil', '10', 'Cdla. Cogra ', 'Mz. 3 Solar 17 H1', 6, '0000-00-00', 'DOMICILIO'),
(9, 'quito', 'quito', '19', 'antonio de sierra', 'verde cruz', 7, '0000-00-00', 'DOMICILIO'),
(10, 'Esmeraldas', 'Esmeraldas', '8', '', '', 8, '0000-00-00', 'DOMICILIO'),
(11, 'GUAYAQUIL', 'GUAYAQUIL', '10', 'CDLA COGRA', 'MZ 3 SOLAR 17', 9, '0000-00-00', 'DOMICILIO'),
(58, 'Quito', 'Quito', '19', 'Calle Italia', 'Av. Eloy Alfaro', 37, '0000-00-00', 'DOMICILIO'),
(13, 'Quito', 'Quito', '19', 'Calle Italia', 'Av. Eloy Alfaro', 11, '0000-00-00', 'DOMICILIO'),
(14, 'Quito', 'Quito', '19', 'Calle Italia', 'Av. Eloy Alfaro', 12, '0000-00-00', 'DOMICILIO'),
(55, 'Quito', 'Quito', '19', 'Calle Italia', 'Av. Eloy Alfaro', 47, '0000-00-00', 'DOMICILIO'),
(37, '', '', '9', 'AV. VICTOR EMILIO ESTRADA', 'Y LAS MONJAS', 1, '0000-00-00', 'DOMICILIO'),
(19, 'Quito', 'Quito', '19', 'Calle Italia', 'Av. Eloy Alfaro', 15, '0000-00-00', 'DOMICILIO'),
(20, 'Quito', 'Quito', '19', 'Calle Italia', 'Av. Eloy Alfaro', 16, '0000-00-00', 'DOMICILIO'),
(21, 'Quito', 'Quito', '19', 'Calle Italia', 'Av. Eloy Alfaro', 17, '0000-00-00', 'DOMICILIO'),
(23, 'Quito', 'Quito', '1', 'Calle Italia', 'Av. Eloy Alfaro', 19, '0000-00-00', 'DOMICILIO'),
(24, 'Quito', 'Quito', '19', 'Calle Italia', 'Av. Eloy Alfaro', 20, '0000-00-00', 'DOMICILIO'),
(25, 'Quito', 'Quito', '2', 'Calle Italia', 'Av. Eloy Alfaro', 21, '0000-00-00', 'DOMICILIO'),
(26, 'Quito', 'Quito', '2', 'Calle Italia', 'Av. Eloy Alfaro', 22, '0000-00-00', 'DOMICILIO'),
(27, 'Quito', 'Quito', '1', 'Calle Italia', 'Av. Eloy Alfaro', 23, '0000-00-00', 'DOMICILIO');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `directorios`
--

CREATE TABLE IF NOT EXISTS `directorios` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `parent_id` bigint(11) NOT NULL,
  `tipo_accionista_id` bigint(11) NOT NULL DEFAULT '0',
  `fecha_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Daten für Tabelle `directorios`
--

INSERT INTO `directorios` (`id`, `nombre`, `parent_id`, `tipo_accionista_id`, `fecha_create`) VALUES
(1, 'Junta General', 0, 1, '2012-12-27 11:10:18'),
(2, 'Información Valiosa', 0, 1, '2012-12-27 11:28:40'),
(8, 'Estados Financieros', 2, 0, '2012-12-27 16:14:31'),
(9, 'Composición de Activos', 2, 0, '2012-12-27 16:14:51'),
(12, 'Junta Directores', 0, 1, '2012-12-27 16:17:24'),
(11, '2012', 8, 0, '2012-12-27 16:15:12'),
(13, 'Enero', 11, 0, '2013-02-13 20:05:00'),
(14, 'Carpeta para directorio', 0, 2, '2013-04-03 00:23:02'),
(15, 'Estados Financieros', 14, 2, '2013-04-03 00:51:44'),
(16, '2012', 15, 2, '2013-04-03 00:52:05');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Pendiente'),
(3, 'Denegado');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `breve` text NOT NULL,
  `contenido` text NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `seccion_id` bigint(20) NOT NULL,
  `fecha_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `breve`, `contenido`, `imagen`, `seccion_id`, `fecha_create`) VALUES
(9, 'Noticia de Prueba EQuivida', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 6, '2013-04-05 16:35:47'),
(8, 'Este es un titulo de prueba', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'archivos/51032b_imagen_prueba.jpg', 6, '2013-04-05 16:35:57');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET latin1 NOT NULL,
  `region` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Daten für Tabelle `provincias`
--

INSERT INTO `provincias` (`id`, `nombre`, `region`) VALUES
(1, 'AZUAY', ''),
(2, 'BOLIVAR', ''),
(3, 'CAÑAR', ''),
(4, 'CARCHI', ''),
(5, 'CHIMBORAZO', ''),
(6, 'COTOPAXI', ''),
(7, 'EL ORO', ''),
(8, 'ESMERALDAS', ''),
(9, 'GALAPAGOS', ''),
(10, 'GUAYAS', ''),
(11, 'IMBABURA', ''),
(12, 'LOJA', ''),
(13, 'LOS RIOS', ''),
(14, 'MANABI', ''),
(15, 'MORONA SANTIAGO', ''),
(16, 'NAPO', ''),
(17, 'ORELLANA', ''),
(18, 'PASTAZA', ''),
(19, 'PICHINCHA', ''),
(20, 'SANTA ELENA', ''),
(21, 'SANTO DOMINGO DE LOS TSACHILAS', ''),
(22, 'SUCUMBIOS', ''),
(23, 'TUNGURAHUA', ''),
(24, 'ZAMORA CHINCHIPE', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `secciones`
--

CREATE TABLE IF NOT EXISTS `secciones` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `secciones`
--

INSERT INTO `secciones` (`id`, `nombre`) VALUES
(1, 'Personas'),
(2, 'Empresas'),
(3, 'Brokers'),
(4, 'Accionistas'),
(5, 'Directores'),
(6, 'Todos');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `solicitudes`
--

CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(11) NOT NULL,
  `seccion` varchar(30) NOT NULL,
  `poliza` varchar(50) NOT NULL,
  `accion` varchar(30) NOT NULL,
  `html_cliente` text NOT NULL,
  `html_equivida` text NOT NULL,
  `fecha_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Daten für Tabelle `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `usuario_id`, `seccion`, `poliza`, `accion`, `html_cliente`, `html_equivida`, `fecha_create`) VALUES
(1, 1, 'Factura', '', 'Solicitar', '', '', '2013-01-06 20:12:14'),
(27, 11, 'Certificado Individual', '1520000099', 'Generar', '', '', '2013-02-28 01:33:37'),
(26, 1, 'Estado de Cuenta', '', 'Solicitud', '', '', '2013-02-27 23:57:09'),
(25, 1, 'Estado de Cuenta', '', 'Solicitud', '', '', '2013-02-27 23:50:50'),
(5, 11, 'Certificado Individual', '2540000146', 'Generar', '', '', '2013-01-10 02:56:46'),
(6, 11, 'Certificado Individual', '2540000146', 'Generar', '', '', '2013-01-10 03:04:45'),
(7, 11, 'Siniestro', '2540000146', 'Notificar', '', '', '2013-01-10 03:16:30'),
(8, 11, 'Siniestro', '2540000146', 'Notificar', '', '', '2013-01-10 03:17:58'),
(9, 11, 'Siniestro', '2540000146', 'Notificar', '', '', '2013-01-10 03:19:07'),
(10, 11, 'Siniestro', '2540000146', 'Notificar', '', '', '2013-01-10 03:20:53'),
(11, 11, 'Siniestro', '2540000146', 'Notificar', '', '', '2013-01-10 03:22:04'),
(12, 11, 'Certificado Individual', '1500001610', 'Generar', '', '', '2013-01-10 04:53:22'),
(13, 11, 'Certificado Individual', '1500001610', 'Generar', '', '', '2013-01-10 04:55:10'),
(14, 11, 'Certificado Individual', '1841', 'Generar', '', '', '2013-01-22 12:25:59'),
(15, 11, 'Certificado Individual', '1841', 'Generar', '', '', '2013-01-22 12:26:27'),
(16, 11, 'Certificado Individual', '1841', 'Generar', '', '', '2013-01-22 12:27:00'),
(17, 1, 'Factura', '', 'Solicitar', '', '', '2013-01-25 10:32:05'),
(18, 1, 'Factura', '', 'Solicitar', '', '', '2013-01-25 10:32:20'),
(19, 1, 'Factura', '', 'Solicitar', '', '', '2013-01-25 10:32:46'),
(20, 1, 'Factura', '', 'Solicitar', '', '', '2013-01-25 10:33:59'),
(21, 11, 'Siniestro', '1250002032', 'Notificar', '', '', '2013-01-25 12:00:09'),
(22, 1, 'Estado de Cuenta', '1590000545', 'Solicitud', '', '', '2013-01-25 12:02:30'),
(23, 1, 'Siniestro', '1590000545', 'Notificar', '', '', '2013-02-06 11:58:54'),
(24, 1, 'Estado de Cuenta', '', 'Solicitud', '', '', '2013-02-21 13:21:29'),
(28, 11, 'Certificado Individual', '1520000099', 'Generar', '', '', '2013-02-28 01:34:44'),
(29, 11, 'Certificado Individual', '1520000099', 'Generar', '', '', '2013-02-28 01:35:22'),
(30, 11, 'Certificado Individual', '1520000099', 'Generar', '', '', '2013-02-28 01:36:34'),
(31, 11, 'Certificado Individual', '1520000099', 'Generar', '', '', '2013-02-28 01:36:57'),
(32, 11, 'Certificado Individual', '1500002473', 'Generar', '', '', '2013-02-28 01:45:14'),
(33, 11, 'Certificado Individual', '1500002473', 'Generar', '', '', '2013-02-28 01:47:41'),
(35, 11, 'Certificado Individual', '1500002196', 'Generar', '', '', '2013-02-28 05:22:48'),
(36, 1, 'Estado de Cuenta', '', 'Solicitud', '', '', '2013-02-28 05:40:37'),
(37, 1, 'Prestamo', '', 'Solicitar', '', '', '2013-02-28 05:44:36'),
(38, 1, 'Factura', '', 'Solicitar', '', '', '2013-02-28 05:47:41'),
(39, 11, 'Certificado Individual', '1500002196', 'Generar', '', '', '2013-02-28 14:41:28'),
(40, 11, 'Certificado Individual', '1500002196', 'Generar', '', '', '2013-02-28 14:46:49'),
(41, 11, 'Certificado Individual', '1500002196', 'Generar', '', '', '2013-02-28 14:47:08'),
(42, 11, 'Certificado Individual', '1500002196', 'Generar', '', '', '2013-02-28 14:47:44'),
(43, 11, 'Certificado Individual', '1500002196', 'Generar', '', '', '2013-02-28 14:48:16'),
(44, 11, 'Certificado Individual', '1500002196', 'Generar', '', '', '2013-02-28 14:49:45'),
(45, 11, 'Certificado Individual', '1500002196', 'Generar', '', '', '2013-02-28 14:50:07'),
(46, 11, 'Certificado Individual', '1520000099', 'Generar', '', '', '2013-02-28 14:59:25'),
(47, 11, 'Certificado Individual', '1500001742', 'Generar', '', '', '2013-03-12 16:29:09'),
(48, 11, 'Certificado Individual', '1500001742', 'Generar', '', '', '2013-03-12 16:30:44'),
(49, 11, 'Certificado Individual', '1500001742', 'Generar', '', '', '2013-03-12 16:31:07'),
(50, 11, 'Certificado Individual', '1500001742', 'Generar', '', '', '2013-03-13 13:11:58'),
(51, 11, 'Certificado Individual', '1500001742', 'Generar', '', '', '2013-03-13 13:13:31'),
(52, 11, 'Certificado Individual', '1500001742', 'Generar', '', '', '2013-03-13 13:15:08'),
(53, 11, 'Certificado Individual', '1500001742', 'Generar', '', '', '2013-03-13 13:15:34'),
(54, 11, 'Certificado Individual', '1500001742', 'Generar', '', '', '2013-03-13 13:15:53'),
(55, 11, 'Certificado Individual', '1500001742', 'Generar', '', '', '2013-03-13 13:16:29'),
(56, 11, 'Certificado Individual', '1500001742', 'Generar', '', '', '2013-03-13 13:16:52'),
(57, 11, 'Certificado Individual', '1500001742', 'Generar', '', '', '2013-03-13 13:17:27'),
(58, 1, 'Estado de Cuenta', '', 'Solicitud', '', '', '2013-03-13 14:14:00'),
(59, 1, 'Estado de Cuenta', '', 'Solicitud', '', '', '2013-03-13 14:50:08'),
(60, 1, 'Estado de Cuenta', '', 'Solicitud', '', '', '2013-03-13 14:53:06'),
(61, 1, 'Estado de Cuenta', '', 'Solicitud', '', '', '2013-03-13 14:57:10'),
(62, 1, 'Estado de Cuenta', '1590000125', 'Solicitud', '', '', '2013-03-13 14:59:14'),
(63, 1, 'Estado de Cuenta', '1590000125', 'Solicitud', '', '', '2013-03-13 15:10:03'),
(73, 1, 'Datos Generales', '0', 'Contacto', '', '', '2013-03-25 00:22:31'),
(72, 1, 'Datos Generales', '0', 'Contacto', '', '', '2013-03-25 00:18:56'),
(71, 1, 'Datos Generales', '0', 'Contacto', '', '', '2013-03-22 15:43:25'),
(70, 1, 'Datos Generales', '0', 'Contacto', '', '', '2013-03-22 15:39:17'),
(69, 1, 'Estado de Cuenta', '1590000125', 'Solicitud', '', '', '2013-03-19 19:02:52'),
(74, 1, 'Estado de Cuenta', '2590001571', 'Solicitud', '\n		Estimado cliente,\n		<p>\n		Su solicitud  N° 74 para <b>Estado de Cuenta</b> ha sido recibida y sera| atendida en el lapso de 24hrs.\n		</p>\n		<p>\n		Para cualquier duda comunicarse con: soporteweb@equivida.com\n		</p>\n		<br>\n		Muchas gracias\n		\n		<p>\n		Saludos<br>\n		Equipo de Equivida\n		</p>\n		', '\n		\n		\n		<b>Solicitud Estado de Cuenta  - Vi|a: email </b>\n		<p>\n		El cliente genero| una solicitud de Estado de Cuenta, con los siguientes datos:\n		<br>\n		<h3>Solicitud No. : 74</h3>\n		<b>N. Po|liza:</b> 2590001571<br>\n		<b>Nombre:</b> Victor Collantes<br>\n		<b>Email:</b> bedocc@gmail.com<br>\n		<b>Teléfono Celular:</b> 095268665<br>\n		<b>Teléfono Convencional:</b> 22526130<br>\n		<b>Tipo de Usuario:</b> persona<br>\n		<b>Ce|dula del Asegurado:</b> 0704798651<br>\n		<b>Desde:</b> 2013-04-01<br>\n		<b>Hasta:</b> 2013-04-30<br>\n		<b>Tipo de Envio:</b> email<br> \n		<b>Nu|mero de Contacto:</b> 2526130<br> \n		<br>\n		<b>Direccioo|n del Cliente:</b><br>\n		<b>Calle Principal:</b>XIMENA<br>\n		<b>Calle Secundaria:</b>COOP. 9 DE OCTUBRE<br>\n		<b>Provincia:</b>GALAPAGOS<br>\n		<b>Cantón:</b><br>\n		<b>Ciudad:</b><br>\n		<b>Tipo:</b>DOMICILIO<br>\n		\n		<p>Tienes <b>24hrs</b> para responder este e-mail.</p>\n		\n		<p>\n		Saludos<br>\n		Equipo de Equivida\n		</p>\n		', '2013-04-03 02:39:16'),
(75, 1, 'Prestamo', '', 'Solicitar', '\n				Estimado cliente,\n				<p>\n				Su solicitud  N° 75 para <b>Préstamo</b> ha sido recibida y será atendida en el lapso de 24hrs.\n				</p>\n				<p>\n				Para cualquier duda comunicarse con: soporteweb@equivida.com\n				</p>\n				<br>\n				Muchas gracias\n\n				<p>\n				Saludos<br>\n				Equipo de Equivida\n				</p>\n				', '\n\n\n				<b>Solicitud  <b>Préstamo</b>  -  </b>\n				<p>\n				El cliente generó una solicitud de Pre|stamo, con los siguientes datos:\n				<br>\n				<h3>Solicitud No. : 75</h3>\n				<b>N. Po|liza:</b> 2590001571<br>\n				<b>Nombre:</b> Victor Collantes<br>\n				<b>Email:</b> bedocc@gmail.com<br>\n				<b>Tele|fono Celular:</b> 095268665<br>\n				<b>Tele|fono Convencional:</b> 22526130<br>\n				<b>Tipo de Usuario:</b> persona<br>\n				\n				<b>Ce|dula del Asegurado:</b> <br>\n				<b>Valor a Prestar:</b> 3000<br>\n				<b>Monto máximo a prestar:</b> 1560.34<br> \n				<b>Nu|mero de Contacto:</b> 2526130<br> \n				<br>\n				<b>Direccio|n del Cliente:</b><br>\n				<b>Calle Principal:</b>XIMENA<br>\n				<b>Calle Secundaria:</b>COOP. 9 DE OCTUBRE<br>\n				<b>Tele|fono convencional:</b><br>\n				<b>Provincia:</b>GALAPAGOS<br>\n				<b>Canto|n:</b><br>\n				<b>Ciudad:</b><br>\n				<b>Tipo:</b>DOMICILIO<br>\n				\n				\n				<p>Tienes <b>24hrs</b> para responder este e-mail.</p>\n				\n				<p>\n				Saludos<br>\n				Equipo de Equivida\n				</p>\n				', '2013-04-03 04:44:00'),
(76, 1, 'Prestamo', '', 'Solicitar', '\n				Estimado cliente,\n				<p>\n				Su solicitud  N° 76 para <b>Préstamo</b> ha sido recibida y será atendida en el lapso de 24hrs.\n				</p>\n				<p>\n				Para cualquier duda comunicarse con: soporteweb@equivida.com\n				</p>\n				<br>\n				Muchas gracias\n\n				<p>\n				Saludos<br>\n				Equipo de Equivida\n				</p>\n				', '\n\n\n				<b>Solicitud  <b>Préstamo</b>  -  </b>\n				<p>\n				El cliente generó una solicitud de Pre|stamo, con los siguientes datos:\n				<br>\n				<h3>Solicitud No. : 76</h3>\n				<b>N. Po|liza:</b> 2590001571<br>\n				<b>Nombre:</b> Victor Collantes<br>\n				<b>Email:</b> bedocc@gmail.com<br>\n				<b>Tele|fono Celular:</b> 095268665<br>\n				<b>Tele|fono Convencional:</b> 22526130<br>\n				<b>Tipo de Usuario:</b> persona<br>\n				\n				<b>Ce|dula del Asegurado:</b> <br>\n				<b>Valor a Prestar:</b> 3000<br>\n				<b>Monto máximo a prestar:</b> 1560.34<br> \n				<b>Nu|mero de Contacto:</b> 2526130<br> \n				<br>\n				<b>Direccio|n del Cliente:</b><br>\n				<b>Calle Principal:</b>XIMENA<br>\n				<b>Calle Secundaria:</b>COOP. 9 DE OCTUBRE<br>\n				<b>Tele|fono convencional:</b><br>\n				<b>Provincia:</b>GALAPAGOS<br>\n				<b>Canto|n:</b><br>\n				<b>Ciudad:</b><br>\n				<b>Tipo:</b>DOMICILIO<br>\n				\n				\n				<p>Tienes <b>24hrs</b> para responder este e-mail.</p>\n				\n				<p>\n				Saludos<br>\n				Equipo de Equivida\n				</p>\n				', '2013-04-03 04:48:02'),
(77, 1, 'Prestamo', '', 'Solicitar', '\n				Estimado cliente,\n				<p>\n				Su solicitud  N° 77 para <b>Préstamo</b> ha sido recibida y será atendida en el lapso de 24hrs.\n				</p>\n				<p>\n				Para cualquier duda comunicarse con: soporteweb@equivida.com\n				</p>\n				<br>\n				Muchas gracias\n\n				<p>\n				Saludos<br>\n				Equipo de Equivida\n				</p>\n				', '\n\n\n				<b>Solicitud  <b>Préstamo</b>  -  </b>\n				<p>\n				El cliente generó una solicitud de Pre|stamo, con los siguientes datos:\n				<br>\n				<h3>Solicitud No. : 77</h3>\n				<b>N. Po|liza:</b> 2590001571<br>\n				<b>Nombre:</b> Victor Collantes<br>\n				<b>Email:</b> bedocc@gmail.com<br>\n				<b>Tele|fono Celular:</b> 095268665<br>\n				<b>Tele|fono Convencional:</b> 22526130<br>\n				<b>Tipo de Usuario:</b> persona<br>\n				\n				<b>Ce|dula del Asegurado:</b> <br>\n				<b>Valor a Prestar:</b> 2010<br>\n				<b>Monto máximo a prestar:</b> 1560.34<br> \n				<b>Nu|mero de Contacto:</b> 2526130<br> \n				<br>\n				<b>Direccio|n del Cliente:</b><br>\n				<b>Calle Principal:</b>XIMENA<br>\n				<b>Calle Secundaria:</b>COOP. 9 DE OCTUBRE<br>\n				<b>Tele|fono convencional:</b><br>\n				<b>Provincia:</b>GALAPAGOS<br>\n				<b>Canto|n:</b><br>\n				<b>Ciudad:</b><br>\n				<b>Tipo:</b>DOMICILIO<br>\n				\n				\n				<p>Tienes <b>24hrs</b> para responder este e-mail.</p>\n				\n				<p>\n				Saludos<br>\n				Equipo de Equivida\n				</p>\n				', '2013-04-03 04:52:57'),
(78, 1, 'Siniestro', '2590001571', 'Notificar', '\n			Estimado Cliente,\n			<p>\n			Su notificación ha sido recibida en <b>EQUIVIDA S.A.</b>\n			</p>\n			<p>\n			Un ejecutivo de siniestros se comunicará con usted en el transcurso de las próximas 48 horas, para indicarle los pasos a seguir para su reclamo.\n			</p>\n			<p>\n			Para cualquier duda comunicarse con: soporteweb@equivida.com\n			</p>\n			Muchas gracias.\n		', '\n		\n		<b>Notificacio|n Siniestro</b>\n		<p>\n			<h3>Solicitud No. : 78</h3>\n			<b>Po|liza:</b>2590001571<br>\n			<b>E-mail:</b>bedocc@gmail.com<br>\n			<b>Primer Nombre:</b>Victor<br>\n			<b>Segundo Nombre:</b>Hugo<br>\n			<b>Apellido Paterno:</b>Collantes<br>\n			<b>Tipo de Usuario:</b> persona<br>\n			<b>Ce|dula:</b>0704798651<br>\n				<b>Tele|fono Celular:</b> 095268665<br>\n				<b>Tele|fono Convencional:</b> 22526130<br>\n			<b>Contratante :</b>Max Ca|ceres<br>\n			\n		<b>Datos de Contacto</b><br>	\n			<b>Nombre Completo de Contacto :</b>Max Ca|ceres<br>\n			<b>Tele|fono Contacto :</b>(02)555-5555<br>\n			<b>Celular Contacto :</b>(09)526-13000<br>\n			<b>Mail Contacto :</b>maximiliano@bedomax.com<br>\n			<b>Fecha del evento:</b>2013-04-16<br>\n			<b>Diagnostico y breve descripcio|n del evento:</b>Esto es un prueba<br>\n		</p>\n		\n		<p>Tienes <b></b> para responder este e-mail.</p>\n		\n		', '2013-04-03 04:55:00'),
(79, 1, 'Factura', '', 'Solicitar', '\n				Estimado cliente,\n				<p>\n				Su solicitud  N° 79 para <b>Factura</b> ha sido recibida y será atendida en el lapso de 24hrs.\n				</p>\n				<p>\n				Para cualquier duda comunicarse con: soporteweb@equivida.com\n				</p>\n				<br>\n				Muchas gracias\n\n				<p>\n				Saludos<br>\n				Equipo de Equivida\n				</p>\n				', '\n\n\n				<b>Solicitud  <b>Factura</b>  - email </b>\n				<p>\n				El cliente genero| una solicitud de Factura, con los siguientes datos:\n				<br>\n				\n				<h3>Solicitud No. : 79</h3>\n				<b>No. Po|liza:</b> 2590001571<br>\n				\n				<b>Nombre:</b> Victor Collantes<br>\n				<b>Email:</b> bedocc@gmail.com<br>\n				<b>Tele|fono Celular:</b> 095268665<br>\n				<b>Tele|fono Convencional:</b> 22526130<br>\n				<b>Tipo de Usuario:</b> persona<br>\n				\n				<h3>Información de la Factura</h3>\n				\n				<b>Cédula del Asegurado:</b> 0704798651<br>\n				<b>Fecha Desde:</b> 2013/Enero<br>\n				<b>Fecha Hasta:</b> 2013/Enero<br>\n				<b>Tipo de Envío:</b> email<br> \n				<b>Nu|mero de Contactp:</b> 2526130<br> \n				<br>\n			\n				<h3>Direccio|n del Cliente</h3>\n			\n				<b>Calle Principal:</b>XIMENA<br>\n				<b>Calle Secundaria:</b>COOP. 9 DE OCTUBRE<br>\n				<b>Teléfono convencional:</b><br>\n				<b>Provincia:</b>GALAPAGOS<br>\n				<b>Cantón:</b><br>\n				<b>Ciudad:</b><br>\n				<b>Tipo:</b>DOMICILIO<br>\n				<p>Tienes <b>24hrs</b> para responder este e-mail.</p>\n				<p>\n				Saludos<br>\n				Equipo de Equivida\n				</p>\n				', '2013-04-03 04:55:22'),
(80, 37, 'Certificado Individual', '2250000999', 'Generar', '', '', '2013-04-08 16:08:33'),
(81, 11, 'Certificado Individual', '2500001203', 'Generar', '', '', '2013-04-08 21:39:48');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `super_usuarios`
--

CREATE TABLE IF NOT EXISTS `super_usuarios` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(250) NOT NULL,
  `fecha_create` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `super_usuarios`
--

INSERT INTO `super_usuarios` (`id`, `usuario`, `contrasena`, `fecha_create`) VALUES
(1, 'admin', '*B5F0CDD47F544D12DD93BD401848F3D7D1E74694', '2012-12-26');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `telefonos`
--

CREATE TABLE IF NOT EXISTS `telefonos` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(10) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `usuario_id` bigint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `telefonos`
--

INSERT INTO `telefonos` (`id`, `numero`, `tipo`, `usuario_id`) VALUES
(6, '2484184', 'CONVENCIONAL', 1),
(7, '2887666', 'CONVENCIONAL', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tipos_accionistas`
--

CREATE TABLE IF NOT EXISTS `tipos_accionistas` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `tipos_accionistas`
--

INSERT INTO `tipos_accionistas` (`id`, `nombre`) VALUES
(1, 'Accionistas'),
(2, 'Miembro de Directorio');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tipo_usuarios`
--

CREATE TABLE IF NOT EXISTS `tipo_usuarios` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id`, `nombre`) VALUES
(1, 'Personas'),
(2, 'Empresas'),
(3, 'Brokers'),
(4, 'Accionistas');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `primer_nombre` varchar(100) NOT NULL,
  `segundo_nombre` varchar(100) NOT NULL,
  `primer_apellido` varchar(100) NOT NULL,
  `segundo_apellido` varchar(100) NOT NULL,
  `tipo_de_documento` varchar(30) NOT NULL,
  `numero_de_documento` varchar(13) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `forget` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `provincia_id` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `calle_principal` varchar(100) NOT NULL,
  `calle_secundaria` text NOT NULL,
  `telefono_convencional` varchar(100) NOT NULL,
  `telefono_movil` varchar(100) NOT NULL,
  `nombre_de_la_empresa` varchar(100) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `ruc` varchar(100) NOT NULL,
  `cargo` varchar(13) NOT NULL,
  `imagen_seguridad` bigint(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `tipo_usuario_id` bigint(11) NOT NULL,
  `estado_id` bigint(11) NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Daten für Tabelle `usuarios`
--

INSERT INTO `usuarios` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `tipo_de_documento`, `numero_de_documento`, `sexo`, `email`, `contrasena`, `forget`, `pais`, `provincia_id`, `ciudad`, `calle_principal`, `calle_secundaria`, `telefono_convencional`, `telefono_movil`, `nombre_de_la_empresa`, `razon_social`, `ruc`, `cargo`, `imagen_seguridad`, `fecha_creacion`, `tipo_usuario_id`, `estado_id`, `fecha_actualizacion`) VALUES
(1, 'Victor', 'Hugo', 'Collantes', 'Cárdenas', 'C', '1706954375', 'M', 'bedocc@gmail.com', '*1E54C00353238818889161E308914D9AAD641028', 'equivida3887', 'Ecuador', '', 'Quito', 'Calle Italia', 'Av. Eloy Alfaro', '22526130', '095268665', '', '', '', '', 3, '2012-12-17 11:55:05', 1, 1, '2012-12-17 11:55:05'),
(4, 'Christian', 'Marcelo', 'Diaz', 'Cabrera', 'C', '2000062980', 'M', 'crisdiaz_19@hotmail.com', '*07C1F9F2502EA22D773281D2502184457D80D107', 'bolivariano2012', 'Ecuador', '', 'Guayaquil', 'Orquideas', 'Mz 1028 V 08', '042893921', '0999151507', '', '', '', '', 6, '2012-12-18 19:27:55', 1, 1, '2012-12-18 19:27:55'),
(5, 'Mario', 'Fernando', 'Murillo', 'Naranjo', 'C', '0602929994', 'M', 'mario@aunasoft.com', '*7C01D76A609B9E17B9D8D109F751F22CC3727137', '14311431', 'Ecuador', '', 'Quito', 'Obispo Dias De La Mmadrid', 'San Felipe', '2441550', '0987798966', '', '', '', '', 3, '2012-12-20 18:03:02', 1, 1, '2012-12-20 18:03:02'),
(6, 'Mirian', 'Maria', 'Pàrraga', 'Zambrano', 'C', '0912250388', 'F', 'mirianmpz@hotmail.com', '*33B64725E396171E67BE9B0A01EF16672AEBE958', 'santotomas1968', 'Ecuador', '', 'Guayaquil', 'Cdla. Cogra ', 'Mz. 3 Solar 17 H1', '042207739', '0999324138', '', '', '', '', 4, '2012-12-21 21:52:50', 1, 1, '2012-12-21 21:52:50'),
(7, 'Micaela', '', 'Cevallos', '', 'P', '1716608516', 'F', 'micaela.cevallos@gmail.com', '*3D01BFE52282C422A19286AD5386A858FCF3D5EF', 'ang3laragundio', 'Ecuador', '', 'Quito', 'Antonio De Sierra', 'Verde Cruz', '3228542', '0998758860', '', '', '', '', 2, '2012-12-26 06:53:49', 1, 1, '2012-12-26 06:53:49'),
(8, 'Fabio', 'Salvador', 'Posligua', 'Flores', 'C', '0801919176', 'M', 'fposligua@yahoo.com', '*0A126CC123EDDBB0858BE3730874999D6DAA951E', 'fabio32246', 'Ecuador', '', 'Esmeraldas', '', '', '', '', '', '', '', '', 7, '2012-12-26 11:16:59', 1, 1, '2012-12-26 11:16:59'),
(9, 'Mirian', 'Maria', 'Parraga', 'Zambrano', 'C', '0912250388', 'F', 'mirianmpz@hotmail.com', '*33B64725E396171E67BE9B0A01EF16672AEBE958', 'santotomas1968', 'Ecuador', '', 'Guayaquil', 'Cdla Cogra', 'Mz 3 Solar 17', '042207739', '0999324138', '', '', '', '', 4, '2012-12-27 15:02:51', 1, 1, '2012-12-27 15:02:51'),
(37, 'Bedo', 'Maximiliano', 'Cáceres', 'Bernal', 'C', '1717056984', 'M', 'bedo@3puntocero.com', '*A21BAF1863EE4C70352CC694D2BBC4A130CFFC76', 'gloria3887', 'Ecuado', '19', 'Quito', 'Calle Italia', 'Av. Eloy Alfaro', '22526130', '095268665', '3puntocero', '3puntocero', '1791257049001', 'Gerente', 3, '2013-03-19 11:27:54', 2, 1, '2013-03-19 11:27:54'),
(11, 'Tecniseguros', 'Tecniseguros', 'Tecniseguros', 'Tecniseguros', 'C', '1790048772001', 'M', 'tecniseguros@equivida.com', '*A21BAF1863EE4C70352CC694D2BBC4A130CFFC76', 'gloria3887', 'Ecuador', '19', 'Quito', 'Calle Italia', 'Av. Eloy Alfaro', '22526130', '095268665', 'Tecniseguros', 'Tecniseguros', '1790048772001', 'Gerente', 6, '2012-12-28 12:44:47', 3, 1, '2012-12-28 12:44:47'),
(12, 'Bedo', 'Maximiliano', 'Cáceres', 'Bernal', 'C', '1717056988', 'M', 'accionista@equivida.com', '*A21BAF1863EE4C70352CC694D2BBC4A130CFFC76', 'gloria3887', 'Ecuador', '19', 'Quito', 'Calle Italia', 'Av. Eloy Alfaro', '22526130', '095268665', '', '', '', '', 5, '2012-12-28 12:45:24', 4, 1, '2012-12-28 12:45:24'),
(47, 'Max', 'Bedo', 'Caceres', 'Bernal', 'C', '1717056981', 'M', 'directorio@equivida.com', '*A21BAF1863EE4C70352CC694D2BBC4A130CFFC76', 'gloria3887', 'Ecuador', '19', 'Quito', 'Calle Italia', 'Av. Eloy Alfaro', '22526130', '095268665', '', '', '', '', 5, '2013-04-02 23:22:52', 4, 1, '2013-04-02 23:22:52');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usuarios_adicionales`
--

CREATE TABLE IF NOT EXISTS `usuarios_adicionales` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `usuario_id` bigint(20) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `usuarios_adicionales`
--

INSERT INTO `usuarios_adicionales` (`id`, `email`, `nombre_completo`, `usuario_id`, `contrasena`, `fecha_create`) VALUES
(11, 'bedomax@gmail.com', 'Maximiliano Caceres', 37, '*B4C2747722F8AE82ED93A51C2BAD3587E0F13A76', '2013-04-07 23:31:39');
