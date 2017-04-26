<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style type="text/css">
        TABLE {
            width: 300px; /* Ширина таблицы */
            border-collapse: collapse; /* Убираем двойные линии между ячейками */
        }
        TH {
            padding: 10px; /* Поля вокруг содержимого таблицы */
            border: 1px solid black; /* Параметры рамки */
        }
        TD {
            /*background: #b0e0e6; /* Цвет фона */
            padding: 5px; /* Поля вокруг содержимого таблицы */
            border: 1px solid black; /* Параметры рамки */
            text-align: center; /* Выравнивание текста по левому краю */
        }
    </style>
</head>

<body>
<div class="container">
    <div class="row">
        <h3>PHP CRUD Grid</h3>
    </div>
    <div class="row">
        <p>
            <a href="create.php" class="btn btn-success">Create</a>
        </p>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Должность</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'database.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM sotrudniki ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
            echo '<tr>';
                echo '<td>'. $row['id'] . '</td>';
                echo '<td>'. $row['family'] . '</td>';
                echo '<td>'. $row['name'] . '</td>';
                echo '<td>'. $row['otchestvo'] . '</td>';
                echo '<td>'. $row['doljnost_id'] . '</td>';
                echo '<td><a class="btn" href="read.php?id='.$row['id'].'">Read</a></td>';
                echo '</tr>';
            }
            Database::disconnect();
            ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->
</body>
</html>