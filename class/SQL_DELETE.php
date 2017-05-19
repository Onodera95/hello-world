<?php

namespace sql;

use sql\connect;
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.05.2017
 * Time: 21:05
 */
class SQL_DELETE
{
    //private $id;
    private $table;
    public $SQL;


    public function Delete($id) {
        
        $this ->SQL = "DELETE FROM `" .  $this->table . "`  " . "WHERE id=$id";

        return $this->exec();
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
}