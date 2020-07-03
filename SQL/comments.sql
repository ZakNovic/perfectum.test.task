-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 03 2020 г., 05:44
-- Версия сервера: 8.0.15
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `comments`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  `slug` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `nickname`, `email`, `content`, `date`, `slug`) VALUES
(1, 'Bro', 'bro@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aspernatur dolore ducimus enim illum laborum magnam magni maxime quod reiciendis, rerum, sed tempore vel veniam vero! Dignissimos neque repellendus reprehenderit.', 1593724389, 0),
(84, 'Brother', 'bro1@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aspernatur dolore ducimus enim illum laborum magnam magni maxime quod reiciendis, rerum, sed tempore vel veniam vero! Dignissimos neque repellendus reprehenderit.', 1593724389, 0),
(85, 'Mother', 'bro2@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aspernatur dolore ducimus enim illum laborum magnam magni maxime quod reiciendis, rerum, sed tempore vel veniam vero! Dignissimos neque repellendus reprehenderit.', 1593724394, 0),
(92, 'Petya', 'pet@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aspernatur dolore ducimus enim illum laborum magnam magni maxime quod reiciendis, rerum, sed tempore vel veniam vero! Dignissimos neque repellendus reprehenderit.', 1593731319, 0),
(94, 'zaknovic', 'zaknovic@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aspernatur dolore ducimus enim illum laborum magnam magni maxime quod reiciendis, rerum, sed tempore vel veniam vero! Dignissimos neque repellendus reprehenderit.', 1593741513, 0),
(95, 'zak', 'zak@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aspernatur dolore ducimus enim illum laborum magnam magni maxime quod reiciendis, rerum, sed tempore vel veniam vero! Dignissimos neque repellendus reprehenderit.', 1593742899, 0),
(96, 'Core', 'core@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aspernatur dolore ducimus enim illum laborum magnam magni maxime quod reiciendis, rerum, sed tempore vel veniam vero! Dignissimos neque repellendus reprehenderit.', 1593741514, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
