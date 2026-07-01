-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2026 a las 18:12:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lp_2026`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(3, 'Componente'),
(1, 'Monitor'),
(2, 'Periferico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `dni` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tipo` enum('Empresa','Particular') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `razon_social` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cuit` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefono` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `domicilio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `apellido`, `nombres`, `dni`, `tipo`, `razon_social`, `cuit`, `correo`, `telefono`, `domicilio`) VALUES
(1, 'Almada', 'Leandro', '23234242', 'Particular', 'Tienda Almada', '20232342425', 'Almada22@hotmail.com', '2978984564', 'Avenida Ejemplo 22, 3232');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(25) NOT NULL,
  `descripcion` text NOT NULL,
  `categoriaId` int(10) UNSIGNED NOT NULL,
  `precio` float(12,2) NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `descripcion`, `categoriaId`, `precio`, `stock`) VALUES
(5, 'monitor gamer', '2s2', 'monitor ultra wide 4k 120hz con luces inutiles incluidas y precio', 1, 2000000.00, 5),
(6, 'monitor de oficina', '22a', 'monitor basico de oficina, por si no queres uno gamer', 1, 333222.00, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `cuenta` varchar(20) NOT NULL,
  `perfil` enum('Administrador','Operador') NOT NULL,
  `clave` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fechaAlta` date NOT NULL,
  `resetPass` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `apellido`, `nombres`, `cuenta`, `perfil`, `clave`, `correo`, `estado`, `fechaAlta`, `resetPass`) VALUES
(2, 'Almonacid', 'Enzo', 'enzoOp', 'Operador', '$2y$10$GfXQoYELgK8ZJtiZqM0KIuouTDOxJu9FCO93CAv9tj1pqaqdmkBjy', 'enzo.alm@prueba.com', 1, '2026-07-01', 0),
(3, 'Almonacid', 'Alan', 'AlanAdm', 'Administrador', '$2y$10$bwBqrtoMt7TY77553bL1LuwlvH9IDuTML2qttlkowDS4K20xcmPbi', 'alan2alm@prueba.com', 1, '2026-06-30', 0),
(4, 'Almonacid', 'Jesus', 'jesus2alm', 'Operador', '$2y$10$AbfPEFLb3AdnYa0VAmcpBuWSVBe.bSensQ8G1ka3/pssBcpaLehNy', 'jesus2almonacid@hotmail.com', 1, '2026-06-30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(10) NOT NULL,
  `numero_venta` varchar(20) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `cliente` varchar(100) NOT NULL,
  `forma_pago` enum('Tarjeta','Efectivo','Transferencia','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `numero_venta`, `fecha`, `cliente`, `forma_pago`) VALUES
(3, '00-0001', '2026-07-01', 'Tienda Almada', 'Tarjeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(10) UNSIGNED NOT NULL,
  `venta_id` int(10) UNSIGNED NOT NULL,
  `codigo_producto` varchar(25) NOT NULL,
  `cantidad` int(100) UNSIGNED NOT NULL,
  `precio_unitario` decimal(12,2) NOT NULL,
  `total` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `codigo_producto`, `cantidad`, `precio_unitario`, `total`) VALUES
(3, 3, '2s2', 2, 2000000.00, 4000000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_numeracion`
--

CREATE TABLE `ventas_numeracion` (
  `ultimo_numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorias_unique` (`nombre`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productos_unique` (`codigo`),
  ADD UNIQUE KEY `productos_nombre_IDX` (`nombre`,`categoriaId`) USING BTREE,
  ADD KEY `productos_categorias_FK` (`categoriaId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_unique` (`cuenta`),
  ADD UNIQUE KEY `usuarios_unique_1` (`correo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categorias_FK` FOREIGN KEY (`categoriaId`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
