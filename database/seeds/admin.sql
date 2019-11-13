INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', 'fa-bar-chart', '/', NULL, NULL, NULL),
(2, 0, 2, 'Admin', 'fa-tasks', '', NULL, NULL, NULL),
(3, 2, 3, 'Users', 'fa-users', 'auth/users', NULL, NULL, NULL),
(4, 2, 4, 'Roles', 'fa-user', 'auth/roles', NULL, NULL, NULL),
(5, 2, 5, 'Permission', 'fa-ban', 'auth/permissions', NULL, NULL, NULL),
(6, 2, 6, 'Menu', 'fa-bars', 'auth/menu', NULL, NULL, NULL),
(7, 2, 7, 'Operation log', 'fa-history', 'auth/logs', NULL, NULL, NULL),
(8, 0, 8, 'Slider', 'fa-image', '/type/slider/banners', 'dashboard', '2019-11-09 07:16:44', '2019-11-12 20:22:42'),
(9, 0, 9, 'Banner', 'fa-image', '/type/brand/banners', '*', '2019-11-09 07:35:59', '2019-11-09 07:40:34'),
(10, 0, 12, 'Product', 'fa-tags', '/type/gid/product', '*', '2019-11-09 07:37:32', '2019-11-10 00:39:43'),
(11, 0, 11, 'Category', 'fa-list-ol', '/type/gid/categories', '*', '2019-11-09 07:38:48', '2019-11-10 00:39:43'),
(12, 0, 13, 'Blog', 'fa-newspaper-o', '/type/gid/post', '*', '2019-11-09 07:40:18', '2019-11-10 00:39:43'),
(13, 0, 14, 'Content', 'fa-newspaper-o', '/type/gid/contents', '*', '2019-11-09 07:43:29', '2019-11-10 00:39:43'),
(14, 0, 10, 'Brand', 'fa-image', '/type/brand/banners', '*', '2019-11-10 00:39:30', '2019-11-10 00:39:43'),
(15, 0, 0, 'Orders', 'fa-shopping-cart', '/orders', '*', '2019-11-10 06:36:49', '2019-11-10 06:37:41'),
(16, 0, 0, 'Coupon', 'fa-barcode', '/coupons', '*', '2019-11-12 20:21:08', '2019-11-12 20:21:08'),
(17, 0, 0, 'System Setting', 'fa-cogs', '/setting', '*', '2019-11-12 20:22:03', '2019-11-12 20:22:03');

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, NULL),
(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL);

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2019-11-08 10:57:13', '2019-11-08 10:57:13'),
(2, 'Content Provider', 'co', '2019-11-09 07:18:16', '2019-11-09 07:18:16');

--
-- Dumping data for table `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL),
(2, 8, NULL, NULL),
(2, 9, NULL, NULL),
(2, 10, NULL, NULL),
(2, 11, NULL, NULL),
(2, 12, NULL, NULL),
(2, 13, NULL, NULL),
(2, 14, NULL, NULL),
(2, 15, NULL, NULL),
(2, 16, NULL, NULL),
(2, 17, NULL, NULL);

--
-- Dumping data for table `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(2, 3, NULL, NULL);

--
-- Dumping data for table `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL);

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$XwPUJlSsbLrn8sghPsLHYepYMm8NX0SdFFBO3.WDVbwwhitWy7DKO', 'Administrator', NULL, 'qzgegGkZ6wOJSMFTK9942a8xeuh4e46v8AhcUnO5OKWajYAKTXG8MAJ69jNv', '2019-11-08 10:57:13', '2019-11-08 10:57:13'),
(2, 'co', '$2y$10$sGk2xOc7BpIdItSBpYZgw.BUfqw3BKd39M.Yp6mISLrEFXp2pBvkm', 'Content Provider', NULL, 'YIhp68uRsLTzmIMy8J4OfVAAZOC14Bw2bXpAbxR2htB1lZHkYmuRja48sZrc', '2019-11-09 07:20:17', '2019-11-09 07:20:17');

--
-- Dumping data for table `admin_user_permissions`
--

INSERT INTO `admin_user_permissions` (`user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL);