-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2023 at 04:33 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `product_qty`, `created_at`) VALUES
(72, 10, 11, 1, '2023-12-12 17:38:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(11, 'Sweet', 'sweet', 'sweet', 0, 0, '1701180581.jpg', 'cake', 'cake, ice cream', 'ice cream', '2023-11-28 14:09:41'),
(9, 'Main', 'main', 'for your empty stomach growlingg', 0, 1, '1700366305.jpg', 'drooling', 'perfect', 'smell good', '2023-11-19 03:58:25'),
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
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(2, 'LnSc5PFy0z6CEIXWPM97', 5, 'nina', 'nina@gmail.com', '0989598xxx', 'UIT', 125000, 'COD', '', 1, '', '2023-11-21 00:57:41'),
(3, 'AsnQWpwOVOkzuKy6TTe0', 5, 'nina', 'nina@gmail.com', '0989598xxx', 'UIT', 250000, 'COD', '', 2, '', '2023-11-21 01:24:49'),
(13, 'v9cof5HvbqGpuBcOzgQU', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'Trụ sở khu phố 4, khu phố 4, phường 1, thị xã Cai Lậy, tỉnh Tiền Giang.', 250000, 'COD', '', 0, '', '2023-11-21 03:49:36'),
(14, 'CYfoZvYmP9xDcrjl3yHI', 5, 'charles', 'charles@gmail.com', '99999', 'seattle', 125000, 'COD', '', 0, '', '2023-11-21 09:18:21'),
(15, 'HGxlO9dgDAYj0fEHH0au', 5, 'jaz', 'jaz@gmail.com', '7888888', 'Scotland', 125000, 'COD', '', 0, '', '2023-11-23 09:20:10'),
(16, 'KzSSKdxsu6UcFierTbsA', 6, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', '69 Tan Lap, Dong Hoa', 250000, 'Paid by PayPal', '87Y20656Y9264770V', 0, '', '2023-11-26 04:27:06'),
(17, 'NbYuMBjFSmUjNiskHFM2', 6, 'chris', 'chris@gmail.com', '7777777', 'beijing', 125000, 'Paid by PayPal', '0GR8198039108532B', 0, '', '2023-11-26 04:32:04'),
(18, 'pVoKgxc3za7cbncCbVSn', 6, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'Trụ sở khu phố 4, khu phố 4, phường 1, thị xã Cai Lậy, tỉnh Tiền Giang.', 365000, 'COD', '', 0, '', '2023-11-28 17:00:03'),
(19, 'GjyhqXzARRcs5Eusg2BC', 6, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', '69 Tan Lap, Dong Hoa', 0, 'COD', '', 0, '', '2023-11-28 17:04:14'),
(20, 'r9kuRlCuw0o1Iy3VVAJz', 6, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', '69 Tan Lap, Dong Hoa', 0, 'COD', '', 0, 'efss', '2023-11-28 17:04:35'),
(21, 'apJJYsmzFODXzJxeJZ3y', 6, 'sgg', 'rgr@gmail.com', '7777', 'ggg', 125000, 'Paid by PayPal', '63H30087NR4139948', 0, 'dgsg', '2023-11-28 17:08:37'),
(22, 'NV8dqDTbpPcEb1Y3lR16', 6, 'sggff', 'rgr@gmail.com', '7777', 'gggfe', 0, 'Paid by PayPal', '28R210167N341904R', 0, 'dgsgeee', '2023-11-28 17:10:25'),
(23, 'XvTl8dHpmVLPyhcTHhiN', 6, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'tỉnh Tiền Giang.', 125000, 'COD', '', 0, 'hhth', '2023-11-28 17:13:14'),
(24, 'z4y2ovj8yCh1d6Sbvvvc', 6, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', 'BD', 30000, 'Paid by PayPal', '71S25422N99056410', 0, 'wrwrwr', '2023-11-28 17:18:33'),
(25, 'uqX95fpT6gEoJ5fo2UGd', 6, 't', 'tui@gmail.com', '777', 'eeee', 80000, 'Paid by PayPal', '24C42423T77263248', 0, '', '2023-11-28 17:19:07'),
(26, 'wUqdLZ6Y4V5CckxYr6eE', 6, 'Trái cây', 'tui@gmail.com', '8888', 'rrrrr', 125000, 'Paid by PayPal', '2MU34742LS025993S', 0, 'rrrr', '2023-11-28 17:21:21'),
(27, 'EbkzbKFhB7NpNP96fI1b', 6, 'tr', 'tui@gmail.com', 'er', 'ttt', 125000, 'Paid by PayPal', '5T247586G2876925N', 0, 'tttt', '2023-11-28 17:27:21'),
(28, '0X3NC0603YJyKuWuThIL', 6, 'test paypal', 're@gmail.com', 're', 'fee', 125000, 'Paid by PayPal', '40V78349GU251735Y', 0, 'efef', '2023-11-28 17:29:33'),
(29, 'yPKaPl6mOmAWanfhGyVr', 6, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'Trụ sở khu phố 4, khu phố 4, phường 1, thị xã Cai Lậy, tỉnh Tiền Giang.', 125000, 'Paid by PayPal', '7NX20083RY152571F', 0, 'test paypal', '2023-11-28 17:30:01'),
(30, 'kva5fWrCNSMVMTSfTy7Z', 6, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'payapl', 80000, 'Paid by PayPal', '8MY21142P5803261S', 0, '', '2023-11-28 17:33:45'),
(31, 'ZdiD6H8znyphOa9RIulR', 6, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'payapl', 0, 'Paid by PayPal', '6XW608905U490084B', 0, '', '2023-11-28 17:34:41'),
(32, 'glp3hLtI9yv01XEZMcw0', 5, 'nina', 'nina@gmail.com', '99999', 'tes paypal w cmt', 250000, 'Paid by PayPal', '9E539660M9977594H', 0, 'tes paypal w cmt', '2023-11-28 17:35:56'),
(33, 'VRkE9oFaG9da7BNb85XY', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'test pp', 80000, 'Paid by PayPal', '9F234607AG810535K', 0, 'pp', '2023-11-28 17:38:42'),
(34, 'zcbTAUq4G5VcQpsB9aet', 5, 'Nina', 'nina@gmail.com', '999', 'ppppp', 30000, 'Paid by PayPal', '8NG364085W3358218', 0, 'ppppp', '2023-11-28 17:40:33'),
(35, '2ndf6OZwyg1rf0sYxMiY', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'sao khong work', 50000, 'Paid by PayPal', '3L187987V2494771X', 0, '', '2023-11-28 17:52:05'),
(36, 'e2dwSdkmGh7gdrs51Dnf', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'work i maf', 30000, 'Paid by PayPal', '22083190RS516782P', 0, '', '2023-11-28 17:53:41'),
(37, 'zYX042RrOJWoRjMzPC0C', 5, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', 'ua bi sao da :(', 80000, 'COD', '', 0, '', '2023-11-28 17:54:27'),
(38, '1oheJHcB2kM0zau7HPbR', 5, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', 'tai sao vay', 80000, 'Paid by PayPal', '49359128UY142991E', 0, '', '2023-11-28 17:54:58'),
(39, 'z6H7v5QOt52FH7jSeivE', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'phai duoc nha', 80000, 'Paid by PayPal', '7J416680YY059172W', 0, '', '2023-11-28 17:57:21'),
(40, 'UMH1gL7YEsByR1kzmmDN', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'phai duoc nha', 0, 'COD', '', 0, '', '2023-11-28 17:57:24'),
(41, 'OuoqSTH12kIfG8VXn1P0', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'duoc i ma', 50000, 'Paid by PayPal', '4R6954729C313691H', 0, '', '2023-11-28 18:02:02'),
(42, 'bDGpYtCQxzHPtmCiO01H', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'maaaaaa', 30000, 'Paid by PayPal', '88U907189D906623W', 0, '', '2023-11-28 18:05:43'),
(43, '9iGZdnGYXqUDCrkRDXD4', 5, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', 'oiiiii', 30000, 'Paid by PayPal', '30F36777D9516813Y', 0, '', '2023-11-28 18:12:24'),
(44, 'x7K3zybjxXyWsuTWrjEv', 5, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', 'cha la duoc roi do', 30000, 'Paid by PayPal', '71S80837DW3223609', 0, '', '2023-11-28 18:13:54'),
(45, 'TUZFW5Hh2ezMjYgpyW2d', 5, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', 'lan cui cunggg', 30000, 'Paid by PayPal', '6GA38999NB099213D', 0, '', '2023-11-28 18:16:45'),
(46, 'ceIN3FTC2hiBTK1ppCnY', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'maaaaaaa', 30000, 'Paid by PayPal', '2AB33272X4715640F', 0, '', '2023-11-28 18:21:27'),
(47, 'CLKt5Q6d1vXpGvZepkbC', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'ki', 50000, 'Paid by PayPal', '7LN01668E97220935', 0, '', '2023-11-28 18:25:08'),
(48, '8xiuz08ewVTpcfaTAXXd', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'Trụ sở khu phố 4, khu phố 4, phường 1, thị xã Cai Lậy, tỉnh Tiền Giang.', 50000, 'Paid by PayPal', '7FK99226KJ7042450', 1, '', '2023-11-28 18:31:13'),
(49, 'tntoOz5O3ihotAsM8nl9', 5, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', '69 Tan Lap, Dong Hoa', 125000, 'Paid by PayPal', '6N430425H98098404', 0, 'should be', '2023-11-28 18:37:06'),
(50, 'mLgBjufg1udox6393S23', 6, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', '69 Tan Lap, Dong Hoa', 125000, 'MOMO', '', 0, 'momo test', '2023-12-06 20:50:47'),
(51, 'EXsdT3TLzcscAZvt12wN', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'Trụ sở khu phố 4, khu phố 4, phường 1, thị xã Cai Lậy, tỉnh Tiền Giang.', 80000, 'MOMO', '', 0, 'test momo atm', '2023-12-07 17:02:52'),
(52, 'ifKj87Chybl3H7dSVz9V', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'Trụ sở khu phố 4, khu phố 4, phường 1, thị xã Cai Lậy, tỉnh Tiền Giang.', 125000, 'MOMO', '', 0, 'test momo atm', '2023-12-07 17:03:41'),
(53, 'pn9fc7b3KvMTzAoj492x', 6, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'Trụ sở khu phố 4, khu phố 4, phường 1, thị xã Cai Lậy, tỉnh Tiền Giang.', 125000, 'MOMO', '', 0, 'test momo atm', '2023-12-09 09:53:55'),
(54, 'wJ0z6HBpjP2U1GEJ9QA4', 6, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'Trụ sở khu phố 4, khu phố 4, phường 1, thị xã Cai Lậy, tỉnh Tiền Giang.', 125000, 'MOMO', '', 0, 'tets momoo', '2023-12-09 10:04:02'),
(55, 'vXyt2CjpTOmI5HKQIumS', 6, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'Trụ sở khu phố 4, khu phố 4, phường 1, thị xã Cai Lậy, tỉnh Tiền Giang.', 0, 'MOMO', '', 0, 'tets momoo', '2023-12-09 10:07:20'),
(56, 'vQnqdwmaRqBwmxrnPyZh', 6, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', '69 Tan Lap, Dong Hoa', 125000, 'MOMO', '', 0, 'momo etm', '2023-12-09 10:07:40'),
(57, 'N2olOEhUcmvzhjid0N05', 5, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'Trụ sở khu phố 4, khu phố 4, phường 1, thị xã Cai Lậy, tỉnh Tiền Giang.', 125000, 'MOMO', '', 0, 'test momoatm', '2023-12-10 02:16:27'),
(58, 'euP2lxvKI7S8NDBXzhLQ', 10, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'District Binh Thanh', 30000, 'COD', '', 0, 'test location', '2023-12-11 13:14:12'),
(59, '2yF7NrreZ2Yf0qhQgRpB', 11, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', 'Trụ sở khu phố 4, khu phố 4, phường 1, thị xã Cai Lậy, tỉnh Tiền Giang.', 125000, 'COD', '', 0, 'moo', '2023-12-12 08:07:07'),
(60, 'rAhSKbuDmYBT4ySkL1pR', 6, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ' 111,  111, Ward An Lac, District Binh Tan', 125000, 'COD', '', 0, '111', '2023-12-14 18:09:57'),
(61, 'HT6KWrbgNuMxmEsxQd48', 16, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ' ,  , Ward 1, District Tan Binh', 205000, 'MOMO', '', 0, 'momo dev', '2023-12-15 15:00:22'),
(62, 'FZOR3w9t8rw9q9l5iSyc', 16, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', ' ,  , Ward An Lac, District Binh Tan', 125000, 'MOMO', '', 0, '', '2023-12-15 15:08:23'),
(63, 'ywZtYUzneFWwNHwC0FJB', 16, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ' ,  , Ward An Lac, District Binh Tan', 80000, 'MOMO', '', 0, '', '2023-12-15 15:10:41'),
(64, 'UNqxPoJEUg5rfnYgDPVS', 16, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ' ,  , Ward 1, District Binh Thanh', 80000, 'MOMO', '', 0, '', '2023-12-15 15:11:15'),
(65, 'NNtet3GPQq5nDEZz31tG', 16, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', ' ,  , Ward Binh Chieu, District Thu Duc', 125000, 'MOMO', '', 0, '', '2023-12-15 15:14:49'),
(66, 'SBOyOlryEmEHQet53lFG', 16, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ' ,  , Ward Tan Thuan Dong, District 7', 80000, 'MOMO', '', 0, '', '2023-12-15 15:21:56'),
(67, 'O7VGHNrgAbN6tSgkdB6Z', 16, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ' 111,  111, Ward Tan Tao A, District Binh Tan', 125000, 'MOMO', '', 0, '', '2023-12-15 15:31:19'),
(68, 'cntxEjGGTLAQjpnlc8hM', 16, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ' 111,  , Ward Long Truong, District 9', 30000, 'COD', '', 0, '', '2023-12-15 15:34:51'),
(69, 'yQtPb1jbbzpv8pGVQgSw', 16, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ' 111,  , Ward Thoi An, District 12', 0, 'COD', '', 0, '', '2023-12-15 15:35:45'),
(70, 'awv4ie9FyLUJ6TeR1c8i', 16, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ' 111,  111, Ward Thanh Loc, District 12', 0, 'COD', '', 0, '', '2023-12-15 15:43:03'),
(71, '6JVGUsAIweQCHt5XVPEh', 16, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ', , , ', 0, 'Paid by PayPal', '48551961U77698145', 0, '', '2023-12-15 15:48:01'),
(72, 'eD3LQgKgHCN913TLBiSD', 16, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', ', , , ', 0, 'Paid by PayPal', '7JG540240G283115Y', 0, '', '2023-12-15 15:53:57'),
(73, 'eDBVzX5zrZtrGQS36fRj', 16, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', ', , , ', 0, 'Paid by PayPal', '7MG976150F575511M', 0, '', '2023-12-15 15:54:14'),
(74, 'dOMr6G5R9opcM0dXIQ9o', 16, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', ', , , ', 80000, 'Paid by PayPal', '88E57668AF5116910', 0, '', '2023-12-15 15:54:46'),
(75, '89w6GqDGUZn5kbNlSrOh', 16, 'Quynh Pham', 'phamnguyetquynh0307@gmail.com', '0989598472', ', , , ', 125000, 'Paid by PayPal', '45T99851TN3920932', 0, '', '2023-12-15 15:57:33'),
(76, 'FAlRkOSib0zTkhWVS1C2', 16, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ' 2222,  2222, Ward Thanh Xuan, District 12', 125000, 'COD', '', 0, '', '2023-12-15 16:02:05'),
(77, 'sBIkJw9pPvJ89mx3nFlR', 16, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ', , , ', 125000, 'Paid by PayPal', '7CW08722KM549882D', 0, '', '2023-12-15 16:02:41'),
(78, 'w88KLVPsLH7G19i8c6b1', 16, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', '0989598472', ', , , ', 30000, 'Paid by PayPal', '5JL27329NC284425S', 0, '', '2023-12-15 16:05:35');

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
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`) VALUES
(13, 17, 11, 1, 125000, '2023-11-26 04:32:04'),
(2, 2, 0, 1, 0, '2023-11-21 00:57:41'),
(3, 3, 0, 2, 0, '2023-11-21 01:24:49'),
(12, 16, 11, 2, 125000, '2023-11-26 04:27:06'),
(11, 15, 11, 1, 125000, '2023-11-23 09:20:10'),
(10, 14, 11, 1, 125000, '2023-11-21 09:18:21'),
(9, 13, 11, 2, 125000, '2023-11-21 03:49:36'),
(14, 18, 15, 1, 30000, '2023-11-28 17:00:03'),
(15, 18, 14, 1, 50000, '2023-11-28 17:00:03'),
(16, 18, 12, 2, 80000, '2023-11-28 17:00:03'),
(17, 18, 11, 1, 125000, '2023-11-28 17:00:03'),
(18, 21, 11, 1, 125000, '2023-11-28 17:08:37'),
(19, 23, 11, 1, 125000, '2023-11-28 17:13:14'),
(20, 24, 15, 1, 30000, '2023-11-28 17:18:33'),
(21, 25, 12, 1, 80000, '2023-11-28 17:19:07'),
(22, 26, 11, 1, 125000, '2023-11-28 17:21:21'),
(23, 27, 11, 1, 125000, '2023-11-28 17:27:21'),
(24, 28, 11, 1, 125000, '2023-11-28 17:29:33'),
(25, 29, 11, 1, 125000, '2023-11-28 17:30:01'),
(26, 30, 12, 1, 80000, '2023-11-28 17:33:45'),
(27, 32, 11, 2, 125000, '2023-11-28 17:35:56'),
(28, 33, 12, 1, 80000, '2023-11-28 17:38:42'),
(29, 34, 15, 1, 30000, '2023-11-28 17:40:33'),
(30, 35, 14, 1, 50000, '2023-11-28 17:52:05'),
(31, 36, 15, 1, 30000, '2023-11-28 17:53:41'),
(32, 37, 12, 1, 80000, '2023-11-28 17:54:27'),
(33, 38, 12, 1, 80000, '2023-11-28 17:54:58'),
(34, 39, 12, 1, 80000, '2023-11-28 17:57:21'),
(35, 41, 14, 1, 50000, '2023-11-28 18:02:02'),
(36, 42, 15, 1, 30000, '2023-11-28 18:05:43'),
(37, 43, 15, 1, 30000, '2023-11-28 18:12:24'),
(38, 44, 15, 1, 30000, '2023-11-28 18:13:54'),
(39, 45, 15, 1, 30000, '2023-11-28 18:16:45'),
(40, 46, 15, 1, 30000, '2023-11-28 18:21:27'),
(41, 47, 14, 1, 50000, '2023-11-28 18:25:08'),
(42, 48, 14, 1, 50000, '2023-11-28 18:31:13'),
(43, 49, 11, 1, 125000, '2023-11-28 18:37:06'),
(44, 50, 11, 1, 125000, '2023-12-06 20:50:47'),
(45, 51, 12, 1, 80000, '2023-12-07 17:02:52'),
(46, 52, 11, 1, 125000, '2023-12-07 17:03:41'),
(47, 53, 11, 1, 125000, '2023-12-09 09:53:55'),
(48, 54, 11, 1, 125000, '2023-12-09 10:04:02'),
(49, 56, 11, 1, 125000, '2023-12-09 10:07:40'),
(50, 57, 11, 1, 125000, '2023-12-10 02:16:27'),
(51, 58, 15, 1, 30000, '2023-12-11 13:14:12'),
(52, 59, 11, 1, 125000, '2023-12-12 08:07:07'),
(53, 60, 11, 1, 125000, '2023-12-14 18:09:57'),
(54, 61, 11, 1, 125000, '2023-12-15 15:00:22'),
(55, 61, 12, 1, 80000, '2023-12-15 15:00:22'),
(56, 62, 11, 1, 125000, '2023-12-15 15:08:23'),
(57, 63, 12, 1, 80000, '2023-12-15 15:10:41'),
(58, 64, 12, 1, 80000, '2023-12-15 15:11:15'),
(59, 65, 11, 1, 125000, '2023-12-15 15:14:49'),
(60, 66, 12, 1, 80000, '2023-12-15 15:21:56'),
(61, 67, 11, 1, 125000, '2023-12-15 15:31:19'),
(62, 68, 15, 1, 30000, '2023-12-15 15:34:51'),
(63, 74, 12, 1, 80000, '2023-12-15 15:54:46'),
(64, 75, 11, 1, 125000, '2023-12-15 15:57:33'),
(65, 76, 11, 1, 125000, '2023-12-15 16:02:05'),
(66, 77, 11, 1, 125000, '2023-12-15 16:02:41'),
(67, 78, 15, 1, 30000, '2023-12-15 16:05:35');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(16, 9, 'Galettes bretonnes ', 'galettes bretonnes ', 'french dish', 'chris mentioned', 20000, 50000, '1701181261.jpg', 20, 0, 1, 'savoury crepe', 'savoury crepe', 'savoury crepe', '2023-11-28 14:21:01'),
(14, 11, 'Chocolate cake', 'chocolate cake', 'sweet and bitter', 'get a taste', 20000, 50000, '1701180672.jpg', 45, 0, 1, 'ngon lam a', 'ngon lam a', 'ngon lam a', '2023-11-28 14:11:12'),
(12, 10, 'Glazed Carrot', 'glazed carrot', 'carrot', 'carrot', 10000, 80000, '1700561237.jpg', -4, 0, 0, 'carrot grilled but raw', 'carrot grilled olive oil', 'carrot grilled', '2023-11-21 10:07:17'),
(11, 9, 'Mushroom Bolognese Spaghetti', 'mushroom bolognese spaghetti', 'ngon', 'my', 80000, 125000, '1700371165.jpg', -12, 0, 1, 'ngon', 'ngon', 'ngon', '2023-11-19 05:19:25'),
(15, 11, 'Sweet Crepe', 'sweet crepe', 'sweet and buttery', 'buttery', 20000, 30000, '1701180920.jpg', 8, 0, 0, 'my vi dan gian', 'my vi dan gian', 'my vi dan gian', '2023-11-28 14:15:20'),
(17, 10, 'Fish & Chips', 'fish & chips', 'khoai tay voi ca a :)', 'do Anh quoc', 20000, 60000, '1701181420.jpg', 20, 0, 1, 'oi cum ngon', 'ngon lum', 'ngon e', '2023-11-28 14:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tracking_no` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `adult` int NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `image` varchar(191) DEFAULT 'default.jpg',
  `verification_code` varchar(6) DEFAULT NULL,
  `verify_status` tinyint DEFAULT '0' COMMENT '0=no, 1=yes',
  `password` varchar(191) NOT NULL,
  `role_as` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `image`, `verification_code`, `verify_status`, `password`, `role_as`, `created_at`) VALUES
(5, 'nina', 'nina@gmail.com', 123, '1702174564_download.jpg', NULL, 0, '123', 0, '2023-11-15 15:28:58'),
(6, 'admin', 'admin@gmail.com', 111111, 'Seattle, travel, seattle sights, space needle, photo dump, landmarks, roadtrip, bucket list, summer 2023.jpg', NULL, 0, '123', 1, '2023-11-16 13:44:47'),
(15, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', 989598472, 'default.jpg', NULL, 0, '$2y$10$gCeG2zVsQsXMtRNw//3sHuO57N75SUqpJko1Hos7jzcYTCe.tZK/m', 1, '2023-12-15 14:19:53'),
(16, 'Quynh Pham', '21522537@gm.uit.edu.vn', 989598472, 'default.jpg', '002653', 1, '123456789Aa**', 1, '2023-12-15 14:34:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `product_qty`, `created_at`) VALUES
(3, 5, 11, 1, '2023-11-27 16:43:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
