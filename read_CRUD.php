<?php
require 'con_db_CRUD.php';
$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( null==$id ) {
    header("Location: index_CRUD.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM sotrudniki where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Read a Sotrudniki</h3>
        </div>

        <div class="form-horizontal" >
            <div class="control-group">
                <label class="control-label">Фамилия</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['family'];?>
                    </label>
                </div>
            </div>
            <div class="form-horizontal" >
                <div class="control-group">
                    <label class="control-label">Имя</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['name'];?>
                        </label>
                    </div>
                </div>
                <div class="form-horizontal" >
                    <div class="control-group">
                        <label class="control-label">Отчество</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['otchestvo'];?>
                            </label>
                        </div>
                    </div>
            <div class="form-actions">
                <a class="btn" href="index_CRUD.php">Back</a>
            </div>


        </div>
    </div>

</div> <!-- /container -->
</body>
</html>