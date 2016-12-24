-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-24 06:23:08
-- 伺服器版本: 10.1.19-MariaDB
-- PHP 版本： 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `sell`
--

-- --------------------------------------------------------

--
-- 資料表結構 `bom`
--

CREATE TABLE `bom` (
  `IID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `PID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `much` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `bom`
--

INSERT INTO `bom` (`IID`, `PID`, `much`, `num`) VALUES
('I01', 'P01', 3, 1),
('I02', 'P01', 2, 2),
('I05', 'P01', 2, 3),
('I01', 'P02', 5, 4),
('I02', 'P02', 8, 5),
('I03', 'P02', 2, 6),
('I07', 'P02', 2, 7),
('I08', 'P03', 6, 8),
('I01', 'P03', 6, 9),
('I02', 'P03', 3, 10),
('I01', 'P04', 5, 11),
('I02', 'P04', 5, 12),
('I01', 'P05', 3, 13),
('I02', 'P05', 5, 14);

-- --------------------------------------------------------

--
-- 資料表結構 `buy`
--

CREATE TABLE `buy` (
  `time` datetime NOT NULL,
  `thing` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `UID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `much` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `buy`
--

INSERT INTO `buy` (`time`, `thing`, `num`, `UID`, `much`) VALUES
('2016-12-24 13:17:34', '白白的麵粉', 1, 'Mary', 0),
('2016-12-24 13:20:19', '純綿鮮奶油', 2, 'Mary', 2),
('2016-12-24 13:20:55', '雞蛋', 3, 'Mary', 2),
('2016-12-24 13:20:55', '牛奶', 4, 'Mary', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `ingredient`
--

CREATE TABLE `ingredient` (
  `IID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `ingredient`
--

INSERT INTO `ingredient` (`IID`, `cname`, `price`) VALUES
('I01', '白白的麵粉', 30),
('I02', '雞蛋', 50),
('I03', '純綿鮮奶油', 60),
('I04', '草莓', 20),
('I05', '牛奶', 50),
('I06', '巧克力', 70),
('I07', '麻糬', 50),
('I08', '紅豆', 30);

-- --------------------------------------------------------

--
-- 資料表結構 `machine`
--

CREATE TABLE `machine` (
  `MID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `cname` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `machine`
--

INSERT INTO `machine` (`MID`, `price`, `cname`) VALUES
('M01', 50, '跳跳麵包機');

-- --------------------------------------------------------

--
-- 資料表結構 `make`
--

CREATE TABLE `make` (
  `time` datetime NOT NULL,
  `PID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `user` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `make`
--

INSERT INTO `make` (`time`, `PID`, `num`, `user`) VALUES
('2016-12-24 12:32:33', 'P04', 3, 'Mary'),
('2016-12-24 13:08:03', 'P02', 4, 'Mary'),
('2016-12-24 13:09:41', 'P01', 5, 'Mary');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `PID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`PID`, `cname`, `price`, `time`) VALUES
('P01', '小吃貨專用吐司', 700, 120),
('P02', '中國黑心小麻糬麵包', 600, 60),
('P03', '麵包超人紅豆臉麵包', 200, 30),
('P04', '假的牛角麵包', 300, 30),
('P05', '讓你吃土巧克力麵包', 100, 40);

-- --------------------------------------------------------

--
-- 資料表結構 `status`
--

CREATE TABLE `status` (
  `time` datetime NOT NULL,
  `PID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `cname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `busy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `status`
--

INSERT INTO `status` (`time`, `PID`, `MID`, `num`, `cname`, `busy`) VALUES
('2016-12-24 12:32:33', 'P04', 'M01', 1, '跳跳麵包機', 0),
('2016-12-24 13:09:41', 'P01', 'M01', 2, '跳跳麵包機', 0),
('2016-12-24 13:08:03', 'P02', 'M01', 3, '跳跳麵包機', 0),
('2016-12-24 13:06:55', 'P01', 'M01', 4, '跳跳麵包機', 0),
('2016-12-24 13:06:55', 'P01', 'M01', 5, '跳跳麵包機', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `ID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `passwd` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`ID`, `money`, `passwd`) VALUES
('Kein', 8500, 'k'),
('Mary', 10000, 'mary'),
('Sary', 6935, 's');

-- --------------------------------------------------------

--
-- 資料表結構 `userlist`
--

CREATE TABLE `userlist` (
  `have` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `UID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `much` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `userlist`
--

INSERT INTO `userlist` (`have`, `UID`, `much`, `num`) VALUES
('I01', 'Mary', 34, 1),
('I02', 'Mary', 4, 2),
('I03', 'Mary', 164, 3),
('I04', 'Mary', 45, 4),
('I05', 'Mary', 8, 5),
('I06', 'Mary', 28, 6),
('I07', 'Mary', 62, 7),
('I08', 'Mary', 2, 8),
('M01', 'Mary', 5, 9),
('M02', 'Mary', 1, 10),
('I01', 'Mike', 32, 11),
('P01', 'Mary', 13, 12),
('P02', 'Mary', 35, 13),
('M03', 'Mike', 1, 14),
('P03', 'Mary', 18, 15),
('P04', 'Mary', 5, 16);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`num`);

--
-- 資料表索引 `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`num`);

--
-- 資料表索引 `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`IID`);

--
-- 資料表索引 `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`MID`);

--
-- 資料表索引 `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`num`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`);

--
-- 資料表索引 `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`num`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`num`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `bom`
--
ALTER TABLE `bom`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用資料表 AUTO_INCREMENT `buy`
--
ALTER TABLE `buy`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `make`
--
ALTER TABLE `make`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `status`
--
ALTER TABLE `status`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `userlist`
--
ALTER TABLE `userlist`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
