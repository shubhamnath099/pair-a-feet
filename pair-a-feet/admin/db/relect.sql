-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 04:19 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relect`
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
  `a_pagepermission` varchar(100) NOT NULL,
  `a_sms` varchar(20) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `a_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_code`, `a_email`, `a_password`, `a_vpwd`, `a_name`, `a_desig`, `a_phone`, `a_address`, `a_company`, `a_usertype`, `a_status`, `a_pagepermission`, `a_sms`, `img1`, `a_date`) VALUES
(1, '1', 'rahmat.ansari.sorda@gmail.com', '3da5cf435b5554f7d026afef9a372d00', 'a_vpd', 'Rahmat Ansari', '', '9937550443', 'Sorda', 'Reshmi Electronic', '1', '1', '1,2,3,4,5,6,7', '', 'uploads/e059160628248738c3ce78000aed1963.jpg', '2018-07-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `c_desc` varchar(1000) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `sts` int(11) NOT NULL,
  `date` datetime DEFAULT '1970-01-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `c_desc`, `img1`, `sts`, `date`) VALUES
(8, 'Mobile', '', 'uploads/30b9f6c6522e0da0eba16926caa1c902.', 1, '2020-07-25 18:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `mprice` int(11) NOT NULL,
  `sprice` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `descr` text NOT NULL,
  `link` varchar(200) NOT NULL,
  `sts` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `c_id`, `sc_id`, `name`, `img1`, `mprice`, `sprice`, `stock`, `descr`, `link`, `sts`, `date`) VALUES
(6, 8, 0, 'Realme 8A Dual', 'uploads/57538be2ff18200c14f2085dee8757b9.', 0, 9000, 1, '', '', 1, '2020-07-25 18:52:01'),
(7, 8, 0, 'Galaxy Note 9', 'uploads/ecbf85b681b456b5792a0e9b9654959d.', 0, 54000, 3, '', '', 1, '2020-07-25 20:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `s_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `product` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `quntity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bildate` varchar(200) NOT NULL,
  `bilno` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`s_id`, `name`, `email`, `mobile`, `address`, `product`, `price`, `quntity`, `total`, `bildate`, `bilno`, `date`, `a_id`) VALUES
(2, 'altab raja', '', 7894947464, 'badambadi', '7', 54000, 2, 108000, 'July 26, 2020', 'RE7921', '2020-07-26 13:49:42', 1),
(3, 'Jayprakash Mohanty', '', 9853394834, 'At- Bhadimul, Post- C.R.R.I, Dist- Cuttack', '6', 9000, 1, 9000, 'July 26, 2020', 'RE4192', '2020-07-26 13:51:10', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
