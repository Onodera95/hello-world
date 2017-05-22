<?php
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 15.05.2017
 * Time: 14:09
 */

/**
 * Здесь будет жить форма html
 */
require_once '../class/connect.php';
$db = \sql\connect::getInstance();

require_once '../class/status.php';

$ob = new \form\status();
$data = $ob->form();
$stop = true;
if ($data !== false){
    $stop = false;
}
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Статус</title>
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

<form action="status_update.php" method="post">
    <input type="hidden" name="id" value="<?= !$stop?$data['id']:'' ?>">

    <div class="form-group row">
        <div class="col-xs-3" >
            <label for="status">Статус</label>
            <input type="text" class="form-control" name="status" value="<?= !$stop?$data['status']:'' ?>">
        </div></div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary" >Сохранить изменения</button>
        <a class="btn btn-default" href="../tables/status.php">Отмена</a>
    </div>    
</form>
    </div>
</body>
</html>