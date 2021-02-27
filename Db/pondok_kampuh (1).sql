-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 06:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pondok_kampuh`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Baju Adat', 'baju-adat', '2021-01-11 07:15:52', '2021-01-11 07:59:58'),
(3, 'Kampuh', 'kampuh', '2021-01-11 07:56:53', '2021-01-11 07:56:53'),
(5, 'Kamen', 'kamen', '2021-01-16 02:00:00', '2021-01-16 02:00:00'),
(6, 'Udeng', 'udeng', '2021-01-16 02:00:08', '2021-01-16 02:00:08');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(8, 10, 'images-product/ODjCrwpBMMVWcUUkaQu4T6xRwHTZPIeC8JigaBnI.jpg', NULL, NULL),
(10, 12, 'images-product/bPZT9qOXrVHFZw9TCQQI36MetuZeyEvz87CeRjWa.jpg', NULL, NULL),
(11, 11, 'images-product/KSNgQX5QoIcz4gt2xXYTFGLx9EthylUTygkZSWR9.jpg', NULL, NULL),
(12, 11, 'images-product/CJU0y5fHbhqbUwCqRV84iWxA2MPBxizLMUO8uCEE.jpg', NULL, NULL),
(13, 11, 'images-product/0W3zFf9UbmaqDNjbVmsyyRbkcSOxLnektYxrW5yA.jpg', NULL, NULL),
(14, 13, 'images-product/7WW2ssv8Sv3hUY2aG2AL4A3FHHxP7197HpGTg36W.jpg', NULL, NULL),
(15, 14, 'images-product/N2RkCZoaY3eitL3ajY7cQAxQ4DtZSckOJ0iEIiQH.jpg', NULL, NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_11_110015_create_products_table', 2),
(5, '2021_01_11_114706_category', 3),
(6, '2021_01_12_110015_create_products_table', 4),
(7, '2021_01_15_182553_image', 5),
(8, '2021_01_16_061233_sizes', 6),
(9, '2021_01_17_061233_sizes', 7),
(10, '2021_02_10_105510_order', 8),
(11, '2021_02_14_021824_order_detailas', 9);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('PENDING','PROCESS','SUCCESS') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `courier` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` int(11) NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `notif` enum('NEW','NOTNEW') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NEW',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','NONACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `price`, `stock`, `weight`, `description`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Kemeja Adat', 'kemeja-adat', 1, 250000, 12, 200, 'kemeja adat terbaru', 'ACTIVE', '2021-01-15 22:50:13', '2021-02-18 06:18:13'),
(11, 'kampuh', 'kampuh', 3, 1500000, 0, 200, 'kampuh modern now', 'ACTIVE', '2021-02-04 02:52:12', '2021-02-18 06:01:54'),
(12, 'udeng', 'udeng', 6, 2500000, 14, 150, 'udeng batik kundangan', 'ACTIVE', '2021-02-04 02:53:27', '2021-02-20 18:31:02'),
(13, 'Kemeja Hitam', 'kemeja-hitam', 1, 250000, 69, 300, 'Kemeja Adat Untuk kundangan', 'ACTIVE', '2021-02-09 01:45:55', '2021-02-20 18:31:02'),
(14, 'kamen batik', 'kamen-batik', 5, 150000, 68, 400, 'kamen batik adat kundangan', 'ACTIVE', '2021-02-09 01:50:58', '2021-02-20 18:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`, `product_id`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'S', 10, 0, '2021-01-15 22:50:13', '2021-02-18 06:15:06'),
(2, 'M', 10, 3, '2021-01-15 22:50:13', '2021-01-15 23:29:37'),
(3, 'L', 10, 4, '2021-01-15 22:50:13', '2021-01-15 23:29:37'),
(4, 'XL', 10, 5, '2021-01-15 22:50:14', '2021-01-15 23:29:37'),
(5, 'AllSize', 10, 0, '2021-01-15 22:50:14', '2021-02-16 01:41:53'),
(6, 'S', 11, 0, '2021-02-04 02:52:12', '2021-02-04 02:52:12'),
(7, 'M', 11, 0, '2021-02-04 02:52:12', '2021-02-04 02:52:12'),
(8, 'L', 11, 0, '2021-02-04 02:52:12', '2021-02-04 02:52:12'),
(9, 'XL', 11, 0, '2021-02-04 02:52:12', '2021-02-04 02:52:12'),
(10, 'AllSize', 11, 6, '2021-02-04 02:52:12', '2021-02-04 02:52:12'),
(11, 'S', 12, 3, '2021-02-04 02:53:27', '2021-02-04 02:53:27'),
(12, 'M', 12, 4, '2021-02-04 02:53:27', '2021-02-04 02:53:27'),
(13, 'L', 12, 6, '2021-02-04 02:53:27', '2021-02-20 18:31:02'),
(14, 'XL', 12, 1, '2021-02-04 02:53:27', '2021-02-09 01:54:48'),
(15, 'AllSize', 12, 0, '2021-02-04 02:53:27', '2021-02-04 02:53:27'),
(16, 'S', 13, 0, '2021-02-09 01:45:55', '2021-02-09 01:45:55'),
(17, 'M', 13, 29, '2021-02-09 01:45:55', '2021-02-20 18:31:02'),
(18, 'L', 13, 40, '2021-02-09 01:45:55', '2021-02-09 01:45:55'),
(19, 'XL', 13, 0, '2021-02-09 01:45:55', '2021-02-09 01:45:55'),
(20, 'AllSize', 13, 0, '2021-02-09 01:45:55', '2021-02-09 01:45:55'),
(21, 'S', 14, 10, '2021-02-09 01:50:58', '2021-02-09 01:55:40'),
(22, 'M', 14, 9, '2021-02-09 01:50:58', '2021-02-20 18:21:21'),
(23, 'L', 14, 20, '2021-02-09 01:50:58', '2021-02-09 01:50:58'),
(24, 'XL', 14, 29, '2021-02-09 01:50:58', '2021-02-20 18:23:22'),
(25, 'AllSize', 14, 0, '2021-02-09 01:50:59', '2021-02-09 01:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','NONACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` enum('ADMIN','CUSTOMER') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CUSTOMER',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `image`, `address`, `password`, `status`, `roles`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '082235265301', NULL, 'Mengwi', '$2y$10$hZ/FmCX88Y1aJK4lGb8AieWlAWnn2xeFcM8Mdx7ikXVJSOfMtBvnC', 'ACTIVE', 'ADMIN', NULL, NULL, '2021-01-16 20:32:07', '2021-02-21 03:26:15'),
(2, 'fajar', 'fajarprayoga23@gmail.com', '082235265301', NULL, 'Mengwi', '$2y$10$W0fcudjj1qZtfnOcVnhrJ.X7ImzbYvNAykAQzA5W9hslO1H6TjBKu', 'ACTIVE', 'CUSTOMER', NULL, NULL, '2021-01-16 20:34:33', '2021-01-17 03:38:12'),
(3, 'customer', 'customer@customer.com', '082235265301', NULL, 'Mengwi', '$2y$10$LwGiNTx1EdtkRCTofDKwL.eO1SAzEVmfb1AR8nXO6Ne7XMkzlahTm', 'NONACTIVE', 'CUSTOMER', NULL, NULL, '2021-01-16 21:25:31', '2021-01-17 03:38:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
