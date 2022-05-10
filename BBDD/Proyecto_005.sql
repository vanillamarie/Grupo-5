-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2022 a las 09:49:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `proyecto_005`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campos`
--

CREATE TABLE `campos` (
  `Id_Parcel` int(11) NOT NULL,
  `Id_User` int(30) NOT NULL,
  `Coordinate_X` double NOT NULL,
  `Coordinate_Y` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `campos`
--

INSERT INTO `campos` (`Id_Parcel`, `Id_User`, `Coordinate_X`, `Coordinate_Y`) VALUES
(1, 1, 39.529019321054754, -0.40647769260929284);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactar`
--

CREATE TABLE `contactar` (
  `Id_petition` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Surnames` varchar(30) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contactar`
--

INSERT INTO `contactar` (`Id_petition`, `Name`, `Surnames`, `Mail`, `Message`) VALUES
(1, 'Nombre', 'De Prueba', 'nombreDePrueba@gmail.com', 'Me gustaría contactar con la empresa para informarme.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `User` varchar(7) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Rol` varchar(5) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Surname` varchar(30) NOT NULL,
  `Mail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`Id`, `User`, `Password`, `Rol`, `Name`, `Surname`, `Mail`) VALUES
(1, 'user', '1234', 'user', 'User', 'Apellido1 Apellido2', 'user@gmail.com'),
(2, 'user', '1234', 'user', 'user', '', 'user@gmail.com'),
(3, 'admin', '1234', 'admin', 'Admin', 'Apellido1 Apellido2', 'admin@gmail.com'),
(4, 'test', '1234', 'user', 'user', '', 'test@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campos`
--
ALTER TABLE `campos`
  ADD PRIMARY KEY (`Id_Parcel`);

--
-- Indices de la tabla `contactar`
--
ALTER TABLE `contactar`
  ADD PRIMARY KEY (`Id_petition`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campos`
--
ALTER TABLE `campos`
  MODIFY `Id_Parcel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contactar`
--
ALTER TABLE `contactar`
  MODIFY `Id_petition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
