<?php
/**
 * Created by PhpStorm.
 * User: Хару
 * Date: 21.05.2017
 * Time: 20:07
 */
?>

<html>

<head>
    <meta charset="utf-8">
    <title>ИЦ "Наш Город"</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
    <script src="bootstrap/js/jquery-3.2.1.min.js" > </script>
    <script src="bootstrap/js/bootstrap.min.js" > </script>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="menu.php">ИЦ "Наш Город"</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="menu.php">Главная страница</a></li>

            <li><a class="dropdown-toggle" data-toggle="dropdown" href="">Сотудники<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="tables/sotrudniki.php">Список</a></li>
                    <li><a href="tables/doljnost.php">Должности</a></li>
                </ul>
            </li>

            <li><a class="dropdown-toggle" data-toggle="dropdown" href="">Инструктажи<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="tables/pervich_inst.php">Первичный</a></li>
                    <li><a href="tables/vvod_inst.php">Вводный</a></li>
                    <li><a href="form/instruktaj_create.php">Добавить новый</a></li>
                    <li><a href="tables/instruktaj.php">Настройки</a></li>
                </ul>
            </li>

            <li><a href="tables/dop_info.php">Дополнительная информация</a></li>
            <li><a href="tables/status.php">Статус</a></li>
        </ul>
    </div>
</nav>

</body>
</html>
