<html>
<head>
    <meta charset="utf-8">
    <title>Первичный инструктаж</title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <script src="../bootstrap/js/jquery-3.2.1.min.js" > </script>
        <script src="../bootstrap/js/bootstrap.min.js" > </script>
</head>

<body>
<div class="container">
    <div class="row">
        <h3>Первичный инструктаж</h3>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>№</th>
                <th>Описание</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once '../class/pervichnyi_inst.php';
            $model = new \form\pervichnyi_inst();
            $result = $model->select();
            foreach ($result as $value){
                echo '<tr>';
                echo '<td>'. $value['id'] . '</td>';
                echo '<td>'. $value['description'] . '</td>';
                echo '<td>'. $value['instruktaj_id'] . '</td>';
            }

            ?>

            </tbody>
        </table>
    </div>
</div> <!-- /container -->
    <p align="center"><input type="checkbox" name="a" value="1417"> Ознакомлен с инструктажем</p>
    <p align="center"><a href="instruktaj.php"><button><style>="vertical-align: middle"</style>Подтвердить</button></a></p>

</body>
</html>
