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

if(isset($_POST['id'])){

    $link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));
    $id = mysqli_real_escape_string($link, $_GET['id']);

    $query ="DELETE FROM `sotrudniki` WHERE `id` = '$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    mysqli_close($link);
    // перенаправление на скрипт index.php
    header('Location: index.php');
}

if(isset($_GET['id']))
{
    $id = htmlentities($_GET['id']);
    echo "<h2>Удалить модель?</h2>
        <form method='POST'>
        <input type='hidden' name='id' value='$id' />
        <input type='submit' value='Удалить'>
        </form>";
}
?>
</body>
</html>