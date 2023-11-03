-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 06:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bursary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `email`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Dan Ndong  Nyatado', 'ndongdan4@gmail.com', 726585782, '123456', '2023-10-18 12:43:18', '2023-10-18 12:43:18'),
(2, 'Dan tel', 'danndong080@gmail.com', 711111111, '123', '2023-10-26 10:10:12', '2023-10-26 10:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm_upi_reg_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` bigint(255) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `today_date` date DEFAULT NULL,
  `year` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `reference_number`, `student_fullname`, `adm_upi_reg_no`, `school_type`, `school_name`, `bank_name`, `account_no`, `location`, `status`, `created_at`, `updated_at`, `today_date`, `year`) VALUES
(1, 'BUR3422', 'Caryn Daniels', 'Et voluptates quidem', 'University/College/TVET', 'Idola Oliver', 'Buffy Castillo', 11, 'Silas', 'Approved', '2023-09-21 07:16:57', '2023-09-21 07:16:57', NULL, NULL),
(2, 'BUR7203', 'Felicia Rivera', 'Corporis perspiciati', 'Primary school', 'Miriam Estrada', 'Timon Parker', 77, 'Silas', 'Approved', '2023-09-21 10:41:46', '2023-09-21 10:41:46', NULL, NULL),
(3, 'BUR1728', 'Dan Ndong', 'com/1002/18', 'University/College/TVET', 'Moi University', 'National bank', 111986633536609, 'Munyaka', 'Approved', '2023-09-21 10:50:42', '2023-09-21 10:50:42', NULL, NULL),
(4, 'BUR2446', 'Dan Ndong', 'com/1002/18', 'University/College/TVET', 'Moi University', 'National bank', 111986633536609, 'Munyaka', 'Approved', '2023-09-21 10:52:51', '2023-09-21 10:52:51', NULL, NULL),
(5, 'BUR8725', 'Logan Hartman', 'Perferendis minus si', 'Primary school', 'Genevieve Cannon', 'Evan Newman', 44, 'Block 10', 'Approved', '2023-09-21 13:39:46', '2023-09-21 13:39:46', NULL, NULL),
(6, 'BUR2562', 'Logan Hartman', 'Perferendis minus si', 'Primary school', 'Genevieve Cannon', 'Evan Newman', 44, 'Block 10', 'Approved', '2023-09-21 13:41:03', '2023-09-21 13:41:03', NULL, NULL),
(7, 'BUR3490', 'Logan Hartman', 'Perferendis minus si', 'Primary school', 'Genevieve Cannon', 'moi', 44, 'Jerusalem', 'Approved', '2023-09-21 13:41:33', '2023-10-24 18:10:15', NULL, NULL),
(8, 'BUR1203', 'Logan Hartman', 'Perferendis minus si', 'Primary school', 'Genevieve Cannon', 'moi', 44, 'Block 10', 'Approved', '2023-09-21 13:42:45', '2023-10-24 18:10:58', NULL, NULL),
(9, 'BUR3204', 'Jenette Sullivan', 'Dolores eos hic dolo', 'Primary school', 'Upton Galloway', 'Melvin Sanford', 23, 'Ilula', 'Approved', '2023-09-21 13:55:14', '2023-09-21 13:55:14', NULL, NULL),
(10, 'BUR1503', 'Shaeleigh Edwards', 'Mollit cupiditate vo', 'Secondary School', 'Irene Elliott', 'Tamekah Wilkins', 9, 'Ilula', 'Approved', '2023-09-21 14:00:02', '2023-09-21 14:00:02', NULL, NULL),
(11, 'BUR6633', 'Shaeleigh Edwards', 'Mollit cupiditate vo', 'Secondary School', 'Irene Elliott', 'Tamekah Wilkins', 9, 'Ilula', 'Pending...', '2023-09-21 14:03:04', '2023-09-21 14:03:04', NULL, NULL),
(12, 'BUR5595', 'Shaeleigh Edwards', 'Mollit cupiditate vo', 'Secondary School', 'Irene Elliott', 'Tamekah Wilkins', 9, 'Ilula', 'Pending...', '2023-09-21 14:03:23', '2023-09-21 14:03:23', NULL, NULL),
(13, 'BUR5191', 'Shaeleigh Edwards', 'Mollit cupiditate vo', 'Secondary School', 'Irene Elliott', 'Tamekah Wilkins', 9, 'Ilula', 'Pending...', '2023-09-21 14:07:39', '2023-09-21 14:07:39', NULL, NULL),
(14, 'BUR1969', 'Remedios Rivera', 'Fugiat sunt sit ad', 'Primary school', 'Nerea Hopper', 'Pascale Boyle', 92, 'Ilula', 'Pending...', '2023-09-21 14:39:23', '2023-09-21 14:39:23', NULL, NULL),
(15, 'BUR4323', 'Quon Woodard', 'Nemo omnis dolores e', 'Secondary School', 'Walker Newman', 'Dante Matthews', 25, 'Ilula', 'Approved', '2023-09-21 14:40:47', '2023-09-21 14:40:47', NULL, NULL),
(16, 'BUR6883', 'Raymond Castillo', 'Neque est ipsum ali', 'University/College/TVET', 'Kareem Pena', 'Gage Santana', 62, 'Ilula', 'Approved', '2023-09-21 14:45:08', '2023-09-21 14:45:08', NULL, NULL),
(17, 'BUR6791', 'Quail Delgado', 'Fuga Suscipit assum', 'University/College/TVET', 'Thor Little', 'Daniel Armstrong', 98, 'Munyaka', 'Pending...', '2023-09-21 14:53:51', '2023-09-21 14:53:51', NULL, NULL),
(18, 'BUR8865', 'Jaquelyn Mendez', 'Similique lorem reru', 'University/College/TVET', 'Sylvia Velasquez', 'Xaviera Baird', 17, 'Block 10', 'Pending...', '2023-09-21 15:01:11', '2023-09-21 15:01:11', NULL, NULL),
(19, 'BUR1703', 'Jaquelyn Mendez', 'Similique lorem reru', 'University/College/TVET', 'Sylvia Velasquez', 'Xaviera Baird', 17, 'Block 10', 'Pending...', '2023-09-21 15:07:09', '2023-09-21 15:07:09', NULL, NULL),
(20, 'BUR9551', 'Jaquelyn Mendez', 'Similique lorem reru', 'University/College/TVET', 'Sylvia Velasquez', 'Xaviera Baird', 17, 'Block 10', 'Pending...', '2023-09-21 15:08:58', '2023-09-21 15:08:58', NULL, NULL),
(21, 'BUR4411', 'Macey Gomez', 'Illum deleniti tota', 'University/College/TVET', 'Burke Singleton', 'Leonard Bradshaw', 30, 'Ilula', 'Pending...', '2023-09-22 06:27:24', '2023-09-22 06:27:24', NULL, NULL),
(22, 'BUR1433', 'Brenna Wiggins', 'Ut voluptatem Volup', 'Primary school', 'Bert Kidd', 'Felicia Jackson', 82, 'Munyaka', 'Pending...', '2023-09-22 10:48:10', '2023-09-22 10:48:10', NULL, NULL),
(23, 'BUR4233', 'Alfonso Mccarty', 'Mollit provident au', 'Secondary School', 'Pandora Lang', 'Denise Raymond', 15, 'Block 10', 'Pending...', '2023-09-25 09:25:29', '2023-09-25 09:25:29', NULL, NULL),
(24, 'BUR8352', 'Anne Guerrero', 'Blanditiis necessita', 'University/College/TVET', 'Destiny Rush', 'Ignatius Mccarthy', 88, 'Silas', 'Pending...', '2023-09-25 09:29:42', '2023-09-25 09:29:42', NULL, NULL),
(25, 'BUR3718', 'Tad Moran', 'Possimus officia el', 'University/College/TVET', 'Dillon Salazar', 'Gloria Lang', 14, 'Ilula', 'Approved', '2023-09-25 14:58:32', '2023-09-25 14:58:32', NULL, NULL),
(26, 'BUR5634', 'Tad Moran', 'Possimus officia el', 'University/College/TVET', 'Dillon Salazar', 'Gloria Lang', 14, 'Ilula', 'Pending...', '2023-10-18 09:33:21', '2023-10-18 09:33:21', NULL, NULL),
(27, 'BUR7293', 'Diana Ward', 'Mollitia deserunt fu', 'University/College/TVET', '64 Secondary School', 'Family Bank', 52, 'Silas', 'Pending...', '2023-10-24 18:02:41', '2023-10-24 18:02:41', '2023-10-24', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_upload`
--

CREATE TABLE `beneficiary_upload` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beneficiary_upload`
--

INSERT INTO `beneficiary_upload` (`id`, `document_name`, `document`, `uploaded_by`, `created_at`, `updated_at`) VALUES
(1, 'test', '6.PNG', 'ndongdan4@gmail.com', '2023-10-18 09:46:21', '2023-10-18 09:46:21'),
(2, 'Test1', '10.PNG', 'ndongdan4@gmail.com', '2023-10-24 18:15:23', '2023-10-24 18:15:23'),
(3, '', '6.PNG', 'ndongdan4@gmail.com', '2023-10-26 11:24:39', '2023-10-26 11:24:39'),
(4, '', '6.PNG', 'ndongdan4@gmail.com', '2023-10-26 11:24:51', '2023-10-26 11:24:51'),
(5, '', '6.PNG', 'ndongdan4@gmail.com', '2023-10-26 11:24:57', '2023-10-26 11:24:57'),
(6, '', '6.PNG', 'ndongdan4@gmail.com', '2023-10-26 11:26:56', '2023-10-26 11:26:56'),
(7, '', '12.PNG', 'ndongdan4@gmail.com', '2023-10-26 11:27:15', '2023-10-26 11:27:15'),
(8, 'Test2', '9.PNG', 'ndongdan4@gmail.com', '2023-10-26 11:28:17', '2023-10-26 11:28:17'),
(9, 'Monday', '14.PNG', 'ndongdan4@gmail.com', '2023-10-26 12:10:54', '2023-10-26 12:10:54'),
(10, 'trial', '13310532_136928846714339_5657588575054816625_n.jpg', 'danndong080@gmail.com', '2023-10-26 15:38:02', '2023-10-26 15:38:02');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_19_092615_students', 1),
(6, '2023_09_19_092634_parents', 1),
(7, '2023_09_19_092907_bursaries', 2),
(8, '2023_09_19_092938_applications', 2),
(9, '2023_09_29_095258_admins', 3),
(10, '2023_10_06_083822_reports', 3),
(11, '2023_10_13_083301_beneficiaries', 3);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `parent_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id_no` int(50) NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `parent_guardian_name`, `student_fullname`, `phone`, `parent_email`, `parent_id_no`, `occupation`, `created_at`, `updated_at`) VALUES
(1, 'Caryn Daniels', 'Caryn Daniels', 100, '', 0, 'Others', '2023-09-21 07:16:57', '2023-09-21 07:16:57'),
(2, 'Felicia Rivera', 'Felicia Rivera', 73, '', 0, 'Self-employed', '2023-09-21 10:41:46', '2023-09-21 10:41:46'),
(3, 'Dan Ndong', 'Dan Ndong', 713556002, '', 0, 'Self-employed', '2023-09-21 10:47:35', '2023-09-21 10:47:35'),
(4, 'Dan Ndong', 'Dan Ndong', 713556002, '', 0, 'Self-employed', '2023-09-21 10:50:42', '2023-09-21 10:50:42'),
(5, 'Dan Ndong', 'Dan Ndong', 713556002, '', 0, 'Self-employed', '2023-09-21 10:52:51', '2023-09-21 10:52:51'),
(6, 'Josiah Farley', 'Logan Hartman', 82, '', 0, 'Employed', '2023-09-21 13:39:46', '2023-09-21 13:39:46'),
(7, 'Josiah Farley', 'Logan Hartman', 82, '', 0, 'Employed', '2023-09-21 13:41:03', '2023-09-21 13:41:03'),
(8, 'Josiah Farley', 'Logan Hartman', 82, '', 0, 'Employed', '2023-09-21 13:41:33', '2023-09-21 13:41:33'),
(9, 'Josiah Farley', 'Logan Hartman', 82, '', 0, 'Employed', '2023-09-21 13:42:45', '2023-09-21 13:42:45'),
(10, 'Myra Strong', 'Jenette Sullivan', 26, '', 0, 'Employed', '2023-09-21 13:55:14', '2023-09-21 13:55:14'),
(11, 'Darius Noble', 'Shaeleigh Edwards', 54, '', 0, 'Contract', '2023-09-21 14:00:02', '2023-09-21 14:00:02'),
(12, 'Darius Noble', 'Shaeleigh Edwards', 54, '', 0, 'Contract', '2023-09-21 14:03:04', '2023-09-21 14:03:04'),
(13, 'Darius Noble', 'Shaeleigh Edwards', 54, '', 0, 'Contract', '2023-09-21 14:03:23', '2023-09-21 14:03:23'),
(14, 'Darius Noble', 'Shaeleigh Edwards', 54, '', 0, 'Contract', '2023-09-21 14:07:39', '2023-09-21 14:07:39'),
(15, 'Quinn Anderson', 'Remedios Rivera', 77, '', 0, 'Self-employed', '2023-09-21 14:39:23', '2023-09-21 14:39:23'),
(16, 'Caryn Farmer', 'Quon Woodard', 12, '', 0, 'Employed', '2023-09-21 14:40:47', '2023-09-21 14:40:47'),
(17, 'Price Bender', 'Raymond Castillo', 31, '', 0, 'Contract', '2023-09-21 14:45:08', '2023-09-21 14:45:08'),
(18, 'Hanae Day', 'Quail Delgado', 36, '', 0, 'Others', '2023-09-21 14:53:51', '2023-09-21 14:53:51'),
(19, 'Halee Norris', 'Jaquelyn Mendez', 70, '', 0, 'Self-employed', '2023-09-21 15:01:11', '2023-09-21 15:01:11'),
(20, 'Halee Norris', 'Jaquelyn Mendez', 70, '', 0, 'Self-employed', '2023-09-21 15:07:09', '2023-09-21 15:07:09'),
(21, 'Halee Norris', 'Jaquelyn Mendez', 70, '', 0, 'Self-employed', '2023-09-21 15:08:58', '2023-09-21 15:08:58'),
(22, 'Jada Ford', 'Macey Gomez', 87, '', 0, 'Employed', '2023-09-22 06:27:24', '2023-09-22 06:27:24'),
(23, 'Dieter Randall', 'Brenna Wiggins', 46, '', 0, 'Self-employed', '2023-09-22 10:48:10', '2023-09-22 10:48:10'),
(24, 'Armando Gilbert', 'Alfonso Mccarty', 8, '', 0, 'Employed', '2023-09-25 09:25:29', '2023-09-25 09:25:29'),
(25, 'Carter Huber', 'Anne Guerrero', 32, '', 0, 'Self-employed', '2023-09-25 09:29:42', '2023-09-25 09:29:42'),
(26, 'Clare Puckett', 'Tad Moran', 42, 'danndong080@gmail.com', 72, 'Unemployed', '2023-09-25 14:58:32', '2023-09-25 14:58:32'),
(27, 'Alec Gibson', 'Diana Ward', 4290790909, 'danndong00@gmail.com', 46909090, 'Others', '2023-10-24 18:02:07', '2023-10-24 18:02:07');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount_awarded` bigint(20) NOT NULL,
  `total_amount_awarded` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `report_id`, `student_name`, `parent`, `school_level`, `school_name`, `location`, `Amount_awarded`, `total_amount_awarded`, `created_at`, `updated_at`) VALUES
(1, 'REP939', 'Dan Ndong', 'dan', 'University/College/TVET', 'Moi University', 'Munyaka', 5000, 5000, '2023-10-25 06:37:56', '2023-10-25 06:37:56'),
(2, 'REP178', 'Logan Hartman', 'Josiah Farley', 'Primary school', 'Genevieve Cannon', 'Block 10', 5000, 5000, '2023-10-25 06:39:32', '2023-10-25 06:39:32'),
(3, 'REP599', 'Logan Hartman', 'Josiah Farley', 'Primary school', 'Genevieve Cannon', 'Block 10', 5000, 5000, '2023-10-25 06:39:32', '2023-10-25 06:39:32'),
(4, 'REP503', 'Logan Hartman', 'Josiah Farley', 'Primary school', 'Genevieve Cannon', 'Block 10', 5000, 5000, '2023-10-25 06:39:32', '2023-10-25 06:39:32'),
(5, 'REP136', 'Logan Hartman', 'Josiah Farley', 'Primary school', 'Genevieve Cannon', 'Block 10', 5000, 5000, '2023-10-25 06:39:32', '2023-10-25 06:39:32'),
(6, 'REP620', 'Logan Hartman', 'Josiah Farley', 'Primary school', 'Genevieve Cannon', 'Block 10', 5000, 5000, '2023-10-25 06:40:47', '2023-10-25 06:40:47'),
(7, 'REP506', 'Jenette Sullivan', 'Myra Strong', 'Primary school', 'Upton Galloway', 'Ilula', 5000, 5000, '2023-10-25 06:41:13', '2023-10-25 06:41:13'),
(8, 'REP242', 'Logan Hartman', 'Josiah Farley', 'Primary school', 'Genevieve Cannon', 'Jerusalem', 5000, 5000, '2023-10-25 06:48:23', '2023-10-25 06:48:23'),
(9, 'REP936', 'Shaeleigh Edwards', 'Darius Noble', 'Secondary School', 'Irene Elliott', 'Ilula', 5000, 5000, '2023-10-25 06:51:41', '2023-10-25 06:51:41'),
(10, 'REP384', 'Raymond Castillo', 'Price Bender', 'University/College/TVET', 'Kareem Pena', 'Ilula', 10000, 10000, '2023-10-25 06:57:40', '2023-10-25 06:57:40'),
(11, 'REP821', 'Quon Woodard', 'Caryn Farmer', 'Secondary School', 'Walker Newman', 'Ilula', 5000, 5000, '2023-10-25 06:58:05', '2023-10-25 06:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `parent_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id_no` int(50) NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_location` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm_upi_reg_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_fullname`, `age`, `gender`, `family_status`, `parent_guardian_name`, `phone`, `parent_email`, `parent_id_no`, `occupation`, `county`, `ward`, `location`, `sub_location`, `school_level`, `adm_upi_reg_no`, `school_name`, `created_at`, `updated_at`, `year`) VALUES
(1, 'Alexandra Mckee', 17, 'Male', 'Poor', 'Alexandra Mckee', 26, '', 0, '', 'Uasin Gishu', 'Kaptagat', 'Silas', '', 'Secondary School', 'Molestias incididunt', 'Melissa Callahan', '2023-09-21 07:01:38', '2023-09-21 07:01:38', NULL),
(5, 'Caryn Daniels', 20, 'Female', 'Average', 'Caryn Daniels', 100, '', 0, '', 'Uasin Gishu', 'Kapsoya', 'Silas', '', 'University/College/TVET', 'Et voluptates quidem', 'Idola Oliver', '2023-09-21 07:16:56', '2023-09-21 07:16:56', NULL),
(6, 'Felicia Rivera', 23, 'Male', 'Rich', 'Felicia Rivera', 73, '', 0, '', 'Uasin Gishu', 'Kipsomba', 'Silas', '', 'Primary school', 'Corporis perspiciati', 'Miriam Estrada', '2023-09-21 10:41:46', '2023-09-21 10:41:46', NULL),
(8, 'Dan Ndong', 25, 'Male', 'Average', 'Dan Ndong', 713556002, '', 0, 'Self-employed', 'Uasin Gishu', 'Moiben', 'Munyaka', '', 'University/College/TVET', 'com/1002/18', 'Moi University', '2023-09-21 10:47:35', '2023-09-21 10:47:35', NULL),
(9, 'Dan Ndong', 25, 'Male', 'Average', 'Dan Ndong', 713556002, '', 0, 'Self-employed', 'Uasin Gishu', 'Moiben', 'Munyaka', '', 'University/College/TVET', 'com/1002/18', 'Moi University', '2023-09-21 10:50:42', '2023-09-21 10:50:42', NULL),
(10, 'Dan Ndong', 25, 'Male', 'Average', 'Dan Ndong', 713556002, '', 0, 'Self-employed', 'Uasin Gishu', 'Moiben', 'Munyaka', '', 'University/College/TVET', 'com/1002/18', 'Moi University', '2023-09-21 10:52:51', '2023-09-21 10:52:51', NULL),
(11, 'Logan Hartman', 7, 'Female', 'Other', 'Josiah Farley', 82, '', 0, 'Employed', 'Uasin Gishu', 'Kapsoya', 'Block 10', '', 'Primary school', 'Perferendis minus si', 'Genevieve Cannon', '2023-09-21 13:39:46', '2023-09-21 13:39:46', NULL),
(12, 'Logan Hartman', 7, 'Female', 'Other', 'Josiah Farley', 82, '', 0, 'Employed', 'Uasin Gishu', 'Kapsoya', 'Block 10', '', 'Primary school', 'Perferendis minus si', 'Genevieve Cannon', '2023-09-21 13:41:03', '2023-09-21 13:41:03', NULL),
(13, 'Logan Hartman', 7, 'Female', 'Other', 'Josiah Farley', 82, '', 0, 'Employed', 'Uasin Gishu', 'Kapsoya', 'Block 10', '', 'Primary school', 'Perferendis minus si', 'Genevieve Cannon', '2023-09-21 13:41:33', '2023-09-21 13:41:33', NULL),
(14, 'Logan Hartman', 7, 'Female', 'Other', 'Josiah Farley', 82, '', 0, 'Employed', 'Uasin Gishu', 'Kapsoya', 'Block 10', '', 'Primary school', 'Perferendis minus si', 'Genevieve Cannon', '2023-09-21 13:42:45', '2023-09-21 13:42:45', NULL),
(15, 'Jenette Sullivan', 21, 'Male', 'Rich', 'Myra Strong', 26, '', 0, 'Employed', 'Uasin Gishu', 'Kipsomba', 'Ilula', '', 'Primary school', 'Dolores eos hic dolo', 'Upton Galloway', '2023-09-21 13:55:14', '2023-09-21 13:55:14', NULL),
(16, 'Shaeleigh Edwards', 6, 'Female', 'Other', 'Darius Noble', 54, '', 0, 'Contract', 'Uasin Gishu', 'Ziwa', 'Ilula', '', 'Secondary School', 'Mollit cupiditate vo', 'Irene Elliott', '2023-09-21 14:00:02', '2023-09-21 14:00:02', NULL),
(17, 'Shaeleigh Edwards', 6, 'Female', 'Other', 'Darius Noble', 54, '', 0, 'Contract', 'Uasin Gishu', 'Ziwa', 'Ilula', '', 'Secondary School', 'Mollit cupiditate vo', 'Irene Elliott', '2023-09-21 14:03:04', '2023-09-21 14:03:04', NULL),
(18, 'Shaeleigh Edwards', 6, 'Female', 'Other', 'Darius Noble', 54, '', 0, 'Contract', 'Uasin Gishu', 'Ziwa', 'Ilula', '', 'Secondary School', 'Mollit cupiditate vo', 'Irene Elliott', '2023-09-21 14:03:23', '2023-09-21 14:03:23', NULL),
(19, 'Shaeleigh Edwards', 6, 'Female', 'Other', 'Darius Noble', 54, '', 0, 'Contract', 'Uasin Gishu', 'Ziwa', 'Ilula', '', 'Secondary School', 'Mollit cupiditate vo', 'Irene Elliott', '2023-09-21 14:07:39', '2023-09-21 14:07:39', NULL),
(20, 'Remedios Rivera', 18, 'Female', 'Poor', 'Quinn Anderson', 77, '', 0, 'Self-employed', 'Uasin Gishu', 'Kapsoya', 'Ilula', '', 'Primary school', 'Fugiat sunt sit ad', 'Nerea Hopper', '2023-09-21 14:39:23', '2023-09-21 14:39:23', NULL),
(21, 'Quon Woodard', 19, 'Female', 'Poor', 'Caryn Farmer', 12, '', 0, 'Employed', 'Uasin Gishu', 'Kapsoya', 'Ilula', '', 'Secondary School', 'Nemo omnis dolores e', 'Walker Newman', '2023-09-21 14:40:47', '2023-09-21 14:40:47', NULL),
(22, 'Raymond Castillo', 10, 'Male', 'Rich', 'Price Bender', 31, '', 0, 'Contract', 'Uasin Gishu', 'Kipsomba', 'Ilula', '', 'University/College/TVET', 'Neque est ipsum ali', 'Kareem Pena', '2023-09-21 14:45:08', '2023-09-21 14:45:08', NULL),
(23, 'Quail Delgado', 18, 'Male', 'Rich', 'Hanae Day', 36, '', 0, 'Others', 'Uasin Gishu', 'Soy', 'Munyaka', '', 'University/College/TVET', 'Fuga Suscipit assum', 'Thor Little', '2023-09-21 14:53:51', '2023-09-21 14:53:51', NULL),
(24, 'Jaquelyn Mendez', 24, 'Female', 'Other', 'Halee Norris', 70, '', 0, 'Self-employed', 'Uasin Gishu', 'Soy', 'Block 10', '', 'University/College/TVET', 'Similique lorem reru', 'Sylvia Velasquez', '2023-09-21 15:01:11', '2023-09-21 15:01:11', NULL),
(25, 'Jaquelyn Mendez', 24, 'Female', 'Other', 'Halee Norris', 70, '', 0, 'Self-employed', 'Uasin Gishu', 'Soy', 'Block 10', '', 'University/College/TVET', 'Similique lorem reru', 'Sylvia Velasquez', '2023-09-21 15:07:09', '2023-09-21 15:07:09', NULL),
(26, 'Jaquelyn Mendez', 24, 'Female', 'Other', 'Halee Norris', 70, '', 0, 'Self-employed', 'Uasin Gishu', 'Soy', 'Block 10', '', 'University/College/TVET', 'Similique lorem reru', 'Sylvia Velasquez', '2023-09-21 15:08:58', '2023-09-21 15:08:58', NULL),
(27, 'Macey Gomez', 13, 'Female', 'Rich', 'Jada Ford', 87, '', 0, 'Employed', 'Uasin Gishu', 'Kapsoya', 'Ilula', '', 'University/College/TVET', 'Illum deleniti tota', 'Burke Singleton', '2023-09-22 06:27:24', '2023-09-22 06:27:24', NULL),
(28, 'Brenna Wiggins', 22, 'Male', 'Other', 'Dieter Randall', 46, '', 0, 'Self-employed', 'Uasin Gishu', 'Ziwa', 'Munyaka', '', 'Primary school', 'Ut voluptatem Volup', 'Bert Kidd', '2023-09-22 10:48:09', '2023-09-22 10:48:09', NULL),
(29, 'Alfonso Mccarty', 9, 'Male', 'Average', 'Armando Gilbert', 8, '', 0, 'Employed', 'Uasin Gishu', 'Ziwa', 'Block 10', '', 'Secondary School', 'Mollit provident au', 'Pandora Lang', '2023-09-25 09:25:29', '2023-09-25 09:25:29', NULL),
(30, 'Anne Guerrero', 24, 'Male', 'Rich', 'Carter Huber', 32, 'a@gmail.com', 0, 'Self-employed', 'Uasin Gishu', 'Kapsoya', 'Silas', '', 'University/College/TVET', 'Blanditiis necessita', 'Destiny Rush', '2023-09-25 09:29:42', '2023-09-25 09:29:42', NULL),
(31, 'Tad Moran', 17, 'Female', 'Other', 'Clare Puckett', 42, 'danndong080@gmail.com', 72, 'Unemployed', 'Uasin Gishu', 'Ziwa', 'Ilula', '', 'University/College/TVET', 'Possimus officia el', 'Dillon Salazar', '2023-09-25 14:58:31', '2023-09-25 14:58:31', NULL),
(32, 'Diana Ward', 18, 'Male', 'Average', 'Alec Gibson', 4290790909, 'danndong00@gmail.com', 46909090, 'Others', 'Uasin Gishu', 'Moiben', 'Silas', 'Airstrip', 'University/College/TVET', 'Mollitia deserunt fu', '64 Secondary School', '2023-10-24 18:02:07', '2023-10-24 18:02:07', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'danndong080@gmail.com', '12345', '2023-10-24 17:27:42', '2023-10-24 17:27:42'),
(2, 'danndong00@gmail.com', '12345', '2023-10-24 17:39:23', '2023-10-24 17:39:23'),
(3, 'danndong@gmail.com', '12345', '2023-10-24 18:10:05', '2023-10-24 18:10:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary_upload`
--
ALTER TABLE `beneficiary_upload`
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
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `occupation` (`occupation`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `beneficiary_upload`
--
ALTER TABLE `beneficiary_upload`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
