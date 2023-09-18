-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Set-2023 às 20:16
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ravi`
--
CREATE DATABASE IF NOT EXISTS `ravi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ravi`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `dn` date NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `dataCad` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `email`, `senha`, `dn`, `endereco`, `cep`, `estado`, `cidade`, `telefone`, `cpf`, `rg`, `sexo`, `dataCad`, `status`) VALUES
(1, 'Otavio', 'otavio@gmail.com', 'umdoistres', '1995-06-30', 'Rua das floral', '87013-123', 'RN', 'AntÃ´nio Martins', '(41) 9 9827-3441', '071.983.274-52', '23456789876543', 'outro', '0000-00-00 00:00:00', ''),
(2, 'MaurÃ­cio', 'mauricio@gmail.com', 'estamosjuntos', '1997-09-08', 'Avenida vou ali e jÃ¡ volto', '40234-709', 'MA', 'Anajatuba', '(80) 9 8292-9292', '841.048.104-19', '48203740370137', 'outro', '2023-09-17 17:16:26', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`id`, `nome`, `status`) VALUES
(1, 'MatemÃ¡tica', ''),
(2, 'PortuguÃªs', ''),
(3, 'FÃ­sica', ''),
(4, 'HistÃ³ria', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `dn` date NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `areaFormacao` varchar(100) NOT NULL,
  `curriculo` varchar(100) NOT NULL,
  `conteudo` text NOT NULL,
  `valorHora` varchar(10) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `dataCad` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `email`, `senha`, `dn`, `endereco`, `cep`, `estado`, `cidade`, `telefone`, `cpf`, `rg`, `sexo`, `areaFormacao`, `curriculo`, `conteudo`, `valorHora`, `area_id`, `dataCad`, `status`) VALUES
(1, 'JoÃ£o Victor', 'jv.cuculo@gmail.com', 'somostodosverdao', '2000-10-28', 'Rua das GarÃ§as, 5164', '12345-678', 'MT', 'Acorizal', '(44) 9 9876-5433', '123.456.789-98', '12345678987654', 'on', 'Sou formado em ciancias da computaÃ§Ã£o, veterinario, psicologia, medicina, direito e educaÃ§Ã£o fis', 'logo-facebook.jpg', 'Liguagem de programaÃ§Ã£o, futsal\r\nbiologia de sacas', '300', 3, '0000-00-00 00:00:00', ''),
(3, 'Pedro', 'pedro@gmail.com', 'senhaforte', '1988-02-04', 'Avenida tamo junto', '87432-342', 'PB', 'Areial', '(55) 9 4234-2342', '128.323.123-12', '52636245133545', 'masculino', 'Sou formado em biologia avanÃ§ada', 'logo-github.jpg', 'GenÃ©tica\r\nSistema DigestÃ³rio\r\nCÃ©lula', '100', 3, '0000-00-00 00:00:00', ''),
(7, 'Ramiro', 'ramiro@gmail.com', '1122334455', '1990-08-24', 'Rua Tamo Junto', '87329-420', 'RJ', 'Parati', '(21) 9 9878-6342', '162.783.479-13', '31231231231212', 'masculino', 'Formado em Academia', 'logo-home.jpg', 'BÃ­ceps e TrÃ­ceps, Peito e Costas', '80', 2, '2023-08-26 17:14:11', ''),
(8, 'Ed Gama', 'ed@gmail.com', 'palmeiras', '1988-04-23', 'Rua Ã© nois tamo junto', '87654-323', 'PR', 'Formosa do Oeste', '(11) 9 9867-2367', '131.212.435-54', '87875686457474', 'masculino', 'Formado em Automobilismo', 'logo-youtube.jpg', 'Carros diversos, pneus, carcaÃ§a automotiva, pintura, sistema elÃ©trico.', '90', 2, '2023-09-02 14:53:40', ''),
(9, 'Maria Cristina', 'mc@gmail.com', 'qwertyuiop', '1976-03-28', 'Avenida Ã‰ Nois Denovo', '87342-234', 'RJ', 'Cabo Frio', '(21) 9 9807-8653', '123.456.789-74', '23489876543456', 'feminino', 'Formada em HistÃ³ria, Psicologia e Letras', 'adidas.png', 'HistÃ³ria do Brasil, Idade MÃ©dia, PsicanÃ¡lise, Literatura Brasileira', '130', 4, '2023-09-09 19:35:31', ''),
(10, 'Paola Carosella', 'paola@gmail.com', 'asdfghjkl', '1986-05-04', 'Rua Vamos Juntos', '87242-934', 'RN', 'Pedra Grande', '(83) 9 7827-1827', '234.234.234-87', '82439247298349', 'feminino', 'Formada em matemÃ¡tica', 'newera.png', 'FunÃ§Ã£o de Primeiro e Segundo grau, Logaritmo, Raiz Quadrada, FraÃ§Ã£o TrigonomÃ©trica', '150', 1, '2023-09-10 17:46:11', ''),
(12, 'Bianca', 'bianca@gmail.com', 'oieusoubianca', '2000-05-04', 'Rua Bruxa do 71', '93859-384', 'RJ', 'SÃ£o JosÃ© de UbÃ¡', '(55) 9 3849-8234', '983.498.384-10', '85485723480349', 'feminino', 'Formada em HistÃ³ria', 'logo-linkedin.png', 'EmbarcaÃ§Ãµes, Imperialismo, Primeira Guerra Mundial, Segunda Guerra Mundial, Guerra Fria, Ditadura Militar no Brasil.', '70', 4, '2023-09-17 17:45:38', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `status`) VALUES
(1, 'JoÃ£o Victor', 'jv.cuculo@gmail.com', 'somostodosverdao', ''),
(2, 'Cesar', 'cesar@gmail.com', 'estoumaluco', ''),
(3, 'julia', 'julia@gmail.com', 'juliapalmeiras', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_area_professor` (`area_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_area_professor` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
