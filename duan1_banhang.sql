-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2024 at 05:25 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1_banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int NOT NULL,
  `noidung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_nguoidung` int NOT NULL,
  `id_sp` int DEFAULT NULL,
  `ngaybinhluan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `id_nguoidung`, `id_sp`, `ngaybinhluan`) VALUES
(44, 'Đồng hồ đẹp quá', 2, 49, '06/12/2023'),
(45, 'Đồng hồ Đẹp quá đi ', 2, 45, '06/12/2023'),
(46, 'Đồng hồ đẹp thật', 2, 45, '06/12/2023');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL,
  `tendm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendm`, `img`) VALUES
(32, 'Đồng hồ Nam', 'quan72.JPG'),
(33, 'Đồng hồ Nữ', 'ao13.jpg'),
(34, 'Cặp đôi', 'quan12.jpg'),
(35, 'Quần đùi', 'quan27.JPG'),
(36, 'Áo gió', 'ao27.jpg'),
(37, 'Giày da', '50.jpg'),
(38, 'Áo khoác', 'ao41.jpg'),
(40, 'Sơ mi', 'ao21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int NOT NULL,
  `nguoidung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoigian_mua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_thanhtoan` int NOT NULL,
  `soluong` int NOT NULL,
  `id_trangthai_donhang` int NOT NULL DEFAULT '1',
  `id_taikhoan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `nguoidung`, `sdt`, `email`, `diachi`, `thoigian_mua`, `pt_thanhtoan`, `soluong`, `id_trangthai_donhang`, `id_taikhoan`) VALUES
(2, 'ronaldohaha  nha', '0948327283', 'ronaldo@gmail.com', 'Bồ Đào Nha', '05/12/2023', 0, 2, 3, 1),
(12, 'Đỗ Khánh Vũ    ', '0936273444', 'khanhvux@gmail.com', 'Thôn Bến - Xã Dị Nậu - Thạch Thất - Hà Nội', '06/12/2023', 0, 1, 8, 2),
(17, 'Đỗ Khánh Vũ     ', '0936273444', 'khanhvux@gmail.com', 'Thôn Bến - Xã Dị Nậu - Thạch Thất - Hà Nội', '23/11/2024', 0, 2, 1, 2),
(18, 'ronaldohaha  ', '0912345678', 'ronaldo@gmail.com', 'ok văn kê', '24/11/2024', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` int NOT NULL,
  `id_tk` int NOT NULL,
  `id_sp` int NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `giasp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int NOT NULL,
  `id_donhang` int NOT NULL,
  `id_trangthai_donhang` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`id`, `id_tk`, `id_sp`, `tensp`, `img`, `giasp`, `soluong`, `id_donhang`, `id_trangthai_donhang`) VALUES
(3, 1, 45, 'datejust', 'ao41.jpg', '350.000', 1, 2, 1),
(4, 1, 38, 'submariner', 'quan36.jpg', '500.000', 1, 2, 1),
(5, 2, 45, 'gmt-master-ii', 'ao41.jpg', '350.000 ', 1, 3, 1),
(6, 2, 44, 'day-date', 'ao27.jpg', '250.000 ₫', 1, 4, 1),
(7, 2, 49, 'cosmograph-daytona', 'ao21.jpg', '250.000 ₫', 1, 5, 1),
(8, 2, 38, 'oyster-perpetual', 'quan36.jpg', '500.000', 1, 6, 1),
(9, 2, 45, 'yacht-master', 'ao41.jpg', '350.000 ₫', 1, 7, 1),
(10, 2, 49, 'sea-dweller', 'ao21.jpg', '250.000', 1, 8, 1),
(11, 2, 38, 'deepsea', 'quan36.jpg', '500.000', 1, 9, 1),
(12, 2, 46, 'air-king', 'ao43.jpg', '350.000', 1, 10, 1),
(13, 2, 49, 'explorer', 'ao21.jpg', '250.000 ₫', 1, 11, 1),
(14, 2, 44, 'lady-datejust', 'ao27.jpg', '250.000 ₫', 1, 12, 1),
(15, 2, 40, 'sky-dweller', 'ao28.jpg', '250.000 ₫', 1, 13, 1),
(16, 2, 41, '1908', 'quan28.JPG', '300.000 ₫', 2, 13, 1),
(17, 2, 49, 'Sơ mi cộc tay', 'ao21.jpg', '250.000 ₫', 1, 14, 1),
(18, 2, 35, 'Quần âu xanh kẻ caro', 'quan48.JPG', '350.000 ₫', 1, 15, 1),
(19, 2, 44, 'Áo gió xanh rêu', 'ao27.jpg', '250.000 ₫', 1, 16, 1),
(20, 2, 34, 'Quần âu đen', 'quan63.JPG', '300.000', 1, 17, 1),
(21, 2, 49, 'Sơ mi cộc tay', 'ao21.jpg', '250.000', 1, 17, 1),
(22, 1, 44, 'Áo gió xanh rêu', 'ao27.jpg', '250.000', 3, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `name_role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'Admin'),
(2, 'Nhân viên'),
(3, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `giasp` decimal(10,3) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `iddm` int NOT NULL,
  `id_sptheomua` int NOT NULL,
  `soluong` int DEFAULT NULL,
  `luotxem` int DEFAULT NULL,
  `trangthai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `giasp`, `img`, `mota`, `iddm`, `id_sptheomua`, `soluong`, `luotxem`, `trangthai`) VALUES
(26, 'Áo phông phong cách', 300.000, 'ao13.jpg', 'Áo phông mẫu mới nhất', 33, 2, 5, 10, 0),
(31, 'Áo phông xám', 350.000, 'ao4.jpg', 'Áo mới hot nhất năm nay', 33, 2, 5, 15, 0),
(32, 'Áo phông xanh', 500.000, 'ao3.jpg', 'Mẫu mới nhất năm nay nhanh tay ! nhanh tay !', 33, 1, 0, 20, 0),
(33, 'Quần âu nâu đất', 300.000, 'quan7.jpg', 'QUần âu mới về giá hợp túi tiền', 32, 3, 0, 5, 0),
(34, 'Quần âu đen', 300.000, 'quan63.JPG', 'Quần âu nam phong cách', 32, 2, 0, 7, 0),
(35, 'Quần âu xanh kẻ caro', 350.000, 'quan48.JPG', 'Quần áo phong cách Âu Mỹ', 32, 3, 0, 2, 0),
(36, 'Quần âu xám caro', 300.000, 'quan57.JPG', 'Quần âu mẫu mới về', 32, 1, 0, 7, 0),
(37, 'Quần bò phong cách', 350.000, 'quan12.jpg', 'Mẫu mới Hàn Quốc', 34, 3, 0, 9, 0),
(38, 'Quần đùi mùa hè', 500.000, 'quan36.jpg', 'Chất liều bền, đẹp', 35, 2, 6, 2, 0),
(39, 'Giày da nâu', 250.000, '50.jpg', 'Giày da đẹp siêu bền', 37, 2, 6, 15, 0),
(40, 'Áo gió xanh', 250.000, 'ao28.jpg', 'Áo gió đẹp', 36, 4, 2, 19, 0),
(41, 'Quần đùi bò ', 300.000, 'quan28.JPG', 'Quần đùi bò đẹp, bền ', 35, 1, 8, 11, 0),
(42, 'Quần bò xanh đậm', 255.000, 'quan15.jpg', 'Quần bò đẹp siêu bền', 34, 1, 8, 2, 0),
(43, 'Áo gió xám', 300.000, 'ao29.jpg', 'Áo gió chất liệu bền', 36, 4, 8, 2, 0),
(44, 'Áo gió xanh rêu', 250.000, 'ao27.jpg', 'Áo gió siêu đẹp, giá hời', 36, 4, 10, 2, 0),
(45, 'Áo khoác nâu trắng', 350.000, 'ao41.jpg', 'Đông đã về nhanh tay đặt mua ngay', 38, 4, 10, 0, 0),
(46, 'Áo khoác  đen có mũ ', 350.000, 'ao43.jpg', 'Áo khoác đẹp giá rẻ ', 38, 3, 10, 7, 0),
(49, 'Sơ mi cộc tay', 250.000, 'ao21.jpg', 'Áo sơ mi chất liệu cotton', 40, 1, 10, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sptheomua`
--

CREATE TABLE `sptheomua` (
  `id_mua` int NOT NULL,
  `ten_mua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sptheomua`
--

INSERT INTO `sptheomua` (`id_mua`, `ten_mua`) VALUES
(1, 'Xuân'),
(2, 'Hạ'),
(3, ' Thu'),
(4, 'Đông');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int NOT NULL,
  `nguoidung` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` int NOT NULL DEFAULT '3' COMMENT '1- Admin\r\n2-Nhân viên,\r\n3-Khách hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `nguoidung`, `matkhau`, `email`, `img`, `diachi`, `sdt`, `id_role`) VALUES
(1, 'ronaldohaha  ', '123456789', 'ronaldo@gmail.com', 'download.jpg', 'ok văn kê', '0912345678', 1),
(2, 'Đỗ Khánh Vũ     ', '1234567899', 'khanhvux@gmail.com', 'anh4.jpg', 'Thôn Bến - Xã Dị Nậu - Thạch Thất - Hà Nội', '0936273444', 1),
(3, 'Đặng Quang Vinh ', '44444444', 'vinhdq@gmail.com', 'anh4.jpg', 'Hà Nội', '0948327283', 3),
(4, 'Trần Đăng Diện ', '44446666', 'dientd@gmail.com', 'anh4.jpg', 'Hà Nội - Việt Nam', '0912345678', 3),
(5, 'Nguyễn Văn A', '444666888', 'a@gmail.com', '16.jpg', 'Japan', '096364724', 3),
(6, 'Nguyễn Thị Lan', '12345678', 'lannt@gmail.com', 'anh5.jpg', 'Hòa Bình', '09374626472', 3),
(7, 'Messi', '1012345678', 'messi@gmail.com', 'tay1.webp', 'Argentina', '09647263747', 3),
(8, 'Nguyễn Thúy  ', '12345678910', 'thuyn@gamil.com', 'tay2.jpg', 'Hà Nội - Việt Nam', '09462648287', 3);

-- --------------------------------------------------------

--
-- Table structure for table `trangthai_donhang`
--

CREATE TABLE `trangthai_donhang` (
  `id_trangthai` int NOT NULL,
  `ten_trangthai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trangthai_donhang`
--

INSERT INTO `trangthai_donhang` (`id_trangthai`, `ten_trangthai`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Đang xử lý'),
(4, 'Đang vận chuyển'),
(5, 'Giao hàng thành công'),
(6, 'Chờ thanh toán'),
(7, 'Đã thanh toán'),
(8, 'Đã hủy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_binhluan_sanpham` (`id_sp`),
  ADD KEY `lk_binhluan_taikhoan` (`id_nguoidung`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_donhang_trangthai_donhang` (`id_trangthai_donhang`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`),
  ADD KEY `lk_sanpham_sptheomua` (`id_sptheomua`);

--
-- Indexes for table `sptheomua`
--
ALTER TABLE `sptheomua`
  ADD PRIMARY KEY (`id_mua`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_taikhoan_role` (`id_role`);

--
-- Indexes for table `trangthai_donhang`
--
ALTER TABLE `trangthai_donhang`
  ADD PRIMARY KEY (`id_trangthai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sptheomua`
--
ALTER TABLE `sptheomua`
  MODIFY `id_mua` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trangthai_donhang`
--
ALTER TABLE `trangthai_donhang`
  MODIFY `id_trangthai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `lk_binhluan_sanpham` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_binhluan_taikhoan` FOREIGN KEY (`id_nguoidung`) REFERENCES `taikhoan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `lk_donhang_trangthai_donhang` FOREIGN KEY (`id_trangthai_donhang`) REFERENCES `trangthai_donhang` (`id_trangthai`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`),
  ADD CONSTRAINT `lk_sanpham_sptheomua` FOREIGN KEY (`id_sptheomua`) REFERENCES `sptheomua` (`id_mua`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `lk_taikhoan_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
