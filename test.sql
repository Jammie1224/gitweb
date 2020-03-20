-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2020-01-04 13:10:18
-- 伺服器版本： 8.0.17
-- PHP 版本： 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `station`
--

CREATE TABLE `station` (
  `start_station_id` int(5) NOT NULL,
  `start_station_name` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `terminal_station_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `station`
--

INSERT INTO `station` (`start_station_id`, `start_station_name`, `terminal_station_id`) VALUES
(1, '基隆', 0),
(2, '七堵', 0),
(3, '南港', 0),
(4, '松山', 0),
(5, '台北', 0),
(6, '萬華', 0),
(7, '板橋', 0),
(8, '樹林', 0),
(9, '桃園', 0),
(10, '中壢', 0),
(11, '新竹', 0),
(12, '竹南', 0),
(13, '苗栗', 0),
(14, '豐原', 0),
(15, '台中', 0),
(16, '彰化', 0),
(17, '員林', 0),
(18, '斗六', 0),
(19, '嘉義', 0),
(20, '新營', 0),
(21, '台南', 0),
(22, '岡山', 0),
(23, '新左營', 0),
(24, '高雄', 0),
(25, '屏東', 0),
(26, '潮州', 0),
(27, '台東', 0),
(28, '玉里', 0),
(29, '花蓮', 0),
(30, '蘇澳新', 0),
(31, '宜蘭', 0),
(32, '瑞芳', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `train_Num` int(11) NOT NULL,
  `seat` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pay` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `train_Num`, `seat`, `pay`) VALUES
(1234, 203, 'A01', 1),
(2345, 101, 'B50', 0),
(3456, 203, 'A11', 0),
(4567, 300, 'A20', 1),
(5678, 203, 'A32', 1),
(6789, 101, 'B08', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `train`
--

CREATE TABLE `train` (
  `trainNum` int(11) NOT NULL,
  `train_type_id` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `start_station` int(10) NOT NULL,
  `terminal_station` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `money` int(11) NOT NULL,
  `remain_seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `train`
--

INSERT INTO `train` (`trainNum`, `train_type_id`, `start_station`, `terminal_station`, `date`, `time`, `money`, `remain_seat`) VALUES
(101, 'AA01', 3, 15, '2019-11-28', '07:00:00', 440, 50),
(202, 'AA02', 5, 20, '2019-11-30', '10:45:00', 400, 22),
(203, 'AA02', 1, 18, '2019-11-30', '11:10:00', 600, 20),
(300, 'AA03', 10, 25, '2019-11-28', '12:05:00', 600, 60);

-- --------------------------------------------------------

--
-- 資料表結構 `train_type`
--

CREATE TABLE `train_type` (
  `train_type_id` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `train_type_name` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `train_type`
--

INSERT INTO `train_type` (`train_type_id`, `train_type_name`) VALUES
('AA01', '自強號'),
('AA02', '太魯閣'),
('AA03', '普悠瑪'),
('AA04', '莒光號');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`start_station_id`);

--
-- 資料表索引 `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `train_Num` (`train_Num`);

--
-- 資料表索引 `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`trainNum`),
  ADD KEY `fk_start_station_id` (`start_station`);

--
-- 資料表索引 `train_type`
--
ALTER TABLE `train_type`
  ADD PRIMARY KEY (`train_type_id`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `train_Num` FOREIGN KEY (`train_Num`) REFERENCES `train` (`trainNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `fk_start_station_id` FOREIGN KEY (`start_station`) REFERENCES `station` (`start_station_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
