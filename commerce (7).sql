-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 30, 2021 at 10:29 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

DROP TABLE IF EXISTS `banner_images`;
CREATE TABLE IF NOT EXISTS `banner_images` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `heading` varchar(250) NOT NULL,
  `caption` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id`, `name`, `heading`, `caption`) VALUES
(7, '1.jpg', 'Template heading here', 'Template caption'),
(8, '2.jpg', 'Template heading', 'Template caption'),
(9, '3.jpg', 'Template heading', 'Template caption'),
(10, '4.jpg', 'Template heading', 'Template caption'),
(11, '5.jpg', 'Template heading', 'Template caption'),
(12, '6.jpg', 'Template heading ', 'Template caption');

-- --------------------------------------------------------

--
-- Table structure for table `business_category`
--

DROP TABLE IF EXISTS `business_category`;
CREATE TABLE IF NOT EXISTS `business_category` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_reference` varchar(200) DEFAULT NULL,
  `product_id` varchar(10) DEFAULT NULL,
  `product_size` varchar(20) DEFAULT NULL,
  `order_id` varchar(10) DEFAULT NULL,
  `quantity` varchar(10) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `sales_method` varchar(200) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_reference`, `product_id`, `product_size`, `order_id`, `quantity`, `price`, `sales_method`, `color`) VALUES
(1, NULL, '67', NULL, '1', '3', '9000', NULL, NULL),
(2, NULL, '64', NULL, '2', '2', '15000', NULL, NULL),
(3, NULL, '68', NULL, '3', '1', '12000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(6, 'bags'),
(7, 'footwear'),
(8, 'wristwatches');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `business_category` int(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_order`
--

DROP TABLE IF EXISTS `client_order`;
CREATE TABLE IF NOT EXISTS `client_order` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `reference_id` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `sales_method` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_order`
--

INSERT INTO `client_order` (`id`, `date`, `ip`, `reference_id`, `firstname`, `lastname`, `email`, `phone`, `address`, `city`, `state`, `amount`, `sales_method`, `status`) VALUES
(1, '2020-07-14', '::1', '67', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2020-07-19', '::1', '64', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2020-10-01', '::1', '68', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

DROP TABLE IF EXISTS `commission`;
CREATE TABLE IF NOT EXISTS `commission` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `commision_account` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `completed`
--

DROP TABLE IF EXISTS `completed`;
CREATE TABLE IF NOT EXISTS `completed` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `order_id` varchar(1100) DEFAULT NULL,
  `firstname` varchar(1100) DEFAULT NULL,
  `lastname` varchar(1100) DEFAULT NULL,
  `email` varchar(1100) DEFAULT NULL,
  `phone` varchar(1100) DEFAULT NULL,
  `address` varchar(1100) DEFAULT NULL,
  `city` varchar(1100) DEFAULT NULL,
  `state` varchar(1100) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `amount` varchar(1100) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `shipping_fee` varchar(250) DEFAULT NULL,
  `txref` varchar(100) DEFAULT NULL,
  `coupon_discount` varchar(100) NOT NULL,
  `pre_discount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completed`
--

INSERT INTO `completed` (`id`, `date`, `order_id`, `firstname`, `lastname`, `email`, `phone`, `address`, `city`, `state`, `country`, `amount`, `status`, `payment_status`, `shipping_fee`, `txref`, `coupon_discount`, `pre_discount`) VALUES
(20, '2020-07-14', 'HOLUW20200714110917', 'Oluwamurewa', 'Alao', 'holuwamurewa@gmail.com', '+2348163623842', 'Block m33 flat 3, ile iwe busstop\r\nJakande estate isolo', 'Isolo', 'Lagos', 'Nigeria', '28000', 'pending', 'confirmed', '1000', '', '', '28000'),
(19, '2020-07-14', 'HOLUW20200714110912', 'Oluwamurewa', 'Alao', 'holuwamurewa@gmail.com', '+2348163623842', 'Block m33 flat 3, ile iwe busstop\r\nJakande estate isolo', 'Isolo', 'Lagos', 'Nigeria', '28000', 'pending', 'confirmed', '1000', '', '', '28000'),
(18, '2020-07-14', 'HOLUW20200714110635', 'Oluwamurewa', 'Alao', 'holuwamurewa@gmail.com', '+2348163623842', 'Block m33 flat 3, ile iwe busstop\r\nJakande estate isolo', 'Isolo', 'Lagos', 'Nigeria', '28000', 'pending', 'confirmed', '1000', '', '', '28000');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

DROP TABLE IF EXISTS `counter`;
CREATE TABLE IF NOT EXISTS `counter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `percent_off` varchar(100) NOT NULL,
  `units` int(100) DEFAULT NULL,
  `exp_date` date NOT NULL,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `percent_off`, `units`, `exp_date`, `date_created`) VALUES
(9, 'CODE11%19043810', '11', 200, '2020-07-21', '2020-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `state` varchar(100) NOT NULL,
  `days` varchar(100) NOT NULL,
  `fee` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=272 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `state`, `days`, `fee`) VALUES
(234, 'Abia', '4-6 days', 1500),
(235, 'Adamawa', '1-3 days', 1000),
(236, 'Akwa Ibom', '1-3 days', 1000),
(237, 'Anambra', '1-3 days', 1000),
(238, 'Bauchi', '1-3 days', 1500),
(239, 'Bayelsa', '1-3 days', 1000),
(240, 'Benue', '1-3 days', 1000),
(241, 'Borno', '1-3 days', 1000),
(242, 'Cross River', '1-3 days', 1000),
(243, 'Delta', '1-3 days', 1000),
(244, 'Ebonyi', '1-3 days', 1000),
(245, 'Edo', '1-3 days', 1000),
(246, 'Ekiti', '1-3 days', 1000),
(247, 'Enugu', '1-3 days', 1000),
(248, 'FCT', '1-3 days', 1000),
(249, 'Gombe', '1-3 days', 1000),
(250, 'Imo', '1-3 days', 1000),
(251, 'Jigawa', '1-3 days', 1000),
(252, 'Kaduna', '1-3 days', 1000),
(253, 'Kano', '1-3 days', 1000),
(254, 'Katsina', '1-3 days', 1000),
(255, 'Kebbi', '1-3 days', 1000),
(256, 'Kogi', '1-3 days', 1000),
(257, 'Kwara', '1-3 days', 1000),
(258, 'Lagos', '1-3 days', 1000),
(259, 'Nasarawa', '1-3 days', 1000),
(260, 'Niger', '1-3 days', 1000),
(261, 'Ogun', '1-3 days', 1000),
(262, 'Ondo', '1-3 days', 1000),
(263, 'Osun', '1-3 days', 1000),
(264, 'Oyo', '1-3 days', 1000),
(265, 'Plateau', '1-3 days', 1000),
(266, 'Rivers', '1-3 days', 1000),
(267, 'Sokoto', '1-3 days', 1000),
(268, 'Taraba', '1-3 days', 1000),
(269, 'Yobe', '1-3 days', 1000),
(270, 'Zamfara', '1-3 days', 1000),
(271, 'others', '1-3 days', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
CREATE TABLE IF NOT EXISTS `fees` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `percentage` varchar(100) NOT NULL,
  `additional` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flutter_bank_list`
--

DROP TABLE IF EXISTS `flutter_bank_list`;
CREATE TABLE IF NOT EXISTS `flutter_bank_list` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `bank_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flutter_bank_list`
--

INSERT INTO `flutter_bank_list` (`id`, `name`, `code`, `bank_id`) VALUES
(1, 'Access Bank', '044', '191'),
(2, 'United Bank for Africa', '033', '190'),
(3, 'GTMobile', '315', '189'),
(4, 'Trustbond', '523', '188'),
(5, 'FET', '314', '187'),
(6, 'First City Monument Bank', '214', '186'),
(7, 'Mkudi', '313', ''),
(8, 'FSDH', '601', ''),
(9, 'Coronation Merchant Bank', '559', ''),
(10, 'Pagatech', '327', ''),
(11, 'Keystone Bank', '082', ''),
(12, 'Skye Bank', '076', ''),
(13, 'Sterling Bank', '232', ''),
(14, 'Union Bank', '032', ''),
(15, 'GTBank Plc', '058', ''),
(16, 'Jubilee Life Mortgage Bank', '402', ''),
(17, 'Heritage', '030', ''),
(18, 'ASO Savings and & Loans', '401', ''),
(19, 'Cellulant', '317', ''),
(20, 'SunTrust Bank', '100', ''),
(21, 'Paycom', '305', ''),
(22, 'Diamond Bank', '063', ''),
(23, 'Enterprise Bank', '084', ''),
(24, 'Wema Bank', '035', ''),
(25, 'Parralex', '526', ''),
(26, 'NPF MicroFinance Bank', '552', ''),
(27, 'Imperial Homes Mortgage Bank', '415', ''),
(28, 'Covenant Microfinance Bank', '551', ''),
(29, 'SafeTrust Mortgage Bank', '403', ''),
(30, 'ChamsMobile', '303', ''),
(31, 'ZenithMobile', '322', ''),
(32, 'PayAttitude Online', '329', ''),
(33, 'Fortis Microfinance Bank', '501', ''),
(34, 'Stanbic IBTC Bank', '221', ''),
(35, 'VTNetworks', '320', ''),
(36, 'NIP Virtual Bank', '999', ''),
(37, 'TeasyMobile', '319', ''),
(38, 'Fidelity Mobile', '318', ''),
(39, 'EcoMobile', '307', ''),
(40, 'Ecobank Plc', '050', ''),
(41, 'JAIZ Bank', '301', ''),
(42, 'MoneyBox', '325', ''),
(43, 'Hedonmark', '324', ''),
(44, 'Eartholeum', '302', ''),
(45, 'Access Money', '323', ''),
(46, 'Unity Bank', '215', ''),
(47, 'CitiBank', '023', ''),
(48, 'Fidelity Bank', '070', ''),
(49, 'eTranzact', '306', ''),
(50, 'Standard Chartered Bank', '068', ''),
(51, 'Zenith Bank', '057', ''),
(52, 'ReadyCash (Parkway)', '311', ''),
(53, 'Omoluabi Mortgage Bank', '990', ''),
(54, 'Sterling Mobile', '326', ''),
(55, 'First Bank of Nigeria', '011', ''),
(56, 'FBNMobile', '309', ''),
(57, 'FortisMobile', '308', ''),
(58, 'Stanbic Mobile Money', '304', ''),
(59, 'Page MFBank', '560', '');

-- --------------------------------------------------------

--
-- Table structure for table `free_transactions`
--

DROP TABLE IF EXISTS `free_transactions`;
CREATE TABLE IF NOT EXISTS `free_transactions` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `number` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `local_govt`
--

DROP TABLE IF EXISTS `local_govt`;
CREATE TABLE IF NOT EXISTS `local_govt` (
  `local_govt` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'administrator', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

DROP TABLE IF EXISTS `merchant`;
CREATE TABLE IF NOT EXISTS `merchant` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verified` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `address` blob,
  `phone` varchar(50) DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL,
  `balance` int(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_code` int(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `referral` varchar(50) DEFAULT NULL,
  `refer_by` varchar(50) DEFAULT NULL,
  `log_count` int(250) DEFAULT NULL,
  `business_category` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

DROP TABLE IF EXISTS `payouts`;
CREATE TABLE IF NOT EXISTS `payouts` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `merchant` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `reference` varchar(250) NOT NULL,
  `fee` varchar(50) NOT NULL,
  `amount` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `category` int(59) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `category_name` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`, `description`, `category_name`, `status`) VALUES
(63, 'Alexander Andrews Collection', 8, 13500, '1.jpg', 'Top quality wristwatch', 'wristwatches', 'active'),
(64, 'Henrik Topp Collection', 8, 15000, '2.jpg', NULL, 'wristwatches', 'active'),
(65, 'Verity Sanders Collection', 7, 25000, '3.jpg', NULL, 'footwear', 'active'),
(66, 'Imani Bahati Collection', 7, 22500, '4.jpg', NULL, 'footwear', 'active'),
(67, 'Natanni Collection', 6, 9000, '5.jpg', NULL, 'bags', 'active'),
(68, 'Tamara Bellis Collection', 6, 12000, '6.jpg', NULL, 'bags', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

DROP TABLE IF EXISTS `product_colors`;
CREATE TABLE IF NOT EXISTS `product_colors` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `product` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

DROP TABLE IF EXISTS `product_size`;
CREATE TABLE IF NOT EXISTS `product_size` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `order_date` varchar(50) DEFAULT NULL,
  `item_bought` varchar(200) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `order_id` varchar(200) DEFAULT NULL,
  `product_id` int(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `order_date`, `item_bought`, `size`, `color`, `amount`, `quantity`, `order_id`, `product_id`) VALUES
(26, '2020-07-14 23:09:17', 'Natanni Collection', '', '', '9000', '3', 'HOLUW20200714110917', 67),
(25, '2020-07-14 23:09:12', 'Natanni Collection', '', '', '9000', '3', 'HOLUW20200714110912', 67),
(24, '2020-07-14 23:06:35', 'Natanni Collection', '', '', '9000', '3', 'HOLUW20200714110635', 67);

-- --------------------------------------------------------

--
-- Table structure for table `saved_colors`
--

DROP TABLE IF EXISTS `saved_colors`;
CREATE TABLE IF NOT EXISTS `saved_colors` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `merchant` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saved_sizes`
--

DROP TABLE IF EXISTS `saved_sizes`;
CREATE TABLE IF NOT EXISTS `saved_sizes` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `merchant` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size_tab`
--

DROP TABLE IF EXISTS `size_tab`;
CREATE TABLE IF NOT EXISTS `size_tab` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(20) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

DROP TABLE IF EXISTS `social_media`;
CREATE TABLE IF NOT EXISTS `social_media` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `link`) VALUES
(1, 'twitter', '#'),
(2, 'facebook', '#'),
(3, 'instagram', '#'),
(4, 'whatsapp', '#'),
(5, 'phone', '#');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
