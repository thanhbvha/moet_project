-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2018 at 02:18 AM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_moet`
--

-- --------------------------------------------------------

--
-- Table structure for table `moet_fields`
--

CREATE TABLE `moet_fields` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moet_fields`
--

INSERT INTO `moet_fields` (`id`, `name`, `creator_id`, `created_at`, `updated_at`) VALUES
(7, 'Công nghệ thông tin', 3, 1524399528, NULL),
(9, 'Khoa học xã hội', 3, 1524399930, NULL),
(11, 'Nhân sự', 3, 1524410615, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moet_topics`
--

CREATE TABLE `moet_topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `units_id` int(11) DEFAULT NULL,
  `fields_id` int(11) DEFAULT NULL,
  `specialize_id` int(11) DEFAULT NULL,
  `student_info` text COMMENT 'thong tin sinh vien duoc luu dang json',
  `instructor` varchar(255) DEFAULT NULL COMMENT 'nguoi huong dan',
  `science_topic` text COMMENT 'cong bo khoa hoc cua sv ve de tai',
  `unit_manager` varchar(255) DEFAULT NULL COMMENT 'can bo phu trach sv nckh cua don vi',
  `expected_council` varchar(255) DEFAULT NULL COMMENT 'du kien hoi dong so khao',
  `council_point` decimal(5,2) DEFAULT NULL COMMENT 'dien danh gia cua hoi dong so khao',
  `expected_award` varchar(255) DEFAULT NULL,
  `noted` text,
  `creator_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moet_topics`
--

INSERT INTO `moet_topics` (`id`, `name`, `code`, `units_id`, `fields_id`, `specialize_id`, `student_info`, `instructor`, `science_topic`, `unit_manager`, `expected_council`, `council_point`, `expected_award`, `noted`, `creator_id`, `created_at`, `updated_at`) VALUES
(8, 'SMS', 'XH-40', 4, 7, 4, '{\"student\":\"B\\u00e1 Th\\u00e0nh\",\"sex\":\"male\",\"genus\":\"Kinh\",\"scholastic\":\"2\\/3\",\"specialize\":\"CNTT\",\"contact\":null}', 'Dương Mạnh Hà', 'Báo CNTT', 'Dương Mạnh Hà', '', '5.60', '1', '', 3, 1524402263, NULL),
(9, 'Abc', 'XH33', 3, 9, 5, '{\"student\":\"Hahe\",\"sex\":\"male\",\"genus\":\"Kinh\",\"scholastic\":\"2\\/5\",\"specialize\":\"K\\u1ebf to\\u00e1n\",\"contact\":null}', 'Ngô Ngô', 'fdasf', 'dsaf', 'fdsaf', '3.20', '1', '', 3, 1524403292, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moet_units`
--

CREATE TABLE `moet_units` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `creator_id` int(10) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moet_units`
--

INSERT INTO `moet_units` (`id`, `name`, `creator_id`, `created_at`, `updated_at`) VALUES
(3, 'Học viện Ngân Hàng', 3, 1524398688, 1524398746),
(4, 'Học viện Bưu Chính Viễn Thông', 3, 1524398762, 1524398775);

-- --------------------------------------------------------

--
-- Table structure for table `moet_units_specialize`
--

CREATE TABLE `moet_units_specialize` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moet_units_specialize`
--

INSERT INTO `moet_units_specialize` (`id`, `name`, `creator_id`, `created_at`, `updated_at`) VALUES
(4, 'Công nghệ thông tin', 3, 1524401817, NULL),
(5, 'Kế toán', 3, 1524401821, NULL),
(7, 'Điều tra dân số', 3, 1524411351, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moet_users`
--

CREATE TABLE `moet_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moet_users`
--

INSERT INTO `moet_users` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `role`, `status`, `created_at`, `updated_at`) VALUES
(3, 'thanhbvha', NULL, 'Thành Bá', 'thanhbvha@gmail.com', '0947989212', 1, 1, 1524391097, 1524391114),
(4, 'hadm', NULL, 'Dương Mạnh Hà', 'ha.duong.manh@gmail.com', '', 1, 1, 1524402073, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moet_users_activity`
--

CREATE TABLE `moet_users_activity` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text,
  `creator_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moet_users_activity`
--

INSERT INTO `moet_users_activity` (`id`, `title`, `message`, `creator_id`, `created_at`, `updated_at`) VALUES
(2, 'Create new field [11][Nhân sự]', 'Create new field [11][Nhân sự] success', 3, 1524410615, NULL),
(3, 'Create new specialize [7][Điều tra dân số]', 'Create new specialize [7][Điều tra dân số] success', 3, 1524411352, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moet_users_roles`
--

CREATE TABLE `moet_users_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moet_users_roles`
--

INSERT INTO `moet_users_roles` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Admin Role'),
(2, 'partner', 'Partner role'),
(3, 'guest', 'Public role');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `moet_fields`
--
ALTER TABLE `moet_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `moet_topics`
--
ALTER TABLE `moet_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_id` (`units_id`),
  ADD KEY `fields_id` (`fields_id`),
  ADD KEY `specialize_id` (`specialize_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `moet_units`
--
ALTER TABLE `moet_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `moet_units_specialize`
--
ALTER TABLE `moet_units_specialize`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `moet_users`
--
ALTER TABLE `moet_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `moet_users_activity`
--
ALTER TABLE `moet_users_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `moet_users_roles`
--
ALTER TABLE `moet_users_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `moet_fields`
--
ALTER TABLE `moet_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `moet_topics`
--
ALTER TABLE `moet_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `moet_units`
--
ALTER TABLE `moet_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `moet_units_specialize`
--
ALTER TABLE `moet_units_specialize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `moet_users`
--
ALTER TABLE `moet_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `moet_users_activity`
--
ALTER TABLE `moet_users_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `moet_users_roles`
--
ALTER TABLE `moet_users_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `moet_fields`
--
ALTER TABLE `moet_fields`
  ADD CONSTRAINT `moet_fields_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `moet_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moet_topics`
--
ALTER TABLE `moet_topics`
  ADD CONSTRAINT `moet_topics_ibfk_1` FOREIGN KEY (`units_id`) REFERENCES `moet_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moet_topics_ibfk_2` FOREIGN KEY (`fields_id`) REFERENCES `moet_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moet_topics_ibfk_3` FOREIGN KEY (`specialize_id`) REFERENCES `moet_units_specialize` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moet_topics_ibfk_4` FOREIGN KEY (`creator_id`) REFERENCES `moet_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moet_units`
--
ALTER TABLE `moet_units`
  ADD CONSTRAINT `moet_units_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `moet_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moet_units_specialize`
--
ALTER TABLE `moet_units_specialize`
  ADD CONSTRAINT `moet_units_specialize_ibfk_3` FOREIGN KEY (`creator_id`) REFERENCES `moet_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moet_users`
--
ALTER TABLE `moet_users`
  ADD CONSTRAINT `moet_users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `moet_users_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moet_users_activity`
--
ALTER TABLE `moet_users_activity`
  ADD CONSTRAINT `moet_users_activity_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `moet_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
