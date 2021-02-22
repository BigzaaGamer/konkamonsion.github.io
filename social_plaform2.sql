-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2021 at 04:06 PM
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
-- Database: `biobook`
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
(3, '5', '2', 'Mark Anthony Monaya', 'cute ah', 'upload/6.jpg', ''),
(4, '1', '2', 'Mark Anthony Monaya', 'cute pre ah .ikaw na gd na..', 'upload/6.jpg', ''),
(5, '2', '2', 'Mark Anthony Monaya', 'bkud tnie qng nka upod ka pre..', 'upload/6.jpg', ''),
(6, '2', '1', 'Rolyn Jasper Demerin', 'mayu pre buh .nd mn b puedi pre .ok lang na ah', 'upload/rolyn.jpg', ''),
(7, '2', '1', 'Rolyn Jasper Demerin', 'hehehe. :d', 'upload/rolyn.jpg', ''),
(8, '1', '1', 'Rolyn Jasper Demerin', 'wahaha . ayus pre ah', 'upload/rolyn.jpg', ''),
(11, '3', '2', 'Mark Anthony Monaya', 'pra mai ma comment mn sa pp mu..', 'upload/6.jpg', ''),
(12, '3', '2', 'Mark Anthony Monaya', 'pra mai ma comment mn sa pp mu..', 'upload/6.jpg', ''),
(13, '7', '2', 'Mark Anthony Monaya', 'wahaha', 'upload/6.jpg', ''),
(14, '7', '2', 'Mark Anthony Monaya', 'dkfjfj', 'upload/6.jpg', ''),
(15, '7', '2', 'Mark Anthony Monaya', 'ok na?', 'upload/6.jpg', '1413322175'),
(16, '8', '2', 'Mark Anthony Monaya', 'ok mn pre?', 'upload/6.jpg', '1413322623'),
(17, '10', '2', 'Mark Anthony Monaya', 'wahaha', 'upload/6.jpg', '1413322694'),
(18, '9', '2', 'Mark Anthony Monaya', 'kk', 'upload/6.jpg', '1413323909'),
(19, '9', '2', 'Mark Anthony Monaya', 'kjbhkj', 'upload/6.jpg', '1413323915'),
(20, '9', '2', 'Mark Anthony Monaya', 'jbnjnb', 'upload/6.jpg', '1413323921'),
(23, '12', '5', 'Konkamon Sion', 'ชอบหี', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1612625791'),
(24, '101', '5', 'Konkamon Sion', 'แตกใส่ขวดสปอนเซอร์เลยไอเหี้ย 788 กองใหญ่ๆ', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1612626365'),
(25, '101', '5', 'Konkamon Sion', 'ชักว้าวข้างห้องน้ำ ข้างนอกด้วยนะไอสัส', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1612626389'),
(26, '101', '6', 'เฮ้ยมึง หาเรื่องกูเหรอ', 'ยากชิบหายเลย', '', '1612686640'),
(29, '11', '5', 'Konkamon Sion', '555', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1612688086'),
(30, '107', '5', 'Konkamon Sion', 'ไหนวะๆ', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', '1612709257'),
(28, '101', '6', 'เฮ้ยมึง หาเรื่องกูเหรอ', 'เว็บจองโรงแรมยังง่ายหวาตั้งลุย', '', '1612686728');

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
  `content` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `post_image`, `content`, `created`) VALUES
(9, '2', 'upload/8.jpg', 'ok mn?', '1413322666'),
(11, '5', 'upload/EGgAjTXU8AA0L9h.jpg', '????-?', '1612607226'),
(100, '5', 'upload/1.jpg', 'ddddddddd', '1612626141'),
(104, '5', 'upload/Screenshot (43).png', 'คนหล่อคุยกันครับ', '1612689273'),
(107, '5', 'upload/', 'เห้ยสาระเว้ย กูมีอะไรมาเล่าให้ฟัง', '1612707359'),
(108, '6', 'upload/', 'ชอบหี', '1612710191'),
(109, '6', 'upload/', 'วสหฟกวฟาหดสาฟหกสดาฟสดวาฟกสวดฟกดฟกดฟกด', '1612710223');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_level` enum('USER','ADMIN') NOT NULL DEFAULT 'USER',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `username2` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email2` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password2` varchar(100) NOT NULL,
  `profile_picture` varchar(100) NOT NULL DEFAULT 'upload/defaultpic.jpeg',
  `cover_picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_level`, `firstname`, `lastname`, `username`, `username2`, `birthday`, `gender`, `number`, `email`, `email2`, `password`, `password2`, `profile_picture`, `cover_picture`) VALUES
(1, 'USER', 'Rolyn Jasper', 'Demerin', 'revengeHatred', 'revengeHatred', '13/November/1995', 'male', '09989781348', 'rolyn02@gmail.com', 'rolyn02@gmail.com', '12345', '12345', 'upload/rolyn.jpg', 'upload/covernirolyn.jpg'),
(2, 'USER', 'Mark Anthony', 'Monaya', 'bobaytot11', 'bobaytot111', '1995-11-13', 'Male', '09989781346', 'markmonaya@gmail.com', 'markmonaya@gmail.com', '123456', '123456', 'upload/6.jpg', 'upload/covernimark.jpg'),
(3, 'USER', 'Jhonalyn', 'Montero', 'jho_phet', 'jho_phet', '14/June/1996', 'female', '09285444196', 'jho_montero@gmail.com', 'jho_montero@gmail.com', 'jhopeta', 'jhopeta', 'upload/400076_2586928959209_1713686254_n.jpg', ''),
(4, 'USER', 'Shaira', 'Gaston', 'djBatman', 'djBatman', '1/January/1901', 'female', '09989781356', 'shaira_gaston@gmail.com', 'shaira_gaston@gmail.com', '1234567', '1234567', 'upload/1554634_934733823220509_3613827536046659520_n.jpg', ''),
(5, 'USER', 'Konkamon', 'Sion', 'BigzaaGamer', 'BigzaaGamer', '1/January/1901', 'male', '0631233644', 'bigkonkamon@gmail.com', 'bigkonkamon@gmail.com', '5555', '1234', 'upload/vlcsnap-2020-12-08-20h28m36s765.png', 'upload/Screenshot (127).png'),
(6, 'ADMIN', 'เฮ้ยมึง', 'หาเรื่องกูเหรอ', 'admin', 'admin', '1/January/1950', 'male', '0631233644', 'kuy@gmail.com', 'kuy@gmail.com', '1234', '1234', 'upload/defaultpic.jpeg', '');

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
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
