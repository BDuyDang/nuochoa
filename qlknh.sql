-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2022 at 08:01 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlknh`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdtkh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nuochoa`
--

CREATE TABLE `nuochoa` (
  `manh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tennh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thuonghieu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `xuatxu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `namphathanh` double NOT NULL,
  `gia` double NOT NULL,
  `soluong` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `manh` (`manh`);

--
-- Indexes for table `nuochoa`
--
ALTER TABLE `nuochoa`
  ADD PRIMARY KEY (`manh`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_MANH` FOREIGN KEY (`manh`) REFERENCES `nuochoa` (`manh`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
