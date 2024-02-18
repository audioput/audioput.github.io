-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 28-Ago-2019 às 11:54
-- Versão do servidor: 10.3.17-MariaDB-log
-- versão do PHP: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `28066`
--
CREATE DATABASE IF NOT EXISTS `audioput` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `audioput`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudos`
--

CREATE TABLE `conteudos` (
  `cod_video` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `audio` int(11) NOT NULL,
  `video_url` int(11) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `reportado` int(11) NOT NULL DEFAULT 0,
  `categoria` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;


CREATE TABLE `usuarios` (
  `cod` serial,
  `email` varchar(60) NOT NULL,
  `cometario` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;




-- --------------------------------------------------------

--
-- Estrutura da tabela `counter`
--

CREATE TABLE `counter` (
  `counter` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `counter`
--

INSERT INTO `counter` (`counter`) VALUES
(9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conteudos`
--
ALTER TABLE `conteudos`
  ADD PRIMARY KEY (`cod_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `cod_video` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
