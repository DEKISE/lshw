-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 04 2024 г., 10:53
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
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `posted_at` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `text`, `posted_at`, `image`) VALUES
(1, 2, 'test', '2024-05-30', ''),
(2, 2, 'тест', '2024-05-30', ''),
(3, 2, 'qqqqq', '2024-05-31', ''),
(4, 2, 'wwwwwww', '2024-05-31', ''),
(5, 1, 'rrrrrrrrrrrr', '2024-05-31', ''),
(6, 1, 'bbbbbbbbbbbbbbbb', '2024-05-31', ''),
(7, 1, '111111', '2024-05-31', ''),
(8, 1, '222222', '2024-05-31', ''),
(9, 1, '9', '2024-05-31', ''),
(10, 1, '10', '2024-05-31', ''),
(12, 2, 'test', '2024-05-31', ''),
(13, 2, 'rrrr', '2024-05-31', ''),
(14, 2, '1111', '2024-05-31', ''),
(15, 2, '1111', '2024-05-31', ''),
(16, 2, 'qqqq', '2024-06-03', '/upload/1.jpg'),
(17, 2, '123', '2024-06-03', '/upload/1.jpg'),
(18, 2, '4567', '2024-06-03', '/upload/2.jpg'),
(19, 2, '5555', '2024-06-03', '/upload/3.png'),
(20, 2, '444444', '2024-06-03', ''),
(23, 1, '2222', '2024-06-04', ''),
(25, 1, '2222', '2024-06-04', ''),
(26, 2, '111', '2024-06-04', ''),
(27, 2, '123', '2024-06-04', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Ivan', 'i@', '0de2a1273fdbe93544ec59995cc262385fd7d716', '2024-05-28'),
(2, 'Anton', 'a@', '0de2a1273fdbe93544ec59995cc262385fd7d716', '2024-05-29'),
(3, 'Petr', 'p@', '0de2a1273fdbe93544ec59995cc262385fd7d716', '2024-05-30'),
(4, 'Olga', 'o@', '0de2a1273fdbe93544ec59995cc262385fd7d716', '2024-05-30'),
(5, 'Test', 't@', '0de2a1273fdbe93544ec59995cc262385fd7d716', '2024-05-30');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
