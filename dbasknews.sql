-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 01:12 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbasknews`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(5) NOT NULL,
  `sub_admin_id` int(5) DEFAULT NULL,
  `title` varchar(40) DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_desc` varchar(255) DEFAULT NULL,
  `c_date` date NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT NULL,
  `deletion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `sub_admin_id`, `title`, `url`, `seo_title`, `seo_desc`, `c_date`, `date`, `status`, `deletion`) VALUES
(1, 2, 'sdfsdffgdfgh', 'sdfsdffgdfgh', 'sdfsdffgdfgh', 'sdf', '2019-11-19', '2019-11-05 16:14:23', 1, 1),
(2, 2, 'aa', 'aa', 'aa', 'aa', '2019-11-20', '2019-11-05 16:14:17', 1, 0),
(3, 2, 'dfghhhhhhh', 'dfghhhhhhh', 'dfghhhhhhh', 'dfghhhhhhh', '2019-11-14', '2019-11-02 13:49:53', 1, 1),
(4, 2, 'logggg', 'logggg', 'logggg', 'log', '2019-11-19', '2019-11-17 08:52:22', 1, 1),
(5, 2, 'aaa', 'aaa', 'aaa', 'aaa', '2019-11-20', '2019-11-17 09:11:07', 1, 1),
(6, 2, 'aaa', 'aaa', 'aaa', 'aaa', '2019-11-20', '2019-11-17 09:12:49', 1, 1),
(7, 2, 'aaa', 'aaa', 'aaa', 'aaa', '2019-11-20', '2019-11-17 09:13:28', 1, 1),
(8, 2, 'aaa', 'aaa', 'aaa', 'aaa', '2019-11-20', '2019-11-17 09:13:37', 1, 1),
(9, 2, 'aaa', 'aaa', 'aaa', 'aaa', '2019-11-20', '2019-11-17 09:14:41', 1, 1),
(10, 2, 'aaa', 'aaa', 'aaa', 'aaa', '2019-11-20', '2019-11-17 09:16:33', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(10) NOT NULL,
  `news_id` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '0',
  `deletion` tinyint(4) NOT NULL DEFAULT '0',
  `spammsg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `news_id`, `user_name`, `comment`, `postdate`, `status`, `deletion`, `spammsg`) VALUES
(1, 17, 'shabnam', 'good news', '2019-11-09 18:18:31', 2, 1, ''),
(2, 21, 'shabnam', 'fake news', '2019-11-09 17:58:49', 2, 0, ''),
(3, 23, 'shazia', 'good', '2019-11-09 18:09:26', 1, 0, ''),
(4, 27, 'neha', 'work hard', '2019-11-09 18:41:39', 1, 0, ''),
(5, 29, 'kavya', 'old news', '2019-11-11 03:35:19', 2, 0, ''),
(6, 21, 'priyanka', 'good news', '2019-11-11 03:45:48', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content_creator`
--

CREATE TABLE `tbl_content_creator` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ChannelName` varchar(20) NOT NULL,
  `ChannelDescription` varchar(200) NOT NULL,
  `IP` varchar(20) NOT NULL,
  `AccountApproval` tinyint(1) NOT NULL DEFAULT '0',
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `channel_logo` varchar(20) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletion` tinyint(1) NOT NULL DEFAULT '1',
  `Monetization` tinyint(4) NOT NULL DEFAULT '0',
  `join_date` varchar(10) NOT NULL,
  `privacy` tinyint(1) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `account_holder_name` varchar(30) NOT NULL,
  `bank_account_number` varchar(20) NOT NULL,
  `ifsc_code` varchar(11) NOT NULL,
  `earnings` decimal(12,2) NOT NULL,
  `life_time_withdraw_amt` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_content_creator`
--

INSERT INTO `tbl_content_creator` (`id`, `username`, `email`, `mobile`, `password`, `ChannelName`, `ChannelDescription`, `IP`, `AccountApproval`, `Status`, `channel_logo`, `DateTime`, `deletion`, `Monetization`, `join_date`, `privacy`, `bank_name`, `account_holder_name`, `bank_account_number`, `ifsc_code`, `earnings`, `life_time_withdraw_amt`) VALUES
(1, 'shabnam20', 'shabnam@gmail.com', 8238347295, '6083400d6743368844a5a3f3e86aa5b7', 'tech', 'good channel for technicians', '', 1, 1, '1573281867.jpg', '2019-11-01 09:45:42', 1, 0, '', 0, '', '', '', '', '0.00', '0.00'),
(2, 'Avinash1232', 'shab@gmail.com', 7412589630, '6083400d6743368844a5a3f3e86aa5b7', '', '', '', 1, 1, 'default.jpg', '2019-11-01 09:45:42', 1, 0, '', 0, '', '', '', '', '0.00', '0.00'),
(3, 'Avinash123', 'shab@gmail.com', 7415896304, '6083400d6743368844a5a3f3e86aa5b7', '', '', '', 1, 1, '', '2019-11-01 09:45:42', 1, 0, '', 0, '', '', '', '', '0.00', '0.00'),
(4, 'Shazia', 'shazia@gmail.com', 7418529630, '6083400d6743368844a5a3f3e86aa5b7', 'dhb', 'fdvgbhnj', '::1', 1, 1, 'default.jpg', '2019-11-01 12:49:46', 1, 0, '', 0, '', '', '', '', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(10) NOT NULL,
  `user_id` int(7) NOT NULL,
  `module_user_id` int(3) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL,
  `reply` text NOT NULL,
  `role` int(1) NOT NULL,
  `c_date` date NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `user_id`, `module_user_id`, `subject`, `message`, `reply`, `role`, `c_date`, `u_date`, `ip`, `status`, `deletion`) VALUES
(1, 3, 2, 'account audition problem', 'please approve my account', 'ok sure please wait', 1, '2019-11-12', '2019-11-17 11:35:04', '::1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(5) NOT NULL,
  `sub_admin_id` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `seo_title` varchar(200) DEFAULT NULL,
  `seo_desc` varchar(200) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `c_date` date NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT NULL,
  `deletion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `sub_admin_id`, `title`, `url`, `seo_title`, `seo_desc`, `location`, `c_date`, `date`, `status`, `deletion`) VALUES
(1, '2', 'First Gallery', 'first-gallery', 'first-gallery', 'To First gallery trail', 'India', '2019-11-13', '2019-11-02 11:11:06', 0, 0),
(2, '2', '$title', '$url', '$seo_title', '$seo_desc', '$location', '2019-11-19', '2019-11-02 08:22:26', 1, 1),
(4, '2', 'dsfhdfj', 'dsfhdfj', 'dsfhdfj', 'dfggh', 'dffggh', '2019-11-26', '2019-11-03 13:14:40', 1, 1),
(7, '2', 'sdffg', 'sdffg', 'sdffg', 'sdffg', 'sdffg', '2019-11-25', '2019-11-02 08:11:25', 0, 1),
(8, '2', 'sdfgaaaaaa', 'sdfgaaaaaa', 'sdfgaaaaaa', 'sdffg', 'sdfg', '2019-11-27', '2019-11-02 08:44:45', 0, 1),
(9, '2', 'rtgyhrtty', 'rtgyhrtty', 'rtgyhrtty', 'dfgh', 'dfgh', '2019-11-18', '2019-11-02 11:08:28', 1, 1),
(10, '2', 'final', 'final', 'final', 'final', 'final', '2019-11-13', '2019-11-02 11:21:05', 1, 1),
(11, '2', 'log test', 'log-test', 'log, test', 'log test', 'log test', '2019-11-27', '2019-11-17 09:18:45', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int(11) NOT NULL,
  `log` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id`, `log`, `dt`) VALUES
(1, 'The categories aaa Has Been Created on 2019-11-20', '2019-11-17 09:14:41'),
(2, 'The categories aaa Has Been Created By 2  on 2019-11-20', '2019-11-17 09:16:33'),
(3, 'The gallery log test Has Been Created By 2  on 2019-11-27', '2019-11-17 09:18:45'),
(4, 'The picture try log Has Been Created By 2  on 2019-11-28', '2019-11-17 09:20:53'),
(5, 'The picture try log Has Been Created in gallery 1 By 2  on 2019-11-28', '2019-11-17 09:22:52'),
(6, 'The slideshow log test Has Been Created By 2  on 2019-01-07', '2019-11-17 09:23:35'),
(7, 'The qna How can i create Ads? Has Been Created By 2  on 2019-11-26', '2019-11-17 11:01:52'),
(8, 'The qna How can i create Ads? Has Been Created By 2  on 2019-11-26', '2019-11-17 11:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_user`
--

CREATE TABLE `tbl_module_user` (
  `id` int(5) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `role` tinyint(1) NOT NULL DEFAULT '1',
  `deletion` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_module_user`
--

INSERT INTO `tbl_module_user` (`id`, `user_name`, `first_name`, `last_name`, `email`, `password`, `date`, `ip`, `status`, `role`, `deletion`) VALUES
(1, 'asdf', 'asdffg', 'asdffg', 'asdffg', '912ec803b2ce49e4a541068d495ab570', '2019-10-30 14:47:17', '::1', 1, 0, 1),
(2, 'AviWeb', 'Avinash', 'Mishra', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '2019-10-30 14:47:51', '::1', 1, 0, 1),
(3, 'Kishan', 'Kishan', 'mishra', 'kishan12@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '2019-10-30 15:15:18', '::1', 1, 1, 1),
(4, 'num', 'shabbu', 'siduqi', 'sabu87@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-11-02 05:28:30', '::1', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `NewsID` int(10) NOT NULL,
  `CategoryID` int(5) NOT NULL,
  `CreatorID` int(10) NOT NULL,
  `TopNews` tinyint(1) NOT NULL DEFAULT '0',
  `HeadLine` varchar(100) NOT NULL,
  `Url` varchar(150) NOT NULL,
  `SeoTitle` varchar(150) NOT NULL,
  `SeoDescription` varchar(255) NOT NULL,
  `FileAttach` varchar(50) NOT NULL,
  `Summary` text NOT NULL,
  `Details` text NOT NULL,
  `Views` int(10) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL DEFAULT '1',
  `Approved` tinyint(1) NOT NULL DEFAULT '0',
  `PublishDate` date NOT NULL,
  `RejectionMsg` varchar(255) NOT NULL,
  `Offline` tinyint(1) NOT NULL DEFAULT '0',
  `Deletation` tinyint(1) NOT NULL DEFAULT '0',
  `Rejected` int(1) NOT NULL DEFAULT '1',
  `PostDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`NewsID`, `CategoryID`, `CreatorID`, `TopNews`, `HeadLine`, `Url`, `SeoTitle`, `SeoDescription`, `FileAttach`, `Summary`, `Details`, `Views`, `ModifyDate`, `Status`, `Approved`, `PublishDate`, `RejectionMsg`, `Offline`, `Deletation`, `Rejected`, `PostDate`) VALUES
(17, 3, 1, 0, 'My New News', 'my-new-news', 'my, new, news', 'hello creaton of new news', '1572800906.png', 'first News', '<p>hello hello<strong> hello&nbsp; hsbfhd<s> shabnam</s></strong></p>\r\n', 0, '2019-11-09 15:30:57', 1, 1, '0000-00-00', '', 0, 0, 1, '0000-00-00'),
(21, 3, 1, 0, 'shabnam siddiqui', 'shabnam-siddiqui', 'shabnam, siddiqui', 'shabbu ', '1572801289.jpg', 'shabbu', '<p><em>shabnam mom pic uploaded...:)</em></p>\r\n', 0, '2019-11-09 15:30:57', 1, 0, '0000-00-00', '', 0, 0, 1, '0000-00-00'),
(23, 3, 1, 0, 'avinash updated', 'avinash-updated', 'avinash, updated', '', '1573221709.JPG', 'avinash', '<p><strong>avinash updated</strong></p>\r\n\r\n<p><strong>h</strong>ello from editor&nbsp;</p>\r\n\r\n<ol>\r\n	<li>hello edited news</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>helloe edited news&nbsp;</li>\r\n</ul>\r\n', 0, '2019-11-09 15:30:57', 0, 0, '0000-00-00', 'unfollow the rules of platform', 0, 0, 2, '0000-00-00'),
(25, 0, 1, 0, 'virat kohli', 'virat-kohli', 'virat, kohli', '', '1572971720.jpg', 'dsfghjk fxcgvhbjnk ', '<p>hello from shabnam</p>\r\n', 0, '2019-11-09 15:30:57', 0, 0, '0000-00-00', 'unfollow the rules of platform', 1, 0, 3, '0000-00-00'),
(27, 2, 1, 0, 'category selected', 'category-selected', 'category, selected', '', '1572972155.jpg', 'hello from category 2', '<p>hello from category 2 this is basic details of news</p>\r\n', 0, '2019-11-09 15:30:57', 1, 0, '0000-00-00', '', 0, 0, 1, '0000-00-00'),
(29, 1, 1, 0, 'category 1 selected', 'category-1-selected', 'category, 1, selected', '', '1572973197.png', 'category1', '<p>selection of category 1 that is ssshjfh</p>\r\n', 0, '2019-11-09 15:30:57', 1, 0, '0000-00-00', '', 0, 0, 1, '0000-00-00'),
(30, 1, 1, 0, 'shabnam', 'shabnam', 'shabnam', '', '1573220143.JPG', 'shabnam siddiqui', '<ol>\r\n	<li>shabnam</li>\r\n</ol>\r\n\r\n<blockquote>\r\n<ul>\r\n	<li>hi</li>\r\n	<li>dhejhf</li>\r\n	<li>fdjbkfm,</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n</blockquote>\r\n', 0, '2019-11-09 15:30:57', 0, 0, '0000-00-00', '', 0, 0, 1, '0000-00-00'),
(35, 2, 1, 0, 'shabnam siddiqui', 'shabnam-siddiqui', 'shabnam, siddiqui', '', '1573220432.JPG', 'shabnam', '<p>shabnam editor</p>\r\n', 0, '2019-11-09 15:30:57', 0, 0, '0000-00-00', '', 0, 0, 1, '0000-00-00'),
(37, 1, 1, 0, 'maha cyclone', 'maha-cyclone', 'maha, cyclone', '', '1573220727.JPG', 'maha cyclone', '<p>maha cyclone in south gujrat</p>\r\n', 0, '2019-11-09 15:30:57', 1, 0, '0000-00-00', '', 0, 0, 1, '0000-00-00'),
(38, 0, 0, 0, 'avinash', 'avinash', 'avinash', '', '1573985652.png', 'avinash', '<p>avinash</p>\r\n', 0, '2019-11-17 10:14:12', 1, 0, '0000-00-00', '', 0, 0, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_picture`
--

CREATE TABLE `tbl_picture` (
  `id` int(5) NOT NULL,
  `sub_admin_id` int(5) NOT NULL,
  `gallery_id` int(5) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `c_date` date DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deletion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_picture`
--

INSERT INTO `tbl_picture` (`id`, `sub_admin_id`, `gallery_id`, `caption`, `image`, `c_date`, `date`, `status`, `deletion`) VALUES
(1, 0, 1, '$caption', '$img', '2019-11-05', '2019-11-07 08:00:00', 1, 0),
(6, 0, 1, '', 'a.jpg', '2019-11-27', '2019-11-02 09:48:41', 1, 0),
(7, 0, 4, 'hi', 'a.jpg', '2019-11-26', '2019-11-02 09:36:20', 1, 1),
(8, 0, 1, 'hhh1', 'images.jpg', '2018-11-01', '2019-11-02 10:23:41', 1, 1),
(9, 2, 8, 'dd', 'e65b0a2cf39c905c2c3fb8debb2f5e95.jpg', '2019-11-11', '2019-11-02 09:36:20', 1, 1),
(10, 2, 8, 'dd', 'e65b0a2cf39c905c2c3fb8debb2f5e95.jpg', '2019-11-07', '2019-11-02 14:48:08', 1, 1),
(14, 2, 1, 'sdffg', '1572691395.', '2019-11-19', '2019-11-02 10:43:14', 1, 1),
(15, 2, 1, 'sdffg', '1572691488.', '2019-11-19', '2019-11-02 10:44:48', 1, 1),
(16, 2, 1, 'sdffg', '1572691555.', '2019-11-19', '2019-11-02 10:45:54', 1, 1),
(17, 2, 1, 'sdffg', '1572691580.', '2019-11-19', '2019-11-02 10:46:20', 1, 1),
(18, 2, 1, 'sdffg', '1572691671.', '2019-11-19', '2019-11-02 10:47:51', 1, 1),
(21, 2, 1, 'sdffg', 'jpg', '2019-11-19', '2019-11-02 10:56:22', 1, 1),
(22, 2, 1, 'sdffg', '1572692200.jpg', '2019-11-19', '2019-11-02 10:56:39', 1, 1),
(23, 2, 1, 'sdffg', 'Happy-Diwali1.jpg', '2019-11-19', '2019-11-02 10:58:34', 1, 1),
(24, 2, 1, 'sdffg', '1572692267.jpg', '2019-11-19', '2019-11-02 10:57:46', 1, 1),
(25, 2, 1, 'sdffg', '1572692271.jpg', '2019-11-19', '2019-11-02 10:57:51', 1, 1),
(26, 2, 1, 'final', '1572693685.jpg', '2019-11-13', '2019-11-02 11:21:25', 1, 1),
(27, 2, 1, 'compress', '', '2019-11-20', '2019-11-02 11:59:24', 1, 1),
(28, 2, 1, 'compressing', '', '2019-11-12', '2019-11-02 12:02:56', 1, 1),
(29, 2, 1, 'comp', '', '2019-11-19', '2019-11-02 12:05:26', 1, 1),
(30, 2, 1, 'comp', '1572696358.jpg', '2019-11-19', '2019-11-02 12:05:58', 1, 1),
(31, 2, 1, 'comp final', '1572696453.jpg', '2019-11-20', '2019-11-02 12:07:32', 1, 1),
(32, 2, 1, 'erth', '1572696543.jpg', '2019-11-19', '2019-11-02 12:09:02', 1, 1),
(33, 2, 10, 'aa', '1572696646.jpg', '2019-11-26', '2019-11-02 12:10:45', 1, 1),
(34, 2, 1, 'fggh', '1572696724.jpg', '2019-11-19', '2019-11-02 12:12:03', 1, 1),
(35, 2, 1, 'fggh', '1572696724.jpg', '2019-11-19', '2019-11-02 12:12:03', 1, 1),
(36, 2, 1, 'hh', 'Screenshot (6).png', '2019-11-19', '2019-11-02 14:35:11', 1, 1),
(37, 2, 1, 'hh', 'Screenshot (38).png', '2019-11-19', '2019-11-02 14:35:40', 1, 1),
(38, 2, 1, 'hh', '1572703510.png', '2019-11-19', '2019-11-02 14:05:09', 1, 1),
(39, 2, 1, 'shabu', '1572763809.png', '2019-11-08', '2019-11-03 06:50:09', 1, 1),
(40, 2, 7, 'demo', '1572766994.png', '2019-10-30', '2019-11-03 07:43:13', 1, 1),
(41, 2, 10, 'defghbnjm', '1572767421.png', '2019-11-21', '2019-11-03 07:50:21', 1, 1),
(42, 2, 1, 'try log', '1573982453.png', '2019-11-28', '2019-11-17 09:20:53', 1, 1),
(43, 2, 1, 'try log', '1573982573.png', '2019-11-28', '2019-11-17 09:22:52', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qna`
--

CREATE TABLE `tbl_qna` (
  `id` int(5) NOT NULL,
  `module_user_id` int(5) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `c_date` date NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_qna`
--

INSERT INTO `tbl_qna` (`id`, `module_user_id`, `question`, `answer`, `c_date`, `u_date`, `role`, `status`, `deletion`) VALUES
(1, 2, 'How Can I earn money ?', 'By Writing News you can earn money from our platform', '2019-11-13', '2019-11-17 10:53:41', 0, 1, 1),
(2, 2, 'How can i create Ads?', 'you should join our we media program', '2019-11-26', '2019-11-17 11:02:53', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `rating` tinyint(1) NOT NULL DEFAULT '0',
  `c_date` date NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slideshow`
--

CREATE TABLE `tbl_slideshow` (
  `id` int(5) NOT NULL,
  `sub_admin_id` int(5) NOT NULL,
  `image` varchar(100) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `orderby` int(3) NOT NULL,
  `c_date` date NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deletion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slideshow`
--

INSERT INTO `tbl_slideshow` (`id`, `sub_admin_id`, `image`, `caption`, `orderby`, `c_date`, `date`, `status`, `deletion`) VALUES
(1, 2, '1572703936.png', 'First Announcement', 0, '0000-00-00', '2019-11-17 10:15:48', 1, 1),
(2, 2, '1572704037.png', 'First Announcement', 0, '0000-00-00', '2019-11-02 14:15:58', 1, 1),
(3, 2, '1572704166.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:16:06', 1, 1),
(4, 2, '1572704283.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:18:03', 1, 1),
(5, 2, '1572704292.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:18:11', 1, 1),
(6, 2, '1572704366.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:19:25', 1, 1),
(7, 2, '1572704371.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:19:30', 1, 1),
(8, 2, '1572704395.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:19:54', 1, 1),
(9, 2, '1572704413.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:20:13', 1, 1),
(10, 2, '1572704417.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:20:16', 1, 1),
(11, 2, '1572704437.png', 'aaaa', 0, '2019-11-06', '2019-11-02 14:20:36', 1, 1),
(12, 2, '1573982615.png', 'log test', 1, '2019-01-07', '2019-11-17 09:23:35', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_super_admin`
--

CREATE TABLE `tbl_super_admin` (
  `id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `register_ip` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_super_admin`
--

INSERT INTO `tbl_super_admin` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `date`, `register_ip`, `status`) VALUES
(1, 'Avinash', 'Mishra', 'Avinash123', 'avinas9823@gmail.com', '97cddd635cef02b3ceaf25641f9b2eee', '2019-10-23 17:59:59', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_viewer`
--

CREATE TABLE `tbl_viewer` (
  `id` int(5) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `c_date` date NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_viewer`
--

INSERT INTO `tbl_viewer` (`id`, `user_name`, `email`, `password`, `ip`, `status`, `c_date`, `u_date`) VALUES
(1, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '::1', 1, '0000-00-00', '2019-11-03 06:11:47'),
(2, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '::1', 1, '0000-00-00', '2019-11-03 06:13:40'),
(3, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '::1', 1, '0000-00-00', '2019-11-03 06:15:00'),
(1, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '::1', 1, '0000-00-00', '2019-11-03 06:11:47'),
(2, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '::1', 1, '0000-00-00', '2019-11-03 06:13:40'),
(3, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '::1', 1, '0000-00-00', '2019-11-03 06:15:00'),
(1, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '::1', 1, '0000-00-00', '2019-11-03 06:11:47'),
(2, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '::1', 1, '0000-00-00', '2019-11-03 06:13:40'),
(3, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '::1', 1, '0000-00-00', '2019-11-03 06:15:00'),
(1, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '::1', 1, '0000-00-00', '2019-11-03 06:11:47'),
(2, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '::1', 1, '0000-00-00', '2019-11-03 06:13:40'),
(3, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '::1', 1, '0000-00-00', '2019-11-03 06:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_content_creator`
--
ALTER TABLE `tbl_content_creator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_module_user`
--
ALTER TABLE `tbl_module_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`NewsID`);

--
-- Indexes for table `tbl_picture`
--
ALTER TABLE `tbl_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_qna`
--
ALTER TABLE `tbl_qna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slideshow`
--
ALTER TABLE `tbl_slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_super_admin`
--
ALTER TABLE `tbl_super_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_content_creator`
--
ALTER TABLE `tbl_content_creator`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_module_user`
--
ALTER TABLE `tbl_module_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `NewsID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_picture`
--
ALTER TABLE `tbl_picture`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_qna`
--
ALTER TABLE `tbl_qna`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_slideshow`
--
ALTER TABLE `tbl_slideshow`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_super_admin`
--
ALTER TABLE `tbl_super_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
