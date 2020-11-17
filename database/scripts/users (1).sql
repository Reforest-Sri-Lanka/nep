--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `created_by_user_id`, `remember_token`, `created_at`, `updated_at`, `status`, `deleted_at`, `role_id`, `organization_id`, `designation_id`) VALUES
(2, 'Bojitha Piyatilleke', 'boji@yahoo.com', '2020-11-05 23:34:42', '$2y$10$naVkPx5K0iW7PzW/z9cfXO8ZM64k191EA4PtlKRdPXaIbpRyKDQi6', NULL, NULL, 0, NULL, '2020-11-05 23:34:17', '2020-11-09 00:46:21', 1, NULL, 1, 1, 4),
(3, 'Senal Hewage', 'senal@yahoo.com', '2020-11-06 00:21:28', '$2y$10$aQKl0mccMLeFACu49Phd/eQIGwAzr.nSdJUg.CpmGZpqjYfK.0iAG', NULL, NULL, 0, NULL, '2020-11-06 00:21:19', '2020-11-08 02:15:31', 1, NULL, 3, 3, 2),
(4, 'Thidas Perera', 'thidas@yahoo.com', '2020-11-06 00:21:57', '$2y$10$9yhxcd2voxOAUXSBIxLSsubp4pvlLfF1jow6tPNgEwY0yZ5fsGxI6', NULL, NULL, 0, '1wYL6FhBtpPqhsVJNCCQijEjk7x1WXGHzI5jjjjcp0T4UC7ofBIrmz5YhT1l', '2020-11-06 00:21:47', '2020-11-09 00:49:53', 1, NULL, 2, 3, 5),
(5, 'Sharuka Perera', 'sharuka@yahoo.com', '2020-11-06 00:22:33', '$2y$10$txPjtcvlhyqfxP2aCQ8DYevyVVWYe8a/ljiTDsnQmFb.tFH6AyOaC', NULL, NULL, 0, NULL, '2020-11-06 00:22:22', '2020-11-08 22:05:15', 1, NULL, 3, 2, 2),
(6, 'Benjamin Subasinghe', 'benjamin@yahoo.com', '2020-11-06 00:23:11', '$2y$10$8MgZnq29OAFAGpIfN5CuLud3MbQZO5dmMTPETIOgkcIFWOgVnPPS6', NULL, NULL, 0, NULL, '2020-11-06 00:23:03', '2020-11-08 04:23:38', 1, NULL, 4, 3, 1),
(7, 'Dion Weiman', 'dionwei@gmail.com', '2020-11-06 00:57:05', '$2y$10$eVSi6Qwnf1OgEcAuMh.XAOC6muhwT6pOvZY1Kgw8XfCir22/br8Tu', NULL, NULL, 0, NULL, '2020-11-06 00:47:04', '2020-11-08 11:05:31', 1, NULL, 4, 4, 5),
(8, 'Chayu Damsinghe', 'chayu@yahoo.com', '2020-11-06 00:57:47', '$2y$10$4TS0d9TIyPROVTGTP80A.eRlZpEnlC4K3D6P0Rx6cr.20cw9iCxEi', NULL, NULL, 0, NULL, '2020-11-06 00:57:37', '2020-11-07 04:47:44', 0, NULL, NULL, NULL, NULL),
(13, 'Hammond Silva', 'hammondsilva@yahoo.com', NULL, '$2y$10$GMsvdbj/bQpezQYLytYDG.6Uu5Ra4aomhXIwomSWlh/bMuPh0sOyu', NULL, NULL, 2, NULL, '2020-11-07 07:11:44', '2020-11-09 00:42:45', 1, NULL, 5, 3, 3),
(14, 'Bobby Shades', 'bobby@gmail.com', NULL, '$2y$10$jUB/fSIiIxcjQMh90hRa..asNS19VoEi7a1qNsJtECSM4AktSXMSq', NULL, NULL, 2, NULL, '2020-11-07 07:21:11', '2020-11-08 04:11:03', 1, NULL, 4, 2, 7),
(19, 'Sarah', 'sarah@yahoo.com', NULL, '$2y$10$xHzN.6IxzDSLe/qDObMofOrlqXEVGiurVhwp/Dtf4bnPk1x2z31xy', NULL, NULL, 2, NULL, '2020-11-07 07:26:48', '2020-11-07 07:26:48', 0, NULL, NULL, NULL, NULL),
(20, 'Gordon', 'gordon@yahoo.com', NULL, '$2y$10$uGkEyLDciZD1P5QgLBzEW.DNfCZEWDuVfvVPJ2FxZeB8pYquwb3tu', NULL, NULL, 2, NULL, '2020-11-07 07:27:40', '2020-11-07 07:29:04', 0, NULL, NULL, NULL, NULL),
(21, 'Samuel Jackson', 'sam@gmail.com', NULL, '$2y$10$xfyH2kQfUQ4GOTxWFpFALO7ejS1zKzfIUs7Nc1oKi8PYEdSDvp6WO', NULL, NULL, 2, NULL, '2020-11-07 21:22:21', '2020-11-07 23:14:02', 0, NULL, NULL, NULL, NULL),
(22, 'Samantha Perera', 'samantha@gmail.com', '2020-11-08 04:04:08', '$2y$10$/ZjyZnCEdOUt90w8byo5Uuj1E/nkzNlGNSJ9eZnSDE71qJ/Iq5pT.', NULL, NULL, 2, NULL, '2020-11-07 22:19:50', '2020-11-08 04:04:08', 1, NULL, 3, 2, 4),
(24, 'Jason Weins', 'jason@yahoo.com', NULL, '$2y$10$uRs2oujzEG49J29QmYPy.eV3/IjuFrPl1cMGdhmv.xCuyylNei9ya', NULL, NULL, 5, NULL, '2020-11-08 02:16:40', '2020-11-08 02:16:40', 1, NULL, 4, 3, 2),
(25, 'Danielle O\'Hare', 'danielle@yahoo.com', NULL, '$2y$10$F6z8nGfbjVcskgwC.q3NJuD5AflhuTsfyid0lvhq47B2ky.FYybQC', NULL, NULL, 22, NULL, '2020-11-08 04:05:32', '2020-11-08 04:05:32', 1, NULL, 4, 2, 2),
(26, 'Dora Explorer', 'dora@gmail.com', NULL, '$2y$10$Vt4TUy/3KQuRDHo5Ha6cCO9OTQ71IV5YFK/ZdXwT9PclRqDf62KI6', NULL, NULL, 6, NULL, '2020-11-08 04:14:35', '2020-11-08 06:31:53', 1, NULL, 4, 3, 4),
(27, 'Robert Pattinson', 'robert@yahoo.com', NULL, '$2y$10$B6miY0ubNnYBHmh0rXMzPO3sEeyoBbMrQDvN6NG5M515OexMWfeyq', NULL, NULL, 0, NULL, '2020-11-08 06:45:08', '2020-11-08 06:45:08', 0, NULL, NULL, NULL, NULL),
(28, 'Robert Pattinson', 'robert@gmail.com', '2020-11-08 06:47:58', '$2y$10$dm8ETEZOyloRioSa5963SO/cxOqazANkDZmprs1FbhWQ7iV38DSuC', NULL, NULL, 0, NULL, '2020-11-08 06:47:44', '2020-11-08 06:47:58', 0, NULL, NULL, NULL, NULL),
(29, 'Dan Abraham', 'danny@gmail.com', '2020-11-08 08:35:23', '$2y$10$hcWVVsE0EgfgbJ.GKGX6eOAHV6k7zC3C5sQPnkQYUre2PP.q.2cc.', NULL, NULL, 0, NULL, '2020-11-08 08:35:05', '2020-11-08 08:35:23', 0, NULL, NULL, NULL, NULL),
(30, 'Harriot Everfield', 'harriot@gmail.com', '2020-11-08 10:42:47', '$2y$10$ow17YNMmBiNGmjTkQni2Zu1uNcRpvy/pqsJzlzQ8Mo6x3bGZbrxN.', NULL, NULL, 0, NULL, '2020-11-08 10:42:09', '2020-11-08 10:55:17', 1, NULL, 4, 4, 5),
(33, 'Abraham Lincoln', 'abraham@yahoo.com', NULL, '$2y$10$x.rnLdzw2ZGd9vnKmcPDyuN05HhVX8gsBvczxFC.V3HGUFgppc45.', NULL, NULL, 2, NULL, '2020-11-08 21:35:15', '2020-11-09 00:48:56', 1, NULL, 5, 3, 4),
(34, 'Natasha Butterfield', 'nate@yahoo.com', NULL, '$2y$10$wgVa8Fa3BdtLgjuT5Ep6zOniTI6kH/w.vWI6.fqgqkaaWvrzr/nNK', NULL, NULL, 2, NULL, '2020-11-08 21:35:42', '2020-11-08 21:35:42', 1, NULL, 5, 3, 4),
(35, 'Margaret Beers', 'beer@yahoo.com', NULL, '$2y$10$pynGHbs7PelUBHidVvEXkeLlFqyJKZkPBhftxqHjDYaXPtxu9fl2.', NULL, NULL, 2, NULL, '2020-11-08 21:36:05', '2020-11-08 23:16:15', 1, NULL, 5, 3, 7),
(36, 'Filip Fernando', 'filip@gmail.com', NULL, '$2y$10$R.wmkR9lZqb400vsEbDw/.P79PVvZzDpFyYWxzjWhJoidBH4ZWEvK', NULL, NULL, 2, NULL, '2020-11-08 21:37:01', '2020-11-08 21:37:01', 1, NULL, 5, 3, 4),
(37, 'Harry Jacobs', 'harr@yahoo.com', NULL, '$2y$10$9zTtsxOk4jQ5I.PeVkaBfuNWy5akFofmmFnDiyjxA9KqTuxx4zA3y', NULL, NULL, 2, NULL, '2020-11-08 21:39:04', '2020-11-08 22:05:25', 1, NULL, 5, 2, 4),
(38, 'Matt Stonie', 'matthew@yahoo.com', NULL, '$2y$10$dFvMKrcaDO/Kl6KiNudAuukKCl9UISODOg5Zl2.ZLMILti9eRQlz.', NULL, NULL, 2, NULL, '2020-11-08 21:39:33', '2020-11-08 22:05:32', 1, NULL, 5, 2, 4),
(39, 'Sam Daniels', 'sam1@yahoo.com', '2020-11-08 22:09:03', '$2y$10$AUS4sdmCGSm.AB6CKVl9Kux76oz53PZdgzrKHVSIiVz2o9izo1Rjq', NULL, NULL, 0, NULL, '2020-11-08 22:08:50', '2020-11-08 22:10:28', 1, NULL, 4, 2, 4),
(41, 'Dan Daniel', 'dan@gmail.com', NULL, '$2y$10$P.wjVJkYSFltXwFqfJPzROd86ofL1Z09LxhzXGm1yYkDDH58g2Ufa', NULL, NULL, 2, NULL, '2020-11-09 00:45:10', '2020-11-09 00:45:10', 1, NULL, 4, 2, 4);
