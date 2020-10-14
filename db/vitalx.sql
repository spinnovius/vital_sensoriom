-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2018 at 02:55 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitalx`
--

-- --------------------------------------------------------

--
-- Table structure for table `authority_council`
--

CREATE TABLE `authority_council` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_number` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authority_council`
--

INSERT INTO `authority_council` (`id`, `name`, `address`, `register_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Surat', '1242314124', 1, '2018-06-07 07:45:20', '2018-06-07 07:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `call_history`
--

CREATE TABLE `call_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `calling_time` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_history`
--

CREATE TABLE `chat_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `coach_id` int(10) UNSIGNED NOT NULL,
  `last_chat_date` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Ahmedabad', 1, '2018-06-07 06:59:26', '2018-06-07 06:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `coach_detail`
--

CREATE TABLE `coach_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `coach_id` int(10) UNSIGNED NOT NULL,
  `city` int(10) UNSIGNED NOT NULL,
  `qualification` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authority_council_id` int(10) UNSIGNED NOT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci,
  `document` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `speciality` int(10) UNSIGNED NOT NULL,
  `city` int(10) UNSIGNED NOT NULL,
  `fee_of_consultation` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mbbs_registration_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mbbs_authority_council_name` int(10) UNSIGNED NOT NULL,
  `md_ms_dnb_registration_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `md_ms_dnb_authority_council_name` int(10) UNSIGNED NOT NULL,
  `dm_mch_dnb_registration_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dm_mch_dnb_authority_council_name` int(10) UNSIGNED NOT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci,
  `document` text COLLATE utf8mb4_unicode_ci,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors_balance`
--

CREATE TABLE `doctors_balance` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `online_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offline_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors_bank_detail`
--

CREATE TABLE `doctors_bank_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiary_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_speciality`
--

CREATE TABLE `doctor_speciality` (
  `id` int(10) UNSIGNED NOT NULL,
  `speciality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_speciality`
--

INSERT INTO `doctor_speciality` (`id`, `speciality`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Neurology', 1, '2018-06-07 06:43:07', '2018-06-07 06:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `helth_team`
--

CREATE TABLE `helth_team` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `coach_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `urgent_care_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `email`, `contact_number`, `address`, `urgent_care_number`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test Hospital', 'test.hospital@gmail.com', '7048101084', 'Paldi Ahmedabad', '135622359252', 1, '2018-06-07 23:42:03', '2018-06-07 23:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `list_of_problem`
--

CREATE TABLE `list_of_problem` (
  `id` int(10) UNSIGNED NOT NULL,
  `problem` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_of_problem`
--

INSERT INTO `list_of_problem` (`id`, `problem`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Diabetes', 1, '2018-06-07 23:58:21', '2018-06-07 23:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `master_health_plan`
--

CREATE TABLE `master_health_plan` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor` int(10) UNSIGNED NOT NULL,
  `appointment` int(10) UNSIGNED NOT NULL,
  `free_test` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_health_plan`
--

INSERT INTO `master_health_plan` (`id`, `plan_name`, `price`, `doctor`, `appointment`, `free_test`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test Plan', '1200', 1, 2, 2, 1, '2018-06-08 01:50:06', '2018-06-08 02:00:03');

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
(1, '2018_05_24_060814_create_role_table', 1),
(2, '2018_06_06_124536_create_users_table', 1),
(3, '2018_06_06_125611_create_doctor_speciality_table', 1),
(4, '2018_06_06_125710_create_city_table', 1),
(5, '2018_06_06_125841_create_authority_counsil_table', 1),
(6, '2018_06_06_130024_create_doctors_table', 1),
(7, '2018_06_06_130507_create_doctors_balance_table', 1),
(8, '2018_06_06_130755_create_doctors_bank_detail_table', 1),
(9, '2018_06_06_130944_create_hospital_table', 1),
(10, '2018_06_06_131230_create_list_of_problem_table', 1),
(11, '2018_06_07_043356_create_coach_detail_table', 1),
(12, '2018_06_07_044237_create_allergies_table', 1),
(13, '2018_06_07_044358_create_vitals_table', 1),
(14, '2018_06_07_044506_create_unit_for_lab_details_table', 1),
(15, '2018_06_07_044629_create_user_location_table', 1),
(16, '2018_06_07_045336_create_patient_detail_table', 1),
(17, '2018_06_07_045720_create_patient_family_contact_table', 1),
(18, '2018_06_07_045923_create_patient_wallet_detail_table', 1),
(19, '2018_06_07_050133_create_master_helth_plan_table', 1),
(20, '2018_06_07_050443_create_patient_helth_plan_table', 1),
(21, '2018_06_07_050744_create_patient_helth_records_table', 1),
(22, '2018_06_07_051028_create_reminder_table', 1),
(23, '2018_06_07_051300_create_notification_table', 1),
(24, '2018_06_07_051556_create_call_history_table', 1),
(25, '2018_06_07_051823_create_chat_history_table', 1),
(26, '2018_06_07_052052_create_faq_table', 1),
(27, '2018_06_07_052154_create_helth_team_table', 1),
(28, '2018_06_07_052505_create_patient_lab_detail_table', 1),
(29, '2018_06_07_053103_create_patient_procedure_table', 1),
(30, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(31, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(32, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(33, '2016_06_01_000004_create_oauth_clients_table', 2),
(34, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `coach_id` int(10) UNSIGNED NOT NULL,
  `notification_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0a2cc1f6aa80c16f471b2159b95f43f8020d04815999a135daf17a7e578af658cd50906174040aa4', 1, 1, 'MyApp', '[]', 0, '2018-06-07 02:08:03', '2018-06-07 02:08:03', '2019-06-07 07:38:03'),
('4687b153d278d697c29dcd9ddbc9aed615d215747970a209871bf11bef4f50289ee865ede0c4dd29', 2, 1, 'MyApp', '[]', 0, '2018-06-07 02:28:25', '2018-06-07 02:28:25', '2019-06-07 07:58:25'),
('7de861d15259a4f20f9f142c954d17e4318618a3e4eb24cb5e942ff877b0e688c2eef87b9ffa4c03', 1, 1, 'MyApp', '[]', 0, '2018-06-07 02:07:46', '2018-06-07 02:07:46', '2019-06-07 07:37:46'),
('8eff22cf488bd0669d15c0d3e78c4c472687de0b0f012ff3bcd2f8a817ce4db64da64dedf943437d', 1, 1, 'MyApp', '[]', 0, '2018-06-07 02:09:22', '2018-06-07 02:09:22', '2019-06-07 07:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'XAimiOH0uIi0w0y0zYQw5OcXSDqxJiCo1eX8a7z2', 'http://localhost', 1, 0, 0, '2018-06-07 01:41:48', '2018-06-07 01:41:48'),
(2, NULL, 'Laravel Password Grant Client', 'trrh5TTjJoTLuYwraEJjIEzghwtuabH0D1KBr1oS', 'http://localhost', 0, 1, 0, '2018-06-07 01:41:48', '2018-06-07 01:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-06-07 01:41:48', '2018-06-07 01:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_detail`
--

CREATE TABLE `patient_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `gender` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` int(10) UNSIGNED NOT NULL,
  `height` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bmi` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_family_contact`
--

CREATE TABLE `patient_family_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `member_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_plan`
--

CREATE TABLE `patient_health_plan` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `price` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor` int(10) UNSIGNED NOT NULL,
  `appointment` int(10) UNSIGNED NOT NULL,
  `free_test` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_records`
--

CREATE TABLE `patient_health_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `vitals_id` int(10) UNSIGNED NOT NULL,
  `min_value` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_value` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_lab_detail`
--

CREATE TABLE `patient_lab_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `coach_id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `test_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_date` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` int(10) UNSIGNED NOT NULL,
  `result` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_procedure`
--

CREATE TABLE `patient_procedure` (
  `id` int(10) UNSIGNED NOT NULL,
  `coach_id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `procedure_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `procedure_date` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_wallet_detail`
--

CREATE TABLE `patient_wallet_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `credit_amount` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit_amount` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `coach_id` int(10) UNSIGNED NOT NULL,
  `reminder_text` text COLLATE utf8mb4_unicode_ci,
  `reminder_date` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reminder_time` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Master Admin', 1, NULL, NULL),
(2, 'Doctor', 1, NULL, NULL),
(3, 'Coach', 1, NULL, NULL),
(4, 'Patient', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit_for_lab_details`
--

CREATE TABLE `unit_for_lab_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_for_lab_details`
--

INSERT INTO `unit_for_lab_details` (`id`, `unit`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test Unit', 1, '2018-06-08 00:09:31', '2018-06-08 00:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `contact_number`, `password`, `role_id`, `device_id`, `verified`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 'admin', 'test.admin@gmail.com', '8460521189', '$2y$10$7QlwDWRnaiEmknoqNehn2.DHLgod0sjbtJva6XzDWb5/DZhjZJPUO', 1, NULL, 1, 0, NULL, '2018-06-07 23:40:55'),
(2, 'test doctor', 'doctor', 'test.doctor@gmail.com', '7574022306', '$2y$10$EsvzMY7WkBvzYEFhG9Pddek2/a7ZJ9VUhWCOCkn/QiPRq8OuCg.4C', 2, 'asdas', 0, 0, NULL, '2018-06-08 04:22:22'),
(3, 'test', 'coach', 'test.coach@gmail.com', '8511922739', '$2y$10$6VmaP7KDJGFt2YZXx1Aab.3em6KoydENH0/YCIvvdqoen7M9Rt4hm', 3, NULL, 0, 1, NULL, NULL),
(4, 'test', 'patient', 'test.patient@gmail.com', '7048101084', '$2y$10$z/rTV1D2Bce.DbTbC6ql3.9q4dDJs/B/28OXIpbxEKAVTTofH4Uzm', 4, NULL, 0, 1, NULL, '2018-06-07 06:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_location`
--

CREATE TABLE `user_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `lat` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority_council`
--
ALTER TABLE `authority_council`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `call_history`
--
ALTER TABLE `call_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `call_history_patient_id_foreign` (`patient_id`),
  ADD KEY `call_history_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `chat_history`
--
ALTER TABLE `chat_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_history_patient_id_foreign` (`patient_id`),
  ADD KEY `chat_history_coach_id_foreign` (`coach_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coach_detail`
--
ALTER TABLE `coach_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coach_detail_coach_id_foreign` (`coach_id`),
  ADD KEY `coach_detail_city_foreign` (`city`),
  ADD KEY `coach_detail_authority_counsil_id_foreign` (`authority_council_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_doctor_id_foreign` (`doctor_id`),
  ADD KEY `doctors_speciality_foreign` (`speciality`),
  ADD KEY `doctors_city_foreign` (`city`),
  ADD KEY `doctors_mbbs_authority_counsil_name_foreign` (`mbbs_authority_council_name`),
  ADD KEY `doctors_md_ms_dnb_authority_counsil_name_foreign` (`md_ms_dnb_authority_council_name`),
  ADD KEY `doctors_dm_mch_dnb_authority_counsil_name_foreign` (`dm_mch_dnb_authority_council_name`);

--
-- Indexes for table `doctors_balance`
--
ALTER TABLE `doctors_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_balance_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `doctors_bank_detail`
--
ALTER TABLE `doctors_bank_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_bank_detail_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `doctor_speciality`
--
ALTER TABLE `doctor_speciality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `helth_team`
--
ALTER TABLE `helth_team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `helth_team_patient_id_foreign` (`patient_id`),
  ADD KEY `helth_team_coach_id_foreign` (`coach_id`),
  ADD KEY `helth_team_doctor_id_foreign` (`doctor_id`),
  ADD KEY `helth_team_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_of_problem`
--
ALTER TABLE `list_of_problem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_health_plan`
--
ALTER TABLE `master_health_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_patient_id_foreign` (`patient_id`),
  ADD KEY `notification_coach_id_foreign` (`coach_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `patient_detail`
--
ALTER TABLE `patient_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_detail_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_detail_city_foreign` (`city`);

--
-- Indexes for table `patient_family_contact`
--
ALTER TABLE `patient_family_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_family_contact_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `patient_health_plan`
--
ALTER TABLE `patient_health_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_helth_plan_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_helth_plan_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `patient_health_records`
--
ALTER TABLE `patient_health_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_helth_records_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_helth_records_vitals_id_foreign` (`vitals_id`) USING BTREE;

--
-- Indexes for table `patient_lab_detail`
--
ALTER TABLE `patient_lab_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_lab_detail_coach_id_foreign` (`coach_id`),
  ADD KEY `patient_lab_detail_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_lab_detail_unit_foreign` (`unit`);

--
-- Indexes for table `patient_procedure`
--
ALTER TABLE `patient_procedure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_procedure_coach_id_foreign` (`coach_id`),
  ADD KEY `patient_procedure_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `patient_wallet_detail`
--
ALTER TABLE `patient_wallet_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_wallet_detail_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reminder_patient_id_foreign` (`patient_id`),
  ADD KEY `reminder_coach_id_foreign` (`coach_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_for_lab_details`
--
ALTER TABLE `unit_for_lab_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_number` (`contact_number`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_location`
--
ALTER TABLE `user_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_location_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authority_council`
--
ALTER TABLE `authority_council`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `call_history`
--
ALTER TABLE `call_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_history`
--
ALTER TABLE `chat_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coach_detail`
--
ALTER TABLE `coach_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors_balance`
--
ALTER TABLE `doctors_balance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors_bank_detail`
--
ALTER TABLE `doctors_bank_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_speciality`
--
ALTER TABLE `doctor_speciality`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `helth_team`
--
ALTER TABLE `helth_team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `list_of_problem`
--
ALTER TABLE `list_of_problem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_health_plan`
--
ALTER TABLE `master_health_plan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_detail`
--
ALTER TABLE `patient_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_family_contact`
--
ALTER TABLE `patient_family_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_health_plan`
--
ALTER TABLE `patient_health_plan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_health_records`
--
ALTER TABLE `patient_health_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_lab_detail`
--
ALTER TABLE `patient_lab_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_procedure`
--
ALTER TABLE `patient_procedure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_wallet_detail`
--
ALTER TABLE `patient_wallet_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unit_for_lab_details`
--
ALTER TABLE `unit_for_lab_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_location`
--
ALTER TABLE `user_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `call_history`
--
ALTER TABLE `call_history`
  ADD CONSTRAINT `call_history_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `call_history_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `chat_history`
--
ALTER TABLE `chat_history`
  ADD CONSTRAINT `chat_history_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chat_history_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `coach_detail`
--
ALTER TABLE `coach_detail`
  ADD CONSTRAINT `coach_detail_authority_counsil_id_foreign` FOREIGN KEY (`authority_council_id`) REFERENCES `authority_council` (`id`),
  ADD CONSTRAINT `coach_detail_city_foreign` FOREIGN KEY (`city`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `coach_detail_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_city_foreign` FOREIGN KEY (`city`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `doctors_dm_mch_dnb_authority_counsil_name_foreign` FOREIGN KEY (`dm_mch_dnb_authority_council_name`) REFERENCES `authority_council` (`id`),
  ADD CONSTRAINT `doctors_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `doctors_mbbs_authority_counsil_name_foreign` FOREIGN KEY (`mbbs_authority_council_name`) REFERENCES `authority_council` (`id`),
  ADD CONSTRAINT `doctors_md_ms_dnb_authority_counsil_name_foreign` FOREIGN KEY (`md_ms_dnb_authority_council_name`) REFERENCES `authority_council` (`id`),
  ADD CONSTRAINT `doctors_speciality_foreign` FOREIGN KEY (`speciality`) REFERENCES `doctor_speciality` (`id`);

--
-- Constraints for table `doctors_balance`
--
ALTER TABLE `doctors_balance`
  ADD CONSTRAINT `doctors_balance_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `doctors_bank_detail`
--
ALTER TABLE `doctors_bank_detail`
  ADD CONSTRAINT `doctors_bank_detail_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `helth_team`
--
ALTER TABLE `helth_team`
  ADD CONSTRAINT `helth_team_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `helth_team_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `helth_team_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`),
  ADD CONSTRAINT `helth_team_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notification_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `patient_detail`
--
ALTER TABLE `patient_detail`
  ADD CONSTRAINT `patient_detail_city_foreign` FOREIGN KEY (`city`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `patient_detail_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `patient_family_contact`
--
ALTER TABLE `patient_family_contact`
  ADD CONSTRAINT `patient_family_contact_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `patient_health_plan`
--
ALTER TABLE `patient_health_plan`
  ADD CONSTRAINT `patient_helth_plan_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `patient_helth_plan_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `master_health_plan` (`id`);

--
-- Constraints for table `patient_health_records`
--
ALTER TABLE `patient_health_records`
  ADD CONSTRAINT `patient_helth_records_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `patient_helth_records_vitals_id_foreign` FOREIGN KEY (`vitals_id`) REFERENCES `vitals` (`id`);

--
-- Constraints for table `patient_lab_detail`
--
ALTER TABLE `patient_lab_detail`
  ADD CONSTRAINT `patient_lab_detail_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `patient_lab_detail_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `patient_lab_detail_unit_foreign` FOREIGN KEY (`unit`) REFERENCES `unit_for_lab_details` (`id`);

--
-- Constraints for table `patient_procedure`
--
ALTER TABLE `patient_procedure`
  ADD CONSTRAINT `patient_procedure_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `patient_procedure_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `patient_wallet_detail`
--
ALTER TABLE `patient_wallet_detail`
  ADD CONSTRAINT `patient_wallet_detail_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `reminder_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reminder_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `user_location`
--
ALTER TABLE `user_location`
  ADD CONSTRAINT `user_location_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
