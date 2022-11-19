-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2022 a las 08:46:43
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
  `Calle` varchar(255) NOT NULL,
  `Número` int(4) NOT NULL,
  `CP` int(5) NOT NULL,
  `Piso` varchar(10) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Provincia` varchar(100) NOT NULL,
  `Activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `Password`, `Nombre`, `Apellido1`, `Apellido2`, `DNI`, `Email`, `Telefono`, `Calle`, `Número`, `CP`, `Piso`, `Ciudad`, `Provincia`, `Activo`) VALUES
(1, '12345', 'juan', 'perez', 'perez', '3', 'juan@juan.com', 111111111, 'ezta', 25, 8999, '1', 'una', 'otra', 1),
(2, '827ccb0eea8a706c4c34a16891f84e7b', 'pedro', 'gomez ', 'gomez', '4', 'pedro@pedro', 22222222, 'otra', 1, 8777, '2', 'dos', 'aquella', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `IdGenero` varchar(2) NOT NULL,
  `Nombre` varchar(90) NOT NULL,
  `Activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`IdGenero`, `Nombre`, `Activo`) VALUES
('B', 'Bélico', 1),
('CF', 'Ciencia Ficción', 1),
('FM', 'Fantasía medieval', 1),
('NH', 'Novela Histórica', 1),
('NN', 'Novela Negra', 1),
('T', 'Terror', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_pedido`
--

CREATE TABLE `linea_pedido` (
  `ID_Linea_pedido` int(11) NOT NULL,
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
(3, 'La comunidad del anillo', 'La obra de Tolkien, difundida en millones de ejemplares, traducida a docenas de lenguas... una coherente mitología de una autenticidad universal creada en pleno siglo XX», Le Monde En la adormecida e idílica Comarca, un joven hobbit recibe un encargo: custodiar el Anillo Único y emprender el viaje para su destrucción en la Grieta del Destino. Acompañado por magos, hombres, elfos y enanos, atravesará la Tierra Media y se internará en las sombras de Mordor, perseguido siempre por las huestes de Sauron, el Señor Oscuro, dispuesto a recuperar su creación para establecer el dominio definitivo del Mal. La obra de Tolkien, difundida en millones de ejemplares, traducida a docenas de lenguas... una coherente mitología de una autenticidad universal creada en pleno siglo XX», Le Monde En la adormecida e idílica Comarca, un joven hobbit recibe un encargo: custodiar el Anillo Único y emprender el viaje para su destrucción en la Grieta del Destino. Acompañado por magos, hombres, elfos y enanos, atravesará la Tierra Media y', 'FM', 'J.R.R. Tolkien', 'Minotauro', 576, 'views/img/3-SDLA1.jpg', 10.4, '2022-11-02', 100, 0, 0),
(4, 'Las dos torres', 'Ningún escritor del género ha aprovechado tanto como Tolkien las propiedades características de la Misión, el viaje heróico, el Objeto Numinoso, satisfaciendo nuestro sentido de la realidad histórica y social? Tolkien ha triunfado donde fracasó Milton.» ?W.H. Auden «La invención de los pueblos extraños, incidentes curiosos u hechos maravillosos es en este segundo volumen de la trilogía tan exuberante y convincente como siempre. A medida que avanza la historia, el mundo del Anillo crece en dimensión y misterio, poblado por figuras curiosas, terroríficas, adorables o divertidas. La historia misma es soberbia.» ?The Observer', 'FM', 'J.R.R. Tolkien', 'Minotauro', 408, 'views/img/4-SDLA2.jpg', 10.4, '2022-11-03', 100, 0, 0),
(5, 'Las dos torres', 'Ningún escritor del género ha aprovechado tanto como Tolkien las propiedades características de la Misión, el viaje heróico, el Objeto Numinoso, satisfaciendo nuestro sentido de la realidad histórica y social? Tolkien ha triunfado donde fracasó Milton.» ?W.H. Auden «La invención de los pueblos extraños, incidentes curiosos u hechos maravillosos es en este segundo volumen de la trilogía tan exuberante y convincente como siempre. A medida que avanza la historia, el mundo del Anillo crece en dimensión y misterio, poblado por figuras curiosas, terroríficas, adorables o divertidas. La historia misma es soberbia.» ?The Observer', 'FM', 'J.R.R. Tolkien', 'Minotauro', 408, 'views/img/5-SLDA3.jpg', 10.4, '2022-11-03', 100, 0, 0),
(6, 'a', 'a', 'B', 'a', 'a', 23, 'views/img/-SDLA1.jpg', 23, '2022-12-02', 234, 0, 0);

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
  ADD PRIMARY KEY (`ID_Linea_pedido`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdPedido` (`IdPedido`),
  ADD KEY `IdProducto` (`IdProducto`);

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
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  MODIFY `ID_Linea_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  ADD CONSTRAINT `IdCliente` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`),
  ADD CONSTRAINT `IdPedido` FOREIGN KEY (`IdPedido`) REFERENCES `pedidos` (`IdPedido`),
  ADD CONSTRAINT `IdProducto` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `Genero` FOREIGN KEY (`Genero`) REFERENCES `generos` (`IdGenero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
