-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 08:25 PM
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
-- Database: `acadmap`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatroom_id` int(8) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `message_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `sender_name` varchar(8) NOT NULL,
  `consultroom` tinyint(1) NOT NULL DEFAULT 0,
  `msg_type` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `chatroom_id` int(8) UNSIGNED NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL,
  `opponent_id` int(8) UNSIGNED NOT NULL,
  `last_message_time` timestamp NULL DEFAULT NULL,
  `opponent_picture` varchar(200) DEFAULT NULL,
  `consultroom` tinyint(1) NOT NULL DEFAULT 0,
  `hv_consult` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`chatroom_id`, `user_id`, `opponent_id`, `last_message_time`, `opponent_picture`, `consultroom`, `hv_consult`) VALUES
(1, 8, 9, '2020-04-23 12:17:12', 'NULL', 0, 0),
(2, 7, 9, '2020-04-23 12:18:15', 'NULL', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(8) UNSIGNED NOT NULL,
  `comment_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(8) UNSIGNED NOT NULL,
  `comments_content` text NOT NULL,
  `author_name` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_date_time`, `post_id`, `comments_content`, `author_name`) VALUES
(1, '2020-04-23 12:05:54', 35, 'hello\r\n', 'ttc'),
(2, '2020-04-23 12:06:21', 34, 'No i am not excited\r\nYou are excited\r\nhahahaha\r\nhahah\r\nhahah', 'ttc'),
(3, '2020-04-23 12:06:30', 34, 'No i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahah', 'ttc'),
(4, '2020-04-23 12:06:35', 34, 'No i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahahNo i am not excited You are excited hahahaha hahah hahah', 'ttc'),
(5, '2020-04-23 12:06:42', 34, 'ha/n', 'ttc'),
(6, '2020-04-23 12:06:48', 34, 'ha\n\r\n', 'ttc'),
(7, '2020-04-23 12:07:00', 34, 'ha\n\r\naaa', 'ttc'),
(8, '2020-04-23 12:07:11', 34, 'ha\n\n\n\n', 'ttc'),
(9, '2020-04-23 12:07:29', 34, 'ha\n aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'ttc'),
(10, '2020-04-23 12:08:35', 34, 'ha\n aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'ttc'),
(11, '2020-04-23 12:09:59', 33, 'yo\r\n', 'ttc'),
(12, '2020-04-23 12:10:28', 26, 'tttt', 'ttcttttt'),
(13, '2020-04-23 12:10:48', 26, 'ttttttttt', 'ttcttttt'),
(14, '2020-04-23 12:19:58', 36, 'Hi i am good\r\n', 'angus'),
(15, '2020-04-23 12:20:09', 26, 'hi', 'angus'),
(16, '2020-04-23 12:20:21', 26, 'Yo who are you I am better than you', 'angus');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_comment`
--

CREATE TABLE `consultation_comment` (
  `user_id` int(8) NOT NULL,
  `author_id` int(8) NOT NULL,
  `score` int(1) NOT NULL,
  `comments` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultation_comment`
--

INSERT INTO `consultation_comment` (`user_id`, `author_id`, `score`, `comments`, `comment_date`) VALUES
(7, 1, 5, 'gooood', '2020-04-23 15:27:32'),
(7, 1, 5, 'gooooood', '2020-04-23 15:29:32');

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
(26, 'ulife', '2020-04-23 17:53:05', 8, 'ttc', 'ulife', 0, 0),
(27, 'ulife2', '2020-04-23 17:53:21', 8, 'ttc', 'ulife', 0, 0),
(28, 'ulife3', '2020-04-23 17:53:33', 8, 'ttc', 'ulife', 0, 0),
(29, 'study', '2020-04-23 17:53:51', 8, 'ttc', 'study', 0, 0),
(30, 'study2', '2020-04-23 17:53:59', 8, 'ttc', 'study', 0, 0),
(31, 'study3', '2020-04-23 18:02:46', 8, 'ttc', 'study', 0, 0),
(32, 'Future idk', '2020-04-23 18:03:13', 8, 'ttc', 'career', 0, 0),
(33, 'career? i am so confused', '2020-04-23 18:03:40', 8, 'ttc', 'career', 0, 0),
(34, 'future and career? i have completely no idea for them, but i am really looking forward to! ! ! ! !', '2020-04-23 18:04:44', 8, 'ttc', 'career', 0, 0),
(35, 'future and career? i have completely no idea for them, but i am really looking forward to! ! ! ! !future and career? i have comp', '2020-04-23 18:05:11', 8, 'ttc', 'career', 0, 0),
(36, 'mini project ', '2020-04-23 18:19:48', 9, 'angus', 'study', 0, 0);

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
(26, 'haha', 0),
(27, '2', 0),
(28, '3', 0),
(29, '1', 0),
(30, '2', 0),
(31, 'study', 0),
(32, '...', 0),
(33, 'arrrrrrrrr...', 0),
(34, 'excited', 0),
(35, '???', 0),
(36, 'I am doing a project', 0);

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
(1, 'Admin1', 'csci3100', 'sdhjhhhh', 'admin1@acadmap.com'),
(2, 'Admin2', 'csci3100', 'rcfctvgj', ''),
(3, 'Admin3', 'csci3100', 'hhhhhbhk', ''),
(7, 'Cin', '544b2efcc0e406a', 'pokemon!', 't60527486@gmail.com'),
(8, 'ttctttttt', '544b2efcc0e406a', 'pokemon!', '1125110208@link.cuhk.edu.hk'),
(9, 'angus', '4d277036ee53f4e', 'pokemon!', 'angusking47@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `username` varchar(16) NOT NULL,
  `personal_picture` varchar(200) DEFAULT NULL,
  `education_level` varchar(64) NOT NULL,
  `personal_description` text NOT NULL,
  `major` varchar(120) NOT NULL,
  `user_level` varchar(15) NOT NULL DEFAULT 'member',
  `institute` varchar(40) DEFAULT NULL,
  `consult_rating` double NOT NULL DEFAULT 0,
  `cvv` int(3) DEFAULT NULL,
  `expire_yr` int(4) DEFAULT NULL,
  `expire_mth` int(2) DEFAULT NULL,
  `cardnumber` varchar(17) DEFAULT NULL,
  `cardname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `username`, `personal_picture`, `education_level`, `personal_description`, `major`, `user_level`, `institute`, `consult_rating`, `cvv`, `expire_yr`, `expire_mth`, `cardnumber`, `cardname`) VALUES
(2, 'Admin2', NULL, 'Master', 'I want to pursue another degree in a new field!', 'Engineering', 'member', 'The Hong Kong Polytechnic University', 2, NULL, NULL, NULL, NULL, NULL),
(1, 'Admin1', NULL, 'Undergraduate', 'I want to pursue a master degree', 'Education', 'member', 'The Chinese University of Hong Kong', 2, 444, 2222, 12, '1111222233334444', 'Cin Cind Cindy'),
(3, 'Admin3', NULL, 'Undergraduate', 'I want to know about other major and gossip there xd', 'Engineering', 'member', 'The Chinese University of Hong Kong', 2, NULL, NULL, NULL, NULL, NULL),
(7, 'Cin', NULL, 'Undergraduate', 'i love computer science', 'Engineering', 'member', NULL, 5, NULL, NULL, NULL, NULL, NULL),
(8, 'ttctttttt', NULL, 'Undergraduate', 'haha', '', 'member', '', 0, 0, 0, 0, '', ''),
(9, 'angus', NULL, 'Undergraduate', 'I am a bba student\r\n', '', 'member', NULL, 0, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`message_date_time`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`chatroom_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `opponent_id` (`opponent_id`);

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
  ADD UNIQUE KEY `personal_picture` (`personal_picture`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `post_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD CONSTRAINT `chatroom_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `chatroom_ibfk_2` FOREIGN KEY (`opponent_id`) REFERENCES `user` (`user_id`);

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
