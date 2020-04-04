-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2020 at 04:41 AM
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
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(255) NOT NULL,
  `quotes` text NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'other'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quotes`, `category`) VALUES
(1, '\"The strength of the team is each individual member. The strength of each member is the team.\" ~ Phil Jackson', 'other'),
(2, '\"On this team, we\'re all united in a common goal: to keep my job.\" ~ Lou Holtz', 'other'),
(3, '\"A single leaf working alone provides no shade.\" ~ Chuck Page', 'other'),
(4, '\"If everyone is moving forward together, then success takes care of itself.\" ~ Henry Ford', 'other'),
(5, '\"Trust is knowing that when a team member does push you, they\'re doing it because they care about the team.\" ~ Patrick Lencioni', 'other'),
(6, '\"We must, indeed, all hang together or, most assuredly, we shall all hang separately.\" ~ Benjamin Franklin', 'other'),
(7, '\"Individual commitment to a group effort - that is what makes a team work, a company work, a society work, a civilization work.\" ~ Vince Lombardi', 'other'),
(8, '\"Talent wins games, but teamwork and intelligence wins championships.\" ~ Michael Jordan', 'other'),
(9, '\"Sure, there\'s no \'i\' in team, but there is an \'m\' and an \'e\'.\" ~ Kevin Myers', 'other'),
(10, '\"One man alone can be pretty dumb sometimes, but for real bona fide stupidity, there ain\'t nothing can beat teamwork.\" ~ Edward Abbey', 'other'),
(11, '\"The team, not the individual, is the ultimate champion.\" ~ Mia Hamm', 'other'),
(12, '\"People have been known to achieve more as a result of working with others than against them.\" ~ Allan Fromme', 'other'),
(13, '\"It takes two flints to make a fire.\" ~ Louisa May Alcott', 'other'),
(14, '\"Teamwork is the ability to work together toward a common vision. The ability to direct individual accomplishments toward organizational objectives. It is the fuel that allows common people to attain uncommon results.\" ~ Andrew Carnegie', 'other');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
