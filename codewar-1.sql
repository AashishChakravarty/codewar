-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2018 at 03:20 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

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
-- Table structure for table `forum_comments`
--

CREATE TABLE `forum_comments` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `likes` int(11) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_questions`
--

CREATE TABLE `forum_questions` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `question` text NOT NULL,
  `likes` int(11) NOT NULL,
  `tags` text NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_questions`
--

INSERT INTO `forum_questions` (`id`, `user`, `question`, `likes`, `tags`, `doc`) VALUES
(7, 22, 'hello world', 5, '', '2018-09-22 19:05:09'),
(8, 17, 'Hello-World', 5, '', '2018-09-22 16:17:18'),
(9, 17, 'jksdhj', 5, '', '2018-09-22 13:01:04'),
(10, 17, 'jksdhj', 5, '', '2018-09-22 13:02:23'),
(11, 17, 'lkhsskvjfsh', 5, '', '2018-09-22 13:44:47'),
(12, 22, 'hkfsjhd', 5, '', '2018-09-23 09:05:04'),
(13, 22, '', 0, '', '2018-09-23 09:43:20'),
(14, 22, '', 0, '', '2018-09-23 09:43:32'),
(15, 22, 'nkudfhjvdf', 0, '', '2018-09-23 09:44:17'),
(16, 22, 'nkudfhjvdf', 0, '', '2018-09-23 09:44:28'),
(17, 22, 'sds', 0, '', '2018-09-23 09:46:01'),
(18, 22, 'bksjbhsbfvhjabdlzfhvjbldhc', 0, '', '2018-09-23 09:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `options` text,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_random` tinyint(1) NOT NULL DEFAULT '0',
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `extra` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `user_reset_link` varchar(255) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `user_reset_link`, `doc`) VALUES
(5, 'Aashish', 'avaaaani@wittyfeed.com', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 11:42:05'),
(6, 'Aashish', 'avaaaani@wittyfeed.comq', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 11:42:40'),
(7, 'Aashish', 'avaaaani@wittyfeed.comqa', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 11:43:57'),
(8, 'Aashish', 'avaaaani@wittyfeed.co', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 11:44:12'),
(9, 'Aashish', 'avaaaani@wittyfeead.co', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 11:45:16'),
(10, 'Aashish', 'avaaaani@wiettyfeead.co', 'e1671797c52e15f763380b45e841ec32', '', '', '2018-09-17 11:45:57'),
(11, 'Aashish', 'avaaaaani@wiettyfeead.co', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 11:46:22'),
(12, 'Aashish', 'avaaasaani@wiettyfeead.co', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 11:47:58'),
(13, 'Aashish', 'avaaasaaani@wiettyfeead.co', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 11:51:04'),
(14, 'Aashish', 'avaaasaaaani@wiettyfeead.co', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-17 11:52:08'),
(15, 'Aashish Chakravarty', 'chakravartya1ashish@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '', '', '2018-09-18 13:19:25'),
(16, 'Ankit Gupta', 'ankit205123@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '', '', '2018-09-17 22:26:18'),
(17, 'Rupali Patel', 'rupalipatelkvc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '2018-09-22 12:45:59'),
(18, 'Rupali Patel', 'rupalipatel@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', '', '', '2018-09-17 22:37:27'),
(20, 'Aashish Chakravarty', 'chakravartyaashish@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '5ae7470e192b2f8b734bd9dab9995a67', '2018-09-20 15:14:01'),
(21, 'Aashish Chakravarty', 'chakravartyaasahish@gmail.com', 'ed74c08090d9990f14dacbd19634a9e4', 'user', '', '2018-09-20 13:30:02'),
(22, 'Pankaj Devesh', 'pankajdevesh3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', '', '2018-09-22 12:32:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `forum_comments_ibfk_3` (`question_id`);

--
-- Indexes for table `forum_questions`
--
ALTER TABLE `forum_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
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
-- AUTO_INCREMENT for table `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_questions`
--
ALTER TABLE `forum_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD CONSTRAINT `forum_comments_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `forum_comments_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `forum_questions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `forum_questions`
--
ALTER TABLE `forum_questions`
  ADD CONSTRAINT `forum_questions_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
