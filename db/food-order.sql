-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 11:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `system_setting`
--

CREATE TABLE `system_setting` (
  `id` int(10) NOT NULL,
  `title` varchar(150) NOT NULL,
  `logo` text NOT NULL,
  `icon_img` text NOT NULL,
  `date_time` datetime NOT NULL,
  `updateby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_setting`
--

INSERT INTO `system_setting` (`id`, `title`, `logo`, `icon_img`, `date_time`, `updateby`) VALUES
(1, 'داواکاری خواردن', 'Logo_774.jpg', 'Icon_873.jpg', '2021-04-01 19:47:07', 'rebinrafiq');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` text NOT NULL,
  `featured` varchar(20) NOT NULL,
  `active` varchar(10) NOT NULL,
  `date_time` datetime NOT NULL,
  `recycle` int(1) NOT NULL DEFAULT 0 COMMENT 'ژمارە 0 واتا نەسڕاوەتەوە\r\nژمارە ١ واتا سڕاوەتەوە',
  `addedby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `title`, `image_name`, `featured`, `active`, `date_time`, `recycle`, `addedby`) VALUES
(467, 'پیتزا', 'Food_Category_385.jpg', 'Yes', 'Yes', '2021-03-27 23:31:02', 1, 'rebinkurd74'),
(468, 'شەربەتی میوە', 'Food_Category_943.jpg', 'Yes', 'Yes', '2021-03-28 15:23:51', 1, 'rebinrafiq'),
(469, 'شەربەتی میوە', 'Food_Category_401.jpg', 'Yes', 'Yes', '2021-04-03 20:42:07', 0, 'rebinrafiq'),
(470, 'ساردەمەنی', '', 'Yes', 'Yes', '2021-04-03 20:42:36', 1, 'rebinrafiq');

-- --------------------------------------------------------

--
-- Table structure for table `tb_food`
--

CREATE TABLE `tb_food` (
  `id` int(10) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` text NOT NULL,
  `category_id` int(10) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `date_time` datetime NOT NULL,
  `recycle` int(1) NOT NULL DEFAULT 0 COMMENT 'ژمارە 0 واتا نەسڕاوەتەوە\r\nژمارە ١ واتا سڕاوەتەوە',
  `addedby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_food`
--

INSERT INTO `tb_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`, `date_time`, `recycle`, `addedby`) VALUES
(29, 'پیتزای دیلۆکسی گەورە', '', '20000', 'Food_277.jpg', 467, 'Yes', 'Yes', '2021-03-27 23:55:34', 1, 'rebinkurd74'),
(30, 'شەربەتی هەنار', '                                                                                                                                                                                                                                                               ', '2000', 'Food_769.jpg', 469, 'Yes', 'Yes', '2021-04-05 22:44:10', 0, 'rebinrafiq');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(10) NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `confirm_date` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'confirm',
  `customer_name` varchar(100) NOT NULL,
  `customer_contact` varchar(155) NOT NULL,
  `customer_email` varchar(155) NOT NULL,
  `customer_address` text NOT NULL,
  `recycle` int(1) NOT NULL DEFAULT 0 COMMENT 'ژمارە 0 واتا نەسڕاوەتەوە\r\nژمارە ١ واتا سڕاوەتەوە',
  `confirmby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `confirm_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `recycle`, `confirmby`) VALUES
(5, 'پیتزای دیلۆکسی گەورە', '20000', '12', '240000', '0000-00-00 00:00:00', '2021-03-28 22:12:23', 'confirm', 'ئەحمد محمد', '65472628', 'ahmad@gmail.com', 'چوارقوڕنە', 0, 'rebinrafiq'),
(7, 'پیتزای دیلۆکسی گەورە', '20000', '5', '100000', '2021-03-28 20:55:50', '2021-04-02 21:24:23', 'confirmed', 'ڕێبین ڕەفیق', '92876473', 'rebinkurd@gmail.com', 'قوەرتیئحۆپمژنهگدفگهژدگنئگهیبگهژددلگبفی', 0, 'rebinrafiq'),
(8, 'پیتزای دیلۆکسی گەورە', '20000', '4', '80000', '2021-03-28 22:24:26', '2021-04-02 21:24:23', 'confirmed', 'bnar jalal', '34567894792', 'rebinkurd@gmail.com', 'ranya', 0, 'rebinrafiq'),
(9, 'پیتزای دیلۆکسی گەورە', '20000', '1', '20000', '2021-04-01 19:13:14', '2021-04-02 21:24:23', 'confirmed', 'ڕێبین ڕەفیق', '92876473', 'hddhhh@gmail.com', 'mmm', 0, 'rebinrafiq'),
(10, 'پیتزای دیلۆکسی گەورە', '20000', '1', '20000', '2021-04-01 19:15:53', '2021-04-02 21:24:23', 'confirmed', 'ڕێبین ڕەفیق', '65472628', 'ahmad@gmail.com', 'nn', 0, 'rebinrafiq'),
(11, 'شەربەتی هەنار', '2000', '5', '10000', '2021-04-03 15:31:35', '0000-00-00 00:00:00', 'confirm', 'bnar jalal', '34567894792', 'hddhhh@gmail.com', 'qwertyui', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type_id` int(10) NOT NULL COMMENT '0 is admin\r\n1 is casher',
  `image_name` text NOT NULL DEFAULT 'avatar.jpg',
  `date_time` datetime NOT NULL,
  `recycle` int(1) NOT NULL DEFAULT 0 COMMENT 'ژمارە 0 واتا نەسڕاوەتەوە\r\nژمارە ١ واتا سڕاوەتەوە',
  `addedby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `full_name`, `username`, `password`, `type_id`, `image_name`, `date_time`, `recycle`, `addedby`) VALUES
(117, 'ڕێبین ڕەفیق', 'rebinrafiq', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'avatar.jpg', '2021-04-03 21:27:44', 0, 'rebinrafiq');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(10) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`) VALUES
(1, 'بەڕێوبەر'),
(2, 'کاشێر');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) NOT NULL,
  `ip` varchar(12) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `date_time`) VALUES
(25, '192.168.0.10', '2021-03-28 21:15:46'),
(31, '::1', '2021-03-28 21:15:59'),
(38, '127.0.0.1', '2021-03-28 21:33:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `system_setting`
--
ALTER TABLE `system_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_food`
--
ALTER TABLE `tb_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RelationBetweenTB_FOODAndCategory` (`category_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RelationAmongUserTypeAndUser` (`type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `system_setting`
--
ALTER TABLE `system_setting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=471;

--
-- AUTO_INCREMENT for table `tb_food`
--
ALTER TABLE `tb_food`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_food`
--
ALTER TABLE `tb_food`
  ADD CONSTRAINT `RelationBetweenTB_FOODAndCategory` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `RelationAmongUserTypeAndUser` FOREIGN KEY (`type_id`) REFERENCES `user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
