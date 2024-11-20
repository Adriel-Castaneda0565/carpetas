-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2024 a las 05:24:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dinotienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `usuarioid` int(10) NOT NULL,
  `productoid` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `usuarioid`, `productoid`, `cantidad`) VALUES
(41, 6, 2, 1),
(43, 3, 2, 1),
(48, 8, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_prov` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_suc` int(12) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria`, `nombre`, `id_prov`, `cantidad`, `precio`, `descripcion`, `id_suc`, `imagen`) VALUES
(1, 'Peluches\r\n', 'Peluche dodo ark', 22, 10, 686.00, 'Peluche de dodo del videojuego ARK survival evolved, hecho a mano', 12, 'img/dodito.png'),
(2, 'Peluches', 'Peluche de jurassic world rex', 101, 20, 260.00, 'peluche de tyrannosaurus rex de la pelicula jurassic world', 1, 'img/jwrex.png'),
(3, 'Peluches', 'Dragon negro de peluche', 33, 20, 1000.00, 'peluche de dragon negro hecho a mano', 10, 'img/blackdragon.png'),
(4, 'Peluches', 'Dragon de peluche rojo', 22, 15, 1430.00, 'dragon de peluche rojo hecho amano', 1, 'img/reddragon.png'),
(5, 'Figuras', 'Figura rex jurassic park', 33, 15, 2000.00, 'bla bal bal', 1, 'img/jprex.png'),
(6, 'Carros', 'bmw perrote', 44, 30, 120.00, 'bmw bien perron', 32, 'img/bmw.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagen` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `imagen`) VALUES
(1, 'Adri', '$2y$10$mAAKUDUfa1lCIbqziijNUuN3CGOvVe01YBlmW6WRKBu.ka9j9VH6S', '2024-06-07 00:53:38', ''),
(2, 'Saparrito18', '$2y$10$LDAfhJ50Pq0bhWRVZp7LeuKjcihDYdTRaiQAX/WnIkT.nucsFCBZm', '2024-06-08 00:23:54', ''),
(3, 'Melany', '$2y$10$ciW5NsU.6HzZkZMGvKvRgOKSVeudJVPSseNAoF7t6lB2wKTNawE4C', '2024-06-09 07:13:08', ''),
(4, 'Karen', '$2y$10$kg4Fp2bz.4B4FFd4oSKm4Oj0PDPOSKPQs0TAIvXj02GqaoTfcHgnu', '2024-06-10 00:16:34', ''),
(5, 'Fede', '$2y$10$ZXT3XKrcWnYaTGJbbU6zPuzCWisCdkc9gjf4RMCHPm2CZyccqNCiy', '2024-06-12 00:49:24', ''),
(6, 'Roberto', '$2y$10$JzjbdgAKvdJClv/DcAzOOuAW6uiVTsGkUZ0z8BMlxgJlGxDSyFTIy', '2024-06-14 00:13:36', ''),
(7, 'santi', '$2y$10$vIQB0DEQqGvoyij8M.xGtOcylff8zPWuURpoRD9D3SjIkd7KWzujy', '2024-11-17 01:20:08', ''),
(8, 'alex', '$2y$10$83S7hQFK3TwwYhkCx6CK0O0zCy.bVCS6133XsN0xsITxMFuefI.wi', '2024-11-20 04:13:32', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`),
  ADD KEY `usuarioid` (`usuarioid`),
  ADD KEY `productoid_2` (`productoid`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuarioid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`productoid`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
