-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2023 at 09:41 AM
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
  `display_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(5, '29 May marble', '29 May marble', '2023-06-01 06:58:17', '2023-06-01 06:58:17');

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
(3, 5, '[{\"image_title\":\"Roman Tiles\",\"image_slug\":\"TilesLover_16856074804363.jpg\"},{\"image_title\":\"Roman 2\",\"image_slug\":\"TilesLover_16856074806213.jpg\"}]', '2023-06-01 06:58:59', '2023-06-01 07:18:43');

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
  `status` enum('pending','completed','failed','end','over') NOT NULL DEFAULT 'pending',
  `order_json` longtext NOT NULL,
  `method` varchar(180) DEFAULT NULL,
  `currency` varchar(180) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `plan_id`, `price`, `transaction_id`, `r_payment_id`, `status`, `order_json`, `method`, `currency`, `user_email`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(14, 1, 1, '8', 'order_LnwuGWKCPdkJ3d', 'pay_LnwvGgipSo758E', 'end', '{\"\\u0000*\\u0000attributes\":{\"id\":\"pay_LnwvGgipSo758E\",\"entity\":\"payment\",\"amount\":800,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"card\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Payment for your order\",\"card_id\":\"card_LnwvGjATB17uKv\",\"card\":{},\"bank\":null,\"wallet\":null,\"vpa\":null,\"email\":\"rokey@test.com\",\"contact\":\"+919924936750\",\"notes\":{},\"fee\":16,\"tax\":0,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{},\"created_at\":1683719389}}', 'card', 'INR', 'rokey@test.com', NULL, NULL, '2023-05-10 11:48:52', '2023-05-10 11:48:52'),
(15, 1, 2, '50000', 'order_LtQSFve9rIf8Ow', 'pay_LtQSeqlUwAJV4C', 'end', '{\"\\u0000*\\u0000attributes\":{\"id\":\"pay_LtQSeqlUwAJV4C\",\"entity\":\"payment\",\"amount\":5000000,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"card\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Payment for your order\",\"card_id\":\"card_LtQSet6Rzat5jc\",\"card\":{},\"bank\":null,\"wallet\":null,\"vpa\":null,\"email\":\"vemal26250@lidely.com\",\"contact\":\"+917405306034\",\"notes\":{},\"fee\":118000,\"tax\":18000,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{},\"created_at\":1684915113}}', 'card', 'INR', 'vemal26250@lidely.com', NULL, NULL, '2023-05-24 07:58:10', '2023-05-24 07:58:10'),
(16, 1, 3, '70000', 'order_LtTZVd3RrN3jf1', 'pay_LtTZqdXC7MtrWl', 'completed', '{\"\\u0000*\\u0000attributes\":{\"id\":\"pay_LtTZqdXC7MtrWl\",\"entity\":\"payment\",\"amount\":7000000,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"card\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Payment for your order\",\"card_id\":\"card_LtTZqhH5lOL2eu\",\"card\":{},\"bank\":null,\"wallet\":null,\"vpa\":null,\"email\":\"vemal26250@lidely.com\",\"contact\":\"+917405306034\",\"notes\":{},\"fee\":165200,\"tax\":25200,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{},\"created_at\":1684926086}}', 'card', 'INR', 'vemal26250@lidely.com', '2023-05-24 11:01:44', '2024-05-24 11:01:44', '2023-05-24 11:01:07', '2023-05-24 11:01:07'),
(17, 3, 1, '20000', 'order_LtVAKra026xlB7', 'pay_LtVBQ3SDsDfyHj', 'completed', '{\"\\u0000*\\u0000attributes\":{\"id\":\"pay_LtVBQ3SDsDfyHj\",\"entity\":\"payment\",\"amount\":2000000,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"card\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Payment for your order\",\"card_id\":\"card_LtVBQ5hwd9NwEa\",\"card\":{},\"bank\":null,\"wallet\":null,\"vpa\":null,\"email\":\"dipesh12121@gmail.com\",\"contact\":\"+917405306034\",\"notes\":{},\"fee\":47200,\"tax\":7200,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{},\"created_at\":1684931742}}', 'card', 'INR', 'dipesh12121@gmail.com', '2023-05-24 12:36:00', '2024-05-24 12:36:00', '2023-05-24 12:34:40', '2023-05-24 12:34:40'),
(18, 4, 2, '50000', 'order_LwAK7do3XaFCb2', 'pay_LwAKutKVaHfqrK', 'completed', '{\"\\u0000*\\u0000attributes\":{\"id\":\"pay_LwAKutKVaHfqrK\",\"entity\":\"payment\",\"amount\":5000000,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Payment for your order\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"7016107736@ybl\",\"email\":\"void@razorpay.com\",\"contact\":\"+917016107736\",\"notes\":{},\"fee\":118000,\"tax\":18000,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{},\"created_at\":1685513348}}', 'upi', 'INR', 'void@razorpay.com', '2023-05-31 06:09:22', '2024-05-31 06:09:22', '2023-05-31 06:08:23', '2023-05-31 06:08:23');

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
  `interval` enum('year','month','day') NOT NULL DEFAULT 'year',
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
(3, 'Premium', 'Large Companies', '70000', 'year', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '[\"Cras justo odio\",\"Dapibus ac facilisis in\",\"Vestibulum at eros\"]', '2023-04-14 06:13:45', '2023-05-24 09:41:20');

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
(2, 'Dipesh', 'Dipesh', 'loremtest@g.com', '123456', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, '2023-05-01 10:54:33', '2023-05-01 10:54:33'),
(3, 'Dipesh', 'dipesh123', 'dipesh1211@gmail.com', '123456789', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, '2023-05-24 11:30:48', '2023-05-24 11:30:48'),
(4, 'Sunil bhimani', 'Sunil bhimani', 'sunilbhimanikunad@gmail.com', '7016107736', NULL, '088c62882fe494fcf1a96a3e45a12e5e', NULL, '2023-05-31 05:07:28', '2023-05-31 05:07:28');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
