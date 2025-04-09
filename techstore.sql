-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2025 at 01:19 PM
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
-- Database: `techstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `caption` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `content` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `photo` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `caption`, `content`, `photo`, `status`, `create_at`) VALUES
('2', 'Mùa hè sôi động', 'Nhanh chân nào bạn tôi ơi', 'slide1744137879.jpg', 1, '2025-04-08 18:44:39'),
('3', 'Mua 1 tặng 1', 'Nhanh chân nào bạn tôi ơi', 'slide3.jpg', 1, '2022-07-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `name`, `status`, `created_at`) VALUES
('1', 'Apple', 1, '2022-03-21 00:00:00'),
('2', 'Samsung', 1, '2022-04-07 15:24:28'),
('20250408-231847-0mcor-93qfy', 'Oppo', 1, '2025-04-08 23:18:47'),
('20250409-020107-avlb3-8ods0', 'Xiaomi', 1, '2025-04-09 02:01:07'),
('3', 'Oppo', 2, '2022-04-07 15:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `status`, `created_at`) VALUES
('1', 'Điện thoại', 1, '2022-03-21 00:00:00'),
('2', 'Máy tính bảng', 1, '2025-04-08 16:17:39'),
('3', 'Đồng hồ', 0, '2022-03-21 00:00:00'),
('4', 'Laptop', 0, '2022-03-21 00:00:00'),
('5', 'Phụ kiện', 0, '2025-04-08 16:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `code` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `name`, `code`) VALUES
('1', 'Đen', ''),
('2', 'Trắng', ''),
('3', 'Đỏ', ''),
('4', 'Vàng', ''),
('8', 'Xanh', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `customer_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `product_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `customer_id`, `product_id`, `content`, `created_at`) VALUES
('20250409-134017-ym6ec-k5xw3', '20250409-131400-qy2px-8kboc', '14', 'sản phẩm tốt', '2025-04-09 13:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `phone` char(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `address` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `password` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `phone`, `birthday`, `gender`, `email`, `address`, `password`, `status`, `created_at`) VALUES
('20250408-223215-0wuei-3ry8b', 'Trần Hữu Tiến', '0823746296', '2025-04-08 22:32:15', 0, 'thtien@gmail.com', 'Tiến hóa, Tuyên Hóa, Quàn Bình', '9c9e32d9319bbc48345289fb7bc7ec1a', 1, '2025-04-08 22:32:15'),
('20250409-023851-37nhe-a5vy6', 'User', '0826584751', '2025-04-09 02:38:51', 0, 'user@gmail.com', '563 Tô Ngọc Vân,Tam Phú,Thủ Đức', '6ad14ba9986e3615423dfca256d04e3f', 1, '2025-04-09 02:38:51'),
('20250409-131400-qy2px-8kboc', 'Nguyễn Văn Nguyên', '0865936174', '2025-04-09 13:14:00', 0, 'nguyennv2k3@gmail.com', 'HCM', 'd2139a03f7710dc31d8cd118cac89f93', 1, '2025-04-09 13:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `phone` char(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `password` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `role_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `gender`, `birthday`, `phone`, `email`, `password`, `status`, `role_id`, `created_at`) VALUES
('1', 'huutien', 1, '2003-04-05 00:00:00', '0823746296', 'huutien6296@gmail.com', '0192023a7bbd73250516f069df18b500', 0, '1', '2022-04-05 14:40:24'),
('1001', 'Hữu Tiến', 1, '2003-04-18 00:00:00', '0865936174', 'huutien@gmail.com', '0192023a7bbd73250516f069df18b500', 0, '1', '2025-04-06 14:40:24'),
('1002', 'Hữu Tiến', 1, '2003-04-18 00:00:00', '0865936174', 'huutien@gmail.com', '0192023a7bbd73250516f069df18b500', 0, '1', '2025-04-06 14:40:24'),
('1021', 'Hữu Tiến', 1, '2003-04-18 00:00:00', '0865936174', 'huutien@gmail.com', '0192023a7bbd73250516f069df18b500', 0, '1', '2025-04-06 14:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `customer_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `caption` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

CREATE TABLE `liked` (
  `customer_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `feedback_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderdetail_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `product_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `orders_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `color_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderdetail_id`, `product_id`, `orders_id`, `color_id`, `quantity`) VALUES
('20250405-223505-wvlu0-tjn75', '1', '20250405-223505-yfnbt-lz28x', '4', 2),
('20250406-205442-bjw1v-r3kd7', '1', '20250406-205442-0mrzi-a4f9j', '4', 1),
('20250406-223627-nzjax-ht5lw', '1', '20250406-223627-ypuzk-bctvh', '4', 1),
('20250406-223917-n5wrv-ypfes', '19', '20250406-223917-8zxni-dlbt2', '2', 1),
('20250406-224248-pwu7d-ti4lq', '1', '20250406-224248-d49yu-zvqxe', '4', 1),
('20250406-224435-q72o3-cnjf5', '19', '20250406-224435-9laeq-t7yon', '2', 1),
('20250406-224814-nokeh-pcy0d', '19', '20250406-224814-bjh8u-v6rcw', '2', 1),
('20250406-225103-jnmlx-yhfsi', '19', '20250406-225103-ahci9-7fgj4', '2', 1),
('20250406-225230-gi17v-42hu9', '19', '20250406-225230-t0hkg-eso52', '2', 1),
('20250406-225927-ve4ij-spocy', '1', '20250406-225927-ue97b-awty8', '4', 1),
('20250406-230630-hgo20-8ptw3', '19', '20250406-230630-nbdse-3cyxt', '2', 1),
('20250406-230652-hirvn-60ykx', '19', '20250406-230652-yr7j3-5pkha', '2', 1),
('20250406-230748-4vgrp-7je89', '19', '20250406-230748-qde9v-uyi53', '2', 1),
('20250406-230851-tqnv5-hdleu', '9', '20250406-230851-peig4-qy537', '2', 1),
('20250406-231146-ez6c3-pfukw', '19', '20250406-231146-t6i2m-qv30z', '2', 1),
('20250406-231202-7c9x6-n1wit', '19', '20250406-231202-pq73g-id8ot', '2', 2),
('20250406-231643-6fd2n-skugp', '19', '20250406-231643-hqivd-1wj5l', '2', 3),
('20250406-232001-gvtm1-op0a7', '19', '20250406-232001-ml0or-wa49j', '2', 1),
('20250406-232237-6vntj-79zcp', '19', '20250406-232237-cun07-fz6k8', '2', 1),
('20250406-232447-d82uk-tb4vn', '19', '20250406-232447-im7qg-ocwed', '2', 2),
('20250406-233010-kufgo-tie42', '19', '20250406-233010-zbcyd-gha0i', '2', 3),
('20250406-233057-1jrd0-2tnul', '2', '20250406-233057-lqnxw-1f28j', '1', 1),
('20250406-233748-ioct8-msl5e', '19', '20250406-233748-sdo1z-x8wfe', '2', 1),
('20250406-233748-tig9k-enp2l', '2', '20250406-233748-sdo1z-x8wfe', '1', 1),
('20250406-234130-psowv-l5tag', '2', '20250406-234130-1aqen-kflbh', '1', 1),
('20250406-234328-hcmkn-9b3w0', '2', '20250406-234328-b38du-6wkh9', '1', 1),
('20250406-234400-i6xqa-c8mhl', '19', '20250406-234400-e6x9q-w7fj1', '2', 1),
('20250406-234936-sqlbo-yn7r5', '19', '20250406-234936-n7ay2-gjdh3', '2', 2),
('20250406-235322-uaj57-2qldk', '19', '20250406-235322-m8gq1-ar3p6', '2', 2),
('20250406-235736-c25u4-1nrgy', '30', '20250406-235736-th8fn-was10', '1', 1),
('20250408-223253-93v7u-8hycx', '19', '20250408-223253-z9ms5-k84rl', '2', 1),
('20250408-223712-2iuxm-86vps', '19', '20250408-223712-4vy1g-i7923', '2', 1),
('20250409-024018-84e0i-rh9d3', '15', '20250409-024018-qdhpb-a97i0', '3', 2),
('20250409-132004-w7bxj-iz5qs', '12', '20250409-132004-05c9x-73sgi', '3', 1),
('20250409-132434-uaxyp-v0t61', '14', '20250409-132434-4w8b7-3sqcm', '2', 1),
('20250409-132459-9rnwi-d8csz', '14', '20250409-132459-pdnbs-if2ug', '2', 1),
('24', '10', '83', '1', 2),
('25', '11', '83', '2', 1),
('26', '10', '84', '1', 2),
('27', '10', '85', '1', 2),
('28', '10', '86', '1', 2),
('32', '1', '90', '1', 1),
('33', '1', '91', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `customer_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `note` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `total` double DEFAULT NULL,
  `order_code` double DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `employee_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `customer_id`, `address`, `note`, `total`, `order_code`, `status`, `created_at`, `employee_id`) VALUES
('20250405-223505-yfnbt-lz28x', '20250405-223051-94guw-mf3kt', 'HCM', '', 30000000, 123456, 2, '2025-04-05 22:35:05', NULL),
('20250406-205442-0mrzi-a4f9j', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 23231, 2, '2025-04-06 20:54:42', NULL),
('20250406-223627-ypuzk-bctvh', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 2323, 2, '2025-04-06 22:36:27', NULL),
('20250406-223917-8zxni-dlbt2', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 435345, 2, '2025-04-06 22:39:17', NULL),
('20250406-224248-d49yu-zvqxe', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 2343425, 2, '2025-04-06 22:42:48', NULL),
('20250406-224435-9laeq-t7yon', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 123123121, 2, '2025-04-06 22:44:35', NULL),
('20250406-224814-bjh8u-v6rcw', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 223, 2, '2025-04-06 22:48:14', NULL),
('20250406-225103-ahci9-7fgj4', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 0, 1, '2025-04-06 22:51:03', NULL),
('20250406-225230-t0hkg-eso52', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 0, 1, '2025-04-06 22:52:30', NULL),
('20250406-225927-ue97b-awty8', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 456457, 2, '2025-04-06 22:59:27', NULL),
('20250406-230630-nbdse-3cyxt', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 0, 1, '2025-04-06 23:06:30', NULL),
('20250406-230652-yr7j3-5pkha', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 0, 1, '2025-04-06 23:06:52', NULL),
('20250406-230748-qde9v-uyi53', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 0, 1, '2025-04-06 23:07:48', NULL),
('20250406-230851-peig4-qy537', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 0, 1, '2025-04-06 23:08:51', NULL),
('20250406-231146-t6i2m-qv30z', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 0, 1, '2025-04-06 23:11:46', NULL),
('20250406-231202-pq73g-id8ot', '20250405-223051-94guw-mf3kt', 'HCM', '', 30000000, 0, 1, '2025-04-06 23:12:02', NULL),
('20250406-231643-hqivd-1wj5l', '20250405-223051-94guw-mf3kt', 'HCM', '', 45000000, 0, 1, '2025-04-06 23:16:43', NULL),
('20250406-232001-ml0or-wa49j', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 0, 1, '2025-04-06 23:20:01', NULL),
('20250406-232237-cun07-fz6k8', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 0, 1, '2025-04-06 23:22:37', NULL),
('20250406-232447-im7qg-ocwed', '20250405-223051-94guw-mf3kt', 'HCM', '', 30000000, 0, 1, '2025-04-06 23:24:47', NULL),
('20250406-233010-zbcyd-gha0i', '20250405-223051-94guw-mf3kt', 'HCM', '', 45000000, 0, 1, '2025-04-06 23:30:10', NULL),
('20250406-233038-f03sw-yjobp', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 0, 1, '2025-04-06 23:30:38', NULL),
('20250406-233057-lqnxw-1f28j', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 0, 1, '2025-04-06 23:30:57', NULL),
('20250406-233748-sdo1z-x8wfe', '20250405-223051-94guw-mf3kt', 'HCM2', '', 30000000, 0, 1, '2025-04-06 23:37:48', NULL),
('20250406-234130-1aqen-kflbh', '20250405-223051-94guw-mf3kt', 'HCM', '', 15000000, 0, 1, '2025-04-06 23:41:30', NULL),
('20250406-234328-b38du-6wkh9', '20250405-223051-94guw-mf3kt', 'HCM3', '', 15000000, 0, 1, '2025-04-06 23:43:28', NULL),
('20250406-234400-e6x9q-w7fj1', '20250405-223051-94guw-mf3kt', 'HCM3', '', 15000000, 0, 1, '2025-04-06 23:44:00', NULL),
('20250406-234936-n7ay2-gjdh3', '20250405-223051-94guw-mf3kt', 'HCMs1111111', '', 30000000, 30000000, 3, '2025-04-06 23:49:36', NULL),
('20250406-235322-m8gq1-ar3p6', '20250405-223051-94guw-mf3kt', 'HCM 111', '', 30000000, 30000000, 3, '2025-04-06 23:53:22', NULL),
('20250406-235736-th8fn-was10', '20250405-223051-94guw-mf3kt', 'HCM new', '', 15000000, 15000000, 3, '2025-04-06 23:57:36', NULL),
('20250408-223253-z9ms5-k84rl', '20250408-223215-0wuei-3ry8b', 'Tiến hóa, Tuyên Hóa, Quàn Bình', '', 15000000, 0, 1, '2025-04-08 22:32:53', NULL),
('20250408-223638-p1wuz-tviqc', '20250408-223215-0wuei-3ry8b', 'Tiến hóa, Tuyên Hóa, Quàn Bình', '', 30000000, 0, 1, '2025-04-08 22:36:38', NULL),
('20250408-223712-4vy1g-i7923', '20250408-223215-0wuei-3ry8b', 'Tiến hóa, Tuyên Hóa, Quàn Bình', '', 15000000, 15000000, 3, '2025-04-08 22:37:12', NULL),
('20250409-024018-qdhpb-a97i0', '20250409-023851-37nhe-a5vy6', '563 Tô Ngọc Vân,Tam Phú,Thủ Đức', '', 30000000, 30000000, 3, '2025-04-09 02:40:18', NULL),
('20250409-132004-05c9x-73sgi', '20250409-131400-qy2px-8kboc', 'HCM', '', 15000000, 0, 1, '2025-04-09 13:20:04', NULL),
('20250409-132434-4w8b7-3sqcm', '20250409-131400-qy2px-8kboc', 'HCM', '', 14300000, 0, 1, '2025-04-09 13:24:34', NULL),
('20250409-132459-pdnbs-if2ug', '20250409-131400-qy2px-8kboc', 'HCM', '', 14300000, 14300000, 3, '2025-04-09 13:24:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `category_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `brand_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `brand_id`, `name`, `create_at`) VALUES
('12', '1', '1', 'Iphone 12 64GB', NULL),
('14', '1', '1', 'Iphone 13 Mini 128GB', NULL),
('15', '1', '1', 'Iphone 12 Pro 64GB', NULL),
('17', '1', '1', 'Iphone XS MAX 128GB ', NULL),
('20', '3', '2', 'Samsung Galaxy Watch Active', NULL),
('28', '5', '1', 'Chuột Apple Magic Mouse 2', NULL),
('29', '5', '1', 'Tai nghe Airpods 3', NULL),
('30', '5', '1', 'Cáp sạc', NULL),
('6BPLYI', '1', '20250409-020107-avlb3-8ods0', 'demo xiaomi111111111111111', NULL),
('9', '2', '3', 'Iphone 4 8GB', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `role` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
('1', 'admin'),
('2', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `storehouse`
--

CREATE TABLE `storehouse` (
  `storehouse_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `product_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `color_id` varchar(253) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `price` double DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `description` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `storehouse`
--

INSERT INTO `storehouse` (`storehouse_id`, `product_id`, `color_id`, `price`, `quantity`, `image`, `description`, `create_at`) VALUES
('1', '1', '4', 12000000, 50, 'macbook-air-m1.jpg', 'Hàng chính hãng 100%', '2022-04-07 21:40:40'),
('10', '20', '2', 15000000, 100, 'samsung-galaxy-watch-active.jpg', 'Hàng like new', '2022-04-06 22:00:10'),
('11', '17', '4', 15000000, 100, 'iphone-xsmax.jpg', 'Hàng like new', '2022-04-06 22:00:10'),
('12', '15', '3', 15000000, 100, 'iphone-12-pro-128gb.jpg', 'Hàng like new', '2022-04-06 22:00:10'),
('13', '14', '2', 14300000, 100, 'iphone-13-mini-128gb.jpg', 'Hàng like new', '2022-04-06 22:00:10'),
('14', '13', '1', 15000000, 100, 'iphone-13-pro.jpg', 'Hàng like new 99%', NULL),
('15', '13', '1', 15000000, 100, 'iphone-13-pro.jpg', 'Hàng like new 99%', NULL),
('16', '12', '3', 15000000, 100, 'iPhone-12-64GB.jpg', 'Hàng like new 99%', NULL),
('17', '11', '2', 15000000, 100, 'iphone-x-64gb.jpg', 'Hàng like new 99%', NULL),
('18', '10', '4', 15000000, 100, 'iphone-x-64gb.jpg', 'Hàng like new 99%', NULL),
('19', '9', '2', 18990000, 100, 'iphone-4.jpg', 'Hàng like new 99%', NULL),
('2', '2', '1', 4700000, 100, 'aoole-watch-s3.jpg', 'Hàng like new 99%', '2022-04-07 21:41:30'),
('20', '27', '4', 15000000, 50, 'MagicKeyboard.jpg', 'Chính hãng 100%', NULL),
('20250408-233728-d7ect-bnp6q', '8', '1', 0, 0, '1263_tải xuống.jpg', '', '2025-04-08 23:37:28'),
('20250409-021121-svh9x-my6oc', '11', '1', 12000000, 0, '1331_', '', '2025-04-09 02:11:21'),
('21', '27', '4', 15000000, 50, 'MagicKeyboard.jpg', 'Chính hãng 100%', NULL),
('22', '28', '2', 2000000, 50, 'MagicMouse2.jpg', 'Chính hãng 100%', NULL),
('23', '29', '1', 3590000, 50, 'Apple-AirPods-3.jpg', 'Chính hãng 100%', NULL),
('24', '30', '1', 600000, 50, 'capsac.jpg', 'Chính hãng 100%', NULL),
('25', '10', '1', 14000000, 10, 'iphone-x-64gb.jpg', 'Hàng like new', '2022-04-09 05:18:34'),
('26', '1', '2', 34000000, 16, 'macbook-air-m1.jpg', 'Hàng like new', '2022-04-09 05:25:24'),
('3', '2', '1', 4700000, 50, 'aoole-watch-s3.jpg', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
('4', '1', '1', 15000000, 50, 'macbook-air-m1.jpg', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
('4MLGTB', '6BPLYI', '1', 400444, 10, 'Xiaomi 14T Pro 12GB 512GB.webp', '324234234', '2025-04-09 06:01:57'),
('5', '1', '1', 15000000, 50, 'macbook-air-m1.jpg', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
('6', '1', '1', 15000000, 50, 'macbook-air-m1.jpg', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
('7', '1', '1', 15000000, 50, 'macbook-air-m1.jpg', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
('8', '19', '2', 15000000, 100, 'apple-iphone-8-plus-64gb.jpg', 'Hàng like new', '2022-04-06 22:00:10'),
('9', '19', '2', 15000000, 100, 'apple-iphone-8-plus-64gb.jpg', 'Hàng like new', '2022-04-06 22:00:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_comment_customer_customer_id` (`customer_id`),
  ADD KEY `FK_product_id` (`product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `FK_feedback_customer_customer_id` (`customer_id`);

--
-- Indexes for table `liked`
--
ALTER TABLE `liked`
  ADD KEY `FK_liked_customer_customer_id` (`customer_id`),
  ADD KEY `FK_liked_feedback_feedback_id` (`feedback_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `FK_orderdetail_orders_orders_id` (`orders_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `orders_ibfk_2` (`employee_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `storehouse`
--
ALTER TABLE `storehouse`
  ADD PRIMARY KEY (`storehouse_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_feedback_customer_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `FK_liked_customer_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `FK_liked_feedback_feedback_id` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`feedback_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
