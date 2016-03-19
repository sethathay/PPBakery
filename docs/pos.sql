-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2016 at 05:30 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ppbakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookers`
--

DROP TABLE IF EXISTS `bookers`;
CREATE TABLE IF NOT EXISTS `bookers` (
  `id` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookers`
--

INSERT INTO `bookers` (`id`, `name`, `phone`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_active`) VALUES
(0, 0, NULL, '2016-03-19 04:16:17', 1, '2016-03-19 04:16:17', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

DROP TABLE IF EXISTS `sales_orders`;
CREATE TABLE IF NOT EXISTS `sales_orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `booker_id` int(11) DEFAULT NULL,
  `so_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_amount_riel` double DEFAULT NULL,
  `total_amount_us` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `discount_riel` double DEFAULT NULL,
  `discount_us` double DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `memo` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `is_pos` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `so_code` (`so_code`),
  KEY `location_id` (`location_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`id`, `location_id`, `customer_id`, `booker_id`, `so_code`, `total_amount_riel`, `total_amount_us`, `balance`, `discount_riel`, `discount_us`, `order_date`, `due_date`, `memo`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_active`, `is_pos`) VALUES
(1, 2, 1, NULL, '16SO000001', 12600, 3.0731707317073, 0, 0, 0, '2016-03-15', '2016-03-15', NULL, '2016-03-15 11:24:03', 1, '2016-03-15 11:45:38', 1, 1, 1),
(2, 2, 1, NULL, '16SO000002', 1250, 0.3048780487804878, 0, 0, 0, '2016-03-18', '2016-03-18', NULL, '2016-03-18 23:31:40', 1, '2016-03-18 23:31:40', 1, 1, 0),
(3, 2, 0, NULL, '16SO000003', 4200, 1.024390243902439, 0, 0, 0, '2016-03-19', '2016-03-19', NULL, '2016-03-19 04:07:59', 1, '2016-03-19 04:07:59', 1, 1, 0),
(4, 2, 0, NULL, '16SO000004', 6.5, 0.0015853658536585367, 0, 0, 0, '2016-03-19', '2016-03-19', NULL, '2016-03-19 04:16:17', 1, '2016-03-19 04:16:17', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_details`
--

DROP TABLE IF EXISTS `sales_order_details`;
CREATE TABLE IF NOT EXISTS `sales_order_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sales_order_id` bigint(20) DEFAULT NULL,
  `discount_price_riel` double DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `qty_uom_id` int(11) DEFAULT NULL,
  `conversion` double DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `total_price_riel` double DEFAULT NULL,
  `total_price_us` double DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_free` tinyint(4) DEFAULT '0',
  `is_promotion` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `sales_order_id` (`sales_order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `sales_order_details`
--

INSERT INTO `sales_order_details` (`id`, `sales_order_id`, `discount_price_riel`, `product_id`, `qty`, `qty_uom_id`, `conversion`, `unit_price`, `total_price_riel`, `total_price_us`, `note`, `is_free`, `is_promotion`, `created_at`, `updated_at`) VALUES
(31, 1, 600, 2, 3, 1, 1, 1000, 2400, NULL, NULL, 0, 0, '2016-03-15 11:45:38', '2016-03-15 11:45:38'),
(32, 1, 300, 3, 3, 1, 1, 1500, 4200, NULL, NULL, 0, 0, '2016-03-15 11:45:38', '2016-03-15 11:45:38'),
(33, 1, 900, 4, 3, 1, 1, 2300, 6000, NULL, NULL, 0, 0, '2016-03-15 11:45:38', '2016-03-15 11:45:38'),
(34, 2, 0, 6, 1, 1, 1, 800, 800, NULL, NULL, 0, 0, '2016-03-18 23:31:40', '2016-03-18 23:31:40'),
(35, 2, 50, 5, 1, 1, 1, 500, 450, NULL, NULL, 0, 0, '2016-03-18 23:31:40', '2016-03-18 23:31:40'),
(36, 3, 100, 3, 1, 1, 1, 1500, 1400, NULL, NULL, 0, 0, '2016-03-19 04:07:59', '2016-03-19 04:07:59'),
(37, 3, 200, 2, 1, 1, 1, 1000, 800, NULL, NULL, 0, 0, '2016-03-19 04:07:59', '2016-03-19 04:07:59'),
(38, 3, 300, 4, 1, 1, 1, 2300, 2000, NULL, NULL, 0, 0, '2016-03-19 04:07:59', '2016-03-19 04:07:59'),
(39, 4, 0, 7, 1, 1, 1, 6.5, 6.5, NULL, NULL, 0, 0, '2016-03-19 04:16:17', '2016-03-19 04:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_receipts`
--

DROP TABLE IF EXISTS `sales_order_receipts`;
CREATE TABLE IF NOT EXISTS `sales_order_receipts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sales_order_id` bigint(20) DEFAULT NULL,
  `exchange_rate_id` int(11) DEFAULT NULL,
  `receipt_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount_us` double DEFAULT NULL,
  `amount_kh` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sales_order_id` (`sales_order_id`),
  KEY `receipt_code` (`receipt_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sales_order_receipts`
--

INSERT INTO `sales_order_receipts` (`id`, `sales_order_id`, `exchange_rate_id`, `receipt_code`, `amount_us`, `amount_kh`, `total_amount`, `balance`, `pay_date`, `due_date`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_active`) VALUES
(1, 1, 2, '16RE000001', 3.0731707317073, 12600, 12600, 0, '2016-03-15', '2016-03-15', '2016-03-15 11:24:03', 1, '2016-03-15 11:45:38', 1, 1),
(2, 2, 2, '16RE000002', 0.3048780487804878, 1250, 1250, 0, '2016-03-18', '2016-03-18', '2016-03-18 23:31:40', 1, '2016-03-18 23:31:40', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
