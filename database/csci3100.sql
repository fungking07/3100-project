-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2020 at 04:21 PM
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
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(8) NOT NULL,
  `comment_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(8) UNSIGNED NOT NULL,
  `comments_content` text NOT NULL,
  `author_name` varchar(8) NOT NULL,
  `like_number` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_date_time`, `post_id`, `comments_content`, `author_name`, `like_number`) VALUES
(1, '2020-03-22 16:00:00', 1, 'Thank you for effort\r\nBy Admin2', 'Admin2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(8) UNSIGNED NOT NULL,
  `post_title` varchar(128) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `author_id` int(8) UNSIGNED NOT NULL,
  `author_name` varchar(16) NOT NULL,
  `category` varchar(16) DEFAULT NULL,
  `like_number` int(8) UNSIGNED DEFAULT NULL,
  `view_number` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_date`, `author_id`, `author_name`, `category`, `like_number`, `view_number`) VALUES
(1, '\0\0\0H\0\0\0e\0\0\0l\0\0\0l\0\0\0o\0\0\0 \0\0\0w\0\0\0o\0\0\0r\0\0\0l\0\0\0d\0\0\0!', '2020-03-22 14:18:50', 0, 'Admin1', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_content`
--

CREATE TABLE `post_content` (
  `post_id` int(8) UNSIGNED NOT NULL,
  `post_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_content`
--

INSERT INTO `post_content` (`post_id`, `post_content`) VALUES
(1, 'Hello from Admin1!\r\nThis is the first post of Acadmap from Admin1.\r\nSurprise!?\r\nI hope so.\r\nHope you enjoy using Acadmap!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `username` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'Admin1', 'csci3100'),
(2, 'Admin2', 'csci3100'),
(3, 'Admin3', 'csci3100');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `email_address` varchar(320) DEFAULT NULL,
  `personal_picture` varchar(200) NOT NULL,
  `education` varchar(64) DEFAULT NULL,
  `personal_description` text DEFAULT NULL,
  `major` varchar(64) DEFAULT NULL,
  `consultation_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `user_name`, `email_address`, `personal_picture`, `education`, `personal_description`, `major`, `consultation_status`) VALUES
(1, 'Admin1', '123456789@nokia.3310.com.hk', '', '', 'Hi from Admin 1.', '', 0),
(2, 'Admin2', NULL, '', NULL, NULL, NULL, 0),
(3, 'Admin3_cse', NULL, '', NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_content`
--
ALTER TABLE `post_content`
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
  ADD KEY `user_profile_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
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
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `post_content`
--
ALTER TABLE `post_content`
  ADD CONSTRAINT `post_content_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
