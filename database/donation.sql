-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 11:10 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `aadhar` bigint(12) NOT NULL,
  `contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`admin_id`, `username`, `password`, `name`, `email`, `aadhar`, `contact`) VALUES
(1, 'sakshi92', 'sakshi', 'sakshi', 'sakshi@gmail.com', 123456789101, 9876543210);

-- --------------------------------------------------------

--
-- Table structure for table `contact_master`
--

CREATE TABLE `contact_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `website` varchar(40) NOT NULL DEFAULT 'Not Applicable',
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_master`
--

INSERT INTO `contact_master` (`id`, `name`, `email`, `website`, `message`) VALUES
(20, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'hello\r\nmy test day 6'),
(21, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'My Test'),
(22, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'My Test'),
(23, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'I want to know what is the process of donation ?'),
(24, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'I want to know what is the process of donation ?'),
(25, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'I want to know what is the process of donation ?'),
(26, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'I want to know donation steps'),
(27, 'sakshi jadhav', 'sakshijadhav3892@gmail.com', '', '........................................................................my test .......................................................................................'),
(28, 'sakshi jadhav', 'sakshijadhav3892@gmail.com', '', 'final demo of contact us'),
(29, 'sakshi jadhav', 'sakshijadhav3892@gmail.com', '', 'demo for header '),
(30, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'last demo'),
(31, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'last demo'),
(32, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'last demo'),
(33, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'last demo'),
(34, 'sakshi jadhav', 'sakshijadhav3892@gmail.com', '', 'final'),
(35, 'sakshi jadhav', 'sakshijadhav3892@gmail.com', '', 'final'),
(36, 'sakshi jadhav', 'sakshijadhav3892@gmail.com', '', 'without alert'),
(37, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'hello byebye '),
(38, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'I want to know the procedure for donation ?'),
(39, 'sakshi', 'sakshijadhav3892@gmail.com', '', 'I want to know the procedure for donation ?'),
(40, 'nidhi', 'mi.nidhideshmukh@gmail.com', '', 'i want to donate something ....');

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `id` int(11) NOT NULL,
  `org_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `items` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`id`, `org_id`, `username`, `quantity`, `items`, `description`, `action`, `updated`) VALUES
(3, 'OR24283', 'nidhid', 'Recycle', 'Plastic', 'Plastic bottles', 'donation', '2021-05-07 03:26:00'),
(0, '', 'anudmello', '', 'Charity', 'Shirt', 'donation', '2021-05-09 08:24:33'),
(0, '', 'anudmello', '', 'Charity', 'Shirt', 'donation', '2021-05-09 08:26:32'),
(0, '', 'anudmello', '2', 'Charity', 'Skirt', 'request', '2021-05-09 09:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `organisation_request`
--

CREATE TABLE `organisation_request` (
  `org_id` int(11) NOT NULL,
  `req_items` text NOT NULL,
  `req_qty` int(11) NOT NULL,
  `req_date` date NOT NULL,
  `req_type` varchar(20) NOT NULL COMMENT 'They want to donate or Request from us',
  `status` varchar(30) NOT NULL DEFAULT 'Pending',
  `req_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `org_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `org_doc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `username`, `password`, `email`, `name`, `contact`, `address`, `org_doc`) VALUES
(101, 'Kalpana', 'kalpana', 'akhilbhartiyanivas@gmail.com', 'Akhil Bhartiya Nivas', 9876564635, 'xyz place', ''),
(102, 'umesh', 'umesh', 'panichealing@gmail.com', 'umesh', 7876564534, 'abc d jdhftioslhvh', ''),
(5117, 'anudmello', '827ccb0eea8a706c4c34a16891f84e7b', 'anu@gmail.com', 'APD', 9876543210, 'Amt', 'documents/Erd.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `organization_process`
--

CREATE TABLE `organization_process` (
  `org_id` int(11) NOT NULL,
  `accept_date` date NOT NULL,
  `respond_date` date NOT NULL,
  `respond_item` text NOT NULL,
  `respond_qty` int(11) NOT NULL,
  `remark` varchar(20) NOT NULL DEFAULT 'Not Available'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_master`
--

CREATE TABLE `stock_master` (
  `category_id` int(11) NOT NULL,
  `items` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `category_type` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_master`
--

INSERT INTO `stock_master` (`category_id`, `items`, `quantity`, `description`, `category_type`) VALUES
(101, 'Cloths', 10, '5 Tshirts, \r\n5 pants for age group 10-15 ', 'Charity');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `aadhar` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_process`
--

CREATE TABLE `user_process` (
  `user_id` int(11) NOT NULL,
  `accept_date` date NOT NULL,
  `respond_date` date NOT NULL,
  `respond_item` text NOT NULL,
  `respond_qty` int(11) NOT NULL,
  `remark` varchar(20) NOT NULL DEFAULT 'Not Available'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_request`
--

CREATE TABLE `user_request` (
  `user_id` int(11) NOT NULL,
  `req_items` text NOT NULL,
  `req_qty` int(11) NOT NULL,
  `req_date` date NOT NULL,
  `req_type` varchar(20) NOT NULL COMMENT 'They want to donate or Request from us',
  `status` varchar(30) NOT NULL DEFAULT 'Pending',
  `req_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact_master`
--
ALTER TABLE `contact_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation_request`
--
ALTER TABLE `organisation_request`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `organization_process`
--
ALTER TABLE `organization_process`
  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_process`
--
ALTER TABLE `user_process`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_request`
--
ALTER TABLE `user_request`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_master`
--
ALTER TABLE `contact_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `organisation_request`
--
ALTER TABLE `organisation_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_request`
--
ALTER TABLE `user_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
