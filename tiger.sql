-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2024 at 06:12 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiger`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_directions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `client_id`, `region_id`, `lat`, `long`, `block`, `road`, `street`, `building_no`, `floor_no`, `apartment`, `type`, `additional_directions`, `city`, `default`, `created_at`, `updated_at`, `country_id`) VALUES
(11, 13, 321, NULL, NULL, '12', '12', NULL, '12', '12', '12', '12', NULL, NULL, 0, '2023-11-23 13:31:50', '2023-11-23 13:31:50', NULL),
(12, 15, 321, NULL, NULL, '6', 'vbn b', NULL, '7', '5', NULL, NULL, NULL, NULL, 0, '2023-12-11 11:53:42', '2023-12-11 11:53:42', NULL),
(13, 16, 295, NULL, NULL, 'hh', 'vbn b', NULL, '7', 'hjhj', NULL, 'uy', NULL, NULL, 0, '2023-12-11 13:36:15', '2023-12-11 13:36:15', NULL),
(14, 17, 372, NULL, NULL, '9', '5', NULL, '8', '9', NULL, '6', NULL, NULL, 0, '2023-12-11 14:29:53', '2023-12-11 14:29:53', NULL),
(15, 17, 295, '26.22170100683176', '50.58556788820532', 'yuh', 'yhj', NULL, 'uihh', 'hghj', 'uhhkj', NULL, 'ghghggjh', NULL, 0, NULL, NULL, NULL),
(17, 20, 476, NULL, NULL, '34', 'fd', NULL, 'da', 'sfs', '4fsd', 'dc', NULL, NULL, 0, '2024-01-01 10:11:00', '2024-01-01 10:11:00', NULL),
(19, 21, 296, NULL, NULL, '12', '12', NULL, '12', '12', '12', '12', NULL, NULL, 0, '2024-01-08 10:30:31', '2024-01-08 10:30:31', NULL),
(20, 22, 296, NULL, NULL, '12', '12', NULL, '12', '12', '12', '12', NULL, NULL, 0, '2024-01-08 10:32:42', '2024-01-08 10:32:42', NULL),
(21, 23, 296, NULL, NULL, '12', '12', NULL, '12', '12', '12', '12', NULL, NULL, 0, '2024-01-08 10:33:30', '2024-01-08 10:33:30', NULL),
(22, 24, 296, NULL, NULL, '12', '12', NULL, '12', '12', '12', '12', NULL, NULL, 0, '2024-01-08 10:33:35', '2024-01-08 10:33:35', NULL),
(23, 25, 296, NULL, NULL, '12', '12', NULL, '12', '12', '12', '12', NULL, NULL, 0, '2024-01-08 10:33:46', '2024-01-08 10:33:46', NULL),
(38, 34, 395, NULL, NULL, 'السابع', 'المراسي', NULL, '433', '32', '2', 'شقة', 'e', NULL, 0, '2024-03-05 13:59:50', '2024-03-05 13:59:50', NULL),
(45, 52, 384, NULL, NULL, 'Voluptas consequatur', 'jamihuw@mailinator.com', 'jemehadik@mailinator.com', NULL, NULL, 'pebow@mailinator.com', NULL, NULL, 'Placeat modi et per', 0, '2024-06-02 11:00:20', '2024-06-02 11:00:20', 2),
(46, 52, 295, NULL, NULL, 'In voluptas velit u', 'metemib@mailinator.com', 'qowad@mailinator.com', NULL, NULL, 'cyviduwo@mailinator.com', NULL, NULL, 'Voluptatibus iure au', 1, '2024-06-02 11:02:12', '2024-06-03 08:28:35', 1),
(47, 52, 296, NULL, NULL, 'Irure aliquip aute d', 'gesolejyj@mailinator.com', 'zoxavo@mailinator.com', NULL, NULL, 'zedylewoj@mailinator.com', NULL, NULL, 'Laboriosam numquam', 0, '2024-06-02 11:22:16', '2024-06-02 11:23:12', 1),
(48, 52, 386, NULL, NULL, 'Enim et culpa itaqu', 'Odio ipsum vel esse', 'The 1975 - Somebody Else - (Vevo Presents: London)', NULL, NULL, 'The 1975 - Somebody Else - (Vevo Presents: Live at The O2, London)', NULL, NULL, 'Alxandria', 0, '2024-06-02 11:23:12', '2024-06-03 08:27:13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('M','F') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `short_name`, `cpr`, `birthdate`, `gender`, `accent`, `image`, `bio`, `status`, `password`, `remember_token`, `language`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '123456', 'admin@admin.come', 'Admin', NULL, '1999-02-11', 'M', 'Arabic', NULL, NULL, 1, '$2y$10$i4FxPp1bLjRJsF9fonwGie0b2zi5TocinM30uXUiLGYPk3jzKoEqm', 'lIL9ymDBEkRyGa1eUKW2bVU131qYepAQI2eaO2qW1PUE9q1EODWRftT7roGt', 'en', '2023-09-14 08:03:32', '2024-05-20 13:34:06'),
(2, 'jassim', '39555152', 'KARAMHHADAD@HOTMAIL.COM', 'JH', NULL, NULL, NULL, NULL, NULL, NULL, 1, '$2y$10$TSjwIGnGYI20D6Ek7.O/O.e979/LrlDNV7KRGrEoRrhY0e3qUPfC.', NULL, NULL, '2023-12-23 14:00:09', '2023-12-23 14:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint UNSIGNED NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `file`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, '/uploads/Ads/1700308748_7259.webp', NULL, 1, '2023-06-21 13:21:03', '2023-11-18 11:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `country_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, '101', NULL, NULL),
(2, 1, '102', NULL, NULL),
(3, 1, '103', NULL, NULL),
(4, 1, '104', NULL, NULL),
(5, 1, '105', NULL, NULL),
(6, 1, '106', NULL, NULL),
(7, 1, '107', NULL, NULL),
(8, 1, '108', NULL, NULL),
(9, 1, '109', NULL, NULL),
(10, 1, '110', NULL, NULL),
(11, 1, '111', NULL, NULL),
(12, 1, '112', NULL, NULL),
(13, 1, '113', NULL, NULL),
(14, 1, '115', NULL, NULL),
(15, 1, '116', NULL, NULL),
(16, 1, '117', NULL, NULL),
(17, 1, '118', NULL, NULL),
(18, 1, '119', NULL, NULL),
(19, 1, '120', NULL, NULL),
(20, 1, '121', NULL, NULL),
(21, 1, '122', NULL, NULL),
(22, 1, '128', NULL, NULL),
(23, 1, '202', NULL, NULL),
(24, 1, '203', NULL, NULL),
(25, 1, '204', NULL, NULL),
(26, 1, '205', NULL, NULL),
(27, 1, '206', NULL, NULL),
(28, 1, '207', NULL, NULL),
(29, 1, '208', NULL, NULL),
(30, 1, '209', NULL, NULL),
(31, 1, '210', NULL, NULL),
(32, 1, '211', NULL, NULL),
(33, 1, '212', NULL, NULL),
(34, 1, '213', NULL, NULL),
(35, 1, '214', NULL, NULL),
(36, 1, '215', NULL, NULL),
(37, 1, '216', NULL, NULL),
(38, 1, '217', NULL, NULL),
(39, 1, '221', NULL, NULL),
(40, 1, '222', NULL, NULL),
(41, 1, '223', NULL, NULL),
(42, 1, '224', NULL, NULL),
(43, 1, '225', NULL, NULL),
(44, 1, '226', NULL, NULL),
(45, 1, '227', NULL, NULL),
(46, 1, '228', NULL, NULL),
(47, 1, '229', NULL, NULL),
(48, 1, '231', NULL, NULL),
(49, 1, '232', NULL, NULL),
(50, 1, '233', NULL, NULL),
(51, 1, '234', NULL, NULL),
(52, 1, '235', NULL, NULL),
(53, 1, '236', NULL, NULL),
(54, 1, '237', NULL, NULL),
(55, 1, '240', NULL, NULL),
(56, 1, '241', NULL, NULL),
(57, 1, '242', NULL, NULL),
(58, 1, '243', NULL, NULL),
(59, 1, '244', NULL, NULL),
(60, 1, '245', NULL, NULL),
(61, 1, '246', NULL, NULL),
(62, 1, '247', NULL, NULL),
(63, 1, '248', NULL, NULL),
(64, 1, '251', NULL, NULL),
(65, 1, '252', NULL, NULL),
(66, 1, '253', NULL, NULL),
(67, 1, '254', NULL, NULL),
(68, 1, '255', NULL, NULL),
(69, 1, '256', NULL, NULL),
(70, 1, '257', NULL, NULL),
(71, 1, '258', NULL, NULL),
(72, 1, '262', NULL, NULL),
(73, 1, '263', NULL, NULL),
(74, 1, '264', NULL, NULL),
(75, 1, '265', NULL, NULL),
(76, 1, '266', NULL, NULL),
(77, 1, '269', NULL, NULL),
(78, 1, '301', NULL, NULL),
(79, 1, '302', NULL, NULL),
(80, 1, '303', NULL, NULL),
(81, 1, '304', NULL, NULL),
(82, 1, '305', NULL, NULL),
(83, 1, '306', NULL, NULL),
(84, 1, '307', NULL, NULL),
(85, 1, '308', NULL, NULL),
(86, 1, '309', NULL, NULL),
(87, 1, '310', NULL, NULL),
(88, 1, '311', NULL, NULL),
(89, 1, '312', NULL, NULL),
(90, 1, '313', NULL, NULL),
(91, 1, '314', NULL, NULL),
(92, 1, '315', NULL, NULL),
(93, 1, '316', NULL, NULL),
(94, 1, '317', NULL, NULL),
(95, 1, '318', NULL, NULL),
(96, 1, '319', NULL, NULL),
(97, 1, '320', NULL, NULL),
(98, 1, '321', NULL, NULL),
(99, 1, '322', NULL, NULL),
(100, 1, '323', NULL, NULL),
(101, 1, '324', NULL, NULL),
(102, 1, '325', NULL, NULL),
(103, 1, '326', NULL, NULL),
(104, 1, '327', NULL, NULL),
(105, 1, '328', NULL, NULL),
(106, 1, '329', NULL, NULL),
(107, 1, '330', NULL, NULL),
(108, 1, '331', NULL, NULL),
(109, 1, '332', NULL, NULL),
(110, 1, '333', NULL, NULL),
(111, 1, '334', NULL, NULL),
(112, 1, '335', NULL, NULL),
(113, 1, '336', NULL, NULL),
(114, 1, '337', NULL, NULL),
(115, 1, '338', NULL, NULL),
(116, 1, '339', NULL, NULL),
(117, 1, '340', NULL, NULL),
(118, 1, '341', NULL, NULL),
(119, 1, '342', NULL, NULL),
(120, 1, '343', NULL, NULL),
(121, 1, '346', NULL, NULL),
(122, 1, '351', NULL, NULL),
(123, 1, '353', NULL, NULL),
(124, 1, '354', NULL, NULL),
(125, 1, '356', NULL, NULL),
(126, 1, '357', NULL, NULL),
(127, 1, '358', NULL, NULL),
(128, 1, '359', NULL, NULL),
(129, 1, '360', NULL, NULL),
(130, 1, '361', NULL, NULL),
(131, 1, '362', NULL, NULL),
(132, 1, '363', NULL, NULL),
(133, 1, '364', NULL, NULL),
(134, 1, '365', NULL, NULL),
(135, 1, '366', NULL, NULL),
(136, 1, '367', NULL, NULL),
(137, 1, '368', NULL, NULL),
(138, 1, '369', NULL, NULL),
(139, 1, '373', NULL, NULL),
(140, 1, '380', NULL, NULL),
(141, 1, '381', NULL, NULL),
(142, 1, '382', NULL, NULL),
(143, 1, '402', NULL, NULL),
(144, 1, '404', NULL, NULL),
(145, 1, '405', NULL, NULL),
(146, 1, '406', NULL, NULL),
(147, 1, '407', NULL, NULL),
(148, 1, '408', NULL, NULL),
(149, 1, '410', NULL, NULL),
(150, 1, '411', NULL, NULL),
(151, 1, '412', NULL, NULL),
(152, 1, '413', NULL, NULL),
(153, 1, '414', NULL, NULL),
(154, 1, '419', NULL, NULL),
(155, 1, '421', NULL, NULL),
(156, 1, '422', NULL, NULL),
(157, 1, '423', NULL, NULL),
(158, 1, '424', NULL, NULL),
(159, 1, '425', NULL, NULL),
(160, 1, '426', NULL, NULL),
(161, 1, '428', NULL, NULL),
(162, 1, '430', NULL, NULL),
(163, 1, '431', NULL, NULL),
(164, 1, '432', NULL, NULL),
(165, 1, '433', NULL, NULL),
(166, 1, '434', NULL, NULL),
(167, 1, '435', NULL, NULL),
(168, 1, '436', NULL, NULL),
(169, 1, '438', NULL, NULL),
(170, 1, '439', NULL, NULL),
(171, 1, '441', NULL, NULL),
(172, 1, '444', NULL, NULL),
(173, 1, '447', NULL, NULL),
(174, 1, '449', NULL, NULL),
(175, 1, '450', NULL, NULL),
(176, 1, '453', NULL, NULL),
(177, 1, '454', NULL, NULL),
(178, 1, '455', NULL, NULL),
(179, 1, '456', NULL, NULL),
(180, 1, '457', NULL, NULL),
(181, 1, '458', NULL, NULL),
(182, 1, '460', NULL, NULL),
(183, 1, '463', NULL, NULL),
(184, 1, '465', NULL, NULL),
(185, 1, '469', NULL, NULL),
(186, 1, '471', NULL, NULL),
(187, 1, '473', NULL, NULL),
(188, 1, '475', NULL, NULL),
(189, 1, '477', NULL, NULL),
(190, 1, '479', NULL, NULL),
(191, 1, '481', NULL, NULL),
(192, 1, '502', NULL, NULL),
(193, 1, '504', NULL, NULL),
(194, 1, '505', NULL, NULL),
(195, 1, '506', NULL, NULL),
(196, 1, '507', NULL, NULL),
(197, 1, '508', NULL, NULL),
(198, 1, '509', NULL, NULL),
(199, 1, '513', NULL, NULL),
(200, 1, '514', NULL, NULL),
(201, 1, '515', NULL, NULL),
(202, 1, '517', NULL, NULL),
(203, 1, '518', NULL, NULL),
(204, 1, '520', NULL, NULL),
(205, 1, '521', NULL, NULL),
(206, 1, '522', NULL, NULL),
(207, 1, '523', NULL, NULL),
(208, 1, '524', NULL, NULL),
(209, 1, '525', NULL, NULL),
(210, 1, '526', NULL, NULL),
(211, 1, '527', NULL, NULL),
(212, 1, '528', NULL, NULL),
(213, 1, '529', NULL, NULL),
(214, 1, '530', NULL, NULL),
(215, 1, '531', NULL, NULL),
(216, 1, '533', NULL, NULL),
(217, 1, '536', NULL, NULL),
(218, 1, '537', NULL, NULL),
(219, 1, '538', NULL, NULL),
(220, 1, '539', NULL, NULL),
(221, 1, '540', NULL, NULL),
(222, 1, '541', NULL, NULL),
(223, 1, '542', NULL, NULL),
(224, 1, '543', NULL, NULL),
(225, 1, '544', NULL, NULL),
(226, 1, '545', NULL, NULL),
(227, 1, '547', NULL, NULL),
(228, 1, '549', NULL, NULL),
(229, 1, '550', NULL, NULL),
(230, 1, '551', NULL, NULL),
(231, 1, '552', NULL, NULL),
(232, 1, '553', NULL, NULL),
(233, 1, '555', NULL, NULL),
(234, 1, '557', NULL, NULL),
(235, 1, '559', NULL, NULL),
(236, 1, '561', NULL, NULL),
(237, 1, '565', NULL, NULL),
(238, 1, '569', NULL, NULL),
(239, 1, '571', NULL, NULL),
(240, 1, '575', NULL, NULL),
(241, 1, '577', NULL, NULL),
(242, 1, '579', NULL, NULL),
(243, 1, '580', NULL, NULL),
(244, 1, '581', NULL, NULL),
(245, 1, '583', NULL, NULL),
(246, 1, '585', NULL, NULL),
(247, 1, '589', NULL, NULL),
(248, 1, '601', NULL, NULL),
(249, 1, '602', NULL, NULL),
(250, 1, '603', NULL, NULL),
(251, 1, '604', NULL, NULL),
(252, 1, '605', NULL, NULL),
(253, 1, '606', NULL, NULL),
(254, 1, '607', NULL, NULL),
(255, 1, '608', NULL, NULL),
(256, 1, '609', NULL, NULL),
(257, 1, '611', NULL, NULL),
(258, 1, '615', NULL, NULL),
(259, 1, '616', NULL, NULL),
(260, 1, '623', NULL, NULL),
(261, 1, '624', NULL, NULL),
(262, 1, '625', NULL, NULL),
(263, 1, '626', NULL, NULL),
(264, 1, '633', NULL, NULL),
(265, 1, '634', NULL, NULL),
(266, 1, '635', NULL, NULL),
(267, 1, '636', NULL, NULL),
(268, 1, '643', NULL, NULL),
(269, 1, '644', NULL, NULL),
(270, 1, '645', NULL, NULL),
(271, 1, '646', NULL, NULL),
(272, 1, '701', NULL, NULL),
(273, 1, '702', NULL, NULL),
(274, 1, '704', NULL, NULL),
(275, 1, '705', NULL, NULL),
(276, 1, '706', NULL, NULL),
(277, 1, '707', NULL, NULL),
(278, 1, '708', NULL, NULL),
(279, 1, '709', NULL, NULL),
(280, 1, '711', NULL, NULL),
(281, 1, '712', NULL, NULL),
(282, 1, '713', NULL, NULL),
(283, 1, '714', NULL, NULL),
(284, 1, '715', NULL, NULL),
(285, 1, '716', NULL, NULL),
(286, 1, '718', NULL, NULL),
(287, 1, '720', NULL, NULL),
(288, 1, '721', NULL, NULL),
(289, 1, '729', NULL, NULL),
(290, 1, '730', NULL, NULL),
(291, 1, '732', NULL, NULL),
(292, 1, '733', NULL, NULL),
(293, 1, '734', NULL, NULL),
(294, 1, '736', NULL, NULL),
(295, 1, '738', NULL, NULL),
(296, 1, '740', NULL, NULL),
(297, 1, '742', NULL, NULL),
(298, 1, '743', NULL, NULL),
(299, 1, '745', NULL, NULL),
(300, 1, '746', NULL, NULL),
(301, 1, '748', NULL, NULL),
(302, 1, '752', NULL, NULL),
(303, 1, '754', NULL, NULL),
(304, 1, '756', NULL, NULL),
(305, 1, '758', NULL, NULL),
(306, 1, '760', NULL, NULL),
(307, 1, '762', NULL, NULL),
(308, 1, '801', NULL, NULL),
(309, 1, '802', NULL, NULL),
(310, 1, '803', NULL, NULL),
(311, 1, '804', NULL, NULL),
(312, 1, '805', NULL, NULL),
(313, 1, '806', NULL, NULL),
(314, 1, '807', NULL, NULL),
(315, 1, '808', NULL, NULL),
(316, 1, '809', NULL, NULL),
(317, 1, '810', NULL, NULL),
(318, 1, '812', NULL, NULL),
(319, 1, '813', NULL, NULL),
(320, 1, '814', NULL, NULL),
(321, 1, '815', NULL, NULL),
(322, 1, '816', NULL, NULL),
(323, 1, '840', NULL, NULL),
(324, 1, '841', NULL, NULL),
(325, 1, '901', NULL, NULL),
(326, 1, '902', NULL, NULL),
(327, 1, '903', NULL, NULL),
(328, 1, '904', NULL, NULL),
(329, 1, '905', NULL, NULL),
(330, 1, '906', NULL, NULL),
(331, 1, '907', NULL, NULL),
(332, 1, '908', NULL, NULL),
(333, 1, '909', NULL, NULL),
(334, 1, '910', NULL, NULL),
(335, 1, '911', NULL, NULL),
(336, 1, '912', NULL, NULL),
(337, 1, '913', NULL, NULL),
(338, 1, '914', NULL, NULL),
(339, 1, '915', NULL, NULL),
(340, 1, '916', NULL, NULL),
(341, 1, '917', NULL, NULL),
(342, 1, '918', NULL, NULL),
(343, 1, '919', NULL, NULL),
(344, 1, '920', NULL, NULL),
(345, 1, '921', NULL, NULL),
(346, 1, '922', NULL, NULL),
(347, 1, '923', NULL, NULL),
(348, 1, '924', NULL, NULL),
(349, 1, '925', NULL, NULL),
(350, 1, '926', NULL, NULL),
(351, 1, '927', NULL, NULL),
(352, 1, '928', NULL, NULL),
(353, 1, '929', NULL, NULL),
(354, 1, '930', NULL, NULL),
(355, 1, '931', NULL, NULL),
(356, 1, '932', NULL, NULL),
(357, 1, '933', NULL, NULL),
(358, 1, '934', NULL, NULL),
(359, 1, '935', NULL, NULL),
(360, 1, '937', NULL, NULL),
(361, 1, '939', NULL, NULL),
(362, 1, '941', NULL, NULL),
(363, 1, '942', NULL, NULL),
(364, 1, '943', NULL, NULL),
(365, 1, '944', NULL, NULL),
(366, 1, '945', NULL, NULL),
(367, 1, '946', NULL, NULL),
(368, 1, '947', NULL, NULL),
(369, 1, '949', NULL, NULL),
(370, 1, '950', NULL, NULL),
(371, 1, '951', NULL, NULL),
(372, 1, '952', NULL, NULL),
(373, 1, '954', NULL, NULL),
(374, 1, '955', NULL, NULL),
(375, 1, '957', NULL, NULL),
(376, 1, '958', NULL, NULL),
(377, 1, '959', NULL, NULL),
(378, 1, '960', NULL, NULL),
(379, 1, '961', NULL, NULL),
(380, 1, '964', NULL, NULL),
(381, 1, '965', NULL, NULL),
(382, 1, '966', NULL, NULL),
(383, 1, '967', NULL, NULL),
(384, 1, '971', NULL, NULL),
(385, 1, '973', NULL, NULL),
(386, 1, '976', NULL, NULL),
(387, 1, '982', NULL, NULL),
(388, 1, '983', NULL, NULL),
(389, 1, '986', NULL, NULL),
(390, 1, '987', NULL, NULL),
(391, 1, '988', NULL, NULL),
(392, 1, '995', NULL, NULL),
(393, 1, '997', NULL, NULL),
(394, 1, '998', NULL, NULL),
(395, 1, '999', NULL, NULL),
(396, 1, '1001', NULL, NULL),
(397, 1, '1002', NULL, NULL),
(398, 1, '1003', NULL, NULL),
(399, 1, '1004', NULL, NULL),
(400, 1, '1006', NULL, NULL),
(401, 1, '1009', NULL, NULL),
(402, 1, '1010', NULL, NULL),
(403, 1, '1012', NULL, NULL),
(404, 1, '1014', NULL, NULL),
(405, 1, '1016', NULL, NULL),
(406, 1, '1017', NULL, NULL),
(407, 1, '1018', NULL, NULL),
(408, 1, '1019', NULL, NULL),
(409, 1, '1020', NULL, NULL),
(410, 1, '1022', NULL, NULL),
(411, 1, '1025', NULL, NULL),
(412, 1, '1026', NULL, NULL),
(413, 1, '1027', NULL, NULL),
(414, 1, '1028', NULL, NULL),
(415, 1, '1032', NULL, NULL),
(416, 1, '1033', NULL, NULL),
(417, 1, '1034', NULL, NULL),
(418, 1, '1037', NULL, NULL),
(419, 1, '1038', NULL, NULL),
(420, 1, '1041', NULL, NULL),
(421, 1, '1042', NULL, NULL),
(422, 1, '1044', NULL, NULL),
(423, 1, '1046', NULL, NULL),
(424, 1, '1048', NULL, NULL),
(425, 1, '1051', NULL, NULL),
(426, 1, '1052', NULL, NULL),
(427, 1, '1054', NULL, NULL),
(428, 1, '1055', NULL, NULL),
(429, 1, '1056', NULL, NULL),
(430, 1, '1057', NULL, NULL),
(431, 1, '1058', NULL, NULL),
(432, 1, '1061', NULL, NULL),
(433, 1, '1062', NULL, NULL),
(434, 1, '1063', NULL, NULL),
(435, 1, '1064', NULL, NULL),
(436, 1, '1067', NULL, NULL),
(437, 1, '1068', NULL, NULL),
(438, 1, '1070', NULL, NULL),
(439, 1, '1073', NULL, NULL),
(440, 1, '1089', NULL, NULL),
(441, 1, '1095', NULL, NULL),
(442, 1, '1099', NULL, NULL),
(443, 1, '1203', NULL, NULL),
(444, 1, '1204', NULL, NULL),
(445, 1, '1205', NULL, NULL),
(446, 1, '1206', NULL, NULL),
(447, 1, '1207', NULL, NULL),
(448, 1, '1208', NULL, NULL),
(449, 1, '1209', NULL, NULL),
(450, 1, '1210', NULL, NULL),
(451, 1, '1211', NULL, NULL),
(452, 1, '1212', NULL, NULL),
(453, 1, '1213', NULL, NULL),
(454, 1, '1214', NULL, NULL),
(455, 1, '1215', NULL, NULL),
(456, 1, '1216', NULL, NULL),
(457, 1, '1218', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `delivery` tinyint(1) NOT NULL DEFAULT '1',
  `pickup` tinyint(1) NOT NULL DEFAULT '1',
  `dinein` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `country_id`, `title_ar`, `title_en`, `phone`, `whatsapp`, `email`, `address_ar`, `address_en`, `delivery`, `pickup`, `dinein`, `status`, `lat`, `long`, `image`, `created_at`, `updated_at`) VALUES
(3, 1, 'فرع 1', 'Branch 1', '97333405497', '97333405497', 'info@emcan-group.com', 'البحرين - المنامة', 'Bahrain - Manama', 1, 1, 1, 1, '26.0897916', '50.57944579999999', '/uploads/Branches/1712440553_9824.webp', '2023-06-21 10:45:42', '2024-04-06 21:55:53'),
(4, 2, 'فرع 2', 'Branch 2', '+201132644632', '201132644632', 'branch2@gmail.com', 'السعودية - تبوك', 'Saudi arabia - Tabuk', 1, 1, 1, 1, '28.3289436', '36.5778686', '/uploads/Branches/1712440589_4737.webp', '2024-04-06 16:16:15', '2024-04-06 21:56:29'),
(8, 2, 'فرع 3', 'branch 3', '01553048031', '966501042822', 'rogahn.dax@example.org', 'مصر الاسكندريه', 'Egypt', 1, 1, 1, 1, '31.084849', '29.8554841', NULL, '2024-05-05 10:34:28', '2024-05-05 10:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `branch_category`
--

CREATE TABLE `branch_category` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch_product`
--

CREATE TABLE `branch_product` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch_region`
--

CREATE TABLE `branch_region` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_region`
--

INSERT INTO `branch_region` (`id`, `branch_id`, `region_id`, `created_at`, `updated_at`) VALUES
(202, 3, 295, NULL, NULL),
(203, 3, 296, NULL, NULL),
(204, 3, 297, NULL, NULL),
(205, 3, 298, NULL, NULL),
(206, 3, 299, NULL, NULL),
(207, 3, 300, NULL, NULL),
(208, 3, 301, NULL, NULL),
(209, 3, 302, NULL, NULL),
(210, 3, 303, NULL, NULL),
(211, 3, 304, NULL, NULL),
(212, 3, 305, NULL, NULL),
(213, 3, 306, NULL, NULL),
(214, 3, 307, NULL, NULL),
(215, 3, 308, NULL, NULL),
(216, 3, 309, NULL, NULL),
(217, 3, 310, NULL, NULL),
(218, 3, 311, NULL, NULL),
(219, 3, 312, NULL, NULL),
(220, 3, 313, NULL, NULL),
(221, 3, 314, NULL, NULL),
(222, 3, 315, NULL, NULL),
(223, 3, 316, NULL, NULL),
(224, 3, 317, NULL, NULL),
(225, 3, 318, NULL, NULL),
(226, 3, 319, NULL, NULL),
(227, 3, 320, NULL, NULL),
(228, 3, 321, NULL, NULL),
(229, 3, 322, NULL, NULL),
(230, 3, 323, NULL, NULL),
(231, 3, 324, NULL, NULL),
(232, 3, 325, NULL, NULL),
(233, 3, 326, NULL, NULL),
(234, 3, 327, NULL, NULL),
(235, 3, 328, NULL, NULL),
(236, 3, 329, NULL, NULL),
(237, 3, 330, NULL, NULL),
(238, 3, 331, NULL, NULL),
(239, 3, 332, NULL, NULL),
(240, 3, 333, NULL, NULL),
(241, 3, 334, NULL, NULL),
(242, 3, 335, NULL, NULL),
(243, 3, 336, NULL, NULL),
(244, 3, 337, NULL, NULL),
(245, 3, 338, NULL, NULL),
(246, 3, 339, NULL, NULL),
(247, 3, 340, NULL, NULL),
(248, 3, 341, NULL, NULL),
(249, 3, 342, NULL, NULL),
(250, 3, 343, NULL, NULL),
(251, 3, 344, NULL, NULL),
(252, 3, 345, NULL, NULL),
(253, 3, 346, NULL, NULL),
(254, 3, 347, NULL, NULL),
(255, 3, 348, NULL, NULL),
(256, 3, 349, NULL, NULL),
(257, 3, 350, NULL, NULL),
(258, 3, 351, NULL, NULL),
(259, 3, 352, NULL, NULL),
(260, 3, 353, NULL, NULL),
(261, 3, 354, NULL, NULL),
(262, 3, 355, NULL, NULL),
(263, 3, 356, NULL, NULL),
(264, 3, 357, NULL, NULL),
(265, 3, 358, NULL, NULL),
(266, 3, 359, NULL, NULL),
(267, 3, 360, NULL, NULL),
(268, 3, 361, NULL, NULL),
(269, 3, 362, NULL, NULL),
(270, 3, 363, NULL, NULL),
(271, 3, 364, NULL, NULL),
(272, 3, 365, NULL, NULL),
(273, 3, 366, NULL, NULL),
(274, 3, 367, NULL, NULL),
(275, 3, 368, NULL, NULL),
(276, 3, 369, NULL, NULL),
(277, 3, 370, NULL, NULL),
(278, 3, 371, NULL, NULL),
(279, 3, 372, NULL, NULL),
(280, 3, 373, NULL, NULL),
(281, 3, 374, NULL, NULL),
(282, 3, 375, NULL, NULL),
(283, 3, 376, NULL, NULL),
(284, 3, 377, NULL, NULL),
(285, 3, 378, NULL, NULL),
(286, 3, 379, NULL, NULL),
(287, 3, 380, NULL, NULL),
(288, 3, 381, NULL, NULL),
(289, 3, 382, NULL, NULL),
(290, 3, 383, NULL, NULL),
(291, 3, 467, NULL, NULL),
(292, 3, 468, NULL, NULL),
(293, 3, 469, NULL, NULL),
(294, 3, 470, NULL, NULL),
(295, 3, 471, NULL, NULL),
(296, 3, 472, NULL, NULL),
(297, 3, 473, NULL, NULL),
(298, 4, 384, NULL, NULL),
(299, 4, 385, NULL, NULL),
(300, 4, 386, NULL, NULL),
(303, 8, 385, NULL, NULL),
(304, 8, 387, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` int DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `item_id` bigint UNSIGNED DEFAULT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `size_id` bigint UNSIGNED DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` smallint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrangement` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `appearInHomepage` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title_ar`, `title_en`, `arrangement`, `status`, `appearInHomepage`, `image`, `created_at`, `updated_at`) VALUES
(70, 66, 'موتيفيرا', 'Motifira', 70, 1, 0, '/uploads/Categories/1708535169_5640.webp', '2024-02-21 17:06:08', '2024-05-04 16:16:26'),
(71, 66, 'ل.ج.ر', 'L.G.R', 71, 1, 0, '/uploads/Categories/1708597923_6167.webp', '2024-02-21 17:06:08', '2024-05-04 16:16:26'),
(89, 68, 'القديم1', 'CLASSIC1', 67, 1, 0, '/uploads/Categories/1708598398_6381.webp', '2024-02-21 13:08:36', '2024-05-04 16:16:26'),
(90, 68, 'القديم2', 'CLASSIC2', 67, 1, 0, '/uploads/Categories/1708598398_6381.webp', '2024-02-21 13:08:36', '2024-05-04 16:16:26'),
(95, 94, 'رياضيه', 'sports', 95, 1, 0, NULL, '2024-05-04 14:29:37', '2024-05-04 16:16:26'),
(96, NULL, 'حريمى', 'woman', 96, 1, 0, NULL, '2024-05-04 16:08:42', '2024-05-04 16:16:26'),
(97, NULL, 'رجالى', 'man', 97, 1, 0, NULL, '2024-05-04 16:09:49', '2024-05-04 16:16:26'),
(98, 96, 'رسمى', 'Formal', 98, 1, 0, NULL, '2024-05-04 16:56:30', '2024-05-04 16:56:30'),
(99, 97, 'رياضى', 'Sports', 99, 1, 0, NULL, '2024-05-04 17:05:50', '2024-05-04 17:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '+973',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `verify_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `otp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_confirmation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `country_code`, `phone`, `phone_code`, `image`, `status`, `verify_code`, `password`, `email_verified_at`, `country_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `first_name`, `last_name`, `language`, `otp`, `password_confirmation`) VALUES
(12, 'Mostafa Mohamed', 'mostafazarea69@gmail.com', '', '33467117', '973', NULL, 1, NULL, '$2y$10$Q5y.o2s98fWU8s628niZ/u6MolZ6KMmw88kaz7I.uSpk5MSjZGrTm', NULL, 1, NULL, NULL, '2023-11-23 13:27:07', '2023-12-13 08:36:20', 'Mostafa ', 'Mohamed', NULL, NULL, NULL),
(13, 'Mostafa Mohamed', 'mostafazarea69@gmail.com', '', '33467117', '973', NULL, 1, NULL, '$2y$10$Q5y.o2s98fWU8s628niZ/u6MolZ6KMmw88kaz7I.uSpk5MSjZGrTm', NULL, 1, NULL, NULL, '2023-11-23 13:31:50', '2023-12-13 08:36:20', NULL, NULL, NULL, NULL, NULL),
(14, 'Amira', 'test@admin.com', '', '557223386', '+973', NULL, 1, NULL, '$2y$10$.pXiqOHSKLPqwP/vnEemCeq6IBQVNBgCxOD/UejE2HrnZJDCCsqoe', NULL, 1, NULL, NULL, '2023-12-10 14:47:42', '2023-12-10 15:28:19', NULL, NULL, NULL, NULL, NULL),
(15, 'Dina', NULL, '', NULL, '+973', NULL, 1, NULL, '$2y$10$b8TU9KbfveUViCT5oe2P/eUCq4dyepmy1CjwK/xGNFkyAI0sN45EW', NULL, 1, NULL, '2024-05-12 12:07:46', '2023-12-11 11:53:42', '2024-05-12 12:07:46', NULL, NULL, NULL, NULL, NULL),
(16, NULL, NULL, '', NULL, '+973', NULL, 1, NULL, '$2y$10$7RRe7hg2jOQvVzIrdAOVLuJNQ.eRuN0SUGnxSJr6q6pn1VrKIVpNi', NULL, 1, NULL, NULL, '2023-12-11 13:36:15', '2023-12-11 13:36:15', NULL, NULL, NULL, NULL, NULL),
(17, 'koky', 'koky@admin.com', '', '1270563716', '+973', NULL, 1, NULL, '$2y$10$tMfRaTgH5.0n48exNOUr2OvQG9KO6Sngzh3HZR6J3wIACno86cca2', NULL, 1, NULL, NULL, '2023-12-11 13:45:19', '2024-01-15 17:07:21', NULL, NULL, NULL, NULL, NULL),
(18, 'Mostafa Mohamed', 'mostafazarea69@gmail.com', '', '33467117', '+973', NULL, 1, NULL, '$2y$10$Ig3/JePKe/SwV/DvN./yyOv/v4XL8iG.L7NswWyQlFbcCi/S0HY.e', NULL, 1, NULL, NULL, '2023-12-20 10:31:20', '2023-12-20 10:31:20', NULL, NULL, NULL, NULL, NULL),
(19, '444', '444@gmail.com', '', '444444444', '+973', NULL, 1, NULL, '$2y$10$vNZVt8aYlkLKoscDqxuXQ.E4h.GhlVVbYCLmvBUjLQDvdVEE8CLkS', NULL, 1, NULL, NULL, '2023-12-20 10:31:53', '2023-12-20 10:31:53', NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, '', NULL, '+973', NULL, 1, NULL, '$2y$10$zBx9aZPaVEZKu3sQZJN8Su4/icTaPCWIC5o1CBU4XH0ebyIxsWw4O', NULL, 1, NULL, NULL, '2024-01-01 10:11:00', '2024-01-01 10:11:00', NULL, NULL, NULL, NULL, NULL),
(21, 'Mostafa Mohamed', 'mostafazarea69@gmail.com', '', '33467117', '+973', NULL, 1, NULL, '$2y$10$XBITaD03bYK0vxFCy1sLLO5MsHc8ojcof8LmTt1/cKLq9vI8NrGH2', NULL, 1, NULL, NULL, '2024-01-08 10:30:31', '2024-01-08 10:30:31', NULL, NULL, NULL, NULL, NULL),
(22, 'Mostafa Mohamed', 'mostafazarea69@gmail.com', '', '33467117', '+973', NULL, 1, NULL, '$2y$10$xnLv8/IGxZf2pWsBuhSq6O7/pREMnBUJdZ3/YYBEcejfkW6AbgDsO', NULL, 1, NULL, NULL, '2024-01-08 10:32:42', '2024-01-08 10:32:42', NULL, NULL, NULL, NULL, NULL),
(23, 'Mostafa Mohamed', 'mostafazarea69@gmail.com', '', '33467117', '+973', NULL, 1, NULL, '$2y$10$ILOB0ahhtiNsb.iD4vMxBulTtlVlXoY9ejqpanWcsGcHEmK30jMsu', NULL, 1, NULL, NULL, '2024-01-08 10:33:30', '2024-01-08 10:33:30', NULL, NULL, NULL, NULL, NULL),
(24, 'Mostafa Mohamed', 'mostafazarea69@gmail.com', '', '33467117', '+973', NULL, 1, NULL, '$2y$10$KP65x.vt0nZqd6aG2SkoCe9xF0JIURHi3/3Il3BwkmhRc3FRjvunm', NULL, 1, NULL, NULL, '2024-01-08 10:33:35', '2024-01-08 10:33:35', NULL, NULL, NULL, NULL, NULL),
(25, 'Mostafa Mohamed', 'mostafazarea69@gmail.com', '', NULL, '+973', NULL, 1, NULL, '$2y$10$AHnaxmQEodJZXmMsNNagkOaAhMZ5PeXZbsnJi24fHJ5nB7LVg/U6a', NULL, 1, NULL, NULL, '2024-01-08 10:33:46', '2024-01-08 10:33:46', NULL, NULL, NULL, NULL, NULL),
(34, 'ali salim', 'ali@gmail.com', 'EG', '1551831192', '+973', NULL, 1, '362532', '$2y$10$k9OmSKms4BjduLv/.p6bDu59txDf.Z8A1Qk37oSWV1tMbA6.kJFSW', NULL, 7, '3RfyjyGonIP7NDoSZPidhT4eYDlyjJhUl2SHlFrxiIyJqtxbsLZbdbqd4W8O', NULL, '2024-02-29 09:06:24', '2024-03-05 11:47:47', NULL, NULL, NULL, NULL, NULL),
(35, 'admin', 'admin@gmail.com', 'EG', '1551831193', '+973', NULL, 1, '362532', '$2y$10$75/czVlAAa6JziTQgM75auv2CSM4vCQGTvMn0ac6dkPS0f/lsuddK', NULL, 7, NULL, '2024-03-05 12:25:47', '2024-02-29 09:06:24', '2024-03-05 12:25:47', NULL, NULL, NULL, NULL, NULL),
(45, 'ali', 'megypt124@gmail.com', NULL, NULL, '+973', NULL, 1, NULL, '$2y$10$y8mVBCekHhshUy0/ZDuxB.bLqx7FbCTDN1vrkK.Z9450T1MWm0YlK', NULL, 2, NULL, NULL, '2024-03-18 14:15:24', '2024-03-18 14:15:24', NULL, NULL, NULL, NULL, NULL),
(46, NULL, 'sewunino@mailinator.com', NULL, NULL, '+973', NULL, 1, NULL, '$2y$10$N8l9SkNUTlcohN9ESZZQEubSBia3woHL6AO7EV3HZchfcU8fmOV2i', NULL, 1, 'VmRHBVtcUMYzd6bQr2bcNHDNDYE75dpC4LZbskUCDjMthFoAZ2jTRMcvacWG', NULL, '2024-05-04 16:05:40', '2024-05-04 16:05:40', NULL, NULL, NULL, NULL, NULL),
(52, NULL, 'dina.ahmed41800@gmail.com', 'EG', '1553048031', '20', NULL, 1, NULL, '$2y$10$i1y4evf6hk4EdZmvsj1x8OUjzaL2YHbFD.e2I00UpMR/qYtvDr3kG', NULL, NULL, NULL, NULL, '2024-05-19 09:24:46', '2024-06-12 06:17:24', 'Dina', 'Ahmed', 'en', '851793', '$2y$10$0FzGp1IUmwXhBp//I3/Pde1lkz3CPf09HZ/00oJ6FtarKPzB/1WKS');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hexa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `title_ar`, `title_en`, `hexa`, `status`, `created_at`, `updated_at`) VALUES
(1, 'الحجر الرملي', 'Sandstone', '#b29082', 1, '2023-06-13 08:47:18', '2023-11-11 10:42:46'),
(2, 'رمادي', 'Gray', '#b0b0b0', 1, '2023-06-13 08:47:35', '2023-06-13 08:47:35'),
(3, 'اسود', 'Black', '#000000', 1, '2023-11-11 09:58:52', '2023-11-11 09:58:52'),
(4, 'احمر', 'Red', '#f20000', 1, '2024-05-04 17:19:35', '2024-05-04 17:19:35'),
(5, 'ازرق', 'Blue', '#172b85', 1, '2024-05-04 17:20:07', '2024-05-04 17:21:01'),
(6, 'اصفر', 'Yellow', '#ffdd7c', 1, '2024-05-08 11:28:01', '2024-05-08 11:28:39'),
(7, 'ابيض', 'white', '#ffffff', 1, '2024-05-27 23:56:19', '2024-05-27 23:59:46'),
(8, 'وردى', 'Pink', '#efc3c5', 1, '2024-05-27 23:57:28', '2024-05-27 23:57:28'),
(9, 'اخضر', 'green', '#00a63f', 1, '2024-05-27 23:59:18', '2024-05-27 23:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currancy_code_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currancy_code_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currancy_value` decimal(5,3) NOT NULL DEFAULT '0.000',
  `phone_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` int NOT NULL DEFAULT '10',
  `decimals` int NOT NULL DEFAULT '3',
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title_ar`, `title_en`, `currancy_code_ar`, `currancy_code_en`, `currancy_value`, `phone_code`, `country_code`, `length`, `decimals`, `lat`, `long`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'البحرين', 'Bahrain', 'د.ب', 'BD', '0.100', '+973', 'BH', 8, 3, '25.93041400', '50.63777200', 1, '/countries/Bahrain.png', '2022-10-09 07:52:15', '2024-05-28 07:45:24'),
(2, 'المملكة العربية السعودية', 'Saudi Arabia', 'ر.س', 'SR', '1.000', '+966', 'SA', 9, 2, '23.88594200', '45.07916200', 1, '/countries/SaudiArabia.png', '2022-10-09 07:52:15', '2023-09-14 07:24:01'),
(3, 'سلطنة عمان', 'Oman', 'ر.ع', 'OR', '0.102', '+968', 'OM', 8, 3, '21.51258300', '55.92325500', 0, '/countries/Oman.png', '2022-10-09 07:52:15', '2023-12-12 10:09:56'),
(4, 'الإمارات العربية المتحدة', 'United Arab Emirates', 'د.إ', 'AED', '1.000', '+971', 'AE', 9, 3, '23.42407600', '53.84781800', 0, '/countries/UnitedArabEmirates.png', '2022-10-09 07:52:15', '2023-09-14 07:26:13'),
(5, 'قطر', 'Qatar', 'ر.ق', 'QR', '1.000', '+974', 'QA', 8, 3, '25.35482600', '51.18388400', 0, '/countries/Qatar.png', '2022-10-09 07:52:15', '2023-09-14 07:26:37'),
(6, 'الكويت', 'Kuwait', 'د.ك', 'KWD', '0.081', '+965', 'KW', 8, 3, '29.31166000', '47.48176600', 0, '/countries/Kuwait.png', '2022-10-09 07:52:15', '2023-09-14 07:26:52'),
(7, 'مصر', 'Egypt', 'ج.م', 'E£', '6.141', '+20', 'EG', 10, 3, '26.82055300', '30.80249800', 1, '/countries/Egypt.png', '2022-10-09 07:52:15', '2023-12-12 10:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('discount','percent_off') COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `percent_off` int DEFAULT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `discount`, `percent_off`, `from`, `to`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Dina%Can', 'discount', '5.00', NULL, '2024-06-04', '2024-06-30', 1, '2024-06-05 13:38:12', '2024-06-05 13:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `title_ar`, `title_en`, `status`, `created_at`, `updated_at`) VALUES
(1, 'توصيل إلى المنزل', 'Delivery', 1, '2023-06-21 10:22:30', '2023-06-21 10:22:30'),
(2, 'إستلام من  المحل', 'Pick Up', 1, '2023-06-21 10:22:37', '2023-06-21 10:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint UNSIGNED NOT NULL,
  `question_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `answer_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question_ar`, `question_en`, `answer_ar`, `answer_en`, `status`, `created_at`, `updated_at`) VALUES
(1, 'هل يمكنني الشحن إلى عناوين متعددة؟', 'Can I ship to multiple addresses?', 'يمكن للمجموعة الخاصة الشحن إلى موقع واحد فقط لكل طلب. إذا كنت ترغب في الإرسال إلى عناوين متعددة، فيرجى تقديم طلب منفصل لكل عنوان.', 'Private Collection can only ship to one location per order. If you wish to send to multiple addresses, please place separate order for each addresses.', 1, '2023-10-09 14:55:40', '2024-03-14 14:38:22'),
(3, 'التيستنج جيد?', 'testing is good?', 'نعم', 'yes', 1, '2023-12-12 08:34:19', '2023-12-12 08:34:19'),
(4, 'هل أحتاج إلى حساب لتقديم الطلب؟', 'Do I need an account to place an order?', ':يمكنك إكمال طلبك بدون حساب. ومع ذلك، فإن إنشاء حساب يسمح لك بما يلي\r\n\r\nقم بتخزين معلومات الفواتير والشحن للحصول على تجربة دفع أسرع\r\nقم بمراجعة تفاصيل طلبك وتاريخه\r\nطلب الاستبدال أو الإرجاع مباشرة من حسابك', 'You may complete your order without an account. However, creating an account allows you to:\n\nStore billing and shipping information for a faster checkout experience\nReview your order details and history\nRequest exchange or return directly from your account', 1, '2024-03-14 14:28:19', '2024-03-14 14:28:19'),
(5, 'هل يمكنني تعديل أو إلغاء عنصر من طلبي؟', 'Can I amend or cancel an item from my order?', 'اعتمادا على حالة طلبك، يمكنك تعديل أو إلغاء الطلب الأولي.\r\n\r\nإذا كنت بحاجة إلى إجراء تغييرات على طلبك، يرجى الاتصال بنا عبر الواتساب (+971 55 343 9920) أو عبر البريد الإلكتروني على onlinesales@privatecollection.ae في أقرب وقت ممكن. وسوف نبذل قصارى جهدنا لتلبية الاحتياجات الخاصة بك.', 'Depending on the status of your order, you may modify or cancel the initial order.\r\n\r\nIf you need to make changes to your order, please contact us through WhatsApp (+971 55 343 9920) or via email at onlinesales@privatecollection.ae as soon as possible. We will do our utmost to accommodate your requirements.', 1, '2024-03-14 14:34:47', '2024-03-14 14:34:47'),
(6, 'كم من الوقت سيستغرق تسليم الطرد الخاص بي؟', 'How long will it take to deliver my package?', 'نحن نقدم خدمة التوصيل المجانية خلال يومين إلى ثلاثة أيام داخل دولة الإمارات العربية المتحدة. يتوفر أيضًا خيار التسليم في نفس اليوم داخل حدود مدينة دبي. يرجى الرجوع إلى \"شروط المبيعات\" الخاصة بنا للحصول على مزيد من التفاصيل.', 'We offer free two-to-three-days delivery within UAE. A same-day delivery option is also available within Dubai city limits. Please refer to our “Terms of Sales” for further details.', 1, '2024-03-14 14:35:24', '2024-03-14 14:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_10_000000_create_countries_table', 1),
(2, '2014_10_11_000000_create_ads_table', 1),
(3, '2014_10_11_000000_create_services_table', 1),
(4, '2014_10_11_000000_create_sliders_table', 1),
(5, '2014_10_11_100517_create_blocks_table', 1),
(6, '2014_10_12_000000_create_admins_table', 1),
(7, '2014_10_12_000000_create_client_table', 1),
(8, '2015_04_18_084603_create_addresses_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_04_18_080645_create_settings_table', 1),
(11, '2022_04_18_084603_create_contacts_table', 1),
(12, '2022_04_18_084626_create_f_a_q_s_table', 1),
(13, '2022_04_19_100517_create_payments_table', 1),
(14, '2022_05_10_080339_create_categories_table', 1),
(15, '2022_05_10_080339_create_colors_table', 1),
(16, '2022_05_10_080339_create_deliveries_table', 1),
(17, '2022_05_10_080339_create_memories_table', 1),
(18, '2022_05_10_080339_create_os_table', 1),
(19, '2022_05_10_080339_create_processors_table', 1),
(20, '2022_05_10_080339_create_sizes_table', 1),
(21, '2022_05_10_080339_create_specs_table', 1),
(22, '2022_05_10_080339_create_storages_table', 1),
(23, '2022_06_14_080339_create_devices_table', 1),
(24, '2022_06_15_080340_create_branches_table', 1),
(26, '2022_06_30_113555_create_wishlist_table', 1),
(27, '2023_01_01_080339_create_orders_table', 1),
(28, '2023_06_12_105345_create_permission_tables', 1),
(29, '2022_05_10_080339_create_brands_table', 2),
(30, '2024_02_21_141139_create_widths_table', 3),
(31, '2024_02_21_154437_create_heights_table', 4),
(32, '2024_02_21_141139_create_coupons_table', 5),
(33, '2022_04_18_084603_create_subscribers_table', 6),
(34, '2022_06_30_113555_create_cart_table', 7),
(35, '2022_06_15_080339_create_products_table', 8),
(36, '2024_05_05_115157_create_coupons_table', 8),
(37, '2024_05_08_140855_add_gallery_id_to_product_item_table', 9),
(38, '2024_05_20_105421_add_foreign_key_to_addresses_table', 10),
(39, '2024_05_23_105303_create_product_reviews_table', 11),
(40, '2024_06_06_072726_add_coupon_id_to_orders_table', 12),
(41, '2024_06_06_081047_add_size_id_to_order_product_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `address_id` bigint UNSIGNED DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `payment_id` bigint UNSIGNED NOT NULL,
  `sub_total` decimal(9,3) NOT NULL DEFAULT '0.000',
  `discount` decimal(9,3) NOT NULL DEFAULT '0.000',
  `discount_percentage` int NOT NULL DEFAULT '0',
  `vat` decimal(9,3) NOT NULL DEFAULT '0.000',
  `vat_percentage` int NOT NULL DEFAULT '0',
  `coupon` decimal(9,3) NOT NULL DEFAULT '0.000',
  `coupon_percentage` int NOT NULL DEFAULT '0',
  `charge_cost` decimal(9,3) NOT NULL DEFAULT '0.000',
  `net_total` decimal(9,3) NOT NULL DEFAULT '0.000',
  `total_after_coupon` decimal(9,3) DEFAULT '0.000',
  `status` int NOT NULL DEFAULT '0',
  `follow` int NOT NULL DEFAULT '0',
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `coupon_id` bigint UNSIGNED DEFAULT NULL,
  `sub_total_after_coupon` decimal(9,3) DEFAULT '0.000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `delivery_id`, `client_id`, `address_id`, `branch_id`, `payment_id`, `sub_total`, `discount`, `discount_percentage`, `vat`, `vat_percentage`, `coupon`, `coupon_percentage`, `charge_cost`, `net_total`, `total_after_coupon`, `status`, `follow`, `notes`, `created_at`, `updated_at`, `coupon_id`, `sub_total_after_coupon`) VALUES
(11, NULL, NULL, NULL, 2, 12, NULL, 3, 1, '360.000', '0.000', 0, '36.000', 10, '0.000', 0, '0.000', '396.000', '0.000', 1, 3, NULL, '2023-11-23 13:27:07', '2023-12-23 09:06:53', NULL, '0.000'),
(12, NULL, NULL, NULL, 1, 13, 11, NULL, 1, '320.000', '0.000', 0, '32.000', 10, '0.000', 0, '0.700', '352.700', '0.000', 1, 3, NULL, '2023-11-23 13:31:50', '2024-06-11 12:35:35', NULL, '0.000'),
(13, NULL, NULL, NULL, 1, 15, 12, NULL, 1, '300.000', '100.000', 0, '30.000', 10, '0.000', 0, '0.700', '330.700', '0.000', 1, 3, NULL, '2023-12-11 11:53:42', '2024-06-11 12:35:30', NULL, '0.000'),
(14, NULL, NULL, NULL, 1, 16, 13, NULL, 1, '320.000', '80.000', 0, '32.000', 10, '0.000', 0, '0.800', '352.800', '0.000', 1, 3, NULL, '2023-12-11 13:36:15', '2024-05-20 04:05:42', NULL, '0.000'),
(15, NULL, NULL, NULL, 2, 17, NULL, 3, 1, '180.000', '0.000', 0, '18.000', 10, '0.000', 0, '0.000', '198.000', '0.000', 2, 0, NULL, '2023-12-11 14:01:50', '2024-06-11 12:57:32', NULL, '0.000'),
(16, NULL, NULL, NULL, 1, 17, 14, NULL, 1, '90.000', '0.000', 0, '9.000', 10, '0.000', 0, '0.700', '99.700', '0.000', 3, 0, NULL, '2023-12-11 14:29:53', '2024-05-04 03:15:28', NULL, '0.000'),
(17, NULL, NULL, NULL, 2, 18, NULL, 3, 1, '250.000', '0.000', 0, '25.000', 10, '0.000', 0, '0.000', '275.000', '0.000', 2, 0, NULL, '2023-12-20 10:31:20', '2024-06-11 12:57:35', NULL, '0.000'),
(18, NULL, NULL, NULL, 2, 19, NULL, 3, 1, '28000.000', '0.000', 0, '2800.000', 10, '0.000', 0, '0.000', '30800.000', '0.000', 2, 0, NULL, '2023-12-20 10:31:53', '2024-06-11 12:57:39', NULL, '0.000'),
(19, NULL, NULL, NULL, 1, 20, 17, NULL, 1, '10000.000', '0.000', 0, '1500.000', 15, '0.000', 0, '25.000', '11525.000', '0.000', 2, 0, NULL, '2024-01-01 10:11:00', '2024-06-11 12:57:41', NULL, '0.000'),
(20, NULL, NULL, NULL, 1, 17, 14, NULL, 1, '320.000', '80.000', 0, '48.000', 15, '0.000', 0, '0.700', '368.700', '0.000', 1, 3, NULL, '2024-01-01 10:47:18', '2024-01-01 10:50:23', NULL, '0.000'),
(21, NULL, NULL, NULL, 1, 25, 23, NULL, 1, '400.000', '0.000', 0, '60.000', 15, '0.000', 0, '0.700', '460.700', '0.000', 4, 0, NULL, '2024-01-08 10:33:46', '2024-05-04 03:17:59', NULL, '0.000'),
(22, NULL, NULL, NULL, 1, 17, 14, NULL, 1, '150.000', '0.000', 0, '22.500', 15, '0.000', 0, '0.700', '173.200', '0.000', 2, 0, NULL, '2024-01-15 12:21:32', '2024-06-11 12:57:46', NULL, '0.000'),
(23, NULL, NULL, NULL, 1, 17, 14, NULL, 1, '400.000', '0.000', 0, '60.000', 15, '0.000', 0, '0.700', '460.700', '0.000', 1, 3, NULL, '2024-01-15 12:40:14', '2024-05-04 04:41:01', NULL, '0.000'),
(35, NULL, NULL, NULL, 1, 34, 38, NULL, 1, '3008.000', '508.000', 17, '451.200', 15, '0.000', 0, '25.000', '3484.200', '0.000', 5, 0, NULL, '2024-03-05 14:00:39', '2024-03-05 14:00:39', NULL, '0.000'),
(36, NULL, NULL, NULL, 1, 34, 38, NULL, 1, '5000.000', '0.000', 0, '750.000', 15, '0.000', 0, '25.000', '5775.000', '0.000', 1, 3, NULL, '2024-03-05 18:08:23', '2024-06-09 12:21:55', NULL, '0.000'),
(37, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '19.350', 15, '5.000', 0, '7.000', '155.350', '0.000', 1, 3, NULL, '2024-06-06 04:41:23', '2024-06-11 12:35:37', 2, '129.000'),
(38, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '19.350', 15, '5.000', 0, '7.000', '155.350', '0.000', 2, 0, NULL, '2024-06-06 05:13:59', '2024-06-11 12:56:03', 2, '129.000'),
(39, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '161.100', '0.000', 2, 0, NULL, '2024-06-06 05:15:21', '2024-06-11 12:56:07', NULL, '0.000'),
(40, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '161.100', '0.000', 2, 0, NULL, '2024-06-06 05:16:38', '2024-06-11 12:37:15', NULL, '0.000'),
(41, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '161.100', '0.000', 2, 0, NULL, '2024-06-06 05:17:11', '2024-06-11 12:56:09', NULL, '0.000'),
(42, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '161.100', '0.000', 2, 0, NULL, '2024-06-06 05:20:10', '2024-06-11 12:57:54', NULL, '0.000'),
(43, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '161.100', '0.000', 2, 0, NULL, '2024-06-06 05:30:56', '2024-06-11 12:57:58', NULL, '0.000'),
(44, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '161.100', '0.000', 2, 0, NULL, '2024-06-06 05:31:20', '2024-06-11 12:58:01', NULL, '0.000'),
(45, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '161.100', '0.000', 2, 0, NULL, '2024-06-06 05:32:38', '2024-06-11 12:58:03', NULL, '0.000'),
(47, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '161.100', '0.000', 2, 0, NULL, '2024-06-06 05:33:40', '2024-06-11 12:58:08', NULL, '0.000'),
(55, NULL, NULL, NULL, 2, 52, NULL, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '161.100', '0.000', 0, 0, NULL, '2024-06-06 06:07:33', '2024-06-06 06:07:33', NULL, '0.000'),
(56, NULL, NULL, NULL, 2, 52, NULL, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '161.100', '0.000', 2, 0, NULL, '2024-06-06 06:08:25', '2024-06-11 12:34:05', NULL, '0.000'),
(57, NULL, NULL, NULL, 2, 52, NULL, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '161.100', '0.000', 2, 0, NULL, '2024-06-06 06:09:32', '2024-06-11 12:34:01', NULL, '0.000'),
(58, NULL, NULL, NULL, 2, 52, NULL, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '7.000', '0.000', 2, 0, NULL, '2024-06-06 06:11:54', '2024-06-11 12:33:53', NULL, '0.000'),
(59, NULL, NULL, NULL, 2, 52, NULL, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '7.000', '0.000', 2, 0, NULL, '2024-06-06 06:13:23', '2024-06-11 12:33:37', NULL, '0.000'),
(60, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '7.000', '0.000', 2, 0, NULL, '2024-06-06 07:01:15', '2024-06-11 12:33:35', NULL, '0.000'),
(61, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '7.000', '0.000', 2, 0, NULL, '2024-06-06 07:08:41', '2024-06-11 12:33:32', NULL, '0.000'),
(62, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '7.000', '0.000', 2, 0, NULL, '2024-06-06 07:19:56', '2024-06-11 12:33:15', NULL, '0.000'),
(63, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '7.000', '0.000', 2, 0, NULL, '2024-06-06 07:20:18', '2024-06-11 12:33:14', NULL, '0.000'),
(64, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '26.900', '0.000', 0, '0.329', 15, '0.500', 0, '0.700', '3.219', '0.000', 2, 0, NULL, '2024-06-06 08:55:18', '2024-06-11 12:33:10', 2, '2.190'),
(65, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '26.900', '0.000', 0, '4.035', 15, '0.000', 0, '0.700', '0.700', '0.000', 2, 0, NULL, '2024-06-06 08:56:40', '2024-06-11 12:33:00', NULL, '0.000'),
(66, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '26.900', '0.000', 0, '4.035', 15, '0.000', 0, '0.700', '0.700', '0.000', 2, 0, NULL, '2024-06-06 09:10:56', '2024-06-11 12:32:49', NULL, '0.000'),
(67, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '26.900', '0.000', 0, '4.035', 15, '0.000', 0, '0.700', '0.700', '0.000', 2, 0, NULL, '2024-06-06 09:11:08', '2024-06-11 12:32:45', NULL, '0.000'),
(68, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '26.900', '0.000', 0, '4.035', 15, '0.000', 0, '0.700', '0.700', '0.000', 1, 3, NULL, '2024-06-06 09:13:11', '2024-06-08 08:14:54', NULL, '0.000'),
(69, NULL, NULL, NULL, 2, 52, NULL, NULL, 1, '313.000', '0.000', 0, '46.200', 15, '5.000', 0, '0.000', '354.200', '0.000', 2, 0, NULL, '2024-06-08 13:13:58', '2024-06-09 07:24:11', 2, '308.000'),
(70, NULL, NULL, NULL, 2, 52, NULL, NULL, 1, '313.000', '0.000', 0, '46.950', 15, '0.000', 0, '0.000', '359.950', '0.000', 2, 0, NULL, '2024-06-08 13:19:39', '2024-06-09 07:23:44', NULL, '0.000'),
(71, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '67.000', '0.000', 0, '9.300', 15, '5.000', 0, '7.000', '78.300', '0.000', 2, 0, NULL, '2024-06-08 13:35:06', '2024-06-09 07:22:54', 2, '62.000'),
(72, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '67.000', '0.000', 0, '9.300', 15, '5.000', 0, '7.000', '78.300', '0.000', 2, 0, NULL, '2024-06-08 13:40:40', '2024-06-09 07:21:28', 2, '62.000'),
(73, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '123.000', '0.000', 0, '17.700', 15, '5.000', 0, '7.000', '142.700', '0.000', 2, 0, NULL, '2024-06-08 13:46:07', '2024-06-09 07:20:35', 2, '118.000'),
(74, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '123.000', '0.000', 0, '18.450', 15, '0.000', 0, '0.000', '141.450', '0.000', 2, 0, NULL, '2024-06-08 13:54:32', '2024-06-09 07:20:08', NULL, '0.000'),
(75, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '134.000', '0.000', 0, '20.100', 15, '0.000', 0, '7.000', '161.100', '0.000', 2, 0, NULL, '2024-06-08 13:55:52', '2024-06-09 07:01:41', NULL, '0.000'),
(76, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '369.000', '0.000', 0, '54.600', 15, '5.000', 0, '7.000', '425.600', '0.000', 2, 0, NULL, '2024-06-09 00:13:30', '2024-06-09 07:01:23', 2, '364.000'),
(77, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '369.000', '0.000', 0, '54.600', 15, '5.000', 0, '7.000', '425.600', '0.000', 2, 0, NULL, '2024-06-09 00:17:02', '2024-06-09 06:16:06', 2, '364.000'),
(78, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '369.000', '0.000', 0, '54.600', 15, '5.000', 0, '7.000', '425.600', '0.000', 2, 0, NULL, '2024-06-09 00:19:27', '2024-06-09 06:03:39', 2, '364.000'),
(79, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '369.000', '0.000', 0, '54.600', 15, '5.000', 0, '7.000', '425.600', '0.000', 2, 0, NULL, '2024-06-09 00:20:02', '2024-06-09 05:59:15', 2, '364.000'),
(80, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '369.000', '0.000', 0, '54.600', 15, '5.000', 0, '7.000', '425.600', '0.000', 2, 0, NULL, '2024-06-09 00:21:09', '2024-06-09 05:50:11', 2, '364.000'),
(81, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '369.000', '0.000', 0, '54.600', 15, '5.000', 0, '7.000', '425.600', '0.000', 2, 0, NULL, '2024-06-09 00:21:54', '2024-06-09 05:49:08', 2, '364.000'),
(82, NULL, NULL, NULL, 1, 52, 45, NULL, 1, '67.000', '0.000', 0, '9.300', 15, '5.000', 0, '25.000', '96.300', '0.000', 2, 0, NULL, '2024-06-09 04:01:46', '2024-06-09 05:47:52', 2, '62.000'),
(83, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '24.600', '0.000', 0, '3.615', 15, '0.500', 0, '0.700', '28.415', '0.000', 2, 0, NULL, '2024-06-09 05:17:35', '2024-06-09 05:45:15', 2, '24.100'),
(84, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '24.600', '0.000', 0, '3.615', 15, '0.500', 0, '0.700', '28.415', '0.000', 2, 0, NULL, '2024-06-09 05:35:01', '2024-06-09 05:44:41', 2, '24.100'),
(85, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '12.300', '0.000', 0, '1.845', 15, '0.000', 0, '0.700', '14.845', '0.000', 2, 0, NULL, '2024-06-09 06:22:57', '2024-06-09 07:00:46', NULL, '0.000'),
(86, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '12.300', '0.000', 0, '1.845', 15, '0.000', 0, '0.700', '14.845', '0.000', 2, 0, NULL, '2024-06-09 06:27:15', '2024-06-09 11:28:09', NULL, '0.000'),
(87, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '24.600', '0.000', 0, '3.690', 15, '0.000', 0, '0.700', '28.990', '0.000', 2, 0, NULL, '2024-06-09 07:26:25', '2024-06-09 11:24:45', NULL, '0.000'),
(88, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '24.600', '0.000', 0, '3.690', 15, '0.000', 0, '0.700', '28.990', '0.000', 2, 0, NULL, '2024-06-09 07:47:01', '2024-06-09 11:16:54', NULL, '0.000'),
(89, NULL, NULL, NULL, 1, 52, 46, NULL, 1, '13.400', '0.000', 0, '2.010', 15, '0.000', 0, '0.700', '16.110', '0.000', 2, 0, NULL, '2024-06-09 10:42:44', '2024-06-11 12:32:42', NULL, '0.000');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `price` decimal(8,3) DEFAULT NULL,
  `quantity` smallint NOT NULL,
  `total` decimal(9,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `color_id`, `price`, `quantity`, `total`, `created_at`, `updated_at`, `category`, `size_id`) VALUES
(44, 55, 22, 4, '2.000', 2, '4.000', '2024-06-06 06:07:33', '2024-06-06 06:07:33', NULL, 100),
(45, 64, 22, 4, '2.000', 1, '2.000', '2024-06-06 08:55:18', '2024-06-06 08:55:18', NULL, 100),
(46, 64, 25, 7, '2.000', 2, '4.000', '2024-06-06 08:55:18', '2024-06-06 08:55:18', NULL, 99),
(47, 64, 22, 5, '2.000', 2, '4.000', '2024-06-06 08:55:18', '2024-06-06 08:55:18', NULL, 98),
(48, 69, 24, 3, '2.000', 2, '4.000', '2024-06-08 13:13:58', '2024-06-08 13:13:58', NULL, 98),
(49, 69, 22, 4, '2.000', 1, '2.000', '2024-06-08 13:13:58', '2024-06-08 13:13:58', NULL, 100),
(50, 71, 22, 4, '2.000', 1, '2.000', '2024-06-08 13:35:06', '2024-06-08 13:35:06', NULL, 100),
(51, 73, 24, 3, '2.000', 1, '2.000', '2024-06-08 13:46:07', '2024-06-08 13:46:07', NULL, 98),
(52, 75, 22, 4, '2.000', 2, '4.000', '2024-06-08 13:55:52', '2024-06-08 13:55:52', NULL, 100),
(53, 78, 24, 4, '2.000', 3, '6.000', '2024-06-09 00:19:27', '2024-06-09 00:19:27', NULL, 99),
(54, 79, 24, 4, '2.000', 3, '6.000', '2024-06-09 00:20:02', '2024-06-09 00:20:02', NULL, 99),
(55, 80, 24, 4, '2.000', 3, '6.000', '2024-06-09 00:21:09', '2024-06-09 00:21:09', NULL, 99),
(56, 81, 24, 4, '2.000', 3, '6.000', '2024-06-09 00:21:54', '2024-06-09 00:21:54', NULL, 99),
(57, 82, 22, 4, '2.000', 1, '2.000', '2024-06-09 04:01:46', '2024-06-09 04:01:46', NULL, 100),
(58, 83, 24, 3, '2.000', 2, '4.000', '2024-06-09 05:17:35', '2024-06-09 05:17:35', NULL, 98),
(59, 85, 24, 3, '2.000', 1, '2.000', '2024-06-09 06:22:57', '2024-06-09 06:22:57', NULL, 98),
(60, 86, 24, 3, '2.000', 1, '2.000', '2024-06-09 06:27:15', '2024-06-09 06:27:15', NULL, 98),
(61, 87, 24, 3, '2.000', 2, '4.000', '2024-06-09 07:26:25', '2024-06-09 07:26:25', NULL, 98),
(62, 88, 24, 3, '2.000', 2, '4.000', '2024-06-09 07:47:01', '2024-06-09 07:47:01', NULL, 98),
(63, 89, 22, 4, '2.000', 2, '4.000', '2024-06-09 10:42:44', '2024-06-09 10:42:44', NULL, 100);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('megypt124@gmail.com', '$2y$10$2yPy05xEFCbNWuVmhZm1Seh/X9LLk9V1U/E1GloYvyPK0jptnJXAK', '2024-03-20 10:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `tap_src` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `tap_src`, `title_ar`, `title_en`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'كاش', 'Cash', '/uploads/Payments/1696421010_7744.webp', 1, '2021-06-02 00:48:55', '2023-10-04 11:03:30'),
(2, 'src_bh.benefit', 'بطاقة الصراف الآلي', 'Debit Card', '/uploads/Payments/1696421025_7142.webp', 1, '2021-06-02 00:48:55', '2023-10-04 11:03:46'),
(3, 'src_card', 'بطاقة الإئتمان', 'Credit Card', '/uploads/Payments/1696421039_8251.webp', 1, '2021-06-02 00:48:55', '2023-10-04 11:04:00'),
(4, 'src_bh.benefit', 'بنفت باي', 'Benefit Pay', '/uploads/Payments/1696421052_5186.webp', 1, '2021-06-02 00:48:55', '2023-10-04 11:04:12'),
(5, 'src_apple_pay', 'أبل باي', 'Apple Pay', '/uploads/Payments/1696421069_3221.webp', 1, '2021-06-02 00:48:55', '2023-10-04 11:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `title_ar`, `title_en`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin-list', 'admin list', 'admin list', 'admin', '2023-06-12 09:24:20', '2023-06-13 07:35:13'),
(2, 'admin-create', 'admin create', 'admin create', 'admin', '2023-06-12 09:24:20', '2023-06-12 09:24:20'),
(3, 'admin-edit', 'admin edit', 'admin edit', 'admin', '2023-06-12 09:24:20', '2023-06-12 09:24:20'),
(4, 'admin-delete', 'admin delete', 'admin delete', 'admin', '2023-06-12 09:24:20', '2023-06-12 09:24:20'),
(5, 'client-list', 'client list', 'client list', 'admin', '2023-06-12 09:24:27', '2023-06-12 09:24:27'),
(6, 'client-create', 'client create', 'client create', 'admin', '2023-06-12 09:24:27', '2023-06-12 09:24:27'),
(7, 'client-edit', 'client edit', 'client edit', 'admin', '2023-06-12 09:24:27', '2023-06-12 09:24:27'),
(8, 'client-delete', 'client delete', 'client delete', 'admin', '2023-06-12 09:24:27', '2023-06-12 09:24:27'),
(9, 'country-list', 'country list', 'country list', 'admin', '2023-06-12 09:24:32', '2023-06-12 09:24:32'),
(10, 'country-create', 'country create', 'country create', 'admin', '2023-06-12 09:24:32', '2023-06-12 09:24:32'),
(11, 'country-edit', 'country edit', 'country edit', 'admin', '2023-06-12 09:24:32', '2023-06-12 09:24:32'),
(12, 'country-delete', 'country delete', 'country delete', 'admin', '2023-06-12 09:24:32', '2023-06-12 09:24:32'),
(13, 'region-list', 'region list', 'region list', 'admin', '2023-06-12 09:24:38', '2023-06-12 09:24:38'),
(14, 'region-create', 'region create', 'region create', 'admin', '2023-06-12 09:24:38', '2023-06-12 09:24:38'),
(15, 'region-edit', 'region edit', 'region edit', 'admin', '2023-06-12 09:24:38', '2023-06-12 09:24:38'),
(16, 'region-delete', 'region delete', 'region delete', 'admin', '2023-06-12 09:24:38', '2023-06-12 09:24:38'),
(17, 'category-list', 'category list', 'category list', 'admin', '2023-06-12 09:24:46', '2023-06-12 09:24:46'),
(18, 'category-create', 'category create', 'category create', 'admin', '2023-06-12 09:24:46', '2023-06-12 09:24:46'),
(19, 'category-edit', 'category edit', 'category edit', 'admin', '2023-06-12 09:24:46', '2023-06-12 09:24:46'),
(20, 'category-delete', 'category delete', 'category delete', 'admin', '2023-06-12 09:24:46', '2023-06-12 09:24:46'),
(21, 'setting-list', 'setting list', 'setting list', 'admin', '2023-06-12 09:24:54', '2023-06-12 09:24:54'),
(22, 'setting-create', 'setting create', 'setting create', 'admin', '2023-06-12 09:24:54', '2023-06-12 09:24:54'),
(23, 'setting-edit', 'setting edit', 'setting edit', 'admin', '2023-06-12 09:24:54', '2023-06-12 09:24:54'),
(24, 'setting-delete', 'setting delete', 'setting delete', 'admin', '2023-06-12 09:24:54', '2023-06-12 09:24:54'),
(25, 'faq-list', 'faq list', 'faq list', 'admin', '2023-06-12 09:25:01', '2023-06-12 09:25:01'),
(26, 'faq-create', 'faq create', 'faq create', 'admin', '2023-06-12 09:25:01', '2023-06-12 09:25:01'),
(27, 'faq-edit', 'faq edit', 'faq edit', 'admin', '2023-06-12 09:25:01', '2023-06-12 09:25:01'),
(28, 'faq-delete', 'faq delete', 'faq delete', 'admin', '2023-06-12 09:25:01', '2023-06-12 09:25:01'),
(29, 'payment-list', 'payment list', 'payment list', 'admin', '2023-06-12 09:25:07', '2023-06-12 09:25:07'),
(30, 'payment-create', 'payment create', 'payment create', 'admin', '2023-06-12 09:25:07', '2023-06-12 09:25:07'),
(31, 'payment-edit', 'payment edit', 'payment edit', 'admin', '2023-06-12 09:25:07', '2023-06-12 09:25:07'),
(32, 'payment-delete', 'payment delete', 'payment delete', 'admin', '2023-06-12 09:25:07', '2023-06-12 09:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `most_popular` tinyint(1) NOT NULL DEFAULT '0',
  `most_selling` tinyint(1) NOT NULL DEFAULT '0',
  `new_collection` tinyint(1) NOT NULL DEFAULT '0',
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_desc_ar` longtext COLLATE utf8mb4_unicode_ci,
  `long_desc_en` longtext COLLATE utf8mb4_unicode_ci,
  `VAT` enum('inclusive','exclusive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,3) DEFAULT '0.000',
  `quantity` int DEFAULT '0',
  `discount_value` int DEFAULT '0',
  `discount_from` timestamp NULL DEFAULT NULL,
  `discount_to` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `status`, `most_popular`, `most_selling`, `new_collection`, `viewed`, `title_ar`, `title_en`, `long_desc_ar`, `long_desc_en`, `VAT`, `header`, `price`, `quantity`, `discount_value`, `discount_from`, `discount_to`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 125, 'نايك داون شيفتر 12', 'Nike Downshifter 12', NULL, '<p>description</p>', 'exclusive', NULL, '20.000', 370, 30, '2024-05-05 11:04:00', '2024-05-31 11:05:00', '2024-05-05 10:10:24', '2024-06-14 04:07:50'),
(22, 1, 1, 1, 1, 11, 'طيران جوردان 9 جي', 'Air Jordan 9 G', NULL, NULL, 'exclusive', NULL, '67.000', 28, 12, '2024-06-11 08:41:00', '2024-07-04 08:41:00', '2024-06-01 06:53:37', '2024-06-12 08:49:03'),
(23, 1, 1, 1, 1, 2, 'ملعب الأردن 90', 'Jordan Stadium 90', NULL, NULL, 'exclusive', NULL, '34.000', 30, 0, NULL, NULL, '2024-06-01 07:35:40', '2024-06-02 06:57:50'),
(24, 1, 1, 1, 1, 20, 'نايك التراث', 'Nike Heritage', NULL, NULL, 'exclusive', NULL, '123.000', 15, 0, NULL, NULL, '2024-06-02 03:33:21', '2024-06-14 03:37:19'),
(25, 1, 1, 1, 1, 14, 'نايك بريميوم', 'Nike Premium', NULL, NULL, 'exclusive', NULL, '34.000', 5, 30, '2024-06-11 08:39:00', '2024-06-30 08:39:00', '2024-06-02 03:54:45', '2024-06-12 08:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 99, NULL, NULL),
(6, 22, 99, NULL, NULL),
(8, 23, 99, NULL, NULL),
(9, 23, 98, NULL, NULL),
(10, 24, 99, NULL, NULL),
(11, 25, 98, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `image`, `status`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, '/uploads/Products/1714907425_3450.webp', 1, 1, NULL, '2024-05-05 10:10:25', '2024-05-05 10:10:25'),
(2, '/uploads/Products/1714907425_2806.webp', 1, 1, NULL, '2024-05-05 10:10:25', '2024-05-05 10:10:25'),
(3, '/uploads/Products/1714907425_6796.webp', 1, 1, NULL, '2024-05-05 10:10:25', '2024-05-05 10:10:25'),
(4, '/uploads/Products/1714907425_5245.webp', 1, 1, NULL, '2024-05-05 10:10:25', '2024-05-05 10:10:25'),
(99, '/uploads/Products/1717308321_6747.webp', 1, 22, NULL, '2024-06-01 06:53:38', '2024-06-02 05:05:22'),
(105, '/uploads/Products/1717230940_7515.webp', 1, 23, NULL, '2024-06-01 07:35:41', '2024-06-01 07:35:41'),
(118, '/uploads/Products/1717306359_5437.webp', 1, 25, NULL, '2024-06-02 04:32:40', '2024-06-02 04:32:40'),
(119, '/uploads/Products/1717306360_2797.webp', 1, 25, NULL, '2024-06-02 04:32:41', '2024-06-02 04:32:41'),
(120, '/uploads/Products/1717306361_3169.webp', 1, 25, NULL, '2024-06-02 04:32:42', '2024-06-02 04:32:42'),
(127, '/uploads/Products/1717308323_2236.webp', 1, 22, NULL, '2024-06-02 05:05:24', '2024-06-02 05:05:24'),
(128, '/uploads/Products/1717308324_5502.webp', 1, 22, NULL, '2024-06-02 05:05:25', '2024-06-02 05:05:25'),
(129, '/uploads/Products/1717308325_7120.webp', 1, 22, NULL, '2024-06-02 05:05:26', '2024-06-02 05:05:26'),
(130, '/uploads/Products/1717308705_4622.webp', 1, 23, NULL, '2024-06-02 05:11:45', '2024-06-02 05:11:45'),
(131, '/uploads/Products/1717308705_5978.webp', 1, 23, NULL, '2024-06-02 05:11:46', '2024-06-02 05:11:46'),
(132, '/uploads/Products/1717308706_8487.webp', 1, 23, NULL, '2024-06-02 05:11:47', '2024-06-02 05:11:47'),
(133, '/uploads/Products/1717308708_5024.webp', 1, 23, NULL, '2024-06-02 05:11:49', '2024-06-02 05:11:49'),
(145, '/uploads/Products/1717316524_8033.webp', 1, 24, NULL, '2024-06-02 07:22:05', '2024-06-02 07:22:05'),
(146, '/uploads/Products/1717316525_2047.webp', 1, 24, NULL, '2024-06-02 07:22:06', '2024-06-02 07:22:06'),
(147, '/uploads/Products/1717316526_5110.webp', 1, 24, NULL, '2024-06-02 07:22:07', '2024-06-02 07:22:07'),
(148, '/uploads/Products/1717316656_9655.webp', 1, 24, 3, '2024-06-02 07:24:17', '2024-06-02 07:24:17'),
(149, '/uploads/Products/1717316685_3802.webp', 1, 24, 4, '2024-06-02 07:24:45', '2024-06-02 07:24:45'),
(150, '/uploads/Products/1717936669_7705.webp', 1, 1, 2, '2024-06-09 11:37:51', '2024-06-09 11:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_item`
--

CREATE TABLE `product_item` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `parent_size_id` bigint UNSIGNED DEFAULT NULL,
  `size_id` bigint UNSIGNED DEFAULT NULL,
  `price` decimal(8,3) DEFAULT '0.000',
  `quantity` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gallery_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_item`
--

INSERT INTO `product_item` (`id`, `product_id`, `color_id`, `parent_size_id`, `size_id`, `price`, `quantity`, `created_at`, `updated_at`, `gallery_id`) VALUES
(255, 23, 9, 94, 98, '0.000', 10, '2024-06-02 07:11:38', '2024-06-02 07:11:38', NULL),
(256, 23, 4, 94, 99, '0.000', 10, '2024-06-02 07:11:38', '2024-06-02 07:11:38', NULL),
(257, 23, 6, 94, 100, '0.000', 10, '2024-06-02 07:11:38', '2024-06-02 07:11:38', NULL),
(259, 1, 2, 94, 98, '0.000', 100, '2024-06-02 07:19:15', '2024-06-09 11:37:51', 150),
(260, 1, 4, 94, 99, '0.000', 150, '2024-06-02 07:19:15', '2024-06-02 07:19:15', NULL),
(261, 1, 3, 94, 99, '0.000', 50, '2024-06-02 07:19:15', '2024-06-02 07:19:15', NULL),
(262, 1, 5, 94, 98, '0.000', 70, '2024-06-02 07:19:15', '2024-06-02 07:19:15', NULL),
(265, 24, 3, 94, 98, '0.000', 6, '2024-06-02 07:22:58', '2024-06-09 11:28:09', 148),
(266, 24, 4, 94, 99, '0.000', 9, '2024-06-02 07:22:58', '2024-06-09 00:21:54', 149),
(276, 22, 4, 94, 100, '0.000', 6, '2024-06-12 08:49:03', '2024-06-12 08:49:03', NULL),
(277, 22, 2, 94, 99, '0.000', 10, '2024-06-12 08:49:03', '2024-06-12 08:49:03', NULL),
(278, 22, 5, 94, 98, '0.000', 10, '2024-06-12 08:49:03', '2024-06-12 08:49:03', NULL),
(279, 25, 7, 94, 99, '0.000', 9, '2024-06-12 08:50:13', '2024-06-12 08:50:13', NULL),
(280, 25, 2, 94, 99, '0.000', 88, '2024-06-12 08:50:13', '2024-06-12 08:50:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `rate` enum('1','2','3','4','5') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `client_id`, `product_id`, `rate`, `comment`, `created_at`, `updated_at`) VALUES
(5, 52, 1, '1', 'this is very hight quality shoes', '2024-05-23 11:52:49', '2024-05-23 11:52:49'),
(6, 52, 1, '2', 'test', '2024-05-23 11:56:26', '2024-05-23 11:56:26'),
(7, 52, 1, '2', 'test2', '2024-05-23 11:57:29', '2024-05-23 11:57:29'),
(8, 52, 1, '1', '3', '2024-05-23 11:58:40', '2024-05-23 11:58:40'),
(15, 52, 1, '3', 'dina 33', '2024-05-25 13:07:38', '2024-05-25 13:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `product_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delivery_cost` double(8,2) NOT NULL DEFAULT '1.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `country_id`, `title_ar`, `title_en`, `lat`, `long`, `status`, `delivery_cost`, `created_at`, `updated_at`) VALUES
(295, 1, 'العكر', 'Al Eker', '26.227934462972', '50.589108404105', 1, 7.00, NULL, '2024-06-06 02:50:09'),
(296, 1, 'القدم', 'Al Qadam', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(297, 1, 'القرية', 'Quraiyah', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(298, 1, 'القضيبية', 'Qudaibiya', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(299, 1, 'قلالي', 'Qalali', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(300, 1, 'القلعة', 'Al Qalah', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(301, 1, 'كرانة', 'Karranah', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(302, 1, 'الحجر', 'Al Hajar', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(303, 1, 'كرباباد', 'Karbabad', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(304, 1, 'كرزكان', 'Karzakan', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(305, 1, 'الماحوز', 'Mahooz', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(306, 1, 'المالكية', 'Malkiah', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(307, 1, 'مدينة حمد من دوار 1 إلى دوار 10', 'Madinat Hamad From R 1 to R 10', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(308, 1, 'مدينة زايد', 'Zayed Town', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(309, 1, 'مدينة عيسي', 'Isa Town', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(310, 1, 'المحرق', 'Al Muharraq', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(311, 1, 'مقابة', 'Maqabah', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(312, 1, 'المقشع', 'Al Maqsha', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(313, 1, 'المنامة', 'Manama', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(314, 1, 'النبيه صالح', 'Nabih Saleh', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(315, 1, 'النعيم', 'Alnaim', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(316, 1, 'النويدرات', 'Nuwaidrat', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(317, 1, 'الهملة', 'Al Hamala', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(318, 1, 'البلاد القديم', 'Bilad Al Qadeem', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(319, 1, 'الكورة', 'Kawarah', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(320, 1, 'سلماباد', 'Salmabad', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(321, 1, 'أبو صيبع', 'Abu Saiba', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(322, 1, 'أبوقوة', 'Bu Quwah', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(323, 1, 'أم الحصم', 'Umm Al Hassam', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(324, 1, 'المصلي', 'Al Musalla', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(325, 1, 'توبلي', 'Tubli', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(326, 1, 'باربار', 'Barbar', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(327, 1, 'البديع', 'Budaiya', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(328, 1, 'البسيتين', 'Busaiten', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(329, 1, 'بوكوارة', 'Bu Kowarah', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(330, 1, 'البحير', 'Al Bahair', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(331, 1, 'بني جمرة', 'Bani Jamra', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(332, 1, 'بوري', 'Buri', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(333, 1, 'جبلة حبشي', 'Jeblat Hebshi', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(334, 1, 'جد الحاج', 'Jid Al Haj', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(335, 1, 'جد حفص', 'Jidhafs', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(336, 1, 'جد علي', 'Jid Ali', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(337, 1, 'جرداب', 'Jurdab', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(338, 1, 'الجسرة', 'Aljasrah', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(339, 1, 'الجفير', 'AlJuffair', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(340, 1, 'الجنبية', 'ُEljanabiya', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(341, 1, 'جنوسان', 'Jannusan', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(342, 1, 'جو', 'Jaw', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(343, 1, 'الحد', 'AL Hidd', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(344, 1, 'الحجيات', 'Alhajiyat', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(345, 1, 'حلة العبد الصالح', 'Hillat Abdul Saleh', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(346, 1, 'الحورة', 'Al Hoora', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(347, 1, 'الخميس', 'Khamis', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(348, 1, 'دار كليب', 'Dar Kulaib', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(349, 1, 'المنطقة الدبلوماسية', 'Diplomatic Area', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(350, 1, 'الدراز', 'Diraz', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(351, 1, 'دمستان', 'Dimstan', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(352, 1, 'الدير', 'Aldair', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(353, 1, 'الديه', 'Daih', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(354, 1, 'رأس رمان', 'Ras Rumman', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(355, 1, 'الرفاع(الشرقي)', 'East Riffa', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(356, 1, 'الرفاع(الغربي)', 'West Riffa', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(357, 1, 'الزلاق', 'Al zallaq', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(358, 1, 'الزنج', 'Zinj', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(359, 1, 'السقيه', 'AL SAGYAH', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(360, 1, 'سار', 'Saar', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(361, 1, 'سترة', 'sitra', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(362, 1, 'سماهيج', 'Samahej', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(363, 1, 'السنابس', 'Sanabis', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(364, 1, 'سند', 'Sanad', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(365, 1, 'السهلة(الشمالية والجنوبية)', 'Sehla', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(366, 1, 'ضاحية السيف', 'seef', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(367, 1, 'الشاخورة', 'Shakhurah', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(368, 1, 'شهركان', 'Sharakan', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(369, 1, 'جامعة البحرين ', 'university of bahrain', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(370, 1, 'الصالحيه', 'Salihiya', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(371, 1, 'صدد', 'Sadad', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(372, 1, 'عالي', 'Aali', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(373, 1, 'العدلية', 'Adliya', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(374, 1, 'عذاري', 'AZARY', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(375, 1, 'عراد', 'Arad', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(376, 1, 'عسكر', 'askr', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(377, 1, 'مدينة حمد من دوار 11 إلى دوار 22', 'Madinat Hamad From R 11 to R 22', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(378, 1, 'اللوزي', 'Al lozy', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(379, 1, 'المرخ', 'Al Markh', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(380, 1, 'مدينة سلمان', 'Salman City', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(381, 1, 'تيست', 'Test', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(382, 1, 'القفول', 'Algufool', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(383, 1, 'المعامير', 'Maameer', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(384, 2, 'تبوك', 'Tabuk', '26.227934462972', '50.589108404105', 1, 25.00, NULL, '2024-05-28 09:10:06'),
(385, 2, 'الرياض', 'Riyadh', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(386, 2, 'الطائف', 'At Taif', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(387, 2, 'مكة المكرمة', 'Makkah Al Mukarramah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(388, 2, 'حائل', 'Hail', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(389, 2, 'بريدة', 'Buraydah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(390, 2, 'الهفوف', 'Al Hufuf', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(391, 2, 'الدمام', 'Ad Dammam', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(392, 2, 'المدينة المنورة', 'Al Madinah Al Munawwarah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(393, 2, 'ابها', 'Abha', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(394, 2, 'جازان', 'Jazan', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(395, 2, 'جدة', 'Jeddah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(396, 2, 'المجمعة', 'Al Majmaah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(397, 2, 'الخبر', 'Al Khubar', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(398, 2, 'حفر الباطن', 'Hafar Al Batin', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(399, 2, 'خميس مشيط', 'Khamis Mushayt', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(400, 2, 'احد رفيده', 'Ahad Rifaydah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(401, 2, 'القطيف', 'Al Qatif', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(402, 2, 'عنيزة', 'Unayzah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(403, 2, 'قرية العليا', 'Qaryat Al Ulya', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(404, 2, 'الجبيل', 'Al Jubail', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(405, 2, 'النعيرية', 'An Nuayriyah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(406, 2, 'الظهران', 'Dhahran', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(407, 2, 'الوجه', 'Al Wajh', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(408, 2, 'بقيق', 'Buqayq', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(409, 2, 'الزلفي', 'Az Zulfi', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(410, 2, 'خيبر', 'Khaybar', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(411, 2, 'الغاط', 'Al Ghat', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(412, 2, 'املج', 'Umluj', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(413, 2, 'رابغ', 'Rabigh', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(414, 2, 'عفيف', 'Afif', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(415, 2, 'ثادق', 'Thadiq', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(416, 2, 'سيهات', 'Sayhat', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(417, 2, 'تاروت', 'Tarut', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(418, 2, 'ينبع', 'Yanbu', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(419, 2, 'شقراء', 'Shaqra', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(420, 2, 'الدوادمي', 'Ad Duwadimi', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(421, 2, 'الدرعية', 'Ad Diriyah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(422, 2, 'القويعية', 'Quwayiyah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(423, 2, 'المزاحمية', 'Al Muzahimiyah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(424, 2, 'بدر', 'Badr', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(425, 2, 'الخرج', 'Al Kharj', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(426, 2, 'الدلم', 'Ad Dilam', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(427, 2, 'الشنان', 'Ash Shinan', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(428, 2, 'الخرمة', 'Al Khurmah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(429, 2, 'الجموم', 'Al Jumum', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(430, 2, 'المجاردة', 'Al Majardah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(431, 2, 'السليل', 'As Sulayyil', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(432, 2, 'تثليث', 'Tathilith', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(433, 2, 'بيشة', 'Bishah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(434, 2, 'الباحة', 'Al Baha', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(435, 2, 'القنفذة', 'Al Qunfidhah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(436, 2, 'محايل', 'Muhayil', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(437, 2, 'ثول', 'Thuwal', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(438, 2, 'ضبا', 'Duba', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(439, 2, 'تربه', 'Turbah', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(440, 2, 'صفوى', 'Safwa', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(441, 2, 'عنك', 'Inak', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(442, 2, 'طريف', 'Turaif', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(443, 2, 'عرعر', 'Arar', NULL, NULL, 0, 2.00, NULL, '2024-05-28 08:56:25'),
(444, 2, 'القريات', 'Al Qurayyat', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(445, 2, 'سكاكا', 'Sakaka', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(446, 2, 'رفحاء', 'Rafha', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(447, 2, 'دومة الجندل', 'Dawmat Al Jandal', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(448, 2, 'الرس', 'Ar Rass', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(449, 2, 'المذنب', 'Al Midhnab', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(450, 2, 'الخفجي', 'Al Khafji', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(451, 2, 'رياض الخبراء', 'Riyad Al Khabra', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(452, 2, 'البدائع', 'Al Badai', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(453, 2, 'رأس تنورة', 'Ras Tannurah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(454, 2, 'البكيرية', 'Al Bukayriyah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(455, 2, 'الشماسية', 'Ash Shimasiyah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(456, 2, 'الحريق', 'Al Hariq', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(457, 2, 'حوطة بني تميم', 'Hawtat Bani Tamim', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(458, 2, 'ليلى', 'Layla', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(459, 2, 'بللسمر', 'Billasmar', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(460, 2, 'شرورة', 'Sharurah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(461, 2, 'نجران', 'Najran', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(462, 2, 'صبيا', 'Sabya', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(463, 2, 'ابو عريش', 'Abu Arish', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(464, 2, 'صامطة', 'Samtah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(465, 2, 'احد المسارحة', 'Ahad Al Musarihah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(466, 2, 'مدينة الملك عبدالله الاقتصادية', 'King Abdullah Economic City', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(467, 1, 'Capital Governorate', 'Capital Governorate', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(468, 1, 'Isa Town', 'Isa Town', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(469, 1, 'Al-Muḥāfaẓat aš-Šamālīyah', 'Al-Muḥāfaẓat aš-Šamālīyah', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(470, 1, 'Hoarat A\'ali', 'Hoarat A\'ali', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(471, 1, 'Al-Muḥāfaẓat al-Janūbīyah', 'Al-Muḥāfaẓat al-Janūbīyah', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(472, 1, 'Northern Governorate', 'Northern Governorate', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(473, 1, 'Al Jasra', 'Al Jasra', NULL, NULL, 1, 5.00, NULL, '2024-05-28 08:55:03'),
(474, 2, 'Riyadh Province', 'Riyadh Province', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(475, 2, 'Al Madinah Province', 'Al Madinah Province', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(476, 2, 'Medina', 'Medina', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(477, 2, 'Makkah Province', 'Makkah Province', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(478, 2, 'Asfan', 'Asfan', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(479, 2, 'Maysaan', 'Maysaan', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(480, 2, 'Quday\'an', 'Quday\'an', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(481, 2, 'Halban', 'Halban', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(482, 2, 'Al Wahwahi', 'Al Wahwahi', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(483, 2, 'Al Khasrah', 'Al Khasrah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(484, 2, 'منطقة الرياض', 'منطقة الرياض', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(485, 2, 'الحصاة', 'الحصاة', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(486, 2, 'Alquwayiyah', 'Alquwayiyah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(487, 2, 'Miz\'il', 'Miz\'il', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(488, 2, 'Al Duwadimi', 'Al Duwadimi', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(489, 2, 'Jilah', 'Jilah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(490, 2, 'Al Quwaiiyah', 'Al Quwaiiyah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(491, 2, 'Al Qassim Province', 'Al Qassim Province', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(492, 2, 'Dariyah', 'Dariyah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(493, 2, 'Al Humaij', 'Al Humaij', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(494, 2, 'Yanbu Al Nakhal', 'Yanbu Al Nakhal', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(495, 2, 'Al Figrah', 'Al Figrah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(496, 2, 'Alyutamah', 'Alyutamah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(497, 2, 'Mahd Al Thahab', 'Mahd Al Thahab', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(498, 2, 'Ad Dumayriyah', 'Ad Dumayriyah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(499, 2, 'Al Uyaynah', 'Al Uyaynah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(500, 2, 'Rughabah', 'Rughabah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(501, 2, 'Shaqra', 'Shaqra', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(502, 2, 'الفيضة بالسر', 'الفيضة بالسر', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(503, 2, 'Muhayriqah', 'Muhayriqah', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25'),
(504, 2, 'الجله الأعلى', 'الجله الأعلى', NULL, NULL, 1, 2.00, NULL, '2024-05-28 08:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title_ar`, `title_en`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'مدير', 'Manager', 'admin', '2023-06-12 09:25:25', '2023-06-12 09:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `desc_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `file`, `link`, `status`, `created_at`, `updated_at`) VALUES
(5, NULL, NULL, '<h6 class=\"card-title mb-0\"><small class=\"text-secondary\"> قسم العروض</small></h6>\n<p class=\"card-text text-black fw-semibold py-2\">جميع الأحذية العادية</p>', '<h6 class=\"card-title mb-0\"><small class=\"text-secondary\">Session Offer</small></h6>\n                      <p class=\"card-text text-black fw-semibold py-2\">ALL CASUAL SHOES</p>', '/uploads/Services/1715087024_9580.webp', NULL, 1, '2024-05-07 12:03:44', '2024-05-07 12:03:44'),
(6, NULL, NULL, '<h6 class=\"card-title mb-0\"><small class=\"text-secondary\"> قسم العروض</small></h6>\r\n<p class=\"card-text text-black fw-semibold py-2\">جميع الأحذية العادية</p>', '<h6 class=\"card-title mb-0\"><small class=\"text-secondary\">Session Offer</small></h6>\r\n<p class=\"card-text text-black fw-semibold py-2\">ALL CASUAL SHOES</p>', '/uploads/Services/1715145456_3115.webp', NULL, 1, '2024-05-07 12:03:44', '2024-05-08 04:17:38'),
(7, NULL, NULL, '<h6 class=\"card-title mb-0\"><small class=\"text-secondary\"> قسم العروض</small></h6>\r\n<p class=\"card-text text-black fw-semibold py-2\">جميع الأحذية العادية</p>', '<h6 class=\"card-title mb-0\"><small class=\"text-secondary\">Session Offer</small></h6>\r\n<p class=\"card-text text-black fw-semibold py-2\">ALL CASUAL SHOES</p>', '/uploads/Services/1715145486_7146.webp', NULL, 1, '2024-05-07 12:03:44', '2024-05-08 04:18:06'),
(8, NULL, NULL, '<h6 class=\"card-title mb-0\"><small class=\"text-secondary\"> قسم العروض</small></h6>\r\n<p class=\"card-text text-black fw-semibold py-2\">جميع الأحذية العادية</p>', '<h6 class=\"card-title mb-0\"><small class=\"text-secondary\">Session Offer</small></h6>\r\n<p class=\"card-text text-black fw-semibold py-2\">ALL CASUAL SHOES</p>', '/uploads/Services/1715145517_1013.webp', NULL, 1, '2024-05-07 12:03:44', '2024-05-08 04:18:37'),
(11, NULL, NULL, '<h6 class=\"card-title mb-0\"><small class=\"text-secondary\"> قسم العروض</small></h6>\r\n<p class=\"card-text text-black fw-semibold py-2\">جميع الأحذية العادية</p>', '<h6 class=\"card-title mb-0\"><small class=\"text-secondary\">Session Offer</small></h6>\r\n                      <p class=\"card-text text-black fw-semibold py-2\">ALL CASUAL SHOES</p>', '/uploads/Services/1715087024_9580.webp', NULL, 1, '2024-05-07 12:03:44', '2024-05-07 12:03:44'),
(12, NULL, NULL, '<h6 class=\"card-title mb-0\"><small class=\"text-secondary\"> قسم العروض</small></h6>\r\n<p class=\"card-text text-black fw-semibold py-2\">جميع الأحذية العادية</p>', '<h6 class=\"card-title mb-0\"><small class=\"text-secondary\">Session Offer</small></h6>\r\n<p class=\"card-text text-black fw-semibold py-2\">ALL CASUAL SHOES</p>', '/uploads/Services/1715145651_4923.webp', NULL, 1, '2024-05-07 12:03:44', '2024-05-08 04:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'title_ar', 'Tigger', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(2, 'title_en', 'Tigger', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(3, 'logo', '/uploads/Settings/1714735512_1236.webp', 'publicSettings', 1, NULL, '2024-05-03 10:25:13'),
(4, 'email', 'info@gmail.com', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(5, 'phone', '97339555152', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(6, 'whatsapp', '97339555152', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(7, 'desc', 'Tigger', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(8, 'keywords', 'Tigger', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(9, 'author', 'Tigger', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(10, 'main_color', '#f20000', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(11, 'vat', '15', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(12, 'about_ar', NULL, 'about', 1, '2022-10-09 05:52:15', '2024-05-03 10:42:26'),
(13, 'about_en', NULL, 'about', 1, '2022-10-09 05:52:15', '2024-05-03 10:42:26'),
(14, 'about_image', '/uploads/Settings/1686556152_8327.webp', 'about', 1, '2022-10-09 05:52:15', '2023-06-12 04:49:12'),
(15, 'privacy_ar', NULL, 'privacy', 1, '2022-10-09 05:52:15', '2024-05-03 10:42:26'),
(16, 'privacy_en', NULL, 'privacy', 1, '2022-10-09 05:52:15', '2024-05-03 10:42:26'),
(17, 'privacy_image', '/uploads/Settings/1686556163_1878.webp', 'privacy', 1, '2022-10-09 05:52:15', '2023-06-12 04:49:23'),
(18, 'terms_ar', NULL, 'terms', 1, '2022-10-09 05:52:15', '2024-05-03 10:42:26'),
(19, 'terms_en', NULL, 'terms', 1, '2022-10-09 05:52:15', '2024-05-03 10:42:26'),
(20, 'terms_image', '/uploads/Settings/1686556175_4346.webp', 'terms', 1, '2022-10-09 05:52:15', '2023-06-12 04:49:35'),
(21, 'accept_order', '0', 'publicSettings', 1, '2022-10-09 05:52:15', '2024-05-07 08:38:16'),
(23, 'about_display', NULL, 'about', 1, '2022-10-09 05:52:15', '2024-05-03 10:42:26'),
(24, 'privacy_display', NULL, 'privacy', 1, '2022-10-09 05:52:15', '2024-05-03 10:42:26'),
(25, 'terms_display', NULL, 'terms', 1, '2022-10-09 05:52:15', '2024-05-03 10:42:26'),
(26, 'facebook', 'https://www.facebook.com/', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(27, 'twitter', 'https://www.twitter.com/', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(28, 'instagram', 'https://www.instagram.com/', 'publicSettings', 1, '2022-10-09 05:52:15', '2024-05-07 08:38:16'),
(29, 'linkedin', 'https://www.linkedin.com/', 'publicSettings', 1, '2022-10-09 05:52:15', '2024-05-07 08:38:16'),
(30, 'not_found_image', '/uploads/Settings/not_found_img.png', 'publicSettings', 1, NULL, '2024-05-03 10:53:48'),
(31, 'internal_shipping_cost', '50', 'publicSettings', 1, NULL, '2024-05-07 08:38:16'),
(32, 'international_shipping_cost', '150', 'publicSettings', 1, NULL, '2024-05-07 08:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `parent_id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(94, NULL, 'UK', 1, '2024-05-05 08:00:38', '2024-05-05 08:03:32'),
(98, 94, '35', 1, '2024-05-05 08:05:57', '2024-06-11 12:21:56'),
(99, 94, '36', 1, '2024-05-05 08:06:08', '2024-05-05 08:06:08'),
(100, 94, '37', 1, '2024-05-05 08:06:17', '2024-05-05 08:06:42'),
(101, 94, '38', 1, '2024-06-11 12:20:18', '2024-06-11 12:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `desc_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `file`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, '', '', '<h6 class=\"\">عنوان الشريحة الأولى</h6>\n<h3 class=\"text-white lh-base\">خصم يصل إلى 50% أو أكثر على ملابس الرجال</h3>\n', '<h6 class=\"\">First slide label</h6>\n              <h3 class=\"text-white lh-base\">FLAT UP TO 50% OFF OR MORE FOR MEN’S</h3>\n              ', '/uploads/Sliders/1715078957_4862.webp', NULL, 1, '2023-11-13 10:44:34', '2024-05-07 09:49:19'),
(7, '', '', '<h6 class=\"\">عنوان الشريحة الأولى</h6>\r\n<h3 class=\"text-white lh-base\">خصم يصل إلى 50% أو أكثر على ملابس الرجال</h3>', '<h6 class=\"\">First slide label</h6>\r\n<h3 class=\"text-white lh-base\">FLAT UP TO 50% OFF OR MORE FOR MEN&rsquo;S</h3>', '/uploads/Sliders/1715079560_7255.webp', NULL, 1, '2023-11-13 10:44:34', '2024-05-07 09:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(3, 'ahmed@gmail.com', '2024-03-14 12:43:16', '2024-03-14 12:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` int DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `client_id`, `product_id`, `created_at`, `updated_at`) VALUES
(110, 419279, 1, NULL, NULL),
(115, 52, 1, NULL, NULL),
(120, 541169, 1, NULL, NULL),
(121, 52, 25, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_client_id_foreign` (`client_id`),
  ADD KEY `addresses_region_id_foreign` (`region_id`),
  ADD KEY `addresses_country_id_foreign` (`country_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blocks_country_id_foreign` (`country_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_country_id_foreign` (`country_id`);

--
-- Indexes for table `branch_category`
--
ALTER TABLE `branch_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_category_branch_id_foreign` (`branch_id`),
  ADD KEY `branch_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `branch_product`
--
ALTER TABLE `branch_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_device_branch_id_foreign` (`branch_id`),
  ADD KEY `branch_device_category_id_foreign` (`category_id`),
  ADD KEY `branch_device_device_id_foreign` (`product_id`);

--
-- Indexes for table `branch_region`
--
ALTER TABLE `branch_region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_region_branch_id_foreign` (`branch_id`),
  ADD KEY `branch_region_region_id_foreign` (`region_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_product_id_foreign` (`product_id`),
  ADD KEY `cart_color_id_foreign` (`color_id`),
  ADD KEY `cart_size_id_foreign` (`size_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_country_id_foreign` (`country_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_delivery_id_foreign` (`delivery_id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_branch_id_foreign` (`branch_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`),
  ADD KEY `orders_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_device_order_id_foreign` (`order_id`),
  ADD KEY `order_device_device_id_foreign` (`product_id`),
  ADD KEY `order_device_color_id_foreign` (`color_id`),
  ADD KEY `order_product_size_id_foreign` (`size_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_product_id_foreign` (`product_id`),
  ADD KEY `product_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_gallery_product_id_foreign` (`product_id`),
  ADD KEY `product_gallery_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_item`
--
ALTER TABLE `product_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_item_device_id_foreign` (`product_id`),
  ADD KEY `device_item_color_id_foreign` (`color_id`),
  ADD KEY `device_item_size_id_foreign` (`size_id`),
  ADD KEY `parent_size_id` (`parent_size_id`),
  ADD KEY `product_item_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_items_product_id_foreign` (`product_id`),
  ADD KEY `product_items_item_id_item_type_index` (`item_id`,`item_type`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_client_id_foreign` (`client_id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_size_product_id_foreign` (`product_id`),
  ADD KEY `product_size_size_id_foreign` (`size_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regions_country_id_foreign` (`country_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_device_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=458;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branch_category`
--
ALTER TABLE `branch_category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `branch_product`
--
ALTER TABLE `branch_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch_region`
--
ALTER TABLE `branch_region`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `product_item`
--
ALTER TABLE `product_item`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addresses_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch_category`
--
ALTER TABLE `branch_category`
  ADD CONSTRAINT `branch_category_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch_product`
--
ALTER TABLE `branch_product`
  ADD CONSTRAINT `branch_product_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch_region`
--
ALTER TABLE `branch_region`
  ADD CONSTRAINT `branch_region_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_region_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD CONSTRAINT `product_gallery_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_gallery_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_item`
--
ALTER TABLE `product_item`
  ADD CONSTRAINT `product_item_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_item_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `product_gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_item_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_item_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_items`
--
ALTER TABLE `product_items`
  ADD CONSTRAINT `product_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
