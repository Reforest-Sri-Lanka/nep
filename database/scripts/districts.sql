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
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Ampara', '2020-11-17 09:23:46', NULL, 1, NULL),
(2, 'Anuradhapura', '2020-11-17 09:29:46', NULL, 1, NULL),
(3, 'Badulla', '2020-11-17 09:29:46', NULL, 1, NULL),
(4, 'Batticaloa', '2020-11-17 09:29:46', NULL, 1, NULL),
(5, 'Colombo', '2020-11-17 09:29:46', NULL, 1, NULL),
(6, 'Galle', '2020-11-17 09:29:46', NULL, 1, NULL),
(7, 'Gampaha', '2020-11-17 09:29:46', NULL, 1, NULL),
(8, 'Hambantota', '2020-11-17 09:29:46', NULL, 1, NULL),
(9, 'Jaffna', '2020-11-17 09:29:46', NULL, 1, NULL),
(10, 'Kalutara', '2020-11-17 09:29:46', NULL, 1, NULL),
(11, 'Kandy', '2020-11-17 09:29:46', NULL, 1, NULL),
(12, 'Kegalle', '2020-11-17 09:29:46', NULL, 1, NULL),
(13, 'Kilinochchi', '2020-11-17 09:29:46', NULL, 1, NULL),
(14, 'Kurunegala', '2020-11-17 09:29:46', NULL, 1, NULL),
(15, 'Mannar', '2020-11-17 09:29:46', NULL, 1, NULL),
(16, 'Matale', '2020-11-17 09:29:46', NULL, 1, NULL),
(17, 'Matara', '2020-11-17 09:29:46', NULL, 1, NULL),
(18, 'Monaragala', '2020-11-17 09:29:46', NULL, 1, NULL),
(19, 'Mullaitivu', '2020-11-17 09:29:46', NULL, 1, NULL),
(20, 'Nuwara Eliya', '2020-11-17 09:29:46', NULL, 1, NULL),
(21, 'Polonnaruwa', '2020-11-17 09:29:46', NULL, 1, NULL),
(22, 'Puttalam', '2020-11-17 09:29:46', NULL, 1, NULL),
(23, 'Ratnapura', '2020-11-17 09:29:46', NULL, 1, NULL),
(24, 'Trincomalee', '2020-11-17 09:29:46', NULL, 1, NULL),
(25, 'Vavuniya', '2020-11-17 09:29:46', NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
