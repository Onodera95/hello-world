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

require_once '../class/dop_info.php';

$ob = new \form\dop_info();
$data = $ob->form();
$stop = true;
if ($data !== false){
    $stop = false;
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Информация</title>
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

            <li><a class="dropdown-toggle" data-toggle="dropdown" href="">Список инструктажей<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../tables/pervich_inst.php">Первичный</a></li>
                    <li><a href="../tables/vvod_inst.php">Вводный</a></li>
                    <li><a href="../form/instruktaj_create.php">Добавить новый</a></li>
                </ul>
            </li>

            <li><a href="../tables/dop_info.php">Дополнительная информация</a></li>
            <li><a href="../tables/status.php">Статус</a></li>
        </ul>
    </div>
</nav>
<div class="container">

    <h1>Изменить запись</h1>

    <form action="dop_info_update.php" method="post">
        <input type="hidden" name="id" value="<?= !$stop?$data['id']:'' ?>">

        <div class="form-group row">
            <div class="col-xs-3" >
                <label for="date">Дата</label>
                <input type="date" class="form-control" name="date" value="<?= !$stop?$data['date']:'' ?>">
            </div></div>

        <div class="form-group row">
            <div class="col-xs-3" >
                <label for="instruktaj_id">Инструктаж</label>
                <select type="text" class="form-control" name="instruktaj_id">
                    <option value="0">Выберите значение</option>
                    <?php

                    $sql = 'SELECT * FROM `instruktaj`';
                    $result = $db->query($sql);
                    while ($value = $result->fetch_assoc()){
                        echo "<option value='" . $value['id'] . "'>" . $value['name']."</option>";
                    }

                    ?>
                </select></div></div>

        <div class="form-group row">
            <div class="col-xs-3" >
                <label for="sotrudniki_id">Сотрудники</label>
                <select type="text" class="form-control" name="sotrudniki_id">
                    <option value="0">Выберите значение</option>
                    <?php

                    $sql = 'SELECT * FROM `sotrudniki`';
                    $result = $db->query($sql);

                    while ($value = $result->fetch_assoc()){
                        echo "<option value='" . $value['id'] . "'>" . $value['family']."</option>";
                    }
                    ?>
                </select></div></div>

        <div class="form-group row">
            <div class="col-xs-3" >
                <label for="status_id">Статус</label>
                <select type="text" class="form-control" name="status_id">
                    <option value="0">Выберите значение</option>
                    <?php
                    $sql = 'SELECT * FROM `status`';
                    $result = $db->query($sql);
                    while ($value = $result->fetch_assoc()){
                        echo "<option value='" . $value['id'] . "'>" . $value['status']."</option>";
                    }
                    ?>
                </select></div></div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary" >Сохранить изменения</button>
            <a class="btn btn-default" href="../tables/dop_info.php">Отмена</a>
        </div>
    </form>
</body>
</html>
