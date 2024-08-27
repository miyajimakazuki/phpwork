-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2024 年 8 月 26 日 08:52
-- サーバのバージョン： 8.0.35
-- PHP のバージョン: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `miyajma`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `miyajima_table`
--

CREATE TABLE `miyajima_table` (
  `id` int NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `relationship` varchar(128) DEFAULT NULL,
  `age` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- テーブルのデータのダンプ `miyajima_table`
--

INSERT INTO `miyajima_table` (`id`, `name`, `relationship`, `age`) VALUES
(1, 'kazuki', 'jibun', 36),
(2, 'kazuo', 'musuko', 10);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `miyajima_table`
--
ALTER TABLE `miyajima_table`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
