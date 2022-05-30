-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 30-Maio-2022 às 03:18
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meats`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `id_cardapio` int(11) NOT NULL,
  `nome_produto` varchar(50) NOT NULL,
  `preco_produto` float NOT NULL,
  `descricao_produto` varchar(250) NOT NULL,
  `categoria_produto` varchar(50) NOT NULL,
  `peso_produto` int(11) NOT NULL,
  `e_destaque` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`id_cardapio`, `nome_produto`, `preco_produto`, `descricao_produto`, `categoria_produto`, `peso_produto`, `e_destaque`) VALUES
(1, 'Hambúrguer ', 7.99, 'Pão, hambúrguer e picles com ketchup e mostarda', 'Hambúrgueres Simples', 90, 0),
(2, 'Hambúrguer Duplo', 12.99, 'Dois pães, dois hambúrgueres, picles e condimentos', 'Hambúrgueres Simples', 150, 0),
(3, 'Hambúrguer Veggie', 15.99, 'Pão vegano e hambúrguer feito de proteína de soja', 'Hambúrgueres Veganos', 90, 1),
(4, 'Batata Frita', 5.99, 'Deliciosas batatas selecionadas, fritas e crocantes', 'Porções ', 400, 0),
(5, 'Água Mineral', 2.99, 'Água sem gás', 'Bebidas', 500, 0),
(6, 'Sundae ', 8.99, 'Sorvete de baunilha com cobertura de chocolate ', 'Sobremesa', 200, 0),
(7, 'Casquinha', 3.99, 'Sorvete de baunilha em uma casquinha crocante', 'Sobremesa', 90, 0),
(8, 'Hambúrguer com Queijo Triplo', 14.99, 'Um hambúrguer (100% carne bovina), queijo cheddar', 'Hambúrgueres Simples', 200, 0),
(9, 'Drink de morango', 16.99, 'Vodka, pedras de gelo, leite condensado e morango', 'Drink', 500, 1),
(10, 'Porção de camarão e fritas', 39.99, '250g de batata e 250g de camarão', 'Porções', 500, 1),
(11, 'Pepsi Lata', 5.99, 'Uma lata de Pepsi ', 'Bebida', 350, 1),
(12, 'Steak Power com Fritas e Onion Rings', 19.99, 'Hambúrguer gormet acompanhado por batatas e onion rings', 'Hambúrgueres Gourmet', 500, 1),
(13, 'Chicken Dream', 13.99, 'Hambúrguer de frango  ', 'Hambúrgueres Simples', 400, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entregador`
--

CREATE TABLE `entregador` (
  `id_entregador` int(11) NOT NULL,
  `nome_entregador` varchar(100) NOT NULL,
  `esta_disponivel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `entregador`
--

INSERT INTO `entregador` (`id_entregador`, `nome_entregador`, `esta_disponivel`) VALUES
(1, 'Leonardo Davinci', 0),
(2, 'Marco Aurélio', 1),
(3, 'Fábio de Aguiar', 1),
(4, 'Dio Brando', 1),
(5, 'Eren Yeager', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cardapio` int(11) NOT NULL,
  `id_entregador` int(11) NOT NULL,
  `quantidade_produto` int(11) NOT NULL,
  `preco_x_quantidade` float NOT NULL,
  `concluido` tinyint(1) NOT NULL,
  `hora_pedido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hora_entrega` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_usuario`, `id_cardapio`, `id_entregador`, `quantidade_produto`, `preco_x_quantidade`, `concluido`, `hora_pedido`, `hora_entrega`) VALUES
(1, 2, 1, 1, 4, 31.96, 1, '2022-05-27 18:44:05', '2022-05-27 18:44:05'),
(2, 2, 2, 3, 10, 129.9, 1, '2022-05-27 18:44:44', '2022-05-27 18:44:44'),
(3, 1, 3, 3, 2, 31.98, 1, '2022-05-27 18:45:25', '2022-05-27 18:45:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `endereco_usuario` varchar(100) NOT NULL,
  `numero_cartao` int(11) DEFAULT NULL,
  `telefone_usuario` int(11) NOT NULL,
  `cpf_usuario` bigint(11) NOT NULL,
  `idade_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `endereco_usuario`, `numero_cartao`, `telefone_usuario`, `cpf_usuario`, `idade_usuario`) VALUES
(1, 'Ronaldo fenômeno', 'fenomeno.bom@gmail.com', 'ronaldobomdebola', 'Rua Santo Ronaldo', 12344321, 994342146, 884991023, 45),
(2, 'Edson Arantes do Nascimento ', 'EdsonPele@yahoo.com', 'pelezinho', 'Rua Pele Barbosa', 9844321, 3412436, 6483612, 81),
(3, 'Scrooge McDuck', 'tiopatinhas@gmail.com', 'dinheiro', 'Disneyland city', 10000000, 13243886, 9867785, 255),
(4, 'Jotaro Kujo', 'ORAORAORA@outlook.com', 'DIOOO', 'Rua Hirohiko Araki', 990987698, 345672121, 9005002, 17),
(5, 'Dio Brando', 'MUDAMUDAMUDA@gmail.com', 'Theworld', 'Rua Ronnie James Dio ', 9908876, 9966544, 5563223, 20),
(6, 'Jonathan Calleri', 'jonathancalleri@gmail.com', '123', 'Avenida Brasil, 123', NULL, 31247214, 28138712321, 28),
(7, 'Cleiton Martins', 'showdebola@yahoo.com', 'DenilsonShow', 'Rua XV de Novembro, 47', NULL, 34873821, 83271912839, 51),
(8, 'José Bonifácio', 'bonijose@facio.com', 'senhadaora', 'Rua Netuno, 84', 42398194, 32981931, 82371328152, 69),
(9, 'João Batatas', 'batatas@email.com', 'abc', 'Rua Florianópolis, 47', NULL, 38219382, 7231873821, 71);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`id_cardapio`);

--
-- Índices para tabela `entregador`
--
ALTER TABLE `entregador`
  ADD PRIMARY KEY (`id_entregador`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `pedido_usuario` (`id_usuario`),
  ADD KEY `pedido_cardapio` (`id_cardapio`),
  ADD KEY `pedido_entregador` (`id_entregador`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `id_cardapio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `entregador`
--
ALTER TABLE `entregador`
  MODIFY `id_entregador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_cardapio` FOREIGN KEY (`id_cardapio`) REFERENCES `cardapio` (`id_cardapio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedido_entregador` FOREIGN KEY (`id_entregador`) REFERENCES `entregador` (`id_entregador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedido_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
