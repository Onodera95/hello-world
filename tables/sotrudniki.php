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
                <th>Инструктаж</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include '../testovyi_CRUD/con_db_CRUD.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM sotrudniki ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['id'] . '</td>';
                echo '<td>'. $row['family'] . '</td>';
                echo '<td>'. $row['name'] . '</td>';
                echo '<td>'. $row['otchestvo'] . '</td>';
                echo '<td>'. $row['doljnost_id'] . '</td>';
                echo '<td>'. $row['instruktaj_id'] . '</td>';
                echo '<td>'. $row['status_id'] . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="../testovyi_CRUD/read_CRUD.php?id='.$row['id'].'">Read</a>';
                echo ' ';
                echo '<a class="btn btn-success" href="../testovyi_CRUD/update_CRUD.php?id='.$row['id'].'">Update</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="../testovyi_CRUD/delete_CRUD.php?id='.$row['id'].'">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            Database::disconnect();
            ?>
            </tbody>
        </table>
        <p><a href="../testovyi_CRUD/create_CRUD.php"><button>
                    <img src="../pictures/Plus.png" width="20px" alt="" style="vertical-align:middle">
                    Добавить
                </button></a></p>
        <p><a href="../testovyi_CRUD/update_CRUD.php"><button>
                    <img src="../pictures/pencil.png" width="20px" alt="" style="vertical-align:middle">
                    Редактировать
                </button></a></p>
        <p><a href="../testovyi_CRUD/delete_CRUD.php"><button>
                <img src="../pictures/close.png" width="20px" alt="" style="vertical-align:middle">
                Удалить
            </button></a></p>


    </div>
</div> <!-- /container -->
</body>
</html>