-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 04, 2020 at 03:51 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecombazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(100) NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `c_help_number` varchar(100) NOT NULL,
  `login_type` varchar(100) DEFAULT NULL,
  `status` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_user`, `mobile`, `password`, `c_help_number`, `login_type`, `status`) VALUES
(1, 'admin', NULL, '$2y$10$5giB6ZXDk2T4nhtQ3I9HieP88n6QVSrUe6tHXRt/Cf5raa021gqeW', '1234567890', 'admin', 1),
(7, 'newStaff', '9700811680', '$2y$10$RLdsyr5uC91YHLFRAJD74.dBb9q7Gmzpq6bj8n22nxJt8Q1aadvIq', '', 'staff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ad_banner`
--

DROP TABLE IF EXISTS `ad_banner`;
CREATE TABLE IF NOT EXISTS `ad_banner` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `cat_id` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_banner`
--

INSERT INTO `ad_banner` (`id`, `title`, `images`, `cat_id`, `status`) VALUES
(1, 'Important Notice2', '6276164.jpg', '8', 'Show'),
(3, 'Important Notice2', '1936653.png', NULL, 'Show'),
(4, 'Important Notice2', '9601901.jpg', '5', 'Show'),
(5, 'Important Notice3', '5882030.jpg', '9', 'Show'),
(6, 'Important Notice4', '9957641.jpg', '3', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand`, `image`) VALUES
(2, 'Unilever', '9163738.jpg'),
(4, 'Rice Brands', '3363997.jpg'),
(5, 'newsss', '9401261.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(100) NOT NULL,
  `variation_name` varchar(52) DEFAULT NULL,
  `user_id` varchar(100) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `price` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `variation_name`, `user_id`, `cat_id`, `qty`, `price`, `date`, `status`) VALUES
(1, '1', '2-10 KG', '2', '3', '1', '400.00', '2020-08-23', '1'),
(2, '2', NULL, '2', '3', '10', '3000.00', '2020-09-12', '1'),
(8, '3', '2-10 KG', '7', '3', '1', '350.00', '2020-10-29', '0'),
(7, '6', '21-5 Piece', '7', '7', '2', '40.00', '2020-10-29', '0'),
(9, '6', '21-5 Piece', '7', '7', '2', '40.00', '2020-10-29', '0'),
(10, '3', '2-10 KG', '7', '3', '1', '350.00', '2020-10-29', '0'),
(11, '6', '21-5 Piece', '7', '7', '2', '40.00', '2020-10-29', '0'),
(12, '3', '2-10 KG', '7', '3', '1', '350.00', '2020-10-29', '0'),
(13, '1', '1-5 KG', '33', '3', '1', '350.00', '2020-10-31', '0'),
(14, '3', '', '33', '2', '1', '120.00', '2020-10-31', '0'),
(15, '10', '', '33', '1', '1', '120.00', '2020-10-31', '0'),
(16, '1', '1-5 KG', '33', '3', '1', '350.00', '2020-10-31', '0'),
(17, '3', '', '33', '2', '1', '120.00', '2020-10-31', '0'),
(18, '10', '', '33', '1', '1', '120.00', '2020-10-31', '0'),
(19, '1', '1-5 KG', '33', '3', '1', '350.00', '2020-10-31', '0'),
(20, '3', '', '33', '2', '1', '120.00', '2020-10-31', '0'),
(21, '10', '', '33', '1', '1', '120.00', '2020-10-31', '0'),
(22, '16', '', '13', '1', '1', '700.00', '2020-10-31', '0'),
(23, '15', '25-500', '13', '4', '1', '100.00', '2020-10-31', '0'),
(24, '13', '23-2 Ltr', '13', '4', '1', '260.00', '2020-10-31', '0'),
(25, '15', '25-500', '35', '4', '1', '100.00', '2020-10-31', '0'),
(26, '16', '', '35', '1', '1', '700.00', '2020-10-31', '0'),
(27, '14', '24-200', '35', '6', '1', '1200.00', '2020-10-31', '0'),
(28, '13', '23-2 Ltr', '35', '4', '1', '260.00', '2020-10-31', '0'),
(29, '12', '', '35', '7', '1', '200.00', '2020-10-31', '0'),
(30, '15', '25-500', '35', '4', '1', '100.00', '2020-10-31', '0'),
(31, '16', '', '35', '1', '1', '700.00', '2020-10-31', '0'),
(32, '14', '24-200', '35', '6', '1', '1200.00', '2020-10-31', '0'),
(33, '13', '23-2 Ltr', '35', '4', '1', '260.00', '2020-10-31', '0'),
(34, '12', '', '35', '7', '1', '200.00', '2020-10-31', '0'),
(35, '16', '', '43', '1', '1', '700.00', '2020-10-31', '0'),
(36, '16', '', '43', '1', '1', '700.00', '2020-10-31', '0'),
(37, '8', '15-500', '43', '7', '1', '100.00', '2020-10-31', '0'),
(38, '3', '', '43', '2', '1', '120.00', '2020-10-31', '0'),
(39, '14', '24-200', '35', '6', '1', '1200.00', '2020-10-31', '0'),
(40, '13', '23-2 Ltr', '35', '4', '1', '260.00', '2020-10-31', '0'),
(41, '12', '', '35', '7', '1', '200.00', '2020-10-31', '0'),
(42, '16', '', '43', '1', '1', '700.00', '2020-10-31', '0'),
(43, '14', '24-200', '35', '6', '1', '1200.00', '2020-10-31', '0'),
(44, '13', '23-2 Ltr', '35', '4', '1', '260.00', '2020-10-31', '0'),
(45, '14', '24-200', '35', '6', '1', '1200.00', '2020-10-31', '0'),
(46, '13', '23-2 Ltr', '35', '4', '1', '260.00', '2020-10-31', '0'),
(47, '15', '25-500', '13', '4', '1', '100.00', '2020-10-31', '0'),
(48, '13', '23-2 Ltr', '13', '4', '1', '260.00', '2020-10-31', '0'),
(49, '16', '', '13', '1', '2', '700.00', '2020-10-31', '0'),
(50, '13', '23-2 Ltr', '13', '4', '1', '260.00', '2020-10-31', '0'),
(51, '15', '25-500', '13', '4', '1', '100.00', '2020-10-31', '0'),
(52, '16', '', '13', '1', '1', '700.00', '2020-10-31', '0'),
(53, '1', '1-5 KG', '13', '3', '2', '350.00', '2020-11-01', '0'),
(54, '16', '', '13', '1', '1', '700.00', '2020-11-01', '0'),
(55, '14', '24-200', '13', '6', '1', '1200.00', '2020-11-01', '0'),
(56, '15', 'undefined-undefined', '13', '4', '1', '405', '2020-11-01', '0'),
(57, '16', '', '33', '1', '1', '700.00', '2020-11-01', '0'),
(58, '15', '25-500', '33', '4', '1', '100.00', '2020-11-01', '0'),
(59, '11', 'undefined-undefined', '9', '6', '1', '40.00', '2020-11-03', '0'),
(60, '11', 'undefined-undefined', '9', '6', '1', '40.00', '2020-11-03', '0'),
(61, '11', 'undefined-undefined', '9', '6', '1', '40.00', '2020-11-03', '0'),
(62, '11', 'undefined-undefined', '9', '6', '1', '40.00', '2020-11-03', '0'),
(63, '11', 'undefined-undefined', '9', '6', '1', '40.00', '2020-11-03', '0'),
(64, '11', 'undefined-undefined', '9', '6', '1', '40.00', '2020-11-03', '0'),
(65, '11', 'undefined-undefined', '9', '6', '1', '40.00', '2020-11-03', '0'),
(66, '11', 'undefined-undefined', '9', '6', '1', '40.00', '2020-11-03', '0'),
(67, '11', 'undefined-undefined', '9', '6', '1', '40.00', '2020-11-03', '0'),
(68, '16', '', '9', '1', '1', '700.00', '2020-11-03', '0'),
(69, '9', '', '9', '1', '1', '120.00', '2020-11-03', '0'),
(70, '16', '', '9', '1', '1', '700.00', '2020-11-03', '0'),
(71, '9', '', '9', '1', '1', '120.00', '2020-11-03', '0'),
(72, '16', '', '9', '1', '1', '700.00', '2020-11-03', '0'),
(73, '9', '', '9', '1', '1', '120.00', '2020-11-03', '0'),
(74, '16', '', '9', '1', '1', '700.00', '2020-11-03', '0'),
(75, '9', '', '9', '1', '1', '120.00', '2020-11-03', '0'),
(76, '7', '', '9', '7', '1', '200.00', '2020-11-03', '0'),
(77, '5', '', '9', '7', '1', '40.00', '2020-11-03', '0'),
(78, '8', '', '9', '7', '1', '200.00', '2020-11-03', '0'),
(79, '5', '', '9', '7', '1', '40.00', '2020-11-03', '0'),
(80, '5', '', '9', '7', '1', '40.00', '2020-11-03', '0'),
(81, '15', '25-500', '35', '4', '1', '100.00', '2020-11-03', '0'),
(82, '16', '', '35', '1', '1', '700.00', '2020-11-03', '0'),
(83, '2', '', '46', '4', '2', '50', '2020-11-03', '0'),
(84, '16', '', '43', '1', '1', '700.00', '2020-11-03', '0'),
(85, '16', '', '13', '1', '1', '700', '2020-11-03', '0'),
(86, '16', '', '43', '1', '1', '700.00', '2020-11-05', '0'),
(87, '7', '', '9', '7', '1', '200.00', '2020-11-05', '0'),
(88, '5', '', '9', '7', '1', '40.00', '2020-11-05', '0'),
(89, '8', '', '9', '7', '1', '200.00', '2020-11-05', '0'),
(90, '5', '', '9', '7', '1', '40.00', '2020-11-05', '0'),
(91, '5', '', '9', '7', '1', '40.00', '2020-11-05', '0'),
(92, '16', '', '13', '1', '1', '700', '2020-11-07', '0'),
(93, '16', '', '13', '1', '1', '700', '2020-11-08', '0'),
(94, '16', '', '13', '1', '1', '700', '2020-11-08', '0'),
(95, '20', '', '35', '6', '1', '200', '2020-11-08', '0'),
(96, '20', '', '35', '6', '1', '200', '2020-11-08', '0'),
(97, '16', '', '43', '1', '1', '0.00', '2020-11-08', '0'),
(98, '16', '', '43', '1', '1', '0.00', '2020-11-08', '0'),
(99, '16', '', '43', '1', '1', '0.00', '2020-11-08', '0'),
(100, '16', '', '43', '1', '1', '0.00', '2020-11-08', '0'),
(101, '16', '', '43', '1', '1', '0.00', '2020-11-08', '0'),
(102, '16', '', '43', '1', '1', '0.00', '2020-11-08', '0'),
(103, '16', '', '43', '1', '1', '0.00', '2020-11-08', '0'),
(104, '20', '', '35', '6', '1', '200', '2020-11-08', '0'),
(105, '16', '', '43', '1', '1', '0.00', '2020-11-08', '0'),
(106, '20', '', '35', '6', '1', '200', '2020-11-08', '0'),
(107, '16', '', '43', '1', '1', '0.00', '2020-11-09', '0'),
(108, '35', '', '43', '7', '1', '800.00', '2020-11-09', '0'),
(109, '8', 'undefined-undefined', '35', '6', '1', '100', '2020-11-10', '0'),
(110, '8', 'undefined-undefined', '35', '6', '1', '100', '2020-11-10', '0'),
(111, '6', '21-5 Piece', '9', '7', '1', '20.00', '2020-11-10', '0'),
(112, '96', '', '9', '5', '1', '50', '2020-11-10', '0'),
(113, '95', '', '13', '5', '1', '50.00', '2020-11-10', '0'),
(114, '8', '15-500', '33', '7', '1', '75.00', '2020-11-10', '0'),
(115, '6', '21-5 Piece', '33', '7', '1', '20.00', '2020-11-10', '0'),
(116, '96', '', '35', '5', '1', '50.00', '2020-11-11', '0'),
(117, '15', 'undefined-undefined', '47', '16', '1', '100', '2020-11-13', '0'),
(118, '96', '', '35', '5', '1', '50.00', '2020-11-13', '0'),
(119, '96', '', '43', '5', '1', '50.00', '2020-11-13', '0'),
(120, '96', '', '35', '5', '1', '50.00', '2020-11-14', '0'),
(121, '100', 'undefined-undefined', '35', '16', '1', '670', '2020-11-14', '0'),
(122, '97', 'undefined-undefined', '35', '16', '1', '280', '2020-11-14', '0'),
(123, '99', 'undefined-undefined', '35', '16', '1', '120', '2020-11-14', '0'),
(124, '1', '8-15 KG', '13', '3', '1', '750.00', '2020-11-16', '0'),
(125, '15', '25-500', '13', '4', '3', '0.00', '2020-11-16', '0'),
(126, '2', '', '13', '4', '4', '45.00', '2020-11-16', '0'),
(127, '8', 'undefined-undefined', '13', '6', '1', '100', '2020-11-16', '0'),
(128, '6', 'undefined-undefined', '13', '5', '1', '35', '2020-11-16', '0'),
(129, '1', '8-15 KG', '13', '3', '1', '750.00', '2020-11-16', '0'),
(130, '15', '25-500', '13', '4', '3', '0.00', '2020-11-16', '0'),
(131, '2', '', '13', '4', '4', '45.00', '2020-11-16', '0'),
(132, '8', 'undefined-undefined', '13', '6', '1', '100', '2020-11-16', '0'),
(133, '6', 'undefined-undefined', '13', '5', '1', '35', '2020-11-16', '0'),
(134, '1', '8-15 KG', '13', '3', '1', '750.00', '2020-11-16', '0'),
(135, '15', '25-500', '13', '4', '3', '0.00', '2020-11-16', '0'),
(136, '2', '', '13', '4', '4', '45.00', '2020-11-16', '0'),
(137, '8', 'undefined-undefined', '13', '6', '1', '100', '2020-11-16', '0'),
(138, '6', 'undefined-undefined', '13', '5', '1', '35', '2020-11-16', '0'),
(139, '1', '8-15 KG', '13', '3', '1', '750.00', '2020-11-16', '0'),
(140, '15', '25-500', '13', '4', '3', '0.00', '2020-11-16', '0'),
(141, '2', '', '13', '4', '4', '45.00', '2020-11-16', '0'),
(142, '8', 'undefined-undefined', '13', '6', '1', '100', '2020-11-16', '0'),
(143, '6', 'undefined-undefined', '13', '5', '1', '35', '2020-11-16', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `cat_img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_img`) VALUES
(1, 'Spices', '2817407.png'),
(2, 'Oil', '3979734.jpg'),
(3, 'Grain', '8392336.jpg'),
(4, 'Beverages', '3341960.png'),
(5, 'Bakery', '6281876.png'),
(6, 'canned Goods', ''),
(7, 'Dairy', ''),
(8, 'Frozen Foods', ''),
(9, 'Cleaners', ''),
(10, 'Meat', ''),
(12, 'New Category', ''),
(13, 'NEW CAT', ''),
(16, 'neewCat', '9541529.jpg'),
(17, 'neewCatxx', '7461746.png'),
(18, 'neewCatssddee', '1685666.png');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `coupon_id` int(10) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_code`, `discount`) VALUES
(1, 'ABCDEF', '10%');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_used`
--

DROP TABLE IF EXISTS `coupon_used`;
CREATE TABLE IF NOT EXISTS `coupon_used` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

DROP TABLE IF EXISTS `delivery_boys`;
CREATE TABLE IF NOT EXISTS `delivery_boys` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `delvr_name` varchar(100) DEFAULT NULL,
  `delvr_email` varchar(100) DEFAULT NULL,
  `delvr_phone` varchar(100) DEFAULT NULL,
  `delvr_username` varchar(100) DEFAULT NULL,
  `delvr_password` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `join_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_boys`
--

INSERT INTO `delivery_boys` (`id`, `delvr_name`, `delvr_email`, `delvr_phone`, `delvr_username`, `delvr_password`, `profile_pic`, `join_date`) VALUES
(3, 'Sanjay Natta', 'wmsn.web@gmail.com', '07063245845', NULL, '$2y$10$/PgiDWRMlxc3//4NWp7nB.aHDpDmpEuJ5G3wchsdTqPgiwJtZ4M0u', '5fc010db1b144.jpg', '2020-11-27'),
(5, 'Sanjay Natta2', 'wmsn.web@gmail.com2', '070632458452', NULL, '$2y$10$/PgiDWRMlxc3//4NWp7nB.aHDpDmpEuJ5G3wchsdTqPgiwJtZ4M0u', '5fc010db1b144.jpg', '2020-11-27'),
(6, 'Sanjay Natta3', 'wmsn.web@gmail.com3', '070632458453', NULL, '$2y$10$/PgiDWRMlxc3//4NWp7nB.aHDpDmpEuJ5G3wchsdTqPgiwJtZ4M0u', '5fc010db1b144.jpg', '2020-11-27'),
(7, 'Sanjay Natta4', 'wmsn.web@gmail.com4', '070632458454', NULL, '$2y$10$/PgiDWRMlxc3//4NWp7nB.aHDpDmpEuJ5G3wchsdTqPgiwJtZ4M0u', '5fc010db1b144.jpg', '2020-11-27'),
(8, 'Sanjay Natta5', 'wmsn.web@gmail.com5', '070632458455', NULL, '$2y$10$/PgiDWRMlxc3//4NWp7nB.aHDpDmpEuJ5G3wchsdTqPgiwJtZ4M0u', '5fc010db1b144.jpg', '2020-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `slug`) VALUES
(3, 'sklfh ksnndkfn ksk?', 'Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available.', 'sklfh_ksnndkfn_ksk?'),
(4, 'How long is the course? ', 'sdfknj .sn,jnsmdjbnf mjsbdmbfhmhsvbdhbvf mshvd svdnbf mhsbndbfhnsbnhbd bshbd fmhbsmndbf hbshndb sbdf bsd fbsbd jfb sjj', 'how_long_is_the_course?_');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
CREATE TABLE IF NOT EXISTS `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'CODEX@123', 0, 0, 0, NULL, '2020-07-26 13:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text DEFAULT NULL,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mem_plan`
--

DROP TABLE IF EXISTS `mem_plan`;
CREATE TABLE IF NOT EXISTS `mem_plan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `descr` text DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `full_descr` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mem_plan`
--

INSERT INTO `mem_plan` (`id`, `title`, `descr`, `price`, `duration`, `full_descr`) VALUES
(5, 'Important Notice', 'hello, new,notice', '500', '1years', 'skd ksndk ks kn kksndk nksdnhk ksh kshdk kshdh khnskdhiwehknskjnihwih fkhsdi sheo');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `offer_id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_title` varchar(255) NOT NULL,
  `offer_desc` varchar(255) NOT NULL,
  `offer_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>Inactive,1=>Active',
  `offer_category` int(11) NOT NULL,
  `offer_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `offer_title`, `offer_desc`, `offer_status`, `offer_category`, `offer_image`) VALUES
(6, 'FRESH FROZEN FOODS', '40% OFF', '1', 8, '6414334.jpg'),
(5, 'FRESH MEAT', '20% OFF', '1', 10, '1650568.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders_transaction`
--

DROP TABLE IF EXISTS `orders_transaction`;
CREATE TABLE IF NOT EXISTS `orders_transaction` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) DEFAULT NULL COMMENT 'Auto Generated string',
  `cart_id` varchar(100) DEFAULT NULL COMMENT 'Get Product Related details and Qty Price from cart',
  `user_id` varchar(100) DEFAULT NULL COMMENT 'get User details',
  `shipping_address_id` varchar(100) DEFAULT NULL COMMENT 'Get shipping address details for shipping',
  `prices` varchar(100) DEFAULT NULL COMMENT 'SUM of total price of cart',
  `extra_charge` varchar(100) DEFAULT NULL COMMENT 'If need Extra Charges',
  `coupon_discount` varchar(100) DEFAULT NULL COMMENT 'Calculation the amount from coupon discount percentage ',
  `tax` varchar(100) DEFAULT NULL COMMENT 'If need to pay tax',
  `gross_total` varchar(100) DEFAULT NULL COMMENT 'After Calculation of all Amounts (price+extra Charge)-discount+tax',
  `pay_method` varchar(100) DEFAULT NULL COMMENT 'Online Pay or Pay on delivery',
  `txnid` varchar(100) DEFAULT NULL COMMENT 'transaction ID from payment gateway',
  `payment_status` varchar(100) DEFAULT NULL COMMENT 'Payment status from payment Gateway',
  `extra_note` text DEFAULT NULL COMMENT 'If extra Notes for transactions',
  `payment_date` date NOT NULL COMMENT 'Date of payment',
  `date` date NOT NULL COMMENT 'date of order',
  `status` varchar(100) NOT NULL COMMENT 'status= processing, Dispatch, delivered, Cancel',
  `cancel_by` varchar(100) DEFAULT NULL,
  `wallet_price` decimal(5,2) NOT NULL DEFAULT 0.00 COMMENT 'if pay from wallet',
  `slot_details` varchar(100) DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `used_refferal_code` varchar(100) DEFAULT NULL,
  `slot_id` int(5) NOT NULL DEFAULT 0,
  `asigned_delivery_boy` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_transaction`
--

INSERT INTO `orders_transaction` (`id`, `order_id`, `cart_id`, `user_id`, `shipping_address_id`, `prices`, `extra_charge`, `coupon_discount`, `tax`, `gross_total`, `pay_method`, `txnid`, `payment_status`, `extra_note`, `payment_date`, `date`, `status`, `cancel_by`, `wallet_price`, `slot_details`, `order_date`, `used_refferal_code`, `slot_id`, `asigned_delivery_boy`) VALUES
(1, 'BUY-1605252773', '117', '47', '20', '100', NULL, NULL, NULL, '100', 'Razor', NULL, 'Pending', '', '0000-00-00', '2020-11-13', 'Cancel', 'admin', '0.00', NULL, '0000-00-00 00:00:00', NULL, 0, NULL),
(2, 'BUY-1605270996', '118', '35', '13', '50', NULL, NULL, NULL, '50', 'Razor', NULL, 'Pending', '', '0000-00-00', '2020-11-13', 'Pending', NULL, '0.00', NULL, '0000-00-00 00:00:00', NULL, 0, NULL),
(3, 'BUY-1605274581', '119', '43', '15', '50', NULL, NULL, NULL, '50', 'Razor', NULL, 'Pending', '', '0000-00-00', '2020-11-13', 'Pending', NULL, '0.00', NULL, '0000-00-00 00:00:00', NULL, 0, NULL),
(4, 'BUY-1605339769', '120,121,122,123', '35', '13', '1120', NULL, NULL, NULL, '1120', 'Razor', NULL, 'Pending', '', '0000-00-00', '2020-11-14', 'Processing', NULL, '0.00', NULL, '0000-00-00 00:00:00', NULL, 0, NULL),
(5, 'BUY-1605531129', '124,125,126,127,128', '13', '18', '930', NULL, NULL, NULL, '930', 'Razor', NULL, 'Pending', '', '0000-00-00', '2020-11-16', 'Processing', NULL, '0.00', NULL, '0000-00-00 00:00:00', NULL, 0, 5),
(6, 'BUY-1605531233', '129,130,131,132,133', '13', '18', '930', NULL, NULL, NULL, '930', 'Razor', NULL, 'Pending', '', '0000-00-00', '2020-11-16', 'Processing', NULL, '0.00', NULL, '0000-00-00 00:00:00', NULL, 0, 8),
(7, 'BUY-1605531512', '134,135,136,137,138', '13', '18', '930', NULL, '6.20', '15.55', '930', 'Razor', NULL, 'Pending', '', '0000-00-00', '2020-11-16', 'Processing', NULL, '0.00', NULL, '0000-00-00 00:00:00', NULL, 0, NULL),
(8, 'BUY-1605531515', '139,140,141,142,143', '13', '18', '930', NULL, NULL, NULL, '930', 'Razor', NULL, 'Pending', '', '0000-00-00', '2020-11-16', 'Cancel', 'admin', '0.00', NULL, '0000-00-00 00:00:00', NULL, 0, NULL),
(49, 'BUY-16055315152', '139,140,141,142,143', '13', '18', '930', NULL, NULL, NULL, '930', 'Razor', NULL, 'Pending', '', '0000-00-00', '2020-11-16', 'Despatched', 'admin', '0.00', NULL, '0000-00-00 00:00:00', NULL, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `order_return`
--

DROP TABLE IF EXISTS `order_return`;
CREATE TABLE IF NOT EXISTS `order_return` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `product_id` int(10) NOT NULL,
  `variation_name` varchar(50) DEFAULT NULL,
  `qty` int(2) NOT NULL,
  `notes` text NOT NULL,
  `request_date` date NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `return_inv` varchar(10) NOT NULL,
  `return_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `asigned_del_boy` varchar(100) DEFAULT NULL,
  `pickup_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_return`
--

INSERT INTO `order_return` (`id`, `user_id`, `photo`, `cart_id`, `amount`, `product_id`, `variation_name`, `qty`, `notes`, `request_date`, `order_id`, `return_inv`, `return_date`, `status`, `asigned_del_boy`, `pickup_date`) VALUES
(1, 33, '5fbaa18e78b35.png', 177, '670.00', 100, '37-3kg', 2, 'Tesr', '0000-00-00', 'BUY-1605983820', 'RETURN-160', '0000-00-00', 1, NULL, NULL),
(3, 47, '5fbfcf0618b7d.png', 117, '100.00', 15, 'undefined-undefined', 1, 'I am not happy with quality of this product', '2020-11-26', 'BUY-1605252773', 'RETURN-160', '0000-00-00', 1, '3', '2020-12-08 12:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
CREATE TABLE IF NOT EXISTS `order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `order_invoice` varchar(30) NOT NULL,
  `status_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status_type` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_id`, `user_id`, `status`, `order_invoice`, `status_date`, `status_type`) VALUES
(1, '49', '13', 'Pending', 'BUY-1606835287', '2020-12-01 15:08:08', 1),
(2, '49', '13', 'Processing', 'BUY-1606835287', '2020-12-01 23:04:11', 1),
(3, '49', '13', 'Packed', 'BUY-1606835287', '2020-12-03 22:23:17', 1),
(4, '49', '13', 'Despatched', 'BUY-1606835287', '2020-12-03 22:23:37', 1),
(5, '49', '13', 'Delivered', 'BUY-1606835287', '2020-12-01 15:08:08', 0),
(6, '50', '9', 'Pending', 'BUY-1606836401', '2020-12-01 15:27:03', 1),
(7, '50', '9', 'Processing', 'BUY-1606836401', '2020-12-01 15:27:03', 0),
(8, '50', '9', 'Packed', 'BUY-1606836401', '2020-12-01 15:27:03', 0),
(9, '50', '9', 'Despatched', 'BUY-1606836401', '2020-12-01 15:27:03', 0),
(10, '50', '9', 'Delivered', 'BUY-1606836401', '2020-12-01 15:27:03', 0),
(11, '49', '13', 'Packed', '', '2020-12-03 22:23:17', 1),
(12, '51', '13', 'Pending', 'BUY-1606842655', '2020-12-01 17:10:55', 1),
(13, '51', '13', 'Processing', 'BUY-1606842655', '2020-12-01 17:10:55', 0),
(14, '51', '13', 'Packed', 'BUY-1606842655', '2020-12-01 17:10:55', 0),
(15, '51', '13', 'Despatched', 'BUY-1606842655', '2020-12-01 17:10:55', 0),
(16, '51', '13', 'Delivered', 'BUY-1606842655', '2020-12-01 17:10:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_timing`
--

DROP TABLE IF EXISTS `order_timing`;
CREATE TABLE IF NOT EXISTS `order_timing` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `start_time` time NOT NULL,
  `finish_time` time NOT NULL,
  `working_hour` varchar(100) NOT NULL,
  `time_slot` varchar(100) NOT NULL,
  `each_slot` varchar(100) NOT NULL,
  `take_ord` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_timing`
--

INSERT INTO `order_timing` (`id`, `start_time`, `finish_time`, `working_hour`, `time_slot`, `each_slot`, `take_ord`) VALUES
(1, '06:00:00', '18:00:00', '12.00', '3', '4', '10');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

DROP TABLE IF EXISTS `privacy_policy`;
CREATE TABLE IF NOT EXISTS `privacy_policy` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `heading` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `heading`, `description`) VALUES
(13, 'Privacy Policy', 'This privacy policy (\"policy\") will help you understand how [name] (\"us\", \"we\", \"our\") uses and protects the data you provide to us when you visit and use [website] (\"website\", \"service\").\n\nWe reserve the right to change this policy at any given time, of which you will be promptly updated. If you want to make sure that you are up to date with the latest changes, we advise you to frequently visit this page.\n\nWhat User Data We Collect When you visit the website, we may collect the following data:\n\nYour IP address.\nYour contact information and email address.\nOther information such as interests and preferences.\nData profile regarding your online behavior on our website.\nWhy We Collect Your Data\nWe are collecting your data for several reasons:\n\nTo better understand your needs.\nTo improve our services and products.\nTo send you promotional emails containing the information we think you will find interesting.\nTo contact you to fill out surveys and participate in other types of market research.\nSafeguarding and Securing the Data\nBuymenow is committed to securing your data and keeping it confidential. [name] has done all in its power to prevent data theft, unauthorized access, and disclosure by implementing the latest technologies and software, which help us safeguard all the information we collect online.'),
(14, 'Our Cookie Policy', 'Once you agree to allow our website to use cookies, you also agree to use the data it collects regarding your online behavior (analyze web traffic, web pages you spend the most time on, and websites you visit).\r\n\r\nThe data we collect by using cookies is used to customize our website to your needs. After we use the data for statistical analysis, the data is completely removed from our systems.\r\n\r\nPlease note that cookies don\'t allow us to gain control of your computer in any way. They are strictly used to monitor which pages you find useful and which you do not so that we can provide a better experience for you.\r\n\r\nIf you want to disable cookies, you can do it by accessing the settings of your internet browser. (Provide links for cookie settings for major internet browsers).');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `pro_id` varchar(100) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `pro_type` varchar(100) NOT NULL,
  `brand_id` int(50) NOT NULL,
  `cat_id` varchar(100) DEFAULT NULL,
  `cat_name` varchar(100) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `units` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `offer` varchar(100) DEFAULT NULL,
  `descr` text DEFAULT NULL,
  `main_img` varchar(100) DEFAULT NULL,
  `active` int(10) NOT NULL,
  `added` int(1) NOT NULL DEFAULT 0,
  `isfvt` int(1) NOT NULL DEFAULT 0,
  `sale_price` varchar(100) NOT NULL DEFAULT '0',
  `returnable` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_id`, `product_name`, `pro_type`, `brand_id`, `cat_id`, `cat_name`, `qty`, `units`, `price`, `offer`, `descr`, `main_img`, `active`, `added`, `isfvt`, `sale_price`, `returnable`) VALUES
(1, '47753753', 'Oxi action powder', 'various', 2, '3', 'Fish', 'Out Of Stock', '20-Kg', '300.00', '25', 'Description Here', '4591011.jpg', 0, 0, 0, '225.00', 'no'),
(2, '22598087', 'Lipton Teas', 'single', 2, '4', 'Eggs', 'Out Of Stock', '1  Pkt', '50.00', '10', 'Description Here', '4120204.png', 1, 0, 0, '45.00', 'no'),
(3, '11283425', 'Mustered Oil ', 'single', 2, '2', 'mutton', 'In Stock', '1-Ltr', '120.00', '0', 'Description Here', '2829990.png', 0, 0, 0, '120.00', 'no'),
(4, '7901503', 'Nescafe Classic Coffeess', 'single', 2, '4', 'Egg', 'Out Of Stock', '100-gm', '200.00', '0', 'sasdasda', '7776241.jpg', 0, 0, 0, '200.00', 'no'),
(5, '46843068', 'Litchi', 'single', 5, '7', 'Exotic fruits', 'Out Of Stock', '1-Pcs', '40.00', '0', 'Litchi', '1644402.png', 0, 0, 0, '40.00', 'no'),
(6, '16883336', 'lemon', 'various', 2, '5', 'Bakery', 'Out Of Stock', '1 Pcs', '5.00', '0', 'lemon ', '4602764.jpg', 1, 0, 0, '5.00', 'no'),
(7, '51136290', 'apple', 'single', 5, '7', 'Fruits & vegetables', '1', 'kg-Kg', '200.00', NULL, 'apple', '5747945.jpg', 0, 0, 0, '0.00', 'no'),
(8, '36998438', 'APPLE', 'various', 6, '6', 'Fresh fruits', 'Out Of Stock', '1 Kg', '200.00', '25', 'best quality apple', '4510626.png', 1, 0, 0, '150.00', 'no'),
(9, '5892583', 'jsdhbj', 'single', 2, '1', 'chicken & Mutton', '10', '1-Pkt', '120.00', NULL, 'sadasda', '6961102.jpg', 0, 0, 0, '0.00', 'no'),
(12, '40216499', 'guava', 'single', 6, '6', 'Fresh fruits', 'In Stock', '500 gm', '200.00', '0', 'guava', '1664796.jpg', 1, 0, 0, '200.00', 'no'),
(10, '2610279', 'India Gate', 'single', 8, '9', 'Rice & Flour', 'Out Of Stock', '1-Pkt', '120.00', '0', 'asdasda', '8813848.jpg', 0, 0, 0, '120.00', 'no'),
(11, '52286522', 'Ezee', 'various', 2, '6', 'Fresh fruits', 'Out Of Stock', '250-gm', '40.00', '0', 'theek nahin hai ', '4933791.jpg', 0, 0, 0, '40.00', 'no'),
(13, '28488270', 'newTestProduct', 'various', 2, '4', 'cleaning & Households ', '100', '1-Ltr', '130.00', NULL, 'fsdfsdfsdfsfsdfsdf', '2268031.png', 0, 0, 0, '0.00', 'no'),
(14, '23860089', 'Nescafe Classic Coffeeggg', 'various', 2, '6', 'Beverage', '200', '100-gm', '600.00', NULL, 'dfgdfgdfgdfgdfgd', '7640492.jpg', 0, 0, 0, '0.00', 'no'),
(15, '95837439', 'Lizol  Citrus', 'various', 21, '17', 'Floor & other cleaning ', 'In Stock', '200 ML', '100.00', '0', 'Lizol is India\'s No.1 Household Cleaning Brand which is highly recommended by the Indian Medical Association. Lizol guarantees to kill 99.99% of disease-causing bacteria as well as germs .', '8705937.jpg', 1, 0, 0, '100.00', 'yes'),
(16, '39256224', 'Test Product', 'single', 6, '13', 'Edible oil & ghee', 'Out Of Stock', '5 Kg', '700.00', '0', 'sdfsdfsdfsfsf', '9181240.png', 1, 0, 0, '700.00', 'no'),
(21, '84740846', 'Redoak Persimmon', 'single', 6, '7', 'Exotic fruits', 'Out Of Stock', '500 gm', '500.00', '20', 'i am loving it ', '3517310.jpg', 1, 0, 0, '400.00', 'no'),
(38, '77378016', 'Chikoo', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '500 gm', '100.00', '0', 'i am loving it ', '8966533.jpg', 1, 0, 0, '100.00', 'no'),
(17, '25236257', 'Mutton keema', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '500.00', '20', 'Mutton', '456636.jpg', 1, 0, 0, '400.00', 'no'),
(18, '21276751', 'Mutton Boneless', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '500.00', '20', 'i am loving   it', '6365249.jpg', 1, 0, 0, '400.00', 'no'),
(19, '52030966', 'APPLE', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '500 gm', '200.00', '0', 'Apples are high in soluble fiber, which helps lower cholesterol.they also have polyphenols ,which are linked to lower blood pressure and stroke risk.', '531433.jpg', 1, 0, 0, '200.00', 'no'),
(20, '3352543', 'banana', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '500 gm', '200.00', '20', 'Banana is a happy fruit.Eating  just one can help relieve irritable emotions,anger &depression ', '8937333.jpg', 1, 0, 0, '160.00', 'no'),
(22, '69211648', 'Avocado', 'single', 6, '7', 'Exotic fruits', 'Out Of Stock', '500 gm', '400.00', '0', 'Avocado', '3100831.jpg', 1, 0, 0, '400.00', 'no'),
(23, '6529854', 'Pineapple', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '1 Pcs', '100.00', '0', 'Pineapples are a good source of antioxidants,which may reduce the risk of chronic diseases such as heart disease, \r\ndiabetes and certain cancer .', '3834474.jpg', 1, 0, 0, '100.00', 'no'),
(24, '28638301', 'Green Apple', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '500 gm', '100.00', '20', 'Green Apple', '6838404.jpg', 1, 0, 0, '80.00', 'no'),
(25, '92690813', 'kiwi', 'single', 6, '7', 'Exotic fruits', 'Out Of Stock', '500 gm', '100.00', '0', 'kiwi  juice is packed with antioxidants. these help fight free radicals and delay the ageing process.', '2796141.jpg', 1, 0, 0, '100.00', 'no'),
(26, '18443558', 'orange', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '500 gm', '40.00', '0', 'Oranges are loaded with vitamin C ,minerals,dietary fiber,and other nutrients that make \r\nit one of the best fruits to consume to prevent skin diseases and skin infection .', '2769393.jpg', 1, 0, 0, '40.00', 'no'),
(27, '32947950', 'Strawberry', 'single', 6, '7', 'Exotic fruits', 'Out Of Stock', '500 gm', '100.00', '0', 'strawberry', '1687966.jpg', 1, 0, 0, '100.00', 'no'),
(28, '25684084', 'watermelon', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '3 Kg', '100.00', '0', 'watermelon is a good source of vitamin C,the nutrient that is essential for collagen synthesis,\r\ncollagen supple and strengthens your hair .', '2724675.jpg', 1, 0, 0, '100.00', 'no'),
(29, '56187308', 'muskmelon', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '1 Kg', '50.00', '0', 'muskmelon', '1003874.jpg', 1, 0, 0, '50.00', 'no'),
(30, '18117217', 'Pears ', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '500 gm', '100.00', '0', 'i am loving it ', '4484630.jpg', 1, 0, 0, '100.00', 'no'),
(31, '81345799', 'Peach', 'single', 6, '7', 'Exotic fruits', 'Out Of Stock', '500 gm', '300.00', '0', 'peach', '3863023.jpg', 1, 0, 0, '300.00', 'no'),
(32, '76964816', 'Blue grapes', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '1 Kg', '200.00', '0', 'grapes', '4812593.jpg', 1, 0, 0, '200.00', 'no'),
(33, '34471278', 'Green grapes ', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '1 Kg', '100.00', '0', 'green grapes', '9213284.jpg', 1, 0, 0, '100.00', 'no'),
(34, '18177978', 'pomegranate', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '500 Kg', '100.00', '0', 'pomegranate', '7733531.jpg', 1, 0, 0, '100.00', 'no'),
(35, '89105200', 'Dragon  fruit', 'single', 6, '7', 'Exotic fruits', 'Out Of Stock', '1 Kg', '800.00', '0', 'dragon fruits', '3712628.jpg', 1, 0, 0, '800.00', 'no'),
(36, '84681058', 'papaya', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '1 Kg', '40.00', '0', 'papaya', '1408896.jpg', 1, 0, 0, '40.00', 'no'),
(37, '53938466', 'Lychee', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '500 gm', '100.00', '20', 'Lychee', '4119696.jpg', 1, 0, 0, '80.00', 'no'),
(39, '95258560', 'custard apple', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '1 Kg', '200.00', '0', 'custard', '8259926.jpg', 1, 0, 0, '200.00', 'no'),
(40, '66504919', 'coconut water ', 'single', 6, '7', 'Exotic fruits', 'Out Of Stock', '1 Pcs', '50.00', '0', 'coconut water ', '761715.png', 1, 0, 0, '50.00', 'no'),
(41, '88416583', 'Mosambi', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '1 Kg', '100.00', '0', 'Mosambi', '9713393.png', 1, 0, 0, '100.00', 'no'),
(42, '1756163', 'coconut', 'single', 6, '6', 'Fresh fruits', 'Out Of Stock', '1 Pcs', '40.00', '0', 'coconut', '6982559.jpg', 1, 0, 0, '40.00', 'no'),
(43, '65676576', 'Agla raan', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '500.00', '0', 'Agla raan', '1990527.jpg', 1, 0, 0, '500.00', 'no'),
(44, '27795264', 'pichhala raan', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '500.00', '0', 'back leg ', '5550527.jpg', 1, 0, 0, '500.00', 'no'),
(45, '92323350', 'Mutton neck', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '500.00', '0', 'mutton', '2330.jpg', 1, 0, 0, '500.00', 'no'),
(46, '74865283', 'Chaap', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '500.00', '0', 'mutton', '9181714.jpg', 1, 0, 0, '500.00', 'no'),
(47, '25258991', 'Mutton chest ', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '400.00', '0', 'Mutton chest ', '9263610.jpg', 1, 0, 0, '400.00', 'no'),
(48, '33905692', 'Mutton curry cut', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '400.00', '0', 'Mutton curry cut', '2527012.jpg', 1, 0, 0, '400.00', 'no'),
(49, '87503792', 'Mota sina', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '500.00', '0', 'Mota sina', '5306579.jpg', 1, 0, 0, '500.00', 'no'),
(50, '99552725', 'Mutton liver', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '500.00', '0', 'Mutton liver', '2468773.jpg', 1, 0, 0, '500.00', 'no'),
(51, '9406021', 'Mutton kidney ', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '500.00', '0', 'Mutton kidney ', '8654607.jpg', 1, 0, 0, '500.00', 'no'),
(52, '57024152', 'Mutton heart', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '400.00', '0', 'Mutton heart ', '1594511.jpg', 1, 0, 0, '400.00', 'no'),
(53, '52295714', 'Mutton nalli', 'single', 6, '2', 'Mutton', 'Out Of Stock', '500 gm', '400.00', '0', 'Mutton nalli', '8890400.jpg', 1, 0, 0, '400.00', 'no'),
(54, '77810850', 'Mutton fat ', 'single', 6, '2', 'Mutton', 'Out Of Stock', '1 Kg', '150.00', '0', 'Mutton fat ', '9998571.jpg', 1, 0, 0, '150.00', 'no'),
(55, '48651668', 'Chicken curry cut /skinless', 'single', 6, '1', 'chicken ', 'Out Of Stock', '500 gm', '200.00', '0', 'chicken curry cut ', '8384179.jpg', 1, 0, 0, '200.00', 'no'),
(56, '76121886', 'chicken Drumstick/skinless', 'single', 6, '1', 'chicken ', 'Out Of Stock', '500 gm', '250.00', '0', 'chicken', '669200.jpg', 1, 0, 0, '250.00', 'no'),
(57, '26024911', 'whole chicken/ skinless ', 'single', 6, '1', 'chicken ', 'Out Of Stock', '1 Kg', '200.00', '0', 'chicken', '1454619.jpg', 1, 0, 0, '200.00', 'no'),
(58, '69589151', 'whole chicken leg/skinless', 'single', 6, '1', 'chicken ', 'Out Of Stock', '500 gm', '225.00', '0', 'chicken', '3960267.jpg', 1, 0, 0, '225.00', 'no'),
(59, '43790934', 'chicken breast / skinless', 'single', 6, '1', 'chicken ', 'Out Of Stock', '500 gm', '200.00', '0', 'chicken', '8084513.jpg', 1, 0, 0, '200.00', 'no'),
(60, '39877214', 'chicken keema ', 'single', 6, '1', 'chicken ', 'Out Of Stock', '500 gm', '250.00', '0', 'chicken', '3339038.jpg', 1, 0, 0, '250.00', 'no'),
(61, '81744190', 'chicken boneless', 'single', 6, '1', 'chicken ', 'Out Of Stock', '500 gm', '225.00', '0', 'chicken', '9206359.jpg', 1, 0, 0, '225.00', 'no'),
(62, '87121167', 'chicken wings/skinless', 'single', 6, '1', 'chicken ', 'Out Of Stock', '500 gm', '200.00', '0', 'chicken wings', '9226927.jpg', 1, 0, 0, '200.00', 'no'),
(63, '61227337', 'chicken liver ', 'single', 6, '1', 'chicken ', 'Out Of Stock', '500 gm', '200.00', '0', 'chicken', '906563.jpg', 1, 0, 0, '200.00', 'no'),
(64, '78929651', 'chicken heart ', 'single', 6, '1', 'chicken ', 'Out Of Stock', '500 gm', '200.00', '0', 'chicken liver ', '4070143.jpg', 1, 0, 0, '200.00', 'no'),
(65, '27915354', 'fresh Hilsa fish', 'single', 6, '3', 'Fish', 'Out Of Stock', '1 Kg', '500.00', '0', 'Hilsa', '3920377.jpg', 1, 0, 0, '500.00', 'no'),
(66, '94070036', 'fresh catla fish', 'single', 6, '3', 'Fish', 'Out Of Stock', '500 gm', '300.00', '0', 'fish', '7367311.jpg', 1, 0, 0, '300.00', 'no'),
(67, '79688589', 'Fresh Rohu fish ', 'single', 6, '3', 'Fish', 'Out Of Stock', '1 Kg', '300.00', '0', 'fish', '8929839.jpg', 1, 0, 0, '300.00', 'no'),
(68, '38114296', 'prawn fish/frozen', 'single', 6, '3', 'Fish', 'Out Of Stock', '250 gm', '300.00', '0', 'fish', '4958172.jpg', 1, 0, 0, '300.00', 'no'),
(69, '97009396', 'prawn whole  fish /frozen', 'single', 6, '3', 'Fish', 'Out Of Stock', '500 gm', '300.00', '0', 'fish', '1376669.jpg', 1, 0, 0, '300.00', 'no'),
(70, '16047266', 'small prawn fish/frozen', 'single', 6, '3', 'Fish', 'Out Of Stock', '500 gm', '150.00', '0', 'fish', '9182583.jpg', 1, 0, 0, '150.00', 'no'),
(71, '72995961', 'Mutton brain', 'single', 6, '2', 'Mutton', 'Out Of Stock', '250 gm', '400.00', '0', 'Brain', '702029.jpg', 1, 0, 0, '400.00', 'no'),
(72, '61214609', 'Green capsicum', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '500 gm', '50.00', '0', 'green capsicum', '8607968.png', 1, 0, 0, '50.00', 'no'),
(73, '26139811', 'Yellow capsicum', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '500 gm', '50.00', '0', 'yellow capsicum', '5299205.png', 1, 0, 0, '50.00', 'no'),
(74, '42216503', 'Red capsicum', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '500 gm', '50.00', '0', 'Red capsicum', '9115016.png', 1, 0, 0, '50.00', 'no'),
(75, '34272850', 'White onion', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '100.00', '0', 'white onion', '9526985.jpg', 1, 0, 0, '100.00', 'no'),
(76, '81140962', 'Broccoli', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '80.00', '0', 'broccoli', '5988636.jpg', 1, 0, 0, '80.00', 'no'),
(77, '87848383', 'Cabbage', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '60.00', '0', 'cabbage', '1377623.jpg', 1, 0, 0, '60.00', 'no'),
(78, '64162115', 'Cauliflower', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '60.00', '0', 'cauliflower', '9061931.jpg', 1, 0, 0, '60.00', 'no'),
(79, '55411905', 'Cucumber', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '60.00', '0', 'cucumber', '7184350.jpg', 1, 0, 0, '60.00', 'no'),
(80, '12445335', 'Brinjal', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '40.00', '0', 'Brinjal', '2989745.png', 1, 0, 0, '40.00', 'no'),
(81, '34711674', 'carrot', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '60.00', '0', 'carrot', '6835464.png', 1, 0, 0, '60.00', 'no'),
(82, '40799848', 'spinach', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '40.00', '0', 'spinach', '7154786.png', 1, 0, 0, '40.00', 'no'),
(83, '32609095', 'chicken foot', 'single', 6, '1', 'chicken ', 'Out Of Stock', '500 gm', '100.00', '0', 'chicken', '3990045.jpg', 1, 0, 0, '100.00', 'no'),
(84, '49224924', 'Red cabbage', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '100.00', '0', 'red', '3453316.png', 1, 0, 0, '100.00', 'no'),
(85, '19925718', 'Garlic', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '500 gm', '100.00', '0', 'garlic', '9768452.png', 1, 0, 0, '100.00', 'no'),
(86, '6761756', 'green chilli', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '40.00', '0', 'green chilli', '6635658.png', 1, 0, 0, '40.00', 'no'),
(87, '13998644', 'Ginger', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '100 gm', '20.00', '0', 'ginger', '7070481.png', 1, 0, 0, '20.00', 'no'),
(88, '81743087', 'Corn', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '50.00', '0', 'corn', '8890370.png', 1, 0, 0, '50.00', 'no'),
(89, '13201952', 'Radish', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '40.00', '0', 'Radish', '1696549.png', 1, 0, 0, '40.00', 'no'),
(90, '95082091', 'Beet', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '120.00', '0', 'beet', '7884586.png', 1, 0, 0, '120.00', 'no'),
(91, '66717995', 'Peas', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '100.00', '0', 'Peas', '1110127.png', 1, 0, 0, '100.00', 'no'),
(92, '79301505', 'onion', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '50.00', '0', 'Onion', '9178029.png', 1, 0, 0, '50.00', 'no'),
(93, '3233397', 'Coriander', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '250 gm', '40.00', '0', 'Coriander', '79133.png', 1, 0, 0, '40.00', 'no'),
(94, '20854369', 'Mint', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '250 gm', '30.00', '0', 'mint', '3299434.png', 1, 0, 0, '30.00', 'no'),
(95, '78754303', 'Pointed gourd/Parwal', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '50.00', '0', 'parwal', '9011057.png', 1, 0, 0, '50.00', 'no'),
(96, '19262858', 'Bitter Gourd/Karela', 'single', 6, '5', 'Fresh vegetables ', 'Out Of Stock', '1 Kg', '50.00', '0', 'Karela', '1873457.png', 1, 0, 0, '50.00', 'yes'),
(97, '76830599', 'Ariel Complete Detergent Washing Powder', 'various', 9, '16', 'Laundry care', 'Out Of Stock', '2 Kg', '580.00', '5', 'New Ariel Complete Detergent Washing Powder gives you tough stain removal in just 1 wash. Designed to work in semi-automatic washing machine.', '1207265.jpg', 1, 0, 0, '551.00', 'yes'),
(98, '14522151', 'Ariel Detergent Washing Powder - Matic, Front Load', 'various', 9, '16', 'Laundry care', 'Out Of Stock', '4 Kg', '1150.00', '5', 'New & Improved Ariel Matic gives you tough stain removal in just 1 wash. Especially designed to be used in front loading machines.', '6701231.jpg', 1, 0, 0, '1092.50', 'yes'),
(99, '82817947', 'Ariel Matic Liquid - Front Load', 'various', 9, '16', 'Laundry care', 'Out Of Stock', '2 Kg', '500.00', '0', 'New Ariel Matic liquid detergent gives tough stain removal in just 1 wash, as well as prevent your coloured clothes from fading', '330755.jpg', 1, 0, 0, '500.00', 'yes'),
(100, '31646786', 'Ariel  Matic Top Load', 'various', 9, '16', 'Laundry care', 'In stock', '4 Kg', '1050.00', '0', 'Especially designed to be used in top loading machines, Ariel Matic offers brilliant stain removal for full loads', '9076084.jpg', 1, 0, 0, '1050.00', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

DROP TABLE IF EXISTS `product_gallery`;
CREATE TABLE IF NOT EXISTS `product_gallery` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(100) NOT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `product_id`, `images`) VALUES
(42, '17', '81oHsGUF+1L__SX425_2.jpg'),
(41, '17', 'image1.png'),
(39, '10', 'Lipton-Tea1.png'),
(40, '9', '71PiszDkulL__SL1500_3.jpg'),
(38, '10', '71PiszDkulL__SL1500_2.jpg'),
(37, '10', '71PiszDkulL__SL1500_1.jpg'),
(36, '10', '81oHsGUF+1L__SX425_1.jpg'),
(43, '10', 'Lipton-Tea2.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `star_rating` varchar(100) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referral_setting`
--

DROP TABLE IF EXISTS `referral_setting`;
CREATE TABLE IF NOT EXISTS `referral_setting` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `amount` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_setting`
--

INSERT INTO `referral_setting` (`id`, `amount`) VALUES
(2, '10');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) NOT NULL,
  `rates` varchar(50) NOT NULL,
  `review_comments` text NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `min_order_amt` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `min_order_amt`) VALUES
(1, '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `shiping_zone`
--

DROP TABLE IF EXISTS `shiping_zone`;
CREATE TABLE IF NOT EXISTS `shiping_zone` (
  `zone_id` int(100) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) NOT NULL,
  `zip_code` int(100) DEFAULT NULL,
  PRIMARY KEY (`zone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shiping_zone`
--

INSERT INTO `shiping_zone` (`zone_id`, `location_name`, `zip_code`) VALUES
(1, 'Chakdaha', 741222),
(2, 'Kolkata', 700001);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

DROP TABLE IF EXISTS `shipping_address`;
CREATE TABLE IF NOT EXISTS `shipping_address` (
  `shipping_address_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `nearby_location` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`shipping_address_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`shipping_address_id`, `user_id`, `full_name`, `phone`, `address`, `city`, `pin`, `nearby_location`) VALUES
(1, '7', 'Dipankar Mondol', '968568523', '19 Wall street', 'Barrackpore', '700120', 'Shiv Mandir'),
(2, '7', 'Sonali Mondal', '5665632956256', '183, Old Calcutta Road', 'Barrackpore', '700123', 'Talpukur'),
(3, '7', 'Dipankar Mondol', '94845555554', '09, Topkhana Road', 'Barrackpore', '700120', 'Cubbon Road'),
(4, '7', 'Dipankar Mondal', '8967464432', '142,KG School Road,Anandapuri,Kolkata,North 24 Parganas', 'Barrackpore ', '700120', 'Trst'),
(12, '9', 'sourav samanta', '9597853822', ',,Garia,Kolkata,South 24 Parganas', 'kolkata', '700084', ''),
(11, '9', 'sourav samanta', '9597853822', ',,Garia,Kolkata,South 24 Parganas', 'kolkata', '700084', 'garia'),
(10, '33', 'Dipankar Mondal', '8967464432', '142,KG School Road,Anandapuri,Kolkata,North 24 Parganas', 'Koaa', '700122', ''),
(17, '46', 'rohan roy', '9898656536', '187,Roy Nagar road', 'kolkata', '700120', ''),
(13, '35', 'fardeen', '9386261765', ',,Indrapuri,Patna,Patna', 'patna', '800014', 'near igims'),
(14, '43', 'Aamir Hayat khan', '7809733846', ',,Shalimar Bagh,New Delhi,North West Delhi', 'delhi', '110088', 'signature pg'),
(15, '43', 'Aamir Hayat khan', '7809733846', ',,Shalimar Bagh,New Delhi,North West Delhi', 'patna', '800014', ''),
(16, '13', 'Dipankar Mondal', '8967464432', '78, Bidhannagar', 'Kolkata', '123444', 'Statue'),
(18, '13', 'Dipankar Mondal', '8967464432', 'asd, asdh', 'Kolkata', '700001', '1245654'),
(19, '33', 'Dipankar Mondal', '8967464432', '142,KG School Road,Anandapuri,Kolkata,North 24 Parganas', 'Kolkata', '700008', 'Ks'),
(20, '47', 'sanjay', '7063245845', ',Unnamed Road', 'chakdaha', '741222', 'near club');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_table`
--

DROP TABLE IF EXISTS `shipping_table`;
CREATE TABLE IF NOT EXISTS `shipping_table` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `zip_code` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `title_ship` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slots_timing`
--

DROP TABLE IF EXISTS `slots_timing`;
CREATE TABLE IF NOT EXISTS `slots_timing` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `slot` int(10) DEFAULT NULL,
  `start` varchar(100) DEFAULT NULL,
  `end` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots_timing`
--

INSERT INTO `slots_timing` (`id`, `slot`, `start`, `end`) VALUES
(24, 1, '06:00', '10:00'),
(25, 2, '10:01', '14:00'),
(26, 3, '14:01', '18:00');

-- --------------------------------------------------------

--
-- Table structure for table `sms_set`
--

DROP TABLE IF EXISTS `sms_set`;
CREATE TABLE IF NOT EXISTS `sms_set` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sender` varchar(100) NOT NULL,
  `sms_user` varchar(100) NOT NULL,
  `sms_pass` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_set`
--

INSERT INTO `sms_set` (`id`, `sender`, `sms_user`, `sms_pass`) VALUES
(1, 'AIRSMS', 'sanjnatta', 'Goodnight88$$');

-- --------------------------------------------------------

--
-- Table structure for table `terms_condition`
--

DROP TABLE IF EXISTS `terms_condition`;
CREATE TABLE IF NOT EXISTS `terms_condition` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `heading` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms_condition`
--

INSERT INTO `terms_condition` (`id`, `heading`, `description`) VALUES
(2, 'sdfsf', 'sfsdfsfsddddddddddddddddddddd'),
(3, 'ertert', 'gdfgh'),
(4, 'weqweq', 'vfxsxzcfsdfs');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `notes` text DEFAULT NULL COMMENT 'Add Message for transactions',
  `debit` decimal(5,2) DEFAULT NULL COMMENT 'withdraw',
  `credit` decimal(5,2) DEFAULT NULL COMMENT 'deposit',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `notes`, `debit`, `credit`) VALUES
(1, 46, 'Reward Added to wallet', NULL, '100.00'),
(2, 46, 'Reward Added to wallet', NULL, '15.00');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `unt_name` varchar(100) NOT NULL,
  `ful_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unt_name`, `ful_name`) VALUES
(1, 'Pkt', 'Packet'),
(2, 'gm', 'Gram'),
(3, 'Kg', 'Kilo Gram'),
(4, 'Pcs', 'Pieces'),
(5, 'Ltr', 'Liter'),
(6, 'ML', 'Millilitre');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) CHARACTER SET latin1 NOT NULL,
  `verification_code` int(11) DEFAULT NULL,
  `verification_code_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `verification_status` enum('0','1') CHARACTER SET latin1 NOT NULL DEFAULT '1' COMMENT '''0'' => Not Verified, ''1'''' => Verified',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `referral_code_parent` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referral_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logintype` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passcode` int(4) DEFAULT NULL,
  `profileimage` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deviceid` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `password`, `phone`, `verification_code`, `verification_code_created_at`, `verification_status`, `created`, `modified`, `referral_code_parent`, `referral_code`, `logintype`, `login_id`, `passcode`, `profileimage`, `deviceid`) VALUES
(1, ' Test', ' test123', 'test@test.com', '', '9433258923', 0, '2020-07-25 09:01:31', '1', '2020-07-25 09:01:31', '2020-07-25 09:01:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Som', 'som220', 'test11@test.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '8478821387', NULL, '2020-07-26 00:21:23', '1', '2020-07-26 07:21:23', '2020-09-26 13:30:30', NULL, 'DJIA4545ER', NULL, NULL, NULL, NULL, NULL),
(6, 'test1122', NULL, 'test1122@test.com', 'e10adc3949ba59abbe56e057f20f883e', '9999999999', NULL, '2020-08-01 05:46:14', '1', '2020-08-01 12:46:14', '2020-08-01 12:46:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Dipankar Mondal', NULL, 'dip@dip.com', 'e10adc3949ba59abbe56e057f20f883e', '123456789', NULL, '2020-08-01 05:48:26', '1', '2020-08-01 12:48:26', '2020-10-30 16:35:25', NULL, NULL, NULL, NULL, NULL, 'https://buymenow.app/uploads/profileimage/5f9c40cdc8fc2.png', NULL),
(8, 'Dipankar Mondal', NULL, 'dip@email.com', 'e10adc3949ba59abbe56e057f20f883e', '98765433210', NULL, '2020-08-01 05:56:40', '1', '2020-08-01 12:56:40', '2020-08-01 12:56:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'sourav samanta', NULL, 'samanta.sourav11@gmail.com', 'd1e6e9aa99a2e3622f9c171c7355bb6d', '9597853822', NULL, '2020-08-02 09:00:43', '1', '2020-08-02 16:00:43', '2020-08-02 16:00:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'madhab', NULL, 'madhab@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1234567891', NULL, '2020-08-02 11:51:52', '1', '2020-08-02 18:51:52', '2020-08-02 18:51:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'fardeen.khan', NULL, 'fardeen.khan8@gmail.com', 'b1ca91185cdd810fccaa15df478de333', '9905928509', NULL, '2020-08-03 00:02:56', '1', '2020-08-03 07:02:56', '2020-08-03 07:02:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'gasd asgd asd', NULL, 'a@a.com', '14e1b600b1fd579f47433b88e8d85291', '1234567890', NULL, '2020-09-12 06:14:57', '1', '2020-09-12 13:14:57', '2020-09-12 13:17:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Dipankar Mondal', NULL, 'dipankar@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae', '8967464432', NULL, '2020-09-13 03:01:41', '1', '2020-09-13 10:01:41', '2020-10-21 17:00:29', NULL, NULL, NULL, NULL, 7978, NULL, NULL),
(14, 'madhab ghosh', NULL, 'madhabchandraghosh2010@gmail.com', '691303afce211b5f160b1d02990f62fb', '9062277590', NULL, '2020-09-13 03:24:44', '1', '2020-09-13 10:24:44', '2020-09-13 10:24:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'aamir', NULL, 'aamirhayat94@gmailcom', '5bae6e3b79392e92d2065bf527bd8136', '7809733846', NULL, '2020-09-13 04:02:36', '1', '2020-09-13 11:02:36', '2020-09-13 11:02:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Dipu', NULL, 'dips@email.com', '25f9e794323b453885f5181f1b624d0b', '123456789', NULL, '2020-09-26 09:58:14', '1', '2020-09-26 16:58:14', '2020-09-26 16:58:14', NULL, '85ddwe8er9565', NULL, NULL, NULL, NULL, NULL),
(18, 'Tridibesh', NULL, 'sentridibesh3@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '659929289', NULL, '2020-09-27 07:46:31', '1', '2020-09-27 14:46:31', '2020-09-27 14:46:31', 'NA', '5f70a5c7d1644', NULL, NULL, NULL, NULL, NULL),
(19, 'pritam', NULL, 'pmihub@gmail.com', 'bda21dc616e9055d98f246629e9e82ba', '9735151074', NULL, '2020-09-28 09:58:33', '1', '2020-09-28 16:58:33', '2020-09-28 16:58:33', 'NA', '5f72163958a12', NULL, NULL, NULL, NULL, NULL),
(23, 'Soham', NULL, 'soham@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '5465656525', NULL, '2020-10-04 07:56:19', '1', '2020-10-04 14:56:19', '2020-10-04 14:56:19', 'DJIA4545ER', '5f79e29389e0c', NULL, NULL, NULL, NULL, NULL),
(24, 'Dipanakar Mondal', NULL, 'dipankar.mondal@gmail.com', '25f9e794323b453885f5181f1b624d0b', '1234567890', NULL, '2020-10-04 09:16:11', '1', '2020-10-04 16:16:11', '2020-10-04 16:16:11', '17485as', '5f79f54bb205c', NULL, NULL, 2571, NULL, NULL),
(25, 'Dipanakar Mondal', NULL, 'dipankar.mondal@email.com', '25f9e794323b453885f5181f1b624d0b', '1234567890', NULL, '2020-10-04 09:27:33', '1', '2020-10-04 16:27:33', '2020-10-04 16:27:33', '17485as', '5f79f7f58287f', NULL, NULL, NULL, NULL, NULL),
(26, 'john', NULL, 'john@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '656565656', NULL, '2020-10-04 09:32:15', '1', '2020-10-04 16:32:15', '2020-10-04 16:32:15', 'hihi', '5f79f90f258c6', NULL, NULL, NULL, NULL, NULL),
(27, 'john', NULL, 'johhhn@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '656565656', NULL, '2020-10-04 09:34:18', '1', '2020-10-04 16:34:18', '2020-10-04 16:34:18', 'hihi', '5f79f98a6bdd1', NULL, NULL, NULL, NULL, NULL),
(28, 'john', NULL, 'johhhkplpn@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '656565656', NULL, '2020-10-04 09:36:23', '1', '2020-10-04 16:36:23', '2020-10-04 16:36:23', 'hihi', '5f79fa07f01f4', NULL, NULL, NULL, NULL, NULL),
(29, 'john', NULL, 'johhnhkplpn@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '656565656', NULL, '2020-10-04 09:45:22', '1', '2020-10-04 16:45:22', '2020-10-04 16:45:22', 'DJIA4545ER', '5f79fc228c754', NULL, NULL, NULL, NULL, NULL),
(30, 'john', NULL, 'jo-kplpn@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '656565656', NULL, '2020-10-04 09:46:12', '1', '2020-10-04 16:46:12', '2020-10-04 16:46:12', 'DJIA4545ER', '5f79fc54639fd', NULL, NULL, NULL, NULL, NULL),
(31, 'dipu', NULL, 'dipu@gmail.com', '25f9e794323b453885f5181f1b624d0b', '1233456789', NULL, '2020-10-04 10:36:11', '1', '2020-10-04 17:36:11', '2020-10-04 17:36:11', '5f79f54bb205c', '5f7a080b04bf5', NULL, NULL, NULL, NULL, NULL),
(33, 'Dipankar Mondal', NULL, 'dipankar123.san@gmail.com', '', '', NULL, '2020-10-20 07:26:12', '1', '2020-10-20 14:26:12', '2020-10-20 14:26:12', NULL, '5f8ef384d474d', 'Facebook', '5221608371198390', NULL, NULL, 'dJzfzAOQQoiOzTeR0KA0Fm:APA91bHwuifvhes2y6IkaCHzdsMKfICCIhr2MlDPeBjMON_qf2OGo8OcKPyrTeoxokcs-_6CNY_F5iigw38OaQ43ALxBmGMubnDJjdwFQfCUOeFwh-rWSifVZDmM2RgSYVVdMeaF0Ou-'),
(34, 'S Bano', NULL, 'sbano3839@gmail.com', '', '', NULL, '2020-10-20 17:29:30', '1', '2020-10-21 00:29:30', '2020-10-21 00:29:30', NULL, '5f8f80eaa3d89', 'Google', '110238940782512283721', NULL, NULL, NULL),
(35, 'FARDEEN KHAN', NULL, 'fardeenraja@gmail.com', '', '', NULL, '2020-10-21 10:30:49', '1', '2020-10-21 17:30:49', '2020-10-21 17:30:49', NULL, '5f907049a891c', 'Google', '110229085259122114553', NULL, NULL, NULL),
(36, 'Vicky Singleton', NULL, 'vickysingleton.61523@gmail.com', '', '', NULL, '2020-10-22 05:27:35', '1', '2020-10-22 12:27:35', '2020-10-22 12:27:35', NULL, '5f917ab78231d', 'Google', '109672614783422660598', NULL, NULL, NULL),
(37, 'Dipankar Mondal', NULL, 'dipankar1.mondal@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae', '8967464432', NULL, '2020-10-23 12:56:03', '1', '2020-10-23 19:56:03', '2020-10-23 19:56:03', '5f8ef384d474d', '5f93355304f77', NULL, NULL, NULL, NULL, NULL),
(38, 'soha khan', NULL, 'khan.soha5@gmail.com', '', '', NULL, '2020-10-23 13:01:07', '1', '2020-10-23 20:01:07', '2020-10-23 20:01:07', NULL, '5f933683d17db', 'Google', '113744174199977564211', NULL, NULL, NULL),
(40, 'Soumen Roy', NULL, 'soumen2020@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '966956332', NULL, '2020-10-26 05:31:21', '1', '2020-10-26 12:31:21', '2020-10-26 12:31:21', 'NA', '5f96c19944552', NULL, NULL, NULL, NULL, NULL),
(41, 'Soumen talukdar', NULL, 'soumen-talukdar2020@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '966956332', NULL, '2020-10-26 05:32:24', '1', '2020-10-26 12:32:24', '2020-10-26 12:32:24', '5f933683d17db', '5f96c1d8ee5cd', NULL, NULL, 8264, NULL, NULL),
(42, 'Sutanu Ghosh', NULL, 'andisutanu@gmail.com', '', '', NULL, '2020-10-27 09:46:58', '1', '2020-10-27 16:46:58', '2020-10-27 16:46:58', NULL, '5f984f024e371', 'Google', '111996251764001241920', NULL, NULL, NULL),
(43, 'Aamir Hayat khan', NULL, 'aamirhayat94@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '7809733846', NULL, '2020-10-28 21:18:26', '1', '2020-10-29 04:18:26', '2020-11-13 08:49:36', NULL, NULL, 'Google', '103190376444877434722', NULL, NULL, NULL),
(45, 'Aurangzeb Khan', NULL, 'aurangzeb.dewa@gmail.com', '', '', NULL, '2020-10-31 05:41:49', '1', '2020-10-31 12:41:49', '2020-10-31 12:41:49', NULL, '5f9d5b8d8069d', 'Google', '116025760730020857285', NULL, '', NULL),
(46, 'rohan roy', NULL, 'rohan@hotmail.com', '0192023a7bbd73250516f069df18b500', '9809876789', NULL, '2020-11-03 06:46:57', '1', '2020-11-03 13:46:57', '2020-11-03 13:46:57', 'NA', '5fa15f51c6e4c', NULL, NULL, NULL, NULL, NULL),
(47, 'sanjay', NULL, 'natta.sanjay@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '7063245845', NULL, '2020-11-11 00:59:32', '1', '2020-11-11 07:59:32', '2020-11-11 07:59:32', 'NA', '5fab99e4903e5', NULL, NULL, NULL, NULL, 'e9zJgJqsSO2lRdXfUOIfut:APA91bFui6f_zCdXemYtcCEWT6DSOgc_MGwP_oxzcxCPliEDM4mDa61H4noo34Cgbo0yY3ZNusQC3LXdbdwTPwKRJLcUDMqf7TuCFD3GQmwqO_bsmCZ3SEILhUbL8I8Bgv5U5Q-2oNxr'),
(48, 'Infinite Flame Media', NULL, 'sameer30910@gmail.com', '', '', NULL, '2020-11-13 09:49:40', '1', '2020-11-13 16:49:40', '2020-11-13 16:49:40', NULL, '5faeb924c5720', 'Google', '101704914975461695024', NULL, '', NULL),
(49, 'svs srawan', NULL, 'svssrawan@gmail.com', '', '', NULL, '2020-11-20 08:15:27', '1', '2020-11-20 15:15:27', '2020-11-20 15:15:27', NULL, '5fb7dd8f552fd', 'Google', '112444366377135451336', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `various`
--

DROP TABLE IF EXISTS `various`;
CREATE TABLE IF NOT EXISTS `various` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(100) NOT NULL,
  `qty_unit` varchar(100) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `stock_qty` varchar(100) DEFAULT NULL,
  `sale_price` decimal(65,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `various`
--

INSERT INTO `various` (`id`, `product_id`, `qty_unit`, `price`, `img`, `stock_qty`, `sale_price`) VALUES
(1, '47753753', '5 KG', '350.00', '414729.jpg', '300', '262.50'),
(2, '47753753', '10 KG', '700.00', '6508914.jpg', '498', '525.00'),
(8, '47753753', '15 KG', '1000.00', '6155370.jpg', '300', '750.00'),
(9, '77206413', '500', '100.00', NULL, NULL, '0.00'),
(10, '77206413', '1kg', '200.00', NULL, NULL, '0.00'),
(11, '77206413', '2kg', '400.00', NULL, NULL, '0.00'),
(12, '40540165', '500', '100.00', NULL, NULL, '0.00'),
(13, '40540165', '1kg', '200.00', NULL, NULL, '0.00'),
(14, '40540165', '2kg', '400.00', NULL, NULL, '0.00'),
(15, '36998438', '500', '100.00', NULL, '25', '75.00'),
(16, '52286522', '250gm', '40.00', '865593.jpg', '1', '40.00'),
(17, '52286522', '500gm', '100.00', '9499949.jpg', '1', '100.00'),
(18, '52286522', '1kg', '200.00', '212152.jpg', '1', '200.00'),
(19, '52286522', '2kg', '300.00', '3688109.jpg', '1', '300.00'),
(20, '52286522', '3kg', '400.00', '8936565.jpg', '1', '400.00'),
(21, '16883336', '5 Piece', '20.00', NULL, NULL, '20.00'),
(22, '16883336', '10 piece', '35.00', NULL, NULL, '35.00'),
(23, '28488270', '2 Ltr', '260.00', '2687423.png', '500', '0.00'),
(24, '23860089', '200', '1200.00', NULL, '30', '0.00'),
(25, '95837439', '500ml', '100.00', NULL, 'In Stock', '100.00'),
(26, '95837439', '975ml', '400.00', NULL, 'In Stock', '400.00'),
(27, '95837439', '1L', '405.00', NULL, 'In Stock', '405.00'),
(28, '76830599', '2kg', '580.00', NULL, 'In Stock', '551.00'),
(29, '76830599', '1kg', '280.00', NULL, 'In Stock', '266.00'),
(30, '76830599', '500gm', '135.00', NULL, 'In Stock', '128.25'),
(31, '14522151', '4kg', '1150.00', NULL, 'In Stock', '1092.50'),
(32, '14522151', '3kg', '705.00', NULL, 'In Stock', '669.75'),
(33, '14522151', '2kg', '530.00', NULL, 'In Stock', '503.50'),
(34, '14522151', '1kg', '250.00', NULL, 'In Stock', '237.50'),
(35, '82817947', '1kg', '235.00', NULL, 'In Stock', '235.00'),
(36, '82817947', '500gm', '120.00', NULL, 'In Stock', '120.00'),
(37, '31646786', '3kg', '670.00', NULL, 'In Stock', '0.00'),
(38, '31646786', '1kg', '250.00', NULL, 'In Stock', '0.00'),
(39, '31646786', '500', '99.00', NULL, 'In Stock', '0.00'),
(40, '76830599', '200gm', '45.00', NULL, 'In Stock', '42.75'),
(41, '14522151', '500gm', '109.00', NULL, 'In Stock', '103.55'),
(42, '16883336', '10 gm', '80.00', NULL, 'In Stock', '80.00');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

DROP TABLE IF EXISTS `wallet`;
CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_id`, `balance`) VALUES
(13, '33', '670.00'),
(12, '47', '200'),
(9, '13', '1975');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
