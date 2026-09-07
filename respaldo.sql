-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2026 a las 03:53:36
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
-- Base de datos: `bitacora_astronomica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capturas`
--

CREATE TABLE `capturas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `objeto_celeste` varchar(100) NOT NULL,
  `fecha_observacion` date NOT NULL,
  `telescopio` varchar(100) DEFAULT NULL,
  `camara` varchar(100) DEFAULT NULL,
  `tiempo_exposicion` varchar(50) DEFAULT NULL,
  `imagen_path` varchar(255) NOT NULL,
  `notas` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `capturas`
--

INSERT INTO `capturas` (`id`, `titulo`, `objeto_celeste`, `fecha_observacion`, `telescopio`, `camara`, `tiempo_exposicion`, `imagen_path`, `notas`, `fecha_registro`) VALUES
(1, 'Vía Lactea', 'Espacio Profundo', '2025-07-17', 'no', 'Google Pixel 6 pro', '1 x 240s', 'uploads/1787755773_PXL_20250718_050730617.NIGHT.jpg', '', '2026-08-26 14:49:33'),
(3, 'Galaxia andromeda', 'Galaxia', '2026-08-18', 'no', 'Samsung A22', 'No aplica', 'uploads/1787757638_eb95cc111ccc8e422e2ec905a6df6b3c.jpg', '', '2026-08-26 15:20:38'),
(4, 'cassiopeia', 'Espacio Profundo', '2025-05-15', 'no', 'Google Pixel 6 pro', '1 x 240s', 'uploads/1787757795_PXL_20251209_004953535.NIGHT.jpg', '', '2026-08-26 15:23:15'),
(5, 'Luna', 'satelite natural', '2026-02-26', 'no ', 'Google Pixel 6 pro', 'foto normal', 'uploads/1787837069_PXL_20260226_232124327.jpg', '', '2026-08-27 13:24:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guias`
--

CREATE TABLE `guias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `equipo_recomendado` varchar(150) DEFAULT NULL,
  `dificultad` varchar(30) DEFAULT 'Principiante',
  `mejor_epoca` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guias`
--

INSERT INTO `guias` (`id`, `titulo`, `categoria`, `descripcion`, `equipo_recomendado`, `dificultad`, `mejor_epoca`, `fecha_creacion`) VALUES
(1, 'Detalles Lunares y el Terminador', 'Luna', 'Identificación de los cráteres Tycho y Copérnico aprovechando las sombras marcadas en la línea del terminador.', 'Ocular de 12.5mm o 20mm, filtro lunar opcional', 'Principiante', 'Cuarto Creciente', '2026-08-27 13:11:15'),
(2, 'Bandas Nubosas y Satélites Galileanos', 'Planetas', 'Observación de las bandas atmosféricas de Júpiter y el tránsito de las lunas Ío, Europa, Gánimedes y Calisto.', 'Telescopio refractor/reflector y alta magnificación', 'Intermedio', 'Oposición planetaria', '2026-08-27 13:11:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capturas`
--
ALTER TABLE `capturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `guias`
--
ALTER TABLE `guias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capturas`
--
ALTER TABLE `capturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `guias`
--
ALTER TABLE `guias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
