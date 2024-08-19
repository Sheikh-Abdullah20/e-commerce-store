-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 11:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`) VALUES
(2, 'Cooking', 'category_image/IjYnLIx5TqNYtzJkC0FXTN4kiMRPAyZpztEBZsFc.jpg'),
(7, 'Food', 'category_image/BZwaz42ieU5g1wSqFTfegxNMkLgJ2SkW2Ee1EVXq.jpg'),
(14, 'Drinks', 'category_images/9aXtE5Y9ugkJMSRoFyEmABblDnkBmdPCrf8Y0Xkc.jpg'),
(15, 'Books', 'category_images/Pf0lUqedXtX5UP9v3qjF784HbhIyGsqWTo1NB9JO.jpg'),
(16, 'Toys', 'category_images/Wuets3YyZXrD4koVU6wMnoW56QkjHLeIdkqCf8Xa.jpg');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(5, '0001_01_01_000000_create_users_table', 1),
(6, '0001_01_01_000001_create_cache_table', 1),
(7, '0001_01_01_000002_create_jobs_table', 1),
(8, '2024_08_16_154323_create_permission_tables', 1),
(10, '2024_08_17_055837_update_users_table', 2),
(12, '2024_08_17_081149_create_categories_table', 3),
(15, '2024_08_17_091556_create_products_table', 4),
(17, '2024_08_17_100540_update_products_table', 5),
(18, '2024_08_17_144517_update_categories_table', 6),
(22, '2024_08_19_081732_create_subsriptions_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` longtext NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `product_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `product_category_id`, `product_image`) VALUES
(6, 'Seeds Of Change Organic', 'Seeds Of Change Organic is the  Best Product', 50, 7, 'product_image/H1x5TPsL21RcGnKpRXTQV34z1S3lcXMmePrfNo3N.jpg'),
(7, 'All Natural Italian Style-Chicken', 'All Natural Italian Style-Chicken is Our Best Product', 100, 7, 'product_image/zrW55CEVbsJM0r70mp6lrtFo5rJ2DF8cxdRGmFZ8.jpg'),
(8, 'Boomchick apop Sweet & Salty', 'Boomchick apop Sweet & Salty is the best product', 100, 7, 'product_image/AWXCLrzAWpskeQlwTvZzUGtsKnMVe4ZXo3WqvLnZ.jpg'),
(11, 'Mighty Muffin', 'Mighty Muffin is Our Best Product', 200, 2, 'product_image/JJKB9wdomiZdVBRP74aebH6U5krsiQ6BS1yCmrlp.jpg'),
(12, 'Seeds Of Change Organic', 'Seeds Of Change Organic is out best product', 100, 7, 'product_image/pnvtnl72bCVZyTXkhhzN2lBgVeOywk6Kx9KbIsLg.jpg'),
(13, 'Seeds Of Change Organic', 'Seeds Of Change Organic is out best product', 200, 7, 'product_image/ujuyesBsBHojzYeQg6YfkMUGayIqphEMqEVApZMi.jpg'),
(14, 'Seeds Of Change Organic', 'Seeds Of Change Organic is out Best Product', 150, 7, 'product_image/1rwxS3lXgOoBc781fSiz2gPMEmNUwER1N0IIbX0q.jpg'),
(15, 'Seeds Of Change Organic', 'Seeds Of Change Organic is our best product', 120, 7, 'product_image/QWCnU5lBgrhqr33gzi7iApnMJqVRD67HlNne5Zh2.jpg'),
(16, 'Seeds Of Change Organic', 'Seeds Of Change Organic is our best product', 80, 7, 'product_image/WGnwBCSG8hJyOVRIcDGOV2VYBuK5jAveKWXPUSoH.jpg'),
(17, 'Seeds Of Change Organic', 'Seeds Of Change Organic is our best product', 90, 7, 'product_image/4OlWdQ7CXsuUAxJ2kb41MxXeGe6WeUyChh0YvM2Y.jpg'),
(18, 'Mango Juice', 'Mango Juice is Our Best Product', 103, 14, 'product_image/OTdw5QUA7n3womdIY8FZaxKdcWF5DeoNEJcmIq2W.jpg'),
(19, 'King Of Juice', 'King Of Juice is Our Best Product', 500, 14, 'product_image/c1h4iC8Khwbj69M71KZzbSiOtUTwRVpTkYOPZE4d.jpg'),
(20, 'Food King', 'Food King  is Our Best Thali', 200, 7, 'product_image/yy1TMpVNwXccWr4nkVnVXE47rFHvpp95CxpolKzb.jpg'),
(21, 'Food Master', 'Food Master is Our Best Item', 100, 7, 'product_image/fzq2tFePKdQ3bL8tlbXtqKTVK78rogedtk2XsqPz.jpg'),
(22, 'Books on ScienceDirect | Elsevier', 'Books on ScienceDirect | Elsevier is our best Book', 50, 15, 'product_image/NvKCIwtO3NFNfVtY9DmQA6MbIIdTkdpqPn7w4beJ.jpg'),
(23, 'Unusual Books Find Here..', 'Unusual Books Find Here.. we have Unusuual Books', 80, 15, 'product_image/2IDA01XB9LqSpSoRbgiksWtIBCoHA4uEjAetrPwk.jpg'),
(24, 'Green Toys Car Carrier Vehicle Set Toy', 'Green Toys Car Carrier Vehicle Set Toy', 150, 16, 'product_image/dljBJvEgiU2z7AfiHS4beFUQ284Z84fGnagCInwq.jpg'),
(25, 'Toys for kids', 'Toys for kids this toy is best for todays kid', 100, 16, 'product_image/dkJ6B10sA3j7oIY5k6GVNzIxAEwNeFYglkdm0UZz.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2024-08-16 18:01:18', '2024-08-16 18:01:18'),
(2, 'admin', 'web', '2024-08-16 18:01:27', '2024-08-16 18:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6Tcg3IZ5NTtREAbU3UexGup1iwJOBFFqoUeACC9d', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRnJ3VHNFMlloQzlhQjMwZmZvY0hBNllXQlpJUkhNTHNYZUpoYnJWRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1724057110),
('P7iGxpRgmUc0pfUMKoRlad6HiJfR9hezkxsUyC4j', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZzNra0pKSWNmNHNTblhkaW9mSm11bTVXa0dVMlhSZ3BleWNQQlExSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7fQ==', 1723991627);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', '2024-08-19 03:48:14', '2024-08-19 03:48:14'),
(2, 'user@gmail.com', '2024-08-19 03:49:08', '2024-08-19 03:49:08'),
(3, 'ajoher124@gmail.com', '2024-08-19 03:50:29', '2024-08-19 03:50:29'),
(4, 'ajoher124@gmail.com', '2024-08-19 03:52:42', '2024-08-19 03:52:42'),
(5, 'ajoher124@gmail.com', '2024-08-19 03:54:27', '2024-08-19 03:54:27'),
(6, 'ajoher124@gmail.com', '2024-08-19 03:54:43', '2024-08-19 03:54:43'),
(7, 'ajoher124@gmail.com', '2024-08-19 03:55:25', '2024-08-19 03:55:25'),
(8, 'ajoher124@gmail.com', '2024-08-19 03:56:10', '2024-08-19 03:56:10'),
(9, 'ajoher124@gmail.com', '2024-08-19 03:56:30', '2024-08-19 03:56:30'),
(10, 'ajoher124@gmail.com', '2024-08-19 03:57:02', '2024-08-19 03:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abdullah', 'abdullahsheikhmuhammad21@gmail.com', '2024-08-17 08:30:17', '$2y$12$3/3xuceMBMBzvGpDEh2YhOI6NtZavEeyqtax3BqFXMqzT8T2XkTIq', 'profile/BAp9LseBce4boUXNnISBPjVmbm7PNdMt80bEmS2k.jpg', '0Lw0CNGNaaO7Rdh6DVpzDaWYpqIF1FoguncEoKCu887zZXrcQi2O3ut3iOJV', '2024-08-16 13:02:39', '2024-08-17 08:50:40'),
(4, 'Sheikh Abdullah', 'user@gmail.com', NULL, '$2y$12$n1ynr/5NEZCJ9AikZkQgWOjyyw2DZa1.AvvYhtpn.NvF.wtI0U3Xe', 'profile/iQgWmcPKAoSg1o0zAsfrrX4xRtbaPgO3n4YYhrOH.jpg', NULL, '2024-08-16 13:10:34', '2024-08-18 06:04:29'),
(9, 'Abdullah - Test', 'test@gmail.com', NULL, '$2y$12$vEi5XB.0Rzf.D0pxWf.aHun7c3vT.LE1qB7pu4ftBNyQZ49sMRRjW', 'profile/MKt7lAxBBSynBxL5vlnkaqab76dMsT557OuZQ8TE.jpg', '2QbbiK5jgXQ29C3qbZt0HE2jcG1tXoCLeqIpzbxWANWq5oCNUfNeMk9H3uic', '2024-08-18 08:48:48', '2024-08-18 09:32:26'),
(10, 'Abdullah', 'ajoher124@gmail.com', NULL, '$2y$12$oyRw7j0K22YC19I4tHGUEeDcH16Xr2EGEAv0Lw9p27MmUet/3qJ4K', 'profile/x8bqWNskySQYlDnkPN75aOpKBJ8lTlEe578BRl1c.jpg', NULL, '2024-08-19 03:50:07', '2024-08-19 03:50:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
