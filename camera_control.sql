-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 09:50 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `robolympics`
--

-- --------------------------------------------------------

--
-- Table structure for table `camera_control`
--

CREATE TABLE `camera_control` (
  `name` varchar(50) NOT NULL,
  `controlID` int(11) NOT NULL,
  `requested_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `camera_control`
--

INSERT INTO `camera_control` (`name`, `controlID`, `requested_time`) VALUES
('dfsdfs', 338, '2021-04-12 16:52:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camera_control`
--
ALTER TABLE `camera_control`
  ADD PRIMARY KEY (`controlID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camera_control`
--
ALTER TABLE `camera_control`
  MODIFY `controlID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
