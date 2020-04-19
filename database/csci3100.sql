-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 04:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csci3100`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatroom_id` int(8) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `message_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `sender_name` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `chatroom_id` int(8) UNSIGNED NOT NULL,
  `user_id` int(8) NOT NULL,
  `opponent_id` int(8) NOT NULL,
  `last_message_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `opponent_picture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(8) UNSIGNED NOT NULL,
  `comment_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(8) UNSIGNED NOT NULL,
  `comments_content` text NOT NULL,
  `author_name` varchar(8) NOT NULL,
  `like_number` int(8) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_date_time`, `post_id`, `comments_content`, `author_name`, `like_number`) VALUES
(1, '2020-03-22 16:00:00', 1, 'Thank you for effort\r\nBy Admin2', 'Admin2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `consultation_comment`
--

CREATE TABLE `consultation_comment` (
  `user_id` int(8) NOT NULL,
  `author_id` int(8) NOT NULL,
  `score` int(1) NOT NULL,
  `comments` text NOT NULL,
  `status_consultee` tinyint(1) DEFAULT 0,
  `status_consultor` tinyint(1) DEFAULT 0,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `post_id` int(8) UNSIGNED NOT NULL,
  `post_title` varchar(128) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `author_id` int(8) UNSIGNED NOT NULL,
  `author_name` varchar(16) NOT NULL,
  `category` varchar(16) DEFAULT NULL,
  `like_number` int(8) UNSIGNED DEFAULT 0,
  `view_number` int(8) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`post_id`, `post_title`, `post_date`, `author_id`, `author_name`, `category`, `like_number`, `view_number`) VALUES
(1, '\0\0\0H\0\0\0e\0\0\0l\0\0\0l\0\0\0o\0\0\0 \0\0\0w\0\0\0o\0\0\0r\0\0\0l\0\0\0d\0\0\0!', '2020-03-22 14:18:50', 0, 'Admin1', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_content`
--

CREATE TABLE `post_content` (
  `post_id` int(8) UNSIGNED NOT NULL,
  `post_content` text NOT NULL,
  `like_number` int(8) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_content`
--

INSERT INTO `post_content` (`post_id`, `post_content`, `like_number`) VALUES
(1, 'Hello from Admin1!\r\nThis is the first post of Acadmap from Admin1.\r\nSurprise!?\r\nI hope so.\r\nHope you enjoy using Acadmap!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `username` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `verify_code` varchar(8) NOT NULL DEFAULT 'pokemon!',
  `email_address` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `verify_code`, `email_address`) VALUES
(1, 'Admin1', 'csci3100', 'sdhjhhhh', ''),
(2, 'Admin2', 'csci3100', 'rcfctvgj', ''),
(3, 'Admin3', 'csci3100', 'hhhhhbhk', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `personal_picture` varchar(200) DEFAULT NULL,
  `education_level` varchar(64) NOT NULL,
  `personal_description` text NOT NULL,
  `major` varchar(120) NOT NULL,
  `consultation_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD KEY `chatroom_id` (`chatroom_id`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`chatroom_id`),
  ADD KEY `opponent_picture` (`opponent_picture`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `like_number` (`like_number`);

--
-- Indexes for table `post_content`
--
ALTER TABLE `post_content`
  ADD UNIQUE KEY `like_number` (`like_number`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD UNIQUE KEY `personal_picture` (`personal_picture`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `chatroom_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `post_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`chatroom_id`) REFERENCES `chatroom` (`chatroom_id`);

--
-- Constraints for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD CONSTRAINT `chatroom_ibfk_1` FOREIGN KEY (`opponent_picture`) REFERENCES `user_profile` (`personal_picture`);

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`like_number`) REFERENCES `post_content` (`like_number`);

--
-- Constraints for table `post_content`
--
ALTER TABLE `post_content`
  ADD CONSTRAINT `post_content_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `forum` (`post_id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
