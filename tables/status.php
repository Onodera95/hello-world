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
$db = new mysqli('127.0.0.1', 'root', '', 'technical_security');
$db->query('SET NAMES UTF8');
$sql = 'SELECT * FROM `status`';
$result = $db->query($sql);
// while ($value = $result->fetch_assoc())
foreach ($db->query($sql) as $value) {
    echo '<tr>';
    echo '<td>' . $value['id'] . '</td>';
    echo '<td>' . $value['status'] . '</td>';
}

    ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->
</body>
</html>