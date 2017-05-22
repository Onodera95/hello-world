<?php
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 18.05.2017
 * Time: 12:50
 */
require_once '../class/doljnost.php';

$ob = new \form\doljnost();
$data = $ob->form();
$stop = true;
if ($data !== false){
    $stop = false;
}

?>
<html>
<head>
    <meta charset="utf-8">
    <title>Должность</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
    <script src="../bootstrap/js/jquery-3.2.1.min.js" > </script>
    <script src="../bootstrap/js/bootstrap.min.js" > </script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../menu.php">ИЦ "Наш Город"</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="../menu.php">Главная страница</a></li>

            <li><a class="dropdown-toggle" data-toggle="dropdown" href="">Сотудники<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../tables/sotrudniki.php">Список</a></li>
                    <li><a href="../tables/doljnost.php">Должности</a></li>
                </ul>
            </li>

            <li><a class="dropdown-toggle" data-toggle="dropdown" href="">Инструктажи<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../tables/pervich_inst.php">Первичный</a></li>
                    <li><a href="../tables/vvod_inst.php">Вводный</a></li>
                    <li><a href="../tables/instruktaj.php">Настройки</a></li>
                </ul>
            </li>

            <li><a href="../tables/dop_info.php">Дополнительная информация</a></li>
            <li><a href="../tables/status.php">Статус</a></li>
        </ul>
    </div>
</nav>
<div class="container">

    <h1>Новая должность</h1>

<form action="doljnost_create.php" method="post">
    <input type="hidden" name="id" value="<?= !$stop?$data['id']:'' ?>">
    <div class="form-group row">
        <div class="col-xs-3" >
            <label for="name">Название</label>
            <input type="text" class="form-control" name="name" value="<?= !$stop?$data['name']:'' ?>">
        </div></div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary" >Сохранить изменения</button>
        <button type="button" class="btn btn-default" href="../tables/doljnost.php">Отмена</button>
    </div>
</form>
    </div>
</body>
</html>