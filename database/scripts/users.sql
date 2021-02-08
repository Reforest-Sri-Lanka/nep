-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2020 at 12:25 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designation_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `created_by_user_id`, `remember_token`, `created_at`, `updated_at`, `status`, `deleted_at`, `role_id`, `organization_id`, `designation_id`) VALUES
(2, 'Bojitha Piyatilleke', 'boji@yahoo.com', '2020-11-05 18:04:42', '$2y$10$naVkPx5K0iW7PzW/z9cfXO8ZM64k191EA4PtlKRdPXaIbpRyKDQi6', NULL, NULL, 0, NULL, '2020-11-05 18:04:17', '2020-11-08 19:16:21', 1, NULL, 1, 1, 4),
(3, 'Senal Hewage', 'senal@yahoo.com', '2020-11-05 18:51:28', '$2y$10$aQKl0mccMLeFACu49Phd/eQIGwAzr.nSdJUg.CpmGZpqjYfK.0iAG', NULL, NULL, 0, NULL, '2020-11-05 18:51:19', '2020-11-07 20:45:31', 1, NULL, 3, 3, 2),
(4, 'Thidas Perera', 'thidas@yahoo.com', '2020-11-05 18:51:57', '$2y$10$9yhxcd2voxOAUXSBIxLSsubp4pvlLfF1jow6tPNgEwY0yZ5fsGxI6', NULL, NULL, 0, '5CVq4QncsiXfYiVPkCMK97hrxmWn12nNWOd39mQJNXikToLt5kU823TUOK6E', '2020-11-05 18:51:47', '2020-11-13 00:26:27', 1, NULL, 3, 3, 5),
(5, 'Sharuka Perera', 'sharuka@yahoo.com', '2020-11-05 18:52:33', '$2y$10$txPjtcvlhyqfxP2aCQ8DYevyVVWYe8a/ljiTDsnQmFb.tFH6AyOaC', NULL, NULL, 0, NULL, '2020-11-05 18:52:22', '2020-11-13 01:15:17', 1, NULL, 4, 2, 2),
(6, 'Benjamin Subasinghe', 'benjamin@yahoo.com', '2020-11-05 18:53:11', '$2y$10$8MgZnq29OAFAGpIfN5CuLud3MbQZO5dmMTPETIOgkcIFWOgVnPPS6', NULL, NULL, 0, NULL, '2020-11-05 18:53:03', '2020-11-07 22:53:38', 1, NULL, 4, 3, 1),
(7, 'Dion Weiman', 'dionwei@gmail.com', '2020-11-05 19:27:05', '$2y$10$eVSi6Qwnf1OgEcAuMh.XAOC6muhwT6pOvZY1Kgw8XfCir22/br8Tu', NULL, NULL, 0, NULL, '2020-11-05 19:17:04', '2020-11-08 05:35:31', 1, NULL, 4, 4, 5),
(8, 'Chayu Damsinghe', 'chayu@yahoo.com', '2020-11-05 19:27:47', '$2y$10$4TS0d9TIyPROVTGTP80A.eRlZpEnlC4K3D6P0Rx6cr.20cw9iCxEi', NULL, NULL, 0, NULL, '2020-11-05 19:27:37', '2020-11-06 23:17:44', 0, NULL, NULL, NULL, NULL),
(13, 'Hammond Silva', 'hammondsilva@yahoo.com', NULL, '$2y$10$GMsvdbj/bQpezQYLytYDG.6Uu5Ra4aomhXIwomSWlh/bMuPh0sOyu', NULL, NULL, 2, NULL, '2020-11-07 01:41:44', '2020-11-08 19:12:45', 1, NULL, 5, 3, 3),
(14, 'Bobby Shades', 'bobby@gmail.com', NULL, '$2y$10$jUB/fSIiIxcjQMh90hRa..asNS19VoEi7a1qNsJtECSM4AktSXMSq', NULL, NULL, 2, NULL, '2020-11-07 01:51:11', '2020-11-07 22:41:03', 1, NULL, 4, 2, 7),
(19, 'Sarah', 'sarah@yahoo.com', NULL, '$2y$10$xHzN.6IxzDSLe/qDObMofOrlqXEVGiurVhwp/Dtf4bnPk1x2z31xy', NULL, NULL, 2, NULL, '2020-11-07 01:56:48', '2020-11-07 01:56:48', 0, NULL, NULL, NULL, NULL),
(20, 'Gordon', 'gordon@yahoo.com', NULL, '$2y$10$uGkEyLDciZD1P5QgLBzEW.DNfCZEWDuVfvVPJ2FxZeB8pYquwb3tu', NULL, NULL, 2, NULL, '2020-11-07 01:57:40', '2020-11-07 01:59:04', 0, NULL, NULL, NULL, NULL),
(21, 'Samuel Jackson', 'sam@gmail.com', NULL, '$2y$10$xfyH2kQfUQ4GOTxWFpFALO7ejS1zKzfIUs7Nc1oKi8PYEdSDvp6WO', NULL, NULL, 2, NULL, '2020-11-07 15:52:21', '2020-11-07 17:44:02', 0, NULL, NULL, NULL, NULL),
(22, 'Samantha Perera', 'samantha@gmail.com', '2020-11-07 22:34:08', '$2y$10$/ZjyZnCEdOUt90w8byo5Uuj1E/nkzNlGNSJ9eZnSDE71qJ/Iq5pT.', NULL, NULL, 2, NULL, '2020-11-07 16:49:50', '2020-11-07 22:34:08', 1, NULL, 3, 2, 4),
(24, 'Jason Weins', 'jason@yahoo.com', NULL, '$2y$10$uRs2oujzEG49J29QmYPy.eV3/IjuFrPl1cMGdhmv.xCuyylNei9ya', NULL, NULL, 5, NULL, '2020-11-07 20:46:40', '2020-11-13 02:47:34', 1, NULL, 4, 3, 3),
(25, 'Danielle O\'Hare', 'danielle@yahoo.com', NULL, '$2y$10$F6z8nGfbjVcskgwC.q3NJuD5AflhuTsfyid0lvhq47B2ky.FYybQC', NULL, NULL, 22, NULL, '2020-11-07 22:35:32', '2020-11-07 22:35:32', 1, NULL, 4, 2, 2),
(26, 'Dora Explorer', 'dora@gmail.com', NULL, '$2y$10$Vt4TUy/3KQuRDHo5Ha6cCO9OTQ71IV5YFK/ZdXwT9PclRqDf62KI6', NULL, NULL, 6, NULL, '2020-11-07 22:44:35', '2020-11-08 01:01:53', 1, NULL, 4, 3, 4),
(27, 'Robert Pattinson', 'robert@yahoo.com', NULL, '$2y$10$B6miY0ubNnYBHmh0rXMzPO3sEeyoBbMrQDvN6NG5M515OexMWfeyq', NULL, NULL, 0, NULL, '2020-11-08 01:15:08', '2020-11-12 23:33:04', 1, NULL, 3, 4, 5),
(28, 'Robert Pattinson', 'robert@gmail.com', '2020-11-08 01:17:58', '$2y$10$dm8ETEZOyloRioSa5963SO/cxOqazANkDZmprs1FbhWQ7iV38DSuC', NULL, NULL, 0, NULL, '2020-11-08 01:17:44', '2020-11-13 01:14:46', 1, NULL, 4, 2, 4),
(29, 'Dan Abraham', 'danny@gmail.com', '2020-11-08 03:05:23', '$2y$10$hcWVVsE0EgfgbJ.GKGX6eOAHV6k7zC3C5sQPnkQYUre2PP.q.2cc.', NULL, NULL, 0, NULL, '2020-11-08 03:05:05', '2020-11-08 03:05:23', 0, NULL, NULL, NULL, NULL),
(30, 'Harriot Everfield', 'harriot@gmail.com', '2020-11-08 05:12:47', '$2y$10$ow17YNMmBiNGmjTkQni2Zu1uNcRpvy/pqsJzlzQ8Mo6x3bGZbrxN.', NULL, NULL, 0, NULL, '2020-11-08 05:12:09', '2020-11-08 05:25:17', 1, NULL, 4, 4, 5),
(33, 'Abraham Lincoln', 'abraham@yahoo.com', NULL, '$2y$10$x.rnLdzw2ZGd9vnKmcPDyuN05HhVX8gsBvczxFC.V3HGUFgppc45.', NULL, NULL, 2, NULL, '2020-11-08 16:05:15', '2020-11-13 01:03:06', 1, NULL, 5, 3, 5),
(34, 'Natasha Butterfield', 'natasha33@yahoo.com', NULL, '$2y$10$wgVa8Fa3BdtLgjuT5Ep6zOniTI6kH/w.vWI6.fqgqkaaWvrzr/nNK', NULL, NULL, 2, NULL, '2020-11-08 16:05:42', '2020-11-13 05:37:14', 1, NULL, 5, 3, 2),
(35, 'Margaret Beers', 'beer@yahoo.com', NULL, '$2y$10$pynGHbs7PelUBHidVvEXkeLlFqyJKZkPBhftxqHjDYaXPtxu9fl2.', NULL, NULL, 2, NULL, '2020-11-08 16:06:05', '2020-11-08 17:46:15', 1, NULL, 5, 3, 7),
(36, 'Filip Fernando', 'filipfur@gmail.com', NULL, '$2y$10$R.wmkR9lZqb400vsEbDw/.P79PVvZzDpFyYWxzjWhJoidBH4ZWEvK', NULL, NULL, 2, NULL, '2020-11-08 16:07:01', '2020-11-13 05:43:31', 1, NULL, 5, 3, 2),
(37, 'Harry Jacobs', 'harr@yahoo.com', NULL, '$2y$10$9zTtsxOk4jQ5I.PeVkaBfuNWy5akFofmmFnDiyjxA9KqTuxx4zA3y', NULL, NULL, 2, NULL, '2020-11-08 16:09:04', '2020-11-08 16:35:25', 1, NULL, 5, 2, 4),
(38, 'Matt Stonie', 'matthew@yahoo.com', NULL, '$2y$10$dFvMKrcaDO/Kl6KiNudAuukKCl9UISODOg5Zl2.ZLMILti9eRQlz.', NULL, NULL, 2, NULL, '2020-11-08 16:09:33', '2020-11-08 16:35:32', 1, NULL, 5, 2, 4),
(41, 'Dan Daniel', 'dan@gmail.com', NULL, '$2y$10$P.wjVJkYSFltXwFqfJPzROd86ofL1Z09LxhzXGm1yYkDDH58g2Ufa', NULL, NULL, 2, NULL, '2020-11-08 19:15:10', '2020-11-08 19:15:10', 1, NULL, 4, 2, 4),
(43, 'Aaron Fernando', 'aaron@yahoo.com', NULL, '$2y$10$uktnCOHUUveA1dvr.0Xe4eiAonkKclDeS2UjtgqLb4d9D4EcJsWJW', NULL, NULL, 4, NULL, '2020-11-13 00:37:09', '2020-11-13 00:37:09', 1, NULL, 4, 3, 4),
(45, 'Adam Savage', 'adam@gmail.com', NULL, '$2y$10$uK3xyW54dSMELlQx8.z67OxyadTCZbxy9uDJtTKipsF5FeLWC5fJa', NULL, NULL, 6, NULL, '2020-11-13 01:17:34', '2020-11-13 01:17:34', 1, NULL, 5, 3, 6),
(46, 'Daniel Radcliffe', 'harry@yahoo.com', NULL, '$2y$10$S1.JM2kapWqu9I4BRzLYBeLYZeJTaV3t1pz8V0K.xDpRWxP4g84YG', NULL, NULL, 3, NULL, '2020-11-13 05:52:26', '2020-11-13 05:52:26', 1, NULL, 4, 1, 3),
(47, 'Thomas Edison', 'tommy@gmail.com', NULL, '$2y$10$xavA2IRf/qoXKBaQevw9iOlVL3g7qyQcuXrVNPoFDUCJ2VS4ekVUy', NULL, NULL, 3, NULL, '2020-11-13 05:53:48', '2020-11-13 05:53:48', 1, NULL, 4, 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_designation_id_foreign` (`designation_id`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_organization_id_foreign` (`organization_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
