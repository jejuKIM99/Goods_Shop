-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-08-27 01:49
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

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`post_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `community`
--
ALTER TABLE `community`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
