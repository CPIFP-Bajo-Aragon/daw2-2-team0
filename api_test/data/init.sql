-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db:3306
-- Tiempo de generación: 22-02-2024 a las 18:29:02
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--
CREATE SCHEMA IF NOT EXISTS mydb;
USE mydb;

--
-- Estructura de tabla para la tabla `aviso`
--

CREATE TABLE `aviso` (
  `id_aviso` int NOT NULL,
  `titulo_aviso` varchar(255) NOT NULL,
  `contenido_aviso` varchar(255) NOT NULL,
  `fecha_creacion_aviso` date NOT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatear`
--

CREATE TABLE `chatear` (
  `id_usuario` int NOT NULL,
  `id_usuario1` int NOT NULL,
  `fecha_chat` datetime NOT NULL,
  `mensaje_chat` varchar(255) DEFAULT NULL,
  `estado_chat` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_documento` int NOT NULL,
  `nombre_documento` varchar(45) NOT NULL,
  `descripcion_documento` varchar(45) DEFAULT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL,
  `fecha_subida` date DEFAULT NULL,
  `ruta_archivo` varchar(45) DEFAULT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id_documento`, `nombre_documento`, `descripcion_documento`, `tipo_documento`, `fecha_subida`, `ruta_archivo`, `id_usuario`) VALUES
(30, 'index', NULL, 'php', '2024-02-26', 'doc_users/24/', 24),
(33, 'Screenshot', NULL, 'png', '2024-03-11', 'doc_users/24/', 24),
(50, 'practica', NULL, 'html', '2024-03-15', 'doc_users/41/', 41),
(51, 'ejercicio-bootstrap(2)', NULL, 'docx', '2024-03-15', 'doc_users/41/', 41),
(54, 'prueba-validacion-reto2(1)(1)', NULL, 'docx', '2024-03-15', 'doc_users/41/', 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `id_entidad` int NOT NULL,
  `nombre_entidad` varchar(100) NOT NULL,
  `cif_entidad` varchar(20) NOT NULL,
  `sector_entidad` varchar(50) DEFAULT NULL,
  `direccion_entidad` varchar(200) NOT NULL,
  `numero_telefono_entidad` varchar(15) NOT NULL,
  `correo_entidad` varchar(100) NOT NULL,
  `pagina_web_entidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`id_entidad`, `nombre_entidad`, `cif_entidad`, `sector_entidad`, `direccion_entidad`, `numero_telefono_entidad`, `correo_entidad`, `pagina_web_entidad`) VALUES
(1, 'Empresa XYZ', 'ABC123456', 'Tecnología', 'Calle Principal 123', '987654321', 'info@empresa.xyz', 'www.empresa.xyz'),
(2, 'Tienda ABC', 'DEF789012', 'Comercio', 'Avenida Comercial 456', '123456789', 'info@tiendaabc.com', 'www.tiendaabc.com'),
(3, 'Organización Solidaria', 'GHI345678', 'Sin fines de lucro', 'Plaza Solidaria 789', '555555555', 'contacto@solidario.org', 'www.solidario.org'),
(4, 'Consultora XYZ', 'JKL901234', 'Consultoría', 'Calle Consultora 567', '111222333', 'info@consultoraxyz.com', 'www.consultoraxyz.com'),
(10, 'kike', '4546486F', NULL, 'asdfa', '3516456', 'kikeitf7@gmail.com', NULL),
(11, 'transportes lorenz', 'B-444111', NULL, 'calle carretera, 34 la mata de los olmos', '625555555', 'transporteslorenz@gmail.com', NULL),
(12, 'Ana', '17263452T', NULL, 'C/Alta,34', '653342334', 'ana@gmail.com', NULL),
(13, 'Lucas', '22556699W', NULL, 'Calle Carretera,28', '655889955', 'lucas@gmail.com', NULL),
(14, 'prueba', '57525899F', NULL, 'lalguna', '789546321', 'prueba@prueba.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int NOT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'Casi nuevo'),
(2, 'Muy bien'),
(3, 'Bien'),
(5, 'Reformado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int NOT NULL,
  `nombre_imagen` varchar(45) NOT NULL,
  `formato_imagen` varchar(45) NOT NULL,
  `ruta_imagen` varchar(45) NOT NULL,
  `descripcion_imagen` varchar(45) DEFAULT NULL,
  `id_inmueble` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `nombre_imagen`, `formato_imagen`, `ruta_imagen`, `descripcion_imagen`, `id_inmueble`) VALUES
(1, 'vivienda', 'jpg', '/img/', 'imagen vivienda 1', 1),
(2, 'tienda1', 'jpg', '/img/', NULL, 2),
(3, 'tienda2', 'jpg', '/img/', NULL, 2),
(4, 'bar', 'jpg', '/img/', NULL, 4),
(5, 'horno', 'jpg', '/img/', NULL, 8),
(9, 'foto1', 'png', '/img/', NULL, 5),
(10, 'cocina', 'jpg', '/img/', NULL, 11),
(11, 'comedor', 'jpg', '/img/', NULL, 11),
(17, 'bgini', 'png', '/img/', NULL, 10),
(18, 'panaderia1', 'jpg', '/img/', NULL, 12),
(19, 'panaderia2', 'jpg', '/img/', NULL, 12),
(20, 'panaderia3', 'jpg', '/img/', NULL, 12),
(23, 'bgini', 'png', '/img/', NULL, 35),
(24, 'vivienda1', 'jpg', '/img/', NULL, 14),
(25, 'piso1', 'jpg', '/img/', NULL, 3),
(26, 'piso1', 'jpg', '/img/', NULL, 13),
(27, 'piso2', 'jpg', '/img/', NULL, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `id_inmueble` int NOT NULL,
  `metros_cuadrados_inmueble` varchar(255) DEFAULT NULL,
  `descripcion_inmueble` varchar(250) DEFAULT NULL,
  `distribucion_inmueble` varchar(250) DEFAULT NULL,
  `precio_inmueble` int DEFAULT NULL,
  `direccion_inmueble` varchar(200) DEFAULT NULL,
  `caracteristicas_inmueble` varchar(200) DEFAULT NULL,
  `equipamiento_inmueble` varchar(200) DEFAULT NULL,
  `latitud_inmueble` varchar(255) DEFAULT NULL,
  `longitud_inmueble` varchar(255) DEFAULT NULL,
  `id_municipio` int NOT NULL,
  `id_estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`id_inmueble`, `metros_cuadrados_inmueble`, `descripcion_inmueble`, `distribucion_inmueble`, `precio_inmueble`, `direccion_inmueble`, `caracteristicas_inmueble`, `equipamiento_inmueble`, `latitud_inmueble`, `longitud_inmueble`, `id_municipio`, `id_estado`) VALUES
(1, '220', 'Vivienda en planta baja', 'cocina comedor, 2 baños, 3 dormitorios, terraza', 120000, 'C/Carretera,38', 'Para entrar a vivir en cualquier momento', 'Perfectamente equipado con todo lo necesario para vivir', NULL, NULL, 14, 2),
(2, '50', 'Local recién reformado en el centro de Alcorisa', '1 baño, trastienda', 600, 'C/Teruel,10', NULL, 'Sin amueblar', NULL, NULL, 3, 5),
(3, '98', 'Piso con ascensor', 'cocina, comedor, 2 dormitorios, 1 baño, despensa, parking garaje', 380250, 'Avenida Zaragoza, 3ºB', 'Perfecto para entrar a vivir', 'Calefacción central', NULL, NULL, 2, 1),
(4, '100', 'Local acondicionado para montar un bar', '3 baños', 900, 'C/Alta, 30', NULL, 'Barra y mobiliario completo', NULL, NULL, 22, 2),
(5, '75', 'Apartamento moderno con vistas a la iglesia', 'Salón, cocina, dormitorio y baño', 150000, 'Avenida Principal, 48, 1ªDCHA', 'Terraza, garaje y trastero', 'Electrodomésticos de alta calidad', NULL, NULL, 20, 2),
(6, '20', 'Pequeño local ideal para peña', 'Abierto, 1 baño', 200, 'C/Baja,33', NULL, 'Vacío', NULL, NULL, 17, 3),
(7, '45', 'Ático en alquiler', '1 habitacion, 1 baño, terraza, cocina comedor', 124000, 'Avenida Andorra, 39', 'Ático amueblado en perfectas condiciones', 'Aire acondicionado, armarios, calefacción, terraza, electrodomésticos', NULL, NULL, 6, 2),
(8, '80', 'Amplio local que en tiempos albergó una panadería', 'Zona de horno y baño completo', 500, 'C/Mayor,4', NULL, 'Totalmente equipado', NULL, NULL, 21, 3),
(9, '40', 'Local de tamaño mediano, ideal para una peña', 'Abierto, 1 baño', 300, 'C/Alta, 12', NULL, 'Vacío', NULL, NULL, 17, 3),
(10, '280', 'casa en perfecto estado con garaje y trastero en frente del domicilio', '4 dormitorios, 2 baños, 1 cocina, 1 comedor, 1 sala estar, 1 terraza', NULL, 'Calle Tenor Fleta, 28', 'Tiene tambien garaje con trastero, se encuentra en el garaje de aparcamientos comunitario que se encuentra en frente del domicilio', 'Se acaba de reformar y viene perfectamente equipado para entrar a vivir', NULL, NULL, 1, 2),
(11, '60', 'Local acondicionado para bar en Foz Calanda', '2 baños, barra, cocina y pequeño comedor', 600, 'C/Mayor,2', NULL, 'Totalmente equipado', NULL, NULL, 8, 2),
(12, '80', 'Local acondicionado para panadería en Castelserás', 'Zona de horno y baño completo', 700, 'C/Baja,5', NULL, 'Totalmente equipado', NULL, NULL, 7, 3),
(13, '254', 'Piso en la plaza del ayuntamiento, con  vistas a la iglesia y a la plaza mayor', 'comedor, cocina, 3 dormitorios, 2 baños y terraza. También dispone de trastero y cochera', NULL, 'Calle Ayuntamiento, 12', 'Está en perfecto estado y con todo lo necesario para entrar a vivir en cualquier momento', 'Totalmente equipado', NULL, NULL, 13, 2),
(14, '550', '1 mes de fianza, 1 mes antes de abandonar la casa hay que avisar. Y cuando se quiera alquilar, se entra a vivir 15 dias despues del aviso', '3 baños, 3 dormitorios, 1 sala de estar, 1 terraza, cochera con bodega', NULL, 'Calle Zaragoza, 28', 'Recientemente amueblado', NULL, NULL, NULL, 22, 2),
(24, '5', NULL, 'dasf', NULL, 'dfg', NULL, 'asdf', NULL, NULL, 21, 3),
(25, '5', NULL, 'dasf', NULL, 'dfg', NULL, 'asdf', NULL, NULL, 21, 3),
(26, '5', NULL, 'dasf', NULL, 'dfg', NULL, 'asdf', NULL, NULL, 21, 3),
(27, '5', NULL, 'dasf', NULL, 'dfg', NULL, 'asdf', NULL, NULL, 21, 3),
(28, '10', NULL, 'dsaf', NULL, 'dfas', NULL, 'dasf', NULL, NULL, 1, 1),
(29, '10', NULL, 'dsaf', NULL, 'dfas', NULL, 'dasf', NULL, NULL, 1, 1),
(30, '10', NULL, 'dsaf', NULL, 'dfas', NULL, 'dasf', NULL, NULL, 1, 1),
(31, '10', NULL, 'dsaf', NULL, 'dfas', NULL, 'dasf', NULL, NULL, 1, 1),
(32, '10', NULL, 'dsaf', NULL, 'dfas', NULL, 'dasf', NULL, NULL, 1, 1),
(33, '5', NULL, 'ad', NULL, 'fd', NULL, 'asf', NULL, NULL, 1, 1),
(34, '5', NULL, 'ad', NULL, 'fd', NULL, 'asf', NULL, NULL, 1, 1),
(35, '1111', 'adfa fadf adf afd', ' adfa fd dfadsfd qwer ga dfa dfasdfqwe ewqer g gasdf fadsfa req esfdas fasdf fadfaswe ewqe fgrtj hjt adsf', NULL, 'adf dafa dewq dfhg fadfqer ds fa cdxcsd', 'qwer jlsdkf jdskdjo sksaor cals', 'dfdkjds akjo skfdjo wkjo dkaz adlkfho', NULL, NULL, 11, 1),
(36, '200', NULL, 'Vacio', NULL, 'C/ Cervantes, 8', NULL, 'Hornos', NULL, NULL, 4, 2),
(37, '250', NULL, '3 tipos de tienda diferentes', NULL, 'Avenida Aragon. 19', NULL, 'Mostradores, cajas...', NULL, NULL, 20, 3),
(38, '120', NULL, 'Vacio', NULL, 'Calle Alfonso', NULL, 'Vacio', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `id_local` int NOT NULL,
  `nombre_local` varchar(45) DEFAULT NULL,
  `capacidad_local` varchar(200) DEFAULT NULL,
  `recursos_local` varchar(200) DEFAULT NULL,
  `id_inmueble` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`id_local`, `nombre_local`, `capacidad_local`, `recursos_local`, `id_inmueble`) VALUES
(1, NULL, NULL, NULL, 2),
(2, NULL, NULL, NULL, 4),
(3, NULL, NULL, NULL, 6),
(4, NULL, NULL, NULL, 8),
(5, NULL, NULL, NULL, 9),
(6, 'Bar Baridad', NULL, NULL, 11),
(7, 'Panadería Lola', NULL, NULL, 12),
(12, 'asf', NULL, NULL, 24),
(13, 'asf', NULL, NULL, 25),
(14, 'asf', NULL, NULL, 26),
(15, 'asf', NULL, NULL, 27),
(16, 'sdasf', NULL, NULL, 28),
(17, 'sdasf', NULL, NULL, 29),
(18, 'sdasf', NULL, NULL, 30),
(19, 'sdasf', NULL, NULL, 31),
(20, 'sdasf', NULL, NULL, 32),
(21, 'dsfa', NULL, NULL, 33),
(22, 'dsfa', NULL, NULL, 34),
(24, 'Local acondicionado', NULL, NULL, 36),
(25, 'Local para ultramarinos', NULL, NULL, 37),
(26, 'Tienda / Ferreteria', NULL, NULL, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int NOT NULL,
  `nombre_municipio` varchar(50) NOT NULL,
  `provincia_municipio` varchar(50) NOT NULL,
  `codigo_postal_municipio` varchar(45) NOT NULL,
  `longitud_municipio` varchar(250) DEFAULT NULL,
  `latitud_municipio` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`, `provincia_municipio`, `codigo_postal_municipio`, `longitud_municipio`, `latitud_municipio`) VALUES
(1, 'Aguaviva', 'Teruel', '44566', '-0.1976', '40.8232'),
(2, 'Alcaniz', 'Teruel', '44600', '-0.1331', '41.0504'),
(3, 'Alcorisa', 'Teruel', '44550', '-0.3804', '40.8922'),
(4, 'Belmonte_de_San_Jose', 'Teruel', '44642', '-0.0635', '40.8751'),
(5, 'Berge', 'Teruel', '44556', '-0.4261', '40.8574'),
(6, 'Calanda', 'Teruel', '44570', '-0.2304', '40.9395'),
(7, 'Castelseras', 'Teruel', '44630', '-0.1475', '40.9820'),
(8, 'Foz_Calanda', 'Teruel', '44579', '-0.2637', '40.9203'),
(9, 'La_Canada_de_Verich', 'Teruel', '44643', '-0.0990', '40.8658'),
(10, 'La_Cerollera', 'Teruel', '44651', '-0.0542', '40.8387'),
(11, 'La_Codonera', 'Teruel', '44640', '-0.0860', '40.9327'),
(13, 'La_Ginebrosa', 'Teruel', '44643', '-0.1336', '40.8689'),
(14, 'La_Mata_de_los_Olmos', 'Teruel', '44557', '-0.5200', '40.8647'),
(15, 'Las_Parras_de_Castellote', 'Teruel', '44566', '-0.2436', '40.7752'),
(16, 'Los_Olmos', 'Teruel', '44557', '-0.4861', '40.8755'),
(17, 'Mas_de_las_Matas', 'Teruel', '44564', '-0.2415', '40.8332'),
(19, 'Seno', 'Teruel', '44561', '-0.3383', '40.8129'),
(20, 'Torrecilla_de_Alcaniz', 'Teruel', '44640', '-0.0913', '40.9601'),
(21, 'Torrevelilla', 'Teruel', '44641', '-0.1088', '40.9012'),
(22, 'Valdealgorfa', 'Teruel', '44594', '-0.0347', '40.9901');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `id_negocio` int NOT NULL,
  `titulo_negocio` varchar(255) NOT NULL,
  `motivo_traspaso_negocio` varchar(255) DEFAULT NULL,
  `coste_traspaso_negocio` int DEFAULT NULL,
  `coste_mensual_negocio` int DEFAULT NULL,
  `descripcion_negocio` varchar(250) DEFAULT NULL,
  `capital_minimo_negocio` int DEFAULT NULL,
  `local_id_inmueble` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`id_negocio`, `titulo_negocio`, `motivo_traspaso_negocio`, `coste_traspaso_negocio`, `coste_mensual_negocio`, `descripcion_negocio`, `capital_minimo_negocio`, `local_id_inmueble`) VALUES
(1, 'Traspaso de Bar Baridad', 'Jubilación', 2000, 600, NULL, NULL, 6),
(2, 'Traspaso de panadería en Castelserás', 'Jubilación', 3000, 750, NULL, NULL, 7),
(16, 'Panaderia Paco', 'Cierre de negocio', 1200, NULL, '', NULL, 24),
(17, 'Mercado Rosa', 'Cierre de negocio', 15000, NULL, '', NULL, 25),
(18, 'Ferreteria Ferrer', 'Cierre de negocio', 14000, 4500, '', NULL, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int NOT NULL,
  `titulo_noticia` varchar(45) NOT NULL,
  `fecha_publicacion_noticia` date DEFAULT NULL,
  `contenido_noticia` varchar(255) NOT NULL,
  `id_municipio` int NOT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `id_notificacion` int NOT NULL,
  `leida_notificacion` tinyint(1) NOT NULL,
  `contenido_notificacion` varchar(250) NOT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `id_oferta` int NOT NULL,
  `titulo_oferta` varchar(255) DEFAULT NULL,
  `fecha_inicio_oferta` date DEFAULT NULL,
  `fecha_fin_oferta` date DEFAULT NULL,
  `condiciones_oferta` varchar(255) NOT NULL,
  `descripcion_oferta` varchar(255) DEFAULT NULL,
  `fecha_publicacion_oferta` date DEFAULT NULL,
  `activo_oferta` tinyint(1) DEFAULT NULL,
  `id_entidad` int NOT NULL,
  `id_negocio` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`id_oferta`, `titulo_oferta`, `fecha_inicio_oferta`, `fecha_fin_oferta`, `condiciones_oferta`, `descripcion_oferta`, `fecha_publicacion_oferta`, `activo_oferta`, `id_entidad`, `id_negocio`) VALUES
(2, 'Local en alquiler en Alcorisa', '2024-02-07', '2024-03-07', '1 mes de fianza', 'Se alquila un céntrico y coqueto local en el centro de la preciosa localidad de Alcorisa. Visítalo sin compromiso', '2024-02-07', 1, 1, NULL),
(3, 'Piso nuevo en alquiler', '2024-02-12', NULL, '2 meses de fianza, contrato mínimo 8 meses', NULL, '2024-02-12', NULL, 1, NULL),
(4, 'Local en alquiler en Valdealgorfa acondicionado para bar', '2024-02-12', '2024-03-22', '2 meses de fianza', 'Maravilloso local acondicionado para bar. ¡No dejes pasar esta oportunidad!', '2024-02-12', 1, 1, NULL),
(7, 'Ático en alquiler', '2024-02-18', NULL, 'Alquiler de junio a septiembre', 'Buahardilla diáfana ', '2024-02-13', NULL, 3, NULL),
(8, 'Antigua panadería en Torrevelilla', '2024-02-15', NULL, '2 meses de fianza', 'Se alquila un local que lleva 50 años cerrado. Antes era una panadería ', '2024-02-13', 1, 1, NULL),
(10, 'Traspaso de bar en Foz Calanda', NULL, NULL, 'Solvencia económica demostrable', 'Se traspasa el bar de Foz Calanda porque el dueño se jubila.', '2024-03-04', 1, 1, 1),
(11, 'Traspaso de panadería en Castelserás', NULL, NULL, 'Solvencia económica demostrable', 'Se traspasa una panadería en Castelserás porque la dueña se jubila', '2024-03-05', 1, 2, 2),
(12, 'Alquilo piso con buenas vistas', '2024-03-05', NULL, 'fianza de 2 meses', 'alquiler de un piso con fianza de 2 meses, pago del alquiler cada mes y si se quiere dejar el piso tiene que avisar con 3 meses de antelación', NULL, NULL, 11, NULL),
(13, 'Casa con vistas al monte', '2024-03-05', NULL, '1 mes de fianza, 1 mes antes de abandonar la casa hay que avisar. Y cuando se quiera alquilar, se entra a vivir 15 dias despues del aviso', '1 mes de fianza, 1 mes antes de abandonar la casa hay que avisar. Y cuando se quiera alquilar, se entra a vivir 15 dias despues del aviso', NULL, NULL, 11, NULL),
(23, 'Panaderia Paco', '2024-03-17', '2024-04-17', 'Esta oferta se trata solamente de un alquiler de negocio', NULL, '2024-03-17', 0, 11, 16),
(24, 'Mercado Rosa', '2024-03-17', '2024-04-17', 'Esta oferta se trata solamente de un alquiler de negocio', NULL, '2024-03-17', 0, 11, 17),
(25, 'Ferreteria Ferrer', '2024-03-17', '2024-04-17', 'Esta oferta se trata solamente de un alquiler de negocio', NULL, '2024-03-17', 0, 11, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta_inmueble`
--

CREATE TABLE `oferta_inmueble` (
  `id_oferta` int NOT NULL,
  `id_inmueble` int NOT NULL,
  `precio_inm` varchar(45) NOT NULL,
  `id_entidad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `oferta_inmueble`
--

INSERT INTO `oferta_inmueble` (`id_oferta`, `id_inmueble`, `precio_inm`, `id_entidad`) VALUES
(2, 2, '600', NULL),
(3, 3, '2000', NULL),
(4, 4, '900', NULL),
(7, 7, '450', NULL),
(8, 8, '500', NULL),
(10, 11, '600', NULL),
(11, 12, '700', NULL),
(12, 13, '380', NULL),
(13, 14, '580', NULL),
(23, 36, '1200', 11),
(24, 37, '15000', 11),
(25, 38, '14000', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperar_pass`
--

CREATE TABLE `recuperar_pass` (
  `id_recuperar_password` int NOT NULL,
  `email_recuperar` varchar(45) DEFAULT NULL,
  `fecha_hora_recuperar` datetime DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int NOT NULL,
  `nombre_rol` varchar(45) NOT NULL,
  `descripcion_rol` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`, `descripcion_rol`) VALUES
(1, 'administrador', 'Gestiona todo'),
(2, 'usuario', 'Es un usuario'),
(3, 'reportero', 'sube noticias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int NOT NULL,
  `nombre_servicio` varchar(50) NOT NULL,
  `descripcion_servicio` varchar(255) DEFAULT NULL,
  `id_tipo_servicio` int NOT NULL,
  `id_municipio` int NOT NULL,
  `longitud_servicio` varchar(255) DEFAULT NULL,
  `latitud_servicio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `nombre_servicio`, `descripcion_servicio`, `id_tipo_servicio`, `id_municipio`, `longitud_servicio`, `latitud_servicio`) VALUES
(1, 'Multiservicio_Rural', 'Cuenta_con_bar_restaurante_y_tienda_Las_personas_encargadas_del_bar_restaurante_no_pagan_cuota_de_alquiler_por_el_local', 11, 4, NULL, NULL),
(2, 'Carniceria', 'Servicio_una_vez_por_semana', 1, 4, NULL, NULL),
(3, 'Peluqueria', 'Cada_15_dias', 3, 4, NULL, NULL),
(4, 'Podologia', 'Cada_15_dias', 12, 4, NULL, NULL),
(5, 'La_Casa_de_Belmonte', 'Casa_rural_muy_vinculado_al_mundo_de_la_escritura_y_como_fuente_de_inspiracion_o_retiro_espiritual_para_escritores', 9, 4, NULL, NULL),
(6, 'Oficina_turismo', 'Existe_un_punto_de_informacion_turistica_operativo_los_fines_de_semana_de_julio_y_agosto', 13, 4, NULL, NULL),
(7, 'Consultorio', 'Servicio_3_dias_por_semana:_lunes,_miercoles_y_viernes,_dependiendo_del_Centro_de_Salud_de_Calanda ', 10, 4, NULL, NULL),
(8, 'Servicio_Autobus', 'Conexion_con_Alcaniz_de_lunes_a_viernes_a_las_07:51_(ida)_y_a_las_14:40_(vuelta),_que_efectua_paradas_en_Torrevelilla,_La_Codoñera,_Torrecilla_y_Castelseras._Ademas,_existe_un_servicio_bajo_demanda_que_sale_de_Alcaniz_a_las_17:45', 15, 4, NULL, NULL),
(9, 'Farmacia', 'Ambulante,_los_mismos_dias_que_el_consultorio_(lunes,_miércoles_y_viernes)', 14, 4, NULL, NULL),
(10, 'Local_Social ', 'Compartido_con_la_Asociacion_de_Amigos_del_Mezquin', 16, 4, NULL, NULL),
(11, 'Sala_exposiciones', 'Se_realizan_reuniones_y_proyecciones_esporadicamente', 17, 4, NULL, NULL),
(12, 'Pabellon', 'Uso_libre', 18, 4, NULL, NULL),
(13, 'Piscina', 'Uso_libre', 19, 4, NULL, NULL),
(14, 'Tienda', 'Comestibles', 8, 5, NULL, NULL),
(15, 'Bar', 'Al_bar_principal_se_suman_el_de_La_Posada_el_del_pabellon_los_fines_de_semana_y_el_de_las_piscinas_en_verano', 5, 5, NULL, NULL),
(16, 'Carniceria', 'Comestibles', 1, 5, NULL, NULL),
(17, 'Colegio', 'Unos_16_ninos_de_edades_comprendidas_entre_los_4_y_12_anos', 4, 5, NULL, NULL),
(18, 'Biblioteca', 'Esta_en_la_Casa_Cultura_tambien_se_utiliza_como_espacio_en_el_que_se_dan_clases_para_las_personas_mayores_o_de_actividades_extraescolares_para_ninos', 6, 5, NULL, NULL),
(19, 'Escuela_Adultos', 'Perteneciente_al_CPEPA_de_Alcorisa_se_ofrecen_clases_de_Formacion_inicial_y_Espanol_como_lengua_nueva', 20, 5, NULL, NULL),
(20, 'Hostal', 'Con_tituralidad_publica_con_8_habitaciones_y_una_capacidad_para_21_personas', 21, 5, NULL, NULL),
(21, 'La_Posada_de_Berge', 'Casa_Rural_con_5_habitaciones_y_capacidad_para_13_personas', 9, 5, NULL, NULL),
(22, 'Casa_Rural_Torre_Piquer', 'Casa_Rural_con_5_habitaciones_y_capacidad_para_9_personas', 9, 5, NULL, NULL),
(23, 'Museo', 'Pequeno_museo_de_la_cooperativa', 22, 5, NULL, NULL),
(24, 'Consultorio', 'De_lunes_a_viernes_de_09:30_a_11:30', 10, 5, NULL, NULL),
(25, 'Farmacia', 'Abre_de_lunes_a_sabado_de_09:00_a_11:00', 14, 5, NULL, NULL),
(26, 'Ruta_Autobuses', 'bus_de_Berge_a_Alcorisa_de_lunes_a_viernes_con_salida_a_las_09:00_y_regreso_a_las_14:00_Esa_misma_ruta_tambien_conecta_Berge_con_Cantavieja_pasando_por_municipios_como_Molinos_Ejulve_Pitarque_o_Villarluengo', 15, 5, NULL, NULL),
(27, 'Pabellon', 'Tanto_cubierto_como_descubierto', 18, 5, NULL, NULL),
(28, 'Bar', 'Situado_en_el_centro', 5, 8, NULL, NULL),
(29, 'Panaderia', 'Situada_en_el_centro', 2, 8, NULL, NULL),
(30, 'Guarderia', 'Actualmente_con_5_ninos', 7, 8, NULL, NULL),
(31, 'Colegio', 'Actualmente_con_20_25_ninos', 4, 8, NULL, NULL),
(32, 'Escuela_Adultos', 'Perteneciente_al_CPEPA_de_Alcorisa_se_ofrecen_clases_de_Tutorización_en_educacion_a_distancia_e_informacion_PEAC_y_cursos_de_ingles_nivel_A1_y_A2', 20, 8, NULL, NULL),
(33, 'Casa_Rural_El_Molino', 'Casa_Rural_con_5_dormitorios', 9, 8, NULL, NULL),
(34, 'Consultorio', 'De_lunes_a_viernes_de_10:00_a_11:00', 10, 8, NULL, NULL),
(35, 'Farmacia', 'En_horario_del_consultorio_(de_lunes_a_viernes_de_10:00_a_11:00)', 14, 8, NULL, NULL),
(36, 'Servicio_Autobus', 'El_bus_escolar_que_une_Foz_con_Calanda_y_Alcaniz._La_ida_la_realiza_a_las_08:15_y_la_vuelta_a_las_15:10', 15, 8, NULL, NULL),
(37, 'Pista_deportiva', 'Esta_descubierta', 18, 8, NULL, NULL),
(38, 'Multiservicio_Rural', 'De_10:30_a_12:30_de_lunes_a_domingo', 11, 9, NULL, NULL),
(39, 'Peluqueria', 'Servicio_a_la_carta_cada_tres_semanas_aproximadamente', 3, 9, NULL, NULL),
(40, 'Masajista', 'Servicio_a_la_carta_cada_tres_semanas_aproximadamente', 23, 9, NULL, NULL),
(41, 'Casa_Rural_Abaric', 'Casa_Rural_con_espacio_para_6_personas', 9, 9, NULL, NULL),
(42, 'Museo_del_Aceite', 'Ubicado_en_el_Molino', 22, 9, NULL, NULL),
(43, 'Consultorio', 'Martes_y_jueves_de_09:30_a_11:30', 10, 9, NULL, NULL),
(44, 'Farmacia', 'Botiquin_ambulante,_martes_y_jueves_de_09:30_a_11:30', 14, 9, NULL, NULL),
(45, 'Multiservicio_rural', 'En_horario_de_mananas', 11, 10, NULL, NULL),
(46, 'Bar_La_Venta', 'Bar_Restaurante', 5, 1, NULL, NULL),
(47, 'Sport', 'Bar', 5, 2, NULL, NULL),
(48, 'Centro_Salud', 'Abierto_las_24_horas_del_dia,_toda_la_semana', 24, 3, NULL, NULL),
(49, 'Colegio', 'Aproximadamente_unos_25_ninos_de_edades_comprendidas_entre_los_3_y_los_12_anos', 4, 14, NULL, NULL),
(50, 'Pistas_de_Padel', '5_pistas_de_padel_con_servicio_bar._Al_lado_del_instituto', 25, 6, NULL, NULL),
(51, 'Consultorio', 'Martes_y_jueves_a_09:30_a_11:30', 10, 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `id_tipo_servicio` int NOT NULL,
  `nombre_tipo_servicio` varchar(45) NOT NULL,
  `descripcion_tipo_servicio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`id_tipo_servicio`, `nombre_tipo_servicio`, `descripcion_tipo_servicio`) VALUES
(1, 'Carnicería', NULL),
(2, 'Panaderia', NULL),
(3, 'Peluqueria', NULL),
(4, 'Colegio', NULL),
(5, 'Bar', NULL),
(6, 'Biblioteca', NULL),
(7, 'Guardería', NULL),
(8, 'Tienda', NULL),
(9, 'Casa Rural', NULL),
(10, 'Consultorio Médico', NULL),
(11, 'Multiservicio Rural', NULL),
(12, 'Podologia', NULL),
(13, 'Oficina turismo', NULL),
(14, 'Farmacia', NULL),
(15, 'Servicio autobus', NULL),
(16, 'Local Social', NULL),
(17, 'Sala exposiciones', NULL),
(18, 'Pabellón', NULL),
(19, 'Piscinas', NULL),
(20, 'Escuela Adultos', NULL),
(21, 'Hostal', NULL),
(22, 'Museo', NULL),
(23, 'Masajista', NULL),
(24, 'Centro de Salud', 'Abierto todo el dia\r\n'),
(25, 'Pistas Pádel', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `nif` varchar(15) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellidos_usuario` varchar(50) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `contrasena_usuario` varchar(100) NOT NULL,
  `fecha_nacimiento_usuario` date NOT NULL,
  `telefono_usuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nif`, `nombre_usuario`, `apellidos_usuario`, `correo_usuario`, `contrasena_usuario`, `fecha_nacimiento_usuario`, `telefono_usuario`) VALUES
(1, '12345678A', 'oscar', 'espada', 'oscarespada@gmail.com', '$2y$10$ezZpZs/dNNR3fSdUzxGqSuVogy.tX7Yr7vCB.ZaXCjCFqQwNe9l2u', '1990-01-01', '123456789'),
(8, '365436516', 'alba', 'lorenz', 'alorenzmata@gmail.com', '$2y$10$zDAu5cQIkX6eEW2bO4F9DuDx.OM95gOBA7RDB5Uv4MavYaMobWRfa', '2001-05-09', '566165651'),
(24, '73108520F', 'oscar', 'espada', 'oscar8espada@gmail.com', '$2y$10$cA9MGUmbjX3oFu6JzK3y..K3NHg/PuPVOnkt65/BX7rSwZeqslj8e', '2002-03-14', '634542679'),
(31, '4546486F', 'kike', 'zaporta', 'kikeitf7@gmail.com', '$2y$10$GQXnaUUGiPzn2Vg4FoUZyOuLCr4upahLNyiziSXuujR5nY8sZbIcy', '1999-02-05', '3516456'),
(32, '11111111Q', 'Alba', 'Lorenz', 'albalorenz@gmail.com', '$2y$10$yhlg5K0.fk9yxs41lYgduOC2nLet1JUSNwlxiLmdx5fAsPh/rKTn6', '2003-06-01', '666666666'),
(39, '17263452T', 'Ana', 'Dueñas', 'anaduenas@gmail.com', '$2y$10$NkU8oa3dmrQKve7E0Dl3mOXsgfgoDHCb.XAXcU0B2vV3tC6IO1hiu', '1970-02-23', '653342334'),
(41, '22556699W', 'Lucas', 'Gómez Espallargas', 'lucas@gmail.com', '$2y$10$DwL.tVu3tpKBttBSFgZxPOKodFQTfdLC1RCwXYPyToWIt4Od6Pt2O', '1998-08-08', '655889955'),
(42, '18234567T', 'Ana', 'Gómez', 'anagomez@gmail.com', '$2y$10$bBY8O6jdbLDhY/xFjaIey.u0nMMbUtGXM.JXvp5Oen3yKYmpW1bAW', '1983-02-06', '674223450'),
(43, '57525899F', 'prueba', 'prueba', 'prueba@prueba.com', '$2y$10$dyDHWmjEi6SOY1b03bVQEeawn5lKJtn3uIxOJHj1Kr1Rv800DFApG', '0045-05-04', '789546321'),
(44, '18062505F', 'Paula', 'Bejar', 'paulabejarprc@gmail.com', '$2y$10$f/h3.hKpolJJFQx2WgKS.O47JFNAk73mbndUg7M6Uztx.tfB99pJ2', '1994-01-02', '638553868');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_entidad`
--

CREATE TABLE `usuario_entidad` (
  `id_usuario` int NOT NULL,
  `id_entidad` int NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuario_entidad`
--

INSERT INTO `usuario_entidad` (`id_usuario`, `id_entidad`, `rol`) VALUES
(24, 11, '2'),
(39, 12, '2'),
(41, 13, '2'),
(43, 14, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_rol`
--

CREATE TABLE `usuario_has_rol` (
  `id_usuario` int NOT NULL,
  `id_rol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuario_has_rol`
--

INSERT INTO `usuario_has_rol` (`id_usuario`, `id_rol`) VALUES
(31, 1),
(39, 1),
(1, 2),
(24, 2),
(32, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_oferta`
--

CREATE TABLE `usuario_oferta` (
  `id_usuario` int NOT NULL,
  `id_oferta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorar_inmueble`
--

CREATE TABLE `valorar_inmueble` (
  `id_inmueble` int NOT NULL,
  `fecha_valoracion_inm` date NOT NULL,
  `puntuacion_inm` int NOT NULL,
  `descripcion_inm` varchar(250) DEFAULT NULL,
  `id_valorar_inmueble` int NOT NULL,
  `id_usuario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorar_negocio`
--

CREATE TABLE `valorar_negocio` (
  `id_usuario` int NOT NULL,
  `id_negocio` int NOT NULL,
  `puntuacion` int NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `fecha_valoracion` date NOT NULL,
  `id_valorar_negocio` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vivienda`
--

CREATE TABLE `vivienda` (
  `id_vivienda` int NOT NULL,
  `habitaciones_vivienda` varchar(200) DEFAULT NULL,
  `tipo_vivienda` varchar(200) DEFAULT NULL,
  `id_inmueble` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `vivienda`
--

INSERT INTO `vivienda` (`id_vivienda`, `habitaciones_vivienda`, `tipo_vivienda`, `id_inmueble`) VALUES
(1, '6', 'Casa', 1),
(2, '5', 'Piso ', 3),
(4, '4', 'Piso', 5),
(5, '3', 'Piso', 7),
(6, '10', 'Casa', 10),
(7, '7', 'Piso', 13),
(8, '8', 'Casa', 14);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aviso`
--
ALTER TABLE `aviso`
  ADD PRIMARY KEY (`id_aviso`),
  ADD KEY `fk_aviso_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `chatear`
--
ALTER TABLE `chatear`
  ADD PRIMARY KEY (`id_usuario`,`id_usuario1`,`fecha_chat`),
  ADD KEY `fk_usuario_has_usuario_usuario2_idx` (`id_usuario1`),
  ADD KEY `fk_usuario_has_usuario_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `fk_documento_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`id_entidad`),
  ADD UNIQUE KEY `cif_UNIQUE` (`cif_entidad`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `fk_imagen_inmueble1_idx` (`id_inmueble`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id_inmueble`),
  ADD KEY `fk_inmueble_municipio1_idx` (`id_municipio`),
  ADD KEY `fk_inmueble_estado1_idx` (`id_estado`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_local`,`id_inmueble`),
  ADD KEY `fk_local_inmueble1_idx` (`id_inmueble`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`id_negocio`),
  ADD KEY `fk_negocio_local1_idx` (`local_id_inmueble`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `fk_noticia_municipio1_idx` (`id_municipio`),
  ADD KEY `fk_noticia_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `fk_notificacion_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `fk_oferta_entidad1_idx` (`id_entidad`),
  ADD KEY `fk_id_negocio` (`id_negocio`);

--
-- Indices de la tabla `oferta_inmueble`
--
ALTER TABLE `oferta_inmueble`
  ADD PRIMARY KEY (`id_oferta`,`id_inmueble`),
  ADD KEY `fk_oferta_has_inmueble_inmueble1_idx` (`id_inmueble`),
  ADD KEY `fk_oferta_has_inmueble_oferta_idx` (`id_oferta`),
  ADD KEY `fk_id_entidad` (`id_entidad`);

--
-- Indices de la tabla `recuperar_pass`
--
ALTER TABLE `recuperar_pass`
  ADD PRIMARY KEY (`id_recuperar_password`),
  ADD KEY `fk_recuperar_pass_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `fk_servicio_tipo_servicio1_idx` (`id_tipo_servicio`),
  ADD KEY `fk_servicio_municipio1_idx` (`id_municipio`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`id_tipo_servicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nif_UNIQUE` (`nif`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo_usuario`);

--
-- Indices de la tabla `usuario_entidad`
--
ALTER TABLE `usuario_entidad`
  ADD PRIMARY KEY (`id_usuario`,`id_entidad`),
  ADD KEY `fk_usuario_has_entidad_entidad1_idx` (`id_entidad`),
  ADD KEY `fk_usuario_has_entidad_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `usuario_has_rol`
--
ALTER TABLE `usuario_has_rol`
  ADD PRIMARY KEY (`id_usuario`,`id_rol`),
  ADD KEY `fk_usuario_has_rol_rol1_idx` (`id_rol`),
  ADD KEY `fk_usuario_has_rol_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `usuario_oferta`
--
ALTER TABLE `usuario_oferta`
  ADD PRIMARY KEY (`id_usuario`,`id_oferta`),
  ADD KEY `fk_usuario_has_oferta_oferta1_idx` (`id_oferta`),
  ADD KEY `fk_usuario_has_oferta_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `valorar_inmueble`
--
ALTER TABLE `valorar_inmueble`
  ADD PRIMARY KEY (`id_valorar_inmueble`),
  ADD KEY `fk_usuario_has_inmueble_inmueble1_idx` (`id_inmueble`),
  ADD KEY `fk_valorar_inmueble_usuario` (`id_usuario`);

--
-- Indices de la tabla `valorar_negocio`
--
ALTER TABLE `valorar_negocio`
  ADD PRIMARY KEY (`id_valorar_negocio`),
  ADD KEY `fk_usuario_has_negocio_negocio1_idx` (`id_negocio`),
  ADD KEY `fk_usuario_has_negocio_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD PRIMARY KEY (`id_vivienda`,`id_inmueble`),
  ADD KEY `fk_vivienda_inmueble1_idx` (`id_inmueble`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aviso`
--
ALTER TABLE `aviso`
  MODIFY `id_aviso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `id_entidad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id_inmueble` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `id_negocio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `id_notificacion` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `id_oferta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `recuperar_pass`
--
ALTER TABLE `recuperar_pass`
  MODIFY `id_recuperar_password` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `id_tipo_servicio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `valorar_inmueble`
--
ALTER TABLE `valorar_inmueble`
  MODIFY `id_valorar_inmueble` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valorar_negocio`
--
ALTER TABLE `valorar_negocio`
  MODIFY `id_valorar_negocio` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  MODIFY `id_vivienda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aviso`
--
ALTER TABLE `aviso`
  ADD CONSTRAINT `fk_aviso_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `chatear`
--
ALTER TABLE `chatear`
  ADD CONSTRAINT `fk_usuario_has_usuario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_usuario_has_usuario_usuario2` FOREIGN KEY (`id_usuario1`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `fk_documento_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `fk_imagen_inmueble1` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id_inmueble`);

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `fk_inmueble_estado1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `fk_inmueble_municipio1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`);

--
-- Filtros para la tabla `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `fk_local_inmueble1` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id_inmueble`);

--
-- Filtros para la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD CONSTRAINT `fk_negocio_local1` FOREIGN KEY (`local_id_inmueble`) REFERENCES `local` (`id_local`);

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_noticia_municipio1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`),
  ADD CONSTRAINT `fk_noticia_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `fk_notificacion_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `fk_id_negocio` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id_negocio`),
  ADD CONSTRAINT `fk_oferta_entidad1` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id_entidad`);

--
-- Filtros para la tabla `oferta_inmueble`
--
ALTER TABLE `oferta_inmueble`
  ADD CONSTRAINT `fk_id_entidad` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id_entidad`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_oferta_has_inmueble_inmueble1` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id_inmueble`),
  ADD CONSTRAINT `fk_oferta_has_inmueble_oferta` FOREIGN KEY (`id_oferta`) REFERENCES `oferta` (`id_oferta`);

--
-- Filtros para la tabla `recuperar_pass`
--
ALTER TABLE `recuperar_pass`
  ADD CONSTRAINT `fk_recuperar_pass_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `fk_servicio_municipio1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`),
  ADD CONSTRAINT `fk_servicio_tipo_servicio1` FOREIGN KEY (`id_tipo_servicio`) REFERENCES `tipo_servicio` (`id_tipo_servicio`);

--
-- Filtros para la tabla `usuario_entidad`
--
ALTER TABLE `usuario_entidad`
  ADD CONSTRAINT `fk_usuario_has_entidad_entidad1` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id_entidad`),
  ADD CONSTRAINT `fk_usuario_has_entidad_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario_has_rol`
--
ALTER TABLE `usuario_has_rol`
  ADD CONSTRAINT `fk_usuario_has_rol_rol1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `fk_usuario_has_rol_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario_oferta`
--
ALTER TABLE `usuario_oferta`
  ADD CONSTRAINT `fk_usuario_has_oferta_oferta1` FOREIGN KEY (`id_oferta`) REFERENCES `oferta` (`id_oferta`),
  ADD CONSTRAINT `fk_usuario_has_oferta_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `valorar_inmueble`
--
ALTER TABLE `valorar_inmueble`
  ADD CONSTRAINT `fk_usuario_has_inmueble_inmueble1` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id_inmueble`),
  ADD CONSTRAINT `fk_valorar_inmueble_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `valorar_negocio`
--
ALTER TABLE `valorar_negocio`
  ADD CONSTRAINT `fk_usuario_has_negocio_negocio1` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id_negocio`),
  ADD CONSTRAINT `fk_usuario_has_negocio_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_valorar_negocio_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD CONSTRAINT `fk_vivienda_inmueble1` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id_inmueble`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;