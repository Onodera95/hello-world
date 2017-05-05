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
    <div class="row">
        <h3>PHP CRUD Grid</h3>
    </div>
    <div class="row">
        <p>
            <a href="create_CRUD.php" class="btn btn-success">Create</a>
        </p>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'con_db_CRUD.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM sotrudniki ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['id'] . '</td>';
                echo '<td>'. $row['family'] . '</td>';
                echo '<td>'. $row['name'] . '</td>';
                echo '<td>'. $row['otchestvo'] . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="read_CRUD.php?id='.$row['id'].'">Read</a>';
                echo ' ';
                echo '<a class="btn btn-success" href="update_CRUD.php?id='.$row['id'].'">Update</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="delete_CRUD.php?id='.$row['id'].'">Delete</a>';
                echo '</td>';
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