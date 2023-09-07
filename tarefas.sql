-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07-Set-2023 às 16:52
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tarefas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Funcionarios`
--

CREATE TABLE `Funcionarios` (
  `id` int(11) NOT NULL,
  `primeiroNome` varchar(50) DEFAULT NULL,
  `ultimoNome` varchar(50) DEFAULT NULL,
  `funcao` varchar(50) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Funcionarios`
--

INSERT INTO `Funcionarios` (`id`, `primeiroNome`, `ultimoNome`, `funcao`, `dataNascimento`, `email`) VALUES
(1, 'João', 'Silva', 'Analista de Dados', '1990-05-15', 'joao.silva@email.com'),
(2, 'Alfredo', 'Teste', 'Escritor', '1998-06-14', 'alfredo@teste.com'),
(5, 'Manuel', 'Teste', 'Escritor', '2023-12-23', 'asdasd@fdfs.cmo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Tarefas`
--

CREATE TABLE `Tarefas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `funcionario` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `prazo` date DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Tarefas`
--

INSERT INTO `Tarefas` (`id`, `titulo`, `descricao`, `funcionario`, `data`, `prazo`, `estado`) VALUES
(2, 'Nova Tarefa', 'Esta é uma nova tarefa para o funcionário. alterada', 1, '2023-08-30', '2023-09-11', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Funcionarios`
--
ALTER TABLE `Funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `Tarefas`
--
ALTER TABLE `Tarefas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario` (`funcionario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Funcionarios`
--
ALTER TABLE `Funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `Tarefas`
--
ALTER TABLE `Tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Tarefas`
--
ALTER TABLE `Tarefas`
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`funcionario`) REFERENCES `Funcionarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
