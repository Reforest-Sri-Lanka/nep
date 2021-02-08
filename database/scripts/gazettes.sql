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
-- Table structure for table `gazettes`
--

CREATE TABLE `gazettes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gazette_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gazetted_date` date NOT NULL,
  `degazetted_date` date NOT NULL,
  `organizations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`organizations`)),
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gazettes`
--

INSERT INTO `gazettes` (`id`, `title`, `gazette_number`, `gazetted_date`, `degazetted_date`, `organizations`, `content`, `created_by_user_id`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Gazette 1', 'gz101', '2020-11-15', '0000-00-00', '[\"1\",\"2\",\"3\"]', 'Test', 1, '2020-11-15 09:13:35', NULL, 1, NULL),
(2, 'Gazette 2', 'gz101', '2020-11-15', '0000-00-00', '[\"4\",\"2\",\"3\"]', 'Test', 1, '2020-11-15 09:15:26', NULL, 1, NULL),
(3, 'Gazette 3', 'gz101', '2020-11-15', '0000-00-00', '[\"1\",\"5\",\"3\"]', 'Test', 1, '2020-11-15 09:15:26', NULL, 1, NULL),
(4, 'Gazette 4', 'gz101', '2020-11-15', '0000-00-00', '[\"7\",\"2\",\"3\"]', 'Test', 1, '2020-11-15 09:15:26', NULL, 1, NULL),
(5, 'Gazette 5', 'gz101', '2020-11-15', '0000-00-00', '[\"4\",\"5\",\"3\"]', 'Test', 1, '2020-11-15 09:15:26', NULL, 1, NULL),
(6, 'Gazette 6', 'gz101', '2020-11-15', '0000-00-00', '[\"5\",\"1\",\"3\"]', 'Test', 1, '2020-11-15 09:15:26', NULL, 1, NULL),
(7, 'Gazette 7', 'gz101', '2020-11-15', '0000-00-00', '[\"3\",\"2\"]', 'Test', 1, '2020-11-15 09:15:26', NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gazettes`
--
ALTER TABLE `gazettes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gazettes`
--
ALTER TABLE `gazettes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
