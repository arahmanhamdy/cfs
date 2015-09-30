-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 30, 2015 at 10:17 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cfs`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `is_slider` enum('false','top','bottom') NOT NULL DEFAULT 'false',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `body`, `image`, `is_slider`, `create_date`, `user_id`) VALUES
(1, 'test 1', '&lt;p&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.&lt;/p&gt;', '14435051741.jpg', 'top', '2015-09-29 05:39:35', 1),
(2, 'test 2', '&lt;p&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.&lt;/p&gt;', '14435052912.jpg', 'top', '2014-12-28 05:41:31', 1),
(3, 'test 3', '&lt;p&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.&lt;/p&gt;', '14435053123.jpg', 'top', '2015-07-29 05:41:52', 1),
(4, 'test 4', '&lt;p&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.&lt;/p&gt;', '14435053294.jpg', 'top', '2015-09-29 05:42:09', 1),
(5, 'test bottom 1 ', '&lt;p&gt;It is a long established fact that a reader will base&lt;/p&gt;', '1443507011b1.jpg', 'bottom', '2015-09-29 06:10:11', 1),
(6, 'test bottom 2', '&lt;h2&gt;It is a long established fact that a reader will b&lt;/h2&gt;', '14435070383.jpg', 'bottom', '2015-08-29 06:10:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `session` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_home` tinyint(1) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `image`, `name`, `duration`, `session`, `is_home`, `description`) VALUES
(3, '1443390681camera.png', 'Directing', '2 weeks', '2 hours', 0, 'The film director’s primary task is to interpret the screenplay and translate it visually. He is the creative mindthat choosesthe aesthetical and technical specifications to be implemented in his vision. To succeed in this mission, he is involved from the early stages of pre-production all the way to the final phase of post.\r\n'),
(4, '1443634900directing.png', 'CenimaTography', '16 HOURS / 2Months', '2HOURS', 1, 'The cinematographer or director of photography (DP) is the person in charge of actually shooting the film. He is the head of the camera and lighting departments, and as such he has a big role in the making of any movie. As early as pre-production, the DP has to make some crucial decisions about the look and feel of a movie: is it going to be color or black and white?\r\n'),
(5, '1443634944production.png', 'production', '2 weeks', '2 hours', 0, 'In digital video, photography, television and film, production refers to the tasks that must be completed or executed during the filming or shooting. This includes tasks such as setting up scenes, the capture of raw footage, and usage of set designs, to name a few of the many pre-production tasks. Production is the second step in film creation. It follows the pre-production phase and evolves into the post-production stage. ');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `facebook` varchar(128) NOT NULL,
  `twitter` varchar(128) NOT NULL,
  `instagram` varchar(128) NOT NULL,
  `youtube` varchar(128) NOT NULL,
  `vimeo` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`facebook`, `twitter`, `instagram`, `youtube`, `vimeo`, `email`) VALUES
('http://facebook.com/mediabalady', 'http://facebook.com/mediabalady', 'http://facebook.com/mediabalady', 'http://a.com/mediabalady', 'http://facebook.com/mediabalady', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(128) NOT NULL,
  `BirthDate` varchar(20) NOT NULL,
  `CurrentCity` varchar(20) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `University` varchar(20) NOT NULL,
  `Study` varchar(20) NOT NULL,
  `Job` varchar(20) NOT NULL,
  `Interest` int(11) NOT NULL,
  `from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `Name`, `BirthDate`, `CurrentCity`, `Email`, `Phone`, `University`, `Study`, `Job`, `Interest`, `from`, `to`) VALUES
(1, 'Abdulrahman', '1/4/1991', 'cairo', 'arahman.hamdy91@gmail.com', '01273145549', 'Cairo', 'engineering', 'instructor', 5, '1/5/1236', '1/5/1236');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `user_image` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `user_image`) VALUES
(1, 'abdo', '123', 'abdo.png'),
(2, 'roots', 'e36d696fc55cecd299c76458d03fb8c5', 'abdo.png'),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', 'abdo.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
