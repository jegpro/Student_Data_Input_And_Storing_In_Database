-- Создание базы данных `student`
CREATE DATABASE student;


-- Создание таблицы `students`
CREATE TABLE `students` (
  `surename` text NOT NULL,
  `name` text NOT NULL,
  `isikukood` bigint(11) NOT NULL PRIMARY KEY,
  `grade` int(11) NOT NULL,
  `e-mail` varchar(20) NOT NULL,
  `message` varchar(250) DEFAULT NULL
);



