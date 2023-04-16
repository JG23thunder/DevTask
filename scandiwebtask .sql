-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 10:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandiwebtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `created_at`) VALUES
(1, 'm0001_initial.php', '2023-02-16 09:31:15'),
(2, 'm0002_something.php', '2023-02-16 09:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` double DEFAULT NULL,
  `height` double DEFAULT NULL,
  `length` double DEFAULT NULL,
  `width` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `type`, `size`, `height`, `length`, `width`, `weight`, `created_at`) VALUES
(31, 'Terrence', 'Romeo', 23, 'book', 0, 0, 0, 0, 2, '2023-03-02 16:54:41'),
(33, 'Dlo', '3', 23, 'book', 0, 0, 0, 0, 1, '2023-03-02 16:56:03'),
(35, 'Cardi', 'B', 23, 'book', 0, 0, 0, 0, 1, '2023-03-02 16:58:22'),
(36, 'Romeo and Juliet', 'Taylow swift', 23, 'dvd', 1, 0, 0, 0, 0, '2023-03-02 17:06:17'),
(37, 'New FF', 'f', 2, 'furniture', 0, 1, 2, 2, 0, '2023-03-02 17:22:57'),
(38, 'Chair2023', 'Joanna', 23, 'dvd', 1, 0, 0, 0, 0, '2023-03-26 15:13:06'),
(43, 'New Furniture 2023', 'Chairs', 23, 'furniture', 0, 1, 2, 2, 0, '2023-03-27 15:27:10'),
(44, 'DVD203', 'DVD', 2, 'dvd', 1, 0, 0, 0, 0, '2023-03-27 15:28:15'),
(45, 'New DVD', 'New ', 23, 'dvd', 2, 0, 0, 0, 0, '2023-03-27 16:06:24'),
(46, 'DeAngelo', 'Russel', 11, 'dvd', 1, 0, 0, 0, 0, '2023-03-27 16:09:23'),
(47, 'f', 'f', 23, 'furniture', 0, 1, 2, 2, 0, '2023-03-27 16:11:44'),
(48, 'Dlog', 'wer', 1, 'dvd', 2, 0, 0, 0, 0, '2023-03-27 16:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'Jomar', 'jg23', 'jg23durant@gmail.com', 'jojo23Lebron', 0, '2023-02-16 09:31:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
