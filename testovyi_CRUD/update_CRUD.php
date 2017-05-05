<?php
require 'con_db_CRUD.php';

$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( null==$id ) {
    header("Location: index_CRUD.php");
}

if ( !empty($_POST)) {
    // keep track validation errors
    $familyError = null;
    $nameError = null;
    $otchestvoError = null;


    // keep track post values
    $family = $_POST['name'];
    $name = $_POST['email'];
    $otchestvo = $_POST['mobile'];

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

    // update data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `sotrudniki`  set `family` = ?, `name` = ?, `otchestvo` = ?  WHERE `id` = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($family, $name, $otchestvo, $id));
        Database::disconnect();
        header("Location: index_CRUD.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM `sotrudniki` where `id` = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $family = $data['family'];
    $name = $data['name'];
    $otchestvo = $data['otchestvo'];
    Database::disconnect();
}
?>

<html lang="en">.
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
            <h3>Update a Customer</h3>
        </div>

        <form class="form-horizontal" action="update_CRUD.php?id=<?php echo $id?>" method="post">
            <div class="control-group <?php echo !empty($familyError)?'error':'';?>">
                <label class="control-label">Family</label>
                <div class="controls">
                    <input name="family" type="text"  placeholder="Family" value="<?php echo !empty($family)?$family:'';?>">
                    <?php if (!empty($familyError)): ?>
                        <span class="help-inline"><?php echo $familyError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                    <?php if (!empty($nameError)): ?>
                        <span class="help-inline"><?php echo $nameError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($otchestvoError)?'error':'';?>">
                <label class="control-label">Otchestvo</label>
                <div class="controls">
                    <input name="otchestvo" type="text"  placeholder="Otchestvo" value="<?php echo !empty($otchestvo)?$otchestvo:'';?>">
                    <?php if (!empty($otchestvoError)): ?>
                        <span class="help-inline"><?php echo $otchestvoError;?></span>
                    <?php endif; ?>
                </div>
            </div>


            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="index_CRUD.php">Back</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
</body>
</html>