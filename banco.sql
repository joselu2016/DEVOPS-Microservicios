-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-11-2019 a las 03:36:47
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `banco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `nombres` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `apellidos` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `cedula` varchar(11) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nombres`, `apellidos`, `cedula`) VALUES
('1', 'jose luis', 'sagba pinduisaca', '0604066407'),
('2', 'gabriela', 'vega alarcon', '0604066409'),
('3', 'daniela liseth', 'vera vargas', '06500465789'),
('4', 'johana marcela', 'toledo vega', '0604066405'),
('5', 'luis alcides', 'fernandez lopez', '0683298999');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `idcuenta` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `cliente` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `ncuenta` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `montobase` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `clave` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `estado` varchar(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcar la base de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`idcuenta`, `cliente`, `ncuenta`, `montobase`, `clave`, `estado`) VALUES
('c1', '0604066407', 'NC02', '300', '1234', '1'),
('c2', '0604066409', 'NC03', '900', '1578', '1'),
('c3', '06500465789', 'NC04', '300', '1984', '1'),
('c4', '0604066405', 'NC05', '400', '1983', '1'),
('C5', '0683298999', 'NC06', '1000', '2010', '1');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE IF NOT EXISTS `operaciones` (
  `idoperacion` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `ncuentaop` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `tipo` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `monto` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `fecha` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `estado` varchar(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcar la base de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`idoperacion`, `ncuentaop`, `tipo`, `monto`, `fecha`, `estado`) VALUES
('', '', '', '', '', '1'),
('op2', 'nc04', 'Deposito', '100', '12/12/2019', '1'),
('op3', 'nc04', 'Retiro', '200', '12/12/2019', '1'),
('op4', 'nc06', 'Retiro', '1000', '12/12/2019', '1'),
('op5', 'NC02', 'Retiro', '100', '10/11/2019', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencia`
--

CREATE TABLE IF NOT EXISTS `transferencia` (
  `idt` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `ncuentatr` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `cuentadestino` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `monto` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `estado` varchar(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcar la base de datos para la tabla `transferencia`
--

