<?php

namespace sql;
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.05.2017
 * Time: 21:26
 */
class SQL_UPDATE
{
    private $values;
    private $columns;
    private $table;
    public $SQL;


    public function query($id) {
        
        $set = '';
        $i = 1;
        $count = count($this->columns);
        foreach ($this->columns as $key=>$value){
            $set .= "$value = '".$this->values[$key]."'";
            if ($count<$i){
                $set .= ", ";
            }
            $i++;
        }
        $this ->SQL = "UPDATE `" .  $this->table . "` SET " . $set . " WHERE id=$id" ;
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


    public function setValues($values){
        /*$arr = array('id'=>"1", 'матом'=>"two", 'key3'=>"three");
        foreach ($arr as $key => $value){
            echo "Ключ: $key; Значение: $value<br />\n";
        }*/
        if (is_array($values)){
            //Очистить старые значения
            $this->values=array();
            $this->columns=array();
            foreach ($values as $key => $value){
                //array()
                $this->values[]=$value;
                $this->columns[]=$key;
            }
            return true;
        }
        else{
            return false;
        }
    }
}