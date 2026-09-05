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
	(1, 'Doces e tortas', '2026-09-04 07:16:12', '2026-09-04 07:16:12'),
	(2, 'Salgados', '2026-09-04 07:16:12', '2026-09-04 07:16:12'),
	(3, 'Cafés', '2026-09-04 07:16:12', '2026-09-04 07:16:12');

-- Copiando estrutura para tabela db_pweb2_cafeteria.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.migrations: ~6 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2026_08_27_119000_create_categoria_table', 1),
	(2, '2026_08_31_100000_create_usuario_table', 1),
	(3, '2026_08_31_100001_create_post_table', 1),
	(4, '2026_08_31_100002_create_produto_table', 1),
	(5, '2026_08_31_224138_create_sessions_table', 1),
	(6, '2026_09_04_035455_create_cache_table', 2);

-- Copiando estrutura para tabela db_pweb2_cafeteria.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `numero_pedido` int NOT NULL,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_t` decimal(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.post: ~5 rows (aproximadamente)
INSERT INTO `post` (`id`, `numero_pedido`, `nome`, `valor_t`, `created_at`, `updated_at`) VALUES
	(2, 195, 'Café americano', 13.14, '2026-09-04 07:16:16', '2026-09-04 07:16:16'),
	(3, 760, 'Café gelado', 11.64, '2026-09-04 07:16:16', '2026-09-04 07:16:16'),
	(4, 825, 'Cappuccino', 12.47, '2026-09-04 07:16:16', '2026-09-04 07:16:16'),
	(5, 516, 'Café americano', 18.17, '2026-09-04 07:16:16', '2026-09-04 07:16:16'),
	(6, 50, 'cafe', 20.00, '2026-09-04 19:46:17', '2026-09-04 19:46:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.produto: ~6 rows (aproximadamente)
INSERT INTO `produto` (`id`, `nome`, `preco_unit`, `categoria_id`, `created_at`, `updated_at`) VALUES
	(1, 'Expresso', 25.00, 3, '2026-09-04 07:16:16', '2026-09-04 21:47:40'),
	(2, 'Pão de queijo', 10.60, 2, '2026-09-04 07:16:16', '2026-09-04 20:07:43'),
	(3, 'Croissant', 11.78, 2, '2026-09-04 07:16:16', '2026-09-04 20:07:52'),
	(4, 'Café gelado', 14.71, 3, '2026-09-04 07:16:16', '2026-09-04 07:16:16'),
	(5, 'Mocca', 22.75, 3, '2026-09-04 07:16:16', '2026-09-04 20:08:06'),
	(7, 'teste', 15.00, 3, '2026-09-04 21:47:54', '2026-09-04 21:47:54');

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

-- Copiando dados para a tabela db_pweb2_cafeteria.sessions: ~5 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('0vZExb1HeHynCeBpoD4ncXgSLjtJd7hQgNWYRmgB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJBM1NEV0ZxTndRbzdnV3dXbm9rdzJQc0VMcnJ1UEQweEZNcmNTSEVuIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC91c3VhcmlvIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1788547770),
	('9fnRPo22py3JsJ5L2Od54UHI259WbNlcmCUm4ygu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.136.1 Chrome/148.0.7778.280 Electron/42.10.0 Safari/537.36', 'eyJfdG9rZW4iOiI4MWlQb0ZrWGxrZTlmanh6aWV5aHdGZVk0UEV2a0lBWmQzMUt5cTJLIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wcm9kdXRvIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1788566795),
	('O3a6elZsf6rdWPgivFWjmWYSYgD4I2MgP1sPMIv4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.136.1 Chrome/148.0.7778.280 Electron/42.10.0 Safari/537.36', 'eyJfdG9rZW4iOiI0YWpROUhFZ0plTkZLa3EwZTR5eVJIMmxod2Y5QzVRZUFwZlBKZVhDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wb3N0Iiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1788528508),
	('rR4f0XIPJ94G8Ig4GKRLKpYCJMHufHxKiaxPRvez', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.136.1 Chrome/148.0.7778.280 Electron/42.10.0 Safari/537.36', 'eyJfdG9rZW4iOiJBQ1FlVVRpcVQxRXp4blY4aXFGSVRqT1RrSlozZTM0MEJKaGN1U2V1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wcm9kdXRvIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1788540379),
	('XZSFal7MOPLNo9CkN8KH0udqHiytolVqriYwpYKq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJHcTdTbEpDeWc2OEp2eTBqZHRTdHh2bjBzNGtVUXNhUmZNbXp4aGVyIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wcm9kdXRvIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1788528033);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_cafeteria.usuarios: ~5 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `login`, `senha`, `created_at`, `updated_at`) VALUES
	(1, 'Eric Verdara', 'galvao.paola@example.org', '49999999', 'zmarinho', '$2y$12$RS0GVfqK6TKNKSLofCI7heuUpXU5N7pMiiVWlaaukKmgZDc5R77H.', '2026-09-04 07:16:16', '2026-09-04 07:17:33'),
	(2, 'Gean Fidalgo Torres Neto', 'yespinoza@example.net', '(34) 93351-6947', 'lutero.malu', '$2y$12$OPZYMOHk/WsEbesVl8ITAuhR0XFW0vGQSFwCJvzHbxeyDB2kG9B3a', '2026-09-04 07:16:16', '2026-09-04 07:16:16'),
	(3, 'Ricardo Franco Branco', 'david.matias@example.net', '(73) 97912-0070', 'npereira', '$2y$12$QTL4DU6L/EDRxh0lV8Y0Uu7NYdTAxbHSc7GuKq3KNHRw/6d0RsOgO', '2026-09-04 07:16:16', '2026-09-04 07:16:16'),
	(4, 'Dr. Maya Jéssica Esteves Neto', 'soares.luara@example.net', '(62) 3773-5986', 'joyce.galhardo', '$2y$12$t2deT3I5VyY70dMiiBiXcOlnBhXCByfCflyjAYUNGjQmA8zJEP6fe', '2026-09-04 07:16:16', '2026-09-04 07:16:16'),
	(5, 'Sr. Mauro Toledo', 'thales.faro@example.net', '(65) 94637-3854', 'lsanches', '$2y$12$l59VNjsCEhl6QW9GgPZsr.9b4JgxweItGLcLIZClTH/oqOzCauFhy', '2026-09-04 07:16:16', '2026-09-04 07:16:16');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
