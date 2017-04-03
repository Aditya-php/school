-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2017 at 03:27 PM
-- Server version: 5.5.45
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_view_logs`
--

CREATE TABLE IF NOT EXISTS `admin_view_logs` (
  `id` bigint(10) NOT NULL,
  `app_sc_id` bigint(10) DEFAULT NULL,
  `appointment_status` enum('3','7','6','8') DEFAULT NULL COMMENT '''3''=>closed,''7''=>cancel,''6''=>admin approved, ''8''=>discontinue Approved',
  `kid_id` bigint(10) DEFAULT NULL,
  `parent_id` bigint(10) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `cdate` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_view_logs`
--

INSERT INTO `admin_view_logs` (`id`, `app_sc_id`, `appointment_status`, `kid_id`, `parent_id`, `start_date`, `cdate`) VALUES
(1, 2, '3', 41, 70, '2017-03-27 12:01:45', NULL),
(2, 2, '7', 42, 70, '2017-03-27 12:01:45', '2017-03-27 12:03:57'),
(3, 3, '7', 42, 70, '2017-05-27 12:00:00', '2017-03-27 12:06:42'),
(4, 4, '7', 42, 70, '2017-05-19 12:00:00', '2017-03-27 12:08:15'),
(5, 5, '7', 42, 70, '2017-05-17 12:00:00', '2017-03-27 01:17:22'),
(6, 6, '7', 42, 70, '2017-05-26 12:00:00', '2017-03-30 03:00:38'),
(7, 7, '7', 51, 173, '2017-03-28 02:30:11', '2017-03-30 02:36:39'),
(8, 1, '3', 43, 70, '2017-03-29 03:10:49', NULL),
(9, 2, '3', 47, 70, '2017-03-29 05:15:42', NULL),
(10, 2, '3', 48, 70, '2017-03-29 05:15:42', NULL),
(11, 2, '3', 50, 70, '2017-03-29 05:15:42', NULL),
(12, 2, '3', 53, 70, '2017-03-29 05:15:42', NULL),
(13, 13, '3', 56, 128, '2017-03-29 06:04:14', NULL),
(14, 13, '8', 57, 128, '2017-03-29 06:04:14', '2017-03-29 06:07:25'),
(15, 14, '3', 58, 179, '2017-03-30 11:09:29', NULL),
(18, 18, '7', 61, 181, '2017-03-30 01:42:07', '2017-03-30 01:53:00'),
(19, 19, '7', 61, 181, '2017-03-30 12:00:00', '2017-03-30 03:38:42'),
(20, 20, '6', 51, 173, '2017-03-31 12:00:00', NULL),
(21, 21, '6', 42, 70, '2017-03-31 12:00:00', NULL),
(22, 22, '8', 62, 181, '2017-03-30 03:33:41', '2017-03-30 03:35:42'),
(23, 23, '6', 61, 181, '2018-03-15 12:00:00', NULL),
(30, 30, '7', 63, 184, '2017-03-31 12:15:52', '2017-03-31 12:21:15'),
(31, 35, '8', 63, 184, '2017-06-16 12:00:00', '2017-03-31 12:26:52'),
(32, 32, '7', 63, 184, '2017-03-31 12:28:09', '2017-03-31 12:32:56'),
(33, 36, '8', 63, 184, '2017-03-31 12:00:00', '2017-03-31 12:34:10'),
(34, 38, '3', 66, 184, '2017-03-31 03:24:26', NULL),
(35, 39, '3', 63, 184, '2017-03-31 03:27:19', NULL),
(36, 39, '3', 66, 184, '2017-03-31 03:34:20', NULL),
(37, 39, '3', 63, 184, '2017-03-31 03:38:39', NULL),
(38, 39, '3', 63, 184, '2017-03-31 03:55:34', NULL),
(39, 39, '3', 66, 184, '2017-03-31 03:57:49', NULL),
(40, 39, '3', 63, 184, '2017-03-31 03:59:16', NULL),
(41, 39, '3', 64, 184, '2017-03-31 03:59:16', NULL),
(42, 39, '3', 66, 184, '2017-03-31 03:59:16', NULL),
(43, 39, '3', 63, 184, '2017-03-31 04:03:06', NULL),
(44, 39, '3', 64, 184, '2017-03-31 04:03:06', NULL),
(45, 39, '3', 66, 184, '2017-03-31 04:03:06', NULL),
(46, 39, '3', 63, 184, '2017-03-31 04:05:50', NULL),
(47, 39, '3', 64, 184, '2017-03-31 04:05:50', NULL),
(48, 39, '3', 66, 184, '2017-03-31 04:05:50', NULL),
(49, 39, '3', 63, 184, '2017-03-31 04:10:45', NULL),
(50, 39, '3', 64, 184, '2017-03-31 04:10:45', NULL),
(51, 39, '3', 66, 184, '2017-03-31 04:10:45', NULL),
(52, 40, '3', 67, 70, '2017-03-31 04:16:51', NULL),
(53, 39, '3', 64, 184, '2017-03-31 04:21:16', NULL),
(54, 39, '3', 66, 184, '2017-03-31 04:21:16', NULL),
(55, 41, '3', 67, 70, '2017-03-31 04:29:04', NULL),
(56, 42, '8', 65, 187, '2017-03-31 04:51:34', '2017-03-31 05:27:10'),
(57, 39, '3', 64, 184, '2017-04-03 01:01:29', NULL),
(58, 39, '3', 64, 184, '2017-04-03 01:03:14', NULL),
(59, 39, '3', 66, 184, '2017-04-03 01:03:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_schedular`
--

CREATE TABLE IF NOT EXISTS `appointment_schedular` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'parent id',
  `vendor_id` int(11) NOT NULL COMMENT 'id of vendor_details table',
  `vendor_user_id` int(11) NOT NULL COMMENT 'user_id of vendor details table',
  `schedule_time` datetime NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `appointment_status` enum('1','2','3','4','5','6','7') NOT NULL DEFAULT '4' COMMENT '''1''=>confirm schedule,''2''=>done,''3''=>closed,4=>pending,''5''=>Not Confirmed,''6''=>admin approved,''7''=>canceld by parents',
  `status` tinyint(1) NOT NULL,
  `assign_to` int(11) NOT NULL,
  `assigned_kid_ids` mediumtext NOT NULL COMMENT 'id of kids assigned ',
  `created_date` datetime NOT NULL,
  `modifiled` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_schedular`
--

INSERT INTO `appointment_schedular` (`id`, `user_id`, `vendor_id`, `vendor_user_id`, `schedule_time`, `remarks`, `appointment_status`, `status`, `assign_to`, `assigned_kid_ids`, `created_date`, `modifiled`) VALUES
(1, 70, 8, 84, '2017-03-27 14:30:00', ' test test test test test test test test  test test test test test test test test  test test test test test test test test  test test test test test test test test  test test test test test test test test  test test test test test test test test  tes', '1', 0, 151, '43', '2017-03-27 12:01:24', '2017-03-29 03:10:49'),
(2, 70, 20, 74, '2017-03-27 15:00:00', 'Pick me from DelhiPick me from Delhi', '3', 0, 148, '47,48,50,53', '2017-03-27 12:01:24', '2017-03-29 05:15:42'),
(3, 70, 38, 68, '0000-00-00 00:00:00', '', '6', 0, 148, '', '0000-00-00 00:00:00', '2017-03-27 12:06:42'),
(4, 70, 14, 74, '0000-00-00 00:00:00', '', '6', 0, 0, '', '0000-00-00 00:00:00', '2017-03-27 12:08:15'),
(5, 70, 38, 68, '0000-00-00 00:00:00', '', '6', 0, 164, '', '0000-00-00 00:00:00', '2017-03-27 01:17:21'),
(6, 70, 20, 0, '0000-00-00 00:00:00', '', '7', 0, 169, '', '0000-00-00 00:00:00', '2017-03-30 03:00:38'),
(7, 173, 31, 119, '2017-03-29 15:30:00', 'Pick me from Delhi', '5', 0, 174, '', '2017-03-28 14:20:05', '2017-03-30 02:36:39'),
(8, 173, 40, 143, '2017-03-29 17:00:00', 'test', '4', 0, 151, '', '2017-03-28 14:20:05', '2017-03-30 02:36:10'),
(9, 173, 20, 74, '2017-03-30 16:30:00', '', '4', 0, 151, '', '2017-03-28 14:38:23', '0000-00-00 00:00:00'),
(10, 173, 21, 109, '2017-03-30 15:30:00', '', '2', 0, 148, '', '2017-03-28 14:38:23', '0000-00-00 00:00:00'),
(11, 173, 37, 126, '2017-03-28 17:30:00', '', '5', 0, 169, '', '2017-03-28 14:38:23', '2017-03-29 11:22:17'),
(12, 46, 8, 84, '2017-03-31 21:00:00', '', '1', 0, 164, '', '2017-03-28 19:03:36', '0000-00-00 00:00:00'),
(13, 128, 8, 84, '2017-03-29 18:00:00', '', '3', 0, 0, '56', '2017-03-29 17:51:59', '2017-03-30 02:57:28'),
(14, 179, 34, 122, '2017-03-30 04:00:00', 'dfdgfg', '3', 0, 151, '58', '2017-03-30 11:07:00', '2017-03-30 02:57:01'),
(20, 173, 9, 0, '0000-00-00 00:00:00', '', '6', 0, 0, '51', '0000-00-00 00:00:00', '2017-03-30 02:36:39'),
(21, 70, 12, 0, '0000-00-00 00:00:00', '', '6', 0, 148, '42', '0000-00-00 00:00:00', '2017-03-30 03:00:38'),
(30, 184, 8, 84, '2017-03-31 13:00:00', '', '3', 0, 0, '', '2017-03-31 12:14:10', '2017-03-31 12:21:15'),
(32, 184, 21, 109, '2017-03-31 14:30:00', '', '3', 0, 0, '', '2017-03-31 12:14:10', '2017-03-31 12:32:56'),
(33, 184, 31, 119, '2017-03-31 14:00:00', '', '7', 0, 0, '', '2017-03-31 12:16:50', '0000-00-00 00:00:00'),
(35, 184, 39, 0, '0000-00-00 00:00:00', '', '6', 0, 0, '', '0000-00-00 00:00:00', '2017-03-31 12:26:52'),
(36, 184, 39, 0, '0000-00-00 00:00:00', '', '6', 0, 0, '', '0000-00-00 00:00:00', '2017-03-31 12:34:09'),
(37, 187, 31, 119, '2017-03-31 16:00:00', 'Test Test Test Test Test Test Test Test Test Test Test Test ', '7', 0, 0, '', '2017-03-31 13:11:36', '0000-00-00 00:00:00'),
(39, 184, 49, 183, '2016-09-28 08:00:00', 'new remark', '3', 0, 0, '64,66', '2017-03-31 15:26:47', '2017-04-03 01:03:14'),
(40, 70, 20, 74, '2017-04-01 17:00:00', 'test', '3', 0, 178, '63', '2017-03-31 16:10:24', '2017-04-03 12:12:58'),
(41, 70, 20, 74, '2017-04-01 19:00:00', 'test', '3', 0, 0, '67', '2017-03-31 16:27:46', '2017-03-31 04:29:04'),
(42, 187, 20, 74, '2017-04-01 18:00:00', 'cvbcbcbcbc  dfbhfhfghf fvnfghfhf fhfhfhfg fghfhfhf dhdfhfhfgh fghfhfh fghfghfh fhfghfgh fghfghf fghfghfghfhfhfhfghf fgh', '3', 0, 98, '', '2017-03-31 16:44:50', '2017-04-03 12:21:56'),
(43, 70, 20, 74, '2017-04-01 18:00:00', 'GOOd', '7', 0, 0, '', '2017-03-31 17:05:03', '0000-00-00 00:00:00'),
(44, 70, 20, 74, '2017-04-01 20:00:00', 'test', '1', 0, 151, '', '2017-03-31 18:38:44', '2017-04-03 12:10:54'),
(45, 70, 20, 74, '2017-04-02 03:30:00', '', '7', 0, 151, '', '2017-04-01 08:30:18', '2017-04-03 12:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `area_master`
--

CREATE TABLE IF NOT EXISTS `area_master` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active' COMMENT '1=>Active,2=>Inactive',
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_master`
--

INSERT INTO `area_master` (`id`, `city_id`, `area_name`, `status`, `created_by`, `modified_by`, `created_date`, `modified_date`) VALUES
(3, 2, 'asdasd', 'active', 1, 0, '2017-02-17 05:44:36', '0000-00-00 00:00:00'),
(5, 3, 'SEC4', 'active', 1, 46, '2017-02-27 07:05:08', '2017-03-01 11:57:04'),
(8, 3, 'sadasd', 'active', 46, 46, '2017-03-01 11:56:44', '2017-03-01 12:05:47'),
(12, 11, 'Karol Bagh', 'active', 46, 46, '2017-03-02 12:56:32', '2017-03-06 11:31:45'),
(13, 10, 'sector 64fd', 'active', 46, 46, '2017-03-02 03:34:33', '2017-03-10 09:47:39'),
(16, 13, 'dfgdgd', 'active', 46, 0, '2017-03-10 09:47:57', '0000-00-00 00:00:00'),
(17, 13, 'fdgdf', 'active', 46, 0, '2017-03-10 09:48:05', '0000-00-00 00:00:00'),
(18, 16, 'R. K. Puram', 'active', 46, 0, '2017-03-10 10:50:04', '0000-00-00 00:00:00'),
(20, 17, 'Sec-18', 'active', 46, 0, '2017-03-10 10:53:14', '0000-00-00 00:00:00'),
(21, 17, 'Sec-181', 'active', 46, 46, '2017-03-10 10:53:37', '2017-03-10 11:05:23'),
(23, 17, 'R. K. Puram', 'inactive', 46, 46, '2017-03-10 02:55:23', '2017-03-22 10:46:47'),
(24, 22, 'Raj Nagar', 'active', 46, 0, '2017-03-20 01:30:20', '0000-00-00 00:00:00'),
(25, 23, 'sector 66', 'active', 46, 0, '2017-03-21 06:33:44', '0000-00-00 00:00:00'),
(26, 25, 'sector-50', 'active', 46, 0, '2017-03-23 08:18:05', '0000-00-00 00:00:00'),
(27, 16, 'faridabad', 'inactive', 46, 0, '2017-03-23 08:19:21', '0000-00-00 00:00:00'),
(28, 27, 'Charbagh', 'active', 46, 0, '2017-03-27 04:43:16', '0000-00-00 00:00:00'),
(29, 16, '5669khi', 'active', 46, 46, '2017-03-27 06:22:50', '2017-03-27 06:22:59'),
(30, 29, 'himanchal1', 'active', 46, 0, '2017-03-28 10:12:49', '0000-00-00 00:00:00'),
(31, 17, 'Sector 62', 'active', 46, 0, '2017-03-28 01:36:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE IF NOT EXISTS `city_master` (
  `id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active' COMMENT '1=>Active,2=>Inactive',
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`id`, `city_name`, `status`, `created_by`, `modified_by`, `created_date`, `modified_date`) VALUES
(16, 'Delhi', 'active', 46, 46, '2017-03-10 10:48:19', '2017-03-23 08:09:15'),
(17, 'Noida', 'active', 46, 46, '2017-03-10 10:48:32', '2017-03-29 01:00:17'),
(24, 'Faridabad', 'inactive', 46, 46, '2017-03-23 08:08:40', '2017-03-29 01:01:09'),
(25, 'Gurugram', 'active', 46, 46, '2017-03-23 08:09:45', '2017-03-29 01:00:48'),
(27, 'Lucknow', 'active', 46, 0, '2017-03-27 04:41:36', '0000-00-00 00:00:00'),
(29, 'himanchal pradesh', 'active', 46, 0, '2017-03-28 10:08:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `manage_service_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `rating` float NOT NULL,
  `message` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '''0''=>inactive,''1''=>active,''2''=>deleted',
  `edit_by` int(11) NOT NULL COMMENT '''1''=>admin',
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `manage_service_id`, `name`, `email`, `rating`, `message`, `created_at`, `status`, `edit_by`, `modified_at`) VALUES
(18, 4, 1, 'arvind gupta', 'arvind@tekshapers.com', 3.6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2016-05-17 16:12:54', '0', 1, '2016-05-17 04:17:07'),
(19, 7, 2, 'geetu tyagi', 'geet@yopmail.com', 2.5, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.', '2016-05-18 15:28:58', '1', 0, '0000-00-00 00:00:00'),
(20, 9, 1, 'Archana Arora', 'archana@tekshapers.com', 1, 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\n\n\n', '2016-05-20 17:33:20', '1', 1, '2016-05-20 05:41:06'),
(21, 11, 2, 'Archana Arora', 'geetu@tekshapers.com', 2, 'ss', '2016-05-23 16:39:51', '0', 0, '0000-00-00 00:00:00'),
(22, 9, 4, 'Archana Arora', 'archana@tekshapers.com', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in \n\n', '2016-05-26 12:09:46', '1', 1, '2016-05-26 12:25:45'),
(23, 9, 3, 'Archana Arora', 'archana@tekshapers.com', 4.9, 'rthyryhrh', '2016-05-26 16:20:00', '0', 0, '0000-00-00 00:00:00'),
(24, 9, 3, 'Archana Arora', 'archana@tekshapers.com', 0.6, 'rtyryr', '2016-05-26 16:20:19', '0', 0, '0000-00-00 00:00:00'),
(25, 6, 5, 'khushboo sethi', 'khushboo@yopmail.com', 2.6, 'Loren Ipsum', '2016-05-26 21:49:19', '1', 0, '0000-00-00 00:00:00'),
(26, 2, 3, 'aki gh', 'ahh@gmail.com', 2.7, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard.', '2016-06-08 12:21:14', '0', 0, '0000-00-00 00:00:00'),
(27, 6, 5, 'khushboo sethi', 'khushboo@yopmail.com', 3.5, 'awesome experience!!!', '2016-06-10 17:59:49', '1', 1, '2016-06-10 06:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `kids`
--

CREATE TABLE IF NOT EXISTS `kids` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `dob` date NOT NULL,
  `age` smallint(3) NOT NULL,
  `liking` text NOT NULL,
  `disliking` text NOT NULL,
  `scared_of` text NOT NULL,
  `allergic_to` text NOT NULL,
  `doctor_name` varchar(222) NOT NULL,
  `doc_con_num` varchar(222) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '"1"=>Active,"2"=>Inactive',
  `unique_id` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kids`
--

INSERT INTO `kids` (`id`, `parent_id`, `name`, `dob`, `age`, `liking`, `disliking`, `scared_of`, `allergic_to`, `doctor_name`, `doc_con_num`, `created_by`, `modified_by`, `created_date`, `modified_date`, `status`, `unique_id`) VALUES
(17, 11111, 'rishu', '2017-02-28', 11, 'sdlkj', 'jlk', 'ljl', 'jljlk', 'jlkjlj', '9809', 101, 0, '2017-02-28 04:01:22', '0000-00-00 00:00:00', '1', '0'),
(19, 101, 'neha', '2017-03-08', 33, 'like', 'dislikwe', 'saldkjs', 'KHLK', 'KSDKJSK', '4444', 101, 0, '2017-03-01 10:53:11', '0000-00-00 00:00:00', '1', '0'),
(23, 65, 'saurabh', '2013-07-16', 2, 'test', 'test', 'test', 'test', 'test', '9897456123', 65, 0, '2017-03-02 10:47:15', '0000-00-00 00:00:00', '1', '0'),
(24, 69, 'kid', '2017-03-14', 44, 'kid', 'kid', 'kid', 'kid', 'kid', '44', 69, 0, '2017-03-02 03:22:35', '0000-00-00 00:00:00', '1', '0'),
(25, 69, 'kid2', '2017-03-13', 22, 'kid2', 'kid2', 'kid2', 'kid2', 'kid2', '22', 69, 0, '2017-03-02 03:22:56', '0000-00-00 00:00:00', '1', '0'),
(28, 68, 'fg', '2017-03-09', 56, 'gh', 'fghf', 'gh', 'gh', 'gh', '55656', 68, 68, '2017-03-02 04:33:20', '2017-03-02 04:33:34', '1', '0'),
(33, 103, 'priya', '2017-03-10', 12, 'Likings', 'Dislikings* :', 'Scared of*', 'Allergic to* :', 'Doctor Name* :', '5555555555', 103, 0, '2017-03-10 11:32:24', '0000-00-00 00:00:00', '1', '0'),
(40, 107, 'Aarav', '2014-01-01', 1175, '1. Dancing\n2. Singing', 'No', 'Dogs', 'Dust', 'Dr. Sidharth', '5656489652', 107, 0, '2017-03-20 12:45:47', '0000-00-00 00:00:00', '1', '0'),
(42, 70, 'Priya', '2017-03-10', 22, 'dfdsfdsf', 'dfdf', 'gfhuy', 'dfsdf', 'df', '5555555555', 70, 70, '2017-03-21 01:13:24', '2017-03-31 05:03:25', '1', '0'),
(44, 137, 'man', '2017-03-20', 3, 'fsdfsd', 'dsdcsd', 'fdfd', 'dsdssd', 'dfsd', '5555555555', 137, 0, '2017-03-22 09:49:30', '0000-00-00 00:00:00', '1', '0'),
(45, 137, 'Moni', '2017-03-22', 1, 'dfsdf', 'dfdfdf', 'fddsf', 'sdfdf', 'sdf', '5555555555', 137, 137, '2017-03-22 09:49:51', '2017-03-22 11:45:53', '2', '0'),
(46, 137, 'Mansi', '2016-10-03', 171, 'gjhg', 'hjhk', 'hkjh', 'kjhkj', 'hkhkjh', '5555555555', 137, 137, '2017-03-22 09:50:12', '2017-03-22 11:45:38', '1', '0'),
(48, 70, 'Abha1', '2017-03-23', 9, 'fgfg', 'fdgfdg', 'fgfd', 'fgdfg', 'fgf', '5555555555', 70, 70, '2017-03-27 06:04:56', '2017-03-31 04:54:17', '1', '0'),
(49, 165, 'raghav', '2016-01-18', 436, 'Likings', 'Dislikings', 'Scared of', 'Allergic to', 'Dr.Batra', '5555555555', 165, 0, '2017-03-28 09:45:08', '0000-00-00 00:00:00', '1', '0'),
(50, 70, 'Sid', '2010-07-08', 2462, 'Tv', 'dogs', 'dogs', 'dust', 'sk', '9876543210', 70, 70, '2017-03-28 10:21:42', '2017-04-03 11:16:12', '1', '0'),
(51, 173, 'John', '2015-06-16', 652, 'LikingsLikingsLikings', 'test  test  test  test  test  test  test', 'test  test  test  test  test  test', 'test  test  test', 'test  test', '1234567891', 173, 0, '2017-03-28 01:56:17', '0000-00-00 00:00:00', '1', '0'),
(53, 70, 'Ashank', '2015-03-12', 754, 'test', 'test', 'test', 'test', 'test88', '9876543210', 70, 70, '2017-03-28 06:10:17', '2017-04-03 11:16:00', '1', 'CK6102049'),
(54, 177, 'abha', '2017-03-23', 7, 'sfdf', 'dsfdsf', 'sdfsfd', 'dfdf', 'sdfsdf', '5555555555', 177, 0, '2017-03-29 05:45:25', '0000-00-00 00:00:00', '1', 'CK6102051'),
(55, 177, 'akanksha', '2017-03-22', 8, 'fg', 'fdg', 'fg', 'fgdfgfd', 'dfg', '5555555555', 177, 0, '2017-03-29 05:45:40', '0000-00-00 00:00:00', '1', 'CK6102052'),
(56, 128, 'kid1 Ank', '2011-07-14', 2086, 'test', 'test', 'test', 'test', 'test', '9876543210', 128, 0, '2017-03-29 05:47:55', '0000-00-00 00:00:00', '1', 'CK6102054'),
(57, 128, 'kid -2 Ank', '2010-07-07', 2458, 'test', 'test', 'test', 'test', 'test', '9876543210', 128, 0, '2017-03-29 05:49:26', '0000-00-00 00:00:00', '1', 'CK6102055'),
(58, 179, 'nilu', '2017-03-30', 1, 'gjg', 'jhjkh', 'jkhk', 'hk', 'hkj', '5555555555', 179, 0, '2017-03-30 11:06:05', '0000-00-00 00:00:00', '1', 'CK6102057'),
(59, 179, 'akku', '2017-03-29', 2, 'dsfsd', 'sdfdf', 'sdfdf', 'dsfsdf', 'sdfsdf', '5555555555', 179, 0, '2017-03-30 11:06:19', '0000-00-00 00:00:00', '1', 'CK6102058'),
(61, 181, 'Pooja', '2015-03-18', 744, 'test', 'test', 'test', 'test', 'test', '9876543210', 181, 0, '2017-03-30 12:40:34', '0000-00-00 00:00:00', '1', 'CK6102060'),
(62, 181, 'Aman', '2010-06-16', 2480, 'test', 'test', 'test', 'test', 'test', '9876543210', 181, 0, '2017-03-30 01:20:06', '0000-00-00 00:00:00', '1', 'CK6102061'),
(63, 184, 'aarti', '2017-03-31', 1, '45nk,n', 'nkn', 'knk', 'nkn', 'kn', '5555555555', 184, 0, '2017-03-31 11:29:26', '0000-00-00 00:00:00', '1', 'CK6102062'),
(64, 184, 'koyal', '2017-03-31', 1, 'gjg', 'gj', 'jh', 'jkh', 'jkhk', '5555555555', 184, 0, '2017-03-31 11:29:42', '0000-00-00 00:00:00', '1', 'CK6102063'),
(65, 187, 'Kajal', '2013-03-12', 1481, 'Likings', 'Dislikings', 'Scared of', 'Allergic to', 'Doctor Name', '7698686868', 187, 187, '2017-03-31 01:05:14', '2017-03-31 05:14:52', '1', 'CK6102065'),
(66, 184, 'pankaj', '2017-03-29', 3, 'dfsdf', 'dfs', 'dfdsf', 'dfdf', 'dsf', '5555555555', 184, 0, '2017-03-31 03:20:06', '0000-00-00 00:00:00', '1', 'CK6102066'),
(67, 70, 'Kid Latestt', '2009-12-06', 2676, 'testghgf', 'testsghjhgj', 'testfgv', 'testdfhjghj', 'testghjg', '1236549875', 70, 70, '2017-03-31 03:50:18', '2017-04-03 11:15:38', '1', 'CK6102067'),
(70, 187, 'ABCD', '2010-06-08', 2489, 'cfsdf', 'sdfsd', 'sdfs', 'sdfdf', 'sdfsdf', '3243245353', 187, 46, '2017-03-31 05:14:37', '2017-03-31 06:55:05', '1', 'CK6102066');

-- --------------------------------------------------------

--
-- Table structure for table `manage_service`
--

CREATE TABLE IF NOT EXISTS `manage_service` (
  `id` int(11) NOT NULL,
  `service_provider_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `business_phone` varchar(15) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `full_desc` longtext NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `location` varchar(225) NOT NULL,
  `service_image` text NOT NULL,
  `service_video` text NOT NULL,
  `status` enum('0','1','2') NOT NULL COMMENT '''0''=>notactive,''1''=>active,''2''=>deleted',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_service`
--

INSERT INTO `manage_service` (`id`, `service_provider_id`, `title`, `business_phone`, `contact_email`, `website`, `description`, `full_desc`, `state_id`, `city_id`, `location`, `service_image`, `service_video`, `status`, `created_at`) VALUES
(1, 3, 'tesst', '6756453423', 'mikl@gmai.com', 'Http://peri.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 131, 10701, 'Hawaii National Park', '1463117342Penguins.jpg', '1463483038dummy_new.mp4', '1', '2016-05-18 10:03:50'),
(2, 7, 'Numerology', '7687564543', 'abc@yopmail.com', 'https://www.google.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy.', 126, 8569, 'California', '1463565322Chrysanthemum.jpg', '1463565474dummy_new.mp4', '1', '2016-05-18 15:27:54'),
(3, 4, 'dgfhg', '6768788757', 'mikl@gmai.com', 'https://www.google.com', 'ygjhhyy', 'jhkkkkkkkkkkkkh', 126, 8568, 'fgh', '3783a7da6844ff85abb0332a40cc9ef6_thumb.jpg', '1465562765dummy_video.mp4', '1', '2016-06-21 17:42:26'),
(4, 9, 'Test services', '9999999999', 'archana@tekshapers.com', 'http://www.gmail.com', 'sfsfsf', 'sfsfs', 123, 7453, 'sfsf', 'test.txt', '14642425041104_143-web.jpg', '1', '2016-05-26 11:31:44'),
(5, 18, 'Title', '9898989898', 'test@yopmail.com', 'http://www.gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includ', 132, 11112, '56, sec 67', '1464278689Tulips.jpg', '', '1', '2016-05-26 21:34:49'),
(6, 5, 'title', '9898989978', 'binny1393@gmail.com', 'Http://peri.com', 'Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen', 'Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 126, 8566, 'test, 78', '81824cc10c140cf9b205ee81293629b8_thumb.jpg', '1465563061SampleVideo_1280x720_5mb.mp4', '1', '2016-06-21 14:32:19'),
(7, 23, 'wewtrr', '1123455655', 'priya1234@yopmail.com', 'http://google.com', 'Rolfergregg1Rolfergregg1Rolfergregg1Rolfergregg1Rolfergregg1', 'Rolfergregg1Rolfergregg1Rolfergregg1Rolfergregg1Rolfergregg1Rolfergregg1Rolfergregg1Rolfergregg1Rolfergregg1', 133, 11740, 'test', '', '', '1', '2016-06-29 10:57:42'),
(8, 24, 'werru', '1234567777', 'testrh@we.com', 'Http://peri.com', 'test rahul test rahul test rahul test rahul', 'test rahultest rahultest rahultest rahultest rahultest rahultest rahultest rahultest rahultest rahul', 134, 11838, 'ewww', '333074805ea1c59bb097f7e274e4c746_thumb.jpg', '', '1', '2016-06-29 11:47:32'),
(9, 26, 'naura', '1234567894', 'naura@yopmai.com', 'Http://peri.com', 'testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality', 'testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality  testing functionality', 132, 11112, 'Georgia, Alston', '1467615381square_1.jpg', '1467615381SampleVideo_1080x720_1mb.mp4', '1', '2016-07-04 12:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `parents_detail`
--

CREATE TABLE IF NOT EXISTS `parents_detail` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `father_job_desc` varchar(255) NOT NULL,
  `father_contact` varchar(20) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `mother_job_desc` varchar(255) NOT NULL,
  `mother_contact` varchar(20) NOT NULL,
  `emergency_no` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents_detail`
--

INSERT INTO `parents_detail` (`id`, `parent_id`, `father_name`, `father_job_desc`, `father_contact`, `mother_name`, `mother_job_desc`, `mother_contact`, `emergency_no`, `created_date`, `modified_date`) VALUES
(1, 64, 'tek', 'tek', '888888888888', 'tek', 'tek', '888888888888', '888888888888', '2017-03-02 10:12:30', '2017-03-02 10:12:30'),
(2, 65, '', '', '', '', '', '', '', '2017-03-02 10:35:43', '2017-03-02 10:35:43'),
(3, 68, '', '', '', '', '', '', '', '2017-03-02 03:51:33', '2017-03-02 03:51:33'),
(4, 70, 'vbvb', 'bcbc', '456464', 'cddgfdd', 'YRTYTY', '45645645', '5645645', '2017-03-08 05:21:09', '2017-03-28 10:19:25'),
(5, 132, '', '', '', '', '', '', '', '2017-03-17 03:32:57', '2017-03-17 03:32:57'),
(6, 181, 'Raj', 'Developer', '9876543210', 'Priyanka', 'Workking', '98765432104', '456465657657', '2017-03-30 12:25:30', '2017-03-30 12:25:30'),
(7, 187, 'Test', 'Test Job', '865858588888', 'Test Mother', 'jgjjgjg', '757575785875', '747554656565', '2017-03-31 01:17:42', '2017-03-31 01:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL,
  `module` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module`) VALUES
(1, 'Manage city'),
(2, 'manage area'),
(3, 'manage roles'),
(4, 'manage user'),
(5, 'social media links'),
(6, 'manage vendor'),
(7, 'manage parents'),
(8, 'appointment schedule'),
(9, 'manage invoice'),
(10, 'manage notice'),
(11, 'vendor change request'),
(12, 'manage ratings'),
(13, 'manage tesimonial'),
(14, 'chat');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `permissions` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '"1"=>Active,"2"=>Inactive',
  `is_deleted` enum('1','2') NOT NULL DEFAULT '1' COMMENT '''1''=>''Not Deleted'',''2''=>''Deleted'''
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_by`, `modified_by`, `created_date`, `modified_date`, `status`, `is_deleted`) VALUES
(1, 'HR Manager', '1,2', 1, 2, '2016-03-17 00:00:00', '2017-01-31 11:54:32', '1', '1'),
(14, 'system admin', '1,2,4,6', 46, 0, '2017-03-23 08:54:24', '0000-00-00 00:00:00', '1', '1'),
(9, 'Developers', '1', 46, 46, '2017-03-20 12:34:39', '2017-03-22 11:11:35', '2', '1'),
(15, 'Tester', '1,2,3,4,5,6,7,8,9,10,11,12,13,14', 46, 0, '2017-03-27 04:01:26', '0000-00-00 00:00:00', '1', '1'),
(16, 'abhaewrwe', '', 46, 46, '2017-03-27 05:41:38', '2017-03-27 05:41:54', '1', '1'),
(19, 'Sub Admin', '3,4,5,6,7,8,9,10,11,12,13,14,15', 46, 46, '2017-03-28 01:37:55', '2017-03-29 04:31:34', '1', '1'),
(21, 'IT Admin', '3,4,5,6,7,8,9,10,11,12,13,14', 46, 0, '2017-03-29 04:23:09', '0000-00-00 00:00:00', '1', '1'),
(22, 'Analysts', '', 46, 46, '2017-03-30 11:30:56', '2017-03-30 11:31:21', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Day Care', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Pre School', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Nanny Assistance', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Hourly day care on demand', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Flexible and customized day care', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Extra circular acitivies package', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Customized kid fun package', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Customized kids learning and development package', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia_sites`
--

CREATE TABLE IF NOT EXISTS `socialmedia_sites` (
  `id` int(11) NOT NULL,
  `site_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socialmedia_sites`
--

INSERT INTO `socialmedia_sites` (`id`, `site_name`, `status`, `link`, `created_by`, `modified_by`) VALUES
(1, 'Facebook', 'inactive', 'https://www.facebook.com/1', 0, 0),
(3, 'Linkedin', 'active', 'https://in.linkedin.com/', 0, 0),
(5, 'Google Plus+', 'active', 'https://www.google.co.in/', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1=>Pending,2=>DisApprove,3=>Approve',
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `parent_id`, `description`, `status`, `created_by`, `modified_by`, `created_date`, `modified_date`) VALUES
(51, 50, 'Never before has there been a good film portrayal of ancient Greece''s favourite myth. So why would Hollywood start now? This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner. If the name of the director wasn''t enough to dissuade This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner', '3', 50, 0, '2017-03-02 01:13:22', '0000-00-00 00:00:00'),
(52, 69, 'Never before has there been a good film portrayal of ancient Greece''s favourite myth. So why would Hollywood start now? This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner. If the name of the director wasn''t enough to dissuade This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner', '3', 69, 0, '2017-03-02 03:23:08', '0000-00-00 00:00:00'),
(56, 68, 'description', '2', 68, 0, '2017-03-02 04:43:34', '0000-00-00 00:00:00'),
(58, 46, 'Never before has there been a good film portrayal of ancient Greece''s favourite myth. So why would Hollywood start now? This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner. If the name of the director wasn''t enough to dissuade This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner', '2', 46, 0, '2017-03-07 09:50:33', '0000-00-00 00:00:00'),
(62, 74, 'Never before has there been a good film portrayal of ancient Greece''s favourite myth. So why would Hollywood start now? This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner. If the name of the director wasn''t enough to dissuade This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner', '3', 74, 0, '2017-03-07 12:22:44', '0000-00-00 00:00:00'),
(64, 70, 'Never before has there been a good film portrayal of ancient Greece''s favourite myth. So why would Hollywood start now? This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner. If the name of the director wasn''t enough to dissuade This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner', '3', 70, 0, '2017-03-09 01:09:41', '0000-00-00 00:00:00'),
(66, 103, 'Never before has there been a good film portrayal of ancient Greece''s favourite myth. So why would Hollywood start now? This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner. If the name of the director wasn''t enough to dissuade This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner', '3', 103, 0, '2017-03-10 11:33:17', '0000-00-00 00:00:00'),
(74, 137, 'monika testmonial', '3', 137, 0, '2017-03-22 09:50:53', '0000-00-00 00:00:00'),
(75, 165, 'Description added by rishabh sharma', '1', 165, 0, '2017-03-28 09:45:46', '0000-00-00 00:00:00'),
(77, 181, 'my testimonial', '2', 181, 0, '2017-03-30 12:44:35', '0000-00-00 00:00:00'),
(79, 179, 'Description Description', '1', 179, 0, '2017-03-30 01:29:44', '0000-00-00 00:00:00'),
(80, 187, 'Test', '3', 187, 0, '2017-03-31 01:08:45', '0000-00-00 00:00:00'),
(81, 184, 'my test', '1', 184, 0, '2017-03-31 01:28:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `user_name` varchar(300) COLLATE utf8_bin NOT NULL,
  `first_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `contact_number` varchar(15) COLLATE utf8_bin NOT NULL,
  `address` text COLLATE utf8_bin NOT NULL,
  `profile_image` varchar(250) COLLATE utf8_bin NOT NULL,
  `business_name` varchar(150) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `salt` varchar(150) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `status` enum('active','inactive','archieve') COLLATE utf8_bin NOT NULL DEFAULT 'inactive',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `user_type` enum('1','2','3','4') COLLATE utf8_bin NOT NULL COMMENT '1=>Admin,2=>Subadmin,3=>Parents,4=>Vendor',
  `email_verify` enum('0','1') COLLATE utf8_bin NOT NULL,
  `is_delete` enum('0','1') COLLATE utf8_bin NOT NULL COMMENT '0=>notdeleted,1=>deleted',
  `city_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `oauth_provider` varchar(20) COLLATE utf8_bin NOT NULL,
  `role_id` int(11) NOT NULL,
  `unique_id` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT 'This id exists only for parents',
  `permissions` text COLLATE utf8_bin NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `term` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=194 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `added_by`, `user_name`, `first_name`, `last_name`, `contact_number`, `address`, `profile_image`, `business_name`, `password`, `salt`, `email`, `status`, `created`, `modified`, `last_login`, `user_type`, `email_verify`, `is_delete`, `city_id`, `area_id`, `oauth_provider`, `role_id`, `unique_id`, `permissions`, `created_by`, `modified_by`, `term`) VALUES
(46, 1, 'spadmin', 'spadmin', 'spadmins', '8287760833', '', '1490612920Koala.jpg', '', '3025jON72BzM9hxMujmfw8blj8oXqRNNqbEtObQlmu6ol8gN4G.db2yFZmnhajmhlh4TBvx4jJTsa/1BR..Wm1', '$6$rounds=5000$MmYxMjk5MDdk$', 'spadmin@gmail.com', 'active', '0000-00-00 00:00:00', '2017-03-30 03:03:55', '0000-00-00 00:00:00', '1', '', '', 0, 0, '', 0, '', '', 0, 0, 0),
(103, 0, '', 'pri', 'sharma', '8287760833', 'noida', '', '', 'i2dI/mvSYKRDg0usBhqyhgAx1fcxXZwPQRDTytylgGPaTErmEC96Rck8obDHgtZ3pkFkyLMtKhBveC0afqpL40', '$6$rounds=5000$MWIzNzk2YmMz$', '', 'active', '2017-03-10 11:31:02', '0000-00-00 00:00:00', '2017-03-10 11:31:02', '4', '0', '0', 17, 12, '', 0, 'CP6102028', '', 0, 0, 0),
(84, 0, 'test', 'ansh', 'singh', '5765675863', '', '', '', '3025jON72BzM9hxMujmfw8blj8oXqRNNqbEtObQlmu6ol8gN4G.db2yFZmnhajmhlh4TBvx4jJTsa/1BR..Wm1', '$6$rounds=5000$MmYxMjk5MDdk$', 'abha1@tekshapers.com', 'active', '2017-03-09 12:34:29', '2017-03-31 02:39:01', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 84, 0),
(79, 0, 'test', 'ansh', 'singh', '9876543210', '', '', '', 'imfX8rDYPPviUvf7uNe0j4RJ980jWJDlmVZz7X.pnteVxU6LXMdcue/XWTJg4V49tcFvWInEpUtthtqZ0AMJs/', '$6$rounds=5000$YjY2MmVjOTIy$', '', 'active', '2017-03-08 12:11:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(68, 0, 'Abha', 'Abha', 'Singh', '9876543213', 'noida', '1488450093Chrysanthemum.jpg', '', 'imfX8rDYPPviUvf7uNe0j4RJ980jWJDlmVZz7X.pnteVxU6LXMdcue/XWTJg4V49tcFvWInEpUtthtqZ0AMJs/', '$6$rounds=5000$YjY2MmVjOTIy$', 'abh1a@tekshapers.com', 'active', '0000-00-00 00:00:00', '2017-03-27 12:39:38', '2017-03-02 13:36:40', '4', '0', '0', 11, 20, 'facebook', 0, '', '', 0, 0, 0),
(70, 0, '', 'Archana', 'Arora', '5465555555', 'Delhi', '1490676377Chrysanthemum.jpg', '', 'Oon5KUo9YUHNQAgoW/QtIR2.v9pX6l78oG8w9HSU7gEghe7H14p59mdkOIAr41KL/DafGX5Crt3ms59Bjlf5U/', '$6$rounds=5000$MzZlNmY2ZDY4$', 'archana@tekshapers.com', 'active', '2017-03-03 18:39:59', '2017-03-28 10:19:25', '2017-03-03 18:39:59', '3', '0', '0', 16, 18, '', 0, 'CP6102023', '', 0, 0, 0),
(98, 0, '', 'archana34', 'arora234', '5434535353', '', '', '', 'XOFEWEGcJ.JQMH5.tx3GHmBmQFTYKWLVS129b.BZIBGlTlmKF9cov4gRRL1B/hipWrOc0UvQ/1oTpqi6eZibg1', '$6$rounds=5000$NTY0YmUzYmMz$', 'archana@yopmail.com', 'active', '2017-03-09 18:13:35', '0000-00-00 00:00:00', '2017-03-09 18:13:35', '2', '0', '0', 0, 0, '', 1, '', '4,5', 0, 0, 0),
(75, 0, 'abha', 'ansh', 'singh', '888888888', '', '', '', '', '', 'nidhi@gmail.com', 'active', '2017-03-07 02:34:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(76, 0, 'ansh', 'ansh', 'ansh', '22222222', '', '', '', 'xeJwz.25Sokb395CT715gxCixB5lfnru9C6JGkOunZ50/Te5PQjlQlSs5tNusxrBsXyhjCxad.X2hWzPVOV2F1', '$6$rounds=5000$MDEyOWU1MjU4$', '', 'active', '2017-03-07 03:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(80, 0, '', 'ansh', 'singh', '', '', '', '', 'uVe9XZaPwJ5zIC09Fr3ze7NkzFeyrzjczbWFrsQ5QsWOoAapJ4yfMPVy4DTObuyB7F327apQmDtjDdumU9Dud0', '$6$rounds=5000$MzRlZWI3ZDg3$', '', 'inactive', '2017-03-08 12:22:49', '2017-03-09 04:48:26', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(108, 0, '', 'abha', 'sharma', '1234567898', '', '', '', '', '', 'abhasharmaasas10694@gmail.comsad', 'inactive', '2017-03-10 14:31:56', '0000-00-00 00:00:00', '2017-03-10 14:31:56', '2', '0', '0', 0, 0, 'googlePlus', 1, 'CP6102030', '4,5', 0, 0, 0),
(85, 0, 'tekshapers', 'ansh', 'singh', '66', '', '', '', 'hSwBbMcTbiGLdvmWyPAONkl2foaI0zJWKTNYvxsWuZjlvBztcnEh94OGLkH0jpiovMMShQ.qvFVsYZguO3wr8/', '$6$rounds=5000$NGY0YWNjMDEx$', 'tek@gmail.com', 'active', '2017-03-09 12:35:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(110, 0, 'dfgbf', 'khushboo', 'singh', '3243333333', '', '', '', 'he5T0rhq.X.r0JFv9b3cKwNe/M.gZp9IBIZd4L/7cjkIzrw0L1THV27DnxWWnvv5DrngQVRYB71vHEC3FBlWt0', '$6$rounds=5000$Nzk3ZTRmOTE2$', 'abha.aqusdfsdfsdfajar@gmail.comsfdsz', 'inactive', '2017-03-10 04:17:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(88, 0, 'sfsdf', 'ansh', 'singh', '6756753535', '', '', '', '2CiQeY2ExfnwI9XTtG7cRW6kR6jXs6OL0ee.iu0S6QPiurPm0QF493p49b7eo41CTzjETfbeLNCO3kbSYYM8z/', '$6$rounds=5000$OTI0NmU3MDQ1$', 'dsfd@ddfgdfh.ghgh', 'active', '2017-03-09 12:38:00', '2017-03-31 05:09:53', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 46, 0),
(89, 0, 'sonam', 'ansh', 'singh', '980', '', '', '', 'UEwYtnPK/J1O/vviX62WtxWOBayIlwVhaqr/xillAE4g..1skXK29ot49BoiKlBVZpq2RMOt0AveY8XLGhuqh/', '$6$rounds=5000$MmVkYTYyY2Ji$', 'sonam@gmail.com', 'active', '2017-03-09 12:39:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(90, 0, 'kajal', 'khushboo', 'singh', '9880980454', '', '', '', 'ZLZNHvLZVQyi7vqkObDsYbmiQQ0KJThPKKfP3e18TWTUE8fN9hlkFDqxLsED8sSztES31XHOqRZIIWkzqrY9h1', '$6$rounds=5000$ZjUxZmUzY2I3$', 'kajal@gmail.com', 'active', '2017-03-09 12:40:47', '2017-03-10 11:47:46', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(113, 0, 'Dharmendra', 'khushboo', 'singh', '9898989898', '', '', '', 'SJCUcg/SHwYOaLhBORMSr5WU76IHkF5Rfj.U5FWqMjd59FYOITpH1G5/Dz7TYcPnK1l4cmXk.N6pVXli.GuSo.', '$6$rounds=5000$NjJlMWQ4NjEy$', 'dharmendra@tekshapers.com', 'archieve', '2017-03-10 05:13:45', '2017-03-27 06:33:31', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 46, 0),
(74, 0, 'Kidzee', 'Kidzee', 'Kidzee', '9880980454', '', '', '', 'ZLZNHvLZVQyi7vqkObDsYbmiQQ0KJThPKKfP3e18TWTUE8fN9hlkFDqxLsED8sSztES31XHOqRZIIWkzqrY9h1', '$6$rounds=5000$ZjUxZmUzY2I3$', 'trisha@yopmail.com', 'active', '2017-03-10 12:11:15', '2017-03-15 03:21:44', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(143, 0, 'IPSA', '', '', '9876543213', '', '', '', 'LIZjwcDkp5ElHH5iRa7oMkJafUhmH7spcx8LpaqjlTl3xAwIUX5.sg5pxgn.MDumGrNsRFASX1epQzRxmtMDj.', '$6$rounds=5000$ZWNlYTRiYjU4$', 'ipsa@gmail.com', 'active', '2017-03-23 10:06:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(178, 0, '', 'suman', 'vermas', '9876543210', '', '', '', '3G/7WT3vtBdEbRyfzH..i9DpfjBDHRmc8LqtdMkModbZLJtlc8kzd.augrR1phKB83mC5NOO9hNosWDd/bYMt0', '$6$rounds=5000$Nzg2NWI3Mzcz$', 'suman@yopmail.com', 'active', '2017-03-29 15:58:58', '0000-00-00 00:00:00', '2017-03-29 15:58:58', '2', '0', '0', 0, 0, '', 19, '', '3,4,5,6,7,8,9,10,11,12,13,14,15', 46, 46, 0),
(50, 0, 'trishali', 'neha', 'singh', '9898989898', '', '', '', 'U6jeLQFBYIUaB0TWmlLIQNBBZCC6V1OruTqlUuyqsuoInskTKhZduYQbLALj.GHumKAJY8VAkOWRwNpjgDbwP1', '$6$rounds=5000$YmVjMDA4NGE0$', 'trishali@tekshapers.com', 'active', '2017-03-10 04:06:07', '2017-03-10 04:12:56', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(111, 0, 'wedsdf', 'kusum', 'singh', '9800980980', '', '', '', '8JtA7aw2iwV9oOMDQMGGCOOiHNJsb1G2wEWBu2XKYMcm96v/U59Nf1jc8jXBoeuC.VoLlfo5NfJBR9rK2zAnJ0', '$6$rounds=5000$ZjYyODBmYjVi$', '', 'inactive', '2017-03-10 04:20:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(118, 0, 'santosh', 'kanchan', 'singh', '7503883201', '', '', '', 'Pa79GJ9H09OkYEliZuhUzv.d/uAy9DWjw6xt4eaaD7A44SPNzhnNFqwZWh2M1SeI1emp5nGPwQ.dS6uE51l9b1', '$6$rounds=5000$Mjg3NGU4OWMx$', 'santosh121290@gmail.com', 'inactive', '2017-03-10 05:46:37', '2017-03-10 05:54:49', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(119, 0, 'Little Valley', 'sonal', 'singh', '4444455555', '', '', '', '/ezI67wBp0kELTiP.9dF.kBZsUVrga5orGPl74u971shIkGRe/a83Dil7nray3qcR1aOeUYlVST5jwgF.oPih0', '$6$rounds=5000$YWM5YTRkY2Jh$', 'little@yopmail.com', 'active', '2017-03-10 05:46:47', '2017-03-21 11:10:48', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(128, 0, 'Ankit', 'Ankit', 'singh', '9876543210', '', '', '', 'i2dI/mvSYKRDg0usBhqyhgAx1fcxXZwPQRDTytylgGPaTErmEC96Rck8obDHgtZ3pkFkyLMtKhBveC0afqpL40', '$6$rounds=5000$MWIzNzk2YmMz$', 'ankit@tekshapers.com', 'active', '2017-03-17 01:21:08', '2017-03-21 05:39:51', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(120, 0, 'santosh', 'shiv', 'singh', '7503883201', '', '', '', 'cU.eSPGj6TfejtwXxdjfG0Ou0NCRbD1usZAshtWGXeHSWJI8gW6SCZnQQIByU3ZPVTQqyqT8ceYJ0NO51EWhy/', '$6$rounds=5000$M2Y3NmUyZmJl$', 'santosh@tekshapers.com', 'active', '2017-03-10 06:03:15', '2017-03-21 11:14:56', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(121, 0, 'naresh kumar', 'punam', 'singh', '1111111111', '', '', '', 'f/doUyRkmVrNEfFweLooDpSArmJbEWSJdmCkr8qEFxPZCjWmsHtMCnfbekjAQrc6V/Dx3Jnp6ZmP7pt1436xm.', '$6$rounds=5000$YmEyOTQ4YzVm$', 'santoshdsdsd@yopmail.com', 'active', '2017-03-10 06:11:36', '2017-03-21 11:16:25', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(122, 0, 'sumit', 'puja', 'singh', '1111111111', '', '', '', 'JHlw9BIj5ebResECCrrOplVlHcMxIVWdDiE0M9X9B4JHKlrW/8NjoWeDXCGwGF3NW4Mz0Y2YdxTELP2MRaohR0', '$6$rounds=5000$YzllZWQ0MzRi$', 'sumit@tekshapers.com', 'active', '2017-03-10 06:18:04', '2017-03-21 11:17:27', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(123, 0, 'szfdszf', 'kajal', 'singh', '4444444444', '', '', '', 'ZLZNHvLZVQyi7vqkObDsYbmiQQ0KJThPKKfP3e18TWTUE8fN9hlkFDqxLsED8sSztES31XHOqRZIIWkzqrY9h1', '$6$rounds=5000$ZjUxZmUzY2I3$', 'kajal@tek.com', 'active', '2017-03-15 10:35:52', '2017-03-21 11:23:20', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(127, 0, 'Choice', 'shakshi', 'singh', '9868041710', '', '', '', '70Cg8aZRepWdowiUdB6N0feAMN2UaXBNgs3.U8HwktD7eWHXniHuYpTBHL3PXahTFsT6qEu1vnZQSePiBnlVd/', '$6$rounds=5000$YzMzZGQ0NmFi$', 'archi@yopmail.com', 'active', '2017-03-17 11:52:58', '2017-03-22 12:42:24', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(69, 0, 'sneha', 'sneha', 'singh', '8287760833', 'fdgg', '', '', 'YPKZKP2e5veZCzkPi4gTK/Zwh4QGSEKeU0VAcllblNVX0G600pnHhIWTORJa9rQe9mA098X4YLfgou3vA58cE/', '$6$rounds=5000$M2JmNjgxODgx$', 'dfgdfg@gtdfg.fgfdg', 'archieve', '2017-03-17 15:25:45', '2017-03-22 11:44:00', '2017-03-17 15:25:45', '3', '0', '0', 17, 21, '', 0, 'CP6102029', '', 0, 0, 0),
(126, 0, 'neha', 'sdfvdf', 'singh', '8287760833', '', '', '', 'kTDQlnmstz2o8a2SKaftLgu20g/0L7TdLNVO.UOnA8w7I.JDaKBpJNew4mH40fgwjW4Hp6TH.34yepdgwgXVQ1', '$6$rounds=5000$MDc0ZDU5OTFi$', 'neha@gmail.com', 'active', '2017-03-17 11:25:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(141, 0, '', 'samyra', 'rai', '1252789654', 'test', '', '', 'H6Ebv2iFY6tla/1JbILZWKFhboeogTiRCwouwHqxWl2Gv1CnQJpPI4eCRnYh7m.9VusknRQGvMmyjsGdK34L5/', '$6$rounds=5000$NTM1MjM1NzEw$', 'samyra@yopmail.com', 'active', '2017-03-22 18:26:49', '2017-03-23 08:26:15', '2017-03-22 18:26:49', '3', '0', '0', 17, 20, '', 0, 'CP6102035', '', 0, 0, 0),
(151, 0, '', 'kanchan', 'sharma', '8287760833', '', '', '', 'CjEIfwdtJcxnksZYrhBmwmCpQcSdK78IR0qsNHcZyYUNF7AI3Dc7KTsHBXndubAWDAVU40Xd0HV0A2lm8hMqb.', '$6$rounds=5000$MWQ0ODA5ODc5$', 'kan11@gmail.com', 'active', '2017-03-27 11:22:26', '0000-00-00 00:00:00', '2017-03-27 11:22:26', '2', '0', '0', 0, 0, '', 1, '', '4,5', 0, 0, 0),
(168, 0, '', 'abha', 'sharma', '', '', '', '', '', '', 'abhasharma1d0694@gmail.com', 'active', '2017-03-28 09:50:01', '0000-00-00 00:00:00', '2017-03-28 09:50:01', '3', '0', '0', 0, 0, 'linkedin', 0, 'CP6102044', '', 0, 0, 0),
(169, 0, '', 'himanshu', 'jha', '8882759740', '', '', '', 'dqc58RZj.7YkEfYUwvQB4f6PIHdUEs4smRnCT4zUilJFdncraijxccCi7PjL0U6lFsFCGeyl19lPxIbIXVIS6.', '$6$rounds=5000$MWRjMmVjN2Q5$', 'abhasharmaf10694@gmail.comdf', 'active', '2017-03-28 09:52:21', '0000-00-00 00:00:00', '2017-03-28 09:52:21', '2', '0', '0', 0, 0, '', 1, '', '1,2', 46, 46, 0),
(134, 0, '', 'fghgfh', 'gtdfg', '3453454544', '', '', '', 'BYUBgRYfczb57uozazzhT8RC87y9MdVYRy5sZYOUOPiG0eTbI1ZFSXbL/DX1p.bQXYWn3WzL7AGdZ8SeebDrz.', '$6$rounds=5000$ODJiMzJmNjEz$', 'abhishaxcxvrma94@gmail.com', 'inactive', '2017-03-20 13:24:17', '0000-00-00 00:00:00', '2017-03-20 13:24:17', '2', '0', '0', 0, 0, '', 1, '', '4,5', 0, 0, 0),
(137, 0, '', 'monikasdfsdfs', 'singh', '8287760833', 'noida', '', '', 'BYUBgRYfczb57uozazzhT8RC87y9MdVYRy5sZYOUOPiG0eTbI1ZFSXbL/DX1p.bQXYWn3WzL7AGdZ8SeebDrz.', '$6$rounds=5000$ODJiMzJmNjEz$', 'monika@gmail.com', 'active', '2017-03-22 09:42:52', '2017-03-22 11:44:05', '2017-03-22 09:42:52', '3', '0', '0', 17, 21, '', 0, 'CP6102030', '', 0, 0, 0),
(167, 0, '', 'abha', 'sharma', '', '', '', '', '', '', 'abhasharma10694@gmail.com1ds', 'active', '2017-03-28 09:48:49', '0000-00-00 00:00:00', '2017-03-28 09:48:49', '3', '0', '0', 0, 0, 'googlePlus', 0, 'CP6102043', '', 0, 0, 0),
(182, 0, '', 'aditya', 'singh', '9876543210', '', '', '', 'iJ70ulOFwpnducOf6IuN4PC/cIfWnC2dPjb9WK/abNskovEJghJF7Q7aFew0zpPGLFaOm6uwjgGOGTQyN1qtE1', '$6$rounds=5000$MTI0ZTFmNDM5$', 'aditya@tekshapers.com', 'active', '2017-03-30 13:35:14', '0000-00-00 00:00:00', '2017-03-30 13:35:14', '2', '0', '0', 0, 0, '', 1, '', '1,2', 46, 0, 0),
(148, 0, '', 'suman', 'singh', '8287760833', '', '', '', 'S50Ppl.i6t8PlciuQdqOC171y1rhItNGUccznQDbDd9iH/.maZFzUxY8I50lKXYrE30.13V7c8p9wmWWTrU9f.', '$6$rounds=5000$MmRlZmRmN2Vk$', 'suman@gmail.com', 'active', '2017-03-24 18:46:47', '0000-00-00 00:00:00', '2017-03-24 18:46:47', '2', '0', '0', 0, 0, '', 1, '', '4,5', 0, 0, 0),
(150, 0, '', 'neha', 'singh', '8287760833', '', '', '', 'ldn6zxbpy81xfi7EEXJbCwzme1v5gdQkwry./.lcU6xl6xXNhPuicIwLsy/Yx1eZ6RXweum9nol03K2PjveIX1', '$6$rounds=5000$ZDY1NjFlZWZm$', 'neha123@gmail.com', 'active', '2017-03-27 11:16:37', '0000-00-00 00:00:00', '2017-03-27 11:16:37', '2', '0', '0', 0, 0, '', 14, '', '1,2,4,6', 0, 0, 0),
(152, 0, 'akash', '', '', '8287760833', '', '', '', 'ZLZNHvLZVQyi7vqkObDsYbmiQQ0KJThPKKfP3e18TWTUE8fN9hlkFDqxLsED8sSztES31XHOqRZIIWkzqrY9h1', '$6$rounds=5000$ZjUxZmUzY2I3$', 'akash@gmail.com', 'active', '2017-03-27 02:37:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 0, 0, 0),
(153, 0, '', 'riya', 'pandey', '8287760833', '', '', '', 'yHCZUeKP794Y0iW6FY3VIOEFJsUELeEzGKYK6oOx2G5UwP.roHJskI93m8oJK2L15hyJyD902T84SDW57sO.D.', '$6$rounds=5000$NjZkNjRmOGFm$', 'riya@gmail.com', 'active', '2017-03-27 15:32:42', '0000-00-00 00:00:00', '2017-03-27 15:32:42', '2', '0', '0', 0, 0, '', 14, '', '1,2,4,6', 0, 0, 0),
(154, 0, '', 'shivangi', 'singh', '8287760833', '', '', '', 'n785J1eOqndQIqQbrn9Tf1dRpdsNAk6PgQpje7xnQ.87ItLGa3B5zjOElC76157oj8h9mFvuhYMrt7JR.KRUN.', '$6$rounds=5000$YzI4OTIzNTVj$', 'shivangi@gmail.com', 'active', '2017-03-27 15:40:09', '0000-00-00 00:00:00', '2017-03-27 15:40:09', '2', '0', '0', 0, 0, '', 1, '', '1', 0, 0, 0),
(155, 0, '', 'manish', 'sharma', '9876543210', '', '', '', 'ZgxIOTSdVhAfZuLL2iVzQp1aLD.ytrXm9LHxjyjluyx5jQFY2Tb/i3lsFezxp41nkPCqiNLg2x1GkASivTLbG0', '$6$rounds=5000$NDUzYmFhYWVh$', 'manish@yopmail.com', 'active', '2017-03-27 16:02:21', '0000-00-00 00:00:00', '2017-03-27 16:02:21', '2', '0', '0', 0, 0, '', 15, '', '1,2,3,4,5,6,7,8,9,10,11,12,13,14', 0, 0, 0),
(156, 0, '', 'Aditya11111', 'Rathi', '8287760833', 'noida', '', '', '', '', 'aditya.php4u@gmail.com', 'active', '2017-03-27 16:11:19', '2017-03-27 05:48:38', '2017-03-27 16:11:19', '3', '0', '0', 17, 20, 'linkedin', 0, 'CP6102038', '', 0, 46, 0),
(157, 0, '', 'suman1', 'singh', '8287760833', '', '', '', '7efCwRPWL6wkEvPOeCKPoIHz.XgEV7f525Qg9SJqa06tBrOPSlvzKtf2iLCrjDn49YjGnjxpkCuYzg.1HbPAG.', '$6$rounds=5000$YmZhYjMyMGI1$', 'suman1@gmail.com', 'active', '2017-03-27 17:38:16', '0000-00-00 00:00:00', '2017-03-27 17:38:16', '2', '0', '0', 0, 0, '', 1, '', '1,2', 0, 0, 0),
(158, 0, '', 'retret', 'ewrwr', '8287760833', '', '', '', 'gV2oLeezpOQGSV5x23QEWAFWCZgaNpYvhIZR/o4P.F/ETjxWkhmrVMY88MvWGg6U2dv/0MbPanRASqcrL4Kyu/', '$6$rounds=5000$OTFkNGJhY2Zi$', 'abhishdfdarma94@gmail.com', 'active', '2017-03-27 17:41:18', '0000-00-00 00:00:00', '2017-03-27 17:41:18', '2', '0', '0', 0, 0, '', 14, '', '1,2,4,6', 0, 0, 0),
(159, 0, '', 'fdgf', 'ertfer', '8287760833', '', '', '', '5VIV0062/jOzDjvBuV15Jxom6bnlZC.3awaUN3JR/UiBYnyN1ArpGvjMDLugFOXnO444beBSQRl40ik1lHv/t0', '$6$rounds=5000$Y2M1MmEyYThm$', 'gfdgfabha@gmail.com', 'active', '2017-03-27 17:47:29', '0000-00-00 00:00:00', '2017-03-27 17:47:29', '2', '0', '0', 0, 0, '', 1, '', '1,2', 46, 46, 0),
(160, 0, 'g', '', '', '8287760833', '', '', '', 'NQr7GBca4.iUMKolpfkWyhI7Q3fWLMPT8qmj8wIJ5XwEVgxo6MdPZsyBasH6t0cAUkfFdk2R0ds3hoaa5HcyI/', '$6$rounds=5000$OTg5ZjdmOTEz$', 'g@gmail.com', 'active', '2017-03-27 05:50:29', '2017-03-27 05:55:03', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 46, 46, 0),
(162, 0, '', 'sandeep', 'tiwari', '8287760833', '', '', '', 'jwdZK4Mfirfv8nZSk/z3okbxVg6jD8spseLlYFxuaNsl6uRt1uIPvelB9WOZZAdE5BxaE4Wokz4BjY4OIaQxB0', '$6$rounds=5000$MWI0MGJmNDhl$', 'sandeep@gmail.com', 'active', '2017-03-27 18:21:36', '0000-00-00 00:00:00', '2017-03-27 18:21:36', '2', '0', '0', 0, 0, '', 1, '', '1,2', 46, 46, 0),
(163, 0, 'shivanshi', '', '', '8287760833', '', '', '', 'i2dI/mvSYKRDg0usBhqyhgAx1fcxXZwPQRDTytylgGPaTErmEC96Rck8obDHgtZ3pkFkyLMtKhBveC0afqpL40', '$6$rounds=5000$MWIzNzk2YmMz$', 'shivanshi@gmail.com', 'active', '2017-03-27 06:26:13', '2017-03-27 06:30:01', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 46, 46, 0),
(164, 0, '', 'aditya', 'kumar', '9876543210', '', '', '', '3mNgALhx6mF5s8g3I//Htp9dgdvURbK1baNiTKcEkAzRv1Oc46cQCdmoHNOv/I9hhQmT6UY2FmuUn8vh6Ya6U.', '$6$rounds=5000$OWIxYWZkZGY5$', 'aditya11@tekshaper.scom', 'active', '2017-03-27 18:48:50', '0000-00-00 00:00:00', '2017-03-27 18:48:50', '2', '0', '0', 0, 0, '', 1, '', '1,2', 46, 0, 0),
(165, 0, '', 'rishabha', 'sharma', '8287760833', 'kanpur', '', '', 'KMC6V5iRyM7aoUOjtjiubL/vKlfxCmglgWej/zc6rSogNC/6VIH7hU7NCTdcZMrU6gTEGlVyzTpKSqi32tnKs.', '$6$rounds=5000$ZmE1MDE2OWM4$', 'rishabh@gmail.com', 'active', '2017-03-28 09:40:44', '2017-03-28 10:19:53', '2017-03-28 09:40:44', '3', '0', '0', 16, 18, '', 0, 'CP6102041', '', 0, 46, 0),
(170, 0, '', 'aditya', 'rathi', '9876543210', 'test', '', '', 'm.l0owv/yh.o1BiWVrIYDwMMOewSr3inl7cxWBzQVQgQXEarRuPyEdF8hJEZHNR7/1pJ4klDTWaFzoM.cdAnr.', '$6$rounds=5000$NDE0YjY2Yzc0$', 'aditya33@gmail.com', 'active', '2017-03-28 12:06:14', '0000-00-00 00:00:00', '2017-03-28 12:06:14', '3', '0', '0', 16, 18, '', 0, 'CP6102045', '', 0, 0, 0),
(171, 0, '', 'priya', 'dwivedi', '1234567891', 'ewqe', '', '', 'XTJCimrWKgxx8kbK3zOzMDBGI8hZrSnmix4Y6VK/x7SHl/AZ6HvHoSFIfqXrrCVN6AtBc.KTjBmLo37SCFE690', '$6$rounds=5000$YzkwMTU0Y2Qw$', 'priyanka2914@gmail.com', 'active', '2017-03-28 12:18:28', '0000-00-00 00:00:00', '2017-03-28 12:18:28', '3', '0', '0', 29, 30, '', 0, 'CP6102046', '', 0, 0, 0),
(172, 0, 'santosh', '', '', '9599259757', '', '', '', 'L5c7RuekyJya9dZyeE58WGdU5oIQY62Iz8z3TSPmF5CVp6CpogPiJhHE3VBnIbBswy6FbBZEm2cx5O5Af8v9e.', '$6$rounds=5000$NGM4NWZjZmRj$', 'santosh@yopmail.com', 'active', '2017-03-28 01:31:54', '2017-03-28 02:47:12', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 46, 172, 0),
(175, 0, '', 'sneha', 'singh', '8287760833', '', '', '', 'AsQ44MgB/xT.8MAJMBGQIn/4VRcFLGKtd2QXuZQ3oH7xMgpg2YLcwHnQlSELOZebig5VOZypizipYtOF0u1h1/', '$6$rounds=5000$MTY1NjMzNTEz$', 'sneha@gmail.com', 'active', '2017-03-29 10:50:31', '0000-00-00 00:00:00', '2017-03-29 10:50:31', '3', '0', '0', 0, 0, '', 15, '', '1,2,3,4,5,6,7,8,9,10,11,12,13,14', 46, 46, 0),
(173, 0, '', 'priya', 'dwivedi', '1234567891', 'Near GIP', '', '', 'QrgPSnGUTD5b0EiM4CTv9fa/2Lzca/xbx9/pvIxauYc1g2vWQTQGXFnvxsVIMsTvFXUcWm6N49s6n4N1HGYFO0', '$6$rounds=5000$MTRmYmZiOGM2$', 'priya1@tekshapers.com', 'active', '2017-03-28 13:54:41', '0000-00-00 00:00:00', '2017-03-28 13:54:41', '3', '0', '0', 17, 20, '', 0, 'CP6102047', '', 0, 0, 0),
(174, 0, '', 'test subadmin', 'test', '1234567891', '', '', '', 'vha2ThYh7TcK8cTkTWCnsylh7jNIY.NMccC8kknrSZrfFSasnjP2nv3Dj0Mm10efUQr6dOH9Ana7oEcJH25h1/', '$6$rounds=5000$NDlkZGVmZWZj$', 'shiwangi@tekshapers.com', 'active', '2017-03-28 14:22:52', '0000-00-00 00:00:00', '2017-03-28 14:22:52', '2', '0', '0', 0, 0, '', 21, '', '3,4,5,6,7,8,9,10,11,12,13,14', 46, 46, 0),
(176, 0, 'sonu', '', '', '8287760833', '', '', '', 'i2dI/mvSYKRDg0usBhqyhgAx1fcxXZwPQRDTytylgGPaTErmEC96Rck8obDHgtZ3pkFkyLMtKhBveC0afqpL40', '$6$rounds=5000$MWIzNzk2YmMz$', 'sonu@gmail.com', 'active', '2017-03-29 01:01:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 46, 0, 0),
(177, 0, '', 'maya', 'singh', '8287760833', '', '', '', 'i2dI/mvSYKRDg0usBhqyhgAx1fcxXZwPQRDTytylgGPaTErmEC96Rck8obDHgtZ3pkFkyLMtKhBveC0afqpL40', '$6$rounds=5000$MWIzNzk2YmMz$', 'maya@gmail.com', 'active', '2017-03-29 13:14:30', '0000-00-00 00:00:00', '2017-03-29 13:14:30', '3', '0', '0', 0, 0, '', 1, '', '1,2', 46, 46, 0),
(179, 0, '', 'nitin', 'sharma', '8287760833', '11111', '', '', 'vnHex.Aqcjc/EPY8MfuZqiWlda0Eb.vyxQTp5svvT0cDb0Y2dp7fZZtyG0o9u3BoPx0niLeTMgZY5W/5Vrl3l.', '$6$rounds=5000$ZGQxOWRlNDgy$', 'abhashrtyarma10694@gmail.comtyrty', 'active', '2017-03-30 11:05:39', '0000-00-00 00:00:00', '2017-03-30 11:05:39', '3', '0', '0', 16, 18, '', 0, 'CP6102056', '', 0, 0, 0),
(180, 0, 'Mother Touch', '', '', '9898765410', '', '', '', 'oCV.jwseTXKPVn/IdERErXZ53llXObbOpU2RWPeE59Yo7mG33ovKt/qxJ63KvUEjTQKYmbxkU2.hPCv1Td0ji.', '$6$rounds=5000$Y2VkM2RhMzU2$', 'ankit.saxena52@gmail.com', 'active', '2017-03-30 11:49:47', '2017-03-31 03:29:37', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 46, 180, 0),
(189, 0, '', 'priya', 'dwivedi', '7865432196', '', '', '', 'FqoOnsDM6OCLgzCyQ2yw0QgVNYyLEykODUSf2HVLe6ctIvqIvy8oy5anym888OBasxpLl4eUX3NlftdEXcS6j0', '$6$rounds=5000$ZDAwZGE5ZmVj$', 'priya12@tekshapers.com', 'active', '2017-04-01 12:35:55', '0000-00-00 00:00:00', '2017-04-01 12:35:55', '2', '0', '0', 0, 0, '', 14, '', '1,2,4,6', 46, 0, 0),
(183, 0, 'payal', '', '', '8287760833', '', '', '', '3025jON72BzM9hxMujmfw8blj8oXqRNNqbEtObQlmu6ol8gN4G.db2yFZmnhajmhlh4TBvx4jJTsa/1BR..Wm1', '$6$rounds=5000$MmYxMjk5MDdk$', 'abhasharma10694@gmail.com', 'active', '2017-03-31 11:23:02', '2017-03-31 12:06:08', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 46, 46, 0),
(184, 0, '', 'abhap', 'sharma', '1234578945', '123', '', '', 'phjjqsdxDz3684eqY0b.Eo6v0W3O0Lf1TWMgrGU/DYH7iPVcaoaNPv9tsnIetAHNivyQe6e6FOxLXmvL3p2Xd0', '$6$rounds=5000$OWJkYzM4ZmY5$', 'abha1@tekshapers.com', 'active', '2017-03-31 11:28:38', '0000-00-00 00:00:00', '2017-03-31 11:28:38', '3', '0', '0', 16, 18, '', 0, 'CP6102061', '', 0, 0, 0),
(185, 0, '', 'poonam', 'ghgb', '8287760833', '', '', '', 'zUvJjqSpMsmXUFji/ZU.O2kGCSQe735KeXVVj0X9P3I9UXSY5vlD1Q5I07c.TKKWGzNfSwx6O8dCGi.f9chPu1', '$6$rounds=5000$MWQzN2ExMDc4$', 'abha.aquajar@gmail.com', 'active', '2017-03-31 11:36:49', '0000-00-00 00:00:00', '2017-03-31 11:36:49', '2', '0', '0', 0, 0, '', 1, '', '1,2', 46, 46, 0),
(188, 0, 'rtertertret', '', '', '8287760833', '', '', '', '2U38jb2l9vTDEIXA.z0fQmmrgI5/SFggZhl9uqE0080ZMlLOgpOEZqWGEvOar5QhW8xVmIyrNr4PTbw.ScRbO/', '$6$rounds=5000$YzUxNTBmOGRi$', 'abhaertertert@gmail.com', 'active', '2017-03-31 02:35:03', '2017-03-31 07:08:29', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 46, 46, 0),
(186, 0, '', 'Archana', 'Arora', '', '', '', '', '', '', 'archana15friends@gmail.com', 'active', '2017-03-31 12:48:06', '0000-00-00 00:00:00', '2017-03-31 12:48:06', '3', '0', '0', 0, 0, 'facebook', 0, 'CP6102063', '', 0, 0, 0),
(187, 0, '', 'suhana', 'sharma', '6565656565', 'R. K. Puram', '1490946462Hydrangeas.jpg', '', 'ttenAu8juSY2kKS2hwFDDsLJYde/xAx1v4zVq/.wE.WeFEuqXSU2LKpdQP7/KNMaNfcLOOX52g3triACgPjcw0', '$6$rounds=5000$NGViZDgwM2Yx$', 'suhanasharma1508@gmail.com', 'active', '2017-03-31 13:03:35', '2017-03-31 01:17:42', '2017-03-31 13:03:35', '3', '0', '0', 16, 18, '', 0, 'CP6102064', '', 0, 0, 0),
(193, 0, '', 'abha', 'sharma', '8287760833', '', '1491211585Hydrangeas.jpg', '', '1X6s142QzwfwB5xN36W1N8apYoKgDEMs1korsKlDTcanqfjAQ9h6hNeezliJFh6GFFn78/cBVE0l6ogHr4IvY/', '$6$rounds=5000$MzgyMDJmZWZj$', 'kuldeep@gmail.com', 'active', '2017-04-03 14:51:49', '2017-04-03 02:56:25', '2017-04-03 14:51:49', '2', '0', '0', 0, 0, '', 14, '', '1,2,4,6', 46, 193, 0),
(190, 0, 'sdfd', '', '', '8287760833', '', '', '', '78Flh0u5ME5DY.tRpwXpq6ItEkCRCZ5RrYsfT96wASN9uOOEAWNwhoiU0sNJ6HpnoTVxXfo/iAPTnAkmfAJ0g0', '$6$rounds=5000$NGRjYjhmYjMx$', 'abdfsdfsdha@gmail.com', 'active', '2017-04-03 11:09:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 46, 0, 0),
(191, 0, 'Sheetal', '', '', '8287760833', '', '', '', '3025jON72BzM9hxMujmfw8blj8oXqRNNqbEtObQlmu6ol8gN4G.db2yFZmnhajmhlh4TBvx4jJTsa/1BR..Wm1', '$6$rounds=5000$MmYxMjk5MDdk$', 'abha@tekshapers.com', 'active', '2017-04-03 11:16:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 46, 0, 0),
(192, 0, 'komal', '', '', '8287760833', '', '', '', 'W2CXlgeGN4Zr91wWIqwYwqXwS2yPXNJjLJSiGbi0UCTDgLmbSpAgMlDulnh9g1wamjcUoNvlhoJZkxs8Kg1cx0', '$6$rounds=5000$MzA0NmEyZWYz$', 'komal@gmail.com', 'active', '2017-04-03 11:47:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4', '0', '0', 0, 0, '', 0, '', '', 46, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_change_request`
--

CREATE TABLE IF NOT EXISTS `vendor_change_request` (
  `id` int(11) NOT NULL,
  `app_sc_id` bigint(10) DEFAULT NULL COMMENT 'appointment_schedular id',
  `parent_id` int(11) NOT NULL,
  `kid_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `reason_of_change` text NOT NULL,
  `status` enum('1','2','3') NOT NULL COMMENT '1=>Pending,2=>DisApprove,3=>Approve',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `session_start_date` datetime NOT NULL,
  `session_end_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `request_type` enum('1','2') DEFAULT '1' COMMENT '1=>vendor change requst,2=>discontinue'
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_change_request`
--

INSERT INTO `vendor_change_request` (`id`, `app_sc_id`, `parent_id`, `kid_id`, `vendor_id`, `reason_of_change`, `status`, `created_date`, `modified_date`, `session_start_date`, `session_end_date`, `created_by`, `modified_by`, `request_type`) VALUES
(1, 2, 70, 42, 20, 'change of priya change of priya change of priya change of priya change of priya change of priya', '3', '2017-03-27 12:02:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(2, 3, 70, 42, 38, 'again change2', '3', '2017-03-27 12:04:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(3, 4, 70, 42, 14, 'change 3', '3', '2017-03-27 12:07:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(4, 5, 70, 42, 38, 'change4', '3', '2017-03-27 01:16:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(5, 7, 173, 51, 31, 'Not liked', '3', '2017-03-28 02:33:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(6, 6, 70, 42, 20, 'fgfgfgh', '3', '2017-03-28 04:58:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(7, 2, 70, 41, 20, 'dfgdfg', '2', '2017-03-29 11:21:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(8, 13, 128, 57, 8, 'change kid2 ank', '1', '2017-03-29 06:06:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(9, 13, 128, 57, 8, 'disconitneue kid 2', '3', '2017-03-29 06:07:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(10, 18, 181, 61, 48, 'discontinue for pooja', '2', '2017-03-30 01:47:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(11, 18, 181, 61, 48, 'fgfh', '3', '2017-03-30 01:48:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(12, 14, 179, 58, 34, 'dfdfgdfg', '1', '2017-03-30 02:56:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(13, 14, 179, 58, 34, 'fdgdfg', '1', '2017-03-30 02:56:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(14, 22, 181, 62, 40, 'discontinue to aman', '3', '2017-03-30 03:34:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(15, 19, 181, 61, 39, 'change vendor', '3', '2017-03-30 03:37:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(19, 30, 184, 63, 8, 'change  request for  arti', '3', '2017-03-31 12:20:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(20, 35, 184, 63, 39, 'discontinue', '2', '2017-03-31 12:22:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(21, 35, 184, 63, 39, 'test', '2', '2017-03-31 12:22:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(22, 35, 184, 63, 39, 'test change', '2', '2017-03-31 12:25:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(23, 35, 184, 63, 39, 'discontinue again', '3', '2017-03-31 12:26:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(24, 32, 184, 63, 21, 'ghgj', '2', '2017-03-31 12:29:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(25, 32, 184, 63, 21, 'ghgg', '2', '2017-03-31 12:29:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(26, 32, 184, 63, 21, 'hh', '2', '2017-03-31 12:30:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(27, 32, 184, 63, 21, 'ghj', '2', '2017-03-31 12:30:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(28, 32, 184, 63, 21, 'test', '2', '2017-03-31 12:32:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(29, 32, 184, 63, 21, 'ffg', '3', '2017-03-31 12:32:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(30, 36, 184, 63, 39, 'fgfh', '2', '2017-03-31 12:33:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(31, 36, 184, 63, 39, 'ggfhj', '3', '2017-03-31 12:33:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(32, 41, 70, 67, 20, 'jhkjk', '1', '2017-03-31 04:52:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(33, 21, 70, 42, 12, 'iiuyiu', '1', '2017-03-31 04:53:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(34, 41, 70, 67, 20, 'uo', '1', '2017-03-31 05:01:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(35, 42, 187, 65, 20, 'Test', '2', '2017-03-31 05:21:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '1'),
(36, 42, 187, 65, 20, 'ss', '3', '2017-03-31 05:24:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(37, 2, 70, 53, 20, 'test', '1', '2017-03-31 06:08:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(38, 2, 70, 50, 20, 'test', '1', '2017-03-31 06:11:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2'),
(39, 2, 70, 48, 20, 'test', '1', '2017-03-31 06:12:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_details`
--

CREATE TABLE IF NOT EXISTS `vendor_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'it''s users table id',
  `nature_of_vendor` varchar(50) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `moblie_1` varchar(50) DEFAULT NULL,
  `moblie_2` varchar(10) DEFAULT NULL,
  `landline` varchar(11) NOT NULL,
  `vendor_spoc` int(11) DEFAULT NULL,
  `service_id` varchar(250) DEFAULT NULL,
  `year_of_establishment` int(11) DEFAULT NULL,
  `age_min` int(11) DEFAULT NULL,
  `age_max` int(11) DEFAULT NULL,
  `hourly_min` int(11) DEFAULT NULL,
  `hourly_max` int(11) DEFAULT NULL,
  `monthly_min` int(11) DEFAULT NULL,
  `monthly_max` int(11) DEFAULT NULL,
  `vendor_images` varchar(250) DEFAULT NULL,
  `vendor_logo` varchar(250) DEFAULT NULL,
  `v_pan_entity` varchar(250) DEFAULT NULL,
  `v_pan_spoc` varchar(250) DEFAULT NULL,
  `v_address_proff_spoc` varchar(250) DEFAULT NULL,
  `v_registration` varchar(250) DEFAULT NULL,
  `v_owner_academic` varchar(250) DEFAULT NULL,
  `v_tin_entity` varchar(250) DEFAULT NULL,
  `v_adhar` varchar(250) DEFAULT NULL,
  `v_bank` varchar(250) DEFAULT NULL,
  `v_facebook` varchar(250) DEFAULT NULL,
  `v_linkedin` varchar(250) DEFAULT NULL,
  `v_google_plus` varchar(250) DEFAULT NULL,
  `v_status` int(11) DEFAULT NULL,
  `description` text,
  `learning_nanny_assistance` text,
  `learning_hourly_day_care` text,
  `learning_flexible_customize_care` text,
  `learning_day_care` text,
  `care_features` text,
  `staff_ratio` varchar(255) DEFAULT NULL,
  `staff_total_teacher` varchar(255) DEFAULT NULL,
  `staff_total_nanny` varchar(255) DEFAULT NULL,
  `overall_manage_features` text NOT NULL,
  `cleanliness_features` text,
  `safegurading_cctv` int(11) DEFAULT NULL,
  `safegurading_cctv_text` text,
  `safegurading_guard` int(11) DEFAULT NULL,
  `safegurading_guard_text` text,
  `safegurading_fire_extinguisher` int(11) DEFAULT NULL,
  `safegurading_fire_extinguisher_text` text,
  `safegurading_other` text,
  `facilites_garden` int(11) DEFAULT NULL,
  `facilites_garden_text` text,
  `facilites_labs` int(11) DEFAULT NULL,
  `facilites_labs_text` text,
  `facilites_kitchen` int(11) DEFAULT NULL,
  `facilites_kitchen_text` text,
  `facilites_play_station` int(11) DEFAULT NULL,
  `facilites_play_station_text` text,
  `facilites_on_of_rooms` int(11) DEFAULT NULL,
  `facilites_other` text,
  `activities_features` text,
  `free_free_structure` int(11) DEFAULT NULL,
  `overall_features` varchar(250) DEFAULT NULL,
  `overall_first_aid` int(11) DEFAULT NULL,
  `overall_first_aid_text` text,
  `overall_food_nutrition` int(11) DEFAULT NULL,
  `overall_food_nutrition_text` text,
  `overall_summer_winter_campus` int(11) DEFAULT NULL,
  `overall_summer_winter_campus_text` text,
  `overall_childcare` int(11) DEFAULT NULL,
  `overall_childcare_text` text,
  `overall_garden_swings` int(11) DEFAULT NULL,
  `overall_garden_swings_text` text,
  `overall_pick_n_drop` int(11) DEFAULT NULL,
  `overall_pick_n_drop_text` text,
  `overall_communication_parents` int(11) DEFAULT NULL,
  `overall_communication_parents_text` text,
  `overall_staff_turnover` int(11) DEFAULT NULL,
  `overall_staff_turnover_text` text,
  `overall_onside_screening` int(11) DEFAULT NULL,
  `overall_onside_screening_text` text,
  `finacial_features` text,
  `finacial_medical_facility` int(11) DEFAULT NULL,
  `finacial_medical_facility_text` text,
  `other_features` text,
  `social_features` text,
  `social_child_care_registration` int(11) DEFAULT NULL,
  `social_child_care_registration_text` text,
  `social_child_care_regulations` int(11) DEFAULT NULL,
  `social_child_care_regulations_text` text,
  `social_additional_accreditions` int(11) DEFAULT NULL,
  `social_additional_accreditions_text` text,
  `social_insurance` int(11) DEFAULT NULL,
  `social_insurance_text` text,
  `social_recognitions` int(11) DEFAULT NULL,
  `social_recognitions_text` text,
  `social_identity_bonds` int(11) DEFAULT NULL,
  `social_identity_bonds_text` text,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_details`
--

INSERT INTO `vendor_details` (`id`, `user_id`, `nature_of_vendor`, `vendor_name`, `email`, `moblie_1`, `moblie_2`, `landline`, `vendor_spoc`, `service_id`, `year_of_establishment`, `age_min`, `age_max`, `hourly_min`, `hourly_max`, `monthly_min`, `monthly_max`, `vendor_images`, `vendor_logo`, `v_pan_entity`, `v_pan_spoc`, `v_address_proff_spoc`, `v_registration`, `v_owner_academic`, `v_tin_entity`, `v_adhar`, `v_bank`, `v_facebook`, `v_linkedin`, `v_google_plus`, `v_status`, `description`, `learning_nanny_assistance`, `learning_hourly_day_care`, `learning_flexible_customize_care`, `learning_day_care`, `care_features`, `staff_ratio`, `staff_total_teacher`, `staff_total_nanny`, `overall_manage_features`, `cleanliness_features`, `safegurading_cctv`, `safegurading_cctv_text`, `safegurading_guard`, `safegurading_guard_text`, `safegurading_fire_extinguisher`, `safegurading_fire_extinguisher_text`, `safegurading_other`, `facilites_garden`, `facilites_garden_text`, `facilites_labs`, `facilites_labs_text`, `facilites_kitchen`, `facilites_kitchen_text`, `facilites_play_station`, `facilites_play_station_text`, `facilites_on_of_rooms`, `facilites_other`, `activities_features`, `free_free_structure`, `overall_features`, `overall_first_aid`, `overall_first_aid_text`, `overall_food_nutrition`, `overall_food_nutrition_text`, `overall_summer_winter_campus`, `overall_summer_winter_campus_text`, `overall_childcare`, `overall_childcare_text`, `overall_garden_swings`, `overall_garden_swings_text`, `overall_pick_n_drop`, `overall_pick_n_drop_text`, `overall_communication_parents`, `overall_communication_parents_text`, `overall_staff_turnover`, `overall_staff_turnover_text`, `overall_onside_screening`, `overall_onside_screening_text`, `finacial_features`, `finacial_medical_facility`, `finacial_medical_facility_text`, `other_features`, `social_features`, `social_child_care_registration`, `social_child_care_registration_text`, `social_child_care_regulations`, `social_child_care_regulations_text`, `social_additional_accreditions`, `social_additional_accreditions_text`, `social_insurance`, `social_insurance_text`, `social_recognitions`, `social_recognitions_text`, `social_identity_bonds`, `social_identity_bonds_text`, `created_date`, `modified_date`, `created_by`, `modified_by`) VALUES
(6, 80, 'Day Care', 'Shamrock', 'amit@yopmail.com', '9876543210', '9876543210', '', 2147483647, '1,2,4', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '1488955702546_Chrysanthemum.jpg', '1488955702354_Desert.jpg', '148895570275_Hydrangeas.jpg', NULL, '1488955702260_Jellyfish.jpg', NULL, NULL, '1488955702286_Koala.jpg', '', '', '', 1, ' ', 'td', 'cvbc', 'cvbc', 'cvbc', 'cbc', '5:10', '10', '3', '', '', 0, '', 0, '', 0, '', '6', 0, '', 0, '', 0, '', 0, '', 10, 'td', 'td', 0, 'td', 1, 'cbvb', 1, 'cbcb', 1, 'cvbc', 1, 'cvbcvbc', 1, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 'td', 'td', 0, '', 1, 'xcvxcv', 1, '', 0, '', 0, '', 0, '', '2017-03-08 12:22:49', '2017-03-15 11:08:16', 0, 0),
(8, 84, 'Pre School', 'test', 'test.tekshapers@gmail.com', '5765675863', '5675676936', '5675638568', 0, '1', 0, 2, 8, 0, 0, 0, 0, NULL, NULL, '1489043066181_Hydrangeas.jpg', '1489043066257_Jellyfish.jpg', '1489043066116_Tulips.jpg', NULL, '1489043066662_Penguins.jpg', NULL, NULL, '1489043066837_Desert.jpg', '', '', '', 1, '  test123  ', '', '', '', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-09 12:34:29', '2017-03-31 02:39:01', 0, 84),
(9, 85, 'Pre School', 'tekshapers', 'tek@gmail.com', '66', '567567', '5656', 567567, '2', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '1489043133582_Desert.jpg', '1489043133594_Hydrangeas.jpg', '1489043133588_Jellyfish.jpg', NULL, '1489043133337_Chrysanthemum.jpg', NULL, NULL, '1489043133437_Lighthouse.jpg', '', '', '', 1, ' ', '', '', '', '', '', ':', '', '', '', '', 0, NULL, 0, NULL, 0, NULL, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-09 12:35:36', '2017-03-09 12:35:36', 0, 0),
(12, 88, 'Pre School', 'sfsdf', 'dsfd@ddfgdfh.ghgh', '6756753535', '6756754345', '3453453534', 2147483647, '2', 0, 2, 7, 0, 0, 0, 0, NULL, NULL, '1489043273631_Chrysanthemum.jpg', '1489043273485_Hydrangeas.jpg', '1489043273245_Lighthouse.jpg', NULL, '1489043273306_Tulips.jpg', NULL, NULL, '1489043273160_Lighthouse.jpg', '', '', '', 1, '  45345345', '', '', '', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-09 12:38:00', '2017-03-31 05:10:04', 0, 46),
(13, 89, 'Pre School', 'sonam', 'sonam@gmail.com', '980', '808', '98098', 980, '1', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '1489043383237_Lighthouse.jpg', '1489043383976_Lighthouse.jpg', '1489043383468_Penguins.jpg', NULL, '1489043383642_Koala.jpg', NULL, NULL, '1489043383593_Penguins.jpg', '', '', '', 1, ' ', '', '', '', '', '', ':', '', '', '', '', 0, NULL, 0, NULL, 0, NULL, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-09 12:39:46', '2017-03-09 12:39:46', 0, 0),
(14, 90, 'Hobby Classes', 'kajal', 'kajal@gmail.com', '9880980454', '1212121212', '5545454545', 545454, '5', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '1489043444660_Chrysanthemum.jpg', '1489043444793_Desert.jpg', '148904344499_Hydrangeas.jpg', NULL, '1489043444895_Jellyfish.jpg', NULL, NULL, '148904344418_Lighthouse.jpg', '', '', '', 2, ' ', '', '', '', '', '', ':', '', '', '', '', 0, NULL, 0, NULL, 0, NULL, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-09 12:40:47', '2017-03-10 11:47:51', 0, 0),
(20, 74, 'School', 'Kidzee', 'trisha@yopmail.com', '9880980454', '1212121212', '1111111111', 55, '1,2,3,4,5,6,7,8', 1998, 2, 10, 11, 11, 110, 120, NULL, NULL, '1489128060143_Chrysanthemum.jpg', '1489128060967_Desert.jpg', '1489128060313_Hydrangeas.jpg', NULL, '1489128060944_Jellyfish.jpg', NULL, NULL, '1489128060518_Lighthouse - Copy.jpg', '', '', '', 1, ' dfgdgdg', 'Credence child care is your own place that connects you with the right partners for your kid''s needs. We facilitate and bring to your door step,the best possible options for your kid''s care and hand hold you to take the right step.', 'Credence child care', 'Credence child care', 'Credence child care', 'Credence child care', '1:2', '15', '10', 'Credence child care', 'Cleanliness Credence child care', 1, '27 CCTV Camera', 1, '10, Guard Guard ', 1, '12, Fire extinguisher Fire extinguisher ', '2324', 1, '1 Garden', 1, '5. Labs', 1, '2, kitchen', 1, '3, Play Station', 13, 'Credence child care is your own place that connects you with the right partners for your kid''s needs. We facilitate and bring to your door step,the best possible options for your kid''s care and hand hold you to take the right step.', 'Credence child care is your own place that connects you with the right partners for your kid''s needs. We facilitate and bring to your door step,the best possible options for your kid''s care and hand hold you to take the right step.', 0, 'Credence child care is your own place that connects you with the right partners for your kid''s needs. We facilitate and bring to your door step,the best possible options for your kid''s care and hand hold you to take the right step.', 1, '1', 1, 'Available', 1, 'yes', 1, 'Food/Nutrition', 1, 'Garden/swingsGarden/swingsGarden', 1, 'Available', 1, 'Available', 1, '345546', 1, 'Available', 'Available Features', 1, 'Available', 'Credence child care is your own place that connects you with the right partners for your kid''s needs. We facilitate and bring to your door step,the best possible options for your kid''s care and hand hold you to take the right step.', 'Credence child care is your own place that connects you with the right partners for your kid''s needs. We facilitate and bring to your door step,the best possible options for your kid''s care and hand hold you to take the right step.', 1, 'Registration', 1, '2 Child care regulations', 1, 'Available', 1, 'Available', 1, 'Test', 1, 'Test', '2017-03-10 12:11:15', '2017-03-31 03:36:39', 0, 74),
(21, 109, 'Day Care', 'trishali', 'trishali@tekshapers.com', '9898989898', '9898989898', '2343543546', 35353, '2,4', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '1489141781607_Chrysanthemum - Copy.jpg', '1489141781418_Hydrangeas.jpg', '1489141781588_Jellyfish - Copy.jpg', NULL, '1489141781682_Desert - Copy - Copy.jpg', NULL, NULL, '1489141781612_Desert.jpg', '', '', '', 1, ' ', '', '', '', '', '', ':', '', '', '', '', 1, NULL, 0, NULL, 1, NULL, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-10 04:06:07', '2017-03-10 04:21:32', 0, 0),
(25, 113, 'Day Care', 'Dharmendra', 'dharmendra@tekshapers.com', '9898989898', '9898989898', '3216549875', 989898988, '2,5', 0, 1, 7, 0, 0, 0, 0, NULL, NULL, '1489146209162_Hydrangeas.jpg', '1489146209142_Hydrangeas.jpg', '1490619811795_Hydrangeas.jpg', NULL, '1490619811150_Jellyfish.jpg', NULL, NULL, '1490619811312_Hydrangeas.jpg', '', '', '', 3, ' jljlkm', '', '', '', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-10 05:13:45', '2017-03-27 06:33:44', 0, 46),
(30, 118, 'Day Care', 'santosh', 'santosh121290@gmail.com', '7503883201', '9599259757', '1111111111', 0, '1,2,3,5', 2017, 0, 0, 2, 5, 22, 55, '["1489148197101_Chrysanthemum.jpg"]', '1489148197806_Hydrangeas.jpg', '1489148197863_Jellyfish.jpg', '1489148197654_Lighthouse.jpg', '1489148197517_Tulips.jpg', '1489148197999_Jellyfish.jpg', '148914819751_Chrysanthemum.jpg', '1489148197235_Lighthouse.jpg', '1489148197331_Koala.jpg', '1489148197719_Hydrangeas.jpg', '', '', '', 3, ' ', NULL, NULL, NULL, NULL, NULL, ':', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-10 05:46:37', '2017-03-10 05:54:49', 0, 0),
(31, 119, 'School', 'Little Valley', 'little@yopmail.com', '4444455555', '1231231231', '5555555999', 0, '2,4', 0, 3, 6, 0, 0, 0, 0, NULL, NULL, '1489148207428_Chrysanthemum.jpg', '1489148207860_Desert.jpg', '1489148207611_Hydrangeas.jpg', NULL, '1489148207867_Jellyfish.jpg', NULL, NULL, '1489148207989_Koala.jpg', '', '', '', 1, '  test', 'yes', 'yes', 'yes', 'no', 'all secured gated premises', '8:1', '3', '3', '4 star rated ', '4 star', 1, '4 cameras', 1, '2', 1, '10', '', 1, '1', 0, '', 1, '1', 1, '4', 6, '', '', 0, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', '', 1, '', '', '', 1, '', 1, '', 0, '', 1, '', 1, '', 1, '', '2017-03-10 05:46:47', '2017-03-23 09:10:55', 0, 0),
(32, 120, 'Day Care', 'santosh', 'santosh@tekshapers.com', '7503883201', '9599259757', '1111111111', 0, '2,4', 2016, 2, 6, 1, 6, 6, 9, NULL, NULL, '1489149195867_Chrysanthemum.jpg', '1489149195615_Jellyfish.jpg', '148914919584_Lighthouse.jpg', NULL, '1489149195256_Tulips.jpg', NULL, NULL, '1489149195948_Lighthouse.jpg', '', '', '', 3, '  test', 'asdasd', 'asdasd', '', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, 'asdasd', 'asdasd', 0, 'asdasd', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 'asdasd', 'asdasd', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-10 06:03:15', '2017-03-21 11:15:06', 0, 0),
(33, 121, 'Day Care', 'naresh kumar', 'santosh@yopmail.com', '1111111111', '1111111111', '1111111111', 0, '1,2', 0, 1, 6, 0, 0, 0, 0, NULL, NULL, '149007518487_Hydrangeas.jpg', '1490075184386_Jellyfish - Copy.jpg', '1489149696833_Chrysanthemum.jpg', NULL, '1490075184555_Hydrangeas.jpg', NULL, NULL, '1489149696725_Tulips.jpg', '', '', '', 2, '  test', '', '', '', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-10 06:11:36', '2017-03-21 11:16:53', 0, 0),
(34, 122, 'Day Care', 'sumit', 'abha1@tekshapers.com', '1111111111', '1111111111', '1111111111', 0, '3,4', 0, 1, 6, 0, 0, 0, 0, NULL, NULL, '1490075247562_Jellyfish - Copy.jpg', '1489150084475_Chrysanthemum.jpg', '1490075247596_Hydrangeas.jpg', NULL, '1489150084772_Hydrangeas.jpg', NULL, NULL, '1489150084794_Jellyfish.jpg', '', '', '', 1, '  test', 'sumit', 'sumit', 'sumit', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, 'sumit', 'sumit', 0, 'sumit', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 'sumit', 'sumit', 0, '', 0, '', 0, '', 0, '', 1, 'sumit', 1, 'test sumit', '2017-03-10 06:18:04', '2017-03-21 11:19:11', 0, 0),
(35, 123, 'School', 'szfdszf', 'abhsdfsdfa@gmail.com', '4444444444', '4444444444', '4444444444', 0, '2', 0, 1, 6, 0, 0, 0, 0, NULL, NULL, '1489554352916_Chrysanthemum.jpg', '1489554352489_Desert.jpg', '1489554352686_Hydrangeas.jpg', NULL, '1489554352856_Jellyfish.jpg', NULL, NULL, '1489554352844_Koala.jpg', '', '', '', 0, '  test', NULL, NULL, NULL, NULL, NULL, ':', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-15 10:35:52', '2017-03-21 11:23:20', 0, 0),
(37, 126, 'Day Care', 'neha', 'neha@gmail.com', '8287760833', '8287760833', '8287760833', 828776833, '2', 2008, 2, 5, 1, 2, 1, 3, '["1489730146334_Chrysanthemum.jpg"]', '1489730146144_Koala.jpg', '1489730146381_Lighthouse.jpg', '1489730146600_Penguins.jpg', '148973014671_Tulips.jpg', '1489730146152_Desert.jpg', '1489730146134_Hydrangeas.jpg', '1489730146842_Jellyfish.jpg', '1489730146368_Koala.jpg', '148973014698_Koala.jpg', 'ghg', 'ghjgh', 'ghjg', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', '1:2', '25', '25', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, '\r\nLabs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs\r\n\r\n', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 66, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 0, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', 1, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features', '2017-03-17 11:25:46', '2017-03-17 11:28:00', 0, 0),
(38, 127, 'Hobby Classes', 'Choice', 'archi@yopmail.com', '9868041710', '6868056233', '4568999999', 3453, '1,4,5', 2001, 3, 8, 5, 10, 50, 110, '["1489731778980_Chrysanthemum.jpg","1489731778984_Desert.jpg","1489731778178_Hydrangeas.jpg","1489731778627_Jellyfish.jpg","1489731778256_Koala.jpg"]', '1489735798898_Tulips.jpg', '1489731778476_Chrysanthemum.jpg', '1489731778462_Desert.jpg', '148973177888_Hydrangeas.jpg', NULL, '148973177870_Tulips.jpg', NULL, NULL, '1489747482286_Chrysanthemum.jpg', '', '', '', 3, ' sxswxxs                   ', 'dsfs', 'ss', 'ss', 'dfdfs', 'Interactive iLLUME, Teachers', '10:9', '20', '5', 'good, helping', 'Legacy, vision', 0, '', 1, 'guard', 1, 'fgfgf', '', 1, 'aa', 1, '2', 1, '1', 1, '3', 5, 'dsfs', 'dsfs', 0, 'dsfs', 1, 'aa', 1, 'gg', 1, 'gg', 1, 'sdfs', 1, 'sss', 1, 'yrtyr', 1, 'trtt', 1, 'rtyuytu', 1, 'rgeryh', 'dfsf', 1, 'uiuyiui', 'dsfs', 'dsfs', 1, 'i9yiyiyhg', 1, 'fhgfgjgjhjg', 1, 'kllkjlkj', 1, 'hkljk', 1, 'jkjk', 1, 'jkjkj', '2017-03-17 11:52:58', '2017-03-22 12:45:51', 0, 0),
(39, 128, 'Day Care', 'Ankit', 'ankit@tekshapers.com', '9876543210', '9876543210', '9876543210', 0, '1', 1998, 1, 6, 100, 150, 500, 800, '["1490074713682_Koala.jpg"]', '1489737068894_Chrysanthemum.jpg', '1489737068548_Penguins.jpg', '1489737068604_Lighthouse.jpg', '1489737068627_Penguins.jpg', NULL, '1489737068755_Lighthouse.jpg', NULL, NULL, '1489737068810_Koala.jpg', '', '', '', 3, 'desc     ', 'nanny', 'day care', 'flexible', 'learn', 'care featr', '1:10', '10', '2', 'mange', 'clenam', 1, 'cctv', 0, '', 1, 'fire', '123', 1, 'gardeb', 1, 'lab', 0, '', 1, 'statisom', 5, 'nanny', 'nanny', 0, 'nanny', 1, 'firts', 1, 'food', 1, 'summer', 1, 'speia', 1, 'swing', 1, 'pick', 1, 'channel', 1, 'staff', 1, 'screen', 'fianance', 1, 'medical', 'nanny', 'nanny', 1, 'regs', 1, '', 1, 'accce', 1, 'ins', 1, 'rewar', 1, 'damage', '2017-03-17 01:21:08', '2017-03-21 05:39:51', 0, 0),
(40, 143, 'Day Care', 'IPSA', 'ipsa@gmail.com', '9876543213', '8745976548', '4568973658', 0, '2,3', 1999, 4, 7, 1000, 2000, 1000, 2000, NULL, NULL, '1490243777801_Chrysanthemum.jpg', '1490243777541_Jellyfish - Copy.jpg', '1490243777264_Jellyfish - Copy.jpg', NULL, '1490243777953_Desert - Copy.jpg', NULL, NULL, '149024377751_Lighthouse.jpg', '', '', '', 1, ' test', '', '', '', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-23 10:06:17', '2017-03-23 10:07:53', 0, 0),
(41, 68, 'Day Care', 'Abha', 'abha1@tekshapers.com', '9876543213', '8745976548', '4568973658', 0, '2,3', 1999, 0, 0, 1000, 2000, 1000, 2000, NULL, NULL, '1490243777801_Chrysanthemum.jpg', '1490592890275_Desert.jpg', '1490592890143_Hydrangeas.jpg', NULL, '149059289064_Koala.jpg', NULL, NULL, '149024377751_Lighthouse.jpg', 'sdfasdf', 'asdsad', 'asdasd', 1, ' test sdfasdasda       ', 'test', 'test', 'test', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 1, 'test', '2017-03-23 10:06:17', '2017-03-27 12:39:38', 0, 0),
(42, 145, 'Day Care', 'abha', 'abha1@gmail.com', '8287760833', '1111111111', '1111111111', 2147483647, '1', 2008, 1, 11, 1, 2, 1, 2, '["1490260934467_Chrysanthemum.jpg"]', '149026093498_Desert.jpg', '1490260934387_Hydrangeas.jpg', '149026093485_Jellyfish.jpg', '1490260934168_Koala.jpg', NULL, '1490260934979_Jellyfish.jpg', '1490260934505_Lighthouse.jpg', '1490260934436_Koala.jpg', '1490260934533_Jellyfish.jpg', '', '', '', 3, ' Description Description Description Description Description Description Description Description Description Description Description Description', '12', '12', '12', '12', '2', '1:1', '1', '1', '11', '11', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-23 02:52:14', '2017-03-23 02:53:16', 0, 0),
(43, 152, 'Day Care', 'akash', 'akash@gmail.com', '8287760833', '1111111111', '1111111111', 1111111111, '1', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '1490605678933_Chrysanthemum.jpg', '1490605678602_Jellyfish.jpg', '1490605678597_Koala.jpg', NULL, '1490605678825_Lighthouse.jpg', NULL, NULL, '1490605678676_Penguins.jpg', '', '', '', 0, ' DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescrip', '', '', '', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-27 02:37:58', '2017-03-27 02:38:20', 0, 0),
(44, 160, 'Day Care', 'g', 'g@gmail.com', '8287760833', '1111111111', '1111111111', 1111111111, '2', 0, 1, 6, 0, 0, 0, 0, NULL, NULL, '1490617229770_Hydrangeas.jpg', '1490617229613_Jellyfish.jpg', '1490617229607_Hydrangeas.jpg', NULL, '1490617229956_Jellyfish.jpg', NULL, NULL, '1490617229179_Hydrangeas.jpg', '', '', '', 1, ' asdas dtfgrdtet ', '', '', '', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-27 05:50:29', '2017-03-27 05:55:12', 46, 46),
(45, 163, 'Day Care', 'shivanshi', 'shivanshi@gmail.com', '8287760833', '1111111111', '1111111111', 2147483647, '1', 2222, 3, 7, 1, 2, 1, 2, '["1490619373885_Hydrangeas.jpg"]', '1490619373697_Jellyfish.jpg', '1490619373585_Koala.jpg', '1490619373413_Lighthouse.jpg', '1490619373482_Jellyfish.jpg', '1490619373673_Jellyfish.jpg', '1490619373688_Hydrangeas.jpg', '1490619373615_Jellyfish.jpg', '1490619373842_Jellyfish.jpg', '1490619373228_Lighthouse.jpg', '', '', '', 1, ' dsfffffddddasdsaddd ', 'ewrw', 'werwer', 'werewr', 'erwe', 'erer', '1:2', '3243', '32432', 'fdgdfg', 'fgfdg', 1, 'fdgfg', 1, 'fdgfd', 1, 'fgfdg', '45445', 1, 'gfhfg', 1, 'hfgh', 1, 'hfgh', 1, 'gfhgfh', 4565, 'ewrw', 'ewrw', 0, 'ewrw', 1, 'ghfgh', 1, 'gfhgfhfgh', 1, 'gfhfgh', 1, 'ghfghfghghhhhhhhhhh', 1, 'ghhhhhhhhhhhh', 1, 'hhhhhhhhhhhhhhhhhh', 1, 'hhhhhhhhhhhhhhhhhhh', 1, 'hhhhhhhhhhhhhhhhhhhh', 1, 'hhhhhhhhhhhhhhhh', 'ghfgh', 1, 'gffffffffffffffffffh', 'ewrw', 'ewrw', 1, 'ghfg', 1, 'hgfhgfh', 1, 'ghgfhfg', 1, 'hghfghfghgh', 1, 'ghhhhhhhhhhhhhhhhhhhhhhf', 1, 'fgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfg', '2017-03-27 06:26:13', '2017-03-27 06:30:10', 46, 46),
(46, 172, 'Hobby Classes', 'santosh', 'santosh@yopmail.com', '9599259757', '1111111111', '1111111111', 0, '1,2', 2016, 2, 10, 11, 111, 0, 0, '["1490688743804_cover_pic_thumb1-228x228.png","149068874386_IMG_24062016_174956.png","1490688743889_IMG_24062016_175055.png","1490688743687_Lagoon.png","1490688743192_ockto.jpg","1490688743268_right_banner_thumb.png"]', NULL, '1490688114181_Chrysanthemum.jpg', '1490688114553_Desert.jpg', '1490688114785_Hydrangeas.jpg', NULL, '1490688114883_Jellyfish.jpg', NULL, NULL, '1490688114461_Lighthouse.jpg', 'sfasd', 'asdasd', 'asdasd', 1, ' asdadad  saasdasd       zcfasdcasas         ', 'dfgdsg dfgsd cxfgzs', 'sdfsdf zxdfsdf', 'sdgfdsfsafs bsdfas', '', '', ':', '', '', '', 'sdfsdf', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, 'dfgdsg', 'dfgdsg', 0, 'dfgdsg', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 'dfgdsg', 'dfgdsg', 0, '', 0, '', 0, '', 0, '', 0, '', 1, 'sdfsdf', '2017-03-28 01:31:54', '2017-03-28 02:48:37', 46, 172),
(47, 176, 'Day Care', 'sonu', 'sonu@gmail.com', '8287760833', '1111111111', '1111111111', 1111111111, '1', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '149077268264_Chrysanthemum.jpg', '1490772682644_Hydrangeas.jpg', '1490772682823_Jellyfish.jpg', NULL, '1490772682775_Koala.jpg', NULL, NULL, '1490772682342_Lighthouse.jpg', '', '', '', 1, ' sdfd', '', '', '', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-29 01:01:22', '2017-03-29 01:01:40', 46, 46),
(48, 180, 'Day Care', 'Mother Touch', 'ankit.saxena52@gmail.com', '9898765410', '9876543210', '7878878998', 0, '1', 2011, 1, 6, 100, 1000, 1000, 5000, NULL, NULL, '1490854787308_Chrysanthemum.jpg', '1490854787455_Desert.jpg', '1490854787506_Desert.jpg', NULL, '1490855458640_Desert.jpg', NULL, NULL, '1490855667687_Chrysanthemum.jpg', '', '', '', 1, ' tsst          ', '', '', '', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-30 11:49:47', '2017-03-31 07:21:19', 46, 180),
(49, 183, 'Day Care', 'payal', 'abhasharma10694@gmail.com', '8287760833', '1111111111', '1111111111', 2147483647, '1', 2007, 1, 7, 2, 5, 2, 5, '["1490939582514_Chrysanthemum.jpg"]', '1490939582804_Hydrangeas.jpg', '149093958264_Hydrangeas.jpg', '1490939582998_Jellyfish.jpg', '1490939582848_Koala.jpg', '1490939582557_Lighthouse.jpg', '1490939582770_Penguins.jpg', '1490939582531_Penguins.jpg', '1490939582351_Koala.jpg', '1490939582147_Jellyfish.jpg', '', '', '', 1, ' Vendor Social Media Link  Vendor Social Media Link Vendor Social Media Link Vendor Social Media Link Vendor Social Media LinkVendor Social Media Link  sds ', 'etgert', '', '', '', '', ':', '', '', '', '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, 'etgert', 'etgert', 0, 'etgert', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 'etgert', 'etgert', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '2017-03-31 11:23:02', '2017-03-31 12:06:29', 46, 46),
(50, 188, 'Day Care', 'rtertertret', 'abhaertertert@gmail.com', '8287760833', '1111111111', '1111111111', 2147483647, '1', 0, 1, 7, 0, 0, 0, 0, NULL, NULL, '1490951103811_Hydrangeas.jpg', '1490951103840_Hydrangeas.jpg', '1490951103915_Hydrangeas.jpg', NULL, '1490951103469_Hydrangeas.jpg', NULL, NULL, '1490951103870_Hydrangeas.jpg', '', '', '', 1, ' fdsf   ', '', '', '', '', '', ':', '', '', '', '', 1, 'erwesr', 1, 'erwe', 1, 'wrerwe', '', 1, 'erwe', 1, 'ewrwe', 1, 'ere', 1, 'erew', 0, '', '', 0, '', 1, 'ewrwer', 1, 'ewrwe', 1, 'ewrwe', 1, 'ewrwe', 1, 'werwerwe', 1, 'ererew', 1, 'ewrerewr', 1, 'werwerwe', 1, 'ererer', '', 1, 'dsfsdfsd', '', '', 1, 'dsfdf', 1, 'dsfdsf', 1, 'dsfdsf', 1, 'dsfdf', 1, 'dsfdsd', 1, 'sdfsdf', '2017-03-31 02:35:03', '2017-03-31 07:08:29', 46, 46),
(51, 190, 'Day Care', 'sdfd', 'abdfsdfsdha@gmail.com', '8287760833', '5555555555', '5555555555', 2147483647, '2', 0, 1, 3, 0, 0, 0, 0, NULL, NULL, '1491197967249_Jellyfish.jpg', '1491197967395_Jellyfish.jpg', '1491197967812_Jellyfish.jpg', NULL, '1491197967666_Koala.jpg', NULL, NULL, '1491197967971_Lighthouse.jpg', '', '', '', 1, ' dgdfg', NULL, NULL, NULL, NULL, NULL, ':', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-03 11:09:27', '2017-04-03 11:09:27', 46, 0),
(52, 191, 'Day Care', 'Sheetal', 'abha@tekshapers.com', '8287760833', '1111111111', '1111111111', 2147483647, '1', 2017, 1, 4, 11, 15, 10, 12, '["1491198411317_Lighthouse.jpg","149119841191_Penguins.jpg","1491198411192_Tulips.jpg"]', '1491198411332_Koala.jpg', '1491198411978_Hydrangeas.jpg', '149119841159_Jellyfish.jpg', '1491198411287_Koala.jpg', '1491198411675_Penguins.jpg', '1491198411237_Tulips.jpg', '1491198411517_Koala.jpg', '1491198411595_Koala.jpg', '1491198411452_Lighthouse.jpg', '', '', '', 1, ' Description Description Description Description Description Description \n Description Description Description Description Description Description ', 'Nanny Assistance Nanny Assistance Nanny Assistance Nanny Assistance Nanny Assistance Nanny Assistance Nanny Assistance Nanny Assistance Nanny Assistance', 'Hourly Day Care on Demand Hourly Day Care on Demand Hourly Day Care on Demand Hourly Day Care on Demand', ' Flexible & Customized Day Care Flexible & Customized Day Care Flexible & Customized Day Care Flexible & Customized Day Care', ' Day Care  Day Care  Day Care  Day Care  Day Care  Day Care  Day Care  Day Care  Day Care  Day Care  Day Care  Day Care  Day Care  Day Care  Day Care  Day Care ', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features ', '7:10', '30', '11', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features ', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features ', 1, 'CCTV Camera CCTV Camera CCTV Camera CCTV Camera CCTV Camera CCTV Camera CCTV Camera CCTV Camera CCTV Camera CCTV Camera CCTV Camera CCTV Camera ', 1, 'Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard Guard ', 1, 'Fire extinguisher Fire extinguisher Fire extinguisher Fire extinguisher Fire extinguisher Fire extinguisher Fire extinguisher Fire extinguisher Fire extinguisher ', 'Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other Other ', 1, 'Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden Garden ', 1, 'Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs Labs ', 1, 'kitchen kitchen kitchen kitchen kitchen kitchen kitchen kitchen kitchen kitchen kitchen kitchen kitchen kitchen kitchen kitchen kitchen kitchen kitchen ', 1, 'Play StationPlay Station  Play StationPlay Station  Play StationPlay Station  Play StationPlay Station  Play StationPlay Station  Play StationPlay Station  ', 16, 'other', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features ', 0, 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features ', 1, 'First Aid  First Aid  First Aid  First Aid  First Aid   First Aid  First Aid  First Aid  First Aid  First Aid  First Aid  First Aid  First Aid  First Aid  First Aid  First Aid  First Aid  First Aid  First Aid  First Aid  ', 1, 'Food/Nutrition Food/Nutrition Food/Nutrition Food/Nutrition Food/Nutrition Food/Nutrition Food/Nutrition Food/Nutrition Food/Nutrition Food/Nutrition ', 1, 'Summer camps+winter camps Summer camps+winter camps Summer camps+winter camps Summer camps+winter camps Summer camps+winter camps Summer camps+winter camps ', 1, 'Childcare for special needs children Childcare for special needs children Childcare for special needs children Childcare for special needs children ', 1, 'Garden/swings  Garden/swings  Garden/swings  Garden/swings  Garden/swings  Garden/swings  Garden/swings  Garden/swings  Garden/swings ', 1, 'Pick N Drop Pick N Drop Pick N Drop Pick N Drop Pick N Drop Pick N Drop Pick N Drop Pick N Drop Pick N Drop Pick N Drop Pick N Drop Pick N Drop ', 1, 'Communication Channels for Parents  Communication Channels for Parents  Communication Channels for Parents  Communication Channels for Parents  Communication Channels for Parents  ', 1, 'Staff Turnover Staff Turnover Staff Turnover  Staff Turnover Staff Turnover Staff Turnover Staff Turnover Staff Turnover Staff Turnover Staff Turnover Staff Turnover Staff Turnover ', 1, 'Onsidt Screening Facility Onsidt Screening Facility  Onsidt Screening Facility Onsidt Screening Facility Onsidt Screening Facility Onsidt Screening Facility Onsidt Screening Facility Onsidt Screening Facility ', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features ', 1, 'Medical Facility & Doc on call Medical Facility & Doc on call  Medical Facility & Doc on call Medical Facility & Doc on call Medical Facility & Doc on call Medical Facility & Doc on call ', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features ', 'Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features Features ', 1, 'Child care registration Child care registration Child care registration Child care registration Child care registration Child care registration Child care registration Child care registration', 1, 'Child care regulations Child care regulations Child care regulations Child care regulations Child care regulations Child care regulations Child care regulations Child care regulations', 1, 'Additonal accreditations Additonal accreditations Additonal accreditations Additonal accreditations Additonal accreditations Additonal accreditations', 1, 'Insurance Insurance Insurance Insurance Insurance Insurance Insurance Insurance Insurance Insurance Insurance Insurance Insurance Insurance Insurance Insurance', 1, 'Recognition & rewards Recognition & rewards  Recognition & rewards Recognition & rewards  Recognition & rewards Recognition & rewards Recognition & rewards Recognition & rewards ', 1, 'Identity bonds for any damage Identity bonds for any damage Identity bonds for any damage Identity bonds for any damage Identity bonds for any damage Identity bonds for any damage', '2017-04-03 11:16:51', '2017-04-03 11:33:47', 46, 46),
(53, 192, 'Day Care', 'komal', 'komal@gmail.com', '8287760833', '1111111111', '1111111111', 2147483647, '1', 11111, 1, 6, 1, 5, 1, 5, '["149120022297_Desert.jpg","1491200222833_Hydrangeas.jpg","1491200222446_Jellyfish.jpg","1491200222230_Koala.jpg","1491200222212_Lighthouse.jpg","1491200222858_Penguins.jpg","149120022255_Tulips.jpg"]', '1491200222927_Jellyfish.jpg', '1491200222619_Jellyfish.jpg', '1491200222736_Hydrangeas.jpg', '1491200222947_Lighthouse.jpg', '1491200222887_Penguins.jpg', '1491200222206_Tulips.jpg', '1491200222696_Jellyfish.jpg', '1491200222241_Koala.jpg', '1491200222887_Lighthouse.jpg', '', '', '', 1, 'asdasdasd', '1', '2', '3', '4', '5', '1:2', '11', '111', '6', '7', 1, '8', 1, '9', 1, '10', '11', 1, '12', 1, '13', 1, '14', 1, '15', 16, '17', '18', 0, '19', 1, '20', 1, '21', 1, '22', 1, '23', 1, '24', 1, '25', 1, '26', 1, '27', 1, '28', '29', 1, '30', '31', '32', 1, '33', 1, '34', 1, '35', 1, '36', 1, '37', 1, '38', '2017-04-03 11:47:02', '2017-04-03 12:05:39', 46, 46);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_invoice`
--

CREATE TABLE IF NOT EXISTS `vendor_invoice` (
  `id` int(11) NOT NULL,
  `kid_detail` varchar(222) NOT NULL,
  `kid_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `invoice_date` date NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `approval_status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1=>Pending,2=>DisApprove,3=>Approve',
  `status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=Active,2=>inactive',
  `invoice_status` enum('1','2','3','4') NOT NULL DEFAULT '4' COMMENT '1=Invoice Raised,2=>Unpaid,3=>Paid ,''4''=>''pending''',
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_invoice`
--

INSERT INTO `vendor_invoice` (`id`, `kid_detail`, `kid_id`, `parent_id`, `vendor_id`, `amount`, `image`, `due_date`, `invoice_date`, `created_date`, `modified_date`, `approval_status`, `status`, `invoice_status`, `created_by`, `modified_by`) VALUES
(39, '43_70', 43, 70, 68, '100', '', '2017-03-28', '2017-03-27', '2017-03-23 11:26:04', '0000-00-00 00:00:00', '3', '1', '2', 0, 0),
(40, '44_137', 44, 137, 68, '100', '', '2017-03-29', '2017-03-28', '2017-03-23 11:27:27', '0000-00-00 00:00:00', '3', '1', '2', 0, 0),
(41, '28_68', 28, 68, 74, '1000', '', '2017-03-25', '2017-03-23', '2017-03-23 11:50:14', '0000-00-00 00:00:00', '3', '1', '2', 0, 0),
(42, '41_70', 41, 70, 68, '54321', '1490261288_Desert.jpg', '2017-03-28', '2017-03-29', '2017-03-23 02:58:08', '0000-00-00 00:00:00', '3', '1', '2', 0, 0),
(43, '33_103', 33, 103, 145, '12345', '1490261639_Koala.jpg', '2017-03-29', '2017-03-30', '2017-03-23 03:03:59', '0000-00-00 00:00:00', '3', '1', '2', 0, 0),
(44, '33_103', 33, 103, 74, '10000', '', '2017-03-31', '2017-03-24', '2017-03-24 09:26:59', '0000-00-00 00:00:00', '2', '1', '2', 0, 0),
(45, '33_103', 33, 103, 79, '12345', '', '2017-03-29', '2017-03-29', '2017-03-27 05:46:51', '0000-00-00 00:00:00', '1', '1', '1', 79, 0),
(46, '42_70', 42, 70, 74, '5000', '1490693825_right_banner_thumb.png', '2017-03-31', '2017-03-28', '2017-03-28 03:07:05', '0000-00-00 00:00:00', '1', '1', '1', 74, 0),
(47, '33_103', 33, 103, 74, '4000', '1490694007_cover_pic_thumb1-228x228.png', '2017-03-31', '2017-03-24', '2017-03-28 03:10:07', '0000-00-00 00:00:00', '3', '1', '2', 74, 0),
(48, '42_70', 42, 70, 74, '566', '', '2017-05-04', '2017-04-24', '2017-03-28 06:06:34', '0000-00-00 00:00:00', '3', '1', '2', 74, 0),
(49, '41_70', 41, 70, 103, '15000', '', '2017-03-29', '2017-03-29', '2017-03-29 12:59:20', '2017-03-29 12:59:36', '1', '1', '1', 103, 0),
(50, '41_70', 41, 70, 176, '12000', '', '2017-03-29', '2017-03-30', '2017-03-29 01:04:35', '2017-03-29 01:11:01', '3', '1', '1', 176, 0),
(52, '61_181', 61, 181, 180, '1222', '', '2017-03-23', '2017-03-23', '2017-03-30 01:43:14', '0000-00-00 00:00:00', '1', '1', '4', 180, 0),
(53, '56_128', 56, 128, 84, '111', '1490951492_Jellyfish.jpg', '2017-04-05', '2017-03-28', '2017-03-31 02:41:32', '0000-00-00 00:00:00', '1', '1', '4', 84, 0),
(54, '65_187', 65, 187, 74, '4000', '1490959911_Penguins_-_Copy.jpg', '2017-03-03', '2017-03-01', '2017-03-31 05:01:51', '2017-03-31 05:02:03', '3', '1', '2', 74, 0),
(55, '66_184', 66, 184, 183, '45345', '', '2017-03-29', '2017-03-28', '2017-03-31 05:51:31', '0000-00-00 00:00:00', '3', '1', '4', 183, 0),
(56, '64_184', 64, 184, 183, '546456', '', '2017-03-22', '2017-03-21', '2017-03-31 05:51:39', '0000-00-00 00:00:00', '3', '1', '4', 183, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_location`
--

CREATE TABLE IF NOT EXISTS `vendor_location` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `city` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `pin_code` varchar(50) DEFAULT NULL,
  `nature_of_location` varchar(250) DEFAULT NULL,
  `other` varchar(250) DEFAULT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_location`
--

INSERT INTO `vendor_location` (`id`, `vendor_id`, `city`, `area_id`, `address`, `pin_code`, `nature_of_location`, `other`, `latitude`, `longitude`, `created_date`, `modified_date`, `created_by`, `modified_by`) VALUES
(30, 4, 10, 13, 'Testelt, Scherpenheuvel-Zichem, Belgium', '201011', 'owned_commercial', '', '', '', '2017-03-08 12:15:02', '2017-03-08 12:15:02', 0, 0),
(40, 9, 10, 13, '', '', '', '', '', '', '2017-03-09 12:35:44', '2017-03-09 12:35:44', 0, 0),
(44, 13, 10, 13, '', '', '', '', '', '', '2017-03-09 12:39:54', '2017-03-09 12:39:54', 0, 0),
(49, 15, 10, 13, '', '', '', '', '', '', '2017-03-09 04:39:35', '2017-03-09 04:39:35', 0, 0),
(50, 6, 10, 13, '', '', 'other', '', '', '', '2017-03-09 04:48:23', '2017-03-09 04:48:23', 0, 0),
(51, 3, 10, 13, 'Testelt, Scherpenheuvel-Zichem, Belgium', '100', 'owned_commercial', '', '', '', '2017-03-09 05:00:50', '2017-03-09 05:00:50', 0, 0),
(52, 3, 10, 13, 'Testelt, Scherpenheuvel-Zichem, Belgium', '100', 'owned_commercial', '', '', '', '2017-03-09 05:00:50', '2017-03-09 05:00:50', 0, 0),
(57, 16, 10, 13, 'Testour, Beja, Tunisia', '334', 'owned_commercial', '', '', '', '2017-03-09 05:13:00', '2017-03-09 05:13:00', 0, 0),
(59, 17, 10, 13, '', '', '', '', '', '', '2017-03-09 05:33:10', '2017-03-09 05:33:10', 0, 0),
(66, 14, 17, 20, '', '', 'owned_commercial', '', '', '', '2017-03-10 11:47:46', '2017-03-10 11:47:46', 0, 0),
(93, 21, 16, 18, 'R K Puram Sector 4, Sector 4, New Delhi, Delhi, India', '201001', 'owned_commercial', '', '', '', '2017-03-10 04:12:56', '2017-03-10 04:12:56', 0, 0),
(94, 21, 16, 18, '', '', '', '', '', '', '2017-03-10 04:12:56', '2017-03-10 04:12:56', 0, 0),
(95, 22, 17, 21, '', '', '', '', '', '', '2017-03-10 04:17:54', '2017-03-10 04:17:54', 0, 0),
(96, 23, 17, 20, '', '', '', '', '', '', '2017-03-10 04:20:27', '2017-03-10 04:20:27', 0, 0),
(97, 24, 17, 21, '', '', '', '', '', '', '2017-03-10 04:30:43', '2017-03-10 04:30:43', 0, 0),
(113, 20, 16, 18, '', '', 'owned_commercial', '', '', '', '2017-03-15 03:21:44', '2017-03-15 03:21:44', 0, 0),
(114, 20, 17, 20, '', '', '', '', '', '', '2017-03-15 03:21:44', '2017-03-15 03:21:44', 0, 0),
(116, 37, 16, 18, 'Dubai - United Arab Emirates', '111111', 'owned_commercial', '', '25.2048493', '55.2707828', '2017-03-17 11:25:58', '2017-03-17 11:25:58', 0, 0),
(160, 31, 16, 18, '', '', '', '', '28.5660075', '77.1767435', '2017-03-21 11:10:48', '2017-03-21 11:10:48', 0, 0),
(161, 32, 16, 19, 'Delhi, India', '11111', '', '', '28.7040592', '77.1024902', '2017-03-21 11:14:56', '2017-03-21 11:14:56', 0, 0),
(162, 33, 16, 19, '', '', 'owned_commercial', '', '28.5660075', '77.1767435', '2017-03-21 11:16:25', '2017-03-21 11:16:25', 0, 0),
(163, 34, 16, 18, '', '', 'owned_commercial', '', '28.5660075', '77.1767435', '2017-03-21 11:17:27', '2017-03-21 11:17:27', 0, 0),
(164, 35, 16, 18, '', '', '', '', '28.5660075', '77.1767435', '2017-03-21 11:23:20', '2017-03-21 11:23:20', 0, 0),
(170, 39, 16, 18, 'RK Puram, New Delhi, Delhi, India', '201001', 'other', '', '28.5660075', '77.1767435', '2017-03-21 05:39:51', '2017-03-21 05:39:51', 0, 0),
(173, 38, 17, 21, '', '', 'other', 'location 1', '28.5577386', '77.3667518', '2017-03-22 12:42:24', '2017-03-22 12:42:24', 0, 0),
(174, 38, 17, 20, '', '', 'other', 'location 2', '28.570317', '77.3218196', '2017-03-22 12:42:29', '2017-03-22 12:42:29', 0, 0),
(175, 40, 16, 18, 'RK Puram, New Delhi, Delhi, India', '201001', 'owned_commercial', '', '28.5660075', '77.1767435', '2017-03-23 10:06:25', '2017-03-23 10:06:25', 0, 0),
(176, 42, 16, 18, 'Noida, Uttar Pradesh, India', '111111111', 'owned_commercial', '', '28.5355161', '77.3910265', '2017-03-23 02:52:24', '2017-03-23 02:52:24', 0, 0),
(189, 41, 16, 18, '', '', 'other', 'test', '28.5660075', '77.1767435', '2017-03-27 12:39:38', '2017-03-27 12:39:38', 0, 0),
(190, 41, 17, 20, 'Great India Place, Sector 38, Noida, Uttar Pradesh, India', '', 'other', 'dummy', '28.5684178', '77.3258201', '2017-03-27 12:39:43', '2017-03-27 12:39:43', 0, 0),
(191, 43, 16, 18, '1111 Commonwealth Avenue, MA, United States', '', '', '', '42.3517916', '-71.1256144', '2017-03-27 02:38:08', '2017-03-27 02:38:08', 0, 0),
(194, 44, 16, 18, '', '', '', '', '28.5660075', '77.1767435', '2017-03-27 05:55:03', '2017-03-27 05:55:03', 46, 46),
(196, 45, 17, 20, 'Arizona, United States', '111111', 'owned_commercial', '', '34.0489281', '-111.0937311', '2017-03-27 06:30:01', '2017-03-27 06:30:01', 46, 46),
(197, 25, 16, 18, 'RK Puram, New Delhi, Delhi, India', '201001', 'owned_commercial', '', '28.5660075', '77.1767435', '2017-03-27 06:33:31', '2017-03-27 06:33:31', 46, 0),
(215, 46, 16, 18, 'Delhi, India', '', 'owned_commercial', '', '28.7040592', '77.1024902', '2017-03-28 02:47:12', '2017-03-28 02:47:12', 172, 0),
(216, 47, 16, 18, '', '', 'owned_commercial', '', '28.5660075', '77.1767435', '2017-03-29 01:01:31', '2017-03-29 01:01:31', 46, 0),
(234, 49, 16, 18, 'San Francisco, CA, United States', '123456', 'owned_commercial', '', '37.7749295', '-122.4194155', '2017-03-31 12:06:08', '2017-03-31 12:06:08', 46, 0),
(238, 8, 16, 18, '', '', '', '', '28.5660075', '77.1767435', '2017-03-31 02:39:01', '2017-03-31 02:39:01', 84, 0),
(244, 48, 17, 31, 'Fortis Hospital, Noida, Uttar Pradesh, India', '', 'other', 'eewrwer', '28.6184089', '77.3725947', '2017-03-31 03:29:37', '2017-03-31 03:29:37', 180, 0),
(245, 48, 17, 20, '', '', 'other', 'fgdfgd', '28.5708129', '77.3261158', '2017-03-31 03:29:42', '2017-03-31 03:29:42', 180, 0),
(247, 12, 25, 26, '', '', '', '', '28.4160426', '77.0593246', '2017-03-31 05:09:53', '2017-03-31 05:09:53', 46, 0),
(248, 50, 17, 20, '', '', '', '', '28.5708129', '77.3261158', '2017-03-31 07:08:29', '2017-03-31 07:08:29', 46, 0),
(249, 51, 17, 21, 'dfgdfga, Sins, Switzerland', '111111', '', '', '47.1872464', '8.3488054', '2017-04-03 11:09:36', '2017-04-03 11:09:36', 46, 0),
(250, 52, 16, 18, 'Paseo de la Castellana, 1, Madrid, Spain', '111111', 'owned_commercial', '', '40.4260459', '-3.6910109', '2017-04-03 11:16:59', '2017-04-03 11:16:59', 46, 0),
(251, 53, 16, 18, 'Paseo de la Castellana, 1, Madrid, Spain', '111111', 'owned_commercial', '', '40.4260459', '-3.6910109', '2017-04-03 11:47:11', '2017-04-03 11:47:11', 46, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_notice`
--

CREATE TABLE IF NOT EXISTS `vendor_notice` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL COMMENT 'user_id of vendor_details table',
  `notice_title` varchar(255) NOT NULL,
  `notice_description` text NOT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1=>Pending,2=>DisApprove,3=>Approve',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `notice_status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=Active,2=>inactive',
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_notice`
--

INSERT INTO `vendor_notice` (`id`, `vendor_id`, `notice_title`, `notice_description`, `status`, `start_date`, `end_date`, `image`, `modified_date`, `created_date`, `notice_status`, `created_by`, `modified_by`) VALUES
(4, 68, 'test', 'test', '3', '2017-03-23', '2017-03-31', '1490261936_Jellyfish.jpg', '0000-00-00 00:00:00', '2017-03-23 12:35:31', '1', 0, 0),
(5, 68, 'aaaaaaaaaaaaaaaa', 'aaaaaaa', '3', '2017-03-29', '2017-03-29', '1490261400_Koala.jpg', '0000-00-00 00:00:00', '2017-03-23 03:00:00', '1', 0, 0),
(6, 145, 'new notice', 'new notice', '3', '2017-03-29', '2017-03-29', '1490261936_Jellyfish.jpg', '0000-00-00 00:00:00', '2017-03-23 03:08:56', '1', 0, 0),
(7, 145, 'notice 1', 'notice 1', '3', '2017-03-27', '2017-03-27', '1490261956_Koala.jpg', '0000-00-00 00:00:00', '2017-03-23 03:09:16', '2', 0, 0),
(8, 74, 'reminder', 'payment pending', '3', '2017-03-24', '2017-03-24', '1490261936_Jellyfish.jpg', '0000-00-00 00:00:00', '2017-03-24 09:38:45', '1', 0, 0),
(9, 68, 'tekshapers', 'testing desription', '3', '2017-03-28', '2017-04-19', '1490597601_Hydrangeas.jpg', '0000-00-00 00:00:00', '2017-03-27 12:23:21', '1', 0, 0),
(10, 68, 'abha tek', 'abha tek', '3', '2017-03-30', '2017-03-31', '1490599556_Hydrangeas.jpg', '0000-00-00 00:00:00', '2017-03-27 12:55:56', '1', 0, 0),
(11, 103, 'abha sharma', 'abha sharma', '3', '2017-03-27', '2017-03-27', '1490261936_Jellyfish.jpg', '0000-00-00 00:00:00', '2017-03-27 01:01:08', '1', 0, 0),
(12, 79, 'abha 1', 'abha 1', '3', '2017-03-27', '2017-03-27', '1490261936_Jellyfish.jpg', '0000-00-00 00:00:00', '2017-03-27 01:01:45', '1', 0, 0),
(13, 152, 'akash', 'aksha', '3', '2017-03-27', '2017-03-27', '1490606155_Koala.jpg', '0000-00-00 00:00:00', '2017-03-27 02:45:55', '1', 0, 0),
(14, 79, 'dsfdf', 'dfdfd', '3', '2017-03-30', '2017-03-30', '1490616833_Koala.jpg', '0000-00-00 00:00:00', '2017-03-27 05:43:53', '1', 0, 0),
(15, 79, 'drtgrg', 'tryrtyrt', '3', '2017-03-29', '2017-03-29', '', '2017-03-27 05:46:34', '2017-03-27 05:46:07', '1', 79, 79),
(19, 84, 'saa', 'sadasdas', '2', '2017-03-31', '2017-03-31', '1490951508_Koala.jpg', '0000-00-00 00:00:00', '2017-03-31 02:41:48', '1', 84, 0),
(21, 128, 'rtgr', 'rtyty', '3', '2017-04-19', '2017-04-19', '', '0000-00-00 00:00:00', '2017-04-03 12:44:27', '2', 128, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_view_logs`
--
ALTER TABLE `admin_view_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_schedular`
--
ALTER TABLE `appointment_schedular`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_master`
--
ALTER TABLE `area_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kids`
--
ALTER TABLE `kids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_service`
--
ALTER TABLE `manage_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents_detail`
--
ALTER TABLE `parents_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia_sites`
--
ALTER TABLE `socialmedia_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_change_request`
--
ALTER TABLE `vendor_change_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_details`
--
ALTER TABLE `vendor_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_invoice`
--
ALTER TABLE `vendor_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_location`
--
ALTER TABLE `vendor_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_notice`
--
ALTER TABLE `vendor_notice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_view_logs`
--
ALTER TABLE `admin_view_logs`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `appointment_schedular`
--
ALTER TABLE `appointment_schedular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `area_master`
--
ALTER TABLE `area_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `kids`
--
ALTER TABLE `kids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `manage_service`
--
ALTER TABLE `manage_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `parents_detail`
--
ALTER TABLE `parents_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `socialmedia_sites`
--
ALTER TABLE `socialmedia_sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT for table `vendor_change_request`
--
ALTER TABLE `vendor_change_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `vendor_details`
--
ALTER TABLE `vendor_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `vendor_invoice`
--
ALTER TABLE `vendor_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `vendor_location`
--
ALTER TABLE `vendor_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT for table `vendor_notice`
--
ALTER TABLE `vendor_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
