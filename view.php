<table border="1"> 
<?php
 #Функция, в параметры которой заносим названия столбцов из бд которые будем выбраить
select('surename','name', 'isikukood',  'grade',  'e-mail',  'message'   );
 function select($str1,$str2,$str3,$str4,$str5,$str6)
 {
     #Подключение к бд
 $connect = mysqli_connect('localhost', 'root', '', 'student');
       
    $all = mysqli_query($connect, "SELECT * FROM students");

        echo "<th>$str1</th>";
        echo "<th>$str2</th>";
        echo "<th>$str3</th>";
        echo "<th>$str4</th>";
        echo "<th>$str5</th>";
        echo "<th>$str6</th>";
      
        while($row = mysqli_fetch_assoc($all))
        {       echo "<tr>";
           foreach ($row as $key => $value) { 
                echo("<td>".$value."</td>"); }   
                echo "</tr>";
        }
      
 }
?>
</table>
<a href="index.php">На главную</a>