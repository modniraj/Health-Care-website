-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 02:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `medicine_price` varchar(50) NOT NULL,
  `medicine_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `medicine_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(20) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `medicine_price` varchar(50) NOT NULL,
  `medicine_image` varchar(255) NOT NULL,
  `medicine_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `medicine_name`, `medicine_price`, `medicine_image`, `medicine_code`) VALUES
(1, 'Supradyn Multivitamin Tablets', '200', 'img/vit.jpg', 'm1'),
(2, 'Aeclofenac and Paracetamol Tablet ', '250', 'img/ace.jpeg', 'm2'),
(3, 'Num-p Nimesulie & Paracetamol Tablet', '150', 'img/num.jpg', 'm3'),
(4, 'Thyrolin 100mcg Tablet', '150', 'img/thy.jpg', 'm4'),
(5, 'Keraboost Tablet', '300', 'img/kera.jpg', 'm5'),
(6, 'Zincovit Drops', '40', 'img/zin.jpg', 'm6'),
(7, 'Normoz Tablet', '188', 'img/nor.jpg', 'm7'),
(8, 'Antoxid-HC Capsule', '354', 'img/anto.jpg', 'm8'),
(9, 'Kaya Advanced Acne Care Kit', '1665', 'img/kaya.png', 'm9'),
(10, 'Anti Acne Demelan Cream', '332', 'img/dem.png', 'm10'),
(11, 'Coffee Body Polishing Oil', '445', 'img/cof.png', 'm11'),
(12, 'Natural Vita Rich UnderEye Cream', '379', 'img/vita.png', 'm12');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `medicines` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `medicines`, `amount_paid`) VALUES
(1, 'Gojal J', 'gojalselvi@gmail.com', '7010366198', 'nesaraj nagar', 'COD', 'Supradyn Multivitamin Tablets(2), Coffee Body Polishing Oil(1)', '845'),
(2, 'Vrindha', 'vr12@gmail.com', '4567893214', 'Mumbai', 'card', 'Anti Acne Demelan Cream(1), Natural Vita Rich UnderEye Cream(2)', '1090');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
