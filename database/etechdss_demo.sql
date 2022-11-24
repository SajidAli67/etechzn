-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 09:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etechdss_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `statuts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `name`, `statuts`) VALUES
(1, 'HR Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agents_pay_methods`
--

CREATE TABLE `agents_pay_methods` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `pay_method_id` int(11) NOT NULL,
  `pay_id` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents_pay_methods`
--

INSERT INTO `agents_pay_methods` (`id`, `agent_id`, `pay_method_id`, `pay_id`, `status`) VALUES
(1, 2, 1, '+8801989154755', 1),
(2, 2, 2, '+8801747543215', 1),
(3, 2, 2, '+01235685255', 1),
(4, 2, 1, '50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bet_category`
--

CREATE TABLE `bet_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bet_category`
--

INSERT INTO `bet_category` (`id`, `cat_name`, `status`) VALUES
(1, 'Football', 1),
(2, 'Cricket', 1),
(3, 'Cricket', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bet_user_history`
--

CREATE TABLE `bet_user_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bet_id` int(11) NOT NULL,
  `country_select_id` int(11) NOT NULL,
  `play_status` varchar(100) NOT NULL,
  `win_loss_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bet_user_history`
--

INSERT INTO `bet_user_history` (`id`, `user_id`, `bet_id`, `country_select_id`, `play_status`, `win_loss_amount`) VALUES
(3, 1118, 2, 4, 'padding', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(50) NOT NULL,
  `com_address` varchar(100) NOT NULL,
  `com_logo` varchar(50) NOT NULL,
  `com_regi` varchar(50) NOT NULL,
  `com_reg_date` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`com_id`, `com_name`, `com_address`, `com_logo`, `com_regi`, `com_reg_date`, `status`) VALUES
(18, 'Dowel Shomobay Shomity Ltd.', 'Rupdia Jessore, H-422, 2nd-floor', 'images.jpg', 'License - 201235 ', '2020-09-22', '1');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_category`
--

CREATE TABLE `deposit_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit_category`
--

INSERT INTO `deposit_category` (`id`, `name`, `status`) VALUES
(1, 'Small Deposit', 1),
(2, 'Medium Deposit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `financial_req_log`
--

CREATE TABLE `financial_req_log` (
  `id` int(255) NOT NULL,
  `req_id` int(50) NOT NULL,
  `apr_id` int(50) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `req_amount` int(20) NOT NULL,
  `apr_amount` int(20) NOT NULL,
  `req_date` varchar(20) NOT NULL,
  `apr_date` varchar(20) NOT NULL,
  `req_time` varchar(50) NOT NULL,
  `apr_time` varchar(50) NOT NULL,
  `req_auth` int(20) NOT NULL,
  `apr_auth` int(20) NOT NULL,
  `req_status` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packages_term`
--

CREATE TABLE `packages_term` (
  `id` int(11) NOT NULL,
  `terms_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `daily_percentage` int(11) NOT NULL,
  `ref_vl1_percent` int(11) NOT NULL,
  `ref_lvl2_percent` int(11) NOT NULL,
  `ref_lvl3_percent` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date1` varchar(255) NOT NULL,
  `time1` varchar(255) NOT NULL,
  `timestamp1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages_term`
--

INSERT INTO `packages_term` (`id`, `terms_name`, `amount`, `days`, `daily_percentage`, `ref_vl1_percent`, `ref_lvl2_percent`, `ref_lvl3_percent`, `status`, `author`, `date1`, `time1`, `timestamp1`) VALUES
(1, 'Learner', 25, 60, 50, 5, 3, 2, 1, '3', '17-04-2019', '15:56:34', '1555437600'),
(2, 'Basic', 60, 60, 50, 5, 3, 2, 1, '3', '17-04-2019', '15:56:53', '1555437600'),
(3, 'Standard', 100, 60, 50, 5, 3, 2, 1, '3', '17-04-2019', '15:57:01', '1555437600'),
(4, 'Standard Pro', 250, 60, 50, 5, 3, 2, 1, '1', '17-04-2019', '15:57:01', '1555437600'),
(5, 'Deluxe', 500, 60, 50, 5, 3, 2, 1, '1', '17-04-2019', '15:57:01', '1555437600'),
(6, 'Premium', 1000, 60, 50, 5, 3, 2, 1, '3', '17-04-2019', '15:57:01', '1555437600'),
(7, 'Diamond ', 2000, 60, 50, 5, 3, 2, 1, '3', '17-04-2019', '15:57:01', '1555437600'),
(8, 'Blue Dimond  ', 2500, 60, 60, 5, 3, 2, 1, '3', '17-04-2019', '15:57:01', '1555437600'),
(9, 'Professional ', 5000, 60, 70, 5, 3, 2, 1, '3\n', '17-04-2019', '15:57:01', '1555437600'),
(10, 'VIP', 10000, 60, 50, 5, 3, 2, 1, '3', '17-04-2019', '15:57:01', '1555437600');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `image`, `status`) VALUES
(1, 'bKash', 'bikash.png', 1),
(2, 'Nagad', 'nagad.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `swipe_trade`
--

CREATE TABLE `swipe_trade` (
  `id` int(11) NOT NULL,
  `big` int(11) NOT NULL,
  `small` int(11) NOT NULL,
  `even` int(11) NOT NULL,
  `odd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `aId` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `agent_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `joinDate` varchar(255) NOT NULL,
  `joinTime` varchar(255) NOT NULL,
  `timestamp1` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `verify_status` varchar(255) NOT NULL,
  `verify_code` text NOT NULL,
  `forgotPasswordCode` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `last_update` varchar(50) NOT NULL,
  `author` varchar(255) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`aId`, `user_id`, `agent_id`, `username`, `email`, `joinDate`, `joinTime`, `timestamp1`, `password`, `salt`, `role`, `verify_status`, `verify_code`, `forgotPasswordCode`, `ip`, `status`, `last_update`, `author`, `approved`) VALUES
(1, 0, 0, 'admin', 'effety@gmail.com', '26-11-2017', '17:33:42', '1511632800', '0d07890c8f798c911b4e19c5910690ad6664accbe5af5c89b5ae15953a0fb249', '26758cb077470958', 'admins', 'Y', '', '', '', 1, '', '1', 1),
(41, 1115, 0, 'asad321', 'asad321@gmail.com', '2022-10-20', '00:55:45', '2022-10-20 00:55:45', '38bd506a7ee73f865a18feffbdf17407eb76932ca99de79e7acafc0cb4418db9', '6a4cbc8a3fe9474c', 'user', 'Y', '0', '', '0', 1, '2022-10-20', '0', 1),
(42, 1116, 0, 'sdgdsg', 'ukukkk@gmail.com', '2022-10-20', '01:13:32', '2022-10-20 01:13:32', 'bf0a0e04db2562bc968a10b2e6707d0fb368d6919aaada3fc1a7c4fbb924eaa9', '52de99d51dabd5ce', 'user', 'Y', '0', '0', '0', 1, '2022-10-20', '0', 1),
(44, 1118, 0, 'mm321', 'mm@gmail.com', '2022-10-21', '19:42:01', '2022-10-21 19:42:01', '0d07890c8f798c911b4e19c5910690ad6664accbe5af5c89b5ae15953a0fb249', '26758cb077470958', 'user', 'Y', '0', '', '0', 1, '2022-10-21', '0', 1),
(45, 0, 2, 'effety', 'gasjkhgshajk@gmail.com', '2022-10-27', '04:44:44', '2022-10-27 04:44:44', 'e89132582a80f6729551a3bfb181aba4d023b7aabd6afebf0e5c252991e091d0', '1907137721b6b2a', 'agent', 'Y', '0', '', '0', 1, '2022-10-27', '0', 1),
(46, 1120, 0, 'turzo', 'turzo@gmail.com', '2022-11-09', '16:21:36', '2022-11-09 16:21:36', '0b1675bbc301198b91adc995f51f81ef5c78f94862785f213758b82509710724', '42249eb678b2707b', 'user', 'Y', '0', '', '0', 1, '2022-11-09', '0', 1),
(49, 1123, 3, 'sajid.ali67@outlook.com', 'sajid.ali67@outlook.com', '2022-11-13', '21:14:44', '2022-11-13 21:14:44', '5c6c9f950ce46f542f7e3e2697d1db107272e5dcf5dbbf9df72df4c3ea389841', '21f8b3c4aefcc', 'agent', 'Y', '0', '', '0', 1, '2022-11-13', '0', 1),
(50, 1124, 4, 'admin33@demo.com', 'admin33@demo.com', '2022-11-13', '21:24:08', '2022-11-13 21:24:08', 'dfe31d8a9a75c339b464809a4ddb401410f670be8cc5fe57a84173bcadde5777', '7097f6e751fa4eb3', 'agent', 'Y', '0', '', '0', 1, '2022-11-13', '0', 1),
(51, 1125, 5, 'asad', 'asad@hotmail.com', '2022-11-13', '22:41:36', '2022-11-13 22:41:36', 'bfc3a1d9f17b09ea152afbd0309f5c805ffba1f7e462b636ef80c371a02c2145', '482d3d32847a629', 'agent', 'Y', '0', '0', '0', 1, '2022-11-13', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent`
--

CREATE TABLE `tbl_agent` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `withdraw_balance` int(11) NOT NULL,
  `country` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `profile_photo` varchar(100) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `balance` float NOT NULL,
  `status` int(11) NOT NULL,
  `joinDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agent`
--

INSERT INTO `tbl_agent` (`id`, `name`, `gender`, `address`, `withdraw_balance`, `country`, `phone`, `profile_photo`, `photo1`, `photo2`, `balance`, `status`, `joinDate`) VALUES
(1, 'Asaduzzaman ', '', '', 0, 'Bangladesh', '+8801989054735', '', '', '', 500, 1, '2022-11-14 21:22:27'),
(2, 'Effety Hassan', 'Male', 'Jessore, Khulna', 0, 'BD', '019891547', '16683524842200.jpeg', '', '', 200, 1, '2022-11-14 21:31:52'),
(3, 'sajid Ali', '', '', 0, 'Pakistan', '955367762', '', '16683524842200.jpeg', '1668352484272.jpeg', 0, 1, '2022-11-14 21:22:27'),
(4, 'sajid Ali', '', '', 0, 'Pakistan', '03339174310', '', '16683530482370.jpeg', '16683530481431.jpeg', 0, 1, '2022-11-14 21:22:27'),
(5, 'Asad', '', '', 0, 'Bangladesh', '1954372008', '', '1668357696247.jpg', '16683576961823.jpg', 0, 1, '2022-11-14 21:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_balance`
--

CREATE TABLE `tbl_balance` (
  `balance_id` int(11) NOT NULL,
  `balance_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_balance`
--

INSERT INTO `tbl_balance` (`balance_id`, `balance_amount`, `status`) VALUES
(1, 438, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bet`
--

CREATE TABLE `tbl_bet` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `country1st_id` int(11) NOT NULL,
  `interest_1st` int(11) NOT NULL,
  `country2nd_id` int(11) NOT NULL,
  `interest_2nd` int(11) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `win_status` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bet`
--

INSERT INTO `tbl_bet` (`id`, `cat_id`, `country1st_id`, `interest_1st`, `country2nd_id`, `interest_2nd`, `start_time`, `end_time`, `win_status`, `status`) VALUES
(1, 2, 4, 75, 3, 50, '2022-10-30 10:15:32', '2022-10-30 10:15:32', 'pending', 1),
(2, 2, 4, 50, 3, 60, '2022-11-17', '2022-11-22', 'padding', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id` bigint(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciver_id` int(11) NOT NULL,
  `img` varchar(150) NOT NULL,
  `view` tinyint(4) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `message`, `sender_id`, `reciver_id`, `img`, `view`, `time`) VALUES
(28, 'hi', 44, 2, '', 0, '2022-11-16 18:49:29'),
(29, 'hi\r\n', 44, 1, '', 0, '2022-11-16 19:12:39'),
(30, '', 44, 1, '605423796.jpeg', 0, '2022-11-16 19:24:09'),
(31, 'Hello\r\n', 44, 1, '', 0, '2022-11-17 12:28:36'),
(32, 'Test ', 44, 2, '', 0, '2022-11-17 12:29:28'),
(33, '', 44, 2, '1865687632.jpg', 0, '2022-11-17 12:29:48'),
(34, 'hello', 2, 44, '', 1, '2022-11-17 14:53:42'),
(35, 'hi admin I am effect', 44, 0, '', 1, '2022-11-23 19:57:06'),
(36, 'hi effect I am admin ', 0, 44, '', 1, '2022-11-23 20:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `flage` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `name`, `flage`, `status`) VALUES
(3, 'Bangladesh', 'Bangladesh.svg', 1),
(4, 'Pakistan', 'Pakistan.svg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_credit`
--

CREATE TABLE `tbl_credit` (
  `credit_id` int(255) NOT NULL,
  `branch_id` int(255) NOT NULL,
  `author` int(20) NOT NULL,
  `credit_details` varchar(100) NOT NULL,
  `credit_amount` int(11) NOT NULL,
  `credit_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_credit`
--

INSERT INTO `tbl_credit` (`credit_id`, `branch_id`, `author`, `credit_details`, `credit_amount`, `credit_date`) VALUES
(41, 6, 11, 'Printing & Photocopy', 20, '2019-11-17'),
(40, 1, 11, 'Printing & Photocopy', 20, '2019-11-07'),
(39, 1, 11, 'Salary', 5000, '2019-11-05'),
(38, 1, 11, 'Electric Bill', 205, '2019-10-28'),
(37, 1, 11, 'Computer Service', 60, '2019-10-17'),
(36, 1, 11, 'Internet Bill', 2000, '2019-10-15'),
(35, 1, 11, 'Printing & Photocopy', 5707, '2019-10-13'),
(34, 1, 11, 'Electric Bill', 2833, '2019-10-13'),
(33, 1, 11, 'Advance Office Rent', 10000, '2019-10-13'),
(32, 1, 11, 'Salary', 61750, '2019-10-13'),
(31, 1, 11, 'Funiture', 7880, '2019-10-13'),
(30, 1, 11, 'Office Rent', 15000, '2019-10-13'),
(42, 1, 11, 'Printing & Photocopy', 110, '2019-11-23'),
(43, 1, 11, 'Electric Bill', 150, '2019-11-25'),
(44, 1, 11, 'Printing & Photocopy', 20, '2019-11-28'),
(45, 1, 11, 'Salary', 5000, '2019-12-05'),
(46, 1, 11, 'Printing & Photocopy', 40, '2019-12-19'),
(47, 1, 11, 'Internet Bill', 1000, '2019-12-21'),
(48, 1, 11, 'Printing & Photocopy', 120, '2019-12-23'),
(49, 1, 11, 'Printing & Photocopy', 20, '2019-12-26'),
(50, 1, 11, 'Salary', 5000, '2020-01-06'),
(51, 1, 11, 'Internet Bill', 500, '2020-01-13'),
(52, 1, 11, 'Printing & Photocopy', 20, '2020-01-23'),
(53, 1, 11, 'Printing & Photocopy', 30, '2020-02-05'),
(54, 1, 11, 'Salary', 5000, '2020-02-05'),
(55, 1, 11, 'Printing & Photocopy', 45, '2020-02-16'),
(56, 1, 11, 'Printing & Photocopy', 130, '2020-02-19'),
(57, 1, 11, 'Internet Bill', 500, '2020-02-27'),
(58, 1, 11, 'Salary', 5000, '2020-03-07'),
(59, 1, 11, 'Internet Bill', 500, '2020-03-09'),
(60, 1, 11, 'Printing & Photocopy', 20, '2020-03-23'),
(61, 1, 11, 'Printing & Photocopy', 815, '2020-06-02'),
(62, 1, 11, 'Room Repairing', 1500, '2020-06-06'),
(63, 1, 11, 'Printing & Photocopy', 40, '2020-06-08'),
(64, 1, 11, 'Printing & Photocopy', 10, '2020-06-11'),
(65, 1, 11, 'Printing & Photocopy', 20, '2020-06-28'),
(66, 1, 11, 'Printing & Photocopy', 20, '2020-07-05'),
(67, 1, 11, 'Printing & Photocopy', 70, '2020-07-16'),
(68, 1, 11, 'Internet Bill', 500, '2020-07-30'),
(69, 1, 11, 'Salary', 20000, '2020-07-30'),
(70, 1, 11, 'Printing & Photocopy', 30, '2020-08-08'),
(71, 1, 11, 'Salary', 8000, '2020-08-09'),
(72, 1, 11, 'Office Repairing', 600, '2020-08-09'),
(74, 6, 9, 'test', 0, '2021-11-16'),
(75, 1, 11, 'Office Rent', 1000, '2021-11-18'),
(76, 1, 11, 'Electric Bill', 345, '2021-11-18'),
(77, 1, 11, 'Printing & Photocopy', 70, '2021-11-18'),
(78, 1, 11, 'Salary', 6500, '2021-11-18'),
(79, 1, 11, 'Printing & Photocopy', 20, '2021-11-18'),
(80, 1, 11, 'Printing & Photocopy', 1450, '2021-11-21'),
(81, 1, 11, 'Night Guard Bill', 100, '2021-11-21'),
(82, 1, 11, 'Office Rent', 1000, '2021-11-21'),
(83, 1, 11, 'Guest Bill', 20, '2021-11-21'),
(84, 1, 39, 'Electric Bill', 510, '2021-11-25'),
(85, 1, 39, 'Guest Bill', 20, '2021-11-27'),
(86, 1, 39, 'Printing & Photocopy', 40, '2021-11-30'),
(87, 1, 11, 'Office Rent', 1000, '2021-12-02'),
(88, 1, 11, 'Internet Bill', 500, '2021-12-04'),
(89, 1, 11, 'Printing & Photocopy', 350, '2021-12-08'),
(90, 1, 11, 'Night Guard Bill', 100, '2021-12-12'),
(91, 1, 11, 'Cost For Cc Camera', 8960, '2021-12-14'),
(92, 1, 11, 'Guast Bill', 30, '2021-12-15'),
(93, 1, 11, 'Printing & Photocopy', 70, '2021-12-18'),
(94, 1, 11, 'Electric Bill', 290, '2021-12-27'),
(95, 1, 11, 'Office Rent', 1000, '2022-01-08'),
(96, 1, 11, 'Printing & Photocopy', 300, '2022-01-09'),
(97, 1, 11, 'Printing & Photocopy', 30, '2022-01-11'),
(98, 1, 11, 'Guest Bill', 40, '2022-01-13'),
(99, 1, 11, 'Night Guard Bill', 100, '2022-01-16'),
(100, 1, 11, 'Guest Bill', 20, '2022-01-22'),
(101, 1, 11, 'Carpeting Bazar Tax Bill', 600, '2022-01-22'),
(102, 1, 11, 'Internet Bill', 500, '2022-01-22'),
(103, 1, 11, 'Guest Bill', 30, '2022-01-25'),
(104, 1, 11, 'Electric Bill', 350, '2022-01-27'),
(105, 1, 11, 'Salary', 8500, '2022-02-06'),
(106, 1, 11, 'Office Rent', 1000, '2022-02-08'),
(107, 1, 11, 'Printing & Photocopy', 35, '2022-02-10'),
(108, 1, 11, 'Payment of Allowances', 5000, '2022-02-13'),
(109, 1, 11, 'Guest Bill', 30, '2022-02-13'),
(110, 1, 11, 'Ac No:10081, Sk Mohitullah Loan Interset Discount', 2000, '2022-02-14'),
(111, 1, 11, 'Night Guard Bill', 100, '2022-02-16'),
(112, 1, 11, 'Printing & Photocopy', 20, '2022-02-20'),
(113, 1, 11, 'Electric Bill', 453, '2022-02-26'),
(114, 1, 11, 'Salary', 8800, '2022-03-07'),
(115, 1, 11, 'Printing & Photocopy', 40, '2022-03-08'),
(116, 1, 11, 'Guest Bill', 20, '2022-03-12'),
(117, 1, 11, 'Internet Bill (January+February)', 1000, '2022-03-13'),
(118, 1, 11, 'Night Gurd Bill', 100, '2022-03-13'),
(119, 1, 11, 'Printing & Photocopy', 20, '2022-03-22'),
(120, 1, 11, 'Printing & Photocopy', 40, '2022-03-24'),
(121, 1, 11, 'Electric Bill', 400, '2022-03-27'),
(122, 1, 11, 'Salary', 8500, '2022-04-06'),
(123, 1, 11, 'Internet Bill', 500, '2022-04-10'),
(124, 1, 11, 'Night Guard Bill', 100, '2022-04-12'),
(125, 1, 11, 'Printing & Photocopy', 20, '2022-04-25'),
(126, 1, 11, 'Electric Bill', 506, '2022-04-25'),
(127, 1, 11, 'Salary (Tomal)', 3750, '2022-04-25'),
(128, 1, 11, 'Printing & Photocopy', 20, '2022-04-26'),
(129, 1, 11, 'Eid Bonus (Khokon)', 4875, '2022-04-27'),
(130, 1, 11, 'Ac No:10025, Md Shahin Gazi Loan Interset Discount', 880, '2022-05-07'),
(131, 1, 11, 'Salary', 6500, '2022-05-08'),
(132, 1, 11, 'Cycle Service Cost By', 160, '2022-05-18'),
(133, 1, 11, 'Internet Bill ', 500, '2022-05-25'),
(134, 1, 11, 'Electric Bill', 670, '2022-05-26'),
(135, 1, 11, 'Salary', 6500, '2022-06-05'),
(136, 6, 9, 'internet bill', 500, '2022-06-12'),
(137, 1, 11, 'Internet Bill', 500, '2022-06-12'),
(138, 1, 11, 'Night Guard Bill (April + May)', 200, '2022-06-14'),
(139, 1, 11, 'Cost By Cycle Service', 350, '2022-06-22'),
(140, 1, 11, 'Electric Bill', 561, '2022-06-27'),
(141, 1, 11, 'Printing & Photocopy', 45, '2022-06-28'),
(142, 1, 11, 'Cycle Service', 35, '2022-06-29'),
(143, 1, 11, 'Office Rent (February-June) ', 5000, '2022-07-06'),
(144, 1, 11, 'Salary (Ahmmed)', 3200, '2022-07-06'),
(145, 1, 11, 'Salary (Khokon)', 11900, '2022-07-06'),
(146, 1, 11, 'Printing & Photocopy', 45, '2022-07-07'),
(147, 1, 11, 'Internet Bill', 500, '2022-07-16'),
(148, 1, 11, 'Night Guard Bill', 100, '2022-07-16'),
(149, 1, 11, 'Salary', 8300, '2022-08-06'),
(150, 1, 11, 'Printing & Photocopy', 40, '2022-08-06'),
(151, 1, 11, 'Internet Bill', 500, '2022-08-11'),
(152, 1, 11, 'Printing & Photocopy', 235, '2022-08-16'),
(153, 1, 11, 'Computer Service Bill', 250, '2022-08-24'),
(154, 1, 11, 'Electric Bill', 398, '2022-08-27'),
(155, 1, 11, 'Office Rent', 2000, '2022-09-04'),
(156, 1, 11, 'Salary (Hridoy & Khokon)', 10000, '2022-09-05'),
(157, 1, 11, 'Night Gurd Bill', 200, '2022-09-11'),
(158, 1, 11, 'Printing & Photocopy', 50, '2022-09-11'),
(159, 1, 11, 'Internet Bill', 500, '2022-09-15'),
(160, 1, 11, 'Led Light Service', 180, '2022-09-19'),
(161, 1, 11, 'Electric Bill', 506, '2022-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customization`
--

CREATE TABLE `tbl_customization` (
  `cId` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'logo.png',
  `favicon` varchar(255) NOT NULL,
  `contactPhone` text NOT NULL,
  `copyright` text NOT NULL,
  `email` text NOT NULL,
  `fax` varchar(255) NOT NULL,
  `contactAddress` text NOT NULL,
  `gmap` text NOT NULL,
  `fromEmail` varchar(255) NOT NULL,
  `emailSubject` text NOT NULL,
  `emailThankYouMsg` text NOT NULL,
  `recentPost` varchar(255) NOT NULL,
  `popularPost` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date1` varchar(255) NOT NULL,
  `time1` varchar(255) NOT NULL,
  `timestamp1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customization`
--

INSERT INTO `tbl_customization` (`cId`, `logo`, `favicon`, `contactPhone`, `copyright`, `email`, `fax`, `contactAddress`, `gmap`, `fromEmail`, `emailSubject`, `emailThankYouMsg`, `recentPost`, `popularPost`, `author`, `date1`, `time1`, `timestamp1`) VALUES
(1, 'logo.png', '1a7c51069e.png', '+8801989154755', 'Copyright 2019, All Rights Reserved.', 'effety@gmail.com', '01989154755', 'Rupdia Jessore', '', '', '', '', '', '', '1', '29-03-2023', '14:13:15', '1522260000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deposit_payment`
--

CREATE TABLE `tbl_deposit_payment` (
  `dpayment_id` int(255) NOT NULL,
  `deposit_id` varchar(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `accId` int(255) NOT NULL,
  `br_id` int(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `d_terms` int(11) NOT NULL,
  `dpayment_amount` int(50) NOT NULL,
  `dpayment_totalAmount` int(255) NOT NULL,
  `dpayment_due` int(11) NOT NULL,
  `dpayment_date` varchar(255) NOT NULL,
  `dpayment_time` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `dpayment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_generalsettings`
--

CREATE TABLE `tbl_generalsettings` (
  `gId` int(11) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `siteTitle` text NOT NULL,
  `tagLine` text NOT NULL,
  `keyWords` text NOT NULL,
  `domainName` varchar(255) NOT NULL DEFAULT 'https://thememoor.com',
  `authorEamil` varchar(255) NOT NULL DEFAULT 'ruhulaminbd.me@gmail.com',
  `phone` varchar(30) NOT NULL DEFAULT '(000)-0000-0000',
  `membership` varchar(255) NOT NULL DEFAULT '1',
  `role` varchar(255) NOT NULL DEFAULT '1',
  `dateFormat` varchar(255) DEFAULT 'F j, Y',
  `timeFormat` varchar(255) DEFAULT 'g:i a',
  `teamPage` int(10) NOT NULL DEFAULT 4,
  `WorkGalleryPage` int(10) NOT NULL DEFAULT 4,
  `servicePage` int(10) NOT NULL DEFAULT 4,
  `photoGallery` int(10) NOT NULL,
  `videoGallery` int(10) NOT NULL,
  `perPageMember` int(11) NOT NULL,
  `perPageVideo` int(11) NOT NULL,
  `perPagefaq` int(11) NOT NULL,
  `perPageService` int(11) NOT NULL,
  `perPagePhoto` int(11) NOT NULL,
  `perPageNews` int(11) NOT NULL,
  `date1` varchar(255) NOT NULL,
  `time1` varchar(255) NOT NULL,
  `timestamp1` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_generalsettings`
--

INSERT INTO `tbl_generalsettings` (`gId`, `creator`, `siteTitle`, `tagLine`, `keyWords`, `domainName`, `authorEamil`, `phone`, `membership`, `role`, `dateFormat`, `timeFormat`, `teamPage`, `WorkGalleryPage`, `servicePage`, `photoGallery`, `videoGallery`, `perPageMember`, `perPageVideo`, `perPagefaq`, `perPageService`, `perPagePhoto`, `perPageNews`, `date1`, `time1`, `timestamp1`, `author`) VALUES
(1, '', 'Etech MCMS', '0', '0', 'etechdssl.org', 'effety@gmail.com', '+8801989154755', '1', '1', 'F j, Y', 'g:i a', 4, 3, 3, 3, 2, 3, 2, 5, 4, 3, 8, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_income`
--

CREATE TABLE `tbl_income` (
  `income_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `loan_terms` int(11) NOT NULL,
  `service_charge` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `details` text NOT NULL,
  `saving` int(11) NOT NULL,
  `loan` int(11) NOT NULL,
  `deposit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `mId` int(11) NOT NULL,
  `referral_code` varchar(255) NOT NULL,
  `lvl_rf_id1` int(11) NOT NULL,
  `lvl_rf_id2` int(11) NOT NULL,
  `lvl_rf_id3` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `balance` float NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `nid_front` varchar(100) NOT NULL,
  `nid_back` varchar(100) NOT NULL,
  `joinDate` varchar(255) NOT NULL,
  `joinTime` varchar(255) NOT NULL,
  `timestamp1` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL,
  `verify` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mId`, `referral_code`, `lvl_rf_id1`, `lvl_rf_id2`, `lvl_rf_id3`, `member_name`, `gender`, `birthday`, `nationality`, `city`, `phone`, `balance`, `address`, `photo`, `nid_front`, `nid_back`, `joinDate`, `joinTime`, `timestamp1`, `status`, `verify`) VALUES
(1094, 'refferel_code1094', 1094, 1094, 1094, 'agadgadg', 'None', 'None', 'None', 'None', 'None', 67.34, 'None', 'None', 'None', 'None', '2022-10-19', '20:57:57', '2022-10-19 20:57:57', '0', 0),
(1097, 'refferel_code1097', 1094, 1094, 1094, 'Effety', 'None', 'None', 'None', 'None', 'None', 24.35, 'None', 'None', 'None', 'None', '2022-10-19', '20:58:49', '2022-10-19 20:58:49', '0', 0),
(1112, 'refferel_code1112', 1097, 1093, 1095, 'Saira Riaz', 'None', 'None', 'None', 'None', 'None', 0, 'None', 'None', 'None', 'None', '2022-10-19', '23:10:30', '2022-10-19 23:10:30', '0', 0),
(1113, 'refferel_code1113', 1094, 1094, 1094, 'agadgadg', 'None', 'None', 'None', 'None', 'None', 0, 'None', 'None', 'None', 'None', '2022-10-19', '23:58:59', '2022-10-19 23:58:59', 'active', 0),
(1114, 'refferel_code1114', 1094, 1094, 1094, '', 'None', 'None', 'None', 'None', 'None', 0, 'None', 'None', 'None', 'None', '2022-10-20', '00:50:38', '2022-10-20 00:50:38', 'active', 0),
(1115, 'refferel_code1115', 1097, 1093, 1095, 'Asadduzaman', 'None', 'None', 'None', 'None', 'None', 0, 'None', 'None', 'None', 'None', '2022-10-20', '00:55:45', '2022-10-20 00:55:45', 'active', 0),
(1116, 'refferel_code1116', 1097, 1093, 1095, 'sdgsd dsgsg', 'None', 'None', 'None', 'None', 'None', 0, 'None', 'None', 'None', 'None', '2022-10-20', '01:13:32', '2022-10-20 01:13:32', 'active', 0),
(1117, 'refferel_code1117', 1094, 1094, 1094, 'Saira Riaz', 'None', 'None', 'None', 'None', 'None', 0, 'None', 'None', 'None', 'None', '2022-10-21', '18:33:23', '2022-10-21 18:33:23', 'active', 0),
(1118, 'refferel_code1118', 1097, 1094, 1094, 'effect', 'on', '2022-11-11', 'pakistani', 'Charsadda', '123456', 5010, 'Islamabad # 01 Nowshera Road Charsadda', '1669278466339.png', 'None', 'None', '2022-10-21', '19:42:01', '2022-10-21 19:42:01', 'active', 1),
(1119, 'refferel_code1119', 1094, 1094, 1094, 'effety', 'None', 'None', 'None', 'None', 'None', 0, 'None', 'None', 'None', 'None', '2022-10-27', '04:44:44', '2022-10-27 04:44:44', 'active', 0),
(1120, 'refferel_code1120', 1094, 1094, 1094, 'Turzo', 'None', 'None', 'None', 'None', 'None', 886, 'None', 'None', 'None', 'None', '2022-11-09', '16:21:36', '2022-11-09 16:21:36', 'active', 0),
(1123, 'refferel_code1123', 1094, 1094, 1094, 'sajid Ali', 'None', 'None', 'None', 'None', 'None', 0, 'None', 'None', 'None', 'None', '2022-11-13', '21:14:44', '2022-11-13 21:14:44', 'active', 0),
(1124, 'refferel_code1124', 1094, 1094, 1094, 'sajid Ali', 'None', 'None', 'None', 'None', 'None', 0, 'None', 'None', 'None', 'None', '2022-11-13', '21:24:08', '2022-11-13 21:24:08', 'active', 0),
(1125, 'refferel_code1125', 1094, 1094, 1094, 'Asad', 'None', 'None', 'None', 'None', 'None', 0, 'None', 'None', 'None', 'None', '2022-11-13', '22:41:36', '2022-11-13 22:41:36', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `msg_id` int(255) NOT NULL,
  `mId` int(255) DEFAULT 0,
  `subject` varchar(255) DEFAULT 'hello',
  `message` varchar(255) DEFAULT 'hello',
  `email` varchar(50) DEFAULT 'hello',
  `date1` varchar(255) NOT NULL,
  `time1` varchar(255) NOT NULL,
  `timestamp1` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`msg_id`, `mId`, `subject`, `message`, `email`, `date1`, `time1`, `timestamp1`, `status`) VALUES
(1, 1, 'hello', 'hello', 'hello', '7-14-2019', '', 'current_timestamp()', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otherfees`
--

CREATE TABLE `tbl_otherfees` (
  `otherfees_id` int(255) NOT NULL,
  `branch_id` int(255) NOT NULL,
  `author` int(255) NOT NULL,
  `otherfees_details` varchar(150) NOT NULL,
  `otherfees_amount` int(11) NOT NULL,
  `otherfees_date` varchar(20) NOT NULL,
  `otherfees_time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_otherfees`
--

INSERT INTO `tbl_otherfees` (`otherfees_id`, `branch_id`, `author`, `otherfees_details`, `otherfees_amount`, `otherfees_date`, `otherfees_time`) VALUES
(69, 1, 11, 'Welfare Fund', 375, '2021-11-17', '01:28:53pm'),
(71, 1, 11, 'Welfare Fund', 750, '2021-11-18', '06:16:07pm'),
(72, 1, 11, 'Admission Fee', 50, '2021-11-21', '02:24:27pm'),
(73, 1, 11, 'Pass Book', 50, '2021-11-21', '02:24:39pm'),
(74, 1, 11, 'Admission Fee', 50, '2021-11-24', '01:45:45pm'),
(75, 1, 11, 'Pass Book', 50, '2021-11-24', '01:46:02pm'),
(76, 1, 11, 'Welfare Fund', 150, '2021-12-05', '02:04:44pm'),
(77, 1, 11, 'Welfare Fund', 300, '2021-12-06', '02:00:30pm'),
(78, 1, 11, 'Admission Fee', 25, '2021-12-09', '02:13:48pm'),
(79, 1, 11, 'Pass Book', 25, '2021-12-09', '02:14:01pm'),
(80, 1, 11, 'Welfare Fund', 600, '2021-12-09', '02:14:31pm'),
(81, 1, 11, 'Welfare Fund', 450, '2021-12-23', '01:30:53pm'),
(82, 1, 11, 'Admission Fee', 50, '2022-01-25', '07:08:51pm'),
(83, 1, 11, 'Pass Book', 50, '2022-01-25', '07:09:04pm'),
(84, 1, 11, 'Walefare Fund', 375, '2022-01-25', '07:10:28pm'),
(85, 1, 11, 'Admission Fee', 25, '2022-01-29', '06:01:38pm'),
(86, 1, 11, 'Pass Book', 25, '2022-01-29', '06:01:52pm'),
(87, 1, 11, 'Walfare Fund', 300, '2022-02-09', '06:44:48pm'),
(88, 1, 11, 'Welfare Fund', 1050, '2022-02-13', '06:19:36pm'),
(89, 1, 11, 'Welfare Fund', 1500, '2022-02-14', '12:57:26pm'),
(90, 1, 11, 'Welfare Fund', 600, '2022-02-17', '04:28:45pm'),
(91, 1, 11, 'Welfare Fund', 120, '2022-02-22', '06:21:27pm'),
(92, 1, 11, 'Welfare Fund', 45, '2022-02-26', '05:51:27pm'),
(93, 1, 11, 'Admission Fee', 25, '2022-03-02', '05:43:39pm'),
(94, 1, 11, 'Pass Book', 25, '2022-03-02', '05:43:48pm'),
(95, 1, 11, 'Welfare Fund', 450, '2022-03-12', '06:00:45pm'),
(96, 1, 11, 'Welfare Fund', 375, '2022-03-21', '05:19:30pm'),
(97, 1, 11, 'Welfare Fund', 375, '2022-03-31', '06:19:12pm'),
(98, 1, 11, 'Welfare Fund', 450, '2022-04-05', '05:06:52pm'),
(99, 1, 11, 'Welfare Fund', 225, '2022-04-21', '05:23:37pm'),
(100, 6, 9, 'service charge', 2300, '2022-06-12', '05:12:31pm'),
(101, 1, 11, 'Welfare Fund', 1050, '2022-06-28', '07:22:43pm'),
(102, 1, 11, 'Admission Fee', 50, '2022-06-28', '07:37:08pm'),
(103, 1, 11, 'Pass Book', 50, '2022-06-28', '07:37:21pm'),
(104, 1, 11, 'Admission Fee', 50, '2022-06-30', '07:38:22pm'),
(105, 1, 11, 'Pass Book', 50, '2022-06-30', '07:38:31pm'),
(106, 1, 11, 'Welfare Fund', 75, '2022-07-06', '07:10:56pm'),
(107, 1, 11, 'Welfare Fund', 825, '2022-07-07', '07:33:44pm'),
(108, 1, 11, 'Welfare Fund', 75, '2022-08-01', '05:51:54pm'),
(109, 1, 11, 'Admission Fee', 50, '2022-08-14', '06:26:15pm'),
(110, 1, 11, 'Pass Book', 50, '2022-08-14', '06:26:25pm'),
(111, 1, 11, 'Admission Fee', 50, '2022-08-25', '06:18:22pm'),
(112, 1, 11, 'Passbook', 50, '2022-08-25', '06:18:35pm'),
(113, 1, 11, 'Welfare Fund', 150, '2022-08-28', '06:45:00pm'),
(114, 1, 11, 'Welfare Fund', 150, '2022-09-12', '06:18:16pm'),
(115, 1, 11, 'Welfare Fund', 300, '2022-09-15', '06:59:07pm'),
(116, 1, 11, 'Admission Fee', 50, '2022-09-20', '06:38:20pm'),
(117, 1, 11, 'Pass Book', 50, '2022-09-20', '06:38:30pm'),
(118, 1, 11, 'Welfare Fund', 450, '2022-09-27', '07:21:37pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packages`
--

CREATE TABLE `tbl_packages` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pack_term` int(11) NOT NULL,
  `ref_lv1` int(255) NOT NULL,
  `ref_lv2` varchar(50) NOT NULL,
  `ref_lvl3` int(255) NOT NULL,
  `total_duration` int(11) NOT NULL,
  `duration_count` int(255) NOT NULL,
  `pack_amount` int(255) NOT NULL,
  `pack_nterest` int(25) NOT NULL,
  `intervalDate` varchar(50) NOT NULL,
  `interval_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_packages`
--

INSERT INTO `tbl_packages` (`id`, `user_id`, `pack_term`, `ref_lv1`, `ref_lv2`, `ref_lvl3`, `total_duration`, `duration_count`, `pack_amount`, `pack_nterest`, `intervalDate`, `interval_time`, `status`) VALUES
(389, 1118, 3, 1097, '1094', 1094, 60, 0, 100, 50, '2022-11-01 20:39:43', '2022-11-01 14:39:43', '0'),
(390, 1118, 3, 1097, '1094', 1094, 60, 0, 100, 50, '2022-11-01 20:51:13', '2022-11-01 14:51:13', '0'),
(391, 1118, 1, 1097, '1094', 1094, 60, 0, 25, 50, '2022-11-02 03:41:38', '2022-11-01 21:41:38', '0'),
(392, 1118, 2, 1097, '1094', 1094, 60, 0, 60, 50, '2022-11-16', '2022-11-13 22:25:04', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `trades`
--

CREATE TABLE `trades` (
  `id` int(255) NOT NULL,
  `tr_id` varchar(255) NOT NULL,
  `log_trade` float NOT NULL,
  `short_trade` float NOT NULL,
  `trade_cat` int(10) NOT NULL,
  `trade_term` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trades`
--

INSERT INTO `trades` (`id`, `tr_id`, `log_trade`, `short_trade`, `trade_cat`, `trade_term`, `duration`, `start_time`, `end_time`, `date`, `status`) VALUES
(1, '856', 0, 0, 1, 2, 5, '2022-11-17 16:04:12', '2022-11-17 22:09:12', '31-10-2022', '1'),
(4, '33', 0, 0, 2, 1, 1, '2022-11-17 16:04:03', '2022-11-17 22:05:03', '31-10-2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `trade_category`
--

CREATE TABLE `trade_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trade_category`
--

INSERT INTO `trade_category` (`id`, `name`, `status`) VALUES
(1, 'Binary Trade', 1),
(2, 'Swipe Trade ', 1),
(3, 'Special trade', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trade_history`
--

CREATE TABLE `trade_history` (
  `id` int(11) NOT NULL,
  `tr_id` int(11) NOT NULL,
  `log_trade_amount` int(11) NOT NULL,
  `short_trade_amount` int(11) NOT NULL,
  `trade_cat` int(11) NOT NULL,
  `trade_term` int(11) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `win_type` varchar(50) NOT NULL,
  `loss_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trade_history`
--

INSERT INTO `trade_history` (`id`, `tr_id`, `log_trade_amount`, `short_trade_amount`, `trade_cat`, `trade_term`, `start_time`, `end_time`, `win_type`, `loss_type`) VALUES
(24439, 732, 0, 0, 1, 2, '2022-11-17 08:08:12', '2022-11-17 08:12:02', 'short', 'long'),
(24440, 733, 0, 0, 1, 2, '2022-11-17 08:13:01', '2022-11-17 08:18:01', 'short', 'long'),
(24441, 734, 0, 0, 1, 2, '2022-11-17 08:19:01', '2022-11-17 08:24:01', 'short', 'long'),
(24442, 735, 0, 0, 1, 2, '2022-11-17 08:25:01', '2022-11-17 08:30:01', 'short', 'long'),
(24443, 735, 0, 0, 1, 2, '2022-11-17 08:30:04', '2022-11-17 08:35:04', 'short', 'long'),
(24444, 735, 0, 0, 1, 2, '2022-11-17 08:35:30', '2022-11-17 08:40:30', 'short', 'long'),
(24445, 735, 0, 0, 1, 2, '2022-11-17 08:40:31', '2022-11-17 08:45:31', 'short', 'long'),
(24446, 736, 0, 0, 1, 2, '2022-11-17 08:46:01', '2022-11-17 08:51:01', 'short', 'long'),
(24447, 736, 0, 0, 1, 2, '2022-11-17 08:51:30', '2022-11-17 08:56:30', 'short', 'long'),
(24448, 736, 0, 0, 1, 2, '2022-11-17 08:56:31', '2022-11-17 09:01:31', 'short', 'long'),
(24449, 736, 0, 0, 1, 2, '2022-11-17 09:01:35', '2022-11-17 09:06:35', 'short', 'long'),
(24450, 737, 0, 0, 1, 2, '2022-11-17 09:07:01', '2022-11-17 09:12:01', 'short', 'long'),
(24451, 737, 0, 0, 1, 2, '2022-11-17 09:12:30', '2022-11-17 09:17:30', 'short', 'long'),
(24452, 737, 0, 0, 1, 2, '2022-11-17 09:17:31', '2022-11-17 09:22:31', 'short', 'long'),
(24453, 737, 0, 0, 1, 2, '2022-11-17 09:22:32', '2022-11-17 09:27:32', 'short', 'long'),
(24454, 738, 0, 0, 1, 2, '2022-11-17 09:28:01', '2022-11-17 09:33:01', 'short', 'long'),
(24455, 739, 0, 0, 1, 2, '2022-11-17 09:34:02', '2022-11-17 09:39:02', 'short', 'long'),
(24456, 740, 0, 0, 1, 2, '2022-11-17 09:40:01', '2022-11-17 09:45:01', 'short', 'long'),
(24457, 741, 0, 0, 1, 2, '2022-11-17 09:46:01', '2022-11-17 09:51:01', 'short', 'long'),
(24458, 742, 0, 0, 1, 2, '2022-11-17 09:52:01', '2022-11-17 09:57:01', 'short', 'long'),
(24459, 743, 0, 0, 1, 2, '2022-11-17 09:58:01', '2022-11-17 10:03:01', 'short', 'long'),
(24460, 744, 0, 0, 1, 2, '2022-11-17 10:04:01', '2022-11-17 10:09:01', 'short', 'long'),
(24461, 745, 0, 0, 1, 2, '2022-11-17 10:10:01', '2022-11-17 10:15:01', 'short', 'long'),
(24462, 746, 0, 0, 1, 2, '2022-11-17 10:16:02', '2022-11-17 10:21:02', 'short', 'long'),
(24463, 747, 0, 0, 1, 2, '2022-11-17 10:22:01', '2022-11-17 10:27:01', 'short', 'long'),
(24464, 748, 0, 0, 1, 2, '2022-11-17 10:27:02', '2022-11-17 10:32:02', 'short', 'long'),
(24465, 749, 0, 0, 1, 2, '2022-11-17 10:33:01', '2022-11-17 10:38:01', 'short', 'long'),
(24466, 750, 0, 0, 1, 2, '2022-11-17 10:39:01', '2022-11-17 10:44:01', 'short', 'long'),
(24467, 751, 0, 0, 1, 2, '2022-11-17 10:45:02', '2022-11-17 10:50:02', 'short', 'long'),
(24468, 752, 0, 0, 1, 2, '2022-11-17 10:51:02', '2022-11-17 10:56:01', 'short', 'long'),
(24469, 753, 0, 0, 1, 2, '2022-11-17 10:57:01', '2022-11-17 11:02:01', 'short', 'long'),
(24470, 754, 0, 0, 1, 2, '2022-11-17 11:03:01', '2022-11-17 11:08:01', 'short', 'long'),
(24471, 755, 0, 0, 1, 2, '2022-11-17 11:09:02', '2022-11-17 11:14:02', 'short', 'long'),
(24472, 756, 0, 0, 1, 2, '2022-11-17 11:15:01', '2022-11-17 11:20:01', 'short', 'long'),
(24473, 757, 0, 0, 1, 2, '2022-11-17 11:21:01', '2022-11-17 11:26:01', 'short', 'long'),
(24474, 758, 0, 0, 1, 2, '2022-11-17 11:27:01', '2022-11-17 11:32:01', 'short', 'long'),
(24475, 759, 0, 0, 1, 2, '2022-11-17 11:33:01', '2022-11-17 11:38:01', 'short', 'long'),
(24476, 760, 0, 0, 1, 2, '2022-11-17 11:38:02', '2022-11-17 11:43:02', 'short', 'long'),
(24477, 761, 0, 0, 1, 2, '2022-11-17 11:44:02', '2022-11-17 11:49:02', 'short', 'long'),
(24478, 762, 0, 0, 1, 2, '2022-11-17 11:50:01', '2022-11-17 11:55:01', 'short', 'long'),
(24479, 763, 0, 0, 1, 2, '2022-11-17 11:55:02', '2022-11-17 12:00:02', 'short', 'long'),
(24480, 764, 0, 0, 1, 2, '2022-11-17 12:01:01', '2022-11-17 12:06:01', 'short', 'long'),
(24481, 765, 0, 0, 1, 2, '2022-11-17 12:06:02', '2022-11-17 12:11:02', 'short', 'long'),
(24482, 766, 0, 0, 1, 2, '2022-11-17 12:12:01', '2022-11-17 12:17:01', 'short', 'long'),
(24483, 767, 0, 0, 1, 2, '2022-11-17 12:17:02', '2022-11-17 12:22:02', 'short', 'long'),
(24484, 768, 0, 0, 1, 2, '2022-11-17 12:23:01', '2022-11-17 12:28:01', 'short', 'long'),
(24485, 769, 0, 0, 1, 2, '2022-11-17 12:29:01', '2022-11-17 12:34:01', 'short', 'long'),
(24486, 770, 0, 0, 1, 2, '2022-11-17 12:35:01', '2022-11-17 12:40:01', 'short', 'long'),
(24487, 771, 0, 0, 1, 2, '2022-11-17 12:40:02', '2022-11-17 12:45:02', 'short', 'long'),
(24488, 772, 0, 0, 1, 2, '2022-11-17 12:46:01', '2022-11-17 12:51:01', 'short', 'long'),
(24489, 773, 0, 0, 1, 2, '2022-11-17 12:52:02', '2022-11-17 12:57:02', 'short', 'long'),
(24490, 774, 0, 0, 1, 2, '2022-11-17 12:58:01', '2022-11-17 13:03:01', 'short', 'long'),
(24491, 775, 0, 0, 1, 2, '2022-11-17 13:04:01', '2022-11-17 13:09:01', 'short', 'long'),
(24492, 776, 0, 0, 1, 2, '2022-11-17 13:10:01', '2022-11-17 13:15:01', 'short', 'long'),
(24493, 777, 0, 0, 1, 2, '2022-11-17 13:16:02', '2022-11-17 13:21:02', 'short', 'long'),
(24494, 778, 0, 0, 1, 2, '2022-11-17 13:22:02', '2022-11-17 13:27:02', 'short', 'long'),
(24495, 779, 0, 0, 1, 2, '2022-11-17 13:28:01', '2022-11-17 13:33:01', 'short', 'long'),
(24496, 780, 0, 0, 1, 2, '2022-11-17 13:34:01', '2022-11-17 13:39:01', 'short', 'long'),
(24497, 781, 0, 0, 1, 2, '2022-11-17 13:40:02', '2022-11-17 13:45:02', 'short', 'long'),
(24498, 782, 0, 0, 1, 2, '2022-11-17 13:46:01', '2022-11-17 13:51:01', 'short', 'long'),
(24499, 783, 0, 0, 1, 2, '2022-11-17 13:52:01', '2022-11-17 13:57:01', 'short', 'long'),
(24500, 784, 0, 0, 1, 2, '2022-11-17 13:57:02', '2022-11-17 14:02:02', 'short', 'long'),
(24501, 785, 0, 0, 1, 2, '2022-11-17 14:03:01', '2022-11-17 14:08:01', 'short', 'long'),
(24502, 786, 0, 0, 1, 2, '2022-11-17 14:09:01', '2022-11-17 14:14:01', 'short', 'long'),
(24503, 787, 0, 0, 1, 2, '2022-11-17 14:15:02', '2022-11-17 14:20:02', 'short', 'long'),
(24504, 788, 0, 0, 1, 2, '2022-11-17 14:21:01', '2022-11-17 14:26:01', 'short', 'long'),
(24505, 789, 0, 0, 1, 2, '2022-11-17 14:27:01', '2022-11-17 14:32:01', 'short', 'long'),
(24506, 790, 0, 0, 1, 2, '2022-11-17 14:33:01', '2022-11-17 14:38:01', 'short', 'long'),
(24507, 791, 0, 0, 1, 2, '2022-11-17 14:39:01', '2022-11-17 14:44:01', 'short', 'long'),
(24508, 792, 0, 0, 1, 2, '2022-11-17 14:45:02', '2022-11-17 14:50:02', 'short', 'long'),
(24509, 793, 0, 0, 1, 2, '2022-11-17 14:51:01', '2022-11-17 14:56:01', 'short', 'long'),
(24510, 794, 0, 0, 1, 2, '2022-11-17 14:57:02', '2022-11-17 15:02:01', 'short', 'long'),
(24511, 795, 0, 0, 1, 2, '2022-11-17 15:03:01', '2022-11-17 15:08:01', 'short', 'long'),
(24512, 796, 0, 0, 1, 2, '2022-11-17 15:08:02', '2022-11-17 15:13:02', 'short', 'long'),
(24513, 797, 0, 0, 1, 2, '2022-11-17 15:14:01', '2022-11-17 15:19:01', 'short', 'long'),
(24514, 798, 0, 0, 1, 2, '2022-11-17 15:19:02', '2022-11-17 15:24:02', 'short', 'long'),
(24515, 799, 0, 0, 1, 2, '2022-11-17 15:25:01', '2022-11-17 15:30:01', 'short', 'long'),
(24516, 800, 0, 0, 1, 2, '2022-11-17 15:31:02', '2022-11-17 15:36:02', 'short', 'long'),
(24517, 801, 0, 0, 1, 2, '2022-11-17 15:37:01', '2022-11-17 15:42:01', 'short', 'long'),
(24518, 802, 0, 0, 1, 2, '2022-11-17 15:43:01', '2022-11-17 15:48:01', 'short', 'long'),
(24519, 803, 0, 0, 1, 2, '2022-11-17 15:49:01', '2022-11-17 15:54:01', 'short', 'long'),
(24520, 804, 0, 0, 1, 2, '2022-11-17 15:55:01', '2022-11-17 16:00:01', 'short', 'long'),
(24521, 805, 0, 0, 1, 2, '2022-11-17 16:00:02', '2022-11-17 16:05:02', 'short', 'long'),
(24522, 806, 0, 0, 1, 2, '2022-11-17 16:06:01', '2022-11-17 16:11:01', 'short', 'long'),
(24523, 807, 0, 0, 1, 2, '2022-11-17 16:12:01', '2022-11-17 16:17:01', 'short', 'long'),
(24524, 808, 0, 0, 1, 2, '2022-11-17 16:17:02', '2022-11-17 16:22:02', 'short', 'long'),
(24525, 809, 0, 0, 1, 2, '2022-11-17 16:23:02', '2022-11-17 16:28:02', 'short', 'long'),
(24526, 810, 0, 0, 1, 2, '2022-11-17 16:29:01', '2022-11-17 16:34:01', 'short', 'long'),
(24527, 811, 0, 0, 1, 2, '2022-11-17 16:35:02', '2022-11-17 16:40:02', 'short', 'long'),
(24528, 812, 0, 0, 1, 2, '2022-11-17 16:41:01', '2022-11-17 16:46:01', 'short', 'long'),
(24529, 813, 0, 0, 1, 2, '2022-11-17 16:47:01', '2022-11-17 16:52:01', 'short', 'long'),
(24530, 814, 0, 0, 1, 2, '2022-11-17 16:52:02', '2022-11-17 16:57:02', 'short', 'long'),
(24531, 815, 0, 0, 1, 2, '2022-11-17 16:58:01', '2022-11-17 17:03:01', 'short', 'long'),
(24532, 816, 0, 0, 1, 2, '2022-11-17 17:04:02', '2022-11-17 17:09:02', 'short', 'long'),
(24533, 817, 0, 0, 1, 2, '2022-11-17 17:10:01', '2022-11-17 17:15:01', 'short', 'long'),
(24534, 818, 0, 0, 1, 2, '2022-11-17 17:15:02', '2022-11-17 17:20:02', 'short', 'long'),
(24535, 819, 0, 0, 1, 2, '2022-11-17 17:21:01', '2022-11-17 17:26:01', 'short', 'long'),
(24536, 820, 0, 0, 1, 2, '2022-11-17 17:26:02', '2022-11-17 17:31:02', 'short', 'long'),
(24537, 821, 0, 0, 1, 2, '2022-11-17 17:32:02', '2022-11-17 17:37:02', 'short', 'long'),
(24538, 822, 0, 0, 1, 2, '2022-11-17 17:38:01', '2022-11-17 17:43:01', 'short', 'long'),
(24539, 823, 0, 0, 1, 2, '2022-11-17 17:44:01', '2022-11-17 17:49:01', 'short', 'long'),
(24540, 824, 0, 0, 1, 2, '2022-11-17 17:50:02', '2022-11-17 17:55:02', 'short', 'long'),
(24541, 825, 0, 0, 1, 2, '2022-11-17 17:56:01', '2022-11-17 18:01:01', 'short', 'long'),
(24542, 826, 0, 0, 1, 2, '2022-11-17 18:02:01', '2022-11-17 18:07:01', 'short', 'long'),
(24543, 827, 0, 0, 1, 2, '2022-11-17 18:08:01', '2022-11-17 18:13:01', 'short', 'long'),
(24544, 828, 0, 0, 1, 2, '2022-11-17 18:14:01', '2022-11-17 18:19:01', 'short', 'long'),
(24545, 829, 0, 0, 1, 2, '2022-11-17 18:20:02', '2022-11-17 18:25:02', 'short', 'long'),
(24546, 830, 0, 0, 1, 2, '2022-11-17 18:26:01', '2022-11-17 18:31:01', 'short', 'long'),
(24547, 830, 0, 0, 1, 2, '2022-11-17 18:31:02', '2022-11-17 18:36:02', 'short', 'long'),
(24548, 831, 0, 0, 1, 2, '2022-11-17 18:37:01', '2022-11-17 18:42:01', 'short', 'long'),
(24549, 832, 0, 0, 1, 2, '2022-11-17 18:43:02', '2022-11-17 18:48:02', 'short', 'long'),
(24550, 833, 0, 0, 1, 2, '2022-11-17 18:49:01', '2022-11-17 18:54:01', 'short', 'long'),
(24551, 834, 0, 0, 1, 2, '2022-11-17 18:54:02', '2022-11-17 18:59:02', 'short', 'long'),
(24552, 835, 0, 0, 1, 2, '2022-11-17 19:00:01', '2022-11-17 19:05:01', 'short', 'long'),
(24553, 836, 0, 0, 1, 2, '2022-11-17 19:05:02', '2022-11-17 19:10:02', 'short', 'long'),
(24554, 837, 0, 0, 1, 2, '2022-11-17 19:11:01', '2022-11-17 19:16:01', 'short', 'long'),
(24555, 838, 0, 0, 1, 2, '2022-11-17 19:17:01', '2022-11-17 19:22:01', 'short', 'long'),
(24556, 839, 0, 0, 1, 2, '2022-11-17 19:23:01', '2022-11-17 19:28:01', 'short', 'long'),
(24557, 840, 0, 0, 1, 2, '2022-11-17 19:29:01', '2022-11-17 19:34:01', 'short', 'long'),
(24558, 841, 0, 0, 1, 2, '2022-11-17 19:35:01', '2022-11-17 19:40:01', 'short', 'long'),
(24559, 842, 0, 0, 1, 2, '2022-11-17 19:41:01', '2022-11-17 19:46:01', 'short', 'long'),
(24560, 843, 0, 0, 1, 2, '2022-11-17 19:47:01', '2022-11-17 19:52:01', 'short', 'long'),
(24561, 844, 0, 0, 1, 2, '2022-11-17 19:53:01', '2022-11-17 19:58:01', 'short', 'long'),
(24562, 845, 0, 0, 1, 2, '2022-11-17 19:59:01', '2022-11-17 20:04:01', 'short', 'long'),
(24563, 846, 0, 0, 1, 2, '2022-11-17 20:05:01', '2022-11-17 20:10:01', 'short', 'long'),
(24564, 847, 0, 0, 1, 2, '2022-11-17 20:11:02', '2022-11-17 20:16:02', 'short', 'long'),
(24565, 848, 0, 0, 1, 2, '2022-11-17 20:17:01', '2022-11-17 20:22:01', 'short', 'long'),
(24566, 848, 0, 0, 1, 2, '2022-11-17 20:22:02', '2022-11-17 20:27:02', 'short', 'long'),
(24567, 848, 0, 0, 1, 2, '2022-11-17 20:27:05', '2022-11-17 20:32:05', 'short', 'long'),
(24568, 848, 0, 0, 1, 2, '2022-11-17 20:32:06', '2022-11-17 20:37:06', 'short', 'long'),
(24569, 848, 0, 0, 1, 2, '2022-11-17 20:37:08', '2022-11-17 20:42:08', 'short', 'long'),
(24570, 848, 0, 0, 1, 2, '2022-11-17 20:42:09', '2022-11-17 20:47:09', 'short', 'long'),
(24571, 848, 0, 0, 1, 2, '2022-11-17 20:47:32', '2022-11-17 20:52:32', 'short', 'long'),
(24572, 849, 0, 0, 1, 2, '2022-11-17 20:53:01', '2022-11-17 20:58:01', 'short', 'long'),
(24573, 850, 0, 0, 1, 2, '2022-11-17 20:59:01', '2022-11-17 21:04:01', 'short', 'long'),
(24574, 850, 10, 0, 1, 2, '2022-11-17 21:08:28', '2022-11-17 21:09:02', 'short', 'long'),
(24575, 850, 10, 0, 1, 2, '2022-11-17 21:09:04', '2022-11-17 21:14:04', 'short', 'long'),
(24576, 850, 10, 0, 1, 2, '2022-11-17 21:14:05', '2022-11-17 21:19:05', 'short', 'long'),
(24577, 850, 10, 0, 1, 2, '2022-11-17 21:19:07', '2022-11-17 21:24:07', 'short', 'long'),
(24578, 1, 0, 0, 2, 2, '2022-11-17 21:26:26', '2022-11-17 21:27:26', 'short', 'long'),
(24579, 2, 0, 0, 2, 2, '2022-11-17 21:27:28', '2022-11-17 21:28:28', 'short', 'long'),
(24580, 3, 0, 0, 2, 2, '2022-11-17 21:28:30', '2022-11-17 21:29:30', 'short', 'long'),
(24581, 850, 10, 0, 1, 2, '2022-11-17 21:24:32', '2022-11-17 21:29:32', 'short', 'long'),
(24582, 4, 0, 0, 2, 2, '2022-11-17 21:29:32', '2022-11-17 21:30:32', 'short', 'long'),
(24583, 5, 0, 0, 2, 2, '2022-11-17 21:30:33', '2022-11-17 21:31:33', 'short', 'long'),
(24584, 6, 0, 0, 2, 2, '2022-11-17 21:31:34', '2022-11-17 21:32:34', 'short', 'long'),
(24585, 7, 0, 0, 2, 2, '2022-11-17 21:32:36', '2022-11-17 21:33:36', 'short', 'long'),
(24586, 8, 0, 0, 2, 2, '2022-11-17 21:33:37', '2022-11-17 21:34:37', 'short', 'long'),
(24587, 9, 0, 0, 2, 2, '2022-11-17 21:35:01', '2022-11-17 21:36:01', 'short', 'long'),
(24588, 851, 0, 0, 1, 2, '2022-11-17 21:30:01', '2022-11-17 21:35:01', 'short', 'long'),
(24589, 10, 0, 0, 2, 2, '2022-11-17 21:36:02', '2022-11-17 21:37:02', 'short', 'long'),
(24590, 11, 0, 0, 2, 2, '2022-11-17 21:37:11', '2022-11-17 21:38:11', 'short', 'long'),
(24591, 12, 0, 0, 2, 2, '2022-11-17 21:38:13', '2022-11-17 21:39:13', 'short', 'long'),
(24592, 13, 0, 0, 2, 2, '2022-11-17 21:39:31', '2022-11-17 21:40:31', 'short', 'long'),
(24593, 14, 0, 0, 2, 2, '2022-11-17 21:40:33', '2022-11-17 21:41:33', 'short', 'long'),
(24594, 852, 0, 0, 1, 2, '2022-11-17 21:36:02', '2022-11-17 21:41:02', 'short', 'long'),
(24595, 15, 0, 0, 2, 2, '2022-11-17 21:42:01', '2022-11-17 21:43:01', 'short', 'long'),
(24596, 16, 0, 0, 2, 2, '2022-11-17 21:43:03', '2022-11-17 21:44:03', 'short', 'long'),
(24597, 17, 0, 0, 2, 2, '2022-11-17 21:44:13', '2022-11-17 21:45:13', 'short', 'long'),
(24598, 18, 0, 0, 2, 2, '2022-11-17 21:45:31', '2022-11-17 21:46:31', 'short', 'long'),
(24599, 853, 0, 0, 1, 2, '2022-11-17 21:42:01', '2022-11-17 21:47:01', 'short', 'long'),
(24600, 19, 0, 0, 2, 2, '2022-11-17 21:46:33', '2022-11-17 21:47:33', 'short', 'long'),
(24601, 20, 0, 0, 2, 2, '2022-11-17 21:48:01', '2022-11-17 21:49:01', 'short', 'long'),
(24602, 21, 0, 0, 2, 2, '2022-11-17 21:49:03', '2022-11-17 21:50:03', 'short', 'long'),
(24603, 22, 0, 0, 2, 2, '2022-11-17 21:50:13', '2022-11-17 21:51:13', 'short', 'long'),
(24604, 23, 0, 0, 2, 2, '2022-11-17 21:51:31', '2022-11-17 21:52:31', 'short', 'long'),
(24605, 854, 0, 0, 1, 2, '2022-11-17 21:47:02', '2022-11-17 21:52:02', 'short', 'long'),
(24606, 24, 0, 0, 2, 2, '2022-11-17 21:52:33', '2022-11-17 21:53:33', 'short', 'long'),
(24607, 25, 0, 0, 2, 2, '2022-11-17 21:54:01', '2022-11-17 21:55:01', 'short', 'long'),
(24608, 26, 0, 0, 2, 2, '2022-11-17 21:55:03', '2022-11-17 21:56:03', 'short', 'long'),
(24609, 27, 0, 0, 2, 2, '2022-11-17 21:56:13', '2022-11-17 21:57:13', 'short', 'long'),
(24610, 28, 0, 0, 2, 2, '2022-11-17 21:57:31', '2022-11-17 21:58:31', 'short', 'long'),
(24611, 855, 0, 0, 1, 2, '2022-11-17 21:53:02', '2022-11-17 21:58:02', 'short', 'long'),
(24612, 29, 0, 0, 2, 2, '2022-11-17 21:58:33', '2022-11-17 21:59:33', 'short', 'long'),
(24613, 30, 0, 0, 2, 2, '2022-11-17 22:00:01', '2022-11-17 22:01:01', 'short', 'long'),
(24614, 31, 0, 0, 2, 2, '2022-11-17 22:01:03', '2022-11-17 22:02:03', 'short', 'long'),
(24615, 32, 0, 0, 2, 2, '2022-11-17 22:03:01', '2022-11-17 22:04:01', 'short', 'long'),
(24616, 856, 0, 0, 1, 2, '2022-11-17 21:59:02', '2022-11-17 22:04:02', 'short', 'long');

-- --------------------------------------------------------

--
-- Table structure for table `trade_ref`
--

CREATE TABLE `trade_ref` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tr_id` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trade_ref`
--

INSERT INTO `trade_ref` (`id`, `user_id`, `tr_id`, `amount`) VALUES
(14921, 1094, 732, 0.06),
(14922, 1094, 732, 0.06),
(14923, 1097, 732, 0.6),
(14924, 1093, 732, 0.6),
(14925, 1094, 732, 0.06),
(14926, 1094, 732, 0.06),
(14927, 1097, 732, 0.6),
(14928, 1093, 732, 0.6),
(14929, 1097, 732, 0.06),
(14930, 1094, 732, 0.06),
(14931, 1094, 732, 0.3),
(14932, 1094, 732, 0.3);

-- --------------------------------------------------------

--
-- Table structure for table `trade_tersm`
--

CREATE TABLE `trade_tersm` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `bonus_percentage` int(10) NOT NULL,
  `min_trade` float NOT NULL,
  `ref_bonus_lvl1` int(10) NOT NULL,
  `ref_bonus_lvl2` int(11) NOT NULL,
  `ref_bonus_lvl3` int(11) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trade_tersm`
--

INSERT INTO `trade_tersm` (`id`, `name`, `bonus_percentage`, `min_trade`, `ref_bonus_lvl1`, `ref_bonus_lvl2`, `ref_bonus_lvl3`, `status`) VALUES
(1, '1 min Trade', 90, 0.1, 3, 2, 0, 1),
(2, '5 Min Trade', 90, 0.1, 3, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trade_type`
--

CREATE TABLE `trade_type` (
  `id` int(11) NOT NULL,
  `trade_cat` int(11) NOT NULL,
  `trade_name` varchar(11) NOT NULL,
  `startus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trade_type`
--

INSERT INTO `trade_type` (`id`, `trade_cat`, `trade_name`, `startus`) VALUES
(1, 1, 'long', 1),
(2, 1, 'short', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trade_user_history`
--

CREATE TABLE `trade_user_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trade_id` int(11) NOT NULL,
  `trade_terms` int(11) NOT NULL,
  `trade_type` varchar(11) NOT NULL,
  `trade_amount` float NOT NULL,
  `win_lost` varchar(100) NOT NULL,
  `win_amount` float NOT NULL DEFAULT 0,
  `loss_amount` float NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trade_user_history`
--

INSERT INTO `trade_user_history` (`id`, `user_id`, `trade_id`, `trade_terms`, `trade_type`, `trade_amount`, `win_lost`, `win_amount`, `loss_amount`, `time`) VALUES
(81, 1118, 732, 2, 'short', 2, 'won', 9, 0, '2022-11-17 02:13:01'),
(82, 1119, 732, 2, 'long', 2, 'lost', 0, 0, '2022-11-17 02:13:01'),
(83, 1115, 732, 2, 'long', 20, 'lost', 0, 0, '2022-11-17 02:13:01'),
(84, 1113, 732, 2, 'short', 10, 'won', 9, 0, '2022-11-17 02:13:01'),
(86, 1118, 850, 2, 'long', 10, 'lost', 0, 0, '2022-11-17 15:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_agent_transaction`
--

CREATE TABLE `user_agent_transaction` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `agent_id` int(255) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `pay_method` int(11) NOT NULL,
  `pay_number` varchar(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `pay_amount` int(11) NOT NULL,
  `pay_status` text NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents_pay_methods`
--
ALTER TABLE `agents_pay_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_category`
--
ALTER TABLE `bet_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_user_history`
--
ALTER TABLE `bet_user_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `deposit_category`
--
ALTER TABLE `deposit_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_req_log`
--
ALTER TABLE `financial_req_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages_term`
--
ALTER TABLE `packages_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `swipe_trade`
--
ALTER TABLE `swipe_trade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`aId`);

--
-- Indexes for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_balance`
--
ALTER TABLE `tbl_balance`
  ADD PRIMARY KEY (`balance_id`);

--
-- Indexes for table `tbl_bet`
--
ALTER TABLE `tbl_bet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_credit`
--
ALTER TABLE `tbl_credit`
  ADD PRIMARY KEY (`credit_id`);

--
-- Indexes for table `tbl_customization`
--
ALTER TABLE `tbl_customization`
  ADD PRIMARY KEY (`cId`);

--
-- Indexes for table `tbl_deposit_payment`
--
ALTER TABLE `tbl_deposit_payment`
  ADD PRIMARY KEY (`dpayment_id`);

--
-- Indexes for table `tbl_generalsettings`
--
ALTER TABLE `tbl_generalsettings`
  ADD PRIMARY KEY (`gId`);

--
-- Indexes for table `tbl_income`
--
ALTER TABLE `tbl_income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`mId`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `tbl_otherfees`
--
ALTER TABLE `tbl_otherfees`
  ADD PRIMARY KEY (`otherfees_id`);

--
-- Indexes for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trades`
--
ALTER TABLE `trades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_category`
--
ALTER TABLE `trade_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_history`
--
ALTER TABLE `trade_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_ref`
--
ALTER TABLE `trade_ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_tersm`
--
ALTER TABLE `trade_tersm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_type`
--
ALTER TABLE `trade_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_user_history`
--
ALTER TABLE `trade_user_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_agent_transaction`
--
ALTER TABLE `user_agent_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agents_pay_methods`
--
ALTER TABLE `agents_pay_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bet_category`
--
ALTER TABLE `bet_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bet_user_history`
--
ALTER TABLE `bet_user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `deposit_category`
--
ALTER TABLE `deposit_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `financial_req_log`
--
ALTER TABLE `financial_req_log`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `packages_term`
--
ALTER TABLE `packages_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `swipe_trade`
--
ALTER TABLE `swipe_trade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `aId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_balance`
--
ALTER TABLE `tbl_balance`
  MODIFY `balance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bet`
--
ALTER TABLE `tbl_bet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_credit`
--
ALTER TABLE `tbl_credit`
  MODIFY `credit_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `tbl_customization`
--
ALTER TABLE `tbl_customization`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_deposit_payment`
--
ALTER TABLE `tbl_deposit_payment`
  MODIFY `dpayment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `tbl_generalsettings`
--
ALTER TABLE `tbl_generalsettings`
  MODIFY `gId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_income`
--
ALTER TABLE `tbl_income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `mId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1126;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `msg_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_otherfees`
--
ALTER TABLE `tbl_otherfees`
  MODIFY `otherfees_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT for table `trades`
--
ALTER TABLE `trades`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trade_category`
--
ALTER TABLE `trade_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trade_history`
--
ALTER TABLE `trade_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24617;

--
-- AUTO_INCREMENT for table `trade_ref`
--
ALTER TABLE `trade_ref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14933;

--
-- AUTO_INCREMENT for table `trade_tersm`
--
ALTER TABLE `trade_tersm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trade_type`
--
ALTER TABLE `trade_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trade_user_history`
--
ALTER TABLE `trade_user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `user_agent_transaction`
--
ALTER TABLE `user_agent_transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
