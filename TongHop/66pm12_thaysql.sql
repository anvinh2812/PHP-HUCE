-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 05:03 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `66pm12`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `cname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cdesc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cimage` varchar(200) NOT NULL,
  `corder` tinyint(4) NOT NULL,
  `cstatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `cname`, `cdesc`, `cimage`, `corder`, `cstatus`) VALUES
(1, 'Samsung', 'HÃ£ng Ä‘iá»‡n thoáº¡i ná»•i tiáº¿ng HÃ n Quá»‘c', 'samsung.jpg', 1, 1),
(2, 'Apple', 'Äiá»‡n thoáº¡i ná»•i tiáº¿ng toÃ n cáº§u', 'apple.jpg', 2, 1),
(3, 'Sony', 'Äiá»‡n thoáº¡i ná»•i tiáº¿ng Nháº­t Báº£n', 'nokia.jpg', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pdesc` text NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `pprice` decimal(10,0) NOT NULL,
  `pquantity` int(11) NOT NULL,
  `porder` int(11) NOT NULL,
  `pinsertdate` date NOT NULL,
  `pupdatedate` date NOT NULL,
  `cid` int(11) NOT NULL,
  `pstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `code`, `pname`, `pdesc`, `pimage`, `pprice`, `pquantity`, `porder`, `pinsertdate`, `pupdatedate`, `cid`, `pstatus`) VALUES
(1, 'a1', 'Galaxy Note 10 Plus', 'Dien thoai cua toi', 'galaxy.jpg', '8000000', 10, 1, '2023-10-17', '2023-10-17', 1, 1),
(2, 'a2', 'Samssung S24', 'Dong cao cap nhat hien nay', 'samsung.jpg', '30000000', 24, 2, '2023-10-16', '2023-10-17', 1, 1),
(3, 'a3', 'Galaxy Note 11 Plus', '?i?n tho?i c?a tôi', 'galaxy.jpg', '8000000', 10, 1, '2023-10-17', '2023-10-17', 2, 1),
(4, 'a4', 'Samssung S25', 'Dong cao cap nhat hien nay', 'samsung.jpg', '30000000', 24, 2, '2023-10-16', '2023-10-17', 2, 1),
(5, 'a5', 'Galaxy Note 12 Plus', '?i?n tho?i c?a tôi', 'galaxy.jpg', '8000000', 10, 1, '2023-10-17', '2023-10-17', 2, 1),
(6, 'a6', 'Samssung S26', 'Dong cao cap nhat hien nay', 'samsung.jpg', '30000000', 24, 2, '2023-10-16', '2023-10-17', 2, 1),
(7, 'a7', 'Galaxy Note 14 Plus', '?i?n tho?i c?a tôi', 'galaxy.jpg', '8000000', 10, 1, '2023-10-17', '2023-10-17', 2, 1),
(8, 'a8', 'Samssung S27', 'Dong cao cap nhat hien nay', 'samsung.jpg', '30000000', 24, 2, '2023-10-16', '2023-10-17', 2, 1),
(9, 'a9', 'iphone 14', 'test', 'apple.jpg', '15000000', 10, 0, '0000-00-00', '0000-00-00', 1, 1),
(10, 'a10', 'iphone pro max 14', '', 'apple.jpg', '200000000', 12, 0, '0000-00-00', '0000-00-00', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
