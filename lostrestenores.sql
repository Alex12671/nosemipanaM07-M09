-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2022 a las 09:12:06
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

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
(2, '827ccb0eea8a706c4c34a16891f84e7b', 'pedro', 'gomez ', 'gomez', '4', 'pedro@pedro', 22222222, 'otra', 1, 8777, '2', 'dos', 'aquella', 1),
(3, 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'user', 'user', '78978923R', 'user@gmail.com', 123123123, 'user', 32, 12323, '23', 'user', 'user', 1);

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

--
-- Volcado de datos para la tabla `linea_pedido`
--

INSERT INTO `linea_pedido` (`ID_Linea_pedido`, `IdProducto`, `IdCliente`, `IdPedido`, `Cantidad`) VALUES
(3, 3, 3, 3, 3);

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

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`IdPedido`, `Precio_sin_IVA`, `Precio_IVA`, `Estado_Pedido`) VALUES
(3, 100, 123, 'En trámite');

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
  `Activo` enum('a','d') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `Nombre`, `Descripcion`, `Genero`, `Autor`, `Editorial`, `Paginas`, `Imagenlibro`, `Precio`, `Fecha_Entrada`, `Cantidad`, `Liquidacion`, `Activo`) VALUES
(3, 'La comunidad del anillo', 'La obra de Tolkien, difundida en millones de ejemplares, traducida a docenas de lenguas... una coherente mitología de una autenticidad universal creada en pleno siglo XX», Le Monde En la adormecida e idílica Comarca, un joven hobbit recibe un encargo: custodiar el Anillo Único y emprender el viaje para su destrucción en la Grieta del Destino. Acompañado por magos, hombres, elfos y enanos, atravesará la Tierra Media y se internará en las sombras de Mordor, perseguido siempre por las huestes de Sauron, el Señor Oscuro, dispuesto a recuperar su creación para establecer el dominio definitivo del Mal. La obra de Tolkien, difundida en millones de ejemplares, traducida a docenas de lenguas... una coherente mitología de una autenticidad universal creada en pleno siglo XX», Le Monde En la adormecida e idílica Comarca, un joven hobbit recibe un encargo: custodiar el Anillo Único y emprender el viaje para su destrucción en la Grieta del Destino. Acompañado por magos, hombres, elfos y enanos, atravesará la Tierra Media y', 'FM', 'J.R.R. Tolkien', 'Minotauro', 576, 'views/img/3-SDLA1.jpg', 10.4, '2022-11-02', 100, 0, 'a'),
(4, 'Las dos torres', 'Ningún escritor del género ha aprovechado tanto como Tolkien las propiedades características de la Misión, el viaje heróico, el Objeto Numinoso, satisfaciendo nuestro sentido de la realidad histórica y social? Tolkien ha triunfado donde fracasó Milton.» ?W.H. Auden «La invención de los pueblos extraños, incidentes curiosos u hechos maravillosos es en este segundo volumen de la trilogía tan exuberante y convincente como siempre. A medida que avanza la historia, el mundo del Anillo crece en dimensión y misterio, poblado por figuras curiosas, terroríficas, adorables o divertidas. La historia misma es soberbia.» ?The Observer', 'FM', 'J.R.R. Tolkien', 'Minotauro', 408, 'views/img/4-SDLA2.jpg', 10.4, '2022-11-03', 100, 0, 'a'),
(5, 'El retorno del rey', 'La última parte del viaje de Frodo y Sam\nLos ejércitos del Señor Oscuro van extendiendo cada vez más su maléfica sombra por la Tierra Media. Hombres, elfos y enanos unen sus fuerzas para presentar batalla a Sauron y sus huestes. Ajenos a estos preparativos, Frodo y Sam siguen adentrándose en el país de Mordor en su heroico viaje para destruir el Anillo de Poder en las Grietas del Destino.\nLa última parte del viaje de Frodo y Sam\nLos ejércitos del Señor Oscuro van extendiendo cada vez más su maléfica sombra por la Tierra Media. Hombres, elfos y enanos unen sus fuerzas para presentar batalla a Sauron y sus huestes. Ajenos a estos preparativos, Frodo y Sam siguen adentrándose en el país de Mordor en su heroico viaje para destruir el Anillo de Poder en las Grietas del Destino.', 'FM', 'J.R.R. Tolkien', 'Minotauro', 408, 'views/img/5-SLDA3.jpg', 10.4, '2022-11-03', 100, 0, 'a'),
(7, 'Conan el Cimnerio', 'Sabe, oh príncipe, que entre los años del hundimiento de Atlantis y las resplandecientes ciudades bajo los océanos, y los de la aparición de los hijos de Aryas, hubo una edad olvidada en la que el mundo estaba cubierto de brillantes reinos como mantos azules bajo las estrellas: Nemedia, Ofir, Brithunia, Hiperbórea, Zamora, con sus muchachas de oscuros cabellos y sus torres plagadas de arácnidos misterios, Zingara y sus caballeros, Koth, limítrofe con las tierras pastoriles de Shem, Estigia, con sus tumbas custodiadas por sombras, e Hirkania, cuyos jinetes vestían de acero, seda y oro. Pero el más orgulloso reino del mundo era Aquilonia, que reinaba soberana sobre el soñoliento oeste. Y allí llegó Conan, el cimmerio, el pelo negro, los ojos sombríos, la espada en la mano, un ladrón, un saqueador, un asesino, de gigantescas melancolías y gigantescos pesares, para pisotear con sus sandalias los tronos enjoyados de la Tierra.» Las crónicas nemedias', 'FM', 'ROBERT E. HOWARD', 'Ediciones Minotauro', 466, 'views/img/-conan.jpg', 47.5, '2022-11-17', 100, 0, 'a'),
(8, 'El nombre del viento.', 'El nombre del viento comienza con un narrador omnisciente que narra el momento \"presente\" en el que Kvothe y Cronista se conocen. Cuando nuestro protagonista comienza su historia, Patrick Rothfuss cambia a la primera persona para que sea la voz del propio Kvothe quien nos cuente su historia.', 'FM', 'Patrick Rothfuss', 'DAW Books', 613, 'views/img/-51TOF2gV8fL._SX327_BO1,204,203,200_.jpg', 20, '2022-11-17', 100, 0, 'a'),
(9, 'Portadora de tormentas', ' Una vez más, el último emperador de Melniboné se ve obligado a empuñar su Espada Negra arrastrado por la ineludible marea del destino. Pero lo que se halla en juego en esta ocasión no es el destino de las naciones, sino la propia supervivencia de un mundo enfrentado a su Apocalipsis. Portadora de Tormentas es el octavo volumen (primero por creación, en 1965) y el climáx final de la Serie de Elric de Melniboné. La obra de Michael Moorcock ha merecido los premios Nebula, British y World Fantasy, Guardian Ficion y John W. Campbell Memorial en diversas ocasiones. La carrera literaria del autor, prolífica e innovadora desde sus orígenes, ha estado marcada por la controversia y una popularidad siempre creciente, que lo ha situado entre los más importantes escritores ingleses contemporáneos. Entre su obra de fantasía destaca el conjunto de novelas dedicadas al Multiverso, con las que revolucionó el género y consagró la figura del héroe acosado por las fuerzas del destino', 'FM', 'Michael moorcock', 'Martínez Roca ', 203, 'views/img/-elric-de-melnibone-portadora-de-tormentas-68218.jpg', 27, '2022-11-17', 100, 0, 'a'),
(10, 'La guerra de la independencia.', 'Las memorias de Gabriel Araceli, héroe de la Independencia, nos permiten zambullirnos en los primeros años del siglo XIX y presenciar desde la primera fila uno de los períodos más dramáticos y apasionantes de nuestra historia.', 'B', 'Benito Pérez Galdós', 'Ediciones Destino', 1464, 'views/img/-81D6QQ+GICL.jpg', 30, '2022-11-17', 100, 0, 'a'),
(11, 'Los panzers de la muerte', 'Los soldados del Regimento Panzer no. 27 están de retirada. Tienen que participar en el horroroso desescombro después de que las bombas aliadas hayan llovido sobre las ciudades alemanas. Las orugas de los tanques surcan por las estepas de Rusia debajo el garfio helado del invierno en una marcha de la muerte, que no parece tener fin. Miles de desterrados llenan las carreteras. Cazas rusos como carniceros vienen chirriando a baja altura y transforman la corriente de refugiados en un macabro grito hacia el cielo. Sven Hassel fue mandado a un batallón de castigo como soldado raso en el ejercito alemán. Con un realismo cercano y brutal narra las atrocidades de la guerra, los crímenes de los nazis y el humor cínico y tosco de los soldados. Con unas ventas superiores a los 50 millones de ejemplares son los libros de guerra más vendidos en el mundo. ', 'B', 'Sven Hassel', 'Plaza & Janés Editores, S.A', 266, 'views/img/11-Los_panzer_de_la_muerte.jpg', 9.95, '2022-11-17', 100, 0, 'a'),
(12, 'Y mañana saldrá el sol', 'Historia real del sargento de Infantería José De la Iglesia Parras, del Losar de la Vera (Cáceres). Su juventud en su pueblo, en las laderas de la Sierra de Gredos, su participación en la guerra civil española, su alistamiento en la División Azul y su marcha a Alemania, la larga marcha de más de 850 km a pie para aproximarse al frente ruso, los combates de Posseñok, Possad, Otenski, La Intermedia, la Bolsa del Voljov y el Sitio de Leningrado con la cruenta batalla de Krasny Bor; pasan por sus páginas con una crudeza y un realismo que llega a estremecer a pesar del tono distendido que el escritor, hijo del protagonista, ha querido imprimir a la historia. El sacrificio llevado al sumun, el compañerismo como norma de conducta y el sufrimiento y pesar por los caídos sean amigos o enemigos, el recuerdo constante del sol de España que mitiga la terribles temperaturas de combate que llegaron hasta 53ºC bajo cero, marcan una impronta por la que algunos lo han definido como un «libro con alma».', 'B', 'José Antonio de la Iglesia Hernández', 'Librum Tremens', 450, 'views/img/-y mañana saldrá el sol.jpg', 20.85, '2022-11-17', 100, 0, 'a');

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
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  MODIFY `ID_Linea_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
