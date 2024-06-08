-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 08, 2024 lúc 04:47 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyrapphim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loairap`
--

CREATE TABLE `loairap` (
  `MaLoaiRap` int(11) NOT NULL,
  `TatCaRap` varchar(255) NOT NULL,
  `RapDacBiet` varchar(255) NOT NULL,
  `RapSapMo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `MaPhim` int(11) NOT NULL,
  `TenPhim` varchar(255) NOT NULL,
  `TheLoai` varchar(100) NOT NULL,
  `ThoiLuong` int(11) NOT NULL,
  `KhoiChieu` date NOT NULL,
  `Anh` varchar(255) NOT NULL,
  `MaRap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rap`
--

CREATE TABLE `rap` (
  `MaRap` int(11) NOT NULL,
  `TenRap` varchar(255) NOT NULL,
  `TinhThanhPho` int(11) NOT NULL,
  `SDTRap` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `raploairap`
--

CREATE TABLE `raploairap` (
  `MaRap` int(11) NOT NULL,
  `MaLoaiRap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TenTK` varchar(50) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SDT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhthanhpho`
--

CREATE TABLE `tinhthanhpho` (
  `MaTinhThanh` int(11) NOT NULL,
  `TenTinhThanh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhthanhphorap`
--

CREATE TABLE `tinhthanhphorap` (
  `MaTinhThanh` int(11) NOT NULL,
  `MaRap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loairap`
--
ALTER TABLE `loairap`
  ADD PRIMARY KEY (`MaLoaiRap`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`MaPhim`),
  ADD KEY `MaRap` (`MaRap`);

--
-- Chỉ mục cho bảng `rap`
--
ALTER TABLE `rap`
  ADD PRIMARY KEY (`MaRap`),
  ADD KEY `TinhThanhPho` (`TinhThanhPho`);

--
-- Chỉ mục cho bảng `raploairap`
--
ALTER TABLE `raploairap`
  ADD PRIMARY KEY (`MaRap`,`MaLoaiRap`),
  ADD KEY `MaLoaiRap` (`MaLoaiRap`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TenTK`);

--
-- Chỉ mục cho bảng `tinhthanhpho`
--
ALTER TABLE `tinhthanhpho`
  ADD PRIMARY KEY (`MaTinhThanh`);

--
-- Chỉ mục cho bảng `tinhthanhphorap`
--
ALTER TABLE `tinhthanhphorap`
  ADD PRIMARY KEY (`MaTinhThanh`,`MaRap`),
  ADD KEY `MaRap` (`MaRap`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `phim_ibfk_1` FOREIGN KEY (`MaRap`) REFERENCES `rap` (`MaRap`);

--
-- Các ràng buộc cho bảng `rap`
--
ALTER TABLE `rap`
  ADD CONSTRAINT `rap_ibfk_1` FOREIGN KEY (`TinhThanhPho`) REFERENCES `tinhthanhpho` (`MaTinhThanh`);

--
-- Các ràng buộc cho bảng `raploairap`
--
ALTER TABLE `raploairap`
  ADD CONSTRAINT `raploairap_ibfk_1` FOREIGN KEY (`MaRap`) REFERENCES `rap` (`MaRap`),
  ADD CONSTRAINT `raploairap_ibfk_2` FOREIGN KEY (`MaLoaiRap`) REFERENCES `loairap` (`MaLoaiRap`);

--
-- Các ràng buộc cho bảng `tinhthanhphorap`
--
ALTER TABLE `tinhthanhphorap`
  ADD CONSTRAINT `tinhthanhphorap_ibfk_1` FOREIGN KEY (`MaTinhThanh`) REFERENCES `tinhthanhpho` (`MaTinhThanh`),
  ADD CONSTRAINT `tinhthanhphorap_ibfk_2` FOREIGN KEY (`MaRap`) REFERENCES `rap` (`MaRap`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
