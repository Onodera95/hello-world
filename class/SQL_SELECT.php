<?php
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 19.05.2017
 * Time: 17:18
 */

namespace sql;
require_once('connect.php');
use sql\connect;

class SQL_SELECT
{

    private $table;
    public $SQL;
    private $where;


    public function select() {
        $this ->SQL = "select * FROM `" .  $this->table . "` " . $this->where;
        $result = $this->exec();
        $res=[];
        while ($value = $result->fetch_assoc()){
            $res[] = $value;
        }
        return $res;
    }

    private function exec(){
        $db = connect::getInstance();
        return $db->query($this->SQL);

    }

    public function setTable($tableName = ''){
        if ($tableName === '' || !isset($tableName)){
            return false;
        }
        else{
            $this->table=$tableName;
        }
    }
    
    public function where($where=''){
        if ($where !== ''){
            $this->where=$where;
        }
    }
}