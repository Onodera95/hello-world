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

<form action="status_create.php" method="post">
    <input type="hidden" name="id" value="<?= !$stop?$data['id']:'' ?>">

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