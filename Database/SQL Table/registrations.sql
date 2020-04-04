-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2020 at 01:27 PM
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
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `registrationId` int(11) NOT NULL,
  `registeredLogin` varchar(255) NOT NULL,
  `registeredPassword` varchar(255) NOT NULL,
  `registeredName` varchar(255) NOT NULL,
  `registeredEmail` varchar(255) NOT NULL,
  `registeredPhoneNum` tinytext,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`registrationId`, `registeredLogin`, `registeredPassword`, `registeredName`, `registeredEmail`, `registeredPhoneNum`, `isAdmin`) VALUES
(1, 'Mess', '$2y$10$2PT2.S7vJVfIq5k6hO3kH.ZgGltNa9IGvXzeAhMAKZ6GRf8Xx9dYG', 'Carl', 'Carl.Mess@hotmail.com', '6478789877', 0),
(3, 'Jojoja', '$2y$10$IRqFJneD9xLkvfnVx5cIveXF/uDGz6GE3C7lFGN4BcvBeZ.OAO1dW', 'Oswald', 'Mango_man@outlook.com', '9058909899', 0),
(4, 'Patron', '$2y$10$8mOIYn1NAV3QxJgfKuMcSezemqGgVd7iPBTfRqqvAGFxHhQun97Ea', 'Jairo', 'Jairo.p@outlook.com', '6472323565', 0),
(8, 'Pombo', '$2y$10$c9KS8YEZRf9GBmvVqg688ONxFdJDRKbr3EdQQhufMFW/5ViO5kNGe', 'Jose', 'Patron_milan@gmail.com', '9051232321', 0),
(13, 'Oswaldo', '$2y$10$GxXu/ytDaihqxutDfCAg0uJt7E6NjdABOLxUn9gEfsIr2ZruwgUoa', 'Oswaldo', 'sos@lol.com', '7687567676', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registrationId`),
  ADD UNIQUE KEY `registeredLogin` (`registeredLogin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registrationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
