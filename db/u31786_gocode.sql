-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 20 2022 г., 10:00
-- Версия сервера: 5.5.68-MariaDB-cll-lve
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u31786_gocode`
--

-- --------------------------------------------------------

--
-- Структура таблицы `awards`
--

CREATE TABLE IF NOT EXISTS `awards` (
  `id` int(10) unsigned NOT NULL,
  `category` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `awards`
--

INSERT INTO `awards` (`id`, `category`, `name`, `description`, `image`) VALUES
(1, 'Профиль', 'Со связью', 'Привязать свой номер телефона к профилю', 'https://crea.myarena.site/gocode/img/phone.png'),
(2, 'Профиль', 'Ура, баллы!', 'Привязка своего профиля программы лояльности ', 'https://crea.myarena.site/gocode/img/link.png'),
(3, 'Особые достижения', 'МЦКшер', 'Покататься на МЦК в течении 12 часов за месяц', 'https://crea.myarena.site/gocode/img/mcc.png'),
(4, 'Профиль', 'Избрал', 'Добавление в Избранное объектов транспортной инфраструктуры и маршрутов', 'https://crea.myarena.site/gocode/img/star.png'),
(6, 'Профиль', 'Лицом!', 'Пройти идентификацию в FacePay', 'https://crea.myarena.site/gocode/img/face.png'),
(7, 'Профиль', 'Тройка', 'Привязка карты Тройка в профиле', 'https://crea.myarena.site/gocode/img/troyka.png'),
(8, 'Особые достижения', 'Метрофанат', 'Посетить все 15 линий метро', 'https://crea.myarena.site/gocode/img/metroo.png'),
(9, 'Особые достижения', 'Все виды', 'Посетите все виды Московского транспорта', 'https://crea.myarena.site/gocode/img/metro1.png'),
(10, 'Особые достижения', 'Велосипедик', 'Покатайтесь на велосипеде или самокате каждый день в неделе', 'https://crea.myarena.site/gocode/img/bicycle.png'),
(12, 'Впервые', 'При деньгах', 'Пополнение карты "Тройка" на сумму минимум 300 руб.', 'https://crea.myarena.site/gocode/img/card.png'),
(13, 'Впервые', 'Выгода!', 'Купить месячный абонемент в сервисе Велобайк', 'https://crea.myarena.site/gocode/img/subscription.png'),
(14, 'Впервые', 'Деловой', 'Первое получение билета на Сити-шаттл', 'https://crea.myarena.site/gocode/img/bus.png'),
(15, 'Впервые', 'С комфортом', 'Первая покупка билета на водный транспорт\r\n', 'https://crea.myarena.site/gocode/img/water.png'),
(16, 'Впервые', 'К аэропорту!', 'Первая покупка билета на Аэроэкспресс', 'https://crea.myarena.site/gocode/img/Aeroexpress.png'),
(17, 'Впервые', 'Экологично', 'Первая успешная зарядка электромобиля', 'https://crea.myarena.site/gocode/img/electriccar.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` text NOT NULL,
  `rank` text NOT NULL,
  `awards` text NOT NULL,
  `using_troyka` int(11) NOT NULL,
  `stations` int(11) NOT NULL,
  `visitedLines` int(11) NOT NULL,
  `transport` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `rank`, `awards`, `using_troyka`, `stations`, `visitedLines`, `transport`) VALUES
(1, 'Пассажир*982819', 'Новичок', '1,3,6,7,13,17', 23, 108, 9, 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `awards`
--
ALTER TABLE `awards`
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
-- AUTO_INCREMENT для таблицы `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
