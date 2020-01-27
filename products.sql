-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 27 2020 г., 19:11
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `price` float UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `is_recommended` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `status`, `category_id`, `price`, `brand`, `description`, `is_new`, `is_recommended`) VALUES
(1, 'Angry Cat', 'angry-cat', 1, 3, 123, 'cats', 'Can Created Posts', 1, 0),
(2, 'Preaty Dog', 'prety-cat', 1, 8, 555, 'dogges', 'tesat cat description', 1, 0),
(3, 'New cat with slub', 'new-cat-with-slub', 1, 3, 123, 'dogges', 'Can Created Posts Can Created PostsCan Created PostsCan Created PostsCan Created PostsCan Created PostsCan Created Posts', 1, 0),
(4, 'Cat with picture', 'cat-with-picture', 1, 8, 555, 'cats', 'tesat cat description', 1, 0),
(5, 'Super Dog', 'super-dog', 1, 2, 555, 'dogges', 'tesat cat description', 1, 0),
(6, 'Tommy Cat', 'tommy-cat', 1, 3, 123, 'cats', 'Can Created Posts', 1, 0),
(7, 'Sam Cat', 'sam-cat', 1, 3, 234, 'cats', 'Can Created Posts', 1, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
