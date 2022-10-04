-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2022 at 09:27 AM
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
('123456789'),
('Ab123456789');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `username` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
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

INSERT INTO `user_details` (`username`, `address`, `hash`) VALUES
('Erik', 'Paradisäppelvägen 111', '$2y$10$6jy7iQq9ISiB.PzBUmEQLeB9q9C295hT17YNazXJTpsYPCF0hQcYO'),
('Hej', 'HJbfhkads', '$2y$10$PgnPdCeSt/L1/ybBIpQPueWNufxoVDpEHQJjY.6paicl3yzUZk5pS'),
('Hjh,newjrl', 'Testvägen 99', '$2y$10$A0CXvJv36Rot8XicxXI0u.LoMqHL9ADbb7QbkTp1yMUb9cuTXowGe'),
('Ida', 'Paradisgatan 8', '$2y$10$g0hRNGnxJC.3NqcUNgNjV.Jsr7pFsQ00Xq74rR/ENFYFRM827jjxi'),
('Isak', 'Paradisäppelvägen 113', '$2y$10$HqRJMczrOLZPTppuBQz5burmBkQcXju5.cbAiEYVBdxKtKPm7AH/K');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
