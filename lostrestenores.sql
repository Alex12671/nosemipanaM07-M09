-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2022 a las 08:40:05
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
(7, 'Conan el Cimnerio', 'Sabe, oh príncipe, que entre los años del hundimiento de Atlantis y las resplandecientes ciudades bajo los océanos, y los de la aparición de los hijos de Aryas, hubo una edad olvidada en la que el mundo estaba cubierto de brillantes reinos como mantos azules bajo las estrellas: Nemedia, Ofir, Brithunia, Hiperbórea, Zamora, con sus muchachas de oscuros cabellos y sus torres plagadas de arácnidos misterios, Zingara y sus caballeros, Koth, limítrofe con las tierras pastoriles de Shem, Estigia, con sus tumbas custodiadas por sombras, e Hirkania, cuyos jinetes vestían de acero, seda y oro. Pero el más orgulloso reino del mundo era Aquilonia, que reinaba soberana sobre el soñoliento oeste. Y allí llegó Conan, el cimmerio, el pelo negro, los ojos sombríos, la espada en la mano, un ladrón, un saqueador, un asesino, de gigantescas melancolías y gigantescos pesares, para pisotear con sus sandalias los tronos enjoyados de la Tierra.» Las crónicas nemedias', 'FM', 'ROBERT E. HOWARD', 'Ediciones Minotauro', 466, 'views/img/7-conan.jpg', 47.5, '2022-11-17', 100, 0, 'a'),
(8, 'El nombre del viento.', 'El nombre del viento comienza con un narrador omnisciente que narra el momento \"presente\" en el que Kvothe y Cronista se conocen. Cuando nuestro protagonista comienza su historia, Patrick Rothfuss cambia a la primera persona para que sea la voz del propio Kvothe quien nos cuente su historia.', 'FM', 'Patrick Rothfuss', 'DAW Books', 613, 'views/img/8-el_nombre_de_la_rosa.jpg', 20, '2022-11-17', 100, 0, 'a'),
(9, 'Portadora de tormentas', ' Una vez más, el último emperador de Melniboné se ve obligado a empuñar su Espada Negra arrastrado por la ineludible marea del destino. Pero lo que se halla en juego en esta ocasión no es el destino de las naciones, sino la propia supervivencia de un mundo enfrentado a su Apocalipsis. Portadora de Tormentas es el octavo volumen (primero por creación, en 1965) y el climáx final de la Serie de Elric de Melniboné. La obra de Michael Moorcock ha merecido los premios Nebula, British y World Fantasy, Guardian Ficion y John W. Campbell Memorial en diversas ocasiones. La carrera literaria del autor, prolífica e innovadora desde sus orígenes, ha estado marcada por la controversia y una popularidad siempre creciente, que lo ha situado entre los más importantes escritores ingleses contemporáneos. Entre su obra de fantasía destaca el conjunto de novelas dedicadas al Multiverso, con las que revolucionó el género y consagró la figura del héroe acosado por las fuerzas del destino', 'FM', 'Michael moorcock', 'Martínez Roca ', 203, 'views/img/9-elric-de-melnibone-portadora-de-tormentas-68218.jpg', 27, '2022-11-17', 100, 0, 'a'),
(10, 'La guerra de la independencia.', 'Las memorias de Gabriel Araceli, héroe de la Independencia, nos permiten zambullirnos en los primeros años del siglo XIX y presenciar desde la primera fila uno de los períodos más dramáticos y apasionantes de nuestra historia.', 'B', 'Benito Pérez Galdós', 'Ediciones Destino', 1464, 'views/img/10-Episodios-nacionales.-Primera-seria.jpg', 30, '2022-11-17', 100, 0, 'a'),
(11, 'Los panzers de la muerte', 'Los soldados del Regimento Panzer no. 27 están de retirada. Tienen que participar en el horroroso desescombro después de que las bombas aliadas hayan llovido sobre las ciudades alemanas. Las orugas de los tanques surcan por las estepas de Rusia debajo el garfio helado del invierno en una marcha de la muerte, que no parece tener fin. Miles de desterrados llenan las carreteras. Cazas rusos como carniceros vienen chirriando a baja altura y transforman la corriente de refugiados en un macabro grito hacia el cielo. Sven Hassel fue mandado a un batallón de castigo como soldado raso en el ejercito alemán. Con un realismo cercano y brutal narra las atrocidades de la guerra, los crímenes de los nazis y el humor cínico y tosco de los soldados. Con unas ventas superiores a los 50 millones de ejemplares son los libros de guerra más vendidos en el mundo. ', 'B', 'Sven Hassel', 'Plaza & Janés Editores, S.A', 266, 'views/img/11-Los-panzer-de-la-muerte.jpg', 9.95, '2022-11-17', 100, 0, 'a'),
(12, 'Y mañana saldrá el sol', 'Historia real del sargento de Infantería José De la Iglesia Parras, del Losar de la Vera (Cáceres). Su juventud en su pueblo, en las laderas de la Sierra de Gredos, su participación en la guerra civil española, su alistamiento en la División Azul y su marcha a Alemania, la larga marcha de más de 850 km a pie para aproximarse al frente ruso, los combates de Posseñok, Possad, Otenski, La Intermedia, la Bolsa del Voljov y el Sitio de Leningrado con la cruenta batalla de Krasny Bor; pasan por sus páginas con una crudeza y un realismo que llega a estremecer a pesar del tono distendido que el escritor, hijo del protagonista, ha querido imprimir a la historia. El sacrificio llevado al sumun, el compañerismo como norma de conducta y el sufrimiento y pesar por los caídos sean amigos o enemigos, el recuerdo constante del sol de España que mitiga la terribles temperaturas de combate que llegaron hasta 53ºC bajo cero, marcan una impronta por la que algunos lo han definido como un «libro con alma».', 'B', 'José Antonio de la Iglesia Hernández', 'Librum Tremens', 450, 'views/img/12-y-mañana-saldrá-el-sol.jpg', 20.85, '2022-11-17', 100, 0, 'a'),
(13, 'Por quién doblan las campanas ', 'En 1937, Ernest Hemingway viajó a España para cubrir la Guerra Civil como corresponsal de la North American Newspaper Alliance. Tres años después terminó Por quién doblan las campanas, una historia de amor y muerte que se ha convertido en un clásico, y que sigue siendo una de las mejores y más hermosas novelas bélicas de todos los tiempos. En sus páginas seguimos los pasos de Robert Jordan, un profesor norteamericano que lucha en el bando republicano como voluntario de las Brigadas Internacionales y especialista en explosivos. Cuando el general Golz le encarga la destrucción de un puente, crucial para evitar la contraofensiva de las tropas franquistas durante la batalla de Segovia, descubrirá en la sierra de Guadarrama los peligros de la guerra, pero también una intensa camaradería y el amor por María, una joven que huye del bando sublevado y le devolverá la pasión por la vida.', 'B', 'Ernest Hemingway', 'Editorial Lumen', 560, 'views/img/13-PorQuienDoblanLasCampanas.jpg', 16.05, '2022-11-16', 100, 0, 'a'),
(14, 'Homenaje a Cataluña', '\"Había viajado a España con el proyecto de escribir artículos periodísticos, pero ingresé en la milicia casi de inmediato, porque en esa época y en esa atmósfera parecía ser la única actitud concebible\". Integrante de la delegación del International Labour Party (ILP), al que aun no estaba afiliado, y muy cercano al ideario anarquista, Orwell llegó a Cataluña en plena efervescencia revolucionaria, y, como todos los voluntarios británicos, se sumó a la milicia del POUM (Partido Obrero de Unificación Marxista). Combatió en el frente de Aragón, donde si bien, dirá, \"las verdaderas armas no eran los fusiles, sino los megáfonos\", fue gravemente herido en la garganta y luego será testigo directo y víctima de los trágicos sucesos de mayo de 1937. Al igual que sus compañeros del POUM (cuyo máximo dirigente fue secuestrado y desaparecido, al parecer asesinado por agentes soviéticos), sufrirá la persecución por parte de los estalinistas y se verá obligado a huir de una España a la que había llegado henchido de idealism', 'B', 'George Orwell', 'Tolemsa', 311, 'views/img/14-homenaje-a-cataluna.jpg', 18.9, '2022-11-17', 100, 0, 'a'),
(15, 'Batallón de castigo', '“UNO DE LOS MEJORES ESCRITORES EUROPEOS, POSEE EL SENTIDO DEL SUSPENSE COMO POCOS” STAFFORDSHIRE EVENING STANDARD, INGLATERRAUn comando especial del regimento de castigo vestido con uniformes rusos conquista 4 carros de combate T-34. Esclarecimiento a larga distancia detrás de las lineas rusas en el Caucaso. El año es 1942. Hora tras hora los carros ruedan hacia el Este. Varias veces son invocados por las secciones rusas. Seguimos a los soldados en su lucha desesperada para volver a las lineas alemanas. Las distancias son grandes, los amigos pocos y la muerte siempre pisando los talones. Sven Hassel fue mandado a un batallón de castigo como soldado raso en el ejercito alemán. Con un realismo cercano y brutal narra las atrocidades de la guerra, los crímenes de los nazis y el humor cínico y tosco de los soldados. Con unas ventas superiores a los 50 millones de ejemplares son los libros de guerra más vendidos en el mundo.', 'B', 'Sven Hassel', 'MHAbooks', 267, 'views/img/15-Batallón-de-castigo.jpg', 19.95, '2022-11-17', 100, 0, 'a'),
(16, 'Dune', 'Cuenta la historia de Paul Atreides, un joven brillante que ha nacido con un destino mucho más grande que él mismo, y deberá viajar al planeta más peligroso del universo para asegurar el futuro de su familia y de su gente', 'CF', 'Frank Herbert', 'Chilton Books', 826, 'views/img/16-Dune.jpeg', 11, '2022-11-22', 100, 0, 'a'),
(17, 'El juego de Ender', 'Ender Wiggin es el tercero de tres hermanos en una sociedad que sólo permite tener dos y su existencia es tolerada por el Gobierno a cambio de ser reclutado a los seis años en la Escuela de Batalla, una academia donde aprenderá a luchar contra una raza de alienígenas sedientos llamados Insectores.', 'CF', 'Orson Scott Card', 'Tor Books', 376, 'views/img/17-El-juego-de-Ender.jpg', 16, '2022-11-02', 100, 0, 'a'),
(20, 'Old Man\'s War', 'Los colonos deberán competir con las razas alienígenas por los escasos planetas que son adecuados para mantenerse con vida. La guerra lejos de la Tierra es larga, brutal y sangrienta. Para ganar estas guerras contra las fuerzas alienígenas, la Fuerza de Defensa Colonial, recluta seres humanos en edad de jubilarse.\n', 'CF', 'John Scalzi\n', 'Tor Books', 320, 'views/img/20-Old-Man&#039;s-War.jpg', 12, '2017-04-12', 100, 0, 'a'),
(24, '1984', 'Los miembros \"externos\" constituyen la burocracia del aparato estatal (de ahí la necesidad de la estricta vigilancia), viven sometidos a un control asfixiante y a una propaganda alienante que los desmoraliza y les impide pensar críticamente. El estado suprime todo derecho y condena a una existencia poco más que miserable, con riesgo de perder la vida o sufrir vejámenes espantosos, a aquellos que no demostrasen suficiente fidelidad y adhesión a la causa nacional. Para ello se organizan numerosas manifestaciones, donde se requiere la participación activa de los miembros, gritando las consignas favorables al partido, vociferando contra los supuestos traidores y dando rienda suelta al más desaforado fanatismo. Solo con fervor fanático se puede escapar a la omnipresente vigilancia de la policía del pensamiento.', 'CF', 'George Orwell', 'George Orwell', 326, 'views/img/24-1984.jpg', 16, '2022-11-23', 100, 0, 'a'),
(28, 'Los secretos de los Sith', 'Los muertos hablan! El Emperador Palpatine ha regresado para transmitir sus incomparables conocimientos sobre la facción más peligrosa que ha amenazado jamás a la galaxia: los Sith. Un conciliábulo de guerreros sedientos de poder que han aprendido a utilizar el lado oscuro de la Fuerza, los Sith son los mayores enemigos de los Jedi. En esta cautivadora exploración de la historia y de las habilidades de los Sith, Palpatine revela sus oscuros secretos, desde su asombrosa resurrección, al ascenso al poder de Darth Vader y el entrenamiento de sus acólitos Darth Maul y Conde Dooku. Con impresionantes nuevas ilustraciones y abundantes elementos especiales, entre los que se incluyen un buscarrutas Sith troquelado, páginas desplegables, solapas interactivas y un póster. Los secretos de los Sith es una apasionante travesía hacia el lado oscuro.', 'CF', 'AAVV', 'Planeta Comic', 40, 'views/img/28-Starwars.jpg', 10, '2022-11-21', 100, 0, 'a'),
(29, 'I, Robot', 'En el año 2035, los robots son unos dispositivos que usamos todos los días y en quienes confiamos, excepto un detective paranoico, investigando lo que solo él cree que es un crimen perpetrado por un robot. El caso lo lleva a descubrir algo aún peor que amenaza la raza humana.', 'CF', 'Isaac Asimov', 'Gnome Press', 253, 'views/img/29-I,-robot.jpg', 11, '2022-11-21', 100, 0, 'a'),
(30, 'H.P. Lovecraft obra completa', ' En esta edición anotada de sus relatos y poemas, Kevin J. Hayes rompe el mito de Poe, al tiempo que permite descubrir su verdadera carrera literaria y sus logros en este campo. Con ilustraciones y fotografías a todo color, E. A. Poe anotado ofrece cientos de notas críticas que abundan en las fuentes de Poe, en las palabras y pasajes oscuros de sus relatos, así como en alusiones literarias, biográficas e históricas, dando cabida a la opinión de numerosos expertos y críticos. Asimismo, William Giraldi, en su prólogo, ofrece una enérgica introducción al escritor de obras maestras tan imborrables como \"La caída de la Casa Usher\", \"Los asesinatos de la rue Morgue\" y \"El gato negro\".', 'T', 'H.P. LOVECRAFT', 'Edimat Libros', 1472, 'views/img/30-ChtuluCompletas.jpg', 33.2, '2022-11-16', 100, 0, 'a'),
(31, 'Hellraiser: El corazón condenado', 'Desde sus Libros de Sangre, El Juego de las Maldi-ciones, Sortilegio y El Gran Espectáculo Secreto, a las decenas de historias cortas que ha escrito, junto con libros que han ocupado los primeros puestos de las listas de ventas (algunos de ellos convertidos ya en películas), nadie más se ha acercado a la vívida impresión y terrores únicos que él nos proporciona. Hellraiser es una de sus mejores creaciones, una novela desgarradora sobre el corazón humano y todos los grandes terrores y éxtasis que alberga en su reino infinito. Habla de la codicia y el amor, de la falta de amor y la desesperación, del deseo y la muerte, de la vida y el cautiverio, de campanas y sangre. Es una de las historias más aterradoras que hayas leído jamás.', 'T', 'Clive Baker', 'La factoría de ideas', 217, 'views/img/31-Hellraiser.jpg', 16.05, '2022-11-18', 100, 0, 'a'),
(32, 'It', ' ¿Quién o qué mutila y mata a los niños de un pequeño pueblo norteamericano? ¿Por qué llega cíclicamente el horror a Derry en forma de un payaso siniestro que va sembrando la destrucción a su paso? Esto es lo que se proponen averiguar los protagonistas de esta novela. Tras veintisiete años de tranquilidad y lejanía, una antigua promesa infantil les hace volver al lugar en el que vivieron su infancia y juventud como una terrible pesadilla. Regresan a Derry para enfrentarse con su pasado y enterrar definitivamente la amenaza que los amargó durante su niñez. Saben que pueden morir, pero son conscientes de que no conocerán la paz hasta que aquella cosa sea destruida para siempre. It es una de las novelas más ambiciosas de Stephen King, con la que ha logrado perfeccionar de un modo muy personal las claves del género de terror.', 'T', 'Stephen King', 'Debolsillo', 1504, 'views/img/32-it.jpg', 14.2, '2022-11-14', 100, 0, 'a'),
(33, 'Libros de sangre', 'Clive Barker nació en Liverpool en 1952 y estudió inglés y filosofía antes de convertirse a los treinta y tres añosen el gran renovador de la ficción de terror con la publicación de una serie de relatos agrupados en varios volúmenesbajo el título genérico de LIBROS DE SANGRE. Aparte de su dedicación al género, Barker también ha sidoy es un prolífico artista gráfico e ilustrador, además de director de cine y autor teatralhabitual de la escena independiente londinense. Clive Barker contribuyó con sus primeros relatosa la evolución del género de horror al introducir el sexo y la violencia de un modo gráfico y brutal, recreándoseen la descripción de los horrores más tortuosos, físicos y viscerales, reforzando así en buena medidael arsenal literario del cuento de miedo.Este volumen reúne las mejores historias cortas de Clive Barker, fruto de dieciocho meses de trabajo nocturno, ya que por el díaBarker se dedicaba a escribir obras de teatro. Relatos como El Tren de Carne de Medianoche, una historiaenraizada en la', 'T', 'Clive Baker', 'Valdemar', 704, 'views/img/33-libros_de_sangre.jpg', 30.4, '2022-11-15', 100, 0, 'a'),
(34, 'La llamada de Chtulhu', 'H. P. Lovecraft ha pasado a la historia de la literatura como uno de los grandes innovadores del relato fantástico y de terror del siglo XX. Niño prodigio empezó a leer y escribir su primer cuento a muy temprana edad. Ya en la adolescencia era de solitar', 'T', ' H.P. Lovecraft', 'ALMA EUROPA', 96, 'views/img/34-Cthulhu.jpg', 7.55, '2022-11-21', 100, 0, 'a'),
(35, 'Edgar Allan Poe. Edicion anotada', ' En esta edición anotada de sus relatos y poemas, Kevin J. Hayes rompe el mito de Poe, al tiempo que permite descubrir su verdadera carrera literaria y sus logros en este campo. Con ilustraciones y fotografías a todo color, E. A. Poe anotado ofrece cientos de notas críticas que abundan en las fuentes de Poe, en las palabras y pasajes oscuros de sus relatos, así como en alusiones literarias, biográficas e históricas, dando cabida a la opinión de numerosos expertos y críticos. Asimismo, William Giraldi, en su prólogo, ofrece una enérgica introducción al escritor de obras maestras tan imborrables como \"La caída de la Casa Usher\", \"Los asesinatos de la rue Morgue\" y \"El gato negro\".', 'T', 'Edgar Allan Poe', 'Akal', 552, 'views/img/35-Poe.jpg', 52.25, '2022-11-22', 100, 0, 'a'),
(36, 'Drácula', 'Jonathan Harker viaja a Transilvania para cerrar un negocio inmobiliario con un misterioso conde que acaba de comprar varias propiedades en Londres. Despues de un viaje plagado de ominosas señales, Harker es recogido en el paso de Borgo por un siniestro carruaje que lo llevará, acunado por el canto de los lobos, a un castillo en ruinas. Tal es el inquietante principio de una novela magistral que alumbró uno de los mitos más populares y poderosos de todos los tiempos: Drácula.', 'T', 'Bram Stoker', 'Penguin clásicos', 496, 'views/img/36-Dracula.jpg', 12.3, '2022-11-22', 100, 0, 'a'),
(37, 'Yo, Claudio', 'Las obras de Tácido, Plutarco y Suetonio sirvieron de base a Robert Graves para escribir una de las novelas históricas más famosas y apreciadas de todos los tiempos. Presentado como una autobiografía del propio Tiberio Cladio, esta obra recrea los tiempos de la dinastía Julio-Claudia y el imperio romano desde el asesinato de Julio César (44 a.C) hasta el de Calígula (41 a.C.), en lo que se convierte en un implacable retrato de la grandeza, la crueldad y la depravación de los mandatarios de la Roma imperial.Sin embargo, más allá de los acontecimientos, Gaves propone una muy sólida reflexión acerca del conflicto entre la libertad republicana (encarnada por Augusto y el joven Claudio) y el orden y la estabilidad imperiales (defendido por Livia) que no ha perdido ni un ápice de su vigencia.La celebérrima y modélica serie de televisión protagonizada por actores procedentes del teatro shakespeareano (Derek Jacobi, John Hurt, etc.) convirtió ya en los años setenta las dos novelas Yo, Claudio y Claudio el dios y su e', 'NH', 'Robert Graves', 'Edhasa', 640, 'views/img/37-yo_claudio_grande.jfif', 26.6, '2022-11-16', 100, 0, 'a'),
(38, 'El nombre de la rosa', 'Valiéndose de las características de la novela gótica, la crónica medieval y la novela policíaca,El nombre de la rosa narra las investigaciones detectivescas que realiza el fraile franciscano Guillermo de Baskerville para esclarecer los crímenes cometidos en una abadía benedictina en el año 1327. Le ayudará en su labor el novicio Adso, un joven que se enfrenta por primera vez a las realidades de la vida situadas más allá de las puertas del convento. En esta primera y brillante incursión de Umberto Eco en el mundo de la narrativa, que dio lugar a una manera de concebir la novela histórica, el lector disfrutará de una trama apasionante y una admirable reconstrucción de una época especialmente conflictiva de la historia de Occidente.', 'NH', 'Umberto Eco', 'Debolsillo', 784, 'views/img/38-el_nombre_de_la_rosa.jpg', 11.35, '2022-11-29', 100, 0, 'a'),
(39, 'El Hereje', 'El hereje \" (1998) es la última novela que escribió Miguel Delibes (1920-2010), sin duda uno de los más importantes y populares escritores españoles del último siglo. La novela, ambientada en el siglo XVI en Valladolid, tuvo un éxito sin precedentes y mereció el Premio Nacional de Literatura, entre otros reconocimientos. Se ha dicho que esta obra sintetiza mejor que ninguna otra las preocupaciones de Delibes: el mundo de la infancia, la realidad de los más desvalidos, la inquietud del cristiano posconciliar, la rectitud personal, la soledad del individuo en medio de los convencionalismos, la muerte como perspectiva inevitable. La obra ha sido leída como una defensa de la memoria histórica y un admirable canto en favor de la cultura representada en la difusión bibliográfica de las ideas. Como afirmó el propio Delibes, \" El hereje \" \" representa un alegato a la libertad y, sobre todo, a la libertad de pensamiento, que es la primera y más eminente de todas las libertades. Una denuncia contra la intolerancia entr', 'NH', 'Miguel Delibes', 'Cátedra', 552, 'views/img/39-hereje.jpg', 18.95, '2022-11-21', 100, 0, 'a'),
(41, 'La gran aventura del reino de Asturias', 'El nacimiento del reino de Asturias bajo la España musulmana fue una empresa titánica de resistencia y supervivencia. Una de las aventuras más fascinantes no sólo de la Historia de España, sino de la historia universal. Aunque resulta inconcebible que un puñado de rebeldes cristianos consiguiera formar en el norte de la Península un reino independiente frente al mayor poder de su tiempo y, después, extenderlo hacia el sur en una tenaz labor de repoblación, eso es lo que ocurrió en torno a Covadonga, entre Asturias y Cantabria, a partir del año 722. ¿Cómo fue posible semejante proeza? ¿Quiénes fueron sus autores? ¿Cómo se llamaban los heroicos pioneros que empezaron a ganar tierras hacia el sur, gracias a sus azadas más que a sus espadas?', 'NH', 'José Javier Esparza', 'La esfera de los libros1', 512, 'views/img/41-Asturias.jpg', 11.3, '2022-11-21', 100, 0, 'a'),
(42, 'Todo Alatriste', 'Todo Alatriste reúne por primera vez en un solo volumen las siete novelas que componen la serie:El capitán Alatriste,Limpieza de sangre,El sol de Breda,El oro del rey,El caballero del jubón amarillo,Corsarios de Levante yEl puente de los Asesinos. Incluye, además, un prólogo del autor sobre la trayectoria del personaje, una introducción del catedrático español Alberto Montaner, y la biografía del capitán Alatriste. Con esta edición especial, firmada por su autor, Alfaguara rinde homenaje al que es, sin duda, el gran personaje de la literatura contemporánea en español.', 'NH', 'Arturo Pérez Reverte', 'Alfaguara', 1792, 'views/img/42-Alatriste.jpg', 28.4, '2022-11-15', 100, 0, 'a'),
(43, 'Cielo Rojo Aguilas azules', 'Julio de 1941. El comandante Ángel Salas Larrazábal, al frente deuna selecta expedición conformada por algo más de un centenarde hombres, entre pilotos de caza, mecánicos, armeros y otros empleosdel Ejército del Aire español, parte desde Madrid, rumbo aAlemania, para engrosar las filas de la Luftwaffe.Cielo rojo, águilas azules no es un manual de Historia, más bienpuede catalogarse como un ensayo novelado, pues el exhaustivotrabajo de documentación aflora con nitidez en cada uno de sus capítulos.A través de un personaje ficticio, el teniente Carlos Guillén,piloto de caza veterano de la Guerra Civil española, el lector acompañará,día a día, a los hombres del comandante Salas, aguerridopiloto de la Primera Escuadrilla Azul y as de la aviación nacional,a través de su intrincado periplo por Alemania y la Unión Soviética.Guillén aunará y será el hilo conductor de las vivencias de todos lospersonajes reales que nutren esta obra para que el lector sea unomás de aquel excepcional contingente relegado a un lugar secun', 'NH', 'Daniel Ortega', 'Actas', 660, 'views/img/43-aguilas_azules.jpg', 34.2, '2022-11-22', 100, 0, 'a'),
(44, 'Guerra y paz', 'Obra monumental y relato épico de cinco familias aristocráticas durante la invasión napoleónica de 1812, considerada obra cumbre de Tolstói junto con Ana Karenina. Guerra y paz se publicó entre los años 1865 y 1869. A lo largo de sus centenares de páginas, Tolstói nos cuenta el relato épico de cinco familias rusas durante la invasión napoleónica. Obra monumental, que incluye a más de quinientos personajes históricos y de ficción,Guerra y paz alterna en su magnífica trama historias familiares con las vicisitudes del ejército napoleónico, la vida en la corte de Alejandro y las batallas de Austerlitz y Borodinó. Como ya advirtió Isaiah Berlin, «nadie ha superado nunca a Tolstói en la expresión del sabor específico, la calidad precisa de un sentimiento, la amplitud de su \"oscilación\". Nadie ha superado su manera de describir la estructura de una situación determinada en todo un período, pasajes ininterrumpidos de la vida de individuos, familias, comunidades, naciones enteras».Guerra y paz, un clásico de la litera', 'NH', 'León Tolstoi', 'Planeta', 1840, 'views/img/44-guerra_y_paz.jpg', 17.05, '2022-11-23', 100, 0, 'a'),
(45, 'Esperando al diluvio', 'Un salvaje asesino en serie. Una búsqueda hasta el último latido. Una ciudad amenazada por un diluvio. Entre los años 1968 y 1969, el asesino al que la prensa bautizaría como John Biblia mató a tres mujeres en Glasgow. Nunca fue identificado y el caso todavía sigue abierto hoy en día. En esta novela, a principios de los años ochenta, el investigador de policía escocés Noah Scott Sherrington logra llegar hasta John Biblia, pero un fallo en su corazón en el último momento le impide arrestarlo. A pesar de su frágil estado de salud, y contra los consejos médicos y la negativa de sus superiores para que continúe con la persecución del asesino en serie, Noah sigue una corazonada que lo llevará hasta el Bilbao de 1983. Justo unos días antes de que un verdadero diluvio arrase la ciudad.', 'NN', 'Dolores Redondo', 'Destino', 576, 'views/img/45-Diluvio.jpg', 21.75, '2022-11-22', 100, 0, 'a'),
(46, 'Delirio', 'Renata tiene una premonición: la visión de un salvaje y cruel asesinato. No reconoce a la víctima pero sí el lugar en donde se va a cometer el crimen: Delirio, un hotel situado en la ciudad de Guanajuato, en México, y que es propiedad de Juanjo, un antiguo amigo y profesor de literatura. Kika, una joven mujer transgénero y la mejor amiga de Renata, llega a Delirio porque necesita esconderse. Huye de su amante, un político influyente. Por eso sabe que ha soltado a los perros para que vayan tras ella; por eso y por la bolsa repleta de billetes con la que llega a Delirio. Y con ese dinero pretende comprarse una nueva vida; pero primero tendrá que conservar la que tiene.Jugándose su reputación e incluso su matrimonio, Renata decide hacer todo lo que sea necesario para evitar el homicidio. El problema es que el destino siempre gana la partida aunque nos enseñe sus cartas. Natalia M. Alcalde debuta con esta apabullante novela negra en la que violencia, crítica social y realismo mágico se mezclan con maestría en un ', 'NN', 'Natalia M. Alcalde', 'Cuadernos del laberinto', 246, 'views/img/46-delirio.jpg', 17.1, '2022-11-15', 100, 0, 'a'),
(47, 'Riccardino', 'Un joven director de una sucursal bancaria de Vigàta es asesinado a quemarropa por un misterioso motociclista, y Salvo Montalbano, cansado ya de crímenes y homicidios, se encarga de resolver el caso en el menor tiempo posible. Pero el destino nunca depara soluciones fáciles: lo que inicialmente parecía un ajuste de cuentas por cuestiones de honor, resulta ser una madeja mucho más difícil de desentrañar. Esbozado entre 2004 y 2005, retomado en 2016 y publicado póstumamente en 2020,Riccardino ha adquirido el valor de testamento literario, un broche magnífico a una historia de casi treinta años en el que Andrea Camilleri demuestra su genialidad al mezclar realidad y ficción, en un sorprendente guiño del escritor siciliano para despedirse de Salvo Montalbano, su inseparable compañero de aventuras.', 'B', 'Andrea Camilleri', 'Salamandra', 256, 'views/img/47-Riccardino.jpg', 17.1, '2022-11-01', 100, 0, 'a'),
(48, 'La bestia', 'Corre el año 1834 y Madrid, una pequeña ciudad que trata de abrirse paso más allá de las murallas que la rodean, sufre una terrible epidemia de cólera. Pero la peste no es lo único que aterroriza a sus habitantes: en los arrabales aparecen cadáveres desmembrados de niñas que nadie reclama. Todos los rumores apuntan a la Bestia, un ser a quien nadie ha visto pero al que todos temen. Cuando la pequeña Clara desaparece, su hermana Lucía, junto con Donoso, un policía tuerto, y Diego, un periodista buscavidas, inician una frenética cuenta atrás para encontrar a la niña con vida. En su camino tropiezan con fray Braulio, un monje guerrillero, y con un misterioso anillo de oro con dos mazas cruzadas que todo el mundo codicia y por el que algunos están dispuestos a matar.', 'NN', 'Carmen Mola', 'Planeta', 544, 'views/img/48-Bestia.jpg', 12.3, '2022-12-01', 100, 0, 'a'),
(49, 'El caso Alaska Sanders', '«Sé lo que has hecho». Este mensaje, encontrado en el bolsillo del pantalón de Alaska Sanders, cuyo cadáver apareció el 3 de abril de 1999 al borde del lago de Mount Pleasant, una pequeña localidad de New Hampshire, es la clave de la nueva y apasionante investigación que, once años después de poner entre rejas a sus presuntos culpables, vuelve a reunir al escritor Marcus Goldman y al sargento Perry Gahalowood. En esta Ocasión contarán con la inestimable ayuda de una joven agente de policía, Lauren Donovan, empeñada en resolver la trama de secretos que se esconde tras el caso. A medida que vayan descubriendo quién era realmente Alaska Sanders, irán resurgiendo también los fantasmas del pasado y, entre ellos, especialmente el de Harry Quebert. Una nueva intriga literariamente adictiva, con la estructura en varios tiempos, las vueltas de tuerca y el ritmo trepidante que son el sello inconfundible de Joël Dicker, «un fenómeno planetario» (Babelia).', 'NN', 'Joel Dicker', 'Alfaguara', 592, 'views/img/49-AlaskaSanders.jpg', 22.7, '2022-11-02', 100, 0, 'a'),
(50, 'El libro del sepulturero', 'En el Prater, el parque más importante de la ciudad, aparece el cuerpo de una criada asesinada de forma brutal. Leopold von Herzfeldt, un joven inspector de policía, será el encargado del caso, a pesar de no contar con el favor de sus colegas, que no quieren saber nada de sus novedosos métodos de investigación, como la inspección de la escena del crimen, la obtención de pruebas o la toma de fotografías. Leopold contará con el apoyo de dos personajes del todo dispares: Augustin Rothmayer, el sepulturero mayor del cementerio central de Viena; y Julia Wolf, una joven operadora de la recién inaugurada central telefónica de la ciudad y con un secreto que no quiere que salga a la luz. Leopold, Augustin y Julia se verán inmersos en los profundos abismos ocultos tras las puertas de la glamurosa ciudad en una carrera para dar con un asesino despiadado que sembrará Viena de cadáveres inocentes.', 'NN', 'Oliver Potzsch', 'Planeta', 528, 'views/img/50-Sepulturero.jpg', 20.8, '2022-11-29', 100, 0, 'a'),
(51, 'Personas decentes', 'La Habana, 2016. Un acontecimiento histórico sacude Cuba: la visita de Barack Obama en lo que se ha llamado el «Deshielo cubano»—la primera visita oficial de un presidente estadounidense desde 1928—, acompañada de eventos como un concierto de los Rolling Stones y un desfile de Chanel, ponen patas arriba el ritmo de la isla. Por eso, cuando un exdirigente del Gobierno cubano aparece asesinado en su apartamento, la policía, desbordada por la visita presidencial, recurre a Mario Conde para que eche una mano en la investigación. Conde descubrirá que el muerto tenía muchos enemigos, pues en el pasado había ejercido de censor para que los artistas no se desviaran de las consignas de la Revolución, y que había sido un hombre déspota y cruel que había acabado con la carrera de muchos artistas que no habían querido plegarse a sus extorsiones. Cuando unos días después se encuentra un segundo cadáver asesinado con el mismo método, Conde deberá descubrir si las dos muertes están relacionadas y qué hay detrás de estos ase', 'B', 'Leonardo Padura', 'Tusquet Editores', 448, 'views/img/51-personas.jpg', 21.75, '2022-11-23', 100, 0, 'a');

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
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
