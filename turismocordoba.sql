-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2020 a las 19:54:11
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
(29, 50, 'KFC', '2020-12-11 18:12:21', 'si', 0);

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
(41, 29, 50, 'KFC Brillante', 'Av. del Brillante, 11, 14006 Córdoba', NULL, '', 1, 0);

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
(6, 30, 49);

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
(1, 1, 'Entrada gratis a los residentes de la provincia de Córdoba', 'Cultura', 108, 0, 5, '2020-12-01', '2021-12-31', '1', 0),
(9, 27, 'McBurger', 'Restauracion', 350, 0, 5, '2020-12-07', '2020-12-17', '1', 0),
(10, 27, 'Alitas crujientes', 'Restauracion', 222, 2, 15, '2020-12-07', '2020-12-16', '1', 0),
(11, 28, 'Mande foto al correo del ayuntamiento indicando su email', 'Cultura', 299, 0, 5, '2020-12-08', '2020-12-31', '1', 0);

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
(1, 4, 30, 6),
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
(1, 'rafaus', '21232f297a57a5a743894a0e4a801fc3', 'Rafael', 'Urbano Estepa', 'rafaelurbanoestepa@gmail.com', 'rafaus1.jpg', 4, '2020-11-21 20:48:25', '2020-12-08 15:57:26', '2020-12-08 15:57:43', 0, 0),
(2, 'obispocordoba', 'e9450ac6826250f02c312ce8471fa8e0', 'Paco', 'Obispo', 'obispocordoba@turismocordoba.com', 'obispocordoba2.png', 3, '2020-12-11 11:01:42', '2020-12-11 11:20:28', '2020-12-11 11:21:02', 0, 0),
(3, 'dependiente', 'fbbcf0f6cc0c441c0c06e6f74e9000cc', 'Diana', 'López Quesada', 'dependiente1@turismocordoba.com', '', 2, '2020-12-11 11:01:48', '2020-12-11 11:37:16', '2020-12-11 11:37:23', 0, 0),
(4, 'romeo18', 'f8032d5cae3de20fcec887f395ec9a6a', 'Romeo', 'Santos', 'romeo18@gmail.com', 'romeo184.jpg', 1, '2020-12-11 11:01:51', '2020-12-11 18:54:23', '2020-12-11 18:55:25', 0, 0),
(36, 'lmagarin', '52b3eca6542c0fc6c486005b475d530f', 'Lourdes', 'Magarín Corvillo', 'lmagarin@iesgrancapitan.org', 'lmagarin36.jpg', 4, '2020-12-05 10:16:41', '2020-12-11 19:08:01', '2020-12-11 11:30:47', 0, 0),
(37, 'dependiente2', '651a7b944b6a14f35d1b990fa6ea09db', 'Raúl', 'Federico Páez', 'dependiente2@turismocordoba.com', '', 2, '2020-12-07 12:47:51', '2020-12-09 11:04:34', '2020-12-07 12:47:51', 0, 0),
(38, 'dependiente3', '97333eb08b7ce7015ee0317d4416daa0', 'Carolina', 'Pintor Guzmán', 'dependiente3@turismocordoba.com', '', 2, '2020-12-07 18:15:07', NULL, '2020-12-07 18:15:07', 0, 0),
(39, 'mcdonalds', '5179b21fc1d50950b99b4eecaa48c614', 'Ronald', 'McDonalds', 'mcdonalds@turismocordoba.com', '', 3, '2020-12-07 16:55:22', '2020-12-07 18:15:19', '2020-12-07 17:03:21', 0, 0),
(40, 'mcdependiente1', 'a3169e4eb3b3407f76481f17ec519c6e', 'Jorge', 'Torres Santos', 'mcdependiente1@turismocordoba.com', '', 2, '2020-12-07 17:37:01', '2020-12-07 18:34:56', NULL, 0, 0),
(41, 'mcdependiente2', '771675a32ff1d6a5ce69daac46c25980', 'Ana', 'González Romero', 'mcdependiente2@turismocordoba.com', '', 2, '2020-12-07 18:17:34', NULL, '2020-12-07 18:17:34', 0, 0),
(42, 'paquito', 'f8032d5cae3de20fcec887f395ec9a6a', 'Paco', 'Gonzalez', 'pacogonza@turismocordoba.com', '', 1, '2020-12-07 18:20:04', '2020-12-07 18:20:15', NULL, 0, 0),
(46, 'joafelix', '81dc9bdb52d04dc20036dbd8313ed055', 'Joaquin', 'Felix', 'joaquin@outlook.com', '', 1, '2020-12-07 18:30:07', '2020-12-07 18:30:23', NULL, 0, 0),
(47, 'javierfs', '21232f297a57a5a743894a0e4a801fc3', 'Javier', 'Frías Serrano', 'javifs94@gmail.com', 'javierfs47.jpg', 4, '2020-12-08 20:48:25', '2020-12-11 18:12:47', '2020-12-09 13:06:48', 0, 0),
(48, 'ayuncor', '05da28cc7fa83374c94ea1efe2608b18', 'Junta', 'Andalucía', 'ayuntacordoba@turismocordoba.com', 'ayuncor48.jpg', 3, '2020-12-08 22:50:38', '2020-12-08 22:51:08', '2020-12-08 23:09:00', 0, 0),
(49, 'funcionario1', 'c3e7f941cb628aeaa9f01121f10c21c4', 'Luis', 'Soto Pérez', 'funcionario1@turismocordoba.com', '', 2, '2020-12-08 23:14:35', NULL, '2020-12-08 23:14:35', 0, 0),
(50, 'coronel', '496e7fe3e7cae417b647edda3334fcf0', 'Coronel', 'Sanders', 'coronelsanders@gmail.com', NULL, 3, '2020-12-11 18:12:21', '2020-12-11 18:12:33', NULL, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `establecimientos_tiene_dependientes`
--
ALTER TABLE `establecimientos_tiene_dependientes`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
