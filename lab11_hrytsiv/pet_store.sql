-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 03 2024 р., 00:37
-- Версія сервера: 8.0.30
-- Версія PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `pet_store`
--

-- --------------------------------------------------------

--
-- Структура таблиці `hrytsiv_storage`
--

CREATE TABLE `hrytsiv_storage` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `hrytsiv_storage`
--

INSERT INTO `hrytsiv_storage` (`id`, `name`, `image`, `price`, `quantity`, `date_added`) VALUES
(1, 'Капібара', 'capybara.jpg', '10.50', 100, '2024-05-01 00:09:13'),
(2, 'Шиншила', 'сhinchilla.jpg', '15.75', 50, '2024-05-01 00:09:13'),
(3, 'Гекон', 'gecko.jpg', '8.25', 80, '2024-05-01 00:09:13'),
(4, 'Кролик', 'rabbit.jpg', '12.00', 120, '2024-05-01 00:09:13'),
(5, 'Тхір', 'ferret.jpg', '20.00', 30, '2024-05-01 00:09:13'),
(6, 'Цуцення', 'puppy.jpg', '25.00', 40, '2024-05-01 00:09:13'),
(7, 'Кішка', 'cat.jpg', '22.50', 60, '2024-05-01 00:09:13'),
(8, 'Папуга', 'parrot.jpg', '17.00', 70, '2024-05-01 00:09:13');

-- --------------------------------------------------------

--
-- Структура таблиці `hrytsiv_users`
--

CREATE TABLE `hrytsiv_users` (
  `id` int NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `repeat_password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_category` enum('Seller','Buyer') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `hrytsiv_users`
--

INSERT INTO `hrytsiv_users` (`id`, `first_name`, `last_name`, `login`, `password`, `repeat_password`, `user_category`) VALUES
(1, 'test', 'test1', 'test@gmail.com', '1235', '1235', 'Buyer'),
(2, 'Ivan', 'Hrytsiv', 'ivan.hrytsiv@pnu.edu.ua', 'pass', 'pass', 'Seller'),
(3, 'Ivan', 'Hrytsiv', 'ivan.hrytsiv@pnu.edu.ua', 'pass', 'pass', 'Seller'),
(4, 'TEST2', 'TSTE', 'test2@gmail.com', 'test3', 'test3', 'Seller'),
(5, 'awd', 'awd', 'awd@gmail.com', 'awd', 'awd', 'Seller'),
(6, 'tets', 'test', 'test@gamil.com', 'test@gamil.com', 'test@gamil.com', 'Seller'),
(7, 'test@gamil.com', 'test@gamil.com', 'test@gamil.com', 'test@gamil.com', 'test@gamil.com', 'Seller');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `hrytsiv_storage`
--
ALTER TABLE `hrytsiv_storage`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `hrytsiv_users`
--
ALTER TABLE `hrytsiv_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `hrytsiv_storage`
--
ALTER TABLE `hrytsiv_storage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблиці `hrytsiv_users`
--
ALTER TABLE `hrytsiv_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
