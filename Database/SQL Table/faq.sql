-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2020 at 05:09 AM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(100) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(1, 'Can I integrate Berry Calendar with Google Calendar?', 'Yes you can. To start enable the Berry Calendar feed and find the Berry Calendar URL for your board.\r\n\r\nOpen the board menu\r\nUnder \"Power-Ups,\" Click \"Calendar.\" Enable the Power-Up if you haven\'t already by clicking \"Add Power-Up\".\r\nOnce there, click Edit Power-Up Settings. Alternatively, you can open the Calendar Power-Up from the board view and click the gear icon.\r\nCopy the URL from \"Berry Calendar Feed.\"'),
(2, 'How can I delete a team?', 'You can delete a team by going to your team\'s page in BerryTeam, clicking on the \"Settings\" tab and then clicking the \"Delete this team\" link. You must be an admin to delete the team.\r\n\r\nDeleting a team is permanent and there is no undo. Boards within the team won\'t be deleted. Instead, your boards in this team will appear in your personal boards list.'),
(3, 'How can I change my email address on Berry?', 'To change the email address you use to log into your Berry account, go to the settings page at http://berry-4u.com/myprofile and click on Profile. Then select Change email address from the Contact section. \r\n\r\nA confirmation email will be sent to the new email address. After clicking the link in the email to confirm the change, you’ll need to log in again with your previous email address. Then, you’ll see your Profile page is now updated with the new email address and your previous email address is removed from the account..'),
(4, 'How can I delete a board?', 'In order to delete a board, you\'ll need to close the board first. Closing a board is similar to archiving a card—you can leave it in your \"Closed Boards\" list if you think you might want to use it again some day, or you can delete the board permanently once it\'s closed.\r\n\r\nDeleting a board is permanent, and deleted boards cannot be recovered.'),
(5, 'How can I recover my Berry account?', 'In order to recover your Berry account, \r\nyou can reset your password by going to  https://berryteam-4u.com/recover. If your email address is not associated with an existing Berry account, we\'ll let you know after you submit the form.\r\n\r\nUsing the above link should take care of most cases where you can\'t access your account. However, sometimes things can get a bit complicated. We\'ll address each scenario individually.\r\n\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
