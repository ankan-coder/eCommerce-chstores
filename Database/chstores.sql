-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 08:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chstores`
--

-- --------------------------------------------------------

--
-- Table structure for table `chs_admins`
--

CREATE TABLE `chs_admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chs_admins`
--

INSERT INTO `chs_admins` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Administrator', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chs_cart`
--

CREATE TABLE `chs_cart` (
  `id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chs_orders`
--

CREATE TABLE `chs_orders` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `orderTime` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `delivered` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chs_orders`
--

INSERT INTO `chs_orders` (`id`, `cust_id`, `p_id`, `orderTime`, `address`, `delivered`) VALUES
(1, 1, 1, '21-04-2024 10:14:14 pm', 'Agartala', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chs_products`
--

CREATE TABLE `chs_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chs_products`
--

INSERT INTO `chs_products` (`id`, `product_name`, `product_price`, `product_image`, `status`) VALUES
(1, 'Moto G54', 14000, '../productImages/Galaxy S6.jpeg', 1),
(2, 'Iphone 14 pro max', 75000, '../productImages/iPhone 14 pro max.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chs_users`
--

CREATE TABLE `chs_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chs_users`
--

INSERT INTO `chs_users` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Ankan Chakraborty', 'ankang670@gmail.com', '25d19f50f784e36e0df18943358e001a', 1),
(2, 'Amit Kumar Mondol', 'amit@gmail.com', '93ddb8a4d794c52b08c2dee698580f41', 1),
(3, 'Raitri Mallick', 'raitri@gmail.com', '5d3191f964e35ac2fd7bb14937f75568', 1),
(4, 'Rohan Kumar', 'rohan@gmail.com', 'c916d142f0dc7f9389653a164f1d4e9d', 1),
(5, 'Souvik Chowdhury', 'souvik@gmail.com', '6e339344b1894b0ca8eec4a4014a39b4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chs_admins`
--
ALTER TABLE `chs_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chs_cart`
--
ALTER TABLE `chs_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chs_orders`
--
ALTER TABLE `chs_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chs_products`
--
ALTER TABLE `chs_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_image` (`product_image`);

--
-- Indexes for table `chs_users`
--
ALTER TABLE `chs_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chs_admins`
--
ALTER TABLE `chs_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chs_cart`
--
ALTER TABLE `chs_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chs_orders`
--
ALTER TABLE `chs_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chs_products`
--
ALTER TABLE `chs_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chs_users`
--
ALTER TABLE `chs_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
