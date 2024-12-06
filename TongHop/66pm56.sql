-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 09:01 AM
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
-- Database: `66pm56`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cdesc` text NOT NULL,
  `cimage` varchar(255) NOT NULL,
  `corder` int(11) NOT NULL,
  `cstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `cname`, `cdesc`, `cimage`, `corder`, `cstatus`) VALUES
(1, 'Samsung', 'HÃ£ng Ä‘iá»‡n thoáº¡i hot nháº¥t HÃ n Quá»‘c', 'samsung.jpg', 1, 1),
(2, 'Apple', 'HÃ£ng Ä‘iá»‡n thoáº¡i ná»•i tiáº¿ng toÃ n cáº§u', 'apple.jpg', 2, 1),
(3, 'Nokia', 'HÃ£ng Ä‘iá»‡n thoáº¡i hot nháº¥t HÃ n Quá»‘c', 'samsung.jpg', 1, 1),
(4, 'Sony', 'HÃ£ng Ä‘iá»‡n thoáº¡i ná»•i tiáº¿ng toÃ n cáº§u', 'apple.jpg', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
