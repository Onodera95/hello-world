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

require_once '../class/sotrudniki.php';

$ob = new \form\sotrudniki();
$data = $ob->form();
$stop = true;
if ($data !== false){
    $stop = false;
}
?>

<form action="sotrudniki_create.php" method="post">
    <input type="hidden" name="id" value="<?= !$stop?$data['id']:'' ?>">
    Фамилия:<br>
    <input type="text" name="family" value="<?= !$stop?$data['family']:'' ?>"><br>
    Имя:<br>
    <input type="text" name="name" value="<?= !$stop?$data['name']:'' ?>"><br><br>
    Отчество:<br>
    <input type="text" name="otchestvo" value="<?= !$stop?$data['otchestvo']:'' ?>"><br><br>
    Должность:<br>
    <select name="doljnost_id" value="">
        <option value="0">Выберите значение</option>

        <?php

        $sql = 'SELECT * FROM `doljnost`';
        $result = $db->query($sql);
        while ($value = $result->fetch_assoc()){
            echo "<option value='" . $value['id'] . "'>" . $value['name']."</option>";
        }

        ?>

    </select><br>

    Статус:<br>
    <select name="status_id" value="">
        <option value="0">Выберите значение</option>

        <?php


        $sql = 'SELECT * FROM `status`';
        $result = $db->query($sql);
        while ($value = $result->fetch_assoc()){
            echo "<option value='" . $value['id'] . "'>" . $value['status']."</option>";
        }

        ?>

    </select><br>
    <input type="submit" value="Обновить">
</form>