-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2018 at 10:32 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codewar`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_date` datetime NOT NULL,
  `class_topic` varchar(256) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `instructor_id`, `course_id`, `class_date`, `class_topic`, `doc`) VALUES
(1, 1, 1, '2018-09-18 00:00:00', 'Introduction', '2018-09-18 19:34:02'),
(2, 1, 1, '2018-09-19 00:00:00', 'Basic', '2018-09-18 19:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(256) NOT NULL,
  `course_from` date NOT NULL,
  `course_to` date NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_from`, `course_to`, `doc`) VALUES
(1, 'Introduction to Programming & problem Solving with Python', '2018-09-18', '2018-10-05', '2018-09-18 19:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `q1` varchar(256) NOT NULL,
  `q2` varchar(256) NOT NULL,
  `q3` varchar(256) NOT NULL,
  `q4` varchar(256) NOT NULL,
  `q5` varchar(256) NOT NULL,
  `q6` varchar(256) NOT NULL,
  `suggestion` text NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `class`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `suggestion`, `doc`) VALUES
(10, 20, 1, 'satisfactory', '4', 'disagree', 'disagree', '3', 'disagree', '', '2018-09-18 20:10:59'),
(11, 20, 2, 'agree', '5', 'disagree', 'satisfactory', '2', 'disagree', '', '2018-09-18 20:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `branch` varchar(256) NOT NULL,
  `year` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `contact` varchar(256) NOT NULL,
  `club_post` varchar(256) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `branch`, `year`, `email`, `contact`, `club_post`, `doc`) VALUES
(1, 'Aashish Chakravarty', 'CSE', '3rd', 'chakravartyaashish@gmail.com', '7697358094', 'Technical Supporter', '2018-09-18 19:33:06'),
(2, 'Sarthak Somani', 'CSE', '3rd', '', '', 'President', '2018-09-18 19:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL,
  `user_reset_link` varchar(256) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `user_reset_link`, `doc`) VALUES
(5, 'Aashish', 'avaaaani@wittyfeed.com', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 17:12:05'),
(6, 'Aashish', 'avaaaani@wittyfeed.comq', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 17:12:40'),
(7, 'Aashish', 'avaaaani@wittyfeed.comqa', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 17:13:57'),
(8, 'Aashish', 'avaaaani@wittyfeed.co', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 17:14:12'),
(9, 'Aashish', 'avaaaani@wittyfeead.co', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 17:15:16'),
(10, 'Aashish', 'avaaaani@wiettyfeead.co', 'e1671797c52e15f763380b45e841ec32', '', '', '2018-09-17 17:15:57'),
(11, 'Aashish', 'avaaaaani@wiettyfeead.co', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 17:16:22'),
(12, 'Aashish', 'avaaasaani@wiettyfeead.co', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 17:17:58'),
(13, 'Aashish', 'avaaasaaani@wiettyfeead.co', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 17:21:04'),
(14, 'Aashish', 'avaaasaaaani@wiettyfeead.co', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 17:22:08'),
(15, 'Aashish Chakravarty', 'chakravartya1ashish@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-18 18:49:25'),
(16, 'Ankit Gupta', 'ankit205123@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '', '', '2018-09-18 03:56:18'),
(17, 'Rupali Patel', 'rupalipatelkvc@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '2018-09-18 04:04:35'),
(18, 'Rupali Patel', 'rupalipatel@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', '', '', '2018-09-18 04:07:27'),
(20, 'Aashish Chakravarty', 'chakravartyaashish@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '5ae7470e192b2f8b734bd9dab9995a67', '2018-09-20 20:44:01'),
(21, 'Aashish Chakravarty', 'chakravartyaasahish@gmail.com', 'ed74c08090d9990f14dacbd19634a9e4', 'user', '', '2018-09-20 19:00:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
