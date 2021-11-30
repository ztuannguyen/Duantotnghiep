-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 05:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_datn`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `number_phone` varchar(255) NOT NULL,
  `salon_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `note` varchar(300) DEFAULT NULL,
  `date_booking` date NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `add_by_id_user` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `number_phone`, `salon_id`, `time_id`, `note`, `date_booking`, `total_price`, `discount_price`, `add_by_id_user`, `status`, `created_at`, `updated_at`) VALUES
(140, '0981794925', 1, 83, NULL, '2021-11-24', 100000, NULL, NULL, 4, '2021-11-24 03:37:32', '2021-11-24 07:57:58'),
(141, '0981794925', 1, 83, NULL, '2021-11-24', 140000, NULL, NULL, 4, '2021-11-24 03:43:58', '2021-11-24 07:57:52'),
(149, '0981794925', 1, 83, NULL, '2021-11-26', 219000, NULL, NULL, 2, '2021-11-26 14:37:14', '2021-11-26 14:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `booking_services`
--

CREATE TABLE `booking_services` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `chair_id` int(11) DEFAULT NULL,
  `salon_id` int(11) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_services`
--

INSERT INTO `booking_services` (`id`, `booking_id`, `service_id`, `chair_id`, `salon_id`, `time_start`, `time_end`, `status`, `updated_at`, `created_at`) VALUES
(413, 140, 14, 30, 1, '08:30:00', '09:00:00', 1, '2021-11-24 03:46:10', '2021-11-24 03:37:32'),
(414, 141, 14, 31, 1, '08:30:00', '09:00:00', 1, '2021-11-24 06:52:22', '2021-11-24 03:43:58'),
(415, 141, 15, 31, 1, '09:00:00', '09:20:00', 1, '2021-11-24 08:56:58', '2021-11-24 03:43:58'),
(432, 149, 14, 30, 1, '08:30:00', '09:00:00', 1, '2021-11-26 14:37:22', '2021-11-26 14:37:14'),
(433, 149, 28, 30, 1, '09:00:00', '09:30:00', 1, '2021-11-26 14:54:01', '2021-11-26 14:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `cate_services`
--

CREATE TABLE `cate_services` (
  `id` int(11) NOT NULL,
  `name_cate` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `order_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cate_services`
--

INSERT INTO `cate_services` (`id`, `name_cate`, `status`, `order_by`, `created_at`, `updated_at`) VALUES
(19, 'CẮT GỘI MASSAGE', 0, 1, '2021-09-28 23:00:51', '2021-11-19 15:09:25'),
(21, 'COMBO CHĂM SÓC DA - THƯ GIÃN', 0, 2, '2021-09-30 15:02:42', '2021-11-19 15:09:23'),
(22, 'UỐN HÀN QUỐC 4 CẤP ĐỘ', 0, 3, '2021-09-30 15:02:50', '2021-10-16 02:39:42'),
(23, 'NHUỘM CAO CẤP', 0, 4, '2021-10-03 06:55:25', '2021-10-16 02:39:46'),
(24, 'HẤP - PHỤC HỒI', 0, 5, '2021-10-05 03:37:00', '2021-10-16 02:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `chairs`
--

CREATE TABLE `chairs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chairs`
--

INSERT INTO `chairs` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(30, 'Ghế 1', 0, '2021-10-29 03:59:04', '2021-11-10 07:46:01'),
(31, 'Ghế 2', 0, '2021-10-29 03:59:28', '2021-11-09 10:26:01'),
(32, 'Ghế 3', 0, '2021-10-29 03:59:33', '2021-10-29 03:59:33'),
(33, 'Ghế 4', 0, '2021-10-29 03:59:42', '2021-10-29 03:59:42'),
(34, 'Ghế 5', 0, '2021-10-29 03:59:48', '2021-10-29 03:59:48'),
(35, 'Ghế 6', 0, '2021-10-29 03:59:54', '2021-10-29 03:59:54'),
(36, 'Ghế 7', 0, '2021-10-29 04:00:00', '2021-10-29 04:00:00'),
(37, 'Ghế 8', 0, '2021-11-03 13:40:46', '2021-11-03 13:40:46'),
(38, 'Ghế 9', 0, '2021-11-03 13:40:52', '2021-11-03 13:40:52'),
(39, 'Ghế 10', 0, '2021-11-03 13:40:58', '2021-11-10 07:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone_number`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Bá Phi', '0981794925', 'Bên mình có cơ sở ở Hải Phòng không ?', 0, '2021-10-16 10:41:50', '2021-11-10 10:19:10'),
(3, 'Đỗ Trường Giang', '0934754326', 'Shop làm từ mấy giờ đến mấy giờ ạ ?', 1, '2021-10-16 08:47:38', '2021-11-17 07:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, '1634370129.png', 0, '2021-10-16 00:42:09', '2021-11-10 10:16:43'),
(4, '1634370361.png', 0, '2021-10-16 00:43:47', '2021-11-10 10:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'nhân viên', '2021-09-28 02:52:33', '2021-09-28 02:52:33'),
(2, 'quản lý', '2021-09-28 02:52:42', '2021-09-28 02:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `salons`
--

CREATE TABLE `salons` (
  `id` int(100) NOT NULL,
  `name_salon` varchar(250) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slot_amount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salons`
--

INSERT INTO `salons` (`id`, `name_salon`, `address`, `image`, `slot_amount`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Cơ sở 1', '151 Cầu Giấy, P. Quan Hoa, Q. Cầu Giấy, Hà Nội', '1633268814.png', 5, 0, 'Gần ngã tư đường Láng - Cầu Giấy cách 300m', '2021-09-28 00:32:31', '2021-11-19 15:11:56'),
(2, 'Cơ sở 2', '109 Trần Quốc Hoàn, P. Dịch Vọng Hậu, Q. Cầu Giấy, Hà Nội', '1633268834.png', 5, 0, 'Cách ngã tư Mai dịch 500m - rẽ phải 400m', '2021-09-28 00:45:51', '2021-10-20 07:09:08'),
(3, 'Cơ sở  3', '382 Nguyễn Trãi, P. Thanh Xuân Trung, Q. Thanh Xuân, Hà Nội', '1633268845.png', 7, 0, 'Cạnh hầm chui Thanh Xuân, bên tay phải đi theo hướng về Hà Đông', '2021-09-28 00:46:28', '2021-10-29 02:39:58'),
(4, 'Cơ sở 4', '235 Đội Cấn, P. Liễu Giai, Q. Ba Đình, Hà Nội', '1633268856.png', 7, 0, 'Gần nhà khách LA THÀNH cách 300m, bên tay phải đi theo lăng chủ tịch HCM', '2021-09-28 00:47:06', '2021-10-20 07:09:23'),
(5, 'Cơ sở 5', '346 Khâm Thiên, P. Thổ Quan, Q. Đống Đa, Hà Nội', '1636538112.png', 5, 0, 'Đi vào 900m từ ngã 5 Ô Chợ Dừa - Xã Đàn', '2021-09-28 00:51:42', '2021-11-10 09:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `salon_chairs`
--

CREATE TABLE `salon_chairs` (
  `id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  `chair_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salon_chairs`
--

INSERT INTO `salon_chairs` (`id`, `salon_id`, `chair_id`, `created_at`, `updated_at`) VALUES
(1, 16, 30, '2021-11-03 13:57:09', '2021-11-03 13:57:09'),
(2, 16, 31, '2021-11-03 13:57:09', '2021-11-03 13:57:09'),
(3, 16, 32, '2021-11-03 13:57:09', '2021-11-03 13:57:09'),
(4, 16, 33, '2021-11-03 13:57:09', '2021-11-03 13:57:09'),
(5, 16, 34, '2021-11-03 13:57:09', '2021-11-03 13:57:09'),
(6, 16, 35, '2021-11-03 13:57:09', '2021-11-03 13:57:09'),
(7, 16, 36, '2021-11-03 13:57:09', '2021-11-03 13:57:09'),
(27, 19, 30, '2021-11-10 09:36:31', '2021-11-10 09:36:31'),
(28, 19, 31, '2021-11-10 09:36:31', '2021-11-10 09:36:31'),
(29, 19, 32, '2021-11-10 09:36:31', '2021-11-10 09:36:31'),
(30, 19, 34, '2021-11-10 09:36:31', '2021-11-10 09:36:31'),
(63, 20, 30, '2021-11-10 09:57:09', '2021-11-10 09:57:09'),
(64, 21, 30, '2021-11-10 10:02:52', '2021-11-10 10:02:52'),
(65, 21, 31, '2021-11-10 10:02:52', '2021-11-10 10:02:52'),
(66, 21, 32, '2021-11-10 10:02:52', '2021-11-10 10:02:52'),
(67, 21, 33, '2021-11-10 10:02:52', '2021-11-10 10:02:52'),
(68, 21, 34, '2021-11-10 10:02:52', '2021-11-10 10:02:52'),
(69, 21, 35, '2021-11-10 10:02:52', '2021-11-10 10:02:52'),
(70, 21, 36, '2021-11-10 10:02:52', '2021-11-10 10:02:52'),
(71, 21, 37, '2021-11-10 10:02:52', '2021-11-10 10:02:52'),
(72, 21, 38, '2021-11-10 10:02:52', '2021-11-10 10:02:52'),
(73, 21, 39, '2021-11-10 10:02:52', '2021-11-10 10:02:52'),
(74, 1, 30, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(75, 1, 31, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(76, 1, 32, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(77, 1, 33, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(78, 1, 34, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(79, 2, 30, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(80, 2, 31, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(81, 2, 32, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(82, 2, 33, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(83, 2, 34, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(84, 3, 30, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(85, 3, 31, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(86, 3, 32, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(87, 3, 33, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(88, 3, 34, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(89, 3, 35, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(90, 3, 36, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(91, 4, 30, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(92, 4, 31, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(93, 4, 32, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(94, 4, 33, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(95, 4, 34, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(96, 4, 35, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(97, 4, 36, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(98, 5, 30, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(99, 5, 31, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(100, 5, 32, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(101, 5, 33, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(102, 5, 34, '2021-11-24 02:50:02', '2021-11-24 02:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `salon_times`
--

CREATE TABLE `salon_times` (
  `id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salon_times`
--

INSERT INTO `salon_times` (`id`, `salon_id`, `time_id`, `created_at`, `updated_at`) VALUES
(1, 1, 83, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(2, 1, 84, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(3, 1, 85, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(4, 1, 86, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(5, 1, 87, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(6, 1, 88, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(7, 1, 89, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(8, 1, 90, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(9, 1, 91, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(10, 1, 92, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(11, 1, 93, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(12, 1, 94, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(13, 1, 95, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(14, 1, 96, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(15, 1, 97, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(16, 1, 98, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(17, 1, 99, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(18, 1, 100, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(19, 1, 101, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(20, 1, 102, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(21, 1, 103, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(22, 1, 104, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(23, 1, 105, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(24, 1, 106, '2021-11-24 02:48:31', '2021-11-24 02:48:31'),
(25, 2, 83, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(26, 2, 84, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(27, 2, 85, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(28, 2, 86, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(29, 2, 87, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(30, 2, 88, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(31, 2, 89, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(32, 2, 90, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(33, 2, 91, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(34, 2, 92, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(35, 2, 93, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(36, 2, 94, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(37, 2, 95, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(38, 2, 96, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(39, 2, 97, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(40, 2, 98, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(41, 2, 99, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(42, 2, 100, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(43, 2, 101, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(44, 2, 102, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(45, 2, 103, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(46, 2, 104, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(47, 2, 105, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(48, 2, 106, '2021-11-24 02:49:04', '2021-11-24 02:49:04'),
(49, 3, 83, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(50, 3, 84, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(51, 3, 85, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(52, 3, 86, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(53, 3, 87, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(54, 3, 88, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(55, 3, 89, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(56, 3, 90, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(57, 3, 91, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(58, 3, 92, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(59, 3, 93, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(60, 3, 94, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(61, 3, 95, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(62, 3, 96, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(63, 3, 97, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(64, 3, 98, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(65, 3, 99, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(66, 3, 100, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(67, 3, 101, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(68, 3, 102, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(69, 3, 103, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(70, 3, 104, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(71, 3, 105, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(72, 3, 106, '2021-11-24 02:49:22', '2021-11-24 02:49:22'),
(73, 4, 83, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(74, 4, 84, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(75, 4, 85, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(76, 4, 86, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(77, 4, 87, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(78, 4, 88, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(79, 4, 89, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(80, 4, 90, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(81, 4, 91, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(82, 4, 92, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(83, 4, 93, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(84, 4, 94, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(85, 4, 95, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(86, 4, 96, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(87, 4, 97, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(88, 4, 98, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(89, 4, 99, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(90, 4, 100, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(91, 4, 101, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(92, 4, 102, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(93, 4, 103, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(94, 4, 104, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(95, 4, 105, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(96, 4, 106, '2021-11-24 02:49:41', '2021-11-24 02:49:41'),
(97, 5, 83, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(98, 5, 84, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(99, 5, 85, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(100, 5, 86, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(101, 5, 87, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(102, 5, 88, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(103, 5, 89, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(104, 5, 90, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(105, 5, 91, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(106, 5, 92, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(107, 5, 93, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(108, 5, 94, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(109, 5, 95, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(110, 5, 96, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(111, 5, 97, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(112, 5, 98, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(113, 5, 99, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(114, 5, 100, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(115, 5, 101, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(116, 5, 102, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(117, 5, 103, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(118, 5, 104, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(119, 5, 105, '2021-11-24 02:50:02', '2021-11-24 02:50:02'),
(120, 5, 106, '2021-11-24 02:50:02', '2021-11-24 02:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `execution_time` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` text NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `order_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `execution_time`, `discount`, `description`, `detail`, `image`, `status`, `cate_id`, `order_by`, `created_at`, `updated_at`) VALUES
(14, 'Combo cắt gội 10 bước', 100000, 30, 80000, 'Combo nổi tiếng - Free giường massge', 'Combo \"đặc sản\" của BrotherHoods, bạn sẽ cùng chúng tôi trải nghiệm chuyến hành trình tỏa sáng đầy thú vị - nơi mỗi người đàn ông không chỉ cắt tóc mà còn tìm thấy nhiều hơn như thế', '1633427459.jpg', 0, 19, 1, '2021-09-29 06:40:25', '2021-11-19 15:13:50'),
(15, 'Gội massage dưỡng sinh', 40000, 20, 30000, 'Gội sấy vuốt sáp - Siêu thư giãn', 'Thư giãn, giải tỏa mệt mỏi ư! Đơn giản, các bạn skinner với bài gội đầu massage dưỡng sinh sẽ giúp anh. Sau cùng stylist sẽ vuốt sáp tạo kiểu để đẹp trai cả ngày', '1633428219.jpg', 0, 19, 2, '2021-09-30 15:07:03', '2021-10-05 03:03:39'),
(16, 'Cắt xả tạo kiểu', 70000, 30, 60000, 'Thợ cắt xả - Dành cho người bận rộn', 'Quá bận! Eo hẹp về thời gian, phải đi công chuyện gấp thì đây là gói dịch vụ anh nên chọn! Thợ cắt sẽ xả và cắt tóc tạo kiểu cho anh luôn!', '1633428406.jpg', 0, 19, 3, '2021-09-30 15:07:03', '2021-10-05 03:06:46'),
(17, 'Kid combo', 70000, 30, 60000, 'Mĩ phẩm dịu nhẹ - thợ chiều trẻ em', 'Đẹp trai không phân biệt tuổi tác! Gói dịch vụ thiết kế dành riêng cho các bé trai, mĩ phẩm dịu nhẹ phù hợp với làn da và phải nói nhỏ thợ tại Brotherhoods siêu chiều các bé!', '1633432634.jpg', 0, 19, 4, '2021-10-02 09:08:54', '2021-10-05 04:17:14'),
(18, 'Tẩy da chết sủi bọt, Đắp mặt nạ', 40000, 8, 30000, 'Trắng sáng tức thì, da mịn màng chắc khỏe', 'Máy tẩy tế bào chết xịn nhất thị trường, sử dụng công nghệ Ultra Sonic kết hợp cùng gel tẩy da chết sủi bọt giúp da sạch mịn không ngờ. Loại bỏ độc tố dầu nhờn, làm sạch lỗ chân lông, bổ sung tinh chất trắng da. Mặt nạ đá lạnh tươi mát bổ sung dưỡng chất sản sinh collagen, tái tạo tế bào da mới', '1633429367.jpg', 0, 21, 1, '2021-10-02 09:09:19', '2021-10-05 03:22:47'),
(19, 'Massage cổ vai gáy', 40000, 8, 30000, '<p>Thư gi&atilde;n tuyệt đối, xả stress</p>', '<p>Đ&ocirc;i b&agrave;n tay uyển chuyển của skinner với b&agrave;i massage cổ truyền t&aacute;c động 12 huyệt đạo điệu nghệ cơn đau mỏi của anh sẽ nhanh ch&oacute;ng tan biến</p>', '1633429472.jpg', 0, 19, 2, '2021-10-02 09:09:41', '2021-11-09 08:12:30'),
(20, 'Lột mụn cám, Tẩy da chết sủi bọt', 65000, 10, 50000, 'Sạch mụn, không to lỗ chân lông', 'Gói dịch vụ tuyệt vời sẽ giúp anh trải nghiệm cảm giác mát lạnh chưa từng có. Công thức kết hợp không chỉ chăm sóc da mặt sáng khoẻ mà còn trị tận gốc các tác nhân gây gàu ngứa, loại bỏ tạp chất và bổ sung màng bảo vệ nang tóc. Hay hơn nữa, các skinner còn kết hợp thêm trong đó kỹ thuật massage con kiến sảng khoái, dứt cơn đau đầu siêu đỉnh', '1633432759.jpg', 0, 21, 3, '2021-10-02 09:09:55', '2021-10-05 04:19:19'),
(21, 'Detox sạch gàu - massage', 70000, 10, 60000, 'Trị gầu ngứa -  Dứt cơn đau đầu', 'Mụn đầu đen, mụn cám khiến da trở nên sạm màu, kém sắc có thể biến thành các loại mụn viêm, tàn nhang. Vậy đâu là cách để ngăn chặn chuyện đó? Bắt đầu với lớp bọt mịn tẩy da chết đánh bay bụi bẩn, mở rộng lỗ chân lông. Sử dụng tinh than tre kết dính, kết hợp các loại máy công nghệ cao, an toàn để lấy mụn, hút mụn. Tiếp đó, bổ sung tinh chất lô hội dịu nhẹ cho làn da căng bóng và êm mịn. Cuối cùng, cân bằng lại bằng mặt nạ đá lạnh để trải nghiệm thêm tuyệt vời nhất', '1633432773.jpg', 0, 21, 4, '2021-10-05 03:31:27', '2021-10-05 04:19:33'),
(22, 'Lấy ráy tai thoải mái sảng khoái', 30000, 20, 20000, 'An toàn - giải ngứa', 'Quy trình lấy chuyên nghiệp hiện đại, dụng cụ vệ sinh an toàn. Thăng hoa cùng giai điệu âm thoa vàng kết hợp tinh dầu tràm trà mát dịu', '1633429980.jpg', 0, 21, 5, '2021-10-05 03:33:00', '2021-10-05 03:33:00'),
(23, 'Uốn tiêu chuẩn', 260000, 30, 240000, 'Dành cho mọi loại tóc - sóng căng bóng', 'Xu hướng tóc không thể cưỡng lại của nam giới hiện đại. Uốn sóng căng, độ mềm tự nhiên, lên sóng nhanh, giữ sóng lâu, tóc vào nếp dễ dàng', '1633430171.jpg', 0, 22, 1, '2021-10-05 03:36:11', '2021-10-05 03:36:11'),
(24, 'Uốn cao cấp', 350000, 30, 330000, 'Dành cho tóc khô sơ - bổ sung dưỡng chất', 'Xu hướng tóc uốn lãng tử Hàn Quốc không thể cưỡng lại, tóc bóng mượt, dày hơn nhờ bổ sung thành phần phân tử keratin & collagen. Trải nghiệm uốn tóc cực đáng thử!', '1633430317.jpg', 0, 22, 2, '2021-10-05 03:38:37', '2021-10-05 03:38:37'),
(25, 'Uốn con sâu', 499000, 30, 400000, 'Cool bao ngầu', 'Định nghĩa mới về biểu tượng thời trang tóc mạnh mẽ, nổi bật & cuốn hút. Là kiểu uốn hoàn toàn mới đang tạo trend khắp châu Á, khiến giới trẻ điên đảo về kiểu tóc chất chơi thời thượng với kĩ thuật uốn cũng vô cùng ngầu', '1633430386.jpg', 0, 22, 3, '2021-10-05 03:39:46', '2021-10-05 03:39:46'),
(26, 'Premlock', 899000, 30, 799000, 'Kiểu tóc nhà vô địch', 'Là kiểu uốn tóc làm mưa làm gió trên khắp thế giới, đậm vẻ mạnh mẽ nam tính Á Phi. Từ tiền vệ Paul Pogba nổi tiếng thế giới đến Văn Thanh U23 Việt Nam cũng phải lựa chọn kiểu đầu Premlock độc đáo, cá tính này', '1633430464.jpg', 0, 22, 4, '2021-10-05 03:41:04', '2021-10-05 03:41:04'),
(27, 'Hấp Dưỡng Tinh Chất Oliu', 119000, 20, 90000, 'Tóc bóng mượt chắc khỏe - hay được dùng cùng uốn', 'Giúp phục hồi tóc hư tổn, khô xơ, đem lại mái tóc bóng mượt, chắc khỏe bằng phương pháp hấp nhiệt bơ dầu oliu tự nhiên', '1633430593.jpg', 0, 24, 1, '2021-10-05 03:43:13', '2021-10-05 03:43:13'),
(28, 'Phục hồi Animo Matrix 6 bước', 159000, 30, 139000, 'Công nghệ Nano hiện đại nhất - tóc chắc khỏe, suôn mượt', 'Chuyên trị tóc khô cứng, tóc hư tổn sau uốn nhuộm bằng công nghệ phục hồi Nano hiện đại nhất thị trường kết hợp cùng mạng tinh thể Amino', '1633430739.jpg', 0, 24, 2, '2021-10-05 03:45:39', '0000-00-00 00:00:00'),
(29, 'Nhuộm đen phủ bạc', 180000, 45, 170000, 'Tóc đen bóng trẻ trung phong độ', 'Màu nhuộm Echosline nổi tiếng của Ý cùng các thành phần lành tính, giữ màu lâu sẽ giúp anh lấy lại phong độ ngay lập tức!', '1633430808.jpg', 0, 23, 1, '2021-10-05 03:46:48', '2021-10-05 03:46:48'),
(30, 'Nhuộm nâu công sở', 249000, 60, 229000, 'Các tông nâu phù hợp mọi hoàn cảnh', 'Tông nâu được mệnh danh là tông màu dễ chơi nhất! Có thể thoải mái đi học, đi làm, lại tôn da và phong cách', '1633430866.jpg', 0, 23, 2, '2021-10-05 03:47:46', '2021-10-05 03:47:46'),
(31, 'Nhuộm màu thời trang nổi bật', 289000, 60, 279000, 'Các tông sáng nổi bật', 'Nếu bạn theo đuổi phong cách Lady Killer hay Fashionisto thứ thiệt, bạn chắc chắn sẽ không thể cưỡng nổi hệ màu \"sáng\" nổi bật và thời thượng này!', '1633431016.jpg', 0, 23, 3, '2021-10-05 03:50:17', '2021-10-05 03:50:17'),
(32, 'Nhuộm tóc tẩy siêu nổi bật', 389000, 60, 369000, 'Tông màu sáng - nổi bật trong mọi cuộc chơi', 'Theo đuổi phong cách Châu Âu , làm nổi bật vẻ đẹp nam tính - sáng da , cool ngầu', '1633431155.jpg', 0, 23, 4, '2021-10-05 03:52:35', '2021-10-05 03:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `time_start`, `time_end`, `created_at`, `updated_at`) VALUES
(83, '08:30:00', '09:00:00', '2021-11-24 02:34:34', '2021-11-24 02:35:14'),
(84, '09:00:00', '09:30:00', '2021-11-24 02:35:38', '2021-11-24 02:35:38'),
(85, '09:30:00', '10:00:00', '2021-11-24 02:35:56', '2021-11-24 02:35:56'),
(86, '10:00:00', '10:30:00', '2021-11-24 02:36:15', '2021-11-24 02:36:15'),
(87, '10:30:00', '11:00:00', '2021-11-24 02:36:31', '2021-11-24 02:36:31'),
(88, '11:00:00', '11:30:00', '2021-11-24 02:36:47', '2021-11-24 02:36:47'),
(89, '11:30:00', '12:00:00', '2021-11-24 02:37:09', '2021-11-24 02:37:09'),
(90, '12:00:00', '12:30:00', '2021-11-24 02:37:28', '2021-11-24 02:37:28'),
(91, '12:30:00', '13:00:00', '2021-11-24 02:37:55', '2021-11-24 02:37:55'),
(92, '13:00:00', '13:30:00', '2021-11-24 02:38:07', '2021-11-24 02:38:07'),
(93, '13:30:00', '14:00:00', '2021-11-24 02:38:21', '2021-11-24 02:38:21'),
(94, '14:00:00', '14:30:00', '2021-11-24 02:38:30', '2021-11-24 02:38:30'),
(95, '14:30:00', '15:00:00', '2021-11-24 02:38:46', '2021-11-24 02:38:46'),
(96, '15:00:00', '15:30:00', '2021-11-24 02:38:58', '2021-11-24 02:38:58'),
(97, '15:30:00', '16:00:00', '2021-11-24 02:39:08', '2021-11-24 02:39:08'),
(98, '16:00:00', '16:30:00', '2021-11-24 02:39:17', '2021-11-24 02:39:17'),
(99, '16:30:00', '17:00:00', '2021-11-24 02:39:28', '2021-11-24 02:39:28'),
(100, '17:00:00', '17:30:00', '2021-11-24 02:39:37', '2021-11-24 02:39:37'),
(101, '17:30:00', '18:00:00', '2021-11-24 02:39:49', '2021-11-24 02:39:49'),
(102, '18:00:00', '18:30:00', '2021-11-24 02:40:00', '2021-11-24 02:40:00'),
(103, '18:30:00', '19:00:00', '2021-11-24 02:40:08', '2021-11-24 02:40:08'),
(104, '19:00:00', '19:30:00', '2021-11-24 02:40:15', '2021-11-24 02:40:15'),
(105, '19:30:00', '20:00:00', '2021-11-24 02:41:02', '2021-11-24 02:41:02'),
(106, '20:00:00', '20:30:00', '2021-11-24 02:41:54', '2021-11-24 02:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `number_phone` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `ratings` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `number_phone`, `pass`, `otp`, `image`, `ratings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tự Biên', '0988353523', '123201', 546529, '1633595565.jpg', 5, '2021-09-27 16:15:44', '2021-10-20 08:43:03'),
(3, 2, 'Trung Kiên', '0939317456', '569012', 583346, '1633595676.jpg', 5, '2021-09-28 05:09:37', '2021-10-20 08:43:09'),
(4, 1, 'Như Nguyên', '0345674475', '324323', 234523, '1633595689.jpg', 5, '2021-09-28 05:09:56', '2021-10-20 08:43:14'),
(5, 1, 'Bá Phi', '0981794925', '3442324', 243423, '1633595711.jpg', 5, '2021-09-28 05:10:16', '2021-10-20 08:43:20'),
(6, 1, 'Văn Thực', '0981335567', '232546', 124211, '1633595758.jpg', 5, '2021-10-04 09:45:31', '2021-10-20 08:43:26'),
(7, 1, 'Trường Giang', '0988394203', '124124', 355328, '1633595797.jpg', 5, '2021-10-04 09:47:53', '2021-10-20 08:43:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cate_services`
--
ALTER TABLE `cate_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chairs`
--
ALTER TABLE `chairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salons`
--
ALTER TABLE `salons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salon_chairs`
--
ALTER TABLE `salon_chairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salon_times`
--
ALTER TABLE `salon_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `booking_services`
--
ALTER TABLE `booking_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT for table `cate_services`
--
ALTER TABLE `cate_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `chairs`
--
ALTER TABLE `chairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salons`
--
ALTER TABLE `salons`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `salon_chairs`
--
ALTER TABLE `salon_chairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `salon_times`
--
ALTER TABLE `salon_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
