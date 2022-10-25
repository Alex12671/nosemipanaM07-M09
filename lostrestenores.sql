-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2022 a las 10:20:17
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lostrestenores`
--
CREATE DATABASE IF NOT EXISTS `lostrestenores` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lostrestenores`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `IdAdmin` int(11) NOT NULL,
  `Nombre` varchar(90) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`IdAdmin`, `Nombre`, `Email`, `Password`) VALUES
(1, 'admin', 'admin@mail.es', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Nombre` varchar(90) NOT NULL,
  `Apellido1` varchar(90) NOT NULL,
  `Apellido2` varchar(90) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `IdGenero` varchar(2) NOT NULL,
  `Nombre` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`IdGenero`, `Nombre`) VALUES
('T', 'Terror'),
('CF', 'Ciencia Ficción'),
('FM', 'Fantasía medieval'),
('NN', 'Novela Negra'),
('NH', 'Novela Histórica'),
('B', 'Bélico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `IdPedido` int(11) NOT NULL,
  `Precio_sin_IVA` float NOT NULL,
  `Precio_IVA` float NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `Estado_Pedido` enum('Pendiente','En trámite','Enviado','Entregado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `Nombre` varchar(90) NOT NULL,
  `Descripcion` varchar(1024) NOT NULL,
  `Autor` varchar(90) NOT NULL,
  `Editorial` varchar(255) NOT NULL,
  `Paginas` int(4) NOT NULL,
  `Imagenlibro` varchar(90) NOT NULL,
  `Precio` float NOT NULL,
  `Fecha_Entrada` date NOT NULL,
  `Cantidad` int(3) NOT NULL,
  `Liquidacion` tinyint(1) NOT NULL DEFAULT 0,
  `Activo` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IdAdmin`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`IdPedido`),
  ADD KEY `IdCliente` (`IdCliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `IdAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IDCliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
