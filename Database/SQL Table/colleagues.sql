-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2020 at 10:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

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
-- Database: `berry team`
--

-- --------------------------------------------------------

--
-- Table structure for table `colleagues`
--

CREATE TABLE `colleagues` (
  `ID` int(225) NOT NULL,
  `fname` varchar(550) NOT NULL,
  `lname` varchar(550) NOT NULL,
  `department` varchar(550) NOT NULL,
  `phone` varchar(550) NOT NULL,
  `email` varchar(5555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colleagues`
--

INSERT INTO `colleagues` (`ID`, `fname`, `lname`, `department`, `phone`, `email`) VALUES
(1, ' Oswaldo ', 'Brun', 'Game', '4168878988', 'contact@ossy.com'),
(2, 'Ellen', 'Green', 'Design', '4168877055', 'contact@ellen.com'),
(3, 'Rosario', 'Hernandez', 'HR', '68970774003', 'contact@lili.com'),
(4, 'Paul', 'Tran', 'Marketing', '4168837033', 'market@paultran.com'),
(5, 'Paul', 'Lee', 'Marketing', '4168837033', 'market@paultran.com'),
(14, 'Ella', 'Qi', 'Design', '416-999-8888', 'contact@ella.com'),
(15, 'Sandy', 'Sheer', 'Design', '614-999-4325', 'contact@sandy.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleagues`
--
ALTER TABLE `colleagues`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colleagues`
--
ALTER TABLE `colleagues`
  MODIFY `ID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
