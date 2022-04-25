
<a href="add.php">Добавить (Скрипт add.php)</a>
<a href="view.php">Показать (Скрипт view.php)</a>
<a href="del.php">Удалить все данные из бд (Скрипт del.php)</a>
<br/><br/><br/>
<?php
//------------------------------------------------------------------------------

// 1. СОЗДАЕМ БАЗУ ДАННЫХ
/*
#Подключение к myPhpAdmin
$link = mysqli_connect("localhost", "root", "");
 
#Проверка подключения
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
#Создание БД
$sql = "CREATE DATABASE student;";
if(mysqli_query($link, $sql)){
    echo "Database created successfully";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
*/

//-------------------------------------------------------------------------------

// 2. СОЗДАЕМ ТАБЛИЦУ В БАЗЕ ДАННЫХ
/*
#Подключение к БД
$link = mysqli_connect("localhost", "root", "", "student");
 
#Проверка подключения
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

#Создаем таблицу в БД
$sql = "CREATE TABLE `students` (
  `surename` text NOT NULL,
  `name` text NOT NULL,
  `isikukood` bigint(11) NOT NULL PRIMARY KEY,
  `grade` int(11) NOT NULL,
  `e-mail` varchar(20) NOT NULL,
  `message` varchar(250) DEFAULT NULL
);";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
*/

//---------------------------------------------------------------------------------

// 3. ПОСЛЕ СОЗДАНИЯ БД И ТАБЛИЦЫ, НУЖНО ЗАКОМЕНТИРОВАТЬ ПУНКТЫ 1. И 2. И РАСКОМЕНТИРОВАТЬ ПУНКТ 3. (КОД НИЖЕ) ДЛЯ РАБОТЫ С БД - ДОБАВЛЕНИЕ, ОТОБРАЖЕНИЕ, УДАЛЕНИЕ ДАННЫХ ИЗ ТАБЛИЦЫ.
/*
#Данная фукнция показывает информацию о таблице - какие поля в ней есть
$connect = mysqli_connect('localhost', 'root', '', 'student');

       
$result = mysqli_query($connect, "SHOW COLUMNS FROM students");
if (!$result) {
    echo 'Ошибка при выполнении запроса: ' . mysql_error();
    exit;
}
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
}
*/

?>
