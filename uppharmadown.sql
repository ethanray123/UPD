-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2017 at 07:00 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30
CREATE DATABASE uppharmadown;
USE uppharmadown;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uppharmadown`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `product_list` (
  `list_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qnty` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `dosage` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `generic_name` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `brand` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `dosage`, `generic_name`, `brand`, `expiry_date`, `quantity`) VALUES
(1, 'Biogesic', '5.00', '500mg', 'Paracetamol', 'Unilab', '2025-03-20', 100),
(2, 'Medicol', '7.50', '200mg', 'Ibuprofen', 'Unilab', '2025-03-20', 100),
(3, 'Tuseran Forte', '8.50', '350mg', 'Dextromethorphan', 'Unilab', '2025-03-25', 100);

--
-- Table structure for table `product_supplier`
--

CREATE TABLE `product_supplier` (
  `product_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `contact_no` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transac`
--

CREATE TABLE `transac` (
  `transaction_no` int(11) NOT NULL,
  `date_of_transaction` date DEFAULT NULL,
  `transaction_status` enum('PAID','NOTPAID') DEFAULT NULL,
  `list_no` int(11) NOT NULL,
  `discount` decimal(5,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `credit_card_no` varchar(20) DEFAULT NULL,
  `delivery_location` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `contact_no` varchar(11) DEFAULT NULL,
  `credit_card_no` varchar(20) DEFAULT NULL,
  `type` enum('admin','consumer') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `age`, `name`, `email`, `address`, `contact_no`, `credit_card_no`, `type`) VALUES
(1, 'a8a15b230947dffe7d28e9beba511832', `18`, 'Ethan Ray Mosqueda', 'ethanray19@gmail.com', 'Puso Center, Mactan Lapu-Lapu City', '09561332497', '', 'consumer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `product_supplier`
--
ALTER TABLE `product_supplier`
  ADD KEY `fk_prod_id` (`product_id`),
  ADD KEY `fk_supp_id` (`supplier_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `transac`
--
ALTER TABLE `transac`
  ADD PRIMARY KEY (`transaction_no`),
  ADD KEY `fk_dl` (`delivery_location`),
  ADD KEY `fk_cn` (`credit_card_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `credit_card_no` (`credit_card_no`),
  ADD KEY `address` (`address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transac`
--
ALTER TABLE `transac`
  MODIFY `transaction_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `product_list`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_supplier`
--
ALTER TABLE `product_supplier`
  ADD CONSTRAINT `fk_prod_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_supp_id` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE;

--
-- Constraints for table `transac`
--
ALTER TABLE `transac`
  ADD CONSTRAINT `fk_cn` FOREIGN KEY (`credit_card_no`) REFERENCES `user` (`credit_card_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dl` FOREIGN KEY (`delivery_location`) REFERENCES `user` (`address`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
