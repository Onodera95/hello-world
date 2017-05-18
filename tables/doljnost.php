<html>
<head>
    <meta charset="utf-8">
    <title>Должность</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
    <script src="../bootstrap/js/jquery-3.2.1.min.js" > </script>
    <script src="../bootstrap/js/bootstrap.min.js" > </script>
</head>

<body>
<div class="container">
    <div class="row">
        <h3>Должность сотрудников</h3>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Наименование</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $db = new mysqli('127.0.0.1', 'root', '', 'technical_security');
                    $db->query('SET NAMES UTF8');
                    $sql = 'SELECT * FROM `doljnost`';
                    $result = $db->query($sql);
                    // while ($value = $result->fetch_assoc())
                    foreach ($db->query($sql) as $value){
                        echo '<tr>';
                        echo '<td>'. $value['id'] . '</td>';
                        echo '<td>'. $value['name'] . '</td>';

                        echo '<td width=250>';
                        echo '<a class="btn btn-success" href="update_CRUD.php?id='.$value['id'].'">Update</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="delete_CRUD.php?id='.$value['id'].'">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                //header('location:sotrudniki.php');
                ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->
</body>
</html>
