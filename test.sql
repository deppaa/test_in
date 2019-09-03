-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 14 2019 г., 13:55
-- Версия сервера: 5.7.25
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `surname` text NOT NULL,
  `name` text NOT NULL,
  `pat` text NOT NULL,
  `vuz` text NOT NULL,
  `group_name` text NOT NULL,
  `login` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `agreement` text NOT NULL,
  `token` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `account`
--

INSERT INTO `account` (`id`, `surname`, `name`, `pat`, `vuz`, `group_name`, `login`, `email`, `password`, `agreement`, `token`, `status`) VALUES
(1, 'Петров', 'Дмитрий', 'Константинович', 'ЮУрГГПУ', 'О.Ф-413/095-4-1', 'redBoroda900', 'redBoroda900@gmail.com', '$2y$10$fextVUf.NfjhHH/5nRx2Qer5dv.BQk5lCMeOyJmMIKq1PL2OuFBL.', '1', '', '1'),
(2, 'Бородова4', 'Юлия', 'Андреевна', 'ЮУрГГПУ', 'О.Ф-413/095-4-1', 'redBoroda904', 'redBoroda900@gmail.com', '$2y$10$fextVUf.NfjhHH/5nRx2Qer5dv.BQk5lCMeOyJmMIKq1PL2OuFBL.', '1', '', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `number_group` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `lang` text NOT NULL,
  `autor` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `course`
--

INSERT INTO `course` (`id`, `autor_id`, `number_group`, `title`, `description`, `lang`, `autor`, `date`) VALUES
(3, 1, 'О.Ф-413/095-4-1', 'Условия в Python', 'В данном курсе мы научимся применять условные конструкции', '5', 'Шагеев Р. Р. ', '2019-04-23 16:13:11'),
(4, 1, 'О.Ф-413/095-4-1', 'Курс по C#', 'Основы программирования на C#', '1', 'Шагеев Р. Р. ', '2019-05-06 09:59:35');

-- --------------------------------------------------------

--
-- Структура таблицы `moder`
--

CREATE TABLE `moder` (
  `id` int(11) NOT NULL,
  `surname` text NOT NULL,
  `name` text NOT NULL,
  `pat` text NOT NULL,
  `vuz` text NOT NULL,
  `login` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `agreement` text NOT NULL,
  `token` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `moder`
--

INSERT INTO `moder` (`id`, `surname`, `name`, `pat`, `vuz`, `login`, `email`, `password`, `agreement`, `token`, `status`) VALUES
(1, 'Шагеев', 'Радмир', 'Рифкатович', 'ЮУрГГПУ', 'deppa', 'radmir1118@gmail.com', '$2y$10$sxUFBKsYo5UKTpzyhxapn.XRaMGTgecdKkJhbPlsIBdEYj73XTre6', '1', '', 1),
(2, 'qweqwe', 'qweqweqweqwe', 'qweqweqwe', 'ЮУрГГПУ', 'dep', 'radmir1118@yandex.ru', '$2y$10$/uNvVb8Ta28oOlWYrNoq7.PrkNi7QTc6r4NuSvgmeqJ9Do9PST8qy', '1', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ball` double NOT NULL,
  `name` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `progress`
--

INSERT INTO `progress` (`id`, `course_id`, `task_id`, `user_id`, `ball`, `name`, `date`) VALUES
(1, 3, 6, 1, 3, 'Бородова Ю. А. ', '2019-04-23 15:48:21'),
(2, 3, 8, 1, 8, 'Бородова Ю. А. ', '2019-04-23 16:14:53'),
(3, 3, 7, 1, 5, 'Бородова Ю. А. ', '2019-04-23 16:17:34'),
(4, 3, 9, 1, 8, 'Бородова Ю. А. ', '2019-04-23 16:18:36'),
(5, 3, 6, 2, 3, 'Бородова4 Ю. А. ', '2019-04-23 16:52:51'),
(6, 4, 10, 1, 5, 'Петров Д. К. ', '2019-05-06 10:01:24');

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `ball` int(11) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `test1_in` text NOT NULL,
  `test1_out` text NOT NULL,
  `test2_in` text NOT NULL,
  `test2_out` text NOT NULL,
  `test3_in` text NOT NULL,
  `test3_out` text NOT NULL,
  `solved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `course_id`, `ball`, `title`, `text`, `test1_in`, `test1_out`, `test2_in`, `test2_out`, `test3_in`, `test3_out`, `solved`) VALUES
(6, 3, 3, 'Минимум из двух чисел', 'Даны два целых числа. Выведите значение наименьшего из них.\r\nВо всех задачах считывайте входные данные через input() и выводите ответ через print().', '3\r\n7', '3', '2\r\n2', '2', '-8\r\n15', '-8', 2),
(7, 3, 5, 'Знак числа', 'В математике функция sign(x) (знак числа) определена так: \r\nsign(x) = 1, если x > 0, \r\nsign(x) = -1, если x < 0, \r\nsign(x) = 0, если x = 0.\r\nДля данного числа x выведите значение sign(x). Эту задачу желательно решить с использованием каскадных инструкций if... elif... else.\r\nВо всех задачах считывайте входные данные через input() и выводите ответ через print().', '1534', '1', '-42', '-1', '0', '0', 1),
(8, 3, 8, 'Шахматная доска', 'Заданы две клетки шахматной доски. Если они покрашены в один цвет, то выведите слово YES, а если в разные цвета — то NO. Программа получает на вход четыре числа от 1 до 8 каждое, задающие номер столбца и номер строки сначала для первой клетки, потом для второй клетки.\r\nВо всех задачах считывайте входные данные через input() и выводите ответ через print().', '1\r\n1\r\n2\r\n6', 'YES', '2\r\n2\r\n2\r\n5', 'NO', '2\r\n2\r\n2\r\n4', 'YES', 1),
(9, 3, 8, 'Сколько совпадает чисел', 'Условие\r\nДаны три целых числа. Определите, сколько среди них совпадающих. Программа должна вывести одно из чисел: 3 (если все совпадают), 2 (если два совпадает) или 0 (если все числа различны).\r\nВо всех задачах считывайте входные данные через input() и выводите ответ через print().', '10\r\n5\r\n10', '2', '17\r\n17\r\n-9', '2', '-149\r\n-146\r\n-142', '0', 1),
(10, 4, 5, 'авыа', 'аываыв', 'Hellow', 'Hellow', 'Hellow', 'Hellow', 'Hellow', 'Hellow', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moder`
--
ALTER TABLE `moder`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `progress_ibfk_1` (`course_id`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `moder`
--
ALTER TABLE `moder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
