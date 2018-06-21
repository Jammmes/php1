-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 08 2018 г., 13:06
-- Версия сервера: 5.6.22-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lesson6`
--
CREATE DATABASE IF NOT EXISTS `lesson6` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `lesson6`;

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `img` (`img`),
  KEY `name` (`name`),
  KEY `country` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `country`, `price`, `img`) VALUES
(1, 'Виноград', '   Турция', 34.8, '/img/102.JPG'),
(2, 'Помидоры', 'Турция', 15.1, '/img/81.jpg'),
(3, 'Перец', 'Турция', 18, '/img/12.jpg'),
(4, 'Редис', 'Россия', 9.2, '/img/28.jpg'),
(5, 'Лук', 'Россия', 5.6, '/img/15.jpg'),
(6, 'Клубника', 'Греция', 42.4, '/img/128.jpg'),
(8, 'Автомобиль', 'Новая зеландия', 4534, '/img/1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `email`, `user`, `comment`) VALUES
(1, 'rnd@gmail.com', 'Ronald', 'Очень хорошие продукты!'),
(2, 'kostya@ya.ru', 'Константин', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum'),
(3, 'masha@sasha.en', 'Maria', 'Aut explicabo sit veritatis quia voluptas.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
