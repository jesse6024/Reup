-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 09:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(36, 'robot', 5, 3, '2023-07-18 18:19:56'),
(37, 'robot', 6, 5, '2023-07-18 18:20:56'),
(38, 'robot', 13, 3, '2023-07-18 18:22:24'),
(39, 'robot', 12, 2, '2023-07-18 18:24:52'),
(40, 'robot', 8, 1, '2023-07-18 18:26:59'),
(42, 'logitech', 9, 3, '2023-07-18 19:26:00'),
(43, 'logitech', 15, 4, '2023-07-18 19:28:51'),
(45, 'logitech', 8, 1, '2023-07-19 04:14:42'),
(46, 'logitech', 19, 10, '2023-07-19 04:25:20'),
(47, 'logitech', 12, 10, '2023-07-19 04:34:13'),
(50, 'logitech', 21, 1, '2023-07-19 06:18:37'),
(51, 'logitech', 23, 1, '2023-07-19 06:41:03'),
(52, 'logitech', 24, 1, '2023-07-19 06:58:09'),
(53, 'robot888', 26, 5, '2023-07-19 07:44:30'),
(54, 'robot888', 27, 2, '2023-07-19 08:08:45'),
(55, 'robot888', 21, 10, '2023-07-19 08:22:54'),
(56, 'robot888', 29, 1, '2023-07-19 22:19:37'),
(57, 'robot888', 28, 1, '2023-07-19 22:25:07'),
(58, 'robot888', 30, 1, '2023-07-19 22:52:49'),
(59, 'TestUser', 12, 1, '2023-07-19 23:38:34'),
(60, 'TestUser', 29, 1, '2023-07-22 01:03:29'),
(61, 'TestUser', 28, 1, '2023-07-22 01:03:40'),
(62, 'TestUser', 27, 1, '2023-07-22 01:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(2, 'Electronics ', 'Electronics ', 'A listing for a variety of electronics products', 0, 0, '1689808181.jpg', 'Electronics ', 'A listing for a variety of electronics products', 'electronics,computers,televisions,HDD,CD,DVD,cpu,mobo,ram,PSU,modem', '2022-02-24 01:32:02'),
(4, 'Computers', 'Notebooks', 'Notebooks', 0, 0, '1645686298.jpg', 'Notebooks', 'Notebooks', 'Notebooks', '2022-02-24 01:34:58'),
(10, 'Shoes', 'Shoes', 'Shoes', 0, 0, '1689747632.jpg', 'Shoes', 'Shoes', 'Shoes', '2023-07-19 06:20:32'),
(16, 'Cars', 'Cars', 'Cars', 0, 0, '1689751341.jpg', 'Cars', 'Cars', 'Cars', '2023-07-19 07:22:21'),
(17, 'Fashion', 'Fashion', 'Fashion ', 0, 0, '1689752561.jpg', 'Fashion', 'Fashion', 'Fashion ', '2023-07-19 07:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `Id` int(11) NOT NULL,
  `FromUser` int(11) NOT NULL,
  `ToUser` int(11) NOT NULL,
  `Message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(1, 'sharmacoder63016565998', 1, 'OM prakash', 'om@gmail.com', '656565998', 'testing address', 560088, 46397, 'COD', '', 1, NULL, '2022-08-02 08:59:28'),
(2, 'sharmacoder6023sf', 1, 'asdf', 'asdf@gmai.com', 'adsf', 'adsfasf', 0, 46397, 'COD', '', 0, NULL, '2022-08-02 09:01:35'),
(3, 'sharmacoder6779df', 1, 'adsf', 'asdf@gmail.com', 'asdf', 'sdfa', 0, 47997, 'COD', '', 0, NULL, '2022-08-03 07:37:20'),
(4, 'sharmacoder7435sf', 1, 'asdf', 'adsf', 'adsf', 'adsf', 0, 15999, 'Paid by PayPal', '47X98245JT480770K', 0, NULL, '2022-10-07 07:16:40'),
(5, 'sharmacoder4647df', 1, 'asd', 'fadsf', 'asdf', 'adsf', 0, 22999, 'Paid by PayPal', '88F32539DL1774142', 0, NULL, '2022-10-07 07:21:03'),
(6, 'sharmacoder2684sf', 1, 'asdf', 'asdf', 'adsf', 'a', 0, 15999, 'Paid by PayPal', '4EU871766J269392G', 0, NULL, '2022-10-07 07:22:04'),
(0, 'sharmacoder15995-555-5555', 0, 'Anonymous', 'anon6024@gmail.com', '555-555-5555', 'Anonymous\r\n12345 Jefferson ST\r\nAnywhere TX 07712', 6666, 150, 'COD', '', 0, NULL, '2023-07-22 01:14:10'),
(0, 'sharmacoder79055-555-5555', 0, 'Anonymous', 'anon6024@gmail.com', '555-555-5555', 'Anonymous\r\n12345 Jefferson ST\r\nAnywhere TX 07712', 6666, 0, 'COD', '', 0, NULL, '2023-07-22 01:14:23'),
(0, 'sharmacoder49635-555-5555', 0, 'Anonymous', 'anon6024@gmail.com', '555-555-5555', 'Anonymous\r\n12345 Jefferson ST\r\nAnywhere TX 07712', 6666, 0, 'COD', '', 0, NULL, '2023-07-22 01:16:32'),
(0, 'sharmacoder54545-555-5555', 0, 'Anonymous', 'anon6024@gmail.com', '555-555-5555', 'Anonymous\r\n12345 Jefferson ST\r\nAnywhere TX 07712', 6666, 0, 'COD', '', 0, NULL, '2023-07-22 01:17:09'),
(0, 'sharmacoder4598', 0, '', '', '', '', 0, 0, '', '', 0, NULL, '2023-07-22 01:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(1, 1, 4, 1, 399, '2022-08-02 08:59:28'),
(2, 1, 2, 2, 22999, '2022-08-02 08:59:28'),
(3, 2, 4, 1, 399, '2022-08-02 09:01:35'),
(4, 2, 2, 2, 22999, '2022-08-02 09:01:35'),
(5, 3, 1, 3, 15999, '2022-08-03 07:37:20'),
(6, 4, 1, 1, 15999, '2022-10-07 07:16:40'),
(7, 5, 2, 1, 22999, '2022-10-07 07:21:03'),
(8, 6, 1, 1, 15999, '2022-10-07 07:22:04'),
(0, 0, 19, 1, 150, '2023-07-22 01:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `pm_imbox`
--

CREATE TABLE `pm_imbox` (
  `id` int(11) NOT NULL,
  `userid` tinyint(5) NOT NULL,
  `username` varchar(123) NOT NULL,
  `from_id` tinyint(4) NOT NULL,
  `from_username` varchar(123) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` longtext NOT NULL,
  `viewed` enum('0','1') NOT NULL,
  `recieve_date` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pm_imbox`
--

INSERT INTO `pm_imbox` (`id`, `userid`, `username`, `from_id`, `from_username`, `title`, `content`, `viewed`, `recieve_date`) VALUES
(78, 3, 'to_username', 3, 'ram', 'Hello', 'Hello this is a test message.', '1', 'Saturday,11th February 2023,8:02:28:pm'),
(79, 2, 'to_username', 2, 'arjun', 'Hello ', 'Hello this is a test message.', '0', 'Saturday,11th February 2023,8:44:36:pm'),
(81, 3, 'to_username', 2, 'arjun', '3 Oz of cocaine', 'Please send 3 Oz of cocaine to <br />\r\nJohn Smith<br />\r\n555 Scottsdale Ave<br />\r\nSouth Amboy NJ 08864<br />\r\n', '1', 'Saturday,11th February 2023,11:29:22:pm'),
(82, 3, 'to_username', 3, 'ram', 'Another Message', 'Here is another message.', '1', 'Monday,13th February 2023,6:18:38:am'),
(83, 1, 'to_username', 1, 'ranjit', 'Test Message 2', 'This is a second test message.', '1', 'Monday,13th February 2023,6:21:11:am'),
(84, 1, 'to_username', 1, 'ranjit', 'Message 3', 'This is the third Message.', '1', 'Monday,13th February 2023,6:23:38:am'),
(85, 1, 'to_username', 1, 'ranjit', 'Another message', 'This is another message.', '1', 'Monday,13th February 2023,6:59:25:am'),
(86, 3, 'to_username', 0, '<br />\r\n<b>Warning</b>:  Undefined variable $username in <b>C:xampphtdocsNewPMpm_send_to.php</b> on line <b>62</b><br />\r\n', 'Another Test Message', 'This is another test message.', '0', 'Monday,13th February 2023,8:07:45:am'),
(87, 2, 'to_username', 25, 'newuser', 'This is a test message', 'This is a test message...', '0', 'Tuesday,14th February 2023,4:26:39:am'),
(88, 3, 'to_username', 25, 'newuser', 'New Message', 'This is a new message.', '0', 'Tuesday,14th February 2023,5:02:38:am'),
(94, 2, 'to_username', 25, 'newuser', 'This is a message from vendor', 'You have been sent a message from vendor.', '0', 'Tuesday,14th February 2023,11:02:24:pm'),
(95, 5, 'to_username', 25, 'newuser', 'This is a message from newuser', 'This is a message from newuser...', '0', 'Tuesday,14th February 2023,11:14:31:pm');

-- --------------------------------------------------------

--
-- Table structure for table `pm_outbox`
--

CREATE TABLE `pm_outbox` (
  `id` int(11) NOT NULL,
  `userid` tinyint(4) NOT NULL,
  `username` varchar(123) NOT NULL,
  `to_userid` tinyint(4) NOT NULL,
  `to_username` varchar(123) NOT NULL,
  `title` varchar(123) NOT NULL,
  `content` longtext NOT NULL,
  `senddate` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pm_outbox`
--

INSERT INTO `pm_outbox` (`id`, `userid`, `username`, `to_userid`, `to_username`, `title`, `content`, `senddate`) VALUES
(61, 3, 'ram', 1, 'ranjit', 'Test Message from ram', 'This is a test message from ram.', 'Friday,10th February 2023,7:37:56:am'),
(62, 3, 'ram', 2, 'arjun', 'This is a test message', 'This is a test message.', 'Saturday,11th February 2023,3:10:43:am'),
(66, 3, 'ram', 3, 'ram', 'Test Message', 'This is a test message.', 'Saturday,11th February 2023,7:56:33:pm'),
(67, 3, 'ram', 3, 'ram', 'Hello', 'Hello this is a test message.', 'Saturday,11th February 2023,8:02:28:pm'),
(68, 2, 'arjun', 2, 'arjun', 'Hello ', 'Hello this is a test message.', 'Saturday,11th February 2023,8:44:36:pm'),
(70, 2, 'arjun', 3, 'ram', '3 Oz of cocaine', 'Please send 3 Oz of cocaine to <br />\r\nJohn Smith<br />\r\n555 Scottsdale Ave<br />\r\nSouth Amboy NJ 08864<br />\r\n', 'Saturday,11th February 2023,11:29:22:pm'),
(71, 3, 'ram', 3, 'ram', 'Another Message', 'Here is another message.', 'Monday,13th February 2023,6:18:38:am'),
(74, 1, 'ranjit', 1, 'ranjit', 'Another message', 'This is another message.', 'Monday,13th February 2023,6:59:25:am'),
(75, 0, '<br />\r\n<b>Warning</b>:  Undefined variable $username in <b>C:xampphtdocsNewPMpm_send_to.php</b> on line <b>62</b><br />\r\n', 3, 'ram', 'Another Test Message', 'This is another test message.', 'Monday,13th February 2023,8:07:45:am'),
(84, 25, 'newuser', 5, 'newuser', 'This is a message from newuser', 'This is a message from newuser...', 'Tuesday,14th February 2023,11:14:31:pm');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(7, 10, 'Nike Air Jordans', 'Nike Air Jordans', 'This is a listing for Nike Air Jordans', 'This is a listing for Nike Air Jordans', 250, 250, '1689686470.webp', 100, 0, 1, 'Nike Air Jordans', 'This is a listing for Nike Air Jordans', '', '2023-07-18 13:21:10'),
(12, 2, 'HP Newest 14', 'HP Newest 14', 'HP Newest 14\" HD Laptop, Windows 11, Intel Celeron Dual-Core Processor Up to 2.60GHz, 4GB RAM, 64GB SSD, Webcam, Dale Pink(Renewed) (Dale Blue)', 'HP Newest 14\" HD Laptop, Windows 11, Intel Celeron Dual-Core Processor Up to 2.60GHz, 4GB RAM, 64GB SSD, Webcam, Dale Pink(Renewed) (Dale Blue)', 1000, 1000, '1689808380.jpg', 10, 0, 0, 'HP Newest 14', 'HP Newest 14\" HD Laptop, Windows 11, Intel Celeron Dual-Core Processor Up to 2.60GHz, 4GB RAM, 64GB SSD, Webcam, Dale Pink(Renewed) (Dale Blue)', '', '2023-07-18 15:57:01'),
(19, 1, 'Samsung Galaxy A12', 'Samsung Galaxy A12', 'This is a listing for a Samsung Galaxy A12', 'This is a listing for a Samsung Galaxy A12', 150, 150, '1689740021.jpg', 9, 0, 0, 'Samsung Galaxy A12', 'This is a listing for a Samsung Galaxy A12', '', '2023-07-19 04:13:41'),
(21, 4, 'Sony Vaio', 'Sony Vaio', 'Sony VAIO VPCEE23FX/BI 15.5\" Notebook, AMD Athlon II Dual-Core P320 (2.1Ghz), 4GB (2GB x 2) DDR3 Memory, 320GB HDD, DVD±R DL / ±RW / -RAM, ATI Mobility Radeon HD 4250, Atheros 802.11b/g/n, Windows 7 Home 64-bit (Matte Black)', 'Sony VAIO VPCEE23FX/BI 15.5\" Notebook, AMD Athlon II Dual-Core P320 (2.1Ghz), 4GB (2GB x 2) DDR3 Memory, 320GB HDD, DVD±R DL / ±RW / -RAM, ATI Mobility Radeon HD 4250, Atheros 802.11b/g/n, Windows 7 Home 64-bit (Matte Black)', 220, 220, '1689743241.jpg', 10, 0, 0, 'Sony Vaio', 'Sony VAIO VPCEE23FX/BI 15.5\" Notebook, AMD Athlon II Dual-Core P320 (2.1Ghz), 4GB (2GB x 2) DDR3 Memory, 320GB HDD, DVD±R DL / ±RW / -RAM, ATI Mobility Radeon HD 4250, Atheros 802.11b/g/n, Windows 7 Home 64-bit (Matte Black)', '', '2023-07-19 05:07:21'),
(27, 2, 'AMD Ryzen 9 7950X / 4.5 GHz processor - PIB/WOF', 'AMD Ryzen 9 7950X / 4.5 GHz processor - PIB/WOF', 'AMD Ryzen 9 7950X / 4.5 GHz processor - PIB/WOF', 'AMD Ryzen 9 7950X / 4.5 GHz processor - PIB/WOF', 830, 830, '1689753126.avif', 10, 0, 0, 'AMD Ryzen 9 7950X / 4.5 GHz processor - PIB/WOF', 'AMD Ryzen 9 7950X / 4.5 GHz processor - PIB/WOF', '', '2023-07-19 07:52:06'),
(28, 16, 'Honda Civic', 'Honda Civic', 'Honda Civic', 'Honda Civic', 27000, 27000, '1689754828.jpg', 5, 0, 0, 'Honda Civic', 'Honda Civic', '', '2023-07-19 08:20:28'),
(29, 10, 'Adidas Male Superstar Shoes ', 'Adidas Male Superstar Shoes ', 'Adidas Male Superstar Shoes ', 'Adidas Male Superstar Shoes ', 100, 100, '1689805152.avif', 10, 0, 0, 'Adidas Male Superstar Shoes ', 'Adidas Male Superstar Shoes ', '', '2023-07-19 22:19:12'),
(30, 16, 'Ferrari', 'Ferrari', 'Ferrari', 'Ferrari', 150000, 150000, '1689807146.jpg', 10, 0, 0, 'Ferrari', 'Ferrari', '', '2023-07-19 22:52:26'),
(31, 10, 'Adidas Yeezys', 'Adidas Yeezys', 'Adidas Yeezys', 'Adidas Yeezys', 150, 151, '1689816035.webp', 10, 0, 0, 'Adidas Yeezys', 'Adidas Yeezys', '', '2023-07-20 01:20:35'),
(32, 4, 'New XPS Desktop', 'New XPS Desktop', 'New XPS Desktop', 'New XPS Desktop', 850, 850, '1689987683.jpg', 10, 0, 0, 'New XPS Desktop', 'New XPS Desktop', '', '2023-07-22 01:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `confirmPassword` varchar(255) NOT NULL,
  `account_role` varchar(255) NOT NULL,
  `vendorApproved` varchar(255) NOT NULL,
  `pin` int(6) NOT NULL,
  `dateJoined` date NOT NULL,
  `trust_level` int(1) NOT NULL,
  `total_orders` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `userPassword`, `confirmPassword`, `account_role`, `vendorApproved`, `pin`, `dateJoined`, `trust_level`, `total_orders`) VALUES
(2, 'vendor', '$2y$10$aGaN2.TOBGmU5IrCWfwlhuKcWTChezV5JgEk6AEXCcrmTPgBMF22u', '$2y$10$Q2BEXrL30uyspW0LzM.D2.2eQQnvVHGVFz0GrJ9mNsal4W.3PwB1G', 'Vendor', '0', 6666, '2023-01-13', 0, 0),
(3, 'buyer', '$2y$10$zfXCPXasVsxXdO9tPiQIseRwEYABhz8HmWUu0ElDv98KAON7Y0MVK', '$2y$10$6qdzcjR/0irYHiL2ilNviuLJHPZbrFf7e7y2ZmwJFnlNluxEQuWae', 'Buyer', '0', 6666, '2023-01-13', 0, 0),
(4, 'buyer2', '$2y$10$k/2CzTeoEtDpiaIALRUTVO.LbNmx2NZwkeC9oUbb3JRanGvHeqQfK', '$2y$10$tdC2g9iB4HuqxKfEVMZKJ.TFxgaDUye2p/XHIquv/GuiegfIjk7pO', 'Buyer', '0', 6666, '2023-01-13', 0, 0),
(5, 'newuser', '$2y$10$CuUTsaTE6GJCVFKl6yI.7OuwUlvB9FsDoVrfDY4P/CbNYSM.svI1e', '$2y$10$Tb44gaQG/kx1NwLCHx3Su.ozWaPoh7g1MsCxS9hVp7a0M/q.0MT2y', 'Buyer', '', 6666, '2023-01-13', 0, 0),
(8, 'admin', '$2y$10$qGVAapuiuY1z9333ZRVqAO2NGSGbXGjbmy2fNOD3duO1as2OR0E5q', '$2y$10$s1tnt23iGXAfxQNP02ZYzeFBjhKh2WuXYrBvoMIOZYLYySpBhrgsu', 'Admin', '0', 6655, '2023-01-14', 5, 0),
(10, 'testvendor', '$2y$10$gcq/8iPjpCF0AVsS0vqWAesuixAOvkjeID5k27Nael7AfN7lW3Ip6', '$2y$10$4Axo86quJ/.vUB16/Pdf4uSDe7/3p3yEdCQwcjbnF4BDdn3kXGxF.', 'Buyer', '0', 6644, '2023-01-16', 0, 0),
(11, 'logitech', '$2y$10$Uh/RcM0WnlYpXiHkzKQC/eXAL5tmKAI4T2st5IRFm939MObaY3DvW', '$2y$10$EQ7qEEoUwfYsJ7ZSMk1zu.zbg87x2NdiTdOeNTVaiE954jiYd2qPa', 'Vendor', '0', 6666, '2023-06-16', 0, 0),
(13, 'anonymous', '$2y$10$ZVqVDBNpn6Le7LNIttutQePZIW1sYoXTr6JVTfdfIL0.jN/jKPy3.', '$2y$10$.92wOFZFA1FaKLcm6fbxLOGLjhZU5n6zJ.vtsB73RapIOyMzNWTty', 'Vendor', '0', 6666, '2023-06-16', 0, 0),
(14, 'logitech423', '$2y$10$bFD31tCdLyItA1cVdNscRuBhtfrnM7NLJK25FTqGyiRgmDmkZvUR.', '$2y$10$5XM2gRPN.zXO9wGSkA7Wa.ArxEMAI7G1rmJIQFqtLtTYDMDFHqD5u', 'Buyer', '0', 6666, '2023-07-18', 0, 0),
(15, 'robot', '$2y$10$Q5X0ihwViKBI2wQGqQVbauQHKe4Qqtauw3uhDekxyct5bFZjodhqG', '$2y$10$xqcclmyn87/iqpqEBm0DuO/CULhwJH9TO6KMXQN2cf85CFg4v9LDO', 'Vendor', '0', 5555, '2023-07-18', 0, 0),
(16, 'robot888', '$2y$10$v9TV78GfRZJ/Pialu8PTGOkx.VvuI2cHDG6n.J2OUp6iGPYlHy8Tq', '$2y$10$.zzJThi9O4MUSb8Qh/XE3ugKv22Qa8l1c2d0S6CocH1EGMTBoTdpa', 'Vendor', '0', 6655, '2023-07-19', 0, 0),
(17, 'TestUser', '$2y$10$nL8AjlhrU/PRT94tN3WydeQSz7KK/dNcBEr3IJrWixtjVK0a8klLi', '$2y$10$c4qEtPui0RjB0uj.F7ekSu3AWz7ODRhBAfQPmXAi6WW2kPEUKIDJa', 'Buyer', '0', 6666, '2023-07-20', 0, 0),
(18, 'anonymous', '$2y$10$.FBPpyjWEVCu/2X/FBk2O.BUPkWDwT1my5okp/DCwv4.AAKNfxo1e', '$2y$10$iQVLqW2GXs.qYqbcPAsqAeXUXX5j.0aYTZxcaCWo53jEKUFzBeT.G', 'Vendor', '0', 6666, '2023-08-06', 0, 0),
(19, 'robot999', '$2y$10$K1gqM6H3TWsTF.hwRuhyD.b2t6jE7YMBGYAgpc7OvIBGBN9UFsaim', '$2y$10$1KbO2PT8JmSaHYjswxj/r.FoW0IMh/xW1C5YBiCyYx0n8vZQDzz5C', 'Vendor', '0', 6633, '2023-08-10', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `User` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `User`) VALUES
(1, 'user'),
(2, 'User'),
(3, 'anonymous'),
(4, 'anonymous2'),
(5, 'User'),
(6, 'Joseph'),
(7, 'Rebecca'),
(8, 'Robert'),
(9, 'Noel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD KEY `FromUser` (`FromUser`),
  ADD KEY `messages_ibfk_2` (`ToUser`);

--
-- Indexes for table `pm_imbox`
--
ALTER TABLE `pm_imbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pm_outbox`
--
ALTER TABLE `pm_outbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pm_imbox`
--
ALTER TABLE `pm_imbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `pm_outbox`
--
ALTER TABLE `pm_outbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`FromUser`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`ToUser`) REFERENCES `users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
