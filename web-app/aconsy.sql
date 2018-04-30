-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-03-2013 a las 16:10:17
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `aconsy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `codigo`, `nombre`) VALUES
(1, 183091, 'Analisis Y Desarrollo De Sistemas De Informacion ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

CREATE TABLE IF NOT EXISTS `elemento` (
  `id_elemento` int(11) NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `serial` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo_barras` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_elemento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `elemento`
--

INSERT INTO `elemento` (`id_elemento`, `tipo`, `marca`, `serial`, `descripcion`, `codigo_barras`) VALUES
(1, 'Tablet', 'Samsung', 'Galaxy Tab 10.1', 'Corteza Dura', 'fg'),
(2, 'Portatil', 'ASUS', 'R500V', 'CafÃ©', 'fg1'),
(3, 'Portatil', 'Compaq', '05W7', 'C700', 'fg2'),
(4, 'Portatil', 'dgf', 'sfdf', 'hjvhj', 'fg3'),
(6, 'Tablet', 'Samsung', 'Galaxy Tab 10.1.2', 'Negra', 'fg5'),
(7, 'Portatil', 'ASUS', 'Nexus7', '7', '008dc88631');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garaje`
--

CREATE TABLE IF NOT EXISTS `garaje` (
  `id_garaje` int(11) NOT NULL,
  `lugar_garaje` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numero_garaje` int(11) NOT NULL,
  PRIMARY KEY (`id_garaje`)
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Volcado de datos para la tabla `garaje`
--

INSERT INTO `garaje` (`id_garaje`, `lugar_garaje`, `numero_garaje`) VALUES
(1, 'noroccidente', 1),
(2, 'noroccidente', 2),
(3, 'norte', 5),
(4, 'sur', 5),
(5, 'occidente', 4),
(6, 'oriente', 2),
(101, 'motos', 1),
(102, 'motos', 2),
(103, 'motos', 3),
(104, 'motos', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE IF NOT EXISTS `ingreso` (
  `id_ingreso` int(11) NOT NULL,
  `fecha_entrada` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ingreso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`id_ingreso`, `fecha_entrada`, `fecha_salida`) VALUES
(7, '2012-09-07 17:45:51', '2012-09-07 19:51:53'),
(8, '2012-09-10 20:46:32', '2012-09-11 02:19:38'),
(9, '2012-09-17 20:44:46', '2012-09-17 20:45:18'),
(10, '2012-09-20 21:22:48', '0000-00-00 00:00:00'),
(11, '2012-09-20 21:24:34', '0000-00-00 00:00:00'),
(12, '2012-09-20 21:29:32', '0000-00-00 00:00:00'),
(13, '2012-09-20 21:31:46', '0000-00-00 00:00:00'),
(14, '2012-09-21 19:08:23', '2012-09-21 19:08:25'),
(15, '2012-09-21 19:08:25', '2012-09-21 19:08:25'),
(16, '2012-09-21 19:18:06', '2012-09-21 19:18:09'),
(17, '2012-12-04 19:58:11', '2012-12-04 19:58:42'),
(18, '2012-12-04 21:19:08', '2012-12-04 21:26:18'),
(19, '2012-12-04 21:19:17', '2012-12-04 21:23:29'),
(20, '2012-12-04 21:21:59', '2012-12-04 21:28:58'),
(21, '2012-12-04 21:22:48', '2012-12-04 21:23:15'),
(22, '2012-12-04 21:23:52', '2012-12-04 21:25:23'),
(23, '2012-12-04 21:27:33', '2012-12-04 21:27:52'),
(24, '2012-12-04 21:28:04', '2012-12-04 21:28:33'),
(25, '2012-12-03 21:31:54', '2012-12-03 21:32:13'),
(26, '2013-02-05 21:24:02', '2013-02-05 21:33:38'),
(27, '2013-02-05 21:32:22', '2013-02-05 21:33:49'),
(28, '2013-02-05 21:33:56', '2013-02-05 21:34:11'),
(29, '2013-02-05 21:34:04', '2013-02-05 21:34:27'),
(30, '2013-02-05 21:34:19', '2013-02-05 21:34:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_elemento`
--

CREATE TABLE IF NOT EXISTS `ingreso_elemento` (
  `id_ingreso` int(11) NOT NULL,
  `id_elemento` int(11) NOT NULL,
  PRIMARY KEY (`id_ingreso`,`id_elemento`),
  KEY `fk_id_elemento` (`id_elemento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingreso_elemento`
--

INSERT INTO `ingreso_elemento` (`id_ingreso`, `id_elemento`) VALUES
(26, 1),
(27, 1),
(28, 1),
(29, 2),
(30, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_usuario`
--

CREATE TABLE IF NOT EXISTS `ingreso_usuario` (
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `id_ingreso` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario`,`id_ingreso`),
  KEY `id_ingreso` (`id_ingreso`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ingreso_usuario`
--

INSERT INTO `ingreso_usuario` (`id_usuario`, `id_ingreso`) VALUES
(1, 17),
(5, 18),
(1, 19),
(8, 20),
(7, 21),
(1, 22),
(7, 23),
(7, 24),
(8, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_vehiculo`
--

CREATE TABLE IF NOT EXISTS `ingreso_vehiculo` (
  `id_ingreso` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_ingreso`,`id_vehiculo`,`id_usuario`),
  KEY `id_vehiculo` (`id_vehiculo`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE IF NOT EXISTS `jornada` (
  `id_jornada` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `hora_entrada` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `hora_Salida` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_jornada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`id_jornada`, `nombre`, `hora_entrada`, `hora_Salida`) VALUES
(1, 'Jornada Laboral', '08:00', '18:00'),
(2, 'Primer Turno', '06:00', '14:00'),
(3, 'Segundo Turno', '14:00', '22:00'),
(4, 'Tercer Turno', '22:00', '06:00'),
(5, 'MaÃ±ana', '6:00', '12:00'),
(6, 'Tarde', '12:00', '18:00'),
(7, 'Noche', '18:00', '00:00'),
(8, 'Madrugada', '00:00', '06:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada_usuario`
--

CREATE TABLE IF NOT EXISTS `jornada_usuario` (
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `id_jornada` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario`,`id_jornada`),
  KEY `id_jornada` (`id_jornada`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `jornada_usuario`
--

INSERT INTO `jornada_usuario` (`id_usuario`, `id_jornada`) VALUES
(1, 7),
(2, 7),
(3, 7),
(4, 7),
(5, 7),
(7, 7),
(8, 7),
(9, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Instructor'),
(3, 'Aprendiz'),
(4, 'Vigilante'),
(5, 'Servicios Generales'),
(6, 'Visitante'),
(7, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `contrasena` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `cedula` bigint(30) NOT NULL,
  `cargo` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombres` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `primer_apellido` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `segundo_apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` bigint(30) DEFAULT NULL,
  `celular` bigint(30) DEFAULT NULL,
  `extension` bigint(30) DEFAULT NULL,
  `direccion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `area` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `contrasena`, `cedula`, `cargo`, `nombres`, `primer_apellido`, `segundo_apellido`, `telefono`, `celular`, `extension`, `direccion`, `area`, `estado`) VALUES
(1, '788820ba02e5ad39cdffe0d586635b6f', 1026274522, 'Administrador', 'Oscar Mauricio', 'Forero', 'SaldaÃ±a', 3007892137, 3133193847, 0, 'Suba', 'Sistemas', 1),
(2, '56ef4a9ce1d5496073a8d165e379bd62', 1022370460, 'Administrador', 'Heiner Estiben', 'Castellanos', 'Soche', 3016470166, 3133529631, 0, 'cra 59 nÂ° 4G - 24', 'Sistemas', 1),
(3, 'aa9c5be52eca31417a43562954daf720', 80757321, 'Administrador', 'Fabian Camilo', 'Espitia ', 'Vargas', 7384759, 3177702656, 0, 'krr 98 # 2 32 ', 'Sistemas', 1),
(4, 'b86e028b6adbe682e6106bd29730c414', 1002558356, 'Administrador', 'Diana Marcela', 'Perez', 'Lippelt', 7834605, 3138704031, 0, 'cra 87k #56f 54 sur', 'sistemas', 1),
(5, '6fcd855eb02a5bc8d0fe50dd18dc75c0', 80882283, 'Administrador', 'Sergio Alexander', 'Amaya ', 'Serrato', 5709711, 3167259347, 0, 'Cra 89D  # 32-15 sur', 'Sistemas', 1),
(6, 'b4afc4106659a9dcd4f0754c4fb46f24', 123456789, 'Estudiante', 'Aprendiz', 'Aprendiz', 'Aprendiz', 123456789, 123456789, 0, '', 'Electrica', 1),
(7, 'b7bee6b36bd35b773132d4e3a74c2bb5', 1032399320, 'Estudiante', 'Daniel Alfredo', 'Ortegon', 'Baza', 0, 3212505113, 0, '', 'ADSI', 1),
(8, 'a9a0198010a6073db96434f6cc5f22a8', 1030587965, 'Estudiante', 'Carol Natalia', 'Cardona', 'Ospina', 4811931, 3102353752, 0, '', 'ADSI', 1),
(9, 'dc0372b3547bea523d54589390bfd4ab', 1030529496, 'Administradora', 'Yeimi Paola', 'Lancheros', 'Sanchez', 2305289, 3175804685, 0, 'Diag 51c #54A-08 Sur', 'ADSI', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_curso`
--

CREATE TABLE IF NOT EXISTS `usuario_curso` (
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `id_curso` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario`,`id_curso`),
  KEY `id_curso` (`id_curso`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_curso`
--

INSERT INTO `usuario_curso` (`id_usuario`, `id_curso`) VALUES
(1, 1),
(5, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_elemento`
--

CREATE TABLE IF NOT EXISTS `usuario_elemento` (
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `id_elemento` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario`,`id_elemento`),
  KEY `id_elemento` (`id_elemento`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_elemento`
--

INSERT INTO `usuario_elemento` (`id_usuario`, `id_elemento`) VALUES
(1, 1),
(1, 2),
(5, 3),
(1, 6),
(1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL DEFAULT '0',
  KEY `id_Rol` (`id_rol`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`id_usuario`, `id_rol`) VALUES
(1, 1),
(1, 6),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_vehiculo`
--

CREATE TABLE IF NOT EXISTS `usuario_vehiculo` (
  `id_usuario` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_garaje` int(11) NOT NULL,
  `id_jornada` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_vehiculo`,`id_garaje`,`id_jornada`),
  KEY `id_vehiculo` (`id_vehiculo`),
  KEY `fk_usuario_vehiculo_garaje` (`id_garaje`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_jornada` (`id_jornada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `placa` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `marca` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `color` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tipo` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingreso_elemento`
--
ALTER TABLE `ingreso_elemento`
  ADD CONSTRAINT `ingreso_elemento_ibfk_1` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso` (`id_ingreso`),
  ADD CONSTRAINT `ingreso_elemento_ibfk_2` FOREIGN KEY (`id_elemento`) REFERENCES `elemento` (`id_elemento`);

--
-- Filtros para la tabla `ingreso_usuario`
--
ALTER TABLE `ingreso_usuario`
  ADD CONSTRAINT `ingreso_usuario_ibfk_1` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso` (`id_ingreso`),
  ADD CONSTRAINT `ingreso_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `ingreso_vehiculo`
--
ALTER TABLE `ingreso_vehiculo`
  ADD CONSTRAINT `ingreso_vehiculo_ibfk_1` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso` (`id_ingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ingreso_vehiculo_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ingreso_vehiculo_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `jornada_usuario`
--
ALTER TABLE `jornada_usuario`
  ADD CONSTRAINT `jornada_usuario_ibfk_1` FOREIGN KEY (`id_jornada`) REFERENCES `jornada` (`id_jornada`),
  ADD CONSTRAINT `jornada_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario_curso`
--
ALTER TABLE `usuario_curso`
  ADD CONSTRAINT `usuario_curso_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `usuario_curso_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario_elemento`
--
ALTER TABLE `usuario_elemento`
  ADD CONSTRAINT `usuario_elemento_ibfk_1` FOREIGN KEY (`id_elemento`) REFERENCES `elemento` (`id_elemento`),
  ADD CONSTRAINT `usuario_elemento_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `usuario_rol_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_rol_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_vehiculo`
--
ALTER TABLE `usuario_vehiculo`
  ADD CONSTRAINT `fk_usuario_vehiculo_garaje` FOREIGN KEY (`id_garaje`) REFERENCES `garaje` (`id_garaje`),
  ADD CONSTRAINT `usuario_vehiculo_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`),
  ADD CONSTRAINT `usuario_vehiculo_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_vehiculo_ibfk_4` FOREIGN KEY (`id_jornada`) REFERENCES `jornada` (`id_jornada`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
