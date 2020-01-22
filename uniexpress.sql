-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jan-2020 às 13:55
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniexpress`
--
CREATE DATABASE IF NOT EXISTS `uniexpress` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uniexpress`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(255) NOT NULL,
  `data` date NOT NULL,
  `cpf` varchar(12) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `idVeiculo` int(11) NOT NULL,
  `observacao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `data`, `cpf`, `nome`, `idVeiculo`, `observacao`) VALUES
(1, '2020-01-23', '12398745685', 'Jose Antonio da Silva', 5, 'teste'),
(2, '2020-01-24', '123412341234', 'Roberto Alves', 5, 'teste'),
(3, '2020-01-27', '3245234524', 'João Pedro', 1, 'Manutenção'),
(4, '2020-01-27', '121234132', 'Maria do Bairro', 6, 'Visita cliente'),
(5, '2020-01-20', '123412341', 'Francisco', 7, 'Manutenção');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL,
  `marca` varchar(150) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `cor` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `portas` int(11) NOT NULL,
  `combustivel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `marca`, `modelo`, `cor`, `ano`, `portas`, `combustivel`) VALUES
(1, 'Chevrolet', 'Onix', 'Branco', 2013, 4, 'Flex'),
(2, 'Chevrolet', 'Prima', 'Branco', 2013, 4, 'Flex'),
(5, 'Nissan', 'March', 'Prata', 2013, 4, 'Flex'),
(6, 'Fiat', 'Uno', 'Vermelho', 2009, 2, 'Gasolina'),
(7, 'Nissan', 'Versa', 'Vermelho', 2014, 4, 'Flex');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
