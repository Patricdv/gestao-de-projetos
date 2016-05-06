-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Maio-2016 às 01:38
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcaronauffs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `avaliado` int(11) NOT NULL,
  `avaliador` int(11) NOT NULL,
  `comentario` varchar(150) NOT NULL,
  `nota` int(11) NOT NULL,
  `dataAvaliacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carona`
--

CREATE TABLE `carona` (
  `id` int(11) NOT NULL,
  `caroneiro` int(11) NOT NULL,
  `vagas` int(11) NOT NULL,
  `data` date NOT NULL,
  `saida` varchar(10) NOT NULL,
  `origem` varchar(255) NOT NULL,
  `destino` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carona`
--

INSERT INTO `carona` (`id`, `caroneiro`, `vagas`, `data`, `saida`, `origem`, `destino`) VALUES
(6, 10, 2, '2016-05-05', '08:00', 'UFFS', 'Centro'),
(7, 10, 2, '2016-05-09', '08:00', 'UFFS', 'Centro'),
(8, 10, 2, '2016-05-10', '08:00', 'Centro', 'UFFS'),
(9, 10, 2, '2016-05-06', '08:00', 'UFFS', 'Bairro'),
(10, 10, 2, '2016-05-12', '12:00', 'UFFS', 'Bairro LÃ­der'),
(11, 10, 2, '2016-05-11', '19:00', 'Bairro Presidente MÃ©dici', 'UFFS'),
(12, 10, 2, '2016-05-11', '19:00', 'Bairro Presidente MÃ©dici', 'UFFS'),
(13, 10, 2, '2016-05-10', '19:00', 'Bairro Presidente MÃ©dici', 'UFFS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `endereco`, `tipo`, `email`, `idade`, `sexo`, `telefone`, `senha`) VALUES
(10, 'Rogerio', 'Rua de Casa', 0, 'testes1@gmeil.com', 30, 0, '(99) 9999-9999', '999999'),
(11, 'Rogerio 2', 'Rua de Casa2', 0, 'testes2@gmeil.com', 32, 0, '(22) 2222-2222', '22222222'),
(12, 'teste 3', 'testes do teste', 0, 'testes3''@gmeil.com', 88, 1, '(88) 8888-8888', '98989898988');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int(11) NOT NULL,
  `idCarona` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avaliador` (`avaliador`),
  ADD KEY `avaliado` (`avaliado`);

--
-- Indexes for table `carona`
--
ALTER TABLE `carona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caroneiro` (`caroneiro`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telefone` (`telefone`);

--
-- Indexes for table `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCarona` (`idCarona`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `carona`
--
ALTER TABLE `carona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`avaliador`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`avaliado`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `carona`
--
ALTER TABLE `carona`
  ADD CONSTRAINT `carona_ibfk_1` FOREIGN KEY (`caroneiro`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `vagas_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `vagas_ibfk_2` FOREIGN KEY (`idCarona`) REFERENCES `carona` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
