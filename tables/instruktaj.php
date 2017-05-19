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
            require_once '../class/instruktaj.php';
            $model = new \form\instruktaj();
            $result = $model->select();
            foreach ($result as $value){
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
        <p><a href="../form/instruktaj_create.php"><button>
                    <img src="../pictures/Plus.png" width="20px" alt="" style="vertical-align:middle">
                    Добавить
                </button></a></p>
    </div>
</div> <!-- /container -->
</body>
</html>
