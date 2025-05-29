-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2020 at 11:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bamboo`
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
(1, '1', 'admin@naturalspice.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Natural Spice ', '', '987456321', 'Sorda', 'Reshmi Electronic', '1', '1', '1,2,3,4,5,6,7', '', 'uploads/7e7e3f998db6904bc2c3ca29420844a9.png', '2018-07-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(200) DEFAULT NULL,
  `c_desc` varchar(1000) DEFAULT NULL,
  `img1` varchar(200) DEFAULT NULL,
  `sts` int(11) NOT NULL,
  `date` datetime DEFAULT '1970-01-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `ps_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `sc_id` int(11) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `img1` varchar(200) DEFAULT NULL,
  `mprice` int(11) DEFAULT NULL,
  `sprice` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `descr` text DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `sts` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proimage`
--

CREATE TABLE `proimage` (
  `pi_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `uid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `proimage`
--
ALTER TABLE `proimage`
  ADD PRIMARY KEY (`pi_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`uid`);

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
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proimage`
--
ALTER TABLE `proimage`
  MODIFY `pi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
