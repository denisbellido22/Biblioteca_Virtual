-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2026 a las 05:19:18
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
-- Base de datos: `db_libros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `ID_autores` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `telefono` bigint(14) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `img_autores` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`ID_autores`, `Nombre`, `Apellidos`, `telefono`, `correo`, `img_autores`) VALUES
(1, 'Fray', 'Bellidoc', 987654321, 'denis@gmail.com', NULL),
(2, 'Rodrigo', 'Retamozo Muñoa', 987654322, 'rodrigo@gmail.com', NULL),
(9, 'SANTIAGO', 'QUEVEDO', 322334456, 'camila.tovar@usco.edu.co', NULL),
(10, 'Brayan', 'Toro Bustos', 573102984722, 'prueba@test.com', NULL),
(11, 'Don patricio', 'carvajal', 2347672310, 'si@test.com.co.test', NULL),
(18, 'Denis', 'Carhuaz', 915336362, 'denis@gmail.com', NULL),
(23, 'Alberto', 'Rivero', 999666222, 'alberto@gmail.com', 'uploads/autores/i4NubKuqdZVQtRihdpyHlGlC.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editores`
--

CREATE TABLE `editores` (
  `ID_editores` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `nombre_editorial` varchar(70) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `img_editores` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `editores`
--

INSERT INTO `editores` (`ID_editores`, `Nombre`, `Apellidos`, `nombre_editorial`, `pais`, `img_editores`) VALUES
(1, 'Pedro', 'Diaz Perea', NULL, NULL, NULL),
(2, 'Alejandro', 'Peralta', NULL, NULL, NULL),
(3, 'Fray', 'Bellido', 'Editorial Peruana', 'Peru', NULL),
(5, 'Jorge', 'Mendoza', 'Editorial Andina', 'Perú', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID_libro` int(11) NOT NULL,
  `Titulo` varchar(45) DEFAULT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `ID_autor` int(11) DEFAULT NULL,
  `ID_editor` int(11) DEFAULT NULL,
  `ID_traductor` int(11) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `img_libros` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ID_libro`, `Titulo`, `Tipo`, `ID_autor`, `ID_editor`, `ID_traductor`, `genero`, `img_libros`) VALUES
(7, 'El mundo es ajeno y ancho', 'Novela', 11, 2, 3, 'Literatura', NULL),
(8, 'El mundo es ancho y ajeno', 'Novela', 11, 5, 7, 'Literatura', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traductores`
--

CREATE TABLE `traductores` (
  `ID_traductores` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `idioma_nativo` varchar(30) DEFAULT NULL,
  `idiomas_traduccion` varchar(50) DEFAULT NULL,
  `certificaciones` int(11) DEFAULT NULL,
  `img_traductores` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `traductores`
--

INSERT INTO `traductores` (`ID_traductores`, `Nombre`, `Apellidos`, `idioma_nativo`, `idiomas_traduccion`, `certificaciones`, `img_traductores`) VALUES
(1, 'Luis', 'Ruiz', NULL, NULL, NULL, NULL),
(2, 'Fray', 'Bellido', 'Español', 'Ingles', NULL, NULL),
(3, 'Alejandra', 'Pineda', NULL, NULL, NULL, NULL),
(7, 'Pedro', 'Salazar', 'Español', 'Inglés', 2, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`ID_autores`);

--
-- Indices de la tabla `editores`
--
ALTER TABLE `editores`
  ADD PRIMARY KEY (`ID_editores`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID_libro`),
  ADD KEY `ID_autor` (`ID_autor`),
  ADD KEY `ID_editor` (`ID_editor`),
  ADD KEY `ID_traductor` (`ID_traductor`);

--
-- Indices de la tabla `traductores`
--
ALTER TABLE `traductores`
  ADD PRIMARY KEY (`ID_traductores`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `ID_autores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `editores`
--
ALTER TABLE `editores`
  MODIFY `ID_editores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ID_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `traductores`
--
ALTER TABLE `traductores`
  MODIFY `ID_traductores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`ID_autor`) REFERENCES `autores` (`ID_autores`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`ID_editor`) REFERENCES `editores` (`ID_editores`),
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`ID_traductor`) REFERENCES `traductores` (`ID_traductores`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
