-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 27 2020 г., 19:35
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
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Doggy Pure', 1),
(2, 'dogs', 1),
(3, 'Tom Cat', 1),
(4, 'janus', 1),
(5, 'controller', 1),
(6, 'earth', 1),
(7, 'mars', 1),
(8, 'jupiter', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `guestbook`
--

INSERT INTO `guestbook` (`id`, `username`, `email`, `message`, `created_at`) VALUES
(1, 'John', 'john@example.com', 'Hi, It is John Doe', '2019-12-23 18:07:33'),
(2, 'Ann', 'ann@example.com', 'Hi, It is Mary Ann', '2019-12-23 18:09:01'),
(3, 'Cat', 'cat@my.cat', 'Hello Cats', '2019-12-23 18:09:49'),
(4, 'Dog', 'test@my.cat', 'Hello doggy', '2019-12-23 18:27:12');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `products`, `status`) VALUES
(1, 1, '2020-01-27 17:58:27', '\"[{\\\"id\\\":\\\"4\\\",\\\"name\\\":\\\"Cat with picture\\\",\\\"price\\\":\\\"555\\\",\\\"picture\\\":\\\"assets\\\\\\/images\\\\\\/products\\\\\\/34322a734b0492dd09dc63c1b9dd7fae8000f5681579286670\\\",\\\"amount\\\":4}]\"', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `resource` varchar(50) NOT NULL,
  `resource_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `filename`, `resource`, `resource_id`) VALUES
(1, '34322a734b0492dd09dc63c1b9dd7fae8000f5681579286670', 'products', 4),
(2, '141a7c8bcadc4a3f154033ecf3464ad1b0d790d71579286670', 'products', 4),
(3, 'e00d0747b0cdd0e64fe79b14f962fd28d40b6c0f1579286670', 'products', 4),
(4, '1c52f3110b2e7b2b24913b12042bd1ee5dedeb1b1579286670', 'products', 4),
(5, '351e545a9b397ca8b28bea7af8536d8cd8716c521579542563', 'products', 5),
(6, 'f4e6a6943fa15d99077b9cfe8238ad43f80394ba1579542563', 'products', 5),
(7, '5222952a56360dca79300d08c66e6699f039530c1579542638', 'products', 6),
(8, '2039095ed56d50026579f19cc74bd91dd3105cf41579542638', 'products', 6),
(9, '1c4e62179edb21661dbbee90b4d86e848447c0511579542674', 'products', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Nice cat go home', 'nice cat gos home', '2020-01-13 18:46:14');

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

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL DEFAULT '3',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `phone_number` varchar(13) DEFAULT NULL,
  `joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `status`, `first_name`, `last_name`, `phone_number`, `joined`) VALUES
(1, 'Super Cat', 'cat@my.cat', '$2y$12$UiS8HTtZIgVmuJmGs2HmuO0OMcmuI1Z5AYPQ5WWdncQfevbMkCsxS', 3, 1, 'Janus', 'Smith', '1234567', '2020-01-24 17:35:39'),
(2, 'Dirty Dog', 'dog@my.cat', '$2y$12$fA1c32UZJTUXteD4tA5HNOZG5l5b.k9VhV8yV0LqkkQp8xmag8cZS', 3, 1, 'John', 'Smith', '1234567', '2020-01-24 17:35:39'),
(3, 'admin', 'admin@my.cat', '$2y$12$lPBUabul5S2hC1xSn.0pKeSYhHABx6uxt8/MRHBoRrhmhbjCIWtmK', 1, 1, NULL, NULL, NULL, '2020-01-24 18:03:27');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
