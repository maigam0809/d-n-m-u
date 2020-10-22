-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 22, 2020 at 06:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maithigam_duanmau`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`) VALUES
(35, 'hoa cảm ơn'),
(36, 'hoa chúc mừng'),
(37, 'hoa sự kiện '),
(43, 'hoa chúc mừng');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `content`, `created_at`) VALUES
(73, 61, 7, 'tuyệt vời', '2020-10-21 17:00:00'),
(74, 63, 7, 'hôm nay thật tuyệt', '2020-10-07 10:27:58'),
(120, 64, 7, 'sản phẩm có nhiều nét đặc biệt', '2020-10-21 21:08:02'),
(122, 61, 7, 'Hoa rất tươi và rất ưng ý', '2020-10-21 22:09:50'),
(124, 63, 7, 'Sản phẩm khá đẹp và ưng ý', '2020-10-21 22:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `detail` text NOT NULL,
  `price` float NOT NULL,
  `sale` float NOT NULL,
  `status` bit(1) NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `name`, `description`, `image`, `detail`, `price`, `sale`, `status`, `view`, `created_at`, `updated_at`) VALUES
(61, 35, 'Hoa sinh nhật tặng người yêu mới nhất đó nha', 'Cuộc sống này có những niềm hạnh phúc nho nhỏ, giữa cuộc đời to to. ', 'hoa-sinh-nhat-tang-me-dep.jpg', '                                                                                                                                                                                                                                                                                                                                                                Bó hoa cuộc tình tươi đẹp DH211 gồm có:\r\n\r\nhoa cẩm tú cầu hồng\r\n\r\nhoa hồng đỏ\r\n\r\nhồng kem dâu\r\n\r\nhoa phi yến\r\n\r\nlá và các phụ kiện\r\n\r\ntạo nên 1 bó hoa nhiều màu sắc , tươi đẹp…                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ', 720000, 9, b'1', 191, '2020-10-22 15:09:50', '2020-10-24 00:00:00'),
(62, 35, 'Hoa bó kỉ niệm ngày cưới cho đôi vợ chồng trẻ', 'Combo túi xách + túi đeo chéo phối hạt', 'hoa-bo-tron-day-tang-sinh-nhat.png', '                <p style=\"color: red;\"></p>\r\n                ', 399900, 0, b'1', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 35, 'bó hoa như ý tặng xếp', 'Bó hoa chân thành tặng xếp ', 'hoa-sinh-nhat-cat-tuong-dep-nhat-300x316.jpg', '                                                <p style=\"color: red;\"></p>\r\n                                                                            ', 500000, 0, b'1', 363, '2020-10-22 15:13:20', '0000-00-00 00:00:00'),
(64, 35, 'hoa cẩm tú tặng bán gái cực đẹp', 'Hoa tặng bán gái cực đẹp nhân dịp sinh nhật hoặc các ngày lễ', 'gio-hoa-sinh-nhat-tang-ban-gai-dep.jpg', '                <p style=\"color: red;\"></p>\r\n                ', 500000, 15, b'1', 59, '2020-10-22 14:08:02', '0000-00-00 00:00:00'),
(65, 35, 'hoa cẩm tú cầu tặng vợ + cẩm trưởng cực đẹp', 'Hoa cẩm trướng là một trong những loại hoa đẹp có những kiểu cực đẹo và suất sắc', 'hoa-bo-tron-hoa-cat-tuong-300x316.png', '                                                <p style=\"color: red;\"></p>\r\n                                                                            ', 350000, 20, b'1', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 35, 'Hoa bình cắm cao cao cho chồng tặng vợ cực đẹp', 'Loại hoa cắm chân cao là một trong những loại hoa đặc sắc hay', 'binh-hoa-sinh-nhat-sang-trong-hien-dai-dep.jpg', '                <p style=\"color: red;\"></p>\r\n                ', 350000, 12, b'1', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 35, 'Hoa cắm bình đẹp để bàn phù hợp cho tân gia', 'Hoa cắm bình đẹp để bàn phù hợp cho tân gia làm cho ngôi sang trọng hơn', 'binh-hoa-sinh-nhat-lan-ho-diep-dep.jpg', '                                                <p style=\"color: red;\"></p>\r\n                                                                            ', 390000, 0, b'1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role` int(4) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` bit(1) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `activated` varchar(40) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `role`, `address`, `phone`, `gender`, `created_at`, `update_at`, `image`, `activated`, `date_of_birth`) VALUES
(1, 'Nguyễn Thị Ngọc', 'helloanhtrai', 'admin@gmail.com', '$2y$10$gE4oZ0OZnO6QUEkA3h4z1OgFZJejlK./Yecx9clb4ziaUJv1LfCzO', 1, '1', '1', b'1', '2020-10-16', '0000-00-00', '8ff16e1250028cf1698b9e9d1a15cd6b.png', '1', '2020-10-09'),
(2, 'bùi quang ngọc', 'ngocbqeyfgbhwdfjc', 'ngocbq@fpt.edu.vn', '$2y$10$gE4oZ0OZnO6QUEkA3h4z1OgFZJejlK./Yecx9clb4ziaUJv1LfCzO', 1, '1', '1', b'1', '2020-10-20', '0000-00-00', NULL, '1', '2020-10-12'),
(7, 'Mai Thi Gam', 'gammt123', 'dinhhang0@gmail.com', '1234567', 1669671363, '1', '1', b'1', '2020-09-24', '0000-00-00', '182b708be1229785fb606ac48660b852.png', '1', '1989-10-02'),
(39, 'mai thị mai', 'maigam', 'luongtu996@gmail.com', '1234567', 1, 'khu parkview ct7', '0344358618', b'1', '0000-00-00', '0000-00-00', '9f7a350914d43e1cd028c9d2acb67d8f.png', '1', '2000-09-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_products_comments` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `lk_products_comments` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `cate_id` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
