<?php
namespace tables;
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 10.05.2017
 * Time: 12:45
 */
class SQL_INSERT
{
    private $values;
    private $columns;
    private $table;
    public $SQL;


    
    public function Insert() {
        $c = '`'.implode('`, `', $this->columns)."`";
        $d = '"'.implode('", "', $this->values).'"';


        $this ->SQL = "INSERT INTO `" .  $this->table . "`  ($c)  " . " VALUES ($d)";
        return $this->exec();
    }
    
    private function exec(){
        //TODO Выполнить готовый запрос
        
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



