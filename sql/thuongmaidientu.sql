-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 30, 2021 lúc 03:27 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thuongmaidientu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'LG'),
(5, 'Sony'),
(7, 'Lenovo'),
(8, 'Apple'),
(13, 'Asus'),
(14, 'Acer'),
(15, 'Sam Sung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'PC'),
(2, 'TV'),
(3, 'Laptop'),
(4, 'Phụ kiện'),
(5, 'Máy ảnh'),
(6, 'Điện thoại');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_keywords` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(48, 3, 7, 'Lenovo ThinkPad T470s', '15490000', '<b>Thương hiệu</b>: <span>Lenovo</span> <br>\r\n<br>\r\n<br>\r\n<b>Vi xử lý</b>: Intel Core i5 6300U, 2 nhân / 4 luồng <br>\r\n<br>\r\n<b>Màn hình</b>: 14\" FHD IPS (1920 x 1080) chống chói <br>\r\n<br>\r\n<b>RAM</b>: 12GB DDR4 bus 2133 MHz (Nâng cấp tối đa 20GB) <br>\r\n<br>\r\n<b>Card đồ họa</b>: Intel HD 520 <br>\r\n<br>\r\n<b>Lưu trữ</b>: 256GB m.2 Sata (Nâng cấp tối đa 2TB) <br>\r\n<br>\r\n<b>Pin</b>: 51 WHr <br>\r\n<br>\r\n<b>Kết nối chính</b>: 1 x USB-C, Thunderbolt 3, 3 x USB-A, 1 x SD <br>\r\n<br>\r\n<b/>Hệ điều hành<b/>: Windows 10 bản quyền <br>\r\n<br>\r\n<b>Màu sắc</b>: Black', 't470s.jpg', '<b>Thương hiệu</b>: <span>Lenovo</span> <br>\r\n<br>\r\n<br>\r\n<b>Vi xử lý</b>: Intel Core i5 6300U, 2 nhân / 4 luồng <br>\r\n<br>\r\n<b>Màn hình</b>: 14\" FHD IPS (1920 x 1080) chống chói <br>\r\n<br>\r\n<b>RAM</b>: 12GB DDR4 bus 2133 MHz (Nâng cấp tối đa 20GB) <br>\r\n<br>\r\n<b>Card đồ họa</b>: Intel HD 520 <br>\r\n<br>\r\n<b>Lưu trữ</b>: 256GB m.2 Sata (Nâng cấp tối đa 2TB) <br>\r\n<br>\r\n<b>Pin</b>: 51 WHr <br>\r\n<br>\r\n<b>Kết nối chính</b>: 1 x USB-C, Thunderbolt 3, 3 x USB-A, 1 x SD <br>\r\n<br>\r\n<b/>Hệ điều hành<b/>: Windows 10 bản quyền <br>\r\n<br>\r\n<b>Màu sắc</b>: Black'),
(49, 3, 7, 'ThinkPad X1 Carbon Gen 7', '24990000', 'Thương hiệu: Lenovo<br>\r\n<br>\r\n<br>\r\nVi xử lý: Intel Core i5 8265U, 4 nhân / 8 luồng<br>\r\n<br>\r\nMàn hình: 14\" FHD IPS (1920 x 1080) chống chói<br>\r\n<br>\r\nĐộ phủ màu: 90% sRGB<br>\r\n<br>\r\nRAM: 8GB LPDDR3 bus 2133 MHz (Nâng cấp tối đa 8GB)<br>\r\n<br>\r\nCard đồ họa: Intel UHD 620<br>\r\n<br>\r\nLưu trữ: 256GB m.2 Nvme (Nâng cấp tối đa 2TB<br>\r\n<br>\r\nPin: 51Wh<br>\r\n<br>\r\nKết nối chính: 2 x USB-C with Thunderbolt 3, 2 x USB-A, 1 x HDMI<br>\r\n<br>\r\nCân nặng: 1.09 kg<br>\r\n<br>\r\nHệ điều hành: Windows 10 bản quyền<br>\r\n<br>\r\nMàu sắc: Black', 'x1-gen7.jpg', '<b>Thương hiệu</b>: <span>Lenovo</span> <br>\r\n<br>\r\n<br>\r\n<b>Vi xử lý</b>: Intel Core i5 6300U, 2 nhân / 4 luồng <br>\r\n<br>\r\n<b>Màn hình</b>: 14\" FHD IPS (1920 x 1080) chống chói <br>\r\n<br>\r\n<b>RAM</b>: 12GB DDR4 bus 2133 MHz (Nâng cấp tối đa 20GB) <br>\r\n<br>\r\n<b>Card đồ họa</b>: Intel HD 520 <br>\r\n<br>\r\n<b>Lưu trữ</b>: 256GB m.2 Sata (Nâng cấp tối đa 2TB) <br>\r\n<br>\r\n<b>Pin</b>: 51 WHr <br>\r\n<br>\r\n<b>Kết nối chính</b>: 1 x USB-C, Thunderbolt 3, 3 x USB-A, 1 x SD <br>\r\n<br>\r\n<b/>Hệ điều hành<b/>: Windows 10 bản quyền <br>\r\n<br>\r\n<b>Màu sắc</b>: Black'),
(50, 3, 2, 'Dell XPS 17 9700', '56990000', 'Thương hiệu: Dell<br>\r\n<br>\r\n<br>\r\nVi xử lý: Intel Core i7-10875H, 8 nhân / 16 luồng<br>\r\n<br>\r\nMàn hình: 17.0\" FHD+ IPS (1920 x 1200), chống chói<br>\r\n<br>\r\nRAM: 16GB DDR4 bus 2933 MHz (Nâng cấp tối đa 64GB)<br>\r\n<br>\r\nCard đồ họa: Nvidia Geforce RTX 2060 6GB<br>\r\n<br>\r\nLưu trữ: 512GB m.2 NVMe (Nâng cấp tối đa 2TB)\r\nPin: 86Wh<br>\r\n<br>\r\nKết nối chính: 4 x USB-C with Thunderbolt 3.0, 1 x SD<br>\r\n<br>\r\nCân nặng: 2.5kg<br>\r\n<br>\r\nHệ điều hành: Windows 10 bản quyền<br>\r\n<br>\r\nMàu sắc: Silver', 'xps9700.jpg', 'Thương hiệu: Dell<br>\r\n<br>\r\n<br>\r\nVi xử lý: Intel Core i7-10875H, 8 nhân / 16 luồng<br>\r\n<br>\r\nMàn hình: 17.0\" FHD+ IPS (1920 x 1200), chống chói<br>\r\n<br>\r\nRAM: 16GB DDR4 bus 2933 MHz (Nâng cấp tối đa 64GB)<br>\r\n<br>\r\nCard đồ họa: Nvidia Geforce RTX 2060 6GB<br>\r\n<br>\r\nLưu trữ: 512GB m.2 NVMe (Nâng cấp tối đa 2TB)\r\nPin: 86Wh<br>\r\n<br>\r\nKết nối chính: 4 x USB-C with Thunderbolt 3.0, 1 x SD<br>\r\n<br>\r\nCân nặng: 2.5kg<br>\r\n<br>\r\nHệ điều hành: Windows 10 bản quyền<br>\r\n<br>\r\nMàu sắc: Silver'),
(51, 3, 1, 'HP ZBook Studio G7', '43990000', 'Thương hiệu: HP<br>\r\n<br>\r\n<br>\r\nVi xử lý: Intel Core i9-10885H, 8 nhân / 16 luồng<br>\r\n<br>\r\nMàn hình: 15.6\" FHD IPS (1920 x 1080) chống chói<br>\r\n<br>\r\nĐộ phủ màu: 95% sRGB, 72% NTSC<br>\r\n<br>\r\nRAM: 16GB DDR4 bus 2933 MHz<br>\r\n<br>\r\nCard đồ họa: Nvidia Quadro T1000 4GB GDDR6<br>\r\n<br>\r\nLưu trữ: 256 GB m.2 NVMe (Nâng cấp tối đa 2TB)<br>\r\n<br>\r\nPin: 83 Wh<br>\r\n<br>\r\nKết nối chính: 1 x USB-A, 2 x USB-C with Thunderbolt 3, 1 x SD, 1 x HDMI<br>\r\n<br>\r\nCân nặng: 1.74kg<br>\r\n<br>\r\nHệ điều hành: Windows 10 bản quyền<br>\r\n<br>\r\nMàu sắc: Dark Grey', 'hpg7.jpg', 'Thương hiệu: HP<br>\r\n<br>\r\n<br>\r\nVi xử lý: Intel Core i9-10885H, 8 nhân / 16 luồng<br>\r\n<br>\r\nMàn hình: 15.6\" FHD IPS (1920 x 1080) chống chói<br>\r\n<br>\r\nĐộ phủ màu: 95% sRGB, 72% NTSC<br>\r\n<br>\r\nRAM: 16GB DDR4 bus 2933 MHz<br>\r\n<br>\r\nCard đồ họa: Nvidia Quadro T1000 4GB GDDR6<br>\r\n<br>\r\nLưu trữ: 256 GB m.2 NVMe (Nâng cấp tối đa 2TB)<br>\r\n<br>\r\nPin: 83 Wh<br>\r\n<br>\r\nKết nối chính: 1 x USB-A, 2 x USB-C with Thunderbolt 3, 1 x SD, 1 x HDMI<br>\r\n<br>\r\nCân nặng: 1.74kg<br>\r\n<br>\r\nHệ điều hành: Windows 10 bản quyền<br>\r\n<br>\r\nMàu sắc: Dark Grey'),
(53, 3, 8, 'Macbook Pro 16 2019', '56490000', 'Thương hiệu: Apple<br>\r\n<br>\r\nVi xử lý: Intel Core i7 6 nhân / 12 luồng<br>\r\n<br>\r\nMàn hình: 16\" Retina (3072 x 1920), gương<br>\r\n<br>\r\nRAM: 16GB DDR4 bus 2666 MHz<br>\r\n<br>\r\nCard đồ họa: AMD Radeon Pro 5300M 4GB<br>\r\n<br>\r\nLưu trữ: 512GB NVMe<br>\r\n<br>\r\nPin: 100Wh<br>\r\n<br>\r\nKết nối chính: 4 x USB-C, Thunderbolt 3<br>\r\n<br>\r\nCân nặng: 2.0 kg<br>\r\n<br>\r\nHệ điều hành: Mac OS X<br>\r\n<br>\r\nMàu sắc: Space Grey', 'MacBook-Pro-16-2019.jpg', 'Thương hiệu: Apple<br>\r\n<br>\r\nVi xử lý: Intel Core i7 6 nhân / 12 luồng<br>\r\n<br>\r\nMàn hình: 16\" Retina (3072 x 1920), gương<br>\r\n<br>\r\nRAM: 16GB DDR4 bus 2666 MHz<br>\r\n<br>\r\nCard đồ họa: AMD Radeon Pro 5300M 4GB<br>\r\n<br>\r\nLưu trữ: 512GB NVMe<br>\r\n<br>\r\nPin: 100Wh<br>\r\n<br>\r\nKết nối chính: 4 x USB-C, Thunderbolt 3<br>\r\n<br>\r\nCân nặng: 2.0 kg<br>\r\n<br>\r\nHệ điều hành: Mac OS X<br>\r\n<br>\r\nMàu sắc: Space Grey\r\nmacbook\r\nmac\r\nmacbôk'),
(54, 3, 2, 'Dell Vostro 13 5301', '19390000', 'Thương hiệu: Dell<br>\r\n<br>\r\nVi xử lý: Intel Core i5 1135G7, 4 nhân / 8 luồng<br>\r\n<br>\r\nMàn hình: 13.3\" FHD IPS (1920 x 1080) chống chói<br>\r\n<br>\r\nĐộ phủ màu: 95% sRGB<br>\r\n<br>\r\nRAM: 8GB LPDDR4x bus 4266 MHz (Hàn thẳng trên mainboard, không thể nâng cấp)<br>\r\n<br>\r\nCard đồ họa: Intel Iris Xe<br>\r\n<br>\r\nLưu trữ: 256GB m.2 NVMe (Nâng cấp tối đa 2TB<br>\r\n<br>\r\nPin: 40Wh<br>\r\n<br>\r\nKết nối chính: 1 x USB-C 3.2 Gen 2 (Hỗ trợ xuất hình và sạc), 2 x USB-A, 1 x HDMI 2.0, 1 x Micro SD<br>\r\n<br>\r\nCân nặng: 1.16kg<br>\r\n<br>\r\nHệ điều hành: Windows 10 Home SL bản quyền<br>\r\n<br>\r\nMàu sắc: Black', 'v5301-02.jpg', 'Thương hiệu: Dell<br>\r\n<br>\r\nVi xử lý: Intel Core i5 1135G7, 4 nhân / 8 luồng<br>\r\n<br>\r\nMàn hình: 13.3\" FHD IPS (1920 x 1080) chống chói<br>\r\n<br>\r\nĐộ phủ màu: 95% sRGB<br>\r\n<br>\r\nRAM: 8GB LPDDR4x bus 4266 MHz (Hàn thẳng trên mainboard, không thể nâng cấp)<br>\r\n<br>\r\nCard đồ họa: Intel Iris Xe<br>\r\n<br>\r\nLưu trữ: 256GB m.2 NVMe (Nâng cấp tối đa 2TB<br>\r\n<br>\r\nPin: 40Wh<br>\r\n<br>\r\nKết nối chính: 1 x USB-C 3.2 Gen 2 (Hỗ trợ xuất hình và sạc), 2 x USB-A, 1 x HDMI 2.0, 1 x Micro SD<br>\r\n<br>\r\nCân nặng: 1.16kg<br>\r\n<br>\r\nHệ điều hành: Windows 10 Home SL bản quyền<br>\r\n<br>\r\nMàu sắc: Black'),
(55, 3, 7, 'ThinkBook 13s G2', '24190000', 'Thương hiệu: Lenovo<br>\r\n<br>\r\nVi xử lý: Intel Core i7-1165G7, 4 nhân / 8 luồng<br>\r\n<br>\r\nMàn hình: 13.3\" 2K WQXGA IPS (2560 x 1600) chống chói, Dolby Vision<br>\r\n<br>\r\nĐộ phủ màu: 100% sRGB<br>\r\n<br>\r\nRAM: 8GB LPDDR4X bus 4266 MHz (Hàn trên bo mạch Không thể nâng cấp)<br>\r\n<br>\r\nCard đồ họa: Intel Iris Xe<br>\r\n<br>\r\nLưu trữ: 512GB m.2 NVMe (Nâng cấp tối đa 2TB<br>\r\n<br>\r\nPin: 56Wh<br>\r\n<br>\r\nKết nối chính: 1 x USB-C tích hợp Thunderbolt 4,  2 x USB-A 3.2 Gen 1, 1 x HDMI 2.0b, 1 x 3.5mm<br>\r\n<br>\r\nCân nặng: 1.26kg<br>\r\n<br>\r\nHệ điều hành: Windows 10 Home SL bản quyền<br>\r\n<br>\r\nMàu sắc: Gray', 'thinkbook13sg2-1.jpg', 'Thương hiệu: Lenovo<br>\r\n<br>\r\nVi xử lý: Intel Core i7-1165G7, 4 nhân / 8 luồng<br>\r\n<br>\r\nMàn hình: 13.3\" 2K WQXGA IPS (2560 x 1600) chống chói, Dolby Vision<br>\r\n<br>\r\nĐộ phủ màu: 100% sRGB<br>\r\n<br>\r\nRAM: 8GB LPDDR4X bus 4266 MHz (Hàn trên bo mạch Không thể nâng cấp)<br>\r\n<br>\r\nCard đồ họa: Intel Iris Xe<br>\r\n<br>\r\nLưu trữ: 512GB m.2 NVMe (Nâng cấp tối đa 2TB<br>\r\n<br>\r\nPin: 56Wh<br>\r\n<br>\r\nKết nối chính: 1 x USB-C tích hợp Thunderbolt 4,  2 x USB-A 3.2 Gen 1, 1 x HDMI 2.0b, 1 x 3.5mm<br>\r\n<br>\r\nCân nặng: 1.26kg<br>\r\n<br>\r\nHệ điều hành: Windows 10 Home SL bản quyền<br>\r\n<br>\r\nMàu sắc: Gray'),
(56, 3, 8, 'Macbook Pro 13', '31900000', 'Thương hiệu: Apple<br>\r\n<br>\r\nVi xử lý: Apple M1, 8 nhân<br>\r\n<br>\r\nMàn hình: 13.3\" Retina (2560 x 1600), gương<br>\r\n<br>\r\nRAM: 8GB LPDDR4x<br>\r\n<br>\r\nCard đồ họa: Apple GPU<br>\r\n<br>\r\nLưu trữ: 256GB NVMe<br>\r\n<br>\r\nPin: 58Wh<br>\r\n<br>\r\nKết nối chính: 2 x USB-C with Thunderbolt 3 + USB4<br>\r\n<br>\r\nCân nặng: 1.4 kg<br>\r\n<br>\r\nHệ điều hành: Mac OS X<br>\r\n<br>\r\nMàu sắc: Space Gray', 'macbook-pro-13-2020.jpg', 'Thương hiệu: Apple<br>\r\n<br>\r\nVi xử lý: Apple M1, 8 nhân<br>\r\n<br>\r\nMàn hình: 13.3\" Retina (2560 x 1600), gương<br>\r\n<br>\r\nRAM: 8GB LPDDR4x<br>\r\n<br>\r\nCard đồ họa: Apple GPU<br>\r\n<br>\r\nLưu trữ: 256GB NVMe<br>\r\n<br>\r\nPin: 58Wh<br>\r\n<br>\r\nKết nối chính: 2 x USB-C with Thunderbolt 3 + USB4<br>\r\n<br>\r\nCân nặng: 1.4 kg<br>\r\n<br>\r\nHệ điều hành: Mac OS X<br>\r\n<br>\r\nMàu sắc: Space Gray\r\nmacbook\r\nmacbôk\r\nmac'),
(60, 4, 15, 'SSD Samsung 870 Evo 2.5\"', '1890000', 'Thương hiệu:\r\nSamsung<br>\r\n<br>\r\nDung lượng: 500GB<br>\r\n<br>\r\nTốc độ đọc: 560MB/s<br>\r\n<br>\r\nTốc độ ghi: 530MB/s<br>\r\n<br>\r\nChuẩn kích thước: 2.5 inch<br>\r\n<br>\r\nChuẩn kết nối: Sata 3 (Có thể tương thích ngược với Sata thế hệ trước)<br>\r\n<br>\r\nĐộ bền: 300TBW<br>\r\n<br>\r\nMàu sắc:\r\nĐen', 'ssd.jpg', 'Thương hiệu: Samsung<br> <br> Dung lượng: 500GB<br> <br> Tốc độ đọc: 560MB/s<br> <br> Tốc độ ghi: 530MB/s<br> <br> Chuẩn kích thước: 2.5 inch<br> <br> Chuẩn kết nối: Sata 3 (Có thể tương thích ngược với Sata thế hệ trước)<br> <br> Độ bền: 300TBW<br> <br> Màu sắc: Đen'),
(61, 4, 15, 'SSD Samsung 970 Evo Plus', '2490000', 'Thương hiệu:\r\nSamsung<br>\r\n<br>\r\nSSD Samsung 970 Evo Plus 500GB<br>\r\n<br>\r\nTốc độ đọc: 3500MB/s<br>\r\n<br>\r\nTốc độ ghi: 3200MB/s<br>\r\n<br>\r\nChuẩn kết nối: m.2 NVMe x4<br>\r\n<br>\r\nMàu sắc:\r\nĐen', 'ssdngon.jpg', 'Thương hiệu: Samsung<br> <br> SSD Samsung 970 Evo Plus 500GB<br> <br> Tốc độ đọc: 3500MB/s<br> <br> Tốc độ ghi: 3200MB/s<br> <br> Chuẩn kết nối: m.2 NVMe x4<br> <br> Màu sắc: Đen'),
(62, 1, 7, 'Lenovo ThinkCentre', '11990000', 'Thương hiệu:\r\nLenovo<br>\r\n<br>\r\nVi xử lý: Intel Core i5 8400, 6 nhân / 6 luồng<br>\r\n<br>\r\nRAM: 8GB DDR4 bus 2666 MHz (Nâng cấp tối đa 64GB<br>\r\n<br>\r\nCard đồ họa: Intle UHD 630<br>\r\n<br>\r\nLưu trữ: 1TB HDD<br>\r\n<br>\r\nKết nối chính: 1 x USB-C, 8 x USB-A, 1 x SD<br>\r\n<br>\r\nHệ điều hành: Windows 10 bản quyền<br>\r\n<br>\r\nMàu sắc:\r\nBlack', 'pclnv.jpg', 'Thương hiệu: Lenovo<br> <br> Vi xử lý: Intel Core i5 8400, 6 nhân / 6 luồng<br> <br> RAM: 8GB DDR4 bus 2666 MHz (Nâng cấp tối đa 64GB<br> <br> Card đồ họa: Intle UHD 630<br> <br> Lưu trữ: 1TB HDD<br> <br> Kết nối chính: 1 x USB-C, 8 x USB-A, 1 x SD<br> <br> Hệ điều hành: Windows 10 bản quyền<br> <br> Màu sắc: Black'),
(63, 1, 2, 'Dell Gaming G5 5000', '38990000', 'Thương hiệu:\r\nDell<br>\r\n<br>\r\nVi xử lý: Intel Core i7 10700F, 8 nhân / 16 luồng<br>\r\n<br>\r\nRAM: 16GB DDR4 bus 2933 MHz (8GB x 2 - Nâng cấp tối đa 128GB)<br>\r\n<br>\r\nCard đồ họa: Nvidia Geforce RTX 2060 Super 8GB<br>\r\n<br>\r\nLưu trữ: SSD 256GB m.2 NVMe + 1TB HDD<br>\r\n<br>\r\nKết nối chính: Mặt trước: 1x USB-C 3.1 Gen 1, 2 x USB-A 2.0, 1 x USB-A 3.1 Gen 1, 1 x Audio 3.5mm, 1 x Micro 3.5mm; Mặt sau: 1 x RJ-45, 4 x USB-A 3.1 Gen 1, 2  x USB-A 2.0, 1 x Audio 3.5mm, 1 x Headset 3.5mm, 1 x Microphone 3.5mm<br>\r\n<br>\r\nCân nặng: 8.2kg<br>\r\n<br>\r\nHệ điều hành: Windows 10 bản quyền<br>\r\n<br>\r\nMàu sắc:\r\nĐen', 'dellgr.jpg', 'Thương hiệu: Dell<br> <br> Vi xử lý: Intel Core i7 10700F, 8 nhân / 16 luồng<br> <br> RAM: 16GB DDR4 bus 2933 MHz (8GB x 2 - Nâng cấp tối đa 128GB)<br> <br> Card đồ họa: Nvidia Geforce RTX 2060 Super 8GB<br> <br> Lưu trữ: SSD 256GB m.2 NVMe + 1TB HDD<br> <br> Kết nối chính: Mặt trước: 1x USB-C 3.1 Gen 1, 2 x USB-A 2.0, 1 x USB-A 3.1 Gen 1, 1 x Audio 3.5mm, 1 x Micro 3.5mm; Mặt sau: 1 x RJ-45, 4 x USB-A 3.1 Gen 1, 2  x USB-A 2.0, 1 x Audio 3.5mm, 1 x Headset 3.5mm, 1 x Microphone 3.5mm<br> <br> Cân nặng: 8.2kg<br> <br> Hệ điều hành: Windows 10 bản quyền<br> <br> Màu sắc: Đen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ip_address`, `name`, `email`, `password`, `country`, `city`, `contact`, `user_address`, `image`, `role`) VALUES
(13, '127.0.0.1', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'VN', 'Ha Tinh', '0383074348', 'Thach Hai - Thach Ha - Ha Tinh', 'L1 (1).png', 'admin'),
(16, '127.0.0.1', 'Long', 'user@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'VN', 'Ha Tinh', '99999999999', 'Thach Ha', 'pexels-johannes-rapprich-2508810.jpg', 'guest');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
