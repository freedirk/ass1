-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2014 at 11:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbwebs_ass1`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `number_plate` varchar(8) NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`car_id`),
  UNIQUE KEY `car_id_UNIQUE` (`car_id`),
  UNIQUE KEY `number_plate_UNIQUE` (`number_plate`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='details of the cars available to rent' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `make`, `model`, `number_plate`, `category`) VALUES
(1, 'Ford', 'Focus', 'AABD 12D', 'a'),
(2, 'Vauxhall', 'Corsa', 'DSSB 332', '123123'),
(3, 'Mercedes', 'C180', 'IM GAY', '12312312');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1416146181),
('m140209_132017_init', 1416146290),
('m140403_174025_create_account_table', 1416146292),
('m140504_113157_update_tables', 1416146298),
('m140504_130429_create_token_table', 1416146299),
('m140830_171933_fix_ip_field', 1416146300),
('m140830_172703_change_account_table_name', 1416146300);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
(1, NULL, NULL, 'richardjohnhurd@gmail.com', '01ae0238ef98e2bc7ca1b656ce2d3d6a', NULL, NULL, NULL),
(2, NULL, NULL, 'mcnally486@gmail.com', 'a75830c0f879db61784222b20719eb2d', NULL, NULL, NULL),
(3, NULL, NULL, 'test@test.com', 'b642b4217b34b1e8d3bd915fc65c4452', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  KEY `fk_user_account` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, '1s3AbGGanvVVI5UGsUSQzKIrChJGzUnJ', 1416146543, 0),
(3, '1PUOL5r9KVFOxAgllKNGpq1gQtGDfle9', 1418076928, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `registration_ip` bigint(20) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `role`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
(1, 'freedirk', 'richardjohnhurd@gmail.com', '$2y$10$Afmlq5jVs63h6gKYZmMF8eHPMgCSzZOW9rxabZm7mKVVqbXNhiNci', 'CxwG0g1PwlSn-3KfSoM8SxlLd9SDYNbP', 1, NULL, NULL, 'admin', 0, 1416146542, 1416146542, 0),
(2, 'chris', 'mcnally486@gmail.com', '$2y$10$GFinC649kjJTGwF0qSGvVOhiQ3oqTSLn4au.LQOfnLUKxBwkG5Kou', 'G_ifiP7Od-y6NrHRlLWpVOWJ6rE5zNXb', 1416148470, NULL, NULL, NULL, 0, 1416148470, 1416148470, 0),
(3, 'testuser', 'test@test.com', '$2y$10$smRSbAwE.C1Rki.zeHKHKe4J.Ac9ZimEYB3FzurEPVJrcw8gUJq2a', 'M0E2ScqWtQDHvzWgcsBVYKNWcblUJ7Yh', 1, NULL, NULL, '', 0, 1418076928, 1418076928, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_old`
--

CREATE TABLE IF NOT EXISTS `user_old` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique auto generated user id\n',
  `user_name` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_admin` binary(1) DEFAULT NULL,
  `first_name` varchar(256) DEFAULT NULL,
  `last_name` varchar(256) DEFAULT NULL,
  `address_line_1` varchar(256) NOT NULL,
  `address_line_2` varchar(256) DEFAULT NULL,
  `address _line_3` varchar(256) DEFAULT NULL,
  `town_city` varchar(256) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `email` varchar(256) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User details and privileges storage' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_rental`
--

CREATE TABLE IF NOT EXISTS `user_rental` (
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `rental_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  PRIMARY KEY (`rental_id`),
  KEY `user_id_idx` (`user_id`),
  KEY `car_id_idx` (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Details of the rentals of the cars and the users, with rental periods' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_rental`
--

INSERT INTO `user_rental` (`user_id`, `car_id`, `rental_id`, `date_start`, `date_finish`) VALUES
(1, 1, 1, '0000-00-00', '0000-00-00'),
(1, 1, 2, '0000-00-00', '0000-00-00'),
(1, 3, 3, '0000-00-00', '0000-00-00'),
(1, 1, 4, '0000-00-00', '0000-00-00'),
(1, 1, 5, '2014-12-03', '2014-12-03'),
(2, 1, 6, '2014-12-10', '2014-12-03'),
(1, 1, 7, '2014-12-18', '2014-12-17');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_rental`
--
ALTER TABLE `user_rental`
  ADD CONSTRAINT `car_id` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
