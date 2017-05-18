<html>
<head>
    <meta charset="utf-8">
    <title>Дополнительная информация</title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <script src="../bootstrap/js/jquery-3.2.1.min.js" > </script>
        <script src="../bootstrap/js/bootstrap.min.js" > </script>
    </head>

<body>
<div class="container">
    <div class="row">
        <h3>Дополнительная информация</h3>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Дата проведения</th>
                <th>Инструктаж</th>
                <th>Сотрудник</th>
                <th>Статус</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $db = new mysqli('127.0.0.1', 'root', '', 'technical_security');
            $db->query('SET NAMES UTF8');
            $sql = 'SELECT * FROM `dop_info`';
            $result = $db->query($sql);
            // while ($value = $result->fetch_assoc())
            foreach ($db->query($sql) as $value){
                echo '<tr>';
                echo '<td>'. $value['id'] . '</td>';
                echo '<td>'. $value['date'] . '</td>';
                echo '<td>'. $value['instruktaj_id'] . '</td>';
                echo '<td>'. $value['sotrudniki_id'] . '</td>';
                echo '<td>'. $value['status_id'] . '</td>';

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