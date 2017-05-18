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

        <?php
        $db = new mysqli('127.0.0.1', 'root', '', 'technical_security');
        $db->query('SET NAMES UTF8');
        $sql = 'SELECT * FROM `doljnost`';
        $result = $db->query($sql);
        while ($value = $result->fetch_assoc()){
            echo "<option value='" . $value['id'] . "'>" . $value['name']."</option>";
        }

        ?>

        </select><br>
    Статус:<br>
    <input type="checkbox" name="status_id" value=""><br><br>
    <input type="submit" value="Сохранить">
</form>