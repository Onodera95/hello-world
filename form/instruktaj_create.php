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

<html>
<head>
    <meta charset="utf-8">
    <title>Инструктаж</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
    <script src="../bootstrap/js/jquery-3.2.1.min.js" > </script>
    <script src="../bootstrap/js/bootstrap.min.js" > </script>
</head>
<body>
<div class="container">

    <h1>Новый инструктаж</h1>

    <div class="row">
<form action="instruktaj_create.php" method="post">
    Название:<br>
    <input type="text" name="name" value=""><br>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary" >Сохранить изменения</button>
        <button type="button" class="btn">Отмена</button>
    </div>
</form>
    </div>
</div>
</body>
</html>