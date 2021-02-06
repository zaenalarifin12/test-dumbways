-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 02:30 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan_sepeda`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `id` int(11) NOT NULL,
  `cycle_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`id`, `cycle_id`, `quantity`) VALUES
(18, 3, 1),
(19, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cycle`
--

CREATE TABLE `cycle` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `id_merk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cycle`
--

INSERT INTO `cycle` (`id`, `name`, `price`, `stock`, `image`, `id_merk`) VALUES
(1, 'Xquarone EX9 2019', 102000000, 0, 'sepeda1.jpg', 2),
(2, 'XQUARONE EX9 SRAM XX1', 102000000, 0, 'sepeda2.jpg', 2),
(3, 'Collosus DH9 Team Edition', 100000000, 1, 'sepeda4.jpg', 2),
(4, 'sepeda united detroit 2.00', 2875000, 43, 'sepeda3.jpg', 3),
(5, 'MTB Hotrod 3.0', 3820000, 13, 'sepeda5.jpg', 1),
(6, 'MTB Fatman', 3650000, 3, 'sepeda6.jpg', 1),
(7, 'MTB Hotrod 3.0', 3600000, 4, 'sepeda7.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id`, `name`) VALUES
(1, 'Wimcycle'),
(2, 'Polygon'),
(3, 'United'),
(4, 'Odessy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(2, 'zainal', 'zainal@gmail.com', '$2y$10$ls1JO6atSMxOG4SNgHUS9uLzQls9FshsZEvZIhgCn7INnMDGHLJNW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cycle_id` (`cycle_id`);

--
-- Indexes for table `cycle`
--
ALTER TABLE `cycle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cycle`
--
ALTER TABLE `cycle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`cycle_id`) REFERENCES `cycle` (`id`);

--
-- Constraints for table `cycle`
--
ALTER TABLE `cycle`
  ADD CONSTRAINT `cycle_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
