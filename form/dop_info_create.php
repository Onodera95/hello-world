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

<form action="dop_info_create.php" method="post">
    <input type="hidden" name="id" value="<?= !$stop?$data['id']:'' ?>">

    Дата:<br>
    <input type="date" name="date" value="<?= !$stop?$data['date']:'' ?>"><br><br>

    Инструктаж:<br>
    <select name="instruktaj_id" value="<?= !$stop?$data['instruktaj_id']:'' ?>">
        <option value="0">Выберите значение</option>
        <?php

        $sql = 'SELECT * FROM `instruktaj`';
        $result = $db->query($sql);
        while ($value = $result->fetch_assoc()){
            echo "<option value='" . $value['id'] . "'>" . $value['name']."</option>";
        }

        ?>
    </select><br>

    Сотрудники:<br>
    <select name="sotrudniki_id" value="<?= !$stop?$data['sotrudniki_id']:'' ?>">
        <option value="0">Выберите значение</option>
        <?php

        $sql = 'SELECT * FROM `sotrudniki`';
        $result = $db->query($sql);

        while ($value = $result->fetch_assoc()){
            echo "<option value='" . $value['id'] . "'>" . $value['family']."</option>";
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

    <input type="submit" value="Сохранить">
</form>