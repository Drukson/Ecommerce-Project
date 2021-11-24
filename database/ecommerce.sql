-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 03:25 PM
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
  `id` int(20) UNSIGNED NOT NULL,
  `product_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` float NOT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured_deals` int(11) DEFAULT NULL,
  `special_offers` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `available_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_weight` int(255) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agro_products`
--

INSERT INTO `agro_products` (`id`, `product_unit`, `category_id`, `subcategory_id`, `product_name`, `product_slug`, `product_code`, `product_qty`, `product_tag`, `selling_price`, `discount_price`, `short_desc`, `long_desc`, `product_thumbnail`, `hot_deals`, `featured_deals`, `special_offers`, `special_deals`, `status`, `available_from`, `available_to`, `product_weight`, `seller_id`, `created_at`, `updated_at`) VALUES
(4, NULL, 4, 1, 'Cucumber', 'cucumber', 'asasd', '10', 'vegetables', 200, 180, 'asdasd', '<p>sdasdasdasd</p>', 'uploads/products/thumbnail/1714873847055284.jpg', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-28 08:25:43', '2021-11-04 01:59:40'),
(5, NULL, 4, 1, 'Chilli', 'chilli', 'App1', '10', 'vegetables', 200, 100, 'Sas', '<p>ASasAS</p>', 'uploads/products/thumbnail/1714873934289969.jpg', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-28 08:27:07', '2021-11-04 01:59:48'),
(7, NULL, 4, 4, 'Apple', 'apple', 'zxczxczxc', '8', 'fruits, apple', 250, 180, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 'uploads/products/thumbnail/1714874693222311.jpg', NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-28 08:39:10', '2021-11-17 23:09:07'),
(9, NULL, 4, 1, 'Pea', 'pea', 'pea1', '50', 'Vegetables', 120, NULL, 'Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget.', '<p>asdasdasd</p>', 'uploads/products/thumbnail/1714877316202855.jpg', NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-28 09:20:52', '2021-11-04 09:58:25'),
(10, NULL, 4, 4, 'Pineapple', 'pineapple', 'App1', '18', 'fruits, pineapple', 200, 180, 'asxas', '<p>asxasx</p>', 'uploads/products/thumbnail/1714950961099867.jpg', NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-28 09:22:58', '2021-11-17 22:51:38'),
(13, NULL, 5, 8, 'Wooden Mask', 'wooden-mask', 'Mask1', '20', 'mask', 2500, 2000, 'sdfsdfsdf', '<p>sdfsdfsdfsdfsdf</p>', 'uploads/products/thumbnail/1716564075967090.jpg', NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-11-16 00:11:11', '2021-11-17 23:51:47'),
(14, NULL, 1, NULL, 'Sangay Homestays', 'sangay-homestays', NULL, '4', 'village', 2500, 2000, 'sdfdfsdf', '<p>sdfsdfsdfdsfs</p>', 'uploads/products/thumbnail/1716579328063693.jpg', NULL, NULL, NULL, NULL, 1, '2021-11-17', '2021-11-24', NULL, NULL, '2021-11-16 04:13:37', '2021-11-16 06:10:04'),
(15, NULL, 1, NULL, 'Pema Dema', 'pema-dema', NULL, '2', 'village', 250.7, NULL, 'sdacda', '<p>asdsada</p>', 'uploads/products/thumbnail/1716586907488304.jpg', NULL, 1, NULL, NULL, 1, '2021-11-17', '2021-11-25', NULL, NULL, '2021-11-16 06:14:06', '2021-11-19 03:09:48'),
(16, NULL, 4, 7, 'Cheese', 'cheese', 'Che', '10', 'cheese', 200, NULL, 'Cheese', '<p>Cheese</p>', 'uploads/products/thumbnail/1716848754897221.jpg', NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-11-19 03:36:03', NULL),
(17, 'Kg', 4, NULL, 'Cheese', 'cheese', 'Che', '18', 'cheese', 200, NULL, 'sdasdas', '<p>asdasdasd</p>', 'uploads/products/thumbnail/1716849465518103.jpg', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-11-19 03:47:20', '2021-11-23 02:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Homestay', 'homestay', 'fa fa-home', 'Y', '2021-10-24 23:40:03', '2021-11-17 00:36:28'),
(4, 'Agro Products', 'agro products', 'fa fa-ravelry', 'Y', '2021-10-25 00:05:01', '2021-11-17 00:35:56'),
(5, 'Handicrafts', 'handicrafts', 'fa fa-american-sign-language-interpreting', 'Y', '2021-10-26 22:12:24', '2021-11-17 00:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `dzongkhags`
--

CREATE TABLE `dzongkhags` (
  `id` int(20) UNSIGNED NOT NULL,
  `dzongkhag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dzongkhags`
--

INSERT INTO `dzongkhags` (`id`, `dzongkhag_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Dagana', 'dagana', '2021-11-11 02:19:02', '2021-11-11 02:37:07'),
(3, 'Zhemgang', 'zhemgang', '2021-11-11 02:38:54', NULL),
(4, 'Trashigang', 'trashigang', '2021-11-11 03:30:15', NULL);

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
-- Table structure for table `gewogs`
--

CREATE TABLE `gewogs` (
  `id` int(20) UNSIGNED NOT NULL,
  `dzongkhag_id` int(11) NOT NULL,
  `gewog_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gewogs`
--

INSERT INTO `gewogs` (`id`, `dzongkhag_id`, `gewog_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dorona', 'dorona', '2021-11-11 03:16:06', NULL),
(3, 1, 'Drukjeygang', 'drukjeygang', '2021-11-11 03:26:50', NULL),
(4, 1, 'Gesarling', 'gesarling', '2021-11-11 03:27:03', NULL),
(5, 1, 'Gozhi', 'gozhi', '2021-11-11 03:27:11', NULL),
(6, 1, 'Karna', 'karna', '2021-11-11 03:27:22', NULL),
(7, 1, 'Karmaling', 'karmaling', '2021-11-11 03:27:37', NULL),
(8, 1, 'Khebisa', 'khebisa', '2021-11-11 03:27:47', NULL),
(9, 1, 'Largyab', 'largyab', '2021-11-11 03:28:04', NULL),
(10, 1, 'Lhamoi Dzingkha', 'lhamoi-dzingkha', '2021-11-11 03:28:24', NULL),
(11, 1, 'Nichula', 'nichula', '2021-11-11 03:28:35', NULL),
(12, 1, 'Tashiding', 'tashiding', '2021-11-11 03:28:46', NULL),
(13, 1, 'Tsangkha', 'tsangkha', '2021-11-11 03:28:58', NULL),
(14, 1, 'Tsenda-Gang', 'tsenda-gang', '2021-11-11 03:29:12', NULL),
(15, 1, 'Tseza', 'tseza', '2021-11-11 03:29:21', NULL),
(16, 1, 'Daga-Thromde', 'daga-thromde', '2021-11-11 03:29:33', NULL),
(17, 4, 'Bartsham', 'bartsham', '2021-11-11 03:30:29', NULL),
(18, 4, 'Bidoong', 'bidoong', '2021-11-11 03:30:38', NULL),
(19, 4, 'Kanglung', 'kanglung', '2021-11-11 03:30:45', NULL),
(20, 4, 'Kangpar', 'kangpar', '2021-11-11 03:30:57', NULL),
(21, 4, 'Khaling', 'khaling', '2021-11-11 03:31:05', NULL),
(22, 4, 'Lumang', 'lumang', '2021-11-11 03:31:13', NULL),
(23, 4, 'Merag', 'merag', '2021-11-11 03:31:21', NULL),
(24, 4, 'Phongmed', 'phongmed', '2021-11-11 03:31:35', NULL),
(25, 4, 'Radhi', 'radhi', '2021-11-11 03:31:42', NULL),
(26, 4, 'Sagteng', 'sagteng', '2021-11-11 03:32:06', NULL),
(27, 4, 'Samkhar', 'samkhar', '2021-11-11 03:32:13', NULL),
(28, 4, 'Shongphu', 'shongphu', '2021-11-11 03:32:21', NULL),
(29, 4, 'Thrimsing', 'thrimsing', '2021-11-11 03:32:31', NULL),
(30, 4, 'Udzorong', 'udzorong', '2021-11-11 03:32:43', NULL),
(31, 4, 'Yangnyer', 'yangnyer', '2021-11-11 03:32:53', NULL),
(32, 3, 'Bardo', 'bardo', '2021-11-11 03:33:40', NULL),
(33, 3, 'Bjoka', 'bjoka', '2021-11-11 03:33:50', NULL),
(34, 3, 'Goshing', 'goshing', '2021-11-11 03:34:02', NULL),
(35, 3, 'Nangkor', 'nangkor', '2021-11-11 03:34:19', NULL),
(36, 3, 'Ngangla', 'ngangla', '2021-11-11 03:34:33', NULL),
(37, 3, 'Phangkhar', 'phangkhar', '2021-11-11 03:34:43', NULL),
(38, 3, 'Shingkhar', 'shingkhar', '2021-11-11 03:35:13', NULL),
(39, 3, 'Trong', 'trong', '2021-11-11 03:35:18', NULL),
(40, 3, 'Zhemgang-Thromde', 'zhemgang-thromde', '2021-11-11 03:35:30', NULL);

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
(22, '2021_11_08_110906_create_wishlists_table', 12),
(23, '2021_11_11_075748_create_dzongkhags_table', 13),
(24, '2021_11_11_084049_create_gewogs_table', 14),
(25, '2021_11_11_094718_create_villages_table', 15),
(26, '2021_11_12_052916_create_sellers_table', 16),
(27, '2021_11_12_111745_create_ship_divisions_table', 17),
(28, '2021_11_12_124918_create_ship_districts_table', 18),
(29, '2021_11_13_060941_create_shippings_table', 19),
(30, '2021_11_15_062621_create_orders_table', 20),
(31, '2021_11_15_062656_create_order_items_table', 20),
(32, '2021_11_17_095653_create_site_settings_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` int(20) UNSIGNED NOT NULL,
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
(34, 10, 'uploads/products/multiimage/1714877449230851.jpg', '2021-10-28 09:22:59', NULL),
(42, 13, 'uploads/products/multiimage/1716564076123668.jpg', '2021-11-16 00:11:12', NULL),
(43, 13, 'uploads/products/multiimage/1716564076361158.jpg', '2021-11-16 00:11:12', NULL),
(44, 13, 'uploads/products/multiimage/1716564076550286.jpg', '2021-11-16 00:11:12', NULL),
(45, 13, 'uploads/products/multiimage/1716564076761203.jpg', '2021-11-16 00:11:12', NULL),
(46, 14, 'uploads/products/multiimage/1716579328689822.jpg', '2021-11-16 04:13:38', NULL),
(47, 14, 'uploads/products/multiimage/1716579329297389.jpg', '2021-11-16 04:13:38', NULL),
(48, 14, 'uploads/products/multiimage/1716579329738233.jpg', '2021-11-16 04:13:39', NULL),
(49, 15, 'uploads/products/multiimage/1716586908051707.jpg', '2021-11-16 06:14:06', NULL),
(50, 16, 'uploads/products/multiimage/1716848756375745.jpg', '2021-11-19 03:36:04', NULL),
(51, 16, 'uploads/products/multiimage/1716848756864539.jpg', '2021-11-19 03:36:05', NULL),
(52, 17, 'uploads/products/multiimage/1716849466002502.jpg', '2021-11-19 03:47:21', NULL),
(53, 17, 'uploads/products/multiimage/1716849466584855.jpg', '2021-11-19 03:47:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(20) UNSIGNED NOT NULL,
  `division_id` int(20) UNSIGNED NOT NULL,
  `district_id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `name`, `email`, `phone`, `address`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_order`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6, 'Drukson', 'drukzim@gmail.com', '77364409', 'dsdfsdf', 'card_1Jw1MABc8CCIWLpyNwR7lO20', 'Stripe', 'txn_3Jw1MCBc8CCIWLpy15vmImsn', 'usd', 360.00, '6192264739e5a', 'EOS40973602', '15 November 2021', 'November', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2021-11-15 03:20:09', '2021-11-17 23:09:07'),
(2, 1, 1, 2, 'Drukson', 'drukzim@gmail.com', '77364409', 'B-Home', 'card_1Jw1zvBc8CCIWLpyCx2uFBV5', 'Stripe', 'txn_3Jw1zwBc8CCIWLpy1PdCrDB9', 'usd', 360.00, '61922fe7b3e19', 'EOS40001339', '15 November 2021', 'November', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2021-11-15 04:01:13', '2021-11-17 22:57:32'),
(3, 1, 1, 2, 'Drukson', 'drukzim@gmail.com', '77364409', 'B-Home', 'card_1Jw20eBc8CCIWLpyPqkN6CYo', 'Stripe', 'txn_3Jw20fBc8CCIWLpy0wenl8ts', 'usd', 360.00, '6192301482836', 'EOS79609017', '15 November 2021', 'November', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2021-11-15 04:01:58', '2021-11-17 22:51:38'),
(4, 1, 1, 6, 'Drukson', 'drukzim@gmail.com', '77364409', 'sfdfsdfssdf', 'card_1Jw4NqBc8CCIWLpys36mnykq', 'Stripe', 'txn_3Jw4NsBc8CCIWLpy0la3Npet', 'usd', 720.00, '619253bb0af97', 'EOS85846519', '15 November 2021', 'November', '2021', NULL, NULL, NULL, NULL, NULL, NULL, '17 November 2021', '2', 'Product broke', 'confirm', '2021-11-15 06:34:07', '2021-11-17 05:38:45'),
(5, 1, 1, 5, 'Drukson', 'drukzim@gmail.com', '77364409', 'dasdaasdasdsdasd', 'card_1Jx2fKBc8CCIWLpylQEb1NBZ', 'Stripe', 'txn_3Jx2fMBc8CCIWLpy1xHjCGbV', 'usd', 360.00, '6195dce71ee25', 'EOS97880274', '18 November 2021', 'November', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'pending', '2021-11-17 22:56:09', NULL),
(6, 1, 1, 5, 'Drukson', 'drukzim@gmail.com', '77364409', 'xvcvxcvcv', 'card_1JyuUNBc8CCIWLpywjgmy2bf', 'Stripe', 'txn_3JyuUQBc8CCIWLpy130q6oC6', 'usd', 400.00, '619ca80facc3a', 'EOS22928546', '23 November 2021', 'November', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2021-11-23 02:36:35', '2021-11-23 02:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 7, '2', 180.00, '2021-11-15 03:20:09', NULL),
(2, 3, 10, '2', 180.00, '2021-11-15 04:02:04', NULL),
(3, 4, 10, '4', 180.00, '2021-11-15 06:34:18', NULL),
(4, 5, 10, '2', 180.00, '2021-11-17 22:56:19', NULL),
(5, 6, 17, '2', 200.00, '2021-11-23 02:36:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('drukzim@gmail.com', '$2y$10$cFToaKbmwH1RbdTOURQ2POZH7f7UvwYUDBuxC2ex67sx42wPTYfLC', '2021-11-15 03:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` int(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `comment`, `summary`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 'Good product. I liked it', 'Hello', NULL, '0', '2021-11-17 09:14:29', NULL),
(2, 14, 1, 'zczczca', 'Hello', NULL, '1', '2021-11-17 09:26:43', '2021-11-17 09:43:39'),
(3, 7, 1, 'Nice Apple', 'Hello', 5, '1', '2021-11-18 09:50:06', '2021-11-18 09:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `dzongkhag_id` int(11) NOT NULL,
  `gewog_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `category_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `email`, `phone`, `dzongkhag_id`, `gewog_id`, `village_id`, `category_id`, `password`, `status`, `profile_pic`, `remarks`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'asdasdasd asdasdsa', 'mike@gmail.com', 121212, 1, 1, 3, '4', '$2y$10$3/DgdGGrxHuMfXUeCU3frevW26AYFnPMOhzMshgKpO1IC7TTAVOtO', 0, NULL, 'Helloas asdasdas', NULL, '2021-11-12 01:00:47', NULL),
(2, 'asdasdasd asdasdsa', 'rock@gmail.com', 121212, 1, 1, 4, '1', '$2y$10$onEMXPDbifAMgm/Dj437be5EfOyFEHXRvhgsDu8lCBXgoHt5fjIwe', 0, NULL, NULL, NULL, '2021-11-12 01:04:18', NULL),
(4, 'asdasdasd asdasdsa', 'zamin@gmail.com', 121212, 1, 1, 3, '5', '$2y$10$TyUVTvPH7BoM9gQlrTRtpeVvdhBamXlG7gxnc6r7Wn9EFRSzXQ9AC', 0, NULL, NULL, NULL, '2021-11-12 01:09:54', NULL),
(6, 'Rocky', 'rocky@gmail.com', 1245678, 1, 1, 3, '4', '$2y$10$xusx4DtaeEAzHM9fGisOU.fuJHIdYwGjDDfL8NGdZdgOBzhuP.P7K', 0, NULL, 'dfsdf', NULL, '2021-11-13 06:22:35', NULL),
(7, 'asda', 'mikedd@gmail.com', 121212, 1, 1, 3, '1', '$2y$10$J5S5zQ5Wqx46G2vc/xXkOOtarn4z045cm1w78fuKZw2V3oDJF.cIi', 0, NULL, 'waer', NULL, '2021-11-13 06:37:24', NULL),
(8, 'sdfasdfasdf', 'mike@gmail.com2', 12121222, 1, 1, 3, '11, ', '$2y$10$rsZnPXvNrrA.eBIMqktMeuge80BlqfK71mIrDa0Fi8EHBOb5g0.eK', 0, NULL, 'sdfsdf', NULL, '2021-11-13 06:48:15', NULL),
(10, 'sdfasdf', 'mike@gmail.comss', 12121212, 1, 1, 3, '5, 1, ', '$2y$10$rvNecrBkecEIX3W.6D.OTefHpJN6bkWmQPy1uFDrauftCIjOj9WHu', 0, NULL, 'asd', NULL, '2021-11-13 06:50:25', NULL);

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
('6GtsdGJTA9oZyQ55stVLYYHuX5KQeh3FkuQ70Dcu', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUZFU3F3ZmRzdWxmWm0zaWNRTkhMTTdVN1k1M2dyQ1RNVW82ZUJpOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3QvZWNvbS9wdWJsaWMvc3BvbnNvcnMvdmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1637753945),
('hG3uHnipcVrbRpR69gLFl6DlvBdEnhixu2gxgaYo', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQTk0WFJkQTdxcUVmMENKczFyZ2x2TVV0anJZWlREUEltUmM3S08yUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1637759970),
('jz1m5aKkVJulsqA1NDcSt113X2BMDZxAFO7dwuiF', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWUdRVVRpWm5icUJHbzNYcGthRE9tODN0TmNrSGt4SHJSbml1Q2N0byI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1637759973),
('KGMS3op5uLiaJBtOevpS7lX98zbqG4t9bkNNpZWu', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVnlRY1lHQzV6OTVCRG1qYU9kVkJaWW9nczVPd1FnT3p1MTRvb3NNUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1637759970),
('lIaZMx8IxmS1fMAeOn6rJVpRz5rXvg5qLq2wCtIU', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVY1MG81TDVPWmJrTmplSElPcHVsWklhaGF6bkhFb0d4UmxiTFJrRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3QvZWNvbS9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1637728280),
('vt7UqVELYAssJNG1fnl2DBcE7bV30xfpKG1oqgGA', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVEzS2NCRzcyZDdrRTloWFY4YzhVMVNsOWdnRk5STnE4empiNHM5NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly9sb2NhbGhvc3QvZWNvbS9wdWJsaWMvc3ViY2F0ZWdvcnkvcHJvZHVjdC80L2ZydWl0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1637734577);

-- --------------------------------------------------------

--
-- Table structure for table `ship_districts`
--

CREATE TABLE `ship_districts` (
  `id` int(20) UNSIGNED NOT NULL,
  `division_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, '1', 'Kabisa', '2021-11-12 08:57:07', NULL),
(2, '1', 'Dechencholing', '2021-11-12 08:57:24', NULL),
(3, '1', 'Changteygang', '2021-11-12 08:57:42', NULL),
(4, '1', 'Taba', '2021-11-12 08:57:52', NULL),
(5, '1', 'Hejo', '2021-11-12 08:58:09', NULL),
(6, '1', 'Main Town', '2021-11-12 08:58:32', NULL),
(7, '1', 'Motithang', '2021-11-12 08:58:52', '2021-11-12 09:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `ship_divisions`
--

CREATE TABLE `ship_divisions` (
  `id` int(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_divisions`
--

INSERT INTO `ship_divisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'Thimphu', '2021-11-12 05:45:20', NULL),
(2, 'Phuntsholing', '2021-11-12 05:46:01', NULL),
(3, 'Paro', '2021-11-12 05:46:37', NULL),
(4, 'Punakha', '2021-11-12 05:51:05', NULL),
(5, 'Haa', '2021-11-12 05:51:19', NULL),
(6, 'Wangdue', '2021-11-12 05:51:27', NULL),
(7, 'Dagana', '2021-11-12 05:51:44', NULL),
(8, 'Tsirang', '2021-11-12 05:52:43', NULL),
(9, 'Chukha', '2021-11-12 05:53:01', NULL),
(10, 'Sarpang', '2021-11-12 05:53:11', NULL),
(11, 'Trongsa', '2021-11-12 05:53:16', NULL),
(12, 'Bumthang', '2021-11-12 05:53:25', NULL),
(13, 'Zhemgang', '2021-11-12 05:53:31', NULL),
(14, 'Lhuntse', '2021-11-12 05:53:41', NULL),
(15, 'Mongar', '2021-11-12 05:53:50', NULL),
(16, 'Pema Gatshel', '2021-11-12 05:53:57', NULL),
(17, 'Trashiyangtse', '2021-11-12 05:54:14', NULL),
(18, 'Trashigang', '2021-11-12 05:54:20', NULL),
(19, 'Samdrup Jongkhar', '2021-11-12 05:54:34', NULL),
(20, 'Samtse', '2021-11-12 05:54:45', '2021-11-12 06:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `twitter`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'uploads/logo/1716670278016673.png', '+975 – 02-338089', '+975 – 02-338089', 'shine@grat.at', 'Shine', 'SHINE Project Office Above Memorial Chorten Chorten Lam, Thimphu, Bhutan', 'https://www.facebook.com/profile.php?id=100068372110012', 'https://twitter.com/SHINEProject3', 'https://www.facebook.com/profile.php?id=100068372110012', 'https://www.youtube.com/channel/UCCNTFsPeh0FYCPiTi4AHr5Q/featured', NULL, '2021-11-17 04:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(20) UNSIGNED NOT NULL,
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
  `id` int(20) UNSIGNED NOT NULL,
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
  `id` int(20) UNSIGNED NOT NULL,
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
(1, 'Drukson', 'drukzim@gmail.com', '77364409', NULL, '$2y$10$MVX.C87cVx8FKSIZlAbhqeQ0ZA6O3HzzXPZbtGRO70AcPxsaDA4Am', NULL, NULL, NULL, NULL, '202111151103pea4.jpg', '2021-10-19 09:21:45', '2021-11-15 05:03:55'),
(2, 'Rocky', 'rocky@gmail.com', NULL, NULL, '$2y$10$MVX.C87cVx8FKSIZlAbhqeQ0ZA6O3HzzXPZbtGRO70AcPxsaDA4Am', NULL, NULL, NULL, NULL, NULL, '2021-10-20 04:41:31', '2021-10-20 04:41:31'),
(3, 'Kinley Yangden', 'zamin@gmail.com', '77446960', NULL, '$2y$10$Rf5qlhrZcEGrzOIioJ26FOkNLiwqs5y5cPn7G86cfHzdW3uIxp6DG', NULL, NULL, 'TdLj93eSz95wS0uC7xtxENYaWBrFdATn9518iMohbRiGz8ReudZleOoZOslZ', NULL, '202110220626user-profile.png', '2021-10-21 09:53:28', '2021-10-22 00:26:14'),
(5, 'Jigme Lhaden', 'jigme@gmail.com', '77446960', NULL, '$2y$10$eEI5aFHiTen225czdVQKvuvt9bBW7CRlp1m0zx6EZaNvnTppe73Ty', NULL, NULL, NULL, NULL, '202110220709jigme.png', '2021-10-22 01:08:09', '2021-10-22 02:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` int(20) UNSIGNED NOT NULL,
  `dzongkhag_id` int(11) NOT NULL,
  `gewog_id` int(11) NOT NULL,
  `village_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`id`, `dzongkhag_id`, `gewog_id`, `village_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Dorona Village', 'dorona-village', '2021-11-11 04:50:25', NULL),
(3, 1, 1, 'Dorona Village1', 'dorona-village1', '2021-11-12 00:33:12', NULL),
(4, 1, 1, 'Dorona Village2', 'dorona-village2', '2021-11-12 00:33:18', NULL),
(5, 1, 16, 'Daga1', 'daga1', '2021-11-13 02:30:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(20) UNSIGNED NOT NULL,
  `user_id` int(20) UNSIGNED NOT NULL,
  `product_id` int(20) UNSIGNED NOT NULL,
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
-- Indexes for table `dzongkhags`
--
ALTER TABLE `dzongkhags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gewogs`
--
ALTER TABLE `gewogs`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_email_unique` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ship_districts`
--
ALTER TABLE `ship_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dzongkhags`
--
ALTER TABLE `dzongkhags`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gewogs`
--
ALTER TABLE `gewogs`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ship_districts`
--
ALTER TABLE `ship_districts`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
