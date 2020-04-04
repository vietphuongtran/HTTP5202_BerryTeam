-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2020 at 07:12 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

-- NOTE: add using database "berry_team":
USE berry_team;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berryteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `colleaguesxtasks`
--

CREATE TABLE `colleaguesxtasks` (
  `id` int(11) NOT NULL,
  `colleague_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colleaguesxtasks`
--

INSERT INTO `colleaguesxtasks` (`id`, `colleague_id`, `task_id`) VALUES
(1, 2, 3),
(2, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleaguesxtasks`
--
ALTER TABLE `colleaguesxtasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colleague_id` (`colleague_id`),
  ADD KEY `task_id` (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colleaguesxtasks`
--
ALTER TABLE `colleaguesxtasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `colleaguesxtasks`
--
ALTER TABLE `colleaguesxtasks`
  ADD CONSTRAINT `colleaguesxtasks_ibfk_1` FOREIGN KEY (`colleague_id`) REFERENCES `colleagues` (`id`),
  ADD CONSTRAINT `colleaguesxtasks_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
