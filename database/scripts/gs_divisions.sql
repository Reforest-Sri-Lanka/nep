-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 10:38 AM
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
-- Table structure for table `gs_divisions`
--

CREATE TABLE `gs_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gs_division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gs_divisions`
--

INSERT INTO `gs_divisions` (`id`, `gs_division`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'one', '2020-11-17 09:35:12', NULL, 1, NULL),
(2, 'two', '2020-11-17 09:36:00', NULL, 1, NULL),
(3, 'three', '2020-11-17 09:36:00', NULL, 1, NULL),
(4, 'four', '2020-11-17 09:36:00', NULL, 1, NULL),
(5, 'five', '2020-11-17 09:36:00', NULL, 1, NULL),
(6, 'six', '2020-11-17 09:36:00', NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_divisions`
--
ALTER TABLE `gs_divisions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_divisions`
--
ALTER TABLE `gs_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
