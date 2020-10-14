-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 07:55 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sansoriam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_contact`
--

CREATE TABLE `admin_contact` (
  `id` int(11) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_contact`
--

INSERT INTO `admin_contact` (`id`, `admin_id`, `contact`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '05622210224', 1, '2018-09-04 23:44:48', '2018-10-25 21:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin_manager`
--

CREATE TABLE `admin_manager` (
  `id` int(1) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_manager`
--

INSERT INTO `admin_manager` (`id`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(4, 'foram1@gmail.com', '$2y$10$Iy4o83WFCaVetOKlLRQe.uzmw8WVBPmMzyIiASVUftTHcFm7EEC82', 0, '2019-11-09 12:56:54', '2019-11-09 13:17:27'),
(5, 'abc@gmail.com', '$2y$10$WkdwtCYbDJq8vPjhoSI00evofkE48N4fdiQBrAFAiQM./lhtF98o2', 1, '2019-11-09 18:50:50', '2019-11-09 18:50:50'),
(6, 'Adminmanager@gmail.com', '$2y$10$ColiybaOPdVDmofjkeeGOumV15/v7w2w3edSZoxgsdZApx.5L0/je', 1, '2019-12-27 06:27:12', '2019-12-27 06:27:12'),
(7, 'mng1@gmail.com', '$2y$10$zu015EUTuU71d3Ifo90/Ne4g6xApZXLBwpdat4BE656MnilGUjrqS', 1, '2019-12-27 06:30:07', '2019-12-27 06:30:07'),
(8, 'test.admin@gmail.com', '$2y$10$5gsR7LfnpntlieJciOCwfeInUb3vPtwE3Vi0H80R1CLR3NZ9fQhGq', 1, '2019-12-27 07:26:54', '2019-12-27 07:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `admin_procedure`
--

CREATE TABLE `admin_procedure` (
  `id` int(11) NOT NULL,
  `procedure_name` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_procedure`
--

INSERT INTO `admin_procedure` (`id`, `procedure_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ECG', 1, '2018-09-01 18:50:20', '2019-12-17 16:44:14'),
(2, 'ECHO', 1, '2018-09-01 18:50:27', '2018-09-01 18:50:27'),
(3, 'USG Abdomen', 1, '2018-09-01 18:50:38', '2018-09-01 18:50:38'),
(4, 'Chest X Ray', 1, '2018-09-01 18:50:47', '2018-09-01 18:50:47'),
(5, 'CT', 1, '2018-09-08 18:05:59', '2018-09-28 01:52:37'),
(6, 'TMT', 0, '2018-09-24 22:08:12', '2019-12-17 16:44:45'),
(7, 'test2', 1, '2018-09-28 18:53:15', '2018-09-28 18:53:15'),
(8, 'pro1', 1, '2019-07-25 09:26:21', '2019-07-25 09:26:21'),
(9, 'gss', 1, '2019-07-25 09:34:52', '2019-07-25 09:34:52'),
(10, 'Cardio', 1, '2019-07-31 12:05:08', '2019-07-31 12:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(10) NOT NULL,
  `images` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `images`, `status`, `created_at`, `updated_at`) VALUES
(2, 'advertisement/r18kH046RFiQ2XEDagNyTDPZScsZgTb5yPNMhY5P.jpeg', 1, '2019-07-26 11:13:05', '2019-07-26 11:13:05'),
(3, 'advertisement/0Dhs5D0sZwknXD00bYYL6QSDQLiEwo6SpGHbcRoo.jpeg', 1, '2019-07-26 11:13:56', '2019-07-26 11:13:56'),
(4, 'advertisement/FBS6jrU6LlSQf4eVeiAgmcdWMQ2ZQcBYlL6sK0yj.png', 1, '2019-07-26 11:23:01', '2019-07-26 11:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_details`
--

CREATE TABLE `appointment_details` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `clinic_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `city_id` int(10) DEFAULT NULL,
  `hostipal_id` int(10) DEFAULT NULL,
  `speciality_id` int(10) DEFAULT NULL,
  `doctor_id` int(10) DEFAULT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `adhaarno` varchar(255) DEFAULT NULL,
  `flag` int(10) NOT NULL DEFAULT 0 COMMENT '0-pending 1 - approve 2-cancel',
  `role` int(10) DEFAULT NULL,
  `poc_id` int(11) DEFAULT NULL,
  `reason_refer` varchar(255) DEFAULT NULL,
  `arrives` int(2) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authority_council`
--

CREATE TABLE `authority_council` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authority_council`
--

INSERT INTO `authority_council` (`id`, `name`, `address`, `register_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'State Medical Council', 'State Capital', NULL, 1, '2018-08-30 21:17:03', '2018-09-28 01:50:16'),
(2, 'MCI', 'New Delhi', NULL, 1, '2018-08-30 21:17:14', '2018-09-08 18:01:34'),
(4, 'NBE', 'New Delhi', NULL, 1, '2018-09-28 01:50:51', '2018-09-28 01:51:14'),
(5, 'Any University', 'City', NULL, 1, '2018-09-29 20:12:52', '2018-09-29 20:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `call_history`
--

CREATE TABLE `call_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `calling_time` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `call_history`
--

INSERT INTO `call_history` (`id`, `patient_id`, `doctor_id`, `calling_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 32, 35, '0 Min 40 Sec', 1, '2018-09-04 00:15:23', '2018-09-04 00:15:23'),
(2, 30, 31, '0 Min 53 Sec', 1, '2018-09-04 23:23:08', '2018-09-04 23:23:08'),
(3, 32, 37, '3 Min 5 Sec', 1, '2018-09-05 19:36:00', '2018-09-05 19:36:00'),
(4, 32, 37, '0 Min 12 Sec', 1, '2018-09-05 19:47:13', '2018-09-05 19:47:13'),
(5, 32, 37, '0 Min 9 Sec', 1, '2018-09-05 20:44:27', '2018-09-05 20:44:27'),
(6, 32, 37, '0 Min 5 Sec', 1, '2018-09-05 20:44:59', '2018-09-05 20:44:59'),
(7, 32, 37, '0 Min 12 Sec', 1, '2018-09-06 18:20:37', '2018-09-06 18:20:37'),
(8, 36, 37, '1 Min 54 Sec', 1, '2018-09-06 19:09:10', '2018-09-06 19:09:10'),
(9, 32, 35, '0 Min 17 Sec', 1, '2018-09-06 19:26:29', '2018-09-06 19:26:29'),
(10, 32, 37, '0 Min 8 Sec', 1, '2018-09-06 20:07:10', '2018-09-06 20:07:10'),
(11, 32, 37, '0 Min 12 Sec', 1, '2018-09-06 20:09:03', '2018-09-06 20:09:03'),
(12, 32, 37, '0 Min 5 Sec', 1, '2018-09-06 20:12:04', '2018-09-06 20:12:04'),
(13, 32, 37, '0 Min 22 Sec', 1, '2018-09-06 20:21:32', '2018-09-06 20:21:32'),
(14, 32, 37, '0 Min 2 Sec', 1, '2018-09-06 20:55:54', '2018-09-06 20:55:54'),
(15, 32, 37, '1 Min 30 Sec', 1, '2018-09-06 21:32:50', '2018-09-06 21:32:50'),
(16, 32, 37, '0 Min 21 Sec', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(17, 32, 37, '0 Min 0 Sec', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(18, 32, 37, '0 Min 0 Sec', 1, '2018-09-06 21:35:12', '2018-09-06 21:35:12'),
(19, 32, 37, '0 Min 15 Sec', 1, '2018-09-06 21:37:12', '2018-09-06 21:37:12'),
(20, 32, 37, '0 Min 6 Sec', 1, '2018-09-06 21:37:38', '2018-09-06 21:37:38'),
(21, 32, 37, '0 Min 0 Sec', 1, '2018-09-06 21:37:39', '2018-09-06 21:37:39'),
(22, 32, 37, '0 Min 8 Sec', 1, '2018-09-06 21:38:24', '2018-09-06 21:38:24'),
(23, 32, 37, '0 Min 19 Sec', 1, '2018-09-06 21:39:13', '2018-09-06 21:39:13'),
(24, 32, 37, '0 Min 4 Sec', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(25, 32, 37, '0 Min 5 Sec', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(26, 32, 37, '0 Min 0 Sec', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(27, 32, 37, '0 Min 3 Sec', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(28, 32, 37, '0 Min 4 Sec', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(29, 32, 37, '0 Min 0 Sec', 1, '2018-09-06 21:48:37', '2018-09-06 21:48:37'),
(30, 32, 37, '0 Min 4 Sec', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(31, 32, 37, '0 Min 4 Sec', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(32, 32, 37, '0 Min 4 Sec', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(33, 32, 37, '0 Min 2 Sec', 1, '2018-09-06 21:50:16', '2018-09-06 21:50:16'),
(34, 32, 37, '0 Min 0 Sec', 1, '2018-09-06 21:50:16', '2018-09-06 21:50:16'),
(35, 32, 37, '0 Min 2 Sec', 1, '2018-09-06 21:54:04', '2018-09-06 21:54:04'),
(36, 32, 37, '0 Min 2 Sec', 1, '2018-09-06 22:13:22', '2018-09-06 22:13:22'),
(37, 32, 37, '0 Min 2 Sec', 1, '2018-09-06 22:13:41', '2018-09-06 22:13:41'),
(38, 32, 37, '0 Min 3 Sec', 1, '2018-09-06 22:19:36', '2018-09-06 22:19:36'),
(39, 32, 37, '0 Min 4 Sec', 1, '2018-09-06 22:20:58', '2018-09-06 22:20:58'),
(40, 32, 37, '0 Min 2 Sec', 1, '2018-09-06 22:21:58', '2018-09-06 22:21:58'),
(41, 32, 37, '2 Min 5 Sec', 1, '2018-09-06 23:07:01', '2018-09-06 23:07:01'),
(42, 32, 37, '2 Min 14 Sec', 1, '2018-09-06 23:12:17', '2018-09-06 23:12:17'),
(43, 32, 37, '1 Min 28 Sec', 1, '2018-09-06 23:32:20', '2018-09-06 23:32:20'),
(44, 32, 37, '0 Min 45 Sec', 1, '2018-09-06 23:36:48', '2018-09-06 23:36:48'),
(45, 30, 31, '0 Min 20 Sec', 1, '2018-09-07 00:50:45', '2018-09-07 00:50:45'),
(46, 30, 31, '2 Min 31 Sec', 1, '2018-09-07 00:53:49', '2018-09-07 00:53:49'),
(47, 30, 31, '0 Min 57 Sec', 1, '2018-09-07 00:56:08', '2018-09-07 00:56:08'),
(48, 32, 31, '2 Min 35 Sec', 1, '2018-09-07 01:00:19', '2018-09-07 01:00:19'),
(49, 32, 31, '1 Min 40 Sec', 1, '2018-09-07 01:04:53', '2018-09-07 01:04:53'),
(50, 32, 37, '0 Min 43 Sec', 1, '2018-09-07 01:35:52', '2018-09-07 01:35:52'),
(51, 32, 37, '1 Min 12 Sec', 1, '2018-09-07 01:49:39', '2018-09-07 01:49:39'),
(52, 36, 37, '1 Min 44 Sec', 1, '2018-09-08 00:50:10', '2018-09-08 00:50:10'),
(53, 36, 37, '0 Min 46 Sec', 1, '2018-09-08 00:53:24', '2018-09-08 00:53:24'),
(54, 36, 37, '1 Min 23 Sec', 1, '2018-09-08 00:55:24', '2018-09-08 00:55:24'),
(55, 32, 37, '2 Min 13 Sec', 1, '2018-09-08 18:13:28', '2018-09-08 18:13:28'),
(56, 42, 41, '1 Min 22 Sec', 1, '2018-09-08 19:51:06', '2018-09-08 19:51:06'),
(57, 42, 41, '2 Min 7 Sec', 1, '2018-09-08 19:59:28', '2018-09-08 19:59:28'),
(58, 32, 37, '0 Min 43 Sec', 1, '2018-09-08 23:17:19', '2018-09-08 23:17:19'),
(59, 42, 41, '4 Min 17 Sec', 1, '2018-09-10 18:07:10', '2018-09-10 18:07:10'),
(60, 30, 31, '2 Min 4 Sec', 1, '2018-09-10 21:16:43', '2018-09-10 21:16:43'),
(61, 36, 31, '0 Min 24 Sec', 1, '2018-09-13 20:47:48', '2018-09-13 20:47:48'),
(62, 36, 31, '0 Min 2 Sec', 1, '2018-09-13 20:48:55', '2018-09-13 20:48:55'),
(63, 36, 31, '0 Min 2 Sec', 1, '2018-09-13 20:49:36', '2018-09-13 20:49:36'),
(64, 36, 31, '0 Min 2 Sec', 1, '2018-09-13 20:50:19', '2018-09-13 20:50:19'),
(65, 36, 31, '0 Min 5 Sec', 1, '2018-09-13 20:52:01', '2018-09-13 20:52:01'),
(66, 36, 31, '0 Min 6 Sec', 1, '2018-09-13 21:22:00', '2018-09-13 21:22:00'),
(67, 36, 31, '0 Min 3 Sec', 1, '2018-09-13 21:22:21', '2018-09-13 21:22:21'),
(68, 36, 37, '0 Min 3 Sec', 1, '2018-09-13 22:28:58', '2018-09-13 22:28:58'),
(69, 36, 37, '0 Min 14 Sec', 1, '2018-09-13 22:53:18', '2018-09-13 22:53:18'),
(70, 36, 37, '0 Min 28 Sec', 1, '2018-09-13 22:55:23', '2018-09-13 22:55:23'),
(71, 36, 37, '0 Min 53 Sec', 1, '2018-09-13 22:59:25', '2018-09-13 22:59:25'),
(72, 36, 37, '0 Min 25 Sec', 1, '2018-09-13 23:02:19', '2018-09-13 23:02:19'),
(73, 36, 37, '0 Min 28 Sec', 1, '2018-09-13 23:14:03', '2018-09-13 23:14:03'),
(74, 32, 37, '0 Min 15 Sec', 1, '2018-09-13 23:15:53', '2018-09-13 23:15:53'),
(75, 42, 37, '0 Min 23 Sec', 1, '2018-09-13 23:19:42', '2018-09-13 23:19:42'),
(76, 32, 37, '0 Min 11 Sec', 1, '2018-09-13 23:22:59', '2018-09-13 23:22:59'),
(77, 36, 37, '0 Min 7 Sec', 1, '2018-09-13 23:23:36', '2018-09-13 23:23:36'),
(78, 36, 37, '0 Min 7 Sec', 1, '2018-09-13 23:24:49', '2018-09-13 23:24:49'),
(79, 36, 37, '0 Min 7 Sec', 1, '2018-09-13 23:25:21', '2018-09-13 23:25:21'),
(80, 32, 37, '0 Min 4 Sec', 1, '2018-09-13 23:25:52', '2018-09-13 23:25:52'),
(81, 42, 37, '0 Min 6 Sec', 1, '2018-09-13 23:26:47', '2018-09-13 23:26:47'),
(82, 36, 37, '0 Min 4 Sec', 1, '2018-09-13 23:27:46', '2018-09-13 23:27:46'),
(83, 32, 37, '0 Min 6 Sec', 1, '2018-09-13 23:32:00', '2018-09-13 23:32:00'),
(84, 36, 37, '0 Min 9 Sec', 1, '2018-09-13 23:33:26', '2018-09-13 23:33:26'),
(85, 32, 37, '0 Min 7 Sec', 1, '2018-09-13 23:34:26', '2018-09-13 23:34:26'),
(86, 32, 37, '0 Min 5 Sec', 1, '2018-09-13 23:34:55', '2018-09-13 23:34:55'),
(87, 36, 37, '0 Min 23 Sec', 1, '2018-09-13 23:38:25', '2018-09-13 23:38:25'),
(88, 32, 37, '0 Min 3 Sec', 1, '2018-09-13 23:40:25', '2018-09-13 23:40:25'),
(89, 32, 37, '0 Min 7 Sec', 1, '2018-09-13 23:40:54', '2018-09-13 23:40:54'),
(90, 36, 37, '0 Min 16 Sec', 1, '2018-09-13 23:41:47', '2018-09-13 23:41:47'),
(91, 32, 37, '1 Min 40 Sec', 1, '2018-09-14 00:05:48', '2018-09-14 00:05:48'),
(92, 32, 37, '1 Min 10 Sec', 1, '2018-09-14 00:07:30', '2018-09-14 00:07:30'),
(93, 30, 31, '1 Min 56 Sec', 1, '2018-09-14 17:50:59', '2018-09-14 17:50:59'),
(94, 30, 31, '0 Min 24 Sec', 1, '2018-09-14 18:05:49', '2018-09-14 18:05:49'),
(95, 36, 37, '0 Min 6 Sec', 1, '2018-09-17 17:52:50', '2018-09-17 17:52:50'),
(96, 36, 37, '0 Min 22 Sec', 1, '2018-09-17 17:54:20', '2018-09-17 17:54:20'),
(97, 32, 37, '0 Min 5 Sec', 1, '2018-09-17 18:02:44', '2018-09-17 18:02:44'),
(98, 36, 37, '0 Min 23 Sec', 1, '2018-09-17 18:13:12', '2018-09-17 18:13:12'),
(99, 36, 37, '0 Min 3 Sec', 1, '2018-09-17 18:14:18', '2018-09-17 18:14:18'),
(100, 32, 37, '0 Min 5 Sec', 1, '2018-09-17 18:18:40', '2018-09-17 18:18:40'),
(101, 36, 37, '0 Min 2 Sec', 1, '2018-09-17 18:20:06', '2018-09-17 18:20:06'),
(102, 36, 37, '0 Min 3 Sec', 1, '2018-09-17 18:30:17', '2018-09-17 18:30:17'),
(103, 36, 37, '0 Min 7 Sec', 1, '2018-09-17 19:02:44', '2018-09-17 19:02:44'),
(104, 32, 37, '0 Min 3 Sec', 1, '2018-09-17 19:06:01', '2018-09-17 19:06:01'),
(105, 32, 37, '0 Min 3 Sec', 1, '2018-09-17 19:09:05', '2018-09-17 19:09:05'),
(106, 36, 37, '0 Min 2 Sec', 1, '2018-09-17 19:10:00', '2018-09-17 19:10:00'),
(107, 36, 37, '0 Min 3 Sec', 1, '2018-09-17 19:10:36', '2018-09-17 19:10:36'),
(108, 32, 37, '0 Min 17 Sec', 1, '2018-09-17 19:17:28', '2018-09-17 19:17:28'),
(109, 36, 37, '0 Min 4 Sec', 1, '2018-09-17 19:19:27', '2018-09-17 19:19:27'),
(110, 32, 37, '0 Min 5 Sec', 1, '2018-09-17 19:23:40', '2018-09-17 19:23:40'),
(111, 32, 37, '0 Min 4 Sec', 1, '2018-09-17 19:25:48', '2018-09-17 19:25:48'),
(112, 30, 31, '10 Min 32 Sec', 1, '2018-09-17 20:08:45', '2018-09-17 20:08:45'),
(113, 32, 37, '2 Min 6 Sec', 1, '2018-09-17 20:26:15', '2018-09-17 20:26:15'),
(114, 32, 37, '1 Min 6 Sec', 1, '2018-09-17 20:58:14', '2018-09-17 20:58:14'),
(115, 32, 37, '2 Min 0 Sec', 1, '2018-09-17 21:04:15', '2018-09-17 21:04:15'),
(116, 30, 31, '10 Min 27 Sec', 1, '2018-09-19 01:34:47', '2018-09-19 01:34:47'),
(117, 32, 37, '11 Min 3 Sec', 1, '2018-09-19 17:48:58', '2018-09-19 17:48:58'),
(118, 36, 37, '11 Min 2 Sec', 1, '2018-09-19 18:06:16', '2018-09-19 18:06:16'),
(119, 36, 37, '0 Min 8 Sec', 1, '2018-09-19 18:22:22', '2018-09-19 18:22:22'),
(120, 36, 37, '0 Min 2 Sec', 1, '2018-09-19 18:25:45', '2018-09-19 18:25:45'),
(121, 36, 37, '10 Min 1 Sec', 1, '2018-09-19 18:37:49', '2018-09-19 18:37:49'),
(122, 30, 31, '10 Min 2 Sec', 1, '2018-09-21 01:16:18', '2018-09-21 01:16:18'),
(123, 36, 58, '1 Min 53 Sec', 1, '2018-10-01 17:57:32', '2018-10-01 17:57:32'),
(124, 32, 58, '0 Min 42 Sec', 1, '2018-10-01 18:09:59', '2018-10-01 18:09:59'),
(125, 32, 58, '0 Min 19 Sec', 1, '2018-10-01 18:13:23', '2018-10-01 18:13:23'),
(126, 32, 58, '0 Min 7 Sec', 1, '2018-10-01 18:19:01', '2018-10-01 18:19:01'),
(127, 44, 53, '0 Min 16 Sec', 1, '2018-10-01 23:05:49', '2018-10-01 23:05:49'),
(128, 30, 53, '3 Min 13 Sec', 1, '2018-10-02 22:38:57', '2018-10-02 22:38:57'),
(129, 30, 113, '0 Min 51 Sec', 1, '2018-12-18 01:47:01', '2018-12-18 01:47:01'),
(130, 176, 177, '0 Min 14 Sec', 1, '2019-02-23 02:19:19', '2019-02-23 02:19:19'),
(131, 127, 177, '0 Min 38 Sec', 1, '2019-03-23 18:34:48', '2019-03-23 18:34:48'),
(132, 127, 177, '0 Min 5 Sec', 1, '2019-03-23 18:45:49', '2019-03-23 18:45:49'),
(133, 127, 177, '0 Min 5 Sec', 1, '2019-03-23 18:46:24', '2019-03-23 18:46:24'),
(134, 127, 177, '0 Min 7 Sec', 1, '2019-03-23 18:46:58', '2019-03-23 18:46:58'),
(135, 127, 177, '0 Min 5 Sec', 1, '2019-03-23 18:53:11', '2019-03-23 18:53:11'),
(136, 127, 177, '0 Min 20 Sec', 1, '2019-03-23 18:54:16', '2019-03-23 18:54:16'),
(137, 127, 177, '0 Min 5 Sec', 1, '2019-03-23 18:57:19', '2019-03-23 18:57:19'),
(138, 127, 177, '0 Min 5 Sec', 1, '2019-03-23 19:00:28', '2019-03-23 19:00:28'),
(139, 127, 177, '0 Min 11 Sec', 1, '2019-03-23 19:07:26', '2019-03-23 19:07:26'),
(140, 127, 177, '0 Min 7 Sec', 1, '2019-03-23 19:08:39', '2019-03-23 19:08:39'),
(141, 127, 177, '0 Min 6 Sec', 1, '2019-03-23 19:18:15', '2019-03-23 19:18:15'),
(142, 127, 177, '0 Min 5 Sec', 1, '2019-03-23 19:28:43', '2019-03-23 19:28:43'),
(143, 127, 177, '0 Min 5 Sec', 1, '2019-03-23 19:29:16', '2019-03-23 19:29:16'),
(144, 127, 177, '0 Min 7 Sec', 1, '2019-03-23 19:29:35', '2019-03-23 19:29:35'),
(145, 127, 177, '0 Min 5 Sec', 1, '2019-03-23 19:31:56', '2019-03-23 19:31:56'),
(146, 127, 177, '0 Min 8 Sec', 1, '2019-03-23 19:46:13', '2019-03-23 19:46:13'),
(147, 127, 177, '0 Min 6 Sec', 1, '2019-03-23 20:04:27', '2019-03-23 20:04:27'),
(148, 127, 177, '0 Min 4 Sec', 1, '2019-03-23 20:05:08', '2019-03-23 20:05:08'),
(149, 127, 177, '0 Min 24 Sec', 1, '2019-07-19 11:46:32', '2019-07-19 11:46:32'),
(150, 127, 177, '0 Min 19 Sec', 1, '2019-07-19 11:49:07', '2019-07-19 11:49:07'),
(151, 127, 177, '0 Min 7 Sec', 1, '2019-07-22 06:27:50', '2019-07-22 06:27:50'),
(152, 127, 177, '0 Min 27 Sec', 1, '2019-07-22 06:54:25', '2019-07-22 06:54:25'),
(153, 127, 177, '0 Min 7 Sec', 1, '2019-07-23 06:31:06', '2019-07-23 06:31:06'),
(154, 127, 177, '0 Min 12 Sec', 1, '2019-07-23 10:30:32', '2019-07-23 10:30:32'),
(155, 127, 177, '0 Min 7 Sec', 1, '2019-07-23 10:31:34', '2019-07-23 10:31:34'),
(156, 199, 177, '0 Min 45 Sec', 1, '2019-07-23 11:00:22', '2019-07-23 11:00:22'),
(157, 127, 177, '0 Min 11 Sec', 1, '2019-07-25 07:28:26', '2019-07-25 07:28:26'),
(158, 127, 177, '0 Min 6 Sec', 1, '2019-07-25 07:30:43', '2019-07-25 07:30:43'),
(159, 127, 177, '0 Min 8 Sec', 1, '2019-07-25 07:31:59', '2019-07-25 07:31:59'),
(160, 127, 177, '2 Min 13 Sec', 1, '2019-07-26 10:05:08', '2019-07-26 10:05:08'),
(161, 127, 177, '0 Min 3 Sec', 1, '2019-07-26 10:11:07', '2019-07-26 10:11:07'),
(162, 127, 177, '1 Min 7 Sec', 1, '2019-07-26 10:13:23', '2019-07-26 10:13:23'),
(163, 127, 177, '2 Min 3 Sec', 1, '2019-07-26 10:19:12', '2019-07-26 10:19:12'),
(164, 127, 177, '1 Min 4 Sec', 1, '2019-07-26 10:21:25', '2019-07-26 10:21:25'),
(165, 213, 177, '1 Min 17 Sec', 1, '2019-07-27 04:49:11', '2019-07-27 04:49:11'),
(166, 213, 177, '1 Min 5 Sec', 1, '2019-07-27 04:57:08', '2019-07-27 04:57:08'),
(167, 213, 177, '1 Min 7 Sec', 1, '2019-07-27 05:19:33', '2019-07-27 05:19:33'),
(168, 127, 177, '0 Min 50 Sec', 1, '2019-07-31 06:29:54', '2019-07-31 06:29:54'),
(169, 127, 177, '1 Min 9 Sec', 1, '2019-08-01 05:51:31', '2019-08-01 05:51:31'),
(170, 127, 177, '0 Min 8 Sec', 1, '2019-08-01 05:58:14', '2019-08-01 05:58:14'),
(171, 127, 177, '0 Min 4 Sec', 1, '2019-08-01 07:44:33', '2019-08-01 07:44:33'),
(172, 127, 177, '0 Min 9 Sec', 1, '2019-08-01 08:32:22', '2019-08-01 08:32:22'),
(173, 127, 177, '0 Min 8 Sec', 1, '2019-08-01 08:33:46', '2019-08-01 08:33:46'),
(174, 127, 177, '0 Min 6 Sec', 1, '2019-08-01 10:39:23', '2019-08-01 10:39:23'),
(175, 127, 177, '0 Min 6 Sec', 1, '2019-08-08 11:23:44', '2019-08-08 11:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `chat_history`
--

CREATE TABLE `chat_history` (
  `id` int(11) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `coach_id` int(10) NOT NULL,
  `last_chat_date` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_history`
--

INSERT INTO `chat_history` (`id`, `patient_id`, `coach_id`, `last_chat_date`, `status`, `created_at`, `updated_at`) VALUES
(6, 42, 43, '11-Sep-2018', 1, '2018-09-08 20:17:25', '2018-09-11 19:21:31'),
(7, 32, 38, '28-Sep-2018', 1, '2018-09-10 23:52:37', '2018-09-28 19:09:11'),
(9, 47, 52, '29-Sep-2018', 1, '2018-09-29 20:17:21', '2018-09-29 20:17:21'),
(10, 47, 56, '01-Oct-2018', 1, '2018-10-01 19:30:31', '2018-10-01 19:30:31'),
(11, 32, 59, '01-Oct-2018', 1, '2018-10-01 21:27:30', '2018-10-01 21:27:30'),
(15, 30, 72, '15-Oct-2018', 1, '2018-10-15 22:13:46', '2018-10-15 22:13:46'),
(17, 30, 56, '12-Nov-2018', 1, '2018-11-05 18:05:29', '2018-11-12 18:22:32'),
(19, 87, 111, '17-Dec-2018', 1, '2018-12-17 19:59:07', '2018-12-17 19:59:07'),
(20, 30, 103, '17-Dec-2018', 1, '2018-12-18 01:09:16', '2018-12-18 01:09:16'),
(21, 127, 63, '12-Jun-2019', 1, '2019-03-23 00:50:23', '2019-06-12 18:18:19'),
(22, 127, 174, '19-Jul-2019', 1, '2019-07-09 11:25:56', '2019-07-19 12:02:09'),
(23, 127, 211, '01-Aug-2019', 1, '2019-07-25 09:23:47', '2019-08-01 08:53:39'),
(24, 127, 212, '26-Jul-2019', 1, '2019-07-25 09:27:54', '2019-07-26 07:26:57'),
(25, 213, 212, '27-Jul-2019', 1, '2019-07-27 05:48:30', '2019-07-27 05:48:30'),
(26, 201, 217, '31-Jul-2019', 1, '2019-07-31 12:11:52', '2019-07-31 12:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Agra', 1, '2018-08-30 21:06:55', '2019-12-09 21:01:50'),
(2, 'Jaipur', 1, '2018-08-30 21:07:04', '2018-10-17 00:38:33'),
(3, 'Kanpur', 1, '2018-08-30 21:07:09', '2018-10-17 00:39:28'),
(4, 'Bareilly', 1, '2018-08-30 21:07:15', '2018-10-17 00:39:53'),
(5, 'New Delhi', 1, '2018-09-08 17:59:54', '2018-10-17 00:40:18'),
(6, 'Noida', 1, '2018-09-26 20:56:06', '2018-10-17 00:40:30'),
(7, 'Lucknow', 1, '2018-09-27 21:23:19', '2018-10-17 00:38:08'),
(8, 'Varanasi', 0, '2018-10-17 00:41:01', '2018-10-25 02:26:37'),
(9, 'Gorakhpur', 0, '2018-10-17 00:41:08', '2018-10-25 02:26:01'),
(10, 'Gurgaon', 1, '2018-10-17 00:41:44', '2018-10-17 00:41:44'),
(11, 'Allahabad', 0, '2018-10-17 00:43:27', '2018-10-25 02:26:07'),
(12, 'Chandigarh', 1, '2018-10-17 00:43:37', '2018-10-17 00:43:37'),
(19, 'Ajmer', 1, '2019-11-15 17:40:11', '2019-11-15 17:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(1) NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` int(1) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_flag` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`id`, `user_id`, `fname`, `status`, `address`, `city`, `email`, `password`, `contact_number`, `book_flag`, `created_at`, `updated_at`) VALUES
(57, 274, 'Ojas', 1, 'airport cross road', 12, 'ojas.co@gmail.com', '$2y$10$LfCU2vFfca3gM2eBFTp.VOZ3KVhciuXkwY70XyQXD/fDLz/LlrFwS', '2222222222', NULL, '2019-12-03 17:15:13', '2019-12-09 17:31:53'),
(58, 281, 'Demo Clinic', 1, 'Near Kanpur Gate', 3, 'clinic.demo@gmail.com', '$2y$10$nLAPVxHgnCPufpgUH7caKOMOjOyflL7VecEr94naKiskgNp5aaOLi', '5252521212', NULL, '2019-12-05 12:41:42', '2019-12-05 12:41:42'),
(59, 308, 'Robin', 1, 'Navneep Navager\r\nJaipur', 2, 'robs@gmail.com', '$2y$10$rr8zSFoL/Pip11dDX0gVruJKlOQQScUJaJJZsA2Bvqqv.nZtl7t4m', '8460178910', NULL, '2019-12-09 20:30:21', '2019-12-09 20:30:21'),
(60, 309, 'Genesis Hospital', 1, 'Khatena Road, Lohamandi, Agra', 1, 'kiaracaresworth@gmail.com', '$2y$10$UVyHEhYdi0vDUS/F0lsqveJ/TAbazqGY2zihWVxx8gaKR0YRcRaMm', '9878987898', 1, '2019-12-09 21:02:59', '2019-12-09 21:14:02'),
(61, 332, 'svp hospital', 1, 'B 167 paldi jaipur', 2, 'svp@gmail.com', '$2y$10$GhqzdnJa3cGK8WOEaIgnU.o4sDxyV.1XvS2Znv0TT3m8932zE5e3e', '7788554411', NULL, '2019-12-24 13:14:29', '2019-12-31 09:11:46'),
(62, 381, 'Bj hospital', 1, 'Paldi', 2, 'bj@gmail.com', '$2y$10$nFLASRIxTc1VUKawiwiTtupYie6nVBYyRiBTaGuAiYaqhWFJS2drG', '3434342432', NULL, '2020-01-03 06:59:48', '2020-01-03 06:59:48'),
(63, 387, 'bhj', 1, 'sfdd', 2, 'bhj@gmail.com', '$2y$10$w2gPKv1HeTp4.PByJNQXZO0CDorkLxHWqi.zON5AMW67ktU1caApC', '4344434323', NULL, '2020-01-03 08:56:24', '2020-01-03 08:56:24');

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
  `authority_council_id` int(10) UNSIGNED DEFAULT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coach_detail`
--

INSERT INTO `coach_detail` (`id`, `coach_id`, `city`, `qualification`, `registration_number`, `authority_council_id`, `profile_pic`, `document`, `status`, `created_at`, `updated_at`) VALUES
(10, 63, 2, 'mbbs', '123456', 5, NULL, '', 1, '2018-10-05 17:40:37', '2018-10-05 17:40:37'),
(15, 106, 1, 'mbbs', '8077357237', 1, NULL, '', 1, '2018-12-03 22:34:05', '2018-12-03 22:34:05'),
(18, 174, 1, 'mbbs', 'G68363838383', 2, NULL, '', 1, '2019-02-23 02:01:35', '2019-02-23 02:01:35'),
(19, 211, 1, 'mbbs', 'gg', 2, NULL, 'coach/document/d4chwM2CMxVQAvtdKrQu4X7f31MMEQX0FKxNwclZ.jpeg', 1, '2019-07-22 07:21:42', '2019-07-22 07:21:42'),
(20, 212, 1, 'mbbs', '1', 2, NULL, 'coach/document/IyqmlLUGvksXkICRqD38JNqQ4AlbIw7s0uOe2rk1.jpeg', 1, '2019-07-25 09:20:35', '2019-07-25 09:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `clinic_id` int(10) NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `speciality` int(10) UNSIGNED DEFAULT NULL,
  `exp_year` int(10) NOT NULL,
  `city` int(10) UNSIGNED NOT NULL,
  `fee_of_consultation` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mbbs_registration_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mbbs_authority_council_name` int(10) UNSIGNED DEFAULT NULL,
  `md_ms_dnb_registration_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `md_ms_dnb_authority_council_name` int(10) UNSIGNED DEFAULT NULL,
  `dm_mch_dnb_registration_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dm_mch_dnb_authority_council_name` int(10) UNSIGNED DEFAULT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `call_payment` int(10) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `aadhhar_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `clinic_id`, `doctor_id`, `speciality`, `exp_year`, `city`, `fee_of_consultation`, `mbbs_registration_number`, `mbbs_authority_council_name`, `md_ms_dnb_registration_number`, `md_ms_dnb_authority_council_name`, `dm_mch_dnb_registration_number`, `dm_mch_dnb_authority_council_name`, `profile_pic`, `document`, `available`, `call_payment`, `status`, `aadhhar_no`, `created_at`, `updated_at`) VALUES
(16, 0, 146, 4, 14, 10, '500', '6835', 1, '6835', 4, NULL, 1, NULL, '', 1, 1, 1, NULL, '2019-02-07 19:24:36', '2019-03-23 20:04:56'),
(17, 0, 148, 4, 10, 2, '300', '1234', 1, '1234', 1, NULL, 1, NULL, '', 1, 0, 1, NULL, '2019-02-08 19:35:32', '2019-03-23 20:04:56'),
(18, 0, 150, 3, 6, 6, '400', '64718', 1, '64718', 1, NULL, NULL, 'doctor/profile_pic/7u3m2fIoArt8bgnj9yWNvDtftOBAJpO88yZ54w2G.jpeg', 'doctor/document/w5aO4YHN9DRbyalZ2UtWtzKXVikceYYbh4imFRxU.jpeg', 1, 0, 1, NULL, '2019-02-09 23:41:03', '2019-03-23 20:04:56'),
(19, 0, 160, 3, 1, 1, '100', '123', 1, '123', 1, '123', 1, NULL, '', 0, 0, 1, NULL, '2019-02-18 17:58:13', '2019-02-19 04:41:13'),
(28, 0, 177, 4, 3, 1, '18', '8628485694428688', 2, '84855588', 1, '95458588', 4, 'doctor/profile_pic/plOLZL6R6VuQFPdOVBC0pfZ7f86BMDYvAYmIUXLl.jpeg', '', 0, 0, 1, NULL, '2019-02-23 02:13:50', '2019-08-10 16:53:45'),
(30, 0, 215, 2, 3, 1, '1000', '125', 4, '100', 1, '2000', 4, NULL, 'doctor/document/7McfkTIxTg1FeCghyPzKexleb5EcuJxj7Dn3VeJN.jpeg', 1, 0, 1, NULL, '2019-07-29 04:54:34', '2019-07-29 04:54:34'),
(31, 0, 216, 1, 2, 1, '100', '101', 1, '102', 2, '103', 4, NULL, 'doctor/document/ypJb5NcQ19fAzBm0blNtRdnh2SrC0Y1thSL88IIq.jpeg', 1, 0, 1, NULL, '2019-07-29 05:02:40', '2019-07-29 05:02:40'),
(33, 234, 248, 15, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-11-28 15:45:30', '2019-11-28 15:45:30'),
(34, 234, 251, 3, 0, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-11-28 17:50:59', '2019-11-28 17:50:59'),
(35, 234, 252, 3, 0, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-11-28 17:51:10', '2019-11-28 17:51:10'),
(36, 234, 255, 17, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-11-29 17:38:06', '2019-11-29 17:38:06'),
(37, 254, 257, 17, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-11-29 17:53:20', '2019-11-29 17:53:20'),
(38, 259, 262, 1, 0, 3, NULL, NULL, 2, NULL, NULL, NULL, NULL, 'profile/mLi6iyGCX7bQ34HhBgcH9GtHiCoknohBiWa7JKZC.xml', NULL, 1, 0, 1, NULL, '2019-12-02 14:37:46', '2019-12-02 18:26:22'),
(39, 260, 264, 17, 0, 12, NULL, 'aaaaaaaaaaaaaaaaaaaaaaaa', 2, NULL, NULL, NULL, NULL, 'profile/cAbqjh55fpfmgJiZqeYdse73wwFgMuiAhbyuL2Ag.pdf', NULL, 1, 0, 1, 'xxxx', '2019-12-02 15:21:49', '2019-12-02 15:42:36'),
(40, 260, 265, 1, 0, 12, NULL, '3fdfdf33', 2, NULL, NULL, NULL, NULL, 'profile/eAJT4fiifsRtKqkBwLJ2LJIATIRgRjCy6laJLwqc.png', NULL, 1, 0, 1, 'dddsdsdsdsfdsdfsdfs', '2019-12-02 16:58:07', '2019-12-02 18:46:24'),
(41, 259, 269, NULL, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-12-02 17:48:46', '2019-12-02 17:48:46'),
(42, 259, 270, NULL, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-12-02 17:49:15', '2019-12-02 17:49:15'),
(43, 274, 275, NULL, 0, 12, NULL, '3rtrg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, '4543636364', '2019-12-03 17:17:14', '2019-12-05 11:11:59'),
(47, 274, 280, NULL, 0, 12, NULL, 'D28838', 1, NULL, NULL, NULL, NULL, 'profile/lH8ZgENva4j1idXR2sypa3RS9AqMVvI9iUoGI9Ts.jpeg', NULL, 1, 0, 1, NULL, '2019-12-05 11:23:35', '2019-12-05 11:23:35'),
(48, 281, 282, NULL, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, '2019-12-05 12:42:49', '2019-12-05 19:03:51'),
(49, 281, 283, NULL, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-12-05 12:43:15', '2019-12-05 12:43:15'),
(52, 274, 292, NULL, 0, 12, NULL, 'D28823', 1, NULL, NULL, NULL, NULL, 'profile/E7RdTvln6jgB9VvwU4i42SslybXUdFajGmuv3Bju.jpeg', NULL, 1, 0, 1, NULL, '2019-12-06 13:56:52', '2019-12-06 13:56:52'),
(53, 274, 295, NULL, 0, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-12-06 16:17:00', '2019-12-06 16:17:00'),
(54, 281, 296, NULL, 0, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-12-09 10:47:44', '2019-12-09 10:47:44'),
(55, 274, 300, NULL, 0, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, '2019-12-09 16:58:36', '2019-12-09 17:08:14'),
(56, 309, 310, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'profile/GXpIF5EGyjof6KEsST6O4NqQ2XiVpvdnTIVAWXjH.jpeg', NULL, 1, 0, 1, NULL, '2019-12-09 21:12:53', '2019-12-14 11:40:25'),
(57, 274, 323, NULL, 0, 12, NULL, 'asxsxsaxcsacxs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, '2019-12-17 17:13:29', '2019-12-17 17:30:50'),
(60, 281, 327, NULL, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-12-19 10:30:03', '2019-12-19 10:30:03'),
(61, 274, 328, NULL, 0, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-12-19 11:53:05', '2019-12-19 11:53:05'),
(62, 332, 333, NULL, 0, 2, NULL, '778855544', NULL, NULL, NULL, NULL, NULL, 'profile/fkKlUzvtRXTNJdTycnYYZNaeVhhYpwTmE29yUo8f.png', NULL, 1, 0, 1, '7788445511221122', '2019-12-24 13:17:08', '2019-12-24 13:17:08'),
(63, 332, 334, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'profile/Qz2uVynNxUrHxF45gl73wklCe0HoEdgXyFhJUWBH.png', NULL, 1, 0, 1, NULL, '2019-12-25 04:52:20', '2019-12-25 04:52:20'),
(64, 332, 361, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2019-12-31 09:55:45', '2019-12-31 09:55:45'),
(65, 371, 372, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'profile/a37ZBXPD9pCKC2XTKRkp01N1T1j64GqVNdk4TPWj.jpeg', NULL, 1, 0, 1, NULL, '2020-01-03 05:30:41', '2020-01-03 05:30:41'),
(66, 371, 373, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'profile/JBZBEcvak5cHG1fJvlZ7o4M0yG6A9Y9XFHFLzmTO.png', NULL, 1, 0, 1, NULL, '2020-01-03 05:34:55', '2020-01-03 05:34:55'),
(67, 332, 374, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'profile/g8bUdcqQQtumxI9uV87dBHPbX05nK7mpYO8hrhWE.png', NULL, 1, 0, 1, NULL, '2020-01-03 05:42:37', '2020-01-03 05:42:37'),
(68, 371, 375, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'profile/zjYQsIowDy60EBmf3AISeNOEQ43c5FV0S9cxUx5O.jpeg', NULL, 1, 0, 1, NULL, '2020-01-03 06:03:32', '2020-01-03 06:03:32'),
(69, 381, 382, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'profile/alRBbYKNve49OHYSUlRdLm2bqu9FbNz3149faGGL.png', NULL, 1, 0, 1, NULL, '2020-01-03 07:01:36', '2020-01-03 07:01:36'),
(70, 332, 395, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2020-01-16 09:07:16', '2020-01-16 09:07:16'),
(71, 332, 396, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 1, NULL, '2020-01-16 09:10:28', '2020-01-16 09:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_balance`
--

CREATE TABLE `doctors_balance` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(11) NOT NULL,
  `online_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offline_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors_balance`
--

INSERT INTO `doctors_balance` (`id`, `doctor_id`, `patient_id`, `online_amount`, `offline_amount`, `total_amount`, `amount_description`, `status`, `created_at`, `updated_at`) VALUES
(4, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-05 19:47:12', '2018-09-05 19:47:12'),
(5, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-05 20:44:26', '2018-09-05 20:44:26'),
(6, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-05 20:44:59', '2018-09-05 20:44:59'),
(7, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 18:20:36', '2018-09-06 18:20:36'),
(8, 37, 36, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 19:09:09', '2018-09-06 19:09:09'),
(9, 35, 32, '250', '0', '250', 'Teleconsultation payment success.', 1, '2018-09-06 19:26:29', '2018-09-06 19:26:29'),
(10, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 20:07:10', '2018-09-06 20:07:10'),
(11, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 20:09:03', '2018-09-06 20:09:03'),
(12, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 20:12:03', '2018-09-06 20:12:03'),
(13, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 20:21:31', '2018-09-06 20:21:31'),
(14, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 20:55:53', '2018-09-06 20:55:53'),
(15, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:32:39', '2018-09-06 21:32:39'),
(16, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:32:39', '2018-09-06 21:32:39'),
(17, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:32:40', '2018-09-06 21:32:40'),
(18, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:35:10', '2018-09-06 21:35:10'),
(19, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(20, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(21, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:37:12', '2018-09-06 21:37:12'),
(22, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:37:36', '2018-09-06 21:37:36'),
(23, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:37:38', '2018-09-06 21:37:38'),
(24, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:38:23', '2018-09-06 21:38:23'),
(25, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:39:13', '2018-09-06 21:39:13'),
(26, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:46:04', '2018-09-06 21:46:04'),
(27, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(28, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(29, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(30, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(31, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(32, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:49:02', '2018-09-06 21:49:02'),
(33, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(34, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(35, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:50:15', '2018-09-06 21:50:15'),
(36, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:50:16', '2018-09-06 21:50:16'),
(37, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 21:54:02', '2018-09-06 21:54:02'),
(38, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 22:13:22', '2018-09-06 22:13:22'),
(39, 37, 32, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-06 22:13:40', '2018-09-06 22:13:40'),
(40, 37, 32, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-06 22:19:35', '2018-09-06 22:19:35'),
(41, 37, 32, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-06 22:20:58', '2018-09-06 22:20:58'),
(42, 37, 32, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-06 22:21:57', '2018-09-06 22:21:57'),
(43, 37, 32, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-06 23:07:01', '2018-09-06 23:07:01'),
(44, 37, 32, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-06 23:12:17', '2018-09-06 23:12:17'),
(45, 37, 32, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-06 23:32:20', '2018-09-06 23:32:20'),
(46, 37, 32, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-06 23:36:47', '2018-09-06 23:36:47'),
(47, 31, 30, '3', '0', '3', 'Teleconsultation payment success.', 1, '2018-09-07 00:50:44', '2018-09-07 00:50:44'),
(48, 31, 30, '3', '0', '3', 'Teleconsultation payment success.', 1, '2018-09-07 00:53:48', '2018-09-07 00:53:48'),
(49, 31, 30, '3', '0', '3', 'Teleconsultation payment success.', 1, '2018-09-07 00:56:07', '2018-09-07 00:56:07'),
(50, 31, 32, '3', '0', '3', 'Teleconsultation payment success.', 1, '2018-09-07 01:00:19', '2018-09-07 01:00:19'),
(51, 31, 32, '3', '0', '3', 'Teleconsultation payment success.', 1, '2018-09-07 01:04:52', '2018-09-07 01:04:52'),
(52, 37, 32, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-07 01:35:52', '2018-09-07 01:35:52'),
(53, 37, 32, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-07 01:49:38', '2018-09-07 01:49:38'),
(54, 37, 36, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-08 00:50:10', '2018-09-08 00:50:10'),
(55, 37, 36, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-08 00:53:24', '2018-09-08 00:53:24'),
(56, 37, 36, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-08 00:55:23', '2018-09-08 00:55:23'),
(57, 37, 32, '55', '0', '55', 'Teleconsultation payment success.', 1, '2018-09-08 18:13:27', '2018-09-08 18:13:27'),
(59, 41, 42, '1', '0', '1', 'Teleconsultation payment success.', 1, '2018-09-08 19:59:28', '2018-09-08 19:59:28'),
(60, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-08 23:17:18', '2018-09-08 23:17:18'),
(61, 41, 42, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-10 17:48:33', '2018-09-10 17:48:33'),
(62, 41, 42, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-10 18:07:09', '2018-09-10 18:07:09'),
(63, 31, 30, '3', '0', '3', 'Teleconsultation payment successfully.', 1, '2018-09-10 21:16:42', '2018-09-10 21:16:42'),
(64, 31, 36, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-13 20:47:47', '2018-09-13 20:47:47'),
(65, 31, 36, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-13 20:48:54', '2018-09-13 20:48:54'),
(66, 31, 36, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-13 20:49:35', '2018-09-13 20:49:35'),
(67, 31, 36, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-13 20:50:19', '2018-09-13 20:50:19'),
(68, 31, 36, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-13 20:52:00', '2018-09-13 20:52:00'),
(69, 31, 36, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-13 21:22:00', '2018-09-13 21:22:00'),
(70, 31, 36, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-13 21:22:21', '2018-09-13 21:22:21'),
(71, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 22:28:58', '2018-09-13 22:28:58'),
(72, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 22:53:18', '2018-09-13 22:53:18'),
(73, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 22:55:23', '2018-09-13 22:55:23'),
(74, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 22:59:24', '2018-09-13 22:59:24'),
(75, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:02:18', '2018-09-13 23:02:18'),
(76, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:14:02', '2018-09-13 23:14:02'),
(77, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:15:53', '2018-09-13 23:15:53'),
(78, 37, 42, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:19:42', '2018-09-13 23:19:42'),
(79, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:22:58', '2018-09-13 23:22:58'),
(80, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:23:35', '2018-09-13 23:23:35'),
(81, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:24:49', '2018-09-13 23:24:49'),
(82, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:25:21', '2018-09-13 23:25:21'),
(83, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:25:52', '2018-09-13 23:25:52'),
(84, 37, 42, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:26:47', '2018-09-13 23:26:47'),
(85, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:27:45', '2018-09-13 23:27:45'),
(86, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:32:00', '2018-09-13 23:32:00'),
(87, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:33:25', '2018-09-13 23:33:25'),
(88, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:34:25', '2018-09-13 23:34:25'),
(89, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:34:54', '2018-09-13 23:34:54'),
(90, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:38:24', '2018-09-13 23:38:24'),
(91, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:40:25', '2018-09-13 23:40:25'),
(92, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:40:54', '2018-09-13 23:40:54'),
(93, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-13 23:41:47', '2018-09-13 23:41:47'),
(94, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-14 00:05:48', '2018-09-14 00:05:48'),
(95, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-14 00:07:30', '2018-09-14 00:07:30'),
(96, 31, 30, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-14 17:50:58', '2018-09-14 17:50:58'),
(97, 31, 30, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-14 18:05:48', '2018-09-14 18:05:48'),
(98, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 17:52:50', '2018-09-17 17:52:50'),
(99, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 17:54:18', '2018-09-17 17:54:18'),
(100, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 18:02:43', '2018-09-17 18:02:43'),
(101, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 18:13:11', '2018-09-17 18:13:11'),
(102, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 18:14:18', '2018-09-17 18:14:18'),
(103, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 18:18:40', '2018-09-17 18:18:40'),
(104, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 18:20:06', '2018-09-17 18:20:06'),
(105, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 18:30:17', '2018-09-17 18:30:17'),
(106, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 19:02:43', '2018-09-17 19:02:43'),
(107, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 19:06:01', '2018-09-17 19:06:01'),
(108, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 19:09:04', '2018-09-17 19:09:04'),
(109, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 19:09:59', '2018-09-17 19:09:59'),
(110, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 19:10:36', '2018-09-17 19:10:36'),
(111, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 19:17:28', '2018-09-17 19:17:28'),
(112, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 19:18:50', '2018-09-17 19:18:50'),
(113, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 19:19:27', '2018-09-17 19:19:27'),
(114, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 19:23:38', '2018-09-17 19:23:38'),
(115, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 19:25:47', '2018-09-17 19:25:47'),
(116, 31, 30, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-17 20:08:44', '2018-09-17 20:08:44'),
(117, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 20:26:14', '2018-09-17 20:26:14'),
(118, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 20:58:12', '2018-09-17 20:58:12'),
(119, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-17 21:04:14', '2018-09-17 21:04:14'),
(120, 31, 30, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-19 01:34:43', '2018-09-19 01:34:43'),
(121, 37, 32, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-19 17:48:57', '2018-09-19 17:48:57'),
(122, 37, 36, '55', '0', '55', 'Teleconsultation payment successfully.', 1, '2018-09-19 18:06:15', '2018-09-19 18:06:15'),
(123, 37, 36, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-19 18:18:50', '2018-09-19 18:18:50'),
(124, 37, 36, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-19 18:22:22', '2018-09-19 18:22:22'),
(125, 37, 36, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-19 18:25:44', '2018-09-19 18:25:44'),
(126, 37, 36, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-19 18:37:49', '2018-09-19 18:37:49'),
(127, 31, 30, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-09-21 01:16:17', '2018-09-21 01:16:17'),
(129, 58, 32, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-10-01 18:09:58', '2018-10-01 18:09:58'),
(130, 58, 32, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-10-01 18:13:23', '2018-10-01 18:13:23'),
(131, 58, 32, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-10-01 18:19:01', '2018-10-01 18:19:01'),
(133, 53, 30, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2018-10-02 22:38:57', '2018-10-02 22:38:57'),
(134, 177, 176, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-02-23 02:19:19', '2019-02-23 02:19:19'),
(135, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 18:34:48', '2019-03-23 18:34:48'),
(136, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 18:45:48', '2019-03-23 18:45:48'),
(137, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 18:46:24', '2019-03-23 18:46:24'),
(138, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 18:46:57', '2019-03-23 18:46:57'),
(139, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 18:53:11', '2019-03-23 18:53:11'),
(140, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 18:54:16', '2019-03-23 18:54:16'),
(141, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 18:57:18', '2019-03-23 18:57:18'),
(142, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 19:00:28', '2019-03-23 19:00:28'),
(143, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 19:07:26', '2019-03-23 19:07:26'),
(144, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 19:08:39', '2019-03-23 19:08:39'),
(145, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 19:18:14', '2019-03-23 19:18:14'),
(146, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 19:28:43', '2019-03-23 19:28:43'),
(147, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 19:29:16', '2019-03-23 19:29:16'),
(148, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 19:29:35', '2019-03-23 19:29:35'),
(149, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 19:31:55', '2019-03-23 19:31:55'),
(150, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 19:46:13', '2019-03-23 19:46:13'),
(151, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 20:04:26', '2019-03-23 20:04:26'),
(152, 177, 127, '1', '0', '1', 'Teleconsultation payment successfully.', 1, '2019-03-23 20:05:08', '2019-03-23 20:05:08'),
(153, 177, 127, '400', '0', '400', 'Teleconsultation payment successfully.', 1, '2019-07-19 11:46:29', '2019-07-19 11:46:29'),
(154, 177, 127, '400', '0', '400', 'Teleconsultation payment successfully.', 1, '2019-07-19 11:49:05', '2019-07-19 11:49:05'),
(155, 177, 127, '400', '0', '400', 'Teleconsultation payment successfully.', 1, '2019-07-22 06:27:47', '2019-07-22 06:27:47'),
(156, 177, 127, '400', '0', '400', 'Teleconsultation payment successfully.', 1, '2019-07-22 06:54:23', '2019-07-22 06:54:23'),
(157, 177, 127, '400', '0', '400', 'Teleconsultation payment successfully.', 1, '2019-07-23 06:31:03', '2019-07-23 06:31:03'),
(158, 177, 127, '400', '0', '400', 'Teleconsultation payment successfully.', 1, '2019-07-23 10:30:30', '2019-07-23 10:30:30'),
(159, 177, 127, '400', '0', '400', 'Teleconsultation payment successfully.', 1, '2019-07-23 10:31:31', '2019-07-23 10:31:31'),
(160, 177, 199, '400', '0', '400', 'Teleconsultation payment successfully.', 1, '2019-07-23 11:00:20', '2019-07-23 11:00:20'),
(161, 177, 127, '400', '0', '400', 'Teleconsultation payment successfully.', 1, '2019-07-25 07:28:22', '2019-07-25 07:28:22'),
(162, 177, 127, '400', '0', '400', 'Teleconsultation payment successfully.', 1, '2019-07-25 07:30:40', '2019-07-25 07:30:40'),
(163, 177, 127, '400', '0', '400', 'Teleconsultation payment successfully.', 1, '2019-07-25 07:31:57', '2019-07-25 07:31:57'),
(164, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-07-26 10:05:05', '2019-07-26 10:05:05'),
(165, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-07-26 10:11:05', '2019-07-26 10:11:05'),
(166, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-07-26 10:13:21', '2019-07-26 10:13:21'),
(167, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-07-26 10:19:09', '2019-07-26 10:19:09'),
(168, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-07-26 10:21:22', '2019-07-26 10:21:22'),
(169, 177, 213, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-07-27 04:49:08', '2019-07-27 04:49:08'),
(170, 177, 213, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-07-27 04:57:05', '2019-07-27 04:57:05'),
(171, 177, 213, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-07-27 05:19:31', '2019-07-27 05:19:31'),
(172, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-07-31 06:29:52', '2019-07-31 06:29:52'),
(173, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-08-01 05:51:28', '2019-08-01 05:51:28'),
(174, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-08-01 05:58:11', '2019-08-01 05:58:11'),
(175, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-08-01 07:44:31', '2019-08-01 07:44:31'),
(176, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-08-01 08:32:20', '2019-08-01 08:32:20'),
(177, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-08-01 08:33:44', '2019-08-01 08:33:44'),
(178, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-08-01 10:39:19', '2019-08-01 10:39:19'),
(179, 177, 127, '18', '0', '18', 'Teleconsultation payment successfully.', 1, '2019-08-08 11:23:43', '2019-08-08 11:23:43');

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
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors_bank_detail`
--

INSERT INTO `doctors_bank_detail` (`id`, `doctor_id`, `bank_name`, `account_number`, `ifsc_code`, `beneficiary_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 150, 'SBI', 'MDAwMDAzMDAwMjQxMTc5OQ==', 'SBIN0005226', 'yogendra Kumar', 1, '2019-02-12 04:09:58', '2019-02-12 04:09:58'),
(3, 177, 'ici', 'NjE2NzU5NTc5NzQ5NDk3NA==', 'rahshehdahd', 'qehey', 1, '2019-07-25 07:45:58', '2019-07-25 07:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_main`
--

CREATE TABLE `doctor_main` (
  `id` int(1) NOT NULL,
  `city` int(10) UNSIGNED NOT NULL,
  `fname` int(10) UNSIGNED NOT NULL,
  `speciality` int(10) UNSIGNED NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `registration_no` int(10) DEFAULT NULL,
  `registration_council` varchar(100) DEFAULT NULL,
  `aadhhar_no` varchar(200) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_main`
--

INSERT INTO `doctor_main` (`id`, `city`, `fname`, `speciality`, `doctor_name`, `phone_number`, `email`, `registration_no`, `registration_council`, `aadhhar_no`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 7, 3, 'abc', '9638523693', 'foramthakkar5031997@gmail.com', 0, '11111', '2147483647', 1, '2019-11-13 10:52:26', '2019-11-13 10:52:26'),
(4, 4, 33, 2, 'Dr pooja', '7894561236', 'pooja@gmail.com', 0, '78945666', '123654789', 0, '2019-11-13 11:54:25', '2019-11-14 07:39:39'),
(5, 3, 7, 2, 'foram', '1111112365', 'pp9490385@gmail.com', 0, '2147483647', '2147483647', 0, '2019-11-14 06:18:35', '2019-11-14 06:43:29'),
(6, 3, 36, 2, 'Dr poojaaa', '1234567891', 'pooja12@gmail.com', 0, '333', '2147483647', 1, '2019-11-14 06:37:26', '2019-11-14 07:36:54'),
(7, 5, 33, 4, 'abc', '9638523693', 'abc@gmail.com', 0, '1111111', '2147483647', 1, '2019-11-14 10:12:01', '2019-11-14 10:12:01'),
(8, 3, 8, 2, 'abc', '9638523693', 'abc@gmail.com', 0, '234234', '2147483647', 1, '2019-11-14 10:19:11', '2019-11-14 10:19:11'),
(9, 10, 35, 5, 'xyz', '3456678908', 'xyz123@gmail.com', 0, '888888', '2147483647', 1, '2019-11-14 11:05:18', '2019-11-14 18:00:30'),
(11, 2, 35, 8, 'dddd', '8989889739', 'demodemo1384+75@gmail.com', 3, '3', '3', 1, '2019-11-14 18:35:04', '2019-11-14 18:35:04'),
(12, 1, 42, 2, 'Priya', '5236523652', 'Priya@gmail.com', NULL, NULL, NULL, 1, '2019-11-15 09:30:46', '2019-11-15 09:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_speciality`
--

CREATE TABLE `doctor_speciality` (
  `id` int(10) UNSIGNED NOT NULL,
  `speciality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_speciality`
--

INSERT INTO `doctor_speciality` (`id`, `speciality`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MD Medicine', 1, '2018-08-30 21:16:32', '2018-08-30 21:16:32'),
(2, 'MD Skin', 1, '2018-08-30 21:16:40', '2018-09-28 01:37:18'),
(3, 'MS Gen Surgery', 1, '2018-09-08 17:58:57', '2018-09-28 01:37:46'),
(4, 'MS Obst and Gynae', 1, '2018-09-28 01:37:59', '2018-09-28 01:37:59'),
(5, 'MS Ophthalmology', 1, '2018-09-28 01:38:11', '2018-09-28 01:38:11'),
(6, 'MD Pulmonary Medicine', 1, '2018-09-28 01:38:34', '2018-09-28 01:46:23'),
(7, 'DM Cardiology', 1, '2018-09-28 01:38:44', '2018-09-28 01:38:44'),
(8, 'DM Nephrology', 1, '2018-09-28 01:38:54', '2018-09-28 01:38:54'),
(9, 'DM Neurology', 1, '2018-09-28 01:39:01', '2018-09-28 01:39:01'),
(10, 'DM Gastroenterology', 1, '2018-09-28 01:39:56', '2019-12-02 15:34:53'),
(11, 'DM Endocrinology', 1, '2018-09-28 01:45:59', '2018-09-28 01:47:32'),
(12, 'MCh Neurosurgery', 1, '2018-09-28 01:46:46', '2018-09-28 01:46:46'),
(13, 'MCh Gastrosurgery', 1, '2018-09-28 01:47:02', '2018-09-28 01:47:02'),
(14, 'MCh Urology', 1, '2018-09-28 01:47:46', '2018-09-28 01:47:46'),
(15, 'MCh CTVS', 1, '2018-09-28 01:48:36', '2019-12-02 18:13:18'),
(16, 'MCh Oncology', 1, '2018-09-28 01:49:13', '2019-12-02 18:13:08'),
(17, 'MCh Plastic Surgery', 1, '2018-09-30 05:43:26', '2018-09-30 05:43:26'),
(18, 'MS Orthopedics', 1, '2018-10-01 21:45:26', '2019-12-02 15:35:24'),
(19, 'MS ENT', 1, '2018-10-02 00:04:23', '2019-12-02 15:34:49'),
(20, 'MD Psychiatry', 1, '2018-10-02 00:13:17', '2018-10-02 00:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_speciality_select`
--

CREATE TABLE `doctor_speciality_select` (
  `id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `speciality_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_speciality_select`
--

INSERT INTO `doctor_speciality_select` (`id`, `doctor_id`, `speciality_id`, `created_at`, `updated_at`) VALUES
(1, 42, 2, '2019-12-02 17:49:15', '2019-12-02 17:49:15'),
(2, 42, 5, '2019-12-02 17:49:15', '2019-12-02 17:49:15'),
(11, 38, 2, '2019-12-02 18:26:22', '2019-12-02 18:26:22'),
(12, 38, 3, '2019-12-02 18:26:22', '2019-12-02 18:26:22'),
(13, 38, 5, '2019-12-02 18:26:22', '2019-12-02 18:26:22'),
(14, 40, 2, '2019-12-02 18:46:24', '2019-12-02 18:46:24'),
(15, 40, 15, '2019-12-02 18:46:24', '2019-12-02 18:46:24'),
(16, 40, 16, '2019-12-02 18:46:24', '2019-12-02 18:46:24'),
(20, 44, 2, '2019-12-03 17:18:56', '2019-12-03 17:18:56'),
(21, 45, 1, '2019-12-05 09:56:34', '2019-12-05 09:56:34'),
(22, 45, 4, '2019-12-05 09:56:34', '2019-12-05 09:56:34'),
(23, 45, 7, '2019-12-05 09:56:34', '2019-12-05 09:56:34'),
(24, 43, 1, '2019-12-05 11:11:59', '2019-12-05 11:11:59'),
(25, 43, 3, '2019-12-05 11:11:59', '2019-12-05 11:11:59'),
(26, 43, 4, '2019-12-05 11:11:59', '2019-12-05 11:11:59'),
(27, 43, 17, '2019-12-05 11:11:59', '2019-12-05 11:11:59'),
(28, 46, 3, '2019-12-05 11:17:01', '2019-12-05 11:17:01'),
(29, 47, 3, '2019-12-05 11:23:35', '2019-12-05 11:23:35'),
(32, 49, 2, '2019-12-05 12:43:15', '2019-12-05 12:43:15'),
(33, 49, 4, '2019-12-05 12:43:15', '2019-12-05 12:43:15'),
(34, 50, 1, '2019-12-05 13:01:19', '2019-12-05 13:01:19'),
(35, 48, 1, '2019-12-05 19:03:51', '2019-12-05 19:03:51'),
(36, 48, 2, '2019-12-05 19:03:51', '2019-12-05 19:03:51'),
(37, 48, 4, '2019-12-05 19:03:51', '2019-12-05 19:03:51'),
(38, 48, 5, '2019-12-05 19:03:51', '2019-12-05 19:03:51'),
(39, 51, 15, '2019-12-06 12:08:45', '2019-12-06 12:08:45'),
(40, 51, 16, '2019-12-06 12:08:45', '2019-12-06 12:08:45'),
(41, 51, 18, '2019-12-06 12:08:45', '2019-12-06 12:08:45'),
(42, 52, 1, '2019-12-06 13:56:52', '2019-12-06 13:56:52'),
(43, 52, 3, '2019-12-06 13:56:52', '2019-12-06 13:56:52'),
(44, 53, 7, '2019-12-06 16:17:00', '2019-12-06 16:17:00'),
(45, 53, 8, '2019-12-06 16:17:00', '2019-12-06 16:17:00'),
(46, 53, 9, '2019-12-06 16:17:00', '2019-12-06 16:17:00'),
(47, 53, 10, '2019-12-06 16:17:00', '2019-12-06 16:17:00'),
(48, 53, 11, '2019-12-06 16:17:00', '2019-12-06 16:17:00'),
(49, 54, 1, '2019-12-09 10:47:44', '2019-12-09 10:47:44'),
(50, 54, 3, '2019-12-09 10:47:44', '2019-12-09 10:47:44'),
(56, 55, 7, '2019-12-09 17:08:14', '2019-12-09 17:08:14'),
(57, 55, 8, '2019-12-09 17:08:14', '2019-12-09 17:08:14'),
(58, 55, 9, '2019-12-09 17:08:14', '2019-12-09 17:08:14'),
(59, 55, 10, '2019-12-09 17:08:14', '2019-12-09 17:08:14'),
(60, 55, 11, '2019-12-09 17:08:14', '2019-12-09 17:08:14'),
(62, 56, 3, '2019-12-14 11:40:25', '2019-12-14 11:40:25'),
(65, 58, 6, '2019-12-17 17:26:49', '2019-12-17 17:26:49'),
(66, 58, 19, '2019-12-17 17:26:49', '2019-12-17 17:26:49'),
(67, 57, 1, '2019-12-17 17:30:50', '2019-12-17 17:30:50'),
(68, 57, 5, '2019-12-17 17:30:50', '2019-12-17 17:30:50'),
(69, 59, 2, '2019-12-17 17:31:26', '2019-12-17 17:31:26'),
(70, 60, 1, '2019-12-19 10:30:03', '2019-12-19 10:30:03'),
(71, 61, 4, '2019-12-19 11:53:05', '2019-12-19 11:53:05'),
(72, 62, 1, '2019-12-24 13:17:08', '2019-12-24 13:17:08'),
(73, 62, 2, '2019-12-24 13:17:08', '2019-12-24 13:17:08'),
(74, 63, 1, '2019-12-25 04:52:20', '2019-12-25 04:52:20'),
(75, 63, 2, '2019-12-25 04:52:20', '2019-12-25 04:52:20'),
(76, 64, 2, '2019-12-31 09:55:45', '2019-12-31 09:55:45'),
(77, 65, 1, '2020-01-03 05:30:41', '2020-01-03 05:30:41'),
(78, 66, 1, '2020-01-03 05:34:55', '2020-01-03 05:34:55'),
(79, 66, 2, '2020-01-03 05:34:56', '2020-01-03 05:34:56'),
(80, 67, 1, '2020-01-03 05:42:37', '2020-01-03 05:42:37'),
(81, 67, 2, '2020-01-03 05:42:37', '2020-01-03 05:42:37'),
(82, 68, 1, '2020-01-03 06:03:32', '2020-01-03 06:03:32'),
(83, 68, 2, '2020-01-03 06:03:32', '2020-01-03 06:03:32'),
(84, 69, 1, '2020-01-03 07:01:36', '2020-01-03 07:01:36'),
(85, 69, 2, '2020-01-03 07:01:36', '2020-01-03 07:01:36'),
(86, 70, 2, '2020-01-16 09:07:16', '2020-01-16 09:07:16'),
(87, 71, 1, '2020-01-16 09:10:28', '2020-01-16 09:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `experties`
--

CREATE TABLE `experties` (
  `id` int(1) NOT NULL,
  `expertise` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experties`
--

INSERT INTO `experties` (`id`, `expertise`, `status`, `created_at`, `updated_at`) VALUES
(3, 'psychologist', 0, '2019-11-08 13:04:11', '2019-11-08 13:04:11'),
(6, 'dietitian', 1, '2019-11-08 13:33:32', '2019-11-08 13:50:58'),
(11, 'Cardiologist', 1, '2019-11-09 12:01:38', '2019-11-09 12:01:43'),
(12, 'Dermatologist', 1, '2019-11-09 12:02:02', '2019-11-29 17:19:25'),
(24, 'orthopadic', 0, '2019-11-25 12:37:01', '2019-11-25 12:43:39'),
(25, 'Neurologist', 1, '2019-11-29 17:19:44', '2019-11-29 17:19:44'),
(27, 'sdsd', 1, '2019-12-31 07:38:53', '2019-12-31 07:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'What is Vital X Health or Kiara Caresworth Private Limited?', '<p>Vital X Health is a unit of Kiara Caresworth Private Limited, an INDIAN REGISTERED company that helps individuals and families manage and coordinate care for a chronically diseased, or disabled loved one.</p>\r\n\r\n<p>Vital X Health is a proactive healthcare concierge service that &ldquo;takes the pain out of healthca re &ndash; through innovative, monthly program designed to help individuals to reduce behavioral risk factors for developing type 2 diabetes, heart problems and other chronic illnesses.</p>', 1, 1, '2018-08-01 10:51:55', '2018-08-01 10:53:25'),
(2, 'Who is Vital X Health designed to help?', '<p>We&rsquo;re focused on helping the individuals who have non-communicable or aging-related health concerns (Diabetes, Chronic Heart Disease, Chronic Kidney Disease, Obesity). Regardless of the circumstance, our goal is to make our healthcare system maze much more navigable.</p>', 1, 1, '2018-08-01 10:54:00', '2018-08-01 10:54:00'),
(3, 'Who can join Vital X Health?', '<p>Anyone! You don&rsquo;t have to be wealthy to be at Vital X Health (sorry, we couldn&rsquo;t help it). Creating an online account is free. You can find out more information on our plans page.</p>', 1, 1, '2018-08-01 10:58:51', '2018-08-01 10:58:51'),
(4, 'Where is Vital X Health available?', '<p>The Vital X Health or Kiara Caresworth Private Limited service is available nationwide in India. Since our service is virtual and powered by technology, we can connect and work with people at any place.</p>', 1, 1, '2018-08-01 10:59:30', '2018-08-01 10:59:30'),
(5, 'How does Vital X Health work?', '<p><strong>Getting started:</strong> Create a free online account and follow the prompts to tell us a bit about your health status. You will be paired with the Care coach, whom you can share your health goals through integrated mobile chat on the mobile app. The Care Coach can help you to explore the right health plan for you. Even if you don&rsquo;t want to buy any health plan, you can stay using the mobile app for free and pay only when you schedule a video tele -consultation with any doctor, whenever required!</p>\r\n\r\n<p><strong>Choosing your own health team:</strong> Moreover, you can build your own healthcare team on your mobile app. You can select your main Physician, your Care Coach, your urgent care centers with emergency contact numbers, all in one place.</p>\r\n\r\n<p><strong>Managing Health Plans:&nbsp;</strong>Once you have chosen your health plan, the Care Coach will schedule your appointment with the doctors as per the plan. You will be asked to update<br />\r\nyour health records and can check your vital records anytime, anywhere. The goal of the doctor or the specialist is to provide the proactive healthcare services to you, so that you don&rsquo;t worsen the disease process in the future. All the lab tests, mentioned in your plan, will be done for no extra price, and will be updated by the backend team on your profile.Telemedicine anytime, anywhere:&nbsp;Finally, you can speak to any doctor from our panel through Tele-Consultation through your mobile app. Only those doctors and specialists will Finally, you can speak to any doctor from our panel through Tele-Consultation through your mobile app. Only those doctors and specialists willl&nbsp;</p>', 1, 1, '2018-08-01 11:03:18', '2018-08-01 12:22:07'),
(6, 'What will my Vital X Health Care Coach do for me?', '<p>Vital X Health Care Coaches are skilled and trained to help individuals to navigate and manage all aspects of care. Just like enlisting a financial planner to help with your investments or a wedding planner to manage your special day, families should seek expert assistance to help guide them through major care decisions and events.</p>\r\n\r\n<p>Your Care Coach will put together a game plan and then get things done. We don&rsquo;t stop until you are satisfied!</p>', 2, 1, '2018-08-01 12:22:47', '2018-08-01 12:23:07'),
(7, 'How many customers and/or hours can a Care Coach work?', '<p>Some Care Coach take on as little as 10 clients per month and others have 50 or more clients. Since families&rsquo; healthcare needs fluctuate, there will be times when extra support or less support will be needed. The goal is to provide the level of support needed to ensure clients feel supported.</p>', 2, 1, '2018-08-01 12:23:31', '2018-08-01 12:23:31'),
(8, 'What if I donâ€™t like my Care Coach?', '<p>We get it, these are very personal matters. You should love your Care Coach. A nd if you don&rsquo;t, we would love for you to give us that feedback. Our goal is to have a network of the<br />\r\nmost qualified and kind Care Coaches on the planet and to match you with the Care Coach who is best for you!</p>\r\n\r\n<p>However, if you&rsquo;re not satisfied with the Care Coach, you can raise your request at hello@vitalxhealth.com and then choose your new care coach from your team page.</p>', 2, 1, '2018-08-01 12:24:07', '2018-08-01 12:24:41'),
(9, 'Who oversees the work of the coach?', '<p>Every coach is paired with a Vital X Health Care Manager who will virtually shadow you during your health plan and provide upfront guidance and best practices. The manager will<br />\r\nprovide ongoing feedback and encourage questions and suggestions from you.</p>', 2, 1, '2018-08-01 12:25:06', '2018-08-01 12:25:06'),
(10, 'How will I be billed?', '<p>You can get started for a free online account. We&rsquo;ll ask for online payments before starting your health plan. For the health plan, you will be billed monthly or quarterly (whichever is applicable in the health plan) until you cancel your subscription. Please read payment options and plan information for more details.</p>', 4, 1, '2018-08-01 12:25:37', '2018-08-01 12:25:37'),
(11, 'Do you store any of my payment information?', '<p>We never store payment information. We use a secure third -party to handle all payment transactions.</p>', 4, 1, '2018-08-01 12:25:53', '2018-08-01 12:25:53'),
(12, 'How do you protect my private information?', '<p>We take your privacy very seriously. (You can see our privacy policy here.) We will never share your information without your consent.</p>', 4, 1, '2018-08-01 12:26:11', '2018-08-01 12:26:11'),
(13, 'How do I make a complaint?', '<p>Just write to our Complaints Manager at hello@vitalxhealth.com. We&rsquo;ll get back to you within 2 working days to get it sorted out for you.</p>\r\n\r\n<p>No time to write? To make your complaint verbally, or for more info, please contact the clinical support team phone numbers.</p>', 4, 1, '2018-08-01 12:26:41', '2018-08-01 12:26:41'),
(14, 'Who can I speak with if thereâ€™s a problem with my account?', '<p>We&rsquo;re always here to speak with you! Call us anytime at PHONE, email us at hello@vitalxhealth.com, or start a live chat with your Care Coach anytime during the<br />\r\nworking hours.</p>', 4, 1, '2018-08-01 12:27:04', '2018-08-01 12:27:04'),
(15, 'Can I cancel anytime?', '<p>You can cancel anytime. And even after canceling your paid membership, you can still access your online account at any time for free. To cancel your account please talk to your<br />\r\nCare Coach or email at hello@vitalxhealth.com.</p>', 4, 1, '2018-08-01 12:27:21', '2018-08-01 12:27:21'),
(16, 'Who sees my medical and personal information?', '<p>Only the service team at Vital X Health including your Care Coach. With your consent, your Care Coach may share information with doctors, family, caregivers, or other providers in order to arrange care.</p>', 4, 1, '2018-08-01 12:27:45', '2018-08-01 12:27:45'),
(26, 'Who are the Vital X Health Doctors?', '<p>The doctors available at Vital X Health are independent doctors who are MCI registered in India, and have extensive professional experience.</p>', 3, 1, '2018-08-01 12:47:25', '2018-08-01 12:47:25'),
(27, 'What kind of device do I need?', '<p>You can speak to the doctor using Android smartphone via the Vital X Health app. The Vital X Health app is available on Android 4.2 and above devices. We do not support iOS phones at this time.</p>\r\n\r\n<p>You will need to be connected to the internet. Where possible we recommend using WiFi, rather&nbsp;than 3G or 4G, as this usually gives the most reliable connection.</p>\r\n\r\n<p>Please contact hello@vitalxhealth.com. If you are unsure if your device meets the minimum<br />\r\nrequirements of using the service.</p>', 3, 1, '2018-08-01 12:48:04', '2018-08-01 12:48:20'),
(28, 'What is the length of my appointment?', '<p><strong>For Video Tele-Consultation: </strong>Your appointment is 10 minutes long and we would advise that you keep the number of ailments that you discuss in that time to a minimum. If you feel your appointment will take longer than 10 minutes we would advise booking an extra slot. The doctor will advise in the call if they feel it is necessary that you book a further appointment. Should you have any questions about this please contact our support team.</p>\r\n\r\n<p><strong>For in-patient visit</strong>: It depends upon the doctor examining you. This shouldn&rsquo;t bother you as we have carefully prepared for the best healthcare experience for our patients.<br />\r\n&nbsp;</p>', 3, 1, '2018-08-01 12:49:24', '2018-08-01 12:49:46'),
(30, 'Where can I have a consultation?', '<p><strong>For Video Tele-Consultation:</strong> You can have a consultation anywhere that is private, with a good internet connection. It is also important that you can safely devote your full attention to the discussion with the doctor. Unsafe and non-private areas include:<br />\r\nï‚· Driving in your car<br />\r\nï‚· Public spaces including shopping centers and parks<br />\r\nï‚· A public place at your work</p>\r\n\r\n<p><br />\r\n<strong>For in-patient visit:</strong> You will need to see the doctor at his/ her own clinic on the time and date the appointment is fixed by the Care Coach.</p>', 3, 1, '2018-08-01 12:52:46', '2018-08-01 12:52:46'),
(31, 'What is the length of my appointment?', '<p><strong>For Video Tele-Consultation: </strong>Your appointment is 10 minutes long and we would advise that you keep the number of ailments that you discuss in that time to a minimum. If you feel your appointment will take longer than 10 minutes we would advise booking an extra slot. The doctor will advise in the call if they feel it is necessary that you book a further appointment. Should you have any questions about this please contact our support team.</p>\r\n\r\n<p><br />\r\n<strong>For in-patient visit:</strong> It depends upon the doctor examining you. This shouldn&rsquo;t bother you as we have carefully prepared for the best healthcare experience for our patients.</p>', 3, 1, '2018-08-01 12:53:29', '2018-08-01 12:53:37'),
(32, 'How do I get an appointment with the doctors or specialists?', '<p><strong>For Video Tele-Consultation:</strong> Anytime, anywhere from your mobile app, you can have audio-video tele-consultation with any doctor you wish to. The availability of the doctor on the mobile app depends upon the doctor&rsquo;s online status which only he/she can modify. You will be required to pay for the audio-video tele-consultation before you can actually make a tele-consult with the doctor of your choice.</p>\r\n\r\n<p><br />\r\n<strong>For Health Plans:</strong> You and your coach will decide and set appointments with your doctor(s),<br />\r\ndepending on the health plan you choose. You will also be notified by the backend team<br />\r\nabout the time and date to visit your physician. The scheduling is totally flexible and you can<br />\r\nalso choose to book for another time and date that is convenient for you should your<br />\r\npreferred time not be available.</p>', 3, 1, '2018-08-01 12:54:18', '2018-08-01 12:54:18'),
(33, 'Will my regular Physician/ Doctor know the details of my in-patient visit appointment?', '<p>The schedule of your appointment is fixed by your Care Coa ch. It&rsquo;s the duty of your Care Coach to ensure that everything goes well between you and your doctor. For any changes in the appointment with the doctor, you will be notified by your coach or from our backend team.</p>', 3, 1, '2018-08-01 12:54:49', '2018-08-01 12:54:49'),
(34, 'I missed my appointment on teleconsultation due to network issues, what do I do?', '<p>If you missed your appointment and would still like to speak with a doctor, the easiest way to do this is to book another consultation using the app. We will ask the doctor to refund back the money you were charged and not use it.</p>\r\n\r\n<p>If you think you&rsquo;re having technical difficulties or connection issues please ensure you have good WiFi or mobile internet connection before the time of your appointment. If you continue to experience issues please email hello@vitalxhealth.com and a member of our team will be in contact as quickly as possible.</p>', 3, 1, '2018-08-01 12:55:32', '2018-08-01 12:55:32'),
(35, 'How can I best prepare for my teleconsultation?', '<p>To ensure you get the best out of your experience we would advise the following steps:</p>\r\n\r\n<p><br />\r\nHave your chosen device ready by ensuring the sound is switched on and has plenty of battery&rsquo;. Ensure your device is connected to a strong internet connection, ensure you have<br />\r\nenabled video and audio in your handset settings, select a private and quiet location , ensure all of your personal information is complete and correct and written on a paper (preferred).</p>', 3, 1, '2018-08-01 12:55:58', '2018-08-01 12:55:58'),
(36, 'Will I be charged for canceling my specialist appointment in-patient visit to the clinic?', '<p>We are here to take care of your health and wealth. Although, if you cancel your scheduled in-patient visit to the doctor&rsquo;s clinic 1 hour prior, there would be no extra charge levied on you. However, if you cancel the appointment within 1 hour from the scheduled session, you may be charged for keeping the doctor occupied.</p>\r\n\r\n<p>We would try not to put you on any hard charges. So, don&rsquo;t worry! We are here to help you!</p>', 3, 1, '2018-08-01 12:56:31', '2018-08-01 12:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `general_examination`
--

CREATE TABLE `general_examination` (
  `id` int(10) NOT NULL,
  `examination_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_examination`
--

INSERT INTO `general_examination` (`id`, `examination_name`) VALUES
(1, 'Pallor'),
(2, 'Clubbing'),
(3, 'Icterus'),
(4, 'Cyanosis'),
(5, 'Edema'),
(6, 'Dehydration'),
(7, 'LymphNodes Enlargement'),
(8, 'Raised JVP');

-- --------------------------------------------------------

--
-- Table structure for table `health_team`
--

CREATE TABLE `health_team` (
  `id` int(11) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `coach_id` int(10) NOT NULL,
  `hospital_id` int(10) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_team`
--

INSERT INTO `health_team` (`id`, `patient_id`, `doctor_id`, `coach_id`, `hospital_id`, `status`, `created_at`, `updated_at`) VALUES
(20, 119, 102, 63, 5, 1, '2018-12-29 05:36:57', '2018-12-29 05:36:57'),
(21, 127, 177, 212, 5, 1, '2019-08-05 13:00:53', '2019-08-05 13:00:53'),
(22, 185, 146, 63, 3, 1, '2019-03-09 23:33:55', '2019-03-09 23:33:55'),
(23, 187, 146, 63, 5, 1, '2019-03-10 19:44:44', '2019-03-10 19:44:44'),
(27, 213, 177, 212, 5, 1, '2019-07-27 06:19:15', '2019-07-27 06:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `hopi_patient`
--

CREATE TABLE `hopi_patient` (
  `id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hopi_patient`
--

INSERT INTO `hopi_patient` (`id`, `patient_id`, `doctor_id`) VALUES
(128, 180, 334),
(129, 180, 334),
(130, 180, 334),
(131, 368, 334),
(132, 379, 375),
(133, 379, 375),
(134, 379, 375),
(135, 379, 375),
(136, 379, 375),
(137, 379, 375),
(138, 379, 375),
(139, 356, 375),
(140, 405, 334),
(141, 405, 334);

-- --------------------------------------------------------

--
-- Table structure for table `hopi_patient_data`
--

CREATE TABLE `hopi_patient_data` (
  `id` int(10) NOT NULL,
  `hopi_patient_id` int(10) NOT NULL,
  `complain_name` varchar(255) NOT NULL,
  `complain_no` varchar(255) NOT NULL,
  `complain_days` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `is_comorbidities` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hopi_patient_data`
--

INSERT INTO `hopi_patient_data` (`id`, `hopi_patient_id`, `complain_name`, `complain_no`, `complain_days`, `problem`, `is_comorbidities`) VALUES
(149, 128, 'vv', '4', '4', 'High Stress Levels,Alcoholism', 0),
(150, 128, '3', '4', '3', 'High Stress Levels,Alcoholism', 0),
(151, 128, '2', '3', '4', 'High Stress Levels,Alcoholism', 1),
(178, 129, 'bbb', '7', '5', 'Obese,High Stress Levels', 0),
(179, 129, 'fff', '4', '4', 'Obese,High Stress Levels', 0),
(180, 129, 'ddd', '4', '4', 'Obese,High Stress Levels', 1),
(181, 129, 'fff', '4', '6', 'Obese,High Stress Levels', 1),
(182, 129, 'd', 'd', 'd', 'Obese,High Stress Levels', 1),
(183, 130, 'efg', '4', '4', 'High Stress Levels,Smoking', 0),
(184, 130, 'ere', '4', '54', 'High Stress Levels,Smoking', 1),
(201, 131, 'aaa', '4', 'hours', 'High Stress Levels', 0),
(202, 131, 'cccc', '3', 'weeks', 'High Stress Levels', 0),
(203, 131, 'bbb', '4', 'months', 'High Stress Levels', 1),
(204, 131, '34', '3', 'years', 'High Stress Levels', 1),
(218, 132, 's', '3', 'hours', 'High Stress Levels', 0),
(219, 132, '24', '3', 'days', 'High Stress Levels', 0),
(220, 132, '234', '3', 'hours', 'High Stress Levels', 0),
(221, 132, '23', '3', 'hours', 'High Stress Levels', 1),
(222, 132, '423', '3', 'hours', 'High Stress Levels', 1),
(223, 133, 'asd', '4', 'weeks', '', 0),
(224, 133, 'sd', '4', 'weeks', '', 1),
(226, 134, '44', '3', 'weeks', '', 0),
(227, 134, 'eee', '4', 'hours', '', 1),
(228, 135, 'ssss', '4', 'hours', '', 0),
(229, 135, 'asd', '4', 'hours', '', 1),
(230, 136, 'sdsa', '4', 'hours', '', 0),
(231, 137, 'bb', '123456789', 'days', '', 0),
(232, 138, 'bhargav', '123456789', 'weeks', 'Sedentary Lifestyle,Smoking', 0),
(233, 138, 'bhargav', '123456789', 'years', 'Sedentary Lifestyle,Smoking', 1),
(234, 139, 'bbb', '1232', 'days', 'High Stress Levels', 0),
(235, 139, 'yes', '1234', 'hours', 'High Stress Levels', 1),
(236, 140, 'clear', '123', 'weeks', 'High Stress Levels,Sedentary Lifestyle,Alcoholism,Smoking', 0),
(237, 140, 'yes', '121', 'hours', 'High Stress Levels,Sedentary Lifestyle,Alcoholism,Smoking', 1),
(238, 141, 'safas', '212', 'hours', '', 0),
(239, 141, 'dfaf', '21321', 'hours', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` int(11) NOT NULL,
  `urgent_care_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `email`, `contact_number`, `address`, `city`, `urgent_care_number`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Genesis Hospital', 'genesishospitalagra@gmail.com', '8881237772', 'Khatena Rd, Lohamandi, Agra', 1, '915624005294', 1, '2018-10-01 13:19:39', '2018-10-01 13:19:39'),
(4, 'Rishi Mahajan Hospital', 'rishimahajanhospital@gmail.com', '7617739666', 'Jaipur House, Agra', 1, '7617739666', 1, '2018-10-01 13:30:11', '2018-10-01 13:30:11'),
(5, 'Care Hospital', 'carehospitalagra@gmail.com', '5622210447', 'Pachkuiyan Rd, Ashok Nagar, Agra', 1, '05622210447', 1, '2018-10-01 13:33:10', '2018-10-02 17:29:15'),
(6, 'Agarwal Critical Care', 'agarwalcriticalcareagra@gmail.com', '8979402068', 'Madhuban Plaza, Delhi Gate, Agra', 1, '8979402068', 0, '2018-10-02 19:16:19', '2018-10-03 17:28:58'),
(7, 'Gautam Hospital And Research Centre', 'gautamhospitaljaipur@gmail.com', '9152337493', 'Jaipur', 2, '9152337493', 1, '2018-10-09 20:43:14', '2018-10-09 20:43:14'),
(8, 'Santokba Durlabhji Memorial Hospital & Medical Research Institute', 'santokbajaipur@gmail.com', '1412566251', 'Jaipur', 2, '01412566251', 1, '2018-10-09 20:45:00', '2018-10-09 20:45:00'),
(9, 'Vaishali Hospital & Surgical Research Centre', 'vaishalijaipur@gmail.com', '9152346432', 'Jaipur', 2, '9152346432', 1, '2018-10-09 20:45:58', '2018-10-09 20:45:58'),
(10, 'D C Hospital', 'dcjaipur@gmail.com', '9152871587', 'Jaipur', 2, '9152871587', 1, '2018-10-09 20:47:01', '2018-10-09 20:47:01'),
(11, 'Divine Hospital', 'divinelucknow@gmail.com', '5222721991', 'Lucknow', 7, '5222721991', 1, '2018-10-09 20:48:18', '2018-10-09 20:50:18'),
(12, 'Shekhar Hospital', 'shekharlucknow@gmail.com', '5222352352', 'Lucknow', 7, '5222352352', 1, '2018-10-09 20:49:00', '2018-10-09 20:49:00'),
(13, 'Icon Hospital', 'iconlucknow@gmail.com', '5222733001', 'Lucknow', 7, '5222733001', 1, '2018-10-09 20:49:40', '2018-10-09 20:49:40'),
(14, 'St Joseph Hospital', 'stjosephlucknow@gmail.com', '5224054200', 'Lucknow', 7, '5224054200', 1, '2018-10-09 20:51:25', '2018-10-09 20:51:25'),
(15, 'Kalra Hospital Kirti Nagar', 'kalradelhi@gmail.com', '1145005600', 'Kirti Nagar, Delhi', 6, '1145005600', 1, '2018-10-10 17:48:09', '2018-10-10 17:48:09'),
(16, 'Rockland Hospital, Qutub Area, New Delhi', 'rocklanddelhi@gmail.com', '1141222222', 'Qutub Area, Delhi', 6, '1141222222', 1, '2018-10-10 17:49:46', '2018-10-10 17:49:46'),
(17, 'Batra Hospital', 'batra@gmail.com', '1147778000', 'South Delhi', 6, '1147778000', 1, '2018-10-10 17:51:05', '2018-10-10 17:51:05'),
(18, 'Sardar Patel', 'info@sardarpatel.com', '7576987870', NULL, 12, '1800008938982', 1, '2019-02-22 21:55:36', '2019-02-22 21:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `investigation`
--

CREATE TABLE `investigation` (
  `id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `investigation_name` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `hospital` int(11) NOT NULL,
  `speciality` int(11) NOT NULL,
  `doctorsname` int(11) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `daysofmonth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation`
--

INSERT INTO `investigation` (`id`, `doctor_id`, `patient_id`, `date`, `investigation_name`, `city`, `hospital`, `speciality`, `doctorsname`, `goal`, `no`, `daysofmonth`) VALUES
(1, 334, 180, '10-12-2019', 'sadas', 2, 9, 1, 334, '', '', ''),
(2, 334, 180, '12-12-2019', 'asd asdd', 1, 3, 1, 334, '', '', ''),
(3, 334, 180, '11-12-2019', 'sdf', 2, 7, 1, 334, '', '', ''),
(4, 334, 368, '27-01-2020', 'asd', 2, 7, 2, 334, '', '', ''),
(5, 334, 368, '24-01-2020', 'asdsa', 1, 3, 2, 334, '', '', ''),
(6, 375, 379, '09-01-2020', 'asd', 12, 57, 2, 375, '', '', ''),
(7, 375, 379, '24-01-2020', 'sfasf', 1, 60, 2, 375, '', '', ''),
(8, 375, 379, '23-01-2020', '21312', 1, 60, 2, 375, '', '', ''),
(9, 375, 379, '23-01-2020', '21312', 1, 60, 2, 375, 'afa', '123', 'days'),
(10, 375, 379, '23-01-2020', '21312', 1, 60, 2, 375, '', '', ''),
(11, 375, 379, '15-01-2020', 'sdadas', 1, 60, 2, 375, '', '', ''),
(12, 375, 379, '23-01-2020', 'safasf', 1, 60, 2, 375, '', '', ''),
(13, 375, 356, '30-01-2020', 'sdas', 1, 0, 2, 0, '', '', ''),
(14, 334, 405, '27-01-2020', 'dsasd', 1, 60, 1, 334, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_goal`
--

CREATE TABLE `investigation_goal` (
  `id` int(10) NOT NULL,
  `investigation_id` int(10) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `daysofmonth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation_goal`
--

INSERT INTO `investigation_goal` (`id`, `investigation_id`, `goal`, `no`, `daysofmonth`) VALUES
(8, 3, 'dfg', '4', '3'),
(9, 3, '2fsd', '3', '3'),
(10, 3, 'sfdf', '2', '3'),
(11, 3, 'fsdf', '2', '3'),
(31, 1, 'sasdaaee', '3', '3'),
(32, 1, 'rrr', '3', '3'),
(33, 1, 'asdsad', '4', '4'),
(37, 4, '4s', '4ss', 'months'),
(38, 4, '3s', '4a', 'months'),
(39, 4, '2s', '4s', 'days'),
(40, 5, '4', '4', 'days'),
(43, 6, 'rrr', '5', 'months'),
(44, 7, 'dfdf', '21312', 'months'),
(45, 8, 'sfdas', '2', 'days'),
(46, 9, 'sfdas', '232', 'days'),
(47, 10, 'sfdas', '232', 'days'),
(48, 11, 'sdasd', '213', 'months'),
(49, 12, 'sfsa', '213', 'months'),
(50, 13, 'goal', '123', 'months'),
(51, 14, 'high', '132', 'days');

-- --------------------------------------------------------

--
-- Table structure for table `lab_report`
--

CREATE TABLE `lab_report` (
  `id` int(11) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_report`
--

INSERT INTO `lab_report` (`id`, `test_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'HbA1c', 1, '2018-09-01 18:49:21', '2018-09-01 18:49:21'),
(3, 'SGOT', 1, '2018-09-01 18:50:01', '2018-09-01 18:50:01'),
(4, 'SGPT', 1, '2018-09-01 18:50:07', '2018-09-01 18:50:07'),
(5, 'Hemoglobin', 1, '2018-09-04 05:14:06', '2018-09-04 05:14:06'),
(6, 'TLC', 1, '2018-09-04 05:14:19', '2018-09-04 05:14:19'),
(7, 'Platlet Count', 1, '2018-09-04 05:14:30', '2018-09-04 05:14:30'),
(8, 'T. Bilirubin', 1, '2018-09-04 05:14:43', '2018-09-04 05:14:43'),
(9, 'U. Bilirubin', 1, '2018-09-04 05:14:54', '2018-09-04 05:14:54'),
(10, 'C. Bilirubin', 1, '2018-09-04 05:15:02', '2018-09-04 05:15:02'),
(11, 'Gamma GT', 1, '2018-09-04 05:15:11', '2018-09-04 05:15:11'),
(12, 'S. Albumin', 1, '2018-09-04 05:15:26', '2018-09-04 05:15:26'),
(13, 'S. Globulin', 1, '2018-09-04 05:15:33', '2018-09-04 05:15:33'),
(14, 'Hematocrit', 1, '2018-09-04 05:15:46', '2018-09-04 05:15:58'),
(15, 'ALP', 1, '2018-09-04 05:16:02', '2018-11-17 00:06:47'),
(16, 'A:G Ratio', 1, '2018-09-08 18:05:17', '2018-11-17 00:07:11'),
(17, 'TSH', 1, '2018-09-24 21:41:27', '2019-12-18 10:27:05'),
(18, 'T3', 1, '2018-09-28 18:54:24', '2018-11-17 00:07:42'),
(19, 'T4', 1, '2018-11-17 00:07:49', '2018-11-17 00:07:49'),
(20, 'S. Na+ (Sodium)', 1, '2018-11-17 00:08:14', '2018-11-17 00:08:14'),
(21, 'S. K+ (Potassium)', 1, '2018-11-17 00:08:31', '2018-11-17 00:08:31'),
(22, 'S. Creatinine', 1, '2018-11-17 00:08:46', '2018-11-17 00:08:46'),
(23, 'B. Urea', 1, '2018-11-17 00:09:09', '2018-11-17 00:09:09'),
(24, 'S. Uric Acid', 1, '2018-11-17 00:09:24', '2018-11-17 00:09:24'),
(25, 'GFR Estimation', 1, '2018-11-17 00:09:41', '2018-11-17 00:09:41'),
(26, 'BUN : Creatinine Ratio', 1, '2018-11-17 00:10:01', '2018-11-17 00:10:01'),
(27, 'T. Cholesterol', 1, '2018-11-17 00:10:19', '2018-11-17 00:10:19'),
(28, 'S. Triglycerides', 1, '2018-11-17 00:10:33', '2018-11-17 00:10:33'),
(29, 'LDL', 1, '2018-11-17 00:10:43', '2018-11-17 00:10:43'),
(30, 'VLDL', 0, '2018-11-17 00:10:49', '2019-12-17 16:54:37'),
(31, 'HDL', 1, '2018-11-17 00:10:56', '2019-12-17 16:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `list_of_problem`
--

CREATE TABLE `list_of_problem` (
  `id` int(10) UNSIGNED NOT NULL,
  `problem` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_of_problem`
--

INSERT INTO `list_of_problem` (`id`, `problem`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Coronary Heart Disease', 'Family', 1, '2018-08-30 20:53:10', '2018-08-30 20:53:10'),
(2, 'Valve Defects', 'Family', 1, '2018-08-30 20:54:03', '2018-09-04 03:36:14'),
(3, 'Arrhythmia', 'Family', 1, '2018-08-30 20:54:14', '2018-09-04 03:36:50'),
(4, 'Obesity', 'Family', 1, '2018-08-30 20:54:58', '2018-08-30 20:54:58'),
(5, 'Diabetes', 'Family', 1, '2018-08-30 20:55:05', '2018-08-30 20:55:05'),
(6, 'High Blood Pressure', 'Family', 1, '2018-08-30 20:55:25', '2018-08-30 20:55:25'),
(10, 'High Cholesterol', 'Family', 1, '2018-09-04 02:56:43', '2018-09-04 02:58:30'),
(11, 'PCOD', 'Family', 1, '2018-09-04 02:56:52', '2018-09-04 02:56:52'),
(12, 'Stroke', 'Family', 1, '2018-09-04 02:57:06', '2018-09-04 02:59:13'),
(13, 'Alcoholism', 'Family', 1, '2018-09-04 02:57:16', '2018-09-04 02:57:16'),
(14, 'Depression', 'Family', 1, '2018-09-04 02:57:28', '2018-09-04 02:57:28'),
(15, 'Nerve or Muscular Disease', 'Family', 1, '2018-09-04 03:11:42', '2018-09-04 03:11:42'),
(16, 'Osteoporosis', 'Family', 1, '2018-09-04 03:11:53', '2018-09-04 03:11:53'),
(17, 'Epilepsy', 'Family', 1, '2018-09-04 03:13:00', '2018-09-04 03:13:00'),
(18, 'Psychosis', 'Family', 1, '2018-09-04 03:13:08', '2018-09-04 03:13:08'),
(19, 'Migraine', 'Family', 1, '2018-09-04 03:13:59', '2018-09-04 03:13:59'),
(20, 'Asthma', 'Family', 1, '2018-09-04 03:14:07', '2018-09-04 03:14:07'),
(21, 'Tuberculosis', 'Family', 1, '2018-09-04 03:14:16', '2018-09-04 03:14:16'),
(22, 'Blood Disorders', 'Family', 1, '2018-09-04 03:15:00', '2018-09-04 03:15:00'),
(23, 'Liver Disease', 'Family', 1, '2018-09-04 03:15:16', '2018-09-04 03:15:16'),
(24, 'Skin Problems', 'Family', 1, '2018-09-04 03:15:38', '2018-09-04 03:15:38'),
(25, 'Eye Problems', 'Family', 1, '2018-09-04 03:15:45', '2018-09-04 03:15:45'),
(26, 'Kidney Disease', 'Family', 1, '2018-09-04 03:16:18', '2018-09-04 03:16:18'),
(27, 'Cancer Prostate', 'Family', 1, '2018-09-04 03:16:33', '2018-09-04 03:16:33'),
(28, 'Cancer Lung', 'Family', 1, '2018-09-04 03:16:56', '2018-09-04 03:16:56'),
(29, 'Cancer Intestine or Rectum', 'Family', 1, '2018-09-04 03:17:10', '2018-09-04 03:17:10'),
(30, 'Cancer Breast or Ovary or Uterus', 'Family', 1, '2018-09-04 03:17:44', '2018-09-04 03:17:44'),
(31, 'Arthritis', 'Family', 1, '2018-09-04 03:35:35', '2018-09-04 03:35:35'),
(32, 'Alzheimers or Parkinsons', 'Family', 1, '2018-09-04 03:39:20', '2018-09-04 03:40:14'),
(33, 'Heart Disease', 'Past', 1, '2018-09-04 03:43:57', '2018-09-04 03:43:57'),
(34, 'High Cholesterol', 'Past', 1, '2018-09-04 03:44:06', '2018-09-04 03:44:06'),
(35, 'High Blood Pressure', 'Past', 1, '2018-09-04 03:44:24', '2018-09-04 03:44:24'),
(36, 'Tuberculosis', 'Past', 1, '2018-09-04 03:44:32', '2018-09-04 03:45:59'),
(37, 'Gangrene', 'Past', 1, '2018-09-04 03:44:51', '2018-09-04 03:44:51'),
(38, 'Cancer', 'Past', 1, '2018-09-04 03:44:56', '2018-09-04 03:46:13'),
(39, 'Asthma', 'Past', 1, '2018-09-04 03:46:18', '2018-09-04 03:46:18'),
(40, 'Obesity', 'Past', 1, '2018-09-04 03:47:00', '2018-09-04 03:47:00'),
(41, 'Stroke', 'Past', 1, '2018-09-04 03:47:06', '2018-09-04 03:47:06'),
(42, 'Depression', 'Past', 1, '2018-09-04 03:47:11', '2018-09-04 03:47:11'),
(43, 'Chest Pain', 'Past', 1, '2018-09-04 03:49:43', '2018-09-04 03:49:43'),
(44, 'Mental Health Issues', 'Past', 1, '2018-09-04 03:49:53', '2018-09-04 03:51:29'),
(45, 'Arthritis', 'Past', 1, '2018-09-04 03:50:15', '2018-09-04 03:50:15'),
(46, 'Osteoporosis or Fractures', 'Past', 1, '2018-09-04 03:52:50', '2018-09-04 03:52:50'),
(47, 'Jaundice or Chronic Liver Disease', 'Past', 1, '2018-09-04 03:53:32', '2018-09-04 03:53:32'),
(48, 'Chronic Kidney Disease', 'Past', 1, '2018-09-04 03:53:50', '2018-09-04 03:53:50'),
(49, 'Kidney Stones', 'Past', 1, '2018-09-04 03:54:30', '2018-09-04 03:54:30'),
(50, 'BPH', 'Past', 1, '2018-09-04 03:57:22', '2018-09-04 03:57:22'),
(51, 'Bladder Incontinence', 'Past', 1, '2018-09-04 03:57:35', '2018-09-04 03:57:35'),
(52, 'Gall Stones', 'Past', 1, '2018-09-04 03:57:52', '2018-09-04 03:57:52'),
(53, 'Pancreatic Disease', 'Past', 1, '2018-09-04 03:58:12', '2018-09-04 03:58:12'),
(54, 'Anal Warts or Fissure or Piles', 'Past', 1, '2018-09-04 03:58:44', '2018-09-04 03:58:44'),
(55, 'COPD', 'Past', 1, '2018-09-04 04:00:38', '2018-09-04 04:00:38'),
(56, 'Chronic Lung Disease', 'Past', 1, '2018-09-04 04:00:51', '2018-09-04 04:00:51'),
(57, 'Blood Transfusion', 'Past', 1, '2018-09-04 04:01:05', '2018-09-04 04:04:27'),
(58, 'Major Heart or Lung Surgery', 'Past', 1, '2018-09-04 04:04:49', '2018-09-04 04:04:49'),
(59, 'Amputation', 'Past', 1, '2018-09-04 04:06:04', '2018-09-04 04:06:04'),
(60, 'Memory Loss', 'Past', 1, '2018-09-04 04:07:41', '2018-09-04 04:07:41'),
(61, 'Vision Problems', 'Past', 1, '2018-09-04 04:07:50', '2018-09-04 04:07:50'),
(62, 'Tingling or Numbness', 'Past', 1, '2018-09-04 04:08:58', '2018-09-04 04:08:58'),
(63, 'Unconsciousness', 'Past', 1, '2018-09-04 04:10:01', '2018-09-04 04:10:01'),
(64, 'Major Gynecologic Surgery', 'Past', 1, '2018-09-04 04:10:42', '2018-09-04 04:10:42'),
(65, 'PCOD', 'Past', 1, '2018-09-04 04:11:30', '2018-09-04 04:11:30'),
(66, 'Thyroid Problems', 'Past', 1, '2018-09-04 04:12:11', '2018-09-04 04:12:11'),
(67, 'Major Accident', 'Past', 1, '2018-09-04 04:12:20', '2018-09-04 04:12:20'),
(68, 'Swelling on Foot', 'Past', 1, '2018-09-04 04:13:29', '2018-09-04 04:13:29'),
(69, 'Swelling Over Body', 'Past', 1, '2018-09-04 04:13:41', '2018-09-04 04:13:41'),
(70, 'Milk', 'Personal', 1, '2018-09-04 04:19:50', '2018-09-04 04:19:50'),
(71, 'Paneer', 'Personal', 1, '2018-09-04 04:20:00', '2018-09-04 04:22:42'),
(72, 'Fried Snacks', 'Personal', 1, '2018-09-04 04:20:32', '2018-09-04 04:23:03'),
(73, 'Ghee', 'Personal', 1, '2018-09-04 04:21:18', '2018-09-04 04:21:18'),
(74, 'Cream', 'Personal', 1, '2018-09-04 04:23:42', '2018-09-04 04:23:42'),
(75, 'Eggs', 'Personal', 1, '2018-09-04 04:24:13', '2018-09-04 04:24:13'),
(76, 'Butter', 'Personal', 1, '2018-09-04 04:24:49', '2018-09-04 04:24:49'),
(77, 'White Bread', 'Personal', 1, '2018-09-04 04:25:08', '2018-09-04 04:25:08'),
(78, 'Pasta', 'Personal', 1, '2018-09-04 04:25:16', '2018-09-04 04:25:16'),
(79, 'Soybean', 'Personal', 1, '2018-09-04 04:25:46', '2018-09-04 04:25:46'),
(80, 'Multigrain Bread', 'Personal', 1, '2018-09-04 04:26:30', '2018-09-04 04:26:30'),
(81, 'Bhatoora', 'Personal', 1, '2018-09-04 04:26:41', '2018-09-04 04:26:41'),
(82, 'Naan', 'Personal', 1, '2018-09-04 04:26:54', '2018-09-04 04:26:54'),
(83, 'Tawa Roti', 'Personal', 1, '2018-09-04 04:28:02', '2018-09-04 04:28:02'),
(84, 'Parantha', 'Personal', 1, '2018-09-04 04:28:09', '2018-09-04 04:28:09'),
(85, 'Rice', 'Personal', 1, '2018-09-04 04:28:25', '2018-09-04 04:28:25'),
(86, 'Suji Food', 'Personal', 1, '2018-09-04 04:29:15', '2018-09-04 04:29:15'),
(87, 'Boiled Sprouts', 'Personal', 1, '2018-09-04 04:29:28', '2018-09-04 04:29:28'),
(88, 'Dal', 'Personal', 1, '2018-09-04 04:29:36', '2018-09-04 04:29:36'),
(89, 'Lamb or Pork or Beef', 'Personal', 1, '2018-09-04 04:30:43', '2018-09-04 04:30:43'),
(90, 'Fish or Chicken', 'Personal', 1, '2018-09-04 04:30:49', '2018-09-04 04:31:21'),
(91, 'Coffee', 'Personal', 1, '2018-09-04 04:30:56', '2018-09-04 04:32:36'),
(92, 'Tea with Milk and Sugar', 'Personal', 1, '2018-09-04 04:32:48', '2018-09-04 04:32:48'),
(93, 'Green Tea', 'Personal', 1, '2018-09-04 04:34:22', '2018-09-04 04:34:22'),
(94, 'Carbonated Drinks', 'Personal', 1, '2018-09-04 04:34:32', '2018-09-04 04:34:32'),
(95, 'Fresh Fruits', 'Personal', 1, '2018-09-04 04:35:10', '2018-09-04 04:35:10'),
(96, 'Veg Salads', 'Personal', 1, '2018-09-04 04:35:18', '2018-09-04 04:35:18'),
(97, 'Mithaai', 'Personal', 1, '2018-09-04 04:35:56', '2018-09-04 04:35:56'),
(98, 'Bakery Food', 'Personal', 1, '2018-09-04 04:36:55', '2018-09-04 04:36:55'),
(99, 'Biscuits or Cakes', 'Personal', 1, '2018-09-04 04:37:05', '2018-09-04 04:37:05'),
(100, 'Pizza or Samosa or Burger', 'Personal', 1, '2018-09-04 04:38:01', '2018-09-04 04:38:01'),
(101, 'Packed Juice', 'Personal', 1, '2018-09-04 04:38:11', '2018-09-04 04:38:11'),
(102, 'Processed Jams or Jellies or Sauces', 'Personal', 0, '2018-09-04 04:39:42', '2018-09-08 18:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `city_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aarhus, Denmark', '2019-07-26 06:54:52', '2019-07-26 06:54:52'),
(2, 1, 'Tajganj, Agra, Uttar Pradesh, India', '2019-07-26 12:45:44', '2019-07-26 12:45:44'),
(3, 1, 'Forest Colony, Tajganj, Agra, Uttar Pradesh, India', '2019-07-26 13:02:33', '2019-07-26 13:02:33'),
(4, 1, 'Jaipur House Colony, Agra, Uttar Pradesh, India', '2019-07-31 11:40:02', '2019-07-31 11:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `master_health_plan`
--

CREATE TABLE `master_health_plan` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) DEFAULT NULL,
  `plan_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor` int(10) UNSIGNED DEFAULT NULL,
  `appointment` int(10) UNSIGNED DEFAULT NULL,
  `one_line_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_workup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_health_plan`
--

INSERT INTO `master_health_plan` (`id`, `city_id`, `plan_name`, `price`, `doctor`, `appointment`, `one_line_description`, `duration`, `special_workup`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Personal Wellness Plan', '290', NULL, NULL, 'Personalized Diet & Exercise Plan', '1', NULL, 0, '2018-09-03 19:49:30', '2019-02-13 03:00:02'),
(2, 1, 'Diabetes Total Control Plan', '2490', NULL, NULL, 'Take Charge Over Your Diabetes', '3', NULL, 1, '2018-09-03 22:37:20', '2019-06-12 22:59:43'),
(3, 1, 'Full Body Checkup Plan', '1', NULL, NULL, 'Your Complete Body Checkup Plan', '1', NULL, 1, '2018-09-03 22:56:03', '2019-06-12 22:59:38'),
(4, 4, 'Extended Body Checkup Cover', '1590', NULL, NULL, 'Full Panel Body Checkup & Support', '1', NULL, 0, '2018-09-04 02:27:24', '2019-02-13 02:59:38'),
(5, 5, 'Diabetes Micro Plan', '1490', NULL, NULL, '3 Monthly Diabetes Care', '3', NULL, 0, '2018-09-28 02:02:10', '2019-02-13 02:59:48'),
(6, NULL, 'Cholesterol Conscious Plan', '1690', NULL, NULL, '3 Monthly Heart Re-Energizer', '3', NULL, 0, '2018-10-31 20:35:13', '2019-02-13 02:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_id` int(10) UNSIGNED DEFAULT NULL,
  `to_id` int(10) UNSIGNED DEFAULT NULL,
  `notification_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `from_id`, `to_id`, `notification_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 33, 31, 'Patient Test has chosen you as the preferred Doctor on 03-09-2018 04:18 pm.', 1, '2018-09-03 23:18:13', '2018-09-03 23:18:13'),
(4, 33, 35, 'Patient Test has chosen you as the preferred Doctor on 03-09-2018 04:35 pm.', 1, '2018-09-03 23:35:26', '2018-09-03 23:35:26'),
(5, 35, 33, 'Dr. Amrin has sent you an e-prescription on 03-09-2018 04:43 PM Please check and follow the instructions.', 1, '2018-09-03 23:43:50', '2018-09-03 23:43:50'),
(6, 35, NULL, 'Dr. Amrin has written an e-prescription to Patient Test on 03-09-2018 04:43 PM', 1, '2018-09-03 23:43:50', '2018-09-03 23:43:50'),
(7, 35, 33, 'Dr. Amrin has sent you an e-prescription on 03-09-2018 04:43 PM Please check and follow the instructions.', 1, '2018-09-03 23:43:54', '2018-09-03 23:43:54'),
(8, 35, NULL, 'Dr. Amrin has written an e-prescription to Patient Test on 03-09-2018 04:43 PM', 1, '2018-09-03 23:43:54', '2018-09-03 23:43:54'),
(9, 35, 33, 'Dr. Amrin has sent you an e-prescription on 03-09-2018 04:54 PM Please check and follow the instructions.', 1, '2018-09-03 23:54:28', '2018-09-03 23:54:28'),
(10, 35, NULL, 'Dr. Amrin has written an e-prescription to Patient Test on 03-09-2018 04:54 PM', 1, '2018-09-03 23:54:28', '2018-09-03 23:54:28'),
(11, 35, 33, 'Dr. Amrin has sent you an e-prescription on 03-09-2018 04:57 PM Please check and follow the instructions.', 1, '2018-09-03 23:57:15', '2018-09-03 23:57:15'),
(12, 35, NULL, 'Dr. Amrin has written an e-prescription to Patient Test on 03-09-2018 04:57 PM', 1, '2018-09-03 23:57:15', '2018-09-03 23:57:15'),
(13, 35, 33, 'Dr. Amrin has sent you an e-prescription on 03-09-2018 04:57 PM Please check and follow the instructions.', 1, '2018-09-03 23:57:16', '2018-09-03 23:57:16'),
(14, 35, NULL, 'Dr. Amrin has written an e-prescription to Patient Test on 03-09-2018 04:57 PM', 1, '2018-09-03 23:57:16', '2018-09-03 23:57:16'),
(15, 32, 34, 'Patient Patient has chosen you as the Care Coach on 03-09-2018 04:58 pm.', 1, '2018-09-03 23:58:48', '2018-09-03 23:58:48'),
(16, 32, 35, 'Patient Patient has chosen you as the preferred Doctor on 03-09-2018 04:58 pm.', 1, '2018-09-03 23:58:48', '2018-09-03 23:58:48'),
(17, 35, 32, 'Dr. Amrin has sent you an e-prescription on 03-09-2018 05:02 PM Please check and follow the instructions.', 1, '2018-09-04 00:02:15', '2018-09-04 00:02:15'),
(18, 35, NULL, 'Dr. Amrin has written an e-prescription to Patient Patient on 03-09-2018 05:02 PM', 1, '2018-09-04 00:02:15', '2018-09-04 00:02:15'),
(19, 33, 33, 'You have successfully credited INR 1 in your wallet on 03-09-2018 05:03 PM.', 1, '2018-09-04 00:03:15', '2018-09-04 00:03:15'),
(20, 33, 33, 'You have successfully credited INR 249 in your wallet on 03-09-2018 05:05 PM.', 1, '2018-09-04 00:05:19', '2018-09-04 00:05:19'),
(21, 32, 32, 'You have successfully debited INR 250 in your wallet on 03-09-2018 05:15 PM.', 1, '2018-09-04 00:15:21', '2018-09-04 00:15:21'),
(22, 35, 32, 'Your wallet has been debited with INR 250 on 03-09-2018 05:15 PM as teleconsultation fees for Dr Amrin.', 1, '2018-09-04 00:15:21', '2018-09-04 00:15:21'),
(23, 32, 35, 'Patient Patient has successfully completed teleconsultation with you on 03-09-2018 05:15 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-04 00:15:21', '2018-09-04 00:15:21'),
(24, 35, 32, 'You have successfully completed video teleconsultation with Amrin on 03-09-2018 05:15 pm.Please wait for the e-prescription.', 1, '2018-09-04 00:15:23', '2018-09-04 00:15:23'),
(25, 32, 35, 'Patient Patient has successfully completed teleconsultation with you on 03-09-2018 05:15 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-04 00:15:23', '2018-09-04 00:15:23'),
(26, 36, 36, 'You have successfully credited INR 250 in your wallet on 03-09-2018 05:17 PM.', 1, '2018-09-04 00:17:39', '2018-09-04 00:17:39'),
(27, 32, 34, 'Patient Patient has chosen you as the Care Coach on 03-09-2018 05:23 pm.', 1, '2018-09-04 00:23:53', '2018-09-04 00:23:53'),
(28, 32, 37, 'Patient Patient has chosen you as the preferred Doctor on 03-09-2018 05:23 pm.', 1, '2018-09-04 00:23:53', '2018-09-04 00:23:53'),
(29, 34, 34, 'hi aaafrin', 0, '2018-09-04 00:24:38', '2018-09-04 00:24:38'),
(30, 34, 34, 'its in sony phone', 0, '2018-09-04 00:25:33', '2018-09-04 00:25:33'),
(31, 35, 35, 'hi amrin', 0, '2018-09-04 00:53:48', '2018-09-04 00:53:48'),
(32, 39, 39, 'Hello Coach this is from backend', 0, '2018-09-04 04:55:08', '2018-09-04 04:55:08'),
(33, 31, 31, 'Hello Doc this is from backend', 0, '2018-09-04 04:55:30', '2018-09-04 04:55:30'),
(34, 30, 30, 'You have successfully credited INR 100 in your wallet on 03-09-2018 09:58 PM.', 1, '2018-09-04 04:58:49', '2018-09-04 04:58:49'),
(35, 30, 30, 'You have successfully debited INR 1 in your wallet on 03-09-2018 10:05 PM.', 1, '2018-09-04 05:05:27', '2018-09-04 05:05:27'),
(36, 30, 39, 'Patient Surabhi has chosen you as the Care Coach on 03-09-2018 10:07 pm.', 1, '2018-09-04 05:07:23', '2018-09-04 05:07:23'),
(37, 30, 31, 'Patient Surabhi has chosen you as the preferred Doctor on 03-09-2018 10:07 pm.', 1, '2018-09-04 05:07:23', '2018-09-04 05:07:23'),
(38, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 03-09-2018 10:17 pm Kindly check', 1, '2018-09-04 05:17:04', '2018-09-04 05:17:04'),
(39, 39, 30, 'Your Coach Kiara has added new Procedure Reports to your Records on 03-09-2018 10:17 pm.Kindly check.', 1, '2018-09-04 05:17:27', '2018-09-04 05:17:27'),
(40, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 03-09-2018 10:19 pm Kindly check', 1, '2018-09-04 05:19:37', '2018-09-04 05:19:37'),
(41, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 03-09-2018 10:19 pm Kindly check', 1, '2018-09-04 05:19:58', '2018-09-04 05:19:58'),
(42, 30, 30, 'You have successfully debited INR 3 in your wallet on 04-09-2018 04:21 PM.', 1, '2018-09-04 23:21:28', '2018-09-04 23:21:28'),
(43, 30, 30, 'You have successfully debited INR 3 in your wallet on 04-09-2018 04:23 PM.', 1, '2018-09-04 23:23:07', '2018-09-04 23:23:07'),
(44, 31, 30, 'Your wallet has been debited with INR 3 on 04-09-2018 04:23 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-04 23:23:07', '2018-09-04 23:23:07'),
(45, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 04-09-2018 04:23 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-04 23:23:07', '2018-09-04 23:23:07'),
(46, 31, 30, 'You have successfully completed video teleconsultation with Navneet Goyal on 04-09-2018 04:23 pm.Please wait for the e-prescription.', 1, '2018-09-04 23:23:08', '2018-09-04 23:23:08'),
(47, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 04-09-2018 04:23 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-04 23:23:08', '2018-09-04 23:23:08'),
(48, 30, 30, 'You have successfully debited INR 3 in your wallet on 04-09-2018 04:23 PM.', 1, '2018-09-04 23:23:44', '2018-09-04 23:23:44'),
(49, 30, 30, 'You have successfully debited INR 2 in your wallet on 04-09-2018 04:27 PM.', 1, '2018-09-04 23:27:21', '2018-09-04 23:27:21'),
(50, 30, 30, 'You have successfully debited INR 1 in your wallet on 04-09-2018 04:40 PM.', 1, '2018-09-04 23:40:48', '2018-09-04 23:40:48'),
(51, 30, 39, 'Patient Surabhi has chosen you as the Care Coach on 04-09-2018 04:45 pm.', 1, '2018-09-04 23:45:22', '2018-09-04 23:45:22'),
(52, 30, 31, 'Patient Surabhi has chosen you as the preferred Doctor on 04-09-2018 04:45 pm.', 1, '2018-09-04 23:45:22', '2018-09-04 23:45:22'),
(53, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 04-09-2018 04:47 PM Please check and follow the instructions.', 1, '2018-09-04 23:47:30', '2018-09-04 23:47:30'),
(54, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 04-09-2018 04:47 PM', 1, '2018-09-04 23:47:30', '2018-09-04 23:47:30'),
(55, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 04-09-2018 04:48 PM Please check and follow the instructions.', 1, '2018-09-04 23:48:22', '2018-09-04 23:48:22'),
(56, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 04-09-2018 04:48 PM', 1, '2018-09-04 23:48:22', '2018-09-04 23:48:22'),
(57, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 04-09-2018 04:54 PM Please check and follow the instructions.', 1, '2018-09-04 23:54:13', '2018-09-04 23:54:13'),
(58, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 04-09-2018 04:54 PM', 1, '2018-09-04 23:54:13', '2018-09-04 23:54:13'),
(59, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 04-09-2018 04:54 PM Please check and follow the instructions.', 1, '2018-09-04 23:54:49', '2018-09-04 23:54:49'),
(60, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 04-09-2018 04:54 PM', 1, '2018-09-04 23:54:49', '2018-09-04 23:54:49'),
(61, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 04-09-2018 04:55 PM Please check and follow the instructions.', 1, '2018-09-04 23:55:33', '2018-09-04 23:55:33'),
(62, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 04-09-2018 04:55 PM', 1, '2018-09-04 23:55:33', '2018-09-04 23:55:33'),
(63, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 04-09-2018 04:56 PM Please check and follow the instructions.', 1, '2018-09-04 23:56:07', '2018-09-04 23:56:07'),
(64, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 04-09-2018 04:56 PM', 1, '2018-09-04 23:56:07', '2018-09-04 23:56:07'),
(65, 32, 32, 'You have successfully credited INR 350 & debited INR 100 in your wallet on 04-09-2018 05:41 PM.', 1, '2018-09-05 00:41:33', '2018-09-05 00:41:33'),
(66, 32, 32, 'You have successfully credited INR 100 & debited INR 100 in your wallet on 04-09-2018 06:21 PM.', 1, '2018-09-05 01:21:20', '2018-09-05 01:21:20'),
(67, 32, 32, 'You have successfully credited INR 100 & debited INR 100 in your wallet on 04-09-2018 06:23 PM.', 1, '2018-09-05 01:23:37', '2018-09-05 01:23:37'),
(68, 32, 32, 'You have successfully credited INR 100 & debited INR 100 in your wallet on 04-09-2018 06:25 PM.', 1, '2018-09-05 01:25:08', '2018-09-05 01:25:08'),
(69, 32, 32, 'You have successfully credited INR 1 in your wallet on 05-09-2018 12:29 PM.', 1, '2018-09-05 19:29:46', '2018-09-05 19:29:46'),
(70, 32, 32, 'You have successfully debited INR 1 in your wallet on 05-09-2018 12:35 PM.', 1, '2018-09-05 19:35:59', '2018-09-05 19:35:59'),
(71, 37, 32, 'Your wallet has been debited with INR 1 on 05-09-2018 12:36 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-05 19:36:00', '2018-09-05 19:36:00'),
(72, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 05-09-2018 12:36 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-05 19:36:00', '2018-09-05 19:36:00'),
(73, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 05-09-2018 12:36 pm.Please wait for the e-prescription.', 1, '2018-09-05 19:36:00', '2018-09-05 19:36:00'),
(74, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 05-09-2018 12:36 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-05 19:36:00', '2018-09-05 19:36:00'),
(75, 32, 32, 'You have successfully credited INR 1 in your wallet on 05-09-2018 12:38 PM.', 1, '2018-09-05 19:38:10', '2018-09-05 19:38:10'),
(76, 32, 32, 'You have successfully debited INR 1 in your wallet on 05-09-2018 12:47 PM.', 1, '2018-09-05 19:47:12', '2018-09-05 19:47:12'),
(77, 37, 32, 'Your wallet has been debited with INR 1 on 05-09-2018 12:47 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-05 19:47:12', '2018-09-05 19:47:12'),
(78, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 05-09-2018 12:47 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-05 19:47:13', '2018-09-05 19:47:13'),
(79, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 05-09-2018 12:47 pm.Please wait for the e-prescription.', 1, '2018-09-05 19:47:13', '2018-09-05 19:47:13'),
(80, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 05-09-2018 12:47 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-05 19:47:13', '2018-09-05 19:47:13'),
(81, 32, 32, 'You have successfully credited INR 1 in your wallet on 05-09-2018 12:47 PM.', 1, '2018-09-05 19:47:40', '2018-09-05 19:47:40'),
(82, 32, 32, 'You have successfully debited INR 1 in your wallet on 05-09-2018 01:44 PM.', 1, '2018-09-05 20:44:26', '2018-09-05 20:44:26'),
(83, 37, 32, 'Your wallet has been debited with INR 1 on 05-09-2018 01:44 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-05 20:44:26', '2018-09-05 20:44:26'),
(84, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 05-09-2018 01:44 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-05 20:44:26', '2018-09-05 20:44:26'),
(85, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 05-09-2018 01:44 pm.Please wait for the e-prescription.', 1, '2018-09-05 20:44:27', '2018-09-05 20:44:27'),
(86, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 05-09-2018 01:44 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-05 20:44:27', '2018-09-05 20:44:27'),
(87, 32, 32, 'You have successfully credited INR 1 in your wallet on 05-09-2018 01:44 PM.', 1, '2018-09-05 20:44:42', '2018-09-05 20:44:42'),
(88, 32, 32, 'You have successfully debited INR 1 in your wallet on 05-09-2018 01:44 PM.', 1, '2018-09-05 20:44:59', '2018-09-05 20:44:59'),
(89, 37, 32, 'Your wallet has been debited with INR 1 on 05-09-2018 01:44 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-05 20:44:59', '2018-09-05 20:44:59'),
(90, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 05-09-2018 01:44 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-05 20:44:59', '2018-09-05 20:44:59'),
(91, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 05-09-2018 01:44 pm.Please wait for the e-prescription.', 1, '2018-09-05 20:45:00', '2018-09-05 20:45:00'),
(92, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 05-09-2018 01:44 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-05 20:45:00', '2018-09-05 20:45:00'),
(93, 30, 30, 'You have successfully debited INR 3 in your wallet on 05-09-2018 06:41 PM.', 1, '2018-09-06 01:41:27', '2018-09-06 01:41:27'),
(94, 32, 32, 'You have successfully credited INR 1 in your wallet on 06-09-2018 10:50 AM.', 1, '2018-09-06 17:50:39', '2018-09-06 17:50:39'),
(95, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 11:20 AM.', 1, '2018-09-06 18:20:36', '2018-09-06 18:20:36'),
(96, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 11:20 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 18:20:36', '2018-09-06 18:20:36'),
(97, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 11:20 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 18:20:36', '2018-09-06 18:20:36'),
(98, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 11:20 am.Please wait for the e-prescription.', 1, '2018-09-06 18:20:37', '2018-09-06 18:20:37'),
(99, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 11:20 am.Please write e-prescription and Diagnosis.', 1, '2018-09-06 18:20:37', '2018-09-06 18:20:37'),
(100, 32, 32, 'You have successfully credited INR 100 in your wallet on 06-09-2018 11:22 AM.', 1, '2018-09-06 18:22:02', '2018-09-06 18:22:02'),
(101, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 11:22 AM.', 1, '2018-09-06 18:22:09', '2018-09-06 18:22:09'),
(102, 32, 32, 'You have successfully credited INR 12 in your wallet on 06-09-2018 12:06 PM.', 1, '2018-09-06 19:06:32', '2018-09-06 19:06:32'),
(103, 36, 36, 'You have successfully debited INR 1 in your wallet on 06-09-2018 12:09 PM.', 1, '2018-09-06 19:09:08', '2018-09-06 19:09:08'),
(104, 37, 36, 'Your wallet has been debited with INR 1 on 06-09-2018 12:09 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 19:09:09', '2018-09-06 19:09:09'),
(105, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 06-09-2018 12:09 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 19:09:09', '2018-09-06 19:09:09'),
(106, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 12:09 pm.Please wait for the e-prescription.', 1, '2018-09-06 19:09:10', '2018-09-06 19:09:10'),
(107, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 06-09-2018 12:09 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 19:09:10', '2018-09-06 19:09:10'),
(108, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 12:10 PM.', 1, '2018-09-06 19:10:17', '2018-09-06 19:10:17'),
(109, 32, 32, 'You have successfully credited INR 140 in your wallet on 06-09-2018 12:26 PM.', 1, '2018-09-06 19:26:00', '2018-09-06 19:26:00'),
(110, 32, 32, 'You have successfully debited INR 250 in your wallet on 06-09-2018 12:26 PM.', 1, '2018-09-06 19:26:28', '2018-09-06 19:26:28'),
(111, 35, 32, 'Your wallet has been debited with INR 250 on 06-09-2018 12:26 PM as teleconsultation fees for Dr Amrin.', 1, '2018-09-06 19:26:29', '2018-09-06 19:26:29'),
(112, 32, 35, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 12:26 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 19:26:29', '2018-09-06 19:26:29'),
(113, 35, 32, 'You have successfully completed video teleconsultation with Amrin on 06-09-2018 12:26 pm.Please wait for the e-prescription.', 1, '2018-09-06 19:26:29', '2018-09-06 19:26:29'),
(114, 32, 35, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 12:26 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 19:26:29', '2018-09-06 19:26:29'),
(115, 32, 32, 'You have successfully credited INR 250 in your wallet on 06-09-2018 12:27 PM.', 1, '2018-09-06 19:27:10', '2018-09-06 19:27:10'),
(116, 32, 32, 'You have successfully debited INR 250 in your wallet on 06-09-2018 12:28 PM.', 1, '2018-09-06 19:28:05', '2018-09-06 19:28:05'),
(117, 32, 32, 'You have successfully credited INR 1 in your wallet on 06-09-2018 12:34 PM.', 1, '2018-09-06 19:34:26', '2018-09-06 19:34:26'),
(118, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 01:07 PM.', 1, '2018-09-06 20:07:10', '2018-09-06 20:07:10'),
(119, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 01:07 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 20:07:10', '2018-09-06 20:07:10'),
(120, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 01:07 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 20:07:10', '2018-09-06 20:07:10'),
(121, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 01:07 pm.Please wait for the e-prescription.', 1, '2018-09-06 20:07:11', '2018-09-06 20:07:11'),
(122, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 01:07 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 20:07:11', '2018-09-06 20:07:11'),
(123, 32, 32, 'You have successfully credited INR 1 in your wallet on 06-09-2018 01:08 PM.', 1, '2018-09-06 20:08:43', '2018-09-06 20:08:43'),
(124, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 01:09 PM.', 1, '2018-09-06 20:09:02', '2018-09-06 20:09:02'),
(125, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 01:09 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 20:09:03', '2018-09-06 20:09:03'),
(126, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 01:09 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 20:09:03', '2018-09-06 20:09:03'),
(127, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 01:09 pm.Please wait for the e-prescription.', 1, '2018-09-06 20:09:03', '2018-09-06 20:09:03'),
(128, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 01:09 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 20:09:03', '2018-09-06 20:09:03'),
(129, 32, 32, 'You have successfully credited INR 1 in your wallet on 06-09-2018 01:11 PM.', 1, '2018-09-06 20:11:16', '2018-09-06 20:11:16'),
(130, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 01:11 PM.', 1, '2018-09-06 20:11:21', '2018-09-06 20:11:21'),
(131, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 01:12 PM.', 1, '2018-09-06 20:12:03', '2018-09-06 20:12:03'),
(132, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 01:12 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 20:12:04', '2018-09-06 20:12:04'),
(133, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 01:12 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 20:12:04', '2018-09-06 20:12:04'),
(134, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 01:12 pm.Please wait for the e-prescription.', 1, '2018-09-06 20:12:04', '2018-09-06 20:12:04'),
(135, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 01:12 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 20:12:04', '2018-09-06 20:12:04'),
(136, 32, 32, 'You have successfully credited INR 100 in your wallet on 06-09-2018 01:12 PM.', 1, '2018-09-06 20:12:53', '2018-09-06 20:12:53'),
(137, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 01:20 PM.', 1, '2018-09-06 20:20:34', '2018-09-06 20:20:34'),
(138, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 01:21 PM.', 1, '2018-09-06 20:21:31', '2018-09-06 20:21:31'),
(139, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 01:21 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 20:21:31', '2018-09-06 20:21:31'),
(140, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 01:21 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 20:21:31', '2018-09-06 20:21:31'),
(141, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 01:21 pm.Please wait for the e-prescription.', 1, '2018-09-06 20:21:32', '2018-09-06 20:21:32'),
(142, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 01:21 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 20:21:32', '2018-09-06 20:21:32'),
(143, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 01:21 PM.', 1, '2018-09-06 20:21:47', '2018-09-06 20:21:47'),
(144, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 01:55 PM.', 1, '2018-09-06 20:55:53', '2018-09-06 20:55:53'),
(145, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 01:55 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 20:55:53', '2018-09-06 20:55:53'),
(146, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 01:55 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 20:55:53', '2018-09-06 20:55:53'),
(147, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 01:55 pm.Please wait for the e-prescription.', 1, '2018-09-06 20:55:54', '2018-09-06 20:55:54'),
(148, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 01:55 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 20:55:54', '2018-09-06 20:55:54'),
(149, 36, 36, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:28 PM.', 1, '2018-09-06 21:28:37', '2018-09-06 21:28:37'),
(150, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:31 PM.', 1, '2018-09-06 21:31:47', '2018-09-06 21:31:47'),
(151, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:31 PM.', 1, '2018-09-06 21:31:58', '2018-09-06 21:31:58'),
(152, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:32 PM.', 1, '2018-09-06 21:32:03', '2018-09-06 21:32:03'),
(153, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:32 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:32:39', '2018-09-06 21:32:39'),
(154, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:32 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:32:39', '2018-09-06 21:32:39'),
(155, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:32 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:32:39', '2018-09-06 21:32:39'),
(156, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:32 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:32:39', '2018-09-06 21:32:39'),
(157, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:32 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:32:40', '2018-09-06 21:32:40'),
(158, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:32 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:32:40', '2018-09-06 21:32:40'),
(159, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:32 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:32:50', '2018-09-06 21:32:50'),
(160, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:32 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:32:50', '2018-09-06 21:32:50'),
(161, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:34 PM.', 1, '2018-09-06 21:34:28', '2018-09-06 21:34:28'),
(162, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:35 PM.', 1, '2018-09-06 21:35:10', '2018-09-06 21:35:10'),
(163, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:35 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(164, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:35 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(165, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:35 PM.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(166, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:35 PM.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(167, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:35 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(168, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:35 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(169, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:35 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(170, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:35 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(171, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:35 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(172, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:35 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(173, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:35 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(174, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:35 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(175, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:35 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:35:12', '2018-09-06 21:35:12'),
(176, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:35 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:35:12', '2018-09-06 21:35:12'),
(177, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:36 PM.', 1, '2018-09-06 21:36:44', '2018-09-06 21:36:44'),
(178, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:37 PM.', 1, '2018-09-06 21:37:11', '2018-09-06 21:37:11'),
(179, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:37 PM.', 1, '2018-09-06 21:37:12', '2018-09-06 21:37:12'),
(180, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:37 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:37:12', '2018-09-06 21:37:12'),
(181, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:37 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:37:12', '2018-09-06 21:37:12'),
(182, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:37 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:37:13', '2018-09-06 21:37:13'),
(183, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:37 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:37:13', '2018-09-06 21:37:13'),
(184, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:37 PM.', 1, '2018-09-06 21:37:20', '2018-09-06 21:37:20'),
(185, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:37 PM.', 1, '2018-09-06 21:37:35', '2018-09-06 21:37:35'),
(186, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:37 PM.', 1, '2018-09-06 21:37:36', '2018-09-06 21:37:36'),
(187, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:37 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:37:36', '2018-09-06 21:37:36'),
(188, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:37 PM.', 1, '2018-09-06 21:37:36', '2018-09-06 21:37:36'),
(189, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:37 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:37:36', '2018-09-06 21:37:36'),
(190, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:37 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:37:38', '2018-09-06 21:37:38'),
(191, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:37 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:37:38', '2018-09-06 21:37:38'),
(192, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:37 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:37:38', '2018-09-06 21:37:38'),
(193, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:37 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:37:38', '2018-09-06 21:37:38'),
(194, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:37 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:37:39', '2018-09-06 21:37:39'),
(195, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:37 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:37:39', '2018-09-06 21:37:39'),
(196, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:38 PM.', 1, '2018-09-06 21:38:05', '2018-09-06 21:38:05'),
(197, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:38 PM.', 1, '2018-09-06 21:38:23', '2018-09-06 21:38:23'),
(198, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:38 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:38:23', '2018-09-06 21:38:23'),
(199, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:38 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:38:23', '2018-09-06 21:38:23'),
(200, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:38 PM.', 1, '2018-09-06 21:38:24', '2018-09-06 21:38:24'),
(201, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:38 PM.', 1, '2018-09-06 21:38:24', '2018-09-06 21:38:24'),
(202, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:38 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:38:24', '2018-09-06 21:38:24'),
(203, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:38 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:38:24', '2018-09-06 21:38:24'),
(204, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:38 PM.', 1, '2018-09-06 21:38:32', '2018-09-06 21:38:32'),
(205, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:39 PM.', 1, '2018-09-06 21:39:12', '2018-09-06 21:39:12'),
(206, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:39 PM.', 1, '2018-09-06 21:39:12', '2018-09-06 21:39:12'),
(207, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:39 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:39:13', '2018-09-06 21:39:13'),
(208, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:39 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:39:13', '2018-09-06 21:39:13'),
(209, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:39 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:39:13', '2018-09-06 21:39:13'),
(210, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:39 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:39:13', '2018-09-06 21:39:13'),
(211, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:45 PM.', 1, '2018-09-06 21:45:44', '2018-09-06 21:45:44'),
(212, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:46 PM.', 1, '2018-09-06 21:46:04', '2018-09-06 21:46:04'),
(213, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:46 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:46:04', '2018-09-06 21:46:04'),
(214, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:46 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:46:04', '2018-09-06 21:46:04'),
(215, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:46 PM.', 1, '2018-09-06 21:46:04', '2018-09-06 21:46:04'),
(216, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:46 PM.', 1, '2018-09-06 21:46:04', '2018-09-06 21:46:04'),
(217, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:46 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(218, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:46 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(219, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:46 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(220, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:46 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(221, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:46 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(222, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:46 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(223, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:46 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(224, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:46 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(225, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:46 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(226, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:46 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:46:05', '2018-09-06 21:46:05'),
(227, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:47 PM.', 1, '2018-09-06 21:47:55', '2018-09-06 21:47:55'),
(228, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:48 PM.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(229, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:48 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(230, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:48 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(231, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:48 PM.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(232, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:48 PM.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(233, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:48 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(234, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:48 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(235, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:48 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(236, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:48 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(237, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:48 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(238, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:48 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(239, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:48 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(240, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:48 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:48:37', '2018-09-06 21:48:37'),
(241, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:48 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:48:37', '2018-09-06 21:48:37'),
(242, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:48 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:48:37', '2018-09-06 21:48:37'),
(243, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:48 PM.', 1, '2018-09-06 21:48:49', '2018-09-06 21:48:49'),
(244, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:49 PM.', 1, '2018-09-06 21:49:02', '2018-09-06 21:49:02'),
(245, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:49 PM.', 1, '2018-09-06 21:49:02', '2018-09-06 21:49:02'),
(246, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:49 PM.', 1, '2018-09-06 21:49:02', '2018-09-06 21:49:02'),
(247, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:49 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:49:02', '2018-09-06 21:49:02'),
(248, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:49 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:49:02', '2018-09-06 21:49:02'),
(249, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:49 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(250, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:49 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(251, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:49 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(252, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:49 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(253, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:49 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(254, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:49 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(255, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:49 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(256, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:49 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(257, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:49 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(258, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:49 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:49:03', '2018-09-06 21:49:03'),
(259, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:50 PM.', 1, '2018-09-06 21:50:03', '2018-09-06 21:50:03'),
(260, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:50 PM.', 1, '2018-09-06 21:50:15', '2018-09-06 21:50:15'),
(261, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:50 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:50:15', '2018-09-06 21:50:15'),
(262, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:50 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:50:15', '2018-09-06 21:50:15'),
(263, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:50 PM.', 1, '2018-09-06 21:50:15', '2018-09-06 21:50:15'),
(264, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:50 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:50:16', '2018-09-06 21:50:16'),
(265, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:50 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:50:16', '2018-09-06 21:50:16'),
(266, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:50 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:50:16', '2018-09-06 21:50:16'),
(267, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:50 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:50:16', '2018-09-06 21:50:16'),
(268, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:50 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:50:16', '2018-09-06 21:50:16'),
(269, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:50 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:50:16', '2018-09-06 21:50:16'),
(270, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:53 PM.', 1, '2018-09-06 21:53:52', '2018-09-06 21:53:52'),
(271, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 02:54 PM.', 1, '2018-09-06 21:54:02', '2018-09-06 21:54:02'),
(272, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 02:54 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 21:54:02', '2018-09-06 21:54:02'),
(273, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:54 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:54:03', '2018-09-06 21:54:03'),
(274, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 02:54 pm.Please wait for the e-prescription.', 1, '2018-09-06 21:54:04', '2018-09-06 21:54:04'),
(275, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 02:54 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 21:54:04', '2018-09-06 21:54:04'),
(276, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 03:13 PM.', 1, '2018-09-06 22:13:21', '2018-09-06 22:13:21'),
(277, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 03:13 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 22:13:22', '2018-09-06 22:13:22'),
(278, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 03:13 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 22:13:22', '2018-09-06 22:13:22'),
(279, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 03:13 pm.Please wait for the e-prescription.', 1, '2018-09-06 22:13:22', '2018-09-06 22:13:22'),
(280, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 03:13 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 22:13:22', '2018-09-06 22:13:22'),
(281, 32, 32, 'You have successfully debited INR 1 in your wallet on 06-09-2018 03:13 PM.', 1, '2018-09-06 22:13:40', '2018-09-06 22:13:40'),
(282, 37, 32, 'Your wallet has been debited with INR 1 on 06-09-2018 03:13 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 22:13:40', '2018-09-06 22:13:40'),
(283, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 03:13 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 22:13:40', '2018-09-06 22:13:40'),
(284, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 03:13 pm.Please wait for the e-prescription.', 1, '2018-09-06 22:13:41', '2018-09-06 22:13:41'),
(285, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 03:13 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 22:13:41', '2018-09-06 22:13:41'),
(286, 32, 32, 'You have successfully debited INR 55 in your wallet on 06-09-2018 03:19 PM.', 1, '2018-09-06 22:19:34', '2018-09-06 22:19:34'),
(287, 37, 32, 'Your wallet has been debited with INR 55 on 06-09-2018 03:19 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 22:19:35', '2018-09-06 22:19:35'),
(288, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 03:19 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 22:19:35', '2018-09-06 22:19:35'),
(289, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 03:19 pm.Please wait for the e-prescription.', 1, '2018-09-06 22:19:36', '2018-09-06 22:19:36'),
(290, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 03:19 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 22:19:36', '2018-09-06 22:19:36'),
(291, 32, 32, 'You have successfully credited INR 55 in your wallet on 06-09-2018 03:20 PM.', 1, '2018-09-06 22:20:18', '2018-09-06 22:20:18'),
(292, 32, 32, 'You have successfully debited INR 55 in your wallet on 06-09-2018 03:20 PM.', 1, '2018-09-06 22:20:57', '2018-09-06 22:20:57'),
(293, 37, 32, 'Your wallet has been debited with INR 55 on 06-09-2018 03:20 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 22:20:58', '2018-09-06 22:20:58'),
(294, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 03:20 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 22:20:58', '2018-09-06 22:20:58'),
(295, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 03:20 pm.Please wait for the e-prescription.', 1, '2018-09-06 22:20:58', '2018-09-06 22:20:58'),
(296, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 03:20 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 22:20:59', '2018-09-06 22:20:59');
INSERT INTO `notification` (`id`, `from_id`, `to_id`, `notification_description`, `status`, `created_at`, `updated_at`) VALUES
(297, 32, 32, 'You have successfully credited INR 60 in your wallet on 06-09-2018 03:21 PM.', 1, '2018-09-06 22:21:34', '2018-09-06 22:21:34'),
(298, 32, 32, 'You have successfully debited INR 55 in your wallet on 06-09-2018 03:21 PM.', 1, '2018-09-06 22:21:57', '2018-09-06 22:21:57'),
(299, 37, 32, 'Your wallet has been debited with INR 55 on 06-09-2018 03:21 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 22:21:57', '2018-09-06 22:21:57'),
(300, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 03:21 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 22:21:57', '2018-09-06 22:21:57'),
(301, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 03:21 pm.Please wait for the e-prescription.', 1, '2018-09-06 22:21:58', '2018-09-06 22:21:58'),
(302, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 03:21 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 22:21:58', '2018-09-06 22:21:58'),
(303, 32, 32, 'You have successfully credited INR 50 in your wallet on 06-09-2018 04:04 PM.', 1, '2018-09-06 23:04:27', '2018-09-06 23:04:27'),
(304, 32, 32, 'You have successfully debited INR 55 in your wallet on 06-09-2018 04:07 PM.', 1, '2018-09-06 23:07:01', '2018-09-06 23:07:01'),
(305, 37, 32, 'Your wallet has been debited with INR 55 on 06-09-2018 04:07 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 23:07:01', '2018-09-06 23:07:01'),
(306, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 04:07 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 23:07:01', '2018-09-06 23:07:01'),
(307, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 04:07 pm.Please wait for the e-prescription.', 1, '2018-09-06 23:07:01', '2018-09-06 23:07:01'),
(308, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 04:07 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 23:07:02', '2018-09-06 23:07:02'),
(309, 32, 32, 'You have successfully credited INR 55 in your wallet on 06-09-2018 04:09 PM.', 1, '2018-09-06 23:09:50', '2018-09-06 23:09:50'),
(310, 32, 32, 'You have successfully debited INR 55 in your wallet on 06-09-2018 04:12 PM.', 1, '2018-09-06 23:12:16', '2018-09-06 23:12:16'),
(311, 37, 32, 'Your wallet has been debited with INR 55 on 06-09-2018 04:12 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 23:12:17', '2018-09-06 23:12:17'),
(312, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 04:12 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 23:12:17', '2018-09-06 23:12:17'),
(313, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 04:12 pm.Please wait for the e-prescription.', 1, '2018-09-06 23:12:17', '2018-09-06 23:12:17'),
(314, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 04:12 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 23:12:17', '2018-09-06 23:12:17'),
(315, 32, 32, 'You have successfully credited INR 55 in your wallet on 06-09-2018 04:30 PM.', 1, '2018-09-06 23:30:41', '2018-09-06 23:30:41'),
(316, 32, 32, 'You have successfully debited INR 55 in your wallet on 06-09-2018 04:32 PM.', 1, '2018-09-06 23:32:20', '2018-09-06 23:32:20'),
(317, 37, 32, 'Your wallet has been debited with INR 55 on 06-09-2018 04:32 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 23:32:20', '2018-09-06 23:32:20'),
(318, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 04:32 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 23:32:20', '2018-09-06 23:32:20'),
(319, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 04:32 pm.Please wait for the e-prescription.', 1, '2018-09-06 23:32:21', '2018-09-06 23:32:21'),
(320, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 04:32 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 23:32:21', '2018-09-06 23:32:21'),
(321, 32, 32, 'You have successfully credited INR 55 in your wallet on 06-09-2018 04:34 PM.', 1, '2018-09-06 23:34:36', '2018-09-06 23:34:36'),
(322, 32, 32, 'You have successfully debited INR 55 in your wallet on 06-09-2018 04:36 PM.', 1, '2018-09-06 23:36:47', '2018-09-06 23:36:47'),
(323, 37, 32, 'Your wallet has been debited with INR 55 on 06-09-2018 04:36 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-06 23:36:47', '2018-09-06 23:36:47'),
(324, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 04:36 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-06 23:36:47', '2018-09-06 23:36:47'),
(325, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 04:36 pm.Please wait for the e-prescription.', 1, '2018-09-06 23:36:48', '2018-09-06 23:36:48'),
(326, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 04:36 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-06 23:36:48', '2018-09-06 23:36:48'),
(327, 30, 30, 'You have successfully debited INR 3 in your wallet on 06-09-2018 05:50 PM.', 1, '2018-09-07 00:50:44', '2018-09-07 00:50:44'),
(328, 31, 30, 'Your wallet has been debited with INR 3 on 06-09-2018 05:50 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-07 00:50:45', '2018-09-07 00:50:45'),
(329, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 06-09-2018 05:50 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-07 00:50:45', '2018-09-07 00:50:45'),
(330, 31, 30, 'You have successfully completed video teleconsultation with Navneet Goyal on 06-09-2018 05:50 pm.Please wait for the e-prescription.', 1, '2018-09-07 00:50:45', '2018-09-07 00:50:45'),
(331, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 06-09-2018 05:50 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-07 00:50:45', '2018-09-07 00:50:45'),
(332, 30, 30, 'You have successfully debited INR 3 in your wallet on 06-09-2018 05:53 PM.', 1, '2018-09-07 00:53:48', '2018-09-07 00:53:48'),
(333, 31, 30, 'Your wallet has been debited with INR 3 on 06-09-2018 05:53 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-07 00:53:48', '2018-09-07 00:53:48'),
(334, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 06-09-2018 05:53 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-07 00:53:48', '2018-09-07 00:53:48'),
(335, 31, 30, 'You have successfully completed video teleconsultation with Navneet Goyal on 06-09-2018 05:53 pm.Please wait for the e-prescription.', 1, '2018-09-07 00:53:49', '2018-09-07 00:53:49'),
(336, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 06-09-2018 05:53 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-07 00:53:49', '2018-09-07 00:53:49'),
(337, 30, 30, 'You have successfully debited INR 3 in your wallet on 06-09-2018 05:56 PM.', 1, '2018-09-07 00:56:07', '2018-09-07 00:56:07'),
(338, 31, 30, 'Your wallet has been debited with INR 3 on 06-09-2018 05:56 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-07 00:56:07', '2018-09-07 00:56:07'),
(339, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 06-09-2018 05:56 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-07 00:56:07', '2018-09-07 00:56:07'),
(340, 31, 30, 'You have successfully completed video teleconsultation with Navneet Goyal on 06-09-2018 05:56 pm.Please wait for the e-prescription.', 1, '2018-09-07 00:56:08', '2018-09-07 00:56:08'),
(341, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 06-09-2018 05:56 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-07 00:56:08', '2018-09-07 00:56:08'),
(342, 32, 32, 'You have successfully credited INR 3 in your wallet on 06-09-2018 05:57 PM.', 1, '2018-09-07 00:57:08', '2018-09-07 00:57:08'),
(343, 32, 32, 'You have successfully debited INR 3 in your wallet on 06-09-2018 06:00 PM.', 1, '2018-09-07 01:00:18', '2018-09-07 01:00:18'),
(344, 31, 32, 'Your wallet has been debited with INR 3 on 06-09-2018 06:00 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-07 01:00:19', '2018-09-07 01:00:19'),
(345, 32, 31, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 06:00 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-07 01:00:19', '2018-09-07 01:00:19'),
(346, 31, 32, 'You have successfully completed video teleconsultation with Navneet Goyal on 06-09-2018 06:00 pm.Please wait for the e-prescription.', 1, '2018-09-07 01:00:19', '2018-09-07 01:00:19'),
(347, 32, 31, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 06:00 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-07 01:00:19', '2018-09-07 01:00:19'),
(348, 32, 32, 'You have successfully credited INR 3 in your wallet on 06-09-2018 06:02 PM.', 1, '2018-09-07 01:02:43', '2018-09-07 01:02:43'),
(349, 32, 32, 'You have successfully debited INR 3 in your wallet on 06-09-2018 06:04 PM.', 1, '2018-09-07 01:04:52', '2018-09-07 01:04:52'),
(350, 31, 32, 'Your wallet has been debited with INR 3 on 06-09-2018 06:04 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-07 01:04:52', '2018-09-07 01:04:52'),
(351, 32, 31, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 06:04 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-07 01:04:52', '2018-09-07 01:04:52'),
(352, 31, 32, 'You have successfully completed video teleconsultation with Navneet Goyal on 06-09-2018 06:04 pm.Please wait for the e-prescription.', 1, '2018-09-07 01:04:53', '2018-09-07 01:04:53'),
(353, 32, 31, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 06:04 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-07 01:04:53', '2018-09-07 01:04:53'),
(354, 32, 32, 'You have successfully credited INR 3 in your wallet on 06-09-2018 06:09 PM.', 1, '2018-09-07 01:09:14', '2018-09-07 01:09:14'),
(355, 32, 32, 'You have successfully credited INR 52 in your wallet on 06-09-2018 06:18 PM.', 1, '2018-09-07 01:18:07', '2018-09-07 01:18:07'),
(356, 32, 32, 'You have successfully debited INR 55 in your wallet on 06-09-2018 06:35 PM.', 1, '2018-09-07 01:35:52', '2018-09-07 01:35:52'),
(357, 37, 32, 'Your wallet has been debited with INR 55 on 06-09-2018 06:35 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-07 01:35:52', '2018-09-07 01:35:52'),
(358, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 06:35 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-07 01:35:52', '2018-09-07 01:35:52'),
(359, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 06:35 pm.Please wait for the e-prescription.', 1, '2018-09-07 01:35:52', '2018-09-07 01:35:52'),
(360, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 06:35 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-07 01:35:53', '2018-09-07 01:35:53'),
(361, 32, 32, 'You have successfully credited INR 55 in your wallet on 06-09-2018 06:37 PM.', 1, '2018-09-07 01:37:16', '2018-09-07 01:37:16'),
(362, 32, 32, 'You have successfully debited INR 55 in your wallet on 06-09-2018 06:49 PM.', 1, '2018-09-07 01:49:38', '2018-09-07 01:49:38'),
(363, 37, 32, 'Your wallet has been debited with INR 55 on 06-09-2018 06:49 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-07 01:49:38', '2018-09-07 01:49:38'),
(364, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 06:49 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-07 01:49:38', '2018-09-07 01:49:38'),
(365, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 06-09-2018 06:49 pm.Please wait for the e-prescription.', 1, '2018-09-07 01:49:39', '2018-09-07 01:49:39'),
(366, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 06-09-2018 06:49 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-07 01:49:39', '2018-09-07 01:49:39'),
(367, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 07-09-2018 02:07 pm Kindly check', 1, '2018-09-07 21:07:06', '2018-09-07 21:07:06'),
(368, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 07-09-2018 02:07 pm Kindly check', 1, '2018-09-07 21:07:23', '2018-09-07 21:07:23'),
(369, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 07-09-2018 02:07 pm Kindly check', 1, '2018-09-07 21:07:41', '2018-09-07 21:07:41'),
(370, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 07-09-2018 02:07 pm Kindly check', 1, '2018-09-07 21:07:57', '2018-09-07 21:07:57'),
(371, 36, 36, 'You have successfully debited INR 55 in your wallet on 07-09-2018 05:50 PM.', 1, '2018-09-08 00:50:10', '2018-09-08 00:50:10'),
(372, 37, 36, 'Your wallet has been debited with INR 55 on 07-09-2018 05:50 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-08 00:50:10', '2018-09-08 00:50:10'),
(373, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 07-09-2018 05:50 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-08 00:50:10', '2018-09-08 00:50:10'),
(374, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 07-09-2018 05:50 pm.Please wait for the e-prescription.', 1, '2018-09-08 00:50:10', '2018-09-08 00:50:10'),
(375, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 07-09-2018 05:50 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-08 00:50:10', '2018-09-08 00:50:10'),
(376, 36, 36, 'You have successfully debited INR 55 in your wallet on 07-09-2018 05:53 PM.', 1, '2018-09-08 00:53:23', '2018-09-08 00:53:23'),
(377, 37, 36, 'Your wallet has been debited with INR 55 on 07-09-2018 05:53 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-08 00:53:24', '2018-09-08 00:53:24'),
(378, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 07-09-2018 05:53 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-08 00:53:24', '2018-09-08 00:53:24'),
(379, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 07-09-2018 05:53 pm.Please wait for the e-prescription.', 1, '2018-09-08 00:53:24', '2018-09-08 00:53:24'),
(380, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 07-09-2018 05:53 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-08 00:53:24', '2018-09-08 00:53:24'),
(381, 36, 36, 'You have successfully debited INR 55 in your wallet on 07-09-2018 05:55 PM.', 1, '2018-09-08 00:55:23', '2018-09-08 00:55:23'),
(382, 37, 36, 'Your wallet has been debited with INR 55 on 07-09-2018 05:55 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-08 00:55:23', '2018-09-08 00:55:23'),
(383, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 07-09-2018 05:55 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-08 00:55:23', '2018-09-08 00:55:23'),
(384, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 07-09-2018 05:55 pm.Please wait for the e-prescription.', 1, '2018-09-08 00:55:24', '2018-09-08 00:55:24'),
(385, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 07-09-2018 05:55 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-08 00:55:24', '2018-09-08 00:55:24'),
(386, 36, 38, 'Patient Priya has chosen you as the Care Coach on 07-09-2018 06:04 pm.', 1, '2018-09-08 01:04:50', '2018-09-08 01:04:50'),
(387, 36, 37, 'Patient Priya has chosen you as the preferred Doctor on 07-09-2018 06:04 pm.', 1, '2018-09-08 01:04:50', '2018-09-08 01:04:50'),
(388, 32, 32, 'You have successfully debited INR 55 in your wallet on 08-09-2018 11:13 AM.', 1, '2018-09-08 18:13:27', '2018-09-08 18:13:27'),
(389, 37, 32, 'Your wallet has been debited with INR 55 on 08-09-2018 11:13 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-08 18:13:27', '2018-09-08 18:13:27'),
(390, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 08-09-2018 11:13 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-08 18:13:27', '2018-09-08 18:13:27'),
(391, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 08-09-2018 11:13 am.Please wait for the e-prescription.', 1, '2018-09-08 18:13:28', '2018-09-08 18:13:28'),
(392, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 08-09-2018 11:13 am.Please write e-prescription and Diagnosis.', 1, '2018-09-08 18:13:28', '2018-09-08 18:13:28'),
(393, 32, 32, 'You have successfully credited INR 5693 in your wallet on 08-09-2018 11:40 AM.', 1, '2018-09-08 18:40:05', '2018-09-08 18:40:05'),
(394, 42, 34, 'Patient Azra has chosen you as the Care Coach on 08-09-2018 12:31 pm.', 1, '2018-09-08 19:31:20', '2018-09-08 19:31:20'),
(395, 42, 41, 'Patient Azra has chosen you as the preferred Doctor on 08-09-2018 12:31 pm.', 1, '2018-09-08 19:31:20', '2018-09-08 19:31:20'),
(396, 41, 42, 'Dr. Aj has sent you an e-prescription on 08-09-2018 12:33 PM Please check and follow the instructions.', 1, '2018-09-08 19:33:33', '2018-09-08 19:33:33'),
(397, 41, NULL, 'Dr. Aj has written an e-prescription to Patient Azra on 08-09-2018 12:33 PM', 1, '2018-09-08 19:33:33', '2018-09-08 19:33:33'),
(398, 41, 42, 'Dr. Aj has sent you an e-prescription on 08-09-2018 12:34 PM Please check and follow the instructions.', 1, '2018-09-08 19:34:31', '2018-09-08 19:34:31'),
(399, 41, NULL, 'Dr. Aj has written an e-prescription to Patient Azra on 08-09-2018 12:34 PM', 1, '2018-09-08 19:34:31', '2018-09-08 19:34:31'),
(400, 41, 42, 'Dr. Aj has sent you an e-prescription on 08-09-2018 12:34 PM Please check and follow the instructions.', 1, '2018-09-08 19:34:55', '2018-09-08 19:34:55'),
(401, 41, NULL, 'Dr. Aj has written an e-prescription to Patient Azra on 08-09-2018 12:34 PM', 1, '2018-09-08 19:34:55', '2018-09-08 19:34:55'),
(402, 41, 42, 'Dr. Aj has sent you an e-prescription on 08-09-2018 12:34 PM Please check and follow the instructions.', 1, '2018-09-08 19:34:55', '2018-09-08 19:34:55'),
(403, 41, NULL, 'Dr. Aj has written an e-prescription to Patient Azra on 08-09-2018 12:34 PM', 1, '2018-09-08 19:34:55', '2018-09-08 19:34:55'),
(404, 41, 42, 'Dr. Aj has sent you an e-prescription on 08-09-2018 12:38 PM Please check and follow the instructions.', 1, '2018-09-08 19:38:43', '2018-09-08 19:38:43'),
(405, 41, NULL, 'Dr. Aj has written an e-prescription to Patient Azra on 08-09-2018 12:38 PM', 1, '2018-09-08 19:38:43', '2018-09-08 19:38:43'),
(406, 41, 42, 'Dr. Aj has sent you an e-prescription on 08-09-2018 12:39 PM Please check and follow the instructions.', 1, '2018-09-08 19:39:00', '2018-09-08 19:39:00'),
(407, 41, NULL, 'Dr. Aj has written an e-prescription to Patient Azra on 08-09-2018 12:39 PM', 1, '2018-09-08 19:39:00', '2018-09-08 19:39:00'),
(408, 42, 42, 'You have successfully credited INR 1 in your wallet on 08-09-2018 12:47 PM.', 1, '2018-09-08 19:47:29', '2018-09-08 19:47:29'),
(409, 42, 42, 'You have successfully debited INR 1 in your wallet on 08-09-2018 12:51 PM.', 1, '2018-09-08 19:51:05', '2018-09-08 19:51:05'),
(410, 41, 42, 'Your wallet has been debited with INR 1 on 08-09-2018 12:51 PM as teleconsultation fees for Dr Aj.', 1, '2018-09-08 19:51:06', '2018-09-08 19:51:06'),
(411, 42, 41, 'Patient Azra has successfully completed teleconsultation with you on 08-09-2018 12:51 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-08 19:51:06', '2018-09-08 19:51:06'),
(412, 41, 42, 'You have successfully completed video teleconsultation with Aj on 08-09-2018 12:51 pm.Please wait for the e-prescription.', 1, '2018-09-08 19:51:06', '2018-09-08 19:51:06'),
(413, 42, 41, 'Patient Azra has successfully completed teleconsultation with you on 08-09-2018 12:51 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-08 19:51:06', '2018-09-08 19:51:06'),
(414, 42, 42, 'You have successfully credited INR 1 in your wallet on 08-09-2018 12:54 PM.', 1, '2018-09-08 19:54:07', '2018-09-08 19:54:07'),
(415, 42, 42, 'You have successfully debited INR 1 in your wallet on 08-09-2018 12:59 PM.', 1, '2018-09-08 19:59:27', '2018-09-08 19:59:27'),
(416, 41, 42, 'Your wallet has been debited with INR 1 on 08-09-2018 12:59 PM as teleconsultation fees for Dr Aj.', 1, '2018-09-08 19:59:28', '2018-09-08 19:59:28'),
(417, 42, 41, 'Patient Azra has successfully completed teleconsultation with you on 08-09-2018 12:59 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-08 19:59:28', '2018-09-08 19:59:28'),
(418, 41, 42, 'You have successfully completed video teleconsultation with Aj on 08-09-2018 12:59 pm.Please wait for the e-prescription.', 1, '2018-09-08 19:59:28', '2018-09-08 19:59:28'),
(419, 42, 41, 'Patient Azra has successfully completed teleconsultation with you on 08-09-2018 12:59 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-08 19:59:28', '2018-09-08 19:59:28'),
(420, 42, 43, 'Patient Azra has chosen you as the Care Coach on 08-09-2018 01:14 pm.', 1, '2018-09-08 20:14:43', '2018-09-08 20:14:43'),
(421, 42, 41, 'Patient Azra has chosen you as the preferred Doctor on 08-09-2018 01:14 pm.', 1, '2018-09-08 20:14:43', '2018-09-08 20:14:43'),
(422, 42, 43, 'Patient Azra has chosen you as the Care Coach on 08-09-2018 01:15 pm.', 1, '2018-09-08 20:15:10', '2018-09-08 20:15:10'),
(423, 42, 41, 'Patient Azra has chosen you as the preferred Doctor on 08-09-2018 01:15 pm.', 1, '2018-09-08 20:15:10', '2018-09-08 20:15:10'),
(424, 42, 42, 'You have successfully credited INR 1 & debited INR 1 in your wallet on 08-09-2018 01:25 PM.', 1, '2018-09-08 20:25:55', '2018-09-08 20:25:55'),
(425, 42, 42, 'You have successfully credited INR 2 in your wallet on 08-09-2018 01:28 PM.', 1, '2018-09-08 20:28:22', '2018-09-08 20:28:22'),
(426, 42, 42, 'You have successfully debited INR 1 in your wallet on 08-09-2018 01:28 PM.', 1, '2018-09-08 20:28:33', '2018-09-08 20:28:33'),
(427, 42, 42, 'You have successfully credited INR 1 in your wallet on 08-09-2018 01:29 PM.', 1, '2018-09-08 20:29:07', '2018-09-08 20:29:07'),
(428, 42, 42, 'You have successfully debited INR 1 in your wallet on 08-09-2018 01:29 PM.', 1, '2018-09-08 20:29:45', '2018-09-08 20:29:45'),
(429, 42, 42, 'You have successfully credited INR 1 in your wallet on 08-09-2018 01:31 PM.', 1, '2018-09-08 20:31:15', '2018-09-08 20:31:15'),
(430, 42, 42, 'You have successfully debited INR 1 in your wallet on 08-09-2018 01:31 PM.', 1, '2018-09-08 20:31:39', '2018-09-08 20:31:39'),
(431, 42, 42, 'You have successfully credited INR 500 in your wallet on 08-09-2018 01:33 PM.', 1, '2018-09-08 20:33:52', '2018-09-08 20:33:52'),
(432, 42, 42, 'You have successfully debited INR 100 in your wallet on 08-09-2018 01:34 PM.', 1, '2018-09-08 20:34:09', '2018-09-08 20:34:09'),
(433, 42, 42, 'You have successfully credited INR 1 in your wallet on 08-09-2018 01:39 PM.', 1, '2018-09-08 20:39:13', '2018-09-08 20:39:13'),
(434, 32, 32, 'You have successfully debited INR 55 in your wallet on 08-09-2018 04:17 PM.', 1, '2018-09-08 23:17:18', '2018-09-08 23:17:18'),
(435, 37, 32, 'Your wallet has been debited with INR 55 on 08-09-2018 04:17 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-08 23:17:18', '2018-09-08 23:17:18'),
(436, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 08-09-2018 04:17 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-08 23:17:18', '2018-09-08 23:17:18'),
(437, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 08-09-2018 04:17 pm.Please wait for the e-prescription.', 1, '2018-09-08 23:17:19', '2018-09-08 23:17:19'),
(438, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 08-09-2018 04:17 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-08 23:17:19', '2018-09-08 23:17:19'),
(439, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 09-09-2018 01:07 PM Please check and follow the instructions.', 1, '2018-09-09 20:07:17', '2018-09-09 20:07:17'),
(440, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 09-09-2018 01:07 PM', 1, '2018-09-09 20:07:17', '2018-09-09 20:07:17'),
(441, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 09-09-2018 01:08 PM Please check and follow the instructions.', 1, '2018-09-09 20:08:04', '2018-09-09 20:08:04'),
(442, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 09-09-2018 01:08 PM', 1, '2018-09-09 20:08:04', '2018-09-09 20:08:04'),
(443, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 09-09-2018 01:08 PM Please check and follow the instructions.', 1, '2018-09-09 20:08:18', '2018-09-09 20:08:18'),
(444, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 09-09-2018 01:08 PM', 1, '2018-09-09 20:08:18', '2018-09-09 20:08:18'),
(445, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 09-09-2018 01:08 PM Please check and follow the instructions.', 1, '2018-09-09 20:08:55', '2018-09-09 20:08:55'),
(446, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 09-09-2018 01:08 PM', 1, '2018-09-09 20:08:55', '2018-09-09 20:08:55'),
(447, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 09-09-2018 01:09 PM Please check and follow the instructions.', 1, '2018-09-09 20:09:27', '2018-09-09 20:09:27'),
(448, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 09-09-2018 01:09 PM', 1, '2018-09-09 20:09:27', '2018-09-09 20:09:27'),
(449, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 09-09-2018 01:10 PM Please check and follow the instructions.', 1, '2018-09-09 20:10:10', '2018-09-09 20:10:10'),
(450, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 09-09-2018 01:10 PM', 1, '2018-09-09 20:10:10', '2018-09-09 20:10:10'),
(451, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 09-09-2018 05:38 pm Kindly check', 1, '2018-09-10 00:38:01', '2018-09-10 00:38:01'),
(452, 42, 43, 'Patient Azra has chosen you as the Care Coach on 10-09-2018 10:40 am.', 1, '2018-09-10 17:40:03', '2018-09-10 17:40:03'),
(453, 42, 41, 'Patient Azra has chosen you as the preferred Doctor on 10-09-2018 10:40 am.', 1, '2018-09-10 17:40:03', '2018-09-10 17:40:03'),
(454, 42, 42, 'You have successfully debited INR 1 in your wallet on 10-09-2018 10:48 AM.', 1, '2018-09-10 17:48:33', '2018-09-10 17:48:33'),
(455, 41, 42, 'Your wallet has been debited with INR 1 on 10-09-2018 10:48 AM as teleconsultation fees for Dr Aj.', 1, '2018-09-10 17:48:33', '2018-09-10 17:48:33'),
(456, 42, 41, 'Patient Azra has successfully completed teleconsultation with you on 10-09-2018 10:48 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-10 17:48:33', '2018-09-10 17:48:33'),
(457, 42, 42, 'You have successfully debited INR 1 in your wallet on 10-09-2018 11:07 AM.', 1, '2018-09-10 18:07:09', '2018-09-10 18:07:09'),
(458, 41, 42, 'Your wallet has been debited with INR 1 on 10-09-2018 11:07 AM as teleconsultation fees for Dr Aj.', 1, '2018-09-10 18:07:10', '2018-09-10 18:07:10'),
(459, 42, 41, 'Patient Azra has successfully completed teleconsultation with you on 10-09-2018 11:07 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-10 18:07:10', '2018-09-10 18:07:10'),
(460, 41, 42, 'You have successfully completed video teleconsultation with Aj on 10-09-2018 11:07 am.Please wait for the e-prescription.', 1, '2018-09-10 18:07:10', '2018-09-10 18:07:10'),
(461, 42, 41, 'Patient Azra has successfully completed teleconsultation with you on 10-09-2018 11:07 am.Please write e-prescription and Diagnosis.', 1, '2018-09-10 18:07:10', '2018-09-10 18:07:10'),
(462, 30, 30, 'You have successfully debited INR 3 in your wallet on 10-09-2018 02:16 PM.', 1, '2018-09-10 21:16:42', '2018-09-10 21:16:42'),
(463, 31, 30, 'Your wallet has been debited with INR 3 on 10-09-2018 02:16 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-10 21:16:42', '2018-09-10 21:16:42'),
(464, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 10-09-2018 02:16 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-10 21:16:42', '2018-09-10 21:16:42'),
(465, 31, 30, 'You have successfully completed video teleconsultation with Navneet Goyal on 10-09-2018 02:16 pm.Please wait for the e-prescription.', 1, '2018-09-10 21:16:43', '2018-09-10 21:16:43'),
(466, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 10-09-2018 02:16 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-10 21:16:43', '2018-09-10 21:16:43'),
(467, 32, 38, 'Patient Patient has chosen you as the Care Coach on 10-09-2018 04:52 pm.', 1, '2018-09-10 23:52:27', '2018-09-10 23:52:27'),
(468, 32, 37, 'Patient Patient has chosen you as the preferred Doctor on 10-09-2018 04:52 pm.', 1, '2018-09-10 23:52:27', '2018-09-10 23:52:27'),
(469, 32, 34, 'Patient Patient has chosen you as the Care Coach on 10-09-2018 04:54 pm.', 1, '2018-09-10 23:54:55', '2018-09-10 23:54:55'),
(470, 32, 37, 'Patient Patient has chosen you as the preferred Doctor on 10-09-2018 04:54 pm.', 1, '2018-09-10 23:54:55', '2018-09-10 23:54:55'),
(471, 42, 43, 'Patient Azra has chosen you as the Care Coach on 11-09-2018 12:17 pm.', 1, '2018-09-11 19:17:05', '2018-09-11 19:17:05'),
(472, 42, 43, 'Patient Azra has chosen you as the Care Coach on 11-09-2018 12:17 pm.', 1, '2018-09-11 19:17:05', '2018-09-11 19:17:05'),
(473, 42, 41, 'Patient Azra has chosen you as the preferred Doctor on 11-09-2018 12:17 pm.', 1, '2018-09-11 19:17:05', '2018-09-11 19:17:05'),
(474, 42, 41, 'Patient Azra has chosen you as the preferred Doctor on 11-09-2018 12:17 pm.', 1, '2018-09-11 19:17:05', '2018-09-11 19:17:05'),
(475, 36, 36, 'You have successfully debited INR 1 in your wallet on 13-09-2018 01:47 PM.', 1, '2018-09-13 20:47:47', '2018-09-13 20:47:47'),
(476, 31, 36, 'Your wallet has been debited with INR 1 on 13-09-2018 01:47 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-13 20:47:47', '2018-09-13 20:47:47'),
(477, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 01:47 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 20:47:47', '2018-09-13 20:47:47'),
(478, 31, 36, 'You have successfully completed video teleconsultation with Navneet Goyal on 13-09-2018 01:47 pm.Please wait for the e-prescription.', 1, '2018-09-13 20:47:48', '2018-09-13 20:47:48'),
(479, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 01:47 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 20:47:48', '2018-09-13 20:47:48'),
(480, 36, 36, 'You have successfully debited INR 1 in your wallet on 13-09-2018 01:48 PM.', 1, '2018-09-13 20:48:54', '2018-09-13 20:48:54'),
(481, 31, 36, 'Your wallet has been debited with INR 1 on 13-09-2018 01:48 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-13 20:48:54', '2018-09-13 20:48:54'),
(482, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 01:48 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 20:48:54', '2018-09-13 20:48:54'),
(483, 31, 36, 'You have successfully completed video teleconsultation with Navneet Goyal on 13-09-2018 01:48 pm.Please wait for the e-prescription.', 1, '2018-09-13 20:48:55', '2018-09-13 20:48:55'),
(484, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 01:48 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 20:48:55', '2018-09-13 20:48:55'),
(485, 36, 36, 'You have successfully debited INR 1 in your wallet on 13-09-2018 01:49 PM.', 1, '2018-09-13 20:49:35', '2018-09-13 20:49:35'),
(486, 31, 36, 'Your wallet has been debited with INR 1 on 13-09-2018 01:49 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-13 20:49:35', '2018-09-13 20:49:35'),
(487, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 01:49 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 20:49:35', '2018-09-13 20:49:35'),
(488, 31, 36, 'You have successfully completed video teleconsultation with Navneet Goyal on 13-09-2018 01:49 pm.Please wait for the e-prescription.', 1, '2018-09-13 20:49:36', '2018-09-13 20:49:36'),
(489, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 01:49 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 20:49:36', '2018-09-13 20:49:36'),
(490, 36, 36, 'You have successfully debited INR 1 in your wallet on 13-09-2018 01:50 PM.', 1, '2018-09-13 20:50:19', '2018-09-13 20:50:19'),
(491, 31, 36, 'Your wallet has been debited with INR 1 on 13-09-2018 01:50 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-13 20:50:19', '2018-09-13 20:50:19'),
(492, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 01:50 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 20:50:19', '2018-09-13 20:50:19'),
(493, 31, 36, 'You have successfully completed video teleconsultation with Navneet Goyal on 13-09-2018 01:50 pm.Please wait for the e-prescription.', 1, '2018-09-13 20:50:19', '2018-09-13 20:50:19'),
(494, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 01:50 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 20:50:19', '2018-09-13 20:50:19'),
(495, 36, 36, 'You have successfully debited INR 1 in your wallet on 13-09-2018 01:52 PM.', 1, '2018-09-13 20:52:00', '2018-09-13 20:52:00'),
(496, 31, 36, 'Your wallet has been debited with INR 1 on 13-09-2018 01:52 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-13 20:52:00', '2018-09-13 20:52:00'),
(497, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 01:52 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 20:52:01', '2018-09-13 20:52:01'),
(498, 31, 36, 'You have successfully completed video teleconsultation with Navneet Goyal on 13-09-2018 01:52 pm.Please wait for the e-prescription.', 1, '2018-09-13 20:52:01', '2018-09-13 20:52:01'),
(499, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 01:52 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 20:52:01', '2018-09-13 20:52:01'),
(500, 36, 36, 'You have successfully debited INR 1 in your wallet on 13-09-2018 02:21 PM.', 1, '2018-09-13 21:22:00', '2018-09-13 21:22:00'),
(501, 31, 36, 'Your wallet has been debited with INR 1 on 13-09-2018 02:22 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-13 21:22:00', '2018-09-13 21:22:00'),
(502, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 02:22 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 21:22:00', '2018-09-13 21:22:00'),
(503, 31, 36, 'You have successfully completed video teleconsultation with Navneet Goyal on 13-09-2018 02:22 pm.Please wait for the e-prescription.', 1, '2018-09-13 21:22:01', '2018-09-13 21:22:01'),
(504, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 02:22 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 21:22:01', '2018-09-13 21:22:01'),
(505, 36, 36, 'You have successfully debited INR 1 in your wallet on 13-09-2018 02:22 PM.', 1, '2018-09-13 21:22:21', '2018-09-13 21:22:21'),
(506, 31, 36, 'Your wallet has been debited with INR 1 on 13-09-2018 02:22 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-13 21:22:21', '2018-09-13 21:22:21'),
(507, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 02:22 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 21:22:21', '2018-09-13 21:22:21'),
(508, 31, 36, 'You have successfully completed video teleconsultation with Navneet Goyal on 13-09-2018 02:22 pm.Please wait for the e-prescription.', 1, '2018-09-13 21:22:22', '2018-09-13 21:22:22'),
(509, 36, 31, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 02:22 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 21:22:22', '2018-09-13 21:22:22'),
(510, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 03:28 PM.', 1, '2018-09-13 22:28:58', '2018-09-13 22:28:58'),
(511, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 03:28 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 22:28:58', '2018-09-13 22:28:58'),
(512, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 03:28 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 22:28:58', '2018-09-13 22:28:58'),
(513, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 03:28 pm.Please wait for the e-prescription.', 1, '2018-09-13 22:28:58', '2018-09-13 22:28:58'),
(514, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 03:28 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 22:28:58', '2018-09-13 22:28:58'),
(515, 36, 36, 'You have successfully credited INR 34 in your wallet on 13-09-2018 03:52 PM.', 1, '2018-09-13 22:52:48', '2018-09-13 22:52:48'),
(516, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 03:53 PM.', 1, '2018-09-13 22:53:18', '2018-09-13 22:53:18'),
(517, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 03:53 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 22:53:18', '2018-09-13 22:53:18'),
(518, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 03:53 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 22:53:18', '2018-09-13 22:53:18'),
(519, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 03:53 pm.Please wait for the e-prescription.', 1, '2018-09-13 22:53:18', '2018-09-13 22:53:18'),
(520, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 03:53 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 22:53:18', '2018-09-13 22:53:18'),
(521, 36, 36, 'You have successfully credited INR 55 in your wallet on 13-09-2018 03:54 PM.', 1, '2018-09-13 22:54:41', '2018-09-13 22:54:41'),
(522, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 03:55 PM.', 1, '2018-09-13 22:55:23', '2018-09-13 22:55:23'),
(523, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 03:55 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 22:55:23', '2018-09-13 22:55:23'),
(524, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 03:55 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 22:55:23', '2018-09-13 22:55:23'),
(525, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 03:55 pm.Please wait for the e-prescription.', 1, '2018-09-13 22:55:23', '2018-09-13 22:55:23'),
(526, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 03:55 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 22:55:23', '2018-09-13 22:55:23'),
(527, 36, 36, 'You have successfully credited INR 300 in your wallet on 13-09-2018 03:58 PM.', 1, '2018-09-13 22:58:03', '2018-09-13 22:58:03'),
(528, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 03:59 PM.', 1, '2018-09-13 22:59:24', '2018-09-13 22:59:24'),
(529, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 03:59 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 22:59:24', '2018-09-13 22:59:24'),
(530, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 03:59 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 22:59:24', '2018-09-13 22:59:24'),
(531, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 03:59 pm.Please wait for the e-prescription.', 1, '2018-09-13 22:59:25', '2018-09-13 22:59:25'),
(532, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 03:59 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 22:59:25', '2018-09-13 22:59:25'),
(533, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:02 PM.', 1, '2018-09-13 23:02:18', '2018-09-13 23:02:18'),
(534, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 04:02 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:02:18', '2018-09-13 23:02:18'),
(535, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:02 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:02:18', '2018-09-13 23:02:18'),
(536, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:02 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:02:19', '2018-09-13 23:02:19'),
(537, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:02 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:02:19', '2018-09-13 23:02:19'),
(538, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:14 PM.', 1, '2018-09-13 23:14:02', '2018-09-13 23:14:02'),
(539, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 04:14 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:14:02', '2018-09-13 23:14:02'),
(540, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:14 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:14:02', '2018-09-13 23:14:02'),
(541, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:14 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:14:03', '2018-09-13 23:14:03'),
(542, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:14 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:14:03', '2018-09-13 23:14:03'),
(543, 32, 32, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:15 PM.', 1, '2018-09-13 23:15:53', '2018-09-13 23:15:53'),
(544, 37, 32, 'Your wallet has been debited with INR 55 on 13-09-2018 04:15 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:15:53', '2018-09-13 23:15:53'),
(545, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:15 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:15:53', '2018-09-13 23:15:53'),
(546, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:15 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:15:53', '2018-09-13 23:15:53'),
(547, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:15 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:15:53', '2018-09-13 23:15:53'),
(548, 42, 43, 'Patient Azra has chosen you as the Care Coach on 13-09-2018 04:18 pm.', 1, '2018-09-13 23:18:08', '2018-09-13 23:18:08'),
(549, 42, 37, 'Patient Azra has chosen you as the preferred Doctor on 13-09-2018 04:18 pm.', 1, '2018-09-13 23:18:08', '2018-09-13 23:18:08'),
(550, 42, 42, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:19 PM.', 1, '2018-09-13 23:19:42', '2018-09-13 23:19:42'),
(551, 37, 42, 'Your wallet has been debited with INR 55 on 13-09-2018 04:19 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:19:42', '2018-09-13 23:19:42'),
(552, 42, 37, 'Patient Azra has successfully completed teleconsultation with you on 13-09-2018 04:19 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:19:42', '2018-09-13 23:19:42'),
(553, 37, 42, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:19 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:19:42', '2018-09-13 23:19:42'),
(554, 42, 37, 'Patient Azra has successfully completed teleconsultation with you on 13-09-2018 04:19 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:19:42', '2018-09-13 23:19:42'),
(555, 32, 32, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:22 PM.', 1, '2018-09-13 23:22:58', '2018-09-13 23:22:58'),
(556, 37, 32, 'Your wallet has been debited with INR 55 on 13-09-2018 04:22 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:22:59', '2018-09-13 23:22:59'),
(557, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:22 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:22:59', '2018-09-13 23:22:59'),
(558, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:22 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:22:59', '2018-09-13 23:22:59'),
(559, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:22 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:22:59', '2018-09-13 23:22:59'),
(560, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:23 PM.', 1, '2018-09-13 23:23:35', '2018-09-13 23:23:35'),
(561, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 04:23 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:23:35', '2018-09-13 23:23:35'),
(562, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:23 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:23:35', '2018-09-13 23:23:35'),
(563, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:23 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:23:36', '2018-09-13 23:23:36'),
(564, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:23 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:23:36', '2018-09-13 23:23:36'),
(565, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:24 PM.', 1, '2018-09-13 23:24:49', '2018-09-13 23:24:49'),
(566, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 04:24 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:24:49', '2018-09-13 23:24:49'),
(567, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:24 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:24:49', '2018-09-13 23:24:49'),
(568, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:24 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:24:49', '2018-09-13 23:24:49'),
(569, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:24 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:24:49', '2018-09-13 23:24:49'),
(570, 36, 36, 'You have successfully credited INR 30 in your wallet on 13-09-2018 04:25 PM.', 1, '2018-09-13 23:25:05', '2018-09-13 23:25:05'),
(571, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:25 PM.', 1, '2018-09-13 23:25:20', '2018-09-13 23:25:20'),
(572, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 04:25 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:25:21', '2018-09-13 23:25:21'),
(573, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:25 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:25:21', '2018-09-13 23:25:21'),
(574, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:25 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:25:21', '2018-09-13 23:25:21'),
(575, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:25 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:25:21', '2018-09-13 23:25:21'),
(576, 32, 32, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:25 PM.', 1, '2018-09-13 23:25:52', '2018-09-13 23:25:52'),
(577, 37, 32, 'Your wallet has been debited with INR 55 on 13-09-2018 04:25 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:25:52', '2018-09-13 23:25:52'),
(578, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:25 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:25:52', '2018-09-13 23:25:52'),
(579, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:25 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:25:52', '2018-09-13 23:25:52'),
(580, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:25 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:25:53', '2018-09-13 23:25:53'),
(581, 42, 42, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:26 PM.', 1, '2018-09-13 23:26:46', '2018-09-13 23:26:46'),
(582, 37, 42, 'Your wallet has been debited with INR 55 on 13-09-2018 04:26 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:26:47', '2018-09-13 23:26:47'),
(583, 42, 37, 'Patient Azra has successfully completed teleconsultation with you on 13-09-2018 04:26 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:26:47', '2018-09-13 23:26:47'),
(584, 37, 42, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:26 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:26:47', '2018-09-13 23:26:47'),
(585, 42, 37, 'Patient Azra has successfully completed teleconsultation with you on 13-09-2018 04:26 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:26:47', '2018-09-13 23:26:47');
INSERT INTO `notification` (`id`, `from_id`, `to_id`, `notification_description`, `status`, `created_at`, `updated_at`) VALUES
(586, 36, 36, 'You have successfully credited INR 55 in your wallet on 13-09-2018 04:27 PM.', 1, '2018-09-13 23:27:34', '2018-09-13 23:27:34'),
(587, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:27 PM.', 1, '2018-09-13 23:27:45', '2018-09-13 23:27:45'),
(588, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 04:27 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:27:45', '2018-09-13 23:27:45'),
(589, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:27 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:27:45', '2018-09-13 23:27:45'),
(590, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:27 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:27:46', '2018-09-13 23:27:46'),
(591, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:27 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:27:46', '2018-09-13 23:27:46'),
(592, 32, 32, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:32 PM.', 1, '2018-09-13 23:32:00', '2018-09-13 23:32:00'),
(593, 37, 32, 'Your wallet has been debited with INR 55 on 13-09-2018 04:32 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:32:00', '2018-09-13 23:32:00'),
(594, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:32 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:32:00', '2018-09-13 23:32:00'),
(595, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:32 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:32:00', '2018-09-13 23:32:00'),
(596, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:32 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:32:00', '2018-09-13 23:32:00'),
(597, 36, 36, 'You have successfully credited INR 200 in your wallet on 13-09-2018 04:32 PM.', 1, '2018-09-13 23:32:42', '2018-09-13 23:32:42'),
(598, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:33 PM.', 1, '2018-09-13 23:33:25', '2018-09-13 23:33:25'),
(599, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 04:33 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:33:25', '2018-09-13 23:33:25'),
(600, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:33 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:33:25', '2018-09-13 23:33:25'),
(601, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:33 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:33:26', '2018-09-13 23:33:26'),
(602, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:33 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:33:26', '2018-09-13 23:33:26'),
(603, 32, 32, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:34 PM.', 1, '2018-09-13 23:34:25', '2018-09-13 23:34:25'),
(604, 37, 32, 'Your wallet has been debited with INR 55 on 13-09-2018 04:34 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:34:25', '2018-09-13 23:34:25'),
(605, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:34 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:34:25', '2018-09-13 23:34:25'),
(606, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:34 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:34:26', '2018-09-13 23:34:26'),
(607, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:34 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:34:26', '2018-09-13 23:34:26'),
(608, 32, 32, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:34 PM.', 1, '2018-09-13 23:34:54', '2018-09-13 23:34:54'),
(609, 37, 32, 'Your wallet has been debited with INR 55 on 13-09-2018 04:34 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:34:54', '2018-09-13 23:34:54'),
(610, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:34 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:34:54', '2018-09-13 23:34:54'),
(611, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:34 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:34:55', '2018-09-13 23:34:55'),
(612, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:34 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:34:55', '2018-09-13 23:34:55'),
(613, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:38 PM.', 1, '2018-09-13 23:38:24', '2018-09-13 23:38:24'),
(614, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 04:38 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:38:24', '2018-09-13 23:38:24'),
(615, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:38 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:38:24', '2018-09-13 23:38:24'),
(616, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:38 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:38:25', '2018-09-13 23:38:25'),
(617, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:38 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:38:25', '2018-09-13 23:38:25'),
(618, 32, 32, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:40 PM.', 1, '2018-09-13 23:40:24', '2018-09-13 23:40:24'),
(619, 37, 32, 'Your wallet has been debited with INR 55 on 13-09-2018 04:40 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:40:25', '2018-09-13 23:40:25'),
(620, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:40 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:40:25', '2018-09-13 23:40:25'),
(621, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:40 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:40:25', '2018-09-13 23:40:25'),
(622, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:40 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:40:25', '2018-09-13 23:40:25'),
(623, 32, 32, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:40 PM.', 1, '2018-09-13 23:40:54', '2018-09-13 23:40:54'),
(624, 37, 32, 'Your wallet has been debited with INR 55 on 13-09-2018 04:40 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:40:54', '2018-09-13 23:40:54'),
(625, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:40 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:40:54', '2018-09-13 23:40:54'),
(626, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:40 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:40:54', '2018-09-13 23:40:54'),
(627, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 04:40 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:40:54', '2018-09-13 23:40:54'),
(628, 36, 36, 'You have successfully debited INR 55 in your wallet on 13-09-2018 04:41 PM.', 1, '2018-09-13 23:41:40', '2018-09-13 23:41:40'),
(629, 37, 36, 'Your wallet has been debited with INR 55 on 13-09-2018 04:41 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-13 23:41:47', '2018-09-13 23:41:47'),
(630, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:41 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:41:47', '2018-09-13 23:41:47'),
(631, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 04:41 pm.Please wait for the e-prescription.', 1, '2018-09-13 23:41:47', '2018-09-13 23:41:47'),
(632, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 13-09-2018 04:41 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-13 23:41:47', '2018-09-13 23:41:47'),
(633, 32, 32, 'You have successfully debited INR 55 in your wallet on 13-09-2018 05:05 PM.', 1, '2018-09-14 00:05:47', '2018-09-14 00:05:47'),
(634, 37, 32, 'Your wallet has been debited with INR 55 on 13-09-2018 05:05 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-14 00:05:48', '2018-09-14 00:05:48'),
(635, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 05:05 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-14 00:05:48', '2018-09-14 00:05:48'),
(636, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 05:05 pm.Please wait for the e-prescription.', 1, '2018-09-14 00:05:48', '2018-09-14 00:05:48'),
(637, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 05:05 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-14 00:05:48', '2018-09-14 00:05:48'),
(638, 32, 32, 'You have successfully debited INR 55 in your wallet on 13-09-2018 05:07 PM.', 1, '2018-09-14 00:07:29', '2018-09-14 00:07:29'),
(639, 37, 32, 'Your wallet has been debited with INR 55 on 13-09-2018 05:07 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-14 00:07:30', '2018-09-14 00:07:30'),
(640, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 05:07 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-14 00:07:30', '2018-09-14 00:07:30'),
(641, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 13-09-2018 05:07 pm.Please wait for the e-prescription.', 1, '2018-09-14 00:07:30', '2018-09-14 00:07:30'),
(642, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 13-09-2018 05:07 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-14 00:07:30', '2018-09-14 00:07:30'),
(643, 30, 30, 'You have successfully debited INR 1 in your wallet on 14-09-2018 10:50 AM.', 1, '2018-09-14 17:50:57', '2018-09-14 17:50:57'),
(644, 31, 30, 'Your wallet has been debited with INR 1 on 14-09-2018 10:50 AM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-14 17:50:58', '2018-09-14 17:50:58'),
(645, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 14-09-2018 10:50 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-14 17:50:58', '2018-09-14 17:50:58'),
(646, 31, 30, 'You have successfully completed video teleconsultation with Navneet Goyal on 14-09-2018 10:50 am.Please wait for the e-prescription.', 1, '2018-09-14 17:50:59', '2018-09-14 17:50:59'),
(647, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 14-09-2018 10:50 am.Please write e-prescription and Diagnosis.', 1, '2018-09-14 17:50:59', '2018-09-14 17:50:59'),
(648, 30, 30, 'You have successfully debited INR 1 in your wallet on 14-09-2018 11:05 AM.', 1, '2018-09-14 18:05:48', '2018-09-14 18:05:48'),
(649, 31, 30, 'Your wallet has been debited with INR 1 on 14-09-2018 11:05 AM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-14 18:05:48', '2018-09-14 18:05:48'),
(650, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 14-09-2018 11:05 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-14 18:05:48', '2018-09-14 18:05:48'),
(651, 31, 30, 'You have successfully completed video teleconsultation with Navneet Goyal on 14-09-2018 11:05 am.Please wait for the e-prescription.', 1, '2018-09-14 18:05:49', '2018-09-14 18:05:49'),
(652, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 14-09-2018 11:05 am.Please write e-prescription and Diagnosis.', 1, '2018-09-14 18:05:49', '2018-09-14 18:05:49'),
(653, 36, 36, 'You have successfully debited INR 55 in your wallet on 17-09-2018 10:52 AM.', 1, '2018-09-17 17:52:49', '2018-09-17 17:52:49'),
(654, 37, 36, 'Your wallet has been debited with INR 55 on 17-09-2018 10:52 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 17:52:50', '2018-09-17 17:52:50'),
(655, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 10:52 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 17:52:50', '2018-09-17 17:52:50'),
(656, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 10:52 am.Please wait for the e-prescription.', 1, '2018-09-17 17:52:50', '2018-09-17 17:52:50'),
(657, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 10:52 am.Please write e-prescription and Diagnosis.', 1, '2018-09-17 17:52:50', '2018-09-17 17:52:50'),
(658, 36, 36, 'You have successfully credited INR 75 in your wallet on 17-09-2018 10:53 AM.', 1, '2018-09-17 17:53:39', '2018-09-17 17:53:39'),
(659, 36, 36, 'You have successfully debited INR 55 in your wallet on 17-09-2018 10:54 AM.', 1, '2018-09-17 17:54:18', '2018-09-17 17:54:18'),
(660, 37, 36, 'Your wallet has been debited with INR 55 on 17-09-2018 10:54 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 17:54:19', '2018-09-17 17:54:19'),
(661, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 10:54 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 17:54:20', '2018-09-17 17:54:20'),
(662, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 10:54 am.Please wait for the e-prescription.', 1, '2018-09-17 17:54:22', '2018-09-17 17:54:22'),
(663, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 10:54 am.Please write e-prescription and Diagnosis.', 1, '2018-09-17 17:54:22', '2018-09-17 17:54:22'),
(664, 32, 32, 'You have successfully debited INR 55 in your wallet on 17-09-2018 11:02 AM.', 1, '2018-09-17 18:02:43', '2018-09-17 18:02:43'),
(665, 37, 32, 'Your wallet has been debited with INR 55 on 17-09-2018 11:02 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 18:02:43', '2018-09-17 18:02:43'),
(666, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 11:02 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 18:02:43', '2018-09-17 18:02:43'),
(667, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 11:02 am.Please wait for the e-prescription.', 1, '2018-09-17 18:02:44', '2018-09-17 18:02:44'),
(668, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 11:02 am.Please write e-prescription and Diagnosis.', 1, '2018-09-17 18:02:44', '2018-09-17 18:02:44'),
(669, 36, 36, 'You have successfully credited INR 55 in your wallet on 17-09-2018 11:12 AM.', 1, '2018-09-17 18:12:37', '2018-09-17 18:12:37'),
(670, 36, 36, 'You have successfully debited INR 55 in your wallet on 17-09-2018 11:13 AM.', 1, '2018-09-17 18:13:11', '2018-09-17 18:13:11'),
(671, 37, 36, 'Your wallet has been debited with INR 55 on 17-09-2018 11:13 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 18:13:11', '2018-09-17 18:13:11'),
(672, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 11:13 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 18:13:11', '2018-09-17 18:13:11'),
(673, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 11:13 am.Please wait for the e-prescription.', 1, '2018-09-17 18:13:12', '2018-09-17 18:13:12'),
(674, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 11:13 am.Please write e-prescription and Diagnosis.', 1, '2018-09-17 18:13:12', '2018-09-17 18:13:12'),
(675, 36, 36, 'You have successfully credited INR 55 in your wallet on 17-09-2018 11:14 AM.', 1, '2018-09-17 18:14:03', '2018-09-17 18:14:03'),
(676, 36, 36, 'You have successfully debited INR 55 in your wallet on 17-09-2018 11:14 AM.', 1, '2018-09-17 18:14:17', '2018-09-17 18:14:17'),
(677, 37, 36, 'Your wallet has been debited with INR 55 on 17-09-2018 11:14 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 18:14:18', '2018-09-17 18:14:18'),
(678, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 11:14 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 18:14:18', '2018-09-17 18:14:18'),
(679, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 11:14 am.Please wait for the e-prescription.', 1, '2018-09-17 18:14:18', '2018-09-17 18:14:18'),
(680, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 11:14 am.Please write e-prescription and Diagnosis.', 1, '2018-09-17 18:14:18', '2018-09-17 18:14:18'),
(681, 32, 32, 'You have successfully debited INR 55 in your wallet on 17-09-2018 11:16 AM.', 1, '2018-09-17 18:16:56', '2018-09-17 18:16:56'),
(682, 32, 32, 'You have successfully debited INR 55 in your wallet on 17-09-2018 11:18 AM.', 1, '2018-09-17 18:18:40', '2018-09-17 18:18:40'),
(683, 37, 32, 'Your wallet has been debited with INR 55 on 17-09-2018 11:18 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 18:18:40', '2018-09-17 18:18:40'),
(684, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 11:18 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 18:18:40', '2018-09-17 18:18:40'),
(685, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 11:18 am.Please wait for the e-prescription.', 1, '2018-09-17 18:18:40', '2018-09-17 18:18:40'),
(686, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 11:18 am.Please write e-prescription and Diagnosis.', 1, '2018-09-17 18:18:40', '2018-09-17 18:18:40'),
(687, 36, 36, 'You have successfully credited INR 55 in your wallet on 17-09-2018 11:19 AM.', 1, '2018-09-17 18:19:45', '2018-09-17 18:19:45'),
(688, 36, 36, 'You have successfully debited INR 55 in your wallet on 17-09-2018 11:20 AM.', 1, '2018-09-17 18:20:05', '2018-09-17 18:20:05'),
(689, 37, 36, 'Your wallet has been debited with INR 55 on 17-09-2018 11:20 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 18:20:06', '2018-09-17 18:20:06'),
(690, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 11:20 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 18:20:06', '2018-09-17 18:20:06'),
(691, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 11:20 am.Please wait for the e-prescription.', 1, '2018-09-17 18:20:06', '2018-09-17 18:20:06'),
(692, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 11:20 am.Please write e-prescription and Diagnosis.', 1, '2018-09-17 18:20:06', '2018-09-17 18:20:06'),
(693, 36, 36, 'You have successfully credited INR 55 in your wallet on 17-09-2018 11:25 AM.', 1, '2018-09-17 18:25:59', '2018-09-17 18:25:59'),
(694, 36, 36, 'You have successfully debited INR 55 in your wallet on 17-09-2018 11:30 AM.', 1, '2018-09-17 18:30:17', '2018-09-17 18:30:17'),
(695, 37, 36, 'Your wallet has been debited with INR 55 on 17-09-2018 11:30 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 18:30:17', '2018-09-17 18:30:17'),
(696, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 11:30 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 18:30:17', '2018-09-17 18:30:17'),
(697, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 11:30 am.Please wait for the e-prescription.', 1, '2018-09-17 18:30:17', '2018-09-17 18:30:17'),
(698, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 11:30 am.Please write e-prescription and Diagnosis.', 1, '2018-09-17 18:30:17', '2018-09-17 18:30:17'),
(699, 36, 36, 'You have successfully credited INR 55 in your wallet on 17-09-2018 12:00 PM.', 1, '2018-09-17 19:00:55', '2018-09-17 19:00:55'),
(700, 36, 36, 'You have successfully debited INR 55 in your wallet on 17-09-2018 12:02 PM.', 1, '2018-09-17 19:02:42', '2018-09-17 19:02:42'),
(701, 37, 36, 'Your wallet has been debited with INR 55 on 17-09-2018 12:02 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 19:02:44', '2018-09-17 19:02:44'),
(702, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 12:02 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:02:44', '2018-09-17 19:02:44'),
(703, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 12:02 pm.Please wait for the e-prescription.', 1, '2018-09-17 19:02:44', '2018-09-17 19:02:44'),
(704, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 12:02 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:02:44', '2018-09-17 19:02:44'),
(705, 36, 36, 'You have successfully credited INR 55 in your wallet on 17-09-2018 12:03 PM.', 1, '2018-09-17 19:03:48', '2018-09-17 19:03:48'),
(706, 36, 36, 'You have successfully debited INR 55 in your wallet on 17-09-2018 12:04 PM.', 1, '2018-09-17 19:05:00', '2018-09-17 19:05:00'),
(707, 32, 32, 'You have successfully debited INR 55 in your wallet on 17-09-2018 12:06 PM.', 1, '2018-09-17 19:06:01', '2018-09-17 19:06:01'),
(708, 37, 32, 'Your wallet has been debited with INR 55 on 17-09-2018 12:06 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 19:06:01', '2018-09-17 19:06:01'),
(709, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 12:06 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:06:01', '2018-09-17 19:06:01'),
(710, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 12:06 pm.Please wait for the e-prescription.', 1, '2018-09-17 19:06:01', '2018-09-17 19:06:01'),
(711, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 12:06 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:06:01', '2018-09-17 19:06:01'),
(712, 32, 32, 'You have successfully debited INR 55 in your wallet on 17-09-2018 12:09 PM.', 1, '2018-09-17 19:09:04', '2018-09-17 19:09:04'),
(713, 37, 32, 'Your wallet has been debited with INR 55 on 17-09-2018 12:09 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 19:09:05', '2018-09-17 19:09:05'),
(714, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 12:09 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:09:05', '2018-09-17 19:09:05'),
(715, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 12:09 pm.Please wait for the e-prescription.', 1, '2018-09-17 19:09:05', '2018-09-17 19:09:05'),
(716, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 12:09 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:09:05', '2018-09-17 19:09:05'),
(717, 36, 36, 'You have successfully credited INR 55 in your wallet on 17-09-2018 12:09 PM.', 1, '2018-09-17 19:09:50', '2018-09-17 19:09:50'),
(718, 36, 36, 'You have successfully debited INR 55 in your wallet on 17-09-2018 12:09 PM.', 1, '2018-09-17 19:09:59', '2018-09-17 19:09:59'),
(719, 37, 36, 'Your wallet has been debited with INR 55 on 17-09-2018 12:09 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 19:09:59', '2018-09-17 19:09:59'),
(720, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 12:09 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:09:59', '2018-09-17 19:09:59'),
(721, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 12:10 pm.Please wait for the e-prescription.', 1, '2018-09-17 19:10:00', '2018-09-17 19:10:00'),
(722, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 12:10 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:10:01', '2018-09-17 19:10:01'),
(723, 36, 36, 'You have successfully credited INR 55 in your wallet on 17-09-2018 12:10 PM.', 1, '2018-09-17 19:10:22', '2018-09-17 19:10:22'),
(724, 36, 36, 'You have successfully debited INR 55 in your wallet on 17-09-2018 12:10 PM.', 1, '2018-09-17 19:10:36', '2018-09-17 19:10:36'),
(725, 37, 36, 'Your wallet has been debited with INR 55 on 17-09-2018 12:10 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 19:10:36', '2018-09-17 19:10:36'),
(726, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 12:10 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:10:36', '2018-09-17 19:10:36'),
(727, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 12:10 pm.Please wait for the e-prescription.', 1, '2018-09-17 19:10:36', '2018-09-17 19:10:36'),
(728, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 12:10 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:10:36', '2018-09-17 19:10:36'),
(729, 32, 32, 'You have successfully debited INR 55 in your wallet on 17-09-2018 12:17 PM.', 1, '2018-09-17 19:17:28', '2018-09-17 19:17:28'),
(730, 37, 32, 'Your wallet has been debited with INR 55 on 17-09-2018 12:17 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 19:17:28', '2018-09-17 19:17:28'),
(731, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 12:17 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:17:28', '2018-09-17 19:17:28'),
(732, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 12:17 pm.Please wait for the e-prescription.', 1, '2018-09-17 19:17:28', '2018-09-17 19:17:28'),
(733, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 12:17 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:17:28', '2018-09-17 19:17:28'),
(734, 36, 36, 'You have successfully credited INR 55 in your wallet on 17-09-2018 12:18 PM.', 1, '2018-09-17 19:18:32', '2018-09-17 19:18:32'),
(735, 36, 36, 'You have successfully debited INR 55 in your wallet on 17-09-2018 12:18 PM.', 1, '2018-09-17 19:18:50', '2018-09-17 19:18:50'),
(736, 37, 36, 'Your wallet has been debited with INR 55 on 17-09-2018 12:18 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 19:18:50', '2018-09-17 19:18:50'),
(737, 36, 36, 'You have successfully debited INR 55 in your wallet on 17-09-2018 12:19 PM.', 1, '2018-09-17 19:19:27', '2018-09-17 19:19:27'),
(738, 37, 36, 'Your wallet has been debited with INR 55 on 17-09-2018 12:19 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 19:19:27', '2018-09-17 19:19:27'),
(739, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 12:19 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:19:27', '2018-09-17 19:19:27'),
(740, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 12:19 pm.Please wait for the e-prescription.', 1, '2018-09-17 19:19:27', '2018-09-17 19:19:27'),
(741, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 12:19 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:19:27', '2018-09-17 19:19:27'),
(742, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 17-09-2018 12:18 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:19:51', '2018-09-17 19:19:51'),
(743, 36, 36, 'You have successfully credited INR 110 in your wallet on 17-09-2018 12:21 PM.', 1, '2018-09-17 19:21:38', '2018-09-17 19:21:38'),
(744, 32, 32, 'You have successfully debited INR 55 in your wallet on 17-09-2018 12:23 PM.', 1, '2018-09-17 19:23:38', '2018-09-17 19:23:38'),
(745, 37, 32, 'Your wallet has been debited with INR 55 on 17-09-2018 12:23 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 19:23:39', '2018-09-17 19:23:39'),
(746, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 12:23 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:23:40', '2018-09-17 19:23:40'),
(747, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 12:23 pm.Please wait for the e-prescription.', 1, '2018-09-17 19:23:41', '2018-09-17 19:23:41'),
(748, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 12:23 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:23:41', '2018-09-17 19:23:41'),
(749, 32, 32, 'You have successfully debited INR 55 in your wallet on 17-09-2018 12:25 PM.', 1, '2018-09-17 19:25:46', '2018-09-17 19:25:46'),
(750, 37, 32, 'Your wallet has been debited with INR 55 on 17-09-2018 12:25 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 19:25:47', '2018-09-17 19:25:47'),
(751, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 12:25 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:25:48', '2018-09-17 19:25:48'),
(752, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 12:25 pm.Please wait for the e-prescription.', 1, '2018-09-17 19:25:49', '2018-09-17 19:25:49'),
(753, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 12:25 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 19:25:49', '2018-09-17 19:25:49'),
(754, 30, 30, 'You have successfully debited INR 1 in your wallet on 17-09-2018 01:08 PM.', 1, '2018-09-17 20:08:43', '2018-09-17 20:08:43'),
(755, 31, 30, 'Your wallet has been debited with INR 1 on 17-09-2018 01:08 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-17 20:08:44', '2018-09-17 20:08:44'),
(756, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 17-09-2018 01:08 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 20:08:44', '2018-09-17 20:08:44'),
(757, 31, 30, 'You have successfully completed video teleconsultation with Navneet Goyal on 17-09-2018 01:08 pm.Please wait for the e-prescription.', 1, '2018-09-17 20:08:45', '2018-09-17 20:08:45'),
(758, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 17-09-2018 01:08 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 20:08:45', '2018-09-17 20:08:45'),
(759, 32, 32, 'You have successfully debited INR 55 in your wallet on 17-09-2018 01:26 PM.', 1, '2018-09-17 20:26:14', '2018-09-17 20:26:14'),
(760, 37, 32, 'Your wallet has been debited with INR 55 on 17-09-2018 01:26 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 20:26:15', '2018-09-17 20:26:15'),
(761, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 01:26 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 20:26:15', '2018-09-17 20:26:15'),
(762, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 01:26 pm.Please wait for the e-prescription.', 1, '2018-09-17 20:26:15', '2018-09-17 20:26:15'),
(763, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 01:26 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 20:26:15', '2018-09-17 20:26:15'),
(764, 32, 32, 'You have successfully debited INR 55 in your wallet on 17-09-2018 01:58 PM.', 1, '2018-09-17 20:58:11', '2018-09-17 20:58:11'),
(765, 37, 32, 'Your wallet has been debited with INR 55 on 17-09-2018 01:58 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 20:58:12', '2018-09-17 20:58:12'),
(766, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 01:58 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 20:58:12', '2018-09-17 20:58:12'),
(767, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 01:58 pm.Please wait for the e-prescription.', 1, '2018-09-17 20:58:14', '2018-09-17 20:58:14'),
(768, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 01:58 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 20:58:14', '2018-09-17 20:58:14'),
(769, 32, 32, 'You have successfully debited INR 55 in your wallet on 17-09-2018 02:04 PM.', 1, '2018-09-17 21:04:14', '2018-09-17 21:04:14'),
(770, 37, 32, 'Your wallet has been debited with INR 55 on 17-09-2018 02:04 PM as teleconsultation fees for Dr Test docto.', 1, '2018-09-17 21:04:14', '2018-09-17 21:04:14'),
(771, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 02:04 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-17 21:04:14', '2018-09-17 21:04:14'),
(772, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 17-09-2018 02:04 pm.Please wait for the e-prescription.', 1, '2018-09-17 21:04:15', '2018-09-17 21:04:15'),
(773, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 17-09-2018 02:04 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-17 21:04:15', '2018-09-17 21:04:15'),
(774, 30, 30, 'You have successfully debited INR 1 in your wallet on 18-09-2018 06:34 PM.', 1, '2018-09-19 01:34:43', '2018-09-19 01:34:43'),
(775, 31, 30, 'Your wallet has been debited with INR 1 on 18-09-2018 06:34 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-19 01:34:46', '2018-09-19 01:34:46'),
(776, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 18-09-2018 06:34 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-19 01:34:46', '2018-09-19 01:34:46'),
(777, 31, 30, 'You have successfully completed video teleconsultation with Navneet Goyal on 18-09-2018 06:34 pm.Please wait for the e-prescription.', 1, '2018-09-19 01:34:47', '2018-09-19 01:34:47'),
(778, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 18-09-2018 06:34 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-19 01:34:47', '2018-09-19 01:34:47'),
(779, 32, 32, 'You have successfully debited INR 55 in your wallet on 19-09-2018 10:48 AM.', 1, '2018-09-19 17:48:56', '2018-09-19 17:48:56'),
(780, 37, 32, 'Your wallet has been debited with INR 55 on 19-09-2018 10:48 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-19 17:48:57', '2018-09-19 17:48:57'),
(781, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 19-09-2018 10:48 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-19 17:48:58', '2018-09-19 17:48:58'),
(782, 37, 32, 'You have successfully completed video teleconsultation with Test docto on 19-09-2018 10:48 am.Please wait for the e-prescription.', 1, '2018-09-19 17:48:58', '2018-09-19 17:48:58'),
(783, 32, 37, 'Patient Patient has successfully completed teleconsultation with you on 19-09-2018 10:48 am.Please write e-prescription and Diagnosis.', 1, '2018-09-19 17:48:58', '2018-09-19 17:48:58'),
(784, 36, 36, 'You have successfully debited INR 55 in your wallet on 19-09-2018 11:06 AM.', 1, '2018-09-19 18:06:15', '2018-09-19 18:06:15'),
(785, 37, 36, 'Your wallet has been debited with INR 55 on 19-09-2018 11:06 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-19 18:06:15', '2018-09-19 18:06:15'),
(786, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 19-09-2018 11:06 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-19 18:06:16', '2018-09-19 18:06:16'),
(787, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 19-09-2018 11:06 am.Please wait for the e-prescription.', 1, '2018-09-19 18:06:16', '2018-09-19 18:06:16'),
(788, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 19-09-2018 11:06 am.Please write e-prescription and Diagnosis.', 1, '2018-09-19 18:06:17', '2018-09-19 18:06:17'),
(789, 36, 36, 'You have successfully credited INR 1 in your wallet on 19-09-2018 11:08 AM.', 1, '2018-09-19 18:08:34', '2018-09-19 18:08:34'),
(790, 36, 36, 'You have successfully debited INR 1 in your wallet on 19-09-2018 11:18 AM.', 1, '2018-09-19 18:18:49', '2018-09-19 18:18:49'),
(791, 37, 36, 'Your wallet has been debited with INR 1 on 19-09-2018 11:18 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-19 18:18:51', '2018-09-19 18:18:51'),
(792, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 19-09-2018 11:18 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-19 18:19:51', '2018-09-19 18:19:51'),
(793, 36, 36, 'You have successfully debited INR 1 in your wallet on 19-09-2018 11:22 AM.', 1, '2018-09-19 18:22:21', '2018-09-19 18:22:21'),
(794, 37, 36, 'Your wallet has been debited with INR 1 on 19-09-2018 11:22 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-19 18:22:22', '2018-09-19 18:22:22'),
(795, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 19-09-2018 11:22 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-19 18:22:22', '2018-09-19 18:22:22'),
(796, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 19-09-2018 11:22 am.Please wait for the e-prescription.', 1, '2018-09-19 18:22:22', '2018-09-19 18:22:22'),
(797, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 19-09-2018 11:22 am.Please write e-prescription and Diagnosis.', 1, '2018-09-19 18:22:22', '2018-09-19 18:22:22'),
(798, 36, 36, 'You have successfully credited INR 2 in your wallet on 19-09-2018 11:22 AM.', 1, '2018-09-19 18:22:40', '2018-09-19 18:22:40'),
(799, 36, 36, 'You have successfully debited INR 1 in your wallet on 19-09-2018 11:25 AM.', 1, '2018-09-19 18:25:44', '2018-09-19 18:25:44'),
(800, 37, 36, 'Your wallet has been debited with INR 1 on 19-09-2018 11:25 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-19 18:25:44', '2018-09-19 18:25:44'),
(801, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 19-09-2018 11:25 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-19 18:25:44', '2018-09-19 18:25:44'),
(802, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 19-09-2018 11:25 am.Please wait for the e-prescription.', 1, '2018-09-19 18:25:45', '2018-09-19 18:25:45'),
(803, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 19-09-2018 11:25 am.Please write e-prescription and Diagnosis.', 1, '2018-09-19 18:25:45', '2018-09-19 18:25:45'),
(804, 36, 36, 'You have successfully credited INR 1 in your wallet on 19-09-2018 11:27 AM.', 1, '2018-09-19 18:27:36', '2018-09-19 18:27:36'),
(805, 36, 36, 'You have successfully debited INR 1 in your wallet on 19-09-2018 11:37 AM.', 1, '2018-09-19 18:37:49', '2018-09-19 18:37:49'),
(806, 37, 36, 'Your wallet has been debited with INR 1 on 19-09-2018 11:37 AM as teleconsultation fees for Dr Test docto.', 1, '2018-09-19 18:37:49', '2018-09-19 18:37:49'),
(807, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 19-09-2018 11:37 AM.Please write e-prescription and Diagnosis.', 1, '2018-09-19 18:37:49', '2018-09-19 18:37:49'),
(808, 37, 36, 'You have successfully completed video teleconsultation with Test docto on 19-09-2018 11:37 am.Please wait for the e-prescription.', 1, '2018-09-19 18:37:49', '2018-09-19 18:37:49'),
(809, 36, 37, 'Patient Priya has successfully completed teleconsultation with you on 19-09-2018 11:37 am.Please write e-prescription and Diagnosis.', 1, '2018-09-19 18:37:49', '2018-09-19 18:37:49'),
(810, 30, 30, 'You have successfully debited INR 1 in your wallet on 20-09-2018 06:16 PM.', 1, '2018-09-21 01:16:17', '2018-09-21 01:16:17'),
(811, 31, 30, 'Your wallet has been debited with INR 1 on 20-09-2018 06:16 PM as teleconsultation fees for Dr Navneet Goyal.', 1, '2018-09-21 01:16:17', '2018-09-21 01:16:17'),
(812, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 20-09-2018 06:16 PM.Please write e-prescription and Diagnosis.', 1, '2018-09-21 01:16:17', '2018-09-21 01:16:17'),
(813, 31, 30, 'You have successfully completed video teleconsultation with Navneet Goyal on 20-09-2018 06:16 pm.Please wait for the e-prescription.', 1, '2018-09-21 01:16:18', '2018-09-21 01:16:18'),
(814, 30, 31, 'Patient Surabhi has successfully completed teleconsultation with you on 20-09-2018 06:16 pm.Please write e-prescription and Diagnosis.', 1, '2018-09-21 01:16:18', '2018-09-21 01:16:18'),
(815, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 20-09-2018 06:23 PM Please check and follow the instructions.', 1, '2018-09-21 01:23:36', '2018-09-21 01:23:36'),
(816, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 20-09-2018 06:23 PM', 1, '2018-09-21 01:23:36', '2018-09-21 01:23:36'),
(817, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 20-09-2018 06:46 pm Kindly check', 1, '2018-09-21 01:46:44', '2018-09-21 01:46:44'),
(818, 39, 30, 'Your Coach Kiara has added new Procedure Reports to your Records on 20-09-2018 06:47 pm.Kindly check.', 1, '2018-09-21 01:47:25', '2018-09-21 01:47:25'),
(819, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 20-09-2018 06:53 pm Kindly check', 1, '2018-09-21 01:53:01', '2018-09-21 01:53:01'),
(820, 39, 39, 'hELLO Kiara! How are yiu doing?', 0, '2018-09-21 02:14:38', '2018-09-21 02:14:38'),
(821, 31, 31, 'Hello Docnavneetgoyal! Hope youre fine!!!!!!', 0, '2018-09-21 02:15:00', '2018-09-21 02:15:00'),
(822, 32, 38, 'Patient Patient has chosen you as the Care Coach on 21-09-2018 10:51 am.', 1, '2018-09-21 17:51:18', '2018-09-21 17:51:18'),
(823, 32, 37, 'Patient Patient has chosen you as the preferred Doctor on 21-09-2018 10:51 am.', 1, '2018-09-21 17:51:18', '2018-09-21 17:51:18'),
(824, 4, 32, 'Your Coach  has added new Lab Reports to your Records on 24-09-2018 01:14 pm Kindly check', 1, '2018-09-24 20:14:58', '2018-09-24 20:14:58'),
(825, 4, 32, 'Your Coach  has added new Lab Reports to your Records on 24-09-2018 01:15 pm Kindly check', 1, '2018-09-24 20:15:06', '2018-09-24 20:15:06'),
(826, 32, 38, 'Patient Patient has chosen you as the Care Coach on 24-09-2018 01:22 pm.', 1, '2018-09-24 20:22:54', '2018-09-24 20:22:54'),
(827, 32, 37, 'Patient Patient has chosen you as the preferred Doctor on 24-09-2018 01:22 pm.', 1, '2018-09-24 20:22:54', '2018-09-24 20:22:54'),
(828, 4, 32, 'Your Coach  has added new Lab Reports to your Records on 24-09-2018 02:34 pm Kindly check', 1, '2018-09-24 21:34:16', '2018-09-24 21:34:16'),
(829, 38, 32, 'Your Coach Testcoach has added new Lab Reports to your Records on 24-09-2018 02:41 pm Kindly check', 1, '2018-09-24 21:41:27', '2018-09-24 21:41:27'),
(830, 37, 32, 'Dr. Test docto has sent you an e-prescription on 24-09-2018 03:07 PM Please check and follow the instructions.', 1, '2018-09-24 22:07:02', '2018-09-24 22:07:02'),
(831, 37, NULL, 'Dr. Test docto has written an e-prescription to Patient Patient on 24-09-2018 03:07 PM', 1, '2018-09-24 22:07:02', '2018-09-24 22:07:02'),
(832, 38, 32, 'Your Coach Testcoach has added new Procedure Reports to your Records on 24-09-2018 03:08 pm.Kindly check.', 1, '2018-09-24 22:08:12', '2018-09-24 22:08:12'),
(833, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 25-09-2018 03:53 pm Kindly check', 1, '2018-09-25 22:53:08', '2018-09-25 22:53:08'),
(834, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 25-09-2018 03:53 pm Kindly check', 1, '2018-09-25 22:53:28', '2018-09-25 22:53:28'),
(835, 32, 34, 'Patient Patient has chosen you as the Care Coach on 25-09-2018 03:56 pm.', 1, '2018-09-25 22:56:13', '2018-09-25 22:56:13'),
(836, 32, 31, 'Patient Patient has chosen you as the preferred Doctor on 25-09-2018 03:56 pm.', 1, '2018-09-25 22:56:13', '2018-09-25 22:56:13'),
(837, 32, 38, 'Patient Patient has chosen you as the Care Coach on 25-09-2018 03:56 pm.', 1, '2018-09-25 22:56:19', '2018-09-25 22:56:19'),
(838, 32, 37, 'Patient Patient has chosen you as the preferred Doctor on 25-09-2018 03:56 pm.', 1, '2018-09-25 22:56:19', '2018-09-25 22:56:19'),
(839, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 25-09-2018 03:59 pm Kindly check', 1, '2018-09-25 22:59:12', '2018-09-25 22:59:12'),
(840, 39, 30, 'Your Coach Kiara has added new Lab Reports to your Records on 25-09-2018 04:01 pm Kindly check', 1, '2018-09-25 23:01:36', '2018-09-25 23:01:36'),
(841, 39, 30, 'Your Coach Kiara has added new Procedure Reports to your Records on 25-09-2018 04:02 pm.Kindly check.', 1, '2018-09-25 23:02:26', '2018-09-25 23:02:26'),
(842, 37, 32, 'Dr. Test docto has sent you an e-prescription on 25-09-2018 04:05 PM Please check and follow the instructions.', 1, '2018-09-25 23:05:46', '2018-09-25 23:05:46'),
(843, 37, NULL, 'Dr. Test docto has written an e-prescription to Patient Patient on 25-09-2018 04:05 PM', 1, '2018-09-25 23:05:46', '2018-09-25 23:05:46'),
(844, 37, 32, 'Dr. Test docto has sent you an e-prescription on 25-09-2018 04:05 PM Please check and follow the instructions.', 1, '2018-09-25 23:05:50', '2018-09-25 23:05:50'),
(845, 37, NULL, 'Dr. Test docto has written an e-prescription to Patient Patient on 25-09-2018 04:05 PM', 1, '2018-09-25 23:05:50', '2018-09-25 23:05:50'),
(846, 37, 32, 'Dr. Test docto has sent you an e-prescription on 25-09-2018 04:06 PM Please check and follow the instructions.', 1, '2018-09-25 23:06:11', '2018-09-25 23:06:11'),
(847, 37, NULL, 'Dr. Test docto has written an e-prescription to Patient Patient on 25-09-2018 04:06 PM', 1, '2018-09-25 23:06:11', '2018-09-25 23:06:11'),
(848, 37, 32, 'Dr. Test docto has sent you an e-prescription on 25-09-2018 04:06 PM Please check and follow the instructions.', 1, '2018-09-25 23:06:44', '2018-09-25 23:06:44'),
(849, 37, NULL, 'Dr. Test docto has written an e-prescription to Patient Patient on 25-09-2018 04:06 PM', 1, '2018-09-25 23:06:44', '2018-09-25 23:06:44'),
(850, 38, 36, 'Your Coach Testcoach has added new Lab Reports to your Records on 25-09-2018 04:15 pm Kindly check', 1, '2018-09-25 23:15:33', '2018-09-25 23:15:33'),
(851, 30, 30, 'You have successfully credited INR 50 in your wallet on 25-09-2018 07:30 PM.', 1, '2018-09-26 02:30:04', '2018-09-26 02:30:04'),
(852, 44, 39, 'Patient Shilpa has chosen you as the Care Coach on 26-09-2018 11:19 am.', 1, '2018-09-26 18:19:00', '2018-09-26 18:19:00'),
(853, 44, 31, 'Patient Shilpa has chosen you as the preferred Doctor on 26-09-2018 11:19 am.', 1, '2018-09-26 18:19:00', '2018-09-26 18:19:00'),
(854, 31, 30, 'Dr. Navneet Goyal has sent you an e-prescription on 26-09-2018 12:33 PM Please check and follow the instructions.', 1, '2018-09-26 19:33:57', '2018-09-26 19:33:57'),
(855, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Surabhi on 26-09-2018 12:33 PM', 1, '2018-09-26 19:33:57', '2018-09-26 19:33:57'),
(856, 31, 31, 'Hello Doctor', 0, '2018-09-26 20:45:13', '2018-09-26 20:45:13'),
(857, 39, 44, 'Your Coach Kiara has added new Lab Reports to your Records on 26-09-2018 01:52 pm Kindly check', 1, '2018-09-26 20:52:49', '2018-09-26 20:52:49'),
(858, 39, 44, 'Your Coach Kiara has added new Procedure Reports to your Records on 26-09-2018 01:53 pm.Kindly check.', 1, '2018-09-26 20:53:52', '2018-09-26 20:53:52'),
(859, 44, 39, 'Patient Shilpa has chosen you as the Care Coach on 27-09-2018 10:29 pm.', 1, '2018-09-28 05:29:56', '2018-09-28 05:29:56'),
(860, 44, 31, 'Patient Shilpa has chosen you as the preferred Doctor on 27-09-2018 10:29 pm.', 1, '2018-09-28 05:29:56', '2018-09-28 05:29:56'),
(861, 32, 32, 'You have successfully debited INR 890 in your wallet on 28-09-2018 10:46 AM.', 1, '2018-09-28 17:46:56', '2018-09-28 17:46:56'),
(862, 32, 32, 'You have successfully debited INR 890 in your wallet on 28-09-2018 10:55 AM.', 1, '2018-09-28 17:55:53', '2018-09-28 17:55:53'),
(863, 32, 32, 'You have successfully debited INR 890 in your wallet on 28-09-2018 11:01 AM.', 1, '2018-09-28 18:01:49', '2018-09-28 18:01:49'),
(864, 32, 32, 'You have successfully debited INR 890 in your wallet on 28-09-2018 11:03 AM.', 1, '2018-09-28 18:03:12', '2018-09-28 18:03:12'),
(865, 36, 36, 'You have successfully credited INR 3000 in your wallet on 28-09-2018 11:14 AM.', 1, '2018-09-28 18:14:53', '2018-09-28 18:14:53'),
(866, 36, 36, 'You have successfully debited INR 890 in your wallet on 28-09-2018 11:16 AM.', 1, '2018-09-28 18:16:44', '2018-09-28 18:16:44'),
(867, 36, 36, 'You have successfully debited INR 890 in your wallet on 28-09-2018 11:18 AM.', 1, '2018-09-28 18:18:02', '2018-09-28 18:18:02'),
(868, 36, 36, 'You have successfully credited INR 500 & debited INR 100 in your wallet on 28-09-2018 11:31 AM.', 1, '2018-09-28 18:31:00', '2018-09-28 18:31:00'),
(869, 36, 36, 'You have successfully credited INR 500 & debited INR 100 in your wallet on 28-09-2018 11:31 AM.', 1, '2018-09-28 18:31:22', '2018-09-28 18:31:22'),
(870, 32, 32, 'You have successfully credited INR 77 & debited INR 890 in your wallet on 28-09-2018 11:39 AM.', 1, '2018-09-28 18:39:10', '2018-09-28 18:39:10'),
(871, 32, 32, 'You have successfully credited INR 2000 in your wallet on 28-09-2018 11:39 AM.', 1, '2018-09-28 18:39:34', '2018-09-28 18:39:34'),
(872, 32, 32, 'You have successfully debited INR 790 in your wallet on 28-09-2018 11:39 AM.', 1, '2018-09-28 18:39:46', '2018-09-28 18:39:46'),
(873, 38, 32, 'Your Coach Testcoach has added new Lab Reports to your Records on 28-09-2018 11:53 am Kindly check', 1, '2018-09-28 18:53:01', '2018-09-28 18:53:01');
INSERT INTO `notification` (`id`, `from_id`, `to_id`, `notification_description`, `status`, `created_at`, `updated_at`) VALUES
(874, 38, 32, 'Your Coach Testcoach has added new Procedure Reports to your Records on 28-09-2018 11:53 am.Kindly check.', 1, '2018-09-28 18:53:15', '2018-09-28 18:53:15'),
(875, 38, 32, 'Your Coach Testcoach has added new Lab Reports to your Records on 28-09-2018 11:54 am Kindly check', 1, '2018-09-28 18:54:25', '2018-09-28 18:54:25'),
(876, 32, 32, 'You have successfully debited INR 890 in your wallet on 28-09-2018 12:08 PM.', 1, '2018-09-28 19:08:21', '2018-09-28 19:08:21'),
(877, 32, 32, 'You have successfully credited INR 570 & debited INR 890 in your wallet on 28-09-2018 12:11 PM.', 1, '2018-09-28 19:11:25', '2018-09-28 19:11:25'),
(878, 32, 32, 'You have successfully credited INR 790 & debited INR 790 in your wallet on 28-09-2018 12:32 PM.', 1, '2018-09-28 19:32:41', '2018-09-28 19:32:41'),
(879, 32, 32, 'You have successfully credited INR 2190 & debited INR 2190 in your wallet on 28-09-2018 12:33 PM.', 1, '2018-09-28 19:33:30', '2018-09-28 19:33:30'),
(880, 50, 50, 'You have successfully credited INR 790 & debited INR 790 in your wallet on 28-09-2018 03:17 PM.', 1, '2018-09-28 22:17:25', '2018-09-28 22:17:25'),
(881, 32, 32, 'You have successfully credited INR 2190 & debited INR 2190 in your wallet on 28-09-2018 03:59 PM.', 1, '2018-09-28 22:59:42', '2018-09-28 22:59:42'),
(882, 51, 51, 'You have successfully credited INR 890 & debited INR 890 in your wallet on 28-09-2018 04:02 PM.', 1, '2018-09-28 23:02:20', '2018-09-28 23:02:20'),
(883, 36, 36, 'You have successfully credited INR 170 & debited INR 2190 in your wallet on 28-09-2018 04:03 PM.', 1, '2018-09-28 23:03:38', '2018-09-28 23:03:38'),
(884, 47, 43, 'Patient Sheeba khan has chosen you as the Care Coach on 29-09-2018 12:37 pm.', 1, '2018-09-29 19:37:58', '2018-09-29 19:37:58'),
(885, 47, 31, 'Patient Sheeba khan has chosen you as the preferred Doctor on 29-09-2018 12:37 pm.', 1, '2018-09-29 19:37:58', '2018-09-29 19:37:58'),
(886, 47, 43, 'Patient Sheeba khan has chosen you as the Care Coach on 29-09-2018 12:38 pm.', 1, '2018-09-29 19:38:05', '2018-09-29 19:38:05'),
(887, 47, 31, 'Patient Sheeba khan has chosen you as the preferred Doctor on 29-09-2018 12:38 pm.', 1, '2018-09-29 19:38:05', '2018-09-29 19:38:05'),
(888, 47, 47, 'You have successfully credited INR 1 in your wallet on 29-09-2018 12:43 PM.', 1, '2018-09-29 19:43:26', '2018-09-29 19:43:26'),
(889, 31, 47, 'Dr. Navneet Goyal has sent you an e-prescription on 29-09-2018 01:07 PM Please check and follow the instructions.', 1, '2018-09-29 20:07:09', '2018-09-29 20:07:09'),
(890, 31, NULL, 'Dr. Navneet Goyal has written an e-prescription to Patient Sheeba khan on 29-09-2018 01:07 PM', 1, '2018-09-29 20:07:09', '2018-09-29 20:07:09'),
(891, 47, 52, 'Patient Sheeba khan has chosen you as the Care Coach on 29-09-2018 01:15 pm.', 1, '2018-09-29 20:15:31', '2018-09-29 20:15:31'),
(892, 47, 31, 'Patient Sheeba khan has chosen you as the preferred Doctor on 29-09-2018 01:15 pm.', 1, '2018-09-29 20:15:31', '2018-09-29 20:15:31'),
(893, 52, 52, 'Hello Coach how are you', 0, '2018-09-29 20:15:51', '2018-09-29 20:15:51'),
(894, 36, 36, 'You have successfully credited INR 1 in your wallet on 29-09-2018 07:01 PM.', 1, '2018-09-30 02:01:30', '2018-09-30 02:01:30'),
(895, 36, 36, 'You have successfully credited INR 790 & debited INR 790 in your wallet on 29-09-2018 07:02 PM.', 1, '2018-09-30 02:02:16', '2018-09-30 02:02:16'),
(896, 32, 56, 'Patient Patient has chosen you as the Care Coach on 01-10-2018 10:29 am.', 1, '2018-10-01 17:29:39', '2018-10-01 17:29:39'),
(897, 32, 53, 'Patient Patient has chosen you as the preferred Doctor on 01-10-2018 10:29 am.', 1, '2018-10-01 17:29:39', '2018-10-01 17:29:39'),
(898, 36, 56, 'Patient Priya has chosen you as the Care Coach on 01-10-2018 10:53 am.', 1, '2018-10-01 17:53:24', '2018-10-01 17:53:24'),
(899, 36, 58, 'Patient Priya has chosen you as the preferred Doctor on 01-10-2018 10:53 am.', 1, '2018-10-01 17:53:25', '2018-10-01 17:53:25'),
(900, 36, 36, 'You have successfully debited INR 1 in your wallet on 01-10-2018 10:57 AM.', 1, '2018-10-01 17:57:32', '2018-10-01 17:57:32'),
(901, 58, 36, 'Your wallet has been debited with INR 1 on 01-10-2018 10:57 AM as teleconsultation fees for Dr Test docto.', 1, '2018-10-01 17:57:32', '2018-10-01 17:57:32'),
(902, 36, 58, 'Patient Priya has successfully completed teleconsultation with you on 01-10-2018 10:57 AM.Please write e-prescription and Diagnosis.', 1, '2018-10-01 17:57:32', '2018-10-01 17:57:32'),
(903, 58, 36, 'You have successfully completed video teleconsultation with Test docto on 01-10-2018 10:57 am.Please wait for the e-prescription.', 1, '2018-10-01 17:57:32', '2018-10-01 17:57:32'),
(904, 36, 58, 'Patient Priya has successfully completed teleconsultation with you on 01-10-2018 10:57 am.Please write e-prescription and Diagnosis.', 1, '2018-10-01 17:57:32', '2018-10-01 17:57:32'),
(905, 32, 32, 'You have successfully credited INR 1 in your wallet on 01-10-2018 11:07 AM.', 1, '2018-10-01 18:07:21', '2018-10-01 18:07:21'),
(906, 32, 32, 'You have successfully debited INR 1 in your wallet on 01-10-2018 11:09 AM.', 1, '2018-10-01 18:09:58', '2018-10-01 18:09:58'),
(907, 58, 32, 'Your wallet has been debited with INR 1 on 01-10-2018 11:09 AM as teleconsultation fees for Dr Test docto.', 1, '2018-10-01 18:09:58', '2018-10-01 18:09:58'),
(908, 32, 58, 'Patient Patient has successfully completed teleconsultation with you on 01-10-2018 11:09 AM.Please write e-prescription and Diagnosis.', 1, '2018-10-01 18:09:58', '2018-10-01 18:09:58'),
(909, 58, 32, 'You have successfully completed video teleconsultation with Test docto on 01-10-2018 11:09 am.Please wait for the e-prescription.', 1, '2018-10-01 18:09:59', '2018-10-01 18:09:59'),
(910, 32, 58, 'Patient Patient has successfully completed teleconsultation with you on 01-10-2018 11:09 am.Please write e-prescription and Diagnosis.', 1, '2018-10-01 18:09:59', '2018-10-01 18:09:59'),
(911, 32, 32, 'You have successfully credited INR 1 in your wallet on 01-10-2018 11:12 AM.', 1, '2018-10-01 18:12:36', '2018-10-01 18:12:36'),
(912, 32, 32, 'You have successfully debited INR 1 in your wallet on 01-10-2018 11:13 AM.', 1, '2018-10-01 18:13:23', '2018-10-01 18:13:23'),
(913, 58, 32, 'Your wallet has been debited with INR 1 on 01-10-2018 11:13 AM as teleconsultation fees for Dr Test docto.', 1, '2018-10-01 18:13:23', '2018-10-01 18:13:23'),
(914, 32, 58, 'Patient Patient has successfully completed teleconsultation with you on 01-10-2018 11:13 AM.Please write e-prescription and Diagnosis.', 1, '2018-10-01 18:13:23', '2018-10-01 18:13:23'),
(915, 58, 32, 'You have successfully completed video teleconsultation with Test docto on 01-10-2018 11:13 am.Please wait for the e-prescription.', 1, '2018-10-01 18:13:23', '2018-10-01 18:13:23'),
(916, 32, 58, 'Patient Patient has successfully completed teleconsultation with you on 01-10-2018 11:13 am.Please write e-prescription and Diagnosis.', 1, '2018-10-01 18:13:23', '2018-10-01 18:13:23'),
(917, 32, 32, 'You have successfully credited INR 1 in your wallet on 01-10-2018 11:16 AM.', 1, '2018-10-01 18:16:49', '2018-10-01 18:16:49'),
(918, 32, 32, 'You have successfully debited INR 1 in your wallet on 01-10-2018 11:19 AM.', 1, '2018-10-01 18:19:00', '2018-10-01 18:19:00'),
(919, 58, 32, 'Your wallet has been debited with INR 1 on 01-10-2018 11:19 AM as teleconsultation fees for Dr Test docto.', 1, '2018-10-01 18:19:01', '2018-10-01 18:19:01'),
(920, 32, 58, 'Patient Patient has successfully completed teleconsultation with you on 01-10-2018 11:19 AM.Please write e-prescription and Diagnosis.', 1, '2018-10-01 18:19:01', '2018-10-01 18:19:01'),
(921, 58, 32, 'You have successfully completed video teleconsultation with Test docto on 01-10-2018 11:19 am.Please wait for the e-prescription.', 1, '2018-10-01 18:19:01', '2018-10-01 18:19:01'),
(922, 32, 58, 'Patient Patient has successfully completed teleconsultation with you on 01-10-2018 11:19 am.Please write e-prescription and Diagnosis.', 1, '2018-10-01 18:19:01', '2018-10-01 18:19:01'),
(923, 47, 56, 'Patient Sheeba khan has chosen you as the Care Coach on 01-10-2018 12:21 pm.', 1, '2018-10-01 19:21:23', '2018-10-01 19:21:23'),
(924, 47, 53, 'Patient Sheeba khan has chosen you as the preferred Doctor on 01-10-2018 12:21 pm.', 1, '2018-10-01 19:21:23', '2018-10-01 19:21:23'),
(925, 32, 32, 'You have successfully credited INR 790 & debited INR 790 in your wallet on 01-10-2018 01:48 PM.', 1, '2018-10-01 20:48:43', '2018-10-01 20:48:43'),
(926, 32, 59, 'Patient Patient has chosen you as the Care Coach on 01-10-2018 02:27 pm.', 1, '2018-10-01 21:27:23', '2018-10-01 21:27:23'),
(927, 32, 58, 'Patient Patient has chosen you as the preferred Doctor on 01-10-2018 02:27 pm.', 1, '2018-10-01 21:27:23', '2018-10-01 21:27:23'),
(928, 58, 32, 'Dr. Test docto has sent you an e-prescription on 01-10-2018 02:32 PM Please check and follow the instructions.', 1, '2018-10-01 21:32:24', '2018-10-01 21:32:24'),
(929, 58, NULL, 'Dr. Test docto has written an e-prescription to Patient Patient on 01-10-2018 02:32 PM', 1, '2018-10-01 21:32:24', '2018-10-01 21:32:24'),
(930, 58, 32, 'Dr. Test docto has sent you an e-prescription on 01-10-2018 02:32 PM Please check and follow the instructions.', 1, '2018-10-01 21:32:37', '2018-10-01 21:32:37'),
(931, 58, NULL, 'Dr. Test docto has written an e-prescription to Patient Patient on 01-10-2018 02:32 PM', 1, '2018-10-01 21:32:37', '2018-10-01 21:32:37'),
(932, 59, 32, 'Your Coach Test coach has added new Lab Reports to your Records on 01-10-2018 02:39 pm Kindly check', 1, '2018-10-01 21:39:24', '2018-10-01 21:39:24'),
(933, 59, 32, 'Your Coach Test coach has added new Procedure Reports to your Records on 01-10-2018 02:39 pm.Kindly check.', 1, '2018-10-01 21:39:59', '2018-10-01 21:39:59'),
(934, 44, 44, 'You have successfully credited INR 1 in your wallet on 01-10-2018 04:04 PM.', 1, '2018-10-01 23:04:52', '2018-10-01 23:04:52'),
(935, 44, 44, 'You have successfully debited INR 1 in your wallet on 01-10-2018 04:05 PM.', 1, '2018-10-01 23:05:48', '2018-10-01 23:05:48'),
(936, 53, 44, 'Your wallet has been debited with INR 1 on 01-10-2018 04:05 PM as teleconsultation fees for Dr Under Verification.', 1, '2018-10-01 23:05:49', '2018-10-01 23:05:49'),
(937, 44, 53, 'Patient Shilpa has successfully completed teleconsultation with you on 01-10-2018 04:05 PM.Please write e-prescription and Diagnosis.', 1, '2018-10-01 23:05:49', '2018-10-01 23:05:49'),
(938, 53, 44, 'You have successfully completed video teleconsultation with Under Verification on 01-10-2018 04:05 pm.Please wait for the e-prescription.', 1, '2018-10-01 23:05:49', '2018-10-01 23:05:49'),
(939, 44, 53, 'Patient Shilpa has successfully completed teleconsultation with you on 01-10-2018 04:05 pm.Please write e-prescription and Diagnosis.', 1, '2018-10-01 23:05:49', '2018-10-01 23:05:49'),
(940, 30, 30, 'You have successfully debited INR 1 in your wallet on 02-10-2018 03:38 PM.', 1, '2018-10-02 22:38:56', '2018-10-02 22:38:56'),
(941, 53, 30, 'Your wallet has been debited with INR 1 on 02-10-2018 03:38 PM as teleconsultation fees for Dr Under Verification.', 1, '2018-10-02 22:38:57', '2018-10-02 22:38:57'),
(942, 30, 53, 'Patient Surabhi has successfully completed teleconsultation with you on 02-10-2018 03:38 PM.Please write e-prescription and Diagnosis.', 1, '2018-10-02 22:38:57', '2018-10-02 22:38:57'),
(943, 53, 30, 'You have successfully completed video teleconsultation with Under Verification on 02-10-2018 03:38 pm.Please wait for the e-prescription.', 1, '2018-10-02 22:38:57', '2018-10-02 22:38:57'),
(944, 30, 53, 'Patient Surabhi has successfully completed teleconsultation with you on 02-10-2018 03:38 pm.Please write e-prescription and Diagnosis.', 1, '2018-10-02 22:38:57', '2018-10-02 22:38:57'),
(945, 30, 60, 'Patient Surabhi has chosen you as the Care Coach on 02-10-2018 03:53 pm.', 1, '2018-10-02 22:53:55', '2018-10-02 22:53:55'),
(946, 30, 53, 'Patient Surabhi has chosen you as the preferred Doctor on 02-10-2018 03:53 pm.', 1, '2018-10-02 22:53:55', '2018-10-02 22:53:55'),
(947, 60, 30, 'Your Coach Shilpa Goyal has added new Lab Reports to your Records on 02-10-2018 04:05 pm Kindly check', 1, '2018-10-02 23:05:38', '2018-10-02 23:05:38'),
(948, 53, 30, 'Dr. Under Verification has sent you an e-prescription on 02-10-2018 04:07 PM Please check and follow the instructions.', 1, '2018-10-02 23:07:31', '2018-10-02 23:07:31'),
(949, 53, NULL, 'Dr. Under Verification has written an e-prescription to Patient Surabhi on 02-10-2018 04:07 PM', 1, '2018-10-02 23:07:31', '2018-10-02 23:07:31'),
(950, 61, 60, 'Patient Nikhil has chosen you as the Care Coach on 02-10-2018 06:29 pm.', 1, '2018-10-03 01:29:20', '2018-10-03 01:29:20'),
(951, 61, 53, 'Patient Nikhil has chosen you as the preferred Doctor on 02-10-2018 06:29 pm.', 1, '2018-10-03 01:29:20', '2018-10-03 01:29:20'),
(952, 58, 58, 'asdasdasd', 0, '2018-10-03 17:27:59', '2018-10-03 17:27:59'),
(953, 30, 56, 'Patient Surabhi has chosen you as the Care Coach on 05-10-2018 11:45 am.', 1, '2018-10-05 18:45:44', '2018-10-05 18:45:44'),
(954, 30, 53, 'Patient Surabhi has chosen you as the preferred Doctor on 05-10-2018 11:45 am.', 1, '2018-10-05 18:45:45', '2018-10-05 18:45:45'),
(955, 74, 72, 'Patient Navneet has chosen you as the Care Coach on 11-10-2018 10:52 am.', 1, '2018-10-11 17:52:45', '2018-10-11 17:52:45'),
(956, 74, 73, 'Patient Navneet has chosen you as the preferred Doctor on 11-10-2018 10:52 am.', 1, '2018-10-11 17:52:45', '2018-10-11 17:52:45'),
(957, 30, 72, 'Patient Surabhi has chosen you as the Care Coach on 12-10-2018 11:42 am.', 1, '2018-10-12 18:42:21', '2018-10-12 18:42:21'),
(958, 30, 73, 'Patient Surabhi has chosen you as the preferred Doctor on 12-10-2018 11:42 am.', 1, '2018-10-12 18:42:21', '2018-10-12 18:42:21'),
(959, 79, 63, 'Patient Saroj davi has chosen you as the Care Coach on 14-10-2018 10:22 pm.', 1, '2018-10-15 05:22:47', '2018-10-15 05:22:47'),
(960, 79, 71, 'Patient Saroj davi has chosen you as the preferred Doctor on 14-10-2018 10:22 pm.', 1, '2018-10-15 05:22:47', '2018-10-15 05:22:47'),
(961, 30, 56, 'Patient Surabhi has chosen you as the Care Coach on 16-10-2018 05:51 pm.', 1, '2018-10-17 00:51:13', '2018-10-17 00:51:13'),
(962, 30, 75, 'Patient Surabhi has chosen you as the preferred Doctor on 16-10-2018 05:51 pm.', 1, '2018-10-17 00:51:13', '2018-10-17 00:51:13'),
(963, 75, 30, 'Dr. No Docto has sent you an e-prescription on 16-10-2018 09:03 PM Please check and follow the instructions.', 1, '2018-10-17 04:03:18', '2018-10-17 04:03:18'),
(964, 75, NULL, 'Dr. No Docto has written an e-prescription to Patient Surabhi on 16-10-2018 09:03 PM', 1, '2018-10-17 04:03:18', '2018-10-17 04:03:18'),
(965, 30, 56, 'Patient Surabhi has chosen you as the Care Coach on 30-10-2018 10:45 pm.', 1, '2018-10-31 05:45:53', '2018-10-31 05:45:53'),
(966, 30, 75, 'Patient Surabhi has chosen you as the preferred Doctor on 30-10-2018 10:45 pm.', 1, '2018-10-31 05:45:53', '2018-10-31 05:45:53'),
(967, 87, 56, 'Patient Muzammil has chosen you as the Care Coach on 01-11-2018 01:28 pm.', 1, '2018-11-01 20:28:35', '2018-11-01 20:28:35'),
(968, 87, 75, 'Patient Muzammil has chosen you as the preferred Doctor on 01-11-2018 01:28 pm.', 1, '2018-11-01 20:28:35', '2018-11-01 20:28:35'),
(969, 75, 30, 'Dr. No Docto has sent you an e-prescription on 10-11-2018 06:41 PM Please check and follow the instructions.', 1, '2018-11-11 01:41:13', '2018-11-11 01:41:13'),
(970, 75, NULL, 'Dr. No Docto has written an e-prescription to Patient Surabhi on 10-11-2018 06:41 PM', 1, '2018-11-11 01:41:13', '2018-11-11 01:41:13'),
(971, 87, 62, 'Patient Muzammil has chosen you as the Care Coach on 21-11-2018 03:46 pm.', 1, '2018-11-21 22:46:50', '2018-11-21 22:46:50'),
(972, 87, 71, 'Patient Muzammil has chosen you as the preferred Doctor on 21-11-2018 03:46 pm.', 1, '2018-11-21 22:46:50', '2018-11-21 22:46:50'),
(973, 87, 103, 'Patient Muzammil has chosen you as the Care Coach on 24-11-2018 04:01 pm.', 1, '2018-11-24 23:01:03', '2018-11-24 23:01:03'),
(974, 87, 102, 'Patient Muzammil has chosen you as the preferred Doctor on 24-11-2018 04:01 pm.', 1, '2018-11-24 23:01:03', '2018-11-24 23:01:03'),
(975, 87, 89, 'Patient Muzammil has chosen you as the Care Coach on 26-11-2018 11:59 am.', 1, '2018-11-26 18:59:46', '2018-11-26 18:59:46'),
(976, 87, 102, 'Patient Muzammil has chosen you as the preferred Doctor on 26-11-2018 11:59 am.', 1, '2018-11-26 18:59:46', '2018-11-26 18:59:46'),
(977, 87, 104, 'Patient Muzammil has chosen you as the Care Coach on 26-11-2018 03:49 pm.', 1, '2018-11-26 22:49:55', '2018-11-26 22:49:55'),
(978, 87, 102, 'Patient Muzammil has chosen you as the preferred Doctor on 26-11-2018 03:49 pm.', 1, '2018-11-26 22:49:55', '2018-11-26 22:49:55'),
(979, 104, 87, 'Your Coach Pooja has added new Lab Reports to your Records on 26-11-2018 03:51 pm Kindly check', 1, '2018-11-26 22:51:16', '2018-11-26 22:51:16'),
(980, 104, 87, 'Your Coach Pooja has added new Procedure Reports to your Records on 26-11-2018 03:51 pm.Kindly check.', 1, '2018-11-26 22:51:40', '2018-11-26 22:51:40'),
(981, 102, 87, 'Dr. Priyanka has sent you an e-prescription on 26-11-2018 04:13 PM Please check and follow the instructions.', 1, '2018-11-26 23:13:46', '2018-11-26 23:13:46'),
(982, 102, NULL, 'Dr. Priyanka has written an e-prescription to Patient Muzammil on 26-11-2018 04:13 PM', 1, '2018-11-26 23:13:46', '2018-11-26 23:13:46'),
(983, 102, 87, 'Dr. Priyanka has sent you an e-prescription on 26-11-2018 05:13 PM Please check and follow the instructions.', 1, '2018-11-27 00:13:33', '2018-11-27 00:13:33'),
(984, 102, NULL, 'Dr. Priyanka has written an e-prescription to Patient Muzammil on 26-11-2018 05:13 PM', 1, '2018-11-27 00:13:33', '2018-11-27 00:13:33'),
(985, 30, 103, 'Patient Surabhi has chosen you as the Care Coach on 27-11-2018 12:48 pm.', 1, '2018-11-27 19:48:40', '2018-11-27 19:48:40'),
(986, 30, 75, 'Patient Surabhi has chosen you as the preferred Doctor on 27-11-2018 12:48 pm.', 1, '2018-11-27 19:48:40', '2018-11-27 19:48:40'),
(987, 75, 30, 'Dr. No Docto has sent you an e-prescription on 10-12-2018 10:35 AM Please check and follow the instructions.', 1, '2018-12-10 17:35:30', '2018-12-10 17:35:30'),
(988, 75, NULL, 'Dr. No Docto has written an e-prescription to Patient Surabhi on 10-12-2018 10:35 AM', 1, '2018-12-10 17:35:30', '2018-12-10 17:35:30'),
(989, 102, 87, 'Dr. Priyanka has sent you an e-prescription on 17-12-2018 11:38 AM Please check and follow the instructions.', 1, '2018-12-17 18:38:23', '2018-12-17 18:38:23'),
(990, 102, NULL, 'Dr. Priyanka has written an e-prescription to Patient Muzammil on 17-12-2018 11:38 AM', 1, '2018-12-17 18:38:23', '2018-12-17 18:38:23'),
(991, 102, 87, 'Dr. Priyanka has sent you an e-prescription on 17-12-2018 11:45 AM Please check and follow the instructions.', 1, '2018-12-17 18:45:41', '2018-12-17 18:45:41'),
(992, 102, NULL, 'Dr. Priyanka has written an e-prescription to Patient Muzammil on 17-12-2018 11:45 AM', 1, '2018-12-17 18:45:41', '2018-12-17 18:45:41'),
(993, 102, 87, 'Dr. Priyanka has sent you an e-prescription on 17-12-2018 11:45 AM Please check and follow the instructions.', 1, '2018-12-17 18:45:42', '2018-12-17 18:45:42'),
(994, 102, NULL, 'Dr. Priyanka has written an e-prescription to Patient Muzammil on 17-12-2018 11:45 AM', 1, '2018-12-17 18:45:42', '2018-12-17 18:45:42'),
(995, 87, 104, 'Patient Muzammil has chosen you as the Care Coach on 17-12-2018 11:50 am.', 1, '2018-12-17 18:50:42', '2018-12-17 18:50:42'),
(996, 87, 102, 'Patient Muzammil has chosen you as the preferred Doctor on 17-12-2018 11:50 am.', 1, '2018-12-17 18:50:42', '2018-12-17 18:50:42'),
(997, 87, 111, 'Patient Muzammil has chosen you as the Care Coach on 17-12-2018 12:57 pm.', 1, '2018-12-17 19:57:10', '2018-12-17 19:57:10'),
(998, 87, 102, 'Patient Muzammil has chosen you as the preferred Doctor on 17-12-2018 12:57 pm.', 1, '2018-12-17 19:57:10', '2018-12-17 19:57:10'),
(999, 87, 111, 'Patient Muzammil has chosen you as the Care Coach on 17-12-2018 12:58 pm.', 1, '2018-12-17 19:58:07', '2018-12-17 19:58:07'),
(1000, 87, 102, 'Patient Muzammil has chosen you as the preferred Doctor on 17-12-2018 12:58 pm.', 1, '2018-12-17 19:58:07', '2018-12-17 19:58:07'),
(1001, 111, 87, 'Your Coach Jay has added new Lab Reports to your Records on 17-12-2018 01:01 pm Kindly check', 1, '2018-12-17 20:01:08', '2018-12-17 20:01:08'),
(1002, 111, 87, 'Your Coach Jay has added new Procedure Reports to your Records on 17-12-2018 01:02 pm.Kindly check.', 1, '2018-12-17 20:02:38', '2018-12-17 20:02:38'),
(1003, 30, 30, 'You have successfully debited INR 5 in your wallet on 17-12-2018 06:47 PM.', 1, '2018-12-18 01:47:00', '2018-12-18 01:47:00'),
(1004, 113, 30, 'Your wallet has been debited with INR 5 on 17-12-2018 06:47 PM as teleconsultation fees for Dr X.', 1, '2018-12-18 01:47:00', '2018-12-18 01:47:00'),
(1005, 30, 113, 'Patient Surabhi has successfully completed teleconsultation with you on 17-12-2018 06:47 PM.Please write e-prescription and Diagnosis.', 1, '2018-12-18 01:47:00', '2018-12-18 01:47:00'),
(1006, 113, 30, 'You have successfully completed video teleconsultation with X on 17-12-2018 06:47 pm.Please wait for the e-prescription.', 1, '2018-12-18 01:47:01', '2018-12-18 01:47:01'),
(1007, 30, 113, 'Patient Surabhi has successfully completed teleconsultation with you on 17-12-2018 06:47 pm.Please write e-prescription and Diagnosis.', 1, '2018-12-18 01:47:01', '2018-12-18 01:47:01'),
(1008, 119, 63, 'Patient Ashish has chosen you as the Care Coach on 28-12-2018 10:36 pm.', 1, '2018-12-29 05:36:57', '2018-12-29 05:36:57'),
(1009, 119, 102, 'Patient Ashish has chosen you as the preferred Doctor on 28-12-2018 10:36 pm.', 1, '2018-12-29 05:36:57', '2018-12-29 05:36:57'),
(1010, 87, 87, 'You have successfully credited INR 1 in your wallet on 12-01-2019 03:39 PM.', 1, '2019-01-12 22:39:53', '2019-01-12 22:39:53'),
(1011, 87, 87, 'You have successfully debited INR 1 in your wallet on 12-01-2019 04:08 PM.', 1, '2019-01-12 23:08:30', '2019-01-12 23:08:30'),
(1012, 127, 127, 'You have successfully credited INR 1 & debited INR 1 in your wallet on 12-01-2019 05:01 PM.', 1, '2019-01-13 00:01:22', '2019-01-13 00:01:22'),
(1013, 87, 87, 'You have successfully credited INR 1 in your wallet on 12-01-2019 05:52 PM.', 1, '2019-01-13 00:52:28', '2019-01-13 00:52:28'),
(1014, 127, 127, 'You have successfully credited INR 1 in your wallet on 12-01-2019 05:58 PM.', 1, '2019-01-13 00:58:01', '2019-01-13 00:58:01'),
(1015, 128, 128, 'You have successfully credited INR 1 in your wallet on 12-01-2019 06:04 PM.', 1, '2019-01-13 01:04:36', '2019-01-13 01:04:36'),
(1016, 128, 128, 'You have successfully debited INR 1 in your wallet on 12-01-2019 06:04 PM.', 1, '2019-01-13 01:04:52', '2019-01-13 01:04:52'),
(1017, 128, 128, 'You have successfully debited INR 1 in your wallet on 12-01-2019 06:05 PM.', 1, '2019-01-13 01:05:28', '2019-01-13 01:05:28'),
(1018, 129, 129, 'You have successfully credited INR 10000 in your wallet on 12-01-2019 06:17 PM.', 1, '2019-01-13 01:17:40', '2019-01-13 01:17:40'),
(1019, 129, 129, 'You have successfully debited INR 2490 in your wallet on 12-01-2019 06:18 PM.', 1, '2019-01-13 01:18:40', '2019-01-13 01:18:40'),
(1020, 129, 129, 'You have successfully debited INR 2490 in your wallet on 12-01-2019 06:19 PM.', 1, '2019-01-13 01:19:35', '2019-01-13 01:19:35'),
(1021, 129, 129, 'You have successfully debited INR 2490 in your wallet on 12-01-2019 06:19 PM.', 1, '2019-01-13 01:19:48', '2019-01-13 01:19:48'),
(1022, 129, 129, 'You have successfully debited INR 2490 in your wallet on 12-01-2019 06:20 PM.', 1, '2019-01-13 01:20:09', '2019-01-13 01:20:09'),
(1023, 129, 129, 'You have successfully credited INR 2450 & debited INR 2490 in your wallet on 12-01-2019 06:41 PM.', 1, '2019-01-13 01:41:37', '2019-01-13 01:41:37'),
(1024, 130, 130, 'You have successfully credited INR 1 & debited INR 1 in your wallet on 12-01-2019 06:55 PM.', 1, '2019-01-13 01:55:50', '2019-01-13 01:55:50'),
(1025, 128, 128, 'You have successfully credited INR 2 & debited INR 1 in your wallet on 12-01-2019 07:17 PM.', 1, '2019-01-13 02:17:00', '2019-01-13 02:17:00'),
(1026, 131, 131, 'You have successfully credited INR 1 & debited INR 1 in your wallet on 12-01-2019 07:20 PM.', 1, '2019-01-13 02:20:25', '2019-01-13 02:20:25'),
(1027, 131, 131, 'You have successfully credited INR 1 in your wallet on 12-01-2019 07:24 PM.', 1, '2019-01-13 02:24:40', '2019-01-13 02:24:40'),
(1028, 131, 131, 'You have successfully debited INR 1 in your wallet on 12-01-2019 07:24 PM.', 1, '2019-01-13 02:24:58', '2019-01-13 02:24:58'),
(1029, 131, 131, 'You have successfully credited INR 1 & debited INR 1 in your wallet on 12-01-2019 07:26 PM.', 1, '2019-01-13 02:26:49', '2019-01-13 02:26:49'),
(1030, 144, 144, 'hello how are you', 0, '2019-02-05 20:31:42', '2019-02-05 20:31:42'),
(1031, 30, 111, 'Patient Surabhi has chosen you as the Care Coach on 05-02-2019 01:36 pm.', 1, '2019-02-05 20:36:05', '2019-02-05 20:36:05'),
(1032, 30, 144, 'Patient Surabhi has chosen you as the preferred Doctor on 05-02-2019 01:36 pm.', 1, '2019-02-05 20:36:05', '2019-02-05 20:36:05'),
(1033, 144, 30, 'Dr. City Docto has sent you an e-prescription on 05-02-2019 01:36 PM Please check and follow the instructions.', 1, '2019-02-05 20:36:44', '2019-02-05 20:36:44'),
(1034, 144, NULL, 'Dr. City Docto has written an e-prescription to Patient Surabhi on 05-02-2019 01:36 PM', 1, '2019-02-05 20:36:44', '2019-02-05 20:36:44'),
(1035, 127, 89, 'Patient Priyanka has chosen you as the Care Coach on 11-02-2019 12:26 pm.', 1, '2019-02-11 19:26:59', '2019-02-11 19:26:59'),
(1036, 127, 126, 'Patient Priyanka has chosen you as the preferred Doctor on 11-02-2019 12:26 pm.', 1, '2019-02-11 19:26:59', '2019-02-11 19:26:59'),
(1037, 127, 89, 'Patient Priyanka has chosen you as the Care Coach on 11-02-2019 12:31 pm.', 1, '2019-02-11 19:31:24', '2019-02-11 19:31:24'),
(1038, 127, 152, 'Patient Priyanka has chosen you as the preferred Doctor on 11-02-2019 12:31 pm.', 1, '2019-02-11 19:31:24', '2019-02-11 19:31:24'),
(1039, 152, 127, 'Dr. Nency has sent you an e-prescription on 11-02-2019 12:32 PM Please check and follow the instructions.', 1, '2019-02-11 19:32:04', '2019-02-11 19:32:04'),
(1040, 152, NULL, 'Dr. Nency has written an e-prescription to Patient Priyanka on 11-02-2019 12:32 PM', 1, '2019-02-11 19:32:04', '2019-02-11 19:32:04'),
(1041, 152, 127, 'Dr. Nency has sent you an e-prescription on 11-02-2019 12:33 PM Please check and follow the instructions.', 1, '2019-02-11 19:33:08', '2019-02-11 19:33:08'),
(1042, 152, NULL, 'Dr. Nency has written an e-prescription to Patient Priyanka on 11-02-2019 12:33 PM', 1, '2019-02-11 19:33:08', '2019-02-11 19:33:08'),
(1043, 127, 111, 'Patient Priyanka has chosen you as the Care Coach on 11-02-2019 12:35 pm.', 1, '2019-02-11 19:35:08', '2019-02-11 19:35:08'),
(1044, 127, 152, 'Patient Priyanka has chosen you as the preferred Doctor on 11-02-2019 12:35 pm.', 1, '2019-02-11 19:35:08', '2019-02-11 19:35:08'),
(1045, 111, 127, 'Your Coach Jay has added new Lab Reports to your Records on 11-02-2019 12:36 pm Kindly check', 1, '2019-02-11 19:36:29', '2019-02-11 19:36:29'),
(1046, 111, 127, 'Your Coach Jay has added new Procedure Reports to your Records on 11-02-2019 12:36 pm.Kindly check.', 1, '2019-02-11 19:36:53', '2019-02-11 19:36:53'),
(1047, 111, 127, 'Your Coach Jay has added new Lab Reports to your Records on 11-02-2019 12:39 pm Kindly check', 1, '2019-02-11 19:39:06', '2019-02-11 19:39:06'),
(1048, 127, 111, 'Patient Priyanka has chosen you as the Care Coach on 12-02-2019 10:13 am.', 1, '2019-02-12 17:13:13', '2019-02-12 17:13:13'),
(1049, 127, 126, 'Patient Priyanka has chosen you as the preferred Doctor on 12-02-2019 10:13 am.', 1, '2019-02-12 17:13:13', '2019-02-12 17:13:13'),
(1050, 150, 150, 'Thank you for joining us Dr Yogendra', 0, '2019-02-12 19:53:45', '2019-02-12 19:53:45'),
(1051, 127, 63, 'Patient Priyanka has chosen you as the Care Coach on 18-02-2019 10:59 am.', 1, '2019-02-18 17:59:36', '2019-02-18 17:59:36'),
(1052, 127, 144, 'Patient Priyanka has chosen you as the preferred Doctor on 18-02-2019 10:59 am.', 1, '2019-02-18 17:59:36', '2019-02-18 17:59:36'),
(1053, 127, 63, 'Patient Priyanka has chosen you as the Care Coach on 18-02-2019 05:57 pm.', 1, '2019-02-19 00:57:14', '2019-02-19 00:57:14'),
(1054, 127, 160, 'Patient Priyanka has chosen you as the preferred Doctor on 18-02-2019 05:57 pm.', 1, '2019-02-19 00:57:14', '2019-02-19 00:57:14'),
(1055, 160, 127, 'Dr. Obin has sent you an e-prescription on 18-02-2019 06:25 PM Please check and follow the instructions.', 1, '2019-02-19 01:25:39', '2019-02-19 01:25:39'),
(1056, 160, NULL, 'Dr. Obin has written an e-prescription to Patient Priyanka on 18-02-2019 06:25 PM', 1, '2019-02-19 01:25:39', '2019-02-19 01:25:39'),
(1057, 160, 127, 'Dr. Obin has sent you an e-prescription on 18-02-2019 06:25 PM Please check and follow the instructions.', 1, '2019-02-19 01:25:40', '2019-02-19 01:25:40'),
(1058, 160, NULL, 'Dr. Obin has written an e-prescription to Patient Priyanka on 18-02-2019 06:25 PM', 1, '2019-02-19 01:25:40', '2019-02-19 01:25:40'),
(1059, 166, 166, 'This is all about VitalX', 0, '2019-02-22 19:55:54', '2019-02-22 19:55:54'),
(1060, 165, 165, 'This notification is to check', 0, '2019-02-22 19:58:40', '2019-02-22 19:58:40'),
(1061, 170, 163, 'Patient Princy has chosen you as the Care Coach on 22-02-2019 02:55 pm.', 1, '2019-02-22 21:55:55', '2019-02-22 21:55:55'),
(1062, 170, 169, 'Patient Princy has chosen you as the preferred Doctor on 22-02-2019 02:55 pm.', 1, '2019-02-22 21:55:55', '2019-02-22 21:55:55'),
(1063, 171, 163, 'Patient Princy has chosen you as the Care Coach on 22-02-2019 03:02 pm.', 1, '2019-02-22 22:02:37', '2019-02-22 22:02:37'),
(1064, 171, 169, 'Patient Princy has chosen you as the preferred Doctor on 22-02-2019 03:02 pm.', 1, '2019-02-22 22:02:37', '2019-02-22 22:02:37'),
(1065, 171, 163, 'Patient Princy has chosen you as the Care Coach on 22-02-2019 03:13 pm.', 1, '2019-02-22 22:13:28', '2019-02-22 22:13:28'),
(1066, 171, 172, 'Patient Princy has chosen you as the preferred Doctor on 22-02-2019 03:13 pm.', 1, '2019-02-22 22:13:28', '2019-02-22 22:13:28'),
(1067, 173, 173, 'Hello Jagjit, I want to appoint you as my family doctor', 0, '2019-02-23 00:07:18', '2019-02-23 00:07:18'),
(1068, 173, 173, 'Hello Jagjit, This is second', 0, '2019-02-23 00:07:54', '2019-02-23 00:07:54'),
(1069, 173, 173, 'Hello This is a test notification', 0, '2019-02-23 00:15:25', '2019-02-23 00:15:25'),
(1070, 173, 173, 'Hii', 0, '2019-02-23 00:16:38', '2019-02-23 00:16:38'),
(1071, 173, 173, 'Hi jag, Send notification', 0, '2019-02-23 00:23:08', '2019-02-23 00:23:08'),
(1072, 173, 173, 'Hii', 0, '2019-02-23 00:26:24', '2019-02-23 00:26:24'),
(1073, 173, 173, 'adsas', 0, '2019-02-23 00:26:40', '2019-02-23 00:26:40'),
(1074, 173, 173, 'Hello This is a test notification', 0, '2019-02-23 00:29:58', '2019-02-23 00:29:58'),
(1075, 173, 173, 'Hello This is a test notification', 0, '2019-02-23 00:35:52', '2019-02-23 00:35:52'),
(1076, 173, 173, 'Hello This is a test notification', 0, '2019-02-23 00:36:09', '2019-02-23 00:36:09'),
(1077, 173, 173, 'Hii', 0, '2019-02-23 00:36:33', '2019-02-23 00:36:33'),
(1078, 173, 173, 'Hi jag, Send notification', 0, '2019-02-23 00:37:10', '2019-02-23 00:37:10'),
(1079, 173, 173, 'Hi jag, Send notification', 0, '2019-02-23 00:38:41', '2019-02-23 00:38:41'),
(1080, 173, 173, 'Hi jag, Send notification', 0, '2019-02-23 00:44:29', '2019-02-23 00:44:29'),
(1081, 173, 173, 'Hi jag, Send notification', 0, '2019-02-23 00:45:23', '2019-02-23 00:45:23'),
(1082, 173, 173, 'Hi jagjit, Send notification', 0, '2019-02-23 00:46:25', '2019-02-23 00:46:25'),
(1083, 173, 173, 'Hi jag123, Send notification', 0, '2019-02-23 00:48:47', '2019-02-23 00:48:47'),
(1084, 176, 174, 'Patient Alisha has chosen you as the Care Coach on 22-02-2019 07:07 pm.', 1, '2019-02-23 02:07:07', '2019-02-23 02:07:07'),
(1085, 176, 175, 'Patient Alisha has chosen you as the preferred Doctor on 22-02-2019 07:07 pm.', 1, '2019-02-23 02:07:07', '2019-02-23 02:07:07'),
(1086, 176, 174, 'Patient Alisha has chosen you as the Care Coach on 22-02-2019 07:07 pm.', 1, '2019-02-23 02:07:41', '2019-02-23 02:07:41'),
(1087, 176, 175, 'Patient Alisha has chosen you as the preferred Doctor on 22-02-2019 07:07 pm.', 1, '2019-02-23 02:07:41', '2019-02-23 02:07:41'),
(1088, 176, 174, 'Patient Alisha has chosen you as the Care Coach on 22-02-2019 07:14 pm.', 1, '2019-02-23 02:14:57', '2019-02-23 02:14:57'),
(1089, 176, 177, 'Patient Alisha has chosen you as the preferred Doctor on 22-02-2019 07:14 pm.', 1, '2019-02-23 02:14:57', '2019-02-23 02:14:57'),
(1090, 176, 176, 'You have successfully credited INR 1 in your wallet on 22-02-2019 07:18 PM.', 1, '2019-02-23 02:18:45', '2019-02-23 02:18:45'),
(1091, 176, 176, 'You have successfully debited INR 1 in your wallet on 22-02-2019 07:19 PM.', 1, '2019-02-23 02:19:19', '2019-02-23 02:19:19'),
(1092, 177, 176, 'Your wallet has been debited with INR 1 on 22-02-2019 07:19 PM as teleconsultation fees for Dr Jay.', 1, '2019-02-23 02:19:19', '2019-02-23 02:19:19'),
(1093, 176, 177, 'Patient Alisha has successfully completed teleconsultation with you on 22-02-2019 07:19 PM.Please write e-prescription and Diagnosis.', 1, '2019-02-23 02:19:19', '2019-02-23 02:19:19'),
(1094, 177, 176, 'You have successfully completed video teleconsultation with Jay on 22-02-2019 07:19 pm.Please wait for the e-prescription.', 1, '2019-02-23 02:19:19', '2019-02-23 02:19:19'),
(1095, 176, 177, 'Patient Alisha has successfully completed teleconsultation with you on 22-02-2019 07:19 pm.Please write e-prescription and Diagnosis.', 1, '2019-02-23 02:19:20', '2019-02-23 02:19:20'),
(1096, 177, 177, 'This is from Admin side', 0, '2019-02-23 02:22:11', '2019-02-23 02:22:11'),
(1097, 185, 63, 'Patient Rakesh has chosen you as the Care Coach on 09-03-2019 04:33 pm.', 1, '2019-03-09 23:33:55', '2019-03-09 23:33:55'),
(1098, 185, 146, 'Patient Rakesh has chosen you as the preferred Doctor on 09-03-2019 04:33 pm.', 1, '2019-03-09 23:33:55', '2019-03-09 23:33:55'),
(1099, 187, 63, 'Patient Rakesh has chosen you as the Care Coach on 10-03-2019 12:44 pm.', 1, '2019-03-10 19:44:44', '2019-03-10 19:44:44'),
(1100, 187, 146, 'Patient Rakesh has chosen you as the preferred Doctor on 10-03-2019 12:44 pm.', 1, '2019-03-10 19:44:44', '2019-03-10 19:44:44'),
(1101, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 11:34 AM.', 1, '2019-03-23 18:34:48', '2019-03-23 18:34:48'),
(1102, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 11:34 AM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 18:34:48', '2019-03-23 18:34:48'),
(1103, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:34 AM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:34:48', '2019-03-23 18:34:48'),
(1104, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 11:34 am.Please wait for the e-prescription.', 1, '2019-03-23 18:34:48', '2019-03-23 18:34:48'),
(1105, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:34 am.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:34:48', '2019-03-23 18:34:48'),
(1106, 127, 63, 'Patient Priyanka has chosen you as the Care Coach on 23-03-2019 11:37 am.', 1, '2019-03-23 18:37:40', '2019-03-23 18:37:40'),
(1107, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 23-03-2019 11:37 am.', 1, '2019-03-23 18:37:40', '2019-03-23 18:37:40'),
(1108, 127, 127, 'You have successfully credited INR 1 in your wallet on 23-03-2019 11:45 AM.', 1, '2019-03-23 18:45:24', '2019-03-23 18:45:24'),
(1109, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 11:45 AM.', 1, '2019-03-23 18:45:48', '2019-03-23 18:45:48'),
(1110, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 11:45 AM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 18:45:48', '2019-03-23 18:45:48'),
(1111, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:45 AM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:45:49', '2019-03-23 18:45:49'),
(1112, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 11:45 am.Please wait for the e-prescription.', 1, '2019-03-23 18:45:49', '2019-03-23 18:45:49'),
(1113, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:45 am.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:45:49', '2019-03-23 18:45:49'),
(1114, 127, 127, 'You have successfully credited INR 1 in your wallet on 23-03-2019 11:46 AM.', 1, '2019-03-23 18:46:09', '2019-03-23 18:46:09'),
(1115, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 11:46 AM.', 1, '2019-03-23 18:46:24', '2019-03-23 18:46:24'),
(1116, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 11:46 AM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 18:46:24', '2019-03-23 18:46:24'),
(1117, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:46 AM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:46:24', '2019-03-23 18:46:24'),
(1118, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 11:46 am.Please wait for the e-prescription.', 1, '2019-03-23 18:46:24', '2019-03-23 18:46:24'),
(1119, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:46 am.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:46:24', '2019-03-23 18:46:24'),
(1120, 127, 127, 'You have successfully credited INR 1 in your wallet on 23-03-2019 11:46 AM.', 1, '2019-03-23 18:46:39', '2019-03-23 18:46:39'),
(1121, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 11:46 AM.', 1, '2019-03-23 18:46:57', '2019-03-23 18:46:57'),
(1122, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 11:46 AM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 18:46:57', '2019-03-23 18:46:57'),
(1123, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:46 AM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:46:57', '2019-03-23 18:46:57'),
(1124, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 11:46 am.Please wait for the e-prescription.', 1, '2019-03-23 18:46:58', '2019-03-23 18:46:58'),
(1125, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:46 am.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:46:58', '2019-03-23 18:46:58'),
(1126, 127, 127, 'You have successfully credited INR 10 in your wallet on 23-03-2019 11:48 AM.', 1, '2019-03-23 18:48:44', '2019-03-23 18:48:44'),
(1127, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 11:53 AM.', 1, '2019-03-23 18:53:11', '2019-03-23 18:53:11'),
(1128, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 11:53 AM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 18:53:11', '2019-03-23 18:53:11'),
(1129, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:53 AM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:53:11', '2019-03-23 18:53:11'),
(1130, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 11:53 am.Please wait for the e-prescription.', 1, '2019-03-23 18:53:11', '2019-03-23 18:53:11'),
(1131, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:53 am.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:53:11', '2019-03-23 18:53:11'),
(1132, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 11:54 AM.', 1, '2019-03-23 18:54:16', '2019-03-23 18:54:16'),
(1133, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 11:54 AM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 18:54:16', '2019-03-23 18:54:16'),
(1134, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:54 AM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:54:16', '2019-03-23 18:54:16'),
(1135, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 11:54 am.Please wait for the e-prescription.', 1, '2019-03-23 18:54:16', '2019-03-23 18:54:16'),
(1136, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:54 am.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:54:16', '2019-03-23 18:54:16'),
(1137, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 11:57 AM.', 1, '2019-03-23 18:57:18', '2019-03-23 18:57:18'),
(1138, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 11:57 AM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 18:57:18', '2019-03-23 18:57:18'),
(1139, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:57 AM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:57:18', '2019-03-23 18:57:18'),
(1140, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 11:57 am.Please wait for the e-prescription.', 1, '2019-03-23 18:57:19', '2019-03-23 18:57:19'),
(1141, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 11:57 am.Please write e-prescription and Diagnosis.', 1, '2019-03-23 18:57:19', '2019-03-23 18:57:19'),
(1142, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 12:00 PM.', 1, '2019-03-23 19:00:28', '2019-03-23 19:00:28'),
(1143, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 12:00 PM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 19:00:28', '2019-03-23 19:00:28'),
(1144, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:00 PM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:00:28', '2019-03-23 19:00:28'),
(1145, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 12:00 pm.Please wait for the e-prescription.', 1, '2019-03-23 19:00:28', '2019-03-23 19:00:28'),
(1146, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:00 pm.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:00:29', '2019-03-23 19:00:29'),
(1147, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 12:07 PM.', 1, '2019-03-23 19:07:25', '2019-03-23 19:07:25'),
(1148, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 12:07 PM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 19:07:26', '2019-03-23 19:07:26'),
(1149, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:07 PM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:07:26', '2019-03-23 19:07:26'),
(1150, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 12:07 pm.Please wait for the e-prescription.', 1, '2019-03-23 19:07:26', '2019-03-23 19:07:26'),
(1151, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:07 pm.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:07:26', '2019-03-23 19:07:26'),
(1152, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 12:08 PM.', 1, '2019-03-23 19:08:39', '2019-03-23 19:08:39'),
(1153, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 12:08 PM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 19:08:39', '2019-03-23 19:08:39'),
(1154, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:08 PM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:08:39', '2019-03-23 19:08:39'),
(1155, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 12:08 pm.Please wait for the e-prescription.', 1, '2019-03-23 19:08:39', '2019-03-23 19:08:39'),
(1156, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:08 pm.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:08:39', '2019-03-23 19:08:39'),
(1157, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 12:18 PM.', 1, '2019-03-23 19:18:14', '2019-03-23 19:18:14'),
(1158, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 12:18 PM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 19:18:14', '2019-03-23 19:18:14'),
(1159, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:18 PM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:18:14', '2019-03-23 19:18:14'),
(1160, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 12:18 pm.Please wait for the e-prescription.', 1, '2019-03-23 19:18:15', '2019-03-23 19:18:15'),
(1161, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:18 pm.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:18:15', '2019-03-23 19:18:15'),
(1162, 127, 63, 'Patient Priyanka has chosen you as the Care Coach on 23-03-2019 12:21 pm.', 1, '2019-03-23 19:21:48', '2019-03-23 19:21:48'),
(1163, 127, 144, 'Patient Priyanka has chosen you as the preferred Doctor on 23-03-2019 12:21 pm.', 1, '2019-03-23 19:21:48', '2019-03-23 19:21:48'),
(1164, 127, 63, 'Patient Priyanka has chosen you as the Care Coach on 23-03-2019 12:22 pm.', 1, '2019-03-23 19:22:00', '2019-03-23 19:22:00'),
(1165, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 23-03-2019 12:22 pm.', 1, '2019-03-23 19:22:00', '2019-03-23 19:22:00'),
(1166, 127, 63, 'Patient Priyanka has chosen you as the Care Coach on 23-03-2019 12:22 pm.', 1, '2019-03-23 19:22:39', '2019-03-23 19:22:39'),
(1167, 127, 144, 'Patient Priyanka has chosen you as the preferred Doctor on 23-03-2019 12:22 pm.', 1, '2019-03-23 19:22:39', '2019-03-23 19:22:39'),
(1168, 127, 63, 'Patient Priyanka has chosen you as the Care Coach on 23-03-2019 12:22 pm.', 1, '2019-03-23 19:22:50', '2019-03-23 19:22:50'),
(1169, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 23-03-2019 12:22 pm.', 1, '2019-03-23 19:22:50', '2019-03-23 19:22:50'),
(1170, 127, 63, 'Patient Priyanka has chosen you as the Care Coach on 23-03-2019 12:23 pm.', 1, '2019-03-23 19:23:20', '2019-03-23 19:23:20'),
(1171, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 23-03-2019 12:23 pm.', 1, '2019-03-23 19:23:20', '2019-03-23 19:23:20'),
(1172, 127, 63, 'Patient Priyanka has chosen you as the Care Coach on 23-03-2019 12:25 pm.', 1, '2019-03-23 19:25:39', '2019-03-23 19:25:39'),
(1173, 127, 75, 'Patient Priyanka has chosen you as the preferred Doctor on 23-03-2019 12:25 pm.', 1, '2019-03-23 19:25:39', '2019-03-23 19:25:39'),
(1174, 127, 63, 'Patient Priyanka has chosen you as the Care Coach on 23-03-2019 12:26 pm.', 1, '2019-03-23 19:26:19', '2019-03-23 19:26:19'),
(1175, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 23-03-2019 12:26 pm.', 1, '2019-03-23 19:26:19', '2019-03-23 19:26:19'),
(1176, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 12:28 PM.', 1, '2019-03-23 19:28:42', '2019-03-23 19:28:42'),
(1177, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 12:28 PM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 19:28:43', '2019-03-23 19:28:43'),
(1178, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:28 PM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:28:43', '2019-03-23 19:28:43'),
(1179, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 12:28 pm.Please wait for the e-prescription.', 1, '2019-03-23 19:28:43', '2019-03-23 19:28:43'),
(1180, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:28 pm.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:28:43', '2019-03-23 19:28:43'),
(1181, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 12:29 PM.', 1, '2019-03-23 19:29:16', '2019-03-23 19:29:16'),
(1182, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 12:29 PM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 19:29:16', '2019-03-23 19:29:16'),
(1183, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:29 PM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:29:16', '2019-03-23 19:29:16'),
(1184, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 12:29 pm.Please wait for the e-prescription.', 1, '2019-03-23 19:29:16', '2019-03-23 19:29:16'),
(1185, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:29 pm.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:29:16', '2019-03-23 19:29:16'),
(1186, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 12:29 PM.', 1, '2019-03-23 19:29:35', '2019-03-23 19:29:35'),
(1187, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 12:29 PM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 19:29:35', '2019-03-23 19:29:35'),
(1188, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:29 PM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:29:35', '2019-03-23 19:29:35'),
(1189, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 12:29 pm.Please wait for the e-prescription.', 1, '2019-03-23 19:29:35', '2019-03-23 19:29:35'),
(1190, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:29 pm.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:29:35', '2019-03-23 19:29:35'),
(1191, 127, 127, 'You have successfully credited INR 20 in your wallet on 23-03-2019 12:31 PM.', 1, '2019-03-23 19:31:27', '2019-03-23 19:31:27');
INSERT INTO `notification` (`id`, `from_id`, `to_id`, `notification_description`, `status`, `created_at`, `updated_at`) VALUES
(1192, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 12:31 PM.', 1, '2019-03-23 19:31:55', '2019-03-23 19:31:55'),
(1193, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 12:31 PM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 19:31:55', '2019-03-23 19:31:55'),
(1194, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:31 PM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:31:55', '2019-03-23 19:31:55'),
(1195, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 12:31 pm.Please wait for the e-prescription.', 1, '2019-03-23 19:31:56', '2019-03-23 19:31:56'),
(1196, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:31 pm.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:31:56', '2019-03-23 19:31:56'),
(1197, 127, 63, 'Patient Priyanka has chosen you as the Care Coach on 23-03-2019 12:37 pm.', 1, '2019-03-23 19:37:31', '2019-03-23 19:37:31'),
(1198, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 23-03-2019 12:37 pm.', 1, '2019-03-23 19:37:31', '2019-03-23 19:37:31'),
(1199, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 12:46 PM.', 1, '2019-03-23 19:46:12', '2019-03-23 19:46:12'),
(1200, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 12:46 PM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 19:46:13', '2019-03-23 19:46:13'),
(1201, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:46 PM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:46:13', '2019-03-23 19:46:13'),
(1202, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 12:46 pm.Please wait for the e-prescription.', 1, '2019-03-23 19:46:13', '2019-03-23 19:46:13'),
(1203, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 12:46 pm.Please write e-prescription and Diagnosis.', 1, '2019-03-23 19:46:13', '2019-03-23 19:46:13'),
(1204, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 01:04 PM.', 1, '2019-03-23 20:04:26', '2019-03-23 20:04:26'),
(1205, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 01:04 PM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 20:04:26', '2019-03-23 20:04:26'),
(1206, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 01:04 PM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 20:04:26', '2019-03-23 20:04:26'),
(1207, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 01:04 pm.Please wait for the e-prescription.', 1, '2019-03-23 20:04:27', '2019-03-23 20:04:27'),
(1208, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 01:04 pm.Please write e-prescription and Diagnosis.', 1, '2019-03-23 20:04:27', '2019-03-23 20:04:27'),
(1209, 127, 127, 'You have successfully debited INR 1 in your wallet on 23-03-2019 01:05 PM.', 1, '2019-03-23 20:05:07', '2019-03-23 20:05:07'),
(1210, 177, 127, 'Your wallet has been debited with INR 1 on 23-03-2019 01:05 PM as teleconsultation fees for Dr Jay.', 1, '2019-03-23 20:05:08', '2019-03-23 20:05:08'),
(1211, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 01:05 PM.Please write e-prescription and Diagnosis.', 1, '2019-03-23 20:05:08', '2019-03-23 20:05:08'),
(1212, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-03-2019 01:05 pm.Please wait for the e-prescription.', 1, '2019-03-23 20:05:08', '2019-03-23 20:05:08'),
(1213, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-03-2019 01:05 pm.Please write e-prescription and Diagnosis.', 1, '2019-03-23 20:05:08', '2019-03-23 20:05:08'),
(1214, 127, 127, 'You have successfully debited INR 1 in your wallet on 24-06-2019 05:10 PM.', 1, '2019-06-25 00:10:20', '2019-06-25 00:10:20'),
(1215, 127, 63, 'Patient Priyanka has chosen you as the Care Coach on 24-06-2019 05:26 pm.', 1, '2019-06-25 00:26:22', '2019-06-25 00:26:22'),
(1216, 127, 75, 'Patient Priyanka has chosen you as the preferred Doctor on 24-06-2019 05:26 pm.', 1, '2019-06-25 00:26:22', '2019-06-25 00:26:22'),
(1217, 127, 127, 'You have successfully credited INR 100 in your wallet on 24-06-2019 06:32 PM.', 1, '2019-06-25 01:32:57', '2019-06-25 01:32:57'),
(1218, 127, 127, 'You have successfully credited INR 120 in your wallet on 24-06-2019 06:33 PM.', 1, '2019-06-25 01:33:23', '2019-06-25 01:33:23'),
(1219, 127, 174, 'Patient Priyanka has chosen you as the Care Coach on 27-06-2019 02:20 pm.', 1, '2019-06-27 21:20:30', '2019-06-27 21:20:30'),
(1220, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 27-06-2019 02:20 pm.', 1, '2019-06-27 21:20:30', '2019-06-27 21:20:30'),
(1221, 177, 127, 'Dr. Jay has sent you an e-prescription on 27-06-2019 02:22 PM Please check and follow the instructions.', 1, '2019-06-27 21:22:21', '2019-06-27 21:22:21'),
(1222, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 27-06-2019 02:22 PM', 1, '2019-06-27 21:22:21', '2019-06-27 21:22:21'),
(1223, 177, 127, 'Dr. Jay has sent you an e-prescription on 27-06-2019 02:22 PM Please check and follow the instructions.', 1, '2019-06-27 21:22:22', '2019-06-27 21:22:22'),
(1224, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 27-06-2019 02:22 PM', 1, '2019-06-27 21:22:22', '2019-06-27 21:22:22'),
(1225, 205, 205, 'You have successfully credited INR 120 in your wallet on 28-06-2019 01:02 PM.', 1, '2019-06-28 20:02:13', '2019-06-28 20:02:13'),
(1226, 177, 127, 'Dr. Jay has sent you an e-prescription on 01-07-2019 06:53 AM Please check and follow the instructions.', 1, '2019-07-01 06:53:27', '2019-07-01 06:53:27'),
(1227, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 01-07-2019 06:53 AM', 1, '2019-07-01 06:53:27', '2019-07-01 06:53:27'),
(1228, 127, 174, 'Patient Priyanka has chosen you as the Care Coach on 09-07-2019 10:59 am.', 1, '2019-07-09 10:59:37', '2019-07-09 10:59:37'),
(1229, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 09-07-2019 10:59 am.', 1, '2019-07-09 10:59:38', '2019-07-09 10:59:38'),
(1230, 208, 208, 'You have successfully credited INR 1 & debited INR 1 in your wallet on 10-07-2019 08:50 AM.', 1, '2019-07-10 08:50:36', '2019-07-10 08:50:36'),
(1231, 208, 174, 'Patient Prin has chosen you as the Care Coach on 10-07-2019 08:52 am.', 1, '2019-07-10 08:52:36', '2019-07-10 08:52:36'),
(1232, 208, 144, 'Patient Prin has chosen you as the preferred Doctor on 10-07-2019 08:52 am.', 1, '2019-07-10 08:52:37', '2019-07-10 08:52:37'),
(1233, 208, 174, 'Patient Prin has chosen you as the Care Coach on 10-07-2019 08:52 am.', 1, '2019-07-10 08:52:59', '2019-07-10 08:52:59'),
(1234, 208, 144, 'Patient Prin has chosen you as the preferred Doctor on 10-07-2019 08:52 am.', 1, '2019-07-10 08:53:00', '2019-07-10 08:53:00'),
(1235, 127, 127, 'You have successfully credited INR 165 in your wallet on 17-07-2019 12:26 PM.', 1, '2019-07-17 12:26:21', '2019-07-17 12:26:21'),
(1236, 127, 127, 'You have successfully credited INR 100 in your wallet on 17-07-2019 12:32 PM.', 1, '2019-07-17 12:32:26', '2019-07-17 12:32:26'),
(1237, 127, 127, 'You have successfully credited INR 500 in your wallet on 19-07-2019 11:25 AM.', 1, '2019-07-19 11:25:38', '2019-07-19 11:25:38'),
(1238, 127, 174, 'Patient Priyanka has chosen you as the Care Coach on 19-07-2019 11:26 am.', 1, '2019-07-19 11:26:57', '2019-07-19 11:26:57'),
(1239, 127, 75, 'Patient Priyanka has chosen you as the preferred Doctor on 19-07-2019 11:26 am.', 1, '2019-07-19 11:26:58', '2019-07-19 11:26:58'),
(1240, 127, 174, 'Patient Priyanka has chosen you as the Care Coach on 19-07-2019 11:27 am.', 1, '2019-07-19 11:27:16', '2019-07-19 11:27:16'),
(1241, 127, 144, 'Patient Priyanka has chosen you as the preferred Doctor on 19-07-2019 11:27 am.', 1, '2019-07-19 11:27:17', '2019-07-19 11:27:17'),
(1242, 127, 127, 'You have successfully debited INR 400 in your wallet on 19-07-2019 11:46 AM.', 1, '2019-07-19 11:46:28', '2019-07-19 11:46:28'),
(1243, 177, 127, 'Your wallet has been debited with INR 400 on 19-07-2019 11:46 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-19 11:46:30', '2019-07-19 11:46:30'),
(1244, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 19-07-2019 11:46 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-19 11:46:32', '2019-07-19 11:46:32'),
(1245, 177, 127, 'You have successfully completed video teleconsultation with Jay on 19-07-2019 11:46 am.Please wait for the e-prescription.', 1, '2019-07-19 11:46:34', '2019-07-19 11:46:34'),
(1246, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 19-07-2019 11:46 am.Please write e-prescription and Diagnosis.', 1, '2019-07-19 11:46:35', '2019-07-19 11:46:35'),
(1247, 127, 127, 'You have successfully debited INR 400 in your wallet on 19-07-2019 11:49 AM.', 1, '2019-07-19 11:49:04', '2019-07-19 11:49:04'),
(1248, 177, 127, 'Your wallet has been debited with INR 400 on 19-07-2019 11:49 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-19 11:49:06', '2019-07-19 11:49:06'),
(1249, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 19-07-2019 11:49 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-19 11:49:07', '2019-07-19 11:49:07'),
(1250, 177, 127, 'You have successfully completed video teleconsultation with Jay on 19-07-2019 11:49 am.Please wait for the e-prescription.', 1, '2019-07-19 11:49:09', '2019-07-19 11:49:09'),
(1251, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 19-07-2019 11:49 am.Please write e-prescription and Diagnosis.', 1, '2019-07-19 11:49:10', '2019-07-19 11:49:10'),
(1252, 127, 127, 'You have successfully credited INR 200 in your wallet on 19-07-2019 12:19 PM.', 1, '2019-07-19 12:19:18', '2019-07-19 12:19:18'),
(1253, 127, 174, 'Patient Priyanka has chosen you as the Care Coach on 22-07-2019 05:55 am.', 1, '2019-07-22 05:55:59', '2019-07-22 05:55:59'),
(1254, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 22-07-2019 05:55 am.', 1, '2019-07-22 05:56:00', '2019-07-22 05:56:00'),
(1255, 127, 127, 'You have successfully debited INR 400 in your wallet on 22-07-2019 06:27 AM.', 1, '2019-07-22 06:27:47', '2019-07-22 06:27:47'),
(1256, 177, 127, 'Your wallet has been debited with INR 400 on 22-07-2019 06:27 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-22 06:27:48', '2019-07-22 06:27:48'),
(1257, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 22-07-2019 06:27 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-22 06:27:49', '2019-07-22 06:27:49'),
(1258, 177, 127, 'You have successfully completed video teleconsultation with Jay on 22-07-2019 06:27 am.Please wait for the e-prescription.', 1, '2019-07-22 06:27:51', '2019-07-22 06:27:51'),
(1259, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 22-07-2019 06:27 am.Please write e-prescription and Diagnosis.', 1, '2019-07-22 06:27:52', '2019-07-22 06:27:52'),
(1260, 127, 127, 'You have successfully debited INR 400 in your wallet on 22-07-2019 06:54 AM.', 1, '2019-07-22 06:54:22', '2019-07-22 06:54:22'),
(1261, 177, 127, 'Your wallet has been debited with INR 400 on 22-07-2019 06:54 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-22 06:54:24', '2019-07-22 06:54:24'),
(1262, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 22-07-2019 06:54 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-22 06:54:25', '2019-07-22 06:54:25'),
(1263, 177, 127, 'You have successfully completed video teleconsultation with Jay on 22-07-2019 06:54 am.Please wait for the e-prescription.', 1, '2019-07-22 06:54:26', '2019-07-22 06:54:26'),
(1264, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 22-07-2019 06:54 am.Please write e-prescription and Diagnosis.', 1, '2019-07-22 06:54:27', '2019-07-22 06:54:27'),
(1265, 127, 211, 'Patient Priyanka has chosen you as the Care Coach on 22-07-2019 07:49 am.', 1, '2019-07-22 07:49:52', '2019-07-22 07:49:52'),
(1266, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 22-07-2019 07:49 am.', 1, '2019-07-22 07:49:53', '2019-07-22 07:49:53'),
(1267, 201, 174, 'Patient Surabhi has chosen you as the Care Coach on 22-07-2019 09:09 am.', 1, '2019-07-22 09:09:45', '2019-07-22 09:09:45'),
(1268, 201, 75, 'Patient Surabhi has chosen you as the preferred Doctor on 22-07-2019 09:09 am.', 1, '2019-07-22 09:09:46', '2019-07-22 09:09:46'),
(1269, 127, 127, 'You have successfully debited INR 400 in your wallet on 23-07-2019 06:31 AM.', 1, '2019-07-23 06:31:02', '2019-07-23 06:31:02'),
(1270, 177, 127, 'Your wallet has been debited with INR 400 on 23-07-2019 06:31 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-23 06:31:04', '2019-07-23 06:31:04'),
(1271, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-07-2019 06:31 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-23 06:31:05', '2019-07-23 06:31:05'),
(1272, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-07-2019 06:31 am.Please wait for the e-prescription.', 1, '2019-07-23 06:31:07', '2019-07-23 06:31:07'),
(1273, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-07-2019 06:31 am.Please write e-prescription and Diagnosis.', 1, '2019-07-23 06:31:08', '2019-07-23 06:31:08'),
(1274, 127, 127, 'You have successfully debited INR 400 in your wallet on 23-07-2019 10:30 AM.', 1, '2019-07-23 10:30:29', '2019-07-23 10:30:29'),
(1275, 177, 127, 'Your wallet has been debited with INR 400 on 23-07-2019 10:30 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-23 10:30:31', '2019-07-23 10:30:31'),
(1276, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-07-2019 10:30 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-23 10:30:32', '2019-07-23 10:30:32'),
(1277, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-07-2019 10:30 am.Please wait for the e-prescription.', 1, '2019-07-23 10:30:33', '2019-07-23 10:30:33'),
(1278, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-07-2019 10:30 am.Please write e-prescription and Diagnosis.', 1, '2019-07-23 10:30:34', '2019-07-23 10:30:34'),
(1279, 127, 127, 'You have successfully debited INR 400 in your wallet on 23-07-2019 10:31 AM.', 1, '2019-07-23 10:31:31', '2019-07-23 10:31:31'),
(1280, 177, 127, 'Your wallet has been debited with INR 400 on 23-07-2019 10:31 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-23 10:31:32', '2019-07-23 10:31:32'),
(1281, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-07-2019 10:31 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-23 10:31:33', '2019-07-23 10:31:33'),
(1282, 177, 127, 'You have successfully completed video teleconsultation with Jay on 23-07-2019 10:31 am.Please wait for the e-prescription.', 1, '2019-07-23 10:31:35', '2019-07-23 10:31:35'),
(1283, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 23-07-2019 10:31 am.Please write e-prescription and Diagnosis.', 1, '2019-07-23 10:31:35', '2019-07-23 10:31:35'),
(1284, 177, 127, 'Dr. Jay has sent you an e-prescription on 23-07-2019 10:33 AM Please check and follow the instructions.', 1, '2019-07-23 10:33:05', '2019-07-23 10:33:05'),
(1285, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 23-07-2019 10:33 AM', 1, '2019-07-23 10:33:05', '2019-07-23 10:33:05'),
(1286, 177, 127, 'Dr. Jay has sent you an e-prescription on 23-07-2019 10:33 AM Please check and follow the instructions.', 1, '2019-07-23 10:33:06', '2019-07-23 10:33:06'),
(1287, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 23-07-2019 10:33 AM', 1, '2019-07-23 10:33:06', '2019-07-23 10:33:06'),
(1288, 177, 127, 'Dr. Jay has sent you an e-prescription on 23-07-2019 10:33 AM Please check and follow the instructions.', 1, '2019-07-23 10:33:08', '2019-07-23 10:33:08'),
(1289, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 23-07-2019 10:33 AM', 1, '2019-07-23 10:33:08', '2019-07-23 10:33:08'),
(1290, 199, 199, 'You have successfully debited INR 400 in your wallet on 23-07-2019 11:00 AM.', 1, '2019-07-23 11:00:19', '2019-07-23 11:00:19'),
(1291, 177, 199, 'Your wallet has been debited with INR 400 on 23-07-2019 11:00 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-23 11:00:20', '2019-07-23 11:00:20'),
(1292, 199, 177, 'Patient Prin has successfully completed teleconsultation with you on 23-07-2019 11:00 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-23 11:00:21', '2019-07-23 11:00:21'),
(1293, 177, 199, 'You have successfully completed video teleconsultation with Jay on 23-07-2019 11:00 am.Please wait for the e-prescription.', 1, '2019-07-23 11:00:23', '2019-07-23 11:00:23'),
(1294, 199, 177, 'Patient Prin has successfully completed teleconsultation with you on 23-07-2019 11:00 am.Please write e-prescription and Diagnosis.', 1, '2019-07-23 11:00:24', '2019-07-23 11:00:24'),
(1295, 201, 174, 'Patient Surabhi has chosen you as the Care Coach on 23-07-2019 05:46 pm.', 1, '2019-07-23 17:46:14', '2019-07-23 17:46:14'),
(1296, 201, 75, 'Patient Surabhi has chosen you as the preferred Doctor on 23-07-2019 05:46 pm.', 1, '2019-07-23 17:46:15', '2019-07-23 17:46:15'),
(1297, 127, 127, 'You have successfully credited INR 2000 in your wallet on 25-07-2019 07:28 AM.', 1, '2019-07-25 07:28:04', '2019-07-25 07:28:04'),
(1298, 127, 127, 'You have successfully debited INR 400 in your wallet on 25-07-2019 07:28 AM.', 1, '2019-07-25 07:28:22', '2019-07-25 07:28:22'),
(1299, 177, 127, 'Your wallet has been debited with INR 400 on 25-07-2019 07:28 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-25 07:28:24', '2019-07-25 07:28:24'),
(1300, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 25-07-2019 07:28 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-25 07:28:25', '2019-07-25 07:28:25'),
(1301, 177, 127, 'You have successfully completed video teleconsultation with Jay on 25-07-2019 07:28 am.Please wait for the e-prescription.', 1, '2019-07-25 07:28:27', '2019-07-25 07:28:27'),
(1302, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 25-07-2019 07:28 am.Please write e-prescription and Diagnosis.', 1, '2019-07-25 07:28:28', '2019-07-25 07:28:28'),
(1303, 127, 127, 'You have successfully credited INR 400 in your wallet on 25-07-2019 07:30 AM.', 1, '2019-07-25 07:30:27', '2019-07-25 07:30:27'),
(1304, 127, 127, 'You have successfully debited INR 400 in your wallet on 25-07-2019 07:30 AM.', 1, '2019-07-25 07:30:40', '2019-07-25 07:30:40'),
(1305, 177, 127, 'Your wallet has been debited with INR 400 on 25-07-2019 07:30 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-25 07:30:41', '2019-07-25 07:30:41'),
(1306, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 25-07-2019 07:30 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-25 07:30:42', '2019-07-25 07:30:42'),
(1307, 177, 127, 'You have successfully completed video teleconsultation with Jay on 25-07-2019 07:30 am.Please wait for the e-prescription.', 1, '2019-07-25 07:30:44', '2019-07-25 07:30:44'),
(1308, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 25-07-2019 07:30 am.Please write e-prescription and Diagnosis.', 1, '2019-07-25 07:30:45', '2019-07-25 07:30:45'),
(1309, 127, 127, 'You have successfully credited INR 1000 in your wallet on 25-07-2019 07:31 AM.', 1, '2019-07-25 07:31:33', '2019-07-25 07:31:33'),
(1310, 127, 127, 'You have successfully debited INR 400 in your wallet on 25-07-2019 07:31 AM.', 1, '2019-07-25 07:31:57', '2019-07-25 07:31:57'),
(1311, 177, 127, 'Your wallet has been debited with INR 400 on 25-07-2019 07:31 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-25 07:31:58', '2019-07-25 07:31:58'),
(1312, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 25-07-2019 07:31 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-25 07:31:59', '2019-07-25 07:31:59'),
(1313, 177, 127, 'You have successfully completed video teleconsultation with Jay on 25-07-2019 07:31 am.Please wait for the e-prescription.', 1, '2019-07-25 07:32:00', '2019-07-25 07:32:00'),
(1314, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 25-07-2019 07:31 am.Please write e-prescription and Diagnosis.', 1, '2019-07-25 07:32:01', '2019-07-25 07:32:01'),
(1315, 177, 127, 'Dr. Jay has sent you an e-prescription on 25-07-2019 07:32 AM Please check and follow the instructions.', 1, '2019-07-25 07:32:51', '2019-07-25 07:32:51'),
(1316, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 25-07-2019 07:32 AM', 1, '2019-07-25 07:32:51', '2019-07-25 07:32:51'),
(1317, 177, 127, 'Dr. Jay has sent you an e-prescription on 25-07-2019 07:33 AM Please check and follow the instructions.', 1, '2019-07-25 07:33:09', '2019-07-25 07:33:09'),
(1318, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 25-07-2019 07:33 AM', 1, '2019-07-25 07:33:09', '2019-07-25 07:33:09'),
(1319, 177, 127, 'Dr. Jay has sent you an e-prescription on 25-07-2019 07:33 AM Please check and follow the instructions.', 1, '2019-07-25 07:33:22', '2019-07-25 07:33:22'),
(1320, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 25-07-2019 07:33 AM', 1, '2019-07-25 07:33:22', '2019-07-25 07:33:22'),
(1321, 177, 127, 'Dr. Jay has sent you an e-prescription on 25-07-2019 07:34 AM Please check and follow the instructions.', 1, '2019-07-25 07:34:09', '2019-07-25 07:34:09'),
(1322, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 25-07-2019 07:34 AM', 1, '2019-07-25 07:34:09', '2019-07-25 07:34:09'),
(1323, 177, 127, 'Dr. Jay has sent you an e-prescription on 25-07-2019 07:34 AM Please check and follow the instructions.', 1, '2019-07-25 07:34:13', '2019-07-25 07:34:13'),
(1324, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 25-07-2019 07:34 AM', 1, '2019-07-25 07:34:13', '2019-07-25 07:34:13'),
(1325, 177, 127, 'Dr. Jay has sent you an e-prescription on 25-07-2019 07:38 AM Please check and follow the instructions.', 1, '2019-07-25 07:39:00', '2019-07-25 07:39:00'),
(1326, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 25-07-2019 07:38 AM', 1, '2019-07-25 07:39:00', '2019-07-25 07:39:00'),
(1327, 177, 127, 'Dr. Jay has sent you an e-prescription on 25-07-2019 07:39 AM Please check and follow the instructions.', 1, '2019-07-25 07:39:07', '2019-07-25 07:39:07'),
(1328, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 25-07-2019 07:39 AM', 1, '2019-07-25 07:39:07', '2019-07-25 07:39:07'),
(1329, 177, 127, 'Dr. Jay has sent you an e-prescription on 25-07-2019 07:42 AM Please check and follow the instructions.', 1, '2019-07-25 07:42:59', '2019-07-25 07:42:59'),
(1330, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 25-07-2019 07:42 AM', 1, '2019-07-25 07:42:59', '2019-07-25 07:42:59'),
(1331, 177, 127, 'Dr. Jay has sent you an e-prescription on 25-07-2019 07:43 AM Please check and follow the instructions.', 1, '2019-07-25 07:43:32', '2019-07-25 07:43:32'),
(1332, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 25-07-2019 07:43 AM', 1, '2019-07-25 07:43:32', '2019-07-25 07:43:32'),
(1333, 177, 127, 'Dr. Jay has sent you an e-prescription on 25-07-2019 07:43 AM Please check and follow the instructions.', 1, '2019-07-25 07:43:36', '2019-07-25 07:43:36'),
(1334, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 25-07-2019 07:43 AM', 1, '2019-07-25 07:43:36', '2019-07-25 07:43:36'),
(1335, 127, 212, 'Patient Priyanka has chosen you as the Care Coach on 25-07-2019 09:23 am.', 1, '2019-07-25 09:23:34', '2019-07-25 09:23:34'),
(1336, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 25-07-2019 09:23 am.', 1, '2019-07-25 09:23:35', '2019-07-25 09:23:35'),
(1337, 212, 127, 'Your Coach Priya has added new Lab Reports to your Records on 25-07-2019 09:26 am Kindly check', 1, '2019-07-25 09:26:01', '2019-07-25 09:26:01'),
(1338, 212, 127, 'Your Coach Priya has added new Procedure Reports to your Records on 25-07-2019 09:26 am.Kindly check.', 1, '2019-07-25 09:26:22', '2019-07-25 09:26:22'),
(1339, 212, 127, 'Your Coach Priya has added new Lab Reports to your Records on 25-07-2019 09:29 am Kindly check', 1, '2019-07-25 09:29:48', '2019-07-25 09:29:48'),
(1340, 212, 127, 'Your Coach Priya has added new Lab Reports to your Records on 25-07-2019 09:34 am Kindly check', 1, '2019-07-25 09:34:25', '2019-07-25 09:34:25'),
(1341, 212, 127, 'Your Coach Priya has added new Procedure Reports to your Records on 25-07-2019 09:34 am.Kindly check.', 1, '2019-07-25 09:34:53', '2019-07-25 09:34:53'),
(1342, 177, 127, 'Dr. Jay has sent you an e-prescription on 26-07-2019 07:04 AM Please check and follow the instructions.', 1, '2019-07-26 07:04:09', '2019-07-26 07:04:09'),
(1343, 177, NULL, 'Dr. Jay has written an e-prescription to Patient Priyanka on 26-07-2019 07:04 AM', 1, '2019-07-26 07:04:09', '2019-07-26 07:04:09'),
(1344, 127, 212, 'Patient Priyanka has chosen you as the Care Coach on 26-07-2019 07:27 am.', 1, '2019-07-26 07:27:30', '2019-07-26 07:27:30'),
(1345, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 26-07-2019 07:27 am.', 1, '2019-07-26 07:27:30', '2019-07-26 07:27:30'),
(1346, 127, 127, 'You have successfully debited INR 18 in your wallet on 26-07-2019 10:05 AM.', 1, '2019-07-26 10:05:04', '2019-07-26 10:05:04'),
(1347, 177, 127, 'Your wallet has been debited with INR 18 on 26-07-2019 10:05 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-26 10:05:06', '2019-07-26 10:05:06'),
(1348, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 26-07-2019 10:05 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-26 10:05:08', '2019-07-26 10:05:08'),
(1349, 177, 127, 'You have successfully completed video teleconsultation with Jay on 26-07-2019 10:05 am.Please wait for the e-prescription.', 1, '2019-07-26 10:05:09', '2019-07-26 10:05:09'),
(1350, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 26-07-2019 10:05 am.Please write e-prescription and Diagnosis.', 1, '2019-07-26 10:05:10', '2019-07-26 10:05:10'),
(1351, 127, 127, 'You have successfully debited INR 18 in your wallet on 26-07-2019 10:11 AM.', 1, '2019-07-26 10:11:05', '2019-07-26 10:11:05'),
(1352, 177, 127, 'Your wallet has been debited with INR 18 on 26-07-2019 10:11 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-26 10:11:06', '2019-07-26 10:11:06'),
(1353, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 26-07-2019 10:11 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-26 10:11:07', '2019-07-26 10:11:07'),
(1354, 177, 127, 'You have successfully completed video teleconsultation with Jay on 26-07-2019 10:11 am.Please wait for the e-prescription.', 1, '2019-07-26 10:11:08', '2019-07-26 10:11:08'),
(1355, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 26-07-2019 10:11 am.Please write e-prescription and Diagnosis.', 1, '2019-07-26 10:11:09', '2019-07-26 10:11:09'),
(1356, 127, 127, 'You have successfully debited INR 18 in your wallet on 26-07-2019 10:13 AM.', 1, '2019-07-26 10:13:20', '2019-07-26 10:13:20'),
(1357, 177, 127, 'Your wallet has been debited with INR 18 on 26-07-2019 10:13 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-26 10:13:22', '2019-07-26 10:13:22'),
(1358, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 26-07-2019 10:13 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-26 10:13:23', '2019-07-26 10:13:23'),
(1359, 177, 127, 'You have successfully completed video teleconsultation with Jay on 26-07-2019 10:13 am.Please wait for the e-prescription.', 1, '2019-07-26 10:13:24', '2019-07-26 10:13:24'),
(1360, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 26-07-2019 10:13 am.Please write e-prescription and Diagnosis.', 1, '2019-07-26 10:13:25', '2019-07-26 10:13:25'),
(1361, 127, 127, 'You have successfully debited INR 18 in your wallet on 26-07-2019 10:19 AM.', 1, '2019-07-26 10:19:09', '2019-07-26 10:19:09'),
(1362, 177, 127, 'Your wallet has been debited with INR 18 on 26-07-2019 10:19 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-26 10:19:10', '2019-07-26 10:19:10'),
(1363, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 26-07-2019 10:19 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-26 10:19:11', '2019-07-26 10:19:11'),
(1364, 177, 127, 'You have successfully completed video teleconsultation with Jay on 26-07-2019 10:19 am.Please wait for the e-prescription.', 1, '2019-07-26 10:19:13', '2019-07-26 10:19:13'),
(1365, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 26-07-2019 10:19 am.Please write e-prescription and Diagnosis.', 1, '2019-07-26 10:19:13', '2019-07-26 10:19:13'),
(1368, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 26-07-2019 10:21 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-26 10:21:24', '2019-07-26 10:21:24'),
(1369, 177, 127, 'You have successfully completed video teleconsultation with Jay on 26-07-2019 10:21 am.Please wait for the e-prescription.', 1, '2019-07-26 10:21:26', '2019-07-26 10:21:26'),
(1370, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 26-07-2019 10:21 am.Please write e-prescription and Diagnosis.', 1, '2019-07-26 10:21:27', '2019-07-26 10:21:27'),
(1371, 213, 213, 'You have successfully credited INR 18 in your wallet on 27-07-2019 04:46 AM.', 1, '2019-07-27 04:46:36', '2019-07-27 04:46:36'),
(1372, 213, 213, 'You have successfully debited INR 18 in your wallet on 27-07-2019 04:49 AM.', 1, '2019-07-27 04:49:08', '2019-07-27 04:49:08'),
(1373, 177, 213, 'Your wallet has been debited with INR 18 on 27-07-2019 04:49 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-27 04:49:09', '2019-07-27 04:49:09'),
(1374, 213, 177, 'Patient Princy has successfully completed teleconsultation with you on 27-07-2019 04:49 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-27 04:49:10', '2019-07-27 04:49:10'),
(1375, 177, 213, 'You have successfully completed video teleconsultation with Jay on 27-07-2019 04:49 am.Please wait for the e-prescription.', 1, '2019-07-27 04:49:12', '2019-07-27 04:49:12'),
(1376, 213, 177, 'Patient Princy has successfully completed teleconsultation with you on 27-07-2019 04:49 am.Please write e-prescription and Diagnosis.', 1, '2019-07-27 04:49:12', '2019-07-27 04:49:12'),
(1377, 213, 213, 'You have successfully debited INR 18 in your wallet on 27-07-2019 04:57 AM.', 1, '2019-07-27 04:57:05', '2019-07-27 04:57:05'),
(1378, 177, 213, 'Your wallet has been debited with INR 18 on 27-07-2019 04:57 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-27 04:57:06', '2019-07-27 04:57:06'),
(1379, 213, 177, 'Patient Princy has successfully completed teleconsultation with you on 27-07-2019 04:57 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-27 04:57:07', '2019-07-27 04:57:07'),
(1380, 177, 213, 'You have successfully completed video teleconsultation with Jay on 27-07-2019 04:57 am.Please wait for the e-prescription.', 1, '2019-07-27 04:57:09', '2019-07-27 04:57:09'),
(1381, 213, 177, 'Patient Princy has successfully completed teleconsultation with you on 27-07-2019 04:57 am.Please write e-prescription and Diagnosis.', 1, '2019-07-27 04:57:10', '2019-07-27 04:57:10'),
(1382, 213, 213, 'You have successfully credited INR 36 in your wallet on 27-07-2019 05:15 AM.', 1, '2019-07-27 05:15:51', '2019-07-27 05:15:51'),
(1383, 213, 213, 'You have successfully debited INR 18 in your wallet on 27-07-2019 05:19 AM.', 1, '2019-07-27 05:19:30', '2019-07-27 05:19:30'),
(1384, 177, 213, 'Your wallet has been debited with INR 18 on 27-07-2019 05:19 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-27 05:19:32', '2019-07-27 05:19:32'),
(1385, 213, 177, 'Patient Princy has successfully completed teleconsultation with you on 27-07-2019 05:19 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-27 05:19:33', '2019-07-27 05:19:33'),
(1386, 177, 213, 'You have successfully completed video teleconsultation with Jay on 27-07-2019 05:19 am.Please wait for the e-prescription.', 1, '2019-07-27 05:19:35', '2019-07-27 05:19:35'),
(1387, 213, 177, 'Patient Princy has successfully completed teleconsultation with you on 27-07-2019 05:19 am.Please write e-prescription and Diagnosis.', 1, '2019-07-27 05:19:36', '2019-07-27 05:19:36'),
(1388, 213, 212, 'Patient Princy has chosen you as the Care Coach on 27-07-2019 05:33 am.', 1, '2019-07-27 05:33:49', '2019-07-27 05:33:49'),
(1389, 213, 177, 'Patient Princy has chosen you as the preferred Doctor on 27-07-2019 05:33 am.', 1, '2019-07-27 05:33:50', '2019-07-27 05:33:50'),
(1391, 212, 213, 'Your Coach Priya has added new Lab Reports to your Records on 27-07-2019 05:38 am Kindly check', 1, '2019-07-27 05:38:33', '2019-07-27 05:38:33'),
(1392, 212, 213, 'Your Coach Priya has added new Procedure Reports to your Records on 27-07-2019 05:41 am.Kindly check.', 1, '2019-07-27 05:41:33', '2019-07-27 05:41:33'),
(1393, 213, 212, 'Patient Princy has chosen you as the Care Coach on 27-07-2019 06:19 am.', 1, '2019-07-27 06:19:16', '2019-07-27 06:19:16'),
(1394, 213, 177, 'Patient Princy has chosen you as the preferred Doctor on 27-07-2019 06:19 am.', 1, '2019-07-27 06:19:17', '2019-07-27 06:19:17'),
(1395, 127, 127, 'You have successfully debited INR 18 in your wallet on 31-07-2019 06:29 AM.', 1, '2019-07-31 06:29:51', '2019-07-31 06:29:51'),
(1396, 177, 127, 'Your wallet has been debited with INR 18 on 31-07-2019 06:29 AM as teleconsultation fees for Dr Jay.', 1, '2019-07-31 06:29:53', '2019-07-31 06:29:53'),
(1397, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 31-07-2019 06:29 AM.Please write e-prescription and Diagnosis.', 1, '2019-07-31 06:29:54', '2019-07-31 06:29:54'),
(1398, 177, 127, 'You have successfully completed video teleconsultation with Jay on 31-07-2019 06:29 am.Please wait for the e-prescription.', 1, '2019-07-31 06:29:55', '2019-07-31 06:29:55'),
(1399, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 31-07-2019 06:29 am.Please write e-prescription and Diagnosis.', 1, '2019-07-31 06:29:56', '2019-07-31 06:29:56'),
(1400, 201, 217, 'Patient Surabhi has chosen you as the Care Coach on 31-07-2019 11:54 am.', 1, '2019-07-31 11:54:50', '2019-07-31 11:54:50'),
(1401, 201, 75, 'Patient Surabhi has chosen you as the preferred Doctor on 31-07-2019 11:54 am.', 1, '2019-07-31 11:54:51', '2019-07-31 11:54:51'),
(1402, 217, 201, 'Your Coach Coach Kiara has added new Lab Reports to your Records on 31-07-2019 11:58 am Kindly check', 1, '2019-07-31 11:58:41', '2019-07-31 11:58:41'),
(1403, 217, 201, 'Your Coach Coach Kiara has added new Procedure Reports to your Records on 31-07-2019 12:05 pm.Kindly check.', 1, '2019-07-31 12:05:09', '2019-07-31 12:05:09'),
(1404, 75, 201, 'Dr. No Docto has sent you an e-prescription on 31-07-2019 12:25 PM Please check and follow the instructions.', 1, '2019-07-31 12:25:29', '2019-07-31 12:25:29'),
(1405, 75, NULL, 'Dr. No Docto has written an e-prescription to Patient Surabhi on 31-07-2019 12:25 PM', 1, '2019-07-31 12:25:29', '2019-07-31 12:25:29'),
(1406, 75, 201, 'Dr. No Docto has sent you an e-prescription on 31-07-2019 12:27 PM Please check and follow the instructions.', 1, '2019-07-31 12:27:16', '2019-07-31 12:27:16'),
(1407, 75, NULL, 'Dr. No Docto has written an e-prescription to Patient Surabhi on 31-07-2019 12:27 PM', 1, '2019-07-31 12:27:16', '2019-07-31 12:27:16'),
(1408, 75, 201, 'Dr. No Docto has sent you an e-prescription on 31-07-2019 12:28 PM Please check and follow the instructions.', 1, '2019-07-31 12:28:13', '2019-07-31 12:28:13'),
(1409, 75, NULL, 'Dr. No Docto has written an e-prescription to Patient Surabhi on 31-07-2019 12:28 PM', 1, '2019-07-31 12:28:13', '2019-07-31 12:28:13'),
(1410, 127, 127, 'You have successfully debited INR 18 in your wallet on 01-08-2019 05:51 AM.', 1, '2019-08-01 05:51:28', '2019-08-01 05:51:28'),
(1411, 177, 127, 'Your wallet has been debited with INR 18 on 01-08-2019 05:51 AM as teleconsultation fees for Dr Jay.', 1, '2019-08-01 05:51:29', '2019-08-01 05:51:29'),
(1412, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 01-08-2019 05:51 AM.Please write e-prescription and Diagnosis.', 1, '2019-08-01 05:51:30', '2019-08-01 05:51:30'),
(1413, 177, 127, 'You have successfully completed video teleconsultation with Jay on 01-08-2019 05:51 am.Please wait for the e-prescription.', 1, '2019-08-01 05:51:32', '2019-08-01 05:51:32'),
(1414, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 01-08-2019 05:51 am.Please write e-prescription and Diagnosis.', 1, '2019-08-01 05:51:33', '2019-08-01 05:51:33'),
(1415, 127, 127, 'You have successfully debited INR 18 in your wallet on 01-08-2019 05:58 AM.', 1, '2019-08-01 05:58:11', '2019-08-01 05:58:11'),
(1416, 177, 127, 'Your wallet has been debited with INR 18 on 01-08-2019 05:58 AM as teleconsultation fees for Dr Jay.', 1, '2019-08-01 05:58:13', '2019-08-01 05:58:13'),
(1417, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 01-08-2019 05:58 AM.Please write e-prescription and Diagnosis.', 1, '2019-08-01 05:58:14', '2019-08-01 05:58:14'),
(1418, 177, 127, 'You have successfully completed video teleconsultation with Jay on 01-08-2019 05:58 am.Please wait for the e-prescription.', 1, '2019-08-01 05:58:15', '2019-08-01 05:58:15'),
(1419, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 01-08-2019 05:58 am.Please write e-prescription and Diagnosis.', 1, '2019-08-01 05:58:16', '2019-08-01 05:58:16'),
(1420, 127, 127, 'You have successfully debited INR 18 in your wallet on 01-08-2019 07:44 AM.', 1, '2019-08-01 07:44:20', '2019-08-01 07:44:20'),
(1421, 177, 127, 'Your wallet has been debited with INR 18 on 01-08-2019 07:44 AM as teleconsultation fees for Dr Jay.', 1, '2019-08-01 07:44:31', '2019-08-01 07:44:31'),
(1422, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 01-08-2019 07:44 AM.Please write e-prescription and Diagnosis.', 1, '2019-08-01 07:44:32', '2019-08-01 07:44:32'),
(1423, 177, 127, 'You have successfully completed video teleconsultation with Jay on 01-08-2019 07:44 am.Please wait for the e-prescription.', 1, '2019-08-01 07:44:34', '2019-08-01 07:44:34'),
(1424, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 01-08-2019 07:44 am.Please write e-prescription and Diagnosis.', 1, '2019-08-01 07:44:34', '2019-08-01 07:44:34'),
(1425, 127, 127, 'You have successfully debited INR 18 in your wallet on 01-08-2019 08:32 AM.', 1, '2019-08-01 08:32:19', '2019-08-01 08:32:19'),
(1426, 177, 127, 'Your wallet has been debited with INR 18 on 01-08-2019 08:32 AM as teleconsultation fees for Dr Jay.', 1, '2019-08-01 08:32:21', '2019-08-01 08:32:21'),
(1427, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 01-08-2019 08:32 AM.Please write e-prescription and Diagnosis.', 1, '2019-08-01 08:32:22', '2019-08-01 08:32:22'),
(1428, 177, 127, 'You have successfully completed video teleconsultation with Jay on 01-08-2019 08:32 am.Please wait for the e-prescription.', 1, '2019-08-01 08:32:23', '2019-08-01 08:32:23'),
(1429, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 01-08-2019 08:32 am.Please write e-prescription and Diagnosis.', 1, '2019-08-01 08:32:24', '2019-08-01 08:32:24'),
(1430, 127, 127, 'You have successfully debited INR 18 in your wallet on 01-08-2019 08:33 AM.', 1, '2019-08-01 08:33:43', '2019-08-01 08:33:43'),
(1431, 177, 127, 'Your wallet has been debited with INR 18 on 01-08-2019 08:33 AM as teleconsultation fees for Dr Jay.', 1, '2019-08-01 08:33:45', '2019-08-01 08:33:45'),
(1432, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 01-08-2019 08:33 AM.Please write e-prescription and Diagnosis.', 1, '2019-08-01 08:33:46', '2019-08-01 08:33:46'),
(1433, 177, 127, 'You have successfully completed video teleconsultation with Jay on 01-08-2019 08:33 am.Please wait for the e-prescription.', 1, '2019-08-01 08:33:47', '2019-08-01 08:33:47'),
(1434, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 01-08-2019 08:33 am.Please write e-prescription and Diagnosis.', 1, '2019-08-01 08:33:48', '2019-08-01 08:33:48'),
(1435, 127, 212, 'Patient Priyanka has chosen you as the Care Coach on 01-08-2019 08:45 am.', 1, '2019-08-01 08:45:22', '2019-08-01 08:45:22'),
(1436, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 01-08-2019 08:45 am.', 1, '2019-08-01 08:45:24', '2019-08-01 08:45:24'),
(1437, 127, 211, 'Patient Priyanka has chosen you as the Care Coach on 01-08-2019 08:46 am.', 1, '2019-08-01 08:46:55', '2019-08-01 08:46:55'),
(1438, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 01-08-2019 08:46 am.', 1, '2019-08-01 08:46:56', '2019-08-01 08:46:56'),
(1439, 127, 127, 'You have successfully debited INR 18 in your wallet on 01-08-2019 10:39 AM.', 1, '2019-08-01 10:39:19', '2019-08-01 10:39:19'),
(1440, 177, 127, 'Your wallet has been debited with INR 18 on 01-08-2019 10:39 AM as teleconsultation fees for Dr Jay.', 1, '2019-08-01 10:39:21', '2019-08-01 10:39:21'),
(1441, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 01-08-2019 10:39 AM.Please write e-prescription and Diagnosis.', 1, '2019-08-01 10:39:22', '2019-08-01 10:39:22'),
(1442, 177, 127, 'You have successfully completed video teleconsultation with Jay on 01-08-2019 10:39 am.Please wait for the e-prescription.', 1, '2019-08-01 10:39:24', '2019-08-01 10:39:24'),
(1443, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 01-08-2019 10:39 am.Please write e-prescription and Diagnosis.', 1, '2019-08-01 10:39:25', '2019-08-01 10:39:25'),
(1444, 127, 212, 'Patient Priyanka has chosen you as the Care Coach on 05-08-2019 01:00 pm.', 1, '2019-08-05 13:00:55', '2019-08-05 13:00:55'),
(1445, 127, 177, 'Patient Priyanka has chosen you as the preferred Doctor on 05-08-2019 01:00 pm.', 1, '2019-08-05 13:00:56', '2019-08-05 13:00:56'),
(1446, 212, 127, 'Your Coach Priya has added new Procedure Reports to your Records on 06-08-2019 05:21 am.Kindly check.', 1, '2019-08-06 05:22:00', '2019-08-06 05:22:00'),
(1447, 213, 213, 'You have successfully credited INR 500 in your wallet on 07-08-2019 06:52 PM.', 1, '2019-08-07 18:53:00', '2019-08-07 18:53:00'),
(1448, 213, 213, 'You have successfully debited INR 1 in your wallet on 07-08-2019 06:53 PM.', 1, '2019-08-07 18:53:55', '2019-08-07 18:53:55'),
(1449, 213, 213, 'You have successfully debited INR 1 in your wallet on 07-08-2019 06:55 PM.', 1, '2019-08-07 18:55:01', '2019-08-07 18:55:01'),
(1450, 200, 200, 'You have successfully credited INR 18 in your wallet on 08-08-2019 10:22 AM.', 1, '2019-08-08 10:22:51', '2019-08-08 10:22:51'),
(1451, 218, 218, 'You have successfully credited INR 50 in your wallet on 08-08-2019 10:46 AM.', 1, '2019-08-08 10:46:44', '2019-08-08 10:46:44'),
(1452, 127, 127, 'You have successfully credited INR 50 in your wallet on 08-08-2019 11:00 AM.', 1, '2019-08-08 11:00:44', '2019-08-08 11:00:44'),
(1453, 127, 127, 'You have successfully debited INR 18 in your wallet on 08-08-2019 11:23 AM.', 1, '2019-08-08 11:23:42', '2019-08-08 11:23:42'),
(1454, 177, 127, 'Your wallet has been debited with INR 18 on 08-08-2019 11:23 AM as teleconsultation fees for Dr Jay.', 1, '2019-08-08 11:23:43', '2019-08-08 11:23:43'),
(1455, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 08-08-2019 11:23 AM.Please write e-prescription and Diagnosis.', 1, '2019-08-08 11:23:44', '2019-08-08 11:23:44'),
(1456, 177, 127, 'You have successfully completed video teleconsultation with Jay on 08-08-2019 11:23 am.Please wait for the e-prescription.', 1, '2019-08-08 11:23:45', '2019-08-08 11:23:45'),
(1457, 127, 177, 'Patient Priyanka has successfully completed teleconsultation with you on 08-08-2019 11:23 am.Please write e-prescription and Diagnosis.', 1, '2019-08-08 11:23:45', '2019-08-08 11:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('004e8f164b58bebaa4f417c8e563fc03103b8581e6e38ab22d61292db6df067e36a1ed072cbe57f6', 127, 1, 'MyApp', '[]', 0, '2019-08-07 16:39:52', '2019-08-07 16:39:52', '2020-08-07 16:39:52'),
('005108c424bdfce96399cac0be7c100b8fb86f9905bcf0d9299b3fec4411fb761cfd8ed89bb6a842', 32, 1, 'MyApp', '[]', 0, '2018-09-07 00:25:06', '2018-09-07 00:25:06', '2019-09-06 17:25:06'),
('006b11e7c2e55af18920605ab94cca401515390cccad3d69587f0b7a269a9af84629a04d617ca783', 41, 1, 'MyApp', '[]', 0, '2018-09-10 17:43:24', '2018-09-10 17:43:24', '2019-09-10 10:43:24'),
('0088f3a341c3dbcaee4f65bca4575936cff034d40b7a34a11a45b351fdaaef09e30b7243237df5af', 39, 1, 'MyApp', '[]', 0, '2018-09-04 23:50:22', '2018-09-04 23:50:22', '2019-09-04 16:50:22'),
('00ac673c07190baa3d1c281775686ae0db473b9b8587e4581425faff67b459884b7d594f529b0401', 75, 1, 'MyApp', '[]', 0, '2018-12-10 17:32:56', '2018-12-10 17:32:56', '2019-12-10 10:32:56'),
('0114ae799c18930c5c2e78894cab62c520cbdc7cf9a679c040673b59eb8d26e2025a6e81ab629e65', 172, 1, 'MyApp', '[]', 0, '2019-02-22 22:19:47', '2019-02-22 22:19:47', '2020-02-22 15:19:47'),
('012322cbaa3cb4ac45ccd3a37369ead9c1bad70cb6ef052865786c65b04f54a4e534d56763085a99', 209, 1, 'MyApp', '[]', 0, '2019-07-11 07:11:33', '2019-07-11 07:11:33', '2020-07-11 07:11:33'),
('0127f6beefccb742f2501c7832a92720bd14499ca3ff5b6c731881003068f4793c3d56d959918390', 79, 1, 'MyApp', '[]', 0, '2018-10-15 05:21:44', '2018-10-15 05:21:44', '2019-10-14 22:21:44'),
('012f9ff031cfdf1652ad9daf3c5715642b79aecb8a07448fd9c8bc93683522579bdd3bb9cef44e19', 32, 1, 'MyApp', '[]', 0, '2018-09-04 01:07:08', '2018-09-04 01:07:08', '2019-09-03 18:07:08'),
('016ec84869442fc9386c1e3a5b8f8249ee1b3f41bf8dfe9b77b2a0ce8b17cc540f4c9acbe0313c8b', 127, 1, 'MyApp', '[]', 0, '2019-03-23 19:33:59', '2019-03-23 19:33:59', '2020-03-23 12:33:59'),
('01d6a950327bb02ea5a89032462f5df1d59d156bf9312e50e42539c35b81139b715d76178155e203', 127, 1, 'MyApp', '[]', 0, '2019-07-25 09:35:16', '2019-07-25 09:35:16', '2020-07-25 09:35:16'),
('01ea57813fa92bb5d5ce712811f5a993d68bdaa3bf132dcad2f9b7cc735bd2695f75cf005b430ca7', 37, 1, 'MyApp', '[]', 0, '2018-09-08 18:09:34', '2018-09-08 18:09:34', '2019-09-08 11:09:34'),
('022d338e0d070f571756dd597f31ee140cc7f58ba2e343362e259b096f22e6ec47afbeacc67ca916', 32, 1, 'MyApp', '[]', 0, '2018-09-08 19:29:45', '2018-09-08 19:29:45', '2019-09-08 12:29:45'),
('0234f67ccedf08da67fb7f3c00d161b063ef0c65500067977d2b668d9424510cc0b629bc14683b53', 127, 1, 'MyApp', '[]', 0, '2019-07-23 06:30:05', '2019-07-23 06:30:05', '2020-07-23 06:30:05'),
('0273cd5580e5460972bbd7ce587732e06555c0f61b2f996211c384d2d07d35701cd08b7f77665233', 56, 1, 'MyApp', '[]', 0, '2018-10-01 04:53:19', '2018-10-01 04:53:19', '2019-09-30 21:53:19'),
('033f5e2de49895a9541020991057465516494399678c5012d9ed1ab5a87760affeeb2eb77c70e1a1', 127, 1, 'MyApp', '[]', 0, '2019-08-01 08:29:07', '2019-08-01 08:29:07', '2020-08-01 08:29:07'),
('035fc1cdac254c54d7379a168afcf0c9f8b9eea552729c02d10a7ee97269625b0ec615de1b605403', 211, 1, 'MyApp', '[]', 0, '2019-07-22 07:39:11', '2019-07-22 07:39:11', '2020-07-22 07:39:11'),
('0365ff0ba7e22ac90bc8b1692202f674f757e11d18be28bc655f065fb95161ae873803e4ae4f55b7', 177, 1, 'MyApp', '[]', 0, '2019-07-26 06:53:19', '2019-07-26 06:53:19', '2020-07-26 06:53:19'),
('03f745a7535746ff381a4aa90616fe8b1caadc2d032ca23a69be221f0712dfdd6ce421615b3fc0af', 177, 1, 'MyApp', '[]', 0, '2019-07-22 06:08:53', '2019-07-22 06:08:53', '2020-07-22 06:08:53'),
('0402e1904681d1f86c56bdf115c68fcfb06b3bff5039a7616506acbc9dcffb931a5d6baceaf621ad', 157, 1, 'MyApp', '[]', 0, '2019-02-16 11:15:10', '2019-02-16 11:15:10', '2020-02-16 04:15:10'),
('043b0d7b405e7a3f4fab6c0cde9f2711130554efa4cedc402c036fba4806c6ae33397adfaf62ea17', 37, 1, 'MyApp', '[]', 0, '2018-09-06 17:54:53', '2018-09-06 17:54:53', '2019-09-06 10:54:53'),
('04504402ef8a629467416a0cd78c7210770d80fd18a7d9361b918c68bf4bea9f752394d45dd49a0e', 177, 1, 'MyApp', '[]', 0, '2019-07-01 07:11:05', '2019-07-01 07:11:05', '2020-07-01 07:11:05'),
('04a4a6b140b596660c0d3aac43c9ddf79d6012649ee0ed07ad4f327a724f572b9e79018568a89c72', 177, 1, 'MyApp', '[]', 0, '2019-07-23 06:12:23', '2019-07-23 06:12:23', '2020-07-23 06:12:23'),
('04a6a062dbb24f023a2b2308e41f8a2f535fd7a3e449e0a8b8f3addc65c645cffb2c2dee90700e1b', 63, 1, 'MyApp', '[]', 0, '2018-11-22 22:37:18', '2018-11-22 22:37:18', '2019-11-22 15:37:18'),
('04e4b9281d7e4cee2b5b3f2ba18f1be979d0ce1af875b7e448975c25c5dd5e3a2af5d72bb88121b3', 51, 1, 'MyApp', '[]', 0, '2018-09-28 23:01:27', '2018-09-28 23:01:27', '2019-09-28 16:01:27'),
('04fa0f6c37a7aab8dc413399c7b6caae2118e17ec84ee3fb857a13cbf47539b3962a56d0f823191c', 75, 1, 'MyApp', '[]', 0, '2018-10-17 04:01:28', '2018-10-17 04:01:28', '2019-10-16 21:01:28'),
('04fa167712c3d83630c96cc3e31f21fdd0056b3842c042138c2ce89e27be5a94e0ecac097e929b67', 218, 1, 'MyApp', '[]', 0, '2019-08-08 10:44:36', '2019-08-08 10:44:36', '2020-08-08 10:44:36'),
('05217f7710f2371c8a92f6e4fbbd37a5720fe43fae641c02091303744a4289d7f7a8436c6c3a5d83', 149, 1, 'MyApp', '[]', 0, '2019-02-09 22:43:57', '2019-02-09 22:43:57', '2020-02-09 15:43:57'),
('052561a3e326dd03564fa2ea3d195547f89a08f178b37611a29b90a0fbf1db49feec4c7785d7e37a', 127, 1, 'MyApp', '[]', 0, '2019-07-29 08:37:42', '2019-07-29 08:37:42', '2020-07-29 08:37:42'),
('052c4fa78c6a2c2dafb1d120ebc7ecbac433e0c1ced5ed835ed4a674f4ccd7f5e980c6d7700ac9fc', 58, 1, 'MyApp', '[]', 0, '2018-10-01 19:58:44', '2018-10-01 19:58:44', '2019-10-01 12:58:44'),
('054a0dc4ce344ede5ce1d16c53ea8e51810b1320edb5daee715e5d00a680d7419632847544ea71b8', 102, 1, 'MyApp', '[]', 0, '2018-11-24 23:16:25', '2018-11-24 23:16:25', '2019-11-24 16:16:25'),
('0642b1b8ac7f28f8d3297a9e5c4cf322542e12c3e25f6356b18ac9da72731266ef8d0ee34b6f853c', 37, 1, 'MyApp', '[]', 0, '2018-09-13 22:24:46', '2018-09-13 22:24:46', '2019-09-13 15:24:46'),
('066050b303bce4b1c55e96e2d85fb139319319ae410f0241f4166362b91bb52fcaa94fc4001ba52d', 37, 1, 'MyApp', '[]', 0, '2018-09-06 19:32:59', '2018-09-06 19:32:59', '2019-09-06 12:32:59'),
('066e17dc8f8caf5a98fc8e2f23e5b1c40c471394f99a28ed79693861a4f59a8fe88bfd21e1b1935b', 32, 1, 'MyApp', '[]', 0, '2018-09-17 17:42:55', '2018-09-17 17:42:55', '2019-09-17 10:42:55'),
('074e7172ca519dd4c2ada3060427d00d56b42200419b9cf424ac99b2a7a3fb2e04d16f45ab8f0de0', 36, 1, 'MyApp', '[]', 0, '2018-09-28 18:09:10', '2018-09-28 18:09:10', '2019-09-28 11:09:10'),
('07dc6098da424aa5159da01638f5cd946d19ea1d216d1a2b9e8c3450ba0fedd599ee408a71b36f3b', 185, 1, 'MyApp', '[]', 0, '2019-03-09 21:46:43', '2019-03-09 21:46:43', '2020-03-09 14:46:43'),
('07e460c4673e91cb1090c71f1675bc7c3bce48f6d960f8e2a385accdb2b5d16912c40a77783cf6e8', 87, 1, 'MyApp', '[]', 0, '2019-01-04 23:18:03', '2019-01-04 23:18:03', '2020-01-04 16:18:03'),
('08fd0f794613d41d9bf0211553fbdd4f3d4ea3f2f25934a20797c7af740cc6121453d97968adce91', 117, 1, 'MyApp', '[]', 0, '2018-12-26 17:37:55', '2018-12-26 17:37:55', '2019-12-26 10:37:55'),
('096993eaccd892e84621ab12d446164964e79452f11871694abe95c719ef17f939515d9bf35ef130', 31, 1, 'MyApp', '[]', 0, '2018-09-07 01:07:23', '2018-09-07 01:07:23', '2019-09-06 18:07:23'),
('09a8b0040e8041d45349af2c452119840d0ff0cd80c05b9cb927881ce5cbf9429117cc6cb7589cb7', 127, 1, 'MyApp', '[]', 0, '2019-07-19 06:09:35', '2019-07-19 06:09:35', '2020-07-19 06:09:35'),
('09d91b51396ed26968a301ef55f7dbce39e36c6896db0e56a8e200c5b7bf57834166abc43a049f66', 127, 1, 'MyApp', '[]', 0, '2019-07-22 06:00:34', '2019-07-22 06:00:34', '2020-07-22 06:00:34'),
('09e0dd2407de1062b88c46c4fbaf14313b9ae0f5cc79a909c99c3442d08d95003f432da6819fd43c', 127, 1, 'MyApp', '[]', 0, '2019-07-23 06:25:26', '2019-07-23 06:25:26', '2020-07-23 06:25:26'),
('0a27c24d7baec173c3869468ab407b5f6e2cf1005beadcf65821e8648bd3f92ea08c8df4234f3b62', 127, 1, 'MyApp', '[]', 0, '2019-02-11 18:15:54', '2019-02-11 18:15:54', '2020-02-11 11:15:54'),
('0a855d32fabcbd58b0a8da00a1f55a76cdf736574ecfef9a3b2fc4ff0d24d1d2731b03ba5cd0d94a', 127, 1, 'MyApp', '[]', 0, '2019-06-18 18:16:11', '2019-06-18 18:16:11', '2020-06-18 11:16:11'),
('0b00c9f7447636ac17e7c6f75edfe4002c747199909affd28f2b835c8a2c91f1f7201c120af27c9e', 32, 1, 'MyApp', '[]', 0, '2018-09-08 19:36:47', '2018-09-08 19:36:47', '2019-09-08 12:36:47'),
('0b6c5c23016b2388cf07de2ec639b20eceb80ab79ed7b41629a18d0caffdfa9ed8c83e1faff6268b', 35, 1, 'MyApp', '[]', 0, '2018-09-06 19:30:29', '2018-09-06 19:30:29', '2019-09-06 12:30:29'),
('0b744c2047971a1ce02f0cc4c71e555f092ff788d2966280b333dd9427801df36793a7656dbb1b5c', 38, 1, 'MyApp', '[]', 0, '2018-09-25 22:58:05', '2018-09-25 22:58:05', '2019-09-25 15:58:05'),
('0c6ef5b70a4452f82bf33353019b5c0019474da0184b4e2be5c103f2790b7aa882d82c54010180f6', 87, 1, 'MyApp', '[]', 0, '2018-12-23 03:43:18', '2018-12-23 03:43:18', '2019-12-22 20:43:18'),
('0c9021c5fd972b48af710b1bfb4d4032ee9302bfc193df53d10288b8e2cfb1fffd46365f8c0b2a7d', 37, 1, 'MyApp', '[]', 0, '2018-09-08 18:09:19', '2018-09-08 18:09:19', '2019-09-08 11:09:19'),
('0c9d520b61f1c99d0764e4566f2516ca3f7f45336fa98bcc1699b79a7c215811319b77f93ba7aea8', 127, 1, 'MyApp', '[]', 0, '2019-06-22 23:12:02', '2019-06-22 23:12:02', '2020-06-22 16:12:02'),
('0ca35fb7749a3b88efd8d85e1826e304d72d8d1d84c25f85233ed51f3f829d6dbc687c36d0a5c0ff', 127, 1, 'MyApp', '[]', 0, '2019-03-11 17:21:19', '2019-03-11 17:21:19', '2020-03-11 10:21:19'),
('0cabe8a2eab8a4dc395b4c9a79c394d2a2c1b9af7a9982b870daaf31ae4fc85fbf26176fa41d001a', 159, 1, 'MyApp', '[]', 0, '2019-02-17 14:02:44', '2019-02-17 14:02:44', '2020-02-17 07:02:44'),
('0d25f5d2e047842d0d37d4a533567460c259bbe1b6790c78033946e7fdd9870d07ca7058d7da0a94', 32, 1, 'MyApp', '[]', 0, '2018-09-28 23:53:18', '2018-09-28 23:53:18', '2019-09-28 16:53:18'),
('0d4eb27888d41c6825254af7234203ca405141753c5c6be2c66d87b2f9578514327673543892fae8', 31, 1, 'MyApp', '[]', 0, '2018-09-04 01:49:58', '2018-09-04 01:49:58', '2019-09-03 18:49:58'),
('0d75d93ecdbdfdda6dec91009ee6181d86b54868cbe2c1bb9a084b1a344873cdb49f4e95b336be48', 37, 1, 'MyApp', '[]', 0, '2018-09-13 22:03:22', '2018-09-13 22:03:22', '2019-09-13 15:03:22'),
('0e3d15fd162c0471ef46b62b6d0d7e9d9586381459a9cfd2cdc12f9acaded8b0bdcba2f82604c63f', 163, 1, 'MyApp', '[]', 0, '2019-02-22 21:26:10', '2019-02-22 21:26:10', '2020-02-22 14:26:10'),
('0e51ba982866be4c2901f6233fd3152b933c936667fb783e6cd041292455ff50b56010c13d84c4a1', 109, 1, 'MyApp', '[]', 0, '2018-12-13 00:09:00', '2018-12-13 00:09:00', '2019-12-12 17:09:00'),
('0e5a96b6a8bcd9d41bfb21816179a031bf1302af9dac38355c97ad149021b208d238a2048241dbfe', 58, 1, 'MyApp', '[]', 0, '2018-10-03 17:32:16', '2018-10-03 17:32:16', '2019-10-03 10:32:16'),
('0ec1b1d1c1e5a6ab8862b7fd53cc8336039c548c33400c5d7dfafa15f8fa6f7abb59bbaf2a9f1b70', 130, 1, 'MyApp', '[]', 0, '2019-01-13 01:57:21', '2019-01-13 01:57:21', '2020-01-12 18:57:21'),
('0f07f9e3c9835d2aa527627d6ea7b1a17e95bbcb2cf5358daeaceaefcdd93368e7046b14aa73d999', 164, 1, 'MyApp', '[]', 0, '2019-02-22 19:15:24', '2019-02-22 19:15:24', '2020-02-22 12:15:24'),
('0f5770ca00d990963cb335edf740692d113bbe1434ce9010d5165581d0591eab9403f54e6eb37174', 37, 1, 'MyApp', '[]', 0, '2018-09-13 22:29:37', '2018-09-13 22:29:37', '2019-09-13 15:29:37'),
('0f718a8c49ecd19cb6a3f5a3b33babd6a38e49b1191d3e2d6e48cc306c0d1e38b9b05ea63b328021', 31, 1, 'MyApp', '[]', 0, '2018-09-12 00:36:49', '2018-09-12 00:36:49', '2019-09-11 17:36:49'),
('0fa4b507c6fad828b005c193351edf461b435a5e74c0efb9efb4c893a744c44be24591ac3d3ac563', 32, 1, 'MyApp', '[]', 0, '2018-09-13 17:15:35', '2018-09-13 17:15:35', '2019-09-13 10:15:35'),
('1005b3bb706d372e1dac5ac7fafdb8628292764dc997c975215dab5ff8cf78f771cd15e9bc99f639', 36, 1, 'MyApp', '[]', 0, '2018-09-13 17:56:57', '2018-09-13 17:56:57', '2019-09-13 10:56:57'),
('100f12ebe19eab4f3890fd0706d7d07d267265ca5a7bdef4eb4816f5de0387edd763eae63e69bd53', 163, 1, 'MyApp', '[]', 0, '2019-02-22 22:11:55', '2019-02-22 22:11:55', '2020-02-22 15:11:55'),
('10228e1a9e4efaf81b5f2ac79987de347625b5beacd4142f3666cb7231c02b4a8a8873a8255afa6d', 152, 1, 'MyApp', '[]', 0, '2019-02-11 18:05:32', '2019-02-11 18:05:32', '2020-02-11 11:05:32'),
('1065628ffe6ca1fbc914aee6bb47a85d6c764cccb601ac755e55174e6e59aa33f2ce53d34ff2a736', 36, 1, 'MyApp', '[]', 0, '2018-09-13 19:22:15', '2018-09-13 19:22:15', '2019-09-13 12:22:15'),
('111ade09cf0fc483926bb87834d6f03a92c98709791f8f58397422150fb44b6fcab4b998b88b9350', 177, 1, 'MyApp', '[]', 0, '2019-08-07 18:40:01', '2019-08-07 18:40:01', '2020-08-07 18:40:01'),
('11674212304cf8e64f99f0c486ea4c782646328adaa2719a44dac7ca733a2a5332418c0624d763c3', 127, 1, 'MyApp', '[]', 0, '2019-07-22 07:46:42', '2019-07-22 07:46:42', '2020-07-22 07:46:42'),
('12622211d6dd7741f7d66999dbb588c731f25dfb4b93542a11eafb674b56c52053504deec4d34c5b', 153, 1, 'MyApp', '[]', 0, '2019-02-12 02:03:54', '2019-02-12 02:03:54', '2020-02-11 19:03:54'),
('126c299d97731573a01b26dcf93a31e570e4c21ada441f113f4bb080a98e803ce6d9509ef375ba3f', 36, 1, 'MyApp', '[]', 0, '2018-09-28 18:28:26', '2018-09-28 18:28:26', '2019-09-28 11:28:26'),
('126e0a672c722946b80e2f5b9856984fa8fc82a7f4c2671bc6e2999ac72276a76b86435e30a51786', 31, 1, 'MyApp', '[]', 0, '2018-09-12 00:47:07', '2018-09-12 00:47:07', '2019-09-11 17:47:07'),
('127ad78936091f3afe08a73172997368d41d34b162cd2eec91fc585317667f8da8fb068fc867e95d', 200, 1, 'MyApp', '[]', 0, '2019-08-07 19:02:30', '2019-08-07 19:02:30', '2020-08-07 19:02:30'),
('129c1e873e0b0a1799a67d4be8ac670fd7d5294b48d47095bf19d453f9cea0f7747ecdf3713f7ff2', 34, 1, 'MyApp', '[]', 0, '2018-09-04 00:24:23', '2018-09-04 00:24:23', '2019-09-03 17:24:23'),
('13cd84f375bea594cdd1a76e2e2c754778da45cb7c7a966ffd8978f8ac78969771250bfa11fa8efa', 89, 1, 'MyApp', '[]', 0, '2018-11-01 22:57:19', '2018-11-01 22:57:19', '2019-11-01 15:57:19'),
('13db9978b4c15e36d5b45dc640dca5226e3904f59607a45a7a764f06cc2a8411c47442cb201ed5dc', 32, 1, 'MyApp', '[]', 0, '2018-09-10 23:54:34', '2018-09-10 23:54:34', '2019-09-10 16:54:34'),
('13ebf1fd562d4024c1b5e4eadb2bc01bb0f29d3ae939023f5d85af9903bb7f84fc1f133ce44b6b0c', 127, 1, 'MyApp', '[]', 0, '2019-10-22 18:18:04', '2019-10-22 18:18:04', '2020-10-22 18:18:04'),
('149d83a2548f366d8e5ec523cc4a8b73f57b1f53aec26b1d3a859d6909e3bd6316514741b489cf69', 32, 1, 'MyApp', '[]', 0, '2018-09-06 21:30:51', '2018-09-06 21:30:51', '2019-09-06 14:30:51'),
('14c33f1c2428f868f1c91eb190c44bfad11259268d6d8c833e8cdba5b82c7484686cd135dbb07771', 144, 1, 'MyApp', '[]', 0, '2019-02-05 20:29:18', '2019-02-05 20:29:18', '2020-02-05 13:29:18'),
('14efe18b0c5af129ec8995d5bd4733ef1234ad444e22ee2ef41964e29d4adcbd2692393183ad4f55', 183, 1, 'MyApp', '[]', 0, '2019-03-05 16:15:44', '2019-03-05 16:15:44', '2020-03-05 09:15:44'),
('14f287d2136d793ca90427a1f0d75f6b95a3c25748630f49b9f9a9feb67916c9485516802a99e55e', 127, 1, 'MyApp', '[]', 0, '2019-07-25 10:16:04', '2019-07-25 10:16:04', '2020-07-25 10:16:04'),
('153e619a5dfa51479347f9ee5ba4bfa25c5e8f490c27b1128df65d54659b05c14162b3d3125132e3', 37, 1, 'MyApp', '[]', 0, '2018-09-06 23:04:30', '2018-09-06 23:04:30', '2019-09-06 16:04:30'),
('157e990e5e56f8a2d58278e85ae8dd17d0196756eb08f93fc4b8676bfe5cfccacdef1143ba308c8f', 177, 1, 'MyApp', '[]', 0, '2019-03-11 17:25:46', '2019-03-11 17:25:46', '2020-03-11 10:25:46'),
('15ad7e234afa05ef97f230d258bb8e0dccae13470c994c9c6993561a4c1904d2f13c7a0d1194766f', 187, 1, 'MyApp', '[]', 0, '2019-03-10 19:44:19', '2019-03-10 19:44:19', '2020-03-10 12:44:19'),
('15eac8ab20b123949ce067751ec8c017beb532b6c8da0db268dc9d6cfe32c2af0935b5e6bab550ae', 37, 1, 'MyApp', '[]', 0, '2018-09-13 21:51:58', '2018-09-13 21:51:58', '2019-09-13 14:51:58'),
('1631c5e6fc3e8bcea774ed9481b93e14bf7c4b7d21a18b6928ead39424296ab6fedbe1b386bed412', 32, 1, 'MyApp', '[]', 0, '2018-10-01 21:27:10', '2018-10-01 21:27:10', '2019-10-01 14:27:10'),
('17433df392b3917d57981bc3d3a619ab173e45a26ecd08de5a5d891e4ca33eea9b69e247a8118310', 53, 1, 'MyApp', '[]', 0, '2018-10-01 19:27:23', '2018-10-01 19:27:23', '2019-10-01 12:27:23'),
('17b8f45838f66b7cfe5c0e7a179bcfa5d486715de8668c8836f32b86ed88415b5901cc30e87a673c', 35, 1, 'MyApp', '[]', 0, '2018-09-04 00:12:34', '2018-09-04 00:12:34', '2019-09-03 17:12:34'),
('17d255992a229033722cf13ca0dabbdd38774f4a44f7b1d6cf712d4852faaa0f8db0fa7f76f81fa0', 127, 1, 'MyApp', '[]', 0, '2019-10-25 10:25:25', '2019-10-25 10:25:25', '2020-10-25 10:25:25'),
('18120b99c1d26797550f6da9c66a15ee600554fbd4c3badb799fe18ff731e3b1136e7ae61640b1ab', 166, 1, 'MyApp', '[]', 0, '2019-02-22 19:46:21', '2019-02-22 19:46:21', '2020-02-22 12:46:21'),
('183214d1761fbd9d23c2e0de2b33bcaff78d4ebee052308f395048e4f8b1d313743d3116a1ebb0f1', 37, 1, 'MyApp', '[]', 0, '2018-09-19 17:36:55', '2018-09-19 17:36:55', '2019-09-19 10:36:55'),
('1834c8f1193e04115d2e56f49c1920d7682a5f24058f1b37b8c2f829af23efa65e1cb4b680daa9f6', 32, 1, 'MyApp', '[]', 0, '2018-09-04 00:24:45', '2018-09-04 00:24:45', '2019-09-03 17:24:45'),
('184460492351bd7b5c1cb44124316552a6e4f2c14b62b88b61e628ee177115be334e22877f57347c', 127, 1, 'MyApp', '[]', 0, '2019-07-16 09:19:56', '2019-07-16 09:19:56', '2020-07-16 09:19:56'),
('186a13ccc7785c3222f631a06fff5b3627bb8c20a39a333d40b0ecf6034ae5af60a427b1cca1a00d', 36, 1, 'MyApp', '[]', 0, '2018-09-06 19:06:21', '2018-09-06 19:06:21', '2019-09-06 12:06:21'),
('188e10b5445d23b30db7d7de8904baedd3dc00a2e31bd1423ff0e0672ae9e92ede860760eb945452', 69, 1, 'MyApp', '[]', 0, '2018-10-09 22:47:27', '2018-10-09 22:47:27', '2019-10-09 15:47:27'),
('19252e7c7697e82fa558a0068ea56d07b91b0ee9c72e3290c12248cf42cc3359394a00a8c7df4ce3', 37, 1, 'MyApp', '[]', 0, '2018-09-04 00:24:14', '2018-09-04 00:24:14', '2019-09-03 17:24:14'),
('193626174b4f9976c5fab255481f31494104125394f9e7a55a0bda780bdc188948593afd746f3fac', 127, 1, 'MyApp', '[]', 0, '2019-02-28 21:06:15', '2019-02-28 21:06:15', '2020-02-28 14:06:15'),
('194557b5cfb13375f0d6116bb6f31602413df4602baaa2faaea11994fef6e727b0bb2e61cfbfe5b4', 127, 1, 'MyApp', '[]', 0, '2019-02-19 01:08:14', '2019-02-19 01:08:14', '2020-02-18 18:08:14'),
('194a68578ff68c37b2c8e3ea2dfd1b4b24263ff515e9bf2214abbe6ae9ff35a0b9f0968e7c8323d0', 212, 1, 'MyApp', '[]', 0, '2019-08-05 13:38:09', '2019-08-05 13:38:09', '2020-08-05 13:38:09'),
('195f0467174c15517692863320b7b442a4906247a26785df07f7138ce4b13ab34ea6d4479c3d8acd', 37, 1, 'MyApp', '[]', 0, '2018-09-13 23:22:31', '2018-09-13 23:22:31', '2019-09-13 16:22:31'),
('19c18aeb9981f1fb994f29570c2f5d1618850ab699f81973048d6df57a9d0c697d60d98038f8abf3', 87, 1, 'MyApp', '[]', 0, '2019-01-12 23:49:54', '2019-01-12 23:49:54', '2020-01-12 16:49:54'),
('1a30fc3bfb73e504a33df9038f6c202e6488039a349d69d55bb664621a6e6f2dba36191b215de780', 127, 1, 'MyApp', '[]', 0, '2019-08-05 13:00:27', '2019-08-05 13:00:27', '2020-08-05 13:00:27'),
('1a50c6375ad2f7af3615561e6a8b8613b7ff9e6dcccd65651c87134202a590a6cde909c49357d7fd', 42, 1, 'MyApp', '[]', 0, '2018-09-11 20:06:31', '2018-09-11 20:06:31', '2019-09-11 13:06:31'),
('1a579364f2e277c38643c5532c3f8cc0c5b0d46394f887618032a07d3955d3619ef239cd6d26ee4b', 30, 1, 'MyApp', '[]', 0, '2018-09-30 17:02:31', '2018-09-30 17:02:31', '2019-09-30 10:02:31'),
('1a591bdc69eaabb30760016f2eb3f12627ffd41c3177dd7c6bae8a813c2ead629534c9a920b6191e', 37, 1, 'MyApp', '[]', 0, '2018-09-06 19:49:35', '2018-09-06 19:49:35', '2019-09-06 12:49:35'),
('1ac422965c35c1151bf5d851b2aa7cebd825fd2ff28e054dcc83fd66d43625aba2f52d15b0d66e59', 212, 1, 'MyApp', '[]', 0, '2019-07-25 09:22:06', '2019-07-25 09:22:06', '2020-07-25 09:22:06'),
('1ac42a4a6dd3ed61e9701169b001ccfb4004d0e9fe3f0da55713ddc3cf5c81a532660e386776e446', 55, 1, 'MyApp', '[]', 0, '2018-10-09 23:32:07', '2018-10-09 23:32:07', '2019-10-09 16:32:07'),
('1af3ad17ee42bb6d27b657e03af98d80a6d1091952308e774a87cee792d9886b9e6cacbcb9f9077c', 35, 1, 'MyApp', '[]', 0, '2018-09-06 20:13:22', '2018-09-06 20:13:22', '2019-09-06 13:13:22'),
('1b1be64cb353a25072244a20d9bfe37e987677b3362a48dcb5925959acf1f4ff44cca3a04698901b', 32, 1, 'MyApp', '[]', 0, '2018-10-01 21:28:50', '2018-10-01 21:28:50', '2019-10-01 14:28:50'),
('1b61553c9249c91f6cdaa695241f76f80aea9ab9062121de4ba8b1408d7f38c45b0ea9d03dbc57e3', 32, 1, 'MyApp', '[]', 0, '2018-09-14 00:03:02', '2018-09-14 00:03:02', '2019-09-13 17:03:02'),
('1b7a1a7bc44c402fa26ffd2ee101f1126b061fa0d25665626f340ad7dd479851dadf56f24c141bdc', 55, 1, 'MyApp', '[]', 0, '2018-09-30 06:00:13', '2018-09-30 06:00:13', '2019-09-29 23:00:13'),
('1be5c5bd44133a6790257c10fc04b7f8a616f4f49273d00338f3e428a49aa835e962bbba5b529189', 32, 1, 'MyApp', '[]', 0, '2018-08-30 22:29:43', '2018-08-30 22:29:43', '2019-08-30 15:29:43'),
('1c31a1dc4543fab504cf302c08012fea35c76da7b4028560a578ef4aee66e010c63bf3b90aa29794', 38, 1, 'MyApp', '[]', 0, '2018-09-21 17:51:42', '2018-09-21 17:51:42', '2019-09-21 10:51:42'),
('1c65a319d1ff7ce1664dbf0fa8e09fd9fa92ff6b9cb298977aea6a4dc443636f5c21048a502cfedd', 31, 1, 'MyApp', '[]', 0, '2018-09-04 23:53:23', '2018-09-04 23:53:23', '2019-09-04 16:53:23'),
('1c6cb660005b07df9eeb359fb5851b807a9b483ca1cb20f18b7cdbe58e1bf9933a90f7ac7b4d930c', 59, 1, 'MyApp', '[]', 0, '2018-10-01 21:38:46', '2018-10-01 21:38:46', '2019-10-01 14:38:46'),
('1c7f9947673777ebc596c02bf83556d5d579b952ce94b36e44a69ca6c2b4bd4772a9f1aa9e9d3825', 30, 1, 'MyApp', '[]', 0, '2018-10-02 20:19:38', '2018-10-02 20:19:38', '2019-10-02 13:19:38'),
('1cb134e113d1e7f57b18bc75e76bc813b4c986a6f6c8c1a9dab6ab31e1337da404742794fb47b2c5', 87, 1, 'MyApp', '[]', 0, '2018-11-21 22:44:22', '2018-11-21 22:44:22', '2019-11-21 15:44:22'),
('1d1e4af162583423dd44764cc8d755b6bd795dd153f34307790aae0d5a8eaf37b2cf72c4b5df1b49', 30, 1, 'MyApp', '[]', 0, '2018-10-15 18:49:53', '2018-10-15 18:49:53', '2019-10-15 11:49:53'),
('1d9f3f353cc0c3d948b310cdc95f433b95f3449bd9d8648c0000dd49577182f884d6c3664657f8b7', 217, 1, 'MyApp', '[]', 0, '2019-07-31 12:19:15', '2019-07-31 12:19:15', '2020-07-31 12:19:15'),
('1e5a40ea0b242ab45844ad4d3f454e2d02738eafa9fb9c153b5dc8c0afbb9a4304f19bd479a0cea0', 37, 1, 'MyApp', '[]', 0, '2018-09-08 00:46:27', '2018-09-08 00:46:27', '2019-09-07 17:46:27'),
('1e67b627278f391bb19f07dacc8ae8f4b7087980b377f7caf7f76fd41cf6af14978dd68fbd4d94dc', 32, 1, 'MyApp', '[]', 0, '2018-09-03 23:57:50', '2018-09-03 23:57:50', '2019-09-03 16:57:50'),
('1e829a0561eaa83c3865b71132f0bbaefce1221b5879fd9dae8e7177995d5efcbb1d5e39f6d06174', 47, 1, 'MyApp', '[]', 0, '2018-09-27 22:04:55', '2018-09-27 22:04:55', '2019-09-27 15:04:55'),
('1ecd91d24b778494a4067955a727be0bdfef4701861f52cace4d41ef0c07da3318788f22820d1d3b', 42, 1, 'MyApp', '[]', 0, '2018-09-11 19:14:25', '2018-09-11 19:14:25', '2019-09-11 12:14:25'),
('1f3aa7d835003ae3c9cf92a74084e53b0b2af90ca1d240458f5eddce16ed002ad9166a8eef280fd9', 30, 1, 'MyApp', '[]', 0, '2018-12-23 04:44:39', '2018-12-23 04:44:39', '2019-12-22 21:44:39'),
('1f553260678b6556d93765567a4f9376f0b802887b28604f5efa96b5f496317f8cf9d7568ba2f8f4', 208, 1, 'MyApp', '[]', 0, '2019-07-10 08:51:36', '2019-07-10 08:51:36', '2020-07-10 08:51:36'),
('1f7aff35ce31a727d7c54ab5046b04826d3af0bccbb88af6430be41d8ac2c7f7f18c38793836b0a4', 91, 1, 'MyApp', '[]', 0, '2018-11-03 16:14:07', '2018-11-03 16:14:07', '2019-11-03 09:14:07'),
('1f94d1461439d537eccfa3839deb5e7f239f4e41b3092e52fccfedf247808d2b1c63b777fb6be78c', 36, 1, 'MyApp', '[]', 0, '2018-09-13 19:49:48', '2018-09-13 19:49:48', '2019-09-13 12:49:48'),
('1fa05565b7d19a93b5fcae269bc467accb5a424b74c4ea4378cf92db2aa0bfc860527851ce054b32', 172, 1, 'MyApp', '[]', 0, '2019-02-22 22:07:13', '2019-02-22 22:07:13', '2020-02-22 15:07:13'),
('1fa2218f4696bf102150f36c75f60945cac2f5dedafec5489585e1974ccf0c5baa03a0d9a8f7a5c4', 177, 1, 'MyApp', '[]', 0, '2019-07-22 07:04:41', '2019-07-22 07:04:41', '2020-07-22 07:04:41'),
('1fbc62b1a98d95c074d52b05139259a98e7cd2bce5b019831e2f3754f042c3ddf4732f10926b04f7', 193, 1, 'MyApp', '[]', 0, '2019-05-30 19:36:48', '2019-05-30 19:36:48', '2020-05-30 12:36:48'),
('1fcf2b81b1bfbcd1b0843b537f7a38971b1492323ca67dc65ef26910e89bf6c0e39f699d4ae76508', 37, 1, 'MyApp', '[]', 0, '2018-09-05 19:16:07', '2018-09-05 19:16:07', '2019-09-05 12:16:07'),
('1fd84e3cd8701a37b6450d81cdc6c619283e553910327f4a9085c615e50e1d0bd6f080aeb8b2d4b7', 206, 1, 'MyApp', '[]', 0, '2019-06-28 21:27:35', '2019-06-28 21:27:35', '2020-06-28 14:27:35'),
('1fe679ae5be6a9afb9a2d2fcbcfb5ae95328d9c59c2e64286fc6ecbe54d68b9db4d0f8264dac34c3', 30, 1, 'MyApp', '[]', 0, '2018-09-07 21:00:49', '2018-09-07 21:00:49', '2019-09-07 14:00:49'),
('1ff54272160db14c97e903aaecf6e76e9682a533a8c760cb9f80142ac25be068c062fc935b83a993', 36, 1, 'MyApp', '[]', 0, '2018-09-13 20:24:11', '2018-09-13 20:24:11', '2019-09-13 13:24:11'),
('206ca897ad3077921ad3ead4c4b55bbce47f216a7de03561dc84a1add57e004d91398e7e7bb05981', 36, 1, 'MyApp', '[]', 0, '2018-09-17 17:43:19', '2018-09-17 17:43:19', '2019-09-17 10:43:19'),
('20d1d5b69bbe861c2d010ed2fed67674625c81c728b5619cfbabbe0a97d50b2446fff45912ce0e3a', 127, 1, 'MyApp', '[]', 0, '2019-02-12 17:12:57', '2019-02-12 17:12:57', '2020-02-12 10:12:57'),
('20d2b1f1895c1d48e76037840245117aeaaddcbbdcdd36780c86df361e50c29d6e57c37195f561c6', 31, 1, 'MyApp', '[]', 0, '2018-09-14 03:02:11', '2018-09-14 03:02:11', '2019-09-13 20:02:11'),
('21540ef07c3826799cc4eb1fb15ddb8cdddf494fcf7cc93e472623c096818dc16f29f1a7e05b7dbd', 59, 1, 'MyApp', '[]', 0, '2018-10-01 21:23:13', '2018-10-01 21:23:13', '2019-10-01 14:23:13'),
('219b9395548e10ece3ce783ebe46ee525278766118d3743ad5929a6aa4446723a1c760620bb51813', 30, 1, 'MyApp', '[]', 0, '2019-01-17 02:43:10', '2019-01-17 02:43:10', '2020-01-16 19:43:10'),
('21c616c7c689148399a3fe699337c734371fc1b4eda591338c7b46d243c848a825315ec6a3ca4f41', 127, 1, 'MyApp', '[]', 0, '2019-07-15 09:35:48', '2019-07-15 09:35:48', '2020-07-15 09:35:48'),
('21e3d58298350c36c0051f6d4e861eade9288bca55e62f26ca6df550a34487921a4721600081501a', 75, 1, 'MyApp', '[]', 0, '2019-02-14 17:12:05', '2019-02-14 17:12:05', '2020-02-14 10:12:05'),
('21f7d25820e2fe24a06128e85eec046314b8baa2b240c4297584ccd7e0735b237955aef7e402174d', 37, 1, 'MyApp', '[]', 0, '2018-09-06 19:32:34', '2018-09-06 19:32:34', '2019-09-06 12:32:34'),
('2308546d7b146373446471dfc1b20b36c16fb9d5bc72f7b5bc46583c910cc43993b5c1f478d6bec9', 36, 1, 'MyApp', '[]', 0, '2018-09-10 23:21:50', '2018-09-10 23:21:50', '2019-09-10 16:21:50'),
('234e2a43e5b4e725c05c7ef36a469edee15625265a2bbfa8360261e53145cddadba6070dfff1a538', 127, 1, 'MyApp', '[]', 0, '2019-01-13 00:56:42', '2019-01-13 00:56:42', '2020-01-12 17:56:42'),
('239ba006454c7df83b1353ad77edd24ecb3b4f525121e4ca5a049794078eacca6dba15c841135708', 177, 1, 'MyApp', '[]', 0, '2019-03-23 18:32:12', '2019-03-23 18:32:12', '2020-03-23 11:32:12'),
('23ad799eb58b865360ffdd15beec67190e5fd026b8070b9859bd5ecbb254526bf470edd2c8e13119', 53, 1, 'MyApp', '[]', 0, '2018-10-02 19:33:58', '2018-10-02 19:33:58', '2019-10-02 12:33:58'),
('23bc2e7729fa91c9b7f17696753b73fb9f7b88a5b44c96bd150267690ddf40b1b7e353587026239a', 34, 1, 'MyApp', '[]', 0, '2018-09-10 23:53:49', '2018-09-10 23:53:49', '2019-09-10 16:53:49'),
('23e4419070c896b3c9c4dd61aca373c762d33f75e13fbd3d440cc011c6856bd616f3e755d0fcf09f', 163, 1, 'MyApp', '[]', 0, '2019-02-22 21:34:16', '2019-02-22 21:34:16', '2020-02-22 14:34:16'),
('23f67e29cf86046aa30989b7272d4d9f7090ab1718f1dbd773ee2e1699b5b0b6655cea4f723192cd', 31, 1, 'MyApp', '[]', 0, '2018-09-13 21:52:51', '2018-09-13 21:52:51', '2019-09-13 14:52:51'),
('240bcb82aae774ca6e67e5e2b4d158cba06d27355407481a0b6a680ed91da1de26e2bee7a46f3d16', 30, 1, 'MyApp', '[]', 0, '2018-09-25 20:18:32', '2018-09-25 20:18:32', '2019-09-25 13:18:32'),
('2416052bec17b51b425f26c70323508aa5a6c91c53462653ac71914c7eeec567d3040f429a033ac5', 30, 1, 'MyApp', '[]', 0, '2018-09-26 19:38:39', '2018-09-26 19:38:39', '2019-09-26 12:38:39'),
('2421bd16b09d3bce161c639b83365a1865a9af8d218533804e239c22b7bed2b9c57f98c227aac310', 53, 1, 'MyApp', '[]', 0, '2018-10-02 22:33:23', '2018-10-02 22:33:23', '2019-10-02 15:33:23'),
('2439222fa9046bf7fd221a60d06d805c391ce5df9760be41dc97bcffde729ac5d84c6749953d385e', 177, 1, 'MyApp', '[]', 0, '2019-07-22 05:57:58', '2019-07-22 05:57:58', '2020-07-22 05:57:58'),
('24a893771ccd299e786880351f4a51494ddff8cadc18c1b780c91b3bedcf3ebde9537a7897956537', 30, 1, 'MyApp', '[]', 0, '2018-10-17 00:12:58', '2018-10-17 00:12:58', '2019-10-16 17:12:58'),
('24d8f3852eda2654af5c1cd56c95bc658679565edb57cbddd53c27967531ef345c5c22ff72ada680', 127, 1, 'MyApp', '[]', 0, '2019-07-15 10:57:28', '2019-07-15 10:57:28', '2020-07-15 10:57:28'),
('24e2b9904aaf54e92cba0db8f9e0760350f1a764f74e5a987b9b0ea0ff7f14b6829489ad513d0e07', 177, 1, 'MyApp', '[]', 0, '2019-02-23 18:25:38', '2019-02-23 18:25:38', '2020-02-23 11:25:38'),
('24fc8823397d20980e8298ca95aaf3601bbe9183bdf03f8a663b0b9265538d7cb52634b89f427ba9', 36, 1, 'MyApp', '[]', 0, '2018-09-13 20:21:22', '2018-09-13 20:21:22', '2019-09-13 13:21:22'),
('2540d91e89675fa05bb4fb691ee835453ce956f13f3bcf460ae0f1fa1cc12a0668dc4972373bfe0e', 30, 1, 'MyApp', '[]', 0, '2018-09-10 20:55:24', '2018-09-10 20:55:24', '2019-09-10 13:55:24'),
('2585545072253a9dea0ebdf54c0f71588e286e5384f3ac7e23fa8a4fb3f1719094766b0a72462e23', 30, 1, 'MyApp', '[]', 0, '2018-12-10 17:37:04', '2018-12-10 17:37:04', '2019-12-10 10:37:04'),
('25c4f3c966c789da5d462daf17fb3a4f9ed7c285488c238299c9304e76a570f5daa8987f0557062c', 195, 1, 'MyApp', '[]', 0, '2019-05-30 22:06:28', '2019-05-30 22:06:28', '2020-05-30 15:06:28'),
('25dbd91b2f1a80e691c8ccf74a6dce6c1e7aae2267845f9ef1dbb5e73d657832ba370f926949dac3', 211, 1, 'MyApp', '[]', 0, '2019-08-01 08:46:21', '2019-08-01 08:46:21', '2020-08-01 08:46:21'),
('26046eb7a9321d799124e9c1af1754ef200e19ad16038287a8668f2776aedd69ae12be1fae115388', 127, 1, 'MyApp', '[]', 0, '2019-07-16 07:15:44', '2019-07-16 07:15:44', '2020-07-16 07:15:44'),
('26aa0807ffba1424f17f34792b763b46559351848032a5b40fafda7d4fc3facbafc102ea2335c6b2', 49, 1, 'MyApp', '[]', 0, '2018-09-29 01:12:01', '2018-09-29 01:12:01', '2019-09-28 18:12:01'),
('2725ee350eca7d2b14bd0a8242cc8966a667ffba196c99aaa8ed32a2473c9e9d7c28dc1d7eb20d2b', 36, 1, 'MyApp', '[]', 0, '2018-09-13 18:18:39', '2018-09-13 18:18:39', '2019-09-13 11:18:39'),
('2736d4bb8397ed0b8070026342326b5cb025f96c4fef508f82783e0322fa912430e3368038348c65', 152, 1, 'MyApp', '[]', 0, '2019-02-11 18:15:25', '2019-02-11 18:15:25', '2020-02-11 11:15:25'),
('2783fd04b3a2103923d52e33a58bac378b2daeee2964c37fd52ea5f2081d702bea93bb62106780fc', 37, 1, 'MyApp', '[]', 0, '2018-09-17 20:23:32', '2018-09-17 20:23:32', '2019-09-17 13:23:32'),
('27a8521185981c76b4874e23c8ef96cf3f7330c46035ffc240582804a2e30da4ed8b579b058ffd3a', 30, 1, 'MyApp', '[]', 0, '2018-09-18 01:02:29', '2018-09-18 01:02:29', '2019-09-17 18:02:29'),
('27c80d3d24e18a82f2a61021cd0a1cd225728d103b8518d4da0e8865e17e8e7981c84ef8bcedd0bb', 37, 1, 'MyApp', '[]', 0, '2018-09-25 23:00:40', '2018-09-25 23:00:40', '2019-09-25 16:00:40'),
('27e84d62fba5aa7be253d064e526edd387ba22363eb90374ca478ab409f4bc79e06d3ecd9e477427', 139, 1, 'MyApp', '[]', 0, '2019-02-02 03:53:41', '2019-02-02 03:53:41', '2020-02-01 20:53:41'),
('286cf3c0f5702495412dc6577cc01f3c123d9993b41b1c94fcee65dae2d465170813ca379962c71d', 37, 1, 'MyApp', '[]', 0, '2018-09-13 22:27:59', '2018-09-13 22:27:59', '2019-09-13 15:27:59'),
('28f5bfe61ac259d929962f4ca76ae3083e57a1e1a80b8dae5f9f5efb004c404be112d9812300f344', 111, 1, 'MyApp', '[]', 0, '2018-12-17 19:59:55', '2018-12-17 19:59:55', '2019-12-17 12:59:55'),
('293db51530e526bf41c94d66a7a2deccea873b52af89b0019a3094583585cfaf9d01b0e2ed2761e2', 30, 1, 'MyApp', '[]', 0, '2018-09-04 01:47:35', '2018-09-04 01:47:35', '2019-09-03 18:47:35'),
('29597e9032c31039cab92c0cc362c2ed927ff643b4a5805d4299c1324c31f3da296095e62ed791e6', 191, 1, 'MyApp', '[]', 0, '2019-05-23 03:31:43', '2019-05-23 03:31:43', '2020-05-22 20:31:43'),
('29fe27cdf8050f6dbf08a4d31a67172dc3458ac8b017cfbc76622b2311015cb457c05d44aa12531f', 126, 1, 'MyApp', '[]', 0, '2019-01-13 00:33:10', '2019-01-13 00:33:10', '2020-01-12 17:33:10'),
('2a0be8634f03822d3e0158b269530b58d52db3c8ef317d1f139e69dd6b7e42e5f84cbb0730a8f5b0', 37, 1, 'MyApp', '[]', 0, '2018-09-07 01:17:45', '2018-09-07 01:17:45', '2019-09-06 18:17:45'),
('2a253ed1b2242866ecd91479074ef2b4028e7861c706cac5f1b50252b5dd8e62e77c6c43465e3a54', 127, 1, 'MyApp', '[]', 0, '2019-07-19 11:18:55', '2019-07-19 11:18:55', '2020-07-19 11:18:55'),
('2a74b0b9b9268eb7df303a22bf1a493dec62b82a8a8be85e95772d8f3257b8ea123c39b9bbd48f75', 127, 1, 'MyApp', '[]', 0, '2019-02-13 19:10:52', '2019-02-13 19:10:52', '2020-02-13 12:10:52'),
('2a9f1abddbada350b8f94169d1fe7946b23444f951912e4409056afd619f1778b9a390859c86991e', 127, 1, 'MyApp', '[]', 0, '2019-07-19 06:50:54', '2019-07-19 06:50:54', '2020-07-19 06:50:54'),
('2aba28b18f97d3cf277ac150011e0927d80de3eb37e36ad06918265ec7ee7d2fc3910957fd77a80a', 57, 1, 'MyApp', '[]', 0, '2018-10-01 06:49:08', '2018-10-01 06:49:08', '2019-09-30 23:49:08'),
('2adae58564cc656970563204e7a1fc3feb2b19f2d6208840f893b89e285f0ad734793ff4ba2e85f5', 31, 1, 'MyApp', '[]', 0, '2018-09-21 23:06:04', '2018-09-21 23:06:04', '2019-09-21 16:06:04'),
('2af4312a458f48dc246df695b833be66194d81c61426cf23e8a97d1697d87ae7644062b52bcc1080', 134, 1, 'MyApp', '[]', 0, '2019-01-22 17:00:53', '2019-01-22 17:00:53', '2020-01-22 10:00:53'),
('2b10ddf645e856d9670a9730c985d123c309de904e49732b801c10d97627ba25cd150f58c48a1b98', 76, 1, 'MyApp', '[]', 0, '2018-10-13 19:03:48', '2018-10-13 19:03:48', '2019-10-13 12:03:48'),
('2b20838e25c19c93c0c7d120663243dd1eae4f6d320df6b5f61ef4c35ad7f52f5ea41b7dece858a9', 75, 1, 'MyApp', '[]', 0, '2019-06-20 15:05:50', '2019-06-20 15:05:50', '2020-06-20 08:05:50'),
('2b95c69cb4b2fc61a02032c0860c26878bfdea86991c120e7692dd04b374c4a925ddbdf189fff7f2', 36, 1, 'MyApp', '[]', 0, '2018-09-07 22:23:57', '2018-09-07 22:23:57', '2019-09-07 15:23:57'),
('2bd34320b98437b90247f34889bc79e06cab11640adce218e2c5bb32b81b1d6285a2623bfcc50b08', 32, 1, 'MyApp', '[]', 0, '2018-09-06 19:25:13', '2018-09-06 19:25:13', '2019-09-06 12:25:13'),
('2bde07e5922f6549475d39953bebc9057227b553617b692446f76fb2378e87f00f5ce5c43026177a', 96, 1, 'MyApp', '[]', 0, '2018-11-14 17:36:07', '2018-11-14 17:36:07', '2019-11-14 10:36:07'),
('2c4e0031bd609e9bdb31e7c16e4f90965559d9257508bdb92aad0e3eb8ba7763e0f0f87e164b63f3', 102, 1, 'MyApp', '[]', 0, '2018-11-26 23:12:07', '2018-11-26 23:12:07', '2019-11-26 16:12:07'),
('2c66a351fbc09861164050719f81b3a5cf2f4579526c404780816b2f09acb112787217b66847c055', 37, 1, 'MyApp', '[]', 0, '2018-09-13 21:40:56', '2018-09-13 21:40:56', '2019-09-13 14:40:56'),
('2c78bb33fa09c39d6a1d21a0301455b8a9976d37a960ebb13abe6438843764f1c6ca913f9faa490e', 66, 1, 'MyApp', '[]', 0, '2018-10-08 21:25:06', '2018-10-08 21:25:06', '2019-10-08 14:25:06'),
('2c8f6b6ba3ece12358ed0ca4f78e2acc10f6961bf59f5c7048c1b26cd7bbc4a516afdb1e1a27eff6', 32, 1, 'MyApp', '[]', 0, '2018-09-17 19:15:44', '2018-09-17 19:15:44', '2019-09-17 12:15:44'),
('2cd81883cc51be5863c9e4c03c54654996a41a1559a0120e75391d57a4d46bf8736522e7a2add2e5', 212, 1, 'MyApp', '[]', 0, '2019-07-27 05:33:26', '2019-07-27 05:33:26', '2020-07-27 05:33:26'),
('2cff8bbd681fe6700c06bf05c1ee7d1b64bdf5eba4693ebbec1700491a9426dae2a695385171307c', 41, 1, 'MyApp', '[]', 0, '2018-09-08 18:37:46', '2018-09-08 18:37:46', '2019-09-08 11:37:46'),
('2d1b3d997ffcb023122532b882353001a43c891dbed26bbc7815fe4a84fdedde04e389e7cd1554b8', 87, 1, 'MyApp', '[]', 0, '2018-11-26 17:50:10', '2018-11-26 17:50:10', '2019-11-26 10:50:10'),
('2d5b838e7c01cb472954be05c2c19841b99860a5ccfc2a503fe26c75f8ff63b1cca9509ef641a41d', 63, 1, 'MyApp', '[]', 0, '2018-10-15 18:49:23', '2018-10-15 18:49:23', '2019-10-15 11:49:23'),
('2d6b8c93e8bd9cbc00d035bb92467b6b97611d5291f1ce40a8db0751bd799f1cfff3eccd0c18f1f1', 32, 1, 'MyApp', '[]', 0, '2018-09-28 18:55:05', '2018-09-28 18:55:05', '2019-09-28 11:55:05'),
('2d7fb9ac8313273515b83b46bae8965e1b9ec7f2dc372c7c003b4f8c8787485d0cb364902d559c6b', 212, 1, 'MyApp', '[]', 0, '2019-07-27 06:19:49', '2019-07-27 06:19:49', '2020-07-27 06:19:49'),
('2d9c5c9221bf6f0f898b7df099066548fb9a7034eae06c6637f9808963155c43878e9eeacc96cb3c', 127, 1, 'MyApp', '[]', 0, '2019-08-07 06:45:21', '2019-08-07 06:45:21', '2020-08-07 06:45:21'),
('2daa6259c3e72177cdd7bae581dbd570e2c4748569193f511043edf03e54fd8f1f1c10696c05784e', 127, 1, 'MyApp', '[]', 0, '2019-07-08 05:45:05', '2019-07-08 05:45:05', '2020-07-08 05:45:05'),
('2dc3143ee38cf871f2829c1aac00c54767eacd1b42154f1a73586aa55f76799429aad848184c8567', 127, 1, 'MyApp', '[]', 0, '2019-02-18 17:57:34', '2019-02-18 17:57:34', '2020-02-18 10:57:34'),
('2dede5df4d3b8d03e699f918b49109bbacb88ba3258c215f4eaae4776727c6dcc0e8f6aa3dbde6a4', 32, 1, 'MyApp', '[]', 0, '2018-09-08 19:27:12', '2018-09-08 19:27:12', '2019-09-08 12:27:12'),
('2e2a8f9542d2d0e2cf0aea4714a3c4a0966d626e0e6e78b1fd709e8bdae8c5555512fefc56d0624f', 42, 1, 'MyApp', '[]', 0, '2018-09-10 17:37:48', '2018-09-10 17:37:48', '2019-09-10 10:37:48'),
('2edcf5f9d654d0e5d45b7e0981f9a9cb51ae2b58bf827f0920fc4ee66dfdab0a38d5a866265ac75b', 32, 1, 'MyApp', '[]', 0, '2018-09-06 22:12:37', '2018-09-06 22:12:37', '2019-09-06 15:12:37'),
('2ee0b4fecfe50d6d2009f8343dc033c912585071380f5b14d9a637cca82fc3c03c72dc73e0980fb3', 104, 1, 'MyApp', '[]', 0, '2018-11-26 22:46:42', '2018-11-26 22:46:42', '2019-11-26 15:46:42'),
('2f339b556e4c3518b5299417efa3e9d5f4aeaa35294928fcef498a0a81f0dad9ea20f0417cc2ba95', 177, 1, 'MyApp', '[]', 0, '2019-07-25 06:37:28', '2019-07-25 06:37:28', '2020-07-25 06:37:28'),
('2fed1889ed11169c9c0803ab35e65e0fa2b499b244bc053ad81735f5bc27053cbd91864f6327017b', 177, 1, 'MyApp', '[]', 0, '2019-08-01 07:49:16', '2019-08-01 07:49:16', '2020-08-01 07:49:16'),
('30287e701f70dcd98ead1ebb31d28ba86c124b135e3e8d8d3a31cf655588fc188033161018c53a09', 171, 1, 'MyApp', '[]', 0, '2019-02-22 22:02:28', '2019-02-22 22:02:28', '2020-02-22 15:02:28'),
('30de0633328f59a0cd1acd4c3ca307f27ab84453b65b0aff44744290862e853cf46d1ff2ad43d50c', 87, 1, 'MyApp', '[]', 0, '2018-11-21 23:40:58', '2018-11-21 23:40:58', '2019-11-21 16:40:58'),
('30ee7a00f3917a51dda18b9002576e6da42e2b5297aaa1138b9c86ed8647787609466299648e195a', 154, 1, 'MyApp', '[]', 0, '2019-02-12 02:29:05', '2019-02-12 02:29:05', '2020-02-11 19:29:05'),
('313c2e898c6a241c294864354a49bf812c89526e6656c82c081203473f2c148791a849041c77b38d', 127, 1, 'MyApp', '[]', 0, '2019-08-01 08:52:06', '2019-08-01 08:52:06', '2020-08-01 08:52:06'),
('315777d86361cdfe55e6107f91943b4bba5c2747f8f99280c05ba87dae85b332996785feabe47eda', 37, 1, 'MyApp', '[]', 0, '2018-09-24 21:48:56', '2018-09-24 21:48:56', '2019-09-24 14:48:56'),
('31710eed7bc0f7c00c0519ecc5f2d3f7fc72b9d121e7786ef5d4a69a8d84046961bd6f84907203e9', 127, 1, 'MyApp', '[]', 0, '2019-06-18 01:13:05', '2019-06-18 01:13:05', '2020-06-17 18:13:05'),
('32e2372a61b9b5db4a749bd9e5e0311b766e43410189316f29b13c3b79b7cf889bd09237c8db1fa7', 36, 1, 'MyApp', '[]', 0, '2018-09-13 20:28:33', '2018-09-13 20:28:33', '2019-09-13 13:28:33'),
('337c9662f2681a43ad8567590e1f76449c5c0626c6dfd0fc5614a770105b4b51574b8b232492c1bf', 213, 1, 'MyApp', '[]', 0, '2019-08-08 10:39:32', '2019-08-08 10:39:32', '2020-08-08 10:39:32'),
('33a8f90d4aa1faa39b309c8d362d54190e876e57bafa47dd3f9484b959f6547b81d12bd0ac143797', 39, 1, 'MyApp', '[]', 0, '2018-09-10 00:36:41', '2018-09-10 00:36:41', '2019-09-09 17:36:41'),
('33b6d932252eee4f0fd66e5a87eb68cdf038972a4cc9086c56ff095350bb3ef5dd21c993fa8a2f15', 37, 1, 'MyApp', '[]', 0, '2018-09-24 22:02:49', '2018-09-24 22:02:49', '2019-09-24 15:02:49'),
('33d976e2051fc3f939d02c233be9adf36aec739263684bd9e15d09a4732302da04e78a5212020125', 30, 1, 'MyApp', '[]', 0, '2019-03-07 20:01:18', '2019-03-07 20:01:18', '2020-03-07 13:01:18'),
('33fde09c3b7de4b45792f940b7267775327aa035dca011f1071fa82c8c635b72a5537b7a20b3872a', 37, 1, 'MyApp', '[]', 0, '2018-09-06 22:18:58', '2018-09-06 22:18:58', '2019-09-06 15:18:58'),
('343f676bda0912acfc9c45f9603a3774cd9c9b10414c3eac795879228788363c943f4721781bcaf9', 37, 1, 'MyApp', '[]', 0, '2018-09-05 20:43:54', '2018-09-05 20:43:54', '2019-09-05 13:43:54'),
('34ac93d3021cede7a3d408595f59ecce3054f259278990f540fe8312db66933126fff602d706ebde', 59, 1, 'MyApp', '[]', 0, '2018-10-01 21:32:59', '2018-10-01 21:32:59', '2019-10-01 14:32:59'),
('34db622e5b03177517b056f28040ce49b29c1c9434991d1083eab5d8748e6f503cd79f4704543a8f', 58, 1, 'MyApp', '[]', 0, '2018-10-01 19:55:47', '2018-10-01 19:55:47', '2019-10-01 12:55:47'),
('35337fefcf6bd5cb610b47665a410e2cc1d913cf837a363a184e7c7a53c9bdb28a72d9bac30accea', 193, 1, 'MyApp', '[]', 0, '2019-07-15 05:28:36', '2019-07-15 05:28:36', '2020-07-15 05:28:36'),
('3535014fd03263775882f20db231dffe60843771b3150bd0985f25443fb5b78064ad91d8dff6b4a1', 32, 1, 'MyApp', '[]', 0, '2018-09-06 22:19:21', '2018-09-06 22:19:21', '2019-09-06 15:19:21'),
('3549b9e7c28bda3226fe87fd387cd9eb90165e8ea28e8ca14fc3fb45087a797d0baad1dd1a253ad8', 127, 1, 'MyApp', '[]', 0, '2019-07-23 10:26:04', '2019-07-23 10:26:04', '2020-07-23 10:26:04'),
('3593698cfa85ede465af896eccda8a5f7aaa80fd2f119db5227b17784fe21548c587c77e59df7032', 37, 1, 'MyApp', '[]', 0, '2018-09-13 21:52:18', '2018-09-13 21:52:18', '2019-09-13 14:52:18'),
('35a2fa4237dc452ead7aca45ecfc5611b52775094a5faeacf50e85537443e402f97d6c8a94419e0b', 32, 1, 'MyApp', '[]', 0, '2018-09-07 01:19:14', '2018-09-07 01:19:14', '2019-09-06 18:19:14'),
('35cd5c5a782790cccfb20373c110d251946cd6a206475f76bd15f5b0dace07e6e6dc5238d0937b53', 30, 1, 'MyApp', '[]', 0, '2018-09-12 00:34:13', '2018-09-12 00:34:13', '2019-09-11 17:34:13'),
('370284a9b04620ae840ad9b43349da4c029f4dab038086d76183b184336a3608eab438cf9b10caa5', 98, 1, 'MyApp', '[]', 0, '2018-11-17 02:22:08', '2018-11-17 02:22:08', '2019-11-16 19:22:08'),
('374fa3bba00ccdc00eb989d035b3febc2632682db377f2f2c3ee20bf2859d9baa8e7f0dc73925cbd', 111, 1, 'MyApp', '[]', 0, '2018-12-17 21:55:54', '2018-12-17 21:55:54', '2019-12-17 14:55:54'),
('37a6feb0252339de57692d36e010976691e77ca9309fa2e57af5cd20c9930adfc4d45770b4968c52', 30, 1, 'MyApp', '[]', 0, '2018-09-04 02:34:04', '2018-09-04 02:34:04', '2019-09-03 19:34:04'),
('3836611396691feaacb6f96d793870959c69d5e6b19c162b2d6fea0710cec44b4c2e8371b0ffaf90', 75, 1, 'MyApp', '[]', 0, '2018-10-17 00:51:28', '2018-10-17 00:51:28', '2019-10-16 17:51:28'),
('38420a4cb0468b10b4a97fe70f647cbe6f617429a7ea0151ad80c18e4d43250cca887ccffd8cc545', 87, 1, 'MyApp', '[]', 0, '2019-01-03 22:30:35', '2019-01-03 22:30:35', '2020-01-03 15:30:35'),
('39102bfdb87e6292f6099fc364a28486e1620eee4b3bf06ba01f3bb6274a09d96d433c5b937f6fb8', 127, 1, 'MyApp', '[]', 0, '2019-01-12 23:50:34', '2019-01-12 23:50:34', '2020-01-12 16:50:34'),
('3914ed25d8e2d169a032a714070ee4ff5c06eccd22c882cb3116338b60b9869d76543fbae573193f', 30, 1, 'MyApp', '[]', 0, '2018-09-12 00:46:59', '2018-09-12 00:46:59', '2019-09-11 17:46:59'),
('3950ba0c906afbe14f7680aecceb509e196d273c8cb1389f2d3c80e9b4fc9c8788daaf2ad956cede', 163, 1, 'MyApp', '[]', 0, '2019-02-22 21:52:02', '2019-02-22 21:52:02', '2020-02-22 14:52:02'),
('395dddfce6f2304f52cf5c548b20a7403aa160aac3dba3f7acedf9290fd8be83b81ea0dc8c7603b1', 127, 1, 'MyApp', '[]', 0, '2019-08-02 09:04:27', '2019-08-02 09:04:27', '2020-08-02 09:04:27'),
('3963dd48908aec97d17ea7d6f010b445fd964526b9675050f2c6fcafac8ee65b563ca12d22521f31', 129, 1, 'MyApp', '[]', 0, '2019-01-13 01:16:03', '2019-01-13 01:16:03', '2020-01-12 18:16:03'),
('39736183dc4937fd9f5a0c141740b5af21897a1accb2a3db45ce5b1ab897953dfc62cf4f9e178ea2', 37, 1, 'MyApp', '[]', 0, '2018-09-13 22:04:27', '2018-09-13 22:04:27', '2019-09-13 15:04:27'),
('39759e2ef4d80c791f68276dfea7aa621f7ab47ddd0ac9580a15510067c1f8a4b012189fbc353bfe', 36, 1, 'MyApp', '[]', 0, '2018-09-13 23:41:13', '2018-09-13 23:41:13', '2019-09-13 16:41:13'),
('39851804e1c2bceecddc62d29c14ba319bb33f957c019dbeb686ae99e5316d6c52f13de6174b1b28', 30, 1, 'MyApp', '[]', 0, '2018-09-19 02:12:05', '2018-09-19 02:12:05', '2019-09-18 19:12:05'),
('39cb83ee65e34f4394fcf93ea11ee1e4c9748b1e620184815a7e5835788947885175b9194f162332', 177, 1, 'MyApp', '[]', 0, '2019-07-19 11:36:44', '2019-07-19 11:36:44', '2020-07-19 11:36:44'),
('39dcca7c744b643ecc3a9241dc174b9e6b6083577dac8fd8d87c0196d52cb8eb10ab67a593a33408', 62, 1, 'MyApp', '[]', 0, '2018-10-06 17:29:26', '2018-10-06 17:29:26', '2019-10-06 10:29:26'),
('3a1e1e4f4c7bf6d50f5db0218a3dba8dc150767e413630aa331fb5cc6232e2cb3fdf3bd3b7854db5', 32, 1, 'MyApp', '[]', 0, '2018-09-25 22:57:16', '2018-09-25 22:57:16', '2019-09-25 15:57:16'),
('3a4f96f985a63dd3cd7c46870fb0f173e91bcf0dc0871c384cea7611e7000973f757f816b5816d55', 38, 1, 'MyApp', '[]', 0, '2018-09-28 18:52:30', '2018-09-28 18:52:30', '2019-09-28 11:52:30'),
('3a5c6ad7da70ec24119d23dd5691503cf974aec570c1e4e6d46279f02655b0a51ff9ccd02035d019', 63, 1, 'MyApp', '[]', 0, '2018-10-17 16:59:41', '2018-10-17 16:59:41', '2019-10-17 09:59:41'),
('3a8336d9dab0799fe6b820b0c5c803024ad87e849bd1e41d54d0ef03db52afb2dd56ded850d0c9aa', 32, 1, 'MyApp', '[]', 0, '2018-09-17 21:43:10', '2018-09-17 21:43:10', '2019-09-17 14:43:10'),
('3a865dac70c9d3c1a2e4950784f9ff5dafe70565e20c1161ccddca589498ba4fc98b29f8287850b8', 31, 1, 'MyApp', '[]', 0, '2018-09-10 21:04:13', '2018-09-10 21:04:13', '2019-09-10 14:04:13'),
('3a9f6fbcfa441193eae7bb37c460f0aa756504e2611d363ea3350da589f514cecd49d4af7a7aa879', 177, 1, 'MyApp', '[]', 0, '2019-07-17 06:41:01', '2019-07-17 06:41:01', '2020-07-17 06:41:01'),
('3ae1efc6db22bf1d93a0678a103e980d211fa79b7a4baf52fe7e982a775627c5f744fb13184ddbcc', 58, 1, 'MyApp', '[]', 0, '2018-10-01 17:55:08', '2018-10-01 17:55:08', '2019-10-01 10:55:08'),
('3b243048928094c9969aa9c43bbd08c46b91d339db4735892d2bd350d7b7be3ae9d8aa6871c20f3b', 30, 1, 'MyApp', '[]', 0, '2018-10-02 21:55:02', '2018-10-02 21:55:02', '2019-10-02 14:55:02'),
('3b8b0c44ce1b094ef75f8644c3d1097d581bd1a87ccf7e1672ff1b9393333c00b09eee95e3cac5a8', 37, 1, 'MyApp', '[]', 0, '2018-09-19 17:54:36', '2018-09-19 17:54:36', '2019-09-19 10:54:36'),
('3bc339651966ca5b3628f4cc807251d15f1b851d8c486533c976f46116a6ff4fba85d2b47b4994b2', 54, 1, 'MyApp', '[]', 0, '2018-09-30 05:55:22', '2018-09-30 05:55:22', '2019-09-29 22:55:22'),
('3bc68f56d77cd02b7fba6f8f82315546c0d73b3e67c9630bf5e745f91101545911a53b60443f6a04', 58, 1, 'MyApp', '[]', 0, '2018-10-01 19:51:32', '2018-10-01 19:51:32', '2019-10-01 12:51:32'),
('3bed8407d4825577f10e77bd974ed2bbd58aa551ad3608981cab2b534016d3b223593c910fb4c84a', 128, 1, 'MyApp', '[]', 0, '2019-01-13 01:02:50', '2019-01-13 01:02:50', '2020-01-12 18:02:50'),
('3c11aa1710af86e077b069368fd978fc64450b1b92a0cf7ba6c83f86464df368437140e920c0950e', 181, 1, 'MyApp', '[]', 0, '2019-03-02 08:35:29', '2019-03-02 08:35:29', '2020-03-02 01:35:29'),
('3c1a8a0807e0d13a1da413d9c8c0ceb49dc1e96d9bc8b5d7d214c381866401fed4374f46d5d99a00', 32, 1, 'MyApp', '[]', 0, '2018-10-01 18:08:05', '2018-10-01 18:08:05', '2019-10-01 11:08:05'),
('3d1ada2f4968036443669729781fb62fb0676f6ed8ba80a766fea13ab065d4cf5cabe1d8119f2db9', 37, 1, 'MyApp', '[]', 0, '2018-09-17 17:51:33', '2018-09-17 17:51:33', '2019-09-17 10:51:33'),
('3d4b9d1794c823707eeec3546c881a7e8fe0cf096d9e1d6853ca6d2087bde3cad09c17c7cae68520', 136, 1, 'MyApp', '[]', 0, '2019-01-28 08:04:12', '2019-01-28 08:04:12', '2020-01-28 01:04:12'),
('3d7ca836a04d627029198d4eea19da9072ad9442c8064836ebc685fca6c6ba88f81bf871a3192a74', 127, 1, 'MyApp', '[]', 0, '2019-08-06 06:18:32', '2019-08-06 06:18:32', '2020-08-06 06:18:32'),
('3dafdc65a83ebfde6ed5df96cbc0a66726747f10c23a6ca307664d56c0f7149f12874708bb5e9103', 37, 1, 'MyApp', '[]', 0, '2018-09-13 23:15:12', '2018-09-13 23:15:12', '2019-09-13 16:15:12'),
('3dcc3d8d49b9335a194fbc22c2db4f36d01a41de020142b61af4bc677ef5103548dc93acab9d4b27', 36, 1, 'MyApp', '[]', 0, '2018-09-10 23:10:47', '2018-09-10 23:10:47', '2019-09-10 16:10:47'),
('3de7ee96698a9dc3ce1004f2f28db9f38029f9e2ad81481b20a117ec3f59760d52cc3e5b3ad9dc5b', 203, 1, 'MyApp', '[]', 0, '2019-06-27 20:15:10', '2019-06-27 20:15:10', '2020-06-27 13:15:10'),
('3df30afcca9e9bf39c4e39a8debfb66f70ecd8a34cd7e74cc0ed3f84a866c228885683bd4a1636f5', 177, 1, 'MyApp', '[]', 0, '2019-06-27 21:18:01', '2019-06-27 21:18:01', '2020-06-27 14:18:01'),
('3df62b8906e48020ce8ebe9ad265077ca57e537f63ffdcde9ee1b91579e706cdf39ffbc2a8324592', 87, 1, 'MyApp', '[]', 0, '2019-01-12 23:53:43', '2019-01-12 23:53:43', '2020-01-12 16:53:43'),
('3e34f86cae64d0402642d13bfed28ad918743f4050346cdabb523fab265be6b932c155af47ed793c', 32, 1, 'MyApp', '[]', 0, '2018-09-08 23:16:11', '2018-09-08 23:16:11', '2019-09-08 16:16:11'),
('3e5a6c5e22638a99038f2a09f7318d1344e5194aa66ff2919629ea93e17bdb76fd5787bd9a7662cf', 177, 1, 'MyApp', '[]', 0, '2019-07-23 05:53:39', '2019-07-23 05:53:39', '2020-07-23 05:53:39'),
('3e9965c24b2d3d0d3929def34bde8b2385276004f80a9b8e170185d3aae77faa88b1003baafcf25c', 177, 1, 'MyApp', '[]', 0, '2019-07-29 09:15:20', '2019-07-29 09:15:20', '2020-07-29 09:15:20'),
('3ebf916c102c6cdcd7d14ccadb6816ded2f4513f4f50035d098d01c5542f04eb5dc49998b50f7f07', 112, 1, 'MyApp', '[]', 0, '2018-12-17 23:13:51', '2018-12-17 23:13:51', '2019-12-17 16:13:51'),
('3ede09c5eaad9032b075de86e956146eba4f009bf8936709162b2986ce09fb144abfe8e17fa21141', 102, 1, 'MyApp', '[]', 0, '2018-11-24 22:31:34', '2018-11-24 22:31:34', '2019-11-24 15:31:34'),
('3f2cd086789982cb5e6073a736c738661e3902d0c3510269232ce61edcb9bf28026eb8d5bee1d217', 31, 1, 'MyApp', '[]', 0, '2018-09-26 19:09:14', '2018-09-26 19:09:14', '2019-09-26 12:09:14'),
('3f765855b61fe450caa07079948b8c46c91c86298487826a39e24e0adc7037f093baf76ca8d1ff14', 102, 1, 'MyApp', '[]', 0, '2018-11-26 19:45:11', '2018-11-26 19:45:11', '2019-11-26 12:45:11'),
('3fc31371086f96c2568cf5dd703248416f40b06d917d434414459a821d2afc45d251be681022f0d5', 36, 1, 'MyApp', '[]', 0, '2018-09-06 22:16:20', '2018-09-06 22:16:20', '2019-09-06 15:16:20'),
('4038d8799c0ac6d9343437e90f857b3f2d98fd0b4214c9f697344dd4f8361ef4225d9effbfd203be', 127, 1, 'MyApp', '[]', 0, '2019-06-28 17:56:59', '2019-06-28 17:56:59', '2020-06-28 10:56:59'),
('407b25bed301aadfdb33bdcc1854454d6bf177f638484dbc4f528feec5af09b406081668cb902802', 56, 1, 'MyApp', '[]', 0, '2018-10-01 23:59:59', '2018-10-01 23:59:59', '2019-10-01 16:59:59'),
('40db7690ca0193ab880cbf0e0058910eb187a08b1e06d7292a2016afac1154cfa7853a100cfb2b47', 32, 1, 'MyApp', '[]', 0, '2018-09-28 22:56:21', '2018-09-28 22:56:21', '2019-09-28 15:56:21'),
('415146d74c95372b4e7baa5330f8be18e53f7d1fe9e02885a12ddc86320ec2f38d054238973a5970', 88, 1, 'MyApp', '[]', 0, '2018-11-01 22:56:41', '2018-11-01 22:56:41', '2019-11-01 15:56:41'),
('41602aacef84b0d7e587188ef139487ddd66ea905105f7a0a3f6ce3f051de73e2f0d2c04735042ce', 36, 1, 'MyApp', '[]', 0, '2018-09-17 19:09:26', '2018-09-17 19:09:26', '2019-09-17 12:09:26'),
('418b03fdd82e9a8eac8906726e3d5aa9456fd670d680c1082f19a4523114316a74d797f78e015f38', 32, 1, 'MyApp', '[]', 0, '2018-09-24 20:22:08', '2018-09-24 20:22:08', '2019-09-24 13:22:08'),
('41fede75a9340e036bd164477576aea54f0c383dadfb03cd13c0ffbf7f2aac04b66e71efbcb0a448', 177, 1, 'MyApp', '[]', 0, '2019-07-23 06:30:18', '2019-07-23 06:30:18', '2020-07-23 06:30:18'),
('42639eced643b105ab6b43b3b97338cbd6dfdb15aee7cbf8019568c61d233bde70824032bdd35d5d', 87, 1, 'MyApp', '[]', 0, '2018-11-26 23:04:44', '2018-11-26 23:04:44', '2019-11-26 16:04:44');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('427bd389793bae52c6ec0aa9039c80744a95ea89c9de95fb355258ca21d2090e33dd082fe2d0d178', 127, 1, 'MyApp', '[]', 0, '2019-06-22 01:28:17', '2019-06-22 01:28:17', '2020-06-21 18:28:17'),
('432880fb3168c2ad537a896c4e36aff41cdcd5b3224be95ba0fe2a7205dc6303d8e9a777cf6fb597', 36, 1, 'MyApp', '[]', 0, '2018-09-28 22:07:28', '2018-09-28 22:07:28', '2019-09-28 15:07:28'),
('43496da65cb22bcc7d4e3c7589980cc14dd72b424a929602e41df6d64178e32b7d58be27c3b03312', 32, 1, 'MyApp', '[]', 0, '2018-09-08 21:43:25', '2018-09-08 21:43:25', '2019-09-08 14:43:25'),
('437a1fe366d7bd94c38f5cbc24a2f9c5c3b0360eae97333cd470aa52b936d69664eec09d47c3a7ce', 94, 1, 'MyApp', '[]', 0, '2018-11-11 19:08:20', '2018-11-11 19:08:20', '2019-11-11 12:08:20'),
('43a8002b3e1d49110e36a58838cb203b2b0fbb35df6e0d2851dc14d7cdb2ada466d9bf10e210c127', 37, 1, 'MyApp', '[]', 0, '2018-09-06 20:55:15', '2018-09-06 20:55:15', '2019-09-06 13:55:15'),
('43e1def053343a36b3f5f88c7b6e17cd53a8dbb60461504495906cf5963847cbdb0016340b1b06e1', 36, 1, 'MyApp', '[]', 0, '2018-09-24 22:08:51', '2018-09-24 22:08:51', '2019-09-24 15:08:51'),
('43f9129db994f607efa609908971d21cdd6eaa28629b36a0444f33e028d28f0bf55d49d5fc3f4e42', 30, 1, 'MyApp', '[]', 0, '2018-09-06 03:02:59', '2018-09-06 03:02:59', '2019-09-05 20:02:59'),
('44cd520590e77966267895549317accef533e23ce6e623962ba91e273f9f30bd6d56c4603d34b5ae', 37, 1, 'MyApp', '[]', 0, '2018-09-13 21:59:06', '2018-09-13 21:59:06', '2019-09-13 14:59:06'),
('4574aecff24aea4dc0bd5ab4cec0005512b8d0d1c3740131f8ebe85a66e9345fc6fb58b2416ef822', 41, 1, 'MyApp', '[]', 0, '2018-09-08 18:54:07', '2018-09-08 18:54:07', '2019-09-08 11:54:07'),
('4659a3d365e7bc25f13a35d377f764aac2c2ed37249b9bba43be265183d7c89fb83e8eff29e8ac33', 127, 1, 'MyApp', '[]', 0, '2019-08-07 16:39:03', '2019-08-07 16:39:03', '2020-08-07 16:39:03'),
('466a70a4f5151eb78ba62e154497ac7248bbe82b8c0f5e8a415b1e01b71c9767c310408bfe9f3e85', 127, 1, 'MyApp', '[]', 0, '2019-07-22 06:04:34', '2019-07-22 06:04:34', '2020-07-22 06:04:34'),
('466f82f736dfec57b6709bbaa972f18a0a225ad00fff81b198bf404704106dd72b2b7df55cff38f1', 173, 1, 'MyApp', '[]', 0, '2019-02-23 00:06:50', '2019-02-23 00:06:50', '2020-02-22 17:06:50'),
('46aea4b3d27b288aa3b10cf27fc5b5d2da89247791854d3cd928ac83887bf9358e36217ac1b33f4e', 32, 1, 'MyApp', '[]', 0, '2018-09-13 23:31:38', '2018-09-13 23:31:38', '2019-09-13 16:31:38'),
('46b0c9811ae57db6b6d2a760b8e3c361e11ecb006eaa6dc10d77bc7d47fb468c3646fa161028a6b1', 161, 1, 'MyApp', '[]', 0, '2019-02-19 23:15:38', '2019-02-19 23:15:38', '2020-02-19 16:15:38'),
('46cc528430bb5effc29b914b36b9d56bdfd6cac6ba445884b946bfdfe2e68cfa4b3f12b8ae082112', 32, 1, 'MyApp', '[]', 0, '2018-09-19 17:33:18', '2018-09-19 17:33:18', '2019-09-19 10:33:18'),
('46ecc9dc2847cc0d8c846ed4c9fa74c8909ada0c263d48cb4640a5b32ae3b67fe9ef4b5a307c1bdb', 56, 1, 'MyApp', '[]', 0, '2018-10-01 18:49:43', '2018-10-01 18:49:43', '2019-10-01 11:49:43'),
('4768940ea365e40a8028e35f8435e1365b1513d6d136ad159f1c9da26635584d4bd473efbe1680e0', 86, 1, 'MyApp', '[]', 0, '2018-11-01 16:09:13', '2018-11-01 16:09:13', '2019-11-01 09:09:13'),
('4785bad320a083ab871875fbb121705f794b590328372439c44abc2f78e17ee60931776053ed00cb', 127, 1, 'MyApp', '[]', 0, '2019-06-18 00:11:51', '2019-06-18 00:11:51', '2020-06-17 17:11:51'),
('479eb929e372569e68f74c563c1ae88fc8fe57b124125ecc0aa03358328ff0502ab9ea51492eed18', 32, 1, 'MyApp', '[]', 0, '2018-10-01 20:47:12', '2018-10-01 20:47:12', '2019-10-01 13:47:12'),
('47d89e5ec1d87992bdfa7374f196444576f96c3ffee2126c380704198f21e40196d2d3065d4bd426', 32, 1, 'MyApp', '[]', 0, '2018-09-06 19:25:01', '2018-09-06 19:25:01', '2019-09-06 12:25:01'),
('47e66e5f83afed78ea7e1aa8d57e70210b83315fc9195db35ddb137f323deb3a1729bcb765ffd5b5', 177, 1, 'MyApp', '[]', 0, '2019-08-07 10:28:54', '2019-08-07 10:28:54', '2020-08-07 10:28:54'),
('483d4775919166e8866a57b29a22b9e2e9800ef18e5a90d5425c8a5e63319423084ccc449fc350a7', 30, 1, 'MyApp', '[]', 0, '2018-11-24 14:07:02', '2018-11-24 14:07:02', '2019-11-24 07:07:02'),
('486282fc12feb0baf574fb610a131498ee10556c3003294b850f4246136f72a9e3a8fbcb2c8c6dbe', 75, 1, 'MyApp', '[]', 0, '2019-07-31 11:32:24', '2019-07-31 11:32:24', '2020-07-31 11:32:24'),
('4867f51a6bc2ac865621dd6ec5e4e387c2151fbb2a81ab6f235e4283cbeca11c6e8c5d76f197b1a7', 138, 1, 'MyApp', '[]', 0, '2019-02-01 03:00:09', '2019-02-01 03:00:09', '2020-01-31 20:00:09'),
('48a38ad57e38e5c73e63ff1d9b4ef2304d610a61c9f05a9b5a881c5869365fb53ef911724d9ead66', 38, 1, 'MyApp', '[]', 0, '2018-09-10 23:26:15', '2018-09-10 23:26:15', '2019-09-10 16:26:15'),
('48a6284ec094c40e020ef0155c194c6c808c1939826f4605787de7743190d7a5c03d68a0e9a3f140', 31, 1, 'MyApp', '[]', 0, '2018-09-13 21:59:30', '2018-09-13 21:59:30', '2019-09-13 14:59:30'),
('492a30f0206c0276ec344e2f732ae9ed6fcb6837d01b5705d0c7bde0bab71c5cb94b792d00f79030', 193, 1, 'MyApp', '[]', 0, '2019-07-05 13:10:44', '2019-07-05 13:10:44', '2020-07-05 13:10:44'),
('4952d5a897f08aa6c86c7254f76056c18ebacde279354443626817d74a14d3b0ddce659c9aa3b172', 201, 1, 'MyApp', '[]', 0, '2019-08-05 11:47:11', '2019-08-05 11:47:11', '2020-08-05 11:47:11'),
('4969ea0e95002b262be71752aeff5d89450d2a467b2db022b82e81dc35f7cb16e36378e11b7ba70e', 32, 1, 'MyApp', '[]', 0, '2018-09-13 17:30:50', '2018-09-13 17:30:50', '2019-09-13 10:30:50'),
('497f15d53547fa265048f6ee1d4b9533017d5840df882086343fa39563e4af7e9d2d317a30e1917b', 169, 1, 'MyApp', '[]', 0, '2019-02-22 21:56:38', '2019-02-22 21:56:38', '2020-02-22 14:56:38'),
('49fe9de4967abe49aacd4549367e0f6386558df6672a1edf8e070c388d1c7794d2147361a95f4ac2', 31, 1, 'MyApp', '[]', 0, '2018-09-19 01:23:54', '2018-09-19 01:23:54', '2019-09-18 18:23:54'),
('4a170f6ec8e6ac5c8d02b816a5d5a73efb3f668e8881b29c58c9e505c724345f944954eb4c3bbea3', 30, 1, 'MyApp', '[]', 0, '2018-09-19 01:14:35', '2018-09-19 01:14:35', '2019-09-18 18:14:35'),
('4a8f5c00a4f43ab4498c8ebb3ef9262506476286cb902e08d7e65a21e0ab7622aab47cef441f0e71', 32, 1, 'MyApp', '[]', 0, '2018-09-08 20:37:41', '2018-09-08 20:37:41', '2019-09-08 13:37:41'),
('4af8997f8e00e1fa814378e2197b8f20b64c2de148c5bec2639d4e50fe5c8327c825a552d4e35388', 127, 1, 'MyApp', '[]', 0, '2019-07-19 11:44:24', '2019-07-19 11:44:24', '2020-07-19 11:44:24'),
('4b2e94a6c27b29efa8adf04264bd5eceab71cf25273def1c6a526d1b8c196da2bf300d9962d2bc1c', 170, 1, 'MyApp', '[]', 0, '2019-02-22 21:47:12', '2019-02-22 21:47:12', '2020-02-22 14:47:12'),
('4b89dec16592fdd6164a5a6af18edbe865569649cfd3656eb19ea8b750cd1b9e0c6c4a729fbe2d2c', 197, 1, 'MyApp', '[]', 0, '2019-05-30 22:24:42', '2019-05-30 22:24:42', '2020-05-30 15:24:42'),
('4ba1f4d07b578fe1a80df2a47c190b716815fb876a753eff9f5ff6566cb299408fc8ef66c52904ce', 31, 1, 'MyApp', '[]', 0, '2018-09-04 05:20:57', '2018-09-04 05:20:57', '2019-09-03 22:20:57'),
('4bdc6f54bfca606c2e1902ea5e3ccbf58055d9665f811beaab9dc89600d83f9a97cf09ca13df46d0', 48, 1, 'MyApp', '[]', 0, '2018-09-28 03:15:42', '2018-09-28 03:15:42', '2019-09-27 20:15:42'),
('4c0dc7f13e9098b427852664f329c070438c219a7724035663724a08aa0fbf869d97de6961796cd0', 127, 1, 'MyApp', '[]', 0, '2019-07-23 06:09:23', '2019-07-23 06:09:23', '2020-07-23 06:09:23'),
('4c383d1eb48633b9cf48bc671ca129d6dd245897536692ab9dc94cdeb702bb20c9e908dbf633a8f0', 104, 1, 'MyApp', '[]', 0, '2018-11-26 22:50:12', '2018-11-26 22:50:12', '2019-11-26 15:50:12'),
('4c81435e771087693474373dda1059228ce9287500dac648d447ab256aa6b86bc1ad004c0ee456ea', 140, 1, 'MyApp', '[]', 0, '2019-02-02 21:35:19', '2019-02-02 21:35:19', '2020-02-02 14:35:19'),
('4c8394dfd0a3cd5f2e0dc447e3a161a2ff753e4283bc2785d64c87967460034fe35651f119652c8e', 36, 1, 'MyApp', '[]', 0, '2018-09-13 20:51:13', '2018-09-13 20:51:13', '2019-09-13 13:51:13'),
('4cc387e3f1140d311607ff5833cfcb6e0ba5cea7fe77d84358b9a27807565221310915137511fdf9', 31, 1, 'MyApp', '[]', 0, '2018-09-10 20:45:41', '2018-09-10 20:45:41', '2019-09-10 13:45:41'),
('4cf7ba31f68ddec317553dc75800820d785660480e0c81968fbd56652a4f928d4e8ed4d050339e68', 127, 1, 'MyApp', '[]', 0, '2019-06-24 21:21:04', '2019-06-24 21:21:04', '2020-06-24 14:21:04'),
('4d2327db4baf004847a907e281a52cd39844f7f7d48cc92618c4b1fa1d1db517469ba82dd8bade9e', 32, 1, 'MyApp', '[]', 0, '2018-09-28 22:51:57', '2018-09-28 22:51:57', '2019-09-28 15:51:57'),
('4d7513b8db76f7f1b0939e94898072d48e58d185022d2a1fab80488998609114b86662700694b88a', 38, 1, 'MyApp', '[]', 0, '2018-09-24 21:39:22', '2018-09-24 21:39:22', '2019-09-24 14:39:22'),
('4d85c4f310ef3a93c13d53bc26494699b23f6b39a996184da52f1ebb8c944c8c790ec88a0c167895', 127, 1, 'MyApp', '[]', 0, '2019-02-13 22:00:11', '2019-02-13 22:00:11', '2020-02-13 15:00:11'),
('4dcd2672763ca5aeac8271769fcb203b5aab064a682bc3ab4eaa6125f8d8046b8244ee804e42f5f4', 217, 1, 'MyApp', '[]', 0, '2019-08-05 11:46:10', '2019-08-05 11:46:10', '2020-08-05 11:46:10'),
('4e01d0a8828bdfea8c2f3980f58c691f9e2f6bf060f055f6e726d4de91e9c981fbaa096a244cf2fb', 46, 1, 'MyApp', '[]', 0, '2018-09-27 03:23:55', '2018-09-27 03:23:55', '2019-09-26 20:23:55'),
('4e64f1dc0338fb20676ced3b5af0667040b8c9f6dcf93592360982a2e9c3b12666e9fcbb17051685', 186, 1, 'MyApp', '[]', 0, '2019-03-10 06:53:27', '2019-03-10 06:53:27', '2020-03-09 23:53:27'),
('4e68d7e0d70cd40ec11bc3d4d0885f313f08b9c942ffd045da3da191fb1a1a86c530cf85876e13db', 175, 1, 'MyApp', '[]', 0, '2019-02-23 02:02:36', '2019-02-23 02:02:36', '2020-02-22 19:02:36'),
('4f2c61f3301887dea25084519a1df248ce2dfbddc38fe2c053b18745de0236d43165bfe39e7280d3', 30, 1, 'MyApp', '[]', 0, '2018-12-18 01:34:21', '2018-12-18 01:34:21', '2019-12-17 18:34:21'),
('4f5edf209adead01e4f39b46250c0376797ff5fea4babbf838bf49747c80468b7ef563230a2c7d30', 127, 1, 'MyApp', '[]', 0, '2019-07-31 05:56:43', '2019-07-31 05:56:43', '2020-07-31 05:56:43'),
('4f940887683f06acf0e7986d2009df225d55073ceb1ccddf33720b3821b8753d6de825a958ceab3e', 32, 1, 'MyApp', '[]', 0, '2018-09-13 23:34:03', '2018-09-13 23:34:03', '2019-09-13 16:34:03'),
('50590efd5cd10290e89767051fa90d913bb5add3013505623de215baaf38df5210515847358df7d7', 32, 1, 'MyApp', '[]', 0, '2018-09-13 19:17:37', '2018-09-13 19:17:37', '2019-09-13 12:17:37'),
('5060eb7df2e68623631a3c3cbb1710af4b1187b67410773f8134d9d9a58c510c8de42830a2ec3da6', 209, 1, 'MyApp', '[]', 0, '2019-07-22 07:17:32', '2019-07-22 07:17:32', '2020-07-22 07:17:32'),
('50b52710fb7535a6bfb34d16db9cadc0211862ab98155996e69fe5f98360becf2dd8cca10dc5e07b', 32, 1, 'MyApp', '[]', 0, '2018-09-25 22:49:35', '2018-09-25 22:49:35', '2019-09-25 15:49:35'),
('50f22d57df9f997abe3547a605e3c49c1b265e8fbbf2b6bda9eb1a35964c399b9e74eff5ac532ec9', 87, 1, 'MyApp', '[]', 0, '2018-12-17 19:56:43', '2018-12-17 19:56:43', '2019-12-17 12:56:43'),
('51bc9e5ec91f8841c155950202edf09027230e04215c805ffbb21dbc790fcec5c1a4a25a6015473b', 32, 1, 'MyApp', '[]', 0, '2018-10-01 18:06:57', '2018-10-01 18:06:57', '2019-10-01 11:06:57'),
('51cdf1e5624e01061515213344f6d83f9e0d74f6d1314d0e25406c77a634dff0c090d7e92f558a42', 75, 1, 'MyApp', '[]', 0, '2018-10-16 18:35:07', '2018-10-16 18:35:07', '2019-10-16 11:35:07'),
('51e79dad91e9f4442fba2a49debc26fd92361a34ce67d07197a5ac4878ed33f8eb9181079a2e9d8a', 37, 1, 'MyApp', '[]', 0, '2018-09-14 00:03:41', '2018-09-14 00:03:41', '2019-09-13 17:03:41'),
('520acdf4066497ddf4eb92b7a01eed2dd6636b4db8277b69e2632124145b4e0bcd2b169faeea7252', 127, 1, 'MyApp', '[]', 0, '2019-03-23 18:13:14', '2019-03-23 18:13:14', '2020-03-23 11:13:14'),
('522812b2378aa37653e558886f7645642b6abd370e99290440489907b210a10f304bd5f20d6d6ffe', 177, 1, 'MyApp', '[]', 0, '2019-03-23 19:47:21', '2019-03-23 19:47:21', '2020-03-23 12:47:21'),
('52ada27c47dff6e1ca852c51d8b4d6f9b01bf2c07e2e5b67ae6ca2a5b2f14b5575809f6484420243', 32, 1, 'MyApp', '[]', 0, '2018-09-05 19:52:37', '2018-09-05 19:52:37', '2019-09-05 12:52:37'),
('52e75fd865cf5f4c8650968198174a1ede9b8d2b28e69530e4560186e0be5ee2ec5b1698ea8f4dfa', 212, 1, 'MyApp', '[]', 0, '2019-07-26 12:49:31', '2019-07-26 12:49:31', '2020-07-26 12:49:31'),
('52f29098c703fcc22fbbe6dc97fb576f15703a037e6f0f10831b5eecdfd869d9ff2a5ddbaaf31186', 127, 1, 'MyApp', '[]', 0, '2019-07-26 12:50:45', '2019-07-26 12:50:45', '2020-07-26 12:50:45'),
('52fdd004223b86b46c60a6f9cb94d3d1de9ec9b0ad61b6836728dcd79ed0d809e093b34f162e6f08', 127, 1, 'MyApp', '[]', 0, '2019-07-17 05:05:59', '2019-07-17 05:05:59', '2020-07-17 05:05:59'),
('53a133659dd0df07e61d911e2bf08d0fd8bec83073adec7eb5ef91190d9a49b08bdb25e3c42ef5b8', 177, 1, 'MyApp', '[]', 0, '2019-02-23 02:21:54', '2019-02-23 02:21:54', '2020-02-22 19:21:54'),
('53a3899b6f5f2ab3e22a23265e02f15471a2c9f4f9605362b628597517316c3ca85879e839dd089c', 174, 1, 'MyApp', '[]', 0, '2019-02-23 02:03:44', '2019-02-23 02:03:44', '2020-02-22 19:03:44'),
('53c69c59f49bda2c1dc55822a557712d115b192582ddfcb70b34c4f477fe51b41290c00c22a2624d', 30, 1, 'MyApp', '[]', 0, '2019-02-14 17:15:28', '2019-02-14 17:15:28', '2020-02-14 10:15:28'),
('53e1519c1a9070e7bdf2c357adc3aff107e3d362f3a7d21646ca391eda8993238288099a59a9ed50', 36, 1, 'MyApp', '[]', 0, '2018-09-13 19:06:18', '2018-09-13 19:06:18', '2019-09-13 12:06:18'),
('53f89623f1405c3732b65405c50d2b2ad661d5d1ae6f32a1129e2f574e8fa4b43d1cc006c9ee35c9', 102, 1, 'MyApp', '[]', 0, '2018-12-17 21:35:17', '2018-12-17 21:35:17', '2019-12-17 14:35:17'),
('540638d7914f7e9e6d2fb67a9fc50dbc5c0ae9d2c2c6fa9698e41811ed2f9cf0d30b37e07a88a067', 212, 1, 'MyApp', '[]', 0, '2019-07-25 10:31:36', '2019-07-25 10:31:36', '2020-07-25 10:31:36'),
('54875ecffe7c2f451df22d577369c5e5b024b83e99c067c03e533381d52f0daab4a95201b5583dc1', 30, 1, 'MyApp', '[]', 0, '2018-09-21 02:02:05', '2018-09-21 02:02:05', '2019-09-20 19:02:05'),
('54dc9b83c3d1ce0422f588aa28abd582d60fbd9aeb1faf4acb6043634e0ab4187055645686b4f193', 36, 1, 'MyApp', '[]', 0, '2018-09-24 21:48:20', '2018-09-24 21:48:20', '2019-09-24 14:48:20'),
('54eca362e803ffcedf389957a0b2ef27fe9ba9671a7b90b334a7ffee8317facf4327180b5e7c500a', 30, 1, 'MyApp', '[]', 0, '2019-02-10 18:01:06', '2019-02-10 18:01:06', '2020-02-10 11:01:06'),
('5503482dd6f7573f87b4b9610278da1c3d2792d0c3cfeea0d33fa612256bae78d63e7aab5bbc5657', 102, 1, 'MyApp', '[]', 0, '2018-11-24 22:55:51', '2018-11-24 22:55:51', '2019-11-24 15:55:51'),
('5532c3be03f995da9ab9f87aa3ad031cf974d536a7bd8fc9f770543492f3ae69c47ad9d8eb00ae44', 127, 1, 'MyApp', '[]', 0, '2019-08-01 06:22:13', '2019-08-01 06:22:13', '2020-08-01 06:22:13'),
('558fbdc750055425c40c2ba1249fb202b089a10f1ee6ece71b6a196f4309b76835b6e00fa245e49a', 177, 1, 'MyApp', '[]', 0, '2019-08-07 16:57:26', '2019-08-07 16:57:26', '2020-08-07 16:57:26'),
('5636f1a0f7c3b93a988656aa515a1fe9ea9b865d3676323530152a62c90d3c4f57a9ece5a2b31c9c', 37, 1, 'MyApp', '[]', 0, '2018-09-17 17:32:27', '2018-09-17 17:32:27', '2019-09-17 10:32:27'),
('567fba22909093d8bcdff4fa23cff2a0d0137311d7ecf16adf7093e2ba559e31e7663dafc20989c6', 218, 1, 'MyApp', '[]', 0, '2019-08-08 10:50:58', '2019-08-08 10:50:58', '2020-08-08 10:50:58'),
('56d28fe450c02de2cf4d0628535982729ab20d120b78e2480208d3a067720867f1f1cb6eab97a938', 75, 1, 'MyApp', '[]', 0, '2019-07-31 12:20:25', '2019-07-31 12:20:25', '2020-07-31 12:20:25'),
('56d53b8d94bfd52926106fa7ed8f4ba2d4c29248d8a8b294869e1973edadad12d7c4aea935f3e9aa', 32, 1, 'MyApp', '[]', 0, '2018-09-08 19:47:29', '2018-09-08 19:47:29', '2019-09-08 12:47:29'),
('56d61ec71507d896a43c77a68d9ff16a4250ad5ae150131f3f76ba93817e5741bc49dd936e3531aa', 39, 1, 'MyApp', '[]', 0, '2018-09-21 23:12:00', '2018-09-21 23:12:00', '2019-09-21 16:12:00'),
('5730c5f66f3bb06da86b6d5985e6e149044f94441022f367ae7351c372d0679d30bd0a79a5cf74ea', 212, 1, 'MyApp', '[]', 0, '2019-07-25 10:24:24', '2019-07-25 10:24:24', '2020-07-25 10:24:24'),
('575190c0fa4475a4a61e2b2a703c4bdb9577ea8938c9b557ff4848a8ecb9d442fc969d99d8518d57', 127, 1, 'MyApp', '[]', 0, '2019-07-16 06:48:19', '2019-07-16 06:48:19', '2020-07-16 06:48:19'),
('5756e31532010c33d869f1e43dc6e7d66396280d4937bc23aba72c7a73242e3e94344935e38d6844', 204, 1, 'MyApp', '[]', 0, '2019-06-28 21:23:26', '2019-06-28 21:23:26', '2020-06-28 14:23:26'),
('578b29e072e4ee2896e9af13984d2d21ec4f0ec2cf95b08c50a78cf0484dceb57171f6fe52db2ae4', 189, 1, 'MyApp', '[]', 0, '2019-03-12 05:47:50', '2019-03-12 05:47:50', '2020-03-11 22:47:50'),
('57c31a4a7287641ebbe15c39c3c9b2b01698fb8c315e46cefa3c4883ad4daf2a0ff8b2a5df2033fd', 60, 1, 'MyApp', '[]', 0, '2018-10-02 20:18:06', '2018-10-02 20:18:06', '2019-10-02 13:18:06'),
('58a9b24aff4017165c436fb3f286d7ef5a43af9d4cd3600d0e3c30aa0999e4b7bbfa23484b38a0dc', 127, 1, 'MyApp', '[]', 0, '2019-08-07 10:29:12', '2019-08-07 10:29:12', '2020-08-07 10:29:12'),
('58be0eef342e79634db2fd6b1fd8efc32d261d761540348b361c06695faa8d21b0e43d0bafcb3783', 39, 1, 'MyApp', '[]', 0, '2018-09-09 18:55:45', '2018-09-09 18:55:45', '2019-09-09 11:55:45'),
('58bff0654eef299c6b0f3f31d56881f36d9f6a5a9834c5c992c2d2d312adf99b1be2313bd623911a', 212, 1, 'MyApp', '[]', 0, '2019-07-25 09:28:29', '2019-07-25 09:28:29', '2020-07-25 09:28:29'),
('5959a7d7ad2c311a24ad9d96c48e37ec93eb8baca4f5a617de7dfdb586af3148e5c46042c2cfc7b7', 133, 1, 'MyApp', '[]', 0, '2019-01-19 01:54:25', '2019-01-19 01:54:25', '2020-01-18 18:54:25'),
('59788c35ced8ce425d2fe29d977bb0f8ef462ca460252fb851587f628d65afeb11c5255b804e0c8c', 213, 1, 'MyApp', '[]', 0, '2019-07-27 09:40:24', '2019-07-27 09:40:24', '2020-07-27 09:40:24'),
('59b7a5db07a74a562b6042011a99b716adf6e2318725394d9ffd30c5381c2f62bcd32578d3555f26', 64, 1, 'MyApp', '[]', 0, '2018-10-05 20:38:17', '2018-10-05 20:38:17', '2019-10-05 13:38:17'),
('5a16941fd08d22fe0a103f2300009f44d07795c5849805b6cd95be36972d8516360b9c4034572010', 37, 1, 'MyApp', '[]', 0, '2018-09-13 23:18:56', '2018-09-13 23:18:56', '2019-09-13 16:18:56'),
('5abcd1ff2d9c79c246a96672b67b35eafdc84497ed3b05ce1eef99ab038f941f125e01144cecf35a', 173, 1, 'MyApp', '[]', 0, '2019-02-23 00:25:51', '2019-02-23 00:25:51', '2020-02-22 17:25:51'),
('5ad4c9d48fbb871dffbfc229f29c837731f6a826746dee3a3675784f56082727e6f3f6b0a1c14586', 103, 1, 'MyApp', '[]', 0, '2018-11-23 17:41:06', '2018-11-23 17:41:06', '2019-11-23 10:41:06'),
('5b8db674c0c2327528671f452b337baebad4bc53155274f7b55fcd5389ea238e28efb492437079f8', 75, 1, 'MyApp', '[]', 0, '2019-07-29 07:44:45', '2019-07-29 07:44:45', '2020-07-29 07:44:45'),
('5b9db6a689041676c3845098333ad42c4456e48cbf484fa1eebdd2e14a26acaa0ff54ca7f57402c2', 102, 1, 'MyApp', '[]', 0, '2018-12-17 18:42:30', '2018-12-17 18:42:30', '2019-12-17 11:42:30'),
('5ba05ecbafd3d41356c3b0e315dfb15a9a3dc5fd3f0a4b4c6ea3cea144892f9f268214d74986d6b8', 36, 1, 'MyApp', '[]', 0, '2018-09-13 18:43:24', '2018-09-13 18:43:24', '2019-09-13 11:43:24'),
('5ba8cadfb0a6939bc3fbcb9f4115db71dc509c01958872272d19ba4537b7bdba16650f454edfb4fb', 217, 1, 'MyApp', '[]', 0, '2019-07-31 11:54:05', '2019-07-31 11:54:05', '2020-07-31 11:54:05'),
('5c4a3fdb5524c58d9c0a49568725d9001eb0a457265005bc952b15bf0c5f97e39f6804f8b0eeec01', 32, 1, 'MyApp', '[]', 0, '2018-09-10 23:51:51', '2018-09-10 23:51:51', '2019-09-10 16:51:51'),
('5d47439b0f42345afe1f356d2022f8ccd994a0cd5d7e958bfa32f558d2a6b132d36caeec6de0b942', 31, 1, 'MyApp', '[]', 0, '2018-09-12 00:38:45', '2018-09-12 00:38:45', '2019-09-11 17:38:45'),
('5d49988a87d76d16a617041ae69e40a93fe717a5c5901ad15b7e44c837e8e42508fd3f6a467a409d', 127, 1, 'MyApp', '[]', 0, '2019-07-26 12:40:59', '2019-07-26 12:40:59', '2020-07-26 12:40:59'),
('5dc63ae6759da8b95439abbbf26006237ec4578b9e71485b309cfcee6160c7f1962abc87f41944e5', 32, 1, 'MyApp', '[]', 0, '2018-09-08 20:16:36', '2018-09-08 20:16:36', '2019-09-08 13:16:36'),
('5dd720b32f4d8cfb7ee3340c15e1d6b77938f507ab55b2daa1a06f1023a8acf4e39f06268c01a2a0', 127, 1, 'MyApp', '[]', 0, '2019-06-27 21:31:44', '2019-06-27 21:31:44', '2020-06-27 14:31:44'),
('5dd882f06641e9dc06b7ab00e76a5748462d0cac9db7da26e53c7a95e876d9165d8ca5d4b299a11a', 104, 1, 'MyApp', '[]', 0, '2018-11-26 23:14:22', '2018-11-26 23:14:22', '2019-11-26 16:14:22'),
('5df86b4ab9168b80f93c481dbf293d082f5cdc6acf9422c01fb464e0fed0202c98cc88bfacb49644', 212, 1, 'MyApp', '[]', 0, '2019-07-25 09:24:22', '2019-07-25 09:24:22', '2020-07-25 09:24:22'),
('5e53b0993da0fad36ea2907ae60b6c3c2ba4616a1f423fc32f0bcc55847c4a98c04787ea9fdc8cef', 35, 1, 'MyApp', '[]', 0, '2018-09-03 23:59:35', '2018-09-03 23:59:35', '2019-09-03 16:59:35'),
('5e66b7c721e0691d2b0c00ac1d064082873692bf69c7e270a2c3a5d6f93c8de88f5fd910c0088bc6', 212, 1, 'MyApp', '[]', 0, '2019-08-06 06:14:06', '2019-08-06 06:14:06', '2020-08-06 06:14:06'),
('5e736d6a06ce8dcda76ef6fb32380d01f78c46256fd2f9bd1b3859247681a4876d07d7ac0aeb34c2', 102, 1, 'MyApp', '[]', 0, '2018-12-17 18:37:14', '2018-12-17 18:37:14', '2019-12-17 11:37:14'),
('5e925ca146787618952fd8bb280f14ed75851d187881ec2586d1a6dd7252905a370f608c6d98038a', 199, 1, 'MyApp', '[]', 0, '2019-06-17 19:47:55', '2019-06-17 19:47:55', '2020-06-17 12:47:55'),
('5ee14b1f2b907c937ef5dbfca52deed2722df21eda7faa6df673c8c15e098c511807924bab907249', 163, 1, 'MyApp', '[]', 0, '2019-02-22 21:50:45', '2019-02-22 21:50:45', '2020-02-22 14:50:45'),
('5f20ab90170120565469a1273ce4146f2b7abd6c29d2edd4886626fb5fb2ec8fb1f5b971e8337863', 41, 1, 'MyApp', '[]', 0, '2018-09-08 18:42:53', '2018-09-08 18:42:53', '2019-09-08 11:42:53'),
('5f4cb301571c3faafd7be372fb30b939af0d5882f7c5a2c960ca345941f7467b498d2518ffa283ba', 127, 1, 'MyApp', '[]', 0, '2019-08-05 12:10:24', '2019-08-05 12:10:24', '2020-08-05 12:10:24'),
('5f8e87dc0791e855c4297f04a04c56259c30961e8641fa59df627360707f5874e0167233e65da5cb', 41, 1, 'MyApp', '[]', 0, '2018-09-08 18:40:06', '2018-09-08 18:40:06', '2019-09-08 11:40:06'),
('6027db653015759ee100c2c8ab0e423097f1b30d1899bb9abf9ee4d6b0ec2c08c29f0bf61e5f8a8a', 75, 1, 'MyApp', '[]', 0, '2019-01-06 19:37:23', '2019-01-06 19:37:23', '2020-01-06 12:37:23'),
('606fd60770fd81a2d34f6f887948638be2028218d1d325ee4e12b47861253e50f67970af66167668', 87, 1, 'MyApp', '[]', 0, '2018-11-26 19:08:02', '2018-11-26 19:08:02', '2019-11-26 12:08:02'),
('60b7a94e4812895f27656b68fedabb9d884837060697f30f20ea11bd89652faf04fe4724f88ee1cd', 58, 1, 'MyApp', '[]', 0, '2018-10-03 23:58:10', '2018-10-03 23:58:10', '2019-10-03 16:58:10'),
('61f5366ceb1d4ba14236f3b91bcc240114641fb74d6d1268a781b907b083253129d36cd3f8c28bff', 127, 1, 'MyApp', '[]', 0, '2019-07-17 06:40:48', '2019-07-17 06:40:48', '2020-07-17 06:40:48'),
('624eaba360c3662ca9ecf5146d6992e795938850574a3eb772b1fb9ccf01e00aca5efce30cb71519', 198, 1, 'MyApp', '[]', 0, '2019-05-30 22:33:56', '2019-05-30 22:33:56', '2020-05-30 15:33:56'),
('6251cb705efebb9c069d6d3c8f9e6eb7d544e22744ef66de4fd55bc99688f883c9652da9ba81287c', 32, 1, 'MyApp', '[]', 0, '2018-09-08 23:12:16', '2018-09-08 23:12:16', '2019-09-08 16:12:16'),
('625e6167096198b9a8b4b34998ec95d3d56b43cd0f08297ac0eaf236cb6953474cf6ce39aa1c5724', 37, 1, 'MyApp', '[]', 0, '2018-09-07 01:34:37', '2018-09-07 01:34:37', '2019-09-06 18:34:37'),
('627943ceb08c6a10596b7004cc534025e3d93025e10ae902413bf5836968acdf89c5bd504e4a2939', 30, 1, 'MyApp', '[]', 0, '2018-09-14 17:45:29', '2018-09-14 17:45:29', '2019-09-14 10:45:29'),
('62dcd0fb684049de12d819db7016058cbe361d8b2433f680e0d207bf8c079650a5f4957087d16419', 201, 1, 'MyApp', '[]', 0, '2019-07-29 07:54:54', '2019-07-29 07:54:54', '2020-07-29 07:54:54'),
('6371f7be04272945c02736f85e5b5fcf3b0a1349e1d34493fc36a80fb3343879b81adc1483e4b644', 30, 1, 'MyApp', '[]', 0, '2018-09-21 01:04:00', '2018-09-21 01:04:00', '2019-09-20 18:04:00'),
('6432b58fe3148da73e6c3ec526a70a7fb47852fcb9cbce1e92a20d3fab2bade32419bfefad335f41', 32, 1, 'MyApp', '[]', 0, '2018-09-17 18:02:16', '2018-09-17 18:02:16', '2019-09-17 11:02:16'),
('64562c1e73512534bd3c3c72a3b4aa15a22cdcffdb98de1f41b6dde8c785ba44e64812b1bd16ec7d', 32, 1, 'MyApp', '[]', 0, '2018-09-08 18:07:44', '2018-09-08 18:07:44', '2019-09-08 11:07:44'),
('647f6678286d4d118a08f2db2117c1c37494fb06c2ceef6eeb95a48902fe2225230bb1f86326891f', 100, 1, 'MyApp', '[]', 0, '2018-11-21 20:35:54', '2018-11-21 20:35:54', '2019-11-21 13:35:54'),
('64a8096df4813d527efb3fbb45db6f170d4110892e27abcb044e97267fe82f73cc4d2da1accdd1c7', 36, 1, 'MyApp', '[]', 0, '2018-09-13 23:32:24', '2018-09-13 23:32:24', '2019-09-13 16:32:24'),
('64dd1613cf9d83cd907d2a7bdf31666331b401274a8bcf86b966261dd97ca2b4e9c7cd165797d983', 127, 1, 'MyApp', '[]', 0, '2019-07-23 10:06:56', '2019-07-23 10:06:56', '2020-07-23 10:06:56'),
('64ed267efeafc6b5470ad6c1a3d3cae4790f5e0afa57ee0a5e979cf646040a7b4cbbfae539fa836b', 30, 1, 'MyApp', '[]', 0, '2019-02-12 16:18:25', '2019-02-12 16:18:25', '2020-02-12 09:18:25'),
('653b7d367c6f0e8cdb4bdf962e13c624ec4515e8c6f5ff079dfe1c92b7087986191454072fe3ea3b', 36, 1, 'MyApp', '[]', 0, '2018-09-13 18:16:37', '2018-09-13 18:16:37', '2019-09-13 11:16:37'),
('654cbce4570b50fdee18048d90430b070702714fea48987ba857b820e00e095151f75eeb9caeabab', 30, 1, 'MyApp', '[]', 0, '2018-09-14 17:04:43', '2018-09-14 17:04:43', '2019-09-14 10:04:43'),
('6590edfde136c3e0915637ccf458d6466a39aeba6e943e6067587e3a639269f4d1a12c0a3c6475ac', 30, 1, 'MyApp', '[]', 0, '2018-09-06 01:38:14', '2018-09-06 01:38:14', '2019-09-05 18:38:14'),
('66adbfbd12eca8c471fdbe061cf40f33cfa3275f15c96a0bfe14a3f49102a1d09d1e138d9a7665f8', 32, 1, 'MyApp', '[]', 0, '2018-09-08 22:01:34', '2018-09-08 22:01:34', '2019-09-08 15:01:34'),
('66e9ee220e9eb98d8db9f020a6da8c88b9016d2c9ef974faa1fd7d74d0bf548e2e2bfdc362d1e0cb', 30, 1, 'MyApp', '[]', 0, '2018-09-30 05:51:23', '2018-09-30 05:51:23', '2019-09-29 22:51:23'),
('671878655e4ad3abdf16c5f98ddc9cccbbb0641923774b67e912ca9f9d5f13edfde022a62a60a03e', 59, 1, 'MyApp', '[]', 0, '2018-10-01 21:27:48', '2018-10-01 21:27:48', '2019-10-01 14:27:48'),
('671bb2cb4224dc89c63ff2d2d1cbb141abeeb21efd4b774f4ad94b1047694c11d1724a0b980267a8', 45, 1, 'MyApp', '[]', 0, '2018-09-27 03:23:23', '2018-09-27 03:23:23', '2019-09-26 20:23:23'),
('679a3b7bc9922a96fd63e11c33a6e797449940bedee35f57dc13b879edc3c273d3d834e0d212309c', 177, 1, 'MyApp', '[]', 0, '2019-07-23 10:24:28', '2019-07-23 10:24:28', '2020-07-23 10:24:28'),
('679ea9a2665b66d8150099220864f2f89b94f102862c25e41c7dc160973d9af0eff5905f5c9f4ca7', 127, 1, 'MyApp', '[]', 0, '2019-08-08 11:00:08', '2019-08-08 11:00:08', '2020-08-08 11:00:08'),
('67aa8274ef6042d1acea796ff0715d477b54903637be6b411d5f8bc66482ba68c3dc87063973880e', 36, 1, 'MyApp', '[]', 0, '2018-09-13 19:36:16', '2018-09-13 19:36:16', '2019-09-13 12:36:16'),
('6886fb350fec3e8c5bc632aaa5b2ab5dc3e1ff940720e92a8f25fac9793324d1dd27a2b944833160', 42, 1, 'MyApp', '[]', 0, '2018-09-08 19:22:37', '2018-09-08 19:22:37', '2019-09-08 12:22:37'),
('68ecf267e1a685a4df0f96a97bf941fbf26ed12d7245d8556316e0761dc59776e14bd2772aa8e02e', 38, 1, 'MyApp', '[]', 0, '2018-09-25 23:09:02', '2018-09-25 23:09:02', '2019-09-25 16:09:02'),
('695a4c55341b193e232b909838f84d6e44b50dd19b126b522f48aa57444e8cb05e11fc81f0c4c3ff', 30, 1, 'MyApp', '[]', 0, '2018-09-19 01:22:18', '2018-09-19 01:22:18', '2019-09-18 18:22:18'),
('69b8bf570ee18b7c9483c41ed6661b91dfce9a6459c73e35619bac14e82ed916d67c1c5f187acd0d', 43, 1, 'MyApp', '[]', 0, '2018-09-11 21:57:35', '2018-09-11 21:57:35', '2019-09-11 14:57:35'),
('6a44742bd39dc6b56a7bced2df45369c47f6295a4a0ca2c40c60f14d2f8561ba028260263acfedc7', 127, 1, 'MyApp', '[]', 0, '2019-03-15 23:42:31', '2019-03-15 23:42:31', '2020-03-15 16:42:31'),
('6ac5f21e06ecdd31a4635d55a62a8ed1de7abdfee4ca37ca139576c4b4654b58a31bae909912a9d4', 61, 1, 'MyApp', '[]', 0, '2018-10-03 01:36:59', '2018-10-03 01:36:59', '2019-10-02 18:36:59'),
('6b02c2e2eb077f919493f0229e5011e0b84f4a66cca34fd3248fa6d893b0174234d1e41d8b161db5', 127, 1, 'MyApp', '[]', 0, '2019-08-07 10:12:49', '2019-08-07 10:12:49', '2020-08-07 10:12:49'),
('6b5716e9b6edd497d3f35e9c795573d05067600ba81e861b8e29fec74fb09e6f4c9a8b11b09f4eb7', 102, 1, 'MyApp', '[]', 0, '2018-11-27 00:12:40', '2018-11-27 00:12:40', '2019-11-26 17:12:40'),
('6b6b0971e72d496f47c464d0f1fc0545f7378004aeb741c2fdf004cd9c7b07342e8a820ae9ddcb97', 127, 1, 'MyApp', '[]', 0, '2019-03-04 03:50:01', '2019-03-04 03:50:01', '2020-03-03 20:50:01'),
('6bbfcd51a783be0dc75a2fc0df9130cf51cd7b64744455c53df8156ffafe682cae18e72d74f460c8', 31, 1, 'MyApp', '[]', 0, '2018-09-13 17:46:05', '2018-09-13 17:46:05', '2019-09-13 10:46:05'),
('6bf660ef9ed0ce71ced984b544d4561c77cc52219f006b88071fe6cb911e649b6c1cf8e1076ed31f', 87, 1, 'MyApp', '[]', 0, '2019-01-04 00:38:16', '2019-01-04 00:38:16', '2020-01-03 17:38:16'),
('6c7fa574ae8731d91632fe5a5b1b9006262eadd31761ca7aa073673cb2dc85fa2862c03771e3fc2f', 52, 1, 'MyApp', '[]', 0, '2018-09-29 20:14:53', '2018-09-29 20:14:53', '2019-09-29 13:14:53'),
('6cdecebb643a1edace2511dc553bd637b829bc5e9181660498c509039c12c1187c3e81ddf442e144', 68, 1, 'MyApp', '[]', 0, '2018-10-09 02:45:35', '2018-10-09 02:45:35', '2019-10-08 19:45:35'),
('6ce33af4a89db41e0ce526c62ad32310620071f6e4b37e9586f6312890b668a49cc18ba3e62ad7b9', 32, 1, 'MyApp', '[]', 0, '2018-09-08 23:21:24', '2018-09-08 23:21:24', '2019-09-08 16:21:24'),
('6d048224326ffe9c0a392e6bb389ccf5a505b26384df344c6e0a36aff0e8e304bd4b7f7214a3a0c9', 65, 1, 'MyApp', '[]', 0, '2018-10-06 03:07:04', '2018-10-06 03:07:04', '2019-10-05 20:07:04'),
('6efd0e52034448359f6a65a20454251afc721d9ae06b419d1e22d4c9b462e491b7e4cb56aa30fb1c', 30, 1, 'MyApp', '[]', 0, '2018-09-12 00:18:34', '2018-09-12 00:18:34', '2019-09-11 17:18:34'),
('6f59ff0fcd23d5e45c731ff69f3b62a13b8ab5bd02c530a0f34a8a5bd56181fd9403d9af8f19f623', 36, 1, 'MyApp', '[]', 0, '2018-09-28 18:11:58', '2018-09-28 18:11:58', '2019-09-28 11:11:58'),
('6fb453ef4352ac99929fce1f15a4338a0c3df53f70e3bac61d8dd5e70daefc1c01e5478c42e1758a', 131, 1, 'MyApp', '[]', 0, '2019-01-13 02:20:05', '2019-01-13 02:20:05', '2020-01-12 19:20:05'),
('6fc1861ee576cab76ce444501679348c132fec07f965e7a4bf3e9c343f2c7b560a2b23ba611515e1', 32, 1, 'MyApp', '[]', 0, '2018-10-01 17:28:57', '2018-10-01 17:28:57', '2019-10-01 10:28:57'),
('7020a36c2a094765ed3c7f06d7e42685707e5d0d5818782f989df6d924dc64263a1bf6418f6fb35a', 87, 1, 'MyApp', '[]', 0, '2018-12-17 20:15:02', '2018-12-17 20:15:02', '2019-12-17 13:15:02'),
('7047f2a43015267c2252f6e2f5a238c9fb5a1bcac96881bfce685147e8e9f6b4d559e76d07ec549f', 32, 1, 'MyApp', '[]', 0, '2018-09-25 22:58:48', '2018-09-25 22:58:48', '2019-09-25 15:58:48'),
('707331997283eb217f3c4b13c22d36b9dc3bc5f635f47488fde472c4515d8403efba4e833da8af44', 36, 1, 'MyApp', '[]', 0, '2018-09-13 20:21:39', '2018-09-13 20:21:39', '2019-09-13 13:21:39'),
('71473fc8c16a56d38e409a3f54ca7511578efabe3ab365022044ec3e46d2528463c6a21a2bf98fff', 177, 1, 'MyApp', '[]', 0, '2019-08-02 09:08:22', '2019-08-02 09:08:22', '2020-08-02 09:08:22'),
('717fe3adbc4db96908bc35a02a44dd51164461e8e39a3a13c3a002c0edd0bdbe432fea0c3e0788a8', 127, 1, 'MyApp', '[]', 0, '2019-07-19 11:48:16', '2019-07-19 11:48:16', '2020-07-19 11:48:16'),
('72304323fbb2af7c6101cfacc2372eedee48d355ffa1bad4674760ead8de63f09995dbc77ce16de2', 127, 1, 'MyApp', '[]', 0, '2019-10-23 17:03:10', '2019-10-23 17:03:10', '2020-10-23 17:03:10'),
('7272d06bbe584ab96f1e86b05e337810aaea8c817857ae8e8a95eaf99306d0deeec44882110cada6', 177, 1, 'MyApp', '[]', 0, '2019-07-27 04:30:37', '2019-07-27 04:30:37', '2020-07-27 04:30:37'),
('72b6ca3bb793a63c215b717e1af29855f233fec5d03f3d08371759ade3e0f7052cf3628b04ca7772', 48, 1, 'MyApp', '[]', 0, '2018-10-01 17:19:17', '2018-10-01 17:19:17', '2019-10-01 10:19:17'),
('72bb13acfcf0514769e29223beaaf472a596898e982559e3998a49cb5d285d4bb405129673634d7f', 127, 1, 'MyApp', '[]', 0, '2019-06-27 21:20:10', '2019-06-27 21:20:10', '2020-06-27 14:20:10'),
('72e7db09fe5fcabc7cd323f521bdc6ece4d640a85e623b7e263331551d3a5f0204c20fa070da7d88', 32, 1, 'MyApp', '[]', 0, '2018-09-17 19:05:49', '2018-09-17 19:05:49', '2019-09-17 12:05:49'),
('72eee0b4d611d729b133327245d562d8ed751d1894db93ea531a17065ec4194ab77556801fa7fd77', 58, 1, 'MyApp', '[]', 0, '2018-10-01 18:08:33', '2018-10-01 18:08:33', '2019-10-01 11:08:33'),
('734e08770d84c9141872594a328faef846b52eeec52895ff65c2a7e6c0b4e4d1826cfd4c8788bfc0', 31, 1, 'MyApp', '[]', 0, '2018-09-19 17:56:09', '2018-09-19 17:56:09', '2019-09-19 10:56:09'),
('7377dd9f4fc7b401753a9ca1c151daa36ba63a3e59e8c3d10d27b59d8333b42bbf818ed5017ea683', 102, 1, 'MyApp', '[]', 0, '2018-12-17 19:21:36', '2018-12-17 19:21:36', '2019-12-17 12:21:36'),
('739bc57360497a5790c88b1a8a331c7dc548bfa16052be3e860c8299b2f86ca0e10133ab9758cc4e', 32, 1, 'MyApp', '[]', 0, '2018-09-06 19:49:07', '2018-09-06 19:49:07', '2019-09-06 12:49:07'),
('739cb71513a747bf90f520de2a089b54ccee1ddb5e6264b0229bcdd371524f2f026c229d170ca468', 32, 1, 'MyApp', '[]', 0, '2018-09-07 01:46:51', '2018-09-07 01:46:51', '2019-09-06 18:46:51'),
('73cb7e3d64477192fe3d6c5dffe41409ab2c686f4947976cce7c7e7c834dfbea77b5b3f6fc34e1f7', 72, 1, 'MyApp', '[]', 0, '2018-10-10 17:55:30', '2018-10-10 17:55:30', '2019-10-10 10:55:30'),
('73ef4305c641828b749aef99296f6713a14c55d3d72c10658bd9d3c812f809abff927e49b10369ec', 32, 1, 'MyApp', '[]', 0, '2018-09-08 20:40:43', '2018-09-08 20:40:43', '2019-09-08 13:40:43'),
('7479b5c282150e8e1a5da33144efc5e40196b1f67882898f10c1e46492245e089817cedde3562805', 30, 1, 'MyApp', '[]', 0, '2018-09-25 19:48:47', '2018-09-25 19:48:47', '2019-09-25 12:48:47'),
('7517b9549ede5e9e2017b03f2cd3ee938fe7de6cd2428c95ce347b039d42e6050c7e88ae5ed22152', 127, 1, 'MyApp', '[]', 0, '2019-07-22 06:08:19', '2019-07-22 06:08:19', '2020-07-22 06:08:19'),
('755931c8d4ace17ede35bb703e045e85498e08a3c99c9a18356e69123c8bcdbd7506ae90e932b71c', 102, 1, 'MyApp', '[]', 0, '2018-12-17 19:17:36', '2018-12-17 19:17:36', '2019-12-17 12:17:36'),
('756487d20176b8a5a77d3a44616ef78d42a0884ed5570178547db690bcac4c510ca40572333e375a', 179, 1, 'MyApp', '[]', 0, '2019-02-24 23:26:30', '2019-02-24 23:26:30', '2020-02-24 16:26:30'),
('75a0d58f2e5ede4a614f7c24f4f6256504770a4225a7b928de65674f78a856d98496a256899c0b45', 200, 1, 'MyApp', '[]', 0, '2019-08-08 10:41:40', '2019-08-08 10:41:40', '2020-08-08 10:41:40'),
('75b164ab0e58d491fb333266f5a6989ce9debf750b562b3deb2640fa17c0e2d74e808fe872d83b5f', 31, 1, 'MyApp', '[]', 0, '2018-09-14 17:43:40', '2018-09-14 17:43:40', '2019-09-14 10:43:40'),
('75bb5591e3cac99d7bccc624b901457e6934821060599f9b6ab449c49903921aeea4d83d8b6dc921', 197, 1, 'MyApp', '[]', 0, '2019-05-30 22:23:21', '2019-05-30 22:23:21', '2020-05-30 15:23:21'),
('75bd3075d6fafcb20497a5c72953013b678c3ef02b93f87bed3e00351dd4b2abc965a472e2c19f80', 174, 1, 'MyApp', '[]', 0, '2019-02-23 02:09:33', '2019-02-23 02:09:33', '2020-02-22 19:09:33'),
('7643d9cbb8e12b944544d1f9d5cc53f465c4a5b7bd2dd6683df4212e04a72e33d75471fd4a9a8a15', 30, 1, 'MyApp', '[]', 0, '2019-02-14 01:58:25', '2019-02-14 01:58:25', '2020-02-13 18:58:25'),
('7694b4076613c87fbf39ac9e97accd8b596d90bebe572cae389cd184c0d11630fd017feca5711b99', 127, 1, 'MyApp', '[]', 0, '2019-07-25 10:25:59', '2019-07-25 10:25:59', '2020-07-25 10:25:59'),
('76d6af3bdccd41bd75abbd5fa21a955e8b010e21206f08b41127a8b37487edc649e66e4f0d3dcb22', 142, 1, 'MyApp', '[]', 0, '2019-02-05 02:20:33', '2019-02-05 02:20:33', '2020-02-04 19:20:33'),
('771978140997a63242f6006324610f2e5aed44176b5508eba28c4428ac84066987775a0729f88466', 87, 1, 'MyApp', '[]', 0, '2018-12-17 18:46:46', '2018-12-17 18:46:46', '2019-12-17 11:46:46'),
('77f700b4acea19e0c196ad89235ff357b9bd31cc5ae2bc298fe0f1a2da0cb25cb9e9e35d322324f2', 31, 1, 'MyApp', '[]', 0, '2018-09-13 21:20:32', '2018-09-13 21:20:32', '2019-09-13 14:20:32'),
('77fa239885e4fdfb4bea5bf7d31b8288e145eff044184cb2586f10194d0e249687c9e908b74be24e', 32, 1, 'MyApp', '[]', 0, '2018-09-13 17:53:42', '2018-09-13 17:53:42', '2019-09-13 10:53:42'),
('786d064d66822dc064c66607869d27bdb4090c774d30b6f55129ce5e5566d08800f9bb751ded25ab', 32, 1, 'MyApp', '[]', 0, '2018-09-13 23:20:24', '2018-09-13 23:20:24', '2019-09-13 16:20:24'),
('78f6869af8265b301a93840daf24be8c5b96670942d16292e6a416f3978debfb02b08aabb05b5d48', 111, 1, 'MyApp', '[]', 0, '2019-02-12 17:12:18', '2019-02-12 17:12:18', '2020-02-12 10:12:18'),
('792d35491a3c87eb2b5295dfc9e473b33aa05277380e808e4c323f4716ae846ea26aac2df675451c', 32, 1, 'MyApp', '[]', 0, '2018-09-21 17:52:02', '2018-09-21 17:52:02', '2019-09-21 10:52:02'),
('794a57cb965fd77bb37c1550407b484f25d17613700c2c26b3c8f8b8bc8bf90796d9ebcf65143dc9', 31, 1, 'MyApp', '[]', 0, '2018-09-21 02:02:51', '2018-09-21 02:02:51', '2019-09-20 19:02:51'),
('7981f7aacf97ca173ec72104b17bdabc86d4a70f2f622d5908716092255c40d743dac5baf844ddd9', 127, 1, 'MyApp', '[]', 0, '2019-03-16 00:31:12', '2019-03-16 00:31:12', '2020-03-15 17:31:12'),
('79bcf7b7be0634f36cdbae979feeb85c6f51dfe2b8a05c40ed260d0d8197249c2c5b589169be2577', 32, 1, 'MyApp', '[]', 0, '2018-09-05 19:14:43', '2018-09-05 19:14:43', '2019-09-05 12:14:43'),
('79d9024402987b1153866ed56372576bf3d5caa338d90a758397417d3bac04b8ceea52b991330357', 208, 1, 'MyApp', '[]', 0, '2019-07-10 08:41:58', '2019-07-10 08:41:58', '2020-07-10 08:41:58'),
('7a47a97181107fa86e7f12a57fc0e55d0e67e4a3a4251eea86f7dac37127a28ddd7cad38452934ee', 127, 1, 'MyApp', '[]', 0, '2019-03-04 03:50:01', '2019-03-04 03:50:01', '2020-03-03 20:50:01'),
('7a4d00eab1891dfceccf616632fe36c9f330113c39ce08346687185f56867d0b44cfd52facbd575c', 127, 1, 'MyApp', '[]', 0, '2019-06-22 23:43:35', '2019-06-22 23:43:35', '2020-06-22 16:43:35'),
('7a4f0658521bc7cdcd6f14ea475fd0d068b610746da2726d8c7c4832167ff9eadc76acfd7f52f101', 31, 1, 'MyApp', '[]', 0, '2018-09-13 20:46:56', '2018-09-13 20:46:56', '2019-09-13 13:46:56'),
('7a9f824ade7dd564a1ffc652aaf1fe945acfa51c1f802d71f9748628e49e93c9f35016fc4c6c7337', 37, 1, 'MyApp', '[]', 0, '2018-09-08 00:37:41', '2018-09-08 00:37:41', '2019-09-07 17:37:41'),
('7aeb4ce5d279f3e71f1a553327bb7fade4fc9a020568711cd4d6fd590675fbff161fde12af243a23', 177, 1, 'MyApp', '[]', 0, '2019-08-01 08:31:40', '2019-08-01 08:31:40', '2020-08-01 08:31:40'),
('7b01ff11cc49a1a0d3c8d39e2cdc1d6254991cce6dc2fc2ffdd09c50f641a55601bd871c854630e5', 32, 1, 'MyApp', '[]', 0, '2018-09-03 23:08:12', '2018-09-03 23:08:12', '2019-09-03 16:08:12'),
('7b8261cb57d3b36d3f04ce4c5581a96a8cffded2ffff80f69047af934c78efed4f736395b37e9c76', 94, 1, 'MyApp', '[]', 0, '2018-11-12 21:14:52', '2018-11-12 21:14:52', '2019-11-12 14:14:52'),
('7c227812705a42a7ff19e22881d7be74bc052ff5983e2c6611f0d9fdefc26dcc18b588557bf6e8e1', 39, 1, 'MyApp', '[]', 0, '2018-09-26 19:35:18', '2018-09-26 19:35:18', '2019-09-26 12:35:18'),
('7c6c644ff23613a16e0a8692e5d24283884c7328d47bc457e3e669c6614aa2e5a22e9c13d313af2e', 177, 1, 'MyApp', '[]', 0, '2019-03-23 18:05:44', '2019-03-23 18:05:44', '2020-03-23 11:05:44'),
('7c9305335a060bbc1b5837ab9120503c562deb15aa0f27570cdb47c99230789e437acaa3b5e38be8', 87, 1, 'MyApp', '[]', 0, '2018-11-27 00:11:08', '2018-11-27 00:11:08', '2019-11-26 17:11:08'),
('7c9a8e76921feaf1691d1e17045f4a06550d00975d99ac65e53541fc059916878d27d3ed08fc5450', 87, 1, 'MyApp', '[]', 0, '2019-01-10 21:21:24', '2019-01-10 21:21:24', '2020-01-10 14:21:24'),
('7cc2f24b9ea8dff6d74a187e9470d0008b6087a3b42f3ad8b3ad94e55901c01b47d2258c1df25426', 116, 1, 'MyApp', '[]', 0, '2018-12-25 22:26:25', '2018-12-25 22:26:25', '2019-12-25 15:26:25'),
('7d08bdac9a8df7f3418f0e8b9347661b42a1bc49380e999a35e3099ece731cd3f815d0689de494b7', 38, 1, 'MyApp', '[]', 0, '2018-09-25 23:15:05', '2018-09-25 23:15:05', '2019-09-25 16:15:05'),
('7d23927088e2dc13929e6692c0e05bc7fb6b845e22f99990cbe22ebf70af597f454c5540cda8ca91', 32, 1, 'MyApp', '[]', 0, '2018-09-06 20:54:47', '2018-09-06 20:54:47', '2019-09-06 13:54:47'),
('7d316f53715b731c32feac7e09ed0f3a7f0d56a572990682000e2303338f0427ed7b069f28d0d0e4', 32, 1, 'MyApp', '[]', 0, '2018-09-08 20:34:27', '2018-09-08 20:34:27', '2019-09-08 13:34:27'),
('7d56749230f73425ee2f9764d166ada8d44a2c18c2cb0d0c73947ebfded18acd7b5eef49510b2403', 30, 1, 'MyApp', '[]', 0, '2018-09-26 02:26:40', '2018-09-26 02:26:40', '2019-09-25 19:26:40'),
('7d80ddaabd9cc62e42b1e33057546cbcd291ce972555bf6dd49eaf1787419951949d8a39a765d538', 32, 1, 'MyApp', '[]', 0, '2018-09-21 17:57:44', '2018-09-21 17:57:44', '2019-09-21 10:57:44'),
('7df8fa5defd3ac0ea4a4f7f529f99eff88bcec0baa4cb93e2959ae506cf68f1681b96397ecd9f228', 42, 1, 'MyApp', '[]', 0, '2018-09-10 18:01:23', '2018-09-10 18:01:23', '2019-09-10 11:01:23'),
('7e3d0e143445c93b5c2bcbffcb4e7456919871e921ef94ea4ed0a565291b7b076715569b6e6a32fd', 212, 1, 'MyApp', '[]', 0, '2019-07-26 07:21:46', '2019-07-26 07:21:46', '2020-07-26 07:21:46'),
('7e487b6d6356cdb49cca3ba253091dbc2f0113db5742838c89ba1bc49355589fad5f41b579017e1e', 32, 1, 'MyApp', '[]', 0, '2018-09-28 19:12:40', '2018-09-28 19:12:40', '2019-09-28 12:12:40'),
('7ea3660a4d463fe43c78be4acec9d48f1e4e9e8914e1467964bc1c22d035e47df65e6e6973dffb68', 102, 1, 'MyApp', '[]', 0, '2018-11-26 18:57:05', '2018-11-26 18:57:05', '2019-11-26 11:57:05'),
('7fcf412d4729ce2a93647ce85d9ed3b210030965abc97ef9b28f44460aad5c355ace0c3978776a51', 32, 1, 'MyApp', '[]', 0, '2018-09-08 20:19:13', '2018-09-08 20:19:13', '2019-09-08 13:19:13'),
('7fd339a744e77029bb5f31d1509fde2fdea27e7f42a6acde100dc6ffdcc65d4d4972b244cc7bf978', 56, 1, 'MyApp', '[]', 0, '2018-10-01 04:50:22', '2018-10-01 04:50:22', '2019-09-30 21:50:22'),
('7fe494ea62ab5982b5e82148ff47e8e10c82e62436e5e5b5602624d7f11dd6e3f3e50aa4ad8de9b1', 47, 1, 'MyApp', '[]', 0, '2018-09-29 18:56:56', '2018-09-29 18:56:56', '2019-09-29 11:56:56'),
('80ab57ec1ed7b19e8bf2bdb9a48960279739c7b85a583cba3b97c409c3cb3adf1db1c21839ff47f1', 177, 1, 'MyApp', '[]', 0, '2019-07-22 06:04:13', '2019-07-22 06:04:13', '2020-07-22 06:04:13'),
('80def494fbb47d866c6037edba22b0cbc5d9621573d768fd446f3d3db1d718cd9881ea3c498ab356', 177, 1, 'MyApp', '[]', 0, '2019-03-11 17:25:02', '2019-03-11 17:25:02', '2020-03-11 10:25:02'),
('80df9999d89cda53c00bf8643f8954ce0642645f5627b6812a33f21183de58230c7df9dde9051c92', 177, 1, 'MyApp', '[]', 0, '2019-03-11 17:24:30', '2019-03-11 17:24:30', '2020-03-11 10:24:30'),
('80f1cb740778286afa6b6cd8bae0b86ff2f6d3f528039487331174648570420a51466a166b1591b0', 213, 1, 'MyApp', '[]', 0, '2019-07-27 04:24:04', '2019-07-27 04:24:04', '2020-07-27 04:24:04'),
('80f39ed6e01d38e714eb71256f90d3f8f9da05f7c88d2259058d96d5d1e2980c56bf7cb49800f429', 177, 1, 'MyApp', '[]', 0, '2019-07-22 06:01:27', '2019-07-22 06:01:27', '2020-07-22 06:01:27'),
('817cce85c017580b856d03d37b43a29eb60e69a4b8629176a54f56c034aeeaead8cb198fe2b1f075', 87, 1, 'MyApp', '[]', 0, '2018-12-17 20:06:55', '2018-12-17 20:06:55', '2019-12-17 13:06:55'),
('818cc3d87ae16c7768c695d6c189feab61a7a36cf173bb643c77db43f9b9d10604409e1b30b59f5d', 75, 1, 'MyApp', '[]', 0, '2018-10-11 18:03:23', '2018-10-11 18:03:23', '2019-10-11 11:03:23'),
('81cc2cc96645f51b1700aac9957c9e3f3338e33bca45305982487f690c59323a6282dcdbaae4acc7', 32, 1, 'MyApp', '[]', 0, '2018-09-03 22:46:00', '2018-09-03 22:46:00', '2019-09-03 15:46:00'),
('822d0963d0f7f66b390622097769214b596e8dfd00f9334e229d3a21333c59b560f23ee7f877ff23', 127, 1, 'MyApp', '[]', 0, '2019-01-12 23:56:29', '2019-01-12 23:56:29', '2020-01-12 16:56:29'),
('82e3bb5dc6d43ec5cb236d7458154337953946cbb4c5f883d7b2b491e958e2bd1b56d9ed59716469', 44, 1, 'MyApp', '[]', 0, '2018-09-26 18:17:32', '2018-09-26 18:17:32', '2019-09-26 11:17:32'),
('82eedc9e484a6d89d7d6074da41e475296da6fdfbd45b76f663d9c5634787cf638330cec2cce481c', 87, 1, 'MyApp', '[]', 0, '2019-01-12 22:21:31', '2019-01-12 22:21:31', '2020-01-12 15:21:31'),
('8322897b5980db2262b5d503b86d46f15c3c47451165eeca3c48809a9d73265047d1af5be07dd9d6', 87, 1, 'MyApp', '[]', 0, '2018-12-17 21:38:45', '2018-12-17 21:38:45', '2019-12-17 14:38:45'),
('83ca8e426821cf78270ae8d4e9c471b954c3b735e54cfb4da6b8424ace74a565202ddadcac619bec', 127, 1, 'MyApp', '[]', 0, '2019-07-11 10:33:04', '2019-07-11 10:33:04', '2020-07-11 10:33:04'),
('83f2e065d1ac14bde9b9a5def21b0328b4dacabd621cba2dcb47dc5e80da2e3e0bd71b6dc12d328a', 95, 1, 'MyApp', '[]', 0, '2018-11-12 19:59:30', '2018-11-12 19:59:30', '2019-11-12 12:59:30'),
('84230b67a0e7280d087ca9b3cb6e5287ad2eed48698360954377976297a1fc2f995b5b603d198c10', 177, 1, 'MyApp', '[]', 0, '2019-03-23 18:14:11', '2019-03-23 18:14:11', '2020-03-23 11:14:11'),
('84301f7b0e76aa4c7a3956ce1ee4abe0f3877d4073e0de82944ae7ea89109827f94e9c83dbd598b9', 199, 1, 'MyApp', '[]', 0, '2019-06-17 18:35:52', '2019-06-17 18:35:52', '2020-06-17 11:35:52'),
('84c538c73a6a52146474b23e7da272c58a3e89659978e635dd68d4f8c3d3f9ccdf2f2c300298363d', 177, 1, 'MyApp', '[]', 0, '2019-08-01 09:53:26', '2019-08-01 09:53:26', '2020-08-01 09:53:26'),
('84c932ccbda551cb00517ba8e31ac29d389d2f54f2aa16adb83d55abed27b38a3daf027cc3c7a355', 30, 1, 'MyApp', '[]', 0, '2018-10-05 19:00:01', '2018-10-05 19:00:01', '2019-10-05 12:00:01'),
('8535eb0b624e49292d3e3407554d6dfd242067edfb7bb9aae850ccddb1ec140902977f2ce3925276', 75, 1, 'MyApp', '[]', 0, '2018-12-18 01:12:02', '2018-12-18 01:12:02', '2019-12-17 18:12:02'),
('854f9185b25166da163d49ddc8e33b5ad662af2eb116e0881a04f2dfea10b7f9d61878c7fb298715', 160, 1, 'MyApp', '[]', 0, '2019-02-19 01:25:01', '2019-02-19 01:25:01', '2020-02-18 18:25:01'),
('855aff1c55e24d2deb68d98e9f3948cfaee72a46e8a2aa1cfe4582ec152448863afdc0804fe5b42c', 87, 1, 'MyApp', '[]', 0, '2019-01-13 01:22:02', '2019-01-13 01:22:02', '2020-01-12 18:22:02'),
('85b83450e5a328a706c83bc96369b5f4b9c7aa4ef854355c360033598f4d73cd801682429cd24796', 42, 1, 'MyApp', '[]', 0, '2018-09-13 23:17:18', '2018-09-13 23:17:18', '2019-09-13 16:17:18'),
('86835599aa57150745b86550e6922db03bf2d345fed39046646c5bb78519188f5f687b49105efac2', 127, 1, 'MyApp', '[]', 0, '2019-11-01 14:10:05', '2019-11-01 14:10:05', '2020-11-01 14:10:05'),
('868d0a24d7916fd3500330c907fad23641fb299066428fb494190d926a8f5b0d5fef364b8827524a', 32, 1, 'MyApp', '[]', 0, '2018-09-13 23:40:10', '2018-09-13 23:40:10', '2019-09-13 16:40:10'),
('86a07085ba8f83c04334143ee6c5286d2c28cc9c0c724faacd88555b42ce7800fce122e23e3c551f', 87, 1, 'MyApp', '[]', 0, '2019-01-13 00:47:43', '2019-01-13 00:47:43', '2020-01-12 17:47:43'),
('86c71f442ca574166707f2e75e651caf0a29ef25fdfa156a897dd4bf8f53e7f8164b1b74f9d34c4f', 201, 1, 'MyApp', '[]', 0, '2019-07-29 07:55:16', '2019-07-29 07:55:16', '2020-07-29 07:55:16'),
('86ce916d04afae374df65c703296401978001109f66cc7345741dc701130233ffc4025c424a921ad', 32, 1, 'MyApp', '[]', 0, '2018-09-04 17:44:58', '2018-09-04 17:44:58', '2019-09-04 10:44:58'),
('86fe45faf0069aa8fb8c667daac233ee2acc8b4bbfe56ba173a475a7e036c68ea19cdd46fd960cd6', 127, 1, 'MyApp', '[]', 0, '2019-07-26 05:39:54', '2019-07-26 05:39:54', '2020-07-26 05:39:54'),
('8712261daae097033295750abd6bc7c5794bc5019b9216ac7aef6faa902e5849789c92ccf0331714', 32, 1, 'MyApp', '[]', 0, '2018-09-07 01:17:16', '2018-09-07 01:17:16', '2019-09-06 18:17:16'),
('877c2a13642041b2a9840ca2bc4362ced2c3a9a2e9486a4c54f711fe9f66056aff6d8af5ffd3054d', 93, 1, 'MyApp', '[]', 0, '2018-11-08 17:00:32', '2018-11-08 17:00:32', '2019-11-08 10:00:32'),
('87ad665feabb2509ebe6ae3ef755aa1881e478a25b16279270a6e7ead9bbd93fb8f417495fd73ea1', 36, 1, 'MyApp', '[]', 0, '2018-09-13 19:45:25', '2018-09-13 19:45:25', '2019-09-13 12:45:25'),
('882889706d1fc618fdad64d0ad96013d6218f65e2d433035696a53120c876d53b177494bcf46efa5', 156, 1, 'MyApp', '[]', 0, '2019-02-14 00:29:30', '2019-02-14 00:29:30', '2020-02-13 17:29:30'),
('88a1e052b6c28f62de029597bcacfb16216276e7375f8c81cafcfd2fe83d489c5c1e84ef988772cc', 32, 1, 'MyApp', '[]', 0, '2018-09-08 19:57:35', '2018-09-08 19:57:35', '2019-09-08 12:57:35'),
('88aec6d88aee9d90ef7735fe3de56bd776a79c65334f2d80a2c5598c2cd5e0947b2bc0dbbc140fa9', 177, 1, 'MyApp', '[]', 0, '2019-07-17 11:41:55', '2019-07-17 11:41:55', '2020-07-17 11:41:55'),
('88cacdb820bf9ee7415e699820dd053426b577854e3573cc8d453fdbaf61861a57d38024a262578f', 177, 1, 'MyApp', '[]', 0, '2019-07-26 12:28:30', '2019-07-26 12:28:30', '2020-07-26 12:28:30'),
('89253afa6fed2d197a31b46cdbecbad33d9523422120364def6847f0783c6b40bd2738d52a3a0e3b', 129, 1, 'MyApp', '[]', 0, '2019-01-13 01:22:33', '2019-01-13 01:22:33', '2020-01-12 18:22:33'),
('893e4947173fe83536313099c0a7893f8c786f41d508ee1252e411a24726d5076eb188d403c83485', 37, 1, 'MyApp', '[]', 0, '2018-09-17 19:08:39', '2018-09-17 19:08:39', '2019-09-17 12:08:39'),
('89685d9b840b370bdc36a80c109db0c1b336ef84af82749d142b7e1363b717008f7c1310a9d819fb', 30, 1, 'MyApp', '[]', 0, '2018-09-25 20:18:43', '2018-09-25 20:18:43', '2019-09-25 13:18:43'),
('89809680ff31f87ebf7ddba220dd6f0dcf645171cb8347592cf6e4abf4a5b16465dfce8638fa52b8', 32, 1, 'MyApp', '[]', 0, '2018-09-13 22:18:21', '2018-09-13 22:18:21', '2019-09-13 15:18:21'),
('8a29a74c66a3c32e8e8f8c0b44f58cbecce64f51dc4ee6fc3712a6c1595b5d123ca9f6db4527e562', 32, 1, 'MyApp', '[]', 0, '2018-09-06 19:52:00', '2018-09-06 19:52:00', '2019-09-06 12:52:00'),
('8a620308da786c68a6f6a3b6a84538043bedeba23706e944911c641b79b9294d79db913deca461ad', 63, 1, 'MyApp', '[]', 0, '2018-10-05 17:44:46', '2018-10-05 17:44:46', '2019-10-05 10:44:46'),
('8a6416493fbd20fb400c13b51f276da61b00200d3506236ff72a908e20f79100f683c65ff989bbf8', 41, 1, 'MyApp', '[]', 0, '2018-09-11 21:56:31', '2018-09-11 21:56:31', '2019-09-11 14:56:31'),
('8a71af8085c9a1c35a59db916702be5bc80408a840d341f12e422c4d1756d443a7119b7307bfc560', 41, 1, 'MyApp', '[]', 0, '2018-09-08 18:43:12', '2018-09-08 18:43:12', '2019-09-08 11:43:12'),
('8ab93e71f7e72853a0d69b2f43d899cdab64f87902c192a82d1b818e9c93cf6c82c827718adfeab7', 30, 1, 'MyApp', '[]', 0, '2018-10-17 01:04:56', '2018-10-17 01:04:56', '2019-10-16 18:04:56'),
('8b42b41418b763718c6fd00a85d25b95d6d52eeab62d97702acac09cf3afc24753410e90592ba90b', 30, 1, 'MyApp', '[]', 0, '2018-09-12 00:38:32', '2018-09-12 00:38:32', '2019-09-11 17:38:32'),
('8b95a45de7bd3602126ab16c59a57289247cd70a667a26feafff8cc0d2554cbff655017e6a3b4761', 176, 1, 'MyApp', '[]', 0, '2019-02-23 02:06:53', '2019-02-23 02:06:53', '2020-02-22 19:06:53'),
('8c10b57bc7ae89b369abdff3cc76558aa6fd27e5d316b674a00b23eb4ae6afacc778c943b2383a35', 85, 1, 'MyApp', '[]', 0, '2018-10-29 17:08:38', '2018-10-29 17:08:38', '2019-10-29 10:08:38'),
('8c17f21be4f8b7ef6fa8b1b9371f4c189084ebed2627c3d536d0d7112c4e4d8a7a7c67ebefb35b43', 31, 1, 'MyApp', '[]', 0, '2018-09-13 21:01:00', '2018-09-13 21:01:00', '2019-09-13 14:01:00'),
('8c1e998c0bf3e6aea33aa28899c7446624da8283b4adc41ea7209445b34d6baed87a8cc93b8e5f92', 211, 1, 'MyApp', '[]', 0, '2019-07-22 07:50:15', '2019-07-22 07:50:15', '2020-07-22 07:50:15'),
('8d283d544dc5f92dc5c245dd450810c6d05529f7eb0e3ecd90b74a77baf15492a29385b326828511', 127, 1, 'MyApp', '[]', 0, '2019-03-23 19:37:17', '2019-03-23 19:37:17', '2020-03-23 12:37:17'),
('8dba01d13a68dbcd8ff778ad5c6bdd64e497c64b0dd1fe666f8e1b139faa11c3f925aeb917371399', 87, 1, 'MyApp', '[]', 0, '2018-12-17 20:07:29', '2018-12-17 20:07:29', '2019-12-17 13:07:29'),
('8df79715e3a163192c07701586291e9d26a887be440aa8c1656c03901dacc661de12c5f8bd2c3f51', 36, 1, 'MyApp', '[]', 0, '2018-09-10 17:57:12', '2018-09-10 17:57:12', '2019-09-10 10:57:12'),
('8e0a2e5072b605c501e6b8c564d3c9f4e02954f24e92fa9cd03bca9191bc314f82d7cdc0d53dd4e2', 31, 1, 'MyApp', '[]', 0, '2018-09-13 21:07:28', '2018-09-13 21:07:28', '2019-09-13 14:07:28'),
('8e100f6d65cc36d7f78a97a9108b779147c07c07c88c264dc67daedbac3fcb8752b72dab2da8ac7a', 30, 1, 'MyApp', '[]', 0, '2018-12-18 18:49:19', '2018-12-18 18:49:19', '2019-12-18 11:49:19'),
('8e1b6ca8d3b9b5308903aa4a4865e4d13aaf14cdf92cd9da75e4ea68222a649770647b770c53fa4a', 63, 1, 'MyApp', '[]', 0, '2019-04-22 15:51:27', '2019-04-22 15:51:27', '2020-04-22 08:51:27');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('8e4bac125b11915ed1c80d58e6186fa11aa2ffbbe2211a5a044c65284ec9e626bd7c3b16d2885922', 160, 1, 'MyApp', '[]', 0, '2019-02-19 00:56:33', '2019-02-19 00:56:33', '2020-02-18 17:56:33'),
('8e627a453d3ee2ecd395cab10fa640cbc0ccc1236e8e0c61e718ea536e595f2411274b87a773c288', 127, 1, 'MyApp', '[]', 0, '2019-07-22 10:05:42', '2019-07-22 10:05:42', '2020-07-22 10:05:42'),
('8f458dba0f8ee0bb11477c8602ba7eca5c80f6b20f63ac8b4de8bc511867157a9d8f630d9aa16127', 61, 1, 'MyApp', '[]', 0, '2018-10-03 01:36:24', '2018-10-03 01:36:24', '2019-10-02 18:36:24'),
('8fa7100955cde2fad4ca9a12c5e2462a010b0acc355912a38d5b74aec1e8561d0fdf44f257128bfe', 35, 1, 'MyApp', '[]', 0, '2018-09-06 19:24:21', '2018-09-06 19:24:21', '2019-09-06 12:24:21'),
('8fb33f62f4782aed9d6e79f8d79bbb246f68f42a27ac705e46a30e6fc81840604ff2119ff067f446', 127, 1, 'MyApp', '[]', 0, '2019-10-22 18:18:25', '2019-10-22 18:18:25', '2020-10-22 18:18:25'),
('9032c3c04ffab61352062a9c65a3bea879a74e7ddab29a34f1dffa6aca479300a5554901fe17e96c', 37, 1, 'MyApp', '[]', 0, '2018-09-04 00:26:40', '2018-09-04 00:26:40', '2019-09-03 17:26:40'),
('904627f14d2a1da014c9bfa6d36c039e25f8db120a19aae27a6cb9657f01fd1c94bbbe50600ae434', 155, 1, 'MyApp', '[]', 0, '2019-02-13 21:28:54', '2019-02-13 21:28:54', '2020-02-13 14:28:54'),
('904decf5ee422986aefc81385710e8b5e9e825a7af4e146e09d3ff1f5e2ead915180408b19399310', 177, 1, 'MyApp', '[]', 0, '2019-08-08 10:22:12', '2019-08-08 10:22:12', '2020-08-08 10:22:12'),
('906a46dfdc6ed9d7e620616bd643209ef7de2f37fc88bf4242ec393fcd03bda759af6b814d3f1123', 127, 1, 'MyApp', '[]', 0, '2019-10-30 11:25:58', '2019-10-30 11:25:58', '2020-10-30 11:25:58'),
('90ba5068b56a25d43f95397bcb72479ca52dbcfba4bcc0653595c08f2d848ad55c784aa9ac0d473e', 87, 1, 'MyApp', '[]', 0, '2019-01-12 22:30:11', '2019-01-12 22:30:11', '2020-01-12 15:30:11'),
('90cef1c10c95f30febfe218781f36cd9f3a762c37639c0548bbdbd68434b19e2a1a42b8c1757816f', 32, 1, 'MyApp', '[]', 0, '2018-09-21 22:47:23', '2018-09-21 22:47:23', '2019-09-21 15:47:23'),
('91179e50ce3e5449bd482509d35c8fedce25ad29754c7468b3d5c2ce70d65282b105c4867c890b83', 32, 1, 'MyApp', '[]', 0, '2018-09-03 23:42:45', '2018-09-03 23:42:45', '2019-09-03 16:42:45'),
('91b2a7d266a6d43e5547fb3cecb8d458e05c25c3bd57691361f8be0053f930e6504b5235aebc3b44', 127, 1, 'MyApp', '[]', 0, '2019-07-25 06:32:36', '2019-07-25 06:32:36', '2020-07-25 06:32:36'),
('92b3e3973a1b4273e40ce12472e588e482384d432ff110941d7b25a131ce429e277807e67b35a5c9', 87, 1, 'MyApp', '[]', 0, '2018-11-21 22:45:16', '2018-11-21 22:45:16', '2019-11-21 15:45:16'),
('92ef0ad1407e54baf81e4f747e4362b8170a6c40c1a7ee42cc21665b2212e87d38afeadfbd7f4c7c', 30, 1, 'MyApp', '[]', 0, '2018-09-30 00:18:20', '2018-09-30 00:18:20', '2019-09-29 17:18:20'),
('934fabd0f8588f59438dda8faf7c0ae2c2bba0c30cd553bf826b19db1b6951f50b6f122715b28060', 212, 1, 'MyApp', '[]', 0, '2019-07-26 05:46:06', '2019-07-26 05:46:06', '2020-07-26 05:46:06'),
('93701c9810021e6cb1778d624b3347b292cf9dca2581bc9c98763874908fe52b6f34560a98b81465', 122, 1, 'MyApp', '[]', 0, '2019-01-06 02:00:08', '2019-01-06 02:00:08', '2020-01-05 19:00:08'),
('93a2c6054075880e13889c2738b5afba2e9daa78b8fe19ed701331ec1c068967664211f7a3f94ad8', 102, 1, 'MyApp', '[]', 0, '2018-11-26 17:50:27', '2018-11-26 17:50:27', '2019-11-26 10:50:27'),
('9408ec39e3a6e40e6230ad5bddda2301571612331f75159f693109e198a3affcba4e5a65ef0370eb', 44, 1, 'MyApp', '[]', 0, '2018-09-28 05:28:39', '2018-09-28 05:28:39', '2019-09-27 22:28:39'),
('9470068c8b5f008a6364f496c855509430f167ef960082b0148deb2451e4a7e237de327208682b36', 115, 1, 'MyApp', '[]', 0, '2018-12-24 03:00:05', '2018-12-24 03:00:05', '2019-12-23 20:00:05'),
('94de0ff0accbb4d3280ffbd7eacb4a8832154696c9a4e7d36cb4785f7c9e4b98b014d54080eea180', 111, 1, 'MyApp', '[]', 0, '2019-02-11 19:36:00', '2019-02-11 19:36:00', '2020-02-11 12:36:00'),
('95952e294802f59d7b08d417007682701183c7c26f11dc45d2fb073390474335ccf744f5f8a0a8ca', 32, 1, 'MyApp', '[]', 0, '2018-09-13 23:15:24', '2018-09-13 23:15:24', '2019-09-13 16:15:24'),
('95cb8ae242f5c8bfa3999fbc6eb805cc1660046995f2110b5fa86c71d881c3ad3fa875c78eff395d', 193, 1, 'MyApp', '[]', 0, '2019-06-28 17:58:10', '2019-06-28 17:58:10', '2020-06-28 10:58:10'),
('962d14bbaf70f1bbc7573abd1ec8b7e1ad56ecd76db3fa676e703b9cf7b37821f0db4428725e8d45', 177, 1, 'MyApp', '[]', 0, '2019-07-23 06:24:56', '2019-07-23 06:24:56', '2020-07-23 06:24:56'),
('963e2b63b0ffead1b5861d79169052050471ed01068dab9265bbafae34f234c6e7d681045e00c62c', 36, 1, 'MyApp', '[]', 0, '2018-09-25 23:15:53', '2018-09-25 23:15:53', '2019-09-25 16:15:53'),
('96563e10d8e318f3710718362215fe4820368a25c40daba67a283f6c7b949d57b0cacb833a3e3966', 32, 1, 'MyApp', '[]', 0, '2018-09-25 23:10:01', '2018-09-25 23:10:01', '2019-09-25 16:10:01'),
('9687cf02a4d4965b67b6863c9d31a0b30484a2c74b3de6dc04ddc8688dfffbe904897f83b4ce2c62', 101, 1, 'MyApp', '[]', 0, '2018-11-21 20:32:14', '2018-11-21 20:32:14', '2019-11-21 13:32:14'),
('969f1652c00d790fd8a20baf8c3a9584d66a277c9dca0a14ae8d789524fd8f1b1a3da66ebd45c2c4', 177, 1, 'MyApp', '[]', 0, '2019-08-08 12:00:27', '2019-08-08 12:00:27', '2020-08-08 12:00:27'),
('96b4dbd7d9f560fecca0ca67035b2716935a8e55adf0d145f59a33e86dcbb4b57d2dc3e2e8be04b1', 127, 1, 'MyApp', '[]', 0, '2019-02-12 02:31:52', '2019-02-12 02:31:52', '2020-02-11 19:31:52'),
('96c3dc29d3eb41f0821fac92f77a3a9aac0cc973545f1efdd409849795379115e537bf63994bdf58', 36, 1, 'MyApp', '[]', 0, '2018-09-19 17:54:59', '2018-09-19 17:54:59', '2019-09-19 10:54:59'),
('98769d9a24a574528385823cd50adfe98f6bc9a867c0ee4edbd859657e67c7b164a943c5fca7f850', 32, 1, 'MyApp', '[]', 0, '2018-09-08 20:31:44', '2018-09-08 20:31:44', '2019-09-08 13:31:44'),
('98efc01ca31566b01e50f6be09d11aaa86bb82716a6306d3ee575729c7d7f036e23a765df2321529', 127, 1, 'MyApp', '[]', 0, '2019-08-01 06:21:54', '2019-08-01 06:21:54', '2020-08-01 06:21:54'),
('99066b522f3cbedc2000ed3f59a06ec004379999ba88f9b63e805257f6f6a83ae3240dc4248c7143', 127, 1, 'MyApp', '[]', 0, '2019-07-17 05:10:21', '2019-07-17 05:10:21', '2020-07-17 05:10:21'),
('991702b9ab75f868575f7aa688baf63f575c9cb968b178b11c0a126b0a3925b158f724402ab5448e', 152, 1, 'MyApp', '[]', 0, '2019-02-11 18:14:17', '2019-02-11 18:14:17', '2020-02-11 11:14:17'),
('992b2c01b09a219afaaab3e41cd34c303fd87615ba0e9308af06a592eaa6b7ed7ec6f49768527256', 36, 1, 'MyApp', '[]', 0, '2018-09-19 18:07:52', '2018-09-19 18:07:52', '2019-09-19 11:07:52'),
('99e1da11c064216a90cbeda77be1452b2c5a4b263016ef9ef7d8d75cbe14f569a8ec0c4c7f119987', 37, 1, 'MyApp', '[]', 0, '2018-09-07 01:20:55', '2018-09-07 01:20:55', '2019-09-06 18:20:55'),
('9a152c07958443e0c4c106f1a47515c758f8394e3ace36ce00464e53da51587fd08b16ba1c47dcc6', 32, 1, 'MyApp', '[]', 0, '2018-09-03 23:29:05', '2018-09-03 23:29:05', '2019-09-03 16:29:05'),
('9a45d96d49fcc50bd4baa9b467f01087031e87b851f512d175b2d510f58531d9796ebdf98482f3e0', 32, 1, 'MyApp', '[]', 0, '2018-09-17 19:22:50', '2018-09-17 19:22:50', '2019-09-17 12:22:50'),
('9b98d19268a8fe1ab36799d4af5aaa23e36992eff6faed39949ad30fc0a5ca81ca7d6f2b52a2ff76', 75, 1, 'MyApp', '[]', 0, '2018-11-11 01:27:29', '2018-11-11 01:27:29', '2019-11-10 18:27:29'),
('9cdb5a6a3e876c2ea0edd0be2c3d11edae9ce250829a217568056b40af13d86160c28f33d6111bb6', 31, 1, 'MyApp', '[]', 0, '2018-09-13 20:51:37', '2018-09-13 20:51:37', '2019-09-13 13:51:37'),
('9d057422ec9ec4f4318aada438466d8279386d6ffa80a17fe98792ef93da0a864812a8022cd78ac2', 127, 1, 'MyApp', '[]', 0, '2019-02-19 00:56:56', '2019-02-19 00:56:56', '2020-02-18 17:56:56'),
('9d290b752b235654619354b18442210ffd0de496441ee13bbf90fc7b3a83ee8a62976ac3c3d337ed', 56, 1, 'MyApp', '[]', 0, '2018-10-04 04:33:54', '2018-10-04 04:33:54', '2019-10-03 21:33:54'),
('9d51f2b84840f493b93696cd374203f717af995e2f83784a9a860507bb1db3c6ce1b7390d8c52c39', 37, 1, 'MyApp', '[]', 0, '2018-09-24 21:38:19', '2018-09-24 21:38:19', '2019-09-24 14:38:19'),
('9d5e0cbad1e00b0f2012c62a4ea3c138136be6a2f09481d3449dfc7f48db51cf527e7bdbdb4cee2a', 177, 1, 'MyApp', '[]', 0, '2019-07-26 12:49:59', '2019-07-26 12:49:59', '2020-07-26 12:49:59'),
('9d6da8bfada657f8b2064d56e04fb7d774a823f4256de5a8d69678cdb2dd0deada46d1aa584d0d25', 92, 1, 'MyApp', '[]', 0, '2018-11-06 17:28:58', '2018-11-06 17:28:58', '2019-11-06 10:28:58'),
('9db284a21d25d9a3dd9e075bc13f7f179c05b47be5f6c992a530c8e2c68647ba789a447238543503', 160, 1, 'MyApp', '[]', 0, '2019-02-19 00:57:50', '2019-02-19 00:57:50', '2020-02-18 17:57:50'),
('9dff36acd50fbaa813a2dad174bd82c5fa6f39f0a62696b627b8770101df0538c3efe2ffeda87537', 58, 1, 'MyApp', '[]', 0, '2018-10-01 21:37:58', '2018-10-01 21:37:58', '2019-10-01 14:37:58'),
('9ec138fc751a4fd9afd9beaeb85103327f323fa998c56d380828864d839aabe2cc4b279600a7b939', 44, 1, 'MyApp', '[]', 0, '2018-09-26 18:16:43', '2018-09-26 18:16:43', '2019-09-26 11:16:43'),
('9f03f166052c16016dd3821bd0470128fee9ba34ef33fda30e83cd9994908d49513e026d2e1842a8', 37, 1, 'MyApp', '[]', 0, '2018-09-08 23:15:37', '2018-09-08 23:15:37', '2019-09-08 16:15:37'),
('9f29b18b9077dd013aaee256912ef31401b91397d2b86427d333087aa652e30685e7298e81b6c811', 36, 1, 'MyApp', '[]', 0, '2018-09-13 19:04:50', '2018-09-13 19:04:50', '2019-09-13 12:04:50'),
('9f325742e1e7efc01c15abf1e099cb2490dc439af762537fd286e7180bae9fc2b716878b958704ae', 110, 1, 'MyApp', '[]', 0, '2018-12-16 02:03:21', '2018-12-16 02:03:21', '2019-12-15 19:03:21'),
('9f4d66f422f9826e8818f0a7f636c27a01f77bcb8b20584e0ef70016b7e3f0334476bb7293357651', 196, 1, 'MyApp', '[]', 0, '2019-05-30 22:13:20', '2019-05-30 22:13:20', '2020-05-30 15:13:20'),
('9fb07abfba8fc308c5360552867fb45115c1b50ae8d3880bf1c6bae6e6582e246f6f96ca6d2ddf10', 102, 1, 'MyApp', '[]', 0, '2018-12-17 19:16:32', '2018-12-17 19:16:32', '2019-12-17 12:16:32'),
('9fb71e99b9468378fe714d3ed849d96c289ef6ada5631c0d68d2737b0729389a46957346735fa2e9', 124, 1, 'MyApp', '[]', 0, '2019-01-12 06:00:00', '2019-01-12 06:00:00', '2020-01-11 23:00:00'),
('9fe1e35b17d55e7e9aaddba670a1a02bd4baad66a76cab79db119a24e222e09fa676670db3dc31b1', 32, 1, 'MyApp', '[]', 0, '2018-09-06 21:44:59', '2018-09-06 21:44:59', '2019-09-06 14:44:59'),
('a008352bf0f1f9c6cec2a0e74d38ee080973cc774a3d86daba8761861030065a13f158519322dd03', 87, 1, 'MyApp', '[]', 0, '2019-01-03 23:29:09', '2019-01-03 23:29:09', '2020-01-03 16:29:09'),
('a044f485a078860c369597400e2d934bf96f86736bae8b666df4396f8b6ea264d549ac901654ec6e', 89, 1, 'MyApp', '[]', 0, '2018-11-01 22:37:08', '2018-11-01 22:37:08', '2019-11-01 15:37:08'),
('a0519d5881b0bc250f5d4973f77376e6066eca56dd59573fb399a51dbd34a86d409ef7d36deb4d47', 151, 1, 'MyApp', '[]', 0, '2019-02-10 00:44:15', '2019-02-10 00:44:15', '2020-02-09 17:44:15'),
('a0bdd4fa7c9c1cc6858d1df2c4dfa524629562b2ce6557ff5346f3f8cb1b44cd02d0998e0c84f177', 32, 1, 'MyApp', '[]', 0, '2018-09-24 20:13:26', '2018-09-24 20:13:26', '2019-09-24 13:13:26'),
('a107d2eaf04861ce5645a722d85a2cf7a8b80ee0602cbc8bf90aa9cc96a56959ae6f5d39445ae537', 31, 1, 'MyApp', '[]', 0, '2018-09-13 22:26:07', '2018-09-13 22:26:07', '2019-09-13 15:26:07'),
('a1083e82651f676f4b7ad0cc5c66572e352a11824a2cc09d1216e530ee511685b4a939eaf6a4e477', 37, 1, 'MyApp', '[]', 0, '2018-09-08 01:15:15', '2018-09-08 01:15:15', '2019-09-07 18:15:15'),
('a1664d6eb94e1dd75d43ddf7b81f005e0251437a7439afff0147f982de5604ec9739415e59fed81d', 102, 1, 'MyApp', '[]', 0, '2018-11-24 23:51:01', '2018-11-24 23:51:01', '2019-11-24 16:51:01'),
('a16f65bea45d22215caa8c804f0b5e79a90b451e832ef24b654a49ea59aa3e300e5ed79964627392', 36, 1, 'MyApp', '[]', 0, '2018-09-24 21:55:46', '2018-09-24 21:55:46', '2019-09-24 14:55:46'),
('a1ae4dad38f118567bafcb37ae219b0ac056655a7334a0a96d451ece0317b775914418a709b21810', 39, 1, 'MyApp', '[]', 0, '2018-09-26 20:51:50', '2018-09-26 20:51:50', '2019-09-26 13:51:50'),
('a1e4b19d29540d916364b0cb40c0da8f0b13aa01314ee369901c0f2303b01f65fabf419458eada11', 30, 1, 'MyApp', '[]', 0, '2018-09-21 23:07:09', '2018-09-21 23:07:09', '2019-09-21 16:07:09'),
('a2520dd28387d0a55d1f6cad2a861cd11e4811a8457d4613eaa6a68e72b07e817c7c7f5d7cba9bb3', 87, 1, 'MyApp', '[]', 0, '2018-12-17 19:50:21', '2018-12-17 19:50:21', '2019-12-17 12:50:21'),
('a33537d445026141b0a1d9b53482c7517e3e2b70b42a1f82cfd7889a0fcb377f0a35b2b26ba6ba55', 127, 1, 'MyApp', '[]', 0, '2019-02-13 21:33:17', '2019-02-13 21:33:17', '2020-02-13 14:33:17'),
('a346e3ee0ab8bbffe16ba57720881b60c7d5e83d2233108cc9eff2281ff79fff492b73dfa3bccc72', 210, 1, 'MyApp', '[]', 0, '2019-07-11 10:51:56', '2019-07-11 10:51:56', '2020-07-11 10:51:56'),
('a3879d49f4dac60faeb8acb45c705a43d8171e82b5c98da39132e93e2f7402884ef615a3b3f99966', 212, 1, 'MyApp', '[]', 0, '2019-07-25 10:12:56', '2019-07-25 10:12:56', '2020-07-25 10:12:56'),
('a3ea294d0652eab88ad5c111cf09073fedc129ed7e3d7ac5629aa2e29fd2330d10268cdc8b85ae8b', 36, 1, 'MyApp', '[]', 0, '2018-09-13 18:42:06', '2018-09-13 18:42:06', '2019-09-13 11:42:06'),
('a46903fb7cb688f01f2f9a600a206119023f625d09c01cf4fa01dff86b3eb8ce741be90cc5a9575d', 32, 1, 'MyApp', '[]', 0, '2018-09-08 19:57:19', '2018-09-08 19:57:19', '2019-09-08 12:57:19'),
('a488576260a0731fbc0a5df5a5d2a14b8bfcd8d9ed255a0ccabaf3cdb77f1a07bc5e21978937cd44', 127, 1, 'MyApp', '[]', 0, '2019-07-17 04:55:35', '2019-07-17 04:55:35', '2020-07-17 04:55:35'),
('a491ebc7c4c79eb2d45cc3e77b972bc84a2d0dfc162c0ee59a2a447a010b6fcda46318b5a82c1a4a', 127, 1, 'MyApp', '[]', 0, '2019-07-26 07:10:19', '2019-07-26 07:10:19', '2020-07-26 07:10:19'),
('a4a5b26dd605bb4b752bf0fc4a661c673f371ef0de2cb6ddf648ecbcdf6153467ac026a58809c9d2', 71, 1, 'MyApp', '[]', 0, '2018-10-09 23:31:37', '2018-10-09 23:31:37', '2019-10-09 16:31:37'),
('a4d8df7f63c893558ba871f4c7b826641780090bb54b1fe2659784a40a2b850e5f9e050f5964ad54', 32, 1, 'MyApp', '[]', 0, '2018-09-11 20:17:02', '2018-09-11 20:17:02', '2019-09-11 13:17:02'),
('a53917910f797507d28eaf790cc243163d019179373299dd507f55919f1721c09084d3e86298affd', 173, 1, 'MyApp', '[]', 0, '2019-02-22 22:35:43', '2019-02-22 22:35:43', '2020-02-22 15:35:43'),
('a5445bd5692b80973828da917486732547b6219280738dbad87795c65aace46d5a9a77ecedcee348', 36, 1, 'MyApp', '[]', 0, '2018-09-08 00:24:10', '2018-09-08 00:24:10', '2019-09-07 17:24:10'),
('a5809fd9cf21241db288b57926ca1814a8dca19c324d2e617e916c4a7fbbb3f7378b217004757209', 30, 1, 'MyApp', '[]', 0, '2018-09-09 19:54:34', '2018-09-09 19:54:34', '2019-09-09 12:54:34'),
('a5d3e4f35a538072f570cd1a6d1ba4867156b36ca30b3798d676f8e2b60e6fe087c615564fbc8dfc', 32, 1, 'MyApp', '[]', 0, '2018-08-30 22:27:33', '2018-08-30 22:27:33', '2019-08-30 15:27:33'),
('a6412c86cc9f73025b4574943ac02da45c6bcc84f9546236d5ec76d4033de1321e4f40b0eff40c2b', 177, 1, 'MyApp', '[]', 0, '2019-07-22 05:44:41', '2019-07-22 05:44:41', '2020-07-22 05:44:41'),
('a65feac87c3488ccbcc9d44f84c90f344a1db0f3c497a4dbc15d3d54e8b35c837cfeb5ac59047b8e', 30, 1, 'MyApp', '[]', 0, '2018-09-04 02:46:53', '2018-09-04 02:46:53', '2019-09-03 19:46:53'),
('a66082f958432ebf2ba8f244bbf28bbd589d93afba31aeb88c45d89a47154b8b5f164417dfcc3aab', 31, 1, 'MyApp', '[]', 0, '2018-09-13 21:19:41', '2018-09-13 21:19:41', '2019-09-13 14:19:41'),
('a699f24b5c66e90af652086a19a160afb51b1b6765006de4b4e3eaf99e8453ade0343c1cde0b1552', 32, 1, 'MyApp', '[]', 0, '2018-09-13 18:48:14', '2018-09-13 18:48:14', '2019-09-13 11:48:14'),
('a712fa96e5d2b7963fdd84943b26ea37f1159593c56a1b42fc7acfc1753dd859b5564cbfbfd4b946', 177, 1, 'MyApp', '[]', 0, '2019-07-31 06:13:18', '2019-07-31 06:13:18', '2020-07-31 06:13:18'),
('a7313263992264a183d71bbf464a74169e99888816322a24bd1924a817ed802943ccf52f97cce344', 58, 1, 'MyApp', '[]', 0, '2018-10-01 17:38:10', '2018-10-01 17:38:10', '2019-10-01 10:38:10'),
('a73215d5ee4fb20e300e2a105e2b225af6a6a9f547f3b16c5b7aced39b5fb96bbfc6c46a8843d828', 56, 1, 'MyApp', '[]', 0, '2018-10-13 22:53:49', '2018-10-13 22:53:49', '2019-10-13 15:53:49'),
('a74a890b39e2e17e616da4bbd84174d0e25793e46ecb73010ad9584f8d2bf5eb7a68edcae792c767', 177, 1, 'MyApp', '[]', 0, '2019-03-23 17:29:55', '2019-03-23 17:29:55', '2020-03-23 10:29:55'),
('a76a1592cf0ecaee1f6647c6c7b230f5d17352e38cb8acd8b979886633428e87aee48de9332c27f7', 111, 1, 'MyApp', '[]', 0, '2019-02-11 19:44:58', '2019-02-11 19:44:58', '2020-02-11 12:44:58'),
('a7715b6b0987e919f99ffeca8a7cd312a709fec830be9057c3b52c8c6500d621e531a39f80c463a2', 127, 1, 'MyApp', '[]', 0, '2019-07-23 13:08:32', '2019-07-23 13:08:32', '2020-07-23 13:08:32'),
('a7b0770bd1e51c65ec390f82f0b4aa3898910e9debd63e8de37a1535da9817d66c2196a58b2bbb91', 31, 1, 'MyApp', '[]', 0, '2018-09-13 20:58:54', '2018-09-13 20:58:54', '2019-09-13 13:58:54'),
('a7b8e6f2316d0076863bdfcad0245df81cf1d38aed6bb12dd02030153f19443ce2cd31226973cfec', 30, 1, 'MyApp', '[]', 0, '2018-09-04 05:30:26', '2018-09-04 05:30:26', '2019-09-03 22:30:26'),
('a81c4b9f3ace5d4a6d2fbee146975a65a0a9ac15835d2ec6e2530bf53aae4ffb15d15af189e6c461', 177, 1, 'MyApp', '[]', 0, '2019-08-01 05:44:57', '2019-08-01 05:44:57', '2020-08-01 05:44:57'),
('a8299952d0d278ee975661cbbb214be93760bb3ca7a17ff577dd622a0cee906165cee940d21faaa6', 50, 1, 'MyApp', '[]', 0, '2018-09-28 22:11:17', '2018-09-28 22:11:17', '2019-09-28 15:11:17'),
('a844e953ffd4ab7581966c0d23effc2454f13bb5ca69867690b9d31451faad4dbb1ddf75a41e577b', 127, 1, 'MyApp', '[]', 0, '2019-10-23 17:49:54', '2019-10-23 17:49:54', '2020-10-23 17:49:54'),
('a8b79df9c060f2f396290171b583513bc7d53fce1ef6fc214bd9ca3503622de99a870f9988ff4981', 40, 1, 'MyApp', '[]', 0, '2018-09-08 18:48:00', '2018-09-08 18:48:00', '2019-09-08 11:48:00'),
('a8ef9973f08fa79b91a364a758af68017d5a38b8c25f1d5f3ad8cdaeecb245653b74b93e76b2a6c5', 32, 1, 'MyApp', '[]', 0, '2018-09-06 22:12:17', '2018-09-06 22:12:17', '2019-09-06 15:12:17'),
('a913629867557f0d3d0e62f7f3440c4fa9efb713111d489790d0dc50e10c51b16a18828261da9543', 43, 1, 'MyApp', '[]', 0, '2018-09-08 20:11:34', '2018-09-08 20:11:34', '2019-09-08 13:11:34'),
('a94a39ee122786dad0f5c967b74ff763b9e6d4d2b4a37b7fab11c1948fb43d4f737c7da4582c930d', 30, 1, 'MyApp', '[]', 0, '2018-09-29 01:13:26', '2018-09-29 01:13:26', '2019-09-28 18:13:26'),
('a953539625a9d09c34efded773a723c29085aba071b463ad38686cb565fea58ca083af639063468d', 39, 1, 'MyApp', '[]', 0, '2018-09-21 01:44:33', '2018-09-21 01:44:33', '2019-09-20 18:44:33'),
('a97d5c5c3a5df0578247b242cd56daf3673922dec08f503ab92cf6fe5dad083e6e89d6894a78996e', 209, 1, 'MyApp', '[]', 0, '2019-07-22 07:13:47', '2019-07-22 07:13:47', '2020-07-22 07:13:47'),
('a98e8dbd49fa04581e4f65c8c3ed3dd110d68061073c97387740096d3f527745c2b95bbab642c0af', 102, 1, 'MyApp', '[]', 0, '2018-11-26 19:02:56', '2018-11-26 19:02:56', '2019-11-26 12:02:56'),
('a99ade57575d39ce24c8b50d62efe7bdf92747a93ee823fb83639ff2d6d1882f6020716b3ddd547f', 209, 1, 'MyApp', '[]', 0, '2019-07-11 07:22:40', '2019-07-11 07:22:40', '2020-07-11 07:22:40'),
('aa1c728a0f20ae88a8d700d62fa7494e4ea996a471180a3fe5af1f7ecafc0d4465ac035786263549', 32, 1, 'MyApp', '[]', 0, '2018-09-13 23:25:36', '2018-09-13 23:25:36', '2019-09-13 16:25:36'),
('aae6d949a3e66629e0b493bf34c250a63649a4bfcc2430f3e74e0bcae4ffae885d862cb6be4fa7de', 33, 1, 'MyApp', '[]', 0, '2018-09-03 23:32:23', '2018-09-03 23:32:23', '2019-09-03 16:32:23'),
('ab0a0d04a807aa5fbb858ec95f6b17334e6c4f22b581e414165b59d1191beacbd4fe123d1987c32d', 36, 1, 'MyApp', '[]', 0, '2018-09-13 18:02:13', '2018-09-13 18:02:13', '2019-09-13 11:02:13'),
('ab15a22dc2915632439bd54c427ee3760fd792743e6f2a5e3ffa62bf655d1eb40db0e616c2a4adb3', 31, 1, 'MyApp', '[]', 0, '2018-09-06 01:37:16', '2018-09-06 01:37:16', '2019-09-05 18:37:16'),
('ab2651a07dcc1e3a44270513a69ab993cbbe7435c3db2ef89dd0d1029abf0e89496e0b7a89f22983', 207, 1, 'MyApp', '[]', 0, '2019-07-01 06:27:27', '2019-07-01 06:27:27', '2020-07-01 06:27:27'),
('ab34d39415f6a47b5d0ba30e2bb3d0908e568b06cbc504c40501eda5a2fe07fde4654e916c75852e', 212, 1, 'MyApp', '[]', 0, '2019-08-05 13:01:23', '2019-08-05 13:01:23', '2020-08-05 13:01:23'),
('ab7bdf62722fb9f20845b3c23327f2ed357014a9ec6cf4d88c28e5ae3547dd8a1d8ea948d22a8c31', 36, 1, 'MyApp', '[]', 0, '2018-09-13 18:24:41', '2018-09-13 18:24:41', '2019-09-13 11:24:41'),
('ab988d9264c868a34b58e40ace54d7977d87153defaa268b0a1bbe3ad92d3e257ff4b3a2a016dd21', 127, 1, 'MyApp', '[]', 0, '2019-07-17 04:51:54', '2019-07-17 04:51:54', '2020-07-17 04:51:54'),
('abc119103b1cde8c48793bac4511a5bf1bee90e5bfd9e4aa0d25a8f4e9750d01b075d08dc35c6b04', 201, 1, 'MyApp', '[]', 0, '2019-10-30 15:59:42', '2019-10-30 15:59:42', '2020-10-30 15:59:42'),
('abf583a1db6a478fbfce8563aa2b8f76cc1baf57809aacfe079c8effd81ef894609db0a1387c440a', 213, 1, 'MyApp', '[]', 0, '2019-07-26 05:20:40', '2019-07-26 05:20:40', '2020-07-26 05:20:40'),
('ac3c87e764f6efa5357552f1dd1579e9c735b23b5aaa9b67f734b0fa52ab472b8d26af6be8f9c7b5', 31, 1, 'MyApp', '[]', 0, '2018-09-13 21:00:14', '2018-09-13 21:00:14', '2019-09-13 14:00:14'),
('ac4e64aacf2792b52aa5ae314b194ed3b77721cc96d93b4afbf1926a753f34776899c31663910fe5', 128, 1, 'MyApp', '[]', 0, '2019-01-13 02:15:47', '2019-01-13 02:15:47', '2020-01-12 19:15:47'),
('aca65adeb646c5f6cdda556c996e2b0df69505955817c751cfd576d40b9485019edc674ca48df21f', 177, 1, 'MyApp', '[]', 0, '2019-07-01 06:58:56', '2019-07-01 06:58:56', '2020-07-01 06:58:56'),
('acc097f8f9183668b4c1a4c1a9b765b7eef801f9c4c353583cb312d2952dcd090ea138714b9ed84a', 184, 1, 'MyApp', '[]', 0, '2019-03-07 07:30:34', '2019-03-07 07:30:34', '2020-03-07 00:30:34'),
('acd71bc837bbaecd443dfab11e7b9eb912b344f2b7f748e514ac58b6ac110237aa116c14a6535e15', 30, 1, 'MyApp', '[]', 0, '2018-09-17 19:56:59', '2018-09-17 19:56:59', '2019-09-17 12:56:59'),
('ad507dda265ba57faf4a2f868300cb252d7d9f9d4265ab9915aed4892c9b25b29961280f3fd7b253', 126, 1, 'MyApp', '[]', 0, '2019-02-12 02:33:27', '2019-02-12 02:33:27', '2020-02-11 19:33:27'),
('adfb9e8537615c0c13208dfcb4e18ddd0aa5caefcd3c43d2980240ddd65feedbb6e746c1ad19fddf', 88, 1, 'MyApp', '[]', 0, '2018-11-01 22:41:50', '2018-11-01 22:41:50', '2019-11-01 15:41:50'),
('ae0b6ec0211105f5c54c6490aafde932aebcb9e713ab27a3fb1ccd2d986cedb0e85a31a88cee26db', 127, 1, 'MyApp', '[]', 0, '2019-03-23 18:33:02', '2019-03-23 18:33:02', '2020-03-23 11:33:02'),
('ae313eabbc9f74b5effceeedfb1272f3181d433320bed76f0cc54e8b9d483c8c5301532b83b0867a', 87, 1, 'MyApp', '[]', 0, '2018-12-17 19:57:37', '2018-12-17 19:57:37', '2019-12-17 12:57:37'),
('ae32ea340d6cb8bcbe9a5193cf1e5c14874084fcc58c87ec65caa41b2638fbebeac2f5ee3e113a47', 202, 1, 'MyApp', '[]', 0, '2019-06-27 17:51:47', '2019-06-27 17:51:47', '2020-06-27 10:51:47'),
('ae839649563d0e3aeb361b4eafc814e671159fd1cd60870735bf1b8592450dd5c076c0832945d3c0', 75, 1, 'MyApp', '[]', 0, '2018-10-30 21:59:25', '2018-10-30 21:59:25', '2019-10-30 14:59:25'),
('af2c6d410ac1b1d07658de344fb94f0b5dc368eede68b1d974fee66eaddb2f1d079321c3d2d3544f', 32, 1, 'MyApp', '[]', 0, '2018-08-30 22:27:15', '2018-08-30 22:27:15', '2019-08-30 15:27:15'),
('af6645ac5edf497f44cbc0b89371da210b3a81a0583a49d7c9378908cac3d8bdd8ecf4f0e3dfb28d', 47, 1, 'MyApp', '[]', 0, '2018-10-01 21:43:05', '2018-10-01 21:43:05', '2019-10-01 14:43:05'),
('afc534843245e24a77a87da1370c691087bcc0684f63a6f23e346fea368f5771c1eb3c69a6941756', 32, 1, 'MyApp', '[]', 0, '2018-09-13 20:27:46', '2018-09-13 20:27:46', '2019-09-13 13:27:46'),
('afe95eaa02c176186adf84bcff50ff46dc6f1880698b89a7b1ade121e53debfd3ffd32eca1e730e1', 32, 1, 'MyApp', '[]', 0, '2018-09-04 00:03:36', '2018-09-04 00:03:36', '2019-09-03 17:03:36'),
('b0184935d89fdd87f5b1ab90e91b701fdd3c8f1a196840281960e95f18f3157cc94ca58913dd8128', 36, 1, 'MyApp', '[]', 0, '2018-09-13 17:54:23', '2018-09-13 17:54:23', '2019-09-13 10:54:23'),
('b06512a393dcf5550e0d77cd319f8b1ff90739cd1bafb399b6808e8c27530f4f7b51e6bebdb94eb7', 38, 1, 'MyApp', '[]', 0, '2018-09-24 22:07:46', '2018-09-24 22:07:46', '2019-09-24 15:07:46'),
('b09d7d314b2d118182de826fd775ebe2e60fbcf2c65bc2a9a18eff4b6026b8b3555565f8a5b49ea3', 31, 1, 'MyApp', '[]', 0, '2018-09-13 21:22:51', '2018-09-13 21:22:51', '2019-09-13 14:22:51'),
('b10c4999964b31e3463094f1a8b9e1a948b2712e8888f7187d09f8e1d7132b0bef397f457d15a334', 42, 1, 'MyApp', '[]', 0, '2018-09-13 23:26:26', '2018-09-13 23:26:26', '2019-09-13 16:26:26'),
('b1b9bd69dc9104ff9c8c69b51c8e8bf8742c995ddb769d0bc838456c24f0cfc8e3accbf606766aa8', 87, 1, 'MyApp', '[]', 0, '2018-11-01 20:26:14', '2018-11-01 20:26:14', '2019-11-01 13:26:14'),
('b219fe7db26f94cfc30de7f2266bf36fd2ac7c9c33db8e8e0bd049e9ac7763c6974676cded4ccc4d', 127, 1, 'MyApp', '[]', 0, '2019-06-18 00:29:28', '2019-06-18 00:29:28', '2020-06-17 17:29:28'),
('b26f2ca5e123ac226e167e2d552c5c26986ec2b40b793c29089bd73983ceed5568d7893fda49ba2f', 87, 1, 'MyApp', '[]', 0, '2019-01-03 23:31:30', '2019-01-03 23:31:30', '2020-01-03 16:31:30'),
('b2c3d4313dcfd4c207da5943cdb1e32813f98d227fcb3eff9a2f11e6278040da47d82ff659a28de4', 70, 1, 'MyApp', '[]', 0, '2018-10-09 23:28:05', '2018-10-09 23:28:05', '2019-10-09 16:28:05'),
('b3215cfa03a80b041cc6a22df407aaa693088c005aeeb6d2f80e19d71d7932d02b1c111d4a711b8c', 77, 1, 'MyApp', '[]', 0, '2018-10-14 05:16:38', '2018-10-14 05:16:38', '2019-10-13 22:16:38'),
('b473452e480c8b2fd5df1d7db4c4935d630fd5c09c896de8bfe072d8f8dbc8fb8165eaa57b53da21', 36, 1, 'MyApp', '[]', 0, '2018-09-28 23:03:02', '2018-09-28 23:03:02', '2019-09-28 16:03:02'),
('b4e6df99cae27987bfe0e13ce70a3a38808778f433df554b7d8635a44b953c4e34207767b3adfc1c', 87, 1, 'MyApp', '[]', 0, '2019-01-12 23:16:47', '2019-01-12 23:16:47', '2020-01-12 16:16:47'),
('b4fe1d5f4253bcd897428fc312c7aba0051313decce65b49ab29e84b9bb10ebca0a8cc9fa584a3ba', 30, 1, 'MyApp', '[]', 0, '2018-09-07 01:10:00', '2018-09-07 01:10:00', '2019-09-06 18:10:00'),
('b66c178d9009aa5dbef24ae0722b6cb99ee8ac700783e74ee9f8d78a21e4cf7026e63cdec00dd6af', 62, 1, 'MyApp', '[]', 0, '2018-10-05 17:44:16', '2018-10-05 17:44:16', '2019-10-05 10:44:16'),
('b6808b97e6a45a0d4c5887a0dbd3e800f1e21bbb29528d104f0f1effd2fd21c8f041a23c602278e8', 31, 1, 'MyApp', '[]', 0, '2018-09-12 00:23:39', '2018-09-12 00:23:39', '2019-09-11 17:23:39'),
('b6aa005c470d9b68694b08ee718c11087167b5db2060b12b834595e1d07cdbc18aecc4dc5f438bf8', 36, 1, 'MyApp', '[]', 0, '2018-09-13 20:01:50', '2018-09-13 20:01:50', '2019-09-13 13:01:50'),
('b6aac1fd684098c994221db8cbf21d6e14120e0194714565ac118d30d7e02bdfdb9132650b63d6e1', 177, 1, 'MyApp', '[]', 0, '2019-07-17 06:30:09', '2019-07-17 06:30:09', '2020-07-17 06:30:09'),
('b6ad35ee78f515127eb4bb3451065d5bd7f07aea251664b70f405651475ea56ce2ea322ce321d05b', 213, 1, 'MyApp', '[]', 0, '2019-07-27 06:13:33', '2019-07-27 06:13:33', '2020-07-27 06:13:33'),
('b6d1b451bee625ab49f6ddfcbe560d79f211baddc39cc8304bef81cfd68a72fde6897119d3966dc4', 36, 1, 'MyApp', '[]', 0, '2018-09-13 20:58:28', '2018-09-13 20:58:28', '2019-09-13 13:58:28'),
('b6d700e9a6388103b245b72077ca674d674035b4822efb0a43b19d466461b59e94e73e4ca168bed4', 32, 1, 'MyApp', '[]', 0, '2018-09-04 00:08:59', '2018-09-04 00:08:59', '2019-09-03 17:08:59'),
('b6dc05e5783f195f9390ab792eff23f9f497188e35caca5f9f081091397430e3684f26e75de1ae19', 58, 1, 'MyApp', '[]', 0, '2018-10-01 18:05:19', '2018-10-01 18:05:19', '2019-10-01 11:05:19'),
('b779a1cd7a5a14f1a16cb45204ae8cc0a9b28e01a98a52d8daeaad46bad3af8b5ffa8643c327d507', 32, 1, 'MyApp', '[]', 0, '2018-09-13 22:19:12', '2018-09-13 22:19:12', '2019-09-13 15:19:12'),
('b7d4267665c4f3fc73bb602c267977758c307c83153f165970c924fd9ef06d8cc37a7eec28948782', 209, 1, 'MyApp', '[]', 0, '2019-07-25 07:49:42', '2019-07-25 07:49:42', '2020-07-25 07:49:42'),
('b7de65ca83608b46ecde5ccca48b876563e4b35c43b97cfd87e4db5c07f4df84ee41cde45a54126e', 168, 1, 'MyApp', '[]', 0, '2019-02-22 20:06:23', '2019-02-22 20:06:23', '2020-02-22 13:06:23'),
('b8988678f6d97fd6fa6a873c11211fa8abb9ac676c06fa7e0e300e2ac6ec99c8e37eca6ce5ff525a', 127, 1, 'MyApp', '[]', 0, '2019-07-25 09:27:21', '2019-07-25 09:27:21', '2020-07-25 09:27:21'),
('b89d0fb6c792afd2962a2f57dec66b9a681662ae270cef745e633da91bc075353187e7d316865574', 31, 1, 'MyApp', '[]', 0, '2018-09-13 21:10:32', '2018-09-13 21:10:32', '2019-09-13 14:10:32'),
('b8b3e610532924298c5be73fa2d9ce4fcdb60ebb9ecf70c2ff3022f9b33f2d2713c9fae3ad82a180', 30, 1, 'MyApp', '[]', 0, '2018-09-09 20:10:42', '2018-09-09 20:10:42', '2019-09-09 13:10:42'),
('b8ca4151798a9e23de4c8968990c79b6715bae871481dc47b768cb7d556a1d94ac276f3edd6ea4d5', 37, 1, 'MyApp', '[]', 0, '2018-09-13 21:23:31', '2018-09-13 21:23:31', '2019-09-13 14:23:31'),
('b90b6ef1f54ddfba02ca60b3cc99e8dcedf4c678aa829790385663f31540a51f47edacdb03e274a2', 75, 1, 'MyApp', '[]', 0, '2018-10-29 17:52:14', '2018-10-29 17:52:14', '2019-10-29 10:52:14'),
('b93a781a0bc6ff6fd2af54e3793936472d627f64f01929d7d2252d7dc723160908d4d23831412715', 127, 1, 'MyApp', '[]', 0, '2019-08-02 09:12:00', '2019-08-02 09:12:00', '2020-08-02 09:12:00'),
('b940d7dbb1c0603d767f05bb6046b0758978c40d48544bf68d33364763d23b558ae34b69e345a05f', 37, 1, 'MyApp', '[]', 0, '2018-09-13 22:19:47', '2018-09-13 22:19:47', '2019-09-13 15:19:47'),
('ba06564e8daa70d0b43119ff2ef5f22f83b1d08516e5d31afca1c09a124452ecae33896c0b86eef8', 126, 1, 'MyApp', '[]', 0, '2019-01-12 22:27:55', '2019-01-12 22:27:55', '2020-01-12 15:27:55'),
('ba23c6ee3a73ecde5c8f8016ca68e7a457c18254e2af484ba777179a93e381a272d1fd855be4ad19', 36, 1, 'MyApp', '[]', 0, '2018-09-13 20:45:29', '2018-09-13 20:45:29', '2019-09-13 13:45:29'),
('bb01ff4253ea523a6a95376c97c023bc0bd588f963b935fca0d6b24d1e5a7b8ecde64ba039d09f4c', 127, 1, 'MyApp', '[]', 0, '2019-07-02 05:29:31', '2019-07-02 05:29:31', '2020-07-02 05:29:31'),
('bb090cf5cae2de21666f4d04e5e0f040671a69eaadb442ed973a3eaed5a26e83784b6235ebf1bdae', 87, 1, 'MyApp', '[]', 0, '2018-12-22 21:07:43', '2018-12-22 21:07:43', '2019-12-22 14:07:43'),
('bb4f27e3481f030d3617f5da757cf69cf88d380c19578440cfe4aae981706a5ce7fe320ae3f01283', 87, 1, 'MyApp', '[]', 0, '2018-11-21 23:04:28', '2018-11-21 23:04:28', '2019-11-21 16:04:28'),
('bc8131cdda88943b1a0249c861da64b9a0e5021f8ac14e036a44c7e81da8199110ca1c828d614517', 37, 1, 'MyApp', '[]', 0, '2018-09-04 00:22:47', '2018-09-04 00:22:47', '2019-09-03 17:22:47'),
('bcb6f6c4d5dc42db115ecd996619892d3055c23a1f620f48a98aa4a2994b45982ff132b7218dc427', 177, 1, 'MyApp', '[]', 0, '2019-08-08 12:12:16', '2019-08-08 12:12:16', '2020-08-08 12:12:16'),
('bce1eea51d98c7666e39e9ed11289a64f53a03531a84c9b9612135c0a02519826bd06e747301f669', 30, 1, 'MyApp', '[]', 0, '2018-09-07 21:08:21', '2018-09-07 21:08:21', '2019-09-07 14:08:21'),
('bce8a7e9e95f5dd4beaaf7cb4023188fff49687287797acabc87688da3cc7176360409cc7c3b2c36', 43, 1, 'MyApp', '[]', 0, '2018-09-11 19:16:46', '2018-09-11 19:16:46', '2019-09-11 12:16:46'),
('bdaf276b9a3a1874373f057797c6d95fe9767523f2991b3c489ba44093cb3649d150db6e77ed913d', 137, 1, 'MyApp', '[]', 0, '2019-01-29 17:22:10', '2019-01-29 17:22:10', '2020-01-29 10:22:10'),
('bdb6750c6c54d3a9bd283c2b66059ba12271802a4bd8ee79088c99e411fff65dce69f3823c1e65d3', 36, 1, 'MyApp', '[]', 0, '2018-09-13 18:40:19', '2018-09-13 18:40:19', '2019-09-13 11:40:19'),
('bdcf460effc910f7b5d9fa994c7cf891f8154e3e908517d09ad14973cb3e76efcf32ea5487a81149', 36, 1, 'MyApp', '[]', 0, '2018-09-13 23:27:21', '2018-09-13 23:27:21', '2019-09-13 16:27:21'),
('bddba65b6fc282944f060b720ec58bd0dcdb7467733400443a0833acec742781539eaab47809280e', 30, 1, 'MyApp', '[]', 0, '2018-10-12 18:40:56', '2018-10-12 18:40:56', '2019-10-12 11:40:56'),
('be0391a34b9c7bf647fbf315bb758478ce2ed113fef765585a5dfb9d58bedabc6900bcbb629780a6', 102, 1, 'MyApp', '[]', 0, '2018-11-24 23:56:23', '2018-11-24 23:56:23', '2019-11-24 16:56:23'),
('be731cc08fcede73ae80fd024420a0616cc5947a9fdeccb1ed071a658bb3e3d278283c3fa0bc47e9', 99, 1, 'MyApp', '[]', 0, '2018-11-19 03:16:44', '2018-11-19 03:16:44', '2019-11-18 20:16:44'),
('be949a0ddff0f65cde17bbac8fcea2d219f62610f9fd2acc64071ca30d4948fc3757ce819bab03bb', 49, 1, 'MyApp', '[]', 0, '2018-09-28 17:57:47', '2018-09-28 17:57:47', '2019-09-28 10:57:47'),
('beacd10ed8babf8fa2b01bb9ad05dd8968c2685f3eacfc2f130702607414381d1556fd0f98e0bdf0', 177, 1, 'MyApp', '[]', 0, '2019-07-22 06:27:15', '2019-07-22 06:27:15', '2020-07-22 06:27:15'),
('bee4391eb39d2befda528fe971f2462b6e0a0d4b45c20088781eed35ed86dc640253c5423eed6e9f', 111, 1, 'MyApp', '[]', 0, '2018-12-17 21:31:36', '2018-12-17 21:31:36', '2019-12-17 14:31:36'),
('bf180156dda6d9e0020eb9598fbf53323a5a57d84b6d795ed108bb94b0a03f7cc3403f55d36a9768', 32, 1, 'MyApp', '[]', 0, '2018-09-21 17:48:34', '2018-09-21 17:48:34', '2019-09-21 10:48:34'),
('bf5d1524e38e6bc881dc300bc90f692eae40a912ba4fd5aa5c006dfe5c44e1ccc7320bbad3b4c8da', 37, 1, 'MyApp', '[]', 0, '2018-09-05 20:43:34', '2018-09-05 20:43:34', '2019-09-05 13:43:34'),
('bfc510dfc19b60a7a529186aa0b311214e7dc05968a97d4f4c72b1689c2a5e21aaf1fccf1f0e4512', 213, 1, 'MyApp', '[]', 0, '2019-07-27 04:24:02', '2019-07-27 04:24:02', '2020-07-27 04:24:02'),
('bfe6a6831c637de202f042aacdb5b27a174c32c19cfe2b6733516758c829c0ee37528725aa9c3765', 178, 1, 'MyApp', '[]', 0, '2019-02-24 15:57:16', '2019-02-24 15:57:16', '2020-02-24 08:57:16'),
('c038ed6e1938eed9e52829592ab859eef64278888e8d64abb2d422c6a5e93c5c3996b7fbf3b01257', 75, 1, 'MyApp', '[]', 0, '2018-12-18 01:49:45', '2018-12-18 01:49:45', '2019-12-17 18:49:45'),
('c04ab38f145bdaa4559f7b47a499daad177bf9de1f623506d08228f110d1ee3b09a55058c4480e0c', 127, 1, 'MyApp', '[]', 0, '2019-06-24 18:31:30', '2019-06-24 18:31:30', '2020-06-24 11:31:30'),
('c07b701bcb8e2fce915de478f080a588e20b3ded2c11546fb8ccf243e1e1af99b342199c110deb57', 180, 1, 'MyApp', '[]', 0, '2019-03-01 03:15:00', '2019-03-01 03:15:00', '2020-02-28 20:15:00'),
('c0b136715829626c9c52511c209d0e1d7071bccedd88b095f5ff2656a106bcc66567d20abc7b6388', 32, 1, 'MyApp', '[]', 0, '2018-09-28 19:01:21', '2018-09-28 19:01:21', '2019-09-28 12:01:21'),
('c0d53731e194acc282051850643da3e4483636d38498127e0c69254ada8a087ba705a94aad6bd0af', 127, 1, 'MyApp', '[]', 0, '2019-07-22 06:26:39', '2019-07-22 06:26:39', '2020-07-22 06:26:39'),
('c15cf081cb1ae0bc62ab4c57bd2f1f8eeb5b3b3e45969710191f813804859c5e533697b8b327b81a', 101, 1, 'MyApp', '[]', 0, '2018-11-21 20:36:31', '2018-11-21 20:36:31', '2019-11-21 13:36:31'),
('c16bbbd672ed33f8195f345baf9b2994bcd4651760588364829bd02be1885ae32aa986b579da6ea6', 36, 1, 'MyApp', '[]', 0, '2018-09-06 22:16:05', '2018-09-06 22:16:05', '2019-09-06 15:16:05'),
('c19af24569d7d9f320bdfc4278ba11fcca7eaf03baf3225c5d54f580af38246172c73f9dfb8455aa', 37, 1, 'MyApp', '[]', 0, '2018-09-13 21:40:32', '2018-09-13 21:40:32', '2019-09-13 14:40:32'),
('c1a1e3580e7ca0fdbcc144077af1d5e2f0cc184eb3a9f9b34a0eea1d38c1b569828cd10bcda05744', 73, 1, 'MyApp', '[]', 0, '2018-10-10 20:35:11', '2018-10-10 20:35:11', '2019-10-10 13:35:11'),
('c1e1cd4fa2c35b2226ddf0891599e0bbab1b408f24d826f122f16d217308fee5702796adbf02efab', 32, 1, 'MyApp', '[]', 0, '2018-09-03 23:19:44', '2018-09-03 23:19:44', '2019-09-03 16:19:44'),
('c24629df29107595a8cb590654ab506b0eb4f6606b857e5fe335355727e24529e1bc47263eccbeaf', 199, 1, 'MyApp', '[]', 0, '2019-07-26 05:03:39', '2019-07-26 05:03:39', '2020-07-26 05:03:39'),
('c25991e6715b79d09d88376a6bd8fd72c8044d1de8611851f55a18779226f91204e382e372c2ef7a', 190, 1, 'MyApp', '[]', 0, '2019-03-14 06:31:03', '2019-03-14 06:31:03', '2020-03-13 23:31:03'),
('c26ecaab71c69db453426e3429f3b1f3bce6d277825aa46f9bffea5c7d2a61c9339c6d28bf1ff563', 87, 1, 'MyApp', '[]', 0, '2018-12-18 18:33:38', '2018-12-18 18:33:38', '2019-12-18 11:33:38'),
('c283b7881dff6f358bf83b46df3a4cf3d25075b174aa00285beb8e2fcf0a31cf9e81aacb5a1b4717', 177, 1, 'MyApp', '[]', 0, '2019-08-01 10:34:11', '2019-08-01 10:34:11', '2020-08-01 10:34:11'),
('c33d9f2cd959df6a4912436f02642390d9da0788044e50c93aa555039704b6da5fad9328c728fcca', 39, 1, 'MyApp', '[]', 0, '2018-09-25 22:52:34', '2018-09-25 22:52:34', '2019-09-25 15:52:34'),
('c34639a611cf67ab80dad4086d2e0cba159fcbbd66f0723de88272cf3451544bd71031a0b8dafdad', 177, 1, 'MyApp', '[]', 0, '2019-07-01 07:18:59', '2019-07-01 07:18:59', '2020-07-01 07:18:59'),
('c34ba2c60c8d0fdce6084c0fb0951aa7021a4a96f24b6989456135d13166e19b1527d6264cb4227f', 36, 1, 'MyApp', '[]', 0, '2018-09-13 19:12:31', '2018-09-13 19:12:31', '2019-09-13 12:12:31'),
('c38a5dbe1eb75460a5f721fe2009753f2a6b23d3e24e05f42122f8ba6518dea70af47ac5a5bede9e', 36, 1, 'MyApp', '[]', 0, '2018-09-13 20:18:06', '2018-09-13 20:18:06', '2019-09-13 13:18:06'),
('c3a5692b18db00c1f093477a172439dbfd2e555ce7f9ad11fe8333267418e659873f2c0899a679cb', 31, 1, 'MyApp', '[]', 0, '2018-08-30 22:44:10', '2018-08-30 22:44:10', '2019-08-30 15:44:10'),
('c3b88fdc66a4e9589da62e7d8849b43df7949374fd3d4942e2fc54caf9b2585900e810d7936f05fd', 63, 1, 'MyApp', '[]', 0, '2018-11-27 03:00:37', '2018-11-27 03:00:37', '2019-11-26 20:00:37'),
('c3c5bafd1121de1dd4ee1b16f9cbbfb4a4880c490c94298364207b08baf167792eade8878e886c6b', 87, 1, 'MyApp', '[]', 0, '2018-11-24 22:58:55', '2018-11-24 22:58:55', '2019-11-24 15:58:55'),
('c4135e236a09705aebb7a8cf9607b781d37dbd3b77872309e90763ad8b68c130ed7db29e0f85806c', 188, 1, 'MyApp', '[]', 0, '2019-03-11 08:04:26', '2019-03-11 08:04:26', '2020-03-11 01:04:26'),
('c4248f74622c1adca2aae6512110b36bf2984669a8e35d6e4b22788c5dd29473bc83b8fa0708bef9', 143, 1, 'MyApp', '[]', 0, '2019-02-05 15:42:56', '2019-02-05 15:42:56', '2020-02-05 08:42:56'),
('c4cb96fa21a5a1a179cef7ff9c073dee332d10b8c99efe0e48b87c1be18adbc4d0decd79ad81dd60', 31, 1, 'MyApp', '[]', 0, '2018-09-09 20:04:43', '2018-09-09 20:04:43', '2019-09-09 13:04:43'),
('c4d33cbabf91fc114a3f752803d2988cd901285b0fa20229c89ffa4b765065db20f2487424894149', 212, 1, 'MyApp', '[]', 0, '2019-07-26 12:02:54', '2019-07-26 12:02:54', '2020-07-26 12:02:54'),
('c4d7a8c98f313aaa4b360ceaa9e2b6b067cf28d8ad84f6ac8c1ba8c2f36b708387a4d612e1c492ea', 80, 1, 'MyApp', '[]', 0, '2018-10-19 16:07:35', '2018-10-19 16:07:35', '2019-10-19 09:07:35'),
('c4e148f6704d2d316659a8e9e95e2e421280b4331d435a8963f48fecfbec5be67e3966ae028934b9', 36, 1, 'MyApp', '[]', 0, '2018-09-13 17:55:12', '2018-09-13 17:55:12', '2019-09-13 10:55:12'),
('c4f6fced3cf58224c7c2cfc8f08c5d6257d9830f4e0adccfae3acbdf227aab5e41b2bea38f8a7d51', 37, 1, 'MyApp', '[]', 0, '2018-09-07 01:20:12', '2018-09-07 01:20:12', '2019-09-06 18:20:12'),
('c4fa8f474ff93c84aef9411a67466a25055736c410a3bc0f52f2a5384bde412db8c39cb7bb52e77c', 32, 1, 'MyApp', '[]', 0, '2018-09-08 18:39:23', '2018-09-08 18:39:23', '2019-09-08 11:39:23'),
('c5311e15580889d458871f97d57281faf7862c4b3ab146989c4dbd70aa64c0bd9adff05bb066e6f6', 37, 1, 'MyApp', '[]', 0, '2018-09-17 17:52:03', '2018-09-17 17:52:03', '2019-09-17 10:52:03'),
('c5456e59dc53cc332f7a5694e61f76e1671b270ec1f7441bece8966257c1663ff1f1f4c84d5166af', 37, 1, 'MyApp', '[]', 0, '2018-09-06 17:51:24', '2018-09-06 17:51:24', '2019-09-06 10:51:24'),
('c547e9fbbad3b50932c0e5503aec29c261520e3d8de615039b052a1d034736a75008aec20835e56b', 30, 1, 'MyApp', '[]', 0, '2018-10-29 23:10:03', '2018-10-29 23:10:03', '2019-10-29 16:10:03'),
('c5579647ed47802e022ba0e89af8a9c32e80af06d2d193c16f64de640857d525977392a5917027b7', 32, 1, 'MyApp', '[]', 0, '2018-09-06 20:10:48', '2018-09-06 20:10:48', '2019-09-06 13:10:48'),
('c5702b436d753333b0a19f8bb8b1c4d6fefb90a5bb4bd8ad7d710c1c6f14f39883a82212e0e910c2', 127, 1, 'MyApp', '[]', 0, '2019-02-11 18:07:18', '2019-02-11 18:07:18', '2020-02-11 11:07:18'),
('c5bd10fe7a36dd11cedcd8902e23b592d1b7a4da20c63467f9a0594b6ee24cdd431b1d7791a0fc0f', 75, 1, 'MyApp', '[]', 0, '2018-12-18 01:16:53', '2018-12-18 01:16:53', '2019-12-17 18:16:53'),
('c6238531ed2d29a673562daeaf24b731d5909057b2eec9d0eb9578164d7f2c437fbde89ca5b1ba1c', 127, 1, 'MyApp', '[]', 0, '2019-07-25 09:22:40', '2019-07-25 09:22:40', '2020-07-25 09:22:40'),
('c63236d861e48b53c8a3bc9e93f02d3c60fbc68338f6d4dd244300fab869afd13982595cc00e7bde', 32, 1, 'MyApp', '[]', 0, '2018-09-07 01:21:24', '2018-09-07 01:21:24', '2019-09-06 18:21:24'),
('c6564b283ceb097a0a94aed9faf91dc083c2e191331e49a27c04392619173d4a49a389cbde1a36d9', 201, 1, 'MyApp', '[]', 0, '2019-07-22 09:04:06', '2019-07-22 09:04:06', '2020-07-22 09:04:06'),
('c6b184fba117c874c9030861fd87982f5ed8159b5e514e50f299d73d00fdbc26857d42dfa90ef124', 30, 1, 'MyApp', '[]', 0, '2018-09-04 23:19:13', '2018-09-04 23:19:13', '2019-09-04 16:19:13'),
('c6b713f261f22407b1f743ac8b2ff467552c9895803a205b0bd55805a7c9650963e74a119e60bd2f', 37, 1, 'MyApp', '[]', 0, '2018-09-17 17:38:10', '2018-09-17 17:38:10', '2019-09-17 10:38:10'),
('c6c4b533d62b3e9aae84b4357b0c9dc1fad01640935c779e40ddbf064275ed138852114224a53e29', 40, 1, 'MyApp', '[]', 0, '2018-09-08 19:19:39', '2018-09-08 19:19:39', '2019-09-08 12:19:39'),
('c6e9a61019f9e117ff22b415f9e14884772800cd2469606afb6eb240891fc0203286e0c9ca9c3b86', 87, 1, 'MyApp', '[]', 0, '2018-12-22 21:00:36', '2018-12-22 21:00:36', '2019-12-22 14:00:36'),
('c733d565a078b3d8374a9b0379437d7fdb250cc6e6e1b2b0928b34f63fdc7c0cac987a1f7018f57d', 32, 1, 'MyApp', '[]', 0, '2018-09-04 00:35:59', '2018-09-04 00:35:59', '2019-09-03 17:35:59'),
('c7878a40b40e764f7d0a8849d6d1010f48a99883d2ee6f82e77ab3b38bf2f9b4da28f6591c293e86', 127, 1, 'MyApp', '[]', 0, '2019-02-13 21:55:57', '2019-02-13 21:55:57', '2020-02-13 14:55:57'),
('c7a78bafca9d1be987a12b037298627dc086acdbb90ab694e97ed9d97b64741fcd6ed12530c22ed5', 37, 1, 'MyApp', '[]', 0, '2018-09-08 00:38:00', '2018-09-08 00:38:00', '2019-09-07 17:38:00'),
('c7b5ebd5fffa4a852d3c2e2c5f14e835e6efd989c109bf662998c4d43e1c3b47e33f6d20988ba1de', 214, 1, 'MyApp', '[]', 0, '2019-07-31 11:48:42', '2019-07-31 11:48:42', '2020-07-31 11:48:42'),
('c84c4fc82b33df3a48ff47ccdd4c98642cdd390c318314f43189c3b88694c4410c4da6f50fd8b808', 32, 1, 'MyApp', '[]', 0, '2018-09-08 19:57:13', '2018-09-08 19:57:13', '2019-09-08 12:57:13'),
('c8b5d17d4732ebde5f3450a3225422e0308ed88d62dbdfb4ea76a6e96014357a381adc08e35d7cbe', 32, 1, 'MyApp', '[]', 0, '2018-09-28 22:36:44', '2018-09-28 22:36:44', '2019-09-28 15:36:44'),
('c8e58aca09a9f1fac269a9b02ba3263afd039fae6aa440260fceb1d0f3b49f25d2da1b60608f949d', 32, 1, 'MyApp', '[]', 0, '2018-09-08 19:58:17', '2018-09-08 19:58:17', '2019-09-08 12:58:17'),
('c8faf76d3b7e63b9dff7708e41abadccb0fa54ec3aab76a2f478e39c5df9a2f1e5057c63938978c2', 107, 1, 'MyApp', '[]', 0, '2018-12-08 14:52:01', '2018-12-08 14:52:01', '2019-12-08 07:52:01'),
('c933a42d08c38106b4bcdc0d5471cd3d11afa57fc906a9e0d145f3b03405dc8ce7ff39cc24c1a8e7', 32, 1, 'MyApp', '[]', 0, '2018-09-28 18:38:39', '2018-09-28 18:38:39', '2019-09-28 11:38:39'),
('c98fd9d7ea0acfa86390f0d32c74e19eaa0fdf5264b1f675d8766a73cd64c162fcc129243642a312', 135, 1, 'MyApp', '[]', 0, '2019-01-27 15:15:00', '2019-01-27 15:15:00', '2020-01-27 08:15:00'),
('c9b0642c87a38bc67273e6a48cd8735f9a0ec6d4fa6e7a260df902cfd23ed48a8f58c316972baff1', 34, 1, 'MyApp', '[]', 0, '2018-09-03 23:09:55', '2018-09-03 23:09:55', '2019-09-03 16:09:55'),
('c9c35d971690038007ec672878a3fc38001f831dde83df92a363a15fbd2287ac14ecfb93b99a8ec1', 127, 1, 'MyApp', '[]', 0, '2019-07-13 09:53:33', '2019-07-13 09:53:33', '2020-07-13 09:53:33'),
('c9ff8b171a03be93b5dedbb2680a95f7f47a81f97bea39bdc1b9d3b0b97b2e9e84e8025b01a63d2f', 36, 1, 'MyApp', '[]', 0, '2018-09-13 19:25:01', '2018-09-13 19:25:01', '2019-09-13 12:25:01'),
('ca039abc1e850f3ffe541adcd1f0d3564bb43bda942274c2521b8f76fe6a70721cdd624a29dc2c1a', 38, 1, 'MyApp', '[]', 0, '2018-09-08 01:04:08', '2018-09-08 01:04:08', '2019-09-07 18:04:08'),
('ca114c7b2515e7ad524e9925657c169abf1457714f960b5381e53c85fcd8fd1e5ac7f38f770dc36c', 37, 1, 'MyApp', '[]', 0, '2018-09-13 21:59:51', '2018-09-13 21:59:51', '2019-09-13 14:59:51'),
('cabd1f68ad92a87f7889214ef9d48f2b9df553b54ef177c3a6983328079ce69712eec238b75391c0', 33, 1, 'MyApp', '[]', 0, '2018-09-03 21:59:37', '2018-09-03 21:59:37', '2019-09-03 14:59:37'),
('cae55e819f212279bc2b7dbf8305d4a8148bf93f0912e702219e98368558c6d1edc96c51363b9e8d', 209, 1, 'MyApp', '[]', 0, '2019-07-22 07:10:38', '2019-07-22 07:10:38', '2020-07-22 07:10:38'),
('cb020e1d58f81383af68b71fe438a7d12ff219e2ab0d21767bc871a553b024a0ba5fe84994bd0086', 36, 1, 'MyApp', '[]', 0, '2018-09-17 18:11:56', '2018-09-17 18:11:56', '2019-09-17 11:11:56'),
('cb9643188f869d0334b7f051aac35c67c2634c18fd1fe422144a69c0060bfb1c2b187eaa33ae3cf6', 30, 1, 'MyApp', '[]', 0, '2018-09-27 02:56:52', '2018-09-27 02:56:52', '2019-09-26 19:56:52'),
('cba30ae265e987f6b2677acd50690636c830211de2ee69a26e40113791350d39fc72cfdc52782b42', 53, 1, 'MyApp', '[]', 0, '2018-10-01 23:02:52', '2018-10-01 23:02:52', '2019-10-01 16:02:52'),
('cc2aa0a0a0a14e34dc5cb29d5dc6108eeca0ac28362248cec19b0499cfc2a87b89377eff780024b7', 127, 1, 'MyApp', '[]', 0, '2019-05-27 18:00:49', '2019-05-27 18:00:49', '2020-05-27 11:00:49'),
('cc7339823e10f4d355143a64a268d9a89f36c30dca3d8ecb9eec895f3fb69e78e0e0135a094e2ee6', 37, 1, 'MyApp', '[]', 0, '2018-09-19 17:35:45', '2018-09-19 17:35:45', '2019-09-19 10:35:45'),
('cc86eccbcedb23dbe389d7edf7438275ac1b18ffe39867417d6a44a07b9a98f53ac06e3d77278b63', 87, 1, 'MyApp', '[]', 0, '2018-11-01 21:03:54', '2018-11-01 21:03:54', '2019-11-01 14:03:54'),
('ccccb2e13e44cf23aed185bb50471997760489723ad0e52d7bb72f7251dc697cc7c44a4b520eb090', 31, 1, 'MyApp', '[]', 0, '2018-09-07 00:45:49', '2018-09-07 00:45:49', '2019-09-06 17:45:49'),
('cceb671e6f984c28f1e7d5f1da59d35e64ca1a45af58ac60474e4d22142235034787dbda0598f2fc', 177, 1, 'MyApp', '[]', 0, '2019-07-25 08:50:48', '2019-07-25 08:50:48', '2020-07-25 08:50:48'),
('cd59c36472c7becea2536836e880afb67a3de4c94462e18e22e3c4b95fc1735a46b993f776419fe0', 127, 1, 'MyApp', '[]', 0, '2019-03-10 19:57:05', '2019-03-10 19:57:05', '2020-03-10 12:57:05'),
('cd85c8810e302115911f276f4468f2e69371a5af0dcfdd52abffe153a0b504234f706cba9bbc2d9c', 141, 1, 'MyApp', '[]', 0, '2019-02-04 22:05:47', '2019-02-04 22:05:47', '2020-02-04 15:05:47'),
('cda09c81e209cefe0a5e2bcaf5dabe013db61590d2b8fa9e526a3f07223269ca4d1c4f4ec2511e25', 111, 1, 'MyApp', '[]', 0, '2019-01-03 23:30:45', '2019-01-03 23:30:45', '2020-01-03 16:30:45'),
('cdca54b8434228d92b4b91dc548738ccec582d790b689ed0c4df6ac8d8f41069a5c5c08a88900752', 32, 1, 'MyApp', '[]', 0, '2018-09-24 21:35:16', '2018-09-24 21:35:16', '2019-09-24 14:35:16'),
('ce5999e122b556c837b25528ff7e55ed91399e77a9827dd5a3d4a2c1c4c61e244ba5c50b8f736302', 111, 1, 'MyApp', '[]', 0, '2018-12-17 19:56:21', '2018-12-17 19:56:21', '2019-12-17 12:56:21'),
('ce76a72715eec3edd4a82448299107d03a6d43f9b349febc6f82c92c281138dda4d5352122411a66', 36, 1, 'MyApp', '[]', 0, '2018-09-13 23:36:13', '2018-09-13 23:36:13', '2019-09-13 16:36:13'),
('ce9d02190716ca3c59e754d31922203a68f6dd2d8146fe8c485cb0ba029ebec7ebcc9ceb494ba723', 36, 1, 'MyApp', '[]', 0, '2018-10-01 17:53:02', '2018-10-01 17:53:02', '2019-10-01 10:53:02'),
('cec238050f6862afeb4354122a3988006567e9e815d50df1856708c52a0ba62409de96cb098a9d12', 87, 1, 'MyApp', '[]', 0, '2018-12-17 19:36:32', '2018-12-17 19:36:32', '2019-12-17 12:36:32'),
('cefcad69fa179bbbdc26d0bd012f7f15d44c0010f1ddf1bc2bb7ad16f93c27f7c0e415be7442b86c', 32, 1, 'MyApp', '[]', 0, '2018-09-11 20:05:43', '2018-09-11 20:05:43', '2019-09-11 13:05:43'),
('cefd496fd35d10b2e5b1def1fdd7d3133561eddcfc1163b73c0b16c675c0496e5c834651d72b8d4c', 102, 1, 'MyApp', '[]', 0, '2018-11-24 23:49:18', '2018-11-24 23:49:18', '2019-11-24 16:49:18'),
('cf2ec1c32fee6f23a400b308935ad0e0305be8ce9f274c9fc2f6530237e13a02831bddec03e3e3c5', 36, 1, 'MyApp', '[]', 0, '2018-09-13 19:59:55', '2018-09-13 19:59:55', '2019-09-13 12:59:55'),
('cfdf0ce7980761273c5131910333e4a133dbb00edcca7188f599b76efdb17f1f15bc3aeeafc37c05', 36, 1, 'MyApp', '[]', 0, '2018-09-17 18:19:13', '2018-09-17 18:19:13', '2019-09-17 11:19:13'),
('cfe01606a4cb2078a2d8325c2152fa6ccfbd8a2d5837f2cb8f6d86f35887a61edec45dc0c36bfc50', 32, 1, 'MyApp', '[]', 0, '2018-09-17 19:27:53', '2018-09-17 19:27:53', '2019-09-17 12:27:53'),
('d038527dab6563d9b35fd630adc0d34a0d6b1edc64918695c2ecc1125b7dc99d8d4cb7251fae6aff', 37, 1, 'MyApp', '[]', 0, '2018-09-06 17:48:03', '2018-09-06 17:48:03', '2019-09-06 10:48:03'),
('d0b465ad21619496fabad5554f7dce83deb6a0f4dc4e4ca45bc308a4d2f7763f4808a6c70dae00df', 31, 1, 'MyApp', '[]', 0, '2018-09-21 01:03:20', '2018-09-21 01:03:20', '2019-09-20 18:03:20'),
('d108d80d3a06c10ce52a61d36c17d13725657e440629e75d584b17f8b93f19f6215d76e65b6bb2d2', 38, 1, 'MyApp', '[]', 0, '2018-09-24 21:54:22', '2018-09-24 21:54:22', '2019-09-24 14:54:22'),
('d136f77307e9c1b67f969b5e5ee153727c62c1b224e9934ccca814589721ea367c278c16bc5d26eb', 53, 1, 'MyApp', '[]', 0, '2018-10-02 19:41:52', '2018-10-02 19:41:52', '2019-10-02 12:41:52'),
('d1b30873d9282d9469bd9697de38c2910f15316adbca2a5737de1ada2da69fdfcee2f0462f9675da', 87, 1, 'MyApp', '[]', 0, '2018-11-26 22:49:29', '2018-11-26 22:49:29', '2019-11-26 15:49:29'),
('d1b4f5d5514641a8ebed4c38bb12b78c3d40800c4f2929ecb06ec4598664d3b9e4668c894133b920', 32, 1, 'MyApp', '[]', 0, '2018-09-17 18:16:01', '2018-09-17 18:16:01', '2019-09-17 11:16:01'),
('d1dddab0637e2e0d56a04d2b88d5f65493305544a1288eba239f14795393a102cafeac34cac3b1a1', 127, 1, 'MyApp', '[]', 0, '2019-07-09 10:52:58', '2019-07-09 10:52:58', '2020-07-09 10:52:58'),
('d1f17897eb3a3d95598e313a7032ff264a21b0c90f168fc52c8c1f751f1ef05a1c160e877dadf629', 177, 1, 'MyApp', '[]', 0, '2019-07-26 09:58:30', '2019-07-26 09:58:30', '2020-07-26 09:58:30'),
('d2149bba25a7e59d87425fcaac6389206e13756346ed3628f5fe84c018cfa4bbe215592bbb669d61', 127, 1, 'MyApp', '[]', 0, '2019-06-11 21:21:02', '2019-06-11 21:21:02', '2020-06-11 14:21:02'),
('d2b710fbabab552f95e76a91bc505588a130004d53fe71f20759ab3e5b4b581ec0ff3c09e02df1b3', 127, 1, 'MyApp', '[]', 0, '2019-07-11 06:25:03', '2019-07-11 06:25:03', '2020-07-11 06:25:03'),
('d2eb485279159bf4f3628097bb4489d5b626930ad3ace8dbabb5dc2f63c19d360fd555b4bb6d8f7c', 127, 1, 'MyApp', '[]', 0, '2019-03-23 00:50:08', '2019-03-23 00:50:08', '2020-03-22 17:50:08'),
('d2f5ebe9fa83c403617f8c776a289cf00178aa7b350ee271890918ddb4cb8257c3c8b7dd2f5e2a64', 127, 1, 'MyApp', '[]', 0, '2019-07-01 10:50:43', '2019-07-01 10:50:43', '2020-07-01 10:50:43'),
('d3151661d744d22bd578cf9366708db160ca0ce18190a588de043cedae7dabe9908be656dcf2e20f', 41, 1, 'MyApp', '[]', 0, '2018-09-11 19:13:27', '2018-09-11 19:13:27', '2019-09-11 12:13:27'),
('d3df967d2b387d1ee82cae6df3d73751c56ce365240d2c129e48f4bd4af1a85a1460e748b28a2db4', 127, 1, 'MyApp', '[]', 0, '2019-07-19 11:54:52', '2019-07-19 11:54:52', '2020-07-19 11:54:52'),
('d3f2a1aff1550be055cf6cdc016f7bc560aa1fa1cae5be6f953d72939edc05c456015ae1c326413b', 30, 1, 'MyApp', '[]', 0, '2019-02-23 00:46:17', '2019-02-23 00:46:17', '2020-02-22 17:46:17'),
('d404d22e72494820176ffe37cdc2f4b10018100a431ad78676fb051f567829f76938c5880ca5e8d8', 177, 1, 'MyApp', '[]', 0, '2019-06-27 21:19:30', '2019-06-27 21:19:30', '2020-06-27 14:19:30'),
('d41b1dd5759821b6ae223ba6afc151ee1cdc77fabebedc97e3d687e411c5ed48424d6b79d12a070f', 30, 1, 'MyApp', '[]', 0, '2018-09-25 23:04:11', '2018-09-25 23:04:11', '2019-09-25 16:04:11'),
('d43ceb9d36bf2f65692eb479ca5eac5cc09cbd79ffcdf0a1b65df09c9926046967de4f3c723d27da', 36, 1, 'MyApp', '[]', 0, '2018-09-13 18:41:15', '2018-09-13 18:41:15', '2019-09-13 11:41:15'),
('d462483e1ca4e0f8ed9c7b1772ac22f0015d9fa4d65d09d05240f007c90e1e465a472ed459d253b9', 37, 1, 'MyApp', '[]', 0, '2018-09-07 00:39:52', '2018-09-07 00:39:52', '2019-09-06 17:39:52'),
('d4cb9191e05dea397046987dbe4e17b125195b2a6984fc6d8f5597b63cfdce7996e284bcf45fd546', 127, 1, 'MyApp', '[]', 0, '2019-05-31 01:59:22', '2019-05-31 01:59:22', '2020-05-30 18:59:22');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('d58275cc0251822fac63ce237b6b2ccd0d9298f1b0af240cc74e1b88c07e0940bd5c9bfe2235b4ac', 36, 1, 'MyApp', '[]', 0, '2018-09-04 00:17:14', '2018-09-04 00:17:14', '2019-09-03 17:17:14'),
('d5b79dab58a61b97eadc8d4df432fa1360b9c83364656db6953a7ffea9b535b1a4d39187bbf4aeef', 111, 1, 'MyApp', '[]', 0, '2019-02-11 19:47:47', '2019-02-11 19:47:47', '2020-02-11 12:47:47'),
('d5d17df8e6ab8f5621f3fe758e41ffff379ccd33d0ae39c5af1fc3947ca3c864524c6af080a5c0a0', 177, 1, 'MyApp', '[]', 0, '2019-07-22 07:04:23', '2019-07-22 07:04:23', '2020-07-22 07:04:23'),
('d5e431cc9331c707b95b68d7c74d2bfe0012d4095c8fdc99ac9720c80a4e9f8947619424502a7cd0', 35, 1, 'MyApp', '[]', 0, '2018-09-03 23:35:00', '2018-09-03 23:35:00', '2019-09-03 16:35:00'),
('d613e265ff14a61957c5cdc14c8e60d08ddc02bd5812a8db968fc1f5b67dd9ffc59eccc3c3b89aec', 102, 1, 'MyApp', '[]', 0, '2018-11-22 00:49:21', '2018-11-22 00:49:21', '2019-11-21 17:49:21'),
('d67fb976b5e8406a2e8d1c478b98caa231eb247217da48bba97e510cf94490a78b3e7aa66213d63d', 218, 1, 'MyApp', '[]', 0, '2019-08-08 10:57:40', '2019-08-08 10:57:40', '2020-08-08 10:57:40'),
('d6be2f3ab36a51956b40ab81506eb9787882145466c8ee70dc84f844abd5bf5a87cab2c2ea95e77b', 102, 1, 'MyApp', '[]', 0, '2018-12-17 21:55:17', '2018-12-17 21:55:17', '2019-12-17 14:55:17'),
('d735384c611bb877c833ab7d2e6c05f6d4f1eace767b2214a3f2c81844e3f716d5c04fb4e3f82936', 127, 1, 'MyApp', '[]', 0, '2019-05-31 21:36:24', '2019-05-31 21:36:24', '2020-05-31 14:36:24'),
('d785f1f7e43083ef06851f12120d73cb3133af65a60b79a30b61ad148fbd39421ff66d365a611038', 30, 1, 'MyApp', '[]', 0, '2018-11-27 03:01:00', '2018-11-27 03:01:00', '2019-11-26 20:01:00'),
('d83d75da29e74b9df7db9ba5b7624a4234cb4cbb22147412fab3b0bd21a5c5224c4cc257a6cc1815', 32, 1, 'MyApp', '[]', 0, '2018-09-13 22:02:18', '2018-09-13 22:02:18', '2019-09-13 15:02:18'),
('d8994db40841ce679104cd071fbb26b6d3b3ac5b0ddb200c122c7e73c05878e872411669a8479508', 212, 1, 'MyApp', '[]', 0, '2019-08-05 12:59:56', '2019-08-05 12:59:56', '2020-08-05 12:59:56'),
('d89e4c9b84388f2bbb588969939e2910fdf27c4f40640687ad984862d81dcd084014438bfe57625d', 36, 1, 'MyApp', '[]', 0, '2018-09-11 20:05:09', '2018-09-11 20:05:09', '2019-09-11 13:05:09'),
('d89fda6802e14013a67542317056da16a40a330dff87ca2047b01f231fa8ca7fee686c8a41e6d354', 32, 1, 'MyApp', '[]', 0, '2018-09-28 17:36:51', '2018-09-28 17:36:51', '2019-09-28 10:36:51'),
('d8a2010f4e563fdb5f7637842e8dd7975284cce30085bd248c510578bb22ca35b14d853c212a8b20', 39, 1, 'MyApp', '[]', 0, '2018-09-04 05:11:55', '2018-09-04 05:11:55', '2019-09-03 22:11:55'),
('d9364419b97b48cb7a98de3e11cfb4b55c4a773a1a679daf369c47d0f272c1f36107d6aa72440a21', 36, 1, 'MyApp', '[]', 0, '2018-09-24 21:51:03', '2018-09-24 21:51:03', '2019-09-24 14:51:03'),
('d967aa7b1aed13f6536bf49e8d0b6f237575e73a894e64df57acdfc966fdc99ab911d6fd78a7f732', 37, 1, 'MyApp', '[]', 0, '2018-09-13 22:32:48', '2018-09-13 22:32:48', '2019-09-13 15:32:48'),
('d9a1aed112b583d54c1c4f985f3061ff0807af2a67e4e9ada2da1b3170388274a721450725418260', 37, 1, 'MyApp', '[]', 0, '2018-09-06 18:12:45', '2018-09-06 18:12:45', '2019-09-06 11:12:45'),
('d9c667b87a4bd3973a4e4ba2f93ab4cc83cac1b220b67ff6c30f29f2f790c3543af8f0e55ee2984c', 87, 1, 'MyApp', '[]', 0, '2018-11-26 18:59:06', '2018-11-26 18:59:06', '2019-11-26 11:59:06'),
('d9dec69508c740a9fb99e2e2d0b0137fc908b727e0e8a20fa80a49453bfdea8c9960a2e4146e204c', 127, 1, 'MyApp', '[]', 0, '2019-07-17 04:58:09', '2019-07-17 04:58:09', '2020-07-17 04:58:09'),
('da0d4c32ff1baba61c50f7826a494fd3d67e07dae45b379bbc1dbbab0aef0d1919e001bf75caf4c5', 127, 1, 'MyApp', '[]', 0, '2019-06-28 21:23:34', '2019-06-28 21:23:34', '2020-06-28 14:23:34'),
('da1345c791f2652709102eeebe47f7f6c9dfa4c2e9b08ac094facc2b486c724d53aac19ccc27c706', 127, 1, 'MyApp', '[]', 0, '2019-08-06 06:13:36', '2019-08-06 06:13:36', '2020-08-06 06:13:36'),
('da4ba362a511abc85d9e7ebb189a8bc4110bb3ef16e98957255269474bea7be3daeb574f3ec5db58', 63, 1, 'MyApp', '[]', 0, '2019-02-04 22:13:04', '2019-02-04 22:13:04', '2020-02-04 15:13:04'),
('da7f2b31b433f00ae1288cbfbc71b6fc73841f1141f365ceba871a75c5f40367cc7c6b294c8c604d', 37, 1, 'MyApp', '[]', 0, '2018-09-13 22:52:09', '2018-09-13 22:52:09', '2019-09-13 15:52:09'),
('dac792beac6731b31557572d4c8c623a4d24d68d7c193071bbf8046587fcc395e6f09d4c26e69c4d', 81, 1, 'MyApp', '[]', 0, '2018-10-26 00:04:07', '2018-10-26 00:04:07', '2019-10-25 17:04:07'),
('dacff6171acc18163514ae3fc3bb4f209dfe76ca49491f784aee513db58675f9932fcf4a5db1bdc8', 93, 1, 'MyApp', '[]', 0, '2018-11-08 17:00:16', '2018-11-08 17:00:16', '2019-11-08 10:00:16'),
('db7181935eb38d44211db552c05634f859779e08b5316528c67a4802eaf2c30e4bbc707f364e4b5d', 177, 1, 'MyApp', '[]', 0, '2019-02-23 02:14:28', '2019-02-23 02:14:28', '2020-02-22 19:14:28'),
('dc222e312a0bf78f77e6311ea64479f9fbbf490ae13df37086185ea5623122f36d40fa9c8d3199c8', 63, 1, 'MyApp', '[]', 0, '2018-10-28 06:58:30', '2018-10-28 06:58:30', '2019-10-27 23:58:30'),
('dc80ca374ea6c74fb44dca06c59936abc8207f2c9cdba03b751c6eaaae78da310a628d9a57d17d31', 95, 1, 'MyApp', '[]', 0, '2018-11-13 21:15:35', '2018-11-13 21:15:35', '2019-11-13 14:15:35'),
('dcadc37fb071986d8b63440fe641e4781d12c8aca6c99ea3417491ef0aaabf29e6e29f28b93ea663', 30, 1, 'MyApp', '[]', 0, '2018-09-12 00:25:37', '2018-09-12 00:25:37', '2019-09-11 17:25:37'),
('dcc9b748d00bb71d3ddd23094f6addb2fc0645fe7f86bdcaf932250f43fc7606868ebcd22490dd54', 30, 1, 'MyApp', '[]', 0, '2019-01-04 06:36:52', '2019-01-04 06:36:52', '2020-01-03 23:36:52'),
('dcd610695aa8b0d1b7b0485d83d871af671bb9a1ec1c094bc146c2e6615e56fc1173f2a9ad74b17a', 83, 1, 'MyApp', '[]', 0, '2018-10-28 00:37:27', '2018-10-28 00:37:27', '2019-10-27 17:37:27'),
('dd08267e85ae08635d6880eb15d93fa690eb3218882e47e1a70a19ec3b701d3a6eff6e713d05da92', 30, 1, 'MyApp', '[]', 0, '2018-10-17 04:04:12', '2018-10-17 04:04:12', '2019-10-16 21:04:12'),
('dd0c5ccc9baae15a1666b59006bb75fccd89f323d740a0b73faf9c20864144b1cc3625b9d1d6b561', 102, 1, 'MyApp', '[]', 0, '2018-12-17 18:43:55', '2018-12-17 18:43:55', '2019-12-17 11:43:55'),
('dd4f00b8c47ef4d5d0b375f5f3514a7b3086247a5024da12c09d41cdf0a178ac2b7c4407f25a26e8', 30, 1, 'MyApp', '[]', 0, '2018-10-30 23:51:28', '2018-10-30 23:51:28', '2019-10-30 16:51:28'),
('ddad27ab04ea9343a3a8a2ac55d4b8b5b50d72e38290e56a8ff4d153368c7b58226131e14ac9a05d', 30, 1, 'MyApp', '[]', 0, '2018-10-29 17:12:25', '2018-10-29 17:12:25', '2019-10-29 10:12:25'),
('ddf46291a3951499eb3d69779cb15836d84e38ceb786f4e182ab3d7ee6339dcd4502feb94373e980', 42, 1, 'MyApp', '[]', 0, '2018-09-13 23:17:01', '2018-09-13 23:17:01', '2019-09-13 16:17:01'),
('de0cdef698c6c242a84aa0a8725fb620b4c62161969a1514ccf38848f84226e40b2e413a45dd7258', 127, 1, 'MyApp', '[]', 0, '2019-07-16 06:52:23', '2019-07-16 06:52:23', '2020-07-16 06:52:23'),
('de365c583e26531909c444b597e1707c4f5073068cf4067296b7bdbd6ea7bba701a3a1a4566e2a7c', 92, 1, 'MyApp', '[]', 0, '2018-11-06 21:07:59', '2018-11-06 21:07:59', '2019-11-06 14:07:59'),
('de38b7f5671c7d1b13161feb876e7279271833de7264f9d4edd5bac2d3d8ca1f3e37f68e30215f60', 78, 1, 'MyApp', '[]', 0, '2018-10-14 20:23:07', '2018-10-14 20:23:07', '2019-10-14 13:23:07'),
('de9fdf9a6a52fe20e3d86f57dfd782cc750456b4daa7289268b0e666393f762a02c3c23383305c81', 36, 1, 'MyApp', '[]', 0, '2018-09-07 23:07:53', '2018-09-07 23:07:53', '2019-09-07 16:07:53'),
('dec1717571769e5c034a665015ef6ec735c004e190c2301cac56d221161ec15193030642cdfbb755', 177, 1, 'MyApp', '[]', 0, '2019-03-23 19:35:57', '2019-03-23 19:35:57', '2020-03-23 12:35:57'),
('df0227c0acc04d1871eadfe12483815fd3e7e6e72471c54d2f296a9bc1cfdc299dfae40016d1f571', 35, 1, 'MyApp', '[]', 0, '2018-09-04 00:12:55', '2018-09-04 00:12:55', '2019-09-03 17:12:55'),
('df3feb572cac9bee310b4c7c8264e02da38113492a807999a74c229c63076532e3478f97d38b657b', 201, 1, 'MyApp', '[]', 0, '2019-06-20 15:13:00', '2019-06-20 15:13:00', '2020-06-20 08:13:00'),
('df8722e73e289935d9eea841e385fc4306ed9e7e56f4ccd116dbf2a93cd0bd4b240ba4fb50eef258', 30, 1, 'MyApp', '[]', 0, '2018-08-31 04:56:36', '2018-08-31 04:56:36', '2019-08-30 21:56:36'),
('dfda5132b5750a4d0d8942fdb40bbdfef26e45a098fe1124e17656a14c7653dfe2c83dc9b1b61948', 32, 1, 'MyApp', '[]', 0, '2018-09-06 22:16:47', '2018-09-06 22:16:47', '2019-09-06 15:16:47'),
('dfdbb22443421e230900656ace56d99a2a5960613d970302136f28aae59870831d0ce28596804fe2', 30, 1, 'MyApp', '[]', 0, '2019-01-11 22:14:14', '2019-01-11 22:14:14', '2020-01-11 15:14:14'),
('e01901f87d49b020a8aaba706117cdb2c54896fcf3bed7afd459b54139a48701d891f80ce20577fc', 97, 1, 'MyApp', '[]', 0, '2018-11-15 01:09:35', '2018-11-15 01:09:35', '2019-11-14 18:09:35'),
('e03e631d7ce62482007c79d198d02acdbc790ab0c0d619597cfd894763d408e912a5529971d33d2e', 61, 1, 'MyApp', '[]', 0, '2018-10-03 01:27:21', '2018-10-03 01:27:21', '2019-10-02 18:27:21'),
('e16ae40a55d28472dfaf91a0b5c192cdc91ab640e249e27d2e37053d41e41d4a152067d3ae852781', 87, 1, 'MyApp', '[]', 0, '2018-12-17 19:22:05', '2018-12-17 19:22:05', '2019-12-17 12:22:05'),
('e1993d8a6b86be182ba2196d8fb3e9f94581293aa9ab6ca106315dbda2c97f34b3522f9e184048a6', 32, 1, 'MyApp', '[]', 0, '2018-09-24 21:56:00', '2018-09-24 21:56:00', '2019-09-24 14:56:00'),
('e1ca32de56ec6e383b25ab7eb1b8ca11c973e7c0ca7e50d996049ebcb0ef3953483fbd76b1342c3c', 127, 1, 'MyApp', '[]', 0, '2019-07-17 05:41:26', '2019-07-17 05:41:26', '2020-07-17 05:41:26'),
('e1ee0c7c8ecd087ac9c726ef6159049d0a3577c469a9cfc133cb7fdc66414882aa2a194d475516b5', 150, 1, 'MyApp', '[]', 0, '2019-02-12 04:06:54', '2019-02-12 04:06:54', '2020-02-11 21:06:54'),
('e212e5421badd729c515ef2d409a8c670726c2466e2dfb6989f0ae4971398acdd679007ea1ea965a', 105, 1, 'MyApp', '[]', 0, '2018-12-02 05:13:31', '2018-12-02 05:13:31', '2019-12-01 22:13:31'),
('e243deb490a2e2657a076ce34032815cdcd5f7c6a69f0882cbd2e1fc693e82d34965e692501a6547', 102, 1, 'MyApp', '[]', 0, '2018-11-26 19:15:20', '2018-11-26 19:15:20', '2019-11-26 12:15:20'),
('e298a0ca1d467d5aa9ed69e279667e16c4f364a5fb1027ea840632e2443ca91df4dd84f2b35c6221', 30, 1, 'MyApp', '[]', 0, '2018-09-30 00:19:55', '2018-09-30 00:19:55', '2019-09-29 17:19:55'),
('e2e684ddfdf3e19b7d1471843ed408e605abdbc596dcb47e155788d15e346cd5ad642f37a59169b0', 36, 1, 'MyApp', '[]', 0, '2018-09-13 18:07:45', '2018-09-13 18:07:45', '2019-09-13 11:07:45'),
('e312098eff662ad077de7fa03804f158b2cb40b61ab0af8e5be6798ac1a4f854179fe99ccf01a0d9', 32, 1, 'MyApp', '[]', 0, '2018-09-17 19:23:25', '2018-09-17 19:23:25', '2019-09-17 12:23:25'),
('e314184ff8fe6ae4a084e04b42971d84202f7a29ae345bb4aa9c249e525c4937e291901007f0f20f', 127, 1, 'MyApp', '[]', 0, '2019-06-11 23:36:12', '2019-06-11 23:36:12', '2020-06-11 16:36:12'),
('e356cf78576f751c324241885a750c14aee79b8e47e8184199f2890185430d870e6dfc79724cbacf', 120, 1, 'MyApp', '[]', 0, '2018-12-31 08:12:08', '2018-12-31 08:12:08', '2019-12-31 01:12:08'),
('e3fca852c11adb3ff6a92fc9147d345d7e1bdc9e0e9079f8b327c91d58e7a563ae67954b6a27a764', 32, 1, 'MyApp', '[]', 0, '2018-09-04 00:23:14', '2018-09-04 00:23:14', '2019-09-03 17:23:14'),
('e43d201be66831b6177bbf251eba5ba8d6d9bfeeafcf78ddc730ebbc06d11a83514cd2d997537fe5', 169, 1, 'MyApp', '[]', 0, '2019-02-22 21:44:51', '2019-02-22 21:44:51', '2020-02-22 14:44:51'),
('e44a93571807dd4afea90a068becb84152f2d9cb42002bbc0288124b53f60e5411955dbb482324dd', 127, 1, 'MyApp', '[]', 0, '2019-07-17 04:48:14', '2019-07-17 04:48:14', '2020-07-17 04:48:14'),
('e46408d76292b63141c423e159b9d39d2d7ff0c2567be0af9fe53dd0d74c9cd06476ab42ee15f9b2', 32, 1, 'MyApp', '[]', 0, '2018-09-05 20:42:43', '2018-09-05 20:42:43', '2019-09-05 13:42:43'),
('e469b2e22d4f6fae03fd31b5061592d087f38d27e93d1d90a6bbe5ad8b13a62aeab580b3a476861d', 187, 1, 'MyApp', '[]', 0, '2019-03-11 01:53:45', '2019-03-11 01:53:45', '2020-03-10 18:53:45'),
('e47419089ec3c1cc659200614f6e492b77a1f1260f45ebe0184dd48718e3d2bdebd2bdf4fcd0b453', 31, 1, 'MyApp', '[]', 0, '2018-09-29 18:38:23', '2018-09-29 18:38:23', '2019-09-29 11:38:23'),
('e49d67c1e4a09efef3ef66c4f00496e6644c83c393c97d51206d2f8d0f49b1afa416d80ce96594e4', 31, 1, 'MyApp', '[]', 0, '2018-09-04 22:12:29', '2018-09-04 22:12:29', '2019-09-04 15:12:29'),
('e4fa55b4829c0399afc6fc64f4523e81f1479ee7a4a70f9379b48b69418d2d17a563e14561342051', 90, 1, 'MyApp', '[]', 0, '2018-11-02 19:42:46', '2018-11-02 19:42:46', '2019-11-02 12:42:46'),
('e50c2ede991461497081a6977eb4acec683bb5ab2c3d6ab47527ea7b591f576f1d77177b6c57d3d8', 177, 1, 'MyApp', '[]', 0, '2019-07-22 07:37:34', '2019-07-22 07:37:34', '2020-07-22 07:37:34'),
('e58aaf00bc770c2c827aa8a2ba3ce202b0bb342ec41e61a2d79bbedba04145a037be7937fcad04f6', 36, 1, 'MyApp', '[]', 0, '2018-09-17 19:18:14', '2018-09-17 19:18:14', '2019-09-17 12:18:14'),
('e621fa31423bbb5a8db85b2fd28da579ed478141bea328cc0af1839db858a6ae5c72ee5bad9ca9a7', 51, 1, 'MyApp', '[]', 0, '2018-09-28 22:36:24', '2018-09-28 22:36:24', '2019-09-28 15:36:24'),
('e64b32094ca7887eefdf16c228f3acaa90dc718b7506dea29ff490ed652726913f993aee28db58ab', 30, 1, 'MyApp', '[]', 0, '2018-10-05 18:17:06', '2018-10-05 18:17:06', '2019-10-05 11:17:06'),
('e6802f38c1822d28125b4644d2316f1956367cf0c1e6718401ecb136045cd2c89f5cb132c57b8443', 177, 1, 'MyApp', '[]', 0, '2019-07-01 06:39:39', '2019-07-01 06:39:39', '2020-07-01 06:39:39'),
('e6b137ef7e4e381194c9bc3e86621ba38575638cb14dad9af794d67a9a2b02c97976a949149327b9', 165, 1, 'MyApp', '[]', 0, '2019-02-22 19:43:32', '2019-02-22 19:43:32', '2020-02-22 12:43:32'),
('e6d1c4512525833f5254ca3a2338352b6fc378a9d02aa1be677d48755a1a94538e32a6aee1fff928', 147, 1, 'MyApp', '[]', 0, '2019-02-07 20:04:21', '2019-02-07 20:04:21', '2020-02-07 13:04:21'),
('e6e11d37cd69a47bf70a591da940e9142f069b06adb4df288bb2de7a6a46c394f3d04e8e016d3bb3', 127, 1, 'MyApp', '[]', 0, '2019-01-12 23:49:04', '2019-01-12 23:49:04', '2020-01-12 16:49:04'),
('e6ed1d7a49e34ce9d71a97e482848254b5ada57fa979c04cc2e0e47b297812169bc03ec921e6a81b', 36, 1, 'MyApp', '[]', 0, '2018-09-13 23:23:17', '2018-09-13 23:23:17', '2019-09-13 16:23:17'),
('e6f51cbd8cb3db62e7f83b8a64cf1aa166f8d1d02e0e4d31c7afee0c25262890c99c590c6d7de684', 53, 1, 'MyApp', '[]', 0, '2018-09-30 05:51:01', '2018-09-30 05:51:01', '2019-09-29 22:51:01'),
('e74483320e14d9e24feff76863b09bd35a8d6bb3c317588c8b0fec73c948a55398a11e304ce087f8', 127, 1, 'MyApp', '[]', 0, '2019-07-16 10:21:30', '2019-07-16 10:21:30', '2020-07-16 10:21:30'),
('e79c82949145d784157f95223fcfabb8637b4c8550de72b42c896e532bb8424892b8906432eccfad', 72, 1, 'MyApp', '[]', 0, '2018-10-10 17:55:14', '2018-10-10 17:55:14', '2019-10-10 10:55:14'),
('e7afeceb857708d7cfb4f5c6a848df895301fb283d632dca392e94528933028c59053491643bc969', 125, 1, 'MyApp', '[]', 0, '2019-01-12 15:01:14', '2019-01-12 15:01:14', '2020-01-12 08:01:14'),
('e7bf4fbc3d5c3065ea22b705d34d5d8070d9ce2be90aa8a0743908507ad5bd8d345adf360a1706f9', 213, 1, 'MyApp', '[]', 0, '2019-08-07 18:49:30', '2019-08-07 18:49:30', '2020-08-07 18:49:30'),
('e817302bd4c74f7f8c386a7e41c9861b920b3bf0d9a955f1e72af60681f48d55589fa0cfebc034b2', 41, 1, 'MyApp', '[]', 0, '2018-09-10 17:39:20', '2018-09-10 17:39:20', '2019-09-10 10:39:20'),
('e8804ca86148fba9acd8de538f6d8c54f2ba462b9396374ce0e33bcf9a4d439e6891a87cc9f34746', 31, 1, 'MyApp', '[]', 0, '2018-09-13 22:25:44', '2018-09-13 22:25:44', '2019-09-13 15:25:44'),
('e93aab8808b94ae856a21c06ec3990b520beda619347e5f4e435f9cc49c88bcc35e88d64bc3bdb7a', 123, 1, 'MyApp', '[]', 0, '2019-01-07 23:37:38', '2019-01-07 23:37:38', '2020-01-07 16:37:38'),
('e94f8107b3528e9da177f424572c3c22aeb1abcbb985cca3670cf8da1c8d5160a60f5b709b8d183b', 127, 1, 'MyApp', '[]', 0, '2019-06-18 00:06:48', '2019-06-18 00:06:48', '2020-06-17 17:06:48'),
('e981f5baad7bbce12b90f1358b7442fb7e5e5ef57d7a2e806f550784aaf7583ce80646e77233090d', 162, 1, 'MyApp', '[]', 0, '2019-02-22 05:04:42', '2019-02-22 05:04:42', '2020-02-21 22:04:42'),
('e9e63a45b1cccecbcdaaa80012f1e722dee337a4c2497a4460b929c9e3c7a24349bf99ebcf737867', 37, 1, 'MyApp', '[]', 0, '2018-09-05 19:16:56', '2018-09-05 19:16:56', '2019-09-05 12:16:56'),
('e9ea5715afe4e58988b574ae54b0e8cc26c123b67415d821c4bb98398961aa3ba7234deee8aebd64', 205, 1, 'MyApp', '[]', 0, '2019-06-28 20:00:10', '2019-06-28 20:00:10', '2020-06-28 13:00:10'),
('ea439a0279d904c08297ce570867403967da56da6478a164955e3e13e61e0187ce632b364f5ce29d', 102, 1, 'MyApp', '[]', 0, '2018-11-26 18:17:13', '2018-11-26 18:17:13', '2019-11-26 11:17:13'),
('ea6ec69f3df39e2d376266c68b6757d88f275d6b420c3db2536c32caee642e43c94c149ed48656c6', 199, 1, 'MyApp', '[]', 0, '2019-07-23 10:41:33', '2019-07-23 10:41:33', '2020-07-23 10:41:33'),
('ea71f5e6aa63b8743ab22454c4afe8bbcfe021a5256c0c193802d5b58112c31017ff5980e586dfb8', 182, 1, 'MyApp', '[]', 0, '2019-03-03 06:41:50', '2019-03-03 06:41:50', '2020-03-02 23:41:50'),
('eab459c5de95dc6b973eb99f23f770273aa1314804f415f7da3025df2eeff9d4e787025cf927b4f6', 102, 1, 'MyApp', '[]', 0, '2018-11-26 18:25:19', '2018-11-26 18:25:19', '2019-11-26 11:25:19'),
('eac9be1fe7f26fa15974f8f48e4992fb115d0973d60cdbc2eb6d8b993493521b304bbf4b610d776a', 127, 1, 'MyApp', '[]', 0, '2019-06-12 01:20:06', '2019-06-12 01:20:06', '2020-06-11 18:20:06'),
('eb485441406d21f8baa75fdd8d008a40a3b6f19a7fc4e778f9f5beead94c4477b85d21541be0d535', 32, 1, 'MyApp', '[]', 0, '2018-09-17 19:25:26', '2018-09-17 19:25:26', '2019-09-17 12:25:26'),
('eb622a75ca3cdafc58e9e5a82f4c5b6c01ebfef0ed666fd19488bbeee422d1671c1e38c036799f98', 40, 1, 'MyApp', '[]', 0, '2018-09-08 18:11:37', '2018-09-08 18:11:37', '2019-09-08 11:11:37'),
('ebc9bf12de0b4758041b66fb6027a69372cd7ab8b09d2dc1d61a11fba72c01009c8febeebbb2a77b', 87, 1, 'MyApp', '[]', 0, '2019-01-17 21:44:41', '2019-01-17 21:44:41', '2020-01-17 14:44:41'),
('ebe6eecec9f65a958e1df806f2598775f76864657432076c769f71ece24fe18dddfb7dc503223d7d', 32, 1, 'MyApp', '[]', 0, '2018-09-13 20:25:07', '2018-09-13 20:25:07', '2019-09-13 13:25:07'),
('ebf37e33c43121170b6be2cc65eb372586aa387d2845dc67d8f9c678e8dd6c925291e407b3f2a959', 74, 1, 'MyApp', '[]', 0, '2018-10-11 17:50:45', '2018-10-11 17:50:45', '2019-10-11 10:50:45'),
('ec3a9cfb4b1f23076ce6c4720248c9cf8007945f99f7b23b9752acf3e1be9b8fb72271be0c39327c', 32, 1, 'MyApp', '[]', 0, '2018-09-24 22:09:17', '2018-09-24 22:09:17', '2019-09-24 15:09:17'),
('ec416601e766b770592f8fd0a757ff3762e2b064fefc54f175b3188cbc108a54782440fed9a594af', 36, 1, 'MyApp', '[]', 0, '2018-09-25 23:14:25', '2018-09-25 23:14:25', '2019-09-25 16:14:25'),
('ecf6b4dde49f5823e176377735613eb17371db11e1c1b01cec06d0c92365879c42eb25d2f47d4468', 177, 1, 'MyApp', '[]', 0, '2019-07-17 11:43:17', '2019-07-17 11:43:17', '2020-07-17 11:43:17'),
('ed0ac4d5737bede8c95339153fa80b007561edaff0a3c259b5cc2eadd151a9b87257690948ec129c', 177, 1, 'MyApp', '[]', 0, '2019-07-01 06:52:18', '2019-07-01 06:52:18', '2020-07-01 06:52:18'),
('ed2b4f0e8ef631ef6e33041f0457bca053397e2521656daf32d6647381ea5ea4e3e0279aa4077c8b', 127, 1, 'MyApp', '[]', 0, '2019-06-23 00:03:45', '2019-06-23 00:03:45', '2020-06-22 17:03:45'),
('ed3e8c6127d6fc13af2a7ca88042851348ad5e88260443b6ec2d01c51f71fa8ae9d7283ea7564ee3', 127, 1, 'MyApp', '[]', 0, '2019-05-14 18:43:14', '2019-05-14 18:43:14', '2020-05-14 11:43:14'),
('ed6b1f2eba5c05abc2de001a314f800b8a8f1012bf8be126eee2a44ce970e9537836d6f1c72ed52f', 173, 1, 'MyApp', '[]', 0, '2019-02-23 00:25:12', '2019-02-23 00:25:12', '2020-02-22 17:25:12'),
('ede3a5245723f5e5646a36cc36179b309627894b561526cd76b33e157bceea8fe34b60c27905f7fe', 30, 1, 'MyApp', '[]', 0, '2018-09-07 00:44:38', '2018-09-07 00:44:38', '2019-09-06 17:44:38'),
('ee71ea9b789f88fdac4c927598fd04c9ddb4f13f67f32d5111f55fd84a494b4e13ca570dfeb7e6c6', 87, 1, 'MyApp', '[]', 0, '2018-12-22 20:50:26', '2018-12-22 20:50:26', '2019-12-22 13:50:26'),
('eedb700dd0584984ee1032c3b39963b45b618ad50ec35235fcbd2a31c797ee282a9c508e4ca38126', 114, 1, 'MyApp', '[]', 0, '2018-12-20 11:58:06', '2018-12-20 11:58:06', '2019-12-20 04:58:06'),
('ef5135dba6f6adb933dff215bc0dd45d06b1ac1b9291c69b6a3064380eb33ed523061d6344f7a505', 36, 1, 'MyApp', '[]', 0, '2018-09-13 20:29:56', '2018-09-13 20:29:56', '2019-09-13 13:29:56'),
('efb9ea3d922608b0db84e56e21a20d3491f29558769dc0808d9e7513f6b961e7458a3b0e69054414', 121, 1, 'MyApp', '[]', 0, '2019-01-04 15:03:21', '2019-01-04 15:03:21', '2020-01-04 08:03:21'),
('efc5d215cb595cd356c11847b83366c111313ac8281d8e7b316d0cd5bdc669ca930972bb1df9921d', 82, 1, 'MyApp', '[]', 0, '2018-10-26 18:53:01', '2018-10-26 18:53:01', '2019-10-26 11:53:01'),
('efe5dd1733d7a0ef67e2b9efc08d3728aae7290da6187c4e4581e11d889348d25689e51ef8749332', 30, 1, 'MyApp', '[]', 0, '2018-10-08 21:02:42', '2018-10-08 21:02:42', '2019-10-08 14:02:42'),
('f0168c4694eb6b83bdcf872dbc65e18c65843ea43f4865ca752cf7232e34228d314a0fa8222b8b82', 127, 1, 'MyApp', '[]', 0, '2019-02-11 18:14:38', '2019-02-11 18:14:38', '2020-02-11 11:14:38'),
('f0887959fab8a20020dffbd0d2ba0257c94fbce800c805b8356a3522b8dbecef95adad72e4965ee4', 127, 1, 'MyApp', '[]', 0, '2019-07-23 10:21:15', '2019-07-23 10:21:15', '2020-07-23 10:21:15'),
('f0cc4e684ddd345791765bf82b9c0cdceacfd65e93513d2a29c5525f40dacc27fa4e79b107de4629', 127, 1, 'MyApp', '[]', 0, '2019-02-13 21:53:51', '2019-02-13 21:53:51', '2020-02-13 14:53:51'),
('f0f167b5fb3684727507ffef0e81faadfe5c598002ed9ad5d345137059dc432503eb29bce3457bad', 30, 1, 'MyApp', '[]', 0, '2018-11-11 18:45:46', '2018-11-11 18:45:46', '2019-11-11 11:45:46'),
('f1073aa3579459ec50a87aa8f966b8530d34d2185ac794a8c8e7653e8d3a1dd5853aedae66d460c8', 127, 1, 'MyApp', '[]', 0, '2019-03-23 17:24:47', '2019-03-23 17:24:47', '2020-03-23 10:24:47'),
('f129e98947113324819eff37fa1a445d37d93c93ba190b6dad3b3e03afb6ac8d138e1d75307fb99a', 177, 1, 'MyApp', '[]', 0, '2019-07-23 10:29:53', '2019-07-23 10:29:53', '2020-07-23 10:29:53'),
('f130c4371df18f53c87a7272f5bc8d2f054bd7a53261c3abd0ff8b20fd9bd3c2c51a23642a883e2b', 31, 1, 'MyApp', '[]', 0, '2018-09-19 01:13:42', '2018-09-19 01:13:42', '2019-09-18 18:13:42'),
('f178dd66594056e1e8c47954c7818b12c9536f77806fe3a2d96d923f3ea52c8e26b8252f4fb31eee', 36, 1, 'MyApp', '[]', 0, '2018-09-30 01:59:51', '2018-09-30 01:59:51', '2019-09-29 18:59:51'),
('f18f82d81e06af7d126f6f8765e4bd214015317f1811eeaa0a42cebdf4992a196bcd5d74cc3bca2e', 75, 1, 'MyApp', '[]', 0, '2019-01-16 21:41:22', '2019-01-16 21:41:22', '2020-01-16 14:41:22'),
('f1aceab9823d04ae7bed887f5cfba372dfa9984030ef07c82e2f48ce74c87cd1954d07f5ae3e71e5', 36, 1, 'MyApp', '[]', 0, '2018-09-13 20:29:34', '2018-09-13 20:29:34', '2019-09-13 13:29:34'),
('f1ae41606f4541b208d4d206bdd73091de1edfa756a44bb301fc2305c5d9a119a00884ba03075562', 36, 1, 'MyApp', '[]', 0, '2018-09-17 17:41:27', '2018-09-17 17:41:27', '2019-09-17 10:41:27'),
('f2595a4f4f4d560ee1735e72e7080935e7b7fe50a24ee0cfc5f3d8f21a5f7a775485f9e9f39ce0e0', 64, 1, 'MyApp', '[]', 0, '2018-10-06 17:30:44', '2018-10-06 17:30:44', '2019-10-06 10:30:44'),
('f36419b33b80f848ab437c3c06bf12420eb27e7958af18f4b500dab394ed23159086c45fed01e8a2', 127, 1, 'MyApp', '[]', 0, '2019-02-13 21:57:40', '2019-02-13 21:57:40', '2020-02-13 14:57:40'),
('f3b5ae72bb907d70d2b07ac573f9ea367f69ba6f843f59235470c813a6aacef608707ad6939cf567', 127, 1, 'MyApp', '[]', 0, '2019-07-22 05:51:20', '2019-07-22 05:51:20', '2020-07-22 05:51:20'),
('f3e9cc71d34782109f089cb43c7cfcdf62e6eab935861968d5dc7b2aacffa9af63b9689d48e1244f', 39, 1, 'MyApp', '[]', 0, '2018-09-12 00:31:43', '2018-09-12 00:31:43', '2019-09-11 17:31:43'),
('f4135f08f5a7fb4d387cca8402716aa58e313f29a4f0c9f0771e4309d39875a20ac6fe172251b90f', 36, 1, 'MyApp', '[]', 0, '2018-09-13 22:04:38', '2018-09-13 22:04:38', '2019-09-13 15:04:38'),
('f47e8f820de63e7f7eb71258a37ea7a0b7efac117827a30dc9bf437ebd59e36984f969288bff73be', 102, 1, 'MyApp', '[]', 0, '2018-11-22 01:16:12', '2018-11-22 01:16:12', '2019-11-21 18:16:12'),
('f4aa5971c1232219c85256034c0a64f0dc363619289a4df408689f1daabced2697d789e89944e0d6', 84, 1, 'MyApp', '[]', 0, '2018-10-29 14:23:33', '2018-10-29 14:23:33', '2019-10-29 07:23:33'),
('f4b15c5d36e90afbeed5de2bd52215eba4a53f2af5584a7da695f98eeb57e077a8f49972fac97bfa', 127, 1, 'MyApp', '[]', 0, '2019-07-29 09:11:09', '2019-07-29 09:11:09', '2020-07-29 09:11:09'),
('f4c01da671489ccff4e8d0823f8907e8dd810fe2bf060c142004b057a7e3d5d8f107c53e8cc5130c', 127, 1, 'MyApp', '[]', 0, '2019-07-23 10:10:47', '2019-07-23 10:10:47', '2020-07-23 10:10:47'),
('f5bb1db3864d126f68d585b5f5dac3e22af9e33a767b86964d82d5665865b5b6f5eb3dd1b23924f8', 127, 1, 'MyApp', '[]', 0, '2019-06-24 18:34:10', '2019-06-24 18:34:10', '2020-06-24 11:34:10'),
('f5ebf5b58e86209c607e9b6a6505247c21dd41634fbce29588b8c79eeb718759f46ab7bcbea2517e', 32, 1, 'MyApp', '[]', 0, '2018-09-06 19:31:16', '2018-09-06 19:31:16', '2019-09-06 12:31:16'),
('f61436fa8bea736042a01a2d44b55b5cc1affa523bc8fd482d6058cab2857c604eea80ac5c7cb5f6', 113, 1, 'MyApp', '[]', 0, '2018-12-18 01:44:16', '2018-12-18 01:44:16', '2019-12-17 18:44:16'),
('f6939c4bb752b200e071edac412d5de84ee55c462aa607a778bfb5e79c09c5755c65ec7edd61f913', 87, 1, 'MyApp', '[]', 0, '2019-01-13 01:13:14', '2019-01-13 01:13:14', '2020-01-12 18:13:14'),
('f69e8ca0f6fbc312f3396b36b4915ae8752db1ef5f480ae11ca8c0eae2f18bf00609452745b0be51', 35, 1, 'MyApp', '[]', 0, '2018-09-04 00:07:58', '2018-09-04 00:07:58', '2019-09-03 17:07:58'),
('f6be9cf1b3f604cd430710dc712a7a9fa66605ddbd7c09f089ff8bab1d63bcb84a5c7720639dbad3', 30, 1, 'MyApp', '[]', 0, '2018-09-25 23:20:46', '2018-09-25 23:20:46', '2019-09-25 16:20:46'),
('f6cb9e6276d33f29e48be4d7657f45238d4de10879b0dc5eb9e02f4a3084e9447bc7416107a2bf33', 145, 1, 'MyApp', '[]', 0, '2019-02-07 15:57:59', '2019-02-07 15:57:59', '2020-02-07 08:57:59'),
('f767f69cdd296441cbcdf34767caf951f26a07e2ff18a7a08895df95a353fdf4f23ba38b03cf14e8', 158, 1, 'MyApp', '[]', 0, '2019-02-17 03:40:52', '2019-02-17 03:40:52', '2020-02-16 20:40:52'),
('f784e9f3823ac1c5be222a73d14b039b9cc234ed413b3588387ca587ae5619c62ad41d215b81d792', 87, 1, 'MyApp', '[]', 0, '2018-12-22 21:15:12', '2018-12-22 21:15:12', '2019-12-22 14:15:12'),
('f7fe7abeae09c3e0983a1cf40a99f754affeade209a730209dbd7a2e39786f99a45063e06fd2f7cd', 39, 1, 'MyApp', '[]', 0, '2018-09-07 21:06:31', '2018-09-07 21:06:31', '2019-09-07 14:06:31'),
('f8055ea9538b10f567d35c1cbc94c32f35fe44c42caa040cee933077f5559530fb6a05726cedb845', 177, 1, 'MyApp', '[]', 0, '2019-06-27 21:20:50', '2019-06-27 21:20:50', '2020-06-27 14:20:50'),
('f84531f61cf6ac7937453f9b81e5c5f7d480facf923cd7a40780527377cb7c89986fdca3907be8a2', 127, 1, 'MyApp', '[]', 0, '2019-07-19 11:34:59', '2019-07-19 11:34:59', '2020-07-19 11:34:59'),
('f8466c71dcb285f72793ba378492ddf006f1d1beb8952179295eac6ab7ae1a5f8959ca49cbe9790c', 32, 1, 'MyApp', '[]', 0, '2018-09-17 17:21:44', '2018-09-17 17:21:44', '2019-09-17 10:21:44'),
('f983eb7d23d008cedeabb299ffe6a25b7ed7308d296c9c8e41c3129f0b7bc356cb0af753deb3402e', 119, 1, 'MyApp', '[]', 0, '2018-12-29 05:35:29', '2018-12-29 05:35:29', '2019-12-28 22:35:29'),
('f984cb76bdcbc32c84dc42f5a6fb72253b9d3cfe406ed3809b3b6eb6dba547ec175733640294064d', 177, 1, 'MyApp', '[]', 0, '2019-07-29 08:35:54', '2019-07-29 08:35:54', '2020-07-29 08:35:54'),
('f9a7ef1ccde6828f752c268f1e60b22b3e92fb2d1038d33f58d3b8dc7cb0cad1fc8e723da6bd7f8e', 30, 1, 'MyApp', '[]', 0, '2019-04-04 17:06:32', '2019-04-04 17:06:32', '2020-04-04 10:06:32'),
('f9b4deb4bf086bf0defd912b2b56f7879a2ed6480ccd851b811b478646de84cee38336fca7541a29', 127, 1, 'MyApp', '[]', 0, '2019-02-13 21:36:25', '2019-02-13 21:36:25', '2020-02-13 14:36:25'),
('f9f447c6de04691986921de63f76cd134bc95bf0f653c73747305a099963664ef2e3252d58710d89', 32, 1, 'MyApp', '[]', 0, '2018-09-03 23:58:29', '2018-09-03 23:58:29', '2019-09-03 16:58:29'),
('fa838f4670a74fb90046693ed49b2b1bc89f0925abfff1e00d74739688ac224060f1875d9fdb127e', 100, 1, 'MyApp', '[]', 0, '2018-11-21 20:08:06', '2018-11-21 20:08:06', '2019-11-21 13:08:06'),
('fa8fcce25f315cb62cf9089ee4b559a6396788031e0bb6a6b565ae990cbe29164b4d38051877fc7c', 35, 1, 'MyApp', '[]', 0, '2018-09-06 19:24:40', '2018-09-06 19:24:40', '2019-09-06 12:24:40'),
('fb3dac9023dfff70ab9039523d4ef14850226904d2c7b61ba3b587754a75e8337a41f043c6a3906d', 127, 1, 'MyApp', '[]', 0, '2019-07-03 05:55:37', '2019-07-03 05:55:37', '2020-07-03 05:55:37'),
('fb4328a885c1ce9c88d1585e0c4df85f8e33095071519ee9b945f1f5fe8c727bea64036c5d8f40eb', 37, 1, 'MyApp', '[]', 0, '2018-09-24 20:23:06', '2018-09-24 20:23:06', '2019-09-24 13:23:06'),
('fbd5dfef2423bcedec2d0c45be97229e71fff7c14376a9b81c39d1326064d0c32041994d3ce25978', 37, 1, 'MyApp', '[]', 0, '2018-09-08 18:42:14', '2018-09-08 18:42:14', '2019-09-08 11:42:14'),
('fbda8cb0fd2407ed90d4cbc72908a0506bfb484affafe36798ed71c9cf552dc0b343ea7121785864', 32, 1, 'MyApp', '[]', 0, '2018-09-06 17:55:49', '2018-09-06 17:55:49', '2019-09-06 10:55:49'),
('fc539764b4c373c5e083bce479a7d180c91d0a5ab530e07a392dd4ed09ac7dbcda70701bcdb5d57b', 127, 1, 'MyApp', '[]', 0, '2019-03-20 18:13:00', '2019-03-20 18:13:00', '2020-03-20 11:13:00'),
('fc5ddc992564f9b5ea2b51076907259bef916552ea7cf097dfd9f5ec2676b1b7451c2279e3ca73f2', 31, 1, 'MyApp', '[]', 0, '2018-09-10 19:09:58', '2018-09-10 19:09:58', '2019-09-10 12:09:58'),
('fcdc3a139006edb7ef8131dfb04f1197514bccc2f7ae070fcff746720e0450ce664427154bb38b44', 32, 1, 'MyApp', '[]', 0, '2018-09-06 19:29:09', '2018-09-06 19:29:09', '2019-09-06 12:29:09'),
('fcde212b88d36d76f5ab1cafb3264b798f69ed18ca2c8b53f2c9846578c0d294dc0fc986eb25e141', 127, 1, 'MyApp', '[]', 0, '2019-06-27 21:17:04', '2019-06-27 21:17:04', '2020-06-27 14:17:04'),
('fced56bf41dcd72a89ee9d81ebe71e7e9e5ecb37d6486f18dbab64c30dea0a73c6c8f7c9de3007fd', 30, 1, 'MyApp', '[]', 0, '2019-01-16 21:41:39', '2019-01-16 21:41:39', '2020-01-16 14:41:39'),
('fd115eb2bbc05c422aa043f01dc43da7fb980caabf22784cd7fd80a3ed26060835309ef8590415bb', 32, 1, 'MyApp', '[]', 0, '2018-09-25 22:49:31', '2018-09-25 22:49:31', '2019-09-25 15:49:31'),
('fd244c965664ec1413fd54562b87db40c721d0de0f705f054be31fd9e57c8a087901a113579b4301', 200, 1, 'MyApp', '[]', 0, '2019-06-18 01:56:05', '2019-06-18 01:56:05', '2020-06-17 18:56:05'),
('fd2bf16f69eef372b968a4b69e9d05ecd9f4a70aa19207f672ff5590936a9d92f3ed9fa2d5652a60', 53, 1, 'MyApp', '[]', 0, '2018-10-01 19:20:17', '2018-10-01 19:20:17', '2019-10-01 12:20:17'),
('fdcf111e4de51792a2f8cc12446c2a4a2dc176aa1ba8320f1f94f7cd21b821c0ffb1c87c47c866af', 37, 1, 'MyApp', '[]', 0, '2018-09-19 18:26:59', '2018-09-19 18:26:59', '2019-09-19 11:26:59'),
('fddd3696f12f140bb7b02b8fec89bad94c61d429e91766ef603317d6c146615db08bf511620c4d66', 177, 1, 'MyApp', '[]', 0, '2019-08-05 12:58:52', '2019-08-05 12:58:52', '2020-08-05 12:58:52'),
('fdf7865430600c3bf321f8033646d3f9fed8214a634062aa73d35873fe6b4e437ed2a367cd9e8de4', 127, 1, 'MyApp', '[]', 0, '2019-07-25 09:13:02', '2019-07-25 09:13:02', '2020-07-25 09:13:02'),
('fe6cfda60e9dd34e01b8868c9f2895641a38fc0907be56ca7a00835c65898927be01309462a7b976', 32, 1, 'MyApp', '[]', 0, '2018-09-03 19:51:52', '2018-09-03 19:51:52', '2019-09-03 12:51:52'),
('fe758f3a2f13bc589be3fa459c85aeb5f074ed1b5a41f1b653ef6ee27b578b6a75dae9d2e1a13ee7', 32, 1, 'MyApp', '[]', 0, '2018-09-06 18:01:08', '2018-09-06 18:01:08', '2019-09-06 11:01:08'),
('fe7673445c6188dec167d73682cb801c50f9dffc7fb333ebdd3fa45c010bf5b7564c0e37adf55913', 108, 1, 'MyApp', '[]', 0, '2018-12-08 20:54:53', '2018-12-08 20:54:53', '2019-12-08 13:54:53'),
('fe987a98e671f1c45df70d7158ce8f79ff301e56d91f436cebc403d6aa90c953b9f2bfbae9526806', 35, 1, 'MyApp', '[]', 0, '2018-09-06 19:28:57', '2018-09-06 19:28:57', '2019-09-06 12:28:57'),
('fef029fc2f5f7fd662366760ee560b5578ce70fe8479b548944878f4d72ba1d5a72a3687157577a3', 32, 1, 'MyApp', '[]', 0, '2018-09-28 06:08:50', '2018-09-28 06:08:50', '2019-09-27 23:08:50'),
('ff8184ed2aa2f9cba0a53e0313a5bacfe5b38d685dc269326239a48ef803be6e702d0b41e4856442', 44, 1, 'MyApp', '[]', 0, '2018-09-28 01:59:54', '2018-09-28 01:59:54', '2019-09-27 18:59:54'),
('ff94bd29ebdbfcc08295369d6e57b3d2362b9e55f8d05fff4cdda354d3271d64db268c31ac2fd0f0', 192, 1, 'MyApp', '[]', 0, '2019-05-23 19:37:01', '2019-05-23 19:37:01', '2020-05-23 12:37:01'),
('ffcc20cccd3f297a0586dee8b6fe78fd45ffe10a89137f4196cd2850e81452040307b2f1b32cb2bc', 36, 1, 'MyApp', '[]', 0, '2018-09-13 18:02:27', '2018-09-13 18:02:27', '2019-09-13 11:02:27'),
('ffddc16c94cb3effd8f83157b5531dfc2828fbbf334e3c4a1ae070d093576e63492bdeb222d84838', 130, 1, 'MyApp', '[]', 0, '2019-01-13 01:55:20', '2019-01-13 01:55:20', '2020-01-12 18:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 1, NULL, NULL);

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
-- Table structure for table `panalistrefer`
--

CREATE TABLE `panalistrefer` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(1) NOT NULL,
  `panalist_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panalistrefer`
--

INSERT INTO `panalistrefer` (`id`, `user_id`, `panalist_id`, `status`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(62, 346, 336, 1, 'asdsadasdsaasdasdas', NULL, '2019-12-28 12:43:09', '2019-12-28 12:43:09'),
(63, 346, 336, 1, 'asd as asd asdd asdasd', NULL, '2019-12-28 12:44:25', '2019-12-28 12:44:25'),
(64, 347, 336, 1, 'sds ds', NULL, '2019-12-30 10:21:20', '2019-12-30 10:21:20'),
(65, 356, 336, 1, 'tst data', NULL, '2019-12-31 05:19:13', '2019-12-31 05:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `panelists`
--

CREATE TABLE `panelists` (
  `id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `expertise` int(10) NOT NULL,
  `city` int(10) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panelists`
--

INSERT INTO `panelists` (`id`, `name`, `expertise`, `city`, `phone_number`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(8, 'pooja', 12, 0, '9638523693', 'pooja@gmail.com', '$2y$10$1H2dIe2ZUhPEuIRcl927JOuXvdy1YnD777hBHETell3UMChFAC3Be', 0, '2019-11-09 10:10:44', '2019-11-12 18:19:07'),
(16, 'ressss', 3, 0, '7894561235', 'chintanhospital@gmail.com', '$2y$10$UDeuWG7X3x7Crh/agslGreibN5ueLKyCxBmQgHGbe6XS4b1Nfhplu', 1, '2019-11-09 10:42:58', '2019-11-09 11:57:20'),
(17, 'abc', 11, 0, '7894563212', 'abc@gmail.com', '$2y$10$5/0mH1whmLJiW2MyCKWaTOnxs7pEkYeYPG2LCuRIaN3qHgvi5vw4O', 1, '2019-11-09 17:44:00', '2019-11-09 17:44:00'),
(18, 'Dr Deepak Chhatbar', 11, 0, '7895648596', 'deepak@gmail.com', '$2y$10$iCmjJ.02mMZOJrQqH80dsuCT8KOr/YSML9XWQ0DBohjQMJqywe0W2', 1, '2019-11-12 12:44:54', '2019-11-12 12:44:54'),
(19, 'aaa', 17, 0, '9876543210', 'abc@gmail.com', '$2y$10$k4aQlrV9pNCfCzLwvmv1p.EmarGPvXMQDVBB4tu6b4iuyM2aiIL.2', 1, '2019-11-12 12:47:18', '2019-11-12 16:58:59'),
(23, 'avbc', 12, 0, '9638523693', 'abc@gmail.com', '$2y$10$/z8K.aTP3nvZJnL96gRsY.SZwq/kezwOUWPKUejGikKpqNMn6ERtK', 0, '2019-11-12 17:04:06', '2019-11-13 12:28:08'),
(25, 'dr. mehul', 6, 0, '7894561236', 'mehul@gmail.com', '$2y$10$.eFBTUbKwMM8pn/Q/IAE4OdC7oAcucBqJWdCzaMnCDW2fIZ6OTzNy', 0, '2019-11-12 17:08:56', '2019-11-12 18:35:12'),
(27, 'Mr. shah', 6, 2, '8989889743', 'demodemo1384+75@gmail.com', '$2y$10$pwEnlTfy3ZrfgiGuar43.OcSk/ZpXLWAaxmFeSWZIWwK.T.omB7lS', 0, '2019-11-12 18:22:04', '2019-11-29 10:51:13'),
(29, 'test', 6, 2, '1212121212', 'a@gmail.com', '$2y$10$1lDkO8Fo3iUD7holQGX9gueCa61DH.vr5QE/a.yZSvWR28tMzxVHK', 1, '2019-11-25 12:41:40', '2019-11-29 10:51:04'),
(30, 'rehan', 13, 2, '4545454545', 'c@gmail.com', '$2y$10$l.qNJX2ZESAONDUF77j0geCCIjw4JyOowHGckDMiW4PeBw5Y477VG', 1, '2019-11-29 17:14:10', '2019-11-29 17:14:10'),
(31, 'ffff', 6, 2, '3242434324', 'pan@gmail.com', '$2y$10$v4CS2Vlg.IK1HSCXJZ2JpuqQRI.rur95aj02cBKAYK/HoDXfhcb3K', 1, '2019-12-28 07:23:22', '2019-12-28 07:23:22'),
(32, 'sdadsa', 6, 2, '2342342343', 'gggg@gmail.com', '$2y$10$qqdGp6pQZVOuSCIaSJwhAOA8V9xsKoKlLbhQyvSbdQEI/cSloEmV2', 1, '2019-12-28 07:24:22', '2019-12-28 07:24:22'),
(33, 'sdf', 6, 3, '5434535345', 'test.admin@gmail.com', '$2y$10$byyr7k0fcLsezGKm/1xnGumr6VjIkdMYHtkCfg16SeBOHItUca5Hu', 1, '2019-12-28 07:25:01', '2019-12-28 07:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `patient_detail`
--

CREATE TABLE `patient_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `clinic_id` int(10) NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `gender` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `marital_status` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` int(10) UNSIGNED DEFAULT NULL,
  `height` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height_in_feet` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height_in_inches` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bmi` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_detail`
--

INSERT INTO `patient_detail` (`id`, `clinic_id`, `patient_id`, `gender`, `dob`, `marital_status`, `city`, `height`, `height_in_feet`, `weight`, `height_in_inches`, `bmi`, `blood_group`, `age`, `profile_pic`, `status`, `created_at`, `updated_at`) VALUES
(9, 0, 45, 'Female', '0000-00-00', 'Married', 1, '1.65', NULL, '61.0', NULL, '22.41', 'B+', NULL, NULL, 1, '2018-09-27 03:23:16', '2018-09-27 03:23:16'),
(10, 0, 46, 'Female', '0000-00-00', 'Married', 1, '1.52', NULL, '65.0', NULL, '28.13', NULL, NULL, NULL, 1, '2018-09-27 03:23:49', '2018-09-27 03:23:49'),
(11, 0, 47, 'Female', '0000-00-00', 'Unmarried', 1, '5.4', NULL, '55.0', NULL, '1.89', 'A+', NULL, 'patient/SCRQO2gajiSU6ycPxisOyBuAGRfEHSxkNOkDVrBp.jpeg', 1, '2018-09-27 22:04:48', '2018-09-29 18:57:54'),
(14, 0, 50, 'Female', '0000-00-00', 'Unmarried', 2, '5.0', NULL, '45.0', NULL, '1.80', 'B+', NULL, NULL, 1, '2018-09-28 22:11:10', '2018-09-28 22:11:10'),
(15, 0, 51, 'Female', '0000-00-00', 'Married', 1, '5.0', NULL, '60.0', NULL, '2.40', 'B+', NULL, NULL, 1, '2018-09-28 22:36:18', '2018-09-28 22:36:18'),
(16, 0, 57, 'Female', '0000-00-00', 'Unmarried', 1, '5.5', NULL, '61.0', NULL, '2.02', NULL, NULL, NULL, 1, '2018-10-01 06:49:01', '2018-10-01 06:49:01'),
(19, 0, 65, 'Male', '0000-00-00', 'Married', 1, '5.9', NULL, '80.0', NULL, '2.30', NULL, NULL, NULL, 1, '2018-10-06 03:06:57', '2018-10-06 03:06:57'),
(21, 0, 68, 'Male', '0000-00-00', 'Unmarried', 2, '172.0', NULL, '78.0', NULL, '0.00', NULL, NULL, NULL, 1, '2018-10-09 02:45:27', '2018-10-09 02:45:27'),
(22, 0, 69, 'Male', '0000-00-00', 'Unmarried', 7, '6.2', NULL, '75.0', NULL, '1.95', 'B+', NULL, NULL, 1, '2018-10-09 22:47:21', '2018-10-09 22:47:21'),
(24, 0, 76, 'Female', '0000-00-00', 'Married', 1, '1.58', NULL, '80.0', NULL, '32.05', 'B+', NULL, NULL, 1, '2018-10-13 19:03:41', '2018-10-13 19:03:41'),
(25, 0, 77, 'Male', '0000-00-00', 'Married', 1, '1.727', NULL, '85.0', NULL, '28.50', 'AB+', NULL, NULL, 1, '2018-10-14 05:16:31', '2018-10-14 05:16:31'),
(26, 0, 78, 'Female', '0000-00-00', 'Unmarried', 1, '1.5', NULL, '50.0', NULL, '22.22', 'B+', NULL, NULL, 1, '2018-10-14 20:23:00', '2018-10-14 20:23:00'),
(27, 0, 79, 'Female', '0000-00-00', 'Married', 2, '154.0', NULL, '70.0', NULL, '0.00', 'B+', NULL, NULL, 1, '2018-10-15 05:21:37', '2018-10-15 05:21:37'),
(28, 0, 80, 'Male', '0000-00-00', 'Marital Status', 12, '68.0', NULL, '52.0', NULL, '0.01', 'O+', NULL, NULL, 1, '2018-10-19 16:07:27', '2018-10-19 16:07:27'),
(30, 0, 82, 'Male', '0000-00-00', 'Unmarried', 3, '155.0', NULL, '38.0', NULL, '0.00', 'O+', NULL, NULL, 1, '2018-10-26 18:52:54', '2018-10-26 18:52:54'),
(31, 0, 83, 'Female', '0000-00-00', 'Unmarried', 6, '4.8', NULL, '48.0', NULL, '2.08', 'O+', NULL, NULL, 1, '2018-10-28 00:37:19', '2018-10-28 00:37:19'),
(32, 0, 84, 'Female', '0000-00-00', 'Unmarried', 5, '4.11', NULL, '58.0', NULL, '3.43', 'B+', NULL, NULL, 1, '2018-10-29 14:23:26', '2018-10-29 14:23:26'),
(33, 0, 85, 'Male', '0000-00-00', 'Unmarried', 6, '5.5', NULL, '65.0', NULL, '2.15', 'A+', NULL, NULL, 1, '2018-10-29 17:08:30', '2018-10-29 17:08:30'),
(34, 0, 86, 'Male', '0000-00-00', 'Married', 5, '1.72', NULL, '69.0', NULL, '23.32', 'O+', NULL, NULL, 1, '2018-11-01 16:09:05', '2018-11-01 16:09:05'),
(36, 0, 90, 'Male', '0000-00-00', 'Unmarried', 5, '2.8', NULL, '54.0', NULL, '6.89', 'O+', NULL, NULL, 1, '2018-11-02 19:42:39', '2018-11-02 19:42:39'),
(37, 0, 91, 'Male', '0000-00-00', 'Married', 2, '0.13', NULL, '85.0', NULL, '5029.59', 'B+', NULL, NULL, 1, '2018-11-03 16:14:00', '2018-11-03 16:14:00'),
(38, 0, 92, 'Male', '0000-00-00', 'Unmarried', 7, '1.2', NULL, '56.0', NULL, '38.89', 'B+', NULL, NULL, 1, '2018-11-06 17:28:50', '2018-11-06 17:28:50'),
(39, 0, 93, 'Male', '0000-00-00', 'Married', 5, '5.1', NULL, '62.0', NULL, '2.38', 'O+', NULL, NULL, 1, '2018-11-08 17:00:08', '2018-11-08 17:00:08'),
(40, 0, 94, 'Male', '0000-00-00', 'Unmarried', 1, '1.65', NULL, '56.0', NULL, '20.57', 'B-', NULL, NULL, 1, '2018-11-11 19:08:13', '2018-11-11 19:08:13'),
(41, 0, 95, 'Male', '0000-00-00', 'Unmarried', 2, '5.0', NULL, '78.0', NULL, '3.12', 'B+', NULL, NULL, 1, '2018-11-12 19:59:22', '2018-11-12 19:59:22'),
(42, 0, 96, 'Male', '0000-00-00', 'Married', 5, '1.67', NULL, '62.0', NULL, '22.23', 'B+', NULL, NULL, 1, '2018-11-14 17:35:59', '2018-11-14 17:35:59'),
(43, 0, 97, 'Male', '0000-00-00', 'Unmarried', 3, '172.0', NULL, '63.0', NULL, '0.00', 'A+', NULL, NULL, 1, '2018-11-15 01:09:28', '2018-11-15 01:09:28'),
(44, 0, 98, 'Male', '0000-00-00', 'Unmarried', 5, '169.0', NULL, '95.0', NULL, '0.00', 'O+', NULL, NULL, 1, '2018-11-17 02:22:00', '2018-11-17 02:22:00'),
(45, 0, 99, 'Male', '0000-00-00', 'Unmarried', 1, '1.69', NULL, '65.0', NULL, '22.76', NULL, NULL, NULL, 1, '2018-11-19 03:16:36', '2018-11-19 03:16:36'),
(46, 0, 100, 'Male', '0000-00-00', 'Married', 1, '1.65', NULL, '98.0', NULL, '36.00', 'O+', NULL, 'patient/15Sb8mGDYcmcjrqkhS0sqN3QVSNo7frmc0BBuRNX.jpeg', 1, '2018-11-21 20:07:58', '2018-11-21 20:13:34'),
(47, 0, 101, 'Female', '0000-00-00', 'Married', 1, '1.5', NULL, '60.0', NULL, '26.67', 'B+', NULL, NULL, 1, '2018-11-21 20:32:07', '2018-11-21 20:32:07'),
(48, 0, 105, 'Male', '0000-00-00', 'Married', 1, '5.4', NULL, '60.0', NULL, '2.06', 'B+', NULL, 'patient/QLaxegWVVcBKaGGsxNgKyvhnETvQpK9uUgSqKL8O.jpeg', 1, '2018-12-02 05:13:23', '2018-12-02 05:16:32'),
(49, 0, 107, 'Male', '0000-00-00', 'Unmarried', 5, '182.0', NULL, '75.0', NULL, '0.00', 'O+', NULL, NULL, 1, '2018-12-08 14:51:53', '2018-12-08 14:51:53'),
(50, 0, 108, 'Male', '0000-00-00', 'Married', 1, '1.67', NULL, '70.0', NULL, '25.10', NULL, NULL, NULL, 1, '2018-12-08 20:54:46', '2018-12-08 20:54:46'),
(51, 0, 109, 'Male', '0000-00-00', 'Marital Status', 5, '55.0', NULL, '40.0', NULL, '0.01', 'A+', NULL, NULL, 1, '2018-12-13 00:08:52', '2018-12-13 00:08:52'),
(52, 0, 110, 'Female', '0000-00-00', 'Unmarried', 7, '150.0', NULL, '55.0', NULL, '0.00', 'B+', NULL, NULL, 1, '2018-12-16 02:03:12', '2018-12-16 02:03:12'),
(53, 0, 112, 'Female', '0000-00-00', 'Married', 10, '1.0', NULL, '72.0', NULL, '72.00', NULL, NULL, NULL, 1, '2018-12-17 23:13:43', '2018-12-17 23:13:43'),
(54, 0, 114, 'Male', '0000-00-00', 'Unmarried', 5, '5.6', NULL, '57.0', NULL, '1.82', 'AB+', NULL, NULL, 1, '2018-12-20 11:57:58', '2018-12-20 11:57:58'),
(55, 0, 115, 'Female', '0000-00-00', 'Married', 5, '155.0', NULL, '50.0', NULL, '0.00', 'A+', NULL, NULL, 1, '2018-12-24 02:59:56', '2018-12-24 02:59:56'),
(56, 0, 116, 'Male', '0000-00-00', 'Unmarried', 6, '160.0', NULL, '72.0', NULL, '0.00', NULL, NULL, NULL, 1, '2018-12-25 22:26:18', '2018-12-25 22:26:18'),
(57, 0, 117, 'Male', '0000-00-00', 'Married', 1, '165.0', NULL, '72.0', NULL, '0.00', NULL, NULL, NULL, 1, '2018-12-26 17:37:47', '2018-12-26 17:37:47'),
(58, 0, 118, 'Male', '0000-00-00', 'Unmarried', 5, '1.82', NULL, '65.0', NULL, '19.62', 'B+', NULL, NULL, 1, '2018-12-28 20:56:00', '2018-12-28 20:56:00'),
(59, 0, 119, 'Male', '0000-00-00', 'Unmarried', 4, '153.0', NULL, '50.0', NULL, '0.00', 'O+', NULL, NULL, 1, '2018-12-29 05:35:21', '2018-12-29 05:35:21'),
(60, 0, 120, 'Male', '0000-00-00', 'Marital Status', 2, '2.0', NULL, '75.0', NULL, '18.75', 'B+', NULL, NULL, 1, '2018-12-31 08:12:02', '2018-12-31 08:12:02'),
(61, 0, 121, 'Male', '0000-00-00', 'Married', 5, '167.0', NULL, '78.0', NULL, '0.00', 'O+', NULL, NULL, 1, '2019-01-04 15:03:13', '2019-01-04 15:03:13'),
(62, 0, 122, 'Male', '0000-00-00', 'Unmarried', 5, '175.0', NULL, '96.0', NULL, '0.00', 'A+', NULL, NULL, 1, '2019-01-06 02:00:00', '2019-01-06 02:00:00'),
(63, 0, 123, 'Female', '0000-00-00', 'Unmarried', 5, '152.0', NULL, '65.0', NULL, '0.00', 'AB-', NULL, NULL, 1, '2019-01-07 23:37:30', '2019-01-07 23:37:30'),
(64, 0, 124, 'Male', '0000-00-00', 'Unmarried', 5, '59.0', NULL, '50.0', NULL, '0.01', NULL, NULL, NULL, 1, '2019-01-12 05:59:52', '2019-01-12 05:59:52'),
(65, 0, 125, 'Male', '0000-00-00', 'Unmarried', 5, '5.1', NULL, '81.0', NULL, '3.11', 'O+', NULL, NULL, 1, '2019-01-12 15:00:36', '2019-01-12 15:00:36'),
(66, 0, 127, 'Female', '0000-00-00', 'Unmarried', 1, '5.2', NULL, '50.0', NULL, '1.85', 'B+', NULL, 'patient/0rR4jB8YTgG3f3Lck7y2rLQ8LG3koOkUZSkVEb70.jpeg', 1, '2019-01-12 23:48:57', '2019-08-06 11:30:09'),
(67, 0, 128, 'Male', '0000-00-00', 'Married', 1, '1.6', NULL, '60.0', NULL, '23.44', 'B+', NULL, NULL, 1, '2019-01-13 01:02:43', '2019-01-13 01:02:43'),
(70, 0, 131, 'Male', '0000-00-00', 'Unmarried', 10, '2.7', NULL, '56.0', NULL, '7.68', 'AB-', NULL, NULL, 1, '2019-01-13 02:19:59', '2019-01-13 02:19:59'),
(71, 0, 132, 'Male', '0000-00-00', 'Marital Status', 2, '171.0', NULL, '60.0', NULL, '0.00', 'B+', NULL, NULL, 1, '2019-01-18 02:43:50', '2019-01-18 02:43:50'),
(72, 0, 133, 'Male', '0000-00-00', 'Unmarried', 5, '174.0', NULL, '74.0', NULL, '0.00', 'O+', NULL, NULL, 1, '2019-01-19 01:54:18', '2019-01-19 01:54:18'),
(73, 0, 134, 'Male', '0000-00-00', 'Married', 5, '5.0', NULL, '50.0', NULL, '2.00', 'O+', NULL, NULL, 1, '2019-01-22 17:00:47', '2019-01-22 17:00:47'),
(74, 0, 135, 'Male', '0000-00-00', 'Married', 5, '1.7', NULL, '57.0', NULL, '19.72', 'B+', NULL, NULL, 1, '2019-01-27 15:14:52', '2019-01-27 15:14:52'),
(75, 0, 136, 'Female', '0000-00-00', 'Unmarried', 5, '5.0', NULL, '58.0', NULL, '2.32', 'AB+', NULL, NULL, 1, '2019-01-28 08:04:05', '2019-01-28 08:04:05'),
(76, 0, 137, 'Male', '0000-00-00', 'Marital Status', 5, '5.6', NULL, '54.0', NULL, '1.72', 'B+', NULL, NULL, 1, '2019-01-29 17:22:02', '2019-01-29 17:22:02'),
(77, 0, 138, 'Male', '0000-00-00', 'Unmarried', 5, '1.5', NULL, '40.0', NULL, '17.78', 'O+', NULL, NULL, 1, '2019-02-01 03:00:02', '2019-02-01 03:00:02'),
(78, 0, 139, 'Female', '0000-00-00', 'Married', 5, '1.5', NULL, '60.0', NULL, '26.67', 'O+', NULL, NULL, 1, '2019-02-02 03:53:34', '2019-02-02 03:53:34'),
(79, 0, 140, 'Male', '0000-00-00', 'Unmarried', 2, '172.0', NULL, '70.0', NULL, '0.00', 'B+', NULL, NULL, 1, '2019-02-02 21:35:11', '2019-02-02 21:35:11'),
(80, 0, 141, 'Female', '0000-00-00', 'Married', 4, '1.55', NULL, '50.0', NULL, '20.81', 'O+', NULL, NULL, 1, '2019-02-04 22:05:41', '2019-02-04 22:05:41'),
(81, 0, 142, 'Female', '0000-00-00', 'Unmarried', 5, '160.0', NULL, '160.0', NULL, '0.01', 'A+', NULL, NULL, 1, '2019-02-05 02:20:26', '2019-02-05 02:20:26'),
(82, 0, 143, 'Female', '0000-00-00', 'Unmarried', 4, '5.2', NULL, '44.0', NULL, '1.63', 'O+', NULL, NULL, 1, '2019-02-05 15:42:49', '2019-02-05 15:42:49'),
(83, 0, 145, 'Male', '0000-00-00', 'Marital Status', 1, '5.5', NULL, '73.0', NULL, '2.41', NULL, NULL, NULL, 1, '2019-02-07 15:57:52', '2019-02-07 15:57:52'),
(84, 0, 147, 'Male', '0000-00-00', 'Married', 5, '181.0', NULL, '110.0', NULL, '0.00', 'B-', NULL, NULL, 1, '2019-02-07 20:04:14', '2019-02-07 20:04:14'),
(85, 0, 149, 'Male', '0000-00-00', 'Unmarried', 7, '5.5', NULL, '45.0', NULL, '1.49', 'O+', NULL, NULL, 1, '2019-02-09 22:43:50', '2019-02-09 22:43:50'),
(86, 0, 151, 'Female', '0000-00-00', 'Married', 5, '5.2', NULL, '63.0', NULL, '2.33', 'O+', NULL, NULL, 1, '2019-02-10 00:44:08', '2019-02-10 00:44:08'),
(87, 0, 153, 'Male', '0000-00-00', 'Married', 6, '176.0', NULL, '72.0', NULL, '0.00', 'O+', NULL, NULL, 1, '2019-02-12 02:03:48', '2019-02-12 02:03:48'),
(89, 0, 156, 'Male', '0000-00-00', 'Unmarried', 5, '5.7', NULL, '76.0', NULL, '2.34', NULL, NULL, NULL, 1, '2019-02-14 00:29:23', '2019-02-14 00:29:23'),
(90, 0, 157, 'Male', '0000-00-00', 'Married', 5, '165.0', NULL, '80.0', NULL, '0.00', 'A+', NULL, NULL, 1, '2019-02-16 11:15:03', '2019-02-16 11:15:03'),
(91, 0, 158, 'Male', '0000-00-00', 'Married', 1, '17.0', NULL, '67.0', NULL, '0.23', 'B+', NULL, NULL, 1, '2019-02-17 03:40:45', '2019-02-17 03:40:45'),
(92, 0, 159, 'Male', '0000-00-00', 'Married', 12, '5.5', NULL, '58.0', NULL, '1.92', 'B+', NULL, NULL, 1, '2019-02-17 14:02:36', '2019-02-17 14:02:36'),
(93, 0, 161, 'Female', '0000-00-00', 'Unmarried', 5, '1.674', NULL, '67.0', NULL, '23.91', 'B-', NULL, NULL, 1, '2019-02-19 23:15:30', '2019-02-19 23:15:30'),
(94, 0, 162, 'Male', '0000-00-00', 'Marital Status', 5, '5.9', NULL, '120.0', NULL, '3.45', NULL, NULL, NULL, 1, '2019-02-22 05:04:35', '2019-02-22 05:04:35'),
(98, 0, 178, 'Male', '0000-00-00', 'Unmarried', 5, '5.2', NULL, '40.0', NULL, '1.48', 'B+', NULL, NULL, 1, '2019-02-24 15:57:08', '2019-02-24 15:57:08'),
(99, 0, 179, 'Male', '0000-00-00', 'Married', 5, '6.7', NULL, '75.0', NULL, '1.67', 'O+', NULL, NULL, 1, '2019-02-24 23:26:22', '2019-02-24 23:26:22'),
(100, 0, 180, 'Female', '0000-00-00', 'Unmarried', 5, '141.0', NULL, '38.0', NULL, '0.00', 'A+', NULL, NULL, 1, '2019-03-01 03:14:52', '2019-03-01 03:14:52'),
(101, 0, 181, 'Female', '0000-00-00', 'Unmarried', 12, '1.524', NULL, '50.0', NULL, '21.53', 'A+', NULL, NULL, 1, '2019-03-02 08:35:21', '2019-03-02 08:35:21'),
(102, 0, 182, 'Male', '0000-00-00', 'Married', 5, '180.0', NULL, '78.0', NULL, '0.00', 'B+', NULL, NULL, 1, '2019-03-03 06:41:44', '2019-03-03 06:41:44'),
(103, 0, 183, 'Female', '0000-00-00', 'Married', 5, '145.0', NULL, '61.0', NULL, '0.00', 'O+', NULL, NULL, 1, '2019-03-05 16:15:37', '2019-03-05 16:15:37'),
(104, 0, 184, 'Female', '0000-00-00', 'Married', 5, '5.0', NULL, '75.0', NULL, '3.00', 'B+', NULL, NULL, 1, '2019-03-07 07:30:28', '2019-03-07 07:30:28'),
(105, 0, 185, 'Male', '0000-00-00', 'Married', 2, '128.0', NULL, '59.0', NULL, '0.00', 'B+', NULL, NULL, 1, '2019-03-09 21:46:35', '2019-03-09 21:46:35'),
(106, 0, 186, 'Female', '0000-00-00', 'Married', 7, '1.44', NULL, '68.0', NULL, '32.79', 'A+', NULL, NULL, 1, '2019-03-10 06:53:19', '2019-03-10 06:53:19'),
(107, 0, 187, 'Male', '0000-00-00', 'Married', 2, '1.56', NULL, '56.0', NULL, '23.01', 'B+', NULL, NULL, 1, '2019-03-10 19:44:13', '2019-03-10 19:44:13'),
(108, 0, 188, 'Male', '0000-00-00', 'Unmarried', 5, '4.0', NULL, '59.0', NULL, '3.69', 'A+', NULL, NULL, 1, '2019-03-11 08:04:19', '2019-03-11 08:04:19'),
(109, 0, 189, 'Male', '0000-00-00', 'Married', 1, '5.7', NULL, '103.0', NULL, '3.17', 'B+', NULL, NULL, 1, '2019-03-12 05:47:43', '2019-03-12 05:47:43'),
(110, 0, 190, 'Male', '0000-00-00', 'Married', 5, '5.6', NULL, '50.0', NULL, '1.59', NULL, NULL, NULL, 1, '2019-03-14 06:30:55', '2019-03-14 06:30:55'),
(111, 0, 191, 'Male', '0000-00-00', 'Unmarried', 5, '5.7', NULL, '60.0', NULL, '1.85', NULL, NULL, NULL, 1, '2019-05-23 03:31:36', '2019-05-23 03:31:36'),
(112, 0, 192, 'Male', '0000-00-00', 'Unmarried', 5, '1.68', NULL, '78.0', NULL, '27.64', 'A-', NULL, NULL, 1, '2019-05-23 19:36:54', '2019-05-23 19:36:54'),
(114, 0, 194, 'Female', '0000-00-00', NULL, 12, '6.0', NULL, '50.0', NULL, '1.39', 'A+', NULL, NULL, 1, '2019-05-30 19:10:40', '2019-05-30 19:10:40'),
(115, 0, 195, 'Female', '0000-00-00', NULL, 1, '5.0', NULL, '50.0', NULL, '2.00', 'A+', NULL, NULL, 1, '2019-05-30 22:06:21', '2019-05-30 22:06:21'),
(116, 0, 196, 'Female', '0000-00-00', NULL, 1, '5.0', NULL, '45.0', NULL, '1.80', 'A+', NULL, NULL, 1, '2019-05-30 22:13:14', '2019-05-30 22:13:14'),
(117, 0, 197, 'Female', '0000-00-00', NULL, 1, '5.0', NULL, '45.0', NULL, '1.80', 'A+', NULL, NULL, 1, '2019-05-30 22:23:15', '2019-05-30 22:23:15'),
(118, 0, 198, 'Male', '0000-00-00', NULL, 1, '4.0', NULL, '60.0', NULL, '3.75', 'B+', NULL, NULL, 1, '2019-05-30 22:33:50', '2019-05-30 22:33:50'),
(120, 0, 200, 'Male', '0000-00-00', NULL, 12, '5.3', NULL, '50.0', NULL, '1.78', 'O-', NULL, NULL, 1, '2019-06-18 01:55:58', '2019-06-18 01:55:58'),
(121, 0, 201, 'Female', '0000-00-00', NULL, 1, '5.1', NULL, '70.0', NULL, '2.69', 'B+', NULL, 'patient/TsvrUuETQhCOrdfgMPPaJb6JKWiFjtuI1axZkdKO.jpeg', 1, '2019-06-20 15:12:54', '2019-07-22 09:05:40'),
(122, 0, 202, 'Male', '0000-00-00', NULL, 1, '6.1', NULL, '105.0', NULL, '2.82', 'A+', NULL, 'patient/OgbOLctqDtNqoFMp2F3GuE1ySkw1Uc1xiLl7PFoQ.jpeg', 1, '2019-06-27 17:51:39', '2019-06-28 06:44:53'),
(123, 0, 203, 'Male', '0000-00-00', 'Unmarried', 1, '5.5', NULL, '70.0', NULL, '2.31', 'O+', NULL, NULL, 1, '2019-06-27 20:15:02', '2019-06-27 20:15:02'),
(124, 0, 204, 'Male', '0000-00-00', 'Married', 1, '1.66', NULL, '65', NULL, '22.30', 'O+', NULL, NULL, 1, '2019-06-28 18:37:30', '2019-06-28 18:37:30'),
(125, 0, 205, 'Female', '0000-00-00', NULL, 1, '5.2', NULL, '45.0', NULL, '1.66', 'AB+', NULL, 'patient/zSGOtuFiVLaMbUdk2aq7UhSlWKMpBdY5f6qvLTtu.jpeg', 1, '2019-06-28 20:00:03', '2019-06-28 20:01:43'),
(126, 0, 206, 'Male', '0000-00-00', 'Married', 1, '1.66', NULL, '65', NULL, '22.30', 'O+', NULL, NULL, 1, '2019-06-28 21:26:58', '2019-06-28 21:26:58'),
(127, 0, 207, 'Male', '0000-00-00', 'Married', 1, '1.66', NULL, '65', NULL, '22.30', 'O+', NULL, NULL, 1, '2019-07-01 06:26:51', '2019-07-01 06:26:51'),
(128, 0, 208, 'Female', '0000-00-00', NULL, 12, '5.3', NULL, '40.0', NULL, '1.42', 'O+', NULL, 'patient/FlijaStUDFvntJtt2ALx6pOwq3N5nxAqvl74Yp3K.jpeg', 1, '2019-07-10 08:41:50', '2019-07-10 09:13:22'),
(129, 0, 209, 'Male', '0000-00-00', NULL, 1, '5.4', NULL, '45.0', NULL, '1.54', 'AB-', NULL, 'patient/I1RjrncbOFwZBqgqWXHI0ev0AQTcGeVMm2dkC0ZL.jpeg', 1, '2019-07-11 07:11:26', '2019-07-11 07:17:43'),
(130, 0, 210, 'Female', '0000-00-00', NULL, 4, '5.1', NULL, '45.0', NULL, '1.73', 'B+', NULL, 'patient/5RlJHtFmAX8fnt0qnfSRYKTiHEhVEsfqC3ZpOQ5R.jpeg', 1, '2019-07-11 10:51:50', '2019-07-11 10:52:52'),
(131, 0, 213, 'Female', '0000-00-00', NULL, 1, '5.4', NULL, '45.0', NULL, '1.54', 'AB+', NULL, 'patient/D8tFHFiyQjbT2FNlI9fjOW2thaygPyKu3wVjIC7g.jpeg', 1, '2019-07-26 05:20:32', '2019-07-27 04:58:25'),
(132, 0, 218, 'Female', '0000-00-00', NULL, 12, '5.2', NULL, '45.0', NULL, '1.66', 'O+', NULL, NULL, 1, '2019-08-08 10:44:30', '2019-08-08 10:44:30'),
(135, 230, 237, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '35', NULL, 1, '2019-11-25 18:20:09', '2019-11-25 18:21:40'),
(138, 234, 241, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', '', 1, '2019-11-28 12:53:57', '2019-11-28 12:53:57'),
(142, 234, 249, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', '', 1, '2019-11-28 17:24:32', '2019-11-28 17:24:32'),
(143, 234, 250, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30', 'profile/vUpnfQp1RHj77LKENsMKf0Pa7PbtMphg0ikx6hXe.png', 1, '2019-11-28 17:48:05', '2019-11-28 17:48:05'),
(144, 234, 253, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30', '', 1, '2019-11-28 17:52:34', '2019-11-28 17:52:34'),
(145, 234, 256, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '35', '', 1, '2019-11-29 17:46:18', '2019-11-29 17:46:18'),
(146, 254, 258, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21', '', 1, '2019-11-29 17:54:03', '2019-11-29 17:54:03'),
(147, 260, 261, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', 'profile/mEgeelLtVtoSrX2qlQHJPqWQLdsVZehwOP6pRm2A.jpeg', 1, '2019-12-02 12:46:19', '2019-12-02 14:47:56'),
(148, 259, 263, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30', 'profile/vagy2EBSj9z6t2ijZj6UXSh6tJdhHrzZzGUhnfpW.png', 1, '2019-12-02 14:39:55', '2019-12-02 14:45:30'),
(149, 260, 271, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', '', 1, '2019-12-02 18:22:35', '2019-12-02 18:22:35'),
(150, 260, 272, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '33', 'profile/V8DnD9E6OJXFXgz3tAjPzqulzf3kvlrf5Al88AFN.jpeg', 1, '2019-12-02 18:47:13', '2019-12-02 18:47:13'),
(152, 281, 284, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25', '', 1, '2019-12-05 12:44:08', '2019-12-05 12:44:08'),
(154, 274, 287, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30', '', 1, '2019-12-05 15:42:54', '2019-12-05 15:42:54'),
(158, 274, 293, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '36', '', 1, '2019-12-06 14:25:50', '2019-12-06 14:25:50'),
(159, 274, 294, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '26', '', 1, '2019-12-06 16:05:15', '2019-12-06 16:05:15'),
(167, 274, 305, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21', '', 1, '2019-12-09 17:21:17', '2019-12-09 17:21:17'),
(170, 309, 311, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '38', NULL, 1, '2019-12-09 21:19:27', '2019-12-09 21:28:45'),
(171, 315, 317, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25', '', 1, '2019-12-12 14:22:43', '2019-12-12 14:22:43'),
(172, 318, 319, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30', '', 1, '2019-12-12 14:36:02', '2019-12-12 14:36:02'),
(173, 318, 320, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30', 'profile/PPavuq8s2mYIlYuIACwhZ6agluloqTlPEfwQm1KE.jpeg', 1, '2019-12-12 14:40:53', '2019-12-12 14:40:53'),
(174, 274, 321, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', '', 1, '2019-12-12 14:50:46', '2019-12-12 14:50:46'),
(176, 281, 326, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '28', NULL, 1, '2019-12-19 10:29:28', '2019-12-23 11:35:20'),
(178, 274, 330, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30', '', 1, '2019-12-20 16:24:05', '2019-12-20 16:24:05'),
(179, 274, 331, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', '', 1, '2019-12-23 11:22:26', '2019-12-23 11:22:26'),
(180, 332, 335, 'male', NULL, NULL, NULL, '1.75', NULL, NULL, NULL, NULL, NULL, '44', 'profile/Q0CcZUiQDOE7L1cORz90a314nlwOh7hWxCwVGGJO.png', 1, '2019-12-25 04:56:28', '2019-12-25 04:56:28'),
(190, 336, 346, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '44', 'profile/BDrQBd2tjcFaqtlYHLvzqa9cG3G4zkAUJtm6E7LB.png', 1, '2019-12-26 12:27:04', '2019-12-26 12:27:04'),
(191, 336, 347, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '44', 'profile/LBebb7X2w5dvrisywv6ttvW6dIDervdbBqlJNoqW.png', 1, '2019-12-26 12:37:48', '2019-12-26 12:37:48'),
(192, 332, 355, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25', 'profile/rU5qAEen8XTmeomL1pHSmpS21Dj4UKlSlchhe6SW.png', 1, '2019-12-31 05:06:45', '2019-12-31 05:06:45'),
(193, 336, 356, 'male', '2020-01-01', 'single`', NULL, '1.75', NULL, '65', NULL, '212', NULL, '43', 'profile/9wusABQFyVwmPHqTeBMuYpM0gKOWjrybEEA4alk1.jpeg', 1, '2019-12-31 05:17:02', '2020-01-01 06:16:12'),
(194, 336, 357, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25', 'profile/Rui4SRhaTNGthrvGFVfbhxoZwfbi1WT453btvkM7.png', 1, '2019-12-31 06:27:50', '2019-12-31 06:27:50'),
(195, 332, 358, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25', 'profile/VF9adZp5ih7HplWt8Tg7eP5G0Zh8cJVn9quV47tW.png', 1, '2019-12-31 09:14:17', '2019-12-31 09:35:04'),
(196, 332, 359, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '32', '', 1, '2019-12-31 09:38:33', '2019-12-31 09:38:33'),
(197, 332, 360, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '26', 'profile/vAT1IAD2PH4pk1WRmuyUVHtBpJAU70PNkMugLeVI.png', 1, '2019-12-31 09:54:43', '2019-12-31 09:54:43'),
(198, 332, 362, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34', 'profile/xxmV2ODzU1mDR9LqaCk0VUcqK3RyrCRcUc1KB2dv.png', 1, '2020-01-01 07:04:50', '2020-01-01 07:04:50'),
(199, 332, 363, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '44', '', 1, '2020-01-01 07:25:52', '2020-01-01 07:25:52'),
(200, 332, 364, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '26', 'profile/FR0dX4luBZnIkRGmUFoXtmJC8Hy2m4e0SrgyiDHk.png', 1, '2020-01-01 11:18:40', '2020-01-01 11:18:40'),
(201, 332, 365, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25', 'profile/xCvEBHIQRYZm267KPZhGxAa95RvTTuL0s6JWkTPv.png', 1, '2020-01-01 12:54:36', '2020-01-01 12:54:36'),
(202, 336, 366, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '44', 'profile/Su3xPjN3WCMphAIOnkj1FJoHfRx5h4RDCOXfjhx3.png', 1, '2020-01-01 12:58:15', '2020-01-01 12:58:15'),
(203, 332, 367, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '43', 'profile/j7j9cZK1CHGrF2FIHxq2vLw7TtqMMfoFG6O9qXyz.png', 1, '2020-01-02 06:21:45', '2020-01-02 06:21:45'),
(204, 332, 368, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '66', NULL, 1, '2020-01-02 06:40:17', '2020-01-02 06:41:06'),
(205, 332, 369, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '33', 'profile/WDZa85qcMneqmWr804P6yomaILbdnpjxPy8rdHkH.png', 1, '2020-01-02 06:42:07', '2020-01-02 06:42:44'),
(206, 336, 370, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '41', 'profile/QdWmOdMxSAbji8vO9Q915UkQjPYwrZwwSdtj8UCv.png', 1, '2020-01-03 05:05:14', '2020-01-03 05:05:14'),
(207, 371, 376, 'male', '2020-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '44', 'profile/Fp4SygLsvqcYeFu4DbqETY1eARbTAmy31wLO7YTz.png', 1, '2020-01-03 06:35:41', '2020-01-03 06:35:41'),
(208, 371, 377, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '44', '', 1, '2020-01-03 06:36:13', '2020-01-03 06:36:13'),
(209, 371, 378, 'female', '1980-12-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, 1, '2020-01-03 06:36:41', '2020-01-10 07:35:26'),
(210, 371, 379, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '54', 'profile/GivGhQxkQS3e5TSyqIFAMHvTiLbnxUiNVbGDENgL.png', 1, '2020-01-03 06:52:12', '2020-01-03 06:52:12'),
(211, 332, 380, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '44', 'profile/1rUA31TCQ7zQHmnskf4P7626L0J0ipkuMFBhHZC6.png', 1, '2020-01-03 06:58:33', '2020-01-03 06:58:33'),
(212, 381, 383, 'male', '2019-02-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 1, '2020-01-03 07:02:06', '2020-01-07 10:36:02'),
(213, 381, 384, 'female', '2015-06-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'profile/0GUzz6B7Ztyyb6FvbO5B9q3DNkCfxGNCo9bAo0vk.png', 1, '2020-01-03 07:09:29', '2020-01-07 10:36:31'),
(214, 381, 385, 'male', '2010-06-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'profile/il9bNY7zMeeYWwcblaLe5uDnCnvGuKRCSC9iFoFm.png', 1, '2020-01-03 07:27:40', '2020-01-07 10:36:17'),
(215, 381, 388, 'male', '2019-02-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'profile/ULLJGUTGHbI0x42LJxDXRH0XbeXOgXVmJMQ7l7OB.png', 1, '2020-01-03 09:20:09', '2020-01-07 10:35:49'),
(216, 381, 389, 'male', '2010-06-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9', NULL, 1, '2020-01-03 12:09:17', '2020-01-07 10:34:42'),
(217, 381, 390, 'male', '2009-06-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'profile/WubL2d7J7JHBLoO7gbNbbLIsjtMlXqDyExkKddWH.png', 1, '2020-01-03 12:09:52', '2020-01-07 10:35:18'),
(218, 381, 391, 'male', '2011-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'profile/8LVNBrGJwCfbmxLZTD1zss2s0na5ramb0KNJ0wOq.png', 1, '2020-01-03 12:15:06', '2020-01-07 10:35:37'),
(219, 381, 392, 'male', '1980-02-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, 1, '2020-01-03 12:27:53', '2020-01-07 10:34:24'),
(220, 381, 393, 'male', '2011-04-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8', 'profile/8xAqEDaXb7cmxVIZ0O0FPzw5wuq8cKOJTGMmokkF.png', 1, '2020-01-07 09:32:34', '2020-01-07 10:18:21'),
(221, 381, 394, 'male', '2010-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9', 'profile/FVUY0tdr5T6V9Mg6Z08teEyFTllLeTlrHcrXPM5y.png', 1, '2020-01-07 10:32:39', '2020-01-07 10:32:39'),
(222, 332, 397, 'male', '2020-01-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '', 1, '2020-01-17 04:26:42', '2020-01-17 04:26:42'),
(223, 332, 398, 'male', '2020-01-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '', 1, '2020-01-17 04:28:42', '2020-01-17 04:28:42'),
(224, 332, 399, 'male', '2020-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '', 1, '2020-01-17 07:14:38', '2020-01-17 07:14:38'),
(225, 332, 400, 'male', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', '', 1, '2020-01-17 09:08:04', '2020-01-17 09:08:04'),
(226, 332, 403, 'male', '1955-12-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '64', '', 1, '2020-01-17 09:22:29', '2020-01-17 09:22:29'),
(227, 332, 404, 'male', '2010-12-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9', '', 1, '2020-01-17 10:05:23', '2020-01-17 10:05:23'),
(228, 332, 405, 'male', '2020-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '', 1, '2020-01-17 11:26:53', '2020-01-17 11:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosis`
--

CREATE TABLE `patient_diagnosis` (
  `id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_diagnosis`
--

INSERT INTO `patient_diagnosis` (`id`, `patient_id`, `doctor_id`, `diagnosis`, `year`, `status`, `created_at`, `updated_at`) VALUES
(2, 33, 35, 'test', '03 Sep,2018', 1, '2018-09-03 11:27:16', '2018-09-03 23:57:16'),
(3, 32, 35, 'tb', '01 Oct,2018', 1, '2018-10-01 09:02:37', '2018-10-01 21:32:37'),
(5, 42, 41, 'test only', '08 Sep,2018', 1, '2018-09-08 07:09:00', '2018-09-08 19:39:00'),
(7, 42, 41, 'test only', '08 Sep,2018', 1, '2018-09-08 07:09:00', '2018-09-08 19:39:00'),
(8, 30, 31, 'K/C/O DM, BP. Dx: Viral Pharyngitis', '09 Sep,2018', 1, '2019-02-05 08:06:44', '2019-02-05 20:36:44'),
(11, 32, 37, 'diabetes', '25 Sep,2018', 1, '2018-10-01 09:02:37', '2018-10-01 21:32:37'),
(13, 47, 31, 'Fever', '29 Sep,2018', 1, '2018-09-29 20:07:09', '2018-09-29 20:07:09'),
(16, 87, 102, 'tb', '17 Dec,2018', 1, '2018-12-17 06:15:42', '2018-12-17 18:45:42'),
(17, 30, 75, 'Food poisoning ', '10 Dec,2018', 1, '2019-02-05 08:06:44', '2019-02-05 20:36:44'),
(22, 199, 177, 'tb', '25 Jul,2019', 1, '2019-07-25 07:49:15', '2019-07-25 07:49:15'),
(24, 127, 177, 'tb', '26 Jul,2019', 1, '2019-07-26 07:04:06', '2019-07-26 07:04:06'),
(25, 213, 177, 'rest test', '27 Jul,2019', 1, '2019-07-27 05:22:09', '2019-07-27 05:22:09'),
(26, 201, 75, 'disrrhea', '31 Jul,2019', 1, '2019-07-31 12:28:12', '2019-07-31 12:28:12');

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
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_family_contact`
--

INSERT INTO `patient_family_contact` (`id`, `patient_id`, `member_name`, `relation`, `contact_number`, `status`, `created_at`, `updated_at`) VALUES
(5, 100, 'Shashi Sachdeva', 'mother', '9319101952', 1, '2018-11-21 20:11:11', '2018-11-21 20:11:11'),
(6, 127, 'kajal', 'friend', '9865320568', 1, '2019-02-19 01:09:59', '2019-02-19 01:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `patient_general_examination`
--

CREATE TABLE `patient_general_examination` (
  `id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `examination_id` varchar(255) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_general_examination`
--

INSERT INTO `patient_general_examination` (`id`, `doctor_id`, `patient_id`, `examination_id`, `notes`) VALUES
(3, 292, 175, '', 'sdasdsa'),
(4, 292, 175, '4', 'asasdsad'),
(5, 300, 169, '', 'sss'),
(6, 300, 174, '', 'safsfsfsd'),
(7, 300, 169, '', 'ffe'),
(8, 334, 368, '', 'asdsd'),
(9, 334, 368, '1', 'sfddsf'),
(10, 334, 368, '', 'asds'),
(11, 334, 368, '1', 'asdsa'),
(12, 334, 368, '2', 'asdasd'),
(13, 334, 368, '3,5,6', 'ddfg');

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_history`
--

CREATE TABLE `patient_health_history` (
  `id` int(10) NOT NULL,
  `problem_id` varchar(100) DEFAULT NULL,
  `patient_id` int(10) DEFAULT NULL,
  `smoking` varchar(100) DEFAULT NULL,
  `alcohol_drinking` varchar(100) DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_health_history`
--

INSERT INTO `patient_health_history` (`id`, `problem_id`, `patient_id`, `smoking`, `alcohol_drinking`, `allergies`, `status`, `created_at`, `updated_at`) VALUES
(6, '91,99,95,79,92,97,75,88,83', 47, '0', '0', NULL, 1, '2018-09-28 17:38:11', '2018-09-28 17:38:11'),
(8, '100,70,99,92,101', 57, '0', '0', NULL, 1, '2018-10-01 06:51:44', '2018-10-01 06:51:44'),
(9, NULL, 84, '0', '0', NULL, 1, '2018-10-29 14:25:47', '2018-10-29 14:25:47'),
(11, '77,88,99,78,100,80,70,71,72,83,73,84,85,86,76', 101, '0', '0', NULL, 1, '2018-11-21 20:43:54', '2018-11-21 20:43:54'),
(12, '77,88,99,78,100,101,80,91,70,81,71,82,72,83,94,73,84,95,85,86,76,98', 100, '0', '5', NULL, 1, '2018-11-21 20:47:34', '2018-11-21 20:47:34'),
(13, '77,88,91,70,92,71,93,83,73,84,95,85,96,86,76,87', 117, '0', '0', NULL, 1, '2018-12-26 17:39:51', '2018-12-26 17:39:51'),
(14, '75', 119, '0', '0', NULL, 1, '2018-12-29 05:38:31', '2018-12-29 05:38:31'),
(15, '73,74,75', 120, '0', '0', NULL, 1, '2018-12-31 08:12:50', '2018-12-31 08:12:55'),
(16, NULL, 137, '0', '0', NULL, 1, '2019-01-29 17:43:39', '2019-01-29 17:43:39'),
(17, '70,71', 127, '2', '3', 'sunlight,cold', 1, '2019-02-11 19:24:59', '2019-08-07 18:39:17'),
(18, '73,85', 183, '0', '0', NULL, 1, '2019-03-05 16:17:18', '2019-03-05 16:17:18'),
(19, '70,71,74,75', 197, '0', '0', '0', 1, '2019-05-30 22:29:52', '2019-05-30 22:29:52'),
(20, '70', 198, '0', '0', '0', 1, '2019-05-30 22:34:35', '2019-05-30 22:34:35'),
(21, NULL, 199, '0', '0', '0', 1, '2019-06-17 18:43:04', '2019-06-17 18:43:04'),
(22, '91,70,92,71,73', 200, '0', '0', 'dust', 1, '2019-06-18 01:56:15', '2019-08-08 10:38:36'),
(23, '79,90,91,71,72,83,94,84,73,85,74,96,86,97', 201, '0', '0', '0', 1, '2019-06-20 15:15:00', '2019-06-20 15:15:00'),
(24, '92,93,94,95,96,97', 202, '0', '0', '0', 1, '2019-06-27 17:53:33', '2019-06-27 17:53:33'),
(25, '7272', 205, '0', '0', '0', 1, '2019-06-28 20:00:38', '2019-06-28 20:00:38'),
(26, NULL, 208, '0', '0', '0', 1, '2019-07-10 08:42:09', '2019-07-10 08:42:09'),
(27, '79,76', 209, '0', '0', '0', 1, '2019-07-11 07:11:55', '2019-07-11 07:11:55'),
(28, '70', 210, '0', '0', '0', 1, '2019-07-11 10:52:23', '2019-07-11 10:52:23'),
(29, '91,70,92,71,73', 213, '0', '0', '0,dust', 1, '2019-07-26 05:21:09', '2019-08-07 18:59:35'),
(30, '88,91,70,92,71,73,85', 218, '0', '0', '0', 1, '2019-08-08 10:45:37', '2019-08-08 10:45:37'),
(31, '73,74,75', 335, '0', '0', NULL, 1, '2018-12-31 08:12:50', '2018-12-31 08:12:55'),
(32, '77,88,99,78,100,80,70,71,72,83,73,84,85,86,76', 356, '0', '0', NULL, 1, '2018-11-21 20:43:54', '2018-11-21 20:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_history_family`
--

CREATE TABLE `patient_health_history_family` (
  `id` int(11) NOT NULL,
  `patient_id` int(10) DEFAULT NULL,
  `problem_id` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_health_history_family`
--

INSERT INTO `patient_health_history_family` (`id`, `patient_id`, `problem_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 47, '6,5,18,14', 1, '2018-09-28 17:36:13', '2018-10-01 21:17:44'),
(7, 57, '25,14', 1, '2018-10-01 06:50:05', '2018-10-01 06:50:05'),
(10, 79, '6', 1, '2018-10-15 05:23:36', '2018-10-15 05:23:36'),
(11, 82, '25,10,5,14,19,13,27,6,31,16,12,28,4,20,17,32,22,29,21,11,24,26,23,15,30,18', 1, '2018-10-26 19:03:12', '2018-10-26 19:04:33'),
(13, 93, '23', 1, '2018-11-08 17:01:34', '2018-11-08 17:01:34'),
(14, 101, '4,6', 1, '2018-11-21 20:41:58', '2018-11-21 20:44:03'),
(15, 100, '23,13,4,5,6,10', 1, '2018-11-21 20:45:18', '2018-11-21 20:45:18'),
(16, 116, '13,4', 1, '2018-12-25 22:28:29', '2018-12-25 22:28:29'),
(17, 117, '5', 1, '2018-12-26 17:38:33', '2019-01-18 14:50:08'),
(18, 120, '25', 1, '2018-12-31 08:12:32', '2018-12-31 08:12:32'),
(19, 127, '1,12,24,20', 1, '2019-02-11 19:24:31', '2019-12-04 17:48:26'),
(20, 162, '6,10', 1, '2019-02-22 05:06:17', '2019-02-22 05:06:17'),
(21, 178, '2', 1, '2019-02-24 16:00:43', '2019-02-24 16:01:04'),
(22, 189, '10,6,5,4,26', 1, '2019-03-12 05:51:18', '2019-03-12 07:02:10'),
(23, 191, '24', 1, '2019-05-23 03:34:46', '2019-05-23 03:34:46'),
(24, 196, '1,2', 1, '2019-05-30 22:14:02', '2019-05-30 22:16:19'),
(25, 197, '1,2', 1, '2019-05-30 22:24:09', '2019-05-30 22:25:24'),
(26, 198, '1', 1, '2019-05-30 22:34:29', '2019-05-30 22:34:29'),
(27, 199, '25,5,6', 1, '2019-06-17 18:43:01', '2019-06-17 18:43:01'),
(28, 200, NULL, 1, '2019-06-18 01:56:13', '2019-08-08 10:39:08'),
(29, 201, '4,6,31,21', 1, '2019-06-20 15:14:59', '2019-06-20 15:14:59'),
(30, 202, '12,25,4,5,10', 1, '2019-06-27 17:53:32', '2019-06-27 17:53:32'),
(31, 205, '22', 1, '2019-06-28 20:00:37', '2019-06-28 20:00:37'),
(32, 205, '2', 1, '2019-06-28 20:00:37', '2019-06-28 20:00:37'),
(33, 208, NULL, 1, '2019-07-10 08:42:06', '2019-07-10 08:42:06'),
(34, 209, '1', 1, '2019-07-11 07:11:54', '2019-07-11 07:11:54'),
(35, 210, '5', 1, '2019-07-11 10:52:22', '2019-07-11 10:52:22'),
(36, 213, '11,6', 1, '2019-07-26 05:21:08', '2019-08-07 18:50:13'),
(37, 218, '25,6', 1, '2019-08-08 10:45:36', '2019-08-08 10:45:36'),
(356, 356, '25,14', 1, '2020-01-13 10:53:24', '2020-01-13 10:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_history_past`
--

CREATE TABLE `patient_health_history_past` (
  `id` int(10) NOT NULL,
  `patient_id` int(10) DEFAULT NULL,
  `problem_id` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_health_history_past`
--

INSERT INTO `patient_health_history_past` (`id`, `patient_id`, `problem_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 47, NULL, 1, '2018-09-28 17:36:40', '2018-09-28 17:36:41'),
(7, 82, '56,54,49,35,38,53,57,36,39,44,55,34,48,46,45,43,60,58,42,59,40,41,52,47,37,33,50,51', 1, '2018-10-26 19:03:58', '2018-10-26 19:03:58'),
(9, 101, NULL, 1, '2018-11-21 20:40:28', '2018-11-21 20:42:14'),
(10, 100, '34,47,40', 1, '2018-11-21 20:46:29', '2018-11-21 20:46:30'),
(11, 117, NULL, 1, '2018-12-26 17:40:43', '2018-12-26 17:40:44'),
(12, 119, '48', 1, '2018-12-29 05:37:54', '2018-12-29 05:37:54'),
(13, 127, '35,39', 1, '2019-02-11 19:24:36', '2019-08-07 18:28:48'),
(14, 189, NULL, 1, '2019-03-12 07:04:47', '2019-03-12 07:04:48'),
(15, 196, '35,36', 1, '2019-05-30 22:14:02', '2019-05-30 22:16:28'),
(16, 197, '33,34', 1, '2019-05-30 22:24:09', '2019-05-30 22:25:47'),
(17, 198, '33', 1, '2019-05-30 22:34:32', '2019-05-30 22:34:32'),
(18, 199, NULL, 1, '2019-06-17 18:43:03', '2019-06-17 18:43:03'),
(19, 200, NULL, 1, '2019-06-18 01:56:14', '2019-06-18 01:56:14'),
(20, 201, '45,46,40,64', 1, '2019-06-20 15:15:00', '2019-06-20 15:15:00'),
(21, 202, '40,41', 1, '2019-06-27 17:53:32', '2019-06-27 17:53:32'),
(22, 205, '3434', 1, '2019-06-28 20:00:37', '2019-06-28 20:00:37'),
(23, 208, NULL, 1, '2019-07-10 08:42:07', '2019-07-10 08:42:07'),
(24, 209, '37,38', 1, '2019-07-11 07:11:54', '2019-07-11 07:11:54'),
(25, 210, '33', 1, '2019-07-11 10:52:22', '2019-07-11 10:52:22'),
(26, 213, '37,39', 1, '2019-07-26 05:21:08', '2019-07-26 05:21:08'),
(27, 218, '68,60,63', 1, '2019-08-08 10:45:37', '2019-08-08 10:45:37'),
(28, 356, '56,54,49,35,38,53,57,36,39,44,55,34,48,46,45,43,60,58,42,59,40,41,52,47,37,33,50,51', 1, '2018-10-26 19:03:58', '2018-10-26 19:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_plan`
--

CREATE TABLE `patient_health_plan` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `in_pay` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `payment_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_health_plan`
--

INSERT INTO `patient_health_plan` (`id`, `patient_id`, `plan_id`, `in_pay`, `payment_date`, `status`, `created_at`, `updated_at`) VALUES
(10, 50, 4, 0, '28/09/2018', 1, '2018-09-28 22:11:51', '2018-09-29 07:00:03'),
(11, 51, 5, 0, '28/09/2018', 1, '2018-09-28 23:01:43', '2018-09-29 07:00:03'),
(13, 101, 5, 0, NULL, 1, '2018-12-05 20:30:00', '2018-12-05 20:30:01'),
(14, 127, 2, 1, '03/07/2019', 1, '2019-01-12 23:53:23', '2019-07-19 11:28:04'),
(23, 128, 3, 0, '12/01/2019', 1, '2019-01-13 02:16:59', '2019-01-13 07:00:02'),
(26, 131, 3, 0, '12/01/2019', 1, '2019-01-13 02:26:49', '2019-01-13 07:00:02'),
(27, 205, 3, 0, NULL, 1, '2019-06-28 20:01:55', '2019-06-28 20:01:55'),
(28, 208, 3, 1, '10/07/2019', 1, '2019-07-10 08:50:33', '2019-07-10 08:50:33'),
(29, 213, 3, 1, '07/08/2019', 1, '2019-08-07 18:53:55', '2019-08-07 18:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_records`
--

CREATE TABLE `patient_health_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `add_date` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_pressure_min_value` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_pressure_max_value` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pluse` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temperature` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oxygen_saturation` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breathing_rate` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abdominal_circumference` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_sugar` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bmi` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_health_records`
--

INSERT INTO `patient_health_records` (`id`, `patient_id`, `add_date`, `blood_pressure_min_value`, `blood_pressure_max_value`, `pluse`, `temperature`, `oxygen_saturation`, `breathing_rate`, `abdominal_circumference`, `blood_sugar`, `weight`, `height`, `bmi`, `status`, `created_at`, `updated_at`) VALUES
(3, 32, '03/09/2018', '60', '120', '50', '50', '60', '90', '20', '40', '60', '5.0', 'BMI 2.40', 1, '2018-09-04 00:26:11', '2018-09-04 00:26:11'),
(6, 30, '03/09/2018', '90', '140', '100', '106', '92', '18', '100', '100', '70', '1.5', 'BMI 31.11', 1, '2018-09-04 04:44:01', '2018-09-04 04:44:01'),
(7, 30, '04/09/2018', '90', '130', '96', '99', '94', '18', '110', '70', '90', '1.5', 'BMI 40.00', 1, '2018-09-07 21:02:23', '2018-09-07 21:02:23'),
(8, 30, '05/09/2018', '62', '112', '60', '94', '100', '12', '100', '100', '70', '1.5', 'BMI 31.11', 1, '2018-09-07 21:02:59', '2018-09-07 21:02:59'),
(9, 30, '06/09/2018', '110', '180', '110', '102', '97', '15', '90', '90', '90', '1.5', 'BMI 40.00', 1, '2018-09-07 21:04:10', '2018-09-07 21:04:10'),
(10, 30, '07/09/2018', '50', '100', '50', '106', '99', '13', '103', '250', '130', '1.5', 'BMI 57.78', 1, '2018-09-07 21:04:50', '2018-09-07 21:04:50'),
(12, 30, '08/09/2018', '40', '100', '100', '95', '99', '15', '120', '120', '120', '1.5', 'BMI 53.33', 1, '2018-09-12 00:20:13', '2018-09-12 00:20:13'),
(13, 30, '18/09/2018', '90', '130', '59', '100', '100', '11', '110', '100', '80', '1.5', 'BMI 35.56', 1, '2018-09-19 01:16:23', '2018-09-19 01:16:23'),
(14, 32, '13/09/2018', '60', '90', '56', '89', '09', '5', '5', '19', '59', NULL, NULL, 1, '2018-09-24 22:00:36', '2018-09-24 22:00:36'),
(15, 32, '24/09/2018', '60', '120', '90', '60', '58', '1', '81', '88', '56', '5.0', 'BMI 2.24', 1, '2018-09-24 22:01:43', '2018-09-24 22:01:43'),
(16, 32, '13/09/2018', '58', '23', '52', '5', '81', '5', '5', '5', '5', '5.0', 'BMI 0.20', 1, '2018-09-25 22:51:57', '2018-09-25 22:51:57'),
(18, 30, '26/09/2018', '80', '120', NULL, NULL, NULL, '12', NULL, NULL, NULL, '1.5', NULL, 1, '2018-09-27 03:04:02', '2018-09-27 03:04:02'),
(19, 30, '27/09/2018', '80', '120', '100', NULL, NULL, NULL, NULL, NULL, NULL, '1.5', NULL, 1, '2018-09-27 21:28:07', '2018-09-27 21:28:07'),
(20, 47, '28/09/2018', '80', '120', '100', NULL, NULL, NULL, NULL, NULL, NULL, '5.4', NULL, 1, '2018-09-28 17:39:32', '2018-09-28 17:39:32'),
(21, 32, '26/09/2018', '23', '123', '60', '58', '52', '55', '65', '56', '56', '5.0', 'BMI 2.24', 1, '2018-10-01 21:06:59', '2018-10-01 21:06:59'),
(22, 30, '02/10/2018', '90', '150', '100', '100', '100', '12', '100', '120', '67', '1.5', 'BMI 29.78', 1, '2018-10-02 22:50:46', '2018-10-02 22:50:46'),
(23, 30, '02/10/2018', NULL, NULL, NULL, '100', '100', '12', '100', '100', '100', '1.5', 'BMI 44.44', 1, '2018-10-02 22:52:36', '2018-10-02 22:52:36'),
(26, 30, '05/10/2018', '80', '120', '100', NULL, NULL, NULL, NULL, '120', NULL, '1.5', NULL, 1, '2018-10-05 19:11:46', '2018-10-05 19:11:46'),
(27, 30, '04/10/2018', '50', '100', '60', NULL, NULL, NULL, NULL, '200', NULL, '1.5', NULL, 1, '2018-10-05 19:12:10', '2018-10-05 19:12:10'),
(28, 30, '03/10/2018', '90', '150', '90', NULL, NULL, NULL, NULL, '160', NULL, '1.5', NULL, 1, '2018-10-05 19:12:56', '2018-10-05 19:12:56'),
(30, 74, '10/10/2018', '60', '110', '100', NULL, NULL, NULL, NULL, '90', NULL, '1.7', NULL, 1, '2018-10-11 17:58:10', '2018-10-11 17:58:10'),
(31, 74, '10/10/2018', '96', '150', '90', NULL, NULL, NULL, NULL, '117', NULL, '1.7', NULL, 1, '2018-10-11 17:58:38', '2018-10-11 17:58:38'),
(32, 30, '12/10/2018', '80', '120', '90', NULL, NULL, NULL, NULL, '120', '80', '1.5', 'BMI 35.56', 1, '2018-10-12 20:01:12', '2018-10-12 20:01:12'),
(33, 30, '14/10/2018', '80', '120', '90', NULL, NULL, NULL, NULL, '110', NULL, '1.5', NULL, 1, '2018-10-15 04:18:35', '2018-10-15 04:18:35'),
(34, 30, '13/10/2018', '60', '110', '120', NULL, NULL, NULL, NULL, '160', NULL, '1.5', NULL, 1, '2018-10-15 05:31:24', '2018-10-15 05:31:24'),
(35, 30, '16/10/2018', '80', '120', '90', NULL, NULL, NULL, NULL, '150', NULL, '1.5', NULL, 1, '2018-10-17 03:51:26', '2018-10-17 03:51:26'),
(36, 30, '19/10/2018', '70', '120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.5', NULL, 1, '2018-10-19 20:18:01', '2018-10-19 20:18:01'),
(37, 30, '19/10/2018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '90', NULL, '1.5', NULL, 1, '2018-10-19 20:18:29', '2018-10-19 20:18:29'),
(38, 30, '29/10/2018', '80', '120', NULL, NULL, NULL, NULL, NULL, '90', NULL, '1.5', NULL, 1, '2018-10-29 17:16:44', '2018-10-29 17:16:44'),
(39, 30, '28/10/2018', '60', '110', NULL, NULL, NULL, NULL, NULL, '150', NULL, '1.5', NULL, 1, '2018-10-29 17:17:02', '2018-10-29 17:17:02'),
(40, 30, '27/10/2018', '80', '150', NULL, NULL, NULL, NULL, NULL, '170', NULL, '1.5', NULL, 1, '2018-10-29 23:13:47', '2018-10-29 23:13:47'),
(41, 30, '30/10/2018', '90', '150', NULL, NULL, NULL, NULL, NULL, '89', '80', '1.5', 'BMI 35.56', 1, '2018-10-30 23:52:51', '2018-10-30 23:52:51'),
(42, 30, '31/10/2018', '60', '100', NULL, NULL, NULL, NULL, NULL, '200', NULL, '1.5', NULL, 1, '2018-11-01 01:00:19', '2018-11-01 01:00:19'),
(44, 30, '02/11/2018', '80', '120', '100', '98', '100', '12', '100', '135', '73', '1.5', 'BMI 32.44', 1, '2018-11-03 23:32:45', '2018-11-03 23:32:45'),
(45, 30, '03/11/2018', '60', '120', '80', NULL, NULL, NULL, NULL, '120', NULL, '1.5', NULL, 1, '2018-11-05 18:03:42', '2018-11-05 18:03:42'),
(46, 30, '04/11/2018', '90', '140', '100', NULL, NULL, NULL, NULL, '108', NULL, '1.5', NULL, 1, '2018-11-05 18:04:07', '2018-11-05 18:04:07'),
(47, 30, '05/11/2018', '68', '110', '69', NULL, NULL, NULL, NULL, '132', NULL, '1.5', NULL, 1, '2018-11-05 18:04:30', '2018-11-05 18:04:30'),
(48, 30, '09/11/2018', '80', '120', '100', NULL, NULL, NULL, NULL, '89', NULL, '1.5', NULL, 1, '2018-11-09 18:31:25', '2018-11-09 18:31:25'),
(49, 30, '08/11/2018', '60', '100', '60', NULL, NULL, NULL, NULL, '1150', NULL, '1.5', NULL, 1, '2018-11-09 18:36:18', '2018-11-09 18:36:18'),
(50, 30, '08/11/2018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '110', NULL, '1.5', NULL, 1, '2018-11-09 18:37:03', '2018-11-09 18:37:03'),
(51, 94, '11/11/2018', '60', '120', '65', NULL, NULL, NULL, NULL, '90', NULL, '1.65', NULL, 1, '2018-11-11 19:10:08', '2018-11-11 19:10:08'),
(52, 30, '12/11/2018', '60', '120', '60', NULL, NULL, NULL, NULL, '90', NULL, '1.5', NULL, 1, '2018-11-13 01:00:03', '2018-11-13 01:00:03'),
(53, 30, '16/11/2018', '80', '120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.5', NULL, 1, '2018-11-16 22:41:53', '2018-11-16 22:41:53'),
(54, 30, '20/11/2018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '200', NULL, '1.5', NULL, 1, '2018-11-20 16:18:34', '2018-11-20 16:18:34'),
(56, 87, '15/11/2018', '15', '51', '15', '120', '15', '152', '15', '15', '55', '5.4', 'BMI 1.89', 1, '2018-11-22 00:31:12', '2018-11-22 00:31:12'),
(57, 87, '19/11/2018', '35', '60', '45', '45', '45', '152', '12', '12', '90', '5.4', 'BMI 3.09', 1, '2018-11-22 00:32:06', '2018-11-22 00:32:06'),
(58, 87, '24/11/2018', '30', '120', '35', '68', '59', '56', '86', '12', '45', '5.4', 'BMI 1.54', 1, '2018-11-24 23:01:44', '2018-11-24 23:01:44'),
(59, 30, '02/12/2018', '80', '120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.5', NULL, 1, '2018-12-02 21:47:19', '2018-12-02 21:47:19'),
(60, 30, '10/12/2018', '70', '110', NULL, NULL, '99', NULL, '100', '100', NULL, '1.5', NULL, 1, '2018-12-10 17:28:00', '2018-12-10 17:28:00'),
(61, 87, '17/12/2018', '23', '120', '35', '68', '95', '95', '29', '43', '45', '5.4', 'BMI 1.54', 1, '2018-12-17 18:49:59', '2018-12-17 18:49:59'),
(62, 117, '18/01/2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '109', NULL, '165.0', NULL, 1, '2019-01-18 14:50:46', '2019-01-18 14:50:46'),
(63, 30, '04/02/2019', '80', '120', '100', '98', '100', NULL, NULL, '120', '60', '1.5', 'BMI 26.67', 1, '2019-02-04 21:18:48', '2019-02-04 21:18:48'),
(64, 30, '04/02/2019', '80', '120', '100', '98', '100', NULL, NULL, '120', '60', '1.5', 'BMI 26.67', 1, '2019-02-04 21:19:06', '2019-02-04 21:19:06'),
(65, 127, '09/02/2019', '50', '120', '50', '60', '30', '25', '23', '30', '45', '5.2', 'BMI 1.66', 1, '2019-02-11 19:34:19', '2019-02-11 19:34:19'),
(66, 127, '18/02/2019', '30', '120', '60', '50', '60', '50', '90', '89', '45', '5.2', 'BMI 1.66', 1, '2019-02-19 01:08:43', '2019-02-19 01:08:43'),
(67, 127, '18/02/2019', '40', '120', '50', '50', '60', '70', NULL, '110', '45', '5.2', '1.6642011834319526', 1, '2019-06-25 00:28:18', '2019-06-25 00:28:18'),
(68, 202, '27/06/2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100', NULL, '6.1', '0.0', 1, '2019-06-28 06:46:51', '2019-06-28 06:46:51'),
(69, 208, '09/07/2019', NULL, '140', '70', '32', '20', '5', NULL, '50', '40', '5.3', '1.4239943040227838', 1, '2019-07-10 08:54:54', '2019-07-10 08:54:54'),
(70, 201, '23/07/2019', NULL, NULL, '25', NULL, NULL, NULL, NULL, NULL, NULL, '5.1', '0.0', 1, '2019-07-23 10:18:03', '2019-07-23 10:18:03'),
(71, 201, '22/07/2019', NULL, NULL, '96', NULL, NULL, NULL, NULL, NULL, NULL, '5.1', '0.0', 1, '2019-07-23 10:18:13', '2019-07-23 10:18:13'),
(72, 213, '26/07/2019', '30', '120', '60', '45', '65', '30', NULL, '36', '65', '5.4', '2.2290809327846364', 1, '2019-07-26 05:23:07', '2019-07-26 05:23:07'),
(73, 213, '27/07/2019', '18', '70', '70', '34', '18', '120', NULL, '70', '40', '5.4', '1.371742112482853', 1, '2019-07-27 05:43:16', '2019-07-27 05:43:16'),
(74, 201, '31/07/2019', '80', '120', '99', '99', '100', '12', NULL, '201', '90', '5.1', '3.4602076124567476', 1, '2019-07-31 11:23:10', '2019-07-31 11:23:10'),
(75, 127, '05/08/2019', '20', '120', '30', '45', '40', '50', '40', '60', '70', '5.2', '2.588757396449704', 1, '2019-08-05 12:48:29', '2019-08-05 12:48:29'),
(77, 138, '28/11/2019', 'qq', 'q', 'qq', 'qq', 'q', 'q', 'q', 'q', 'q', 'q', 'qq', 1, '2019-11-28 13:08:01', '2019-11-28 13:08:01'),
(78, 148, '12/02/2019', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', 1, '2019-12-02 14:47:32', '2019-12-02 14:47:45'),
(80, 153, '06/12/2019', '87', '40', '12', '97.8', '97', '63', '27', '90', '78', '5.5', '25.5', 1, '2019-12-06 14:09:38', '2019-12-06 15:59:07'),
(82, 157, '10/12/2019', '40', '50', '55', '30', '5', '120', '55', '10', '45', '5.5', '456', 1, '2019-12-09 12:03:06', '2019-12-09 12:03:06'),
(84, 170, '09/12/2019', '130', '90', '12', '97', '100', '88', '42', '107', '90', '1.7', '44', 1, '2019-12-09 21:21:02', '2019-12-09 21:21:02'),
(86, 172, '12/12/2019', '11', '111', '65', '30', '5', '68', '2', '151', '50', '5.5', '22', 1, '2019-12-13 16:09:55', '2019-12-13 16:09:55'),
(87, 167, '01/01/1970', '11', '100', '11', '11', '11', '11', '11', '120', '11', '5', '0.44', 1, '2019-12-17 17:02:12', '2019-12-17 17:18:14'),
(88, 167, '18/12/2019', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-17 17:18:39', '2019-12-18 11:51:52'),
(89, 167, '12/11/2019', '11', '50', '5', '30', '10', '68', '22', '11', '50', '5.4', '1.71', 1, '2019-12-17 17:20:19', '2019-12-18 11:26:50'),
(90, 167, '01/01/1970', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-17 18:40:39', '2019-12-17 18:40:39'),
(94, 167, '18/12/2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-18 11:28:03', '2019-12-18 11:28:03'),
(95, 152, '06/12/2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-18 11:33:39', '2019-12-18 11:33:39'),
(96, 167, '18/12/2019', '22', '33', '60', '30', '5', '68', NULL, '120', '50', '5.5', '1.65', 1, '2019-12-18 11:42:37', '2019-12-18 11:42:37'),
(97, 329, '18/12/2019', '120', '160', '76', '30', '4', '69', '77', '90', '50', '5.5', '1.65', 1, '2019-12-19 13:03:09', '2019-12-19 13:03:09'),
(98, 177, '19/12/2019', '90', '110', '66', '29', '5', '68', '55', '120', '50', '5.5', '1.65', 1, '2019-12-20 12:44:30', '2019-12-20 12:44:30'),
(99, 178, '20/12/2019', '90', '120', '70', '30', '5', '69', '55', '140', '50', '5.3', '1.78', 1, '2019-12-20 16:28:33', '2019-12-20 16:28:33'),
(100, 179, '23/12/2019', '100', '110', '56', '32', '5', '68', '55', '90', '55', '5.3', '1.96', 1, '2019-12-23 11:23:42', '2019-12-23 11:23:42'),
(101, 192, '12/12/2019', '90', '110', '60', '25', '25', '60', '15', '110', '60', '420', '0.00', 1, '2019-12-31 05:07:37', '2019-12-31 05:07:37'),
(102, 355, '25/12/2019', '60', '110', '22', '23', '32', '25', '22', '23', '22', '23', '0.04', 1, '2019-12-31 05:11:56', '2019-12-31 05:11:56'),
(103, 356, '06/12/2019', '44', '33', '70', '35', '45', '70', '43', '90', '60', '187', '0.00', 1, '2019-12-31 05:18:13', '2019-12-31 05:18:13'),
(104, 356, '20/12/2019', '44', '33', '50', '35', '45', '65', '43', '90', '60', '187', '0.00', 1, '2019-01-31 05:18:13', '2019-12-31 05:18:13'),
(105, 356, '22/12/2019', '44', '33', '50', '35', '45', '60\r\n', '43', '90', '60', '187', '0.00', 1, '2019-01-31 05:18:13', '2019-12-31 05:18:13'),
(106, 356, '25/12/2019', '44', '33', '70', '35', '45', '71', '43', '90', '60', '187', '0.00', 1, '2019-12-31 05:18:13', '2019-12-31 05:18:13'),
(107, 356, '30/12/2019', '44', '33', '70', '35', '45', '55', '43', '90', '60', '187', '0.00', 1, '2019-12-31 05:18:13', '2019-12-31 05:18:13'),
(108, 356, '03/09/2018', '60', '120', '50', '50', '60', '90', '20', '40', '60', '5.0', 'BMI 2.40', 1, '2018-09-04 00:26:11', '2018-09-04 00:26:11'),
(109, 399, '16/01/2020', '50', '50', '12', '45', '022', '90', '22', '22', '65', '1.75', '21.22', 1, '2020-01-17 08:46:31', '2020-01-17 08:46:31'),
(110, 399, '16/01/2020', '50', '50', '12', '45', '022', '90', '22', '22', '65', '1.75', '21.22', 1, '2020-01-17 08:46:31', '2020-01-17 08:46:31'),
(111, 399, '17/01/2020', '66', '66', '12', '45', '60', '90', '150', '200', '65', '1.65', '23.88', 1, '2020-01-17 08:47:25', '2020-01-17 08:47:25'),
(112, 403, '01/01/2020', '321', '233', '12', '45', '322', '33', '321', '200', '65', '1.75', '21.22', 1, '2020-01-17 09:23:39', '2020-01-17 09:23:39'),
(113, 403, '15/01/2020', '1233', '21312', '1231221', '213', '213', '2131', '123', '213', '213', '213', '0.00', 1, '2020-01-17 09:24:01', '2020-01-17 09:24:01'),
(114, 346, '16/01/2020', '123', '132', '132', '45', '123', '132', '2313', '300', '68', '1.67', '24.38', 1, '2020-01-17 11:09:35', '2020-01-17 11:09:35'),
(115, 405, '10/01/2020', '12', '121', '122', '55', '21', '50', '5', '21', '66', '45', '0.03', 1, '2020-01-17 11:27:40', '2020-01-17 11:27:40'),
(116, 405, '16/01/2020', '123', '132', '132', '45', '123', '132', '2313', '300', '68', '180', '0.00', 1, '2020-01-17 11:31:38', '2020-01-17 11:31:38'),
(117, 405, '15/01/2020', '50', '75', '40', '65', '56', '90', '212', '200', '99', '1.75', '32.33', 1, '2020-01-17 11:32:16', '2020-01-17 11:32:16');

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
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_lab_detail`
--

INSERT INTO `patient_lab_detail` (`id`, `coach_id`, `patient_id`, `test_name`, `test_date`, `value`, `unit`, `result`, `status`, `created_at`, `updated_at`) VALUES
(1, 39, 30, '2', '03/09/2018', '6', 1, 'Normal', 1, '2018-09-04 05:17:04', '2018-09-04 05:17:04'),
(2, 39, 30, '2', '02/09/2018', '4', 1, 'Normal', 1, '2018-09-04 05:19:37', '2018-09-04 05:19:37'),
(3, 39, 30, '2', '01/09/2018', '9', 1, 'High', 1, '2018-09-04 05:19:58', '2018-09-04 05:19:58'),
(4, 39, 30, '2', '04/09/2018', '6.3', 1, 'Normal', 1, '2018-09-07 21:07:05', '2018-09-07 21:07:05'),
(5, 39, 30, '2', '05/09/2018', '6.9', 1, 'Normal', 1, '2018-09-07 21:07:23', '2018-09-07 21:07:23'),
(6, 39, 30, '2', '06/09/2018', '4.9', 1, 'Normal', 1, '2018-09-07 21:07:41', '2018-09-07 21:07:41'),
(7, 39, 30, '2', '07/09/2018', '5.5', 1, 'Normal', 1, '2018-09-07 21:07:57', '2018-09-07 21:07:57'),
(8, 39, 30, '2', '09/09/2018', '7', 1, 'High', 1, '2018-09-10 00:38:01', '2018-09-10 00:38:01'),
(9, 39, 30, '3', '20/09/2018', '30', 1, 'Normal', 1, '2018-09-21 01:46:44', '2018-09-21 01:46:44'),
(10, 39, 30, '3', '19/09/2018', '20', 1, 'Normal', 1, '2018-09-21 01:53:01', '2018-09-21 01:53:01'),
(11, 4, 32, '13', '07/08/2018', '100', 3, 'Normal', 1, '2018-09-24 20:14:58', '2018-09-24 20:14:58'),
(12, 4, 32, '13', '07/08/2018', '100', 3, 'Normal', 1, '2018-09-24 20:15:06', '2018-09-24 20:15:06'),
(13, 4, 32, '12', '07/08/2018', '100', 3, 'Normal', 1, '2018-09-24 21:34:16', '2018-09-24 21:34:16'),
(14, 38, 32, '17', '25/09/2018', '320', 2, 'Normal', 1, '2018-09-24 21:41:27', '2018-09-24 21:41:27'),
(15, 39, 30, '2', '25/09/2018', '9', 1, 'High', 1, '2018-09-25 22:53:08', '2018-09-25 22:53:08'),
(16, 39, 30, '2', '23/09/2018', '8.1', 1, 'High', 1, '2018-09-25 22:53:28', '2018-09-25 22:53:28'),
(17, 39, 30, '5', '25/09/2018', '9', 2, 'Low', 1, '2018-09-25 22:59:12', '2018-09-25 22:59:12'),
(18, 39, 30, '7', '25/09/2018', '170000', 1, 'Normal', 1, '2018-09-25 23:01:36', '2018-09-25 23:01:36'),
(19, 38, 36, '17', '18/09/2018', '100', 2, 'Normal', 1, '2018-09-25 23:15:33', '2018-09-25 23:15:33'),
(20, 39, 44, '5', '26/09/2018', '11', 2, 'Normal', 1, '2018-09-26 20:52:49', '2018-09-26 20:52:49'),
(21, 38, 32, '17', '28/09/2018', '100', 3, 'Low', 1, '2018-09-28 18:53:01', '2018-09-28 18:53:01'),
(22, 38, 32, '18', '12/09/2018', '100', 2, 'Normal', 1, '2018-09-28 18:54:24', '2018-09-28 18:54:24'),
(23, 59, 32, '17', '04/10/2018', '120', 2, 'Normal', 1, '2018-10-01 21:39:24', '2018-10-01 21:39:24'),
(24, 60, 30, '3', '02/10/2018', '60', 2, 'Normal', 1, '2018-10-02 23:05:38', '2018-10-02 23:05:38'),
(25, 104, 87, '6', '27/11/2018', '120', 2, 'High', 1, '2018-11-26 22:51:16', '2018-11-26 22:51:16'),
(26, 111, 127, '15', '19/03/2019', '120', 2, 'Normal', 1, '2018-12-17 20:01:08', '2018-12-17 20:01:08'),
(27, 111, 127, '16', '14/02/2019', '120', 3, 'Normal', 1, '2019-02-11 19:36:29', '2019-02-11 19:36:29'),
(28, 111, 127, '16', '16/02/2019', '129', 3, 'Normal', 1, '2019-02-11 19:39:06', '2019-02-11 19:39:06'),
(29, 212, 127, '15', '26/07/2019', '120', 3, 'Low', 1, '2019-07-25 09:26:00', '2019-07-25 09:26:00'),
(30, 212, 127, '10', '19/08/2019', '100', 3, 'Low', 1, '2019-07-25 09:29:47', '2019-07-25 09:29:47'),
(31, 212, 127, '16', '27/07/2019', '12', 2, 'Normal', 1, '2019-07-25 09:34:24', '2019-07-25 09:34:24'),
(32, 212, 213, '29', '29/07/2019', '120', 3, 'Low', 1, '2019-07-27 05:37:21', '2019-07-27 05:37:21'),
(33, 212, 213, '15', '27/07/2020', '122', 2, 'High', 1, '2019-07-27 05:38:32', '2019-07-27 05:38:32'),
(34, 217, 201, '5', '31/07/2019', '9', 2, 'Low', 1, '2019-07-31 11:58:40', '2019-07-31 11:58:40'),
(35, 0, 138, 'testrrt', '01/01/1970', 'testrrt', 0, NULL, 1, '2019-11-28 13:08:31', '2019-11-28 13:08:41'),
(36, 0, 157, 'testrrt', '12/06/2019', 'blood', 0, NULL, 1, '2019-12-06 12:19:34', '2019-12-06 12:19:44'),
(37, 0, 153, 'cardiogram', '06/12/2019', '120 – 200 ms', 0, NULL, 1, '2019-12-06 14:12:03', '2019-12-06 14:12:03'),
(39, 0, 152, 'Hemoglobin', '20/12/2019', 'EEEE', 0, NULL, 1, '2019-12-09 11:12:47', '2019-12-17 18:43:24'),
(41, 0, 170, 'HDL', '09/12/2019', '36', 0, NULL, 1, '2019-12-09 21:26:10', '2019-12-09 21:26:10'),
(43, 0, 172, 'ddsddfef', '13/12/2019', 'dsdsdsd', 0, NULL, 1, '2019-12-13 16:10:11', '2019-12-13 16:10:11'),
(44, 0, 167, '31', '04/12/2019', 'sfegrg', 0, NULL, 1, '2019-12-17 16:48:59', '2019-12-17 16:49:41'),
(45, 0, 167, 'Gamma GT', '01/01/1970', 'dgrgrgrg', 0, NULL, 1, '2019-12-17 16:54:29', '2019-12-17 18:39:30'),
(46, 0, 167, 'Hemoglobin', '01/01/1970', 'fwegrdgrftbhtgh', 0, NULL, 1, '2019-12-17 18:38:52', '2019-12-17 18:39:04'),
(47, 0, 167, 'TSH', '31/12/2019', 'ghrejufgcjfgtvj', 0, NULL, 1, '2019-12-17 18:44:25', '2019-12-17 18:44:25'),
(48, 0, 329, 'Hemoglobin', '20/12/2019', 'swcfgvfed', 0, NULL, 1, '2019-12-19 13:03:30', '2019-12-19 13:03:30'),
(49, 0, 178, 'TLC', '26/12/2019', 'demo', 0, NULL, 1, '2019-12-20 16:29:55', '2019-12-20 16:29:55'),
(50, 0, 179, 'U. Bilirubin', '25/12/2019', 'testrrt', 0, NULL, 1, '2019-12-23 11:24:00', '2019-12-23 11:24:00'),
(51, 0, 192, 'SGOT', '03/01/2020', '25', 0, NULL, 1, '2019-12-31 05:07:54', '2019-12-31 05:07:54'),
(52, 0, 355, 'Hemoglobin', '04/01/2020', '14', 0, NULL, 1, '2019-12-31 05:15:16', '2019-12-31 05:15:16'),
(53, 0, 356, 'Hemoglobin', '04/01/2020', '14', 0, NULL, 1, '2019-12-31 05:18:31', '2019-12-31 05:18:31'),
(54, 0, 399, 'SGOT', '2020-01-22', '500', 0, NULL, 1, '2020-01-17 08:50:30', '2020-01-17 08:50:30'),
(55, 0, 399, 'SGOT', '2020-01-22', '500', 0, NULL, 1, '2020-01-17 08:50:30', '2020-01-17 08:50:30'),
(56, 0, 346, 'SGOT', '2020-01-15', 'sdasd', 0, NULL, 1, '2020-01-17 11:09:54', '2020-01-17 11:09:54'),
(57, 0, 405, 'SGPT', '2020-01-11', 'sdasd', 0, NULL, 1, '2020-01-17 11:27:55', '2020-01-17 11:27:55'),
(58, 0, 405, 'Gamma GT', '2020-01-13', 'asfas', 0, NULL, 1, '2020-01-17 11:30:15', '2020-01-17 11:30:15'),
(59, 0, 405, 'TLC', '2020-01-15', '123456', 0, NULL, 1, '2020-01-17 11:30:37', '2020-01-17 11:30:37'),
(60, 0, 405, 'Gamma GT', '2020-01-17', '232', 0, NULL, 1, '2020-01-17 11:30:45', '2020-01-17 11:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `patient_past_history`
--

CREATE TABLE `patient_past_history` (
  `ID` int(10) NOT NULL,
  `patient_id` int(10) DEFAULT NULL,
  `blood_transfusion` varchar(100) DEFAULT NULL,
  `blood_transfusion_remark` varchar(255) DEFAULT NULL,
  `surgery` varchar(100) DEFAULT NULL,
  `surgery_remark` varchar(255) DEFAULT NULL,
  `hospitalization` varchar(100) DEFAULT NULL,
  `hospitalization_remark` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_priscription`
--

CREATE TABLE `patient_priscription` (
  `id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `medicine_name` varchar(100) DEFAULT NULL,
  `dose` varchar(100) DEFAULT NULL,
  `freq` varchar(100) DEFAULT NULL,
  `route` varchar(100) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_priscription`
--

INSERT INTO `patient_priscription` (`id`, `patient_id`, `doctor_id`, `diagnosis`, `medicine_name`, `dose`, `freq`, `route`, `duration`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(1, 33, 35, '', 'test', '3', 'Bed Time Only', 'TOPICAL', '56', '', 1, '2018-09-03 23:43:50', '2018-09-03 23:43:50'),
(2, 33, 35, '', 'test', '3', 'Bed Time Only', 'TOPICAL', '56', '', 1, '2018-09-03 23:43:54', '2018-09-03 23:43:54'),
(3, 33, 35, '', 'test', '3', 'Bed Time Only', 'SL', '6', '', 1, '2018-09-03 23:54:28', '2018-09-03 23:54:28'),
(4, 33, 35, '', 'test', '3', 'Bed Time Only', 'SL', '6', '', 1, '2018-09-03 23:57:15', '2018-09-03 23:57:15'),
(5, 33, 35, '', 'test', '3', 'Bed Time Only', 'SL', '6', '', 1, '2018-09-03 23:57:16', '2018-09-03 23:57:16'),
(11, 42, 41, '', 'shainaik', '6', 'Bed Time Only', 'NASAL', '2', '', 1, '2018-09-08 19:33:33', '2018-09-08 19:33:33'),
(13, 30, 31, '', 'Tab Rantac', '20', 'Empty stomach once daily', 'Oral', '5 Days', '', 1, '2018-09-09 20:07:17', '2018-09-09 20:07:17'),
(14, 30, 31, '', 'Inj Monocef', '1000', '12 hourly daily', 'IV', '5 Days', '', 1, '2018-09-09 20:08:04', '2018-09-09 20:08:04'),
(15, 30, 31, '', 'Inj Mikacin', '500', '12 hourly daily', 'IV', '5 Days', '', 1, '2018-09-09 20:08:18', '2018-09-09 20:08:18'),
(16, 30, 31, '', 'Cap Darolac DS', '0', 'Once daily', 'Oral', '5 Days', '', 1, '2018-09-09 20:08:55', '2018-09-09 20:08:55'),
(17, 30, 31, '', 'Tab Dolo', '1000', '8 hourly daily', 'Oral', '5 Days', '', 1, '2018-09-09 20:09:27', '2018-09-09 20:09:27'),
(18, 30, 31, '', 'Tab Allegra', '120', 'Once daily', 'Oral', '5 Days', '', 1, '2018-09-09 20:10:10', '2018-09-09 20:10:10'),
(20, 32, 37, '', 'paracetamol', '2', 'Bed Time Only', 'SL', 'week', '', 1, '2018-09-24 22:07:00', '2018-09-24 22:07:00'),
(21, 32, 37, '', 'metacin', '2', '6 hourly daily', 'SC', 'week', '', 1, '2018-09-25 23:05:46', '2018-09-25 23:05:46'),
(23, 30, 31, '', 'Tab Rifagut', '400', '8 hourly daily', 'Oral', '5 days', '', 1, '2018-09-26 19:33:57', '2018-09-26 19:33:57'),
(24, 47, 31, '', 'Tab Sumo', '50', '12 hourly daily', 'Oral', '2 days', '', 1, '2018-09-29 20:07:09', '2018-09-29 20:07:09'),
(25, 32, 58, '', 'test', '3', 'Empty stomach once daily', 'NASAL', 'week', '', 1, '2018-10-01 21:32:24', '2018-10-01 21:32:24'),
(26, 32, 58, '', 'test', '3', 'Empty stomach once daily', 'NASAL', 'week', '', 1, '2018-10-01 21:32:37', '2018-10-01 21:32:37'),
(27, 30, 53, '', 'Cap Nuttrolin B plus', '0', 'Bed Time Only', 'Oral', '5 days', '', 1, '2018-10-02 23:07:31', '2018-10-02 23:07:31'),
(28, 30, 75, '', 'tab sumo', '50', 'Once daily', 'Oral', '5', '', 1, '2018-10-17 04:03:18', '2018-10-17 04:03:18'),
(29, 30, 75, '', 'Tab Sumo', '50', '6 hourly daily', 'Oral', '5 days', '', 1, '2018-11-11 01:41:13', '2018-11-11 01:41:13'),
(31, 30, 75, '', 'Tab Lomotil', '150', '12 hourly daily', 'Oral', '6 days', '', 1, '2018-12-10 17:35:29', '2018-12-10 17:35:29'),
(32, 87, 102, '', 'metacin', '2', 'Bed Time Only', 'SC', 'week', '', 1, '2018-12-17 18:38:23', '2018-12-17 18:38:23'),
(33, 127, 152, '', 'metacin', '2', 'Once daily', 'Oral', '2 week', '', 1, '2019-02-11 19:32:04', '2019-02-11 19:32:04'),
(34, 127, 160, '', 'Metacin', '2', 'Once daily', 'Oral', '3 days', '', 1, '2019-02-19 01:25:39', '2019-02-19 01:25:39'),
(41, 199, 177, '', 'metasin', '3', '12 hourly daily', 'Oral', 'daily', '', 1, '2019-07-23 11:01:32', '2019-07-23 11:01:32'),
(42, 199, 177, '', 'metasin', '3', '12 hourly daily', 'Oral', 'daily', '', 1, '2019-07-23 11:01:35', '2019-07-23 11:01:35'),
(43, 199, 177, '', 'metasin', '3', '12 hourly daily', 'Oral', 'daily', '', 1, '2019-07-23 11:01:42', '2019-07-23 11:01:42'),
(44, 199, 177, '', 'metasin', '3', '12 hourly daily', 'Oral', 'daily', '', 1, '2019-07-23 11:02:03', '2019-07-23 11:02:03'),
(46, 127, 177, '', 'me', '64', 'Empty stomach once daily', 'NASAL', 'rh', '', 1, '2019-07-25 07:34:11', '2019-07-25 07:34:11'),
(51, 213, 177, '', 'test', '12', 'Empty stomach once daily', 'Oral', '5', '', 1, '2019-07-27 05:22:09', '2019-07-27 05:22:09'),
(52, 201, 75, '', 'tab rantac', '150', '12 hourly daily', 'Oral', '5 days', '', 1, '2019-07-31 12:25:27', '2019-07-31 12:25:27'),
(53, 201, 75, '', 'tab Norflox tz', '0', '12 hourly daily', 'Oral', '7 days', '', 1, '2019-07-31 12:27:14', '2019-07-31 12:27:14'),
(57, 169, 300, '', 'aa', 'aaaa', 'aa', 'aaa', 'aa', 'aaa', 1, '2019-12-13 11:15:52', '2019-12-13 11:15:52'),
(59, 169, 300, '', 'dwffefgregvr', 'jhgjgjtykj', 'jrtfjnfgjn', 'tfgbftrjn', 'hfjngft', 'ygftrjnyty\r\n13/12/2019\r\n7:00PM', 1, '2019-12-13 19:00:15', '2019-12-13 19:00:15'),
(60, 379, 375, '', 'safsf', '131', '2132', '13223', '2133', '23213', 1, '2020-01-10 11:54:52', '2020-01-10 11:54:52'),
(61, 379, 375, '', 'asfsaf', '12312', '1321', 'ghgf', '123', 'ds', 1, '2020-01-10 11:56:47', '2020-01-10 11:56:47'),
(62, 379, 375, '', 'asfsaf', '12312', '1321', 'ghgf', '123', 'ds', 1, '2020-01-10 11:56:47', '2020-01-10 11:56:47'),
(63, 379, 375, '', 'asfsaf', '12312', '1321', 'ghgf', '123', 'ds', 1, '2020-01-10 11:57:58', '2020-01-10 11:57:58'),
(64, 379, 375, '', 'sfasf', '1231', '21312', 'sdas', '1231', 'dsds', 1, '2020-01-10 11:58:38', '2020-01-10 11:58:38'),
(65, 335, 375, '', 'safs', '12312', '21312', '1231', '1231', 's2312', 1, '2020-01-10 13:27:11', '2020-01-10 13:27:11'),
(66, 356, 375, '', 'safsf', '131', '2132', '13223', '2133', '23213', 1, '2020-01-10 11:54:52', '2020-01-10 11:54:52'),
(67, 356, 375, 'acid', 'drun12', '5', '6 hourly daily', 'SL', '5', 'dasdas', 1, '2020-01-16 06:32:08', '2020-01-16 06:32:08'),
(68, 405, 334, 'PROBABLE DIAGNOSIS:', 'drug', '500', 'Once daily', 'TOPICAL', '10', 'sdasd', 1, '2020-01-20 05:17:37', '2020-01-20 05:17:37');

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
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_procedure`
--

INSERT INTO `patient_procedure` (`id`, `coach_id`, `patient_id`, `procedure_name`, `procedure_date`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(1, 39, 30, '1', '03/09/2018', 'Normal', 1, '2018-09-04 05:17:27', '2018-09-04 05:17:27'),
(2, 39, 30, '2', '20/09/2018', 'Normal', 1, '2018-09-21 01:47:24', '2018-09-21 01:47:24'),
(3, 38, 32, '6', '25/09/2018', 'Normal', 1, '2018-09-24 22:08:12', '2018-09-24 22:08:12'),
(4, 39, 30, '2', '25/09/2018', 'Normal', 1, '2018-09-25 23:02:25', '2018-09-25 23:02:25'),
(5, 39, 44, '1', '26/09/2018', 'Normal', 1, '2018-09-26 20:53:52', '2018-09-26 20:53:52'),
(6, 38, 32, '7', '28/09/2018', 'Normal', 1, '2018-09-28 18:53:15', '2018-09-28 18:53:15'),
(7, 59, 32, '7', '15/10/2018', 'Normal', 1, '2018-10-01 21:39:59', '2018-10-01 21:39:59'),
(8, 104, 87, '3', '27/11/2018', 'Abnormal', 1, '2018-11-26 22:51:40', '2018-11-26 22:51:40'),
(9, 111, 87, '1', '19/12/2018', 'Normal', 1, '2018-12-17 20:02:38', '2018-12-17 20:02:38'),
(10, 111, 127, '6', '24/02/2019', 'Normal', 1, '2019-02-11 19:36:53', '2019-02-11 19:36:53'),
(11, 212, 127, '8', '29/07/2019', 'Normal', 1, '2019-07-25 09:26:21', '2019-07-25 09:26:21'),
(12, 212, 127, '9', '30/07/2019', 'Abnormal', 1, '2019-07-25 09:34:52', '2019-07-25 09:34:52'),
(13, 212, 213, '6', '27/07/2019', 'Normal', 1, '2019-07-27 05:41:32', '2019-07-27 05:41:32'),
(14, 217, 201, '10', '31/07/2019', 'Normal', 1, '2019-07-31 12:05:08', '2019-07-31 12:05:08'),
(15, 212, 127, '3', '06/08/2019', 'testing and enhancing your email address is best for you soon and', 1, '2019-08-06 05:21:59', '2019-08-06 05:21:59'),
(17, 0, 138, 'vishal', '28/11/2019', 'test', 1, '2019-11-28 13:00:14', '2019-11-28 13:00:14'),
(18, 0, 144, 'Sanghvi', '28/11/2019', 'wee', 1, '2019-11-28 18:10:34', '2019-11-28 18:10:34'),
(19, 0, 147, 'Priyanka', '02/12/2019', 'sasasSAs', 1, '2019-12-02 14:51:37', '2019-12-02 14:51:37'),
(20, 0, 153, 'Blood Pressure', '12/06/2019', '87/126', 1, '2019-12-06 14:08:36', '2019-12-06 14:12:25'),
(21, 0, 167, 'CT', '12/09/2019', 'flfel', 1, '2019-12-09 17:27:13', '2019-12-17 16:51:18'),
(22, 0, 170, 'ECG', '09/12/2019', 'abcdefghijklmnopqrstuvwxyz12345678910abcdefghijklmnopqrstuvwxyz', 1, '2019-12-09 21:28:30', '2019-12-09 21:28:30'),
(24, 0, 172, 'ssasas', '13/12/2019', 'sassasadsweyrjhtrjhntrjntgjn', 1, '2019-12-13 16:09:16', '2019-12-13 16:09:16'),
(26, 0, 152, 'ECG', '27/12/2019', 'gdfgfdg', 1, '2019-12-17 18:34:33', '2019-12-17 18:34:33'),
(27, 0, 329, 'USG Abdomen', '11/12/2019', 'sadsf', 1, '2019-12-19 13:02:22', '2019-12-19 13:02:22'),
(28, 0, 167, 'USG Abdomen', '26/12/2019', 'test', 1, '2019-12-20 12:41:42', '2019-12-20 12:41:42'),
(29, 0, 177, 'Chest X Ray', '28/12/2019', 'demo trest', 1, '2019-12-20 12:42:30', '2019-12-20 12:42:30'),
(30, 0, 178, 'USG Abdomen', '12/12/2019', 'demooloo', 1, '2019-12-20 16:30:15', '2019-12-20 16:30:15'),
(31, 0, 179, 'USG Abdomen', '25/12/2019', 'test demo tedtvxvsjxsmx', 1, '2019-12-23 11:24:23', '2019-12-23 11:24:23'),
(32, 0, 356, 'Blood Pressure', '12/06/2019', '87/126', 1, '2019-12-06 14:08:36', '2019-12-06 14:12:25'),
(33, 0, 399, 'ECHO', '2020-01-16', '1221sd12d1a', 1, '2020-01-17 08:50:49', '2020-01-17 08:50:49'),
(34, 0, 346, 'USG Abdomen', '2020-01-15', 'fdsfsd', 1, '2020-01-17 11:10:13', '2020-01-17 11:10:13'),
(35, 0, 405, 'ECHO', '2020-01-12', '212121', 1, '2020-01-17 11:28:04', '2020-01-17 11:28:04'),
(36, 0, 405, 'Chest X Ray', '2020-01-14', 'sdasdas', 1, '2020-01-17 11:30:25', '2020-01-17 11:30:25'),
(37, 0, 405, 'pro1', '2020-01-18', 'sdsad', 1, '2020-01-17 11:30:55', '2020-01-17 11:30:55');

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
  `in_wallet` int(10) NOT NULL DEFAULT 1,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_wallet_detail`
--

INSERT INTO `patient_wallet_detail` (`id`, `patient_id`, `credit_amount`, `debit_amount`, `total_amount`, `amount_description`, `in_wallet`, `payment_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 33, '249', '0', '250', 'amrin', 2, 'pay_AtHBoSYM07R0q3', 1, '2018-09-04 00:05:19', '2018-09-04 00:05:19'),
(7, 30, '0', '3', '96', 'Teleconsultation payment of Navneet Goyal', 1, 'null', 1, '2018-09-04 23:21:28', '2018-09-04 23:21:28'),
(8, 30, '0', '3', '93', 'Add money.', 1, 'null', 1, '2018-09-04 23:23:06', '2018-09-04 23:23:06'),
(9, 30, '0', '3', '90', 'Teleconsultation payment of Navneet Goyal', 1, 'null', 1, '2018-09-04 23:23:44', '2018-09-04 23:23:44'),
(10, 30, '0', '2', '88', 'Payment of Gold plan', 1, 'null', 1, '2018-09-04 23:27:21', '2018-09-04 23:27:21'),
(11, 30, '0', '1', '87', 'Payment of Gold plan super', 1, 'null', 1, '2018-09-04 23:40:48', '2018-09-04 23:40:48'),
(12, 32, '350', '100', '0', 'Purchased Wellness  Plan.', 2, 'pay_AtgLJTlHyNsshE', 1, '2018-09-05 00:41:33', '2018-09-05 00:41:33'),
(13, 32, '100', '100', '0', 'Purchased Wellness  Plan.', 2, 'pay_Ath1K2c1U649Xc', 1, '2018-09-05 01:21:19', '2018-09-05 01:21:19'),
(14, 32, '100', '100', '0', 'Purchased Wellness  Plan.', 2, 'pay_Ath3ku7ZcaVoIz', 1, '2018-09-05 01:23:37', '2018-09-05 01:23:37'),
(15, 32, '100', '100', '0', 'Purchased Wellness  Plan.', 2, 'pay_Ath5LHNYnxWwPE', 1, '2018-09-05 01:25:08', '2018-09-05 01:25:08'),
(16, 32, '1', '0', '1', 'test doctor', 2, 'pay_AtzZ44HAEcfw5I', 1, '2018-09-05 19:29:45', '2018-09-05 19:29:45'),
(17, 32, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-09-05 19:35:59', '2018-09-05 19:35:59'),
(18, 32, '1', '0', '1', 'test doctor', 2, 'pay_AtzhwSkHrtpZRY', 1, '2018-09-05 19:38:10', '2018-09-05 19:38:10'),
(19, 32, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-09-05 19:47:12', '2018-09-05 19:47:12'),
(20, 32, '1', '0', '1', 'test doctor', 2, 'pay_Atzs1BsOwZDm5A', 1, '2018-09-05 19:47:40', '2018-09-05 19:47:40'),
(21, 32, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-09-05 20:44:26', '2018-09-05 20:44:26'),
(22, 32, '1', '0', '1', 'test doctor', 2, 'pay_Au0qEAH6h2Cs89', 1, '2018-09-05 20:44:42', '2018-09-05 20:44:42'),
(23, 32, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-09-05 20:44:59', '2018-09-05 20:44:59'),
(24, 30, '0', '3', '84', 'Teleconsultation payment of Navneet Goyal', 1, 'null', 1, '2018-09-06 01:41:26', '2018-09-06 01:41:26'),
(25, 32, '1', '0', '1', 'test doctor', 2, 'pay_AuMPWfTtNFKn0T', 1, '2018-09-06 17:50:39', '2018-09-06 17:50:39'),
(26, 32, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-09-06 18:20:35', '2018-09-06 18:20:35'),
(27, 32, '100', '0', '100', 'Wallet money', 1, 'pay_AuMwQNkEMR7Gyo', 1, '2018-09-06 18:22:02', '2018-09-06 18:22:02'),
(28, 32, '0', '1', '99', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 18:22:09', '2018-09-06 18:22:09'),
(29, 32, '12', '0', '111', 'Wallet money', 1, 'pay_AuNhh7Lcgy4oAz', 1, '2018-09-06 19:06:32', '2018-09-06 19:06:32'),
(30, 36, '0', '1', '249', 'Add money.', 1, 'null', 1, '2018-09-06 19:09:08', '2018-09-06 19:09:08'),
(31, 32, '0', '1', '110', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 19:10:17', '2018-09-06 19:10:17'),
(32, 32, '140', '0', '250', 'amrin', 2, 'pay_AuO2F0zsSSXJAV', 1, '2018-09-06 19:26:00', '2018-09-06 19:26:00'),
(33, 32, '0', '250', '0', 'Add money.', 1, 'null', 1, '2018-09-06 19:26:28', '2018-09-06 19:26:28'),
(34, 32, '250', '0', '250', 'Wallet money', 1, 'pay_AuO3SwTZ7V3VHY', 1, '2018-09-06 19:27:09', '2018-09-06 19:27:09'),
(35, 32, '0', '250', '0', 'Teleconsultation payment of amrin', 1, 'null', 1, '2018-09-06 19:28:05', '2018-09-06 19:28:05'),
(36, 32, '1', '0', '1', 'test doctor', 2, 'pay_AuOB2T0H90vc4R', 1, '2018-09-06 19:34:25', '2018-09-06 19:34:25'),
(37, 32, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-09-06 20:07:09', '2018-09-06 20:07:09'),
(38, 32, '1', '0', '1', 'test doctor', 2, 'pay_AuOlLApC3Mv0at', 1, '2018-09-06 20:08:42', '2018-09-06 20:08:42'),
(39, 32, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-09-06 20:09:02', '2018-09-06 20:09:02'),
(40, 32, '1', '0', '1', 'test doctor', 2, 'pay_AuOo49XgtSQyDv', 1, '2018-09-06 20:11:16', '2018-09-06 20:11:16'),
(41, 32, '0', '1', '0', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 20:11:21', '2018-09-06 20:11:21'),
(42, 32, '0', '1', '-1', 'Add money.', 1, 'null', 1, '2018-09-06 20:12:03', '2018-09-06 20:12:03'),
(43, 32, '100', '0', '99', 'Wallet money', 1, 'pay_AuOpmA6fs811ck', 1, '2018-09-06 20:12:53', '2018-09-06 20:12:53'),
(44, 32, '0', '1', '98', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 20:20:34', '2018-09-06 20:20:34'),
(45, 32, '0', '1', '97', 'Add money.', 1, 'null', 1, '2018-09-06 20:21:31', '2018-09-06 20:21:31'),
(46, 32, '0', '1', '96', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 20:21:47', '2018-09-06 20:21:47'),
(47, 32, '0', '1', '95', 'Add money.', 1, 'null', 1, '2018-09-06 20:55:53', '2018-09-06 20:55:53'),
(48, 36, '0', '1', '248', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 21:28:37', '2018-09-06 21:28:37'),
(49, 32, '0', '1', '94', 'Add money.', 1, 'null', 1, '2018-09-06 21:31:47', '2018-09-06 21:31:47'),
(50, 32, '0', '1', '93', 'Add money.', 1, 'null', 1, '2018-09-06 21:31:58', '2018-09-06 21:31:58'),
(51, 32, '0', '1', '92', 'Add money.', 1, 'null', 1, '2018-09-06 21:32:03', '2018-09-06 21:32:03'),
(52, 32, '0', '1', '91', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 21:34:28', '2018-09-06 21:34:28'),
(53, 32, '0', '1', '90', 'Add money.', 1, 'null', 1, '2018-09-06 21:35:10', '2018-09-06 21:35:10'),
(54, 32, '0', '1', '89', 'Add money.', 1, 'null', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(55, 32, '0', '1', '88', 'Add money.', 1, 'null', 1, '2018-09-06 21:35:11', '2018-09-06 21:35:11'),
(56, 32, '0', '1', '87', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 21:36:44', '2018-09-06 21:36:44'),
(57, 32, '0', '1', '86', 'Add money.', 1, 'null', 1, '2018-09-06 21:37:11', '2018-09-06 21:37:11'),
(58, 32, '0', '1', '85', 'Add money.', 1, 'null', 1, '2018-09-06 21:37:12', '2018-09-06 21:37:12'),
(59, 32, '0', '1', '84', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 21:37:19', '2018-09-06 21:37:19'),
(60, 32, '0', '1', '83', 'Add money.', 1, 'null', 1, '2018-09-06 21:37:35', '2018-09-06 21:37:35'),
(61, 32, '0', '1', '82', 'Add money.', 1, 'null', 1, '2018-09-06 21:37:36', '2018-09-06 21:37:36'),
(62, 32, '0', '1', '81', 'Add money.', 1, 'null', 1, '2018-09-06 21:37:36', '2018-09-06 21:37:36'),
(63, 32, '0', '1', '80', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 21:38:05', '2018-09-06 21:38:05'),
(64, 32, '0', '1', '79', 'Add money.', 1, 'null', 1, '2018-09-06 21:38:23', '2018-09-06 21:38:23'),
(65, 32, '0', '1', '78', 'Add money.', 1, 'null', 1, '2018-09-06 21:38:23', '2018-09-06 21:38:23'),
(66, 32, '0', '1', '77', 'Add money.', 1, 'null', 1, '2018-09-06 21:38:24', '2018-09-06 21:38:24'),
(67, 32, '0', '1', '76', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 21:38:32', '2018-09-06 21:38:32'),
(68, 32, '0', '1', '75', 'Add money.', 1, 'null', 1, '2018-09-06 21:39:12', '2018-09-06 21:39:12'),
(69, 32, '0', '1', '74', 'Add money.', 1, 'null', 1, '2018-09-06 21:39:12', '2018-09-06 21:39:12'),
(70, 32, '0', '1', '73', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 21:45:44', '2018-09-06 21:45:44'),
(71, 32, '0', '1', '72', 'Add money.', 1, 'null', 1, '2018-09-06 21:46:04', '2018-09-06 21:46:04'),
(72, 32, '0', '1', '71', 'Add money.', 1, 'null', 1, '2018-09-06 21:46:04', '2018-09-06 21:46:04'),
(73, 32, '0', '1', '70', 'Add money.', 1, 'null', 1, '2018-09-06 21:46:04', '2018-09-06 21:46:04'),
(74, 32, '0', '1', '69', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 21:47:55', '2018-09-06 21:47:55'),
(75, 32, '0', '1', '68', 'Add money.', 1, 'null', 1, '2018-09-06 21:48:35', '2018-09-06 21:48:35'),
(76, 32, '0', '1', '67', 'Add money.', 1, 'null', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(77, 32, '0', '1', '66', 'Add money.', 1, 'null', 1, '2018-09-06 21:48:36', '2018-09-06 21:48:36'),
(78, 32, '0', '1', '65', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 21:48:49', '2018-09-06 21:48:49'),
(79, 32, '0', '1', '64', 'Add money.', 1, 'null', 1, '2018-09-06 21:49:02', '2018-09-06 21:49:02'),
(80, 32, '0', '1', '63', 'Add money.', 1, 'null', 1, '2018-09-06 21:49:02', '2018-09-06 21:49:02'),
(81, 32, '0', '1', '62', 'Add money.', 1, 'null', 1, '2018-09-06 21:49:02', '2018-09-06 21:49:02'),
(82, 32, '0', '1', '61', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 21:50:03', '2018-09-06 21:50:03'),
(83, 32, '0', '1', '60', 'Add money.', 1, 'null', 1, '2018-09-06 21:50:15', '2018-09-06 21:50:15'),
(84, 32, '0', '1', '59', 'Add money.', 1, 'null', 1, '2018-09-06 21:50:15', '2018-09-06 21:50:15'),
(85, 32, '0', '1', '58', 'Teleconsultation payment of test doctor', 1, 'null', 1, '2018-09-06 21:53:52', '2018-09-06 21:53:52'),
(86, 32, '0', '1', '57', 'Add money.', 1, 'null', 1, '2018-09-06 21:54:02', '2018-09-06 21:54:02'),
(87, 32, '0', '1', '56', 'Add money.', 1, 'null', 1, '2018-09-06 22:13:21', '2018-09-06 22:13:21'),
(88, 32, '0', '1', '55', 'Add money.', 1, 'null', 1, '2018-09-06 22:13:40', '2018-09-06 22:13:40'),
(89, 32, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-06 22:19:34', '2018-09-06 22:19:34'),
(90, 32, '55', '0', '55', 'test doctor', 2, 'pay_AuR0MbeLC8cXmC', 1, '2018-09-06 22:20:18', '2018-09-06 22:20:18'),
(91, 32, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-06 22:20:57', '2018-09-06 22:20:57'),
(92, 32, '60', '0', '60', 'Wallet money', 1, 'pay_AuR1hFVzR251Et', 1, '2018-09-06 22:21:34', '2018-09-06 22:21:34'),
(93, 32, '0', '55', '5', 'Add money.', 1, 'null', 1, '2018-09-06 22:21:57', '2018-09-06 22:21:57'),
(94, 32, '50', '0', '55', 'test doctor', 2, 'pay_AuRkxtRBTpIGiN', 1, '2018-09-06 23:04:26', '2018-09-06 23:04:26'),
(95, 32, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-06 23:07:01', '2018-09-06 23:07:01'),
(96, 32, '55', '0', '55', 'test doctor', 2, 'pay_AuRqdgxI77OOdA', 1, '2018-09-06 23:09:49', '2018-09-06 23:09:49'),
(97, 32, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-06 23:12:16', '2018-09-06 23:12:16'),
(98, 32, '55', '0', '55', 'test doctor', 2, 'pay_AuSCjlN0vgAMxf', 1, '2018-09-06 23:30:41', '2018-09-06 23:30:41'),
(99, 32, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-06 23:32:20', '2018-09-06 23:32:20'),
(100, 32, '55', '0', '55', 'test doctor', 2, 'pay_AuSGjiVjE42qb3', 1, '2018-09-06 23:34:36', '2018-09-06 23:34:36'),
(101, 32, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-06 23:36:47', '2018-09-06 23:36:47'),
(102, 30, '0', '3', '81', 'Add money.', 1, 'null', 1, '2018-09-07 00:50:44', '2018-09-07 00:50:44'),
(103, 30, '0', '3', '78', 'Add money.', 1, 'null', 1, '2018-09-07 00:53:48', '2018-09-07 00:53:48'),
(104, 30, '0', '3', '75', 'Add money.', 1, 'null', 1, '2018-09-07 00:56:07', '2018-09-07 00:56:07'),
(105, 32, '3', '0', '3', 'Navneet Goyal', 2, 'pay_AuTg0HrD8BcIgs', 1, '2018-09-07 00:57:08', '2018-09-07 00:57:08'),
(106, 32, '0', '3', '0', 'Add money.', 1, 'null', 1, '2018-09-07 01:00:18', '2018-09-07 01:00:18'),
(107, 32, '3', '0', '3', 'Navneet Goyal', 2, 'pay_AuTlvPs73HrISx', 1, '2018-09-07 01:02:43', '2018-09-07 01:02:43'),
(108, 32, '0', '3', '0', 'Add money.', 1, 'null', 1, '2018-09-07 01:04:52', '2018-09-07 01:04:52'),
(109, 32, '3', '0', '3', 'Navneet Goyal', 2, 'pay_AuTsoTQoDeVupl', 1, '2018-09-07 01:09:14', '2018-09-07 01:09:14'),
(110, 32, '52', '0', '55', 'test doctor', 2, 'pay_AuU2CvXM9ZIDEb', 1, '2018-09-07 01:18:07', '2018-09-07 01:18:07'),
(111, 32, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-07 01:35:52', '2018-09-07 01:35:52'),
(112, 32, '55', '0', '55', 'test doctor', 2, 'pay_AuUMNcBJPlIS3c', 1, '2018-09-07 01:37:16', '2018-09-07 01:37:16'),
(113, 32, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-07 01:49:38', '2018-09-07 01:49:38'),
(114, 36, '0', '55', '193', 'Add money.', 1, 'null', 1, '2018-09-08 00:50:09', '2018-09-08 00:50:09'),
(115, 36, '0', '55', '138', 'Add money.', 1, 'null', 1, '2018-09-08 00:53:23', '2018-09-08 00:53:23'),
(116, 36, '0', '55', '83', 'Add money.', 1, 'null', 1, '2018-09-08 00:55:23', '2018-09-08 00:55:23'),
(117, 32, '0', '55', '-55', 'Add money.', 1, 'null', 1, '2018-09-08 18:13:27', '2018-09-08 18:13:27'),
(118, 32, '5693', '0', '5638', 'raj', 2, 'pay_AvAJzb6b9XtnmF', 1, '2018-09-08 18:40:05', '2018-09-08 18:40:05'),
(120, 42, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-09-08 19:51:05', '2018-09-08 19:51:05'),
(121, 42, '1', '0', '1', 'raj', 2, 'pay_AvBaCJqk6HyWg5', 1, '2018-09-08 19:54:07', '2018-09-08 19:54:07'),
(122, 42, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-09-08 19:59:27', '2018-09-08 19:59:27'),
(123, 42, '1', '1', '0', 'Purchased Gold  super Plan.', 2, 'pay_AvC7dmQhBqcGg9', 1, '2018-09-08 20:25:55', '2018-09-08 20:25:55'),
(124, 42, '2', '0', '2', 'Wallet money', 1, 'pay_AvCAMXCYQddG39', 1, '2018-09-08 20:28:22', '2018-09-08 20:28:22'),
(125, 42, '0', '1', '1', 'Payment of Gold plan super', 1, 'null', 1, '2018-09-08 20:28:33', '2018-09-08 20:28:33'),
(126, 42, '1', '0', '2', 'Wallet money', 1, 'pay_AvCBAlEMM17TEn', 1, '2018-09-08 20:29:07', '2018-09-08 20:29:07'),
(127, 42, '0', '1', '1', 'Payment of Gold plan super', 1, 'null', 1, '2018-09-08 20:29:45', '2018-09-08 20:29:45'),
(128, 42, '1', '0', '2', 'Wallet money', 1, 'pay_AvCDLIz0c84tNF', 1, '2018-09-08 20:31:14', '2018-09-08 20:31:14'),
(129, 42, '0', '1', '1', 'Payment of Gold plan super', 1, 'null', 1, '2018-09-08 20:31:39', '2018-09-08 20:31:39'),
(130, 42, '500', '0', '501', 'Wallet money', 1, 'pay_AvCGBCiced17tT', 1, '2018-09-08 20:33:51', '2018-09-08 20:33:51'),
(131, 42, '0', '100', '401', 'Payment of Wellness Plan', 1, 'null', 1, '2018-09-08 20:34:09', '2018-09-08 20:34:09'),
(132, 42, '1', '0', '402', 'Wallet money', 1, 'pay_AvCLpE3BnVQtkn', 1, '2018-09-08 20:39:13', '2018-09-08 20:39:13'),
(133, 32, '0', '55', '5583', 'Add money.', 1, 'null', 1, '2018-09-08 23:17:17', '2018-09-08 23:17:17'),
(134, 42, '0', '1', '401', 'Add money.', 1, 'null', 1, '2018-09-10 17:48:33', '2018-09-10 17:48:33'),
(135, 42, '0', '1', '400', 'Add money.', 1, 'null', 1, '2018-09-10 18:07:09', '2018-09-10 18:07:09'),
(136, 30, '0', '3', '72', 'Add money.', 1, 'null', 1, '2018-09-10 21:16:41', '2018-09-10 21:16:41'),
(137, 36, '0', '1', '82', 'Add money.', 1, 'null', 1, '2018-09-13 20:47:46', '2018-09-13 20:47:46'),
(138, 36, '0', '1', '81', 'Add money.', 1, 'null', 1, '2018-09-13 20:48:54', '2018-09-13 20:48:54'),
(139, 36, '0', '1', '80', 'Add money.', 1, 'null', 1, '2018-09-13 20:49:35', '2018-09-13 20:49:35'),
(140, 36, '0', '1', '79', 'Add money.', 1, 'null', 1, '2018-09-13 20:50:19', '2018-09-13 20:50:19'),
(141, 36, '0', '1', '78', 'Add money.', 1, 'null', 1, '2018-09-13 20:52:00', '2018-09-13 20:52:00'),
(142, 36, '0', '1', '77', 'Add money.', 1, 'null', 1, '2018-09-13 21:21:59', '2018-09-13 21:21:59'),
(143, 36, '0', '1', '76', 'Add money.', 1, 'null', 1, '2018-09-13 21:22:21', '2018-09-13 21:22:21'),
(144, 36, '0', '55', '21', 'Add money.', 1, 'null', 1, '2018-09-13 22:28:58', '2018-09-13 22:28:58'),
(145, 36, '34', '0', '55', 'test doctor', 2, 'pay_AxDIXGR4IuSyzp', 1, '2018-09-13 22:52:48', '2018-09-13 22:52:48'),
(146, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-13 22:53:17', '2018-09-13 22:53:17'),
(147, 36, '55', '0', '55', 'test doctor', 2, 'pay_AxDKVKh4gbd6Fo', 1, '2018-09-13 22:54:41', '2018-09-13 22:54:41'),
(148, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-13 22:55:23', '2018-09-13 22:55:23'),
(149, 36, '300', '0', '300', 'Wallet money', 1, 'pay_AxDO5cRQLfGVIz', 1, '2018-09-13 22:58:03', '2018-09-13 22:58:03'),
(150, 36, '0', '55', '245', 'Add money.', 1, 'null', 1, '2018-09-13 22:59:24', '2018-09-13 22:59:24'),
(151, 36, '0', '55', '190', 'Add money.', 1, 'null', 1, '2018-09-13 23:02:18', '2018-09-13 23:02:18'),
(152, 36, '0', '55', '135', 'Add money.', 1, 'null', 1, '2018-09-13 23:14:02', '2018-09-13 23:14:02'),
(153, 32, '0', '55', '5528', 'Add money.', 1, 'null', 1, '2018-09-13 23:15:52', '2018-09-13 23:15:52'),
(154, 42, '0', '55', '345', 'Add money.', 1, 'null', 1, '2018-09-13 23:19:42', '2018-09-13 23:19:42'),
(155, 32, '0', '55', '5473', 'Add money.', 1, 'null', 1, '2018-09-13 23:22:58', '2018-09-13 23:22:58'),
(156, 36, '0', '55', '80', 'Add money.', 1, 'null', 1, '2018-09-13 23:23:35', '2018-09-13 23:23:35'),
(157, 36, '0', '55', '25', 'Add money.', 1, 'null', 1, '2018-09-13 23:24:49', '2018-09-13 23:24:49'),
(158, 36, '30', '0', '55', 'test doctor', 2, 'pay_AxDqdgqNSfg59D', 1, '2018-09-13 23:25:05', '2018-09-13 23:25:05'),
(159, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-13 23:25:20', '2018-09-13 23:25:20'),
(160, 32, '0', '55', '5418', 'Add money.', 1, 'null', 1, '2018-09-13 23:25:52', '2018-09-13 23:25:52'),
(161, 42, '0', '55', '290', 'Add money.', 1, 'null', 1, '2018-09-13 23:26:46', '2018-09-13 23:26:46'),
(162, 36, '55', '0', '55', 'test doctor', 2, 'pay_AxDtGEYDsljOLM', 1, '2018-09-13 23:27:34', '2018-09-13 23:27:34'),
(163, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-13 23:27:45', '2018-09-13 23:27:45'),
(164, 32, '0', '55', '5363', 'Add money.', 1, 'null', 1, '2018-09-13 23:32:00', '2018-09-13 23:32:00'),
(165, 36, '200', '0', '200', 'Wallet money', 1, 'pay_AxDygFe8NI0P4S', 1, '2018-09-13 23:32:42', '2018-09-13 23:32:42'),
(166, 36, '0', '55', '145', 'Add money.', 1, 'null', 1, '2018-09-13 23:33:25', '2018-09-13 23:33:25'),
(167, 32, '0', '55', '5308', 'Add money.', 1, 'null', 1, '2018-09-13 23:34:25', '2018-09-13 23:34:25'),
(168, 32, '0', '55', '5253', 'Add money.', 1, 'null', 1, '2018-09-13 23:34:54', '2018-09-13 23:34:54'),
(169, 36, '0', '55', '90', 'Add money.', 1, 'null', 1, '2018-09-13 23:38:24', '2018-09-13 23:38:24'),
(170, 32, '0', '55', '5198', 'Add money.', 1, 'null', 1, '2018-09-13 23:40:24', '2018-09-13 23:40:24'),
(171, 32, '0', '55', '5143', 'Add money.', 1, 'null', 1, '2018-09-13 23:40:54', '2018-09-13 23:40:54'),
(172, 36, '0', '55', '35', 'Add money.', 1, 'null', 1, '2018-09-13 23:41:40', '2018-09-13 23:41:40'),
(173, 32, '0', '55', '5088', 'Add money.', 1, 'null', 1, '2018-09-14 00:05:47', '2018-09-14 00:05:47'),
(174, 32, '0', '55', '5033', 'Add money.', 1, 'null', 1, '2018-09-14 00:07:29', '2018-09-14 00:07:29'),
(175, 30, '0', '1', '71', 'Add money.', 1, 'null', 1, '2018-09-14 17:50:57', '2018-09-14 17:50:57'),
(176, 30, '0', '1', '70', 'Add money.', 1, 'null', 1, '2018-09-14 18:05:47', '2018-09-14 18:05:47'),
(177, 36, '0', '55', '-20', 'Add money.', 1, 'null', 1, '2018-09-17 17:52:49', '2018-09-17 17:52:49'),
(178, 36, '75', '0', '55', 'test doctor', 2, 'pay_AyiL0Rr3mxgxO7', 1, '2018-09-17 17:53:39', '2018-09-17 17:53:39'),
(179, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-17 17:54:18', '2018-09-17 17:54:18'),
(180, 32, '0', '55', '4978', 'Add money.', 1, 'null', 1, '2018-09-17 18:02:43', '2018-09-17 18:02:43'),
(181, 36, '55', '0', '55', 'test doctor', 2, 'pay_Ayif37JIYbltUv', 1, '2018-09-17 18:12:37', '2018-09-17 18:12:37'),
(182, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-17 18:13:11', '2018-09-17 18:13:11'),
(183, 36, '55', '0', '55', 'test doctor', 2, 'pay_AyigYQN4Nqhz2A', 1, '2018-09-17 18:14:03', '2018-09-17 18:14:03'),
(184, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-17 18:14:17', '2018-09-17 18:14:17'),
(185, 32, '0', '55', '4923', 'Add money.', 1, 'null', 1, '2018-09-17 18:16:56', '2018-09-17 18:16:56'),
(186, 32, '0', '55', '4868', 'Add money.', 1, 'null', 1, '2018-09-17 18:18:40', '2018-09-17 18:18:40'),
(187, 36, '55', '0', '55', 'test doctor', 2, 'pay_AyimaNcNYQ2R0X', 1, '2018-09-17 18:19:45', '2018-09-17 18:19:45'),
(188, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-17 18:20:05', '2018-09-17 18:20:05'),
(189, 36, '55', '0', '55', 'test doctor', 2, 'pay_Ayit8zeeqC1WTq', 1, '2018-09-17 18:25:59', '2018-09-17 18:25:59'),
(190, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-17 18:30:17', '2018-09-17 18:30:17'),
(191, 36, '55', '0', '55', 'test doctor', 2, 'pay_AyjU3o9EEZ5Yxr', 1, '2018-09-17 19:00:55', '2018-09-17 19:00:55'),
(192, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-17 19:02:42', '2018-09-17 19:02:42'),
(193, 36, '55', '0', '55', 'test doctor', 2, 'pay_AyjX3hp9N5XFXo', 1, '2018-09-17 19:03:48', '2018-09-17 19:03:48'),
(194, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-17 19:04:00', '2018-09-17 19:04:00'),
(195, 32, '0', '55', '4813', 'Add money.', 1, 'null', 1, '2018-09-17 19:06:01', '2018-09-17 19:06:01'),
(196, 32, '0', '55', '4758', 'Add money.', 1, 'null', 1, '2018-09-17 19:09:04', '2018-09-17 19:09:04'),
(197, 36, '55', '0', '55', 'test doctor', 2, 'pay_AyjdTimMuXf3Nn', 1, '2018-09-17 19:09:49', '2018-09-17 19:09:49'),
(198, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-17 19:09:59', '2018-09-17 19:09:59'),
(199, 36, '55', '0', '55', 'test doctor', 2, 'pay_Ayje3av8zEpzEd', 1, '2018-09-17 19:10:22', '2018-09-17 19:10:22'),
(200, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-17 19:10:36', '2018-09-17 19:10:36'),
(201, 32, '0', '55', '4703', 'Add money.', 1, 'null', 1, '2018-09-17 19:17:28', '2018-09-17 19:17:28'),
(202, 36, '55', '0', '55', 'test doctor', 2, 'pay_AyjmewpNBpS307', 1, '2018-09-17 19:18:32', '2018-09-17 19:18:32'),
(203, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-17 19:18:50', '2018-09-17 19:18:50'),
(204, 36, '0', '55', '-55', 'Add money.', 1, 'null', 1, '2018-09-17 19:19:27', '2018-09-17 19:19:27'),
(205, 36, '110', '0', '55', 'test doctor', 2, 'pay_Ayjpt35IKueHFm', 1, '2018-09-17 19:21:38', '2018-09-17 19:21:38'),
(206, 32, '0', '55', '4648', 'Add money.', 1, 'null', 1, '2018-09-17 19:23:38', '2018-09-17 19:23:38'),
(207, 32, '0', '55', '4593', 'Add money.', 1, 'null', 1, '2018-09-17 19:25:45', '2018-09-17 19:25:45'),
(208, 30, '0', '1', '69', 'Add money.', 1, 'null', 1, '2018-09-17 20:08:42', '2018-09-17 20:08:42'),
(209, 32, '0', '55', '4538', 'Add money.', 1, 'null', 1, '2018-09-17 20:26:13', '2018-09-17 20:26:13'),
(210, 32, '0', '55', '4483', 'Add money.', 1, 'null', 1, '2018-09-17 20:58:11', '2018-09-17 20:58:11'),
(211, 32, '0', '55', '4428', 'Add money.', 1, 'null', 1, '2018-09-17 21:04:14', '2018-09-17 21:04:14'),
(212, 30, '0', '1', '68', 'Add money.', 1, 'null', 1, '2018-09-19 01:34:42', '2018-09-19 01:34:42'),
(213, 32, '0', '55', '4373', 'Add money.', 1, 'null', 1, '2018-09-19 17:48:56', '2018-09-19 17:48:56'),
(214, 36, '0', '55', '0', 'Add money.', 1, 'null', 1, '2018-09-19 18:06:15', '2018-09-19 18:06:15'),
(215, 36, '1', '0', '1', 'test doctor', 2, 'pay_AzVezXzJQPujyr', 1, '2018-09-19 18:08:34', '2018-09-19 18:08:34'),
(216, 36, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-09-19 18:18:49', '2018-09-19 18:18:49'),
(217, 36, '0', '1', '-1', 'Add money.', 1, 'null', 1, '2018-09-19 18:22:21', '2018-09-19 18:22:21'),
(218, 36, '2', '0', '1', 'test doctor', 2, 'pay_AzVtuZQ7e5j4Lp', 1, '2018-09-19 18:22:40', '2018-09-19 18:22:40'),
(219, 36, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-09-19 18:25:44', '2018-09-19 18:25:44'),
(220, 36, '1', '0', '1', 'test doctor', 2, 'pay_AzVyqiEbPxQ2ZJ', 1, '2018-09-19 18:27:35', '2018-09-19 18:27:35'),
(221, 36, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-09-19 18:37:49', '2018-09-19 18:37:49'),
(222, 30, '0', '1', '67', 'Add money.', 1, 'null', 1, '2018-09-21 01:16:17', '2018-09-21 01:16:17'),
(223, 30, '50', '0', '117', 'Wallet money', 1, 'pay_B21OODH8oxvfcw', 1, '2018-09-26 02:30:03', '2018-09-26 02:30:03'),
(224, 32, '0', '890', '3483', 'Payment of Diabetes Diet Plan', 1, 'null', 1, '2018-09-28 17:46:55', '2018-09-28 17:46:55'),
(225, 32, '0', '890', '2593', 'Payment of Diabetes Diet Plan', 1, 'null', 1, '2018-09-28 17:55:53', '2018-09-28 17:55:53'),
(226, 32, '0', '890', '1703', 'Payment of Diabetes Diet Plan', 1, 'null', 1, '2018-09-28 18:01:49', '2018-09-28 18:01:49'),
(227, 32, '0', '890', '813', 'Payment of Diabetes Diet Plan', 1, 'null', 1, '2018-09-28 18:03:12', '2018-09-28 18:03:12'),
(228, 36, '3000', '0', '3000', 'Wallet money', 1, 'pay_B34ZkcaHCWgHMD', 1, '2018-09-28 18:14:53', '2018-09-28 18:14:53'),
(229, 36, '0', '890', '2110', 'Payment of Diabetes Diet Plan', 1, 'null', 1, '2018-09-28 18:16:44', '2018-09-28 18:16:44'),
(230, 36, '0', '890', '1220', 'Payment of Diabetes Diet Plan', 1, 'null', 1, '2018-09-28 18:18:02', '2018-09-28 18:18:02'),
(231, 36, '500', '100', '1620', 'Test', 1, 'ascfasda23423scv', 1, '2018-09-28 18:31:00', '2018-09-28 18:31:00'),
(232, 36, '500', '100', '2020', 'Test', 1, 'ascfasda23423scv', 1, '2018-09-28 18:31:22', '2018-09-28 18:31:22'),
(233, 32, '77', '890', '0', 'Purchased Diabetes Diet  Plan.', 2, 'pay_B34zNNlmjm7764', 1, '2018-09-28 18:39:09', '2018-09-28 18:39:09'),
(234, 32, '2000', '0', '2000', 'Wallet money', 1, 'pay_B34zpKtTUphSyw', 1, '2018-09-28 18:39:34', '2018-09-28 18:39:34'),
(235, 32, '0', '790', '1210', 'Payment of Wellness Plan', 1, 'null', 1, '2018-09-28 18:39:46', '2018-09-28 18:39:46'),
(236, 32, '0', '890', '320', 'Payment of Diabetes Diet Plan', 1, 'null', 1, '2018-09-28 19:08:21', '2018-09-28 19:08:21'),
(237, 32, '570', '890', '0', 'Purchased Diabetes Diet  Plan.', 2, 'pay_B35XQf5vPchduQ', 1, '2018-09-28 19:11:25', '2018-09-28 19:11:25'),
(238, 32, '790', '790', '0', 'Purchased Wellness  Plan.', 2, 'pay_B35tuJr12h4a9s', 1, '2018-09-28 19:32:41', '2018-09-28 19:32:41'),
(239, 32, '2190', '2190', '0', 'Purchased Wellness Premium Plan.', 2, 'pay_B35umW8PbhJQdc', 1, '2018-09-28 19:33:30', '2018-09-28 19:33:30'),
(240, 50, '790', '790', '0', 'Purchased Wellness  Plan.', 2, 'pay_B38hwbHcQgehmB', 1, '2018-09-28 22:17:25', '2018-09-28 22:17:25'),
(241, 32, '2190', '2190', '0', 'Purchased Wellness Premium Plan.', 2, 'pay_B39Qd4ItAQfPe2', 1, '2018-09-28 22:59:41', '2018-09-28 22:59:41'),
(242, 51, '890', '890', '0', 'Purchased Diabetes Diet  Plan.', 2, 'pay_B39TMI4kiz8nEq', 1, '2018-09-28 23:02:20', '2018-09-28 23:02:20'),
(243, 36, '170', '2190', '0', 'Purchased Wellness Premium Plan.', 2, 'pay_B39UljZuc2Qls4', 1, '2018-09-28 23:03:38', '2018-09-28 23:03:38'),
(244, 47, '1', '0', '1', 'Navneet Goyal', 2, 'pay_B3UbG6pSCrULh8', 1, '2018-09-29 19:43:26', '2018-09-29 19:43:26'),
(245, 36, '1', '0', '1', 'test doctor', 2, 'pay_B3b3kmc7q6jTB8', 1, '2018-09-30 02:01:30', '2018-09-30 02:01:30'),
(246, 36, '790', '790', '1', 'Purchased Personal Wellness Monthly Plan.', 2, 'pay_B3b4bkUrSTYRwU', 1, '2018-09-30 02:02:16', '2018-09-30 02:02:16'),
(247, 36, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-10-01 17:57:32', '2018-10-01 17:57:32'),
(248, 32, '1', '0', '1', 'test doctor', 2, 'pay_B4G3BhcU6PDU8y', 1, '2018-10-01 18:07:21', '2018-10-01 18:07:21'),
(249, 32, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-10-01 18:09:58', '2018-10-01 18:09:58'),
(250, 32, '1', '0', '1', 'test doctor', 2, 'pay_B4G8j3A97uefaH', 1, '2018-10-01 18:12:36', '2018-10-01 18:12:36'),
(251, 32, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-10-01 18:13:23', '2018-10-01 18:13:23'),
(252, 32, '1', '0', '1', 'test doctor', 2, 'pay_B4GDBRecauY109', 1, '2018-10-01 18:16:49', '2018-10-01 18:16:49'),
(253, 32, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-10-01 18:19:00', '2018-10-01 18:19:00'),
(254, 32, '790', '790', '0', 'Purchased Personal Wellness Monthly Plan.', 2, 'pay_B4IndD6KsDSf8R', 1, '2018-10-01 20:48:42', '2018-10-01 20:48:42'),
(256, 44, '0', '1', '0', 'Add money.', 1, 'null', 1, '2018-10-01 23:05:48', '2018-10-01 23:05:48'),
(257, 30, '0', '1', '116', 'Add money.', 1, 'null', 1, '2018-10-02 22:38:56', '2018-10-02 22:38:56'),
(258, 30, '0', '5', '111', 'Add money.', 1, 'null', 1, '2018-12-18 01:47:00', '2018-12-18 01:47:00'),
(261, 127, '1', '1', '0', 'Purchased Personal Wellness  Plan.', 2, 'pay_Bj76V22HCtMaXE', 1, '2019-01-13 00:01:22', '2019-01-13 00:01:22'),
(262, 87, '1', '0', '1', 'Wallet money', 1, 'pay_Bj7xqq5klaPno0', 1, '2019-01-13 00:52:28', '2019-01-13 00:52:28'),
(263, 127, '1', '0', '1', 'Wallet money', 1, 'pay_Bj83ne73n3qswo', 1, '2019-01-13 00:58:01', '2019-01-13 00:58:01'),
(264, 128, '1', '0', '1', 'Wallet money', 1, 'pay_Bj8Alo62R0eumm', 1, '2019-01-13 01:04:36', '2019-01-13 01:04:36'),
(265, 128, '0', '1', '0', 'Payment of Full Body Checkup Plan', 1, 'null', 1, '2019-01-13 01:04:52', '2019-01-13 01:04:52'),
(266, 128, '0', '1', '-1', 'Payment of Full Body Checkup Plan', 1, 'null', 1, '2019-01-13 01:05:28', '2019-01-13 01:05:28'),
(268, 129, '0', '2490', '7510', 'Payment of Diabetes Total Control Plan', 1, 'null', 1, '2019-01-13 01:18:40', '2019-01-13 01:18:40'),
(269, 129, '0', '2490', '5020', 'Payment of Diabetes Total Control Plan', 1, 'null', 1, '2019-01-13 01:19:35', '2019-01-13 01:19:35'),
(270, 129, '0', '2490', '2530', 'Payment of Diabetes Total Control Plan', 1, 'null', 1, '2019-01-13 01:19:48', '2019-01-13 01:19:48'),
(271, 129, '0', '2490', '40', 'Payment of Diabetes Total Control Plan', 1, 'null', 1, '2019-01-13 01:20:09', '2019-01-13 01:20:09'),
(272, 129, '2450', '2490', '0', 'Purchased Diabetes Total Control  Plan.', 2, 'pay_Bj8oJPIvX2YJSo', 1, '2019-01-13 01:41:37', '2019-01-13 01:41:37'),
(274, 128, '2', '1', '0', 'Purchased Full Body Checkup  Plan.', 2, 'pay_Bj9Pl55VV3hV0L', 1, '2019-01-13 02:17:00', '2019-01-13 02:17:00'),
(278, 131, '1', '1', '0', 'Purchased Full Body Checkup  Plan.', 2, 'pay_Bj9aA7voM9hZVz', 1, '2019-01-13 02:26:49', '2019-01-13 02:26:49'),
(280, 176, '0', '1', '0', 'Add money.', 1, 'null', 1, '2019-02-23 02:19:19', '2019-02-23 02:19:19'),
(281, 127, '0', '1', '0', 'Add money.', 1, 'null', 1, '2019-03-23 18:34:47', '2019-03-23 18:34:47'),
(282, 127, '1', '0', '1', 'Drjay', 2, 'pay_CAj7Cdtx9ivVU9', 1, '2019-03-23 18:45:23', '2019-03-23 18:45:23'),
(283, 127, '0', '1', '0', 'Add money.', 1, 'null', 1, '2019-03-23 18:45:48', '2019-03-23 18:45:48'),
(284, 127, '1', '0', '1', 'Drjay', 2, 'pay_CAj7xbUHrGGWCh', 1, '2019-03-23 18:46:09', '2019-03-23 18:46:09'),
(285, 127, '0', '1', '0', 'Add money.', 1, 'null', 1, '2019-03-23 18:46:24', '2019-03-23 18:46:24'),
(286, 127, '1', '0', '1', 'Drjay', 2, 'pay_CAj8WgklDoyAmd', 1, '2019-03-23 18:46:39', '2019-03-23 18:46:39'),
(287, 127, '0', '1', '0', 'Add money.', 1, 'null', 1, '2019-03-23 18:46:57', '2019-03-23 18:46:57'),
(288, 127, '10', '0', '10', 'Wallet money', 1, 'pay_CAjAjegmmQUD2f', 1, '2019-03-23 18:48:44', '2019-03-23 18:48:44'),
(289, 127, '0', '1', '9', 'Add money.', 1, 'null', 1, '2019-03-23 18:53:11', '2019-03-23 18:53:11'),
(290, 127, '0', '1', '8', 'Add money.', 1, 'null', 1, '2019-03-23 18:54:15', '2019-03-23 18:54:15'),
(291, 127, '0', '1', '7', 'Add money.', 1, 'null', 1, '2019-03-23 18:57:18', '2019-03-23 18:57:18'),
(292, 127, '0', '1', '6', 'Add money.', 1, 'null', 1, '2019-03-23 19:00:28', '2019-03-23 19:00:28'),
(293, 127, '0', '1', '5', 'Add money.', 1, 'null', 1, '2019-03-23 19:07:25', '2019-03-23 19:07:25'),
(294, 127, '0', '1', '4', 'Add money.', 1, 'null', 1, '2019-03-23 19:08:39', '2019-03-23 19:08:39'),
(295, 127, '0', '1', '3', 'Add money.', 1, 'null', 1, '2019-03-23 19:18:14', '2019-03-23 19:18:14'),
(296, 127, '0', '1', '2', 'Add money.', 1, 'null', 1, '2019-03-23 19:28:42', '2019-03-23 19:28:42'),
(297, 127, '0', '1', '1', 'Add money.', 1, 'null', 1, '2019-03-23 19:29:16', '2019-03-23 19:29:16'),
(298, 127, '0', '1', '0', 'Add money.', 1, 'null', 1, '2019-03-23 19:29:35', '2019-03-23 19:29:35'),
(299, 127, '20', '0', '20', 'Wallet money', 1, 'pay_CAjtrGpUPP555Q', 1, '2019-03-23 19:31:27', '2019-03-23 19:31:27'),
(300, 127, '0', '1', '19', 'Add money.', 1, 'null', 1, '2019-03-23 19:31:55', '2019-03-23 19:31:55'),
(301, 127, '0', '1', '18', 'Add money.', 1, 'null', 1, '2019-03-23 19:46:12', '2019-03-23 19:46:12'),
(302, 127, '0', '1', '17', 'Add money.', 1, 'null', 1, '2019-03-23 20:04:26', '2019-03-23 20:04:26'),
(303, 127, '0', '1', '16', 'Add money.', 1, 'null', 1, '2019-03-23 20:05:07', '2019-03-23 20:05:07'),
(304, 127, '0', '1', '15', 'Payment of Full Body Checkup Plan', 1, 'null', 1, '2019-06-25 00:10:20', '2019-06-25 00:10:20'),
(305, 127, '100', '0', '115', 'Add money', 1, 'pay_Cldjv6cMvGsFgw', 1, '2019-06-25 01:32:57', '2019-06-25 01:32:57'),
(306, 127, '120', '0', '235', 'aa', 1, 'pay_CldYTKMwbtao5J', 1, '2019-06-25 01:33:22', '2019-06-25 01:33:22'),
(307, 205, '120', '0', '120', 'Add money', 1, 'pay_Cn8F07mlvDBsj3', 1, '2019-06-28 20:02:13', '2019-06-28 20:02:13'),
(308, 208, '1', '1', '0', 'Purchased Full Body Checkup  Plan.', 2, 'pay_Crtz8E0rnOveaH', 1, '2019-07-10 08:50:34', '2019-07-10 08:50:34'),
(309, 127, '165', '0', '400', 'Drjay', 2, 'pay_CujOzhSCtu3zQl', 1, '2019-07-17 12:26:20', '2019-07-17 12:26:20'),
(310, 127, '100', '0', '500', 'Dr Anu sidana', 2, 'pay_CujVRpvijsZFdP', 1, '2019-07-17 12:32:26', '2019-07-17 12:32:26'),
(311, 127, '500', '0', '1000', 'Add money', 1, 'pay_CvVR2DaEkmPU3d', 1, '2019-07-19 11:25:36', '2019-07-19 11:25:36'),
(312, 127, '0', '400', '600', 'Add money.', 1, 'null', 1, '2019-07-19 11:46:27', '2019-07-19 11:46:27'),
(313, 127, '0', '400', '200', 'Add money.', 1, 'null', 1, '2019-07-19 11:49:03', '2019-07-19 11:49:03'),
(314, 127, '200', '0', '400', 'Drjay', 2, 'pay_CvWLY7LhLdcVKw', 1, '2019-07-19 12:19:16', '2019-07-19 12:19:16'),
(315, 127, '0', '400', '0', 'Add money.', 1, 'null', 1, '2019-07-22 06:27:45', '2019-07-22 06:27:45'),
(316, 127, '0', '400', '-400', 'Add money.', 1, 'null', 1, '2019-07-22 06:54:21', '2019-07-22 06:54:21'),
(317, 127, '0', '400', '-800', 'Add money.', 1, 'null', 1, '2019-07-23 06:31:00', '2019-07-23 06:31:00'),
(318, 127, '0', '400', '-1200', 'Add money.', 1, 'null', 1, '2019-07-23 10:30:27', '2019-07-23 10:30:27'),
(319, 127, '0', '400', '-1600', 'Add money.', 1, 'null', 1, '2019-07-23 10:31:30', '2019-07-23 10:31:30'),
(320, 199, '0', '400', '-400', 'Add money.', 1, 'null', 1, '2019-07-23 11:00:17', '2019-07-23 11:00:17'),
(321, 127, '2000', '0', '400', 'Drjay', 2, 'pay_CxoaraQSHAREHG', 1, '2019-07-25 07:28:02', '2019-07-25 07:28:02'),
(322, 127, '0', '400', '0', 'Add money.', 1, 'null', 1, '2019-07-25 07:28:20', '2019-07-25 07:28:20'),
(323, 127, '400', '0', '400', 'Drjay', 2, 'pay_CxodNZbbi5rmxs', 1, '2019-07-25 07:30:26', '2019-07-25 07:30:26'),
(324, 127, '0', '400', '0', 'Add money.', 1, 'null', 1, '2019-07-25 07:30:39', '2019-07-25 07:30:39'),
(325, 127, '1000', '0', '1000', 'Add money', 1, 'pay_CxoeYfEkrsOX7t', 1, '2019-07-25 07:31:32', '2019-07-25 07:31:32'),
(326, 127, '0', '400', '600', 'Add money.', 1, 'null', 1, '2019-07-25 07:31:56', '2019-07-25 07:31:56'),
(327, 127, '0', '18', '582', 'Add money.', 1, 'null', 1, '2019-07-26 10:05:02', '2019-07-26 10:05:02'),
(328, 127, '0', '18', '564', 'Add money.', 1, 'null', 1, '2019-07-26 10:11:04', '2019-07-26 10:11:04'),
(329, 127, '0', '18', '546', 'Add money.', 1, 'null', 1, '2019-07-26 10:13:19', '2019-07-26 10:13:19'),
(330, 127, '0', '18', '528', 'Add money.', 1, 'null', 1, '2019-07-26 10:19:08', '2019-07-26 10:19:08'),
(331, 127, '0', '18', '510', 'Add money.', 1, 'null', 1, '2019-07-26 10:21:20', '2019-07-26 10:21:20'),
(332, 213, '18', '0', '18', 'Drjay', 2, 'pay_CyYuH85C5SLDWu', 1, '2019-07-27 04:46:34', '2019-07-27 04:46:34'),
(333, 213, '0', '18', '0', 'Add money.', 1, 'null', 1, '2019-07-27 04:49:07', '2019-07-27 04:49:07'),
(334, 213, '0', '18', '-18', 'Add money.', 1, 'null', 1, '2019-07-27 04:57:03', '2019-07-27 04:57:03'),
(335, 213, '36', '0', '18', 'Drjay', 2, 'pay_CyZPSJgVgXO4WK', 1, '2019-07-27 05:15:50', '2019-07-27 05:15:50'),
(336, 213, '0', '18', '0', 'Add money.', 1, 'null', 1, '2019-07-27 05:19:28', '2019-07-27 05:19:28'),
(337, 127, '0', '18', '492', 'Add money.', 1, 'null', 1, '2019-07-31 06:29:50', '2019-07-31 06:29:50'),
(338, 127, '0', '18', '474', 'Add money.', 1, 'null', 1, '2019-08-01 05:51:26', '2019-08-01 05:51:26'),
(339, 127, '0', '18', '456', 'Add money.', 1, 'null', 1, '2019-08-01 05:58:10', '2019-08-01 05:58:10'),
(340, 127, '0', '18', '438', 'Add money.', 1, 'null', 1, '2019-08-01 07:44:20', '2019-08-01 07:44:20'),
(341, 127, '0', '18', '420', 'Add money.', 1, 'null', 1, '2019-08-01 08:32:17', '2019-08-01 08:32:17'),
(342, 127, '0', '18', '402', 'Add money.', 1, 'null', 1, '2019-08-01 08:33:42', '2019-08-01 08:33:42'),
(343, 127, '0', '18', '384', 'Add money.', 1, 'null', 1, '2019-08-01 10:39:18', '2019-08-01 10:39:18'),
(344, 213, '500', '0', '500', 'Add money', 1, 'pay_D33aMNMPZePSFP', 1, '2019-08-07 18:52:58', '2019-08-07 18:52:58'),
(345, 213, '0', '1', '499', 'Payment of Full Body Checkup Plan', 1, 'null', 1, '2019-08-07 18:53:54', '2019-08-07 18:53:54'),
(346, 213, '0', '1', '498', 'Payment of Full Body Checkup Plan', 1, 'null', 1, '2019-08-07 18:55:00', '2019-08-07 18:55:00'),
(347, 200, '18', '0', '18', 'Drjay', 2, 'pay_D3JQcuhGRhayAO', 1, '2019-08-08 10:22:51', '2019-08-08 10:22:51'),
(348, 218, '50', '0', '50', 'Add money', 1, 'pay_D3JppLzew8neMP', 1, '2019-08-08 10:46:43', '2019-08-08 10:46:43'),
(349, 127, '50', '0', '434', 'Add money', 1, 'pay_D3K4eHGLF4XTft', 1, '2019-08-08 11:00:44', '2019-08-08 11:00:44'),
(350, 127, '0', '18', '416', 'Add money.', 1, 'null', 1, '2019-08-08 11:23:42', '2019-08-08 11:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_list`
--

CREATE TABLE `pharmacy_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pharmacy_list`
--

INSERT INTO `pharmacy_list` (`id`, `name`, `location`, `city_id`, `email`, `contact_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pharmasi 1 ', 'ahmedabad', 9, 'testbyinnovius@gmail.com', '8460521189', 1, NULL, NULL),
(3, 'pharmasi 2', 'ahmedabad', 10, 'testbyinnovius@gmail.com', '8460521184', 1, NULL, NULL),
(4, 'pharmasi 3', 'Tajganj, Agra, Uttar Pradesh, India', 1, 'testbyinnovius@gmail.com', '8460525184', 1, NULL, NULL),
(5, 'abc', 'Tajganj, Agra, Uttar Pradesh, India', 1, 'priyanka.innovius@gmail.com', '7845784547', 1, '2019-07-26 12:45:44', '2019-07-26 12:45:44'),
(7, 'innovius sdsd', 'Aarhus, Denmark', 1, 'priyanka.innovius@gmail.com', '7845784547', 1, '2019-07-26 13:01:48', '2019-07-26 13:28:19'),
(8, 'ICICI1212', 'Forest Colony, Tajganj, Agra, Uttar Pradesh, India', 1, 'priyanka.innovius@gmail.com', '7845784547', 1, '2019-07-26 13:02:33', '2019-07-27 04:33:48'),
(9, 'Radhey Shyam Chemist', 'Jaipur House Colony, Agra, Uttar Pradesh, India', 1, 'kiaracaresworth@gmail.com', '9898989898', 1, '2019-07-31 11:40:02', '2019-07-31 11:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `plan_description`
--

CREATE TABLE `plan_description` (
  `id` int(11) NOT NULL,
  `plan_id` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_description`
--

INSERT INTO `plan_description` (`id`, `plan_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 'Full Access to Vital X Health App', 1, '2018-09-04 02:31:34', '2018-09-30 00:31:35'),
(3, 4, '2 Personalized Health & Diet Consultations', 1, '2018-09-09 17:17:49', '2018-10-31 20:15:37'),
(4, 4, 'Lab Tests: Complete Blood Count, TSH, Liver Function Test, Kidney Function Test, Lipid Profile, Fasting Blood Sugar (Once)', 1, '2018-09-09 17:18:48', '2018-10-31 20:38:56'),
(5, 4, '1 ECG with MD Medicine Doctor Consultation', 1, '2018-09-09 17:21:56', '2018-10-31 20:29:11'),
(7, 3, 'Full Access to Vital X Health App', 1, '2018-09-28 01:56:09', '2018-09-30 00:26:35'),
(8, 3, 'Lab Tests: Complete Blood Count, TSH, Kidney Function Test, Fasting Blood Sugar, Lipid Profile (Once)', 1, '2018-09-28 01:56:29', '2018-10-31 18:28:27'),
(12, 5, 'Full Access to Vital X Health App', 1, '2018-09-28 02:02:52', '2018-09-30 00:36:27'),
(13, 5, '6 Personalized Health & Diet Consultations', 1, '2018-09-28 02:03:08', '2018-10-22 15:52:24'),
(14, 5, 'Lab Tests: HbA1c, S. Uric Acid, S. Creatinine, Fasting Blood Sugar (Once)', 1, '2018-09-28 02:03:39', '2018-10-31 20:13:21'),
(15, 5, '1 Diabetes Consultation with MD Medicine Doctor', 1, '2018-09-28 02:04:04', '2018-10-31 20:13:40'),
(18, 3, 'Ideal Health Checkup Plan for all age groups with or without health issues', 1, '2018-09-30 00:30:27', '2018-11-01 22:54:32'),
(19, 1, 'Full Access to Vital X Health App', 1, '2018-10-31 00:56:33', '2018-10-31 00:56:33'),
(20, 1, '2 Personalized Health & Diet Consultations', 1, '2018-10-31 00:56:42', '2018-10-31 00:56:42'),
(21, 1, 'Managing Stress & Sleep Patterns', 1, '2018-10-31 00:56:49', '2018-10-31 00:56:49'),
(22, 1, 'Ideal Diet Plan for Overweight, Diabetes, Digestion Issues', 1, '2018-10-31 00:56:58', '2018-10-31 00:56:58'),
(23, 2, 'Full Access to Vital X Health App', 1, '2018-10-31 00:58:39', '2018-10-31 00:58:39'),
(26, 6, 'Full Access to Vital X Health App', 1, '2018-10-31 20:35:42', '2018-10-31 20:35:42'),
(27, 6, '6 Personalized Health & Diet Consultations', 1, '2018-10-31 20:35:53', '2018-10-31 20:35:53'),
(28, 6, 'Lab Tests: TSH, Liver Function Test, Lipid Profile, Fasting Blood Sugar (Once)', 1, '2018-10-31 20:36:31', '2018-10-31 20:36:31'),
(29, 6, '1 ECG with MD Medicine Doctor Consultation', 1, '2018-10-31 20:36:58', '2018-10-31 20:36:58'),
(30, 2, '6 Personalized Health & Diet Consultations', 1, '2018-11-27 02:59:56', '2018-11-27 02:59:56'),
(31, 2, 'Lab Tests: HbA1c, Lipid Profile, Kidney Function Test, TSH, Fasting Blood Sugar (Once)', 1, '2018-11-27 03:00:04', '2018-11-27 03:00:04'),
(32, 2, '3 Diabetes Consultation with MD Medicine Doctor', 1, '2018-11-27 03:00:12', '2018-11-27 03:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `pointofcare`
--

CREATE TABLE `pointofcare` (
  `id` int(1) NOT NULL,
  `user_id` int(10) NOT NULL,
  `poc_no` varchar(255) NOT NULL,
  `manager_name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pointofcare`
--

INSERT INTO `pointofcare` (`id`, `user_id`, `poc_no`, `manager_name`, `city`, `address`, `pincode`, `phone_number`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(3, 0, '102', 'abcdef', 'ahmedabadd', NULL, '3800101', '1239876400', 'abc12@gmail.com', '$2y$10$XGVw0KuGwArYIcadwEILVepS.rLtCdfE52K.6sucVQAwbm4EfOSoe', 1, '2019-11-08 09:57:37', '2019-11-08 10:13:13'),
(6, 0, '1234', 'xyzabc', 'ahmedabad', NULL, '380051', '9638523693', 'xyz11@gmail.com', '$2y$10$VagB2uPBGAoJxKNH1DlVWuSrcemWZxebL2n0iCXsu9hvXe6qGfuRm', 1, '2019-11-08 16:09:42', '2019-11-08 16:10:03'),
(10, 0, '11111', 'Diya', '3', 'qqqqqqq', '11111', '3333333333', 'a@gmail.com', '$2y$10$nucol8k/a5AuqEuY9mHFgOKq5hQN42oneheR20HvIUMoTFQAV86sO', 1, '2019-11-25 12:28:47', '2019-11-25 12:31:24'),
(11, 0, '2324', 'Diys', '6', 'babar road', '52685', '5555555555', 'd@gmail.com', '$2y$10$nrzCSH1Zd8FDkiwo9Tdicu71sW1n63cbyCfUeOUMEWlnRkMzXOcEC', 1, '2019-11-29 17:22:20', '2019-12-31 06:02:57'),
(15, 314, '321321', 'Sahana', '1', 'Agra', '232323', '1111111111', 'Sahana@gmail.com', '$2y$10$dBuzlk2iGRcpmOTcVz2sYOVxZn6xUf1L8ZXwtBcBhP6W7QOqkCoSS', 1, '2019-12-11 18:21:28', '2019-12-11 18:21:28'),
(16, 315, '1232323223222', 'Demo POC Care', '19', 'ahemdabad', '382150', '4444444444', 'demo.poc@gmail.com', '$2y$10$HenNyEKbOM2n7Ny9uVfm3u.Bu80ACI7B/K8Y/qOW48CvIZpvY8dMS', 1, '2019-12-11 18:30:26', '2019-12-11 18:30:26'),
(17, 316, '111111', 'Test manager', '1', 'Agra', '111111', '1111111111', 'POC@gmail.com', '$2y$10$LtYd.uBozlw.KOa1Tg6QxOCAcvS8gPKW5970Nzv8aRKsm/3JPHhHW', 1, '2019-12-11 18:34:46', '2019-12-11 18:34:46'),
(18, 318, '256256', 'POC Manager', '7', 'Lucknow', '854854', '5454545454', 'manager@gmail.com', '$2y$10$Dz4Evk35LQcDW67ER1kr2uqYXncMzIuJWHeraK1WW1.kqMbCJsXB6', 1, '2019-12-12 14:23:06', '2019-12-12 14:23:06'),
(19, 336, '454545', 'shahid', '2', 'paldi', '380007', '7855996622', 'sha@gmail.com', '$2y$10$xRAyYXhHfsOxc493//G.XOcKK7Z0u.v9Wn0fz/rPe7AvshPzRNfk2', 1, '2019-12-26 04:54:53', '2019-12-26 04:54:53'),
(20, 371, '3423234', 'pocpn1', '2', 'visnagar', '380005', '7878787878', 'pocpn1@gmail.com', '$2y$10$wZigkqbUyI8YXpjnaV01Kup9Z4gRx4ARUAtulSdl7mvVoSnEYqFEm', 1, '2020-01-03 05:15:00', '2020-01-03 05:15:00'),
(21, 386, '454545', 'docpoc', '2', 'Paldi', '380027', '4355544534', 'docpoc@gmail.com', '$2y$10$yKe75ZzJmUGJsnB7zRgpGugvNcpQVL3KrkE0KLnwqFS1YyyR9SMua', 1, '2020-01-03 08:39:32', '2020-01-03 08:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_pharmacy`
--

CREATE TABLE `prescription_pharmacy` (
  `id` int(10) UNSIGNED NOT NULL,
  `parmacy_id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `patient_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescription_pharmacy`
--

INSERT INTO `prescription_pharmacy` (`id`, `parmacy_id`, `patient_id`, `patient_name`, `patient_contact`, `city_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 127, 'sadds', '564646465464', 11, NULL, 1, '2019-07-09 08:58:34', '2019-07-09 08:58:34'),
(12, 3, 127, 'sadds', '56464646', 11, NULL, 1, '2019-07-09 09:04:58', '2019-07-09 09:04:58'),
(13, 3, 127, 'sadds', '5646464634324', 11, NULL, 1, '2019-07-09 09:06:01', '2019-07-09 09:06:01'),
(14, 3, 127, 'sadds', '5646464634324', 11, NULL, 1, '2019-07-09 09:06:35', '2019-07-09 09:06:35'),
(15, 3, 127, 'sadds', '5646464634324', 11, NULL, 1, '2019-07-09 09:22:34', '2019-07-09 09:22:34'),
(16, 3, 127, 'sadds', '5646464634324', 11, NULL, 1, '2019-07-09 09:23:04', '2019-07-09 09:23:04'),
(17, 3, 127, 'sadds', '5646464634324', 11, 'images/acF89ZEBa1r5e1MShqima1OCTEiFO4Uhnbqidp0j.jpeg,images/BtNisgYwzGEpW4NbWH0uJxBBQTH5ekW22ClqPWGc.jpeg,images/qa6gyIH4AG1VobT2e0pcnlzp1ezZrvEAs7WTSvgt.jpeg,images/CsgCiB8chB9DzYjbs7KFTuwAQTX4VoCJUJabXYXo.jpeg,images/ETXJ4V3TgDDTXlta7nEA6ePDSM21co3V93W3trhI.png', 1, '2019-07-09 09:23:56', '2019-07-09 09:23:56'),
(18, 3, 127, 'sadds', '5646464634324', 11, 'images/oAdNvuo2wDZ2Tbhq1mLak68J1Qb6XzeaDmrdRywy.jpeg,images/hMbeyM76ie3PY5wrwrezugeHdV2kfgrrjK8h8QyF.jpeg,images/DN6dMJCTIclNTfsYi12BCfFLzms8E4TiSBKN3RMb.jpeg,images/FhOPTShYvwYWZZjt3jLRWU55oXB49hJXFumPwGaf.jpeg,images/F4pfynDMEcIAt7ID7IbeXOweK5NRmYYA1TZl1WSN.png', 1, '2019-07-09 09:25:14', '2019-07-09 09:25:14'),
(19, 3, 127, 'sadds', '5646464634324', 11, 'images/CpBZKkKqpRim2Tdg3g4ybJ8hVxoQUfY6Eneqcx0p.jpeg', 1, '2019-07-09 09:41:08', '2019-07-09 09:41:08'),
(20, 3, 127, 'sadds', '5646464634324', 11, 'images/hXyrJH3cwTRkkCWqABflHFkLBOfyjnMZtSv8cQBP.jpeg', 1, '2019-07-09 09:42:07', '2019-07-09 09:42:07'),
(21, 3, 127, 'sadds', '5646464634324', 11, 'images/Jto5JtsS7bODHo9yit7APsO3SIhyYZxjmb1WSeN0.jpeg', 1, '2019-07-09 10:04:30', '2019-07-09 10:04:30'),
(22, 3, 127, 'sadds', '5646464634324', 11, 'images/wmmkIZnb0IgfzmA6o96Kh606lik7bjienoWrIt2K.jpeg', 1, '2019-07-09 10:15:54', '2019-07-09 10:15:54'),
(23, 3, 127, 'sadds', '5646464634324', 11, 'images/kHFW7cp92FAzw2qgK5lrcelb32bZfN6r8MqwHN6K.jpeg', 1, '2019-07-09 10:16:43', '2019-07-09 10:16:43'),
(24, 3, 127, 'sadds', '5646464634324', 11, 'images/TbNFwFZfzPC6ZJuZlsLOp0HryRyHmamRzwggsgsv.jpeg', 1, '2019-07-09 10:17:01', '2019-07-09 10:17:01'),
(25, 3, 127, 'sadds', '5646464634324', 11, 'images/rzJ7nvynazPebX6UNHda2516kFe5Px1TyzcRcMtX.jpeg', 1, '2019-07-09 10:17:45', '2019-07-09 10:17:45'),
(26, 3, 127, 'sadds', '5646464634324', 11, 'images/ng9ly3Tb1huxwhjNTqblB0NtEJNgJFRwiW6Ny3yR.jpeg', 1, '2019-07-09 10:18:24', '2019-07-09 10:18:24'),
(27, 3, 127, 'sadds', '5646464634324', 11, 'images/5jKYC4VQKRbFllsElkvKAIX2rWC42wyjvuUorebl.jpeg', 1, '2019-07-09 10:18:50', '2019-07-09 10:18:50'),
(28, 3, 127, 'sadds', '5646464634324', 11, 'images/n4bu062pbJ6rMW7km8WP7bWX6ayoOWzdb5KluAn3.jpeg', 1, '2019-07-09 10:19:19', '2019-07-09 10:19:19'),
(29, 3, 127, 'sadds', '5646464634324', 11, 'images/KLM7ZaLR3TNJoxATAkAMTQrAOpkH2NIZZ3h9nLwA.jpeg', 1, '2019-07-09 10:19:30', '2019-07-09 10:19:30'),
(30, 3, 127, 'sadds', '5646464634324', 11, 'images/LocZpl0pFGD5ylD879n1Em3lmAZiAoLvZKxQNwZA.jpeg', 1, '2019-07-09 10:19:52', '2019-07-09 10:19:52'),
(31, 3, 127, 'sadds', '5646464634324', 11, 'images/kFQcmY6MdWt1agCyvT1l2ftRqnE3XOJPjawVdN94.jpeg', 1, '2019-07-09 10:23:18', '2019-07-09 10:23:18'),
(32, 3, 127, 'sadds', '5646464634324', 11, 'images/TtVi9AmwoeFjDtjAYUz9rDy6fI8L0UJnmM4DWDRo.jpeg', 1, '2019-07-09 10:23:45', '2019-07-09 10:23:45'),
(33, 3, 127, 'sadds', '5646464634324', 11, 'images/8nOOm7rKnm93h5l7KtaydhmeSc5O27qCu2sz6GOL.jpeg', 1, '2019-07-09 10:26:06', '2019-07-09 10:26:06'),
(34, 3, 127, 'sadds', '5646464634324', 11, 'images/vxnjPYUxFWTnnG5nGGbSZgEx15sT8ND4KBET1jH2.jpeg', 1, '2019-07-09 10:26:27', '2019-07-09 10:26:27'),
(35, 3, 127, 'sadds', '5646464634324', 11, 'images/SuEuDBlZtN2YDNIADYl7tIblFgwgEuCSgCvzU63H.jpeg', 1, '2019-07-09 10:30:04', '2019-07-09 10:30:04'),
(36, 3, 127, 'sadds', '5646464634324', 11, 'images/p4sYr8AWAFYTSe4gDdrC313Z3Sjs9ZNs9XPzhI7u.jpeg', 1, '2019-07-09 10:30:10', '2019-07-09 10:30:10'),
(37, 3, 127, 'sadds', '5646464634324', 11, 'images/6zy3eSAMCIfGcC5Y4uNLEq8Xw90zfV1flSV9PNO1.jpeg', 1, '2019-07-09 10:30:21', '2019-07-09 10:30:21'),
(38, 3, 127, 'sadds', '5646464634324', 11, 'images/KRVTngPg7OEEsztk5dXUhKrm0ukVH9h9exxuiTUS.jpeg', 1, '2019-07-09 10:30:32', '2019-07-09 10:30:32'),
(39, 3, 127, 'sadds', '5646464634324', 11, 'images/b43NlEN77nnXcbH2oUq6si0aTC0MrmSdEHEqbk5I.jpeg', 1, '2019-07-09 10:30:49', '2019-07-09 10:30:49'),
(40, 3, 127, 'sadds', '5646464634324', 11, 'images/lnnrGVAi2UyOwpoDPS8yQlCMNFendTxsAyjCtr5S.jpeg', 1, '2019-07-09 10:32:28', '2019-07-09 10:32:28'),
(41, 3, 127, 'sadds', '5646464634324', 11, 'images/6Mv28tCG98D4SLTFevbNveBG2kNYHFFo3WumlXWq.jpeg', 1, '2019-07-09 10:32:56', '2019-07-09 10:32:56'),
(42, 3, 127, 'sadds', '5646464634324', 11, 'images/F2GJ1ukxP0v1Lr9tA7C8MBfptcoWT49tbNuuxmik.jpeg', 1, '2019-07-09 10:33:13', '2019-07-09 10:33:13'),
(43, 3, 127, 'sadds', '5646464634324', 11, 'images/hpUyxfVNcMdKlHCjkfKe2YFAGqP1Rf3DNPjvXAhs.jpeg', 1, '2019-07-09 10:33:35', '2019-07-09 10:33:35'),
(44, 3, 127, 'sadds', '5646464634324', 11, 'images/UvHYLtAqj8MbDUiFxIYFxodoFYdIf9or6OwNmYF1.jpeg', 1, '2019-07-09 10:33:46', '2019-07-09 10:33:46'),
(45, 3, 127, 'sadds', '5646464634324', 11, 'images/h7tBLbAPVfkFPoMYOFLjgU7H27qE7tzIe84964b2.jpeg', 1, '2019-07-09 10:34:35', '2019-07-09 10:34:35'),
(46, 3, 127, 'testp', '5646464634324', 11, 'images/BF1Y6dKTtZbdaMykKuJNmTntWSpDTvWxT89ZaPU4.jpeg,images/K8vynQ6TVzlycGIqRXFuJhJGElVq34NL9PT1Clvf.jpeg,images/qPCzlemYqEn6Cr8aY27HEYszNeBZNJDmxLBzoaLI.jpeg,images/8dGs1lA6NjZpkFWWKQAYGjTi2kHOIUY5w2gRr686.jpeg,images/ViwEF1s9pmtzulAGxM5HPHLnd71tVsOzhNeBSEpJ.jpeg', 1, '2019-07-09 10:35:24', '2019-07-09 10:35:24'),
(47, 3, 127, 'testp', '5646464634324', 11, 'images/3MCqnXjL5wGEnwrZSjxGjtJBhEgwsycmJ8sjEAtY.jpeg,images/583yuNwHb2iNLnltXSaHXtSDUOR0gC1duMGt3Lyk.jpeg,images/wp20RQFS9DcXjctloKbPVH7NBWh0fN5PiRxrYG3M.jpeg,images/xLwfGIXQrt4D5WsmTpv7irRb6H3WaOUOKouiOGHu.jpeg,images/WiMreHpxBIMyZJpc8jES2tBUKgy6O04B3Q8sg05H.jpeg', 1, '2019-07-09 10:39:21', '2019-07-09 10:39:21'),
(48, 3, 127, 'testp', '5646464634324', 11, 'images/19R4Fgy82CrQ6FuDWjBsdGjApiXDbNiZnIt7RO9h.jpeg,images/jzWfRFls99rQpqoWcabMuUoptiSZighkWUYQFpiO.jpeg,images/uHV5ANpMOsveNu7ZK3PToIZ7gdioTZIaUnlo8kz8.jpeg,images/MAU4LdgtMqxhSqXFNEzwBJi519o5mMWuCe3PsRzF.jpeg,images/eNUyvMR0XM0c9FrYEGdHPlfsNpZBm9XiVk6FLRrv.jpeg', 1, '2019-07-09 11:15:06', '2019-07-09 11:15:06'),
(49, 3, 127, 'testp', '5646464634324', 11, 'images/F6r0CzfitGGy2XniULMtXQ8VKQWaSrJfAFrevgrm.jpeg,images/GiCL5zg9aMKq7sDe6w4FEBoK2QgLQYzHcKot8dmx.jpeg,images/7ZwBvkPSboAYGm2lsI1XYEm7Dm6msyRM58JjVEB7.jpeg,images/ISSSuCroWxwcdLl1Z8Hpghc4LbwDpUaUvFQhXLxh.jpeg,images/4ucVvejSNabIgFM25zkAC2g0r1ZgxZ9YGqkl3foM.jpeg', 1, '2019-07-09 11:18:03', '2019-07-09 11:18:03'),
(50, 3, 127, 'testp', '5646464634324', 11, 'images/xyag8BDi48sKU3o20WRz1lOFBxRI1sQKeN8wXkSB.jpeg,images/jgrpcMFVsqj0hho7Yumlu8nlGP7Wm4BFTHG7zqIy.jpeg,images/Ay6uhSAxfj9AyiBR2ZBrRa0IKRCo6Lrx9FnIXkbM.jpeg,images/z5PSHgZ47Im8SLuMFz5kC1l0AXcFSUfoZ3eZELXK.jpeg,images/146Jk67UqhKEWZyiyOpfTgnq2ot2rIcVfdpf3h5e.jpeg', 1, '2019-07-09 11:18:14', '2019-07-09 11:18:14'),
(51, 3, 127, 'testp', '5646464634324', 11, 'images/O8Dz2FWRrXYivkpW8Q4wGYvO9KBVtUWOY9Dnzo4k.jpeg,images/lZjvoISNHRy6hNucKaOqWGvDeLJmhnSffIB8hKta.jpeg,images/amllOgyoveMwBXBXShK8KDJxcI6joB5GWEsXbwjT.jpeg,images/4JjRcnpQ680NQ1emAqSFKMVShkiYGi34JoagRNSp.jpeg,images/OWcnQeGMF3VzlXwV4LfneLBTNayjNFQhqi6XTBiK.jpeg', 1, '2019-07-09 11:18:30', '2019-07-09 11:18:30'),
(52, 3, 127, 'testp', '5646464634324', 11, 'images/wIXXksIYcZFsdj0A1qsNOBhyfV97aJG1DpvDYrWa.jpeg,images/qvm2gf4rTXdSGxLmGdgPQtKkMf4Gr3Amd8ejObrF.jpeg,images/CzTAVKR5rdFphAvA6NR8NiNPHROjKVKhJ4iowfUX.jpeg,images/ZIm8mywNde80SFHPJWS6FN6fX1B02DrrsV6fZ0pF.jpeg,images/nb2YJJu67kYQGfpfBJnTeslQzV2AEP7XcBV0vtN0.jpeg', 1, '2019-07-09 11:19:09', '2019-07-09 11:19:09'),
(53, 3, 127, 'testp', '5646464634324', 11, 'images/AfbbFziz2n1h62h9xlmf5Vrzdt5XDP1XJeRXlHLY.jpeg,images/jqeWY0xyvnzdKZuOkZ1dp8MEb76FCwe9E6L3BwoF.jpeg,images/f7gf0bINwyvHth8hCk4GfXySVlUqf6NP2faYVoX8.jpeg,images/Pi6yNSVnxlQMmWrhEdlr7xNZr1Zp8NrWPGWogxk3.jpeg,images/mcCEAT31dvewtstNTqKVAlDG5dfUmENsnIO4mCS0.jpeg', 1, '2019-07-09 11:19:19', '2019-07-09 11:19:19'),
(54, 3, 127, 'testp', '5646464634324', 11, 'images/onZjRDHMeq8ocCsQM2XUgjGbifcOCDDJazAFVnif.jpeg,images/JcgO680iOTWMNxFgV8gllYNW8dOzf6tpPp9ywVNa.jpeg,images/tI0SnWpmdvfjpdB0NbR2V7YkkhWVrAKvYTpBMHxE.jpeg,images/mO7wZXV9kN02QBZY4gYdJF80xbepvmQFovRIyZSm.jpeg,images/eyb3FHsDAkOofNE27sfCih5BpVpWT05Oz7p2PArA.jpeg', 1, '2019-07-09 11:19:31', '2019-07-09 11:19:31'),
(55, 3, 127, 'testp', '5646464634324', 11, 'images/h2IPLZQ4sSzYJSETsYHXY0Yp7FJ1Gim3nJrGlbCg.jpeg,images/tqNrBmdH8bVJfdD2wW0YvnfWVKiwYRKpwtjIhK41.jpeg,images/SqNrLYgpaM6pbNURxf9f5mwFMsW1JGJWFumAkERc.jpeg,images/Oi4pBlsl0AcnrXqwH5ESCUxrTvGxH3eHW2wW5E9w.jpeg,images/msCyZf0erQOKD8xbGjtyLEXN9Z6l0dK7QZxlIH9b.jpeg', 1, '2019-07-09 11:19:46', '2019-07-09 11:19:46'),
(56, 3, 127, 'testp', '5646464634324', 11, 'images/z0cWzpD8Nw5ZPfAvTChef9aeYeVbjrt8TprjWFyH.jpeg,images/4oZx6o3ygOWPnlwHVb5ERCLi1qfSRBhh2hmkv3Et.jpeg,images/nev5XswY2L5m9hdzpk1sQT2mEMLVp4z1fJ8jlgXv.jpeg,images/1QS2MCKUVs8E5xeAPr0waw3X9T1VqFfYhUCOQAwJ.jpeg,images/zNVlMBzhCikUGUMgRG6T5jCvns75maLxmSSGequQ.jpeg', 1, '2019-07-09 11:19:59', '2019-07-09 11:19:59'),
(57, 3, 127, 'testp', '5646464634324', 11, 'images/LRJI74GDE3MpkoWlWniFmX9g7CCtHIIZPaU2JzUr.jpeg,images/X4yRsq7L3QBZ2kQSgFBVXQd7kxJgQcGcrBpNPTPf.jpeg,images/UTrBjI23hHjE2di2A0rkoPaMyIwd8zvRbhEeo6nc.jpeg,images/EdFM6OMgDYEBXAzkaNYBdLKKKUg8tF0wnJmIWMK4.jpeg,images/pMfAfQ0LxQHkxjGfdfC8BC1B9VoV4SeSkvsJhxKH.jpeg', 1, '2019-07-09 11:20:25', '2019-07-09 11:20:25'),
(58, 3, 127, 'testp', '5646464634324', 11, 'images/A2fDkg0r6RyoKpdamXFhLjMIsBvUg937Yey6AXk0.jpeg,images/y3vhZMgUzoMPl8cX8DhOrqya8VPzEK9jyqLOE1PC.jpeg,images/PkHVpfInIDOorYchb5E5VGqnIFyQp7BhydyYNYWb.jpeg,images/T5oey3qmQRye3DVz4lXIWFquQJtvaGQQvj2bLKrb.jpeg,images/V66PqkpUfmAQs9PNfp5u26SZuZnW1qC53mhWQCC1.jpeg', 1, '2019-07-09 11:20:49', '2019-07-09 11:20:49'),
(59, 3, 127, 'testp', '5646464634324', 11, 'images/RIzmm7H4ozEo3JjBoVM6d6rfBr43cG2xTIz5MqP0.jpeg,images/Vb9bO9jROYm2AOfbVaA1CtYCeyrscfAVkKIkI7Xw.jpeg,images/eyPNa3pVWF9XVh45oxhFrq4f0PbAVNruOR9DIDir.jpeg,images/6tkrUXZfdDE0rrojILs5lyUXniaNRS8Ydsf9rvO5.jpeg,images/Dj24WQD4Gkv8KEuxSTB2rOp6AAmBLJKZKE0bPWr9.jpeg', 1, '2019-07-09 11:21:03', '2019-07-09 11:21:03'),
(60, 3, 127, 'testp', '5646464634324', 11, 'images/Llcik0ntAkKdsDmrkRyjXItngAHGbChSt04LRzM2.jpeg,images/kYhIvqmqPqDVnuSX97gqiquOSw7UGzu2gs3DheK2.jpeg,images/6r3CTOBfW8heIqdUrrenWPVfVJQT5VxWhoMwQXCo.jpeg,images/syj3qyvfAyZmzq08h8dtkwVITxsJAjXF0CHF47rN.jpeg,images/NwHWQyZnHeYusrVKwRYavWmLQlhBfzIrPwUeUb7i.jpeg', 1, '2019-07-09 11:21:19', '2019-07-09 11:21:19'),
(61, 3, 127, 'testp', '5646464634324', 11, 'images/M8rByNvIBd4gzo135VN1q40KfaOwjBXpSd6KIPwq.jpeg,images/357KooA1EVkv3ZzbUzuZXDRKWAZw3yoVGkmU7Khd.jpeg,images/HWNbFiydzrUTiF4xAN5bBk7pxTTOTXRs7Bp4g4SZ.jpeg,images/WqVTrvJdGqmhq7zmakm43veIeMHZhGPY3OnP96ls.jpeg,images/AtNKRzRfdbAfPcNgwtFgXZ1DBpmw1Cbi2RT78PAO.jpeg', 1, '2019-07-09 11:21:39', '2019-07-09 11:21:39'),
(62, 3, 127, 'testp', '5646464634324', 11, 'images/b5LD2hHbYFF7YbbFU7ok0criwRZnG9JttgOk0D2m.jpeg,images/R0G8MMaj40Ex5NMCh81OMi8ueNz8hT95R2mi42cG.jpeg,images/pLLnpYSibmekxOzOIts1zyyiVLfJ8roSaOojrXpY.jpeg,images/GHSjAVTaDxdvcdBGGGmuKOGBN4KNxDCWlzYzxfxw.jpeg,images/eyFqAUnhCuv6xBsHrExEtrbuP1hNbD30BgRHDorK.jpeg', 1, '2019-07-09 11:21:56', '2019-07-09 11:21:56'),
(63, 3, 127, 'testp', '5646464634324', 11, 'images/83Qmmry0xbbG5w8TlmGJdnrsNMMmEH2BMVJChpkd.jpeg,images/3MkTDQouBtlyner726VJgTcWJ5260JY5bg2u9XTw.jpeg,images/BsH4iHcvpOrLOQCYItNawf43hGIZcBWU0tMgDZot.jpeg,images/PcbB60ADdoWbDJR7Sy7vufSSo2IJvH9TewYGAf1s.jpeg,images/jN0jMpaVyVEZcXaji7c0QIlCKdNkCtUYskbueaUI.jpeg', 1, '2019-07-09 11:22:09', '2019-07-09 11:22:09'),
(64, 3, 127, 'testp', '5646464634324', 11, 'images/oqviI8K16BWKU43x1v6Fe1UFpAOV4wJH6IpzNDhN.jpeg,images/utK7TqwcNFvd0ma226XxgdNz7jUMXU0gQYs5UsUs.jpeg,images/vYr7qKgZ2g8XS98fVciYm7p0pfK7F4DdcJI5GfBV.jpeg,images/lLne2SMtRALxaakgYUUrPcZ4H3fhUtBbfXyqeTpb.jpeg,images/ctV6b1pItqzfR2V7X5EZbEF6POdFHj14pN7V5jxo.jpeg', 1, '2019-07-09 11:22:20', '2019-07-09 11:22:20'),
(65, 3, 127, 'testp', '5646464634324', 11, 'images/v3O47Xn4trL4nfrMn3qabA8CtadUazqMoQGX1cKp.jpeg,images/JxRaAaKLYjBCKtRYB7Mrm9HreP1lnkev4fr1wq1S.jpeg,images/ZopiAUhmDj088yaqzluVvl64C5i55W527oTZLlok.jpeg,images/rvzToL4HhzpzcnN6EObD23aLfItUSgTwW6qz3sLE.jpeg,images/SGeWUFrIXI2SyYXjHTkWWo71PSK0Yh0FHtymgyT9.jpeg', 1, '2019-07-09 11:22:32', '2019-07-09 11:22:32'),
(66, 3, 127, 'testp', '5646464634324', 11, 'images/xwy2jQYPxnslzpMW7aGUy8634vMbKG0BZSgaisVj.jpeg,images/Q7VcQDC0Hpiu53Y7mf4ejpEApdqxpsEqDovFUB7F.jpeg,images/6yEbQioW2NM1wAfwjMee5vUZ6sBYgsLoXtzkC6w9.jpeg,images/lov7s3UOoL2mHoDlV9iPh2im1t55HgKGoXzerieI.jpeg,images/MhV3xMd1xuCMsLXKrSiGx8Dlu4qvy0MUsUrCbcGI.jpeg', 1, '2019-07-09 11:22:47', '2019-07-09 11:22:47'),
(67, 3, 127, 'testp', '5646464634324', 11, 'images/qWvc3cg2K0rJHvCL59wroDrK8zzMwFbFoHQANko0.jpeg,images/QC6ySX83x2ABBk0FAyxZwZ0RoKVylRrf2mRpsA8X.jpeg,images/pzbOOhn7qclzBj3KOIOf0Lhnc2ZXzbm1WMZlczPG.jpeg,images/kuDiMRRIwvrYV1L1B5NDIkeQ58VbpjWzXzy7Siev.jpeg,images/b1zoQRTTDavW9ZQr9YCLR06e78TR0fFKNRnCYwnZ.jpeg', 1, '2019-07-09 11:23:08', '2019-07-09 11:23:08'),
(68, 3, 127, 'testp', '5646464634324', 11, 'images/3xCm8NQpqa6DJAsJzRVFVxDiW0sTTZISXOnabi8e.jpeg,images/bXpPkxB93fRZLau1qwxnvpkhd78CFQm28CvfPgv7.jpeg,images/T9Q0ow9vc42pqC58TG6ygQHnObACnIpYVqfCZLKz.jpeg,images/kOwjgCR7WhSegfH03ARNyeqduYpZqWqfb1CAlBX6.jpeg,images/xvTSTEbD6oQufms8Ss6XzOIXDgmugm97FIPgTO7u.jpeg', 1, '2019-07-09 11:23:16', '2019-07-09 11:23:16'),
(69, 3, 127, 'testp', '5646464634324', 11, 'images/WcKAWX9PcgiMkKC0XtXezyIA0YYHAXkgTqF7W9FH.jpeg,images/uUQcDl8CEa6kB5wEpiemMlqoBVtc9h8TnXrZxpbJ.jpeg,images/0Re57mwPMAhchGpPzsnvb9047FuSMJRNaed6PlMB.jpeg,images/TcgCHhR6yvdPVskUvjTO7F5NowQsG5dkersT94rX.jpeg,images/NQGSylzqnAi0jPXSOn0ofZW58KnzAxE7INgDrknG.jpeg', 1, '2019-07-09 11:24:01', '2019-07-09 11:24:01'),
(70, 3, 127, 'testp', '5646464634324', 11, 'images/n6ySq3okGK1x0L4NtyJ0RmoiHKJUO0F3evCKvGAp.jpeg,images/AeexPdLSTiF6viywj6AGq8gryUnDyBK9h8gjXfFM.jpeg,images/IeEooag7tYoodkrN0BChs2Dl9mX1QpVBuKnvburM.jpeg,images/1WgPV8lYuhrDAS0sGWQjk8eJgDXviSdJSZ5BvccQ.jpeg,images/bNmiOjkA2xrAeGeHCXj5476OfBU9KMEtf4aEc8vS.jpeg', 1, '2019-07-09 11:24:13', '2019-07-09 11:24:13'),
(71, 4, 127, 'Priyanka', '7874412012', 6, 'images/ygA3Ylz0KbEX9PprHnbkiPo86f70CCmyb8pzCt40.png,images/l2MbznvTRC4u8iSYxcHwMUfbdF4jH0wtDkF6EcfN.png', 1, '2019-07-15 06:28:54', '2019-07-15 06:28:54'),
(72, 4, 127, 'Priyanka', '7874412012', 6, 'images/GOcQKWyGsTZmxOBEplQAcQbkLmoUW51n29nRFLsa.png,images/impvh0cnBsErFfjCsZd8cghhxlzHTuDQ32tXt7P4.png', 1, '2019-07-15 06:37:26', '2019-07-15 06:37:26'),
(73, 1, 1, 'aaaa', '1233333', 2, 'images/19jo1bYj9zrN3WhFekNxZDlwxedFDCtxTyRzJ3Ig.jpeg,images/kf0cfVXGHYzqHO9SxXAx2NzGete4Hc5jfVPKlTqP.jpeg,images/vU3lEMNM6QLUvbl3tPBN64g2Mk7EcsV6O4zX2u25.jpeg', 1, '2019-07-15 06:39:04', '2019-07-15 06:39:04'),
(74, 1, 1, 'aaaa', '1233333', 2, 'images/eOqhOOe4mpf8sukeYgqiKKQZaMl9TLhw2WM0XLwA.jpeg,images/jPhwkGsISWHhHmfoJNVBvHwIFHlqG10v1yydhrjx.jpeg,images/RP75nm7Mc8V8rHhbzddxG7Y3yTilG3rACLidrxAb.jpeg', 1, '2019-07-15 06:41:09', '2019-07-15 06:41:09'),
(75, 1, 1, 'aaaa', '1233333', 2, 'images/7TUkSVB7fxBhnxo9fpoScNpu7wquo8iCEUqQBI5S.jpeg,images/j44ZbiBSRPsBQIMGRMTyYGJf8epQQZYeIIysOy5R.jpeg,images/7YjcFMtye96MXht2HX76IBpI4o6D2dl8fSHb2xDZ.jpeg', 1, '2019-07-15 06:43:19', '2019-07-15 06:43:19'),
(76, 1, 1, 'aaaa', '1233333', 2, 'images/ORWctKBwX5NZVYFiDNMtzX2Q5JIl08zUwo3fxFrf.jpeg,images/j82Ja1XkybJ2GuRjJIllm7natIX2bwtQfx8Ja5Ug.jpeg,images/j7mFbgLo7vwbViDOF9dKzNnYqWJWCXILoDTgx3RI.jpeg', 1, '2019-07-15 06:43:59', '2019-07-15 06:43:59'),
(77, 1, 1, 'aaaa', '1233333', 2, 'images/kLALpIUXxe4jbDyJwHpcKgQ0qltAUnLORKnuyNZb.jpeg,images/72VvdRdWXsWVP4o7W4cvTd78rmRA77SVSFOj9JoT.jpeg,images/CdohiflYnal8UFWb77E4rSbuInMTvFYEOphRXvb7.jpeg', 1, '2019-07-15 06:45:30', '2019-07-15 06:45:30'),
(78, 4, 127, 'Priyanka', '7874412012', 6, 'images/l8FgxYxH7fvLo2Zo6yT3tVVDxs6KbJ5bS94nmcXX.png,images/sevLrw8B4eTdmLkoanJfkIF2y3FSEXiW4hH0wibx.png', 1, '2019-07-15 06:45:53', '2019-07-15 06:45:53'),
(79, 4, 127, 'Priyanka', '7874412012', 6, 'images/HFzMqLqxU7WL0o7QLIxsdxNKctQ3dWFdhG1o3Lni.png,images/tYx1SmR32QDInZNIe1zQm191ppBUri3uMKMs7hZc.png', 1, '2019-07-15 06:47:51', '2019-07-15 06:47:51'),
(80, 3, 210, 'test', '9638520741', 10, 'images/sgLtq5hArFE3djYIWtdMWedBLynzF82dKqiClfwJ.png,images/E3G16b6oucs6QEwBXArDXWbtIAoErS7CEvxky1yI.png', 1, '2019-07-15 07:26:58', '2019-07-15 07:26:58'),
(81, 3, 127, 'priyanka', '7874412012', 10, 'images/zzvcMtdzIFaXGLCBc6AZb3mn367AWvDrpj1DDRHV.jpeg,images/E9ACujPqqydIWGCG0EjsIb4HtkhV8cut6h8FIhb0.png', 1, '2019-07-19 11:21:43', '2019-07-19 11:21:43'),
(82, 3, 127, 'priyanka', '7874412012', 10, 'images/8UqRTMiVm3LKexPUfThWcl0j6EbFDXVJ73F8PTKa.jpeg,images/aIDrEvBrGEy7CJN3oSPLxJFQTi7JF59xkhmyYXSn.jpeg,images/xFbHQAgyBZ6F1dyUXeK3aSEpXQVlmxusfhQ2izeC.jpeg', 1, '2019-07-19 11:59:16', '2019-07-19 11:59:16'),
(83, 4, 127, 'priyanka', '7874412012', 1, 'images/eRRWITULmJ9bGgZbV208ugVZssKNjqnflTiFhe5j.jpeg', 1, '2019-07-26 13:17:53', '2019-07-26 13:17:53'),
(84, 9, 201, 'Surabhi', '9358999596', 1, 'images/eeiRzTBIDFcA31oyaOJVcXaSkP0ecK5RXXXblcwz.jpeg,images/yHrrq9XZEziD0F4X6XV3JQRHgmnh5E30g4WEZDF5.jpeg,images/EEUHdZH1nxqebXvZJ5zlex5quZDtkBNHctcgIhgg.jpeg,images/bFRbsuCHh9xwaCW7niCVMJhD85UlnEWjvgNGjn25.jpeg,images/ZxCCdf2sfOXbiboKlRI8KyetB6l1WdV4ZRByU476.jpeg,images/cZAY2ell2E9DgQIQM7K7bRqdBDvyunTrJey3d44i.jpeg,images/eYDcuYzC03TbtTNCy8v4CsWlEacdSC58rvisD5Ys.jpeg', 1, '2019-07-31 11:41:59', '2019-07-31 11:41:59'),
(85, 9, 201, 'Surabhi', '9358999596', 1, 'images/9xjkkpWsmtsSXLSKlr4gK20xpYEsVu6N7pwhyCRG.jpeg,images/PdwNGHLRfd9PAuxI4kjIuCxn447Np01pqinwiVvj.jpeg,images/OWsfnpkGYef58DFsNWMDgNtgepQ02X8i7kxAgvMx.jpeg,images/aARUPoxI5zJnj2J2YLRFvkZs24ti3VmkK31txdSo.jpeg,images/MORCp2VYlZu3frbcHkSCo7JRAvC66lAXHpuwi7Bj.jpeg,images/lKzLYHJH8V6SMBNT8ykRV0ditkB36BDbwobwBejv.jpeg,images/QMG3cWYROcJCs5DDRuAmyRy2GEzp5uf5XCWrEvEY.jpeg', 1, '2019-07-31 11:42:49', '2019-07-31 11:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `question_doctors`
--

CREATE TABLE `question_doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_doctors`
--

INSERT INTO `question_doctors` (`id`, `patient_id`, `doctor_id`, `city_id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 127, 4, 11, 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', NULL, 1, '2019-07-09 06:34:13', '2019-07-09 06:34:13'),
(2, 127, 4, 11, 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', NULL, 1, '2019-07-09 06:47:16', '2019-07-09 06:47:16'),
(3, 127, 4, 11, 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', NULL, 1, '2019-07-09 06:50:50', '2019-07-09 06:50:50'),
(4, 127, 4, 11, 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa saasd', NULL, 1, '2019-07-09 06:51:31', '2019-07-09 06:51:31'),
(5, 127, 4, 11, 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa saasd', NULL, 1, '2019-07-09 06:52:26', '2019-07-09 06:52:26'),
(6, 127, 4, 11, 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa saasd', NULL, 1, '2019-07-09 06:54:46', '2019-07-09 06:54:46'),
(7, 127, 4, 11, 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa saasd', NULL, 1, '2019-07-09 06:56:29', '2019-07-09 06:56:29'),
(8, 127, 4, 11, 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa saasd', NULL, 1, '2019-07-09 06:56:49', '2019-07-09 06:56:49'),
(9, 127, 4, 11, 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa saasd', NULL, 1, '2019-07-09 06:57:21', '2019-07-09 06:57:21'),
(10, 127, 4, 11, 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa saasd', NULL, 1, '2019-07-09 06:59:19', '2019-07-09 06:59:19'),
(11, 127, 4, 11, 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa saasd', NULL, 1, '2019-07-09 07:01:28', '2019-07-09 07:01:28'),
(12, 127, 75, 1, 'which medicine is best at fever?', NULL, 1, '2019-07-09 07:13:41', '2019-07-09 07:13:41'),
(13, 127, 177, 1, 'which medicine is best at high fever', NULL, 1, '2019-07-09 07:35:51', '2019-07-09 07:35:51'),
(14, 127, 177, 1, 'which medicine is best at high fever', NULL, 1, '2019-07-09 07:35:53', '2019-07-09 07:35:53'),
(15, 127, 177, 1, 'which medicine is best at high fever', NULL, 1, '2019-07-09 07:35:56', '2019-07-09 07:35:56'),
(16, 127, 177, 1, 'which medicine is best at high fever', NULL, 1, '2019-07-09 07:35:57', '2019-07-09 07:35:57'),
(17, 127, 177, 1, 'which medicine is best at high fever', NULL, 1, '2019-07-09 07:35:57', '2019-07-09 07:35:57'),
(18, 127, 177, 1, 'which medicine is best at high fever', NULL, 1, '2019-07-09 07:35:59', '2019-07-09 07:35:59'),
(19, 127, 144, 1, 'test', NULL, 1, '2019-07-09 07:36:44', '2019-07-09 07:36:44'),
(20, 127, 177, 1, 'testss', NULL, 1, '2019-07-09 07:38:32', '2019-07-09 07:38:32'),
(21, 208, 75, 1, 'tesudu', NULL, 1, '2019-07-10 08:59:51', '2019-07-10 08:59:51'),
(22, 127, 75, 1, 'hello suggest me best medicine for headache?', NULL, 1, '2019-07-19 11:23:09', '2019-07-19 11:23:09'),
(23, 201, 75, 1, 'How are you कौन हौ', NULL, 1, '2019-07-31 11:28:45', '2019-07-31 11:28:45'),
(24, 201, 75, 1, 'जढदढजत यमजतझतझतनत', NULL, 1, '2019-07-31 11:43:39', '2019-07-31 11:43:39'),
(25, 45, 75, 1, 'a', NULL, 1, '2019-08-01 06:26:21', '2019-08-01 06:26:21'),
(26, 45, 75, 1, 'a', NULL, 1, '2019-08-01 06:26:49', '2019-08-01 06:26:49'),
(27, 45, 75, 1, 'a', NULL, 1, '2019-08-01 06:29:11', '2019-08-01 06:29:11'),
(28, 45, 75, 1, 'a', NULL, 1, '2019-08-01 06:30:35', '2019-08-01 06:30:35'),
(29, 45, 75, 1, 'a', NULL, 1, '2019-08-01 06:31:20', '2019-08-01 06:31:20'),
(30, 45, 75, 1, 'a', NULL, 1, '2019-08-01 06:34:03', '2019-08-01 06:34:03'),
(31, 45, 75, 1, 'a', NULL, 1, '2019-08-01 06:43:15', '2019-08-01 06:43:15'),
(32, 45, 75, 1, 'a', NULL, 1, '2019-08-01 06:45:45', '2019-08-01 06:45:45'),
(33, 45, 75, 1, 'a', NULL, 1, '2019-08-01 06:52:09', '2019-08-01 06:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `coach_id` int(10) UNSIGNED NOT NULL,
  `reminder_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reminder_date` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reminder_time` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `patient_id`, `coach_id`, `reminder_text`, `reminder_date`, `reminder_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 127, 39, 'Meet Dr Navneet', '10/08/2019', '10:18 AM', 1, '2018-09-04 05:18:26', '2018-09-04 05:18:26'),
(2, 127, 43, 'hello', '05/07/2019', '4:20 PM', 1, '2018-09-08 20:20:48', '2018-09-08 20:20:48'),
(3, 127, 43, 'hello', '08/09/2018', '4:20 PM', 1, '2018-09-08 20:20:48', '2018-09-08 20:20:48'),
(4, 42, 43, 'hello', '08/09/2018', '4:20 PM', 1, '2018-09-08 20:20:48', '2018-09-08 20:20:48'),
(5, 42, 43, 'hi', '05/07/2019', '2:10 PM', 1, '2018-09-08 20:21:34', '2018-09-08 20:21:34'),
(6, 30, 39, 'Go to doc', '20/09/2018', '10:56 PM', 1, '2018-09-21 01:56:47', '2018-09-21 01:56:47'),
(7, 30, 39, 'hello get ready', '20/09/2018', '10:15 PM', 1, '2018-09-21 01:59:37', '2018-09-21 01:59:37'),
(8, 32, 38, 'your appointment is cancelled for the weekend', '22/09/2018', '10:53 AM', 1, '2018-09-21 17:53:19', '2018-09-21 17:53:19'),
(9, 30, 39, 'hi go to clinic', '21/09/2018', '5:12 PM', 1, '2018-09-21 23:12:26', '2018-09-21 23:12:26'),
(10, 30, 39, 'teach me How to do it', '28/09/2018', '4:2 PM', 1, '2018-09-25 23:02:52', '2018-09-25 23:02:52'),
(11, 30, 39, 'See your doctor', '29/09/2018', '2:30 PM', 1, '2018-09-26 19:37:07', '2018-09-26 19:37:07'),
(12, 47, 52, 'see your doc', '29/09/2018', '1:18 PM', 1, '2018-09-29 20:18:39', '2018-09-29 20:18:39'),
(13, 32, 59, 'helo', '02/10/2018', '2:28 PM', 1, '2018-10-01 21:28:15', '2018-10-01 21:28:15'),
(14, 87, 104, 'tommorown checkup time change', '27/11/2018', '3:25 PM', 1, '2018-11-26 23:24:46', '2018-11-26 23:24:46'),
(15, 87, 111, 'hii', '19/12/2018', '3:15 PM', 1, '2018-12-17 20:00:18', '2018-12-17 20:00:18'),
(16, 127, 212, 'tesg', '31/07/2019', '2:55 PM', 1, '2019-07-25 09:25:17', '2019-07-25 09:25:17'),
(17, 127, 212, 'good', '22/08/2019', '4:59 PM', 1, '2019-07-25 09:29:17', '2019-07-25 09:29:17'),
(18, 201, 217, 'go to doc', '31/07/2019', '5:43 PM', 1, '2019-07-31 12:13:13', '2019-07-31 12:13:13'),
(19, 201, 217, 'ygjjj', '31/07/2019', '0:45 PM', 1, '2019-07-31 12:14:42', '2019-07-31 12:14:42'),
(20, 127, 211, 'TSS and', '01/08/2019', '2:17 PM', 1, '2019-08-01 08:48:13', '2019-08-01 08:48:13'),
(21, 127, 211, 'bz', '01/08/2019', '2:19 PM', 1, '2019-08-01 08:49:30', '2019-08-01 08:49:30'),
(22, 127, 211, 'f', '01/08/2019', '2:20 PM', 1, '2019-08-01 08:51:00', '2019-08-01 08:51:00'),
(23, 127, 211, 'sg', '01/08/2019', '2:21 PM', 1, '2019-08-01 08:51:14', '2019-08-01 08:51:14'),
(24, 127, 211, 'dy', '23/08/2019', '2:21 PM', 1, '2019-08-01 08:51:44', '2019-08-01 08:51:44'),
(25, 127, 211, 'gsgs', '01/08/2019', '2:22 PM', 1, '2019-08-01 08:52:19', '2019-08-01 08:52:19'),
(26, 127, 211, 'vV', '01/08/2019', '2:22 PM', 1, '2019-08-01 08:52:37', '2019-08-01 08:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
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
(4, 'Patient', 1, NULL, NULL),
(5, 'Clinic', 1, NULL, NULL),
(6, 'Poc', 1, NULL, NULL),
(7, 'Manager_Admin', 1, NULL, NULL),
(8, 'Panelists', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system examination`
--

CREATE TABLE `system examination` (
  `id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `diagnosis` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system examination`
--

INSERT INTO `system examination` (`id`, `doctor_id`, `patient_id`, `diagnosis`, `notes`) VALUES
(5, 321, 154, 'Hello Hello', 'here here here here here'),
(6, 321, 154, 'Hello Hello', 'here here here here here'),
(7, 375, 379, 'PROBABLE DIAGNOSIS', 'prescription safety'),
(8, 375, 379, 'PROBABLE DIAGNOSIS', 'prescription safety'),
(9, 375, 379, 'fasfas', '23213'),
(10, 375, 379, 'safas', 'ds'),
(11, 375, 379, 'safas', 'ds'),
(12, 375, 379, 'safas', 'ds'),
(13, 375, 379, 'fdafa', 'dsds'),
(14, 375, 379, 'asf', 's2312'),
(15, 375, 356, 'acid', 'dasdas'),
(16, 334, 405, 'PROBABLE DIAGNOSIS:', '');

-- --------------------------------------------------------

--
-- Table structure for table `unit_for_lab_details`
--

CREATE TABLE `unit_for_lab_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_for_lab_details`
--

INSERT INTO `unit_for_lab_details` (`id`, `unit`, `status`, `created_at`, `updated_at`) VALUES
(1, '%', 1, '2018-09-01 18:48:37', '2018-09-01 18:48:37'),
(2, 'g/dl', 1, '2018-09-01 18:48:44', '2018-09-01 18:48:44'),
(3, 'mg/dl', 1, '2018-09-01 18:48:53', '2018-09-01 18:48:53'),
(4, 'test', 0, '2018-09-08 18:04:22', '2018-09-08 18:04:26');

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
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `view` int(10) NOT NULL DEFAULT 0,
  `expertise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `contact_number`, `password`, `role_id`, `device_id`, `verified`, `view`, `expertise`, `city`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'test.admin@gmail.com', '', '$2y$10$7QlwDWRnaiEmknoqNehn2.DHLgod0sjbtJva6XzDWb5/DZhjZJPUO', 1, NULL, 1, 0, NULL, NULL, 1, NULL, '2018-07-09 09:02:03'),
(45, 'Meenakshi Khandelwal', NULL, 'meenakshikhandelwal942@gmail.com', '9359156011', '$2y$10$/qGdV574NnQ5PH/H7G79W..V8QFSryN9p0OLd04M65K4i6hVrlZue', 4, 'ehZDn42JKKM:APA91bEGTsVfnXByRs1mBxqtpG0pLdHnPJeuu1h1q_LOv3_p6n9rZ0YsEnHRzrKoxcdDurXDllwPns9bA8NmrXz30XVorhraYiaNqi5MiAQA_n8wERrvBX7UG-BRq0WnMmR-_LN4PXy4', 1, 0, NULL, NULL, 1, '2018-09-27 03:23:16', '2018-09-27 03:23:23'),
(46, 'Mamta Khandelwal', NULL, 'mkhandelwal952@gmail.com', '9760011733', '$2y$10$9BfRvhXbWZWymipp7mWPhuB5hAfHYmslBPK8S7u5hzJQqlqszKt3C', 4, 'fNKOyvyaRmQ:APA91bHaSGSIhrgpzvjOhm3HYC4Men7xHCD-itXBYnupuYm7VjvSpfYCwIw5iSY3CcapOSOQl5f7kTwshYcqJhhgwfcvu5CX8jRjcNwmCjK1Hhkg40SQat7MKFCEdoQTvqGumrnCQPdX', 1, 0, NULL, NULL, 1, '2018-09-27 03:23:49', '2018-09-27 03:23:55'),
(47, 'sheeba khan', NULL, 'sheeba22787@gmail.com', '9997612984', '$2y$10$60lvyZIDqB4waYlVQ75fb.8SVVKFLQ4cBb.zD9LEJ8W6tUHjh2fr.', 4, 'deLi436NJyE:APA91bEZRVTpPFU6R92_UMFm0I8aSs3bpyU_vwNo5eFuKQd0iuatDU1ebyeWTXlG5yOp7HGRrqfyQzZYUVGWPZhWVDm7GbxP0rZDk8TytVD4INrimTJE1UNxcByNklk_qLuTd1bsiJ5d', 1, 0, NULL, NULL, 1, '2018-09-27 22:04:48', '2018-10-01 21:43:05'),
(50, 'pooja', NULL, 'pooja@gmail.com', '9874563210', '$2y$10$15emeX5iKRSzzkrtQlecpejvW0c9C5zRvZInhBvAchoqBkxu2CaCy', 4, 'null', 1, 0, NULL, NULL, 1, '2018-09-28 22:11:10', '2018-09-28 22:34:20'),
(51, 'Komal', NULL, 'komal@gmail.com', '9638527410', '$2y$10$RxlR6gHS/aY7xROcB4vHbearmIJ2t.WoUDPGrLq15zXcIUGIjDYJG', 4, 'cVsvBOk5zxA:APA91bG7zhZvlGNHP5Aby_-dNHsffFEgrE-FsIzH_zdGxJKKWY5OI5ubyuQuEoMc7sMnhlx0QDL3U9BUkawAjReeeU1WG9uNLx0mNq0dITFwNUXs3pjA7sHAR5be0VuVi0Eq4u3IV5he', 1, 0, NULL, NULL, 1, '2018-09-28 22:36:18', '2018-09-28 23:01:27'),
(57, 'kanchan Sharma', NULL, 'kanchannautiyal020893@gmail.com', '8077778704', '$2y$10$1JjwfC4XirAxmAnirnQzO.snN5N3QppNMu0XH.HMwXvZlilrmLL.q', 4, 'envWhgDps3Q:APA91bGUvg6BMXgXjo5mGUIK0OM6HwWBctpKrmf9TwR6iOG9TPOAvSFsWBSCANrrkvNtSTT8wMPuNrv2Dq1XSffJmOBD_ODpcU6P_AF0s_Xd0gQTNYVsK8Rqw0wnoHxjmowVw07NUSfF', 1, 0, NULL, NULL, 1, '2018-10-01 06:49:01', '2018-10-10 22:02:06'),
(63, 'Shilpa', NULL, 'shilpak164@gmail.com', '9359539517', '$2y$10$Z7eY/REmxiuBCfBmZiIsI.xPBEWYfkzaVmkcoG.DGU5rRsrdS243G', 3, 'ek93Ioc395M:APA91bG19Rm97_G64HlbSpiHauTw2A9jKfCG9kmjtv9aCTbWX4YeiILzscvDB0TjHO2S0WqPT2zQHhGgOYDsC0e3kyXhRVfPoZgBJt6_u0yveEvNWnXx0EwAIR-p4g6YzgxdDURU7YUr', 1, 0, NULL, NULL, 1, '2018-10-05 17:40:37', '2019-04-22 15:51:27'),
(65, 'Mahesh', NULL, 'nomula5434@gmail.com', '9492105434', '$2y$10$fGuNTNmz3e52tWTp7ROuJOm/aUtb0bDe6133D5KnXbcHDix2kZQUu', 4, 'f7P6CzxuDqk:APA91bHcBdQ3PSrzGei57uQ6QVcg2iqi05C5d30Vu-IvjEOZBHlCZ_s6AJJ379bSPegQWPYt5LcvhkuaUMncRGUvFz5BT0aF2jdfUHlEHq6WY2LxRuWvbHmKluwhESmQIpiiYZHwYQwu', 1, 0, NULL, NULL, 1, '2018-10-06 03:06:57', '2018-10-06 03:07:04'),
(68, 'zahid bhat', NULL, 'xaidbhat616@gmail.com', '7006223284', '$2y$10$h/clVY3S0nzMPy/4nZID1eDvt0BX/EgJQ.L7A7UNjgNuPRt8srMxy', 4, 'eynwWFCDHA0:APA91bFe90bwHCXvhOV-3F2a5BPLUiF_ivTSMP61KPlLsVlilv9SkQV-ftxs-sumCoFhFhtgg46mf_pbgfz9IRJtG8thqaiKPadSAHTDmO_1j9VNJyQXVzs6GMbXDpk44XKva_Pby-1j', 1, 0, NULL, NULL, 1, '2018-10-09 02:45:27', '2018-10-09 02:45:35'),
(69, 'shubham jayale', NULL, 'sjayale86@gmail.com', '8600780717', '$2y$10$cl8Sx/gXfMwceE4mL1pk/eGXMLLgoCjeiksENQcVD7tRZ0sG5GIrm', 4, 'fsE5fJozuc0:APA91bHRClcCvIh4eJURpVHRVp41NgDiRGDGbWG8jsskZeVx8Sw6A0fuOVpQSU6-85JnDux-W9aNyxaQQS13CuqUrDwHTZmWIw0DecWW8uiauPYIc1ST1xdAnG3HzvuXoUorFfCEkpF6', 1, 0, NULL, NULL, 1, '2018-10-09 22:47:21', '2018-10-09 22:47:27'),
(76, 'megha', NULL, 'meghakhandelwal106@gmail.com', '9675833863', '$2y$10$YYpiqg5HZs2vfSucpgLf2.RyyVlvL6FltGf0eBLZR3VtjEpVlIroW', 4, 'czyRwUDnaik:APA91bHOO3JZ4uUEvZE1RhRYGfo4q3dO8m2JUlftWvUjp7xaUw-jozjfK0BB9X03L1x8w8n7T68WWZ50KmUZXAVQMgWrRIklxCxL5A2coy-iIWRJMZ5-6ri0KsxE0KFElDkIkcCuSeYO', 1, 0, NULL, NULL, 1, '2018-10-13 19:03:41', '2018-10-13 19:03:48'),
(77, 'Tanmay v', NULL, 'tanmay111@gmail.com', '8385818283', '$2y$10$lOjsICgpNMGXEjOjQkip1ulOFt.Yz2f7vaYTaupQ4HBZ/cG1R4sQS', 4, 'drvbIitP-D8:APA91bE0gHfWSCJHMXzVzjwIP4fZu_FJQH6mIZwI4PgTKLxd1p29n88g4zrEVmsFfsxHCLx0eBR_fNypIV0LK1Cqt16jgdsdbP7Pgkm0y1sqAkunwtLOLV_BnlZ8d4LS7eQMgb0kLibv', 1, 0, NULL, NULL, 1, '2018-10-14 05:16:31', '2018-10-14 05:16:38'),
(78, 'Tanisha Gupta', NULL, 'tanisharg28@gmail.com', '8779585807', '$2y$10$ArVf4bAW4W7BPPOGSdpx1eSjDNkBdDFg0novqaOsizJYQng771eIi', 4, 'enep0VAr-Ok:APA91bHwJIIi6Ag6LccpQqiBp11AMaYVC9vOv9WX5eZK97gaCllOlePEfi18JTXtST75zwnaSG5IQ_NSV6KlvkiqbcHvue94hX0V6sCEyiWKpMpcyZNJKB-2ZunCYuO_hKX0I_i2GraB', 1, 0, NULL, NULL, 1, '2018-10-14 20:23:00', '2018-10-14 20:23:08'),
(79, 'saroj davi', NULL, 'kumarjitu601@gmail.com', '9416232196', '$2y$10$XmbGsFkrbsD3NclXzeYhi.2KT3sFdLaUiVENXSRgjaJZX9YBorFha', 4, 'cO9MbhxNrDY:APA91bF93hQJt-RUkww2gtK3cBpC6fyuaj0WgYKrFt8Xi-f5c0RRFIOiC0CQ5gmtmmMHWQ5JPnRsDWpcGOJ3paY-gxcfP15W9Z4wM8p7dTfRjK-ludjwdDbQ4jpCIcKLW17B4oQgGIjK', 1, 0, NULL, NULL, 1, '2018-10-15 05:21:37', '2018-10-15 05:21:44'),
(80, 'Vijay pal', NULL, 'vijaypal.zmf@gmail.com', '9355255222', '$2y$10$0KhWUnW9PfBnajGiR/lqzOrHzv7XkRln1PlLL72FC.O187yTFQQtq', 4, 'dDuEF7RvCe0:APA91bFhDbTRe09FN8mqVYoFc9xu3fJzJGl_3PsgcnlKhNDL5v28qSyVBFMRIS6OwsK9qKe3uv2XRVdgimru_UwQmYUyNaaCawdt8AUpjTxDRzebuPyMzDHZTNKb9t3f_SQXVfQ4URwn', 1, 0, NULL, NULL, 1, '2018-10-19 16:07:27', '2018-10-19 16:07:35'),
(82, 'sail sayyed', NULL, 'sahilsayyed70674@gmail.com', '8318948898', '$2y$10$kvXkzrpo8i34a8f3GRlzW.zkPel5Ywi36bQ3Y3l9vR.ip42AUjCt2', 4, 'c7afUTyhAPs:APA91bE08n1FKR5PeL0LlKIg9QcXwmbuAgTFv4htfCxnDNonuuslbZOkBroWDSxDuYIiZxOpZVd_kUt8UpLTpYsZJpJ1FD84LjZNopym1vGKjK9WsF1_tE6VquZRUPflYNjvxIIMXklr', 1, 0, NULL, NULL, 1, '2018-10-26 18:52:54', '2018-10-26 18:53:01'),
(83, 'prachi', NULL, 'prachisaxena234@gmail.com', '7065459945', '$2y$10$.Qmw43uaiS4mFcUB.Ogv0.4kyd3GBdPRUI.DQZQvLOuXr0M3o5xOu', 4, 'fMoDU2Rcibs:APA91bG4CGFvbVqqSidk4jw3KPsHSkbXWtqlMXMBKh9SqFfbdEP03tBoF-CIUxkU2zitPh4EIS6ixmFKUIQEyORseRKX-jjVUtzkNGjCF84x_nfzxZBX-i6t9f01q6m7-fpecfoh7mhJ', 1, 0, NULL, NULL, 1, '2018-10-28 00:37:19', '2018-10-28 00:37:27'),
(84, 'Roshini', NULL, 'venkateshrachabathuni@gmail.com', '9866064234', '$2y$10$4lgPJ1H4oIixDtFc2Yix3.cZ8gO7d.eCwBjOu4IyJ5Oujmg7LFrp6', 4, 'dglGtdPNBjI:APA91bFqF32mTD3vVqTbcYW7olPwcSlKq0FCRIg9DHlRiBqr0LR8vko6WnNWeADy8H7jUSQ2RH8xv-wAHH8IErnl-MLp4mrzmcr6JSwpz42GjrM2tfrFEa7_Zl1KC6kteyGBHoNtrXz1', 1, 0, NULL, NULL, 1, '2018-10-29 14:23:26', '2018-10-29 14:23:33'),
(85, 'mohammed kanch wala', NULL, 'mohammedkachvan@gmail.com', '7987209891', '$2y$10$vQ9PL7Mdh1ohpDXL2HwCue4j1fRejmiJucJs3WuvrhLNeLzKiHZk6', 4, 'c8HPGN9ALpY:APA91bEftp5MS5I4K3jFuYxkc5DsAk1agRSZxw6OthN4BPwvvWUc_18k4SiJPNCmcnkvVj6798R6hOoTBWMfsUDe67VulQMtrlyEiftYNofNJHYQBoZHZyxvKmGwUqaVC3tFEEyVF_1S', 1, 0, NULL, NULL, 1, '2018-10-29 17:08:30', '2018-10-29 17:08:38'),
(86, 'Manoj Sahu', NULL, 'manojsahoo1985@gmail.com', '9402518038', '$2y$10$jpnDkF/.TBrF/Ft.hzjtNOxxvWdVS3CYrP6JJorDv18Q5PfT9IXpW', 4, 'cPGA9U_n7Ic:APA91bE6Fszuuyj6HFy2mwP6pkxQcFjBi130hnDqZZhOfhgqkQtXcFnLpkvi14qeGXIjxBGzkdM1nfGt_95OZrxbjTHPQXMXIgX9uFqf-hfcfSWU9j_Tqc40oQ20glGBWBjFsBxteJV8', 1, 0, NULL, NULL, 1, '2018-11-01 16:09:05', '2018-11-01 16:09:13'),
(90, 'Akash Gupta', NULL, 'akashgupta01a@gmail.com', '7579141879', '$2y$10$D0m0VYD1oRFomN96idIdpu4vzx./9YVycJzKUVO7Rh2vikgaULmqS', 4, 'epPQEShzKf4:APA91bG3jDs9HjzFcXpw_uOq8mr6k31rPxnhmnacVmcPBzcMHoruHARLg5pS3Tbja3TLLW0cC7q_-8tZ8RsBaJUbvFKQ2r9n_A4p_oK76TmduYj3TKYEwfQ1CImDStLPLOCsxWAEPdOB', 1, 0, NULL, NULL, 1, '2018-11-02 19:42:39', '2018-11-02 19:42:46'),
(91, 'chitresh mudgal', NULL, 'mudgalchitresh@gmail.com', '7014856985', '$2y$10$ZVjXO/KBGncdM.g4XxuEZeu5UjNYInWpcmH5fF9aINhKmmQ/iJn/e', 4, 'eLVrBW17SjU:APA91bF-2rqTHLjTezT0ZEL3njZ1aQrVtybQExnrrt5BsGtRhudWW-QoYP3663FYXiWYW4oUeA0wniyMasjUfWaGVHCHRIZulpxaagVQBQl3ti0vwaFQQ9gNJr-cgkMS6bt_kNjm6rXQ', 1, 0, NULL, NULL, 1, '2018-11-03 16:14:00', '2018-11-03 16:14:07'),
(92, 'Ajit Kar', NULL, 'rr150053@gmail.com', '7005661685', '$2y$10$WSBKghrqp.HLUFR8JKdDR.dtCZSgdRVpRmwwAiIEPOTUoUptgoN/W', 4, 'd0adw6-cYfo:APA91bH1cOwmxDnwZvMFxkX1sS9xwFpdU9SXzB3jamAx1nZHMZnNcwAZjB9cuXL1CEle2M8Ry2sj0v6kZ8FRxR__tS9n6VdPczuszluV2FWR-OZ_Iu8xMONJ4jDuyQ0zjErhHy0aXJpx', 1, 0, NULL, NULL, 1, '2018-11-06 17:28:50', '2018-11-06 21:07:59'),
(93, 'Mahesh Babu', NULL, 'babumahesh6457@gmail.com', '6305549521', '$2y$10$hPTKMdxCoVnOF9E0P9XpU./nsrDhCinuaQcgg9gs/.8aVs/foA1e.', 4, 'el118CZtHqU:APA91bFZ3TldgOA00SwZ9N6XMxZb7X6vp3KodPfZP5pyznQgAWUp3VzjV5YyoVgBX6o_crLMuSidOSuc48SkUHMny7p5aWgRsHhwymvEEs49Jkxmpw3w_56bX0svFwssFm1hsrgBl7o6', 1, 0, NULL, NULL, 1, '2018-11-08 17:00:08', '2018-11-08 17:00:32'),
(94, 'SANJAY KUMAR', NULL, 'sachintamori@gmail.com', '7536836391', '$2y$10$OndhaaSHAlg1dLVyQ.VBpu6o5Jp.oQFGKHtnF6K/muYkaBHxqLA.i', 4, 'dmMuOzmHZZU:APA91bG2MXeeq427Sp24-RUlIJSYkXL372YqUxlLlFHBv1xRlrnlBN-2kEfU3pCVwmTxW2ClO-foeym1J7Z0rxGaOXoDX8Ivp5mpYr0Z16V7JkegOyTUsxbhlxRBrZgrpdgzo_Y_xjsf', 1, 0, NULL, NULL, 1, '2018-11-11 19:08:13', '2018-11-12 21:14:52'),
(95, 'kunal', NULL, 'shahprince491@gmail.com', '9426715240', '$2y$10$QnilqS2YLr3yadf2hnikjecDPl/LWjv.waRcbV19PXDU2LARJjxHW', 4, 'cPskbdaALkk:APA91bEIJ2Hp4C2OgGqNrSkoTv5ZEHSu6zhR6Dll5GDl4xoQiPhAIH4y1gFYNVThP5vwOlNp9isV3bJMnKpGiTZXD1KWpmDg4PzDcOdwhJEI5brHljHcp_SxzhSkJmYN39FWsCD9G3eI', 1, 0, NULL, NULL, 1, '2018-11-12 19:59:22', '2018-11-13 21:15:35'),
(96, 'Manoj Kumar Singh', NULL, 'ashishkumar2000g@gmail.com', '8229051388', '$2y$10$1P7sdiTnIU/.LlPtIis.yOotKkWvo9qsNaeaaVXhKVjnxEZXh6CWG', 4, 'egynlUZdfBk:APA91bEDcM8Nd5LJ-1eZVXKjzG8-qenrJoKDOTyyS1s6xhv9lr_5OL9eYoadsL6-q4QbCSz63Eo2w7rCJds-XHn2NZ83XOx4MTgPwELNyK2hTznSEd1PRY5hXPhJdw4rdRcSogv80W3m', 1, 0, NULL, NULL, 1, '2018-11-14 17:35:59', '2018-11-14 17:36:07'),
(97, 'hemant', NULL, 'hemsbond5745@gmail.com', '9123151605', '$2y$10$tUN9V9DbP6nbZYuqM7klLuvIe94ZjV1.q4cjlVIoFrO83RmvtHeCW', 4, 'eVCmP84etSc:APA91bEQQEROhc1U4Do0XoVBI_EIJJQuX26XzL3F9nzpO02VN-e4-u_ZMO9rr8ZM-2wJv-wFEEGMtZ6Ld_MuEf1y2_ITUAJ0U_hJw8zluQxCUhc-C4E43-iFVjX9VFPjif9do_daiZmx', 1, 0, NULL, NULL, 1, '2018-11-15 01:09:28', '2018-11-15 01:09:35'),
(98, 'anup', NULL, 'anupam.em@gmail.com', '8147872575', '$2y$10$bvQ5B7/PjEYamvcwVpYqhubn9fDFWIf4JdqH8eVL9Ao6DCXF7FApi', 4, 'fCkGYqnhHK4:APA91bGPbofS6F9QMFJ4XSZJfP6UCaZsWZggqLe-tnXSzJJnN3yEUn4nOogl24PPsyIyUr3Y4dK-eBBQVWrIPdG2OGxUv-V0qkBLkzBPixgOnarzpeUYIBlrBWd-TPtvJOLCIeatz7sN', 1, 0, NULL, NULL, 1, '2018-11-17 02:22:00', '2018-11-17 02:22:08'),
(99, 'Shubham Khandelwal', NULL, 'shubham.piquor@gmail.com', '7088988144', '$2y$10$u.uJfqVUUOT.Htj7PxKiHe9AfMFpiELyGjoxY3q6ho9rhIV/lnaGy', 4, 'fxXKtRU0w3o:APA91bHvCEEsv5BafHtgJIjN03MtiRL_jXjg3iaKbAjywED8cajwy0YetQVbeSnBsasN1XmAkqOsB7qWq5KyXqbJgxmP8RB-mlc3WwncxDRiGsoWc766LoPd7M5k7hcWFX8I2WirVUCc', 1, 0, NULL, NULL, 1, '2018-11-19 03:16:36', '2018-11-19 03:16:44'),
(100, 'Madhur Sachdeva', NULL, 'ultiboxer@yahoo.co.in', '9837031344', '$2y$10$7ljYN4XmxrtblSDKYMhPxOTMVQUl3xTwVOaWiJbCwdI6G5uBcdqVW', 4, 'f0cLlbN-mQc:APA91bEGl092PdaXMz27KNuBKaQjbw8AeAPXIx1_lQATUyBk4PLY0aclT5MA3jR1pHx12RzzgaCVp5DWwxrNu1KMhT_EGsXiS_dNIsF7vjtivDpZQnV1pJws4OXqM5oSKzWOTtlNVKem', 1, 0, NULL, NULL, 1, '2018-11-21 20:07:58', '2018-11-21 20:35:55'),
(101, 'Shashi Sachdeva', NULL, 'shashi090461@gmail.com', '9319101952', '$2y$10$odgnrtLCuWNyQX5BlfFp9eGzMWKn/kmrfSICq.R.kgwty7aXANYNm', 4, 'e9O6YTpcWnY:APA91bEHmuVI1Coz6OEYuiwGkLLlcTVwlL6Hs7Ve7S66NZQeCVWjflOIWJxIiZdGr1AmIsUhYqpFwo_uy_m-DPfRtVXjDlX_S_QoiUxN--UtC-1QoBOIYng4mLOaLVrA2HOdpy1X4kG1', 1, 0, NULL, NULL, 1, '2018-11-21 20:32:07', '2018-11-21 20:36:31'),
(105, 'Saurabh Khandelwal', NULL, 'sautabh.adv.1983@gmail.com', '9760049592', '$2y$10$UvJVZ/INpCPYtCjqR1iXIOxfaEFH5cKKrDk/Tuzb2iDqr5KxyIBbO', 4, 'fFFcJ4tOwlk:APA91bHC46qOkR8-cYQxyHTgjnBkfwUC0HO9aBXf5fLL7J6motHDHnWwiv7ZBMruEQ-2RdH54zk1wI8-NZsBOxdsaESrJDHUgz9kqasa3v8oZWUkrshMifzXGAupUNSjolUdkIDtPZr-', 1, 0, NULL, NULL, 1, '2018-12-02 05:13:23', '2018-12-02 05:13:31'),
(106, 'Dimple Agrawal', NULL, 'dimpleagrawal64@gmail.com', '8077357237', '', 3, 'fonxRDawUaw:APA91bEIrC8ldn6dgM9F5hj1v2hqB5MjLta6y1M_SN3kZnvkts4Lg5Gc1C66xRIHnEc0v1KeqWUUbSOi5ICVgjNsRimaESoLfsy8HDIkhi4htTuVB8MQzfBi79i2v4ETKz-w7_-Iewoq', 0, 1, NULL, NULL, 0, '2018-12-03 22:34:05', '2019-02-23 01:59:14'),
(107, 'Zubair', NULL, 'zubairah.pc@gmail.com', '9906764085', '$2y$10$O.WribgwCNwiQS2U0co4B.kFwM5C0/Of8wu7fECH9metn8RCyQL/G', 4, 'c7fMCrVnJkQ:APA91bH0wOh33zpWy2pMxDS_JdyPnVtZHqqWcIsC_BDNcohykPi0cBvlkpsB8IrFMpGhLmWan441lC1y97gFdc4w2nxobUoBVR94SVMaDfJIPOMBIZzM-eHi0cwn2EqzBQZuVUmo4_qY', 1, 0, NULL, NULL, 1, '2018-12-08 14:51:53', '2018-12-08 14:52:01'),
(108, 'Hari shaker', NULL, 'harishanker921@gmail.com', '9410007493', '$2y$10$e0YzfDckFAftd1f65TKFjeyU/XV73vdZBw.Lkyzt9lwSV8lBDgMzW', 4, 'eUJsE5rrmlA:APA91bEVNSVvp-sxAyfITm6iUslf7V-0aKcDoM-jVsSciXZJqCX-5w2WoS8KWTDFqceWyar-fJGIHC33Sthpot8YeD6u9unabKVUUEp_10rzRpJp0Ypj2dVLryybKJgwoWZjVE9w5uJw', 1, 0, NULL, NULL, 1, '2018-12-08 20:54:46', '2018-12-08 20:54:53'),
(109, 'thakor shravan', NULL, 'kirtithakormitha@gmail.com', '7359948313', '$2y$10$2izwkgTniv9khC1ir56VJedzkbV0X.5OYlnsv60rsfg6yz3ZbYIDG', 4, 'c8yq4W5WZe8:APA91bGorBfnC4cTV_sQcg5_r1lHux-Cz9Bp_UmyD0awbKxKl_9YHi4NuGyGCgH2lqlM1TDijaPdg8A9pkAxEHDgvGT6Dd52dTNyb2l7-ECNz1zO7ABxHijEsYZlEDUHSJMwdfYQ4ygp', 1, 0, NULL, NULL, 1, '2018-12-13 00:08:52', '2018-12-13 00:09:00'),
(110, 'Anjali yadav', NULL, 'anjaliyadav7959@gmail.com', '9140749109', '$2y$10$vDwMfZBcwScDLHO10U.Zc.d.Tbm/mxmsjh4zLhEmwLRP09crUuv36', 4, 'ek4ieK_F4oY:APA91bFnVZgcOBLRW0STprUYuw9welGA6s4q20rPNgY4sQU-c-7cL0X9RU8kWSGLP92rvHSoAzwjU4kHo7e7Mczs6C9yr7-KEtd1AGeCFumgz3Ig3f5PLy7kUtMGf5ujT6z0OsuILX_Z', 1, 0, NULL, NULL, 1, '2018-12-16 02:03:12', '2018-12-16 02:03:21'),
(112, 'Poonam vats', NULL, 'aakshit18@gmail.com', '9868778855', '$2y$10$A6UB/yztNF68uoVmyjUo8ennxVFu7EvPqEcYdLQJVm3y61DK.bXv2', 4, 'dA_Z0qxM5aM:APA91bHCzA_o1DSLe9ZTzhT5FlL0FTT_ej7CRGHA9l-L5rnHQd3BEusmWk5_JM5eOp_J3dKt8fu1ZwN1uui5tgKX-7c9IkiGS2rOSIIVtOXF1W_iLZMfzKjqP8REg68E9ByTqooZxHUn', 1, 0, NULL, NULL, 1, '2018-12-17 23:13:43', '2018-12-17 23:13:51'),
(114, 'Akbar ali', NULL, 'akbarjanu70@gmail.com', '9080618679', '$2y$10$1ZIfdWC5Lj/OOK/7nOjzaO9RSAUt7OXS5nWI4jnej04uJf.23wW2u', 4, 'f1mWpfSOCKc:APA91bFhoNYxR7JnAaU4ADvHRQSp7M1VnkSoLt5QVWVHWXlxI_WVb8x2yrQV0d6SMlXMvjnuCS0fii9uXrZys41CcoXrEb5VwuXX62-akjTgqyV_bKB5bbEeAFNcaKNdq775zkrKpQv_', 1, 0, NULL, NULL, 1, '2018-12-20 11:57:58', '2018-12-20 11:58:06'),
(115, 'ponmani', NULL, 'ponmani477@gmail.com', '9566923288', '$2y$10$SbdwBN98CgMHxML/zk3RAu3uyckp0mSaQxM2bkcuAHpJopyLvNES2', 4, 'cb4LMxR7WH4:APA91bF_Nt4m-q62NrQhpAbRwhwtCihpjV2L58TLX9-_Fzy3Va3M758KKNafPJYBD8gq_GiUafOsjZHKTTRxFdYSJai1XVTxgUXJ9noiEop9B0aZU6nmGfT_cmrxMZXkXgXyyrbGadMx', 1, 0, NULL, NULL, 1, '2018-12-24 02:59:56', '2018-12-24 03:00:05'),
(116, 'sugam pandey', NULL, 'sugam6387pandey@gmail.com', '9125372148', '$2y$10$EKZJvGjEfhrteDFd8tcvSO/X4H6LtA/XfP8bwrCFqcVvSC0vZVuXq', 4, 'c64n0QLQ81U:APA91bHJUKiPUClEC268ywXMjOXbyJH-p4TXacgs9TvisHUUxqCYnfPwbs8g5_md6z1mj0-njf1VVLWf65SHBt7BnOerZZiONq0n8OkyLht8VK7rsIJfYa9wyQV2mbYI0uLVzQjrwc6O', 1, 0, NULL, NULL, 1, '2018-12-25 22:26:18', '2018-12-25 22:26:25'),
(117, 'KSHITIZ AGARWAL', NULL, 'kagarwal123@gmail.com', '9897222770', '$2y$10$oHKvbmY3v.zkF07OVYQq8uimxSw30OvyJNESlvwevilyctoo0OPn6', 4, 'eH6Wl5a2klM:APA91bH1jCa2BIpTTweJ82O6vQ9WbqCFUiA10FtktnWHxTCcxBaqTwF1N6lt99FQWjwzKm8bjdMCzUbgglbMsJN9HfBonlgyGqfZUpwfatX8iUH4Yu6BTa6-jYRGx3b_jAok3nIvWdoa', 1, 0, NULL, NULL, 1, '2018-12-26 17:37:47', '2018-12-26 17:37:55'),
(118, 'pallav', NULL, 'pallavsharma0705@gmail.com', '9926855135', '$2y$10$gyA3lzxD9B0w84HKSQ0W5.WVm9cuII3TwcLnU90ohlvEpc6DiLVDy', 4, 'eAJvnvYEZ8U:APA91bHn1mClcyhQgZ72oKfdf4WYQJ_Y8b3U7O3N3svav9S1mTEgCRhdmNYvPc32KiSrWFWJVW7ctptgjB1ctu4qSgjfmKgVq4pHLAUi3B5TEWOZui1EDdZeQPiPKJ2vuNMn8nFMd5Yu', 1, 0, NULL, NULL, 1, '2018-12-28 20:56:00', '2018-12-28 20:56:00'),
(119, 'ashish', NULL, 'ydvashish92@gmail.com', '7870073637', '$2y$10$LXDU0PVZqSiCQ9JJ30DOD.GLBRpjHVkAbsnuw1UkpzeVyEbKh9C8a', 4, 'fTyRyE_L6gY:APA91bE5GP5HaFypLhF7Z7rHyj0Yy6z4tS9UmXF7xlV89RQBIkmX7IAj7wnYQnbZfQoESMfRps7dvgI7SymLS5voFF7bZ9Z0aZa3yvbBhTrOq2SeEepa6mqAZxYMn_RyHt_LiYy54YKM', 1, 0, NULL, NULL, 1, '2018-12-29 05:35:21', '2018-12-29 05:35:29'),
(120, 'Ankit Soni', NULL, 'ankitsoni01992@gmail.com', '9799917733', '$2y$10$AOum0qgxXYSUyzfrpD3Oc.Zi/es9ksxRBt2DjN.5kU6jDQBnkg18W', 4, 'cW0gaTbBliE:APA91bEGbkFZthjMJJYZm14G6NnEF5-fP8wonYOIlO7upTGBFFC3u0kDwhs-YOHdUeutO3x0DyKpkV_3WbrhWKyMUpmimgTl5UW_ft2eS23b-W1I4IkkkfrNDVekp5waDNo3QPEfzZTK', 1, 0, NULL, NULL, 1, '2018-12-31 08:12:02', '2018-12-31 08:12:08'),
(121, 'Raj Kishor Singh', NULL, 'rajkishorsingh486@gmail.com', '8283863719', '$2y$10$mowejaVYBVoTBMB7zpUkReqwOvdSzgGoS2bk3aj/rhlR97FNUaEmi', 4, 'fjICdAxO5NQ:APA91bEId4iYky1uUT3gY212PHM8-n1MJ45_bDrSR0nVi2ZW3AgW8fDxGEMICJnuwywSmT1NgLj0a4y4G-5F5pUpxvJ9Fmm7hSHliutDLEguvAc9EbbuDJ5HjChx6kF2o8U7ltl2iXbj', 1, 0, NULL, NULL, 1, '2019-01-04 15:03:13', '2019-01-04 15:03:22'),
(122, 'Hazim ahmed', NULL, 'hazimahmed088@gmail.com', '9007202145', '$2y$10$wWfzx.hyvwRNZc1SCc1tq.0KSwNNdhWBTmTrPGb6WIqSQuKjl4H/i', 4, 'eA1fwMKAgD0:APA91bH5YLZTTfppv24TCcMBpuUQ5opSkdmwhto-AM7rQQ_l6QQbcD5wp0YpXf_nmj2JyzrOAD3Pl9F-X9UzmDeCWWm6rnfXEXsmsEhy2GREWbm1DpmjUWc6b7ZvQSjupvTV7RpTHjeQ', 1, 0, NULL, NULL, 1, '2019-01-06 02:00:00', '2019-01-06 02:00:08'),
(123, 'shweta', NULL, 'shwetagarg243@gmail.com', '9899102142', '$2y$10$EyEhiHvaagvSa2ni.gNmx.Ull2s2GYfqg9RQfXmb.FIAcy3VX2Z/u', 4, 'c4YTLt_3uaI:APA91bEvI14dr-CgfifBrkZFtLb7V-PVqcaOPsOOSnoym3MPnnwnwlYaz7gvYWBuRRxD7RUryBCNLiCaI4n71ElEVM02N_z7bl8jMfTCtWO0C-tU-e5I7Y8uiBPx4wLav7Hx9s3ca-r1', 1, 0, NULL, NULL, 1, '2019-01-07 23:37:30', '2019-01-07 23:37:38'),
(124, 'arpith uskelwar', NULL, 'Arpithuskel@gmail.com', '9182366815', '$2y$10$JuId7MgHatqe2sa8Mqftmu2BoTB0jLe9.VVZ5hCQuyNWsvRZl8tpy', 4, 'fQve48nxcYc:APA91bH225fkwXsrk6PPiESgxfqXcYxVAXxudKe2l8qdWmmubhfbDFUh_T2cRapAn8q4Xi6rZ6-NcUJ9IctVYeY4zdGtoms3qX959wUcgtWZjKqsanV1Fhg3dltyAu2RCYSGutx_Ws-7', 1, 0, NULL, NULL, 1, '2019-01-12 05:59:52', '2019-01-12 06:00:01'),
(125, 'garapati Sandeep', NULL, 'sandeepgarapati527@gmail.com', '9491521527', '$2y$10$OGKDggQW1kVbaF9gcZW26.TUtEGUHvKHfyVoNbnus5gm3uYjcnKVm', 4, 'ecxsGYEylfQ:APA91bEazArtLkKgVII1GvTpILQ6cSSSHF9WEkfDmR8KhaCjvBFCZzji8RS6FoTrOXCooESqzyKT5o1yBzpRDM27RGN2YfzAgsoXCwyWKB5jErg1JbT6Cl77vpBZA5xK7P8YqefZLzJf', 1, 0, NULL, NULL, 1, '2019-01-12 15:00:36', '2019-01-12 15:01:14'),
(127, 'priyanka', NULL, 'priyanka.innovius@gmail.com', '7874412012', '$2y$10$4fQoFqB8Xga/mmOPmro4oeyNj6lpinNCkNHcflMnIQPgIzfxAWx0W', 4, 'fCrJlCqZ8kI:APA91bFfpmlHMsCeYUvDTHCoeanPJEmYtuK3YNMpxp8bO0IFynV4xzMF961J34UR45AMtC0b1goDB6gI_oRDS-lQxdK_EyY09PFICsWxGAQFslkeeGLlm45sAKiSJSgK-kfof37S7C1o', 1, 0, NULL, NULL, 1, '2019-01-12 23:48:57', '2019-11-01 14:10:05'),
(128, 'Ravi', NULL, 'ravi@innoviussoftware.com', '7405022208', '$2y$10$tXoG3UNp.nfxLVwIF76R/.iOkfIAZrY4c5NrFvVd/fkM3oG5Bfbzy', 4, 'cgex5j9YHWw:APA91bGF_0UA0ImH8xZOmAw0Y5r0cYvLFV0wfD1-LFXkxEDfI2fSFrIaGHIlou22rYd4BZ5IL0KtQD_avgXzqPpMd3QOzIOgoFDb6qo8fgus4v31uZH9nhpq4yeM3KzScX0p3uM3XryP', 1, 0, NULL, NULL, 1, '2019-01-13 01:02:43', '2019-01-13 02:15:47'),
(131, 'Raju', NULL, 'raj@gmail.com', '8460521189', '$2y$10$6fZLAQ8KCezXBZDXZIME2eHIs0a/MyKswfc3xBbfH3LXhKB5qfjMm', 4, 'cgex5j9YHWw:APA91bGF_0UA0ImH8xZOmAw0Y5r0cYvLFV0wfD1-LFXkxEDfI2fSFrIaGHIlou22rYd4BZ5IL0KtQD_avgXzqPpMd3QOzIOgoFDb6qo8fgus4v31uZH9nhpq4yeM3KzScX0p3uM3XryP', 1, 0, NULL, NULL, 1, '2019-01-13 02:19:59', '2019-01-13 02:20:05'),
(132, 'rajendra', NULL, 'rajendra.bagal88@gmail.com', '8208267249', '$2y$10$t8jjsBr/zcCJKUyjUXG80uj0WOkMeet4Cd8uG7mnLwXUvPqkSYjZm', 4, 'cJKVOSv5gKI:APA91bEv266Sm4PJm5qUPZDzaVyF9XVvREvdi8fAU-vZNtgGvgzUfQEj1w4QHu57ac88aHIU3BpAxJ_Ap2EVvo1n1m2Jh0RBgt-czAYKWTS7KeewQLiVCh6k9-oe2N53klj4JhKqQOcU', 1, 0, NULL, NULL, 1, '2019-01-18 02:43:50', '2019-01-18 02:43:50'),
(133, 'sameer', NULL, 'sameerchandra.tammineni@gmail.com', '7901288684', '$2y$10$X7u8dI./48s1asVJRHrRBe7zrJj5ojq747My5dTP1M8CIPnzfRvwm', 4, 'dQc03t3QMes:APA91bHPwhxVrZR0sFDYeyVagCBR-vd3svI-VwBkzI0b0nGoU0tiXwdrHyw2Rg2Y-Bvtb-W4Y2fwhG9loR--9oeBulMubTWSI_e3NRGe_Pl2ODxhqaqq7h0uM7y0f_Srjg_wWm-GZsGB', 1, 0, NULL, NULL, 1, '2019-01-19 01:54:18', '2019-01-19 01:54:26'),
(134, 'anupam', NULL, 'singhanupamsingh93@gmail.com', '9926602454', '$2y$10$F1L0wpi9fYKjFxtEvsMv..BJ27RtuOjlbqK0Txm6QzuLz9c69S.em', 4, 'cwA5IGx9n8o:APA91bEPfDUUzNQx4tLf9fAmd5i08N8v02aMIp1RO72FxfyOvJHVzBnEtj6hvmdhlQaIDli9ccT2QND0H23qB_oWh1Yw4RmA5Lg5_hMbRApNAPPmgA4VfMSArsJvXW8QQ1goa_6XN04G', 1, 0, NULL, NULL, 1, '2019-01-22 17:00:47', '2019-01-22 17:00:53'),
(135, 'Pawan kumar', NULL, 'pkrolad@gmail.com', '7015298496', '$2y$10$AiqEScNqv6q2dUVCyRkNEeC0Vh727P5Fd6En2L6Gdczi5kRJc8NNi', 4, 'null', 1, 0, NULL, NULL, 1, '2019-01-27 15:14:52', '2019-01-27 15:17:24'),
(136, 'sruthi', NULL, 'shruthiyamjala@gmail.com', '8978138553', '$2y$10$BTbXyoyB9WWrxS.vqjCBYODE5zdDcC2.g8CSnSnImJAgJtutwV0OC', 4, 'fGGRoTKHVlw:APA91bFAVNM4I4t4ePmadObxz0f-oIVOs5IiJ7ONTCX3R5gPBoYyEuqcP7uvYfbsye8Ny-Tb_rNahabaPJYTCPIW5jisz999YEc84DLh-L9CpS_cJgwIq2ccyxJ9e2q7-IQZFmGEE46-', 1, 0, NULL, NULL, 1, '2019-01-28 08:04:05', '2019-01-28 08:04:12'),
(137, 'Ratan Kumar', NULL, 'ratan3101993@gmail.com', '8789674499', '$2y$10$EQ9Mt0/.7cYgybDp8Agju.EmPalfd2Kqjz4ySqEEI.wNW2cGVp2B.', 4, 'dA0skuetFic:APA91bFQPJIKrU6FB-RijIAHMimxdVvPKfT9EpgKxjPuRDxlhavphdUPKnTISxbQtvMtt88SjqfKDZxuWZ-A0pj00iHBj3ceePdu84ubJv5UuNGHJ0XAqGthgVMCC_u75wE2z7DlPkEE', 1, 0, NULL, NULL, 1, '2019-01-29 17:22:02', '2019-01-29 17:22:10'),
(138, 'masroof', NULL, 'amasroof@gmail.com', '8582028149', '$2y$10$qAWdtuczWhHRURuRt2L6IeOo6I6p3q.Nonm97noorl9c/0hHe2KYa', 4, 'dTA6cDvpoaw:APA91bFCIvdnXlWMrW_4ElFoWPRXZ3_nag6fr6Ws0FV0zq9Mr-p1MRDa68-oegpJrFsCkntVtDaprT4fjEKSsemwZFqfqa0FoQc0BrSCIoPOrCVzfY7Rj0fs4KqZqHwMJq7ETrQnmx6T', 1, 0, NULL, NULL, 1, '2019-02-01 03:00:02', '2019-02-01 03:00:09'),
(139, 'Anantha Ganesan', NULL, 'ganesan19224@gmail.com', '8825935012', '$2y$10$KEET0vo52kw/RFcd17nUcuZJ.4l6rM1HtxUYAave1z40pInROzakK', 4, 'eD9kxOqgRTw:APA91bEI3JDi-duP9-3SMTed3UluGWsDW2BWygStuHby5EqdKTErJS8HBI9fv9G84uNMeleCmShUX4x9_iVFR-GLGLgAP9pTCxDoa8CAvXw8PiCzsfeMJ69tU0Icfs54EV1tGgJVbC_Q', 1, 0, NULL, NULL, 1, '2019-02-02 03:53:34', '2019-02-02 03:53:41'),
(140, 'Ramesh Kumar', NULL, 'rameshbamniya344001@gmail.com', '9602629344', '$2y$10$SwHm38UuuauKMcfW7DdVi.04lgLOC4uNMxPZxjDcYYnwz9hANWU1C', 4, 'cCy91zadjv0:APA91bH1BRynR_XBt56MTUBw8GYAGZLyv5yzVUj7xziDqJeh5Fx2PJRt_U--GfNeG1Z9HhI0fmEGIPQvHP2iy5BJaa6QvYOt4U36wvSsqejtovMMiA42VxSqaNvx9BxHfuHiTREcDf6P', 1, 0, NULL, NULL, 1, '2019-02-02 21:35:11', '2019-02-02 21:35:19'),
(141, 'Dimple', NULL, 'jadondimple@gmail.com', '8171595948', '$2y$10$jFM8SIUOcgwbCAgx07/tAuz5I5Z3DhOzmHW9s04Bs/9RaxpA.fiUO', 4, 'null', 1, 0, NULL, NULL, 1, '2019-02-04 22:05:41', '2019-02-04 22:12:47'),
(142, 'priyanshu Singh', NULL, 'priyanshu894367@gmail.com', '7061894367', '$2y$10$UDjHWeom1VP7rXnqWwFLVebz09xeFOUW.26fdYqN8rUmJif3tov9a', 4, 'd5NfNf7b9PU:APA91bEMMW_fU8UcZDcIZGxZATXDwve9tyXgE9bYAlO_BTkNkGEeJ-un9de8h5Y0RaHFqxT86iousmKBMaIDBChd74pV7oqZvdSdvy-QW1Hk4NB1GH3P2f_lg-eIJeV4O6TbDmViv_Xp', 1, 0, NULL, NULL, 1, '2019-02-05 02:20:26', '2019-02-05 02:20:33'),
(143, 'pooja', NULL, 'poojarawat27062001@gmail.com', '9045000040', '$2y$10$jSKlBAFwGhBqUABdThB8SOtn9JfpgyvDqNtdpx2nQHqQ.3TwIVoMm', 4, 'c3LMTKnxbqc:APA91bEXV7UjSZcqU04-4CsxMVTJVoxcFRLOGhC_M-ezecy8TzSVERTtgn6bqpcG0FerjfLLPMLifKY86BJc8QbwLibRBjK0ysK6v1S3H5tbaRlPFQn0FlcaJRDD7nEipEUaBpEb6tto', 1, 0, NULL, NULL, 1, '2019-02-05 15:42:49', '2019-02-05 15:42:56'),
(145, 'mohd asif', NULL, 'mdasifsaifimas@gmail.com', '9917909850', '$2y$10$u19jLMnjF/uohHlkS3DnpOwqp9nZcpv9WqaR8nygg8cUPwKh42Wq6', 4, 'f-47AoTuL8Q:APA91bEFYPy5ZTFejSfBu_0GcPyB2jGSF_WtVZM4a0iNZvg3rbNzjE4yhqrAkY66-opCdmv6zBarIrNI7rf8-vWVN0sZCso_5T1CXqM99Sdd5cubuQTiFB0ueN_maf6DjChiMDcGjJUo', 1, 0, NULL, NULL, 1, '2019-02-07 15:57:52', '2019-02-07 15:57:59'),
(146, 'Dr Anu sidana', NULL, 'dr.anusidana@yahoo.com', '9999217149', '$2y$10$4gFARfmYZ2OXr3VpSz.3ROffSFUj5N/4nBd3xBkaql.f9OusxqFZy', 2, 'euZU4Gd2uo8:APA91bGtJOnfD7xL5pcBnQ4s_56OAXn-80S2KUf72HwEnIdgZ48CJwsit7coo5A_jJRpLjWr1IjJNellr1xOeqrclAD2IFhG0xhxJ6A6etN2f_m9vFmyg2RV1RQssPFJyCZlP6b4qGx9', 1, 0, NULL, NULL, 1, '2019-02-07 19:24:36', '2019-02-09 20:34:11'),
(147, 'Adithya Shekhar', NULL, 'adithya_shekhar2002@yahoo.com', '9731692706', '$2y$10$UkByZMZ9DwD9XyTCItivo.Gwj.5herTOTMat27KXBJqZkC.qCVZv6', 4, 'fnImP0xId4g:APA91bHdZ5lHC8s1s6TeNxNHmYG7RZ2f6uDusGJXmMwgqgXp-_UJAzXmHwoVL0pSACSA_XmCnTfE5dOizT7dvKBSv0h2u285a-rpzzgn744MIIxTcH7dxIIfsVkJZ7fq2fnwwnvuj2xL', 1, 0, NULL, NULL, 1, '2019-02-07 20:04:14', '2019-02-07 20:04:21'),
(148, 'dr nidhi kabra', NULL, 'nidhikuiyakabra1982@gmail.com', '9929584648', '$2y$10$658Z98KEMmTDJc/0xAW0O.x5LFiTvYGNXvw0fcCBCVOvSHgVIsEMO', 2, 'eFomHH5IAM8:APA91bGiM95X2ympHugPV99LEzDucjoOKoVqlmoci-Kfr6VZ4l6H9FcyCMGpuZuYUX0LNWQ1iqiO218YvAIsc-amnlVkqBJlGjhdAEyFb9POYoiu-wqx-sDExLG1MWRGXVNx0X5UXSI6', 1, 0, NULL, NULL, 1, '2019-02-08 19:35:32', '2019-02-09 20:37:36'),
(149, 'Soham mehtw', NULL, '9564509803a@gmail.com', '8617650647', '$2y$10$0Ud2gJfPkgL0yyNH2Jf97.YJgEGtbllZFtUIstaxxCSjEK.EAvODi', 4, 'fQZ4ypHgFqQ:APA91bHpP0tRqs5Xuy2r0BvGdJn6oebc_0A5kvwGOJmR2hDSsShJt643k0_xyjQnPx7B_n2fAoXzt_1gXo6CyGBUu7LmWoEeVAWJJ0sS9asvhL7Zkpkcg0mtRBEx9zyyl4YsMgSumrAT', 1, 0, NULL, NULL, 1, '2019-02-09 22:43:50', '2019-02-09 22:43:57'),
(150, 'Dr yogendra Kumar', NULL, 'yogisnmc@gmail.com', '8178647275', '$2y$10$ynW.KFh4HSsVl19kw4zZvuav90R0gEmDquqIOGMFST5UrgmEhqAbC', 2, 'cil7SjoOBkM:APA91bGPmiKseuYhEvGaFUR-zYeAU_4FFYd6g7iIgIQxFYSHF_8BPbNKP9SeEzHxRN7FUzlddsOLyM-9qtWh50volEXlFUEp_EE9nPhRJddluJVCfvYJ1RC4e6QgA-h_o4bZKzByn81R', 1, 0, NULL, NULL, 1, '2019-02-09 23:41:02', '2019-02-12 04:06:55'),
(151, 'sonali jagtap', NULL, 'sonalihiray1318@gmail.com', '8999338732', '$2y$10$k51CyEpGydoSym8eA/Gkz.DZvs6C8c5In0Hut.ja1MVJCIwlZqcla', 4, 'cm95q6KFT_E:APA91bFNvfjnxCg2QaltZOcAisNQsL2f-JseggCGXzwFK8sg0jiUselA_kEtMEJIbeD-di7Ag8ykpvXZf8ErjKYbyTm8_jm7--WQtmbR3wn2pP3_L2CMYH8S7NCreec1MlNWtrX1LBgo', 1, 0, NULL, NULL, 1, '2019-02-10 00:44:08', '2019-02-10 00:44:15'),
(153, 'Sandeep Gupta', NULL, 'sandeep.kumargupta753@gmail.com', '9160945665', '$2y$10$JmcooxuQltlrPvre.nNdPexjZfxVuFdgWIrlP4APDJteaRmGb0p3e', 4, 'eXu_lMIq9oU:APA91bFL-SaV4bAIOvAS2zm3OSm5A65KfZ1fBbuMKEzeGghetth9CQlQGwUITb3cjda_nCut4s6hmg5wNoFG9jiJitEcMOVL7FFbMo4Lrt2rppj_g21MCHVY9jWPM6YcnvQubOr0tB2e', 1, 0, NULL, NULL, 1, '2019-02-12 02:03:48', '2019-02-12 02:03:54'),
(156, 'Prasad', NULL, 'prasadacharyan@gmail.com', '9620022240', '$2y$10$GPkKG78DFoHL9XA1x85H2O67WxYC.6yC6bmSMG3I96elhALxQ0kZi', 4, 'c3jn8bebcyY:APA91bHYB-eRj6Ckzwe2Y9wrQJeYwg5O0RQxZlVnjNvVhPOY03LQORnl7XFZ1RgimrZeDAU6KsK5kdwFz16bAelJYzZ98Cxu-TA6n72X0Uq8vRbROj5nsFnHmS-b5zstQKI1QBMIj6Qc', 1, 0, NULL, NULL, 1, '2019-02-14 00:29:23', '2019-02-14 00:29:31'),
(157, 'sanjoy', NULL, 'sanjoy219@gmail.com', '8617595655', '$2y$10$AtWaBl1uL45L3FFSpUPnruuKfwnZ62hslNUMq0aNzS7h6oFlwzcHK', 4, 'evVegzZEyvo:APA91bHQwHZGKkHZwxifHec2GUy41fhkUxmWDP533Bx0vRQHxUqyN5YkWwA8ofChCS4UsKYhmiEjIwNaX7TkJvcd8aJLDd8mtWN53AfxaPbSAck0flDmryg0TtYn809uyd_urb-T0tEd', 1, 0, NULL, NULL, 1, '2019-02-16 11:15:03', '2019-02-16 11:15:10'),
(158, 'Chetan', NULL, 'che191989@gmail.com', '8956311301', '$2y$10$aPzQdM7zTu5f1ntGUKacb.pmkYfrpm/nH0a9KbjjUVJvJ6r7JC2zy', 4, 'cIpu-YqMtXw:APA91bFBHUjF9jhLjrLzzgylLwAEpj-Tv53mu3tWU-1T43-CHXA4ZrYlWNUZRRowF7RhsfH1u8K_ZnfFmXoj8B7mC05bsT7JO7LDAlQx0sfNbXU2wzTa6WpWC7zIf6wQGw-cSy8s15at', 1, 0, NULL, NULL, 1, '2019-02-17 03:40:45', '2019-02-17 03:40:52'),
(159, 'lovepreet', NULL, 'preetdahiya769@gmail.com', '9485570323', '$2y$10$lxftHShhVcQhPqG/ptUvDOnMc1GxIrxMDF/b9ffS1ThukkokmAwj2', 4, 'fjiGyXlbLIc:APA91bGNIlkf8y1kjil_r_zERNyYpBwcsjIr0aVYEzWOheE_2vzwURtmigL7CUfZuamh0fnzegUjoZhSvWERAr7dMrc4yrgXtlrxrtGXWQAgCZHt7ZoTeOJT6ot1ndEKGA3zNMsaUClw', 1, 0, NULL, NULL, 1, '2019-02-17 14:02:36', '2019-02-17 14:02:44'),
(160, 'robin', NULL, 'raj.innovius@gmail.com', '8460178906', '$2y$10$o71XTk1GK4kHcgSu9C0/leiat3qJjFm5yClTm7I/XfnZrIddZLTy6', 2, 'null', 0, 1, NULL, NULL, 0, '2019-02-18 17:58:13', '2019-05-14 19:23:59'),
(161, 'princi', NULL, 'paruljatwara@gmail.com', '9306437652', '$2y$10$13CrlZDX.73GAjlkBL88GeSmT2WeKFcSRdcis3gttPVZo6FPdYN8i', 4, 'eY8LIE294aQ:APA91bH4nd0SRl9w1eOwEFCdIqMGfPEsEczvX7Y-otQ6BOSOwOd-CVkdBamUb_74dgda1D4oFGkPOCyoQ6MVfPjS2g6FTLEzu603CTFHfuzp6OCQ2eWkQguNL-MSdcHzttOvpuV4w0Rf', 1, 0, NULL, NULL, 1, '2019-02-19 23:15:30', '2019-02-19 23:15:38'),
(162, 'arbaz', NULL, 'arbazkhanchoudhry@gmail.com', '8941909108', '$2y$10$QcfMnLWJGD53Tj7ljUCcF.VoRh2EHLRsS/.f/kJPvjDBjN7kHDKWq', 4, 'ff_HD9XtFvw:APA91bFzbczLqAR7TrOQe5_hfcVFJgqkEyVfpL9ifBzPoSP5DeeQGL8IOmYVuRdgoaKyMl-K3h8eVkF6Vy-NanR9YXdicxWxZa7kFjvwSaJ17lm3w61QlvS7qop7ER5iecGHp6UgO1wq', 1, 0, NULL, NULL, 1, '2019-02-22 05:04:35', '2019-02-22 05:04:42'),
(174, 'Aafrin', NULL, 'aafrin.innovius@gmail.con', '9724532091', '$2y$10$3ftUElQ.IWISErQY/gCoju6szVq6/VIXY1lRwN2ycaeZM8HDFj8Lq', 3, 'null', 1, 0, NULL, NULL, 1, '2019-02-23 02:01:35', '2019-03-16 00:23:15'),
(177, 'Drjay', NULL, 'jay123@gmail.com', '9998841576', '$2y$10$oKqLnQEwRRaA3.LMs8clJONx9grRx6A38cDj8dUAW3R3ijomuMpnS', 2, 'null', 1, 0, NULL, NULL, 1, '2019-02-23 02:13:50', '2019-08-10 16:53:45'),
(178, 'kolli vinay', NULL, 'vinay.abadam@gmail.com', '7993065143', '$2y$10$ilxuUV0btwtdxWleZ7pquOPjgTfeYX2nTdRyjipUbAJ/bj2wtAI0.', 4, 'null', 1, 0, NULL, NULL, 1, '2019-02-24 15:57:08', '2019-02-24 16:02:03'),
(179, 'Boobalan', NULL, 'booboorpt@gmail.com', '8012983475', '$2y$10$dqCY/bjkl1BYkC3XtGEGO.O7Wva2rMDsHRWk62PmCNalOTr8SBny6', 4, 'ejfcW7Me4uk:APA91bG2vk6N2PnVWV9kKYx6ycCSfpZ_iIvLspvbCflxEsruodwtHBwg3S0xMXUZDqzlNpAqtq1RZH_JWJQ4Eyi7PUi5cJyE1kk1P3okPotDBTQ8cr_NFWFud7HxYTucD1qbtKfWHhxC', 1, 0, NULL, NULL, 1, '2019-02-24 23:26:22', '2019-02-24 23:26:30'),
(180, 'ABIRAMI', NULL, 'mjabirami9696@gmail.com', '8903642854', '$2y$10$8im8czT42U87uLQGHzzkMOjoVMWKEGBf30f1OeZawW7w1Uh4fE5Qu', 4, 'null', 1, 0, NULL, NULL, 1, '2019-03-01 03:14:52', '2019-03-01 03:16:48'),
(181, 'Daisy', NULL, 'bhoria.dazy1991@gmail.com', '8872601747', '$2y$10$G1jJvjmOp4.nzgVUtnKFGerTU7VdTKnCmHE6OdjoWczWFQnQuWpPC', 4, 'null', 1, 0, NULL, NULL, 1, '2019-03-02 08:35:21', '2019-03-02 08:37:33'),
(182, 'Sandip kumar', NULL, 'maayamuz1006@gmail.com', '7903353368', '$2y$10$dOVwgjKzKZsLPDe3MFZFGu/nh3a5N/8WF6wMIzQtMrUpHmgjNAE5C', 4, 'faNgAzy1PFY:APA91bF_PIEOSxOQ3uVLCC0YwGmdl6EWCqgUgpfmonGNWVTCtSWpUV90PiFzniEKE8PDGM0uMmSYITTjPDbLuocKe-Utw4ewI5fIiD9ncgBNJcW8U2GSl3cTByrV8QhnoD68yf_A4mn7', 1, 0, NULL, NULL, 1, '2019-03-03 06:41:44', '2019-03-03 06:41:50'),
(183, 'Naveen taj', NULL, 'alfiyataj9417@gmail.com', '8189895065', '$2y$10$la/TckgXMIhisiGAugozBu7EVpDD/dlFgQ.QcTxa4otcvuSHKWwZq', 4, 'fQTv0qmPyDc:APA91bFZuq31mpsuKOkkcmx8Xv7gMq2Z_igHmRzY8FVjFhrzxi0OcPjtKnhwmEnuorLLEiKbXJobHKPH23ZyjuYsY3qGqX7yLMIELEGCy5qid45Be9ExKRuaGjJ9A2vwbzjC2E2ZAIZ-', 1, 0, NULL, NULL, 1, '2019-03-05 16:15:37', '2019-03-05 16:15:44'),
(184, 'Prem Lata', NULL, 'puneetdudeja1989@gmail.com', '9818601342', '$2y$10$aouKKJmQiDEycjlF9D9VJ.pUXRq0F5MOOLY/SqF0lUcHHaAWCPlH.', 4, 'dX9z6Bfnq4Q:APA91bEvtxhxM-p8obmyIjFlGRqiXgTpaq2oBu141RSCPIaaHSQHb5tYhD-CvN_xzNhIhIiaQTybhksNX1bPYI6gGnqpka0hYnXp1WyPF9VD4FEXx3Gno1mofoflZf1abVacSbloAPLu', 1, 0, NULL, NULL, 1, '2019-03-07 07:30:28', '2019-03-07 07:30:35'),
(185, 'rakesh', NULL, 'rakes@gmail.com', '7378079176', '$2y$10$6ueajo6aWrVxgWLssEXkDuHSjPkJ/VpEwOITltsPUNZjaipVCqGhe', 4, 'cgAgIX2hoEA:APA91bHk37PHG5ibGxkWqAJgCGGS05apt0WuECwnwsivPb9tfLMda2fZDwWabb-QYvrvrQ3LWuzH22WJ4zICaRCY-Nr-RpW1ltbd5ulCRVZkHwbD5FMyisYPjp6t38c66xKDHqoSXh9s', 1, 0, NULL, NULL, 1, '2019-03-09 21:46:35', '2019-03-10 19:28:54'),
(186, 'saurabh mishra', NULL, 'saurabh.misra81@gmail.com', '8957880708', '$2y$10$MA7idmovl6AUEz0J9adX8Of/9xD8YS8ly2fGmjHt1Ei1maqkD9fdG', 4, 'ePCi1BArQvM:APA91bH7DtU2DnJuvwiLqfFuIJIHVUj7q9DYWpkwDSnC54vwJ3aKRRGrNLzpUVF7_plQortlGOOifKRiDJzhYVfrae-XWs7b5ueF07Tkoyu1Q4m5SYCtDuP0o6G22CcOI6HVM81sod5V', 1, 0, NULL, NULL, 1, '2019-03-10 06:53:19', '2019-03-10 06:53:27'),
(187, 'rakesh', NULL, 'rak@gmail.com', '9309292836', '$2y$10$zk4D3xrRx03E55Sc9wRTfOjf6GUJpx.7i/b3uJfY73O79sv6MUp22', 4, 'e_upb95TL6o:APA91bHGpdPoxkARCQt8_p4aZrvlxCHPQSwsk2gdCx14TYpV8RxEZgQ_2KUEtrpazbcPxxUsJ6jtUrHMYktUMx044v4AjHBh8YGxP9iSB-xMa_Bp_-j-nyDNauVtHoZCn13rmm3y8_D7', 1, 0, NULL, NULL, 1, '2019-03-10 19:44:13', '2019-03-11 01:53:45'),
(188, 'james', NULL, 'mairimarenmai2016@gmail.com', '8787401215', '$2y$10$CVKD3J40VisZKcX/ty5.eufLWANpSjhAobuGNHm.iMCeU82hitBeC', 4, 'e_Jnfin08I8:APA91bGUtkedCu9igmFAfFvRDRyospBePl2O7fZK9lqFF4AbwIUwM3JYkrbmh03tmExyTdgOw4UOZTyql9bjvlNL3xeT5V40nAOSIRDSeyw0r2T7nRjyvevRmh5T1OsfVc0AuFan2IOe', 1, 0, NULL, NULL, 1, '2019-03-11 08:04:19', '2019-03-11 08:04:26'),
(189, 'yash jain', NULL, 'yashjaiin@gmail.com', '9927820111', '$2y$10$6PtEUOBiIUgRJ2FGr9Ypt.wanZZN.USyHwD7L.oToEYs6r0I7TmRC', 4, 'e4GGf2Nf2PI:APA91bGC4AW2Bv3RZ1jpF1d3uOnF5YrbLmXkB8efSYsSzVcj4U1aFKtiMiBK4AfaUmDjYQ9pvVwixTLipRW4uT7eN0rstARoIhTLdrzBb5kRhP6_Ix87YzZ_DO2hWPkj_t0MZ28-lRaA', 1, 0, NULL, NULL, 1, '2019-03-12 05:47:43', '2019-03-12 05:47:50'),
(190, 'nikesh rathod', NULL, 'nikurathodnr20@gmail.com', '9146540255', '$2y$10$69q/lMqygu7TGn/tIfmILeDzh8rE0jCP8khrreBmlVQq.zoB6Q2Oq', 4, 'ea0MYqK-UV8:APA91bHX3tfAstHgsk-4QRw1jVbqwcVSEldOl2Bfm_LYu6ROCb5co1GCOkQIEZrq4Ii5aufGy-4NS0171gMLlIBVpZa4KAsjoiKBg3QDuiu-q35x0O-4nHxHX4PC3c13Y8o0fwloAS0o', 1, 0, NULL, NULL, 1, '2019-03-14 06:30:55', '2019-03-14 06:31:04'),
(191, 'nilesh gavit', NULL, 'nilugavit652@male.com', '8459167258', '$2y$10$zBpj93V5nZywVsF4C6.djObVhJMoOtfmN39H3pZInF0uu913ug.AS', 4, 'eCouUiUNH48:APA91bEGc3mL2l53TE7nTyQ65R9QVXKgEJQO_9b_y0giPgp90eFTMohlySIMI37MnEIme0zhzieHdV5xfTw6-f6_vkWa05rjjN7Tc8G9PB3Sqf-QFshwvCdsZIFRKQHX58eqDOWmstnL', 1, 0, NULL, NULL, 1, '2019-05-23 03:31:36', '2019-05-23 03:31:43'),
(192, 'Savio', NULL, 'samsss1993@gmail.com', '9645601173', '$2y$10$8m8FcupU.vPfRyWEwKE/6.S.AkUFmegniaHsd6aEOBYe6AcMpmt/q', 4, 'fRPhAjD2ovY:APA91bExzVUGTj9XQ9n5jzjheKStZlO2fjC7uceytIuGLVoTohVKfj7FKpBhOjXuT2eAKD4T80sWUttLoiNleW2C4K6aLKPmQpCPdI4k--7N3f7xyhYTzdI8QraKKQGpBhkYVIcEYGBo', 1, 0, NULL, NULL, 1, '2019-05-23 19:36:54', '2019-05-23 19:37:01'),
(194, 'Priya', NULL, 'pri.hello@gmail.com', '9696969696', '$2y$10$8Q58ToutMmm3b3wXRDP5VeJaGG1OIcJeZ/76mC7am3aCU0/sX.n/.', 4, 'eCgObpjL4vs:APA91bEoallMq4aJ05witlCZDYc0OgIHfpF8gzs4aRTd1FKaCdVTymrpG_GOTSu4wQoECBYQ9yZ6LN-pmpogWWj3UP8euFCJzn0gls1s3jYS3tXiVvtMK-y8zKsT82Qm3o78w0CFzyiw', 1, 0, NULL, NULL, 1, '2019-05-30 19:10:40', '2019-05-30 19:10:40'),
(195, 'kk', NULL, 'kk@gmail.com', '4534533232', '$2y$10$iIpI4.eGNQjNn/hop6ov.eZEHkAj/173QyLRJoP9.9eUlABNL35Ji', 4, 'null', 1, 0, NULL, NULL, 1, '2019-05-30 22:06:21', '2019-12-31 09:27:02'),
(196, 'pooja', NULL, 'pooja.123@gmail.com', '6666666666', '$2y$10$2CYfV6MKu1.3jOh/pZ3q0uWz.gBljrZ0h4tlm/DUY.vEtVHilFOES', 4, 'eCgObpjL4vs:APA91bEoallMq4aJ05witlCZDYc0OgIHfpF8gzs4aRTd1FKaCdVTymrpG_GOTSu4wQoECBYQ9yZ6LN-pmpogWWj3UP8euFCJzn0gls1s3jYS3tXiVvtMK-y8zKsT82Qm3o78w0CFzyiw', 1, 0, NULL, NULL, 1, '2019-05-30 22:13:14', '2019-05-30 22:13:20'),
(197, 'pooja', NULL, 'pooja.1234@gmail.com', '3333333333', '$2y$10$vWu/whiC/pg4QZGwLpjPy.W2j3PK5Yr63LLQZ3ZP6SJ6w/xcLmkSK', 4, 'dLNacmAXgDY:APA91bHkBcEJGnkA3f7Bcu4suPHLMd9iBL51hbfuK4KVGm9XXzh08SF_vgFVfX4Yl4xEv6oy5JCxrXXVhGvS0wfZYE_l8Py95XwiYo-ctRm2Esp-uV5GNbzHbJn6BpQkR2eqWfymoOfP', 1, 0, NULL, NULL, 1, '2019-05-30 22:23:15', '2019-05-30 22:24:42'),
(198, 'abc', NULL, 'abc.123@gmail.com', '1112223330', '$2y$10$BU7IRbo4x9umk2NVlWBTieYCo3TXR2JFlwzRA9B2I9x/dVZnOBhYe', 4, 'eP4AH1nO6Yg:APA91bHFDQK7222IQhChO78U57FvDED_rOy8sKE5bG_144EhG9y8dcr_yonXKvoSA6QAx-ErtiPBrzMaDJ-rNEf4zHIn05y8gZpMeN32ZnM5N-iSNWHlMXttxdrA2Sg23UMTwTi0UZYe', 1, 0, NULL, NULL, 1, '2019-05-30 22:33:50', '2019-05-30 22:33:56'),
(200, 'test', NULL, 'test@yahoo.com', '1234567890', '$2y$10$LUpTDqECINeMXLPq7w/lZegHCXTuiAYBMKKMzzB57x5PUEC/PKV/q', 4, 'null', 1, 0, NULL, NULL, 1, '2019-06-18 01:55:58', '2019-08-08 10:42:09'),
(201, 'Surabhi', NULL, 'surabhinkgoyal@gmail.com', '9358999596', '$2y$10$YzdIzUlcRnWCECKEwcjtNulj/o4b/9cxXUIhjwNQfEnJQWBP4OV36', 4, 'dznmmQOyhCw:APA91bG4f3MACiiZ1O-CrYI4Ic-ugTqDw0JwErcf6ikhrXLVkUGBAyAnd4xb3GDIPAdu797_7ED2Zap-dhzxIDy7gEAwSLktYfetXKO8ak5ztBQjKalefnJ6xW7GG8VSTNOwCMeLAfO6', 1, 0, NULL, NULL, 1, '2019-06-20 15:12:54', '2019-10-30 15:59:42'),
(202, 'Ankit', NULL, 'ankit@gmail.com', '9717687016', '$2y$10$YnbG299TW/Z0U8cUfsysPeDbPYoD82v65Kueh7ljBIAFOfpzgy.Oy', 4, 'd2vlbm6_7jA:APA91bGTirzjVFcBBxtRCUYUUklSHbHNVGXN9mNmwvpnw1W_bUIplWo96ugAKUpuNfvdgnawXTxe2PDtADsGsdeusgkLU-VuNMRUAh6a6bYZB1SFoU0ZBp1GocCqxh8MWO2XQcFDjtel', 1, 0, NULL, NULL, 1, '2019-06-27 17:51:39', '2019-06-27 17:51:47'),
(203, 'vrushil', NULL, 'vinbackupmail@gmail.com', '7698649624', '$2y$10$uQLwz9wf5cYLH0FvO/KXHOyl0SMqzZ5xV97kgaVcIzgw0Iy9kO/rS', 4, 'null', 1, 0, NULL, NULL, 1, '2019-06-27 20:15:02', '2019-06-27 21:30:42'),
(204, 'akash', NULL, 'akash1511@gmmail.com', '9725366211', '$2y$10$MCGwslTgs7B9GZ9LfINaU.uMXsjTO7ZiWPUKH4I88asPmmDd.4DkS', 4, 'sdad', 1, 0, NULL, NULL, 1, '2019-06-28 18:37:30', '2019-06-28 21:23:26'),
(205, 'pri', NULL, 'pri@gmail.com', '9999999999', '$2y$10$/4hk7cC57pV5693BPiw2ue/eOAFZiLh0cQKaqLpbBEDtcknw4DbE2', 4, 'cZpknAuOLQ8:APA91bHwgQ0xmLPzXePTBomZjspUnQc7liXGzPpopOvBgo-q69i94oKgDQW8LMmiYbXanxB7aLam1LJUkbHdhq5posRih0kxPF9dNyCacE3klwt2TRhgE4hYl2G9r90O0k1I4LIe28Wk', 1, 0, NULL, NULL, 1, '2019-06-28 20:00:03', '2019-06-28 20:00:10'),
(206, 'akash', NULL, 'akash15211@gmmail.com', '9725366216', '$2y$10$STyMF6.7O0FNexgy26jo7uVqIy/v7AZmDHCLqHcXKGVVoZkf1j0Oi', 4, 'sdadasdasdas', 1, 0, NULL, NULL, 1, '2019-06-28 21:26:58', '2019-06-28 21:27:35'),
(207, 'akash', NULL, 'akash25211@gmmail.com', '9725346213', '$2y$10$k9iQ8AqBce2d2tAHF1qFVuuhGLbYTy7cCt27sR0KBDEUG1UKHUumi', 4, 'sdadassdsxcdsdsdasdas', 1, 0, NULL, NULL, 1, '2019-07-01 06:26:51', '2019-07-01 06:27:27'),
(208, 'prin', NULL, 'tuser9556+1@gmail.com', '9924152216', '$2y$10$XCo0Z.DsOXouk8ioO9lgWuRC8ZZclPgQiIsfR/A.yRdHtSQfMLx9W', 4, 'null', 1, 0, NULL, NULL, 1, '2019-07-10 08:41:50', '2019-07-11 07:22:25'),
(209, 'tesst', NULL, 'test@gmail.com', '8320206816', '$2y$10$8YSaxMqxraqtrwfVCG5bZuiGURDMae4P776HR6vm/VWfBXHQXCwxa', 4, 'null', 1, 0, NULL, NULL, 1, '2019-07-11 07:11:26', '2019-07-25 07:49:50'),
(210, 'test', NULL, 'test123.1@gmail.com', '9638520741', '$2y$10$FabUWfhgGEjbnhgIV1Pr4OJpU3IxdYKzGTfiwDlQxf0ekUB.0n28m', 4, 'null', 1, 0, NULL, NULL, 1, '2019-07-11 10:51:50', '2019-07-15 09:35:27'),
(211, 'raja', NULL, 'muzammil.innovius@gmail.com', '7383377728', '$2y$10$oKqLnQEwRRaA3.LMs8clJONx9grRx6A38cDj8dUAW3R3ijomuMpnS', 3, 'c8IouSaXO7E:APA91bGJ2YEVUNS3LymMgr9RBX43CokE3IR6zfI5MeABu9ufLz3oOlQt0ZopURdmx_vTO1hOY6SLFu_lf8NiY670977qc9qm1jgUe7rpsSQfv6AdlOLwzkoN6a8tusg9o7JbPdiCRed4', 1, 0, NULL, NULL, 1, '2019-07-22 07:21:40', '2019-08-01 08:46:21'),
(212, 'priya', NULL, 'pri.123@gmail.com', '9510798424', '$2y$10$4fQoFqB8Xga/mmOPmro4oeyNj6lpinNCkNHcflMnIQPgIzfxAWx0W', 3, 'null', 1, 0, NULL, NULL, 1, '2019-07-25 09:20:33', '2019-08-07 06:45:00'),
(213, 'princy', NULL, 'tuser2@gmail.com', '9265191012', '$2y$10$LUpTDqECINeMXLPq7w/lZegHCXTuiAYBMKKMzzB57x5PUEC/PKV/q', 4, 'null', 1, 0, NULL, NULL, 1, '2019-07-26 05:20:32', '2019-08-08 10:41:27'),
(215, 'kanal', NULL, 'kanal@gmail.com', '9639639630', '', 2, 'f38IG6Plvx0:APA91bEAuuJ7RSX9dy2F9VK20pNi53LbIHdl8xF2oNu2nEXZoeGUe1gVK-Owsh8EbM7K1lwfuaL3eV9XvdcUIIZvlEjDP3edf9qOpAdZS3qLgQ3P8mi4VyCdumKALpvwGGPSZZi1aVfc', 0, 1, NULL, NULL, 1, '2019-07-29 04:54:32', '2019-11-09 17:45:12'),
(216, 'test doctor', NULL, 'test.doctor@gmail.com', '9996663330', '', 2, 'f38IG6Plvx0:APA91bEAuuJ7RSX9dy2F9VK20pNi53LbIHdl8xF2oNu2nEXZoeGUe1gVK-Owsh8EbM7K1lwfuaL3eV9XvdcUIIZvlEjDP3edf9qOpAdZS3qLgQ3P8mi4VyCdumKALpvwGGPSZZi1aVfc', 0, 1, NULL, NULL, 1, '2019-07-29 05:02:37', '2019-11-08 16:16:41'),
(218, 'Disha', NULL, 'dishapadsala12@gmail.com', '9714150304', '$2y$10$ck3vNG0t7M.qeIL5y/j5tOKmS3IW13ROepA9KPlKHKSEhZadrT/Ii', 4, 'null', 1, 0, NULL, NULL, 1, '2019-08-08 10:44:30', '2019-08-08 10:59:58'),
(219, 'abc', NULL, 'abc@gmail.com', '7894561236', '$2y$10$5vcHxrGjjWiurlz5l/u5vednyy3aPonSnvX7oxL9dhcV0plrhSbfq', 5, NULL, 1, 0, NULL, NULL, 1, '2019-11-14 17:39:26', '2019-11-14 17:39:26'),
(220, 'Kavish', NULL, 'kavish@gmail.com', '9978909750', '$2y$10$Py/MBfrl8Ll39zVsRKdVHeLTi7Visf4aC6uSzJTmDEPHGvGq4S3mW', 5, NULL, 1, 0, NULL, NULL, 1, '2019-11-14 17:41:34', '2019-11-14 17:41:34'),
(221, 'Sanghvi', NULL, 'Sanghvi@gmail.com', '6655665566', '$2y$10$fkBTclGMvEXKDKIIF55TveFLY95QCgofQA18KyybcnHdv19Cp/q3O', 5, NULL, 1, 0, NULL, NULL, 1, '2019-11-15 09:17:55', '2019-11-15 09:17:55'),
(222, 'Sanghvi', NULL, 'Sanghvi@gmail.com', '8528528528', '$2y$10$0AHap0UN1QamTuthomkaQeaNsEPkoSw/RXjiSCmf61dChtsCA0.li', 5, NULL, 1, 0, NULL, NULL, 1, '2019-11-15 09:20:43', '2019-11-15 09:20:43'),
(223, 'Dr Princy clinic', NULL, 'princy@gmail.com', '8460178905', '$2y$10$mgqh1y9RWhXi.F577xyJWenhSwWNtXwWApTo/cAA9RuLncHfnDs/C', 5, NULL, 1, 0, NULL, NULL, 1, '2019-11-15 09:26:08', '2019-11-15 09:26:08'),
(233, 'Demo', NULL, 'demo123@gmail.com', '4561237890', '$2y$10$VfBWLHApfTeIfabZtcWhKuzfZIsMP3.7htYM7yk4mLCEJemS.2XRO', 5, NULL, 1, 0, NULL, NULL, 1, '2019-11-23 16:27:20', '2019-11-23 16:27:20'),
(234, 'ssss', NULL, 'a@gmail.com', '3454354354', '$2y$10$BmPUhY2mxy5dF631PuHGee6PkLUCD3OjkblNGjFcGgJ6audLeW/Bu', 5, NULL, 1, 0, NULL, NULL, 1, '2019-11-25 12:17:12', '2019-11-25 12:32:00'),
(237, 'Ravi Dubey', NULL, 'ravidubey.mca@gmail.com', '9898999898', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-11-25 18:20:09', '2019-11-25 18:21:40'),
(241, 'Piya', NULL, 'b@gmail.com', '1', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-11-28 12:53:57', '2019-11-28 12:53:57'),
(242, 'Faizal Khan', NULL, 'a@gmail.com', 'aaaaaaaaaa', '$2y$10$objbY1ve0h64lHCRJA7DdO8NW/N9.pepDsC61Hda.GBa4GG45R.aW', 2, NULL, 1, 0, NULL, NULL, 1, '2019-11-28 14:36:34', '2019-11-28 14:36:34'),
(247, 'Faizal', NULL, 'Faizal@gmail.com', '8569856985', '$2y$10$4/6IRLUBE5TP9xFsl4fvqump3O/feTKoO5N8uq5v89hI6QscM77i.', 2, NULL, 1, 0, NULL, NULL, 1, '2019-11-28 15:41:17', '2019-11-28 15:43:32'),
(248, 'Faizal Khan', NULL, 'Faizal@gmail.com', '3878454844', '$2y$10$8TkEUj.w4dCkB9Gad1LP1OzVN3XNf.lA8GvvWSp1OOwzzpnsT9.xm', 2, NULL, 1, 0, NULL, NULL, 1, '2019-11-28 15:45:30', '2019-11-28 15:45:30'),
(249, 'trer', NULL, 'trer@gmail.com', '5648948645', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-11-28 17:24:32', '2019-11-28 17:24:32'),
(250, 'siya', NULL, 'siya@gmail.com', '8548568548', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-11-28 17:48:04', '2019-11-28 17:48:04'),
(251, 'Naman', NULL, 'Naman@gmail.com', '2354545664', '$2y$10$27sPoDBZ6YdRuu5bQHpzEugwFEmrT90/iaZiz5SZGvRTmWpPSh.Ja', 2, NULL, 1, 0, NULL, NULL, 1, '2019-11-28 17:50:59', '2019-11-28 17:50:59'),
(252, 'Naman', NULL, 'Naman@gmail.com', '7657577757', '$2y$10$pLvLJOFiF4fMyXWkvBc25.G.ZzxcyePu9LIYj46ppod0soWIiXznC', 2, NULL, 1, 0, NULL, NULL, 1, '2019-11-28 17:51:10', '2019-11-28 17:51:10'),
(253, 'rehan', NULL, 'rehan@gmail.com', '6098756748', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-11-28 17:52:34', '2019-11-28 18:10:14'),
(255, 'ved', NULL, 'ved@gmail.com', '6767676767', '$2y$10$pEr7Lg2EC6hCadHQ8U1thOKygCWVi05lqoftnR2tiOLSzXYL79KGu', 2, NULL, 1, 0, NULL, NULL, 1, '2019-11-29 17:38:06', '2019-11-29 17:38:06'),
(256, 'Raman', NULL, 'Raman@gmail.com', '4545454554', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-11-29 17:46:18', '2019-11-29 17:46:18'),
(257, 'Rafik', NULL, 'Rafik@gmail.com', '7454548674', '$2y$10$z4UI8GALY4EMv0HXPCtqv.ce3cbbarkljPQxSp8VsCDjUXJpy45qO', 2, NULL, 1, 0, NULL, NULL, 1, '2019-11-29 17:53:20', '2019-11-29 17:53:20'),
(258, 'Prin', NULL, 'Prin@gmail.com', '7445644654', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-11-29 17:54:03', '2019-11-29 17:54:03'),
(261, 'Piya', NULL, 'Piya@gmail.com', '8563258655', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-02 12:46:19', '2019-12-02 14:47:56'),
(262, 'Lorem Ipsum 2', NULL, 'lorem12@gmail.com', '4512124545', '$2y$10$7bmxPhi9wStQOBbW1PIfjujbeCv3lMLP8IRStNd5JtjuE0ahlximW', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-02 14:37:46', '2019-12-02 18:26:22'),
(263, 'Demo', NULL, 'dev@gmail.com', '4512126565', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-02 14:39:55', '2019-12-02 14:45:30'),
(264, 'Faiz', NULL, 'Faiz@gmail.com', '4234243243', '$2y$10$t7FX5dLZ.8.T3RN5w29Seuvz2Gqt/HY3JxR46GJjnu7tMn5xOUc0y', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-02 15:21:49', '2019-12-02 15:42:36'),
(265, 'JAFAR', NULL, 'JAFAR@gmail.com', '5893759347', '$2y$10$Um39Gw77FWYBdxhOJzcnYO2UjiOU07E5UwfIjezQskZT/cDXtvdWi', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-02 16:58:07', '2019-12-02 18:46:24'),
(267, 'Lorem Ipsum 2', NULL, 'ipsum2@gmail.com', '5555222233', '$2y$10$lwbnts8g.bPVJbz6XO9JEeVSezxAUsUOtrfTCWzBcSLqMjSm6LpP6', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-02 17:47:07', '2019-12-02 17:47:07'),
(268, 'Lorem Ipsum 2', NULL, 'ipsum2@gmail.com', '5555222244', '$2y$10$L9zNqM63Ww5z99DK7vUfI.7f5vViRMuHBG.8LwV7fIrt15C/Iqg5G', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-02 17:47:54', '2019-12-02 17:47:54'),
(269, 'Lorem Ipsum 2', NULL, 'ipsum2@gmail.com', '5555222289', '$2y$10$4tvcjFgdtmIVQ8ubqxGnNevmsiAjlAEIpweAiWvsVZvh9dfIkxqTq', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-02 17:48:46', '2019-12-02 17:48:46'),
(270, 'Lorem Ipsum 2', NULL, 'ipsum2@gmail.com', '5555222290', '$2y$10$9UFGs7vF7Q5WEyeQkQHuse81Q/nYNZla61ceGwFvKIjnsqih.Ae2q', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-02 17:49:15', '2019-12-02 17:49:15'),
(271, 'Neha', NULL, 'Neha@gmail.com', '3345453454', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-02 18:22:35', '2019-12-02 18:22:35'),
(272, 'Mark', NULL, 'Mark@gmail.com', '3645754757', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-02 18:47:13', '2019-12-02 18:47:13'),
(274, 'Ojas', NULL, 'ojas.co@gmail.com', '2222222222', '$2y$10$LfCU2vFfca3gM2eBFTp.VOZ3KVhciuXkwY70XyQXD/fDLz/LlrFwS', 5, NULL, 1, 0, NULL, NULL, 1, '2019-12-03 17:15:13', '2019-12-09 17:31:53'),
(275, 'Faizal Khan', NULL, 'Faizal@gmail.com', '4654757475', '$2y$10$t29YMAagoHRtVJ2HC8sWJO7WB3GzrPsXd.gEqbaIzJ1RpaKk0xTRi', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-03 17:17:14', '2019-12-05 11:11:59'),
(276, 'JAFAR', NULL, 'JAFAR@gmail.com', '3543646467', '$2y$10$uH77vo6H2UlbBhZ/O.XqlubfJRuo31ZRyAIyuUrlVZGNw9RRZFrT.', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-03 17:18:55', '2019-12-03 17:18:55'),
(277, 'JAFAR', NULL, 'JAFAR@gmail.com', '9658632888', '$2y$10$8jv4j.vo0EB2H7oJUrsPmOQ1etIxVq1xb/jEfgnGXPOoKX7mNofRi', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-05 09:56:34', '2019-12-05 09:56:34'),
(279, 'Roshesh Shah', NULL, 'roshesh@gmail.com', '7363877388', '$2y$10$/i7jDNnW9HaQn4Ru3wDEBevDAZQ.0O.shUNgWjgMDorplFay0GN6q', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-05 11:17:01', '2019-12-05 11:17:01'),
(280, 'Roshni Shah', NULL, 'ravidubey.mca@gmail.com', '7405022209', '$2y$10$CRv77.U7y9Ag1iI0ZVklI.o2inEg24jyY1vMiM331NFUekuWiS2k6', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-05 11:23:35', '2019-12-05 11:23:35'),
(281, 'Demo Clinic', NULL, 'clinic.demo@gmail.com', '5252521212', '$2y$10$nLAPVxHgnCPufpgUH7caKOMOjOyflL7VecEr94naKiskgNp5aaOLi', 5, NULL, 1, 0, NULL, NULL, 1, '2019-12-05 12:41:42', '2019-12-05 12:41:42'),
(282, 'Lorem Ipsum 2', NULL, 'lorem@gmail.com', '7852452222', '$2y$10$kGFpZOy6DwnlIvGP6lw6KeAK3hbM6lKkb9TioR0I6mqpe376CYXXi', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-05 12:42:49', '2019-12-05 19:03:51'),
(283, 'Lorem Ipsum 2', NULL, 'lorem12@gmail.com', '8585454512', '$2y$10$pRtf.1jremxfJzaoSmhLzO0srTsn6qUOD2HFITac4rkfeXCHXsDJ2', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-05 12:43:15', '2019-12-05 12:43:15'),
(284, 'Demo Patient', NULL, 'demo.patient@gmail.com', '8563213212', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-05 12:44:08', '2019-12-05 12:44:08'),
(287, 'testuser', NULL, 'testuser@gmail.com', '8563254746', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-05 15:42:54', '2019-12-05 15:42:54'),
(292, 'Roshni Shah+1', NULL, 'roshani1@gmail.com', '1231231234', '$2y$10$qt7bIjM5fQ1tVB846WKLRupE0O4MCnwIhmJQzugsrE8WwVZ/2UxjG', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-06 13:56:52', '2019-12-06 13:56:52'),
(293, 'sandeep gupta', NULL, 'sandip@gmail.com', '7372039820', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-06 14:25:50', '2019-12-06 14:25:50'),
(294, 'Azra', NULL, 'test@gmail.com', '9912322562', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-06 16:05:15', '2019-12-06 16:05:15'),
(295, 'Naman', NULL, 'Naman@gmail.com', '5645645645', '$2y$10$7xpP1avnEmWh61gieg0JNOQUe0OlAskyQQer6vDXRf/MVQhn7qQfO', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-06 16:17:00', '2019-12-06 16:17:00'),
(296, 'Demo Doctor', NULL, 'demo.doctor@gmail.com', '7894561230', '$2y$10$szj.KC9B6YDmHYSg9p3CqeQ/cNs9M69ZmzFlsifC3GRfm72gmsRc.', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-09 10:47:44', '2019-12-09 10:47:44'),
(300, 'Princy dev', NULL, 'princydev@gmail.com', '8548548548', '$2y$10$PsYjOn8A2YD4ngojYtPOHu4I2P9xV86hS1pPEhC8U2WJ4KZ9VX4zG', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-09 16:58:36', '2019-12-09 17:08:14'),
(305, 'prin', NULL, 'Prin@gmail.com', '6786786786', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-09 17:21:17', '2019-12-09 17:21:17'),
(308, 'Robin', NULL, 'robs@gmail.com', '8460178910', '$2y$10$rr8zSFoL/Pip11dDX0gVruJKlOQQScUJaJJZsA2Bvqqv.nZtl7t4m', 5, NULL, 1, 0, NULL, NULL, 1, '2019-12-09 20:30:21', '2019-12-09 20:30:21'),
(309, 'Genesis Hospital', NULL, 'kiaracaresworth@gmail.com', '9878987898', '$2y$10$UVyHEhYdi0vDUS/F0lsqveJ/TAbazqGY2zihWVxx8gaKR0YRcRaMm', 5, NULL, 1, 0, NULL, NULL, 1, '2019-12-09 21:02:59', '2019-12-09 21:02:59'),
(310, 'Dr NGoyal', NULL, 'sales.rollingedges@gmail.com', '9368909331', '$2y$10$Yv0vxURBVCnVPTfpKYfIPepbUqq1dakGmt5Rah.NSpK3GD7n.vutm', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-09 21:12:53', '2019-12-14 11:40:25'),
(311, 'Navneet', NULL, 'rollingedges.agra@gmail.com', '9411841496', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-09 21:19:27', '2019-12-09 21:28:45'),
(312, 'Shana12', NULL, 'Shana@gmail.com', '1111111111', '$2y$10$w1HjNdqyv4pQxEQzFu7oFe06/leg35EX8JzbUbAiLVazkdZ6Cw3Sq', 6, NULL, 1, 0, NULL, NULL, 1, '2019-12-11 18:17:45', '2019-12-11 18:18:58'),
(313, 'Sahana', NULL, 'Sahana@gmail.com', NULL, '$2y$10$j8YjeMScT1XbRu27cU8VgeBwy9v1JqQ2K8BRoqoFUjY4J14B6uT.i', 6, NULL, 1, 0, NULL, NULL, 1, '2019-12-11 18:19:59', '2019-12-11 18:19:59'),
(314, 'Sahana', NULL, 'Sahana@gmail.com', NULL, '$2y$10$dBuzlk2iGRcpmOTcVz2sYOVxZn6xUf1L8ZXwtBcBhP6W7QOqkCoSS', 6, NULL, 1, 0, NULL, NULL, 1, '2019-12-11 18:21:28', '2019-12-11 18:21:28'),
(315, 'Demo POC Care', NULL, 'demo.poc@gmail.com', NULL, '$2y$10$HenNyEKbOM2n7Ny9uVfm3u.Bu80ACI7B/K8Y/qOW48CvIZpvY8dMS', 6, NULL, 1, 0, NULL, NULL, 1, '2019-12-11 18:30:26', '2019-12-11 18:30:26');
INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `contact_number`, `password`, `role_id`, `device_id`, `verified`, `view`, `expertise`, `city`, `status`, `created_at`, `updated_at`) VALUES
(316, 'Test manager', NULL, 'POC@gmail.com', NULL, '$2y$10$LtYd.uBozlw.KOa1Tg6QxOCAcvS8gPKW5970Nzv8aRKsm/3JPHhHW', 6, NULL, 1, 0, NULL, NULL, 1, '2019-12-11 18:34:46', '2019-12-11 18:34:46'),
(317, 'Demo', NULL, 'demo.patel@gmail.com', '5623333333', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-12 14:22:43', '2019-12-12 14:22:43'),
(318, 'POC Manager', NULL, 'manager@gmail.com', NULL, '$2y$10$Dz4Evk35LQcDW67ER1kr2uqYXncMzIuJWHeraK1WW1.kqMbCJsXB6', 6, NULL, 1, 0, NULL, NULL, 1, '2019-12-12 14:23:06', '2019-12-12 14:23:06'),
(319, 'test', NULL, 'test@gmail.com', '2232323232', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-12 14:36:02', '2019-12-12 14:36:02'),
(320, 'aaa', NULL, 'aaa@gmail.com', '4364365475', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-12 14:40:52', '2019-12-12 14:40:52'),
(321, 'clinic patient', NULL, 'dmam@gmail.com', '3236465475', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-12 14:50:46', '2019-12-12 14:50:46'),
(323, 'Nishant', NULL, 'Nishant@gmail.com', '4564564564', '$2y$10$Q2zIyOQ2JqrH/TGEET64geIz7r511jZcgY78bzuwYsRuByTFHkI8K', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-17 17:13:29', '2019-12-17 17:30:51'),
(326, 'Shahid Patel', NULL, 'shahidpatel.innovius@gmail.com', '8866533952', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-19 10:29:28', '2019-12-23 11:35:20'),
(327, 'Shahid Patel', NULL, 'shahidpatel.innovius@gmail.com', '8855221212', '$2y$10$Z.BiZOiE3V2vpOSFICn58O/XlRJFitiV4k9bTXxpxRj8YzaeRHtz.', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-19 10:30:03', '2019-12-19 10:30:22'),
(328, 'Diya', NULL, 'tuser9556+33@gmail.com', '9859859859', '$2y$10$A0.fyqNqx8X9Zc8y9LbJeOapfPticKKLL75BpwkD4/VnufiWw.wr2', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-19 11:53:05', '2019-12-19 11:53:34'),
(330, 'Neil', NULL, 'Neil@gmail.com', '5475475475', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-20 16:24:05', '2019-12-20 16:24:05'),
(331, 'Pranav', NULL, 'Pranav@gmail.com', '5689853258', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-23 11:22:26', '2019-12-23 11:22:26'),
(332, 'svp hospital', NULL, 'svp@gmail.com', '7788554411', '$2y$10$GhqzdnJa3cGK8WOEaIgnU.o4sDxyV.1XvS2Znv0TT3m8932zE5e3e', 5, NULL, 1, 0, NULL, NULL, 1, '2019-12-24 13:14:29', '2019-12-24 13:14:29'),
(333, 'Neha', NULL, 'neha@gmail.com', '8460521144', '$2y$10$YYc70QvoqfLRCeXFDPFlp.MZGsOk089TNguqQRKWUGk5tFdIiXQK.', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-24 13:17:07', '2019-12-24 13:19:38'),
(334, 'Raj', NULL, 'jay@gmail.com', '8460521177', '$2y$10$ks36tHFL.z58szFzVZJTF.FqhkMLRsFib2AJHaBo8oNryKDDbr4hi', 2, NULL, 1, 0, NULL, NULL, 1, '2019-12-25 04:52:19', '2019-12-25 04:53:20'),
(335, 'Patel', NULL, 'admins@gmail.com', '8460521166', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-25 04:56:28', '2019-12-25 04:56:28'),
(336, 'shahid', NULL, 'sha@gmail.com', NULL, '$2y$10$xRAyYXhHfsOxc493//G.XOcKK7Z0u.v9Wn0fz/rPe7AvshPzRNfk2', 6, NULL, 1, 0, NULL, NULL, 1, '2019-12-26 04:54:53', '2019-12-26 04:54:53'),
(346, 'dsdd', NULL, 'hhhhhhhh@gmail.com', '4543455345', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-26 12:27:02', '2019-12-26 12:27:02'),
(347, 'vddd', NULL, 'hhhnnn@gmail.com', '2434324324', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-26 12:37:48', '2019-12-26 12:37:48'),
(348, 'bbbbeeeebbbsss', NULL, 'bbb.managar@gmail.com', '5555555666', '$2y$10$T8.uWuT4/QxL2/hDX4DSSOrrTalaH3ElnzdNvakbQZWPUhkI.jskK', 7, NULL, 0, 0, NULL, NULL, 1, '2019-12-27 08:38:27', '2019-12-27 09:02:30'),
(349, 'nnnnsss', NULL, 'nnnn@gmail.com', '4353544424', '$2y$10$ukR5YzId6ll3t1dFL6Iz2.WQlsn/mCcVH/w9SBsCxnFwf9sYk/PbS', 7, NULL, 1, 0, NULL, NULL, 1, '2019-12-27 09:03:35', '2019-12-27 09:06:04'),
(350, 'asdasd', NULL, 'gsss@gmail.com', '3434432443', '$2y$10$o78ZruzakKN.3AUEz58JwuRIV5a52qb/DrGNQru/X3xSjdXQcVxdq', 8, NULL, 0, 0, '11', '2', 1, '2019-12-28 07:27:24', '2019-12-28 07:27:24'),
(351, 'sdasdsdbbbbbb', NULL, 'fffff@gmail.com', '4535435353', '$2y$10$iBk.KtnmGiin.7a3tgNyHOAcT2k.IwHQSrYHMV2.JJxpPHtuj4Kfe', 8, NULL, 0, 0, '11', '2', 1, '2019-12-28 08:20:17', '2019-12-28 08:20:17'),
(352, 'ggf', NULL, 'gssss@gmail.cm', '4354354435', '$2y$10$zgYWCv6U/P4DO.V7ERFs7eUsgs5Sgtc64PeJ1i.JuLtBTsn6HcoNa', 8, NULL, 0, 0, '25', '1', 1, '2019-12-28 08:21:35', '2019-12-28 08:21:35'),
(353, 'jjj', NULL, 'jjj@gmail.com', '3453443545', '$2y$10$922TV97SxMQ2D7s0ipE6Wuolg9dxBbKGDZuv.T8Y5dn7z4YPy6GNO', 8, NULL, 0, 0, '25', '3', 1, '2019-12-28 08:28:52', '2019-12-31 07:36:37'),
(354, 'mmmb', NULL, 'mmm@gmail.com', '7744887766', '$2y$10$5df61da8cZQ/pk3YWECdOuQgGVdZfFwvN1rhss2DiZQ3rJUhsp8F.', 8, NULL, 0, 0, '12', '2', 1, '2019-12-31 05:03:46', '2019-12-31 07:44:58'),
(355, 'manish patient', NULL, 'manish@gmail.com', '7754142543', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-31 05:06:44', '2019-12-31 05:06:44'),
(356, 'manoj patient2', NULL, 'manoj@gmail.com', '3243443243', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-31 05:17:02', '2020-01-01 06:16:12'),
(357, 'kamal', NULL, 'kamal@gmail.com', '6574655454', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-31 06:27:49', '2019-12-31 06:27:49'),
(358, 'kkkk', NULL, 'kk@gmail.com', '4546464567', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-31 09:14:17', '2019-12-31 09:35:04'),
(359, 'mmkk', NULL, 'mmkk@gmil.com', '3242544656', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-31 09:38:33', '2019-12-31 09:38:33'),
(360, 'janak', NULL, 'janak@gmail.com', '5678978798', '', 4, NULL, 1, 0, NULL, NULL, 1, '2019-12-31 09:54:42', '2019-12-31 09:54:42'),
(361, 'jak', NULL, 'jak@gmail.com', '4243432432', '$2y$10$cSINrT1is7jAZ7FEKm/rFec90R2uUSt.ysHl7vVB6m8M/PGxQJUp2', 2, NULL, 0, 0, NULL, NULL, 1, '2019-12-31 09:55:45', '2019-12-31 09:55:45'),
(362, 'manoj', NULL, 'manoj1@gmail.com', '3454355435', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-01 07:04:49', '2020-01-01 07:04:49'),
(363, 'bfcf', NULL, 'bfcf@gmail.com', '8460524472', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-01 07:25:52', '2020-01-01 07:25:52'),
(364, 'fffaaa', NULL, 'fffaaa@gmail.com', '4323432434', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-01 11:18:40', '2020-01-01 11:18:40'),
(365, 'vspa', NULL, 'vspa@gmail.com', '5645646545', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-01 12:54:35', '2020-01-01 12:54:35'),
(366, 'sdsaa', NULL, 'sdsaa@gmail.com', '4534543535', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-01 12:58:15', '2020-01-01 12:58:15'),
(367, 'asd', NULL, 'asd@gmail.com', '3453453453', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-02 06:21:45', '2020-01-02 06:21:45'),
(368, 'sdaarr', NULL, 'sdaarr@gmail.com', '5757657687', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-02 06:40:17', '2020-01-02 06:41:06'),
(369, 'nngggg', NULL, 'nngggg@gmail.com', '3433454354', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-02 06:42:07', '2020-01-02 06:42:44'),
(370, 'rebaco', NULL, 'rebaco@gmail.com', '3123213233', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 05:05:14', '2020-01-03 05:05:14'),
(371, 'pocpn1', NULL, 'pocpn1@gmail.com', NULL, '$2y$10$wZigkqbUyI8YXpjnaV01Kup9Z4gRx4ARUAtulSdl7mvVoSnEYqFEm', 6, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 05:15:00', '2020-01-03 05:15:00'),
(372, 'Jinaldr', NULL, 'Jinaldr@gmail.com', '2435455343', '$2y$10$dHNJzCf/u7yLUOj9HKWq.e/ItSMmsnEiBFYfz0MIVHCUlefY5uJbS', 2, NULL, 0, 0, NULL, NULL, 1, '2020-01-03 05:30:41', '2020-01-03 05:30:41'),
(373, 'gd', NULL, 'gd@gmail.com', '2344322344', '$2y$10$I3oaTO/b9gFv054hbXIBWOfvJsYlEm6h4WqFf44JDT/GBikyOBBwy', 2, NULL, 0, 0, NULL, NULL, 1, '2020-01-03 05:34:55', '2020-01-03 05:34:55'),
(374, 'jma', NULL, 'jma@gmai.com', '3443232443', '$2y$10$s29cG61SZfL1d0GZu//pDeVxBflxTfNJ8tP5.Cqdg1ykzkIDnIa0.', 2, NULL, 0, 0, NULL, NULL, 1, '2020-01-03 05:42:37', '2020-01-03 05:42:37'),
(375, 'rehman', NULL, 'rehman@gmail.com', '3423432243', '$2y$10$D1XK/YiPU7L1TdaaYBT2EuCojLFbm0giB8HyBSSgYBvytWcE1nyN2', 2, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 06:03:32', '2020-01-03 06:48:13'),
(376, 'bdf', NULL, 'bdf@gmail.com', '4545565646', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 06:35:41', '2020-01-03 06:35:41'),
(377, 'hgd', NULL, 'hgd@gmail.com', '2343444234', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 06:36:13', '2020-01-03 06:36:13'),
(378, 'jhdf', NULL, 'jhdf@gmail.com', '3543454543', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 06:36:41', '2020-01-10 07:35:26'),
(379, 'gff', NULL, 'gff@gmail.com', '4435543545', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 06:52:12', '2020-01-03 06:52:12'),
(380, 'fsdf', NULL, 'fsdf@gmail.com', '3453454354', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 06:58:33', '2020-01-03 06:58:33'),
(381, 'Bj hospital', NULL, 'bj@gmail.com', '3434342432', '$2y$10$nFLASRIxTc1VUKawiwiTtupYie6nVBYyRiBTaGuAiYaqhWFJS2drG', 5, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 06:59:48', '2020-01-03 06:59:48'),
(382, 'Bj ho dr', NULL, 'bjhodr@gmail.com', '2344544234', '$2y$10$Tv9lY5rFd2/MltqRtFn4j.a1VwRJ5fn46vCrYIWscJIyZC7XzqmhW', 2, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 07:01:36', '2020-01-03 12:06:39'),
(383, 'bgh', NULL, 'bgh@gmail.com', '3453543543', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 07:02:06', '2020-01-07 10:36:02'),
(384, 'hgf', NULL, 'hgf@gmail.com', '3424444324', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 07:09:29', '2020-01-07 10:36:31'),
(385, 'bhjs', NULL, 'bhjs@gmail.com', '3433243243', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 07:27:40', '2020-01-07 10:36:17'),
(386, 'docpoc', NULL, 'docpoc@gmail.com', NULL, '$2y$10$yKe75ZzJmUGJsnB7zRgpGugvNcpQVL3KrkE0KLnwqFS1YyyR9SMua', 6, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 08:39:32', '2020-01-03 08:39:32'),
(387, 'bhj', NULL, 'bhj@gmail.com', '4344434323', '$2y$10$w2gPKv1HeTp4.PByJNQXZO0CDorkLxHWqi.zON5AMW67ktU1caApC', 5, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 08:56:24', '2020-01-03 08:56:24'),
(388, 'sdds', NULL, 'sdds@gmail.com', '3453443435', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 09:20:09', '2020-01-07 10:35:49'),
(389, 'hff', NULL, 'hff@gmail.com', '4354435435', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 12:09:17', '2020-01-07 10:34:42'),
(390, 'fsdfsd', NULL, 'fsdfsd@gmail.com', '2344343243', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 12:09:52', '2020-01-07 10:35:18'),
(391, 'asdasd', NULL, 'asdasd@gmail.com', '2343432432', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 12:15:06', '2020-01-07 10:35:37'),
(392, 'asdfss', NULL, 'asdfss@gmail.com', '3242443432', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-03 12:27:52', '2020-01-07 10:34:24'),
(393, 'asdasa', NULL, 'asdasa@gmail.com', '2343243244', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-07 09:32:34', '2020-01-07 10:18:21'),
(394, 'asdasdasa', NULL, 'asdasdasa@gmail.com', '2343234234', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-07 10:32:39', '2020-01-07 10:32:39'),
(395, 'Bhargav', NULL, 'bhargav.innovius@gmail.com', '8866560742', '$2y$10$Xdc0NNrUKffHwr6rk1jFMuEhbBiTpjExu.g0kwApZbGxb/07Y7vj6', 2, NULL, 0, 0, NULL, NULL, 1, '2020-01-16 09:07:16', '2020-01-16 09:07:16'),
(396, 'moon', NULL, 'moon@gmail.com', '1234567899', '$2y$10$oLkmkfGnWZsIEm3l9gWyj.jd9/aQ17UK4RHjP5qNlzN8BxCSkbx/O', 2, NULL, 0, 1, NULL, NULL, 1, '2020-01-16 09:10:28', '2020-01-17 11:16:46'),
(397, 'xyz', NULL, 'xyz@gmail.com', '7777777777', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-17 04:26:42', '2020-01-17 04:29:30'),
(398, 'xyz1', NULL, 'xyz1@gmail.com', '8888888888', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-17 04:28:42', '2020-01-17 04:29:33'),
(399, 'bhargav', NULL, 'sun@gmail.com', '9898989898', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-17 07:14:38', '2020-01-17 07:14:38'),
(400, 'bhargavx', NULL, 'bhargav.innovius29@gmail.com', '8866560750', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-17 09:08:04', '2020-01-17 09:08:04'),
(401, 'xx', NULL, '11@gmail.com', '1111111112', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-17 09:12:02', '2020-01-17 09:12:02'),
(402, 'xx', NULL, '11@gmail.com', '1111111116', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-17 09:12:54', '2020-01-17 09:12:54'),
(403, 'xx', NULL, '11@gmail.com', '1111111156', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-17 09:22:29', '2020-01-17 09:22:29'),
(404, 'online2', NULL, 'online2@gmail.com', '5656554544', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-17 10:05:23', '2020-01-17 10:05:23'),
(405, 'kmaster', NULL, 'kmaster@gmail.com', '5423648932', '', 4, NULL, 1, 0, NULL, NULL, 1, '2020-01-17 11:26:53', '2020-01-17 11:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_location`
--

CREATE TABLE `user_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `lat` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_location`
--

INSERT INTO `user_location` (`id`, `user_id`, `lat`, `long`, `status`, `created_at`, `updated_at`) VALUES
(15, 150, '27.18806266784668', '77.9888916015625', 1, '2018-09-27 04:04:02', '2018-09-27 04:04:02'),
(16, 146, '27.18806266784668', '77.9888916015625', 1, '2018-09-27 22:05:14', '2018-09-27 22:05:14'),
(18, 51, '23.009958267211914', '72.56268310546875', 1, '2018-09-28 23:01:31', '2018-09-28 23:01:31'),
(24, 57, '30.058258056640625', '78.25341796875', 1, '2018-10-01 06:50:15', '2018-10-01 06:50:15'),
(27, 68, '30.67471694946289', '76.66290283203125', 1, '2018-10-09 02:48:15', '2018-10-09 02:48:15'),
(28, 69, '20.712726593017578', '77.01296997070312', 1, '2018-10-09 22:48:00', '2018-10-09 22:48:00'),
(35, 77, '27.213171005249023', '77.99166107177734', 1, '2018-10-14 05:17:12', '2018-10-14 05:17:12'),
(36, 76, '27.18756103515625', '77.98928833007812', 1, '2018-10-16 03:22:12', '2018-10-16 03:22:12'),
(37, 82, '25.933656692504883', '80.81320190429688', 1, '2018-10-26 18:53:23', '2018-10-26 18:53:23'),
(38, 86, '23.79438018798828', '91.26773071289063', 1, '2018-11-01 16:10:56', '2018-11-01 16:10:56'),
(41, 92, '23.777074813842773', '91.2627182006836', 1, '2018-11-06 17:29:26', '2018-11-06 17:29:26'),
(42, 94, '27.187421798706055', '77.96890258789062', 1, '2018-11-11 20:21:04', '2018-11-11 20:21:04'),
(43, 95, '21.105487823486328', '73.38602447509766', 1, '2018-11-12 19:59:57', '2018-11-12 19:59:57'),
(44, 101, '27.18650245666504', '77.98482513427734', 1, '2018-11-21 20:34:45', '2018-11-21 20:34:45'),
(45, 100, '27.188749313354492', '77.9895248413086', 1, '2018-11-21 20:35:56', '2019-05-31 23:04:56'),
(47, 102, '23.01018714904785', '72.56331634521484', 1, '2018-11-22 02:00:00', '2018-11-22 02:00:00'),
(48, 105, '27.19048309326172', '77.96492004394531', 1, '2018-12-02 05:17:43', '2018-12-02 05:17:43'),
(49, 108, '27.229902267456055', '78.19918060302734', 1, '2018-12-08 20:55:25', '2018-12-08 20:55:25'),
(50, 109, '24.097158432006836', '71.6668701171875', 1, '2018-12-13 00:09:44', '2018-12-13 00:09:44'),
(52, 115, '9.901657104492188', '78.11810302734375', 1, '2018-12-24 03:01:01', '2018-12-24 03:01:01'),
(53, 116, '28.376131057739258', '77.54021453857422', 1, '2018-12-25 22:28:17', '2018-12-25 22:28:17'),
(54, 117, '27.152816772460938', '78.03810119628906', 1, '2018-12-26 17:38:19', '2018-12-26 17:38:19'),
(55, 123, '28.67947006225586', '77.08432006835938', 1, '2019-01-07 23:38:03', '2019-01-07 23:38:03'),
(56, 124, '17.415861129760742', '78.64073181152344', 1, '2019-01-12 06:00:29', '2019-01-12 06:00:29'),
(57, 124, '17.415861129760742', '78.64073181152344', 1, '2019-01-12 06:00:29', '2019-01-12 06:00:29'),
(59, 127, '23.010013580322266', '72.562744140625', 1, '2019-01-12 23:50:35', '2019-01-12 23:50:35'),
(60, 128, '23.00995445251465', '72.56270599365234', 1, '2019-01-13 01:04:42', '2019-01-13 01:04:42'),
(62, 131, '23.00994300842285', '72.5626220703125', 1, '2019-01-13 02:20:34', '2019-01-13 02:20:34'),
(63, 125, '16.842533111572266', '81.6862564086914', 1, '2019-01-13 03:47:13', '2019-01-13 03:47:13'),
(64, 99, '27.247560501098633', '77.9384994506836', 1, '2019-01-28 23:19:44', '2019-01-28 23:19:44'),
(65, 137, '24.3637752532959', '85.6497573852539', 1, '2019-01-29 17:41:48', '2019-01-29 17:41:48'),
(66, 138, '25.243446350097656', '86.96576690673828', 1, '2019-02-01 03:00:33', '2019-02-01 03:00:33'),
(67, 142, '23.37887191772461', '85.33200073242188', 1, '2019-02-05 02:20:48', '2019-02-05 02:20:48'),
(68, 147, '12.887091636657715', '77.54458618164062', 1, '2019-02-07 20:04:50', '2019-02-07 20:04:50'),
(69, 151, '18.45724868774414', '73.79114532470703', 1, '2019-02-10 00:44:27', '2019-02-10 00:44:27'),
(71, 156, '12.969188690185547', '77.71234130859375', 1, '2019-02-14 00:30:14', '2019-02-14 00:30:14'),
(72, 159, '28.90850067138672', '75.61844635009766', 1, '2019-02-17 14:03:00', '2019-02-17 14:03:00'),
(73, 160, '23.010007858276367', '72.56245422363281', 1, '2019-02-19 00:56:38', '2019-02-19 00:56:38'),
(84, 177, '23.009986877441406', '72.56275177001953', 1, '2019-02-23 02:14:33', '2019-02-23 02:14:33'),
(85, 178, '17.86367416381836', '82.98236083984375', 1, '2019-02-24 15:59:05', '2019-02-24 15:59:05'),
(86, 179, '12.95114803314209', '79.30423736572266', 1, '2019-02-24 23:27:05', '2019-02-24 23:27:05'),
(87, 183, '11.322630882263184', '77.7248764038086', 1, '2019-03-05 16:16:17', '2019-03-05 16:16:17'),
(88, 185, '26.841432571411133', '75.77075958251953', 1, '2019-03-09 21:57:56', '2019-03-09 21:57:56'),
(89, 186, '27.48830223083496', '80.98839569091797', 1, '2019-03-10 06:53:50', '2019-03-10 06:53:50'),
(90, 188, '28.617069244384766', '77.07459259033203', 1, '2019-03-11 08:04:44', '2019-03-11 08:04:44'),
(91, 189, '27.80919075012207', '78.64682006835938', 1, '2019-03-12 06:25:21', '2019-03-12 06:25:21'),
(92, 190, '19.907262802124023', '77.5589599609375', 1, '2019-03-14 06:31:14', '2019-03-14 06:31:14'),
(93, 191, '19.89754867553711', '73.14981079101562', 1, '2019-05-23 03:35:33', '2019-05-23 03:35:33'),
(94, 191, '19.89754867553711', '73.14981079101562', 1, '2019-05-23 03:35:33', '2019-05-23 03:35:33'),
(95, 196, '23.010059356689453', '72.56269073486328', 1, '2019-05-30 22:19:57', '2019-05-30 22:19:57'),
(96, 197, '23.01004981994629', '72.56263732910156', 1, '2019-05-30 22:31:00', '2019-05-30 22:31:00'),
(97, 199, '23.010128021240234', '72.56275177001953', 1, '2019-06-17 18:43:30', '2019-06-17 18:43:30'),
(98, 200, '23.009971618652344', '72.562744140625', 1, '2019-06-18 01:56:24', '2019-06-18 01:56:24'),
(99, 201, '27.183591842651367', '77.98800659179688', 1, '2019-06-20 15:15:18', '2019-06-20 15:15:18'),
(100, 203, '23.59048843383789', '72.36197662353516', 1, '2019-06-27 20:24:47', '2019-06-27 20:24:47'),
(101, 202, '27.183393478393555', '77.98773193359375', 1, '2019-06-28 06:39:10', '2019-06-28 06:39:10'),
(102, 205, '23.00995445251465', '72.56234741210938', 1, '2019-06-28 20:00:55', '2019-06-28 20:00:55'),
(103, 208, '23.00986671447754', '72.56258392333984', 1, '2019-07-10 08:42:17', '2019-07-10 08:42:17'),
(104, 209, '23.009963989257812', '72.56265258789062', 1, '2019-07-11 07:12:05', '2019-07-11 07:12:05'),
(105, 210, '23.009981155395508', '72.56265258789062', 1, '2019-07-11 10:52:32', '2019-07-11 10:52:32'),
(106, 193, '23.010021209716797', '72.56339263916016', 1, '2019-07-15 05:28:48', '2019-07-15 05:28:48'),
(107, 211, '23.01006507873535', '72.56272888183594', 1, '2019-07-22 07:46:28', '2019-07-22 07:46:28'),
(108, 211, '23.01006507873535', '72.56272888183594', 1, '2019-07-22 07:46:28', '2019-07-22 07:46:28'),
(109, 211, '23.01006507873535', '72.56272888183594', 1, '2019-07-22 07:46:28', '2019-07-22 07:46:28'),
(110, 211, '23.01006507873535', '72.56272888183594', 1, '2019-07-22 07:46:28', '2019-07-22 07:46:28'),
(111, 213, '23.010051727294922', '72.562744140625', 1, '2019-07-26 05:21:16', '2019-07-26 05:21:16'),
(112, 212, '23.009729385375977', '72.56211853027344', 1, '2019-07-26 06:22:43', '2019-07-26 06:22:43'),
(113, 212, '23.009729385375977', '72.56211853027344', 1, '2019-07-26 06:22:43', '2019-07-26 06:22:43'),
(114, 212, '23.009729385375977', '72.56211853027344', 1, '2019-07-26 06:22:43', '2019-07-26 06:22:43'),
(116, 218, '23.009977340698242', '72.56273651123047', 1, '2019-08-08 10:46:08', '2019-08-08 10:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `videocall`
--

CREATE TABLE `videocall` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `diagnosis` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complaints` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_requested_time` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-request for call, 1: response for call request, 3:call successfully ended',
  `response_status` int(11) NOT NULL DEFAULT 0 COMMENT '0-bydefault , 1:Accept, 2:decline, 3:call successfully ended',
  `call_status` int(11) NOT NULL DEFAULT 0 COMMENT '0-Not Pay 1-Pay, 3:call successfully ended',
  `call_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejectReason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videocall`
--

INSERT INTO `videocall` (`id`, `patient_id`, `doctor_id`, `diagnosis`, `complaints`, `total_requested_time`, `request_status`, `response_status`, `call_status`, `call_time`, `notification_time`, `rejectReason`, `status`, `created_at`, `updated_at`) VALUES
(4, 127, 4, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 2, 2, 2, '0', '0', NULL, 1, '2019-07-03 06:05:39', '2019-08-08 14:16:04'),
(7, 210, 4, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 1, 1, 1, '2019-08-06 10:19:01', NULL, NULL, 1, '2019-07-08 13:30:51', '2019-07-15 06:22:29'),
(8, 127, 150, 'tb', 'no', '5:00', 0, 2, 0, NULL, NULL, NULL, 1, '2019-07-15 10:41:54', '2019-07-15 10:41:54'),
(9, 127, 4, 'tb,Fever', 'hte', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-15 11:37:33', '2019-07-15 11:37:33'),
(10, 127, 150, 'Fever', 'uu', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-15 11:42:00', '2019-07-15 11:42:00'),
(11, 127, 150, 'tb', 'no', '5 Minutes', 1, 1, 0, NULL, NULL, NULL, 1, '2019-07-15 11:43:06', '2019-07-15 11:55:21'),
(13, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 06:52:46', '2019-07-16 06:52:46'),
(14, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 1, 1, 1, '0', '0', NULL, 1, '2019-07-16 06:53:03', '2019-08-10 17:02:44'),
(15, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 06:53:18', '2019-07-16 06:53:18'),
(16, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 06:53:54', '2019-07-16 06:53:54'),
(17, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 1, NULL, NULL, NULL, 1, '2019-07-16 07:16:26', '2019-07-17 10:57:26'),
(18, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 07:19:36', '2019-07-16 07:19:36'),
(19, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 07:26:55', '2019-07-16 07:26:55'),
(20, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 07:27:56', '2019-07-16 07:27:56'),
(21, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 07:28:58', '2019-07-16 07:28:58'),
(22, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 07:29:37', '2019-07-16 07:29:37'),
(23, 127, 150, 'tb', 'nohgjh', '5', 1, 1, 0, NULL, NULL, NULL, 1, '2019-07-16 08:36:12', '2019-07-16 08:36:28'),
(24, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 08:38:13', '2019-07-16 08:38:13'),
(25, 127, 146, 'diabetes,tb', 'test', '10 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 09:09:13', '2019-07-16 09:09:13'),
(26, 127, 146, 'diabetes,Fever', 'test', '5 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 09:11:30', '2019-07-16 09:11:30'),
(27, 127, 146, 'tb,Fever,other', 'testt', '10 Minutes', 1, 1, 1, NULL, NULL, NULL, 1, '2019-07-16 09:20:29', '2019-07-17 12:32:27'),
(28, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:21:57', '2019-07-16 10:21:57'),
(29, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:23:59', '2019-07-16 10:23:59'),
(30, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:25:21', '2019-07-16 10:25:21'),
(31, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:25:53', '2019-07-16 10:25:53'),
(32, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:26:44', '2019-07-16 10:26:44'),
(33, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:27:23', '2019-07-16 10:27:23'),
(34, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:28:14', '2019-07-16 10:28:14'),
(35, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:42:10', '2019-07-16 10:42:10'),
(36, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:51:46', '2019-07-16 10:51:46'),
(37, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:53:28', '2019-07-16 10:53:28'),
(38, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:56:25', '2019-07-16 10:56:25'),
(39, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:56:32', '2019-07-16 10:56:32'),
(40, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:58:01', '2019-07-16 10:58:01'),
(41, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:58:54', '2019-07-16 10:58:54'),
(42, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 10:59:55', '2019-07-16 10:59:55'),
(43, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:00:14', '2019-07-16 11:00:14'),
(44, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:01:40', '2019-07-16 11:01:40'),
(45, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:01:49', '2019-07-16 11:01:49'),
(46, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:04:28', '2019-07-16 11:04:28'),
(47, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:10:10', '2019-07-16 11:10:10'),
(48, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:10:51', '2019-07-16 11:10:51'),
(49, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:20:07', '2019-07-16 11:20:07'),
(50, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:23:37', '2019-07-16 11:23:37'),
(51, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:24:10', '2019-07-16 11:24:10'),
(52, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:25:50', '2019-07-16 11:25:50'),
(53, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:27:10', '2019-07-16 11:27:10'),
(54, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:30:20', '2019-07-16 11:30:20'),
(55, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:39:57', '2019-07-16 11:39:57'),
(56, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:40:30', '2019-07-16 11:40:30'),
(57, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:46:01', '2019-07-16 11:46:01'),
(58, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:46:08', '2019-07-16 11:46:08'),
(59, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:46:55', '2019-07-16 11:46:55'),
(60, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:48:31', '2019-07-16 11:48:31'),
(61, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:50:02', '2019-07-16 11:50:02'),
(62, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:51:14', '2019-07-16 11:51:14'),
(63, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:52:58', '2019-07-16 11:52:58'),
(64, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:53:46', '2019-07-16 11:53:46'),
(65, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:55:35', '2019-07-16 11:55:35'),
(66, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:57:11', '2019-07-16 11:57:11'),
(67, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 11:59:20', '2019-07-16 11:59:20'),
(68, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:05:34', '2019-07-16 12:05:34'),
(69, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:07:33', '2019-07-16 12:07:33'),
(70, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:07:58', '2019-07-16 12:07:58'),
(71, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:08:04', '2019-07-16 12:08:04'),
(72, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:15:05', '2019-07-16 12:15:05'),
(73, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:17:12', '2019-07-16 12:17:12'),
(74, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:17:34', '2019-07-16 12:17:34'),
(75, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:25:32', '2019-07-16 12:25:32'),
(76, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:25:52', '2019-07-16 12:25:52'),
(77, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:26:11', '2019-07-16 12:26:11'),
(78, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:27:33', '2019-07-16 12:27:33'),
(79, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:27:44', '2019-07-16 12:27:44'),
(80, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:30:39', '2019-07-16 12:30:39'),
(81, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 12:31:54', '2019-07-16 12:31:54'),
(82, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 13:20:54', '2019-07-16 13:20:54'),
(83, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 13:30:32', '2019-07-16 13:30:32'),
(84, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-16 13:31:22', '2019-07-16 13:31:22'),
(85, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 04:48:26', '2019-07-17 04:48:26'),
(86, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 04:52:44', '2019-07-17 04:52:44'),
(87, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 04:54:24', '2019-07-17 04:54:24'),
(88, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 04:56:37', '2019-07-17 04:56:37'),
(89, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 04:58:14', '2019-07-17 04:58:14'),
(90, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 04:58:36', '2019-07-17 04:58:36'),
(91, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:06:06', '2019-07-17 05:06:06'),
(92, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:08:33', '2019-07-17 05:08:33'),
(93, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:09:27', '2019-07-17 05:09:27'),
(94, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:10:34', '2019-07-17 05:10:34'),
(95, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:12:12', '2019-07-17 05:12:12'),
(96, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:41:40', '2019-07-17 05:41:40'),
(97, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:44:47', '2019-07-17 05:44:47'),
(98, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:48:02', '2019-07-17 05:48:02'),
(99, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:48:27', '2019-07-17 05:48:27'),
(100, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:48:45', '2019-07-17 05:48:45'),
(101, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:50:27', '2019-07-17 05:50:27'),
(102, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:50:38', '2019-07-17 05:50:38'),
(103, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:56:27', '2019-07-17 05:56:27'),
(104, 127, 150, 'tb', 'nohgjh', '5', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 05:57:00', '2019-07-17 05:57:00'),
(105, 127, 150, 'tb,Fever', 'ee', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 06:16:09', '2019-07-17 06:16:09'),
(106, 127, 144, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 06:19:16', '2019-07-17 06:19:16'),
(107, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 06:22:11', '2019-07-17 06:22:11'),
(108, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 06:23:06', '2019-07-17 06:23:06'),
(109, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 06:23:22', '2019-07-17 06:23:22'),
(110, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 06:24:08', '2019-07-17 06:24:08'),
(111, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 06:24:14', '2019-07-17 06:24:14'),
(112, 127, 150, 'sad as d as', 'asd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sad sa sdfdasd saassa sa', '5:00', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 06:26:55', '2019-07-17 06:26:55'),
(113, 127, 150, 'Food poisoning', 'k', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 06:29:07', '2019-07-17 06:29:07'),
(114, 127, 177, 'Fever', 'xv', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 06:37:20', '2019-07-17 06:39:36'),
(115, 127, 177, 'Food poisoning', 'test', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 06:41:55', '2019-07-17 06:41:55'),
(116, 127, 177, 'Food poisoning', 'bb', '15 Minutes', 1, 2, 0, NULL, NULL, NULL, 1, '2019-07-17 06:42:16', '2019-07-17 06:44:18'),
(117, 127, 177, 'tb,Fever,tese', 'teses', '10 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 09:05:15', '2019-07-17 09:05:15'),
(118, 127, 177, 'test only,Food poisoning', 'trst hhj', '10 Minutes', 1, 1, 0, NULL, NULL, NULL, 1, '2019-07-17 09:10:53', '2019-07-25 06:43:43'),
(119, 127, 177, 'fever,Food poisoning ,diabetes', 'jj', '15 Minutes', 1, 2, 0, NULL, NULL, NULL, 1, '2019-07-17 09:21:19', '2019-07-17 09:23:21'),
(120, 127, 177, 'tb', 'qa', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 10:11:24', '2019-07-17 10:11:33'),
(121, 127, 177, 'Food poisoning ,diabetes', 'teett', '10 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-17 10:13:54', '2019-07-17 12:26:21'),
(122, 127, 177, 'fever,test only,Fever', 'not feeling good', '5 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-19 12:03:02', '2019-07-19 12:03:02'),
(123, 127, 177, 'K/C/O DM, BP. Dx: Viral Pharyngitis,tb,Food poisoning ,fever,diabetes,test only,Fever', 'not feeling good', '5 Minutes', 1, 2, 0, NULL, NULL, NULL, 1, '2019-07-19 12:08:35', '2019-07-19 12:08:41'),
(124, 127, 177, 'K/C/O DM, BP. Dx: Viral Pharyngitis,tb,Food poisoning ,fever,diabetes,Fever,test only', 'not feeling well', '5 Minutes', 1, 2, 0, NULL, NULL, NULL, 1, '2019-07-19 12:09:22', '2019-07-19 12:09:39'),
(125, 127, 177, 'K/C/O DM, BP. Dx: Viral Pharyngitis,Food poisoning ,tb,fever,diabetes,test only,Fever', 'not feeling well', '5 Minutes', 1, 2, 0, NULL, NULL, NULL, 1, '2019-07-19 12:09:59', '2019-07-19 12:10:33'),
(126, 127, 177, 'K/C/O DM, BP. Dx: Viral Pharyngitis,Food poisoning ,tb,fever,diabetes,test only,Fever', 'not feeling well', '5 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-19 12:16:19', '2019-07-19 12:19:18'),
(127, 127, 177, 'tb,Fever,diabetes', 'which is best medicine', '10 Minutes', 1, 2, 0, NULL, NULL, 'not available', 1, '2019-07-25 06:44:24', '2019-07-25 06:44:52'),
(128, 127, 177, 'test only', 'test', '15 Minutes', 1, 2, 0, NULL, NULL, 'no', 1, '2019-07-25 06:58:59', '2019-07-25 06:59:11'),
(129, 127, 177, 'diabetes', 'tesy', '15 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-07-25 07:27:23', '2019-07-25 07:28:21'),
(130, 127, 177, 'test only,tgg', 'the dy', '10 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-07-25 07:30:07', '2019-07-25 07:30:40'),
(131, 127, 177, 'diabetes', 'xit', '1 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-07-25 07:31:02', '2019-07-26 10:21:21'),
(132, 213, 177, 'test only,Fever,corn', 'test', '5 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-27 04:32:41', '2019-07-27 04:32:41'),
(133, 213, 177, 'test only,Fever,corn', 'test only', '5 Minutes', 1, 2, 0, NULL, NULL, 'out of service', 1, '2019-07-27 04:38:58', '2019-07-27 04:39:20'),
(134, 213, 177, 'test only,Fever,corn', 'test', '5 Minutes', 1, 2, 0, NULL, NULL, 'jcjxhzhxbmcm', 1, '2019-07-27 04:40:44', '2019-07-27 04:42:07'),
(135, 213, 177, 'test only,Fever,isjdgjxh', 'djydhl', '10 Minutes', 1, 2, 0, NULL, NULL, 'my choice', 1, '2019-07-27 04:42:39', '2019-07-27 04:42:54'),
(136, 213, 177, 'K/C/O DM, BP. Dx: Viral Pharyngitis,test only,Fever,dihx', 'diyd', '1 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-27 04:43:26', '2019-07-27 04:57:04'),
(137, 213, 177, 'test only,Fever,funrumri', 'dbbdhnr', '5 Minutes', 1, 2, 0, NULL, NULL, 'at', 1, '2019-07-27 05:08:22', '2019-07-27 05:08:36'),
(138, 213, 177, 'diabetes', 'zyyz', '15 Minutes', 1, 2, 0, NULL, NULL, 'sysy', 1, '2019-07-27 05:11:10', '2019-07-27 05:11:17'),
(139, 213, 177, 'Fever,fjf', 'fjf', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-27 05:11:47', '2019-07-27 05:11:52'),
(140, 213, 177, 'test only,Fever,dhdh', 'xjf', '5 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-27 05:14:27', '2019-07-27 05:14:49'),
(141, 213, 177, 'test only,Fever,hun', 'djd', '1 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-07-27 05:15:02', '2019-07-27 05:19:29'),
(142, 201, 75, 'K/C/O DM, BP. Dx: Viral Pharyngitis,diabetes,Fever,arthitis', 'fever', '5 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-29 07:57:31', '2019-07-29 07:57:31'),
(143, 201, 75, 'Food poisoning ,tb,diabetes,rest test,rtgg', 'ffc', '5 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-29 08:03:58', '2019-07-29 08:03:58'),
(144, 127, 177, 'rest test,fever\ncold\ndiabetes', 'mou', '10 Minutes', 1, 2, 0, NULL, NULL, 'bmzvm', 1, '2019-07-29 09:16:06', '2019-07-29 09:17:19'),
(145, 201, 75, 'diabetes,fever', 'huh', '5 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-31 04:15:09', '2019-07-31 04:15:09'),
(146, 201, 75, 'tb,dcc', 'fcv', '5 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-07-31 04:18:56', '2019-07-31 04:21:20'),
(147, 127, 177, 'test,Fever,h', 't', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-31 06:07:05', '2019-07-31 06:07:05'),
(148, 127, 177, 'Fever,rest test', 'dd', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-31 06:13:30', '2019-07-31 06:20:07'),
(149, 127, 177, 'tb', 'vc', '5 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-07-31 06:22:18', '2019-07-31 06:29:51'),
(150, 127, 177, 'Food poisoning', 'hh', '15 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-07-31 06:30:18', '2019-08-01 05:52:10'),
(151, 201, 75, 'K/C/O DM, BP. Dx: Viral Pharyngitis,diabetes,test only,thbh', 'hvvb', '5 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-07-31 12:20:55', '2019-07-31 12:20:55'),
(152, 201, 75, 'tb,Food poisoning ,diabetes,gnh', 'ghjjn', '5 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-07-31 12:21:53', '2019-07-31 12:23:16'),
(153, 127, 177, 'test only,Fever,ggg jsksjshshsjjsshahshhsshhsshdhehdhdhhddbhddbdhbdbxbxnxjxjdxjjxjsdjdjsjsjjssjjsjzjbdbs\nfjcjcjvi', 'test', '10 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-08-01 05:53:35', '2019-08-01 05:58:10'),
(154, 127, 177, 'rest test', 'r', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 05:59:07', '2019-08-01 05:59:07'),
(155, 127, 177, 'tb', 'test', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 06:13:32', '2019-08-01 06:13:32'),
(156, 127, 177, 'rest test', 'v', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 06:15:46', '2019-08-01 06:15:46'),
(157, 127, 177, 'rest test', 'g', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 06:21:37', '2019-08-01 06:21:37'),
(158, 127, 177, 'Fever', 'ui', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 06:22:39', '2019-08-01 06:22:39'),
(159, 127, 177, 'tb', 'g', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 06:24:18', '2019-08-01 06:24:18'),
(160, 127, 177, 'tb', 'u', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 06:26:08', '2019-08-01 06:26:08'),
(161, 127, 177, 'Fever', 'vvv', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 07:23:18', '2019-08-01 07:23:18'),
(162, 127, 177, 'Fever', 'uu', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 07:25:21', '2019-08-01 07:25:21'),
(163, 127, 177, 'tb', 'v', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 07:27:15', '2019-08-01 07:27:15'),
(164, 127, 177, 'tb', 'f', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 07:28:32', '2019-08-01 07:28:32'),
(165, 127, 177, 'tb', 'gg', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 07:29:25', '2019-08-01 07:29:25'),
(166, 127, 177, 'tb', 'gg', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 07:34:04', '2019-08-01 07:34:04'),
(167, 127, 177, 'tb', 'tr', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-01 07:35:53', '2019-08-01 07:36:08'),
(168, 127, 177, 'rest test', 'bb', '15 Minutes', 1, 1, 0, NULL, NULL, NULL, 1, '2019-08-01 07:40:26', '2019-08-01 07:40:34'),
(169, 127, 177, 'tb', 'hh', '15 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-08-01 07:41:22', '2019-08-01 07:44:29'),
(170, 127, 177, 'tb', 'cc', '15 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-08-01 07:45:52', '2019-08-01 07:48:28'),
(171, 127, 177, 'Fever', 'g', '15 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-08-01 07:48:41', '2019-08-01 08:32:18'),
(172, 127, 177, 'disrrhea', 'xx', '15 Minutes', 1, 2, 0, NULL, NULL, 'njjj', 1, '2019-08-01 08:32:36', '2019-08-01 08:32:47'),
(173, 127, 177, 'disrrhea', 'cf', '15 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-08-01 08:33:08', '2019-08-01 08:33:43'),
(174, 127, 177, 'Food poisoning', 'f', '15 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-08-01 08:39:46', '2019-08-01 10:10:45'),
(175, 127, 177, 'Food poisoning', 'gh', '15 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-08-01 10:21:55', '2019-08-01 10:22:40'),
(176, 127, 177, 'tb', 'vv', '15 Minutes', 3, 3, 3, NULL, NULL, NULL, 1, '2019-08-01 10:22:57', '2019-08-01 10:39:18'),
(177, 127, 177, 'rest test,test\nfever', 'no treatment', '10 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-02 09:08:26', '2019-08-02 09:09:03'),
(178, 127, 177, 'disrrhea,yef', 'fgg', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-02 09:14:39', '2019-08-02 09:14:39'),
(179, 127, 177, 'tb', 'j', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-02 09:15:25', '2019-08-06 10:55:04'),
(180, 127, 177, 'tb', 'test', '5 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-07 10:32:18', '2019-08-07 10:32:18'),
(181, 127, 177, 'tb', 'hhj', '10 Minutes', 0, 0, 0, '2019-08-07 10:36:19', '2019-08-07 10:46:19', NULL, 1, '2019-08-07 10:36:00', '2019-08-07 10:36:19'),
(182, 127, 177, 'tb,Fever,t', 'testg', '5 Minutes', 0, 0, 0, '2019-08-07 16:14:14', '2019-08-07 16:19:14', NULL, 1, '2019-08-07 16:14:00', '2019-08-07 16:14:14'),
(183, 127, 177, 'test only', 'bj', '10 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-07 16:21:58', '2019-08-07 16:41:54'),
(184, 127, 177, 'Food poisoning', 'zs', '5 Minutes', 0, 0, 0, '2019-08-07 16:58:23', '2019-08-07 17:03:23', NULL, 1, '2019-08-07 16:58:06', '2019-08-07 16:58:23'),
(185, 200, 177, 'Food poisoning ,disrrhea', 'ted', '10 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-08 10:21:50', '2019-08-08 10:21:50'),
(186, 200, 177, 'diabetes', 't', '10 Minutes', 0, 0, 0, '2019-08-08 10:22:52', '2019-08-08 10:32:52', NULL, 1, '2019-08-08 10:22:31', '2019-08-08 10:22:52'),
(187, 127, 177, 'Food poisoning', 'd', '10 Minutes', 3, 3, 3, '', '', NULL, 1, '2019-08-08 11:03:38', '2019-08-08 11:23:41'),
(188, 127, 177, 'Fever', 'ff', '10 Minutes', 0, 0, 0, '2019-08-08 11:34:20', '2019-08-08 11:44:20', NULL, 1, '2019-08-08 11:24:02', '2019-08-08 11:34:20'),
(189, 127, 177, 'Food poisoning', 'w', '5 Minutes', 0, 0, 0, '2019-08-08 11:52:42', '2019-08-08 12:15:42', NULL, 1, '2019-08-08 11:50:54', '2019-08-08 11:52:42'),
(190, 127, 177, 'Food poisoning', 'tesr', '10 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-08 11:59:23', '2019-08-08 12:02:17'),
(191, 127, 177, 'tb', 'df', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-08 12:17:40', '2019-08-08 12:17:54'),
(192, 127, 177, 'test only', 'k', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-08 12:28:05', '2019-08-08 12:28:12'),
(193, 127, 177, 'diabetes', 'jii', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-08 12:33:33', '2019-08-08 12:33:45'),
(194, 127, 177, 'test only', 'bb', '15 Minutes', 0, 0, 0, NULL, NULL, NULL, 1, '2019-08-08 12:36:14', '2019-08-08 12:36:18'),
(195, 127, 177, 'K/C/O DM, BP. Dx: Viral Pharyngitis', 'fg', '15 Minutes', 0, 0, 1, '2019-08-08 12:47:26', '2019-08-08 13:02:26', NULL, 1, '2019-08-08 12:47:01', '2019-08-08 12:47:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_contact`
--
ALTER TABLE `admin_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_manager`
--
ALTER TABLE `admin_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_procedure`
--
ALTER TABLE `admin_procedure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_details`
--
ALTER TABLE `appointment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinic_id` (`clinic_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `hostipal_id` (`hostipal_id`),
  ADD KEY `speciality_id` (`speciality_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `authority_council`
--
ALTER TABLE `authority_council`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `call_history`
--
ALTER TABLE `call_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_history`
--
ALTER TABLE `chat_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`);

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
-- Indexes for table `doctor_main`
--
ALTER TABLE `doctor_main`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`),
  ADD KEY `speciality` (`speciality`),
  ADD KEY `clinic_name` (`fname`);

--
-- Indexes for table `doctor_speciality`
--
ALTER TABLE `doctor_speciality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_speciality_select`
--
ALTER TABLE `doctor_speciality_select`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `speciality_id` (`speciality_id`);

--
-- Indexes for table `experties`
--
ALTER TABLE `experties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_examination`
--
ALTER TABLE `general_examination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_team`
--
ALTER TABLE `health_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hopi_patient`
--
ALTER TABLE `hopi_patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `hopi_patient_data`
--
ALTER TABLE `hopi_patient_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hopi_patient_id` (`hopi_patient_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investigation`
--
ALTER TABLE `investigation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `investigation_goal`
--
ALTER TABLE `investigation_goal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investigation_id` (`investigation_id`);

--
-- Indexes for table `lab_report`
--
ALTER TABLE `lab_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_of_problem`
--
ALTER TABLE `list_of_problem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `panalistrefer`
--
ALTER TABLE `panalistrefer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panelists`
--
ALTER TABLE `panelists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_detail`
--
ALTER TABLE `patient_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_detail_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_detail_city_foreign` (`city`);

--
-- Indexes for table `patient_diagnosis`
--
ALTER TABLE `patient_diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_family_contact`
--
ALTER TABLE `patient_family_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_family_contact_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `patient_general_examination`
--
ALTER TABLE `patient_general_examination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_health_history`
--
ALTER TABLE `patient_health_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_health_history_family`
--
ALTER TABLE `patient_health_history_family`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_health_history_past`
--
ALTER TABLE `patient_health_history_past`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `patient_helth_records_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `patient_lab_detail`
--
ALTER TABLE `patient_lab_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_past_history`
--
ALTER TABLE `patient_past_history`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patient_priscription`
--
ALTER TABLE `patient_priscription`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pharmacy_list`
--
ALTER TABLE `pharmacy_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_description`
--
ALTER TABLE `plan_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pointofcare`
--
ALTER TABLE `pointofcare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `prescription_pharmacy`
--
ALTER TABLE `prescription_pharmacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_doctors`
--
ALTER TABLE `question_doctors`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `system examination`
--
ALTER TABLE `system examination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`);

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
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_location`
--
ALTER TABLE `user_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_location_user_id_foreign` (`user_id`);

--
-- Indexes for table `videocall`
--
ALTER TABLE `videocall`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_contact`
--
ALTER TABLE `admin_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_manager`
--
ALTER TABLE `admin_manager`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_procedure`
--
ALTER TABLE `admin_procedure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointment_details`
--
ALTER TABLE `appointment_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `authority_council`
--
ALTER TABLE `authority_council`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `call_history`
--
ALTER TABLE `call_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `chat_history`
--
ALTER TABLE `chat_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `coach_detail`
--
ALTER TABLE `coach_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `doctors_balance`
--
ALTER TABLE `doctors_balance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `doctors_bank_detail`
--
ALTER TABLE `doctors_bank_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor_main`
--
ALTER TABLE `doctor_main`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctor_speciality`
--
ALTER TABLE `doctor_speciality`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `doctor_speciality_select`
--
ALTER TABLE `doctor_speciality_select`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `experties`
--
ALTER TABLE `experties`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `general_examination`
--
ALTER TABLE `general_examination`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `health_team`
--
ALTER TABLE `health_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hopi_patient`
--
ALTER TABLE `hopi_patient`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `hopi_patient_data`
--
ALTER TABLE `hopi_patient_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `investigation`
--
ALTER TABLE `investigation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `investigation_goal`
--
ALTER TABLE `investigation_goal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `lab_report`
--
ALTER TABLE `lab_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `list_of_problem`
--
ALTER TABLE `list_of_problem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_health_plan`
--
ALTER TABLE `master_health_plan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1458;

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
-- AUTO_INCREMENT for table `panalistrefer`
--
ALTER TABLE `panalistrefer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `panelists`
--
ALTER TABLE `panelists`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `patient_detail`
--
ALTER TABLE `patient_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `patient_diagnosis`
--
ALTER TABLE `patient_diagnosis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `patient_family_contact`
--
ALTER TABLE `patient_family_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_general_examination`
--
ALTER TABLE `patient_general_examination`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patient_health_history`
--
ALTER TABLE `patient_health_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `patient_health_history_family`
--
ALTER TABLE `patient_health_history_family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `patient_health_history_past`
--
ALTER TABLE `patient_health_history_past`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `patient_health_plan`
--
ALTER TABLE `patient_health_plan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `patient_health_records`
--
ALTER TABLE `patient_health_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `patient_lab_detail`
--
ALTER TABLE `patient_lab_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `patient_past_history`
--
ALTER TABLE `patient_past_history`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_priscription`
--
ALTER TABLE `patient_priscription`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `patient_procedure`
--
ALTER TABLE `patient_procedure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `patient_wallet_detail`
--
ALTER TABLE `patient_wallet_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `pharmacy_list`
--
ALTER TABLE `pharmacy_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plan_description`
--
ALTER TABLE `plan_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pointofcare`
--
ALTER TABLE `pointofcare`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `prescription_pharmacy`
--
ALTER TABLE `prescription_pharmacy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `question_doctors`
--
ALTER TABLE `question_doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `system examination`
--
ALTER TABLE `system examination`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `unit_for_lab_details`
--
ALTER TABLE `unit_for_lab_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT for table `user_location`
--
ALTER TABLE `user_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `videocall`
--
ALTER TABLE `videocall`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clinic`
--
ALTER TABLE `clinic`
  ADD CONSTRAINT `clinic_ibfk_1` FOREIGN KEY (`city`) REFERENCES `city` (`id`);

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
-- Constraints for table `doctors_bank_detail`
--
ALTER TABLE `doctors_bank_detail`
  ADD CONSTRAINT `doctors_bank_detail_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hopi_patient_data`
--
ALTER TABLE `hopi_patient_data`
  ADD CONSTRAINT `hopi_patient_data_ibfk_1` FOREIGN KEY (`hopi_patient_id`) REFERENCES `hopi_patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `investigation_goal`
--
ALTER TABLE `investigation_goal`
  ADD CONSTRAINT `investigation_goal_ibfk_1` FOREIGN KEY (`investigation_id`) REFERENCES `investigation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
