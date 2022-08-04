-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 12:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youniverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(5, 'phone'),
(6, 'car'),
(7, 'laptop'),
(8, 'bed'),
(9, 'tv'),
(10, 'desktop'),
(11, 'book'),
(12, 'camera'),
(13, 'coffee'),
(14, 'plane'),
(15, 'bus'),
(16, 'truck');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `proof` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `purchase_id`, `bank`, `quantity`, `date`, `proof`, `first_name`, `last_name`) VALUES
(2, 62, 'bank bri', 10, '2022-01-03', '20220103154923chemsburger.jpg', 'danis', 'ardani'),
(3, 67, 'bank bri', 10, '2022-01-04', '20220104151948Bukti-Transfer-BRI-Terbaru-dan-Terlengkap.jpg', 'danis', 'ardani'),
(4, 68, 'bank bri', 10, '2022-01-04', '20220104153400Bukti-Transfer-BRI-Terbaru-dan-Terlengkap.jpg', 'danis', 'ardani'),
(5, 85, 'bank bri', 10, '2022-01-05', '20220105045306Bukti-Transfer-BRI-Terbaru-dan-Terlengkap.jpg', 'danis', 'ardani'),
(6, 85, 'bank bri', 10, '2022-01-05', '20220105055213Bukti-Transfer-BRI-Terbaru-dan-Terlengkap.jpg', 'danis', 'ardani'),
(7, 87, 'bank bri', 10, '2022-01-05', '20220105070517Bukti-Transfer-BRI-Terbaru-dan-Terlengkap.jpg', 'danis', 'ardani'),
(8, 92, 'bank bri', 1220, '2022-01-05', '20220105072704Bukti-Transfer-BRI-Terbaru-dan-Terlengkap.jpg', 'rio', 'rio'),
(9, 93, 'bank bri', 5010, '2022-01-05', '20220105073059Bukti-Transfer-BRI-Terbaru-dan-Terlengkap.jpg', 'rio', 'darmono'),
(10, 94, 'bank bri', 10, '2022-01-15', '20220115152948Bukti-Transfer-BRI-Terbaru-dan-Terlengkap.jpg', 'danis', 'ardani');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_weight` int(11) NOT NULL,
  `product_pic` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_stock` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_weight`, `product_pic`, `product_description`, `product_stock`) VALUES
(7, 7, 'ASUS ROG Strix ', 2000, 2000, '6051fb122755b.jpg', 'great laptop from asus', 0),
(8, 7, 'ASUS ROG Zephyrus duo', 5000, 3000, 'zephyrus.jpg', 'the best laptop to work', 7),
(9, 7, 'ASUS ROG Strix g17', 2000, 2400, 'g17.jpg', 'an incredible laptop from asus', 1),
(15, 7, 'ASUS ROG Strix g15', 2500, 2400, 'g15.jpg', 'asus rog laptop', 19),
(16, 5, 'oneplus 1', 1200, 120, 'oneplus.png', 'oneplus phone', 14),
(17, 5, 'oneplus 1+', 2000, 124, 'one.jpg', 'great phone', 6),
(18, 5, 'iphone++', 5000, 200, 'iphone.jpg', 'this is iphonee', 9),
(19, 5, 'another oneplus', 10000, 300, 'another onplus.jpg', 'another oneplus phone', 40);

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase`
--

CREATE TABLE `product_purchase` (
  `product_purchase_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `subweight` int(11) NOT NULL,
  `subprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_purchase`
--

INSERT INTO `product_purchase` (`product_purchase_id`, `purchase_id`, `product_id`, `quantity`, `name`, `price`, `weight`, `subweight`, `subprice`) VALUES
(32, 53, 1, 1, 'produk', 1000, 10, 10, 1000),
(33, 54, 4, 1, 'laptop', 200000000, 1000, 1000, 200000000),
(34, 55, 1, 1, 'produk', 1000, 10, 10, 1000),
(35, 56, 4, 1, 'laptop', 200000000, 1000, 1000, 200000000),
(36, 57, 2, 1, 'qer', 1000, 13, 13, 1000),
(37, 58, 2, 1, 'qer', 1000, 13, 13, 1000),
(38, 58, 1, 1, 'produk', 1000, 10, 10, 1000),
(39, 59, 2, 1, 'qer', 1000, 13, 13, 1000),
(40, 59, 1, 1, 'produk', 1000, 10, 10, 1000),
(41, 60, 6, 1, 'roti', 5000, 123, 123, 5000),
(42, 61, 6, 1, 'roti', 5000, 123, 123, 5000),
(43, 62, 6, 1, 'roti', 5000, 123, 123, 5000),
(44, 63, 6, 10, 'roti', 5000, 123, 1230, 50000),
(45, 64, 7, 1, 'ASUS ROG Strix ', 2000, 2000, 2000, 2000),
(46, 65, 7, 5, 'ASUS ROG Strix ', 2000, 2000, 10000, 10000),
(47, 65, 8, 1, 'ASUS ROG Zephyrus duo', 5000, 3000, 3000, 5000),
(48, 66, 7, 1, 'ASUS ROG Strix ', 2000, 2000, 2000, 2000),
(49, 67, 7, 5, 'ASUS ROG Strix ', 2000, 2000, 10000, 10000),
(50, 67, 8, 1, 'ASUS ROG Zephyrus duo', 5000, 3000, 3000, 5000),
(51, 68, 7, 2, 'ASUS ROG Strix ', 2000, 2000, 4000, 4000),
(52, 68, 8, 1, 'ASUS ROG Zephyrus duo', 5000, 3000, 3000, 5000),
(53, 69, 7, 1, 'ASUS ROG Strix ', 2000, 2000, 2000, 2000),
(54, 69, 17, 5, 'oneplus 1+', 2000, 124, 620, 10000),
(55, 70, 15, 1, 'ASUS ROG Strix g15', 2500, 2400, 2400, 2500),
(56, 71, 9, 1, 'ASUS ROG Strix g17', 2000, 2400, 2400, 2000),
(57, 72, 18, 1, 'iphone++', 5000, 200, 200, 5000),
(58, 73, 18, 1, 'iphone++', 5000, 200, 200, 5000),
(59, 74, 18, 1, 'iphone++', 5000, 200, 200, 5000),
(60, 75, 18, 1, 'iphone++', 5000, 200, 200, 5000),
(61, 76, 18, 1, 'iphone++', 5000, 200, 200, 5000),
(62, 77, 18, 1, 'iphone++', 5000, 200, 200, 5000),
(63, 78, 18, 1, 'iphone++', 5000, 200, 200, 5000),
(64, 79, 18, 1, 'iphone++', 5000, 200, 200, 5000),
(65, 80, 18, 1, 'iphone++', 5000, 200, 200, 5000),
(66, 81, 18, 1, 'iphone++', 5000, 200, 200, 5000),
(67, 82, 16, 1, 'oneplus 1', 1200, 120, 120, 1200),
(68, 83, 16, 1, 'oneplus 1', 1200, 120, 120, 1200),
(69, 84, 16, 2, 'oneplus 1', 1200, 120, 240, 2400),
(70, 84, 17, 1, 'oneplus 1+', 2000, 124, 124, 2000),
(71, 84, 19, 1, 'another oneplus', 10000, 300, 300, 10000),
(72, 85, 16, 2, 'oneplus 1', 1200, 120, 240, 2400),
(73, 85, 17, 1, 'oneplus 1+', 2000, 124, 124, 2000),
(74, 85, 19, 1, 'another oneplus', 10000, 300, 300, 10000),
(75, 86, 19, 1, 'another oneplus', 10000, 300, 300, 10000),
(76, 87, 9, 2, 'ASUS ROG Strix g17', 2000, 2400, 4800, 4000),
(77, 87, 15, 2, 'ASUS ROG Strix g15', 2500, 2400, 4800, 5000),
(78, 87, 18, 3, 'iphone++', 5000, 200, 600, 15000),
(79, 88, 15, 2, 'ASUS ROG Strix g15', 2500, 2400, 4800, 5000),
(80, 88, 9, 1, 'ASUS ROG Strix g17', 2000, 2400, 2400, 2000),
(81, 90, 17, 1, 'oneplus 1+', 2000, 124, 124, 2000),
(82, 92, 16, 1, 'oneplus 1', 1200, 120, 120, 1200),
(83, 93, 8, 1, 'ASUS ROG Zephyrus duo', 5000, 3000, 3000, 5000),
(84, 94, 8, 1, 'ASUS ROG Zephyrus duo', 5000, 3000, 3000, 5000),
(85, 94, 9, 5, 'ASUS ROG Strix g17', 2000, 2400, 12000, 10000),
(86, 94, 15, 1, 'ASUS ROG Strix g15', 2500, 2400, 2400, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_total` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `shipping_city` varchar(100) NOT NULL,
  `shipping_price` int(11) NOT NULL,
  `shipping_address` text NOT NULL,
  `purchase_status` varchar(100) NOT NULL DEFAULT 'pending',
  `delivery_receipt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `email`, `purchase_date`, `purchase_total`, `shipping_id`, `shipping_city`, `shipping_price`, `shipping_address`, `purchase_status`, `delivery_receipt`) VALUES
(62, 'danis@mail.com', '2022-01-04', 15000, 1, 'boyolali', 10000, 'Boyolali tersenyum', 'already paid', ''),
(63, 'danis@mail.com', '2022-01-04', 60000, 1, 'boyolali', 10000, 'Boyolali tersenyum', 'already paid', ''),
(64, 'danis@mail.com', '2022-01-04', 12000, 1, 'boyolali', 10000, 'Boyolali kota', 'pending', ''),
(65, 'toni@gmail.com', '2022-01-04', 15000, 1, 'boyolali', 0, 'Boyolali kota', 'already paid', ''),
(66, 'toni@gmail.com', '2022-01-04', 2000, 1, 'boyolali', 0, 'Boyolali', 'already paid', ''),
(67, 'toni@gmail.com', '2022-01-04', 15000, 1, 'boyolali', 0, 'Boyolali kota', 'barang dikirim', '1234'),
(68, 'user@mail.com', '2022-01-04', 9000, 1, 'boyolali', 0, 'Boyolali kota tersenyum', 'on delivery', '12312'),
(69, 'user@mail.com', '2022-01-04', 12000, 0, '', 0, 'Boyolali kota', 'pending', ''),
(70, 'f@mail.com', '2022-01-05', 2500, 1, 'boyolali', 0, 'Boyolali', 'pending', ''),
(71, 'f@mail.com', '2022-01-05', 2000, 1, 'boyolali', 0, 'Boyolali kota', 'pending', ''),
(72, 'f@mail.com', '2022-01-05', 5000, 1, 'boyolali', 0, 'Boyolali kota', 'pending', ''),
(73, 'f@mail.com', '2022-01-05', 5005, 1, 'boyolali', 5, 'Boyolali kota', 'pending', ''),
(74, 'f@mail.com', '2022-01-05', 5000, 0, '', 0, 'Boyolali kota', 'pending', ''),
(75, 'f@mail.com', '2022-01-05', 5005, 1, 'boyolali', 5, 'Boyolali', 'pending', ''),
(76, 'f@mail.com', '2022-01-05', 5005, 1, 'boyolali', 5, 'Boyolali kota', 'pending', ''),
(77, 'f@mail.com', '2022-01-05', 5005, 1, 'boyolali', 5, 'Boyolali tersenyum', 'pending', ''),
(78, 'f@mail.com', '2022-01-05', 5005, 1, 'boyolali', 5, 'Boyolali tersenyum', 'pending', ''),
(79, 'f@mail.com', '2022-01-05', 5005, 1, 'boyolali', 5, 'Boyolali tersenyum', 'pending', ''),
(80, 'f@mail.com', '2022-01-05', 5000, 0, '', 0, 'Boyolali', 'pending', ''),
(81, 'f@mail.com', '2022-01-05', 5005, 1, 'boyolali', 5, 'Boyolali tersenyum', 'pending', ''),
(82, 'f@mail.com', '2022-01-05', 1205, 1, 'boyolali', 5, 'Boyolali tersenyum', 'pending', ''),
(83, 'f@mail.com', '2022-01-05', 1205, 1, 'boyolali', 5, 'Boyolali', 'pending', ''),
(84, 'f@mail.com', '2022-01-05', 14405, 1, 'boyolali', 5, 'Boyolali kota', 'pending', ''),
(85, 'f@mail.com', '2022-01-05', 14405, 1, 'boyolali', 5, 'Boyolali boyolali', 'done', ''),
(86, 'f@mail.com', '2022-01-05', 10005, 1, 'boyolali', 5, 'Boyolali', 'pending', ''),
(87, 'f@mail.com', '2022-01-05', 24020, 2, 'London', 20, 'Boyolali kota tersenyum', 'done', ''),
(92, 'rio@gmail.com', '2022-01-05', 1220, 2, 'London', 20, 'London', 'arrived', '123123'),
(93, 'rio@gmail.com', '2022-01-05', 5010, 6, 'Bangkok', 10, 'London don', 'arrived', '123123'),
(94, 'rio@gmail.com', '2022-01-15', 17520, 2, 'London', 20, 'London', 'arrived', '12341234');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `shipping_city` varchar(100) NOT NULL,
  `shipping_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `shipping_city`, `shipping_price`) VALUES
(1, 'Jakarta', 5),
(2, 'London', 20),
(3, 'Tokyo', 10),
(6, 'Bangkok', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `phone` varchar(20) NOT NULL DEFAULT '',
  `address` text DEFAULT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `first_name`, `last_name`, `status`, `phone`, `address`, `question`, `answer`, `pic`) VALUES
('a', 'password', '', '', 'Administrator', '', '', 'a', 'a', ''),
('a@mail.com', '$2y$10$uUWNq8cLeQ2Qo6tgDqzvT.Q2Yu324SYrqZWAdIZON.t1FnJGtgtT2', '', '', 'Administrator', '', '', 'siapa nama superhero favoritmu?', 'ironman', ''),
('admin@mail.com', '$2y$10$uUWNq8cLeQ2Qo6tgDqzvT.Q2Yu324SYrqZWAdIZON.t1FnJGtgtT2', '', '', 'Administrator', '', '', 'siapa nama superhero favoritmu?', 'ironman', ''),
('danis@gmail.com', '$2y$10$uUWNq8cLeQ2Qo6tgDqzvT.Q2Yu324SYrqZWAdIZON.t1FnJGtgtT2', '', '', 'Administrator', '', '', 'siapa nama superhero favoritmu?', 'ironman', ''),
('danis@mail.com', '$2y$10$uUWNq8cLeQ2Qo6tgDqzvT.Q2Yu324SYrqZWAdIZON.t1FnJGtgtT2', 'daniss', 'ardani', 'Member', '0812', 'Boyolali', 'siapa nama superhero favoritmu?', 'ironman', '61d3b40451ee4.jpg'),
('f@mail.com', '$2y$10$aACzeYOMo3b7J2VWAMRGPu5pfiibPPXNCdGqi28RJ2sn1uoJRE3Y.', 'daniss', 'ardani', 'Member', '0812', 'Boyolali', 'siapa nama superhero favoritmu?', 'ironman', 'user.jpg'),
('rio@gmail.com', '$2y$10$ecagfki4yJkOZ4wDUVf4Zu1X1sDm4PJYuqEd887yMny6ix83lA3Dq', 'rio', 'rio', 'Member', '0812', 'London', 'siapa nama superhero favoritmu?', 'ironman', '61d538af66b55.jpg'),
('toni@gmail.com', '$2y$10$uUWNq8cLeQ2Qo6tgDqzvT.Q2Yu324SYrqZWAdIZON.t1FnJGtgtT2', 'toni', 'toni', 'Member', '123', 'Boyolali', 'siapa nama superhero favoritmu?', 'ironman', '61d4544ae79f1.jpg'),
('user@mail.com', '$2y$10$uUWNq8cLeQ2Qo6tgDqzvT.Q2Yu324SYrqZWAdIZON.t1FnJGtgtT2', 'danis', 'ardani', 'Member', '0812', 'Boyolali kota', 'siapa nama superhero favoritmu?', 'ironman', '61d459cf244b7.jpg'),
('v', '$2y$10$uUWNq8cLeQ2Qo6tgDqzvT.Q2Yu324SYrqZWAdIZON.t1FnJGtgtT2', 'ridho', 'vit', 'Member', 'vi', 'vi', 'v', 'v', '61d1dd125a4ae.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_purchase`
--
ALTER TABLE `product_purchase`
  ADD PRIMARY KEY (`product_purchase_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_purchase`
--
ALTER TABLE `product_purchase`
  MODIFY `product_purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
