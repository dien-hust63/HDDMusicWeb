-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2021 lúc 10:57 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hddmusic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(64) NOT NULL,
  `admin_password_hash` varchar(255) NOT NULL,
  `admin_email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password_hash`, `admin_email`) VALUES
(4, 'nguyentiendung', '$2y$10$yRVJG8e0oIMdE0qMLw8LpOgGSg93DhxReiXRoLi5m9fx67kjs8n/K', 'nguyentiendung2000@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `artist`
--

INSERT INTO `artist` (`id`, `name`, `age`, `hometown`, `country`, `avatar`) VALUES
(2, 'Sơn Tùng MTP', 26, 'Thai Binh', 1, 'sontung.jpg'),
(4, 'Hoàng Dũng', 25, 'Thái Nguyên', 1, 'hoangdung.png'),
(5, 'Đen Vâu', 32, 'Quảng Ninh', 1, 'denvau.jpg'),
(6, 'Chillies', 32, 'Quảng Ninh', 1, 'chillies.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artist_song`
--

CREATE TABLE `artist_song` (
  `id` int(11) NOT NULL,
  `artist` int(11) DEFAULT NULL,
  `song` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `artist_song`
--

INSERT INTO `artist_song` (`id`, `artist`, `song`) VALUES
(1, 4, 1),
(2, 2, 5),
(4, 5, 3),
(5, 6, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(17, ''),
(28, 'America'),
(15, 'Brunei'),
(3, 'China'),
(42, 'dfs'),
(45, 'England'),
(33, 'fads'),
(47, 'France'),
(13, 'Indonexia'),
(5, 'Japan'),
(4, 'Korea'),
(12, 'Lao'),
(20, 'Singapore'),
(2, 'Thailand'),
(1, 'Viet Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'pop'),
(2, 'rap'),
(3, 'country'),
(4, 'rock'),
(5, 'jazz');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlist_song`
--

CREATE TABLE `playlist_song` (
  `id` int(11) NOT NULL,
  `playlist` int(11) NOT NULL,
  `song` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lyrics` text DEFAULT NULL,
  `genre` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `song`
--

INSERT INTO `song` (`id`, `name`, `lyrics`, `genre`, `country`, `link`, `summary`, `image`) VALUES
(1, 'Nàng thơ', NULL, 1, 1, 'nangtho.mp3', NULL, 'nangtho.jpg'),
(3, 'Hai Triệu Năm', NULL, 2, 1, 'haitrieunam.mp3', NULL, 'haitrieunam.png'),
(5, 'Nắng ấm xa dần', NULL, 1, 1, 'nangamxadan.mp3', NULL, 'nangamxadan.jpeg'),
(11, 'Vùng kí ức', NULL, 1, 1, 'vungkyuc.mp3', NULL, 'vungkyuc.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_password_hash` varchar(255) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_image` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`, `user_image`) VALUES
(7, 'nguyenvandien', '$2y$10$wCcTckBvmC3I6.TVOjNblOvl9Xc5p64nXfkkoSG7r2G9RRWXoDYjG', 'nguyenvandien2000@gmail.com', NULL),
(8, 'tranduchuy', '$2y$10$HRmWhNaL0JJ.0t0aK7Ekje5GiAQ64q6xaSkQ8Z2zXMcrj5DXMICy.', 'tranduchuy2000@gmail.com', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_name` (`admin_name`);

--
-- Chỉ mục cho bảng `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_artist_country` (`country`);

--
-- Chỉ mục cho bảng `artist_song`
--
ALTER TABLE `artist_song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist` (`artist`),
  ADD KEY `song` (`song`);

--
-- Chỉ mục cho bảng `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_playlist_user_2` (`user`);

--
-- Chỉ mục cho bảng `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_song_playlist_1` (`playlist`),
  ADD KEY `FK_song_playlist_2` (`song`);

--
-- Chỉ mục cho bảng `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_song_genre` (`genre`),
  ADD KEY `FK_song_country` (`country`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `artist_song`
--
ALTER TABLE `artist_song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `playlist_song`
--
ALTER TABLE `playlist_song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `artist`
--
ALTER TABLE `artist`
  ADD CONSTRAINT `FK_artist_country` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Các ràng buộc cho bảng `artist_song`
--
ALTER TABLE `artist_song`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`artist`) REFERENCES `artist` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK2` FOREIGN KEY (`song`) REFERENCES `song` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Các ràng buộc cho bảng `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `FK_playlist_user_2` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD CONSTRAINT `FK_song_playlist_1` FOREIGN KEY (`playlist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_song_playlist_2` FOREIGN KEY (`song`) REFERENCES `song` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `FK_song_country` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_song_genre` FOREIGN KEY (`genre`) REFERENCES `genre` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
