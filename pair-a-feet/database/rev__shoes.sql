-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 21, 2022 at 12:35 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rev__shoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `a_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:01',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_code`, `a_email`, `a_password`, `a_vpwd`, `a_name`, `a_desig`, `a_phone`, `a_address`, `a_company`, `a_usertype`, `a_status`, `a_pagepermission`, `a_sms`, `img1`, `a_date`) VALUES
(1, '1', 'admin@garments.in', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'garments', '', '987456321', 'Kenrapada', 'Reshmi Electronic', '1', '1', '1,2,3,4,5,6,7', '', 'uploads/7c434f192512fe71114f627a04bb1361.png', '2018-07-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head` varchar(200) NOT NULL,
  `para` varchar(200) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `head`, `para`, `img1`, `date`) VALUES
(9, 'Demo', '', 'uploads/778686d8de910f165d90ae748b51e163.png', '2020-11-21 23:37:27'),
(10, 'demo', '', 'uploads/33d63fec5155128f896fda47be229725.jpg', '2020-11-21 23:37:35'),
(12, 'Demo', '', 'uploads/58c0364573f5fafcb2959060352c4bab.jpg', '2020-12-22 00:50:55'),
(13, '', '', 'uploads/83c8bbe0219d9ac5c6d57f19f575509b.php', '2020-12-24 19:25:00'),
(14, '', '', 'uploads/ff656c682e29a4e0120c8faaba4acf6a.php', '2020-12-25 00:26:24'),
(15, '', '', 'uploads/c27d180f38422d7d3ee4f7c0269b948b.php', '2020-12-30 11:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `sdesc` longtext NOT NULL,
  `fdesc` longtext NOT NULL,
  `img1` varchar(200) NOT NULL,
  `sign` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `sts` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `sdesc`, `fdesc`, `img1`, `sign`, `date`, `sts`) VALUES
(7, 'COVID-19 Lockdown: Useful Gadgets To Maintain Good Health While Working From Home', '<p>Short</p>\r\n', '<p>Long</p>\r\n', 'uploads/de2fc2862b04594d112ac1bd2f6f66fd.jpg', 'Secuzaa', '2020-09-22 19:35:19', 1),
(8, 'COVID-19 Lockdown: Useful Gadgets To Maintain Good Health While Working From Home', '<p>some</p>\r\n', '<p>thing</p>\r\n', 'uploads/1f190520a774c4e8f7029fbc6dda8323.jpg', 'Secuzaa', '2020-10-02 13:55:59', 1),
(9, 'Durgapuja Offer', '<p>hhdhhuhdjjdc</p>\r\n', '', 'uploads/651e863a0002ecae631c94d613d65898.jpg', 'Durgapuja Offer', '2020-12-15 10:28:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sesion` varchar(200) NOT NULL,
  `u_id` int(11) NOT NULL,
  `total` varchar(200) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `sts` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`ct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ct_id`, `p_id`, `name`, `price`, `qty`, `sesion`, `u_id`, `total`, `img1`, `size`, `sts`, `date`) VALUES
(19, 1, 'Dress', 55, 1, '0d551e29e11f14d23bbf9fa88911144c', 2, '55', 'uploads/6da31336b9959727ee5710391cea5e21.jpg', 'M', 1, '2020-12-14 21:47:51'),
(20, 2, 'product ', 550, 1, '0d551e29e11f14d23bbf9fa88911144c', 2, '550', 'uploads/f7754cb2574027ca29ce5f0acd425b72.jpg', 'L', 1, '2020-12-14 21:49:46'),
(21, 1, 'Dress', 55, 2, '23a77edfbc2771c8cb6fd56c96e56482', 0, '110', 'uploads/6da31336b9959727ee5710391cea5e21.jpg', 'M', 0, '2020-12-14 23:30:08'),
(22, 1, 'Dress', 55, 1, 'b944cee843883700ca2e7e8c143b90d3', 3, '55', 'uploads/6da31336b9959727ee5710391cea5e21.jpg', 'M', 1, '2020-12-15 09:21:52'),
(23, 6, 'ss', 777, 1, 'dae28a3ac9a62ed2f66b7c30f163cd68', 3, '777', 'uploads/937036b5921185d82490893f88d47741.jpg', 'XL', 1, '2020-12-15 10:36:21'),
(24, 1, 'Dress', 55, 1, 'dae28a3ac9a62ed2f66b7c30f163cd68', 3, '55', 'uploads/6da31336b9959727ee5710391cea5e21.jpg', 'M', 1, '2020-12-15 10:42:28'),
(25, 1, 'Dress', 700, 1, '1aadc135fb4ee762712f56e346acda6c', 2, '700', 'uploads/6da31336b9959727ee5710391cea5e21.jpg', 'L', 1, '2020-12-18 07:19:09'),
(26, 2, 'product ', 550, 1, '1aadc135fb4ee762712f56e346acda6c', 2, '550', 'uploads/f7754cb2574027ca29ce5f0acd425b72.jpg', 'L', 1, '2020-12-18 07:22:12'),
(27, 3, 'Product 3', 10, 1, '088623a4d00c2fb7291ff79a6355e8e7', 3, '10', 'uploads/7f49d76da305cabc7bf6299042ab25e3.jpg', 'M', 1, '2020-12-18 10:51:36'),
(28, 7, 'Man new Dress', 1, 1, '8b909d183f4a93280484ef1828e2dd26', 4, '1', 'uploads/3b3ca30296388241d02a1d277db357d1.jpg', 'M', 1, '2020-12-22 01:00:05'),
(29, 8, 'Green', 10, 1, '3242ac32ad4b0604b9ff55b3034c9173', 5, '10', 'uploads/23cb5721c28daed42d5d750135f34c31.jpg', 'M', 1, '2020-12-22 11:24:25'),
(30, 8, 'Green', 10, 1, 'd55eb12ffafd26917b31fc25f80bc434', 0, '10', 'uploads/23cb5721c28daed42d5d750135f34c31.jpg', 'M', 0, '2021-01-02 11:12:04'),
(31, 8, 'Green', 10, 1, '063a6424344d86fa7f754ec176652603', 7, '10', 'uploads/23cb5721c28daed42d5d750135f34c31.jpg', 'M', 1, '2021-01-02 11:17:47'),
(32, 9, 'King Dress', 1, 1, 'cf46cfc64552bf7a4769479bc34f199b', 8, '1', 'uploads/8dbba4b58643df825b893fb9b812a628.png', 'M', 1, '2021-01-02 13:13:02'),
(34, 1, 'Dress', 55, 1, 'kd404tn48fa4sraf625kbnl7lu', 4, '55', 'uploads/6da31336b9959727ee5710391cea5e21.jpg', 'M', 0, '2022-07-06 06:20:12'),
(35, 1, 'Dress', 55, 1, '0rvpob544qr5j0vaq10ic2ahte', 4, '55', 'uploads/6da31336b9959727ee5710391cea5e21.jpg', 'M', 0, '2022-07-06 06:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(200) DEFAULT NULL,
  `c_desc` varchar(1000) DEFAULT NULL,
  `img1` varchar(200) DEFAULT NULL,
  `sts` int(11) NOT NULL,
  `date` datetime DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `od_sts`
--

DROP TABLE IF EXISTS `od_sts`;
CREATE TABLE IF NOT EXISTS `od_sts` (
  `ods_id` int(11) NOT NULL AUTO_INCREMENT,
  `od_id` int(11) NOT NULL,
  `sts1` int(11) NOT NULL,
  `sts2` int(11) NOT NULL,
  `sts3` int(11) NOT NULL,
  `sts4` int(11) NOT NULL,
  PRIMARY KEY (`ods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `od_sts`
--

INSERT INTO `od_sts` (`ods_id`, `od_id`, `sts1`, `sts2`, `sts3`, `sts4`) VALUES
(1, 3, 1, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_data`
--

DROP TABLE IF EXISTS `order_data`;
CREATE TABLE IF NOT EXISTS `order_data` (
  `or_d` int(11) NOT NULL AUTO_INCREMENT,
  `od_id` int(11) NOT NULL,
  `ct_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `sesion` varchar(200) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`or_d`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_data`
--

INSERT INTO `order_data` (`or_d`, `od_id`, `ct_id`, `u_id`, `sesion`, `orderid`, `date`) VALUES
(3, 2, 17, 2, 'a4ja5hh54655e804bi327ic8u2', 'Ordr61596', '2020-12-14 10:22:15'),
(4, 2, 18, 2, 'a4ja5hh54655e804bi327ic8u2', 'Ordr61596', '2020-12-14 10:22:15'),
(5, 3, 17, 2, '0d551e29e11f14d23bbf9fa88911144c', 'Ordr71299', '2020-12-14 21:41:19'),
(6, 3, 18, 2, '0d551e29e11f14d23bbf9fa88911144c', 'Ordr71299', '2020-12-14 21:41:19'),
(7, 4, 17, 2, '0d551e29e11f14d23bbf9fa88911144c', 'Ordr6793', '2020-12-14 21:46:25'),
(8, 4, 18, 2, '0d551e29e11f14d23bbf9fa88911144c', 'Ordr6793', '2020-12-14 21:46:25'),
(9, 5, 19, 2, '0d551e29e11f14d23bbf9fa88911144c', 'Ordr29177', '2020-12-14 21:49:00'),
(10, 6, 22, 3, 'b944cee843883700ca2e7e8c143b90d3', 'Ordr64652', '2020-12-15 09:28:47'),
(11, 7, 23, 3, 'dae28a3ac9a62ed2f66b7c30f163cd68', 'Ordr64949', '2020-12-15 10:37:48'),
(12, 9, 24, 3, 'dae28a3ac9a62ed2f66b7c30f163cd68', 'Ordr14786', '2020-12-15 10:42:43'),
(13, 10, 20, 2, '1aadc135fb4ee762712f56e346acda6c', 'Ordr96736', '2020-12-18 07:20:41'),
(14, 10, 25, 2, '1aadc135fb4ee762712f56e346acda6c', 'Ordr96736', '2020-12-18 07:20:41'),
(15, 11, 26, 2, '1aadc135fb4ee762712f56e346acda6c', 'Ordr22447', '2020-12-18 07:22:56'),
(16, 12, 27, 3, '088623a4d00c2fb7291ff79a6355e8e7', 'Ordr34991', '2020-12-18 10:52:27'),
(17, 13, 28, 4, '8b909d183f4a93280484ef1828e2dd26', 'Ordr22490', '2020-12-22 01:01:09'),
(18, 14, 29, 5, '3242ac32ad4b0604b9ff55b3034c9173', 'Ordr34810', '2020-12-22 11:28:53'),
(19, 15, 31, 7, '063a6424344d86fa7f754ec176652603', 'Ordr67033', '2021-01-02 11:18:09'),
(20, 16, 32, 8, 'cf46cfc64552bf7a4769479bc34f199b', 'Ordr52250', '2021-01-02 13:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `od_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip` varchar(200) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `ordernt` varchar(500) NOT NULL,
  `p_type` varchar(300) NOT NULL,
  `order_id` varchar(300) NOT NULL,
  `total` float NOT NULL,
  `date` varchar(200) NOT NULL,
  `u_id` int(11) NOT NULL,
  `psts` int(11) NOT NULL,
  `sts` int(11) NOT NULL,
  PRIMARY KEY (`od_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`od_id`, `name`, `email`, `address`, `city`, `state`, `zip`, `mobile`, `ordernt`, `p_type`, `order_id`, `total`, `date`, `u_id`, `psts`, `sts`) VALUES
(2, 'Altab', 'altabraja4@gmail.com', 'Flat 20', 'Rourkela', 'odisha', '770035', 7894947464, '', '1', 'Ordr61596', 855, '2020-12-14 10:22:15', 2, 2, 2),
(3, 'Altab', 'altabraja4@gmail.com', 'Sorda', 'Rourkela', 'odisha', '770035', 7894947464, '', '2', 'Ordr71299', 855, '2020-12-14 21:41:19', 2, 2, 1),
(4, 'Altab', 'altabraja4@gmail.com', 'Sorda', 'rourkela', 'odisha', '770035', 78949464, '', '2', 'Ordr6793', 855, '2020-12-14 21:46:25', 2, 2, 1),
(5, 'Altab', 'altabraja4@gmail.com', 'Sorda', 'sorda', 'odisha', '888888', 7788999333, '', '1', 'Ordr29177', 55, '2020-12-14 21:49:00', 2, 2, 1),
(6, 'Jayprakash Mohanty', 'm.jayprakash95@gmail.com', 'Cuttack', 'Cuttack', 'Odisha', '753004', 7655915251, '', '2', 'Ordr64652', 55, '2020-12-15 09:28:47', 3, 1, 1),
(7, 'Jayprakash Mohanty', 'm.jayprakash95@gmail.com', 'Cuttack', 'Cuttack', 'Odisha', '753004', 7655915251, '', '2', 'Ordr64949', 777, '2020-12-15 10:37:48', 3, 1, 1),
(8, 'Jayprakash Mohanty', 'm.jayprakash95@gmail.com', 'Cuttack', 'Cuttack', 'Odisha', '753004', 7655915251, '', '1', 'Ordr43870', 0, '2020-12-15 10:41:26', 3, 1, 1),
(9, 'Jayprakash Mohanty', 'm.jayprakash95@gmail.com', 'Cuttack', 'Cuttack', 'Odisha', '753004', 7655915251, '', '1', 'Ordr14786', 55, '2020-12-15 10:42:43', 3, 1, 1),
(10, 'Altab', 'altabraja4@gmail.com', 'Sorda', 'Rourkela', 'Odisha', '870083', 7894947464, '', '2', 'Ordr96736', 1, '2020-12-18 07:20:41', 2, 2, 1),
(11, 'Altab', 'altabraja4@gmail.com', 'Sorda', 'Rourkela', 'Sorda', '772131', 7894947464, '', '2', 'Ordr22447', 550, '2020-12-18 07:22:56', 2, 2, 1),
(12, 'Jayprakash Mohanty', 'm.jayprakash95@gmail.com', 'Cuttack', 'Cuttack', 'Odisha', '753004', 7655915251, '', '2', 'Ordr34991', 10, '2020-12-18 10:52:27', 3, 1, 1),
(13, 'Altan', 'altabraja4@gmail.com', 'Sorda', 'sadsad', 'sadsa', 'sadsad', 123213213, '', '1', 'Ordr22490', 1, '2020-12-22 01:01:09', 4, 1, 3),
(14, 'Jayprakash Mohanty', 'm.jayprakash95@gmail.com', 'Cuttack', 'Cuttack', 'Odisha', '753004', 7655915251, '', '2', 'Ordr34810', 10, '2020-12-22 11:28:53', 5, 1, 1),
(15, 'Jayprakash Mohanty', 'm.jayprakash95@gmail.com', 'Cuttack', 'Cuttack', 'Odisha', '753004', 7655915251, '', '2', 'Ordr67033', 10, '2021-01-02 11:18:09', 7, 1, 1),
(16, 'Altab raja', 'altabraja4@gmail.com', 'Kolkatta', 'Tree', 'Kollkata', '753012', 123456789, '', '2', 'Ordr52250', 1, '2021-01-02 13:15:10', 8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

DROP TABLE IF EXISTS `partner`;
CREATE TABLE IF NOT EXISTS `partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img1` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
CREATE TABLE IF NOT EXISTS `price` (
  `ps_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `price` float NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`ps_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) DEFAULT NULL,
  `sc_id` int(11) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `img1` varchar(200) DEFAULT NULL,
  `mprice` float DEFAULT NULL,
  `sprice` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `sdesc` longtext NOT NULL,
  `descr` text,
  `link` varchar(200) DEFAULT NULL,
  `sts` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proimage`
--

DROP TABLE IF EXISTS `proimage`;
CREATE TABLE IF NOT EXISTS `proimage` (
  `pi_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`pi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proimage`
--

INSERT INTO `proimage` (`pi_id`, `p_id`, `img1`, `date`) VALUES
(1, 1, 'uploads/6da31336b9959727ee5710391cea5e21.jpg', '2020-11-21 23:47:29'),
(2, 1, 'uploads/0ed51f882575f6b0675d1e78a5124ed5.jpg', '2020-11-21 23:47:34'),
(3, 1, 'uploads/c2e16d9a8ac90535cb5fd5d0cdb64093.jpg', '2020-11-21 23:47:39'),
(4, 2, 'uploads/f7754cb2574027ca29ce5f0acd425b72.jpg', '2020-11-22 23:05:54'),
(5, 2, 'uploads/714c7fd3116ab209166a5acdc5159436.jpg', '2020-11-22 23:06:00'),
(6, 0, 'uploads/9175f60f8c66b3ceafd1ee056180d894.', '2020-11-22 23:06:00'),
(7, 3, 'uploads/7f49d76da305cabc7bf6299042ab25e3.jpg', '2020-11-22 23:06:04'),
(8, 3, 'uploads/9166782163f3493a68bd07d0324542c3.jpg', '2020-11-22 23:06:08'),
(9, 4, 'uploads/edbf86935e328d8e0e01fc19fc778c33.jpg', '2020-11-22 23:06:11'),
(10, 4, 'uploads/1619a2708e9508f40187c21a4d80d2de.jpg', '2020-11-22 23:06:15'),
(11, 4, 'uploads/fa7282d5199fbcd1ec454ec73cb3827c.jpg', '2020-11-22 23:06:21'),
(12, 6, 'uploads/937036b5921185d82490893f88d47741.jpg', '2020-12-15 10:32:59'),
(13, 7, 'uploads/3b3ca30296388241d02a1d277db357d1.jpg', '2020-12-22 00:59:01'),
(14, 7, 'uploads/60e4dabd6ef7ce714fa610ac3393e99b.jpg', '2020-12-22 00:59:17'),
(15, 8, 'uploads/23cb5721c28daed42d5d750135f34c31.jpg', '2020-12-22 11:22:24'),
(16, 9, 'uploads/8dbba4b58643df825b893fb9b812a628.png', '2021-01-02 13:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

DROP TABLE IF EXISTS `seo`;
CREATE TABLE IF NOT EXISTS `seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(1000) NOT NULL,
  `description` longtext NOT NULL,
  `author` varchar(1000) NOT NULL,
  `canonical` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `keywords`, `description`, `author`, `canonical`, `title`, `date`) VALUES
(5, 'Shoes', 'Shoes', 'http://www.Shoes.in/', 'Shoes', 'Shoes', '2020-12-22 00:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

DROP TABLE IF EXISTS `sms`;
CREATE TABLE IF NOT EXISTS `sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `date`) VALUES
(2, '', '', 0, '', '', '2022-07-06 06:27:17'),
(3, '', '', 0, '', '', '2022-07-17 22:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `sc_name` varchar(200) NOT NULL,
  `sc_desc` varchar(500) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `sts` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `post` varchar(200) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `whatsapp` varchar(200) NOT NULL,
  `linkdin` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `post`, `img1`, `facebook`, `instagram`, `whatsapp`, `linkdin`, `date`) VALUES
(4, 'altab raja', 'CTO', 'uploads/63cfcbce574c4c7d09b92aae2b18965b.jpg', 'altab', 'altab', '7894947464', 'atlabra', '2020-08-29 00:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `para` longblob NOT NULL,
  `sts` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `img1`, `para`, `sts`, `date`) VALUES
(7, '', 'uploads/002d079c9065644922ecd04fb80568fd.php', 0x3c703e48733c2f703e0d0a, 0, '2020-12-22 00:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
CREATE TABLE IF NOT EXISTS `unit` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `otp` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `sts` int(11) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `email`, `mobile`, `password`, `otp`, `date`, `sts`) VALUES
(4, 'Altab', 'altabraja4@gmail.com', 789494744, '123456', 9859, '2020-12-22 01:00:34', 1),
(5, 'Jayprakash Mohanty', 'm.jayprakash95@gmail.com', 7655915251, '123456', 8453, '2020-12-22 11:27:53', 1),
(6, 'subhrajit ray', 'cscegov.demal@gmail.com', 9237069326, 'biki5Aul@', 9176, '2020-12-22 18:39:31', 1),
(7, 'Jayprakash Mohanty', 'm.jayprakash95@gmail.com', 7655915251, '123456789', 9765, '2021-01-02 11:17:09', 1),
(8, 'Altab ', 'altabraja4@gmail.com', 1234567890, '123456', 7129, '2021-01-02 13:14:04', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
