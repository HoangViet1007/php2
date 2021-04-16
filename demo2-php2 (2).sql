-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 20, 2021 lúc 07:30 PM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo2-php2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Áo sơ mi '),
(2, 'Giày thể thao'),
(4, 'Áo khoác'),
(5, 'Áo len'),
(6, 'Quần âu'),
(7, 'Quần jean'),
(8, 'Balo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `content`, `id_product`, `id_user`, `created_at`) VALUES
(1, 'Sản phẩm rất đẹp !', 1, 'ps4', '2021-01-15 09:27:14'),
(2, 'Áo mặc đẹp , chất liệu mát mẻ dễ chịu !', 1, 'ps4', '2021-01-15 09:38:51'),
(4, 'Sản phẩm rất tốt !', 14, 'ps4', '2021-01-15 09:56:54'),
(6, 'Cặp chất lượng , da thạt , ns chung rất ok ! ', 8, 'ps3', '2021-01-17 10:03:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_product_gallery`
--

CREATE TABLE `image_product_gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_product_gallery`
--

INSERT INTO `image_product_gallery` (`id`, `name`, `image`, `id_product`) VALUES
(2, 'Áo sơ mi kẻ 1', 'public/image/image_gallery/600acc26b1427_sm1.jpg', 1),
(3, 'Áo sơ mi kẻ 2', 'public/image/image_gallery/600ac27c5cd83_sm2.jpg', 1),
(4, 'Áo sơ mi kẻ 3', 'public/image/image_gallery/600ac28d9a351_sm3.jpg', 1),
(5, 'Áo sơ mi kẻ 4', 'public/image/image_gallery/600ac29e409a1_sm4.jpg', 1),
(7, 'Áo sơ mi kẻ sọc 1', 'public/image/image_gallery/600aedb7a7609_sk1.jpg', 2),
(8, 'Áo sơ mi kẻ sọc 2', 'public/image/image_gallery/600aeddc013f5_sk2.jpg', 2),
(9, 'Áo sơ mi kẻ sọc 3', 'public/image/image_gallery/600aedea61560_sk3.jpg', 2),
(10, 'Giày jocdan 1', 'public/image/image_gallery/600aee5c56fc2_g1.jpg', 15),
(11, 'Giày jocdan 2', 'public/image/image_gallery/600aee8dc513e_g2.jpg', 15),
(12, 'Giày jocdan 3', 'public/image/image_gallery/600aeeaf64047_g3.jpg', 15),
(13, 'Giày jocdan 4', 'public/image/image_gallery/600aeec38e889_g4.jpg', 15),
(14, 'Áo khoác kẻ 1', 'public/image/image_gallery/600aef0c77a5c_ak1.jpg', 4),
(15, 'Áo khoác kẻ 2', 'public/image/image_gallery/600aef222cefc_ak2.jpg', 4),
(16, 'Áo khoác kẻ 3', 'public/image/image_gallery/600aef3d17abf_ak3.jpg', 4),
(17, 'Áo khoác da lộn LC267 1', 'public/image/image_gallery/600aeffaa4321_ad1.jpg', 7),
(18, 'Áo khoác da lộn LC267 2', 'public/image/image_gallery/600af03a35dff_ad2.jpg', 7),
(19, 'Áo khoác da lộn LC267 3', 'public/image/image_gallery/600af0475a371_ad3.jpg', 7),
(20, 'Áo khoác da lộn LC267 4', 'public/image/image_gallery/600af0596743c_ad4.jpg', 7),
(21, 'Quần Âu q01 1', 'public/image/image_gallery/600af0b83510f_a1.jpg', 9),
(22, 'Quần Âu q01 2', 'public/image/image_gallery/600af0c92cefb_a2.jpg', 9),
(23, 'Quần Âu q01 3', 'public/image/image_gallery/600af0da5470b_a3.jpg', 9),
(24, 'Quần Âu q01 4', 'public/image/image_gallery/600af0e593c54_a4.jpg', 9),
(25, 'Quần âu kẻ sọc 1', 'public/image/image_gallery/600af12810290_as1.jpg', 12),
(26, 'Quần âu kẻ sọc 2', 'public/image/image_gallery/600af13ae5df5_as2.jpg', 12),
(27, 'Quần âu kẻ sọc 3', 'public/image/image_gallery/600af154448c1_as3.jpg', 12),
(28, 'Quần âu kẻ sọc 4', 'public/image/image_gallery/600af1620c7b7_as4.jpg', 12),
(29, 'Quần Jean QJ 01', 'public/image/image_gallery/600af1a596fb2_b1.jpg', 13),
(30, 'Quần2ean QJ 01', 'public/image/image_gallery/600af1b5e5eb5_b2.jpg', 13),
(31, 'Quần Jean rách gối 1', 'public/image/image_gallery/600af20f6f444_r1.jpg', 14),
(32, 'Quần Jean rách gối 2', 'public/image/image_gallery/600af219c2124_r2.jpg', 14),
(33, 'Quần Jean rách gối 3', 'public/image/image_gallery/600af225139de_r3.jpg', 14),
(34, 'Quần Jean rách gối 4', 'public/image/image_gallery/600af22fb11c3_r4.jpg', 14),
(35, 'Balo da PK01 1', 'public/image/image_gallery/600af27379035_c1.jpg', 8),
(36, 'Balo da PK01 2', 'public/image/image_gallery/600af27ab6701_c2.jpg', 8),
(37, 'Balo da PK01 3', 'public/image/image_gallery/600af282771f9_c3.jpg', 8),
(38, 'Balo da PK01 4', 'public/image/image_gallery/600af28eab04a_c4.jpg', 8),
(39, 'Balo da PK01 5', 'public/image/image_gallery/600af299cddd0_c5.jpg', 8),
(40, 'Balo vai lụa 1', 'public/image/image_gallery/600af2d86001c_cc1.jpg', 10),
(41, 'Balo vai lụa 2', 'public/image/image_gallery/600af2e0e9c68_cc2.jpg', 10),
(42, 'Balo vai lụa 3', 'public/image/image_gallery/600af2ec1676d_cc3.jpg', 10),
(43, 'Áo sơ mi trắng kẻ 1', 'public/image/image_gallery/600fdd5f5016d_smm2.jpg', 17),
(44, 'Áo sơ mi trắng kẻ 2', 'public/image/image_gallery/600fdd6ab5a47_smm3.jpg', 17),
(45, 'Áo sơ mi trăng SM1 1', 'public/image/image_gallery/600fde12e26da_s2.jpg', 18),
(46, ' Áo sơ mi trăng SM1 2', 'public/image/image_gallery/600fde1e01407_s3.jpg', 18),
(47, ' Áo sơ mi trăng SM1 3', 'public/image/image_gallery/600fde791ed5f_s5.jpg', 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_address`, `customer_phone`, `customer_email`, `total_price`, `created_at`) VALUES
(7, 'Nguyễn Duy Việt Anh', '192 - Phú Diễn - Nam Từ Liêm - Hà Nội', '0859850000', 'anhndvph10550@fpt.edu.vn', 1309000, '2021-01-25 10:45:47'),
(15, 'Nguyễn Duy Việt Anh', '192 - Phú Diễn - Nam Từ Liêm - Hà Nội', '0859850000', 'anhndvph10550@fpt.edu.vn', 1104000, '2021-03-25 12:09:50'),
(16, 'Nguyễn Duy Việt Anh', '192 - Phú Diễn - Nam Từ Liêm - Hà Nội', '0859850000', 'anhndvph10550@fpt.edu.vn', 1139000, '2021-02-25 23:06:05'),
(19, 'Trần Thị Thương', '89 - Hoài Đức - Hà Nội', '0583572334', 'thuong@gmail.com', 1952000, '2021-04-27 07:28:16'),
(20, 'Chúc Anh Quân', '89 - Kiều Mai - Hà Nội', '0347667982', 'quan@gmail.com', 679000, '2021-02-27 07:30:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name_product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `id_product`, `name_product`, `image_product`, `quantity`, `id_orders`) VALUES
(5, 1, 'Áo sơ mi kẻ', 'public/image/product/5ff322f4ca029-somike.jpg', 2, 7),
(6, 15, 'Giày jocdan 01', 'public/image/product/5ffeb5f1b46b0-giaynam01.jpg', 1, 7),
(11, 14, 'Quần Jean rách gối', 'public/image/product/5ffeb540e3812-quanjeanrach.jpg', 1, 15),
(12, 13, 'Quần Jean QJ 01', 'public/image/product/5ffeb4d4550fd-quanjean1.jpg', 1, 15),
(13, 4, 'Áo khoác kẻ', 'public/image/product/5ff3310fec961-aokhoacke.jpg', 1, 16),
(14, 8, 'Balo da PK01', 'public/image/product/5ff89398dcc66-balo1.jpg', 1, 16),
(15, 17, 'Áo sơ mi trắng kẻ', 'public/image/product/600fdd1fa6dde_smm1.jpg', 1, 19),
(16, 14, 'Quần Jean rách gối', 'public/image/product/5ffeb540e3812-quanjeanrach.jpg', 1, 19),
(17, 11, 'Balo fuma ', 'public/image/product/5ffeb3b63dfcc-balofuma.jpg', 1, 19),
(18, 8, 'Balo da PK01', 'public/image/product/5ff89398dcc66-balo1.jpg', 1, 19),
(19, 15, 'Giày jocdan 01', 'public/image/product/5ffeb5f1b46b0-giaynam01.jpg', 1, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `sale` float NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `number_of_views` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `sale`, `description`, `number_of_views`, `id_category`) VALUES
(1, 'Áo sơ mi kẻ', 'public/image/product/5ff322f4ca029-somike.jpg', 315000, 3, 'Sản phẩm 100% là cotton , mặc thoáng mát dẻ chịu , chuẩn đẹp trai .', 100, 1),
(2, 'Áo sơ mi kẻ sọc', 'public/image/product/5ff3269dd2eaa-somikesoc.jpg', 349000, 5, '<p>Sản phẩm 100% l&agrave; cotton , mặc tho&aacute;ng m&aacute;t dẻ chịu , chuẩn đẹp trai .</p>', 130, 1),
(4, 'Áo khoác kẻ', 'public/image/product/5ff3310fec961-aokhoacke.jpg', 790000, 3, 'Sản phẩm 100% là cotton , giày , bên trong lót lớp lông cừu,  cực ấm cực đẹp trai .', 138, 4),
(7, 'Áo khoác da lộn LC267', 'public/image/product/5ff8901a70d8f-ak92999.jpg', 699000, 5, 'Sản phẩm 100% là cotton , giày , bên trong lót lớp lông cừu, cực ấm cực đẹp trai .', 159, 4),
(8, 'Balo da PK01', 'public/image/product/5ff89398dcc66-balo1.jpg', 349000, 4, 'Sản phẩm 100% là da thật , bao giặt , hàng chuẩn chất lượng . ', 167, 8),
(9, 'Quần Âu q01', 'public/image/product/5ff895f7dd7e1-qa1.jpg', 499000, 4, 'Quần âu may với những đường nét tinh sảo , co dãn 4 chiều , mặc vô cùng thỏa mái , vô cùng đẹp trai', 199, 6),
(10, 'Balo vai lụa', 'public/image/product/5ffeb05a7b4f8-balolua.jpg', 369000, 4, 'Sản phẩm rất trẻ trung phù hợp với lưa tuổi học sinh , sinh viên .', 145, 8),
(11, 'Balo fuma ', 'public/image/product/5ffeb3b63dfcc-balofuma.jpg', 499000, 4, 'Sản phẩm rất nam tính rất thể thao và cũng rất thời thượng . Phù hợp với đi học , những cuộc trải nghiệm đường dài hay những lần đi phượt đầy mạo hiểm . ', 167, 8),
(12, 'Quần âu kẻ sọc', 'public/image/product/5ffeb4391b766-quânukesoc.jpg', 499000, 2, 'Quần âu đươc ma bằng những đường nét tinh tế , rất thời thượng và nam tính . Thách thức mọi ánh nhìn . ', 348, 6),
(13, 'Quần Jean QJ 01', 'public/image/product/5ffeb4d4550fd-quanjean1.jpg', 415000, 2, 'Quần jean làm 100% từ cotton , mặc rất dễ chịu , năng dộng , và rất dễ phối đồ . Mặc là đẹp trai . ', 89, 7),
(14, 'Quần Jean rách gối', 'public/image/product/5ffeb540e3812-quanjeanrach.jpg', 689000, 1, 'Quần jean rách gối làm 100% từ cotton , mặc rất thỏa mái , màu rất nam tính trẻ trung .\r\n', 229, 7),
(15, 'Giày jocdan 01', 'public/image/product/5ffeb5f1b46b0-giaynam01.jpg', 679000, 4, 'Giày đi êm , đế được đúc nguyên khối rất chắc chắn , đường kim mũi chỉ được khâu rất phong cách , phù hợp với rất nhiều loại quần áo', 199, 2),
(17, 'Áo sơ mi trắng kẻ', 'public/image/product/600fdd1fa6dde_smm1.jpg', 415000, 4, '<p>&Aacute;o 100% l&agrave;m từ cotton tho&aacute;ng m&aacute;t dễ chịu , mặc l&agrave; đẹo trai !</p>', 249, 1),
(18, 'Áo sơ mi trăng SM1', 'public/image/product/600fddf2bd4ad_s1.jpg', 499000, 4, '<p>&Aacute;o chất liệu co gi&atilde;n 4 chiều , chuẩn đẹp trai , th&aacute;ch thức mọi &aacute;nh nh&igrave;n !</p>', 241, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `title`, `image`, `link`, `active`) VALUES
(1, 'Ảnh đẹp', 'public/image/slide/5ffb13fddfaec-banner2.jpg', '000', 1),
(3, 'Ảnh đẹp 1', 'public/image/slide/5ffb228e40f88-banner.jpg', '000', 1),
(4, 'Ảnh đẹp 3', 'public/image/slide/5ffec00648c27-banner3.jpg', '000', 1),
(6, 'Ảnh đẹp 4', 'public/image/slide/60032c4186678_alb_1599307750_892.jpg', '000', 1),
(7, 'Ảnh đẹp 5', 'public/image/slide/600fdc788ab33_sb_1611538307_204.jpg', '000', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vai_tro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `password`, `name`, `image`, `address`, `phone`, `email`, `vai_tro`) VALUES
('ps1', '123456789', 'Hoàng Quốc Bảo Việt', 'public/image/user/5fff2e9e2c062-me.jpg', '89 - Hoài Đức - Hà Nội', '0355755697', 'hoangviet10072001@gmail.com', 1),
('ps2', '123456789', 'Đào Ánh Tuyết', 'public/image/user/6000734369ad7-5fb69eb784b7c_vk.jpg', '89 - Hoài Đức - Hà Nội', '0827541636', 'viettuyet10072001@gmail.com', 1),
('ps3', '123456789', 'Trần Thị Thương', 'public/image/user/600070fba863f-121092441_359184295201933_6285663945253883419_o.jpg', '89 - Hoài Đức - Hà Nội', '0583572334', 'thuong@gmail.com', 2),
('ps4', '123456789', 'Nguyễn Duy Việt Anh', 'public/image/user/600020b8bda37-56b1277997b26aec33a3.jpg', '192 - Phú Diễn - Nam Từ Liêm - Hà Nội', '0859850000', 'anhndvph10550@fpt.edu.vn', 2),
('ps5', '123456789', 'Chúc Anh Quân', 'public/image/user/6004703bf3a48_5fc1357ca22df_123310298_996218494220871_5114419063741368147_n.jpg', '89 - Kiều Mai - Hà Nội', '0347667982', 'hoangviet10172001@gmail.com', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vai_tro`
--

CREATE TABLE `vai_tro` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vai_tro`
--

INSERT INTO `vai_tro` (`id`, `name`) VALUES
(1, 'Nhân viên'),
(2, 'Khách hàng'),
(3, 'Chủ cửa hàng'),
(11, 'Bảo vệ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `websetting`
--

CREATE TABLE `websetting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `websetting`
--

INSERT INTO `websetting` (`id`, `name`, `address`, `phone`, `email`, `logo`) VALUES
(1, 'The men', '89 - Kiều Mai - Hà Nội', '0355755607', 'hoangviet@gmail.com', 'public/image/websetting/6030c74e53572_logothemen.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_product` (`id_product`),
  ADD KEY `FK_comment_user` (`id_user`);

--
-- Chỉ mục cho bảng `image_product_gallery`
--
ALTER TABLE `image_product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_category` (`id_category`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vai_tro`
--
ALTER TABLE `vai_tro`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `websetting`
--
ALTER TABLE `websetting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `image_product_gallery`
--
ALTER TABLE `image_product_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `vai_tro`
--
ALTER TABLE `vai_tro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `websetting`
--
ALTER TABLE `websetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
