-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 08:27 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

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
-- Table structure for table `tbl_adunit`
--

CREATE TABLE `tbl_adunit` (
  `id` int(10) NOT NULL,
  `unit_name` varchar(30) NOT NULL,
  `category_id` int(2) NOT NULL,
  `ad_creator_id` int(10) NOT NULL,
  `file_attach` varchar(50) NOT NULL,
  `view` int(10) NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `approve` tinyint(1) NOT NULL,
  `publish_date` date NOT NULL,
  `rejection_msg` varchar(255) NOT NULL,
  `offline` tinyint(1) NOT NULL,
  `rejected` tinyint(1) NOT NULL DEFAULT 1,
  `c_date` varchar(15) DEFAULT NULL,
  `cpc` decimal(10,0) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `url` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adunit`
--

INSERT INTO `tbl_adunit` (`id`, `unit_name`, `category_id`, `ad_creator_id`, `file_attach`, `view`, `u_date`, `status`, `approve`, `publish_date`, `rejection_msg`, `offline`, `rejected`, `c_date`, `cpc`, `amount`, `url`) VALUES
(1, 'test', 3, 1, 'dor.jpg', 10, '2020-11-04 08:16:05', 1, 1, '2020-04-07', '', 0, 2, '2020-10-30', '2', '64.00', NULL),
(2, 'first ad', 1, 1, '1604391656.png', 0, '2020-11-04 08:16:29', 1, 0, '0000-00-00', '', 0, 2, '2020-10-30', '1', '5.00', 'www.amazon.in'),
(3, 'job ad', 4, 1, '1604465129.jpg', 0, '2020-11-04 08:16:25', 1, 0, '0000-00-00', '', 0, 1, '2020-10-30', '1', '100.00', 'www.amaon,in'),
(4, 'job ad', 5, 1, '1604465136.jpg', 0, '2020-11-04 08:16:17', 0, 0, '0000-00-00', '', 1, 3, '2020-10-30', '1', '100.00', 'www.amaon,in'),
(5, 'science ad', 6, 1, '1604475741.png', 0, '2020-11-05 10:30:54', 0, 0, '0000-00-00', '', 0, 2, '2020-10-30', '1', '100.00', 'http://www.amazon.in/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adunit_report`
--

CREATE TABLE `tbl_adunit_report` (
  `id` int(11) NOT NULL,
  `ad_id` int(5) NOT NULL,
  `news_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `company_earning` decimal(10,2) NOT NULL,
  `creator_earning` decimal(10,2) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adunit_report`
--

INSERT INTO `tbl_adunit_report` (`id`, `ad_id`, `news_id`, `user_id`, `company_earning`, `creator_earning`, `c_date`) VALUES
(11, 1, 39, 1, '1.20', '0.80', '2020-04-07 14:54:33'),
(12, 1, 23, 1, '1.20', '0.80', '2020-04-12 13:16:48'),
(13, 1, 23, 0, '1.20', '0.80', '2020-04-13 07:04:25'),
(14, 1, 39, 0, '1.20', '0.80', '2020-04-13 07:04:34'),
(15, 1, 27, 3, '1.20', '0.80', '2020-04-13 07:17:14'),
(16, 1, 38, 1, '1.20', '0.80', '2020-08-23 08:25:38'),
(17, 1, 27, 1, '1.20', '0.80', '2020-08-24 12:06:49'),
(18, 1, 30, 1, '1.20', '0.80', '2020-08-24 12:52:43'),
(20, 1, 17, 1, '1.20', '0.80', '2020-09-17 14:42:09'),
(21, 1, 21, 1, '1.20', '0.80', '2020-09-17 15:51:53'),
(22, 1, 0, 0, '1.20', '0.80', '2020-09-18 03:21:05'),
(23, 1, 29, 1, '1.20', '0.80', '2020-09-23 16:18:08'),
(24, 1, 37, 1, '1.20', '0.80', '2020-09-23 16:18:23'),
(25, 1, 21, 0, '1.20', '0.80', '2020-09-28 13:39:58'),
(26, 1, 17, 0, '1.20', '0.80', '2020-09-28 13:40:05'),
(27, 0, 21, 1, '1.20', '0.80', '2020-09-28 15:19:34'),
(28, 0, 37, 1, '1.20', '0.80', '2020-09-28 15:19:51'),
(29, 0, 17, 1, '1.20', '0.80', '2020-09-28 15:24:29'),
(30, 0, 23, 1, '1.20', '0.80', '2020-09-28 15:24:34'),
(31, 0, 23, 0, '1.20', '0.80', '2020-09-30 03:43:10'),
(32, 0, 29, 0, '1.20', '0.80', '2020-10-06 07:19:02'),
(33, 0, 17, 0, '1.20', '0.80', '2020-10-28 14:07:00'),
(34, 0, 0, 0, '1.20', '0.80', '2020-10-31 05:35:56'),
(35, 0, 0, 1, '1.20', '0.80', '2020-11-01 13:06:43'),
(36, 0, 45, 1, '1.20', '0.80', '2020-11-01 13:21:30'),
(37, 0, 39, 1, '1.20', '0.80', '2020-11-01 13:37:42'),
(38, 0, 27, 1, '1.20', '0.80', '2020-11-01 13:37:50'),
(39, 0, 29, 1, '1.20', '0.80', '2020-11-01 13:37:52'),
(40, 0, 30, 1, '1.20', '0.80', '2020-11-01 13:37:57'),
(41, 0, 35, 1, '1.20', '0.80', '2020-11-01 13:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ad_creator`
--

CREATE TABLE `tbl_ad_creator` (
  `id` int(10) NOT NULL,
  `profile_image` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `c_date` date NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `wallet` decimal(10,2) NOT NULL,
  `lifetime_amount` decimal(10,0) NOT NULL,
  `spend_amount` decimal(10,0) NOT NULL,
  `approval` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ad_creator`
--

INSERT INTO `tbl_ad_creator` (`id`, `profile_image`, `username`, `company_name`, `phone`, `email`, `password`, `c_date`, `u_date`, `status`, `wallet`, `lifetime_amount`, `spend_amount`, `approval`) VALUES
(1, 'dor..jpg', 'pinku', 'DHJ', '7418529630', 'shabnam@gmail.com', '6083400d6743368844a5a3f3e86aa5b7', '2020-03-25', '2020-11-05 03:56:25', 1, '9800.00', '10120', '405', 1),
(2, '1604646449.png', 'Priyanka24', '', '9876456323', 'Priynka3p2411@gmail.com', '11b22ef1506af4eff38e1fffd48bd4d5', '0000-00-00', '2020-11-06 07:19:55', 1, '120.00', '200', '80', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(5) NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `c_date` date NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `title`, `c_date`, `date`, `status`) VALUES
(1, 'Education1', '2019-11-06', '2020-02-12 17:08:08', 1),
(3, 'BUSINESS', '2019-11-14', '2020-01-10 15:26:08', 1),
(4, 'CRIME', '2019-11-19', '2020-02-13 11:47:56', 1),
(5, 'JOB', '2019-11-20', '2020-02-13 11:47:59', 1),
(6, 'Science News', '2019-11-20', '2020-01-10 15:27:41', 1),
(11, 'Super Categories', '2020-02-04', '2020-10-31 05:35:27', 1),
(12, 'Life Style News', '2020-02-04', '2020-02-17 12:21:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(10) NOT NULL,
  `news_id` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 0,
  `spammsg` varchar(100) NOT NULL,
  `to_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `news_id`, `user_name`, `comment`, `postdate`, `status`, `spammsg`, `to_comment`) VALUES
(4, 23, 'neha', 'work hard', '2020-09-17 15:17:51', 2, '', 3),
(6, 21, 'priyanka', 'good news', '2020-09-18 07:05:30', 2, '', 0),
(7, 23, 'shazia', 'hey ...this is first comment from user side', '2020-08-24 13:47:14', 1, '', 4),
(10, 38, 'shabbu', 'ajax comment 2', '2020-09-17 15:17:37', 2, '', 0),
(12, 23, 'shabbu', 'hey comment', '2020-11-03 07:09:20', 0, '', 0),
(18, 23, 'shabbu', 'hey shazia from shabnam', '2020-11-03 07:11:13', 2, '', 7);

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
  `AccountApproval` tinyint(1) NOT NULL DEFAULT 0,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `channel_logo` varchar(20) NOT NULL,
  `Monetization` tinyint(4) NOT NULL DEFAULT 0,
  `c_date` varchar(10) NOT NULL,
  `privacy` tinyint(1) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `account_holder_name` varchar(30) NOT NULL,
  `bank_account_number` varchar(20) NOT NULL,
  `ifsc_code` varchar(11) NOT NULL,
  `earnings` decimal(12,2) NOT NULL,
  `life_time_withdraw_amt` decimal(12,2) NOT NULL,
  `index_point` int(3) NOT NULL DEFAULT 10,
  `u_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_content_creator`
--

INSERT INTO `tbl_content_creator` (`id`, `username`, `email`, `mobile`, `password`, `ChannelName`, `ChannelDescription`, `AccountApproval`, `Status`, `channel_logo`, `Monetization`, `c_date`, `privacy`, `bank_name`, `account_holder_name`, `bank_account_number`, `ifsc_code`, `earnings`, `life_time_withdraw_amt`, `index_point`, `u_date`) VALUES
(1, 'shabnam20', 'shabnam@gmail.com', 8238347295, '6083400d6743368844a5a3f3e86aa5b7', 'tech', 'good channel for technicians', 1, 1, '1604645812.png', 0, '', 0, '', '', '', '', '653.20', '1370.00', 20, '2020-11-06 06:56:52'),
(2, 'Avinash1232', 'shab@gmail.com', 7412589630, '6083400d6743368844a5a3f3e86aa5b7', '', '', 1, 0, 'default.jpg', 0, '', 0, '', '', '', '', '0.00', '0.00', 30, '2020-11-06 06:56:07'),
(3, 'Avinash123', 'shab@gmail.com', 7415896304, '6083400d6743368844a5a3f3e86aa5b7', '', '', 1, 0, '', 0, '', 0, '', '', '', '', '0.00', '0.00', 0, '2020-10-30 13:43:36'),
(4, 'Shazia', 'shazia@gmail.com', 7418529630, '6083400d6743368844a5a3f3e86aa5b7', 'dhb', 'fdvgbhnj', 1, 0, 'default.jpg', 0, '', 0, '', '', '', '', '0.00', '0.00', 0, '2020-10-30 13:43:36'),
(5, 'jaimin', 'jm87@gmail.com', 9898789878, 'e71b2e99a78da9c585fa1698501e527e', '', '', 0, 0, '1580186639.jpg', 0, '01/28/2020', 0, '', '', '', '', '0.00', '0.00', 0, '2020-10-30 13:43:36'),
(6, 'Kishan1', 'kishan@gmail.com', 9999999999, '6083400d6743368844a5a3f3e86aa5b7', 'AviWeb', 'Tech Channel', 0, 0, 'default.jpg', 0, '02/25/2020', 0, '', '', '', '', '0.00', '0.00', 1, '2020-10-30 12:50:56'),
(7, 'num202', 'num@gmail.com', 9104997177, '28269ed49a9bc6963f19e55c8ba98d33', 'Techinal channel', 'this channel for tech geeks', 1, 0, 'default.jpg', 1, '09/17/2020', 0, 'bob', 'shabnam', '789096567', 'BOBB0AB12ed', '0.00', '0.00', 0, '2020-10-30 13:43:36'),
(8, 'neha12', 'neha@gmail.com', 9104997177, '509cad8a21fefe1dbfd9b9218e037ca9', '', '', 0, 0, '1600875698.jpg', 0, '09/23/2020', 0, '', '', '', '', '0.00', '0.00', 0, '2020-10-30 13:43:36'),
(9, 'neha11', 'neha11@gmail.com', 9104997178, '6083400d6743368844a5a3f3e86aa5b7', '', '', 0, 0, 'default.jpg', 0, '10/24/2020', 0, '', '', '', '', '0.00', '0.00', 0, '2020-10-30 13:43:36'),
(10, 'avi12', 'avi12@gmail.com', 9104997179, '6083400d6743368844a5a3f3e86aa5b7', '', '', 0, 0, 'default.jpg', 0, '10/24/2020', 0, '', '', '', '', '0.00', '0.00', 0, '2020-10-30 13:43:36'),
(11, 'jaimin47', 'jaiminpanchal552@gma', 9714946717, '946dcd2b0d011ae473ef1d3bc22a3284', 'milling stone', 'road trip', 0, 1, 'default.jpg', 0, '10/31/2020', 0, '', '', '', '', '0.80', '0.00', 10, '2020-11-01 13:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(10) NOT NULL,
  `user_id` int(7) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL,
  `role` int(1) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `user_id`, `subject`, `message`, `role`, `c_date`, `file`) VALUES
(1, 1, 'account audition problem', 'please approve my account', 0, '2019-11-12 08:00:00', ''),
(3, 1, '', 'first query of user side', 2, '0000-00-00 00:00:00', ''),
(4, 4, '', 'hey..this is user', 2, '0000-00-00 00:00:00', ''),
(5, 4, '', 'shabbu', 2, '2020-04-06 13:30:42', ''),
(6, 4, '', 'hello......................', 2, '2020-04-06 13:31:11', ''),
(7, 4, '', 'fghjkl', 2, '2020-04-06 13:31:29', ''),
(8, 4, '', 'fghjk', 2, '2020-04-06 13:31:45', ''),
(9, 1, 'News Audition', 'check the feed', 0, '2020-09-17 15:18:19', ''),
(10, 1, 'Account Audition', 'why my account is not approve', 1, '2020-11-05 02:59:36', ''),
(11, 1, 'News Audition', 'why news not approve', 0, '2020-11-05 03:00:35', ''),
(12, 2, 'ad Audition', 'Good', 1, '2020-11-05 18:11:56', ''),
(13, 2, 'Other', 'overall good', 1, '2020-11-05 18:12:12', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follower`
--

CREATE TABLE `tbl_follower` (
  `id` int(5) NOT NULL,
  `content_creator_id` int(5) NOT NULL,
  `viewer_id` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_follower`
--

INSERT INTO `tbl_follower` (`id`, `content_creator_id`, `viewer_id`, `date`) VALUES
(7, 1, 3, '2020-04-13 07:17:19'),
(10, 1, 1, '2020-09-18 07:20:00'),
(11, 11, 1, '2020-11-01 13:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(5) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `c_date` date NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `title`, `c_date`, `date`, `status`) VALUES
(1, 'First Gallery1', '2019-11-13', '2020-02-12 13:43:52', 0),
(4, 'Health Gallery', '2019-11-26', '2020-02-17 12:05:45', 0),
(7, 'Lifestyle', '2019-11-25', '2020-02-17 12:03:39', 0),
(8, 'Quick Fresh Technology News', '2019-11-27', '2020-02-17 12:04:41', 0),
(9, 'Beauty Tips', '2019-11-18', '2020-02-17 12:05:15', 1),
(10, 'final', '2019-11-13', '2019-11-02 11:21:05', 1),
(11, 'log test', '2019-11-27', '2019-11-17 09:18:45', 1),
(12, 'Fenil patel', '2020-01-20', '2020-02-12 13:22:08', 0),
(13, 'Super Gallery', '2020-02-17', '2020-02-12 13:27:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE `tbl_like` (
  `id` int(5) NOT NULL,
  `viewer_id` int(5) NOT NULL,
  `news_id` int(5) NOT NULL,
  `is_like` tinyint(1) NOT NULL DEFAULT 0,
  `c_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_like`
--

INSERT INTO `tbl_like` (`id`, `viewer_id`, `news_id`, `is_like`, `c_date`) VALUES
(5, 3, 23, 1, '2020-04-06 13:01:03'),
(9, 3, 27, 1, '2020-04-13 07:17:16'),
(10, 1, 23, 1, '2020-08-24 14:26:26'),
(11, 1, 21, 1, '2020-09-17 15:52:03'),
(12, 1, 45, 1, '2020-11-01 13:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_user`
--

CREATE TABLE `tbl_module_user` (
  `id` int(5) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `role` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_module_user`
--

INSERT INTO `tbl_module_user` (`id`, `user_name`, `image`, `first_name`, `last_name`, `email`, `password`, `date`, `status`, `role`) VALUES
(2, 'AviWeb', '1581940664.png', 'Avinash', 'Mishra', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '2020-02-17 11:57:43', 1, 0),
(3, 'Kishan', '1581999632.', 'Kishan', 'mishra', 'kishan12@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '2020-02-18 04:20:31', 1, 1),
(4, 'Shabnam', '1581940758.png', 'shabbu', 'siduqi', 'sabu87@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-02-17 11:59:18', 1, 0),
(5, 'Avinash', '1581940782.png', 'Avinash', 'Mishra', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '2020-02-18 04:16:29', 1, 3),
(6, 'Lion', '1581512168.jpg', 'Lion', 'King', 'lion87@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '2020-02-12 12:56:08', 1, 0),
(7, 'news1', '1582881147.', '11', 'operator', 'news98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '2020-02-28 09:12:26', 1, 0),
(8, 'vivek', '1582880829.jpg', 'vivek', 'sir', 'vivek@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '2020-02-28 09:07:08', 1, 0),
(9, 'avi', '1600399997.jpg', 'avi', 'mishra', 'avi@gmail.com', '3fca379b3f0e322b7b7967bfcfb948ad', '2020-09-18 03:33:16', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(10) NOT NULL,
  `CategoryID` int(5) NOT NULL,
  `CreatorID` int(10) NOT NULL,
  `HeadLine` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `FileAttach` varchar(50) NOT NULL,
  `Summary` text NOT NULL,
  `Details` text NOT NULL,
  `Views` int(10) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` int(1) NOT NULL DEFAULT 1,
  `Approved` tinyint(1) NOT NULL DEFAULT 0,
  `PublishDate` varchar(15) NOT NULL,
  `RejectionMsg` varchar(255) NOT NULL,
  `Offline` tinyint(1) NOT NULL DEFAULT 0,
  `Rejected` int(1) NOT NULL DEFAULT 0,
  `PostDate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `CategoryID`, `CreatorID`, `HeadLine`, `slug`, `FileAttach`, `Summary`, `Details`, `Views`, `ModifyDate`, `Status`, `Approved`, `PublishDate`, `RejectionMsg`, `Offline`, `Rejected`, `PostDate`) VALUES
(17, 3, 1, 'My New News', 'My-New-News', '1572800906.jpg', 'first News', '<p>hello hello<strong> hello&nbsp; hsbfhd<s> shabnam</s></strong></p>\r\n', 13, '2020-11-01 12:52:43', 1, 1, '2020-04-29', '', 0, 1, '2020-10-30'),
(21, 3, 1, 'shabnam siddiqui', 'shabnam-siddiqui', '1572801289.jpg', 'shabbu', '<p><em>shabnam mom pic uploaded...:)</em></p>\r\n', 3, '2020-11-01 12:52:52', 1, 0, '2020-04-29', '', 1, 1, '2019-10-30'),
(23, 12, 1, 'news updation before exam', 'news-updation-before-exam', '1600359706.png', 'news update', '<p><strong>avinash updated</strong></p>\r\n\r\n<p><strong>h</strong>ello from editor&nbsp;</p>\r\n\r\n<ol>\r\n	<li>hello edited news</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>hello edited news&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>avinash updated</strong></p>\r\n\r\n<p><strong>h</strong>ello from editor&nbsp;</p>\r\n\r\n<ol>\r\n	<li>hello edited news</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>hello edited news&nbsp;</li>\r\n</ul>\r\n', 2, '2020-11-03 07:01:45', 1, 1, '2020-03-29', 'unfollow the rules of platform', 0, 2, '2019-10-30'),
(25, 4, 1, 'virat kohli', 'virat-kohli', '1572971720.jpg', 'dsfghjk fxcgvhbjnk ', '<p>hello from shabnam</p>\r\n', 0, '2020-11-01 13:42:32', 1, 0, '2020-03-29', '', 0, 1, '2020-06-25'),
(27, 4, 1, 'category selected', 'category-selected', '1572972155.jpg', 'hello from category 2', '<p>hello from category 2 this is basic details of news</p>\r\n', 1, '2020-11-01 13:37:50', 1, 1, '2020-03-29', '', 0, 0, '2020-07-25'),
(29, 4, 1, 'category 1 selected', 'category-1-selected', '1572973197.png', 'category1', '<p>selection of category 1 that is ssshjfh</p>\r\n', 3, '2020-11-01 13:37:52', 1, 1, '2020-03-29', '', 0, 1, '2020-07-25'),
(30, 5, 1, 'cfgvhjk', 'cfgvhjk', '1573220143.JPG', 'shabnam siddiqui', '<ol>\r\n	<li>shabnam</li>\r\n</ol>\r\n\r\n<blockquote>\r\n<ul>\r\n	<li>hi</li>\r\n	<li>dhejhf</li>\r\n	<li>fdjbkfm,</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n</blockquote>\r\n', 1, '2020-11-01 13:37:57', 1, 1, '2020-03-29', '', 0, 1, '2020-05-25'),
(35, 5, 1, 'shabnam siddiqui', 'shabnam-siddiqui', '1573220432.JPG', 'shabnam', '<p>shabnam editor</p>\r\n', 1, '2020-11-01 13:37:59', 1, 1, '2020-03-29', '', 0, 1, '2020-07-25'),
(37, 5, 1, 'maha cyclone', 'maha-cyclone', '1573220727.JPG', 'maha cyclone', '<p>maha cyclone in south gujrat</p>\r\n', 12, '2020-11-01 12:53:43', 1, 1, '2020-03-29', '', 0, 1, '2020-03-25'),
(38, 4, 1, 'avinash', 'avinash', '1573985652.png', 'avinash', '<p>avinash</p>\r\n', 10, '2020-11-01 12:53:48', 0, 1, '2020-03-25', '', 0, 1, '2020-02-25'),
(39, 3, 1, 'temp news', 'temp-news', '1573985652.png', 'dfghjkl;ghjkl;ghjkl;', 'drftgyuhijokrdftgyhujidfghjkl  drftgyuhijokrdftgyhujidfghjkl    drftgyuhijokrdftgyhujidfghjkl    drftgyuhijokrdftgyhujidfghjkl  drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl  drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl', 91, '2020-11-01 13:37:42', 1, 1, '2020-03-29', '', 0, 0, '2020-03-19'),
(40, 3, 1, 'temp news', 'temp-news', '1573985652.png', 'dfghjkl;ghjkl;ghjkl;', 'drftgyuhijokrdftgyhujidfghjkl  drftgyuhijokrdftgyhujidfghjkl    drftgyuhijokrdftgyhujidfghjkl    drftgyuhijokrdftgyhujidfghjkl  drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl  drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl', 90, '2020-11-01 12:54:02', 1, 1, '2020-03-29', '', 0, 0, '2020-03-19'),
(41, 5, 7, 'find job for it', 'find-job-for-it', '1600352392.png', 'this is for job application', '<p>The IFSC is an&nbsp;<strong>11-character code</strong>&nbsp;with the first four alphabetic characters representing the bank name, and the last six characters (usually numeric, but can be alphabetic) representing the branch. The fifth character is 0 (zero) and reserved for future use.</p>\r\n\r\n<p>19/05/2020&nbsp;&middot; Given a string str, the task is to check whether the given string is valid IFSC (Indian Financial System) Code or not by using Regular Expression. Tha valid IFSC (Indian Financial System) Code must satisfy the following conditions: It should be 11 characters long. The first four characters should be upper case alphabets.</p>\r\n', 0, '2020-11-01 12:54:18', 1, 0, '2020-03-29', '', 0, 1, '2020-06-25'),
(45, 12, 11, '15 year old\'s torturous horror: Girl raped by 4 men on 3 separate occasions15-year-old\'s torturous ', '15-year-old\'s-torturous-horror:-Girl-raped-by-4-men-on-3-separate-occasions15-year-old\'s-torturous', '1604122403.jpeg', 'The minor girl was first picked up from Hadapsar on october 26, Pune Police said while stating that two of the four accused have been arrested.The minor girl was first picked up from Hadapsar on october 26, Pune Police said while stating that two of the four accused have been arrested.The minor girl was first picked up from Hadapsar on october 26, Pune Police said while stating that two of the four accused have been arrested.The minor girl was first picked up from Hadapsar on october 26, Pune Police said while stating that two of the four accused have been arrested.', '<p>Pune Police have launched an investigation into the alleged gangrape of a 15-year-old girl. Two of the four accused, including a rickshaw driver, have been arrested and a search operation is underway to nab the remaining two.</p>\r\n\r\n<p>Pune Police have launched an investigation into the alleged gangrape of a 15-year-old girl. Two of the four accused, including a rickshaw driver, have been arrested and a search operation is underway to nab the remaining two.</p>\r\n\r\n<p>Pune Police have launched an investigation into the alleged gangrape of a 15-year-old girl. Two of the four accused, including a rickshaw driver, have been arrested and a search operation is underway to nab the remaining two.</p>\r\n\r\n<p>Pune Police have launched an investigation into the alleged gangrape of a 15-year-old girl. Two of the four accused, including a rickshaw driver, have been arrested and a search operation is underway to nab the remaining two.</p>\r\n', 1, '2020-11-01 13:21:30', 1, 1, '2020-10-31', '', 0, 2, '2020-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(5) NOT NULL,
  `sub` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(5) NOT NULL,
  `role` int(1) NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `c_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `sub`, `description`, `user_id`, `role`, `is_seen`, `c_date`) VALUES
(1, 'testing', 'only for testing the notification \r\n', 1, 0, 1, '2020-03-16 07:00:00'),
(2, 'testing 2', 'hello..how are uh..ur monetization is enabled now \r\nkeep earning..:)', 1, 1, 1, '2020-10-27 07:53:32'),
(3, 'testing ad creator', 'testing ad creator', 1, 1, 1, '2020-11-05 03:01:58'),
(4, 'testing ad creator', 'testing ad creator', 1, 0, 1, '2020-11-05 03:03:00'),
(5, 'refill account', 'refill your wallet to refill ad', 2, 1, 0, '2020-11-05 17:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_picture`
--

CREATE TABLE `tbl_picture` (
  `id` int(5) NOT NULL,
  `gallery_id` int(5) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `c_date` date DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_picture`
--

INSERT INTO `tbl_picture` (`id`, `gallery_id`, `caption`, `image`, `c_date`, `date`, `status`) VALUES
(44, 2, 'Knowledge About Internet', '1581941911.jpg', '2020-01-21', '2020-02-17 12:18:30', 1),
(45, 2, 'super update1', '1581523958.png', '2020-01-21', '2020-02-15 10:52:36', 1),
(46, 11, 'Funny Images', '1581941937.jpg', '2020-02-11', '2020-04-06 06:47:24', 1),
(47, 9, 'asdds', '1581941954.jpg', '2020-02-04', '2020-02-17 12:19:14', 1),
(48, 8, 'Best Pic 2019', '1581941984.jpg', '2020-02-04', '2020-02-17 12:19:44', 1),
(49, 4, 'fgdgf', '1581763991.png', '2020-02-03', '2020-02-15 11:58:53', 0),
(50, 10, 'Viewer testing', '1581763674.png', '2020-02-04', '2020-04-06 06:47:18', 1);

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
  `u_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_qna`
--

INSERT INTO `tbl_qna` (`id`, `module_user_id`, `question`, `answer`, `c_date`, `u_date`, `role`, `status`) VALUES
(1, 2, 'How Can I earn money ?', 'By Writing News you can earn money from our platform', '2019-11-13', '2019-11-17 10:53:41', 0, 1),
(2, 2, 'How can i create Ads?', 'you should join our we media program', '2019-11-26', '2020-01-23 17:46:30', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recent`
--

CREATE TABLE `tbl_recent` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `news_id` int(11) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_recent`
--

INSERT INTO `tbl_recent` (`id`, `user`, `news_id`, `c_date`) VALUES
(3, 'shabbu', 38, '2020-09-23 16:30:09'),
(19, 'shabbu', 21, '2020-09-28 15:23:43'),
(32, 'shabbu', 23, '2020-11-01 13:13:53'),
(46, 'shabbu', 0, '2020-11-01 13:20:51'),
(50, 'shabbu', 45, '2020-11-01 13:21:46'),
(51, 'shabbu', 17, '2020-11-01 13:37:39'),
(53, 'shabbu', 39, '2020-11-01 13:37:45'),
(54, 'shabbu', 27, '2020-11-01 13:37:50'),
(55, 'shabbu', 29, '2020-11-01 13:37:52'),
(56, 'shabbu', 30, '2020-11-01 13:37:57'),
(57, 'shabbu', 35, '2020-11-01 13:37:58'),
(58, 'shabbu', 37, '2020-11-01 13:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`id`, `user_id`, `news_id`, `c_date`) VALUES
(1, 1, 39, '2020-04-13 06:33:45'),
(5, 0, 23, '2020-04-13 07:08:22'),
(6, 3, 27, '2020-04-13 07:17:14'),
(7, 1, 38, '2020-08-23 08:25:38'),
(8, 1, 27, '2020-08-24 12:06:49'),
(9, 1, 30, '2020-08-24 12:52:43'),
(10, 1, 23, '2020-08-24 12:52:55'),
(11, 1, 17, '2020-09-17 14:33:20'),
(12, 1, 21, '2020-09-17 15:51:52'),
(13, 0, 0, '2020-09-18 03:21:05'),
(14, 1, 29, '2020-09-23 16:18:08'),
(15, 1, 37, '2020-09-23 16:18:23'),
(16, 0, 21, '2020-09-28 13:39:58'),
(17, 0, 17, '2020-09-28 13:40:05'),
(18, 0, 29, '2020-10-06 07:19:02'),
(19, 1, 0, '2020-11-01 13:06:43'),
(20, 1, 45, '2020-11-01 13:21:30'),
(21, 1, 35, '2020-11-01 13:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(5) NOT NULL,
  `content_creator_id` int(5) NOT NULL,
  `withdraw_amt` decimal(12,2) NOT NULL,
  `c_date` varchar(15) NOT NULL,
  `balance` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `content_creator_id`, `withdraw_amt`, `c_date`, `balance`) VALUES
(2, 1, '112.00', '03/16/2020 ', ''),
(3, 1, '100.00', '03/16/2020 ', ''),
(4, 1, '26.00', '03/16/2020 ', '650.00'),
(5, 1, '10.00', '03/16/2020 ', '649.60'),
(6, 1, '10.00', '09/17/2020 ', '639.60');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_viewer`
--

CREATE TABLE `tbl_viewer` (
  `id` int(5) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `c_date` date NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_viewer`
--

INSERT INTO `tbl_viewer` (`id`, `user_name`, `email`, `password`, `status`, `c_date`, `u_date`) VALUES
(1, 'shabbu', 'shabnam@gmail.com', '6083400d6743368844a5a3f3e86aa5b7', 1, '2020-04-04', '2020-04-04 16:58:49'),
(3, 'shabnam', 'shabnamsiddique20@gmail.com', '6083400d6743368844a5a3f3e86aa5b7', 1, '2020-04-04', '2020-04-06 12:59:34'),
(4, 'shazia', 'shazia@gmail.com', '6083400d6743368844a5a3f3e86aa5b7', 1, '2020-04-04', '2020-04-06 13:06:01'),
(6, 'Reshma Siddique', 'reshmasiddique93@gmail.com', '', 1, '2020-10-03', '2020-10-03 07:47:21'),
(7, 'Jeet Naik', 'jeetnaik12@gmail.com', '', 1, '2020-10-03', '2020-10-03 07:48:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adunit`
--
ALTER TABLE `tbl_adunit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_adunit_report`
--
ALTER TABLE `tbl_adunit_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ad_creator`
--
ALTER TABLE `tbl_ad_creator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
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
-- Indexes for table `tbl_follower`
--
ALTER TABLE `tbl_follower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_like`
--
ALTER TABLE `tbl_like`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_recent`
--
ALTER TABLE `tbl_recent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_viewer`
--
ALTER TABLE `tbl_viewer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adunit`
--
ALTER TABLE `tbl_adunit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_adunit_report`
--
ALTER TABLE `tbl_adunit_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_ad_creator`
--
ALTER TABLE `tbl_ad_creator`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_content_creator`
--
ALTER TABLE `tbl_content_creator`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_follower`
--
ALTER TABLE `tbl_follower`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_module_user`
--
ALTER TABLE `tbl_module_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_picture`
--
ALTER TABLE `tbl_picture`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_qna`
--
ALTER TABLE `tbl_qna`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_recent`
--
ALTER TABLE `tbl_recent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_viewer`
--
ALTER TABLE `tbl_viewer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
