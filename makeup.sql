-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2022 at 06:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makeup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `pass`) VALUES
('s21107192', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'shumokh', 'shaabdullah@effat.edu.sa', 'subject1', 'Message1'),
(4, 'lulu', 'lulu@gamil.com', 'subject2', 'Message2'),
(5, 'Ghaya', 'ghaya@gmail.com', 'subject3', 'message3');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `productID` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` int(6) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`productID`, `name`, `image`, `price`, `type`) VALUES
(1, 'Dior Lip Glow Oil', 'makeup-p1.jpg', 99, 'makeup'),
(2, 'Tarte clay play face shaping palette', 'makeup2.jpg', 150, 'makeup'),
(3, 'Clarifying Lotion - Dry to Combination Skin 200ml', 'makeup-p2.jpg', 49, 'skincare'),
(4, 'Almond Shampoo L\'OCCITANE', 'locost2.jpg', 99, 'haircare'),
(5, 'FENTY BEAUTYDiamond Bomb All Over Diamond Veil', 'makeup3.jpg', 101, 'makeup'),
(6, 'DIOR Miss Dior Set Limited Edition Gift Set', 'perfume2.jpg', 650, 'perfume'),
(7, 'Shea Ultra Light Body Cream LOCCITANE', 'locost3.jpg', 199, 'skincare'),
(8, 'Redken Color Extend Shampoo', 'haircare-p1.jpg', 199, 'haircare'),
(9, 'Juicy Satin Lipstick FENTY BUEATY', 'makeup4.jpg', 149, 'makeup'),
(10, 'MAC Desert Rose Powder Blush', 'makeup-mac.jpg', 99, 'makeup');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(6) NOT NULL,
  `Custmername` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `Custmername`, `Address`) VALUES
(1, 'ghaya', 'jeddah- alfayha district'),
(4, 'shumokh ', 'jeddah- alharazat district'),
(6, 'lulu', 'jeddah- alfayha district');

-- --------------------------------------------------------

--
-- Table structure for table `orderItem`
--

CREATE TABLE `orderItem` (
  `orderID` int(6) NOT NULL,
  `productID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderItem`
--

INSERT INTO `orderItem` (`orderID`, `productID`) VALUES
(1, 1),
(4, 5),
(6, 2),
(6, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `orderItem`
--
ALTER TABLE `orderItem`
  ADD PRIMARY KEY (`orderID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderItem`
--
ALTER TABLE `orderItem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `item` (`productID`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
