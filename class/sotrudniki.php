<?php
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 15.05.2017
 * Time: 14:07
 */

namespace form;

require_once('../class/SQL_INSERT.php');
use sql\SQL_INSERT;

class sotrudniki
{
    private $data; //Обработанные данные, которые мы получили от пользователя

    /**
     * @return mixed
     */
    public function getTables()
    {
        return 'sotrudniki';
    }

    public function load(){
        $valid = true;
        if (isset($_REQUEST['family']) && $_REQUEST['family'] != ''){
            $this->data['family'] = $_REQUEST['family'];
        }
        else{
            echo 'ОШИБКА. Заполните Поле Фамилия';
            $valid = false;
        }

        if (isset($_REQUEST['name']) && $_REQUEST['name'] != ''){
            $this->data['name'] = $_REQUEST['name'];
        }
        else{
            echo 'ОШИБКА. Заполните поле Имя';
            $valid = false;
        }

        if (isset($_REQUEST['otchestvo']) && $_REQUEST['otchestvo'] != ''){
            $this->data['otchestvo'] = $_REQUEST['otchestvo'];
        }
        else{
            echo 'ОШИБКА. Заполните поле Отчество';
            $valid = false;
        }

        if (isset($_REQUEST['doljnost_id']) && $_REQUEST['doljnost_id'] != ''){
            $this->data['doljnost_id'] = $_REQUEST['doljnost_id'];
        }
        else{
            echo 'ОШИБКА. Выберите Должность';
            $valid = false;
        }
        

        if (isset($_REQUEST['status_id']) && $_REQUEST['status_id'] != ''){
            $this->data['status_id'] = $_REQUEST['status_id'];
        }
        
        if ($valid === false){
            return false;
        }
        
        return true;
    }

    public function save(){
        $r=new SQL_INSERT();
        $r->setTable($this->getTables());
        $r->setValues($this->data);
        return $r->query();

    }

}


$t=new sotrudniki();

$t->load();

echo $t->save();
