<?php
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 10.05.2017
 * Time: 13:04
 */

require_once "tables/SQL_INSERT.php";

use tables\SQL_INSERT as ins;

$t= new ins();
$t->setTable('sotrudniki');
$arr = array('family'=>"Sokolova", 'name'=>"Lidia", 'otchestvo'=>"Alexsandrovna");
$t->setValues($arr);
$t->Insert();
echo $t->SQL;