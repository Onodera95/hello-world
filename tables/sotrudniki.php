<html>
<head>
    <meta charset="utf-8">
    <title>Сотрудники</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
    <script src="../bootstrap/js/jquery-3.2.1.min.js" > </script>
    <script src="../bootstrap/js/bootstrap.min.js" > </script>
</head>
<body>
<div class="container">
    <div class="row">
        <h3>Сотрудники</h3>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Должность</th>
                <th>Статус</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            <?php

            require_once '../class/sotrudniki.php';
            $model = new \form\sotrudniki();
            $result = $model->select();
                foreach ($result as $value){
                    echo '<tr>';
                    echo '<td>'. $value['id'] . '</td>';
                    echo '<td>'. $value['family'] . '</td>';
                    echo '<td>'. $value['name'] . '</td>';
                    echo '<td>'. $value['otchestvo'] . '</td>';
                    echo '<td>'. $value['doljnost_id'] . '</td>';
                    echo '<td>'. $value['status_id'] . '</td>';

                    echo '<td width=250>';
                    echo '<a class="btn btn-success" href="../form/sotrudniki_create.php?id='.$value['id'].'">Update</a>';
                    echo ' ';
                    echo '<a class="btn btn-danger" href="../form/sotrudniki_delete.php?id='.$value['id'].'">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }

            ?>
            </tbody>
        </table>
        <p><a href="../form/sotrudniki_create.php"><button>
                    <img src="../pictures/Plus.png" width="20px" alt="" style="vertical-align:middle">
                    Добавить
                </button></a></p>

    </div>
</div> <!-- /container -->
</body>
</html>