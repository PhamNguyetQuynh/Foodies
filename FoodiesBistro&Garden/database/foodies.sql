-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2023 at 05:54 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodies`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_qty` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `product_qty`, `created_at`) VALUES
(29, 5, 11, 1, '2023-11-21 09:22:02'),
(7, 6, 11, 2, '2023-11-19 18:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_qty` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wishlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `popular` tinyint NOT NULL DEFAULT '0',
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(9, 'Main', 'main', 'for your empty stomach', 0, 1, '1700366305.jpg', 'drooling', 'perfect', 'smell good', '2023-11-19 03:58:25'),
(10, 'Side Dishes', 'side dishes', 'finger food, etc.', 0, 1, '1700366358.jpg', 'for chit chat', 'for a date', 'small talk', '2023-11-19 03:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `total_price` int NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `comments` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(2, 'LnSc5PFy0z6CEIXWPM97', 5, 'nina', 'nina@gmail.com', '0989598xxx', 'UIT', 125000, 'COD', '', 1, '', '2023-11-21 00:57:41'),
(3, 'AsnQWpwOVOkzuKy6TTe0', 5, 'nina', 'nina@gmail.com', '0989598xxx', 'UIT', 250000, 'COD', '', 2, '', '2023-11-21 01:24:49'),
(13, 'v9cof5HvbqGpuBcOzgQU', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'Trụ sở khu phố 4, khu phố 4, phường 1, thị xã Cai Lậy, tỉnh Tiền Giang.', 250000, 'COD', '', 0, '', '2023-11-21 03:49:36'),
(14, 'CYfoZvYmP9xDcrjl3yHI', 5, 'charles', 'charles@gmail.com', '99999', 'seattle', 125000, 'COD', '', 0, '', '2023-11-21 09:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`) VALUES
(2, 2, 0, 1, 0, '2023-11-21 00:57:41'),
(3, 3, 0, 2, 0, '2023-11-21 01:24:49'),
(10, 14, 11, 1, 125000, '2023-11-21 09:18:21'),
(9, 13, 11, 2, 125000, '2023-11-21 03:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int NOT NULL,
  `selling_price` int NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int NOT NULL,
  `status` tinyint NOT NULL,
  `trending` tinyint NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(12, 10, 'Glazed Carrot', 'glazed carrot', 'carrot', 'carrot', 10000, 80000, '1700561237.jpg', 10, 0, 0, 'carrot grilled but raw', 'carrot grilled olive oil', 'carrot grilled', '2023-11-21 10:07:17'),
(11, 9, 'Mushroom Bolognese Spaghetti', 'mushroom bolognese spaghetti', 'ngon', 'my', 80000, 125000, '1700371165.jpg', 17, 0, 1, 'ngon', 'ngon', 'ngon', '2023-11-19 05:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(5, 'nina', 'nina@gmail.com', 123, '123', 0, '2023-11-15 15:28:58'),
(6, 'admin', 'admin@gmail.com', 2222222, '123', 1, '2023-11-16 13:44:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
