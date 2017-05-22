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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../menu.php">ИЦ "Наш Город"</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="../menu.php">Главная страница</a></li>

            <li><a class="dropdown-toggle" data-toggle="dropdown" href="">Сотудники<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../tables/sotrudniki.php">Список</a></li>
                    <li><a href="../tables/doljnost.php">Должности</a></li>
                </ul>
            </li>

            <li><a class="dropdown-toggle" data-toggle="dropdown" href="">Инструктажи<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../tables/pervich_inst.php">Первичный</a></li>
                    <li><a href="../tables/vvod_inst.php">Вводный</a></li>                    
                    <li><a href="../tables/instruktaj.php">Настройки</a></li>
                </ul>
            </li>

            <li><a href="../tables/dop_info.php">Дополнительная информация</a></li>
            <li><a href="../tables/status.php">Статус</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <h3>Дополнительная информация</h3>
    </div>
    <p align="right"><a href="../form/dop_info_create.php" class="btn btn-primary">
            <img src="../pictures/Plus.png" width="20px" alt="" style="vertical-align:middle">
            Добавить
        </a></p>
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
            require_once '../class/dop_info.php';
            $model = new \form\dop_info();
            $result = $model->select();
            foreach ($result as $value){
                echo '<tr>';
                echo '<td>'. $value['id'] . '</td>';
                echo '<td>'. $value['date'] . '</td>';
                echo '<td>'. $value['instruktaj_id'] . '</td>';
                echo '<td>'. $value['sotrudniki_id'] . '</td>';
                echo '<td>'. $value['status_id'] . '</td>';

                echo '<td width=250>';
                echo '<a class="btn btn-success" href="../form/dop_info_update.php?id='.$value['id'].'">Изменить</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="../form/dop_info_delete.php?id='.$value['id'].'">Удалить</a>';
                echo '</td>';
                echo '</tr>';
            }

            ?>
            </tbody>
        </table>        
    </div>
</div> <!-- /container -->
</body>
</html>