-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2017 at 05:29 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `posrecord`
--

CREATE TABLE `posrecord` (
  `posID` int(11) NOT NULL,
  `transNo` int(11) NOT NULL,
  `prodName` varchar(50) NOT NULL,
  `prodPrice` int(11) NOT NULL,
  `prodQuan` int(11) NOT NULL,
  `prodAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posrecord`
--

INSERT INTO `posrecord` (`posID`, `transNo`, `prodName`, `prodPrice`, `prodQuan`, `prodAmount`) VALUES
(1, 0, 'c1', 50, 30, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `prodName` varchar(255) NOT NULL,
  `prodCode` varchar(50) NOT NULL,
  `prodPrice` int(11) NOT NULL,
  `prodQuan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prodName`, `prodCode`, `prodPrice`, `prodQuan`) VALUES
(4, 'c1', 'c1', 50, 55),
(5, 'Shampoo', 's1', 30, 60),
(6, 'Wax 500 ML', 'wx250', 69, 70);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posrecord`
--
ALTER TABLE `posrecord`
  ADD PRIMARY KEY (`posID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posrecord`
--
ALTER TABLE `posrecord`
  MODIFY `posID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
