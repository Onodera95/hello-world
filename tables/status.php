<html>
<head>
    <meta charset="utf-8">
    <title>Статус</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
    <script src="../bootstrap/js/jquery-3.2.1.min.js" > </script>
    <script src="../bootstrap/js/bootstrap.min.js" > </script>
</head>

<body>
<div class="container">
    <div class="row">
        <h3>Статус</h3>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>

                <th>№</th>
                <th>Статус</th>

            </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../class/status.php';
                    $model = new \form\status();
                    $result = $model->select();
                    foreach ($result as $value){
                        echo '<tr>';
                        echo '<td>' . $value['id'] . '</td>';
                        echo '<td>' . $value['status'] . '</td>';

                       /* echo '<td width=250>';
                        echo '<a class="btn btn-success" href="../form/status_create.php?id='.$value['id'].'">Обновить</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="../form/status_delete.php?id='.$value['id'].'">Удалить</a>';
                        echo '</td>';
                        echo '</tr>'; */
                        }
                ?>
            </tbody>
        </table>
         <p><a href="../form/status_create.php"><button>
                    <img src="../pictures/Plus.png" width="20px" alt="" style="vertical-align:middle">
                    Добавить
                </button></a></p>
    </div>
</div> <!-- /container -->
</body>
</html>