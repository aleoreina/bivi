-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2020 at 04:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-library-virtual-university`
--

-- --------------------------------------------------------

--
-- Table structure for table `tipos_de_trabajo`
--

CREATE TABLE `tipos_de_trabajo` (
  `id` int(100) NOT NULL,
  `tipo_de_trabajo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipos_de_trabajo`
--

INSERT INTO `tipos_de_trabajo` (`id`, `tipo_de_trabajo`) VALUES
(31, 'TRABAJO DE GRADO');

-- --------------------------------------------------------

--
-- Table structure for table `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `tipo_de_trabajo` varchar(30) DEFAULT NULL,
  `titulo` varchar(1000) DEFAULT NULL,
  `anio` int(10) UNSIGNED DEFAULT NULL,
  `autores` varchar(100) DEFAULT NULL,
  `carrera` varchar(100) DEFAULT NULL,
  `filename` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trabajos`
--

INSERT INTO `trabajos` (`id`, `tipo_de_trabajo`, `titulo`, `anio`, `autores`, `carrera`, `filename`) VALUES
(00000000001, 'TRABAJO DE GRADO', 'SOFTWARE PARA LA IMPLEMENTACION DE SISTEMA DE RIEGO EN ARDUINO USANDO INTELIGENCIA ARTIFICIAL', 2020, 'MARIO ANDRADE', 'ING DE SISTEMAS', '2020-TRABAJO_DE_GRADO-J6KtD9agTF1QAgx.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `clave` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`) VALUES
(1, 'admin', '010203');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tipos_de_trabajo`
--
ALTER TABLE `tipos_de_trabajo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipos_de_trabajo`
--
ALTER TABLE `tipos_de_trabajo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
