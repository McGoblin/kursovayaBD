-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 22 2017 г., 08:47
-- Версия сервера: 5.5.48
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kancelyary`
--

-- --------------------------------------------------------

--
-- Структура таблицы `kancelyary`
--

CREATE TABLE IF NOT EXISTS `kancelyary` (
  `id` int(11) NOT NULL,
  `art` varchar(8) NOT NULL,
  `type_id` int(2) NOT NULL,
  `lifeLenght` int(3) NOT NULL,
  `rewcount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `markets`
--

CREATE TABLE IF NOT EXISTS `markets` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `adress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `needs`
--

CREATE TABLE IF NOT EXISTS `needs` (
  `id` int(2) NOT NULL,
  `odel_id` int(2) NOT NULL,
  `type_id` int(2) NOT NULL,
  `value` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `otdel`
--

CREATE TABLE IF NOT EXISTS `otdel` (
  `id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sklad`
--

CREATE TABLE IF NOT EXISTS `sklad` (
  `id` int(3) NOT NULL,
  `kanc_id` int(3) NOT NULL,
  `market_id` int(3) NOT NULL,
  `cost` double(6,2) NOT NULL,
  `number` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `types_kt`
--

CREATE TABLE IF NOT EXISTS `types_kt` (
  `id` int(3) NOT NULL,
  `typename` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vidano`
--

CREATE TABLE IF NOT EXISTS `vidano` (
  `id` int(3) NOT NULL,
  `otdel_id` int(3) NOT NULL,
  `kanc_id` int(3) NOT NULL,
  `number` int(3) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `kancelyary`
--
ALTER TABLE `kancelyary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Индексы таблицы `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `needs`
--
ALTER TABLE `needs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `odel_id` (`odel_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Индексы таблицы `otdel`
--
ALTER TABLE `otdel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sklad`
--
ALTER TABLE `sklad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kanc` (`kanc_id`),
  ADD KEY `fk_market` (`market_id`);

--
-- Индексы таблицы `types_kt`
--
ALTER TABLE `types_kt`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vidano`
--
ALTER TABLE `vidano`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otdel_id` (`otdel_id`),
  ADD KEY `kanc_id` (`kanc_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `kancelyary`
--
ALTER TABLE `kancelyary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `markets`
--
ALTER TABLE `markets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `needs`
--
ALTER TABLE `needs`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `otdel`
--
ALTER TABLE `otdel`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `sklad`
--
ALTER TABLE `sklad`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `types_kt`
--
ALTER TABLE `types_kt`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vidano`
--
ALTER TABLE `vidano`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `kancelyary`
--
ALTER TABLE `kancelyary`
  ADD CONSTRAINT `kancelyary_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types_kt` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `needs`
--
ALTER TABLE `needs`
  ADD CONSTRAINT `needs_ibfk_1` FOREIGN KEY (`odel_id`) REFERENCES `otdel` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `needs_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `types_kt` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sklad`
--
ALTER TABLE `sklad`
  ADD CONSTRAINT `sklad_ibfk_2` FOREIGN KEY (`market_id`) REFERENCES `markets` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sklad_ibfk_1` FOREIGN KEY (`kanc_id`) REFERENCES `kancelyary` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `vidano`
--
ALTER TABLE `vidano`
  ADD CONSTRAINT `vidano_ibfk_2` FOREIGN KEY (`kanc_id`) REFERENCES `kancelyary` (`id`),
  ADD CONSTRAINT `vidano_ibfk_1` FOREIGN KEY (`otdel_id`) REFERENCES `otdel` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
