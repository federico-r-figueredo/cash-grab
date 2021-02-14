-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2019 a las 17:17:04
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id_banco` int(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `telefono_1` int(30) DEFAULT NULL,
  `telefono_2` int(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `notas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id_banco`, `nombre`, `direccion`, `telefono_1`, `telefono_2`, `email`, `notas`) VALUES
(17, 'Banco Frances BBVA', 'Cordoba 124', 154235487, 430568974, 'info@bbva.com.ar', 'nota'),
(18, 'Santander Rio', 'Mendoza 452', 1547896, 1547896, 'info@santander.com.ar', 'Preguntar por Adrian Espindola.'),
(19, 'Macro', 'San Juan 14587', 157426998, 4512358, 'info@macro.com.ar', 'Contacto: Clara Lopez.'),
(20, 'Galicia', 'Roca 587', 157426998, 4512358, 'info@galicia.com.ar', 'nota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `id_banco` int(4) NOT NULL,
  `nro_cuenta` bigint(40) NOT NULL,
  `cbu` bigint(40) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `id_usr`, `id_banco`, `nro_cuenta`, `cbu`, `tipo`) VALUES
(1, 2, 17, 16516211654165, 161561846162, 1),
(2, 4, 19, 1612355168125468, 62165168415, 1),
(3, 9, 18, 6548646121, 6546846512, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `evento` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `id_usr`, `evento`, `fecha`) VALUES
(1, 2, 'Se ha baneado a un usuario', '2019-01-16 00:00:00'),
(2, 9, 'Se ha registrado un usuario', '2019-01-22 00:00:00'),
(3, 9, 'Se ha registrado un usuario', '2019-01-17 00:00:00'),
(4, 6, 'Se ha registrado un usuario', '2019-01-18 00:00:00'),
(5, 10, 'Se ha registrado un usuario', '2019-01-11 00:00:00'),
(6, 2, 'Se ha eliminado un usuario', '2019-01-09 00:00:00'),
(7, 2, 'Se han actualizado los parametros de configuracion', '2019-01-24 00:00:00'),
(8, 2, 'Se ha baneado a un usuario', '2019-01-23 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prestamo` int(11) NOT NULL,
  `monto` int(4) NOT NULL,
  `plazo` datetime NOT NULL,
  `interes` int(4) NOT NULL,
  `costo_adm` int(4) NOT NULL,
  `monto_dev` int(4) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `fecha_prestamo` datetime NOT NULL,
  `estado` int(1) NOT NULL,
  `cuenta_pres` bigint(50) NOT NULL,
  `cbu_pres` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id_prestamo`, `monto`, `plazo`, `interes`, `costo_adm`, `monto_dev`, `id_usr`, `fecha_prestamo`, `estado`, `cuenta_pres`, `cbu_pres`) VALUES
(1, 54000, '2019-03-10 00:00:00', 1000, 500, 5500, 2, '2019-01-13 00:00:00', 1, 45345345347, 45345345353),
(2, 5000, '2019-04-26 00:00:00', 1000, 500, 6500, 3, '2019-01-13 00:00:00', 1, 45345345347, 45345345347),
(3, 5000, '2019-02-04 00:00:00', 1000, 500, 5500, 5, '2019-01-13 00:00:00', 3, 45345345347, 45345345347),
(4, 5000, '2019-02-14 00:00:00', 1000, 500, 5500, 6, '2019-01-13 00:00:00', 3, 45345345347, 45345345347);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `correo` varchar(80) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) NOT NULL DEFAULT '0',
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT '0',
  `apellido` varchar(25) DEFAULT NULL,
  `dni` int(8) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `telefono` int(30) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `salario` int(6) DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `ip` varchar(45) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'Activo',
  `tipo` varchar(10) NOT NULL DEFAULT 'Usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `correo`, `last_session`, `activacion`, `token`, `token_password`, `password_request`, `apellido`, `dni`, `direccion`, `telefono`, `sexo`, `fecha_nac`, `salario`, `fecha_registro`, `ip`, `estado`, `tipo`) VALUES
(2, 'Fedex', '$2y$10$ktF4MPwLl7RVT/VR847AgO0FnXF3YmIoj2Nqf5qAlNejXfUNr4cvi', 'Federico', 'federicofigueredo87@gmail.com', '2019-01-15 01:35:14', 1, 'ee150c52db51190c14be4d4c67c4a96f', '', 1, 'Figueredo', 33241675, 'Paraguay 1756 Dpto. 3', 157201268, 'Masculino', '1987-10-25', 20000, '2019-01-11', '127.0.0.1', '1', '2'),
(3, 'Carl', '', 'Carlos', 'carlos@live.com.ar', NULL, 0, '', NULL, 0, 'Lopez', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-08', '', '1', '1'),
(4, 'Ceci', '123456', 'Cecilia', 'cecilia@live.com.ar', NULL, 0, '', NULL, 0, 'Bianchi', 34251789, NULL, NULL, NULL, NULL, NULL, '2019-01-12', '', '1', '1'),
(5, 'Pedrito', '', 'Pedro', 'pedro@live.com.ar', NULL, 0, '', NULL, 0, 'Perez', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-08', '', '1', '1'),
(6, 'Juancho', '', 'Juan', 'juan@live.com.ar', NULL, 0, '', NULL, 0, 'Lovotti', NULL, NULL, NULL, NULL, '2019-01-08', NULL, '0000-00-00', '', '1', '1'),
(9, 'Andy', '', 'Andres', 'andres@live.com.ar', NULL, 0, '', NULL, 0, 'Gutierrez', NULL, NULL, NULL, NULL, '2019-01-08', NULL, '0000-00-00', '', '1', '1'),
(10, 'Alberto', '', 'Alberto', 'andres@live.com.ar', NULL, 0, '', NULL, 0, 'Juarez', NULL, NULL, NULL, NULL, '2019-01-08', NULL, '0000-00-00', '', '1', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id_banco`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usr` (`id_usr`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prestamo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id_banco` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `cuentas_ibfk_2` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id_banco`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
