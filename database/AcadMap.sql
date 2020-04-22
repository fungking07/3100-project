-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2020 年 04 月 22 日 16:17
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `AcadMap`
--

-- --------------------------------------------------------

--
-- 資料表結構 `chat`
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
-- 傾印資料表的資料 `chat`
--

INSERT INTO `chat` (`chatroom_id`, `message`, `message_date_time`, `sender_name`, `consultroom`, `msg_type`) VALUES
(1, 'this is for testing with longer input --- omg i am so panic (SCREAMMMM), the ddl is so close and our group seems to be lack in behind QAQ... I am already responsible for frontend (post, chatroom, chatlist, consultroom, post) and backend (post and chatroom) but still so many stuff unfinished... and I even got like really no previous knowledge in html php css js sql xampp.... I just learn them all. This did equip me with quite a lot of knowledge but I also have to dual with other asg and task... real stressful cry... I wanna learnt what I love but not spending so much time on this application... I really not planning to work in this field but instead doing research and machine learning... I wanna do other stuff and read papers and learn other things from online open lesson but I really dont have the choice... Crying hard', '2020-04-19 09:13:26', 'Admin2', 0, 'normal'),
(1, 'me again and remark: the words are surrounding the avatar... have time then make a better alignment of word (though I dont think I have', '2020-04-19 17:08:12', 'Admin1', 0, 'normal'),
(1, 'Testing for consultation chatroom, try open la', '2020-04-20 15:51:32', 'Admin1', 0, 'normal'),
(1, '', '2020-04-21 12:21:21', 'Admin2', 0, 'request'),
(1, '', '2020-04-21 12:21:39', 'Admin1', 0, 'accept'),
(5, 'consult chatroom here~', '2020-04-21 12:27:36', 'Admin1', 0, 'normal');

-- --------------------------------------------------------

--
-- 資料表結構 `chatroom`
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
-- 傾印資料表的資料 `chatroom`
--

INSERT INTO `chatroom` (`chatroom_id`, `user_id`, `opponent_id`, `last_message_time`, `opponent_picture`, `consultroom`, `hv_consult`) VALUES
(1, 1, 2, '2020-04-20 15:55:30', NULL, 0, 1),
(2, 1, 2, '2020-04-22 00:00:00', NULL, 1, 1),
(3, 3, 1, '2020-04-22 15:10:01', 'NULL', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(8) UNSIGNED NOT NULL,
  `comment_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(8) UNSIGNED NOT NULL,
  `comments_content` text NOT NULL,
  `author_name` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_date_time`, `post_id`, `comments_content`, `author_name`) VALUES
(1, '2020-03-22 16:00:00', 1, 'Thank you for effort', 'Admin2'),
(2, '2020-03-22 17:00:00', 1, 'You are welcome xd', 'Admin1'),
(3, '2020-04-22 09:00:07', 1, 'hihi', 'visitor'),
(4, '2020-04-22 16:09:45', 1, 'hiiii', 'visitor');

-- --------------------------------------------------------

--
-- 資料表結構 `consultation_comment`
--

CREATE TABLE `consultation_comment` (
  `user_id` int(8) NOT NULL,
  `author_id` int(8) NOT NULL,
  `score` int(1) NOT NULL,
  `comments` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `consultation_comment`
--

INSERT INTO `consultation_comment` (`user_id`, `author_id`, `score`, `comments`, `comment_date`) VALUES
(1, 2, 4, 'Really detail advice! This really allow me to make a better decision for my future career! Thx!', '2020-04-22 05:34:46'),
(1, 4, 5, 'testing', '2020-04-22 09:04:07'),
(1, 12, 2, 'testing', '2020-04-22 09:04:19'),
(1, 1020, 1, 'testing', '2020-04-22 09:04:42');

-- --------------------------------------------------------

--
-- 資料表結構 `forum`
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
-- 傾印資料表的資料 `forum`
--

INSERT INTO `forum` (`post_id`, `post_title`, `post_date`, `author_id`, `author_name`, `category`, `like_number`, `view_number`) VALUES
(1, '\0\0\0H\0\0\0e\0\0\0l\0\0\0l\0\0\0o\0\0\0 \0\0\0w\0\0\0o\0\0\0r\0\0\0l\0\0\0d\0\0\0!', '2020-03-22 14:18:50', 0, 'Admin1', NULL, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `post_content`
--

CREATE TABLE `post_content` (
  `post_id` int(8) UNSIGNED NOT NULL,
  `post_content` text NOT NULL,
  `like_number` int(8) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `post_content`
--

INSERT INTO `post_content` (`post_id`, `post_content`, `like_number`) VALUES
(1, 'Hello from Admin1!\r\nThis is the first post of Acadmap from Admin1.\r\nSurprise!?\r\nI hope so.\r\nHope you enjoy using Acadmap!', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `username` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `verify_code` varchar(8) NOT NULL DEFAULT 'pokemon!',
  `email_address` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `verify_code`, `email_address`) VALUES
(1, 'Admin1', 'csci3100', 'sdhjhhhh', 'admin1@acadmap.com'),
(2, 'Admin2', 'csci3100', 'rcfctvgj', ''),
(3, 'Admin3', 'csci3100', 'hhhhhbhk', ''),
(5, 'Cccc', '320345c910f1144', 'pokemon!', 'cin@acadmap.com');

-- --------------------------------------------------------

--
-- 資料表結構 `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `username` varchar(16) NOT NULL,
  `personal_picture` varchar(200) DEFAULT NULL,
  `education_level` varchar(64) NOT NULL,
  `personal_description` text NOT NULL,
  `major` varchar(120) NOT NULL,
  `user_level` varchar(15) NOT NULL,
  `institute` varchar(40) DEFAULT NULL,
  `consult_rating` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `username`, `personal_picture`, `education_level`, `personal_description`, `major`, `user_level`, `institute`, `consult_rating`) VALUES
(2, 'Admin2', NULL, 'Master', 'I want to pursue another degree in a new field!', 'Fashion and Design', 'member', 'The Hong Kong Polytechnic University', 0),
(1, 'Admin1', NULL, 'Undergraduate', 'I want to pursue a master degree', 'Computer Science', 'member', 'The Chinese University of Hong Kong', 0),
(3, 'Admin3', NULL, 'Undergraduate', 'I want to know about other major and gossip there xd', 'Information Engineering', 'member', 'The Chinese University of Hong Kong', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`message_date_time`);

--
-- 資料表索引 `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`chatroom_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `opponent_id` (`opponent_id`);

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- 資料表索引 `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `like_number` (`like_number`);

--
-- 資料表索引 `post_content`
--
ALTER TABLE `post_content`
  ADD UNIQUE KEY `like_number` (`like_number`),
  ADD KEY `post_id` (`post_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 資料表索引 `user_profile`
--
ALTER TABLE `user_profile`
  ADD UNIQUE KEY `personal_picture` (`personal_picture`),
  ADD KEY `user_id` (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `forum`
--
ALTER TABLE `forum`
  MODIFY `post_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `chatroom`
--
ALTER TABLE `chatroom`
  ADD CONSTRAINT `chatroom_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `chatroom_ibfk_2` FOREIGN KEY (`opponent_id`) REFERENCES `user` (`user_id`);

--
-- 資料表的限制式 `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`like_number`) REFERENCES `post_content` (`like_number`);

--
-- 資料表的限制式 `post_content`
--
ALTER TABLE `post_content`
  ADD CONSTRAINT `post_content_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `forum` (`post_id`);

--
-- 資料表的限制式 `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
