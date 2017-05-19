<?php
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 19.05.2017
 * Time: 14:44
 */

namespace sql;


class WHERE
{
    public $where;
    private $values;
    private $columns;


    public function andWhere($arr){

        $this->where = "$this->values"  AND "";

    }

    public function orWhere($arr){


    }


    public function setValues($values){

        if (is_array($values)) {
            //Очистить старые значения
            $this->values = array();
            $this->columns = array();
            foreach ($values as $key => $value) {
                //array()
                $this->values[] = $value;
                $this->columns[] = $key;
            }
            return true;
        } else {
            return false;
        }
    }
}