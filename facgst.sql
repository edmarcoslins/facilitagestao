-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Nov-2016 às 04:47
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `facgst`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(10) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE IF NOT EXISTS `agendamento` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(3) NOT NULL,
  `servico` int(2) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cod` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` char(11) NOT NULL,
  `logradouro` varchar(30) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` char(2) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `cod` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
