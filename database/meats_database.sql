-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 06-Jul-2022 às 23:34
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
(1, 'X-Burguer', 7.99, 'Pão, hambúrguer, tomate, alface, picles, ketchup e mostarda', 120, 1, 0),
(2, 'Hambúrguer Duplo', 12.99, 'Dois pães, dois hambúrgueres, picles e condimentos', 160, 1, 0),
(3, 'Hambúrguer Veggie', 12.99, 'Pão vegano e hambúrguer feito de proteína de soja', 120, 2, 1),
(4, 'Batata Frita', 22.99, 'Deliciosas batatas selecionadas, macias e crocantes', 400, 4, 0),
(5, 'Água Mineral', 2.99, 'Água sem gás', 500, 6, 0),
(6, 'Sundae ', 6.99, 'Sorvete de baunilha com cobertura de chocolate ', 100, 5, 0),
(7, 'Picolé de Chocolate', 4.99, 'Picolé de chocolate', 80, 5, 0),
(8, 'Hambúrguer com Queijo Triplo', 14.99, 'Um hambúrguer (100% carne bovina), queijo cheddar', 200, 3, 0),
(9, 'Suco de Abacaxi com Hortelã', 6.99, 'Suco de abacaxi com hortelã gelado da polpa <br>(Este produto é entregue em uma garrafa)', 500, 6, 0),
(10, 'Porção de Camarão e Fritas', 34.99, '250g de batata e 250g de camarão', 500, 4, 1),
(11, 'Pepsi Lata', 5.99, 'Uma lata de Pepsi ', 350, 6, 1),
(12, 'Steak Power com Fritas e Onion Rings', 23.99, 'Hambúrguer gourmet acompanhado por batata frita e onion rings', 320, 3, 1),
(13, 'Chicken Dream', 13.99, 'Pão com gergelim, hambúrguer de frango, queijo, alface, tomate e cebola', 140, 1, 1),
(14, 'Hambúrguer Gourmet com Fritas', 24.99, 'Hambúrguer de carne 100% bovina, picles, alface de alta qualidade e molho especial com uma porção de fritas', 290, 3, 1),
(15, 'Sanduíche Light', 15.99, 'Pão de forma integral, fatias de tomate, folhas de alface e um creme de frango.', 140, 8, 0),
(16, 'Baconburger Simples', 12.99, 'Pão, hambúrguer, fatias de bacon e queijo cheddar', 110, 1, 1),
(17, 'Mini Hambúrgueres ', 7.99, 'Três hambúrgueres de frango pequeninhos e fofinhos', 130, 1, 0),
(18, 'Mini Hambúrgueres Veganos', 8.99, 'Três hambúrgueres veganos pequeninhos e fofinhos', 130, 2, 0),
(19, 'Hambúrguer com Repolho Roxo', 18.99, 'Hambúrguer de soja com repolho roxo', 210, 2, 0),
(20, 'Hambúrguer com Cebola Caramelizada', 24.99, 'Hambúrguer de carne 100% bovina, picles e alface de alta qualidade, molho especial e cebola caramelizada', 220, 3, 0),
(21, 'Hambúrguer Australiano ', 23.99, 'Hambúrguer de carne 100% bovina, pão australiano, picles, alface de alta qualidade e molho especial', 220, 3, 0),
(22, 'Poção de Camarão à Milanesa', 38.99, '500 gramas de camarão à milanesa', 500, 4, 0),
(23, 'Porção de Batata Rústica', 26.99, 'Batata assada no ponto coberta com uma camada fina de azeite de oliva e especiarias', 400, 4, 0),
(24, 'Porção de Peixe Frito à Milanesa', 32.99, 'Tilápia e bacalhau fritos à milanesa', 500, 4, 0),
(25, 'Mousse de Morango', 2.99, 'Mousse feito com morango, leite condensado, gelatina e creme de leite', 40, 5, 0),
(26, 'Milkshake de Chocolate', 10.99, 'Milkshake de chocolate com pedaços de biscoito', 400, 5, 0),
(27, 'Coca-Cola - 600ml', 6.99, 'Garrafa de Coca-Cola', 600, 6, 0),
(28, 'Guaraná - 2L', 9.99, 'Garrafa de Guaraná Antarctica', 2000, 6, 0),
(29, 'Suco de Laranja', 7.99, 'Suco de laranja gelado natural <br>(Este produto é entregue em uma garrafa)', 450, 6, 0),
(30, 'Suco de Morango', 7.99, 'Suco de morango gelado natural <br>(Este produto é entregue em uma garrafa)', 450, 6, 0),
(31, 'Schweppes Citrus Lata', 5.99, 'Uma lata de Schweppes Citrus', 350, 6, 0),
(32, 'Strogonoff de Frango', 23.49, 'Arroz, batata palha e strogonoff de frango com champignon', 450, 7, 1),
(33, 'Bolinhos de Chuchu', 11.99, 'Bolinhos saudáveis de chuchu assados', 140, 8, 0),
(34, 'Executivo de Churrasco', 24.99, 'Arroz, batata frita, feijão, farofa e carne de churrasco', 480, 7, 0),
(35, 'Executivo de Frango Grelhado', 21.99, 'Arroz, batata frita, salada, farofa e frango grelhado', 450, 7, 0),
(36, 'Macarrão com Almôndegas', 24.99, 'Macarrão com molho de tomate e almôndegas feitas de carne moída e condimentos', 460, 7, 0);

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
(7, 'Almoços'),
(8, 'Refeições Lights');

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
  `id_item_pedido` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_cardapio` int(11) NOT NULL,
  `observacao_pedido` varchar(100) DEFAULT NULL,
  `quantidade_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itens_pedido`
--

INSERT INTO `itens_pedido` (`id_item_pedido`, `id_pedido`, `id_cardapio`, `observacao_pedido`, `quantidade_produto`) VALUES
(1, 1, 2, 'Gostaria sem picles', 2),
(2, 1, 4, NULL, 1),
(3, 1, 11, NULL, 2),
(4, 2, 8, NULL, 1),
(5, 2, 9, NULL, 1),
(6, 3, 1, 'Gostaria sem mostarda', 1),
(7, 3, 1, NULL, 1),
(8, 3, 5, NULL, 1),
(9, 4, 13, NULL, 1),
(10, 4, 9, 'Quero pouco gelo na bebida', 1),
(11, 5, 3, NULL, 1);

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
  `id_entregador` int(11) DEFAULT NULL,
  `concluido` tinyint(1) NOT NULL,
  `hora_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `hora_entrega` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_usuario`, `custo_pedido`, `troco_usuario`, `id_entregador`, `concluido`, `hora_pedido`, `hora_entrega`) VALUES
(1, 6, 46.95, 100, NULL, 0, '2022-06-30 19:55:00', NULL),
(2, 7, 34.98, 100, NULL, 0, '2022-06-30 19:56:41', NULL),
(3, 3, 21.97, 100, NULL, 0, '2022-06-30 19:59:50', NULL),
(4, 3, 33.98, 100, NULL, 0, '2022-06-30 20:02:30', NULL),
(5, 6, 18.99, 18.99, NULL, 0, '2022-07-06 19:00:52', NULL);

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
(13, '../../assets/cardapio/13.jpg'),
(14, '../../assets/cardapio/14.jpg'),
(15, '../../assets/cardapio/15.jpg'),
(16, '../../assets/cardapio/16.png'),
(17, '../../assets/cardapio/17.jpg'),
(18, '../../assets/cardapio/18.jpg'),
(19, '../../assets/cardapio/19.jpg'),
(20, '../../assets/cardapio/20.jpg'),
(21, '../../assets/cardapio/21.jpg'),
(22, '../../assets/cardapio/22.jpg'),
(23, '../../assets/cardapio/23.jpg'),
(24, '../../assets/cardapio/24.jpg'),
(25, '../../assets/cardapio/25.jpeg'),
(26, '../../assets/cardapio/26.jpg'),
(27, '../../assets/cardapio/27.jpg'),
(28, '../../assets/cardapio/28.jpg'),
(29, '../../assets/cardapio/29.jpg'),
(30, '../../assets/cardapio/30.jpg'),
(31, '../../assets/cardapio/31.jpg'),
(32, '../../assets/cardapio/32.jpg'),
(33, '../../assets/cardapio/33.jpg'),
(34, ' ../../assets/cardapio/34.jpg'),
(35, ' ../../assets/cardapio/35.jpg'),
(36, ' ../../assets/cardapio/36.jpg');

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
  ADD PRIMARY KEY (`id_item_pedido`),
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
  MODIFY `id_cardapio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `entregador`
--
ALTER TABLE `entregador`
  MODIFY `id_entregador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id_item_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produto_imagem`
--
ALTER TABLE `produto_imagem`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
