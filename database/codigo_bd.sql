-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.27-MariaDB-log - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para opti_recipe
CREATE DATABASE IF NOT EXISTS `opti_recipe` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `opti_recipe`;

-- Volcando estructura para tabla opti_recipe.optics_configuration
CREATE TABLE IF NOT EXISTS `optics_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enterprise_name` varchar(100) NOT NULL DEFAULT '0',
  `address` varchar(200) NOT NULL DEFAULT '0',
  `phone_number` varchar(20) NOT NULL DEFAULT '0',
  `optometrist` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla opti_recipe.patients
CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla opti_recipe.pending_invoices
CREATE TABLE IF NOT EXISTS `pending_invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `prescription_folio` varchar(6) DEFAULT NULL,
  `card_type` varchar(10) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `invoice_use` varchar(100) DEFAULT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `in_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`) USING BTREE,
  KEY `prescription_folio` (`prescription_folio`) USING BTREE,
  CONSTRAINT `pending_invoices_ibfk_1` FOREIGN KEY (`prescription_folio`) REFERENCES `prescriptions` (`folio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla opti_recipe.prescriptions
CREATE TABLE IF NOT EXISTS `prescriptions` (
  `prescription_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `folio` varchar(6) NOT NULL,
  `glass_type` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `sphere_left` float DEFAULT NULL,
  `sphere_right` float DEFAULT NULL,
  `cylinder_left` float DEFAULT NULL,
  `cylinder_right` float DEFAULT NULL,
  `axis_left` int(11) DEFAULT NULL,
  `axis_right` int(11) DEFAULT NULL,
  `addition_left` float DEFAULT NULL,
  `addition_right` float DEFAULT NULL,
  `dnp_left` float DEFAULT NULL,
  `dnp_right` float DEFAULT NULL,
  `height_left` float DEFAULT NULL,
  `height_right` float DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`prescription_id`) USING BTREE,
  UNIQUE KEY `folio` (`folio`) USING BTREE,
  KEY `patient_id` (`patient_id`) USING BTREE,
  CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla opti_recipe.recipe_counter
CREATE TABLE IF NOT EXISTS `recipe_counter` (
  `counter_id` int(11) NOT NULL,
  `current_value` int(11) DEFAULT NULL,
  PRIMARY KEY (`counter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla opti_recipe.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
