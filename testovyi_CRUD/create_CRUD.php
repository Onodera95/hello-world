<?php

require 'con_db_CRUD.php';

if ( !empty($_POST)) {
    // keep track validation errors
    $familyError = null;
    $nameError = null;
    $otchestvoError = null;
    $doljnostError = null;
    $instruktajError = null;
    $statusError = null;


    // keep track post values
    $family = $_POST['family'];
    $name = $_POST['name'];
    $otchestvo = $_POST['otchestvo'];
    $doljnost = $_POST['doljnost_id'];
    $instruktaj = $_POST['instruktaj_id'];
    $status = $_POST['status_id'];


    // validate input
    $valid = true;
    if (empty($family)) {
        $familyError = 'Введите фамилию';
        $valid = false;
    }

    $valid = true;
    if (empty($name)) {
        $nameError = 'Введите имя';
        $valid = false;
    }

    $valid = true;
    if (empty($otchestvo)) {
        $otchestvoError = 'Введите отчество';
        $valid = false;
    }

    $valid = true;
    if (empty($doljnost)) {
        $doljnostError = 'Выберите должность';
        $valid = false;
    }
    $valid = true;
    if (empty($instruktaj)) {
        $instruktajError = 'Выберите инструктаж';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `sotrudniki` ('family', 'name', 'otchestvo', 'doljnost_id', 'instruktaj_id', 'status_id') VALUES ('$family','$name','$otchestvo', '$doljnost', '$instruktaj', '$status')";
        $q = $pdo->prepare($sql);
        $q->execute(array($family, $name, $otchestvo, $doljnost, $instruktaj, $status));
        Database::disconnect();
        header("Location: ../testovyi_CRUD/index_CRUD.php");
    }
}
?>

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
            <h3>Create a Sotrudniki</h3>
        </div>

        <form class="form-horizontal" action="create_CRUD.php" method="post">
            <div class="control-group <?php echo !empty($familyError)?'error':'';?>">
                <label class="control-label">Фамилия</label>
                <div class="controls">
                    <input name="family" type="text"  placeholder="" value="<?php echo !empty($family)?$family:'';?>">
                    <?php if (!empty($familyError)): ?>
                        <span class="help-inline"><?php echo $familyError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                <label class="control-label">Имя</label>
                <div class="controls">
                    <input name="name" type="text"  placeholder="" value="<?php echo !empty($name)?$name:'';?>">
                    <?php if (!empty($nameError)): ?>
                        <span class="help-inline"><?php echo $nameError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($otchestvoError)?'error':'';?>">
                <label class="control-label">Отчество</label>
                <div class="controls">
                    <input name="otchestvo" type="text" placeholder="" value="<?php echo !empty($otchestvo)?$otchestvo:'';?>">
                    <?php if (!empty($otchestvoError)): ?>
                        <span class="help-inline"><?php echo $otchestvoError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($doljnostError)?'error':'';?>">
                <label class="control-label">Должность</label>
                <div class="controls">
                    <input name="doljnots_id" type="text"  placeholder="" value="<?php echo !empty($doljnost)?$doljnost:'';?>">
                    <?php if (!empty($doljnostError)): ?>
                        <span class="help-inline"><?php echo $doljnostError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($instruktajError)?'error':'';?>">
                <label class="control-label">Инструктаж</label>
                <div class="controls">
                    <input name="instruktaj_id" type="text"  placeholder="" value="<?php echo !empty($instruktaj)?$instruktaj:'';?>">
                    <?php if (!empty($instruktajError)): ?>
                        <span class="help-inline"><?php echo $instruktajError;?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="index_CRUD.php">Back</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
</body>
</html>