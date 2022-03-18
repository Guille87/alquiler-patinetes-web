-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2022 a las 12:19:12
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Base de datos: `muevete`
--

CREATE DATABASE IF NOT EXISTS muevete;
use muevete;

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `codcontacto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `mensaje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codpro` int(11) NOT NULL,
  `nombreprod` varchar(50) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codpro`, `nombreprod`, `descripcion`, `stock`, `imagen`) VALUES
(1, 'Xiaomi Mi Electric Scooter Essential', 'Patinete eléctrico motorizado, velocidad máxima de hasta 20km/h,\r\nbatería de larga duración de hasta 20km, plegado rápido, panel multifuncional y cuerpo de aluminio aeroespacial,\r\nE-ABS+ frenos de disco', 10, 'xiaomi-essential.png'),
(2, 'Xiaomi Mi Electric Scooter 1S', 'Patinete sólido, de calidad y con buenos materiales, peso de 12,7kg,\r\nvelocidad máxima de 25km/h, duración de la batería de 30km, su manillar está pensado para usuarios altos', 10, 'xiaomi-1s.png'),
(3, 'Cecotec Bongo Serie S Unlimited', 'Patinete con una velocidad de hasta 25km/h, una autonomía de hasta 45km, \r\ntiene un gran motor de 350W nominal y 750W de máxima que otorga una fuerza asombrosa, tiene todo el pack completo\r\npara ser considerado el mejor patinete eléctrico', 10, 'cecotec-bongo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `codreserva` int(11) NOT NULL,
  `codpro` int(11) NOT NULL,
  `codusu` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tiempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiemporeserva`
--

CREATE TABLE `tiemporeserva` (
  `codtiempo` int(11) NOT NULL,
  `tiempo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiemporeserva`
--

INSERT INTO `tiemporeserva` (`codtiempo`, `tiempo`) VALUES
(1, '1 hora'),
(2, '1 día'),
(3, '1 semana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codusu` int(11) NOT NULL,
  `nomusu` varchar(50) NOT NULL,
  `passusu` varchar(255) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codusu`, `nomusu`, `passusu`, `dni`, `email`) VALUES
(41, 'admin', '$2y$10$2FCNZC8L3LByPyVPHeFKbOkd.p4llJ0iNOONoE31ChofpCVGynbwG', '53308506A', 'admin@gmail.com'),
(42, 'test', '$2y$10$d50ErJSMccZgQgw8u/VeQusgRVsuxqplr.vdTnDahbGp255KRfVHe', '53308506A', 'correo@example.com'),
(46, 'guillermo', '$2y$10$lS3ftSFKI07XCaEt9KnOCO4KIhTbhZQ.viVU/ee3pvicp/9otYP1O', '53308506A', 'guillermo@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`codcontacto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codpro`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`codreserva`),
  ADD KEY `Reserva_Producto` (`codpro`),
  ADD KEY `Reserva_Usuario` (`codusu`),
  ADD KEY `Reserva_Tiempo` (`tiempo`);

--
-- Indices de la tabla `tiemporeserva`
--
ALTER TABLE `tiemporeserva`
  ADD PRIMARY KEY (`codtiempo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codusu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `codcontacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `codreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `tiemporeserva`
--
ALTER TABLE `tiemporeserva`
  MODIFY `codtiempo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `Reserva_Producto` FOREIGN KEY (`codpro`) REFERENCES `producto` (`codpro`),
  ADD CONSTRAINT `Reserva_Tiempo` FOREIGN KEY (`tiempo`) REFERENCES `tiemporeserva` (`codtiempo`),
  ADD CONSTRAINT `Reserva_Usuario` FOREIGN KEY (`codusu`) REFERENCES `usuario` (`codusu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
