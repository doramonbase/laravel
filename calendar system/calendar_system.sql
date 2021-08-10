-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 10, 2021 lúc 07:18 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `calendar_system`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `customerName` varchar(30) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `meeting_date` datetime NOT NULL,
  `phone` varchar(15) NOT NULL,
  `staffId` int(11) NOT NULL,
  `note` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `plan`
--

INSERT INTO `plan` (`id`, `customerName`, `userId`, `meeting_date`, `phone`, `staffId`, `note`) VALUES
(1, 'Nguyễn Bá Đạt', NULL, '2021-07-19 16:00:00', '964212332', 4, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `title` int(11) DEFAULT NULL,
  `specialty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`id`, `title`, `specialty`) VALUES
(1, 101, 1),
(2, 102, 1),
(3, 103, 1),
(4, 104, 2),
(5, 105, 2),
(6, 201, 3),
(7, 202, 3),
(8, 203, 3),
(9, 204, 4),
(10, 301, 5),
(11, 302, 5),
(12, 303, 6),
(13, 304, 7),
(14, 305, 7),
(15, 401, 8),
(16, 402, 8),
(17, 403, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `specialty`
--

CREATE TABLE `specialty` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `specialty`
--

INSERT INTO `specialty` (`id`, `title`) VALUES
(1, 'Tim mạch'),
(2, 'Thần kinh'),
(3, 'Tiêu hóa'),
(4, 'Cơ Xương khớp'),
(5, 'Thận tiết niệu'),
(6, 'Hô hấp'),
(7, 'Sức khỏe tâm thần'),
(8, 'Hoá sinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `room` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`id`, `name`, `room`) VALUES
(1, 'Hồng Diễm', 1),
(2, 'Bích Thảo', 1),
(3, 'Bích Thủy', 2),
(4, 'Đoan Trang', 2),
(5, 'Đan Tâm', 3),
(6, 'Hiền Nhi', 3),
(7, 'Hiền Thục', 4),
(8, 'Hương Thảo', 4),
(9, 'Minh Tâm', 5),
(10, 'Mỹ Tâm', 5),
(11, 'Phương Thùy', 6),
(12, 'Phương Trinh', 6),
(13, 'Nhã Phương', 7),
(14, 'Phương Thảo', 7),
(15, 'Thanh Mai', 8),
(16, 'Thảo Chi', 8),
(17, 'Thiên Thanh', 9),
(18, 'Thục Quyên', 9),
(19, 'Thục Trinh', 10),
(20, 'Hương Chi', 11),
(21, 'Mỹ Dung', 12),
(22, 'Lan Hương', 12),
(23, 'Mỹ Lệ', 13),
(24, 'Cát Tiên', 13),
(25, 'Anh Thư', 14),
(26, 'Thanh Tú', 14),
(27, 'Tú Vi', 15),
(28, 'Hạ Vũ', 15),
(29, 'Diễm My', 16),
(30, 'Diễm Phương', 16),
(31, 'Hồng Nhung', 17),
(32, 'Kim Liên', 17),
(33, 'Kim Oanh', 3),
(34, 'Khánh Quỳnh', 6),
(35, 'Mỹ Duyên', 7),
(36, 'Ngọc Bích', 9),
(37, 'Nguyệt Ánh', 11),
(38, 'Thu Nguyệt', 14),
(39, 'Thanh Vân', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(1, 'Bảo Vy'),
(2, 'Cát Tường'),
(3, 'Gia Hân'),
(4, 'Hoài An'),
(5, 'Khả Hân'),
(6, 'Khánh Ngọc'),
(7, 'Khánh Ngân'),
(8, 'Linh Chi'),
(9, 'Ngọc Khuê'),
(10, 'Phúc An'),
(11, 'Thanh Hà'),
(12, 'Bích Hà'),
(13, 'Thanh Thúy'),
(14, 'An Ngọc'),
(15, 'Khánh Châu'),
(16, 'Kim Ngân');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `staffId` (`staffId`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialty` (`specialty`);

--
-- Chỉ mục cho bảng `specialty`
--
ALTER TABLE `specialty`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room` (`room`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `specialty`
--
ALTER TABLE `specialty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `plan_ibfk_2` FOREIGN KEY (`staffId`) REFERENCES `staff` (`id`);

--
-- Các ràng buộc cho bảng `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`specialty`) REFERENCES `specialty` (`id`);

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`room`) REFERENCES `room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
