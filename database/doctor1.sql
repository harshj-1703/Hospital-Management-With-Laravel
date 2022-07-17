-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 17, 2022 at 06:03 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `profileimage` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_phoneno_unique` (`phoneno`),
  UNIQUE KEY `admins_email_unique` (`email`),
  KEY `admins_userid_foreign` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `userid`, `firstname`, `lastname`, `phoneno`, `email`, `password`, `dob`, `profileimage`, `address`, `city`, `state`, `country`, `pincode`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'HARSH', 'JOLAPARA', '8128203856', 'admin@gmail.com', '$2y$10$2xcjBlj3BUrHnOpBs3ZiyeLsrXFwc55I5FGxgNAdp4f0eci8O.KNe', '2000-01-01', 'adminprofile/nIav7c5ZE1USzZi8SlVmPaa5srPaF5tY2dFNLpeh.jpg', 'Indian socity , india road', 'RAJKOT', 'GUJRAT', 'INDIA', '360004', 1, NULL, '2022-06-23 07:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dr_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookingdate` date NOT NULL,
  `bookingtime` time NOT NULL,
  `bookingendtime` time DEFAULT NULL,
  `razorpayid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amountpaid` int(11) NOT NULL,
  `status` enum('1','2','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `appointmentstatus` tinyint(1) NOT NULL DEFAULT '0',
  `paymentstatus` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_dr_id_foreign` (`dr_id`),
  KEY `appointments_patient_id_foreign` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `dr_id`, `patient_id`, `purpose`, `bookingdate`, `bookingtime`, `bookingendtime`, `razorpayid`, `amountpaid`, `status`, `appointmentstatus`, `paymentstatus`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'fever', '2022-06-21', '08:00:00', '00:00:00', 'pay_JiTyOvrJeBwLPP', 160, '1', 1, '1', '2022-06-17 02:09:33', '2022-07-06 04:49:59'),
(2, 1, 2, 'fever', '2022-06-21', '09:00:00', '00:00:00', 'pay_JiUBYm9QphK3uL', 160, '2', 0, '1', '2022-06-17 02:22:01', '2022-06-22 09:47:47'),
(3, 1, 1, 'fever', '2022-06-21', '08:00:00', '09:00:00', 'pay_JiUOpvI04fnARQ', 160, '0', 0, '1', '2022-06-17 02:34:35', '2022-06-23 11:58:32'),
(4, 1, 2, 'fever', '2022-06-23', '16:00:00', '17:00:00', 'pay_JiUfFqhGsk7pPF', 160, '1', 0, '1', '2022-06-17 02:50:07', '2022-06-23 09:58:20'),
(6, 1, 2, 'fever', '2022-06-26', '07:00:00', '08:00:00', 'pay_JiWdJF6BiUegiH', 160, '2', 0, '1', '2022-06-17 04:45:41', '2022-06-23 09:58:41'),
(17, 1, 1, 'fever', '2022-06-28', '08:00:00', '09:00:00', 'pay_Jk9g5CXawsVlKI', 160, '2', 0, '1', '2022-06-21 13:06:19', '2022-06-23 09:58:47'),
(8, 1, 1, 'kidney', '2022-06-30', '08:00:00', '09:00:00', 'pay_JiwMkEJdFkpIOu', 160, '2', 0, '1', '2022-06-18 11:26:01', '2022-06-18 11:26:01'),
(10, 1, 2, 'leaver', '2022-06-25', '08:00:00', '09:00:00', 'pay_JiwSX3CsYcq83U', 160, '0', 0, '1', '2022-06-18 11:31:30', '2022-06-23 11:58:35'),
(12, 1, 1, 'corona', '2022-06-29', '08:00:00', '09:00:00', 'pay_JiwZZuC7H0r8Ix', 1510, '1', 0, '1', '2022-06-18 11:38:09', '2022-06-23 09:58:32'),
(19, 1, 2, 'nice', '2022-06-27', '08:00:00', '08:15:00', 'pay_JkUoOVa07Cj6FY', 160, '1', 0, '1', '2022-06-22 09:46:47', '2022-06-24 07:09:21'),
(15, 1, 2, 'kidney', '2022-06-29', '11:00:00', '00:00:00', 'pay_Jj2N4N7no6gGdk', 160, '2', 0, '1', '2022-06-18 17:18:29', '2022-06-23 09:58:39'),
(20, 3, 1, 'fever', '2022-06-25', '10:00:00', '11:00:00', 'pay_JlCsajSss59IQY', 1510, '2', 0, '1', '2022-06-24 04:53:17', '2022-06-24 04:53:17'),
(21, 3, 1, 'fever', '2022-06-25', '10:00:00', '11:00:00', 'pay_JlD5o5gRLic79i', 1510, '2', 0, '1', '2022-06-24 05:05:48', '2022-06-24 05:05:48'),
(22, 2, 1, 'fever', '2022-06-27', '08:00:00', '09:00:00', 'pay_JlDZgMOGPR7Skc', 160, '2', 0, '1', '2022-06-24 05:34:05', '2022-06-24 05:36:50'),
(23, 3, 2, 'fever', '2022-06-25', '10:00:00', '11:00:00', 'pay_JlDaUG3oQ5t2Y5', 1510, '2', 0, '1', '2022-06-24 05:34:51', '2022-06-24 05:34:51'),
(24, 3, 1, 'fever and caugh', '2022-06-25', '10:00:00', '11:00:00', 'pay_JlKiUEEHA7VxbC', 1510, '2', 0, '1', '2022-06-24 12:33:16', '2022-06-24 12:33:16'),
(25, 2, 1, 'kidney and leaver', '2022-07-04', '08:00:00', '09:00:00', 'pay_Jmt2Vf7y4fOsbR', 160, '1', 0, '1', '2022-06-28 10:46:48', '2022-07-07 04:50:04'),
(26, 2, 1, 'fever', '2022-07-04', '08:00:00', '09:00:00', 'pay_Jo5SRDr2VT0428', 160, '2', 0, '1', '2022-07-01 11:34:40', '2022-07-01 11:34:40'),
(27, 1, 1, 'fever', '2022-07-10', '08:00:00', '09:00:00', 'pay_Jpg5IkNEBqXOz1', 160, '2', 0, '1', '2022-07-05 12:03:26', '2022-07-06 07:04:03'),
(28, 1, 1, 'fever', '2003-01-01', '13:01:00', '14:02:00', NULL, 160, '1', 0, '0', '2022-07-06 06:24:24', '2022-07-06 06:31:15'),
(29, 1, 6, 'fever', '2003-08-01', '13:01:00', '14:02:00', NULL, 160, '1', 0, '0', '2022-07-06 06:49:43', '2022-07-06 08:56:47'),
(32, 1, 1, 'fever', '2022-07-09', '13:00:00', '14:00:00', 'pay_JpzeHcmcBa1k6g', 160, '2', 0, '1', '2022-07-06 07:11:44', '2022-07-06 07:44:50'),
(31, 1, 6, 'fever', '2022-08-02', '13:00:00', '14:00:00', NULL, 160, '1', 0, '0', '2022-07-06 06:56:10', '2022-07-08 04:17:28'),
(33, 1, 1, 'fever', '2022-07-11', '11:00:00', '00:00:00', 'pay_JpzgQrJkh4aMEl', 160, '2', 0, '1', '2022-07-06 07:13:46', '2022-07-06 07:13:46'),
(34, 1, 1, 'nicccccccccceeeee', '2003-01-01', '13:01:00', NULL, NULL, 160, '1', 0, '0', '2022-07-06 10:29:28', '2022-07-06 10:29:28'),
(35, 1, 7, 'niceeeeeeee', '2022-09-01', '13:01:00', NULL, NULL, 160, '1', 0, '0', '2022-07-06 10:30:28', '2022-07-06 10:30:41'),
(36, 2, 1, 'caugh', '2022-07-10', '08:00:00', '09:00:00', 'pay_JqLkBmKy7vMJ26', 160, '1', 0, '1', '2022-07-07 04:48:35', '2022-07-07 04:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

DROP TABLE IF EXISTS `awards`;
CREATE TABLE IF NOT EXISTS `awards` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `awardname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `awards_dr_id_foreign` (`dr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `awardname`, `year`, `dr_id`, `created_at`, `updated_at`) VALUES
(113, 'FIFA', '2024', 1, '2022-07-05 12:07:10', '2022-07-05 12:07:10'),
(112, 'nice', '2022', 1, '2022-07-05 12:07:10', '2022-07-05 12:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blogs_dr_id_foreign` (`dr_id`),
  KEY `blogs_admin_id_foreign` (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `detail`, `dr_id`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hello i want to say about yoga.', 'hello everyone do sooryanamaskar at daily it is indian yoga you will never become lazy.', 1, NULL, 1, '2022-07-01 06:43:22', '2022-07-04 10:42:20'),
(2, 'hello everyone how r u all?', 'nice blog shown above is 😎😎😎😎', NULL, 1, 1, '2022-07-01 06:56:10', '2022-07-04 09:46:22'),
(4, 'helooooooooooo', 'niceeeeeeeeeeeeee\ni am fine\nhow are you \ni am very fine', 2, NULL, 1, '2022-07-01 09:00:11', '2022-07-04 06:13:16'),
(6, 'hiiiiiiii how r u?', '<p style=\"white-space: pre-wrap;\">\n                            <p style=\"white-space: pre-wrap;\">\n                            i am fine\n<img src=\"{{url(\'/\')}}/assets/img/logo.png\" class=\"img-fluid\" alt=\"Logo\"></p></p>', NULL, 1, 1, '2022-07-01 10:42:36', '2022-07-04 05:14:02'),
(7, '😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂', '😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂😂', NULL, 1, 1, '2022-07-04 06:14:35', '2022-07-04 06:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `clinicimages`
--

DROP TABLE IF EXISTS `clinicimages`;
CREATE TABLE IF NOT EXISTS `clinicimages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `clinicimages` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinic_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clinicimages_clinic_id_foreign` (`clinic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinicimages`
--

INSERT INTO `clinicimages` (`id`, `clinicimages`, `clinic_id`, `status`, `created_at`, `updated_at`) VALUES
(16, 'clinicimages/wR9SKphxedgJfF2mdNOniDdGs1l4S70QsZvSKPrt.jpg', 3, 0, '2022-06-21 13:03:28', '2022-06-28 07:44:02'),
(15, 'clinicimages/Rz7UBoNvWNskaVDLPYKM9rrLW36MmpkwolsGNB4M.jpg', 4, 1, '2022-06-14 04:42:01', '2022-06-14 04:42:01'),
(19, 'clinicimages/uvlcUMYq6eWKPIm4WyzaMNHERrDgpv51W7QxSntb.jpg', 3, 1, '2022-06-28 07:43:48', '2022-06-28 07:43:48'),
(14, 'clinicimages/y03sGgAU5rWwSu2omLTyAcUDnerS3hcQJ20WOtMc.jpg', 3, 1, '2022-06-13 03:10:51', '2022-06-13 03:10:51'),
(17, 'clinicimages/8AJFASmTdfoGmrod1dHmzx2XfwVclcqov6ShPsnI.jpg', 3, 1, '2022-06-21 13:03:28', '2022-06-21 13:03:28'),
(18, 'clinicimages/C2Rxgt3xBpRBjtB9qvGvtk4K5KukhQgXaxgAziWI.jpg', 7, 1, '2022-06-22 08:14:45', '2022-06-22 08:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

DROP TABLE IF EXISTS `clinics`;
CREATE TABLE IF NOT EXISTS `clinics` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `clinicname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinicaddress` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clinics_dr_id_foreign` (`dr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`id`, `clinicname`, `clinicaddress`, `dr_id`, `created_at`, `updated_at`) VALUES
(3, 'HJ_KING', 'RK PRIME', 1, '2022-06-09 00:35:34', '2022-07-05 12:07:10'),
(4, 'BELVIN', 'GONDAL', 2, '2022-06-09 01:40:31', '2022-06-28 16:42:44'),
(5, '----', '----', 3, '2022-06-09 23:52:46', '2022-06-30 06:21:12'),
(7, 'test1', 'test1', 5, '2022-06-22 08:14:45', '2022-06-30 10:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('M','F','O') COLLATE utf8mb4_unicode_ci DEFAULT 'M',
  `dob` date DEFAULT NULL,
  `profileimage` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci,
  `address1` text COLLATE utf8mb4_unicode_ci,
  `address2` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `general_cons_price` int(7) DEFAULT NULL,
  `videocallprice` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voicecallprice` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctors_userid_foreign` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `userid`, `username`, `email`, `firstname`, `lastname`, `phoneno`, `password`, `gender`, `dob`, `profileimage`, `biography`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `services`, `specialization`, `general_cons_price`, `videocallprice`, `voicecallprice`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'harsh123', 'harsh@gmail.com', 'HARSH', 'JOLAPARA', '8128203859', '$2y$10$anpsOzYQiqdKVWv76499.OCfJI6S/yMPhwGNhcnE3SwyAUgMUL2Ui', 'M', '1998-05-05', 'doctorprofile/M5pqPsf7j4bZesDChh3TWWYihpadLg9dJX8ZYK2m.jpg', 'I LOVE MY INDIA.', 'ANKUR NAGAR-1,ANKUR VIDHYALAYA,BLOCK NO.4', 'SILVER HIEGHTS', 'RAJKOT', 'GUJRAT', 'INDIA', '150', 'child,women,men', 'kidney,brain', 150, '150', '150', 'harsh-jolapara-1', 1, '2022-06-08 04:37:16', '2022-07-06 11:00:28'),
(2, 2, 'belvinnadar123', 'bn@gmail.com', 'BELVIN', 'NADAR', '2222222222', '$2y$10$f9Q71aVUhWAOoInj5W2Bp.YtH5.i4Slmf6iUM5xZa0NZAvoR18rTS', 'M', '1995-06-24', 'doctorprofile/TU0NDV9JWn7bjQuGsCTc4krHK7fmnmerpGqVqI5L.jpg', 'I AM FINE', 'GONDAL', 'GONDAL', 'rajkot', 'kerala', 'INDIA', '150', 'child', 'heart', 150, '150', '150', 'belvin-nadar-2', 1, '2022-06-08 05:07:52', '2022-07-05 07:43:05'),
(3, 3, 'dhanrajparmar', 'dhanraj@gmail.com', 'DHANRAJ', 'PARMAR', '1111111111', '$2y$10$cP9CVZ/zha906bQ8102CJuF95aMmAj6.RWzFr8umOaWLCHQibPK4a', 'M', '1995-06-01', 'doctorprofile/o2LQSR8XQy361A0yj3lE57jF6sTjaGP8NCVUWKen.jpg', NULL, 'Madhav Vatika-2 Madhav park', NULL, 'Rajkot', NULL, NULL, '151', 'kidney,brain', 'bp,accident', 1500, '150', '150', 'dhanraj-parmar-3', 1, '2022-06-09 23:18:30', '2022-07-06 09:00:03'),
(5, 11, 'hj0001', 'hj1@gmail.com', 'HJ1', 'TEST1', '0000000001', '$2y$10$faesR3BPI7rH2BzvRZFI0O8lTujEEanyajvsPJJcbuP8DtIZ4iHye', 'F', '1995-01-01', 'doctorprofile/sJ5wqZdJaLjQkJutAz0qPoH1R9YvuON92EuA1Z1M.jpg', 'test1', 'kakriya talav', 'test1', 'ahemdabad', 'test1', 'test1', '12345672', 'test1', 'test1', 300, '300', '300', 'hj1-test1-5', 1, '2022-06-22 07:49:21', '2022-07-05 10:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `doctorschedules`
--

DROP TABLE IF EXISTS `doctorschedules`;
CREATE TABLE IF NOT EXISTS `doctorschedules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dayid` enum('0','1','2','3','4','5','6') COLLATE utf8mb4_unicode_ci NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `dr_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctorschedules_dr_id_foreign` (`dr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctorschedules`
--

INSERT INTO `doctorschedules` (`id`, `dayid`, `starttime`, `endtime`, `dr_id`, `status`, `created_at`, `updated_at`) VALUES
(53, '0', '07:00:00', '08:00:00', 1, 1, '2022-06-18 11:23:07', '2022-06-18 11:23:07'),
(57, '1', '11:00:00', '00:00:00', 1, 1, '2022-06-18 11:23:35', '2022-06-18 11:23:35'),
(59, '2', '21:00:00', '22:00:00', 1, 1, '2022-06-18 11:24:07', '2022-06-18 11:24:07'),
(38, '3', '10:00:00', '11:00:00', 1, 1, '2022-06-14 01:30:41', '2022-06-14 01:30:41'),
(39, '4', '11:00:00', '00:00:00', 1, 1, '2022-06-14 01:30:54', '2022-06-14 01:30:54'),
(66, '5', '13:00:00', '14:00:00', 1, 1, '2022-06-23 07:23:38', '2022-06-23 07:23:38'),
(41, '6', '13:00:00', '14:00:00', 1, 1, '2022-06-14 01:31:16', '2022-06-14 01:31:16'),
(60, '2', '19:00:00', '20:00:00', 1, 1, '2022-06-18 11:24:07', '2022-06-18 11:24:07'),
(58, '1', '08:00:00', '08:15:00', 1, 1, '2022-06-18 11:23:35', '2022-06-18 11:23:35'),
(55, '0', '09:00:00', '10:00:00', 1, 1, '2022-06-18 11:23:07', '2022-06-18 11:23:07'),
(54, '0', '08:00:00', '09:00:00', 1, 1, '2022-06-18 11:23:07', '2022-06-18 11:23:07'),
(52, '0', '08:00:00', '09:00:00', 2, 1, '2022-06-17 02:33:55', '2022-06-17 02:33:55'),
(51, '6', '10:00:00', '11:00:00', 3, 1, '2022-06-14 04:26:26', '2022-06-14 04:26:26'),
(61, '2', '20:00:00', '21:00:00', 1, 1, '2022-06-18 11:24:07', '2022-06-18 11:24:07'),
(62, '1', '08:00:00', '09:00:00', 2, 1, '2022-06-18 11:30:36', '2022-06-18 11:30:36'),
(63, '0', '08:00:00', '09:00:00', 3, 1, '2022-06-18 11:37:33', '2022-06-18 11:37:33'),
(64, '5', '19:00:00', '20:00:00', 4, 1, '2022-06-18 11:54:05', '2022-06-18 11:54:05'),
(65, '0', '10:00:00', '00:00:00', 5, 1, '2022-06-22 08:10:20', '2022-06-22 08:10:20'),
(68, '5', '08:00:00', '09:00:00', 2, 1, '2022-06-24 05:37:17', '2022-06-24 05:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

DROP TABLE IF EXISTS `educations`;
CREATE TABLE IF NOT EXISTS `educations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `degree` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clg` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yoc` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `educations_dr_id_foreign` (`dr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=183 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `degree`, `clg`, `yoc`, `dr_id`, `created_at`, `updated_at`) VALUES
(182, 'B.TECH', 'MU', '2024', 1, '2022-07-05 12:07:10', '2022-07-05 12:07:10'),
(181, 'MBA', 'MU', '2027', 1, '2022-07-05 12:07:10', '2022-07-05 12:07:10'),
(180, 'B.E.', 'IIT', '2020', 1, '2022-07-05 12:07:10', '2022-07-05 12:07:10'),
(162, 'ict', 'mu', '2024', 2, '2022-06-28 16:42:44', '2022-06-28 16:42:44'),
(179, 'test1', 'test1', '2023', 5, '2022-06-30 10:13:53', '2022-06-30 10:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hospital` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `desg` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experiences_dr_id_foreign` (`dr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `hospital`, `from`, `to`, `desg`, `dr_id`, `created_at`, `updated_at`) VALUES
(121, 'Kingswings', '2022-06-14', '2022-06-25', 'nice', 1, '2022-07-05 12:07:10', '2022-07-05 12:07:10'),
(109, '3gtech', '2022-06-09', '2022-06-25', 'puskardham', 2, '2022-06-28 16:42:44', '2022-06-28 16:42:44'),
(120, 'bhai', '2022-06-15', '2022-07-01', 'nice', 1, '2022-07-05 12:07:10', '2022-07-05 12:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

DROP TABLE IF EXISTS `favourites`;
CREATE TABLE IF NOT EXISTS `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dr_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favourites_dr_id_foreign` (`dr_id`),
  KEY `favourites_patient_id_foreign` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `dr_id`, `patient_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '1', '2022-06-20 07:04:01', '2022-07-05 12:01:07'),
(5, 3, 1, '1', '2022-06-20 07:08:16', '2022-06-28 09:37:02'),
(6, 2, 1, '0', '2022-06-20 07:38:18', '2022-06-28 10:40:04'),
(7, 1, 2, '1', '2022-06-20 15:52:45', '2022-07-05 12:01:07'),
(8, 2, 2, '0', '2022-06-20 15:53:58', '2022-06-28 10:40:04'),
(9, 5, 2, '0', '2022-06-22 08:15:29', '2022-06-23 04:44:36'),
(10, 6, 2, '0', '2022-06-22 08:51:36', '2022-06-22 09:34:49'),
(11, 5, 1, '0', '2022-06-22 11:43:06', '2022-06-23 04:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

DROP TABLE IF EXISTS `memberships`;
CREATE TABLE IF NOT EXISTS `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `membership` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `memberships_dr_id_foreign` (`dr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `membership`, `dr_id`, `created_at`, `updated_at`) VALUES
(55, 'king', 1, '2022-07-05 12:07:10', '2022-07-05 12:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_08_084815_create_doctors_table', 1),
(6, '2022_06_08_114015_create_educations_table', 2),
(7, '2022_06_09_042734_create_awards_table', 3),
(8, '2022_06_09_042918_create_memberships_table', 4),
(9, '2022_06_09_042940_create_registrations_table', 4),
(10, '2022_06_09_043004_create_clinics_table', 5),
(11, '2022_06_09_043519_create_experiences_table', 5),
(12, '2022_06_09_063506_create_clinicimages_table', 6),
(13, '2022_06_10_042242_create_socialmedias_table', 7),
(14, '2022_06_10_062537_create_patients_table', 8),
(15, '2022_06_10_070028_create_doctorschedules_table', 8),
(16, '2022_06_11_045214_create_patient_table', 9),
(17, '2022_06_11_050209_create_patients_table', 10),
(18, '2022_06_17_071527_create_appointments_table', 11),
(19, '2022_06_20_112737_create_favourites_table', 12),
(20, '2022_06_20_141908_create_reviews_table', 13),
(21, '2022_06_21_181525_create_admins_table', 14),
(22, '2022_06_24_101021_create_notificatons_table', 15),
(23, '2022_06_24_102406_create_notifications_table', 16),
(25, '2022_07_01_115618_create_blogs_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dr_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `paidamount` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_dr_id_foreign` (`dr_id`),
  KEY `notifications_patient_id_foreign` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `dr_id`, `patient_id`, `paidamount`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 160, '2022-07-01 11:34:40', '2022-07-01 11:34:40'),
(2, 1, 1, 160, '2022-07-05 12:03:26', '2022-07-05 12:03:26'),
(3, 1, 6, 160, '2022-07-06 06:56:10', '2022-07-06 06:56:10'),
(4, 1, 1, 160, '2022-07-06 07:11:44', '2022-07-06 07:11:44'),
(5, 1, 1, 160, '2022-07-06 07:13:46', '2022-07-06 07:13:46'),
(6, 1, 1, 160, '2022-07-06 10:29:28', '2022-07-06 10:29:28'),
(7, 1, 7, 160, '2022-07-06 10:30:28', '2022-07-06 10:30:28'),
(8, 2, 1, 160, '2022-07-07 04:48:35', '2022-07-07 04:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('M','F','O') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groupofblood` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profileimage` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `patients_email_unique` (`email`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `patients_phoneno_unique` (`phoneno`),
  KEY `patients_userid_foreign` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `userid`, `username`, `firstname`, `lastname`, `phoneno`, `email`, `password`, `gender`, `groupofblood`, `dob`, `profileimage`, `address`, `city`, `state`, `country`, `pincode`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'hhj1234', 'KASHYAP', 'PATHAK', '3333333333', 'hhj@gmail.com', '$2y$10$.XaGrL./VSCqnwphG3rCTevLfR5BP4j5HK8.bUXxyYyfyvAXmltJK', 'M', 'O+', '1960-01-20', 'patientprofile/vmXYxA74LchdnACehDXYp7R8PyRWw51lNyIPegoc.jpg', 'bhaktinagar circle , gaytrinagar', 'RAJKOT', 'GUJRAT', 'INDIA', '360002', 1, '2022-06-10 23:48:31', '2022-07-05 08:46:45'),
(2, 7, 'harsh1234', 'HJ', 'J', '1111111112', 'hhjj@gmail.com', '$2y$10$4GiJUA/dTR7rQKnDI9eN5uTK2X8NJ0cZXjoXrUbZNY4k4L8VImqAO', 'M', 'A-', '2001-01-01', 'patientprofile/wh5mQywCv508TooAEK1vTTZZI7UrdbUAwfEwj2tf.jpg', '1111111111111111111111', '', '', '', '360004', 1, '2022-06-17 04:41:58', '2022-07-06 09:01:22'),
(4, 13, 'harshj1703', NULL, NULL, '8128203857', 'harshj0107@gmail.com', '$2y$10$nqNfGqHnJRksdgTMRepuA.YdaTBiKu.905qhCGCxTyfewwAg/FEg2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-28 04:35:15', '2022-07-06 06:50:43'),
(5, 14, 'mananlal06-07-22', 'manan', 'lal', NULL, 'manan@gmail.com', '$2y$10$Whkz0K5ctC4ZVu05h2dxauUznWfJIWWsZV9HpWqdGusT1w/U7gGdi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-06 06:45:24', '2022-07-06 06:45:24'),
(6, 15, 'dhanjilal06-07-22', 'DHANJI', 'BHAI', NULL, 'dhanjilal@gmail.com', '$2y$10$T1Ft/K1/wjQ9WSrbFuYUvu0kEMIR5kqnVRqayMbh5fTuaTyiOFSHa', 'M', 'A-', '2001-05-01', NULL, 'near laxminagar nala', 'RAJKOT', 'GUJRAT', 'INDIA', '360001', 1, '2022-07-06 06:49:43', '2022-07-08 04:17:57'),
(7, NULL, NULL, 'dhanraj', 'parmar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-06 10:30:08', '2022-07-06 10:30:08'),
(8, 16, 'dhanrajparmar123', 'DHANRAJSINH', 'PARMAR', '2112112121', 'dhanrajparmar@gmail.com', '$2y$10$YAq0Rg7B64eW2ZM9Oxf4p.ft.0y3E1nvjkdIOVx92TlRzUm3juJPy', 'M', 'B+', '2000-01-01', 'patientprofile/KPy9Um49ugjRGCmRutS72KPbtHzIZ3rUhF9Pmy99.jpg', 'punit nagar', 'RAJKOT', 'GUJRAT', 'INDIA', '360004', 1, '2022-07-06 10:37:43', '2022-07-06 10:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `registration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registrations_dr_id_foreign` (`dr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `registration`, `year`, `dr_id`, `created_at`, `updated_at`) VALUES
(53, 'kings', '2024', 1, '2022-07-05 12:07:10', '2022-07-05 12:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `dr_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `star` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended` enum('2','1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_dr_id_foreign` (`dr_id`),
  KEY `reviews_patient_id_foreign` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `parent_id`, `dr_id`, `patient_id`, `star`, `title`, `detail`, `recommended`, `status`, `created_at`, `updated_at`) VALUES
(2, 0, 2, 1, '2', 'Nice Doctor but it is very slow to speak', 'Nice Doctor but it is very slow to speak and slowly giving treatment and dont give high power medicins and very nice person for ........................................................................', '1', '1', '2022-06-15 10:21:32', '2022-07-05 10:39:18'),
(25, 5, 1, 2, '5', '@KASHYAP PATHAK , yes u are right', 'yes this doctor is very nice and helping nature bro', '1', '1', '2022-06-20 17:04:34', '2022-07-05 10:39:20'),
(5, 0, 1, 1, '5', 'Very nice doctor he is.', 'he is very nice doctor and helping nature for poor patients like me i am poor he helps me for medicians', '1', '1', '2022-06-20 10:56:38', '2022-07-05 10:39:21'),
(20, 2, 2, 2, '4', '@KASHYAP PATHAK , yaaaaaaaaaaaaaaaaaaaa', 'very trueeeeeeeeeeeeeeeee', '2', '1', '2022-06-20 16:16:27', '2022-06-20 16:21:59'),
(21, 2, 2, 2, '4', '@KASHYAP PATHAK , okkkkkkkkkkkkkki', 'thanksssssssssssssssss', '2', '1', '2022-06-20 16:18:19', '2022-06-20 16:21:41'),
(22, 0, 2, 2, '4', 'helloooooooooooooooooooooooooooooo', 'niceeeeeeeeeeeeeeeeee', '2', '1', '2022-06-20 16:18:37', '2022-07-08 04:16:31'),
(23, 22, 2, 2, '2', '@HJ J , okiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'okkkkkkkkkkkkkkkkkkkkkkkkkkkk', '2', '1', '2022-06-20 16:18:53', '2022-06-20 16:18:53'),
(28, 22, 2, NULL, '5', '@HJ J , ok i will do my best', 'ok broooooooooooooooooooooooooooooooooo thanks for saaying', '2', '1', '2022-06-21 05:30:16', '2022-06-21 05:30:16'),
(29, 5, 1, NULL, '5', '@KASHYAP PATHAK , thank u', '=============', '2', '1', '2022-06-21 13:02:49', '2022-06-21 13:02:49'),
(30, 0, 5, 1, '4', 'very nice man', 'very nice doctor', '1', '1', '2022-06-22 11:42:49', '2022-06-22 11:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedias`
--

DROP TABLE IF EXISTS `socialmedias`;
CREATE TABLE IF NOT EXISTS `socialmedias` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dr_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `socialmedias_dr_id_foreign` (`dr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialmedias`
--

INSERT INTO `socialmedias` (`id`, `fb`, `twitter`, `insta`, `pinterest`, `linkedin`, `yt`, `dr_id`, `created_at`, `updated_at`) VALUES
(3, 'HJKING', 'HJKING@', 'HJKING', 'HJKING', 'HARSH_JOLAPARA', 'HJ KING', 1, '2022-06-10 00:04:50', '2022-06-10 00:45:54'),
(2, 'dhanraj', 'dhanraj@', 'dhanji_1234', NULL, 'dhanrajsinh parmar', 'dhanraj_rocks', 3, '2022-06-09 23:37:51', '2022-06-10 00:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phoneno_unique` (`phoneno`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phoneno`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'harsh123', '8128203856', 'harsh@gmail.com', '$2y$10$anpsOzYQiqdKVWv76499.OCfJI6S/yMPhwGNhcnE3SwyAUgMUL2Ui', 2, NULL, '2022-06-08 04:37:16', '2022-06-10 01:04:33'),
(2, 'belvinnadar123', '2222222222', 'bn@gmail.com', '$2y$10$f9Q71aVUhWAOoInj5W2Bp.YtH5.i4Slmf6iUM5xZa0NZAvoR18rTS', 2, NULL, '2022-06-08 05:07:52', '2022-06-08 05:07:52'),
(3, 'dhanrajparmar', '1111111111', 'dhanraj@gmail.com', '$2y$10$cP9CVZ/zha906bQ8102CJuF95aMmAj6.RWzFr8umOaWLCHQibPK4a', 2, NULL, '2022-06-09 23:18:30', '2022-06-09 23:18:30'),
(6, 'hhj1234', '3333333333', 'hhj@gmail.com', '$2y$10$.XaGrL./VSCqnwphG3rCTevLfR5BP4j5HK8.bUXxyYyfyvAXmltJK', 3, NULL, '2022-06-10 23:48:31', '2022-06-12 23:24:58'),
(7, 'harsh1234', '1111111112', 'hhjj@gmail.com', '$2y$10$4GiJUA/dTR7rQKnDI9eN5uTK2X8NJ0cZXjoXrUbZNY4k4L8VImqAO', 3, NULL, '2022-06-17 04:41:58', '2022-06-17 04:41:58'),
(10, 'admin123', '2424242424', 'admin@gmail.com', '$2y$10$2xcjBlj3BUrHnOpBs3ZiyeLsrXFwc55I5FGxgNAdp4f0eci8O.KNe', 1, NULL, NULL, '2022-06-22 07:17:29'),
(11, 'hj0001', '0000000001', 'hj1@gmail.com', '$2y$10$faesR3BPI7rH2BzvRZFI0O8lTujEEanyajvsPJJcbuP8DtIZ4iHye', 2, NULL, '2022-06-22 07:49:21', '2022-06-22 07:49:21'),
(12, 'hj0002', '0000000002', 'hj2@gmail.com', '$2y$10$gKUQlp4Fy442mgNTRyiMBug7LfCOP.VnahWhyF1.glAsNVKFnaUvK', 2, NULL, '2022-06-22 08:09:26', '2022-06-22 08:09:26'),
(13, 'harshj1703', '8128203857', 'harshj0107@gmail.com', '$2y$10$nqNfGqHnJRksdgTMRepuA.YdaTBiKu.905qhCGCxTyfewwAg/FEg2', 3, NULL, '2022-06-28 04:35:15', '2022-06-28 04:35:15'),
(14, 'mananlal06-07-22', NULL, 'manan@gmail.com', '$2y$10$Whkz0K5ctC4ZVu05h2dxauUznWfJIWWsZV9HpWqdGusT1w/U7gGdi', 3, NULL, '2022-07-06 06:45:24', '2022-07-06 06:45:24'),
(15, 'dhanjilal06-07-22', NULL, 'dhanjilal@gmail.com', '$2y$10$T1Ft/K1/wjQ9WSrbFuYUvu0kEMIR5kqnVRqayMbh5fTuaTyiOFSHa', 3, NULL, '2022-07-06 06:49:43', '2022-07-06 06:49:43'),
(16, 'dhanrajparmar123', '2112112121', 'dhanrajparmar@gmail.com', '$2y$10$YAq0Rg7B64eW2ZM9Oxf4p.ft.0y3E1nvjkdIOVx92TlRzUm3juJPy', 3, NULL, '2022-07-06 10:37:43', '2022-07-06 10:37:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
