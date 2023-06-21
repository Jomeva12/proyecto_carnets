-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2022 a las 10:53:42
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcarnets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carnet`
--

CREATE TABLE `carnet` (
  `idCarnet` int(11) NOT NULL,
  `fechaEntrega` varchar(45) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Cita_idCita` int(11) NOT NULL,
  `EstadoDeCarnet_idEstadoDeCarnet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carnet`
--

INSERT INTO `carnet` (`idCarnet`, `fechaEntrega`, `Usuario_idUsuario`, `Cita_idCita`, `EstadoDeCarnet_idEstadoDeCarnet`) VALUES
(1, '2022-06-05 18:33:36', 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idCita` int(11) NOT NULL,
  `fechaDeProgramacion` varchar(45) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `EstadoDeCita_idEstadoDeCita1` int(11) NOT NULL,
  `Horarios_idHorarios1` int(11) NOT NULL,
  `fechaDeCita` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idCita`, `fechaDeProgramacion`, `Usuario_idUsuario`, `EstadoDeCita_idEstadoDeCita1`, `Horarios_idHorarios1`, `fechaDeCita`) VALUES
(2, '2022-05-14 18:52:33', 1, 2, 2, '2022-05-25'),
(3, '2022-05-24 10:45:47', 2, 2, 2, '2022-08-20'),
(4, '2022-06-06 01:46:05', 1, 1, 6, '2022-06-29'),
(7, '2022-06-06 02:55:54', 2, 2, 3, '2022-06-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diassemana`
--

CREATE TABLE `diassemana` (
  `idDiasSemana` int(11) NOT NULL,
  `nombreDia` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `diassemana`
--

INSERT INTO `diassemana` (`idDiasSemana`, `nombreDia`, `estado`) VALUES
(1, 'lunes', 'cerrado'),
(2, 'martes', 'abierto'),
(3, 'miercoles', 'abierto'),
(4, 'jueves', 'cerrado'),
(5, 'viernes', 'abierto'),
(6, 'sabado', 'abierto'),
(7, 'domingo', 'abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadodecarnet`
--

CREATE TABLE `estadodecarnet` (
  `idEstadoDeCarnet` int(11) NOT NULL,
  `nombreEstadoCarnet` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadodecarnet`
--

INSERT INTO `estadodecarnet` (`idEstadoDeCarnet`, `nombreEstadoCarnet`) VALUES
(1, 'En cita'),
(2, 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadodecita`
--

CREATE TABLE `estadodecita` (
  `idEstadoDeCita` int(11) NOT NULL,
  `nombreDeestado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadodecita`
--

INSERT INTO `estadodecita` (`idEstadoDeCita`, `nombreDeestado`) VALUES
(1, 'Asignada'),
(2, 'Cancelada'),
(3, 'Cumplida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechasrestriccion`
--

CREATE TABLE `fechasrestriccion` (
  `idfechasRestriccion` int(11) NOT NULL,
  `fecha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fechasrestriccion`
--

INSERT INTO `fechasrestriccion` (`idfechasRestriccion`, `fecha`) VALUES
(16, '2022-06-11'),
(17, '2022-06-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `idHorarios` int(11) NOT NULL,
  `horas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`idHorarios`, `horas`) VALUES
(2, '18:49'),
(3, '00:47'),
(4, '23:41'),
(5, '01:18'),
(6, '03:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roll`
--

CREATE TABLE `roll` (
  `idRoll` int(11) NOT NULL,
  `nombreRoll` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roll`
--

INSERT INTO `roll` (`idRoll`, `nombreRoll`) VALUES
(1, 'Administrador'),
(2, 'Estudiante'),
(3, 'dueño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `foto` varchar(145) DEFAULT NULL,
  `clave` varchar(45) NOT NULL,
  `fechaDeRegistro` varchar(45) NOT NULL,
  `Roll_idRoll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombres`, `codigo`, `foto`, `clave`, `fechaDeRegistro`, `Roll_idRoll`) VALUES
(1, 'pedro', '456', '../assets/fotos/5d265b3d3eb7edd207ef97d5b7a51a59.jpg', '456', '2022-05-14 18:47:38', 1),
(2, 'maria', '123', '../assets/fotos/e33d6362fe99691258060f794e6a72d0.jpg', '123', '2022-05-24 08:57:24', 2),
(3, 'aaa', '123', '../assets/fotos/71fee245381ccf73cde1159fd3f3f986.jpg', 'ccc', '2022-06-05 22:22:29', 2),
(4, 'aaa', '123', '../assets/fotos/5d780ddad35842213f08314a7a9eaf7b.jpg', 'ccc', '2022-06-05 22:24:19', 1),
(5, 'aaa', '123', '../assets/fotos/19cabe7f08bf3ebad55e4d9e77ee8aac.jpg', 'ccc', '2022-06-05 22:32:46', 2),
(6, 'aaa', '123', '../assets/fotos/5772181384f2c86ade82428af267c441.jpg', 'ccc', '2022-06-05 22:45:05', 2),
(7, 'aaa', '123', './assets/fotos/1a5b1a480c476fc29525441c1b345aac.jpg', 'ccc', '2022-06-05 22:45:36', 2),
(8, 'aaa', '123', '../assets/fotos/2b8dcd16d0d16c7d99aceac27798e540.jpg', 'ccc', '2022-06-05 22:46:01', 2),
(9, 'aaa', '123', './assets/fotos/9c675ea433b65dc24f1bb88ab19b9d07.jpg', 'ccc', '2022-06-05 22:46:16', 2),
(10, 'aaa', '123', '../fotos/ab51c57a93e803c1e5336f8be6684c5c.jpg', 'ccc', '2022-06-05 22:47:46', 2),
(11, 'aaa', '123', '../../assets/fotos/f18b83f1ba0a75a7a411d521f97445fb.jpg', 'ccc', '2022-06-05 22:48:22', 2),
(12, 'aaa', '123', '../assets/fotos/93103f7f43fbfdd1a5e47fe88be3cf63.jpg', 'ccc', '2022-06-05 22:50:26', 2),
(13, 'aaa', '123', './vista/assets/fotos/7941606252a550064402d0d164c251fe.jpg', 'ccc', '2022-06-05 22:52:35', 2),
(14, 'aaa', '123', '../vista/assets/fotos/ca15d27569975a3342e736478c97a629.jpg', 'ccc', '2022-06-05 22:53:11', 2),
(15, 'xxxx', '123', '../assets/fotos/5d265b3d3eb7edd207ef97d5b7a51a59.jpg', 'ccc', '2022-06-05 22:53:53', 2),
(16, 'qqq', '123', '../assets/fotos/b71eba0413bf719194010343d7b56a1c.jpg', 'ccc', '2022-06-05 23:01:21', 2),
(17, 'yyyy', '123', '../assets/fotos/447fe25e620361b5443c589db7b619a5.jpg', 'ccc', '2022-06-05 23:02:40', 2),
(18, 'ooooo', '123', '../assets/fotos/3d97a084297118375fb9a8ac963e2dcf.jpg', 'ccc', '2022-06-05 23:03:31', 1),
(19, 'zzzz', '123', '../assets/fotos/37f71f274cd115af69a0a0d82b8665f8.jpg', 'ccc', '2022-06-05 23:05:23', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carnet`
--
ALTER TABLE `carnet`
  ADD PRIMARY KEY (`idCarnet`),
  ADD KEY `fk_Carnet_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Carnet_Cita1_idx` (`Cita_idCita`),
  ADD KEY `fk_Carnet_EstadoDeCarnet1_idx` (`EstadoDeCarnet_idEstadoDeCarnet`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `fk_Cita_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Cita_EstadoDeCita1_idx` (`EstadoDeCita_idEstadoDeCita1`),
  ADD KEY `fk_Cita_Horarios1_idx` (`Horarios_idHorarios1`);

--
-- Indices de la tabla `diassemana`
--
ALTER TABLE `diassemana`
  ADD PRIMARY KEY (`idDiasSemana`);

--
-- Indices de la tabla `estadodecarnet`
--
ALTER TABLE `estadodecarnet`
  ADD PRIMARY KEY (`idEstadoDeCarnet`);

--
-- Indices de la tabla `estadodecita`
--
ALTER TABLE `estadodecita`
  ADD PRIMARY KEY (`idEstadoDeCita`);

--
-- Indices de la tabla `fechasrestriccion`
--
ALTER TABLE `fechasrestriccion`
  ADD PRIMARY KEY (`idfechasRestriccion`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`idHorarios`);

--
-- Indices de la tabla `roll`
--
ALTER TABLE `roll`
  ADD PRIMARY KEY (`idRoll`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_Roll1_idx` (`Roll_idRoll`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carnet`
--
ALTER TABLE `carnet`
  MODIFY `idCarnet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `diassemana`
--
ALTER TABLE `diassemana`
  MODIFY `idDiasSemana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estadodecarnet`
--
ALTER TABLE `estadodecarnet`
  MODIFY `idEstadoDeCarnet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estadodecita`
--
ALTER TABLE `estadodecita`
  MODIFY `idEstadoDeCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fechasrestriccion`
--
ALTER TABLE `fechasrestriccion`
  MODIFY `idfechasRestriccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `idHorarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roll`
--
ALTER TABLE `roll`
  MODIFY `idRoll` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carnet`
--
ALTER TABLE `carnet`
  ADD CONSTRAINT `fk_Carnet_Cita1` FOREIGN KEY (`Cita_idCita`) REFERENCES `cita` (`idCita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Carnet_EstadoDeCarnet1` FOREIGN KEY (`EstadoDeCarnet_idEstadoDeCarnet`) REFERENCES `estadodecarnet` (`idEstadoDeCarnet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Carnet_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_Cita_EstadoDeCita1` FOREIGN KEY (`EstadoDeCita_idEstadoDeCita1`) REFERENCES `estadodecita` (`idEstadoDeCita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cita_Horarios1` FOREIGN KEY (`Horarios_idHorarios1`) REFERENCES `horarios` (`idHorarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cita_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Roll1` FOREIGN KEY (`Roll_idRoll`) REFERENCES `roll` (`idRoll`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
