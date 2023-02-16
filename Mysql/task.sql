-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2023 at 02:08 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `questionId` int(11) NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `questionId`, `option`, `created_at`, `updated_at`) VALUES
(1, 1, 'ac', '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(2, 1, 'ac', '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(3, 1, 'ac', '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(4, 1, 'ac', '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(5, 2, 'ac', '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(6, 2, 'ac', '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(7, 2, 'ac', '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(8, 2, 'ac', '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(9, 3, 'ac', '2023-02-16 08:06:00', '2023-02-16 08:06:00'),
(10, 3, 'ac', '2023-02-16 08:06:00', '2023-02-16 08:06:00'),
(11, 3, 'ac', '2023-02-16 08:06:00', '2023-02-16 08:06:00'),
(12, 3, 'ac', '2023-02-16 08:06:00', '2023-02-16 08:06:00'),
(13, 4, 'ac', '2023-02-16 08:06:00', '2023-02-16 08:06:00'),
(14, 4, 'ac', '2023-02-16 08:06:00', '2023-02-16 08:06:00'),
(15, 4, 'ac', '2023-02-16 08:06:00', '2023-02-16 08:06:00'),
(16, 4, 'ac', '2023-02-16 08:06:00', '2023-02-16 08:06:00'),
(17, 5, 'ac', '2023-02-16 08:06:01', '2023-02-16 08:06:01'),
(18, 5, 'ac', '2023-02-16 08:06:01', '2023-02-16 08:06:01'),
(19, 5, 'ac', '2023-02-16 08:06:01', '2023-02-16 08:06:01'),
(20, 5, 'ac', '2023-02-16 08:06:02', '2023-02-16 08:06:02'),
(21, 6, 'ac', '2023-02-16 08:06:02', '2023-02-16 08:06:02'),
(22, 6, 'ac', '2023-02-16 08:06:02', '2023-02-16 08:06:02'),
(23, 6, 'ac', '2023-02-16 08:06:02', '2023-02-16 08:06:02'),
(24, 6, 'ac', '2023-02-16 08:06:02', '2023-02-16 08:06:02'),
(25, 7, 'ac', '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(26, 7, 'ac', '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(27, 7, 'ac', '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(28, 7, 'ac', '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(29, 8, 'ac', '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(30, 8, 'ac', '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(31, 8, 'ac', '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(32, 8, 'ac', '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(33, 9, 'ac', '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(34, 9, 'ac', '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(35, 9, 'ac', '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(36, 9, 'ac', '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(37, 10, 'ac', '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(38, 10, 'ac', '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(39, 10, 'ac', '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(40, 10, 'ac', '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(41, 11, 'ac', '2023-02-16 08:57:24', '2023-02-16 08:57:24'),
(42, 11, 'ac', '2023-02-16 08:57:24', '2023-02-16 08:57:24'),
(43, 11, 'ac', '2023-02-16 08:57:24', '2023-02-16 08:57:24'),
(44, 11, 'ac', '2023-02-16 08:57:24', '2023-02-16 08:57:24'),
(45, 12, 'ac', '2023-02-16 08:57:24', '2023-02-16 08:57:24'),
(46, 12, 'ac', '2023-02-16 08:57:24', '2023-02-16 08:57:24'),
(47, 12, 'ac', '2023-02-16 08:57:24', '2023-02-16 08:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `correct_answers`
--

CREATE TABLE `correct_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `questionId` int(11) NOT NULL,
  `answerId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `correct_answers`
--

INSERT INTO `correct_answers` (`id`, `questionId`, `answerId`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(2, 2, 6, '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(3, 3, 10, '2023-02-16 08:06:00', '2023-02-16 08:06:00'),
(4, 4, 14, '2023-02-16 08:06:00', '2023-02-16 08:06:00'),
(5, 5, 18, '2023-02-16 08:06:01', '2023-02-16 08:06:01'),
(6, 6, 22, '2023-02-16 08:06:02', '2023-02-16 08:06:02'),
(7, 7, 26, '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(8, 8, 30, '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(9, 9, 34, '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(10, 10, 38, '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(11, 11, 42, '2023-02-16 08:57:24', '2023-02-16 08:57:24'),
(12, 12, 46, '2023-02-16 08:57:24', '2023-02-16 08:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(34, '2023_02_16_094338_create_quizs_table', 2),
(35, '2023_02_16_095840_create_questions_table', 2),
(36, '2023_02_16_095850_create_answers_table', 2),
(37, '2023_02_16_105706_create_correct_answers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quizId` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isRequired` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quizId`, `description`, `isRequired`, `created_at`, `updated_at`) VALUES
(1, 1, 'akas', 1, '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(2, 1, 'akas', 1, '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(3, 2, 'akas', 1, '2023-02-16 08:06:00', '2023-02-16 08:06:00'),
(4, 2, 'akas', 1, '2023-02-16 08:06:00', '2023-02-16 08:06:00'),
(5, 3, 'akas', 1, '2023-02-16 08:06:01', '2023-02-16 08:06:01'),
(6, 3, 'akas', 1, '2023-02-16 08:06:02', '2023-02-16 08:06:02'),
(7, 4, 'akas', 1, '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(8, 4, 'akas', 1, '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(9, 5, 'akas', 1, '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(10, 5, 'akas', 1, '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(11, 6, 'akas', 1, '2023-02-16 08:57:24', '2023-02-16 08:57:24'),
(12, 6, 'akas', 1, '2023-02-16 08:57:24', '2023-02-16 08:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','publish') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'abc', 'publish', '2023-02-16 08:00:27', '2023-02-16 08:00:27'),
(2, 'abc', 'abc', 'publish', '2023-02-16 08:05:59', '2023-02-16 08:05:59'),
(3, 'abc', 'abc', 'publish', '2023-02-16 08:06:01', '2023-02-16 08:06:01'),
(4, 'abc', 'abc', 'publish', '2023-02-16 08:55:26', '2023-02-16 08:55:26'),
(5, 'abc', 'abc', 'publish', '2023-02-16 08:56:15', '2023-02-16 08:56:15'),
(6, 'abc', 'abc', 'publish', '2023-02-16 08:57:24', '2023-02-16 08:57:24');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'waleed', 'waleedmuaz2@gmail.com', NULL, '$2y$10$Q6jDvfVRrWAPw4HfNW5PeOO69Z2lVUsivBVasXkTlkIVl17utNs6m', NULL, '2023-02-16 03:24:22', '2023-02-16 03:24:22'),
(2, 'waleed', 'waleedmuaz2@gmail.com1', NULL, '$2y$10$wh3h0XRU153ymrZxWbHq7eLcGrucDNYue0fxjk/1I3F8GPBW6dBWK', NULL, '2023-02-16 03:25:26', '2023-02-16 03:25:26'),
(3, 'waleed', 'waleedmuaz2@gmail.com12', NULL, '$2y$10$.ZQBikWosxKbJjWLPQZXl.f4Yj1ovjCam5KhjBFf8wjegHHMzuAUC', NULL, '2023-02-16 04:01:28', '2023-02-16 04:01:28'),
(4, 'waleed', 'waleedmuaz21@gmail.com', NULL, '$2y$10$4nNd0hf.m.U5auv1W5I/6.MQYZlC2WJica5zOqpE5Yv7gDyqPvoHe', NULL, '2023-02-16 04:14:59', '2023-02-16 04:14:59'),
(5, '213123', 'waleedmuaz21123123@gmail.com', NULL, '$2y$10$KC4Nws5Msb.eRFS/f2eWCeqaJeUUrBJj7EHMVWiXFx67xhXoNjVee', NULL, '2023-02-16 04:25:44', '2023-02-16 04:25:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `correct_answers`
--
ALTER TABLE `correct_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `correct_answers`
--
ALTER TABLE `correct_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
