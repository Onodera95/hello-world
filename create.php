<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
require_once 'connection_db.php'; // подключаем скрипт

if(isset($_POST['family']) && isset($_POST['name'])&& isset($_POST['otchestvo'])) {

    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

    // экранирования символов для mysql
    $family = htmlentities(mysqli_real_escape_string($link, $_POST['family']));
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $otchestvo = htmlentities(mysqli_real_escape_string($link, $_POST['otchestvo']));

    // создание строки запроса
    $query ="INSERT INTO technical_security.sotrudniki VALUES (NULL, '$family','$name','$otchestvo')";

    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    // закрываем подключение
    mysqli_close($link);
}
?>
<h2>Добавить новую модель</h2>
<form method="POST">
    <p>Фамилия:<br>
        <input type="text" name="family" /></p>
    <p>Имя:<br>
        <input type="text" name="name" /></p>
    <p>Отчество: <br>
        <input type="text" name="otchestvo" /></p>
    <input type="submit" value="Добавить">
</form>
</body>
</html>