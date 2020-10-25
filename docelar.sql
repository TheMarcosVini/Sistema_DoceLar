-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Out-2020 às 15:12
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `docelar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe_materiais`
--

CREATE TABLE `classe_materiais` (
  `id_Classe` int(11) NOT NULL,
  `Nome_Classe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `classe_materiais`
--

INSERT INTO `classe_materiais` (`id_Classe`, `Nome_Classe`) VALUES
(27, 'Chapa'),
(28, 'L'),
(29, 'Cola'),
(30, 'Prego'),
(31, 'Parafuso'),
(32, 'Primer'),
(33, 'Verniz'),
(34, 'Finalizador'),
(35, 'Finxador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_Cliente` int(11) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `RG` varchar(12) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Sobrenome` varchar(20) NOT NULL,
  `Data_Nascimento` date NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefone` varchar(14) NOT NULL,
  `Cidade` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Bairro` varchar(30) NOT NULL,
  `Complemento` varchar(50) NOT NULL,
  `Endereco` varchar(50) NOT NULL,
  `CEP` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_Cliente`, `CPF`, `RG`, `Nome`, `Sobrenome`, `Data_Nascimento`, `Email`, `Telefone`, `Cidade`, `Estado`, `Bairro`, `Complemento`, `Endereco`, `CEP`) VALUES
(12, '123.456.789/10', '12.345.678-9', 'Gabriel', 'Cabral', '2020-10-24', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(13, '123.456.789/10', '12.345.678-9', 'Marcos', 'Vinicius', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(14, '123.456.789/10', '12.345.678-9', 'Luigi', 'Del Vecchio', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(15, '123.456.789/10', '12.345.678-9', 'Henrique', 'Michellini ', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(16, '123.456.789/10', '12.345.678-9', 'João ', 'Alburquerque', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(17, '123.456.789/10', '12.345.678-9', 'Vinicius', 'Fortunato', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(18, '123.456.789/10', '12.345.678-9', 'Eric', 'Oliverira', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(19, '123.456.789/10', '12.345.678-9', 'Radija ', 'Mirelle', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(20, '123.456.789/10', '12.345.678-9', 'Jessica', 'Verdi', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(21, '123.456.789/10', '12.345.678-9', 'Caio', 'Faveri', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(22, '123.456.789/10', '12.345.678-9', 'Melissa ', 'Parracho', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(23, '123.456.789/10', '12.345.678-9', 'Henzo', 'Dutra', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(24, '123.456.789/10', '12.345.678-9', 'Paula ', 'Clementino', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(25, '123.456.789/10', '12.345.678-9', 'Michael', 'Garrido', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(26, '123.456.789/10', '12.345.678-9', 'Josefina', 'Flávio', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(27, '123.456.789/10', '12.345.678-9', 'Flávio', 'Jukes', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(28, '123.456.789/10', '12.345.678-9', 'Anny', 'Bilhava', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(29, '123.456.789/10', '12.345.678-9', 'Sara', 'Figueredo', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(30, '123.456.789/10', '12.345.678-9', 'Sandra', 'Mourato', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', ''),
(31, '123.456.789/10', '12.345.678-9', 'Oscar', 'Natal', '0000-00-00', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL,
  `valor_conta` decimal(10,2) DEFAULT NULL,
  `tipo_conta` varchar(50) NOT NULL,
  `data_inicial` varchar(10) DEFAULT NULL,
  `data_final` varchar(10) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `situacao` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`id`, `valor_conta`, `tipo_conta`, `data_inicial`, `data_final`, `descricao`, `situacao`) VALUES
(8, '350.00', 'Luz', '2020-10-24', '2020-10-24', 'Luz', 'aberta'),
(9, '200.00', 'Água', '2020-10-24', '2020-10-24', 'Água', 'aberta'),
(10, '5700.00', 'Material', '2020-10-24', '2020-10-24', 'Materiais', 'aberta'),
(11, '2000.00', 'Material', '2020-10-22', '2020-10-23', 'Outro', 'aberta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pedido`
--

CREATE TABLE `dados_pedido` (
  `quantidade` varchar(20) NOT NULL,
  `ambiente` varchar(200) NOT NULL,
  `acabmat` varchar(200) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `cpf_comprador` varchar(14) NOT NULL,
  `localiza_orc` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `valorUnid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados_pedido`
--

INSERT INTO `dados_pedido` (`quantidade`, `ambiente`, `acabmat`, `valor`, `cpf_comprador`, `localiza_orc`, `id`, `valorUnid`) VALUES
('1', 'Armário 4 Portas', 'Madeira', '4000.00', '123.456.789/10', '281', 14, '4000'),
('0', '', '', '', '123.456.789/10', '281', 15, '0'),
('0', '', '', '', '123.456.789/10', '281', 16, '0'),
('1', 'Armário Pequeno', 'Abeto', '2100.00', '123.456.789/10', '162', 17, '2100'),
('5', 'Cadeira', 'Madeira', '2500.00', '123.456.789/10', '163', 18, '500');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `material` varchar(30) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `classe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `material`, `quantidade`, `classe`) VALUES
(5, 'Chapa_Maciça', 8, 'Chapa'),
(6, 'Finxador_Universal', 10, 'Finxador'),
(7, 'Cola_TekBond', 10, 'Cola'),
(8, 'Prego_Gerdau', 10, 'Prego'),
(9, 'Prego_Com Cabeça', 0, 'Prego'),
(10, 'L_Cantoneira', 10, 'L'),
(11, 'L_Prateleira', 10, 'L');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_Fornecedor` int(11) NOT NULL,
  `CNPJ` varchar(18) NOT NULL,
  `Razao_Social` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefone` varchar(14) NOT NULL,
  `Cidade` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Bairro` varchar(30) NOT NULL,
  `Complemento` varchar(50) NOT NULL,
  `Endereco` varchar(50) NOT NULL,
  `CEP` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_Fornecedor`, `CNPJ`, `Razao_Social`, `Email`, `Telefone`, `Cidade`, `Estado`, `Bairro`, `Complemento`, `Endereco`, `CEP`) VALUES
(2, '', 'Hórus Sistems', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', 'Rua Pastor Hugo Gegembauer', ''),
(3, '', 'Ritz Systems', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', 'Rua Pastor Hugo Gegembauer', ''),
(4, '', 'Icon Tech', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', 'Rua Pastor Hugo Gegembauer', ''),
(5, '', 'Submarino', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', 'Rua Pastor Hugo Gegembauer', ''),
(6, '', 'Americanas', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', 'Rua Pastor Hugo Gegembauer', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_Funcionario` int(11) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Sobrenome` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefone` varchar(14) NOT NULL,
  `Cidade` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Bairro` varchar(30) NOT NULL,
  `Complemento` varchar(50) NOT NULL,
  `Endereco` varchar(50) NOT NULL,
  `CEP` varchar(9) NOT NULL,
  `Data_Admissao` date NOT NULL,
  `Cargo` varchar(15) NOT NULL,
  `Salario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_Funcionario`, `CPF`, `Nome`, `Sobrenome`, `Email`, `Telefone`, `Cidade`, `Estado`, `Bairro`, `Complemento`, `Endereco`, `CEP`, `Data_Admissao`, `Cargo`, `Salario`) VALUES
(3, '123.456.789/10', 'Indira', 'Cesário', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', '', '0000-00-00', 'Cargo', '1000.00'),
(4, '123.456.789/10', 'Mariam', 'Leão', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', '', '0000-00-00', 'Cargo', '1000.00'),
(5, '123.456.789/10', 'Gustavo ', 'Baltazar', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', '', '0000-00-00', 'Cargo', '1000.00'),
(6, '123.456.789/10', 'Íris', 'Carvalho', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', '', '0000-00-00', 'Cargo', '1000.00'),
(7, '123.456.789/10', 'Alba', ' Chaves', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', '', '0000-00-00', 'Cargo', '1000.00'),
(8, '123.456.789/10', 'Taíssa', 'Guedes', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', '', '0000-00-00', 'Cargo', '1000.00'),
(9, '123.456.789/10', 'Adriela', 'Carreiro', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', '', '0000-00-00', 'Cargo', '0.00'),
(10, '123.456.789/10', 'Marcos', 'Palhão', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', '', '0000-00-00', 'Cargo', '1000.00'),
(11, '123.456.789/10', 'Marcio', 'Palhão', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', '', '0000-00-00', 'Cargo', '1000.00'),
(12, '123.456.789/10', 'Bárbara', 'Bolina', 'mudar@email.com', '(00)00000-0000', '', 'Estado', '', '', '', '', '0000-00-00', 'Cargo', '1000.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais`
--

CREATE TABLE `materiais` (
  `id_Material` int(11) NOT NULL,
  `Nome_Material` varchar(30) NOT NULL,
  `fk_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `materiais`
--

INSERT INTO `materiais` (`id_Material`, `Nome_Material`, `fk_classe`) VALUES
(17, 'Maciça', 27),
(18, 'Universal', 35),
(19, 'TekBond', 29),
(20, 'Gerdau', 30),
(21, 'Com Cabeça', 30),
(22, 'Cantoneira', 28),
(23, 'Prateleira', 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento_mestre`
--

CREATE TABLE `orcamento_mestre` (
  `Nome_Cliente` varchar(20) NOT NULL,
  `Sobrenome_Cliente` varchar(20) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Valor_Total` decimal(10,2) NOT NULL,
  `Desconto` int(11) NOT NULL,
  `Valor_Descontado` decimal(10,2) NOT NULL,
  `Numero_Parcelas` int(11) NOT NULL,
  `Forma_Pag` varchar(20) NOT NULL,
  `OBS` varchar(300) NOT NULL,
  `numero_orcamento` int(11) NOT NULL,
  `id_Cliente` int(11) NOT NULL,
  `situacao` varchar(7) DEFAULT 'aberta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orcamento_mestre`
--

INSERT INTO `orcamento_mestre` (`Nome_Cliente`, `Sobrenome_Cliente`, `CPF`, `Valor_Total`, `Desconto`, `Valor_Descontado`, `Numero_Parcelas`, `Forma_Pag`, `OBS`, `numero_orcamento`, `id_Cliente`, `situacao`) VALUES
('Anny', 'Bilhava', '123.456.789/10', '4000.00', 0, '4000.00', 4, 'cartao', '', 1, 28, 'aberta'),
('João ', 'Alburquerque', '123.456.789/10', '2100.00', 0, '2100.00', 2, 'Transferência', '', 2, 16, 'aberta'),
('João ', 'Alburquerque', '123.456.789/10', '2500.00', 0, '2400.00', 12, '', '', 3, 16, 'aberta'),
('Michael', 'Garrido', '123.456.789/10', '0.00', 0, '0.00', 0, '', '', 4, 25, 'fechada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcelas_info`
--

CREATE TABLE `parcelas_info` (
  `id` int(11) NOT NULL,
  `numero_parcela` int(11) NOT NULL,
  `valor_parcela` decimal(10,2) NOT NULL,
  `data_parcela` varchar(30) NOT NULL,
  `localiza_orc` int(11) NOT NULL,
  `chave` varchar(6) NOT NULL,
  `id_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `parcelas_info`
--

INSERT INTO `parcelas_info` (`id`, `numero_parcela`, `valor_parcela`, `data_parcela`, `localiza_orc`, `chave`, `id_Cliente`) VALUES
(1, 1, '1000.00', '10/10/2020', 281, '202010', 28),
(2, 2, '1000.00', '10/11/2020', 281, '202011', 28),
(3, 3, '1000.00', '10/12/2020', 281, '202012', 28),
(4, 4, '1000.00', '10/01/2021', 281, '202101', 28),
(5, 1, '1050.00', 'Transferência', 162, '------', 16),
(6, 2, '1050.00', 'Transferência', 162, '------', 16),
(7, 1, '200.00', '10/10/2020', 163, '202010', 16),
(8, 2, '200.00', '10/11/2020', 163, '202011', 16),
(9, 3, '200.00', '10/12/2020', 163, '202012', 16),
(10, 4, '200.00', '10/01/2021', 163, '202101', 16),
(11, 5, '200.00', '10/02/2021', 163, '202102', 16),
(12, 6, '200.00', '10/03/2021', 163, '202103', 16),
(13, 7, '200.00', '10/04/2021', 163, '202104', 16),
(14, 8, '200.00', '10/05/2021', 163, '202105', 16),
(15, 9, '200.00', '10/06/2021', 163, '202106', 16),
(16, 10, '200.00', '10/07/2021', 163, '202107', 16),
(17, 11, '200.00', '10/08/2021', 163, '202108', 16),
(18, 12, '200.00', '10/09/2021', 163, '202109', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `sexo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `classe_materiais`
--
ALTER TABLE `classe_materiais`
  ADD PRIMARY KEY (`id_Classe`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_Cliente`);

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dados_pedido`
--
ALTER TABLE `dados_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_Fornecedor`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_Funcionario`);

--
-- Índices para tabela `materiais`
--
ALTER TABLE `materiais`
  ADD PRIMARY KEY (`id_Material`),
  ADD KEY `fk_classe` (`fk_classe`);

--
-- Índices para tabela `orcamento_mestre`
--
ALTER TABLE `orcamento_mestre`
  ADD PRIMARY KEY (`numero_orcamento`);

--
-- Índices para tabela `parcelas_info`
--
ALTER TABLE `parcelas_info`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classe_materiais`
--
ALTER TABLE `classe_materiais`
  MODIFY `id_Classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `dados_pedido`
--
ALTER TABLE `dados_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_Fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_Funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `materiais`
--
ALTER TABLE `materiais`
  MODIFY `id_Material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `parcelas_info`
--
ALTER TABLE `parcelas_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `materiais`
--
ALTER TABLE `materiais`
  ADD CONSTRAINT `materiais_ibfk_1` FOREIGN KEY (`fk_classe`) REFERENCES `classe_materiais` (`id_Classe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
