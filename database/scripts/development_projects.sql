-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 10:37 AM
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
-- Table structure for table `development_projects`
--

CREATE TABLE `development_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `governing_organizations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`governing_organizations`)),
  `logs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`logs`)),
  `protected_area` tinyint(4) NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `gazette_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `land_parcel_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `development_projects`
--

INSERT INTO `development_projects` (`id`, `title`, `governing_organizations`, `logs`, `protected_area`, `created_by_user_id`, `created_at`, `updated_at`, `deleted_at`, `gazette_id`, `status_id`, `land_parcel_id`) VALUES
(1, 'title', '[\"3\",\"4\"]', '0', 1, 2, '2020-11-14 21:26:34', '2020-11-14 21:26:34', NULL, 3, 1, 3),
(2, 'Title 2', '[\"4\",\"5\"]', '0', 1, 2, '2020-11-14 22:20:38', '2020-11-14 22:20:38', NULL, 3, 1, 3),
(3, 'title 3', '[\"1\",\"2\"]', '0', 0, 2, '2020-11-14 22:22:45', '2020-11-14 22:22:45', NULL, 1, 1, 2),
(4, 'title 4', '[\"2\",\"4\"]', '0', 0, 2, '2020-11-14 22:33:49', '2020-11-14 22:33:49', NULL, 3, 1, 2),
(5, 'title 5', '[\"3\",\"4\"]', '0', 0, 2, '2020-11-14 23:35:44', '2020-11-14 23:35:44', NULL, 3, 1, 3),
(6, 'title 5', '[\"2\",\"3\"]', '0', 0, 4, '2020-11-15 00:58:17', '2020-11-15 00:58:17', NULL, 2, 1, 4),
(7, 'title 5', '[\"2\",\"3\"]', '0', 0, 2, '2020-11-15 00:58:47', '2020-11-15 00:58:47', NULL, 2, 1, 4),
(8, 'title 5', '[\"2\",\"3\"]', '0', 0, 3, '2020-11-15 00:59:47', '2020-11-15 00:59:47', NULL, 2, 1, 4),
(9, 'title 5', '[\"2\",\"3\"]', '0', 0, 2, '2020-11-15 00:59:59', '2020-11-15 00:59:59', NULL, 2, 1, 4),
(10, 'Title 6', '[\"4\",\"5\"]', '0', 1, 3, '2020-11-15 01:06:26', '2020-11-15 01:06:26', NULL, 3, 1, 4),
(11, 'title 7', '[\"2\",\"3\",\"4\",\"5\"]', '0', 0, 2, '2020-11-15 01:07:09', '2020-11-15 01:07:09', NULL, 7, 1, 3),
(12, 'title 9', '[\"2\",\"3\",\"4\"]', '0', 1, 3, '2020-11-15 04:08:54', '2020-11-15 04:08:54', NULL, 3, 1, 3),
(13, 'title 10', '[\"2\",\"3\"]', '0', 0, 2, '2020-11-15 18:54:25', '2020-11-15 18:54:25', NULL, 2, 1, 3),
(14, 'title 11', '[\"2\",\"3\",\"4\",\"5\"]', '0', 1, 2, '2020-11-15 18:55:25', '2020-11-15 18:55:25', NULL, 3, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `development_projects`
--
ALTER TABLE `development_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `development_projects_gazette_id_foreign` (`gazette_id`),
  ADD KEY `development_projects_status_id_foreign` (`status_id`),
  ADD KEY `development_projects_land_parcel_id_foreign` (`land_parcel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `development_projects`
--
ALTER TABLE `development_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `development_projects`
--
ALTER TABLE `development_projects`
  ADD CONSTRAINT `development_projects_gazette_id_foreign` FOREIGN KEY (`gazette_id`) REFERENCES `gazettes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `development_projects_land_parcel_id_foreign` FOREIGN KEY (`land_parcel_id`) REFERENCES `land_parcels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `development_projects_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
