-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 23 2020 г., 15:10
-- Версия сервера: 5.5.25
-- Версия PHP: 5.5.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `horrorlibrary`
--

-- --------------------------------------------------------

--
-- Структура таблицы `audio`
--

CREATE TABLE IF NOT EXISTS `audio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `audio`
--

INSERT INTO `audio` (`id`, `name`) VALUES
(14, 'uploads/The Eye Of The Storm.mp3'),
(15, 'uploads/The Eye Of The Storm.mp3'),
(16, 'uploads/The Eye Of The Storm.mp3');

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `idAuthors` int(11) NOT NULL AUTO_INCREMENT,
  `nAuthors` varchar(255) NOT NULL,
  `bioAuthors` longtext NOT NULL,
  `pAuthors` varchar(200) NOT NULL,
  PRIMARY KEY (`idAuthors`),
  UNIQUE KEY `nAuthors_2` (`nAuthors`),
  UNIQUE KEY `nAuthors_3` (`nAuthors`),
  KEY `nAuthors` (`nAuthors`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`idAuthors`, `nAuthors`, `bioAuthors`, `pAuthors`) VALUES
(1, 'Conan Doyle', 'Doyle''s bio', ''),
(2, 'TestingBookDeletionAuthName', 'Author bio', '14.png'),
(3, 'Another One', 'Author''s bio idk', ''),
(5, 'Another Three', 'asfsagasgagasga', 'ukazatelnyj-palec-vverh-chto-znachit_0.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `idBooks` int(11) NOT NULL AUTO_INCREMENT,
  `noBooks` tinytext NOT NULL,
  `dBooks` varchar(750) NOT NULL,
  `pBooks` longblob NOT NULL,
  `nAuthors` varchar(255) NOT NULL,
  PRIMARY KEY (`idBooks`),
  UNIQUE KEY `nAuthors` (`nAuthors`),
  UNIQUE KEY `nAuthors_2` (`nAuthors`),
  UNIQUE KEY `nAuthors_3` (`nAuthors`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`idBooks`, `noBooks`, `dBooks`, `pBooks`, `nAuthors`) VALUES
(1, 'Sherlock Holmes Adv', 'Adventure of Sherlock Holmes', 0x31342e706e67, 'Conan Doyle'),
(2, 'One More Book', 'Book desc', 0x31362e706e67, 'TestingBookDeletionAuthName'),
(5, 'Another Book', 'Something about this book', 0x3535352e706e67, 'Another One');

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `image`, `text`) VALUES
(2, '2fpwz5.jpg', 'ghdfgfghjhjlkj'),
(3, '2fpwz5.jpg', 'ghdfgfghjhjlkj'),
(4, '2fpwz5.jpg', 'ghdfgfghjhjlkj'),
(5, '869788_1884585.jpg', 'dasfasfaag');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `uidUsers` varchar(255) NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `alUsers` int(11) NOT NULL,
  `isVerified` tinyint(1) NOT NULL,
  `vKey` varchar(45) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`, `alUsers`, `isVerified`, `vKey`, `createdate`) VALUES
(2, 'user2', 'anotheruser@gmail.com', '$2y$10$AIivGYNTI.mauzlB1IBwqOXIFtq84n4UBXDjD6MJRLodsvFltmSIS', 1, 0, '', '0000-00-00 00:00:00'),
(4, 'testuser', 'myemail@gmail.com', '$2y$10$TgOM4YOyG3vnwBvYGY3g1OdCtjOoMr.SWwGGT7Ykcpm1U6Wiy76gW', 1, 0, '', '0000-00-00 00:00:00'),
(5, 'test1', 'testemail@gmail.com', '$2y$10$g.oGIz4Y3aIhbGsZDc3uGe7uR2o6LkW4pehd2.ha69Lcw6bNyb5Vm', 1, 0, '', '0000-00-00 00:00:00'),
(6, 'admin', 'adminmail@hr.com', '$2y$10$2WejEwkxxbbSuXTSgrK3I.uf3aLsmYekAF4VVe7y32bmNRp0XlJU6', 2, 0, '', '0000-00-00 00:00:00'),
(7, 'user4', 'userfour@gmail.com', '$2y$10$UIc7qIVsesb34p.N2nCZKu.BQEC3u25QDi4YUFhj/cfrKB6Blfgne', 1, 0, '', '0000-00-00 00:00:00'),
(8, 'oneMoreUser', 'onemoremail@hr.com', '$2y$10$JAEmQcIaLsiRON/ZvibS/e7SrzlxLiJWHvueClXNLIDD2DNz/xNqy', 1, 0, '', '0000-00-00 00:00:00'),
(9, 'testuser8', 'testing_insertion@gmail.com', '$2y$10$omYHk9kx.FSH3m5S7YsOQupaleYMkfjkS5kn8SY6bcQnOC6XyHwpa', 2, 0, '', '0000-00-00 00:00:00'),
(10, 'test9', 'test9@mail.ru', '$2y$10$9JK2ktzB03EmtFDQHedkg.y8gDsc6xnkfoheSqB.hpzxo.ojAu37O', 1, 0, '', '0000-00-00 00:00:00'),
(11, 'dfg', 'testing_insertion@gmail.com', '$2y$10$cv7TNmWyma8wN94t81FODeWTO6HhjHt8iwFn/bHVNWfGXJ/SMSVEO', 0, 0, '', '0000-00-00 00:00:00'),
(12, 'AnotherOne', 'Real.Hala@gmail.ru', '$2y$10$y.OM6VD2eBm0pvBVCjfTb.g5qlr.iAudJtGHdfRidlhJ5SMAi.d5K', 0, 0, '', '2019-11-25 19:48:55'),
(13, 'AnotherTwo', 'RealHara@gmail.dot', '$2y$10$JuzIa8./YZ2LIkCMnfUIsesIGvEFLO.MSCeJLjFNBRlqXNFbmd.gu', 0, 0, '', '2019-11-25 19:49:36'),
(14, 'User', 'Real.Hala@gmail.ru', '$2y$10$1I4vyVKkbepceSRFaanQHulMQAR69RWqSLb59gE7yq1dRwdQSvxwy', 0, 0, '', '2019-11-25 19:55:11'),
(15, 'AnotherThree', 'asf@gmk.f', '$2y$10$OCoeTHL1jeNgZBuRDXw0k.ER8aig1nevZ1srDeprdHajnv8Xk4K2u', 0, 0, '4caca6c5a5e324862b619c892a4a3d50', '2019-11-25 20:00:16'),
(20, 'OneAnother', 'Real.Madrid4854@bk.ru', '$2y$10$qAcmy8kTdfNWgRZLTWBnPe80J//11WkjlGsuJb/1b3xpipFWObe2m', 0, 0, '12c2c912a1c60bc811e3a74f23d09baf', '2019-11-25 20:18:28'),
(21, 'user456', 'assjojo@ghj.mon', '$2y$10$qRmsi5fgaQGg4WRKQ9gTHe8C2MRvjJ8SxMEbTr2vG11x8nf8ZTNju', 0, 0, 'e185bb6bc95ff5c00a04a87f7f91fcdb', '2019-11-25 20:29:45');

-- --------------------------------------------------------

--
-- Структура таблицы `usersinfo`
--

CREATE TABLE IF NOT EXISTS `usersinfo` (
  `uidUsers` varchar(255) NOT NULL,
  `nUsers` varchar(255) NOT NULL,
  `sUsers` varchar(255) NOT NULL,
  `idBooks` int(11) NOT NULL,
  `idAuthors` int(11) NOT NULL,
  `retDate` date NOT NULL,
  UNIQUE KEY `uidUsers` (`uidUsers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `usersinfo`
--

INSERT INTO `usersinfo` (`uidUsers`, `nUsers`, `sUsers`, `idBooks`, `idAuthors`, `retDate`) VALUES
('test9', 'Test9Name', 'Test9Surname', 2, 2, '2019-05-17'),
('user4', 'NameUser4', 'SurnameUser4', 1, 1, '2019-04-13'),
('user5', 'Name', 'Surname1', 1, 1, '2019-05-08');

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`id`, `name`, `url`) VALUES
(5, 'TBC.mp4', 'uploads/TBC.mp4'),
(6, 'Directed by Robert B. Weide- t', 'uploads/Directed by Robert B. Weide- theme meme.mp4'),
(7, 'Directed by Robert B. Weide- t', 'uploads/Directed by Robert B. Weide- theme meme.mp4'),
(8, 'TBC.mp4', 'uploads/TBC.mp4');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`nAuthors`) REFERENCES `authors` (`nAuthors`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
