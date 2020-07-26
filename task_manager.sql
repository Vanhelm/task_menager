-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 27 2020 г., 00:43
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task_manager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL,
  `text_task` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_user` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Гость',
  `email_user` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id_task`, `text_task`, `name_user`, `email_user`, `status`) VALUES
(1, 'Необходимо купить 32 серебряных пони, и ублажить их', 'Гость', 'mpohilchuk@gmai.com', 1),
(2, 'Купить револьвер кольт, и застрелить призрака', 'Вин Винчестер', 'Winchester@gmail.com', 0),
(3, 'новый текст', '', '', 1),
(4, 'fdgdffdvdf', '', 'mpohilchuk@gmail.com', 0),
(5, 'Тестовая задача', '', 'mpohilchuk@gmail.com', 0),
(6, 'test', 'гость', 'mpohilchuk@gmail.com', 0),
(7, 'тестовая задача с Именем', 'Максим', 'mpohilchuk@gmail.com', 0),
(8, 'Тестовая задача', 'Максим', 'mpohilchuk@gmail.com', 0),
(9, 'Ставим опыты дальше', 'noob', 'noob@mail.ru', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Гость',
  `admin` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `admin`) VALUES
(1, 'mpohilchuk@gmail.com', 'admin', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
