-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 04:18 PM
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
-- Table structure for table `robots`
--

CREATE TABLE `robots` (
  `robot_id` int(11) NOT NULL,
  `team` varchar(45) NOT NULL,
  `bot_name` varchar(45) NOT NULL,  
  `game1_score` int(11),
  `game2_score` int(11),
  `game3_score` int(11),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `insert_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Dumping data for table `bots`
--

INSERT INTO `robots` (`robot_id`, `team`, `bot_name`, `game1_score`, `game2_score`, `game3_score`) VALUES
(1, 'A', 'Bot 1', 0, 0, 0),
(2, 'B', 'Bot 2', 0, 0, 0),
(3, 'C', 'Bot 3', 0, 0, 0),
(4, 'D', 'Bot 4', 0, 0, 0),
(5, 'E', 'Bot 5', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `game_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Dumping data for table `games`
--
INSERT INTO `games` (`game_id`, `game_name`) VALUES
(1, 'Game1'),
(2, 'Game2'),
(3, 'Game3');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

-- --------------------------------------------------------

CREATE TABLE `members` (
  `team` varchar(30) NOT NULL,
  `member` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`team`, `member`) VALUES
('A', 'Sam Klop'),
('A', 'Oghale Oziwo'),
('A', 'Robert Rachita'),
('A', 'Aggrey Odera Okero'),
('A', 'Samuel Fremont'),
('A', 'Timo Hennig'),
('B', 'Atanas Hristov'),
('B', 'Oleksandr Sikora'),
('B', 'Michael Procee'),
('B', 'Christopher Sulistiyo'),
('B', 'Máté Soós'),
('B', 'Roy Stobbe'),
('C', 'Vasil Ivanov'),
('C', 'Josta Holsappel'),
('C', 'Keanu Sint Jago'),
('C', 'Sean Rapanganwa'),
('C', 'Stefan Untura'),
('D', 'Lyuboslav Lesichkov'),
('D', 'Line Amini Kaveh'),
('D', 'Alex Constantinescu'),
('D', 'Tadas Simanauskas'),
('D', 'Michael Ikpi'),
('D', 'Victor Tromp'),
('E', 'Matteo La Barbera'),
('E', 'Levente Stieber'),
('E', 'Thomas Kounikorgo'),
('E', 'Harmen Drenth'),
('E', 'Alex van der Kroft'),
('E', 'Anthony Roessler');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `banned` tinyint(1) NOT NULL,
  `team_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `robots`
--
ALTER TABLE `robots`
  ADD PRIMARY KEY (`robot_id`),
  ADD KEY `team` (`team`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `team_name` (`team_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `robots`
--
ALTER TABLE `robots`
  MODIFY `robot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `robots`
--
ALTER TABLE `robots`
  ADD CONSTRAINT `robots_ibfk_1` FOREIGN KEY (`team`) REFERENCES `teams` (`team_name`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`team_name`) REFERENCES `teams` (`team_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
