-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2022 at 06:53 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16656045_china`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(30) NOT NULL,
  `state` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `state`) VALUES
(1, '第五组', 1),
(11, 'testing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `ip` int(30) NOT NULL,
  `os` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `result` varchar(20) NOT NULL,
  `ip_1` varchar(100) NOT NULL,
  `maker` varchar(40) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `info_group` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`ip`, `os`, `date`, `result`, `ip_1`, `maker`, `state`, `info_group`) VALUES
(117, ' Android 8.1.0', '2022-09-04 04:13:01.759046', '韩永胜', '103.217.158.195, 103.217.158.195', '明先丽', 0, 1),
(187, '', '2022-09-07 20:53:12.000000', 'aung aung', '12', 'min thiha', 1, 11),
(188, ' Win64', '2022-09-06 14:25:20.232186', 'Paing Chan', '117.55.252.206, 117.55.252.206', 'aung aung', 1, 11),
(189, ' Win64', '2022-09-06 14:25:36.891647', 'min thiha', '117.55.252.206, 117.55.252.206', 'Paing Chan', 1, 11),
(190, ' Android 10', '2022-09-06 17:01:50.325956', 'aung aung', '117.55.252.242, 117.55.252.242', 'min thiha', 1, 11),
(191, ' Android 10', '2022-09-06 17:02:18.918800', 'Paing Chan', '117.55.252.242, 117.55.252.242', 'aung aung', 1, 11),
(192, ' Android 10', '2022-09-06 17:03:21.677945', 'aung aung', '117.55.252.242, 117.55.252.242', 'Paing Chan', 1, 11),
(193, ' Android 10', '2022-09-06 17:03:55.012675', 'Paing Chan', '117.55.252.242, 117.55.252.242', 'aung aung', 1, 11),
(194, ' Win64', '2022-09-09 03:23:50.388752', 'min thiha', '117.55.252.160, 117.55.252.160', 'Paing Chan', 1, 11),
(195, ' Win64', '2022-09-09 03:25:22.889141', 'aung aung', '117.55.252.160, 117.55.252.160', 'min thiha', 1, 11),
(196, ' Win64', '2022-09-09 03:25:58.257021', 'Paing Chan', '117.55.252.160, 117.55.252.160', 'aung aung', 1, 11),
(197, ' Win64', '2022-09-09 03:26:36.328250', 'min thiha', '117.55.252.160, 117.55.252.160', 'Paing Chan', 1, 11),
(198, ' Android 10', '2022-09-14 02:55:53.910905', '潘家长', '117.55.252.180, 117.55.252.180', '韩永胜', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `image` varchar(40) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `click_state` tinyint(4) NOT NULL,
  `user_group` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `image`, `state`, `click_state`, `user_group`) VALUES
(2, '涂正刚', '1.jpg', 1, 1, 1),
(3, '潘家长', '2.jpg', 1, 0, 1),
(5, '明先丽', '3.jpg', 1, 0, 1),
(8, '路军套', '4.jpg', 1, 0, 1),
(10, '韩永胜', '5.jpg', 1, 1, 1),
(11, 'Paing Chan', 'c6c70f0e74bf20014829cf16197469ba.jpg', 1, 1, 11),
(12, 'aung aung', '186.jpg', 1, 1, 11),
(13, 'min thiha', 'r101800.jpg', 1, 1, 11),
(14, 'paingchan', 'Modern Letter S Logo.png', 1, 1, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`ip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `ip` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
