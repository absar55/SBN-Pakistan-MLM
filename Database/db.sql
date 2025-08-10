-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: serverxyz
-- Generation Time: Jul 31, 2023 at 12:34 AM
-- Server version: 10.4.30-MariaDB-log
-- PHP Version: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phone` text NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp(),
  `address` text NOT NULL,
  `balance` bigint(100) UNSIGNED DEFAULT 0,
  `total_earned` bigint(100) UNSIGNED NOT NULL DEFAULT 0,
  `left_team` int(10) UNSIGNED NOT NULL,
  `right_team` int(10) UNSIGNED NOT NULL,
  `leg` varchar(60) NOT NULL,
  `sponsor_id` varchar(60) NOT NULL,
  `parent_id` varchar(60) DEFAULT NULL,
  `left_id` varchar(60) DEFAULT NULL,
  `right_id` varchar(60) DEFAULT NULL,
  `left_counter` int(11) NOT NULL,
  `right_counter` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `reward_pkr` bigint(100) UNSIGNED NOT NULL DEFAULT 0,
  `pre_rank` varchar(60) NOT NULL DEFAULT 'Beginner',
  `rank` varchar(60) NOT NULL DEFAULT 'Beginner',
  `block` tinyint(1) NOT NULL DEFAULT 0,
  `role` varchar(50) NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `name`, `phone`, `dob`, `address`, `balance`, `total_earned`, `left_team`, `right_team`, `leg`, `sponsor_id`, `parent_id`, `left_id`, `right_id`, `left_counter`, `right_counter`, `level`, `reward_pkr`, `pre_rank`, `rank`, `block`, `role`) VALUES
(1, 'admin@sbnpakistan.com', 'Umar7856786', 'Umar Farooq', '035699381786', '2023-06-12', 'cc', NULL, 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 'Beginner', '', 0, 'admin'),
(2, 'xyzabc@gmail.com', 'Umar786786', 'Umar farooq', '032996456381786', '2023-07-18', 'ff', NULL, 0, 0, 0, '', '', NULL, NULL, NULL, 0, 0, 0, 0, 'Beginner', 'Beginner', 0, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `tid` int(50) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `account_title` varchar(50) NOT NULL,
  `wallet` varchar(50) NOT NULL,
  `account_number` varchar(90) NOT NULL,
  `amount` int(50) UNSIGNED NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pending',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `direct`
--

CREATE TABLE `direct` (
  `id` int(70) UNSIGNED NOT NULL,
  `new_email` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `leg` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `direct`
--

INSERT INTO `direct` (`id`, `new_email`, `email`, `leg`, `date`) VALUES
(128, 'eee@gmail.com', 'xyzabc@gmail.com', 'left', '2023-07-30'),
(129, 'fff@gmail.com', 'xyzabc@gmail.com', 'left', '2023-07-30'),
(130, 'ggg@gmail.com', 'xyzabc@gmail.com', 'left', '2023-07-31'),
(131, 'ggg@gmail.com', 'xyzabc@gmail.com', 'left', '2023-07-31'),
(132, 'ggg@gmail.com', 'xyzabc@gmail.com', 'left', '2023-07-31'),
(133, 'ggg@gmail.com', 'xyzabc@gmail.com', 'left', '2023-07-31'),
(134, 'hhh@gmail.com', 'xyzabc@gmail.com', 'left', '2023-07-31'),
(135, 'iii@gmail.com', 'xyzabc@gmail.com', 'left', '2023-07-31'),
(136, 'jjj@gmail.com', 'xyzabc@gmail.com', 'left', '2023-07-31'),
(137, 'kkk@gmail.com', 'xyzabc@gmail.com', 'left', '2023-07-31'),
(138, 'lll@gmail.com', 'xyzabc@gmail.com', 'left', '2023-07-31'),
(139, 'xxx@gmail.com', 'hhh@gmail.com', 'left', '2023-07-31'),
(140, 'yyy@gmail.com', 'hhh@gmail.com', 'left', '2023-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `indirect`
--

CREATE TABLE `indirect` (
  `id` int(160) NOT NULL,
  `new_email` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `leg` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_account_requests`
--

CREATE TABLE `new_account_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phone` text NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp(),
  `address` longtext NOT NULL,
  `wallet` varchar(60) NOT NULL,
  `receiver_number` text NOT NULL,
  `tx_id` text NOT NULL,
  `sponsor_email` varchar(60) NOT NULL,
  `leg` varchar(70) NOT NULL,
  `br` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `price` int(60) UNSIGNED NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `image`) VALUES
(1, 'Fabric Dress 1', 10000, './products/dress1.jpg'),
(2, 'Fabric Dress 2', 10000, './products/dress2.jpg'),
(4, 'Dress 3', 10000, './products/dress3.jpg'),
(5, 'Dress 4', 10000, './products/dress4.jpg'),
(6, 'Dress 5', 10000, './products/dress5.jpg'),
(7, 'Dress 6', 10000, './products/dress6.jpg'),
(8, 'Dress 7', 10000, './products/dress7.jpg'),
(9, 'Dress 8', 1000, './products/dress8.jpg'),
(10, 'Dress 9', 10000, './products/dress9.jpg'),
(11, 'Dress 10', 10000, './products/dress10.jpg'),
(12, 'Dress 11', 10000, './products/dress11.jpg'),
(13, 'Cushions Full Set ', 2000, './products/cushions.jpg'),
(14, 'Natural Honey', 4500, './products/honey.jpg'),
(15, 'Lahori Paranda', 1000, './products/paranda.jpg'),
(16, 'Chapati Plate', 2000, './products/plate.jpg'),
(17, 'Souvenir', 2000, './products/souvenirs.jpg'),
(18, 'Black Watch', 5000, './products/watch1.jpg'),
(19, 'Watch 2', 4500, './products/watch2.jpg'),
(20, 'Watch 3', 4500, './products/watch3.jpg'),
(21, 'Watch 4', 5000, './products/watch4.jpg'),
(22, 'Watch 5', 5000, './products/watch5.jpg'),
(23, 'Watch 6', 4500, './products/watch6.jpg'),
(24, 'Watch 7', 4500, './products/watch7.jpg'),
(25, 'Watch 8', 4500, './products/watch8.jpg'),
(26, 'Watch 9', 6500, './products/watch9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `pid` int(10) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `name` varchar(70) NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `price` int(60) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(40) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statement`
--

CREATE TABLE `statement` (
  `tid` int(10) UNSIGNED NOT NULL,
  `email` varchar(70) NOT NULL,
  `reason` varchar(70) NOT NULL,
  `way` varchar(50) NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `direct`
--
ALTER TABLE `direct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indirect`
--
ALTER TABLE `indirect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_account_requests`
--
ALTER TABLE `new_account_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `statement`
--
ALTER TABLE `statement`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `tid` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `direct`
--
ALTER TABLE `direct`
  MODIFY `id` int(70) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `indirect`
--
ALTER TABLE `indirect`
  MODIFY `id` int(160) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6628304;

--
-- AUTO_INCREMENT for table `new_account_requests`
--
ALTER TABLE `new_account_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `pid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `statement`
--
ALTER TABLE `statement`
  MODIFY `tid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
