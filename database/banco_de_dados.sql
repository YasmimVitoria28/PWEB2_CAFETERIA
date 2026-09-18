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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.categoria: ~6 rows (aproximadamente)
INSERT INTO `categoria` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Doces e tortas', '2026-09-18 19:51:48', '2026-09-18 19:51:48'),
	(2, 'Salgados', '2026-09-18 19:51:48', '2026-09-18 19:51:48'),
	(3, 'Cafés', '2026-09-18 19:51:48', '2026-09-18 19:51:48'),
	(4, 'Doces e tortas', '2026-09-18 20:02:47', '2026-09-18 20:02:47'),
	(5, 'Salgados', '2026-09-18 20:02:47', '2026-09-18 20:02:47'),
	(6, 'Cafés', '2026-09-18 20:02:47', '2026-09-18 20:02:47');

-- Copiando estrutura para tabela db_pweb2_cafeteria.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2026_08_27_119000_create_categoria_table', 1),
	(2, '2026_08_31_100000_create_usuario_table', 1),
	(3, '2026_08_31_100001_create_post_table', 1),
	(4, '2026_08_31_100002_create_produto_table', 1),
	(5, '2026_09_04_035455_create_cache_table', 1),
	(6, '2026_09_17_233300_create_sessions_table', 1);

-- Copiando estrutura para tabela db_pweb2_cafeteria.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `numero_pedido` int NOT NULL,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_t` decimal(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.post: ~11 rows (aproximadamente)
INSERT INTO `post` (`id`, `numero_pedido`, `nome`, `valor_t`, `created_at`, `updated_at`) VALUES
	(1, 798, 'Cappuccino', 13.11, '2026-09-18 19:51:53', '2026-09-18 19:51:53'),
	(2, 126, 'Bolo de cenoura com chocolate', 13.45, '2026-09-18 19:51:53', '2026-09-18 19:51:53'),
	(3, 900, 'Bolo de cenoura com chocolate', 15.57, '2026-09-18 19:51:53', '2026-09-18 19:51:53'),
	(4, 559, 'Café americano', 12.70, '2026-09-18 19:51:53', '2026-09-18 19:51:53'),
	(5, 536, 'Café americano', 15.47, '2026-09-18 19:51:53', '2026-09-18 19:51:53'),
	(6, 12, 'bolo', 12.00, '2026-09-18 19:52:55', '2026-09-18 19:52:55'),
	(7, 362, 'Expresso', 19.73, '2026-09-18 20:02:51', '2026-09-18 20:02:51'),
	(8, 340, 'Café americano', 11.51, '2026-09-18 20:02:51', '2026-09-18 20:02:51'),
	(9, 721, 'Café gelado', 15.32, '2026-09-18 20:02:51', '2026-09-18 20:02:51'),
	(10, 691, 'Café gelado', 16.88, '2026-09-18 20:02:51', '2026-09-18 20:02:51'),
	(11, 592, 'Cookie de chocolate', 12.06, '2026-09-18 20:02:51', '2026-09-18 20:02:51');

-- Copiando estrutura para tabela db_pweb2_cafeteria.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco_unit` decimal(16,2) NOT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `produto_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.produto: ~10 rows (aproximadamente)
INSERT INTO `produto` (`id`, `nome`, `preco_unit`, `categoria_id`, `created_at`, `updated_at`) VALUES
	(1, 'Mocca', 11.41, 2, '2026-09-18 19:51:53', '2026-09-18 19:51:53'),
	(2, 'Pão de queijo', 23.55, 3, '2026-09-18 19:51:53', '2026-09-18 19:51:53'),
	(3, 'Café americano', 17.12, 1, '2026-09-18 19:51:53', '2026-09-18 19:51:53'),
	(4, 'Cappuccino', 21.50, 2, '2026-09-18 19:51:53', '2026-09-18 19:51:53'),
	(5, 'Bolo de cenoura com chocolate', 13.97, 1, '2026-09-18 19:51:53', '2026-09-18 19:51:53'),
	(6, 'Croissant', 12.70, 2, '2026-09-18 20:02:51', '2026-09-18 20:02:51'),
	(7, 'Expresso', 19.34, 1, '2026-09-18 20:02:51', '2026-09-18 20:02:51'),
	(8, 'Café americano', 23.65, 5, '2026-09-18 20:02:51', '2026-09-18 20:02:51'),
	(9, 'Café gelado', 14.51, 5, '2026-09-18 20:02:51', '2026-09-18 20:02:51'),
	(10, 'Café gelado', 18.29, 5, '2026-09-18 20:02:51', '2026-09-18 20:02:51');

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

-- Copiando dados para a tabela db_pweb2_cafeteria.sessions: ~1 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('0ZcP2WFTk44cucFK5BJVCMuyRHX6CV8EQUlrxOBV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.138.0 Chrome/148.0.7778.280 Electron/42.10.0 Safari/537.36', 'eyJfdG9rZW4iOiJ4SXRaVmJld0REdHFzYTBUQTBYR1NSS0FJSkNIYWFzS3AyRmVRVWl5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wcm9kdXRvIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1789750987);

-- Copiando estrutura para tabela db_pweb2_cafeteria.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.usuarios: ~10 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `login`, `senha`, `created_at`, `updated_at`) VALUES
	(1, 'Angélica Leon Sobrinho', 'ortega.sophia@example.net', '(82) 97923-2799', 'quintana.jacomo', '$2y$12$gHsEGqnLeqelMEse9MA.zOv93xN/KrN2CyuyOLUY2c/CEnC12zyYa', '2026-09-18 19:51:52', '2026-09-18 19:51:52'),
	(2, 'Dr. Joaquim Furtado Sobrinho', 'rvalentin@example.net', '(43) 91390-9758', 'danilo.leon', '$2y$12$GMst9BxN/YHkzK.nJgvowuBln3ngcmmbv40HaWc6MdRRIUGi0AG7a', '2026-09-18 19:51:52', '2026-09-18 19:51:52'),
	(3, 'Luciano Lovato', 'sverdugo@example.com', '(11) 2283-0287', 'luiza99', '$2y$12$7ivVLJPrvHNUoTq08p9cuO7z3SPg7Yet6n5qTt5pfCHFLIhM347Xe', '2026-09-18 19:51:52', '2026-09-18 19:51:52'),
	(4, 'Sr. Enzo da Silva Neto', 'juliano.perez@example.com', '(82) 2110-2401', 'demian.romero', '$2y$12$WmXHXzXkGbbNUW8DpIss4O19L5iO3Q/9MxXcv42iKR0IDHv.zbjLO', '2026-09-18 19:51:52', '2026-09-18 19:51:52'),
	(5, 'Aurora de Freitas Zambrano', 'ketlin86@example.net', '(41) 91145-4423', 'vrico', '$2y$12$OhK7gJdWFtWjBPkZjhqtpuF73PkJWZYAc6/BYReydjpp3056H9oLm', '2026-09-18 19:51:52', '2026-09-18 19:51:52'),
	(6, 'Dr. Poliana Queirós Alcantara Sobrinho', 'melina61@example.org', '(27) 98034-4921', 'emilio.quintana', '$2y$12$VsPOFw721bN4kqC/qOWQL.QTV6Mc4VWweZrqE1AXibqFnXc05IxTO', '2026-09-18 20:02:51', '2026-09-18 20:02:51'),
	(7, 'Emílio Rodrigues', 'rogerio.carvalho@example.org', '(37) 4173-5231', 'elaine.matos', '$2y$12$4E23Il1xTCK9LcxBxmooIO/BGC4kYJc4j4OXvPkXUrlQLyAZLfMhO', '2026-09-18 20:02:51', '2026-09-18 20:02:51'),
	(8, 'Dr. Manuel Júlio Grego', 'cleber.verdugo@example.com', '(93) 93609-5349', 'thalia55', '$2y$12$6gtnyGbtShO/CXzw.20vwuZ1mm8E2Y8OOMuP0yhlH13UZbn7jrb7e', '2026-09-18 20:02:51', '2026-09-18 20:02:51'),
	(9, 'Antônio Ramos Jr.', 'molina.moises@example.net', '(17) 3016-2482', 'dominato.paulo', '$2y$12$PyoICkXHuQOLqtRucTP.x.Pu0g.MqzfUpZ7zak4rF/BvD2dzq0ZPO', '2026-09-18 20:02:51', '2026-09-18 20:02:51'),
	(10, 'Srta. Ornela Burgos Saito', 'serrano.antonella@example.net', '(34) 90602-7965', 'manuel.ferminiano', '$2y$12$hRCYuN43Sx83Bglw/0XCvejbedxGWQxoRECfORDAL2QfH5QuOi10q', '2026-09-18 20:02:51', '2026-09-18 20:02:51');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
