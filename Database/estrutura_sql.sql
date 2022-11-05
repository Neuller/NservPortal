-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Nov-2022 às 13:09
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `database_nserv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(100) DEFAULT NULL,
  `cnpj` varchar(100) DEFAULT NULL,
  `cep` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `uf` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` varchar(100) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `telefone2` varchar(100) DEFAULT NULL,
  `celular` varchar(100) DEFAULT NULL,
  `celular2` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_a_pagar`
--

CREATE TABLE `contas_a_pagar` (
  `id_contas_a_pagar` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fluxo_caixa`
--

CREATE TABLE `fluxo_caixa` (
  `id_caixa` int(11) NOT NULL,
  `id_usuario_entrada` int(10) DEFAULT NULL,
  `qtd_notas_entrada` int(11) DEFAULT NULL,
  `valor_total_notas_entrada` decimal(10,2) DEFAULT NULL,
  `qtd_moedas_entrada` int(11) DEFAULT NULL,
  `valor_total_moedas_entrada` decimal(10,2) DEFAULT NULL,
  `data_referencia` varchar(100) DEFAULT NULL,
  `valor_total_inicial` decimal(10,2) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `id_usuario_saida` int(10) DEFAULT NULL,
  `qtd_notas_saida` int(11) DEFAULT NULL,
  `valor_total_notas_saida` decimal(10,2) DEFAULT NULL,
  `qtd_moedas_saida` int(11) DEFAULT NULL,
  `valor_total_moedas_saida` decimal(10,2) DEFAULT NULL,
  `valor_total_final` decimal(10,2) DEFAULT NULL,
  `retirada` decimal(10,2) DEFAULT NULL,
  `caixa_final` decimal(10,2) DEFAULT NULL,
  `xerox_impressoes` int(10) DEFAULT NULL,
  `acessos` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `ID_Fornecedor` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `RazaoSocial` varchar(100) NOT NULL,
  `Endereco` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefone` varchar(100) NOT NULL,
  `CNPJ` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `preco_servicos`
--

CREATE TABLE `preco_servicos` (
  `id_preco_servico` int(10) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `garantia` varchar(100) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(10) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `garantia` varchar(100) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `preco_instalacao` decimal(10,2) DEFAULT NULL,
  `estoque` int(10) DEFAULT NULL,
  `nf` varchar(10) DEFAULT NULL,
  `ncm` varchar(10) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id_servico` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `ordem_servico` int(10) DEFAULT NULL,
  `tipo_equipamento` varchar(1000) DEFAULT NULL,
  `equipamento` varchar(1000) DEFAULT NULL,
  `observacao` varchar(1000) DEFAULT NULL,
  `servico_realizado` varchar(1000) DEFAULT NULL,
  `id_tecnico` int(10) DEFAULT NULL,
  `serial_number` varchar(500) DEFAULT NULL,
  `garantia` varchar(100) DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `valor_terceiro` decimal(10,2) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `data_saida` varchar(10) DEFAULT NULL,
  `diagnostico` varchar(1000) DEFAULT NULL,
  `nf_emitida` varchar(50) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `data_comunicado` date DEFAULT NULL,
  `itens_cliente_fonte` tinyint(1) DEFAULT NULL,
  `taxa_servico_autorizado` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id_status` int(10) NOT NULL,
  `id_usuario` int(10) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnicos`
--

CREATE TABLE `tecnicos` (
  `id_tecnico` int(10) NOT NULL,
  `nome` varchar(500) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `endereco` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `grupo_usuario` varchar(50) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `id_produto` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `data_venda` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `forma_pagamento` varchar(100) DEFAULT NULL,
  `valor_pagamento` decimal(10,2) DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `troco` decimal(10,2) DEFAULT NULL,
  `saldo_devedor` decimal(10,2) DEFAULT NULL,
  `observacao` varchar(1000) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor_unitario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `contas_a_pagar`
--
ALTER TABLE `contas_a_pagar`
  ADD PRIMARY KEY (`id_contas_a_pagar`);

--
-- Índices para tabela `fluxo_caixa`
--
ALTER TABLE `fluxo_caixa`
  ADD PRIMARY KEY (`id_caixa`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`ID_Fornecedor`);

--
-- Índices para tabela `preco_servicos`
--
ALTER TABLE `preco_servicos`
  ADD PRIMARY KEY (`id_preco_servico`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id_servico`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices para tabela `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`id_tecnico`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contas_a_pagar`
--
ALTER TABLE `contas_a_pagar`
  MODIFY `id_contas_a_pagar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fluxo_caixa`
--
ALTER TABLE `fluxo_caixa`
  MODIFY `id_caixa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `ID_Fornecedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `preco_servicos`
--
ALTER TABLE `preco_servicos`
  MODIFY `id_preco_servico` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id_servico` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `id_tecnico` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
