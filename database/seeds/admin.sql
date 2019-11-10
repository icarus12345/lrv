# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: laravel
# Generation Time: 2019-11-10 13:39:59 +0000
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
	(8,0,8,'Slider','fa-image','/type/slider/banners','dashboard','2019-11-09 14:16:44','2019-11-09 14:40:34'),
	(9,0,9,'Banner','fa-image','/type/brand/banners','*','2019-11-09 14:35:59','2019-11-09 14:40:34'),
	(10,0,12,'Product','fa-tags','/type/gid/product','*','2019-11-09 14:37:32','2019-11-10 07:39:43'),
	(11,0,11,'Category','fa-list-ol','/type/gid/categories','*','2019-11-09 14:38:48','2019-11-10 07:39:43'),
	(12,0,13,'Blog','fa-newspaper-o','/type/gid/post','*','2019-11-09 14:40:18','2019-11-10 07:39:43'),
	(13,0,14,'Content','fa-newspaper-o','/type/gid/contents','*','2019-11-09 14:43:29','2019-11-10 07:39:43'),
	(14,0,10,'Brand','fa-image','/type/brand/banners','*','2019-11-10 07:39:30','2019-11-10 07:39:43'),
	(15,0,0,'Orders','fa-shopping-cart','/orders','*','2019-11-10 13:36:49','2019-11-10 13:37:41');

/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_permissions
# ------------------------------------------------------------

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
	(2,15,NULL,NULL);

/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_role_permissions
# ------------------------------------------------------------

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

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`)
VALUES
	(1,'Administrator','administrator','2019-11-08 17:57:13','2019-11-08 17:57:13'),
	(2,'Content Provider','co','2019-11-09 14:18:16','2019-11-09 14:18:16');

/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_user_permissions
# ------------------------------------------------------------

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;

INSERT INTO `admin_user_permissions` (`user_id`, `permission_id`, `created_at`, `updated_at`)
VALUES
	(2,1,NULL,NULL);

/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_users
# ------------------------------------------------------------

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin','$2y$10$XwPUJlSsbLrn8sghPsLHYepYMm8NX0SdFFBO3.WDVbwwhitWy7DKO','Administrator',NULL,'qzgegGkZ6wOJSMFTK9942a8xeuh4e46v8AhcUnO5OKWajYAKTXG8MAJ69jNv','2019-11-08 17:57:13','2019-11-08 17:57:13'),
	(2,'co','$2y$10$sGk2xOc7BpIdItSBpYZgw.BUfqw3BKd39M.Yp6mISLrEFXp2pBvkm','Content Provider',NULL,'YIhp68uRsLTzmIMy8J4OfVAAZOC14Bw2bXpAbxR2htB1lZHkYmuRja48sZrc','2019-11-09 14:20:17','2019-11-09 14:20:17');

/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_details
# ------------------------------------------------------------

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `price_with_discount`, `discount`, `amount`, `created_at`, `updated_at`)
VALUES
	(10,4,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-08 18:02:42','2019-11-08 18:02:42'),
	(11,4,18,'Red','S',1,323000.00,229330.00,29,229330.00,'2019-11-08 18:02:42','2019-11-08 18:02:42'),
	(12,4,20,'Red','S',1,105000.00,67200.00,36,67200.00,'2019-11-08 18:02:42','2019-11-08 18:02:42'),
	(13,5,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-08 18:04:29','2019-11-08 18:04:29'),
	(14,5,18,'Red','S',1,323000.00,229330.00,29,229330.00,'2019-11-08 18:04:29','2019-11-08 18:04:29'),
	(15,5,20,'Red','S',1,105000.00,67200.00,36,67200.00,'2019-11-08 18:04:29','2019-11-08 18:04:29'),
	(16,6,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-09 02:53:52','2019-11-09 02:53:52'),
	(17,6,18,'Red','S',1,323000.00,229330.00,29,229330.00,'2019-11-09 02:53:52','2019-11-09 02:53:52'),
	(18,6,20,'Red','S',1,105000.00,67200.00,36,67200.00,'2019-11-09 02:53:52','2019-11-09 02:53:52'),
	(19,7,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-09 02:56:15','2019-11-09 02:56:15'),
	(20,7,18,'Red','S',1,323000.00,229330.00,29,229330.00,'2019-11-09 02:56:15','2019-11-09 02:56:15'),
	(21,7,20,'Red','S',1,105000.00,67200.00,36,67200.00,'2019-11-09 02:56:15','2019-11-09 02:56:15'),
	(22,8,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-09 02:56:47','2019-11-09 02:56:47'),
	(23,8,18,'Red','S',1,323000.00,229330.00,29,229330.00,'2019-11-09 02:56:47','2019-11-09 02:56:47'),
	(24,8,20,'Red','S',1,105000.00,67200.00,36,67200.00,'2019-11-09 02:56:47','2019-11-09 02:56:47'),
	(25,9,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-09 03:08:21','2019-11-09 03:08:21'),
	(26,9,18,'Red','S',1,323000.00,229330.00,29,229330.00,'2019-11-09 03:08:21','2019-11-09 03:08:21'),
	(27,9,20,'Red','S',1,105000.00,67200.00,36,67200.00,'2019-11-09 03:08:21','2019-11-09 03:08:21'),
	(28,10,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-09 03:24:50','2019-11-09 03:24:50'),
	(29,11,15,'Red','S',1,377000.00,229970.00,39,229970.00,'2019-11-09 08:48:39','2019-11-09 08:48:39'),
	(30,11,16,'Red','S',2,126000.00,113400.00,10,226800.00,'2019-11-09 08:48:39','2019-11-09 08:48:39'),
	(31,11,12,'Red','S',3,455000.00,423150.00,7,1269450.00,'2019-11-09 08:48:39','2019-11-09 08:48:39'),
	(32,12,20,'Red','S',3,105000.00,67200.00,36,201600.00,'2019-11-09 08:50:17','2019-11-09 08:50:17'),
	(33,12,19,'Red','S',2,487000.00,262980.00,46,525960.00,'2019-11-09 08:50:17','2019-11-09 08:50:17'),
	(34,12,18,'Red','S',1,323000.00,229330.00,29,229330.00,'2019-11-09 08:50:17','2019-11-09 08:50:17'),
	(35,13,16,'Red','S',3,126000.00,113400.00,10,340200.00,'2019-11-09 08:56:09','2019-11-09 08:56:09'),
	(36,13,15,'Red','S',2,377000.00,229970.00,39,459940.00,'2019-11-09 08:56:09','2019-11-09 08:56:09'),
	(37,13,13,'Red','S',1,118000.00,68440.00,42,68440.00,'2019-11-09 08:56:09','2019-11-09 08:56:09'),
	(38,14,18,'Red','S',1,323000.00,229330.00,29,229330.00,'2019-11-10 09:07:17','2019-11-10 09:07:17'),
	(39,15,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-10 09:07:52','2019-11-10 09:07:52'),
	(40,16,18,'Red','S',3,323000.00,229330.00,29,687990.00,'2019-11-10 11:54:31','2019-11-10 11:54:31'),
	(41,16,20,'Red','S',1,105000.00,67200.00,36,67200.00,'2019-11-10 11:54:31','2019-11-10 11:54:31'),
	(42,17,16,'Red','S',1,126000.00,113400.00,10,113400.00,'2019-11-10 11:56:58','2019-11-10 11:56:58'),
	(43,18,18,'Red','S',1,323000.00,229330.00,29,229330.00,'2019-11-10 12:01:38','2019-11-10 12:01:38'),
	(44,19,15,'Red','S',2,377000.00,229970.00,39,459940.00,'2019-11-10 12:03:48','2019-11-10 12:03:48'),
	(45,19,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-10 12:03:48','2019-11-10 12:03:48'),
	(46,19,18,'Red','S',3,323000.00,229330.00,29,687990.00,'2019-11-10 12:03:48','2019-11-10 12:03:48'),
	(47,20,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-10 12:06:15','2019-11-10 12:06:15'),
	(48,20,18,'Red','S',1,323000.00,229330.00,29,229330.00,'2019-11-10 12:06:15','2019-11-10 12:06:15'),
	(49,20,20,'Red','S',1,105000.00,67200.00,36,67200.00,'2019-11-10 12:06:15','2019-11-10 12:06:15'),
	(50,21,20,'Red','S',1,105000.00,67200.00,36,67200.00,'2019-11-10 12:08:01','2019-11-10 12:08:01'),
	(51,21,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-10 12:08:01','2019-11-10 12:08:01'),
	(52,21,18,'Red','S',1,323000.00,229330.00,29,229330.00,'2019-11-10 12:08:01','2019-11-10 12:08:01'),
	(53,21,16,'Red','S',1,126000.00,113400.00,10,113400.00,'2019-11-10 12:08:01','2019-11-10 12:08:01'),
	(54,22,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-10 12:10:05','2019-11-10 12:10:05'),
	(55,23,19,'Red','S',1,487000.00,262980.00,46,262980.00,'2019-11-10 12:13:21','2019-11-10 12:13:21'),
	(56,24,18,'Red','S',1,323000.00,229330.00,29,229330.00,'2019-11-10 12:15:40','2019-11-10 12:15:40');

/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
