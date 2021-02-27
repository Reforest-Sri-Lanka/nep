-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 11:07 AM
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
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `title`, `city`, `country`, `type_id`, `description`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Reforest Sri Lanka', 'Colombo', 'Sri Lanka', '1', '', '2020-11-06 09:53:42', NULL, 1, NULL),
(2, 'Ministry of Environment', 'Battaramulla', 'Sri Lanka', '2', '', '2020-11-06 09:56:03', NULL, 1, NULL),
(3, 'Central Environmental Authority', 'Colombo', 'Sri Lanka', 2, '', '2020-11-06 04:29:13', NULL, 1, NULL),
(4, 'Ministry of Wildlife', 'Colombo', 'Sri Lanka', 2, '', '2020-11-06 04:29:55', NULL, 1, NULL),
(5, 'Road Development Authority', 'Colombo', 'Sri Lanka', 2, '', '2020-11-06 04:30:48', NULL, 1, NULL);

