-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 30-Jun-2022 às 15:53
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
  `peso_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `e_destaque` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`id_cardapio`, `nome_produto`, `preco_produto`, `descricao_produto`, `peso_produto`, `id_categoria`, `e_destaque`) VALUES
(1, 'Hambúrguer ', 7.99, 'Pão, hambúrguer e picles com ketchup e mostarda', 90, 1, 0),
(2, 'Hambúrguer Duplo', 12.99, 'Dois pães, dois hambúrgueres, picles e condimentos', 150, 1, 0),
(3, 'Hambúrguer Veggie', 15.99, 'Pão vegano e hambúrguer feito de proteína de soja', 90, 2, 1),
(4, 'Batata Frita', 5.99, 'Deliciosas batatas selecionadas, fritas e crocantes', 400, 4, 0),
(5, 'Água Mineral', 2.99, 'Água sem gás', 500, 6, 0),
(6, 'Sundae ', 8.99, 'Sorvete de baunilha com cobertura de chocolate ', 200, 5, 0),
(7, 'Casquinha', 3.99, 'Sorvete de baunilha em uma casquinha crocante', 90, 5, 0),
(8, 'Hambúrguer com Queijo Triplo', 14.99, 'Um hambúrguer (100% carne bovina), queijo cheddar', 200, 3, 0),
(9, 'Drink de morango', 16.99, 'Vodka, pedras de gelo, leite condensado e morango', 500, 7, 1),
(10, 'Porção de camarão e fritas', 39.99, '250g de batata e 250g de camarão', 500, 4, 1),
(11, 'Pepsi Lata', 5.99, 'Uma lata de Pepsi ', 350, 6, 1),
(12, 'Steak Power com Fritas e Onion Rings', 19.99, 'Hambúrguer gormet acompanhado por batatas e onion rings', 500, 3, 1),
(13, 'Chicken Dream', 13.99, 'Hambúrguer de frango  ', 400, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Hambúrgueres Simples'),
(2, 'Hambúrgueres Veganos'),
(3, 'Hambúrgueres Gourmet'),
(4, 'Porções'),
(5, 'Sobremesa'),
(6, 'Bebidas'),
(7, 'Drinks');

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
-- Estrutura da tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cardapio` int(11) NOT NULL,
  `observacao_pedido` varchar(100) DEFAULT NULL,
  `quantidade_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `id_cardapio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nota` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `custo_pedido` float NOT NULL,
  `troco_usuario` float DEFAULT NULL,
  `id_entregador` int(11) NOT NULL,
  `concluido` tinyint(1) NOT NULL,
  `hora_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `hora_entrega` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_imagem`
--

CREATE TABLE `produto_imagem` (
  `id_produto` int(11) NOT NULL,
  `imagem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto_imagem`
--

INSERT INTO `produto_imagem` (`id_produto`, `imagem`) VALUES
(1, '../../assets/cardapio/1.jpeg'),
(2, '../../assets/cardapio/2.jpg'),
(3, '../../assets/cardapio/3.jpg'),
(4, '../../assets/cardapio/4.jpg'),
(5, '../../assets/cardapio/5.jpg'),
(6, '../../assets/cardapio/6.png'),
(7, '../../assets/cardapio/7.jpg'),
(8, '../../assets/cardapio/8.jpg'),
(9, '../../assets/cardapio/9.jpg'),
(10, '../../assets/cardapio/10.png'),
(11, '../../assets/cardapio/11.jpg'),
(12, '../../assets/cardapio/12.png'),
(13, '../../assets/cardapio/13.jpg');

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
  `cpf_usuario` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `endereco_usuario`, `numero_cartao`, `cpf_usuario`) VALUES
(1, 'Ronaldo fenômeno', 'fenomeno.bom@gmail.com', 'ronaldobomdebola', 'Rua Santo Ronaldo', 12344321, 884991023),
(2, 'Edson Arantes do Nascimento ', 'EdsonPele@yahoo.com', 'pelezinho', 'Rua Pele Barbosa', 9844321, 6483612),
(3, 'Scrooge McDuck', 'tiopatinhas@gmail.com', 'dinheiro', 'Disneyland city', 10000000, 9867785),
(4, 'Jotaro Kujo', 'ORAORAORA@outlook.com', 'DIOOO', 'Rua Hirohiko Araki', 990987698, 9005002),
(5, 'Dio Brando', 'MUDAMUDAMUDA@gmail.com', 'Theworld', 'Rua Ronnie James Dio ', 9908876, 5563223),
(6, 'Jonathan Calleri', 'jonathancalleri@gmail.com', '123', 'Avenida Brasil, 123', NULL, 28138712321),
(7, 'Cleiton Martins', 'showdebola@yahoo.com', 'DenilsonShow', 'Rua XV de Novembro, 47', NULL, 83271912839),
(8, 'José Bonifácio', 'bonijose@facio.com', 'senhadaora', 'Rua Netuno, 84', 42398194, 82371328152),
(9, 'João Batatas', 'batatas@email.com', 'abc', 'Rua Florianópolis, 47', NULL, 7231873821),
(10, 'André Felipe', 'meuemail@email.com', 'Senha', 'Rua Marte, 429', NULL, 31203921321);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`id_cardapio`),
  ADD KEY `pedido_categoria` (`id_categoria`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `entregador`
--
ALTER TABLE `entregador`
  ADD PRIMARY KEY (`id_entregador`);

--
-- Índices para tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_cardapio` (`id_cardapio`);

--
-- Índices para tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_cardapio`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_entregador` (`id_entregador`);

--
-- Índices para tabela `produto_imagem`
--
ALTER TABLE `produto_imagem`
  ADD PRIMARY KEY (`id_produto`);

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
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `entregador`
--
ALTER TABLE `entregador`
  MODIFY `id_entregador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto_imagem`
--
ALTER TABLE `produto_imagem`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD CONSTRAINT `pedido_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `itens_pedido_ibfk_2` FOREIGN KEY (`id_cardapio`) REFERENCES `cardapio` (`id_cardapio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_cardapio`) REFERENCES `cardapio` (`id_cardapio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_entregador`) REFERENCES `entregador` (`id_entregador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto_imagem`
--
ALTER TABLE `produto_imagem`
  ADD CONSTRAINT `produto_imagem` FOREIGN KEY (`id_produto`) REFERENCES `cardapio` (`id_cardapio`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
