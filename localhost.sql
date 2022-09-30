-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 30 sep 2022 kl 10:48
-- Serverversion: 10.4.21-MariaDB
-- PHP-version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `login`
--
DROP DATABASE IF EXISTS `login`;
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Tabellstruktur `user_details`
--

CREATE TABLE `user_details` (
  `username` varchar(60) NOT NULL,
  `hash` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `user_details`
--

INSERT INTO `user_details` (`username`, `hash`) VALUES
('Erik', '$2y$10$iaOjCNqZMeIGtN5uA.s9duISZUOoCNBw07J5lwERftHFz0w0vDHOi'),
('Ida', '$2y$10$Qdi6SZNXWfdwj2OIeGU7puVhp3Udj.b58Ds2UTXAgQHLVeHvkQkHm'),
('Isak', '$2y$10$Calo.bhfzrgBpBGXKvuS5eAF1woTlBLbEbHSkgiRpBLsD6lx6DI3S');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`username`);
--
-- Databas: `products`
--
DROP DATABASE IF EXISTS `products`;
CREATE DATABASE IF NOT EXISTS `products` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `products`;

-- --------------------------------------------------------

--
-- Tabellstruktur `product_table`
--

CREATE TABLE `product_table` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `product_table`
--

INSERT INTO `product_table` (`id`, `name`, `price`, `img`) VALUES
(1, 'string', '12.00', 'string.jpeg'),
(2, 'transparent', '14.50', 'trans.jpeg');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
