<?php

require 'con_db_CRUD.php';

if ( !empty($_POST)) {
    // keep track validation errors
    $familyError = null;
    $nameError = null;
    $otchestvoError = null;

    // keep track post values
    $family = $_POST['family'];
    $name = $_POST['name'];
    $otchestvo = $_POST['otchestvo'];

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

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO sotrudniki ('family', 'name', 'otchestvo') VALUES (NULL, '$family','$name','$otchestvo')";
        $q = $pdo->prepare($sql);
        $q->execute(array($family, $name, $otchestvo));
        Database::disconnect();
        header("Location: index_CRUD.php");
    }
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

            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="index_CRUD.php">Back</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
</body>
</html>