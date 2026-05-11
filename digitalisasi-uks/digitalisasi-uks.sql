-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2026 at 04:35 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalisasi-uks`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `nama_obat`, `satuan`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 'Tablet', 94, '2026-05-10 17:26:51', '2026-05-10 18:22:41'),
(2, 'Promag', 'Tablet', 31, '2026-05-10 17:26:51', '2026-05-10 18:24:03'),
(3, 'Betadine', 'Botol', 13, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(4, 'Kayu Putih', 'Botol', 17, '2026-05-10 17:26:51', '2026-05-10 17:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_10_194457_create_school_classes_table', 1),
(5, '2026_05_10_194501_create_students_table', 1),
(6, '2026_05_10_194504_create_medicines_table', 1),
(7, '2026_05_10_194506_create_treatments_table', 1),
(8, '2026_05_10_194509_create_treatment_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_classes`
--

CREATE TABLE `school_classes` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_classes`
--

INSERT INTO `school_classes` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'X RPL 1', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(2, 'X RPL 2', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(3, 'XI TKJ 1', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(4, 'XI TKJ 2', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(5, 'XII RPL 1', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(6, 'XI RPL 2', '2026-05-10 18:16:55', '2026-05-10 18:16:55'),
(7, 'XI AKL 5', '2026-05-10 18:18:30', '2026-05-10 18:18:44'),
(8, 'XI MPLB 2', '2026-05-10 18:18:59', '2026-05-10 18:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GHtaJSS14wghwxVeG9bA2lwgU8sDfczOCBr6flFR', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI3TjZleG5ab0ZhVGpDQ0poOEZIUFM4aFpNZVY4c0tsekxXamRjaE1HIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1778462648);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nis`, `nama`, `kelas_id`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(1, '1007988', 'Lisandro Glover PhD', 2, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(2, '1004974', 'Samson Schowalter Sr.', 1, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(3, '1069323', 'Trycia Feest', 4, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(4, '1091999', 'Hayley Bradtke', 3, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(5, '1090946', 'Jakob Jaskolski', 1, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(6, '1054762', 'Shaun Morar', 3, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(7, '1070226', 'Carson Krajcik', 5, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(8, '1020842', 'Dr. Ewell Gottlieb', 2, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(9, '1045002', 'Federico Nicolas', 5, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(10, '1078382', 'Dawn Lesch', 1, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(11, '1020381', 'Adelia Ortiz', 1, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(12, '1018602', 'Braden Glover', 2, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(13, '1057450', 'Damian Macejkovic', 1, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(14, '1079967', 'Prof. Damaris Langosh PhD', 5, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(15, '1077928', 'Dr. Rebeca Sporer DVM', 2, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(16, '1063492', 'Noemi Terry', 5, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(17, '1051741', 'Dr. Patsy Feeney', 2, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(18, '1071112', 'Ms. Adell O\'Conner', 3, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(19, '1073251', 'Virgil Runolfsdottir', 5, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(20, '1039706', 'Gilbert Mohr', 1, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(21, '1016486', 'Reece Runte', 1, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(22, '1029522', 'Fae Mills', 3, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(23, '1001244', 'Susanna Jacobs', 3, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(24, '1049636', 'Murray Gusikowski', 3, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(25, '1051684', 'Dr. Gerardo Daniel', 1, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(26, '1042957', 'Misty Schoen', 3, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(27, '1041512', 'Gladys Reynolds', 5, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(28, '1044543', 'Arielle McLaughlin', 2, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(29, '1004115', 'Hettie Koelpin', 2, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(30, '1054457', 'Miss Hailie Swift', 2, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(31, '1008184', 'Dr. Maida Denesik Sr.', 4, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(32, '1027685', 'Vicky McClure', 2, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(33, '1008639', 'Thomas Kub', 1, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(34, '1015231', 'Shane Wolff', 1, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(35, '1058368', 'Roma Bednar', 4, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(36, '1091919', 'Mozell Rogahn Sr.', 1, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(37, '1037055', 'Dr. Anastasia Collins Sr.', 4, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(38, '1020445', 'Ariel Hintz', 1, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(39, '1047689', 'Lisa Greenfelder', 1, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(40, '1094549', 'Irwin Tromp', 4, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(41, '1036581', 'Keshawn Bernier', 5, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(42, '1019951', 'Imelda Fay', 4, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(43, '1088834', 'Connor Cummerata III', 4, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(44, '1066949', 'Karolann Walsh', 1, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(45, '1028509', 'Roselyn Erdman', 5, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(46, '1037450', 'Maya Daniel', 5, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(47, '1000656', 'Dr. Vanessa Lubowitz', 2, 'P', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(48, '1060302', 'Phyllis Batz II', 2, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(49, '1074187', 'Prof. Dixie Altenwerth', 2, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(50, '1014243', 'Krystal Cronin', 5, 'L', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(52, '676767', 'NAHDA PRANAJA', 5, 'L', '2026-05-10 18:12:10', '2026-05-10 18:12:10'),
(53, '666777', 'ZED HANIIN', 6, 'L', '2026-05-10 18:17:24', '2026-05-10 18:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` text COLLATE utf8mb4_unicode_ci,
  `tanggal_kunjungan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `student_id`, `keluhan`, `diagnosa`, `tanggal_kunjungan`, `created_at`, `updated_at`) VALUES
(1, 31, 'Demam tinggi', 'Flu dan Batuk', '2026-05-06', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(2, 3, 'Sakit perut', 'Kelelahan', '2026-04-11', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(3, 23, 'Masuk angin', 'Flu dan Batuk', '2026-05-10', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(4, 46, 'Pingsan saat upacara', 'Kelelahan', '2026-04-27', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(5, 28, 'Pusing dan mual', 'Dispepsia', '2026-04-27', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(6, 37, 'Luka jatuh saat olahraga', NULL, '2026-04-12', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(7, 5, 'Luka jatuh saat olahraga', 'Flu dan Batuk', '2026-05-03', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(8, 12, 'Masuk angin', NULL, '2026-04-29', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(9, 3, 'Pusing dan mual', NULL, '2026-05-10', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(10, 26, 'Pusing dan mual', NULL, '2026-05-07', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(11, 27, 'Sakit perut', 'Gejala Tifus', '2026-04-17', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(12, 37, 'Pusing dan mual', 'Dispepsia', '2026-05-04', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(13, 50, 'Luka jatuh saat olahraga', NULL, '2026-04-29', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(14, 25, 'Luka jatuh saat olahraga', 'Flu dan Batuk', '2026-04-15', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(15, 29, 'Sakit perut', NULL, '2026-05-03', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(16, 16, 'Pingsan saat upacara', NULL, '2026-04-26', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(17, 6, 'Pusing dan mual', NULL, '2026-04-29', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(18, 24, 'Pusing dan mual', 'Flu dan Batuk', '2026-04-26', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(19, 48, 'Luka jatuh saat olahraga', 'Gejala Tifus', '2026-05-06', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(20, 37, 'Sakit perut', 'Dispepsia', '2026-04-28', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(21, 12, 'Pingsan saat upacara', 'Gejala Tifus', '2026-04-25', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(22, 24, 'Sakit perut', 'Flu dan Batuk', '2026-04-30', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(23, 48, 'Pingsan saat upacara', NULL, '2026-04-15', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(24, 45, 'Sakit perut', 'Gejala Tifus', '2026-04-20', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(25, 47, 'Demam tinggi', 'Flu dan Batuk', '2026-04-21', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(26, 23, 'Pingsan saat upacara', 'Kelelahan', '2026-05-04', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(27, 2, 'Pingsan saat upacara', 'Kelelahan', '2026-04-17', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(28, 21, 'Demam tinggi', 'Gejala Tifus', '2026-05-10', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(29, 28, 'Sakit perut', 'Kelelahan', '2026-05-01', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(30, 25, 'Masuk angin', 'Dispepsia', '2026-04-30', '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(33, 52, 'Sakit aja lah', 'Sering bikin wacana tapi temennya pada gabisa', '2026-05-11', '2026-05-10 18:24:03', '2026-05-10 18:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_details`
--

CREATE TABLE `treatment_details` (
  `id` bigint UNSIGNED NOT NULL,
  `treatment_id` bigint UNSIGNED NOT NULL,
  `medicine_id` bigint UNSIGNED NOT NULL,
  `jumlah_obat` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatment_details`
--

INSERT INTO `treatment_details` (`id`, `treatment_id`, `medicine_id`, `jumlah_obat`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(2, 1, 4, 2, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(3, 2, 4, 2, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(4, 3, 2, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(5, 4, 1, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(6, 4, 4, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(7, 5, 2, 2, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(8, 5, 1, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(9, 7, 3, 2, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(10, 8, 4, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(11, 9, 2, 2, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(12, 9, 4, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(13, 10, 3, 2, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(14, 12, 1, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(15, 13, 2, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(16, 16, 2, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(17, 16, 3, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(18, 18, 1, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(19, 19, 4, 2, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(20, 19, 1, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(21, 20, 2, 2, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(22, 23, 3, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(23, 23, 2, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(24, 24, 2, 2, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(25, 25, 4, 2, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(26, 28, 1, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(27, 29, 3, 1, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(28, 30, 4, 2, '2026-05-10 17:26:51', '2026-05-10 17:26:51'),
(31, 33, 2, 5, '2026-05-10 18:24:03', '2026-05-10 18:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'petugas',
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

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@uks.com', NULL, '$2y$12$0S87k6Fr2tb4RfT6VRdTmeLso6kpcdY9EpxlycgVlKDFTFnMw5KyO', NULL, '2026-05-10 17:26:50', '2026-05-10 17:26:50'),
(2, 'Petugas PMR', 'petugas', 'petugas@uks.com', NULL, '$2y$12$SMD5Wi1orZ.nz3TU/Wg/yu2F.jNKPEiqMynQlrTvgJhJJwhg6.EgW', NULL, '2026-05-10 17:26:51', '2026-05-10 17:26:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `school_classes`
--
ALTER TABLE `school_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_nis_unique` (`nis`),
  ADD KEY `students_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treatments_student_id_foreign` (`student_id`);

--
-- Indexes for table `treatment_details`
--
ALTER TABLE `treatment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treatment_details_treatment_id_foreign` (`treatment_id`),
  ADD KEY `treatment_details_medicine_id_foreign` (`medicine_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `school_classes`
--
ALTER TABLE `school_classes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `treatment_details`
--
ALTER TABLE `treatment_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `school_classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `treatments`
--
ALTER TABLE `treatments`
  ADD CONSTRAINT `treatments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `treatment_details`
--
ALTER TABLE `treatment_details`
  ADD CONSTRAINT `treatment_details_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `treatment_details_treatment_id_foreign` FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
