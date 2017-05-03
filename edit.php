<html>
<head>
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
    <script src="bootstrap/js/jquery-3.2.1.min.js" > </script>
    <script src="bootstrap/js/bootstrap.min.js" > </script>
</head>
<body>
<div class="container">
<?php
require_once 'connection_db.php'; // подключаем скрипт
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link,'utf8');

// если запрос POST
if(isset($_POST['family']) && isset($_POST['name'])&& isset($_POST['otchestvo']) && isset($_POST['id'])){

    $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
    $family = htmlentities(mysqli_real_escape_string($link, $_POST['family']));
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $otchestvo = htmlentities(mysqli_real_escape_string($link, $_POST['otchestvo']));

    $query ="UPDATE `technical_security`.`sotrudniki` SET `family`='$family', `name`='$name', `otchestvo`='$otchestvo' WHERE `id`='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    if($result)
        echo "<span style='color:blue;'>Данные обновлены</span>";
}

// если запрос GET
if(isset($_GET['id']))
{
    $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));

    // создание строки запроса
    $query ="SELECT * FROM `technical_security`.`sotrudniki` WHERE `id` = '$id'";
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    //если в запросе более нуля строк
    if($result && mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_row($result); // получаем первую строку
        $family = $row[1];
        $name = $row[2];
        $otchestvo = $row[3];

        echo "<h2>Изменить данные</h2>
            <form action=edit.php method='POST'>
            <input type='hidden' name='id' value='$id' />
            <p>Введите фамилию:<br> 
            <input type='text' name='family' value='$family' /></p>
            <p>Введите имя:<br> 
            <input type='text' name='name' value='$name' /></p>
            <p>Введите отчество: <br> 
            <input type='text' name='otchestvo' value='$otchestvo' /></p>
            <input type='submit' value='Сохранить'>
            </form>";

        mysqli_free_result($result);
    }
}
// закрываем подключение
mysqli_close($link);
?>
</body>
</html>