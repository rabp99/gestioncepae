-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2016 a las 01:45:25
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gestioncepae`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
`id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=156 ;

--
-- Volcado de datos para la tabla `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 310),
(2, 1, NULL, NULL, 'Alumnos', 2, 25),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'add', 5, 6),
(5, 2, NULL, NULL, 'view', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 2, NULL, NULL, 'getAlumnos', 13, 14),
(9, 2, NULL, NULL, 'getPadre0ByDni', 15, 16),
(10, 2, NULL, NULL, 'getPadre1ByDni', 17, 18),
(11, 2, NULL, NULL, 'getPadre2ByDni', 19, 20),
(12, 2, NULL, NULL, 'datos_alumno', 21, 22),
(13, 2, NULL, NULL, 'datos_apoderado', 23, 24),
(14, 1, NULL, NULL, 'Aniolectivos', 26, 37),
(15, 14, NULL, NULL, 'index', 27, 28),
(16, 14, NULL, NULL, 'add', 29, 30),
(17, 14, NULL, NULL, 'view', 31, 32),
(18, 14, NULL, NULL, 'edit', 33, 34),
(19, 14, NULL, NULL, 'delete', 35, 36),
(20, 1, NULL, NULL, 'Areas', 38, 49),
(21, 20, NULL, NULL, 'index', 39, 40),
(22, 20, NULL, NULL, 'add', 41, 42),
(23, 20, NULL, NULL, 'view', 43, 44),
(24, 20, NULL, NULL, 'edit', 45, 46),
(25, 20, NULL, NULL, 'delete', 47, 48),
(26, 1, NULL, NULL, 'Asignaciones', 50, 61),
(27, 26, NULL, NULL, 'index', 51, 52),
(28, 26, NULL, NULL, 'registrar', 53, 54),
(29, 26, NULL, NULL, 'modificar', 55, 56),
(30, 26, NULL, NULL, 'view', 57, 58),
(31, 26, NULL, NULL, 'getAsignaciones', 59, 60),
(32, 1, NULL, NULL, 'Bimestres', 62, 73),
(33, 32, NULL, NULL, 'index', 63, 64),
(34, 32, NULL, NULL, 'add', 65, 66),
(35, 32, NULL, NULL, 'view', 67, 68),
(36, 32, NULL, NULL, 'edit', 69, 70),
(37, 32, NULL, NULL, 'delete', 71, 72),
(38, 1, NULL, NULL, 'Conceptos', 74, 87),
(39, 38, NULL, NULL, 'index', 75, 76),
(40, 38, NULL, NULL, 'add', 77, 78),
(41, 38, NULL, NULL, 'view', 79, 80),
(42, 38, NULL, NULL, 'edit', 81, 82),
(43, 38, NULL, NULL, 'delete', 83, 84),
(44, 38, NULL, NULL, 'getFormByAniolectivo', 85, 86),
(45, 1, NULL, NULL, 'Cursos', 88, 111),
(46, 45, NULL, NULL, 'index', 89, 90),
(47, 45, NULL, NULL, 'add', 91, 92),
(48, 45, NULL, NULL, 'view', 93, 94),
(49, 45, NULL, NULL, 'edit', 95, 96),
(50, 45, NULL, NULL, 'delete', 97, 98),
(51, 45, NULL, NULL, 'cursosByDocente', 99, 100),
(52, 45, NULL, NULL, 'view_docente', 101, 102),
(53, 45, NULL, NULL, 'cursosByAlumno', 103, 104),
(54, 45, NULL, NULL, 'view_alumno', 105, 106),
(55, 45, NULL, NULL, 'cursosByApoderado', 107, 108),
(56, 45, NULL, NULL, 'view_apoderado', 109, 110),
(57, 1, NULL, NULL, 'Docentes', 112, 127),
(58, 57, NULL, NULL, 'index', 113, 114),
(59, 57, NULL, NULL, 'add', 115, 116),
(60, 57, NULL, NULL, 'view', 117, 118),
(61, 57, NULL, NULL, 'edit', 119, 120),
(62, 57, NULL, NULL, 'delete', 121, 122),
(63, 57, NULL, NULL, 'datos_docente', 123, 124),
(64, 57, NULL, NULL, 'getDocentes', 125, 126),
(65, 1, NULL, NULL, 'Grados', 128, 141),
(66, 65, NULL, NULL, 'index', 129, 130),
(67, 65, NULL, NULL, 'add', 131, 132),
(68, 65, NULL, NULL, 'view', 133, 134),
(69, 65, NULL, NULL, 'edit', 135, 136),
(70, 65, NULL, NULL, 'delete', 137, 138),
(71, 65, NULL, NULL, 'getByIdnivel', 139, 140),
(72, 1, NULL, NULL, 'Groups', 142, 149),
(73, 72, NULL, NULL, 'index', 143, 144),
(74, 72, NULL, NULL, 'view', 145, 146),
(75, 72, NULL, NULL, 'add', 147, 148),
(76, 1, NULL, NULL, 'Matriculas', 150, 159),
(77, 76, NULL, NULL, 'index', 151, 152),
(78, 76, NULL, NULL, 'add', 153, 154),
(79, 76, NULL, NULL, 'view', 155, 156),
(80, 76, NULL, NULL, 'delete', 157, 158),
(81, 1, NULL, NULL, 'Niveles', 160, 171),
(82, 81, NULL, NULL, 'index', 161, 162),
(83, 81, NULL, NULL, 'add', 163, 164),
(84, 81, NULL, NULL, 'view', 165, 166),
(85, 81, NULL, NULL, 'edit', 167, 168),
(86, 81, NULL, NULL, 'delete', 169, 170),
(87, 1, NULL, NULL, 'Notas', 172, 191),
(88, 87, NULL, NULL, 'index', 173, 174),
(89, 87, NULL, NULL, 'administrar', 175, 176),
(90, 87, NULL, NULL, 'registrar', 177, 178),
(91, 87, NULL, NULL, 'getFormNotas', 179, 180),
(92, 87, NULL, NULL, 'getFormRegistro', 181, 182),
(93, 87, NULL, NULL, 'index_alumno', 183, 184),
(94, 87, NULL, NULL, 'view_alumno', 185, 186),
(95, 87, NULL, NULL, 'index_apoderado', 187, 188),
(96, 87, NULL, NULL, 'view_apoderado', 189, 190),
(97, 1, NULL, NULL, 'Pages', 192, 205),
(98, 97, NULL, NULL, 'admin', 193, 194),
(99, 97, NULL, NULL, 'alumno', 195, 196),
(100, 97, NULL, NULL, 'apoderado', 197, 198),
(101, 97, NULL, NULL, 'docente', 199, 200),
(102, 97, NULL, NULL, 'pagos', 201, 202),
(103, 97, NULL, NULL, 'prohibido', 203, 204),
(104, 1, NULL, NULL, 'Pagos', 206, 227),
(105, 104, NULL, NULL, 'index', 207, 208),
(106, 104, NULL, NULL, 'index_pagos', 209, 210),
(107, 104, NULL, NULL, 'registrar', 211, 212),
(108, 104, NULL, NULL, 'registrar_pagos', 213, 214),
(109, 104, NULL, NULL, 'view', 215, 216),
(110, 104, NULL, NULL, 'view_pagos', 217, 218),
(111, 104, NULL, NULL, 'index_alumno', 219, 220),
(112, 104, NULL, NULL, 'index_apoderado', 221, 222),
(113, 104, NULL, NULL, 'getFormPagos', 223, 224),
(114, 104, NULL, NULL, 'cancelar', 225, 226),
(115, 1, NULL, NULL, 'Reportes', 228, 253),
(116, 115, NULL, NULL, 'notas_alumno', 229, 230),
(117, 115, NULL, NULL, 'notas_apoderado', 231, 232),
(118, 115, NULL, NULL, 'notas_alumno_post', 233, 234),
(119, 115, NULL, NULL, 'notas_apoderado_post', 235, 236),
(120, 115, NULL, NULL, 'pagos', 237, 238),
(121, 115, NULL, NULL, 'pagos_admin', 239, 240),
(122, 115, NULL, NULL, 'pagos_post', 241, 242),
(123, 115, NULL, NULL, 'pagos_admin_post', 243, 244),
(124, 115, NULL, NULL, 'morosos', 245, 246),
(125, 115, NULL, NULL, 'morosos_post', 247, 248),
(126, 115, NULL, NULL, 'matriculas', 249, 250),
(127, 115, NULL, NULL, 'matriculas_post', 251, 252),
(128, 1, NULL, NULL, 'Secciones', 254, 269),
(129, 128, NULL, NULL, 'index', 255, 256),
(130, 128, NULL, NULL, 'add', 257, 258),
(131, 128, NULL, NULL, 'view', 259, 260),
(132, 128, NULL, NULL, 'edit', 261, 262),
(133, 128, NULL, NULL, 'delete', 263, 264),
(134, 128, NULL, NULL, 'getByIdgrado', 265, 266),
(135, 128, NULL, NULL, 'getNextSeccion', 267, 268),
(136, 1, NULL, NULL, 'Turnos', 270, 281),
(137, 136, NULL, NULL, 'index', 271, 272),
(138, 136, NULL, NULL, 'add', 273, 274),
(139, 136, NULL, NULL, 'view', 275, 276),
(140, 136, NULL, NULL, 'edit', 277, 278),
(141, 136, NULL, NULL, 'delete', 279, 280),
(142, 1, NULL, NULL, 'Users', 282, 307),
(143, 142, NULL, NULL, 'initDB', 283, 284),
(144, 142, NULL, NULL, 'index', 285, 286),
(145, 142, NULL, NULL, 'view', 287, 288),
(146, 142, NULL, NULL, 'add', 289, 290),
(147, 142, NULL, NULL, 'edit', 291, 292),
(148, 142, NULL, NULL, 'delete', 293, 294),
(149, 142, NULL, NULL, 'login', 295, 296),
(150, 142, NULL, NULL, 'logout', 297, 298),
(151, 142, NULL, NULL, 'datos_admin', 299, 300),
(152, 142, NULL, NULL, 'datos_pagos', 301, 302),
(153, 142, NULL, NULL, 'change_pass', 303, 304),
(154, 142, NULL, NULL, 'datos', 305, 306),
(155, 1, NULL, NULL, 'AclExtras', 308, 309);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
`idalumno` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nombres` varchar(90) NOT NULL,
  `apellidoPaterno` varchar(60) NOT NULL,
  `apellidoMaterno` varchar(60) NOT NULL,
  `direccion` varchar(120) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `fechaNac` date NOT NULL,
  `lugarNac` varchar(60) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `colegioProc` varchar(60) DEFAULT NULL,
  `seguro` char(1) DEFAULT NULL,
  `aseguradora` varchar(60) DEFAULT NULL,
  `lugarAten` varchar(60) DEFAULT NULL,
  `alergias` varchar(300) DEFAULT NULL,
  `recomendado` varchar(30) DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idalumno`, `iduser`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `direccion`, `telefono`, `sexo`, `fechaNac`, `lugarNac`, `email`, `colegioProc`, `seguro`, `aseguradora`, `lugarAten`, `alergias`, `recomendado`, `observaciones`, `estado`) VALUES
(1, 4, 'reyser', 'moreno', 'loloy', 'sssddd', '223344', 'M', '2006-04-12', 'trujillo', 'aaa@hotmail.com', 'san juan', '1', 'essalud', 'albricht', 'sss', '', '', '1'),
(2, 6, 'alexander', 'moreno', 'loloy', '', '', 'M', '2007-04-25', 'trujillo', '', '', '0', NULL, '', '', '', '', '1'),
(3, 7, 'diego', 'campos', 'yarleque', 'Calle Oro N° 327 Urb San Isidro', '5144345448', 'M', '2008-06-11', 'trujillo', 'gjhgjh@hhhh.com', 'claretiano', '0', NULL, '', 'ninguno', '', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_padres`
--

CREATE TABLE IF NOT EXISTS `alumnos_padres` (
`idalumno_padre` int(11) NOT NULL,
  `idpadre` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `parentesco` varchar(10) NOT NULL,
  `apoderado` char(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `alumnos_padres`
--

INSERT INTO `alumnos_padres` (`idalumno_padre`, `idpadre`, `idalumno`, `parentesco`, `apoderado`) VALUES
(1, 1, 1, 'Padre', '1'),
(2, 2, 1, 'Madre', '0'),
(3, 1, 2, 'Padre', '1'),
(4, 2, 2, 'Madre', '0'),
(5, 3, 3, 'Padre', '1'),
(6, 4, 3, 'Madre', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aniolectivos`
--

CREATE TABLE IF NOT EXISTS `aniolectivos` (
`idaniolectivo` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1' COMMENT 'estado:\n1 => activo\n2 => desactivado\n3 => último año lectivo'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `aniolectivos`
--

INSERT INTO `aniolectivos` (`idaniolectivo`, `descripcion`, `fechainicio`, `fechafin`, `estado`) VALUES
(1, '2015', '2015-03-02', '2015-12-21', '1'),
(2, 'Año Lectivo 2016', '2016-03-07', '2016-12-31', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
`idarea` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `importancia` int(10) unsigned DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`idarea`, `descripcion`, `importancia`, `estado`) VALUES
(1, 'GENERAL', 0, '1'),
(2, 'Matemática', 2, '1'),
(3, 'cta', 4, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
`id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 2),
(2, NULL, 'Group', 2, NULL, 3, 4),
(3, NULL, 'Group', 3, NULL, 5, 6),
(4, NULL, 'Group', 4, NULL, 7, 8),
(5, NULL, 'Group', 5, NULL, 9, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
`id` int(10) NOT NULL,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 2, 99, '1', '1', '1', '1'),
(4, 2, 53, '1', '1', '1', '1'),
(5, 2, 54, '1', '1', '1', '1'),
(6, 2, 93, '1', '1', '1', '1'),
(7, 2, 94, '1', '1', '1', '1'),
(8, 2, 111, '1', '1', '1', '1'),
(9, 2, 116, '1', '1', '1', '1'),
(10, 2, 118, '1', '1', '1', '1'),
(11, 2, 154, '1', '1', '1', '1'),
(12, 2, 153, '1', '1', '1', '1'),
(13, 2, 150, '1', '1', '1', '1'),
(14, 2, 12, '1', '1', '1', '1'),
(15, 3, 1, '-1', '-1', '-1', '-1'),
(16, 3, 100, '1', '1', '1', '1'),
(17, 3, 55, '1', '1', '1', '1'),
(18, 3, 56, '1', '1', '1', '1'),
(19, 3, 95, '1', '1', '1', '1'),
(20, 3, 96, '1', '1', '1', '1'),
(21, 3, 112, '1', '1', '1', '1'),
(22, 3, 117, '1', '1', '1', '1'),
(23, 3, 119, '1', '1', '1', '1'),
(24, 3, 154, '1', '1', '1', '1'),
(25, 3, 153, '1', '1', '1', '1'),
(26, 3, 150, '1', '1', '1', '1'),
(27, 3, 13, '1', '1', '1', '1'),
(28, 4, 1, '-1', '-1', '-1', '-1'),
(29, 4, 101, '1', '1', '1', '1'),
(30, 4, 51, '1', '1', '1', '1'),
(31, 4, 52, '1', '1', '1', '1'),
(32, 4, 88, '1', '1', '1', '1'),
(33, 4, 89, '1', '1', '1', '1'),
(34, 4, 90, '1', '1', '1', '1'),
(35, 4, 91, '1', '1', '1', '1'),
(36, 4, 92, '1', '1', '1', '1'),
(37, 4, 154, '1', '1', '1', '1'),
(38, 4, 153, '1', '1', '1', '1'),
(39, 4, 150, '1', '1', '1', '1'),
(40, 4, 63, '1', '1', '1', '1'),
(41, 5, 1, '1', '1', '1', '1'),
(42, 5, 102, '1', '1', '1', '1'),
(43, 5, 152, '1', '1', '1', '1'),
(44, 5, 154, '1', '1', '1', '1'),
(45, 5, 106, '1', '1', '1', '1'),
(46, 5, 110, '1', '1', '1', '1'),
(47, 5, 108, '1', '1', '1', '1'),
(48, 5, 114, '1', '1', '1', '1'),
(49, 5, 120, '1', '1', '1', '1'),
(50, 5, 122, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE IF NOT EXISTS `asignaciones` (
`idasignacion` int(11) NOT NULL,
  `idseccion` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`idasignacion`, `idseccion`, `idcurso`, `iddocente`, `estado`) VALUES
(1, 1, 1, 1, '1'),
(2, 2, 2, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bimestres`
--

CREATE TABLE IF NOT EXISTS `bimestres` (
`idbimestre` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `bimestres`
--

INSERT INTO `bimestres` (`idbimestre`, `descripcion`, `estado`) VALUES
(1, 'I BIMESTRE', '1'),
(2, 'II BIMESTRE', '1'),
(3, 'III BIMESTRE', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE IF NOT EXISTS `conceptos` (
`idconcepto` int(11) NOT NULL,
  `idaniolectivo` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `monto` decimal(5,2) NOT NULL,
  `fechalimite` date NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`idconcepto`, `idaniolectivo`, `descripcion`, `monto`, `fechalimite`, `estado`) VALUES
(1, 2, 'MATRICULA', '350.00', '2016-03-07', '1'),
(2, 2, 'MARZO', '350.00', '2016-03-31', '1'),
(3, 2, 'ABRIL', '350.00', '2016-04-30', '1'),
(4, 2, 'MAYO', '350.00', '2016-05-31', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
`idcurso` int(11) NOT NULL,
  `idgrado` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `idaniolectivo` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idcurso`, `idgrado`, `idarea`, `idaniolectivo`, `descripcion`, `estado`) VALUES
(1, 1, 2, 2, 'ALGEBRA', '1'),
(2, 2, 2, 2, 'ARITMETICA', '1'),
(3, 2, 2, 2, 'ALGEBRA', '1'),
(4, 1, 2, 2, 'ARITMETICA', '1'),
(5, 2, 3, 2, 'quimica', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallenotas`
--

CREATE TABLE IF NOT EXISTS `detallenotas` (
`iddetallenota` int(11) NOT NULL,
  `idnota` int(11) NOT NULL,
  `idmatricula` int(11) NOT NULL,
  `valor` decimal(4,2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `detallenotas`
--

INSERT INTO `detallenotas` (`iddetallenota`, `idnota`, `idmatricula`, `valor`, `estado`) VALUES
(5, 1, 1, '20.00', '1'),
(6, 2, 1, '5.00', '1'),
(7, 3, 1, '15.00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepagos`
--

CREATE TABLE IF NOT EXISTS `detallepagos` (
`iddetallepago` int(11) NOT NULL,
  `idpago` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `monto` decimal(5,2) NOT NULL,
  `created` date DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `detallepagos`
--

INSERT INTO `detallepagos` (`iddetallepago`, `idpago`, `iduser`, `monto`, `created`, `estado`) VALUES
(1, 1, 1, '350.00', '2016-04-25', '1'),
(2, 5, 1, '200.00', '2016-06-22', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
`iddocente` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidoPaterno` varchar(40) NOT NULL,
  `apellidoMaterno` varchar(40) NOT NULL,
  `especialidad` varchar(30) DEFAULT NULL,
  `dni` char(8) NOT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono1` varchar(10) DEFAULT NULL,
  `telefono2` varchar(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`iddocente`, `iduser`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `especialidad`, `dni`, `direccion`, `telefono1`, `telefono2`, `fecha`, `estado`) VALUES
(1, 3, 'PEDRO', 'GARCIA', 'NNNN', 'matematica', '87654321', 'LAS ORQUIDES', '220992', '949338925', '2006-04-12', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE IF NOT EXISTS `grados` (
`idgrado` int(11) NOT NULL,
  `idnivel` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `simulacro` bit(1) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1' COMMENT 'estado:\n1 => activado\n2 => desactivado'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`idgrado`, `idnivel`, `descripcion`, `capacidad`, `simulacro`, `estado`) VALUES
(1, 2, '1 Grado', 30, NULL, '1'),
(2, 2, '2 Grado', 30, NULL, '1'),
(3, 2, '3er grado', 25, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`idgroup` int(11) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`idgroup`, `descripcion`, `estado`) VALUES
(1, 'Administrador', '1'),
(2, 'Alumno', '1'),
(3, 'Apoderado', '1'),
(4, 'Docente', '1'),
(5, 'Pagos', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE IF NOT EXISTS `matriculas` (
`idmatricula` int(11) NOT NULL,
  `idseccion` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `observacion` varchar(300) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`idmatricula`, `idseccion`, `idalumno`, `created`, `observacion`, `estado`) VALUES
(1, 1, 1, '2016-04-25', '', '1'),
(2, 2, 3, '2016-06-22', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE IF NOT EXISTS `niveles` (
`idnivel` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1' COMMENT 'estado:\n1 => activo\n2 => desactivado'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`idnivel`, `descripcion`, `estado`) VALUES
(1, 'INICIAL', '1'),
(2, 'PRIMARIA', '1'),
(3, 'SECUNDARIA', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
`idnota` int(11) NOT NULL,
  `idasignacion` int(11) NOT NULL,
  `idbimestre` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `peso` int(11) NOT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idnota`, `idasignacion`, `idbimestre`, `descripcion`, `peso`, `observaciones`, `estado`) VALUES
(1, 1, 1, 'cuaderno', 1, 'revisión de cuaderno', '1'),
(2, 1, 1, 'examen parcial', 2, 'examen parcial', '1'),
(3, 1, 1, 'examen bimestral', 1, 'dddd', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE IF NOT EXISTS `padres` (
`idpadre` int(11) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `nombres` varchar(90) NOT NULL,
  `apellidoPaterno` varchar(60) NOT NULL,
  `apellidoMaterno` varchar(60) NOT NULL,
  `dni` char(8) NOT NULL,
  `direccion` varchar(120) DEFAULT NULL,
  `telefono1` varchar(10) DEFAULT NULL,
  `telefono2` varchar(10) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `profesion` varchar(50) DEFAULT NULL,
  `nivelestudio` varchar(50) DEFAULT NULL,
  `ocupacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `padres`
--

INSERT INTO `padres` (`idpadre`, `iduser`, `estado`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `dni`, `direccion`, `telefono1`, `telefono2`, `fechaNac`, `email`, `profesion`, `nivelestudio`, `ocupacion`) VALUES
(1, 5, '1', 'jose', 'moreno', 'rodriguez', '12345677', NULL, '222233', '1234321', '2006-04-21', 'aasss@gmail.com', 'aaa', 'Primaria', ''),
(2, NULL, '1', 'marina', 'loloy', 'rodriguez', '11111111', NULL, '222', '222', '2006-04-08', 'sssdd@gmail.com', '', 'Sin estudios', ''),
(3, 8, '1', 'augusto', 'cabanillas', 'bermeo', '11223344', NULL, '223344', '993454329', '2006-06-13', '', '', '', ''),
(4, NULL, '1', 'carmen', 'bustos', 'contreras', '55664433', NULL, '', '', '2006-06-08', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
`idpago` int(11) NOT NULL,
  `idmatricula` int(11) NOT NULL,
  `idconcepto` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `monto` decimal(5,2) NOT NULL,
  `deuda` decimal(5,2) DEFAULT NULL,
  `fechalimite` date NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idpago`, `idmatricula`, `idconcepto`, `descripcion`, `monto`, `deuda`, `fechalimite`, `estado`) VALUES
(1, 1, 1, 'MATRICULA', '350.00', '0.00', '2016-03-07', '1'),
(2, 1, 2, 'MARZO', '350.00', '350.00', '2016-03-31', '1'),
(3, 1, 3, 'ABRIL', '350.00', '350.00', '2016-04-30', '1'),
(4, 1, 4, 'MAYO', '350.00', '350.00', '2016-05-31', '1'),
(5, 2, 1, 'MATRICULA', '350.00', '150.00', '2016-03-07', '1'),
(6, 2, 2, 'MARZO', '350.00', '350.00', '2016-03-31', '1'),
(7, 2, 3, 'ABRIL', '350.00', '350.00', '2016-04-30', '1'),
(8, 2, 4, 'MAYO', '350.00', '350.00', '2016-05-31', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE IF NOT EXISTS `secciones` (
`idseccion` int(11) NOT NULL,
  `idgrado` int(11) NOT NULL,
  `idaniolectivo` int(11) NOT NULL,
  `idturno` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`idseccion`, `idgrado`, `idaniolectivo`, `idturno`, `descripcion`, `estado`) VALUES
(1, 1, 2, 1, 'A', '1'),
(2, 2, 2, 1, 'A', '1'),
(3, 3, 2, 1, 'A', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE IF NOT EXISTS `turnos` (
`idturno` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`idturno`, `descripcion`, `estado`) VALUES
(1, 'Mañana', '1'),
(2, 'Tarde', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`iduser` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`iduser`, `idgroup`, `username`, `password`, `estado`) VALUES
(1, 1, 'admin', '$2a$10$8q4giX/8CvNMiuJbf0AlXeFo1Vlpvx1XtQoNp8UZ.xFvs.Sz3na9y', '1'),
(2, 5, 'ante12', '$2a$10$7ub.nYOB0Te1/HvlZjr9puToEdjzvZGk5YObNgVWwxPvopK24HUo.', '1'),
(3, 4, 'pedrogar', '$2a$10$5Sxl89FK8AFpt2ncRADPoOYqgkrS6VHf3wWhZOAYOHEnFzYziyTmC', '1'),
(4, 2, 'reyserm', '$2a$10$vfqSPtlYtngZEQSIEaoR7ulJrIkzu3j4.kBjua.gutdoRknrSTSt6', '1'),
(5, 3, '12345677', '$2a$10$sdQ/vmWOy8imigQ/4y9A4OnwUNY.tmE5CuZtg57fPKUYa.kX0N8Fi', '1'),
(6, 2, 'alexanderm', '$2a$10$UJLaKzx/u6oqssrUKeGBCunWe2Bz19HbXCdgjRuk1OCmpdbMeLDZi', '1'),
(7, 2, 'carlos', '$2a$10$lag/2RCEy6TKzR6et9G/NeeKxZMGYU7dM3CrR65P9X8FXzvckVVPC', '1'),
(8, 3, '11223344', '$2a$10$2sWTp9.84D7uSXWdhj0YsuCLk/5EyZ6PIDz6pbSCF5.Ri7MkxpDBS', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acos`
--
ALTER TABLE `acos`
 ADD PRIMARY KEY (`id`), ADD KEY `idx_acos_lft_rght` (`lft`,`rght`), ADD KEY `idx_acos_alias` (`alias`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
 ADD PRIMARY KEY (`idalumno`,`iduser`), ADD KEY `fk_alumnos_users1_idx` (`iduser`);

--
-- Indices de la tabla `alumnos_padres`
--
ALTER TABLE `alumnos_padres`
 ADD PRIMARY KEY (`idalumno_padre`,`idpadre`,`idalumno`), ADD KEY `fk_padres_has_alumnos_alumnos1_idx` (`idalumno`), ADD KEY `fk_padres_has_alumnos_padres1_idx` (`idpadre`);

--
-- Indices de la tabla `aniolectivos`
--
ALTER TABLE `aniolectivos`
 ADD PRIMARY KEY (`idaniolectivo`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
 ADD PRIMARY KEY (`idarea`);

--
-- Indices de la tabla `aros`
--
ALTER TABLE `aros`
 ADD PRIMARY KEY (`id`), ADD KEY `idx_aros_lft_rght` (`lft`,`rght`), ADD KEY `idx_aros_alias` (`alias`);

--
-- Indices de la tabla `aros_acos`
--
ALTER TABLE `aros_acos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`), ADD KEY `idx_aco_id` (`aco_id`);

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
 ADD PRIMARY KEY (`idasignacion`,`idseccion`,`idcurso`,`iddocente`), ADD KEY `fk_clases_secciones1_idx` (`idseccion`), ADD KEY `fk_clases_cursos1_idx` (`idcurso`), ADD KEY `fk_asignaciones_docentes1_idx` (`iddocente`);

--
-- Indices de la tabla `bimestres`
--
ALTER TABLE `bimestres`
 ADD PRIMARY KEY (`idbimestre`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
 ADD PRIMARY KEY (`idconcepto`,`idaniolectivo`), ADD KEY `fk_conceptos_aniolectivos1_idx` (`idaniolectivo`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
 ADD PRIMARY KEY (`idcurso`,`idgrado`,`idarea`,`idaniolectivo`), ADD KEY `fk_cursos_grados1_idx` (`idgrado`), ADD KEY `fk_cursos_areas1_idx` (`idarea`), ADD KEY `fk_cursos_aniolectivos1_idx` (`idaniolectivo`);

--
-- Indices de la tabla `detallenotas`
--
ALTER TABLE `detallenotas`
 ADD PRIMARY KEY (`iddetallenota`,`idnota`,`idmatricula`), ADD KEY `fk_detallenotas_notas1_idx` (`idnota`), ADD KEY `fk_detallenotas_matriculas1_idx` (`idmatricula`);

--
-- Indices de la tabla `detallepagos`
--
ALTER TABLE `detallepagos`
 ADD PRIMARY KEY (`iddetallepago`,`idpago`,`iduser`), ADD KEY `fk_detallepagos_pagos1_idx` (`idpago`), ADD KEY `fk_detallepagos_users1_idx` (`iduser`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
 ADD PRIMARY KEY (`iddocente`,`iduser`), ADD UNIQUE KEY `dni_UNIQUE` (`dni`), ADD KEY `fk_docentes_users1_idx` (`iduser`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
 ADD PRIMARY KEY (`idgrado`,`idnivel`), ADD KEY `fk_grados_niveles_idx` (`idnivel`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`idgroup`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
 ADD PRIMARY KEY (`idmatricula`,`idseccion`,`idalumno`), ADD KEY `fk_matriculas_secciones1_idx` (`idseccion`), ADD KEY `fk_matriculas_alumnos1_idx` (`idalumno`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
 ADD PRIMARY KEY (`idnivel`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
 ADD PRIMARY KEY (`idnota`,`idasignacion`,`idbimestre`), ADD KEY `fk_notas_bimestres1_idx` (`idbimestre`), ADD KEY `fk_notas_asignaciones1_idx` (`idasignacion`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
 ADD PRIMARY KEY (`idpadre`), ADD UNIQUE KEY `dni_UNIQUE` (`dni`), ADD KEY `fk_padres_users1_idx` (`iduser`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
 ADD PRIMARY KEY (`idpago`,`idmatricula`,`idconcepto`), ADD KEY `fk_pagos_matriculas1_idx` (`idmatricula`), ADD KEY `fk_pagos_conceptos1_idx` (`idconcepto`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
 ADD PRIMARY KEY (`idseccion`,`idgrado`,`idaniolectivo`,`idturno`), ADD KEY `fk_secciones_grados1_idx` (`idgrado`), ADD KEY `fk_secciones_aniolectivos1_idx` (`idaniolectivo`), ADD KEY `fk_secciones_turnos1_idx` (`idturno`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
 ADD PRIMARY KEY (`idturno`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`iduser`,`idgroup`), ADD UNIQUE KEY `username_UNIQUE` (`username`), ADD KEY `fk_users_groups1_idx` (`idgroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acos`
--
ALTER TABLE `acos`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
MODIFY `idalumno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `alumnos_padres`
--
ALTER TABLE `alumnos_padres`
MODIFY `idalumno_padre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `aniolectivos`
--
ALTER TABLE `aniolectivos`
MODIFY `idaniolectivo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `aros`
--
ALTER TABLE `aros`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `aros_acos`
--
ALTER TABLE `aros_acos`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
MODIFY `idasignacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `bimestres`
--
ALTER TABLE `bimestres`
MODIFY `idbimestre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
MODIFY `idconcepto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `detallenotas`
--
ALTER TABLE `detallenotas`
MODIFY `iddetallenota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `detallepagos`
--
ALTER TABLE `detallepagos`
MODIFY `iddetallepago` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
MODIFY `iddocente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
MODIFY `idgrado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
MODIFY `idmatricula` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
MODIFY `idnivel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
MODIFY `idnota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
MODIFY `idpadre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
MODIFY `idseccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
MODIFY `idturno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
ADD CONSTRAINT `fk_alumnos_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alumnos_padres`
--
ALTER TABLE `alumnos_padres`
ADD CONSTRAINT `fk_padres_has_alumnos_alumnos1` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_padres_has_alumnos_padres1` FOREIGN KEY (`idpadre`) REFERENCES `padres` (`idpadre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
ADD CONSTRAINT `fk_asignaciones_docentes1` FOREIGN KEY (`iddocente`) REFERENCES `docentes` (`iddocente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clases_cursos1` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clases_secciones1` FOREIGN KEY (`idseccion`) REFERENCES `secciones` (`idseccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `conceptos`
--
ALTER TABLE `conceptos`
ADD CONSTRAINT `fk_conceptos_aniolectivos1` FOREIGN KEY (`idaniolectivo`) REFERENCES `aniolectivos` (`idaniolectivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
ADD CONSTRAINT `fk_cursos_areas1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cursos_grados1` FOREIGN KEY (`idgrado`) REFERENCES `grados` (`idgrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cursos_aniolectivos1` FOREIGN KEY (`idaniolectivo`) REFERENCES `aniolectivos` (`idaniolectivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallenotas`
--
ALTER TABLE `detallenotas`
ADD CONSTRAINT `fk_detallenotas_matriculas1` FOREIGN KEY (`idmatricula`) REFERENCES `matriculas` (`idmatricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_detallenotas_notas1` FOREIGN KEY (`idnota`) REFERENCES `notas` (`idnota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallepagos`
--
ALTER TABLE `detallepagos`
ADD CONSTRAINT `fk_detallepagos_pagos1` FOREIGN KEY (`idpago`) REFERENCES `pagos` (`idpago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_detallepagos_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
ADD CONSTRAINT `fk_docentes_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grados`
--
ALTER TABLE `grados`
ADD CONSTRAINT `fk_grados_niveles` FOREIGN KEY (`idnivel`) REFERENCES `niveles` (`idnivel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
ADD CONSTRAINT `fk_matriculas_alumnos1` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_matriculas_secciones1` FOREIGN KEY (`idseccion`) REFERENCES `secciones` (`idseccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
ADD CONSTRAINT `fk_notas_asignaciones1` FOREIGN KEY (`idasignacion`) REFERENCES `asignaciones` (`idasignacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_notas_bimestres1` FOREIGN KEY (`idbimestre`) REFERENCES `bimestres` (`idbimestre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `padres`
--
ALTER TABLE `padres`
ADD CONSTRAINT `fk_padres_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
ADD CONSTRAINT `fk_pagos_conceptos1` FOREIGN KEY (`idconcepto`) REFERENCES `conceptos` (`idconcepto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_pagos_matriculas1` FOREIGN KEY (`idmatricula`) REFERENCES `matriculas` (`idmatricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
ADD CONSTRAINT `fk_secciones_aniolectivos1` FOREIGN KEY (`idaniolectivo`) REFERENCES `aniolectivos` (`idaniolectivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_secciones_grados1` FOREIGN KEY (`idgrado`) REFERENCES `grados` (`idgrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_secciones_turnos1` FOREIGN KEY (`idturno`) REFERENCES `turnos` (`idturno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_users_groups1` FOREIGN KEY (`idgroup`) REFERENCES `groups` (`idgroup`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
