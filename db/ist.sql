-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.20 - MySQL Community Server (GPL)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela ist.accounts
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_number` varchar(9) DEFAULT NULL,
  `dtRegister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dtLastUpdate` datetime DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `idPessoaFk` int(10) unsigned DEFAULT NULL,
  `value` decimal(9,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idPessoaFk` (`idPessoaFk`),
  CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`idPessoaFk`) REFERENCES `pessoas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela ist.accounts: ~0 rows (aproximadamente)
DELETE FROM `accounts`;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` (`id`, `account_number`, `dtRegister`, `dtLastUpdate`, `active`, `idPessoaFk`, `value`) VALUES
	(1, '10102020', '2021-06-20 21:34:40', NULL, 'Y', 1, 135.00),
	(2, '556699', '2021-06-20 21:35:28', NULL, 'Y', 2, 0.00),
	(3, '559988', '2021-06-20 21:35:42', NULL, 'Y', 1, 0.00);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;

-- Copiando estrutura para tabela ist.bank_transactions
CREATE TABLE IF NOT EXISTS `bank_transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idAccountFk` int(10) unsigned DEFAULT NULL,
  `dtRegister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `value` decimal(9,2) NOT NULL DEFAULT '0.00',
  `operation` enum('deposito','retirada') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAccountFk` (`idAccountFk`),
  CONSTRAINT `bank_transactions_ibfk_1` FOREIGN KEY (`idAccountFk`) REFERENCES `accounts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela ist.bank_transactions: ~0 rows (aproximadamente)
DELETE FROM `bank_transactions`;
/*!40000 ALTER TABLE `bank_transactions` DISABLE KEYS */;
INSERT INTO `bank_transactions` (`id`, `idAccountFk`, `dtRegister`, `value`, `operation`) VALUES
	(1, 1, '2021-06-20 21:34:47', 150.00, 'deposito'),
	(2, 1, '2021-06-20 21:34:54', 15.00, 'retirada');
/*!40000 ALTER TABLE `bank_transactions` ENABLE KEYS */;

-- Copiando estrutura para tabela ist.pessoas
CREATE TABLE IF NOT EXISTS `pessoas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL DEFAULT '',
  `cpf` varchar(11) NOT NULL DEFAULT '',
  `endereco` text NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `dtRegister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela ist.pessoas: ~19 rows (aproximadamente)
DELETE FROM `pessoas`;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` (`id`, `nome`, `cpf`, `endereco`, `active`, `dtRegister`) VALUES
	(1, 'Marcelo Ramoss', '48349778032', 'Rua Luiz Demo, n 120, Bairro Passagem, TubarÃ£o/SC', 'Y', '2021-06-20 19:48:13'),
	(2, 'Renato Silva', '76537136024', 'Rua Alexandre de SÃ¡, n 98, Bairro Dehon, TubarÃ£o/SC', 'Y', '2021-06-20 19:48:13'),
	(3, 'Maria Cordeiro', '01054804010', 'Rua JÃºlio Pozza, n 450, Bairro SÃ£o JoÃ£o, TubarÃ£o/SC', 'Y', '2021-06-20 19:48:13');
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
