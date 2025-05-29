-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2018 at 12:34 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_code` varchar(100) NOT NULL,
  `a_email` varchar(100) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_vpwd` varchar(100) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_desig` varchar(100) NOT NULL,
  `a_phone` varchar(15) NOT NULL,
  `a_address` tinytext NOT NULL,
  `a_company` tinytext NOT NULL,
  `a_usertype` varchar(10) NOT NULL COMMENT 'For User Privilege 1 for Admin',
  `a_status` varchar(2) NOT NULL COMMENT '1 Approve/ 2 Not Approve',
  `a_dob` date NOT NULL DEFAULT '1970-01-01',
  `a_doj` date NOT NULL DEFAULT '1970-01-01',
  `a_pagepermission` varchar(100) NOT NULL,
  `a_sms` varchar(20) NOT NULL,
  `a_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_code`, `a_email`, `a_password`, `a_vpwd`, `a_name`, `a_desig`, `a_phone`, `a_address`, `a_company`, `a_usertype`, `a_status`, `a_dob`, `a_doj`, `a_pagepermission`, `a_sms`, `a_date`) VALUES
(1, '1', 'info@shopweb.in', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'ADMIN', '', '5454544', 'Cuttack', 'Hhealthub', '1', '1', '2017-09-27', '2017-09-27', '1,2,3,4,5,6,7', '', '2016-05-05 00:00:00'),
(2, 'A171107A', 'amit@shopweb.in', '202cb962ac59075b964b07152d234b70', '123', 'AMIT', 'test', '9853332202', 'ctc', 'Healthub', '2', '1', '2017-11-07', '2017-11-07', '', 'NO', '2017-11-07 17:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_address` text NOT NULL,
  `emp_contact` varchar(50) NOT NULL,
  `emp_email` varchar(150) NOT NULL,
  `emp_qualification` text NOT NULL,
  `emp_amount` int(11) DEFAULT NULL,
  `emp_satatus` varchar(10) NOT NULL,
  `emp_cdate` datetime NOT NULL DEFAULT '1970-01-01 00:00:11'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_address`, `emp_contact`, `emp_email`, `emp_qualification`, `emp_amount`, `emp_satatus`, `emp_cdate`) VALUES
(5, 'dipti ranjan', 'cuttack', '7008658988', 'd@gmail.com', 'm tech', 10000, '1', '2018-02-16 14:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `exp_id` int(11) NOT NULL,
  `exp_date` date NOT NULL DEFAULT '1970-01-01',
  `exp_perticular` varchar(150) NOT NULL,
  `exp_amount` int(11) DEFAULT NULL,
  `exp_status` varchar(10) NOT NULL,
  `exp_cdate` datetime NOT NULL DEFAULT '1970-01-01 00:00:01'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`exp_id`, `exp_date`, `exp_perticular`, `exp_amount`, `exp_status`, `exp_cdate`) VALUES
(5, '2018-02-16', 'ghghghgh', 1000, '1', '2018-02-16 15:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `inc_id` int(11) NOT NULL,
  `inc_citid` int(11) DEFAULT NULL,
  `inc_distid` int(11) DEFAULT NULL,
  `inc_stid` int(11) DEFAULT NULL,
  `inc_regdate` date NOT NULL DEFAULT '1970-01-01',
  `inc_name` varchar(100) NOT NULL,
  `inc_mob` varchar(30) NOT NULL,
  `inc_qulification` text NOT NULL,
  `inc_fee` float DEFAULT NULL,
  `inc_paid` float DEFAULT NULL,
  `inc_balance` float DEFAULT NULL,
  `inc_status` varchar(10) NOT NULL,
  `inc_cdate` datetime NOT NULL DEFAULT '1970-01-01 00:00:01'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `n_report`
--

CREATE TABLE `n_report` (
  `n_id` int(11) NOT NULL,
  `n_s_id` varchar(100) NOT NULL,
  `n_pay` varchar(100) NOT NULL,
  `n_date` date NOT NULL DEFAULT '1970-01-01',
  `n_status` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `n_report`
--

INSERT INTO `n_report` (`n_id`, `n_s_id`, `n_pay`, `n_date`, `n_status`) VALUES
(16, '8', '500', '2018-02-15', '1'),
(27, '26', '500', '2018-02-17', '1'),
(29, '27', '100', '2018-02-17', '1'),
(30, '28', '100', '2018-02-17', '1'),
(31, '29', '500', '2018-02-17', '1');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(200) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_sal_id` int(11) NOT NULL,
  `paid_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:01',
  `paid_amount` decimal(10,2) NOT NULL,
  `leave_amount` decimal(10,2) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `pay_details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `emp_id`, `emp_sal_id`, `paid_date`, `paid_amount`, `leave_amount`, `pay_type`, `pay_details`) VALUES
(1, 0, 0, '1970-01-01 00:00:01', '0.00', '0.00', '', ''),
(2, 2, 1, '2018-02-08 19:15:02', '1000.00', '0.00', 'Cash', 'teccccc'),
(3, 2, 1, '2018-02-08 19:15:38', '500.00', '0.00', 'Cash', ''),
(4, 2, 1, '2018-02-08 19:32:10', '0.00', '300.00', 'Cash', ''),
(5, 2, 1, '2018-02-08 19:34:06', '0.00', '300.00', 'Cash', ''),
(6, 3, 3, '2018-02-16 12:42:23', '1000.00', '1000.00', 'Cash', 'test'),
(7, 3, 3, '2018-02-16 15:08:45', '500.00', '100.00', 'Cash', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `sa_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sa_month` date NOT NULL DEFAULT '1970-01-01',
  `sa_amount` decimal(10,2) DEFAULT NULL,
  `sa_advpay` decimal(10,2) DEFAULT NULL,
  `sa_leave_amt` decimal(10,2) NOT NULL,
  `sa_satatus` varchar(10) NOT NULL,
  `sa_cdate` datetime NOT NULL DEFAULT '1970-01-01 00:00:11'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`sa_id`, `emp_id`, `sa_month`, `sa_amount`, `sa_advpay`, `sa_leave_amt`, `sa_satatus`, `sa_cdate`) VALUES
(8, 5, '2018-02-16', '510.00', '100.00', '0.00', '1', '2018-02-16 14:58:12'),
(7, 5, '2018-03-01', '10000.00', '0.00', '0.00', '1', '2018-02-16 14:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_contact` varchar(100) NOT NULL,
  `s_email` varchar(100) NOT NULL,
  `s_address` text NOT NULL,
  `s_class` varchar(100) NOT NULL,
  `s_course` varchar(100) NOT NULL,
  `s_rollno` varchar(100) NOT NULL,
  `s_fees` varchar(100) NOT NULL,
  `s_advance` varchar(100) NOT NULL,
  `s_date` date NOT NULL DEFAULT '1970-01-01',
  `p_status` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_contact`, `s_email`, `s_address`, `s_class`, `s_course`, `s_rollno`, `s_fees`, `s_advance`, `s_date`, `p_status`) VALUES
(8, 'jyotsna mayee nayak', '7504123541', 'jyotsna@gmail.com', 'At/Post-bhagatpur, dist-cuttack, pin- 754023', 'b tech', 'electronics tele comunication', '1201297075', '50000', '1000', '2018-02-13', '1'),
(26, 'kalu', '536546', 'g@gmail.com', 'ctc', 'mca', 'php', 'h56567', '25000', '1000', '2018-02-17', '1'),
(27, 'ramesh', '67890', 'gg@gmail.com', 'bbsr', 'bca', 'php', 'F56547', '27000', '1000', '2018-02-17', '1'),
(28, 'debasis', '7676', 'g@gmail.com', 'hbgdhg', 'ghghgh', 'ghghgh', 'ghgfhghg', '7000', '1100', '2018-02-17', '1'),
(29, 'subham', '56765', 'g@gmail.com', 'rourkela', 'mca', 'java', 'g67676', '12000', '2500', '2018-02-17', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`inc_id`);

--
-- Indexes for table `n_report`
--
ALTER TABLE `n_report`
  ADD PRIMARY KEY (`n_id`),
  ADD KEY `n_s_id` (`n_s_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`sa_id`),
  ADD UNIQUE KEY `sal_month` (`sa_month`,`emp_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_report`
--
ALTER TABLE `n_report`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
