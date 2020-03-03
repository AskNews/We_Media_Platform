-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 05:58 AM
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
  `post_date` date NOT NULL,
  `cpc` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ad_unit_amount` decimal(10,0) NOT NULL,
  `lifetime_amount` decimal(10,0) NOT NULL,
  `spend_amount` decimal(10,0) NOT NULL,
  `approval` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, 21, 'priyanka', 'good news', '2019-11-11 03:45:48', 0, '');

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
  `life_time_withdraw_amt` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_content_creator`
--

INSERT INTO `tbl_content_creator` (`id`, `username`, `email`, `mobile`, `password`, `ChannelName`, `ChannelDescription`, `AccountApproval`, `Status`, `channel_logo`, `DateTime`, `Monetization`, `join_date`, `privacy`, `bank_name`, `account_holder_name`, `bank_account_number`, `ifsc_code`, `earnings`, `life_time_withdraw_amt`) VALUES
(1, 'shabnam20', 'shabnam@gmail.com', 8238347295, '6083400d6743368844a5a3f3e86aa5b7', 'tech', 'good channel for technicians', 1, 1, '1573281867.jpg', '2019-11-01 09:45:42', 0, '', 0, '', '', '', '', '0.00', '0.00'),
(2, 'Avinash1232', 'shab@gmail.com', 7412589630, '6083400d6743368844a5a3f3e86aa5b7', '', '', 1, 1, 'default.jpg', '2019-11-01 09:45:42', 0, '', 0, '', '', '', '', '0.00', '0.00'),
(3, 'Avinash123', 'shab@gmail.com', 7415896304, '6083400d6743368844a5a3f3e86aa5b7', '', '', 1, 1, '', '2019-11-01 09:45:42', 0, '', 0, '', '', '', '', '0.00', '0.00'),
(4, 'Shazia', 'shazia@gmail.com', 7418529630, '6083400d6743368844a5a3f3e86aa5b7', 'dhb', 'fdvgbhnj', 1, 1, 'default.jpg', '2019-11-01 12:49:46', 0, '', 0, '', '', '', '', '0.00', '0.00'),
(5, 'jaimin', 'jm87@gmail.com', 9898789878, 'e71b2e99a78da9c585fa1698501e527e', '', '', 0, 1, '1580186639.jpg', '2020-01-28 04:43:58', 0, '01/28/2020', 0, '', '', '', '', '0.00', '0.00'),
(6, 'Kishan1', 'kishan@gmail.com', 9999999999, 'e69dc2c09e8da6259422d987ccbe95b5', 'AviWeb', 'Tech Channel', 0, 1, 'default.jpg', '2020-02-25 04:55:01', 0, '02/25/2020', 0, '', '', '', '', '0.00', '0.00');

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
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `user_id`, `module_user_id`, `subject`, `message`, `reply`, `role`, `c_date`, `u_date`, `status`) VALUES
(1, 3, 2, 'account audition problem', 'please approve my account', 'ok sure please wait', 1, '2019-11-12', '2019-11-17 11:35:04', 1);

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
  `Rejected` int(1) NOT NULL DEFAULT '1',
  `PostDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`NewsID`, `CategoryID`, `CreatorID`, `TopNews`, `HeadLine`, `Url`, `SeoTitle`, `SeoDescription`, `FileAttach`, `Summary`, `Details`, `Views`, `ModifyDate`, `Status`, `Approved`, `PublishDate`, `RejectionMsg`, `Offline`, `Rejected`, `PostDate`) VALUES
(17, 3, 1, 0, 'My New News', 'my-new-news', 'my, new, news', 'hello creaton of new news', '1572800906.jpg', 'first News', '<p>hello hello<strong> hello&nbsp; hsbfhd<s> shabnam</s></strong></p>\r\n', 0, '2020-02-13 12:34:21', 1, 1, '0000-00-00', '', 0, 1, '0000-00-00'),
(21, 3, 1, 0, 'shabnam siddiqui', 'shabnam-siddiqui', 'shabnam, siddiqui', 'shabbu ', '1572801289.jpg', 'shabbu', '<p><em>shabnam mom pic uploaded...:)</em></p>\r\n', 0, '2020-02-13 12:24:05', 1, 1, '0000-00-00', '', 0, 1, '0000-00-00'),
(23, 3, 1, 0, 'avinash updated', 'avinash-updated', 'avinash, updated', '', '1573221709.JPG', 'avinash', '<p><strong>avinash updated</strong></p>\r\n\r\n<p><strong>h</strong>ello from editor&nbsp;</p>\r\n\r\n<ol>\r\n	<li>hello edited news</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>helloe edited news&nbsp;</li>\r\n</ul>\r\n', 0, '2020-02-13 12:26:24', 1, 1, '0000-00-00', 'unfollow the rules of platform', 0, 2, '0000-00-00'),
(25, 4, 1, 0, 'virat kohli', 'virat-kohli', 'virat, kohli', '', '1572971720.jpg', 'dsfghjk fxcgvhbjnk ', '<p>hello from shabnam</p>\r\n', 0, '2020-02-18 05:04:28', 1, 1, '0000-00-00', 'unfollow the rules of platform', 1, 3, '0000-00-00'),
(27, 4, 1, 0, 'category selected', 'category-selected', 'category, selected', '', '1572972155.jpg', 'hello from category 2', '<p>hello from category 2 this is basic details of news</p>\r\n', 0, '2020-02-18 05:04:33', 1, 1, '0000-00-00', '', 0, 0, '0000-00-00'),
(29, 4, 1, 0, 'category 1 selected', 'category-1-selected', 'category, 1, selected', '', '1572973197.png', 'category1', '<p>selection of category 1 that is ssshjfh</p>\r\n', 0, '2020-02-18 05:04:36', 1, 1, '0000-00-00', '', 0, 1, '0000-00-00'),
(30, 5, 1, 0, 'shabnam', 'shabnam', 'shabnam', '', '1573220143.JPG', 'shabnam siddiqui', '<ol>\r\n	<li>shabnam</li>\r\n</ol>\r\n\r\n<blockquote>\r\n<ul>\r\n	<li>hi</li>\r\n	<li>dhejhf</li>\r\n	<li>fdjbkfm,</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n</blockquote>\r\n', 0, '2020-02-18 05:04:40', 1, 1, '0000-00-00', '', 0, 1, '0000-00-00'),
(35, 5, 1, 0, 'shabnam siddiqui', 'shabnam-siddiqui', 'shabnam, siddiqui', '', '1573220432.JPG', 'shabnam', '<p>shabnam editor</p>\r\n', 0, '2020-02-18 05:04:44', 1, 1, '0000-00-00', '', 0, 1, '0000-00-00'),
(37, 5, 1, 0, 'maha cyclone', 'maha-cyclone', 'maha, cyclone', '', '1573220727.JPG', 'maha cyclone', '<p>maha cyclone in south gujrat</p>\r\n', 0, '2020-02-18 05:04:47', 1, 1, '0000-00-00', '', 0, 1, '0000-00-00'),
(38, 4, 0, 0, 'avinash', 'avinash', 'avinash', '', '1573985652.png', 'avinash', '<p>avinash</p>\r\n', 0, '2020-02-18 05:04:51', 1, 1, '0000-00-00', '', 0, 1, '0000-00-00');

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
(46, 7, 'Funny Images', '1581941937.jpg', '2020-02-11', '2020-02-17 12:18:57', 1),
(47, 9, 'asdds', '1581941954.jpg', '2020-02-04', '2020-02-17 12:19:14', 1),
(48, 8, 'Best Pic 2019', '1581941984.jpg', '2020-02-04', '2020-02-17 12:19:44', 1),
(49, 4, 'fgdgf', '1581763991.png', '2020-02-03', '2020-02-15 11:58:53', 0),
(50, 1, 'Viewer testing', '1581763674.png', '2020-02-04', '2020-02-15 10:47:53', 1);

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
(16, '1581582326.png', 'hi', 7, '2020-02-04', '2020-02-13 08:25:25', 1);

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
(1, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '0000-00-00', '2019-11-03 06:11:47'),
(2, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2019-11-03 06:13:40'),
(3, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2019-11-03 06:15:00'),
(1, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '0000-00-00', '2019-11-03 06:11:47'),
(2, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2019-11-03 06:13:40'),
(3, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2019-11-03 06:15:00'),
(1, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '0000-00-00', '2019-11-03 06:11:47'),
(2, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2019-11-03 06:13:40'),
(3, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2019-11-03 06:15:00'),
(1, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '0000-00-00', '2019-11-03 06:11:47'),
(2, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2019-11-03 06:13:40'),
(3, 'avinash', 'avinas98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2019-11-03 06:15:00'),
(0, 'Avinash', 'avinas78@gmail.com', '2bb409b4db9f8822237f5bc63e2d1506', 1, '0000-00-00', '2020-01-23 17:47:40'),
(0, 'squad', 'squad98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2020-01-23 17:49:46'),
(0, 'super', 'super@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2020-02-13 11:47:16'),
(0, 'Jp', 'jp90@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2020-03-03 04:46:09'),
(0, 'jp', 'jp99@gmail.com', 'f1d577da5b6560447f1c0a1994ce9b1d', 1, '0000-00-00', '2020-03-03 04:47:55'),
(0, 'jam', 'jam98@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2020-03-03 04:53:46'),
(0, 'jhgj', 'h43@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', 1, '0000-00-00', '2020-03-03 04:58:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adunit`
--
ALTER TABLE `tbl_adunit`
  ADD PRIMARY KEY (`ad_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adunit`
--
ALTER TABLE `tbl_adunit`
  MODIFY `ad_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ad_creator`
--
ALTER TABLE `tbl_ad_creator`
  MODIFY `ad_creator_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_content_creator`
--
ALTER TABLE `tbl_content_creator`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_module_user`
--
ALTER TABLE `tbl_module_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `NewsID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
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
-- AUTO_INCREMENT for table `tbl_slideshow`
--
ALTER TABLE `tbl_slideshow`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
