<?php
/**
 * Created by PhpStorm.
 * User: Хару
 * Date: 21.05.2017
 * Time: 16:07
 */
require_once "../class/vvod_inst.php";

$ob = new \form\vvod_inst();
$data = $ob->delete();
if (is_bool($data)){
    header("Location: ../tables/vvod_inst.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
    <script src="../bootstrap/js/jquery-3.2.1.min.js" > </script>
    <script src="../bootstrap/js/bootstrap.min.js" > </script>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Удалить инструктаж</h3>
        </div>

        <form class="form-horizontal" action='../form/vvod_inst_delete.php' method="post">
            <input type="hidden" name="id" value="<?= $data['id']?>"/>
            <p class="alert alert-error">Вы действительно хотите удалить запись "<?=$data['description']?>" ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Да</button>
                <a class="btn" href="../tables/instruktaj.php">Нет</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
</body>
</html>