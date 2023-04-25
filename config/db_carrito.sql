-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-05-2022 a las 20:30:39
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminId` int NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(32) NOT NULL,
  `level` tinyint NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPassword`, `level`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brandId` int NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(2, 'SAMSUNG'),
(3, 'HP'),
(4, 'APPLE'),
(5, 'ACER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cartId` int NOT NULL AUTO_INCREMENT,
  `sId` varchar(255) NOT NULL,
  `productId` int NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catId` int NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Mobile Phones'),
(10, 'TV &amp; Monitor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_compare`
--

DROP TABLE IF EXISTS `tbl_compare`;
CREATE TABLE IF NOT EXISTS `tbl_compare` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cmrId` int NOT NULL,
  `productId` int NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(2, 'Carlos', 'Calle los perros', 'MEX', 'Serca', '831454', '665888456', 'user@user.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Pepe', 'Shibuya Crossing', 'Tokyo', 'Japon', '68166', '22548844664', 'pepe@pepe.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cmrId` int NOT NULL,
  `productId` int NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(37, 2, 19, 'LED Monitor K202HQL', 1, 2788.78, 'uploads/b85386895e.jpg', '2022-05-06 16:49:58', 3),
(38, 2, 18, 'Apple iPhone 13 (128 GB) - Azul Medianoche ', 1, 20899.00, 'uploads/b74c3b2c1f.jpg', '2022-05-06 16:49:59', 3),
(39, 2, 13, 'HP Desktop 21-b0013la', 1, 11999.99, 'uploads/75edc9abe0.jpg', '2022-05-06 16:56:04', 3),
(40, 2, 16, 'Aspire 5 A515-56-36UT Slim Laptop', 1, 10925.68, 'uploads/42e8ac5898.jpg', '2022-05-06 17:00:53', 3),
(41, 2, 18, 'Apple iPhone 13 (128 GB) - Azul Medianoche ', 1, 20899.00, 'uploads/b74c3b2c1f.jpg', '2022-05-07 16:23:44', 1),
(42, 2, 19, 'LED Monitor K202HQL', 2, 5577.56, 'uploads/b85386895e.jpg', '2022-05-07 23:50:13', 2),
(43, 2, 18, 'Apple iPhone 13 (128 GB) - Azul Medianoche ', 1, 20899.00, 'uploads/b74c3b2c1f.jpg', '2022-05-07 23:50:13', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `productId` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `catId` int NOT NULL,
  `brandId` int NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(5, 'Samsung Galaxy S21 FE 128GB 6GB RAM', 3, 2, '<p><span class=\"a-list-item\"> Nombre del sistema operativo: Android 11 </span></p>\r\n<p><span class=\"a-list-item\"> Tama&ntilde;o de la pantalla: 6.4\" </span></p>\r\n<p><span class=\"a-list-item\"> Capacidad: 128GB 6GB RAM </span></p>\r\n<p><span class=\"a-list-item\"> C&aacute;mara frontal: 32MP </span></p>\r\n<p><span class=\"a-list-item\"> Resoluci&oacute;n de las c&aacute;maras traseras: 12MP+8MP+12MP </span></p>\r\n<p><span class=\"a-list-item\"> Bater&iacute;a: 4.500 mAh </span></p>\r\n<p><span class=\"a-list-item\"> Dimensiones: 155,7 x 74,5 x 7,9 mm 177 g </span></p>', 12999.00, 'uploads/f4ea4e55b0.jpg', 1),
(13, 'HP Desktop 21-b0013la', 1, 3, '<p>[WINDOWS 10] Haz grandes cosas con confianza y la sensaci&oacute;n de un entorno familiar como Windows, solo que mejor.</p>\r\n<p>[PROCESADOR DE DOS NUCLEOS]Intel Celeron La combinaci&oacute;n perfecta de rendimiento, consumo y rentabilidad ayuda a tu dispositivo a funcionar de forma perfecta y confiable, con dos n&uacute;cleos de procesamiento para ocuparse de todas las tareas</p>\r\n<p>[GRAFICOS INTEL UHD 600] Transmite contenido 4K de manera fluida y juega a tus juegos favoritos en 720p sin necesidad de una tarjeta gr&aacute;fica independiente. Con el excelente rendimiento de los gr&aacute;ficos Intel UHD notar&aacute;s la diferencia en todo lo que hagas</p>\r\n<p>[ALMACENAMIENTO EN DISCO DURO]No te preocupes si creces tu colecci&oacute;n digital de pel&iacute;culas, canciones y fotos. Con grandes opciones de almacenamiento, puedes guardar todo y tener much&iacute;simo espacio de sobra</p>\r\n<p>[PANTALLA Full HD] Si&eacute;ntate y disfruta de im&aacute;genes de gran nitidez con la calidad que brindan 2 millones de p&iacute;xeles. La resoluci&oacute;n de 1920 x 1080 ofrece una nueva dimensi&oacute;n a todo tu contenido digital.</p>', 11999.99, 'uploads/75edc9abe0.jpg', 1),
(16, 'Aspire 5 A515-56-36UT Slim Laptop', 2, 5, '<p style=\"text-align: left;\"><span class=\"a-list-item\"> Potente productividad: el procesador Intel Core i3-1115G4 de 11&ordf; generaci&oacute;n ofrece una velocidad e inteligencia inigualables, lo que permite impresionantes experiencias de creaci&oacute;n, productividad y juego. Con la tecnolog&iacute;a Turbo Boost, obt&eacute;n hasta 4.1 GHz para tus aplicaciones de alta demanda.</span></p>\r\n<p style=\"text-align: left;\"><span class=\"a-list-item\"> Visiblemente impresionante: experimenta detalles n&iacute;tidos y colores n&iacute;tidos en la pantalla Full HD de 15.6 pulgadas con 82.58% pantalla a cuerpo, relaci&oacute;n de aspecto 16:9 y biseles estrechos.</span></p>\r\n<p style=\"text-align: left;\"><span class=\"a-list-item\"> Escritura ergon&oacute;mica: la bisagra de dise&ntilde;o ergon&oacute;mico levanta el teclado para una escritura c&oacute;moda, refrigeraci&oacute;n mejorada y una mejor experiencia de sonido </span></p>\r\n<p style=\"text-align: left;\"><span class=\"a-list-item\"> Especificaciones internas: memoria DDR4 de 4 GB (1 ranura disponible); almacenamiento de unidad de estado s&oacute;lido NVMe de 128 GB (1 bah&iacute;a de disco duro disponible) para almacenar tus archivos y medios </span></p>\r\n<p style=\"text-align: left;\"><span class=\"a-list-item\"> Acer La tecnolog&iacute;a Purified.Voice cuenta con un procesamiento de se&ntilde;al digital mejorado para cancelar el ruido de fondo, mejorar la precisi&oacute;n del habla y la recogida de campo lejano, lo que no solo hace que las llamadas sean m&aacute;s claras, sino que hace que hablar con Alexa sea m&aacute;s f&aacute;cil que antes. </span></p>\r\n<p style=\"text-align: left;\"><span class=\"a-list-item\"> Usar Alexa en tu PC es tan f&aacute;cil como hacer una pregunta. Solo tienes que preguntar y Alexa puede comprobar tu calendario, crear listas, reproducir m&uacute;sica, responder preguntas, leer las noticias y mucho m&aacute;s. </span></p>\r\n<p style=\"text-align: left;\"><span class=\"a-list-item\"> Sistema operativo seguro: Windows 11 Home (modo S) viene con funciones de seguridad avanzadas integradas correctamente, como protecciones contra phishing y software malicioso para que no tengas que pensarlo dos veces cuando navegas a una nueva p&aacute;gina web o descarga una aplicaci&oacute;n.</span></p>\r\n<p style=\"text-align: left;\"><span class=\"a-list-item\">Puertos para todos tus accesorios: USB 3.2 tipo C, 2 USB 3.2 Gen 1 (1 carga de apagado), USB 2.0, HDMI 2.0 con soporte HDCP, auriculares, altavoz, conector de salida de l&iacute;nea, Ethernet (RJ-45), entrada CC para adaptador de CA.</span></p>\r\n<div class=\"a-expander-content a-expander-extend-content a-expander-content-expanded\">\r\n<p style=\"text-align: left;\"><span class=\"a-list-item\">Contenido de la caja: port&aacute;til Acer Aspire, adaptador de CA, cable de alimentaci&oacute;n.</span></p>\r\n</div>', 10925.68, 'uploads/42e8ac5898.jpg', 1),
(18, 'Apple iPhone 13 (128 GB) - Azul Medianoche ', 3, 4, '<p>Devoluciones: S&oacute;lo productos da&ntilde;ados, inoperantes al primer uso o sin abrir en caja original sellada.</p>\r\n<p>Pantalla Super Retina XDR de 6.1 pulgadas</p>\r\n<p>Modo Cine con baja profundidad de campo y cambios de enfoque autom&aacute;ticos en tus videos</p>\r\n<p>Sistema avanzado de dos c&aacute;maras de 12 MP (gran angular y ultra gran angular) con Estilos Fotogr&aacute;ficos, HDR Inteligente 4, modo Noche y grabaci&oacute;n de video 4K HDR en Dolby Vision</p>\r\n<p>C&aacute;mara frontal TrueDepth de 12 MP con modo Noche y grabaci&oacute;n de video 4K HDR en Dolby Vision</p>\r\n<p>Chip A15 Bionic para un rendimiento fuera de serie</p>\r\n<p>Hasta 19 horas de reproducci&oacute;n de video</p>\r\n<p>Dise&ntilde;o resistente con Ceramic Shield y Resistencia al agua IP68, l&iacute;der en la industria</p>\r\n<p>iOS con nuevas funcionalidades para aprovechar tu iPhone al m&aacute;ximo</p>\r\n<p>Compatibilidad con accesorios MagSafe, que se acoplan f&aacute;cilmente a tu iPhone y permiten una carga inal&aacute;mbrica m&aacute;s r&aacute;pida</p>', 20899.00, 'uploads/b74c3b2c1f.jpg', 1),
(19, 'LED Monitor K202HQL', 10, 5, '<p>Pantalla panor&aacute;mica TN de 19.5 pulgadas (1600 x 900)</p>\r\n<p>Tiempo de respuesta: 5 ms. Brillo: 200 cd/m&sup2;</p>\r\n<p>Paso de p&iacute;xel: 0,27 mm. Voltaje de entrada: 110 V CA, 220 V CA</p>\r\n<p>Entradas de se&ntilde;al: 1 x DVI y 1 x VGA; &aacute;ngulo de visi&oacute;n horizontal: 90&deg; horizontal.65&deg; vertica.</p>', 2788.78, 'uploads/b85386895e.jpg', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
