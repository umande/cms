-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2023 at 02:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uwash`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `distric` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `distric`) VALUES
(1, 'ilemela'),
(2, 'nyamagana'),
(3, 'magu'),
(4, 'misungwi');

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL,
  `password` varchar(128) NOT NULL,
  `last_login` datetime(6) DEFAULT NULL,
  `is_superuser` tinyint(1) NOT NULL,
  `username` varchar(150) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(254) NOT NULL,
  `is_staff` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_joined` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`id`, `password`, `last_login`, `is_superuser`, `username`, `first_name`, `last_name`, `email`, `is_staff`, `is_active`, `date_joined`) VALUES
(1, 'pbkdf2_sha256$600000$iKVS7XNZwz8Tx8C4urWjcR$iDVkklU9fSmYF/uRuD4BVXAcnDwdDWCXwV3zPtpizZo=', '2023-10-29 10:22:17.147539', 1, 'grand', 'habibu', 'jumanne', 'habibujumanne80@gmail.com', 1, 1, '2023-07-09 11:34:00.542881');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `date_booking` varchar(200) NOT NULL,
  `service_booking` varchar(200) NOT NULL,
  `vehicle_type` varchar(200) NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  `vehicle_model` varchar(200) NOT NULL,
  `extra` varchar(200) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `id_company_id` int(11) NOT NULL,
  `customer_id_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `date_booking`, `service_booking`, `vehicle_type`, `vehicle_number`, `vehicle_model`, `extra`, `detail`, `amount`, `id_company_id`, `customer_id_id`, `status`) VALUES
(1, '2023-09-26T08:21', 'standard wash', 'suv', 'T 434 fdd', 'Mazda', 'wax & polish service', 'be care', 1, 2, 1, 3),
(2, '2023-09-28T08:09', 'standard wash', 'minpickup', 'T 434 fdk', 'Hyundan', 'wax & polish service', 'clean all service', 2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `carbrand`
--

CREATE TABLE `carbrand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carbrand`
--

INSERT INTO `carbrand` (`id`, `brand`) VALUES
(1, 'Ford'),
(2, 'Bmw'),
(3, 'Honda'),
(4, 'Toyota'),
(5, 'Volkswagen'),
(6, 'Audi'),
(7, 'Porsche'),
(8, 'Nissan'),
(9, 'Mercedes-benz'),
(10, 'Ferrari'),
(11, 'Aston mortin'),
(12, 'Chevrolet'),
(13, 'Hyundan'),
(14, 'Bentle'),
(15, 'Mazda'),
(16, 'Chrysler'),
(17, 'Fiat'),
(18, 'Jaguar'),
(19, 'Volve'),
(20, 'Jeep'),
(21, 'Lexus'),
(22, 'Mitsubishi'),
(23, 'Dodge'),
(24, 'Alfaromeo'),
(25, 'Tesla');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_certificate` varchar(200) NOT NULL,
  `company_photo` varchar(200) NOT NULL,
  `company_description` longtext NOT NULL,
  `area_id` int(11) NOT NULL,
  `map_id_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_certificate`, `company_photo`, `company_description`, `area_id`, `map_id_id`) VALUES
(1, 'umande', '3w2321', '', '', 1, 1),
(2, 'said', 'R453DD', '1738572090079.png', 'we clean a car as u needs', 1, 1),
(3, 'clasic', 'GG56436', '', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `customer_first_name` varchar(100) NOT NULL,
  `customer_second_name` varchar(100) NOT NULL,
  `customer_last_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `customer_password` varchar(200) NOT NULL,
  `company_id_id` int(11) DEFAULT NULL,
  `id_booking_id` int(11) DEFAULT NULL,
  `id_vehicle_id` int(11) DEFAULT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `customer_first_name`, `customer_second_name`, `customer_last_name`, `customer_email`, `customer_phone`, `customer_address`, `sex`, `customer_password`, `company_id_id`, `id_booking_id`, `id_vehicle_id`, `date`) VALUES
(1, 'habibu', 'jumanne', 'muhangwa', 'habi@gmail.com', '0754234234', 'mecco', 'male', 'pbkdf2_sha256$600000$WPI1yowS4Ni3ocaEncqdNp$YhOltxwzAjpY5hg4SGYofhLtz1AvBykVLSQokVxcngM=', NULL, NULL, NULL, '2023-09-23 16:45:58.243165'),
(2, 'halima', 'said', 'yasini', '', '0754234234', 'nundu', 'female', '', 2, NULL, 1, '2023-09-23 17:48:38.632001');

-- --------------------------------------------------------

--
-- Table structure for table `django_admin_log`
--

CREATE TABLE `django_admin_log` (
  `id` int(11) NOT NULL,
  `action_time` datetime(6) NOT NULL,
  `object_id` longtext DEFAULT NULL,
  `object_repr` varchar(200) NOT NULL,
  `action_flag` smallint(5) UNSIGNED NOT NULL,
  `change_message` longtext NOT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `django_content_type`
--

CREATE TABLE `django_content_type` (
  `id` int(11) NOT NULL,
  `app_label` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `django_content_type`
--

INSERT INTO `django_content_type` (`id`, `app_label`, `model`) VALUES
(1, 'admin', 'logentry'),
(2, 'auth', 'permission'),
(3, 'auth', 'group'),
(4, 'auth', 'user'),
(5, 'contenttypes', 'contenttype'),
(6, 'sessions', 'session'),
(7, 'Admins', 'carbrand'),
(8, 'Admins', 'payment'),
(9, 'Admins', 'schedule'),
(10, 'Admins', 'typeofvehicle'),
(11, 'Admins', 'customer'),
(12, 'Admins', 'map'),
(13, 'Admins', 'booking'),
(14, 'Admins', 'area'),
(15, 'Admins', 'workorder'),
(16, 'Admins', 'worker'),
(17, 'Admins', 'vehicle'),
(18, 'Admins', 'owners'),
(19, 'Admins', 'company'),
(20, 'accounts', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `django_migrations`
--

CREATE TABLE `django_migrations` (
  `id` bigint(20) NOT NULL,
  `app` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `applied` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `django_migrations`
--

INSERT INTO `django_migrations` (`id`, `app`, `name`, `applied`) VALUES
(1, 'contenttypes', '0001_initial', '2023-07-09 11:27:19.188939'),
(2, 'auth', '0001_initial', '2023-07-09 11:27:26.325579'),
(3, 'admin', '0001_initial', '2023-07-09 11:27:28.923934'),
(4, 'admin', '0002_logentry_remove_auto_add', '2023-07-09 11:27:28.948936'),
(5, 'admin', '0003_logentry_add_action_flag_choices', '2023-07-09 11:27:28.959546'),
(6, 'contenttypes', '0002_remove_content_type_name', '2023-07-09 11:27:29.936199'),
(7, 'auth', '0002_alter_permission_name_max_length', '2023-07-09 11:27:30.469484'),
(8, 'auth', '0003_alter_user_email_max_length', '2023-07-09 11:27:30.802790'),
(9, 'auth', '0004_alter_user_username_opts', '2023-07-09 11:27:30.822810'),
(10, 'auth', '0005_alter_user_last_login_null', '2023-07-09 11:27:31.292824'),
(11, 'auth', '0006_require_contenttypes_0002', '2023-07-09 11:27:31.297835'),
(12, 'auth', '0007_alter_validators_add_error_messages', '2023-07-09 11:27:31.362836'),
(13, 'auth', '0008_alter_user_username_max_length', '2023-07-09 11:27:31.856152'),
(14, 'auth', '0009_alter_user_last_name_max_length', '2023-07-09 11:27:32.271324'),
(15, 'auth', '0010_alter_group_name_max_length', '2023-07-09 11:27:32.701573'),
(16, 'auth', '0011_update_proxy_permissions', '2023-07-09 11:27:32.721594'),
(17, 'auth', '0012_alter_user_first_name_max_length', '2023-07-09 11:27:33.222637'),
(18, 'sessions', '0001_initial', '2023-07-09 11:27:33.798429'),
(19, 'Admins', '0001_initial', '2023-07-09 11:29:22.174718'),
(20, 'accounts', '0001_initial', '2023-07-09 11:29:22.584883'),
(21, 'Admins', '0002_alter_company_map_id', '2023-07-10 06:42:53.258742'),
(22, 'Admins', '0003_alter_owners_company_alter_owners_role', '2023-07-10 09:04:17.522044'),
(23, 'Admins', '0004_owners_status', '2023-07-11 05:14:53.513635'),
(24, 'Admins', '0005_alter_customer_customer_phone', '2023-07-12 04:42:44.827285'),
(25, 'Admins', '0006_alter_customer_company_id_alter_customer_id_vehicle', '2023-07-13 07:24:10.106299'),
(26, 'Admins', '0007_customer_date', '2023-07-14 09:25:19.705425'),
(27, 'Admins', '0008_alter_customer_date', '2023-07-14 09:30:16.595492'),
(28, 'Admins', '0009_owners_date_worker_date', '2023-07-14 11:38:54.356885'),
(29, 'Admins', '0010_alter_worker_worker_date_of_bath', '2023-07-20 06:58:15.327857'),
(30, 'Admins', '0011_alter_worker_id_schedule', '2023-07-20 07:03:23.641845'),
(31, 'Admins', '0012_alter_vehicle_vehicle_brand_and_more', '2023-07-20 07:49:08.116135'),
(32, 'Admins', '0002_alter_workorder_area_alter_workorder_booking_and_more', '2023-07-20 17:09:26.569393'),
(33, 'Admins', '0003_alter_workorder_date_order', '2023-07-20 21:08:03.071788'),
(34, 'Admins', '0004_alter_workorder_date_order', '2023-07-20 21:10:12.895507'),
(35, 'Admins', '0002_alter_workorder_date_order', '2023-07-20 22:00:24.666163'),
(36, 'Admins', '0004_alter_workorder_customer', '2023-07-21 02:00:47.222956'),
(37, 'Admins', '0005_alter_customer_company_id', '2023-07-21 09:54:53.595633'),
(38, 'Admins', '0006_remove_schedule_date_schedule_remove_schedule_status_and_more', '2023-07-22 11:15:26.273590'),
(39, 'Admins', '0002_alter_schedule_created', '2023-07-25 01:38:53.741259'),
(40, 'Admins', '0002_alter_booking_amount_alter_booking_customer_id_and_more', '2023-09-30 05:50:48.285775');

-- --------------------------------------------------------

--
-- Table structure for table `django_session`
--

CREATE TABLE `django_session` (
  `session_key` varchar(40) NOT NULL,
  `session_data` longtext NOT NULL,
  `expire_date` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `django_session`
--

INSERT INTO `django_session` (`session_key`, `session_data`, `expire_date`) VALUES
('9aa7n7t4syp1x2qh788ja627oqaok1pj', '.eJxVjDEOwjAQBP_iGlkYXxxMSZ83ROe7DQkgW4qTCvF3iJQC2p2ZfZme12Xs14q5n9RcjDOH3y2xPJA3oHfOt2Kl5GWekt0Uu9Nqu6J4Xnf372DkOn7r0DLAIREFIaeOz4jxFNUpXKTggbbVxvMgjUAwqEjyCjoqBu_JmfcHCe45WA:1qISgY:IfbgCVHD8WJnA7xbuY6wCKt9DHmtiG1r7B56FjPcnVM', '2023-07-23 11:34:38.500800'),
('8iqh8j5578lj29rz85koynxatooynpd9', '.eJxVjDEOwjAQBP_iGlkYXxxMSZ83ROe7DQkgW4qTCvF3iJQC2p2ZfZme12Xs14q5n9RcjDOH3y2xPJA3oHfOt2Kl5GWekt0Uu9Nqu6J4Xnf372DkOn7r0DLAIREFIaeOz4jxFNUpXKTggbbVxvMgjUAwqEjyCjoqBu_JmfcHCe45WA:1qXeTO:ROsRV-8vwhlwd-c__ze8XTo-HFzGCME6V-OijTtWwLA', '2023-09-03 12:11:50.666658'),
('525ia3hvsnfv7u00pjma8vbiffzas97v', '.eJxVjDEOwjAQBP_iGlkYXxxMSZ83ROe7DQkgW4qTCvF3iJQC2p2ZfZme12Xs14q5n9RcjDOH3y2xPJA3oHfOt2Kl5GWekt0Uu9Nqu6J4Xnf372DkOn7r0DLAIREFIaeOz4jxFNUpXKTggbbVxvMgjUAwqEjyCjoqBu_JmfcHCe45WA:1qKELE:rIjlr9pPnqjEE74uvAvCdkQ0jEdc1TB-oZ5DWpQ0kLg', '2023-07-28 08:39:56.485544'),
('6yrrykqj53y0bwqem5h3arg0sfu3n0r2', '.eJxVj00OwiAQhe_C2hAR2opLTUxcuPIAzTAzlWoLpi0r492lCQvdfu8n771FC2nxbZp5ansSB6HE5pc5wCeHVaAHhHuUGMMy9U6uFlnUWV4j8XAs3r8CD7PP6boBZqidMTUaRQr2bO3OkiJW1tSauWmo0tBhhYzcEaLTxGZL3Glt1lXnACPnKg-udymDWwGPNEIInMkUBy4fTuPrkmerzxdwhUnh:1qhNeo:XB0pHRz3LUo92o3IoIrCwJDA0e4stu1oF8zt0kJvrPg', '2023-09-30 08:15:50.856387'),
('2rbxs43piy9a18ceioqsvn81efdwuzba', '.eJxVT70OgjAQfpfOhFhaQJyMJiQOTj4AufYOqFIwLUzGd7dNOuD4_d53H9bBto7d5sl1BtmJcZbtOQX6RXMU8AnzsOR6mVdnVB4teVJ9fl-Qpkvy_hWM4MeQrmoggkpJWWnJkcORmqZokCPxRlaCqK6xFNDrUpOmHrVWAkkekHohZFzVzmApVIF1JsBHgh5MPOmWidL8q33fwuIiY5tPphGUOQ8WzBQesCwq5NqdqLZExiT__gBn8Vrb:1qkZ7g:eDVjXv0WzVdumcANeeK8XDVGHafZzk6tcuBe3m5Sn68', '2023-10-09 00:06:48.234197'),
('6zn5wtgds4mxlpdshflc8k53dab3gb8x', '.eJxVjk0OwiAQhe_C2jQilIpLTUxcuPIAzcBMLdqCgXZlvLuQsNDlm_cz35v1sC5jvyaKvUN2YJxtfm8G7JN8MfAB_h4aG_wSnWlKpKluaq4BaTrW7N_ACGnMbdUBESgjpbKSI4c9ab3TyJG4lkoQdR22AgbbWrI0oLVGIMkt0iCELFRnDzPlKZijy_JWZQJXXsYwUcU_za9LJt59vvAdR9M:1qx4Tj:-gOk_QMz9sxFDsZzxE5Tfr3-naibNbT1rzB-prSQchc', '2023-11-12 12:01:15.976726'),
('m0a6sqmkvlkzrqq9p81lkfkil7ihlq3a', '.eJxVT8sOgjAQ_JeeCbG0gHgymph48OQHkG13gSothsLJ-O-2SU3kOI-dnXmz1TuwxA5sAGWOvQUz5nqyLAsKzZc_Ua2JvCI78Iy1sC5DG4nWBIZxtuEU6Ce5KOADXD-FVLfMRuXRkifV57cJaTwl7yZgAD-E66oGIqiUlJWWHDnsqWmKBjkSb2QliOoaSwGdLjVp6lBrJZDkDqkTQsZWvxVgZxPgPUEPJr6cp5FS_bN9xXHF5wu-fVrb:1qrFeb:t9yYD1vQUOGfEPtQtrjdxKfif4_j0wtgU6jTTFaySfk', '2023-10-27 10:44:25.924490');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id` int(11) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id`, `lat`, `lng`) VALUES
(1, '-3.362423', '36.674489'),
(2, '-3.363329', '36.674489'),
(3, '-3.362459', '36.678517');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id_owner` int(11) NOT NULL,
  `owner_first_name` varchar(200) NOT NULL,
  `owner_second_name` varchar(200) NOT NULL,
  `owner_last_name` varchar(200) NOT NULL,
  `owner_email` varchar(200) NOT NULL,
  `owner_phone` varchar(200) NOT NULL,
  `owner_address` varchar(200) NOT NULL,
  `owner_password` varchar(200) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `role` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id_owner`, `owner_first_name`, `owner_second_name`, `owner_last_name`, `owner_email`, `owner_phone`, `owner_address`, `owner_password`, `sex`, `role`, `image`, `company_id`, `status`, `date`) VALUES
(1, 'habibu', 'jumanne', 'muhangwa', 'habibu@gmail.com', '0752932680', 'mwanza', 'pbkdf2_sha256$600000$RCsIqrAGYobPDKfDKuhSqf$Ulv2JXmOp4ozCz8ws9h4DgKOba4hGey7ealf3hdiyyU=', 'male', '1', '', 1, '1', '2023-08-23 16:38:10.790838'),
(2, 'amri', 'said', 'shaban', 'amri@gmail.com', '0754342123', 'mwanza', 'pbkdf2_sha256$600000$kSE4FkDWlwiQqKEcVpQGr6$XeamKaGQ8YHRzx82HxXB8Lz38vbhQmRftVC1PO9NfIU=', 'male', '1', '', 2, '2', '2023-09-23 16:39:32.691232'),
(3, 'hilal', 'habibu', 'jumanne', 'hilal@gmail.com', '0610234232', 'mwanza', 'pbkdf2_sha256$600000$F16ANzUAGIV3PikSm6CkUd$2MqQiiLT8SZkufkEK9JbEWjJaT/PnnMec0Y0NMs4YbU=', 'male', '1', '', 3, '1', '2023-09-23 16:54:42.881335');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_payment` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `amount`, `date_payment`, `image`) VALUES
(1, 2000, '2023-09-30', '1536383285149.png'),
(2, 2000, '2023-10-13', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `workorder_id` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `worker_id`, `workorder_id`, `created`) VALUES
(1, 1, 1, '2023-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `typeofvehicle`
--

CREATE TABLE `typeofvehicle` (
  `id` int(11) NOT NULL,
  `types` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typeofvehicle`
--

INSERT INTO `typeofvehicle` (`id`, `types`, `amount`) VALUES
(1, 'Sedan', 5000),
(2, 'Coupe', 15000),
(3, 'Sport car', 13000),
(4, 'Station wagon', 14000),
(5, 'Hatchback', 8000),
(6, 'Convertible', 18000),
(7, 'Sport utility vehicle', 20000),
(8, 'Minvan', 13000),
(9, 'Pickup', 9000),
(10, 'Minbus', 7000),
(11, 'Center', 18000);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id_vehicle` int(11) NOT NULL,
  `vehicle_owner_number` varchar(100) NOT NULL,
  `vehicle_brand_id` int(11) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id_vehicle`, `vehicle_owner_number`, `vehicle_brand_id`, `vehicle_type_id`) VALUES
(1, 't 342 cgf', 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id` int(11) NOT NULL,
  `worker_first_name` varchar(100) NOT NULL,
  `worker_second_name` varchar(100) NOT NULL,
  `worker_last_name` varchar(100) NOT NULL,
  `worker_address` varchar(100) NOT NULL,
  `worker_email` varchar(100) NOT NULL,
  `worker_date_of_bath` varchar(200) NOT NULL,
  `worker_phone` varchar(20) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `worker_first_name`, `worker_second_name`, `worker_last_name`, `worker_address`, `worker_email`, `worker_date_of_bath`, `worker_phone`, `sex`, `id_schedule`, `owner_id`, `date`) VALUES
(1, 'omary', 'ally', 'ally', 'mecco', 'omary@gmail.com', '1990-07-05', '0645343565', 'male', 0, 2, '2023-09-23 17:04:56.322715');

-- --------------------------------------------------------

--
-- Table structure for table `workorder`
--

CREATE TABLE `workorder` (
  `id_order` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `date_order` datetime(6) NOT NULL,
  `type_order` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `worker_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workorder`
--

INSERT INTO `workorder` (`id_order`, `customer_id`, `date_order`, `type_order`, `status`, `area_id`, `booking_id`, `worker_id`) VALUES
(1, 2, '2023-09-23 17:48:38.649509', 'offline', 2, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `booking_customer_id_id_4cd54321` (`customer_id_id`),
  ADD KEY `booking_id_company_id_adc0c7ed` (`id_company_id`);

--
-- Indexes for table `carbrand`
--
ALTER TABLE `carbrand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_area_id_dfaae693` (`area_id`),
  ADD KEY `company_map_id_id_9a72a400` (`map_id_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `customer_id_booking_id_c0e2ed39` (`id_booking_id`),
  ADD KEY `customer_id_vehicle_id_75df217a` (`id_vehicle_id`),
  ADD KEY `customer_company_id_id_5c8b49db` (`company_id_id`);

--
-- Indexes for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `django_admin_log_content_type_id_c4bce8eb` (`content_type_id`),
  ADD KEY `django_admin_log_user_id_c564eba6` (`user_id`);

--
-- Indexes for table `django_content_type`
--
ALTER TABLE `django_content_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `django_content_type_app_label_model_76bd3d3b_uniq` (`app_label`,`model`);

--
-- Indexes for table `django_migrations`
--
ALTER TABLE `django_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `django_session`
--
ALTER TABLE `django_session`
  ADD PRIMARY KEY (`session_key`),
  ADD KEY `django_session_expire_date_a5c62663` (`expire_date`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id_owner`),
  ADD KEY `owner_company_id_9b04fb2d` (`company_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indexes for table `typeofvehicle`
--
ALTER TABLE `typeofvehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id_vehicle`),
  ADD KEY `vehicle_vehicle_brand_id_cc396976` (`vehicle_brand_id`),
  ADD KEY `vehicle_vehicle_type_id_35809327` (`vehicle_type_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_owner_id_c214a28b` (`owner_id`);

--
-- Indexes for table `workorder`
--
ALTER TABLE `workorder`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `workorder_area_id_fb5c7a7e` (`area_id`),
  ADD KEY `workorder_booking_id_0fe03042` (`booking_id`),
  ADD KEY `workorder_worker_id_cc3e4c4e` (`worker_id`),
  ADD KEY `workorder_customer_id_e7d37ed6` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carbrand`
--
ALTER TABLE `carbrand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `django_content_type`
--
ALTER TABLE `django_content_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `django_migrations`
--
ALTER TABLE `django_migrations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `typeofvehicle`
--
ALTER TABLE `typeofvehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id_vehicle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workorder`
--
ALTER TABLE `workorder`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
