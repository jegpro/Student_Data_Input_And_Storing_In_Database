 <style type="text/css">
 	input {display: flex;justify-content: center;width: 20%;}
 </style>
 <form action="?add" method="post" enctype="multipart/form-data">
        <label>Фамилия</label>
        <input type="text" name="full_name" placeholder="Введите свою фамилию" required>
        <label>Имя</label>
        <input type="text" name="name" placeholder="Введите свое имя" required>
        <label>Личный код</label>
        <input type="text" name="code" placeholder="Введите Личный код" required>
         <label>Курс</label>
        <input type="integer" name="grade" placeholder="Введите курс" required>
        <label>Почта</label>
        <input type="text" name="email" placeholder="Введите адрес своей почты" required>
        <label>Сообщение</label>
        <input type="text" name="text" placeholder="Введите сообщение (необязательно)">
        <button type="submit">Запись</button>
        <button type="reset">Отмена</button>
       
    </form>
<?php
#Этот if срабатывает при нажатии на кнопку "Запись"
if (isset($_GET['add'])) 
{ 
#Подключение к бд
try {
	$dbh = new PDO('mysql:dbname=student;host=localhost', 'root', '');
} catch (PDOException $e) {
	die($e->getMessage());
}
    $full_name = $_POST['full_name'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $code = $_POST['code'];
    $grade = $_POST['grade'];
    $text = $_POST['text'];

    $error = 2;

    #Функция проверки обяз полей на пустоту
    /* function valid()
    {
    	if (empty($full_name) or empty($name) or empty($email) or empty($code) or empty($grade)) {
    		?><script type="text/javascript">alert("Одно из обязательных полей не заполнено");</script>
    		<?php
    		$error = 1;
    	}
    } 
    valid(); */

 #Функция проверки валидности почты
    function check_email ($email_1)
    {
		    if (filter_var($email_1, FILTER_VALIDATE_EMAIL)) {
		    return true;
		}
		else {return false;}
	}
 #Функция проверки о на ключа
	 function check_code ($code_1)
    {
		    if(is_numeric($code_1) and strlen($code_1)>10 and strlen($code_1)<12)
{
		    return true;
		}
		else {return false;}
	}
 #ПРименение функции проверки почты и в случае если она вернет false - показать предупреждение пользователю
	if (check_email($email) == false){
		?><script type="text/javascript">alert("Почта указана неверно - верный формат: mail@mail.com.");</script>

    		<?php
    		$error = 1;
	}

	if (check_code($code) == false){
		?><script type="text/javascript">alert("Личный код введен неверно - личный код должен содержать 11 цифр.");</script>

    		<?php
    		$error = 1;
	}
   #Если в переменной осталось значение 2 - это значит все функции по проверки вернули true и можно заносить в бд строку
if ($error == 2){
 #Функция для имени и фамилии - делает все буквы кроме первой маленьикими, а первую - больщой
	function mb_ucfirst($str) {
    $str = mb_strtoupper(mb_substr($str, 0, 1, 'UTF-8'), 'UTF-8') .
            mb_strtolower(mb_substr($str, 1, mb_strlen($str), 'UTF-8'), 'UTF-8');
    return $str;
  }

  $full_name = mb_ucfirst($full_name);
  $name = mb_ucfirst($name);

  function mini($email1){
  	$email1 = mb_strtolower($email1);
  	return $email1;
  }
  $email = mini($email);
   #Два варианта вставки - если заполнено поле с сообщением и если не заполнено
  if(strlen($text)>0){
  $sth = $dbh->prepare("INSERT INTO `students` SET `surename` = :surename, `name` = :name, `isikukood` = :isikukood, `grade` = :grade, `e-mail` = :email, `message` = :message");
	$sth->execute(array('surename' => $full_name, 'name' => $name, 'isikukood' => $code, 'grade' => $grade, 'email' => $email, 'message' => $text));
}
else{
 $sth = $dbh->prepare("INSERT INTO `students` SET `surename` = :surename, `name` = :name, `isikukood` = :isikukood, `grade` = :grade, `e-mail` = :email, `message` = :message");
	$sth->execute(array('surename' => $full_name, 'name' => $name, 'isikukood' => $code, 'grade' => $grade, 'email' => $email, 'message' => NULL));

}
	?>

<script type="text/javascript">
    var javaScriptVar = "<?php echo $full_name;echo(' ');echo $name; echo (' добавлен в базу данных!'); ?>";
    alert(javaScriptVar);
</script>
	<?php
}
}
?>
<a href="index.php">На главную</a>