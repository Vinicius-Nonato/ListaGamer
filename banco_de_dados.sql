-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Nov-2022 às 00:12
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lista_gamer`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_usuarios`
--

CREATE TABLE `admin_usuarios` (
  `id_admin` int(100) NOT NULL,
  `usuario_admin` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `grupo` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin_usuarios`
--

INSERT INTO `admin_usuarios` (`id_admin`, `usuario_admin`, `nome`, `sobrenome`, `email`, `grupo`, `senha`) VALUES
(1, 'vini', 'vinicius\'', 'diamix', 'vinicius@diamix.com.br', '', '202cb962ac59075b964b07152d234b70'),
(2, 'teste', 'nomes', 'sobrenome', 'teste@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(3, 'viniciusss', 'vinicius', 'diamix', 'vinicus999@diamix.co.vr', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'testeete', 'vinicius', 'diamix', 'testexdsada@diamix.com.br', 'admin-geral', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'teste_usuario', 'vinicius', 'rodrigues', 'vinicius7272@diamix.com.br', 'admin-geral', 'dbc4d84bfcfe2284ba11beffb853a8c4'),
(6, 'reuniao', 'nome', 'sobre', 'vinicius88@diamix.com.br', '', 'd41d8cd98f00b204e9800998ecf8427e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios_perfil`
--

CREATE TABLE `comentarios_perfil` (
  `id_comentario` int(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `perfil` varchar(100) NOT NULL,
  `comentario` varchar(400) NOT NULL,
  `data_comentario` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentarios_perfil`
--

INSERT INTO `comentarios_perfil` (`id_comentario`, `usuario`, `perfil`, `comentario`, `data_comentario`) VALUES
(1, '123123123', 'Nico_Nonato', 'corno', '2022-05-26'),
(2, '123123123', 'Nico_Nonato', 'corno', '2022-05-26'),
(3, 'ksks', 'Nico_Nonato', 'k', '2022-05-30'),
(4, 'ksks', 'Nico_Nonato', 'k', '2022-05-30'),
(5, 'ksks', 'Nico_Nonato', 'dsa', '2022-05-30'),
(6, 'ksks', 'Nico_Nonato', 'teste', '2022-05-30'),
(7, 'ksks', 'Nico_Nonato', 'teste', '2022-05-30'),
(8, 'ksks', 'Nico_Nonato', 'teste', '2022-05-30'),
(9, 'ksks', 'Nico_Nonato', 'tes', '2022-05-30'),
(10, 'ksks', 'Nico_Nonato', 'teste', '2022-05-30'),
(11, 'ksks', 'Nico_Nonato', 'te', '2022-05-30'),
(12, 'ksks', 'Nico_Nonato', 'teste', '2022-05-30'),
(13, 'ksks', 'Nico_Nonato', 's', '2022-05-30'),
(14, 'ksks', 'Nico_Nonato', 's', '2022-05-30'),
(15, 'ksks', 'Nico_Nonato', 'TESTE', '2022-05-30'),
(16, 'ksks', 'Nico_Nonato', 'tete', '2022-05-31'),
(17, 'teste_usuario', '123123123', '<b>teste</b>', '2022-05-31'),
(18, 'teste_usuario', '123123123', '<b>comentario</b>', '2022-05-31'),
(19, 'teste_usuario', '123123123', 'teste', '2022-05-31'),
(20, 'teste220726', 'teste220726', 'teste', '2022-07-26'),
(21, 'vinicius_login', 'vinicius_login', 'Comentario feito por mim mesmo para testar rapidinho', '2022-08-15'),
(22, 'vinicius_login', 'lari', 'teste', '2022-08-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_jogo`
--

CREATE TABLE `dados_jogo` (
  `id` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `nota` int(200) DEFAULT NULL,
  `inscritos` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados_jogo`
--

INSERT INTO `dados_jogo` (`id`, `url`, `nota`, `inscritos`) VALUES
('1', 'cod_bo2', 17, 3),
('2', 'ori_and_the_will_of_the_wisps', 3, 1),
('3', 'hades', 8, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `ID` int(255) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `imagem_jogo` varchar(200) DEFAULT NULL,
  `produtora` varchar(200) DEFAULT NULL,
  `distribuidora` varchar(500) DEFAULT NULL,
  `tempo_jogo` varchar(200) DEFAULT NULL,
  `data_lancamento` varchar(200) DEFAULT NULL,
  `genero` varchar(500) DEFAULT NULL,
  `plataforma` varchar(500) DEFAULT NULL,
  `linguagem` varchar(200) DEFAULT NULL,
  `jogo_ant` varchar(200) DEFAULT NULL,
  `jogo_pos` varchar(200) DEFAULT NULL,
  `imagem_1` varchar(200) DEFAULT NULL,
  `imagem_2` varchar(200) DEFAULT NULL,
  `imagem_3` varchar(200) DEFAULT NULL,
  `imagem_4` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`ID`, `nome`, `status`, `url`, `descricao`, `imagem_jogo`, `produtora`, `distribuidora`, `tempo_jogo`, `data_lancamento`, `genero`, `plataforma`, `linguagem`, `jogo_ant`, `jogo_pos`, `imagem_1`, `imagem_2`, `imagem_3`, `imagem_4`) VALUES
(30, 'Call Of Duty Black Ops 2', 'habilitado', 'cod_bo2', 'Quebrando as barreiras do que os fãs esperariam da franquia de entretenimento recordista, Call of Duty®: Black Ops II leva os jogadores a um futuro próximo, na Guerra Fria do século XXI, onde a tecnologia e as armas convergiram para criar uma nova geração', 'cod_bo2.png', 'Treyarch', 'Activision', '25 Horas', 'PC,PS4, XBOX', 'FPS, Shotter', 'PC, PS4 e Xbox', 'en-us / pt-br', '-', '-', 'cod_bo2_1.jpg', 'cod_bo2_2.jpg', 'cod_bo2_3.jpg', 'cod_bo2_4.jpg'),
(33, 'Hades', 'habilitado', 'hades', 'Desafie o deus dos mortos enquanto você batalha para sair do Submundo neste jogo roguelike dos mesmos criadores de Bastion, Transistor e Pyre.', 'hades.png', ' Supergiant Games', ' Supergiant Games', '20 horas', '2017-09-17', 'RPG, FPS', 'PS4, XBOX, Switch, PC', 'pt_BR', '', '', '', '', '', ''),
(34, 'Ori and the Will of the Wisps', 'habilitado', 'ori', 'Embarque em uma nova jornada em um mundo vasto e exótico, onde você encontrará inimigos gigantescos e quebra-cabeças desafiadores na sua missão para descobrir o destino de Ori.', 'ori.png', 'Moon Studios GmbH', 'Xbox Game Studios', '20 horas', '2020-04-11', 'Storytelling', 'PS4, XBOX, Switch, PC', 'pt_BR', '', '', '', '', '', ''),
(35, 'Crash Racing', 'habilitado', 'crash_racing', 'crash_rancing', 'crash_racing.png', 'Activision', 'Activiosion', '20 horas', '2020-10-22', 'Storytelling', 'PS4, XBOX, PC', 'pt_BR', '', '', '', '', '', ''),
(36, 'Fortnite', 'habilitado', 'fortnite', 'descricao fortnite', 'fortnite.png', 'Epic Games', 'Epic Games', '-', '2019-10-10', 'Shotter', 'PS4, XBOX, Switch, PC', 'pt_BR', '', '', '', '', '', ''),
(37, 'Overcooked 2', 'habilitado', 'overcooked', 'descricao overcooked', 'overcooked.png', 'Team 17', 'Team 17', '15 horas', '2018-08-07', 'Ritmo', 'PC', 'pt_BR', '', '', '', '', '', ''),
(38, 'Jump Force', 'habilitado', 'jump_force', 'descrição jump force', 'jump_force.png', 'bandai namco', 'bandai namco', '11 horas', '2021-10-30', 'FPS', 'PS4, XBOX, Switch', 'pt_BR', '', '', '', '', '', ''),
(39, 'Hollow Knight', 'habilitado', 'hollow_knight', 'descrição jogo', 'hollow_knight.png', 'Tean Cherry', 'Tean Cherry', '10 horas', '2019-07-25', 'Storytelling', 'PS4, XBOX, Switch, PC', 'pt_BR', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos_sugeridos`
--

CREATE TABLE `jogos_sugeridos` (
  `usuario` varchar(100) NOT NULL,
  `nome_jogo` varchar(100) NOT NULL,
  `plataforma` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `ano_lancamento` int(100) NOT NULL,
  `produtora` varchar(100) NOT NULL,
  `distribuidora` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_gamer`
--

CREATE TABLE `lista_gamer` (
  `ID` int(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `jogo` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `nota` int(200) DEFAULT NULL,
  `tempo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lista_gamer`
--

INSERT INTO `lista_gamer` (`ID`, `usuario`, `jogo`, `status`, `nota`, `tempo`) VALUES
(6, 'bin', 'ori_and_the_will_of_the_wisps', 'Pausado', 3, '1 hora'),
(8, 'bin', 'cod_bo2', 'Pulei Fora', 0, '200 horas'),
(9, 'teste_teste_teste', 'cod_bo2', 'Completado', 8, '10'),
(11, 'reuniao', 'cod_bo2', 'Pulei Fora', 9, '20 horas'),
(12, 'reuniao', 'hades', 'Pensando em Jogar', 8, '20 horas'),
(13, 'usuario_tcc', 'hades', 'Jogando', 9, '10 horas'),
(14, 'usuario_tcc', 'cod_bo2', 'Pausado', 9, '23'),
(15, 'vinicius_login', 'cod_bo2', 'Completado', 10, '20 Horas'),
(16, 'vinicius_login', 'hades', 'Completado', 9, '20 Horas'),
(17, 'vinicius_login', 'ori', 'Pensando em Jogar', 0, ''),
(18, 'vinicius_login', 'crash_racing', 'Completado', 10, '15 Horas'),
(19, 'vinicius_login', 'fortnite', 'Jogando', 9, '40 Horas'),
(20, 'vinicius_login', 'overcooked', 'Pausado', 7, '13 Horas'),
(21, 'vinicius_login', 'jump_force', 'Pulei Fora', 2, '10 horas'),
(22, 'vinicius_login', 'hollow_knight', 'Completado', 10, '30 Horas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacionamentos`
--

CREATE TABLE `relacionamentos` (
  `id` int(11) NOT NULL,
  `amigo1` varchar(200) NOT NULL,
  `amigo2` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `relacionamentos`
--

INSERT INTO `relacionamentos` (`id`, `amigo1`, `amigo2`, `status`) VALUES
(6, 'lari', 'teste', 'P'),
(15, 'lari', 'Nico_Nonato', 'P'),
(20, 'triste', 'Nico_Nonato', 'A'),
(21, 'triste', 'vinicius_login', 'A'),
(23, 'alone', 'alone', 'A'),
(25, 'alone', 'triste', 'A'),
(26, 'triste', 'alone', 'A'),
(29, 'usuario_tcc_dois', 'usuario_tcc', 'A'),
(30, 'usuario_tcc', 'usuario_tcc_dois', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `foto_perfil` varchar(200) DEFAULT NULL,
  `biografia` text DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `jogos_favoritos` varchar(500) DEFAULT NULL,
  `generos_favoritos` varchar(500) DEFAULT NULL,
  `consoles_favoritos` varchar(500) DEFAULT NULL,
  `idade` int(3) DEFAULT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `email_rede` varchar(200) DEFAULT NULL,
  `twitch` varchar(200) DEFAULT NULL,
  `tiktok` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nome`, `sobrenome`, `email`, `senha`, `foto_perfil`, `biografia`, `status`, `jogos_favoritos`, `generos_favoritos`, `consoles_favoritos`, `idade`, `apelido`, `pais`, `twitter`, `instagram`, `facebook`, `email_rede`, `twitch`, `tiktok`) VALUES
(1, 'teste', '', 'nonato', 'vinicius@diamix.com.br', 'teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(2, '$usuario', '$nome', '$sobrenome', '$email', '$senha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'teste', 'vinicius', 'nonato', 'vinicius@diamix.com.br', 'teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'teste', 'vinicius', 'nonato', 'vinicius@diamix.com.br', 'teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'teste', 'conta', 'de teste', 'teste@gmail.com', 'teste123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'user', 'vinicius', 'nonato', 'vinicius@diamix.com.br', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'testetestset', 'vinicius', 'diamix', 'nico.nonato@gmail.com', '123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(9, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(10, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(11, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(12, '', '', '', '', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(13, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(14, '', '', 'sadasd', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(15, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(16, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(17, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'dasdas', 'fdsfsd', 'sdfsdf', 'fsdfs@gmail.com', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'dads', 'teste', 'teste', 'vinicius@diamix.com.v4', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'testeste', 'teste', 'teste', 'teste@gmail.com', '123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Nico_Nonato', 'vinicius', 'nonato', 'v245394@dac.unicamp.br', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'jorge', '698dc19d489c4e4db73e28a713eab07b', 'teste', 'asdasdas@fgmaILMCIOM', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'jorge', 'teste', 'teste', 'asdasdas@fgmaILMCIOM', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'jorge2', 'teste', 'teste', 'vinicius@diamix.com.vr', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'teste_usuario', 'vinicius', 'diamix', 'vinicuis@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'sksksk', 'vinicius', 'diamix', 'vinicius908@diamix.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'shshshsh', 'vinicius', 'diamix', 'vinicius82728@diamix.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(29, '123123123', 'vinicius', 'diamic', 'vuinicius@sddsad.cmo.br', '202cb962ac59075b964b07152d234b70', NULL, 'Está é a minha biografia e este é umt exto de teste apenas para encher linguiça e gerar entreteniumento enquanto fujo da responsabildiade de programar o meu tcc', 'Estou Feliz', 'Call of Duty', 'FPS, Shotter', 'PS4', 20, 'Nico', 'Brasil', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'ksks', 'testeeq', 'ftftftf', 'vinicius6363@diamix.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'teste_reuniao', 'vinicius', 'diamix', 'vinicius222@diamix.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'vinicius', 'vinicius', 'diamix', 'viniciusasd@diamix.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'testestestes', 'vinicius', 'diamix', 'vinicius2929@diamix.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'testetesteteste', 'teste', 'teste', 'vinicius8118@diamix.com.br', 'f5bb0c8de146c67b44babbf4e6584cc0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'sinfonia', 'vinicius', 'diamix', 'vinicius292929@diamix.com.br', '4297f44b13955235245b2497399d7a93', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'teste220726', 'vinicius', 'diamix', 'vinicius2727@diamix.com.br', '4297f44b13955235245b2497399d7a93', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'vinicius99', 'vinicius', 'diamix', 'vinicius99@diamix.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '23', 'vinicius2 com o nome alterado', 'diamix', 'vinicius000@diamix.com.br', '698dc19d489c4e4db73e28a713eab07b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '223', 'viniciussss', 'diamix', 'vivivi@diamix.com.br', '698dc19d489c4e4db73e28a713eab07b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'vinicius_login', 'Viniciu', 'Diamix', 'vinicius51@diamix.com.br', '202cb962ac59075b964b07152d234b70', 'vinicius_login.png', 'esta é a biografia da minha conta', 'ativo', NULL, 'Shotter, RPG', 'XBOX, PS4', 20, 'Nico', 'Brasil', 'Nonato152', 'nonato.png', '', 'nico.nonato@gmail.com', 'pete_festeiro', '@nonatoon'),
(41, 'test828', 'vinicius', 'diamix', 'teste828@diamix.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'vinicius9999999', 'nome', 'sobrenome', 'vinicius9900@diamix.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'triste', 'vinicius', 'diamix', 'vinicius333@diamix.com.br', '4297f44b13955235245b2497399d7a93', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'alone', 'vinicius', 'diamix', 'vinicius7979@diamix.com.br', '4297f44b13955235245b2497399d7a93', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'testeshow', 'treste', 'teste', 'vinicius928229@diamix.com.br', '4297f44b13955235245b2497399d7a93', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'diddy', 'teste', 'teste', 'vinicius00000@diamix.com.br', '4297f44b13955235245b2497399d7a93', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'bin', 'vinicius', 'diamix', 'vinicius3242@diamix.com.br', '202cb962ac59075b964b07152d234b70', 'bin.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 'zBiin_', ''),
(49, 'teste_teste_teste', 'teste', 'teste2', 'vinicius2828@diamix.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'reuniao', 'reuniao', 'sobrenome', 'reuniao@gmail.com', 'aa1bf4646de67fd9086cf6c79007026c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'teste123322', 'vinicius', 'diamix', 'vinicius780@diamix.com.br', 'aa1bf4646de67fd9086cf6c79007026c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'usuario_dsds_s', 'user', 'teste', 'vinicius32232@diamix.com.br', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'tcc', 'vinicius', 'tcc', 'tcc@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'usuario_tcc', 'vinicius', 'nonato', 'nico.noanto@gmaIl.com', '4297f44b13955235245b2497399d7a93', 'usuario_tcc.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'usuario_tcc_dois', 'vinicius', 'diamix', 'nico.nonato3@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin_usuarios`
--
ALTER TABLE `admin_usuarios`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices para tabela `comentarios_perfil`
--
ALTER TABLE `comentarios_perfil`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Índices para tabela `dados_jogo`
--
ALTER TABLE `dados_jogo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `lista_gamer`
--
ALTER TABLE `lista_gamer`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `relacionamentos`
--
ALTER TABLE `relacionamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`,`usuario`,`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin_usuarios`
--
ALTER TABLE `admin_usuarios`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `comentarios_perfil`
--
ALTER TABLE `comentarios_perfil`
  MODIFY `id_comentario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `lista_gamer`
--
ALTER TABLE `lista_gamer`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `relacionamentos`
--
ALTER TABLE `relacionamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
