-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.0.123:3306
-- Generation Time: Jul 20, 2022 at 10:30 AM
-- Server version: 8.0.29
-- PHP Version: 8.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `list_of_products` json NOT NULL,
  `sum` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone_number`, `list_of_products`, `sum`) VALUES
(1, 'Volodymyr', 'example@gmail.com', '123456789', '[{\"name\": \"S-Rank laptop\", \"count\": 1}, {\"name\": \"B-Rank laptop\", \"count\": 3}, {\"name\": \"F-Rank laptop\", \"count\": 4}]', '1115000.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `price` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`) VALUES
(1, 'B-Rank laptop', '/git-repos/php-basic-hometasks/task_24/storage/2022-07-12_01:06:27_62cd71d300bab1.12880786.jpg', '25000.00'),
(2, 'A-Rank laptop', '/git-repos/php-basic-hometasks/task_24/storage/2022-07-12_03:20:24_62cd91389c55f1.05084465.jpg', '100000.00'),
(3, 'S-Rank laptop', '/git-repos/php-basic-hometasks/task_24/storage/2022-07-12_03:21:04_62cd916078ec24.85082575.jpg', '1000000.00'),
(4, 'F-Rank laptop', '/git-repos/php-basic-hometasks/task_24/storage/2022-07-12_03:21:28_62cd91780e2d73.12914738.jpg', '10000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
