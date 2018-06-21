-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 21 2018 г., 16:09
-- Версия сервера: 5.6.22-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lesson8`
--
CREATE DATABASE IF NOT EXISTS `lesson8` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `lesson8`;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount_price` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `img` (`img`),
  KEY `name` (`name`),
  KEY `country` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `country`, `price`, `img`, `discount_price`) VALUES
(1, 'Виноград', 'Армения', 158.9, '/img/102.JPG', 3.5),
(2, 'Помидоры', ' Турция', 15.1, '/img/81.jpg', 2.1),
(3, 'Перец', 'Турция', 18, '/img/12.jpg', 2),
(4, 'Редис', 'Россия', 9.2, '/img/28.jpg', 2.2),
(5, 'Лук', 'Россия', 5.6, '/img/15.jpg', 2.6),
(6, 'Клубника', ' Греция', 42.4, '/img/128.jpg', 2.4),
(7, 'Орел', 'Америка', 1000, '/img/5.jpg', 2),
(8, 'Автомобиль', 'Япония', 25000, '/img/1.jpg', 1050);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`) VALUES
(23, 5, '2018-06-21'),
(26, 5, '2018-06-21'),
(28, 1, '2018-06-21'),
(29, 3, '2018-06-21'),
(30, 3, '2018-06-21');

-- --------------------------------------------------------

--
-- Структура таблицы `orders_rows`
--

DROP TABLE IF EXISTS `orders_rows`;
CREATE TABLE IF NOT EXISTS `orders_rows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `good_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=125 ;

--
-- Дамп данных таблицы `orders_rows`
--

INSERT INTO `orders_rows` (`id`, `good_id`, `quantity`, `price`, `date`, `id_order`) VALUES
(105, 1, 3, 158.9, '2018-06-21 11:22:44', 23),
(113, 3, 1, 18, '2018-06-21 12:54:41', 26),
(117, 8, 1, 25000, '2018-06-21 12:55:11', 28),
(118, 7, 1, 1000, '2018-06-21 12:55:11', 28),
(119, 1, 2, 158.9, '2018-06-21 12:55:36', 29),
(120, 6, 2, 42.4, '2018-06-21 12:55:36', 29),
(121, 8, 13, 25000, '2018-06-21 12:55:47', 30),
(122, 1, 1, 158.9, '2018-06-21 13:07:41', 0),
(123, 2, 1, 15.1, '2018-06-21 13:07:41', 0),
(124, 4, 1, 9.2, '2018-06-21 13:07:41', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'bob', 'phAQt2zsyT4NU', 'user'),
(3, 'dima', 'phxsPjWYwf.b2', 'user'),
(5, 'eugen', 'phQ/nNqLov5G2', 'administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
