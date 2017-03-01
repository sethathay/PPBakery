/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.14 : Database - ppbakery
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ppbakery` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ppbakery`;

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`group_id`,`module_id`,`updated_at`,`created_at`) values (1,1,1,'2017-02-26 16:46:25','2017-02-26 16:46:25'),(2,1,2,'2017-02-26 16:46:25','2017-02-26 16:46:25'),(3,1,3,'2017-02-26 16:46:25','2017-02-26 16:46:25'),(4,1,4,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(5,1,5,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(6,1,6,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(7,1,7,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(8,1,8,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(9,1,9,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(10,1,10,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(11,1,11,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(12,1,12,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(13,1,13,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(14,1,14,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(15,1,15,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(16,1,16,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(17,1,17,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(18,1,18,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(19,1,19,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(20,1,20,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(21,1,21,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(22,1,22,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(23,1,23,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(24,1,24,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(25,1,25,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(26,1,26,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(27,1,27,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(28,1,28,'2017-02-26 16:46:26','2017-02-26 16:46:26'),(35,3,2,'2017-02-26 16:47:58','2017-02-26 16:47:58'),(36,3,9,'2017-02-26 16:47:58','2017-02-26 16:47:58'),(37,3,10,'2017-02-26 16:47:58','2017-02-26 16:47:58'),(38,3,12,'2017-02-26 16:47:58','2017-02-26 16:47:58'),(39,2,1,'2017-02-27 23:39:16','2017-02-27 23:39:16'),(40,2,3,'2017-02-27 23:39:16','2017-02-27 23:39:16'),(41,2,4,'2017-02-27 23:39:16','2017-02-27 23:39:16'),(42,2,6,'2017-02-27 23:39:16','2017-02-27 23:39:16'),(43,2,7,'2017-02-27 23:39:16','2017-02-27 23:39:16'),(44,2,8,'2017-02-27 23:39:16','2017-02-27 23:39:16'),(45,2,10,'2017-02-27 23:39:16','2017-02-27 23:39:16'),(46,2,12,'2017-02-27 23:39:16','2017-02-27 23:39:16'),(47,2,13,'2017-02-27 23:39:16','2017-02-27 23:39:16');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
