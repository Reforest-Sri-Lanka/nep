-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 10:39 AM
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
-- Database: `nep`
--

-- --------------------------------------------------------

--
-- Table structure for table `process_items`
--

CREATE TABLE `process_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` int(11) NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `request_organization` int(11) NOT NULL,
  `activity_organization` int(11) NOT NULL,
  `activity_user_id` int(11) NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prerequisite` tinyint(1) NOT NULL,
  `prerequisite_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `form_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `process_items`
--

INSERT INTO `process_items` (`id`, `form_id`, `created_by_user_id`, `request_organization`, `activity_organization`, `activity_user_id`, `remark`, `prerequisite`, `prerequisite_id`, `created_at`, `updated_at`, `deleted_at`, `form_type_id`, `status_id`) VALUES
(1, 9, 2, 2, 0, 0, '0', 0, 0, '2020-11-15 00:59:59', '2020-11-15 00:59:59', NULL, 2, 1),
(2, 10, 3, 2, 0, 0, '0', 0, 0, '2020-11-15 01:06:26', '2020-11-15 01:06:26', NULL, 2, 1),
(3, 11, 2, 2, 0, 0, '0', 0, 0, '2020-11-15 01:07:09', '2020-11-15 01:07:09', NULL, 2, 1),
(4, 12, 3, 2, 0, 0, '0', 0, 0, '2020-11-15 04:08:54', '2020-11-15 04:08:54', NULL, 2, 1),
(5, 13, 2, 2, 0, 0, '0', 0, 0, '2020-11-15 18:54:26', '2020-11-15 18:54:26', NULL, 2, 1),
(6, 13, 3, 3, 0, 0, '0', 0, 0, '2020-11-15 18:54:26', '2020-11-15 18:54:26', NULL, 2, 1),
(7, 14, 2, 2, 0, 0, '0', 0, 0, '2020-11-15 18:55:25', '2020-11-15 18:55:25', NULL, 2, 1),
(8, 14, 3, 3, 0, 0, '0', 0, 0, '2020-11-15 18:55:25', '2020-11-15 18:55:25', NULL, 2, 1),
(9, 14, 2, 4, 0, 0, '0', 0, 0, '2020-11-15 18:55:25', '2020-11-15 18:55:25', NULL, 2, 1),
(10, 14, 2, 5, 0, 0, '0', 0, 0, '2020-11-15 18:55:25', '2020-11-15 18:55:25', NULL, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `process_items`
--
ALTER TABLE `process_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `process_items_status_id_foreign` (`status_id`),
  ADD KEY `process_items_form_type_id_foreign` (`form_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `process_items`
--
ALTER TABLE `process_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `process_items`
--
ALTER TABLE `process_items`
  ADD CONSTRAINT `process_items_form_type_id_foreign` FOREIGN KEY (`form_type_id`) REFERENCES `form_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `process_items_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
