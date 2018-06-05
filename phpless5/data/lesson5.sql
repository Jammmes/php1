-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 05 2018 г., 12:45
-- Версия сервера: 5.6.22-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lesson5`
--
CREATE DATABASE IF NOT EXISTS `lesson5` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `lesson5`;

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`img`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `img`, `size`, `views`, `comment`) VALUES
(1, './img/3.jpg', 389, 67, 'Закат в поле'),
(2, './img/00709_darkness_2560x1600.jpg', 122, 111, 'Рассвет'),
(3, './img/1.jpg', 483, 5, 'Машина'),
(4, './img/2.jpg', 204, 4, 'Дерево'),
(5, './img/4.jpg', 251, 34, 'Пляж'),
(6, './img/5.jpg', 179, 46, 'Орел'),
(7, './img/6.jpg', 318, 5, 'Пальма'),
(8, './img/Nature-7.jpg', 95, 1, 'Зима'),
(9, './img/blue_skylight-1600.jpg', 204, 0, 'Причал'),
(10, './img/ozrx0899k0wzrchxh0sdcgpjifgrlb2o_6.jpg', 149, 5, 'Стрекоза'),
(11, './img/saterday-1024.jpg', 104, 0, 'Горы'),
(12, './img/vlks9n9r2psfi2jblll1sg7r7gnf08oj_6.jpg', 217, 0, 'Закат');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
