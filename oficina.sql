-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2025 at 08:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oficina`
--

-- --------------------------------------------------------

--
-- Table structure for table `carros`
--

CREATE TABLE `carros` (
  `id_carro` bigint UNSIGNED NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fabricacao` int NOT NULL,
  `ano` int NOT NULL,
  `cor` enum('Preto','Branco','Vermelho','Azul','Verde','Amarelo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` enum('Toyota','Ford','Nissan','Hyundai','Mitsubishi','Mazda','Land Rover','BMW') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('Civil','Emergência','Policial','Militar','Esportiva','Agrigola','Engenharia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Em Diagnóstico','Aguardando Autorização','Aguardando Peças','Em Manutenção Preventiva','Em Retirada de Componentes','Em Reparação','Em Testes','Pronto para Retirada') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_de_avaria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco_de_avaria` decimal(8,2) NOT NULL,
  `quantidade` int NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `taxa` decimal(8,2) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carros`
--

INSERT INTO `carros` (`id_carro`, `modelo`, `placa`, `fabricacao`, `ano`, `cor`, `marca`, `tipo`, `estado`, `tipo_de_avaria`, `preco_de_avaria`, `quantidade`, `total`, `taxa`, `codigo`, `id_cliente`, `created_at`, `updated_at`) VALUES
(65, 'Rav4', '12HA09', 6532, 2020, 'Preto', 'Toyota', 'Civil', 'Em Diagnóstico', 'Motor;', '0.00', 0, '0.00', '0.00', 'F5FED0DA', 1, '2025-02-05 03:43:50', '2025-02-05 03:43:50'),
(66, 'i10', '28HL3', 5464634, 2020, 'Preto', 'Nissan', 'Civil', 'Em Diagnóstico', 'Motor; Caixa;', '0.00', 0, '0.00', '0.00', '54303132', 1, '2025-02-05 03:53:59', '2025-02-05 03:53:59'),
(67, 'L200', '17LD1', 20001, 2019, 'Vermelho', 'Mitsubishi', 'Civil', 'Em Diagnóstico', 'Motor;', '0.00', 0, '0.00', '0.00', '193DD8F6', 1, '2025-02-05 03:57:46', '2025-02-05 03:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `cidades`
--

CREATE TABLE `cidades` (
  `id_cidade` bigint UNSIGNED NOT NULL,
  `nome_cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UF` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_ibge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cidades`
--

INSERT INTO `cidades` (`id_cidade`, `nome_cidade`, `UF`, `cod_ibge`, `created_at`, `updated_at`) VALUES
(1, 'Lubango', 'Huila', '01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` bigint UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dtnascimento` date NOT NULL,
  `cpf` int NOT NULL,
  `sexo` enum('masculino','feminino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` int NOT NULL,
  `orgaoexpedidor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` int NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int NOT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` int NOT NULL,
  `celular` int NOT NULL,
  `id_cidade` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `dtnascimento`, `cpf`, `sexo`, `rg`, `orgaoexpedidor`, `email`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `telefone`, `celular`, `id_cidade`, `created_at`, `updated_at`) VALUES
(1, 'Nelson Cole', '1994-04-30', 1, 'masculino', 1, '', 'nelsoncole72@gmail.com', 1, '', 123, '', '', 942302639, 942188931, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fi_pagamentos`
--

CREATE TABLE `fi_pagamentos` (
  `id_pagamento` bigint UNSIGNED NOT NULL,
  `valor` double(8,2) NOT NULL,
  `forma_pagamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` bigint UNSIGNED NOT NULL,
  `id_orcamento` bigint UNSIGNED NOT NULL,
  `id_funcionario` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fi_parcelas`
--

CREATE TABLE `fi_parcelas` (
  `id_parcela` bigint UNSIGNED NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `num_parcela` int NOT NULL,
  `data_pagamento` date NOT NULL,
  `data_processamento` date NOT NULL,
  `data_hora_criacao` date NOT NULL,
  `bandeira` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_cartao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forma_pagamento` enum('numerario','prazo','cartao') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pagamento` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` bigint UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_hora` timestamp NOT NULL,
  `status_funcionario` tinyint(1) NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2025_01_26_153801_create_cidades_table', 1),
(3, '2025_01_26_153819_create_clientes_table', 1),
(4, '2025_01_26_154142_create_carros_table', 1),
(5, '2025_01_26_154143_create_servicos_table', 1),
(6, '2025_01_26_154144_create_produtos_table', 1),
(7, '2025_01_26_154148_create_orcamentos_table', 1),
(8, '2025_01_26_154154_create_funcionarios_table', 1),
(9, '2025_01_26_154549_create_fi_pagamentos_table', 1),
(10, '2025_01_26_154552_create_fi_parcelas_table', 1),
(11, '2025_01_26_155117_create_orcamento_servicos_table', 1),
(12, '2025_01_26_155141_create_orcamento_produtos_table', 1),
(13, '2025_01_26_155531_create_ordem_de_servicos_table', 1),
(14, '2025_02_03_000000_create_users_table', 1),
(15, '2025_02_03_100000_create_password_reset_tokens_table', 1),
(16, '2025_02_03_200000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id_orcamento` bigint UNSIGNED NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `status` int NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` bigint UNSIGNED NOT NULL,
  `id_produto` bigint UNSIGNED NOT NULL,
  `id_servico` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orcamento_produtos`
--

CREATE TABLE `orcamento_produtos` (
  `id_orcamento_produto` bigint UNSIGNED NOT NULL,
  `qtd` int NOT NULL,
  `vl_unitario` decimal(8,2) NOT NULL,
  `valor_total` decimal(8,2) NOT NULL,
  `id_produto` bigint UNSIGNED NOT NULL,
  `id_orcamento` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orcamento_servicos`
--

CREATE TABLE `orcamento_servicos` (
  `id_ordem_de_servico` bigint UNSIGNED NOT NULL,
  `qtd` double(8,2) NOT NULL,
  `vl_unitario` double(8,2) NOT NULL,
  `valor_total` double(8,2) NOT NULL,
  `id_servico` bigint UNSIGNED NOT NULL,
  `id_orcamento` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordem_de_servicos`
--

CREATE TABLE `ordem_de_servicos` (
  `id_ordem_servico` bigint UNSIGNED NOT NULL,
  `valor_total` double(8,2) NOT NULL,
  `data_inicio` date NOT NULL,
  `observacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_encerramento` time NOT NULL,
  `status_os` tinyint(1) NOT NULL,
  `id_funcionario` bigint UNSIGNED DEFAULT NULL,
  `id_orcamento` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` bigint UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `unidade_medida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicos`
--

CREATE TABLE `servicos` (
  `id_servico` bigint UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicos`
--

INSERT INTO `servicos` (`id_servico`, `descricao`, `valor`, `created_at`, `updated_at`) VALUES
(1, 'Motor', 20000.00, '2025-02-04 19:03:45', '2025-02-04 19:03:45'),
(2, 'Caixa', 15000.00, '2025-02-04 19:06:26', '2025-02-04 19:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_de_acesso` enum('Administrador','Gerente','Secretário','Técnico','Cliente') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` bigint UNSIGNED DEFAULT NULL,
  `id_funcionario` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `nivel_de_acesso`, `id_cliente`, `id_funcionario`, `created_at`, `updated_at`) VALUES
(1, 'nelsoncole', '200097', NULL, '$2y$12$ixJG5aHdD0qVEGVmN5D0hO8pZe1id0fIsJyJ2ILHIZC4cAiXBFIDC', NULL, 'Administrador', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`id_carro`),
  ADD UNIQUE KEY `carros_placa_unique` (`placa`),
  ADD UNIQUE KEY `carros_fabricacao_unique` (`fabricacao`),
  ADD UNIQUE KEY `carros_codigo_unique` (`codigo`),
  ADD KEY `carros_id_cliente_foreign` (`id_cliente`);

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `clientes_cpf_unique` (`cpf`),
  ADD UNIQUE KEY `clientes_email_unique` (`email`),
  ADD UNIQUE KEY `clientes_cep_unique` (`cep`),
  ADD UNIQUE KEY `clientes_numero_unique` (`numero`),
  ADD UNIQUE KEY `clientes_telefone_unique` (`telefone`),
  ADD UNIQUE KEY `clientes_celular_unique` (`celular`),
  ADD KEY `clientes_id_cidade_foreign` (`id_cidade`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fi_pagamentos`
--
ALTER TABLE `fi_pagamentos`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD KEY `fi_pagamentos_id_cliente_foreign` (`id_cliente`),
  ADD KEY `fi_pagamentos_id_orcamento_foreign` (`id_orcamento`),
  ADD KEY `fi_pagamentos_id_funcionario_foreign` (`id_funcionario`);

--
-- Indexes for table `fi_parcelas`
--
ALTER TABLE `fi_parcelas`
  ADD PRIMARY KEY (`id_parcela`),
  ADD KEY `fi_parcelas_id_pagamento_foreign` (`id_pagamento`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `funcionarios_cpf_unique` (`cpf`),
  ADD UNIQUE KEY `funcionarios_telefone_unique` (`telefone`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id_orcamento`),
  ADD KEY `orcamentos_id_cliente_foreign` (`id_cliente`),
  ADD KEY `orcamentos_id_produto_foreign` (`id_produto`),
  ADD KEY `orcamentos_id_servico_foreign` (`id_servico`);

--
-- Indexes for table `orcamento_produtos`
--
ALTER TABLE `orcamento_produtos`
  ADD PRIMARY KEY (`id_orcamento_produto`),
  ADD KEY `orcamento_produtos_id_produto_foreign` (`id_produto`),
  ADD KEY `orcamento_produtos_id_orcamento_foreign` (`id_orcamento`);

--
-- Indexes for table `orcamento_servicos`
--
ALTER TABLE `orcamento_servicos`
  ADD PRIMARY KEY (`id_ordem_de_servico`),
  ADD KEY `orcamento_servicos_id_orcamento_foreign` (`id_orcamento`),
  ADD KEY `orcamento_servicos_id_servico_foreign` (`id_servico`);

--
-- Indexes for table `ordem_de_servicos`
--
ALTER TABLE `ordem_de_servicos`
  ADD PRIMARY KEY (`id_ordem_servico`),
  ADD KEY `ordem_de_servicos_id_funcionario_foreign` (`id_funcionario`),
  ADD KEY `ordem_de_servicos_id_orcamento_foreign` (`id_orcamento`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id_servico`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_cliente_foreign` (`id_cliente`),
  ADD KEY `users_id_funcionario_foreign` (`id_funcionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carros`
--
ALTER TABLE `carros`
  MODIFY `id_carro` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id_cidade` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fi_pagamentos`
--
ALTER TABLE `fi_pagamentos`
  MODIFY `id_pagamento` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fi_parcelas`
--
ALTER TABLE `fi_parcelas`
  MODIFY `id_parcela` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id_orcamento` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orcamento_produtos`
--
ALTER TABLE `orcamento_produtos`
  MODIFY `id_orcamento_produto` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orcamento_servicos`
--
ALTER TABLE `orcamento_servicos`
  MODIFY `id_ordem_de_servico` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordem_de_servicos`
--
ALTER TABLE `ordem_de_servicos`
  MODIFY `id_ordem_servico` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id_servico` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carros`
--
ALTER TABLE `carros`
  ADD CONSTRAINT `carros_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE;

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_id_cidade_foreign` FOREIGN KEY (`id_cidade`) REFERENCES `cidades` (`id_cidade`) ON DELETE SET NULL;

--
-- Constraints for table `fi_pagamentos`
--
ALTER TABLE `fi_pagamentos`
  ADD CONSTRAINT `fi_pagamentos_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `fi_pagamentos_id_funcionario_foreign` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id_funcionario`) ON DELETE CASCADE,
  ADD CONSTRAINT `fi_pagamentos_id_orcamento_foreign` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamentos` (`id_orcamento`) ON DELETE CASCADE;

--
-- Constraints for table `fi_parcelas`
--
ALTER TABLE `fi_parcelas`
  ADD CONSTRAINT `fi_parcelas_id_pagamento_foreign` FOREIGN KEY (`id_pagamento`) REFERENCES `fi_pagamentos` (`id_pagamento`) ON DELETE CASCADE;

--
-- Constraints for table `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD CONSTRAINT `orcamentos_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `orcamentos_id_produto_foreign` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`) ON DELETE CASCADE,
  ADD CONSTRAINT `orcamentos_id_servico_foreign` FOREIGN KEY (`id_servico`) REFERENCES `servicos` (`id_servico`) ON DELETE CASCADE;

--
-- Constraints for table `orcamento_produtos`
--
ALTER TABLE `orcamento_produtos`
  ADD CONSTRAINT `orcamento_produtos_id_orcamento_foreign` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamentos` (`id_orcamento`) ON DELETE CASCADE,
  ADD CONSTRAINT `orcamento_produtos_id_produto_foreign` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`) ON DELETE CASCADE;

--
-- Constraints for table `orcamento_servicos`
--
ALTER TABLE `orcamento_servicos`
  ADD CONSTRAINT `orcamento_servicos_id_orcamento_foreign` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamentos` (`id_orcamento`) ON DELETE CASCADE,
  ADD CONSTRAINT `orcamento_servicos_id_servico_foreign` FOREIGN KEY (`id_servico`) REFERENCES `servicos` (`id_servico`) ON DELETE CASCADE;

--
-- Constraints for table `ordem_de_servicos`
--
ALTER TABLE `ordem_de_servicos`
  ADD CONSTRAINT `ordem_de_servicos_id_funcionario_foreign` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id_funcionario`) ON DELETE SET NULL,
  ADD CONSTRAINT `ordem_de_servicos_id_orcamento_foreign` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamentos` (`id_orcamento`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_id_funcionario_foreign` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id_funcionario`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
