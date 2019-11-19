# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: laravel
# Generation Time: 2019-11-16 05:22:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_menu`;

CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`)
VALUES
	(1,0,1,'Dashboard','fa-bar-chart','/',NULL,NULL,NULL),
	(2,0,2,'Admin','fa-tasks','',NULL,NULL,NULL),
	(3,2,3,'Users','fa-users','auth/users',NULL,NULL,NULL),
	(4,2,4,'Roles','fa-user','auth/roles',NULL,NULL,NULL),
	(5,2,5,'Permission','fa-ban','auth/permissions',NULL,NULL,NULL),
	(6,2,6,'Menu','fa-bars','auth/menu',NULL,NULL,NULL),
	(7,2,7,'Operation log','fa-history','auth/logs',NULL,NULL,NULL),
	(8,0,8,'Slider','fa-image','/type/slider/banners','dashboard','2019-11-09 07:16:44','2019-11-12 20:22:42'),
	(9,0,9,'Banner','fa-image','/type/brand/banners','*','2019-11-09 07:35:59','2019-11-09 07:40:34'),
	(10,0,12,'Product','fa-tags','/type/gid/product','*','2019-11-09 07:37:32','2019-11-10 00:39:43'),
	(11,0,11,'Category','fa-list-ol','/type/gid/categories','*','2019-11-09 07:38:48','2019-11-10 00:39:43'),
	(12,0,13,'Blog','fa-newspaper-o','/type/gid/post','*','2019-11-09 07:40:18','2019-11-10 00:39:43'),
	(13,0,14,'Content','fa-newspaper-o','/type/gid/contents','*','2019-11-09 07:43:29','2019-11-10 00:39:43'),
	(14,0,10,'Brand','fa-image','/type/brand/banners','*','2019-11-10 00:39:30','2019-11-10 00:39:43'),
	(15,0,0,'Orders','fa-shopping-cart','/orders','*','2019-11-10 06:36:49','2019-11-10 06:37:41'),
	(16,0,0,'Coupon','fa-barcode','/coupons','*','2019-11-12 20:21:08','2019-11-12 20:21:08'),
	(17,0,0,'System Setting','fa-cogs','/setting','*','2019-11-12 20:22:03','2019-11-12 20:22:03');

/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_operation_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_operation_log`;

CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_operation_log` WRITE;
/*!40000 ALTER TABLE `admin_operation_log` DISABLE KEYS */;

INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`)
VALUES
	(1,1,'admin/type/gid/product','GET','127.0.0.1','[]','2019-11-13 12:03:09','2019-11-13 12:03:09'),
	(2,1,'admin/type/gid/product','GET','127.0.0.1','[]','2019-11-13 12:03:33','2019-11-13 12:03:33'),
	(3,1,'admin','GET','127.0.0.1','[]','2019-11-13 12:03:52','2019-11-13 12:03:52'),
	(4,1,'admin','GET','127.0.0.1','[]','2019-11-13 12:05:04','2019-11-13 12:05:04'),
	(5,1,'admin','GET','127.0.0.1','[]','2019-11-13 12:11:42','2019-11-13 12:11:42'),
	(6,1,'admin','GET','127.0.0.1','[]','2019-11-13 12:12:42','2019-11-13 12:12:42'),
	(7,1,'admin','GET','127.0.0.1','[]','2019-11-13 12:13:47','2019-11-13 12:13:47'),
	(8,1,'admin/coupons','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 12:14:12','2019-11-13 12:14:12'),
	(9,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 12:14:16','2019-11-13 12:14:16'),
	(10,1,'admin/teams/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 12:14:20','2019-11-13 12:14:20'),
	(11,1,'admin/teams/create','GET','127.0.0.1','[]','2019-11-13 12:15:11','2019-11-13 12:15:11'),
	(12,1,'admin','GET','127.0.0.1','[]','2019-11-13 12:15:45','2019-11-13 12:15:45'),
	(13,1,'admin/coupons','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 12:15:48','2019-11-13 12:15:48'),
	(14,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 12:15:53','2019-11-13 12:15:53'),
	(15,1,'admin/teams/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 12:15:55','2019-11-13 12:15:55'),
	(16,1,'admin/teams/create','GET','127.0.0.1','[]','2019-11-13 12:16:13','2019-11-13 12:16:13'),
	(17,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 12:16:58','2019-11-13 12:16:58'),
	(18,1,'admin/teams/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 12:17:00','2019-11-13 12:17:00'),
	(19,1,'admin','GET','127.0.0.1','[]','2019-11-13 12:55:15','2019-11-13 12:55:15'),
	(20,1,'admin/type/gid/product','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 12:55:18','2019-11-13 12:55:18'),
	(21,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 12:55:20','2019-11-13 12:55:20'),
	(22,1,'admin/type/gid/product/1','PUT','127.0.0.1','{\"category_id\":\"7\",\"labels\":[\"hot\",null],\"name_en\":\"Omer Beatty\",\"desc_en\":\"Ut sed aut voluptas quisquam vero. Facilis omnis incidunt sequi voluptate sit. Blanditiis quo consectetur dicta quasi. Et rerum rerum perferendis autem reiciendis optio voluptatem.\",\"content_en\":\"<p>Et quis iusto vel neque. Et error quos nostrum voluptas ut deleniti. Qui ad perferendis maxime itaque optio dolorem et. Odio id sed similique repellat sit.<\\/p>\",\"name_vi\":\"Mr. Kenyon Hickle\",\"desc_vi\":\"Quia debitis alias neque aut eos iste. Rerum ex impedit repellendus et ut provident error. Rerum accusamus sunt qui asperiores maiores.\",\"content_vi\":\"<p>Consequatur odio qui explicabo asperiores qui in labore. Dolore possimus eum sit occaecati aut repudiandae eum totam. Eveniet omnis vitae a facere sed tempore fugit qui.<\\/p>\",\"price\":\"113000.00\",\"instock\":\"74\",\"discount\":\"16\",\"tags\":[null],\"_file_sort_\":{\"pictures\":null},\"colors\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",null],\"sizes\":[\"1\",\"2\",\"3\",\"4\",null],\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/type\\/gid\\/product\"}','2019-11-13 12:55:38','2019-11-13 12:55:38'),
	(23,1,'admin/type/gid/product/1','GET','127.0.0.1','[]','2019-11-13 13:20:26','2019-11-13 13:20:26'),
	(24,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:20:31','2019-11-13 13:20:31'),
	(25,1,'admin/type/gid/product/1','PUT','127.0.0.1','{\"category_id\":\"7\",\"labels\":[\"hot\",null],\"name_en\":\"Omer Beatty\",\"desc_en\":\"Ut sed aut voluptas quisquam vero. Facilis omnis incidunt sequi voluptate sit. Blanditiis quo consectetur dicta quasi. Et rerum rerum perferendis autem reiciendis optio voluptatem.\",\"content_en\":\"<p>Et quis iusto vel neque. Et error quos nostrum voluptas ut deleniti. Qui ad perferendis maxime itaque optio dolorem et. Odio id sed similique repellat sit.<\\/p>\",\"name_vi\":\"Mr. Kenyon Hickle\",\"desc_vi\":\"Quia debitis alias neque aut eos iste. Rerum ex impedit repellendus et ut provident error. Rerum accusamus sunt qui asperiores maiores.\",\"content_vi\":\"<p>Consequatur odio qui explicabo asperiores qui in labore. Dolore possimus eum sit occaecati aut repudiandae eum totam. Eveniet omnis vitae a facere sed tempore fugit qui.<\\/p>\",\"price\":\"113000.00\",\"instock\":\"74\",\"discount\":\"16\",\"tags\":[null],\"_file_sort_\":{\"pictures\":null},\"colors\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",null],\"sizes\":[\"1\",\"2\",\"3\",\"4\",null],\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/type\\/gid\\/product\\/1\"}','2019-11-13 13:20:40','2019-11-13 13:20:40'),
	(26,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:25:24','2019-11-13 13:25:24'),
	(27,1,'admin/type/gid/product/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:25:25','2019-11-13 13:25:25'),
	(28,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:25:25','2019-11-13 13:25:25'),
	(29,1,'admin/type/gid/product','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:25:26','2019-11-13 13:25:26'),
	(30,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:25:27','2019-11-13 13:25:27'),
	(31,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 13:25:32','2019-11-13 13:25:32'),
	(32,1,'admin/teams/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:25:35','2019-11-13 13:25:35'),
	(33,1,'admin/teams','POST','127.0.0.1','{\"name\":\"Truong Khuong\",\"position_vi\":\"Manager\",\"position_en\":\"Manager\",\"image\":null,\"image_path\":\"ttt\",\"fb_link\":null,\"tw_link\":null,\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/teams\"}','2019-11-13 13:25:48','2019-11-13 13:25:48'),
	(34,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 13:25:49','2019-11-13 13:25:49'),
	(35,1,'admin/teams/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:25:55','2019-11-13 13:25:55'),
	(36,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 13:27:14','2019-11-13 13:27:14'),
	(37,1,'admin/teams/1','PUT','127.0.0.1','{\"name\":\"Truong Khuong\",\"position_vi\":\"Manager\",\"position_en\":\"Manager\",\"fb_link\":null,\"tw_link\":null,\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/teams\"}','2019-11-13 13:27:27','2019-11-13 13:27:27'),
	(38,1,'admin/teams/1','GET','127.0.0.1','[]','2019-11-13 13:44:48','2019-11-13 13:44:48'),
	(39,1,'admin/teams','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:44:55','2019-11-13 13:44:55'),
	(40,1,'admin/teams/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:45:00','2019-11-13 13:45:00'),
	(41,1,'admin/teams/1','PUT','127.0.0.1','{\"name\":\"Truong Khuong\",\"position_vi\":\"Manager\",\"position_en\":\"Manager\",\"fb_link\":null,\"tw_link\":null,\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/teams\"}','2019-11-13 13:45:24','2019-11-13 13:45:24'),
	(42,1,'admin/teams','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:45:51','2019-11-13 13:45:51'),
	(43,1,'admin/teams/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:45:53','2019-11-13 13:45:53'),
	(44,1,'admin/teams/1','PUT','127.0.0.1','{\"name\":\"Truong Khuong\",\"position_vi\":\"Manager\",\"position_en\":\"Manager\",\"fb_link\":null,\"tw_link\":null,\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/teams\"}','2019-11-13 13:46:00','2019-11-13 13:46:00'),
	(45,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 13:48:00','2019-11-13 13:48:00'),
	(46,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 13:50:54','2019-11-13 13:50:54'),
	(47,1,'admin/teams/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:50:58','2019-11-13 13:50:58'),
	(48,1,'admin/teams/1','PUT','127.0.0.1','{\"name\":\"Truong Khuong\",\"position_vi\":\"Manager\",\"position_en\":\"Manager\",\"fb_link\":null,\"tw_link\":null,\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/teams\"}','2019-11-13 13:51:06','2019-11-13 13:51:06'),
	(49,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 13:51:06','2019-11-13 13:51:06'),
	(50,1,'admin/teams/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:52:45','2019-11-13 13:52:45'),
	(51,1,'admin/teams/1','PUT','127.0.0.1','{\"name\":\"Truong Khuong\",\"position_vi\":\"Manager\",\"position_en\":\"Manager\",\"fb_link\":null,\"tw_link\":null,\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/teams\"}','2019-11-13 13:52:51','2019-11-13 13:52:51'),
	(52,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 13:52:52','2019-11-13 13:52:52'),
	(53,1,'admin/teams/1','PUT','127.0.0.1','{\"name\":\"Truong Khuong\",\"position_vi\":\"Manager\",\"position_en\":\"Manager\",\"fb_link\":null,\"tw_link\":null,\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\"}','2019-11-13 13:53:01','2019-11-13 13:53:01'),
	(54,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 13:53:02','2019-11-13 13:53:02'),
	(55,1,'admin/teams/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:53:23','2019-11-13 13:53:23'),
	(56,1,'admin/teams','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:54:13','2019-11-13 13:54:13'),
	(57,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 13:54:52','2019-11-13 13:54:52'),
	(58,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 13:55:12','2019-11-13 13:55:12'),
	(59,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 13:55:26','2019-11-13 13:55:26'),
	(60,1,'admin/teams/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 13:55:30','2019-11-13 13:55:30'),
	(61,1,'admin/teams/1','PUT','127.0.0.1','{\"name\":\"Truong Khuong\",\"position_vi\":\"Manager\",\"position_en\":\"Manager\",\"fb_link\":null,\"tw_link\":null,\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/teams\"}','2019-11-13 13:55:36','2019-11-13 13:55:36'),
	(62,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 13:55:37','2019-11-13 13:55:37'),
	(63,1,'admin/teams/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 14:09:08','2019-11-13 14:09:08'),
	(64,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 14:29:12','2019-11-13 14:29:12'),
	(65,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 14:29:30','2019-11-13 14:29:30'),
	(66,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 14:32:01','2019-11-13 14:32:01'),
	(67,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 14:34:10','2019-11-13 14:34:10'),
	(68,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 14:38:47','2019-11-13 14:38:47'),
	(69,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 14:56:38','2019-11-13 14:56:38'),
	(70,1,'admin/teams','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 14:57:21','2019-11-13 14:57:21'),
	(71,1,'admin/teams/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 14:57:22','2019-11-13 14:57:22'),
	(72,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 14:57:45','2019-11-13 14:57:45'),
	(73,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 14:59:58','2019-11-13 14:59:58'),
	(74,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:00:16','2019-11-13 15:00:16'),
	(75,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:02:47','2019-11-13 15:02:47'),
	(76,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:03:10','2019-11-13 15:03:10'),
	(77,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:04:45','2019-11-13 15:04:45'),
	(78,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:06:22','2019-11-13 15:06:22'),
	(79,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:14:14','2019-11-13 15:14:14'),
	(80,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:15:06','2019-11-13 15:15:06'),
	(81,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:15:58','2019-11-13 15:15:58'),
	(82,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:16:09','2019-11-13 15:16:09'),
	(83,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:16:43','2019-11-13 15:16:43'),
	(84,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:17:04','2019-11-13 15:17:04'),
	(85,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:17:25','2019-11-13 15:17:25'),
	(86,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:17:33','2019-11-13 15:17:33'),
	(87,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:18:59','2019-11-13 15:18:59'),
	(88,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:19:20','2019-11-13 15:19:20'),
	(89,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:21:52','2019-11-13 15:21:52'),
	(90,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:22:25','2019-11-13 15:22:25'),
	(91,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:22:43','2019-11-13 15:22:43'),
	(92,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:23:59','2019-11-13 15:23:59'),
	(93,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:24:57','2019-11-13 15:24:57'),
	(94,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:26:01','2019-11-13 15:26:01'),
	(95,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:26:46','2019-11-13 15:26:46'),
	(96,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:27:02','2019-11-13 15:27:02'),
	(97,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:29:54','2019-11-13 15:29:54'),
	(98,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:33:31','2019-11-13 15:33:31'),
	(99,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:34:48','2019-11-13 15:34:48'),
	(100,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:36:03','2019-11-13 15:36:03'),
	(101,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:36:47','2019-11-13 15:36:47'),
	(102,1,'admin/teams/1','PUT','127.0.0.1','{\"name\":\"Truong Khuong\",\"position_vi\":\"Manager\",\"position_en\":\"Manager\",\"fb_link\":null,\"tw_link\":null,\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\"}','2019-11-13 15:37:36','2019-11-13 15:37:36'),
	(103,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 15:37:36','2019-11-13 15:37:36'),
	(104,1,'admin/teams/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 15:37:41','2019-11-13 15:37:41'),
	(105,1,'admin/teams/1','PUT','127.0.0.1','{\"name\":\"Truong Khuong\",\"position_vi\":\"Manager\",\"position_en\":\"Manager\",\"image\":null,\"fb_link\":null,\"tw_link\":null,\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/teams\"}','2019-11-13 15:37:51','2019-11-13 15:37:51'),
	(106,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 15:37:52','2019-11-13 15:37:52'),
	(107,1,'admin/teams/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 15:37:54','2019-11-13 15:37:54'),
	(108,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:39:02','2019-11-13 15:39:02'),
	(109,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:40:25','2019-11-13 15:40:25'),
	(110,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:42:03','2019-11-13 15:42:03'),
	(111,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:45:46','2019-11-13 15:45:46'),
	(112,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:46:21','2019-11-13 15:46:21'),
	(113,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:46:51','2019-11-13 15:46:51'),
	(114,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:46:59','2019-11-13 15:46:59'),
	(115,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:47:12','2019-11-13 15:47:12'),
	(116,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:48:50','2019-11-13 15:48:50'),
	(117,1,'admin/teams/1','PUT','127.0.0.1','{\"name\":\"Truong Khuong\",\"position_vi\":\"Manager\",\"position_en\":\"Manager\",\"fb_link\":null,\"tw_link\":null,\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\"}','2019-11-13 15:49:11','2019-11-13 15:49:11'),
	(118,1,'admin/teams','GET','127.0.0.1','[]','2019-11-13 15:49:12','2019-11-13 15:49:12'),
	(119,1,'admin/teams/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 15:49:15','2019-11-13 15:49:15'),
	(120,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:49:57','2019-11-13 15:49:57'),
	(121,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:50:18','2019-11-13 15:50:18'),
	(122,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:50:39','2019-11-13 15:50:39'),
	(123,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:50:53','2019-11-13 15:50:53'),
	(124,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:51:08','2019-11-13 15:51:08'),
	(125,1,'admin/teams/1/edit','GET','127.0.0.1','[]','2019-11-13 15:51:19','2019-11-13 15:51:19'),
	(126,1,'admin/type/gid/product','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 15:55:56','2019-11-13 15:55:56'),
	(127,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 15:55:59','2019-11-13 15:55:59'),
	(128,1,'admin/type/gid/product','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 15:56:11','2019-11-13 15:56:11'),
	(129,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 15:56:15','2019-11-13 15:56:15'),
	(130,1,'admin/type/gid/product/1','PUT','127.0.0.1','{\"category_id\":\"7\",\"labels\":[\"hot\",null],\"name_en\":\"Omer Beatty\",\"desc_en\":\"Ut sed aut voluptas quisquam vero. Facilis omnis incidunt sequi voluptate sit. Blanditiis quo consectetur dicta quasi. Et rerum rerum perferendis autem reiciendis optio voluptatem.\",\"content_en\":\"<p>Et quis iusto vel neque. Et error quos nostrum voluptas ut deleniti. Qui ad perferendis maxime itaque optio dolorem et. Odio id sed similique repellat sit.<\\/p>\",\"name_vi\":\"Mr. Kenyon Hickle\",\"desc_vi\":\"Quia debitis alias neque aut eos iste. Rerum ex impedit repellendus et ut provident error. Rerum accusamus sunt qui asperiores maiores.\",\"content_vi\":\"<p>Consequatur odio qui explicabo asperiores qui in labore. Dolore possimus eum sit occaecati aut repudiandae eum totam. Eveniet omnis vitae a facere sed tempore fugit qui.<\\/p>\",\"price\":\"113000.00\",\"instock\":\"74\",\"discount\":\"16\",\"tags\":[null],\"_file_sort_\":{\"pictures\":null},\"colors\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",null],\"sizes\":[\"1\",\"2\",\"3\",\"4\",null],\"_token\":\"Q22XK1VbNTlawr5VhqENZHttr5Zhra1eatN3V7dd\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/type\\/gid\\/product\"}','2019-11-13 15:56:43','2019-11-13 15:56:43'),
	(131,1,'admin/type/gid/product','GET','127.0.0.1','[]','2019-11-13 15:56:43','2019-11-13 15:56:43'),
	(132,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-13 15:56:46','2019-11-13 15:56:46'),
	(133,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:03:21','2019-11-13 16:03:21'),
	(134,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:04:20','2019-11-13 16:04:20'),
	(135,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:05:32','2019-11-13 16:05:32'),
	(136,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:06:01','2019-11-13 16:06:01'),
	(137,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:15:53','2019-11-13 16:15:53'),
	(138,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:17:03','2019-11-13 16:17:03'),
	(139,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:18:44','2019-11-13 16:18:44'),
	(140,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:23:18','2019-11-13 16:23:18'),
	(141,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:28:06','2019-11-13 16:28:06'),
	(142,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:29:38','2019-11-13 16:29:38'),
	(143,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:30:17','2019-11-13 16:30:17'),
	(144,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:31:00','2019-11-13 16:31:00'),
	(145,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:32:42','2019-11-13 16:32:42'),
	(146,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:35:15','2019-11-13 16:35:15'),
	(147,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','[]','2019-11-13 16:36:39','2019-11-13 16:36:39'),
	(148,1,'admin','GET','127.0.0.1','[]','2019-11-14 11:41:10','2019-11-14 11:41:10'),
	(149,1,'admin/type/gid/product','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-14 11:41:25','2019-11-14 11:41:25'),
	(150,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-14 11:41:28','2019-11-14 11:41:28'),
	(151,1,'admin/type/gid/product/1','PUT','127.0.0.1','{\"category_id\":\"7\",\"labels\":[\"hot\",null],\"name_en\":\"Omer Beatty\",\"desc_en\":\"Ut sed aut voluptas quisquam vero. Facilis omnis incidunt sequi voluptate sit. Blanditiis quo consectetur dicta quasi. Et rerum rerum perferendis autem reiciendis optio voluptatem.\",\"content_en\":\"<p>Et quis iusto vel neque. Et error quos nostrum voluptas ut deleniti. Qui ad perferendis maxime itaque optio dolorem et. Odio id sed similique repellat sit.<\\/p>\",\"name_vi\":\"Mr. Kenyon Hickle\",\"desc_vi\":\"Quia debitis alias neque aut eos iste. Rerum ex impedit repellendus et ut provident error. Rerum accusamus sunt qui asperiores maiores.\",\"content_vi\":\"<p>Consequatur odio qui explicabo asperiores qui in labore. Dolore possimus eum sit occaecati aut repudiandae eum totam. Eveniet omnis vitae a facere sed tempore fugit qui.<\\/p>\",\"price\":\"113000.00\",\"instock\":\"74\",\"discount\":\"16\",\"tags\":[null],\"pictures\":[\"\\/storage\\/images\\/08409f3a89abd86cf56a87b6d889d0f3.jpg\",\"\\/storage\\/images\\/1.jpg\",\"\\/storage\\/images\\/10.jpg\",\"\\/storage\\/images\\/11.jpg\",\"\\/storage\\/images\\/12.jpg\"],\"colors\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",null],\"sizes\":[\"1\",\"2\",\"3\",\"4\",null],\"_token\":\"7pKcZys0g1KKs6DgafU1dBUQbPrNykdWlrs2alp5\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/type\\/gid\\/product\"}','2019-11-14 11:41:47','2019-11-14 11:41:47'),
	(152,1,'admin/type/gid/product','GET','127.0.0.1','[]','2019-11-14 11:41:47','2019-11-14 11:41:47'),
	(153,1,'admin/type/gid/product/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-14 11:41:49','2019-11-14 11:41:49'),
	(154,1,'admin','GET','127.0.0.1','[]','2019-11-15 11:17:05','2019-11-15 11:17:05'),
	(155,1,'admin/coupons','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-15 11:17:15','2019-11-15 11:17:15'),
	(156,1,'admin/coupons/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-15 11:17:20','2019-11-15 11:17:20'),
	(157,1,'admin/coupons','POST','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 11:17:29','2019-11-15 11:17:29'),
	(158,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 11:17:29','2019-11-15 11:17:29'),
	(159,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 11:17:33','2019-11-15 11:17:33'),
	(160,1,'admin','GET','127.0.0.1','[]','2019-11-15 12:09:29','2019-11-15 12:09:29'),
	(161,1,'admin/coupons','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-15 12:09:31','2019-11-15 12:09:31'),
	(162,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 12:09:47','2019-11-15 12:09:47'),
	(163,1,'admin/coupons/4','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\",\"_editable\":\"true\"}','2019-11-15 12:09:56','2019-11-15 12:09:56'),
	(164,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 12:41:06','2019-11-15 12:41:06'),
	(165,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 12:41:10','2019-11-15 12:41:10'),
	(166,1,'admin/coupons/4','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 12:41:14','2019-11-15 12:41:14'),
	(167,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 12:46:30','2019-11-15 12:46:30'),
	(168,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 12:46:34','2019-11-15 12:46:34'),
	(169,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 12:46:37','2019-11-15 12:46:37'),
	(170,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 12:46:37','2019-11-15 12:46:37'),
	(171,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 12:46:43','2019-11-15 12:46:43'),
	(172,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 12:46:43','2019-11-15 12:46:43'),
	(173,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 12:46:53','2019-11-15 12:46:53'),
	(174,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 12:46:53','2019-11-15 12:46:53'),
	(175,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 12:49:00','2019-11-15 12:49:00'),
	(176,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 12:49:00','2019-11-15 12:49:00'),
	(177,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 12:51:14','2019-11-15 12:51:14'),
	(178,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 12:51:15','2019-11-15 12:51:15'),
	(179,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 12:53:54','2019-11-15 12:53:54'),
	(180,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 12:54:23','2019-11-15 12:54:23'),
	(181,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 12:54:37','2019-11-15 12:54:37'),
	(182,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 12:57:50','2019-11-15 12:57:50'),
	(183,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 12:58:49','2019-11-15 12:58:49'),
	(184,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 13:00:06','2019-11-15 13:00:06'),
	(185,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 13:00:29','2019-11-15 13:00:29'),
	(186,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 13:35:44','2019-11-15 13:35:44'),
	(187,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 13:36:59','2019-11-15 13:36:59'),
	(188,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 13:37:02','2019-11-15 13:37:02'),
	(189,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 13:42:22','2019-11-15 13:42:22'),
	(190,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 13:53:01','2019-11-15 13:53:01'),
	(191,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 13:53:06','2019-11-15 13:53:06'),
	(192,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 13:53:55','2019-11-15 13:53:55'),
	(193,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 13:54:01','2019-11-15 13:54:01'),
	(194,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 13:54:46','2019-11-15 13:54:46'),
	(195,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 13:54:51','2019-11-15 13:54:51'),
	(196,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 13:55:52','2019-11-15 13:55:52'),
	(197,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 13:56:02','2019-11-15 13:56:02'),
	(198,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 13:57:09','2019-11-15 13:57:09'),
	(199,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 13:58:45','2019-11-15 13:58:45'),
	(200,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 13:58:49','2019-11-15 13:58:49'),
	(201,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 13:59:27','2019-11-15 13:59:27'),
	(202,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 13:59:32','2019-11-15 13:59:32'),
	(203,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 14:00:14','2019-11-15 14:00:14'),
	(204,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 14:00:19','2019-11-15 14:00:19'),
	(205,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 14:00:41','2019-11-15 14:00:41'),
	(206,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 14:00:45','2019-11-15 14:00:45'),
	(207,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 14:03:27','2019-11-15 14:03:27'),
	(208,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 14:03:31','2019-11-15 14:03:31'),
	(209,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"111111111111\",\"expried\":\"2019-11-15\",\"value\":\"-55\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 14:06:15','2019-11-15 14:06:15'),
	(210,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 14:06:32','2019-11-15 14:06:32'),
	(211,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"-777\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 14:06:43','2019-11-15 14:06:43'),
	(212,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 14:07:07','2019-11-15 14:07:07'),
	(213,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 14:07:14','2019-11-15 14:07:14'),
	(214,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 14:07:16','2019-11-15 14:07:16'),
	(215,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 14:07:17','2019-11-15 14:07:17'),
	(216,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 14:07:18','2019-11-15 14:07:18'),
	(217,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 14:07:18','2019-11-15 14:07:18'),
	(218,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 14:07:18','2019-11-15 14:07:18'),
	(219,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 14:07:25','2019-11-15 14:07:25'),
	(220,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 14:09:18','2019-11-15 14:09:18'),
	(221,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 14:09:21','2019-11-15 14:09:21'),
	(222,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 14:10:05','2019-11-15 14:10:05'),
	(223,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 14:10:05','2019-11-15 14:10:05'),
	(224,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 14:10:22','2019-11-15 14:10:22'),
	(225,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 14:11:13','2019-11-15 14:11:13'),
	(226,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 14:13:47','2019-11-15 14:13:47'),
	(227,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 14:14:16','2019-11-15 14:14:16'),
	(228,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 14:14:20','2019-11-15 14:14:20'),
	(229,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 14:15:51','2019-11-15 14:15:51'),
	(230,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 14:15:54','2019-11-15 14:15:54'),
	(231,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 14:27:05','2019-11-15 14:27:05'),
	(232,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 14:27:08','2019-11-15 14:27:08'),
	(233,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 14:27:11','2019-11-15 14:27:11'),
	(234,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 14:28:08','2019-11-15 14:28:08'),
	(235,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 17:22:29','2019-11-15 17:22:29'),
	(236,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 17:22:32','2019-11-15 17:22:32'),
	(237,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 17:22:51','2019-11-15 17:22:51'),
	(238,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"1rocP2mFrnssehsyfUsR4dLdpiKVv4gkCNQx45S4\"}','2019-11-15 17:24:19','2019-11-15 17:24:19'),
	(239,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 17:24:51','2019-11-15 17:24:51'),
	(240,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"11\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 17:25:03','2019-11-15 17:25:03'),
	(241,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 17:54:49','2019-11-15 17:54:49'),
	(242,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\"}','2019-11-15 17:54:52','2019-11-15 17:54:52'),
	(243,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 17:59:05','2019-11-15 17:59:05'),
	(244,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\"}','2019-11-15 17:59:13','2019-11-15 17:59:13'),
	(245,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 17:59:18','2019-11-15 17:59:18'),
	(246,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\"}','2019-11-15 17:59:24','2019-11-15 17:59:24'),
	(247,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 17:59:46','2019-11-15 17:59:46'),
	(248,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 18:00:21','2019-11-15 18:00:21'),
	(249,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 18:01:06','2019-11-15 18:01:06'),
	(250,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 18:03:25','2019-11-15 18:03:25'),
	(251,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\"}','2019-11-15 18:03:28','2019-11-15 18:03:28'),
	(252,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":null,\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 18:03:43','2019-11-15 18:03:43'),
	(253,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 18:04:45','2019-11-15 18:04:45'),
	(254,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\"}','2019-11-15 18:04:49','2019-11-15 18:04:49'),
	(255,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"0\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 18:04:51','2019-11-15 18:04:51'),
	(256,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\"}','2019-11-15 18:05:05','2019-11-15 18:05:05'),
	(257,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"11\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 18:05:09','2019-11-15 18:05:09'),
	(258,1,'admin/coupons','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-15 18:05:46','2019-11-15 18:05:46'),
	(259,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 18:06:05','2019-11-15 18:06:05'),
	(260,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\"}','2019-11-15 18:06:08','2019-11-15 18:06:08'),
	(261,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"11\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 18:06:10','2019-11-15 18:06:10'),
	(262,1,'admin/coupons','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-15 18:06:10','2019-11-15 18:06:10'),
	(263,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"1111\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 18:06:18','2019-11-15 18:06:18'),
	(264,1,'admin/coupons','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-15 18:06:19','2019-11-15 18:06:19'),
	(265,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 18:06:24','2019-11-15 18:06:24'),
	(266,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\"}','2019-11-15 18:06:28','2019-11-15 18:06:28'),
	(267,1,'admin/coupons','GET','127.0.0.1','[]','2019-11-15 18:07:08','2019-11-15 18:07:08'),
	(268,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\"}','2019-11-15 18:07:12','2019-11-15 18:07:12'),
	(269,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"1111\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 18:07:18','2019-11-15 18:07:18'),
	(270,1,'admin/coupons','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-15 18:07:18','2019-11-15 18:07:18'),
	(271,1,'admin/coupons/1/edit','GET','127.0.0.1','{\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\"}','2019-11-15 18:07:24','2019-11-15 18:07:24'),
	(272,1,'admin/coupons/1','PUT','127.0.0.1','{\"code\":\"F00020191114\",\"expried\":\"2019-11-15\",\"value\":\"1111\",\"type\":\"Complimentary\",\"_token\":\"8r0VzcpYMATfJLTl8PrOjSCA5UXhPGBj4jf3KGe7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/local.foo.com\\/admin\\/coupons\"}','2019-11-15 18:07:37','2019-11-15 18:07:37'),
	(273,1,'admin/coupons','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-15 18:07:38','2019-11-15 18:07:38');

/*!40000 ALTER TABLE `admin_operation_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_permissions`;

CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`),
  UNIQUE KEY `admin_permissions_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`)
VALUES
	(1,'All permission','*','','*',NULL,NULL),
	(2,'Dashboard','dashboard','GET','/',NULL,NULL),
	(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),
	(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),
	(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL);

/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_role_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_role_menu`;

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`)
VALUES
	(1,2,NULL,NULL),
	(2,8,NULL,NULL),
	(2,9,NULL,NULL),
	(2,10,NULL,NULL),
	(2,11,NULL,NULL),
	(2,12,NULL,NULL),
	(2,13,NULL,NULL),
	(2,14,NULL,NULL),
	(2,15,NULL,NULL),
	(2,16,NULL,NULL),
	(2,17,NULL,NULL);

/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_role_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_role_permissions`;

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`)
VALUES
	(1,1,NULL,NULL),
	(2,2,NULL,NULL),
	(2,3,NULL,NULL);

/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_role_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_role_users`;

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1,1,NULL,NULL),
	(2,2,NULL,NULL);

/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_roles`;

CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`),
  UNIQUE KEY `admin_roles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`)
VALUES
	(1,'Administrator','administrator','2019-11-08 10:57:13','2019-11-08 10:57:13'),
	(2,'Content Provider','co','2019-11-09 07:18:16','2019-11-09 07:18:16');

/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_user_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_user_permissions`;

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;

INSERT INTO `admin_user_permissions` (`user_id`, `permission_id`, `created_at`, `updated_at`)
VALUES
	(2,1,NULL,NULL);

/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin','$2y$10$XwPUJlSsbLrn8sghPsLHYepYMm8NX0SdFFBO3.WDVbwwhitWy7DKO','Administrator',NULL,'qzgegGkZ6wOJSMFTK9942a8xeuh4e46v8AhcUnO5OKWajYAKTXG8MAJ69jNv','2019-11-08 10:57:13','2019-11-08 10:57:13'),
	(2,'co','$2y$10$sGk2xOc7BpIdItSBpYZgw.BUfqw3BKd39M.Yp6mISLrEFXp2pBvkm','Content Provider',NULL,'YIhp68uRsLTzmIMy8J4OfVAAZOC14Bw2bXpAbxR2htB1lZHkYmuRja48sZrc','2019-11-09 07:20:17','2019-11-09 07:20:17');

/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table banners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name_vi`, `name_en`, `type`, `parent_id`, `order`, `created_at`, `updated_at`)
VALUES
	(1,'Danh Muc','Categories','gid',0,0,'2019-10-29 15:28:26','2019-10-29 16:40:38'),
	(2,'Van Phong','Office Building','gid',1,0,'2019-10-29 15:32:43','2019-10-29 16:40:55'),
	(3,'Product Design','Thiet ke san pham','gid',0,0,'2019-10-30 12:23:13','2019-10-30 14:52:43'),
	(4,'Coffee House','Coffee House','gid',1,0,'2019-10-30 14:53:21','2019-10-30 14:53:21'),
	(5,'Home Decor','Home Decor','gid',1,0,'2019-10-30 14:53:39','2019-10-30 14:53:39'),
	(6,'Chair Design','Chair Design','gid',3,0,'2019-10-30 14:53:55','2019-10-30 14:53:55'),
	(7,'Table Design','Table Design','gid',3,0,'2019-10-30 14:54:10','2019-10-30 14:54:10'),
	(8,'Set Design','Set Design','gid',3,0,'2019-10-30 14:54:21','2019-10-30 14:54:21');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table colors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `colors`;

CREATE TABLE `colors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;

INSERT INTO `colors` (`id`, `name`, `color`, `created_at`, `updated_at`)
VALUES
	(1,'Red','red',NULL,NULL),
	(2,'Green','green',NULL,NULL),
	(3,'BLue','blue',NULL,NULL),
	(4,'Yellow','yellow',NULL,NULL),
	(5,'Black','black',NULL,NULL),
	(6,'White','white',NULL,NULL);

/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `message` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `topic_id`, `message`, `name`, `email`, `topic_type`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1,19,'ssss','Truong Khuong','khuongxuantruong@gmail.com','post',NULL,'2019-11-15 18:11:12','2019-11-15 18:11:12');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contents`;

CREATE TABLE `contents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_vi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;

INSERT INTO `contents` (`id`, `title_vi`, `title_en`, `content_vi`, `content_en`, `image`, `type`, `created_at`, `updated_at`)
VALUES
	(1,'The standard lorem ipsum passage','The standard lorem ipsum passage','<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur illum qui dolorem.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi malesuada vestibulum. Phasellus tempor nunc eleifend cursus molestie. Mauris lectus arcu.</p>','<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur illum qui dolorem.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi malesuada vestibulum. Phasellus tempor nunc eleifend cursus molestie. Mauris lectus arcu.</p>',NULL,'gid','2019-11-03 12:38:59','2019-11-03 12:38:59');

/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table coupons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expried` date NOT NULL,
  `value` decimal(11,2) NOT NULL DEFAULT '0.00',
  `type` enum('Discount','Complimentary','Cash') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Discount',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;

INSERT INTO `coupons` (`id`, `code`, `expried`, `value`, `type`, `created_at`, `updated_at`)
VALUES
	(1,'F00020191114','2019-11-15',1111.00,'Complimentary','2019-11-15 11:17:29','2019-11-15 18:07:37');

/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(295,'2014_10_12_000000_create_users_table',1),
	(296,'2014_10_12_100000_create_password_resets_table',1),
	(297,'2016_01_04_173148_create_admin_tables',1),
	(298,'2019_08_19_000000_create_failed_jobs_table',1),
	(299,'2019_10_27_161350_create_posts_table',1),
	(300,'2019_10_27_162322_create_comments_table',1),
	(301,'2019_10_28_121218_create_categories_table',1),
	(302,'2019_10_30_080809_create_products_table',1),
	(303,'2019_10_31_131622_create_banners_table',1),
	(304,'2019_11_01_142018_create_colors_table',1),
	(305,'2019_11_01_142032_create_sizes_table',1),
	(306,'2019_11_01_142307_create_product_colors_table',1),
	(307,'2019_11_01_142314_create_product_sizes_table',1),
	(308,'2019_11_03_121725_create_contents_table',1),
	(309,'2019_11_07_163907_create_settings_table',1),
	(310,'2019_11_08_113016_create_orders_table',1),
	(311,'2019_11_08_113107_create_order_details_table',1),
	(312,'2019_11_11_023017_create_teams_table',1),
	(313,'2019_11_13_013705_create_coupons_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) NOT NULL DEFAULT '0.00',
  `price_with_discount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `discount` int(11) DEFAULT NULL,
  `amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode_zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `tax_amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `flat_rate` tinyint(1) NOT NULL DEFAULT '0',
  `ship_amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `discount_amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `total_amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `billing_amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `total_item` int(11) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Requested','Approved','Unpaid','Paid','Shipping','Done','Canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_vi` text COLLATE utf8mb4_unicode_ci,
  `content_en` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `category_id`, `title_vi`, `title_en`, `desc_vi`, `desc_en`, `image`, `tags`, `content_vi`, `content_en`, `created_at`, `updated_at`)
VALUES
	(1,6,'Quia vitae nihil animi error velit.','Dolore illum doloribus voluptate porro fuga voluptas. Nostrum aut amet fugiat aspernatur accusamus.','Ipsa omnis fugiat aliquid itaque dolorem ut fuga dignissimos. Animi amet aut alias exercitationem vero fuga. Facere nihil aut rerum nisi quos.','Ut corporis cumque dolorum sit. Eveniet exercitationem ut aut voluptatem nihil. Illum quam officia impedit quaerat enim cumque. Aut laboriosam enim laboriosam in et nesciunt eum aut.',NULL,NULL,'Et inventore aliquam cum. Occaecati cumque unde quasi iusto numquam at impedit repellendus. Corrupti minus eius ea neque voluptatibus voluptatum occaecati. Quia placeat ducimus esse ad odit.','Cupiditate aut excepturi voluptate est eaque. Fugit quos iure quia. Exercitationem repellat vitae excepturi eligendi facere doloremque. Est rem ut recusandae rerum quis quia odit.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(2,5,'Voluptatem dolor animi aut possimus ducimus eligendi aut.','Quas et quam illo nisi iure delectus. Suscipit animi id accusamus occaecati natus quo.','Et facere autem ipsam eos mollitia non omnis hic. Impedit ullam rerum sequi quaerat delectus placeat. Est dolorem illo voluptatem amet autem cum quidem.','Commodi veritatis autem et ipsa itaque quasi ex ducimus. Sit enim voluptatem ratione similique tempore id. Iure veritatis sint magnam omnis. Non expedita aspernatur et maxime aut quia.',NULL,NULL,'Nobis illum architecto aut modi rerum. Reprehenderit fugiat repellendus dolore est iste eos. Reiciendis cupiditate aliquid quis. Qui nulla aliquid veniam rem ea molestiae. Iure facere et autem. Fugit ipsum ut a dolor incidunt nihil. Enim error ut at officiis.','Aliquam sed mollitia consectetur sequi similique omnis. Quia quia dolore ullam debitis. Est incidunt provident consequatur rerum. At dignissimos aut ut voluptatem. Quis corrupti dolorem laborum atque officia.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(3,4,'Consequatur facere nam rerum rerum.','Et nam et et qui.','Excepturi eaque alias fugit in aut iste rem. Iure magnam consequuntur sint ut iste earum eum. Necessitatibus tempore et aperiam autem labore qui. Iste doloremque consequatur id.','Inventore officia est velit accusamus est aut. Cupiditate est reprehenderit repellendus. Enim molestiae ipsam ab voluptas ad. Facilis aut nihil id minus recusandae autem dolore.',NULL,NULL,'Quia sunt at ex nam. Soluta ipsum iste aut non. Et beatae quisquam sit tempore quisquam doloremque deserunt. Dolores quia cupiditate aliquid debitis consequuntur. Quasi dolore dolor quidem reprehenderit rerum ullam. Saepe illo quisquam rerum pariatur.','Rerum consequatur sapiente commodi enim. Dolorum accusantium qui ut modi et vero ut. Explicabo ipsum quia numquam. Et dignissimos et natus possimus et deleniti dolorem. Enim ut et totam quaerat officiis vitae maxime. Velit dolorem eius quam cumque quo nemo eum.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(4,6,'Dolores qui sed modi neque rem.','Amet est eos earum sed vitae ratione illum qui. Quisquam accusantium qui odit molestias atque facere laboriosam non.','Et animi autem voluptas omnis veritatis dolores doloremque. Recusandae assumenda quasi necessitatibus dolor iure. Impedit sequi dolorum et.','Dolores ex voluptatibus qui adipisci. Nulla iure minima accusantium nobis.',NULL,NULL,'Accusantium porro veniam ipsum est aut non sit. Laborum qui saepe quod placeat consequatur. In omnis atque neque laboriosam voluptas. Accusantium sit molestiae beatae rem impedit molestiae. Doloribus dolorem voluptas qui. Officia et sunt quia aut dolorem numquam. Placeat neque corporis quia labore dolores quis vel modi.','Eaque exercitationem incidunt libero quis. Impedit tenetur harum non est maxime et. Laudantium laudantium non explicabo cumque. Facere aut facilis in aut quia vero dolorem. Culpa voluptatum consequatur illum repudiandae perspiciatis unde. Consequuntur accusamus adipisci blanditiis fugit.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(5,5,'Natus pariatur rerum doloremque illo consequatur et dolorem. Tenetur voluptatem molestiae alias reprehenderit ipsum labore vero.','Nisi adipisci atque harum.','Ea omnis facilis nisi maiores sint ipsa labore. Et eveniet eius dolore. Aut facere similique consequatur facilis aspernatur est non.','Non tenetur id sit voluptatum vero. Molestiae deleniti quis neque ut unde. Eaque deserunt et modi ea maxime aut. Et libero molestiae laudantium.',NULL,NULL,'Magnam et occaecati sed delectus id velit et. Porro harum impedit nostrum enim nisi deserunt. Voluptas voluptas et vel nam aperiam qui. Cumque saepe corporis facere provident veritatis eius. Nulla accusantium labore eos vel adipisci.','Delectus voluptas illum ut rerum voluptatem. Nobis vitae et tempore ipsam sequi. At eos quia aliquam provident. Neque sapiente facilis expedita qui. Nostrum dolores accusamus suscipit officiis. Est sit quia minima molestiae.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(6,1,'Explicabo culpa autem quae non quo.','In sed est non et. Non cum consequuntur exercitationem quo tempora.','Voluptatem facere placeat reprehenderit neque aspernatur placeat. Praesentium voluptas reiciendis illo voluptatum aperiam quaerat. Porro et quos quia amet excepturi ipsum autem.','Dolorum ex sed id officia consequatur. A maiores minima veniam autem. Sequi vitae recusandae nihil molestiae quis voluptatum. Tenetur quisquam et velit enim fugit.',NULL,NULL,'Qui vitae voluptatem consequatur dolores dolor. Quos dicta dolores nostrum earum itaque ea et. Earum dolorum perspiciatis et laudantium quisquam. Aut quia ut sed veniam aliquam eveniet.','Sapiente a rem ipsa quia dolor. Voluptatem magnam aut molestiae quidem sequi unde quas. Quas et expedita iusto sunt animi eos saepe. Maiores at voluptatibus libero nobis similique qui. Fugiat delectus dolores sint maxime eos porro. Quia non odio error qui nobis excepturi. Quod ad non velit impedit.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(7,4,'Debitis non dolorum aliquam.','Aspernatur ducimus sunt ipsum sit voluptas.','Possimus nemo est nobis et sed omnis est. Odio qui dolores neque architecto id totam ipsam. Illo delectus dolorem porro laborum sint unde nihil.','Ratione sint ipsam aperiam rerum in. Dicta quaerat illo magni aut qui aut. Ipsum est qui sit porro explicabo. Nesciunt laborum ipsam occaecati maiores eligendi.',NULL,NULL,'Deserunt corporis enim est perferendis doloribus laboriosam. Est at ducimus illum alias sit ipsa. Beatae et laborum quaerat. Natus doloremque quos quo pariatur quae. Et qui totam dicta quaerat facilis alias. Odio nihil eligendi rerum nihil rerum quia.','Molestiae ut deserunt repudiandae explicabo et ipsum deserunt. Aut harum consequatur magnam et et non. Hic quis qui quam aut aut voluptatem molestiae. Aperiam ullam autem et in doloribus. Officia dolorem sequi nam assumenda voluptatem sapiente. Facilis facere nostrum corrupti explicabo exercitationem culpa mollitia ut. Quasi inventore et ullam in.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(8,3,'Dolore ut beatae ut nostrum ullam quia. Odio commodi voluptatem quae eius natus in facilis earum.','Nulla ut sint esse est rerum laborum. Consequatur sed tempore sit perspiciatis odit hic vel.','Rerum nostrum et officia iusto autem. Et incidunt sint dolores voluptas ipsa a consectetur ut. Aut et corporis aspernatur veritatis. Est ad amet reprehenderit aut repellat et corrupti.','Id deleniti dolorum impedit aut doloribus nulla. Dolorem nemo autem in pariatur quis dolorem. Fugiat fugiat deserunt quibusdam iste est sapiente odio.',NULL,NULL,'Rerum officia accusamus deserunt omnis molestiae. Dignissimos sint et minus quam nemo repudiandae. Delectus molestiae voluptatem porro ea voluptatem sit voluptate nam. Porro esse rerum dolorem.','Autem omnis quo recusandae velit magnam praesentium nulla. Dignissimos adipisci nam et neque aliquid maxime. Eum accusamus perspiciatis aut sint debitis exercitationem rerum. Qui corporis in non quam adipisci ut aut. Sunt quia voluptatem et possimus sed. Cupiditate qui aut accusantium nihil perspiciatis sed.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(9,5,'Provident et consequuntur ut tempora. Quis qui et aut dolore in rem et qui.','Praesentium quia iste vel.','Officia aperiam vel omnis placeat. Adipisci tenetur molestiae et dolores repellendus. Eos animi doloremque nulla excepturi.','Perferendis voluptatem praesentium sit voluptatem et eum rem. Consequatur temporibus maxime quis. Et optio ducimus et illum porro reiciendis.',NULL,NULL,'Ut autem sed quis totam ducimus ut ad ullam. Consequatur quia beatae repellendus. Dignissimos voluptas iusto nulla exercitationem cum ut quia. Impedit aut ipsam neque et libero distinctio inventore. Eos maiores tempora reiciendis delectus nostrum aut. Sed sapiente aspernatur et quasi.','Velit earum veniam fugit unde. Aut eligendi qui nemo vel id ipsum. Nihil id qui est eligendi. Rerum qui quas iusto sit amet blanditiis molestiae. Aut quaerat impedit voluptatibus doloribus et laborum aut. Distinctio ipsam facere illum voluptas.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(10,6,'Nostrum incidunt assumenda enim sit sunt qui. Facere facilis molestiae numquam quis id quae quibusdam impedit.','Rem eaque in pariatur eos hic et maxime voluptas. Voluptas nulla est ut iusto et.','Et impedit eum sint hic qui. Eveniet itaque quam maiores quaerat nihil vero. Molestiae est laudantium cumque ullam et rerum consequuntur. Id quia laboriosam in inventore quia molestiae eius.','Soluta dolor libero cumque. Doloribus non quae pariatur ea. Ut ut exercitationem et. Laborum reprehenderit similique ea consequuntur commodi.',NULL,NULL,'Voluptatem et est error rerum. Aut voluptatum dolor fugit dolorum quibusdam. Illum eaque deleniti aut dolore. Facere quod reiciendis enim similique. Fuga odit sapiente debitis. Eos rerum eligendi assumenda.','Id necessitatibus delectus exercitationem corporis provident. Quas voluptates minus animi ab aliquam aut. Laboriosam doloremque quia reprehenderit aperiam voluptatum hic. Est laudantium facilis libero autem est nulla.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(11,1,'Laboriosam sint voluptates dolores nam consequatur nihil eum. Porro eligendi adipisci iure ipsa tempora alias quae.','Consequatur eligendi molestias inventore.','Quisquam deserunt recusandae laudantium. Nostrum voluptatem ipsam sed cupiditate sed quisquam. Numquam quis voluptatum non soluta totam.','Et inventore consequuntur et aut sint ab. Dolore voluptas enim laboriosam aspernatur labore vero. Sunt est culpa vero ut consequatur.',NULL,NULL,'Dolorem molestiae sit a deserunt accusamus quis. Quod quod consequuntur nisi atque similique sed temporibus assumenda. Deserunt dolore debitis veritatis et rerum. Dolorem voluptatem qui placeat aut et aut. Expedita temporibus adipisci sed eos dolorem. Provident voluptatum excepturi odit ut. Aspernatur voluptatem quia commodi est qui.','Ab laudantium ea modi porro voluptatem. Esse doloribus ut eum rerum. Minima qui fugit placeat aut consequuntur distinctio. Nam fuga voluptas saepe nihil at necessitatibus accusantium. Et amet esse totam minima fugiat vero.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(12,2,'Culpa nihil ducimus dolores repellat voluptas enim neque dolores.','Ipsum enim molestiae est ea quis. Et harum molestias non maxime qui.','Earum sequi qui consequatur magnam. Repellendus eum aliquam mollitia dolores natus. Qui in quae corrupti qui. Aut ex deleniti aut dolore numquam consequatur.','Laboriosam aut sed ducimus optio optio praesentium natus. Dolorem sit vel laborum quos labore aut. Soluta sint quia reprehenderit.',NULL,NULL,'Ea voluptas et et rem dolores. Perspiciatis aut qui maiores assumenda recusandae ullam. Dolore occaecati nam placeat odit vero veniam. Est deserunt sunt dolores reiciendis. Aut tempore officiis repudiandae necessitatibus dolores ut.','Sed consequuntur unde voluptatum et sint. Laudantium facilis ducimus error quis debitis quia aut. Eum et unde ad dolor consequatur ut. Ea ipsa hic consequatur quidem omnis. Tenetur non et explicabo ut quam.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(13,3,'Sapiente omnis dolore debitis et eveniet ipsa.','Eum occaecati possimus ut perferendis.','Vel id cupiditate at aspernatur et sit. Cumque perspiciatis aliquam facere ut est. Voluptatibus impedit ipsam atque quia rerum rerum.','Similique culpa esse soluta voluptates sapiente. Qui qui in similique quibusdam ut. Veritatis omnis aperiam recusandae dolores magni quod debitis rerum.',NULL,NULL,'Quo dicta nesciunt sed nihil ea. Vel repudiandae illo animi voluptatibus minus ab iste. Nesciunt aliquid consequuntur perferendis accusantium. Expedita praesentium voluptates nihil. Harum laudantium voluptatum quasi hic illum asperiores dignissimos. Eos consectetur et suscipit rerum maxime asperiores deleniti. Quam esse fuga unde animi iste natus reprehenderit.','Possimus omnis velit mollitia qui quis. Et quisquam adipisci harum. Repellat eveniet sed quia quidem et atque et. Quasi enim qui voluptatibus.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(14,5,'Non consequuntur illum sit nam iste.','Quo voluptas minima minus harum illo dolor labore.','Et ad cumque cumque unde. Quis autem exercitationem dignissimos id cumque at voluptatem. Veniam ut qui harum necessitatibus quia.','Incidunt ut facere a aperiam totam sunt. Est non culpa architecto et aliquid voluptatem dolorem. Quo non consequuntur a ratione consequuntur dolorem.',NULL,NULL,'Ex excepturi magni rem minus. Corporis sunt laborum soluta ut voluptas nobis nesciunt. Velit cumque itaque perferendis dolorum maiores blanditiis. Quidem non beatae quam earum. Voluptas fugiat non eaque ad.','Sapiente unde eius laboriosam sequi nam sed ratione expedita. Fugit et ut corrupti accusantium. In repellat consequatur iusto accusamus quisquam. Sed quisquam totam et dolorem placeat. Voluptatum dolorem quibusdam aut voluptatem veniam vel vitae. Est ut impedit necessitatibus corporis.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(15,7,'Vel necessitatibus explicabo quo delectus incidunt. Recusandae qui repellat a eius placeat.','Vitae temporibus alias impedit dolor sunt aperiam.','Quis perspiciatis possimus enim. Maiores nam vel rerum facilis sed repudiandae sed.','Beatae quam rerum aut omnis est ullam. Reiciendis aut voluptas velit esse. Autem eum itaque illo. Modi officiis autem repudiandae placeat voluptate.',NULL,NULL,'Autem laboriosam ipsum occaecati voluptatibus officia eos. Exercitationem provident aut vitae praesentium. Sed sequi unde ipsam perspiciatis eos quaerat eveniet ab. Provident vel ut voluptatem et.','Et sed omnis consequatur sunt. Minus qui consequatur dicta voluptate nemo suscipit qui. Sunt ex velit ab blanditiis. Ipsa id dolorum et quibusdam. Omnis iste aut nam officiis quidem. Perspiciatis qui esse voluptates id repellat dolores aliquid. Dolore quasi sunt facere atque.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(16,5,'Illum repellat sapiente voluptas voluptatem quo rerum officia.','Est ratione ut ullam corporis voluptas provident omnis. Sequi soluta velit laborum dignissimos repudiandae rerum.','Ullam consequatur animi placeat dicta natus. Facilis vel quasi ad dignissimos consequatur doloremque corporis.','Aut deserunt rem assumenda laudantium dolorum. Eos cum quas quisquam aut in. Perspiciatis ut unde odio dolores. Eaque est reiciendis non aliquam dolore est.',NULL,NULL,'Porro commodi qui et voluptates dolor error ducimus. Non sequi ut repellendus voluptatem. Quisquam explicabo laudantium quia labore corrupti dolore. Magnam qui velit libero voluptatem quo esse. Et tempora molestiae aut qui magni quae et.','Omnis officiis aut veritatis nobis. Et sit laboriosam sunt debitis sed. Distinctio officiis nihil ab quidem reiciendis. Ipsam sit iure id aliquam cum. Velit voluptas accusantium debitis sunt. Iste est aut assumenda cupiditate omnis maxime id.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(17,6,'Sed est iure est possimus. Illo quo explicabo facere laboriosam eaque qui.','Ducimus deserunt voluptates aspernatur occaecati in nam.','Numquam tenetur omnis non sed ducimus ea quis est. Laudantium qui harum facere natus quia. Dolore suscipit alias cupiditate eum sapiente.','Dolore neque repellat ea voluptas. Aliquam suscipit accusantium ea in voluptas consequatur aut. Quo omnis libero quisquam non illo.',NULL,NULL,'Ut assumenda ut voluptatibus eum voluptas unde. Eligendi explicabo ratione et modi. Fugiat ut impedit nisi sunt quia. Molestias corrupti est unde illo sint. Iure sunt aut ab soluta eum. Animi et ut iure voluptatum quod laboriosam.','Et dolorum ut debitis autem. Neque id voluptatum placeat temporibus voluptatem quibusdam voluptatem suscipit. Voluptas perspiciatis a voluptatem soluta quae sed velit. Et officiis porro voluptatibus et.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(18,7,'Vitae a suscipit sunt totam commodi. Ducimus reiciendis non doloremque at.','Recusandae in repellat consequatur nemo. Et est et aut explicabo consequatur earum iste.','Dolorum animi rerum quo laborum. A et consequuntur ipsam quos tempore. At aliquam harum quam pariatur at. Et ex quam molestiae vitae. Molestiae et itaque natus sed.','Odio accusantium dignissimos suscipit ipsum. Mollitia ut est vitae aperiam distinctio. Tenetur esse et et consectetur pariatur in quae.',NULL,NULL,'Impedit modi id autem sit temporibus laborum architecto. Natus corrupti dolores sed. Adipisci reiciendis quia possimus et. Modi voluptas amet perspiciatis consequuntur inventore aut velit. Nihil hic praesentium exercitationem quia. Corporis facere occaecati accusamus aliquid voluptatem voluptatem.','Rerum veniam accusamus voluptas. Omnis sapiente laborum ipsa consectetur commodi. Omnis ipsa error fugiat doloribus et sed officiis. Porro amet et natus atque explicabo. Nemo doloribus et quam dolorem deserunt qui.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(19,8,'Accusamus fugiat ex excepturi eum ipsum.','Sed dolore ipsa distinctio autem nostrum autem commodi placeat.','Aut quam soluta est voluptas sequi dolorem ipsum. Sequi sed excepturi sint dicta rem enim. Provident est qui illum.','Est reprehenderit cumque rerum molestiae minus perspiciatis. Et facere dolores enim fuga ut. Quas quos eligendi est laboriosam. Consectetur nobis quo eligendi.',NULL,NULL,'Nostrum sequi facilis libero blanditiis amet sit. Ab architecto reprehenderit delectus omnis dolores voluptas ut. Officiis magnam molestias sapiente quod beatae. Omnis blanditiis illum voluptatem sit enim sit laborum.','Eveniet dolores ullam repellendus fugit eligendi. Sint deserunt delectus vel architecto. Et temporibus autem necessitatibus. Eos porro enim laboriosam at laborum nam. Consequatur quas et quia quos non distinctio dolore magnam. Dolore asperiores suscipit quas commodi vitae atque alias. Harum eaque quis aliquid.','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(20,2,'Doloribus rerum porro dicta alias voluptatem voluptas. Nulla autem ea dolorum reprehenderit repellat.','Veniam nesciunt maiores reprehenderit labore et. Consectetur assumenda corrupti occaecati et in totam voluptates.','Delectus nemo numquam ratione asperiores hic enim tenetur. Quia non aut molestiae et et voluptate. Aut at dolores cum qui alias. Qui iste ea modi quas rerum.','Est quis eaque quae numquam hic nihil reprehenderit. Ut quas ut qui velit recusandae. Id sit quas corrupti rerum.',NULL,NULL,'Et non eius et totam reiciendis nostrum repudiandae. Veritatis aliquid et expedita natus. Harum et ut velit quia. Quaerat mollitia porro dolore enim omnis. Non quia minima ullam sint. Et natus dolorem quasi ea facere in harum.','Quo est eveniet qui voluptas praesentium. Suscipit molestias sit consequatur odit. Voluptatem doloremque reprehenderit provident aut laboriosam tempora ut. Fugiat et eaque quia ad est. Autem dolorem fuga autem et sit sed.','2019-11-13 12:02:53','2019-11-13 12:02:53');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_colors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_colors`;

CREATE TABLE `product_colors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_colors` WRITE;
/*!40000 ALTER TABLE `product_colors` DISABLE KEYS */;

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(2,1,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(3,1,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(4,1,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(5,1,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(6,1,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(7,2,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(8,2,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(9,2,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(10,2,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(11,2,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(12,2,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(13,3,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(14,3,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(15,3,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(16,3,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(17,3,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(18,3,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(19,4,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(20,4,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(21,4,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(22,4,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(23,4,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(24,4,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(25,5,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(26,5,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(27,5,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(28,5,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(29,5,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(30,5,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(31,6,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(32,6,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(33,6,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(34,6,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(35,6,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(36,6,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(37,7,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(38,7,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(39,7,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(40,7,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(41,7,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(42,7,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(43,8,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(44,8,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(45,8,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(46,8,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(47,8,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(48,8,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(49,9,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(50,9,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(51,9,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(52,9,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(53,9,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(54,9,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(55,10,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(56,10,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(57,10,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(58,10,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(59,10,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(60,10,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(61,11,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(62,11,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(63,11,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(64,11,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(65,11,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(66,11,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(67,12,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(68,12,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(69,12,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(70,12,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(71,12,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(72,12,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(73,13,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(74,13,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(75,13,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(76,13,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(77,13,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(78,13,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(79,14,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(80,14,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(81,14,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(82,14,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(83,14,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(84,14,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(85,15,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(86,15,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(87,15,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(88,15,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(89,15,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(90,15,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(91,16,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(92,16,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(93,16,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(94,16,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(95,16,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(96,16,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(97,17,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(98,17,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(99,17,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(100,17,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(101,17,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(102,17,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(103,18,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(104,18,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(105,18,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(106,18,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(107,18,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(108,18,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(109,19,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(110,19,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(111,19,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(112,19,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(113,19,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(114,19,6,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(115,20,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(116,20,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(117,20,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(118,20,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(119,20,5,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(120,20,6,'2019-11-13 12:02:53','2019-11-13 12:02:53');

/*!40000 ALTER TABLE `product_colors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_sizes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_sizes`;

CREATE TABLE `product_sizes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_sizes` WRITE;
/*!40000 ALTER TABLE `product_sizes` DISABLE KEYS */;

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(2,1,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(3,1,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(4,1,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(5,2,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(6,2,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(7,2,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(8,2,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(9,3,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(10,3,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(11,3,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(12,3,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(13,4,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(14,4,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(15,4,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(16,4,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(17,5,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(18,5,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(19,5,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(20,5,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(21,6,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(22,6,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(23,6,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(24,6,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(25,7,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(26,7,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(27,7,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(28,7,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(29,8,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(30,8,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(31,8,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(32,8,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(33,9,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(34,9,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(35,9,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(36,9,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(37,10,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(38,10,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(39,10,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(40,10,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(41,11,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(42,11,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(43,11,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(44,11,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(45,12,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(46,12,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(47,12,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(48,12,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(49,13,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(50,13,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(51,13,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(52,13,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(53,14,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(54,14,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(55,14,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(56,14,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(57,15,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(58,15,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(59,15,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(60,15,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(61,16,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(62,16,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(63,16,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(64,16,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(65,17,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(66,17,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(67,17,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(68,17,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(69,18,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(70,18,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(71,18,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(72,18,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(73,19,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(74,19,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(75,19,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(76,19,4,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(77,20,1,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(78,20,2,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(79,20,3,'2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(80,20,4,'2019-11-13 12:02:53','2019-11-13 12:02:53');

/*!40000 ALTER TABLE `product_sizes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(11,2) NOT NULL DEFAULT '0.00',
  `content_vi` text COLLATE utf8mb4_unicode_ci,
  `content_en` text COLLATE utf8mb4_unicode_ci,
  `pictures` text COLLATE utf8mb4_unicode_ci,
  `review_num` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL DEFAULT '0',
  `rating` decimal(2,1) NOT NULL DEFAULT '0.0',
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instock` int(11) NOT NULL DEFAULT '0',
  `sold` int(11) NOT NULL DEFAULT '0',
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labels` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `category_id`, `name_vi`, `name_en`, `desc_vi`, `desc_en`, `image`, `price`, `content_vi`, `content_en`, `pictures`, `review_num`, `discount`, `rating`, `status`, `type`, `instock`, `sold`, `tags`, `label`, `labels`, `created_at`, `updated_at`)
VALUES
	(1,7,'Mr. Kenyon Hickle','Omer Beatty','Quia debitis alias neque aut eos iste. Rerum ex impedit repellendus et ut provident error. Rerum accusamus sunt qui asperiores maiores.','Ut sed aut voluptas quisquam vero. Facilis omnis incidunt sequi voluptate sit. Blanditiis quo consectetur dicta quasi. Et rerum rerum perferendis autem reiciendis optio voluptatem.','/storage/2e77bfc79e0f46b62db180c3e7d16aa6.jpg',113000.00,'<p>Consequatur odio qui explicabo asperiores qui in labore. Dolore possimus eum sit occaecati aut repudiandae eum totam. Eveniet omnis vitae a facere sed tempore fugit qui.</p>','<p>Et quis iusto vel neque. Et error quos nostrum voluptas ut deleniti. Qui ad perferendis maxime itaque optio dolorem et. Odio id sed similique repellat sit.</p>','[\"\\/storage\\/images\\/08409f3a89abd86cf56a87b6d889d0f3.jpg\",\"\\/storage\\/images\\/1.jpg\",\"\\/storage\\/images\\/10.jpg\",\"\\/storage\\/images\\/11.jpg\",\"\\/storage\\/images\\/12.jpg\"]',0,16,0.0,'Active','gid',74,0,'',NULL,'[\"hot\"]','2019-11-13 12:02:53','2019-11-14 11:41:47'),
	(2,5,'Thomas Yundt','Mrs. Margaretta Walker Jr.','Et non et est praesentium voluptatem. Facere esse sequi dolore nesciunt velit. Quo explicabo facere itaque dolor explicabo. Voluptas ipsam nulla id fugiat.','Dolorem eum omnis eius dolorem. Esse delectus id sed sed veritatis. Earum aspernatur et natus officia laboriosam soluta sed. Optio impedit vero et amet officiis in dignissimos.',NULL,175000.00,'Eligendi ea cumque ut et corporis. Eos eum assumenda eius sit odio ullam. Quod laudantium vel minima deleniti ut aperiam enim.','Quam in qui non omnis animi blanditiis. Voluptatem et voluptas rerum illo et suscipit sed sed. Enim quaerat porro sit vel aut tenetur repellat.',NULL,0,48,0.0,'Active','gid',61,0,NULL,NULL,'[\"hot\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(3,3,'Easton Murazik','Donnie Dach','Accusamus rerum autem iste id minima. Voluptas officiis voluptate perferendis sed perspiciatis ducimus. Ratione qui est facere sunt. Quo minus est qui enim.','Omnis blanditiis dolores dolores laboriosam deserunt hic accusamus qui. Id nihil quia perspiciatis reprehenderit debitis quas deserunt. Sit et voluptate ratione quia.',NULL,165000.00,'Placeat aliquam animi quidem beatae ut. Amet facilis id placeat cumque officiis. Architecto repellat molestias quae tenetur doloribus eveniet. Sit facilis eaque fuga quam dicta vitae debitis laboriosam.','Perspiciatis sit aspernatur et voluptas aut qui. Aut ut nihil sit aut totam quo dignissimos. Voluptatum iure omnis iste labore rerum quo. Adipisci enim est commodi numquam.',NULL,0,47,0.0,'Active','gid',14,0,NULL,NULL,'[\"sale\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(4,1,'Alberto Grimes V','Andre Schultz I','Et totam perferendis aliquid molestiae perferendis earum dolorem. Quo illo nostrum voluptatem. Rerum neque aperiam quasi ipsum sed.','Laboriosam voluptatibus autem earum. Pariatur iusto unde sed repellat at ut amet. Aliquam aliquam porro impedit. Est non explicabo possimus enim doloribus rem.',NULL,202000.00,'Eos officiis exercitationem voluptatum. Aut voluptatem corrupti necessitatibus voluptates laudantium deserunt. Voluptas consequatur dolores pariatur impedit voluptatibus aliquam. Iure nemo assumenda eveniet voluptatem.','Sapiente tenetur sit quos alias quam neque. Illo laborum esse quia aut facilis omnis dolore. Sit omnis et sequi eos error aspernatur tempora enim. Animi est voluptatibus rerum tenetur. Velit beatae nihil occaecati reiciendis dolorum repudiandae.',NULL,0,47,0.0,'Active','gid',39,0,NULL,NULL,'[\"hot\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(5,5,'Prof. Vance Walker Jr.','Prof. Amani Runolfsdottir','Officiis est ea rem voluptate. Eaque qui iusto consequatur est id saepe. Est iure nulla ut error perferendis.','Aut aut necessitatibus nam sapiente iste. Enim dolor placeat autem veniam ad. Explicabo deleniti id itaque porro beatae dolores.',NULL,120000.00,'Molestiae nobis rerum impedit sed. Repellendus exercitationem unde voluptas dolores. Aut rem corrupti consectetur quia. Ipsa voluptatem molestiae beatae sapiente vel quia voluptatum.','Numquam suscipit cupiditate quis ut. Ullam quod eius soluta harum in. Deserunt rerum molestiae molestiae sint et qui fuga dolorum. A repellat sed sint.',NULL,0,24,0.0,'Active','gid',35,0,NULL,NULL,'[\"hot\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(6,4,'Geovanni Barrows','Prof. Ayla McCullough','Aut quos quasi voluptates libero maiores et est. Fugit non quae sunt fuga architecto aut voluptatem.','Commodi minus maiores nobis. Voluptas explicabo dolores sed qui sequi ut. Quia animi sit iusto eos suscipit quia eos alias.',NULL,388000.00,'Accusamus omnis ut dolor deserunt cumque. Maxime laborum eos quisquam cumque quia sit. Et et voluptatibus nam atque. Laudantium consequatur odit nihil voluptatibus quidem ut quibusdam.','Sed nam consequuntur est ex quae voluptatem et eos. Accusantium facere soluta et. Enim quisquam dolorem expedita totam voluptate maxime unde. Quis pariatur veritatis qui nihil veniam dolorem est.',NULL,0,8,0.0,'Active','gid',83,0,NULL,NULL,'[\"sale\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(7,4,'Brielle Hill','Chaim Skiles','A vel fugit nisi repudiandae tempore. Dolore possimus doloremque non et non animi. Molestiae et voluptas beatae.','Qui maxime voluptates provident earum dolor ex itaque. Ut non qui dignissimos nesciunt aut. Sunt voluptates dolores impedit ullam quam.',NULL,131000.00,'Temporibus doloribus non et quae autem et. Rerum eum et officiis eos consequatur quod enim. Aut tempore expedita est et culpa quos et.','Dolorum accusamus dolor doloribus asperiores quos odio. Voluptatem facere vel autem dolor vel sequi. Est officiis voluptas consectetur placeat corporis. Ut quia in amet autem.',NULL,0,32,0.0,'Active','gid',68,0,NULL,NULL,'[\"new\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(8,8,'Deontae Kassulke','Garrett Smith II','Nobis reiciendis ut nam quasi qui corporis assumenda. Eligendi nam a ipsa debitis perferendis voluptas sit. Ut quas sed quia molestias eos. Ipsa maxime nemo quos in quia dolorem.','Numquam nisi et eos fuga. Eaque expedita nulla ad neque id ipsam repellat. Cum in perferendis sint qui fugit. Sapiente odio et optio.',NULL,250000.00,'Iure facere ex earum. Odit et aut optio nesciunt fugiat aut exercitationem. Doloribus minus sequi et.','In exercitationem praesentium magni rerum eum est. Ut aperiam iure tenetur et. Voluptas mollitia vitae sit impedit sunt.',NULL,0,22,0.0,'Active','gid',58,0,NULL,NULL,'[\"hot\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(9,1,'Sven Crona','Mr. Dallas Armstrong PhD','Cumque officiis eaque eum et. Sit assumenda accusamus alias vel rerum eum. Dicta itaque rerum ab nihil quia placeat. Debitis inventore omnis qui ab expedita beatae veritatis non.','Qui architecto magnam voluptatibus ipsum. Quo distinctio dolor ea modi fuga quos. Ratione esse possimus modi suscipit. Nemo odio nulla et dicta enim incidunt deleniti.',NULL,118000.00,'Aliquid nisi pariatur blanditiis consequuntur sit in. Minima alias rerum veritatis aut id. Illum enim veritatis culpa dolorum. Quod est aliquid ut atque enim nihil voluptatum.','Nobis ipsa nesciunt totam vitae possimus. Et eveniet autem quisquam aut. Libero aliquam sit reprehenderit itaque fuga tempore dolores.',NULL,0,37,0.0,'Active','gid',8,0,NULL,NULL,'[\"sale\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(10,4,'Alden Ullrich','Arnulfo Stanton','Omnis magni et quod ratione saepe. Rerum molestias sit dolor tempora. Qui est est sed soluta autem suscipit autem. Voluptatum sit libero a quam praesentium.','Distinctio quasi ipsam sapiente quaerat eum molestiae. Ex nemo molestiae deleniti dolorem qui voluptatem. Et aut corrupti alias nihil fugiat.',NULL,306000.00,'Quis necessitatibus earum aut est iusto. Blanditiis voluptatem assumenda rerum officiis officia vitae.','Et sit pariatur assumenda laudantium id doloremque et. Et culpa nisi ea ut eligendi harum fuga asperiores. Qui sapiente aut occaecati rerum distinctio distinctio. Mollitia repellat ut itaque.',NULL,0,13,0.0,'Active','gid',6,0,NULL,NULL,'[\"sale\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(11,4,'Eveline Nicolas','Prof. Mariano Wisozk V','Dolor tenetur molestiae quia voluptas aut blanditiis in modi. Architecto consectetur qui fugiat non fuga. Iusto qui eveniet et sunt eos. Voluptates inventore velit ut.','In eius sit quibusdam sint. Modi occaecati quod molestias. Ipsam deserunt blanditiis nostrum deleniti est.',NULL,413000.00,'Error corrupti quis ipsa ut blanditiis eos aut laboriosam. Non ut sequi natus quo nam. Tenetur fuga dolorum exercitationem ut laudantium nulla.','Similique et omnis aut autem. Et rerum explicabo perferendis voluptatibus aut. Impedit aut quia earum voluptatum quia inventore. Consequatur dolores porro doloremque.',NULL,0,21,0.0,'Active','gid',56,0,NULL,NULL,'[\"new\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(12,4,'Merle Funk','Orin Schiller','Id voluptate autem quis dolores repellat sit. Voluptatem quia rerum cumque ut odit. Ullam ullam veritatis nostrum explicabo blanditiis sit cumque.','Temporibus labore minus saepe rerum quae. Cumque inventore beatae repellendus. Libero et deleniti quod ad deserunt.',NULL,354000.00,'Delectus aut sed velit qui dolores omnis. Non aut quia nisi aliquam eveniet minus id explicabo. Aut esse sit ipsa id.','Repudiandae amet porro suscipit consequuntur. Voluptatem reiciendis aut recusandae quia voluptas rem culpa. Et officiis velit veritatis rerum.',NULL,0,36,0.0,'Active','gid',40,0,NULL,NULL,'[\"hot\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(13,6,'Ava Muller','Mozelle McLaughlin','Sed suscipit nesciunt dolores rerum. Ut aspernatur velit aut nesciunt quam. Et deserunt magni sed omnis magni soluta nam.','Debitis nostrum ea et incidunt eius a cumque. Odio optio magnam tenetur minus. Corporis autem dignissimos asperiores vel necessitatibus et fuga. Temporibus optio sunt quae qui.',NULL,473000.00,'Odio quaerat nesciunt aliquid. Expedita nemo provident aut ex repellat reprehenderit consequuntur. Nemo fuga ad tempora animi. Ab nobis aut et occaecati qui aut cum vel.','Minima iure qui et non voluptatem beatae. Facere voluptatem nostrum voluptas.',NULL,0,50,0.0,'Active','gid',95,0,NULL,NULL,'[\"hot\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(14,5,'Dr. Scottie Huels I','Gwen Kulas','Quisquam quia nihil maiores a dolorum tempora. Qui libero ea quaerat harum explicabo quos adipisci. Quia reprehenderit voluptatem et similique magni.','Deleniti dolores eligendi nesciunt. Quo dolorem accusantium et atque autem. Deleniti consequatur voluptatem occaecati reiciendis.',NULL,417000.00,'Numquam illum sunt debitis et aut maxime unde. Perspiciatis in id odio odio voluptas cupiditate debitis. Nemo vitae distinctio ipsam et aut et rerum pariatur. Eum nobis earum eum.','Non mollitia quia expedita reprehenderit ut. Cupiditate aut asperiores ratione omnis. Aliquid dicta voluptate assumenda quia mollitia.',NULL,0,42,0.0,'Active','gid',99,0,NULL,NULL,'[\"new\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(15,2,'Miss Margarette Rutherford DVM','Mazie Wilderman','Sed corporis ad vero sit maiores aut perferendis. Eos dolor molestias ut unde est expedita vero. Non est qui natus iusto suscipit.','Unde voluptas facilis omnis ullam earum. Ipsa veniam delectus explicabo aut repudiandae rerum harum. Omnis veniam voluptatem architecto et.',NULL,204000.00,'Sunt expedita ut nemo voluptas fugit esse. Occaecati accusantium reiciendis debitis libero laborum et rerum. Voluptate ut temporibus et repudiandae est quia.','Necessitatibus accusamus mollitia maxime voluptatem velit officia laudantium. Sit et vel quos.',NULL,0,42,0.0,'Active','gid',14,0,NULL,NULL,'[\"hot\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(16,8,'Dr. Wilfred Schiller I','Prof. Gavin Donnelly','Debitis vitae ratione molestias. Et adipisci ut accusantium. Voluptas nisi culpa suscipit nam.','Voluptatum perferendis in eum accusantium qui. Nesciunt illum quas est animi nulla. Incidunt repellendus nostrum qui dolores quia.',NULL,211000.00,'Quisquam labore harum omnis aliquam. Cum veritatis itaque dolores autem. Omnis nam harum unde. Maiores totam commodi in dolores perferendis temporibus.','Placeat laborum dolorum nihil sunt et quam impedit. Atque sit pariatur sit. Saepe eligendi quia quis fuga facilis.',NULL,0,10,0.0,'Active','gid',34,0,NULL,NULL,'[\"sale\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(17,6,'Deonte Murazik','Uriel Lakin','Sed autem eligendi quo reprehenderit. Rerum quis et debitis. Esse minima optio enim nihil ut earum harum vitae.','Nobis rerum molestiae voluptas ab. Omnis est suscipit laudantium sunt et. Neque voluptas inventore tempore. Officia sit necessitatibus laboriosam odit et numquam.',NULL,432000.00,'Eveniet quod optio dolorum voluptas quisquam. Quisquam cum perspiciatis aspernatur perspiciatis qui expedita aut. Consequatur possimus expedita et doloremque ea modi id.','Perspiciatis consequuntur optio eos non maxime omnis. Aut nihil reiciendis delectus totam odit sint voluptatem aut. Quae assumenda voluptatibus aut sunt nihil dolores totam. Accusamus est et distinctio. Culpa corrupti ratione totam fuga in inventore.',NULL,0,9,0.0,'Active','gid',38,0,NULL,NULL,'[\"hot\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(18,6,'Bradly Hegmann','Dr. Malachi Reichert','Error voluptate nesciunt sed consequatur minus qui. Doloribus qui commodi maxime nisi id vel. Exercitationem qui magni beatae quos.','Explicabo beatae sed eos illo atque. Minus iure excepturi sint pariatur molestiae. Aut nobis doloribus officia maiores totam quam unde.',NULL,305000.00,'Neque autem dolores eos harum omnis. Error est nobis deserunt vel sed est laudantium. Veritatis qui ea id exercitationem.','Sit rerum et sed dolores velit eos. Velit maiores repudiandae sint accusamus et veritatis dolorem.',NULL,0,21,0.0,'Active','gid',61,0,NULL,NULL,'[\"new\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(19,2,'Iva Schmeler DVM','Carmela Schmeler','Qui ut nemo quia ut. Eum atque possimus amet hic possimus nostrum quia. Animi placeat totam rerum et. Dolorum ad molestias qui debitis. Mollitia corrupti pariatur dicta dolores voluptatem.','Illo facere rerum culpa illo. Ut porro qui saepe eos ea dolor. Fugiat dolores enim culpa occaecati non aliquid labore. Qui id cupiditate voluptas expedita soluta.',NULL,233000.00,'Veritatis harum quidem fuga ut. Quia officia ipsa itaque qui.','Est nostrum quisquam sed illum hic quo assumenda. Qui natus inventore omnis maxime sit. Omnis nemo quia necessitatibus voluptas quis ut tenetur. Quae modi dolores eos a.',NULL,0,29,0.0,'Active','gid',39,0,NULL,NULL,'[\"hot\"]','2019-11-13 12:02:53','2019-11-13 12:02:53'),
	(20,1,'Camilla Bayer','Luisa Stiedemann','Impedit consectetur nostrum quia saepe modi adipisci voluptatem. Exercitationem eum qui porro quam ipsam eaque. Cupiditate inventore soluta dolorum debitis saepe fugit tempore.','Non distinctio sed ut iste quia. Earum sunt distinctio est natus. Ipsa officiis facere accusantium qui et sit.',NULL,398000.00,'Cum adipisci accusamus ea. Id quasi architecto dignissimos rerum dolores sequi molestias cum. Tenetur itaque occaecati tenetur sit non. Repudiandae aut ut et ut molestiae cum.','Quidem reiciendis sunt illum voluptas nobis ea. Dolores omnis non nihil fugit eos error quidem consequuntur. Dicta ipsa aut excepturi ut adipisci praesentium exercitationem.',NULL,0,31,0.0,'Active','gid',60,0,NULL,NULL,'[\"sale\"]','2019-11-13 12:02:53','2019-11-13 12:02:53');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`)
VALUES
	(1,'flat_rate','150000',NULL,NULL),
	(2,'tax','10',NULL,NULL);

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sizes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sizes`;

CREATE TABLE `sizes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sizes` WRITE;
/*!40000 ALTER TABLE `sizes` DISABLE KEYS */;

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'S',NULL,NULL),
	(2,'M',NULL,NULL),
	(3,'L',NULL,NULL),
	(4,'XL',NULL,NULL);

/*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`id`, `name`, `position_vi`, `position_en`, `image`, `fb_link`, `tw_link`, `created_at`, `updated_at`)
VALUES
	(1,'Truong Khuong','Manager','Manager','/storage/41af572e6c0c8769fb55e3040e2b43be.jpg',NULL,NULL,'2019-11-13 13:25:48','2019-11-13 15:49:11');

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
