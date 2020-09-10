-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2017 at 01:09 AM
-- Server version: 10.1.24-MariaDB-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fxpilyzx_jewellry_marketplace`
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
  `md5_password` varchar(250) NOT NULL,
  `temp_password` varchar(250) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `role_id` int(11) NOT NULL DEFAULT '0',
  `today_login` datetime NOT NULL,
  `pre_login` datetime NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'defult.jpg',
  `shop_policy` text NOT NULL,
  `payment_policy` text NOT NULL,
  `shipping_return_policy` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `googleplus` varchar(255) NOT NULL,
  `pinrest` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`added_by`, `id`, `name`, `email`, `password`, `md5_password`, `temp_password`, `mobile`, `status`, `role_id`, `today_login`, `pre_login`, `image`, `shop_policy`, `payment_policy`, `shipping_return_policy`, `facebook`, `twitter`, `googleplus`, `pinrest`) VALUES
('1', 1, 'admin', 'support@fxpips.co.uk', 'adminm', '2b695be51daaed2fc262973d33b396d7', 'WnqdB2p7', '81091123369', 1, 1, '2017-09-21 13:52:32', '2017-09-21 12:16:08', 'admin-2017-09-15-18-08-08.png', 'PHA+dGVzdHRlc3Q8L3A+DQo=', 'PHA+dGVzdDwvcD4NCg==', 'PHA+dGVzdDwvcD4NCg==', 'https://twitter.com/login?lang=en', 'https://twitter.com/login?lang=en', 'https://twitter.com/login?lang=en', 'https://twitter.com/login?lang=en');

-- --------------------------------------------------------

--
-- Table structure for table `admin_setting`
--

CREATE TABLE IF NOT EXISTS `admin_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_chage` varchar(200) NOT NULL,
  `currency` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin_setting`
--

INSERT INTO `admin_setting` (`id`, `shipping_chage`, `currency`, `status`, `updated_on`) VALUES
(6, '10', '$', 1, '2017-09-12 14:10:24');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`id`, `attribute_set_id`, `name`, `input_type`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `delete`, `attribute_option`) VALUES
(5, 19, 'Length', 'text', 1, '2017-07-31 18:03:01', 1, '2017-09-15 18:37:04', '1', 0, ''),
(10, 19, 'Height', 'text', 1, '2017-07-31 18:27:43', 1, '0000-00-00 00:00:00', '', 0, ''),
(11, 19, 'color', 'select', 1, '2017-07-31 18:29:15', 1, '2017-08-26 12:49:54', '1', 0, 'Black,Blue,Yellow,Green,Cyan,Orange,Violet,White,Gold,Silver'),
(14, 19, 'Size', 'select', 1, '2017-08-04 20:35:43', 1, '2017-09-11 13:59:22', '1', 0, '5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20'),
(15, 0, 'ttet', 'textarea', 1, '2017-09-04 14:50:53', 1, '0000-00-00 00:00:00', '', 1, ''),
(16, 0, '546645', 'text', 1, '2017-09-04 14:51:59', 1, '2017-09-04 15:44:17', '1', 1, 'tttt'),
(17, 0, 'test', 'text', 1, '2017-09-04 15:56:53', 1, '0000-00-00 00:00:00', '', 1, ''),
(18, 0, 'test21554354ggggg', 'select', 1, '2017-09-04 15:57:09', 1, '2017-09-04 16:34:08', '1', 1, 'testgg,dfdfd,fgfgd,dfgdfg'),
(19, 0, 'dfgd', 'text', 1, '2017-09-04 16:34:21', 1, '0000-00-00 00:00:00', '', 1, ''),
(20, 11, 'dfgdfg', 'select', 1, '2017-09-04 16:35:13', 1, '2017-09-06 14:51:22', '1', 1, 'dfgd,dgfdfg'),
(21, 0, 'erte', 'text', 1, '2017-09-11 13:58:33', 1, '0000-00-00 00:00:00', '', 1, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `attribute_set`
--

INSERT INTO `attribute_set` (`id`, `name`, `assign_attributes`, `status`, `added_on`, `added_by`, `updated_on`, `updated_by`, `delete`) VALUES
(1, 'tet', '2,9', 1, '2017-08-01 14:17:17', 1, '2017-08-01 15:14:38', '1', 1),
(2, 'Necklaces', '11,10,5,14', 1, '2017-08-01 14:19:17', 1, '2017-09-15 18:37:25', '1', 0),
(3, 'terere1d', '2,11,3,9,10', 0, '2017-08-01 14:21:01', 1, '2017-08-01 14:56:15', '1', 1),
(4, 'rings', '11,10,5,14', 1, '2017-08-01 14:21:42', 1, '2017-09-09 13:45:47', '1', 0),
(5, 'Jwellary', '11,10,5,14', 1, '2017-08-01 15:33:24', 1, '2017-09-02 12:37:58', '1', 0),
(6, 'test', '11,10,5', 1, '2017-09-04 12:45:40', 1, '0000-00-00 00:00:00', '', 1),
(7, 'yeeggggggggggggg', '11', 1, '2017-09-04 14:38:47', 1, '2017-09-04 15:46:47', '1', 1),
(8, 'ss', '11', 1, '2017-09-04 15:42:53', 1, '0000-00-00 00:00:00', '', 1),
(9, 'sss', '10', 1, '2017-09-04 15:43:08', 1, '0000-00-00 00:00:00', '', 1),
(10, 'ddddd', '5', 1, '2017-09-04 15:47:47', 1, '0000-00-00 00:00:00', '', 1),
(11, 'hhhhh', '11,20', 1, '2017-09-04 15:48:38', 1, '2017-09-04 17:56:54', '1', 1),
(12, 'test111yyyy', '11,10', 1, '2017-09-04 16:08:30', 1, '2017-09-04 17:25:36', '1', 1),
(13, 'Anklets', '11,10,5,14', 1, '2017-09-06 14:53:44', 1, '2017-09-14 11:41:16', '1', 0),
(14, 'Nose pins', '11,10,5,14', 1, '2017-09-06 14:54:19', 1, '0000-00-00 00:00:00', '', 0),
(15, 'pendants', '11,10,5,14', 1, '2017-09-06 14:54:51', 1, '2017-09-14 11:41:25', '1', 0),
(16, 'Earrings', '11,10,5,14', 1, '2017-09-09 09:47:43', 1, '2017-09-09 09:47:59', '1', 0),
(17, 'sheetaltest', '11', 1, '2017-09-14 11:34:25', 1, '2017-09-14 11:41:37', '1', 1),
(18, 'Jhumkas', '11,10,5,14', 1, '2017-09-15 09:55:00', 1, '0000-00-00 00:00:00', '', 0),
(19, 'Ring', '11,10,5,14', 1, '2017-09-19 11:13:27', 1, '0000-00-00 00:00:00', '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`id`, `user_id`, `first_name`, `last_name`, `city`, `state`, `email`, `zip_code`, `address`, `phone_no`, `added_on`, `updated_on`, `ip_address`) VALUES
(1, 0, 'test', 'tet', 'teste', '', '32323@gggg.cccc', '3232331', 'rwererw', '323233233333', '2017-08-17 17:25:42', '0000-00-00 00:00:00', '183.182.86.246'),
(2, 0, 'test', 'fffff', 'test@fffff,com', '', 'ffffff@gggg.cc', '1111111', 'ffffffffff', '2111111111', '2017-08-17 17:28:20', '0000-00-00 00:00:00', '183.182.86.246'),
(15, 5, 'test', 'test', 'indore', '', 'test@gmail.com', '452001', '39  palsasta', '45200010001', '2017-08-29 16:35:05', '0000-00-00 00:00:00', '183.182.86.246'),
(16, 13, 'stest', 'si', 'indore', '', 'mmf.qa061@gmail.com', '452001', '45,ffftest', '45555555555', '2017-09-01 14:28:56', '0000-00-00 00:00:00', '183.182.86.244'),
(17, 14, 'test21', 'test', 'test', '', 'test21@gmail.com', '450000', 'test', '1222221111', '2017-09-01 16:10:01', '0000-00-00 00:00:00', '183.182.86.244'),
(18, 18, 'f', 'y', '6', '', 'm@gmail.com', '444444', '4', '444444444444', '2017-09-02 17:22:05', '0000-00-00 00:00:00', '183.182.86.244'),
(19, 24, 'ss', 'ss', 'ss', '', 'shee@gmail.com', '5555555', 'ss', '64564566666', '2017-09-04 12:42:28', '0000-00-00 00:00:00', '183.182.86.244'),
(22, 29, 'fgsdgdg', 'sgsdg', 'sgsgs', '', 'shee@gmail.com', '555555', 'sdgsdg', '6666666666', '2017-09-05 12:27:37', '0000-00-00 00:00:00', '183.182.86.244'),
(23, 57, 'sneha', 'paliwal', 'indore', '', 'mmfinfotech1075@gmail.com', '452011', 'mmf', '8796543210', '2017-09-05 18:21:34', '0000-00-00 00:00:00', '183.182.86.244'),
(26, 4, 'sheetal', 'ss', 'indore', '', 'mmf.qa061@gmail.com', '646456', '4564gfhfg', '6564564564', '2017-09-08 11:22:12', '0000-00-00 00:00:00', '183.182.86.244'),
(28, 14, 'test', 'test', 'testtes', '', 'customer@gmail.com', '4520001', '33333333', '14263333333', '2017-09-12 12:35:40', '0000-00-00 00:00:00', '183.182.86.243'),
(29, 14, 'teest', 'test', 'test', '', 'customer@gmail.com', '232311', '3232', '32333333333', '2017-09-12 12:37:09', '0000-00-00 00:00:00', '183.182.86.243'),
(32, 68, 'sheetal', 'lowanshi', 'indore', '', 'sheetallowanshi08@gmail.com', '543545', 'indore', '4545343553', '2017-09-13 11:02:47', '0000-00-00 00:00:00', '183.182.86.243'),
(38, 67, 'dfgfd', 'dfgd', 'dfg', '', 'mmf.naveen1095@gmail.com', '789654', 'fgfd', '1234567890', '2017-09-13 11:43:43', '0000-00-00 00:00:00', '183.182.86.244'),
(40, 69, 'test', 'test', 'test', '', 'abhi1@gmail.com', '123456', 'ffffff', '111111111111', '2017-09-13 16:04:04', '0000-00-00 00:00:00', '183.182.86.243'),
(41, 61, 'sdasd', 'lowanshi', 'asdds', '', 'sheetallowanshi08@gmail.com', '452355', 'dgfd', '5345345345', '2017-09-14 16:29:54', '0000-00-00 00:00:00', '183.182.86.243'),
(42, 70, 'sheetal', 'teat', 'indore', '', 'mmfinfotech1075@gmail.com', '569555', 'mmf', '1234567890', '2017-09-15 15:52:39', '0000-00-00 00:00:00', '183.182.86.245');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `added_on`, `added_by`, `updated_by`, `updated_on`, `status`, `delete`) VALUES
(2, 'Nakshatras', 'Nakshatras', 'facebook-2017-07-21-17-25-42.jpg', '2017-07-21 17:25:42', '1', '1', '2017-09-15 18:37:47', 1, 0),
(3, 'TBZ', 'TBZ', 'temstion-2017-07-21-17-34-16.jpg', '2017-07-21 17:34:16', '1', '1', '2017-08-04 20:04:49', 1, 0),
(4, 'MEENAZ', '-MEENAZ', 'MEENAZ-2017-08-12-14-13-28.png', '2017-08-12 14:13:29', '1', '1', '2017-09-01 18:00:11', 1, 0),
(5, 'Tanishq ', 'Tanishq-', 'Tanishq--2017-08-12-14-16-24.png', '2017-08-12 14:16:24', '1', '1', '2017-08-12 14:16:24', 1, 0),
(6, 'Mia ', 'Mia-', 'Mia--2017-08-12-14-18-57.png', '2017-08-12 14:18:57', '1', '1', '2017-08-12 14:18:57', 1, 0),
(10, 'A Hill of Beads', 'A-Hill-of-Beads', '', '2017-09-07 11:46:35', '1', '1', '2017-09-07 11:46:35', 1, 0),
(11, 'A Strand Above', 'A-Strand-Above', '', '2017-09-07 11:46:52', '1', '1', '2017-09-07 11:46:52', 1, 0),
(12, 'A Strand For You', 'A-Strand-For-You', '', '2017-09-07 11:47:10', '1', '1', '2017-09-07 11:47:10', 1, 0),
(13, 'ABC Beads &amp; Things', 'ABC-Beads--Things', '', '2017-09-07 11:47:25', '1', '1', '2017-09-07 11:47:25', 1, 0),
(14, 'Accustomed', 'Accustomed', '', '2017-09-07 11:47:40', '1', '1', '2017-09-07 11:47:40', 1, 0),
(15, 'Adornmix', 'Adornmix', '', '2017-09-07 11:47:49', '1', '1', '2017-09-07 11:47:49', 1, 0),
(16, 'Around the Block', 'Around-the-Block', '', '2017-09-07 11:48:01', '1', '1', '2017-09-07 11:48:01', 1, 0),
(17, 'Artik', 'Artik', '', '2017-09-07 11:48:10', '1', '1', '2017-09-07 11:48:10', 1, 0),
(18, 'Artsifi', 'Artsifi', '', '2017-09-07 11:48:22', '1', '1', '2017-09-07 11:48:22', 1, 0),
(19, 'Be Adorned', 'Be-Adorned', '', '2017-09-07 11:48:33', '1', '1', '2017-09-07 11:48:33', 1, 0),
(20, 'Bead Adorned', 'Bead-Adorned', '', '2017-09-07 11:48:41', '1', '1', '2017-09-07 11:48:41', 1, 0),
(21, 'Bead Alternique', 'Bead-Alternique', '', '2017-09-07 11:49:00', '1', '1', '2017-09-07 11:49:00', 1, 0),
(22, 'Beadiful Things', 'Beadiful-Things', '', '2017-09-07 11:49:13', '1', '1', '2017-09-07 11:49:13', 1, 0),
(23, 'Bijouxanew', 'Bijouxanew', '', '2017-09-07 11:49:26', '1', '1', '2017-09-07 11:49:26', 1, 0),
(24, 'Bizzy Beads', 'Bizzy-Beads', '', '2017-09-07 11:49:35', '1', '1', '2017-09-07 11:49:35', 1, 0),
(25, 'BluGreen Jewelry', 'BluGreen-Jewelry', '', '2017-09-07 11:49:48', '1', '1', '2017-09-07 11:49:48', 1, 0),
(26, 'BluMoon', 'BluMoon', '', '2017-09-07 11:50:04', '1', '1', '2017-09-07 11:50:04', 1, 0),
(27, 'Chameleons', 'Chameleons', '', '2017-09-07 11:50:19', '1', '1', '2017-09-07 11:50:19', 1, 0),
(28, 'Charming Crafts', 'Charming-Crafts', '', '2017-09-07 11:50:31', '1', '1', '2017-09-07 11:50:31', 1, 0),
(29, 'Chic and Artsy', 'Chic-and-Artsy', '', '2017-09-07 11:50:40', '1', '1', '2017-09-07 11:50:40', 1, 0),
(30, 'Chokers and Charms', 'Chokers-and-Charms', '', '2017-09-07 11:50:49', '1', '1', '2017-09-07 11:50:49', 1, 0),
(31, 'Classical Customs', 'Classical-Customs', '', '2017-09-07 11:51:09', '1', '1', '2017-09-07 11:51:09', 1, 0),
(32, 'Colorful Stardust', 'Colorful-Stardust', '', '2017-09-07 11:51:17', '1', '1', '2017-09-07 11:51:17', 1, 0),
(33, 'Creative Rage', 'Creative-Rage', '', '2017-09-07 11:51:28', '1', '1', '2017-09-07 11:51:28', 1, 0),
(34, 'Cultured Curio', 'Cultured-Curio', '', '2017-09-07 11:51:37', '1', '1', '2017-09-07 11:51:37', 1, 0),
(35, 'CuriousBead', 'CuriousBead', '', '2017-09-07 11:51:48', '1', '1', '2017-09-07 11:51:48', 1, 0),
(36, 'Custom Chic', 'Custom-Chic', '', '2017-09-07 11:52:14', '1', '1', '2017-09-07 11:52:14', 1, 0),
(37, 'Deja Jewel', 'Deja-Jewel', '', '2017-09-07 11:52:24', '1', '1', '2017-09-07 11:52:24', 1, 0),
(38, 'Diamond Bead', 'Diamond-Bead', '', '2017-09-07 11:52:32', '1', '1', '2017-09-07 11:52:32', 1, 0),
(39, 'Diamond Light Nebula', 'Diamond-Light-Nebula', '', '2017-09-07 11:52:41', '1', '1', '2017-09-07 11:52:41', 1, 0),
(40, 'Diamond Sea', 'Diamond-Sea', '', '2017-09-07 11:52:53', '1', '1', '2017-09-07 11:52:53', 1, 0),
(41, 'Diamonds', 'Diamonds', '', '2017-09-07 11:53:04', '1', '1', '2017-09-07 11:53:04', 1, 0),
(42, 'Discoveries', 'Discoveries', '', '2017-09-07 11:53:18', '1', '1', '2017-09-07 11:53:18', 1, 0),
(43, 'EarthNique Jewelry', 'EarthNique-Jewelry', '', '2017-09-07 11:53:28', '1', '1', '2017-09-07 11:53:28', 1, 0),
(44, 'Ecletic Creations', 'Ecletic-Creations', '', '2017-09-07 11:53:37', '1', '1', '2017-09-07 11:53:37', 1, 0),
(45, 'Elements â€“ Wearable Art', 'Elements--Wearable-Art', '', '2017-09-07 11:53:46', '1', '1', '2017-09-07 11:53:46', 1, 0),
(46, 'Embellished Life', 'Embellished-Life', '', '2017-09-07 11:53:55', '1', '1', '2017-09-07 11:53:55', 1, 0),
(47, 'Fab Jewels', 'Fab-Jewels', '', '2017-09-07 11:54:07', '1', '1', '2017-09-07 11:54:07', 1, 0),
(48, 'Firebird Jewels', 'Firebird-Jewels', '', '2017-09-07 11:54:18', '1', '1', '2017-09-07 11:54:18', 1, 0),
(49, 'Foozles', 'Foozles', '', '2017-09-07 11:54:38', '1', '1', '2017-09-07 11:54:38', 1, 0),
(50, 'FabergÃ©', 'Faberg', '', '2017-09-07 11:59:21', '1', '1', '2017-09-07 11:59:21', 1, 0),
(51, 'Fabrikant', 'Fabrikant-', '', '2017-09-07 11:59:29', '1', '1', '2017-09-07 11:59:29', 1, 0),
(52, 'Fameo Jewellery', 'Fameo-Jewellery', '', '2017-09-07 11:59:38', '1', '1', '2017-09-07 11:59:38', 1, 0),
(53, 'Fantasy Diamond', 'Fantasy-Diamond-', '', '2017-09-07 11:59:47', '1', '1', '2017-09-07 11:59:47', 1, 0),
(54, 'Gabrielle Diamonds', 'Gabrielle-Diamonds', '', '2017-09-07 11:59:59', '1', '1', '2017-09-07 11:59:59', 1, 0),
(55, 'Gavello', 'Gavello', '', '2017-09-07 12:00:12', '1', '1', '2017-09-07 12:00:12', 1, 0),
(56, 'Gelin &amp; Abaci', 'Gelin--Abaci-', '', '2017-09-07 12:00:25', '1', '1', '2017-09-07 12:00:25', 1, 0),
(57, 'Georg Jensen', 'Georg-Jensen', '', '2017-09-07 12:00:39', '1', '1', '2017-09-07 12:00:39', 1, 0),
(58, 'Gianmaria Buccellati', 'Gianmaria-Buccellati-', '', '2017-09-07 12:00:48', '1', '1', '2017-09-07 12:00:48', 1, 0),
(59, 'Graff', 'Graff-', '', '2017-09-07 12:00:57', '1', '1', '2017-09-07 12:00:57', 1, 0),
(60, 'Harry Winston', 'Harry-Winston', '', '2017-09-07 12:01:07', '1', '1', '2017-09-07 12:01:07', 1, 0),
(61, 'Hearts on Fire', 'Hearts-on-Fire-', '', '2017-09-07 12:01:15', '1', '1', '2017-09-07 12:01:15', 1, 0),
(62, 'Henderson Designs', 'Henderson-Designs', '', '2017-09-07 12:01:25', '1', '1', '2017-09-07 12:01:25', 1, 0),
(63, 'Henri Daussi', 'Henri-Daussi-', '', '2017-09-07 12:01:35', '1', '1', '2017-09-07 12:01:35', 1, 0),
(64, 'Imperial Pearl', 'Imperial-Pearl', '', '2017-09-07 12:01:48', '1', '1', '2017-09-07 12:01:48', 1, 0),
(65, 'ISee2 Diamonds', 'ISee2-Diamonds', '', '2017-09-07 12:01:58', '1', '1', '2017-09-07 12:01:58', 1, 0),
(66, 'Jabel', 'Jabel', '', '2017-09-07 12:02:07', '1', '1', '2017-09-07 12:02:07', 1, 0),
(67, 'Jacks', 'Jacks', '', '2017-09-07 12:02:15', '1', '1', '2017-09-07 12:02:15', 1, 0),
(68, 'JB Star', 'JB-Star', '', '2017-09-07 12:02:24', '1', '1', '2017-09-07 12:02:24', 1, 0),
(69, 'Jeff Cooper', 'Jeff-Cooper', '', '2017-09-07 12:02:34', '1', '1', '2017-09-07 12:02:34', 1, 0),
(70, 'Jeffrey Alters', 'Jeffrey-Alters', '', '2017-09-07 12:02:44', '1', '1', '2017-09-07 12:02:44', 1, 0),
(71, 'John Ferdinand', 'John-Ferdinand', '', '2017-09-07 12:02:54', '1', '1', '2017-09-07 12:02:54', 1, 0),
(72, 'John Hardy', 'John-Hardy-', '', '2017-09-07 12:03:04', '1', '1', '2017-09-07 12:03:04', 1, 0),
(73, 'Jolie Designs', 'Jolie-Designs', '', '2017-09-07 12:03:13', '1', '1', '2017-09-07 12:03:13', 1, 0),
(74, 'Jordan Schlanger', 'Jordan-Schlanger-', '', '2017-09-07 12:03:22', '1', '1', '2017-09-07 12:03:22', 1, 0),
(75, 'Kabana', 'Kabana', '', '2017-09-07 12:03:33', '1', '1', '2017-09-07 12:03:33', 1, 0),
(76, 'KC Designs', 'KC-Designs', '', '2017-09-07 12:03:40', '1', '1', '2017-09-07 12:03:40', 1, 0),
(77, 'Kirchner', 'Kirchner-', '', '2017-09-07 12:03:48', '1', '1', '2017-09-07 12:03:48', 1, 0),
(78, 'Kirk Kara', 'Kirk-Kara', '', '2017-09-07 12:03:55', '1', '1', '2017-09-07 12:03:55', 1, 0),
(79, 'Korloff', 'Korloff', '', '2017-09-07 12:04:02', '1', '1', '2017-09-07 12:04:02', 1, 0),
(80, 'Kurt Wayne', 'Kurt-Wayne', '', '2017-09-07 12:04:10', '1', '1', '2017-09-07 12:04:10', 1, 0),
(81, 'Kwiat', 'Kwiat', '', '2017-09-07 12:04:19', '1', '1', '2017-09-07 12:04:19', 1, 0),
(82, 'Lagos', 'Lagos', '', '2017-09-07 12:04:28', '1', '1', '2017-09-07 12:04:28', 1, 0),
(83, 'Lana Jewelry', 'Lana-Jewelry', '', '2017-09-07 12:04:38', '1', '1', '2017-09-07 12:04:38', 1, 0),
(84, 'Laura Gibson', 'Laura-Gibson', '', '2017-09-07 12:04:46', '1', '1', '2017-09-07 12:04:46', 1, 0),
(85, 'Lauren K', 'Lauren-K-', '', '2017-09-07 12:04:54', '1', '1', '2017-09-07 12:04:54', 1, 0),
(86, 'Lazare Kaplan', 'Lazare-Kaplan', '', '2017-09-07 12:05:05', '1', '1', '2017-09-07 12:05:05', 1, 0),
(87, 'Leon MegÃ©', 'Leon-Meg-', '', '2017-09-07 12:05:14', '1', '1', '2017-09-07 12:05:14', 1, 0),
(88, 'Makur Designs', 'Makur-Designs', '', '2017-09-07 12:05:28', '1', '1', '2017-09-07 12:05:28', 1, 0),
(89, 'Mark Patterson', 'Mark-Patterson-', '', '2017-09-07 12:05:35', '1', '1', '2017-09-07 12:05:35', 1, 0),
(90, 'Martin Flyer', 'Martin-Flyer', '', '2017-09-07 12:05:42', '1', '1', '2017-09-07 12:05:42', 1, 0),
(91, 'Memoire', 'Memoire', '', '2017-09-07 12:05:53', '1', '1', '2017-09-07 12:05:53', 1, 0),
(92, 'Michael B', 'Michael-B', '', '2017-09-07 12:06:01', '1', '1', '2017-09-07 12:06:01', 1, 0),
(93, 'Michael Barin', 'Michael-Barin', '', '2017-09-07 12:06:17', '1', '1', '2017-09-07 12:06:17', 1, 0),
(94, 'Mischa', 'Mischa', '', '2017-09-07 12:06:28', '1', '1', '2017-09-07 12:06:28', 1, 0),
(95, 'Natalie K', 'Natalie-K-', '', '2017-09-07 12:06:40', '1', '1', '2017-09-07 12:06:40', 1, 0),
(96, 'Niki Kavakonis', 'Niki-Kavakonis', '', '2017-09-07 12:07:04', '1', '1', '2017-09-07 12:07:04', 1, 0),
(97, 'Noor Jewels', 'Noor-Jewels', '', '2017-09-07 12:07:15', '1', '1', '2017-09-07 12:07:15', 1, 0),
(98, 'Novell Enterprises', 'Novell-Enterprises', '', '2017-09-07 12:07:36', '1', '1', '2017-09-07 12:07:36', 1, 0),
(99, 'Olivia Jewelry', '-Olivia-Jewelry-', '', '2017-09-07 12:07:48', '1', '1', '2017-09-07 12:07:48', 1, 0),
(100, 'Orlando Orlandini', '-Orlando-Orlandini-', '', '2017-09-07 12:08:01', '1', '1', '2017-09-07 12:08:01', 1, 0),
(101, 'Oscar Heyman', 'Oscar-Heyman', '', '2017-09-07 12:08:17', '1', '1', '2017-09-07 12:08:17', 1, 0),
(102, 'Pamela Froman', 'Pamela-Froman-', '', '2017-09-07 12:08:27', '1', '1', '2017-09-07 12:08:27', 1, 0),
(103, 'Pandora Jewelry', 'Pandora-Jewelry-', '', '2017-09-07 12:08:35', '1', '1', '2017-09-07 12:08:35', 1, 0),
(104, 'Parade Jewelry', 'Parade-Jewelry-', '', '2017-09-07 12:08:46', '1', '1', '2017-09-07 12:08:46', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `slug`, `image`, `added_on`, `added_by`, `updated_by`, `updated_on`, `status`, `delete`) VALUES
(14, 0, 'Just In', 'Just-In', 'Hair-and-head-ornaments-2017-08-12-14-27-00.png', '2017-08-12 14:27:00', '1', '1', '2017-09-12 14:05:55', 1, 0),
(15, 18, 'Earring', 'Earring', 'Earring-2017-08-12-14-27-34.png', '2017-08-12 14:27:34', '1', '1', '2017-08-12 14:27:34', 1, 0),
(16, 18, 'Hatpin', 'Hatpin', 'Hatpin-2017-08-12-14-27-54.png', '2017-08-12 14:27:54', '1', '1', '2017-08-12 14:27:54', 1, 0),
(17, 18, 'Hairpins', 'Hairpins', 'defult.jpg', '2017-08-12 14:32:30', '1', '1', '2017-09-12 09:57:54', 1, 0),
(18, 0, 'Women', 'Women', 'Women-2017-09-01-18-07-01.jpg', '2017-08-12 14:33:00', '1', '1', '2017-09-04 17:24:21', 1, 0),
(19, 18, 'Necklaces', 'Necklaces', 'defult.jpg', '2017-08-12 14:33:33', '1', '1', '2017-08-12 14:33:33', 1, 0),
(20, 18, 'Chokers', 'Chokers', 'defult.jpg', '2017-08-12 14:33:43', '1', '1', '2017-08-12 14:33:43', 1, 0),
(21, 18, 'Armlets ', 'Armlets-', 'defult.jpg', '2017-08-12 14:34:10', '1', '1', '2017-08-12 14:34:10', 0, 0),
(22, 0, 'Men', '-Men', 'Men-2017-09-04-14-00-55.jpg', '2017-08-12 14:34:30', '1', '1', '2017-09-04 14:01:25', 1, 0),
(23, 22, 'Friendship bracelets', 'Friendship-bracelets', 'defult.jpg', '2017-08-12 14:34:40', '1', '1', '2017-08-12 14:34:40', 1, 0),
(24, 22, 'Gospel bracelets', 'Gospel-bracelets', 'defult.jpg', '2017-08-12 14:34:50', '1', '1', '2017-08-12 14:34:50', 1, 0),
(25, 18, 'Bangles', 'Bangles', 'defult.jpg', '2017-08-12 14:35:02', '1', '1', '2017-08-12 14:35:02', 0, 0),
(26, 22, 'Hands', 'Hands', 'defult.jpg', '2017-08-12 14:35:17', '1', '1', '2017-08-12 14:35:17', 0, 0),
(27, 18, 'Slave bracelets', 'Slave-bracelets', 'defult.jpg', '2017-08-12 14:35:36', '1', '1', '2017-08-12 14:35:36', 0, 0),
(28, 22, 'Ring', 'Ring', 'defult.jpg', '2017-08-12 14:36:05', '1', '1', '2017-08-12 14:36:05', 1, 0),
(29, 22, 'Engagement rings', 'Engagement-rings', 'defult.jpg', '2017-08-12 14:36:18', '1', '1', '2017-08-12 14:36:18', 1, 0),
(30, 22, 'Class rings', 'Class-rings', 'defult.jpg', '2017-08-12 14:36:45', '1', '1', '2017-08-12 14:36:45', 1, 0),
(31, 18, 'Promise rings', 'Promise-rings', 'defult.jpg', '2017-08-12 14:36:56', '1', '1', '2017-08-12 14:36:56', 1, 0),
(32, 18, 'Wedding rings', 'Wedding-rings', 'defult.jpg', '2017-08-12 14:37:07', '1', '1', '2017-08-12 14:37:07', 1, 0),
(33, 34, 'Emblems', 'Emblems', 'defult.jpg', '2017-08-12 14:37:44', '1', '1', '2017-09-06 15:01:48', 1, 0),
(34, 14, 'Lockets', 'Lockets', 'defult.jpg', '2017-08-12 14:37:55', '1', '1', '2017-08-12 14:37:55', 1, 0),
(35, 14, 'Pendants', 'Pendants', 'defult.jpg', '2017-08-12 14:38:12', '1', '1', '2017-08-12 14:38:12', 1, 0),
(36, 14, 'Diamonds', 'Diamonds', 'defult.jpg', '2017-08-12 14:39:11', '1', '1', '2017-08-12 14:39:11', 1, 0),
(37, 33, '6', '-6', 'defult.jpg', '2017-09-02 15:23:42', '1', '1', '2017-09-02 15:23:42', 1, 0),
(38, 34, 'y', 'y', 'defult.jpg', '2017-09-02 15:24:35', '1', '1', '2017-09-02 15:24:35', 1, 0),
(39, 14, 'test', 'test', 'defult.jpg', '2017-09-04 12:40:05', '1', '1', '2017-09-04 12:40:05', 1, 0),
(40, 37, 'ggggg', 'ggggg', 'defult.jpg', '2017-09-04 14:13:55', '1', '1', '2017-09-04 14:13:55', 1, 0),
(41, 18, 'hhhhhhhhhhhh', 'hhhhhhhhhhhh', 'defult.jpg', '2017-09-04 14:14:43', '1', '1', '2017-09-04 14:14:43', 1, 1),
(42, 18, 'watch', 'watch', 'defult.jpg', '2017-09-04 14:18:06', '1', '1', '2017-09-04 14:18:06', 1, 1),
(43, 33, 'dad', 'dad', 'defult.jpg', '2017-09-04 16:15:35', '1', '1', '2017-09-04 16:15:35', 1, 0),
(44, 15, 'Ear- cuffs', 'Ear--cuffs', 'defult.jpg', '2017-09-15 15:30:14', '1', '1', '2017-09-15 15:30:14', 1, 0),
(45, 14, 'f', 'f', 'defult.jpg', '2017-09-15 18:38:22', '1', '1', '2017-09-15 18:41:01', 0, 1),
(49, 0, 'sneha', 'sneha', 'defult.jpg', '2017-09-16 11:57:10', '1', '1', '2017-09-16 11:57:10', 1, 1),
(50, 18, 'Nose pins', 'Nose-pins', 'defult.jpg', '2017-09-16 14:12:49', '1', '1', '2017-09-16 14:12:49', 1, 0),
(51, 18, 'Rings', 'Rings', 'defult.jpg', '2017-09-19 11:14:20', '1', '1', '2017-09-19 11:14:20', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `configure_attribute_option`
--

INSERT INTO `configure_attribute_option` (`product_id`, `id`, `associated_product_id`, `attribute_id`, `attribute_name`, `option_name`, `price`, `price_type`, `added_on`, `added_by`, `updated_on`, `updated_by`, `delete`) VALUES
(17, 7, 14, 10, 'Height', '111', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(17, 8, 12, 10, 'Height', '1111', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(33, 15, 21, 11, 'color', 'Yellow', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(69, 45, 67, 11, 'color', 'Green', '23', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(69, 46, 67, 10, 'Height', '23', '13', 'percent', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(69, 47, 67, 5, 'Length', '12', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(69, 48, 67, 14, 'Size', '19', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(81, 58, 82, 11, 'color', 'Yellow', '20', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(84, 71, 85, 11, 'color', 'Orange', '23', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(84, 72, 85, 10, 'Height', '23mm', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(84, 73, 85, 5, 'Length', '12mm', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(84, 74, 85, 14, 'Size', '19', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(84, 75, 55, 11, 'color', 'White', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(84, 76, 55, 10, 'Height', 'tet', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(84, 77, 55, 5, 'Length', 'tet', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(84, 78, 55, 14, 'Size', '17', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(86, 79, 88, 11, 'color', 'Cyan', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(86, 80, 87, 11, 'color', 'Black', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(111, 81, 112, 11, 'color', 'Gold', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(113, 88, 114, 5, 'Length', '12', '10', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(113, 89, 114, 14, 'Size', '5', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(120, 94, 121, 11, 'color', 'Black', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(120, 95, 121, 10, 'Height', '56', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(120, 96, 121, 5, 'Length', '33', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(120, 97, 121, 14, 'Size', '19', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(122, 98, 119, 11, 'color', 'Gold', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(122, 99, 119, 10, 'Height', '5', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(122, 100, 114, 11, 'color', 'Yellow', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(122, 101, 114, 10, 'Height', '10', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(122, 102, 123, 11, 'color', 'White', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(122, 103, 123, 10, 'Height', '6', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(65, 104, 54, 11, 'color', 'White', '10', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(65, 105, 54, 10, 'Height', 'sss', '11', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(65, 106, 54, 5, 'Length', 'ts', '11', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(65, 107, 54, 14, 'Size', '19', '11', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(124, 108, 126, 11, 'color', 'Silver', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(124, 109, 125, 11, 'color', 'Gold', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(143, 110, 144, 10, 'Height', '13mm', '100', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(143, 111, 144, 5, 'Length', '12mm', '200', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(51, 112, 55, 11, 'color', 'White', '34', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(51, 113, 55, 10, 'Height', 'tet', '44', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(51, 114, 55, 5, 'Length', 'tet', '44', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(51, 115, 55, 14, 'Size', '17', '44', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(154, 130, 149, 11, 'color', 'Black', '22', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(154, 131, 149, 10, 'Height', '11mm', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(154, 132, 149, 5, 'Length', '12mm', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(154, 133, 149, 14, 'Size', '9', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(154, 134, 148, 11, 'color', 'Yellow', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(154, 135, 148, 10, 'Height', '300', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(154, 136, 148, 5, 'Length', '250', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(154, 137, 148, 14, 'Size', '10', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(152, 138, 153, 11, 'color', 'Blue', '25', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(152, 139, 153, 10, 'Height', '552', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(152, 140, 154, 11, 'color', 'Yellow', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(152, 141, 154, 10, 'Height', '300', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(18, 142, 147, 11, 'color', 'Silver', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(18, 143, 147, 10, 'Height', '12mm', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(18, 144, 147, 5, 'Length', '12mm', '', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(158, 145, 160, 11, 'color', 'Blue', '1', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0),
(158, 146, 159, 11, 'color', 'White', '2', 'fixed', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `first_name`, `last_name`, `email`, `telephone`, `comment`, `added_on`, `ip_address`) VALUES
(52, 'fgdfg', 'fgdfg', 'sheetallowanshi08@gmail.com', '6456464567', 'dfgd', '2017-09-12 14:39:23', ''),
(51, 'rert', 'rert', 'ert', '5475645656', 'ert', '2017-09-12 14:35:11', ''),
(50, 'sneha', 'sneha', 'mmfinfotech1075@gmail.com', '123456', 'test', '2017-09-12 14:00:45', ''),
(49, 'h', 'h', 'sheetallowanshi08@gmail.com', '4', '4', '2017-09-06 14:00:10', ''),
(48, 's', 's', 's', 's', 's', '2017-09-06 13:38:48', '');

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE IF NOT EXISTS `contests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `slug` varchar(200) NOT NULL,
  `description` text,
  `cover_image` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `last_date` datetime NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contests`
--

INSERT INTO `contests` (`id`, `title`, `slug`, `description`, `cover_image`, `status`, `last_date`, `added_on`, `updated_on`, `added_by`, `update_by`, `is_delete`) VALUES
(2, 'test', 'test', 'test', '', 0, '2017-09-18 16:11:57', '2017-09-18 16:11:57', NULL, 1, NULL, 1),
(3, 'test 1111', 'test-1111', 'test', '-2017-09-18-16-37-20.jpg', 1, '2017-09-29 16:36:00', '2017-09-18 16:37:20', NULL, 1, NULL, 0),
(4, 'yrdy 2', 'yrdy-2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passag', 'yrdy-2-2017-09-19-18-01-03.jpg', 1, '2017-09-19 18:00:00', '2017-09-19 18:01:03', NULL, 1, NULL, 0),
(5, 'test 3232', 'test-3232', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passag', 'test-3232-2017-09-19-18-01-25.jpg', 1, '2017-09-30 18:00:00', '2017-09-19 18:01:25', NULL, 1, NULL, 0),
(6, 'tesrrrrrrrr', 'tesrrrrrrrr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passag', 'tesrrrrrrrr-2017-09-19-18-02-03.jpg', 1, '2017-11-30 18:00:00', '2017-09-19 18:02:03', NULL, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contests_participate`
--

CREATE TABLE IF NOT EXISTS `contests_participate` (
  `id` int(11) NOT NULL,
  `contest_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `description` text,
  `product_id` int(11) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `status` tinytext,
  `admin_status` tinytext COMMENT '(1 = approved and  0 = decline) ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contest_Votes`
--

CREATE TABLE IF NOT EXISTS `contest_Votes` (
  `id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `particpate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=249 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Republic Of The Congo', 242),
(50, 'CD', 'Democratic Republic Of The Congo', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D''Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

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
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `custom_design`
--

INSERT INTO `custom_design` (`id`, `name`, `email`, `mobile`, `message`, `image`, `status`, `added_on`) VALUES
(1, 'sneha-test', 'mmfinfotech1075@gmail.com', 123456, 'nj', 'sneha-test-.jpg', 1, '2017-08-17 15:44:54'),
(2, 'sneha-test', 'mmfinfotech1075@gmail.com', 123456, 'teting', 'sneha-test-.jpg', 1, '2017-08-17 15:46:45'),
(27, '', '', 0, '', '', 1, '2017-08-23 13:32:49'),
(28, '', '', 0, '', '', 1, '2017-08-23 13:32:49'),
(25, '', '', 0, '', '', 1, '2017-08-23 13:28:44'),
(26, '', '', 0, '', '', 1, '2017-08-23 13:28:55'),
(23, '', '', 0, '', '', 1, '2017-08-23 13:28:16'),
(24, '', '', 0, '', '', 1, '2017-08-23 13:28:32'),
(21, '', '', 0, '', '', 1, '2017-08-23 13:28:15'),
(22, '', '', 0, '', '', 1, '2017-08-23 13:28:15'),
(19, '', '', 0, '', '', 1, '2017-08-23 13:28:13'),
(20, '', '', 0, '', '', 1, '2017-08-23 13:28:13'),
(18, 'sneha', 'sneha@gmail.com', 874569, 'testing', 'sneha-2017-08-17-18-35-03.jpg', 1, '2017-08-17 18:35:03'),
(29, '', '', 0, '', '', 1, '2017-08-25 12:16:01'),
(30, '', '', 0, '', '', 1, '2017-08-25 12:16:02'),
(31, '', '', 0, '', '', 1, '2017-09-02 17:04:59'),
(32, '', '', 0, '', '', 1, '2017-09-02 17:05:17'),
(33, '', '', 0, '', '', 1, '2017-09-02 17:06:26'),
(34, '                      6', '                        6', 6, '', '', 1, '2017-09-02 17:06:42'),
(35, '                      6', '                        6', 6, '', '', 1, '2017-09-02 17:06:43'),
(36, '                      6', '                        6', 6, '', '', 1, '2017-09-02 17:06:43'),
(37, '                      6', '                        6', 6, '', '', 1, '2017-09-02 17:06:44'),
(38, '                                   6', '                                   6', 0, '', '', 1, '2017-09-02 17:06:57'),
(39, '', '', 0, '', '', 1, '2017-09-05 10:57:27'),
(40, '', '', 0, '', '', 1, '2017-09-05 10:57:30'),
(41, '', '', 0, '', '', 1, '2017-09-05 13:49:55'),
(42, '', '', 0, '', '', 1, '2017-09-05 13:52:07'),
(43, 'sneha-test', 'sneha@gmail.com', 2147483647, 'testing', 'sneha-test-2017-09-05-13-56-24.png', 1, '2017-09-05 13:56:24'),
(44, 'sneha-test', 'mmfinfotech1075@gmail.com', 123456, 'testing', 'sneha-test-2017-09-05-14-10-27.jpg', 1, '2017-09-05 14:10:27'),
(45, 'sneha-test', 'mmfinfotech1075@gmail.com', 123456, 'testing', 'sneha-test-2017-09-05-14-10-29.jpg', 1, '2017-09-05 14:10:29'),
(46, '', '', 0, '', '', 1, '2017-09-05 14:11:16'),
(47, 'sneha-test', 'mmfinfotech1075@gmail.com', 123456, 'testing', 'sneha-test-2017-09-05-15-09-23.png', 1, '2017-09-05 15:09:23'),
(48, 'backup', 'mmfinfotech1075@gmail.com', 123456, 'testing', 'backup-2017-09-05-15-19-27.png', 1, '2017-09-05 15:19:27'),
(49, 'sneha-test', 'mmfinfotech1075@gmail.com', 123456, 'testing', 'sneha-test-2017-09-05-15-27-13.png', 1, '2017-09-05 15:27:13'),
(50, 'sneha-test', 'mmfinfotech1075@gmail.com', 123456, '123456', 'sneha-test-2017-09-05-15-45-49.png', 1, '2017-09-05 15:45:49'),
(51, 'sneha-test', 'test@gmail.com', 123456, 'testing', 'sneha-test-2017-09-05-15-49-45.png', 1, '2017-09-05 15:49:45'),
(52, 'f', 'f', 0, 'f', 'f-2017-09-06-09-51-26.jpg', 1, '2017-09-06 09:51:26'),
(53, 'f', 'f', 0, 'f', 'f-2017-09-06-09-51-27.jpg', 1, '2017-09-06 09:51:27'),
(54, 'f', 'f', 0, 'f', 'f-2017-09-06-09-51-30.jpg', 1, '2017-09-06 09:51:31'),
(55, 'f', 'f', 0, 'f', 'f-2017-09-06-09-51-31.jpg', 1, '2017-09-06 09:51:32'),
(56, 'n', 'n', 0, 'n', 'n-2017-09-06-09-52-26.jpg', 1, '2017-09-06 09:52:26'),
(57, 'a', 'a', 0, 'a', 'a-2017-09-06-13-44-58.jpg', 1, '2017-09-06 13:44:58'),
(58, 'dwed', 'wedwe', 2147483647, 'wedwe', 'dwed-2017-09-12-14-36-31.jpg', 1, '2017-09-12 14:36:31'),
(59, 'dwed', 'wedwe', 2147483647, 'wedwe', 'dwed-2017-09-12-14-36-37.jpg', 1, '2017-09-12 14:36:37'),
(60, 'fsdf', 'shee@gmail.com', 2147483647, 'dasdasd', 'fsdf-2017-09-12-14-39-56.jpg', 1, '2017-09-12 14:39:56');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

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
(77, 8, 'Size', 'drop_down', 1, 1, '2017-08-13 11:46:54', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(78, 21, 'custom option', 'drop_down', 1, 1, '2017-08-26 18:09:18', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(79, 22, 'custom', 'drop_down', 1, 1, '2017-08-26 19:19:10', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(80, 22, 'custom 2', 'drop_down', 1, 2, '2017-08-26 19:19:11', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(81, 78, 'size', 'drop_down', 1, 7, '2017-09-16 11:11:17', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(82, 81, 'size', 'drop_down', 1, 1, '2017-09-16 11:22:23', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(83, 81, 'price', 'drop_down', 1, 2, '2017-09-16 11:22:23', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(84, 104, 'trt', 'drop_down', 1, 1, '2017-09-16 15:30:44', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(85, 104, '345', 'drop_down', 1, 2, '2017-09-16 15:30:44', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(86, 111, 'size', 'drop_down', 1, 1, '2017-09-16 15:57:58', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(105, 128, 'yyyyy', 'drop_down', 1, 2, '2017-09-16 18:27:26', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(112, 117, 'vxcvxc', 'drop_down', 1, 1, '2017-09-16 18:37:10', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(113, 117, '2121', 'drop_down', 1, 2, '2017-09-16 18:37:10', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(114, 117, 'test', 'drop_down', 1, 3, '2017-09-16 18:37:10', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(125, 127, 'size', 'drop_down', 1, 1, '2017-09-16 18:43:23', 4, '0000-00-00 00:00:00', 0, '', 'Seller', 1, 0),
(126, 129, 'wrewer', 'drop_down', 1, 1, '2017-09-16 18:43:39', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(135, 130, 'test', 'drop_down', 1, 4, '2017-09-18 10:59:39', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(138, 131, 'test', 'drop_down', 0, 1, '2017-09-18 11:12:46', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(139, 131, 'test', 'drop_down', 1, 2, '2017-09-18 11:12:46', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(141, 133, 'size', 'drop_down', 1, 1, '2017-09-18 12:31:14', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(142, 119, 'wer', 'drop_down', 1, 1, '2017-09-18 15:22:20', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(143, 119, '5', 'drop_down', 1, 2, '2017-09-18 15:22:20', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(172, 140, 'tetet', 'drop_down', 1, 1, '2017-09-18 17:19:26', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(173, 140, 'testest', 'drop_down', 1, 2, '2017-09-18 17:19:26', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(174, 140, 'test232', 'drop_down', 1, 3, '2017-09-18 17:19:26', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(175, 143, 'size', 'drop_down', 1, 1, '2017-09-19 10:10:41', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(176, 143, 'price', 'drop_down', 1, 2, '2017-09-19 10:10:41', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(186, 145, 'size', 'drop_down', 1, 1, '2017-09-19 10:44:50', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(193, 148, 'color', 'drop_down', 1, 1, '2017-09-19 17:13:34', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(195, 147, 'Size', 'drop_down', 1, 1, '2017-09-19 17:14:03', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0),
(196, 158, 'price', 'drop_down', 1, 1, '2017-09-21 12:17:41', 1, '0000-00-00 00:00:00', 0, '', 'Admin', 1, 0);

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
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=284 ;

--
-- Dumping data for table `custom_option_value`
--

INSERT INTO `custom_option_value` (`id`, `option_id`, `input_type`, `price`, `price_type`, `SKU`, `opt_maxchar`, `option_title`, `status`, `creted_date`, `opt_sort_order_row`, `product_id`) VALUES
(1, 1, 'field', '343', 'percent', '3333', '3', '0', 1, '2017-07-29 05:55:41', '', 0),
(2, 2, 'drop_down', '444', 'fixed', '33', '', '0', 1, '2017-07-29 05:55:41', '3', 0),
(3, 2, 'drop_down', '3333', 'fixed', '222', '', '222', 1, '2017-07-29 05:55:41', '3', 0),
(4, 3, 'field', '', 'fixed', '323', '322', '0', 1, '2017-07-29 07:00:55', '', 0),
(5, 5, 'field', '', '', '', '', '0', 1, '2017-07-29 07:00:55', '', 0),
(6, 6, 'field', '', '', '', '', '0', 1, '2017-07-29 07:23:23', '', 0),
(7, 9, 'field', '', '', '', '', '0', 1, '2017-07-29 07:24:41', '', 0),
(8, 10, 'field', '21', 'fixed', '32', '', '0', 1, '2017-07-29 07:28:48', '', 0),
(9, 11, 'field', '', '', '', '', '0', 1, '2017-07-29 07:28:48', '', 0),
(10, 12, 'field', '', '', '', '', '0', 1, '2017-07-29 07:33:09', '', 0),
(11, 14, 'field', '434', 'fixed', '34343', '', '0', 1, '2017-07-29 08:24:41', '', 0),
(12, 15, 'field', '', '', '', '', '0', 1, '2017-07-29 08:24:41', '', 0),
(13, 16, 'field', '', '', '', '', '0', 1, '2017-07-29 09:04:26', '', 0),
(14, 18, 'field', '', '', '', '', '0', 1, '2017-07-29 09:04:26', '', 0),
(15, 19, 'field', '', '', '', '', '0', 1, '2017-07-29 09:06:25', '', 0),
(16, 21, 'field', '', '', '', '', '0', 1, '2017-07-29 09:06:25', '', 0),
(17, 22, 'field', '', '', '', '', '0', 1, '2017-07-29 09:08:20', '', 0),
(18, 24, 'field', '', '', '', '', '0', 1, '2017-07-29 09:08:20', '', 0),
(19, 25, 'field', '', '', '', '', '0', 1, '2017-07-29 09:09:44', '', 0),
(20, 27, 'field', '', '', '', '', '0', 1, '2017-07-29 09:09:44', '', 0),
(21, 28, 'field', '', '', '', '', '0', 1, '2017-07-29 09:11:39', '', 0),
(22, 30, 'field', '', '', '', '', '0', 1, '2017-07-29 09:11:39', '', 0),
(23, 32, 'field', '', '', '', '', '0', 1, '2017-07-29 09:12:31', '', 0),
(24, 33, 'field', '', '', '', '', '0', 1, '2017-07-29 09:13:30', '', 0),
(25, 35, 'field', '', '', '', '', '0', 1, '2017-07-29 09:13:30', '', 0),
(26, 36, 'field', '', 'fixed', 'et', '', '0', 1, '2017-07-29 09:17:40', '', 0),
(27, 37, 'drop_down', '45', 'fixed', 'kkkk', '', '45', 1, '2017-07-29 09:17:40', '9', 0),
(28, 38, 'field', '', '', '', '', '0', 1, '2017-07-29 09:18:05', '', 0),
(29, 40, 'field', '', '', '', '', '0', 1, '2017-07-29 09:18:06', '', 0),
(30, 41, 'field', '', '', '', '', '0', 1, '2017-07-29 09:21:21', '', 0),
(31, 42, 'field', '222', 'percent', '44444', '4', '0', 1, '2017-07-29 09:21:46', '', 0),
(32, 43, 'field', '', '', '', '', '0', 1, '2017-07-29 09:21:47', '', 0),
(33, 44, 'field', '222', 'percent', '44444', '4', '0', 1, '2017-07-29 09:25:14', '', 0),
(34, 45, 'field', '', '', '', '', '0', 1, '2017-07-29 09:25:14', '', 0),
(35, 46, 'field', '222', 'percent', '44444', '4', '0', 1, '2017-07-29 09:26:07', '', 0),
(36, 47, 'field', '', '', '', '', '0', 1, '2017-07-29 09:26:07', '', 0),
(37, 48, 'field', '222', 'percent', '44444', '4', '0', 1, '2017-07-29 09:27:04', '', 0),
(38, 49, 'field', '', '', '', '', '0', 1, '2017-07-29 09:27:04', '', 0),
(39, 50, 'field', '11', 'percent', '111', '111', '0', 1, '2017-07-29 09:46:20', '', 0),
(40, 51, 'field', '111', 'percent', '1212', '212', '0', 1, '2017-07-29 09:46:20', '', 0),
(41, 53, 'field', '11', 'percent', '111', '111', '0', 1, '2017-07-29 09:48:04', '', 0),
(42, 54, 'field', '111', 'percent', '1212', '212', '0', 1, '2017-07-29 09:48:04', '', 0),
(43, 56, 'field', '11', 'percent', '111', '111', '0', 1, '2017-07-29 09:50:05', '', 0),
(44, 57, 'field', '111', 'percent', '1212', '212', '0', 1, '2017-07-29 09:50:05', '', 0),
(45, 60, 'field', '', 'fixed', '', '', '0', 1, '2017-07-29 10:04:04', '', 0),
(46, 62, 'field', '', 'fixed', '', '', '0', 1, '2017-07-29 10:04:05', '', 0),
(47, 65, 'drop_down', '4343', 'fixed', '4343', '', '0', 1, '2017-07-31 15:15:37', '', 0),
(48, 65, 'drop_down', '333', 'fixed', '5de', '', '0', 1, '2017-07-31 15:15:37', '', 0),
(49, 66, 'drop_down', '3232', 'fixed', 'test ', '', '0', 1, '2017-08-02 05:35:13', '1', 0),
(50, 67, 'drop_down', '34443', 'fixed', '33333', '', '0', 1, '2017-08-02 05:35:13', '', 0),
(51, 68, 'drop_down', '250', 'fixed', '2111', '', '0', 1, '2017-08-03 09:50:50', '1', 0),
(52, 69, 'drop_down', 'ert', 'fixed', 'ret', '', '0', 1, '2017-08-03 12:38:35', '', 0),
(53, 69, 'drop_down', '545', 'fixed', 'rte', '', '0', 1, '2017-08-03 12:38:35', '', 0),
(54, 70, 'drop_down', '444', 'fixed', '43', '', 'test', 1, '2017-08-03 13:49:27', '1', 0),
(55, 70, 'drop_down', '4443', 'fixed', '434d', '', '3test', 1, '2017-08-03 13:49:27', '343', 0),
(56, 72, 'drop_down', '1', 'fixed', '1', '', 'GM', 1, '2017-08-08 05:30:59', '1', 0),
(57, 73, 'drop_down', '343', 'fixed', '4343', '', 'ac1', 1, '2017-08-08 07:31:03', '3', 0),
(58, 73, 'drop_down', '34', 'fixed', '4334', '', 'ac2', 1, '2017-08-08 07:31:03', '2', 0),
(59, 73, 'drop_down', '434', 'fixed', '5434', '', 'ac3', 1, '2017-08-08 07:31:03', '1', 0),
(60, 74, 'drop_down', '500', 'fixed', 'fgdg', '', '1', 1, '2017-08-08 08:40:48', '1', 0),
(61, 74, 'drop_down', '400', 'fixed', 'gfgr', '', '2', 1, '2017-08-08 08:40:48', '1', 0),
(62, 75, 'drop_down', '1', 'fixed', '1r', '', '1', 1, '2017-08-08 08:40:48', '2', 0),
(63, 76, 'drop_down', '434', 'fixed', '43', '', '34', 1, '2017-08-08 08:58:58', '43', 0),
(64, 77, 'drop_down', '12', 'fixed', '', '', '22', 1, '2017-08-13 06:16:54', '', 0),
(65, 77, 'drop_down', '', 'fixed', '', '', '12', 1, '2017-08-13 06:16:54', '', 0),
(66, 78, 'drop_down', '20', 'fixed', '1000', '', 'option1', 1, '2017-08-26 12:39:18', '1', 0),
(67, 78, 'drop_down', '10', 'fixed', '1111', '', 'option2', 1, '2017-08-26 12:39:18', '2', 0),
(68, 79, 'drop_down', '20', 'fixed', '', '', '1', 1, '2017-08-26 13:49:10', '', 0),
(69, 79, 'drop_down', '0', 'fixed', '', '', '2', 1, '2017-08-26 13:49:10', '', 0),
(70, 79, 'drop_down', '10', 'fixed', '', '', '3', 1, '2017-08-26 13:49:10', '', 0),
(71, 79, 'drop_down', '0', 'fixed', '', '', '4', 1, '2017-08-26 13:49:10', '', 0),
(72, 80, 'drop_down', '1', 'fixed', '', '', '11', 1, '2017-08-26 13:49:11', '', 0),
(73, 80, 'drop_down', '1', 'fixed', '', '', '12', 1, '2017-08-26 13:49:11', '', 0),
(74, 80, 'drop_down', '1', 'fixed', '', '', '12', 1, '2017-08-26 13:49:11', '', 0),
(75, 81, 'drop_down', '1', 'percent', '353453', '', 'size', 1, '2017-09-16 05:41:17', '8', 0),
(76, 82, 'drop_down', '10', 'fixed', '', '', 'xl', 1, '2017-09-16 05:52:23', '1', 0),
(77, 82, 'drop_down', '10', 'fixed', '', '', 's', 1, '2017-09-16 05:52:23', '1', 0),
(78, 83, 'drop_down', '20', 'fixed', '', '', 'abcd', 1, '2017-09-16 05:52:23', '', 0),
(79, 83, 'drop_down', '20', 'fixed', '', '', 'xyz', 1, '2017-09-16 05:52:23', '', 0),
(80, 84, 'drop_down', '5', 'fixed', '454', '', 'ert', 1, '2017-09-16 10:00:44', '34', 0),
(81, 85, 'drop_down', '56', 'fixed', 'dg', '', 'dgd', 1, '2017-09-16 10:00:44', '', 0),
(82, 86, 'drop_down', '34', 'fixed', '45', '', 'we', 1, '2017-09-16 10:27:58', '2', 0),
(83, 87, 'drop_down', '0', 'fixed', '', '', 'cxv', 1, '2017-09-16 10:50:56', '', 0),
(84, 87, 'drop_down', '0', 'fixed', '', '', 'vxcv', 1, '2017-09-16 10:50:56', '', 0),
(85, 88, 'drop_down', '4', 'fixed', '4', '', 'wer', 1, '2017-09-16 11:14:10', '1', 0),
(86, 88, 'drop_down', '5', 'fixed', '5', '', 'fgg', 1, '2017-09-16 11:14:10', '5', 0),
(87, 89, 'drop_down', '5', 'fixed', '5', '', '5', 1, '2017-09-16 11:14:10', '5', 0),
(88, 89, 'drop_down', '5', 'fixed', '5', '', '5', 1, '2017-09-16 11:14:10', '5', 0),
(89, 90, 'drop_down', '1112', 'percent', '', '', '111', 1, '2017-09-16 12:25:03', '1', 0),
(90, 90, 'drop_down', '22222', 'fixed', '', '', '11', 1, '2017-09-16 12:25:03', '2', 0),
(91, 91, 'drop_down', '23', 'fixed', '', '', 'rr', 1, '2017-09-16 12:25:03', '1', 0),
(92, 91, 'drop_down', '33', 'fixed', '', '', '333333333', 1, '2017-09-16 12:25:03', '2', 0),
(93, 92, 'drop_down', '1112', 'percent', '', '', '111', 1, '2017-09-16 12:46:08', '1', 0),
(94, 92, 'drop_down', '22222', 'fixed', '', '', '11', 1, '2017-09-16 12:46:08', '2', 0),
(95, 93, 'drop_down', '23', 'fixed', '', '', 'rr', 1, '2017-09-16 12:46:08', '1', 0),
(96, 93, 'drop_down', '33', 'fixed', '', '', '333333333', 1, '2017-09-16 12:46:08', '2', 0),
(97, 94, 'drop_down', '23', 'fixed', '', '', 'rr', 1, '2017-09-16 12:47:36', '1', 0),
(98, 94, 'drop_down', '33', 'fixed', '', '', '333333333', 1, '2017-09-16 12:47:36', '2', 0),
(99, 95, 'drop_down', '1', 'fixed', '', '', '1', 1, '2017-09-16 12:47:36', '', 0),
(100, 95, 'drop_down', '2', 'fixed', '', '', '2', 1, '2017-09-16 12:47:36', '', 0),
(101, 96, 'drop_down', '1', 'fixed', '', '', '1', 1, '2017-09-16 12:47:36', '', 0),
(102, 96, 'drop_down', '2', 'fixed', '', '', '2', 1, '2017-09-16 12:47:36', '', 0),
(103, 97, 'drop_down', '1', 'fixed', '', '', '1', 1, '2017-09-16 12:49:01', '', 0),
(104, 97, 'drop_down', '', 'fixed', '', '', 't', 1, '2017-09-16 12:49:01', '', 0),
(105, 97, 'drop_down', '2', 'fixed', '', '', '2', 1, '2017-09-16 12:49:01', '', 0),
(106, 98, 'drop_down', '4343', 'fixed', '', '', '4343', 1, '2017-09-16 12:49:01', '', 0),
(107, 98, 'drop_down', '4343', 'fixed', '', '', '4343', 1, '2017-09-16 12:49:01', '', 0),
(108, 99, 'drop_down', '4343', 'fixed', '', '', '4343', 1, '2017-09-16 12:50:56', '', 0),
(109, 99, 'drop_down', '4343', 'fixed', '', '', '4343', 1, '2017-09-16 12:50:56', '', 0),
(110, 100, 'drop_down', '4343', 'fixed', '', '', '4343', 1, '2017-09-16 12:51:11', '', 0),
(111, 100, 'drop_down', '4343', 'fixed', '', '', '4343', 1, '2017-09-16 12:51:11', '', 0),
(112, 101, 'drop_down', '4343', 'fixed', '', '', '4343', 1, '2017-09-16 12:53:48', '', 0),
(113, 101, 'drop_down', '1111', 'fixed', '', '', '111', 1, '2017-09-16 12:53:48', '', 0),
(114, 101, 'drop_down', '4343', 'fixed', '', '', '4343', 1, '2017-09-16 12:53:48', '', 0),
(115, 102, 'drop_down', '21', 'fixed', '', '', 'sss', 1, '2017-09-16 12:53:48', '', 0),
(116, 102, 'drop_down', '2121', 'fixed', '', '', '21212', 1, '2017-09-16 12:53:48', '', 0),
(117, 103, 'drop_down', '21', 'fixed', '', '', 'sss', 1, '2017-09-16 12:56:07', '444', 0),
(118, 103, 'drop_down', '444', 'fixed', '', '', 'rr', 1, '2017-09-16 12:56:07', '444', 0),
(119, 103, 'drop_down', '2121', 'fixed', '', '', '21212', 1, '2017-09-16 12:56:07', '', 0),
(120, 104, 'drop_down', '21', 'fixed', '', '', 'sss', 1, '2017-09-16 12:57:26', '444', 0),
(121, 104, 'drop_down', '444', 'fixed', '', '', 'rr', 1, '2017-09-16 12:57:26', '444', 0),
(122, 104, 'drop_down', '2121', 'fixed', '', '', '21212', 1, '2017-09-16 12:57:26', '', 0),
(123, 105, 'drop_down', '66', 'fixed', '', '', 'tt', 1, '2017-09-16 12:57:26', '666', 0),
(124, 105, 'drop_down', '666', 'fixed', '', '', 'tt', 1, '2017-09-16 12:57:26', '666', 0),
(125, 106, 'drop_down', '0', 'fixed', '', '', 'cxv', 1, '2017-09-16 13:03:14', '', 0),
(126, 106, 'drop_down', '0', 'fixed', '', '', 'vxcv', 1, '2017-09-16 13:03:14', '', 0),
(127, 107, 'drop_down', '0', 'fixed', '', '', 'cxv', 1, '2017-09-16 13:04:38', '', 0),
(128, 107, 'drop_down', '', 'percent', '', '', 'test', 1, '2017-09-16 13:04:38', '', 0),
(129, 107, 'drop_down', '0', 'fixed', '', '', 'vxcv', 1, '2017-09-16 13:04:38', '', 0),
(130, 108, 'drop_down', '212', 'fixed', '', '', '212', 1, '2017-09-16 13:04:38', '1', 0),
(131, 108, 'drop_down', '2121', 'fixed', '', '', '121', 1, '2017-09-16 13:04:38', '1', 0),
(132, 109, 'drop_down', '0', 'fixed', '', '', 'cxv', 1, '2017-09-16 13:05:36', '', 0),
(133, 109, 'drop_down', '', 'percent', '', '', 'test', 1, '2017-09-16 13:05:36', '', 0),
(134, 109, 'drop_down', '0', 'fixed', '', '', 'vxcv', 1, '2017-09-16 13:05:36', '', 0),
(135, 110, 'drop_down', '212', 'fixed', '', '', '212', 1, '2017-09-16 13:05:36', '1', 0),
(136, 110, 'drop_down', '111', 'fixed', '', '', '111', 1, '2017-09-16 13:05:36', '111', 0),
(137, 110, 'drop_down', '2121', 'fixed', '', '', '121', 1, '2017-09-16 13:05:36', '1', 0),
(138, 111, 'drop_down', '11', 'fixed', '', '', 't', 1, '2017-09-16 13:05:36', '', 0),
(139, 111, 'drop_down', '', 'fixed', '', '', 'e', 1, '2017-09-16 13:05:36', '', 0),
(140, 112, 'drop_down', '0', 'fixed', '', '', 'cxv', 1, '2017-09-16 13:07:10', '', 0),
(141, 112, 'drop_down', '', 'percent', '', '', 'test', 1, '2017-09-16 13:07:10', '', 0),
(142, 112, 'drop_down', '0', 'fixed', '', '', 'vxcv', 1, '2017-09-16 13:07:10', '', 0),
(143, 113, 'drop_down', '212', 'fixed', '', '', '212', 1, '2017-09-16 13:07:10', '1', 0),
(144, 113, 'drop_down', '111', 'fixed', '', '', '111', 1, '2017-09-16 13:07:10', '111', 0),
(145, 113, 'drop_down', '2121', 'fixed', '', '', '121', 1, '2017-09-16 13:07:10', '1', 0),
(146, 114, 'drop_down', '11', 'fixed', '', '', 't', 1, '2017-09-16 13:07:10', '', 0),
(147, 114, 'drop_down', '', 'fixed', '', '', 'e', 1, '2017-09-16 13:07:10', '', 0),
(148, 115, 'drop_down', '44', 'fixed', '', '', 'wer', 1, '2017-09-16 13:10:34', '4', 0),
(149, 115, 'drop_down', '44', 'fixed', '', '', 'rrwe', 1, '2017-09-16 13:10:34', '5', 0),
(150, 115, 'drop_down', '45', 'fixed', '', '', 'dfd', 1, '2017-09-16 13:10:34', '4', 0),
(151, 116, 'drop_down', '5', 'fixed', '', '', 're', 1, '2017-09-16 13:10:34', '1', 0),
(152, 116, 'drop_down', '2', 'fixed', '', '', 'sadf', 1, '2017-09-16 13:10:34', '2', 0),
(153, 116, 'drop_down', '2', 'fixed', '', '', '2', 1, '2017-09-16 13:10:34', '', 0),
(154, 117, 'drop_down', '44', 'fixed', '', '', 'wer', 1, '2017-09-16 13:10:52', '4', 0),
(155, 117, 'drop_down', '44', 'fixed', '', '', 'rrwe', 1, '2017-09-16 13:10:52', '5', 0),
(156, 118, 'drop_down', '5', 'fixed', '', '', 're', 1, '2017-09-16 13:10:52', '1', 0),
(157, 118, 'drop_down', '2', 'fixed', '', '', 'sadf', 1, '2017-09-16 13:10:52', '2', 0),
(158, 118, 'drop_down', '2', 'fixed', '', '', '2', 1, '2017-09-16 13:10:52', '', 0),
(159, 119, 'drop_down', '44', 'fixed', '', '', 'wer', 1, '2017-09-16 13:11:41', '4', 0),
(160, 120, 'drop_down', '5', 'fixed', '', '', 're', 1, '2017-09-16 13:11:41', '1', 0),
(161, 120, 'drop_down', '2', 'fixed', '', '', 'sadf', 1, '2017-09-16 13:11:41', '2', 0),
(162, 120, 'drop_down', '2', 'fixed', '', '', '2', 1, '2017-09-16 13:11:41', '', 0),
(163, 121, 'drop_down', '44', 'fixed', '', '', 'wer', 1, '2017-09-16 13:12:04', '4', 0),
(164, 122, 'drop_down', '5', 'fixed', '', '', 're', 1, '2017-09-16 13:12:04', '1', 0),
(165, 122, 'drop_down', '2', 'fixed', '', '', 'sadf', 1, '2017-09-16 13:12:04', '2', 0),
(166, 124, 'drop_down', '1', 'fixed', '', '', 'aa', 1, '2017-09-16 13:13:10', '', 0),
(167, 124, 'drop_down', '2', 'fixed', '', '', 'bb', 1, '2017-09-16 13:13:10', '', 0),
(168, 125, 'drop_down', '1', 'fixed', '', '', 'aa', 1, '2017-09-16 13:13:23', '', 0),
(169, 128, 'drop_down', '3', 'fixed', '', '', 'w', 1, '2017-09-18 04:16:06', '3', 0),
(170, 128, 'drop_down', '3', 'fixed', '', '', '3', 1, '2017-09-18 04:16:06', '3', 0),
(171, 128, 'drop_down', '6', 'fixed', '', '', 'w', 1, '2017-09-18 04:16:06', '6', 0),
(172, 128, 'drop_down', '', 'fixed', '', '', '', 1, '2017-09-18 04:16:06', '', 0),
(173, 130, 'drop_down', '3', 'fixed', '', '', 'w', 1, '2017-09-18 04:16:31', '3', 0),
(174, 132, 'drop_down', '3', 'fixed', '', '', 'w', 1, '2017-09-18 04:18:44', '3', 0),
(175, 134, 'drop_down', '3', 'fixed', '', '', 'w', 1, '2017-09-18 04:35:59', '3', 0),
(176, 136, 'drop_down', '1', 'fixed', '', '', '1', 1, '2017-09-18 05:40:31', '1', 0),
(177, 136, 'drop_down', '1', 'fixed', '', '', '2', 1, '2017-09-18 05:40:31', '2', 0),
(178, 137, 'drop_down', '12', 'fixed', '', '', '11', 1, '2017-09-18 05:40:31', '1', 0),
(179, 137, 'drop_down', '212', 'fixed', '', '', '12', 1, '2017-09-18 05:40:31', '2', 0),
(180, 138, 'drop_down', '1', 'fixed', '', '', '1', 1, '2017-09-18 05:42:46', '1', 0),
(181, 138, 'drop_down', '1', 'fixed', '', '', '2', 1, '2017-09-18 05:42:46', '2', 0),
(182, 138, 'drop_down', '12', 'fixed', '', '', '11', 1, '2017-09-18 05:42:46', '1', 0),
(183, 138, 'drop_down', '212', 'fixed', '', '', '12', 1, '2017-09-18 05:42:46', '2', 0),
(184, 140, 'drop_down', '1', 'fixed', '', '', 'aa', 1, '2017-09-18 07:00:56', '', 0),
(185, 140, 'drop_down', '1', 'fixed', '', '', 'aa', 1, '2017-09-18 07:00:56', '', 0),
(186, 141, 'drop_down', '1', 'fixed', '', '', 'aa', 1, '2017-09-18 07:01:14', '', 0),
(187, 142, 'drop_down', '4', 'fixed', '', '', 'wer', 1, '2017-09-18 09:52:20', '1', 0),
(188, 142, 'drop_down', '5', 'fixed', '', '', 'fgg', 1, '2017-09-18 09:52:20', '5', 0),
(189, 143, 'drop_down', '5', 'fixed', '', '', '5', 1, '2017-09-18 09:52:20', '5', 0),
(190, 143, 'drop_down', '5', 'fixed', '', '', '5', 1, '2017-09-18 09:52:20', '5', 0),
(191, 144, 'drop_down', '1', 'fixed', '', '', '1', 1, '2017-09-18 10:11:08', '', 0),
(192, 144, 'drop_down', '2', 'fixed', '', '', '2', 1, '2017-09-18 10:11:08', '', 0),
(193, 144, 'drop_down', '3', 'fixed', '', '', '3', 1, '2017-09-18 10:11:08', '', 0),
(194, 145, 'drop_down', '1', 'fixed', '', '', '1', 1, '2017-09-18 10:11:08', '', 0),
(195, 145, 'drop_down', '220', 'fixed', '', '', '2', 1, '2017-09-18 10:11:08', '', 0),
(196, 146, 'drop_down', '121', 'fixed', '', '', 't', 1, '2017-09-18 10:11:08', '', 0),
(197, 147, 'drop_down', '1', 'fixed', '', '', '1', 1, '2017-09-18 10:24:47', '', 0),
(198, 147, 'drop_down', '', 'fixed', '', '', '4', 1, '2017-09-18 10:24:47', '', 0),
(199, 148, 'drop_down', '1', 'fixed', '', '', '1', 1, '2017-09-18 10:24:47', '', 0),
(200, 150, 'drop_down', '1', 'fixed', '', '', '1', 1, '2017-09-18 10:25:08', '', 0),
(201, 150, 'drop_down', '', 'fixed', '', '', '4', 1, '2017-09-18 10:25:08', '', 0),
(202, 152, 'drop_down', '222', 'fixed', '', '', 'test', 1, '2017-09-18 10:35:09', '1', 0),
(203, 152, 'drop_down', '222', 'fixed', '', '', '2', 1, '2017-09-18 10:35:09', '2', 0),
(204, 153, 'drop_down', '21', 'fixed', '', '', '21', 1, '2017-09-18 10:35:09', '2121', 0),
(205, 154, 'drop_down', '2222', 'fixed', '', '', '22', 1, '2017-09-18 10:35:09', '', 0),
(206, 155, 'drop_down', '222', 'fixed', '', '', 'test', 1, '2017-09-18 10:39:19', '1', 0),
(207, 155, 'drop_down', '7777', 'fixed', '', '', '77777777', 1, '2017-09-18 10:39:19', '', 0),
(208, 155, 'drop_down', '7', 'fixed', '', '', '54', 1, '2017-09-18 10:39:19', '', 0),
(209, 155, 'drop_down', '', 'fixed', '', '', '456', 1, '2017-09-18 10:39:19', '', 0),
(210, 155, 'drop_down', '222', 'fixed', '', '', '2', 1, '2017-09-18 10:39:19', '2', 0),
(211, 156, 'drop_down', '21', 'fixed', '', '', '21', 1, '2017-09-18 10:39:19', '2121', 0),
(212, 157, 'drop_down', '2222', 'fixed', '', '', '22', 1, '2017-09-18 10:39:19', '', 0),
(213, 158, 'drop_down', '44', 'fixed', '', '', 'sdf', 1, '2017-09-18 10:50:54', '4', 0),
(214, 158, 'drop_down', '44', 'fixed', '', '', '44', 1, '2017-09-18 10:50:54', '4', 0),
(215, 158, 'drop_down', '34', 'fixed', '', '', 'sef', 1, '2017-09-18 10:50:54', '3', 0),
(216, 159, 'drop_down', '4', 'fixed', '', '', 'e', 1, '2017-09-18 10:50:54', '4', 0),
(217, 159, 'drop_down', '4', 'fixed', '', '', 'ewr', 1, '2017-09-18 10:50:54', '4', 0),
(218, 160, 'drop_down', '44', 'fixed', '', '', 'sdf', 1, '2017-09-18 10:51:07', '4', 0),
(219, 160, 'drop_down', '44', 'fixed', '', '', '44', 1, '2017-09-18 10:51:07', '4', 0),
(220, 160, 'drop_down', '34', 'fixed', '', '', 'sef', 1, '2017-09-18 10:51:07', '3', 0),
(221, 161, 'drop_down', '4', 'fixed', '', '', 'e', 1, '2017-09-18 10:51:07', '4', 0),
(222, 162, 'drop_down', '44', 'fixed', '', '', 'sdf', 1, '2017-09-18 10:51:20', '4', 0),
(223, 162, 'drop_down', '34', 'fixed', '', '', 'sef', 1, '2017-09-18 10:51:20', '3', 0),
(224, 163, 'drop_down', '4', 'fixed', '', '', 'e', 1, '2017-09-18 10:51:20', '4', 0),
(225, 164, 'drop_down', '44', 'fixed', '', '', 'sdf', 1, '2017-09-18 10:51:36', '4', 0),
(226, 164, 'drop_down', '34', 'fixed', '', '', 'sef', 1, '2017-09-18 10:51:36', '3', 0),
(227, 167, 'drop_down', '4', 'fixed', '', '', 'wer', 1, '2017-09-18 10:52:38', '4', 0),
(228, 167, 'drop_down', '34', 'fixed', '', '', '34', 1, '2017-09-18 10:52:38', '3', 0),
(229, 168, 'drop_down', '3', 'fixed', '', '', 'asd', 1, '2017-09-18 10:52:38', '', 0),
(230, 168, 'drop_down', '', 'fixed', '', '', 'wer', 1, '2017-09-18 10:52:38', '', 0),
(231, 169, 'drop_down', '4', 'fixed', '', '', 'wer', 1, '2017-09-18 10:52:38', '', 0),
(232, 170, 'drop_down', '4', 'fixed', '', '', 'wer', 1, '2017-09-18 10:52:57', '4', 0),
(233, 170, 'drop_down', '34', 'fixed', '', '', '34', 1, '2017-09-18 10:52:57', '3', 0),
(234, 171, 'drop_down', '34', 'fixed', '', '', '34', 1, '2017-09-18 10:53:07', '3', 0),
(235, 172, 'drop_down', '222', 'fixed', '', '', 'test', 1, '2017-09-18 11:49:26', '1', 0),
(236, 172, 'drop_down', '7777', 'fixed', '', '', '77777777', 1, '2017-09-18 11:49:26', '', 0),
(237, 172, 'drop_down', '7', 'fixed', '', '', '54', 1, '2017-09-18 11:49:26', '', 0),
(238, 172, 'drop_down', '', 'fixed', '', '', '456', 1, '2017-09-18 11:49:26', '', 0),
(239, 172, 'drop_down', '222', 'fixed', '', '', '2', 1, '2017-09-18 11:49:26', '2', 0),
(240, 173, 'drop_down', '21', 'fixed', '', '', '21', 1, '2017-09-18 11:49:26', '2121', 0),
(241, 174, 'drop_down', '2222', 'fixed', '', '', '22', 1, '2017-09-18 11:49:26', '', 0),
(242, 175, 'drop_down', '200', 'fixed', '', '', '10', 1, '2017-09-19 04:40:41', '2', 0),
(243, 175, 'drop_down', '300', 'fixed', '', '', '20', 1, '2017-09-19 04:40:41', '3', 0),
(244, 176, 'drop_down', '1', 'fixed', '', '', '100', 1, '2017-09-19 04:40:41', '', 0),
(245, 176, 'drop_down', '2', 'fixed', '', '', '200', 1, '2017-09-19 04:40:41', '', 0),
(246, 177, 'drop_down', '1', 'fixed', '', '', '10', 1, '2017-09-19 04:55:45', '', 0),
(247, 177, 'drop_down', '2', 'fixed', '', '', '20', 1, '2017-09-19 04:55:45', '', 0),
(248, 178, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 05:10:23', '', 0),
(249, 178, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 05:10:23', '', 0),
(250, 179, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 05:11:53', '', 0),
(251, 179, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 05:11:53', '', 0),
(252, 180, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 05:12:02', '', 0),
(253, 180, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 05:12:02', '', 0),
(254, 181, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 05:12:10', '', 0),
(255, 181, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 05:12:10', '', 0),
(256, 182, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 05:12:20', '', 0),
(257, 182, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 05:12:20', '', 0),
(258, 183, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 05:12:30', '', 0),
(259, 183, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 05:12:30', '', 0),
(260, 184, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 05:12:39', '', 0),
(261, 184, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 05:12:39', '', 0),
(262, 185, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 05:14:38', '', 0),
(263, 185, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 05:14:38', '', 0),
(264, 186, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 05:14:50', '', 0),
(265, 186, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 05:14:50', '', 0),
(266, 187, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 06:06:57', '', 0),
(267, 187, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 06:06:57', '', 0),
(268, 187, 'drop_down', '0', 'fixed', '', '', '30', 1, '2017-09-19 06:06:57', '', 0),
(269, 188, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 06:07:59', '', 0),
(270, 188, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 06:07:59', '', 0),
(271, 188, 'drop_down', '0', 'fixed', '', '', '30', 1, '2017-09-19 06:07:59', '', 0),
(272, 189, 'drop_down', '2300', 'fixed', '', '', 'yellow', 1, '2017-09-19 06:28:36', '', 0),
(273, 190, 'drop_down', '2300', 'fixed', '', '', 'yellow', 1, '2017-09-19 10:54:56', '', 0),
(274, 191, 'drop_down', '2300', 'fixed', '', '', 'yellow', 1, '2017-09-19 11:14:50', '', 0),
(275, 192, 'drop_down', '2300', 'fixed', '', '', 'yellow', 1, '2017-09-19 11:17:59', '', 0),
(276, 193, 'drop_down', '2300', 'fixed', '', '', 'yellow', 1, '2017-09-19 11:43:34', '', 0),
(277, 194, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 11:43:50', '', 0),
(278, 194, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 11:43:50', '', 0),
(279, 194, 'drop_down', '0', 'fixed', '', '', '30', 1, '2017-09-19 11:43:50', '', 0),
(280, 195, 'drop_down', '0', 'fixed', '', '', '10', 1, '2017-09-19 11:44:03', '', 0),
(281, 195, 'drop_down', '0', 'fixed', '', '', '20', 1, '2017-09-19 11:44:03', '', 0),
(282, 195, 'drop_down', '0', 'fixed', '', '', '30', 1, '2017-09-19 11:44:03', '', 0),
(283, 196, 'drop_down', '100', 'fixed', '', '', '10', 1, '2017-09-21 06:47:41', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `follower`
--

CREATE TABLE IF NOT EXISTS `follower` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `follower`
--

INSERT INTO `follower` (`id`, `seller_id`, `user_id`, `added_on`, `status`) VALUES
(22, 0, 14, '2017-09-02 06:47:03', 1),
(37, 60, 69, '2017-09-13 09:23:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notify_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `url` tinyint(4) NOT NULL,
  `notify_type` tinyint(4) NOT NULL COMMENT '1 for  new seller, 2 for new order ,3 for new sale ',
  `user_type` varchar(50) NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=267 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notify_user_id`, `user_id`, `product_id`, `msg`, `url`, `notify_type`, `user_type`, `is_read`, `status`, `added_on`, `updated_on`) VALUES
(1, 1, 12, 0, 'yrdy  would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-08-30 15:12:00', '0000-00-00 00:00:00'),
(2, 1, 5, 0, 'you have Get  new orders  <strong>#ORD1023220274</strong> ', 0, 2, '', 0, 0, '2017-08-31 15:37:51', '0000-00-00 00:00:00'),
(3, 1, 5, 0, 'you have Get  new orders  <strong>#ORD1375935923</strong> ', 0, 2, '', 0, 0, '2017-08-31 15:46:25', '0000-00-00 00:00:00'),
(4, 1, 5, 0, 'you have Get  new orders  <strong>#ORD817645000</strong> ', 0, 2, '', 0, 0, '2017-08-31 15:48:15', '0000-00-00 00:00:00'),
(5, 1, 5, 0, 'you have Get  new orders  <strong>#ORD648649726</strong> ', 0, 2, '', 0, 0, '2017-08-31 17:26:05', '0000-00-00 00:00:00'),
(12, 1, 14, 0, 'you have Get  new orders  <strong>#ORD1733175022</strong> ', 0, 2, '', 0, 0, '2017-09-02 14:21:26', '0000-00-00 00:00:00'),
(7, 1, 13, 0, 'you have Get  new orders  <strong>#ORD1309856882</strong> ', 0, 2, '', 0, 0, '2017-09-01 14:33:27', '0000-00-00 00:00:00'),
(11, 1, 14, 0, 'you have Get  new orders  <strong>#ORD1503394690</strong> ', 0, 2, '', 0, 0, '2017-09-02 14:17:44', '0000-00-00 00:00:00'),
(10, 1, 14, 0, 'you have Get  new orders  <strong>#ORD1183814630</strong> ', 0, 2, '', 0, 0, '2017-09-01 16:10:08', '0000-00-00 00:00:00'),
(13, 1, 17, 0, '<strong>                          Sheetaltest</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-02 14:47:29', '0000-00-00 00:00:00'),
(14, 1, 18, 0, 'you have Get  new orders  <strong>#ORD638004665</strong> ', 0, 2, '', 0, 0, '2017-09-02 17:22:28', '0000-00-00 00:00:00'),
(15, 1, 24, 0, 'you have Get  new orders  <strong>#ORD1500267607</strong> ', 0, 2, '', 0, 0, '2017-09-04 12:42:46', '0000-00-00 00:00:00'),
(16, 1, 28, 0, '<strong>Sheetal</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-04 14:33:16', '0000-00-00 00:00:00'),
(17, 1, 29, 0, 'you have Get  new orders  <strong>#ORD298490613</strong> ', 0, 2, '', 0, 0, '2017-09-04 14:51:18', '0000-00-00 00:00:00'),
(18, 1, 4, 0, 'you have Get  new orders  <strong>#ORD1584946586</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-04 15:06:24', '0000-00-00 00:00:00'),
(19, 1, 29, 0, 'you have Get  new orders  <strong>#ORD474165627</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-04 17:10:37', '0000-00-00 00:00:00'),
(20, 1, 29, 0, 'you have Get  new orders  <strong>#ORD1794879284</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-04 17:16:10', '0000-00-00 00:00:00'),
(21, 1, 29, 0, 'you have Get  new orders  <strong>#ORD21495414</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-05 12:31:30', '0000-00-00 00:00:00'),
(22, 1, 29, 0, 'you have Get  new orders  <strong>#ORD830892937</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-05 14:52:48', '0000-00-00 00:00:00'),
(23, 1, 53, 0, '<strong>Nidhi</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-05 15:18:18', '0000-00-00 00:00:00'),
(24, 1, 29, 0, 'you have Get  new orders  <strong>#ORD582508419</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-05 15:55:33', '0000-00-00 00:00:00'),
(25, 1, 55, 0, '<strong>Seller-test</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-05 16:14:20', '0000-00-00 00:00:00'),
(26, 1, 56, 0, '<strong>Nidhi</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-05 16:14:26', '0000-00-00 00:00:00'),
(27, 1, 57, 0, '<strong>Sneha-test</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-05 16:19:23', '0000-00-00 00:00:00'),
(28, 1, 58, 0, '<strong>Nishi</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-05 17:22:18', '0000-00-00 00:00:00'),
(29, 1, 59, 0, '<strong>Shubham</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-05 18:11:07', '0000-00-00 00:00:00'),
(30, 1, 57, 0, 'you have Get  new orders  <strong>#ORD266251352</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-05 18:22:04', '0000-00-00 00:00:00'),
(31, 1, 60, 0, '<strong>Hhh</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-05 18:28:23', '0000-00-00 00:00:00'),
(32, 1, 57, 0, 'you have Get  new orders  <strong>#ORD141504172</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-05 18:36:42', '0000-00-00 00:00:00'),
(33, 4, 57, 0, 'you have Get  new orders  <strong>#ORD1419019503</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-05 18:39:20', '0000-00-00 00:00:00'),
(34, 56, 4, 0, 'you have Get  new orders  <strong>#ORD1257996416</strong> ', 0, 2, 'Seller', 0, 0, '2017-09-06 11:47:14', '0000-00-00 00:00:00'),
(35, 1, 61, 0, 'you have Get  new orders  <strong>#ORD415473013</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-06 12:32:52', '0000-00-00 00:00:00'),
(36, 1, 14, 0, 'you have Get  new orders  <strong>#ORD638165343</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-06 14:19:58', '0000-00-00 00:00:00'),
(37, 1, 14, 0, 'you have Get  new orders  <strong>#ORD1143086549</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-06 14:20:03', '0000-00-00 00:00:00'),
(38, 1, 14, 0, 'you have Get  new orders  <strong>#ORD2090293534</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-06 14:20:03', '0000-00-00 00:00:00'),
(39, 1, 14, 0, 'you have Get  new orders  <strong>#ORD346997378</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-06 14:20:12', '0000-00-00 00:00:00'),
(40, 1, 14, 0, 'you have Get  new orders  <strong>#ORD321022865</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-06 14:20:39', '0000-00-00 00:00:00'),
(41, 1, 14, 0, 'you have Get  new orders  <strong>#ORD1051694350</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-06 14:22:35', '0000-00-00 00:00:00'),
(42, 1, 14, 0, 'you have Get  new orders  <strong>#ORD1391774037</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-06 14:27:50', '0000-00-00 00:00:00'),
(43, 1, 14, 0, 'you have Get  new orders  <strong>#ORD1602273921</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-06 14:30:42', '0000-00-00 00:00:00'),
(44, 4, 14, 0, 'you have Get  new orders  <strong>#ORD24582490</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 15:04:06', '0000-00-00 00:00:00'),
(45, 1, 14, 0, 'you have Get  new orders  <strong>#ORD1888654464</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-06 15:04:06', '0000-00-00 00:00:00'),
(46, 4, 14, 0, 'you have Get  new orders  <strong>#ORD1272622622</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 15:04:06', '0000-00-00 00:00:00'),
(47, 1, 14, 0, 'you have Get  new orders  <strong>#ORD1350527920</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-06 15:04:07', '0000-00-00 00:00:00'),
(48, 4, 14, 0, 'you have Get  new orders  <strong>#ORD1217224775</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 15:04:07', '0000-00-00 00:00:00'),
(49, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1497104208</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 17:05:47', '0000-00-00 00:00:00'),
(50, 4, 61, 0, 'you have Get  new orders  <strong>#ORD243074193</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 17:21:59', '0000-00-00 00:00:00'),
(51, 4, 61, 0, 'you have Get  new orders  <strong>#ORD2102450038</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 17:27:12', '0000-00-00 00:00:00'),
(52, 4, 57, 0, 'you have Get  new orders  <strong>#ORD625048162</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 17:39:18', '0000-00-00 00:00:00'),
(53, 4, 57, 0, 'you have Get  new orders  <strong>#ORD873245979</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 17:39:19', '0000-00-00 00:00:00'),
(54, 4, 57, 0, 'you have Get  new orders  <strong>#ORD315591242</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 17:39:30', '0000-00-00 00:00:00'),
(55, 4, 57, 0, 'you have Get  new orders  <strong>#ORD1340119521</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 17:59:45', '0000-00-00 00:00:00'),
(56, 4, 57, 0, 'you have Get  new orders  <strong>#ORD633235395</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 18:00:30', '0000-00-00 00:00:00'),
(57, 4, 57, 0, 'you have Get  new orders  <strong>#ORD1794943792</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 18:03:13', '0000-00-00 00:00:00'),
(58, 4, 57, 0, 'you have Get  new orders  <strong>#ORD660363247</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 18:04:08', '0000-00-00 00:00:00'),
(59, 4, 14, 0, 'you have Get  new orders  <strong>#ORD973486845</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 18:27:17', '0000-00-00 00:00:00'),
(60, 4, 61, 0, 'you have Get  new orders  <strong>#ORD113043734</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-06 19:01:41', '0000-00-00 00:00:00'),
(61, 4, 61, 0, 'you have Get  new orders  <strong>#ORD428684506</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-07 13:02:14', '0000-00-00 00:00:00'),
(62, 4, 61, 0, 'you have Get  new orders  <strong>#ORD378620836</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-07 14:20:18', '0000-00-00 00:00:00'),
(63, 4, 61, 0, 'you have Get  new orders  <strong>#ORD553255611</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-07 14:23:31', '0000-00-00 00:00:00'),
(64, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1191572214</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-07 15:29:50', '0000-00-00 00:00:00'),
(65, 1, 61, 0, 'you have Get  new orders  <strong>#ORD295554129</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-07 15:29:50', '0000-00-00 00:00:00'),
(66, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1077809914</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-07 15:31:48', '0000-00-00 00:00:00'),
(67, 1, 61, 0, 'you have Get  new orders  <strong>#ORD314732741</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-07 15:31:49', '0000-00-00 00:00:00'),
(68, 4, 4, 0, 'you have Get  new orders  <strong>#ORD718128890</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-08 11:22:34', '0000-00-00 00:00:00'),
(69, 1, 4, 0, 'you have Get  new orders  <strong>#ORD1371027198</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-08 11:22:34', '0000-00-00 00:00:00'),
(70, 1, 4, 0, 'you have Get  new orders  <strong>#ORD1001270348</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-08 11:22:34', '0000-00-00 00:00:00'),
(71, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1267018233</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-08 13:40:08', '0000-00-00 00:00:00'),
(72, 1, 61, 0, 'you have Get  new orders  <strong>#ORD73832323</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-08 13:56:05', '0000-00-00 00:00:00'),
(73, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1290183111</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-08 14:02:54', '0000-00-00 00:00:00'),
(74, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1096350778</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-08 14:03:33', '0000-00-00 00:00:00'),
(75, 17, 61, 0, 'you have Get  new orders  <strong>#ORD1621597361</strong> ', 0, 2, 'Seller', 0, 0, '2017-09-09 10:07:11', '0000-00-00 00:00:00'),
(76, 4, 4, 0, 'you have Get  new orders  <strong>#ORD1470234721</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-09 11:32:00', '0000-00-00 00:00:00'),
(77, 4, 4, 0, 'you have Get  new orders  <strong>#ORD1420443698</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-09 11:32:00', '0000-00-00 00:00:00'),
(78, 1, 4, 0, 'you have Get  new orders  <strong>#</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-09 18:21:40', '0000-00-00 00:00:00'),
(79, 1, 61, 0, 'your Order No. <strong>#</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-09 18:26:07', '0000-00-00 00:00:00'),
(80, 1, 4, 0, 'your Order No. <strong>#ORD1001270348</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-09 18:55:29', '0000-00-00 00:00:00'),
(81, 1, 4, 0, 'your Order No. <strong>#ORD1371027198</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-09 18:57:03', '0000-00-00 00:00:00'),
(82, 1, 4, 0, 'your Order No. <strong>#ORD718128890</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-09 19:01:34', '0000-00-00 00:00:00'),
(83, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1940624119</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-11 10:46:19', '0000-00-00 00:00:00'),
(84, 4, 61, 0, 'you have Get  new orders  <strong>#ORD73229098</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-11 10:48:32', '0000-00-00 00:00:00'),
(85, 1, 65, 0, '<strong>Manisha</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-11 14:15:15', '0000-00-00 00:00:00'),
(86, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1461435932</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-11 16:07:46', '0000-00-00 00:00:00'),
(87, 1, 61, 0, 'your Order No. <strong>#ORD1461435932</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-11 16:08:32', '0000-00-00 00:00:00'),
(88, 4, 61, 0, 'you have Get  new orders  <strong>#ORD514256519</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-11 16:24:57', '0000-00-00 00:00:00'),
(89, 1, 61, 0, 'your Order No. <strong>#ORD514256519</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-11 16:25:30', '0000-00-00 00:00:00'),
(90, 1, 61, 0, 'you have Get  new orders  <strong>#ORD305056794</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-11 17:57:08', '0000-00-00 00:00:00'),
(91, 1, 61, 0, 'your Order No. <strong>#ORD305056794</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-11 17:57:53', '0000-00-00 00:00:00'),
(92, 1, 14, 0, 'you have Get  new orders  <strong>#ORD119493862</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-12 12:37:25', '0000-00-00 00:00:00'),
(93, 60, 14, 0, 'you have Get  new orders  <strong>#ORD910094137</strong> ', 0, 2, 'Seller', 0, 0, '2017-09-12 12:37:25', '0000-00-00 00:00:00'),
(94, 60, 14, 0, 'you have Get  new orders  <strong>#ORD1987419684</strong> ', 0, 2, 'Seller', 0, 0, '2017-09-12 12:37:25', '0000-00-00 00:00:00'),
(95, 4, 14, 0, 'you have Get  new orders  <strong>#ORD294122380</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-12 12:37:25', '0000-00-00 00:00:00'),
(96, 1, 14, 0, 'you have Get  new orders  <strong>#ORD309684108</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-12 12:37:25', '0000-00-00 00:00:00'),
(97, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1742026623</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-12 13:39:02', '0000-00-00 00:00:00'),
(98, 1, 61, 0, 'you have Get  new orders  <strong>#ORD540316510</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-12 13:39:04', '0000-00-00 00:00:00'),
(99, 4, 61, 0, 'you have Get  new orders  <strong>#ORD274280691</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-12 13:39:05', '0000-00-00 00:00:00'),
(100, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1377734802</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-12 13:39:05', '0000-00-00 00:00:00'),
(101, 1, 61, 0, 'you have Get  new orders  <strong>#ORD552289602</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-12 14:17:15', '0000-00-00 00:00:00'),
(102, 1, 61, 0, 'your Order No. <strong>#ORD552289602</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-12 14:20:56', '0000-00-00 00:00:00'),
(103, 1, 61, 0, 'you have Get  new orders  <strong>#ORD68441976</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-12 14:24:24', '0000-00-00 00:00:00'),
(104, 1, 61, 0, 'you have Get  new orders  <strong>#ORD344125712</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-12 14:27:14', '0000-00-00 00:00:00'),
(105, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1706054771</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-12 14:30:41', '0000-00-00 00:00:00'),
(106, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1163489342</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-12 14:48:53', '0000-00-00 00:00:00'),
(107, 1, 61, 0, 'your Order No. <strong>#ORD1163489342</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-12 15:11:27', '0000-00-00 00:00:00'),
(108, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1445126711</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-12 15:49:58', '0000-00-00 00:00:00'),
(109, 1, 57, 0, 'your Order No. <strong>#ORD633235395</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-12 17:31:26', '0000-00-00 00:00:00'),
(110, 1, 57, 0, 'your Order No. <strong>#ORD1340119521</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-12 17:31:29', '0000-00-00 00:00:00'),
(111, 1, 57, 0, 'your Order No. <strong>#ORD315591242</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-12 17:31:32', '0000-00-00 00:00:00'),
(112, 1, 57, 0, 'your Order No. <strong>#ORD625048162</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-12 17:31:36', '0000-00-00 00:00:00'),
(113, 1, 57, 0, 'your Order No. <strong>#ORD873245979</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-12 17:31:40', '0000-00-00 00:00:00'),
(114, 1, 61, 0, 'your Order No. <strong>#ORD1445126711</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 09:49:13', '0000-00-00 00:00:00'),
(115, 4, 61, 0, 'you have Get  new orders  <strong>#ORD326510129</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-13 10:04:27', '0000-00-00 00:00:00'),
(116, 4, 61, 0, 'you have Get  new orders  <strong>#ORD882924858</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-13 10:04:27', '0000-00-00 00:00:00'),
(117, 1, 66, 0, '<strong>Test</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-13 10:16:05', '0000-00-00 00:00:00'),
(118, 1, 68, 0, '<strong>Sheetal</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-13 10:31:05', '0000-00-00 00:00:00'),
(119, 4, 67, 0, 'you have Get  new orders  <strong>#ORD1006356029</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-13 10:38:22', '0000-00-00 00:00:00'),
(120, 4, 68, 0, 'you have Get  new orders  <strong>#ORD1674023863</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-13 11:02:53', '0000-00-00 00:00:00'),
(121, 1, 61, 0, 'you have Get  new orders  <strong>#ORD27894860</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-13 15:02:48', '0000-00-00 00:00:00'),
(122, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1570146041</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-13 15:05:59', '0000-00-00 00:00:00'),
(123, 1, 61, 0, 'you have Get  new orders  <strong>#ORD46779664</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-13 15:06:00', '0000-00-00 00:00:00'),
(124, 1, 69, 0, 'you have Get  new orders  <strong>#ORD25799299</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:04:20', '0000-00-00 00:00:00'),
(125, 1, 69, 0, 'you have Get  new orders  <strong>#ORD788913075</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:04:20', '0000-00-00 00:00:00'),
(126, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:16:02', '0000-00-00 00:00:00'),
(127, 1, 69, 0, 'your Order No. <strong>#ORD25799299</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:18:34', '0000-00-00 00:00:00'),
(128, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:22:01', '0000-00-00 00:00:00'),
(129, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:27:58', '0000-00-00 00:00:00'),
(130, 1, 69, 0, 'your Order No. <strong>#ORD25799299</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:28:16', '0000-00-00 00:00:00'),
(131, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:29:31', '0000-00-00 00:00:00'),
(132, 1, 69, 0, 'your Order No. <strong>#ORD25799299</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:30:25', '0000-00-00 00:00:00'),
(133, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:32:11', '0000-00-00 00:00:00'),
(134, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:34:07', '0000-00-00 00:00:00'),
(135, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:34:50', '0000-00-00 00:00:00'),
(136, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:37:25', '0000-00-00 00:00:00'),
(137, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:39:35', '0000-00-00 00:00:00'),
(138, 1, 69, 0, 'your Order No. <strong>#ORD25799299</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:40:32', '0000-00-00 00:00:00'),
(139, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:41:21', '0000-00-00 00:00:00'),
(140, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:41:58', '0000-00-00 00:00:00'),
(141, 1, 61, 0, 'your Order No. <strong>#ORD46779664</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:44:31', '0000-00-00 00:00:00'),
(142, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1303236412</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-13 16:48:29', '0000-00-00 00:00:00'),
(143, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 19:19:41', '0000-00-00 00:00:00'),
(144, 1, 69, 0, 'your Order No. <strong>#ORD25799299</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 19:26:15', '0000-00-00 00:00:00'),
(145, 1, 69, 0, 'your Order No. <strong>#ORD788913075</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-13 19:33:07', '0000-00-00 00:00:00'),
(146, 1, 61, 0, 'you have Get  new orders  <strong>#ORD560479919</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-14 10:13:48', '0000-00-00 00:00:00'),
(147, 4, 68, 0, 'you have Get  new orders  <strong>#ORD1420580331</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-14 10:20:27', '0000-00-00 00:00:00'),
(148, 1, 61, 0, 'your Order No. <strong>#ORD560479919</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-14 10:32:11', '0000-00-00 00:00:00'),
(149, 60, 4, 0, 'you have Get  new orders  <strong>#ORD1861220287</strong> ', 0, 2, 'Seller', 0, 0, '2017-09-14 10:41:20', '0000-00-00 00:00:00'),
(150, 60, 4, 0, 'you have Get  new orders  <strong>#ORD827106586</strong> ', 0, 2, 'Seller', 0, 0, '2017-09-14 10:41:20', '0000-00-00 00:00:00'),
(151, 1, 68, 0, 'you have Get  new orders  <strong>#ORD154701459</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-14 10:57:27', '0000-00-00 00:00:00'),
(152, 1, 68, 0, 'your Order No. <strong>#ORD154701459</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-14 10:59:10', '0000-00-00 00:00:00'),
(153, 1, 57, 0, 'you have Get  new orders  <strong>#ORD349854023</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-14 12:00:52', '0000-00-00 00:00:00'),
(154, 4, 57, 0, 'you have Get  new orders  <strong>#ORD34127760</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-14 12:00:52', '0000-00-00 00:00:00'),
(155, 1, 61, 0, 'you have Get  new orders  <strong>#ORD117015026</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-14 12:30:47', '0000-00-00 00:00:00'),
(156, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1890488467</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-14 12:33:53', '0000-00-00 00:00:00'),
(157, 1, 67, 0, 'you have Get  new orders  <strong>#ORD1814947495</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-14 13:03:19', '0000-00-00 00:00:00'),
(158, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1577951937</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-14 16:27:08', '0000-00-00 00:00:00'),
(159, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1613249446</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-14 16:30:03', '0000-00-00 00:00:00'),
(160, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1378979346</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-15 11:15:58', '0000-00-00 00:00:00'),
(161, 68, 61, 0, 'you have Get  new orders  <strong>#ORD1562920376</strong> ', 0, 2, 'Seller', 0, 0, '2017-09-15 11:18:53', '0000-00-00 00:00:00'),
(162, 68, 68, 0, 'you have Get  new orders  <strong>#ORD1292710094</strong> ', 0, 2, 'Seller', 0, 0, '2017-09-15 11:34:59', '0000-00-00 00:00:00'),
(163, 1, 70, 0, '<strong>Sheetal</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-15 12:32:41', '0000-00-00 00:00:00'),
(164, 70, 57, 0, 'you have Get  new orders  <strong>#ORD2036872943</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-15 15:45:46', '0000-00-00 00:00:00'),
(165, 1, 57, 0, 'you have Get  new orders  <strong>#ORD1422781262</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-15 15:46:39', '0000-00-00 00:00:00'),
(166, 1, 57, 0, 'your Order No. <strong>#ORD1422781262</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-15 15:47:33', '0000-00-00 00:00:00'),
(167, 4, 70, 0, 'you have Get  new orders  <strong>#ORD583565241</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-15 15:52:45', '0000-00-00 00:00:00'),
(168, 4, 57, 0, 'you have Get  new orders  <strong>#ORD832784209</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-15 17:09:15', '0000-00-00 00:00:00'),
(169, 1, 57, 0, 'you have Get  new orders  <strong>#ORD1952695652</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-15 17:09:15', '0000-00-00 00:00:00'),
(170, 70, 57, 0, 'you have Get  new orders  <strong>#ORD74173193</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-15 17:12:25', '0000-00-00 00:00:00'),
(171, 1, 57, 0, 'you have Get  new orders  <strong>#ORD976865837</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-15 17:14:14', '0000-00-00 00:00:00'),
(172, 4, 57, 0, 'you have Get  new orders  <strong>#ORD2063425067</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-15 17:34:39', '0000-00-00 00:00:00'),
(173, 4, 57, 0, 'you have Get  new orders  <strong>#ORD1069649859</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-15 17:35:41', '0000-00-00 00:00:00'),
(174, 1, 57, 0, 'your Order No. <strong>#ORD1069649859</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-15 17:46:03', '0000-00-00 00:00:00'),
(175, 1, 57, 0, 'your Order No. <strong>#ORD2063425067</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-15 17:52:19', '0000-00-00 00:00:00'),
(176, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1677840963</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-15 18:11:25', '0000-00-00 00:00:00'),
(177, 1, 61, 0, 'your Order No. <strong>#ORD1677840963</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-15 18:29:54', '0000-00-00 00:00:00'),
(178, 70, 57, 0, 'you have Get  new orders  <strong>#ORD58790384</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 11:05:45', '0000-00-00 00:00:00'),
(179, 1, 57, 0, 'you have Get  new orders  <strong>#ORD1287770320</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-16 11:06:44', '0000-00-00 00:00:00'),
(180, 1, 57, 0, 'you have Get  new orders  <strong>#ORD629568589</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-16 11:09:00', '0000-00-00 00:00:00'),
(181, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1045845910</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 12:00:53', '0000-00-00 00:00:00'),
(182, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1376991548</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 12:00:53', '0000-00-00 00:00:00'),
(183, 4, 61, 0, 'you have Get  new orders  <strong>#ORD609902106</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 12:00:53', '0000-00-00 00:00:00'),
(184, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1147624572</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 12:00:54', '0000-00-00 00:00:00'),
(185, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1861280971</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 12:00:54', '0000-00-00 00:00:00'),
(186, 4, 61, 0, 'you have Get  new orders  <strong>#ORD226108838</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 12:00:54', '0000-00-00 00:00:00'),
(187, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1103330117</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 12:00:54', '0000-00-00 00:00:00'),
(188, 4, 61, 0, 'you have Get  new orders  <strong>#ORD861677880</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 13:35:46', '0000-00-00 00:00:00'),
(189, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1099036715</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 13:48:46', '0000-00-00 00:00:00'),
(190, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1472638970</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-16 13:50:04', '0000-00-00 00:00:00'),
(191, 1, 71, 0, '<strong>Sneha</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-16 17:08:01', '0000-00-00 00:00:00'),
(192, 1, 61, 0, 'you have Get  new orders  <strong>#ORD1193102025</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-16 17:52:38', '0000-00-00 00:00:00'),
(193, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1123919325</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 17:54:02', '0000-00-00 00:00:00'),
(194, 4, 61, 0, 'you have Get  new orders  <strong>#ORD122465416</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 17:55:09', '0000-00-00 00:00:00'),
(195, 1, 4, 0, 'you have Get  new orders  <strong>#ORD609936914</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-16 18:20:35', '0000-00-00 00:00:00'),
(196, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1951850697</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-16 18:24:45', '0000-00-00 00:00:00'),
(197, 4, 4, 0, 'you have Get  new orders  <strong>#ORD462378873</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-18 11:23:09', '0000-00-00 00:00:00'),
(198, 4, 57, 0, 'you have Get  new orders  <strong>#ORD930687422</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-18 11:30:41', '0000-00-00 00:00:00'),
(199, 1, 72, 0, '<strong>Sneha</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-18 11:51:09', '0000-00-00 00:00:00'),
(200, 1, 73, 0, '<strong>Nidhi</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-18 12:07:56', '0000-00-00 00:00:00'),
(201, 1, 74, 0, '<strong>Nidhi</strong> would like to become Seller!', 0, 1, 'Admin', 1, 0, '2017-09-18 12:12:33', '0000-00-00 00:00:00'),
(202, 4, 61, 0, 'you have Get  new orders  <strong>#ORD991760786</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-18 17:42:43', '0000-00-00 00:00:00'),
(203, 1, 61, 0, 'your Order No. <strong>#ORD991760786</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-18 17:43:54', '0000-00-00 00:00:00'),
(204, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1540010545</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-18 17:47:12', '0000-00-00 00:00:00'),
(205, 1, 61, 0, 'your Order No. <strong>#ORD1540010545</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-18 17:47:48', '0000-00-00 00:00:00'),
(206, 1, 57, 0, 'you have Get  new orders  <strong>#ORD1940635579</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-18 17:54:25', '0000-00-00 00:00:00'),
(207, 4, 57, 0, 'you have Get  new orders  <strong>#ORD1983111468</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-18 17:55:26', '0000-00-00 00:00:00'),
(208, 1, 57, 0, 'your Order No. <strong>#ORD1983111468</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-18 17:56:23', '0000-00-00 00:00:00'),
(209, 1, 57, 0, 'your Order No. <strong>#ORD1940635579</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-18 17:58:37', '0000-00-00 00:00:00'),
(210, 4, 61, 0, 'you have Get  new orders  <strong>#ORD846911688</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-18 18:05:58', '0000-00-00 00:00:00'),
(211, 1, 61, 0, 'your Order No. <strong>#ORD846911688</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-18 18:07:49', '0000-00-00 00:00:00'),
(212, 4, 57, 0, 'you have Get  new orders  <strong>#ORD342924344</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-18 18:37:23', '0000-00-00 00:00:00'),
(213, 1, 57, 0, 'your Order No. <strong>#ORD342924344</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-18 18:43:18', '0000-00-00 00:00:00'),
(214, 1, 57, 0, 'your Order No. <strong>#ORD58790384</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-18 19:03:17', '0000-00-00 00:00:00'),
(215, 1, 61, 0, 'you have Get  new orders  <strong>#ORD428642486</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-19 09:59:49', '0000-00-00 00:00:00'),
(216, 1, 61, 0, 'your Order No. <strong>#ORD428642486</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-19 10:02:46', '0000-00-00 00:00:00'),
(217, 4, 57, 0, 'you have Get  new orders  <strong>#ORD241994682</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-19 17:50:34', '0000-00-00 00:00:00'),
(218, 1, 57, 0, 'your Order No. <strong>#ORD241994682</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-19 17:51:26', '0000-00-00 00:00:00'),
(219, 1, 57, 0, 'your Order No. <strong>#ORD241994682</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-19 18:00:29', '0000-00-00 00:00:00'),
(220, 1, 57, 0, 'your Order No. <strong>#ORD241994682</strong> is canceled ', 0, 2, 'Admin', 1, 0, '2017-09-19 18:03:50', '0000-00-00 00:00:00'),
(221, 0, 57, 0, 'your Order No. <strong>#ORD241994682</strong> is canceled ', 0, 2, 'Seller', 0, 0, '2017-09-19 18:04:26', '0000-00-00 00:00:00'),
(222, 0, 57, 0, 'your Order No. <strong>#ORD241994682</strong> is canceled ', 0, 2, 'Seller', 0, 0, '2017-09-19 18:04:31', '0000-00-00 00:00:00'),
(223, 0, 57, 0, 'your Order No. <strong>#ORD241994682</strong> is canceled ', 0, 2, 'Seller', 0, 0, '2017-09-19 18:05:01', '0000-00-00 00:00:00'),
(224, 0, 57, 0, 'your Order No. <strong>#ORD241994682</strong> is canceled ', 0, 2, 'Seller', 0, 0, '2017-09-19 18:06:08', '0000-00-00 00:00:00'),
(225, 4, 57, 0, 'your Order No. <strong>#ORD241994682</strong> is canceled ', 0, 2, 'Seller', 1, 0, '2017-09-19 18:15:57', '0000-00-00 00:00:00'),
(226, 1, 67, 0, 'you have Get  new orders  <strong>#ORD622845483</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:27', '0000-00-00 00:00:00'),
(227, 4, 67, 0, 'you have Get  new orders  <strong>#ORD1961815177</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:22:27', '0000-00-00 00:00:00'),
(228, 1, 67, 0, 'you have Get  new orders  <strong>#ORD1371862983</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:27', '0000-00-00 00:00:00'),
(229, 1, 67, 0, 'you have Get  new orders  <strong>#ORD64899078</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:28', '0000-00-00 00:00:00'),
(230, 4, 67, 0, 'you have Get  new orders  <strong>#ORD677963929</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:22:28', '0000-00-00 00:00:00'),
(231, 1, 67, 0, 'you have Get  new orders  <strong>#ORD423489053</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:28', '0000-00-00 00:00:00'),
(232, 1, 67, 0, 'you have Get  new orders  <strong>#ORD1781516474</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:28', '0000-00-00 00:00:00'),
(233, 4, 67, 0, 'you have Get  new orders  <strong>#ORD1750964627</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:22:29', '0000-00-00 00:00:00'),
(234, 1, 67, 0, 'you have Get  new orders  <strong>#ORD1621277774</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:29', '0000-00-00 00:00:00'),
(235, 1, 67, 0, 'you have Get  new orders  <strong>#ORD122546958</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:29', '0000-00-00 00:00:00'),
(236, 4, 67, 0, 'you have Get  new orders  <strong>#ORD633299794</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:22:29', '0000-00-00 00:00:00'),
(237, 1, 67, 0, 'you have Get  new orders  <strong>#ORD1068740282</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:30', '0000-00-00 00:00:00'),
(238, 1, 67, 0, 'you have Get  new orders  <strong>#ORD972007581</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:30', '0000-00-00 00:00:00'),
(239, 4, 67, 0, 'you have Get  new orders  <strong>#ORD1320459454</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:22:30', '0000-00-00 00:00:00'),
(240, 1, 67, 0, 'you have Get  new orders  <strong>#ORD319584871</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:30', '0000-00-00 00:00:00'),
(241, 1, 67, 0, 'you have Get  new orders  <strong>#ORD1425673553</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:30', '0000-00-00 00:00:00'),
(242, 4, 67, 0, 'you have Get  new orders  <strong>#ORD1656338692</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:22:30', '0000-00-00 00:00:00'),
(243, 1, 67, 0, 'you have Get  new orders  <strong>#ORD940889068</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:31', '0000-00-00 00:00:00'),
(244, 1, 67, 0, 'you have Get  new orders  <strong>#ORD1360062451</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:31', '0000-00-00 00:00:00'),
(245, 4, 67, 0, 'you have Get  new orders  <strong>#ORD967055272</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:22:31', '0000-00-00 00:00:00'),
(246, 1, 67, 0, 'you have Get  new orders  <strong>#ORD416040464</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:31', '0000-00-00 00:00:00'),
(247, 1, 67, 0, 'you have Get  new orders  <strong>#ORD460107999</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:31', '0000-00-00 00:00:00'),
(248, 4, 67, 0, 'you have Get  new orders  <strong>#ORD875636128</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:22:31', '0000-00-00 00:00:00'),
(249, 1, 67, 0, 'you have Get  new orders  <strong>#ORD1615834790</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:31', '0000-00-00 00:00:00'),
(250, 1, 67, 0, 'you have Get  new orders  <strong>#ORD1329091338</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:32', '0000-00-00 00:00:00'),
(251, 4, 67, 0, 'you have Get  new orders  <strong>#ORD957049115</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:22:32', '0000-00-00 00:00:00'),
(252, 1, 67, 0, 'you have Get  new orders  <strong>#ORD1414291062</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:32', '0000-00-00 00:00:00'),
(253, 1, 67, 0, 'you have Get  new orders  <strong>#ORD678530477</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:32', '0000-00-00 00:00:00'),
(254, 4, 67, 0, 'you have Get  new orders  <strong>#ORD1089630280</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:22:32', '0000-00-00 00:00:00'),
(255, 1, 67, 0, 'you have Get  new orders  <strong>#ORD984335340</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:32', '0000-00-00 00:00:00'),
(256, 1, 67, 0, 'you have Get  new orders  <strong>#ORD407840672</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:32', '0000-00-00 00:00:00'),
(257, 4, 67, 0, 'you have Get  new orders  <strong>#ORD1645823256</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:22:33', '0000-00-00 00:00:00'),
(258, 1, 67, 0, 'you have Get  new orders  <strong>#ORD2060461930</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:33', '0000-00-00 00:00:00'),
(259, 1, 67, 0, 'you have Get  new orders  <strong>#ORD1271153990</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:33', '0000-00-00 00:00:00'),
(260, 4, 67, 0, 'you have Get  new orders  <strong>#ORD2010827006</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:22:33', '0000-00-00 00:00:00'),
(261, 1, 67, 0, 'you have Get  new orders  <strong>#ORD83253426</strong> ', 0, 2, 'Admin', 1, 0, '2017-09-20 18:22:33', '0000-00-00 00:00:00'),
(262, 70, 67, 0, 'you have Get  new orders  <strong>#ORD1335130783</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-20 18:47:56', '0000-00-00 00:00:00'),
(263, 4, 61, 0, 'you have Get  new orders  <strong>#ORD1107942900</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-21 16:53:30', '0000-00-00 00:00:00'),
(264, 4, 61, 0, 'your Order No. <strong>#ORD1107942900</strong> is canceled ', 0, 2, 'Seller', 1, 0, '2017-09-21 16:54:48', '0000-00-00 00:00:00'),
(265, 4, 70, 0, 'you have Get  new orders  <strong>#ORD1397254607</strong> ', 0, 2, 'Seller', 1, 0, '2017-09-21 16:58:18', '0000-00-00 00:00:00'),
(266, 4, 70, 0, 'your Order No. <strong>#ORD1397254607</strong> is canceled ', 0, 2, 'Seller', 1, 0, '2017-09-21 16:58:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `seller_id` varchar(200) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `shipping_charge` varchar(100) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `sales_tax` varchar(50) NOT NULL,
  `ammount` varchar(200) NOT NULL,
  `transact_status` varchar(255) NOT NULL,
  `err_loc` varchar(255) NOT NULL,
  `paid` tinyint(4) NOT NULL,
  `order_status` tinyint(4) NOT NULL COMMENT '1 for order complete and 2 for  order reject 3 for user order cancel 4 for re-order',
  `ip_address` varchar(100) NOT NULL,
  `delevery_date` datetime NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `total_price` float NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `sku_product` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `custom_options` text NOT NULL,
  `custom_price_total` float NOT NULL,
  `discount` varchar(100) NOT NULL,
  `order_status` tinyint(4) NOT NULL COMMENT '1 = complete and 2 = reject , 3 = user cancel, 4=refund request',
  `paid` tinyint(4) NOT NULL,
  `sales_tax` varchar(50) NOT NULL,
  `delevery_date` datetime NOT NULL,
  `payment_id` int(11) NOT NULL,
  `payment_type` text NOT NULL,
  `shipping_charge` float NOT NULL,
  `tracking_id` varchar(200) NOT NULL,
  `courier_company` varchar(200) NOT NULL,
  `comments` text NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `reason_cancel` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_no`, `seller_id`, `address_id`, `seller_name`, `product_id`, `brand_id`, `product_name`, `price`, `total_price`, `product_image`, `sku_product`, `quantity`, `custom_options`, `custom_price_total`, `discount`, `order_status`, `paid`, `sales_tax`, `delevery_date`, `payment_id`, `payment_type`, `shipping_charge`, `tracking_id`, `courier_company`, `comments`, `added_on`, `updated_on`, `reason_cancel`) VALUES
(1, 14, 'ORD24582490', 4, 17, 'selller1', 23, 2, 'Rocker Beaded Bangle a17ebrocrs', 111, 111, 'images/products/thumb/Rocker-Beaded-Bangle-a17ebrocrs-2017-08-26-19-27-36 _ rock_rs.png.png', '111', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 15:04:06', '0000-00-00 00:00:00', ''),
(2, 14, 'ORD1888654464', 0, 17, '', 20, 2, 'Four Way Cross Necklace Charm, Small-300-200-Silver', 24, 288, 'images/products/thumb/Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-52-10 _ cs15c158_front_1.png.png', '100040578-300-200-Silver', 12, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 15:04:06', '0000-00-00 00:00:00', ''),
(3, 14, 'ORD1272622622', 4, 17, 'selller1', 7, 3, 'Adjustable 925 Sterling Silver Ring With White Stones', 7, 35, 'images/products/thumb/Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-image20170421-9790-1eyba5w.jpg.jpg', 'fdsf3424242', 5, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 15:04:06', '0000-00-00 00:00:00', ''),
(4, 14, 'ORD1350527920', 0, 17, '', 4, 6, ' 18KT Diamond Cross Finger Ring', 20027, 100135, 'images/products/thumb/-18KT-Diamond-Cross-Finger-Ring-2017-08-12-15-01-15 _ 501057FFZTAA04 (1).jpg.jpg', '501057FFZTAA04)', 5, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, 'testssssssss', 'tttttttttt', 'tttttt', '2017-09-06 15:04:07', '0000-00-00 00:00:00', ''),
(5, 14, 'ORD1217224775', 4, 17, 'selller1', 25, 4, 'Rocker Beaded Bangle', 21, 189, 'images/products/thumb/Rocker-Beaded-Bangle-2017-09-04-11-34-43 _ Desert.jpg.jpg', '212', 9, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, 'ffffffff', 'fffffffff', 'test', '2017-09-06 15:04:07', '0000-00-00 00:00:00', ''),
(6, 61, 'ORD1497104208', 4, 24, 'selller1', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 78, 'images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_front.png.png', '100215527', 1, '[{"name":"custom option","value":""}]', 0, '0', 1, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 17:05:47', '0000-00-00 00:00:00', ''),
(7, 61, 'ORD243074193', 4, 24, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 17:21:59', '0000-00-00 00:00:00', ''),
(8, 61, 'ORD2102450038', 4, 24, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 17:27:12', '0000-00-00 00:00:00', ''),
(9, 57, 'ORD625048162', 4, 23, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 17:39:18', '0000-00-00 00:00:00', ''),
(10, 57, 'ORD873245979', 4, 23, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 17:39:19', '0000-00-00 00:00:00', ''),
(11, 57, 'ORD315591242', 4, 23, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 17:39:30', '0000-00-00 00:00:00', ''),
(12, 57, 'ORD1340119521', 4, 23, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 17:59:45', '0000-00-00 00:00:00', ''),
(13, 57, 'ORD633235395', 4, 23, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 18:00:30', '0000-00-00 00:00:00', ''),
(14, 57, 'ORD1794943792', 4, 23, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 18:03:13', '0000-00-00 00:00:00', ''),
(15, 57, 'ORD660363247', 4, 23, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 18:04:08', '0000-00-00 00:00:00', ''),
(16, 14, 'ORD973486845', 4, 17, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 200, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 2, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 18:27:17', '0000-00-00 00:00:00', ''),
(17, 61, 'ORD113043734', 4, 25, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-06 19:01:41', '0000-00-00 00:00:00', ''),
(18, 61, 'ORD428684506', 4, 25, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-07 13:02:14', '0000-00-00 00:00:00', ''),
(19, 61, 'ORD378620836', 4, 25, 'selller1', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '[{"name":"custom","value":""},{"name":"custom 2","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-07 14:20:18', '0000-00-00 00:00:00', ''),
(20, 61, 'ORD553255611', 4, 25, 'selller1', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 78, 'images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_detail_v2_1.png.png', '100215527', 1, '[{"name":"custom option","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-07 14:23:31', '0000-00-00 00:00:00', ''),
(21, 61, 'ORD1191572214', 4, 25, 'selller1', 25, 4, 'Rocker Beaded Bangle', 21, 21, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-29-31 _ rock_rg.png.png', '212', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-07 15:29:50', '0000-00-00 00:00:00', ''),
(22, 61, 'ORD295554129', 0, 25, '', 2, 5, 'Yellow Gold Diamond Pendant', 7880, 7880, 'images/products/thumb/Yellow-Gold-Diamond-Pendant-2017-08-12-14-52-03 _ 500357PCAAAA02.jpg.jpg', '500357PCAAAA02', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-07 15:29:50', '0000-00-00 00:00:00', ''),
(23, 61, 'ORD1077809914', 0, 25, '', 20, 2, 'Four Way Cross Necklace Charm, Small-300-200-Silver', 24, 24, 'images/products/thumb/Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-52-10 _ cs15c159_cs15c158_009_2.png.png', '100040578-300-200-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-07 15:31:48', '0000-00-00 00:00:00', ''),
(24, 61, 'ORD314732741', 0, 25, '', 2, 5, 'Yellow Gold Diamond Pendant', 7880, 7880, 'images/products/thumb/Yellow-Gold-Diamond-Pendant-2017-08-12-14-52-03 _ 500357PCAAAA02.jpg.jpg', '500357PCAAAA02', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-07 15:31:49', '0000-00-00 00:00:00', ''),
(25, 4, 'ORD718128890', 4, 26, 'seller', 6, 3, '0.31-CARAT ROUND DIAMOND', 313, 626, 'images/products/thumb/0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png.jpg', '2673779', 2, '[{"name":"yryr","value":""},{"name":"yete","value":""}]', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-08 11:22:34', '0000-00-00 00:00:00', ''),
(26, 4, 'ORD1371027198', 0, 26, '', 7, 3, 'Adjustable 925 Sterling Silver Ring With White Stones', 7, 7, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-image20170421-9790-160idtz (2).jpg.jpg', 'fdsf3424242', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-08 11:22:34', '0000-00-00 00:00:00', ''),
(27, 4, 'ORD1001270348', 0, 26, '', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-08 11:22:34', '0000-00-00 00:00:00', ''),
(29, 61, 'ORD73832323', 0, 25, '', 47, 17, 'Girls fashions', 300, 900, 'images/products/thumb/Girls-fashions-2017-09-08-12-49-53 _ swatch-image20150802-2984-1cib8rt.jpg.jpg', 'GB23', 3, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-08 13:56:05', '0000-00-00 00:00:00', ''),
(28, 61, 'ORD1267018233', 0, 25, '', 47, 17, 'Girls fashions', 300, 300, 'images/products/thumb/Girls-fashions-2017-09-08-12-49-53 _ swatch-image20150802-2984-1cib8rt.jpg.jpg', 'GB23', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-08 13:40:08', '0000-00-00 00:00:00', ''),
(30, 61, 'ORD1290183111', 0, 25, '', 47, 17, 'Girls fashions', 300, 1200, 'images/products/thumb/Girls-fashions-2017-09-08-12-49-53 _ swatch-image20150802-2984-1cib8rt.jpg.jpg', 'GB23', 2, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-08 14:02:54', '0000-00-00 00:00:00', ''),
(31, 61, 'ORD1096350778', 0, 25, '', 20, 2, 'Four Way Cross Necklace Charm, Small-300-200-Silver', 24, 24, 'images/products/thumb/Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-52-10 _ cs15c159_cs15c158_009_2.png.png', '100040578-300-200-Silver', 1, '', 0, '0', 2, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-08 14:03:33', '0000-00-00 00:00:00', ''),
(32, 61, 'ORD1621597361', 17, 25, '                          sheetaltest', 31, 6, 'a', 9, 18, 'frontend/img/default-product-image.png', 'a', 2, '[{"name":"test con 1","value":""},{"name":"test con 2","value":""}]', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-09 10:07:11', '0000-00-00 00:00:00', ''),
(33, 4, 'ORD1470234721', 4, 26, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-09 11:32:00', '0000-00-00 00:00:00', ''),
(34, 4, 'ORD1420443698', 4, 26, 'seller', 43, 4, 'Gold Plated Pair Of Anklets Adorned With Cz Pink Color Stone And Pink Color Beads ', 699, 699, 'images/products/thumb/Gold-Plated-Pair-Of-Anklets-Adorned-With-Cz-Pink-Color-Stone-And-Pink-Color-Beads--2017-09-06-15-08-36 _ swatch-ms20170413-7089-xhxaxt.jpg.jpg', 'AB43', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '23121221', 'test', '21212212', '2017-09-09 11:32:00', '0000-00-00 00:00:00', ''),
(35, 61, 'ORD1940624119', 4, 25, 'seller', 22, 2, 'Rocker Beaded Bangle', 100, 100, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', 'tet', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-11 10:46:19', '0000-00-00 00:00:00', ''),
(36, 61, 'ORD73229098', 4, 25, 'seller', 52, 22, 'Afghanistan Tribal Jewellafghanistan Tribal Jewellery', 0, 0, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Afghanistan-Tribal-Jewellafghanistan-Tribal-Jewellery-2017-09-09-10-32-56 _ CV-34869-MSHAM69185315270--Shambhavi_Global_Enterprises_Pvt_Ltd-14', '45345345', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-11 10:48:32', '0000-00-00 00:00:00', ''),
(37, 61, 'ORD1461435932', 4, 25, 'seller', 6, 3, '0.31-CARAT ROUND DIAMOND', 313, 151952, 'images/products/thumb/0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png.jpg', '2673779', 4, '[{"name":"yryr","value":"49"},{"name":"yete","value":"50"}]', 37675, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-11 16:07:46', '0000-00-00 00:00:00', ''),
(38, 61, 'ORD514256519', 4, 25, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ CV-34897-MVOYL97555811240-1495262176-Craftsvilla_1.jpg.jpg', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-11 16:24:57', '0000-00-00 00:00:00', ''),
(39, 61, 'ORD305056794', 0, 25, '', 62, 23, 'fsdf', 434, 434, 'images/products/thumb/fsdf-2017-09-11-17-42-19 _ Desert.jpg.jpg', '234234', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-11 17:57:07', '0000-00-00 00:00:00', ''),
(40, 14, 'ORD119493862', 0, 29, '', 55, 22, 'The Lady Loveine Ring', 2300, 2300, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/The-Lady-Loveine-Ring-2017-09-09-12-54-40 _ BISR0305R23_WAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-10002.png.jpg.jpg', '54646456', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 12:37:25', '0000-00-00 00:00:00', ''),
(41, 14, 'ORD910094137', 60, 29, 'selller1', 56, 27, 'Antique Flower Design Multicolor Semi Bridal Necklace Set', 2400, 2400, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Antique-Flower-Design-Multicolor-Semi-Bridal-Necklace-Set-2017-09-09-16-25-30 _ CV-3155-MSUKK35156126770-1472198163-Craftsvilla_1.jpg.png.png', '32352', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 12:37:25', '0000-00-00 00:00:00', ''),
(42, 14, 'ORD1987419684', 60, 29, 'selller1', 59, 21, 'Sukkhi Magnificent Jalebi Gold Plated American Diamond Necklace Set For Women', 3400, 3400, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Sukkhi-Magnificent-Jalebi-Gold-Plated-American-Diamond-Necklace-Set-For-Women-2017-09-09-16-53-09 _ CV-MSUKK27780416730--Sukkhi_Fashion-Crafts', '54534', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 12:37:25', '0000-00-00 00:00:00', ''),
(43, 14, 'ORD294122380', 4, 29, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 12:37:25', '0000-00-00 00:00:00', ''),
(44, 14, 'ORD309684108', 0, 29, '', 60, 26, 'te', 344, 688, 'http://www.fxpips.co.uk/marketplace/frontend/img/default-product-image.png', 'rere', 2, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 12:37:25', '0000-00-00 00:00:00', ''),
(45, 61, 'ORD1742026623', 4, 25, 'seller', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 78, 'images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_front.png.png', '100215527', 1, '[{"name":"custom option","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 13:39:02', '0000-00-00 00:00:00', ''),
(46, 61, 'ORD540316510', 0, 25, '', 50, 21, 'Peacock Inspired Pair Of Jhumki Earrings', 300, 300, 'images/products/thumb/Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV35232913650-Jewellery-Silvesto_India_-1500530717-Craftsvilla_1.jpg.png.png', '43567', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 13:39:04', '0000-00-00 00:00:00', ''),
(47, 61, 'ORD274280691', 4, 25, 'seller', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 78, 'images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_front.png.png', '100215527', 1, '[{"name":"custom option","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 13:39:05', '0000-00-00 00:00:00', ''),
(48, 61, 'ORD1377734802', 0, 25, '', 50, 21, 'Peacock Inspired Pair Of Jhumki Earrings', 300, 300, 'images/products/thumb/Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV35232913650-Jewellery-Silvesto_India_-1500530717-Craftsvilla_1.jpg.png.png', '43567', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 13:39:05', '0000-00-00 00:00:00', ''),
(49, 61, 'ORD552289602', 0, 25, '', 50, 21, 'Peacock Inspired Pair Of Jhumki Earrings', 300, 600, 'images/products/thumb/Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV14544966480-Jewellery-Silvesto_India_-1500542374-Craftsvilla_1.jpg.png.png', '43567', 2, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 14:17:15', '0000-00-00 00:00:00', ''),
(50, 61, 'ORD68441976', 0, 30, '', 50, 21, 'Peacock Inspired Pair Of Jhumki Earrings', 300, 300, 'images/products/thumb/Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV14544966480-Jewellery-Silvesto_India_-1500542374-Craftsvilla_1.jpg.png.png', '43567', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 14:24:24', '0000-00-00 00:00:00', ''),
(51, 61, 'ORD344125712', 0, 30, '', 50, 21, 'Peacock Inspired Pair Of Jhumki Earrings', 300, 300, 'images/products/thumb/Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV35232913650-Jewellery-Silvesto_India_-1500530717-Craftsvilla_1.jpg.png.png', '43567', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 14:27:14', '0000-00-00 00:00:00', ''),
(52, 61, 'ORD1706054771', 0, 30, '', 51, 19, 'Silvestoo India Blue Quartz Gemstone Earring Pg-102350', 4500, 4500, 'images/products/thumb/Silvestoo-India-Blue-Quartz-Gemstone-Earring-Pg-102350--2017-09-09-10-02-21 _ CV-11490-MSILV83642553780-Jewellery-Silvesto_India_-1499856190-Craftsvilla_1.JPG.jpg', '546766', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 14:30:41', '0000-00-00 00:00:00', ''),
(53, 61, 'ORD1163489342', 0, 30, '', 51, 19, 'Silvestoo India Blue Quartz Gemstone Earring Pg-102350', 4500, 4500, 'images/products/thumb/Silvestoo-India-Blue-Quartz-Gemstone-Earring-Pg-102350--2017-09-09-10-02-21 _ CV-11490-MSILV83642553780-Jewellery-Silvesto_India_-1499856190-Craftsvilla_1.JPG.jpg', '546766', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 14:48:53', '0000-00-00 00:00:00', ''),
(54, 61, 'ORD1445126711', 0, 30, '', 50, 21, 'Peacock Inspired Pair Of Jhumki Earrings', 45735, 45735, 'images/products/thumb/Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV14544966480-Jewellery-Silvesto_India_-1500542374-Craftsvilla_1.jpg.png.png', '43567', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-12 15:49:58', '0000-00-00 00:00:00', ''),
(55, 61, 'ORD326510129', 4, 30, 'seller', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 88, 'images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_front.png.png', '100215527', 1, '[{"name":"custom option","value":"67"}]', 10, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-13 10:04:27', '0000-00-00 00:00:00', ''),
(56, 61, 'ORD882924858', 4, 30, 'selller1', 25, 4, 'Rocker Beaded Bangle', 2021, 2021, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-29-31 _ rock_rg.png.png', '212', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-13 10:04:27', '0000-00-00 00:00:00', ''),
(57, 67, 'ORD1006356029', 4, 31, 'seller', 24, 2, 'Rocker Beaded Bangle', 111, 333, 'images/products/thumb/Rocker-Beaded-Bangle-2017-08-26-19-28-28 _ rock_rg.png.png', '323323', 3, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-13 10:38:22', '0000-00-00 00:00:00', ''),
(58, 68, 'ORD1674023863', 4, 32, 'seller', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 156, 'images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_detail_v2_1.png.png', '100215527', 2, '[{"name":"custom option","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-13 11:02:53', '0000-00-00 00:00:00', ''),
(59, 61, 'ORD27894860', 0, 30, '', 64, 10, 'ttt', 45435, 45435, 'frontend/img/default-product-image.png', 'erte', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-13 15:02:48', '0000-00-00 00:00:00', ''),
(60, 61, 'ORD1570146041', 0, 30, '', 64, 10, 'ttt', 45435, 45435, 'images/products/thumb/Adorable-Necklace-Set-With-Cz-Sparkling-Stones--2017-09-08-18-57-37 _ swatch-ms20170826-6012-1k93fyl.jpg.jpg', 'erte', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-13 15:05:59', '0000-00-00 00:00:00', ''),
(61, 61, 'ORD46779664', 0, 30, '', 47, 17, 'Girls fashions', 300, 300, 'images/products/thumb/Adorable-Necklace-Set-With-Cz-Sparkling-Stones--2017-09-08-18-57-37 _ swatch-ms20170817-16478-vioq02.jpg.jpg', 'GB23', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-13 15:06:00', '0000-00-00 00:00:00', ''),
(62, 69, 'ORD25799299', 0, 40, '', 64, 10, 'ttt', 45435, 45435, 'images/products/thumb/Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV35232913650-Jewellery-Silvesto_India_-1500530717-Craftsvilla_1.jpg.png.png', 'erte', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-13 16:04:20', '0000-00-00 00:00:00', 'test'),
(63, 69, 'ORD788913075', 0, 40, '', 47, 17, 'Girls fashions', 300, 1500, 'images/products/thumb/Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV35232913650-Jewellery-Silvesto_India_-1500530717-Craftsvilla_1.jpg.png.png', 'GB23', 5, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-13 16:04:20', '0000-00-00 00:00:00', 'yrdy'),
(64, 61, 'ORD1303236412', 0, 30, '', 63, 28, 'rrr', 2423, 2423, 'frontend/img/default-product-image.png', 'sdfsdf', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-13 16:48:29', '0000-00-00 00:00:00', ''),
(65, 61, 'ORD560479919', 0, 30, '', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 78, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_detail_v2_1.png.png', '100215527', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '12345678', 'Tanishq', 'your order is pending.', '2017-09-14 10:13:48', '0000-00-00 00:00:00', 'late delivery.'),
(66, 68, 'ORD1420580331', 4, 32, 'seller', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 78, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_detail_v2_1.png.png', '100215527', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-14 10:20:27', '0000-00-00 00:00:00', ''),
(67, 4, 'ORD1861220287', 60, 26, 'selller1', 59, 21, 'Sukkhi Magnificent Jalebi Gold Plated American Diamond Necklace Set For Women', 3400, 3400, 'images/products/thumb/Sukkhi-Magnificent-Jalebi-Gold-Plated-American-Diamond-Necklace-Set-For-Women-2017-09-09-16-53-09 _ CV-MSUKK27780416730--Sukkhi_Fashion-Craftsvilla_1.jpg.jpg', '54534', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-14 10:41:20', '0000-00-00 00:00:00', ''),
(68, 4, 'ORD827106586', 60, 26, 'selller1', 59, 21, 'Sukkhi Magnificent Jalebi Gold Plated American Diamond Necklace Set For Women', 3400, 3400, 'images/products/thumb/Sukkhi-Magnificent-Jalebi-Gold-Plated-American-Diamond-Necklace-Set-For-Women-2017-09-09-16-53-09 _ CV-MSUKK27780416730--Sukkhi_Fashion-Craftsvilla_1.jpg.jpg', '54534', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-14 10:41:20', '0000-00-00 00:00:00', ''),
(69, 68, 'ORD154701459', 0, 32, '', 20, 2, 'Four Way Cross Necklace Charm, Small-300-200-Silver', 24, 24, 'images/products/thumb/Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-52-10 _ cs15c158_front_1.png.png', '100040578-300-200-Silver', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-14 10:57:26', '0000-00-00 00:00:00', 'late delivery'),
(70, 57, 'ORD349854023', 0, 23, '', 47, 17, 'Girls fashions', 46234, 323638, 'images/products/thumb/Girls-fashions-2017-09-08-12-49-53 _ swatch-image20150802-2984-1cib8rt.jpg.jpg', 'GB23', 7, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-14 12:00:52', '0000-00-00 00:00:00', ''),
(71, 57, 'ORD34127760', 4, 23, 'seller', 65, 10, 'asf', 45, 45, 'frontend/img/default-product-image.png', '353', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-14 12:00:52', '0000-00-00 00:00:00', ''),
(72, 61, 'ORD117015026', 0, 30, '', 6, 3, '0.31-CARAT ROUND DIAMOND', 313, 313, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png.jpg', '2673779', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-14 12:30:47', '0000-00-00 00:00:00', ''),
(73, 61, 'ORD1890488467', 4, 30, 'seller', 65, 10, 'asf', 45, 45, 'frontend/img/default-product-image.png', '353', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-14 12:33:53', '0000-00-00 00:00:00', ''),
(74, 67, 'ORD1814947495', 0, 38, '', 47, 17, 'Girls fashions', 46234, 46234, 'images/products/thumb/Girls-fashions-2017-09-08-12-49-53 _ swatch-image20150802-2984-1cib8rt.jpg.jpg', 'GB23', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-14 13:03:19', '0000-00-00 00:00:00', ''),
(75, 61, 'ORD1577951937', 0, 30, '', 20, 2, 'Four Way Cross Necklace Charm, Small-300-200-Silver', 24, 24, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-52-10 _ cs15c159_cs15c158_009_2.png.png', '100040578-300-200-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-14 16:27:08', '0000-00-00 00:00:00', ''),
(76, 61, 'ORD1613249446', 0, 41, '', 59, 21, 'Sukkhi Magnificent Jalebi Gold Plated American Diamond Necklace Set For Women', 3400, 3400, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Sukkhi-Magnificent-Jalebi-Gold-Plated-American-Diamond-Necklace-Set-For-Women-2017-09-09-16-53-09 _ CV-MSUKK27780416730--Sukkhi_Fashion-Crafts', '54534', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-14 16:30:03', '0000-00-00 00:00:00', ''),
(77, 61, 'ORD1378979346', 0, 41, '', 68, 34, 'Stylish Gold Plated Chandbali Earring For Women ', 0, 0, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Stylish-Gold-Plated-Chandbali-Earring-For-Women--2017-09-15-10-54-58 _ CV-3155-MSUKK40644013880-1484809620-Craftsvilla_1.jpg.png.png', '54645645', 1, '', 0, '0', 1, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-15 11:15:58', '0000-00-00 00:00:00', ''),
(78, 61, 'ORD1562920376', 68, 41, 'sheetal', 69, 67, 'Pleasing Gold Plated Ad Chandbali Earring For Women', 2100, 2100, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Pleasing-Gold-Plated-Ad-Chandbali-Earring-For-Women-2017-09-15-11-12-50 _ CV-6894-MINAY45482532340--INAYA-1469101112-Craftsvilla_1.jpg.png.png', 'ASD2345565', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '556465465447647', 'Sukkhi Online Private Limited', 'Your order is pending.', '2017-09-15 11:18:53', '0000-00-00 00:00:00', ''),
(79, 68, 'ORD1292710094', 68, 32, 'sheetal', 67, 26, 'Jhumki Earrings With Green Enamel And Blue Stones', 2300, 2300, 'images/products/thumb/Jhumki-Earrings-With-Green-Enamel-And-Blue-Stones-2017-09-15-10-30-59 _ CV-6894-MINAY18555590050--INAYA-1469080515-Craftsvilla_1.jpg.png.png', '1234567', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-15 11:34:59', '0000-00-00 00:00:00', ''),
(80, 57, 'ORD2036872943', 70, 23, 'sheetal', 70, 19, 'Sukkhi Pleasing Gold Plated Ad Chandbali Earring For Women', 2000, 2000, 'images/products/thumb/Golden-Beige-Polki-Stones-Dangle-And-Drop-Earrings-Jewellery-For-Women---Orniza--2017-09-15-12-54-04 _ CV-MSUKK63801309790--Sukkhi_Fashion-Craftsvilla_1.jpg.png.png', 'AS232424', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '12345678', 'abc', 'test', '2017-09-15 15:45:46', '0000-00-00 00:00:00', ''),
(81, 57, 'ORD1422781262', 0, 23, '', 19, 2, 'Four Way Cross Necklace Charm, Small-300-200-Gold', 30, 30, 'images/products/thumb/Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-50-58 _ cs15c159_back.png.png', '100040578-300-200-Gold', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-15 15:46:39', '0000-00-00 00:00:00', 'vzczx'),
(82, 70, 'ORD583565241', 4, 42, 'seller', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 78, 'images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_front.png.png', '100215527', 1, '[{"name":"custom option","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-15 15:52:45', '0000-00-00 00:00:00', ''),
(83, 57, 'ORD832784209', 4, 23, 'seller', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 78, 'images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_detail_v2_1.png.png', '100215527', 1, '[{"name":"custom option","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-15 17:09:15', '0000-00-00 00:00:00', ''),
(84, 57, 'ORD1952695652', 0, 23, '', 19, 2, 'Four Way Cross Necklace Charm, Small-300-200-Gold', 30, 30, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-50-58 _ cs15c159_back.png.png', '100040578-300-200-Gold', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-15 17:09:15', '0000-00-00 00:00:00', ''),
(85, 57, 'ORD74173193', 70, 23, 'sheetal', 72, 27, 'White Traditional Rajwadi Jhumki Earrings ', 2300, 2300, 'images/products/thumb/The-Adriana-Ear-Cuffs-2017-09-15-15-40-28 _ BVAJ0137E02_RAA18DIG6XXXXXXXX_ABCD00-p2-1024-v5.jpg.jpg', 'AS12334', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-15 17:12:25', '0000-00-00 00:00:00', ''),
(86, 57, 'ORD976865837', 0, 23, '', 2, 5, 'Yellow Gold Diamond Pendant', 7880, 7880, 'images/products/thumb/Yellow-Gold-Diamond-Pendant-2017-08-12-14-52-03 _ 500357PCAAAA02.jpg.jpg', '500357PCAAAA02', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-15 17:14:14', '0000-00-00 00:00:00', ''),
(87, 57, 'ORD2063425067', 4, 23, 'seller', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 78, 'images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_detail_v2_1.png.png', '100215527', 1, '[{"name":"custom option","value":""}]', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-15 17:34:39', '0000-00-00 00:00:00', 'testing'),
(88, 57, 'ORD1069649859', 4, 23, 'seller', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 78, 'images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_front.png.png', '100215527', 1, '[{"name":"custom option","value":""}]', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-15 17:35:41', '0000-00-00 00:00:00', 'testing'),
(89, 61, 'ORD1677840963', 0, 41, '', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 78, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_detail_v2_1.png.png', '100215527', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-15 18:11:25', '0000-00-00 00:00:00', 'late'),
(90, 57, 'ORD58790384', 70, 23, 'sheetal', 71, 15, 'Peacock Inspired Jhumki Earrings', 5600, 5600, 'images/products/thumb/Peacock-Inspired-Jhumki-Earrings-2017-09-15-12-49-10 _ CV-6894-MINAY18555590050--INAYA-1469080515-Craftsvilla_1.jpg.png.png', 'AS124355', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 11:05:45', '0000-00-00 00:00:00', 'ghjg'),
(91, 57, 'ORD1287770320', 0, 23, '', 51, 19, 'Silvestoo India Blue Quartz Gemstone Earring Pg-102350', 4500, 4500, 'images/products/thumb/Silvestoo-India-Blue-Quartz-Gemstone-Earring-Pg-102350--2017-09-09-10-02-21 _ CV-34897-MVOYL77773528290-1495262149-Craftsvilla_1.jpg.jpg', '546766', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 11:06:44', '0000-00-00 00:00:00', 'dsfsf'),
(92, 57, 'ORD629568589', 0, 23, '', 51, 19, 'Silvestoo India Blue Quartz Gemstone Earring Pg-102350', 4500, 4500, 'images/products/thumb/Silvestoo-India-Blue-Quartz-Gemstone-Earring-Pg-102350--2017-09-09-10-02-21 _ CV-11490-MSILV83642553780-Jewellery-Silvesto_India_-1499856190-Craftsvilla_1.JPG.jpg', '546766', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 11:09:00', '0000-00-00 00:00:00', 'dgfgdfghdf'),
(93, 61, 'ORD1045845910', 4, 41, 'seller', 6, 3, '0.31-CARAT ROUND DIAMOND', 313, 626, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png.jpg', '2673779', 2, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 12:00:53', '0000-00-00 00:00:00', ''),
(94, 61, 'ORD1376991548', 4, 41, 'seller', 6, 3, '0.31-CARAT ROUND DIAMOND', 313, 626, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png.jpg', '2673779', 2, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 12:00:53', '0000-00-00 00:00:00', ''),
(95, 61, 'ORD609902106', 4, 41, 'seller', 6, 3, '0.31-CARAT ROUND DIAMOND', 313, 626, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png.jpg', '2673779', 2, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 12:00:53', '0000-00-00 00:00:00', ''),
(96, 61, 'ORD1147624572', 4, 41, 'seller', 6, 3, '0.31-CARAT ROUND DIAMOND', 313, 626, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png.jpg', '2673779', 2, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 12:00:53', '0000-00-00 00:00:00', ''),
(97, 61, 'ORD1861280971', 4, 41, 'seller', 6, 3, '0.31-CARAT ROUND DIAMOND', 313, 626, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png.jpg', '2673779', 2, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 12:00:54', '0000-00-00 00:00:00', ''),
(98, 61, 'ORD226108838', 4, 41, 'seller', 6, 3, '0.31-CARAT ROUND DIAMOND', 313, 626, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png.jpg', '2673779', 2, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 12:00:54', '0000-00-00 00:00:00', ''),
(99, 61, 'ORD1103330117', 4, 41, 'seller', 6, 3, '0.31-CARAT ROUND DIAMOND', 313, 626, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png.jpg', '2673779', 2, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 12:00:54', '0000-00-00 00:00:00', ''),
(100, 61, 'ORD861677880', 4, 41, 'seller', 21, 4, 'PATH OF LIFE Pull Chain Necklace', 78, 78, 'images/products/thumb/test-2017-08-26-18-09-17 _ pc14spn01s_detail_v2_1.png.png', '100215527', 1, '[{"name":"custom option","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 13:35:46', '0000-00-00 00:00:00', ''),
(101, 61, 'ORD1099036715', 4, 41, 'seller', 6, 3, '0.31-CARAT ROUND DIAMOND', 313, 313, 'images/products/thumb/0-31-CARAT-ROUND-DIAMOND-2017-08-12-15-17-33 _ Round.png.jpg', '2673779', 1, '[{"name":"yryr","value":""},{"name":"yete","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 13:48:46', '0000-00-00 00:00:00', ''),
(102, 61, 'ORD1472638970', 0, 41, '', 47, 17, 'Girls fashions', 300, 300, 'images/products/thumb/Girls-fashions-2017-09-08-12-49-53 _ swatch-image20150802-2984-1cib8rt.jpg.jpg', 'GB23', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 13:50:04', '0000-00-00 00:00:00', ''),
(103, 61, 'ORD1193102025', 0, 41, '', 47, 17, 'Girls fashions', 300, 300, 'images/products/thumb/Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV35232913650-Jewellery-Silvesto_India_-1500530717-Craftsvilla_1.jpg.png.png', 'GB23', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 17:52:38', '0000-00-00 00:00:00', ''),
(104, 61, 'ORD1123919325', 4, 41, 'seller', 127, 10, 'sss', 56, 112, 'images/products/thumb/sss-2017-09-16-17-45-20 _ Koala.jpg.jpg', '3478', 2, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 17:54:02', '0000-00-00 00:00:00', ''),
(105, 61, 'ORD122465416', 4, 41, 'seller', 54, 25, 'The Princess Ring', 25000, 25000, 'images/products/thumb/The-Princess-Ring-2017-09-09-11-30-56 _ ScreenHunter_.png.png', '342342', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 17:55:09', '0000-00-00 00:00:00', ''),
(106, 4, 'ORD609936914', 0, 26, '', 2, 5, 'Yellow Gold Diamond Pendant', 7880, 7880, 'images/products/thumb/Yellow-Gold-Diamond-Pendant-2017-08-12-14-52-03 _ 500357PCAAAA02 (1).jpg.jpg', '500357PCAAAA02', 1, '', 0, '0', 2, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 18:20:35', '0000-00-00 00:00:00', ''),
(107, 61, 'ORD1951850697', 4, 41, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-16 18:24:45', '0000-00-00 00:00:00', ''),
(108, 4, 'ORD462378873', 4, 26, 'seller', 118, 14, 'fgddf', 21, 21, 'images/products/thumb/fgddf-2017-09-16-16-43-14 _ Hydrangeas.jpg.jpg', 'vcbcbcvnvbnv', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-18 11:23:09', '0000-00-00 00:00:00', ''),
(109, 57, 'ORD930687422', 4, 23, 'seller', 118, 14, 'fgddf', 21, 21, 'images/products/thumb/fgddf-2017-09-16-16-43-14 _ Hydrangeas.jpg.jpg', 'vcbcbcvnvbnv', 1, '', 0, '0', 1, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-18 11:30:41', '0000-00-00 00:00:00', ''),
(110, 61, 'ORD991760786', 4, 41, 'seller', 54, 25, 'The Princess Ring', 25000, 25000, 'images/products/thumb/The-Princess-Ring-2017-09-09-11-30-56 _ BV-R37_YAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-15772.png.jpg.jpg', '342342', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-18 17:42:43', '0000-00-00 00:00:00', 'late delivery'),
(111, 61, 'ORD1540010545', 4, 41, 'seller', 54, 25, 'The Princess Ring', 25000, 25000, 'images/products/thumb/The-Princess-Ring-2017-09-09-11-30-56 _ BV-R37_YAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-15772.png.jpg.jpg', '342342', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-18 17:47:12', '0000-00-00 00:00:00', 'late delivery'),
(112, 57, 'ORD1940635579', 0, 23, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-18 17:54:25', '0000-00-00 00:00:00', 'test'),
(113, 57, 'ORD1983111468', 4, 23, 'seller', 54, 25, 'The Princess Ring', 25000, 25000, 'images/products/thumb/The-Princess-Ring-2017-09-09-11-30-56 _ BV-R37_YAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-15772.png.jpg.jpg', '342342', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-18 17:55:26', '0000-00-00 00:00:00', 'test'),
(114, 61, 'ORD846911688', 4, 41, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ CV-34897-MVOYL97555811240-1495262176-Craftsvilla_1.jpg.jpg', '3223235', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-18 18:05:58', '0000-00-00 00:00:00', 'test'),
(115, 57, 'ORD342924344', 4, 23, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ CV-34897-MVOYL97555811240-1495262176-Craftsvilla_1.jpg.jpg', '3223235', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-18 18:37:23', '0000-00-00 00:00:00', 'dgfgdfghdf'),
(116, 61, 'ORD428642486', 0, 41, '', 47, 17, 'Girls fashions', 300, 300, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/Girls-fashions-2017-09-08-12-49-53 _ swatch-image20150802-2984-1cib8rt.jpg.jpg', 'GB23', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-19 09:59:49', '0000-00-00 00:00:00', 'test'),
(117, 57, 'ORD241994682', 4, 23, 'seller', 23, 2, 'Rocker Beaded Bangle a17ebrocrs', 111, 111, 'images/products/thumb/Rocker-Beaded-Bangle-a17ebrocrs-2017-08-26-19-27-36 _ rock_rs.png.png', '111', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-19 17:50:34', '0000-00-00 00:00:00', 'test'),
(118, 67, 'ORD622845483', 0, 38, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:27', '0000-00-00 00:00:00', ''),
(119, 67, 'ORD1961815177', 4, 38, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:27', '0000-00-00 00:00:00', ''),
(120, 67, 'ORD1371862983', 0, 38, '', 126, 12, 'abcd-Silver', 10, 10, 'images/products/thumb/abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', 'ABCD-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:27', '0000-00-00 00:00:00', ''),
(121, 67, 'ORD64899078', 0, 38, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:28', '0000-00-00 00:00:00', ''),
(122, 67, 'ORD677963929', 4, 38, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:28', '0000-00-00 00:00:00', ''),
(123, 67, 'ORD423489053', 0, 38, '', 126, 12, 'abcd-Silver', 10, 10, 'images/products/thumb/abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', 'ABCD-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:28', '0000-00-00 00:00:00', ''),
(124, 67, 'ORD1781516474', 0, 38, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:28', '0000-00-00 00:00:00', ''),
(125, 67, 'ORD1750964627', 4, 38, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:29', '0000-00-00 00:00:00', ''),
(126, 67, 'ORD1621277774', 0, 38, '', 126, 12, 'abcd-Silver', 10, 10, 'images/products/thumb/abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', 'ABCD-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:29', '0000-00-00 00:00:00', ''),
(127, 67, 'ORD122546958', 0, 38, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:29', '0000-00-00 00:00:00', ''),
(128, 67, 'ORD633299794', 4, 38, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:29', '0000-00-00 00:00:00', ''),
(129, 67, 'ORD1068740282', 0, 38, '', 126, 12, 'abcd-Silver', 10, 10, 'images/products/thumb/abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', 'ABCD-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:30', '0000-00-00 00:00:00', ''),
(130, 67, 'ORD972007581', 0, 38, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:30', '0000-00-00 00:00:00', ''),
(131, 67, 'ORD1320459454', 4, 38, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:30', '0000-00-00 00:00:00', ''),
(132, 67, 'ORD319584871', 0, 38, '', 126, 12, 'abcd-Silver', 10, 10, 'images/products/thumb/abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', 'ABCD-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:30', '0000-00-00 00:00:00', ''),
(133, 67, 'ORD1425673553', 0, 38, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:30', '0000-00-00 00:00:00', ''),
(134, 67, 'ORD1656338692', 4, 38, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:30', '0000-00-00 00:00:00', ''),
(135, 67, 'ORD940889068', 0, 38, '', 126, 12, 'abcd-Silver', 10, 10, 'images/products/thumb/abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', 'ABCD-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:31', '0000-00-00 00:00:00', ''),
(136, 67, 'ORD1360062451', 0, 38, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:31', '0000-00-00 00:00:00', ''),
(137, 67, 'ORD967055272', 4, 38, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:31', '0000-00-00 00:00:00', ''),
(138, 67, 'ORD416040464', 0, 38, '', 126, 12, 'abcd-Silver', 10, 10, 'images/products/thumb/abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', 'ABCD-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:31', '0000-00-00 00:00:00', ''),
(139, 67, 'ORD460107999', 0, 38, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:31', '0000-00-00 00:00:00', '');
INSERT INTO `orders` (`id`, `user_id`, `order_no`, `seller_id`, `address_id`, `seller_name`, `product_id`, `brand_id`, `product_name`, `price`, `total_price`, `product_image`, `sku_product`, `quantity`, `custom_options`, `custom_price_total`, `discount`, `order_status`, `paid`, `sales_tax`, `delevery_date`, `payment_id`, `payment_type`, `shipping_charge`, `tracking_id`, `courier_company`, `comments`, `added_on`, `updated_on`, `reason_cancel`) VALUES
(140, 67, 'ORD875636128', 4, 38, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:31', '0000-00-00 00:00:00', ''),
(141, 67, 'ORD1615834790', 0, 38, '', 126, 12, 'abcd-Silver', 10, 10, 'images/products/thumb/abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', 'ABCD-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:31', '0000-00-00 00:00:00', ''),
(142, 67, 'ORD1329091338', 0, 38, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:32', '0000-00-00 00:00:00', ''),
(143, 67, 'ORD957049115', 4, 38, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:32', '0000-00-00 00:00:00', ''),
(144, 67, 'ORD1414291062', 0, 38, '', 126, 12, 'abcd-Silver', 10, 10, 'images/products/thumb/abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', 'ABCD-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:32', '0000-00-00 00:00:00', ''),
(145, 67, 'ORD678530477', 0, 38, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:32', '0000-00-00 00:00:00', ''),
(146, 67, 'ORD1089630280', 4, 38, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:32', '0000-00-00 00:00:00', ''),
(147, 67, 'ORD984335340', 0, 38, '', 126, 12, 'abcd-Silver', 10, 10, 'images/products/thumb/abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', 'ABCD-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:32', '0000-00-00 00:00:00', ''),
(148, 67, 'ORD407840672', 0, 38, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:32', '0000-00-00 00:00:00', ''),
(149, 67, 'ORD1645823256', 4, 38, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:33', '0000-00-00 00:00:00', ''),
(150, 67, 'ORD2060461930', 0, 38, '', 126, 12, 'abcd-Silver', 10, 10, 'images/products/thumb/abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', 'ABCD-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:33', '0000-00-00 00:00:00', ''),
(151, 67, 'ORD1271153990', 0, 38, '', 119, 11, 'asdf', 45, 45, 'images/products/thumb/asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', 'df45', 1, '[{"name":"wer","value":""},{"name":"5","value":""}]', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:33', '0000-00-00 00:00:00', ''),
(152, 67, 'ORD2010827006', 4, 38, 'seller', 53, 25, 'Studded With Multicolored Stones', 399, 399, 'images/products/thumb/Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '3223235', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:33', '0000-00-00 00:00:00', ''),
(153, 67, 'ORD83253426', 0, 38, '', 126, 12, 'abcd-Silver', 10, 10, 'images/products/thumb/abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', 'ABCD-Silver', 1, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:22:33', '0000-00-00 00:00:00', ''),
(154, 67, 'ORD1335130783', 70, 38, 'sheetal', 71, 15, 'Peacock Inspired Jhumki Earrings', 5600, 16800, 'images/products/thumb/Peacock-Inspired-Jhumki-Earrings-2017-09-15-12-49-10 _ CV-6894-MINAY18555590050--INAYA-1469080515-Craftsvilla_1.jpg.png.png', 'AS124355', 3, '', 0, '0', 0, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-20 18:47:55', '0000-00-00 00:00:00', ''),
(155, 61, 'ORD1107942900', 4, 41, 'seller', 54, 25, 'The Princess Ring', 25000, 25000, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/The-Princess-Ring-2017-09-09-11-30-56 _ ScreenHunter_.png.png', '342342', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-21 16:53:30', '0000-00-00 00:00:00', 'test'),
(156, 70, 'ORD1397254607', 4, 42, 'seller', 54, 25, 'The Princess Ring', 25000, 25000, 'http://www.fxpips.co.uk/marketplace/images/products/thumb/The-Princess-Ring-2017-09-09-11-30-56 _ ScreenHunter_.png.png', '342342', 1, '', 0, '0', 3, 0, '0.00', '0000-00-00 00:00:00', 0, 'COD', 0, '', '', '', '2017-09-21 16:58:18', '0000-00-00 00:00:00', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(200) NOT NULL,
  `total` float NOT NULL,
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(20) NOT NULL,
  `product_image` text NOT NULL,
  `sku_product` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `custom_options` text NOT NULL,
  `custom_price_total` float NOT NULL,
  `discount` varchar(20) NOT NULL,
  `order_date` datetime NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `SalesTax` varchar(20) NOT NULL,
  `order_status` tinyint(4) NOT NULL COMMENT '1 for order complete and 2 for  order reject',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `unit_size` varchar(50) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `carat` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `measurement_size` varchar(200) NOT NULL,
  `Material` varchar(100) NOT NULL,
  `product_metal` int(11) NOT NULL,
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
  `addtional_infomation` text NOT NULL,
  `max_sale_qty` varchar(20) NOT NULL,
  `inventory_min_qty` varchar(20) NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=162 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `SKU`, `Brand`, `product_name`, `product_type`, `slug`, `product_description`, `seller_id`, `category_id`, `unit_size`, `unit_price`, `carat`, `price`, `measurement_size`, `Material`, `product_metal`, `discount`, `resizable`, `unit_weight`, `units_InStock`, `units_onOrder`, `reorder_level`, `size`, `discount_available`, `discount_rate`, `current_order`, `stone_description`, `is_available`, `ranking`, `stone`, `no_of_stone`, `stone_setting`, `stone_color`, `stone_clarity`, `status`, `method`, `stone_shape`, `inv_qty`, `addtional_infomation`, `max_sale_qty`, `inventory_min_qty`, `is_in_stock`, `related_check_list`, `associated_check_list`, `group_products`, `meta_title`, `meta_keyword`, `meta_description`, `added_on`, `added_by`, `updated_by`, `updated_on`, `image_certificate`, `added_user_type`, `update_user_type`, `delete`, `visiablity`, `attribute_opt_value`, `attribute_set_id`, `attribute_arr`) VALUES
(1, '513013FLTCAA00', '5', '22KT Gold Finger Ring', 'simple', '22KT-Gold-Finger-Ring', 'IFRoaXMgMjJLVCB5ZWxsb3cgZ29sZCBmaW5nZXIgcmluZyBmZWF0dXJlcyBkaWFtb25kLWN1dCBwYXR0ZXJucy4gVGhlIGJhbmQgaXMgYWRvcm5lZCB3aXRoIHNsYW50ZWQsIHRleHR1cmVkIGVsZW1lbnRzLiBEdWUgdG8gYSBoaWdoLXBvbGlzaGVkIGZpbmlzaCwgdGhpcyByaW5nIGxvb2tzIHNoaW55LCBhbmQgaXQgbWFrZXMgYSBncmVhdCBwYXJ0bmVyIGZvciBhbGwgb3V0Zml0cy4=', 0, '28 ', '', '', '', 4952, '', '', 1, '0', 0, '1.35', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '191', '', '', '0', 1, '', '', '', '', '', '', '2017-08-12 14:47:44', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '', 4, ''),
(2, '500357PCAAAA02', '5', 'Yellow Gold Diamond Pendant', 'simple', 'Yellow-Gold-Diamond-Pendant', 'VGhpcyAxOEtUIHllbGxvdyBnb2xkLCByaG9kaXVtLXBsYXRlZCBwZW5kYW50IGlzIHNldCB3aXRoIHRocmVlIHJvdW5kIGJyaWxsaWFudCBjdXQgZGlhbW9uZHMuIFRoZSBkaWFtb25kcyBhcmUgb2YgU0kyIGNsYXJpdHkgYW5kIGZhbGwgd2l0aGluIHRoZSBHLUggY29sb3VyIHJhbmdlLiBGZWF0dXJpbmcgYW4gb3BlbiBoZWFydCBkZXNpZ24sIHRoZSBkaWFtb25kcyBhcmUgcGF2ZS1zZXQgb24gdGhlIHJob2RpdW0tcGxhdGVkLCBjdXJ2ZWQsIHR1c2sgZWxlbWVudC4gVGhlIHBlbmRhbnQgYWxzbyBoaWdobGlnaHRzIGEgc2luZ2xlIGRpYW1vbmQgYXQgYSBjbGVmdCBzZXQgaW4gYSBmb3VyLXByb25nIHNldHRpbmcuIFRoZSByaG9kaXVtLXBsYXRlZCBwcm9uZ3MgZW5oYW5jZSB0aGUgbHVzdHJlIG9mIHRoZSBkaWFtb25kcy4gVGhyb3VnaCBhbiBPLXJpbmcsIHRoZSBwZW5kYW50IGlzIHN1c3BlbmRlZCBmcm9tIHRoZSB0YXBlcmVkLCBwbGFpbiwgb3ZhbCBiYWlsLiBUaGUgaGlnaC1wb2xpc2hlZCBmaW5pc2ggcmVuZGVycyBhIGJyaWxsaWFudCBzaGluZSB0byB0aGUgcGVuZGFudC4=', 0, '35 ', '', '', '0.022', 7880, '', '', 1, '0', 0, '1.468', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '195', '', '', '0', 1, '', '', '', '', '', '', '2017-08-12 14:52:03', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '', 5, ''),
(3, '(552812VELE1A22', '5', 'Yellow Gold Diamond Bangle', 'simple', 'Yellow-Gold-Diamond-Bangle', 'IFRoaXMgMTRLVCB5ZWxsb3cgZ29sZCBiYW5nbGUgY29udGFpbnMgc2l4IHJvdW5kIGJyaWxsaWFudCBjdXQgZGlhbW9uZHMgb2YgU0kyIGNsYXJpdHkgYW5kIEktSiBjb2xvdXIgZ3JhZGUuIEFsbCBkaWFtb25kcyBhcmUgc2V0IGluIHJob2RpdW0tcGxhdGVkIHNoYXJlZCBwcm9uZyBzZXR0aW5ncy4gVGhlIGJhbmdsZSBmZWF0dXJlcyBhIHNtb290aCBiYW5kIHdpdGggYSBjaXJjdWxhciByaW5nIGVsZW1lbnQgYXQgdGhlIGNlbnRyZSB3aXRoIGRpYW1vbmQtc3R1ZGRlZCwgdGVhcmRyb3Atc2hhcGVkIGVsZW1lbnRzIGh1Z2dpbmcgdGhlIHJpbmcgZWxlbWVudC4gQSBzZXJpZXMgb2YgTy1yaW5ncyBhbmQgYSBsb2JzdGVyIGNsb3N1cmUgYXJlIHByb3ZpZGVkIHRvIHNlY3VyZSB0aGUgYmFuZ2xlLiBBIGhpZ2gtcG9saXNoZWQgZmluaXNoIG1ha2VzIHRoZSBiYW5nbGUgbG9vayBhdHRyYWN0aXZlLg==', 0, '25 ', '', '', '', 22074, '', '', 1, '0', 0, '5.355', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '80', '', '', '0', 1, '', '', '', '', '', 'This 14KT yellow gold bangle contains six round brilliant cut diamonds of SI2 clarity and I-J colour grade. All diamonds are set in rhodium-plated shared prong settings. The bangle features a smooth band with a circular ring element at the centre with diamond-studded, teardrop-shaped elements hugging the ring element. A series of O-rings and a lobster closure are provided to secure the bangle. A high-polished finish makes the bangle look attractive.', '2017-08-12 14:56:31', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '', 5, ''),
(4, '501057FFZTAA04)', '6', ' 18KT Diamond Cross Finger Ring', 'simple', '-18KT-Diamond-Cross-Finger-Ring', 'IFRoaXMgMThLVCB5ZWxsb3cgZ29sZCBmaW5nZXIgcmluZyBzaG93Y2FzZXMgYSBzaW5nbGUgcm91bmQgYnJpbGxpYW50IGN1dCBkaWFtb25kIG9mIEctSCBjb2xvdXIgcmFuZ2UgYW5kIFZTIGNsYXJpdHkgZ3JhZGUuIFRoZSBmaW5nZXIgcmluZyBmZWF0dXJlcyBhIGNyb3NzLXNoYXBlZCBkZXNpZ24gd2l0aCB0aGUgZGlhbW9uZCBhZG9ybmluZyB0aGUgcmlnaHQgY29ybmVyIG9mIHRoZSBjcm9zcyBtb3RpZi4gQSBmb3VyLXByb25nIHNldHRpbmcgaW4gcmhvZGl1bSBwbGF0aW5nIGtlZXBzIHRoZSBkaWFtb25kIHNlY3VyZS4gU2luY2UgdGhlIHJpbmcgaXMgaGlnaC1wb2xpc2hlZCwgaXQgbG9va3Mgc2hpbnkuIA==', 0, '28 ', '', '', '4.8', 20027, '', '', 3, '0', 0, '4.8', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '65', '', '', '0', 1, '3,2', '', '', '', 'rings,men', 'This 18KT yellow gold finger ring showcases a single round brilliant cut diamond of G-H colour range and VS clarity grade. The finger ring features a cross-shaped design with the diamond adorning the right corner of the cross motif. A four-prong setting in rhodium plating keeps the diamond secure. Since the ring is high-polished, it looks shiny.', '2017-08-12 15:01:15', '1', '1', '2017-08-13 11:44:55', '', 'Admin', 'Admin', 1, 1, '{"Length":"e","color":"Black"}', 4, ''),
(5, ' RC712A', '2', '18K WHITE GOLD JOANNA CUSHION HALO WITH ROUND CUT DIAMOND RING (.36 CTW.)', 'simple', '18K-WHITE-GOLD-JOANNA-CUSHION-HALO-WITH-ROUND-CUT-DIAMOND-RING-36-CTW', 'IFJlZmluZWQgYW5kIHNvcGhpc3RpY2F0ZWQsIHRoaXMgcmluZydzIGN1c2hpb24gaGFsbyBpcyBzZXQgd2l0aCByb3VuZC1jdXQgZGlhbW9uZHMgdG8gb2Zmc2V0IHRoZSBkZW11cmUgcm91bmQtY3V0IGNlbnRlciBkaWFtb25kLiBDaGFubmVsLXNldCBkaWFtb25kcyBleHRlbmQgb3ZlciB0aGUgYmFuZCB0byBlbmhhbmNlIHRoZSBzcGFya2xlIG9mIHRoaXMgcG9zaCBjcmVhdGlvbi4u', 4, '28 ,29 ,30 ', '', '', '36', 1675, '4-10', '', 5, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '32', '', 'G', 'SI1', 1, 'form', '', '400', '', '', '0', 0, '', '', '', '18K WHITE GOLD JOANNA CUSHION HALO WITH ROUND CUT DIAMOND RING (.36 CTW.)', '', 'Refined and sophisticated, this ring''s cushion halo is set with round-cut diamonds to offset the demure round-cut center diamond. Channel-set diamonds extend over the band to enhance the sparkle of this posh creation..', '2017-08-12 15:10:52', '4', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, '', 4, ''),
(6, '2673779', '3', '0.31-CARAT ROUND DIAMOND', 'simple', '031-CARAT-ROUND-DIAMOND', 'IFRoaXMgVi4gR29vZC1jdXQsIEotY29sb3IsIGFuZCBTSTEtY2xhcml0eSBkaWFtb25kIGNvbWVzIHdpdGggYSBkaWFtb25kIGdyYWRpbmcgcmVwb3J0IGZyb20gR0lBLCAzMCBkYXkgaW5zcGVjdGlvbiBwZXJpb2QsIGZyZWUgRmVkRXggT3Zlcm5pZ2h0IGluc3VyZWQgc2hpcHBpbmcgYW5kIGxpZmV0aW1lIHVwZ3JhZGUgcG9saWN5Lg==', 4, '36 ', '', '', '', 313, '4.22 x 4.27 x 2.72', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, 'American Diamond', '', '', 'J', 'VVS2', 1, 'form', 'Round', '374', '', '', '0', 1, '', '', '', '', '', 'This V. Good-cut, J-color, and SI1-clarity diamond comes with a diamond grading report from GIA, 30 day inspection period, free FedEx Overnight insured shipping and lifetime upgrade policy.', '2017-08-12 15:17:33', '4', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, '', 0, ''),
(7, 'fdsf3424242', '3', 'Adjustable 925 Sterling Silver Ring With White Stones', 'simple', 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones', 'aGlzIHBpZWNlIG9mIGpld2VscnkgY29tZXMgd2l0aCB0aGUgVm95bGxhIGFzc3VyYW5jZSBvZiBxdWFsaXR5IGFuZCBkdXJhYmlsaXR5Lg0KDQpDYXJpbmcgZm9yIHlvdXIgZmFzaGlvbiBqZXdlbHJ5OiBXZSwgYXQgVm95bGxhLCB0YWtlIGNhcmUgb2YgZXZlcnkgcGllY2Ugb2YgamV3ZWxyeSBzbyB0aGF0IHlvdSBkb24ndCBzcGVuZCBob3VycyBjYXJpbmcgZm9yIHRoZW0uIEJ1dCBkbyByZW1lbWJlciwgZmFzaGlvbiBqZXdlbHJ5IGxhc3RzIGxvbmdlciB3aGVuIGtlcHQgZHJ5IGFuZCBmcmVlIG9mIGNoZW1pY2Fscy4gRm9sbG93IHRoaXMgc2ltcGxlIHJ1bGU6IFlvdXIgamV3ZWxyeSBzaG91bGQgYmUgdGhlIGxhc3QgdGhpbmcgeW91IHB1dCBvbiBhbmQgdGhlIGZpcnN0IHRoaW5nIHlvdSB0YWtlIG9mZiAgICAgICAgICAgICA=', 4, '15', '', '', 'd', 7, 'd', '', 1, '0', 0, '6', 0, 0, 0, '', 0, '', 0, 'ICAgICAgICAgICAgICA=', 0, 0, 'American Diamond', '2212', '2121', 'E', 'IF', 1, 'form', 'Emerald', '21', '', '', '', 1, '', '', '', '', '', '', '2017-08-12 15:25:13', '4', '4', '2017-09-05 17:47:51', '', 'Seller', 'Seller', 0, 1, '{&quot;Length&quot;:&quot;fgdg&quot;,&quot;Height&quot;:&quot;dfgdf&quot;,&quot;color&quot;:&quot;Gold&quot;,&quot;Size&quot;:&quot;20&quot;}', 5, ''),
(18, '100040578', '2', 'Four Way Cross Necklace Charm, Small', 'configurable', 'Four-Way-Cross-Necklace-Charm-Small', 'IFR5cGljYWxseSBrbm93biBhcyBhIGZvdXIgd2F5IG1lZGFsIG9yIGEgY3J1Y2lmb3JtLCB0aGUgRm91ciBXYXkgQ3Jvc3MgaXMgbWFkZSB1cCBvZiBmb3VyIHNwaXJpdHVhbCBtZWRhbHMgaW4gb25lOiB0aGUgU2FjcmVkIEhlYXJ0IGF0IHRoZSB0b3AsIFN0LiBDaHJpc3RvcGhlciBvbiB0aGUgcmlnaHQsIHRoZSBCbGVzc2VkIE1vdGhlciBhdCB0aGUgYm90dG9tLCBhbmQgU3QuIEpvc2VwaCBvbiB0aGUgbGVmdC4gRXhwZXJpZW5jZSB0aGUgY3Jvc3MgYXMgYSB1bmlmaWVkLCBzYWludGx5IGJsZXNzaW5nIGZyb20gYWJvdmUuICA=', 0, '34 ,19', '', '', '', 24, '', '', 0, '0', 0, '20', 0, 0, 0, '', 0, '', 0, 'ICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '200', '', '', '0', 1, '', '147', '', 'Four Way Cross Necklace Charm, Small', 'Four Way Cross Necklace Charm, Small', 'O*bqï¿½eï¿½Iï¿½ï¿½vï¿½iï¿½.ï¿½ï¿½ï¿½ï¿½Zï¿½ï¿½ï¿½rï¿½ï¿½ï¿½ï¿½+ï¿½ï¿½^ï¿½ï¿½Yï¿½ï¿½ï¿½ï¿½,ï¿½Éšuë©¡ï¿½èº»)ï¿½ï¿½ï¿½ï¿½ï¿½fyÖ¥ï¿½)ï¿½ï¿½ay&ï¿½ï¿½ï¿½Gyï¿½ï¿½jï¿½azï¿½)JÐ¡ï¿½+-ï¿½ï¿½^ï¿½ï¿½ï¿½ï¿½ï¿½mï¿½ï¿½ezï¿½tï¿½-ï¿½ï¿½Ú¶ï¿½^nï¿½mï¿½fï¿½u+Iï¿½Ç©ï¿½ï¿½ï¿½ï¿½^~ï¿½1ï¿½ï¿½ï¿½zwï¿½ï¿½ï¿½ï¿½,jÆ®ï¿½''ï¿½yï¿½\Zï¿½{eÉ¹^ï¿½È§ï¿½ï¿½è™¦ï¿½', '2017-08-26 12:36:22', '1', '1', '2017-09-19 18:50:07', '', 'Admin', 'Admin', 0, 1, '', 2, '11,10,5'),
(19, '100040578-300-200-Gold', '2', 'Four Way Cross Necklace Charm, Small-300-200-Gold', 'simple', 'Four-Way-Cross-Necklace-Charm-Small', 'IFR5cGljYWxseSBrbm93biBhcyBhIGZvdXIgd2F5IG1lZGFsIG9yIGEgY3J1Y2lmb3JtLCB0aGUgRm91ciBXYXkgQ3Jvc3MgaXMgbWFkZSB1cCBvZiBmb3VyIHNwaXJpdHVhbCBtZWRhbHMgaW4gb25lOiB0aGUgU2FjcmVkIEhlYXJ0IGF0IHRoZSB0b3AsIFN0LiBDaHJpc3RvcGhlciBvbiB0aGUgcmlnaHQsIHRoZSBCbGVzc2VkIE1vdGhlciBhdCB0aGUgYm90dG9tLCBhbmQgU3QuIEpvc2VwaCBvbiB0aGUgbGVmdC4gRXhwZXJpZW5jZSB0aGUgY3Jvc3MgYXMgYSB1bmlmaWVkLCBzYWludGx5IGJsZXNzaW5nIGZyb20gYWJvdmUuDQo=', 0, '34 ,19 ', '', '', '', 30, '', '', 0, '0', 0, '20', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 1, 'form', '', '110', '', '', '0', 1, '', '', '', '', '', '', '2017-08-26 12:50:58', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '{"Length":"300","Height":"200","color":"Gold"}', 2, ''),
(20, '100040578-300-200-Silver', '2', 'Four Way Cross Necklace Charm, Small-300-200-Silver', 'simple', 'Four-Way-Cross-Necklace-Charm-Small', 'IFR5cGljYWxseSBrbm93biBhcyBhIGZvdXIgd2F5IG1lZGFsIG9yIGEgY3J1Y2lmb3JtLCB0aGUgRm91ciBXYXkgQ3Jvc3MgaXMgbWFkZSB1cCBvZiBmb3VyIHNwaXJpdHVhbCBtZWRhbHMgaW4gb25lOiB0aGUgU2FjcmVkIEhlYXJ0IGF0IHRoZSB0b3AsIFN0LiBDaHJpc3RvcGhlciBvbiB0aGUgcmlnaHQsIHRoZSBCbGVzc2VkIE1vdGhlciBhdCB0aGUgYm90dG9tLCBhbmQgU3QuIEpvc2VwaCBvbiB0aGUgbGVmdC4gRXhwZXJpZW5jZSB0aGUgY3Jvc3MgYXMgYSB1bmlmaWVkLCBzYWludGx5IGJsZXNzaW5nIGZyb20gYWJvdmUuDQo=', 0, '34 ,19 ', '', '', '', 24, '', '', 0, '0', 0, '20', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 1, 'form', '', '184', '', '', '0', 1, '', '', '', '', '', '', '2017-08-26 12:52:10', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '{"Length":"300","Height":"200","color":"Silver"}', 2, ''),
(21, '100215527', '4', 'PATH OF LIFE Pull Chain Necklace', 'simple', 'PATH-OF-LIFE-Pull-Chain-Necklace', 'IEVtYmxlbWF0aWMgb2YgbGlmZSdzIHplbml0aCBhbmQgbmFkaXIgbW9tZW50cywgdGhlIFBBVEggT0YgTElGRSBpcyByZXByZXNlbnRhdGl2ZSBvZiBhbiBpbmZpbml0ZSBudW1iZXIgb2YgcG9zc2liaWxpdGllcyBhbmQgZXhwcmVzc2lvbnMgb2YgbG92ZS4gSWxsdXN0cmF0aW5nIGxpZmUncyB0d2lzdHMsIHR1cm5zLCBhbmQgdW5leHBlY3RlZCB3aW5kcywgd2VhciB0aGUgUEFUSCBPRiBMSUZFIENoYXJtIHRvIHByb3VkbHkgY2VsZWJyYXRlIHlvdXIgb3duIHdpbGxpbmduZXNzIHRvIHRyYXZlbCB0b3dhcmRzIGxpZmUncyBmcnVpdGZ1bCBtb21lbnRzLiANCg0KVGhlIFByZWNpb3VzIE1ldGFscyBDb2xsZWN0aW9uIHNob3djYXNlcyBzdGVybGluZyBzaWx2ZXIgYW5kIGdvbGQgcGxhdGVkIHBpZWNlcyB0byBiZSBjaGVyaXNoZWQgZm9yIGEgbGlmZXRpbWUuIFByb2R1Y3RzIGFyZSBjcmFmdGVkIHdpdGggLjkyNSBzdGVybGluZyBzaWx2ZXIgYW5kIGRpcHBlZCBpbiAxNGt0IGdvbGQuIEFkanVzdHMgYW55d2hlcmUgZnJvbSBhIGNob2tlciBzdHlsZSB0byAyOCIuIA==', 4, '17 ,19 ', '', '', '', 78, '', '', 0, '0', 0, '32', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '1946', '', '', '0', 1, '', '', '', 'test', 'test', ' Emblematic of life''s zenith and nadir moments, the PATH OF LIFE is representative of an infinite number of possibilities and expressions of love. Illustrating life''s twists, turns, and unexpected winds, wear the PATH OF LIFE Charm to proudly celebrate your own willingness to travel towards life''s fruitful moments. \r\n\r\nThe Precious Metals Collection showcases sterling silver and gold plated pieces to be cherished for a lifetime. Products are crafted with .925 sterling silver and dipped in 14kt gold. Adjusts anywhere from a choker style to 28".', '2017-08-26 18:09:17', '1', '1', '2017-08-26 18:09:59', '', 'Admin', 'Admin', 0, 1, '{"Length":"test","Height":"test","color":"Yellow"}', 5, ''),
(22, 'tet', '2', 'Rocker Beaded Bangle', 'configurable', 'Rocker-Beaded-Bangle', 'IENvb2wgYW5kIGNsYXNzaWMsIE1ldGFsIEFjY2VudHMgZW1iZWxsaXNoIHlvdXIgc3RhY2sgYXMgeW91ciBvd24gcGVyc29uYWwgYXJtb3IuIFRvbmVzIG9mIGdvbGQsIHNpbHZlciwgcm9zZSBnb2xkLCBvciBtaXhlZCBtZXRhbHMsIHNlaXplIHRoZSBvcHBvcnR1bml0eSB0byBjcmVhdGUgYSBsb29rIHRoYXQgaXMgdW5pcXVlbHkgeW91LiA=', 4, '18 ,20 ', '', '', '', 100, '', '', 4, '0', 0, '20', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '180', '', '', '0', 1, '', '', '', 'Rocker Beaded Bangle', 'Rocker Beaded Bangle', ' Cool and classic, Metal Accents embellish your stack as your own personal armor. Tones of gold, silver, rose gold, or mixed metals, seize the opportunity to create a look that is uniquely you.', '2017-08-26 19:19:10', '1', '1', '2017-08-26 19:20:18', '', 'Admin', 'Admin', 1, 1, '{"Length":"10","Height":"100","color":"Silver"}', 5, ''),
(23, '111', '2', 'Rocker Beaded Bangle a17ebrocrs', 'simple', 'Rocker-Beaded-Bangle-a17ebrocrs', 'IENvb2wgYW5kIGNsYXNzaWMsIE1ldGFsIEFjY2VudHMgZW1iZWxsaXNoIHlvdXIgc3RhY2sgYXMgeW91ciBvd24gcGVyc29uYWwgYXJtb3IuIFRvbmVzIG9mIGdvbGQsIHNpbHZlciwgcm9zZSBnb2xkLCBvciBtaXhlZCBtZXRhbHMsIHNlaXplIHRoZSBvcHBvcnR1bml0eSB0byBjcmVhdGUgYSBsb29rIHRoYXQgaXMgdW5pcXVlbHkgeW91Lg==', 4, '18 ', '', '', '', 111, '', '', 8, '0', 0, '100', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '116', '', '', '0', 1, '', '', '', 'Rocker Beaded Bangle a17ebrocrs', 'Rocker Beaded Bangle a17ebrocrs', 'IENvb2wgYW5kIGNsYXNzaWMsIE1ldGFsIEFjY2VudHMgZW1iZWxsaXNoIHlvdXIgc3RhY2sgYXMgeW91ciBvd24gcGVyc29uYWwgYXJtb3IuIFRvbmVzIG9mIGdvbGQsIHNpbHZlciwgcm9zZSBnb2xkLCBvciBtaXhlZCBtZXRhbHMsIHNlaXplIHRoZSBvcHBvcnR1bml0eSB0byBjcmVhdGUgYSBsb29rIHRoYXQgaXMgdW5pcXVlbHkgeW91Lg==', '2017-08-26 19:27:36', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '', 5, ''),
(24, '323323', '2', 'Rocker Beaded Bangle', 'simple', 'Rocker-Beaded-Bangle', 'IDMyMzIgICA=', 4, '14', '', '', '', 111, '', '', 8, '0', 0, '232', 0, 0, 0, '', 0, '', 0, 'ICAgIA==', 0, 0, '', '', '', '', '', 1, 'form', '', '48', '', '', '01', 1, '', '', '', 'Rocker Beaded Bangle', 'Rocker Beaded Bangle', '', '2017-08-26 19:28:28', '1', '1', '2017-09-04 11:40:33', '', 'Admin', 'Admin', 0, 1, '', 0, ''),
(25, '212', '4', 'Rocker Beaded Bangle', 'simple', 'Rocker-Beaded-Bangle', 'IFJvY2tlciBCZWFkZWQgQmFuZ2xlICAg', 4, '18', '', '', '2121', 21, '21', '', 0, '0', 0, '20', 0, 0, 0, '', 0, '', 0, 'ICAgIA==', 0, 0, '', '', '212', 'E', 'IF', 1, 'form', 'Emerald', '194', '', '', '0', 1, '', '', '', 'Rocker Beaded Bangle', 'Rocker Beaded Bangle', '8', '2017-08-26 19:29:31', '1', '1', '2017-09-07 14:38:31', 'Rocker-Beaded-Bangle-2017-08-26-19-29-31.png', 'Admin', 'Admin', 0, 1, '', 0, ''),
(26, '200', '6', 'Handmade Gold Jewellery defulat', 'simple', 'Handmade-Gold-Jewellery-defulat', 'IDIwMDAgIA==', 0, '18 ,19', '', '', '', 2000, '', '', 1, '0', 0, '20', 0, 0, 0, '', 0, '', 0, 'ICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '1', '', '', '1', 1, '25,24,23,21', '', '', 'Handmade Gold Jewellery defulat', 'Handmade Gold Jewellery defulat', 'ï¿½M4', '2017-08-29 11:30:34', '1', '1', '2017-09-06 14:32:53', '', 'Admin', 'Admin', 0, 1, '', 0, ''),
(27, 'grp1011', '2', 'necklacks gorup', 'grouped', 'necklacks-gorup', 'dGVzdCAgICAgIA==', 0, '18 ,19', '', '', '', 20, '', '', 1, '0', 0, '200', 0, 0, 0, '', 0, '', 0, 'ICAgICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '12', '', '', '0', 1, '', '', '26,24,20,4', 'necklacks gorup', 'necklacks gorup', '', '2017-09-01 12:37:10', '1', '1', '2017-09-07 15:20:10', '', 'Admin', 'Admin', 0, 1, '{&quot;Length&quot;:&quot;21&quot;,&quot;Height&quot;:&quot;212&quot;,&quot;color&quot;:&quot;Green&quot;,&quot;Size&quot;:&quot;7&quot;}', 5, ''),
(28, 'g', '2', '                                8', 'simple', '-8', 'IGhoaCAgICAgICAgICAgICAg', 4, '20 ', '', '', '', 7, '', '', 8, '0', 0, '42', 0, 0, 0, '', 0, '', 0, 'ICAgICAgICAgICAgICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '2', '', '', '', 1, '', '', '', '                                     hh', '                                     hh', '', '2017-09-02 13:59:59', '1', '4', '2017-09-02 14:20:55', '', 'Admin', 'Seller', 1, 1, '{"Length":"                                  66666666%","color":"Gold"}', 4, ''),
(29, 'h', '3', '                                       h', 'configurable', '-h', 'IGgg', 17, '34 ', '', '', '', 9, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '-28', '', '', '0', 1, '', '', '', '                                       h', '                                       h', ' h', '2017-09-02 15:08:42', '17', '17', '2017-09-02 15:10:01', '', 'Seller', 'Seller', 0, 1, '', 5, '14'),
(30, '8', '3', '                                  8', 'grouped', '-8', 'IDgg', 17, '34 ', '', '', '', 50, '', '', 2, '0', 0, '8', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '8', '', '', '0', 1, '', '', '', '                                  8', '                                  8', ' 8', '2017-09-02 15:09:39', '17', '17', '2017-09-02 15:10:17', '', 'Seller', 'Seller', 0, 1, '', 5, ''),
(31, 'a', '6', 'a', 'configurable', 'a', 'IGEgICA=', 17, '14 ,15 ', '', '', 'b', 9, 'g', '', 0, '0', 0, '6', 0, 0, 0, '', 0, '', 0, 'ICAgIA==', 0, 0, 'American Diamond', '', 'g4', 'D', 'VVS1', 1, 'form', '', '4', '', '', '0', 1, '', '', '', 'a', 'a', '', '2017-09-02 15:11:44', '17', '17', '2017-09-02 16:46:20', 'a-.jpg', 'Seller', 'Seller', 0, 1, '', 4, '5'),
(32, 'f', '5', '                                  g', 'configurable', '-g', 'IGYgIA==', 0, '14 ', '', '', '', 6, '', '', 8, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'ICAg', 0, 0, 'American Diamond', '', '', 'F', '', 1, 'form', '', '0', '', '', '0', 0, '26,25', '', '', '                                  g', '                                  g', '', '2017-09-02 15:20:04', '1', '1', '2017-09-02 15:22:27', '----------------------------------g-.jpg', 'Admin', 'Admin', 1, 1, '', 5, '14'),
(33, '6', '7', '5', 'configurable', '-5', 'IHIgIA==', 4, '37', '', '', '', 6, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'ICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '6', '', '', '0', 1, '', '21', '', '5', '5', '', '2017-09-02 15:35:01', '4', '1', '2017-09-02 17:13:08', '', 'Seller', 'Admin', 1, 1, '', 4, '11'),
(34, '33333333', '7', 'test', 'grouped', 'test', 'IDMzMzMzMzMgIA==', 0, '33', '', '', '', 400, '', '', 1, '0', 0, '323', 0, 0, 0, '', 0, '', 0, 'ICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '22218', '', '', '0', 1, '', '', '26,25', 'test', 'test', 'ï¿½}ï¿½ï¿½}', '2017-09-04 14:00:06', '1', '1', '2017-09-06 12:13:49', '', 'Admin', 'Admin', 1, 1, '{&quot;Length&quot;:&quot;6&quot;,&quot;Height&quot;:&quot;6&quot;,&quot;color&quot;:&quot;Orange&quot;,&quot;Size&quot;:&quot;6&quot;}', 2, ''),
(35, '345', '78', 'brecalates', 'grouped', 'brecalates', 'IDM0NTM0NTM0NSAg', 4, '14 ,20', '', '', '', 0, '', '', 8, '0', 0, '345', 0, 0, 0, '', 0, '', 0, 'ICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '42', '', '', '0', 1, '47,46,26,25', '', '46,26,25', 'ddasasd', 'ddasasd', 'ßŽwï¿½ï¿½', '2017-09-04 16:47:03', '4', '1', '2017-09-09 15:42:14', '', 'Seller', 'Admin', 0, 1, '', 11, '20'),
(36, '5', '4', 'apple', 'configurable', 'apple', 'IDU=', 0, '15 ', '', '', '', 5, '', '', 0, '0', 0, '5', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '2', '', '', '0', 1, '', '', '', 'apple', 'apple', 'IDU=', '2017-09-04 17:44:15', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 11, '11,20'),
(37, '6h', '4', 'payal', 'grouped', 'payal', 'IGdoZmhm', 0, '18 ', '', '', '', 200, '', '', 8, '0', 0, '5', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '5', '', '', '0', 1, '', '', '25,20,3', 'payal', 'payal', 'IGdoZmhm', '2017-09-05 13:46:45', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 2, ''),
(38, '4', '4', 's', 'simple', 's', 'IDQgIA==', 56, '14', '', '', '', 4, '', '', 0, '0', 0, '4', 0, 0, 0, '', 0, '', 0, 'ICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '4', '', '', '0', 1, '', '', '', 's', 's', '', '2017-09-06 10:12:22', '56', '56', '2017-09-06 10:13:20', '', 'Seller', 'Seller', 1, 1, '{&quot;Length&quot;:&quot;4&quot;,&quot;Height&quot;:&quot;4&quot;,&quot;color&quot;:&quot;Gold&quot;,&quot;Size&quot;:&quot;20&quot;}', 5, ''),
(39, '7', '4', 'g', 'simple', 'g', 'IGgg', 56, '14', '', '', '', 9, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '8', '', '', '0', 1, '', '', '', 'g', 'g', 'h', '2017-09-06 10:15:22', '56', '56', '2017-09-06 10:25:35', '', 'Seller', 'Seller', 1, 1, '{&quot;Length&quot;:&quot;1&quot;,&quot;Height&quot;:&quot;1&quot;,&quot;color&quot;:&quot;Black&quot;,&quot;Size&quot;:&quot;5&quot;}', 2, ''),
(40, '79', '4', 'g', 'simple', 'g', 'IGg=', 60, '14 ', '', '', '', 9, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '8', '', '', '0', 1, '', '', '', 'g', 'g', 'IGg=', '2017-09-06 10:28:19', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 2, ''),
(41, '1', '4', 'payal', 'simple', 'payal', 'IGE=', 60, '14 ', '', '', '', 1, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '0', '', '', '0', 1, '', '', '', 'payal', 'payal', 'IGE=', '2017-09-06 10:37:26', '60', '', '0000-00-00 00:00:00', '', 'Seller', '', 1, 1, '', 0, ''),
(42, '2', '4', 'payal', 'simple', 'payal', 'IGE=', 56, '14 ', '', '', '', 1, '', '', 0, '0', 0, '1', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '-2', '', '', '0', 1, '', '', '', 'payal', 'payal', 'IGE=', '2017-09-06 10:38:35', '56', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, '', 0, ''),
(43, 'AB43', '4', 'Gold Plated Pair Of Anklets Adorned With Cz Pink Color Stone And Pink Color Beads ', 'simple', 'Gold-Plated-Pair-Of-Anklets-Adorned-With-Cz-Pink-Color-Stone-And-Pink-Color-Beads-', 'IFNwYXJrbGluZyBwYWlyIG9mIGFua2xldHMgYWRvcm5lZCB3aXRoIGEgcGluayBjb2xvciBiZWFkcyBhbmQgc2hpbnkgd2hpdGUga3VuZGFuIGNyYWZ0ZWQgaW50byB0aGUgY29tYmluZWQgbGlua3Mgb2Ygcm91bmQgYW5kIGRyb3Agc2hhcGVkIGRlc2lnbnMgd2hpY2ggYWRkIGFuIGVsZWdhbnQgY2hhcm0gdG8gdGhlIHByZXR0eSBwYWlyIG9mIGxlZyBvcm5hbWVudHMuIFdlYXIgdGhpcyBtZXNtZXJpemluZyBqZXdlbGxlcnkgd2l0aCB5b3VyIHRyYWRpdGlvbmFsIGF0dGlyZSB0byBnZXQgdGhhdCBkYXp6bGluZyBkaXZhIGxvb2suIA==', 4, '18 ', '', '', '2 c', 699, '56 cm', '', 1, '0', 0, '1.5', 0, 0, 0, '', 0, '', 0, 'IFNwYXJrbGluZyBwYWlyIG9mIGFua2xldHMgYWRvcm5lZCB3aXRoIGEgcGluayBjb2xvciBiZWFkcyBhbmQgc2hpbnkgd2hpdGUga3VuZGFuIGNyYWZ0ZWQgaW50byB0aGUgY29tYmluZWQgbGlua3Mgb2Ygcm91bmQgYW5kIGRyb3Agc2hhcGVkIGRlc2lnbnMgd2hpY2ggYWRkIGFuIGVsZWdhbnQgY2hhcm0gdG8gdGhlIHByZXR0eSBwYWlyIG9mIGxlZyBvcm5hbWVudHMuIFdlYXIgdGhpcyBtZXNtZXJpemluZyBqZXdlbGxlcnkgd2l0aCB5b3VyIHRyYWRpdGlvbmFsIGF0dGlyZSB0byBnZXQgdGhhdCBkYXp6bGluZyBkaXZhIGxvb2suIA==', 0, 0, 'American Diamond', '5', '', 'E', 'VVS1', 1, 'form', 'Square Radiant', '5', '', '', '0', 1, '', '', '', 'aBCD', 'Sparkling pair, dazzling diva look ', 'Sparkling pair of anklets adorned with a pink color beads and shiny white kundan crafted.', '2017-09-06 15:08:36', '4', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, '', 13, ''),
(44, 'CD34', '2', '925 Sterling Silver Nose Pin Plated With Rhodium', 'simple', '925-Sterling-Silver-Nose-Pin-Plated-With-Rhodium-', 'IFRoaXMgc2ltcGxlIHlldCBlbGVnYW50IG5vc2UgcGluIGlzIGVtYmVsbGlzaGVkIHdpdGggQ1ogdG8gZ2l2ZSB5b3VyIGxvb2sgYSByZXNwbGVuZGVudCBhcHBlYWwuIENyYWZ0ZWQgb2YgYXJkZW50IDkyNSBzdGVybGluZyBzaWx2ZXIgYW5kIHBsYXRlZCB3aXRoIHNoZWVueSByaG9kaXVtIHBsYXRpbmcsIHRoaXMgbm9zZSBwaW4gaXMgdGhlIHBlcmZlY3QgbWF0Y2ggZm9yIHlvdXIgZXZlcnlkYXkgYXR0aXJlcy4g', 60, '14', '', '', '', 20, '', '', 8, '0', 0, '2.5', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '9', '', '', '0', 1, '', '', '', '925 Sterling Silver Nose Pin Plated With Rhodium', '925 Sterling Silver Nose Pin Plated With Rhodium', 'This simple yet elegant nose pin is embellished with CZ to give your look a resplendent appeal. Crafted of ardent 925 sterling silver and plated with sheeny rhodium plating, this nose pin is the perfect match for your everyday attires.', '2017-09-06 15:19:26', '60', '60', '2017-09-06 15:25:38', '', 'Seller', 'Seller', 0, 1, '', 14, ''),
(45, '2sssssss', '25', 'test s', 'simple', 'test-s', 'IDIyMjIgIA==', 0, '14', '', '', '', 22, '', '', 1, '0', 0, '22', 0, 0, 0, '', 0, '', 0, 'ICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '229', '', '', '0', 1, '25,24,23,21,20,19', '', '', 'test s', 'test s', 'ï¿½mï¿½', '2017-09-07 15:27:30', '1', '1', '2017-09-07 16:26:11', '', 'Admin', 'Admin', 1, 1, '{&quot;Length&quot;:&quot;rere&quot;,&quot;Height&quot;:&quot;rrer&quot;,&quot;color&quot;:&quot;Blue&quot;,&quot;Size&quot;:&quot;7&quot;}', 5, ''),
(46, '232', '25', 'default ', 'simple', 'default-', 'IHJlcg==', 0, '43 ', '', '', '', 32, '', '', 0, '0', 0, '22', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '100', '', '', '0', 1, '', '', '', 'default ', 'default ', 'IHJlcg==', '2017-09-07 15:32:07', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 0, ''),
(47, 'GB23', '17', 'Girls fashions', 'simple', 'Girls-fashions', 'IHd3ZXJ3ZXIgICA=', 0, '14', '', '', '6ct', 300, '56', '', 0, '0', 0, '1.5', 0, 0, 0, '', 0, '', 0, 'ICAgIHRydHly', 0, 0, 'American Diamond', '44', 'top', 'D', 'SI1', 1, 'form', 'Square Radiant', '42', '', '', '0', 1, '46,45', '', '', 'Girls fashions', 'Girls fashions', '', '2017-09-08 12:46:32', '1', '1', '2017-09-11 14:03:51', '', 'Admin', 'Admin', 0, 1, '{&quot;Length&quot;:&quot;565&quot;,&quot;Height&quot;:&quot;56&quot;,&quot;color&quot;:&quot;Gold&quot;,&quot;Size&quot;:&quot;19&quot;}', 13, ''),
(48, '44234', '17', 'Classic Ring With Cz Embellishment', 'simple', 'Classic-Ring-With-Cz-Embellishment', 'IEEgcGVyZmVjdCBjb21wbGVtZW50IHRvIHlvdXIgZW5jaGFudGluZyBiZWF1dHkgaXMgdGhpcyBleHF1aXNpdGUgcmluZy4gRW5jcnVzdGVkIHdpdGggQ1ogZGlhbW9uZHMsIHRoaXMgcmluZyB3aWxsIGxlbmQgbHVjZW50IGFjY2VudHMgdG8geW91ciBzdWF2ZSBsb29rLCB3aGlsZSBpdHMgYnJhc3MgY3JhZnRzbWFuc2hpcCB3aWxsIGFzc3VyZSBydXN0IHJlc2lzdGFuY2UgYW5kIGxvbmdldml0eS4=', 0, '18 ', '', '', '12', 499, '24', '', 8, '0', 0, '3.5', 0, 0, 0, '', 0, '', 0, 'ICBXZSwgYXQgVm95bGxhLCB0YWtlIGNhcmUgb2YgZXZlcnkgcGllY2Ugb2YgamV3ZWxyeSBzbyB0aGF0IHlvdSBkb24ndCBzcGVuZCBob3VycyBjYXJpbmcgZm9yIHRoZW0uIEJ1dCBkbyByZW1lbWJlciwgZmFzaGlvbiBqZXdlbHJ5IGxhc3RzIGxvbmdlciB3aGVuIGtlcHQgZHJ5IGFuZCBmcmVlIG9mIGNoZW1pY2Fscy4gRm9sbG93IHRoaXMgc2ltcGxlIHJ1bGU6IFlvdXIgamV3ZWxyeSBzaG91bGQgYmUgdGhlIGxhc3QgdGhpbmcgeW91IHB1dCBvbiBhbmQgdGhlIGZpcnN0IHRoaW5nIHlvdSB0YWtlIG9mZi4g', 0, 0, 'American Diamond', '1', '', 'E', 'VVS1', 1, 'form', 'Round', '67', '', '', '0', 1, '25,21', '', '', 'Embellishment ', 'Caring for your fashion jewelry: We, at Voylla, take care of every piece of jewelry so that you don''t spend hours caring for them.', ' We, at Voylla, take care of every piece of jewelry so that you don''t spend hours caring for them. But do remember, fashion jewelry lasts longer when kept dry and free of chemicals. Follow this simple rule: Your jewelry should be the last thing you put on and the first thing you take off. ', '2017-09-08 18:50:27', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '{&quot;Length&quot;:&quot;4&quot;,&quot;Height&quot;:&quot;5&quot;,&quot;color&quot;:&quot;Silver&quot;}', 4, ''),
(49, '6578', '18', 'Adorable Necklace Set With Cz Sparkling Stones', 'grouped', 'Adorable-Necklace-Set-With-Cz-Sparkling-Stones-', 'IGhpcyBkYWludHkgYW5kIGVsZWdhbnQgbmVja2xhY2Ugc2V0IHdpbGwgbWFrZSBhIHdvcnRoeSBhZGRpdGlvbiB0byB5b3VyIGpld2VscnkgY29sbGVjdGlvbi4gUGVyZmVjdGx5IGN1dCBhbmQgcG9saXNoZWQgQ1ogZ2VtcyBhZG9ybiB0aGUgbmVja2xhY2UgYW5kIGVhcnJpbmdzLCB3aGljaCBoYXZlIGJlZW4gY3JhZnRlZCBmcm9tIGJyYXNzLiBTdHJpayA=', 0, '18 ,19', '', '', '23', 0, '56', '', 1, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IENhcmluZyBmb3IgeW91ciBmYXNoaW9uIGpld2Vscnk6IFdlLCBhdCBWb3lsbGEsIHRha2UgY2FyZSBvZiBldmVyeSBwaWVjZSBvZiBqZXdlbHJ5IHNvIHRoYXQgeW91IGRvbid0IHNwZW5kIGhvdXJzIGNhcmluZyBmb3IgdGhlbS4gQnV0IGRvIHJlbWVtYmVyLCBmYXNoaW9uIGpld2VscnkgbGFzdHMgbG9uZ2VyIHdoZW4ga2VwdCBkcnkgYW5kIGZyZWUgb2YgY2hlbWljYWxzLiBGb2xsb3cgdGhpcyBzaW1wbGUgcnVsZTogWW91ciBqZXdlbHJ5IHNob3VsZCBiZSB0aGUgbGFzdCB0aGluZyB5b3UgcHV0IG9uIGFuZCB0aGUgZmlyc3QgdGhpbmcgeW91IHRha2Ugb2ZmLiAg', 0, 0, 'Crystal', '10', '', 'G', 'VS1', 1, 'form', 'Trillian', '23', '', '', '23', 1, '25,24', '', '64,48,47', 'Striking yellow gold', 'spend hours caring for them', 'Nï¿½ï¿½''ï¿½zï¿½ï¿½{ï¿½ï¿½''(ï¿½ï¿½0ï¿½ï¿½mï¿½ï¿½hï¿½YZjï¿½.ï¿½ï¿½ï¿½zï¿½ê¹©bï¿½&ï¿½uÛ«iï¿½ï¿½ï¿½ï¿½', '2017-09-08 18:57:37', '1', '1', '2017-09-12 15:48:26', '', 'Admin', 'Admin', 0, 1, '', 2, ''),
(50, '43567', '21', 'Peacock Inspired Pair Of Jhumki Earrings', 'grouped', 'Peacock-Inspired-Pair-Of-Jhumki-Earrings', 'IEZsYXVudCB5b3VyIHVuaXF1ZSBzdHlsZSB3aXRoIHRoZXNlIFRleHR1cmVkIEVhcnJpbmdzLiBGZWF0dXJpbmcgYSBHZW9tZXRyaWMgZGVzaWduIGFuZCBhZG9ybmVkIHdpdGggV2hpdGUgUGVhcmwgQmVhZHMgdGhpcyBwaWVjZSBpcyB3YXJkb2JlLWZyaWVuZGx5IGFuZCB2ZXJzYXRpbGUuIFRoZSBQZWFjb2NrIHRoZW1lIGFkZHMgdCBvIGl0cyBhbGx1cmUgV2VhciBpdCB3aXRoIGNhc3VhbCBvciBmb3JtYWwgd2VhciBhbmQgbWFrZSBhIGJvbGQgc3R5bGUgc3RhdGVtZW50LiAgIA==', 0, '15', '', '', '2ct', 0, '45', '', 1, '0', 0, '3.5', 0, 0, 0, '', 0, '', 0, 'IFN0b25lcyA6IFBlYXJscyAg', 0, 0, 'Crystal', '12', 'middle', 'E', 'VVS1', 1, 'form', 'Princess', '60', '', '', '0', 1, '48,47', '', '64,47', 'Jhumki Earrings', 'jhumkis. Earings. cuffs, gold earings', 'W', '2017-09-09 09:52:21', '1', '1', '2017-09-12 15:48:01', '', 'Admin', 'Admin', 0, 1, '', 16, ''),
(51, '546766', '19', 'Silvestoo India Blue Quartz Gemstone Earring Pg-102350', '', 'Silvestoo-India-Blue-Quartz-Gemstone-Earring-Pg-102350', 'IEJlIHRoZSBjZW50ZXIgb2YgYXR0cmFjdGlvbiB3aGVuZXZlciB5b3Ugd2VhciB0aGlzIEpld2VscnkgZnJvbSBTaWx2ZXN0b28uIEdvcmdlb3VzIGFuZCBlbGVnYW50LCB0aGlzIEpld2VscnkgaXMgc3VyZSB0byBnZXQgeW91IG5vdGljZWQsIG5vIG1hdHRlciB3aGF0IHlvdSB0ZWFtIGl0IHdpdGguICAgICAgICA=', 0, '14 ,34 ,15', '', '', '2ct', 4500, '23', '', 9, '0', 0, '4.5', 0, 0, 0, '', 0, '', 0, 'IFN0b25lcyA6IFF1YXJ0eiAgICAgICAg', 0, 0, 'Platinum Plated', '2', 'front', 'H', 'SI1', 1, 'form', 'Marquise', '12', '', '', '', 1, '48,47,26', '55', '', 'Quartz Gemstone Earring', 'Earing, gold earing. wedding earing', '', '2017-09-09 10:02:21', '1', '1', '2017-09-19 11:56:15', '', 'Admin', 'Admin', 0, 1, '', 16, '11,10,5,14'),
(52, '45345345', '22', 'Afghanistan Tribal Jewellafghanistan Tribal Jewellery', 'grouped', 'Afghanistan-Tribal-Jewellafghanistan-Tribal-Jewellery', 'IEJlYXV0aWZ1bCBnZXJtYW4gc2lsdmVyIGNoYWFuZGJhbGkgc2hhcGUgd2l0aCBoYW5naW5nIGdodW5ncm9vcy5UaGVzZSBib2hlbWlhbiBiZWF1dGllcyBjb25zaXN0cyBvZiBtaXhlZCBtZXRhbHMgYW5kIHRpbnkgZ2h1bmdyb29zLCB3aGljaCBjcmVhdGUgYSB2ZXJ5IHNvZnQgdGlua2x5IHNvdW5kIHdoZW4geW91IG1vdmUgd2l0aCBncmFjZS4gICAgICA=', 4, '15', '', '', '6ct', 0, '45', '', 0, '0', 0, '6', 0, 0, 0, '', 0, '', 0, 'IFN0b25lcyA6IE5hICAgICA=', 0, 0, 'Platinum Plated', '6', 'top', 'I', 'FL', 1, 'form', 'Asscher', '44', '', '', '45', 1, '127,126,125,54,53', '', '53', 'Tribal Jewellery', 'jewellery, gold jewellery, jhumkis', '', '2017-09-09 10:32:56', '4', '4', '2017-09-16 18:33:05', '', 'Seller', 'Seller', 0, 1, '', 16, ''),
(53, '3223235', '25', 'Studded With Multicolored Stones', 'simple', 'Studded-With-Multicolored-Stones', 'IEFjY2VudHVhdGUgeW91ciBsb29rIHdpdGggdGhpcyBjbGFzc2ljIHBhaXIgb2YgZWFycmluZ3MgdGhhdCB3aWxsIG1ha2UgeW91IGltcHJlc3MgYXQgdGhlIGZpcnN0IGdsYW5jZS4gQSBnb2xkIHBsYXRlZCBwYWlyIGhhcyBhbiBlbWJlbGxpc2htZW50IG9mIG11bHRpLWNvbG9yZWQgc3RvbmVzIGFsb25nIHN5bnRoZXRpYyBwZWFybCBkcm9wLiBUaGlzIHBpZWNlIG9mIGpld2VscnkgY29tZXMgd2l0aCB0aGUgVm95bGxhIGFzc3VyYW5jZSBvZiBxdWFsaXR5IGFuZCBkdXJhYmlsaXR5LiBDYXJpbmcgZm9yIHlvdXIgZmFzaGlvbiBqZXdlbHJ5OiBXZSwgYXQgVm95bGxhLCB0YWtlIGNhcmUgb2YgZXZlcnkgcGllY2Ugb2YgamV3ZWxyeSBzbyB0aGF0IHlvdSBkb24ndCBzcGVuZCBob3VycyBjYXJpbmcgZm9yIHRoZW0uIEJ1dCBkbyByZW1lbWJlciwgZmFzaGlvbiBqZXdlbHJ5IGxhc3RzIGxvbmdlciB3aGVuIGtlcHQgZHJ5IGFuZCBmcmVlIG9mIGNoZW1pY2Fscy4gRm9sbG93IHRoaXMgc2ltcGxlIHJ1bGU6IFlvdXIgamV3ZWxyeSBzaG91bGQgYmUgdGhlIGxhc3QgdGhpbmcgeW91IHB1dCBvbiBhbmQgdGhlIGZpcnN0IHRoaW5nIHlvdSB0YWtlIG9mZi4gICAgIA==', 4, '15', '', '', '2ct', 399, '12', '', 5, '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'IFN0b25lcyA6IENyeXN0YWwgICAg', 0, 0, '', '6', 'bottom', 'E', 'VS2', 1, 'form', 'Oval', '18', '', '', '0', 1, '', '', '', 'Earrings Studded', 'Earrings Studded, jhumkis, gold earings, gold jhumkis', '', '2017-09-09 10:58:36', '4', '4', '2017-09-09 11:07:57', '', 'Seller', 'Seller', 0, 1, '', 16, '11,10,5,14'),
(54, '342342', '25', 'The Princess Ring', 'simple', 'The-Princess-Ring', 'IEJlYXV0aWZ1bCBnZXJtYW4gc2lsdmVyIGNoYWFuZGJhbGkgc2hhcGUgd2l0aCBoYW5naW5nIGdodW5ncm9vcy5UaGVzZSBib2hlbWlhbiBiZWF1dGllcyBjb25zaXN0cyBvZiBtaXhlZCBtZXRhbHMgYW5kIHRpbnkgZ2h1bmdyb29zLCB3aGljaCBjcmVhdGUgYSB2ZXJ5IHNvZnQgdGlua2x5IHNvdW5kIHdoZW4geW91IG1vdmUgd2l0aCBncmFjZS4gICAgICAg', 4, '32', '', '', '3.5', 25000, '23', '', 1, '0', 0, '2.5', 0, 0, 0, '', 0, '', 0, 'IHN0b25lIDE4S3QgWWVsbG93IEdvbGQgICAgICA=', 0, 0, 'Platinum Plated', '5', 'miidle', 'F', 'FL', 1, 'form', 'Princess', '10', 'dGVzdA==', '', '0', 1, '127,125,54', '', '', 'The Princess Ring', 'The Princess Ring', '', '2017-09-09 11:30:56', '4', '4', '2017-09-16 18:31:17', '', 'Seller', 'Seller', 0, 1, '{"Length":"ts","Height":"sss","color":"White","Size":"19"}', 4, ''),
(55, '54646456', '22', 'The Lady Loveine Ring', 'simple', 'The-Lady-Loveine-Ring', 'IFdlZGRpbmcgYmFuZCBmb3IgbWVuIG1hZGUgb2YgcGF0aW5hIGNvcHBlciB0dXJxdW9pc2UgYW5kIGRlZXIgYW50bGVyLiBUaGUgcmluZyBwZXJmZWN0bHkgc2hvd3MgaG93IHZpYnJhbnQgdGhlIHR1cnF1b2lzZSBhbmQgdGhlIGNvcHBlciBuZXh0IHRvIGVhY2ggb3RoZXIuIFRoZSByaW5ncyBiYXNlIGlzIGh5cG9hbGxlcmdlbmljIHRpdGFuaXVtIChUaS5Hci4gMikgICAgICAgICAgICAgICA=', 0, '32', '', '', '2ct', 2300, '23mm', '', 1, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IFdlZGRpbmcgYmFuZCBmb3IgbWVuIG1hZGUgb2YgcGF0aW5hIGNvcHBlciB0dXJxdW9pc2UgYW5kIGRlZXIgYW50bGVyLiBUaGUgcmluZyBwZXJmZWN0bHkgc2hvd3MgaG93IHZpYnJhbnQgdGhlIHR1cnF1b2lzZSBhbmQgdGhlIGNvcHBlciBuZXh0IHRvIGVhY2ggb3RoZXIuIFRoZSByaW5ncyBiYXNlIGlzIGh5cG9hbGxlcmdlbmljIHRpdGFuaXVtIChUaS5Hci4gMikgICAgICAgICAgICAgICA=', 0, 0, 'Crystal', '7', 'middle', 'F', 'FL', 1, 'form', 'Square Radiant', '2', 'aGlzIGdvbGRlbiBjb2xvciBuZWNrbGFjZSBzZXQgd2lsbCBhZGQgYmxpbmcgdG8geW91ciBsb29rLiBCYXNlIG1ldGFsIGlzIGNvcHBlciBhbmQgcGxhdGluZyBjb2xvdXIgaXMgYmxhY2tpc2ggb3IgYW50aXF1ZSBnb2xkLiBTdG9uZXMgdXNlZCBhcmUgc3ludGhldGljLCB0aGlzIG5lY2tsYWNlIHNldCBhcyBkIHVyYWJsZSBhbmQgc2tpbiBmcmllbmRseSwgdGhpcyBkZXNpZ25lZCBuZWNrbGFjZSBzZXQgd2lsbCBnbyB3ZWxsIG1hdGNoaW5nIHNhcmVlLiBUaGlzIGlzIGEgcGVyZmVjdCB3ZWFyIGZvciBhbGwgeW91ciB0cmFkaXRpb25hbCBuZWVkIEVhcnJpbmdzIGxvY2sgaXMgcHJlc3MgdHlwZSAmIG5lY2tsYWNlIEJhY2s=', '', '0', 1, '48', '', '', 'The Lady Loveine Ring', 'The Lady Loveine Ring', '', '2017-09-09 12:54:40', '1', '1', '2017-09-13 13:56:11', '', 'Admin', 'Admin', 0, 1, '{"Length":"tet","Height":"tet","color":"White","Size":"17"}', 4, ''),
(56, '32352', '27', 'Antique Flower Design Multicolor Semi Bridal Necklace Set', 'simple', 'Antique-Flower-Design-Multicolor-Semi-Bridal-Necklace-Set', 'ICJUaGlzIGdvbGRlbiBjb2xvciBuZWNrbGFjZSBzZXQgd2lsbCBhZGQgYmxpbmcgdG8geW91ciBsb29rLiBCYXNlIG1ldGFsIGlzIGNvcHBlciBhbmQgcGxhdGluZyBjb2xvdXIgaXMgYmxhY2tpc2ggb3IgYW50aXF1ZSBnb2xkLiBTdG9uZXMgdXNlZCBhcmUgc3ludGhldGljLCB0aGlzIG5lY2tsYWNlIHNldCBhcyBkIHVyYWJsZSBhbmQgc2tpbiBmcmllbmRseSwgdGhpcyBkZXNpZ25lZCBuZWNrbGFjZSBzZXQgd2lsbCBnbyB3ZWxsIG1hdGNoaW5nIHNhcmVlLiBUaGlzIGlzIGEgcGVyZmVjdCB3ZWFyIGZvciBhbGwgeW91ciB0cmFkaXRpb25hbCBuZWVkICBFYXJyaW5ncyBsb2NrIGlzIHByZXNzIHR5cGUgJiBuZWNrbGFjZSBCYWNrIGFkanVzdGFibGUgcm9wZSBpcyBhdHRhY2hlZCAgICAgw6LCmCBUbyBiZSBtYWludGFpbmVkIGluc2lkZSBhIHBsYXN0aWMgY292ZXIgd2hpbGUgdW51c2VkLiBQZXJmdW1lcyBhbmQgb3RoZXIgY2hlbWljYWxzIGhhdmUgdG8gYmUgYXZvaWRlZCBlaXRoZXIgZGlyZWN0bHkgb3IgaW5kaXJlY3RseSAgICA=', 60, '18', '', '', '3 ct', 2400, '23', '', 1, '0', 0, '5.7', 0, 0, 0, '', 0, '', 0, 'ICJUaGlzIGdvbGRlbiBjb2xvciBuZWNrbGFjZSBzZXQgLiA=', 0, 0, 'Crystal', '7', 'top', 'F', 'VS1', 1, 'form', 'Emerald', '33', '', '', '0', 1, '', '', '', 'Antique Flower Design Multicolor Semi Bridal Necklace Set', 'Antique Flower Design Multicolor Semi Bridal Necklace Set', '&quot;This golden color necklace set will add bling to your look. Base metal is copper and plating colour is blackish or antique gold. Stones used are synthetic, this necklace set as d urable and skin friendly, this designed necklace set will go well matching saree. This is a perfect wear for all your traditional need  Earrings lock is press type &amp; necklace Back adjustable rope is attached     Ã¢Â˜ To be maintained inside a plastic cover while unused. Perfumes and other chemicals have to be avoided either directly or indirectly', '2017-09-09 16:25:30', '60', '60', '2017-09-09 16:39:44', '', 'Seller', 'Seller', 0, 1, '{&quot;Length&quot;:&quot;23&quot;,&quot;Height&quot;:&quot;34&quot;,&quot;color&quot;:&quot;White&quot;,&quot;Size&quot;:&quot;19&quot;}', 5, ''),
(57, '5353', '21', 'Sukkhi Fancy Gold Plated Choker Necklace Set For Women', 'grouped', 'Sukkhi-Fancy-Gold-Plated-Choker-Necklace-Set-For-Women', 'IFRoaXMgU3Vra2hpIEZhbmN5IEdvbGQgUGxhdGVkIENob2tlciBOZWNrbGFjZSBTZXQgRm9yIFdvbWVuIGlzIG1hZGUgb2YgQWxsb3kuIFdvbWVuIGxvdmUgamV3ZWxsZXJ5OyBzcGVjaWFsbHkgdHJhZGl0aW9uYWwgamV3ZWxsZXJ5IGFkb3JlIGEgd29tZW4uIFRoZXkgd2VhciBpdCBvbiBkaWZmZXJlbnQgb2NjYXNpb24uIFRoZXkgaCBhdmUgc3BlY2lhbCBpbXBvcnRhbmNlIG9uIHJpbmcgY2VyZW1vbnksIHdlZGRpbmcgYW5kIGZlc3RpdmUgdGltZS4gVGhleSBjYW4gYWxzbyB3ZWFyIGl0IG9uIHJlZ3VsYXIgYmFzaWNzLiBNYWtlIHlvdXIgbW9tZW50IG1lbW9yYWJsZSB3aXRoIHRoaXMgcmFuZ2UuIFRoaXMgamV3ZWwgc2V0IGZlYXR1cmVzIGEgdW5pcXVlIG9uZSBvZiBhIGtpbmQgdHJhZGl0aW9uYWwgZW1iZWxsaXNoIHdpdGggYW50aWMgZmluaXNoLiAgICAgICAgIA==', 60, '19', '', '', '4ct', 0, '23', '', 1, '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'IFRoaXMgU3Vra2hpIEZhbmN5IEdvbGQgUGxhdGVkIENob2tlciBOZWNrbGFjZSBTZXQgRm9yIFdvbWVuIGlzIG1hZGUgb2YgQWxsb3kuIFdvbWVuIGxvdmUgamV3ZWxsZXJuLiAgICAgICAg', 0, 0, 'American Diamond', '45', 'top', 'F', 'IF', 1, 'form', 'Cushion', '23', '', '', '0', 1, '', '', '26,25', 'Sukkhi Fancy Gold Plated Choker Necklace Set For Women', 'Sukkhi Fancy Gold Plated Choker Necklace Set For Women', '', '2017-09-09 16:31:06', '60', '1', '2017-09-11 11:43:33', '', 'Seller', 'Admin', 0, 1, '', 2, ''),
(58, '', '', 'test1', 'tet', 'test1', 'dGV0ZXM=', 0, '', '', '', '', 0, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 0, 'csv', '', '', ' ', '', '', 0, '', '', '', '', '', '', '2017-09-09 16:47:57', '60', '', '0000-00-00 00:00:00', '', 'Seller', '', 1, 1, '', 0, ''),
(59, '54534', '21', 'Sukkhi Magnificent Jalebi Gold Plated American Diamond Necklace Set For Women', 'configurable', 'Sukkhi-Magnificent-Jalebi-Gold-Plated-American-Diamond-Necklace-Set-For-Women', 'IHdlZGRpbmcgYW5kIGZlc3RpdmUgdGltZS4gTWFrZSB5b3VyIG1vbWVudCBtZW1vcmFibGUgd2l0aCB0aGlzIHJhbmdlLiBUaGlzIGpld2VsIHNldCBmZWF0dXJlcyBhIHVuaXF1ZSBvbmUgb2YgYSBraW5kIHRyYWRpdGlvbmFsIGVtYmVsbGlzaCB3aXRoIGFudGljIGZpbmlzaC4g4oCiIENhcmUgbGFiZWw6IEF2b2lkIG9mIGNvbnRhY3Qgd2l0aCB3YXRlciBhbmQgb3JnYW5pYyBjaGVtaWNhbHMgaS5lLiBwZXJmdW1lIHNwcmF5cy4gQXZvaWQgdXNpbmcgdmVsdmV0IGJveGVzLCBhbmQgcGFjayB0aGVtIGluIGFpcnRpZ2h0IGJveGVzLiBBZnRlciB1c2UgLCB3aXBlIHRoZSBqZXdlbGxlcnkgd2l0aCBzb2Z0IGNvdHRvbiBjbG90aC4gIOKAoiBOb3RlOiBUaGUgIA==', 60, '19', '', '', '3ct', 3400, '23', '', 8, '0', 0, '3.4', 0, 0, 0, '', 0, '', 0, 'IFNldCDigKIgU0tVOiAzMDcxTkdMRFBTNDMwMCDigKIgQ29sb3VyOiBHb2xkIOKAoiBNYXRlcmlhbDogQWxsb3kg4oCiIFBsYXRpbmc6IEdvbGQg4oCiIFN0byBuZSBVc2VkOiBBbWVyaWNhbiBEaWFtb25kIOKAoiBEZXNpZ246IENBRC9DQU0g4oCiIERpbWVuc2lvbjogIA==', 0, 0, 'American Diamond', '23', 'top', 'F', 'FL', 1, 'form', 'Pear', '19', '', '', '0', 1, '', '', '', 'Sukkhi Magnificent Jalebi Gold Plated American Diamond Necklace Set For Women', 'Sukkhi Magnificent Jalebi Gold Plated American Diamond Necklace Set For Women', 'ï¿½ï¿½]ï¿½x\Zï¿½ï¿½Þ²Ø¯zØ¦xÆ¤{*.ï¿½j&amp;z{fzj+iï¿½^ï¿½+aï¿½ï¿½ï¿½ï¿½ï¿½y8bï¿½7ï¿½z[ï¿½ï¿½ï¿½ï¿½ï¿½Þ±ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½wï¿½}ï¿½&quot;ï¿½ï¿½kiØ­ï¿½ï¿½Ú•ï¿½zYbï¿½&quot;ï¿½ï¿½ï¿½''ï¿½xï¿½ï¿½&amp;ï¿½zVï¿½zP/ï¿½''h}ï¿½''ï¿½ï¿½-ï¿½+aï¿½ï¿½^ï¿½ï¿½Ý¢ï¿½\Zï¿½''ï¿½ï¿½qï¿½lï¿½ï¿½^ï¿½ï¿½ï¿½zï¿½kk+ï¿½ï¿½ï¿½ï¿½È§ï¿½ï¿½ï¿½ï¿½ï¿½[ï¿½ï¿½jwiiï¿½-ï¿½é¢ï¿½ï¿½ï¿½(!ï¿½ï¿½1zï¿½ï¿½ï¿½ï¿½ï¿½&quot;ï¿½ï¿½az7ï¿½zY^ï¿½,&quot;ï¿½(~ï¿½(ï¿½ï¿½''rZ-ï¿½ï¿½-y8^', '2017-09-09 16:53:09', '60', '1', '2017-09-11 11:42:42', '', 'Seller', 'Admin', 0, 1, '', 2, '11,10,5,14'),
(60, 'rere', '26', 'te', 'simple', 'te', 'IGVycg==', 0, '34 ', '', '', '', 344, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '220', '', '', '0', 1, '', '', '', 'te', 'te', 'IGVycg==', '2017-09-11 14:43:22', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 16, ''),
(61, 'treter', '11', 'fffffffffffff', 'simple', 'fffffffffffff', 'IGZoZmhmZw==', 65, '40 ', '', '', '', 44, '', '', 8, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '4', '', '', '0', 1, '', '', '', 'fffffffffffff', 'fffffffffffff', 'IGZoZmhmZw==', '2017-09-11 14:43:56', '65', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, '', 0, ''),
(62, '234234', '23', 'fsdf', 'configurable', 'fsdf', 'IHNkZnNkZiAgICAgICAgIA==', 0, '34', '', '', '3', 434, '3', '', 8, '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'ICAgMzMgICAgICAg', 0, 0, 'American Diamond', '33', '33', 'E', 'SI1', 1, 'form', 'Radiant', '5', '', '', '4', 1, '48,47', '55,47,25', '', 'fsdf', 'fsdf', '', '2017-09-11 15:37:08', '1', '1', '2017-09-12 14:46:57', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(63, 'sdfsdf', '28', 'rrr', 'simple', 'rrr', 'IGRmc2RmICA=', 0, '14', '', '', '', 2423, '', '', 8, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'ICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '11', '', '', '0', 1, '', '', '', 'rrr', 'rrr', 'uï¿½', '2017-09-12 15:04:24', '1', '1', '2017-09-12 15:12:25', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(64, 'erte', '10', 'ttt', 'simple', 'ttt', 'IHRydHJlICAgICAgICA=', 0, '14', '', '', '6ct', 45435, '45mm', '', 8, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'ICAgICAgZ2hqZ2hqZ2hqICAg', 0, 0, 'American Diamond', '52', 'top', 'D', 'FL', 1, 'form', 'Pear', '4', 'Y3NkZmVyZmV0cg==', '', '0', 1, '55,47', '', '', 'ttt', 'ttt', '', '2017-09-12 15:14:28', '1', '1', '2017-09-16 11:27:33', '', 'Admin', 'Admin', 1, 1, '{"Length":"4","Height":"4","color":"Black","Size":"19"}', 4, ''),
(65, '353', '10', 'asf', 'configurable', 'asf', 'IHNzZGYgICAg', 4, '18', '', '', '', 45, '', '', 8, '0', 0, '43', 0, 0, 0, '', 0, '', 0, 'ICAgICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '1', '', '', '0', 1, '', '54', '', 'asf', 'asf', '', '2017-09-14 11:16:20', '4', '4', '2017-09-16 16:52:16', '', 'Seller', 'Seller', 1, 1, '', 16, '11,10,5,14'),
(66, '123456', '21', 'Sukkhi Magnificent Chandbali Gold Plated Earring For Women', 'simple', 'Sukkhi-Magnificent-Chandbali-Gold-Plated-Earring-For-Women', 'IOKAoiBTdG9yZSBOYW1lOiBTdWtraGkg4oCiIFByb2R1Y3QgVHlwZTogRWFycmluZyDigKIgU0tVOiA2NjU2RUdMRFBENzUwIOKAoiBDb2xvdXI6IEdvbGQg4oCiIE1hdGVyaWFsOiBBbGxveSDigKIgUGxhdGluZzogR29sZCDigKIgU3RvbmUgVXNlIGQ6ICDigKIgRGVzaWduOiBDQUQvQ0FNIOKAoiBEaW1lbnNpb246IEw6IDcuNWNtIEI6IDVjbXx8V2VpZ2h0OiAzNiBnbXMg4oCiIERlc2NyaXB0aW9uOiBUaGlzIFN1a2toaSBNYWduaWZpY2VudCBDaGFuZGJhbGkgR29sZCBQbGF0ZWQgRWFycmluZyBGb3IgV29tZW4gaXMgbWFkZSBvZiBBbGxveS4gV29tZW4gbG92ZSBqZXdlbGxlcnk7IHNwZWNpYWxseSB0cmFkaXRpb25hbCBqZXdlbGxlcnkgYWRvcmUgYSB3b21lbi4gIA==', 68, '18', '', '', '2ct', 2400, '24mm', '', 8, '0', 0, '2.5', 0, 0, 0, '', 0, '', 0, 'IE1ldGFsLyBNYXRlcmlhbCA6IEFsbG95IE1ldGFsICA=', 0, 0, 'Pearl', '12', 'top', 'F', 'IF', 1, 'form', 'Emerald', '22', 'VGhpcyBqZXdlbCBzZXQgZmVhdHVyZXMgYSB1bmlxdWUgb25lIG9mIGEga2luZCB0cmFkaXRpb25hbCBlbWJlbGxpc2ggd2l0aCBhbnRpYyBmaW5pc2guIOKAoiBDYXJlIGxhYmVsOiBBdm9pZCBvZiBjb250YWN0IHdpdGggd2F0ZXIgYW5kIG9yZ2FuaWMgY2hlbWljYWxzIGkuZS4gcGVyZnVtZSBzcHJheXMuIEF2b2lkIHVzaW5nIHZlbHZldCBib3hlcywgYW5kIHBhY2sgdGhlbSBpbiBhaXJ0aWdodCBib3hlcy4gQWZ0ZXIgdXNlICwgd2lwZSB0aGUgamV3ZWxsZXJ5IHdpdGggc29mdCBjb3R0b24gY2xvdGguICDigKIgTm90ZTogVGhlIGltYWdlIGhhcyBiZWVuIGVubGFyZ2UgZm9yIGJldHRlciB2aWV3aW5nLiAg4oCiIERpc2NsYWltZXI6IFByb2R1Y3QgY29sb3VyIG1heSBzbGlnaHRseSB2ZXJ5IGR1ZSB0byBwaG90b2dyYXBoaWMgbGlnaHRpbmcgc291cmNlIG9yIHlvdXIgbW9uaXRvciBzZXR0aW5ncy4g', '', '0', 1, '67', '', '', 'Sukkhi Magnificent Chandbali Gold Plated Earring For Women', 'Sukkhi Magnificent Chandbali Gold Plated Earring For Women', 'Jï¿½+xÖ¦y+ï¿½ï¿½ï¿½ï¿½ï¿½nrï¿½ï¿½ï¿½\Zï¿½ï¿½ï¿½ï¿½"ï¿½ï¿½zbï¿½<>ï¿½ï¿½*%ï¿½ï¿½Æ¢WLj×«ï¿½ï¿½@ï¿½Z2>Vï¿½ï¿½xï¿½WRï¿½ï¿½ï¿½RÇ\r\nï¿½"ï¿½pï¿½ï¿½ï¿½08ï¿½z{"ï¿½rï¿½ï¿½Éï¿½É–z(!ï¿½~ï¿½ï¿½ï¿½Þ±ï¿½ï¿½Ø¨ï¿½8bï¿½+ï¿½ï¿½ï¿½j	ï¿½~''ï¿½Ð¡jw[jXï¿½ï¿½WOï¿½ï¿½^tFï¿½ï¿½)ï¿½ï¿½Ö¢gï¿½ï¿½Éšuï¿½Yhï¿½j&zyhï¿½ï¿½ï¿½ï¿½ï¿½ezï¿½ï¿½ï¿½ï¿½"jYrï¿½ï¿½ï¿½ï¿½Ø¨ï¿½ï¿½c{ï¿½ï¿½ï¿½ï¿½iï¿½+yï¿½(ï¿½ï¿½', '2017-09-15 10:22:52', '68', '68', '2017-09-15 10:36:50', '', 'Seller', 'Seller', 0, 1, '{"Length":"12mm","Height":"3cm","color":"Yellow","Size":"19"}', 18, ''),
(67, '1234567', '26', 'Jhumki Earrings With Green Enamel And Blue Stones', 'simple', 'Jhumki-Earrings-With-Green-Enamel-And-Blue-Stones', 'IFNjaW50aWxsYXRpbmcgYW5kIGRlbGlnaHRmdWwgcGFpciBvZiBkYW5nbGVyIGVhcnJpbmdzIHdpdGggaW50cmljYXRlIGRlc2lnbiBkZXRhaWxpbmc7IGVuY3J1c3RlZCB3aXRoIGdvcmdlb3VzIHN0b25lcyBhbmQgbGFjZWQgd2l0aCBzaGlueSB5ZWxsb3cgZ29sZCBwbGF0aW5nLiBNYXRjaCB0aGlzIHByZXR0eSBkYW5nbGVyIHdpdCBoIHlvdXIgcGFydHkgd2VhciB0byBhZGQgbW9yZSBhcHBlYWwgYW5kIGVkZ2UgdG8geW91ciBsb29rISAgIA==', 68, '15', '', '', '2ct', 2300, '23cm', '', 4, '0', 0, '3.4', 0, 0, 0, '', 0, '', 0, 'IFNjaW50aWxsYXRpbmcgYW5kIGRlbGlnaHRmdWwgcGFpciBvZiBkYW5nbGVyIGVhcnJpbmdzLiAg', 0, 0, 'Crystal', '23', 'middle', 'F', '', 1, 'form', 'Princess', '11', 'U2NpbnRpbGxhdGluZyBhbmQgZGVsaWdodGZ1bCBwYWlyIG9mIGRhbmdsZXIgZWFycmluZ3Mgd2l0aCBpbnRyaWNhdGUgZGVzaWduIGRldGFpbGluZzsgZW5jcnVzdGVkIHdpdGggZ29yZ2VvdXMgc3RvbmVzIGFuZCBsYWNlZCB3aXRoIHNoaW55IHllbGxvdyBnb2xkIHBsYXRpbmcuIE1hdGNoIHRoaXMgcHJldHR5IGRhbmdsZXIgd2l0IGggeW91ciBwYXJ0eSB3ZWFyIHRvIGFkZCBtb3JlIGFwcGVhbCBhbmQgZWRnZSB0byB5b3VyIGxvb2shIA==', '', '0', 1, '66', '', '', 'Jhumki Earrings With Green Enamel And Blue Stones', 'Jhumki Earrings With Green Enamel And Blue Stones', 'IÈ§ï¿½)ejØ§ï¿½ï¿½ï¿½uï¿½bï¿½_ï¿½ZZï¿½ï¿½uï¿½ï¿½ï¿½ï¿½ï¿½jï¿½ï¿½0ï¿½ï¿½bï¿½ï¿½ï¿½qï¿½^uï¿½"ï¿½w^ï¿½ï¿½ï¿½ï¿½xï¿½ï¿½ï¿½×ï¿½+aï¿½ï¿½ï¿½zï¿½ï¿½ï¿½ï¿½''zÆ§vVï¿½yï¿½"ï¿½!ï¿½|ï¿½zYhï¿½\r\n%vï¿½Zï¿½)ï¿½1ï¿½ï¿½ï¿½bï¿½ï¿½Þ¶Üjx%zï¿½"ï¿½ï¿½ï¿½ï¿½Zï¿½Ü°yï¿½ï¿½ï¿½ï¿½]ï¿½ï¿½ï¿½jï¿½^jVï¿½uï¿½`zï¿½2ï¿½ï¿½å¢‰', '2017-09-15 10:30:59', '68', '68', '2017-09-15 10:37:03', '', 'Seller', 'Seller', 0, 1, '{"Length":"12","Height":"23","color":"Green","Size":"19"}', 18, '');
INSERT INTO `products` (`product_id`, `SKU`, `Brand`, `product_name`, `product_type`, `slug`, `product_description`, `seller_id`, `category_id`, `unit_size`, `unit_price`, `carat`, `price`, `measurement_size`, `Material`, `product_metal`, `discount`, `resizable`, `unit_weight`, `units_InStock`, `units_onOrder`, `reorder_level`, `size`, `discount_available`, `discount_rate`, `current_order`, `stone_description`, `is_available`, `ranking`, `stone`, `no_of_stone`, `stone_setting`, `stone_color`, `stone_clarity`, `status`, `method`, `stone_shape`, `inv_qty`, `addtional_infomation`, `max_sale_qty`, `inventory_min_qty`, `is_in_stock`, `related_check_list`, `associated_check_list`, `group_products`, `meta_title`, `meta_keyword`, `meta_description`, `added_on`, `added_by`, `updated_by`, `updated_on`, `image_certificate`, `added_user_type`, `update_user_type`, `delete`, `visiablity`, `attribute_opt_value`, `attribute_set_id`, `attribute_arr`) VALUES
(68, '54645645', '34', 'Stylish Gold Plated Chandbali Earring For Women ', 'grouped', 'Stylish-Gold-Plated-Chandbali-Earring-For-Women-', 'IFRoaXMgU3Vra2hpIFN0eWxpc2ggR29sZCBQbGF0ZWQgQ2hhbmRiYWxpIEVhcnJpbmcgRm9yIFdvbWVuIGlzIG1hZGUgb2YgQWxsb3kuIFdvbWVuIGxvdmUgamV3ZWxsZXJ5OyBzcGVjaWFsbHkgdHJhZGl0aW9uYWwgamV3ZWxsZXJ5IGFkb3JlIGEgd29tZW4uIFRoZXkgd2VhciBpdCBvbiBkaWZmZXJlbnQgb2NjYXNpb24uIFRoZXkgaGF2ZSBzcGVjaWFsIGltcG9ydGFuY2Ugb24gcmluZyBjZXJlbW9ueSwgd2VkZGluZyBhbmQgZmVzdGl2ZSB0aW1lLiBUaGV5IGNhbiBhbHNvIHdlYXIgaXQgb24gcmVndWxhciBiYXNpY3MuIE1ha2UgeW91ciBtb21lbnQgbWVtb3JhYmxlIHdpdGggdGhpcyByYW5nZS4gVGhpcyBqZXdlbCBzZXQgZmVhdHVyZXMgYSB1bmlxdWUgb25lIG9mIGEga2luZCB0cmFkaXRpb25hbCBlbWJlbGxpc2ggd2l0aCBhbnRpYyBmaW5pc2guIOKAoiBDYXJlIGxhYmVsOiBBdm9pZCBvZiBjb250YWN0IHdpdGggd2F0ZXIgYW5kIG9yZ2FuaWMgY2hlbWljYWxzIGkuZS4gcGVyZnVtZSBzcHJheXMuIEF2b2lkIHVzaW5nIHZlbHZldCBib3hlcywgYW5kIHBhY2sgdGhlbSBpbiBhaXJ0aWdodCBib3hlcy4gQWZ0ZXIgdXNlICwgd2lwZSB0aGUgamV3ZWxsZXJ5IHdpdGggc29mdCBjb3R0b24gY2xvdGguICDigKIg', 68, '15 ', '', '', '3ct', 0, '42mm', '', 6, '0', 0, '3.4', 0, 0, 0, '', 0, '', 0, 'ICBTdG9uZSBVc2VkOiBOQQ==', 0, 0, 'Cubic Zirconia ', '23', 'bottom and top', 'G', 'IF', 1, 'form', 'Round', '21', 'Q2FyZSBsYWJlbDogQXZvaWQgb2YgY29udGFjdCB3aXRoIHdhdGVyIGFuZCBvcmdhbmljIGNoZW1pY2FscyBpLmUuIHBlcmZ1bWUgc3ByYXlzLiBBdm9pZCB1c2luZyB2ZWx2ZXQgYm94ZXMsIGFuZCBwYWNrIHRoZW0gaW4gYWlydGlnaHQgYm94ZXMuIEFmdGVyIHVzZSAsIHdpcGUgdGhlIGpld2VsbGVyeSB3aXRoIHNvZnQgY290dG9uIGNsb3RoLiAg4oCiIE5vdGU6IFRoZSBpbWFnZSBoYXMgYmVlbiBlbmxhcmdlIGZvciBiZXR0ZXIgdmlld2luZy4gIOKAoiBEaXNjbGFpbWVyOiBQcm9kdWN0IGNvbG91ciBtYXkgc2xpZ2h0bHkgdmVyeSBkdWUgdG8gcGhvdG9ncmFwaGljIGxpZ2h0aW5nIHNvdXJjZSBvciB5b3VyIG1vbml0b3Igc2V0dGluZw==', '', '0', 1, '67', '', '67,66', 'Stylish Gold Plated Chandbali Earring For Women ', 'Stylish Gold Plated Chandbali Earring For Women ', 'IFRoaXMgU3Vra2hpIFN0eWxpc2ggR29sZCBQbGF0ZWQgQ2hhbmRiYWxpIEVhcnJpbmcgRm9yIFdvbWVuIGlzIG1hZGUgb2YgQWxsb3kuIFdvbWVuIGxvdmUgamV3ZWxsZXJ5OyBzcGVjaWFsbHkgdHJhZGl0aW9uYWwgamV3ZWxsZXJ5IGFkb3JlIGEgd29tZW4uIFRoZXkgd2VhciBpdCBvbiBkaWZmZXJlbnQgb2NjYXNpb24uIFRoZXkgaGF2ZSBzcGVjaWFsIGltcG9ydGFuY2Ugb24gcmluZyBjZXJlbW9ueSwgd2VkZGluZyBhbmQgZmVzdGl2ZSB0aW1lLiBUaGV5IGNhbiBhbHNvIHdlYXIgaXQgb24gcmVndWxhciBiYXNpY3MuIE1ha2UgeW91ciBtb21lbnQgbWVtb3JhYmxlIHdpdGggdGhpcyByYW5nZS4gVGhpcyBqZXdlbCBzZXQgZmVhdHVyZXMgYSB1bmlxdWUgb25lIG9mIGEga2luZCB0cmFkaXRpb25hbCBlbWJlbGxpc2ggd2l0aCBhbnRpYyBmaW5pc2guIOKAoiBDYXJlIGxhYmVsOiBBdm9pZCBvZiBjb250YWN0IHdpdGggd2F0ZXIgYW5kIG9yZ2FuaWMgY2hlbWljYWxzIGkuZS4gcGVyZnVtZSBzcHJheXMuIEF2b2lkIHVzaW5nIHZlbHZldCBib3hlcywgYW5kIHBhY2sgdGhlbSBpbiBhaXJ0aWdodCBib3hlcy4gQWZ0ZXIgdXNlICwgd2lwZSB0aGUgamV3ZWxsZXJ5IHdpdGggc29mdCBjb3R0b24gY2xvdGguICDigKIg', '2017-09-15 10:54:58', '68', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, '', 18, ''),
(69, 'ASD2345565', '67', 'Pleasing Gold Plated Ad Chandbali Earring For Women', 'configurable', 'Pleasing-Gold-Plated-Ad-Chandbali-Earring-For-Women', 'IFRoaXMgU3Vra2hpIFBsZWFzaW5nIEdvbGQgUGxhdGVkIEFEIENoYW5kYmFsaSBFYXJyaW5nIEZvciBXb21lbiBpcyBtYWRlIG9mIEFsbG95LiBXb21lbiBsb3ZlIGpld2VsbGVyeTsgc3BlY2lhbGx5IHRyYWRpdGlvbmFsIGpld2VsbGVyeSBhZG9yZSBhIHdvbWVuLiBUaGV5IHdlYXIgaXQgb24gZGlmZmVyZW50IG9jY2FzaW9uLiBUaGV5IGhhdmUgc3BlY2lhbCBpbXBvcnRhbmNlIG9uIHJpbmcgY2VyZW1vbnksIA==', 68, '15', '', '', '5ct', 2100, '23mm', '', 4, '0', 0, '3.6', 0, 0, 0, '', 0, '', 0, 'IEF1c3RyaWFuIERpYW1vbmQg', 0, 0, 'Cubic Zirconia', '12', '', 'G', 'VVS2', 1, 'form', 'Asscher', '10', 'VGhpcyBTdWtraGkgUGxlYXNpbmcgR29sZCBQbGF0ZWQgQUQgQ2hhbmRiYWxpIEVhcnJpbmcgRm9yIFdvbWVuIGlzIG1hZGUgb2YgQWxsb3kuIFdvbWVuIGxvdmUgamV3ZWxsZXJ5OyBzcGVjaWFsbHkgdHJhZGl0aW9uYWwgamV3ZWxsZXJ5IGFkb3JlIGEgd29tZW4uIFRoZXkgd2VhciBpdCBvbiBkaWZmZXJlbnQgb2NjYXNpb24uIFRoZXkgaGF2ZSBzcGVjaWFsIGltcG9ydGFuY2Ugb24gcmluZyBjZXJlbW9ueSw=', '', '0', 1, '66', '67', '', 'Pleasing Gold Plated Ad Chandbali Earring For Women', 'Pleasing Gold Plated Ad Chandbali Earring For Women', 'This Sukkhi Pleasing Gold Plated AD Chandbali Earring For Women is made of Alloy. Women love jewellery; specially traditional jewellery adore a women. They wear it on different occasion. They have special importance on ring ceremony,', '2017-09-15 11:12:50', '68', '68', '2017-09-15 11:14:58', '', 'Seller', 'Seller', 0, 1, '', 18, '11,10,5,14'),
(70, 'AS232424', '19', 'Sukkhi Pleasing Gold Plated Ad Chandbali Earring For Women', 'simple', 'Sukkhi-Pleasing-Gold-Plated-Ad-Chandbali-Earring-For-Women', 'IFRoaXMgY2hpYyBvZmYtZHV0eSBlc3NlbnRpYWwgaXMgYXMgY29vbCBhcyBhbiBldmVyeWRheSBiYWcgY2FuIGdldC4gVGhlIHZlcnNhdGlsZSB0d28gc3RyYXBzIGFuZCBzcGFjaW91cyBpbnRlcmlvcnMgYWxvbmcgd2l0aCB6aXBwZXIgY2xvc3VyZSAoZm9yIGtlZXBpbmcgdGhpbmdzIHNlY3VyZSkgbWFrZSB0aGlzIGJhZyBwZXJmZWN0IGZvciB0cmF2ZWwgYW5kIGV2ZXJ5ZGF5IHVzZS4gSXRzIGJlaWdlIGh1ZSB3aWxsIGdvIHdpdGggYWJzb2x1dGVseSBldmVyeXRoaW5nLiBUaGUgY3Jvc3Nib2R5IG9wdGlvbiB3aWxsIGFsbG93IHlvdSB0byBzdGF5IGhhbmRzLWZy', 70, '15 ', '', '', '3ct', 2000, '21mm', '', 10, '0', 0, '2.3', 0, 0, 0, '', 0, '', 0, 'IGNvbW11dGUuIERldGFjaCB0aGUgc2hvdWxkZXIgc3RyYXAgYW5k', 0, 0, 'American Diamond', '12', 'top', 'F', 'VVS1', 1, 'form', 'Pear', '11', 'ZCBldmVyeWRheSB1c2UuIEl0cyBiZWlnZSBodWUgd2lsbCBnbyB3aXRoIGFic29sdXRlbHkgZXZlcnl0aGluZy4gVGhlIGNyb3NzYm9keSBvcHRpb24gd2lsbCBhbGxvdyB5b3UgdG8gc3RheSBoYW5kcy1mcmVlIGZvciBldmVyeXRoaW5nIGZyb20gZ3JvY2VyeSBzaG9wcGluZywgY2FycnlpbmcgeW91ciB0cmF2ZWwgdHJvbGxleSB0aHJvdWdoIHRoZSBhaXJwb3J0IHRvIHN1YndheSBjb20=', '', '0', 1, '', '', '', 'Sukkhi Pleasing Gold Plated Ad Chandbali Earring For Women', 'Sukkhi Pleasing Gold Plated Ad Chandbali Earring For Women', 'IFRoaXMgY2hpYyBvZmYtZHV0eSBlc3NlbnRpYWwgaXMgYXMgY29vbCBhcyBhbiBldmVyeWRheSBiYWcgY2FuIGdldC4gVGhlIHZlcnNhdGlsZSB0d28gc3RyYXBzIGFuZCBzcGFjaW91cyBpbnRlcmlvcnMgYWxvbmcgd2l0aCB6aXBwZXIgY2xvc3VyZSAoZm9yIGtlZXBpbmcgdGhpbmdzIHNlY3VyZSkgbWFrZSB0aGlzIGJhZyBwZXJmZWN0IGZvciB0cmF2ZWwgYW5kIGV2ZXJ5ZGF5IHVzZS4gSXRzIGJlaWdlIGh1ZSB3aWxsIGdvIHdpdGggYWJzb2x1dGVseSBldmVyeXRoaW5nLiBUaGUgY3Jvc3Nib2R5IG9wdGlvbiB3aWxsIGFsbG93IHlvdSB0byBzdGF5IGhhbmRzLWZy', '2017-09-15 12:47:14', '70', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, 'null', 18, ''),
(71, 'AS124355', '15', 'Peacock Inspired Jhumki Earrings', 'simple', 'Peacock-Inspired-Jhumki-Earrings', 'IGQgZXZlcnlkYXkgdXNlLiBJdHMgYmVpZ2UgaHVlIHdpbGwgZ28gd2l0aCBhYnNvbHV0ZWx5IGV2ZXJ5dGhpbmcuIFRoZSBjcm9zc2JvZHkgb3B0aW9uIHdpbGwgYWxsb3cgeW91IHRvIHN0YXkgaGFuZHMtZnJlZSBmb3IgZXZlcnl0aGluZyBmcm9tIGdyb2Nlcnkgc2hvcHBpbmcsIGNhcnJ5aW5nIHlvdXIgdHJhdmVsIHRyb2xsZXkgdGhyb3VnaCB0aGUgYWlycG9ydCB0byBzdWJ3YXkgY29tICA=', 70, '15', '', '', '2ct', 5600, '12', '', 2, '0', 0, '24', 0, 0, 0, '', 0, '', 0, 'IGQgZXZlcnlkYXkgdXNlLiBJdHMgYmVpZ2UgaHVlIHdpbGwgZ28gd2l0aCBhYnNvbHV0ZWx5IGV2ZXJ5dGhpbmcuIFRoZSBjcm9zc2JvZHkgb3B0aW9uIHdpbGwgYWxsb3cgeW91IHRvIHN0YXkgaGFuZHMtZnJlZSBmb3IgZXZlcnl0aGluZyBmcm9tIGdyb2Nlcnkgc2hvcHBpbmcsIGNhcnJ5aW5nIHlvdXIgdHJhdmVsIHRyb2xsZXkgdGhyb3VnaCB0aGUgYWlycG9ydCB0byBzdWJ3YXkgY29tICA=', 0, 0, 'Crystal', '9', 'top', 'D', 'VS1', 1, 'form', 'Oval', '11', 'ZCBldmVyeWRheSB1c2UuIEl0cyBiZWlnZSBodWUgd2lsbCBnbyB3aXRoIGFic29sdXRlbHkgZXZlcnl0aGluZy4gVGhlIGNyb3NzYm9keSBvcHRpb24gd2lsbCBhbGxvdyB5b3UgdG8gc3RheSBoYW5kcy1mcmVlIGZvciBldmVyeXRoaW5nIGZyb20gZ3JvY2VyeSBzaG9wcGluZywgY2FycnlpbmcgeW91ciB0cmF2ZWwgdHJvbGxleSB0aHJvdWdoIHRoZSBhaXJwb3J0IHRvIHN1YndheSBjb20u', '', '0', 1, '70', '', '', 'Peacock Inspired Jhumki Earrings', 'Peacock Inspired Jhumki Earrings', 'uï¿½Þ¯''Zï¿½ï¿½"ï¿½z(ï¿½ç°ŠY`ï¿½ï¿½ï¿½ï¿½ï¿½[ï¿½zï¿½ï¿½ï¿½ï¿½ï¿½ï¿½8^rï¿½,ï¿½ï¿½ÊŠmï¿½ï¿½ï¿½ï¿½YZï¿½Z0Ê‹ï¿½ï¿½ï¿½Zï¿½ï¿½vï¿½ï¿½yï¿½ï¿½ï¿½Þ¯+aï¿½xï¿½ï¿½ï¿½ï¿½ï¿½ï¿½+!ï¿½ï¿½bï¿½\Zï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½kjï¿½ï¿½ï¿½ï¿½%ï¿½ì­†ï¿½.ï¿½ayï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½.oï¿½rï¿½', '2017-09-15 12:49:10', '70', '70', '2017-09-21 14:19:14', '', 'Seller', 'Seller', 0, 1, '{"Length":"11","Height":"11","color":"Gold","Size":"18"}', 18, ''),
(72, 'AS12334', '27', 'White Traditional Rajwadi Jhumki Earrings ', 'simple', 'White-Traditional-Rajwadi-Jhumki-Earrings-', 'IFRoaXMgY2hpYyBvZmYtZHV0eSBlc3NlbnRpYWwgaXMgYXMgY29vbCBhcyBhbiBldmVyeWRheSBiYWcgY2FuIGdldC4gVGhlIHZlcnNhdGlsZSB0d28gc3RyYXBzIGFuZCBzcGFjaW91cyBpbnRlcmlvcnMgYWxvbmcgd2l0aCB6aXBwZXIgY2xvc3VyZSAoZm9yIGtlZXBpbmcgdGhpbmdzIHNlY3VyZSkgbWFrZSB0aGlzIGJhZyBwZXJmZWN0IGZvciB0cmF2ZWwgYW5kIGV2ZXJ5ZGF5IHVzZS4gSXRzIGJlaWdlIGh1ZSB3aWxsIGdvIHdpdGggYWJzb2x1dGVseSBldmVyeXRoaW5nLiBUaGUgY3Jvc3Nib2R5IG9wdGlvbiB3aWxsIGFsbG93IHlvdSB0byBzdGF5IGhhbmQu', 70, '18 ', '', '', '4ct', 2300, '21mm', '', 3, '0', 0, '12', 0, 0, 0, '', 0, '', 0, 'IFRoaXMgY2hpYyBvZmYtZHV0eSBlc3NlbnRpYWwu', 0, 0, 'Crystal', '11', 'middle', 'E', 'IF', 1, 'form', 'Marquise', '11', 'VGhpcyBjaGljIG9mZi1kdXR5IGVzc2VudGlhbCBpcyBhcyBjb29sIGFzIGFuIGV2ZXJ5ZGF5IGJhZyBjYW4gZ2V0LiBUaGUgdmVyc2F0aWxlIHR3byBzdHJhcHMgYW5kIHNwYWNpb3VzIGludGVyaW9ycyBhbG9uZyB3aXRoIHppcHBlciBjbG9zdXJlIChmb3Iga2VlcGluZyB0aGluZ3Mgc2VjdXJlKSBtYWtlIHRoaXMgYmFnIHBlcmZlY3QgZm9yIHRyYXZlbCBhbmQgZXZlcnlkYXkgdXNlLiBJdHMgYmVpZ2UgaHVlIHdpbGwgZ28gd2l0aCBhYnNvbHV0ZWx5IGV2ZXJ5dGhpbmcuIFRoZSBjcm9zc2JvZHkgb3B0aW9uIHdpbGwgYWxsb3cgeW91IHRvIHN0YXkgaGFuZHMtZnI=', '', '0', 1, '71,70', '', '', 'White Traditional Rajwadi Jhumki Earrings ', 'White Traditional Rajwadi Jhumki Earrings ', 'IFRoaXMgY2hpYyBvZmYtZHV0eSBlc3NlbnRpYWwgaXMgYXMgY29vbCBhcyBhbiBldmVyeWRheSBiYWcgY2FuIGdldC4gVGhlIHZlcnNhdGlsZSB0d28gc3RyYXBzIGFuZCBzcGFjaW91cyBpbnRlcmlvcnMgYWxvbmcgd2l0aCB6aXBwZXIgY2xvc3VyZSAoZm9yIGtlZXBpbmcgdGhpbmdzIHNlY3VyZSkgbWFrZSB0aGlzIGJhZyBwZXJmZWN0IGZvciB0cmF2ZWwgYW5kIGV2ZXJ5ZGF5IHVzZS4gSXRzIGJlaWdlIGh1ZSB3aWxsIGdvIHdpdGggYWJzb2x1dGVseSBldmVyeXRoaW5nLiBUaGUgY3Jvc3Nib2R5IG9wdGlvbiB3aWxsIGFsbG93IHlvdSB0byBzdGF5IGhhbmQu', '2017-09-15 12:51:44', '70', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, 'null', 18, ''),
(73, 'AS1234234', '23', 'Golden Beige Polki Stones Dangle And Drop Earrings Jewellery For Women - Orniza ', 'grouped', 'Golden-Beige-Polki-Stones-Dangle-And-Drop-Earrings-Jewellery-For-Women---Orniza-', 'IEdvbGRlbiBCZWlnZSBQb2xraSBTdG9uZXMgRGFuZ2xlIEFuZCBEcm9wIEVhcnJpbmdzIEpld2VsbGVyeSBGb3IgV29tZW4gLSBPcm5pemEg', 70, '18 ', '', '', '3ct', 0, '12mm', '', 1, '0', 0, '22', 0, 0, 0, '', 0, '', 0, 'IEdvbGRlbiBCZWlnZSBQb2xraSBTdG9uZXMgRGFuZ2xlIEFuZCBEcm9wIEVhcnJpbmdzIEpld2VsbGVyeSBGb3IgV29tZW4gLSBPcm5pemEg', 0, 0, 'American Diamond', '12', 'top', 'E', 'VVS1', 1, 'form', 'Pear', '12', 'VGhpcyBjaGljIG9mZi1kdXR5IGVzc2VudGlhbCBpcyBhcyBjb29sIGFzIGFuIGV2ZXJ5ZGF5IGJhZyBjYW4gZ2V0LiBUaGUgdmVyc2F0aWxlIHR3byBzdHJhcHMgYW5kIHNwYWNpb3VzIGludGVyaW9ycyBhbG9uZyB3aXRoIHppcHBlciBjbG9zdXJlIChmb3Iga2VlcGluZyB0aGluZ3Mgc2VjdXJlKSBtYWtlIHRoaXMgYmFnIHBlcmZlY3QgZm9yIHRyYXZlbCBhbmQgZXZlcnlkYXkgdXNlLiBJdHMgYmVpZ2UgaHVlIHdpbGwgZ28gd2l0aCBhYnNvbHV0ZWx5IGV2ZXJ5dGhpbmcuIFRoZSBjcm9zc2JvZHkgb3B0aW9uIHdpbGwgYWxsb3cgeW91IHRvIHN0YXkgaGFuZHMtZnI=', '', '0', 1, '72,71', '', '71,70', 'Golden Beige Polki Stones Dangle And Drop Earrings Jewellery For Women - Orniza ', 'Golden Beige Polki Stones Dangle And Drop Earrings Jewellery For Women - Orniza ', 'IEdvbGRlbiBCZWlnZSBQb2xraSBTdG9uZXMgRGFuZ2xlIEFuZCBEcm9wIEVhcnJpbmdzIEpld2VsbGVyeSBGb3IgV29tZW4gLSBPcm5pemEg', '2017-09-15 12:54:04', '70', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, '', 18, ''),
(74, 'AS12345', '23', 'THE ABISHTA EAR CUFFS', 'simple', 'THE-ABISHTA-EAR-CUFFS', 'IFRoaXMgZ29yZ2VvdXMgZHJhd3N0cmluZyBwb3RsaSBiYWcvYmF0d2EvcG91Y2ggaGFzIGhlYXZ5IGJsYWNrIGFsbCBvdmVyIGl0LCBhbmQgYW4gaW5uZXIgbGluaW5nIG9mIHNhdGluLiBBIGJlYWRlZCBzdHJhcCBlbmhhbmNlcyBpdHMgdXRpbGl0eSBhbmQgYmVhdXR5LiBIZWlnaHQ6IDYgaW47IFdpZHRoOiA2IGluIC4gU3RyYXAgbGVuZ3RoOiAyMyBpbiBXaWxsIGdvIHdlbGwgd2l0aCBib3RoIEluZGlhbiB0cmFkaXRpb25hbCB3ZWFyIGFuZCBldmVuaW5nIGdvd25zLiBBIGJlYXV0aWZ1bCBwaWVjZSBvZiB3b3JrIGJ5IHRoZSBsYWR5IGFydGlzYW5zIG9mIGNlbnRyYWwgSW5kaWEu', 70, '44 ', '', '', '4ct', 3400, '12mm', '', 1, '0', 0, '2.6', 0, 0, 0, '', 0, '', 0, 'IGVhdnkgYmxhY2sgYWxsIG92ZXIgaXQsIGFuZCBhbiBpbm5lciBsaW5pbmcgb2Ygc2F0aW4uIEEgYmVhZGVkIHN0cmFwIGVuaGFuY2VzIGl0cyB1dGlsaXR5IGFuZCBiZWF1dHkuIEhlaWdodDogNiBpbjsgV2lkdGg6IDYgaW4gLiBTdHJhcCBsZW5ndGg6IDIzIGluIFdpbGwgZ28gd2VsbCB3aXRoIGJvdGggSW5kaWFuIHRyYWRpdGlvbmFsIHdlYXIgYW5kIGV2ZW5pbmcgZ293bnMu', 0, 0, 'American Diamond', '12', 'top', 'D', 'FL', 1, 'form', 'Square Radiant', '12', 'ZWF2eSBibGFjayBhbGwgb3ZlciBpdCwgYW5kIGFuIGlubmVyIGxpbmluZyBvZiBzYXRpbi4gQSBiZWFkZWQgc3RyYXAgZW5oYW5jZXMgaXRzIHV0aWxpdHkgYW5kIGJlYXV0eS4gSGVpZ2h0OiA2IGluOyBXaWR0aDogNiBpbiAuIFN0cmFwIGxlbmd0aDogMjMgaW4gV2lsbCBnbyB3ZWxsIHdpdGggYm90aCBJbmRpYW4gdHJhZGl0aW9uYWwgd2VhciBhbmQgZXZlbmluZyBnb3ducy4=', '', '0', 1, '72,70', '', '', 'THE ABISHTA EAR CUFFS', 'THE ABISHTA EAR CUFFS', 'IFRoaXMgZ29yZ2VvdXMgZHJhd3N0cmluZyBwb3RsaSBiYWcvYmF0d2EvcG91Y2ggaGFzIGhlYXZ5IGJsYWNrIGFsbCBvdmVyIGl0LCBhbmQgYW4gaW5uZXIgbGluaW5nIG9mIHNhdGluLiBBIGJlYWRlZCBzdHJhcCBlbmhhbmNlcyBpdHMgdXRpbGl0eSBhbmQgYmVhdXR5LiBIZWlnaHQ6IDYgaW47IFdpZHRoOiA2IGluIC4gU3RyYXAgbGVuZ3RoOiAyMyBpbiBXaWxsIGdvIHdlbGwgd2l0aCBib3RoIEluZGlhbiB0cmFkaXRpb25hbCB3ZWFyIGFuZCBldmVuaW5nIGdvd25zLiBBIGJlYXV0aWZ1bCBwaWVjZSBvZiB3b3JrIGJ5IHRoZSBsYWR5IGFydGlzYW5zIG9mIGNlbnRyYWwgSW5kaWEu', '2017-09-15 15:36:22', '70', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, 'null', 16, ''),
(75, 'AD234', '13', 'The Madhura Ear Cuffs', 'simple', 'The-Madhura-Ear-Cuffs', 'IGVhdnkgYmxhY2sgYWxsIG92ZXIgaXQsIGFuZCBhbiBpbm5lciBsaW5pbmcgb2Ygc2F0aW4uIEEgYmVhZGVkIHN0cmFwIGVuaGFuY2VzIGl0cyB1dGlsaXR5IGFuZCBiZWF1dHkuIEhlaWdodDogNiBpbjsgV2lkdGg6IDYgaW4gLiBTdHJhcCBsZW5ndGg6IDIzIGluIFdpbGwgZ28gd2VsbCB3aXRoIGJvdGggSW5kaWFuIHRyYWRpdGlvbmFsIHdlYXIgYW5kIGV2ZW5pbmcgZ293bnMu', 70, '44 ', '', '', '4ct', 3500, '12mm', '', 0, '0', 0, '12', 0, 0, 0, '', 0, '', 0, 'IGVhdnkgYmxhY2sgYWxsIG92ZXIgaXQsIGFuZCBhbiBpbm5lciBsaW5pbmcgb2Ygc2F0aW4uIEEgYmVhZGVkIHN0cmFwIGVuaGFuY2VzIGl0cyB1dGlsaXR5IGFuZCBiZWF1dHkuIEhlaWdodDogNiBpbjsgV2lkdGg6IDYgaW4gLiBTdHJhcCBsZW5ndGg6IDIzIGluIFdpbGwgZ28gd2VsbCB3aXRoIGJvdGggSW5kaWFuIHRyYWRpdGlvbmFsIHdlYXIgYW5kIGV2ZW5pbmcgZ293bnMu', 0, 0, 'Crystal', '23', 'middle', 'D', 'VVS2', 1, 'form', 'Marquise', '11', 'ZWF2eSBibGFjayBhbGwgb3ZlciBpdCwgYW5kIGFuIGlubmVyIGxpbmluZyBvZiBzYXRpbi4gQSBiZWFkZWQgc3RyYXAgZW5oYW5jZXMgaXRzIHV0aWxpdHkgYW5kIGJlYXV0eS4gSGVpZ2h0OiA2IGluOyBXaWR0aDogNiBpbiAuIFN0cmFwIGxlbmd0aDogMjMgaW4gV2lsbCBnbyB3ZWxsIHdpdGggYm90aCBJbmRpYW4gdHJhZGl0aW9uYWwgd2VhciBhbmQgZXZlbmluZyBnb3ducy4=', '', '0', 1, '74', '', '', 'The Madhura Ear Cuffs', 'The Madhura Ear Cuffs', 'IGVhdnkgYmxhY2sgYWxsIG92ZXIgaXQsIGFuZCBhbiBpbm5lciBsaW5pbmcgb2Ygc2F0aW4uIEEgYmVhZGVkIHN0cmFwIGVuaGFuY2VzIGl0cyB1dGlsaXR5IGFuZCBiZWF1dHkuIEhlaWdodDogNiBpbjsgV2lkdGg6IDYgaW4gLiBTdHJhcCBsZW5ndGg6IDIzIGluIFdpbGwgZ28gd2VsbCB3aXRoIGJvdGggSW5kaWFuIHRyYWRpdGlvbmFsIHdlYXIgYW5kIGV2ZW5pbmcgZ293bnMu', '2017-09-15 15:38:22', '70', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, 'null', 16, ''),
(76, 'AD6777', '16', 'The Adriana Ear Cuffs', 'grouped', 'The-Adriana-Ear-Cuffs', 'IGVhdnkgYmxhY2sgYWxsIG92ZXIgaXQsIGFuZCBhbiBpbm5lciBsaW5pbmcgb2Ygc2F0aW4uIEEgYmVhZGVkIHN0cmFwIGVuaGFuY2VzIGl0cyB1dGlsaXR5IGFuZCBiZWF1dHkuIEhlaWdodDogNiBpbjsgV2lkdGg6IDYgaW4gLiBTdHJhcCBsZW5ndGg6IDIzIGluIFdpbGwgZ28gd2VsbCB3aXRoIGJvdGggSW5kaWFuIHRyYWRpdGlvbmFsIHdlYXIgYW5kIGV2ZW5pbmcgZ293bnMu', 70, '44 ', '', '', '6ct', 0, '45mm', '', 2, '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'IGVhdnkgYmxhY2sgYWxsIG92ZXIgaXQsIGFuZCBhbiBpbm5lciBsaW5pbmcgb2Ygc2F0aW4uIEEgYmVhZGVkIHN0cmFwIGVuaGFuY2VzIGl0cyB1dGlsaXR5IGFuZCBiZWF1dHkuIEhlaWdodDogNiBpbjsgV2lkdGg6IDYgaW4gLiBTdHJhcCBsZW5ndGg6IDIzIGluIFdpbGwgZ28gd2VsbCB3aXRoIGJvdGggSW5kaWFuIHRyYWRpdGlvbmFsIHdlYXIgYW5kIGV2ZW5pbmcgZ293bnMu', 0, 0, 'American Diamond', '23', 'top', 'D', 'IF', 1, 'form', 'Radiant', '23', 'ZWF2eSBibGFjayBhbGwgb3ZlciBpdCwgYW5kIGFuIGlubmVyIGxpbmluZyBvZiBzYXRpbi4gQSBiZWFkZWQgc3RyYXAgZW5oYW5jZXMgaXRzIHV0aWxpdHkgYW5kIGJlYXV0eS4gSGVpZ2h0OiA2IGluOyBXaWR0aDogNiBpbiAuIFN0cmFwIGxlbmd0aDogMjMgaW4gV2lsbCBnbyB3ZWxsIHdpdGggYm90aCBJbmRpYW4gdHJhZGl0aW9uYWwgd2VhciBhbmQgZXZlbmluZyBnb3ducy4=', '', '0', 1, '74,72', '', '75,72,70', 'The Adriana Ear Cuffs', 'The Adriana Ear Cuffs', 'IGVhdnkgYmxhY2sgYWxsIG92ZXIgaXQsIGFuZCBhbiBpbm5lciBsaW5pbmcgb2Ygc2F0aW4uIEEgYmVhZGVkIHN0cmFwIGVuaGFuY2VzIGl0cyB1dGlsaXR5IGFuZCBiZWF1dHkuIEhlaWdodDogNiBpbjsgV2lkdGg6IDYgaW4gLiBTdHJhcCBsZW5ndGg6IDIzIGluIFdpbGwgZ28gd2VsbCB3aXRoIGJvdGggSW5kaWFuIHRyYWRpdGlvbmFsIHdlYXIgYW5kIGV2ZW5pbmcgZ293bnMu', '2017-09-15 15:40:28', '70', '', '0000-00-00 00:00:00', '', 'Seller', '', 0, 1, '', 16, ''),
(77, 'dd', '26', 'aaa', 'configurable', 'aaa', 'IGVlZWU=', 0, '22 ', '', '', '', 12, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '1', '', '', '0', 1, '', '', '', 'aaa', 'aaa', 'IGVlZWU=', '2017-09-16 10:23:48', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 0, ''),
(78, '2231', '10', 'www', 'configurable', 'www', 'IHd3dyAgICA=', 0, '22', '', '', '', 12, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'ICAgICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '12', '', '', '0', 1, '64', '64,63', '', 'www', 'www', '', '2017-09-16 11:11:17', '1', '1', '2017-09-16 11:17:21', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(79, 'abc12', '24', 'abcd', 'configurable', 'abcd', 'IHp2Y2h2Y3h6dng=', 0, '14 ,34 ', '', '', '', 20, '', '', 9, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '64', '', '', 'abcd', 'abcd', 'IHp2Y2h2Y3h6dng=', '2017-09-16 11:16:09', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 15, '11'),
(80, 'abc12-Green', '24', 'abcd-Green', 'simple', 'abcd', 'YWJjZHMg', 0, '14 ,34 ', '', '', '', 20, '', '', 0, '0', 0, '10', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 1, 'form', '', '', '', '', '0', 1, '', '', '', '', '', '', '2017-09-16 11:16:55', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '{"color":"Green"}', 15, ''),
(81, 'xyz', '14', 'xyz', 'configurable', 'xyz', 'IHRlc3Rpbmcg', 0, '35 ,39', '', '', '', 100, '', '', 9, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, 'American Diamond', '20', '', '', '', 1, 'form', '', '10', 'dmhqdmJjamhiYw==', '', '0', 1, '', '82', '', 'xyz', 'xyz', 'testing', '2017-09-16 11:22:23', '1', '1', '2017-09-16 11:25:20', '', 'Admin', 'Admin', 1, 1, '', 13, '11'),
(82, 'xyz-Yellow', '14', 'xyz-Yellow', 'simple', 'xyz', 'IHh5eg==', 0, '35 ,39 ', '', '', '', 20, '', '', 0, '0', 0, '0', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 1, 'form', '', '', '', '', '0', 1, '', '', '', '', '', '', '2017-09-16 11:22:49', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '{"color":"Yellow"}', 13, ''),
(83, 'AS1234', '19', 'Blue Color Letest Nayantara Traditional Necklace Set', 'simple', 'Blue-Color-Letest-Nayantara-Traditional-Necklace-Set', 'IFRoaXMgQW50aXF1ZSBHb2xkIFBsYXRlZCBOZWNrbGFjZSBTZXQgRm9yIFdvbWVuIElzIE1hZGUgT2YgQWxsb3kuIFdvbWVuIExvdmUgSmV3ZWxsZXJ5OyBTcGVjaWFsbHkgVHJhZGl0aW9uYWwgSmV3ZWxsZXJ5IEFkb3JlIEEgV29tZW4uIFRoZXkgVXNlIEl0IE9uIERpZmZlcmVudCBPY2Nhc2lvbi4gVGhleSBIYXZlIFNwZWNpYWwgSSBtcG9ydGFuY2UgT24gUmluZyBDZXJlbW9ueSwgV2VkZGluZyBBbmQgRmVzdGl2ZSBUaW1lLiBUaGV5IENhbiBBbHNvIFVzZSBJdCBPbiBSZWd1bGFyIEJhc2ljcy4gTWFrZSBZb3VyIE1vbWVudCBNZW1vcmFibGUgV2l0aCBUaGlzIFJhbmdlLg==', 0, '19 ', '', '', '2ct', 350000, '23mm', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IFRoaXMgQW50aXF1ZSBHb2xkIFBsYXRlZCBOZWNrbGFjZSBTZXQgRm9yIFdvbWVuIElzIE1hZGUgT2YgQWxsb3kuIFdvbWVuIExvdmUgSmV3ZWxsZXJ5', 0, 0, 'American Diamond', '12', 'top', 'F', 'IF', 1, 'form', 'Pear', '12', 'VGhpcyBBbnRpcXVlIEdvbGQgUGxhdGVkIE5lY2tsYWNlIFNldCBGb3IgV29tZW4gSXMgTWFkZSBPZiBBbGxveS4gV29tZW4gTG92ZSBKZXdlbGxlcnk7IFNwZWNpYWxseSBUcmFkaXRpb25hbCBKZXdlbGxlcnkgQWRvcmUgQSBXb21lbi4gVGhleSBVc2UgSXQgT24gRGlmZmVyZW50IE9jY2FzaW9uLiBUaGV5IEhhdmUgU3BlY2lhbCBJIG1wb3J0YW5jZSBPbiBSaW5nIENlcmVtb255LCBXZWRkaW5nIEFuZCBGZXN0aXZlIFRpbWUuIFRoZXkgQ2FuIEFsc28gVXNlIEl0IE9uIFJlZ3VsYXIgQmFzaWNzLiBNYWtlIFlvdXIgTW9tZW50IE1lbW9yYWJsZSBXaXRoIFRoaXMgUmFuZ2Uu', '', '0', 1, '', '', '', 'Blue Color Letest Nayantara Traditional Necklace Set', 'Blue Color Letest Nayantara Traditional Necklace Set', 'IFRoaXMgQW50aXF1ZSBHb2xkIFBsYXRlZCBOZWNrbGFjZSBTZXQgRm9yIFdvbWVuIElzIE1hZGUgT2YgQWxsb3kuIFdvbWVuIExvdmUgSmV3ZWxsZXJ5OyBTcGVjaWFsbHkgVHJhZGl0aW9uYWwgSmV3ZWxsZXJ5IEFkb3JlIEEgV29tZW4uIFRoZXkgVXNlIEl0IE9uIERpZmZlcmVudCBPY2Nhc2lvbi4gVGhleSBIYXZlIFNwZWNpYWwgSSBtcG9ydGFuY2UgT24gUmluZyBDZXJlbW9ueSwgV2VkZGluZyBBbmQgRmVzdGl2ZSBUaW1lLiBUaGV5IENhbiBBbHNvIFVzZSBJdCBPbiBSZWd1bGFyIEJhc2ljcy4gTWFrZSBZb3VyIE1vbWVudCBNZW1vcmFibGUgV2l0aCBUaGlzIFJhbmdlLg==', '2017-09-16 12:20:45', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, 'null', 2, ''),
(84, 'AD23489', '20', 'Letest Nayantara Traditional Necklace Set', 'configurable', 'Letest-Nayantara-Traditional-Necklace-Set', 'VGhpcyBBbnRpcXVlIEdvbGQgUGxhdGVkIE5lY2tsYWNlIFNldCBGb3IgV29tZW4gSXMgTWFkZSBPZiBBbGxveS4gV29tZW4gTG92ZSBKZXdlbGxlcnk7IFNwZWNpYWxseSBUcmFkaXRpb25hbCBKZXdlbGxlcnkgQWRvcmUgQSBXb21lbi4gVGhleSBVc2UgSXQgT24gRGlmZmVyZW50IE9jY2FzaW9uLiBUaGV5IEhhdmUgU3BlY2lhbCBJIG1wb3J0YW5jZSBPbiBSaW5nIENlcmVtb255LCBXZWRkaW5nIEFuZCBGZXN0aXZlIFRpbWUuIFRoZXkgQ2FuIEFsc28gVXNlIEl0IE9uIFJlZ3VsYXIgQmFzaWNzLiBNYWtlIFlvdXIgTW9tZW50IE1lbW9yYWJsZSBXaXRoIFRoaXMgUmFuZ2UuICA=', 0, '19', '', '', '2ct', 34000, '12mm', '', 9, '0', 0, '11', 0, 0, 0, '', 0, '', 0, 'IFRoaXMgQW50aXF1ZSBHb2xkIFBsYXRlZCBOZWNrbGFjZSBTZXQgRm9yIFdvbWVuIElzIE1hZGUgT2YgQWxsb3kuIFdvbWVuIExvdmUgSmV3ZWxsZXJ5ICA=', 0, 0, 'American Diamond', '12', 'middle', 'E', 'IF', 1, 'form', 'Pear', '11', 'VGhpcyBBbnRpcXVlIEdvbGQgUGxhdGVkIE5lY2tsYWNlIFNldCBGb3IgV29tZW4gSXMgTWFkZSBPZiBBbGxveS4gV29tZW4gTG92ZSBKZXdlbGxlcnk7IFNwZWNpYWxseSBUcmFkaXRpb25hbCBKZXdlbGxlcnkgQWRvcmUgQSBXb21lbi4gVGhleSBVc2UgSXQgT24gRGlmZmVyZW50IE9jY2FzaW9uLiBUaGV5IEhhdmUgU3BlY2lhbCBJIG1wb3J0YW5jZSBPbiBSaW5nIENlcmVtb255LCBXZWRkaW5nIEFuZCBGZXN0aXZlIFRpbWUuIFRoZXkgQ2FuIEFsc28gVXNlIEl0IE9uIFJlZ3VsYXIgQmFzaWNzLiBNYWtlIFlvdXIgTW9tZW50IE1lbW9yYWJsZSBXaXRoIFRoaXMgUmFuZ2Uu', '', '0', 1, '83', '85,55', '', 'Letest Nayantara Traditional Necklace Set', 'Letest Nayantara Traditional Necklace Set', 'Nï¿½{bï¿½ç†¢WOï¿½ï¿½^t×œï¿½Vï¿½y''ï¿½ï¿½Ö¢gï¿½"ï¿½\Zuï¿½Yhï¿½j&zrï¿½ï¿½^ï¿½ï¿½ezï¿½ï¿½ï¿½ï¿½"jYrNï¿½ï¿½ï¿½Ø¨ï¿½ï¿½I{ï¿½ï¿½ï¿½ï¿½ï¿½+xï¿½ï¿½ï¿½Ó…ì”±ï¿½-:pï¿½}ï¿½ï¿½z{NqÆ¬ï¿½ï¿½Ó…ï¿½jï¿½ï¿½ï¿½ï¿½"jR&ï¿½ï¿½ï¿½jw:tbï¿½ï¿½ï¿½ï¿½é¨Ÿ%ï¿½uØ§ï¿½	ï¿½ï¿½-ï¿½ï¿½ï¿½ï¿½gï¿½ï¿½ï¿½jp%ï¿½ï¿½,xï¿½Nï¿½ï¿½ï¿½Vï¿½ï¿½"rï¿½\Zï¿½ï¿½(ï¿½ï¿½(ï¿½ï¿½ï¿½1é¨­ï¿½ï¿½yhï¿½ï¿½8bï¿½ï¿½ï¿½', '2017-09-16 12:25:22', '1', '1', '2017-09-16 12:38:18', '', 'Admin', 'Admin', 1, 1, '', 2, '11,10,5,14'),
(85, 'AD23489-12mm-23mm-Orange-19', '20', 'Letest Nayantara Traditional Necklace Set -12mm-23mm-Orange-19', 'simple', 'Letest-Nayantara-Traditional-Necklace-Set--12mm-23mm-Orange-19', 'IExldGVzdCBOYXlhbnRhcmEgVHJhZGl0aW9uYWwgTmVja2xhY2UgU2V0ICAgICA=', 0, '19', '', '', '', 23000, '', '', 0, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'ICAgIA==', 0, 0, '', '', '', '', '', 1, 'form', '', '9', '', '', '0', 1, '', '', '', '', '', '', '2017-09-16 12:26:43', '1', '1', '2017-09-16 12:36:09', '', 'Admin', 'Admin', 1, 1, '{"Length":"12mm","Height":"23mm","color":"Blue","Size":"19"}', 2, ''),
(86, 'abcde', '13', 'abcde', 'configurable', 'abcde', 'IGN4dnhjdnhj', 0, '14 ,34 ', '', '', '', 30, '', '', 1, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '88,87', '', 'abcde', 'abcde', 'IGN4dnhjdnhj', '2017-09-16 12:45:50', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 13, '11'),
(87, 'abcde-Black', '13', 'abcde-Black', 'simple', 'abcde', 'IHh2eHZ4Yw==', 0, '14 ,34 ', '', '', '', 0, '', '', 0, '0', 0, '10', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '', '', '', '', '2017-09-16 12:46:42', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '{"color":"Black"}', 13, ''),
(88, 'abcde-Cyan', '13', 'abcde-Cyan', 'simple', 'abcde', 'IGN4dnhjdg==', 0, '14 ,34 ', '', '', '', 0, '', '', 0, '0', 0, '10', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 1, 'form', '', '9', '', '', '0', 1, '', '', '', '', '', '', '2017-09-16 12:47:23', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '{"color":"Cyan"}', 13, ''),
(89, 'AS123', '23', 'The Pansy Nose Pin', 'simple', 'The-Pansy-Nose-Pin', 'IFRoZSBQYW5zeSBOb3NlIFBpbiA=', 0, '18 ,50', '', '', '6ct', 2500, '12mm', '', 4, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IFRoZSBQYW5zeSBOb3NlIFBpbiA=', 0, 0, 'American Diamond', '1', 'top', 'D', 'FL', 1, 'form', 'Trillian', '23', 'VGhlIFBhbnN5IE5vc2UgUGlu', '', '0', 1, '21', '', '', 'The Pansy Nose Pin', 'The Pansy Nose Pin', 'The Pansy Nose Pin', '2017-09-16 14:14:15', '1', '1', '2017-09-16 14:16:06', '', 'Admin', 'Admin', 0, 1, '{"Length":"12","Height":"23","color":"Silver","Size":"19"}', 14, ''),
(90, 'vcbcbcv', '11', 'vxcv', 'simple', 'vxcv', 'IHZjeHZjeGIg', 0, '14 ,34', '', '', '', 10, '', '', 9, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '', 'vxcv', 'vxcv', 'vcxvcxb', '2017-09-16 14:18:51', '1', '1', '2017-09-16 14:20:47', '', 'Admin', 'Admin', 1, 1, '{"Length":"12","Height":"12","color":"Blue","Size":"8"}', 13, ''),
(91, 'sdf', '12', 'dsfsf', 'simple', 'dsfsf', 'IHNkZnNkZiAgIA==', 0, '14', '', '', '', 34234, '', '', 0, '0', 0, '7', 0, 0, 0, '', 0, '', 0, 'ICAgIA==', 0, 0, '', '', '', '', '', 1, 'form', '', '23', '', '', '0', 1, '', '', '', 'dsfsf', 'dsfsf', '', '2017-09-16 14:23:22', '1', '1', '2017-09-16 14:28:11', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(92, 'vxcvx', '11', 'fsds', 'simple', 'fsds', 'IHZkdnh2eGM=', 0, '14 ,34 ', '', '', '', 10, '', '', 9, '0', 0, '12', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '', 'fsds', 'fsds', 'IHZkdnh2eGM=', '2017-09-16 14:29:47', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, 'null', 13, ''),
(93, 'AS345', '17', 'The Verbena Nose Pin', '', 'The-Verbena-Nose-Pin', 'IERpYW1vbmQgTm9zZSBQaW4gSW4gMThLdCBZZWxsb3cgR29sZCAoMC41NCBncmFtKSB3aXRoIERpYW1vbmRzICgwLjAyODAgQ3QpICAg', 0, '18 ,50', '', '', '4ct', 0, '12mm', '', 4, '0', 0, '3.4', 0, 0, 0, '', 0, '', 0, 'IERpYW1vbmQgTm9zZSBQaW4gSW4gMThLdCBZZWxsb3cgR29sZCAoMC41NCBncmFtKSB3aXRoIERpYW1vbmRzICgwLjAyODAgQ3QpICAg', 0, 0, 'American Diamond', '12', 'top', 'D', 'FL', 1, 'form', 'Square Radiant', '23', 'RGlhbW9uZCBOb3NlIFBpbiBJbiAxOEt0IFllbGxvdyBHb2xkICgwLjU0IGdyYW0pIHdpdGggRGlhbW9uZHMgKDAuMDI4MCBDdCk=', '', '0', 1, '89,88,55', '', '89,88,55,47,24', 'The Verbena Nose Pin', 'The Verbena Nose Pin', 'ï¿½ï¿½ï¿½{ï¿½', '2017-09-16 14:34:18', '1', '1', '2017-09-19 15:11:56', '', 'Admin', 'Admin', 0, 1, '', 14, ''),
(94, 'vxcvxvvx', '13', 'vxcvx', 'simple', 'vxcvx', 'IHZ4Y3ZiY3hiIA==', 0, '14 ,34', '', '', '', 11, '', '', 4, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '', 'vxcvx', 'vxcvx', 'vxcvbcxb', '2017-09-16 14:36:52', '1', '1', '2017-09-16 14:40:49', '', 'Admin', 'Admin', 1, 1, '{"Length":"ds","Height":"dsd","color":"Yellow","Size":"9"}', 13, ''),
(95, '3545', '13', 'fff', 'simple', 'fff', 'IGZzZGZzZGY=', 0, '17 ', '', '', '', 3453, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '34', '', '', '0', 1, '', '', '', 'fff', 'fff', 'IGZzZGZzZGY=', '2017-09-16 14:48:02', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 18, ''),
(96, 'xcvxvxcbcv', '11', '12345', 'simple', '12345', 'IGN4dmN4dmN4dg==', 0, '14 ,34 ', '', '', '', 10, '', '', 9, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '9', '', '', '0', 1, '', '', '', '12345', '12345', 'IGN4dmN4dmN4dg==', '2017-09-16 14:48:17', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '11,22,Violet,7', 13, ''),
(97, 'sdf45', '10', 'sss', 'simple', 'sss', 'IGFmYWRmYWY=', 0, '18 ,15 ', '', '', '', 34, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '34', '', '', '0', 1, '', '', '', 'sss', 'sss', 'IGFmYWRmYWY=', '2017-09-16 15:00:27', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 0, ''),
(98, 'asd', '11', 'aaa', 'simple', 'aaa', 'IGZzZGY=', 0, '18 ,19 ', '', '', '', 45435, '', '', 8, '0', 0, '2.3', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '12', '', '', '0', 1, '89', '', '', 'aaa', 'aaa', 'IGZzZGY=', '2017-09-16 15:05:30', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 0, ''),
(99, 'sd', '11', 'www', 'simple', 'www', 'IGVmcnNkZg==', 0, '18 ,15 ', '', '', '', 34, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '23', '', '', '0', 1, '', '', '', 'www', 'www', 'IGVmcnNkZg==', '2017-09-16 15:17:05', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 0, ''),
(100, 'ert', '11', 'www', 'simple', 'www', 'IHJyc2Zz', 0, '18 ,15 ', '', '', '', 4545, '', '', 0, '0', 0, '3.4', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '27', '', '', '0', 1, '', '', '', 'www', 'www', 'IHJyc2Zz', '2017-09-16 15:17:49', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '23,45,Gold,19', 16, ''),
(101, '56', '12', 'rrr', 'simple', 'rrr', 'IHRyZXRldCAg', 0, '18 ,19', '', '', '', 55, '', '', 1, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'ICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '42', '', '', '0', 1, '', '', '', 'rrr', 'rrr', 'ï¿½ï¿½ï¿½z', '2017-09-16 15:20:29', '1', '1', '2017-09-16 15:50:38', '', 'Admin', 'Admin', 1, 1, '{"Length":"656","Height":"456","color":"Gold","Size":"18"}', 18, ''),
(102, 'tresdr', '14', 'gvjhb', 'simple', 'gvjhb', 'IGdmdnl1aHVndXlobg==', 0, '14 ,34 ,33 ', '', '', '', 120, '', '', 4, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '', 'gvjhb', 'gvjhb', 'IGdmdnl1aHVndXlobg==', '2017-09-16 15:23:44', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 13, ''),
(103, 'vxcbvc', '11', 'abcd', 'simple', 'abcd', 'IHZjeGJjdmI=', 0, '14 ,34 ,33 ', '', '', '', 10, '', '', 1, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '', 'abcd', 'abcd', 'IHZjeGJjdmI=', '2017-09-16 15:28:33', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '{"Length":"212","Height":"2222","color":"Blue","Size":"9"}', 13, ''),
(104, 'ert66', '27', 'tert', 'simple', 'tert', 'IGVydHJlICAgIA==', 0, '18 ,16', '', '', '', 454, '', '', 0, '0', 0, '', 0, 0, 0, '', 0, '', 0, 'ICAgICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '45', '', '', '0', 1, '', '', '', 'tert', 'tert', '', '2017-09-16 15:30:44', '1', '1', '2017-09-16 15:37:48', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(105, 'fcdsfdgd', '13', 'abcd', 'grouped', 'abcd', 'IGdjdmJjdmIg', 0, '14 ,34 ,33', '', '', '', 0, '', '', 1, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '104,103,102,101', 'abcd', 'abcd', 'gcvbcvb', '2017-09-16 15:42:14', '1', '1', '2017-09-16 15:42:41', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(106, 'sdfs', '27', 'fsdf', 'grouped', 'fsdf', 'IHNkZnNkICAg', 0, '18 ,15', '', '', '', 0, '', '', 0, '0', 0, '6', 0, 0, 0, '', 0, '', 0, 'ICAgIA==', 0, 0, '', '', '', '', '', 1, 'form', '', '11', '', '', '0', 1, '89', '', '104', 'fsdf', 'fsdf', '', '2017-09-16 15:45:32', '1', '1', '2017-09-16 15:46:25', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(107, 'vgfcvcv', '22', 'vxcvx', 'simple', 'vxcvx', 'IHZ4Y3ZieGMg', 0, '14 ,37 ,40 ,43', '', '', '', 11, '', '', 9, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '', 'vxcvx', 'vxcvx', 'vxcvbxc', '2017-09-16 15:46:50', '1', '1', '2017-09-16 15:49:22', '', 'Admin', 'Admin', 1, 1, '{"Length":"10","Height":"10","color":"Violet","Size":"10"}', 13, ''),
(108, 'AS', '11', 'aaa', 'simple', 'aaa', 'IHNkZnNmIA==', 0, '18 ,15', '', '', '', 34, '', '', 0, '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '23', '', '', '0', 1, '55', '', '', 'aaa', 'aaa', 'sdfsf', '2017-09-16 15:50:57', '1', '1', '2017-09-16 15:51:21', '', 'Admin', 'Admin', 1, 1, '{"Length":"12","Height":"23","color":"White","Size":"17"}', 16, ''),
(109, '34', '22', 'sss', 'simple', 'sss', 'IGZzZGYg', 0, '18 ,15', '', '', '', 34, '', '', 0, '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 0, 'form', '', '19', '', '', '0', 1, '25', '', '', 'sss', 'sss', 'fsdf', '2017-09-16 15:52:10', '1', '1', '2017-09-16 15:52:59', '', 'Admin', 'Admin', 1, 1, '{"Length":"345","Height":"44","color":"Violet","Size":"17"}', 18, ''),
(110, '576', '24', 'eee', 'simple', 'eee', 'IGVlIA==', 0, '18 ,15', '', '', '', 34, '', '', 0, '0', 0, '34', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '32', '', '', '0', 1, '', '', '', 'eee', 'eee', 'ee', '2017-09-16 15:54:18', '1', '1', '2017-09-16 15:54:46', '', 'Admin', 'Admin', 1, 1, '{"Length":"23","Height":"33","color":"White","Size":"17"}', 2, ''),
(111, '4566', '26', 'sss', 'configurable', 'sss', 'IHNkYXNkYQ==', 0, '18 ,19 ', '', '', '3ct', 34, '12mm', '', 8, '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'IGRmc2Rm', 0, 0, 'American Diamond', '45', 'top', 'D', 'VS2', 1, 'form', 'Radiant', '34', 'c2Rmcw==', '', '0', 1, '89,48,26', '112', '', 'sss', 'sss', 'IHNkYXNkYQ==', '2017-09-16 15:57:58', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 16, '11'),
(112, '4566-Gold', '26', 'sss-Gold', 'simple', 'sss-Gold', 'IHF3ZXF3ZSAg', 0, '18 ,19', '', '', '', 55, '', '', 0, '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '12', '', '', '0', 1, '', '', '', '', '', '', '2017-09-16 15:58:30', '1', '1', '2017-09-16 16:02:00', '', 'Admin', 'Admin', 1, 1, '{"Length":"12","Height":"23","color":"Gold","Size":"19"}', 16, ''),
(113, '23', '12', 'sss', 'configurable', 'sss', 'IHNzcyAgIA==', 0, '18 ,15', '', '', '4ct', 34, '12mm', '', 8, '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'IGhjaGRmaCAgIA==', 0, 0, 'American Diamond', '12', 'top', 'E', 'FL', 1, 'form', 'Round', '12', 'ZGRm', '', '0', 1, '87,48', '114', '', 'sss', 'sss', '', '2017-09-16 16:15:50', '1', '1', '2017-09-16 16:34:25', '', 'Admin', 'Admin', 1, 1, '', 16, '5,14'),
(114, '23-12-5', '12', 'sss-12-5', 'simple', 'sss-12-5', 'IGdmaGZoICA=', 0, '18 ,15', '', '', '', 10, '', '', 0, '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '1', '', '', '0', 1, '', '', '', '', '', '', '2017-09-16 16:16:34', '1', '1', '2017-09-16 16:35:29', '', 'Admin', 'Admin', 1, 1, '{"Length":"12","Height":"10","color":"Yellow","Size":"5"}', 16, ''),
(115, 'bcvbcvb', '20', 'qqq', 'simple', 'qqq', 'IGZkdmJjYmN2', 0, '35 ', '', '', '', 120, '', '', 0, '0', 0, '14', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '8', '', '', '0', 1, '', '', '', 'qqq', 'qqq', 'IGZkdmJjYmN2', '2017-09-16 16:17:50', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 0, ''),
(116, 'bcvbcvb1', '20', 'qqq', 'simple', 'qqq', 'IGZkdmJjYmN2', 0, '35 ', '', '', '', 120, '', '', 0, '0', 0, '14', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '8', '', '', '0', 1, '', '', '', 'qqq', 'qqq', 'IGZkdmJjYmN2', '2017-09-16 16:19:10', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 0, ''),
(117, 'bcvbcvb12', '20', 'qqq', 'simple', 'qqq', 'IGZkdmJjYmN2ICAgICAgIA==', 0, '35', '', '', '', 120, '', '', 0, '0', 0, '14', 0, 0, 0, '', 0, '', 0, 'ICAgICAgICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '8', '', '', '0', 1, '', '', '', 'qqq', 'qqq', '', '2017-09-16 16:20:56', '1', '1', '2017-09-16 18:37:10', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(118, 'vcbcbcvnvbnv', '14', 'fgddf', 'configurable', 'fgddf', 'IGdmZGdmZHZjYmMg', 4, '35 ,36', '', '', '', 21, '', '', 0, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '8', '', '', '0', 1, '', '', '', 'fgddf', 'fgddf', 'gfdgfdvcbc', '2017-09-16 16:43:14', '1', '4', '2017-09-16 16:47:02', '', 'Admin', 'Seller', 1, 1, '{"Length":"200","Height":"100","color":"Orange","Size":"13"}', 13, ''),
(119, 'df45', '11', 'asdf', '', 'asdf', 'IGV3c3J3ZSAgIA==', 0, '18 ,15', '', '', '', 45, '', '', 0, '0', 0, '34', 0, 0, 0, '', 0, '', 0, 'ICAgIA==', 0, 0, '', '', '', '', '', 1, 'form', '', '11', '', '', '0', 1, '', '', '', 'asdf', 'asdf', '', '2017-09-16 16:44:10', '1', '1', '2017-09-18 15:22:20', '', 'Admin', 'Admin', 1, 1, '{"Length":"45","Height":"5","color":"Gold","Size":"18"}', 16, ''),
(120, 'ee', '11', 'fsf', 'configurable', 'fsf', 'IGU=', 0, '18 ,17 ', '', '', '', 4, '', '', 0, '0', 0, '34', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '34', '', '', '0', 1, '', '121', '', 'fsf', 'fsf', 'IGU=', '2017-09-16 16:47:44', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 18, '11,10,5,14'),
(121, 'ee-33-56-Black-19', '11', 'fsf-33-56-Black-19', 'simple', 'fsf-33-56-Black-19', 'IGVlIA==', 0, '18 ,17', '', '', '', 43, '', '', 0, '0', 0, '34', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '3', '', '', '0', 1, '', '', '', '', '', '', '2017-09-16 16:48:16', '1', '1', '2017-09-16 16:49:03', '', 'Admin', 'Admin', 1, 1, '{"Length":"33","Height":"56","color":"Black","Size":"19"}', 18, ''),
(122, '67', '25', 'kkk', 'configurable', 'kkk', 'IGhrag==', 0, '18 ,15 ', '', '', '', 67, '', '', 0, '0', 0, '78', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '1', '', '', '0', 1, '', '123,119,114', '', 'kkk', 'kkk', 'IGhrag==', '2017-09-16 16:49:59', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 16, '11,10'),
(123, '67-6-White', '25', 'kkk-6-Whiteab', 'simple', 'kkk-6-Whiteab', 'IGZnaCAgICAgIA==', 0, '18 ,15', '', '', '', 20, '', '', 0, '0', 0, '78', 0, 0, 0, '', 0, '', 0, 'ICAgICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '', '', '', '', '2017-09-16 16:50:48', '1', '1', '2017-09-18 15:24:40', '', 'Admin', 'Admin', 1, 1, '{"Length":"250","Height":"6","color":"White","Size":"10"}', 16, ''),
(124, 'ABCD', '12', 'abcd', 'configurable', 'abcd', 'IGRjdnh2', 4, '18 ,15 ,44 ', '', '', '', 250, '', '', 9, '0', 0, '9', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '126,125', '', 'abcd', 'abcd', 'IGRjdnh2', '2017-09-16 16:54:09', '4', '', '0000-00-00 00:00:00', '', 'Seller', '', 1, 1, '', 16, '11'),
(125, 'ABCD-Gold', '12', 'abcd-Gold', 'simple', 'abcd', 'IHZjYmNiY3Zi', 0, '18 ,15 ,44 ', '', '', '', 10, '', '', 0, '0', 0, '9', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '', '', '', '', '2017-09-16 16:55:27', '4', '', '0000-00-00 00:00:00', '', 'Seller', '', 1, 1, '{"color":"Gold"}', 16, ''),
(126, 'ABCD-Silver', '12', 'abcd-Silver', 'simple', 'abcd', 'IHVoZ2RmanZrY3huYmN2amti', 0, '18 ,15 ,44 ', '', '', '', 10, '', '', 0, '0', 0, '9', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 1, 'form', '', '0', '', '', '0', 1, '', '', '', '', '', '', '2017-09-16 16:56:18', '4', '', '0000-00-00 00:00:00', '', 'Seller', '', 1, 1, '{"color":"Silver"}', 16, ''),
(127, '3478', '10', 'sss', 'simple', 'sss', 'IGZmICAg', 4, '18 ,15', '', '', '3ct', 56, '12mm', '', 8, '0', 0, '4.5', 0, 0, 0, '', 0, '', 0, 'IGZnZiAgIA==', 0, 0, 'American Diamond', '12', 'top', 'D', 'FL', 1, 'form', 'Round', '12', 'Y3h4Y3g=', '', '0', 1, '53', '', '', 'sss', 'sss', '', '2017-09-16 17:45:20', '4', '4', '2017-09-16 18:43:23', '', 'Seller', 'Seller', 1, 1, '{"Length":"23","Height":"12","color":"White","Size":"17"}', 16, ''),
(128, 'tttttttttt', '13', 'test', 'simple', 'test', 'IHR0dHR0dHR0dHR0ICAgICAgICA=', 0, '36', '', '', '', 34434, '', '', 0, '0', 0, '42', 0, 0, 0, '', 0, '', 0, 'ICAgICAgICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '333333', '', '', '0', 0, '', '', '', 'test', 'test', '', '2017-09-16 17:55:03', '1', '1', '2017-09-16 18:27:26', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(129, 'sfsdfsdfsf', '22', 'asa', 'simple', 'asa', 'IGZzZGYgICAgIA==', 0, '14 ,32', '', '', '', 55, '', '', 0, '0', 0, '2', 0, 0, 0, '', 0, '', 0, 'ICAgICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '12', '', '', '0', 1, '', '', '', 'asa', 'asa', '', '2017-09-16 18:40:34', '1', '1', '2017-09-16 18:43:39', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(130, '343', '24', 'aaaa', 'simple', 'aaaa', 'IHNkZiAgICA=', 0, '14 ,34', '', '', '', 44, '', '', 0, '0', 0, '17', 0, 0, 0, '', 0, '', 0, 'ICAgICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '1', '', '', '0', 1, '', '', '', 'aaaa', 'aaaa', '', '2017-09-18 09:46:06', '1', '1', '2017-09-18 10:59:39', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(131, '111sssssssss', '12', '11', 'simple', '11', 'MTEg', 0, '33 ,20', '', '', '', 111, '', '', 0, '0', 0, '11', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '1', '', '', '0', 1, '', '', '130', '11', '11', '11', '2017-09-18 11:10:31', '1', '1', '2017-09-18 11:12:46', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(132, 'fgf', '10', 'ddds', 'simple', 'ddds', 'IHJldHJldCAgIDExICA=', 0, '18 ,15', '', '', '5ct1', 441, '45mm1', '', 1, '0', 0, '341', 0, 0, 0, '', 0, '', 0, 'IGhqaGogICAxICA=', 0, 0, 'Crystal', '51', 'yy1', 'D', 'IF', 1, 'form', 'Round', '561', 'MQ==', '', '0', 1, '132,123', '', '', 'ddd', 'ddd', '', '2017-09-18 11:33:26', '1', '1', '2017-09-18 11:42:40', '', 'Admin', 'Admin', 1, 1, '{"Length":"111","Height":"121","color":"Black","Size":"5"}', 16, ''),
(133, 'aaaa', '13', 'aaa', 'simple', 'aaa', 'IGdoZGFzZmNhc2Yg', 4, '34 ,33', '', '', '', 21, '', '', 0, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '', 'aaa', 'aaa', 'ghdasfcasf', '2017-09-18 12:30:56', '1', '1', '2017-09-18 12:31:14', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(134, 'fg', '26', 'ggg', 'simple', 'ggg', 'IGRmZw==', 70, '14 ,34 ', '', '', '', 34, '', '', 0, '0', 0, '45', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '4', '', '', '0', 1, '', '', '', 'ggg', 'ggg', 'IGRmZw==', '2017-09-18 13:54:06', '70', '', '0000-00-00 00:00:00', '', 'Seller', '', 1, 1, '', 0, ''),
(135, 'rt', '11', 'hjj', 'simple', 'hjj', 'IHR5', 70, '14 ', '', '', '', 66, '', '', 0, '0', 0, '66', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '3', '', '', '0', 1, '', '', '', 'hjj', 'hjj', 'IHR5', '2017-09-18 13:54:59', '70', '', '0000-00-00 00:00:00', '', 'Seller', '', 1, 1, '', 0, ''),
(136, '56t', '11', 'ttt', 'simple', 'ttt', 'IHRk', 70, '14 ,34 ', '', '', '', 67, '', '', 0, '0', 0, '56', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '38', '', '', '0', 1, '', '', '', 'ttt', 'ttt', 'IHRk', '2017-09-18 14:12:20', '70', '', '0000-00-00 00:00:00', '', 'Seller', '', 1, 1, '{"Length":"55","Height":"55","color":"Gold","Size":"20"}', 18, ''),
(137, '45', '27', 'dfsdf', 'simple', 'dfsdf', 'IGRnZGZn', 70, '14 ,34 ', '', '', '', 45, '', '', 0, '0', 0, '55', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '34', '', '', '0', 1, '', '', '', 'dfsdf', 'dfsdf', 'IGRnZGZn', '2017-09-18 14:31:29', '70', '', '0000-00-00 00:00:00', '', 'Seller', '', 1, 1, '{"Length":"44","Height":"44","color":"Violet","Size":"17"}', 13, ''),
(138, 'eeuu', '25', 'erer', 'simple', 'erer', 'IGZzZg==', 70, '14 ,34 ', '', '', '', 44, '', '', 0, '0', 0, '44', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '44', '', '', '0', 1, '', '', '', 'erer', 'erer', 'IGZzZg==', '2017-09-18 14:32:40', '70', '', '0000-00-00 00:00:00', '', 'Seller', '', 1, 1, '{"Length":"uuu","Height":"uu","color":"Violet","Size":"13"}', 16, ''),
(139, 'xcvxcv', '18', 'vbvc', 'simple', 'vbvc', 'IHhjdng=', 0, '14 ,34 ', '', '', '', 55, '', '', 0, '0', 0, '55', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '44', '', '', '0', 1, '', '', '', 'vbvc', 'vbvc', 'IHhjdng=', '2017-09-18 14:34:50', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 0, ''),
(140, 'aaa', '23', 'aaaa', '', 'aaaa', 'IHNkZnNkZnMgICAgICAgICAgICAg', 0, '14 ,34', '', '', '', 33, '', '', 0, '0', 0, '20', 0, 0, 0, '', 0, '', 0, 'ICAgICAgICAgICAgICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '33', '', '', '0', 1, '', '', '', 'aaaa', 'aaaa', '', '2017-09-18 15:23:08', '1', '1', '2017-09-18 17:19:26', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(141, 'ff', '22', 'www', 'simple', 'www', 'IGRzZmY=', 0, '14 ,34 ', '', '', '', 44, '', '', 0, '0', 0, '33', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '44', '', '', '0', 1, '', '', '', 'www', 'www', 'IGRzZmY=', '2017-09-18 15:35:32', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 0, ''),
(142, 'aaaa', '10', 'wwww', '', 'wwww', 'IGRmZ2RmZyAgICAgICAgICAgICAgICAgICA=', 0, '14 ,34', '', '', '', 45, '', '', 0, '0', 0, '34', 0, 0, 0, '', 0, '', 0, 'ICAgICAgICAgICAgICAgICAgICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '34', '', '', '0', 1, '', '', '', 'wwww', 'wwww', '', '2017-09-18 16:20:54', '1', '1', '2017-09-18 17:59:20', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(143, '12', '10', 'abc', 'configurable', 'abc', 'IHNkZnNm', 0, '14 ,34 ', '', '', '', 23, '', '', 0, '0', 0, '2.3', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '12', '', '', '0', 1, '89,88,87,55,48', '144', '', 'abc', 'abc', 'IHNkZnNm', '2017-09-19 10:10:41', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 16, '10,5'),
(144, '12-12mm-13mm', '10', 'abc-12mm-13mm', 'simple', 'abc', 'IHNzZGY=', 0, '14 ,34 ', '', '', '', 1200, '', '', 0, '0', 0, '2.3', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 1, 'form', '', '1', '', '', '0', 1, '', '', '', '', '', '', '2017-09-19 10:13:37', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '{"Length":"12mm","Height":"13mm"}', 16, ''),
(145, 'asfd', '10', 'eee', '', 'eee', 'IGZhZiAgICAgICAgIA==', 0, '18 ,15', '', '', '', 45, '', '', 0, '0', 0, '34', 0, 0, 0, '', 0, '', 0, 'ICAgICAgICAgIA==', 0, 0, '', '', '', '', '', 1, 'form', '', '5', '', '', '0', 1, '', '', '', 'eee', 'eee', '', '2017-09-19 10:25:45', '1', '1', '2017-09-19 10:44:50', '', 'Admin', 'Admin', 1, 1, '{"Length":"11","Height":"11","color":"Black","Size":"10"}', 16, ''),
(146, 'ffff', '15', 'fff', '', 'fff', 'IGN4dnhjdngg', 0, '14 ,34', '', '', '', 23, '', '', 0, '0', 0, '10', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '', 'fff', 'fff', 'cxvxcvx', '2017-09-19 10:45:36', '1', '1', '2017-09-19 10:45:55', '', 'Admin', 'Admin', 1, 1, '', 0, ''),
(147, 'A345', '16', 'Engagement rings', 'simple', 'Engagement-rings', 'RXhwcmVzcyB5b3VyIHVuaXF1ZSBzdHlsZSBpbiB0aGUgbW9zdCBjcmVhdGl2ZSBtYW5uZXIgd2l0aCB0aGlzIGZhYnVsb3VzIHJpbmcuRXhwZXJ0bHkgY3JhZnRlZCBpbiAxOCBLVCBXaGl0ZSBHb2xkIHRoaXMgamV3ZWxsZXJ5IGRlc2lnbiBpcyBpbiBmYXNoaW9uIVRoaXMgcHJvZHVjdCBpcyBjZXJ0aWZpZWQgYnkgYW4gaW50ZXJuYXRpb25hbCBsYWIgYW5kIGhhcyBiZWVuIGNoZWNrZWQgZm9yIHF1YWxpdHkgb2YgYWxsIG1hdGVyaWFscyBieSBhbiBpbnRlcm5hbCBWZWx2ZXRDYXNlIGV4cGVydCBiZWZvcmUgaXQgaXMgZGVsaXZlcmVkIHRvIHlvdSAxMDAlIGNlcnRpZmllZCB8IDEwMCUgaW5zdXJlZC5PdXIgUHJpY2UgTWF0Y2ggR3VhcmFudGVlIGVuc3VyZXMgeW91IGFyZSBnZXR0aW5nIHRoZSBiZXN0IHByaWNlIGZvciB0aGlzIHByb2R1Y3QuICAg', 0, '18 ,51', '', '', '4ct', 3500, '12mm', '', 8, '0', 0, '3.5', 0, 0, 0, '', 0, '', 0, 'IEV4cHJlc3MgeW91ciB1bmlxdWUgc3R5bGUgaW4gdGhlIG1vc3QgY3JlYXRpdmUgbWFubmVyIHdpdGggdGhpcyBmYWJ1bG91cyByaW5nLkV4cGVydGx5IGNyYWZ0ZWQgaW4gMTggS1QgV2hpdGUgR29sZCB0aGlzIGpld2VsbGVyeSBkZXNpZ24gaXMgaW4gZmFzaGlvbiFUaGlzIHByb2R1Y3QgaXMgY2VydGlmaWVkIGJ5IGFuIGludGVybmF0aW9uYWwgbGFiIGFuZCBoYXMgYmVlbiBjaGVja2VkIGZvciBxdWFsaXR5IG9mIGFsbCBtYXRlcmlhbHMgYnkgYW4gaW50ZXJuYWwgVmVsdmV0Q2FzZSBleHBlcnQgYmVmb3JlIGl0IGlzIGRlbGl2ZXJlZCB0byB5b3UgMTAwJSBjZXJ0aWZpZWQgICAg', 0, 0, 'American Diamond', '22', 'top', 'D', 'FL', 1, 'form', 'Heart', '34', '', '', '0', 1, '55,47', '', '', 'Engagement rings', 'Engagement rings', 'ï¿½=ï¿½ï¿½<ï¿½dï¿½ï¿½{ï¿½ï¿½ï¿½ï¿½pï¿½Û½ï¿½ï¿½n6ï¿½Z/Rï¿½ï¿½ï¿½c3lÌª=ï¿½ï¿½/ï¿½', '2017-09-19 11:36:57', '1', '1', '2017-09-19 17:14:03', '', 'Admin', 'Admin', 0, 1, '{"Length":"12mm","Height":"12mm","color":"Silver","Size":"14"}', 19, ''),
(148, 'AS23', '13', 'ring', 'simple', 'ring', 'IHNkZnNkZiAgICA=', 0, '18 ,51', '', '', '', 2300, '', '', 8, '0', 0, '3.4', 0, 0, 0, '', 0, '', 0, 'ICAgICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '11', '', '', '0', 1, '89,55,47', '149', '', 'ring', 'ring', '', '2017-09-19 11:58:36', '1', '1', '2017-09-19 17:13:34', '', 'Admin', 'Admin', 1, 1, '{"Length":"250","Height":"300","color":"Yellow","Size":"10"}', 16, '11,10,5,14'),
(149, 'AS23-12mm-11mm-Black-9', '13', 'ring-12mm-11mm-Black-9', 'simple', 'ring', 'IGR4Y3o=', 0, '18 ,51 ', '', '', '', 1200, '', '', 0, '0', 0, '3.4', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 1, 'form', '', '', '', '', '0', 1, '', '', '', '', '', '', '2017-09-19 12:01:51', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '{"Length":"12mm","Height":"11mm","color":"Black","Size":"9"}', 16, '');
INSERT INTO `products` (`product_id`, `SKU`, `Brand`, `product_name`, `product_type`, `slug`, `product_description`, `seller_id`, `category_id`, `unit_size`, `unit_price`, `carat`, `price`, `measurement_size`, `Material`, `product_metal`, `discount`, `resizable`, `unit_weight`, `units_InStock`, `units_onOrder`, `reorder_level`, `size`, `discount_available`, `discount_rate`, `current_order`, `stone_description`, `is_available`, `ranking`, `stone`, `no_of_stone`, `stone_setting`, `stone_color`, `stone_clarity`, `status`, `method`, `stone_shape`, `inv_qty`, `addtional_infomation`, `max_sale_qty`, `inventory_min_qty`, `is_in_stock`, `related_check_list`, `associated_check_list`, `group_products`, `meta_title`, `meta_keyword`, `meta_description`, `added_on`, `added_by`, `updated_by`, `updated_on`, `image_certificate`, `added_user_type`, `update_user_type`, `delete`, `visiablity`, `attribute_opt_value`, `attribute_set_id`, `attribute_arr`) VALUES
(150, '321', '10', 'hfghfghfgh', 'simple', 'hfghfghfgh', 'IGhnZmhmZ2hnZmg=', 0, '34 ', '', '', '', 321, '', '', 0, '0', 0, '131', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '1', '', '', '0', 1, '', '', '', 'hfghfghfgh', 'hfghfghfgh', 'IGhnZmhmZ2hnZmg=', '2017-09-19 14:20:11', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 0, ''),
(151, 'sadf', '10', 'dffs', 'configurable', 'dffs', 'IGZkc2Y=', 0, '20 ', '', '', '', 160, '', '', 0, '0', 0, '3651', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '45', '', '', '0', 1, '', '', '', 'dffs', 'dffs', 'IGZkc2Y=', '2017-09-19 14:32:03', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 0, ''),
(152, 'ssvvdvd', '10', 'nav', 'configurable', 'nav', 'IGhlbG9pa2pzYW5ranNoY2tpcyA=', 0, '34', '', '', '', 122, '', '', 1, '0', 0, '52', 0, 0, 0, '', 0, '', 0, 'ICA=', 0, 0, '', '', '', '', '', 1, 'form', '', '2132', '', '', '0', 1, '', '154,153', '', 'nav', 'nav', 'heloikjsankjshckis', '2017-09-19 14:33:12', '1', '1', '2017-09-19 17:05:22', '', 'Admin', 'Admin', 1, 1, '', 18, '11,10'),
(153, 'ssvvdvd-552-Blue', '10', 'nav-552-Blue', 'simple', 'nav', 'IGRmZGZiZmRiZGZiMTExNg==', 0, '34 ', '', '', '', 42, '', '', 0, '0', 0, '52', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 1, 'form', '', '25', '', '', '0', 1, '', '', '', '', '', '', '2017-09-19 14:34:06', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '{"Height":"552","color":"Blue"}', 18, ''),
(154, '21fds', '26', 'fsdfsdf', 'simple', 'fsdfsdf', 'IGRzZmRzZmRzZmRzZmRzZmRzZiAgICAgICAgIA==', 0, '34', '', '', '', 12354, '', '', 1, '0', 0, '52', 0, 0, 0, '', 0, '', 0, 'ICAgICAgICAgIA==', 0, 0, '', '', '', '', '', 1, 'form', '', '21', '', '', '0', 1, '', '149', '', 'fsdfsdf', 'fsdfsdf', '', '2017-09-19 14:36:46', '1', '1', '2017-09-19 17:04:59', '', 'Admin', 'Admin', 1, 1, '{"Length":"250","Height":"300","color":"Yellow","Size":"13"}', 2, '11,10,5,14'),
(155, 'qweqett', '26', 'fdf', 'simple', 'fdf', 'IHdlcXFlICBlcnRlcnQ=', 4, '14', '', '', '', 34, '', '', 0, '0', 0, '434', 0, 0, 0, '', 0, '', 0, 'ICAg', 0, 0, '', '', '', '', '', 1, 'form', '', '43', '', '', '0', 1, '', '', '', 'fdf', 'fdf', 'ï¿½ï¿½', '2017-09-19 17:16:19', '4', '4', '2017-09-19 17:16:54', '', 'Seller', 'Seller', 1, 1, '{"Length":"33","Height":"33","color":"Violet","Size":"16"}', 16, ''),
(156, 'ggg', '12', 'ggg', 'configurable', 'ggg', 'IGN2Y3ZjYnZjYmN2YmNiY3Zi', 0, '18 ,15 ,44 ', '', '', '', 30, '', '', 0, '0', 0, '21', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '10', '', '', '0', 1, '', '', '', 'ggg', 'ggg', 'IGN2Y3ZjYnZjYmN2YmNiY3Zi', '2017-09-19 18:51:34', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 1, 1, '', 0, ''),
(157, 'AD34', '14', 'Multicolour Polki Gold Look Anklets', 'simple', 'Multicolour-Polki-Gold-Look-Anklets', 'IFRoaXMgYmVhdXRpZnVsIGFua2xldHMgaXMgaGFuZGNyYWZ0ZWQgaW4gY29wcGVyIGFsbG95IHdpdGggaW1pdGF0aW9uIHBvbGtpICYgemlyY29uIG9mIHZlcnkgaW5lIHF1YWxpdHkgIC4gVGhpcyBhbmtsZXRzIGlzIGNvYXRlZCB3aXRoIDE4IGt0IGdvbGQgcG9saXNoIHdoaWNoIGdpdmUgdGhlbSBhIHVuaXF1ZSBsbyBvayAuIEFuIGFic29sdXRlbHkgc3R1bm5pbmcgcGllY2UgdG8gb3duIGFuZCBhcmUgdmVyeSBsaWdodCBpbiB3ZWlnaHQuICAgICoqQWxsIEpld2VscnkgaXMgY29tcGxldGVseSBpbnNwZWN0ZWQgZm9yIGV2ZXJ5IGNyeXN0YWwgYW5kIGJlYWQgYmVmb3JlIHdlIHNlbmQgaXQgb3V0LGVhY2ggcGllY2UgaXMgY2FyZWZ1bGx5IHBhY2thZ2VkIHRvIHJlYWNoIHlvdSBzYWZlbHkuIGFuZCBjb21lcyBpbiBhIEJPWC4qKiA=', 0, '18 ,20 ', '', '', '3ct', 1200, '12mm', '', 1, '0', 0, '3.5', 0, 0, 0, '', 0, '', 0, 'IFRoaXMgYmVhdXRpZnVsIGFua2xldHMgaXMgaGFuZGNyYWZ0ZWQgaW4gY29wcGVyIGFsbG95IHdpdGggaW1pdGF0aW9uIHBvbGtpICYgemlyY29uIG9mIHZlcnkgaW5lIHF1YWxpdHku', 0, 0, 'Crystal', '12', 'top', 'F', 'IF', 1, 'form', 'Pear', '12', 'VGhpcyBiZWF1dGlmdWwgYW5rbGV0cyBpcyBoYW5kY3JhZnRlZCBpbiBjb3BwZXIgYWxsb3kgd2l0aCBpbWl0YXRpb24gcG9sa2kgJiB6aXJjb24gb2YgdmVyeSBpbmUgcXVhbGl0eSAgLiBUaGlzIGFua2xldHMgaXMgY29hdGVkIHdpdGggMTgga3QgZ29sZCBwb2xpc2ggd2hpY2ggZ2l2ZSB0aGVtIGEgdW5pcXVlIGxvIG9rIC4gQW4gYWJzb2x1dGVseSBzdHVubmluZyBwaWVjZSB0byBvd24gYW5kIGFyZSB2ZXJ5IGxpZ2h0IGluIHdlaWdodC4gICAgKipBbGwgSmV3ZWxyeSBpcyBjb21wbGV0ZWx5IGluc3BlY3RlZCBmb3IgZXZlcnkgY3J5c3RhbCBhbmQgYmVhZCBiZWZvcmUgd2Ugc2VuZCBpdCBvdXQsZWFjaCBwaWVjZSBpcyBjYXJlZnVsbHkgcGFja2FnZWQgdG8gcmVhY2ggeW91IHNhZmVseS4gYW5kIGNvbWVzIGluIGEgQk9YLioqIA==', '', '0', 1, '147,47,25,23', '', '', 'Multicolour Polki Gold Look Anklets', 'Multicolour Polki Gold Look Anklets', 'IFRoaXMgYmVhdXRpZnVsIGFua2xldHMgaXMgaGFuZGNyYWZ0ZWQgaW4gY29wcGVyIGFsbG95IHdpdGggaW1pdGF0aW9uIHBvbGtpICYgemlyY29uIG9mIHZlcnkgaW5lIHF1YWxpdHkgIC4gVGhpcyBhbmtsZXRzIGlzIGNvYXRlZCB3aXRoIDE4IGt0IGdvbGQgcG9saXNoIHdoaWNoIGdpdmUgdGhlbSBhIHVuaXF1ZSBsbyBvayAuIEFuIGFic29sdXRlbHkgc3R1bm5pbmcgcGllY2UgdG8gb3duIGFuZCBhcmUgdmVyeSBsaWdodCBpbiB3ZWlnaHQuICAgICoqQWxsIEpld2VscnkgaXMgY29tcGxldGVseSBpbnNwZWN0ZWQgZm9yIGV2ZXJ5IGNyeXN0YWwgYW5kIGJlYWQgYmVmb3JlIHdlIHNlbmQgaXQgb3V0LGVhY2ggcGllY2UgaXMgY2FyZWZ1bGx5IHBhY2thZ2VkIHRvIHJlYWNoIHlvdSBzYWZlbHkuIGFuZCBjb21lcyBpbiBhIEJPWC4qKiA=', '2017-09-20 10:22:25', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '{"Length":"11mm","Height":"13mm","color":"Yellow","Size":"12"}', 13, ''),
(158, 'sdsad', '22', 'abc', 'configurable', 'abc', 'IGFzZHNk', 0, '14 ,34 ', '', '', '', 234, '', '', 0, '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '32', '', '', '0', 1, '', '160,159', '', 'abc', 'abc', 'IGFzZHNk', '2017-09-21 12:17:41', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '', 16, '11'),
(159, 'sdsad-White', '22', 'abc-White', 'simple', 'abc', 'IHdlcmRh', 0, '14 ,34 ', '', '', '', 22, '', '', 0, '0', 0, '23', 0, 0, 0, '', 0, '', 0, '', 0, 0, '', '', '', '', '', 1, 'form', '', '', '', '', '0', 1, '', '', '', '', '', '', '2017-09-21 12:18:38', '1', '', '0000-00-00 00:00:00', '', 'Admin', '', 0, 1, '{"color":"White"}', 16, ''),
(160, 'sdsad-Blue', '22', 'abc-Blue', 'simple', 'abc-Blue', 'IGZkaGZoZCA=', 0, '14 ,34', '', '', '', 77, '', '', 0, '0', 0, '23', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '11', '', '', '0', 1, '', '', '', '', '', '', '2017-09-21 12:19:28', '1', '1', '2017-09-21 13:54:28', '', 'Admin', 'Admin', 0, 1, '{"Length":"11","Height":"12","color":"Blue","Size":"16"}', 16, ''),
(161, '8678', '11', 'hjkhjk', 'simple', 'hjkhjk', 'IGpraGs=', 70, '14 ,34 ', '', '', '', 678, '', '', 0, '0', 0, '8', 0, 0, 0, '', 0, '', 0, 'IA==', 0, 0, '', '', '', '', '', 1, 'form', '', '3', '', '', '0', 1, '', '', '', 'hjkhjk', 'hjkhjk', 'IGpraGs=', '2017-09-21 17:46:47', '70', '', '0000-00-00 00:00:00', '', 'Seller', '', 1, 1, '', 0, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

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
(21, 7, 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-image20170421-9790-1eyba5w.jpg', 'Adjustable-925-Sterling-Silver-Ring-With-White-Stones-2017-08-12-15-25-13 _ swatch-image20170421-9790-1eyba5w.jpg.jpg', '2017-08-12 15:25:14', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(22, 11, 'configure-test-2017-08-25-13-03-40 _ Lighthouse.jpg', 'configure-test-2017-08-25-13-03-40 _ Lighthouse.jpg.jpg', '2017-08-25 13:03:40', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(23, 11, 'configure-test-2017-08-25-13-03-40 _ Penguins.jpg', 'configure-test-2017-08-25-13-03-40 _ Penguins.jpg.jpg', '2017-08-25 13:03:40', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(24, 11, 'configure-test-2017-08-25-13-03-40 _ Tulips.jpg', 'configure-test-2017-08-25-13-03-40 _ Tulips.jpg.jpg', '2017-08-25 13:03:40', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(25, 14, 'cccc34343-1111-111-Blue-2017-08-26-10-51-13 _ Lighthouse.jpg', 'cccc34343-1111-111-Blue-2017-08-26-10-51-13 _ Lighthouse.jpg.jpg', '2017-08-26 10:51:13', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(26, 13, 'cccc34343-2017-08-26-10-51-34 _ Desert.jpg', 'cccc34343-2017-08-26-10-51-34 _ Desert.jpg.jpg', '2017-08-26 10:51:34', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(27, 13, 'cccc34343-2017-08-26-10-51-34 _ Penguins.jpg', 'cccc34343-2017-08-26-10-51-34 _ Penguins.jpg.jpg', '2017-08-26 10:51:35', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(28, 18, 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-36-22 _ cs15c159_cs15c158_009_1.png', 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-36-22 _ cs15c159_cs15c158_009_1.png.png', '2017-08-26 12:36:22', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(29, 18, 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-36-22 _ cs15c159_back.png', 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-36-22 _ cs15c159_back.png.png', '2017-08-26 12:36:22', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(30, 18, 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-36-22 _ cs15c159_front.png', 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-36-22 _ cs15c159_front.png.png', '2017-08-26 12:36:22', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(31, 19, 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-50-58 _ cs15c159_cs15c158_009_1.png', 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-50-58 _ cs15c159_cs15c158_009_1.png.png', '2017-08-26 12:50:58', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(32, 19, 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-50-58 _ cs15c159_back.png', 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-50-58 _ cs15c159_back.png.png', '2017-08-26 12:50:58', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(33, 19, 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-50-58 _ cs15c159_front.png', 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-50-58 _ cs15c159_front.png.png', '2017-08-26 12:50:58', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(34, 20, 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-52-10 _ cs15c158_back_1.png', 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-52-10 _ cs15c158_back_1.png.png', '2017-08-26 12:52:10', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(35, 20, 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-52-10 _ cs15c158_front_1.png', 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-52-10 _ cs15c158_front_1.png.png', '2017-08-26 12:52:11', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(36, 20, 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-52-10 _ cs15c159_cs15c158_009_2.png', 'Four-Way-Cross-Necklace-Charm--Small-2017-08-26-12-52-10 _ cs15c159_cs15c158_009_2.png.png', '2017-08-26 12:52:11', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(37, 21, 'test-2017-08-26-18-09-17 _ pc14spn01s_front.png', 'test-2017-08-26-18-09-17 _ pc14spn01s_front.png.png', '2017-08-26 18:09:17', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(38, 21, 'test-2017-08-26-18-09-17 _ pc14spn01s_detail_v2_1.png', 'test-2017-08-26-18-09-17 _ pc14spn01s_detail_v2_1.png.png', '2017-08-26 18:09:18', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(39, 22, 'Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png', 'Rocker-Beaded-Bangle-2017-08-26-19-19-10 _ rock_ss.png.png', '2017-08-26 19:19:10', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(40, 23, 'Rocker-Beaded-Bangle-a17ebrocrs-2017-08-26-19-27-36 _ rock_rs.png', 'Rocker-Beaded-Bangle-a17ebrocrs-2017-08-26-19-27-36 _ rock_rs.png.png', '2017-08-26 19:27:37', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(41, 24, 'Rocker-Beaded-Bangle-2017-08-26-19-28-28 _ rock_rg.png', 'Rocker-Beaded-Bangle-2017-08-26-19-28-28 _ rock_rg.png.png', '2017-08-26 19:28:28', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(42, 25, 'Rocker-Beaded-Bangle-2017-08-26-19-29-31 _ rock_rg.png', 'Rocker-Beaded-Bangle-2017-08-26-19-29-31 _ rock_rg.png.png', '2017-08-26 19:29:31', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(43, 26, 'Handmade-Gold-Jewellery-defulat-2017-08-29-11-30-34 _ images.jpg', 'Handmade-Gold-Jewellery-defulat-2017-08-29-11-30-34 _ images.jpg.jpg', '2017-08-29 11:30:34', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(44, 27, 'necklacks-gorup-2017-09-01-12-37-10 _ rock_rs.png', 'necklacks-gorup-2017-09-01-12-37-10 _ rock_rs.png.png', '2017-09-01 12:37:10', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(45, 27, 'necklacks-gorup-2017-09-01-12-37-10 _ pc14spn01s_detail_v2_1.png', 'necklacks-gorup-2017-09-01-12-37-10 _ pc14spn01s_detail_v2_1.png.png', '2017-09-01 12:37:10', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(46, 27, 'necklacks-gorup-2017-09-01-12-37-10 _ cs15c158_front_1.png', 'necklacks-gorup-2017-09-01-12-37-10 _ cs15c158_front_1.png.png', '2017-09-01 12:37:10', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(47, 28, '--------------------------------8-2017-09-02-14-04-28 _ Koala.jpg', '--------------------------------8-2017-09-02-14-04-28 _ Koala.jpg.jpg', '2017-09-02 14:04:28', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(48, 28, '--------------------------------8-2017-09-02-14-05-05 _ Lighthouse.jpg', '--------------------------------8-2017-09-02-14-05-05 _ Lighthouse.jpg.jpg', '2017-09-02 14:05:05', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(49, 28, '--------------------------------8-2017-09-02-14-05-55 _ Tulips.jpg', '--------------------------------8-2017-09-02-14-05-55 _ Tulips.jpg.jpg', '2017-09-02 14:05:55', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(50, 32, '----------------------------------g-2017-09-02-15-22-27 _ Penguins.jpg', '----------------------------------g-2017-09-02-15-22-27 _ Penguins.jpg.jpg', '2017-09-02 15:22:27', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(51, 25, 'Rocker-Beaded-Bangle-2017-09-04-11-34-43 _ Desert.jpg', 'Rocker-Beaded-Bangle-2017-09-04-11-34-43 _ Desert.jpg.jpg', '2017-09-04 11:34:43', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(52, 43, 'Gold-Plated-Pair-Of-Anklets-Adorned-With-Cz-Pink-Color-Stone-And-Pink-Color-Beads--2017-09-06-15-08-36 _ swatch-ms20170413-7089-xhxaxt.jpg', 'Gold-Plated-Pair-Of-Anklets-Adorned-With-Cz-Pink-Color-Stone-And-Pink-Color-Beads--2017-09-06-15-08-36 _ swatch-ms20170413-7089-xhxaxt.jpg.jpg', '2017-09-06 15:08:36', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(53, 43, 'Gold-Plated-Pair-Of-Anklets-Adorned-With-Cz-Pink-Color-Stone-And-Pink-Color-Beads--2017-09-06-15-08-36 _ swatch-ms20170817-1768-1buw7iy.jpg', 'Gold-Plated-Pair-Of-Anklets-Adorned-With-Cz-Pink-Color-Stone-And-Pink-Color-Beads--2017-09-06-15-08-36 _ swatch-ms20170817-1768-1buw7iy.jpg.jpg', '2017-09-06 15:08:36', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(54, 43, 'Gold-Plated-Pair-Of-Anklets-Adorned-With-Cz-Pink-Color-Stone-And-Pink-Color-Beads--2017-09-06-15-08-36 _ swatch-ms20170823-27392-1nwevtg.jpg', 'Gold-Plated-Pair-Of-Anklets-Adorned-With-Cz-Pink-Color-Stone-And-Pink-Color-Beads--2017-09-06-15-08-36 _ swatch-ms20170823-27392-1nwevtg.jpg.jpg', '2017-09-06 15:08:36', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(55, 44, '925-Sterling-Silver-Nose-Pin-Plated-With-Rhodium--2017-09-06-15-19-26 _ ScreenHunter_.png', '925-Sterling-Silver-Nose-Pin-Plated-With-Rhodium--2017-09-06-15-19-26 _ ScreenHunter_.png.png', '2017-09-06 15:19:26', '60', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(56, 47, 'Girls-fashions-2017-09-08-12-49-53 _ swatch-image20150802-2984-1cib8rt.jpg', 'Girls-fashions-2017-09-08-12-49-53 _ swatch-image20150802-2984-1cib8rt.jpg.jpg', '2017-09-08 12:49:54', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(57, 48, 'Classic-Ring-With-Cz-Embellishment-2017-09-08-18-50-27 _ swatch-image20170517-1419-vvzs16.jpg', 'Classic-Ring-With-Cz-Embellishment-2017-09-08-18-50-27 _ swatch-image20170517-1419-vvzs16.jpg.jpg', '2017-09-08 18:50:27', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(58, 48, 'Classic-Ring-With-Cz-Embellishment-2017-09-08-18-50-27 _ swatch-ms20170420-22865-11v8c0o.jpg', 'Classic-Ring-With-Cz-Embellishment-2017-09-08-18-50-27 _ swatch-ms20170420-22865-11v8c0o.jpg.jpg', '2017-09-08 18:50:27', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(59, 48, 'Classic-Ring-With-Cz-Embellishment-2017-09-08-18-50-27 _ swatch-ms20170727-19366-1b425q8.jpg', 'Classic-Ring-With-Cz-Embellishment-2017-09-08-18-50-27 _ swatch-ms20170727-19366-1b425q8.jpg.jpg', '2017-09-08 18:50:27', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(60, 48, 'Classic-Ring-With-Cz-Embellishment-2017-09-08-18-50-27 _ swatch-ms20170816-22511-1fi0mef.jpg', 'Classic-Ring-With-Cz-Embellishment-2017-09-08-18-50-27 _ swatch-ms20170816-22511-1fi0mef.jpg.jpg', '2017-09-08 18:50:27', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(61, 49, 'Adorable-Necklace-Set-With-Cz-Sparkling-Stones--2017-09-08-18-57-37 _ swatch-ms20170817-16478-vioq02.jpg', 'Adorable-Necklace-Set-With-Cz-Sparkling-Stones--2017-09-08-18-57-37 _ swatch-ms20170817-16478-vioq02.jpg.jpg', '2017-09-08 18:57:37', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(62, 49, 'Adorable-Necklace-Set-With-Cz-Sparkling-Stones--2017-09-08-18-57-37 _ swatch-ms20170818-22927-1ghk0z9.jpg', 'Adorable-Necklace-Set-With-Cz-Sparkling-Stones--2017-09-08-18-57-37 _ swatch-ms20170818-22927-1ghk0z9.jpg.jpg', '2017-09-08 18:57:37', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(63, 49, 'Adorable-Necklace-Set-With-Cz-Sparkling-Stones--2017-09-08-18-57-37 _ swatch-ms20170818-22927-12bgh6r.jpg', 'Adorable-Necklace-Set-With-Cz-Sparkling-Stones--2017-09-08-18-57-37 _ swatch-ms20170818-22927-12bgh6r.jpg.jpg', '2017-09-08 18:57:37', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(64, 49, 'Adorable-Necklace-Set-With-Cz-Sparkling-Stones--2017-09-08-18-57-37 _ swatch-ms20170818-22927-vq1kdo.jpg', 'Adorable-Necklace-Set-With-Cz-Sparkling-Stones--2017-09-08-18-57-37 _ swatch-ms20170818-22927-vq1kdo.jpg.jpg', '2017-09-08 18:57:37', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(65, 49, 'Adorable-Necklace-Set-With-Cz-Sparkling-Stones--2017-09-08-18-57-37 _ swatch-ms20170826-6012-1k93fyl.jpg', 'Adorable-Necklace-Set-With-Cz-Sparkling-Stones--2017-09-08-18-57-37 _ swatch-ms20170826-6012-1k93fyl.jpg.jpg', '2017-09-08 18:57:37', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(66, 50, 'Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV14544966480-Jewellery-Silvesto_India_-1500542374-Craftsvilla_1.jpg.png', 'Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV14544966480-Jewellery-Silvesto_India_-1500542374-Craftsvilla_1.jpg.png.png', '2017-09-09 09:52:21', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(67, 50, 'Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV35232913650-Jewellery-Silvesto_India_-1500530717-Craftsvilla_1.jpg.png', 'Peacock-Inspired-Pair-Of-Jhumki-Earrings-2017-09-09-09-52-21 _ CV-11490-MSILV35232913650-Jewellery-Silvesto_India_-1500530717-Craftsvilla_1.jpg.png.png', '2017-09-09 09:52:21', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(68, 51, 'Silvestoo-India-Blue-Quartz-Gemstone-Earring-Pg-102350--2017-09-09-10-02-21 _ CV-34897-MVOYL77773528290-1495262149-Craftsvilla_1.jpg', 'Silvestoo-India-Blue-Quartz-Gemstone-Earring-Pg-102350--2017-09-09-10-02-21 _ CV-34897-MVOYL77773528290-1495262149-Craftsvilla_1.jpg.jpg', '2017-09-09 10:02:21', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(69, 51, 'Silvestoo-India-Blue-Quartz-Gemstone-Earring-Pg-102350--2017-09-09-10-02-21 _ CV-11490-MSILV83642553780-Jewellery-Silvesto_India_-1499856190-Craftsvilla_1.JPG', 'Silvestoo-India-Blue-Quartz-Gemstone-Earring-Pg-102350--2017-09-09-10-02-21 _ CV-11490-MSILV83642553780-Jewellery-Silvesto_India_-1499856190-Craftsvilla_1.JPG.jpg', '2017-09-09 10:02:21', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(70, 52, 'Afghanistan-Tribal-Jewellafghanistan-Tribal-Jewellery-2017-09-09-10-32-56 _ CV-34869-MSHAM69185315270--Shambhavi_Global_Enterprises_Pvt_Ltd-1486620152-Craftsvilla_1.jpg', 'Afghanistan-Tribal-Jewellafghanistan-Tribal-Jewellery-2017-09-09-10-32-56 _ CV-34869-MSHAM69185315270--Shambhavi_Global_Enterprises_Pvt_Ltd-1486620152-Craftsvilla_1.jpg.jpg', '2017-09-09 10:32:56', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(71, 53, 'Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ CV-34897-MVOYL97555811240-1495262176-Craftsvilla_1.jpg', 'Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ CV-34897-MVOYL97555811240-1495262176-Craftsvilla_1.jpg.jpg', '2017-09-09 10:58:36', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(72, 53, 'Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png', 'Studded-With-Multicolored-Stones--2017-09-09-10-58-36 _ ScreenHunter_.png.png', '2017-09-09 10:58:36', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(73, 54, 'The-Princess-Ring-2017-09-09-11-30-56 _ BV-R37_YAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-15772.png.jpg', 'The-Princess-Ring-2017-09-09-11-30-56 _ BV-R37_YAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-15772.png.jpg.jpg', '2017-09-09 11:30:57', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(74, 54, 'The-Princess-Ring-2017-09-09-11-30-56 _ ScreenHunter_.png', 'The-Princess-Ring-2017-09-09-11-30-56 _ ScreenHunter_.png.png', '2017-09-09 11:30:57', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(75, 55, 'The-Lady-Loveine-Ring-2017-09-09-12-54-40 _ BISR0305R23_WAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-10002.png.jpg', 'The-Lady-Loveine-Ring-2017-09-09-12-54-40 _ BISR0305R23_WAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-10002.png.jpg.jpg', '2017-09-09 12:54:40', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(76, 55, 'The-Lady-Loveine-Ring-2017-09-09-12-54-40 _ BISR0305R24_WAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-9608.png.jpg', 'The-Lady-Loveine-Ring-2017-09-09-12-54-40 _ BISR0305R24_WAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-9608.png.jpg.jpg', '2017-09-09 12:54:40', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(77, 35, 'brecalates-2017-09-09-15-42-14 _ Koala.jpg', 'brecalates-2017-09-09-15-42-14 _ Koala.jpg.jpg', '2017-09-09 15:42:14', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(78, 35, 'brecalates-2017-09-09-15-42-14 _ Lighthouse.jpg', 'brecalates-2017-09-09-15-42-14 _ Lighthouse.jpg.jpg', '2017-09-09 15:42:14', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(79, 35, 'brecalates-2017-09-09-15-42-14 _ Penguins.jpg', 'brecalates-2017-09-09-15-42-14 _ Penguins.jpg.jpg', '2017-09-09 15:42:14', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(80, 35, 'brecalates-2017-09-09-15-42-14 _ Tulips.jpg', 'brecalates-2017-09-09-15-42-14 _ Tulips.jpg.jpg', '2017-09-09 15:42:14', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(81, 56, 'Antique-Flower-Design-Multicolor-Semi-Bridal-Necklace-Set-2017-09-09-16-25-30 _ CV-3155-MSUKK35009401530-1484810037-Craftsvilla_1.jpg.png', 'Antique-Flower-Design-Multicolor-Semi-Bridal-Necklace-Set-2017-09-09-16-25-30 _ CV-3155-MSUKK35009401530-1484810037-Craftsvilla_1.jpg.png.png', '2017-09-09 16:25:30', '60', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(82, 56, 'Antique-Flower-Design-Multicolor-Semi-Bridal-Necklace-Set-2017-09-09-16-25-30 _ CV-3155-MSUKK35156126770-1472198163-Craftsvilla_1.jpg.png', 'Antique-Flower-Design-Multicolor-Semi-Bridal-Necklace-Set-2017-09-09-16-25-30 _ CV-3155-MSUKK35156126770-1472198163-Craftsvilla_1.jpg.png.png', '2017-09-09 16:25:30', '60', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(83, 57, 'Sukkhi-Fancy-Gold-Plated-Choker-Necklace-Set-For-Women-2017-09-09-16-31-06 _ CV-2958-MSWAR86141581250--Swarajshop-1484132654-Craftsvilla_1.JPG', 'Sukkhi-Fancy-Gold-Plated-Choker-Necklace-Set-For-Women-2017-09-09-16-31-06 _ CV-2958-MSWAR86141581250--Swarajshop-1484132654-Craftsvilla_1.JPG.jpg', '2017-09-09 16:31:06', '60', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(84, 59, 'Sukkhi-Magnificent-Jalebi-Gold-Plated-American-Diamond-Necklace-Set-For-Women-2017-09-09-16-53-09 _ CV-MSUKK27780416730--Sukkhi_Fashion-Craftsvilla_1.jpg', 'Sukkhi-Magnificent-Jalebi-Gold-Plated-American-Diamond-Necklace-Set-For-Women-2017-09-09-16-53-09 _ CV-MSUKK27780416730--Sukkhi_Fashion-Craftsvilla_1.jpg.jpg', '2017-09-09 16:53:09', '60', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(85, 62, 'fsdf-2017-09-11-17-42-19 _ Desert.jpg', 'fsdf-2017-09-11-17-42-19 _ Desert.jpg.jpg', '2017-09-11 17:42:19', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(86, 66, 'Sukkhi-Magnificent-Chandbali-Gold-Plated-Earring-For-Women-2017-09-15-10-22-52 _ CV-3155-MSUKK31500334200-1484809506-Craftsvilla_1.jpg.png', 'Sukkhi-Magnificent-Chandbali-Gold-Plated-Earring-For-Women-2017-09-15-10-22-52 _ CV-3155-MSUKK31500334200-1484809506-Craftsvilla_1.jpg.png.png', '2017-09-15 10:22:52', '68', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(87, 67, 'Jhumki-Earrings-With-Green-Enamel-And-Blue-Stones-2017-09-15-10-30-59 _ CV-6894-MINAY18555590050--INAYA-1469080515-Craftsvilla_1.jpg.png', 'Jhumki-Earrings-With-Green-Enamel-And-Blue-Stones-2017-09-15-10-30-59 _ CV-6894-MINAY18555590050--INAYA-1469080515-Craftsvilla_1.jpg.png.png', '2017-09-15 10:30:59', '68', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(88, 68, 'Stylish-Gold-Plated-Chandbali-Earring-For-Women--2017-09-15-10-54-58 _ CV-3155-MSUKK40644013880-1484809620-Craftsvilla_1.jpg.png', 'Stylish-Gold-Plated-Chandbali-Earring-For-Women--2017-09-15-10-54-58 _ CV-3155-MSUKK40644013880-1484809620-Craftsvilla_1.jpg.png.png', '2017-09-15 10:54:58', '68', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(89, 69, 'Pleasing-Gold-Plated-Ad-Chandbali-Earring-For-Women-2017-09-15-11-12-50 _ CV-6894-MINAY45482532340--INAYA-1469101112-Craftsvilla_1.jpg.png', 'Pleasing-Gold-Plated-Ad-Chandbali-Earring-For-Women-2017-09-15-11-12-50 _ CV-6894-MINAY45482532340--INAYA-1469101112-Craftsvilla_1.jpg.png.png', '2017-09-15 11:12:50', '68', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(90, 70, 'Sukkhi-Pleasing-Gold-Plated-Ad-Chandbali-Earring-For-Women-2017-09-15-12-47-14 _ CV-3155-MSUKK31500334200-1484809506-Craftsvilla_1.jpg.png', 'Sukkhi-Pleasing-Gold-Plated-Ad-Chandbali-Earring-For-Women-2017-09-15-12-47-14 _ CV-3155-MSUKK31500334200-1484809506-Craftsvilla_1.jpg.png.png', '2017-09-15 12:47:14', '70', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(91, 71, 'Peacock-Inspired-Jhumki-Earrings-2017-09-15-12-49-10 _ CV-6894-MINAY18555590050--INAYA-1469080515-Craftsvilla_1.jpg.png', 'Peacock-Inspired-Jhumki-Earrings-2017-09-15-12-49-10 _ CV-6894-MINAY18555590050--INAYA-1469080515-Craftsvilla_1.jpg.png.png', '2017-09-15 12:49:10', '70', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(92, 72, 'White-Traditional-Rajwadi-Jhumki-Earrings--2017-09-15-12-51-44 _ CV-6894-MINAY45482532340--INAYA-1469101112-Craftsvilla_1.jpg.png', 'White-Traditional-Rajwadi-Jhumki-Earrings--2017-09-15-12-51-44 _ CV-6894-MINAY45482532340--INAYA-1469101112-Craftsvilla_1.jpg.png.png', '2017-09-15 12:51:44', '70', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(93, 73, 'Golden-Beige-Polki-Stones-Dangle-And-Drop-Earrings-Jewellery-For-Women---Orniza--2017-09-15-12-54-04 _ CV-MINAY18994930340--INAYA-Craftsvilla_1.jpg.png', 'Golden-Beige-Polki-Stones-Dangle-And-Drop-Earrings-Jewellery-For-Women---Orniza--2017-09-15-12-54-04 _ CV-MINAY18994930340--INAYA-Craftsvilla_1.jpg.png.png', '2017-09-15 12:54:04', '70', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(94, 73, 'Golden-Beige-Polki-Stones-Dangle-And-Drop-Earrings-Jewellery-For-Women---Orniza--2017-09-15-12-54-04 _ CV-MSUKK63801309790--Sukkhi_Fashion-Craftsvilla_1.jpg.png', 'Golden-Beige-Polki-Stones-Dangle-And-Drop-Earrings-Jewellery-For-Women---Orniza--2017-09-15-12-54-04 _ CV-MSUKK63801309790--Sukkhi_Fashion-Craftsvilla_1.jpg.png.png', '2017-09-15 12:54:04', '70', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(95, 74, 'THE-ABISHTA-EAR-CUFFS-2017-09-15-15-36-22 _ BVAA0142S09_YAA18DIG6XXXXXXXX_ABCD00-p2-1024.jpg', 'THE-ABISHTA-EAR-CUFFS-2017-09-15-15-36-22 _ BVAA0142S09_YAA18DIG6XXXXXXXX_ABCD00-p2-1024.jpg.jpg', '2017-09-15 15:36:22', '70', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(96, 75, 'The-Madhura-Ear-Cuffs-2017-09-15-15-38-22 _ BVAJ0137E05_YAA18DIG6XXXXXXXX_ABCD00-p2-1024-v5.jpg', 'The-Madhura-Ear-Cuffs-2017-09-15-15-38-22 _ BVAJ0137E05_YAA18DIG6XXXXXXXX_ABCD00-p2-1024-v5.jpg.jpg', '2017-09-15 15:38:22', '70', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(97, 76, 'The-Adriana-Ear-Cuffs-2017-09-15-15-40-28 _ BVAJ0137E02_RAA18DIG6XXXXXXXX_ABCD00-p2-1024-v5.jpg', 'The-Adriana-Ear-Cuffs-2017-09-15-15-40-28 _ BVAJ0137E02_RAA18DIG6XXXXXXXX_ABCD00-p2-1024-v5.jpg.jpg', '2017-09-15 15:40:28', '70', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(98, 64, 'ttt-2017-09-16-09-57-30 _ BVAJ0137E02_RAA18DIG6XXXXXXXX_ABCD00-p2-1024-v5.jpg', 'ttt-2017-09-16-09-57-30 _ BVAJ0137E02_RAA18DIG6XXXXXXXX_ABCD00-p2-1024-v5.jpg.jpg', '2017-09-16 09:57:30', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(99, 64, 'ttt-2017-09-16-09-57-30 _ BVAJ0137E03_YAA18DIG6XXXXXXXX_ABCD00-p2-1024-v5.jpg', 'ttt-2017-09-16-09-57-30 _ BVAJ0137E03_YAA18DIG6XXXXXXXX_ABCD00-p2-1024-v5.jpg.jpg', '2017-09-16 09:57:30', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(100, 64, 'ttt-2017-09-16-09-57-30 _ BVAJ0137E05_YAA18DIG6XXXXXXXX_ABCD00-p2-1024-v5.jpg', 'ttt-2017-09-16-09-57-30 _ BVAJ0137E05_YAA18DIG6XXXXXXXX_ABCD00-p2-1024-v5.jpg.jpg', '2017-09-16 09:57:30', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(101, 83, 'Blue-Color-Letest-Nayantara-Traditional-Necklace-Set-2017-09-16-12-20-45 _ CV-2958-MSWAR13032453960--Swarajshop-1494090715-Craftsvilla_1.jpg', 'Blue-Color-Letest-Nayantara-Traditional-Necklace-Set-2017-09-16-12-20-45 _ CV-2958-MSWAR13032453960--Swarajshop-1494090715-Craftsvilla_1.jpg.jpg', '2017-09-16 12:20:45', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(102, 84, 'Letest-Nayantara-Traditional-Necklace-Set--2017-09-16-12-25-22 _ CV-2958-MSWAR48546037820--Swarajshop-1494090457-Craftsvilla_1.JPG', 'Letest-Nayantara-Traditional-Necklace-Set--2017-09-16-12-25-22 _ CV-2958-MSWAR48546037820--Swarajshop-1494090457-Craftsvilla_1.JPG.jpg', '2017-09-16 12:25:22', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(103, 85, 'Letest-Nayantara-Traditional-Necklace-Set--2017-09-16-12-26-43 _ CV-2958-MSWAR48546037820--Swarajshop-1494090457-Craftsvilla_1.JPG', 'Letest-Nayantara-Traditional-Necklace-Set--2017-09-16-12-26-43 _ CV-2958-MSWAR48546037820--Swarajshop-1494090457-Craftsvilla_1.JPG.jpg', '2017-09-16 12:26:43', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(104, 85, 'Letest-Nayantara-Traditional-Necklace-Set--12mm-23mm-Orange-19-2017-09-16-12-28-00 _ CV-2958-MSWAR13032453960--Swarajshop-1494090715-Craftsvilla_1.jpg', 'Letest-Nayantara-Traditional-Necklace-Set--12mm-23mm-Orange-19-2017-09-16-12-28-00 _ CV-2958-MSWAR13032453960--Swarajshop-1494090715-Craftsvilla_1.jpg.jpg', '2017-09-16 12:28:00', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(105, 86, 'abcde-2017-09-16-12-45-50 _ Desert.jpg', 'abcde-2017-09-16-12-45-50 _ Desert.jpg.jpg', '2017-09-16 12:45:50', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(106, 87, 'abcde-2017-09-16-12-46-42 _ Chrysanthemum.jpg', 'abcde-2017-09-16-12-46-42 _ Chrysanthemum.jpg.jpg', '2017-09-16 12:46:42', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(107, 88, 'abcde-2017-09-16-12-47-23 _ Hydrangeas.jpg', 'abcde-2017-09-16-12-47-23 _ Hydrangeas.jpg.jpg', '2017-09-16 12:47:23', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(108, 89, 'The-Pansy-Nose-Pin-2017-09-16-14-14-15 _ BIPM0021X12_YAA18DIG6XXXXXXXX_ABCD00-pr-1024-v3.jpg', 'The-Pansy-Nose-Pin-2017-09-16-14-14-15 _ BIPM0021X12_YAA18DIG6XXXXXXXX_ABCD00-pr-1024-v3.jpg.jpg', '2017-09-16 14:14:15', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(109, 90, 'vxcv-2017-09-16-14-18-51 _ Penguins.jpg', 'vxcv-2017-09-16-14-18-51 _ Penguins.jpg.jpg', '2017-09-16 14:18:51', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(110, 92, 'fsds-2017-09-16-14-29-47 _ Penguins.jpg', 'fsds-2017-09-16-14-29-47 _ Penguins.jpg.jpg', '2017-09-16 14:29:47', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(111, 93, 'The-Verbena-Nose-Pin-2017-09-16-14-34-18 _ BISM0021X03_YAA18DIG6XXXXXXXX_ABCD00-PICS-00004-1024-6052.png.jpg', 'The-Verbena-Nose-Pin-2017-09-16-14-34-18 _ BISM0021X03_YAA18DIG6XXXXXXXX_ABCD00-PICS-00004-1024-6052.png.jpg.jpg', '2017-09-16 14:34:18', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(112, 94, 'vxcvx-2017-09-16-14-36-52 _ Penguins.jpg', 'vxcvx-2017-09-16-14-36-52 _ Penguins.jpg.jpg', '2017-09-16 14:36:52', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(113, 105, 'abcd-2017-09-16-15-42-14 _ Hydrangeas.jpg', 'abcd-2017-09-16-15-42-14 _ Hydrangeas.jpg.jpg', '2017-09-16 15:42:14', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(114, 107, 'vxcvx-2017-09-16-15-46-50 _ Penguins.jpg', 'vxcvx-2017-09-16-15-46-50 _ Penguins.jpg.jpg', '2017-09-16 15:46:50', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(115, 111, 'sss-2017-09-16-15-57-58 _ Chrysanthemum.jpg', 'sss-2017-09-16-15-57-58 _ Chrysanthemum.jpg.jpg', '2017-09-16 15:57:58', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(116, 112, 'sss-2017-09-16-15-58-30 _ Penguins.jpg', 'sss-2017-09-16-15-58-30 _ Penguins.jpg.jpg', '2017-09-16 15:58:30', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(117, 113, 'sss-2017-09-16-16-15-50 _ Chrysanthemum.jpg', 'sss-2017-09-16-16-15-50 _ Chrysanthemum.jpg.jpg', '2017-09-16 16:15:50', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(118, 114, 'sss-2017-09-16-16-16-34 _ Hydrangeas.jpg', 'sss-2017-09-16-16-16-34 _ Hydrangeas.jpg.jpg', '2017-09-16 16:16:34', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(119, 115, 'qqq-2017-09-16-16-17-50 _ Lighthouse.jpg', 'qqq-2017-09-16-16-17-50 _ Lighthouse.jpg.jpg', '2017-09-16 16:17:50', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(120, 116, 'qqq-2017-09-16-16-19-10 _ Lighthouse.jpg', 'qqq-2017-09-16-16-19-10 _ Lighthouse.jpg.jpg', '2017-09-16 16:19:10', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(121, 117, 'qqq-2017-09-16-16-20-56 _ Lighthouse.jpg', 'qqq-2017-09-16-16-20-56 _ Lighthouse.jpg.jpg', '2017-09-16 16:20:56', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(122, 118, 'fgddf-2017-09-16-16-43-14 _ Hydrangeas.jpg', 'fgddf-2017-09-16-16-43-14 _ Hydrangeas.jpg.jpg', '2017-09-16 16:43:14', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(123, 121, 'fsf-2017-09-16-16-48-16 _ Penguins.jpg', 'fsf-2017-09-16-16-48-16 _ Penguins.jpg.jpg', '2017-09-16 16:48:16', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(124, 124, 'abcd-2017-09-16-16-54-09 _ Chrysanthemum.jpg', 'abcd-2017-09-16-16-54-09 _ Chrysanthemum.jpg.jpg', '2017-09-16 16:54:09', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(125, 125, 'abcd-2017-09-16-16-55-27 _ Jellyfish.jpg', 'abcd-2017-09-16-16-55-27 _ Jellyfish.jpg.jpg', '2017-09-16 16:55:27', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(126, 126, 'abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg', 'abcd-2017-09-16-16-56-18 _ Hydrangeas.jpg.jpg', '2017-09-16 16:56:18', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(127, 127, 'sss-2017-09-16-17-45-20 _ Koala.jpg', 'sss-2017-09-16-17-45-20 _ Koala.jpg.jpg', '2017-09-16 17:45:20', '4', '', '0000-00-00 00:00:00', 'Seller', '', 1),
(128, 132, 'ddds-2017-09-18-11-39-02 _ Lighthouse.jpg', 'ddds-2017-09-18-11-39-02 _ Lighthouse.jpg.jpg', '2017-09-18 11:39:02', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(129, 132, 'ddds-2017-09-18-11-40-10 _ Tulips.jpg', 'ddds-2017-09-18-11-40-10 _ Tulips.jpg.jpg', '2017-09-18 11:40:10', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(130, 123, 'kkk-6-Whiteab-2017-09-18-15-20-19 _ Hydrangeas.jpg', 'kkk-6-Whiteab-2017-09-18-15-20-19 _ Hydrangeas.jpg.jpg', '2017-09-18 15:20:19', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(131, 119, 'asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg', 'asdf-2017-09-18-15-22-20 _ Chrysanthemum.jpg.jpg', '2017-09-18 15:22:20', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(132, 140, 'aaaa-2017-09-18-15-23-21 _ Lighthouse.jpg', 'aaaa-2017-09-18-15-23-21 _ Lighthouse.jpg.jpg', '2017-09-18 15:23:21', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(133, 140, 'aaaa-2017-09-18-15-23-48 _ Tulips.jpg', 'aaaa-2017-09-18-15-23-48 _ Tulips.jpg.jpg', '2017-09-18 15:23:49', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(138, 142, 'wwww-2017-09-18-17-58-43 _ Penguins.jpg', 'wwww-2017-09-18-17-58-43 _ Penguins.jpg.jpg', '2017-09-18 17:58:43', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(140, 143, 'abc-2017-09-19-10-10-41 _ Tulips.jpg', 'abc-2017-09-19-10-10-41 _ Tulips.jpg.jpg', '2017-09-19 10:10:41', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(141, 147, 'Engagement-rings-2017-09-19-11-37-59 _ cjolr00219-2.jpg', 'Engagement-rings-2017-09-19-11-37-59 _ cjolr00219-2.jpg.jpg', '2017-09-19 11:37:59', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(142, 148, 'ring-2017-09-19-11-58-36 _ nsolr00340-2.jpg', 'ring-2017-09-19-11-58-36 _ nsolr00340-2.jpg.jpg', '2017-09-19 11:58:36', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(143, 149, 'ring-2017-09-19-12-01-51 _ nsolr00340-2.jpg', 'ring-2017-09-19-12-01-51 _ nsolr00340-2.jpg.jpg', '2017-09-19 12:01:51', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(144, 153, 'nav-2017-09-19-14-34-06 _ 1607137.jpg', 'nav-2017-09-19-14-34-06 _ 1607137.jpg.jpg', '2017-09-19 14:34:06', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(145, 156, 'ggg-2017-09-19-18-51-34 _ Jellyfish.jpg', 'ggg-2017-09-19-18-51-34 _ Jellyfish.jpg.jpg', '2017-09-19 18:51:34', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(146, 157, 'Multicolour-Polki-Gold-Look-Anklets-2017-09-20-10-22-25 _ CV-295-MSANV65247525970--Sanvi_Jewels_Pvt._Ltd.-1480389670-Craftsvilla_1.JPG', 'Multicolour-Polki-Gold-Look-Anklets-2017-09-20-10-22-25 _ CV-295-MSANV65247525970--Sanvi_Jewels_Pvt._Ltd.-1480389670-Craftsvilla_1.JPG.jpg', '2017-09-20 10:22:25', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(147, 159, 'abc-2017-09-21-12-18-38 _ Hydrangeas.jpg', 'abc-2017-09-21-12-18-38 _ Hydrangeas.jpg.jpg', '2017-09-21 12:18:38', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1),
(148, 160, 'abc-2017-09-21-12-19-28 _ Tulips.jpg', 'abc-2017-09-21-12-19-28 _ Tulips.jpg.jpg', '2017-09-21 12:19:28', '1', '', '0000-00-00 00:00:00', 'Admin', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_metal`
--

CREATE TABLE IF NOT EXISTS `product_metal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_metal`
--

INSERT INTO `product_metal` (`id`, `name`, `slug`, `added_on`, `added_by`, `updated_by`, `updated_on`, `status`, `delete`) VALUES
(1, 'Gold', 'Gold', '2017-08-22 14:23:47', '1', '1', '2017-08-22 14:23:47', 1, 0),
(2, 'Sterling Silver', 'Sterling-Silver', '2017-08-22 14:43:59', '1', '1', '2017-08-22 14:43:59', 1, 0),
(3, 'White Gold', 'White-Gold', '2017-08-22 14:44:16', '1', '1', '2017-08-22 14:44:16', 1, 0),
(4, 'Platinum', 'Platinum', '2017-08-22 14:44:42', '1', '1', '2017-08-22 14:44:42', 1, 0),
(5, 'Sterling Silver & Gold', 'Sterling-Silver--Gold', '2017-08-22 14:44:55', '1', '1', '2017-08-22 14:44:55', 1, 0),
(6, 'Yelow Gold', '-Yelow-Gold-', '2017-08-22 14:45:09', '1', '1', '2017-09-04 12:59:10', 1, 0),
(7, 'test3232', 'test3232', '2017-08-22 14:45:26', '1', '1', '2017-08-22 14:48:13', 1, 1),
(8, '                    Silver                                            ', '-Silver-', '2017-08-22 15:27:02', '1', '1', '2017-09-01 17:58:11', 1, 0),
(9, 'golds', 'golds', '2017-09-02 15:31:58', '1', '1', '2017-09-11 13:52:40', 1, 0),
(10, 'silver jewellaryy', 'silver-jewellaryy', '2017-09-12 14:11:29', '1', '1', '2017-09-15 18:37:38', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `review_type` int(11) NOT NULL COMMENT '1 for product and 2 for seller shop',
  `rating` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `like` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `seller_id`, `product_id`, `title`, `description`, `review_type`, `rating`, `ip`, `like`, `slug`, `image`, `added_on`, `added_by`, `updated_by`, `updated_on`, `status`, `delete`) VALUES
(1, 4, 0, 3, '', '', 4, 4, '::1', 0, '', '-.jpg', '2017-08-24 15:38:50', '', '', '0000-00-00 00:00:00', 1, 0),
(2, 4, 0, 0, '', '', 4, 4, '::1', 0, '', '-.jpg', '2017-08-24 15:38:51', '', '', '0000-00-00 00:00:00', 1, 0),
(3, 4, 0, 3, '', '', 4, 4, '::1', 0, '', '-2017-08-24-15-41-14.jpg', '2017-08-24 15:41:14', '', '', '0000-00-00 00:00:00', 1, 0),
(4, 4, 0, 0, '', '', 4, 4, '::1', 0, '', '-2017-08-24-15-41-14.jpg', '2017-08-24 15:41:14', '', '', '0000-00-00 00:00:00', 1, 0),
(5, 4, 0, 0, '', '', 4, 4, '::1', 0, '', '-2017-08-24-15-41-15.jpg', '2017-08-24 15:41:15', '', '', '0000-00-00 00:00:00', 1, 0),
(6, 4, 0, 0, '', '', 4, 4, '::1', 0, '', '-2017-08-24-15-43-38.jpg', '2017-08-24 15:43:38', '', '', '0000-00-00 00:00:00', 1, 0),
(7, 4, 0, 0, '', '', 4, 4, '::1', 0, '', '-2017-08-24-15-43-38.jpg', '2017-08-24 15:43:38', '', '', '0000-00-00 00:00:00', 1, 0),
(8, 4, 0, 0, '', '', 4, 4, '::1', 0, '', '-2017-08-24-15-45-32.jpg', '2017-08-24 15:45:33', '', '', '0000-00-00 00:00:00', 1, 0),
(9, 4, 0, 0, '', '', 4, 4, '::1', 0, '', '-2017-08-24-15-45-33.jpg', '2017-08-24 15:45:33', '', '', '0000-00-00 00:00:00', 1, 0),
(10, 4, 0, 0, '', '', 4, 4, '::1', 0, '', '-2017-08-24-15-45-50.jpg', '2017-08-24 15:45:51', '', '', '0000-00-00 00:00:00', 1, 0),
(11, 4, 0, 0, '', '', 4, 4, '::1', 0, '', 'test-2017-08-24-15-47-50.jpg', '2017-08-24 15:47:50', '', '', '0000-00-00 00:00:00', 1, 0),
(12, 4, 0, 0, '', '', 4, 4, '::1', 0, '', 'test-2017-08-24-15-47-50.jpg', '2017-08-24 15:47:50', '', '', '0000-00-00 00:00:00', 1, 0),
(13, 4, 0, 0, '', '', 4, 4, '::1', 0, '', 'test-2017-08-24-15-50-01.jpg', '2017-08-24 15:50:01', '', '', '0000-00-00 00:00:00', 1, 0),
(14, 4, 0, 0, '', '', 4, 4, '::1', 0, '', 'test-2017-08-24-15-50-01.jpg', '2017-08-24 15:50:02', '', '', '0000-00-00 00:00:00', 1, 0),
(15, 4, 0, 0, '', '', 4, 4, '::1', 0, '', 'test-2017-08-24-15-50-52.jpg', '2017-08-24 15:50:52', '', '', '0000-00-00 00:00:00', 1, 0),
(16, 4, 0, 0, '', '', 4, 4, '::1', 0, '', 'test-2017-08-24-15-51-45.jpg', '2017-08-24 15:51:46', '', '', '0000-00-00 00:00:00', 1, 0),
(17, 4, 0, 0, '', '', 4, 4, '::1', 0, '', 'test-2017-08-24-15-51-46.jpg', '2017-08-24 15:51:46', '', '', '0000-00-00 00:00:00', 1, 0),
(18, 4, 0, 0, 'test', 'dGVzdGVldHQ=', 4, 4, '::1', 0, '', 'test-2017-08-24-15-53-00.jpg', '2017-08-24 15:53:00', '', '', '0000-00-00 00:00:00', 1, 0),
(19, 4, 0, 0, 'test', 'dGVzdGVldHQ=', 4, 4, '::1', 0, '', 'test-2017-08-24-15-53-00.jpg', '2017-08-24 15:53:01', '', '', '0000-00-00 00:00:00', 1, 0),
(20, 4, 0, 3, 'ttet', 'dGV0ZXRldA==', 4, 4, '::1', 0, '', 'ttet-2017-08-24-15-53-37.jpg', '2017-08-24 15:53:37', '', '', '0000-00-00 00:00:00', 1, 0),
(21, 4, 0, 3, 'ffffffffffffff', 'ZmZmZmZmZmZmZmZmZg==', 4, 4, '::1', 0, '', '', '2017-08-24 16:55:58', '', '', '0000-00-00 00:00:00', 1, 0),
(22, 4, 0, 3, 'test', 'dGVzdA==', 4, 4, '::1', 0, '', '', '2017-08-24 16:58:03', '', '', '0000-00-00 00:00:00', 1, 0),
(23, 4, 0, 3, 'test', 'dGVzdA==', 4, 4, '::1', 0, '', '', '2017-08-24 16:58:03', '', '', '0000-00-00 00:00:00', 1, 0),
(24, 4, 0, 3, 'yyyyyyyyy', 'ZGRkc2V3cWVxcXFxcXFxcXFxcXFxcXFxcXFxcXdlcXFlcWVxZXFxcWVl', 4, 4, '::1', 0, '', 'yyyyyyyyy-2017-08-24-18-45-23.jpg', '2017-08-24 18:45:23', '', '', '0000-00-00 00:00:00', 1, 0),
(25, 4, 0, 5, 'test', 'dGVzdGV0', 4, 4, '::1', 0, '', 'test-2017-08-24-18-46-45.jpg', '2017-08-24 18:46:45', '', '', '0000-00-00 00:00:00', 1, 0),
(26, 4, 0, 5, 'test', 'dGVzdGV0', 4, 4, '::1', 0, '', 'test-2017-08-24-18-46-45.jpg', '2017-08-24 18:46:46', '', '', '0000-00-00 00:00:00', 1, 0),
(27, 4, 0, 5, 'yyyyyyyyy', 'Z2dnZ2dnZ2c=', 4, 4, '::1', 0, '', 'yyyyyyyyy-2017-08-24-18-47-03.jpg', '2017-08-24 18:47:03', '', '', '0000-00-00 00:00:00', 1, 0),
(28, 4, 0, 7, 'tteww', 'd3d0dHc=', 1, 1, '::1', 0, '', 'tteww-2017-08-24-18-58-52.jpg', '2017-08-24 18:58:52', '', '', '0000-00-00 00:00:00', 1, 0),
(29, 4, 0, 7, 'tteww', 'd3d0dHc=', 1, 1, '::1', 0, '', 'tteww-2017-08-24-18-58-52.jpg', '2017-08-24 18:58:52', '', '', '0000-00-00 00:00:00', 1, 0),
(30, 4, 0, 7, 'twet', 'dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dA==', 1, 5, '::1', 0, '', 'twet-2017-08-24-18-59-12.jpg', '2017-08-24 18:59:12', '', '', '0000-00-00 00:00:00', 1, 0),
(31, 4, 0, 7, 'twet', 'dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dHR0dA==', 1, 5, '::1', 0, '', 'twet-2017-08-24-18-59-12.jpg', '2017-08-24 18:59:12', '', '', '0000-00-00 00:00:00', 1, 0),
(32, 4, 0, 7, 'tete', 'dGV0ZWVlZWVlcnc=', 1, 4, '::1', 0, '', 'tete-2017-08-24-19-00-15.jpg', '2017-08-24 19:00:15', '', '', '0000-00-00 00:00:00', 1, 0),
(33, 4, 4, 0, 'test', 'dGVlZWVlZWVlZWVlZWU=', 1, 4, '::1', 0, '', 'test-2017-08-24-19-26-58.jpg', '2017-08-24 19:26:58', '', '', '0000-00-00 00:00:00', 1, 0),
(34, 4, 4, 0, 'seller', 'c2VsbGVyIHJld28g', 1, 4, '::1', 0, '', 'seller-2017-08-24-19-33-10.jpg', '2017-08-24 19:33:10', '', '', '0000-00-00 00:00:00', 1, 0),
(35, 4, 4, 0, 'seller', 'c2VsbGVyIHJld28g', 1, 4, '::1', 0, '', 'seller-2017-08-24-19-33-10.jpg', '2017-08-24 19:33:10', '', '', '0000-00-00 00:00:00', 1, 0),
(36, 4, 0, 6, 'test', 'dGVzdA==', 1, 3, '::1', 0, '', 'test-2017-08-25-10-30-04.jpg', '2017-08-25 10:30:05', '', '', '0000-00-00 00:00:00', 1, 0),
(37, 29, 0, 21, 'good', 'Z29vZA==', 1, 5, '183.182.86.244', 0, '', '', '2017-09-05 12:40:53', '', '', '0000-00-00 00:00:00', 1, 0),
(38, 61, 4, 0, 'good', 'Z29vZA==', 1, 3, '183.182.86.244', 0, '', '', '2017-09-07 12:22:32', '', '', '0000-00-00 00:00:00', 1, 0),
(39, 61, 4, 0, 'hhhh', 'aGhoaA==', 1, 3, '183.182.86.244', 0, '', '', '2017-09-07 12:23:38', '', '', '0000-00-00 00:00:00', 1, 0),
(40, 61, 4, 0, 'excellent', 'RXhjZWxsZW50', 1, 1, '183.182.86.244', 0, '', '', '2017-09-07 12:24:05', '', '', '0000-00-00 00:00:00', 1, 0),
(41, 61, 0, 22, 'good', 'RXhjZWxsZW50', 1, 1, '183.182.86.244', 0, '', '', '2017-09-07 13:00:00', '', '', '0000-00-00 00:00:00', 1, 0),
(42, 3, 0, 29, '', 'dGVzdA==', 1, 1, '183.182.86.244', 0, '', '-2017-09-07-16-49-33.jpg', '2017-09-07 16:49:34', '', '', '0000-00-00 00:00:00', 1, 0),
(43, 3, 4, 0, '', 'Z29vZA==', 1, 4, '183.182.86.244', 0, '', '-2017-09-07-17-09-25.jpg', '2017-09-07 17:09:25', '', '', '0000-00-00 00:00:00', 1, 0),
(44, 3, 4, 0, '', 'Z29vZA==', 1, 4, '183.182.86.244', 0, '', '-2017-09-07-17-09-26.jpg', '2017-09-07 17:09:26', '', '', '0000-00-00 00:00:00', 1, 0),
(45, 3, 4, 0, '', 'Z29vZA==', 1, 4, '183.182.86.244', 0, '', '-2017-09-07-17-09-28.jpg', '2017-09-07 17:09:28', '', '', '0000-00-00 00:00:00', 1, 0),
(46, 3, 4, 0, '', 'NA==', 1, 4, '183.182.86.244', 0, '', '', '2017-09-07 17:11:00', '', '', '0000-00-00 00:00:00', 1, 0),
(47, 14, 0, 5, '', 'dGVzdA==', 1, 3, '183.182.86.243', 0, '', '', '2017-09-11 17:31:15', '', '', '0000-00-00 00:00:00', 1, 0),
(48, 14, 0, 5, '', 'dGVzdA==', 1, 4, '183.182.86.243', 0, '', '-2017-09-11-17-33-07.jpg', '2017-09-11 17:33:07', '', '', '0000-00-00 00:00:00', 1, 0),
(49, 14, 0, 5, '', 'dGVzdA==', 1, 4, '183.182.86.243', 0, '', '-2017-09-11-17-33-11.jpg', '2017-09-11 17:33:11', '', '', '0000-00-00 00:00:00', 1, 0),
(50, 14, 0, 5, '', 'dGVzdA==', 1, 5, '183.182.86.243', 0, '', '-2017-09-11-17-33-51.jpg', '2017-09-11 17:33:51', '', '', '0000-00-00 00:00:00', 1, 0),
(51, 61, 4, 0, '', 'Z29vZA==', 1, 1, '183.182.86.243', 0, '', '', '2017-09-11 18:54:56', '', '', '0000-00-00 00:00:00', 1, 0),
(52, 61, 68, 0, '', 'TmljZSBqZXdlbGxlcnkgY29sbGVjdGlvbg==', 1, 5, '183.182.86.243', 0, '', '', '2017-09-15 10:46:56', '', '', '0000-00-00 00:00:00', 1, 0),
(53, 68, 68, 0, '', 'Z29vZA==', 1, 1, '183.182.86.243', 0, '', '', '2017-09-15 11:34:33', '', '', '0000-00-00 00:00:00', 1, 0),
(54, 67, 0, 71, '', 'dGVzdA==', 1, 5, '183.182.86.244', 0, '', '-2017-09-16-12-45-15.jpg', '2017-09-16 12:45:15', '', '', '0000-00-00 00:00:00', 1, 0),
(55, 61, 0, 21, '', 'Z29vZC4=', 1, 4, '183.182.86.244', 0, '', '', '2017-09-18 11:04:05', '', '', '0000-00-00 00:00:00', 1, 0),
(56, 67, 70, 0, '', 'aGdkYmhkZ2FoZGF2eWhkc2ZhZA==', 1, 5, '183.182.86.245', 0, '', '', '2017-09-19 17:09:25', '', '', '0000-00-00 00:00:00', 1, 0);

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
-- Table structure for table `seller_shop`
--

CREATE TABLE IF NOT EXISTS `seller_shop` (
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
  `password` varchar(255) DEFAULT '0',
  `random_password` varchar(250) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `aboutme` text NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_heading` text NOT NULL,
  `discripation` text NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `shop_contact` varchar(20) NOT NULL,
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
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `temp_password` varchar(200) NOT NULL,
  `email_varified` tinyint(4) NOT NULL DEFAULT '0',
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `googleplus` text NOT NULL,
  `pinrest` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `slug`, `contact_no`, `password`, `random_password`, `city`, `state`, `country`, `address`, `zip_code`, `aboutme`, `shop_name`, `shop_heading`, `discripation`, `cover_image`, `shop_contact`, `shop_image`, `shop_policy`, `payment_policy`, `shipping_return_policy`, `facebook_id`, `added_on`, `added_by`, `updated_on`, `updated_by`, `md5_password`, `roll_type`, `status`, `image`, `today_login`, `pre_login`, `approved`, `temp_password`, `email_varified`, `facebook`, `twitter`, `googleplus`, `pinrest`) VALUES
(2, 'abhilash', 'abhilash@gmail.com', 'abhilasf', '810911237', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '2017-07-15 15:31:02', '1', '2017-07-17 14:40:13', '1', '93279e3308bdbbeed946fc965017f67a', 2, 1, 'abhilasf-2017-07-15-15-31-02.jpg', '2017-07-28 11:24:31', '0000-00-00 00:00:00', 1, '', 0, '', '', '', ''),
(3, 'buyer', 'buyer@gmail.com', 'buyer', '111111111', '93279e3308bdbbeed946fc965017f67a', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '2017-07-17 14:51:29', '1', '1000-01-01 00:00:00', '0', '93279e3308bdbbeed946fc965017f67a', 1, 1, 'buyer-2017-07-17-14-51-29.jpg', '2017-09-07 16:36:57', '2017-09-07 15:52:18', 0, '', 0, '', '', '', ''),
(4, 'seller', 'seller@gmail.com', 'selller', '8109112337', '121212', '', 'indore', 'MP', 'India', '304, vidhapati', 0, 'V2VsY29tZSB0byBKZXdlbHJ5IEJ5IEplbm5pZmVyIENhc2FkeSwgYW4gaW50aW1hdGUgYm91dGlxdWUgb2YgZWxlZ2FudCBhbmQgbW9kZXJuIGhhbmRtYWRlIGpld2VscnkgaW5jb3Jwb3JhdGluZyBhIHdpZGUgdmFyaWV0eSBvZiBnZW1zdG9uZXMgYW5kIHN0ZXJsaW5nIHNpbHZlci4gSSBkZXNpZ24gb25lLW9mLWEta2luZCBhbmQgbGltaXRlZCBlZGl0aW9uIHBpZWNlcyB1c2luZyB2YXJpb3VzIHRlY2huaXF1ZXMsIHdoaWNoIGFyZSBlbnRpcmVseSBzZWxmLXRhdWdodCwgaW5jbHVkaW5nIG1ldGFsc21pdGhpbmcsIHdpcmUtd3JhcHBpbmcsIGhhbmQgc3RhbXBpbmcsIFBNQyAocHJlY2lvdXMgbWV0YWwgY2xheSksIGFuZCB0aGUgYW5jaWVudCBhbmQgYmVhdXRpZnVsIGFydCBvZiBjaGFpbm1haWwuIE15IGhhbmRjcmFmdGVkIGpld2VscnkgaGFzIGEgbW9kZXJuIGFuZCB1bmRlcnN0YXRlZCBlbGVnYW5jZSB3aGljaCBlbmhhbmNlcyBhIHdvbWFuJ3MgaW5kaXZpZHVhbCBiZWF1dHkuIFRoZSB2YXN0IG1ham9yaXR5IG9mIG15IHBpZWNlcyBhcmUgZGVsaWJlcmF0ZWx5IGRlc2lnbmVkIHRvIGJlIGRhaW50eSBhbmQgcGV0aXRlLg0KDQpJIGFtIHRoZSB3aWZlIG9mIGFuIGFtYXppbmcgaHVzYmFuZCwgYSBzdGF5LWF0LWhvbWUgTW9tIHRvIHRocmVlIHByZWNpb3VzIGhvbWVzY2hvb2xlZCBnaXJscyBhbmQgamV3ZWxyeSBkZXNpZ25lci4gSSBhbSBhIHRoaXJkIGdlbmVyYXRpb24gamV3ZWxyeSBkZXNpZ25lciBhbmQgaGF2ZSBiZWVuIGNyYWZ0eSBteSBlbnRpcmUgbGlmZSwgdGhhbmtzIHRvIHRoZSBhd2Vzb21lIGNyYWZ0eSBnZW5lcyBpbiBvdXIgZmFtaWx5LiAqZ3JpbiogRnJvbSBnb2luZyB0byBnZW0gc2hvd3Mgd2l0aCBteSBwYXJlbnRzIGFuZCBncmFuZHBhcmVudHPvv70=', 'Shambhavi Global Enterprises Pvt Ltd', 'shop', 'orld of designer jewellery. It was modest beginniorld of designer jewellery. It was modest beginniorld of designer jewellery. It was modest beginniorld of designer jewellery. It was modest beginni', 'selller1-2017-08-12-19-18-11.jpg', '8109112337', '-2017-09-09-17-08-10.jpg', 'PHA+Jm5ic3A7PC9wPg0KDQo8cD4xMDAlIEJ1eWVyIFByb3RlY3Rpb24sIDcgRGF5cyBFYXN5IFJldHVybiBwb2xpY3k8L3A+DQo=', 'PGRpdiBjbGFzcz0iZmFkZSB0YWItcGFuZSBhY3RpdmUgaW4iIGlkPSJzZWN1cmVQYXltZW50cyI+DQo8ZGl2IGNsYXNzPSJtYXJ0NSI+PHN0cm9uZz5QYXltZW50IE1vZGVzOjwvc3Ryb25nPjwvZGl2Pg0KDQo8cD5DYXNoIG9uIERlbGl2ZXJ5PC9wPg0KDQo8cD5OZXQgQmFua2luZywgRGViaXQgY2FyZHMvIENyZWRpdCBDYXJkcyAoVmlzYSwgTWFzdGVyQ2FyZCwgQW1lcmljYW4gRXhwcmVzcywgRGluZXJzIENsdWIgY2FyZHMgYWNjZXB0ZWQpIEludGVybmF0aW9uYWwgQ3JlZGl0IENhcmRzPC9wPg0KDQo8ZGl2IGNsYXNzPSJtYXJ0NSI+PHN0cm9uZz5QYXltZW50IERldGFpbHM6IDwvc3Ryb25nPjwvZGl2Pg0KDQo8cD5Zb3Ugd2lsbCByZWNlaXZlIGFuIGVtYWlsIHdpdGggeW91ciBwYXltZW50IGRldGFpbHMgaW1tZWRpYXRlbHkgYWZ0ZXIgeW91IG1ha2UgYSBwdXJjaGFzZS4gSW4gY2FzZSBvZiBhbnkgaXNzdWVzIG91ciBjdXN0b21lciBjYXJlIHdvdWxkIGJlIGhhcHB5IHRvIGhlbHAgeW91PC9wPg0KDQo8ZGl2IGNsYXNzPSJtYXJ0NSI+PHN0cm9uZz5QYXltZW50IFNlY3VyaXR5Ojwvc3Ryb25nPjwvZGl2Pg0KDQo8cD5Zb3UgdHJhbnNwYXJlbnRseSBwYXkgdGhyb3VnaCBvdXIgUGF5bWVudCBHYXRld2F5IGFuZCBhbGwgdGhlIGRhdGEgaXMgdHJhbnNmZXJyZWQgdGhyb3VnaCBoaWdoIGxldmVsIGVuY3J5cHRpb24gdGVjaG5vbG9neS4gV2UgZ3VhcmFudGVlIHlvdSwgeW91ciBwYXltZW50cyBhcmUgMTAwJSBzZWN1cmVkIHdpdGggdXMgYW5kIHlvdXIgcGF5bWVudCBkZXRhaWxzIGFyZSBuZXZlciBzaGFyZWQgd2l0aCBhbnlvbmUgZHVyaW5nIHRoZSBwYXltZW50IHByb2Nlc3MmbmJzcDs8L3A+DQo8L2Rpdj4NCg==', 'PGRpdiBjbGFzcz0idGFiLXBhbmUgYWN0aXZlIiBpZD0ic2hpcHBpbmdQb2xpY2llcyI+DQo8ZGl2IGNsYXNzPSJtYXJ0NSI+PHN0cm9uZz5TaGlwcGluZyBUaW1lPC9zdHJvbmc+PC9kaXY+DQoNCjxwPldlIGRlbGl2ZXIgaW4gSW5kaWEgd2l0aGluIDEwIGRheXMgYW5kIG91dHNpZGUgb2YgSW5kaWEgd2l0aGluIDIxIGRheXMuIEN1cnJlbnRseSBvdXIgYXZlcmFnZSBkZWxpdmVyeSB0aW1lIGluIEluZGlhIGlzIGFyb3VuZCA0IGRheXMgYW5kIG91dHNpZGUgb2YgSW5kaWEgaXMgMTggZGF5czwvcD4NCg0KPGRpdiBjbGFzcz0ibWFydDUiPjxzdHJvbmc+U2hpcG1lbnQgVHJhY2tpbmc6PC9zdHJvbmc+PC9kaXY+DQoNCjxwPllvdSB3aWxsIGdldCBhbiBlbWFpbCBhbmQgU01TIHdpdGggdGhlIHRyYWNraW5nIGRldGFpbHMgYXMgc29vbiBhcyB0aGUgcHJvZHVjdCBpcyBzaGlwcGVkLiBZb3UgY2FuIGFsc28gcmVxdWVzdCB0aGUgc2VsbGVyIGZvciBhIGZhc3RlciBzaGlwcGluZyBieSBjbGlja2luZyB0aGUgJmxzcXVvO0NvbnRhY3QgU2VsbGVyJnJzcXVvOyBidXR0b24gb24gdGhlIHByb2R1Y3QgcGFnZSBhZnRlciB5b3UgcGxhY2UgdGhlIG9yZGVyPC9wPg0KDQo8ZGl2IGNsYXNzPSJtYXJ0NSI+PHN0cm9uZz5TaGlwcGluZyBMb2NhdGlvbnM6PC9zdHJvbmc+PC9kaXY+DQoNCjxwPldlIGRlbGl2ZXIgdG8gb3ZlciAxMDAgY291bnRyaWVzIGdsb2JhbGx5IGluY2x1ZGluZyBVU0EsIFVLLCBBdXN0cmFsaWEgYW5kIENhbmFkYSZuYnNwOzwvcD4NCg0KPGRpdiBjbGFzcz0iZmFkZSB0YWItcGFuZSBhY3RpdmUgaW4iIGlkPSJyZXR1cm5Qb2xpY2llcyI+DQo8ZGl2IGNsYXNzPSJtYXJ0NSI+PHN0cm9uZz5SZXR1cm4gVGltZTo8L3N0cm9uZz48L2Rpdj4NCg0KPHA+V2UgaGF2ZSBhIDEwMCUgQnV5ZXIgcHJvdGVjdGlvbiBwb2xpY3kgd2hlcmVpbiB5b3UgY2FuIHJldHVybiB0aGUgcHJvZHVjdCBmb3IgYW55IHJlYXNvbiB3aGF0c29ldmVyLiBZb3UgY2FuIHNoaXAgaXQgYmFjayB0byB1cyB3aXRoaW4gMTQgZGF5cyBhbmQgZ2V0IGEgZnVsbCByZWZ1bmQ8L3A+DQoNCjxkaXYgY2xhc3M9Im1hcnQ1Ij48c3Ryb25nPlJldHVybiBQcm9jZXNzOiA8L3N0cm9uZz48L2Rpdj4NCg0KPHA+SnVzdCBlbWFpbCB1cyB5b3VyIGNvbXBsYWludCB3aXRoIG9yZGVyIG51bWJlciB3aXRoaW4gNyBkYXlzIG9mIHJlY2VpcHQgb2YgdGhlIHByb2R1Y3QuIFlvdSBjYW4gYWxzbyBsb2dpbiB0byB5b3VyIGFjY291bnQgYW5kIHJhaXNlIGEgZGlzcHV0ZSBmcm9tIHRoZXJlLiBPdXIgdGVhbSB3aWxsIHJlcGx5IHRvIHlvdSB3aXRoIGFuIGFwcHJvdmFsIGVtYWlsIGNvbnRhaW5pbmcgdGhlIGluc3RydWN0aW9ucyBhbmQgcmV0dXJuIHNoaXBwaW5nIGFkZHJlc3MgdG8gd2hpY2ggeW91IG5lZWQgdG8gc2VuZCBiYWNrIHRoZSBwcm9kdWN0IHdpdGhpbiA3IGRheXMuPC9wPg0KDQo8ZGl2IGNsYXNzPSJtYXJ0NSI+PHN0cm9uZz5SZWZ1bmQ6IDwvc3Ryb25nPjwvZGl2Pg0KDQo8cD5JZiB5b3Ugd2lzaCwgd2UgY2FuIG9mZmVyIHlvdSBhIHJlZGVlbWFibGUgdm91Y2hlciB3b3J0aCB0aGUgcmVmdW5kIGFtb3VudCBmb3IgZnV0dXJlIHB1cmNoYXNlcy4gRWxzZSB3ZSBjYW4gYWxzbyByZWZ1bmQgdGhlIGVudGlyZSBhbW91bnQgYmFjayB0byB5b3VyIGJhbmsgYWNjb3VudCB3aXRob3V0IGFueSBkZWR1Y3Rpb25zIGFsb25nIHdpdGggUnMuIDEwMCBmb3IgcmV0dXJuIHNoaXBwaW5nLjwvcD4NCjwvZGl2Pg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCjwvZGl2Pg0K', '', '2017-07-17 14:52:55', '4', '2017-09-08 19:44:12', '1', 'd41d8cd98f00b204e9800998ecf8427e', 2, 1, 'seller-2017-09-14-16-28-46.png', '2017-09-21 16:47:31', '2017-09-20 09:47:40', 1, 'AbRGLJOy', 0, 'https://twitter.com/login?lang=en111', 'https://twitter.com/login?lang=en111', 'https://plus.google.com/discover111', 'https://plus.google.com/discover11111'),
(5, 'test', 'test@gmail.com', 'test', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '2017-08-10 18:46:43', '0', '2017-09-12 14:12:56', '5', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'test-2017-08-30-18-49-21.jpg', '2017-09-12 14:12:27', '2017-09-05 11:04:02', 0, '', 0, '', '', '', ''),
(6, 'dd', 'aaa@gmail.comf', 'tes', '111111111111', 'd9f6e636e369552839e7bb8057aeb8da', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '2017-08-17 16:27:10', '0', '2017-09-04 17:02:26', '1', 'd9f6e636e369552839e7bb8057aeb8da', 1, 1, 'dd-2017-09-04-17-02-14.jpg', '2017-08-17 16:27:53', '0000-00-00 00:00:00', 0, '', 0, '', '', '', ''),
(9, '                                   Pranay 1222                                       ggggg                       ', 'pranay343@tttt.com', 'Pranay-1-', '5', '202cb962ac59075b964b07152d234b70', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '2017-08-28 21:58:17', '0', '2017-09-01 17:07:34', '1', '202cb962ac59075b964b07152d234b70', 0, 1, 'Pranay-1--2017-08-28-21-58-17.jpg', '2017-08-28 21:58:43', '0000-00-00 00:00:00', 0, '', 0, '', '', '', ''),
(11, 'aseller', 'mmf.abhilash1081@gmial.com', 'aseller', '1111111111', '93279e3308bdbbeed946fc965017f67a', '', 'indore', 'mp', 'india', 'zanzir wala chohara', 452001, '', '', '', '', '', '', '', '', '', '', '', '2017-08-29 14:22:21', '0', '2017-09-01 16:50:39', '1', '93279e3308bdbbeed946fc965017f67a', 2, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', 0, '', '', '', ''),
(14, 'customer', 'customer@gmail.com', 'test21', '1234567890', 'a01610228fe998f515a72dd730294d87', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '2017-09-01 15:12:38', '0', '2017-09-08 16:11:43', '14', 'a01610228fe998f515a72dd730294d87', 1, 1, 'customer-2017-09-08-16-11-43.jpg', '2017-09-12 15:27:24', '2017-09-12 13:40:39', 0, '', 0, '', '', '', ''),
(18, 'ssstest', 'f@gmail.com', 'ssstest', '4444444444', '8fa14cdd754f91cc6554c9e71929cce7', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '2017-09-02 17:08:23', '0', '1000-01-01 00:00:00', '0', '8fa14cdd754f91cc6554c9e71929cce7', 1, 1, '', '2017-09-02 17:09:02', '0000-00-00 00:00:00', 0, '', 0, '', '', '', ''),
(57, 'sneha-test', 'mmfinfotech1075@gmail.com', 'sneha-test', '9786541238', '123456', '', 'indore', 'madhya pradesh', 'india', 'mmf', 452011, '', '', '', '', '', '', '', '', '', '', '', '2017-09-05 16:19:23', '0', '2017-09-06 11:30:58', '57', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '', '2017-09-20 11:04:13', '2017-09-19 17:47:55', 1, 'iGB6NoFq', 0, '', '', '', ''),
(61, 'sheetallowanshi', 'sheetallowanshi08@gmail.com', 'sheetal-', '3555234444', 'sheetal', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '2017-09-06 11:20:53', '0', '2017-09-16 12:03:39', '61', '0040ab77fe2607c1fcd0a7069dd9faa5', 1, 1, 'sheetal-2017-09-12-16-47-42.jpg', '2017-09-21 16:50:52', '2017-09-21 14:00:38', 1, 'v63ZB75V', 0, '', '', '', ''),
(62, 'mishi', 'mishi@gmail.com', 'mishi', '556645444646', '0040ab77fe2607c1fcd0a7069dd9faa5', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '2017-09-06 14:13:19', '0', '2017-09-06 14:16:44', '62', '0040ab77fe2607c1fcd0a7069dd9faa5', 1, 0, '', '2017-09-06 14:15:55', '2017-09-06 14:14:07', 0, '', 0, '', '', '', ''),
(64, 'rer                                              ', 'abc@gmail.com', 'rer-', '-6756756767', 'e80b5017098950fc58aad83c8c14978e', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '2017-09-08 10:47:59', '0', '1000-01-01 00:00:00', '0', 'e80b5017098950fc58aad83c8c14978e', 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', 0, '', '', '', ''),
(67, 'nav', 'mmf.naveen1095@gmail.com', 'nav', '9874563214', '123456', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '2017-09-13 10:26:51', '0', '1000-01-01 00:00:00', '0', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '', '2017-09-21 10:06:42', '2017-09-20 18:19:03', 0, '', 0, '', '', '', ''),
(69, 'abhilahsh', 'abhi1@gmail.com', 'abhilahsh', '8109112337', '12345', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '2017-09-13 14:51:07', '0', '1000-01-01 00:00:00', '0', '236558a7ec33e3223db4471024833013', 1, 1, '', '2017-09-19 16:38:34', '2017-09-19 16:37:35', 0, '', 0, '', '', '', ''),
(70, 'sheetal', 'sheetaltit08@gmail.com', 'sheetal', '689544454533', 'sheetal', '', 'indore', 'MP', 'India', 'indore', 452001, 'VGhpcyBjaGljIG9mZi1kdXR5IGVzc2VudGlhbCBpcyBhcyBjb29sIGFzIGFuIGV2ZXJ5ZGF5IGJhZyBjYW4gZ2V0LiBUaGUgdmVyc2F0aWxlIHR3byBzdHJhcHMgYW5kIHNwYWNpb3VzIGludGVyaW9ycyBhbG9uZyB3aXRoIHppcHBlciBjbG9zdXJlIChmb3Iga2VlcGluZyB0aGluZ3Mgc2VjdXJlKSBtYWtlIHRoaXMgYmFnIHBlcmZlY3QgZm9yIHRyYXZlbCBhbmQgZXZlcnlkYXkgdXNlLiBJdHMgYmVpZ2UgaHVlIHdpbGwgZ28gd2l0aCBhYnNvbHV0ZWx5IGV2ZXJ5dGhpbmcuIFRoZSBjcm9zc2JvZHkgb3B0aW9uIHdpbGwgYWxsb3cgeW91IHRvIHN0YXkgaGFuZHMtZnJlZSBmb3IgZXZlcnl0aGluZyBmcm9tIGdyb2Nlcnkgc2hvcHBpbmcsIGNhcnJ5aW5nIHlvdXIgdHJhdmVsIHRyb2xsZXkgdGhyb3VnaCB0aGUgYWlycG9ydCB0byBzdWJ3YXkgY29tbXV0ZS4gRGV0YWNoIHRoZSBzaG91bGRlciBzdHJhcCBhbmQgY2FycnkgaXQgYnkgdGhlIHRvcCBoYW5kbGUgb24gbGlnaHRlciBkYXlzLg==', 'ORNIZA', 'Beige Polki Stones Dangle and Drop Earrings Theme', 'Beige Polki Stones Dangle and Drop Earrings Theme: Reverse AD Polish: Golden Color: Beige', '', '646456456456', '-2017-09-15-15-22-18.jpg', 'PHA+PHN0cm9uZz4xMDAlIEJ1eWVyIFByb3RlY3Rpb24sIDcgRGF5cyBFYXN5IFJldHVybiBwb2xpY3k8L3N0cm9uZz48L3A+DQo=', 'PGRpdiBjbGFzcz0ibWFydDUiIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBjb2xvcjogcmdiKDc0LCA3NCwgNzQpOyBmb250LWZhbWlseTogUHJveGltYU5vdmEsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsiPjxzdHJvbmc+UGF5bWVudCBNb2Rlczo8L3N0cm9uZz48L2Rpdj4NCg0KPHA+Q2FzaCBvbiBEZWxpdmVyeTwvcD4NCg0KPHA+TmV0IEJhbmtpbmcsIERlYml0IGNhcmRzLyBDcmVkaXQgQ2FyZHMgKFZpc2EsIE1hc3RlckNhcmQsIEFtZXJpY2FuIEV4cHJlc3MsIERpbmVycyBDbHViIGNhcmRzIGFjY2VwdGVkKSBJbnRlcm5hdGlvbmFsIENyZWRpdCBDYXJkczwvcD4NCg0KPGRpdiBjbGFzcz0ibWFydDUiIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBjb2xvcjogcmdiKDc0LCA3NCwgNzQpOyBmb250LWZhbWlseTogUHJveGltYU5vdmEsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsiPjxzdHJvbmc+UGF5bWVudCBEZXRhaWxzOjwvc3Ryb25nPjwvZGl2Pg0KDQo8cD5Zb3Ugd2lsbCByZWNlaXZlIGFuIGVtYWlsIHdpdGggeW91ciBwYXltZW50IGRldGFpbHMgaW1tZWRpYXRlbHkgYWZ0ZXIgeW91IG1ha2UgYSBwdXJjaGFzZS4gSW4gY2FzZSBvZiBhbnkgaXNzdWVzIG91ciBjdXN0b21lciBjYXJlIHdvdWxkIGJlIGhhcHB5IHRvIGhlbHAgeW91PC9wPg0KDQo8ZGl2IGNsYXNzPSJtYXJ0NSIgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IGNvbG9yOiByZ2IoNzQsIDc0LCA3NCk7IGZvbnQtZmFtaWx5OiBQcm94aW1hTm92YSwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyI+PHN0cm9uZz5QYXltZW50IFNlY3VyaXR5Ojwvc3Ryb25nPjwvZGl2Pg0KDQo8cD5Zb3UgdHJhbnNwYXJlbnRseSBwYXkgdGhyb3VnaCBvdXIgUGF5bWVudCBHYXRld2F5IGFuZCBhbGwgdGhlIGRhdGEgaXMgdHJhbnNmZXJyZWQgdGhyb3VnaCBoaWdoIGxldmVsIGVuY3J5cHRpb24gdGVjaG5vbG9neS4gV2UgZ3VhcmFudGVlIHlvdSwgeW91ciBwYXltZW50cyBhcmUgMTAwJSBzZWN1cmVkIHdpdGggdXMgYW5kIHlvdXIgcGF5bWVudCBkZXRhaWxzIGFyZSBuZXZlciBzaGFyZWQgd2l0aCBhbnlvbmUgZHVyaW5nIHRoZSBwYXltZW50IHByb2Nlc3M8L3A+DQo=', 'PGRpdiBjbGFzcz0ibWFydDUiIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBjb2xvcjogcmdiKDc0LCA3NCwgNzQpOyBmb250LWZhbWlseTogUHJveGltYU5vdmEsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsiPjxzdHJvbmc+U2hpcHBpbmcgVGltZTwvc3Ryb25nPjwvZGl2Pg0KDQo8cD5XZSBkZWxpdmVyIGluIEluZGlhIHdpdGhpbiAxMCBkYXlzIGFuZCBvdXRzaWRlIG9mIEluZGlhIHdpdGhpbiAyMSBkYXlzLiBDdXJyZW50bHkgb3VyIGF2ZXJhZ2UgZGVsaXZlcnkgdGltZSBpbiBJbmRpYSBpcyBhcm91bmQgNCBkYXlzIGFuZCBvdXRzaWRlIG9mIEluZGlhIGlzIDE4IGRheXM8L3A+DQoNCjxkaXYgY2xhc3M9Im1hcnQ1IiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgY29sb3I6IHJnYig3NCwgNzQsIDc0KTsgZm9udC1mYW1pbHk6IFByb3hpbWFOb3ZhLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7Ij48c3Ryb25nPlNoaXBtZW50IFRyYWNraW5nOjwvc3Ryb25nPjwvZGl2Pg0KDQo8cD5Zb3Ugd2lsbCBnZXQgYW4gZW1haWwgYW5kIFNNUyB3aXRoIHRoZSB0cmFja2luZyBkZXRhaWxzIGFzIHNvb24gYXMgdGhlIHByb2R1Y3QgaXMgc2hpcHBlZC4gWW91IGNhbiBhbHNvIHJlcXVlc3QgdGhlIHNlbGxlciBmb3IgYSBmYXN0ZXIgc2hpcHBpbmcgYnkgY2xpY2tpbmcgdGhlICZsc3F1bztDb250YWN0IFNlbGxlciZyc3F1bzsgYnV0dG9uIG9uIHRoZSBwcm9kdWN0IHBhZ2UgYWZ0ZXIgeW91IHBsYWNlIHRoZSBvcmRlcjwvcD4NCg0KPGRpdiBjbGFzcz0ibWFydDUiIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBjb2xvcjogcmdiKDc0LCA3NCwgNzQpOyBmb250LWZhbWlseTogUHJveGltYU5vdmEsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsiPjxzdHJvbmc+U2hpcHBpbmcgTG9jYXRpb25zOjwvc3Ryb25nPjwvZGl2Pg0KDQo8cD5XZSBkZWxpdmVyIHRvIG92ZXIgMTAwIGNvdW50cmllcyBnbG9iYWxseSBpbmNsdWRpbmcgVVNBLCBVSywgQXVzdHJhbGlhIGFuZCBDYW5hZGE8L3A+DQoNCjxkaXYgY2xhc3M9Im1hcnQ1IiBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgY29sb3I6IHJnYig3NCwgNzQsIDc0KTsgZm9udC1mYW1pbHk6IFByb3hpbWFOb3ZhLCBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7Ij48c3Ryb25nPlJldHVybiBUaW1lOjwvc3Ryb25nPjwvZGl2Pg0KDQo8cD5XZSBoYXZlIGEgMTAwJSBCdXllciBwcm90ZWN0aW9uIHBvbGljeSB3aGVyZWluIHlvdSBjYW4gcmV0dXJuIHRoZSBwcm9kdWN0IGZvciBhbnkgcmVhc29uIHdoYXRzb2V2ZXIuIFlvdSBjYW4gc2hpcCBpdCBiYWNrIHRvIHVzIHdpdGhpbiAxNCBkYXlzIGFuZCBnZXQgYSBmdWxsIHJlZnVuZDwvcD4NCg0KPGRpdiBjbGFzcz0ibWFydDUiIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBjb2xvcjogcmdiKDc0LCA3NCwgNzQpOyBmb250LWZhbWlseTogUHJveGltYU5vdmEsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsiPjxzdHJvbmc+UmV0dXJuIFByb2Nlc3M6PC9zdHJvbmc+PC9kaXY+DQoNCjxwPkp1c3QgZW1haWwgdXMgeW91ciBjb21wbGFpbnQgd2l0aCBvcmRlciBudW1iZXIgd2l0aGluIDcgZGF5cyBvZiByZWNlaXB0IG9mIHRoZSBwcm9kdWN0LiBZb3UgY2FuIGFsc28gbG9naW4gdG8geW91ciBhY2NvdW50IGFuZCByYWlzZSBhIGRpc3B1dGUgZnJvbSB0aGVyZS4gT3VyIHRlYW0gd2lsbCByZXBseSB0byB5b3Ugd2l0aCBhbiBhcHByb3ZhbCBlbWFpbCBjb250YWluaW5nIHRoZSBpbnN0cnVjdGlvbnMgYW5kIHJldHVybiBzaGlwcGluZyBhZGRyZXNzIHRvIHdoaWNoIHlvdSBuZWVkIHRvIHNlbmQgYmFjayB0aGUgcHJvZHVjdCB3aXRoaW4gNyBkYXlzLjwvcD4NCg0KPGRpdiBjbGFzcz0ibWFydDUiIHN0eWxlPSJib3gtc2l6aW5nOiBib3JkZXItYm94OyBjb2xvcjogcmdiKDc0LCA3NCwgNzQpOyBmb250LWZhbWlseTogUHJveGltYU5vdmEsIHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsiPjxzdHJvbmc+UmVmdW5kOjwvc3Ryb25nPjwvZGl2Pg0KDQo8cD5JZiB5b3Ugd2lzaCwgd2UgY2FuIG9mZmVyIHlvdSBhIHJlZGVlbWFibGUgdm91Y2hlciB3b3J0aCB0aGUgcmVmdW5kIGFtb3VudCBmb3IgZnV0dXJlIHB1cmNoYXNlcy4gRWxzZSB3ZSBjYW4gYWxzbyByZWZ1bmQgdGhlIGVudGlyZSBhbW91bnQgYmFjayB0byB5b3VyIGJhbmsgYWNjb3VudCB3aXRob3V0IGFueSBkZWR1Y3Rpb25zIGFsb25nIHdpdGggUnMuIDEwMCBmb3IgcmV0dXJuIHNoaXBwaW5nLjwvcD4NCg==', '', '2017-09-15 12:32:41', '70', '2017-09-18 11:28:09', '1', '0040ab77fe2607c1fcd0a7069dd9faa5', 2, 1, 'sheetal-2017-09-18-11-28-09.jpg', '2017-09-21 16:57:24', '2017-09-21 14:10:57', 1, '', 0, 'https://www.facebook.com/help/community/question/?id=417531885036354', 'https://support.twitter.com/articles/109623', 'https://support.google.com/plus/answer/2676340?hl=en', 'https://support.wix.com/en/article/finding-your-pinterest-pin-url'),
(71, 'sneha', 'sneha@gmail.com', 'sneha', '9876543210', '123456', '', 'indore', 'madhya pradesh', 'india', 'mmf', 452011, '', '', '', '', '', '', '', '', '', '', '', '2017-09-16 17:08:01', '0', '1000-01-01 00:00:00', '0', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '', '2017-09-16 17:46:33', '2017-09-16 17:09:42', 1, '', 0, '', '', '', ''),
(72, 'sneha', 'sneha17@gmail.com', 'sneha', '9874563210', '123456', '', 'indore', 'madhya pradesh', 'india', 'mmf', 452001, '', '', '', '', '', '', '', '', '', '', '', '2017-09-18 11:51:09', '0', '1000-01-01 00:00:00', '0', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '', '2017-09-18 11:52:52', '0000-00-00 00:00:00', 1, '', 0, '', '', '', ''),
(74, 'nidhi', 'nidhi@gmail.com', 'nidhi', '4536363466', 'sheetal', '', 'indore', 'mp', 'india', 'indore', -452001, '', '', '', '', '', '', '', '', '', '', '', '2017-09-18 12:12:33', '0', '2017-09-19 11:04:28', '1', '0040ab77fe2607c1fcd0a7069dd9faa5', 2, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', 0, '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=366 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `session_id`, `added_on`, `ip_address`) VALUES
(1, 5, 9, '', '2017-08-18 18:49:52', '183.182.86.246'),
(7, 4, 8, '', '2017-08-23 18:58:52', '183.182.86.246'),
(13, 5, 22, '', '2017-08-29 19:21:48', '183.182.86.246'),
(19, 18, 22, '', '2017-09-02 17:19:31', '183.182.86.244'),
(20, 24, 7, '', '2017-09-04 11:06:39', '183.182.86.244'),
(39, 29, 7, '', '2017-09-05 15:40:34', '183.182.86.244'),
(50, 0, 19, '', '2017-09-07 17:51:14', '183.182.86.244'),
(65, 14, 5, '', '2017-09-11 18:38:28', '183.182.86.243'),
(209, 69, 54, '', '2017-09-14 15:51:14', '183.182.86.243'),
(218, 69, 64, '', '2017-09-14 16:17:35', '183.182.86.243'),
(220, 69, 57, '', '2017-09-14 16:17:39', '183.182.86.243'),
(364, 61, 54, '', '2017-09-21 16:54:24', '183.182.86.244');

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
