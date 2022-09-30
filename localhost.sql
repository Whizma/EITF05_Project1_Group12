-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2022 at 11:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--
DROP DATABASE IF EXISTS `login`;
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE IF NOT EXISTS `blacklist` (
  `bl_pwd` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `blacklist`
--

TRUNCATE TABLE `blacklist`;
--
-- Dumping data for table `blacklist`
--

INSERT INTO `blacklist` (`bl_pwd`) VALUES
('123456789');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `username` varchar(60) NOT NULL,
  `hash` varchar(60) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `user_details`
--

TRUNCATE TABLE `user_details`;
--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`username`, `hash`) VALUES
('Erik', '$2y$10$iaOjCNqZMeIGtN5uA.s9duISZUOoCNBw07J5lwERftHFz0w0vDHOi'),
('Ida', '$2y$10$Qdi6SZNXWfdwj2OIeGU7puVhp3Udj.b58Ds2UTXAgQHLVeHvkQkHm'),
('Isak', '$2y$10$Calo.bhfzrgBpBGXKvuS5eAF1woTlBLbEbHSkgiRpBLsD6lx6DI3S');
--
-- Database: `products`
--
DROP DATABASE IF EXISTS `products`;
CREATE DATABASE IF NOT EXISTS `products` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `products`;

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE IF NOT EXISTS `product_table` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `product_table`
--

TRUNCATE TABLE `product_table`;
--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`id`, `name`, `price`, `img`) VALUES
(1, 'string', '12.00', 'string.jpeg'),
(2, 'transparent', '14.50', 'trans.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
