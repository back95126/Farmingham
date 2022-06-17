-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-12 07:47:47
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `health2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `heart`
--

CREATE TABLE `heart` (
  `id` int(11) NOT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `diastolic` int(3) NOT NULL,
  `systolic` int(3) NOT NULL,
  `antih` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `smoker` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `diabete` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `tdl` int(3) NOT NULL,
  `hdl` int(3) NOT NULL,
  `score` int(3) NOT NULL,
  `risk` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `heart`
--

INSERT INTO `heart` (`id`, `sex`, `age`, `diastolic`, `systolic`, `antih`, `smoker`, `diabete`, `tdl`, `hdl`, `score`, `risk`) VALUES
(1, '女生', 22, 95, 145, '1', '1', '1', 150, 20, 11, 11),
(2, '男生', 95, 101, 165, '0', '0', '1', 150, 20, 11, 31),
(3, '男生', 10, 1, 145, '1', '1', '1', 280, 48, 9, 20),
(4, '男生', 87, 0, 135, '0', '0', '0', 150, 20, 9, 20),
(5, '男生', 10, 0, 110, '0', '0', '0', 150, 20, -1, 2);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `heart`
--
ALTER TABLE `heart`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `heart`
--
ALTER TABLE `heart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
