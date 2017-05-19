<?php
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 10.05.2017
 * Time: 13:04
 */
header("Location: back;");

require_once "class/connect.php";
use sql\connect;

$db = connect::getInstance('sql11.freemysqlhosting.net', 'sql11175374', 'sql11175374', 'dcpc2nDHDG');

$res = $db->query('SELECT * FROM doljnost');
print_r($res->fetch_assoc());

$db = connect::getInstance('127.0.0.1', 'technical_security','root','');
$res = $db->query('SELECT * FROM doljnost');
print_r($res->fetch_assoc());





require_once "class/SQL_DELETE.php";

use sql\SQL_DELETE as ins;

$t= new ins();
$t->setTable('doljnost');

$t->Delete(1);
echo $t->SQL;

//TODO Поискать информацию про Singleton на php в интернете

//TODO Сделать единый класс по подключению к бд