-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Май 20 2024 г., 16:23
-- Версия сервера: 8.0.36-0ubuntu0.22.04.1
-- Версия PHP: 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `burgers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `street` varchar(100) NOT NULL DEFAULT '0',
  `home` varchar(4) NOT NULL DEFAULT '0',
  `part` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `appt` varchar(11) NOT NULL DEFAULT '0',
  `floor` varchar(10) NOT NULL DEFAULT '0',
  `comment` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `data`, `user_id`, `street`, `home`, `part`, `appt`, `floor`, `comment`) VALUES
(1, '2024-05-20', 16, 'Arbat', '10', '', '5', '2', 'text'),
(2, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(3, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(4, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(5, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(6, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(7, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(8, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(9, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(10, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(11, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(12, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(13, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(14, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(15, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(16, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(17, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(18, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(19, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(20, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(21, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(22, '2024-05-20', 16, 'Arbat', '10', '2', '5', '2', 'text'),
(23, '2024-05-20', 17, 'Arbat', '10', '2', '5', '2', 'text');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(12) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '0',
  `orders` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `orders`) VALUES
(16, 'Ivan', ' 71117771177', 'e@mail', 29),
(17, 'Ivan', ' 71117771177', 'e2@mail', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
