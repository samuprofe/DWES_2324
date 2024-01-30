-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-01-2024 a las 17:17:37
-- Versión del servidor: 8.0.34-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int NOT NULL,
  `idMensaje` int NOT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id`, `idMensaje`, `idUsuario`) VALUES
(22, 14, 58),
(31, 26, 58),
(63, 16, 58),
(65, 14, 56),
(66, 25, 58);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int NOT NULL,
  `nombreArchivo` varchar(200) COLLATE utf8mb3_spanish_ci NOT NULL,
  `idMensaje` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `nombreArchivo`, `idMensaje`) VALUES
(3, '470d74ab47b5d60c457818ed95a4eb07.png', 25),
(4, 'e5985938e2ac4d7bb7a0432156e1b63d.png', 25),
(5, 'a4a63bb5e4fe4973e45157e01633724e.png', 25),
(6, '9283a1f73812face55a62a6f177533c6.png', 25),
(7, '89f653dfcfb11ffc66be84e27d4db07d.png', 25),
(8, 'fc4f4c3e8a9bb19b0adef26e80025c1a.png', 27),
(9, 'd8498ecc331184528b497054ff478fa3.png', 27),
(10, 'dfe7e9a9c79b09f95115bef6842e3e4b.png', 27),
(11, 'ca4b55f29ac3c2a29d49467de37922f5.png', 27),
(12, '0b61654cde8c0764e80fa9807818e97e.png', 27),
(13, 'e05efc9e16e6314851963d67ea5ff753.png', 27),
(14, '5191e624f3d6778bc7f626569ac67321.png', 27),
(15, '6fafa7bb71660e8477fb8066c367d876.png', 27),
(16, '539d795bf60c38e4e73e85f8d2da22f1.png', 27),
(17, '0c9bdda23e5f2067978a96c367b6e63b.png', 27),
(18, 'dce0a84df0fff74a442ad0d75c462ecd.png', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int NOT NULL,
  `titulo` varchar(1000) COLLATE utf8mb3_spanish_ci NOT NULL,
  `texto` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `idUsuario` int NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `titulo`, `texto`, `idUsuario`, `fecha`) VALUES
(14, 'título del mensaje (editado2)', 'texto del mensaje (editado2)', 43, '2023-10-17 15:46:22'),
(16, 'asdf', 'asdf', 1, '2023-10-31 16:19:21'),
(25, 'aaaaaaaaaaaa', 'aaaaaaaa', 58, '2024-01-19 16:37:26'),
(26, 'aaaaaaaaaaaaaaa', 'bbbbbbbbbbbbb', 58, '2024-01-23 16:19:59'),
(27, 'asdf', 'asdf', 56, '2024-01-30 15:44:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `email` varchar(200) COLLATE utf8mb3_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL,
  `foto` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `sid` varchar(200) COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `foto`, `sid`) VALUES
(1, 'pepe@gmail.com', '1234', NULL, ''),
(43, 'manolo@gmail.com', '1234', 'usuario.jpg', ''),
(44, 'nuevo@gmail.com', '1234', '0', ''),
(45, 'pepe1@gmail.com', '$2y$10$V8iqCVVBPl8FwyTnJOpdx.kOhfuvT/kxAK8tefP8xMMXYBvgVa2rK', '0', ''),
(49, 'pepe2@gmail.com', '$2y$10$cWxDPi2XTVcbATYUpz5R6uDURXGLXXkkdp2ZvsOQMPHx/vg64HaEW', '', ''),
(50, 'aa@aa.com', '$2y$10$41.euksw2RL3wTSpKpMGB.oRSDkOKyhFkHTyhVsRPPxAiGaRYyQxG', '', ''),
(51, 'pepe3@mail.com', '$2y$10$M8lR22MlWU8PM/jM5ZXI1OcMo/P6qDVxFBet6F/idM/QhxOvou/ZG', 'casa-de-diseno-contemporaneo26-1637602658.jpg', ''),
(52, 'pepe4@mail.com', '$2y$10$xjAO/dzd1mOb8v61.K8q../SAe8S02rbRnYgFkIL3sJ1tl/I7uluW', 'casa-de-diseno-contemporaneo26-1637602658.jpg', ''),
(53, 'pepe4@gmail.com', '$2y$10$IgW2x0T/aCbCp7u/mjg94.Rj9b8owLyQVcgcCGqg/.ji7Ve/zAU..', '4519678.png', ''),
(54, 'pepe5@gmail.com', '$2y$10$/Zb3EVcKQR5loIjVzfMt/OIo7qSHmDCqVMil0R5Je6YKJM6sUtTmG', 'b57734df3b7970b41d9a4865532af261..', ''),
(55, 'pepe6@gmail.com', '$2y$10$7OsSAedxUF5G0.dU7F4zf.v9ICnEq4klbSrIN8eVSRMfZ/bJNyby6', '33cf177a0643303504f33b279263d6f7.png', ''),
(56, 'pepe7@gmail.com', '$2y$10$Y6zzasLdxxIaLjieENUbq.azWt2gSHiFUKqhJRXmsdwo3BTgKXQGa', '89db9a2e909fa96085a5f58fbacfb2fa.png', ''),
(57, 'pepe8@gmail.com', '$2y$10$uTvEfkS00dFuh7DoyEazJu7Mb7op57MBq.ec7bRdFjVSYMbutrKUK', '9e4d3fb3272c03e8e858f4fc20f797df.png', ''),
(58, 'pepe11@gmail.com', '$2y$10$lPk.uPPm//BLnGb/4iFiVOfxvMEmhXDCh8cY8Lm6HiboPdJBETAMe', '384da61245d6bce765277f397d817291.jpg', '45945fe2efa87eb2f2269dbe2507273637908f43'),
(59, 'pepe99@gmail.com', '$2y$10$6ckZHSxgWCYe7evgi0pmXOhVrs4511DKqTpftcTYTrjSnV8aaChki', 'fbb073d5c241429b06abb8f73f9ded9e.png', '6218035792d8dd414e982a6095ea734b39bdc030'),
(60, 'pepe20@gmail.com', '$2y$10$znNOgXFDbh1uDj643nnyGOrRmFdxvBPZXhNXKJmdg9wSNPpB/vqwO', 'bc285d3b7162045b6b298f1802f9e721.jpg', 'cb8e1ca1aaee80b6ca170b15b3dcc61d7f82ddff');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMensaje` (`idMensaje`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMensaje` (`idMensaje`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`idMensaje`) REFERENCES `mensajes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`idMensaje`) REFERENCES `mensajes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
