<html>
<head>
    <meta charset="utf-8">
    <title>Инструктаж</title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <script src="../bootstrap/js/jquery-3.2.1.min.js" > </script>
        <script src="../bootstrap/js/bootstrap.min.js" > </script>
    </head>

<body>
<div class="container">
    <div class="row">
        <h3>Инструктаж</h3>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Наименование</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $db = new mysqli('127.0.0.1', 'root', '', 'technical_security');
            $db->query('SET NAMES UTF8');
            $sql = 'SELECT * FROM `instruktaj`';
            $result = $db->query($sql);
            // while ($value = $result->fetch_assoc())
            foreach ($db->query($sql) as $value){
                echo '<tr>';
                echo '<td>'. $value['id'] . '</td>';
                echo '<td>'. $value['name'] . '</td>';

                echo '<td width=250>';
                echo '<a class="btn btn-success" href="pervich_inst.php">Подробнее</a>';
                echo '</td>';

                echo '<td width=250>';
                echo '<a class="btn btn-success" href="vvod_inst.php">Вводный</a>';
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
