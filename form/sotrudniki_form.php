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
?>

<form action="sotrudniki.php">
    Фамилия:<br>
    <input type="text" name="family" value=""><br>
    Имя:<br>
    <input type="text" name="name" value=""><br><br>
    Отчество:<br>
    <input type="text" name="otchestvo" value=""><br><br>
    Должность:<br>
    <select name="doljnost_id" value="">
        <option value="0">Выберите значение</option>
        </select><br>
    Инструктаж:<br>
    <select name="instruktaj_id" value="">
        <option value="0">Выберите значение</option>
    </select><br>
    Статус:<br>
    <input type="checkbox" name="status_id" value=""><br><br>
    <input type="submit" value="Submit">
</form>