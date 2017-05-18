<?php
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 18.05.2017
 * Time: 14:53
 */

?>

<form action="../class/dop_info.php">

    Инструктаж:<br>
    <select name="instruktaj_id" value="">
        <option value="0">Выберите значение</option>
    </select><br>

    Сотрудники:<br>
    <select name="sotrudniki_id" value="">
        <option value="0">Выберите значение</option>
    </select><br>

    Дата:<br>
    <input type="date" name="date" value=""><br><br>

    Статус:<br>
    <input type="checkbox" name="status_id" value=""><br><br>

    <input type="submit" value="Сохранить">
</form>