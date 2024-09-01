-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-09-02 02:23
-- 서버 버전: 10.4.28-MariaDB
-- PHP 버전: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `geet`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `production` varchar(100) DEFAULT NULL,
  `sales` int(11) DEFAULT 0,
  `release_date` date DEFAULT NULL,
  `contents` text DEFAULT NULL,
  `list` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `albums`
--

INSERT INTO `albums` (`id`, `name`, `image`, `price`, `production`, `sales`, `release_date`, `contents`, `list`) VALUES
(1, 'Al333', 'shop/album/new album_1.png', 1500, 'Hoshimi', 500, '2024-01-01', NULL, NULL),
(2, 'Bl444', 'shop/album/new album_2.png', 2900, 'Ban', 150, '2024-02-15', NULL, NULL),
(3, 'Al567', 'shop/album/new album_3.jpg', 3000, 'BIG4', 300, '2024-03-20', NULL, NULL),
(4, 'bl3344', 'shop/album/new album_4.png', 4000, 'Hoshimi', 250, '2024-04-10', NULL, NULL),
(5, 'Album 1', 'shop/album/new album_5.jpg', 4500, 'Hoshimi', 500, '2024-01-01', NULL, NULL),
(6, 'Album 1', 'shop/album/new album_6.jpg', 5500, 'Ban', 600, '2024-02-01', NULL, NULL),
(7, 'Album 1', 'shop/album/new album_7.png', 2500, 'Big4', 1100, '2024-01-11', NULL, NULL),
(8, 'Album 1', 'shop/album/new album_8.png', 3200, 'Hoshimi', 400, '2024-03-01', NULL, NULL),
(9, 'Album 1', 'shop/album/new album_9.png', 6700, 'Hoshimi', 200, '2024-04-01', NULL, NULL),
(10, 'Album 1', 'shop/album/new album_5.jpg', 5500, 'Hoshimi', 600, '2024-01-12', NULL, NULL),
(11, 'Album 1', 'shop/album/new album_5.jpg', 2500, 'Hoshimi', 700, '2024-01-01', NULL, NULL),
(12, 'Album 1', 'shop/album/new album_5.jpg', 5000, 'Hoshimi', 2200, '2024-01-01', NULL, NULL),
(13, 'Album 1', 'shop/album/new album_5.jpg', 3200, 'Hoshimi', 100, '2024-01-01', NULL, NULL),
(14, 'Album 1', 'shop/album/new album_5.jpg', 4200, 'Hoshimi', 10, '2024-01-01', NULL, NULL),
(15, 'Album 1', 'shop/album/new album_5.jpg', 5400, 'Hoshimi', 2300, '2024-01-01', NULL, NULL),
(16, 'Album 1', 'shop/album/new album_5.jpg', 1200, 'Hoshimi', 200, '2024-01-01', NULL, NULL),
(17, 'Album 1', 'shop/album/new album_5.jpg', 3200, 'Hoshimi', 640, '2024-01-01', NULL, NULL),
(18, 'Album 1', 'shop/album/new album_5.jpg', 2200, 'Hoshimi', 320, '2024-01-01', NULL, NULL),
(19, 'Album 1', 'shop/album/new album_5.jpg', 4500, 'Hoshimi', 3210, '2024-01-01', NULL, NULL),
(20, 'Album 1', 'shop/album/new album_5.jpg', 5600, 'Hoshimi', 0, '2024-01-01', NULL, NULL),
(29, 'dump1', 'path/to/image1.jpg', 20, 'Hoshimi', 500, '2024-01-01', NULL, NULL),
(30, 'dump2', 'path/to/image2.jpg', 30, 'Ban', 150, '2024-02-15', NULL, NULL),
(31, 'dump3', 'path/to/image3.jpg', 15, 'BIG4', 300, '2024-03-20', NULL, NULL),
(32, 'dump4', 'path/to/image4.jpg', 25, 'Hoshimi', 250, '2024-04-10', NULL, NULL),
(33, 'dump5', 'path/to/image2.jpg', 30, 'Ban', 150, '2024-02-15', NULL, NULL),
(34, 'dump6', 'path/to/image3.jpg', 15, 'BIG4', 300, '2024-03-20', NULL, NULL),
(35, 'dump7', 'path/to/image4.jpg', 25, 'Hoshimi', 250, '2024-04-10', NULL, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `community`
--

CREATE TABLE `community` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(8) NOT NULL,
  `post_date` date NOT NULL,
  `views` int(11) DEFAULT 0,
  `contents` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `community`
--

INSERT INTO `community` (`post_id`, `title`, `author`, `post_date`, `views`, `contents`) VALUES
(1, '인기 음악 앨범', 'KIM', '2024-08-23', 25, '새로 출시된 인기 음악 앨범에 대한 리뷰입니다.'),
(2, '최신 기술 트렌드', 'dump1', '2024-08-23', 40, '최신 기술 트렌드와 혁신적인 기술에 대한 논의입니다.'),
(3, '여름 휴가 계획', 'KIM', '2024-08-23', 15, '올 여름 휴가 계획과 여행지 추천입니다.'),
(4, '가장 핫한 영화', 'dump1', '2024-08-24', 30, '현재 상영 중인 가장 핫한 영화에 대한 소개입니다.'),
(5, '건강한 식생활', 'KIM', '2024-08-24', 20, '건강한 식생활을 위한 식단과 팁입니다.'),
(6, '스포츠 뉴스', 'dump1', '2024-08-24', 25, '최근 스포츠 뉴스와 경기 결과입니다.'),
(7, '새로운 책 추천', 'KIM', '2024-08-25', 18, '추천하는 새로운 책과 읽을 만한 책 목록입니다.'),
(8, '뮤직 페스티벌', 'dump1', '2024-08-25', 22, '다음 주에 열리는 뮤직 페스티벌에 대한 정보입니다.'),
(9, '홈 가드닝 팁', 'KIM', '2024-08-25', 28, '홈 가드닝을 위한 유용한 팁과 가이드입니다.'),
(10, '겨울 패션 트렌드', 'dump1', '2024-08-26', 35, '다가오는 겨울 패션 트렌드에 대한 소개입니다.'),
(11, '영화 리뷰', 'KIM', '2024-08-26', 20, '최근 개봉한 영화에 대한 리뷰입니다.'),
(12, '신제품 출시', 'dump1', '2024-08-27', 50, '최근 출시된 신제품과 그에 대한 설명입니다.'),
(13, '세계 여행', 'KIM', '2024-08-27', 30, '세계 여행지와 여행 팁에 대한 게시글입니다.'),
(14, '리더십과 경영', 'dump1', '2024-08-28', 25, '리더십과 경영에 대한 유용한 정보입니다.'),
(15, '집에서 요리하기', 'KIM', '2024-08-28', 40, '집에서 요리하기 위한 레시피와 팁입니다.'),
(16, '여름 영화 추천', 'dump1', '2024-08-28', 22, '여름에 보기 좋은 영화 추천 리스트입니다.'),
(17, '창업과 비즈니스', 'KIM', '2024-08-29', 30, '창업과 비즈니스에 대한 조언과 팁입니다.'),
(18, '건강 관리 방법', 'dump1', '2024-08-29', 40, '건강을 유지하기 위한 다양한 관리 방법입니다.'),
(19, '최고의 음악 앨범', 'KIM', '2024-08-29', 20, '최근 최고의 음악 앨범과 아티스트 소개입니다.'),
(20, '여행 준비 체크리스트', 'dump1', '2024-08-30', 35, '여행을 준비하기 위한 체크리스트입니다.');

-- --------------------------------------------------------

--
-- 테이블 구조 `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `production` varchar(255) DEFAULT NULL,
  `sales` int(11) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `contents` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `goods`
--

INSERT INTO `goods` (`id`, `name`, `image`, `price`, `production`, `sales`, `release_date`, `contents`) VALUES
(1, 'Good 1', 'images/good1.jpg', 1000, 'Production A', 150, '2024-01-15', NULL),
(2, 'Good 2', 'images/good2.jpg', 2000, 'Production B', 200, '2024-01-16', NULL),
(3, 'Good 3', 'images/good3.jpg', 1500, 'Production C', 120, '2024-01-17', NULL),
(4, 'Good 4', 'images/good4.jpg', 1800, 'Production A', 180, '2024-01-18', NULL),
(5, 'Good 5', 'images/good5.jpg', 2200, 'Production B', 160, '2024-01-19', NULL),
(6, 'Good 6', 'images/good6.jpg', 1300, 'Production C', 140, '2024-01-20', NULL),
(7, 'Good 7', 'images/good7.jpg', 1600, 'Production A', 170, '2024-01-21', NULL),
(8, 'Good 8', 'images/good8.jpg', 2400, 'Production B', 190, '2024-01-22', NULL),
(9, 'Good 9', 'images/good9.jpg', 1700, 'Production C', 150, '2024-01-23', NULL),
(10, 'Good 10', 'images/good10.jpg', 2000, 'Production A', 200, '2024-01-24', NULL),
(11, 'Good 11', 'images/good11.jpg', 2100, 'Production B', 210, '2024-01-25', NULL),
(12, 'Good 12', 'images/good12.jpg', 2500, 'Production C', 230, '2024-01-26', NULL),
(13, 'Good 13', 'images/good13.jpg', 1800, 'Production A', 190, '2024-01-27', NULL),
(14, 'Good 14', 'images/good14.jpg', 1900, 'Production B', 200, '2024-01-28', NULL),
(15, 'Good 15', 'images/good15.jpg', 2000, 'Production C', 210, '2024-01-29', NULL),
(16, 'Good 16', 'images/good16.jpg', 2200, 'Production A', 230, '2024-01-30', NULL),
(17, 'Good 17', 'images/good17.jpg', 2300, 'Production B', 240, '2024-01-31', NULL),
(18, 'Good 18', 'images/good18.jpg', 2400, 'Production C', 250, '2024-02-01', NULL),
(19, 'Good 19', 'images/good19.jpg', 2500, 'Production A', 260, '2024-02-02', NULL),
(20, 'Good 20', 'images/good20.jpg', 2600, 'Production B', 270, '2024-02-03', NULL),
(21, 'Good 21', 'images/good21.jpg', 2700, 'Production C', 280, '2024-02-04', NULL),
(22, 'Good 22', 'images/good22.jpg', 2800, 'Production A', 290, '2024-02-05', NULL),
(23, 'Good 23', 'images/good23.jpg', 2900, 'Production B', 300, '2024-02-06', NULL),
(24, 'Good 24', 'images/good24.jpg', 3000, 'Production C', 310, '2024-02-07', NULL),
(25, 'Good 25', 'images/good25.jpg', 3100, 'Production A', 320, '2024-02-08', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `login_attempts`
--

CREATE TABLE `login_attempts` (
  `attempt_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `attempt_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `purchase_history`
--

CREATE TABLE `purchase_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `purchase_date` datetime DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `purchase_history`
--

INSERT INTO `purchase_history` (`id`, `user_id`, `product_name`, `purchase_date`, `price`) VALUES
(1, 5, 'Al333', '2024-08-01 14:30:00', 1500),
(2, 5, 'Bl444', '2024-08-05 10:15:00', 2900),
(3, 5, 'Good 1', '2024-08-10 12:00:00', 1000),
(4, 5, 'Good 2', '2024-08-15 16:45:00', 2000),
(5, 5, 'Al567', '2024-08-20 11:30:00', 3000),
(6, 5, 'Good 3', '2024-08-25 09:00:00', 1500),
(7, 5, 'bl3344', '2024-09-01 18:30:00', 4000),
(8, 5, 'Album 1', '2024-09-05 13:15:00', 4500),
(9, 5, 'Good 4', '2024-09-10 15:00:00', 1800),
(10, 5, 'Good 5', '2024-09-15 14:30:00', 2200),
(11, 5, 'Album 1', '2024-09-20 16:00:00', 5500),
(12, 5, 'Good 6', '2024-09-25 12:00:00', 1300),
(13, 5, 'Good 7', '2024-10-01 11:00:00', 1600),
(14, 5, 'Album 1', '2024-10-05 14:45:00', 3200),
(15, 5, 'Good 8', '2024-10-10 09:30:00', 2400),
(16, 5, 'Good 9', '2024-10-15 16:15:00', 1700),
(17, 5, 'Album 1', '2024-10-20 13:00:00', 5600),
(18, 5, 'Good 10', '2024-10-25 18:00:00', 2000),
(19, 5, 'Good 11', '2024-11-01 10:30:00', 2100),
(20, 5, 'Album 1', '2024-11-05 14:00:00', 2500),
(21, 5, 'Good 12', '2024-11-10 12:45:00', 2500),
(22, 5, 'Good 13', '2024-11-15 11:15:00', 1800),
(23, 5, 'Album 1', '2024-11-20 13:30:00', 5400),
(24, 5, 'Good 14', '2024-12-01 10:00:00', 1900),
(25, 5, 'Good 15', '2024-12-05 12:15:00', 2000),
(26, 5, 'Album 1', '2024-12-10 15:00:00', 4200),
(27, 5, 'Good 16', '2024-12-15 14:45:00', 2200),
(28, 5, 'Good 17', '2024-12-20 09:00:00', 2300),
(29, 5, 'Album 1', '2024-12-25 18:30:00', 3200),
(30, 5, 'Good 18', '2024-12-30 13:00:00', 2400),
(31, 5, 'Good 19', '2024-12-31 14:15:00', 2500),
(32, 5, 'Good 20', '2024-12-31 15:00:00', 2600),
(33, 5, 'dump1', '2024-08-02 09:00:00', 20),
(34, 5, 'dump2', '2024-08-07 14:30:00', 30),
(35, 5, 'dump3', '2024-08-12 11:00:00', 15),
(36, 5, 'dump4', '2024-08-17 16:45:00', 25);

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nickname` varchar(8) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `users`
--

INSERT INTO `users` (`user_id`, `email`, `nickname`, `password_hash`, `created_at`, `updated_at`, `profile_image`) VALUES
(5, 's2005i@naver.com', 'KIM', '$2y$10$uzpED.vwc203O4sNPZmUauO.zr.VBxg2wsEk0klTkZiDXdqwihByC', '2024-08-20 14:54:11', '2024-09-01 17:10:00', 'uploads/new album_5.jpg'),
(11, '12345@gmail.com', 'dump1', '$2y$10$GKEK5qps/evcyyaSQ72aQOdpu1joerfwXnacQnwoytU3HarrqsMwm', '2024-08-20 16:09:39', '2024-08-23 15:06:29', 'uploads/new album_5.jpg');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `price` (`price`),
  ADD KEY `production` (`production`),
  ADD KEY `release_date` (`release_date`);

--
-- 테이블의 인덱스 `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`post_id`);

--
-- 테이블의 인덱스 `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`attempt_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 테이블의 인덱스 `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 테이블의 AUTO_INCREMENT `community`
--
ALTER TABLE `community`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 테이블의 AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 테이블의 AUTO_INCREMENT `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- 테이블의 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD CONSTRAINT `login_attempts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- 테이블의 제약사항 `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD CONSTRAINT `purchase_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
