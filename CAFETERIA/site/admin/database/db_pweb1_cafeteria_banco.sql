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


-- Copiando estrutura do banco de dados para cafeteria
CREATE DATABASE IF NOT EXISTS `cafeteria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cafeteria`;

-- Copiando estrutura para tabela cafeteria.avaliacao
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pedido_id` int NOT NULL,
  `produto_id` int NOT NULL,
  `nota` int NOT NULL,
  `comentario` text COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  KEY `fk_avaliacao_produto` (`produto_id`),
  CONSTRAINT `fk_avaliacao_produto` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela cafeteria.avaliacao: ~1 rows (aproximadamente)
INSERT INTO `avaliacao` (`id`, `pedido_id`, `produto_id`, `nota`, `comentario`) VALUES
	(53, 0, 10, 4, 'Adorei!');

-- Copiando estrutura para tabela cafeteria.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero_pedido` int NOT NULL,
  `nome_cafe` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `valor_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela cafeteria.pedidos: ~1 rows (aproximadamente)
INSERT INTO `pedidos` (`id`, `numero_pedido`, `nome_cafe`, `valor_total`) VALUES
	(24, 2, 'Bolo de milho', 12.00);

-- Copiando estrutura para tabela cafeteria.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `preco_unitario` decimal(20,6) DEFAULT NULL,
  `categoria` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela cafeteria.produto: ~4 rows (aproximadamente)
INSERT INTO `produto` (`id`, `nome`, `preco_unitario`, `categoria`) VALUES
	(9, 'Bolo de chocolate', 12.000000, 'Doces e Tortas'),
	(10, 'Capuccino dourado', 15.000000, 'Cafés'),
	(12, 'Mocca de ouro', 10.000000, 'Cafés'),
	(13, 'croissantt', 10.000000, 'Salgados');

-- Copiando estrutura para tabela cafeteria.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `email` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `senha` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `nivel_acesso` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `login` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela cafeteria.usuario: ~3 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nome`, `email`, `telefone`, `senha`, `nivel_acesso`, `login`) VALUES
	(11, 'Administrador Geral', 'admin@email.com', '49999999999', '$2y$10$8Y2LyE0CpHO4YWIejv/msObRPm/XcUyBO0e/DOd1VpDHJls/QWAQy', 'admin', 'admin'),
	(20, 'Emily', 'emily@email.com', '4999999999', '$2y$10$aKYOOdEGr3Q39xF51gHwJO7PaSRdzTL5YEHxghsaGFx1s0DPPXIEW', '0', 'emily'),
	(23, 'Yasmim', 'yasmim@email', '4999999999', '$2y$10$UrN23KDBnvRZllU4SJ9gWeRjG2GO2Dk52Go3Ej2KBubzeFza.jrAW', 'cliente', 'yasmim123');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
