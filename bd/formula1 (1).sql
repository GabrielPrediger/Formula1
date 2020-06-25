-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jun-2020 às 01:11
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `formula1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clasequipe`
--

CREATE TABLE `clasequipe` (
  `id_clasequipe` int(11) NOT NULL,
  `posicao_equipe` int(11) NOT NULL,
  `vitorias` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clasequipe`
--

INSERT INTO `clasequipe` (`id_clasequipe`, `posicao_equipe`, `vitorias`, `id_equipe`) VALUES
(1, 2, 3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao`
--

CREATE TABLE `classificacao` (
  `id_classificacao` int(11) NOT NULL,
  `posicao_piloto` int(11) NOT NULL,
  `vitoria` int(11) NOT NULL,
  `id_piloto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `classificacao`
--

INSERT INTO `classificacao` (`id_classificacao`, `posicao_piloto`, `vitoria`, `id_piloto`) VALUES
(4, 1, 3, 7),
(5, 2, 2, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `pais` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `nome`, `pais`) VALUES
(4, 'Ferrari', 'Italias'),
(6, 'RedBull', 'Austria'),
(7, 'Mercedes', 'Alemanha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `piloto`
--

CREATE TABLE `piloto` (
  `id_piloto` int(11) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `numero` int(11) NOT NULL,
  `pais` varchar(500) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `piloto`
--

INSERT INTO `piloto` (`id_piloto`, `nome`, `numero`, `pais`, `id_equipe`) VALUES
(7, 'Sebastian Vettel', 1, 'Alemanha', 4),
(8, 'Charles Leclerc', 11, 'Monaco', 4),
(10, 'Max Verstapen', 32, 'Holanda', 6),
(11, 'Lewis Hamilton', 22, 'Reino Unido', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Gabriel', 'gabrielprediger046@gmail.com', 'aa1bf4646de67fd9086cf6c79007026c');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clasequipe`
--
ALTER TABLE `clasequipe`
  ADD PRIMARY KEY (`id_clasequipe`),
  ADD KEY `fk_foreign_key_claseq` (`id_equipe`);

--
-- Índices para tabela `classificacao`
--
ALTER TABLE `classificacao`
  ADD PRIMARY KEY (`id_classificacao`),
  ADD KEY `fk_foreign_key_classificao` (`id_piloto`);

--
-- Índices para tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`);

--
-- Índices para tabela `piloto`
--
ALTER TABLE `piloto`
  ADD PRIMARY KEY (`id_piloto`),
  ADD KEY `fk_piloto_equipe` (`id_equipe`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clasequipe`
--
ALTER TABLE `clasequipe`
  MODIFY `id_clasequipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `classificacao`
--
ALTER TABLE `classificacao`
  MODIFY `id_classificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `piloto`
--
ALTER TABLE `piloto`
  MODIFY `id_piloto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `clasequipe`
--
ALTER TABLE `clasequipe`
  ADD CONSTRAINT `fk_foreign_key_claseq` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`);

--
-- Limitadores para a tabela `classificacao`
--
ALTER TABLE `classificacao`
  ADD CONSTRAINT `fk_foreign_key_classificao` FOREIGN KEY (`id_piloto`) REFERENCES `piloto` (`id_piloto`);

--
-- Limitadores para a tabela `piloto`
--
ALTER TABLE `piloto`
  ADD CONSTRAINT `fk_piloto_equipe` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
