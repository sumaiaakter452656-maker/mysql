-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2026 at 07:37 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysqlevidende`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `manufacturer_insert_procedure` (IN `m_name` VARCHAR(50) CHARSET utf8mb4, IN `m_address` VARCHAR(100) CHARSET utf8mb4, IN `m_contact` VARCHAR(50) CHARSET utf8mb4)   INSERT INTO manufacturer (id, name, address, contact)
VALUES (NULL, m_name, m_address, m_contact)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `above_50000_producet`
-- (See below for the actual view)
--
CREATE TABLE `above_50000_producet` (
`id` int
,`name` varchar(50)
,`price` int
,`manufacturer_id` int
);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `address`, `contact`) VALUES
(2, 'sonic', '', ''),
(3, 'LG', '', ''),
(8, 'walton', 'dhaka', '1');

--
-- Triggers `manufacturer`
--
DELIMITER $$
CREATE TRIGGER `Manufr_and_product_del` AFTER DELETE ON `manufacturer` FOR EACH ROW DELETE FROM producet WHERE producet.manufacturer_id = OLD.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `producet`
--

CREATE TABLE `producet` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `manufacturer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `producet`
--

INSERT INTO `producet` (`id`, `name`, `price`, `manufacturer_id`) VALUES
(2, 'LG 50 inch', 50000, 2),
(4, 'walton 32 inch', 32000, 1),
(5, 'walton 40 inch', 40000, 1),
(6, 'SONY 40 INCH', 60000, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producet`
--
ALTER TABLE `producet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `producet`
--
ALTER TABLE `producet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

-- --------------------------------------------------------

--
-- Structure for view `above_50000_producet`
--
DROP TABLE IF EXISTS `above_50000_producet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `above_50000_producet`  AS SELECT `producet`.`id` AS `id`, `producet`.`name` AS `name`, `producet`.`price` AS `price`, `producet`.`manufacturer_id` AS `manufacturer_id` FROM `producet` WHERE (`producet`.`price` > 50000) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
