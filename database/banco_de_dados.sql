-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_pweb2_cafeteria
CREATE DATABASE IF NOT EXISTS `db_pweb2_cafeteria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_pweb2_cafeteria`;

-- Copiando estrutura para tabela db_pweb2_cafeteria.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.cache: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_pweb2_cafeteria.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.cache_locks: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_pweb2_cafeteria.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.categoria: ~3 rows (aproximadamente)
INSERT INTO `categoria` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Doces e tortas', '2026-10-24 03:18:35', '2026-10-24 03:18:35'),
	(2, 'Salgados', '2026-10-24 03:18:35', '2026-10-24 03:18:35'),
	(3, 'Cafés', '2026-10-24 03:18:35', '2026-10-24 03:18:35');

-- Copiando estrutura para tabela db_pweb2_cafeteria.cupons
CREATE TABLE IF NOT EXISTS `cupons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `produto_id` bigint unsigned NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desconto_percentual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cupons_codigo_unique` (`codigo`),
  KEY `cupons_produto_id_foreign` (`produto_id`),
  CONSTRAINT `cupons_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.cupons: ~5 rows (aproximadamente)
INSERT INTO `cupons` (`id`, `produto_id`, `codigo`, `desconto_percentual`, `created_at`, `updated_at`) VALUES
	(1, 11, 'CUPOM-058CJ', 16, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(2, 12, 'CUPOM-065LF', 12, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(3, 13, 'CUPOM-009PG', 17, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(4, 14, 'CUPOM-161KC', 20, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(6, 1, '7', 10, '2026-10-24 03:19:43', '2026-10-24 03:20:08');

-- Copiando estrutura para tabela db_pweb2_cafeteria.fornecedores
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendedor` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.fornecedores: ~5 rows (aproximadamente)
INSERT INTO `fornecedores` (`id`, `razao_social`, `cnpj`, `vendedor`, `telefone`, `created_at`, `updated_at`) VALUES
	(1, 'Marinho-Corona', '29.294.694/0001-07', 'Dr. Thales Faria Camacho', '(93) 92093-2337', '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(2, 'Zaragoça-Abreu', '91.430.248/0001-48', 'Márcio Bernardo Balestero Sobrinho', '(99) 2568-1460', '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(3, 'Prado e Molina e Filhos', '74.101.284/0001-49', 'Srta. Sueli Gonçalves', '(86) 2011-7261', '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(4, 'Fontes Comercial Ltda.', '39.942.388/0001-85', 'Iasmin Mariah Pena', '(61) 2540-6823', '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(5, 'Casanova Comercial Ltda.', '50.976.755/0001-02', 'Juliano Rodrigues Sobrinho', '(34) 3457-4424', '2026-10-24 03:18:37', '2026-10-24 03:18:37');

-- Copiando estrutura para tabela db_pweb2_cafeteria.funcionarios
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpf` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `funcionarios_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.funcionarios: ~4 rows (aproximadamente)
INSERT INTO `funcionarios` (`id`, `nome`, `email`, `telefone`, `login`, `senha`, `imagem`, `cpf`, `created_at`, `updated_at`) VALUES
	(2, 'Dr. Estêvão Grego', 'jserrano@example.com', '(81) 90227-7268', 'xserra', '$2y$12$2Oo3PQBU8kKYOXVs5jQgAuICP5g91faY5jsaYpWAWRBCEdGDfoDaW', '', '66863102675', '2026-10-24 03:18:37', '2026-10-24 03:21:04'),
	(3, 'Sr. Heitor Fidalgo Vega Jr.', 'kfaria@example.com', '(84) 2917-8333', 'matias.romero', '$2y$12$wrfY1VuFduaCrb./P5KZb.e52ciucNixBN3Ne4rM.4QRuCQmv4el2', '', '23961751601', '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(4, 'Sr. Sergio Pereira Sobrinho', 'vieira.elizabeth@example.net', '(19) 98260-1949', 'martinho.galvao', '$2y$12$VqtMz/8pFNq5qLwSo16ej.xpkX99rRfH7HYM5cKzYSsYFUh2WI9b.', '', '20906425431', '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(5, 'Carlos Gonçalves Sobrinho', 'uazevedo@example.org', '(99) 2305-2651', 'mauro23', '$2y$12$H.pJp2SDa25wZt8a1sr2Ke4M8KbvxXfJNf0zzwYLBnHuzufa49heu', '', '92026908323', '2026-10-24 03:18:37', '2026-10-24 03:18:37');

-- Copiando estrutura para tabela db_pweb2_cafeteria.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.migrations: ~8 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2026_01_16_020000_create_fornecedores_table', 1),
	(2, '2026_08_27_119000_create_categoria_table', 1),
	(3, '2026_08_31_100000_create_funcionario_table', 1),
	(4, '2026_08_31_100001_create_post_table', 1),
	(5, '2026_08_31_100002_create_produto_table', 1),
	(6, '2026_09_04_035455_create_cache_table', 1),
	(7, '2026_09_17_233300_create_sessions_table', 1),
	(8, '2026_10_16_010336_create_cupom_table', 1);

-- Copiando estrutura para tabela db_pweb2_cafeteria.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `numero_pedido` int NOT NULL,
  `produto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_t` decimal(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.post: ~6 rows (aproximadamente)
INSERT INTO `post` (`id`, `numero_pedido`, `produto`, `valor_t`, `created_at`, `updated_at`) VALUES
	(1, 239, 'Pão de queijo', 17.71, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(2, 191, 'Donut de doce de leite', 14.33, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(3, 33, 'Cookie de chocolate', 17.47, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(4, 886, 'Chá gelado de pêssego', 17.33, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(5, 907, 'Donut de doce de leite', 14.64, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(6, 10, 'Chocolate quente', 159.00, '2026-10-24 03:24:40', '2026-10-24 03:24:40');

-- Copiando estrutura para tabela db_pweb2_cafeteria.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco_unit` decimal(16,2) NOT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `imagem` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fornecedor_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_categoria_id_foreign` (`categoria_id`),
  KEY `produto_fornecedor_id_foreign` (`fornecedor_id`),
  CONSTRAINT `produto_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  CONSTRAINT `produto_fornecedor_id_foreign` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.produto: ~14 rows (aproximadamente)
INSERT INTO `produto` (`id`, `nome`, `preco_unit`, `categoria_id`, `imagem`, `fornecedor_id`, `created_at`, `updated_at`) VALUES
	(1, 'Cookie de chocolate', 24.70, 2, 'imagem/produto/20261024230054.jpg', 1, '2026-10-24 03:18:37', '2026-10-24 03:26:59'),
	(2, 'Empada de frango', 17.15, 1, '', 1, '2026-10-24 03:18:37', '2026-10-24 03:26:59'),
	(3, 'Empada de frango', 19.70, 1, '', NULL, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(4, 'Croissant', 16.35, 2, '', NULL, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(5, 'Soda italiana de maçã verde', 23.69, 2, '', NULL, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(6, 'Cheesecake de frutas vermelhas', 18.77, 1, '', NULL, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(7, 'Soda italiana de maçã verde', 10.14, 3, '', NULL, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(8, 'Misto quente', 13.19, 2, '', NULL, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(9, 'Torta de limão', 23.79, 3, '', NULL, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(10, 'Pão de queijo', 20.55, 2, '', NULL, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(11, 'Cheesecake de frutas vermelhas', 15.50, 3, '', NULL, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(12, 'Donut de doce de leite', 19.71, 3, '', NULL, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(13, 'Soda italiana de maçã verde', 21.40, 2, '', NULL, '2026-10-24 03:18:37', '2026-10-24 03:18:37'),
	(14, 'Café americano', 15.74, 1, '', NULL, '2026-10-24 03:18:37', '2026-10-24 03:18:37');

-- Copiando estrutura para tabela db_pweb2_cafeteria.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.sessions: ~2 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('AcgTbVfZElTCmM6lL4nu0gUrrqkwLZzyNitCjPJJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJGTHhRcUd1NExkcDlVN1JFRGNzbHZPbHNVS0w5NktNTUJSc25MWjU0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9mb3JuZWNlZG9yXC9jaGFydCIsInJvdXRlIjoiZm9ybmVjZWRvci5jaGFydCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1792801634),
	('zmsRXIthkvnAU5cKNZpIWjBjFuOFwV4KuigNrd9A', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.143.1 Chrome/150.0.7871.250 Electron/43.7.7 Safari/537.36', 'eyJfdG9rZW4iOiJpZ0NFODhzMXdUeHR1VVdLRmlrUVBja2JURTVIdHJGbGFabWU2UHhXIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wcm9kdXRvIiwicm91dGUiOiJwcm9kdXRvLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1792801306);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
