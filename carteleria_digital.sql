-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-04-2019 a las 22:58:26
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carteleria_digital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartel_producto`
--

CREATE TABLE `cartel_producto` (
  `ID_CARTEL_PRODUCTO` int(11) NOT NULL,
  `ID_EFECTO` int(11) DEFAULT NULL,
  `NOMBRE_CARTEL_PRODUCTO` varchar(200) DEFAULT NULL,
  `DIAS_OFERTA_CARTEL_PRODUCTO` varchar(200) DEFAULT NULL,
  `OFERTA_CARTEL_PRODUCTO` varchar(200) DEFAULT NULL,
  `VALOR_CARTEL_PRODUCTO` varchar(200) DEFAULT NULL,
  `TEXTO_INFORMATIVO_CARTEL_PRODUCTO` varchar(200) DEFAULT NULL,
  `FOTO_CARTEL_PRODUCTO` varchar(200) DEFAULT NULL,
  `FONDO_PANTALLA_CARTEL_PRODUCTO` varchar(200) DEFAULT NULL,
  `DURACION_CARTEL_PRODUCTO` int(11) DEFAULT NULL,
  `TIPO_CARTEL` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cartel_producto`
--

INSERT INTO `cartel_producto` (`ID_CARTEL_PRODUCTO`, `ID_EFECTO`, `NOMBRE_CARTEL_PRODUCTO`, `DIAS_OFERTA_CARTEL_PRODUCTO`, `OFERTA_CARTEL_PRODUCTO`, `VALOR_CARTEL_PRODUCTO`, `TEXTO_INFORMATIVO_CARTEL_PRODUCTO`, `FOTO_CARTEL_PRODUCTO`, `FONDO_PANTALLA_CARTEL_PRODUCTO`, `DURACION_CARTEL_PRODUCTO`, `TIPO_CARTEL`) VALUES
(1, 1, 'MIGRANOL', 'TODOS LOS LUNES', 'OFERTA', '$ 990', 'TEXTO INFORMATIVO', '1_foto_producto.png', '1_fondo_cartel.jpg', 7000, 'producto-plantilla-1'),
(2, 1, 'CINABEL', 'TODOS LOS JUEVES', 'APROVECHE', '1100', '', '2_foto_producto.png', NULL, 8000, 'producto-plantilla-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `efecto`
--

CREATE TABLE `efecto` (
  `ID_EFECTO` int(11) NOT NULL,
  `NOMBRE_EFECTO` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `efecto`
--

INSERT INTO `efecto` (`ID_EFECTO`, `NOMBRE_EFECTO`) VALUES
(1, 'PRECIO LATENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenedor`
--

CREATE TABLE `mantenedor` (
  `ID_MANTENEDOR` int(11) NOT NULL,
  `NOMBRE_MANTENEDOR` varchar(300) DEFAULT NULL,
  `UBICACION_MANTENEDOR` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mantenedor`
--

INSERT INTO `mantenedor` (`ID_MANTENEDOR`, `NOMBRE_MANTENEDOR`, `UBICACION_MANTENEDOR`) VALUES
(1, 'CARTEL', 'frm_cartel.php'),
(2, 'ORDEN', 'frm_orden.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenedor_del_permiso`
--

CREATE TABLE `mantenedor_del_permiso` (
  `ID_MANTENEDOR_DEL_PERMISO` int(11) NOT NULL,
  `ID_PERMISO` int(11) DEFAULT NULL,
  `ID_MANTENEDOR` int(11) DEFAULT NULL,
  `LISTAR_MANTENEDOR_DEL_PERMISO` varchar(2) DEFAULT NULL,
  `INGRESAR_MANTENEDOR_DEL_PERMISO` varchar(2) DEFAULT NULL,
  `MODIFICAR_MANTENEDOR_DEL_PERMISO` varchar(2) DEFAULT NULL,
  `ELIMINAR_MANTENEDOR_DEL_PERMISO` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mantenedor_del_permiso`
--

INSERT INTO `mantenedor_del_permiso` (`ID_MANTENEDOR_DEL_PERMISO`, `ID_PERMISO`, `ID_MANTENEDOR`, `LISTAR_MANTENEDOR_DEL_PERMISO`, `INGRESAR_MANTENEDOR_DEL_PERMISO`, `MODIFICAR_MANTENEDOR_DEL_PERMISO`, `ELIMINAR_MANTENEDOR_DEL_PERMISO`) VALUES
(1, 1, 1, 'si', 'si', 'si', 'si'),
(2, 1, 2, 'SI', 'SI', 'SI', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `ID_PERMISO` int(11) NOT NULL,
  `NOMBRE_PERMISO` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`ID_PERMISO`, `NOMBRE_PERMISO`) VALUES
(1, 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reproduccion`
--

CREATE TABLE `reproduccion` (
  `ID_REPRODUCCION` int(11) NOT NULL,
  `ID_CARTEL_PRODUCTO` int(11) DEFAULT NULL,
  `ORDEN_REPRODUCCION` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reproduccion`
--

INSERT INTO `reproduccion` (`ID_REPRODUCCION`, `ID_CARTEL_PRODUCTO`, `ORDEN_REPRODUCCION`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `ID_PERMISO` int(11) DEFAULT NULL,
  `NOMBRE_USUARIO` varchar(200) DEFAULT NULL,
  `CONTRASENA_USUARIO` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `ID_PERMISO`, `NOMBRE_USUARIO`, `CONTRASENA_USUARIO`) VALUES
(1, 1, 'ROYSTANDENB', '164289273');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cartel_producto`
--
ALTER TABLE `cartel_producto`
  ADD PRIMARY KEY (`ID_CARTEL_PRODUCTO`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_EFECTO`);

--
-- Indices de la tabla `efecto`
--
ALTER TABLE `efecto`
  ADD PRIMARY KEY (`ID_EFECTO`);

--
-- Indices de la tabla `mantenedor`
--
ALTER TABLE `mantenedor`
  ADD PRIMARY KEY (`ID_MANTENEDOR`);

--
-- Indices de la tabla `mantenedor_del_permiso`
--
ALTER TABLE `mantenedor_del_permiso`
  ADD PRIMARY KEY (`ID_MANTENEDOR_DEL_PERMISO`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_MANTENEDOR`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_PERMISO`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`ID_PERMISO`);

--
-- Indices de la tabla `reproduccion`
--
ALTER TABLE `reproduccion`
  ADD PRIMARY KEY (`ID_REPRODUCCION`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_CARTEL_PRODUCTO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_PERMISO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cartel_producto`
--
ALTER TABLE `cartel_producto`
  MODIFY `ID_CARTEL_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `efecto`
--
ALTER TABLE `efecto`
  MODIFY `ID_EFECTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mantenedor`
--
ALTER TABLE `mantenedor`
  MODIFY `ID_MANTENEDOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mantenedor_del_permiso`
--
ALTER TABLE `mantenedor_del_permiso`
  MODIFY `ID_MANTENEDOR_DEL_PERMISO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `ID_PERMISO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `reproduccion`
--
ALTER TABLE `reproduccion`
  MODIFY `ID_REPRODUCCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cartel_producto`
--
ALTER TABLE `cartel_producto`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_EFECTO`) REFERENCES `efecto` (`ID_EFECTO`);

--
-- Filtros para la tabla `mantenedor_del_permiso`
--
ALTER TABLE `mantenedor_del_permiso`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_MANTENEDOR`) REFERENCES `mantenedor` (`ID_MANTENEDOR`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_PERMISO`) REFERENCES `permiso` (`ID_PERMISO`);

--
-- Filtros para la tabla `reproduccion`
--
ALTER TABLE `reproduccion`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_CARTEL_PRODUCTO`) REFERENCES `cartel_producto` (`ID_CARTEL_PRODUCTO`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_PERMISO`) REFERENCES `permiso` (`ID_PERMISO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
