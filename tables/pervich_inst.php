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

            <li><a class="dropdown-toggle" data-toggle="dropdown" href="">Список инструктажей<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../tables/pervich_inst.php">Первичный</a></li>
                    <li><a href="../tables/vvod_inst.php">Вводный</a></li>
                </ul>
            </li>

            <li><a href="../tables/dop_info.php">Дополнительная информация</a></li>
            <li><a href="../tables/status.php">Статус</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <h3>Первичный инструктаж</h3>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>

            </thead>
            <tbody>
                <object><embed src="../Первичный%20инструктаж.pdf" width="1200" height="620" /></object>
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
<p align="center"><input type="checkbox">Ознакомлен с инструктажем</p>

<p align="center"><a href="instruktaj.php" class="btn btn-success disabled"> Подтвердить </a>></p>

</body>
</html>
