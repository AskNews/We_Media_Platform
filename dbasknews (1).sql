-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2019 at 01:26 PM
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
(1, 2, 'sdfsdffgdfgh', 'sdfsdffgdfgh', 'sdfsdffgdfgh', 'sdf', '2019-11-19', '2019-11-02 13:48:39', 0, 1),
(2, 2, 'aa', 'aa', 'aa', 'aa', '2019-11-20', '2019-11-02 13:41:15', 0, 0),
(3, 2, 'dfghhhhhhh', 'dfghhhhhhh', 'dfghhhhhhh', 'dfghhhhhhh', '2019-11-14', '2019-11-02 13:49:53', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content_creator`
--

CREATE TABLE `tbl_content_creator` (
  `CreatorID` int(10) NOT NULL,
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
  `deletion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_content_creator`
--

INSERT INTO `tbl_content_creator` (`CreatorID`, `username`, `email`, `mobile`, `password`, `ChannelName`, `ChannelDescription`, `IP`, `AccountApproval`, `Status`, `channel_logo`, `DateTime`, `deletion`) VALUES
(1, 'shabnam', 'shabnam@gmail.com', 8238347295, '6083400d6743368844a5a3f3e86aa5b7', 'tech', 'good channel for technicians', '', 0, 1, 'default.jpg', '2019-11-01 09:45:42', 1),
(9, 'Avinash1232', 'shab@gmail.com', 7412589630, '6083400d6743368844a5a3f3e86aa5b7', '', '', '', 0, 1, 'default.jpg', '2019-11-01 09:45:42', 1),
(10, 'Avinash123', 'shab@gmail.com', 7415896304, '6083400d6743368844a5a3f3e86aa5b7', '', '', '', 0, 1, '', '2019-11-01 09:45:42', 1),
(15, 'Shazia', 'shazia@gmail.com', 7418529630, '6083400d6743368844a5a3f3e86aa5b7', 'dhb', 'fdvgbhnj', '::1', 0, 1, 'default.jpg', '2019-11-01 12:49:46', 1);

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
(4, '2', 'dsfhdfj', 'dsfhdfj', 'dsfhdfj', 'dfggh', 'dffggh', '2019-11-26', '2019-11-02 08:45:04', 0, 1),
(7, '2', 'sdffg', 'sdffg', 'sdffg', 'sdffg', 'sdffg', '2019-11-25', '2019-11-02 08:11:25', 0, 1),
(8, '2', 'sdfgaaaaaa', 'sdfgaaaaaa', 'sdfgaaaaaa', 'sdffg', 'sdfg', '2019-11-27', '2019-11-02 08:44:45', 0, 1),
(9, '2', 'rtgyhrtty', 'rtgyhrtty', 'rtgyhrtty', 'dfgh', 'dfgh', '2019-11-18', '2019-11-02 11:08:28', 1, 1),
(10, '2', 'final', 'final', 'final', 'final', 'final', '2019-11-13', '2019-11-02 11:21:05', 1, 1);

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
  `PostDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `Approved` tinyint(1) NOT NULL DEFAULT '0',
  `PublishDate` date NOT NULL,
  `RejectionMsg` varchar(50) NOT NULL,
  `Offline` tinyint(1) NOT NULL DEFAULT '0',
  `Deletation` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`NewsID`, `CategoryID`, `CreatorID`, `TopNews`, `HeadLine`, `Url`, `SeoTitle`, `SeoDescription`, `FileAttach`, `Summary`, `Details`, `Views`, `PostDate`, `Status`, `Approved`, `PublishDate`, `RejectionMsg`, `Offline`, `Deletation`) VALUES
(1, 3, 1, 0, 'fvgbhjnkm vgbhjnm,', 'fvgbhjnkm-vgbhjnm', 'fvgbhjnkm, vgbhjnm', 'dfvgbhnjm,', '', 'hghbjn', '\r\ncfvgb n', 0, '2019-11-03 06:21:12', 0, 0, '0000-00-00', '', 0, 0),
(2, 3, 1, 0, 'fvgbhjnkm  vgbhjnm,', 'fvgbhjnkm-vgbhjnm', 'fvgbhjnkm, vgbhjnm', 'dfvgbhnjm,', '', 'hghbjn', '<p>cfvgb n</p>\r\n', 0, '2019-11-03 06:22:40', 0, 0, '0000-00-00', '', 0, 0),
(3, 3, 1, 0, 'fvgbhjnkm  vgbhjnm,', 'fvgbhjnkm-vgbhjnm', 'fvgbhjnkm, vgbhjnm', 'dfvgbhnjm,', '', 'hghbjn', '<p>cfvgb n</p>\r\n', 0, '2019-11-03 06:23:13', 0, 0, '0000-00-00', '', 0, 0),
(4, 3, 1, 0, 'qwerdfghjkm, wedfghjnkm ', 'qwerdfghjkm-wedfghjnkm', 'qwerdfghjkm, wedfghjnkm', 'edfghbjnkml', '', 'erdfghjkl', '<p>sdfcgvhbjnm,</p>\r\n', 0, '2019-11-03 06:24:03', 1, 0, '0000-00-00', '', 0, 0),
(5, 3, 1, 0, 'qwerdfghjkm, wedfghjnkm ', 'qwerdfghjkm-wedfghjnkm', 'qwerdfghjkm, wedfghjnkm', 'edfghbjnkml', '', 'erdfghjkl', '<p>sdfcgvhbjnm,</p>\r\n', 0, '2019-11-03 06:31:00', 1, 0, '0000-00-00', '', 0, 0),
(6, 3, 1, 0, 'dfghy wdfgh dfghj', 'dfghy-wdfgh-dfghj', 'dfghy, wdfgh, dfghj', 'wsedrtyu', '', 'dfghy', '<p>eghj wdfgh&nbsp;</p>\r\n', 0, '2019-11-03 06:40:24', 1, 0, '0000-00-00', '', 0, 0),
(7, 3, 1, 0, 'dfghy wdfgh dfghj', 'dfghy-wdfgh-dfghj', 'dfghy, wdfgh, dfghj', 'wsedrtyu', '', 'dfghy', '<p>eghj wdfgh&nbsp;</p>\r\n', 0, '2019-11-03 06:41:32', 1, 0, '0000-00-00', '', 0, 0),
(8, 3, 1, 0, 'dfghy wdfgh dfghj', 'dfghy-wdfgh-dfghj', 'dfghy, wdfgh, dfghj', 'wsedrtyu', '', 'dfghy', '<p>eghj wdfgh&nbsp;</p>\r\n', 0, '2019-11-03 06:41:58', 1, 0, '0000-00-00', '', 0, 0),
(9, 3, 1, 0, 'fvgbhn ffvgbhnjm', 'fvgbhn-ffvgbhnjm', 'fvgbhn, ffvgbhnjm', 'vbn m', '', 'fvgbhnjm,', '<p>fcvgbhnjm</p>\r\n', 0, '2019-11-03 07:28:38', 1, 0, '0000-00-00', '', 0, 0),
(10, 3, 1, 0, 'fvgbhn ffvgbhnjm', 'fvgbhn-ffvgbhnjm', 'fvgbhn, ffvgbhnjm', 'vbn m', '', 'fvgbhnjm,', '<p>fcvgbhnjm</p>\r\n', 0, '2019-11-03 07:31:34', 1, 0, '0000-00-00', '', 0, 0),
(11, 3, 1, 0, 'fvgbhn ffvgbhnjm', 'fvgbhn-ffvgbhnjm', 'fvgbhn, ffvgbhnjm', 'vbn m', '', 'fvgbhnjm,', '<p>fcvgbhnjm</p>\r\n', 0, '2019-11-03 07:31:37', 1, 0, '0000-00-00', '', 0, 0),
(12, 3, 1, 0, 'fvgbhn ffvgbhnjm', 'fvgbhn-ffvgbhnjm', 'fvgbhn, ffvgbhnjm', 'vbn m', '', 'fvgbhnjm,', '<p>fcvgbhnjm</p>\r\n', 0, '2019-11-03 07:31:38', 1, 0, '0000-00-00', '', 0, 0),
(13, 3, 1, 0, 'cfvgbhnjm', 'cfvgbhnjm', 'cfvgbhnjm', 'fghnjmk,', '1572766335.png', 'drfghbnjmkl,', '<p>fvgb nmgvbhnm<strong>vgbhnm</strong></p>\r\n\r\n<p><strong><em>b nmbhjn m,shabnam</em></strong></p>\r\n', 0, '2019-11-03 07:32:15', 1, 0, '0000-00-00', '', 0, 0);

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
(41, 2, 10, 'defghbnjm', '1572767421.png', '2019-11-21', '2019-11-03 07:50:21', 1, 1);

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
(1, 2, '1572703936.png', 'First Announcement', 0, '0000-00-00', '2019-11-02 14:15:58', 1, 1),
(2, 2, '1572704037.png', 'First Announcement', 0, '0000-00-00', '2019-11-02 14:15:58', 1, 1),
(3, 2, '1572704166.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:16:06', 1, 1),
(4, 2, '1572704283.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:18:03', 1, 1),
(5, 2, '1572704292.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:18:11', 1, 1),
(6, 2, '1572704366.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:19:25', 1, 1),
(7, 2, '1572704371.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:19:30', 1, 1),
(8, 2, '1572704395.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:19:54', 1, 1),
(9, 2, '1572704413.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:20:13', 1, 1),
(10, 2, '1572704417.png', 'First Announcement', 0, '2019-11-20', '2019-11-02 14:20:16', 1, 1),
(11, 2, '1572704437.png', 'aaaa', 0, '2019-11-06', '2019-11-02 14:20:36', 1, 1);

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_module_user`
--
ALTER TABLE `tbl_module_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `NewsID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_picture`
--
ALTER TABLE `tbl_picture`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_slideshow`
--
ALTER TABLE `tbl_slideshow`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_super_admin`
--
ALTER TABLE `tbl_super_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
