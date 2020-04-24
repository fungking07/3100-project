-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 05:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatroom_id`, `message`, `message_date_time`, `sender_name`, `consultroom`, `msg_type`) VALUES
(1, 'shkfdjs\r\n', '2020-04-24 07:45:37', 'Cin', 0, 'normal'),
(1, 'sdfsdfsd', '2020-04-24 07:45:39', 'Cin', 0, 'normal'),
(1, 'aaa', '2020-04-24 07:45:41', 'Cin', 0, 'normal'),
(1, '500', '2020-04-24 07:46:36', 'Cin', 0, 'request'),
(1, 'sfkidhgbk\r\n', '2020-04-24 07:48:07', 'Admin2', 0, 'normal'),
(1, '', '2020-04-24 07:48:10', 'Admin2', 0, 'accept');

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
(1, 2, 7, '2020-04-24 07:45:32', 'NULL', 0, 1),
(2, 7, 2, '2020-04-24 07:48:10', 'NULL', 1, 1);

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
(1, '2020-04-23 19:10:01', 30, 'reply to myself xd', 'Cin'),
(2, '2020-04-23 19:11:27', 30, 'oh it is not myself xdddd', 'Cin'),
(3, '2020-04-23 19:11:34', 31, 'reply to myself', 'Cin'),
(4, '2020-04-24 07:45:11', 36, 'yes', 'Cin'),
(5, '2020-04-24 07:52:34', 30, 'aaa', 'Cin'),
(6, '2020-04-24 08:05:26', 30, '', 'Cin'),
(7, '2020-04-24 08:05:34', 30, '', 'Cin'),
(8, '2020-04-24 08:05:54', 30, 'sdf', 'Cin');

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
(30, 'ulife1', '2020-04-23 16:58:12', 1, 'Admin1', 'ulife', 1, 0),
(31, 'study1', '2020-04-23 16:59:47', 7, 'Cin', 'study', 0, 0),
(32, 'future? I don\'t really know...', '2020-04-23 17:00:05', 7, 'Cin', 'career', 0, 0),
(33, 'Ulife is so great!', '2020-04-23 17:00:23', 7, 'Cin', 'ulife', 0, 0),
(34, 'study is so hard', '2020-04-23 17:00:37', 7, 'Cin', 'study', 0, 0),
(35, 'career? I also don\'t really know', '2020-04-23 17:00:58', 7, 'Cin', 'career', 0, 0),
(36, 'Ulife is so great and so tough and I am graduating soon...', '2020-04-23 17:01:29', 7, 'Cin', 'ulife', 1, 0);

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
(30, '1', 1),
(31, 'study laaaa', 0),
(32, 'confused', 0),
(33, 'don\'t wanna grad', 0),
(34, 'but I love it', 0),
(35, 'arrr...', 0),
(36, 'sigh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `liked` int(1) NOT NULL,
  `post_id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`user_id`, `liked`, `post_id`) VALUES
(7, 1, 30),
(7, 1, 36);

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
(1, 'Admin1', '544b2efcc0e406a', 'sdhjhhhh', 'admin1@acadmap.com'),
(2, 'Admin2', '544b2efcc0e406a', 'rcfctvgj', ''),
(3, 'Admin3', '544b2efcc0e406a', 'hhhhhbhk', ''),
(7, 'Cin', '544b2efcc0e406a', 'pokemon!', 't60527486@gmail.com');

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
(7, 'Cin', NULL, 'Undergraduate', 'i love computer science', 'Engineering', 'member', 'CUHK', 5, 596, 2122, 8, '1111111111111111', 'Admin 2');

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
  ADD KEY `post_id` (`post_id`),
  ADD KEY `like_number` (`like_number`) USING BTREE;

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`user_id`,`liked`,`post_id`) USING BTREE;

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
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
