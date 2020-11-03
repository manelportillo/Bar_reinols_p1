-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2020 a las 17:59:51
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_proyecto1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_camarero`
--

CREATE TABLE `tbl_camarero` (
  `id_camarero` int(5) NOT NULL,
  `nombre_camarero` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido camarero` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `email_camarero` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `pswd_camarero` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_camarero`
--

INSERT INTO `tbl_camarero` (`id_camarero`, `nombre_camarero`, `apellido camarero`, `email_camarero`, `pswd_camarero`) VALUES
(1, 'Manel', 'Portillo', 'manelportillo@admin.es', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Eloi', 'Rodríguez', 'eloirodriguez@admin.es', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Albert ', 'Buendia', 'albertbuendia@admin.es', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'Óscar', 'Mengual', 'oscarmengual@admin.es', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesa`
--

CREATE TABLE `tbl_mesa` (
  `id_mesa` int(5) NOT NULL,
  `capacidad_mesa` int(5) NOT NULL,
  `Disponibilidad` enum('Disponible','Reservada','Mantenimiento','') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_ubicacion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_mesa`
--

INSERT INTO `tbl_mesa` (`id_mesa`, `capacidad_mesa`, `Disponibilidad`, `id_ubicacion`) VALUES
(1, 4, 'Disponible', 3),
(2, 4, 'Disponible', 3),
(3, 6, 'Disponible', 3),
(4, 2, 'Disponible', 3),
(5, 2, 'Disponible', 3),
(6, 8, 'Disponible', 1),
(7, 6, 'Disponible', 1),
(8, 4, 'Disponible', 1),
(9, 4, 'Disponible', 1),
(10, 4, 'Disponible', 1),
(11, 3, 'Disponible', 1),
(12, 3, 'Disponible', 1),
(13, 2, 'Disponible', 2),
(14, 2, 'Disponible', 2),
(15, 2, 'Disponible', 2),
(16, 2, 'Disponible', 2),
(17, 16, 'Disponible', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `id_reserva` int(5) NOT NULL,
  `Fecha_reserva` date NOT NULL,
  `id_mesa` int(5) NOT NULL,
  `id_camarero` int(5) NOT NULL,
  `Hora_incio_reserva` time NOT NULL,
  `Hora_final_reserva` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ubicacion`
--

CREATE TABLE `tbl_ubicacion` (
  `id_ubicacion` int(5) NOT NULL,
  `Nombre_ubicacion` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_ubicacion`
--

INSERT INTO `tbl_ubicacion` (`id_ubicacion`, `Nombre_ubicacion`) VALUES
(1, 'Comedor-1'),
(2, 'Comedor-2'),
(3, 'Terraza'),
(4, 'Sala privada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_camarero`
--
ALTER TABLE `tbl_camarero`
  ADD PRIMARY KEY (`id_camarero`);

--
-- Indices de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `FK_mesa_ubicacion` (`id_ubicacion`);

--
-- Indices de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `FK_reserva_camarero` (`id_camarero`),
  ADD KEY `FK_reserva_mesa` (`id_mesa`);

--
-- Indices de la tabla `tbl_ubicacion`
--
ALTER TABLE `tbl_ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_camarero`
--
ALTER TABLE `tbl_camarero`
  MODIFY `id_camarero` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  MODIFY `id_mesa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `id_reserva` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_ubicacion`
--
ALTER TABLE `tbl_ubicacion`
  MODIFY `id_ubicacion` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD CONSTRAINT `FK_mesa_ubicacion` FOREIGN KEY (`id_ubicacion`) REFERENCES `tbl_ubicacion` (`id_ubicacion`);

--
-- Filtros para la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `FK_reserva_camarero` FOREIGN KEY (`id_camarero`) REFERENCES `tbl_camarero` (`id_camarero`),
  ADD CONSTRAINT `FK_reserva_mesa` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id_mesa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
