-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 10:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyxemphim2`
--

-- --------------------------------------------------------

--
-- Table structure for table `phim`
--

CREATE TABLE `phim` (
  `MaPhim` varchar(15) NOT NULL,
  `TenPhim` varchar(30) DEFAULT NULL,
  `TheLoai` varchar(255) DEFAULT NULL,
  `ThoiLuong` int(10) DEFAULT NULL,
  `KhoiChieu` time(6) DEFAULT NULL,
  `Anh` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rap`
--

CREATE TABLE `rap` (
  `MaRap` varchar(255) NOT NULL,
  `TenRap` varchar(30) DEFAULT NULL,
  `DiaChi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` varchar(15) NOT NULL,
  `TenTK` varchar(30) NOT NULL,
  `MatKhau` varchar(30) NOT NULL,
  `DiaChi` varchar(30) DEFAULT NULL,
  `NgaySinh` time(6) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `SDT` varchar(15) DEFAULT NULL,
  `TenNguoiDung` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vephim`
--

CREATE TABLE `vephim` (
  `MaTK` varchar(15) NOT NULL,
  `Phim` varchar(15) NOT NULL,
  `MaRap` varchar(255) NOT NULL,
  `MaVePhim` varchar(15) NOT NULL,
  `ThoiGianVe` int(10) DEFAULT NULL,
  `SoNguoi` int(10) DEFAULT NULL,
  `GiaVe` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`MaPhim`);

--
-- Indexes for table `rap`
--
ALTER TABLE `rap`
  ADD PRIMARY KEY (`MaRap`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- Indexes for table `vephim`
--
ALTER TABLE `vephim`
  ADD PRIMARY KEY (`MaVePhim`),
  ADD KEY `FKVEPHIM112359` (`MaTK`),
  ADD KEY `FKVEPHIM772137` (`Phim`),
  ADD KEY `FKVEPHIM437740` (`MaRap`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vephim`
--
ALTER TABLE `vephim`
  ADD CONSTRAINT `FKVEPHIM112359` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`),
  ADD CONSTRAINT `FKVEPHIM437740` FOREIGN KEY (`MaRap`) REFERENCES `rap` (`MaRap`),
  ADD CONSTRAINT `FKVEPHIM772137` FOREIGN KEY (`Phim`) REFERENCES `phim` (`MaPhim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
