-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2022 at 06:49 PM
-- Server version: 5.7.38
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `burgosd2_337-Shoe-Store`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminAccount`
--

CREATE TABLE `adminAccount` (
  `name` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userPassword` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderItems`
--

CREATE TABLE `orderItems` (
  `orderId` int(11) NOT NULL,
  `shoeId` int(11) NOT NULL,
  `shoeSize` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderItems`
--

INSERT INTO `orderItems` (`orderId`, `shoeId`, `shoeSize`) VALUES
(24, 2, '2'),
(24, 3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `orderPayment`
--

CREATE TABLE `orderPayment` (
  `orderId` int(11) NOT NULL,
  `cardName` varchar(255) NOT NULL,
  `cardNum` varchar(100) NOT NULL,
  `cardExp` varchar(10) NOT NULL,
  `cardCvv` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderPayment`
--

INSERT INTO `orderPayment` (`orderId`, `cardName`, `cardNum`, `cardExp`, `cardCvv`) VALUES
(24, 'Delvis Burgos', '123122', '1221', '1212'),
(79, 'Delvis Burgos', '123122', '1221', '1212'),
(451, 'Delvis Burgos', '234324332', '121', '121');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipCode` int(10) NOT NULL,
  `totalAmount` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `email`, `name`, `address`, `state`, `zipCode`, `totalAmount`) VALUES
(24, 'delvisb4800@gmail.com', 'Delvis Burgos', '245 Linden Ave', 'New Jersey', 7109, 380),
(79, 'delvisb4800@gmail.com', 'Delvis Burgos', '245 Linden Ave', 'New Jersey', 7109, 380),
(451, 'delvisb4800@gmail.com', 'Delvis Burgos', '245 Linden Ave', 'New Jersey', 7109, 380);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `name` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `shoeId` int(11) NOT NULL,
  `shoeName` varchar(100) NOT NULL,
  `shoeDescription` varchar(100) NOT NULL,
  `shoePrice` float NOT NULL,
  `shoeImg` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoeId`, `shoeName`, `shoeDescription`, `shoePrice`, `shoeImg`) VALUES
(3, 'Retro 1 University Blue', 'White/Blue/Black', 180, 'image3.png'),
(2, 'Retro 11 Cool Grey', 'Grey/White', 200, 'image2.png'),
(1, 'Retro 1 Patent Breds', 'Red/Black', 200, 'image1.png'),
(5, 'Sacai Fragments', 'Blue/White', 190, 'image5.png'),
(6, 'Mambacita Sweet16', 'White/Black', 200, 'image6.png'),
(7, 'Zebra 350s', 'White/Black', 215, 'image7.png'),
(8, 'Wave Runners 700s', 'Blue/White', 220, 'image8.png'),
(9, 'Static 500s', 'Grey/White', 230, 'image9.png'),
(4, 'Low Dunks Pandas', 'White/Black', 180, 'image4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderPayment`
--
ALTER TABLE `orderPayment`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
