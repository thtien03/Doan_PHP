-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2023 lúc 09:26 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `techstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` varchar(253) NOT NULL,
  `caption` varchar(200) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `caption`, `content`, `photo`, `status`, `create_at`) VALUES
('2', 'Mùa hè sôi động', 'Nhanh chân nào bạn tôi ơi', 'slide2.jpg', 1, '2022-07-07 00:00:00'),
('3', 'Mua 1 tặng 1', 'Nhanh chân nào bạn tôi ơi', 'slide3.jpg', 1, '2022-07-07 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brand_id` varchar(253) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brand_id`, `name`, `status`, `created_at`) VALUES
('1', 'Apple', 1, '2022-03-21 00:00:00'),
('2', 'Samsung', 1, '2022-04-07 15:24:28'),
('3', 'Oppo', 2, '2022-04-07 15:24:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` varchar(253) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `name`, `status`, `created_at`) VALUES
('1', 'Điện thoại', 1, '2022-03-21 00:00:00'),
('2', 'Máy tính bảng', 0, '2022-03-21 00:00:00'),
('3', 'Đồng hồ', 0, '2022-03-21 00:00:00'),
('4', 'Laptop', 0, '2022-03-21 00:00:00'),
('5', 'Phụ kiện', 0, '2022-03-21 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `color_id` varchar(253) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`color_id`, `name`, `code`) VALUES
('1', 'Đen', ''),
('2', 'Trắng', ''),
('3', 'Đỏ', ''),
('4', 'Vàng', ''),
('8', 'Xanh', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `employee_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `feedback_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(253) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `phone`, `birthday`, `gender`, `email`, `address`, `password`, `status`, `created_at`) VALUES
('1', 'Gia Phuc', '0364536930', '2022-04-03 00:00:00', 1, 'a@gmail.com', '34 Hai Bà Trưng', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00'),
('24', 'Phan Minh Hùng', '0899933868', '0000-00-00 00:00:00', 0, 'b@gmail.com', '695 xô viết nghệ tĩnh', '202cb962ac59075b964b07152d234b70', 1, '2022-04-14 03:39:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `employee_id` varchar(253) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `role_id` varchar(253) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `gender`, `birthday`, `phone`, `email`, `password`, `status`, `role_id`, `created_at`) VALUES
('1', 'giaphuc', 1, '2022-04-18 00:00:00', '0345693162', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '1', '2022-04-05 14:40:24'),
('2', 'Minh Hung', 1, '2022-04-18 00:00:00', '0345693169', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '1', '2022-04-05 14:40:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `caption` varchar(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `customer_id`, `caption`, `content`, `status`, `created_at`) VALUES
('3', '1', 'Hài lòng', 'Trên cả tuyệt vời', 1, '2022-04-04 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `liked`
--

CREATE TABLE `liked` (
  `customer_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `feedback_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderdetail_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `orders_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `color_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`orderdetail_id`, `product_id`, `orders_id`, `color_id`, `quantity`) VALUES
('24', '10', '83', '1', 2),
('25', '11', '83', '2', 1),
('26', '10', '84', '1', 2),
('27', '10', '85', '1', 2),
('28', '10', '86', '1', 2),
('32', '1', '90', '1', 1),
('33', '1', '91', '1', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orders_id` varchar(253) NOT NULL,
  `customer_id` varchar(253) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `order_code` double DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `employee_id` varchar(253) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`orders_id`, `customer_id`, `address`, `note`, `total`, `order_code`, `status`, `created_at`, `employee_id`) VALUES
('83', '1', '34 Hai Bà Trưng', '', 43000000, 12341234, 2, '2022-04-11 11:37:05', NULL),
('84', '1', '34 Hai Bà Trưng', '', 28000000, 0, 1, '2022-04-11 11:48:01', NULL),
('85', '1', '34 Hai Bà Trưng', '', 28000000, 0, 1, '2022-04-11 11:51:43', NULL),
('86', '1', '34 Hai Bà Trưng', '', 28000000, 0, 1, '2022-04-11 11:53:27', NULL),
('90', '24', '695 xô viết nghệ tĩnh', 'Giao trước 5h chiều nhé shop oy', 15000000, 23423, 2, '2022-04-14 03:40:14', NULL),
('91', '1', '34 Hai Bà Trưng', 'Giao trước 5h chiều nhé shop oy', 30000000, 23423, 2, '2022-04-14 03:49:21', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` varchar(253) NOT NULL,
  `category_id` varchar(253) NOT NULL,
  `brand_id` varchar(253) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `brand_id`, `name`, `create_at`) VALUES
('1', '4', '1', 'Macbook Air M1 8/256GB', NULL),
('10', '1', '1', 'Iphone X 64GB', NULL),
('11', '1', '1', 'Iphone X 128GB', NULL),
('12', '1', '1', 'Iphone 12 64GB', NULL),
('13', '1', '1', 'Iphone 13 Pro 256GB', NULL),
('14', '1', '1', 'Iphone 13 Mini 128GB', NULL),
('15', '1', '1', 'Iphone 12 Pro 64GB', NULL),
('16', '1', '1', 'Iphone 11 Pro 128GB', NULL),
('17', '1', '1', 'Iphone XS MAX 128GB ', NULL),
('18', '1', '1', 'Iphone 7 Plus 64GB', NULL),
('19', '1', '1', 'Iphone 8 32GB', NULL),
('2', '3', '1', 'Apple Watch Serial 3', NULL),
('20', '3', '2', 'Samsung Galaxy Watch Active', NULL),
('22', '3', '2', 'Samsung Galaxy Watch Active', NULL),
('26', '5', '1', 'Bàn phím Apple \nMagic Keyboard', NULL),
('27', '5', '1', 'Bàn phím Apple \nMagic Keyboard', NULL),
('28', '5', '1', 'Chuột Apple Magic Mouse 2', NULL),
('29', '5', '1', 'Tai nghe Airpods 3', NULL),
('30', '5', '1', 'Cáp sạc', NULL),
('31', '1', '1', 'Iphone Xs Max 16GB', NULL),
('4', '2', '3', 'Oppo I2', NULL),
('5', '2', '3', 'Oppo I2', NULL),
('6', '2', '3', 'Oppo I4', NULL),
('7', '2', '3', 'Oppo A4', NULL),
('8', '2', '3', 'Oppo K5', NULL),
('9', '2', '3', 'Iphone 4 8GB', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `role_id` varchar(253) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
('1', 'admin'),
('2', 'staff');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `storehouse`
--

CREATE TABLE `storehouse` (
  `storehouse_id` varchar(253) NOT NULL,
  `product_id` varchar(253) NOT NULL,
  `color_id` varchar(253) NOT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `storehouse`
--

INSERT INTO `storehouse` (`storehouse_id`, `product_id`, `color_id`, `price`, `quantity`, `image`, `description`, `create_at`) VALUES
('1', '1', '4', 15000000, 50, 'macbook-air-m1.jpg', 'Hàng chính hãng 100%', '2022-04-07 21:40:40'),
('10', '20', '2', 15000000, 100, 'samsung-galaxy-watch-active.jpg', 'Hàng like new', '2022-04-06 22:00:10'),
('11', '17', '4', 15000000, 100, 'iphone-xsmax.jpg', 'Hàng like new', '2022-04-06 22:00:10'),
('12', '15', '3', 15000000, 100, 'iphone-12-pro-128gb.jpg', 'Hàng like new', '2022-04-06 22:00:10'),
('13', '14', '2', 15000000, 100, 'iphone-13-mini-128gb.jpg', 'Hàng like new', '2022-04-06 22:00:10'),
('14', '13', '1', 15000000, 100, 'iphone-13-pro.jpg', 'Hàng like new 99%', NULL),
('15', '13', '1', 15000000, 100, 'iphone-13-pro.jpg', 'Hàng like new 99%', NULL),
('16', '12', '3', 15000000, 100, 'iPhone-12-64GB.jpg', 'Hàng like new 99%', NULL),
('17', '11', '2', 15000000, 100, 'iphone-x-64gb.jpg', 'Hàng like new 99%', NULL),
('18', '10', '4', 15000000, 100, 'iphone-x-64gb.jpg', 'Hàng like new 99%', NULL),
('19', '9', '2', 15000000, 100, 'iphone-4.jpg', 'Hàng like new 99%', NULL),
('2', '2', '1', 15000000, 100, 'aoole-watch-s3.jpg', 'Hàng like new 99%', '2022-04-07 21:41:30'),
('20', '27', '4', 15000000, 50, 'MagicKeyboard.jpg', 'Chính hãng 100%', NULL),
('21', '27', '4', 15000000, 50, 'MagicKeyboard.jpg', 'Chính hãng 100%', NULL),
('22', '28', '2', 15000000, 50, 'MagicMouse2.jpg', 'Chính hãng 100%', NULL),
('23', '29', '1', 15000000, 50, 'Apple-AirPods-3.jpg', 'Chính hãng 100%', NULL),
('24', '30', '1', 15000000, 50, 'capsac.jpg', 'Chính hãng 100%', NULL),
('25', '10', '1', 14000000, 10, 'iphone-x-64gb.jpg', 'Hàng like new', '2022-04-09 05:18:34'),
('26', '1', '2', 34000000, 16, 'macbook-air-m1.jpg', 'Hàng like new', '2022-04-09 05:25:24'),
('3', '2', '1', 15000000, 50, 'aoole-watch-s3.jpg', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
('4', '1', '1', 15000000, 50, 'macbook-air-m1.jpg', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
('5', '1', '1', 15000000, 50, 'macbook-air-m1.jpg', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
('6', '1', '1', 15000000, 50, 'macbook-air-m1.jpg', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
('7', '1', '1', 15000000, 50, 'macbook-air-m1.jpg', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
('8', '19', '2', 15000000, 100, 'apple-iphone-8-plus-64gb.jpg', 'Hàng like new', '2022-04-06 22:00:10'),
('9', '19', '2', 15000000, 100, 'apple-iphone-8-plus-64gb.jpg', 'Hàng like new', '2022-04-06 22:00:10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `feedback_id` (`feedback_id`),
  ADD KEY `FK_comment_customer_customer_id` (`customer_id`),
  ADD KEY `FK_comment_employee_employee_id` (`employee_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `liked`
--
ALTER TABLE `liked`
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `feedback_id` (`feedback_id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `FK_orderdetail_orders_orders_id` (`orders_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `orders_ibfk_2` (`employee_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `storehouse`
--
ALTER TABLE `storehouse`
  ADD PRIMARY KEY (`storehouse_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_customer_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_comment_employee_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_comment_feedback_feedback_id` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`feedback_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_employee_role_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_feedback_customer_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `FK_liked_customer_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_liked_feedback_feedback_id` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`feedback_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_orderdetail_color_color_id` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_orderdetail_orders_orders_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_orderdetail_product_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_employee_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_brand_brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_product_category_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `storehouse`
--
ALTER TABLE `storehouse`
  ADD CONSTRAINT `FK_storehouse_color_color_id` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_storehouse_product_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



CREATE TABLE `comment` (
  `comment_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `product_id` varchar(253) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_comment_customer_customer_id` (`customer_id`),
  ADD KEY `FK_product_id` (`employee_id`);
