# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: laravel
# Generation Time: 2019-11-06 14:49:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table banners
# ------------------------------------------------------------

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;

INSERT INTO `banners` (`id`, `name_vi`, `name_en`, `desc_vi`, `desc_en`, `image`, `link`, `type`, `created_at`, `updated_at`)
VALUES
	(1,'Slider 1','Slider 1',NULL,NULL,'images/5.jpg',NULL,'slider','2019-10-31 13:40:31','2019-10-31 13:40:31'),
	(2,'Slider 2','Slider 2',NULL,NULL,'images/6.jpg',NULL,'slider','2019-10-31 13:52:40','2019-10-31 13:52:40'),
	(3,'Slider 3','Slider 3',NULL,NULL,'images/10.jpg','https://www.google.com/','slider','2019-10-31 13:54:58','2019-10-31 14:02:54'),
	(4,'Banner 11','Banner 11',NULL,NULL,'images/11.jpg','https://www.google.com/','slider','2019-10-31 13:55:11','2019-10-31 14:02:50'),
	(5,'Banner 12','Banner 12',NULL,NULL,'images/12.jpg','https://www.google.com/','slider','2019-10-31 13:55:27','2019-10-31 14:02:45'),
	(6,'Banner 14','Banner 14',NULL,NULL,'images/13.jpg',NULL,'banner','2019-10-31 14:39:44','2019-10-31 14:39:44'),
	(7,'Banner 14','Banner 14',NULL,NULL,'images/347cbe7c43ba38f01689218b0a18ef72.jpg',NULL,'banner','2019-10-31 14:40:07','2019-10-31 14:40:07'),
	(8,'Banner 14','Banner 14',NULL,NULL,'images/15.jpg',NULL,'banner','2019-10-31 14:40:29','2019-10-31 14:40:29'),
	(9,'Banner 14','Banner 14',NULL,NULL,'images/ff4b1312159158910ae52d87224f59ce.jpg',NULL,'banner','2019-10-31 14:41:06','2019-10-31 14:41:06'),
	(10,'Banner 14','Banner 14',NULL,NULL,'images/c643a6dde9dce073bdd57baf4c46c9d1.jpg',NULL,'banner','2019-10-31 14:41:16','2019-10-31 14:41:16'),
	(11,'Brand 01','Brand 01',NULL,NULL,NULL,NULL,'brand','2019-11-06 14:41:51','2019-11-06 14:41:51'),
	(12,'Brand 02','Brand 02',NULL,NULL,NULL,NULL,'brand','2019-11-06 14:42:06','2019-11-06 14:42:06'),
	(13,'brand 03','brand 03',NULL,NULL,NULL,NULL,'brand','2019-11-06 14:42:23','2019-11-06 14:42:23'),
	(14,'brand 04','brand 04',NULL,NULL,NULL,NULL,'brand','2019-11-06 14:42:32','2019-11-06 14:42:32'),
	(15,'Brand 05','Brand 05',NULL,NULL,NULL,NULL,'brand','2019-11-06 14:42:47','2019-11-06 14:42:47'),
	(16,'Brand 06','Brand 06',NULL,NULL,NULL,NULL,'brand','2019-11-06 14:43:13','2019-11-06 14:43:13');

/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
