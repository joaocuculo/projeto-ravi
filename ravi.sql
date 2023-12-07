-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/12/2023 às 12:25
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
(2, 'Mauri­cio', 'mauricio@gmail.com', 'estamosjuntos', '1997-09-08', 'Rua Nina Rodrigues', '65490-000', 'MA', 'Anajatuba', '(80) 9 8292-9292', '819.670.860-28', '34.416.421-4', 'outro', '2023-09-17 17:16:26', '1'),
(3, 'Ana Laura Dias de Cabral', 'analauracabral603@gmail.com', '12345678', '2005-03-10', 'Rua Rio Grande do Norte 996', '87565-000', 'PR', 'Cafezal do Sul', '(44) 9 8453-5352', '140.812.259-66', '156970986', 'feminino', '2023-12-04 12:25:35', '1'),
(4, 'Lívia Maria dos Santos', 'livsntss@gmail.com', 'livia123', '2005-05-10', 'Rua Prudentópolis n°266', '87400-000', 'PR', 'Cruzeiro do Oeste', '(44) 9 9710-7375', '104.200.879-58', '136114417', 'feminino', '2023-12-04 13:23:46', '1'),
(5, 'Murilo Augusto ', 'muriloaugusto282004@gmail.com', 'eusoumurilo', '2005-04-28', 'Rua do Harmonia', '87504-500', 'PR', 'Umuarama', '(44) 9 9710-7375', '024.684.900-29', '43.351.434-6', 'masculino', '2023-12-04 14:57:34', '1'),
(10, 'Bernardo', 'bernardo@gmail.com', 'eusouber', '2000-06-05', 'Rua Garças, Zona IV', '87504-519', 'PR', 'Umuarama', '(82) 9 8848-4838', '422.259.130-05', '30.936.232-5', 'masculino', '2023-12-06 14:18:53', '1'),
(11, 'Leonardo Odss', 'leodss@gmail.com', 'eusouleo', '2002-03-23', 'Rua 9 de Julho, Marapé', '11070-150', 'SP', 'Santos', '(42) 9 9877-4384', '646.879.640-79', '37.414.139-3', 'masculino', '2023-12-07 11:16:18', '1');

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
(1, 'Matemática', '1'),
(2, 'Português', '1'),
(3, 'Fí­sica', '1'),
(4, 'História', '1');

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
  `professor_id` int(11) DEFAULT NULL,
  `valorTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `conteudo`, `formaPag`, `aluno_id`, `professor_id`, `valorTotal`) VALUES
(36, 'aula de trigonometria', '#400d69', '2023-12-06 15:30:00', '2023-12-06 17:00:00', 'trigonometria', 'Pix', 3, 10, 300),
(37, 'citologia', '#961414', '2023-12-06 13:00:00', '2023-12-06 14:00:00', 'animais invertebrados', 'Cartao', 3, 14, 300),
(38, 'Fração', '#96144f', '2023-12-05 18:00:00', '2023-12-05 19:00:00', 'Frações', 'Pix', 4, 7, 80),
(39, 'Aula de Fração', '#143896', '2023-12-15 10:00:00', '2023-12-15 13:00:00', 'Multiplicação, divisão, adição e subtração de fração', 'Pix', 2, 13, 165),
(40, 'Aula Clássica', '#0d6935', '2023-12-21 18:00:00', '2023-12-21 20:00:00', 'Período clássico, Grécia Antiga e Roma Antiga', 'Cartao', 2, 12, 140),
(41, 'Aula de Pronome', '#143896', '2023-12-20 14:00:00', '2023-12-20 16:00:00', 'Pronomes indicativos, demonstrativos e pessoais', 'Cartao', 2, 8, 180),
(42, 'Aula de Função', '#96144f', '2023-12-21 11:00:00', '2023-12-21 13:00:00', 'Função do primeiro grau', 'Pix', 5, 10, 300),
(43, 'Aula de Célula', '#961414', '2023-12-22 10:00:00', '2023-12-22 14:00:00', 'Organelas, mitcôndrias, ribossomos', 'Cartao', 5, 14, 1200),
(49, 'Aula de Guerra', '#c75716', '2023-12-14 10:00:00', '2023-12-14 15:00:00', 'Guerra de Canudos, Revolta Farroupilha e Revolta da Vacina', 'Pix', 2, 19, 400),
(52, 'Aula de Gramática', '#D18D08', '2023-12-20 12:00:00', '2023-12-20 14:00:00', 'Gramática para ensino médio', 'Pix', 11, 7, 160);

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
  `curriculo` varchar(220) NOT NULL,
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
(7, 'Ramiro Alves', 'ramiro@gmail.com', '1122334455', '1990-08-24', 'Rua dos Biguás', '28928-604', 'RJ', 'Parati', '(21) 9 9878-6342', '834.698.920-24', '11.736.567-1', 'masculino', 'Formado em Letras', 'https://www.lattes.cnpq.br/', 'Todo conteúdo de gramática desde o ensino fundamental até o ensino médio. Literatura Brasileira.', '80', 2, '2023-08-26 17:14:11', '1'),
(8, 'Eduardo Alencar', 'edu@gmail.com', 'palmeiras', '1988-04-23', 'Rua Belém', '85830-000', 'PR', 'Formosa do Oeste', '(11) 9 9867-2367', '182.841.560-08', '21.547.202-0', 'masculino', 'Formado em Letras e em Sociologia', 'https://www.lattes.cnpq.br/', 'Toda Literatura Brasileira e do Brasil Colonial, estudo da sociedade.', '90', 2, '2023-09-02 14:53:40', '1'),
(9, 'Maria Cristina Albuquerque', 'mc@gmail.com', 'qwertyuiop', '1976-03-28', 'Rua Ministro Waldemar Falcão', '22641-170', 'RJ', 'Rio de Janeiro', '(21) 9 9807-8653', '416.484.370-52', '10.468.151-2', 'feminino', 'Formada em História, Psicologia e Letras', 'https://www.lattes.cnpq.br/', 'História do Brasil, Idade Média, Psicanálise, Literatura Brasileira', '130', 4, '2023-09-09 19:35:31', '1'),
(10, 'Paola Carosella', 'paola@gmail.com', 'paola123456', '1986-05-04', 'Rua Aranha', '35460-000', 'MG', 'Brumadinho', '(83) 9 7827-1827', '722.806.920-07', '12.772.271-3', 'feminino', 'Formada em matemática', 'https://www.lattes.cnpq.br/', 'Função de Primeiro e Segundo grau, Logaritmo, Raiz Quadrada, Fração Trigonométrica', '150', 1, '2023-09-10 17:46:11', '1'),
(12, 'Bianca', 'bianca@gmail.com', 'oieusoubianca', '2000-05-04', 'Rua João Antunes', '28455-000', 'RJ', 'São José de Ubá', '(55) 9 3849-8234', '799.767.660-09', '23.717.745-6', 'feminino', 'Formada em História', 'https://www.lattes.cnpq.br/', 'Embarcações, Imperialismo, Primeira Guerra Mundial, Segunda Guerra Mundial, Guerra Fria, Ditadura Militar no Brasil.', '70', 4, '2023-09-17 17:45:38', '1'),
(13, 'Laís Caçarola', 'lais@gmail.com', 'oieusoulais', '2000-02-22', 'Rua Osvaldo Hulse', '88811-590', 'SC', 'Criciúma', '(45) 6 7989-7507', '992.655.750-34', '44.488.042-2', 'feminino', 'Sou formada em matemática', 'https://www.lattes.cnpq.br/', 'Análise combinatória', '55', 1, '2023-10-06 14:28:16', '1'),
(14, 'Maria Joana Silva', 'maria.joana@gmail.com', '12345678', '1989-03-10', 'Avenida Pilantra', '87565-000', 'PR', 'Barracão', '(44) 9 8453-5352', '140.812.259-66', '123456777', 'feminino', 'Bióloga', 'https://www.lattes.cnpq.br/', 'Zoologia voltada ao ensino médio\r\n', '300', 3, '2023-12-04 12:33:04', '1'),
(15, 'Lívia Maria dos Santos', 'livsntss@gmail.com', '12345678', '2005-05-10', 'Rua Prudentópolis n°266', '87400-000', 'PR', 'Abatiá', '(44) 9 9710-7375', '104.200.879-58', '136114417', 'feminino', 'História', 'https://www.lattes.cnpq.br/', 'Brasil Império', '40', 4, '2023-12-04 13:27:41', '1'),
(19, 'Alex', 'alex@gmail.com', 'eusoualex', '1988-03-22', 'Rua RC 18, Residencial Canaã', '75909-710', 'GO', 'Rio Verde', '(41) 9 9828-7367', '696.355.530-30', '13.938.081-4', 'outro', 'História, Sociologia', 'https://www.lattes.cnpq.br/', 'Todo o conteúdo de história lecionado no ensino médio', '80', 4, '2023-12-06 14:23:57', '1'),
(20, 'Ana Cláudia', 'anaclaudia@gmail.com', 'eusouanaclaudia', '1994-07-08', 'Rua Ji-Paraná, São Bernardo', '76907-370', 'RO', 'Ji-Paraná', '(11) 9 8237-2834', '251.433.440-34', '14.023.291-6', 'feminino', 'Matemática e Engenharia Civil', 'https://www.lattes.cnpq.br/', 'Matemática de Ensino Superior', '110', 1, '2023-12-07 11:21:54', '1');

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
(1, 'João Victor', 'jv.cuculo@gmail.com', 'somostodosverdao', '1'),
(2, 'Cesar', 'cesar@gmail.com', 'estoumaluco', '1'),
(4, 'Eric', 'eric.oyama12@gmail.com', 'eusouoyama', '1'),
(5, 'Gabriel Bortoloto', 'gabrielbortoloto0@gmail.com', 'alexsandromoriah', '1'),
(6, 'Ana Laura Dias de Cabral', 'analauracabral603@gmail.com', '12345678', '1'),
(7, 'Bruno Bertolli', 'brbertolli@gmail.com', 'bertolli', '1');

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
-- Índices de tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_professor_events` (`professor_id`),
  ADD KEY `fk_aluno_events` (`aluno_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_aluno_events` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`),
  ADD CONSTRAINT `fk_professor_events` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`);

--
-- Restrições para tabelas `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_area_professor` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
