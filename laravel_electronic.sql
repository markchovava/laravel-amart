-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 02:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_electronic`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_infos`
--

CREATE TABLE `app_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_infos`
--

INSERT INTO `app_infos` (`id`, `user_id`, `name`, `email`, `phone`, `website`, `address`, `whatsapp`, `facebook`, `instagram`, `image`, `created_at`, `updated_at`) VALUES
(4, 1, 'MainOO', 'all', '07822100223', 'lvedesigns.co.zw', 'Address', NULL, NULL, NULL, 'assets/img/logo/logo_87.jpg', '2024-05-09 11:51:05', '2024-05-09 11:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `user_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(2, 1, 'Lenovo', 'assets/img/brand/brand_2024300179.jpg', '2024-04-30 11:39:10', '2024-05-06 11:46:29'),
(3, 1, 'Dell', 'assets/img/brand/brand_20243001345.jpg', '2024-04-30 11:39:47', '2024-05-06 11:47:09'),
(5, 1, 'HP', 'assets/img/brand/brand_20243002204.jpg', '2024-04-30 12:32:15', '2024-05-06 11:47:41'),
(6, 1, 'Dahua', NULL, '2024-05-06 11:48:10', '2024-05-06 11:48:10'),
(7, 1, 'Windows', NULL, '2024-05-06 11:48:27', '2024-05-06 11:48:27'),
(8, 1, 'Quantumpos', NULL, '2024-05-06 11:50:38', '2024-05-06 11:50:38'),
(9, 1, 'Xprinter', NULL, '2024-05-06 13:19:12', '2024-05-06 13:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `cart_session` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `cart_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Monitors', 'monitors', NULL, '2024-05-06 11:34:37', '2024-05-05 11:59:01'),
(2, 1, 'Desktops', 'desktops', NULL, '2024-05-06 11:54:51', '2024-05-06 11:54:51'),
(3, 1, 'Accessories', 'accessories', NULL, '2024-05-06 12:02:40', '2024-05-06 12:02:40'),
(4, 1, 'Printers', 'printers', NULL, '2024-05-06 12:03:03', '2024-05-06 12:03:03'),
(5, 1, 'Batteries', 'batteries', NULL, '2024-05-06 12:03:19', '2024-05-06 12:03:19'),
(6, 1, 'Invertors', 'invertors', NULL, '2024-05-06 12:04:00', '2024-05-06 12:04:00'),
(7, 1, 'Television', 'television', NULL, '2024-05-06 12:04:30', '2024-05-06 12:04:30'),
(8, 1, 'CCTV', 'cctv', NULL, '2024-05-06 12:04:56', '2024-05-06 12:04:56'),
(9, 1, 'Operating System', 'operating-system', NULL, '2024-05-06 12:05:28', '2024-05-06 12:13:57'),
(10, 1, 'Point Of Sale', 'point-of-sale', NULL, '2024-05-06 12:06:01', '2024-05-06 12:15:38'),
(11, 1, 'IT', 'it', NULL, '2024-05-06 12:22:20', '2024-05-06 12:22:20'),
(12, 1, 'Solar', 'solar', NULL, '2024-05-06 12:22:42', '2024-05-06 12:22:42'),
(13, 1, 'Security', 'security', NULL, '2024-05-06 12:23:29', '2024-05-06 12:35:24'),
(15, 1, 'Software', 'software', NULL, '2024-05-06 12:35:02', '2024-05-06 12:35:02'),
(16, 1, 'Gadgets', 'gadgets', NULL, '2024-05-06 12:36:05', '2024-05-06 12:36:05'),
(17, 1, 'Gifts', 'gifts', NULL, '2024-05-06 12:36:24', '2024-05-06 12:36:24'),
(18, 1, 'Top Selling', 'top-selling', NULL, '2024-05-06 16:07:12', '2024-05-06 16:07:12'),
(19, 1, 'Featured', 'featured', NULL, '2024-05-06 16:18:17', '2024-05-06 16:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `user_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(2, 1, '10km Radius', '400', '2024-04-30 14:32:43', '2024-05-10 18:59:12'),
(3, 1, '20km Radius', '600', '2024-04-30 14:33:15', '2024-05-10 19:02:01'),
(4, 1, '30km Radius', '900', '2024-05-10 19:02:34', '2024-05-10 19:02:34'),
(5, 1, 'In-Person', '0', '2024-05-10 19:26:07', '2024-05-10 19:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_orders`
--

CREATE TABLE `delivery_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_orders`
--

INSERT INTO `delivery_orders` (`id`, `user_id`, `order_id`, `fname`, `lname`, `city`, `email`, `phone`, `country`, `address`, `created_at`, `updated_at`) VALUES
(5, 1, 5, 'Admin', 'Admin', 'Harare, Zimbabwe', 'admin@gmail.com', '0772946549', 'Zimbabwe', '88 Piers Road, Borrowdale', '2024-05-14 07:38:13', '2024-05-14 07:38:13'),
(6, 1, 6, 'Mark', 'Chovava', 'Harare', 'markchovava@gmail.com', '0782210021', 'Zimbabwe', '14949  Tynwald South, Harare, Zimbabwe', '2024-05-14 07:40:42', '2024-05-14 07:40:42'),
(7, 1, 7, 'Mark', 'Mark', 'Harare', 'mark@email.com', '676767', 'Zimbabwe', '67 bjhvkjvv', '2024-05-14 08:56:22', '2024-05-14 08:56:22'),
(8, 1, 8, 'Mark', 'Chovava', 'Harare', 'markchovava@gmail.com', '0782210021', 'Zimbabwe', '14949  Tynwald South, Harare, Zimbabwe', '2024-05-14 09:35:10', '2024-05-14 09:35:10'),
(9, 1, 9, 'Mark', 'Mark', 'Harare, Zimbabwe', 'markchovava@gmail.com', '0772946549', 'Zimbabwe', '88 Piers Road, Borrowdale', '2024-05-14 09:42:10', '2024-05-14 09:42:10'),
(10, 1, 10, 'Mark', 'Chovava', 'Harare', 'markchovava@gmail.com', '0782210021', 'Zimbabwe', '14949  Tynwald South, Harare, Zimbabwe', '2024-05-14 09:56:39', '2024-05-14 09:56:39'),
(11, 4, 11, 'Mark', 'Chovava', 'Harare', 'markchovava@gmail.com', '0782210021', 'Zimbabwe', '14949  Tynwald South, Harare, Zimbabwe', '2024-05-15 10:37:30', '2024-05-15 10:37:30'),
(12, 4, 12, 'Mark', 'Chovava', 'Harare', 'markchovava@gmail.com', '0782210021', 'Zimbabwe', '14949  Tynwald South, Harare, Zimbabwe', '2024-05-15 10:38:36', '2024-05-15 10:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_26_194956_create_deliveries_table', 1),
(6, '2024_04_26_195009_create_brands_table', 1),
(9, '2024_04_26_195049_create_app_infos_table', 1),
(10, '2024_04_26_201627_create_product_images_table', 1),
(11, '2024_04_26_202006_create_product_categories_table', 1),
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2024_04_26_195032_create_products_table', 1),
(18, '2024_05_03_143904_create_roles_table', 1),
(19, '2024_04_26_195018_create_categories_table', 2),
(22, '2024_05_07_143610_create_carts_table', 3),
(23, '2024_05_07_143618_create_cart_items_table', 3),
(29, '2024_05_10_113421_create_delivery_orders_table', 4),
(30, '2024_05_10_231509_create_orders_table', 4),
(31, '2024_05_13_100521_create_order_items_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `order_ref` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `products_total` bigint(20) DEFAULT NULL,
  `products_quantity` bigint(20) DEFAULT NULL,
  `delivery_name` varchar(255) DEFAULT NULL,
  `delivery_fee` bigint(20) DEFAULT NULL,
  `order_total` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_ref`, `status`, `message`, `products_total`, `products_quantity`, `delivery_name`, `delivery_fee`, `order_total`, `created_at`, `updated_at`) VALUES
(5, 1, '202405143dGxh', 'Dispatched', 'fydydy', 24000, 4, NULL, 600, 24600, '2024-05-14 07:38:13', '2024-05-14 15:25:27'),
(6, 1, '20240514aQEC6', 'Processing', 'gjhgjh\n', 6500, 1, NULL, 600, 7100, '2024-05-14 07:40:42', '2024-05-14 07:40:42'),
(7, 1, '20240514GtrEL', 'Processing', NULL, 9800, 1, '10km Radius', 400, 10200, '2024-05-14 08:56:22', '2024-05-14 08:56:22'),
(8, 1, '20240514MRdiS', 'Processing', NULL, 4500, 1, '10km Radius', 400, 4900, '2024-05-14 09:35:10', '2024-05-14 09:35:10'),
(9, 1, '202405144Y8FC', 'Delivered', NULL, 58300, 7, '20km Radius', 600, 58900, '2024-05-14 09:42:10', '2024-05-14 14:23:35'),
(10, 1, '20240514wWUVC', 'Dispatched', 'xxxxxxxxxx', 96500, 9, '20km Radius', 600, 97100, '2024-05-14 09:56:38', '2024-05-14 14:23:27'),
(11, 4, '20240515DVPbh', 'Processing', 'ftydtyd', 13000, 2, '10km Radius', 400, 13400, '2024-05-15 10:37:30', '2024-05-15 10:37:30'),
(12, 4, '20240515Czxu3', 'Dispatched', NULL, 13000, 1, '10km Radius', 400, 13400, '2024-05-15 10:38:36', '2024-05-15 10:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `user_id`, `order_id`, `product_id`, `name`, `image`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(9, 1, 5, 27, 'CASH DRAWER TREND TECH', 'assets/img/product/202405086058.jpg', 6500, 3, 19500, '2024-05-14 07:38:13', '2024-05-14 07:38:13'),
(10, 1, 5, 25, 'HP 19INCH MONITOR WIDE', 'assets/img/product/202405073648.jpg', 4500, 1, 4500, '2024-05-14 07:38:13', '2024-05-14 07:38:13'),
(11, 1, 6, 27, 'CASH DRAWER TREND TECH', 'assets/img/product/202405086058.jpg', 6500, 1, 6500, '2024-05-14 07:40:42', '2024-05-14 07:40:42'),
(12, 1, 7, 31, '80MM RECEIPT PRINTER BLUETOOTH PORTABLE WITH INBUILT BATTERY', 'assets/img/product/202405082717.jpg', 9800, 1, 9800, '2024-05-14 08:56:22', '2024-05-14 08:56:22'),
(13, 1, 8, 25, 'HP 19INCH MONITOR WIDE', 'assets/img/product/202405073648.jpg', 4500, 1, 4500, '2024-05-14 09:35:10', '2024-05-14 09:35:10'),
(14, 1, 9, 27, 'CASH DRAWER TREND TECH', 'assets/img/product/202405086058.jpg', 6500, 1, 6500, '2024-05-14 09:42:10', '2024-05-14 09:42:10'),
(15, 1, 9, 31, '80MM RECEIPT PRINTER BLUETOOTH PORTABLE WITH INBUILT BATTERY', 'assets/img/product/202405082717.jpg', 9800, 1, 9800, '2024-05-14 09:42:10', '2024-05-14 09:42:10'),
(16, 1, 9, 26, '1TB PCIe NVMe SSD DRIVES', 'assets/img/product/202405085410.jpg', 11000, 3, 33000, '2024-05-14 09:42:10', '2024-05-14 09:42:10'),
(17, 1, 9, 25, 'HP 19INCH MONITOR WIDE', 'assets/img/product/202405073648.jpg', 4500, 2, 9000, '2024-05-14 09:42:10', '2024-05-14 09:42:10'),
(18, 1, 10, 22, 'LENOVO M92/M72 CORE i5 2ND GEN 8GB RAM 500GB HDD TINY PC CPU ONLY', 'assets/img/product/202405082039.jpg', 13000, 4, 52000, '2024-05-14 09:56:38', '2024-05-14 09:56:38'),
(19, 1, 10, 24, 'LENOVO THINKCENTRE E73 i3 4TH GEN 4GB 128GIG SSD', 'assets/img/product/202405085086.jpg', 11000, 2, 22000, '2024-05-14 09:56:39', '2024-05-14 09:56:39'),
(20, 1, 10, 23, 'DELL OPTIPLEX 780 SFF CORE2DUO 4GIG RAM 128GIG SSD WIN 10 CPU ONLY', 'assets/img/product/202405089304.jpg', 9000, 2, 18000, '2024-05-14 09:56:39', '2024-05-14 09:56:39'),
(21, 1, 10, 25, 'HP 19INCH MONITOR WIDE', 'assets/img/product/202405073648.jpg', 4500, 1, 4500, '2024-05-14 09:56:39', '2024-05-14 09:56:39'),
(22, 4, 11, 27, 'CASH DRAWER TREND TECH', 'assets/img/product/202405086058.jpg', 6500, 2, 13000, '2024-05-15 10:37:30', '2024-05-15 10:37:30'),
(23, 4, 12, 22, 'LENOVO M92/M72 CORE i5 2ND GEN 8GB RAM 500GB HDD TINY PC CPU ONLY', 'assets/img/product/202405082039.jpg', 13000, 1, 13000, '2024-05-15 10:38:36', '2024-05-15 10:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 1, 'mark@email.com', '1adf61fcc5dec77e6e0d510f6467ad944fdb0e840331dd69afd8176884e35957', '[\"*\"]', '2024-05-09 11:51:05', NULL, '2024-04-29 09:22:24', '2024-05-09 11:51:05'),
(6, 'App\\Models\\User', 4, 'test@gmail.com', 'ac60189d2435786d972b29016e610ef4a50626000bc1a02072bb5385e6663901', '[\"*\"]', '2024-05-15 10:39:20', NULL, '2024-05-15 10:34:12', '2024-05-15 10:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `brand_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `priority` bigint(20) DEFAULT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `brand_id`, `name`, `code`, `priority`, `condition`, `source`, `price`, `short_description`, `description`, `created_at`, `updated_at`) VALUES
(22, 1, 2, 'LENOVO M92/M72 CORE i5 2ND GEN 8GB RAM 500GB HDD TINY PC CPU ONLY', '9841000011945', 1, 'SECOND HAND', 'SA', 13000, 'LENOVO M92/M72 CORE i5 2ND GEN 8GB RAM 500GB HDD TINY PC CPU ONLY', 'LENOVO M92/M72 CORE i5 2ND GEN 8GB RAM 500GB HDD TINY PC CPU ONLY', '2024-05-01 10:38:21', '2024-05-06 18:05:44'),
(23, 1, 3, 'DELL OPTIPLEX 780 SFF CORE2DUO 4GIG RAM 128GIG SSD WIN 10 CPU ONLY', '9841000008358', 6, 'SECOND HAND', 'SA', 9000, 'Perfect for point of sale tills, school labs and home use.', 'Perfect for point of sale tills, school labs and home use. DELL OPTIPLEX 780 SFF CORE2DUO 4GIG RAM 128GIG SSD WIN 10 CPU ONLY', '2024-05-01 10:44:42', '2024-05-06 18:35:52'),
(24, 1, 2, 'LENOVO THINKCENTRE E73 i3 4TH GEN 4GB 128GIG SSD', '9841000011259', 1, 'SECOND HAND', 'SA', 11000, 'Use this for base gaming or as a Point of Sale server.', 'Use this for base gaming or as a Point of Sale server.\r\nLENOVO THINKCENTRE E73 i3 4TH GEN 4GB 128GIG SSD', '2024-05-01 10:46:46', '2024-05-06 18:06:25'),
(25, 1, 5, 'HP 19INCH MONITOR WIDE', '9841000011495', 1, 'SECOND HAND', NULL, 4500, 'HP 19 INCH MONITOR WIDE', 'HP 19 INCH MONITOR WIDE', '2024-05-01 10:47:50', '2024-05-06 17:59:34'),
(26, 1, 0, '1TB PCIe NVMe SSD DRIVES', '9841000012089', 5, 'new', 'SA', 11000, 'Its time to upgrade your computer. 1TB PCIe NVMe SSD DRIVES', 'Its time to upgrade your computer. 1TB PCIe NVMe SSD DRIVES', '2024-05-01 10:48:33', '2024-05-06 18:07:05'),
(27, 1, 0, 'CASH DRAWER TREND TECH', '9841000007450', 2, 'New', 'SA', 6500, 'USD, RAND, ZiG all in a safe place', 'CASH DRAWER TREND TECH. USD, RAND, ZiG all in a safe place', '2024-05-01 10:52:43', '2024-05-06 18:04:30'),
(30, 1, 9, '80MM RECEIPT PRINTER XPRINTER', '100', 8, 'New', 'Zim', 9000, 'Simple pos receipt printer.', 'Simple pos receipt printer. 80MM RECEIPT PRINTER XPRINTER', '2024-05-01 14:05:36', '2024-05-06 18:03:13'),
(31, 1, 0, '80MM RECEIPT PRINTER BLUETOOTH PORTABLE WITH INBUILT BATTERY', '101', 2, 'New', 'Zim', 9800, '80MM RECEIPT PRINTER BLUETOOTH PORTABLE WITH INBUILT BATTERY', 'Perfect for loadshedding.\r\n80MM RECEIPT PRINTER BLUETOOTH PORTABLE WITH INBUILT BATTERY', '2024-05-01 14:08:19', '2024-05-06 18:00:28'),
(33, 1, 0, '58MM RECEIPT PRINTER BLUETOOTH PORTABLE WITH INBUILT BATTERY', '102', 3, 'New', 'Zim', 6000, 'Perfect for loadshedding.', 'Perfect for loadshedding. 58MM RECEIPT PRINTER BLUETOOTH PORTABLE WITH INBUILT BATTERY', '2024-05-01 14:12:40', '2024-05-06 18:01:13'),
(34, 1, 0, '12V 100AH GEL BATTERY', '103', 7, NULL, NULL, 1000, NULL, NULL, '2024-05-01 14:13:00', '2024-05-06 18:07:54'),
(35, 1, 0, '24V 100AH LITHIUM BATTERY BLUE CARBON', '105', 4, 'New', 'Zim', 49500, '24V 100AH LITHIUM BATTERY BLUE CARBON', 'Beat loadshedding now', '2024-05-06 13:28:34', '2024-05-06 18:02:02'),
(36, 1, 0, '300W SOLAR POWER BANK SET', '106', 5, 'New', 'Zimbabwe', 16000, 'Solar panel, 2 light bulbs, charge phones, power TV', 'Solar panel, 2 light bulbs, charge phones, power TV. 300W SOLAR POWER BANK SET', '2024-05-06 13:46:32', '2024-05-06 18:32:32'),
(37, 1, 0, 'SL92 200W SOLAR ENERGY SET', '107', 7, 'New', 'Zim', 9500, 'SL92 200W SOLAR ENERGY SET', 'Solar panel, 2 light bulbs, charge phones, power TV. SL92 200W SOLAR ENERGY SET', '2024-05-06 13:47:56', '2024-05-06 19:26:27'),
(39, 1, 0, 'SL92 500W SOLAR ENERGY SET', '108', 6, 'New', 'Zim', 21000, 'Comes with a solar panel - power more things', 'SL92 500W SOLAR ENERGY SET', '2024-05-06 13:58:10', '2024-05-06 19:29:06'),
(40, 1, 0, '32 INCH NORMAL TV POWERED BY DC OR AC', '109', 6, 'New', 'Zim', 9000, '32 INCH NORMAL TV POWERED BY DC OR AC', '32 INCH NORMAL TV POWERED BY DC OR AC', '2024-05-06 14:01:51', '2024-05-06 19:31:52'),
(41, 1, 0, '4 CHANNEL DAHUA CCTV SET,4 CAMERAS, CABLES, 1TB HDD,', '110', 4, 'New', 'SA', NULL, '4 CHANNEL DAHUA CCTV SET,4 CAMERAS, CABLES, 1TB HDD,', '4 CHANNEL DAHUA CCTV SET,4 CAMERAS, CABLES, 1TB HDD,', '2024-05-06 14:19:46', '2024-05-06 19:27:46'),
(42, 1, 0, 'SOLAR POWERED WIFI 4G CCTV CAMERA', '111', 7, 'New', 'SA', 1100, 'One camera that does it all powered by solar! Beat loadshedding or use it in remote areas. Get an SSD card for storage', 'One camera that does it all powered by solar! Beat loadshedding or use it in remote areas. Get an SSD card for storage', '2024-05-06 14:26:52', '2024-05-06 19:32:58'),
(43, 1, 7, 'WINDOWS 10 PRO LICENSE ORIGINAL 32/64BIT', '112', 4, 'New', 'Online', 2300, 'Get genuine software. WINDOWS 10 PRO LICENSE ORIGINAL 32/64BIT', 'Get genuine software. WINDOWS 10 PRO LICENSE ORIGINAL 32/64BIT', '2024-05-06 14:28:32', '2024-05-06 18:10:25'),
(44, 1, 8, 'QUANTUMPOS SALES AND STOCK MANAGEMENT SYSTEM (POS) - ONE PC, ONCE OFF', '113', 3, 'New', 'Online', 25000, 'Use QuantumPOS to stop theft of your stock and to manage your business. Enquire for options', 'Use QuantumPOS to stop theft of your stock and to manage your business. Enquire for options. QUANTUMPOS SALES AND STOCK MANAGEMENT SYSTEM (POS) - ONE PC, ONCE OFF', '2024-05-06 14:30:59', '2024-05-06 19:30:17'),
(45, 1, 8, 'QUANTUMPOS SALES AND STOCK MANAGEMENT SYSTEM (POS) - YEARLY LICENSE, MULTIPLE PCs, FISCALISED', '114', 4, 'New', 'Online', 15000, 'Professional software with support- be Zimra compliant. Enquire for options.', 'Professional software with support- be Zimra compliant. Enquire for options. QUANTUMPOS SALES AND STOCK MANAGEMENT SYSTEM (POS) - YEARLY LICENSE, MULTIPLE PCs, FISCALISED', '2024-05-06 14:33:36', '2024-05-06 18:09:35'),
(46, 1, 0, '12V 100AH LITHIUM BATTERY', '104', 4, 'New', 'Zim', 20000, '12V 100AH LITHIUM BATTERY', '12V 100AH LITHIUM BATTERY', '2024-05-06 14:46:09', '2024-05-06 18:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `user_id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(8, 1, 4, 33, '2024-05-02 11:59:15', '2024-05-02 11:59:15'),
(9, 1, 2, 22, '2024-05-06 14:38:08', '2024-05-06 14:38:08'),
(10, 1, 11, 22, '2024-05-06 14:38:08', '2024-05-06 14:38:08'),
(11, 1, 2, 24, '2024-05-06 14:38:47', '2024-05-06 14:38:47'),
(12, 1, 11, 24, '2024-05-06 14:38:47', '2024-05-06 14:38:47'),
(13, 1, 11, 23, '2024-05-06 14:39:16', '2024-05-06 14:39:16'),
(14, 1, 2, 23, '2024-05-06 14:39:16', '2024-05-06 14:39:16'),
(15, 1, 11, 25, '2024-05-06 14:40:22', '2024-05-06 14:40:22'),
(16, 1, 1, 25, '2024-05-06 14:40:22', '2024-05-06 14:40:22'),
(17, 1, 11, 26, '2024-05-06 14:41:04', '2024-05-06 14:41:04'),
(18, 1, 3, 26, '2024-05-06 14:41:04', '2024-05-06 14:41:04'),
(19, 1, 11, 27, '2024-05-06 14:41:50', '2024-05-06 14:41:50'),
(20, 1, 3, 27, '2024-05-06 14:41:50', '2024-05-06 14:41:50'),
(21, 1, 11, 30, '2024-05-06 14:42:26', '2024-05-06 14:42:26'),
(22, 1, 4, 30, '2024-05-06 14:42:43', '2024-05-06 14:42:43'),
(23, 1, 11, 31, '2024-05-06 14:43:19', '2024-05-06 14:43:19'),
(24, 1, 4, 31, '2024-05-06 14:43:19', '2024-05-06 14:43:19'),
(25, 1, 11, 33, '2024-05-06 14:43:41', '2024-05-06 14:43:41'),
(26, 1, 5, 34, '2024-05-06 14:44:46', '2024-05-06 14:44:46'),
(27, 1, 12, 34, '2024-05-06 14:44:46', '2024-05-06 14:44:46'),
(28, 1, 5, 46, '2024-05-06 14:46:38', '2024-05-06 14:46:38'),
(29, 1, 12, 46, '2024-05-06 14:46:38', '2024-05-06 14:46:38'),
(30, 1, 5, 35, '2024-05-06 14:47:20', '2024-05-06 14:47:20'),
(31, 1, 12, 35, '2024-05-06 14:47:20', '2024-05-06 14:47:20'),
(32, 1, 6, 36, '2024-05-06 14:47:55', '2024-05-06 14:47:55'),
(33, 1, 12, 36, '2024-05-06 14:47:55', '2024-05-06 14:47:55'),
(34, 1, 12, 37, '2024-05-06 14:48:47', '2024-05-06 14:48:47'),
(35, 1, 6, 37, '2024-05-06 14:48:47', '2024-05-06 14:48:47'),
(36, 1, 12, 39, '2024-05-06 14:49:11', '2024-05-06 14:49:11'),
(37, 1, 6, 39, '2024-05-06 14:49:11', '2024-05-06 14:49:11'),
(38, 1, 12, 40, '2024-05-06 14:50:05', '2024-05-06 14:50:05'),
(39, 1, 7, 40, '2024-05-06 14:50:05', '2024-05-06 14:50:05'),
(42, 1, 12, 42, '2024-05-06 14:55:58', '2024-05-06 14:55:58'),
(43, 1, 8, 42, '2024-05-06 14:55:58', '2024-05-06 14:55:58'),
(44, 1, 8, 41, '2024-05-06 14:56:59', '2024-05-06 14:56:59'),
(45, 1, 12, 41, '2024-05-06 14:56:59', '2024-05-06 14:56:59'),
(46, 1, 15, 43, '2024-05-06 14:59:29', '2024-05-06 14:59:29'),
(47, 1, 9, 43, '2024-05-06 14:59:29', '2024-05-06 14:59:29'),
(48, 1, 15, 45, '2024-05-06 15:00:10', '2024-05-06 15:00:10'),
(49, 1, 10, 45, '2024-05-06 15:00:10', '2024-05-06 15:00:10'),
(50, 1, 15, 44, '2024-05-06 15:00:31', '2024-05-06 15:00:31'),
(51, 1, 10, 44, '2024-05-06 15:00:54', '2024-05-06 15:00:54'),
(52, 1, 18, 23, '2024-05-06 16:49:35', '2024-05-06 16:49:35'),
(53, 1, 19, 34, '2024-05-06 16:49:47', '2024-05-06 16:49:47'),
(54, 1, 19, 30, '2024-05-06 16:50:02', '2024-05-06 16:50:02'),
(55, 1, 19, 36, '2024-05-06 16:50:17', '2024-05-06 16:50:17'),
(56, 1, 19, 35, '2024-05-06 16:50:31', '2024-05-06 16:50:31'),
(57, 1, 19, 33, '2024-05-06 16:50:42', '2024-05-06 16:50:42'),
(58, 1, 19, 31, '2024-05-06 16:50:55', '2024-05-06 16:50:55'),
(59, 1, 19, 27, '2024-05-06 16:51:05', '2024-05-06 16:51:05'),
(60, 1, 19, 26, '2024-05-06 16:51:16', '2024-05-06 16:51:16'),
(61, 1, 19, 25, '2024-05-06 16:51:28', '2024-05-06 16:51:28'),
(63, 1, 19, 23, '2024-05-06 16:53:13', '2024-05-06 16:53:13'),
(64, 1, 18, 22, '2024-05-06 17:36:51', '2024-05-06 17:36:51'),
(65, 1, 18, 37, '2024-05-06 17:37:26', '2024-05-06 17:37:26'),
(66, 1, 18, 24, '2024-05-06 17:37:44', '2024-05-06 17:37:44'),
(67, 1, 18, 46, '2024-05-06 17:38:35', '2024-05-06 17:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `priority` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `user_id`, `product_id`, `priority`, `image`, `created_at`, `updated_at`) VALUES
(36, 1, 25, NULL, 'assets/img/product/202405073648.jpg', '2024-05-06 17:59:34', '2024-05-06 17:59:34'),
(37, 1, 25, NULL, 'assets/img/product/202405074842.jpg', '2024-05-06 17:59:34', '2024-05-06 17:59:34'),
(38, 1, 25, NULL, 'assets/img/product/202405072514.jpg', '2024-05-06 17:59:34', '2024-05-06 17:59:34'),
(39, 1, 25, NULL, 'assets/img/product/20240507784.jpg', '2024-05-06 17:59:34', '2024-05-06 17:59:34'),
(40, 1, 25, NULL, 'assets/img/product/202405076861.jpg', '2024-05-06 17:59:34', '2024-05-06 17:59:34'),
(41, 1, 31, NULL, 'assets/img/product/202405082717.jpg', '2024-05-06 18:00:28', '2024-05-06 18:00:28'),
(42, 1, 31, NULL, 'assets/img/product/202405081155.jpg', '2024-05-06 18:00:28', '2024-05-06 18:00:28'),
(43, 1, 31, NULL, 'assets/img/product/202405085912.jpg', '2024-05-06 18:00:28', '2024-05-06 18:00:28'),
(44, 1, 31, NULL, 'assets/img/product/202405088698.jpg', '2024-05-06 18:00:28', '2024-05-06 18:00:28'),
(45, 1, 31, NULL, 'assets/img/product/202405082085.jpg', '2024-05-06 18:00:28', '2024-05-06 18:00:28'),
(46, 1, 33, NULL, 'assets/img/product/202405083873.jpg', '2024-05-06 18:01:13', '2024-05-06 18:01:13'),
(47, 1, 33, NULL, 'assets/img/product/202405083461.jpg', '2024-05-06 18:01:13', '2024-05-06 18:01:13'),
(48, 1, 33, NULL, 'assets/img/product/202405085048.jpg', '2024-05-06 18:01:13', '2024-05-06 18:01:13'),
(49, 1, 33, NULL, 'assets/img/product/202405084834.jpg', '2024-05-06 18:01:13', '2024-05-06 18:01:13'),
(50, 1, 33, NULL, 'assets/img/product/202405086257.jpg', '2024-05-06 18:01:13', '2024-05-06 18:01:13'),
(51, 1, 35, NULL, 'assets/img/product/202405081987.jpg', '2024-05-06 18:02:02', '2024-05-06 18:02:02'),
(52, 1, 35, NULL, 'assets/img/product/202405086152.jpg', '2024-05-06 18:02:02', '2024-05-06 18:02:02'),
(53, 1, 35, NULL, 'assets/img/product/202405082235.jpg', '2024-05-06 18:02:02', '2024-05-06 18:02:02'),
(54, 1, 35, NULL, 'assets/img/product/202405084127.jpg', '2024-05-06 18:02:02', '2024-05-06 18:02:02'),
(55, 1, 35, NULL, 'assets/img/product/202405088886.jpg', '2024-05-06 18:02:02', '2024-05-06 18:02:02'),
(56, 1, 30, NULL, 'assets/img/product/202405085708.jpg', '2024-05-06 18:03:13', '2024-05-06 18:03:13'),
(57, 1, 30, NULL, 'assets/img/product/202405082947.jpg', '2024-05-06 18:03:13', '2024-05-06 18:03:13'),
(58, 1, 30, NULL, 'assets/img/product/202405082602.jpg', '2024-05-06 18:03:13', '2024-05-06 18:03:13'),
(59, 1, 30, NULL, 'assets/img/product/202405082297.jpg', '2024-05-06 18:03:13', '2024-05-06 18:03:13'),
(60, 1, 30, NULL, 'assets/img/product/202405088869.jpg', '2024-05-06 18:03:13', '2024-05-06 18:03:13'),
(61, 1, 27, NULL, 'assets/img/product/202405086058.jpg', '2024-05-06 18:04:30', '2024-05-06 18:04:30'),
(62, 1, 27, NULL, 'assets/img/product/202405087591.jpg', '2024-05-06 18:04:30', '2024-05-06 18:04:30'),
(63, 1, 27, NULL, 'assets/img/product/202405089553.jpg', '2024-05-06 18:04:30', '2024-05-06 18:04:30'),
(64, 1, 27, NULL, 'assets/img/product/202405082106.jpg', '2024-05-06 18:04:30', '2024-05-06 18:04:30'),
(65, 1, 27, NULL, 'assets/img/product/202405087691.jpg', '2024-05-06 18:04:30', '2024-05-06 18:04:30'),
(66, 1, 22, NULL, 'assets/img/product/202405082039.jpg', '2024-05-06 18:05:44', '2024-05-06 18:05:44'),
(67, 1, 22, NULL, 'assets/img/product/20240508424.jpg', '2024-05-06 18:05:44', '2024-05-06 18:05:44'),
(68, 1, 22, NULL, 'assets/img/product/202405082463.jpg', '2024-05-06 18:05:44', '2024-05-06 18:05:44'),
(69, 1, 22, NULL, 'assets/img/product/202405083090.jpg', '2024-05-06 18:05:44', '2024-05-06 18:05:44'),
(70, 1, 22, NULL, 'assets/img/product/202405085870.jpg', '2024-05-06 18:05:44', '2024-05-06 18:05:44'),
(71, 1, 24, NULL, 'assets/img/product/202405085086.jpg', '2024-05-06 18:06:25', '2024-05-06 18:06:25'),
(72, 1, 24, NULL, 'assets/img/product/20240508484.jpg', '2024-05-06 18:06:25', '2024-05-06 18:06:25'),
(73, 1, 24, NULL, 'assets/img/product/202405085609.jpg', '2024-05-06 18:06:25', '2024-05-06 18:06:25'),
(74, 1, 24, NULL, 'assets/img/product/202405085716.jpg', '2024-05-06 18:06:25', '2024-05-06 18:06:25'),
(75, 1, 24, NULL, 'assets/img/product/202405083096.jpg', '2024-05-06 18:06:25', '2024-05-06 18:06:25'),
(76, 1, 26, NULL, 'assets/img/product/202405085410.jpg', '2024-05-06 18:07:05', '2024-05-06 18:07:05'),
(77, 1, 26, NULL, 'assets/img/product/202405086830.jpg', '2024-05-06 18:07:05', '2024-05-06 18:07:05'),
(78, 1, 26, NULL, 'assets/img/product/202405088034.jpg', '2024-05-06 18:07:05', '2024-05-06 18:07:05'),
(79, 1, 26, NULL, 'assets/img/product/202405081186.jpg', '2024-05-06 18:07:05', '2024-05-06 18:07:05'),
(80, 1, 26, NULL, 'assets/img/product/202405087483.jpg', '2024-05-06 18:07:05', '2024-05-06 18:07:05'),
(81, 1, 34, NULL, 'assets/img/product/202405081430.jpg', '2024-05-06 18:07:54', '2024-05-06 18:07:54'),
(82, 1, 34, NULL, 'assets/img/product/202405087687.jpg', '2024-05-06 18:07:54', '2024-05-06 18:07:54'),
(83, 1, 34, NULL, 'assets/img/product/202405083710.jpg', '2024-05-06 18:07:54', '2024-05-06 18:07:54'),
(84, 1, 34, NULL, 'assets/img/product/20240508931.jpg', '2024-05-06 18:07:54', '2024-05-06 18:07:54'),
(85, 1, 34, NULL, 'assets/img/product/202405084005.jpg', '2024-05-06 18:07:54', '2024-05-06 18:07:54'),
(86, 1, 46, NULL, 'assets/img/product/202405088296.jpg', '2024-05-06 18:08:41', '2024-05-06 18:08:41'),
(87, 1, 46, NULL, 'assets/img/product/202405082520.jpg', '2024-05-06 18:08:41', '2024-05-06 18:08:41'),
(88, 1, 46, NULL, 'assets/img/product/202405081014.jpg', '2024-05-06 18:08:41', '2024-05-06 18:08:41'),
(89, 1, 46, NULL, 'assets/img/product/202405089410.jpg', '2024-05-06 18:08:41', '2024-05-06 18:08:41'),
(90, 1, 46, NULL, 'assets/img/product/202405087198.jpg', '2024-05-06 18:08:41', '2024-05-06 18:08:41'),
(91, 1, 45, NULL, 'assets/img/product/202405088069.jpg', '2024-05-06 18:09:35', '2024-05-06 18:09:35'),
(92, 1, 45, NULL, 'assets/img/product/202405081475.jpg', '2024-05-06 18:09:35', '2024-05-06 18:09:35'),
(93, 1, 45, NULL, 'assets/img/product/20240508319.jpg', '2024-05-06 18:09:35', '2024-05-06 18:09:35'),
(94, 1, 45, NULL, 'assets/img/product/202405081443.jpg', '2024-05-06 18:09:35', '2024-05-06 18:09:35'),
(95, 1, 45, NULL, 'assets/img/product/202405087524.jpg', '2024-05-06 18:09:35', '2024-05-06 18:09:35'),
(96, 1, 43, NULL, 'assets/img/product/202405082925.jpg', '2024-05-06 18:10:25', '2024-05-06 18:10:25'),
(97, 1, 43, NULL, 'assets/img/product/202405089042.jpg', '2024-05-06 18:10:25', '2024-05-06 18:10:25'),
(98, 1, 43, NULL, 'assets/img/product/20240508135.jpg', '2024-05-06 18:10:25', '2024-05-06 18:10:25'),
(99, 1, 43, NULL, 'assets/img/product/202405085424.jpg', '2024-05-06 18:10:25', '2024-05-06 18:10:25'),
(100, 1, 43, NULL, 'assets/img/product/202405089547.jpg', '2024-05-06 18:10:25', '2024-05-06 18:10:25'),
(101, 1, 36, NULL, 'assets/img/product/202405086732.jpg', '2024-05-06 18:32:32', '2024-05-06 18:32:32'),
(102, 1, 36, NULL, 'assets/img/product/20240508341.jpg', '2024-05-06 18:32:32', '2024-05-06 18:32:32'),
(103, 1, 36, NULL, 'assets/img/product/202405089548.jpg', '2024-05-06 18:32:32', '2024-05-06 18:32:32'),
(104, 1, 36, NULL, 'assets/img/product/202405082620.jpg', '2024-05-06 18:32:32', '2024-05-06 18:32:32'),
(105, 1, 36, NULL, 'assets/img/product/202405081216.jpg', '2024-05-06 18:32:32', '2024-05-06 18:32:32'),
(106, 1, 23, NULL, 'assets/img/product/202405089304.jpg', '2024-05-06 18:35:52', '2024-05-06 18:35:52'),
(107, 1, 23, NULL, 'assets/img/product/202405084264.jpg', '2024-05-06 18:35:52', '2024-05-06 18:35:52'),
(108, 1, 23, NULL, 'assets/img/product/202405087322.jpg', '2024-05-06 18:35:52', '2024-05-06 18:35:52'),
(109, 1, 23, NULL, 'assets/img/product/202405083838.jpg', '2024-05-06 18:35:52', '2024-05-06 18:35:52'),
(110, 1, 23, NULL, 'assets/img/product/202405084861.jpg', '2024-05-06 18:35:52', '2024-05-06 18:35:52'),
(111, 1, 37, NULL, 'assets/img/product/20240509775.jpg', '2024-05-06 19:26:27', '2024-05-06 19:26:27'),
(112, 1, 37, NULL, 'assets/img/product/20240509611.jpg', '2024-05-06 19:26:27', '2024-05-06 19:26:27'),
(113, 1, 37, NULL, 'assets/img/product/202405098561.jpg', '2024-05-06 19:26:27', '2024-05-06 19:26:27'),
(114, 1, 37, NULL, 'assets/img/product/202405097630.jpg', '2024-05-06 19:26:27', '2024-05-06 19:26:27'),
(115, 1, 37, NULL, 'assets/img/product/202405095415.jpg', '2024-05-06 19:26:27', '2024-05-06 19:26:27'),
(116, 1, 41, NULL, 'assets/img/product/202405091095.jpg', '2024-05-06 19:27:46', '2024-05-06 19:27:46'),
(117, 1, 41, NULL, 'assets/img/product/202405096650.jpg', '2024-05-06 19:27:46', '2024-05-06 19:27:46'),
(118, 1, 41, NULL, 'assets/img/product/202405099733.jpg', '2024-05-06 19:27:46', '2024-05-06 19:27:46'),
(119, 1, 41, NULL, 'assets/img/product/20240509767.jpg', '2024-05-06 19:27:46', '2024-05-06 19:27:46'),
(120, 1, 41, NULL, 'assets/img/product/202405093771.jpg', '2024-05-06 19:27:46', '2024-05-06 19:27:46'),
(121, 1, 39, NULL, 'assets/img/product/202405095611.jpg', '2024-05-06 19:29:06', '2024-05-06 19:29:06'),
(122, 1, 39, NULL, 'assets/img/product/202405097801.jpg', '2024-05-06 19:29:06', '2024-05-06 19:29:06'),
(123, 1, 39, NULL, 'assets/img/product/202405092459.jpg', '2024-05-06 19:29:06', '2024-05-06 19:29:06'),
(124, 1, 39, NULL, 'assets/img/product/202405093112.jpg', '2024-05-06 19:29:06', '2024-05-06 19:29:06'),
(125, 1, 39, NULL, 'assets/img/product/202405099982.jpg', '2024-05-06 19:29:06', '2024-05-06 19:29:06'),
(126, 1, 44, NULL, 'assets/img/product/202405096804.jpg', '2024-05-06 19:30:17', '2024-05-06 19:30:17'),
(127, 1, 44, NULL, 'assets/img/product/202405099476.jpg', '2024-05-06 19:30:17', '2024-05-06 19:30:17'),
(128, 1, 44, NULL, 'assets/img/product/202405096765.jpg', '2024-05-06 19:30:17', '2024-05-06 19:30:17'),
(129, 1, 44, NULL, 'assets/img/product/202405093495.jpg', '2024-05-06 19:30:17', '2024-05-06 19:30:17'),
(130, 1, 44, NULL, 'assets/img/product/202405092719.jpg', '2024-05-06 19:30:17', '2024-05-06 19:30:17'),
(131, 1, 40, NULL, 'assets/img/product/202405099924.jpg', '2024-05-06 19:31:52', '2024-05-06 19:31:52'),
(132, 1, 40, NULL, 'assets/img/product/202405094211.jpg', '2024-05-06 19:31:52', '2024-05-06 19:31:52'),
(133, 1, 40, NULL, 'assets/img/product/202405098784.jpg', '2024-05-06 19:31:52', '2024-05-06 19:31:52'),
(134, 1, 40, NULL, 'assets/img/product/202405098279.jpg', '2024-05-06 19:31:52', '2024-05-06 19:31:52'),
(135, 1, 40, NULL, 'assets/img/product/202405096306.jpg', '2024-05-06 19:31:52', '2024-05-06 19:31:52'),
(136, 1, 42, NULL, 'assets/img/product/202405096651.jpg', '2024-05-06 19:32:58', '2024-05-06 19:32:58'),
(137, 1, 42, NULL, 'assets/img/product/202405094476.jpg', '2024-05-06 19:32:58', '2024-05-06 19:32:58'),
(138, 1, 42, NULL, 'assets/img/product/202405095751.jpg', '2024-05-06 19:32:58', '2024-05-06 19:32:58'),
(139, 1, 42, NULL, 'assets/img/product/202405096898.jpg', '2024-05-06 19:32:58', '2024-05-06 19:32:58'),
(140, 1, 42, NULL, 'assets/img/product/202405098288.jpg', '2024-05-06 19:32:58', '2024-05-06 19:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `level` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `user_id`, `level`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 1, 1, '2024-05-04 16:23:54', '2024-05-04 16:38:25'),
(3, 'Customer', 1, 4, '2024-05-04 16:26:07', '2024-05-04 16:26:07'),
(4, 'Manager', 1, 3, '2024-05-04 16:39:05', '2024-05-04 16:39:05'),
(5, 'Shop Owner', 1, 2, '2024-05-04 16:39:33', '2024-05-04 16:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role_level` int(11) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `gender`, `role_level`, `dob`, `code`, `phone`, `address`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mark Mark', 'Mark', 'Mark', 'Male', 1, '01/01/2020', '12345678', '676767', '67 bjhvkjvv', 'mark@email.com', NULL, '$2y$12$XkBrCki2MbJZEtw/I5LY4ONMf6Qoubdhn6.VYHHNLbJbrIlSEpP82', NULL, '2024-04-29 08:45:16', '2024-04-30 17:54:11'),
(3, 'Mark Chovava', 'Mark', 'Chovava', 'Male', 2, '02/02/2000', 'wbGCVJOU', 'juyguyfu', 'yuighuiguy', 'markchovava@gmail.com', NULL, '$2y$12$RIG6LVDcOY2KRkEfYhfKzOLy8bUcmy8mrxLZJ9uyABcpS2FgeTcV2', NULL, '2024-04-30 07:09:50', '2024-04-30 10:36:20'),
(4, 'Test Test', 'Test', 'Test', NULL, 3, NULL, '7FTUNPHk', '123445', 'test@gmail.com', 'test@gmail.com', NULL, '$2y$12$W6YM.L0KKRLlUKmRxILOsemLdhzXMS9SxuXD8j66.KKYmuH8N7tie', NULL, '2024-04-30 10:27:50', '2024-04-30 10:27:50'),
(5, 'Another Ah', 'Another', 'Ah', NULL, 3, '01/01/2000', 'ykYixMFQ', '576', '14949  Tynwald South, Harare, Zimbabwe', 'a@gmil.com', NULL, '$2y$12$w9WSCQtErjc/KA71owbt1uY/EnC2wRmrpU.T05QQrDW4bJPmXce76', NULL, '2024-04-30 10:33:58', '2024-04-30 10:33:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_infos`
--
ALTER TABLE `app_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_infos`
--
ALTER TABLE `app_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
