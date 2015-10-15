-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2015 at 06:30 PM
-- Server version: 5.6.23
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pacientes`
--

-- --------------------------------------------------------

--
-- Table structure for table `atenciones_medicas`
--

CREATE TABLE `atenciones_medicas` (
  `id` int(6) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `genero` char(1) NOT NULL COMMENT 'M o F',
  `f_nacimiento` date NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) NOT NULL,
  `tipo_paciente` varchar(10) NOT NULL COMMENT 'BEBE,NINO,ADOLECENTE,ADULTO,MAYOR,ANCIANO',
  `id_medico` int(6) NOT NULL,
  `sintomas` text NOT NULL,
  `prescripcion` text NOT NULL,
  `indicaciones` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id` int(6) NOT NULL,
  `id_atencion` int(6) NOT NULL,
  `id_enfermedad` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `enfermedades`
--

CREATE TABLE `enfermedades` (
  `id` int(6) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicos`
--

CREATE TABLE `medicos` (
  `id` int(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nro_registro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atenciones_medicas`
--
ALTER TABLE `atenciones_medicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_medico` (`id_medico`);

--
-- Indexes for table `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_atencion` (`id_atencion`),
  ADD KEY `id_enfermedad` (`id_enfermedad`);

--
-- Indexes for table `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atenciones_medicas`
--
ALTER TABLE `atenciones_medicas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enfermedades`
--
ALTER TABLE `enfermedades`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `atenciones_medicas`
--
ALTER TABLE `atenciones_medicas`
  ADD CONSTRAINT `atenciones_medicas_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id`);

--
-- Constraints for table `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `diagnosticos_ibfk_1` FOREIGN KEY (`id_atencion`) REFERENCES `atenciones_medicas` (`id`),
  ADD CONSTRAINT `diagnosticos_ibfk_2` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedades` (`id`);

ALTER TABLE diagnosticos ADD FOREIGN KEY(id_atencion)REFERENCES atenciones_medicas(id) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;