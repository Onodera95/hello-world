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

require_once '../class/pervichnyi_inst.php';

$ob = new \form\pervichnyi_inst();
$data = $ob->form();
$stop = true;
if ($data !== false){
    $stop = false;
}
?>

<form action="instruktaj_create.php" method="post">
    <input type="hidden" name="id" value="<?= !$stop?$data['id']:'' ?>">

    Инструктаж:<br>
    <select name="instruktaj_id" value="">
        <option value="0">Выберите значение</option>

        <?php

        $sql = 'SELECT * FROM `instruktaj`';
        $result = $db->query($sql);
        while ($value = $result->fetch_assoc()){
            echo "<option value='" . $value['id'] . "'>" . $value['name']."</option>";
        }

        ?>

    </select><br>
    Описание:<br>
    <input type="text" name="description" value="<?= !$stop?$data['description']:'' ?>"><br>

    </select><br>
    <input type="submit" value="Сохранить">
</form>