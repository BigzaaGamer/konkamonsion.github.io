-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 05:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_platform2`
--

-- --------------------------------------------------------

--
-- Table structure for table `banned`
--

CREATE TABLE `banned` (
  `user_id` int(100) NOT NULL,
  `reason` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banned`
--

INSERT INTO `banned` (`user_id`, `reason`) VALUES
(7, '55555'),
(6, 'ชื่อไม่เหมาะสม');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(100) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content_comment` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `name`, `content_comment`, `image`, `created`) VALUES
(23, '12', '5', 'กรกมล ศรีอ่อน', 'ชอบหี', 'upload/myprofile.jpg', '1612625791'),
(24, '101', '5', 'กรกมล ศรีอ่อน', 'แตกใส่ขวดสปอนเซอร์เลยไอเหี้ย 788 กองใหญ่ๆ', 'upload/myprofile.jpg', '1612626365'),
(25, '101', '5', 'กรกมล ศรีอ่อน', 'ชักว้าวข้างห้องน้ำ ข้างนอกด้วยนะไอสัส', 'upload/myprofile.jpg', '1612626389'),
(26, '101', '6', 'เฮ้ยมึง หาเรื่องกูเหรอ', 'ยากชิบหายเลย', '', '1612686640'),
(29, '11', '5', 'กรกมล ศรีอ่อน', '555', 'upload/myprofile.jpg', '1612688086'),
(28, '101', '6', 'เฮ้ยมึง หาเรื่องกูเหรอ', 'เว็บจองโรงแรมยังง่ายหวาตั้งลุย', '', '1612686728'),
(34, '135', '5', 'กรกมล ศรีอ่อน', 'พรี่แฮมหล่อมากๆเลยค้าบ', 'upload/myprofile.jpg', '1613402634');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `post_image` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `created` varchar(100) NOT NULL,
  `edit_time` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `post_image`, `content`, `created`, `edit_time`) VALUES
(104, '5', 'upload/Screenshot(43).png', 'คนหล่อโม้กันครับ', '1612689273', NULL),
(107, '5', 'upload/', 'เห้ยสาระเว้ย กูมีอะไรมาเล่าให้ฟัง พวกมึงจะฟังกันปะ', '1612707359', 1),
(108, '6', 'upload/', 'ชอบหี', '1612710191', NULL),
(109, '6', 'upload/', 'ทดสอบ5555', '1612710223', 3),
(135, '5', 'upload/', 'ทดสอบ', '1613402585', NULL),
(128, '6', 'upload/IMG_25640201_153353.jpg', 'วิทลัยอาชีวศึกษานครศรีธรรมราช', '1613319481', 1),
(136, '5', 'upload/myprofile.jpg', 'คนหล่อ', '1613661534', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_level` enum('USER','ADMIN') NOT NULL DEFAULT 'USER',
  `user_status` enum('WAITING','APPROVED','NOT_APPROVE','BANNED') NOT NULL DEFAULT 'WAITING',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `username2` varchar(100) NOT NULL,
  `register_time` int(50) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email2` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password2` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `profile_picture` varchar(100) NOT NULL DEFAULT 'upload/defaultpic.jpeg',
  `cover_picture` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_level`, `user_status`, `firstname`, `lastname`, `nickname`, `username`, `username2`, `register_time`, `birthday`, `gender`, `number`, `email`, `email2`, `password`, `password2`, `address`, `profile_picture`, `cover_picture`) VALUES
(11, 'USER', 'WAITING', 'fsdf', 'sdsdsd', NULL, 'asdasdsa', 'asdasdsa', 1613314813, '20 มีนาคม 2531', 'male', '0999999999', 'adasdasdsa@fdgm.com', 'adasdasdsa@fdgm.com', '1234', '1234', NULL, 'upload/defaultpic.jpeg', ''),
(5, 'ADMIN', 'APPROVED', 'กรกมล', 'ศรีอ่อน', 'บิ๊ก', 'BigzaaGamer', 'BigzaaGamer', 0, '1/January/1901', 'male', '0631233644', 'bigkonkamon@gmail.com', 'bigkonkamon@gmail.com', '5555', '1234', NULL, 'upload/myprofile.jpg', 'upload/cover/IMG_25640201_153353.jpg'),
(6, 'USER', 'WAITING', 'เฮ้ยมึง', 'หาเรื่องกูเหรอ', NULL, 'admin', 'admin', 0, '1/January/1950', 'male', '0631233644', 'kuy@gmail.com', 'kuy@gmail.com', '1234', '1234', NULL, 'upload/defaultpic.jpeg', ''),
(7, 'USER', 'BANNED', 'ชอบหี', 'ชอบหี', NULL, 'BZGM', 'BZGM', 0, '20 กุมภาพันธ์ 2543', 'male', '0631233644', 'bzgm@gmail.com', 'bzgm@gmail.com', '1234', '1234', NULL, 'upload/defaultpic.jpeg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
