-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-10-2024 a las 07:06:30
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
-- Base de datos: `tagmypet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ciudad`
--

CREATE TABLE `Ciudad` (
  `idCiudad` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Ciudad`
--

INSERT INTO `Ciudad` (`idCiudad`, `Nombre`) VALUES
(8, 'Barranquilla'),
(1, 'Bogotá'),
(5, 'Bucaramanga'),
(4, 'Cali'),
(7, 'Medellín'),
(6, 'Neiva'),
(3, 'Pasto'),
(2, 'Soacha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Fchpets`
--

CREATE TABLE `Fchpets` (
  `idFchpets` int(11) NOT NULL,
  `idRusers` int(11) NOT NULL,
  `idRepets` int(11) NOT NULL,
  `fchreg` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pets`
--

CREATE TABLE `Pets` (
  `idPets` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Repets`
--

CREATE TABLE `Repets` (
  `idRepets` int(11) NOT NULL,
  `idRusers` int(11) NOT NULL,
  `Petname` varchar(20) NOT NULL,
  `idRpets` int(11) NOT NULL,
  `Peso` tinyint(4) NOT NULL,
  `Color` varchar(80) NOT NULL,
  `idStrilpets` tinyint(4) NOT NULL,
  `Edad` tinyint(4) NOT NULL,
  `Meses` tinyint(4) NOT NULL,
  `Foncarnet` longblob NOT NULL,
  `Ftoncarnet` longblob DEFAULT NULL,
  `Ftrecarnet` longblob DEFAULT NULL,
  `Disease` text NOT NULL DEFAULT 'N/A',
  `Fpetone` longblob NOT NULL,
  `Fpetwo` longblob NOT NULL,
  `Fpetre` longblob NOT NULL,
  `Fpetfor` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol`
--

CREATE TABLE `Rol` (
  `idRol` tinyint(4) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Rol`
--

INSERT INTO `Rol` (`idRol`, `Name`) VALUES
(1, 'Usuario'),
(2, 'Moderador'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rpets`
--

CREATE TABLE `Rpets` (
  `idRpets` int(11) NOT NULL,
  `idPets` int(11) NOT NULL,
  `Raza` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rusers`
--

CREATE TABLE `Rusers` (
  `idRusers` int(11) NOT NULL,
  `Pname` varchar(20) NOT NULL,
  `Sname` varchar(20) DEFAULT NULL,
  `Psname` varchar(20) NOT NULL,
  `Ssname` varchar(20) DEFAULT NULL,
  `idTpdoc` int(11) NOT NULL,
  `Ndoc` varchar(255) DEFAULT NULL,
  `Fbirth` date NOT NULL,
  `Fcreation` date NOT NULL DEFAULT curdate(),
  `Edad` tinyint(4) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Ncel` bigint(20) NOT NULL,
  `Barrio` varchar(60) NOT NULL,
  `Nopcel` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `idCiudad` int(11) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `idRol` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Rusers`
--

INSERT INTO `Rusers` (`idRusers`, `Pname`, `Sname`, `Psname`, `Ssname`, `idTpdoc`, `Ndoc`, `Fbirth`, `Fcreation`, `Edad`, `Address`, `Ncel`, `Barrio`, `Nopcel`, `Email`, `idCiudad`, `Pass`, `idRol`) VALUES
(1, 'Cosme', NULL, 'Fulanito', NULL, 1, '44B13E0BA941FFE7F871EC9F543A78C8', '1999-05-10', '2024-10-24', 25, 'Carrera 28sur', 3150813055, 'San Carlos', NULL, '3AEC79FB64EE5FAEFF5D1FFA9C9130370EAD8CB6C7EF2FF1097182FA5BF61553', 1, '$2y$10$D2ekHQ6UcRxNTBlbc.d.O.E8tAlSiU8wGB2BSsSmV6RS2j/4TydGe', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Strilpets`
--

CREATE TABLE `Strilpets` (
  `idStrilpets` tinyint(4) NOT NULL,
  `Strilsi` tinyint(4) NOT NULL DEFAULT 1,
  `Nostril` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tpdoc`
--

CREATE TABLE `Tpdoc` (
  `idTpdoc` int(11) NOT NULL,
  `Abrviatra` varchar(5) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Tpdoc`
--

INSERT INTO `Tpdoc` (`idTpdoc`, `Abrviatra`, `Nombre`) VALUES
(1, 'CC', 'Cédula de ciudadanía'),
(2, 'PP', 'Pasaporte'),
(3, 'CE', 'Cédula de extranjería');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Ciudad`
--
ALTER TABLE `Ciudad`
  ADD PRIMARY KEY (`idCiudad`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `Fchpets`
--
ALTER TABLE `Fchpets`
  ADD PRIMARY KEY (`idFchpets`),
  ADD KEY `idRusers` (`idRusers`),
  ADD KEY `idRepets` (`idRepets`);

--
-- Indices de la tabla `Pets`
--
ALTER TABLE `Pets`
  ADD PRIMARY KEY (`idPets`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indices de la tabla `Repets`
--
ALTER TABLE `Repets`
  ADD PRIMARY KEY (`idRepets`),
  ADD KEY `idRusers` (`idRusers`),
  ADD KEY `idRpets` (`idRpets`),
  ADD KEY `idStrilpets` (`idStrilpets`);

--
-- Indices de la tabla `Rol`
--
ALTER TABLE `Rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `Rpets`
--
ALTER TABLE `Rpets`
  ADD PRIMARY KEY (`idRpets`),
  ADD KEY `idPets` (`idPets`);

--
-- Indices de la tabla `Rusers`
--
ALTER TABLE `Rusers`
  ADD PRIMARY KEY (`idRusers`),
  ADD UNIQUE KEY `Ncel` (`Ncel`),
  ADD UNIQUE KEY `Ndoc` (`Ndoc`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Nopcel` (`Nopcel`),
  ADD KEY `idTpdoc` (`idTpdoc`),
  ADD KEY `idCiudad` (`idCiudad`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `Strilpets`
--
ALTER TABLE `Strilpets`
  ADD PRIMARY KEY (`idStrilpets`),
  ADD UNIQUE KEY `Strilsi` (`Strilsi`),
  ADD UNIQUE KEY `Nostril` (`Nostril`);

--
-- Indices de la tabla `Tpdoc`
--
ALTER TABLE `Tpdoc`
  ADD PRIMARY KEY (`idTpdoc`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Ciudad`
--
ALTER TABLE `Ciudad`
  MODIFY `idCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `Fchpets`
--
ALTER TABLE `Fchpets`
  MODIFY `idFchpets` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Pets`
--
ALTER TABLE `Pets`
  MODIFY `idPets` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Repets`
--
ALTER TABLE `Repets`
  MODIFY `idRepets` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Rol`
--
ALTER TABLE `Rol`
  MODIFY `idRol` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Rpets`
--
ALTER TABLE `Rpets`
  MODIFY `idRpets` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Rusers`
--
ALTER TABLE `Rusers`
  MODIFY `idRusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Strilpets`
--
ALTER TABLE `Strilpets`
  MODIFY `idStrilpets` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Tpdoc`
--
ALTER TABLE `Tpdoc`
  MODIFY `idTpdoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Fchpets`
--
ALTER TABLE `Fchpets`
  ADD CONSTRAINT `Fchpets_ibfk_1` FOREIGN KEY (`idRusers`) REFERENCES `Rusers` (`idRusers`),
  ADD CONSTRAINT `Fchpets_ibfk_2` FOREIGN KEY (`idRepets`) REFERENCES `Repets` (`idRepets`);

--
-- Filtros para la tabla `Repets`
--
ALTER TABLE `Repets`
  ADD CONSTRAINT `Repets_ibfk_1` FOREIGN KEY (`idRusers`) REFERENCES `Rusers` (`idRusers`),
  ADD CONSTRAINT `Repets_ibfk_2` FOREIGN KEY (`idRpets`) REFERENCES `Rpets` (`idRpets`),
  ADD CONSTRAINT `Repets_ibfk_3` FOREIGN KEY (`idStrilpets`) REFERENCES `Strilpets` (`idStrilpets`);

--
-- Filtros para la tabla `Rpets`
--
ALTER TABLE `Rpets`
  ADD CONSTRAINT `Rpets_ibfk_1` FOREIGN KEY (`idPets`) REFERENCES `Pets` (`idPets`);

--
-- Filtros para la tabla `Rusers`
--
ALTER TABLE `Rusers`
  ADD CONSTRAINT `Rusers_ibfk_1` FOREIGN KEY (`idTpdoc`) REFERENCES `Tpdoc` (`idTpdoc`),
  ADD CONSTRAINT `Rusers_ibfk_2` FOREIGN KEY (`idCiudad`) REFERENCES `Ciudad` (`idCiudad`),
  ADD CONSTRAINT `Rusers_ibfk_3` FOREIGN KEY (`idRol`) REFERENCES `Rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
