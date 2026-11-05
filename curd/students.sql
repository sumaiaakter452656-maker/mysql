-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2026 at 08:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwad731`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `profile` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `address`, `phone`, `profile`) VALUES
(123, 'sumu', 'sumu@gmail.com', 'dhaka', '0174848', CONCAT('Profile for Sumu. ', REPEAT('This student demonstrates steady effort, curiosity, and respectful collaboration in class. They organize learning tasks, review feedback, ask questions when needed, and contribute constructively to group work. ', 4))),
(127, 'farzana', 'farzana@gmail.com', 'dhaka', '0137423', CONCAT('Profile for Farzana. ', REPEAT('This student demonstrates steady effort, curiosity, and respectful collaboration in class. They organize learning tasks, review feedback, ask questions when needed, and contribute constructively to group work. ', 4)));

-- Add 100 synthetic student records. Each generated profile is over 400 characters.
INSERT INTO `students` (`name`, `email`, `address`, `phone`, `profile`)
SELECT
  CONCAT('Student ', LPAD(student_number, 3, '0')),
  CONCAT('student', LPAD(student_number, 3, '0'), '@example.com'),
  CONCAT('Sample address ', LPAD(student_number, 3, '0'), ', Dhaka, Bangladesh'),
  CONCAT('+8801000', LPAD(student_number, 3, '0')),
  CONCAT(
    'Profile for Student ', LPAD(student_number, 3, '0'), '. ',
    REPEAT('This student demonstrates steady effort, curiosity, and respectful collaboration in class. They organize learning tasks, review feedback, ask questions when needed, and contribute constructively to group work. ', 4)
  )
FROM (
  SELECT ones.digit + tens.digit * 10 + 1 AS student_number
  FROM (
    SELECT 0 AS digit UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
    UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
  ) AS ones
  CROSS JOIN (
    SELECT 0 AS digit UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
    UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
  ) AS tens
) AS generated_students;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
