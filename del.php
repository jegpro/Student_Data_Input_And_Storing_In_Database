<?php
$pdo = new PDO('mysql:host=localhost;dbname=student', 'root', '');
$query = "DELETE FROM `students`";

$stmt = $pdo->prepare($query);
$stmt->execute();
?>
<h2>Данные удалены</h2>
<a href="index.php">На главную</a>