-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 04:32 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Drukson', 'admin@gmail.com', '2021-10-19 10:21:11', '$2y$10$Q5N6NY4zQi9BB5v4GKiInu327yfvPKcmBWTacsuZQf7Qjbv29.P.u', '9wadQNQgW1ehCzGPnuk5RcGhnynPGOcA2x1FXchG7UPVkDNOINsU7MI3U9xa', NULL, '202110210912no_image.png', '2021-10-19 10:21:11', '2021-10-21 06:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `agro_products`
--

CREATE TABLE `agro_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` int(11) NOT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured_deals` int(11) DEFAULT NULL,
  `special_offers` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agro_products`
--

INSERT INTO `agro_products` (`id`, `category_id`, `subcategory_id`, `product_name`, `product_slug`, `product_code`, `product_qty`, `product_tag`, `selling_price`, `discount_price`, `short_desc`, `long_desc`, `product_thumbnail`, `hot_deals`, `featured_deals`, `special_offers`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(4, 4, 1, 'Cucumber', 'cucumber', 'asasd', '10', 'vegetables', 200, 180, 'asdasd', '<p>sdasdasdasd</p>', 'uploads/products/thumbnail/1714873847055284.jpg', NULL, NULL, NULL, NULL, 1, '2021-10-28 08:25:43', '2021-11-04 01:59:40'),
(5, 4, 1, 'Chilli', 'chilli', 'App1', '10', 'vegetables', 200, 100, 'Sas', '<p>ASasAS</p>', 'uploads/products/thumbnail/1714873934289969.jpg', NULL, NULL, NULL, NULL, 1, '2021-10-28 08:27:07', '2021-11-04 01:59:48'),
(7, 4, 4, 'Apple', 'apple', 'zxczxczxc', '10', 'fruits, apple', 250, 180, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 'uploads/products/thumbnail/1714874693222311.jpg', NULL, 1, NULL, NULL, 1, '2021-10-28 08:39:10', '2021-11-04 22:34:18'),
(9, 4, 1, 'Pea', 'pea', 'pea1', '50', 'Vegetables', 120, NULL, 'Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget.', '<p>asdasdasd</p>', 'uploads/products/thumbnail/1714877316202855.jpg', NULL, 1, NULL, NULL, 1, '2021-10-28 09:20:52', '2021-11-04 09:58:25'),
(10, 4, 4, 'Pineapple', 'pineapple', 'App1', '20', 'fruits, pineapple', 200, 180, 'asxas', '<p>asxasx</p>', 'uploads/products/thumbnail/1714950961099867.jpg', NULL, 1, NULL, NULL, 1, '2021-10-28 09:22:58', '2021-11-05 08:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Homestay', 'homestay', 'fa fa-home', '2021-10-24 23:40:03', NULL),
(4, 'Agro Products', 'agro products', 'fa fa-ravelry', '2021-10-25 00:05:01', NULL),
(5, 'Handicrafts', 'handicrafts', 'fa fa-american-sign-language-interpreting', '2021-10-26 22:12:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `handicrafts`
--

CREATE TABLE `handicrafts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `handicraft_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handicraft_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handicraft_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handicraft_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handicraft_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` int(11) NOT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `handicraft_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `handicrafts`
--

INSERT INTO `handicrafts` (`id`, `category_id`, `subcategory_id`, `handicraft_name`, `handicraft_slug`, `handicraft_code`, `handicraft_qty`, `handicraft_tag`, `selling_price`, `discount_price`, `short_desc`, `long_desc`, `handicraft_thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(2, 5, 8, 'Dhaba', 'dhaba', 'Dhaba01', '2', 'Handicraft,Wooden Arts', 52000, 2000, 'dasdasd', '<p>asdasdasda</p>', 'uploads/handicraft/thumbnail/1715333573121580.jpg', 1, '2021-11-01 10:31:08', '2021-11-02 10:12:52'),
(3, 5, 8, 'Mask', 'mask', 'Mask01', '2', 'Mask', 5400, 600, 'Handmade Wooden Mask, Handmade Wooden Mask Wholesale, Handmade Handicraft Wooden Mask export', '<p>Handmade Wooden Mask, Handmade Wooden Mask Wholesale, Handmade Handicraft Wooden Mask export</p>', 'uploads/handicraft/thumbnail/1715333554809519.jpg', 1, '2021-11-02 10:12:35', NULL),
(4, 5, 9, 'Kira', 'kira', 'Kira1', '2', 'Kira', 2500, 2000, 'Opening high-end markets for Bhutanese handicrafts (en)', '<p>Opening high-end markets for Bhutanese handicrafts (en)</p>', 'uploads/handicraft/thumbnail/1715395719013526.jpg', 1, '2021-11-03 02:40:40', '2021-11-05 06:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `handicraft_images`
--

CREATE TABLE `handicraft_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `handicraft_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `handicraft_images`
--

INSERT INTO `handicraft_images` (`id`, `handicraft_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/handicraft/multiimage/1715240251363322.jpg', '2021-11-01 09:29:34', NULL),
(3, 1, 'uploads/handicraft/multiimage/1715240251830218.jpg', '2021-11-01 09:29:34', NULL),
(4, 2, 'uploads/handicraft/multiimage/1715244124822387.jpg', '2021-11-01 10:31:08', NULL),
(5, 2, 'uploads/handicraft/multiimage/1715244125092673.jpg', '2021-11-01 10:31:08', NULL),
(6, 2, 'uploads/handicraft/multiimage/1715244125392613.jpg', '2021-11-01 10:31:08', NULL),
(7, 3, 'uploads/handicraft/multiimage/1715333555212316.jpg', '2021-11-02 10:12:35', NULL),
(8, 3, 'uploads/handicraft/multiimage/1715333555622520.jpg', '2021-11-02 10:12:36', NULL),
(9, 4, 'uploads/handicraft/multiimage/1715395719633171.jpg', '2021-11-03 02:40:41', NULL),
(10, 4, 'uploads/handicraft/multiimage/1715395721171395.jpg', '2021-11-03 02:40:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `homestays`
--

CREATE TABLE `homestays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `available_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `homestay_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `homestay_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homestays`
--

INSERT INTO `homestays` (`id`, `category_id`, `name`, `slug`, `no_of_rooms`, `available_from`, `available_to`, `selling_price`, `discount_price`, `homestay_tag`, `short_desc`, `long_desc`, `homestay_thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(7, 1, 'Pempa Homestay', 'pempa-homestay', 6, '2021-10-07', '2021-10-08', 2500, 2000, 'Homestay', 'I enjoy meeting people from all around the globe and sharing good times with them.', '<p>With our guests, we enjoy talking, exchanging cultures and sometimes partying or eating out.&nbsp;I hope all our guests know more about our culture and like our country even better.</p>\r\n\r\n<h3>Meals</h3>\r\n\r\n<p>Hosts can offer a complimentary light breakfast at their discretion. All other meals, including a full breakfast, might incur an additional cost, if offered. Meals and any additional payment should be arranged directly with your host.</p>\r\n\r\n<h5>INCLUDED IN THE STAY</h5>\r\n\r\n<ul>\r\n	<li>Complimentary Light Breakfast</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Use of Kitchen</li>\r\n</ul>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<h5>AVAILABLE ON REQUEST AT AN EXTRA COST</h5>\r\n\r\n<ul>\r\n	<li>Full Board</li>\r\n</ul>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<h5>DIET TYPE AVAILABLE ON REQUEST</h5>\r\n\r\n<ul>\r\n	<li>Vegetarian</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Vegan</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Lactose Intolerant</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nut Allergies</li>\r\n</ul>\r\n\r\n<ul>\r\n</ul>', 'uploads/homestay/thumbnail/1715153364991097.jpg', 1, '2021-10-31 10:28:33', '2021-11-02 23:37:44'),
(9, 1, 'Gangtey Bhutan', 'gangtey-bhutan', 4, '2021-11-11', '2021-11-19', 1800, 100, 'Homestay', 'Phobjikha Valley Homestay', '<p>zxczxc</p>', 'uploads/homestay/thumbnail/1715231332367648.jpg', 1, '2021-11-01 07:07:48', '2021-11-02 23:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `homestay_images`
--

CREATE TABLE `homestay_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `homestay_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homestay_images`
--

INSERT INTO `homestay_images` (`id`, `homestay_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 5, 'uploads/homestay/multiimage/1715148103957211.jpg', '2021-10-31 09:04:56', NULL),
(3, 5, 'uploads/homestay/multiimage/1715151848199297.jpg', '2021-10-31 09:04:56', '2021-10-31 10:04:26'),
(12, 7, 'uploads/homestay/multiimage/1715153365229296.jpg', '2021-10-31 10:28:33', NULL),
(13, 7, 'uploads/homestay/multiimage/1715153365774992.jpg', '2021-10-31 10:28:34', NULL),
(14, 7, 'uploads/homestay/multiimage/1715153366351125.jpg', '2021-10-31 10:28:34', NULL),
(15, 7, 'uploads/homestay/multiimage/1715153366600257.jpg', '2021-10-31 10:28:34', NULL),
(16, 7, 'uploads/homestay/multiimage/1715153366812273.jpg', '2021-10-31 10:28:35', NULL),
(17, 7, 'uploads/homestay/multiimage/1715153367516479.jpg', '2021-10-31 10:28:35', NULL),
(18, 7, 'uploads/homestay/multiimage/1715153368060571.jpg', '2021-10-31 10:28:36', NULL),
(19, 7, 'uploads/homestay/multiimage/1715153368520346.jpg', '2021-10-31 10:28:36', NULL),
(25, 9, 'uploads/homestay/multiimage/1715231332844815.jpg', '2021-11-01 07:07:49', NULL),
(26, 9, 'uploads/homestay/multiimage/1715231333137213.jpg', '2021-11-01 07:07:49', NULL),
(27, 9, 'uploads/homestay/multiimage/1715231333393222.jpg', '2021-11-01 07:07:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_10_19_145710_create_sessions_table', 1),
(7, '2021_10_19_160702_create_admins_table', 2),
(8, '2021_10_22_114440_create_sponsors_table', 3),
(9, '2021_10_25_051131_create_categories_table', 4),
(10, '2021_10_25_082425_create_sub_categories_table', 5),
(11, '2021_10_25_115816_create_sub_sub_categories_table', 6),
(14, '2021_10_27_045736_create_agro_products_table', 7),
(15, '2021_10_27_064245_create_multi_imgs_table', 7),
(16, '2021_10_29_051604_create_sliders_table', 8),
(18, '2021_10_31_122910_create_homestays_table', 9),
(19, '2021_10_31_124413_create_homestay_images_table', 10),
(20, '2021_11_01_135456_create_handicrafts_table', 11),
(21, '2021_11_01_135928_create_handicraft_images_table', 11),
(22, '2021_11_08_110906_create_wishlists_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(9, 4, 'uploads/products/multiimage/1714873847310614.jpg', '2021-10-28 08:25:44', NULL),
(10, 4, 'uploads/products/multiimage/1714873847506567.jpg', '2021-10-28 08:25:44', NULL),
(11, 4, 'uploads/products/multiimage/1714873847739049.jpg', '2021-10-28 08:25:44', NULL),
(12, 5, 'uploads/products/multiimage/1714873934495100.jpg', '2021-10-28 08:27:07', NULL),
(13, 5, 'uploads/products/multiimage/1714873934684211.jpg', '2021-10-28 08:27:07', NULL),
(14, 5, 'uploads/products/multiimage/1714873934939699.jpg', '2021-10-28 08:27:07', NULL),
(18, 7, 'uploads/products/multiimage/1714874693500186.jpg', '2021-10-28 08:39:11', NULL),
(19, 7, 'uploads/products/multiimage/1714874693694500.jpg', '2021-10-28 08:39:11', NULL),
(20, 7, 'uploads/products/multiimage/1714874693867073.jpg', '2021-10-28 08:39:11', NULL),
(21, 7, 'uploads/products/multiimage/1714874694211552.jpg', '2021-10-28 08:39:12', NULL),
(26, 9, 'uploads/products/multiimage/1714877316562932.jpg', '2021-10-28 09:20:52', NULL),
(27, 9, 'uploads/products/multiimage/1714877316872875.jpg', '2021-10-28 09:20:53', NULL),
(28, 9, 'uploads/products/multiimage/1714877317155562.jpg', '2021-10-28 09:20:53', NULL),
(29, 9, 'uploads/products/multiimage/1714877317422342.jpg', '2021-10-28 09:20:53', NULL),
(30, 9, 'uploads/products/multiimage/1714877318070973.jpg', '2021-10-28 09:20:54', NULL),
(31, 10, 'uploads/products/multiimage/1714877448342232.jpg', '2021-10-28 09:22:58', NULL),
(32, 10, 'uploads/products/multiimage/1714877448611614.jpg', '2021-10-28 09:22:58', NULL),
(33, 10, 'uploads/products/multiimage/1714877448940678.jpg', '2021-10-28 09:22:59', NULL),
(34, 10, 'uploads/products/multiimage/1714877449230851.jpg', '2021-10-28 09:22:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('alHacM7wU89X3BLqot1ix6FOLTeEZLRa7QQ3qxrI', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnJtUnk4OTVnSnlIQkJIYXIwczJOUURXOXJKd0QweXhlUWcwdmFINCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3QvZWNvbS9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1636555113),
('baK7Np6ZJlB7YHFsxGzaI3qP3oBa0dv6ZBDwl0Ez', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibmpqeVBhY2sxWjZpV3E2NDNDZHgzSkJUSXVsU3RTcm1QS21uYldFdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3QvZWNvbS9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1636555113),
('it3F8YlPQFECFIUKs2Dz26Nr0fSwXTbLGgbBGiet', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOVlJT2Y2TElLa0dNcDI2dHdxMXRQNjBseDNLSEVZQUdUUWhzQUxOciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3QvZWNvbS9wdWJsaWMvcHJvZHVjdHMvYWdyby9hbGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJE1WWC5DODdjVng4RktTSVpsQWJocWVRMFpBNk8zSHp6WFBaYnRHUk83MEFjUHhzYURBNEFtIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRNVlguQzg3Y1Z4OEZLU0labEFiaHFlUTBaQTZPM0h6elhQWmJ0R1JPNzBBY1B4c2FEQTRBbSI7czo0OiJjYXJ0IjthOjE6e3M6NzoiZGVmYXVsdCI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjE6e3M6ODoiACoAaXRlbXMiO2E6MTp7czozMjoiOTJiODk4MTU1MjM1MDQxZGExMmY4OTkyZDEzMmNhOGUiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjoxMDp7czo1OiJyb3dJZCI7czozMjoiOTJiODk4MTU1MjM1MDQxZGExMmY4OTkyZDEzMmNhOGUiO3M6MjoiaWQiO3M6MjoiMTAiO3M6MzoicXR5IjtzOjE6IjEiO3M6NDoibmFtZSI7czo5OiJQaW5lYXBwbGUiO3M6NToicHJpY2UiO2Q6MTgwO3M6Njoid2VpZ2h0IjtkOjE7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjE6e3M6ODoiACoAaXRlbXMiO2E6MTp7czo1OiJpbWFnZSI7czo0NzoidXBsb2Fkcy9wcm9kdWN0cy90aHVtYm5haWwvMTcxNDk1MDk2MTA5OTg2Ny5qcGciO319czo3OiJ0YXhSYXRlIjtpOjA7czo0OToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGFzc29jaWF0ZWRNb2RlbCI7TjtzOjQ2OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AZGlzY291bnRSYXRlIjtpOjA7fX19fX0=', 1636557278),
('zJljh5YCvl4jY0NaEWm3z8ikCNhUzEQhp6pARWMN', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHR2cGdRRXJEYTNxWk0xUWxwenZFUjRDTkIwRE80d2FabjRWWkVReSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3QvZWNvbS9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1636555113);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'uploads/slider/1714947006591145.jpg', 'BIG SAES', 'Save up to 49% off', 1, '2021-10-29 00:19:34', '2021-10-29 03:54:13'),
(4, 'uploads/slider/1714947400297764.jpg', 'Hello Bhutan', 'New Collection', 1, '2021-10-29 03:49:03', '2021-10-29 03:54:50'),
(5, 'uploads/slider/1714947815604644.jpg', 'Fresh Organic', 'Contains Folic acid, Vitamin C and Amino acid .Vitamin C acts as a powerful antioxidant and also helps formation of collagen that is responsible for skin and hair health.', 1, '2021-10-29 04:01:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Kinley', 'kinley', 'uploads/sponsor_image/1714334178435054.jigme.png', '2021-10-22 09:27:55', NULL),
(3, 'Jigme Lhaden', 'Jigme Lhaden', 'uploads/sponsor_image/1714334344949385.no_image.png', '2021-10-22 09:30:34', NULL),
(4, 'Homestay', 'homestay', 'uploads/sponsor_image/1714334715826202.Homestay.jpg', '2021-10-22 09:36:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 4, 'Vegetables', 'vegetables', '2021-10-25 03:01:15', '2021-10-29 04:07:03'),
(4, 4, 'Fruits', 'fruits', '2021-10-26 22:14:12', NULL),
(5, 4, 'Forestry products', 'forestry products', '2021-10-29 04:07:51', NULL),
(6, 4, 'Livestock', 'livestock', '2021-10-29 04:08:41', NULL),
(7, 4, 'Dairy', 'dairy', '2021-10-29 04:09:17', NULL),
(8, 5, 'Woodworking', 'woodworking', '2021-11-01 09:12:00', NULL),
(9, 5, 'Weaving', 'weaving', '2021-11-03 02:35:51', NULL),
(10, 5, 'Sewing', 'sewing', '2021-11-03 02:37:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Carrot', 'carrot', '2021-10-25 11:10:44', NULL),
(3, 4, 4, 'Pineapple', 'pineapple', '2021-10-26 22:16:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Drukson', 'drukzim@gmail.com', NULL, NULL, '$2y$10$MVX.C87cVx8FKSIZlAbhqeQ0ZA6O3HzzXPZbtGRO70AcPxsaDA4Am', NULL, NULL, NULL, NULL, NULL, '2021-10-19 09:21:45', '2021-10-19 09:21:45'),
(2, 'Rocky', 'rocky@gmail.com', NULL, NULL, '$2y$10$MVX.C87cVx8FKSIZlAbhqeQ0ZA6O3HzzXPZbtGRO70AcPxsaDA4Am', NULL, NULL, NULL, NULL, NULL, '2021-10-20 04:41:31', '2021-10-20 04:41:31'),
(3, 'Kinley Yangden', 'zamin@gmail.com', '77446960', NULL, '$2y$10$Rf5qlhrZcEGrzOIioJ26FOkNLiwqs5y5cPn7G86cfHzdW3uIxp6DG', NULL, NULL, 'TdLj93eSz95wS0uC7xtxENYaWBrFdATn9518iMohbRiGz8ReudZleOoZOslZ', NULL, '202110220626user-profile.png', '2021-10-21 09:53:28', '2021-10-22 00:26:14'),
(5, 'Jigme Lhaden', 'jigme@gmail.com', '77446960', NULL, '$2y$10$eEI5aFHiTen225czdVQKvuvt9bBW7CRlp1m0zx6EZaNvnTppe73Ty', NULL, NULL, NULL, NULL, '202110220709jigme.png', '2021-10-22 01:08:09', '2021-10-22 02:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(6, 1, 10, '2021-11-08 06:29:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `agro_products`
--
ALTER TABLE `agro_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `handicrafts`
--
ALTER TABLE `handicrafts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `handicraft_images`
--
ALTER TABLE `handicraft_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homestays`
--
ALTER TABLE `homestays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homestay_images`
--
ALTER TABLE `homestay_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agro_products`
--
ALTER TABLE `agro_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `handicrafts`
--
ALTER TABLE `handicrafts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `handicraft_images`
--
ALTER TABLE `handicraft_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `homestays`
--
ALTER TABLE `homestays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `homestay_images`
--
ALTER TABLE `homestay_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
