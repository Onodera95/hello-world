<?php
require_once 'connection_db.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

$query = "SELECT * FROM sotrudniki";

// выполняем операции с базой данных
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if($result)
{
    echo "УСПЕШНО";
}
// закрываем подключение
mysqli_close($link);
?>