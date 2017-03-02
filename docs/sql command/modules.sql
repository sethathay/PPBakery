-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ppbakery.modules
DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parents` int(10) DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ppbakery.modules: ~28 rows (approximately)
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` (`id`, `name`, `parents`, `order`, `link`, `target`, `menu_id`, `img_path`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_active`) VALUES
	(1, 'ការលក់', NULL, 1, 'pos', '_blank', NULL, 'img/house_sale_b.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(2, 'មុខទំនិញ', NULL, 2, 'products', NULL, NULL, 'img/product_b.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(3, 'អត្រា​ប្តូ​រ​ប្រាក់', NULL, 3, 'exchangerates', NULL, NULL, 'img/emblem_money_b.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(4, 'ការបញ្ចុះតំលៃ', NULL, 4, 'discounts', NULL, NULL, 'img/discount_b.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(5, 'ការចំនាយ', NULL, 5, 'services/index', NULL, NULL, 'img/dollars_b.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(6, 'លក់ដុំ', NULL, 6, 'saleOrders/index', NULL, NULL, 'img/receipt_b.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(7, 'លក់កក់', NULL, 7, 'bookers/index', NULL, NULL, 'img/book_b.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(8, 'បញ្ចូលប្រាក់សរុបពីការលក់', NULL, 8, 'user_sale_logs/index', NULL, NULL, 'img/Salereport.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(9, 'ស្តុកទំនិញ', NULL, 9, 'inventories/index', NULL, NULL, 'img/stock.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(10, 'របាយការណ៍', NULL, 10, NULL, NULL, 'dreport', 'img/report_b.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(11, 'របាយការណ៍ វិក័យប័ត្រ', 10, 11, 'reports/reportInvoice', NULL, 'dreport', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(12, 'របាយការណ៍ តាមក្រុមទំនិញ', 10, 12, 'reports/reportProduct', NULL, 'dreport', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(13, 'របាយការណ៍ ចំនាយ', 10, 13, 'reports/reportExpense', NULL, 'dreport', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(14, 'របាយការណ៍ តាមក្រុមចំនាយ', 10, 14, 'reports/reportGroupExpense', NULL, NULL, NULL, '2017-03-02 01:20:56', 1, '2017-03-02 01:20:59', 1, 1),
	(15, 'របាយការណ៍ លក់សរុបតាម User', 10, 15, 'reports/reportSaleLog', NULL, 'dreport', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(16, 'អ្នកប្រើប្រាស់', NULL, 16, 'users/index', NULL, NULL, 'img/users_2_b.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(17, 'ការកំណត់របស់ប្រព័ន្ធ', NULL, 17, NULL, NULL, 'dsetting', 'img/settings_b.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(18, 'ទីតាំងហាង', 16, 18, 'locations', NULL, 'dsetting', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(19, 'អតិថិជន', 16, 19, 'customers', NULL, 'dsetting', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(20, 'បញ្ចុះតំលៃ សម្រាប់អតិថិជន', 16, 20, 'pricingRules/index', NULL, 'dsetting', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(21, 'ប្រភេទ ក្រុមចំនាយ', 16, 21, 'sectionGroups/index', NULL, 'dsetting', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(22, 'ក្រុមចំនាយ', 16, 22, 'sections/index', NULL, 'dsetting', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(23, 'ខ្នាតនៃក្រុមចំនាយ', 16, 23, 'uomexpenses/index', NULL, 'dsetting', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(24, 'ក្រុមទំនិញ', 16, 24, 'pgroups', NULL, 'dsetting', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(25, 'ក្រុមអតិថិជន', 16, 25, 'cgroups', NULL, 'dsetting', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(26, 'ក្រុមអ្នកប្រើប្រាស់', 16, 26, 'groups', NULL, 'dsetting', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(27, 'វង្វាស់ខ្នាត', 16, 27, 'uoms', NULL, 'dsetting', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(28, 'ការប្តូរវង្វាស់ខ្នាត', 16, 28, 'uomconversions', NULL, 'dsetting', NULL, '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1),
	(29, 'រក្សាទុកទិន្នន័យរបស់ប្រព័ន្ធ', NULL, 29, NULL, NULL, NULL, 'img/blue_external_drive_backup.png', '2016-04-28 10:47:08', 1, '2016-04-28 10:47:08', 1, 1);
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
