-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2023 at 01:30 PM
-- Server version: 10.3.38-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classicsoft123_tilestracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Paintings', '2023-03-29 05:10:39', '2023-03-29 05:32:20'),
(6, 'Matt Marbles', '2023-03-29 05:31:30', '2023-03-29 05:31:30'),
(7, 'Satvario', '2023-03-29 23:08:34', '2023-03-29 23:08:34'),
(8, 'Breccia', '2023-03-29 23:08:43', '2023-03-29 23:08:43'),
(9, 'Bottochino', '2023-03-29 23:08:52', '2023-03-29 23:08:52'),
(10, 'Travertine', '2023-03-29 23:09:01', '2023-03-29 23:09:01'),
(11, 'Pietra', '2023-03-29 23:09:10', '2023-03-29 23:09:10'),
(12, 'Marquina', '2023-03-29 23:09:19', '2023-03-29 23:09:19'),
(13, 'Portoro', '2023-03-29 23:09:27', '2023-03-29 23:09:27'),
(14, 'Saint Laurent', '2023-03-29 23:09:43', '2023-03-29 23:09:43'),
(15, 'Emprador', '2023-03-29 23:09:51', '2023-03-29 23:09:51'),
(16, 'Marfil', '2023-03-29 23:09:58', '2023-03-29 23:09:58'),
(17, 'Black Marble', '2023-03-29 23:10:14', '2023-03-29 23:10:14'),
(18, 'Highgloss Marble', '2023-03-29 23:10:28', '2023-03-29 23:10:28'),
(19, 'Granite', '2023-03-29 23:10:37', '2023-03-29 23:10:37'),
(20, 'Decor', '2023-03-29 23:10:44', '2023-03-29 23:10:44'),
(21, 'Concepts', '2023-03-29 23:10:50', '2023-03-29 23:10:50'),
(22, 'Wood', '2023-03-29 23:11:03', '2023-03-29 23:11:03'),
(23, 'Glossy Marble', '2023-03-29 23:11:15', '2023-03-29 23:11:15');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `stock` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `cat_id`, `stock`, `created_at`, `updated_at`) VALUES
(1, 6, '[\"TilesLover_16801513806898.jpg\"]', '2023-03-29 07:14:30', '2023-03-29 23:13:43'),
(2, 17, '[\"TilesLover_16801513208663.jpg\",\"TilesLover_16801513206343.jpg\"]', '2023-03-29 23:12:23', '2023-03-29 23:12:29'),
(3, 9, '[\"TilesLover_16801513202410.jpg\"]', '2023-03-29 23:12:46', '2023-03-29 23:12:46'),
(4, 20, '[\"TilesLover_16801513207821.jpg\"]', '2023-03-29 23:12:57', '2023-03-29 23:12:57'),
(5, 23, '[\"TilesLover_16801513804135.jpg\"]', '2023-03-29 23:13:04', '2023-03-29 23:13:04'),
(6, 18, '[\"TilesLover_16801513809565.jpg\"]', '2023-03-29 23:13:13', '2023-03-29 23:13:13'),
(7, 16, '[\"TilesLover_16801513803139.jpg\"]', '2023-03-29 23:13:22', '2023-03-29 23:13:22'),
(8, 21, '[\"TilesLover_16801513806777.jpg\"]', '2023-03-29 23:13:32', '2023-03-29 23:13:32'),
(9, 11, '[\"TilesLover_16801514407624.jpg\"]', '2023-03-29 23:14:10', '2023-03-29 23:14:10'),
(10, 13, '[\"TilesLover_168015144031.jpg\"]', '2023-03-29 23:14:16', '2023-03-29 23:14:16'),
(11, 14, '[\"TilesLover_16801514404527.jpg\"]', '2023-03-29 23:14:21', '2023-03-29 23:14:21'),
(12, 7, '[\"TilesLover_16801514407820.jpg\"]', '2023-03-29 23:14:28', '2023-03-29 23:14:28'),
(13, 10, '[\"TilesLover_16801514404704.jpg\"]', '2023-03-29 23:14:33', '2023-03-29 23:14:33'),
(14, 22, '[\"TilesLover_16801514402622.jpg\"]', '2023-03-29 23:14:39', '2023-03-29 23:14:39'),
(15, 3, '[\"TilesLover_16801514405858.jpg\"]', '2023-03-29 23:14:45', '2023-03-29 23:14:45');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_29_095232_create_category_table', 2),
(6, '2023_03_29_122726_create_images_table', 3),
(7, '2023_03_29_095232_create_price_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `price` varchar(160) NOT NULL,
  `transaction_id` varchar(160) NOT NULL,
  `r_payment_id` varchar(180) DEFAULT NULL,
  `status` enum('pending','completed','failed') NOT NULL DEFAULT 'pending',
  `order_json` longtext NOT NULL,
  `method` varchar(180) DEFAULT NULL,
  `currency` varchar(180) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `plan_id`, `price`, `transaction_id`, `r_payment_id`, `status`, `order_json`, `method`, `currency`, `user_email`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '40', 'order_Lj93UEi4ZoEFJZ', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-04-28 08:26:55', '2023-04-28 08:26:55'),
(2, 1, 3, '40', 'order_Lj943qyo0ndAuQ', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-04-28 08:27:27', '2023-04-28 08:27:27'),
(3, 1, 3, '40', 'order_Lj94pWlCKVztLi', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-04-28 08:28:11', '2023-04-28 08:28:11'),
(4, 1, 3, '40', 'order_Lj97K4oeFZzCzn', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-04-28 08:30:32', '2023-04-28 08:30:32'),
(5, 1, 1, '8', 'order_LjC142PvspjCUa', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-04-28 11:20:42', '2023-04-28 11:20:42'),
(6, 1, 1, '8', 'order_LjC7jUvYlH0ezy', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-04-28 11:27:01', '2023-04-28 11:27:01'),
(7, 1, 2, '20', 'order_LkKLfMozBeTUjv', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-05-01 08:08:45', '2023-05-01 08:08:45'),
(8, 1, 2, '20', 'order_LkL4zc7zGPh8lm', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-05-01 08:51:40', '2023-05-01 08:51:40'),
(9, 1, 1, '8', 'order_LkOOvmTh37U4XZ', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-05-01 12:06:37', '2023-05-01 12:06:37'),
(10, 1, 1, '8', 'order_LkP3EjkGQTQPkr', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-05-01 12:44:46', '2023-05-01 12:44:46'),
(11, 1, 1, '8', 'order_LkP7vaLhSisYFq', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-05-01 12:49:13', '2023-05-01 12:49:13'),
(12, 1, 1, '8', 'order_LnwglEwY6XA1GR', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-05-10 11:36:05', '2023-05-10 11:36:05'),
(13, 1, 1, '8', 'order_LnwkhiXY2zBKrp', NULL, 'pending', '{}', NULL, NULL, NULL, '2023-05-10 11:39:49', '2023-05-10 11:39:49'),
(14, 1, 1, '8', 'order_LnwuGWKCPdkJ3d', 'pay_LnwvGgipSo758E', 'completed', '{\"\\u0000*\\u0000attributes\":{\"id\":\"pay_LnwvGgipSo758E\",\"entity\":\"payment\",\"amount\":800,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"card\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Payment for your order\",\"card_id\":\"card_LnwvGjATB17uKv\",\"card\":{},\"bank\":null,\"wallet\":null,\"vpa\":null,\"email\":\"rokey@test.com\",\"contact\":\"+919924936750\",\"notes\":{},\"fee\":16,\"tax\":0,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{},\"created_at\":1683719389}}', 'card', 'INR', 'rokey@test.com', '2023-05-10 11:48:52', '2023-05-10 11:48:52');

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

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(180) NOT NULL,
  `type` varchar(180) NOT NULL,
  `price` varchar(180) NOT NULL,
  `interval` varchar(180) NOT NULL,
  `description_data` text NOT NULL,
  `listing` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `name`, `type`, `price`, `interval`, `description_data`, `listing`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 'Individual', '20000', 'year', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '[\"Cras justo odio\",\"Dapibus ac facilisis in\",\"Vestibulum at eros\"]', '2023-04-14 06:13:45', '2023-05-10 12:28:25'),
(2, 'Standard', 'Small Business', '50000', 'year', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '[\"Cras justo odio\",\"Dapibus ac facilisis in\",\"Vestibulum at eros\"]', '2023-04-14 06:13:45', '2023-05-10 12:28:30'),
(3, 'Premium', 'Large Companies', '100000', 'year', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '[\"Cras justo odio\",\"Dapibus ac facilisis in\",\"Vestibulum at eros\"]', '2023-04-14 06:13:45', '2023-05-10 12:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `srvcredentials`
--

CREATE TABLE `srvcredentials` (
  `rrcredid` int(11) NOT NULL,
  `rrcreduname` varchar(180) NOT NULL,
  `rrcredpass` varchar(180) NOT NULL,
  `rrcredemail` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `srvcredentials`
--

INSERT INTO `srvcredentials` (`rrcredid`, `rrcreduname`, `rrcredpass`, `rrcredemail`, `created_at`, `updated_at`) VALUES
(1, 'admin', '579fdf3db3920866535abc9c3301fb72', 'sumiltester@gmail.com', '2020-03-16 05:25:24', '2023-03-29 06:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(180) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rokey Dave', 'rokey2023', 'rokey@2023g.com', '9888555556', NULL, 'f5bb0c8de146c67b44babbf4e6584cc0', NULL, '2023-04-14 00:21:29', '2023-04-14 00:21:29'),
(2, 'Dipesh', 'Dipesh', 'loremtest@g.com', '123456', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, '2023-05-01 10:54:33', '2023-05-01 10:54:33');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

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
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `srvcredentials`
--
ALTER TABLE `srvcredentials`
  ADD PRIMARY KEY (`rrcredid`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `srvcredentials`
--
ALTER TABLE `srvcredentials`
  MODIFY `rrcredid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
