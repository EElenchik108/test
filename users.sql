-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 14 2021 г., 18:09
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `is_confirned` tinyint(1) NOT NULL DEFAULT '0',
  `role` enum('admin','user') NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_confirned`, `role`, `password_hash`, `auth_token`, `created_at`) VALUES
(23, 'Elena', 'Margarita1@mail.ru', 1, 'user', '$2y$10$tUuwC1M.jDXFy7nTEwzYAOR34zfr7F21XU0AKEgXgtMLd.OeEXFdW', '818face2256b80e73f3dca01fa4c095688f0da48', '2021-03-08 16:24:54'),
(24, 'Margarita', 'eee1@mail.ru', 0, 'user', '$2y$10$8ntmZmW5avNd4kfQDzD5ouaUKJToHtjxA5CSeiJehHcdfpqvcUmWq', '10cb7f710b54e06ea5842a52d18a22c01dee734f', '2021-03-08 16:31:49'),
(25, 'Olechka', 'Elenchik1@gmail.com', 0, 'user', '$2y$10$HR3AAk3GRpZP4iDDbA1X5u9kzvHImkhabfKw8P8eURBUf93H1AtDe', '448047d38ab48d1f9edccaa2c8162fdffb706c49', '2021-03-08 17:04:46'),
(26, 'Ilon Mask', 'eee1111@mail.ru', 0, 'user', '$2y$10$XVA1X8F4NzFsPvD2xSXyHuuZMGFcC2pzNnJF94wwqCF00DjJCbqIy', 'b6a4d2ad61555b1c2f73206b86a4a292489c398a', '2021-03-08 17:50:45'),
(27, 'Margarita', 'eeltyuit1@mail.ru', 0, 'user', '$2y$10$rUAllGquaRgYNedY9c663.x44e/UQ4jqtIETrELGgF46YzxdoyN2i', 'a09edf81759f92b721c6e3ce97ec76ab2256aca5', '2021-03-08 19:13:22'),
(28, 'Elechik', 'e12327@mail.ru', 0, 'user', '$2y$10$Tc6xewvrzuEcwQZinoUT9eKCEHtUusEfFKDq37D8rZl/kaoQ9.RBW', 'dc8ea28fd57eabe9630cd2789e1b3895ff9decea', '2021-03-08 19:15:46'),
(29, 'Great God', 'edfgsdfg@mail.ru', 0, 'user', '$2y$10$Go0Os1ezDXUXzTZ/hpbZbe9Oe1E/JF22oEaAdedLGggoQBboW7Koy', 'e67a0ab6752bd23a7887305da0db605da74f3df1', '2021-03-08 20:10:42'),
(30, 'Elenka', 'eelenchik1@mail.ru', 0, 'user', '$2y$10$YfuIsOEaoVCe7Z4IkhQ.Yue2x8cWBzbDudnORbZsNkjF2HziwnIem', '9a6b9dd03a44812151a76552c4dcd15ffee0b4c1', '2021-03-14 16:43:09');

--
-- Индексы сохранённых таблиц
--

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
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
