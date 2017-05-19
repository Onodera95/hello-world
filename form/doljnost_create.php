<?php
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 18.05.2017
 * Time: 12:50
 */
require_once '../class/doljnost.php';

$ob = new \form\doljnost();
$data = $ob->form();
$stop = true;
if ($data !== false){
    $stop = false;
}

?>

<form action="doljnost_create.php" method="post">
    Название:<br>
    <input type="hidden" name="id" value="<?= !$stop?$data['id']:'' ?>">
    <input type="text" name="name" value="<?= !$stop?$data['name']:'' ?>"><br>
    <input type="submit" value="Сохранить">
</form>