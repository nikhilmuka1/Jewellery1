-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2017 at 07:50 AM
-- Server version: 5.6.35-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jwellary_market_place`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `added_by` varchar(255) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT 'undefine',
  `email` varchar(200) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `role_id` int(11) NOT NULL DEFAULT '0',
  `today_login` datetime NOT NULL,
  `pre_login` datetime NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'defult.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`added_by`, `id`, `name`, `email`, `password`, `mobile`, `status`, `role_id`, `today_login`, `pre_login`, `image`) VALUES
('1', 1, 'admin', 'admin@marketplace.com', 'c8d32c2a41fc240a82ea6e2d1566e8ef', '8109112337', 1, 1, '2017-08-17 16:33:00', '2017-08-16 14:38:03', 'admin-2017-08-08-10-53-31.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE IF NOT EXISTS `attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_set_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `input_type` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `delete` int(11) NOT NULL,
  `attribute_option` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`id`, `attribute_set_id`, `name`, `input_type`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `delete`, `attribute_option`) VALUES
(5, 2, 'Length', 'text', 1, '2017-07-31 18:03:01', 1, '0000-00-00 00:00:00', '', 0, ''),
(10, 2, 'Height', 'text', 1, '2017-07-31 18:27:43', 1, '0000-00-00 00:00:00', '', 0, ''),
(11, 2, 'color', 'select', 1, '2017-07-31 18:29:15', 1, '2017-08-04 20:18:45', '1', 0, 'Black,Blue,Yellow,Green,Cyan,Orange,Violet,White'),
(14, 0, 'Size', 'select', 1, '2017-08-04 20:35:43', 1, '0000-00-00 00:00:00', '', 0, '5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_set`
--

CREATE TABLE IF NOT EXISTS `attribute_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `assign_attributes` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `delete` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `attribute_set`
--

INSERT INTO `attribute_set` (`id`, `name`, `assign_attributes`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `delete`) VALUES
(1, 'tet', '2,9', 1, '2017-08-01 14:17:17', 1, '2017-08-01 15:14:38', '1', 1),
(2, 'Necklaces', '11,5,10', 1, '2017-08-01 14:19:17', 1, '2017-08-04 20:12:01', '1', 0),
(3, 'terere1d', '2,11,3,9,10', 0, '2017-08-01 14:21:01', 1, '2017-08-01 14:56:15', '1', 1),
(4, 'rings', '2,11,5', 1, '2017-08-01 14:21:42', 1, '0000-00-00 00:00:00', '', 0),
(5, 'Jwellary', '11,5,10', 1, '2017-08-01 15:33:24', 1, '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE IF NOT EXISTS `billing_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`id`, `user_id`, `first_name`, `last_name`, `city`, `state`, `email`, `zip_code`, `address`, `phone_no`, `added_on`, `updated_on`, `ip_address`) VALUES
(1, 0, 'test', 'tet', 'teste', '', '32323@gggg.cccc', '3232331', 'rwererw', '323233233333', '2017-08-17 17:25:42', '0000-00-00 00:00:00', '183.182.86.246'),
(2, 0, 'test', 'fffff', 'test@fffff,com', '', 'ffffff@gggg.cc', '1111111', 'ffffffffff', '2111111111', '2017-08-17 17:28:20', '0000-00-00 00:00:00', '183.182.86.246'),
(3, 5, 'test', 'test', 'test', '', 'twttt@gggg.ccc', '2323211', '2332323', '323233333333', '2017-08-18 11:48:28', '0000-00-00 00:00:00', '183.182.86.246'),
(11, 5, 'tsest', 'tet', 'tset', '', 'aaaaaaaaaaaagggg@fffff.vvvv', '111111', '1212', '11111111111', '2017-08-18 14:34:39', '0000-00-00 00:00:00', '183.182.86.246'),
(13, 5, 'test', 'tet', 'tet', '', 'tet@dfsffsf.vv', '3444434', 'tetdfsfs', '4444444444', '2017-08-18 15:56:44', '0000-00-00 00:00:00', '183.182.86.246');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `added_on`, `added_by`, `updated_by`, `updated_on`, `status`, `delete`) VALUES
(2, 'Nakshatra', 'Nakshatra', 'facebook-2017-07-21-17-25-42.jpg', '2017-07-21 17:25:42', '1', '1', '2017-08-08 12:13:13', 1, 0),
(3, 'TBZ', 'TBZ', 'temstion-2017-07-21-17-34-16.jpg', '2017-07-21 17:34:16', '1', '1', '2017-08-04 20:04:49', 1, 0),
(4, 'MEENAZ', 'MEENAZ', 'MEENAZ-2017-08-12-14-13-28.png', '2017-08-12 14:13:29', '1', '1', '2017-08-12 14:13:29', 1, 0),
(5, 'Tanishq ', 'Tanishq-', 'Tanishq--2017-08-12-14-16-24.png', '2017-08-12 14:16:24', '1', '1', '2017-08-12 14:16:24', 1, 0),
(6, 'Mia ', 'Mia-', 'Mia--2017-08-12-14-18-57.png', '2017-08-12 14:18:57', '1', '1', '2017-08-12 14:18:57', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `item_price` varchar(200) NOT NULL,
  `sku_code` varchar(255) NOT NULL,
  `shipping_charge` varchar(100) NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `added_on` datetime NOT NULL,
  `update_on` datetime NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `seller_id`, `product_id`, `qty`, `item_price`, `sku_code`, `shipping_charge`, `total_price`, `added_on`, `update_on`, `ip_address`) VALUES
(5, 4, 4, 8, '1', '67', 'Test1234', '', '67', '2017-08-14 20:04:57', '0000-00-00 00:00:00', '183.182.86.246');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(200) NOT NULL DEFAULT '0',
  `slug` varchar(200) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT 'defult.jpg',
  `added_on` datetime NOT NULL,
  `added_by` varchar(200) NOT NULL DEFAULT '0',
  `updated_by` varchar(200) NOT NULL DEFAULT '0',
  `updated_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `slug`, `image`, `added_on`, `added_by`, `updated_by`, `updated_on`, `status`, `delete`) VALUES
(14, 0, 'Just In', 'Just-In', 'Hair-and-head-ornaments-2017-08-12-14-27-00.png', '2017-08-12 14:27:00', '1', '1', '2017-08-14 17:20:05', 1, 0),
(15, 18, 'Earring', 'Earring', 'Earring-2017-08-12-14-27-34.png', '2017-08-12 14:27:34', '1', '1', '2017-08-12 14:27:34', 1, 0),
(16, 18, 'Hatpin', 'Hatpin', 'Hatpin-2017-08-12-14-27-54.png', '2017-08-12 14:27:54', '1', '1', '2017-08-12 14:27:54', 1, 0),
(17, 18, 'Hairpins', 'Hairpins', 'defult.jpg', '2017-08-12 14:32:30', '1', '1', '2017-08-12 14:32:30', 1, 0),
(18, 0, 'Women', 'Women', 'defult.jpg', '2017-08-12 14:33:00', '1', '1', '2017-08-14 17:20:30', 1, 0),
(19, 18, 'Necklaces', 'Necklaces', 'defult.jpg', '2017-08-12 14:33:33', '1', '1', '2017-08-12 14:33:33', 1, 0),
(20, 18, 'Chokers', 'Chokers', 'defult.jpg', '2017-08-12 14:33:43', '1', '1', '2017-08-12 14:33:43', 1, 0),
(21, 18, 'Armlets ', 'Armlets-', 'defult.jpg', '2017-08-12 14:34:10', '1', '1', '2017-08-12 14:34:10', 0, 0),
(22, 0, 'Men', 'Men', 'defult.jpg', '2017-08-12 14:34:30', '1', '1', '2017-08-14 17:21:22', 1, 0),
(23, 22, 'Friendship bracelets', 'Friendship-bracelets', 'defult.jpg', '2017-08-12 14:34:40', '1', '1', '2017-08-12 14:34:40', 1, 0),
(24, 22, 'Gospel bracelets', 'Gospel-bracelets', 'defult.jpg', '2017-08-12 14:34:50', '1', '1', '2017-08-12 14:34:50', 1, 0),
(25, 18, 'Bangles', 'Bangles', 'defult.jpg', '2017-08-12 14:35:02', '1', '1', '2017-08-12 14:35:02', 0, 0),
(26, 22, 'Hands', 'Hands', 'defult.jpg', '2017-08-12 14:35:17', '1', '1', '2017-08-12 14:35:17', 0, 0),
(27, 18, 'Slave bracelets', 'Slave-bracelets', 'defult.jpg', '2017-08-12 14:35:36', '1', '1', '2017-08-12 14:35:36', 0, 0),
(28, 22, 'Ring', 'Ring', 'defult.jpg', '2017-08-12 14:36:05', '1', '1', '2017-08-12 14:36:05', 0, 0),
(29, 22, 'Engagement rings', 'Engagement-rings', 'defult.jpg', '2017-08-12 14:36:18', '1', '1', '2017-08-12 14:36:18', 1, 0),
(30, 22, 'Class rings', 'Class-rings', 'defult.jpg', '2017-08-12 14:36:45', '1', '1', '2017-08-12 14:36:45', 1, 0),
(31, 18, 'Promise rings', 'Promise-rings', 'defult.jpg', '2017-08-12 14:36:56', '1', '1', '2017-08-12 14:36:56', 1, 0),
(32, 28, 'Wedding rings', 'Wedding-rings', 'defult.jpg', '2017-08-12 14:37:07', '1', '1', '2017-08-12 14:37:07', 1, 0),
(33, 14, 'Emblems', 'Emblems', 'defult.jpg', '2017-08-12 14:37:44', '1', '1', '2017-08-12 14:37:44', 1, 0),
(34, 14, 'Lockets', 'Lockets', 'defult.jpg', '2017-08-12 14:37:55', '1', '1', '2017-08-12 14:37:55', 1, 0),
(35, 14, 'Pendants', 'Pendants', 'defult.jpg', '2017-08-12 14:38:12', '1', '1', '2017-08-12 14:38:12', 1, 0),
(36, 14, 'Diamonds', 'Diamonds', 'defult.jpg', '2017-08-12 14:39:11', '1', '1', '2017-08-12 14:39:11', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `configure_attribute_option`
--

CREATE TABLE IF NOT EXISTS `configure_attribute_option` (
  `product_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `associated_product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `attribute_name` varchar(200) NOT NULL,
  `option_name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `price_type` varchar(20) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `delete` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `configure_attribute_option`
--

INSERT INTO `configure_attribute_option` (`product_id`, `id`, `associated_product_id`, `attribute_id`, `attribute_name`, `option_name`, `price`, `price_type`, `added_on`, `added_by`, `updated_on`, `updated_by`, `delete`) VALUES
(28, 1, 17, 11, 'color 1', ' tte ', '100', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(28, 2, 17, 5, 'fsdf', ' yesssssssssssst', '23', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(28, 3, 24, 11, 'color 1', 'test', '3', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(28, 4, 24, 5, 'fsdf', ' etete', '4', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(28, 5, 16, 11, 'color 1', 'test', '5', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(28, 6, 16, 5, 'fsdf', ' 32323', '9', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(28, 7, 17, 11, 'color 1', ' tte ', 'color 1', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(28, 8, 24, 11, 'color 1', 'test', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(28, 9, 24, 5, 'fsdf', ' etete', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(28, 10, 17, 5, 'fsdf', ' yesssssssssssst', 'fsdf', 'percent', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(28, 11, 16, 11, 'color 1', 'test', 'color 1', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(28, 12, 16, 5, 'fsdf', ' 32323', 'fsdf', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(15, 17, 9, 11, 'color 1', ' tte ', '300', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(15, 18, 8, 11, 'color 1', 'test', '580', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(17, 19, 18, 11, 'color 1', ' tte ', '85', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(17, 20, 18, 5, 'fsdf', ' rdfffff', '100', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(24, 21, 25, 11, 'color', 'Orange', '200', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(24, 22, 25, 10, 'Height', '43', '20', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(26, 23, 27, 11, 'color', 'Blue', '5', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(31, 24, 29, 11, 'color', 'Orange', '455', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(31, 25, 29, 10, 'Height', '55', '46', 'percent', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(31, 26, 25, 11, 'color', 'Orange', '46', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(31, 27, 25, 10, 'Height', '43', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(32, 32, 33, 11, 'color', 'Blue', '20', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(32, 33, 33, 5, 'Length', '77', '10', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `added_on` datetime NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `first_name`, `last_name`, `email`, `telephone`, `comment`, `added_on`, `ip_address`) VALUES
(1, 'sneha', 'paliwal', 'test@gmail.com', '9876543210', 'sp', '2017-08-17 17:05:56', ''),
(9, 'test', 'test', 'mmfinfotech1075@gmail.com', '654321', 'spin hj', '2017-08-17 18:23:10', ''),
(8, 'test', 'test', 'mmfinfotech1075@gmail.com', '654321', 'spin hj', '2017-08-17 18:03:37', ''),
(7, 'test', 'test', 'mmfinfotech1075@gmail.com', '654321', 'spin hj', '2017-08-17 18:03:04', ''),
(10, 'test', 'test', 'mmfinfotech253@gmail.com', '654321', 'spin hj', '2017-08-17 18:24:45', '');

-- --------------------------------------------------------

--
-- Table structure for table `custom_design`
--

CREATE TABLE IF NOT EXISTS `custom_design` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT '',
  `email` varchar(250) DEFAULT '',
  `mobile` int(11) DEFAULT NULL,
  `message` varchar(250) DEFAULT '',
  `image` varchar(250) DEFAULT '',
  `status` int(11) DEFAULT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `custom_design`
--

INSERT INTO `custom_design` (`id`, `name`, `email`, `mobile`, `message`, `image`, `status`, `added_on`) VALUES
(1, 'sneha-test', 'mmfinfotech1075@gmail.com', 123456, 'nj', 'sneha-test-.jpg', 1, '2017-08-17 15:44:54'),
(2, 'sneha-test', 'mmfinfotech1075@gmail.com', 123456, 'teting', 'sneha-test-.jpg', 1, '2017-08-17 15:46:45'),
(18, 'sneha', 'sneha@gmail.com', 874569, 'testing', 'sneha-2017-08-17-18-35-03.jpg', 1, '2017-08-17 18:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `custom_options`
--

CREATE TABLE IF NOT EXISTS `custom_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `input_type` varchar(200) NOT NULL,
  `is_require` tinyint(4) NOT NULL DEFAULT '0',
  `sort_order` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `update_on` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_type` varchar(20) NOT NULL,
  `added_type` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `opt_sort_order_row` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `custom_options`
--

INSERT INTO `custom_options` (`id`, `product_id`, `title`, `input_type`, `is_require`, `sort_order`, `added_on`, `added_by`, `update_on`, `update_by`, `update_type`, `added_type`, `status`, `opt_sort_order_row`) VALUES
(3, 0, 'test', 'field', 1, 1, '2017-07-29 12:30:55', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(5, 0, 'test', 'field', 1, 1, '2017-07-29 12:30:55', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(36, 3, 'tet', 'field', 1, 1, '2017-07-29 14:47:40', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(37, 3, '343', 'drop_down', 1, 2, '2017-07-29 14:47:40', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(64, 1, '211', 'drop_down', 0, 2, '2017-07-29 15:34:48', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(65, 5, 'est', 'drop_down', 1, 1, '2017-07-31 20:45:37', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(66, 6, 'yryr', 'drop_down', 1, 1, '2017-08-02 11:05:13', 1, '0000-00-00 00:00:00', 0, '', '', 1, 0),
(67, 6, 'yete', 'drop_down', 1, 2, '2017-08-02 11:05:13', 1, '0000-00-00 00:00:00', 0, '', '', 1, 0),
(68, 10, 'NJ', 'drop_down', 1, 1, '2017-08-03 15:20:50', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(69, 12, 'tetr', 'drop_down', 0, 1, '2017-08-03 18:08:35', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(70, 15, 'tt', 'drop_down', 0, 1, '2017-08-03 19:19:27', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(71, 15, '', 'drop_down', 1, 2, '2017-08-03 19:19:27', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(72, 26, 'Nj test', 'drop_down', 1, 1, '2017-08-08 11:00:59', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(73, 28, 'test a c', 'drop_down', 1, 1, '2017-08-08 13:01:03', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(74, 31, 'test con 1', 'drop_down', 1, 1, '2017-08-08 14:10:48', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(75, 31, 'test con 2', 'drop_down', 1, 2, '2017-08-08 14:10:48', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(76, 32, 'rte', 'drop_down', 1, 1, '2017-08-08 14:28:58', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(77, 8, 'Size', 'drop_down', 1, 1, '2017-08-13 11:46:54', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `custom_option_value`
--

CREATE TABLE IF NOT EXISTS `custom_option_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` int(11) NOT NULL,
  `input_type` varchar(30) NOT NULL,
  `price` varchar(200) NOT NULL,
  `price_type` varchar(200) NOT NULL,
  `SKU` varchar(100) NOT NULL,
  `opt_maxchar` varchar(20) NOT NULL,
  `option_title` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `creted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `opt_sort_order_row` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `custom_option_value`
--

INSERT INTO `custom_option_value` (`id`, `option_id`, `input_type`, `price`, `price_type`, `SKU`, `opt_maxchar`, `option_title`, `status`, `creted_date`, `opt_sort_order_row`) VALUES
(1, 1, 'field', '343', 'percent', '3333', '3', '0', 1, '2017-07-29 05:55:41', ''),
(2, 2, 'drop_down', '444', 'fixed', '33', '', '0', 1, '2017-07-29 05:55:41', '3'),
(3, 2, 'drop_down', '3333', 'fixed', '222', '', '222', 1, '2017-07-29 05:55:41', '3'),
(4, 3, 'field', '', 'fixed', '323', '322', '0', 1, '2017-07-29 07:00:55', ''),
(5, 5, 'field', '', '', '', '', '0', 1, '2017-07-29 07:00:55', ''),
(6, 6, 'field', '', '', '', '', '0', 1, '2017-07-29 07:23:23', ''),
(7, 9, 'field', '', '', '', '', '0', 1, '2017-07-29 07:24:41', ''),
(8, 10, 'field', '21', 'fixed', '32', '', '0', 1, '2017-07-29 07:28:48', ''),
(9, 11, 'field', '', '', '', '', '0', 1, '2017-07-29 07:28:48', ''),
(10, 12, 'field', '', '', '', '', '0', 1, '2017-07-29 07:33:09', ''),
(11, 14, 'field', '434', 'fixed', '34343', '', '0', 1, '2017-07-29 08:24:41', ''),
(12, 15, 'field', '', '', '', '', '0', 1, '2017-07-29 08:24:41', ''),
(13, 16, 'field', '', '', '', '', '0', 1, '2017-07-29 09:04:26', ''),
(14, 18, 'field', '', '', '', '', '0', 1, '2017-07-29 09:04:26', ''),
(15, 19, 'field', '', '', '', '', '0', 1, '2017-07-29 09:06:25', ''),
(16, 21, 'field', '', '', '', '', '0', 1, '2017-07-29 09:06:25', ''),
(17, 22, 'field', '', '', '', '', '0', 1, '2017-07-29 09:08:20', ''),
(18, 24, 'field', '', '', '', '', '0', 1, '2017-07-29 09:08:20', ''),
(19, 25, 'field', '', '', '', '', '0', 1, '2017-07-29 09:09:44', ''),
(20, 27, 'field', '', '', '', '', '0', 1, '2017-07-29 09:09:44', ''),
(21, 28, 'field', '', '', '', '', '0', 1, '2017-07-29 09:11:39', ''),
(22, 30, 'field', '', '', '', '', '0', 1, '2017-07-29 09:11:39', ''),
(23, 32, 'field', '', '', '', '', '0', 1, '2017-07-29 09:12:31', ''),
(24, 33, 'field', '', '', '', '', '0', 1, '2017-07-29 09:13:30', ''),
(25, 35, 'field', '', '', '', '', '0', 1, '2017-07-29 09:13:30', ''),
(26, 36, 'field', '', 'fixed', 'et', '', '0', 1, '2017-07-29 09:17:40', ''),
(27, 37, 'drop_down', '45', 'fixed', 'kkkk', '', '45', 1, '2017-07-29 09:17:40', '9'),
(28, 38, 'field', '', '', '', '', '0', 1, '2017-07-29 09:18:05', ''),
(29, 40, 'field', '', '', '', '', '0', 1, '2017-07-29 09:18:06', ''),
(30, 41, 'field', '', '', '', '', '0', 1, '2017-07-29 09:21:21', ''),
(31, 42, 'field', '222', 'percent', '44444', '4', '0', 1, '2017-07-29 09:21:46', ''),
(32, 43, 'field', '', '', '', '', '0', 1, '2017-07-29 09:21:47', ''),
(33, 44, 'field', '222', 'percent', '44444', '4', '0', 1, '2017-07-29 09:25:14', ''),
(34, 45, 'field', '', '', '', '', '0', 1, '2017-07-29 09:25:14', ''),
(35, 46, 'field', '222', 'percent', '44444', '4', '0', 1, '2017-07-29 09:26:07', ''),
(36, 47, 'field', '', '', '', '', '0', 1, '2017-07-29 09:26:07', ''),
(37, 48, 'field', '222', 'percent', '44444', '4', '0', 1, '2017-07-29 09:27:04', ''),
(38, 49, 'field', '', '', '', '', '0', 1, '2017-07-29 09:27:04', ''),
(39, 50, 'field', '11', 'percent', '111', '111', '0', 1, '2017-07-29 09:46:20', ''),
(40, 51, 'field', '111', 'percent', '1212', '212', '0', 1, '2017-07-29 09:46:20', ''),
(41, 53, 'field', '11', 'percent', '111', '111', '0', 1, '2017-07-29 09:48:04', ''),
(42, 54, 'field', '111', 'percent', '1212', '212', '0', 1, '2017-07-29 09:48:04', ''),
(43, 56, 'field', '11', 'percent', '111', '111', '0', 1, '2017-07-29 09:50:05', ''),
(44, 57, 'field', '111', 'percent', '1212', '212', '0', 1, '2017-07-29 09:50:05', ''),
(45, 60, 'field', '', 'fixed', '', '', '0', 1, '2017-07-29 10:04:04', ''),
(46, 62, 'field', '', 'fixed', '', '', '0', 1, '2017-07-29 10:04:05', ''),
(47, 65, 'drop_down', '4343', 'fixed', '4343', '', '0', 1, '2017-07-31 15:15:37', ''),
(48, 65, 'drop_down', '333', 'fixed', '5de', '', '0', 1, '2017-07-31 15:15:37', ''),
(49, 66, 'drop_down', '3232', 'fixed', 'test ', '', '0', 1, '2017-08-02 05:35:13', '1'),
(50, 67, 'drop_down', '34443', 'fixed', '33333', '', '0', 1, '2017-08-02 05:35:13', ''),
(51, 68, 'drop_down', '250', 'fixed', '2111', '', '0', 1, '2017-08-03 09:50:50', '1'),
(52, 69, 'drop_down', 'ert', 'fixed', 'ret', '', '0', 1, '2017-08-03 12:38:35', ''),
(53, 69, 'drop_down', '545', 'fixed', 'rte', '', '0', 1, '2017-08-03 12:38:35', ''),
(54, 70, 'drop_down', '444', 'fixed', '43', '', 'test', 1, '2017-08-03 13:49:27', '1'),
(55, 70, 'drop_down', '4443', 'fixed', '434d', '', '3test', 1, '2017-08-03 13:49:27', '343'),
(56, 72, 'drop_down', '1', 'fixed', '1', '', 'GM', 1, '2017-08-08 05:30:59', '1'),
(57, 73, 'drop_down', '343', 'fixed', '4343', '', 'ac1', 1, '2017-08-08 07:31:03', '3'),
(58, 73, 'drop_down', '34', 'fixed', '4334', '', 'ac2', 1, '2017-08-08 07:31:03', '2'),
(59, 73, 'drop_down', '434', 'fixed', '5434', '', 'ac3', 1, '2017-08-08 07:31:03', '1'),
(60, 74, 'drop_down', '500', 'fixed', 'fgdg', '', '1', 1, '2017-08-08 08:40:48', '1'),
(61, 74, 'drop_down', '400', 'fixed', 'gfgr', '', '2', 1, '2017-08-08 08:40:48', '1'),
(62, 75, 'drop_down', '1', 'fixed', '1r', '', '1', 1, '2017-08-08 08:40:48', '2'),
(63, 76, 'drop_down', '434', 'fixed', '43', '', '34', 1, '2017-08-08 08:58:58', '43'),
(64, 77, 'drop_down', '12', 'fixed', '', '', '22', 1, '2017-08-13 06:16:54', ''),
(65, 77, 'drop_down', '', 'fixed', '', '', '12', 1, '2017-08-13 06:16:54', '');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `order_type` varchar(100) NOT NULL,
  `shipping_charge` varchar(100) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `ship_date` datetime NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `Sales_tax` varchar(50) NOT NULL,
  `ammount` varchar(200) NOT NULL,
  `subtotal` varchar(200) NOT NULL,
  `Transact_status` varchar(255) NOT NULL,
  `Err_Loc` varchar(255) NOT NULL,
  `Paid` tinyint(4) NOT NULL,
  `PaymentDate` datetime NOT NULL,
  `delevery_status` tinyint(4) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `delevery_date` datetime NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `order_no`, `order_type`, `shipping_charge`, `payment_id`, `address_id`, `order_date`, `ship_date`, `shipper_id`, `Sales_tax`, `ammount`, `subtotal`, `Transact_status`, `Err_Loc`, `Paid`, `PaymentDate`, `delevery_status`, `ip_address`, `delevery_date`, `added_on`) VALUES
(1, 5, 'ORD149655010', 'COD', '', 0, 13, '2017-08-18 18:32:15', '0000-00-00 00:00:00', 0, '0.00', '$ 1,852.00', '$ 1,797.00', '', '', 0, '0000-00-00 00:00:00', 0, '183.182.86.246', '0000-00-00 00:00:00', '2017-08-18 13:07:52'),
(2, 5, 'ORD1316171097', 'COD', '', 0, 13, '2017-08-18 18:39:06', '0000-00-00 00:00:00', 0, '0.00', '$ 55.00', '$ 0.00', '', '', 0, '0000-00-00 00:00:00', 0, '183.182.86.246', '0000-00-00 00:00:00', '2017-08-18 13:09:06'),
(3, 5, 'ORD473235389', 'COD', '', 0, 13, '2017-08-18 18:39:06', '0000-00-00 00:00:00', 0, '0.00', '$ 55.00', '$ 0.00', '', '', 0, '0000-00-00 00:00:00', 0, '183.182.86.246', '0000-00-00 00:00:00', '2017-08-18 13:09:06'),
(4, 5, 'ORD1371073606', 'COD', '', 0, 13, '2017-08-18 18:42:20', '0000-00-00 00:00:00', 0, '0.00', '$ 55.00', '$ 0.00', '', '', 0, '0000-00-00 00:00:00', 0, '183.182.86.246', '0000-00-00 00:00:00', '2017-08-18 13:12:20'),
(5, 5, 'ORD1347078125', 'COD', '', 0, 13, '2017-08-18 18:42:20', '0000-00-00 00:00:00', 0, '0.00', '$ 55.00', '$ 0.00', '', '', 0, '0000-00-00 00:00:00', 0, '183.182.86.246', '0000-00-00 00:00:00', '2017-08-18 13:12:20'),
(6, 5, 'ORD1811577542', 'COD', '', 0, 13, '2017-08-18 18:43:23', '0000-00-00 00:00:00', 0, '0.00', '$ 55.00', '$ 0.00', '', '', 0, '0000-00-00 00:00:00', 0, '183.182.86.246', '0000-00-00 00:00:00', '2017-08-18 13:13:23'),
(7, 5, 'ORD521508238', 'COD', '', 0, 13, '2017-08-18 18:43:23', '0000-00-00 00:00:00', 0, '0.00', '$ 55.00', '$ 0.00', '', '', 0, '0000-00-00 00:00:00', 0, '183.182.86.246', '0000-00-00 00:00:00', '2017-08-18 13:13:23'),
(8, 5, 'ORD1516373581', 'COD', '', 0, 13, '2017-08-18 18:55:15', '0000-00-00 00:00:00', 0, '0.00', '$ 18,109.00', '$ 18,054.00', '', '', 0, '0000-00-00 00:00:00', 0, '183.182.86.246', '0000-00-00 00:00:00', '2017-08-18 13:25:15'),
(9, 5, 'ORD1765174127', 'COD', '', 0, 13, '2017-08-18 18:55:15', '0000-00-00 00:00:00', 0, '0.00', '$ 18,109.00', '$ 18,054.00', '', '', 0, '0000-00-00 00:00:00', 0, '183.182.86.246', '0000-00-00 00:00:00', '2017-08-18 13:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `Brand_id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(20) NOT NULL,
  `productImage` text NOT NULL,
  `sku_product` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `size` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `Fulfilled` tinyint(4) NOT NULL,
  `order_Date` datetime NOT NULL,
  `ShipperID` int(11) NOT NULL,
  `SalesTax` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `user_id`, `seller_id`, `product_id`, `Brand_id`, `productName`, `price`, `productImage`, `sku_product`, `quantity`, `discount`, `total`, `size`, `color`, `Fulfilled`, `order_Date`, `ShipperID`, `SalesTax`) VALUES
(1, 6, 5, 0, 5, 2, '18K WHITE GOLD JOANNA CUSHION HALO WITH ROUND CUT DIAMOND RING (.36 CTW.)', '1675', 'http://www.globalresearchfirm.com/marketplace/images/products/thumb/18K-WHITE-GOLD-JOANNA-CUSHION-HALO-WITH-ROUND-CUT-DIAMOND-RING---36-CTW---2017-08-12-15-10-52 _ RA217CR100T.jpg.jpg', ' RC712A', '', '0', '', '', '', 0, '2017-08-18 18:43:23', 0, ''),
(2, 6, 5, 0, 9, 2, 'test2', '', 'http://www.globalresearchfirm.com/marketplace/frontend/img/default-product-image.png', '323232', '1', '0', '0', '', '', 0, '2017-08-18 18:43:23', 0, ''),
(3, 7, 5, 0, 5, 2, '18K WHITE GOLD JOANNA CUSHION HALO WITH ROUND CUT DIAMOND RING (.36 CTW.)', '1675', 'http://www.globalresearchfirm.com/marketplace/images/products/thumb/18K-WHITE-GOLD-JOANNA-CUSHION-HALO-WITH-ROUND-CUT-DIAMOND-RING---36-CTW---2017-08-12-15-10-52 _ RA217CR100T.jpg.jpg', ' RC712A', '', '0', '', '', '', 0, '2017-08-18 18:43:23', 0, ''),
(4, 7, 5, 0, 9, 2, 'test2', '', 'http://www.globalresearchfirm.com/marketplace/frontend/img/default-product-image.png', '323232', '1', '0', '0', '', '', 0, '2017-08-18 18:43:23', 0, ''),
(5, 8, 5, 0, 9, 2, 'test2', '', 'http://www.globalresearchfirm.com/marketplace/frontend/img/default-product-image.png', '323232', '4', '0', '0', '', '', 0, '2017-08-18 18:55:15', 0, ''),
(6, 8, 5, 0, 5, 2, '18K WHITE GOLD JOANNA CUSHION HALO WITH ROUND CUT DIAMOND RING (.36 CTW.)', '1675', 'http://www.globalresearchfirm.com/marketplace/images/products/thumb/18K-WHITE-GOLD-JOANNA-CUSHION-HALO-WITH-ROUND-CUT-DIAMOND-RING---36-CTW---2017-08-12-15-10-52 _ RA217CR100.jpg.jpg', ' RC712A', '3', '0', '18054', '', '', 0, '2017-08-18 18:55:15', 0, ''),
(7, 9, 5, 0, 9, 2, 'test2', '', 'http://www.globalresearchfirm.com/marketplace/frontend/img/default-product-image.png', '323232', '4', '0', '0', '', '', 0, '2017-08-18 18:55:15', 0, ''),
(8, 9, 5, 0, 5, 2, '18K WHITE GOLD JOANNA CUSHION HALO WITH ROUND CUT DIAMOND RING (.36 CTW.)', '1675', 'http://www.globalresearchfirm.com/marketplace/images/products/thumb/18K-WHITE-GOLD-JOANNA-CUSHION-HALO-WITH-ROUND-CUT-DIAMOND-RING---36-CTW---2017-08-12-15-10-52 _ RA217CR100.jpg.jpg', ' RC712A', '3', '0', '18054', '', '', 0, '2017-08-18 18:55:15', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `SKU` varchar(50) NOT NULL,
  `Brand` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `seller_id` int(11) NOT NULL,
  `category_id` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_size` varchar(50) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `carat` varchar(50) NOT NULL,
  `price` varchar(25) NOT NULL,
  `measurement_size` varchar(200) NOT NULL,
  `Material` varchar(100) NOT NULL,
  `product_metal` varchar(100) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `resizable` tinyint(4) NOT NULL,
  `unit_weight` varchar(50) NOT NULL,
  `units_InStock` smallint(6) NOT NULL,
  `units_onOrder` smallint(6) NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `discount_available` tinyint(1) NOT NULL,
  `discount_rate` varchar(20) NOT NULL,
  `current_order` tinyint(1) NOT NULL,
  `stone_description` text NOT NULL,
  `is_available` tinyint(4) NOT NULL,
  `ranking` int(11) NOT NULL,
  `stone` varchar(200) NOT NULL,
  `no_of_stone` varchar(20) NOT NULL,
  `stone_setting` varchar(200) NOT NULL,
  `stone_color` varchar(50) NOT NULL,
  `stone_clarity` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `method` varchar(10) NOT NULL DEFAULT 'form' COMMENT 'form or csv',
  `stone_shape` varchar(200) NOT NULL,
  `inv_qty` varchar(20) NOT NULL,
  `min_sale_qty` varchar(20) NOT NULL,
  `max_sale_qty` varchar(20) NOT NULL,
  `inventory_min_qty` varchar(20) NOT NULL,
  `is_in_stock` tinyint(4) NOT NULL,
  `related_check_list` varchar(255) NOT NULL,
  `associated_check_list` varchar(255) NOT NULL,
  `group_products` varchar(200) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` varchar(200) NOT NULL COMMENT 'id-user type',
  `updated_by` varchar(100) NOT NULL COMMENT 'id-user type',
  `updated_on` datetime NOT NULL,
  `image_certificate` varchar(200) NOT NULL,
  `added_user_type` varchar(15) NOT NULL,
  `update_user_type` varchar(15) NOT NULL,
  `delete` tinyint(4) NOT NULL DEFAULT '0',
  `visiablity` int(11) NOT NULL DEFAULT '1' COMMENT '1 for all, 2 for grouped and 3 for assosiated products only',
  `attribute_opt_value` text NOT NULL,
  `attribute_set_id` int(11) NOT NULL,
  `attribute_arr` varchar(200) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `SKU`, `Brand`, `product_name`, `product_type`, `slug`, `product_description`, `seller_id`, `category_id`, `quantity`, `unit_size`, `unit_price`, `carat`, `price`, `measurement_size`, `Material`, `product_metal`, `discount`, `resizable`, `unit_weight`, `units_InStock`, `units_onOrder`, `reorder_level`, `size`, `discount_available`, `discount_rate`, `current_order`, `stone_description`, `is_available`, `ranking`, `stone`, `no_of_stone`, `stone_setting`, `stone_color`, `stone_clarity`, `status`, `method`, `stone_shape`, `inv_qty`, `min_sale_qty`, `max_sale_qty`, `inventory_min_qty`, `is_in_stock`, `related_check_list`, `associated_check_list`, `group_products`, `meta_title`, `meta_keyword`, `meta_description`, `added_on`, `added_by`, `updated_by`, `updated_on`, `image_certificate`, `added_user_type`, `update_user_type`, `delete`, `visiablity`, `attribute_opt_value`, `attribute_set_id`, `attribute_arr`) VALUES
(1, '513013FLTCAA00', '5', '22KT Gold Finger Ring', 'simple', '22KT-Gold-Finger-Ring', 'IFRoaXMgMjJLVCB5ZWxsb3cgZ29sZCBmaW5nZXIgcmluZyBmZWF0dXJlcyBkaWFtb25kLWN1dCBwYXR0ZXJucy4gVGhlIGJhbmQgaXMgYWRvcm5lZCB3aXRoIHNsYW50ZWQsIHRleHR1cmVkIGVsZW1lbnRzLiBEdWUgdG8gYSBoaWdoLXBvbGlzaGVkIGZpbmlzaCwgdGhpcyByaW5nIGxvb2tzIHNoaW55LCBhbmQgaXQgbWFrZXMgYSBncmVhdCBwYXJ0bmVyIGZvciBhbGwgb3V0Zml0cy4=', 0, '28 ', 0, '', '', '', '4952.00', '', '', '', '0', 0, '1.35', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '200', '', '', '0', 1, '', '', '', '', '', '', '2017-08-12 14:47:44', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '', 4, ''),
(2, '500357PCAAAA02', '5', 'Yellow Gold Diamond Pendant', 'simple', 'Yellow-Gold-Diamond-Pendant', 'VGhpcyAxOEtUIHllbGxvdyBnb2xkLCByaG9kaXVtLXBsYXRlZCBwZW5kYW50IGlzIHNldCB3aXRoIHRocmVlIHJvdW5kIGJyaWxsaWFudCBjdXQgZGlhbW9uZHMuIFRoZSBkaWFtb25kcyBhcmUgb2YgU0kyIGNsYXJpdHkgYW5kIGZhbGwgd2l0aGluIHRoZSBHLUggY29sb3VyIHJhbmdlLiBGZWF0dXJpbmcgYW4gb3BlbiBoZWFydCBkZXNpZ24sIHRoZSBkaWFtb25kcyBhcmUgcGF2ZS1zZXQgb24gdGhlIHJob2RpdW0tcGxhdGVkLCBjdXJ2ZWQsIHR1c2sgZWxlbWVudC4gVGhlIHBlbmRhbnQgYWxzbyBoaWdobGlnaHRzIGEgc2luZ2xlIGRpYW1vbmQgYXQgYSBjbGVmdCBzZXQgaW4gYSBmb3VyLXByb25nIHNldHRpbmcuIFRoZSByaG9kaXVtLXBsYXRlZCBwcm9uZ3MgZW5oYW5jZSB0aGUgbHVzdHJlIG9mIHRoZSBkaWFtb25kcy4gVGhyb3VnaCBhbiBPLXJpbmcsIHRoZSBwZW5kYW50IGlzIHN1c3BlbmRlZCBmcm9tIHRoZSB0YXBlcmVkLCBwbGFpbiwgb3ZhbCBiYWlsLiBUaGUgaGlnaC1wb2xpc2hlZCBmaW5pc2ggcmVuZGVycyBhIGJyaWxsaWFudCBzaGluZSB0byB0aGUgcGVuZGFudC4=', 0, '35 ', 0, '', '', '0.022', '7880.00', '', '', 'Gold', '0', 0, '1.468', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '200', '', '', '0', 1, '', '', '', '', '', '', '2017-08-12 14:52:03', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '', 5, ''),
(3, '(552812VELE1A22', '5', 'Yellow Gold Diamond Bangle', 'simple', 'Yellow-Gold-Diamond-Bangle', 'IFRoaXMgMTRLVCB5ZWxsb3cgZ29sZCBiYW5nbGUgY29udGFpbnMgc2l4IHJvdW5kIGJyaWxsaWFudCBjdXQgZGlhbW9uZHMgb2YgU0kyIGNsYXJpdHkgYW5kIEktSiBjb2xvdXIgZ3JhZGUuIEFsbCBkaWFtb25kcyBhcmUgc2V0IGluIHJob2RpdW0tcGxhdGVkIHNoYXJlZCBwcm9uZyBzZXR0aW5ncy4gVGhlIGJhbmdsZSBmZWF0dXJlcyBhIHNtb290aCBiYW5kIHdpdGggYSBjaXJjdWxhciByaW5nIGVsZW1lbnQgYXQgdGhlIGNlbnRyZSB3aXRoIGRpYW1vbmQtc3R1ZGRlZCwgdGVhcmRyb3Atc2hhcGVkIGVsZW1lbnRzIGh1Z2dpbmcgdGhlIHJpbmcgZWxlbWVudC4gQSBzZXJpZXMgb2YgTy1yaW5ncyBhbmQgYSBsb2JzdGVyIGNsb3N1cmUgYXJlIHByb3ZpZGVkIHRvIHNlY3VyZSB0aGUgYmFuZ2xlLiBBIGhpZ2gtcG9saXNoZWQgZmluaXNoIG1ha2VzIHRoZSBiYW5nbGUgbG9vayBhdHRyYWN0aXZlLg==', 0, '25 ', 0, '', '', '', '22074.00', '', '', '', '0', 0, '5.355', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '80', '', '', '0', 1, '', '', '', '', '', 'This 14KT yellow gold bangle contains six round brilliant cut diamonds of SI2 clarity and I-J colour grade. All diamonds are set in rhodium-plated shared prong settings. The bangle features a smooth band with a circular ring element at the centre with diamond-studded, teardrop-shaped elements hugging the ring element. A series of O-rings and a lobster closure are provided to secure the bangle. A high-polished finish makes the bangle look attractive.', '2017-08-12 14:56:31', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '', 5, ''),
(4, '501057FFZTAA04)', '6', ' 18KT Diamond Cross Finger Ring', 'simple', '-18KT-Diamond-Cross-Finger-Ring', 'IFRoaXMgMThLVCB5ZWxsb3cgZ29sZCBmaW5nZXIgcmluZyBzaG93Y2FzZXMgYSBzaW5nbGUgcm91bmQgYnJpbGxpYW50IGN1dCBkaWFtb25kIG9mIEctSCBjb2xvdXIgcmFuZ2UgYW5kIFZTIGNsYXJpdHkgZ3JhZGUuIFRoZSBmaW5nZXIgcmluZyBmZWF0dXJlcyBhIGNyb3NzLXNoYXBlZCBkZXNpZ24gd2l0aCB0aGUgZGlhbW9uZCBhZG9ybmluZyB0aGUgcmlnaHQgY29ybmVyIG9mIHRoZSBjcm9zcyBtb3RpZi4gQSBmb3VyLXByb25nIHNldHRpbmcgaW4gcmhvZGl1bSBwbGF0aW5nIGtlZXBzIHRoZSBkaWFtb25kIHNlY3VyZS4gU2luY2UgdGhlIHJpbmcgaXMgaGlnaC1wb2xpc2hlZCwgaXQgbG9va3Mgc2hpbnkuIA==', 0, '28 ', 0, '', '', '4.8', '20027.00', '', '', '', '0', 0, '4.8', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '70', '', '', '0', 1, '3,2', '', '', '', 'rings,men', 'This 18KT yellow gold finger ring showcases a single round brilliant cut diamond of G-H colour range and VS clarity grade. The finger ring features a cross-shaped design with the diamond adorning the right corner of the cross motif. A four-prong setting in rhodium plating keeps the diamond secure. Since the ring is high-polished, it looks shiny.', '2017-08-12 15:01:15', '1', '1', '2017-08-13 11:44:55', '', 'Admin', 'Admin', 0, 1, '{"Length":"e","color":"Black"}', 4, ''),
(5, ' RC712A', '2', '18K WHITE GOLD JOANNA CUSHION HALO WITH ROUND CUT DIAMOND RING (.36 CTW.)', 'simple', '18K-WHITE-GOLD-JOANNA-CUSHION-HALO-WITH-ROUND-CUT-DIAMOND-RING-36-CTW', 'IFJlZmluZWQgYW5kIHNvcGhpc3RpY2F0ZWQsIHRoaXMgcmluZydzIGN1c2hpb24gaGFsbyBpcyBzZXQgd2l0aCByb3VuZC1jdXQgZGlhbW9uZHMgdG8gb2Zmc2V0IHRoZSBkZW11cmUgcm91bmQtY3V0IGNlbnRlciBkaWFtb25kLiBDaGFubmVsLXNldCBkaWFtb25kcyBleHRlbmQgb3ZlciB0aGUgYmFuZCB0byBlbmhhbmNlIHRoZSBzcGFya2xlIG9mIHRoaXMgcG9zaCBjcmVhdGlvbi4u', 4, '28 ,29 ,30 ', 0, '', '', '36', '1675', '4-10', '', 'Gold', '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '32', '', 'G', 'SI1', 1, 'form', '', '400', '', '', '0', 1, '', '', '', '18K WHITE GOLD JOANNA CUSHION HALO WITH ROUND CUT DIAMOND RING (.36 CTW.)', '', 'Refined and sophisticated, this ring''s cushion halo is set with round-cut diamonds to offset the demure round-cut center diamond. Channel-set diamonds extend over the band to enhance the sparkle of this posh creation..', '2017-08-12 15:10:52', '4', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, '', 4, ''),
(6, '2673779', '3', '0.31-CARAT ROUND DIAMOND', 'simple', '031-CARAT-ROUND-DIAMOND', 'IFRoaXMgVi4gR29vZC1jdXQsIEotY29sb3IsIGFuZCBTSTEtY2xhcml0eSBkaWFtb25kIGNvbWVzIHdpdGggYSBkaWFtb25kIGdyYWRpbmcgcmVwb3J0IGZyb20gR0lBLCAzMCBkYXkgaW5zcGVjdGlvbiBwZXJpb2QsIGZyZWUgRmVkRXggT3Zlcm5pZ2h0IGluc3VyZWQgc2hpcHBpbmcgYW5kIGxpZmV0aW1lIHVwZ3JhZGUgcG9saWN5Lg==', 4, '36 ', 0, '', '', '', '313', '4.22 x 4.27 x 2.72', '', 'Gold', '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, 'American Diamond', '', '', 'J', 'VVS2', 1, 'form', 'Round', '400', '', '', '0', 1, '', '', '', '', '', 'This V. Good-cut, J-color, and SI1-clarity diamond comes with a diamond grading report from GIA, 30 day inspection period, free FedEx Overnight insured shipping and lifetime upgrade policy.', '2017-08-12 15:17:33', '4', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, '', 0, ''),
(7, 'fdsf3424242', '3', 'Adjustable 925 Sterling Silver Ring With White Stones', 'simple', 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones', 'aGlzIHBpZWNlIG9mIGpld2VscnkgY29tZXMgd2l0aCB0aGUgVm95bGxhIGFzc3VyYW5jZSBvZiBxdWFsaXR5IGFuZCBkdXJhYmlsaXR5Lg0KDQpDYXJpbmcgZm9yIHlvdXIgZmFzaGlvbiBqZXdlbHJ5OiBXZSwgYXQgVm95bGxhLCB0YWtlIGNhcmUgb2YgZXZlcnkgcGllY2Ugb2YgamV3ZWxyeSBzbyB0aGF0IHlvdSBkb24ndCBzcGVuZCBob3VycyBjYXJpbmcgZm9yIHRoZW0uIEJ1dCBkbyByZW1lbWJlciwgZmFzaGlvbiBqZXdlbHJ5IGxhc3RzIGxvbmdlciB3aGVuIGtlcHQgZHJ5IGFuZCBmcmVlIG9mIGNoZW1pY2Fscy4gRm9sbG93IHRoaXMgc2ltcGxlIHJ1bGU6IFlvdXIgamV3ZWxyeSBzaG91bGQgYmUgdGhlIGxhc3QgdGhpbmcgeW91IHB1dCBvbiBhbmQgdGhlIGZpcnN0IHRoaW5nIHlvdSB0YWtlIG9mZg==', 4, '28 ', 0, '', '', '', '599.00', '', '', 'Silver', '0', 0, '2.9', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, 'American Diamond', '2212', '2121', 'E', 'IF', 1, 'form', 'Emerald', '34', '', '', '0', 1, '', '', '', '', '', '', '2017-08-12 15:25:13', '4', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, '', 5, ''),
(8, 'Test1234', '6', 'Test', 'simple', 'Test', 'VEVzdCBURVN0IFRFc3QgVGVzdCAgICAg', 4, '15 ', 0, '', '', '', '55', '', '', 'Gold', '0', 0, '22', 0, 0, 0, '', 0, '', 0, 'ICAgICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '12', '', '', '0', 1, '8,4,3,2,1', '', '', '', '', '', '2017-08-13 11:46:54', '1', '1', '2017-08-14 18:01:07', '', 'Admin', 'Admin', 0, 1, '', 0, ''),
(9, '323232', '2', 'test2', 'grouped', 'test2', 'IDMyMzI=', 0, '14 ', 0, '', '', '', '', '', '', 'Copper', '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '32', '', '', '0', 1, '', '', '8', '', '', '', '2017-08-14 17:59:54', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `updated_on` datetime NOT NULL,
  `added_user_type` varchar(20) NOT NULL,
  `update_user_type` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`, `thumb_image`, `added_on`, `added_by`, `updated_by`, `updated_on`, `added_user_type`, `update_user_type`, `status`) VALUES
(1, 1, '22KT-Gold-Finger-Ring-2017-08-12-14-47-44 _ 513013FLTCAA00 (1).jpg', '22KT-Gold-Finger-Ring-2017-08-12-14-47-44 _ 513013FLTCAA00 (1).jpg.jpg', '2017-08-12 14:47:44', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(2, 1, '22KT-Gold-Finger-Ring-2017-08-12-14-47-44 _ 513013FLTCAA00 (2).jpg', '22KT-Gold-Finger-Ring-2017-08-12-14-47-44 _ 513013FLTCAA00 (2).jpg.jpg', '2017-08-12 14:47:44', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(3, 1, '22KT-Gold-Finger-Ring-2017-08-12-14-47-44 _ 513013FLTCAA00.jpg', '22KT-Gold-Finger-Ring-2017-08-12-14-47-44 _ 513013FLTCAA00.jpg.jpg', '2017-08-12 14:47:44', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(4, 2, 'Yellow-Gold-Diamond-Pendant-2017-08-12-14-52-03 _ 500357PCAAAA02 (1).jpg', 'Yellow-Gold-Diamond-Pendant-2017-08-12-14-52-03 _ 500357PCAAAA02 (1).jpg.jpg', '2017-08-12 14:52:03', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(5, 2, 'Yellow-Gold-Diamond-Pendant-2017-08-12-14-52-03 _ 500357PCAAAA02.jpg', 'Yellow-Gold-Diamond-Pendant-2017-08-12-14-52-03 _ 500357PCAAAA02.jpg.jpg', '2017-08-12 14:52:03', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(6, 3, 'Yellow-Gold-Diamond-Bangle-2017-08-12-14-56-31 _ 552812VELE1A22 (1).jpg', 'Yellow-Gold-Diamond-Bangle-2017-08-12-14-56-31 _ 552812VELE1A22 (1).jpg.jpg', '2017-08-12 14:56:31', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(7, 3, 'Yellow-Gold-Diamond-Bangle-2017-08-12-14-56-31 _ 552812VELE1A22 (2).jpg', 'Yellow-Gold-Diamond-Bangle-2017-08-12-14-56-31 _ 552812VELE1A22 (2).jpg.jpg', '2017-08-12 14:56:31', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(8, 3, 'Yellow-Gold-Diamond-Bangle-2017-08-12-14-56-31 _ 552812VELE1A22 (3).jpg', 'Yellow-Gold-Diamond-Bangle-2017-08-12-14-56-31 _ 552812VELE1A22 (3).jpg.jpg', '2017-08-12 14:56:32', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(9, 3, 'Yellow-Gold-Diamond-Bangle-2017-08-12-14-56-31 _ 552812VELE1A22 (4).jpg', 'Yellow-Gold-Diamond-Bangle-2017-08-12-14-56-31 _ 552812VELE1A22 (4).jpg.jpg', '2017-08-12 14:56:32', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(10, 3, 'Yellow-Gold-Diamond-Bangle-2017-08-12-14-56-31 _ 552812VELE1A22.jpg', 'Yellow-Gold-Diamond-Bangle-2017-08-12-14-56-31 _ 552812VELE1A22.jpg.jpg', '2017-08-12 14:56:32', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(11, 4, '-18KT-Diamond-Cross-Finger-Ring-2017-08-12-15-01-15 _ 501057FFZTAA04 (2).jpg', '-18KT-Diamond-Cross-Finger-Ring-2017-08-12-15-01-15 _ 501057FFZTAA04 (2).jpg.jpg', '2017-08-12 15:01:15', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(12, 4, '-18KT-Diamond-Cross-Finger-Ring-2017-08-12-15-01-15 _ 501057FFZTAA04 (1).jpg', '-18KT-Diamond-Cross-Finger-Ring-2017-08-12-15-01-15 _ 501057FFZTAA04 (1).jpg.jpg', '2017-08-12 15:01:16', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(13, 4, '-18KT-Diamond-Cross-Finger-Ring-2017-08-12-15-01-15 _ 501057FFZTAA04.jpg', '-18KT-Diamond-Cross-Finger-Ring-2017-08-12-15-01-15 _ 501057FFZTAA04.jpg.jpg', '2017-08-12 15:01:16', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(14, 5, '18K-WHITE-GOLD-JOANNA-CUSHION-HALO-WITH-ROUND-CUT-DIAMOND-RING---36-CTW---2017-08-12-15-10-52 _ RA217CR100T.jpg', '18K-WHITE-GOLD-JOANNA-CUSHION-HALO-WITH-ROUND-CUT-DIAMOND-RING---36-CTW---2017-08-12-15-10-52 _ RA217CR100T.jpg.jpg', '2017-08-12 15:10:52', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(15, 5, '18K-WHITE-GOLD-JOANNA-CUSHION-HALO-WITH-ROUND-CUT-DIAMOND-RING---36-CTW---2017-08-12-15-10-52 _ RA217CR100.jpg', '18K-WHITE-GOLD-JOANNA-CUSHION-HALO-WITH-ROUND-CUT-DIAMOND-RING---36-CTW---2017-08-12-15-10-52 _ RA217CR100.jpg.jpg', '2017-08-12 15:10:52', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(16, 6, '0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png', '0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png.jpg', '2017-08-12 15:17:33', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(17, 7, 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-image20170421-9790-160idtz (2).jpg', 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-image20170421-9790-160idtz (2).jpg.jpg', '2017-08-12 15:25:13', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(18, 7, 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-image20170421-9790-160idtz (1).jpg', 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-image20170421-9790-160idtz (1).jpg.jpg', '2017-08-12 15:25:13', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(19, 7, 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-ms20170421-9790-1tmm858.jpg', 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-ms20170421-9790-1tmm858.jpg.jpg', '2017-08-12 15:25:14', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(20, 7, 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-image20170421-9790-160idtz.jpg', 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-image20170421-9790-160idtz.jpg.jpg', '2017-08-12 15:25:14', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(21, 7, 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-image20170421-9790-1eyba5w.jpg', 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-image20170421-9790-1eyba5w.jpg.jpg', '2017-08-12 15:25:14', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller_details`
--

CREATE TABLE IF NOT EXISTS `seller_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `update_on` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_name` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postal_code` varchar(25) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `Logo` varchar(255) NOT NULL,
  `PaymentMethods` varchar(100) NOT NULL,
  `Fax` varchar(50) NOT NULL,
  `DiscountType` varchar(50) NOT NULL,
  `DiscountRate` varchar(20) NOT NULL,
  `DiscountAvailable` tinyint(4) NOT NULL,
  `CurrentOrder` tinyint(4) NOT NULL,
  `Ranking` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT 'undefine',
  `email` varchar(200) NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL DEFAULT '0',
  `contact_no` varchar(20) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `discripation` varchar(255) NOT NULL,
  `shop_heading` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `shop_image` varchar(255) NOT NULL,
  `shop_policy` text NOT NULL,
  `payment_policy` text NOT NULL,
  `shipping_return_policy` text NOT NULL,
  `facebook_id` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
  `added_by` varchar(255) NOT NULL DEFAULT '0',
  `updated_on` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
  `updated_by` varchar(200) NOT NULL DEFAULT '0',
  `md5_password` varchar(255) NOT NULL,
  `roll_type` int(11) NOT NULL DEFAULT '1' COMMENT '1 for visitors/buyer  and 2 designers/seller ',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(255) NOT NULL,
  `today_login` datetime NOT NULL,
  `pre_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `slug`, `contact_no`, `password`, `city`, `state`, `country`, `address`, `shop_name`, `discripation`, `shop_heading`, `cover_image`, `shop_image`, `shop_policy`, `payment_policy`, `shipping_return_policy`, `facebook_id`, `added_on`, `added_by`, `updated_on`, `updated_by`, `md5_password`, `roll_type`, `status`, `image`, `today_login`, `pre_login`) VALUES
(2, 'abhilash', 'abhilash@gmail.com', 'abhilasf', '810911237', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-07-15 15:31:02', '1', '2017-07-17 14:40:13', '1', '93279e3308bdbbeed946fc965017f67a', 2, 1, 'abhilasf-2017-07-15-15-31-02.jpg', '2017-07-28 11:24:31', '0000-00-00 00:00:00'),
(3, 'buyer', 'buyer@gmail.com', 'buyer', '111111111', '93279e3308bdbbeed946fc965017f67a', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-07-17 14:51:29', '1', '1000-01-01 00:00:00', '0', '93279e3308bdbbeed946fc965017f67a', 1, 1, 'buyer-2017-07-17-14-51-29.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'selller1', 'seller@gmail.com', 'selller', '14141414', '93279e3308bdbbeed946fc965017f67a', 'indore', 'MP', 'India', '304, vidhapati ', 'Seller', 'orld of designer jewellery. It was modest beginniorld of designer jewellery. It was modest beginniorld of designer jewellery. It was modest beginniorld of designer jewellery. It was modest beginni', 'jwellay at home ', 'selller1-2017-08-12-19-18-11.jpg', 'selller1-2017-08-12-19-18-11.jpg', 'PG9sPg0KCTxsaT5mZCBmZCBmZCBkZGYgQGZmZmZmZmYmbmJzcDsgJm5ic3A7PC9saT4NCgk8bGk+cyZuYnNwOzxzdHJvbmc+Jm5ic3A7c3Nhc2FmZCBmZGZkciBlcmUgd3I8L3N0cm9uZz48L2xpPg0KPC9vbD4NCg0KPHA+PHN0cm9uZz5zZGRzZGZmZnNkYWFnZmdnIGdnZmRmZ2dkIGdmZmZmZmY8cz5nZ2dkZGRkZGRkZGQmbmJzcDsgJm5ic3A7ICZuYnNwO2ZkZmY8L3M+PC9zdHJvbmc+PC9wPg0K', 'PHA+Ozs7O2w7ZmRnciBld3IgdyByZSB3ZXIgd3IgcmUgZXdyJm5ic3A7PC9wPg0KDQo8cD48ZW0+ZmRmIGRmIGZkIGQgZmQmbmJzcDsgZmQ8L2VtPjwvcD4NCg==', 'PHA+ZGYgZGFzOzsmbmJzcDsgJm5ic3A7ICZuYnNwOyAmbmJzcDsgJm5ic3A7ICZuYnNwO2ZkZiBmJm5ic3A7ICZuYnNwO2ZkcmV3IHdlPC9wPg0K', '', '2017-07-17 14:52:55', '4', '1000-01-01 00:00:00', '0', '93279e3308bdbbeed946fc965017f67a', 2, 1, 'selller1-2017-07-17-16-49-32.jpg', '2017-08-14 18:04:04', '2017-08-14 16:39:45'),
(5, 'test', 'test@gmail.com', 'test', '2121212221', '93279e3308bdbbeed946fc965017f67a', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-08-10 18:46:43', '0', '1000-01-01 00:00:00', '0', '93279e3308bdbbeed946fc965017f67a', 1, 1, 'test-2017-08-10-18-46-43.jpg', '2017-08-18 19:07:54', '2017-08-18 18:24:34'),
(6, 'tes', 'aaa@gmail.com', 'tes', '1544111', 'd9f6e636e369552839e7bb8057aeb8da', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-08-17 16:27:10', '0', '1000-01-01 00:00:00', '0', 'd9f6e636e369552839e7bb8057aeb8da', 2, 1, 'tes-2017-08-17-16-27-10.jpg', '2017-08-17 16:27:53', '0000-00-00 00:00:00'),
(8, 'sneha-test', 'mmfinfotech1075@gmail.com', 'sneha-test', '123456', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-08-17 18:15:32', '0', '1000-01-01 00:00:00', '0', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'sneha-test-2017-08-17-18-15-31.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `added_on` datetime NOT NULL,
  `ip_address` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `session_id`, `added_on`, `ip_address`) VALUES
(1, 5, 9, '', '2017-08-18 18:49:52', '183.182.86.246');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
