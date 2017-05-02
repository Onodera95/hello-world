-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: kurs.loc
-- Время создания: Май 01 2017 г., 22:33
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `technical_security`
--

-- --------------------------------------------------------

--
-- Структура таблицы `doljnost`
--

CREATE TABLE `doljnost` (
  `id` int(11) NOT NULL,
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `dop_info`
--

CREATE TABLE `dop_info` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Дополнительная информация об инструктаже';

-- --------------------------------------------------------

--
-- Структура таблицы `instruktaj`
--

CREATE TABLE `instruktaj` (
  `id` int(11) NOT NULL,
  `name` text,
  `vvod_inst_id` int(11) NOT NULL,
  `pervichnyi_inst_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории инструктажей: вводный, первичный';

-- --------------------------------------------------------

--
-- Структура таблицы `pervichnyi_inst`
--

CREATE TABLE `pervichnyi_inst` (
  `id` int(11) NOT NULL,
  `description` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Первичный инструктаж';

-- --------------------------------------------------------

--
-- Структура таблицы `sotrudniki`
--

CREATE TABLE `sotrudniki` (
  `id` int(11) NOT NULL,
  `family` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `otchestvo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sotrudniki`
--

INSERT INTO `sotrudniki` (`id`, `family`, `name`, `otchestvo`) VALUES
(1, 'Uchkalec', 'Olga', 'Anatol\'evna');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Статус: 0 = не пройден, 1 = пройден';

-- --------------------------------------------------------

--
-- Структура таблицы `vvod_inst`
--

CREATE TABLE `vvod_inst` (
  `id` int(11) NOT NULL,
  `descriotion` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `doljnost`
--
ALTER TABLE `doljnost`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dop_info`
--
ALTER TABLE `dop_info`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `instruktaj`
--
ALTER TABLE `instruktaj`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pervichnyi_inst`
--
ALTER TABLE `pervichnyi_inst`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sotrudniki`
--
ALTER TABLE `sotrudniki`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vvod_inst`
--
ALTER TABLE `vvod_inst`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `doljnost`
--
ALTER TABLE `doljnost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `dop_info`
--
ALTER TABLE `dop_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `instruktaj`
--
ALTER TABLE `instruktaj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `pervichnyi_inst`
--
ALTER TABLE `pervichnyi_inst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vvod_inst`
--
ALTER TABLE `vvod_inst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
