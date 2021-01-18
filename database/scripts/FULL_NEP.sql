--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Central', '2020-11-17 04:00:39', NULL, 1, NULL),
(2, 'Eastern', '2020-11-17 04:02:17', NULL, 1, NULL),
(3, 'Nothern', '2020-11-17 04:02:17', NULL, 1, NULL),
(4, 'Southern', '2020-11-17 04:02:17', NULL, 1, NULL),
(5, 'Western', '2020-11-17 04:02:17', NULL, 1, NULL),
(6, 'North Western', '2020-11-17 04:02:17', NULL, 1, NULL),
(7, 'North Central', '2020-11-17 04:02:17', NULL, 1, NULL),
(8, 'Uva', '2020-11-17 04:02:17', NULL, 1, NULL),
(9, 'Sabaragamuwa', '2020-11-17 04:02:17', NULL, 1, NULL);

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `type`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Pending', '2020-11-17 00:29:16', NULL, 1, NULL),
(2, 'Processing', '2020-11-17 00:30:50', NULL, 1, NULL),
(3, 'Approved', '2020-11-17 00:30:50', NULL, 1, NULL),
(4, 'Rejected', '2020-11-17 00:30:50', NULL, 1, NULL),
(5, 'Deleted', '2020-11-17 00:30:50', NULL, 1, NULL),
(6, 'Fowarded', '2020-11-17 00:30:50', NULL, 1, NULL),
(7, 'Approved and Fowarded', '2020-11-17 00:30:50', NULL, 1, NULL);

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Super Admin', '2020-11-06 04:31:23', NULL, 1, NULL),
(2, 'Admin', '2020-11-06 04:31:36', NULL, 1, NULL),
(3, 'Head of Organization', '2020-11-06 04:32:00', NULL, 1, NULL),
(4, 'Manager', '2020-11-06 04:32:46', NULL, 1, NULL),
(5, 'Staff', '2020-11-06 04:33:00', NULL, 1, NULL),
(6, 'Citizen', '2020-11-06 04:33:14', NULL, 1, NULL);

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Additional Director', '2020-11-07 00:51:06', NULL, 1, NULL),
(2, 'Manager', '2020-11-07 00:51:21', NULL, 1, NULL),
(3, 'Director', '2020-11-07 00:51:36', NULL, 1, NULL),
(4, 'Staff Assistant', '2020-11-07 00:52:33', NULL, 1, NULL),
(5, 'Assistant Director', '2020-11-07 00:52:58', NULL, 1, NULL),
(6, 'Deputy Manager', '2020-11-07 00:53:39', NULL, 1, NULL),
(7, 'Assistant Manager', '2020-11-07 00:53:53', NULL, 1, NULL);


--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Ampara', '2020-11-17 03:53:46', NULL, 1, NULL),
(2, 'Anuradhapura', '2020-11-17 03:59:46', NULL, 1, NULL),
(3, 'Badulla', '2020-11-17 03:59:46', NULL, 1, NULL),
(4, 'Batticaloa', '2020-11-17 03:59:46', NULL, 1, NULL),
(5, 'Colombo', '2020-11-17 03:59:46', NULL, 1, NULL),
(6, 'Galle', '2020-11-17 03:59:46', NULL, 1, NULL),
(7, 'Gampaha', '2020-11-17 03:59:46', NULL, 1, NULL),
(8, 'Hambantota', '2020-11-17 03:59:46', NULL, 1, NULL),
(9, 'Jaffna', '2020-11-17 03:59:46', NULL, 1, NULL),
(10, 'Kalutara', '2020-11-17 03:59:46', NULL, 1, NULL),
(11, 'Kandy', '2020-11-17 03:59:46', NULL, 1, NULL),
(12, 'Kegalle', '2020-11-17 03:59:46', NULL, 1, NULL),
(13, 'Kilinochchi', '2020-11-17 03:59:46', NULL, 1, NULL),
(14, 'Kurunegala', '2020-11-17 03:59:46', NULL, 1, NULL),
(15, 'Mannar', '2020-11-17 03:59:46', NULL, 1, NULL),
(16, 'Matale', '2020-11-17 03:59:46', NULL, 1, NULL),
(17, 'Matara', '2020-11-17 03:59:46', NULL, 1, NULL),
(18, 'Monaragala', '2020-11-17 03:59:46', NULL, 1, NULL),
(19, 'Mullaitivu', '2020-11-17 03:59:46', NULL, 1, NULL),
(20, 'Nuwara Eliya', '2020-11-17 03:59:46', NULL, 1, NULL),
(21, 'Polonnaruwa', '2020-11-17 03:59:46', NULL, 1, NULL),
(22, 'Puttalam', '2020-11-17 03:59:46', NULL, 1, NULL),
(23, 'Ratnapura', '2020-11-17 03:59:46', NULL, 1, NULL),
(24, 'Trincomalee', '2020-11-17 03:59:46', NULL, 1, NULL),
(25, 'Vavuniya', '2020-11-17 03:59:46', NULL, 1, NULL);

--
-- Dumping data for table `eco_systems`
--

INSERT INTO `eco_systems` (`id`, `ecosystem_type`, `description`, `created_by_user_id`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Marine', 'test 1', 5, '2021-01-10 00:21:10', '2021-01-10 00:21:10', 0, NULL);

--
-- Dumping data for table `form_types`
--

INSERT INTO `form_types` (`id`, `type`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Tree Removal', '2020-11-17 00:45:59', NULL, 1, NULL),
(2, 'Development Project', '2020-11-17 00:46:44', NULL, 1, NULL),
(3, 'Crime Complaint', '2020-11-17 00:46:44', NULL, 1, NULL),
(4, 'Development Project', '2020-11-17 00:46:44', NULL, 1, NULL);

--
-- Dumping data for table `gazettes`
--

INSERT INTO `gazettes` (`id`, `title`, `gazette_number`, `gazetted_date`, `degazetted_date`, `organizations`, `content`, `created_by_user_id`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Gazette 1', 'gz101', '2020-11-15', '0000-00-00', '[\"1\",\"2\",\"3\"]', 'Test', 1, '2020-11-15 03:43:35', NULL, 1, NULL),
(2, 'Gazette 2', 'gz101', '2020-11-15', '0000-00-00', '[\"4\",\"2\",\"3\"]', 'Test', 1, '2020-11-15 03:45:26', NULL, 1, NULL),
(3, 'Gazette 3', 'gz101', '2020-11-15', '0000-00-00', '[\"1\",\"5\",\"3\"]', 'Test', 1, '2020-11-15 03:45:26', NULL, 1, NULL),
(4, 'Gazette 4', 'gz101', '2020-11-15', '0000-00-00', '[\"7\",\"2\",\"3\"]', 'Test', 1, '2020-11-15 03:45:26', NULL, 1, NULL),
(5, 'Gazette 5', 'gz101', '2020-11-15', '0000-00-00', '[\"4\",\"5\",\"3\"]', 'Test', 1, '2020-11-15 03:45:26', NULL, 1, NULL),
(6, 'Gazette 6', 'gz101', '2020-11-15', '0000-00-00', '[\"5\",\"1\",\"3\"]', 'Test', 1, '2020-11-15 03:45:26', NULL, 1, NULL),
(7, 'Gazette 7', 'gz101', '2020-11-15', '0000-00-00', '[\"3\",\"2\"]', 'Test', 1, '2020-11-15 03:45:26', NULL, 1, NULL);

--
-- Dumping data for table `gs_divisions`
--

INSERT INTO `gs_divisions` (`id`, `gs_division`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'one', '2020-11-17 04:05:12', NULL, 1, NULL),
(2, 'two', '2020-11-17 04:06:00', NULL, 1, NULL),
(3, 'three', '2020-11-17 04:06:00', NULL, 1, NULL),
(4, 'four', '2020-11-17 04:06:00', NULL, 1, NULL),
(5, 'five', '2020-11-17 04:06:00', NULL, 1, NULL),
(6, 'six', '2020-11-17 04:06:00', NULL, 1, NULL);

--
-- Dumping data for table `land_parcels`
--

INSERT INTO `land_parcels` (`id`, `title`, `governing_organizations`, `logs`, `polygon`, `created_by_user_id`, `protected_area`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'LP1', '[\"1\",\"2\"]', '[\"\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.702015,7.480791],[80.821653,7.352479],[80.930304,7.415429],[80.866823,7.535252],[80.702015,7.480791]]]}}\"', 1, 1, '2020-11-15 03:47:14', NULL, 1, NULL),
(2, 'LP2', '[\"1\",\"3\"]', '[\"\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"LineString\\\",\\\"coordinates\\\":[[80.277176,7.334319],[80.329671,7.410587],[80.35897,7.480791],[80.443205,7.431165]]}}\"', 1, 1, '2020-11-15 03:48:39', NULL, 1, NULL),
(3, 'LP3', '[\"4\",\"2\"]', '[\"\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Point\\\",\\\"coordinates\\\":[80.73696,7.269389]}}\"', 1, 1, '2020-11-15 03:48:39', NULL, 1, NULL),
(4, 'LP4', '[\"5\",\"3\"]', '[\"\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.642195,7.207175],[80.736197,7.26167],[80.789912,7.198698],[80.720327,7.136929],[80.642195,7.207175]]]}}\"', 1, 1, '2020-11-15 03:48:39', NULL, 1, NULL),
(5, 'LP5', '[\"7\",\"2\"]', '[\"\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.291826,7.321001],[80.433439,7.311314],[80.384607,7.396061],[80.291826,7.321001]]]}}\"', 1, 1, '2020-11-15 03:48:39', NULL, 1, NULL),
(6, 'land 2', '[\"3\"]', '0', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.660335,7.304636],[80.669953,7.315382],[80.688729,7.304485],[80.665984,7.298279],[80.660335,7.304636]]]}}\"', 2, 0, '2020-11-28 02:32:50', '2020-11-28 02:32:50', 1, NULL),
(7, 'Land 3', '[\"2\"]', '0', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.508785,7.306471],[80.554562,7.298601],[80.530148,7.263486],[80.508785,7.306471]]]}}\"', 2, 1, '2020-11-28 05:19:35', '2020-11-28 05:19:35', 1, NULL),
(8, 'Land 6', '[\"3\"]', '0', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"LineString\\\",\\\"coordinates\\\":[[80.569115,7.314455],[80.573387,7.311731],[80.575981,7.308401],[80.579643,7.307493],[80.581169,7.302801]]}}\"', 2, 1, '2020-11-28 05:44:51', '2020-11-28 05:44:51', 1, NULL),
(9, 'Land 7', '[\"2\"]', '0', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.637245,7.284487],[80.648537,7.282368],[80.65342,7.269654],[80.644569,7.260572],[80.634499,7.262994],[80.639992,7.271168],[80.636635,7.277828],[80.637245,7.284487]]]}}\"', 2, 1, '2020-11-28 06:35:56', '2020-11-28 06:35:56', 1, NULL),
(10, 'land 8', '[\"3\"]', '0', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.879212,7.317368],[80.943909,7.41785],[80.930481,7.3549],[80.967102,7.347636],[80.973206,7.295574],[80.915833,7.291942],[80.935364,7.308893],[80.879212,7.317368]]]}}\"', 2, 1, '2020-11-28 06:41:24', '2020-11-28 06:41:24', 1, NULL),
(11, 'Land 9', '[\"2\"]', '0', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.671463,7.304655],[80.692825,7.284071],[80.725174,7.284677],[80.70137,7.312525],[80.671463,7.304655]]]}}\"', 5, 1, '2020-11-30 05:04:11', '2020-11-30 05:04:11', 1, NULL),
(12, 'land 10', '[\"3\"]', '0', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.770264,7.309271],[80.787964,7.285963],[80.812683,7.291715],[80.795898,7.312904],[80.770264,7.309271]]]}}\"', 5, 0, '2020-11-30 05:13:32', '2020-11-30 05:13:32', 1, NULL),
(13, 'Land 10', '[\"2\"]', '0', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.30304,7.365796],[80.461731,7.30526],[80.370178,7.232607],[80.30304,7.365796]]]}}\"', 5, 1, '2020-11-30 10:49:01', '2020-11-30 10:49:01', 1, NULL),
(14, '14', '[\"4\"]', '0', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.398712,7.321606],[80.398712,7.321606],[80.350647,7.249409],[80.350647,7.248047],[80.511322,7.239873],[80.511322,7.239873],[80.398712,7.318882],[80.398712,7.321606]]]}}\"', 5, 1, '2020-12-29 05:40:59', '2020-12-29 05:40:59', 1, NULL),
(15, '15', '[\"3\"]', '0', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.428619,7.357019],[80.428619,7.357019],[80.462952,7.352933],[80.462952,7.352933],[80.473938,7.419666],[80.473938,7.419666],[80.428619,7.357019]]]}}\"', 5, 1, '2020-12-29 05:43:12', '2020-12-29 05:43:12', 1, NULL);

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_10_11_142313_create_organizations_table', 1),
(2, '2013_10_11_142509_create_roles_table', 1),
(3, '2013_10_11_142710_create_designations_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_10_01_043502_create_status_table', 1),
(9, '2020_10_11_142429_create_organization_contacts_table', 1),
(10, '2020_10_11_142553_create_role_has_access_table', 1),
(11, '2020_10_11_142631_create_access_table', 1),
(12, '2020_10_11_142759_create_land_parcels_table', 1),
(13, '2020_10_11_142839_create_gazettes_table', 1),
(14, '2020_10_11_142923_create_land_has_gazettes_table', 1),
(15, '2020_10_11_143038_create_land_has_organizations_table', 1),
(16, '2020_10_11_143114_create_environment_restorations_table', 1),
(17, '2020_10_11_143157_create_eco_systems_table', 1),
(18, '2020_10_11_143318_create_environment_restoration_activities_table', 1),
(19, '2020_10_11_143350_create_crime_reports_table', 1),
(20, '2020_10_11_143422_create_process_item_progress_table', 1),
(21, '2020_10_11_143456_create_process_item_statuses_table', 1),
(22, '2020_10_11_143528_create_species_information_table', 1),
(23, '2020_10_11_143632_create_sample_processes_table', 1),
(24, '2020_10_18_121328_create_audits_table', 1),
(25, '2020_11_15_043710_create_form_types_table', 1),
(26, '2020_11_15_044113_create_provinces_table', 1),
(27, '2020_11_15_044220_create_districts_table', 1),
(28, '2020_11_15_044258_create_gs_divisions_table', 1),
(29, '2020_11_15_044334_create_crime_types_table', 1),
(30, '2020_12_11_142957_create_tree_removal_requests_table', 1),
(31, '2020_12_11_143226_create_development_projects_table', 1),
(32, '2020_12_11_231217_create_process_items_table', 1),
(33, '2019_11_20_142012_create_organization_types_table', 2);

--
-- Dumping data for table `organization_types`
--

INSERT INTO `organization_types` (`id`, `title`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Government ', '2021-01-10 06:09:06', NULL, 1, NULL),
(2, 'Semi-Government ', '2021-01-10 06:11:16', NULL, 1, NULL),
(3, 'Private ', '2021-01-10 06:11:16', NULL, 1, NULL),
(4, 'Non-government ', '2021-01-10 06:11:16', NULL, 1, NULL),
(5, 'Public ', '2021-01-10 06:11:16', NULL, 1, NULL);

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `title`, `city`, `country`, `type_id`, `description`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Reforest Sri Lanka', 'Colombo', 'Sri Lanka', 0, '', '2020-11-06 04:23:42', NULL, 1, NULL),
(2, 'Ministry of Environment', 'Battaramulla', 'Sri Lanka', 0, '', '2020-11-06 04:26:03', NULL, 1, NULL),
(3, 'Central Environmental Authority', 'Colombo', 'Sri Lanka', 0, '', '2020-11-06 04:29:13', NULL, 1, NULL),
(4, 'Ministry of Wildlife', 'Colombo', 'Sri Lanka', 0, '', '2020-11-06 04:29:55', NULL, 1, NULL),
(5, 'Road Development Authority', 'Colombo', 'Sri Lanka', 0, '', '2020-11-06 04:30:48', NULL, 1, NULL);

--
-- Dumping data for table `development_projects`
--

INSERT INTO `development_projects` (`id`, `title`, `governing_organizations`, `logs`, `protected_area`, `created_by_user_id`, `created_at`, `updated_at`, `deleted_at`, `gazette_id`, `status_id`, `land_parcel_id`) VALUES
(1, 'title', '[\"3\",\"4\"]', '0', 1, 2, '2020-11-14 15:56:34', '2020-11-14 15:56:34', NULL, 3, 1, 3),
(2, 'Title 2', '[\"4\",\"5\"]', '0', 1, 2, '2020-11-14 16:50:38', '2020-11-14 16:50:38', NULL, 3, 1, 3),
(3, 'title 3', '[\"1\",\"2\"]', '0', 0, 2, '2020-11-14 16:52:45', '2020-11-14 16:52:45', NULL, 1, 1, 2),
(4, 'title 4', '[\"2\",\"4\"]', '0', 0, 2, '2020-11-14 17:03:49', '2020-11-14 17:03:49', NULL, 3, 1, 2),
(5, 'title 5', '[\"3\",\"4\"]', '0', 0, 2, '2020-11-14 18:05:44', '2020-11-14 18:05:44', NULL, 3, 1, 3),
(6, 'title 5', '[\"2\",\"3\"]', '0', 0, 4, '2020-11-14 19:28:17', '2020-11-14 19:28:17', NULL, 2, 1, 4),
(7, 'title 5', '[\"2\",\"3\"]', '0', 0, 2, '2020-11-14 19:28:47', '2020-11-14 19:28:47', NULL, 2, 1, 4),
(8, 'title 5', '[\"2\",\"3\"]', '0', 0, 3, '2020-11-14 19:29:47', '2020-11-14 19:29:47', NULL, 2, 1, 4),
(9, 'title 5', '[\"2\",\"3\"]', '0', 0, 2, '2020-11-14 19:29:59', '2020-11-14 19:29:59', NULL, 2, 1, 4),
(10, 'Title 6', '[\"4\",\"5\"]', '0', 1, 3, '2020-11-14 19:36:26', '2020-11-14 19:36:26', NULL, 3, 1, 4),
(11, 'title 7', '[\"2\",\"3\",\"4\",\"5\"]', '0', 0, 2, '2020-11-14 19:37:09', '2020-11-14 19:37:09', NULL, 7, 1, 3),
(12, 'title 9', '[\"2\",\"3\",\"4\"]', '0', 1, 3, '2020-11-14 22:38:54', '2020-11-14 22:38:54', NULL, 3, 1, 3),
(13, 'title 10', '[\"2\",\"3\"]', '0', 0, 2, '2020-11-15 13:24:25', '2020-11-15 13:24:25', NULL, 2, 1, 3),
(14, 'title 11', '[\"2\",\"3\",\"4\",\"5\"]', '0', 1, 2, '2020-11-15 13:25:25', '2020-11-15 13:25:25', NULL, 3, 1, 3),
(16, 'titleee', '[\"3\",\"4\"]', '{\"type\":\"Feature\",\"properties\":[],\"geometry\":{\"type\":\"Polygon\",\"coordinates\":[[[80.419006,7.380626],[80.444641,7.413311],[80.455628,7.376994],[80.419006,7.380626]]]}}', 0, 2, '2020-11-23 00:58:22', '2020-11-23 00:58:22', NULL, 3, 1, 2),
(17, 'title 18', '[\"3\"]', '{\"type\":\"Feature\",\"properties\":[],\"geometry\":{\"type\":\"Point\",\"coordinates\":[80.671291,7.226003]}}', 1, 2, '2020-11-23 01:45:58', '2020-11-23 01:45:58', NULL, 3, 1, 3),
(18, 'test 1', '[\"3\"]', '{\"type\":\"Feature\",\"properties\":[],\"geometry\":{\"type\":\"Polygon\",\"coordinates\":[[[80.356894,7.335832],[80.359793,7.331594],[80.359945,7.327281],[80.354528,7.331216],[80.356894,7.335832]]]}}', 0, 2, '2020-11-23 01:50:01', '2020-11-23 01:50:01', NULL, 3, 1, 3),
(19, 'Test 2', '[\"3\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.656441,7.330767],[80.660256,7.332583],[80.659607,7.329556],[80.656441,7.330767]]]}}\"', 0, 2, '2020-11-27 23:41:43', '2020-11-27 23:41:43', NULL, 2, 1, 3),
(20, 'test 3', '[\"2\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.524631,7.524057],[81.061783,7.319487],[80.419642,7.203239],[80.524631,7.524057]]]}}\"', 0, 2, '2020-11-27 23:49:16', '2020-11-27 23:49:16', NULL, 3, 1, 3),
(21, 'marker test', '[\"2\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Point\\\",\\\"coordinates\\\":[80.664263,7.611939]}}\"', 0, 2, '2020-11-27 23:50:08', '2020-11-27 23:50:08', NULL, 2, 1, 1),
(22, 'test 4', '[\"2\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.654191,7.326496],[80.655259,7.326761],[80.657358,7.32835],[80.658465,7.33308],[80.654191,7.326496]]]}}\"', 1, 2, '2020-11-28 02:31:28', '2020-11-28 02:31:28', NULL, 3, 1, 2),
(23, 'test 5', '[\"3\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.660335,7.304636],[80.669953,7.315382],[80.688729,7.304485],[80.665984,7.298279],[80.660335,7.304636]]]}}\"', 1, 2, '2020-11-28 02:32:50', '2020-11-28 02:32:50', NULL, 3, 1, 2),
(24, 'Test 6', '[\"2\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.508785,7.306471],[80.554562,7.298601],[80.530148,7.263486],[80.508785,7.306471]]]}}\"', 1, 2, '2020-11-28 05:19:35', '2020-11-28 05:19:35', NULL, 2, 1, 7),
(25, 'title', '[\"3\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.879212,7.317368],[80.943909,7.41785],[80.930481,7.3549],[80.967102,7.347636],[80.973206,7.295574],[80.915833,7.291942],[80.935364,7.308893],[80.879212,7.317368]]]}}\"', 1, 2, '2020-11-28 06:41:24', '2020-11-28 06:41:24', NULL, 2, 1, 10),
(26, 'Title y', '[\"3\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.770264,7.309271],[80.787964,7.285963],[80.812683,7.291715],[80.795898,7.312904],[80.770264,7.309271]]]}}\"', 0, 5, '2020-11-30 05:13:32', '2020-11-30 05:13:32', NULL, 3, 1, 12),
(27, 'test', '[\"2\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.30304,7.365796],[80.461731,7.30526],[80.370178,7.232607],[80.30304,7.365796]]]}}\"', 1, 5, '2020-11-30 10:49:01', '2020-11-30 10:49:01', NULL, 5, 1, 13),
(28, 'tttest', '[\"3\"]', '\"{\\\"type\\\":\\\"Feature\\\",\\\"properties\\\":{},\\\"geometry\\\":{\\\"type\\\":\\\"Polygon\\\",\\\"coordinates\\\":[[[80.428619,7.357019],[80.428619,7.357019],[80.462952,7.352933],[80.462952,7.352933],[80.473938,7.419666],[80.473938,7.419666],[80.428619,7.357019]]]}}\"', 1, 5, '2020-12-29 05:43:12', '2020-12-29 05:43:12', NULL, 3, 1, 15);

--
-- Dumping data for table `process_items`
--

INSERT INTO `process_items` (`id`, `form_id`, `created_by_user_id`, `requst_organization`, `activity_organization`, `activity_user_id`, `remark`, `prerequisite`, `prerequsite_id`, `created_at`, `updated_at`, `deleted_at`, `form_type_id`, `status_id`) VALUES
(1, 9, 2, 2, 0, 0, '0', 0, 0, '2020-11-14 19:29:59', '2020-11-14 19:29:59', NULL, 2, 1),
(2, 10, 3, 2, 0, 0, '0', 0, 0, '2020-11-14 19:36:26', '2020-11-14 19:36:26', NULL, 2, 1),
(3, 11, 2, 2, 0, 0, '0', 0, 0, '2020-11-14 19:37:09', '2020-11-14 19:37:09', NULL, 2, 1),
(4, 12, 3, 2, 0, 0, '0', 0, 0, '2020-11-14 22:38:54', '2020-11-14 22:38:54', NULL, 2, 1),
(5, 13, 2, 2, 0, 0, '0', 0, 0, '2020-11-15 13:24:26', '2020-11-15 13:24:26', NULL, 2, 1),
(6, 13, 3, 3, 0, 0, '0', 0, 0, '2020-11-15 13:24:26', '2020-11-15 13:24:26', NULL, 2, 1),
(7, 14, 2, 2, 0, 0, '0', 0, 0, '2020-11-15 13:25:25', '2020-11-15 13:25:25', NULL, 2, 1),
(8, 14, 3, 3, 0, 0, '0', 0, 0, '2020-11-15 13:25:25', '2020-11-15 13:25:25', NULL, 2, 1),
(9, 14, 2, 4, 0, 0, '0', 0, 0, '2020-11-15 13:25:25', '2020-11-15 13:25:25', NULL, 2, 1),
(10, 14, 2, 5, 0, 0, '0', 0, 0, '2020-11-15 13:25:25', '2020-11-15 13:25:25', NULL, 2, 1),
(13, 1, 2, 2, 0, 0, '0', 0, 0, '2020-11-23 00:33:06', '2020-11-23 00:33:06', NULL, 1, 1),
(16, 3, 2, 1, 0, 0, '0', 0, 0, '2020-11-23 00:54:39', '2020-11-23 00:54:39', NULL, 1, 1),
(17, 3, 2, 2, 0, 0, '0', 0, 0, '2020-11-23 00:54:39', '2020-11-23 00:54:39', NULL, 1, 1),
(18, 16, 2, 3, 0, 0, '0', 0, 0, '2020-11-23 00:58:22', '2020-11-23 00:58:22', NULL, 2, 1),
(19, 16, 2, 4, 0, 0, '0', 0, 0, '2020-11-23 00:58:22', '2020-11-23 00:58:22', NULL, 2, 1),
(20, 17, 2, 1, 3, 0, '0', 0, 0, '2020-11-23 01:45:58', '2020-11-23 01:45:58', NULL, 2, 1),
(21, 18, 2, 1, 3, 0, '0', 0, 0, '2020-11-23 01:50:01', '2020-11-23 01:50:01', NULL, 2, 1),
(22, 19, 2, 1, 3, 0, '0', 0, 0, '2020-11-27 23:41:43', '2020-11-27 23:41:43', NULL, 2, 1),
(23, 20, 2, 1, 2, 0, '0', 0, 0, '2020-11-27 23:49:16', '2020-11-27 23:49:16', NULL, 2, 1),
(24, 21, 2, 1, 2, 0, '0', 0, 0, '2020-11-27 23:50:08', '2020-11-27 23:50:08', NULL, 2, 1),
(25, 22, 2, 1, 2, 0, '0', 0, 0, '2020-11-28 02:31:28', '2020-11-28 02:31:28', NULL, 2, 1),
(26, 23, 2, 1, 3, 0, '0', 0, 0, '2020-11-28 02:32:50', '2020-11-28 02:32:50', NULL, 2, 1),
(27, 24, 2, 1, 2, 0, '0', 0, 0, '2020-11-28 05:19:35', '2020-11-28 05:19:35', NULL, 2, 1),
(28, 4, 2, 1, 3, 0, '0', 0, 0, '2020-11-28 05:44:51', '2020-11-28 05:44:51', NULL, 1, 1),
(29, 5, 2, 1, 2, 0, '0', 0, 0, '2020-11-28 06:35:56', '2020-11-28 06:35:56', NULL, 1, 1),
(30, 25, 2, 1, 3, 0, '0', 0, 0, '2020-11-28 06:41:24', '2020-11-28 06:41:24', NULL, 2, 1),
(31, 6, 5, 2, 2, 37, '0', 0, 0, '2020-11-30 05:04:11', '2021-01-09 09:07:09', NULL, 1, 1),
(32, 26, 5, 2, 3, 0, '0', 0, 0, '2020-11-30 05:13:32', '2020-11-30 05:13:32', NULL, 2, 1),
(33, 27, 5, 2, 2, 0, '0', 0, 0, '2020-11-30 10:49:01', '2020-11-30 10:49:01', NULL, 2, 1),
(34, 7, 5, 2, 4, 0, '0', 0, 0, '2020-12-29 05:40:59', '2020-12-29 05:40:59', NULL, 1, 1),
(35, 28, 5, 2, 3, 0, '0', 0, 0, '2020-12-29 05:43:12', '2020-12-29 05:43:12', NULL, 2, 1);


--
-- Dumping data for table `species_information`
--

INSERT INTO `species_information` (`id`, `type`, `title`, `scientefic_name`, `habitats`, `taxa`, `photos`, `description`, `created_by_user_id`, `created_at`, `updated_at`, `status_id`, `deleted_at`) VALUES
(1, 'Test 1', 'Test 1', 'Test 1', '[\"habitat2\"]', '[\"taxanomy2\"]', '0', 'test 1', 5, '2021-01-10 00:22:04', '2021-01-10 00:22:04', 0, NULL);


--
-- Dumping data for table `tree_removal_requests`
--

INSERT INTO `tree_removal_requests` (`id`, `created_by_user_id`, `description`, `images`, `governing_organizations`, `land_size`, `land_size_unit`, `special_approval`, `no_of_trees`, `no_of_tree_species`, `no_of_mammal_species`, `no_of_amphibian_species`, `no_of_reptile_species`, `no_of_avian_species`, `species_special_notes`, `no_of_flora_species`, `tree_locations`, `created_at`, `updated_at`, `deleted_at`, `land_parcel_id`, `status_id`, `district_id`, `province_id`, `gs_division_id`) VALUES
(1, 2, 'Test 1', '0', '[\"3\"]', 1.2000, 'acres', '0', 40, 3, 2, 1, 1, 2, 'None', 12, '[{\"tree_species_id\":\"1\",\"tree_id\":\"1\",\"width_at_breast_height\":\"1\",\"height\":\"1\",\"timber_volume\":\"1\",\"timber_cubic\":\"1\",\"age\":\"1\",\"remark\":\"Remark\"},{\"tree_species_id\":\"2\",\"tree_id\":\"2\",\"width_at_breast_height\":\"2\",\"height\":\"2\",\"timber_volume\":\"2\",\"timber_cubic\":\"2\",\"age\":\"2\",\"remark\":\"Remark 2\"},{\"tree_species_id\":\"3\",\"tree_id\":\"3\",\"width_at_breast_height\":\"3\",\"height\":\"3\",\"timber_volume\":\"3\",\"timber_cubic\":\"3\",\"age\":\"3\",\"remark\":\"Remark 2\"}]', '2020-11-23 00:33:06', '2020-11-23 00:33:06', NULL, 3, 1, 9, 3, 3),
(3, 2, 'None 11', '0', '[\"1\",\"2\"]', 1.2000, 'acres', '0', 20, 2, 4, 0, 3, 3, 'None 11', 2, '[{\"tree_species_id\":\"1\",\"tree_id\":\"1\",\"width_at_breast_height\":\"1\",\"height\":\"1\",\"timber_volume\":\"1\",\"timber_cubic\":\"1\",\"age\":\"1\",\"remark\":\"11\"}]', '2020-11-23 00:54:39', '2020-11-23 00:54:39', NULL, 3, 1, 5, 5, 4),
(4, 2, 'Testing map', '0', '[\"3\"]', 1.2000, 'acres', '0', 21, 2, 4, 0, 3, 3, 'None', 12, '[{\"tree_species_id\":\"1\",\"tree_id\":\"1\",\"width_at_breast_height\":\"1\",\"height\":\"1\",\"timber_volume\":\"1\",\"timber_cubic\":\"1\",\"age\":\"1\",\"remark\":\"Test 1\"}]', '2020-11-28 05:44:51', '2020-11-28 05:44:51', NULL, 8, 1, 6, 4, 4),
(5, 2, 'Test 2', '0', '[\"2\"]', 2.7000, 'acres', '0', 40, 5, 4, 2, 2, 2, 'None', 1, '[{\"tree_species_id\":\"99\",\"tree_id\":\"99\",\"width_at_breast_height\":\"99\",\"height\":\"99\",\"timber_volume\":\"99\",\"timber_cubic\":\"99\",\"age\":\"99\",\"remark\":\"99\"},{\"tree_species_id\":\"88\",\"tree_id\":\"88\",\"width_at_breast_height\":\"88\",\"height\":\"88\",\"timber_volume\":\"88\",\"timber_cubic\":\"88\",\"age\":\"88\",\"remark\":\"88\"}]', '2020-11-28 06:35:56', '2020-11-28 06:35:56', NULL, 9, 1, 11, 1, 3),
(6, 5, 'None', '0', '[\"2\"]', 1.2000, 'acres', '0', 20, 2, 2, 2, 2, 3, 'None', 2, '[{\"tree_species_id\":\"1\",\"tree_id\":\"1\",\"width_at_breast_height\":\"1\",\"height\":\"1\",\"timber_volume\":\"1\",\"timber_cubic\":\"1\",\"age\":\"1\",\"remark\":\"1\"},{\"tree_species_id\":\"2\",\"tree_id\":\"2\",\"width_at_breast_height\":\"2\",\"height\":\"2\",\"timber_volume\":\"2\",\"timber_cubic\":\"2\",\"age\":\"2\",\"remark\":\"2\"}]', '2020-11-30 05:04:11', '2020-11-30 05:04:11', NULL, 11, 1, 11, 1, 3),
(7, 5, 'description', '0', '[\"4\"]', 2.7000, 'acres', '0', 21, 3, 4, 1, 2, 2, 'special', 1, '[{\"tree_species_id\":\"88\",\"tree_id\":\"88\",\"width_at_breast_height\":\"88\",\"height\":\"88\",\"timber_volume\":\"88\",\"timber_cubic\":\"88\",\"age\":\"88\",\"remark\":\"88\"}]', '2020-12-29 05:40:59', '2020-12-29 05:40:59', NULL, 14, 1, 11, 1, 3);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `created_by_user_id`, `remember_token`, `created_at`, `updated_at`, `status`, `deleted_at`, `role_id`, `organization_id`, `designation_id`) VALUES
(2, 'Bojitha Piyatilleke', 'boji@yahoo.com', '2020-11-05 12:34:42', '$2y$10$naVkPx5K0iW7PzW/z9cfXO8ZM64k191EA4PtlKRdPXaIbpRyKDQi6', NULL, NULL, 0, NULL, '2020-11-05 12:34:17', '2020-11-08 13:46:21', 1, NULL, 1, 1, 4),
(3, 'Senal Hewage', 'senal@yahoo.com', '2020-11-05 13:21:28', '$2y$10$aQKl0mccMLeFACu49Phd/eQIGwAzr.nSdJUg.CpmGZpqjYfK.0iAG', NULL, NULL, 0, NULL, '2020-11-05 13:21:19', '2020-11-07 15:15:31', 1, NULL, 3, 3, 2),
(4, 'Thidas Perera', 'thidas@yahoo.com', '2020-11-05 13:21:57', '$2y$10$9yhxcd2voxOAUXSBIxLSsubp4pvlLfF1jow6tPNgEwY0yZ5fsGxI6', NULL, NULL, 0, '5CVq4QncsiXfYiVPkCMK97hrxmWn12nNWOd39mQJNXikToLt5kU823TUOK6E', '2020-11-05 13:21:47', '2020-11-12 18:56:27', 1, NULL, 3, 3, 5),
(5, 'Sharuka Perera', 'sharuka@yahoo.com', '2020-11-05 13:22:33', '$2y$10$txPjtcvlhyqfxP2aCQ8DYevyVVWYe8a/ljiTDsnQmFb.tFH6AyOaC', NULL, NULL, 0, NULL, '2020-11-05 13:22:22', '2020-11-12 19:45:17', 1, NULL, 4, 2, 2),
(6, 'Benjamin Subasinghe', 'benjamin@yahoo.com', '2020-11-05 13:23:11', '$2y$10$8MgZnq29OAFAGpIfN5CuLud3MbQZO5dmMTPETIOgkcIFWOgVnPPS6', NULL, NULL, 0, NULL, '2020-11-05 13:23:03', '2020-11-07 17:23:38', 1, NULL, 4, 3, 1),
(7, 'Dion Weiman', 'dionwei@gmail.com', '2020-11-05 13:57:05', '$2y$10$eVSi6Qwnf1OgEcAuMh.XAOC6muhwT6pOvZY1Kgw8XfCir22/br8Tu', NULL, NULL, 0, NULL, '2020-11-05 13:47:04', '2020-11-08 00:05:31', 1, NULL, 4, 4, 5),
(8, 'Chayu Damsinghe', 'chayu@yahoo.com', '2020-11-05 13:57:47', '$2y$10$4TS0d9TIyPROVTGTP80A.eRlZpEnlC4K3D6P0Rx6cr.20cw9iCxEi', NULL, NULL, 0, NULL, '2020-11-05 13:57:37', '2020-11-06 17:47:44', 0, NULL, NULL, NULL, NULL),
(13, 'Hammond Silva', 'hammondsilva@yahoo.com', NULL, '$2y$10$GMsvdbj/bQpezQYLytYDG.6Uu5Ra4aomhXIwomSWlh/bMuPh0sOyu', NULL, NULL, 2, NULL, '2020-11-06 20:11:44', '2020-11-08 13:42:45', 1, NULL, 5, 3, 3),
(14, 'Bobby Shades', 'bobby@gmail.com', NULL, '$2y$10$jUB/fSIiIxcjQMh90hRa..asNS19VoEi7a1qNsJtECSM4AktSXMSq', NULL, NULL, 2, NULL, '2020-11-06 20:21:11', '2020-11-07 17:11:03', 1, NULL, 4, 2, 7),
(19, 'Sarah', 'sarah@yahoo.com', NULL, '$2y$10$xHzN.6IxzDSLe/qDObMofOrlqXEVGiurVhwp/Dtf4bnPk1x2z31xy', NULL, NULL, 2, NULL, '2020-11-06 20:26:48', '2020-11-06 20:26:48', 0, NULL, NULL, NULL, NULL),
(20, 'Gordon', 'gordon@yahoo.com', NULL, '$2y$10$uGkEyLDciZD1P5QgLBzEW.DNfCZEWDuVfvVPJ2FxZeB8pYquwb3tu', NULL, NULL, 2, NULL, '2020-11-06 20:27:40', '2020-11-30 02:06:23', 1, NULL, 4, 3, 3),
(21, 'Samuel Jackson', 'sam@gmail.com', NULL, '$2y$10$xfyH2kQfUQ4GOTxWFpFALO7ejS1zKzfIUs7Nc1oKi8PYEdSDvp6WO', NULL, NULL, 2, NULL, '2020-11-07 10:22:21', '2020-11-07 12:14:02', 0, NULL, NULL, NULL, NULL),
(22, 'Samantha Perera', 'samantha@gmail.com', '2020-11-07 17:04:08', '$2y$10$/ZjyZnCEdOUt90w8byo5Uuj1E/nkzNlGNSJ9eZnSDE71qJ/Iq5pT.', NULL, NULL, 2, NULL, '2020-11-07 11:19:50', '2020-11-07 17:04:08', 1, NULL, 3, 2, 4),
(24, 'Jason Weins', 'jason@yahoo.com', NULL, '$2y$10$uRs2oujzEG49J29QmYPy.eV3/IjuFrPl1cMGdhmv.xCuyylNei9ya', NULL, NULL, 5, NULL, '2020-11-07 15:16:40', '2020-11-12 21:17:34', 1, NULL, 4, 3, 3),
(25, 'Danielle O\'Hare', 'danielle@yahoo.com', NULL, '$2y$10$F6z8nGfbjVcskgwC.q3NJuD5AflhuTsfyid0lvhq47B2ky.FYybQC', NULL, NULL, 22, NULL, '2020-11-07 17:05:32', '2020-11-07 17:05:32', 1, NULL, 4, 2, 2),
(26, 'Dora Explorer', 'dora@gmail.com', NULL, '$2y$10$Vt4TUy/3KQuRDHo5Ha6cCO9OTQ71IV5YFK/ZdXwT9PclRqDf62KI6', NULL, NULL, 6, NULL, '2020-11-07 17:14:35', '2020-11-07 19:31:53', 1, NULL, 4, 3, 4),
(27, 'Robert Pattinson', 'robert@yahoo.com', NULL, '$2y$10$B6miY0ubNnYBHmh0rXMzPO3sEeyoBbMrQDvN6NG5M515OexMWfeyq', NULL, NULL, 0, NULL, '2020-11-07 19:45:08', '2020-11-12 18:03:04', 1, NULL, 3, 4, 5),
(28, 'Robert Pattinson', 'robert@gmail.com', '2020-11-07 19:47:58', '$2y$10$dm8ETEZOyloRioSa5963SO/cxOqazANkDZmprs1FbhWQ7iV38DSuC', NULL, NULL, 0, NULL, '2020-11-07 19:47:44', '2020-11-12 19:44:46', 1, NULL, 4, 2, 4),
(29, 'Dan Abraham', 'danny@gmail.com', '2020-11-07 21:35:23', '$2y$10$hcWVVsE0EgfgbJ.GKGX6eOAHV6k7zC3C5sQPnkQYUre2PP.q.2cc.', NULL, NULL, 0, NULL, '2020-11-07 21:35:05', '2020-11-07 21:35:23', 0, NULL, NULL, NULL, NULL),
(30, 'Harriot Everfield', 'harriot@gmail.com', '2020-11-07 23:42:47', '$2y$10$ow17YNMmBiNGmjTkQni2Zu1uNcRpvy/pqsJzlzQ8Mo6x3bGZbrxN.', NULL, NULL, 0, NULL, '2020-11-07 23:42:09', '2020-11-07 23:55:17', 1, NULL, 4, 4, 5),
(33, 'Abraham Lincoln', 'abraham@yahoo.com', NULL, '$2y$10$x.rnLdzw2ZGd9vnKmcPDyuN05HhVX8gsBvczxFC.V3HGUFgppc45.', NULL, NULL, 2, NULL, '2020-11-08 10:35:15', '2020-11-12 19:33:06', 1, NULL, 5, 3, 5),
(34, 'Natasha Butterfield', 'natasha33@yahoo.com', NULL, '$2y$10$wgVa8Fa3BdtLgjuT5Ep6zOniTI6kH/w.vWI6.fqgqkaaWvrzr/nNK', NULL, NULL, 2, NULL, '2020-11-08 10:35:42', '2020-11-13 00:07:14', 1, NULL, 5, 3, 2),
(35, 'Margaret Beers', 'beer@yahoo.com', NULL, '$2y$10$pynGHbs7PelUBHidVvEXkeLlFqyJKZkPBhftxqHjDYaXPtxu9fl2.', NULL, NULL, 2, NULL, '2020-11-08 10:36:05', '2020-11-08 12:16:15', 1, NULL, 5, 3, 7),
(36, 'Filip Fernando', 'filipfur@gmail.com', NULL, '$2y$10$R.wmkR9lZqb400vsEbDw/.P79PVvZzDpFyYWxzjWhJoidBH4ZWEvK', NULL, NULL, 2, NULL, '2020-11-08 10:37:01', '2020-11-13 00:13:31', 1, NULL, 5, 3, 2),
(37, 'Harry Jacobs', 'harr@yahoo.com', NULL, '$2y$10$9zTtsxOk4jQ5I.PeVkaBfuNWy5akFofmmFnDiyjxA9KqTuxx4zA3y', NULL, NULL, 2, NULL, '2020-11-08 10:39:04', '2020-11-08 11:05:25', 1, NULL, 5, 2, 4),
(38, 'Matt Stonie', 'matthew@yahoo.com', NULL, '$2y$10$dFvMKrcaDO/Kl6KiNudAuukKCl9UISODOg5Zl2.ZLMILti9eRQlz.', NULL, NULL, 2, NULL, '2020-11-08 10:39:33', '2020-11-08 11:05:32', 1, NULL, 5, 2, 4),
(41, 'Dan Daniel', 'dan@gmail.com', NULL, '$2y$10$P.wjVJkYSFltXwFqfJPzROd86ofL1Z09LxhzXGm1yYkDDH58g2Ufa', NULL, NULL, 2, NULL, '2020-11-08 13:45:10', '2020-11-08 13:45:10', 1, NULL, 4, 2, 4),
(43, 'Aaron Fernando', 'aaron@yahoo.com', NULL, '$2y$10$uktnCOHUUveA1dvr.0Xe4eiAonkKclDeS2UjtgqLb4d9D4EcJsWJW', NULL, NULL, 4, NULL, '2020-11-12 19:07:09', '2020-11-12 19:07:09', 1, NULL, 4, 3, 4),
(45, 'Adam Savage', 'adam@gmail.com', NULL, '$2y$10$uK3xyW54dSMELlQx8.z67OxyadTCZbxy9uDJtTKipsF5FeLWC5fJa', NULL, NULL, 6, NULL, '2020-11-12 19:47:34', '2020-11-12 19:47:34', 1, NULL, 5, 3, 6),
(46, 'Daniel Radcliffe', 'harry@yahoo.com', NULL, '$2y$10$S1.JM2kapWqu9I4BRzLYBeLYZeJTaV3t1pz8V0K.xDpRWxP4g84YG', NULL, NULL, 3, NULL, '2020-11-13 00:22:26', '2020-11-13 00:22:26', 1, NULL, 4, 1, 3),
(47, 'Thomas Edison', 'tommy@gmail.com', NULL, '$2y$10$xavA2IRf/qoXKBaQevw9iOlVL3g7qyQcuXrVNPoFDUCJ2VS4ekVUy', NULL, NULL, 3, NULL, '2020-11-13 00:23:48', '2020-11-13 00:23:48', 1, NULL, 4, 3, 4);
COMMIT;
