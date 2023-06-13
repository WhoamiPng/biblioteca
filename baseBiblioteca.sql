/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP DATABASE IF EXISTS `inventario`;
CREATE DATABASE IF NOT EXISTS `inventario` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `inventario`;

CREATE TABLE IF NOT EXISTS `devolucao` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomeLivro` varchar(50) NOT NULL,
  `nomePessoa` varchar(50) NOT NULL,
  `dataDevolucao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

INSERT INTO `devolucao` (`id`, `nomeLivro`, `nomePessoa`, `dataDevolucao`) VALUES
	(20, 'livroteste', 'vinicius', '2023-06-13'),
	(21, 'livroteste', 'vinicius', '2023-06-13'),
	(22, 'livroteste', 'vinicius', '2023-06-13'),
	(23, 'livroteste', 'vinicius', '2023-06-13'),
	(24, 'livroteste', 'vinicius', '2023-06-13'),
	(25, 'livroteste', 'vinicius', '2023-06-13');

CREATE TABLE IF NOT EXISTS `emprestimo` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomeLivro` varchar(50) NOT NULL,
  `nomePessoa` varchar(50) NOT NULL,
  `dataEmprestimo` date NOT NULL,
  `dataPrazo` date NOT NULL,
  `status` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

INSERT INTO `emprestimo` (`id`, `nomeLivro`, `nomePessoa`, `dataEmprestimo`, `dataPrazo`, `status`) VALUES
	(1, 'asd', 'asd', '0000-00-00', '0000-00-00', 'devolvido'),
	(16, 'asddas', 'vininini', '2023-06-01', '1111-11-11', 'devolvido'),
	(17, 'asddas', 'vininini', '2023-06-01', '1111-11-11', 'pendente'),
	(18, 'asddas', 'rffgggsa', '2023-06-01', '2222-02-22', 'pendente'),
	(19, 'asddas', 'ggfsasdas', '2023-06-01', '4444-04-04', 'devolvido'),
	(20, 'asddas', 'viniloko', '2023-06-01', '1111-11-11', 'pendente'),
	(21, 'livroteste', 'vinicius', '2023-06-12', '2024-09-15', 'devolvido'),
	(22, 'livroteste', 'vinicius', '2023-06-13', '2024-07-15', 'devolvido'),
	(23, 'livroteste', 'vinicius', '2023-06-13', '2023-06-30', 'devolvido'),
	(24, 'livroteste', 'vinicius', '2023-06-13', '1111-11-11', 'devolvido'),
	(25, 'livroteste', 'vinicius', '2023-06-13', '1111-11-11', 'devolvido'),
	(26, 'livroteste', 'vinicius', '2023-06-13', '0000-00-00', 'devolvido'),
	(27, 'livroteste', 'vinicius', '2023-06-13', '0000-00-00', 'devolvido'),
	(28, 'livroteste', 'vinicius', '2023-06-13', '1111-11-11', 'pendente');

CREATE TABLE IF NOT EXISTS `livros` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomeLivro` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `qtd` smallint(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `livros` (`id`, `nomeLivro`, `autor`, `genero`, `qtd`) VALUES
	(1, 'asddas', 'pinto', 'saddasdas', 3117),
	(2, 'dsads', 'asdads', 'Literatura Infantil', 213),
	(3, 'livroteste', 'autorteste', 'Estudo do Professor', 50);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
