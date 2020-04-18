-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 07:46 AM
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
-- Table structure for table `tbl_adunit`
--

CREATE TABLE `tbl_adunit` (
  `ad_id` int(10) NOT NULL,
  `unit_name` varchar(30) NOT NULL,
  `category_id` int(2) NOT NULL,
  `ad_creator_id` int(10) NOT NULL,
  `url` varchar(255) NOT NULL,
  `seo_title` varchar(100) NOT NULL,
  `seo_desc` varchar(255) NOT NULL,
  `file_attach` varchar(50) NOT NULL,
  `summary` text NOT NULL,
  `details` text NOT NULL,
  `view` int(10) NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  `approve` tinyint(1) NOT NULL,
  `publish_date` date NOT NULL,
  `rejection_msg` varchar(255) NOT NULL,
  `offline` tinyint(1) NOT NULL,
  `rejected` tinyint(1) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cpc` decimal(10,0) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adunit`
--

INSERT INTO `tbl_adunit` (`ad_id`, `unit_name`, `category_id`, `ad_creator_id`, `url`, `seo_title`, `seo_desc`, `file_attach`, `summary`, `details`, `view`, `u_date`, `status`, `approve`, `publish_date`, `rejection_msg`, `offline`, `rejected`, `post_date`, `cpc`, `amount`) VALUES
(1, 'test', 3, 1, 'test-unit', 'test,unit', 'test_unit', 'dor.jpg', 'hey this is first ad ', 'hey this is first ad ', 10, '2020-04-13 07:17:14', 1, 1, '2020-04-07', '', 0, 0, '2020-04-07 12:01:15', '2', '86.00');

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
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adunit_report`
--

INSERT INTO `tbl_adunit_report` (`id`, `ad_id`, `news_id`, `user_id`, `company_earning`, `creator_earning`, `c_date`) VALUES
(11, 1, 39, 1, '1.20', '0.80', '2020-04-07 14:54:33'),
(12, 1, 23, 1, '1.20', '0.80', '2020-04-12 13:16:48'),
(13, 1, 23, 0, '1.20', '0.80', '2020-04-13 07:04:25'),
(14, 1, 39, 0, '1.20', '0.80', '2020-04-13 07:04:34'),
(15, 1, 27, 3, '1.20', '0.80', '2020-04-13 07:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ad_creator`
--

CREATE TABLE `tbl_ad_creator` (
  `ad_creator_id` int(10) NOT NULL,
  `profile_image` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `about` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `c_date` date NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `cvv_number` int(3) NOT NULL,
  `card_number` int(19) NOT NULL,
  `wallet` decimal(10,0) NOT NULL,
  `lifetime_amount` decimal(10,0) NOT NULL,
  `spend_amount` decimal(10,0) NOT NULL,
  `approval` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ad_creator`
--

INSERT INTO `tbl_ad_creator` (`ad_creator_id`, `profile_image`, `username`, `company_name`, `about`, `phone`, `email`, `password`, `c_date`, `u_date`, `ip`, `status`, `cvv_number`, `card_number`, `wallet`, `lifetime_amount`, `spend_amount`, `approval`) VALUES
(1, 'dor..jpg', 'priyanka', 'DHJ', 'nothing to say', '7418529630', 'shabnam@gmail.com', '123', '2020-03-25', '2020-04-07 11:59:18', '', 1, 741, 741852963, '1000', '500', '200', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(5) NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_desc` varchar(255) DEFAULT NULL,
  `c_date` date NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `title`, `url`, `seo_title`, `seo_desc`, `c_date`, `date`, `status`) VALUES
(1, 'Education1', 'education1', 'education1', 'Education News', '2019-11-06', '2020-02-12 17:08:08', 1),
(3, 'BUSINESS', 'business', 'business', 'Business News', '2019-11-14', '2020-01-10 15:26:08', 1),
(4, 'CRIME', 'crime', 'crime', 'Crime News', '2019-11-19', '2020-02-13 11:47:56', 1),
(5, 'JOB', 'job', 'job', 'Job News', '2019-11-20', '2020-02-13 11:47:59', 1),
(6, 'Science News', 'science-news', 'science, news', 'Science', '2019-11-20', '2020-01-10 15:27:41', 1),
(11, 'Super Categories', 'super-categories', 'super, categories', 'hii', '2020-02-04', '2020-02-12 17:08:05', NULL),
(12, 'Life Style News', 'life-style-news', 'life, style, news', 'News about lifestyle', '2020-02-04', '2020-02-17 12:21:35', 1);

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
  `spammsg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `news_id`, `user_name`, `comment`, `postdate`, `status`, `spammsg`) VALUES
(1, 17, 'shabnam', 'good news', '2019-11-09 18:18:31', 2, ''),
(2, 21, 'shabnam', 'fake news', '2019-11-09 17:58:49', 2, ''),
(3, 23, 'shazia', 'good', '2019-11-09 18:09:26', 1, ''),
(4, 27, 'neha', 'work hard', '2019-11-09 18:41:39', 1, ''),
(5, 29, 'kavya', 'old news', '2019-11-11 03:35:19', 2, ''),
(6, 21, 'priyanka', 'good news', '2019-11-11 03:45:48', 0, ''),
(7, 38, 'shazia', 'hey ...this is first comment from user side', '2020-04-05 07:23:15', 1, ''),
(8, 38, 'shazia', 'hwrgwrtwhtrhwrthwrtwhrtwrt', '2020-04-05 07:23:19', 1, ''),
(9, 38, 'shabbu', 'ajax comment', '2020-04-12 13:20:35', 1, ''),
(10, 38, 'shabbu', 'ajax comment 2', '2020-04-12 13:20:28', 1, ''),
(11, 38, 'shabbu', 'hey..this is first comment of ajax', '2020-04-12 13:20:20', 1, ''),
(12, 0, 'shabbu', 'hey comment', '2020-04-13 06:39:53', 0, ''),
(13, 39, 'shabbu', 'hey sexy', '2020-04-13 06:40:41', 1, '');

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
  `AccountApproval` tinyint(1) NOT NULL DEFAULT '0',
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `channel_logo` varchar(20) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Monetization` tinyint(4) NOT NULL DEFAULT '0',
  `join_date` varchar(10) NOT NULL,
  `privacy` tinyint(1) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `account_holder_name` varchar(30) NOT NULL,
  `bank_account_number` varchar(20) NOT NULL,
  `ifsc_code` varchar(11) NOT NULL,
  `earnings` decimal(12,2) NOT NULL,
  `life_time_withdraw_amt` decimal(12,2) NOT NULL,
  `index_point` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_content_creator`
--

INSERT INTO `tbl_content_creator` (`id`, `username`, `email`, `mobile`, `password`, `ChannelName`, `ChannelDescription`, `AccountApproval`, `Status`, `channel_logo`, `DateTime`, `Monetization`, `join_date`, `privacy`, `bank_name`, `account_holder_name`, `bank_account_number`, `ifsc_code`, `earnings`, `life_time_withdraw_amt`, `index_point`) VALUES
(1, 'shabnam20', 'shabnam@gmail.com', 8238347295, '6083400d6743368844a5a3f3e86aa5b7', 'tech', 'good channel for technicians', 1, 1, '1573281867.jpg', '2019-11-01 09:45:42', 1, '', 0, '', '', '', '', '655.60', '1350.00', 10),
(2, 'Avinash1232', 'shab@gmail.com', 7412589630, '6083400d6743368844a5a3f3e86aa5b7', '', '', 1, 1, 'default.jpg', '2019-11-01 09:45:42', 0, '', 0, '', '', '', '', '0.00', '0.00', 0),
(3, 'Avinash123', 'shab@gmail.com', 7415896304, '6083400d6743368844a5a3f3e86aa5b7', '', '', 1, 1, '', '2019-11-01 09:45:42', 0, '', 0, '', '', '', '', '0.00', '0.00', 0),
(4, 'Shazia', 'shazia@gmail.com', 7418529630, '6083400d6743368844a5a3f3e86aa5b7', 'dhb', 'fdvgbhnj', 1, 1, 'default.jpg', '2019-11-01 12:49:46', 0, '', 0, '', '', '', '', '0.00', '0.00', 0),
(5, 'jaimin', 'jm87@gmail.com', 9898789878, 'e71b2e99a78da9c585fa1698501e527e', '', '', 0, 1, '1580186639.jpg', '2020-01-28 04:43:58', 0, '01/28/2020', 0, '', '', '', '', '0.00', '0.00', 0),
(6, 'Kishan1', 'kishan@gmail.com', 9999999999, 'e69dc2c09e8da6259422d987ccbe95b5', 'AviWeb', 'Tech Channel', 0, 1, 'default.jpg', '2020-02-25 04:55:01', 0, '02/25/2020', 0, '', '', '', '', '0.00', '0.00', 0);

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
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `user_id`, `subject`, `message`, `role`, `c_date`, `file`) VALUES
(1, 1, 'account audition problem', 'please approve my account', 0, '2019-11-12 08:00:00', ''),
(2, 1, 'News Audition', 'kab khatam hoga ye mc project..:(', 0, '0000-00-00 00:00:00', ''),
(3, 1, '', 'first query of user side', 2, '0000-00-00 00:00:00', ''),
(4, 4, '', 'hey..this is user', 2, '0000-00-00 00:00:00', ''),
(5, 4, '', 'shabbu', 2, '2020-04-06 13:30:42', ''),
(6, 4, '', 'hello......................', 2, '2020-04-06 13:31:11', ''),
(7, 4, '', 'fghjkl', 2, '2020-04-06 13:31:29', ''),
(8, 4, '', 'fghjk', 2, '2020-04-06 13:31:45', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follower`
--

CREATE TABLE `tbl_follower` (
  `id` int(5) NOT NULL,
  `content_creator_id` int(5) NOT NULL,
  `viewer_id` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_follower`
--

INSERT INTO `tbl_follower` (`id`, `content_creator_id`, `viewer_id`, `date`) VALUES
(5, 1, 1, '2020-04-06 13:19:10'),
(7, 1, 3, '2020-04-13 07:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(5) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `seo_title` varchar(200) DEFAULT NULL,
  `seo_desc` varchar(200) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `c_date` date NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `title`, `url`, `seo_title`, `seo_desc`, `location`, `c_date`, `date`, `status`) VALUES
(1, 'First Gallery1', 'First Gallery1', 'first, gallery1', 'To First gallery trail', 'India', '2019-11-13', '2020-02-12 13:43:52', 0),
(4, 'Health Gallery', 'Health Gallery', 'health, gallery', 'Tips of Health', 'no', '2019-11-26', '2020-02-17 12:05:45', 0),
(7, 'Lifestyle', 'Lifestyle', 'lifestyle', 'Tips about lifestyle', 'no', '2019-11-25', '2020-02-17 12:03:39', 0),
(8, 'Quick Fresh Technology News', 'Quick Fresh Technology News', 'quick, fresh, technology, news', 'News About Technology', 'no', '2019-11-27', '2020-02-17 12:04:41', 0),
(9, 'Beauty Tips', 'Beauty Tips', 'beauty, tips', 'Content of Beauty tips', 'no', '2019-11-18', '2020-02-17 12:05:15', 1),
(10, 'final', 'final', 'final', 'final', 'final', '2019-11-13', '2019-11-02 11:21:05', 1),
(11, 'log test', 'log-test', 'log, test', 'log test', 'log test', '2019-11-27', '2019-11-17 09:18:45', 1),
(12, 'Fenil patel', 'fenil-patel', 'fenil, patel', 'hi', 'no', '2020-01-20', '2020-02-12 13:22:08', 0),
(13, 'Super Gallery', 'Super Gallery', 'super, gallery', 'Super gallery Trail', 'Super Admin', '2020-02-17', '2020-02-12 13:27:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE `tbl_like` (
  `id` int(5) NOT NULL,
  `viewer_id` int(5) NOT NULL,
  `news_id` int(5) NOT NULL,
  `is_like` tinyint(1) NOT NULL DEFAULT '0',
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_like`
--

INSERT INTO `tbl_like` (`id`, `viewer_id`, `news_id`, `is_like`, `c_date`) VALUES
(4, 1, 21, 1, '2020-04-06 06:23:31'),
(5, 3, 23, 1, '2020-04-06 13:01:03'),
(7, 1, 39, 1, '2020-04-06 13:44:35'),
(9, 3, 27, 1, '2020-04-13 07:17:16');

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `role` tinyint(1) NOT NULL DEFAULT '1'
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
(8, 'vivek', '1582880829.jpg', 'vivek', 'sir', 'vivek@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', '2020-02-28 09:07:08', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(10) NOT NULL,
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
  `PublishDate` varchar(15) NOT NULL,
  `RejectionMsg` varchar(255) NOT NULL,
  `Offline` tinyint(1) NOT NULL DEFAULT '0',
  `Rejected` int(1) NOT NULL DEFAULT '1',
  `PostDate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `CategoryID`, `CreatorID`, `TopNews`, `HeadLine`, `Url`, `SeoTitle`, `SeoDescription`, `FileAttach`, `Summary`, `Details`, `Views`, `ModifyDate`, `Status`, `Approved`, `PublishDate`, `RejectionMsg`, `Offline`, `Rejected`, `PostDate`) VALUES
(17, 3, 1, 0, 'My New News', 'my-new-news', 'my, new, news', 'hello creaton of new news', '1572800906.jpg', 'first News', '<p>hello hello<strong> hello&nbsp; hsbfhd<s> shabnam</s></strong></p>\r\n', 0, '2020-02-13 12:34:21', 1, 1, '0000-00-00', '', 0, 1, '0000-00-00'),
(21, 3, 1, 0, 'shabnam siddiqui', 'shabnam-siddiqui', 'shabnam, siddiqui', 'shabbu ', '1572801289.jpg', 'shabbu', '<p><em>shabnam mom pic uploaded...:)</em></p>\r\n', 0, '2020-02-13 12:24:05', 1, 1, '0000-00-00', '', 0, 1, '0000-00-00'),
(23, 3, 1, 0, 'avinash updated', 'avinash-updated', 'avinash, updated', '', '1573221709.JPG', 'avinash', '<p><strong>avinash updated</strong></p>\r\n\r\n<p><strong>h</strong>ello from editor&nbsp;</p>\r\n\r\n<ol>\r\n	<li>hello edited news</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>helloe edited news&nbsp;</li>\r\n</ul>\r\n', 0, '2020-04-05 14:46:00', 1, 1, '2020-03-29', 'unfollow the rules of platform', 0, 2, '0000-00-00'),
(25, 4, 1, 0, 'virat kohli', 'virat-kohli', 'virat, kohli', '', '1572971720.jpg', 'dsfghjk fxcgvhbjnk ', '<p>hello from shabnam</p>\r\n', 0, '2020-04-13 07:22:51', 0, 0, '0000-00-00', 'unfollow the rules of platform', 1, 3, '0000-00-00'),
(27, 4, 1, 0, 'category selected', 'category-selected', 'category, selected', '', '1572972155.jpg', 'hello from category 2', '<p>hello from category 2 this is basic details of news</p>\r\n', 0, '2020-02-18 05:04:33', 1, 1, '0000-00-00', '', 0, 0, '0000-00-00'),
(29, 4, 1, 0, 'category 1 selected', 'category-1-selected', 'category, 1, selected', '', '1572973197.png', 'category1', '<p>selection of category 1 that is ssshjfh</p>\r\n', 0, '2020-03-15 15:31:29', 1, 1, '0000-00-00', '', 0, 1, '2020-02-25'),
(30, 5, 1, 0, 'cfgvhjk', 'fghjkl;', 'drtfygyu', '', '1573220143.JPG', 'shabnam siddiqui', '<ol>\r\n	<li>shabnam</li>\r\n</ol>\r\n\r\n<blockquote>\r\n<ul>\r\n	<li>hi</li>\r\n	<li>dhejhf</li>\r\n	<li>fdjbkfm,</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n</blockquote>\r\n', 0, '2020-04-13 07:24:41', 1, 1, '0000-00-00', '', 0, 1, '2020-02-25'),
(35, 5, 1, 0, 'shabnam siddiqui', 'shabnam-siddiqui', 'shabnam, siddiqui', '', '1573220432.JPG', 'shabnam', '<p>shabnam editor</p>\r\n', 0, '2020-03-15 15:31:35', 1, 1, '0000-00-00', '', 0, 1, '2020-02-25'),
(37, 5, 1, 0, 'maha cyclone', 'maha-cyclone', 'maha, cyclone', '', '1573220727.JPG', 'maha cyclone', '<p>maha cyclone in south gujrat</p>\r\n', 10, '2020-03-16 08:15:42', 1, 1, '0000-00-00', '', 0, 1, '2020-02-25'),
(38, 4, 1, 0, 'avinash', 'avinash', 'avinash', '', '1573985652.png', 'avinash', '<p>avinash</p>\r\n', 200, '2020-04-05 14:33:14', 1, 1, '2020-03-25', '', 0, 1, '2020-02-25'),
(39, 3, 1, 0, 'temp news', 'temp-news', 'temp,news', 'temp,news', '1573985652.png', 'dfghjkl;ghjkl;ghjkl;', 'drftgyuhijokrdftgyhujidfghjkl  drftgyuhijokrdftgyhujidfghjkl    drftgyuhijokrdftgyhujidfghjkl    drftgyuhijokrdftgyhujidfghjkl  drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl  drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl', 90, '2020-04-07 12:06:51', 1, 1, '2020-03-29', '', 0, 0, '2020-03-19'),
(40, 3, 1, 0, 'temp news', 'temp-news', 'temp,news', 'temp,news', '1573985652.png', 'dfghjkl;ghjkl;ghjkl;', 'drftgyuhijokrdftgyhujidfghjkl  drftgyuhijokrdftgyhujidfghjkl    drftgyuhijokrdftgyhujidfghjkl    drftgyuhijokrdftgyhujidfghjkl  drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl  drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl drftgyuhijokrdftgyhujidfghjkldrftgyuhijokrdftgyhujidfghjkl', 90, '2020-04-07 12:06:47', 1, 1, '2020-03-29', '', 0, 0, '2020-03-19');

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
  `is_seen` tinyint(1) NOT NULL DEFAULT '0',
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `sub`, `description`, `user_id`, `role`, `is_seen`, `c_date`) VALUES
(1, 'testing', 'only for testing the notification \r\n', 1, 0, 1, '2020-03-16 07:00:00'),
(2, 'testing 2', 'hello..how are uh..ur monetization is enabled now \r\nkeep earning..:)', 1, 0, 1, '2020-03-10 07:00:00');

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
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
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
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
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_recent`
--

INSERT INTO `tbl_recent` (`id`, `user`, `news_id`, `c_date`) VALUES
(1, 'shabnam', 38, '2020-04-04 14:48:16'),
(2, 'shabnam', 37, '2020-04-04 14:51:27'),
(3, 'shabnam', 38, '2020-04-04 14:56:02'),
(4, 'shabnam', 38, '2020-04-04 14:58:33'),
(5, 'shabnam', 37, '2020-04-04 15:01:23'),
(6, 'shabnam', 23, '2020-04-04 15:15:17'),
(7, 'shazia', 27, '2020-04-04 17:28:42'),
(8, 'shazia', 38, '2020-04-04 17:38:36'),
(9, 'shazia', 38, '2020-04-04 17:39:49'),
(10, 'shazia', 38, '2020-04-04 17:40:09'),
(11, 'shazia', 38, '2020-04-04 17:41:11'),
(12, 'shazia', 38, '2020-04-04 17:41:36'),
(13, 'shazia', 38, '2020-04-04 17:41:42'),
(14, 'shazia', 38, '2020-04-04 17:42:06'),
(15, 'shazia', 38, '2020-04-04 17:42:45'),
(16, 'shazia', 38, '2020-04-04 17:42:59'),
(17, 'shazia', 38, '2020-04-04 17:43:33'),
(18, 'shazia', 38, '2020-04-04 17:43:49'),
(19, 'shazia', 38, '2020-04-04 17:43:59'),
(20, 'shazia', 38, '2020-04-04 17:44:17'),
(21, 'shazia', 38, '2020-04-04 17:44:24'),
(22, 'shazia', 38, '2020-04-04 17:45:00'),
(23, 'shazia', 38, '2020-04-04 17:45:11'),
(24, 'shazia', 38, '2020-04-04 17:46:17'),
(25, 'shazia', 38, '2020-04-04 17:46:19'),
(26, 'shazia', 38, '2020-04-04 17:51:30'),
(27, 'shazia', 38, '2020-04-04 17:51:50'),
(28, 'shazia', 38, '2020-04-04 17:51:58'),
(29, 'shazia', 38, '2020-04-04 17:52:02'),
(30, 'shazia', 38, '2020-04-04 17:53:01'),
(31, 'shazia', 38, '2020-04-04 17:53:16'),
(32, 'shazia', 38, '2020-04-04 17:53:16'),
(33, 'shazia', 38, '2020-04-04 17:53:34'),
(34, 'shazia', 38, '2020-04-04 17:54:11'),
(35, 'shazia', 38, '2020-04-04 18:02:40'),
(36, 'shazia', 38, '2020-04-04 18:03:46'),
(37, 'shazia', 38, '2020-04-04 18:03:47'),
(38, 'shazia', 38, '2020-04-04 18:03:47'),
(39, 'shazia', 38, '2020-04-04 18:03:47'),
(40, 'shazia', 38, '2020-04-04 18:03:55'),
(41, 'shazia', 38, '2020-04-04 18:06:56'),
(42, 'shazia', 38, '2020-04-04 18:07:45'),
(43, 'shazia', 38, '2020-04-04 18:07:48'),
(44, 'shazia', 38, '2020-04-04 18:08:05'),
(45, 'shazia', 38, '2020-04-04 18:09:54'),
(46, 'shazia', 38, '2020-04-04 18:16:08'),
(47, 'shazia', 29, '2020-04-04 18:16:25'),
(48, 'shazia', 29, '2020-04-04 18:17:06'),
(49, 'shazia', 29, '2020-04-04 18:18:11'),
(50, 'shabbu', 23, '2020-04-05 05:56:16'),
(51, 'shabbu', 23, '2020-04-05 05:59:45'),
(52, 'shabbu', 23, '2020-04-05 05:59:47'),
(53, 'shabbu', 23, '2020-04-05 05:59:52'),
(54, 'shabbu', 23, '2020-04-05 05:59:56'),
(55, 'shabbu', 23, '2020-04-05 06:00:33'),
(56, 'shabbu', 23, '2020-04-05 06:00:34'),
(57, 'shabbu', 23, '2020-04-05 06:00:43'),
(58, 'shabbu', 23, '2020-04-05 06:00:44'),
(59, 'shabbu', 23, '2020-04-05 06:01:07'),
(60, 'shabbu', 23, '2020-04-05 06:04:49'),
(61, 'shabbu', 23, '2020-04-05 06:04:50'),
(62, 'shabbu', 23, '2020-04-05 06:04:54'),
(63, 'shabbu', 23, '2020-04-05 06:05:01'),
(64, 'shabbu', 23, '2020-04-05 06:05:23'),
(65, 'shabbu', 23, '2020-04-05 06:06:49'),
(66, 'shabbu', 23, '2020-04-05 06:06:52'),
(67, 'shabbu', 23, '2020-04-05 06:07:43'),
(68, 'shabbu', 23, '2020-04-05 06:07:48'),
(69, 'shabbu', 23, '2020-04-05 06:08:13'),
(70, 'shabbu', 23, '2020-04-05 06:08:14'),
(71, 'shabbu', 23, '2020-04-05 06:08:19'),
(72, 'shabbu', 23, '2020-04-05 06:08:26'),
(73, 'shabbu', 23, '2020-04-05 06:09:19'),
(74, 'shabbu', 23, '2020-04-05 06:09:25'),
(75, 'shabbu', 23, '2020-04-05 06:10:28'),
(76, 'shabbu', 23, '2020-04-05 06:10:30'),
(77, 'shabbu', 23, '2020-04-05 06:10:30'),
(78, 'shabbu', 23, '2020-04-05 06:10:31'),
(79, 'shabbu', 23, '2020-04-05 06:10:34'),
(80, 'shabbu', 23, '2020-04-05 06:12:07'),
(81, 'shabbu', 23, '2020-04-05 06:12:12'),
(82, 'shabbu', 27, '2020-04-05 06:12:22'),
(83, 'shabbu', 27, '2020-04-05 06:12:34'),
(84, 'shabbu', 27, '2020-04-05 06:27:28'),
(85, 'shabbu', 27, '2020-04-05 06:27:29'),
(86, 'shabbu', 27, '2020-04-05 06:27:51'),
(87, 'shabbu', 27, '2020-04-05 06:27:59'),
(88, 'shabbu', 27, '2020-04-05 06:29:39'),
(89, 'shabbu', 27, '2020-04-05 06:29:40'),
(90, 'shabbu', 27, '2020-04-05 06:29:47'),
(91, 'shabbu', 27, '2020-04-05 06:31:18'),
(92, 'shabbu', 27, '2020-04-05 06:31:19'),
(93, 'shabbu', 27, '2020-04-05 06:31:21'),
(94, 'shabbu', 27, '2020-04-05 06:33:31'),
(95, 'shabbu', 27, '2020-04-05 06:33:33'),
(96, 'shabbu', 27, '2020-04-05 06:33:36'),
(97, 'shabbu', 27, '2020-04-05 06:34:20'),
(98, 'shabbu', 27, '2020-04-05 06:34:22'),
(99, 'shabbu', 27, '2020-04-05 06:35:08'),
(100, 'shabbu', 27, '2020-04-05 06:35:08'),
(101, 'shabbu', 27, '2020-04-05 06:35:57'),
(102, 'shabbu', 27, '2020-04-05 06:35:59'),
(103, 'shabbu', 27, '2020-04-05 06:36:06'),
(104, 'shabbu', 27, '2020-04-05 06:37:01'),
(105, 'shabbu', 38, '2020-04-05 06:37:06'),
(106, 'shabbu', 38, '2020-04-05 06:37:16'),
(107, 'shabbu', 38, '2020-04-05 06:40:33'),
(108, 'shabbu', 38, '2020-04-05 06:40:35'),
(109, 'shabbu', 38, '2020-04-05 06:40:36'),
(110, 'shabbu', 38, '2020-04-05 06:40:37'),
(111, 'shabbu', 38, '2020-04-05 06:41:03'),
(112, 'shabbu', 38, '2020-04-05 06:41:25'),
(113, 'shabbu', 38, '2020-04-05 06:57:59'),
(114, 'shabbu', 38, '2020-04-05 06:59:07'),
(115, 'shabbu', 38, '2020-04-05 06:59:09'),
(116, 'shabbu', 38, '2020-04-05 06:59:14'),
(117, 'shabbu', 38, '2020-04-05 07:01:20'),
(118, 'shabbu', 38, '2020-04-05 07:01:22'),
(119, 'shabbu', 38, '2020-04-05 07:02:00'),
(120, 'shabbu', 38, '2020-04-05 07:02:10'),
(121, 'shabbu', 38, '2020-04-05 07:02:56'),
(122, 'shabbu', 38, '2020-04-05 07:03:12'),
(123, 'shabbu', 38, '2020-04-05 07:05:05'),
(124, 'shabbu', 38, '2020-04-05 07:05:08'),
(125, 'shabbu', 38, '2020-04-05 07:05:19'),
(126, 'shabbu', 38, '2020-04-05 07:06:54'),
(127, 'shabbu', 38, '2020-04-05 07:06:56'),
(128, 'shabbu', 38, '2020-04-05 07:06:59'),
(129, 'shabbu', 38, '2020-04-05 07:07:07'),
(130, 'shabbu', 38, '2020-04-05 07:07:19'),
(131, 'shabbu', 38, '2020-04-05 07:07:31'),
(132, 'shabbu', 38, '2020-04-05 07:07:38'),
(133, 'shabbu', 38, '2020-04-05 07:07:52'),
(134, 'shabbu', 38, '2020-04-05 07:10:55'),
(135, 'shabbu', 38, '2020-04-05 07:10:57'),
(136, 'shabbu', 38, '2020-04-05 07:10:57'),
(137, 'shabbu', 38, '2020-04-05 07:10:57'),
(138, 'shabbu', 38, '2020-04-05 07:10:57'),
(139, 'shabbu', 38, '2020-04-05 07:10:57'),
(140, 'shabbu', 38, '2020-04-05 07:10:57'),
(141, 'shabbu', 38, '2020-04-05 07:10:57'),
(142, 'shabbu', 38, '2020-04-05 07:10:59'),
(143, 'shabbu', 38, '2020-04-05 07:11:19'),
(144, 'shabbu', 38, '2020-04-05 07:11:21'),
(145, 'shabbu', 38, '2020-04-05 07:11:21'),
(146, 'shabbu', 38, '2020-04-05 07:11:24'),
(147, 'shabbu', 38, '2020-04-05 07:11:51'),
(148, 'shabbu', 38, '2020-04-05 07:11:55'),
(149, 'shabbu', 38, '2020-04-05 07:13:29'),
(150, 'shabbu', 38, '2020-04-05 07:13:30'),
(151, 'shabbu', 38, '2020-04-05 07:13:33'),
(152, 'shabbu', 38, '2020-04-05 07:14:41'),
(153, 'shabbu', 38, '2020-04-05 07:17:14'),
(154, 'shabbu', 38, '2020-04-05 07:17:56'),
(155, 'shabbu', 38, '2020-04-05 07:18:07'),
(156, 'shabbu', 38, '2020-04-05 07:20:28'),
(157, 'shabbu', 38, '2020-04-05 07:21:49'),
(158, 'shabbu', 38, '2020-04-05 07:22:45'),
(159, 'shabbu', 38, '2020-04-05 07:22:57'),
(160, 'shabbu', 38, '2020-04-05 07:23:28'),
(161, 'shabbu', 38, '2020-04-05 07:24:19'),
(162, 'shabbu', 38, '2020-04-05 07:24:27'),
(163, 'shabbu', 38, '2020-04-05 07:24:41'),
(164, 'shabbu', 38, '2020-04-05 07:25:45'),
(165, 'shabbu', 38, '2020-04-05 07:26:05'),
(166, 'shabbu', 38, '2020-04-05 07:26:21'),
(167, 'shabbu', 38, '2020-04-05 07:27:19'),
(168, 'shabbu', 38, '2020-04-05 07:27:19'),
(169, 'shabbu', 38, '2020-04-05 07:27:29'),
(170, 'shabbu', 38, '2020-04-05 07:27:41'),
(171, 'shabbu', 38, '2020-04-05 07:28:00'),
(172, 'shabbu', 38, '2020-04-05 10:08:53'),
(173, 'shabbu', 38, '2020-04-05 10:11:37'),
(174, 'shabbu', 38, '2020-04-05 10:11:49'),
(175, 'shabbu', 38, '2020-04-05 10:13:38'),
(176, 'shabbu', 38, '2020-04-05 10:15:13'),
(177, 'shabbu', 38, '2020-04-05 10:16:44'),
(178, 'shabbu', 38, '2020-04-05 10:16:45'),
(179, 'shabbu', 38, '2020-04-05 10:18:10'),
(180, 'shabbu', 38, '2020-04-05 10:19:14'),
(181, 'shabbu', 38, '2020-04-05 10:21:54'),
(182, 'shabbu', 38, '2020-04-05 10:22:15'),
(183, 'shabbu', 38, '2020-04-05 10:22:38'),
(184, 'shabbu', 38, '2020-04-05 10:22:42'),
(185, 'shabbu', 38, '2020-04-05 10:22:53'),
(186, 'shabbu', 38, '2020-04-05 10:25:00'),
(187, 'shabbu', 38, '2020-04-05 10:28:28'),
(188, 'shabbu', 38, '2020-04-05 10:28:29'),
(189, 'shabbu', 38, '2020-04-05 10:28:43'),
(190, 'shabbu', 38, '2020-04-05 10:28:45'),
(191, 'shabbu', 38, '2020-04-05 10:29:17'),
(192, 'shabbu', 27, '2020-04-05 10:30:00'),
(193, 'shabbu', 27, '2020-04-05 10:30:30'),
(194, 'shabbu', 23, '2020-04-05 10:30:47'),
(195, 'shabbu', 23, '2020-04-05 10:32:39'),
(196, 'shabbu', 23, '2020-04-05 10:33:31'),
(197, 'shabbu', 23, '2020-04-05 10:34:02'),
(198, 'shabbu', 23, '2020-04-05 10:34:28'),
(199, 'shabbu', 23, '2020-04-05 10:35:03'),
(200, 'shabbu', 23, '2020-04-05 10:35:45'),
(201, 'shabbu', 23, '2020-04-05 10:36:29'),
(202, 'shabbu', 23, '2020-04-05 10:37:29'),
(203, 'shabbu', 23, '2020-04-05 10:37:30'),
(204, 'shabbu', 23, '2020-04-05 10:37:45'),
(205, 'shabbu', 23, '2020-04-05 10:41:04'),
(206, 'shabbu', 23, '2020-04-05 10:41:11'),
(207, 'shabbu', 23, '2020-04-05 10:41:22'),
(208, 'shabbu', 23, '2020-04-05 10:41:40'),
(209, 'shabbu', 23, '2020-04-05 10:41:45'),
(210, 'shabbu', 23, '2020-04-05 10:41:50'),
(211, 'shabbu', 23, '2020-04-05 10:42:12'),
(212, 'shabbu', 23, '2020-04-05 10:42:12'),
(213, 'shabbu', 23, '2020-04-05 10:42:12'),
(214, 'shabbu', 23, '2020-04-05 10:42:12'),
(215, 'shabbu', 23, '2020-04-05 10:42:12'),
(216, 'shabbu', 37, '2020-04-05 10:42:25'),
(217, 'shabbu', 37, '2020-04-05 10:43:00'),
(218, 'shabbu', 37, '2020-04-05 10:43:14'),
(219, 'shabbu', 37, '2020-04-05 10:43:43'),
(220, 'shabbu', 37, '2020-04-05 10:45:09'),
(221, 'shabbu', 37, '2020-04-05 10:45:27'),
(222, 'shabbu', 37, '2020-04-05 10:45:45'),
(223, 'shabbu', 37, '2020-04-05 10:48:23'),
(224, 'shabbu', 38, '2020-04-05 10:49:49'),
(225, 'shabbu', 38, '2020-04-05 10:49:54'),
(226, 'shabbu', 38, '2020-04-05 10:53:15'),
(227, 'shabbu', 38, '2020-04-05 10:53:45'),
(228, 'shabbu', 38, '2020-04-05 10:54:36'),
(229, 'shabbu', 38, '2020-04-05 10:57:11'),
(230, 'shabbu', 38, '2020-04-05 10:57:20'),
(231, 'shabbu', 38, '2020-04-05 10:57:29'),
(232, 'shabbu', 38, '2020-04-05 10:57:30'),
(233, 'shabbu', 38, '2020-04-05 10:57:33'),
(234, 'shabbu', 38, '2020-04-05 10:57:36'),
(235, 'shabbu', 38, '2020-04-05 10:57:38'),
(236, 'shabbu', 38, '2020-04-05 10:57:39'),
(237, 'shabbu', 38, '2020-04-05 10:57:55'),
(238, 'shabbu', 38, '2020-04-05 10:57:56'),
(239, 'shabbu', 38, '2020-04-05 10:58:16'),
(240, 'shabbu', 38, '2020-04-05 10:58:17'),
(241, 'shabbu', 29, '2020-04-05 10:58:38'),
(242, 'shabbu', 29, '2020-04-05 10:58:54'),
(243, 'shabbu', 29, '2020-04-05 10:59:03'),
(244, 'shabbu', 29, '2020-04-05 10:59:04'),
(245, 'shabbu', 29, '2020-04-05 11:02:33'),
(246, 'shabbu', 29, '2020-04-05 11:04:37'),
(247, 'shabbu', 29, '2020-04-05 11:04:38'),
(248, 'shabbu', 29, '2020-04-05 11:06:18'),
(249, 'shabbu', 29, '2020-04-05 11:06:45'),
(250, 'shabbu', 29, '2020-04-05 11:07:00'),
(251, 'shabbu', 29, '2020-04-05 11:07:53'),
(252, 'shabbu', 29, '2020-04-05 11:08:22'),
(253, 'shabbu', 29, '2020-04-05 11:09:02'),
(254, 'shabbu', 0, '2020-04-05 11:09:48'),
(255, 'shabbu', 37, '2020-04-05 11:10:56'),
(256, 'shabbu', 37, '2020-04-05 11:11:27'),
(257, 'shabbu', 29, '2020-04-05 11:11:28'),
(258, 'shabbu', 37, '2020-04-05 11:16:49'),
(259, 'shabbu', 37, '2020-04-05 11:17:07'),
(260, 'shabbu', 37, '2020-04-05 11:21:59'),
(261, 'shabbu', 37, '2020-04-05 11:22:14'),
(262, 'shabbu', 37, '2020-04-05 11:22:16'),
(263, 'shabbu', 37, '2020-04-05 11:22:31'),
(264, 'shabbu', 37, '2020-04-05 11:22:42'),
(265, 'shabbu', 37, '2020-04-05 11:23:05'),
(266, 'shabbu', 37, '2020-04-05 11:23:09'),
(267, 'shabbu', 37, '2020-04-05 11:23:38'),
(268, 'shabbu', 37, '2020-04-05 11:23:40'),
(269, 'shabbu', 37, '2020-04-05 11:23:59'),
(270, 'shabbu', 37, '2020-04-05 11:24:02'),
(271, 'shabbu', 37, '2020-04-05 11:24:03'),
(272, 'shabbu', 37, '2020-04-05 11:24:03'),
(273, 'shabbu', 37, '2020-04-05 11:24:03'),
(274, 'shabbu', 37, '2020-04-05 11:24:05'),
(275, 'shabbu', 37, '2020-04-05 11:24:09'),
(276, 'shabbu', 37, '2020-04-05 11:24:27'),
(277, 'shabbu', 37, '2020-04-05 11:24:34'),
(278, 'shabbu', 37, '2020-04-05 11:24:51'),
(279, 'shabbu', 37, '2020-04-05 11:25:19'),
(280, 'shabbu', 37, '2020-04-05 11:25:28'),
(281, 'shabbu', 37, '2020-04-05 11:26:20'),
(282, 'shabbu', 37, '2020-04-05 11:26:24'),
(283, 'shabbu', 37, '2020-04-05 11:26:27'),
(284, 'shabbu', 37, '2020-04-05 11:26:44'),
(285, 'shabbu', 37, '2020-04-05 11:27:14'),
(286, 'shabbu', 37, '2020-04-05 11:38:43'),
(287, 'shabbu', 37, '2020-04-05 11:38:51'),
(288, 'shabbu', 37, '2020-04-05 11:39:03'),
(289, 'shabbu', 37, '2020-04-05 11:39:12'),
(290, 'shabbu', 37, '2020-04-05 11:39:14'),
(291, 'shabbu', 37, '2020-04-05 11:39:18'),
(292, 'shabbu', 37, '2020-04-05 11:39:32'),
(293, 'shabbu', 37, '2020-04-05 11:40:22'),
(294, 'shabbu', 37, '2020-04-05 11:44:05'),
(295, 'shabbu', 37, '2020-04-05 11:47:40'),
(296, 'shabbu', 37, '2020-04-05 11:48:20'),
(297, 'shabbu', 37, '2020-04-05 11:49:03'),
(298, 'shabbu', 37, '2020-04-05 11:53:15'),
(299, 'shabbu', 37, '2020-04-05 11:53:15'),
(300, 'shabbu', 37, '2020-04-05 11:53:15'),
(301, 'shabbu', 37, '2020-04-05 11:53:15'),
(302, 'shabbu', 37, '2020-04-05 11:53:15'),
(303, 'shabbu', 37, '2020-04-05 11:53:15'),
(304, 'shabbu', 37, '2020-04-05 11:53:15'),
(305, 'shabbu', 37, '2020-04-05 11:53:15'),
(306, 'shabbu', 37, '2020-04-05 11:53:15'),
(307, 'shabbu', 37, '2020-04-05 11:53:24'),
(308, 'shabbu', 37, '2020-04-05 11:53:24'),
(309, 'shabbu', 37, '2020-04-05 11:53:24'),
(310, 'shabbu', 37, '2020-04-05 11:53:24'),
(311, 'shabbu', 37, '2020-04-05 11:53:24'),
(312, 'shabbu', 37, '2020-04-05 11:53:24'),
(313, 'shabbu', 37, '2020-04-05 11:53:24'),
(314, 'shabbu', 37, '2020-04-05 11:53:25'),
(315, 'shabbu', 37, '2020-04-05 11:53:28'),
(316, 'shabbu', 37, '2020-04-05 11:54:12'),
(317, 'shabbu', 37, '2020-04-05 11:54:13'),
(318, 'shabbu', 37, '2020-04-05 11:55:34'),
(319, 'shabbu', 37, '2020-04-05 11:55:35'),
(320, 'shabbu', 37, '2020-04-05 11:55:35'),
(321, 'shabbu', 37, '2020-04-05 11:56:02'),
(322, 'shabbu', 37, '2020-04-05 11:56:03'),
(323, 'shabbu', 37, '2020-04-05 11:57:20'),
(324, 'shabbu', 37, '2020-04-05 11:57:43'),
(325, 'shabbu', 37, '2020-04-05 11:58:15'),
(326, 'shabbu', 37, '2020-04-05 11:59:25'),
(327, 'shabbu', 37, '2020-04-05 11:59:26'),
(328, 'shabbu', 37, '2020-04-05 12:03:00'),
(329, 'shabbu', 37, '2020-04-05 12:03:01'),
(330, 'shabbu', 37, '2020-04-05 12:03:29'),
(331, 'shabbu', 37, '2020-04-05 12:03:34'),
(332, 'shabbu', 37, '2020-04-05 12:04:11'),
(333, 'shabbu', 37, '2020-04-05 12:04:14'),
(334, 'shabbu', 37, '2020-04-05 12:04:48'),
(335, 'shabbu', 37, '2020-04-05 12:04:54'),
(336, 'shabbu', 37, '2020-04-05 12:05:03'),
(337, 'shabbu', 37, '2020-04-05 12:05:32'),
(338, 'shabbu', 37, '2020-04-05 12:05:35'),
(339, 'shabbu', 37, '2020-04-05 12:05:37'),
(340, 'shabbu', 37, '2020-04-05 12:05:41'),
(341, 'shabbu', 37, '2020-04-05 12:05:54'),
(342, 'shabbu', 37, '2020-04-05 12:06:01'),
(343, 'shabbu', 37, '2020-04-05 12:06:01'),
(344, 'shabbu', 37, '2020-04-05 12:09:25'),
(345, 'shabbu', 37, '2020-04-05 12:09:45'),
(346, 'shabbu', 37, '2020-04-05 12:09:52'),
(347, 'shabbu', 37, '2020-04-05 12:10:01'),
(348, 'shabbu', 37, '2020-04-05 12:10:08'),
(349, 'shabbu', 37, '2020-04-05 12:10:27'),
(350, 'shabbu', 37, '2020-04-05 12:10:28'),
(351, 'shabbu', 37, '2020-04-05 12:10:49'),
(352, 'shabbu', 37, '2020-04-05 12:11:11'),
(353, 'shabbu', 37, '2020-04-05 12:11:37'),
(354, 'shabbu', 37, '2020-04-05 12:11:47'),
(355, 'shabbu', 37, '2020-04-05 12:11:58'),
(356, 'shabbu', 37, '2020-04-05 12:12:15'),
(357, 'shabbu', 37, '2020-04-05 12:12:26'),
(358, 'shabbu', 37, '2020-04-05 12:12:41'),
(359, 'shabbu', 37, '2020-04-05 12:13:27'),
(360, 'shabbu', 37, '2020-04-05 12:13:33'),
(361, 'shabbu', 37, '2020-04-05 12:13:47'),
(362, 'shabbu', 37, '2020-04-05 12:14:03'),
(363, 'shabbu', 37, '2020-04-05 12:14:09'),
(364, 'shabbu', 37, '2020-04-05 12:14:22'),
(365, 'shabbu', 37, '2020-04-05 12:17:18'),
(366, 'shabbu', 37, '2020-04-05 12:17:50'),
(367, 'shabbu', 37, '2020-04-05 12:18:53'),
(368, 'shabbu', 37, '2020-04-05 12:19:19'),
(369, 'shabbu', 37, '2020-04-05 12:21:16'),
(370, 'shabbu', 37, '2020-04-05 12:21:26'),
(371, 'shabbu', 37, '2020-04-05 12:21:41'),
(372, 'shabbu', 37, '2020-04-05 12:21:44'),
(373, 'shabbu', 37, '2020-04-05 12:21:45'),
(374, 'shabbu', 37, '2020-04-05 12:21:45'),
(375, 'shabbu', 37, '2020-04-05 12:21:45'),
(376, 'shabbu', 37, '2020-04-05 12:21:45'),
(377, 'shabbu', 37, '2020-04-05 12:22:23'),
(378, 'shabbu', 37, '2020-04-05 12:22:24'),
(379, 'shabbu', 37, '2020-04-05 12:22:24'),
(380, 'shabbu', 37, '2020-04-05 12:22:24'),
(381, 'shabbu', 37, '2020-04-05 12:22:24'),
(382, 'shabbu', 37, '2020-04-05 12:22:24'),
(383, 'shabbu', 37, '2020-04-05 12:22:24'),
(384, 'shabbu', 37, '2020-04-05 12:22:24'),
(385, 'shabbu', 37, '2020-04-05 12:22:24'),
(386, 'shabbu', 37, '2020-04-05 12:22:24'),
(387, 'shabbu', 37, '2020-04-05 12:22:24'),
(388, 'shabbu', 37, '2020-04-05 12:22:24'),
(389, 'shabbu', 37, '2020-04-05 12:22:25'),
(390, 'shabbu', 37, '2020-04-05 12:22:27'),
(391, 'shabbu', 37, '2020-04-05 12:22:56'),
(392, 'shabbu', 37, '2020-04-05 12:24:06'),
(393, 'shabbu', 37, '2020-04-05 12:24:06'),
(394, 'shabbu', 37, '2020-04-05 12:24:06'),
(395, 'shabbu', 37, '2020-04-05 12:24:07'),
(396, 'shabbu', 37, '2020-04-05 12:24:07'),
(397, 'shabbu', 37, '2020-04-05 12:24:07'),
(398, 'shabbu', 37, '2020-04-05 12:24:07'),
(399, 'shabbu', 37, '2020-04-05 12:25:52'),
(400, 'shabbu', 37, '2020-04-05 12:25:53'),
(401, 'shabbu', 37, '2020-04-05 12:25:54'),
(402, 'shabbu', 37, '2020-04-05 12:25:54'),
(403, 'shabbu', 37, '2020-04-05 12:25:54'),
(404, 'shabbu', 37, '2020-04-05 12:25:54'),
(405, 'shabbu', 37, '2020-04-05 12:25:54'),
(406, 'shabbu', 37, '2020-04-05 12:26:25'),
(407, 'shabbu', 37, '2020-04-05 12:26:26'),
(408, 'shabbu', 37, '2020-04-05 12:26:26'),
(409, 'shabbu', 37, '2020-04-05 12:26:26'),
(410, 'shabbu', 37, '2020-04-05 12:26:26'),
(411, 'shabbu', 37, '2020-04-05 12:26:26'),
(412, 'shabbu', 37, '2020-04-05 12:26:26'),
(413, 'shabbu', 37, '2020-04-05 12:26:26'),
(414, 'shabbu', 37, '2020-04-05 12:26:26'),
(415, 'shabbu', 37, '2020-04-05 12:26:26'),
(416, 'shabbu', 37, '2020-04-05 12:26:26'),
(417, 'shabbu', 37, '2020-04-05 12:26:36'),
(418, 'shabbu', 37, '2020-04-05 12:26:44'),
(419, 'shabbu', 37, '2020-04-05 12:33:26'),
(420, 'shabbu', 37, '2020-04-05 12:34:40'),
(421, 'shabbu', 37, '2020-04-05 12:35:11'),
(422, 'shabbu', 37, '2020-04-05 12:37:09'),
(423, 'shabbu', 37, '2020-04-05 12:44:54'),
(424, 'shabbu', 37, '2020-04-05 12:45:06'),
(425, 'shabbu', 37, '2020-04-05 12:45:28'),
(426, 'shabbu', 37, '2020-04-05 12:45:32'),
(427, 'shabbu', 37, '2020-04-05 12:45:36'),
(428, 'shabbu', 37, '2020-04-05 12:45:51'),
(429, 'shabbu', 37, '2020-04-05 12:46:13'),
(430, 'shabbu', 37, '2020-04-05 12:46:16'),
(431, 'shabbu', 37, '2020-04-05 12:47:34'),
(432, 'shabbu', 37, '2020-04-05 12:47:38'),
(433, 'shabbu', 37, '2020-04-05 12:47:49'),
(434, 'shabbu', 37, '2020-04-05 12:47:53'),
(435, 'shabbu', 37, '2020-04-05 12:48:40'),
(436, 'shabbu', 37, '2020-04-05 12:48:43'),
(437, 'shabbu', 37, '2020-04-05 12:48:45'),
(438, 'shabbu', 37, '2020-04-05 12:48:48'),
(439, 'shabbu', 37, '2020-04-05 12:58:40'),
(440, 'shabbu', 37, '2020-04-05 12:58:42'),
(441, 'shabnam', 27, '2020-04-13 07:17:39'),
(442, 'shabnam', 27, '2020-04-13 07:18:07'),
(443, 'shabnam', 27, '2020-04-13 07:18:14'),
(444, 'shabnam', 27, '2020-04-13 07:18:29'),
(445, 'shabnam', 27, '2020-04-13 07:18:30'),
(446, 'shabnam', 27, '2020-04-13 07:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`id`, `user_id`, `news_id`, `c_date`) VALUES
(1, 1, 39, '2020-04-13 06:33:45'),
(5, 0, 23, '2020-04-13 07:08:22'),
(6, 3, 27, '2020-04-13 07:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slideshow`
--

CREATE TABLE `tbl_slideshow` (
  `id` int(5) NOT NULL,
  `image` varchar(100) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `orderby` int(3) NOT NULL,
  `c_date` date NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slideshow`
--

INSERT INTO `tbl_slideshow` (`id`, `image`, `caption`, `orderby`, `c_date`, `date`, `status`) VALUES
(9, '1581523748.png', 'The greate platforsdfsdfdcase your passion', 5, '2019-11-20', '2020-02-12 17:08:13', 0),
(10, '1572704417.png', 'First Announcement', 0, '2019-11-20', '2020-02-13 08:22:03', 0),
(12, '1581942264.jpg', 'New Event', 1, '2019-01-07', '2020-02-17 12:24:23', 1),
(13, '1581942289.jpg', 'Good News', 3, '2020-02-04', '2020-02-17 12:24:49', 1),
(14, '1581942321.jpg', 'How are you Content Creator', 2, '2020-02-05', '2020-02-17 12:25:21', 1),
(15, '1581942365.jpg', 'Now Best Chance to Win Prize and Real Cash', 6, '2020-02-03', '2020-02-17 12:26:05', 1),
(16, '1581582326.png', 'hi', 7, '2020-02-04', '2020-02-13 08:25:25', 1),
(17, '1583211940.jpg', 'aviWeb', 5, '2020-03-04', '2020-03-03 05:05:39', 1);

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
(4, 1, '26.00', '03/16/2020 ', '650.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_viewer`
--

CREATE TABLE `tbl_viewer` (
  `id` int(5) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `c_date` date NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_viewer`
--

INSERT INTO `tbl_viewer` (`id`, `user_name`, `email`, `password`, `status`, `c_date`, `u_date`) VALUES
(1, 'shabbu', 'shabnam@gmail.com', '6083400d6743368844a5a3f3e86aa5b7', 1, '2020-04-04', '2020-04-04 16:58:49'),
(3, 'shabnam', 'shabnamsiddique20@gmail.com', '6083400d6743368844a5a3f3e86aa5b7', 1, '2020-04-04', '2020-04-06 12:59:34'),
(4, 'shazia', 'shazia@gmail.com', '6083400d6743368844a5a3f3e86aa5b7', 1, '2020-04-04', '2020-04-06 13:06:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adunit`
--
ALTER TABLE `tbl_adunit`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `tbl_adunit_report`
--
ALTER TABLE `tbl_adunit_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ad_creator`
--
ALTER TABLE `tbl_ad_creator`
  ADD PRIMARY KEY (`ad_creator_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

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
-- Indexes for table `tbl_slideshow`
--
ALTER TABLE `tbl_slideshow`
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
  MODIFY `ad_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_adunit_report`
--
ALTER TABLE `tbl_adunit_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_ad_creator`
--
ALTER TABLE `tbl_ad_creator`
  MODIFY `ad_creator_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_content_creator`
--
ALTER TABLE `tbl_content_creator`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_follower`
--
ALTER TABLE `tbl_follower`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_module_user`
--
ALTER TABLE `tbl_module_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;
--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_slideshow`
--
ALTER TABLE `tbl_slideshow`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_viewer`
--
ALTER TABLE `tbl_viewer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
