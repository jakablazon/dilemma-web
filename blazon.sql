-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2016 at 02:16 PM
-- Server version: 5.7.15
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blazon`
--
CREATE DATABASE IF NOT EXISTS `blazon` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blazon`;

-- --------------------------------------------------------

--
-- Table structure for table `dilemma`
--

CREATE TABLE `dilemma` (
  `questionID` int(11) NOT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `count1` int(11) DEFAULT '0',
  `count2` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dilemma`
--

INSERT INTO `dilemma` (`questionID`, `option1`, `option2`, `image1`, `image2`, `count1`, `count2`) VALUES
(1, 'Gay man giving you a soft and gentle handjob', 'Lesbian giving you a hard ass fingering', 'handjob.png', 'fingering.png', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ip_lock`
--

CREATE TABLE `ip_lock` (
  `ip` varchar(15) NOT NULL,
  `dilemma_questionID` int(11) DEFAULT NULL,
  `vote_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dilemma`
--
ALTER TABLE `dilemma`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `ip_lock`
--
ALTER TABLE `ip_lock`
  ADD PRIMARY KEY (`ip`),
  ADD KEY `ip_lock_dilemma_questionID_fk` (`dilemma_questionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dilemma`
--
ALTER TABLE `dilemma`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ip_lock`
--
ALTER TABLE `ip_lock`
  ADD CONSTRAINT `ip_lock_dilemma_questionID_fk` FOREIGN KEY (`dilemma_questionID`) REFERENCES `dilemma` (`questionID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
