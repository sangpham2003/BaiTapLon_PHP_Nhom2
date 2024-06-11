-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 04:37 PM
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
-- Database: `quanlyphim`
--

-- --------------------------------------------------------

--
-- Table structure for table `phim`
--

CREATE TABLE `phim` (
  `MaPhim` varchar(15) NOT NULL,
  `TenPhim` varchar(30) DEFAULT NULL,
  `TheLoai` varchar(255) DEFAULT NULL,
  `ThoiLuong` varchar(30) DEFAULT NULL,
  `KhoiChieu` time(6) DEFAULT NULL,
  `Anh` varchar(30) DEFAULT NULL,
  `MoTa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `MaPhong` int(11) NOT NULL,
  `TenPhong` int(11) DEFAULT NULL,
  `MaRap` varchar(255) NOT NULL,
  `SoLuongGhe` int(11) DEFAULT NULL
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
  `MaVe` int(11) NOT NULL,
  `PHIMMaPhim` varchar(15) NOT NULL,
  `MaTK` varchar(15) NOT NULL,
  `MaPhong` int(11) NOT NULL,
  `LichChieu` int(11) DEFAULT NULL,
  `ViTri` int(11) DEFAULT NULL
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
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`),
  ADD KEY `FKPHONG351691` (`MaRap`);

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
  ADD PRIMARY KEY (`MaVe`),
  ADD KEY `FKVEPHIM327365` (`PHIMMaPhim`),
  ADD KEY `FKVEPHIM112359` (`MaTK`),
  ADD KEY `FKVEPHIM696893` (`MaPhong`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `MaPhong` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vephim`
--
ALTER TABLE `vephim`
  MODIFY `MaVe` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `FKPHONG351691` FOREIGN KEY (`MaRap`) REFERENCES `rap` (`MaRap`);

--
-- Constraints for table `vephim`
--
ALTER TABLE `vephim`
  ADD CONSTRAINT `FKVEPHIM112359` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`),
  ADD CONSTRAINT `FKVEPHIM327365` FOREIGN KEY (`PHIMMaPhim`) REFERENCES `phim` (`MaPhim`),
  ADD CONSTRAINT `FKVEPHIM696893` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
