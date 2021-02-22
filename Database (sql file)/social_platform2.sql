-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 11:47 AM
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
(23, '12', '5', 'กรกมล ศรีอ่อน', 'ชอบหี', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1612625791'),
(24, '101', '5', 'กรกมล ศรีอ่อน', 'แตกใส่ขวดสปอนเซอร์เลยไอเหี้ย 788 กองใหญ่ๆ', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1612626365'),
(25, '101', '5', 'กรกมล ศรีอ่อน', 'ชักว้าวข้างห้องน้ำ ข้างนอกด้วยนะไอสัส', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1612626389'),
(26, '101', '6', 'เฮ้ยมึง หาเรื่องกูเหรอ', 'ยากชิบหายเลย', '', '1612686640'),
(29, '11', '5', 'กรกมล ศรีอ่อน', '555', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1612688086'),
(28, '101', '6', 'เฮ้ยมึง หาเรื่องกูเหรอ', 'เว็บจองโรงแรมยังง่ายหวาตั้งลุย', '', '1612686728'),
(30, '128', '5', 'กรกมล ศรีอ่อน', 'สวยคาด', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1613319590'),
(31, '116', '6', 'เฮ้ยมึง หาเรื่องกูเหรอ', 'เหี้ยไรเนี่ย555', 'upload/defaultpic.jpeg', '1613118223'),
(32, '119', '5', 'กรกมล ศรีอ่อน', 'เพ้อหลาวบ่าวนี้', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1613145236'),
(33, '132', '5', 'กรกมล ศรีอ่อน', 'สวยจริง', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1613383900'),
(34, '132', '5', 'กรกมล ศรีอ่อน', '555', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1613385138'),
(35, '132', '5', 'กรกมล ศรีอ่อน', 'ทดสอบ', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1613385233'),
(36, '132', '5', 'กรกมล ศรีอ่อน', 'ห้องสวยคาดนะ', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1613385330');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `location`, `user_id`, `date_added`) VALUES
(1, 'upload/10355746_10201322838071324_4012919269830340563_n.jpg', '1', '2014-10-13 01:11:07'),
(2, 'upload/1554634_934733823220509_3613827536046659520_n.jpg', '3', '2014-10-13 01:12:00'),
(3, 'upload/10009346_637081149680216_1873786828_n.jpg', '3', '2014-10-13 01:22:41'),
(4, 'upload/10409409_812993662052447_8357350814467004075_n.jpg', '3', '2014-10-13 01:28:18'),
(5, 'upload/1391735_10201428940032137_674307711_n.jpg', '3', '2014-10-13 01:28:23'),
(6, 'upload/988842_777445008951996_1989282849_n.jpg', '3', '2014-10-13 01:51:59'),
(7, 'upload/2.jpg', '1', '2014-10-13 06:00:08'),
(8, 'upload/10.jpg', '2', '2014-10-14 07:34:19'),
(9, 'upload/covernirolyn.jpg', '1', '2014-10-14 18:51:36'),
(10, 'upload/covernimark.jpg', '2', '2014-10-14 18:53:51');

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
(104, '5', 'upload/Screenshot (43).png', 'คนหล่อโม้กันครับ', '1612689273', NULL),
(107, '5', 'upload/', 'เห้ยสาระเว้ย กูมีอะไรมาเล่าให้ฟัง พวกมึงจะฟังกันปะ ตอนนั้สมัยเรียนช่าง ไอเหี้ยก็ต้องแบบว่า พวกมึงจะด่ากูเหี้ยปะวะ ถ้ากูเคแบบชัก---ข้างห้องน้ำ ข้างนอกด้วยนะไอสัด โคตรเหี้ยเลยไอเหี้ยฮาว่ะ', '1612707359', 2),
(108, '6', 'upload/', 'ชอบหี', '1612710191', NULL),
(109, '6', 'upload/', 'ทดสอบ5555', '1612710223', 3),
(128, '6', 'upload/IMG_25640201_153353.jpg', 'วิทลัยอาชีวศึกษานครศรีธรรมราช', '1613319481', 1),
(131, '5', 'upload/ที่พักติดน้ำทะเลหัวหิน-โรงแรมสุดหรู-1024x768.jpg', 'ปาร์ตี้ริมสระสวยมากคับ', '1613375167', 2),
(132, '5', 'upload/single01.jpg', 'ห้องสวยมากคับ5555', '1613375341', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_level` enum('USER','ADMIN') NOT NULL DEFAULT 'USER',
  `user_status` enum('WAITING','APPROVED','NOT_APPROVE') NOT NULL DEFAULT 'WAITING',
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
(5, 'ADMIN', 'APPROVED', 'กรกมล', 'ศรีอ่อน', 'บิ๊ก', 'BigzaaGamer', 'BigzaaGamer', 0, '1/January/1901', 'male', '0631233644', 'bigkonkamon@gmail.com', 'bigkonkamon@gmail.com', '5555', '1234', NULL, 'upload/vlcsnap-2020-12-08-20h28m36s765.png', 'upload/cover/IMG_25640201_153353.jpg'),
(6, 'ADMIN', 'APPROVED', 'เฮ้ยมึง', 'หาเรื่องกูเหรอ', NULL, 'admin', 'admin', 0, '1/January/1950', 'male', '0631233644', 'kuy@gmail.com', 'kuy@gmail.com', '1234', '1234', NULL, 'upload/defaultpic.jpeg', ''),
(7, 'USER', 'APPROVED', 'ชอบหี', 'ชอบหี', NULL, 'BZGM', 'BZGM', 0, '20 กุมภาพันธ์ 2543', 'male', '0631233644', 'bzgm@gmail.com', 'bzgm@gmail.com', '1234', '1234', NULL, 'upload/defaultpic.jpeg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`);

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
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
