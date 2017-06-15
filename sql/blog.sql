-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Трв 09 2017 р., 23:43
-- Версія сервера: 10.1.21-MariaDB
-- Версія PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблиці `security_articles`
--

CREATE TABLE `security_articles` (
  `id` int(10) NOT NULL,
  `text` text NOT NULL,
  `data` date NOT NULL,
  `imgLocal` varchar(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `security_articles`
--

INSERT INTO `security_articles` (`id`, `text`, `data`, `imgLocal`, `title`) VALUES
(1, 'Головне — не розпорошуватися на купу справ. Сконцентруватися на одному. Взятися за найважливіше, довести його до кінця. Потім взятися за друге важливе і так далі. Якщо раптом виникла ситуація переключитися терміново на іншу роботу — перемикайтеся. Потім повернетеся до недоробленого справі. Ось так, працюючи спокійно, методично, ритмічно, можна встигнути багато чого. І не лінуватися. Поставили мету — домоглися, пішли далі. Розмови з колегами теж потрібні. Але якщо відчуваєте, що часу мало, а роботи багато — відкладіть такі душевні розмови до кращих часів.))) Але не забувайте робити 10-хвилинні перерви, переводите дух, обмірковуйте такі свої кроки. І, до речі, не треба думати, що час біжить. При таких думках воно так побіжить, що мало не здасться. Скажіть собі, що час тече нормально, методично, спокійно, воно йде, а не біжить.))', '2017-05-03', '0', 'Мало працювати і багато встигати'),
(2, 'Общее прототипическое значение — категория, группа, разряд.\r\n\r\nв различных системах классификации обширная категория объектов объединенных общностью главных признаков [▲ 1][▼ 1] ◆ Любоваться машинами, большинство из которых никогда не было произведено в количестве большем, чем одна единица, можно по каталогу, в котором концепты рассортированы не только по классам (городские, минивэны или автобусы), но и по производителям (для фанатов одной марки). «Автоинтернет», 2002 г. // «Автопилот» (цитата из Национального корпуса русского языка, см. Список литературы)\r\nсоциол. большая группа людей, объединённых общностью положения условий жизни, доходов и т. п. [▲ 2][▼ 2] ◆ Не указан пример употребления (см. рекомендации).\r\nв учебн. заведениях совокупность учеников школы одного и того же года обучения [▲ 3][▼ 3] ◆ Ученики перешли во второй класс.\r\nв учебн. заведениях группа учеников, занимающихся совместно [▲ 4] ◆ Ученики первого «а» класса.\r\nперен. помещение для учебных занятий класса в значении 3 [▲ 5] ◆ Просторный класс. ◆ Хорошо оборудованный класс.\r\nразряд, уровень квалификации [≈ 6][▲ 6] ◆ Мастер спорта международного класса.\r\nкомп., прогр. в объектно-ориентированном программировании определяемый пользователем тип данных, объединяющий прототипические структуры данных и методы работы с ними [▲ 7][▼ 7] ◆ В данном разделе изложены средства определения класса, создания объектов класса и манипулирование такими объектами. Б. Страуструп, «Язык программирования C++», 1997 г.\r\nпредик. выражает восхищение ◆ Не указан пример употребления (см. рекомендации).', '2017-05-03', '0', 'Семантические свойства');

-- --------------------------------------------------------

--
-- Структура таблиці `security_discipline`
--

CREATE TABLE `security_discipline` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `security_discipline`
--

INSERT INTO `security_discipline` (`id`, `name`) VALUES
(13, 'Агнглійська'),
(12, 'Астрономія'),
(3, 'Безопасность жизнедеятельности'),
(4, 'История'),
(5, 'Логика и теория аргументации'),
(1, 'Философия'),
(2, 'Экономика'),
(6, 'Экономическая география');

-- --------------------------------------------------------

--
-- Структура таблиці `security_marks`
--

CREATE TABLE `security_marks` (
  `id_user` int(10) NOT NULL,
  `id_discipline` int(10) NOT NULL,
  `mark` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `security_marks`
--

INSERT INTO `security_marks` (`id_user`, `id_discipline`, `mark`) VALUES
(25, 1, '5'),
(25, 2, '5'),
(25, 3, '5'),
(25, 4, '5'),
(25, 5, '5'),
(25, 6, '5'),
(25, 12, ''),
(25, 13, ''),
(25, 14, ''),
(28, 1, '2'),
(28, 2, '2'),
(28, 3, '2'),
(28, 4, '2'),
(28, 5, '2'),
(28, 6, '2'),
(28, 12, ''),
(28, 13, ''),
(28, 14, ''),
(30, 1, '2'),
(30, 2, '2'),
(30, 3, '2'),
(30, 4, '2'),
(30, 5, '2'),
(30, 6, '2'),
(30, 12, ''),
(30, 13, ''),
(30, 14, ''),
(35, 1, ''),
(35, 2, ''),
(35, 3, ''),
(35, 4, ''),
(35, 5, ''),
(35, 6, ''),
(35, 12, ''),
(35, 13, ''),
(35, 14, '');

-- --------------------------------------------------------

--
-- Структура таблиці `security_parents`
--

CREATE TABLE `security_parents` (
  `id_student` int(10) NOT NULL,
  `mather_pib` varchar(255) NOT NULL,
  `mather_phone` varchar(255) NOT NULL,
  `dad_pib` varchar(255) NOT NULL,
  `dad_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `security_parents`
--

INSERT INTO `security_parents` (`id_student`, `mather_pib`, `mather_phone`, `dad_pib`, `dad_phone`) VALUES
(1, '', '', '', ''),
(25, 'Валентина Олексыъвна', '03806664545454', 'Ігор степанович', '888888'),
(28, '', '', '', ''),
(29, '', '', '', ''),
(30, '', '', '', ''),
(35, '', '', '', ''),
(36, '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблиці `security_users`
--

CREATE TABLE `security_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` int(10) UNSIGNED NOT NULL DEFAULT '3',
  `email` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `regDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `security_users`
--

INSERT INTO `security_users` (`id`, `login`, `password`, `access`, `email`, `firstName`, `phone`, `status`, `regDate`) VALUES
(1, 'root', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1, 'f380931451198@yandex.ua', 'Жидка Ольга Валеріївна', '456456456456', 1, '2017-05-05 12:46:16'),
(25, 'vlad', 'd8578edf8458ce06fbc5bb76a58c5ca4', 3, 'my@mail.com', 'Стрельченко Владислав Ігорович', '12775', 2, '2017-05-05 13:28:21'),
(36, 'sdfasdfsaf', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'sdfsad@ukr.net', 'sdfsdfdsfds', '', 0, '2017-05-07 14:56:47'),
(28, '123', 'd8578edf8458ce06fbc5bb76a58c5ca4', 3, '123@qadnsex.ua', 'Одаренко Володимир Орегович', '', 2, '2017-05-05 17:39:16'),
(29, 'roxx', 'd8578edf8458ce06fbc5bb76a58c5ca4', 3, 'ivan@mail.com', 'Donenko Ivan Ivanenko', '', 0, '2017-05-05 17:40:03'),
(30, 'lux', 'd8578edf8458ce06fbc5bb76a58c5ca4', 3, 'artem@mail.com', 'Artem artem artem ', '', 2, '2017-05-05 17:40:44'),
(35, 'asdf', 'd8578edf8458ce06fbc5bb76a58c5ca4', 3, '333@gmail.com', 'Іваненко Іван іванович', '', 2, '2017-05-07 14:14:08');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `security_articles`
--
ALTER TABLE `security_articles`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `security_discipline`
--
ALTER TABLE `security_discipline`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Індекси таблиці `security_marks`
--
ALTER TABLE `security_marks`
  ADD PRIMARY KEY (`id_user`,`id_discipline`);

--
-- Індекси таблиці `security_parents`
--
ALTER TABLE `security_parents`
  ADD PRIMARY KEY (`id_student`);

--
-- Індекси таблиці `security_users`
--
ALTER TABLE `security_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `security_articles`
--
ALTER TABLE `security_articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `security_discipline`
--
ALTER TABLE `security_discipline`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблиці `security_users`
--
ALTER TABLE `security_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
