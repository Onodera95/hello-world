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

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link,'utf8');
$query ="SELECT * FROM technical_security.sotrudniki";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк

    echo "<table class='table table-striped'><tr><th>Id</th><th>Фамилия</th><th>Имя</th><th>Отчество</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        for ($j = 0 ; $j < 4 ; ++$j) echo "<td>$row[$j]</td>";

        echo "<td><a href='edit.php?id=$row[0]' target='_blank'> Редактировать</a></td>";
        echo "<td><a href='delete.php?id=$row[0]' target='_blank'>Удалить</a></td>";
        echo "</tr>";
        
    }
    echo "</table>";

    // очищаем результат
    mysqli_free_result($result);
}

mysqli_close($link);
?>
</body>
</html>