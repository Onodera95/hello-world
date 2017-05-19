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

require_once '../class/instruktaj.php';

$ob = new \form\instruktaj();
$data = $ob->form();
$stop = true;
if ($data !== false){
    $stop = false;
}
?>

<form action="instruktaj_create.php" method="post">
    Название:<br>
    <input type="text" name="name" value=""><br>
    <input type="submit" value="Сохранить">
</form>