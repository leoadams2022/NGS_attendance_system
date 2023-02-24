-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 12:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user-registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `recipient` varchar(255) DEFAULT NULL,
  `campaign` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'no',
  `msg` varchar(1000) NOT NULL,
  `auther` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_send` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `recipient`, `campaign`, `status`, `msg`, `auther`, `created_at`, `date_send`) VALUES
(99, 'leoUS', NULL, 'yes', 'hi there leo', 'walid888', '2023-02-23 19:56:29', '2023-02-23 19:56:29'),
(100, 'leoUS', NULL, 'no', 'how are you donig jhgjh', 'walid888', '2023-02-24 21:25:54', '2023-02-23 19:56:43'),
(101, 'broUS', NULL, 'no', 'hgjhgj', 'walid888', '2023-02-24 21:26:23', '2023-02-24 21:26:23'),
(102, NULL, 'test', 'yes', 'hgjhgj', 'walid888', '2023-02-24 21:26:40', '2023-02-24 21:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `day_date` date NOT NULL,
  `is_it_over` varchar(100) NOT NULL,
  `time_in` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_name`, `user_id`, `day_date`, `is_it_over`, `time_in`, `time_out`, `created_at`) VALUES
(75, 'testUS', 13, '2023-02-23', 'yes', '2023-02-23 00:53:30', '2023-02-23 00:53:30', '2023-02-23 00:53:30'),
(76, 'testUS', 13, '2023-02-22', 'yes', '2023-02-22 00:53:30', '2023-02-22 00:53:30', '2023-02-22 00:53:30'),
(77, 'testUS', 13, '2023-02-21', 'yes', '2023-02-21 00:53:30', '2023-02-21 07:53:30', '2023-02-21 00:53:30'),
(78, 'testUS', 13, '2023-02-20', 'yes', '2023-02-20 00:53:30', '2023-02-20 05:00:00', '2023-02-20 00:53:30'),
(79, 'testUS', 13, '2023-02-19', 'yes', '2023-02-19 00:53:30', '2023-02-19 05:53:30', '2023-02-19 00:53:30'),
(80, 'testUS', 13, '2023-02-18', 'yes', '2023-02-18 00:53:30', '2023-02-18 04:00:00', '2023-02-18 00:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `campaign` varchar(255) DEFAULT 'NOT_SET',
  `rank` varchar(100) NOT NULL DEFAULT 'agint',
  `education` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `target` int(255) DEFAULT '0',
  `salary` int(255) DEFAULT '0',
  `dedication` int(255) DEFAULT '0',
  `enter_time` datetime DEFAULT NULL,
  `leave_time` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `user_name`, `gender`, `phone`, `address`, `password`, `campaign`, `rank`, `education`, `experience`, `target`, `salary`, `dedication`, `enter_time`, `leave_time`, `created_at`) VALUES
(9, 'leo', 'adams', 'leo@leo.leo', 'leoUS', 'male', '0941535901', 'shams', '$2y$10$Aq7MH71DAYxLFuDDT0GtmellgeTVp2xpon8wYrHi7L/vLiqd3Ff86', 'ngs', 'admin', 'my eduee', 'my exp', 12, 2000, 500, NULL, NULL, '2023-02-07 20:00:01'),
(11, 'walid', 'ali', 'walid@g.com', 'walid888', 'male', '0941535901', 'damscusssddd', '$2y$10$XQhPxro4Dw9fapMSapGq5.evUbxzO5dwK6Sj2zwDq4y12zExUYO/e', 'NOT_SET', 'admin', '???', 'wddqq', 11, 11, 500, NULL, NULL, '2023-02-07 22:51:11'),
(12, 'walid', 'ali', 'w@w.w', 'walidali', 'male', '1234567890', 'kkk', '$2y$10$9UuYeXGkjWbMUZjhPQsaXOQtoMgE4.otHdUbUbq0IbdziJlToP872', 'tort', 'agint', NULL, NULL, 5, 0, 0, NULL, NULL, '2023-02-13 19:19:13'),
(13, 'test', 'test', 'test@t.c', 'testUS', 'male', '123467890', 'llll', '$2y$10$UudDlOBBk.Ik.enDLCSEqePE9gDp13pG485An7xblMQvhFlQAGN9S', 'test', 'agint', 's', 's', 5, 5000, 100, '2023-01-01 18:00:00', '2023-01-01 05:00:00', '2023-02-15 01:18:19'),
(14, 'mark', 'adams', 'm@m.m', 'markUS', 'female', '1234678', 'ddd', '$2y$10$vtgWKs02aLSHf3HsxKpHguWYB6KX7CP6TrNT5orzZuhsP2mYw5uXW', 'NOT_SET', 'agint', 'ssdd', 's', 4, 0, 0, '2023-01-01 00:00:00', '2023-01-01 00:00:00', '2023-02-15 22:48:17'),
(15, 'frank', 'f', 'f@f.f', 'frank', 'female', '123456', 'ssss', '$2y$10$pOiYrAitMu0g1f6.S.seFeaPUuI5fkRsxJ5PX/t2XNIpqQ1fjUn82', 'NOT_SET', 'agint', 'dddd', 'ffffff', 2, 0, 0, '2023-01-01 02:00:00', '2023-01-01 02:00:00', '2023-02-17 22:03:45'),
(17, 'bro', 'bro', 'b@b.b', 'broUS', 'male', '123456', '1xxx', '$2y$10$1nScZmLODg7/JZR58lyovuJGGRFhi3TzWcDN7mklYiBM9OWKqkJjy', 'NOT_SET', 'agint', NULL, NULL, 1, 5000, 0, '2023-01-01 02:00:00', '2023-01-01 02:00:00', '2023-02-17 22:14:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
