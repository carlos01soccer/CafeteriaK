-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2022 a las 05:06:17
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteriak`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) NOT NULL,
  `nombre_categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Bebidas'),
(2, 'Comidas'),
(3, 'Pasabocas'),
(4, 'Postres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

CREATE TABLE `inventarios` (
  `id_inventario` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `cantidad_total_producto` int(5) NOT NULL,
  `cantidad_actual_producto` int(5) NOT NULL,
  `cantidad_vendido_producto` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventarios`
--

INSERT INTO `inventarios` (`id_inventario`, `id_producto`, `cantidad_total_producto`, `cantidad_actual_producto`, `cantidad_vendido_producto`) VALUES
(1, 1, 17, 12, 5),
(2, 2, 15, 12, 3),
(3, 3, 12, 12, 0),
(4, 4, 7, 7, 0),
(5, 5, 6, 4, 2),
(6, 6, 3, 1, 2),
(7, 7, 20, 5, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `referencia_producto` varchar(10) NOT NULL,
  `precio_producto` int(11) NOT NULL,
  `peso_producto` int(10) NOT NULL,
  `id_categoria_producto` int(10) NOT NULL,
  `cantidad_producto` int(5) NOT NULL,
  `fecha_creacion_producto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `referencia_producto`, `precio_producto`, `peso_producto`, `id_categoria_producto`, `cantidad_producto`, `fecha_creacion_producto`) VALUES
(1, 'Cafe pequeño', 'b00001', 2000, 15, 1, 12, '2022-06-09'),
(2, 'Brownie', 'p00002', 2500, 25, 4, 12, '2022-06-09'),
(3, 'Capucchino mediano', 'b00002', 3000, 20, 1, 12, '2022-06-09'),
(4, 'Ponque ramo', 'p00001', 1500, 30, 3, 7, '2022-06-09'),
(5, 'Pastel de pollo', 'c00001', 3500, 50, 2, 4, '2022-06-09'),
(6, 'Empanada de carnes', 'c00002', 2500, 30, 2, 1, '2022-06-09'),
(7, 'Croissant Melocoton', 'q00001', 4000, 210, 3, 5, '2022-06-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(10) NOT NULL,
  `id_producto_venta` int(10) NOT NULL,
  `unidades_venta` int(5) NOT NULL,
  `precio_unidad_venta` int(10) NOT NULL,
  `precio_total_venta` int(10) NOT NULL,
  `fecha_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_producto_venta`, `unidades_venta`, `precio_unidad_venta`, `precio_total_venta`, `fecha_venta`) VALUES
(1, 1, 2, 2000, 4000, '2022-06-09'),
(2, 2, 3, 2500, 7500, '2022-06-09'),
(3, 6, 1, 2500, 2500, '2022-06-09'),
(4, 5, 2, 3500, 7000, '2022-06-09'),
(5, 1, 3, 2000, 6000, '2022-06-09'),
(6, 6, 1, 2500, 2500, '2022-06-09'),
(7, 7, 15, 4000, 60000, '2022-06-09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria_producto` (`id_categoria_producto`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_producto_venta` (`id_producto_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  MODIFY `id_inventario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
