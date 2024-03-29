-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db:3306
-- Tiempo de generación: 07-02-2024 a las 11:59:40
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
-- --------------------------------------------------------

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

--
-- Volcado de datos para la tabla `aviso`
--

INSERT INTO `aviso` (`id_aviso`, `titulo_aviso`, `contenido_aviso`, `fecha_creacion_aviso`, `id_usuario`) VALUES
(1, 'Oferta de trabajo', 'Se busca desarrollador web con experiencia en HTML, CSS y JavaScript.', '2024-02-06', 2),
(2, 'Venta de coche', 'Se vende coche usado en excelente estado. Modelo: XYZ, Año: 2020.', '2024-02-06', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatear`
--

CREATE TABLE `chatear` (
  `id_usuario` int NOT NULL,
  `id_usuario1` int NOT NULL,
  `fecha_chat` datetime DEFAULT NULL,
  `mensaje_chat` varchar(255) DEFAULT NULL,
  `estado_chat` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `chatear`
--

INSERT INTO `chatear` (`id_usuario`, `id_usuario1`, `fecha_chat`, `mensaje_chat`, `estado_chat`) VALUES
(1, 2, '2024-02-06 10:30:00', 'Hola, ¿cómo estás?', 'Enviado');

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
(4, 'Consultora XYZ', 'JKL901234', 'Consultoría', 'Calle Consultora 567', '111222333', 'info@consultoraxyz.com', 'www.consultoraxyz.com');

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
(4, 'A reformar'),
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
(2, 'logoBA', 'png', '/img/', NULL, 1),
(3, 'bgini', 'png', '/img/', NULL, 2);

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
(1, '220', 'vivienda en planta baja', 'cocina comedor, 2 baños, 3 dormitorios, terraza', NULL, 'C/Carretera,38', 'Para entrar a vivir en cualquier momento', 'Perfectamente equipado con todo lo necesario para vivir', NULL, NULL, 14, 2),
(2, '80', 'Local recién reformado en el centro de Alcorisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 5);

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
(1, NULL, NULL, NULL, 2);

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
(1, 'Aguaviva', 'Teruel', '44566', NULL, NULL),
(2, 'Alcañiz', 'Teruel', '44600', NULL, NULL),
(3, 'Alcorisa', 'Teruel', '44550', NULL, NULL),
(4, 'Belmonte de San José', 'Teruel', '44642', NULL, NULL),
(5, 'Berge', 'Teruel', '44556', NULL, NULL),
(6, 'Calanda', 'Teruel', '44570', NULL, NULL),
(7, 'Castelserás', 'Teruel', '44630', NULL, NULL),
(8, 'Foz Calanda', 'Teruel', '44579', NULL, NULL),
(9, 'Jaganta', 'Teruel', '44566', NULL, NULL),
(10, 'La Cañada de Verich', 'Teruel', '44643', NULL, NULL),
(11, 'La Cerollera', 'Teruel', '44651', NULL, NULL),
(12, 'La Codoñera', 'Teruel', '44640', NULL, NULL),
(13, 'La Ginebrosa', 'Teruel', '44643', NULL, NULL),
(14, 'La Mata de Los Olmos', 'Teruel', '44557', NULL, NULL),
(15, 'Las Parras de Castellote', 'Teruel', '44566', NULL, NULL),
(16, 'Los Olmos', 'Teruel', '44557', NULL, NULL),
(17, 'Mas de Las Matas', 'Teruel', '44564', NULL, NULL),
(18, 'Puigmoreno', 'Teruel', '44600', NULL, NULL),
(19, 'Seno', 'Teruel', '44561', NULL, NULL),
(20, 'Torrecilla de Alcañiz', 'Teruel', '44640', NULL, NULL),
(21, 'Torrevelilla', 'Teruel', '44641', NULL, NULL),
(22, 'Valdealgorfa', 'Teruel', '44594', NULL, NULL),
(23, 'Valmuel', 'Teruel', '44600', NULL, NULL);

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
(1, 'Gran Oportunidad: Piso en Alquiler', '2024-02-07', NULL, 'Contrato mínimo de 6 meses, depósito requerido', 'Alquila este hermoso piso. Contrato mínimo de 6 meses y se requiere un depósito. ¡No pierdas la oportunidad', '2024-02-07', 1, 1, NULL),
(2, 'Local en alquiler en Alcorisa', '2024-02-07', '2024-03-07', '1 mes de fianza', NULL, NULL, 1, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta_inmueble`
--

CREATE TABLE `oferta_inmueble` (
  `id_oferta` int NOT NULL,
  `id_inmueble` int NOT NULL,
  `precio_inm` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `oferta_inmueble`
--

INSERT INTO `oferta_inmueble` (`id_oferta`, `id_inmueble`, `precio_inm`) VALUES
(1, 1, '350'),
(2, 2, '600');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `id_tipo_servicio` int NOT NULL,
  `nombre_tipo_servicio` varchar(45) NOT NULL,
  `descripcion_tipo_servicio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(1, '12345678A', 'oscar', 'espada', 'oscarespada@gmail.com', 'oscar123', '1990-01-01', '123456789'),
(2, '98765432B', 'kike', 'zaporta', 'kikezaporta@gmail.com', 'kike123', '1985-05-15', '987654321'),
(3, '55555555C', 'paula', 'bejar', 'paulabejar@gmail.com', 'paula123', '1988-07-20', '555555555'),
(4, '11111111Q', 'alba', 'lorenz', 'albalorenz@gmail.com', 'alba123', '2003-06-01', '666666666');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_entidad`
--

CREATE TABLE `usuario_entidad` (
  `id_usuario` int NOT NULL,
  `id_entidad` int NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(1, 2),
(2, 2),
(3, 2);

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
(1, '6', 'piso ', 1);

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
  ADD PRIMARY KEY (`id_usuario`,`id_usuario1`),
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
  ADD KEY `fk_oferta_has_inmueble_oferta_idx` (`id_oferta`);

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
  MODIFY `id_documento` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `id_entidad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id_inmueble` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `id_negocio` int NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_oferta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `recuperar_pass`
--
ALTER TABLE `recuperar_pass`
  MODIFY `id_recuperar_password` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `id_tipo_servicio` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_vivienda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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