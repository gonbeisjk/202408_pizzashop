-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2024-11-29 03:41:27
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- データベース: `pizzashop`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `pizzas`
--

DROP TABLE IF EXISTS `pizzas`;
CREATE TABLE `pizzas` (
  `id` int(11) NOT NULL,
  `pizza_name` varchar(255) NOT NULL,
  `chef_name` varchar(255) NOT NULL,
  `toppings` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `pizzas`
--

INSERT INTO `pizzas` (`id`, `pizza_name`, `chef_name`, `toppings`, `created_at`) VALUES
(1, 'IPスペシャル', 'ピザ太郎', 'トマト,バジル,モッツァレラチーズ', '2024-11-27 17:12:11'),
(2, 'クァトロフォルマッジ', 'ピザンヌ', '水牛モッツァレラ,ゴルゴンゾーラ,タレッジョ,パルミジャーノ', '2024-11-27 17:21:32'),
(5, 'タランティーナ', 'よしだ', 'ピーマン,ベーコン', '2024-11-27 20:59:21'),
(6, 'あいうえお', 'かきくけこ', '', '2024-11-29 01:40:50');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
