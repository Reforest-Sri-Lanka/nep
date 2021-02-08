-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 08:51 AM
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
-- Table structure for table `land_parcels`
--

CREATE TABLE `land_parcels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `governing_organizations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`governing_organizations`)),
  `logs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`logs`)),
  `polygon` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`polygon`)),
  `created_by_user_id` int(11) NOT NULL,
  `protected_area` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_parcels`
--

INSERT INTO `land_parcels` (`id`, `title`, `governing_organizations`, `logs`, `polygon`, `created_by_user_id`, `protected_area`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'LP1', '[\"1\",\"2\"]', '[\"\"]', '[\"\"]', 1, 1, '2020-11-15 09:17:14', NULL, 1, NULL),
(2, 'LP2', '[\"1\",\"3\"]', '[\"\"]', '[\"\"]', 1, 1, '2020-11-15 09:18:39', NULL, 1, NULL),
(3, 'LP3', '[\"4\",\"2\"]', '[\"\"]', '[\"\"]', 1, 1, '2020-11-15 09:18:39', NULL, 1, NULL),
(4, 'LP4', '[\"5\",\"3\"]', '[\"\"]', '[\"\"]', 1, 1, '2020-11-15 09:18:39', NULL, 1, NULL),
(5, 'LP5', '[\"7\",\"2\"]', '[\"\"]', '[\"\"]', 1, 1, '2020-11-15 09:18:39', NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `land_parcels`
--
ALTER TABLE `land_parcels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `land_parcels`
--
ALTER TABLE `land_parcels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
