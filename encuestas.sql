-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2015 a las 01:47:47
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `encuestas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actaconcertacion`
--

CREATE TABLE IF NOT EXISTS `actaconcertacion` (
`idActaConcertacion` int(11) NOT NULL,
  `numeroActaConcertacion` varchar(45) DEFAULT NULL,
  `ano` varchar(45) DEFAULT NULL,
  `Grupo_idGrupo` int(11) NOT NULL,
  `Estudiante_idEstudiante` int(11) DEFAULT NULL,
  `periodoAcademico_idPeriodo` int(2) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Disparadores `actaconcertacion`
--
DELIMITER //
CREATE TRIGGER `insertPeriodo` BEFORE INSERT ON `actaconcertacion`
 FOR EACH ROW set new.periodoAcademico_idPeriodo = (select max(id) from periodoacademico)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actamostrar`
--

CREATE TABLE IF NOT EXISTS `actamostrar` (
  `id` int(1) NOT NULL,
  `mostrar` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actamostrar`
--

INSERT INTO `actamostrar` (`id`, `mostrar`) VALUES
(1, 0),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`login`, `password`) VALUES
('admin', '123qwe+admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
`idDocente` int(11) NOT NULL,
  `cedulaDocente` int(11) DEFAULT NULL,
  `nombreDocente` varchar(45) DEFAULT NULL,
  `correoElectronico` varchar(45) DEFAULT NULL,
  `Programa_idPrograma` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`idDocente`, `cedulaDocente`, `nombreDocente`, `correoElectronico`, `Programa_idPrograma`) VALUES
(1, NULL, 'Maria Patricia Arcila', NULL, 1),
(2, NULL, 'Luz Marina Arias', NULL, 1),
(3, NULL, 'Gloria Elena Moreno', NULL, 1),
(4, NULL, 'Maribel Arias Zapata', NULL, 1),
(5, NULL, 'Cesar Alberto Aristizabal', NULL, 1),
(6, NULL, 'Alba Lucia Alcaraz', NULL, 1),
(7, NULL, 'Alba Lucia Aguirre', NULL, 1),
(8, NULL, 'Claudia Edith Arredondo', NULL, 1),
(9, NULL, 'Amparo Berancourth', NULL, 1),
(10, NULL, 'Julio Cesar Castaño', NULL, 1),
(11, NULL, 'Jairo Hernan diaz Arias', NULL, 1),
(12, NULL, 'Pablo Emilio Diaz Molina', NULL, 1),
(13, NULL, 'Luz Stella Giraldo B', NULL, 1),
(14, NULL, 'Maria Nelly Gomez', NULL, 1),
(15, NULL, 'Maria Isabel Henao L.', NULL, 1),
(16, NULL, 'Alba Betty Jimenez Serna', NULL, 1),
(17, NULL, 'Luz Stella Leon Z', NULL, 1),
(18, NULL, 'Maria Alexandra Leon Z', NULL, 1),
(19, NULL, 'Jorge Ivan Mejia', '', 1),
(20, NULL, 'Monica Murillo S', NULL, 1),
(21, NULL, 'Luis Alfonso Narvaez', NULL, 1),
(22, NULL, 'Paola Pacanchipe', NULL, 1),
(23, NULL, 'Alejandra Maria Parra', NULL, 1),
(24, NULL, 'Martha Helena Pineda', NULL, 1),
(25, NULL, 'Jesus Quiñonez Caro', NULL, 1),
(26, NULL, 'Angelica Maria Ramirez A', NULL, 1),
(27, NULL, 'Dolly Rivera', NULL, 1),
(28, NULL, 'Maria Clemencia Rivera', NULL, 1),
(29, NULL, 'Clara Ines Rubio C', NULL, 1),
(30, NULL, 'Martha Liliana Sabogal ', NULL, 1),
(31, NULL, 'Giovanny Salazar Ovalle', NULL, 1),
(32, NULL, 'Margarita Maria Torres', NULL, 1),
(33, NULL, 'Martha Lucia Usaquen', NULL, 1),
(34, NULL, 'Maria Nancy Uribe', NULL, 1),
(35, NULL, 'Adriana Patricia Valderrama C', NULL, 1),
(36, NULL, 'Monica Valencia Parra', NULL, 1),
(37, NULL, 'Patricia Villegas Celis', NULL, 1),
(38, NULL, 'Doris Amanda Zuluaga', NULL, 1),
(39, NULL, 'Jorge Mario Zuluaga', NULL, 1),
(40, NULL, 'Johanna Gaitan', NULL, 1),
(41, NULL, 'Carlos Collazos - Sra de Collazos', NULL, 1),
(42, NULL, 'Luz Adriana Muñoz ', NULL, 1),
(43, NULL, 'Juan Guillermo Caicedo', NULL, 1),
(44, NULL, 'Edwin Alonso Sossa Cruz', NULL, 1),
(45, NULL, 'Yilbert Andres Martinez Castillo', NULL, 1),
(46, NULL, 'Diego Fernando Martinez', NULL, 1),
(47, NULL, 'Andrey Johan Moreno Garzon', NULL, 1),
(48, NULL, 'Daniel Moreno Lopez', NULL, 1),
(49, NULL, 'Hugo Fernando Trejos Suarez', NULL, 1),
(50, NULL, 'Monica Yohanna Sandoval ', NULL, 1),
(51, NULL, 'Marlene Salazar Ramos', NULL, 1),
(52, NULL, 'Martha Lucia Marin Celis', NULL, 1),
(53, NULL, 'Gundisalbo Blanco Abril', NULL, 1),
(54, NULL, 'Beatriz Helena Restrepo V', NULL, 1),
(55, NULL, 'Jose Alexander Parra Riaño', NULL, 1),
(56, NULL, 'Jose Luis Carreño', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enunciado`
--

CREATE TABLE IF NOT EXISTS `enunciado` (
  `numeroPregunta` int(2) NOT NULL,
  `enunciado` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enunciado`
--

INSERT INTO `enunciado` (`numeroPregunta`, `enunciado`) VALUES
(1, '1. ¿El profesor socializó el microcurrículo en el Espacio virtual del Espacio Académico? A través de un foro, una actividad, etc. '),
(2, '2. ¿El microcurrículo define el número de Créditos del Espacio Académico?'),
(3, '3. ¿El microcurrículo define los Objetivos del Espacio Académico?'),
(4, '4. ¿El microcurrículo define los Temas a tratar durante el Espacio Académico?'),
(5, '5. ¿El microcurrículo define el plan de evaluación del Espacio Académico,				de acuerdo con el artículo 45 del Estatuto Estudiantil?'),
(6, '6. ¿Está usted de acuerdo con las condiciones establecidas en el Microcurrículo?'),
(7, '1. ¿El profesor ha cumplido con la atención de asesorías e inquietudes en los tiempos establecidos en el microcurriculo?'),
(8, '2. ¿El profesor ha cumplido con la apertura de las actividades y los recursos según lo establecido en el cronograma del espacio académico?'),
(9, '3. ¿El profesor ha dispuesto los recursos apropiados para desarrollar los contenidos del espacio académico?'),
(10, '4. ¿El profesor ha publicado en el libro de calificaciones de la plataforma, la evaluación y retroalimentación a las actividades de los estudiantes, en los tiempos establecidos en el Estatuto Estudiantil?'),
(11, 'Observaciones Acta'),
(12, 'Observaciones Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacioacademico`
--

CREATE TABLE IF NOT EXISTS `espacioacademico` (
`idEspacioAcademico` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `Semestre_idSemestre` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Volcado de datos para la tabla `espacioacademico`
--

INSERT INTO `espacioacademico` (`idEspacioAcademico`, `nombre`, `Semestre_idSemestre`) VALUES
(1, 'METODOLOGIA Y ESTRATEGIAS DE LA MODALIDAD', 1),
(2, 'EXPRESION ORAL Y ESCRITA', 1),
(3, 'LOGICA', 1),
(4, 'MATEMATICAS', 1),
(5, 'PROFICIENCIA EN ESPANOL', 2),
(6, 'REDACCION', 2),
(7, 'TEORIA ARCHIVISTA', 2),
(8, 'FUNDAMENTOS DE CIDBA', 2),
(9, 'LINGUISTICA DOCUMENTAL', 2),
(10, 'UNIDADES DE INFORMACION ', 2),
(11, 'SEMIOTICA ', 3),
(12, 'REDACCION TALLER II', 3),
(13, 'GESTION DOCUMENTAL I', 3),
(14, 'SISTEMAS DE CLASIFICACION', 3),
(15, 'LENGUAJES DOCUMENTALES', 3),
(16, 'DESCRIPCION BIBLIOGRAFICA NORMALIZADA', 3),
(17, 'RECURSOS DE INFORMACION DE CCIAS SOCIALES Y H', 4),
(18, 'ESTADISTICA DESCRIPTIVA', 4),
(19, 'MATERIALES AUDIOVISUALES', 4),
(20, 'GESTION DOCUMENTAL II', 4),
(21, 'TEORIA DE SISTEMAS', 4),
(22, 'ANIMACION A LA LECTURA', 4),
(23, 'PUBLICACIONES SERIADAS', 4),
(24, 'INTRODUCCION A LA BIBLIOGRAFIA', 5),
(25, 'RECURSOS DE INFORMACION EN CIENCIA Y TECNOLOGIA', 5),
(26, 'CLUBES Y RINCONES DE LECTURA', 5),
(27, 'ANALISIS Y DISENOS DE SISTEMAS DE INFORMACION I', 5),
(28, 'ELABORACION DE INSTRUMENTOS ESTADISTICOS ', 5),
(29, 'GESTION DE DOCUMENTOS ELECTRONICOS', 5),
(30, 'HEMEROTECA', 6),
(31, 'INTRODUCCION A LA INVESTIGACION', 6),
(32, 'ANALISIS Y DISENO DE SISTEMAS DE INFORMACION II', 6),
(33, 'ORGANIZACION Y DESCRIPCION DE ARCHIVOS', 6),
(34, 'CENTRO DE DOCUMENTACION ', 6),
(35, 'BIBLIOTECAS UNIVERSITARIAS Y ESPECIALIZADAS', 6),
(36, 'BIBLIOTECAS PUBLICAS Y ESCOLARES', 6),
(43, 'MUSEOLOGIA', 7),
(44, 'FORMACION DE USUARIOS DE LA INFORMACION', 7),
(45, 'INVESTIGACION I', 7),
(46, 'BASES DE DATOS', 7),
(47, 'SELECCION DE TEXTOS GENEROS Y EDADES ', 7),
(48, 'LEGISLACION ARCHIVISTA', 7),
(49, 'CONSTITUCION POLITICA', 8),
(50, 'TABLAS DE RETENCION DOCUMENTAL', 8),
(51, 'PAQUETES ESPECIALIZADOS EN C.I.D.B.A.', 8),
(52, 'INVESTIGACION II', 8),
(53, 'LECTORES AUTONOMOS', 8),
(54, 'DESARROLLO DE COLECCIONES', 8),
(55, 'CREATIVIDAD EMPRESARIAL', 9),
(56, 'ADMINISTRACION DE UNIDADES DE INFORMACION ', 9),
(57, 'INVESTIGACION III', 9),
(58, 'ADMINISTRACION ARCHIVISTA', 9),
(59, 'MEDIO AMBIENTE', 9),
(60, 'ARCHIVOS DIGITALES', 9),
(61, 'PROFICIENCIA EN IDIOMA EXTRANJERO', 9),
(62, 'DEPORTE FORMATIVO', 10),
(63, 'ETICA', 10),
(64, 'TRABAJO DE GRADO', 10),
(65, 'SERVICIO DE INFORMACION', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
`idEstudiante` int(11) NOT NULL,
  `codigoEstudiante` int(11) DEFAULT NULL,
  `nombreEstudiante` varchar(45) DEFAULT NULL,
  `Programa_idPrograma` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
`idGrupo` int(11) NOT NULL,
  `EspacioAcademico_idEspacioAcademico` int(11) NOT NULL,
  `Docente_idDocente` int(11) NOT NULL,
  `NumeroGrupo` int(2) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=202 ;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idGrupo`, `EspacioAcademico_idEspacioAcademico`, `Docente_idDocente`, `NumeroGrupo`) VALUES
(1, 33, 1, 1),
(2, 33, 1, 2),
(3, 50, 1, 1),
(4, 57, 1, 1),
(5, 64, 1, 1),
(6, 20, 2, 3),
(7, 20, 2, 4),
(8, 13, 2, 1),
(9, 13, 2, 2),
(10, 13, 2, 3),
(11, 54, 4, 1),
(12, 54, 4, 2),
(13, 44, 4, 1),
(14, 30, 4, 1),
(15, 44, 4, 3),
(16, 64, 5, 1),
(17, 23, 6, 1),
(18, 23, 6, 2),
(19, 23, 6, 3),
(20, 19, 6, 2),
(21, 19, 6, 3),
(22, 12, 7, 1),
(23, 12, 7, 2),
(24, 12, 7, 3),
(25, 16, 8, 1),
(26, 16, 8, 2),
(27, 16, 8, 3),
(28, 14, 8, 1),
(29, 14, 8, 2),
(30, 47, 9, 1),
(31, 47, 9, 3),
(32, 57, 9, 3),
(33, 64, 9, 1),
(34, 18, 10, 2),
(35, 18, 10, 3),
(36, 18, 10, 4),
(37, 18, 10, 5),
(38, 13, 11, 5),
(39, 13, 11, 6),
(40, 23, 11, 4),
(41, 23, 11, 5),
(42, 23, 11, 6),
(43, 45, 12, 4),
(44, 45, 12, 3),
(45, 64, 12, 1),
(46, 60, 13, 1),
(47, 60, 13, 2),
(48, 60, 13, 3),
(49, 32, 13, 2),
(50, 46, 13, 84),
(51, 17, 14, 3),
(52, 17, 14, 4),
(53, 17, 14, 5),
(54, 14, 14, 3),
(55, 22, 15, 1),
(56, 22, 15, 3),
(57, 22, 15, 5),
(58, 11, 15, 3),
(59, 11, 15, 4),
(60, 52, 16, 1),
(61, 52, 16, 2),
(62, 45, 16, 1),
(63, 45, 16, 2),
(64, 45, 16, 3),
(69, 12, 18, 4),
(70, 12, 18, 5),
(71, 12, 18, 6),
(75, 62, 19, 1),
(76, 62, 19, 2),
(77, 62, 19, 3),
(78, 65, 3, 1),
(79, 65, 3, 2),
(80, 65, 3, 3),
(81, 24, 3, 1),
(82, 24, 3, 2),
(83, 46, 21, 1),
(84, 46, 21, 2),
(85, 46, 21, 3),
(86, 25, 21, 2),
(87, 25, 21, 4),
(88, 53, 22, 1),
(89, 53, 22, 2),
(90, 53, 22, 3),
(91, 47, 22, 4),
(92, 47, 22, 2),
(93, 15, 23, 1),
(94, 15, 23, 2),
(95, 15, 23, 3),
(96, 15, 23, 4),
(97, 35, 24, 1),
(98, 35, 24, 2),
(99, 35, 24, 3),
(100, 30, 24, 2),
(101, 30, 24, 3),
(102, 36, 25, 1),
(103, 36, 25, 2),
(104, 36, 25, 3),
(105, 26, 25, 3),
(106, 64, 26, 1),
(107, 51, 26, 1),
(108, 51, 26, 2),
(109, 51, 26, 3),
(110, 17, 27, 1),
(111, 17, 27, 2),
(112, 56, 27, 1),
(113, 57, 27, 2),
(114, 64, 27, 1),
(115, 20, 28, 1),
(116, 20, 28, 2),
(117, 58, 28, 1),
(118, 58, 28, 2),
(119, 58, 28, 3),
(120, 16, 29, 4),
(121, 16, 29, 5),
(122, 16, 29, 6),
(123, 34, 29, 4),
(124, 34, 29, 3),
(125, 44, 32, 2),
(126, 44, 32, 4),
(127, 65, 32, 4),
(133, 43, 33, 1),
(134, 43, 33, 2),
(135, 43, 33, 3),
(136, 26, 33, 1),
(137, 26, 33, 2),
(138, 20, 34, 5),
(139, 20, 34, 6),
(140, 13, 34, 4),
(141, 17, 34, 6),
(142, 45, 35, 4),
(143, 31, 35, 4),
(144, 31, 35, 3),
(145, 31, 35, 2),
(146, 31, 35, 1),
(147, 28, 36, 1),
(148, 28, 36, 2),
(149, 28, 36, 3),
(150, 28, 36, 4),
(151, 18, 36, 1),
(152, 64, 37, 1),
(153, 11, 37, 1),
(154, 11, 37, 2),
(155, 22, 37, 4),
(156, 21, 38, 1),
(157, 21, 38, 2),
(158, 21, 38, 3),
(159, 21, 38, 5),
(160, 29, 39, 1),
(161, 29, 39, 2),
(162, 25, 39, 3),
(163, 25, 39, 1),
(164, 32, 39, 1),
(165, 21, 40, 4),
(166, 15, 43, 5),
(167, 15, 43, 6),
(168, 22, 43, 2),
(169, 22, 43, 6),
(170, 50, 44, 2),
(171, 33, 44, 3),
(172, 33, 44, 4),
(173, 50, 44, 3),
(176, 18, 46, 6),
(177, 21, 47, 6),
(178, 27, 47, 4),
(179, 29, 49, 3),
(180, 29, 49, 4),
(181, 36, 50, 3),
(182, 36, 50, 4),
(183, 35, 50, 4),
(184, 30, 50, 4),
(185, 43, 50, 4),
(186, 34, 51, 1),
(187, 34, 51, 2),
(188, 56, 51, 2),
(189, 56, 51, 3),
(190, 11, 52, 5),
(191, 11, 52, 6),
(192, 19, 54, 1),
(193, 19, 54, 4),
(194, 19, 54, 5),
(195, 19, 54, 6),
(196, 54, 54, 3),
(197, 14, 55, 4),
(198, 14, 55, 5),
(199, 14, 55, 6),
(200, 24, 56, 3),
(201, 24, 56, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodoacademico`
--

CREATE TABLE IF NOT EXISTS `periodoacademico` (
`id` int(2) NOT NULL,
  `periodo` varchar(18) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `periodoacademico`
--

INSERT INTO `periodoacademico` (`id`, `periodo`) VALUES
(1, '20151'),
(2, '20152');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planestudio`
--

CREATE TABLE IF NOT EXISTS `planestudio` (
`idPlanEstudio` int(11) NOT NULL,
  `nombrePlanEstudio` varchar(45) DEFAULT NULL,
  `Programa_idPrograma` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `planestudio`
--

INSERT INTO `planestudio` (`idPlanEstudio`, `nombrePlanEstudio`, `Programa_idPrograma`) VALUES
(1, 'Primer Plan de estudios ', 1),
(2, 'Segundo plan de estudios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
`idPregunta` int(11) NOT NULL,
  `numeroPregunta` int(2) DEFAULT NULL,
  `respuesta` varchar(500) DEFAULT NULL,
  `ActaConcertacion_idActaConcertacion` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=384 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE IF NOT EXISTS `programa` (
`idPrograma` int(11) NOT NULL,
  `codigoPrograma` int(11) DEFAULT NULL,
  `nombrePrograma` varchar(45) DEFAULT NULL,
  `correoPrograma` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idPrograma`, `codigoPrograma`, `nombrePrograma`, `correoPrograma`) VALUES
(1, 1, 'cidba', 'secretariacinfo@uniquindio.edu.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE IF NOT EXISTS `semestre` (
`idSemestre` int(11) NOT NULL,
  `nombreSemestre` varchar(45) DEFAULT NULL,
  `PlanEstudio_idPlanEstudio` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`idSemestre`, `nombreSemestre`, `PlanEstudio_idPlanEstudio`) VALUES
(1, 'Primer Semestre', 1),
(2, 'Segundo Semestre', 1),
(3, 'Tercer Semestre', 1),
(4, 'Cuarto Semestre', 1),
(5, 'Quinto Semestre', 1),
(6, 'Sexto Semestre', 1),
(7, 'Septimo Semestre', 1),
(8, 'Octavo Semestre', 1),
(9, 'Noveno Semestre', 1),
(10, 'Decimo Semestre', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actaconcertacion`
--
ALTER TABLE `actaconcertacion`
 ADD PRIMARY KEY (`idActaConcertacion`,`Grupo_idGrupo`), ADD KEY `fk_ActaConcertacion_Grupo1_idx` (`Grupo_idGrupo`), ADD KEY `Estudiante_idEstudiante` (`Estudiante_idEstudiante`);

--
-- Indices de la tabla `actamostrar`
--
ALTER TABLE `actamostrar`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`login`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
 ADD PRIMARY KEY (`idDocente`,`Programa_idPrograma`), ADD KEY `fk_Docente_Programa1_idx` (`Programa_idPrograma`);

--
-- Indices de la tabla `enunciado`
--
ALTER TABLE `enunciado`
 ADD PRIMARY KEY (`numeroPregunta`);

--
-- Indices de la tabla `espacioacademico`
--
ALTER TABLE `espacioacademico`
 ADD PRIMARY KEY (`idEspacioAcademico`,`Semestre_idSemestre`), ADD KEY `fk_EspacioAcademico_Semestre1_idx` (`Semestre_idSemestre`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
 ADD PRIMARY KEY (`idEstudiante`,`Programa_idPrograma`), ADD KEY `fk_Estudiante_Programa1_idx` (`Programa_idPrograma`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
 ADD PRIMARY KEY (`idGrupo`,`EspacioAcademico_idEspacioAcademico`,`Docente_idDocente`), ADD KEY `fk_Grupo_EspacioAcademico1_idx` (`EspacioAcademico_idEspacioAcademico`), ADD KEY `fk_Grupo_Docente1_idx` (`Docente_idDocente`);

--
-- Indices de la tabla `periodoacademico`
--
ALTER TABLE `periodoacademico`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planestudio`
--
ALTER TABLE `planestudio`
 ADD PRIMARY KEY (`idPlanEstudio`,`Programa_idPrograma`), ADD KEY `fk_PlanEstudio_Programa1_idx` (`Programa_idPrograma`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
 ADD PRIMARY KEY (`idPregunta`,`ActaConcertacion_idActaConcertacion`), ADD KEY `fk_Pregunta_ActaConcertacion1_idx` (`ActaConcertacion_idActaConcertacion`), ADD KEY `fk_Enunciado_Pregunta` (`numeroPregunta`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
 ADD PRIMARY KEY (`idPrograma`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
 ADD PRIMARY KEY (`idSemestre`,`PlanEstudio_idPlanEstudio`), ADD KEY `fk_Semestre_PlanEstudio1_idx` (`PlanEstudio_idPlanEstudio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actaconcertacion`
--
ALTER TABLE `actaconcertacion`
MODIFY `idActaConcertacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
MODIFY `idDocente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `espacioacademico`
--
ALTER TABLE `espacioacademico`
MODIFY `idEspacioAcademico` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
MODIFY `idGrupo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT de la tabla `periodoacademico`
--
ALTER TABLE `periodoacademico`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `planestudio`
--
ALTER TABLE `planestudio`
MODIFY `idPlanEstudio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=384;
--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
MODIFY `idPrograma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
MODIFY `idSemestre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actaconcertacion`
--
ALTER TABLE `actaconcertacion`
ADD CONSTRAINT `ActaConcertacion_ibfk_1` FOREIGN KEY (`Estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`),
ADD CONSTRAINT `fk_ActaConcertacion_Grupo1` FOREIGN KEY (`Grupo_idGrupo`) REFERENCES `grupo` (`idGrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
ADD CONSTRAINT `fk_Docente_Programa1` FOREIGN KEY (`Programa_idPrograma`) REFERENCES `programa` (`idPrograma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `espacioacademico`
--
ALTER TABLE `espacioacademico`
ADD CONSTRAINT `fk_EspacioAcademico_Semestre1` FOREIGN KEY (`Semestre_idSemestre`) REFERENCES `semestre` (`idSemestre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
ADD CONSTRAINT `fk_Estudiante_Programa1` FOREIGN KEY (`Programa_idPrograma`) REFERENCES `programa` (`idPrograma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
ADD CONSTRAINT `fk_Grupo_Docente1` FOREIGN KEY (`Docente_idDocente`) REFERENCES `docente` (`idDocente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Grupo_EspacioAcademico1` FOREIGN KEY (`EspacioAcademico_idEspacioAcademico`) REFERENCES `espacioacademico` (`idEspacioAcademico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `planestudio`
--
ALTER TABLE `planestudio`
ADD CONSTRAINT `fk_PlanEstudio_Programa1` FOREIGN KEY (`Programa_idPrograma`) REFERENCES `programa` (`idPrograma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
ADD CONSTRAINT `fk_Pregunta_ActaConcertacion1` FOREIGN KEY (`ActaConcertacion_idActaConcertacion`) REFERENCES `actaconcertacion` (`idActaConcertacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`numeroPregunta`) REFERENCES `enunciado` (`numeroPregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `semestre`
--
ALTER TABLE `semestre`
ADD CONSTRAINT `fk_Semestre_PlanEstudio1` FOREIGN KEY (`PlanEstudio_idPlanEstudio`) REFERENCES `planestudio` (`idPlanEstudio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
