-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2022 at 08:21 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(255) NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id_area`, `district`) VALUES
(1, 'mianzin'),
(2, 'sakina'),
(3, 'ngarenaro'),
(4, 'florida'),
(5, 'kirombelo');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `id_complain` int(11) NOT NULL,
  `date_booking` date NOT NULL,
  `type_booking` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  PRIMARY KEY (`id_booking`),
  KEY `id_complain` (`id_complain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `company_certificate` varchar(100) NOT NULL,
  `company_photo` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_area` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_company`),
  KEY `id_area` (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `company_name`, `company_certificate`, `company_photo`, `company_description`, `id_area`) VALUES
(2, 'grand', 'dfb21c', 'user.png', 'none', 2),
(3, 'carwash max', 'g6x3q9', '625cc748023423.54408095.png', 'gwgwew gweggwge', 2),
(15, 'HS PIXEL', 'hshshsh123', '625cc771594929.96261159.jpg', 'adasdadsadsad', 2),
(16, 'rain car wash', 'h6b3a2c6', '625cc771594929.96261159.jpg', 'qwqmzjfdfnsdfcvxcvz', 3),
(18, 'tanzanight carwash', 'h6b3a2c6', '625c005dea27c9.43984960.jpg', 'wq dcdsj csudc devfvwervervevrevevfwer', 1),
(20, 'Mcgee and Huff LLC', 'Nihil et voluptatem', '625c005dea27c9.43984960.jpg', 'Nihil dolore cupidit', 5),
(21, 'Whitfield and Joyce Trading', 'Sed id dolores ratio', '625cc71f0295a0.19947552.jpg', 'Sit neque harum nos', 5),
(22, 'Edwards and Morin Inc', 'In aliquam asperiore', '625cc748023423.54408095.png', 'Eveniet consequatur', 2),
(23, 'King English Associates', 'Quis molestiae quisq', '625cc771594929.96261159.jpg', 'Ea repudiandae illo', 2);

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

DROP TABLE IF EXISTS `complain`;
CREATE TABLE IF NOT EXISTS `complain` (
  `id_complain` int(11) NOT NULL AUTO_INCREMENT,
  `type_complain` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_complain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `customer_first_name` varchar(100) NOT NULL,
  `customer_second_name` varchar(100) NOT NULL,
  `customer_last_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `customer_phone` varchar(11) NOT NULL,
  `customer_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `id_vehicle` int(11) DEFAULT NULL,
  `id_booking` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id_customer`),
  KEY `id_vehicle` (`id_vehicle`),
  KEY `id_booking` (`id_booking`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `customer_first_name`, `customer_second_name`, `customer_last_name`, `customer_email`, `customer_phone`, `customer_address`, `sex`, `customer_password`, `id_vehicle`, `id_booking`, `company_id`) VALUES
(62, 'habibu', 'jumanne', 'rahimu', NULL, '0752932680', NULL, 'male', '', 37, NULL, 18),
(63, 'hilal', 'habibu', 'jumanne', NULL, '0623657432', NULL, 'male', '', 38, NULL, 18),
(64, 'david', 'cristopher', 'shaban', NULL, '34534534', NULL, 'male', '', 39, NULL, 3),
(65, 'david', 'cristopher', 'DC', '', '09876512', '', 'male', '', 40, NULL, 18),
(66, 'juma', 'Hassan', 'Muhani', NULL, '2020202011', NULL, 'male', '', 41, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `id_owner` int(11) NOT NULL AUTO_INCREMENT,
  `owner_first_name` varchar(100) NOT NULL,
  `owner_second_name` varchar(100) NOT NULL,
  `owner_last_name` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `owner_email` varchar(100) NOT NULL,
  `owner_phone` varchar(11) NOT NULL,
  `owner_address` varchar(100) NOT NULL,
  `owner_password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `id_company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_owner`) USING BTREE,
  KEY `id_company` (`id_company`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id_owner`, `owner_first_name`, `owner_second_name`, `owner_last_name`, `sex`, `owner_email`, `owner_phone`, `owner_address`, `owner_password`, `role`, `id_company`) VALUES
(1, 'habibu', 'jumanne', 'mhangwa', 'male', 'h@gmail.com', '0764063426', 'Arusha', '123', 'Admin', 2),
(12, 'Rabin', 'Hassan', 'Muhani', 'male', 'rabin10@gmail.com', '2020202011', 'mianzini', '123', 'user', 15),
(13, 'david', 'cristopher', 'DC', 'male', 'david@gmail.com', '2020202020', 'samunge', '123', 'user', 16),
(14, 'shaban', 'ally', 'aman', 'male', 'shaban@gmail.com', '0752932680', 'mbeya', '123', 'user', 3),
(16, 'hilal', 'habibu', 'Muhani', 'male', 'hl@gmail.com', '2020202020', 'samunge', '123', 'user', 18),
(18, 'Xander', 'Dean', 'Bradford', 'female', 'duxado@mailinator.com', '+1 (695) 61', 'Numquam voluptas ips', '123', 'user', 20),
(19, 'Shaeleigh', 'Russo', 'Hinton', 'female', 'lebok@gmail.com', '+1 (514) 45', 'Adipisci veniam max', '123', 'user', 21),
(20, 'Zorita', 'Fulton', 'Garza', 'female', 'tinefo@gmail.com', '+1 (977) 24', 'Ullamco aut beatae q', '123', 'user', 22),
(21, 'Rahim', 'Sandoval', 'Meyers', 'female', 'mawog@gmail.com', '+1 (878) 72', 'Omnis deserunt quia', '123', 'user', 23);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `typed_payment` varchar(255) NOT NULL,
  `date_payment` date NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  PRIMARY KEY (`id_payment`),
  KEY `id_order` (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id_schedule` int(11) NOT NULL AUTO_INCREMENT,
  `date_schedule` date NOT NULL,
  PRIMARY KEY (`id_schedule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `id_vehicle` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_owner_number` varchar(100) NOT NULL,
  `vehicle_brand` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_vehicle`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id_vehicle`, `vehicle_owner_number`, `vehicle_brand`) VALUES
(37, 'T 342 wch', 'Subaru'),
(38, 'T 342 wch', 'IST'),
(39, 'T 432 dkp', 'Crown'),
(40, 'T 342 wch', 'Crown'),
(41, 'T 2543', 'Harria');

--
-- Triggers `vehicle`
--
DROP TRIGGER IF EXISTS `cust_car`;
DELIMITER $$
CREATE TRIGGER `cust_car` AFTER INSERT ON `vehicle` FOR EACH ROW begin
update customer set id_vehicle = NEW.id_vehicle where id_vehicle IS NULL;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
CREATE TABLE IF NOT EXISTS `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_first_name` varchar(100) NOT NULL,
  `worker_second_name` varchar(100) NOT NULL,
  `worker_last_name` varchar(100) NOT NULL,
  `worker_address` varchar(100) NOT NULL,
  `worker_email` varchar(255) NOT NULL,
  `worker_date_of_bath` date NOT NULL,
  `worker_phone` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `id_schedule` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_schedule` (`id_schedule`),
  KEY `owner_id` (`owner_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `worker_first_name`, `worker_second_name`, `worker_last_name`, `worker_address`, `worker_email`, `worker_date_of_bath`, `worker_phone`, `sex`, `id_schedule`, `owner_id`) VALUES
(4, 'john', 'jackson', 'meja', 'moshi', 'john@gmail.com', '1995-03-10', '+255 75495634', 'female', NULL, 16),
(6, 'david', 'cristopher', 'moshi', 'samunge', 'david@gmail.com', '1995-03-28', '2020202020', 'male', NULL, 16),
(9, 'juma', 'jumanne', 'shaban', 'sakina', 'faraja@gmail.com', '1995-03-10', '09876512', 'male', NULL, 14),
(12, 'Rabin', 'cristopher', 'moshi', 'mianzin', 'rabin10@gmail.com', '1995-03-10', '09876512', 'male', NULL, 16),
(13, 'juma', 'Hassan', 'rabin', 'samunge', 'juma@gmail.com', '1995-03-28', '09876512', 'male', NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `workorder`
--

DROP TABLE IF EXISTS `workorder`;
CREATE TABLE IF NOT EXISTS `workorder` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_worker` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `type_order` varchar(255) NOT NULL,
  PRIMARY KEY (`id_order`) USING BTREE,
  KEY `id_area` (`id_area`),
  KEY `id_booking` (`id_booking`),
  KEY `id_worker` (`id_worker`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_complain`) REFERENCES `complain` (`id_complain`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`),
  ADD CONSTRAINT `customer_ibfk_3` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicle` (`id_vehicle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `workorder` (`id_order`);

--
-- Constraints for table `worker`
--
ALTER TABLE `worker`
  ADD CONSTRAINT `worker_ibfk_1` FOREIGN KEY (`id_schedule`) REFERENCES `schedule` (`id_schedule`),
  ADD CONSTRAINT `worker_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`id_owner`) ON DELETE CASCADE;

--
-- Constraints for table `workorder`
--
ALTER TABLE `workorder`
  ADD CONSTRAINT `workorder_ibfk_2` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`),
  ADD CONSTRAINT `workorder_ibfk_3` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`),
  ADD CONSTRAINT `workorder_ibfk_4` FOREIGN KEY (`id_worker`) REFERENCES `worker` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
