-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2018 a las 17:43:05
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `actividades`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` bigint(255) NOT NULL,
  `id_usuario` bigint(255) NOT NULL,
  `id_subarea` bigint(100) NOT NULL,
  `id_actividad_secundaria` bigint(100) NOT NULL,
  `titulo_actividad` varchar(100) NOT NULL,
  `descripcion_actividad` text NOT NULL,
  `objetivo_actividad` text,
  `archivo` varchar(200) NOT NULL,
  `fechaRegistroActividad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActividad` date NOT NULL,
  `finalizado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `id_usuario`, `id_subarea`, `id_actividad_secundaria`, `titulo_actividad`, `descripcion_actividad`, `objetivo_actividad`, `archivo`, `fechaRegistroActividad`, `fechaActividad`, `finalizado`) VALUES
(30, 5, 5, 0, 'Es un actividad', 'Se dio soporte a un tecnico', NULL, '', '2018-12-12 17:15:35', '2018-12-12', 0),
(31, 1, 2, 0, 'Esto es una actividad', 'asdaslkdjaslkdj', NULL, '', '2018-12-12 18:06:07', '2018-12-12', 1),
(33, 1, 9, 0, 'Mi actividad de desarrollo', 'Es una descripcion', 'Es un objetivo', '', '2018-12-12 19:17:54', '2018-12-12', 1),
(34, 1, 8, 13, 'Una nueva actividad', 'Es una aplicacion para registrar actividades', 'Facilitar el reporte semanal', '', '2018-12-12 22:31:12', '2018-12-12', 1),
(35, 1, 1, 1, 'Monitoreo de los canales', 'Estoy revisando todos los canales', 'Que todo estÃ© al 100 ', 'module_table_bottom.png', '2018-12-12 22:34:10', '2018-12-12', 1),
(36, 5, 1, 1, 'Otra', 'Una descripcion', 'Un objetivo', '', '2018-12-12 22:45:29', '2018-12-12', 0),
(37, 5, 8, 13, 'Una actividad nueva', 'Es una descripcion', 'Esto es un objetivo', '', '2018-12-13 16:30:05', '2018-12-13', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_secundarias`
--

CREATE TABLE `actividades_secundarias` (
  `id_actividad_secundaria` int(11) NOT NULL,
  `id_subarea` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividades_secundarias`
--

INSERT INTO `actividades_secundarias` (`id_actividad_secundaria`, `id_subarea`, `titulo`, `descripcion`) VALUES
(1, 1, 'Incidentes', NULL),
(2, 1, 'Atenciones', NULL),
(3, 2, 'Control Paquete Social', NULL),
(4, 2, 'Carga de llaves', NULL),
(5, 3, 'General', NULL),
(6, 4, 'General', NULL),
(7, 5, 'General ', NULL),
(8, 6, 'SAC', NULL),
(9, 6, 'Soporte', NULL),
(10, 6, 'Telefonia y Redes', NULL),
(11, 7, 'General', NULL),
(12, 6, 'Tickets', NULL),
(13, 8, 'General', NULL),
(14, 9, 'Otras Actividades', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` bigint(100) NOT NULL,
  `nombre_area` varchar(50) NOT NULL,
  `descripcion_area` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `nombre_area`, `descripcion_area`) VALUES
(1, 'CAS', 'Aqui se hace algo'),
(2, 'Monitoreo', 'Se encargan de monitorear '),
(3, 'DTH', 'Aqui se hace algo'),
(4, 'Refurbish', 'Dan soporte y mantenimiento'),
(5, 'Telepuerto', 'Hacen algo'),
(6, 'Infraestructura', 'Hacen algo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuario`
--

CREATE TABLE `datos_usuario` (
  `id_datos_usuario` bigint(255) NOT NULL,
  `id_usuario` bigint(255) NOT NULL,
  `id_area` bigint(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_usuario`
--

INSERT INTO `datos_usuario` (`id_datos_usuario`, `id_usuario`, `id_area`, `nombre`, `apellido`, `correo`, `telefono`) VALUES
(1, 1, 4, 'Jesus', 'Montalvo', 'chuy_ronald@hotmail.com', '4929265845'),
(2, 2, 3, 'Jesus2', 'Montalvo', 'otro@hotmail.com', '1235465123'),
(5, 4, 3, 'VIcente', 'Trujillo', 'vtrujilllo@stargroup.com.mx', '4565465'),
(6, 5, 1, 'Jorge Luis', 'Muro ChÃ¡vez', 'jmuro@stargroup.com.mx', '1307'),
(7, 4, 4, 'VIcente', 'Trujillo', 'vtrujilllo@stargroup.com.mx', '13213'),
(8, 6, 3, 'Vicente', 'Trujillo', 'vtrujillo@stargroup.com.mx', '1309'),
(9, 1, 3, 'Jesus', 'Montalvo', 'jesus@stargroup.com', '1235465123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `id_seguimiento` bigint(20) NOT NULL,
  `id_actividad` bigint(255) NOT NULL,
  `fecha_seguimiento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nota_actividad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`id_seguimiento`, `id_actividad`, `fecha_seguimiento`, `nota_actividad`) VALUES
(1, 25, '2018-12-11 19:31:00', 'Esta es la nota para \"Otra Actividad\"'),
(2, 25, '2018-12-11 19:31:35', 'Aqui puedo agregar otra notita'),
(3, 24, '2018-12-11 19:33:07', 'Esta nota es para la otra actividad'),
(5, 25, '2018-12-11 19:53:49', 'Esta es una nota de prueba'),
(6, 24, '2018-12-11 22:07:57', 'se registran mes de agosto a diciembre de 2018'),
(7, 24, '2018-12-11 22:13:53', 'una nueva'),
(8, 24, '2018-12-11 22:15:15', 'Una mas'),
(9, 24, '2018-12-11 22:16:04', 'actividad al 85%'),
(10, 29, '2018-12-11 22:59:52', 'Video cambiado a las 01;12 am'),
(11, 29, '2018-12-12 17:33:17', 'Esto es una nota'),
(12, 29, '2018-12-12 17:47:32', 'This is another note'),
(13, 31, '2018-12-12 18:06:32', 'Es una nota para mi actividad'),
(14, 32, '2018-12-12 18:12:38', 'Es una nota para mi actividad de desarrollo'),
(15, 32, '2018-12-12 18:17:24', 'Esto es otra notita para el area de desarrollo'),
(16, 33, '2018-12-12 19:18:36', 'Es una nota para la actividad de desarrollo'),
(17, 34, '2018-12-12 22:31:43', 'Esto es una nota para el seÃ±or tobola'),
(18, 34, '2018-12-12 22:33:01', 'Esto es otra nota para que el seÃ±or tobola vea quien es la verga '),
(19, 36, '2018-12-13 16:19:07', 'Es una nota '),
(20, 37, '2018-12-13 16:33:06', 'Aqui ponemos la nota N.1 '),
(21, 37, '2018-12-13 16:33:24', 'Luego ponemos la nota N. 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subareas`
--

CREATE TABLE `subareas` (
  `id_subarea` bigint(100) NOT NULL,
  `subarea` text NOT NULL,
  `descripcion_subarea` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subareas`
--

INSERT INTO `subareas` (`id_subarea`, `subarea`, `descripcion_subarea`) VALUES
(1, 'Monitoreo', 'Se reporta perdida de señal de los canales desde monitoreo'),
(2, 'CAS', ''),
(3, 'RefurbishDTH', ''),
(4, 'Telepuerto Miami', ''),
(5, 'Telepuerto Zac', 'Algo aqui'),
(6, 'Infraestructura', ''),
(7, 'Capacitaciones', 'Se regustran las capacitaciones'),
(8, 'Desarrollo', 'Se registran las actividades de desarrollo que se llevaron a cabo'),
(9, 'Otras', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` bigint(255) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `registrado` int(1) NOT NULL DEFAULT '0',
  `tipo` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `pass`, `registrado`, `tipo`) VALUES
(1, 'jesus', '123', 1, 1),
(5, 'jorge', '123', 1, 0),
(6, 'vtrujillo', '123', 1, 0),
(7, 'monitoreo', '123', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `actividades_secundarias`
--
ALTER TABLE `actividades_secundarias`
  ADD PRIMARY KEY (`id_actividad_secundaria`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `datos_usuario`
--
ALTER TABLE `datos_usuario`
  ADD PRIMARY KEY (`id_datos_usuario`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`id_seguimiento`);

--
-- Indices de la tabla `subareas`
--
ALTER TABLE `subareas`
  ADD PRIMARY KEY (`id_subarea`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `actividades_secundarias`
--
ALTER TABLE `actividades_secundarias`
  MODIFY `id_actividad_secundaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `datos_usuario`
--
ALTER TABLE `datos_usuario`
  MODIFY `id_datos_usuario` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `id_seguimiento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `subareas`
--
ALTER TABLE `subareas`
  MODIFY `id_subarea` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
