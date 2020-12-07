-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2020 a las 18:59:14
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turismocordoba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `id_gerente` int(11) DEFAULT NULL,
  `nombre_empresa` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `aprobada` varchar(2) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'no',
  `borrado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `id_gerente`, `nombre_empresa`, `created_at`, `aprobada`, `borrado`) VALUES
(1, 2, 'Bar Paquita', '2020-12-05 10:16:32', 'si', 0),
(27, 39, 'McDonalds', '2020-12-07 16:55:22', 'si', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimientos`
--

CREATE TABLE `establecimientos` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `id_gerente` int(11) DEFAULT NULL,
  `nombre_establecimiento` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` varchar(60) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  `borrado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `establecimientos`
--

INSERT INTO `establecimientos` (`id`, `id_empresa`, `id_gerente`, `nombre_establecimiento`, `direccion`, `imagen`, `tipo`, `estado`, `borrado`) VALUES
(1, 1, 2, 'La Viona', 'Afufuh', '', 'Restauracion', 1, 0),
(24, 1, 2, 'Nueva Viola', 'Calle falsa', 'NuevaViola24.jpg', 'Cultura', 1, 0),
(27, 1, 2, 'Otro establecimiento', 'Un lugar de la mancha', 'Otroestablecimiento27.jpg', 'Ocio', 1, 0),
(28, 27, 39, 'McDonalds Brillante', 'Avenida del Brillante', NULL, 'Ocio', 1, 0),
(29, 27, 39, 'McDonads Las Quemadas', 'Las Quemadas', NULL, 'Restauracion', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimientos_tiene_dependientes`
--

CREATE TABLE `establecimientos_tiene_dependientes` (
  `id` int(1) NOT NULL,
  `id_establecimiento` int(1) NOT NULL,
  `id_dependiente` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `establecimientos_tiene_dependientes`
--

INSERT INTO `establecimientos_tiene_dependientes` (`id`, `id_establecimiento`, `id_dependiente`) VALUES
(1, 1, 3),
(2, 24, 37),
(3, 24, 38),
(4, 28, 40),
(5, 29, 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `descripcion` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo` int(6) NOT NULL,
  `nivel_requerido` int(3) NOT NULL DEFAULT 0,
  `puntos` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` varchar(2) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'si',
  `borrado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id`, `id_empresa`, `descripcion`, `tipo`, `codigo`, `nivel_requerido`, `puntos`, `fecha_inicio`, `fecha_fin`, `estado`, `borrado`) VALUES
(1, 1, 'Descuento en la consumición del 30%', 'Cultura', 27, 0, 10, '2020-12-01', '2020-12-24', '1', 0),
(2, 1, 'Sorteo de cascos', 'Ocio', 456, 1, 30, '2020-12-02', '2020-12-03', '0', 0),
(3, 1, '2x1 increible', 'Cultura', 111, 0, 50, '2020-12-02', '2020-12-23', '1', 0),
(4, 1, 'Entrada gratis para niño con adulto', 'Cultura', 478, 5, 10, '2020-12-01', '2020-12-17', '1', 0),
(5, 1, 'Entrada gratis para menores de 16 años', 'Restauracion', 666, 0, 10, '2020-12-01', '2020-12-11', '1', 0),
(6, 1, 'Descuento en la consumición del 40%', 'Restauracion', 745, 0, 30, '2020-12-01', '2020-12-06', '0', 0),
(7, 1, 'Mcpollo de regalo', 'Ocio', 456, 3, 30, '2020-12-01', '2020-12-23', '1', 0),
(8, 1, 'Oferta de prueba con nivel', 'Ocio', 608, 0, 50, '2020-12-01', '2020-12-03', '0', 0),
(9, 27, 'MacHamburgesa', 'Restauracion', 891, 0, 5, '2020-12-07', '2020-12-17', '1', 0),
(10, 27, 'Alitas crujientes', 'Restauracion', 222, 2, 15, '2020-12-07', '2020-12-16', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `puntos` int(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `id_usuario`, `puntos`, `nivel`) VALUES
(1, 4, 70, 4),
(2, 42, 0, 1),
(3, 46, 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `email` varchar(60) NOT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  `perfil` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `baneado` int(1) NOT NULL DEFAULT 0,
  `borrado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `nombre`, `apellidos`, `email`, `imagen`, `perfil`, `created_at`, `last_login`, `last_modified`, `baneado`, `borrado`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 'Admini', 'admin@turismocordoba.com', 'admin1.jpg', 4, '2020-11-21 20:48:25', '2020-12-07 17:16:59', '2020-12-04 14:14:35', 0, 0),
(2, 'gerente', '740d9c49b11f3ada7b9112614a54be41', 'Paco', 'Rios Santos', 'gerente@turismocordoba.com', 'gerente2.jpg', 3, NULL, '2020-12-07 17:55:57', '2020-11-29 20:56:05', 0, 0),
(3, 'dependiente', 'de0194a0d9548a147bd322c52f6adbe3', 'dependiente', 'dependiente', 'dependiente@turismocordoba.com', '', 2, NULL, '2020-12-07 17:28:02', NULL, 0, 0),
(4, 'usuario', 'f8032d5cae3de20fcec887f395ec9a6a', 'Romeo', 'Santos', 'usuario@turismocordoba.com', 'usuario4.jpg', 1, NULL, '2020-12-07 17:34:32', '2020-11-30 20:06:04', 0, 0),
(36, 'profesora', 'fe80b8b4c8941a26aebeb3a534992cc7', 'Lourdes', 'Magarín Corvillo', 'profesora@iesgrancapitan.org', 'profesora36.jpg', 4, '2020-12-05 10:16:41', '2020-12-05 10:28:36', '2020-12-05 10:28:03', 0, 0),
(37, 'dependiente2', '651a7b944b6a14f35d1b990fa6ea09db', 'dependiente2', 'dependiente2', 'dependiente2@turismocordoba.com', '', 2, '2020-12-07 12:47:51', '2020-12-06 15:59:56', '2020-12-07 12:47:51', 0, 0),
(38, 'Dependiente3', '97333eb08b7ce7015ee0317d4416daa0', 'Dependiente3', 'Dependientedependiente3', 'dependiente3@turismocordoba.com', NULL, 2, '2020-12-07 18:15:07', NULL, '2020-12-07 18:15:07', 0, 0),
(39, 'mcdonalds', '5179b21fc1d50950b99b4eecaa48c614', 'Ronald', 'MacDonalds', 'mcdonalds@turismocordoba.com', NULL, 3, '2020-12-07 16:55:22', '2020-12-07 18:15:19', '2020-12-07 17:03:21', 0, 0),
(40, 'macdependiente1', 'a3169e4eb3b3407f76481f17ec519c6e', 'Macdependiente1', 'Macdependiente1', 'macdependiente1@turismocordoba.com', NULL, 2, '2020-12-07 17:37:01', '2020-12-07 18:34:56', NULL, 0, 0),
(41, 'macdependiente2', '771675a32ff1d6a5ce69daac46c25980', 'Macdependiente2', 'Macdependiente2', 'macdependiente2@turismocordoba.com', NULL, 2, '2020-12-07 18:17:34', NULL, '2020-12-07 18:17:34', 0, 0),
(42, 'paquito', 'f8032d5cae3de20fcec887f395ec9a6a', 'Paco', 'Gonzalez', 'pacogonza@turismocordoba.com', NULL, 1, '2020-12-07 18:20:04', '2020-12-07 18:20:15', NULL, 0, 0),
(46, 'magico', '81dc9bdb52d04dc20036dbd8313ed055', 'Joaquin', 'Felix', 'magico@turismocordoba.com', NULL, 1, '2020-12-07 18:30:07', '2020-12-07 18:30:23', NULL, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gerente` (`id_gerente`);

--
-- Indices de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_gerente` (`id_gerente`);

--
-- Indices de la tabla `establecimientos_tiene_dependientes`
--
ALTER TABLE `establecimientos_tiene_dependientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_establecimiento` (`id_establecimiento`),
  ADD KEY `id_dependiente` (`id_dependiente`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `establecimientos_tiene_dependientes`
--
ALTER TABLE `establecimientos_tiene_dependientes`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
