-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/11/2023 às 16:23
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
CREATE DATABASE IF NOT EXISTS `ravi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ravi`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `email`, `senha`, `dn`, `endereco`, `cep`, `estado`, `cidade`, `telefone`, `cpf`, `rg`, `sexo`, `dataCad`, `status`) VALUES
(1, 'Otavio', 'otavio@gmail.com', 'umdoistres', '1995-06-30', 'Rua das floral', '87013-123', 'RN', 'Antônio Martins', '(41) 9 9827-3441', '071.983.274-52', '23456789876543', 'outro', '0000-00-00 00:00:00', ''),
(2, 'Maurí­cio', 'mauricio@gmail.com', 'estamosjuntos', '1997-09-08', 'Avenida vou ali e já volto', '40234-709', 'MA', 'Anajatuba', '(80) 9 8292-9292', '841.048.104-19', '48203740370137', 'outro', '2023-09-17 17:16:26', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `area`
--

INSERT INTO `area` (`id`, `nome`, `status`) VALUES
(1, 'Matemática', ''),
(2, 'Português', ''),
(3, 'Fí­sica', ''),
(4, 'História', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `dia` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaTermino` time NOT NULL,
  `conteudo` mediumtext NOT NULL,
  `valorTotal` double NOT NULL,
  `formaPagamento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `evento`
--

INSERT INTO `evento` (`id`, `dia`, `horaInicio`, `horaTermino`, `conteudo`, `valorTotal`, `formaPagamento`) VALUES
(1, '2023-11-02', '17:00:00', '18:00:00', 'história do brasil, mundo antigo, grécia, império romano, egito antigo', 50, 'cartão');

-- --------------------------------------------------------

--
-- Estrutura para tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(220) NOT NULL,
  `color` varchar(45) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `conteudo` text NOT NULL,
  `formaPag` varchar(20) NOT NULL,
  `aluno_id` int(11) DEFAULT NULL,
  `professor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `conteudo`, `formaPag`, `aluno_id`, `professor_id`) VALUES
(1, 'Tutorial 1a', '#0003bf', '2023-11-12 10:25:00', '2023-11-12 13:25:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'Cartao', 0, 0),
(2, 'Tutorial 2b', '#bf0000', '2023-11-14 18:25:00', '2023-11-14 20:25:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'Pix', 0, 0),
(3, 'Tutorial 3c', '#fad902', '2023-11-16 12:25:00', '2023-11-16 19:43:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'Pix', 0, 0),
(4, 'Tutorial 4', '#67cac4', '2023-11-20 11:11:18', '2023-11-20 17:11:18', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'Cartao', 0, 0),
(5, 'Tutorial 5', '#40bf00', '2023-11-22 03:00:00', '2023-11-22 22:00:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'Pix', 0, 0),
(9, 'Tutorial 6', '#bf0000', '2023-11-24 12:59:00', '2023-11-24 18:01:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'Cartao', 0, 0),
(11, 'Tutorial 7', '#0003bf', '2023-11-26 11:00:00', '2023-11-26 14:00:00', 'Olha Ã© o seguinte estamos juntos estamos juntos estamos juntos estamos junots estamos juntos', 'Pix', 0, 0),
(12, 'Tutorial 8', '#bf0000', '2023-11-28 02:00:00', '2023-11-28 05:00:00', 'Olha Ã© o seguinte estamos juntos estamos juntos estamos juntos estamos junots estamos juntos', 'Pix', 0, 0),
(13, 'Tutorial 9', '#40bf00', '2023-11-30 03:00:00', '2023-11-30 22:00:00', 'Vamos la neymar uuuuuuuuuuu im blinded by the lights', 'Cartao', 0, 0),
(14, 'Tutorial 10', '#0003bf', '2023-12-02 04:00:00', '2023-12-02 11:00:00', 'Testtando o pagamento nao tem jeito', 'Pix', 0, 0),
(15, 'Tutorial 11', '#40bf00', '2023-12-04 04:00:00', '2023-12-04 12:00:00', 'testando a caixa alta que eu lancei no cartao e no pix', 'Pix', 0, 0),
(16, 'Tutorial 12', '#40bf00', '2023-12-06 03:00:00', '2023-12-06 17:00:00', 'testando agr se o required que eu lancei no select vai funcionar vambora', 'Cartao', 0, 0),
(21, 'Tutorial 13', '#0003bf', '2023-12-08 02:00:00', '2023-12-08 20:00:00', 'Aula de capoeira e futsal', 'Pix', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
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
  `conteudo` mediumtext NOT NULL,
  `valorHora` varchar(10) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `dataCad` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `email`, `senha`, `dn`, `endereco`, `cep`, `estado`, `cidade`, `telefone`, `cpf`, `rg`, `sexo`, `areaFormacao`, `curriculo`, `conteudo`, `valorHora`, `area_id`, `dataCad`, `status`) VALUES
(1, 'João Victor', 'jv.cuculo@gmail.com', 'somostodosverdao', '2000-10-28', 'Rua das Garças, 5164', '12345-678', 'MT', 'Acorizal', '(44) 9 9876-5433', '123.456.789-98', '12345678987654', 'on', 'Sou formado em ciancias da computação, veterinario, psicologia, medicina, direito e educação fis', 'logo-facebook.jpg', 'Liguagem de programação, futsal\r\nbiologia de sacas', '300', 3, '0000-00-00 00:00:00', ''),
(3, 'Pedro', 'pedro@gmail.com', 'senhaforte', '1988-02-04', 'Avenida tamo junto', '87432-342', 'PB', 'Areial', '(55) 9 4234-2342', '128.323.123-12', '52636245133545', 'masculino', 'Sou formado em biologia avançada', 'logo-github.jpg', 'Genética\r\nSistema Digestório\r\nCélula', '100', 3, '0000-00-00 00:00:00', ''),
(7, 'Ramiro', 'ramiro@gmail.com', '1122334455', '1990-08-24', 'Rua Tamo Junto', '87329-420', 'RJ', 'Parati', '(21) 9 9878-6342', '162.783.479-13', '31231231231212', 'masculino', 'Formado em Academia', 'logo-home.jpg', 'Bí­ceps e Trí­ceps, Peito e Costas', '80', 2, '2023-08-26 17:14:11', ''),
(8, 'Ed Gama', 'ed@gmail.com', 'palmeiras', '1988-04-23', 'Rua é nois tamo junto', '87654-323', 'PR', 'Formosa do Oeste', '(11) 9 9867-2367', '131.212.435-54', '87875686457474', 'masculino', 'Formado em Automobilismo', 'logo-youtube.jpg', 'Carros diversos, pneus, carcaça automotiva, pintura, sistema elétrico.', '90', 2, '2023-09-02 14:53:40', ''),
(9, 'Maria Cristina', 'mc@gmail.com', 'qwertyuiop', '1976-03-28', 'Avenida é Nois Denovo', '87342-234', 'RJ', 'Cabo Frio', '(21) 9 9807-8653', '123.456.789-74', '23489876543456', 'feminino', 'Formada em História, Psicologia e Letras', 'adidas.png', 'História do Brasil, Idade Média, Psicanálise, Literatura Brasileira', '130', 4, '2023-09-09 19:35:31', ''),
(10, 'Paola Carosella', 'paola@gmail.com', 'asdfghjkl', '1986-05-04', 'Rua Vamos Juntos', '87242-934', 'RN', 'Pedra Grande', '(83) 9 7827-1827', '234.234.234-87', '82439247298349', 'feminino', 'Formada em matemática', 'newera.png', 'Função de Primeiro e Segundo grau, Logaritmo, Raiz Quadrada, Fração Trigonométrica', '150', 1, '2023-09-10 17:46:11', ''),
(12, 'Bianca', 'bianca@gmail.com', 'oieusoubianca', '2000-05-04', 'Rua Bruxa do 71', '93859-384', 'RJ', 'São José de Ubá', '(55) 9 3849-8234', '983.498.384-10', '85485723480349', 'feminino', 'Formada em História', 'logo-linkedin.png', 'Embarcações, Imperialismo, Primeira Guerra Mundial, Segunda Guerra Mundial, Guerra Fria, Ditadura Militar no Brasil.', '70', 4, '2023-09-17 17:45:38', '1'),
(13, 'Laís Caçarola', 'lais@gmail.com', 'oieusoulais', '2000-02-22', 'Avenida è nois', '08508-508', 'PA', 'Abaetetuba', '(45) 6 7989-7507', '750.850.850-85', '85085085085085', 'feminino', 'Sou formada em matemática', 'screen-lock.jpg', 'Análise combinatória', '10', 1, '2023-10-06 14:28:16', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `status`) VALUES
(1, 'João Victor', 'jv.cuculo@gmail.com', 'somostodosverdao', ''),
(2, 'Cesar', 'cesar@gmail.com', 'estoumaluco', ''),
(3, 'julia', 'julia@gmail.com', 'juliapalmeiras', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_area_professor` (`area_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
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
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_area_professor` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
