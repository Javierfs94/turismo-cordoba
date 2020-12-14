-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2020 a las 16:30:45
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
(1, 2, 'Cabildo de Córdoba', '2020-12-05 10:16:32', 'si', 0),
(27, 39, 'McDonalds', '2020-12-07 16:55:22', 'si', 0),
(28, 48, 'Ayuntamiento de Córdoba', '2020-12-08 22:50:38', 'si', 0),
(29, 50, 'KFC', '2020-12-11 18:12:21', 'si', 0),
(30, 53, 'CineSur El Tablero', '2020-12-12 13:58:59', 'si', 0),
(31, 56, 'Burger King', '2020-12-13 17:04:04', 'si', 0);

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
(1, 1, 2, 'Mezquita-Catedral de Córdoba', 'Calle Cardenal Herrero, 1, 14003 Córdoba', 'Mezquita-CatedraldeCórdoba1.jpg', 'Cultura', 1, 0),
(28, 27, 39, 'McDonalds Brillante', 'Av. del Brillante, 20, 14006 Córdoba', 'McDonaldsBrillante28.PNG', 'Restauracion', 1, 0),
(29, 27, 39, 'McDonads Avenida de Libia', 'Av. de Libia, 13, 14007 Córdoba', 'McDonadsAvenidadeLibia29.PNG', 'Restauracion', 1, 0),
(30, 28, 48, 'Ayuntamiento', 'Calle Capitulares 1', 'Ayuntamiento30.jpg', 'Cultura', 1, 0),
(31, 28, 48, 'Torre de la Malmuerta', '14001 Barrio de Santa Marina', 'TorredelaMalmuerta31.jpg', 'Cultura', 1, 0),
(41, 29, 50, 'KFC Brillante', 'Av. del Brillante, 11, 14006 Córdoba', 'KFCBrillante41.jpg', 'Restauracion', 1, 0),
(42, 1, 2, 'Real Parroquia de San Lorenzo Mártir de Cordoba', 'Plaza de San Lorenzo, 5, 14002 Córdoba', 'RealParroquiadeSanLorenzoMártirdeCordoba42.PNG', 'Restauracion', 1, 0),
(43, 30, 53, 'Cine El Tablero', 'Calle Poeta Juan Ramón Jiménez, 25, 14012 Córdoba', 'CineElTablero43.jpg', 'Ocio', 1, 0),
(44, 31, 56, 'Burger King', 'Calle Concepción, 12, 14003 Córdoba', NULL, 'Restauracion', 1, 0),
(46, 28, 48, 'Medina Azahara - Conjunto Arqueológico Madinat al-Zahra', 'Ctra. Palma del Río, km 5.5, 14005 Córdoba', 'MedinaAzahara-ConjuntoArqueológicoMadinatal-Zahra46.jpg', 'Cultura', 1, 0);

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
(5, 29, 41),
(6, 30, 49),
(7, 1, 51),
(8, 43, 54),
(9, 44, 57),
(11, 1, 60),
(12, 1, 61),
(13, 41, 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `descripcion` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo` int(6) NOT NULL,
  `nivel_requerido` int(3) NOT NULL DEFAULT 1,
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
(1, 1, 'Entrada gratis a los residentes de la provincia de Córdoba', 'Cultura', 108, 1, 5, '2020-12-01', '2021-12-31', '1', 0),
(9, 27, 'McBurger', 'Restauracion', 350, 1, 5, '2020-12-07', '2020-12-17', '1', 0),
(10, 27, 'Alitas crujientes', 'Restauracion', 222, 2, 15, '2020-12-07', '2020-12-16', '1', 0),
(11, 28, 'Mande foto al correo del ayuntamiento indicando su email', 'Cultura', 390, 1, 50, '2020-12-08', '2020-12-31', '1', 0),
(12, 1, 'Real Parroquia de San Lorenzo misa de los domingos', 'Cultura', 711, 1, 5, '2020-12-01', '2020-12-21', '1', 0),
(13, 30, 'Entrada a 5 euros', 'Ocio', 93, 1, 15, '2020-12-12', '2020-12-31', '1', 0),
(14, 1, 'Reunión en la plaza de Tendillas para coro', 'Ocio', 945, 1, 5, '2020-12-13', '2020-12-31', '1', 0),
(15, 31, '2 x 7 euros', 'Restauracion', 149, 1, 5, '2020-12-13', '2020-12-31', '1', 0),
(16, 29, '9 alitas picantes', 'Restauracion', 179, 1, 5, '2020-12-14', '2020-12-31', '1', 0),
(17, 29, 'Double Krunch o Twister', 'Restauracion', 898, 1, 5, '2020-12-14', '2020-12-31', '1', 0),
(18, 29, 'Bucket 5 alitas picantes + 5 piezas de pollo + 2 patatas + 2 mini helados', 'Restauracion', 937, 2, 15, '2020-12-14', '2020-12-31', '1', 0),
(19, 29, '8 tiras de pechuga + 6 piezas de pollo + 4 bebidas + 4 patatas', 'Restauracion', 250, 2, 15, '2020-12-14', '2020-12-31', '1', 0),
(20, 29, 'Shake', 'Restauracion', 607, 1, 5, '2020-12-14', '2020-12-31', '1', 0),
(21, 31, 'King fusión', 'Restauracion', 968, 1, 5, '2020-12-14', '2020-12-31', '1', 0),
(22, 28, 'Tour de City Sightseeing Córdoba', 'Cultura', 777, 1, 15, '2020-12-14', '2020-12-31', '1', 0),
(23, 28, 'Espectáculo Templo Romano', 'Cultura', 937, 1, 5, '2020-12-14', '2020-12-31', '1', 0),
(25, 28, 'Ruta senderismo', 'Cultura', 510, 1, 5, '2020-12-14', '2020-12-31', '1', 0);

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
(1, 4, 0, 1);

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
(1, 'rafaus', '21232f297a57a5a743894a0e4a801fc3', 'Rafael', 'Urbano Estepa', 'rafaelurbanoestepa@gmail.com', 'rafaus1.jpg', 4, '2020-11-21 20:48:25', '2020-12-12 10:40:25', '2020-12-08 15:57:43', 0, 0),
(2, 'obispocordoba', '740d9c49b11f3ada7b9112614a54be41', 'Paco', 'Obispo', 'obispocordoba@turismocordoba.com', 'obispocordoba2.png', 3, '2020-12-11 11:01:42', '2020-12-14 11:11:00', '2020-12-11 11:21:02', 0, 0),
(3, 'dependiente', 'de0194a0d9548a147bd322c52f6adbe3', 'Diana', 'López Quesada', 'dependiente1@turismocordoba.com', '', 2, '2020-12-11 11:01:48', '2020-12-14 11:04:14', '2020-12-13 17:18:27', 0, 0),
(4, 'romeo18', 'f8032d5cae3de20fcec887f395ec9a6a', 'Romeo', 'Santos', 'romeo18@gmail.com', 'romeo184.jpg', 1, '2020-12-11 11:01:51', '2020-12-14 14:48:08', '2020-12-12 13:26:12', 0, 0),
(36, 'lmagarin', '52b3eca6542c0fc6c486005b475d530f', 'Lourdes', 'Magarín Corvillo', 'lmagarin@iesgrancapitan.org', 'lmagarin36.jpg', 4, '2020-12-05 10:16:41', '2020-12-11 19:08:01', '2020-12-11 11:30:47', 0, 0),
(37, 'dependiente2', 'de0194a0d9548a147bd322c52f6adbe3', 'Raúl', 'Federico Páez', 'dependiente2@turismocordoba.com', '', 2, '2020-12-07 12:47:51', '2020-12-09 11:04:34', '2020-12-07 12:47:51', 0, 0),
(38, 'dependiente3', 'de0194a0d9548a147bd322c52f6adbe3', 'Carolina', 'Pintor Guzmán', 'dependiente3@turismocordoba.com', '', 2, '2020-12-07 18:15:07', NULL, '2020-12-07 18:15:07', 0, 0),
(39, 'mcdonalds', '740d9c49b11f3ada7b9112614a54be41', 'Ronald', 'McDonalds', 'mcdonalds@turismocordoba.com', '', 3, '2020-12-07 16:55:22', '2020-12-07 18:15:19', '2020-12-07 17:03:21', 0, 0),
(40, 'mcdependiente1', 'de0194a0d9548a147bd322c52f6adbe3', 'Jorge', 'Torres Santos', 'mcdependiente1@turismocordoba.com', '', 2, '2020-12-07 17:37:01', '2020-12-07 18:34:56', NULL, 0, 0),
(41, 'mcdependiente2', 'de0194a0d9548a147bd322c52f6adbe3', 'Ana', 'González Romero', 'mcdependiente2@turismocordoba.com', '', 2, '2020-12-07 18:17:34', NULL, '2020-12-07 18:17:34', 0, 0),
(47, 'javierfs', '21232f297a57a5a743894a0e4a801fc3', 'Javier', 'Frías Serrano', 'javifs94@gmail.com', 'javierfs47.jpg', 4, '2020-12-08 20:48:25', '2020-12-13 17:31:41', '2020-12-09 13:06:48', 0, 0),
(48, 'ayuncor', '740d9c49b11f3ada7b9112614a54be41', 'Junta', 'Andalucía', 'ayuntacordoba@turismocordoba.com', 'ayuncor48.jpg', 3, '2020-12-08 22:50:38', '2020-12-14 13:21:50', '2020-12-13 13:15:52', 0, 0),
(49, 'funcionario1', 'de0194a0d9548a147bd322c52f6adbe3', 'Luis', 'Soto Pérez', 'funcionario1@turismocordoba.com', '', 2, '2020-12-08 23:14:35', '2020-12-14 16:27:23', '2020-12-08 23:14:35', 0, 0),
(50, 'coronel', '740d9c49b11f3ada7b9112614a54be41', 'Coronel', 'Sanders', 'coronelsanders@gmail.com', NULL, 3, '2020-12-11 18:12:21', '2020-12-14 13:09:19', NULL, 0, 0),
(53, 'joelpa', '740d9c49b11f3ada7b9112614a54be41', 'Joel', 'Prados Álvarez', 'joel@gmail.com', NULL, 3, '2020-12-12 13:58:59', '2020-12-12 13:59:28', NULL, 0, 0),
(54, 'andrepf', 'de0194a0d9548a147bd322c52f6adbe3', 'Andrea', 'Pardo Fernan', 'cinependiente1@gmail.com', NULL, 2, '2020-12-12 14:02:20', NULL, NULL, 0, 0),
(56, 'king', '740d9c49b11f3ada7b9112614a54be41', 'Big', 'King', 'burgerking@gmail.com', NULL, 3, '2020-12-13 17:04:04', '2020-12-14 13:13:09', NULL, 0, 0),
(57, 'burgerpendiente1', 'de0194a0d9548a147bd322c52f6adbe3', 'Gustavo', 'García Martínez', 'burgerpendiente1@gmai.com', NULL, 2, '2020-12-13 17:08:21', '2020-12-13 17:08:37', NULL, 0, 0),
(60, 'dependiente4', 'de0194a0d9548a147bd322c52f6adbe3', 'Raúl', 'López Quesada', 'dependiente4@turismocordoba.com', NULL, 2, '2020-12-14 11:09:21', '2020-12-14 11:10:10', '2020-12-14 11:10:52', 0, 0),
(61, 'dependiente5', 'de0194a0d9548a147bd322c52f6adbe3', 'Jorge', 'López Quesada', 'dependiente5@turismocordoba.com', NULL, 2, '2020-12-14 11:12:51', '2020-12-14 11:13:13', '2020-12-14 11:13:01', 0, 0),
(62, 'kfcdependiente1', '5775800fda4865d39a9e174fd336b3a1', 'Coronel', 'Quesada López', 'kfcdependiente1@gmail.com', NULL, 2, '2020-12-14 11:14:52', '2020-12-14 11:16:51', NULL, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `establecimientos_tiene_dependientes`
--
ALTER TABLE `establecimientos_tiene_dependientes`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
