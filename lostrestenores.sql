-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2022 a las 11:36:16
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

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
  `Calle` varchar(255) NOT NULL,
  `Número` int(4) NOT NULL,
  `CP` int(5) NOT NULL,
  `Piso` varchar(10) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Provincia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `IdGenero` varchar(2) NOT NULL,
  `Nombre` varchar(90) NOT NULL,
  `Activo` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`IdGenero`, `Nombre`, `Activo`) VALUES
('B', 'Bélico', 1),
('CF', 'Ciencia Ficción', 1),
('FM', 'Fantasía medieval', 1),
('GL', 'GILIPOLLASSS', 0),
('JS', 'JOSE', 1),
('NH', 'Novela Histórica', 1),
('NN', 'Novela Negra', 1),
('T', 'Terror', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_pedido`
--

CREATE TABLE `linea_pedido` (
  `IdProducto` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdPedido` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `IdPedido` int(11) NOT NULL,
  `Precio_sin_IVA` float NOT NULL,
  `Precio_IVA` float NOT NULL,
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
  `Genero` varchar(2) NOT NULL,
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
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `Nombre`, `Descripcion`, `Genero`, `Autor`, `Editorial`, `Paginas`, `Imagenlibro`, `Precio`, `Fecha_Entrada`, `Cantidad`, `Liquidacion`, `Activo`) VALUES
(4, 'a', 'a', 'GL', 'a', 'a', 1, 'views/img/4-FW961HMUEAEKxTj.jpg', 1, '2022-11-02', 1, 0, 1);

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
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`IdGenero`);

--
-- Indices de la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  ADD KEY `IdProducto` (`IdProducto`,`IdCliente`,`IdPedido`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdPedido` (`IdPedido`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`IdPedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `Genero` (`Genero`);

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
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  ADD CONSTRAINT `linea_pedido_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`),
  ADD CONSTRAINT `linea_pedido_ibfk_2` FOREIGN KEY (`IdPedido`) REFERENCES `pedidos` (`IdPedido`),
  ADD CONSTRAINT `linea_pedido_ibfk_3` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `Genero` FOREIGN KEY (`Genero`) REFERENCES `generos` (`IdGenero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
