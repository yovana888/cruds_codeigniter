-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2021 a las 21:26:49
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `megan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributo`
--

CREATE TABLE `atributo` (
  `IdAtributo` int(11) NOT NULL,
  `TipoAtributo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `NombreAtributo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `IndicadorEstado` varchar(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaproducto`
--

CREATE TABLE `categoriaproducto` (
  `IdCategoriaProducto` int(10) NOT NULL,
  `NombreCategoriaProducto` varchar(40) NOT NULL DEFAULT '',
  `EstadoNoEspecificado` varchar(1) NOT NULL COMMENT '1 : Indica que es No Especificado , 0 : Indica que no es No Especificado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoriaproducto`
--

INSERT INTO `categoriaproducto` (`IdCategoriaProducto`, `NombreCategoriaProducto`, `EstadoNoEspecificado`) VALUES
(0, 'NO ESPECIFICADO', '1'),
(1, 'MERCADERIA', '0'),
(2, 'SERVICIO', '0'),
(3, 'COSTO AGREGADO', '0'),
(4, 'GASTOS', '0'),
(5, 'ACTIVO FIJO', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciongeneral`
--

CREATE TABLE `configuraciongeneral` (
  `IdConfiguracionGeneral` int(11) NOT NULL,
  `IdTipoConfiguracion` int(11) NOT NULL,
  `Valor` int(6) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `UsuarioRegistro` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `UsuarioModificacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `IndicadorEstado` varchar(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `configuraciongeneral`
--

INSERT INTO `configuraciongeneral` (`IdConfiguracionGeneral`, `IdTipoConfiguracion`, `Valor`, `FechaRegistro`, `FechaModificacion`, `UsuarioRegistro`, `UsuarioModificacion`, `IndicadorEstado`) VALUES
(1, 1, 18, '2020-12-01 12:52:45', NULL, 'Yovana', NULL, 'A'),
(2, 2, 3, '2020-12-01 12:52:45', NULL, 'yovana', NULL, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `IdDepartamento` int(5) NOT NULL,
  `NombreDepartamento` varchar(50) DEFAULT NULL,
  `CodigoUbigeoDepartamento` varchar(2) DEFAULT NULL,
  `IndicadorEstado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`IdDepartamento`, `NombreDepartamento`, `CodigoUbigeoDepartamento`, `IndicadorEstado`) VALUES
(17, 'MADRE DE DIOS', '17', 'A'),
(16, 'LORETO', '16', 'A'),
(15, 'LIMA', '15', 'A'),
(14, 'LAMBAYEQUE', '14', 'A'),
(13, 'LA LIBERTAD', '13', 'A'),
(12, 'JUNÍN', '12', 'A'),
(11, 'ICA', '11', 'A'),
(10, 'HUÁNUCO', '10', 'A'),
(9, 'HUANCAVELICA', '09', 'A'),
(8, 'CUSCO', '08', 'A'),
(7, 'CALLAO', '90', 'A'),
(6, 'CAJAMARCA', '05', 'A'),
(5, 'AYACUCHO', '05', 'A'),
(4, 'AREQUIPA', '04', 'A'),
(3, 'APURÍMAC', '03', 'A'),
(2, 'ÁNCASH', '02', 'A'),
(1, 'AMAZONAS', '01', 'A'),
(18, 'MOQUEGUA', '18', 'A'),
(19, 'PASCO', '19', 'A'),
(20, 'PIURA', '20', 'A'),
(21, 'PUNO', '21', 'A'),
(22, 'SAN MARTÍN', '22', 'A'),
(23, 'TACNA', '23', 'A'),
(24, 'TUMBES', '24', 'A'),
(25, 'UCAYALI', '25', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallekitproducto`
--

CREATE TABLE `detallekitproducto` (
  `IdDetalleKitProducto` int(11) NOT NULL,
  `IdKitProducto` int(11) NOT NULL,
  `IdPrecioUnidadMedida` int(10) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `DescontarInventario` int(11) NOT NULL,
  `UsuarioModificacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `UsuarioEliminacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `IndicadorEstado` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `UsuarioRegistro` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `FechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccionpersona`
--

CREATE TABLE `direccionpersona` (
  `IdDireccionPersona` int(11) NOT NULL,
  `IdPersona` int(10) NOT NULL,
  `Direccion` varchar(180) COLLATE utf8_spanish2_ci NOT NULL,
  `UsuarioRegistro` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioModificacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `Descripcion` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `EstadoDireccion` varchar(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `direccionpersona`
--

INSERT INTO `direccionpersona` (`IdDireccionPersona`, `IdPersona`, `Direccion`, `UsuarioRegistro`, `FechaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `Descripcion`, `EstadoDireccion`) VALUES
(1, 1, 'Calle los Sauces #50 con Av. los Granados', 'Yovana', '2021-02-24 11:49:18', 'yovana', '2021-02-26 09:14:56', 'Direccion  de la Razon Social', '1'),
(2, 1, 'Av. Las Bohemias #22', 'Yovana', '2021-02-24 14:35:02', 'yovana', '2021-02-26 08:26:21', 'Direccion de la Persona', '1'),
(3, 14, 'Av. collpa #50', 'YVELASQUEZ', '2021-02-25 10:53:58', NULL, NULL, 'Direccion de la Persona', '1'),
(10, 14, 'Calle Arica #26 - 2do Piso', 'yovana', '2021-02-25 23:02:55', NULL, NULL, 'Direccion Departamento', '1'),
(11, 1, 'Av. Velonica #310', 'yovana', '2021-02-26 08:27:10', 'yovana', '2021-02-26 08:32:09', 'Dirección 2da Sucursal', '1'),
(12, 15, 'Av. Ugarte #68', 'yovana', '2021-03-01 06:40:37', NULL, NULL, 'Direccion de la Persona', '1'),
(13, 16, 'Av. Quiñonez #54', 'yovana', '2021-03-05 04:24:34', NULL, NULL, 'Direccion de la Persona', '1'),
(14, 17, 'Av. Sensou #67', 'yovana', '2021-03-05 08:38:10', NULL, NULL, 'Direccion de la Persona', '1'),
(15, 18, 'Urb. 28 de Julio #45', 'yovana', '2021-03-05 08:49:23', NULL, NULL, 'Direccion de la Persona', '1'),
(16, 18, '-', 'yovana', '2021-03-05 08:49:24', NULL, NULL, 'Direccion de la Razon Social', '1'),
(17, 19, 'Jr. la Union Calle Z #67', 'yovana', '2021-03-05 09:04:00', NULL, NULL, 'Direccion de la Persona', '1'),
(18, 19, '-', 'yovana', '2021-03-05 09:04:01', NULL, NULL, 'Direccion de la Razon Social', '1'),
(19, 20, 'Urb. Villa los Andes #678', 'YVELASQUEZ', '2021-03-05 11:42:26', NULL, NULL, 'Direccion de la Persona', '1'),
(20, 21, 'Urb. los Alpes #654', 'YVELASQUEZ', '2021-03-05 11:51:38', NULL, NULL, 'Direccion de la Persona', '1'),
(21, 22, 'Av. la Luz #567', 'YVELASQUEZ', '2021-03-05 14:18:53', NULL, NULL, 'Direccion de la Persona', '1'),
(22, 23, 'Urb. Nuri #60 con Calle Cerezo #5', 'YVELASQUEZ', '2021-03-08 14:57:25', NULL, NULL, 'Direccion de la Persona', '1'),
(23, 23, '-', 'YVELASQUEZ', '2021-03-08 14:57:25', NULL, NULL, 'Direccion de la Razon Social', '1'),
(24, 24, 'Jr. Tarapaca', 'YVELASQUEZ', '2021-03-08 15:19:29', NULL, NULL, 'Direccion de la Persona', '1'),
(25, 25, 'Urb. Santa Rosa #56', 'YVELASQUEZ', '2021-03-08 16:28:17', NULL, NULL, 'Direccion de la Persona', '1'),
(26, 25, '-', 'YVELASQUEZ', '2021-03-08 16:28:17', NULL, NULL, 'Direccion de la Razon Social', '1'),
(27, 26, 'Urb. Villa Fuente #7', 'YVELASQUEZ', '2021-03-08 16:32:56', NULL, NULL, 'Direccion de la Persona', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `IdDistrito` int(10) NOT NULL,
  `NombreDistrito` varchar(50) DEFAULT NULL,
  `CodigoUbigeoDistrito` varchar(2) DEFAULT NULL,
  `IdProvincia` int(5) DEFAULT NULL,
  `IndicadorEstado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`IdDistrito`, `NombreDistrito`, `CodigoUbigeoDistrito`, `IdProvincia`, `IndicadorEstado`) VALUES
(1, 'CHACHAPOYAS', '01', 1, 'A'),
(2, 'ASUNCIÓN', '02', 1, 'A'),
(3, 'BALSAS', '03', 1, 'A'),
(4, 'CHETO', '04', 1, 'A'),
(5, 'CHILIQUIN', '05', 1, 'A'),
(6, 'CHUQUIBAMBA', '06', 1, 'A'),
(7, 'GRANADA', '07', 1, 'A'),
(8, 'HUANCAS', '08', 1, 'A'),
(9, 'LA JALCA', '09', 1, 'A'),
(10, 'LEIMEBAMBA', '10', 1, 'A'),
(11, 'LEVANTO', '11', 1, 'A'),
(12, 'MAGDALENA', '12', 1, 'A'),
(13, 'MARISCAL CASTILLA', '13', 1, 'A'),
(14, 'MOLINOPAMPA', '14', 1, 'A'),
(15, 'MONTEVIDEO', '15', 1, 'A'),
(16, 'OLLEROS', '16', 1, 'A'),
(17, 'QUINJALCA', '17', 1, 'A'),
(18, 'SAN FRANCISCO DE DAGUAS', '18', 1, 'A'),
(19, 'SAN ISIDRO DE MAINO', '19', 1, 'A'),
(20, 'SOLOCO', '20', 1, 'A'),
(21, 'SONCHE', '21', 1, 'A'),
(22, 'BAGUA', '01', 2, 'A'),
(23, 'ARAMANGO', '02', 2, 'A'),
(24, 'COPALLIN', '03', 2, 'A'),
(25, 'EL PARCO', '04', 2, 'A'),
(26, 'IMAZA', '05', 2, 'A'),
(27, 'LA PECA', '06', 2, 'A'),
(28, 'JUMBILLA', '01', 3, 'A'),
(29, 'CHISQUILLA', '02', 3, 'A'),
(30, 'CHURUJA', '03', 3, 'A'),
(31, 'COROSHA', '04', 3, 'A'),
(32, 'CUISPES', '05', 3, 'A'),
(33, 'FLORIDA', '06', 3, 'A'),
(34, 'JAZAN', '07', 3, 'A'),
(35, 'RECTA', '08', 3, 'A'),
(36, 'SAN CARLOS', '09', 3, 'A'),
(37, 'SHIPASBAMBA', '10', 3, 'A'),
(38, 'VALERA', '11', 3, 'A'),
(39, 'YAMBRASBAMBA', '12', 3, 'A'),
(40, 'NIEVA', '01', 4, 'A'),
(41, 'EL CENEPA', '02', 4, 'A'),
(42, 'RÍO SANTIAGO', '03', 4, 'A'),
(43, 'LAMUD', '01', 5, 'A'),
(44, 'CAMPORREDONDO', '02', 5, 'A'),
(45, 'COCABAMBA', '03', 5, 'A'),
(46, 'COLCAMAR', '04', 5, 'A'),
(47, 'CONILA', '05', 5, 'A'),
(48, 'INGUILPATA', '06', 5, 'A'),
(49, 'LONGUITA', '07', 5, 'A'),
(50, 'LONYA CHICO', '08', 5, 'A'),
(51, 'LUYA', '09', 5, 'A'),
(52, 'LUYA VIEJO', '10', 5, 'A'),
(53, 'MARÍA', '11', 5, 'A'),
(54, 'OCALLI', '12', 5, 'A'),
(55, 'OCUMAL', '13', 5, 'A'),
(56, 'PISUQUIA', '14', 5, 'A'),
(57, 'PROVIDENCIA', '15', 5, 'A'),
(58, 'SAN CRISTÓBAL', '16', 5, 'A'),
(59, 'SAN FRANCISCO DE YESO', '17', 5, 'A'),
(60, 'SAN JERÓNIMO', '18', 5, 'A'),
(61, 'SAN JUAN DE LOPECANCHA', '19', 5, 'A'),
(62, 'SANTA CATALINA', '20', 5, 'A'),
(63, 'SANTO TOMAS', '21', 5, 'A'),
(64, 'TINGO', '22', 5, 'A'),
(65, 'TRITA', '23', 5, 'A'),
(66, 'SAN NICOLÁS', '01', 6, 'A'),
(67, 'CHIRIMOTO', '02', 6, 'A'),
(68, 'COCHAMAL', '03', 6, 'A'),
(69, 'HUAMBO', '04', 6, 'A'),
(70, 'LIMABAMBA', '05', 6, 'A'),
(71, 'LONGAR', '06', 6, 'A'),
(72, 'MARISCAL BENAVIDES', '07', 6, 'A'),
(73, 'MILPUC', '08', 6, 'A'),
(74, 'OMIA', '09', 6, 'A'),
(75, 'SANTA ROSA', '10', 6, 'A'),
(76, 'TOTORA', '11', 6, 'A'),
(77, 'VISTA ALEGRE', '12', 6, 'A'),
(78, 'BAGUA GRANDE', '01', 7, 'A'),
(79, 'CAJARURO', '02', 7, 'A'),
(80, 'CUMBA', '03', 7, 'A'),
(81, 'EL MILAGRO', '04', 7, 'A'),
(82, 'JAMALCA', '05', 7, 'A'),
(83, 'LONYA GRANDE', '06', 7, 'A'),
(84, 'YAMON', '07', 7, 'A'),
(85, 'HUARAZ', '01', 8, 'A'),
(86, 'COCHABAMBA', '02', 8, 'A'),
(87, 'COLCABAMBA', '03', 8, 'A'),
(88, 'HUANCHAY', '04', 8, 'A'),
(89, 'INDEPENDENCIA', '05', 8, 'A'),
(90, 'JANGAS', '06', 8, 'A'),
(91, 'LA LIBERTAD', '07', 8, 'A'),
(92, 'OLLEROS', '08', 8, 'A'),
(93, 'PAMPAS GRANDE', '09', 8, 'A'),
(94, 'PARIACOTO', '10', 8, 'A'),
(95, 'PIRA', '11', 8, 'A'),
(96, 'TARICA', '12', 8, 'A'),
(97, 'AIJA', '01', 9, 'A'),
(98, 'CORIS', '02', 9, 'A'),
(99, 'HUACLLAN', '03', 9, 'A'),
(100, 'LA MERCED', '04', 9, 'A'),
(101, 'SUCCHA', '05', 9, 'A'),
(102, 'LLAMELLIN', '01', 10, 'A'),
(103, 'ACZO', '02', 10, 'A'),
(104, 'CHACCHO', '03', 10, 'A'),
(105, 'CHINGAS', '04', 10, 'A'),
(106, 'MIRGAS', '05', 10, 'A'),
(107, 'SAN JUAN DE RONTOY', '06', 10, 'A'),
(108, 'CHACAS', '01', 11, 'A'),
(109, 'ACOCHACA', '02', 11, 'A'),
(110, 'CHIQUIAN', '01', 12, 'A'),
(111, 'ABELARDO PARDO LEZAMETA', '02', 12, 'A'),
(112, 'ANTONIO RAYMONDI', '03', 12, 'A'),
(113, 'AQUIA', '04', 12, 'A'),
(114, 'CAJACAY', '05', 12, 'A'),
(115, 'CANIS', '06', 12, 'A'),
(116, 'COLQUIOC', '07', 12, 'A'),
(117, 'HUALLANCA', '08', 12, 'A'),
(118, 'HUASTA', '09', 12, 'A'),
(119, 'HUAYLLACAYAN', '10', 12, 'A'),
(120, 'LA PRIMAVERA', '11', 12, 'A'),
(121, 'MANGAS', '12', 12, 'A'),
(122, 'PACLLON', '13', 12, 'A'),
(123, 'SAN MIGUEL DE CORPANQUI', '14', 12, 'A'),
(124, 'TICLLOS', '15', 12, 'A'),
(125, 'CARHUAZ', '01', 13, 'A'),
(126, 'ACOPAMPA', '02', 13, 'A'),
(127, 'AMASHCA', '03', 13, 'A'),
(128, 'ANTA', '04', 13, 'A'),
(129, 'ATAQUERO', '05', 13, 'A'),
(130, 'MARCARA', '06', 13, 'A'),
(131, 'PARIAHUANCA', '07', 13, 'A'),
(132, 'SAN MIGUEL DE ACO', '08', 13, 'A'),
(133, 'SHILLA', '09', 13, 'A'),
(134, 'TINCO', '10', 13, 'A'),
(135, 'YUNGAR', '11', 13, 'A'),
(136, 'SAN LUIS', '01', 14, 'A'),
(137, 'SAN NICOLÁS', '02', 14, 'A'),
(138, 'YAUYA', '03', 14, 'A'),
(139, 'CASMA', '01', 15, 'A'),
(140, 'BUENA VISTA ALTA', '02', 15, 'A'),
(141, 'COMANDANTE NOEL', '03', 15, 'A'),
(142, 'YAUTAN', '04', 15, 'A'),
(143, 'CORONGO', '01', 16, 'A'),
(144, 'ACO', '02', 16, 'A'),
(145, 'BAMBAS', '03', 16, 'A'),
(146, 'CUSCA', '04', 16, 'A'),
(147, 'LA PAMPA', '05', 16, 'A'),
(148, 'YANAC', '06', 16, 'A'),
(149, 'YUPAN', '07', 16, 'A'),
(150, 'HUARI', '01', 17, 'A'),
(151, 'ANRA', '02', 17, 'A'),
(152, 'CAJAY', '03', 17, 'A'),
(153, 'CHAVIN DE HUANTAR', '04', 17, 'A'),
(154, 'HUACACHI', '05', 17, 'A'),
(155, 'HUACCHIS', '06', 17, 'A'),
(156, 'HUACHIS', '07', 17, 'A'),
(157, 'HUANTAR', '08', 17, 'A'),
(158, 'MASIN', '09', 17, 'A'),
(159, 'PAUCAS', '10', 17, 'A'),
(160, 'PONTO', '11', 17, 'A'),
(161, 'RAHUAPAMPA', '12', 17, 'A'),
(162, 'RAPAYAN', '13', 17, 'A'),
(163, 'SAN MARCOS', '14', 17, 'A'),
(164, 'SAN PEDRO DE CHANA', '15', 17, 'A'),
(165, 'UCO', '16', 17, 'A'),
(166, 'HUARMEY', '01', 18, 'A'),
(167, 'COCHAPETI', '02', 18, 'A'),
(168, 'CULEBRAS', '03', 18, 'A'),
(169, 'HUAYAN', '04', 18, 'A'),
(170, 'MALVAS', '05', 18, 'A'),
(171, 'CARAZ', '01', 19, 'A'),
(172, 'HUALLANCA', '02', 19, 'A'),
(173, 'HUATA', '03', 19, 'A'),
(174, 'HUAYLAS', '04', 19, 'A'),
(175, 'MATO', '05', 19, 'A'),
(176, 'PAMPAROMAS', '06', 19, 'A'),
(177, 'PUEBLO LIBRE', '07', 19, 'A'),
(178, 'SANTA CRUZ', '08', 19, 'A'),
(179, 'SANTO TORIBIO', '09', 19, 'A'),
(180, 'YURACMARCA', '10', 19, 'A'),
(181, 'PISCOBAMBA', '01', 20, 'A'),
(182, 'CASCA', '02', 20, 'A'),
(183, 'ELEAZAR GUZMÁN BARRON', '03', 20, 'A'),
(184, 'FIDEL OLIVAS ESCUDERO', '04', 20, 'A'),
(185, 'LLAMA', '05', 20, 'A'),
(186, 'LLUMPA', '06', 20, 'A'),
(187, 'LUCMA', '07', 20, 'A'),
(188, 'MUSGA', '08', 20, 'A'),
(189, 'OCROS', '01', 21, 'A'),
(190, 'ACAS', '02', 21, 'A'),
(191, 'CAJAMARQUILLA', '03', 21, 'A'),
(192, 'CARHUAPAMPA', '04', 21, 'A'),
(193, 'COCHAS', '05', 21, 'A'),
(194, 'CONGAS', '06', 21, 'A'),
(195, 'LLIPA', '07', 21, 'A'),
(196, 'SAN CRISTÓBAL DE RAJAN', '08', 21, 'A'),
(197, 'SAN PEDRO', '09', 21, 'A'),
(198, 'SANTIAGO DE CHILCAS', '10', 21, 'A'),
(199, 'CABANA', '01', 22, 'A'),
(200, 'BOLOGNESI', '02', 22, 'A'),
(201, 'CONCHUCOS', '03', 22, 'A'),
(202, 'HUACASCHUQUE', '04', 22, 'A'),
(203, 'HUANDOVAL', '05', 22, 'A'),
(204, 'LACABAMBA', '06', 22, 'A'),
(205, 'LLAPO', '07', 22, 'A'),
(206, 'PALLASCA', '08', 22, 'A'),
(207, 'PAMPAS', '09', 22, 'A'),
(208, 'SANTA ROSA', '10', 22, 'A'),
(209, 'TAUCA', '11', 22, 'A'),
(210, 'POMABAMBA', '01', 23, 'A'),
(211, 'HUAYLLAN', '02', 23, 'A'),
(212, 'PAROBAMBA', '03', 23, 'A'),
(213, 'QUINUABAMBA', '04', 23, 'A'),
(214, 'RECUAY', '01', 24, 'A'),
(215, 'CATAC', '02', 24, 'A'),
(216, 'COTAPARACO', '03', 24, 'A'),
(217, 'HUAYLLAPAMPA', '04', 24, 'A'),
(218, 'LLACLLIN', '05', 24, 'A'),
(219, 'MARCA', '06', 24, 'A'),
(220, 'PAMPAS CHICO', '07', 24, 'A'),
(221, 'PARARIN', '08', 24, 'A'),
(222, 'TAPACOCHA', '09', 24, 'A'),
(223, 'TICAPAMPA', '10', 24, 'A'),
(224, 'CHIMBOTE', '01', 25, 'A'),
(225, 'CÁCERES DEL PERÚ', '02', 25, 'A'),
(226, 'COISHCO', '03', 25, 'A'),
(227, 'MACATE', '04', 25, 'A'),
(228, 'MORO', '05', 25, 'A'),
(229, 'NEPEÑA', '06', 25, 'A'),
(230, 'SAMANCO', '07', 25, 'A'),
(231, 'SANTA', '08', 25, 'A'),
(232, 'NUEVO CHIMBOTE', '09', 25, 'A'),
(233, 'SIHUAS', '01', 26, 'A'),
(234, 'ACOBAMBA', '02', 26, 'A'),
(235, 'ALFONSO UGARTE', '03', 26, 'A'),
(236, 'CASHAPAMPA', '04', 26, 'A'),
(237, 'CHINGALPO', '05', 26, 'A'),
(238, 'HUAYLLABAMBA', '06', 26, 'A'),
(239, 'QUICHES', '07', 26, 'A'),
(240, 'RAGASH', '08', 26, 'A'),
(241, 'SAN JUAN', '09', 26, 'A'),
(242, 'SICSIBAMBA', '10', 26, 'A'),
(243, 'YUNGAY', '01', 27, 'A'),
(244, 'CASCAPARA', '02', 27, 'A'),
(245, 'MANCOS', '03', 27, 'A'),
(246, 'MATACOTO', '04', 27, 'A'),
(247, 'QUILLO', '05', 27, 'A'),
(248, 'RANRAHIRCA', '06', 27, 'A'),
(249, 'SHUPLUY', '07', 27, 'A'),
(250, 'YANAMA', '08', 27, 'A'),
(251, 'ABANCAY', '01', 28, 'A'),
(252, 'CHACOCHE', '02', 28, 'A'),
(253, 'CIRCA', '03', 28, 'A'),
(254, 'CURAHUASI', '04', 28, 'A'),
(255, 'HUANIPACA', '05', 28, 'A'),
(256, 'LAMBRAMA', '06', 28, 'A'),
(257, 'PICHIRHUA', '07', 28, 'A'),
(258, 'SAN PEDRO DE CACHORA', '08', 28, 'A'),
(259, 'TAMBURCO', '09', 28, 'A'),
(260, 'ANDAHUAYLAS', '01', 29, 'A'),
(261, 'ANDARAPA', '02', 29, 'A'),
(262, 'CHIARA', '03', 29, 'A'),
(263, 'HUANCARAMA', '04', 29, 'A'),
(264, 'HUANCARAY', '05', 29, 'A'),
(265, 'HUAYANA', '06', 29, 'A'),
(266, 'KISHUARA', '07', 29, 'A'),
(267, 'PACOBAMBA', '08', 29, 'A'),
(268, 'PACUCHA', '09', 29, 'A'),
(269, 'PAMPACHIRI', '10', 29, 'A'),
(270, 'POMACOCHA', '11', 29, 'A'),
(271, 'SAN ANTONIO DE CACHI', '12', 29, 'A'),
(272, 'SAN JERÓNIMO', '13', 29, 'A'),
(273, 'SAN MIGUEL DE CHACCRAMPA', '14', 29, 'A'),
(274, 'SANTA MARÍA DE CHICMO', '15', 29, 'A'),
(275, 'TALAVERA', '16', 29, 'A'),
(276, 'TUMAY HUARACA', '17', 29, 'A'),
(277, 'TURPO', '18', 29, 'A'),
(278, 'KAQUIABAMBA', '19', 29, 'A'),
(279, 'JOSÉ MARÍA ARGUEDAS', '20', 29, 'A'),
(280, 'ANTABAMBA', '01', 30, 'A'),
(281, 'EL ORO', '02', 30, 'A'),
(282, 'HUAQUIRCA', '03', 30, 'A'),
(283, 'JUAN ESPINOZA MEDRANO', '04', 30, 'A'),
(284, 'OROPESA', '05', 30, 'A'),
(285, 'PACHACONAS', '06', 30, 'A'),
(286, 'SABAINO', '07', 30, 'A'),
(287, 'CHALHUANCA', '01', 31, 'A'),
(288, 'CAPAYA', '02', 31, 'A'),
(289, 'CARAYBAMBA', '03', 31, 'A'),
(290, 'CHAPIMARCA', '04', 31, 'A'),
(291, 'COLCABAMBA', '05', 31, 'A'),
(292, 'COTARUSE', '06', 31, 'A'),
(293, 'IHUAYLLO', '07', 31, 'A'),
(294, 'JUSTO APU SAHUARAURA', '08', 31, 'A'),
(295, 'LUCRE', '09', 31, 'A'),
(296, 'POCOHUANCA', '10', 31, 'A'),
(297, 'SAN JUAN DE CHACÑA', '11', 31, 'A'),
(298, 'SAÑAYCA', '12', 31, 'A'),
(299, 'SORAYA', '13', 31, 'A'),
(300, 'TAPAIRIHUA', '14', 31, 'A'),
(301, 'TINTAY', '15', 31, 'A'),
(302, 'TORAYA', '16', 31, 'A'),
(303, 'YANACA', '17', 31, 'A'),
(304, 'TAMBOBAMBA', '01', 32, 'A'),
(305, 'COTABAMBAS', '02', 32, 'A'),
(306, 'COYLLURQUI', '03', 32, 'A'),
(307, 'HAQUIRA', '04', 32, 'A'),
(308, 'MARA', '05', 32, 'A'),
(309, 'CHALLHUAHUACHO', '06', 32, 'A'),
(310, 'CHINCHEROS', '01', 33, 'A'),
(311, 'ANCO_HUALLO', '02', 33, 'A'),
(312, 'COCHARCAS', '03', 33, 'A'),
(313, 'HUACCANA', '04', 33, 'A'),
(314, 'OCOBAMBA', '05', 33, 'A'),
(315, 'ONGOY', '06', 33, 'A'),
(316, 'URANMARCA', '07', 33, 'A'),
(317, 'RANRACANCHA', '08', 33, 'A'),
(318, 'ROCCHACC', '09', 33, 'A'),
(319, 'EL PORVENIR', '10', 33, 'A'),
(320, 'LOS CHANKAS', '11', 33, 'A'),
(321, 'CHUQUIBAMBILLA', '01', 34, 'A'),
(322, 'CURPAHUASI', '02', 34, 'A'),
(323, 'GAMARRA', '03', 34, 'A'),
(324, 'HUAYLLATI', '04', 34, 'A'),
(325, 'MAMARA', '05', 34, 'A'),
(326, 'MICAELA BASTIDAS', '06', 34, 'A'),
(327, 'PATAYPAMPA', '07', 34, 'A'),
(328, 'PROGRESO', '08', 34, 'A'),
(329, 'SAN ANTONIO', '09', 34, 'A'),
(330, 'SANTA ROSA', '10', 34, 'A'),
(331, 'TURPAY', '11', 34, 'A'),
(332, 'VILCABAMBA', '12', 34, 'A'),
(333, 'VIRUNDO', '13', 34, 'A'),
(334, 'CURASCO', '14', 34, 'A'),
(335, 'AREQUIPA', '01', 35, 'A'),
(336, 'ALTO SELVA ALEGRE', '02', 35, 'A'),
(337, 'CAYMA', '03', 35, 'A'),
(338, 'CERRO COLORADO', '04', 35, 'A'),
(339, 'CHARACATO', '05', 35, 'A'),
(340, 'CHIGUATA', '06', 35, 'A'),
(341, 'JACOBO HUNTER', '07', 35, 'A'),
(342, 'LA JOYA', '08', 35, 'A'),
(343, 'MARIANO MELGAR', '09', 35, 'A'),
(344, 'MIRAFLORES', '10', 35, 'A'),
(345, 'MOLLEBAYA', '11', 35, 'A'),
(346, 'PAUCARPATA', '12', 35, 'A'),
(347, 'POCSI', '13', 35, 'A'),
(348, 'POLOBAYA', '14', 35, 'A'),
(349, 'QUEQUEÑA', '15', 35, 'A'),
(350, 'SABANDIA', '16', 35, 'A'),
(351, 'SACHACA', '17', 35, 'A'),
(352, 'SAN JUAN DE SIGUAS', '18', 35, 'A'),
(353, 'SAN JUAN DE TARUCANI', '19', 35, 'A'),
(354, 'SANTA ISABEL DE SIGUAS', '20', 35, 'A'),
(355, 'SANTA RITA DE SIGUAS', '21', 35, 'A'),
(356, 'SOCABAYA', '22', 35, 'A'),
(357, 'TIABAYA', '23', 35, 'A'),
(358, 'UCHUMAYO', '24', 35, 'A'),
(359, 'VITOR', '25', 35, 'A'),
(360, 'YANAHUARA', '26', 35, 'A'),
(361, 'YARABAMBA', '27', 35, 'A'),
(362, 'YURA', '28', 35, 'A'),
(363, 'JOSÉ LUIS BUSTAMANTE Y RIVERO', '29', 35, 'A'),
(364, 'CAMANÁ', '01', 36, 'A'),
(365, 'JOSÉ MARÍA QUIMPER', '02', 36, 'A'),
(366, 'MARIANO NICOLÁS VALCÁRCEL', '03', 36, 'A'),
(367, 'MARISCAL CÁCERES', '04', 36, 'A'),
(368, 'NICOLÁS DE PIEROLA', '05', 36, 'A'),
(369, 'OCOÑA', '06', 36, 'A'),
(370, 'QUILCA', '07', 36, 'A'),
(371, 'SAMUEL PASTOR', '08', 36, 'A'),
(372, 'CARAVELÍ', '01', 37, 'A'),
(373, 'ACARÍ', '02', 37, 'A'),
(374, 'ATICO', '03', 37, 'A'),
(375, 'ATIQUIPA', '04', 37, 'A'),
(376, 'BELLA UNIÓN', '05', 37, 'A'),
(377, 'CAHUACHO', '06', 37, 'A'),
(378, 'CHALA', '07', 37, 'A'),
(379, 'CHAPARRA', '08', 37, 'A'),
(380, 'HUANUHUANU', '09', 37, 'A'),
(381, 'JAQUI', '10', 37, 'A'),
(382, 'LOMAS', '11', 37, 'A'),
(383, 'QUICACHA', '12', 37, 'A'),
(384, 'YAUCA', '13', 37, 'A'),
(385, 'APLAO', '01', 38, 'A'),
(386, 'ANDAGUA', '02', 38, 'A'),
(387, 'AYO', '03', 38, 'A'),
(388, 'CHACHAS', '04', 38, 'A'),
(389, 'CHILCAYMARCA', '05', 38, 'A'),
(390, 'CHOCO', '06', 38, 'A'),
(391, 'HUANCARQUI', '07', 38, 'A'),
(392, 'MACHAGUAY', '08', 38, 'A'),
(393, 'ORCOPAMPA', '09', 38, 'A'),
(394, 'PAMPACOLCA', '10', 38, 'A'),
(395, 'TIPAN', '11', 38, 'A'),
(396, 'UÑON', '12', 38, 'A'),
(397, 'URACA', '13', 38, 'A'),
(398, 'VIRACO', '14', 38, 'A'),
(399, 'CHIVAY', '01', 39, 'A'),
(400, 'ACHOMA', '02', 39, 'A'),
(401, 'CABANACONDE', '03', 39, 'A'),
(402, 'CALLALLI', '04', 39, 'A'),
(403, 'CAYLLOMA', '05', 39, 'A'),
(404, 'COPORAQUE', '06', 39, 'A'),
(405, 'HUAMBO', '07', 39, 'A'),
(406, 'HUANCA', '08', 39, 'A'),
(407, 'ICHUPAMPA', '09', 39, 'A'),
(408, 'LARI', '10', 39, 'A'),
(409, 'LLUTA', '11', 39, 'A'),
(410, 'MACA', '12', 39, 'A'),
(411, 'MADRIGAL', '13', 39, 'A'),
(412, 'SAN ANTONIO DE CHUCA', '14', 39, 'A'),
(413, 'SIBAYO', '15', 39, 'A'),
(414, 'TAPAY', '16', 39, 'A'),
(415, 'TISCO', '17', 39, 'A'),
(416, 'TUTI', '18', 39, 'A'),
(417, 'YANQUE', '19', 39, 'A'),
(418, 'MAJES', '20', 39, 'A'),
(419, 'CHUQUIBAMBA', '01', 40, 'A'),
(420, 'ANDARAY', '02', 40, 'A'),
(421, 'CAYARANI', '03', 40, 'A'),
(422, 'CHICHAS', '04', 40, 'A'),
(423, 'IRAY', '05', 40, 'A'),
(424, 'RÍO GRANDE', '06', 40, 'A'),
(425, 'SALAMANCA', '07', 40, 'A'),
(426, 'YANAQUIHUA', '08', 40, 'A'),
(427, 'MOLLENDO', '01', 41, 'A'),
(428, 'COCACHACRA', '02', 41, 'A'),
(429, 'DEAN VALDIVIA', '03', 41, 'A'),
(430, 'ISLAY', '04', 41, 'A'),
(431, 'MEJIA', '05', 41, 'A'),
(432, 'PUNTA DE BOMBÓN', '06', 41, 'A'),
(433, 'COTAHUASI', '01', 42, 'A'),
(434, 'ALCA', '02', 42, 'A'),
(435, 'CHARCANA', '03', 42, 'A'),
(436, 'HUAYNACOTAS', '04', 42, 'A'),
(437, 'PAMPAMARCA', '05', 42, 'A'),
(438, 'PUYCA', '06', 42, 'A'),
(439, 'QUECHUALLA', '07', 42, 'A'),
(440, 'SAYLA', '08', 42, 'A'),
(441, 'TAURIA', '09', 42, 'A'),
(442, 'TOMEPAMPA', '10', 42, 'A'),
(443, 'TORO', '11', 42, 'A'),
(444, 'AYACUCHO', '01', 43, 'A'),
(445, 'ACOCRO', '02', 43, 'A'),
(446, 'ACOS VINCHOS', '03', 43, 'A'),
(447, 'CARMEN ALTO', '04', 43, 'A'),
(448, 'CHIARA', '05', 43, 'A'),
(449, 'OCROS', '06', 43, 'A'),
(450, 'PACAYCASA', '07', 43, 'A'),
(451, 'QUINUA', '08', 43, 'A'),
(452, 'SAN JOSÉ DE TICLLAS', '09', 43, 'A'),
(453, 'SAN JUAN BAUTISTA', '10', 43, 'A'),
(454, 'SANTIAGO DE PISCHA', '11', 43, 'A'),
(455, 'SOCOS', '12', 43, 'A'),
(456, 'TAMBILLO', '13', 43, 'A'),
(457, 'VINCHOS', '14', 43, 'A'),
(458, 'JESÚS NAZARENO', '15', 43, 'A'),
(459, 'ANDRÉS AVELINO CÁCERES DORREGARAY', '16', 43, 'A'),
(460, 'CANGALLO', '01', 44, 'A'),
(461, 'CHUSCHI', '02', 44, 'A'),
(462, 'LOS MOROCHUCOS', '03', 44, 'A'),
(463, 'MARÍA PARADO DE BELLIDO', '04', 44, 'A'),
(464, 'PARAS', '05', 44, 'A'),
(465, 'TOTOS', '06', 44, 'A'),
(466, 'SANCOS', '01', 45, 'A'),
(467, 'CARAPO', '02', 45, 'A'),
(468, 'SACSAMARCA', '03', 45, 'A'),
(469, 'SANTIAGO DE LUCANAMARCA', '04', 45, 'A'),
(470, 'HUANTA', '01', 46, 'A'),
(471, 'AYAHUANCO', '02', 46, 'A'),
(472, 'HUAMANGUILLA', '03', 46, 'A'),
(473, 'IGUAIN', '04', 46, 'A'),
(474, 'LURICOCHA', '05', 46, 'A'),
(475, 'SANTILLANA', '06', 46, 'A'),
(476, 'SIVIA', '07', 46, 'A'),
(477, 'LLOCHEGUA', '08', 46, 'A'),
(478, 'CANAYRE', '09', 46, 'A'),
(479, 'UCHURACCAY', '10', 46, 'A'),
(480, 'PUCACOLPA', '11', 46, 'A'),
(481, 'CHACA', '12', 46, 'A'),
(482, 'SAN MIGUEL', '01', 47, 'A'),
(483, 'ANCO', '02', 47, 'A'),
(484, 'AYNA', '03', 47, 'A'),
(485, 'CHILCAS', '04', 47, 'A'),
(486, 'CHUNGUI', '05', 47, 'A'),
(487, 'LUIS CARRANZA', '06', 47, 'A'),
(488, 'SANTA ROSA', '07', 47, 'A'),
(489, 'TAMBO', '08', 47, 'A'),
(490, 'SAMUGARI', '09', 47, 'A'),
(491, 'ANCHIHUAY', '10', 47, 'A'),
(492, 'ORONCCOY', '11', 47, 'A'),
(493, 'PUQUIO', '01', 48, 'A'),
(494, 'AUCARA', '02', 48, 'A'),
(495, 'CABANA', '03', 48, 'A'),
(496, 'CARMEN SALCEDO', '04', 48, 'A'),
(497, 'CHAVIÑA', '05', 48, 'A'),
(498, 'CHIPAO', '06', 48, 'A'),
(499, 'HUAC-HUAS', '07', 48, 'A'),
(500, 'LARAMATE', '08', 48, 'A'),
(501, 'LEONCIO PRADO', '09', 48, 'A'),
(502, 'LLAUTA', '10', 48, 'A'),
(503, 'LUCANAS', '11', 48, 'A'),
(504, 'OCAÑA', '12', 48, 'A'),
(505, 'OTOCA', '13', 48, 'A'),
(506, 'SAISA', '14', 48, 'A'),
(507, 'SAN CRISTÓBAL', '15', 48, 'A'),
(508, 'SAN JUAN', '16', 48, 'A'),
(509, 'SAN PEDRO', '17', 48, 'A'),
(510, 'SAN PEDRO DE PALCO', '18', 48, 'A'),
(511, 'SANCOS', '19', 48, 'A'),
(512, 'SANTA ANA DE HUAYCAHUACHO', '20', 48, 'A'),
(513, 'SANTA LUCIA', '21', 48, 'A'),
(514, 'CORACORA', '01', 49, 'A'),
(515, 'CHUMPI', '02', 49, 'A'),
(516, 'CORONEL CASTAÑEDA', '03', 49, 'A'),
(517, 'PACAPAUSA', '04', 49, 'A'),
(518, 'PULLO', '05', 49, 'A'),
(519, 'PUYUSCA', '06', 49, 'A'),
(520, 'SAN FRANCISCO DE RAVACAYCO', '07', 49, 'A'),
(521, 'UPAHUACHO', '08', 49, 'A'),
(522, 'PAUSA', '01', 50, 'A'),
(523, 'COLTA', '02', 50, 'A'),
(524, 'CORCULLA', '03', 50, 'A'),
(525, 'LAMPA', '04', 50, 'A'),
(526, 'MARCABAMBA', '05', 50, 'A'),
(527, 'OYOLO', '06', 50, 'A'),
(528, 'PARARCA', '07', 50, 'A'),
(529, 'SAN JAVIER DE ALPABAMBA', '08', 50, 'A'),
(530, 'SAN JOSÉ DE USHUA', '09', 50, 'A'),
(531, 'SARA SARA', '10', 50, 'A'),
(532, 'QUEROBAMBA', '01', 51, 'A'),
(533, 'BELÉN', '02', 51, 'A'),
(534, 'CHALCOS', '03', 51, 'A'),
(535, 'CHILCAYOC', '04', 51, 'A'),
(536, 'HUACAÑA', '05', 51, 'A'),
(537, 'MORCOLLA', '06', 51, 'A'),
(538, 'PAICO', '07', 51, 'A'),
(539, 'SAN PEDRO DE LARCAY', '08', 51, 'A'),
(540, 'SAN SALVADOR DE QUIJE', '09', 51, 'A'),
(541, 'SANTIAGO DE PAUCARAY', '10', 51, 'A'),
(542, 'SORAS', '11', 51, 'A'),
(543, 'HUANCAPI', '01', 52, 'A'),
(544, 'ALCAMENCA', '02', 52, 'A'),
(545, 'APONGO', '03', 52, 'A'),
(546, 'ASQUIPATA', '04', 52, 'A'),
(547, 'CANARIA', '05', 52, 'A'),
(548, 'CAYARA', '06', 52, 'A'),
(549, 'COLCA', '07', 52, 'A'),
(550, 'HUAMANQUIQUIA', '08', 52, 'A'),
(551, 'HUANCARAYLLA', '09', 52, 'A'),
(552, 'HUALLA', '10', 52, 'A'),
(553, 'SARHUA', '11', 52, 'A'),
(554, 'VILCANCHOS', '12', 52, 'A'),
(555, 'VILCAS HUAMAN', '01', 53, 'A'),
(556, 'ACCOMARCA', '02', 53, 'A'),
(557, 'CARHUANCA', '03', 53, 'A'),
(558, 'CONCEPCIÓN', '04', 53, 'A'),
(559, 'HUAMBALPA', '05', 53, 'A'),
(560, 'INDEPENDENCIA', '06', 53, 'A'),
(561, 'SAURAMA', '07', 53, 'A'),
(562, 'VISCHONGO', '08', 53, 'A'),
(563, 'CAJAMARCA', '01', 54, 'A'),
(564, 'ASUNCIÓN', '02', 54, 'A'),
(565, 'CHETILLA', '03', 54, 'A'),
(566, 'COSPAN', '04', 54, 'A'),
(567, 'ENCAÑADA', '05', 54, 'A'),
(568, 'JESÚS', '06', 54, 'A'),
(569, 'LLACANORA', '07', 54, 'A'),
(570, 'LOS BAÑOS DEL INCA', '08', 54, 'A'),
(571, 'MAGDALENA', '09', 54, 'A'),
(572, 'MATARA', '10', 54, 'A'),
(573, 'NAMORA', '11', 54, 'A'),
(574, 'SAN JUAN', '12', 54, 'A'),
(575, 'CAJABAMBA', '01', 55, 'A'),
(576, 'CACHACHI', '02', 55, 'A'),
(577, 'CONDEBAMBA', '03', 55, 'A'),
(578, 'SITACOCHA', '04', 55, 'A'),
(579, 'CELENDÍN', '01', 56, 'A'),
(580, 'CHUMUCH', '02', 56, 'A'),
(581, 'CORTEGANA', '03', 56, 'A'),
(582, 'HUASMIN', '04', 56, 'A'),
(583, 'JORGE CHÁVEZ', '05', 56, 'A'),
(584, 'JOSÉ GÁLVEZ', '06', 56, 'A'),
(585, 'MIGUEL IGLESIAS', '07', 56, 'A'),
(586, 'OXAMARCA', '08', 56, 'A'),
(587, 'SOROCHUCO', '09', 56, 'A'),
(588, 'SUCRE', '10', 56, 'A'),
(589, 'UTCO', '11', 56, 'A'),
(590, 'LA LIBERTAD DE PALLAN', '12', 56, 'A'),
(591, 'CHOTA', '01', 57, 'A'),
(592, 'ANGUIA', '02', 57, 'A'),
(593, 'CHADIN', '03', 57, 'A'),
(594, 'CHIGUIRIP', '04', 57, 'A'),
(595, 'CHIMBAN', '05', 57, 'A'),
(596, 'CHOROPAMPA', '06', 57, 'A'),
(597, 'COCHABAMBA', '07', 57, 'A'),
(598, 'CONCHAN', '08', 57, 'A'),
(599, 'HUAMBOS', '09', 57, 'A'),
(600, 'LAJAS', '10', 57, 'A'),
(601, 'LLAMA', '11', 57, 'A'),
(602, 'MIRACOSTA', '12', 57, 'A'),
(603, 'PACCHA', '13', 57, 'A'),
(604, 'PION', '14', 57, 'A'),
(605, 'QUEROCOTO', '15', 57, 'A'),
(606, 'SAN JUAN DE LICUPIS', '16', 57, 'A'),
(607, 'TACABAMBA', '17', 57, 'A'),
(608, 'TOCMOCHE', '18', 57, 'A'),
(609, 'CHALAMARCA', '19', 57, 'A'),
(610, 'CONTUMAZA', '01', 58, 'A'),
(611, 'CHILETE', '02', 58, 'A'),
(612, 'CUPISNIQUE', '03', 58, 'A'),
(613, 'GUZMANGO', '04', 58, 'A'),
(614, 'SAN BENITO', '05', 58, 'A'),
(615, 'SANTA CRUZ DE TOLEDO', '06', 58, 'A'),
(616, 'TANTARICA', '07', 58, 'A'),
(617, 'YONAN', '08', 58, 'A'),
(618, 'CUTERVO', '01', 59, 'A'),
(619, 'CALLAYUC', '02', 59, 'A'),
(620, 'CHOROS', '03', 59, 'A'),
(621, 'CUJILLO', '04', 59, 'A'),
(622, 'LA RAMADA', '05', 59, 'A'),
(623, 'PIMPINGOS', '06', 59, 'A'),
(624, 'QUEROCOTILLO', '07', 59, 'A'),
(625, 'SAN ANDRÉS DE CUTERVO', '08', 59, 'A'),
(626, 'SAN JUAN DE CUTERVO', '09', 59, 'A'),
(627, 'SAN LUIS DE LUCMA', '10', 59, 'A'),
(628, 'SANTA CRUZ', '11', 59, 'A'),
(629, 'SANTO DOMINGO DE LA CAPILLA', '12', 59, 'A'),
(630, 'SANTO TOMAS', '13', 59, 'A'),
(631, 'SOCOTA', '14', 59, 'A'),
(632, 'TORIBIO CASANOVA', '15', 59, 'A'),
(633, 'BAMBAMARCA', '01', 60, 'A'),
(634, 'CHUGUR', '02', 60, 'A'),
(635, 'HUALGAYOC', '03', 60, 'A'),
(636, 'JAÉN', '01', 61, 'A'),
(637, 'BELLAVISTA', '02', 61, 'A'),
(638, 'CHONTALI', '03', 61, 'A'),
(639, 'COLASAY', '04', 61, 'A'),
(640, 'HUABAL', '05', 61, 'A'),
(641, 'LAS PIRIAS', '06', 61, 'A'),
(642, 'POMAHUACA', '07', 61, 'A'),
(643, 'PUCARA', '08', 61, 'A'),
(644, 'SALLIQUE', '09', 61, 'A'),
(645, 'SAN FELIPE', '10', 61, 'A'),
(646, 'SAN JOSÉ DEL ALTO', '11', 61, 'A'),
(647, 'SANTA ROSA', '12', 61, 'A'),
(648, 'SAN IGNACIO', '01', 62, 'A'),
(649, 'CHIRINOS', '02', 62, 'A'),
(650, 'HUARANGO', '03', 62, 'A'),
(651, 'LA COIPA', '04', 62, 'A'),
(652, 'NAMBALLE', '05', 62, 'A'),
(653, 'SAN JOSÉ DE LOURDES', '06', 62, 'A'),
(654, 'TABACONAS', '07', 62, 'A'),
(655, 'PEDRO GÁLVEZ', '01', 63, 'A'),
(656, 'CHANCAY', '02', 63, 'A'),
(657, 'EDUARDO VILLANUEVA', '03', 63, 'A'),
(658, 'GREGORIO PITA', '04', 63, 'A'),
(659, 'ICHOCAN', '05', 63, 'A'),
(660, 'JOSÉ MANUEL QUIROZ', '06', 63, 'A'),
(661, 'JOSÉ SABOGAL', '07', 63, 'A'),
(662, 'SAN MIGUEL', '01', 64, 'A'),
(663, 'BOLÍVAR', '02', 64, 'A'),
(664, 'CALQUIS', '03', 64, 'A'),
(665, 'CATILLUC', '04', 64, 'A'),
(666, 'EL PRADO', '05', 64, 'A'),
(667, 'LA FLORIDA', '06', 64, 'A'),
(668, 'LLAPA', '07', 64, 'A'),
(669, 'NANCHOC', '08', 64, 'A'),
(670, 'NIEPOS', '09', 64, 'A'),
(671, 'SAN GREGORIO', '10', 64, 'A'),
(672, 'SAN SILVESTRE DE COCHAN', '11', 64, 'A'),
(673, 'TONGOD', '12', 64, 'A'),
(674, 'UNIÓN AGUA BLANCA', '13', 64, 'A'),
(675, 'SAN PABLO', '01', 65, 'A'),
(676, 'SAN BERNARDINO', '02', 65, 'A'),
(677, 'SAN LUIS', '03', 65, 'A'),
(678, 'TUMBADEN', '04', 65, 'A'),
(679, 'SANTA CRUZ', '01', 66, 'A'),
(680, 'ANDABAMBA', '02', 66, 'A'),
(681, 'CATACHE', '03', 66, 'A'),
(682, 'CHANCAYBAÑOS', '04', 66, 'A'),
(683, 'LA ESPERANZA', '05', 66, 'A'),
(684, 'NINABAMBA', '06', 66, 'A'),
(685, 'PULAN', '07', 66, 'A'),
(686, 'SAUCEPAMPA', '08', 66, 'A'),
(687, 'SEXI', '09', 66, 'A'),
(688, 'UTICYACU', '10', 66, 'A'),
(689, 'YAUYUCAN', '11', 66, 'A'),
(690, 'CALLAO', '01', 67, 'A'),
(691, 'BELLAVISTA', '02', 67, 'A'),
(692, 'CARMEN DE LA LEGUA REYNOSO', '03', 67, 'A'),
(693, 'LA PERLA', '04', 67, 'A'),
(694, 'LA PUNTA', '05', 67, 'A'),
(695, 'VENTANILLA', '06', 67, 'A'),
(696, 'MI PERÚ', '07', 67, 'A'),
(697, 'CUSCO', '01', 68, 'A'),
(698, 'CCORCA', '02', 68, 'A'),
(699, 'POROY', '03', 68, 'A'),
(700, 'SAN JERÓNIMO', '04', 68, 'A'),
(701, 'SAN SEBASTIAN', '05', 68, 'A'),
(702, 'SANTIAGO', '06', 68, 'A'),
(703, 'SAYLLA', '07', 68, 'A'),
(704, 'WANCHAQ', '08', 68, 'A'),
(705, 'ACOMAYO', '01', 69, 'A'),
(706, 'ACOPIA', '02', 69, 'A'),
(707, 'ACOS', '03', 69, 'A'),
(708, 'MOSOC LLACTA', '04', 69, 'A'),
(709, 'POMACANCHI', '05', 69, 'A'),
(710, 'RONDOCAN', '06', 69, 'A'),
(711, 'SANGARARA', '07', 69, 'A'),
(712, 'ANTA', '01', 70, 'A'),
(713, 'ANCAHUASI', '02', 70, 'A'),
(714, 'CACHIMAYO', '03', 70, 'A'),
(715, 'CHINCHAYPUJIO', '04', 70, 'A'),
(716, 'HUAROCONDO', '05', 70, 'A'),
(717, 'LIMATAMBO', '06', 70, 'A'),
(718, 'MOLLEPATA', '07', 70, 'A'),
(719, 'PUCYURA', '08', 70, 'A'),
(720, 'ZURITE', '09', 70, 'A'),
(721, 'CALCA', '01', 71, 'A'),
(722, 'COYA', '02', 71, 'A'),
(723, 'LAMAY', '03', 71, 'A'),
(724, 'LARES', '04', 71, 'A'),
(725, 'PISAC', '05', 71, 'A'),
(726, 'SAN SALVADOR', '06', 71, 'A'),
(727, 'TARAY', '07', 71, 'A'),
(728, 'YANATILE', '08', 71, 'A'),
(729, 'YANAOCA', '01', 72, 'A'),
(730, 'CHECCA', '02', 72, 'A'),
(731, 'KUNTURKANKI', '03', 72, 'A'),
(732, 'LANGUI', '04', 72, 'A'),
(733, 'LAYO', '05', 72, 'A'),
(734, 'PAMPAMARCA', '06', 72, 'A'),
(735, 'QUEHUE', '07', 72, 'A'),
(736, 'TUPAC AMARU', '08', 72, 'A'),
(737, 'SICUANI', '01', 73, 'A'),
(738, 'CHECACUPE', '02', 73, 'A'),
(739, 'COMBAPATA', '03', 73, 'A'),
(740, 'MARANGANI', '04', 73, 'A'),
(741, 'PITUMARCA', '05', 73, 'A'),
(742, 'SAN PABLO', '06', 73, 'A'),
(743, 'SAN PEDRO', '07', 73, 'A'),
(744, 'TINTA', '08', 73, 'A'),
(745, 'SANTO TOMAS', '01', 74, 'A'),
(746, 'CAPACMARCA', '02', 74, 'A'),
(747, 'CHAMACA', '03', 74, 'A'),
(748, 'COLQUEMARCA', '04', 74, 'A'),
(749, 'LIVITACA', '05', 74, 'A'),
(750, 'LLUSCO', '06', 74, 'A'),
(751, 'QUIÑOTA', '07', 74, 'A'),
(752, 'VELILLE', '08', 74, 'A'),
(753, 'ESPINAR', '01', 75, 'A'),
(754, 'CONDOROMA', '02', 75, 'A'),
(755, 'COPORAQUE', '03', 75, 'A'),
(756, 'OCORURO', '04', 75, 'A'),
(757, 'PALLPATA', '05', 75, 'A'),
(758, 'PICHIGUA', '06', 75, 'A'),
(759, 'SUYCKUTAMBO', '07', 75, 'A'),
(760, 'ALTO PICHIGUA', '08', 75, 'A'),
(761, 'SANTA ANA', '01', 76, 'A'),
(762, 'ECHARATE', '02', 76, 'A'),
(763, 'HUAYOPATA', '03', 76, 'A'),
(764, 'MARANURA', '04', 76, 'A'),
(765, 'OCOBAMBA', '05', 76, 'A'),
(766, 'QUELLOUNO', '06', 76, 'A'),
(767, 'KIMBIRI', '07', 76, 'A'),
(768, 'SANTA TERESA', '08', 76, 'A'),
(769, 'VILCABAMBA', '09', 76, 'A'),
(770, 'PICHARI', '10', 76, 'A'),
(771, 'INKAWASI', '11', 76, 'A'),
(772, 'VILLA VIRGEN', '12', 76, 'A'),
(773, 'VILLA KINTIARINA', '13', 76, 'A'),
(774, 'MEGANTONI', '14', 76, 'A'),
(775, 'PARURO', '01', 77, 'A'),
(776, 'ACCHA', '02', 77, 'A'),
(777, 'CCAPI', '03', 77, 'A'),
(778, 'COLCHA', '04', 77, 'A'),
(779, 'HUANOQUITE', '05', 77, 'A'),
(780, 'OMACHA', '06', 77, 'A'),
(781, 'PACCARITAMBO', '07', 77, 'A'),
(782, 'PILLPINTO', '08', 77, 'A'),
(783, 'YAURISQUE', '09', 77, 'A'),
(784, 'PAUCARTAMBO', '01', 78, 'A'),
(785, 'CAICAY', '02', 78, 'A'),
(786, 'CHALLABAMBA', '03', 78, 'A'),
(787, 'COLQUEPATA', '04', 78, 'A'),
(788, 'HUANCARANI', '05', 78, 'A'),
(789, 'KOSÑIPATA', '06', 78, 'A'),
(790, 'URCOS', '01', 79, 'A'),
(791, 'ANDAHUAYLILLAS', '02', 79, 'A'),
(792, 'CAMANTI', '03', 79, 'A'),
(793, 'CCARHUAYO', '04', 79, 'A'),
(794, 'CCATCA', '05', 79, 'A'),
(795, 'CUSIPATA', '06', 79, 'A'),
(796, 'HUARO', '07', 79, 'A'),
(797, 'LUCRE', '08', 79, 'A'),
(798, 'MARCAPATA', '09', 79, 'A'),
(799, 'OCONGATE', '10', 79, 'A'),
(800, 'OROPESA', '11', 79, 'A'),
(801, 'QUIQUIJANA', '12', 79, 'A'),
(802, 'URUBAMBA', '01', 80, 'A'),
(803, 'CHINCHERO', '02', 80, 'A'),
(804, 'HUAYLLABAMBA', '03', 80, 'A'),
(805, 'MACHUPICCHU', '04', 80, 'A'),
(806, 'MARAS', '05', 80, 'A'),
(807, 'OLLANTAYTAMBO', '06', 80, 'A'),
(808, 'YUCAY', '07', 80, 'A'),
(809, 'HUANCAVELICA', '01', 81, 'A'),
(810, 'ACOBAMBILLA', '02', 81, 'A'),
(811, 'ACORIA', '03', 81, 'A'),
(812, 'CONAYCA', '04', 81, 'A'),
(813, 'CUENCA', '05', 81, 'A'),
(814, 'HUACHOCOLPA', '06', 81, 'A'),
(815, 'HUAYLLAHUARA', '07', 81, 'A'),
(816, 'IZCUCHACA', '08', 81, 'A'),
(817, 'LARIA', '09', 81, 'A'),
(818, 'MANTA', '10', 81, 'A'),
(819, 'MARISCAL CÁCERES', '11', 81, 'A'),
(820, 'MOYA', '12', 81, 'A'),
(821, 'NUEVO OCCORO', '13', 81, 'A'),
(822, 'PALCA', '14', 81, 'A'),
(823, 'PILCHACA', '15', 81, 'A'),
(824, 'VILCA', '16', 81, 'A'),
(825, 'YAULI', '17', 81, 'A'),
(826, 'ASCENSIÓN', '18', 81, 'A'),
(827, 'HUANDO', '19', 81, 'A'),
(828, 'ACOBAMBA', '01', 82, 'A'),
(829, 'ANDABAMBA', '02', 82, 'A'),
(830, 'ANTA', '03', 82, 'A'),
(831, 'CAJA', '04', 82, 'A'),
(832, 'MARCAS', '05', 82, 'A'),
(833, 'PAUCARA', '06', 82, 'A'),
(834, 'POMACOCHA', '07', 82, 'A'),
(835, 'ROSARIO', '08', 82, 'A'),
(836, 'LIRCAY', '01', 83, 'A'),
(837, 'ANCHONGA', '02', 83, 'A'),
(838, 'CALLANMARCA', '03', 83, 'A'),
(839, 'CCOCHACCASA', '04', 83, 'A'),
(840, 'CHINCHO', '05', 83, 'A'),
(841, 'CONGALLA', '06', 83, 'A'),
(842, 'HUANCA-HUANCA', '07', 83, 'A'),
(843, 'HUAYLLAY GRANDE', '08', 83, 'A'),
(844, 'JULCAMARCA', '09', 83, 'A'),
(845, 'SAN ANTONIO DE ANTAPARCO', '10', 83, 'A'),
(846, 'SANTO TOMAS DE PATA', '11', 83, 'A'),
(847, 'SECCLLA', '12', 83, 'A'),
(848, 'CASTROVIRREYNA', '01', 84, 'A'),
(849, 'ARMA', '02', 84, 'A'),
(850, 'AURAHUA', '03', 84, 'A'),
(851, 'CAPILLAS', '04', 84, 'A'),
(852, 'CHUPAMARCA', '05', 84, 'A'),
(853, 'COCAS', '06', 84, 'A'),
(854, 'HUACHOS', '07', 84, 'A'),
(855, 'HUAMATAMBO', '08', 84, 'A'),
(856, 'MOLLEPAMPA', '09', 84, 'A'),
(857, 'SAN JUAN', '10', 84, 'A'),
(858, 'SANTA ANA', '11', 84, 'A'),
(859, 'TANTARA', '12', 84, 'A'),
(860, 'TICRAPO', '13', 84, 'A'),
(861, 'CHURCAMPA', '01', 85, 'A'),
(862, 'ANCO', '02', 85, 'A'),
(863, 'CHINCHIHUASI', '03', 85, 'A'),
(864, 'EL CARMEN', '04', 85, 'A'),
(865, 'LA MERCED', '05', 85, 'A'),
(866, 'LOCROJA', '06', 85, 'A'),
(867, 'PAUCARBAMBA', '07', 85, 'A'),
(868, 'SAN MIGUEL DE MAYOCC', '08', 85, 'A'),
(869, 'SAN PEDRO DE CORIS', '09', 85, 'A'),
(870, 'PACHAMARCA', '10', 85, 'A'),
(871, 'COSME', '11', 85, 'A'),
(872, 'HUAYTARA', '01', 86, 'A'),
(873, 'AYAVI', '02', 86, 'A'),
(874, 'CÓRDOVA', '03', 86, 'A'),
(875, 'HUAYACUNDO ARMA', '04', 86, 'A'),
(876, 'LARAMARCA', '05', 86, 'A'),
(877, 'OCOYO', '06', 86, 'A'),
(878, 'PILPICHACA', '07', 86, 'A'),
(879, 'QUERCO', '08', 86, 'A'),
(880, 'QUITO-ARMA', '09', 86, 'A'),
(881, 'SAN ANTONIO DE CUSICANCHA', '10', 86, 'A'),
(882, 'SAN FRANCISCO DE SANGAYAICO', '11', 86, 'A'),
(883, 'SAN ISIDRO', '12', 86, 'A'),
(884, 'SANTIAGO DE CHOCORVOS', '13', 86, 'A'),
(885, 'SANTIAGO DE QUIRAHUARA', '14', 86, 'A'),
(886, 'SANTO DOMINGO DE CAPILLAS', '15', 86, 'A'),
(887, 'TAMBO', '16', 86, 'A'),
(888, 'PAMPAS', '01', 87, 'A'),
(889, 'ACOSTAMBO', '02', 87, 'A'),
(890, 'ACRAQUIA', '03', 87, 'A'),
(891, 'AHUAYCHA', '04', 87, 'A'),
(892, 'COLCABAMBA', '05', 87, 'A'),
(893, 'DANIEL HERNÁNDEZ', '06', 87, 'A'),
(894, 'HUACHOCOLPA', '07', 87, 'A'),
(895, 'HUARIBAMBA', '09', 87, 'A'),
(896, 'ÑAHUIMPUQUIO', '10', 87, 'A'),
(897, 'PAZOS', '11', 87, 'A'),
(898, 'QUISHUAR', '13', 87, 'A'),
(899, 'SALCABAMBA', '14', 87, 'A'),
(900, 'SALCAHUASI', '15', 87, 'A'),
(901, 'SAN MARCOS DE ROCCHAC', '16', 87, 'A'),
(902, 'SURCUBAMBA', '17', 87, 'A'),
(903, 'TINTAY PUNCU', '18', 87, 'A'),
(904, 'QUICHUAS', '19', 87, 'A'),
(905, 'ANDAYMARCA', '20', 87, 'A'),
(906, 'ROBLE', '21', 87, 'A'),
(907, 'PICHOS', '22', 87, 'A'),
(908, 'SANTIAGO DE TUCUMA', '23', 87, 'A'),
(909, 'HUANUCO', '01', 88, 'A'),
(910, 'AMARILIS', '02', 88, 'A'),
(911, 'CHINCHAO', '03', 88, 'A'),
(912, 'CHURUBAMBA', '04', 88, 'A'),
(913, 'MARGOS', '05', 88, 'A'),
(914, 'QUISQUI (KICHKI)', '06', 88, 'A'),
(915, 'SAN FRANCISCO DE CAYRAN', '07', 88, 'A'),
(916, 'SAN PEDRO DE CHAULAN', '08', 88, 'A'),
(917, 'SANTA MARÍA DEL VALLE', '09', 88, 'A'),
(918, 'YARUMAYO', '10', 88, 'A'),
(919, 'PILLCO MARCA', '11', 88, 'A'),
(920, 'YACUS', '12', 88, 'A'),
(921, 'SAN PABLO DE PILLAO', '13', 88, 'A'),
(922, 'AMBO', '01', 89, 'A'),
(923, 'CAYNA', '02', 89, 'A'),
(924, 'COLPAS', '03', 89, 'A'),
(925, 'CONCHAMARCA', '04', 89, 'A'),
(926, 'HUACAR', '05', 89, 'A'),
(927, 'SAN FRANCISCO', '06', 89, 'A'),
(928, 'SAN RAFAEL', '07', 89, 'A'),
(929, 'TOMAY KICHWA', '08', 89, 'A'),
(930, 'LA UNIÓN', '01', 90, 'A'),
(931, 'CHUQUIS', '07', 90, 'A'),
(932, 'MARÍAS', '11', 90, 'A'),
(933, 'PACHAS', '13', 90, 'A'),
(934, 'QUIVILLA', '16', 90, 'A'),
(935, 'RIPAN', '17', 90, 'A'),
(936, 'SHUNQUI', '21', 90, 'A'),
(937, 'SILLAPATA', '22', 90, 'A'),
(938, 'YANAS', '23', 90, 'A'),
(939, 'HUACAYBAMBA', '01', 91, 'A'),
(940, 'CANCHABAMBA', '02', 91, 'A'),
(941, 'COCHABAMBA', '03', 91, 'A'),
(942, 'PINRA', '04', 91, 'A'),
(943, 'LLATA', '01', 92, 'A'),
(944, 'ARANCAY', '02', 92, 'A'),
(945, 'CHAVÍN DE PARIARCA', '03', 92, 'A'),
(946, 'JACAS GRANDE', '04', 92, 'A'),
(947, 'JIRCAN', '05', 92, 'A'),
(948, 'MIRAFLORES', '06', 92, 'A'),
(949, 'MONZÓN', '07', 92, 'A'),
(950, 'PUNCHAO', '08', 92, 'A'),
(951, 'PUÑOS', '09', 92, 'A'),
(952, 'SINGA', '10', 92, 'A'),
(953, 'TANTAMAYO', '11', 92, 'A'),
(954, 'RUPA-RUPA', '01', 93, 'A'),
(955, 'DANIEL ALOMÍA ROBLES', '02', 93, 'A'),
(956, 'HERMÍLIO VALDIZAN', '03', 93, 'A'),
(957, 'JOSÉ CRESPO Y CASTILLO', '04', 93, 'A'),
(958, 'LUYANDO', '05', 93, 'A'),
(959, 'MARIANO DAMASO BERAUN', '06', 93, 'A'),
(960, 'PUCAYACU', '07', 93, 'A'),
(961, 'CASTILLO GRANDE', '08', 93, 'A'),
(962, 'PUEBLO NUEVO', '09', 93, 'A'),
(963, 'SANTO DOMINGO DE ANDA', '10', 93, 'A'),
(964, 'HUACRACHUCO', '01', 94, 'A'),
(965, 'CHOLON', '02', 94, 'A'),
(966, 'SAN BUENAVENTURA', '03', 94, 'A'),
(967, 'LA MORADA', '04', 94, 'A'),
(968, 'SANTA ROSA DE ALTO YANAJANCA', '05', 94, 'A'),
(969, 'PANAO', '01', 95, 'A'),
(970, 'CHAGLLA', '02', 95, 'A'),
(971, 'MOLINO', '03', 95, 'A'),
(972, 'UMARI', '04', 95, 'A'),
(973, 'PUERTO INCA', '01', 96, 'A'),
(974, 'CODO DEL POZUZO', '02', 96, 'A'),
(975, 'HONORIA', '03', 96, 'A'),
(976, 'TOURNAVISTA', '04', 96, 'A'),
(977, 'YUYAPICHIS', '05', 96, 'A'),
(978, 'JESÚS', '01', 97, 'A'),
(979, 'BAÑOS', '02', 97, 'A'),
(980, 'JIVIA', '03', 97, 'A'),
(981, 'QUEROPALCA', '04', 97, 'A'),
(982, 'RONDOS', '05', 97, 'A'),
(983, 'SAN FRANCISCO DE ASÍS', '06', 97, 'A'),
(984, 'SAN MIGUEL DE CAURI', '07', 97, 'A'),
(985, 'CHAVINILLO', '01', 98, 'A'),
(986, 'CAHUAC', '02', 98, 'A'),
(987, 'CHACABAMBA', '03', 98, 'A'),
(988, 'APARICIO POMARES', '04', 98, 'A'),
(989, 'JACAS CHICO', '05', 98, 'A'),
(990, 'OBAS', '06', 98, 'A'),
(991, 'PAMPAMARCA', '07', 98, 'A'),
(992, 'CHORAS', '08', 98, 'A'),
(993, 'ICA', '01', 99, 'A'),
(994, 'LA TINGUIÑA', '02', 99, 'A'),
(995, 'LOS AQUIJES', '03', 99, 'A'),
(996, 'OCUCAJE', '04', 99, 'A'),
(997, 'PACHACUTEC', '05', 99, 'A'),
(998, 'PARCONA', '06', 99, 'A'),
(999, 'PUEBLO NUEVO', '07', 99, 'A'),
(1000, 'SALAS', '08', 99, 'A'),
(1001, 'SAN JOSÉ DE LOS MOLINOS', '09', 99, 'A'),
(1002, 'SAN JUAN BAUTISTA', '10', 99, 'A'),
(1003, 'SANTIAGO', '11', 99, 'A'),
(1004, 'SUBTANJALLA', '12', 99, 'A'),
(1005, 'TATE', '13', 99, 'A'),
(1006, 'YAUCA DEL ROSARIO', '14', 99, 'A'),
(1007, 'CHINCHA ALTA', '01', 100, 'A'),
(1008, 'ALTO LARAN', '02', 100, 'A'),
(1009, 'CHAVIN', '03', 100, 'A'),
(1010, 'CHINCHA BAJA', '04', 100, 'A'),
(1011, 'EL CARMEN', '05', 100, 'A'),
(1012, 'GROCIO PRADO', '06', 100, 'A'),
(1013, 'PUEBLO NUEVO', '07', 100, 'A'),
(1014, 'SAN JUAN DE YANAC', '08', 100, 'A'),
(1015, 'SAN PEDRO DE HUACARPANA', '09', 100, 'A'),
(1016, 'SUNAMPE', '10', 100, 'A'),
(1017, 'TAMBO DE MORA', '11', 100, 'A'),
(1018, 'NASCA', '01', 101, 'A'),
(1019, 'CHANGUILLO', '02', 101, 'A'),
(1020, 'EL INGENIO', '03', 101, 'A'),
(1021, 'MARCONA', '04', 101, 'A'),
(1022, 'VISTA ALEGRE', '05', 101, 'A'),
(1023, 'PALPA', '01', 102, 'A'),
(1024, 'LLIPATA', '02', 102, 'A'),
(1025, 'RÍO GRANDE', '03', 102, 'A'),
(1026, 'SANTA CRUZ', '04', 102, 'A'),
(1027, 'TIBILLO', '05', 102, 'A'),
(1028, 'PISCO', '01', 103, 'A'),
(1029, 'HUANCANO', '02', 103, 'A'),
(1030, 'HUMAY', '03', 103, 'A'),
(1031, 'INDEPENDENCIA', '04', 103, 'A'),
(1032, 'PARACAS', '05', 103, 'A'),
(1033, 'SAN ANDRÉS', '06', 103, 'A'),
(1034, 'SAN CLEMENTE', '07', 103, 'A'),
(1035, 'TUPAC AMARU INCA', '08', 103, 'A'),
(1036, 'HUANCAYO', '01', 104, 'A'),
(1037, 'CARHUACALLANGA', '04', 104, 'A'),
(1038, 'CHACAPAMPA', '05', 104, 'A'),
(1039, 'CHICCHE', '06', 104, 'A'),
(1040, 'CHILCA', '07', 104, 'A'),
(1041, 'CHONGOS ALTO', '08', 104, 'A'),
(1042, 'CHUPURO', '11', 104, 'A'),
(1043, 'COLCA', '12', 104, 'A'),
(1044, 'CULLHUAS', '13', 104, 'A'),
(1045, 'EL TAMBO', '14', 104, 'A'),
(1046, 'HUACRAPUQUIO', '16', 104, 'A'),
(1047, 'HUALHUAS', '17', 104, 'A'),
(1048, 'HUANCAN', '19', 104, 'A'),
(1049, 'HUASICANCHA', '20', 104, 'A'),
(1050, 'HUAYUCACHI', '21', 104, 'A'),
(1051, 'INGENIO', '22', 104, 'A'),
(1052, 'PARIAHUANCA', '24', 104, 'A'),
(1053, 'PILCOMAYO', '25', 104, 'A'),
(1054, 'PUCARA', '26', 104, 'A'),
(1055, 'QUICHUAY', '27', 104, 'A'),
(1056, 'QUILCAS', '28', 104, 'A'),
(1057, 'SAN AGUSTÍN', '29', 104, 'A'),
(1058, 'SAN JERÓNIMO DE TUNAN', '30', 104, 'A'),
(1059, 'SAÑO', '32', 104, 'A'),
(1060, 'SAPALLANGA', '33', 104, 'A'),
(1061, 'SICAYA', '34', 104, 'A'),
(1062, 'SANTO DOMINGO DE ACOBAMBA', '35', 104, 'A'),
(1063, 'VIQUES', '36', 104, 'A'),
(1064, 'CONCEPCIÓN', '01', 105, 'A'),
(1065, 'ACO', '02', 105, 'A'),
(1066, 'ANDAMARCA', '03', 105, 'A'),
(1067, 'CHAMBARA', '04', 105, 'A'),
(1068, 'COCHAS', '05', 105, 'A'),
(1069, 'COMAS', '06', 105, 'A'),
(1070, 'HEROÍNAS TOLEDO', '07', 105, 'A'),
(1071, 'MANZANARES', '08', 105, 'A'),
(1072, 'MARISCAL CASTILLA', '09', 105, 'A'),
(1073, 'MATAHUASI', '10', 105, 'A'),
(1074, 'MITO', '11', 105, 'A'),
(1075, 'NUEVE DE JULIO', '12', 105, 'A'),
(1076, 'ORCOTUNA', '13', 105, 'A'),
(1077, 'SAN JOSÉ DE QUERO', '14', 105, 'A'),
(1078, 'SANTA ROSA DE OCOPA', '15', 105, 'A'),
(1079, 'CHANCHAMAYO', '01', 106, 'A'),
(1080, 'PERENE', '02', 106, 'A'),
(1081, 'PICHANAQUI', '03', 106, 'A'),
(1082, 'SAN LUIS DE SHUARO', '04', 106, 'A'),
(1083, 'SAN RAMÓN', '05', 106, 'A'),
(1084, 'VITOC', '06', 106, 'A'),
(1085, 'JAUJA', '01', 107, 'A'),
(1086, 'ACOLLA', '02', 107, 'A'),
(1087, 'APATA', '03', 107, 'A'),
(1088, 'ATAURA', '04', 107, 'A'),
(1089, 'CANCHAYLLO', '05', 107, 'A'),
(1090, 'CURICACA', '06', 107, 'A'),
(1091, 'EL MANTARO', '07', 107, 'A'),
(1092, 'HUAMALI', '08', 107, 'A'),
(1093, 'HUARIPAMPA', '09', 107, 'A'),
(1094, 'HUERTAS', '10', 107, 'A'),
(1095, 'JANJAILLO', '11', 107, 'A'),
(1096, 'JULCÁN', '12', 107, 'A'),
(1097, 'LEONOR ORDÓÑEZ', '13', 107, 'A'),
(1098, 'LLOCLLAPAMPA', '14', 107, 'A'),
(1099, 'MARCO', '15', 107, 'A'),
(1100, 'MASMA', '16', 107, 'A'),
(1101, 'MASMA CHICCHE', '17', 107, 'A'),
(1102, 'MOLINOS', '18', 107, 'A'),
(1103, 'MONOBAMBA', '19', 107, 'A'),
(1104, 'MUQUI', '20', 107, 'A'),
(1105, 'MUQUIYAUYO', '21', 107, 'A'),
(1106, 'PACA', '22', 107, 'A'),
(1107, 'PACCHA', '23', 107, 'A'),
(1108, 'PANCAN', '24', 107, 'A'),
(1109, 'PARCO', '25', 107, 'A'),
(1110, 'POMACANCHA', '26', 107, 'A'),
(1111, 'RICRAN', '27', 107, 'A'),
(1112, 'SAN LORENZO', '28', 107, 'A'),
(1113, 'SAN PEDRO DE CHUNAN', '29', 107, 'A'),
(1114, 'SAUSA', '30', 107, 'A'),
(1115, 'SINCOS', '31', 107, 'A'),
(1116, 'TUNAN MARCA', '32', 107, 'A'),
(1117, 'YAULI', '33', 107, 'A'),
(1118, 'YAUYOS', '34', 107, 'A'),
(1119, 'JUNIN', '01', 108, 'A'),
(1120, 'CARHUAMAYO', '02', 108, 'A'),
(1121, 'ONDORES', '03', 108, 'A'),
(1122, 'ULCUMAYO', '04', 108, 'A'),
(1123, 'SATIPO', '01', 109, 'A'),
(1124, 'COVIRIALI', '02', 109, 'A'),
(1125, 'LLAYLLA', '03', 109, 'A'),
(1126, 'MAZAMARI', '04', 109, 'A'),
(1127, 'PAMPA HERMOSA', '05', 109, 'A'),
(1128, 'PANGOA', '06', 109, 'A'),
(1129, 'RÍO NEGRO', '07', 109, 'A'),
(1130, 'RÍO TAMBO', '08', 109, 'A'),
(1131, 'VIZCATAN DEL ENE', '09', 109, 'A'),
(1132, 'TARMA', '01', 110, 'A'),
(1133, 'ACOBAMBA', '02', 110, 'A'),
(1134, 'HUARICOLCA', '03', 110, 'A'),
(1135, 'HUASAHUASI', '04', 110, 'A'),
(1136, 'LA UNIÓN', '05', 110, 'A'),
(1137, 'PALCA', '06', 110, 'A'),
(1138, 'PALCAMAYO', '07', 110, 'A'),
(1139, 'SAN PEDRO DE CAJAS', '08', 110, 'A'),
(1140, 'TAPO', '09', 110, 'A'),
(1141, 'LA OROYA', '01', 111, 'A'),
(1142, 'CHACAPALPA', '02', 111, 'A'),
(1143, 'HUAY-HUAY', '03', 111, 'A'),
(1144, 'MARCAPOMACOCHA', '04', 111, 'A'),
(1145, 'MOROCOCHA', '05', 111, 'A'),
(1146, 'PACCHA', '06', 111, 'A'),
(1147, 'SANTA BÁRBARA DE CARHUACAYAN', '07', 111, 'A'),
(1148, 'SANTA ROSA DE SACCO', '08', 111, 'A'),
(1149, 'SUITUCANCHA', '09', 111, 'A'),
(1150, 'YAULI', '10', 111, 'A'),
(1151, 'CHUPACA', '01', 112, 'A'),
(1152, 'AHUAC', '02', 112, 'A'),
(1153, 'CHONGOS BAJO', '03', 112, 'A'),
(1154, 'HUACHAC', '04', 112, 'A'),
(1155, 'HUAMANCACA CHICO', '05', 112, 'A'),
(1156, 'SAN JUAN DE ISCOS', '06', 112, 'A'),
(1157, 'SAN JUAN DE JARPA', '07', 112, 'A'),
(1158, 'TRES DE DICIEMBRE', '08', 112, 'A'),
(1159, 'YANACANCHA', '09', 112, 'A'),
(1160, 'TRUJILLO', '01', 113, 'A'),
(1161, 'EL PORVENIR', '02', 113, 'A'),
(1162, 'FLORENCIA DE MORA', '03', 113, 'A'),
(1163, 'HUANCHACO', '04', 113, 'A'),
(1164, 'LA ESPERANZA', '05', 113, 'A'),
(1165, 'LAREDO', '06', 113, 'A'),
(1166, 'MOCHE', '07', 113, 'A'),
(1167, 'POROTO', '08', 113, 'A'),
(1168, 'SALAVERRY', '09', 113, 'A'),
(1169, 'SIMBAL', '10', 113, 'A'),
(1170, 'VICTOR LARCO HERRERA', '11', 113, 'A'),
(1171, 'ASCOPE', '01', 114, 'A'),
(1172, 'CHICAMA', '02', 114, 'A'),
(1173, 'CHOCOPE', '03', 114, 'A'),
(1174, 'MAGDALENA DE CAO', '04', 114, 'A'),
(1175, 'PAIJAN', '05', 114, 'A'),
(1176, 'RÁZURI', '06', 114, 'A'),
(1177, 'SANTIAGO DE CAO', '07', 114, 'A'),
(1178, 'CASA GRANDE', '08', 114, 'A'),
(1179, 'BOLÍVAR', '01', 115, 'A'),
(1180, 'BAMBAMARCA', '02', 115, 'A'),
(1181, 'CONDORMARCA', '03', 115, 'A'),
(1182, 'LONGOTEA', '04', 115, 'A'),
(1183, 'UCHUMARCA', '05', 115, 'A'),
(1184, 'UCUNCHA', '06', 115, 'A'),
(1185, 'CHEPEN', '01', 116, 'A'),
(1186, 'PACANGA', '02', 116, 'A'),
(1187, 'PUEBLO NUEVO', '03', 116, 'A'),
(1188, 'JULCAN', '01', 117, 'A'),
(1189, 'CALAMARCA', '02', 117, 'A'),
(1190, 'CARABAMBA', '03', 117, 'A'),
(1191, 'HUASO', '04', 117, 'A'),
(1192, 'OTUZCO', '01', 118, 'A'),
(1193, 'AGALLPAMPA', '02', 118, 'A'),
(1194, 'CHARAT', '04', 118, 'A'),
(1195, 'HUARANCHAL', '05', 118, 'A'),
(1196, 'LA CUESTA', '06', 118, 'A'),
(1197, 'MACHE', '08', 118, 'A'),
(1198, 'PARANDAY', '10', 118, 'A'),
(1199, 'SALPO', '11', 118, 'A'),
(1200, 'SINSICAP', '13', 118, 'A'),
(1201, 'USQUIL', '14', 118, 'A'),
(1202, 'SAN PEDRO DE LLOC', '01', 119, 'A'),
(1203, 'GUADALUPE', '02', 119, 'A'),
(1204, 'JEQUETEPEQUE', '03', 119, 'A'),
(1205, 'PACASMAYO', '04', 119, 'A'),
(1206, 'SAN JOSÉ', '05', 119, 'A'),
(1207, 'TAYABAMBA', '01', 120, 'A'),
(1208, 'BULDIBUYO', '02', 120, 'A'),
(1209, 'CHILLIA', '03', 120, 'A'),
(1210, 'HUANCASPATA', '04', 120, 'A'),
(1211, 'HUAYLILLAS', '05', 120, 'A'),
(1212, 'HUAYO', '06', 120, 'A'),
(1213, 'ONGON', '07', 120, 'A'),
(1214, 'PARCOY', '08', 120, 'A'),
(1215, 'PATAZ', '09', 120, 'A'),
(1216, 'PIAS', '10', 120, 'A'),
(1217, 'SANTIAGO DE CHALLAS', '11', 120, 'A'),
(1218, 'TAURIJA', '12', 120, 'A'),
(1219, 'URPAY', '13', 120, 'A'),
(1220, 'HUAMACHUCO', '01', 121, 'A'),
(1221, 'CHUGAY', '02', 121, 'A'),
(1222, 'COCHORCO', '03', 121, 'A'),
(1223, 'CURGOS', '04', 121, 'A'),
(1224, 'MARCABAL', '05', 121, 'A'),
(1225, 'SANAGORAN', '06', 121, 'A'),
(1226, 'SARIN', '07', 121, 'A'),
(1227, 'SARTIMBAMBA', '08', 121, 'A'),
(1228, 'SANTIAGO DE CHUCO', '01', 122, 'A'),
(1229, 'ANGASMARCA', '02', 122, 'A'),
(1230, 'CACHICADAN', '03', 122, 'A'),
(1231, 'MOLLEBAMBA', '04', 122, 'A'),
(1232, 'MOLLEPATA', '05', 122, 'A'),
(1233, 'QUIRUVILCA', '06', 122, 'A'),
(1234, 'SANTA CRUZ DE CHUCA', '07', 122, 'A'),
(1235, 'SITABAMBA', '08', 122, 'A'),
(1236, 'CASCAS', '01', 123, 'A'),
(1237, 'LUCMA', '02', 123, 'A'),
(1238, 'MARMOT', '03', 123, 'A'),
(1239, 'SAYAPULLO', '04', 123, 'A'),
(1240, 'VIRU', '01', 124, 'A'),
(1241, 'CHAO', '02', 124, 'A'),
(1242, 'GUADALUPITO', '03', 124, 'A'),
(1243, 'CHICLAYO', '01', 125, 'A'),
(1244, 'CHONGOYAPE', '02', 125, 'A'),
(1245, 'ETEN', '03', 125, 'A'),
(1246, 'ETEN PUERTO', '04', 125, 'A'),
(1247, 'JOSÉ LEONARDO ORTIZ', '05', 125, 'A'),
(1248, 'LA VICTORIA', '06', 125, 'A'),
(1249, 'LAGUNAS', '07', 125, 'A'),
(1250, 'MONSEFU', '08', 125, 'A'),
(1251, 'NUEVA ARICA', '09', 125, 'A'),
(1252, 'OYOTUN', '10', 125, 'A'),
(1253, 'PICSI', '11', 125, 'A'),
(1254, 'PIMENTEL', '12', 125, 'A'),
(1255, 'REQUE', '13', 125, 'A'),
(1256, 'SANTA ROSA', '14', 125, 'A'),
(1257, 'SAÑA', '15', 125, 'A'),
(1258, 'CAYALTI', '16', 125, 'A'),
(1259, 'PATAPO', '17', 125, 'A'),
(1260, 'POMALCA', '18', 125, 'A'),
(1261, 'PUCALA', '19', 125, 'A'),
(1262, 'TUMAN', '20', 125, 'A'),
(1263, 'FERREÑAFE', '01', 126, 'A'),
(1264, 'CAÑARIS', '02', 126, 'A'),
(1265, 'INCAHUASI', '03', 126, 'A'),
(1266, 'MANUEL ANTONIO MESONES MURO', '04', 126, 'A'),
(1267, 'PITIPO', '05', 126, 'A'),
(1268, 'PUEBLO NUEVO', '06', 126, 'A'),
(1269, 'LAMBAYEQUE', '01', 127, 'A'),
(1270, 'CHOCHOPE', '02', 127, 'A'),
(1271, 'ILLIMO', '03', 127, 'A'),
(1272, 'JAYANCA', '04', 127, 'A'),
(1273, 'MOCHUMI', '05', 127, 'A'),
(1274, 'MORROPE', '06', 127, 'A'),
(1275, 'MOTUPE', '07', 127, 'A'),
(1276, 'OLMOS', '08', 127, 'A'),
(1277, 'PACORA', '09', 127, 'A'),
(1278, 'SALAS', '10', 127, 'A'),
(1279, 'SAN JOSÉ', '11', 127, 'A'),
(1280, 'TUCUME', '12', 127, 'A'),
(1281, 'LIMA', '01', 128, 'A'),
(1282, 'ANCÓN', '02', 128, 'A'),
(1283, 'ATE', '03', 128, 'A'),
(1284, 'BARRANCO', '04', 128, 'A'),
(1285, 'BREÑA', '05', 128, 'A'),
(1286, 'CARABAYLLO', '06', 128, 'A'),
(1287, 'CHACLACAYO', '07', 128, 'A'),
(1288, 'CHORRILLOS', '08', 128, 'A'),
(1289, 'CIENEGUILLA', '09', 128, 'A'),
(1290, 'COMAS', '10', 128, 'A'),
(1291, 'EL AGUSTINO', '11', 128, 'A'),
(1292, 'INDEPENDENCIA', '12', 128, 'A'),
(1293, 'JESÚS MARÍA', '13', 128, 'A'),
(1294, 'LA MOLINA', '14', 128, 'A'),
(1295, 'LA VICTORIA', '15', 128, 'A'),
(1296, 'LINCE', '16', 128, 'A'),
(1297, 'LOS OLIVOS', '17', 128, 'A'),
(1298, 'LURIGANCHO', '18', 128, 'A'),
(1299, 'LURIN', '19', 128, 'A'),
(1300, 'MAGDALENA DEL MAR', '20', 128, 'A'),
(1301, 'PUEBLO LIBRE', '21', 128, 'A'),
(1302, 'MIRAFLORES', '22', 128, 'A'),
(1303, 'PACHACAMAC', '23', 128, 'A'),
(1304, 'PUCUSANA', '24', 128, 'A'),
(1305, 'PUENTE PIEDRA', '25', 128, 'A'),
(1306, 'PUNTA HERMOSA', '26', 128, 'A'),
(1307, 'PUNTA NEGRA', '27', 128, 'A'),
(1308, 'RÍMAC', '28', 128, 'A'),
(1309, 'SAN BARTOLO', '29', 128, 'A'),
(1310, 'SAN BORJA', '30', 128, 'A'),
(1311, 'SAN ISIDRO', '31', 128, 'A'),
(1312, 'SAN JUAN DE LURIGANCHO', '32', 128, 'A'),
(1313, 'SAN JUAN DE MIRAFLORES', '33', 128, 'A'),
(1314, 'SAN LUIS', '34', 128, 'A'),
(1315, 'SAN MARTÍN DE PORRES', '35', 128, 'A'),
(1316, 'SAN MIGUEL', '36', 128, 'A'),
(1317, 'SANTA ANITA', '37', 128, 'A'),
(1318, 'SANTA MARÍA DEL MAR', '38', 128, 'A'),
(1319, 'SANTA ROSA', '39', 128, 'A'),
(1320, 'SANTIAGO DE SURCO', '40', 128, 'A'),
(1321, 'SURQUILLO', '41', 128, 'A'),
(1322, 'VILLA EL SALVADOR', '42', 128, 'A'),
(1323, 'VILLA MARÍA DEL TRIUNFO', '43', 128, 'A'),
(1324, 'BARRANCA', '01', 129, 'A'),
(1325, 'PARAMONGA', '02', 129, 'A'),
(1326, 'PATIVILCA', '03', 129, 'A'),
(1327, 'SUPE', '04', 129, 'A'),
(1328, 'SUPE PUERTO', '05', 129, 'A'),
(1329, 'CAJATAMBO', '01', 130, 'A'),
(1330, 'COPA', '02', 130, 'A'),
(1331, 'GORGOR', '03', 130, 'A'),
(1332, 'HUANCAPON', '04', 130, 'A'),
(1333, 'MANAS', '05', 130, 'A'),
(1334, 'CANTA', '01', 131, 'A'),
(1335, 'ARAHUAY', '02', 131, 'A'),
(1336, 'HUAMANTANGA', '03', 131, 'A'),
(1337, 'HUAROS', '04', 131, 'A'),
(1338, 'LACHAQUI', '05', 131, 'A'),
(1339, 'SAN BUENAVENTURA', '06', 131, 'A'),
(1340, 'SANTA ROSA DE QUIVES', '07', 131, 'A'),
(1341, 'SAN VICENTE DE CAÑETE', '01', 132, 'A'),
(1342, 'ASIA', '02', 132, 'A'),
(1343, 'CALANGO', '03', 132, 'A'),
(1344, 'CERRO AZUL', '04', 132, 'A'),
(1345, 'CHILCA', '05', 132, 'A'),
(1346, 'COAYLLO', '06', 132, 'A'),
(1347, 'IMPERIAL', '07', 132, 'A'),
(1348, 'LUNAHUANA', '08', 132, 'A'),
(1349, 'MALA', '09', 132, 'A'),
(1350, 'NUEVO IMPERIAL', '10', 132, 'A'),
(1351, 'PACARAN', '11', 132, 'A'),
(1352, 'QUILMANA', '12', 132, 'A'),
(1353, 'SAN ANTONIO', '13', 132, 'A'),
(1354, 'SAN LUIS', '14', 132, 'A'),
(1355, 'SANTA CRUZ DE FLORES', '15', 132, 'A'),
(1356, 'ZÚÑIGA', '16', 132, 'A'),
(1357, 'HUARAL', '01', 133, 'A'),
(1358, 'ATAVILLOS ALTO', '02', 133, 'A'),
(1359, 'ATAVILLOS BAJO', '03', 133, 'A'),
(1360, 'AUCALLAMA', '04', 133, 'A'),
(1361, 'CHANCAY', '05', 133, 'A'),
(1362, 'IHUARI', '06', 133, 'A'),
(1363, 'LAMPIAN', '07', 133, 'A'),
(1364, 'PACARAOS', '08', 133, 'A'),
(1365, 'SAN MIGUEL DE ACOS', '09', 133, 'A'),
(1366, 'SANTA CRUZ DE ANDAMARCA', '10', 133, 'A'),
(1367, 'SUMBILCA', '11', 133, 'A'),
(1368, 'VEINTISIETE DE NOVIEMBRE', '12', 133, 'A'),
(1369, 'MATUCANA', '01', 134, 'A'),
(1370, 'ANTIOQUIA', '02', 134, 'A'),
(1371, 'CALLAHUANCA', '03', 134, 'A'),
(1372, 'CARAMPOMA', '04', 134, 'A'),
(1373, 'CHICLA', '05', 134, 'A'),
(1374, 'CUENCA', '06', 134, 'A'),
(1375, 'HUACHUPAMPA', '07', 134, 'A'),
(1376, 'HUANZA', '08', 134, 'A'),
(1377, 'HUAROCHIRI', '09', 134, 'A'),
(1378, 'LAHUAYTAMBO', '10', 134, 'A'),
(1379, 'LANGA', '11', 134, 'A'),
(1380, 'LARAOS', '12', 134, 'A'),
(1381, 'MARIATANA', '13', 134, 'A'),
(1382, 'RICARDO PALMA', '14', 134, 'A'),
(1383, 'SAN ANDRÉS DE TUPICOCHA', '15', 134, 'A'),
(1384, 'SAN ANTONIO', '16', 134, 'A'),
(1385, 'SAN BARTOLOMÉ', '17', 134, 'A'),
(1386, 'SAN DAMIAN', '18', 134, 'A'),
(1387, 'SAN JUAN DE IRIS', '19', 134, 'A'),
(1388, 'SAN JUAN DE TANTARANCHE', '20', 134, 'A'),
(1389, 'SAN LORENZO DE QUINTI', '21', 134, 'A'),
(1390, 'SAN MATEO', '22', 134, 'A'),
(1391, 'SAN MATEO DE OTAO', '23', 134, 'A'),
(1392, 'SAN PEDRO DE CASTA', '24', 134, 'A'),
(1393, 'SAN PEDRO DE HUANCAYRE', '25', 134, 'A'),
(1394, 'SANGALLAYA', '26', 134, 'A'),
(1395, 'SANTA CRUZ DE COCACHACRA', '27', 134, 'A'),
(1396, 'SANTA EULALIA', '28', 134, 'A'),
(1397, 'SANTIAGO DE ANCHUCAYA', '29', 134, 'A'),
(1398, 'SANTIAGO DE TUNA', '30', 134, 'A'),
(1399, 'SANTO DOMINGO DE LOS OLLEROS', '31', 134, 'A'),
(1400, 'SURCO', '32', 134, 'A'),
(1401, 'HUACHO', '01', 135, 'A'),
(1402, 'AMBAR', '02', 135, 'A'),
(1403, 'CALETA DE CARQUIN', '03', 135, 'A'),
(1404, 'CHECRAS', '04', 135, 'A'),
(1405, 'HUALMAY', '05', 135, 'A'),
(1406, 'HUAURA', '06', 135, 'A'),
(1407, 'LEONCIO PRADO', '07', 135, 'A'),
(1408, 'PACCHO', '08', 135, 'A'),
(1409, 'SANTA LEONOR', '09', 135, 'A'),
(1410, 'SANTA MARÍA', '10', 135, 'A'),
(1411, 'SAYAN', '11', 135, 'A'),
(1412, 'VEGUETA', '12', 135, 'A'),
(1413, 'OYON', '01', 136, 'A'),
(1414, 'ANDAJES', '02', 136, 'A'),
(1415, 'CAUJUL', '03', 136, 'A'),
(1416, 'COCHAMARCA', '04', 136, 'A'),
(1417, 'NAVAN', '05', 136, 'A'),
(1418, 'PACHANGARA', '06', 136, 'A'),
(1419, 'YAUYOS', '01', 137, 'A'),
(1420, 'ALIS', '02', 137, 'A'),
(1421, 'ALLAUCA', '03', 137, 'A'),
(1422, 'AYAVIRI', '04', 137, 'A'),
(1423, 'AZÁNGARO', '05', 137, 'A'),
(1424, 'CACRA', '06', 137, 'A'),
(1425, 'CARANIA', '07', 137, 'A'),
(1426, 'CATAHUASI', '08', 137, 'A'),
(1427, 'CHOCOS', '09', 137, 'A'),
(1428, 'COCHAS', '10', 137, 'A'),
(1429, 'COLONIA', '11', 137, 'A'),
(1430, 'HONGOS', '12', 137, 'A'),
(1431, 'HUAMPARA', '13', 137, 'A'),
(1432, 'HUANCAYA', '14', 137, 'A'),
(1433, 'HUANGASCAR', '15', 137, 'A'),
(1434, 'HUANTAN', '16', 137, 'A'),
(1435, 'HUAÑEC', '17', 137, 'A'),
(1436, 'LARAOS', '18', 137, 'A'),
(1437, 'LINCHA', '19', 137, 'A'),
(1438, 'MADEAN', '20', 137, 'A'),
(1439, 'MIRAFLORES', '21', 137, 'A'),
(1440, 'OMAS', '22', 137, 'A'),
(1441, 'PUTINZA', '23', 137, 'A'),
(1442, 'QUINCHES', '24', 137, 'A'),
(1443, 'QUINOCAY', '25', 137, 'A'),
(1444, 'SAN JOAQUÍN', '26', 137, 'A'),
(1445, 'SAN PEDRO DE PILAS', '27', 137, 'A'),
(1446, 'TANTA', '28', 137, 'A'),
(1447, 'TAURIPAMPA', '29', 137, 'A'),
(1448, 'TOMAS', '30', 137, 'A'),
(1449, 'TUPE', '31', 137, 'A'),
(1450, 'VIÑAC', '32', 137, 'A'),
(1451, 'VITIS', '33', 137, 'A'),
(1452, 'IQUITOS', '01', 138, 'A'),
(1453, 'ALTO NANAY', '02', 138, 'A'),
(1454, 'FERNANDO LORES', '03', 138, 'A'),
(1455, 'INDIANA', '04', 138, 'A'),
(1456, 'LAS AMAZONAS', '05', 138, 'A'),
(1457, 'MAZAN', '06', 138, 'A'),
(1458, 'NAPO', '07', 138, 'A'),
(1459, 'PUNCHANA', '08', 138, 'A'),
(1460, 'TORRES CAUSANA', '10', 138, 'A'),
(1461, 'BELÉN', '12', 138, 'A'),
(1462, 'SAN JUAN BAUTISTA', '13', 138, 'A'),
(1463, 'YURIMAGUAS', '01', 139, 'A'),
(1464, 'BALSAPUERTO', '02', 139, 'A'),
(1465, 'JEBEROS', '05', 139, 'A'),
(1466, 'LAGUNAS', '06', 139, 'A'),
(1467, 'SANTA CRUZ', '10', 139, 'A'),
(1468, 'TENIENTE CESAR LÓPEZ ROJAS', '11', 139, 'A'),
(1469, 'NAUTA', '01', 140, 'A'),
(1470, 'PARINARI', '02', 140, 'A'),
(1471, 'TIGRE', '03', 140, 'A'),
(1472, 'TROMPETEROS', '04', 140, 'A'),
(1473, 'URARINAS', '05', 140, 'A'),
(1474, 'RAMÓN CASTILLA', '01', 141, 'A'),
(1475, 'PEBAS', '02', 141, 'A'),
(1476, 'YAVARI', '03', 141, 'A');
INSERT INTO `distrito` (`IdDistrito`, `NombreDistrito`, `CodigoUbigeoDistrito`, `IdProvincia`, `IndicadorEstado`) VALUES
(1477, 'SAN PABLO', '04', 141, 'A'),
(1478, 'REQUENA', '01', 142, 'A'),
(1479, 'ALTO TAPICHE', '02', 142, 'A'),
(1480, 'CAPELO', '03', 142, 'A'),
(1481, 'EMILIO SAN MARTÍN', '04', 142, 'A'),
(1482, 'MAQUIA', '05', 142, 'A'),
(1483, 'PUINAHUA', '06', 142, 'A'),
(1484, 'SAQUENA', '07', 142, 'A'),
(1485, 'SOPLIN', '08', 142, 'A'),
(1486, 'TAPICHE', '09', 142, 'A'),
(1487, 'JENARO HERRERA', '10', 142, 'A'),
(1488, 'YAQUERANA', '11', 142, 'A'),
(1489, 'CONTAMANA', '01', 143, 'A'),
(1490, 'INAHUAYA', '02', 143, 'A'),
(1491, 'PADRE MÁRQUEZ', '03', 143, 'A'),
(1492, 'PAMPA HERMOSA', '04', 143, 'A'),
(1493, 'SARAYACU', '05', 143, 'A'),
(1494, 'VARGAS GUERRA', '06', 143, 'A'),
(1495, 'BARRANCA', '01', 144, 'A'),
(1496, 'CAHUAPANAS', '02', 144, 'A'),
(1497, 'MANSERICHE', '03', 144, 'A'),
(1498, 'MORONA', '04', 144, 'A'),
(1499, 'PASTAZA', '05', 144, 'A'),
(1500, 'ANDOAS', '06', 144, 'A'),
(1501, 'PUTUMAYO', '01', 145, 'A'),
(1502, 'ROSA PANDURO', '02', 145, 'A'),
(1503, 'TENIENTE MANUEL CLAVERO', '03', 145, 'A'),
(1504, 'YAGUAS', '04', 145, 'A'),
(1505, 'TAMBOPATA', '01', 146, 'A'),
(1506, 'INAMBARI', '02', 146, 'A'),
(1507, 'LAS PIEDRAS', '03', 146, 'A'),
(1508, 'LABERINTO', '04', 146, 'A'),
(1509, 'MANU', '01', 147, 'A'),
(1510, 'FITZCARRALD', '02', 147, 'A'),
(1511, 'MADRE DE DIOS', '03', 147, 'A'),
(1512, 'HUEPETUHE', '04', 147, 'A'),
(1513, 'IÑAPARI', '01', 148, 'A'),
(1514, 'IBERIA', '02', 148, 'A'),
(1515, 'TAHUAMANU', '03', 148, 'A'),
(1516, 'MOQUEGUA', '01', 149, 'A'),
(1517, 'CARUMAS', '02', 149, 'A'),
(1518, 'CUCHUMBAYA', '03', 149, 'A'),
(1519, 'SAMEGUA', '04', 149, 'A'),
(1520, 'SAN CRISTÓBAL', '05', 149, 'A'),
(1521, 'TORATA', '06', 149, 'A'),
(1522, 'OMATE', '01', 150, 'A'),
(1523, 'CHOJATA', '02', 150, 'A'),
(1524, 'COALAQUE', '03', 150, 'A'),
(1525, 'ICHUÑA', '04', 150, 'A'),
(1526, 'LA CAPILLA', '05', 150, 'A'),
(1527, 'LLOQUE', '06', 150, 'A'),
(1528, 'MATALAQUE', '07', 150, 'A'),
(1529, 'PUQUINA', '08', 150, 'A'),
(1530, 'QUINISTAQUILLAS', '09', 150, 'A'),
(1531, 'UBINAS', '10', 150, 'A'),
(1532, 'YUNGA', '11', 150, 'A'),
(1533, 'ILO', '01', 151, 'A'),
(1534, 'EL ALGARROBAL', '02', 151, 'A'),
(1535, 'PACOCHA', '03', 151, 'A'),
(1536, 'CHAUPIMARCA', '01', 152, 'A'),
(1537, 'HUACHON', '02', 152, 'A'),
(1538, 'HUARIACA', '03', 152, 'A'),
(1539, 'HUAYLLAY', '04', 152, 'A'),
(1540, 'NINACACA', '05', 152, 'A'),
(1541, 'PALLANCHACRA', '06', 152, 'A'),
(1542, 'PAUCARTAMBO', '07', 152, 'A'),
(1543, 'SAN FRANCISCO DE ASÍS DE YARUSYACAN', '08', 152, 'A'),
(1544, 'SIMON BOLÍVAR', '09', 152, 'A'),
(1545, 'TICLACAYAN', '10', 152, 'A'),
(1546, 'TINYAHUARCO', '11', 152, 'A'),
(1547, 'VICCO', '12', 152, 'A'),
(1548, 'YANACANCHA', '13', 152, 'A'),
(1549, 'YANAHUANCA', '01', 153, 'A'),
(1550, 'CHACAYAN', '02', 153, 'A'),
(1551, 'GOYLLARISQUIZGA', '03', 153, 'A'),
(1552, 'PAUCAR', '04', 153, 'A'),
(1553, 'SAN PEDRO DE PILLAO', '05', 153, 'A'),
(1554, 'SANTA ANA DE TUSI', '06', 153, 'A'),
(1555, 'TAPUC', '07', 153, 'A'),
(1556, 'VILCABAMBA', '08', 153, 'A'),
(1557, 'OXAPAMPA', '01', 154, 'A'),
(1558, 'CHONTABAMBA', '02', 154, 'A'),
(1559, 'HUANCABAMBA', '03', 154, 'A'),
(1560, 'PALCAZU', '04', 154, 'A'),
(1561, 'POZUZO', '05', 154, 'A'),
(1562, 'PUERTO BERMÚDEZ', '06', 154, 'A'),
(1563, 'VILLA RICA', '07', 154, 'A'),
(1564, 'CONSTITUCIÓN', '08', 154, 'A'),
(1565, 'PIURA', '01', 155, 'A'),
(1566, 'CASTILLA', '04', 155, 'A'),
(1567, 'CATACAOS', '05', 155, 'A'),
(1568, 'CURA MORI', '07', 155, 'A'),
(1569, 'EL TALLAN', '08', 155, 'A'),
(1570, 'LA ARENA', '09', 155, 'A'),
(1571, 'LA UNIÓN', '10', 155, 'A'),
(1572, 'LAS LOMAS', '11', 155, 'A'),
(1573, 'TAMBO GRANDE', '14', 155, 'A'),
(1574, 'VEINTISEIS DE OCTUBRE', '15', 155, 'A'),
(1575, 'AYABACA', '01', 156, 'A'),
(1576, 'FRIAS', '02', 156, 'A'),
(1577, 'JILILI', '03', 156, 'A'),
(1578, 'LAGUNAS', '04', 156, 'A'),
(1579, 'MONTERO', '05', 156, 'A'),
(1580, 'PACAIPAMPA', '06', 156, 'A'),
(1581, 'PAIMAS', '07', 156, 'A'),
(1582, 'SAPILLICA', '08', 156, 'A'),
(1583, 'SICCHEZ', '09', 156, 'A'),
(1584, 'SUYO', '10', 156, 'A'),
(1585, 'HUANCABAMBA', '01', 157, 'A'),
(1586, 'CANCHAQUE', '02', 157, 'A'),
(1587, 'EL CARMEN DE LA FRONTERA', '03', 157, 'A'),
(1588, 'HUARMACA', '04', 157, 'A'),
(1589, 'LALAQUIZ', '05', 157, 'A'),
(1590, 'SAN MIGUEL DE EL FAIQUE', '06', 157, 'A'),
(1591, 'SONDOR', '07', 157, 'A'),
(1592, 'SONDORILLO', '08', 157, 'A'),
(1593, 'CHULUCANAS', '01', 158, 'A'),
(1594, 'BUENOS AIRES', '02', 158, 'A'),
(1595, 'CHALACO', '03', 158, 'A'),
(1596, 'LA MATANZA', '04', 158, 'A'),
(1597, 'MORROPON', '05', 158, 'A'),
(1598, 'SALITRAL', '06', 158, 'A'),
(1599, 'SAN JUAN DE BIGOTE', '07', 158, 'A'),
(1600, 'SANTA CATALINA DE MOSSA', '08', 158, 'A'),
(1601, 'SANTO DOMINGO', '09', 158, 'A'),
(1602, 'YAMANGO', '10', 158, 'A'),
(1603, 'PAITA', '01', 159, 'A'),
(1604, 'AMOTAPE', '02', 159, 'A'),
(1605, 'ARENAL', '03', 159, 'A'),
(1606, 'COLAN', '04', 159, 'A'),
(1607, 'LA HUACA', '05', 159, 'A'),
(1608, 'TAMARINDO', '06', 159, 'A'),
(1609, 'VICHAYAL', '07', 159, 'A'),
(1610, 'SULLANA', '01', 160, 'A'),
(1611, 'BELLAVISTA', '02', 160, 'A'),
(1612, 'IGNACIO ESCUDERO', '03', 160, 'A'),
(1613, 'LANCONES', '04', 160, 'A'),
(1614, 'MARCAVELICA', '05', 160, 'A'),
(1615, 'MIGUEL CHECA', '06', 160, 'A'),
(1616, 'QUERECOTILLO', '07', 160, 'A'),
(1617, 'SALITRAL', '08', 160, 'A'),
(1618, 'PARIÑAS', '01', 161, 'A'),
(1619, 'EL ALTO', '02', 161, 'A'),
(1620, 'LA BREA', '03', 161, 'A'),
(1621, 'LOBITOS', '04', 161, 'A'),
(1622, 'LOS ORGANOS', '05', 161, 'A'),
(1623, 'MANCORA', '06', 161, 'A'),
(1624, 'SECHURA', '01', 162, 'A'),
(1625, 'BELLAVISTA DE LA UNIÓN', '02', 162, 'A'),
(1626, 'BERNAL', '03', 162, 'A'),
(1627, 'CRISTO NOS VALGA', '04', 162, 'A'),
(1628, 'VICE', '05', 162, 'A'),
(1629, 'RINCONADA LLICUAR', '06', 162, 'A'),
(1630, 'PUNO', '01', 163, 'A'),
(1631, 'ACORA', '02', 163, 'A'),
(1632, 'AMANTANI', '03', 163, 'A'),
(1633, 'ATUNCOLLA', '04', 163, 'A'),
(1634, 'CAPACHICA', '05', 163, 'A'),
(1635, 'CHUCUITO', '06', 163, 'A'),
(1636, 'COATA', '07', 163, 'A'),
(1637, 'HUATA', '08', 163, 'A'),
(1638, 'MAÑAZO', '09', 163, 'A'),
(1639, 'PAUCARCOLLA', '10', 163, 'A'),
(1640, 'PICHACANI', '11', 163, 'A'),
(1641, 'PLATERIA', '12', 163, 'A'),
(1642, 'SAN ANTONIO', '13', 163, 'A'),
(1643, 'TIQUILLACA', '14', 163, 'A'),
(1644, 'VILQUE', '15', 163, 'A'),
(1645, 'AZÁNGARO', '01', 164, 'A'),
(1646, 'ACHAYA', '02', 164, 'A'),
(1647, 'ARAPA', '03', 164, 'A'),
(1648, 'ASILLO', '04', 164, 'A'),
(1649, 'CAMINACA', '05', 164, 'A'),
(1650, 'CHUPA', '06', 164, 'A'),
(1651, 'JOSÉ DOMINGO CHOQUEHUANCA', '07', 164, 'A'),
(1652, 'MUÑANI', '08', 164, 'A'),
(1653, 'POTONI', '09', 164, 'A'),
(1654, 'SAMAN', '10', 164, 'A'),
(1655, 'SAN ANTON', '11', 164, 'A'),
(1656, 'SAN JOSÉ', '12', 164, 'A'),
(1657, 'SAN JUAN DE SALINAS', '13', 164, 'A'),
(1658, 'SANTIAGO DE PUPUJA', '14', 164, 'A'),
(1659, 'TIRAPATA', '15', 164, 'A'),
(1660, 'MACUSANI', '01', 165, 'A'),
(1661, 'AJOYANI', '02', 165, 'A'),
(1662, 'AYAPATA', '03', 165, 'A'),
(1663, 'COASA', '04', 165, 'A'),
(1664, 'CORANI', '05', 165, 'A'),
(1665, 'CRUCERO', '06', 165, 'A'),
(1666, 'ITUATA', '07', 165, 'A'),
(1667, 'OLLACHEA', '08', 165, 'A'),
(1668, 'SAN GABAN', '09', 165, 'A'),
(1669, 'USICAYOS', '10', 165, 'A'),
(1670, 'JULI', '01', 166, 'A'),
(1671, 'DESAGUADERO', '02', 166, 'A'),
(1672, 'HUACULLANI', '03', 166, 'A'),
(1673, 'KELLUYO', '04', 166, 'A'),
(1674, 'PISACOMA', '05', 166, 'A'),
(1675, 'POMATA', '06', 166, 'A'),
(1676, 'ZEPITA', '07', 166, 'A'),
(1677, 'ILAVE', '01', 167, 'A'),
(1678, 'CAPAZO', '02', 167, 'A'),
(1679, 'PILCUYO', '03', 167, 'A'),
(1680, 'SANTA ROSA', '04', 167, 'A'),
(1681, 'CONDURIRI', '05', 167, 'A'),
(1682, 'HUANCANE', '01', 168, 'A'),
(1683, 'COJATA', '02', 168, 'A'),
(1684, 'HUATASANI', '03', 168, 'A'),
(1685, 'INCHUPALLA', '04', 168, 'A'),
(1686, 'PUSI', '05', 168, 'A'),
(1687, 'ROSASPATA', '06', 168, 'A'),
(1688, 'TARACO', '07', 168, 'A'),
(1689, 'VILQUE CHICO', '08', 168, 'A'),
(1690, 'LAMPA', '01', 169, 'A'),
(1691, 'CABANILLA', '02', 169, 'A'),
(1692, 'CALAPUJA', '03', 169, 'A'),
(1693, 'NICASIO', '04', 169, 'A'),
(1694, 'OCUVIRI', '05', 169, 'A'),
(1695, 'PALCA', '06', 169, 'A'),
(1696, 'PARATIA', '07', 169, 'A'),
(1697, 'PUCARA', '08', 169, 'A'),
(1698, 'SANTA LUCIA', '09', 169, 'A'),
(1699, 'VILAVILA', '10', 169, 'A'),
(1700, 'AYAVIRI', '01', 170, 'A'),
(1701, 'ANTAUTA', '02', 170, 'A'),
(1702, 'CUPI', '03', 170, 'A'),
(1703, 'LLALLI', '04', 170, 'A'),
(1704, 'MACARI', '05', 170, 'A'),
(1705, 'NUÑOA', '06', 170, 'A'),
(1706, 'ORURILLO', '07', 170, 'A'),
(1707, 'SANTA ROSA', '08', 170, 'A'),
(1708, 'UMACHIRI', '09', 170, 'A'),
(1709, 'MOHO', '01', 171, 'A'),
(1710, 'CONIMA', '02', 171, 'A'),
(1711, 'HUAYRAPATA', '03', 171, 'A'),
(1712, 'TILALI', '04', 171, 'A'),
(1713, 'PUTINA', '01', 172, 'A'),
(1714, 'ANANEA', '02', 172, 'A'),
(1715, 'PEDRO VILCA APAZA', '03', 172, 'A'),
(1716, 'QUILCAPUNCU', '04', 172, 'A'),
(1717, 'SINA', '05', 172, 'A'),
(1718, 'JULIACA', '01', 173, 'A'),
(1719, 'CABANA', '02', 173, 'A'),
(1720, 'CABANILLAS', '03', 173, 'A'),
(1721, 'CARACOTO', '04', 173, 'A'),
(1722, 'SAN MIGUEL', '05', 173, 'A'),
(1723, 'SANDIA', '01', 174, 'A'),
(1724, 'CUYOCUYO', '02', 174, 'A'),
(1725, 'LIMBANI', '03', 174, 'A'),
(1726, 'PATAMBUCO', '04', 174, 'A'),
(1727, 'PHARA', '05', 174, 'A'),
(1728, 'QUIACA', '06', 174, 'A'),
(1729, 'SAN JUAN DEL ORO', '07', 174, 'A'),
(1730, 'YANAHUAYA', '08', 174, 'A'),
(1731, 'ALTO INAMBARI', '09', 174, 'A'),
(1732, 'SAN PEDRO DE PUTINA PUNCO', '10', 174, 'A'),
(1733, 'YUNGUYO', '01', 175, 'A'),
(1734, 'ANAPIA', '02', 175, 'A'),
(1735, 'COPANI', '03', 175, 'A'),
(1736, 'CUTURAPI', '04', 175, 'A'),
(1737, 'OLLARAYA', '05', 175, 'A'),
(1738, 'TINICACHI', '06', 175, 'A'),
(1739, 'UNICACHI', '07', 175, 'A'),
(1740, 'MOYOBAMBA', '01', 176, 'A'),
(1741, 'CALZADA', '02', 176, 'A'),
(1742, 'HABANA', '03', 176, 'A'),
(1743, 'JEPELACIO', '04', 176, 'A'),
(1744, 'SORITOR', '05', 176, 'A'),
(1745, 'YANTALO', '06', 176, 'A'),
(1746, 'BELLAVISTA', '01', 177, 'A'),
(1747, 'ALTO BIAVO', '02', 177, 'A'),
(1748, 'BAJO BIAVO', '03', 177, 'A'),
(1749, 'HUALLAGA', '04', 177, 'A'),
(1750, 'SAN PABLO', '05', 177, 'A'),
(1751, 'SAN RAFAEL', '06', 177, 'A'),
(1752, 'SAN JOSÉ DE SISA', '01', 178, 'A'),
(1753, 'AGUA BLANCA', '02', 178, 'A'),
(1754, 'SAN MARTÍN', '03', 178, 'A'),
(1755, 'SANTA ROSA', '04', 178, 'A'),
(1756, 'SHATOJA', '05', 178, 'A'),
(1757, 'SAPOSOA', '01', 179, 'A'),
(1758, 'ALTO SAPOSOA', '02', 179, 'A'),
(1759, 'EL ESLABÓN', '03', 179, 'A'),
(1760, 'PISCOYACU', '04', 179, 'A'),
(1761, 'SACANCHE', '05', 179, 'A'),
(1762, 'TINGO DE SAPOSOA', '06', 179, 'A'),
(1763, 'LAMAS', '01', 180, 'A'),
(1764, 'ALONSO DE ALVARADO', '02', 180, 'A'),
(1765, 'BARRANQUITA', '03', 180, 'A'),
(1766, 'CAYNARACHI', '04', 180, 'A'),
(1767, 'CUÑUMBUQUI', '05', 180, 'A'),
(1768, 'PINTO RECODO', '06', 180, 'A'),
(1769, 'RUMISAPA', '07', 180, 'A'),
(1770, 'SAN ROQUE DE CUMBAZA', '08', 180, 'A'),
(1771, 'SHANAO', '09', 180, 'A'),
(1772, 'TABALOSOS', '10', 180, 'A'),
(1773, 'ZAPATERO', '11', 180, 'A'),
(1774, 'JUANJUÍ', '01', 181, 'A'),
(1775, 'CAMPANILLA', '02', 181, 'A'),
(1776, 'HUICUNGO', '03', 181, 'A'),
(1777, 'PACHIZA', '04', 181, 'A'),
(1778, 'PAJARILLO', '05', 181, 'A'),
(1779, 'PICOTA', '01', 182, 'A'),
(1780, 'BUENOS AIRES', '02', 182, 'A'),
(1781, 'CASPISAPA', '03', 182, 'A'),
(1782, 'PILLUANA', '04', 182, 'A'),
(1783, 'PUCACACA', '05', 182, 'A'),
(1784, 'SAN CRISTÓBAL', '06', 182, 'A'),
(1785, 'SAN HILARIÓN', '07', 182, 'A'),
(1786, 'SHAMBOYACU', '08', 182, 'A'),
(1787, 'TINGO DE PONASA', '09', 182, 'A'),
(1788, 'TRES UNIDOS', '10', 182, 'A'),
(1789, 'RIOJA', '01', 183, 'A'),
(1790, 'AWAJUN', '02', 183, 'A'),
(1791, 'ELÍAS SOPLIN VARGAS', '03', 183, 'A'),
(1792, 'NUEVA CAJAMARCA', '04', 183, 'A'),
(1793, 'PARDO MIGUEL', '05', 183, 'A'),
(1794, 'POSIC', '06', 183, 'A'),
(1795, 'SAN FERNANDO', '07', 183, 'A'),
(1796, 'YORONGOS', '08', 183, 'A'),
(1797, 'YURACYACU', '09', 183, 'A'),
(1798, 'TARAPOTO', '01', 184, 'A'),
(1799, 'ALBERTO LEVEAU', '02', 184, 'A'),
(1800, 'CACATACHI', '03', 184, 'A'),
(1801, 'CHAZUTA', '04', 184, 'A'),
(1802, 'CHIPURANA', '05', 184, 'A'),
(1803, 'EL PORVENIR', '06', 184, 'A'),
(1804, 'HUIMBAYOC', '07', 184, 'A'),
(1805, 'JUAN GUERRA', '08', 184, 'A'),
(1806, 'LA BANDA DE SHILCAYO', '09', 184, 'A'),
(1807, 'MORALES', '10', 184, 'A'),
(1808, 'PAPAPLAYA', '11', 184, 'A'),
(1809, 'SAN ANTONIO', '12', 184, 'A'),
(1810, 'SAUCE', '13', 184, 'A'),
(1811, 'SHAPAJA', '14', 184, 'A'),
(1812, 'TOCACHE', '01', 185, 'A'),
(1813, 'NUEVO PROGRESO', '02', 185, 'A'),
(1814, 'POLVORA', '03', 185, 'A'),
(1815, 'SHUNTE', '04', 185, 'A'),
(1816, 'UCHIZA', '05', 185, 'A'),
(1817, 'TACNA', '01', 186, 'A'),
(1818, 'ALTO DE LA ALIANZA', '02', 186, 'A'),
(1819, 'CALANA', '03', 186, 'A'),
(1820, 'CIUDAD NUEVA', '04', 186, 'A'),
(1821, 'INCLAN', '05', 186, 'A'),
(1822, 'PACHIA', '06', 186, 'A'),
(1823, 'PALCA', '07', 186, 'A'),
(1824, 'POCOLLAY', '08', 186, 'A'),
(1825, 'SAMA', '09', 186, 'A'),
(1826, 'CORONEL GREGORIO ALBARRACÍN LANCHIPA', '10', 186, 'A'),
(1827, 'LA YARADA LOS PALOS', '11', 186, 'A'),
(1828, 'CANDARAVE', '01', 187, 'A'),
(1829, 'CAIRANI', '02', 187, 'A'),
(1830, 'CAMILACA', '03', 187, 'A'),
(1831, 'CURIBAYA', '04', 187, 'A'),
(1832, 'HUANUARA', '05', 187, 'A'),
(1833, 'QUILAHUANI', '06', 187, 'A'),
(1834, 'LOCUMBA', '01', 188, 'A'),
(1835, 'ILABAYA', '02', 188, 'A'),
(1836, 'ITE', '03', 188, 'A'),
(1837, 'TARATA', '01', 189, 'A'),
(1838, 'HÉROES ALBARRACÍN', '02', 189, 'A'),
(1839, 'ESTIQUE', '03', 189, 'A'),
(1840, 'ESTIQUE-PAMPA', '04', 189, 'A'),
(1841, 'SITAJARA', '05', 189, 'A'),
(1842, 'SUSAPAYA', '06', 189, 'A'),
(1843, 'TARUCACHI', '07', 189, 'A'),
(1844, 'TICACO', '08', 189, 'A'),
(1845, 'TUMBES', '01', 190, 'A'),
(1846, 'CORRALES', '02', 190, 'A'),
(1847, 'LA CRUZ', '03', 190, 'A'),
(1848, 'PAMPAS DE HOSPITAL', '04', 190, 'A'),
(1849, 'SAN JACINTO', '05', 190, 'A'),
(1850, 'SAN JUAN DE LA VIRGEN', '06', 190, 'A'),
(1851, 'ZORRITOS', '01', 191, 'A'),
(1852, 'CASITAS', '02', 191, 'A'),
(1853, 'CANOAS DE PUNTA SAL', '03', 191, 'A'),
(1854, 'ZARUMILLA', '01', 192, 'A'),
(1855, 'AGUAS VERDES', '02', 192, 'A'),
(1856, 'MATAPALO', '03', 192, 'A'),
(1857, 'PAPAYAL', '04', 192, 'A'),
(1858, 'CALLERIA', '01', 193, 'A'),
(1859, 'CAMPOVERDE', '02', 193, 'A'),
(1860, 'IPARIA', '03', 193, 'A'),
(1861, 'MASISEA', '04', 193, 'A'),
(1862, 'YARINACOCHA', '05', 193, 'A'),
(1863, 'NUEVA REQUENA', '06', 193, 'A'),
(1864, 'MANANTAY', '07', 193, 'A'),
(1865, 'RAYMONDI', '01', 194, 'A'),
(1866, 'SEPAHUA', '02', 194, 'A'),
(1867, 'TAHUANIA', '03', 194, 'A'),
(1868, 'YURUA', '04', 194, 'A'),
(1869, 'PADRE ABAD', '01', 195, 'A'),
(1870, 'IRAZOLA', '02', 195, 'A'),
(1871, 'CURIMANA', '03', 195, 'A'),
(1872, 'NESHUYA', '04', 195, 'A'),
(1873, 'ALEXANDER VON HUMBOLDT', '05', 195, 'A'),
(1874, 'PURUS', '01', 196, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `IdEmpleado` int(10) NOT NULL,
  `IdSede` int(10) NOT NULL,
  `FechaIngreso` date DEFAULT NULL,
  `Sueldo` decimal(10,2) DEFAULT NULL,
  `EstadoEmpleado` varchar(1) NOT NULL,
  `UsuarioRegistro` varchar(50) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `IdPersona` int(10) NOT NULL,
  `UsuarioEliminacion` varchar(60) DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`IdEmpleado`, `IdSede`, `FechaIngreso`, `Sueldo`, `EstadoEmpleado`, `UsuarioRegistro`, `FechaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `IdPersona`, `UsuarioEliminacion`, `FechaEliminacion`) VALUES
(1, 1, '2021-03-05', '1200.00', '1', 'Yovana', '2021-03-05 14:19:29', 'YVELASQUEZ', '2021-03-08 14:48:03', 22, 'YVELASQUEZ', '2021-03-08 14:47:32'),
(2, 1, '2021-03-08', '1300.00', '1', 'YVELASQUEZ', '2021-03-08 15:08:10', 'YVELASQUEZ', '2021-03-08 15:11:25', 23, NULL, NULL),
(3, 2, '2021-03-08', '1300.00', '1', 'YVELASQUEZ', '2021-03-08 15:19:29', 'YVELASQUEZ', '2021-03-08 15:31:02', 24, NULL, NULL),
(4, 1, '2021-03-08', '1100.00', '1', 'YVELASQUEZ', '2021-03-08 16:29:18', 'YVELASQUEZ', '2021-03-08 16:30:43', 25, 'YVELASQUEZ', '2021-03-08 16:30:40'),
(5, 4, '2021-03-01', '1200.00', '1', 'YVELASQUEZ', '2021-03-08 16:32:56', NULL, NULL, 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `IdEmpresa` int(10) NOT NULL,
  `CodigoEmpresa` varchar(11) NOT NULL,
  `RazonSocial` varchar(100) NOT NULL,
  `NombreComercial` varchar(100) DEFAULT NULL,
  `RepresentanteLegal` varchar(50) NOT NULL,
  `DomicilioFiscal` varchar(200) NOT NULL,
  `Logo` varchar(70) NOT NULL,
  `HostSMTP` varchar(70) NOT NULL,
  `UsuarioSMTP` varchar(70) NOT NULL,
  `PuertoSMTP` varchar(5) NOT NULL,
  `ClaveSMTP` varchar(20) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `UsuarioSOL` varchar(20) NOT NULL DEFAULT '0',
  `ClaveSOL` varchar(20) NOT NULL DEFAULT '0',
  `FechaInicioCertificadoDigitalPrincipal` date DEFAULT NULL,
  `FechaFinCertificadoDigitalPrincipal` date DEFAULT NULL,
  `UsuarioRegistro` varchar(60) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `UsuarioModificacion` varchar(60) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `EstadoEmpresa` varchar(1) NOT NULL,
  `ClaveCertificado` varchar(200) NOT NULL,
  `NombreCertificado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`IdEmpresa`, `CodigoEmpresa`, `RazonSocial`, `NombreComercial`, `RepresentanteLegal`, `DomicilioFiscal`, `Logo`, `HostSMTP`, `UsuarioSMTP`, `PuertoSMTP`, `ClaveSMTP`, `Email`, `UsuarioSOL`, `ClaveSOL`, `FechaInicioCertificadoDigitalPrincipal`, `FechaFinCertificadoDigitalPrincipal`, `UsuarioRegistro`, `FechaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `EstadoEmpresa`, `ClaveCertificado`, `NombreCertificado`) VALUES
(1, '10479933257', 'INSUMOS ODONTOLOGICOS CRISOL S.A.C', 'INSUMOS ODONTOLOGICOS CRISOL', 'MARTHA LAURA FLORES JIMENEZ', 'AV. LOS GERANEOS #580', 'logo1.png', 'smtp.gmail.com', 'yovana.ulc@gmail.com', '465', 'posgrado120', 'yovana.ulc@gmail.com', 'Megan34', 'Megan123', '2021-03-05', '2021-03-05', 'Yovana', '2021-03-03 23:17:07', 'yovana', '2021-03-04 10:12:30', 'A', 'clavebla', 'Certificadobla'),
(2, '20482703284', 'CLINICA DENTAL CENTER S.A.C.', '-', 'MARTHA LAURA FLORES JIMENEZ', 'JR. PIZARRO NRO. 930 CERCADO', 'sinlogo.jpg', 'smtp.gmail.com', 'yovana.ulc@gmail.com', '465', 'posgrado120', 'yovana.ulc@gmail.com', 'MEGAN002', 'MEGAN002', '2021-03-04', '2021-03-04', 'yovana', '2021-03-04 08:53:07', 'yovana', '2021-03-04 09:38:44', 'A', '', ''),
(3, '20310384306', 'INVERSIONES Y NEGOCIOS RIVERA E.I.R.L.', 'INVERSIONES Y NEGOCIOS RIVERA', 'JORGE RIVERA CHOQUE', 'JR. AUGUSTO B LEGUIA NRO. 669 (POR LA UNION)', 'sinlogo.jpg', 'smtp.gmail.com', 'yovana.ulc@gmail.com', '465', 'posgrado12', 'yovana.ulc@gmail.com', 'Megan130', 'Megan120', '2021-03-05', '2021-03-05', 'YVELASQUEZ', '2021-03-05 11:39:28', 'YVELASQUEZ', '2021-03-05 11:39:49', 'A', 'megan2021', '45e3438d8ec15504867');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocivil`
--

CREATE TABLE `estadocivil` (
  `IdEstadoCivil` int(11) NOT NULL,
  `NombreEstadoCivil` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estadocivil`
--

INSERT INTO `estadocivil` (`IdEstadoCivil`, `NombreEstadoCivil`) VALUES
(1, 'Soltero(a)'),
(2, 'Casado(a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante`
--

CREATE TABLE `fabricante` (
  `IdFabricante` int(10) NOT NULL,
  `NombreFabricante` varchar(100) NOT NULL,
  `EstadoFabricante` varchar(1) NOT NULL COMMENT '1 : Activo , 0 : Eliminado',
  `EstadoNoEspecificado` varchar(1) NOT NULL COMMENT '1 : Indica que es No Especificado , 0 : Indica que no es No Especificado',
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `MaquinaRegistro` varchar(50) NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `MaquinaModificacion` varchar(50) NOT NULL,
  `UsuarioEliminacion` varchar(50) DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `MaquinaEliminacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fabricante`
--

INSERT INTO `fabricante` (`IdFabricante`, `NombreFabricante`, `EstadoFabricante`, `EstadoNoEspecificado`, `UsuarioRegistro`, `FechaRegistro`, `MaquinaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `MaquinaModificacion`, `UsuarioEliminacion`, `FechaEliminacion`, `MaquinaEliminacion`) VALUES
(1, 'NO ESPECIFICADO', '1', '1', 'MEGAN', '2021-01-07 08:48:53', '', NULL, NULL, '', NULL, NULL, ''),
(2, 'HYGENIC', '1', '0', 'Yovana', '2020-12-01 12:52:45', 'LAPTOP-MKOKFC3V', NULL, NULL, '', NULL, NULL, ''),
(3, 'Henry Schein', '1', '0', 'yovana', '2020-12-01 12:52:45', 'PC-LENOVO', NULL, NULL, '', NULL, NULL, ''),
(4, 'Inibsa', '1', '0', 'yoavana', '2020-12-01 12:52:45', 'PC-LENNOVO', NULL, NULL, '', NULL, NULL, ''),
(5, 'Master Surgical', '1', '0', 'yovana', '2020-12-01 12:52:45', 'PC-MAC', NULL, NULL, '', NULL, NULL, ''),
(6, 'Oral-B', '1', '0', 'Yovana', '2020-12-01 12:52:45', 'PC-LENOVO', NULL, NULL, '', NULL, NULL, ''),
(7, 'Project', '1', '0', 'YVELASQUEZ', '2021-01-26 10:19:59', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(8, 'Varios', '1', '0', 'YVELASQUEZ', '2021-01-26 10:55:04', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(9, 'KerrWave', '1', '0', 'YVELASQUEZ', '2021-01-26 11:50:28', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(10, 'Prueba', '1', '0', 'YVELASQUEZ', '2021-02-03 10:06:37', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(11, 'CAVIT™', '1', '0', 'HP', '2021-03-19 05:19:21', 'LAPTOP-4LG4GP91', NULL, NULL, '', NULL, NULL, ''),
(12, 'NORICUM', '1', '0', 'HP', '2021-03-19 09:49:07', 'LAPTOP-4LG4GP91', NULL, NULL, '', NULL, NULL, ''),
(13, 'CLARBEN', '1', '0', 'YVELASQUEZ', '2021-03-25 14:34:06', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(14, 'SEPTODONT', '1', '0', 'YVELASQUEZ', '2021-03-25 14:34:07', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(15, 'FRASACO', '1', '0', 'YVELASQUEZ', '2021-03-25 14:34:07', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiaproducto`
--

CREATE TABLE `familiaproducto` (
  `IdFamiliaProducto` int(10) NOT NULL,
  `NombreFamiliaProducto` varchar(250) NOT NULL,
  `EstadoFamiliaProducto` varchar(1) NOT NULL COMMENT '1 : Activo , 0 : Eliminado',
  `EstadoNoEspecificado` varchar(1) NOT NULL COMMENT '1 : Indica que es No Especificado , 0 : Indica que no es No Especificado',
  `InicialesFamiliaNombreProducto` char(20) NOT NULL DEFAULT '',
  `InicialesFamiliaCodigoNombreProducto` char(20) NOT NULL DEFAULT '',
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `MaquinaRegistro` varchar(50) NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `MaquinaModificacion` varchar(50) NOT NULL,
  `UsuarioEliminacion` varchar(50) DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `MaquinaEliminacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `familiaproducto`
--

INSERT INTO `familiaproducto` (`IdFamiliaProducto`, `NombreFamiliaProducto`, `EstadoFamiliaProducto`, `EstadoNoEspecificado`, `InicialesFamiliaNombreProducto`, `InicialesFamiliaCodigoNombreProducto`, `UsuarioRegistro`, `FechaRegistro`, `MaquinaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `MaquinaModificacion`, `UsuarioEliminacion`, `FechaEliminacion`, `MaquinaEliminacion`) VALUES
(0, 'NO ESPECIFICADO', '1', '1', '', '', 'MEGAN', '2021-01-07 08:49:04', '', NULL, NULL, '', NULL, NULL, ''),
(1, 'INSTRUMENTAL ENDODONCIA', '1', '0', 'ENDODONCIA', 'END', 'Yovana', '2020-12-01 12:52:45', 'LAPTOP-MKOKFC3V', NULL, NULL, '', NULL, NULL, ''),
(2, 'CIRUGIA DENTAL', '1', '0', 'CIRG', 'CIRG', 'yovana', '2020-12-01 12:52:45', 'PC-LENOVO', NULL, NULL, '', NULL, NULL, ''),
(3, 'CEMENTOS DENTALES', '1', '0', 'CEM-DENT', 'CEM-DENT', 'yoavana', '2020-12-01 12:52:45', 'PC-LENNOVO', NULL, NULL, '', NULL, NULL, ''),
(4, 'CORONAS', '1', '0', 'CORN', 'CORN', 'yovana', '2020-12-01 12:52:45', 'PC-MAC', NULL, NULL, '', NULL, NULL, ''),
(5, 'IMPLANTES DENTALES', '1', '0', 'IMPL', 'IMPL', 'yovana', '2021-01-13 21:54:04', 'PC-MAC', NULL, NULL, '', NULL, NULL, ''),
(6, 'MATERIAL ODONTOLOGICO DESECHABLE', '1', '0', 'DESECHABLE', 'DESECHABLE', 'yovana', '2021-01-13 21:55:20', 'PC-LENNOVO', NULL, NULL, '', NULL, NULL, ''),
(9, 'Composites dentales', '1', '0', 'Composites dentales', 'COMP', 'YVELASQUEZ', '2021-01-26 10:36:59', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(10, 'Profilaxis', '1', '0', 'Profilaxis', 'PROF', 'YVELASQUEZ', '2021-01-26 11:33:53', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(11, 'Implantes Prueba', '1', '0', 'Implantes Prueba', 'IMPP', 'YVELASQUEZ', '2021-01-27 13:16:58', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(12, 'Instrumental Rotatorio', '1', '0', 'Instrumental Rotator', 'INST-R', 'YVELASQUEZ', '2021-01-30 13:52:39', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(13, 'Kit Instrumental', '1', '0', 'Kit Instrumental', 'KIT-INST', 'Yovana', '2020-12-01 12:52:45', 'PC-LENOVO', NULL, NULL, '', NULL, NULL, ''),
(14, 'PRUEBA', '1', '0', 'PRUEBA', 'PRBA', 'HP', '2021-03-18 16:35:17', 'LAPTOP-4LG4GP91', NULL, NULL, '', NULL, NULL, ''),
(15, ' IMPLANTES DENTALES', '1', '0', ' IMPLANTES DENTALES', ' IMP', 'HP', '2021-03-19 09:48:49', 'LAPTOP-4LG4GP91', NULL, NULL, '', NULL, NULL, ''),
(16, 'AGUJAS Y JERINGAS', '1', '0', 'AGUJAS Y JERINGAS', 'AGUJ', 'YVELASQUEZ', '2021-03-25 14:34:06', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `IdGenero` int(11) NOT NULL,
  `NombreGenero` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`IdGenero`, `NombreGenero`) VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gironegocio`
--

CREATE TABLE `gironegocio` (
  `IdGiroNegocio` int(10) NOT NULL,
  `NombreGiroNegocio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IndicadorEstado` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `UsuarioRegistro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioModificacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gironegocio`
--

INSERT INTO `gironegocio` (`IdGiroNegocio`, `NombreGiroNegocio`, `IndicadorEstado`, `UsuarioRegistro`, `FechaRegistro`, `UsuarioModificacion`, `FechaModificacion`) VALUES
(1, 'Giro Comercial', '1', 'Yovana', '2020-12-01 12:52:45', 'yovana', '2020-12-17 08:45:12'),
(2, 'Giro Industrial', '1', 'Yovana', '2020-12-01 13:15:37', 'yovana', '2020-12-05 06:14:33'),
(3, 'Giro Empresarial', '1', 'Yovana', '2020-12-01 13:17:27', 'yovana', '2020-12-05 06:17:42'),
(4, 'prueba 1', '1', 'yovana', '2020-12-03 10:33:34', 'yovana', '2020-12-05 05:50:42'),
(5, 'Prueba2', '1', 'yovana', '2020-12-04 08:49:55', 'yovana', '2020-12-05 09:48:12'),
(6, 'prueba 5', '0', 'yovana', '2020-12-04 09:33:40', 'yovana', '2020-12-05 06:19:02'),
(7, 'prueba7', '0', 'yovana', '2020-12-05 05:58:15', 'yovana', '2020-12-10 21:28:22'),
(8, 'Giro Prueba', '1', 'yovana', '2020-12-17 08:45:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupoparametro`
--

CREATE TABLE `grupoparametro` (
  `IdGrupoParametro` int(10) NOT NULL,
  `NombreGrupoParametro` varchar(250) NOT NULL,
  `IndicadorEstado` varchar(1) NOT NULL,
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupoparametro`
--

INSERT INTO `grupoparametro` (`IdGrupoParametro`, `NombreGrupoParametro`, `IndicadorEstado`, `UsuarioRegistro`, `FechaRegistro`, `UsuarioModificacion`, `FechaModificacion`) VALUES
(1, 'ATRIBUTOS', 'A', '', '2018-03-02 10:58:18', '', '2019-02-26 17:27:45'),
(2, 'Cantidad de filas', 'A', '', '2018-03-02 18:58:48', NULL, '2018-03-02 19:04:07'),
(3, 'Atributos de Mercaderia', 'A', '', '2018-03-02 10:58:18', NULL, '2018-07-30 18:40:14'),
(4, 'Busqueda En Google ', 'A', '', '2018-03-02 10:58:18', NULL, NULL),
(5, 'Atributos de Comprobante de Venta', 'A', '', '2018-03-02 10:58:18', NULL, '2018-08-02 20:06:19'),
(6, 'Id Empresa', 'A', '', '2018-03-02 10:58:18', NULL, '2018-08-02 20:06:25'),
(7, 'Carpeta SUNAT', 'A', '', '2018-06-16 09:38:05', NULL, '2018-06-16 09:38:06'),
(8, 'sdasdasdasdasdasd', 'E', '', '2018-07-20 16:49:53', NULL, '2018-07-20 16:49:58'),
(9, 'nuevo 2', 'E', '', '2018-08-02 20:06:50', NULL, '2018-08-02 20:15:11'),
(10, 'nuevo 2', 'A', '', '2018-08-02 20:16:40', NULL, NULL),
(11, 'Codigo Automatico ', 'A', '', '2018-08-07 15:21:38', NULL, '2018-08-07 15:21:39'),
(12, 'ConfiguraciÃ³n de ventas', 'A', '', '0000-00-00 00:00:00', NULL, NULL),
(13, 'Mostar Mensaje Demo', 'A', '', '2018-11-16 11:43:48', NULL, '2018-11-16 11:43:48'),
(14, 'Atributos de Cliente', 'A', '', '2018-03-02 10:58:18', NULL, '2018-07-30 18:40:14'),
(15, 'ConfiguraciÃ³n de Compras', 'A', 'SISEM', '2020-05-27 18:46:12', 'FTUYO', '2020-12-19 12:19:34'),
(16, 'ATRIBUTOS4', 'A', 'FTUYO', '2020-12-19 11:34:29', 'FTUYO', '2020-12-19 12:35:36'),
(17, 'ÑÓS', 'A', 'FTUYO', '2020-12-19 12:44:30', 'FTUYO', '2020-12-23 10:54:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `IdInventario` int(10) NOT NULL,
  `IdProducto` int(10) NOT NULL,
  `IdUnidadMedida` int(10) NOT NULL,
  `Stock` decimal(10,2) DEFAULT NULL,
  `CantidadConteo` decimal(10,2) DEFAULT NULL,
  `Diferencia` decimal(10,2) DEFAULT NULL,
  `CostoUnitario` decimal(15,2) DEFAULT NULL,
  `CostoTotal` decimal(15,2) DEFAULT NULL,
  `Observacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `EstadoInventario` varchar(1) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `UsuarioRegistro` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `UsuarioModificacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `IdResumenInventario` int(10) NOT NULL,
  `EquivalenciaUnidad` float(10,2) DEFAULT NULL,
  `UsuarioEliminacion` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `CondicionInventario` varchar(20) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'I.Inicial = InventarioInicial\r\nI. Ajuste = InventarioAjustado\r\nEliminado = InventarioEliminado\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`IdInventario`, `IdProducto`, `IdUnidadMedida`, `Stock`, `CantidadConteo`, `Diferencia`, `CostoUnitario`, `CostoTotal`, `Observacion`, `EstadoInventario`, `UsuarioRegistro`, `UsuarioModificacion`, `FechaRegistro`, `FechaModificacion`, `IdResumenInventario`, `EquivalenciaUnidad`, `UsuarioEliminacion`, `FechaEliminacion`, `CondicionInventario`) VALUES
(1, 8, 58, '70.00', '70.00', '0.00', '23.00', '1610.00', NULL, '1', 'YVELASQUEZ', NULL, '2021-03-25 14:34:07', NULL, 1, 1.00, NULL, NULL, 'Inv.Inicial'),
(2, 9, 6, '30.00', '30.00', '0.00', '18.00', '540.00', NULL, '1', 'YVELASQUEZ', NULL, '2021-03-25 14:34:07', NULL, 1, 100.00, NULL, NULL, 'Inv.Inicial'),
(3, 10, 6, '20.00', '20.00', '0.00', '10.00', '200.00', NULL, '1', 'YVELASQUEZ', NULL, '2021-03-25 14:34:07', NULL, 1, 5.00, NULL, NULL, 'Inv.Inicial'),
(4, 1, 58, '40.00', '40.00', '0.00', '12.00', '480.00', NULL, '1', 'YVELASQUEZ', NULL, '2021-03-25 14:34:07', NULL, 1, 1.00, NULL, NULL, 'Inv.Inicial'),
(5, 2, 58, '30.00', '30.00', '0.00', '25.00', '750.00', NULL, '1', 'YVELASQUEZ', NULL, '2021-03-25 14:34:07', NULL, 1, 1.00, NULL, NULL, 'Inv.Inicial'),
(6, 3, 58, '20.00', '20.00', '0.00', '12.00', '240.00', NULL, '1', 'YVELASQUEZ', NULL, '2021-03-25 14:34:07', NULL, 1, 1.00, NULL, NULL, 'Inv.Inicial'),
(7, 2, 6, '20.00', '20.00', '0.00', '50.00', '1000.00', NULL, '1', 'YVELASQUEZ', NULL, '2021-03-25 14:34:08', NULL, 1, 10.00, NULL, NULL, 'Inv.Inicial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kitproducto`
--

CREATE TABLE `kitproducto` (
  `IdKitProducto` int(11) NOT NULL,
  `NombreKitProducto` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `IdFamiliaProducto` int(10) NOT NULL,
  `IdUnidadMedida` int(10) NOT NULL,
  `CodigoKit` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `PrecioVentaKit` float(8,2) NOT NULL,
  `IdTipoPrecio` int(10) NOT NULL,
  `NombreComercialKit` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `UsuarioRegistro` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `MaquinaRegistro` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `UsuarioModificacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `MaquinaModificacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `UsuarioEliminacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `MaquinaEliminacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `IndicadorEstado` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `Foto` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `IdMarca` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `kitproducto`
--

INSERT INTO `kitproducto` (`IdKitProducto`, `NombreKitProducto`, `IdFamiliaProducto`, `IdUnidadMedida`, `CodigoKit`, `PrecioVentaKit`, `IdTipoPrecio`, `NombreComercialKit`, `UsuarioRegistro`, `FechaRegistro`, `MaquinaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `MaquinaModificacion`, `UsuarioEliminacion`, `FechaEliminacion`, `MaquinaEliminacion`, `IndicadorEstado`, `Foto`, `IdMarca`) VALUES
(1, 'Kit instrumental de sutura', 13, 4, 'KIT-INST0001', 60.00, 1, 'Kit de instrumental de sutura', 'Yovana', '2020-12-01 12:52:45', 'PC-LENOVO', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'kit-sutura.jpg', 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaproducto`
--

CREATE TABLE `lineaproducto` (
  `IdLineaProducto` int(10) NOT NULL,
  `NombreLineaProducto` varchar(250) NOT NULL,
  `EstadoLineaProducto` varchar(1) NOT NULL COMMENT '1 : Activo , 0 : Eliminado',
  `EstadoNoEspecificado` varchar(1) NOT NULL COMMENT '1 : Indica que es No Especificado , 0 : Indica que no es No Especificado',
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `MaquinaRegistro` varchar(50) NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `MaquinaModificacion` varchar(50) NOT NULL,
  `UsuarioEliminacion` varchar(50) DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `MaquinaEliminacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lineaproducto`
--

INSERT INTO `lineaproducto` (`IdLineaProducto`, `NombreLineaProducto`, `EstadoLineaProducto`, `EstadoNoEspecificado`, `UsuarioRegistro`, `FechaRegistro`, `MaquinaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `MaquinaModificacion`, `UsuarioEliminacion`, `FechaEliminacion`, `MaquinaEliminacion`) VALUES
(0, 'NO ESPECIFICADO', '1', '1', 'MEGAN', '2021-01-07 09:08:37', '', NULL, NULL, '', NULL, NULL, ''),
(3, 'Instrumentos Dentales', '1', '0', 'Yovana', '2020-12-01 12:52:45', 'LAPTOP-MKOKFC3V', NULL, NULL, '', NULL, NULL, ''),
(4, 'Artículos Dentales', '1', '0', 'yovana', '2020-12-01 12:52:45', '', NULL, NULL, '', NULL, NULL, ''),
(5, 'Materiales', '1', '0', 'yoavana', '2020-12-01 12:52:45', 'PC-LENNOVO', NULL, NULL, '', NULL, NULL, ''),
(6, 'Equipamiento', '1', '0', 'yovana', '2020-12-01 12:52:45', 'PC-MAC', NULL, NULL, '', NULL, NULL, ''),
(7, 'Mobiliario Clinico', '1', '0', 'YVELASQUEZ', '2021-01-26 11:09:37', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(8, 'Instrumento para Superficie', '1', '0', 'YVELASQUEZ', '2021-01-26 11:49:32', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(10, 'RESTAURACIÓN DENTAL', '1', '0', 'HP', '2021-03-19 05:30:44', 'LAPTOP-4LG4GP91', NULL, NULL, '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `IdMarca` int(10) NOT NULL,
  `NombreMarca` varchar(250) NOT NULL,
  `EstadoMarca` varchar(1) NOT NULL COMMENT '1 : Activo , 0 : Eliminado',
  `EstadoNoEspecificado` varchar(1) NOT NULL COMMENT '1 : Indica que es No Especificado , 0 : Indica que no es No Especificado',
  `InicialesMarcaNombreProducto` char(20) NOT NULL DEFAULT '',
  `InicialesMarcaCodigoProducto` char(20) NOT NULL DEFAULT '',
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `MaquinaRegistro` varchar(50) NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `MaquinaModificacion` varchar(50) NOT NULL,
  `UsuarioEliminacion` varchar(50) DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `MaquinaEliminacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`IdMarca`, `NombreMarca`, `EstadoMarca`, `EstadoNoEspecificado`, `InicialesMarcaNombreProducto`, `InicialesMarcaCodigoProducto`, `UsuarioRegistro`, `FechaRegistro`, `MaquinaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `MaquinaModificacion`, `UsuarioEliminacion`, `FechaEliminacion`, `MaquinaEliminacion`) VALUES
(0, 'NO ESPECIFICADO', '1', '1', '', '', 'MEGAN', '2021-01-07 09:11:06', '', NULL, NULL, '', NULL, NULL, ''),
(1, 'Coltene', '1', '0', 'COH', 'COH', 'Yovana', '2020-12-01 12:52:45', 'PC-LENOVO', 'yovana', '2021-01-11 14:53:52', 'LAPTOP-MKOKFC3V', NULL, NULL, ''),
(2, 'Filtek ', '1', '0', 'Filtek', 'FIL', 'yovana', '2020-12-01 12:52:45', 'PC-LENOVO', 'yovana', '2021-01-11 15:30:17', 'LAPTOP-MKOKFC3V', 'yovana', '2021-01-11 15:29:08', 'LAPTOP-MKOKFC3V'),
(24, 'Cavitine', '1', '0', 'Cavitine', 'CAVI', 'YVELASQUEZ', '2021-01-19 13:59:10', 'DESKTOP-78LP8J4', 'YVELASQUEZ', '2021-01-19 15:18:35', 'DESKTOP-78LP8J4', NULL, NULL, ''),
(25, 'INIBSA', '1', '0', 'INIBSA', 'INIB', 'YVELASQUEZ', '2021-01-19 13:59:45', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(26, 'DENTSPLY', '1', '0', 'DENTSPLY', 'DENT', 'YVELASQUEZ', '2021-01-19 14:33:44', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(27, 'GNZ Dental ', '1', '0', 'GNZ Dental', 'GNZ', 'YVELASQUEZ', '2021-01-19 14:39:32', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(28, 'PROTEMP', '1', '0', 'PROTEMP', 'PROT', 'YVELASQUEZ', '2021-01-19 14:59:25', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(29, 'PRUEBA5', '1', '0', 'PRUEBA5', 'PRUE', 'YVELASQUEZ', '2021-01-23 14:40:39', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(30, 'DEGUDENT', '1', '0', 'DEGUDENT', 'DEGU', 'YVELASQUEZ', '2021-01-26 10:52:23', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(31, 'Hawe-neos', '1', '0', 'Hawe-neos', 'HAWE', 'YVELASQUEZ', '2021-01-26 11:47:04', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(32, ' ACKERMAN', '1', '0', 'ACKER', 'ACKE', 'YVELASQUEZ', '2021-01-27 14:06:24', 'DESKTOP-78LP8J4', 'YVELASQUEZ', '2021-01-27 14:07:26', 'DESKTOP-78LP8J4', NULL, NULL, ''),
(33, 'Bader', '1', '0', 'Bader', 'BADE', 'YVELASQUEZ', '2021-01-30 13:53:08', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(34, 'Marca Prueba', '1', '0', 'Marca Prueba', 'MARC', 'YVELASQUEZ', '2021-02-03 10:07:47', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(36, 'CAVIT™', '1', '0', 'CAVIT™', 'CEME', 'HP', '2021-03-19 05:19:21', 'LAPTOP-4LG4GP91', NULL, NULL, '', NULL, NULL, ''),
(37, 'NORICUM IMPLANTS', '1', '0', 'NORICUM IMPLANTS', ' IMP', 'HP', '2021-03-19 09:49:07', 'LAPTOP-4LG4GP91', NULL, NULL, '', NULL, NULL, ''),
(38, 'CLARBEN', '1', '0', 'CLARBEN', 'AGUJ', 'YVELASQUEZ', '2021-03-25 14:34:06', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(39, 'SEPTODONT', '1', '0', 'SEPTODONT', 'AGUJ', 'YVELASQUEZ', '2021-03-25 14:34:07', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(40, 'FRASACO', '1', '0', 'FRASACO', 'CORO', 'YVELASQUEZ', '2021-03-25 14:34:07', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelomarca`
--

CREATE TABLE `modelomarca` (
  `IdModeloMarca` int(10) NOT NULL,
  `IdMarca` int(11) NOT NULL,
  `EstadoModeloMarca` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `EstadoNoEspecificado` int(11) NOT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioRegistro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `UsuarioModificacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `UsuarioEliminacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `MaquinaRegistro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `MaquinaEliminacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `MaquinaModificacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NombreModeloMarca` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modelomarca`
--

INSERT INTO `modelomarca` (`IdModeloMarca`, `IdMarca`, `EstadoModeloMarca`, `EstadoNoEspecificado`, `FechaModificacion`, `FechaEliminacion`, `FechaRegistro`, `UsuarioRegistro`, `UsuarioModificacion`, `UsuarioEliminacion`, `MaquinaRegistro`, `MaquinaEliminacion`, `MaquinaModificacion`, `NombreModeloMarca`) VALUES
(1, 1, '1', 0, '2021-01-12 10:54:38', '2021-01-12 10:54:34', '2020-12-01 12:52:45', 'Yovana', 'YVELASQUEZ', 'YVELASQUEZ', 'PC-LENOVO', 'DESKTOP-78LP8J4', 'DESKTOP-78LP8J4', 'UNIVERSAL'),
(2, 2, '1', 0, NULL, NULL, '2020-12-01 12:52:45', 'yovana', NULL, NULL, 'PC-LENOVO', NULL, NULL, 'EXPRESS'),
(3, 1, '1', 1, NULL, NULL, '2020-12-01 12:52:45', '', NULL, NULL, 'PC-LENOVO', NULL, NULL, 'NO ESPECIFICADO'),
(4, 2, '1', 1, NULL, NULL, '2020-12-01 12:52:45', '', NULL, NULL, 'PC-LENOVO', NULL, NULL, 'NO ESPECIFICADO'),
(5, 0, '1', 1, NULL, NULL, '2020-12-01 12:52:45', 'Yovana', NULL, NULL, 'PC-LENNOVO', NULL, NULL, 'NO ESPECIFICADO'),
(8, 24, '1', 1, NULL, NULL, '2021-01-19 13:59:10', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(9, 25, '1', 1, NULL, NULL, '2021-01-19 13:59:45', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(10, 26, '1', 1, NULL, NULL, '2021-01-19 14:33:44', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(11, 27, '1', 1, NULL, NULL, '2021-01-19 14:39:32', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(12, 26, '1', 0, '2021-01-19 14:44:27', NULL, '2021-01-19 14:41:17', 'YVELASQUEZ', 'YVELASQUEZ', NULL, 'DESKTOP-78LP8J4', NULL, 'DESKTOP-78LP8J4', 'B-Cure'),
(13, 1, '1', 0, NULL, NULL, '2021-01-19 14:42:09', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'Canal Pro'),
(14, 27, '1', 0, NULL, NULL, '2021-01-19 14:42:42', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'Octocolagen'),
(15, 1, '1', 0, NULL, NULL, '2021-01-19 14:44:46', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'Plus'),
(16, 25, '1', 0, NULL, NULL, '2021-01-19 14:45:06', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'Lux'),
(17, 2, '1', 0, NULL, NULL, '2021-01-19 14:45:24', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'B-Cure'),
(18, 28, '1', 1, NULL, NULL, '2021-01-19 14:59:25', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(19, 24, '1', 0, NULL, NULL, '2021-01-19 15:19:39', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'Cemento de Obturación'),
(20, 29, '1', 1, NULL, NULL, '2021-01-23 14:40:39', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(21, 30, '1', 1, NULL, NULL, '2021-01-26 10:52:23', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(22, 30, '1', 0, NULL, NULL, '2021-01-26 10:53:15', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'DUCERAM'),
(23, 31, '1', 1, NULL, NULL, '2021-01-26 11:47:04', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(24, 31, '1', 0, NULL, NULL, '2021-01-26 11:47:45', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'Pro-Cup'),
(25, 32, '1', 1, NULL, NULL, '2021-01-27 14:06:24', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(26, 33, '1', 1, NULL, NULL, '2021-01-30 13:53:08', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(27, 33, '1', 0, NULL, NULL, '2021-01-30 13:53:25', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, '360'),
(28, 26, '1', 0, NULL, NULL, '2021-02-03 10:06:00', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'Canal Pro'),
(29, 34, '1', 1, NULL, NULL, '2021-02-03 10:07:47', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(30, 36, '1', 1, NULL, NULL, '2021-03-19 05:19:21', 'HP', NULL, NULL, 'LAPTOP-4LG4GP91', NULL, NULL, 'NO ESPECIFICADO'),
(31, 36, '1', 0, NULL, NULL, '2021-03-19 05:19:21', 'HP', NULL, NULL, 'LAPTOP-4LG4GP91', NULL, NULL, 'CAVIT W'),
(32, 37, '1', 1, NULL, NULL, '2021-03-19 09:49:07', 'HP', NULL, NULL, 'LAPTOP-4LG4GP91', NULL, NULL, 'NO ESPECIFICADO'),
(33, 37, '1', 0, NULL, NULL, '2021-03-19 09:49:07', 'HP', NULL, NULL, 'LAPTOP-4LG4GP91', NULL, NULL, 'CONEXION EXTERNA '),
(34, 38, '1', 1, NULL, NULL, '2021-03-25 14:34:06', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(35, 39, '1', 1, NULL, NULL, '2021-03-25 14:34:07', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO'),
(36, 40, '1', 1, NULL, NULL, '2021-03-25 14:34:07', 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 'NO ESPECIFICADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulosistema`
--

CREATE TABLE `modulosistema` (
  `IdModuloSistema` int(10) NOT NULL,
  `NombreModuloSistema` varchar(50) NOT NULL,
  `IndicadorDocumento` varchar(1) DEFAULT NULL,
  `IndicadorEstado` varchar(1) NOT NULL,
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `IdModulo` varchar(50) NOT NULL DEFAULT '',
  `UrlModulo` varchar(50) NOT NULL DEFAULT '',
  `ItemModulo` varchar(250) NOT NULL DEFAULT '',
  `NameModulo` varchar(250) NOT NULL DEFAULT '',
  `AtajoModulo` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulosistema`
--

INSERT INTO `modulosistema` (`IdModuloSistema`, `NombreModuloSistema`, `IndicadorDocumento`, `IndicadorEstado`, `UsuarioRegistro`, `FechaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `IdModulo`, `UrlModulo`, `ItemModulo`, `NameModulo`, `AtajoModulo`) VALUES
(1, 'CATALOGO', '0', 'A', '', '0000-00-00 00:00:00', NULL, NULL, 'catalogos_ul', '', 'CatÃ¡<b class=\'accesos_menu\'><u>l</u></b>ogos', 'catalogos', '76'),
(2, 'VENTA', '1', 'A', '', '0000-00-00 00:00:00', NULL, NULL, 'ventas_ul', '', '<b class=\'accesos_menu\'><u>V</u></b>entas', 'ventas', '86'),
(3, 'COMPROBANTE ELECTRONICO', '0', 'A', '', '0000-00-00 00:00:00', NULL, NULL, 'comprobantes_ul', '', 'Compro<b class=\'accesos_menu\'><u>b</u></b>. ElectrÃ³nicos', 'comprobantes', '66'),
(4, 'INVENTARIO', '1', 'A', '', '0000-00-00 00:00:00', NULL, NULL, 'inventarios_ul', '', '<b class=\'accesos_menu\'><u>I</u></b>nventarios', 'inventarios', '73'),
(5, 'COMPRA', '1', 'I', '', '0000-00-00 00:00:00', 'FTUYO', '2020-12-19 12:11:22', 'compras_ul', '', 'Compr<b class=\'accesos_menu\'><u>a</u></b>s', 'compras', '65'),
(6, 'CONFIGURACION', '0', 'A', '', '0000-00-00 00:00:00', NULL, NULL, 'configuracion_ul', '', 'Config<b class=\'accesos_menu\'><u>u</u></b>raciÃ³n', 'configuracion', '85'),
(7, 'SEGURIDAD', '0', 'A', '', '0000-00-00 00:00:00', NULL, NULL, 'seguridad_ul', '', 'Segu<b class=\'accesos_menu\'><u>r</u></b>idad', 'seguridad', '82'),
(8, 'CAJA', '0', 'A', '', '2019-01-23 10:07:55', NULL, '2019-01-23 10:07:56', 'caja_ul', '', 'Caja', 'caja', '0'),
(9, 'CUENTAS POR COBRAR', '0', 'A', '', '2019-07-31 11:35:46', NULL, NULL, 'cuentas_por_cobrar_ul', '', 'Cuentas Por Cobrar', 'cuentasporcobrar', '0'),
(10, 'CUENTAS POR PAGAR', '0', 'A', '', '2019-07-31 11:40:49', NULL, NULL, 'cuentas_por_pagar_ul', '', 'Cuentas Por Pagar', 'cuentasporpagar', '0'),
(11, 'AYUDA', '0', 'A', 'SISEM', '2020-08-23 18:03:34', NULL, NULL, 'ayuda_ul', '', 'Ayu<b class=\'accesos_menu\'><u>d</u></b>a', 'ayuda', '68'),
(12, 'MODIFICA', '1', 'I', 'FTUYO', '2020-12-17 13:08:46', 'FTUYO', '2020-12-18 11:26:12', '1', 'cotizacion', '.', 'cotizacion', 'AD'),
(13, 'aas', '1', 'I', 'FTUYO', '2020-12-18 10:01:31', 'FTUYO', '2020-12-28 09:18:49', 's', 'd', 's', 'a', 's'),
(14, 'ass', '1', 'I', 'FTUYO', '2020-12-23 10:22:55', 'FTUYO', '2020-12-28 09:19:05', 'catalogos_ul', 'cotizacions', 'catalogo', 'catalogo', '223');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE `moneda` (
  `IdMoneda` int(10) NOT NULL,
  `CodigoMoneda` varchar(3) NOT NULL DEFAULT '0',
  `NombreMoneda` varchar(50) NOT NULL,
  `SimboloMoneda` varchar(10) NOT NULL,
  `IndicadorEstado` varchar(1) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`IdMoneda`, `CodigoMoneda`, `NombreMoneda`, `SimboloMoneda`, `IndicadorEstado`, `FechaRegistro`, `UsuarioRegistro`, `FechaModificacion`, `UsuarioModificacion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PEN', 'SOL', 'S/.', '1', '2020-12-04 09:57:06', 'FTUYO', NULL, NULL, NULL, NULL, '2020-12-05 08:48:22'),
(2, 'EUR', 'EURO', '€', '1', '2020-12-04 09:57:55', 'FTUYO', NULL, NULL, NULL, NULL, '2020-12-05 08:47:42'),
(3, 'USD', 'DOLAR', '$', '1', '2020-12-04 11:52:30', 'FTUYO', '2020-12-14 10:44:24', 'FTUYO', NULL, NULL, NULL),
(4, 'CLP', 'PESO CHILENO', '$', '1', '2020-12-05 11:37:26', 'FTUYO', '2020-12-11 09:36:47', 'FTUYO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `IdPais` int(2) NOT NULL,
  `NombrePais` varchar(21) DEFAULT NULL,
  `NombreCapital` varchar(19) DEFAULT NULL,
  `Nacionalidad` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`IdPais`, `NombrePais`, `NombreCapital`, `Nacionalidad`) VALUES
(1, 'Afganistán', 'Kabul', 'afgano/a'),
(2, 'Albania', 'Tirana', 'albanés'),
(3, 'Alemania', 'Berlín', 'alemán/a'),
(4, 'Andorra', 'Andorra', 'andorrano'),
(5, 'Angola', 'Luanda', 'angoleño/a'),
(6, 'Argelia', 'Argel', 'argelino/a'),
(7, 'Argentina', 'Buenos Aires', 'argentino/a'),
(8, 'Australia', 'Canberra', 'australiano/a'),
(9, 'Austria', 'Viena', 'austriaco/a'),
(10, 'Bahamas', 'Nassau', 'bahamés'),
(11, 'Bélgica', 'Bruselas', 'belga'),
(12, 'Belice', 'Belmopan', 'beliceño/a'),
(13, 'Benín', 'Porto-Novo', 'beninés'),
(14, 'Bolivia', 'Sucre (La Paz)', 'boliviano/a'),
(15, 'Botswana', 'Gaborone', 'botswanés'),
(16, 'Brasil', 'Brasilia', 'brasileño/a,'),
(17, 'Brunei', 'Bandar', 'bruneano/a'),
(18, 'Bulgaria', 'Sofía', 'búlgaro/a'),
(19, 'Burundi', 'Buyumbura', 'burundiano/a'),
(20, 'Bután', 'Thimbu', 'butanés/a'),
(21, 'Cabo', 'Praia', 'caboverdiano'),
(22, 'Canadá', 'Ottawa', 'canadiense'),
(23, 'Chile', 'Santiago', 'chileno/a'),
(24, 'China', 'Pekín', 'chino/a'),
(25, 'Colombia', 'Bogotá ', 'colombiano/a'),
(26, 'Corea del Sur', 'Seúl', '(sur)coreano/a'),
(27, 'Costa Rica', 'San José', 'costarricense'),
(28, 'Croacia', 'Zagreb', 'croata'),
(29, 'Cuba', 'La Habana', 'cubano/a'),
(30, 'Dinamarca', 'Copenhague', 'danés'),
(31, 'Ecuador', 'Quito', 'ecuatoriano/a'),
(32, 'Egipto', 'El Cairo', 'egipcio/a'),
(33, 'El Salvador', 'San Salvador', 'salvadoreño/a'),
(34, 'Eslovaquia', 'Bratislava', 'eslovaco/a'),
(35, 'Eslovenia', 'Liubliana', 'esloveno/a'),
(36, 'España', 'Madrid', 'español/a'),
(37, 'Estados Unidos, EE.UU', 'Washington D.C', 'estadounidense'),
(38, 'Estonia', 'Tallin', 'estonio'),
(39, 'Filipinas', 'Manila', 'filipino/a'),
(40, 'Francia', 'París', 'francesa'),
(41, 'Gabón', 'Libreville', 'gabonés'),
(42, 'Granada', 'Saint Georgeís', 'granadino/a'),
(43, 'Grecia', 'Atenas', 'griego/a'),
(44, 'Guayana Francesa', 'Cayena', 'guayanés'),
(45, 'Guatemala', 'Ciudad de Guatemala', 'guatemalteco/a'),
(46, 'Guinea', 'Conakry', 'guineano/a'),
(47, 'Guyana', 'Georgetown', 'guyanés'),
(48, 'Haití', 'Puerto Príncipe', 'haitiano/a'),
(49, 'Honduras', 'Tegucigalpa', 'hondureño/a'),
(50, 'Hungría', 'Budapest', 'húngaro/a'),
(51, 'India', 'Nueva Delhi', 'indio/a'),
(52, 'Indonesia', 'Yakarta', 'indonesio'),
(53, 'Inglaterra', 'Londres', 'ingles/a'),
(54, 'Italia', 'Roma', 'italiano/a'),
(55, 'Jamaica', 'Kingston', 'jamaicano/a'),
(56, 'Japón', 'Tokio', 'japonés/a,'),
(57, 'Kazajstán', 'Astana', 'kazajo'),
(58, 'Kenia', 'Nairobi', 'keniata'),
(59, 'Laos', 'Vientiane', 'laosiano/a'),
(60, 'Liberia', 'Monrovia', 'liberiano/a'),
(61, 'Libia', 'Trípoli', 'libio'),
(62, 'Lituania', 'Vilna', 'lituano/a'),
(63, 'Luxemburgo', 'Luxemburgo', 'luxemburgués/a'),
(64, 'Macedonia', 'Skopje', 'macedonio/a'),
(65, 'Madagascar', 'Antananarivo', 'malgache'),
(66, 'Marruecos', 'Rabat', 'marroquí'),
(67, 'Martinica', 'Fort-de- France', 'martiniqués'),
(68, 'Mauricio', 'Port Louis', 'mauriciano'),
(69, 'Mauritania', 'Nuakchott', 'mauritano'),
(70, 'México', 'Ciudad de México', 'mexicano/a'),
(71, 'Moldova', 'Chisinau', 'moldavo'),
(72, 'Mónaco', 'Mónaco-Ville', 'monegasco/a'),
(73, 'Mongolia', 'Ulan Bator', 'mongol'),
(74, 'Nicaragua', 'Managua', 'nicaragüense'),
(75, 'Niger', 'Niamey', 'nigeriano/a'),
(76, 'Nigeria', 'Abuja', 'nigeriano/a'),
(77, 'Noruega', 'Oslo', 'noruego/a'),
(78, 'Pakistán', 'Islamabad', 'pakistaní'),
(79, 'Palau', 'Koror', 'palauano/a'),
(80, 'Panamá', 'Ciudad de Panamá', 'panameño/a'),
(81, 'Nueva Guinea', 'Port Moresby', 'papú'),
(82, 'Paraguay', 'Asunción', 'paraguayo/a'),
(83, 'Perú', 'Lima', 'peruano/a'),
(84, 'Polonia', 'Varsovia', 'polaco/a'),
(85, 'Portugal', 'Lisboa', 'portugués/sa'),
(86, 'Puerto Rico', 'San Juan', 'portorriqueño/a'),
(87, 'Rumania', 'Bucarest', 'rumano/a'),
(88, 'Rusia', 'Moscú', 'ruso/a'),
(89, 'Suecia', 'Estocolmo', 'sueco/a'),
(90, 'Suiza', 'Berna', 'suizo/a'),
(91, 'Tonga', 'Nukualofa', 'tongano'),
(92, 'Trinidad y Tobago', 'Puerto de España', 'trinitario/a'),
(93, 'Tunicia', 'Túnez', 'tunecino/a'),
(94, 'Turkía', 'Ankara', 'turco'),
(95, 'Ucrania', 'Kiev', 'ucraniano/a'),
(96, 'Uganda', 'Kampala', 'ugandés'),
(97, 'Uruguay', 'Montevideo', 'uruguayo/a'),
(98, 'Unión Soviética', 'Moscú', 'ruso'),
(99, 'Venezuela', 'Caracas', 'venezolano/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrosistema`
--

CREATE TABLE `parametrosistema` (
  `IdParametroSistema` int(10) NOT NULL,
  `NombreParametroSistema` varchar(250) NOT NULL,
  `ValorParametroSistema` varchar(250) NOT NULL,
  `IdGrupoParametro` int(10) DEFAULT NULL,
  `IdEntidadSistema` int(10) DEFAULT NULL,
  `IndicadorEstado` varchar(1) NOT NULL,
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametrosistema`
--

INSERT INTO `parametrosistema` (`IdParametroSistema`, `NombreParametroSistema`, `ValorParametroSistema`, `IdGrupoParametro`, `IdEntidadSistema`, `IndicadorEstado`, `UsuarioRegistro`, `FechaRegistro`, `UsuarioModificacion`, `FechaModificacion`) VALUES
(1, 'CodigoAutomaticoServicio', '1', 11, 12, 'A', '', '0000-00-00 00:00:00', NULL, NULL),
(2, 'CodigoAutomaticoMercaderia', '1', 11, 2, 'A', '', '0000-00-00 00:00:00', NULL, NULL),
(5, 'CodigoAutomaticoActivoFijo', '1', 11, 4, 'A', '', '2018-03-06 16:03:08', NULL, '2018-03-06 16:04:35'),
(6, 'Mercaderia', '10', 2, 2, 'A', '', '2018-03-06 16:04:20', NULL, '2018-03-06 16:05:27'),
(10, 'Cliente', '10', 2, 9, 'A', '', '0000-00-00 00:00:00', NULL, NULL),
(11, 'Proveedor', '10', 2, 11, 'A', '', '2018-03-14 11:53:43', NULL, '2018-03-14 11:53:46'),
(12, 'Empleado', '10', 2, 10, 'A', '', '2018-03-15 08:53:30', NULL, NULL),
(15, 'Servicio', '10', 2, 12, 'A', '', '0000-00-00 00:00:00', NULL, NULL),
(16, 'ActivoFijo', '100', 2, 4, 'A', '', '2018-03-22 09:48:24', NULL, '2018-03-22 09:48:32'),
(17, 'Gasto', '100', 2, 4, 'A', '', '2018-03-22 09:48:24', NULL, '2018-03-22 09:48:32'),
(18, 'RangoMercaderia', '10', 2, 4, 'A', '', '2018-04-03 11:55:06', NULL, '2018-04-03 11:55:11'),
(19, 'RangoActivoFijo', '9', 2, 4, 'A', '', '2018-04-03 11:55:06', NULL, '2018-04-03 11:55:11'),
(20, 'TipoCambioEnteros', '1', 2, 4, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(21, 'TipoCambioDecimales', '3', 2, 4, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(22, 'NumeroSerie', '0', 3, 2, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(23, 'NumeroMotor', '1', 3, 2, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(24, 'NumeroPlaca', '1', 3, 2, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(25, 'AÃ±o', '1', 3, 2, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(26, 'Color', '1', 3, 2, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(27, 'Textura', '1', 3, 2, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(28, 'Talla', '1', 3, 2, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(29, 'TamaÃ±o', '1', 3, 2, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(31, 'LinkBusquedaImagenesInicio', 'https://www.google.com.pe/search?q=', 4, 4, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(32, 'LinkBusquedaImagenesFin', '&source=lnms&tbm=isch&sa=X&ved=0ahUKEwj14MS_h8TaAhXSt1MKHfEsAb0Q_AUICigB&biw=1366&bih=637', 4, 4, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(34, 'CarpetaImagenesRuta', '../../../assets/img/Mercaderia/', 2, 2, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(35, 'ValorVentaGravado', '1', 5, 7, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(36, 'ValorVentaNoGravado', '1', 5, 7, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(37, 'ValorVentaInafecto', '1', 5, 7, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(38, 'ISC', '1', 5, 7, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(39, 'OrdenCompra', '1', 5, 7, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(40, 'IdEmpresa', '1', 6, 8, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(41, 'CarpetaImagenesRuta', '../../../../assets/img/Empresa/', 2, 8, 'A', '', '2018-04-09 12:30:27', NULL, '2018-04-09 12:30:31'),
(42, 'Tasa IGV', '0.18', 2, 7, 'A', '', '2018-04-09 12:30:27', NULL, '2019-02-26 17:10:27'),
(365, 'sad', 'sad0', 9, NULL, 'I', 'FTUYO', '2020-12-21 13:08:14', 'FTUYO', '2020-12-22 10:28:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `IdPersona` int(10) NOT NULL,
  `IdTipoPersona` int(10) NOT NULL,
  `NumeroDocumentoIdentidad` varchar(15) NOT NULL,
  `IdTipoDocumentoIdentidad` int(10) NOT NULL,
  `NombreCompleto` varchar(40) DEFAULT NULL,
  `ApellidoCompleto` varchar(40) DEFAULT NULL,
  `RazonSocial` varchar(100) NOT NULL,
  `NombreComercial` varchar(80) DEFAULT NULL,
  `RepresentanteLegal` varchar(80) DEFAULT NULL,
  `CondicionContribuyente` varchar(50) NOT NULL,
  `EstadoContribuyente` varchar(50) NOT NULL,
  `IdRol` int(10) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `TelefonoFijo` varchar(30) DEFAULT '',
  `Email` varchar(80) DEFAULT NULL,
  `Celular` varchar(30) DEFAULT '',
  `TelefonoPersonal` varchar(70) DEFAULT '',
  `LugarNacimiento` varchar(70) DEFAULT '',
  `Nacionalidad` varchar(70) DEFAULT '',
  `Observacion` varchar(80) DEFAULT NULL,
  `IdGenero` int(11) DEFAULT NULL,
  `IdEstadoCivil` int(11) NOT NULL,
  `Foto` varchar(200) DEFAULT NULL,
  `EstadoPersona` varchar(1) NOT NULL COMMENT '1 : Activo , 0 : Eliminado',
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `MaquinaRegistro` varchar(50) NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `MaquinaModificacion` varchar(50) NOT NULL,
  `UsuarioEliminacion` varchar(50) DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `MaquinaEliminacion` varchar(50) NOT NULL,
  `UbicacionEmpresa` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`IdPersona`, `IdTipoPersona`, `NumeroDocumentoIdentidad`, `IdTipoDocumentoIdentidad`, `NombreCompleto`, `ApellidoCompleto`, `RazonSocial`, `NombreComercial`, `RepresentanteLegal`, `CondicionContribuyente`, `EstadoContribuyente`, `IdRol`, `FechaNacimiento`, `TelefonoFijo`, `Email`, `Celular`, `TelefonoPersonal`, `LugarNacimiento`, `Nacionalidad`, `Observacion`, `IdGenero`, `IdEstadoCivil`, `Foto`, `EstadoPersona`, `UsuarioRegistro`, `FechaRegistro`, `MaquinaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `MaquinaModificacion`, `UsuarioEliminacion`, `FechaEliminacion`, `MaquinaEliminacion`, `UbicacionEmpresa`) VALUES
(1, 1, '10479933257', 4, 'Margarita ', 'Perez Rojas', 'Importaciones Dental INIBSA', 'INIBSA', 'Margarita Perez Rojas', 'HABIDO', 'ACTIVO', 3, '0000-00-00', '(+51) 052-245034', 'administracioninibsa@gmail.com', '+51956481926', '052-245623', 'LIMA', 'PERUANA', '-', 1, 1, 'user-6.jpg', '1', 'Yovana', '2020-12-01 12:52:45', 'PC-LENOVO', 'yovana', '2021-02-21 22:55:13', 'LAPTOP-MKOKFC3V', 'yovana', '2021-02-21 22:54:42', 'LAPTOP-MKOKFC3V', 'TACNA-TACNA-TACNA'),
(14, 2, '47883321', 2, 'MAYCOL ANTONIO', 'SANDON MELENDREZ', '', '', '', 'HABIDO', 'ACTIVO', 10, '0000-00-00', '(+51) 052-245689', 'demo@fastura.app', '+51995667452', '(+51) 052-245689', 'TACNA, TACNA', 'Peruano/a', '-', 2, 1, 'user.jpg', '1', 'YVELASQUEZ', '2021-02-25 10:53:58', 'DESKTOP-78LP8J4', 'yovana', '2021-03-05 08:29:50', 'LAPTOP-MKOKFC3V', NULL, NULL, '', ''),
(15, 2, '47993310', 2, 'JUAN CARLOS', 'CHOQUE HUARCAYA', '', '', '', '', '', 10, '0000-00-00', '(+51) 052-456732', 'juancarlos@gmail.com', '+51998775642', '(+51) 052-456732', 'TACNA, TACNA', 'Peruano/a', '-', 2, 1, 'persona.png', '1', 'yovana', '2021-03-01 06:40:37', 'LAPTOP-MKOKFC3V', 'yovana', '2021-03-05 08:40:58', 'LAPTOP-MKOKFC3V', NULL, NULL, '', ''),
(16, 2, '47993377', 2, 'WILLIAMS BARTOLOME', 'DORREGARAY FABIAN', '', '', '-', '', '', 10, '0000-00-00', '(+51) 052-245034', 'bartolome@gmail.com', '+51986445321', '052-245034', 'LIMA, LIMA', 'Peruano/a', '-', 2, 1, 'persona.png', '1', 'yovana', '2021-03-05 04:24:34', 'LAPTOP-MKOKFC3V', NULL, NULL, '', NULL, NULL, '', ''),
(17, 2, '47992230', 2, 'ALEJANDRO HILTON', 'CHOQUE CASTRO', '', '', '', 'HABIDO', 'ACTIVO', 34, '0000-00-00', '(+51) 052-345632', 'alejandro@gmail.com', '+51952674523', '(+51) 052-345632', 'PUNO, PUNO', 'Peruano/a', '-', 2, 1, 'persona.png', '1', 'yovana', '2021-03-05 08:38:10', 'LAPTOP-MKOKFC3V', 'yovana', '2021-03-05 08:39:21', 'LAPTOP-MKOKFC3V', NULL, NULL, '', ''),
(18, 2, '10000060271', 4, 'CARLOS', 'MONTERO RENGIFO', 'MONTERO RENGIFO CARLOS', 'BOTICAS 24 HORAS 5', 'CARLOS MONTERO RENGIFO', 'HABIDO', 'SUSPENSION TEMPORAL', 34, '0000-00-00', '(+51) 052-237856', 'Carlos@gmail.com', '+51966554381', '(+51) 052-237856', 'TACNA, TACNA', 'Peruano/a', '-', 2, 1, 'persona.png', '1', 'yovana', '2021-03-05 08:49:23', 'LAPTOP-MKOKFC3V', 'yovana', '2021-03-05 09:00:25', 'LAPTOP-MKOKFC3V', NULL, NULL, '', ''),
(19, 2, '10000129785', 4, 'NIXON LUIS', 'GARCIA SANGAMA', 'GARCIA SANGAMA NIXON LUIS', '-', 'NIXON LUIS GARCIA SANGAMA', 'HABIDO', 'ACTIVO', 23, '0000-00-00', '(+51) 052-245767', 'nixon@gmail.com', '+51988775643', '052-245767', 'PUNO, PUNO', 'Peruano/a', '-', 2, 1, 'persona.png', '1', 'yovana', '2021-03-05 09:04:00', 'LAPTOP-MKOKFC3V', NULL, NULL, '', NULL, NULL, '', '-'),
(20, 2, '43556111', 2, 'ROGER FERNANDO', 'GUERRERO FRIAS', '', '', '', 'HABIDO', 'ACTIVO', 36, '0000-00-00', '(+51) 052-245056', 'roger@gamil.com', '+51988667452', '(+51) 052-245056', 'TACNA, TACNA', 'Peruano/a', '-', 2, 1, 'persona.png', '1', 'YVELASQUEZ', '2021-03-05 11:42:26', 'DESKTOP-78LP8J4', 'YVELASQUEZ', '2021-03-05 11:45:56', 'DESKTOP-78LP8J4', NULL, NULL, '', ''),
(21, 2, '10205844649', 4, 'LIVIO JAIR', 'HUANQUI MORON', 'HUANQUI MORON LIVIO JAIR', 'BRY KER', '-', 'HABIDO', 'ACTIVO', 35, '0000-00-00', '(+51) 052-245067', 'livio@gmail.com', '+51988674532', '(+51) 052-245067', 'MOQUEGUA, MARISCAL NIETO', 'Peruano/a', '-', 2, 2, 'rSuiu_Hr.jpg', '1', 'YVELASQUEZ', '2021-03-05 11:51:38', 'DESKTOP-78LP8J4', 'YVELASQUEZ', '2021-03-05 11:54:10', 'DESKTOP-78LP8J4', NULL, NULL, '', '-'),
(22, 2, '01263480', 2, 'SOFIA', 'CUTIPA JANAMPA', '', '', '', '', '', 16, '0000-00-00', '(+51) 052-245060', 'sofia@gmail.com', '+51996789064', '052-245060', 'MOQUEGUA, MARISCAL NIETO', 'Peruano/a', '-', 1, 1, 'persona.png', '1', 'YVELASQUEZ', '2021-03-05 14:18:53', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, '', ''),
(23, 2, '10000146400', 4, 'NANCY', 'MACIEL PEZO', 'MACIEL PEZO NANCY', 'INVERSI. Y SERVICIO TELEWORLD', 'NANCY MACIEL PEZO', 'NO HABIDO', 'ACTIVO', 11, '0000-00-00', '(+51) 052-245031', 'nancy.pezo@gmail.com', '+51996554321', '(+51) 052-245031', 'TACNA, TACNA', 'Peruano/a', '-', 1, 1, 'OIP.jfif', '1', 'YVELASQUEZ', '2021-03-08 14:57:25', 'DESKTOP-78LP8J4', 'YVELASQUEZ', '2021-03-08 15:11:25', 'DESKTOP-78LP8J4', NULL, NULL, '', ''),
(24, 2, '10000184867', 4, 'NORA', 'ORBE DE AREVALO', 'ORBE DE AREVALO NORA', '-', '-', 'HABIDO', 'BAJA DE OFICIO', 5, '0000-00-00', '(+51) 052-457823', 'nora.orbe@gmail.com', '+51975643829', '(+51) 052-457823', 'TACNA, CANDARAVE', 'Peruano/a', '-', 1, 2, 'OIP (1).jfif', '1', 'YVELASQUEZ', '2021-03-08 15:19:29', 'DESKTOP-78LP8J4', 'YVELASQUEZ', '2021-03-08 15:31:02', 'DESKTOP-78LP8J4', NULL, NULL, '', '-'),
(25, 2, '10000208286', 4, 'LUCIA ROMULA', 'GUINEA HURTADO', 'GUINEA HURTADO LUCIA ROMULA', 'MADERERA ARROYO', 'LUCIA ROMULA GUINEA HURTADO', 'HABIDO', 'ACTIVO', 15, '0000-00-00', '(+51) 052-234567', 'lucia.rom@gmail.com', '+51988675432', '(+51) 052-234567', 'CUSCO, CUSCO', 'Peruano/a', '-', 1, 2, 'user13.jpg', '1', 'YVELASQUEZ', '2021-03-08 16:28:17', 'DESKTOP-78LP8J4', 'YVELASQUEZ', '2021-03-08 16:29:53', 'DESKTOP-78LP8J4', NULL, NULL, '', ''),
(26, 2, '10000228643', 4, 'MOISES', 'SANCHEZ HIDALGO', 'SANCHEZ HIDALGO MOISES', '-', '-', 'HABIDO', 'ACTIVO', 5, '0000-00-00', '(+51) 052-456789', 'moises@gmail.com', '+51998665534', '052-456789', 'TACNA, TACNA', 'Peruano/a', '-', 2, 1, 'user24.jpg', '1', 'YVELASQUEZ', '2021-03-08 16:32:56', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, '', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preciounidadmedida`
--

CREATE TABLE `preciounidadmedida` (
  `IdPrecioUnidadMedida` int(10) NOT NULL,
  `IdProducto` int(10) NOT NULL,
  `IdUnidadMedida` int(10) NOT NULL,
  `Equivalencia` int(11) NOT NULL,
  `PrecioVenta` float(10,2) NOT NULL,
  `UsuarioRegistro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `UsuarioModificacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `UsuarioEliminacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `MaquinaRegistro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `MaquinaModificacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `MaquinaEliminacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Stock` int(11) NOT NULL,
  `IndicadorEstado` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preciounidadmedida`
--

INSERT INTO `preciounidadmedida` (`IdPrecioUnidadMedida`, `IdProducto`, `IdUnidadMedida`, `Equivalencia`, `PrecioVenta`, `UsuarioRegistro`, `UsuarioModificacion`, `UsuarioEliminacion`, `MaquinaRegistro`, `MaquinaModificacion`, `MaquinaEliminacion`, `Stock`, `IndicadorEstado`, `FechaRegistro`, `FechaModificacion`) VALUES
(1, 1, 4, 5, 10.00, 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 30, '1', NULL, NULL),
(14, 1, 4, 5, 35.00, 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 15, '1', NULL, NULL),
(15, 1, 58, 1, 5.00, 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 30, '1', NULL, NULL),
(16, 3, 4, 5, 10.00, 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 10, '1', NULL, NULL),
(17, 2, 6, 5, 35.00, 'YVELASQUEZ', 'YVELASQUEZ', NULL, 'DESKTOP-78LP8J4', 'DESKTOP-78LP8J4', NULL, 15, '1', NULL, NULL),
(18, 4, 58, 1, 35.00, 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 3, '1', NULL, NULL),
(19, 5, 4, 5, 35.00, 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 15, '1', NULL, NULL),
(20, 5, 58, 1, 6.00, 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 10, '1', NULL, NULL),
(21, 5, 14, 12, 60.00, 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 5, '1', '2021-01-30 10:49:17', NULL),
(22, 2, 58, 1, 6.00, 'YVELASQUEZ', NULL, NULL, 'DESKTOP-78LP8J4', NULL, NULL, 15, '1', '2021-01-30 10:53:04', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(10) NOT NULL,
  `CodigoProducto` varchar(20) NOT NULL,
  `CodigoComercialProducto` varchar(40) NOT NULL DEFAULT '',
  `CodigoBarraProducto` varchar(20) NOT NULL,
  `NombreProducto` varchar(300) NOT NULL DEFAULT '' COMMENT 'Nombre Original Producto',
  `NombreComercialProducto` varchar(1000) NOT NULL DEFAULT '' COMMENT 'Nombre Comercial del Producto, nombre que se muestra al publico',
  `IdCategoriaProducto` int(10) NOT NULL COMMENT '00 : Ninguna',
  `IdTipoProducto` int(10) NOT NULL,
  `IdTipoExistencia` int(10) NOT NULL,
  `IdTipoServicio` int(10) NOT NULL,
  `IdTipoActivo` int(10) NOT NULL,
  `IdFamiliaProducto` int(10) NOT NULL,
  `IdSubFamiliaProducto` int(10) NOT NULL,
  `IdMarca` int(10) NOT NULL,
  `IdModeloMarca` int(10) NOT NULL,
  `IdLineaProducto` int(10) NOT NULL,
  `IdFabricante` int(11) NOT NULL,
  `Foto` varchar(250) DEFAULT NULL,
  `OtroDato` varchar(250) DEFAULT NULL,
  `EstadoProducto` char(1) NOT NULL DEFAULT '1' COMMENT '1 : Activo , 0 : Eliminado',
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `MaquinaRegistro` varchar(50) NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `MaquinaModificacion` varchar(50) DEFAULT NULL,
  `UsuarioEliminacion` varchar(50) DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `MaquinaEliminacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `CodigoProducto`, `CodigoComercialProducto`, `CodigoBarraProducto`, `NombreProducto`, `NombreComercialProducto`, `IdCategoriaProducto`, `IdTipoProducto`, `IdTipoExistencia`, `IdTipoServicio`, `IdTipoActivo`, `IdFamiliaProducto`, `IdSubFamiliaProducto`, `IdMarca`, `IdModeloMarca`, `IdLineaProducto`, `IdFabricante`, `Foto`, `OtroDato`, `EstadoProducto`, `UsuarioRegistro`, `FechaRegistro`, `MaquinaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `MaquinaModificacion`, `UsuarioEliminacion`, `FechaEliminacion`, `MaquinaEliminacion`) VALUES
(1, 'COH00001', 'COH00001', '978020137962', 'CLAMPS UNIVERSAL CON RETRACCION GINGIVAL - COLTENE', 'CLAMPS UNIVERSAL CON RETRACCION GINGIVAL', 1, 1, 1, 0, 0, 1, 16, 1, 1, 3, 2, 'clamb1.jpg', '-', '1', 'Yovana', '2020-12-01 12:52:45', 'LAPTOP-MKOKFC3V', 'YVELASQUEZ', '2021-03-25 15:09:37', 'DESKTOP-78LP8J4', 'YVELASQUEZ', '2021-01-19 16:06:05', 'DESKTOP-78LP8J4'),
(2, 'CORN0001', 'CORN0001', 'CORN0001', ' Coronas Dentales PROTEMP N 11 ', ' Coronas Dentales PROTEMP ', 0, 1, 1, 0, 0, 4, 10, 28, 18, 4, 4, 'unnamed.jpg', '-', '1', 'YVELASQUEZ', '2021-01-19 15:01:38', 'DESKTOP-78LP8J4', 'YVELASQUEZ', '2021-01-20 11:26:02', 'DESKTOP-78LP8J4', NULL, NULL, NULL),
(3, 'GNZ0001', 'GNZ0001', 'GNZ0001', ' Disectores Cirugía Oral GNZ Dental ', ' Disectores Cirugía Oral GNZ Dental ', 0, 1, 1, 0, 0, 2, 6, 27, 14, 5, 4, 'bisturi-15.jpg', '-', '1', 'YVELASQUEZ', '2021-01-19 15:04:26', 'DESKTOP-78LP8J4', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'CAVI0001', 'CAVI0001', 'CAVI0001', '  Cavitine-Cemento de Obturación x-38gr', '  Cavitine-Cemento de Obturación x-38gr', 0, 1, 1, 0, 0, 3, 9, 24, 19, 4, 5, 'cavitine-dentaflux-38gr.jpg', '-', '1', 'YVELASQUEZ', '2021-01-19 15:22:09', 'DESKTOP-78LP8J4', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'HAWE0001', 'HAWE0001', 'HAWE0001', ' Pro-Cup: Copas Profilaxis de Hawe-neos', ' Pro-Cup: Copas Profilaxis de Hawe-neos', 0, 1, 0, 0, 0, 10, 120, 31, 24, 8, 9, 'HN90460.jpg', '-', '1', 'YVELASQUEZ', '2021-01-26 11:51:16', 'DESKTOP-78LP8J4', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'CEME0001', 'CEME0001', 'CEME0001', 'CEMENTO PROVISIONAL SIN EUGENOL (BOTE 28 GR)', 'Cemento Provisional sin Eugenol (Bote 28 gr)', 1, 2, 1, 0, 0, 3, 124, 36, 31, 10, 11, 'add-image.png', NULL, '1', 'HP', '2021-03-19 05:30:44', 'LAPTOP-4LG4GP91', NULL, NULL, NULL, NULL, NULL, NULL),
(7, ' IMP0001', ' IMP0001', ' IMP0001', 'TORNILLOS DE PROTESIS CONEXION EXTERNA PLATAFORMA REGULAR', 'TORNILLOS DE PROTESIS CONEXION EXTERNA PLATAFORMA REGULAR', 0, 1, 0, 0, 0, 15, 125, 37, 33, 10, 12, 'add-image.png', NULL, '1', 'HP', '2021-03-19 09:49:08', 'LAPTOP-4LG4GP91', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'AGUJ0001', 'AGUJ0001', 'AGUJ0001', 'ULTRACALM PLUS JERINGA ANESTESIA - CLARBEN', 'ULTRACALM PLUS  JERINGA ANESTESIA - Clarben', 0, 1, 0, 0, 0, 16, 127, 38, 0, 3, 13, 'add-image.png', NULL, '1', 'YVELASQUEZ', '2021-03-25 14:34:06', 'DESKTOP-78LP8J4', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'AGUJ0002', 'AGUJ0002', 'AGUJ0002', 'SEPTOJECT EVOLUTION - AGUJAS DE ANESTESIA (100U.)', 'SEPTOJECT EVOLUTION - AGUJAS DE ANESTESIA (100u.)', 0, 1, 0, 0, 0, 16, 127, 39, 0, 3, 14, 'add-image.png', NULL, '1', 'YVELASQUEZ', '2021-03-25 14:34:07', 'DESKTOP-78LP8J4', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'CORO0001', 'CORO0001', 'CORO0001', 'CORONAS TEMPORALES INCISIVOS LATERALES SUPERIOR DERECHA', 'CORONAS TEMPORALES INCISIVOS LATERALES SUPERIOR DERECHA', 0, 1, 0, 0, 0, 4, 128, 40, 0, 3, 15, 'add-image.png', NULL, '1', 'YVELASQUEZ', '2021-03-25 14:34:07', 'DESKTOP-78LP8J4', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `IdProvincia` int(5) NOT NULL,
  `NombreProvincia` varchar(50) DEFAULT NULL,
  `CodigoUbigeoProvincia` varchar(2) DEFAULT NULL,
  `IdDepartamento` int(5) DEFAULT NULL,
  `IndicadorEstado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`IdProvincia`, `NombreProvincia`, `CodigoUbigeoProvincia`, `IdDepartamento`, `IndicadorEstado`) VALUES
(1, 'CHACHAPOYAS', '01', 1, 'A'),
(2, 'BAGUA', '02', 1, 'A'),
(3, 'BONGARÁ', '03', 1, 'A'),
(4, 'CONDORCANQUI', '04', 1, 'A'),
(5, 'LUYA', '05', 1, 'A'),
(6, 'RODRÍGUEZ DE MENDOZA', '06', 1, 'A'),
(7, 'UTCUBAMBA', '07', 1, 'A'),
(8, 'HUARAZ', '01', 2, 'A'),
(9, 'AIJA', '02', 2, 'A'),
(10, 'ANTONIO RAYMONDI', '03', 2, 'A'),
(11, 'ASUNCIÓN', '04', 2, 'A'),
(12, 'BOLOGNESI', '05', 2, 'A'),
(13, 'CARHUAZ', '06', 2, 'A'),
(14, 'CARLOS FERMÍN FITZCARRALD', '07', 2, 'A'),
(15, 'CASMA', '08', 2, 'A'),
(16, 'CORONGO', '09', 2, 'A'),
(17, 'HUARI', '10', 2, 'A'),
(18, 'HUARMEY', '11', 2, 'A'),
(19, 'HUAYLAS', '12', 2, 'A'),
(20, 'MARISCAL LUZURIAGA', '13', 2, 'A'),
(21, 'OCROS', '14', 2, 'A'),
(22, 'PALLASCA', '15', 2, 'A'),
(23, 'POMABAMBA', '16', 2, 'A'),
(24, 'RECUAY', '17', 2, 'A'),
(25, 'SANTA', '18', 2, 'A'),
(26, 'SIHUAS', '19', 2, 'A'),
(27, 'YUNGAY', '20', 2, 'A'),
(28, 'ABANCAY', '01', 3, 'A'),
(29, 'ANDAHUAYLAS', '02', 3, 'A'),
(30, 'ANTABAMBA', '03', 3, 'A'),
(31, 'AYMARAES', '04', 3, 'A'),
(32, 'COTABAMBAS', '05', 3, 'A'),
(33, 'CHINCHEROS', '06', 3, 'A'),
(34, 'GRAU', '07', 3, 'A'),
(35, 'AREQUIPA', '01', 4, 'A'),
(36, 'CAMANÁ', '02', 4, 'A'),
(37, 'CARAVELÍ', '03', 4, 'A'),
(38, 'CASTILLA', '04', 4, 'A'),
(39, 'CAYLLOMA', '05', 4, 'A'),
(40, 'CONDESUYOS', '06', 4, 'A'),
(41, 'ISLAY', '07', 4, 'A'),
(42, 'LA UNIÒN', '08', 4, 'A'),
(43, 'HUAMANGA', '01', 5, 'A'),
(44, 'CANGALLO', '02', 5, 'A'),
(45, 'HUANCA SANCOS', '03', 5, 'A'),
(46, 'HUANTA', '04', 5, 'A'),
(47, 'LA MAR', '05', 5, 'A'),
(48, 'LUCANAS', '06', 5, 'A'),
(49, 'PARINACOCHAS', '07', 5, 'A'),
(50, 'PÀUCAR DEL SARA SARA', '08', 5, 'A'),
(51, 'SUCRE', '09', 5, 'A'),
(52, 'VÍCTOR FAJARDO', '10', 5, 'A'),
(53, 'VILCAS HUAMÁN', '11', 5, 'A'),
(54, 'CAJAMARCA', '01', 6, 'A'),
(55, 'CAJABAMBA', '02', 6, 'A'),
(56, 'CELENDÍN', '03', 6, 'A'),
(57, 'CHOTA', '04', 6, 'A'),
(58, 'CONTUMAZÁ', '05', 6, 'A'),
(59, 'CUTERVO', '06', 6, 'A'),
(60, 'HUALGAYOC', '07', 6, 'A'),
(61, 'JAÉN', '08', 6, 'A'),
(62, 'SAN IGNACIO', '09', 6, 'A'),
(63, 'SAN MARCOS', '10', 6, 'A'),
(64, 'SAN MIGUEL', '11', 6, 'A'),
(65, 'SAN PABLO', '12', 6, 'A'),
(66, 'SANTA CRUZ', '13', 6, 'A'),
(67, 'PROV. CONST. DEL CALLAO', '01', 7, 'A'),
(68, 'CUSCO', '01', 8, 'A'),
(69, 'ACOMAYO', '02', 8, 'A'),
(70, 'ANTA', '03', 8, 'A'),
(71, 'CALCA', '04', 8, 'A'),
(72, 'CANAS', '05', 8, 'A'),
(73, 'CANCHIS', '06', 8, 'A'),
(74, 'CHUMBIVILCAS', '07', 8, 'A'),
(75, 'ESPINAR', '08', 8, 'A'),
(76, 'LA CONVENCIÓN', '09', 8, 'A'),
(77, 'PARURO', '10', 8, 'A'),
(78, 'PAUCARTAMBO', '11', 8, 'A'),
(79, 'QUISPICANCHI', '12', 8, 'A'),
(80, 'URUBAMBA', '13', 8, 'A'),
(81, 'HUANCAVELICA', '01', 9, 'A'),
(82, 'ACOBAMBA', '02', 9, 'A'),
(83, 'ANGARAES', '03', 9, 'A'),
(84, 'CASTROVIRREYNA', '04', 9, 'A'),
(85, 'CHURCAMPA', '05', 9, 'A'),
(86, 'HUAYTARÁ', '06', 9, 'A'),
(87, 'TAYACAJA', '07', 9, 'A'),
(88, 'HUÁNUCO', '01', 10, 'A'),
(89, 'AMBO', '02', 10, 'A'),
(90, 'DOS DE MAYO', '03', 10, 'A'),
(91, 'HUACAYBAMBA', '04', 10, 'A'),
(92, 'HUAMALÍES', '05', 10, 'A'),
(93, 'LEONCIO PRADO', '06', 10, 'A'),
(94, 'MARAÑÓN', '07', 10, 'A'),
(95, 'PACHITEA', '08', 10, 'A'),
(96, 'PUERTO INCA', '09', 10, 'A'),
(97, 'LAURICOCHA', '10', 10, 'A'),
(98, 'YAROWILCA', '11', 10, 'A'),
(99, 'ICA', '01', 11, 'A'),
(100, 'CHINCHA', '02', 11, 'A'),
(101, 'NASCA', '03', 11, 'A'),
(102, 'PALPA', '04', 11, 'A'),
(103, 'PISCO', '05', 11, 'A'),
(104, 'HUANCAYO', '01', 12, 'A'),
(105, 'CONCEPCIÓN', '02', 12, 'A'),
(106, 'CHANCHAMAYO', '03', 12, 'A'),
(107, 'JAUJA', '04', 12, 'A'),
(108, 'JUNÍN', '05', 12, 'A'),
(109, 'SATIPO', '06', 12, 'A'),
(110, 'TARMA', '07', 12, 'A'),
(111, 'YAULI', '08', 12, 'A'),
(112, 'CHUPACA', '09', 12, 'A'),
(113, 'TRUJILLO', '01', 13, 'A'),
(114, 'ASCOPE', '02', 13, 'A'),
(115, 'BOLÍVAR', '03', 13, 'A'),
(116, 'CHEPÉN', '04', 13, 'A'),
(117, 'JULCÁN', '05', 13, 'A'),
(118, 'OTUZCO', '06', 13, 'A'),
(119, 'PACASMAYO', '07', 13, 'A'),
(120, 'PATAZ', '08', 13, 'A'),
(121, 'SÁNCHEZ CARRIÓN', '09', 13, 'A'),
(122, 'SANTIAGO DE CHUCO', '10', 13, 'A'),
(123, 'GRAN CHIMÚ', '11', 13, 'A'),
(124, 'VIRÚ', '12', 13, 'A'),
(125, 'CHICLAYO', '01', 14, 'A'),
(126, 'FERREÑAFE', '02', 14, 'A'),
(127, 'LAMBAYEQUE', '03', 14, 'A'),
(128, 'LIMA', '01', 15, 'A'),
(129, 'BARRANCA', '02', 15, 'A'),
(130, 'CAJATAMBO', '03', 15, 'A'),
(131, 'CANTA', '04', 15, 'A'),
(132, 'CAÑETE', '05', 15, 'A'),
(133, 'HUARAL', '06', 15, 'A'),
(134, 'HUAROCHIRÍ', '07', 15, 'A'),
(135, 'HUAURA', '08', 15, 'A'),
(136, 'OYÓN', '09', 15, 'A'),
(137, 'YAUYOS', '10', 15, 'A'),
(138, 'MAYNAS', '01', 16, 'A'),
(139, 'ALTO AMAZONAS', '02', 16, 'A'),
(140, 'LORETO', '03', 16, 'A'),
(141, 'MARISCAL RAMÓN CASTILLA', '04', 16, 'A'),
(142, 'REQUENA', '05', 16, 'A'),
(143, 'UCAYALI', '06', 16, 'A'),
(144, 'DATEM DEL MARAÑÓN', '07', 16, 'A'),
(145, 'PUTUMAYO', '08', 16, 'A'),
(146, 'TAMBOPATA', '01', 17, 'A'),
(147, 'MANU', '02', 17, 'A'),
(148, 'TAHUAMANU', '03', 17, 'A'),
(149, 'MARISCAL NIETO', '01', 18, 'A'),
(150, 'GENERAL SÁNCHEZ CERRO', '02', 18, 'A'),
(151, 'ILO', '03', 18, 'A'),
(152, 'PASCO', '01', 19, 'A'),
(153, 'DANIEL ALCIDES CARRIÓN', '02', 19, 'A'),
(154, 'OXAPAMPA', '03', 19, 'A'),
(155, 'PIURA', '01', 20, 'A'),
(156, 'AYABACA', '02', 20, 'A'),
(157, 'HUANCABAMBA', '03', 20, 'A'),
(158, 'MORROPÓN', '04', 20, 'A'),
(159, 'PAITA', '05', 20, 'A'),
(160, 'SULLANA', '06', 20, 'A'),
(161, 'TALARA', '07', 20, 'A'),
(162, 'SECHURA', '08', 20, 'A'),
(163, 'PUNO', '01', 21, 'A'),
(164, 'AZÁNGARO', '02', 21, 'A'),
(165, 'CARABAYA', '03', 21, 'A'),
(166, 'CHUCUITO', '04', 21, 'A'),
(167, 'EL COLLAO', '05', 21, 'A'),
(168, 'HUANCANÉ', '06', 21, 'A'),
(169, 'LAMPA', '07', 21, 'A'),
(170, 'MELGAR', '08', 21, 'A'),
(171, 'MOHO', '09', 21, 'A'),
(172, 'SAN ANTONIO DE PUTINA', '10', 21, 'A'),
(173, 'SAN ROMÁN', '11', 21, 'A'),
(174, 'SANDIA', '12', 21, 'A'),
(175, 'YUNGUYO', '13', 21, 'A'),
(176, 'MOYOBAMBA', '01', 22, 'A'),
(177, 'BELLAVISTA', '02', 22, 'A'),
(178, 'EL DORADO', '03', 22, 'A'),
(179, 'HUALLAGA', '04', 22, 'A'),
(180, 'LAMAS', '05', 22, 'A'),
(181, 'MARISCAL CÁCERES', '06', 22, 'A'),
(182, 'PICOTA', '07', 22, 'A'),
(183, 'RIOJA', '08', 22, 'A'),
(184, 'SAN MARTÍN', '09', 22, 'A'),
(185, 'TOCACHE', '10', 22, 'A'),
(186, 'TACNA', '01', 23, 'A'),
(187, 'CANDARAVE', '02', 23, 'A'),
(188, 'JORGE BASADRE', '03', 23, 'A'),
(189, 'TARATA', '04', 23, 'A'),
(190, 'TUMBES', '01', 24, 'A'),
(191, 'CONTRALMIRANTE VILLAR', '02', 24, 'A'),
(192, 'ZARUMILLA', '03', 24, 'A'),
(193, 'CORONEL PORTILLO', '01', 25, 'A'),
(194, 'ATALAYA', '02', 25, 'A'),
(195, 'PADRE ABAD', '03', 25, 'A'),
(196, 'PURÚS', '04', 25, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regimentributario`
--

CREATE TABLE `regimentributario` (
  `IdRegimenTributario` int(10) NOT NULL,
  `NombreRegimenTributario` varchar(50) NOT NULL,
  `NombreAbreviado` varchar(10) NOT NULL,
  `IndicadorEstado` varchar(1) NOT NULL,
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `regimentributario`
--

INSERT INTO `regimentributario` (`IdRegimenTributario`, `NombreRegimenTributario`, `NombreAbreviado`, `IndicadorEstado`, `UsuarioRegistro`, `FechaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'REGIMEN GENERAL', 'RG', '1', 'FTUYO', '2020-12-09 11:30:10', 'FTUYO', '2020-12-11 09:22:04', NULL, NULL, NULL),
(2, 'REGIMEN MYPE TRIBUTARIO', 'REMYPE', '1', 'FTUYO', '2020-12-09 11:17:35', 'FTUYO', '2020-12-11 10:00:40', NULL, NULL, NULL),
(3, 'REGIMEN ESPECIAL', 'RER', '1', 'FTUYO', '2020-12-10 10:10:44', 'FTUYO', '2020-12-11 10:00:46', NULL, NULL, NULL),
(4, 'NUEVO REGIMEN UNICO SIMPLIFICADO', 'NRUS', '1', 'FTUYO', '2020-12-10 10:10:57', 'FTUYO', '2020-12-11 10:00:42', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumeninventario`
--

CREATE TABLE `resumeninventario` (
  `IdResumenInventario` int(10) NOT NULL,
  `IdSede` int(10) NOT NULL,
  `IdTipoInventario` int(10) NOT NULL,
  `FechaInventario` date NOT NULL,
  `Observacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `EstadoResumenInventario` varchar(1) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `UsuarioRegistro` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `UsuarioModificacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `UsuarioEliminacion` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `resumeninventario`
--

INSERT INTO `resumeninventario` (`IdResumenInventario`, `IdSede`, `IdTipoInventario`, `FechaInventario`, `Observacion`, `EstadoResumenInventario`, `UsuarioRegistro`, `UsuarioModificacion`, `FechaRegistro`, `FechaModificacion`, `UsuarioEliminacion`, `FechaEliminacion`) VALUES
(1, 2, 1, '2021-03-25', '-', '1', 'YVELASQUEZ', NULL, '2021-03-25 14:34:06', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `IdRol` int(10) NOT NULL,
  `NombreRol` varchar(50) DEFAULT NULL,
  `VerTodasVentas` varchar(1) NOT NULL,
  `VerComboVentas` varchar(1) NOT NULL,
  `IndicadorEstado` varchar(1) DEFAULT NULL,
  `UsuarioRegistro` varchar(50) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`IdRol`, `NombreRol`, `VerTodasVentas`, `VerComboVentas`, `IndicadorEstado`, `UsuarioRegistro`, `FechaRegistro`, `UsuarioModificacion`, `FechaModificacion`) VALUES
(1, 'GERENTE', '1', '1', 'A', '', NULL, 'YVELASQUEZ', '2021-01-12 12:10:51'),
(2, 'SUBGERENTE', '1', '1', 'A', '', NULL, NULL, NULL),
(3, 'ADMINISTRADOR', '1', '1', 'A', '', NULL, NULL, NULL),
(4, 'VENDEDOR', '1', '1', 'A', '', NULL, NULL, NULL),
(5, 'ALMACENERO', '0', '0', 'A', '', NULL, NULL, NULL),
(6, 'ASISTENTE CONTABLE', '1', '0', 'A', '', NULL, NULL, NULL),
(7, 'CONTADOR', '1', '0', 'A', '', '2018-03-08 17:07:10', NULL, '2018-03-08 17:07:40'),
(8, 'PROMOTOR DE VENTAS', '1', '0', 'A', '', '2018-03-21 18:30:43', NULL, '2018-03-21 18:32:16'),
(9, 'ESTIBADOR', '0', '0', 'A', NULL, NULL, NULL, NULL),
(10, 'CHOFER', '0', '0', 'I', NULL, NULL, NULL, NULL),
(11, 'RECEPCIONISTA', '1', '0', 'A', NULL, NULL, NULL, NULL),
(12, 'DUEÑO', '1', '1', 'A', NULL, NULL, NULL, NULL),
(13, 'SEGURIDAD', '0', '0', 'A', NULL, NULL, NULL, NULL),
(14, 'COBRADOR', '1', '0', 'A', NULL, NULL, NULL, NULL),
(15, 'PREVENTISTA', '0', '0', 'A', NULL, NULL, NULL, NULL),
(16, 'JEFE DE VENTAS', '1', '1', 'A', NULL, NULL, NULL, NULL),
(17, 'ASISTENTE ADMINISTRATIVO', '1', '0', 'A', NULL, NULL, NULL, NULL),
(18, 'JEFE DE INFORMATICA', '1', '1', 'A', NULL, NULL, NULL, NULL),
(19, 'PRACTICANTE CONTABLE', '1', '0', 'A', NULL, NULL, NULL, NULL),
(20, 'PRACTICANTE ADMINISTRATIVO', '0', '0', 'A', NULL, NULL, NULL, NULL),
(21, 'CLIENTE', '1', '0', 'A', NULL, NULL, NULL, NULL),
(22, 'PROVEEDOR', '1', '0', 'A', NULL, NULL, NULL, NULL),
(23, 'OTROS', '0', '0', 'A', NULL, NULL, NULL, NULL),
(31, 'PRACTICANTE DE CONTABILIDAD', '1', '0', 'A', 'YVELASQUEZ', '2021-02-10 09:39:10', NULL, NULL),
(32, 'Diseñador Grafico', '0', '0', 'A', 'YVELASQUEZ', '2021-02-23 11:13:23', NULL, NULL),
(33, 'Asistente de redes', '1', '0', 'A', 'YVELASQUEZ', '2021-02-23 11:50:34', NULL, NULL),
(34, 'CHOFER DE REPARTO', '0', '0', 'A', 'yovana', '2021-03-05 08:39:07', NULL, NULL),
(35, 'CHOFER MERCADERIA', '0', '0', 'A', 'yovana', '2021-03-05 09:04:45', NULL, NULL),
(36, 'CHOFER DE REPARTO CENTRAL ', '0', '0', 'A', 'YVELASQUEZ', '2021-03-05 11:44:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `IdSede` int(10) NOT NULL,
  `CodigoSede` varchar(4) NOT NULL,
  `NombreSede` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `EstadoSede` varchar(1) NOT NULL,
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `MaquinaRegistro` varchar(50) NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `MaquinaModificacion` varchar(50) NOT NULL,
  `UsuarioEliminacion` varchar(50) DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `MaquinaEliminacion` varchar(50) NOT NULL,
  `IdEmpresa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`IdSede`, `CodigoSede`, `NombreSede`, `Direccion`, `EstadoSede`, `UsuarioRegistro`, `FechaRegistro`, `MaquinaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `MaquinaModificacion`, `UsuarioEliminacion`, `FechaEliminacion`, `MaquinaEliminacion`, `IdEmpresa`) VALUES
(1, 'SC01', 'Sede Central', 'Avenida San Martin 1102', 'A', 'YVELASQUEZ', '2021-02-02 11:04:08', 'DESKTOP-78LP8J4', 'YVELASQUEZ', '2021-02-03 10:04:32', 'DESKTOP-78LP8J4', NULL, NULL, '', 1),
(2, 'ALM1', 'Almacen Central', 'Av. Las Palmeras 580', 'A', 'YVELASQUEZ', '2021-02-03 10:02:34', 'DESKTOP-78LP8J4', 'YVELASQUEZ', '2021-02-03 10:04:47', 'DESKTOP-78LP8J4', NULL, NULL, '', 1),
(3, 'SP00', 'Sucursal Prueba', 'Av. Ribown 345', 'A', 'YVELASQUEZ', '2021-02-03 10:18:05', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, '', 1),
(4, 'AL02', 'Almacen Secundario', 'Urb. Villa los Andes #40', 'A', 'yovana', '2021-03-03 11:27:00', 'LAPTOP-MKOKFC3V', 'yovana', '2021-03-03 11:27:20', 'LAPTOP-MKOKFC3V', 'yovana', '2021-03-03 11:27:14', 'LAPTOP-MKOKFC3V', 1),
(5, 'SE02', 'Sede Prueba', 'Urb. Los Andes #48', 'I', 'yovana', '2021-03-03 11:39:20', 'LAPTOP-MKOKFC3V', 'yovana', '2021-03-03 11:39:32', 'LAPTOP-MKOKFC3V', 'yovana', '2021-03-03 11:39:36', 'LAPTOP-MKOKFC3V', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subfamiliaproducto`
--

CREATE TABLE `subfamiliaproducto` (
  `IdFamiliaProducto` int(10) NOT NULL,
  `IdSubFamiliaProducto` int(10) NOT NULL,
  `NombreSubFamiliaProducto` varchar(250) NOT NULL,
  `EstadoSubFamiliaProducto` varchar(1) NOT NULL,
  `EstadoNoEspecificado` varchar(1) NOT NULL COMMENT '1 : Indica que es No Especificado , 0 : Indica que no es No Especificado',
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `MaquinaRegistro` varchar(50) NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `MaquinaModificacion` varchar(50) NOT NULL,
  `UsuarioEliminacion` varchar(50) DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `MaquinaEliminacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subfamiliaproducto`
--

INSERT INTO `subfamiliaproducto` (`IdFamiliaProducto`, `IdSubFamiliaProducto`, `NombreSubFamiliaProducto`, `EstadoSubFamiliaProducto`, `EstadoNoEspecificado`, `UsuarioRegistro`, `FechaRegistro`, `MaquinaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `MaquinaModificacion`, `UsuarioEliminacion`, `FechaEliminacion`, `MaquinaEliminacion`) VALUES
(0, 0, 'NO ESPECIFICADO', '1', '1', 'Yovana', '2021-01-13 22:06:08', 'PC-LENOVO', NULL, NULL, '', NULL, NULL, ''),
(1, 1, 'Condensadores de Gutapercha', '1', '0', 'yovana', '2020-12-01 12:52:45', 'PC-LENOVO', NULL, NULL, '', NULL, NULL, ''),
(1, 2, 'Cortadores para Endodoncia', '1', '0', 'yovana', '2020-12-01 12:52:45', 'PC-LENOVO', NULL, NULL, '', NULL, NULL, ''),
(1, 3, 'Limas de endodoncia', '1', '0', 'yoavana', '2020-12-01 12:52:45', 'PC-LENNOVO', NULL, NULL, '', NULL, NULL, ''),
(2, 4, 'Bisturís Microcirugía', '1', '0', 'yovana', '2020-12-01 12:52:45', 'PC-MAC', NULL, NULL, '', NULL, NULL, ''),
(2, 5, 'Cinceles Cirugía Dental', '1', '0', 'yovana', '2021-01-31 22:14:35', 'PC-MB', NULL, NULL, '', NULL, NULL, ''),
(2, 6, 'Disectores Cirugía Oral\r\n', '1', '0', 'Yovana', '2021-01-14 22:15:30', 'PC-PRI', NULL, NULL, '', NULL, NULL, ''),
(3, 7, 'Cemento de oxifosfato', '1', '0', 'YOVANA', '2021-01-13 22:16:26', 'PC-UI', NULL, NULL, '', NULL, NULL, ''),
(3, 8, 'Cementos de Resina ', '1', '0', 'Yovana', '2021-01-13 22:17:41', 'PC-VH', NULL, NULL, '', NULL, NULL, ''),
(3, 9, 'Cementos Provisionales', '1', '0', 'Yovana', '2021-01-13 22:18:31', 'PC-UI', NULL, NULL, '', NULL, NULL, ''),
(4, 10, 'Coronas Dentales', '1', '0', 'Yok', '2021-01-26 22:19:25', 'PC-LH', NULL, NULL, '', NULL, NULL, ''),
(4, 11, 'Pernos Dentales', '1', '0', 'yovana', '2021-01-20 22:20:36', 'PC-LH', NULL, NULL, '', NULL, NULL, ''),
(5, 12, 'Accesorios para implantes de conexión externa', '1', '0', 'Yovana', '2021-01-27 22:21:40', 'Pc-UH', NULL, NULL, '', NULL, NULL, ''),
(5, 13, 'Aditamentos para Implantología Dental', '1', '0', 'Yovana', '2021-01-13 22:22:47', 'PC-TR', NULL, NULL, '', NULL, NULL, ''),
(6, 14, 'Jeringas Aire / Agua', '1', '0', 'Yovana', '2021-01-13 22:23:46', 'PC-AF', NULL, NULL, '', NULL, NULL, ''),
(6, 15, 'Gasas para clínica dental', '1', '0', 'Yovana', '2021-01-13 22:25:18', 'PC-LENNO', NULL, NULL, '', NULL, NULL, ''),
(1, 16, 'Clamps', '1', '0', 'Yovana', '2020-12-01 12:52:45', 'PC-LENOVO', NULL, NULL, '', NULL, NULL, ''),
(9, 116, 'NO ESPECIFICADO', '1', '1', 'YVELASQUEZ', '2021-01-26 10:36:59', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(9, 117, 'Composite Estético', '1', '0', 'YVELASQUEZ', '2021-01-26 10:37:24', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(9, 118, 'Composite Fluido', '1', '0', 'YVELASQUEZ', '2021-01-26 10:51:22', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(10, 119, 'NO ESPECIFICADO', '1', '1', 'YVELASQUEZ', '2021-01-26 11:33:53', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(10, 120, 'Copas Profilaxis', '1', '0', 'YVELASQUEZ', '2021-01-26 11:37:15', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(11, 121, 'NO ESPECIFICADO', '1', '1', 'YVELASQUEZ', '2021-01-27 13:16:58', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(12, 122, 'NO ESPECIFICADO', '1', '1', 'YVELASQUEZ', '2021-01-30 13:52:39', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(14, 123, 'NO ESPECIFICADO', '1', '1', 'HP', '2021-03-18 16:35:17', 'LAPTOP-4LG4GP91', NULL, NULL, '', NULL, NULL, ''),
(3, 124, 'CEMENTO PROVISIONAL', '1', '0', 'HP', '2021-03-19 05:12:03', 'LAPTOP-4LG4GP91', NULL, NULL, '', NULL, NULL, ''),
(15, 125, ' PROTESIS ', '1', '0', 'HP', '2021-03-19 09:49:07', 'LAPTOP-4LG4GP91', NULL, NULL, '', NULL, NULL, ''),
(16, 126, 'NO ESPECIFICADO', '1', '1', 'YVELASQUEZ', '2021-03-25 14:34:06', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(16, 127, 'JERINGAS DE ANESTESIA', '1', '0', 'YVELASQUEZ', '2021-03-25 14:34:06', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, ''),
(4, 128, 'CORONAS TEMPORALES', '1', '0', 'YVELASQUEZ', '2021-03-25 14:34:07', 'DESKTOP-78LP8J4', NULL, NULL, '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoactivo`
--

CREATE TABLE `tipoactivo` (
  `IdTipoActivo` int(10) NOT NULL,
  `NombreTipoActivo` varchar(250) NOT NULL,
  `EstadoTipoActivo` varchar(1) NOT NULL,
  `EstadoNoEspecificado` varchar(1) NOT NULL COMMENT '1 : Indica que es No Especificado , 0 : Indica que no es No Especificado',
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `MaquinaRegistro` varchar(50) NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `MaquinaModificacion` varchar(50) NOT NULL,
  `UsuarioEliminacion` varchar(50) DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `MaquinaEliminacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoactivo`
--

INSERT INTO `tipoactivo` (`IdTipoActivo`, `NombreTipoActivo`, `EstadoTipoActivo`, `EstadoNoEspecificado`, `UsuarioRegistro`, `FechaRegistro`, `MaquinaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `MaquinaModificacion`, `UsuarioEliminacion`, `FechaEliminacion`, `MaquinaEliminacion`) VALUES
(0, 'NO ESPECIFICADO', '1', '1', 'MEGAN', '2021-01-07 09:13:53', '', NULL, NULL, '', NULL, NULL, ''),
(1, 'COMPUTADORAS', '1', '0', 'Yovana', '2020-12-01 12:52:45', 'PC-LENOVO', NULL, NULL, '', NULL, NULL, ''),
(2, 'VEHICULOS ', '1', '0', 'yovana', '2020-12-01 12:52:45', '', NULL, NULL, '', NULL, NULL, ''),
(3, 'MAQUINARIAS ', '1', '0', 'yoavana', '2020-12-01 12:52:45', 'PC-LENNOVO', NULL, NULL, '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocambio`
--

CREATE TABLE `tipocambio` (
  `IdTipoCambio` int(10) NOT NULL,
  `FechaCambio` date NOT NULL,
  `TipoCambioCompra` decimal(8,3) DEFAULT NULL,
  `TipoCambioVenta` decimal(8,3) NOT NULL,
  `IdMonedaOrigen` int(10) NOT NULL,
  `IndicadorEstado` varchar(1) CHARACTER SET latin1 NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioRegistro` varchar(50) CHARACTER SET latin1 NOT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `UsuarioModificacion` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `IdMonedaDestino` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tipocambio`
--

INSERT INTO `tipocambio` (`IdTipoCambio`, `FechaCambio`, `TipoCambioCompra`, `TipoCambioVenta`, `IdMonedaOrigen`, `IndicadorEstado`, `FechaRegistro`, `UsuarioRegistro`, `FechaModificacion`, `UsuarioModificacion`, `IdMonedaDestino`) VALUES
(1, '2020-12-20', '3.591', '3.600', 1, 'I', '2020-12-20 13:52:45', 'Yovana', '2021-01-05 11:25:14', 'YVELASQUEZ', 3),
(2, '2020-12-20', '4.400', '4.400', 1, 'A', '2020-12-01 12:52:45', 'yovana', NULL, NULL, 2),
(5, '2020-12-22', '3.593', '3.597', 1, 'A', '2020-12-22 08:57:38', 'yovana', NULL, NULL, 3),
(6, '2020-12-22', '0.005', '0.005', 1, 'A', '2020-12-22 08:57:51', 'yovana', NULL, NULL, 4),
(7, '2021-01-04', '3.624', '3.628', 1, 'A', '2021-01-05 11:24:51', 'YVELASQUEZ', NULL, NULL, 3),
(8, '2021-01-04', '4.306', '4.557', 1, 'A', '2021-01-05 12:26:44', 'YVELASQUEZ', NULL, NULL, 2),
(9, '2021-01-08', '3.610', '3.615', 1, 'A', '2021-01-09 15:09:40', 'YVELASQUEZ', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoconfiguracion`
--

CREATE TABLE `tipoconfiguracion` (
  `IdTipoConfiguracion` int(11) NOT NULL,
  `NombreConfiguracion` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `IndicadorEstado` varchar(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipoconfiguracion`
--

INSERT INTO `tipoconfiguracion` (`IdTipoConfiguracion`, `NombreConfiguracion`, `IndicadorEstado`) VALUES
(1, 'IGV', 'A'),
(2, 'Num_Ceros', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `IdTipoDocumento` int(10) NOT NULL,
  `CodigoTipoDocumento` varchar(2) NOT NULL,
  `NombreAbreviado` varchar(10) NOT NULL,
  `NombreTipoDocumento` varchar(255) NOT NULL,
  `IndicadorEstado` varchar(1) NOT NULL,
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`IdTipoDocumento`, `CodigoTipoDocumento`, `NombreAbreviado`, `NombreTipoDocumento`, `IndicadorEstado`, `UsuarioRegistro`, `FechaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '0', 'OTROS', 'OTROS\r\n', '0', 'FTUYO', '2020-12-07 10:05:52', NULL, NULL, NULL, NULL, NULL),
(2, '1', 'FTa', 'FACTURA', '0', 'FTUYO', '2020-12-07 12:04:18', 'FTUYO', '2020-12-09 08:21:15', NULL, NULL, NULL),
(3, '2', 'RH', 'RECIBO POR HONORARIOS', '1', 'FTUYO', '2020-12-07 12:10:23', 'FTUYO', '2020-12-08 11:33:39', NULL, NULL, NULL),
(5, '4', 'LQ', 'LIQUIDACIÓN DE COMPRA', '1', 'FTUYO', '2020-12-08 09:38:00', NULL, NULL, NULL, NULL, NULL),
(6, '5', 'BTA', 'BOLETOS DE TRANSPORTE AÉREO QUE EMITEN LAS COMPAÑÍAS DE AVIACIÓN COMERCIAL POR EL SERVICIO DE TRANSPORTE AÉREO REGULAR DE PASAJEROS, EMITIDO DE MANERA MANUAL, MECANIZADA O POR MEDIOS ELECTRÓNICOS (BME)', '1', 'FTUYO', '2020-12-08 09:48:15', NULL, NULL, NULL, NULL, NULL),
(7, '7', 'NC', 'NOTA DE CRÉDITO', '1', 'FTUYO', '2020-12-08 10:59:44', NULL, NULL, NULL, NULL, NULL),
(8, '8', 'ND', 'NOTA DE DÉBITO', '0', 'FTUYO', '2020-12-08 11:02:13', NULL, NULL, NULL, NULL, NULL),
(9, '15', 'BT', 'BOLETOS EMITIDOS POR EL SERVICIO DE TRANSPORTE TERRESTRE REGULAR URBANO DE PASAJEROS Y EL FERROVIARIO PÚBLICO DE PASAJEROS PRESTADO EN VÍA FÉRREA LOCAL.', '1', 'FTUYO', '2020-12-08 12:08:37', 'FTUYO', '2020-12-09 08:50:37', NULL, NULL, NULL),
(10, '16', 'BVME', 'BOLETOS DE VIAJE EMITIDOS POR LAS EMPRESAS DE TRANSPORTE NACIONAL DE PASAJEROS, SIEMPRE QUE CUENTEN CON LA AUTORIZACIÓN DE LA AUTORIDAD COMPETENTE, EN LAS RUTAS AUTORIZADAS. VÍA TERRESTRE O FERROVIARIO PÚBLICO NO EMITIDO POR MEDIOS ELECTRÓNICOS (BVME)', '1', 'FTUYO', '2020-12-09 09:07:29', 'FTUYO', '2020-12-09 11:05:13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumentoidentidad`
--

CREATE TABLE `tipodocumentoidentidad` (
  `IdTipoDocumentoIdentidad` int(10) NOT NULL,
  `CodigoDocumentoIdentidad` varchar(2) NOT NULL,
  `NombreTipoDocumentoIdentidad` varchar(50) NOT NULL,
  `NombreAbreviado` varchar(20) NOT NULL,
  `IndicadorEstado` varchar(1) NOT NULL,
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipodocumentoidentidad`
--

INSERT INTO `tipodocumentoidentidad` (`IdTipoDocumentoIdentidad`, `CodigoDocumentoIdentidad`, `NombreTipoDocumentoIdentidad`, `NombreAbreviado`, `IndicadorEstado`, `UsuarioRegistro`, `FechaRegistro`, `UsuarioModificacion`, `FechaModificacion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '0', 'OTROS TIPOS DE DOCUMENTOS', 'OTROS', '0', 'FTUYO', '2020-12-10 09:56:29', 'FTUYO', '2020-12-14 12:01:28', NULL, NULL, NULL),
(2, '1', 'DOCUMENTO NACIONAL DE IDENTIDAD (DNI)', 'DNI', '1', 'FTUYO', '2020-12-10 10:07:31', 'FTUYO', '2020-12-10 11:48:01', NULL, NULL, NULL),
(3, '4', 'CARNET DE EXTRANJERIA', 'CARNET EXT.', '1', 'FTUYO', '2020-12-10 10:08:31', 'FTUYO', '2020-12-14 12:01:53', NULL, NULL, NULL),
(4, '6', 'REGISTRO ÚNICO DE CONTRIBUYENTES.', 'RUC', '1', 'FTUYO', '2020-12-10 10:08:52', 'FTUYO', '2020-12-10 12:23:17', NULL, NULL, NULL),
(5, '7', 'PASAPORTE', 'PASAPORTE', '1', 'FTUYO', '2020-12-10 10:09:05', NULL, NULL, NULL, NULL, NULL),
(6, 'A', 'CÉDULA DIPLOMÁTICA DE IDENTIDAD', 'CED. DIPLOMAT.', '1', 'FTUYO', '2020-12-10 10:09:25', NULL, NULL, NULL, NULL, NULL),
(7, '98', 'aas', 'PE', '1', 'FTUYO', '2020-12-14 11:12:46', 'FTUYO', '2020-12-14 11:44:46', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoexistencia`
--

CREATE TABLE `tipoexistencia` (
  `IdTipoExistencia` int(10) NOT NULL,
  `CodigoTipoExistencia` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `NombreTipoExistencia` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaContable` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `IndicadorEstado` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioRegistro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `UsuarioModificacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipoexistencia`
--

INSERT INTO `tipoexistencia` (`IdTipoExistencia`, `CodigoTipoExistencia`, `NombreTipoExistencia`, `CuentaContable`, `IndicadorEstado`, `FechaRegistro`, `UsuarioRegistro`, `FechaModificacion`, `UsuarioModificacion`) VALUES
(0, '0', 'No Especificado', NULL, '1', '2020-12-08 11:49:18', '', NULL, NULL),
(1, '1', 'MERCADERIA', '-', '1', '2020-12-10 09:00:59', 'yovana', NULL, NULL),
(2, '2', 'PRODUCTOS TERMINADOS', '-', '1', '2020-12-10 09:00:59', 'yovana', NULL, NULL),
(3, '3', 'MATERIAS PRIMAS', '-', '1', '2020-12-10 09:00:59', 'yovana', NULL, NULL),
(4, '4', 'ENVASES', '-', '1', '2020-12-10 09:00:59', 'yovana', NULL, NULL),
(5, '5', 'MATERIALES AUXILIARES', '-', '1', '2020-12-10 09:00:59', 'YOVANA', NULL, NULL),
(6, '6', 'SUMINISTROS', '-', '1', '2020-12-10 09:00:59', 'YOVANA', NULL, NULL),
(7, '7', 'REPUESTOS', '-', '1', '2020-12-10 09:00:59', 'YOVANA', NULL, NULL),
(8, '8', 'EMBALAJES', '-', '1', '2020-12-10 09:00:59', 'YOVANA', NULL, NULL),
(9, '9', 'SUBPRODUCTOS', '-', '1', '2020-12-10 09:00:59', 'YOVANA', '2020-12-13 11:25:20', 'yovana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoinventario`
--

CREATE TABLE `tipoinventario` (
  `IdTipoInventario` int(10) NOT NULL,
  `NombreTipoInventario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `IndicadorEstado` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioRegistro` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `UsuarioModificacion` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipoinventario`
--

INSERT INTO `tipoinventario` (`IdTipoInventario`, `NombreTipoInventario`, `IndicadorEstado`, `FechaRegistro`, `UsuarioRegistro`, `FechaModificacion`, `UsuarioModificacion`) VALUES
(1, 'Inventario Inicial', '1', '2020-12-01 12:52:45', 'Yovana', NULL, NULL),
(2, 'Ajuste de Inventario', '1', '2020-12-01 12:52:45', 'yovana', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipooperacion`
--

CREATE TABLE `tipooperacion` (
  `IdTipoOperacion` int(10) NOT NULL,
  `CodigoTipoOperacion` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CodigoSUNAT` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NombreTipoOperacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `IndicadorEstado` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `UsuarioRegistro` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `UsuarioModificacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipooperacion`
--

INSERT INTO `tipooperacion` (`IdTipoOperacion`, `CodigoTipoOperacion`, `CodigoSUNAT`, `NombreTipoOperacion`, `IndicadorEstado`, `UsuarioRegistro`, `UsuarioModificacion`, `FechaRegistro`, `FechaModificacion`) VALUES
(1, '1', '101', 'VENTA INTERNA', '1', 'yovana', NULL, '2020-12-10 09:00:59', NULL),
(2, '2', '200', 'EXPORTACION', '1', 'yovana', NULL, '2020-12-10 09:00:59', NULL),
(3, '3', '112', 'DEDUCCIONES RENTA', '1', 'yovana', NULL, '2020-12-10 09:00:59', NULL),
(4, '4', '2001', 'PERCEPCION', '1', 'yovana', NULL, '2020-12-10 09:00:59', NULL),
(5, '5', '90', 'prueba2', '0', 'yovana', 'yovana', '2020-12-10 11:10:14', '2020-12-10 11:31:19'),
(6, '10', '3', 'abcde', '1', 'yovana', 'yovana', '2020-12-12 06:20:58', '2020-12-12 09:20:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopersona`
--

CREATE TABLE `tipopersona` (
  `IdTipoPersona` int(10) NOT NULL,
  `NombreTipoPersona` varchar(50) NOT NULL,
  `IndicadorEstado` varchar(1) NOT NULL,
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipopersona`
--

INSERT INTO `tipopersona` (`IdTipoPersona`, `NombreTipoPersona`, `IndicadorEstado`, `UsuarioRegistro`, `FechaRegistro`, `UsuarioModificacion`, `FechaModificacion`) VALUES
(1, 'P. Juridica', 'A', 'Yovana', '2020-12-01 12:52:45', 'yovana', '2020-12-17 10:16:57'),
(2, 'P. Natural', 'A', 'yovana', '2020-12-01 12:52:45', NULL, NULL),
(3, 'No Domiciliado', 'A', 'yoavana', '2020-12-01 12:52:45', NULL, NULL),
(9, 'P. Nueva', 'A', 'YVELASQUEZ', '2021-02-09 11:58:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoprecio`
--

CREATE TABLE `tipoprecio` (
  `IdTipoPrecio` int(10) NOT NULL,
  `CodigoTipoPrecio` varchar(2) DEFAULT NULL,
  `NombreTipoPrecio` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catálogo 16';

--
-- Volcado de datos para la tabla `tipoprecio`
--

INSERT INTO `tipoprecio` (`IdTipoPrecio`, `CodigoTipoPrecio`, `NombreTipoPrecio`) VALUES
(1, '01', 'Precio unitario (incluye el IGV)'),
(2, '02', 'Valor referencial unitario en operaciones no onerosas (Gratuitas)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `IdTipoProducto` int(10) NOT NULL,
  `NombreTipoProducto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`IdTipoProducto`, `NombreTipoProducto`) VALUES
(1, 'BIEN'),
(2, 'SERVICIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposervicio`
--

CREATE TABLE `tiposervicio` (
  `IdTipoServicio` int(10) NOT NULL,
  `NombreTipoServicio` varchar(250) NOT NULL,
  `IndicadorEstado` varchar(1) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `UsuarioRegistro` varchar(50) NOT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiposervicio`
--

INSERT INTO `tiposervicio` (`IdTipoServicio`, `NombreTipoServicio`, `IndicadorEstado`, `FechaRegistro`, `UsuarioRegistro`, `FechaModificacion`, `UsuarioModificacion`) VALUES
(0, 'NO ESPECIFICADO', '1', '2020-12-01 12:52:45', 'Yovana', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportista`
--

CREATE TABLE `transportista` (
  `IdTransportista` int(10) NOT NULL,
  `NumeroConstanciaInscripcion` varchar(50) DEFAULT NULL,
  `NumeroLicenciaConducir` varchar(50) DEFAULT NULL,
  `EstadoTransportista` char(1) DEFAULT NULL,
  `UsuarioRegistro` varchar(50) DEFAULT NULL,
  `UsuarioModificacion` varchar(50) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `MaquinaModificacion` varchar(60) DEFAULT NULL,
  `UsuarioEliminacion` varchar(60) DEFAULT NULL,
  `MaquinaEliminacion` varchar(60) DEFAULT NULL,
  `FechaEliminacion` datetime DEFAULT NULL,
  `MaquinaRegistro` varchar(60) DEFAULT NULL,
  `IdPersona` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transportista`
--

INSERT INTO `transportista` (`IdTransportista`, `NumeroConstanciaInscripcion`, `NumeroLicenciaConducir`, `EstadoTransportista`, `UsuarioRegistro`, `UsuarioModificacion`, `FechaRegistro`, `FechaModificacion`, `MaquinaModificacion`, `UsuarioEliminacion`, `MaquinaEliminacion`, `FechaEliminacion`, `MaquinaRegistro`, `IdPersona`) VALUES
(1, '151125891', 'D43920816', '1', 'Yovana', 'YVELASQUEZ', '2021-01-13 22:06:08', '2021-03-05 10:28:59', 'DESKTOP-78LP8J4', 'YVELASQUEZ', 'DESKTOP-78LP8J4', '2021-03-05 10:27:36', NULL, 15),
(2, '0674456', 'XY79501', '1', 'yovana', NULL, '2021-03-05 04:24:34', NULL, NULL, NULL, NULL, NULL, 'LAPTOP-MKOKFC3V', 16),
(22, '0114251', 'TTF07519', '1', 'yovana', 'yovana', '2021-03-05 08:27:19', '2021-03-05 08:29:50', 'LAPTOP-MKOKFC3V', NULL, NULL, NULL, 'LAPTOP-MKOKFC3V', 14),
(23, '0114223', 'AZF07510', '1', 'yovana', NULL, '2021-03-05 08:39:21', NULL, NULL, NULL, NULL, NULL, 'LAPTOP-MKOKFC3V', 17),
(24, '3245527', 'TTF0712', '1', 'yovana', 'yovana', '2021-03-05 08:51:11', '2021-03-05 09:00:25', 'LAPTOP-MKOKFC3V', NULL, NULL, NULL, 'LAPTOP-MKOKFC3V', 18),
(25, '0078579', 'XY79570', '1', 'YVELASQUEZ', 'YVELASQUEZ', '2021-03-05 11:45:56', '2021-03-05 11:55:05', 'DESKTOP-78LP8J4', 'YVELASQUEZ', 'DESKTOP-78LP8J4', '2021-03-05 11:54:59', 'DESKTOP-78LP8J4', 20),
(26, '9076579', 'PO79768', '1', 'YVELASQUEZ', 'YVELASQUEZ', '2021-03-05 11:51:38', '2021-03-05 11:54:10', 'DESKTOP-78LP8J4', NULL, NULL, NULL, 'DESKTOP-78LP8J4', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadmedida`
--

CREATE TABLE `unidadmedida` (
  `IdUnidadMedida` int(10) NOT NULL,
  `CodigoUnidadMedidaSunat` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `NombreUnidadMedida` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `AbreviaturaUnidadMedida` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `IndicadorEstado` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `UsuarioRegistro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FechaModificacion` datetime DEFAULT NULL,
  `UsuarioModificacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NombreUnidadComercial` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `AbreviaturaComercial` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `unidadmedida`
--

INSERT INTO `unidadmedida` (`IdUnidadMedida`, `CodigoUnidadMedidaSunat`, `NombreUnidadMedida`, `AbreviaturaUnidadMedida`, `IndicadorEstado`, `FechaRegistro`, `UsuarioRegistro`, `FechaModificacion`, `UsuarioModificacion`, `NombreUnidadComercial`, `AbreviaturaComercial`) VALUES
(1, '4A', 'BOBINA', 'BOB', '1', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'BOBINA', 'BOB'),
(2, 'BJ', 'BALDE', 'BDE', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'BALDE', 'BDE'),
(3, 'BLL', 'BARRIL', 'BRR', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'BARRIL', 'BRR'),
(4, 'BG', 'BOLSA', 'BLS', '1', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'BOLSA', 'BLS'),
(5, 'BO', 'BOTELLA', 'BOT', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'BOTELLA', 'BOT'),
(6, 'BX', 'CAJA', 'CJA', '1', '2020-12-08 04:13:48', 'yovana', '2020-12-30 09:19:35', 'yovana', 'CAJA(S)', 'CJA(S)'),
(7, 'CT', 'CARTON', 'CT', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'CARTON', 'CT'),
(8, 'CMK', 'CENTIMETRO CUADRADO', 'CM2', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'CENTIMETRO CUADRADO', 'CM2'),
(9, 'CMQ', 'CENTIMETRO CUBICO', 'CM3', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'CENTIMETRO CUBICO', 'CM3'),
(10, 'CMT', 'CENTIMETRO LINEAL', 'CML', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'CENTIMETRO LINEAL', 'CML'),
(11, 'CEN', 'CIENTO DE UNIDADES', 'CTO', '1', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'CIENTO DE UNIDADES', 'CTO'),
(12, 'CY', 'CILINDRO', 'CLD', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'CILINDRO', 'CLD'),
(13, 'CJ', 'CONO', 'CON', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'CONO', 'CON'),
(14, 'DZN', 'DOCENA', 'DOC', '1', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'DOCENA', 'DOC'),
(15, 'DZP', 'DOCENA POR 10**6', 'DZP', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'DOCENA POR 10**6', 'DZP'),
(16, 'BE', 'FARDO', 'FARD', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'FARDO', 'FARD'),
(17, 'GLI', 'GALON INGLES (4,545956L)', 'GLI', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'GALON INGLES (4,545956L)', 'GLI'),
(18, 'GRM', 'GRAMO', 'GR', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'GRAMO', 'GR'),
(19, 'GRO', 'GRUESA', 'GRU', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'GRUESA', 'GRU'),
(20, 'HLT', 'HECTOLITRO', 'HLT', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'HECTOLITRO', 'HLT'),
(21, 'LEF', 'HOJA', 'HJA', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'HOJA', 'HJA'),
(22, 'SET', 'JUEGO', 'JGO', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'JUEGO', 'JGO'),
(23, 'KGM', 'KILOGRAMO', 'KG', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'KILOGRAMO', 'KG'),
(24, 'KTM', 'KILOMETRO', 'KM', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'KILOMETRO', 'KM'),
(25, 'KWH', 'KILOVATIO HORA', 'KWH', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'KILOVATIO HORA', 'KWH'),
(26, 'KT', 'KIT', 'KIT', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'KIT', 'KIT'),
(27, 'CA', 'LATA', 'LTA', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'LATA', 'LTA'),
(28, 'LBR', 'LIBRA', 'LBR', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'LIBRA', 'LBR'),
(29, 'LTR', 'LITRO', 'LTRO', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'LITRO', 'LTRO'),
(30, 'MWH', 'MEGAWATT HORA', 'MWH', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'MEGAWATT HORA', 'MWH'),
(31, 'MTR', 'METRO', 'MT', '1', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'METRO', 'MT'),
(32, 'MTK', 'METRO CUADRADO', 'MT2', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'METRO CUADRADO', 'MT2'),
(33, 'MTQ', 'METRO CUBICO', 'MT3', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'METRO CUBICO', 'MT3'),
(34, 'MGM', 'MILIGRAMO', 'MG', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'MILIGRAMO', 'MG'),
(35, 'MLT', 'MILILITRO', 'ML', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'MILILITRO', 'ML'),
(36, 'MMT', 'MILIMETRO', 'MM', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'MILIMETRO', 'MM'),
(37, 'MMK', 'MILIMETRO CUADRADO', 'MM2', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'MILIMETRO CUADRADO', 'MM2'),
(38, 'MMQ', 'MILIMETRO CUBICO', 'MM3', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'MILIMETRO CUBICO', 'MM3'),
(39, 'MIL', 'MILLAR', 'MILL', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'MILLAR', 'MILL'),
(40, 'UM', 'MILLON DE UNIDADES', 'UM', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'MILLON DE UNIDADES', 'UM'),
(41, 'ONZ', 'ONZA', 'ONZ', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'ONZA', 'ONZ'),
(42, 'PF', 'PALETA', 'PTA', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'PALETA', 'PTA'),
(43, 'PK', 'PAQUETE', 'PAQ', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'PAQUETE', 'PAQ'),
(44, 'PR', 'PAR', 'PAR', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'PAR', 'PAR'),
(45, 'FOT', 'PIE', 'PIE', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'PIE', 'PIE'),
(46, 'FTK', 'PIE CUADRADO', 'PIE2', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'PIE CUADRADO', 'PIE2'),
(47, 'FTQ', 'PIE CUBICO', 'PIE3', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'PIE CUBICO', 'PIE3'),
(48, 'C62', 'PIEZA', 'PZA', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'PIEZA', 'PZA'),
(49, 'PG', 'PLACA', 'PCA', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'PLACA', 'PCA'),
(50, 'ST', 'PLIEGO', 'PLGO', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'PLIEGO', 'PLGO'),
(51, 'INH', 'PULGADA', 'PGDA', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'PULGADA', 'PGDA'),
(52, 'RM', 'RESMA', 'RSMA', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'RESMA', 'RSMA'),
(53, 'DR', 'TAMBOR', 'TB', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'TAMBOR', 'TB'),
(54, 'STN', 'TONELADA CORTA', 'TNC', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'TONELADA CORTA', 'TNC'),
(55, 'LTN', 'TONELADA LARGA', 'TNL', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'TONELADA LARGA', 'TNL'),
(56, 'TNE', 'TONELADA', 'TN', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'TONELADA', 'TN'),
(57, 'TU', 'TUBO', 'TU', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'TUBO', 'TU'),
(58, 'NIU', 'UNIDAD', 'UND', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'UNIDAD', 'UND'),
(59, 'GLL', 'US GALON (3,7843 L)', 'GL', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'US GALON (3,7843 L)', 'GL'),
(60, 'YRD', 'YARDA', 'YRD', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'YARDA', 'YRD'),
(61, 'YDK', 'YARDA CUADRADA', 'YRD2', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'YARDA CUADRADA', 'YRD2'),
(66, 'ZZ', 'Unidad (servicio)', 'SER', '0', '2020-12-08 04:13:48', 'yovana', NULL, NULL, 'Unidad (servicio)', 'SER');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atributo`
--
ALTER TABLE `atributo`
  ADD PRIMARY KEY (`IdAtributo`);

--
-- Indices de la tabla `categoriaproducto`
--
ALTER TABLE `categoriaproducto`
  ADD PRIMARY KEY (`IdCategoriaProducto`);

--
-- Indices de la tabla `configuraciongeneral`
--
ALTER TABLE `configuraciongeneral`
  ADD PRIMARY KEY (`IdConfiguracionGeneral`),
  ADD KEY `IdTipoConfiguracion` (`IdTipoConfiguracion`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`IdDepartamento`);

--
-- Indices de la tabla `detallekitproducto`
--
ALTER TABLE `detallekitproducto`
  ADD PRIMARY KEY (`IdDetalleKitProducto`),
  ADD KEY `IdKitProducto` (`IdKitProducto`),
  ADD KEY `IdPrecioUnidadMedida` (`IdPrecioUnidadMedida`);

--
-- Indices de la tabla `direccionpersona`
--
ALTER TABLE `direccionpersona`
  ADD PRIMARY KEY (`IdDireccionPersona`) USING BTREE,
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`IdDistrito`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`IdEmpleado`),
  ADD KEY `FK_empleado_sede` (`IdSede`),
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`IdEmpresa`);

--
-- Indices de la tabla `estadocivil`
--
ALTER TABLE `estadocivil`
  ADD PRIMARY KEY (`IdEstadoCivil`);

--
-- Indices de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`IdFabricante`);

--
-- Indices de la tabla `familiaproducto`
--
ALTER TABLE `familiaproducto`
  ADD PRIMARY KEY (`IdFamiliaProducto`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`IdGenero`);

--
-- Indices de la tabla `gironegocio`
--
ALTER TABLE `gironegocio`
  ADD PRIMARY KEY (`IdGiroNegocio`);

--
-- Indices de la tabla `grupoparametro`
--
ALTER TABLE `grupoparametro`
  ADD PRIMARY KEY (`IdGrupoParametro`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`IdInventario`) USING BTREE,
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdUnidadMedida` (`IdUnidadMedida`),
  ADD KEY `IdResumenInventario` (`IdResumenInventario`);

--
-- Indices de la tabla `kitproducto`
--
ALTER TABLE `kitproducto`
  ADD PRIMARY KEY (`IdKitProducto`),
  ADD KEY `IdFamiliaProducto` (`IdFamiliaProducto`),
  ADD KEY `IdUnidadMedida` (`IdUnidadMedida`),
  ADD KEY `IdTipoPrecio` (`IdTipoPrecio`),
  ADD KEY `IdMarca` (`IdMarca`);

--
-- Indices de la tabla `lineaproducto`
--
ALTER TABLE `lineaproducto`
  ADD PRIMARY KEY (`IdLineaProducto`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`IdMarca`);

--
-- Indices de la tabla `modelomarca`
--
ALTER TABLE `modelomarca`
  ADD PRIMARY KEY (`IdModeloMarca`),
  ADD KEY `IdMarca` (`IdMarca`);

--
-- Indices de la tabla `modulosistema`
--
ALTER TABLE `modulosistema`
  ADD PRIMARY KEY (`IdModuloSistema`);

--
-- Indices de la tabla `moneda`
--
ALTER TABLE `moneda`
  ADD PRIMARY KEY (`IdMoneda`) USING BTREE;

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`IdPais`);

--
-- Indices de la tabla `parametrosistema`
--
ALTER TABLE `parametrosistema`
  ADD PRIMARY KEY (`IdParametroSistema`),
  ADD KEY `FK_ParametroSistema_entidadsistema` (`IdEntidadSistema`),
  ADD KEY `FK_parametrosistema_grupoparametro` (`IdGrupoParametro`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`IdPersona`),
  ADD KEY `fk_persona_tipopersona` (`IdTipoPersona`),
  ADD KEY `fk_persona_tipodocumento` (`IdTipoDocumentoIdentidad`),
  ADD KEY `FK_persona_rol` (`IdRol`),
  ADD KEY `IdEstadoCivil` (`IdEstadoCivil`),
  ADD KEY `IdGenero` (`IdGenero`);

--
-- Indices de la tabla `preciounidadmedida`
--
ALTER TABLE `preciounidadmedida`
  ADD PRIMARY KEY (`IdPrecioUnidadMedida`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdUnidadMedida` (`IdUnidadMedida`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdCategoriaProducto` (`IdCategoriaProducto`),
  ADD KEY `IdTipoProducto` (`IdTipoProducto`),
  ADD KEY `IdTipoExistencia` (`IdTipoExistencia`),
  ADD KEY `IdTipoServicio` (`IdTipoServicio`),
  ADD KEY `IdTipoActivo` (`IdTipoActivo`),
  ADD KEY `IdFamiliaProducto` (`IdFamiliaProducto`),
  ADD KEY `IdSubFamiliaProducto` (`IdSubFamiliaProducto`),
  ADD KEY `IdMarca` (`IdMarca`),
  ADD KEY `IdModeloMarca` (`IdModeloMarca`),
  ADD KEY `IdLineaProducto` (`IdLineaProducto`),
  ADD KEY `IdFabricante` (`IdFabricante`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`IdProvincia`);

--
-- Indices de la tabla `regimentributario`
--
ALTER TABLE `regimentributario`
  ADD PRIMARY KEY (`IdRegimenTributario`);

--
-- Indices de la tabla `resumeninventario`
--
ALTER TABLE `resumeninventario`
  ADD PRIMARY KEY (`IdResumenInventario`),
  ADD KEY `IdTipoInventario` (`IdTipoInventario`),
  ADD KEY `IdSede` (`IdSede`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`IdSede`),
  ADD KEY `IdEmpresa` (`IdEmpresa`);

--
-- Indices de la tabla `subfamiliaproducto`
--
ALTER TABLE `subfamiliaproducto`
  ADD PRIMARY KEY (`IdSubFamiliaProducto`),
  ADD KEY `IdFamiliaProducto` (`IdFamiliaProducto`);

--
-- Indices de la tabla `tipoactivo`
--
ALTER TABLE `tipoactivo`
  ADD PRIMARY KEY (`IdTipoActivo`);

--
-- Indices de la tabla `tipocambio`
--
ALTER TABLE `tipocambio`
  ADD PRIMARY KEY (`IdTipoCambio`),
  ADD KEY `IdMonedaOrigen` (`IdMonedaOrigen`),
  ADD KEY `IdMonedaDestino` (`IdMonedaDestino`);

--
-- Indices de la tabla `tipoconfiguracion`
--
ALTER TABLE `tipoconfiguracion`
  ADD PRIMARY KEY (`IdTipoConfiguracion`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`IdTipoDocumento`);

--
-- Indices de la tabla `tipodocumentoidentidad`
--
ALTER TABLE `tipodocumentoidentidad`
  ADD PRIMARY KEY (`IdTipoDocumentoIdentidad`);

--
-- Indices de la tabla `tipoexistencia`
--
ALTER TABLE `tipoexistencia`
  ADD PRIMARY KEY (`IdTipoExistencia`);

--
-- Indices de la tabla `tipoinventario`
--
ALTER TABLE `tipoinventario`
  ADD PRIMARY KEY (`IdTipoInventario`);

--
-- Indices de la tabla `tipooperacion`
--
ALTER TABLE `tipooperacion`
  ADD PRIMARY KEY (`IdTipoOperacion`);

--
-- Indices de la tabla `tipopersona`
--
ALTER TABLE `tipopersona`
  ADD PRIMARY KEY (`IdTipoPersona`);

--
-- Indices de la tabla `tipoprecio`
--
ALTER TABLE `tipoprecio`
  ADD PRIMARY KEY (`IdTipoPrecio`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`IdTipoProducto`);

--
-- Indices de la tabla `tiposervicio`
--
ALTER TABLE `tiposervicio`
  ADD PRIMARY KEY (`IdTipoServicio`);

--
-- Indices de la tabla `transportista`
--
ALTER TABLE `transportista`
  ADD PRIMARY KEY (`IdTransportista`),
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  ADD PRIMARY KEY (`IdUnidadMedida`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atributo`
--
ALTER TABLE `atributo`
  MODIFY `IdAtributo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuraciongeneral`
--
ALTER TABLE `configuraciongeneral`
  MODIFY `IdConfiguracionGeneral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `IdDepartamento` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `detallekitproducto`
--
ALTER TABLE `detallekitproducto`
  MODIFY `IdDetalleKitProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccionpersona`
--
ALTER TABLE `direccionpersona`
  MODIFY `IdDireccionPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `IdDistrito` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1876;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `IdEmpleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `IdEmpresa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estadocivil`
--
ALTER TABLE `estadocivil`
  MODIFY `IdEstadoCivil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `IdFabricante` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `familiaproducto`
--
ALTER TABLE `familiaproducto`
  MODIFY `IdFamiliaProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `IdGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `gironegocio`
--
ALTER TABLE `gironegocio`
  MODIFY `IdGiroNegocio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `grupoparametro`
--
ALTER TABLE `grupoparametro`
  MODIFY `IdGrupoParametro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `IdInventario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `kitproducto`
--
ALTER TABLE `kitproducto`
  MODIFY `IdKitProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lineaproducto`
--
ALTER TABLE `lineaproducto`
  MODIFY `IdLineaProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `IdMarca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `modelomarca`
--
ALTER TABLE `modelomarca`
  MODIFY `IdModeloMarca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `modulosistema`
--
ALTER TABLE `modulosistema`
  MODIFY `IdModuloSistema` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
  MODIFY `IdMoneda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `parametrosistema`
--
ALTER TABLE `parametrosistema`
  MODIFY `IdParametroSistema` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `IdPersona` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `preciounidadmedida`
--
ALTER TABLE `preciounidadmedida`
  MODIFY `IdPrecioUnidadMedida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `IdProvincia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT de la tabla `regimentributario`
--
ALTER TABLE `regimentributario`
  MODIFY `IdRegimenTributario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `resumeninventario`
--
ALTER TABLE `resumeninventario`
  MODIFY `IdResumenInventario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `IdRol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `IdSede` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subfamiliaproducto`
--
ALTER TABLE `subfamiliaproducto`
  MODIFY `IdSubFamiliaProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `tipoactivo`
--
ALTER TABLE `tipoactivo`
  MODIFY `IdTipoActivo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipocambio`
--
ALTER TABLE `tipocambio`
  MODIFY `IdTipoCambio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipoconfiguracion`
--
ALTER TABLE `tipoconfiguracion`
  MODIFY `IdTipoConfiguracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `IdTipoDocumento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipodocumentoidentidad`
--
ALTER TABLE `tipodocumentoidentidad`
  MODIFY `IdTipoDocumentoIdentidad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipoexistencia`
--
ALTER TABLE `tipoexistencia`
  MODIFY `IdTipoExistencia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipoinventario`
--
ALTER TABLE `tipoinventario`
  MODIFY `IdTipoInventario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipooperacion`
--
ALTER TABLE `tipooperacion`
  MODIFY `IdTipoOperacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipopersona`
--
ALTER TABLE `tipopersona`
  MODIFY `IdTipoPersona` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tiposervicio`
--
ALTER TABLE `tiposervicio`
  MODIFY `IdTipoServicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `transportista`
--
ALTER TABLE `transportista`
  MODIFY `IdTransportista` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  MODIFY `IdUnidadMedida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `configuraciongeneral`
--
ALTER TABLE `configuraciongeneral`
  ADD CONSTRAINT `configuraciongeneral_ibfk_1` FOREIGN KEY (`IdTipoConfiguracion`) REFERENCES `tipoconfiguracion` (`IdTipoConfiguracion`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallekitproducto`
--
ALTER TABLE `detallekitproducto`
  ADD CONSTRAINT `detallekitproducto_ibfk_1` FOREIGN KEY (`IdPrecioUnidadMedida`) REFERENCES `preciounidadmedida` (`IdPrecioUnidadMedida`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `detallekitproducto_ibfk_2` FOREIGN KEY (`IdKitProducto`) REFERENCES `kitproducto` (`IdKitProducto`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccionpersona`
--
ALTER TABLE `direccionpersona`
  ADD CONSTRAINT `direccionpersona_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `FK_empleado_sede` FOREIGN KEY (`IdSede`) REFERENCES `sede` (`IdSede`),
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`IdUnidadMedida`) REFERENCES `unidadmedida` (`IdUnidadMedida`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`IdResumenInventario`) REFERENCES `resumeninventario` (`IdResumenInventario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`IdTipoPersona`) REFERENCES `tipopersona` (`IdTipoPersona`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`IdTipoDocumentoIdentidad`) REFERENCES `tipodocumentoidentidad` (`IdTipoDocumentoIdentidad`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_3` FOREIGN KEY (`IdEstadoCivil`) REFERENCES `estadocivil` (`IdEstadoCivil`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_4` FOREIGN KEY (`IdGenero`) REFERENCES `genero` (`IdGenero`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_5` FOREIGN KEY (`IdRol`) REFERENCES `rol` (`IdRol`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `resumeninventario`
--
ALTER TABLE `resumeninventario`
  ADD CONSTRAINT `resumeninventario_ibfk_2` FOREIGN KEY (`IdSede`) REFERENCES `sede` (`IdSede`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `resumeninventario_ibfk_3` FOREIGN KEY (`IdTipoInventario`) REFERENCES `tipoinventario` (`IdTipoInventario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresa` (`IdEmpresa`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `transportista`
--
ALTER TABLE `transportista`
  ADD CONSTRAINT `transportista_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;