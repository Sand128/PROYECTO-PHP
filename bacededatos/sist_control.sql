-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2024 a las 21:07:41
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sist_control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

CREATE TABLE `accesorios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` char(15) DEFAULT NULL,
  `categoria` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id`, `nombre`, `descripcion`, `estado`, `categoria`) VALUES
(0, 'Balbula de presion', 'ownfoiweioqj', 'nuevo', 'hidraulico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`id`, `fecha`) VALUES
(0, '2024-11-26'),
(1, '2024-11-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

CREATE TABLE `herramienta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `categoria` char(10) DEFAULT NULL,
  `marca` char(20) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `estado` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`id`, `nombre`, `descripcion`, `categoria`, `marca`, `modelo`, `estado`) VALUES
(0, 'gato', 'rojo ', '0', 'CARJIM', 'JCJAOW', 'nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `id` int(11) NOT NULL,
  `id_prestamos` int(11) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `id_herramienta` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_adquirido` date DEFAULT NULL,
  `dias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mat_ub`
--

CREATE TABLE `mat_ub` (
  `id` int(11) NOT NULL,
  `id_material` int(11) DEFAULT NULL,
  `id_ubicacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_herramienta` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  `tipo_admin` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `accion` varchar(20) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `id_prestamo` int(11) DEFAULT NULL,
  `id_practica` varchar(7) DEFAULT NULL,
  `tipo_usuario` varchar(50) DEFAULT NULL,
  `tipo_admin` varchar(50) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

CREATE TABLE `practica` (
  `folio` varchar(7) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `materia` varchar(20) DEFAULT NULL,
  `unidad` varchar(20) DEFAULT NULL,
  `num_alumnos` int(2) DEFAULT NULL,
  `grupo` char(6) DEFAULT NULL,
  `resultados` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `practica`
--

INSERT INTO `practica` (`folio`, `tipo`, `materia`, `unidad`, `num_alumnos`, `grupo`, `resultados`) VALUES
('1', 'Practica', 'Termodinamica', 'Unidad 1', 11, '22IMA1', 'sdcwergeqe'),
('2', 'Practica', 'Motores', '3.1', 11, '22IMA1', 'vw4gwfvewv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prac_fecha`
--

CREATE TABLE `prac_fecha` (
  `id` int(11) NOT NULL,
  `id_practica` varchar(7) DEFAULT NULL,
  `id_fecha` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prac_fecha`
--

INSERT INTO `prac_fecha` (`id`, `id_practica`, `id_fecha`, `hora`) VALUES
(0, '1', 0, '14:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL,
  `id_practica` varchar(7) DEFAULT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  `id_usuario` char(6) DEFAULT NULL,
  `id_admin` char(6) DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id`, `id_practica`, `id_vehiculo`, `id_usuario`, `id_admin`, `hora_salida`, `hora_entrada`, `fecha`) VALUES
(1, '2', 0, NULL, NULL, NULL, NULL, '2024-11-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id` int(11) NOT NULL,
  `nombre` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` char(6) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `tipo_usuario` varchar(30) DEFAULT NULL,
  `tipo_admin` varchar(20) NOT NULL,
  `usser` varchar(10) DEFAULT NULL,
  `passw` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `tipo_usuario`, `tipo_admin`, `usser`, `passw`, `status`, `foto`) VALUES
('1', 'Lic. Paty', '', 'Administrador', 'paty', '1', 'activo', ''),
('10', 'morrison', 'Alumno', '', '10', '$2y$10$0Pg', 'activo', 0x696d6167656e65732f69636f6e73382d6176617461722d33302e706e67),
('2', 'mary sandra alvarado velazquez', 'Alumno', '', '2', '2', 'inactivo', 0x696d6167656e65732f69636f6e73382d6176617461722d33302e706e67),
('3', 'Tayson', NULL, 'Coordinador', 'Tay', '3', 'activo', 0x696d6167656e65732f69636f6e73382d6176617461722d33302e706e67),
('4', 'Sprite', NULL, 'Coordinador', 'refresco', '2', 'activo', 0x696d6167656e65732f69636f6e73382d6176617461722d33302e706e67),
('5', 'JBL', NULL, 'Ayudante', 'JBL', '1', 'activo', 0x696d6167656e65732f69636f6e73382d6176617461722d33302e706e67),
('6', 'Katie', 'Alumno', '', '6', '1', 'activo', 0x696d6167656e65732f69636f6e73382d6176617461722d33302e706e67),
('7', 'kenia', 'Alumno', '', 'kenia', '1', 'activo', 0x696d6167656e65732f69636f6e73382d6176617461722d33302e706e67),
('8', 'Katie Mcgrant', 'Maestro', '', '8', '1', 'activo', 0x696d6167656e65732f69636f6e73382d6176617461722d33302e706e67),
('9', 'Supergril', 'Alumno', '', '9', 'edv4g25', 'activo', 0x696d6167656e65732f69636f6e73382d6176617461722d33302e706e67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL,
  `marca` char(10) DEFAULT NULL,
  `modelo` char(10) DEFAULT NULL,
  `n_placas` char(7) DEFAULT NULL,
  `n_serie` char(17) DEFAULT NULL,
  `n_motor` char(17) DEFAULT NULL,
  `km_v` bigint(20) DEFAULT NULL,
  `tanque_conbustibleE` decimal(5,2) DEFAULT NULL,
  `tanque_conbustibleS` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `marca`, `modelo`, `n_placas`, `n_serie`, `n_motor`, `km_v`, `tanque_conbustibleE`, `tanque_conbustibleS`) VALUES
(0, 'BIMBO', '2007', '0', '3N1EB31S37K324311', '0', -1, '-0.01', '-0.01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veh_acc`
--

CREATE TABLE `veh_acc` (
  `id` int(11) NOT NULL,
  `id_veh` int(11) DEFAULT NULL,
  `id_acc` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prestamos` (`id_prestamos`),
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_herramienta` (`id_herramienta`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `mat_ub`
--
ALTER TABLE `mat_ub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_ubicacion` (`id_ubicacion`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD KEY `movimientos_ibfk_1` (`id_herramienta`),
  ADD KEY `movimientos_ibfk_2` (`id_equipo`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notificaciones_ibfk_1` (`id_prestamo`),
  ADD KEY `notificaciones_ibfk_2` (`id_practica`);

--
-- Indices de la tabla `practica`
--
ALTER TABLE `practica`
  ADD PRIMARY KEY (`folio`);

--
-- Indices de la tabla `prac_fecha`
--
ALTER TABLE `prac_fecha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_practica` (`id_practica`),
  ADD KEY `id_fecha` (`id_fecha`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_practica` (`id_practica`),
  ADD KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `veh_acc`
--
ALTER TABLE `veh_acc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_veh` (`id_veh`),
  ADD KEY `id_acc` (`id_acc`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`id_prestamos`) REFERENCES `prestamos` (`id`),
  ADD CONSTRAINT `lista_ibfk_2` FOREIGN KEY (`id_material`) REFERENCES `material` (`id`);

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`id_herramienta`) REFERENCES `herramienta` (`id`),
  ADD CONSTRAINT `material_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id`);

--
-- Filtros para la tabla `mat_ub`
--
ALTER TABLE `mat_ub`
  ADD CONSTRAINT `mat_ub_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `material` (`id`),
  ADD CONSTRAINT `mat_ub_ibfk_2` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`id`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`id_herramienta`) REFERENCES `herramienta` (`id`),
  ADD CONSTRAINT `movimientos_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamos` (`id`),
  ADD CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`id_practica`) REFERENCES `practica` (`folio`);

--
-- Filtros para la tabla `prac_fecha`
--
ALTER TABLE `prac_fecha`
  ADD CONSTRAINT `prac_fecha_ibfk_1` FOREIGN KEY (`id_practica`) REFERENCES `practica` (`folio`),
  ADD CONSTRAINT `prac_fecha_ibfk_2` FOREIGN KEY (`id_fecha`) REFERENCES `fecha` (`id`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`id_practica`) REFERENCES `practica` (`folio`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id`),
  ADD CONSTRAINT `prestamos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `prestamos_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `veh_acc`
--
ALTER TABLE `veh_acc`
  ADD CONSTRAINT `veh_acc_ibfk_1` FOREIGN KEY (`id_veh`) REFERENCES `vehiculo` (`id`),
  ADD CONSTRAINT `veh_acc_ibfk_2` FOREIGN KEY (`id_acc`) REFERENCES `accesorios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
