<?php
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 18.05.2017
 * Time: 14:40
 */

namespace form;

require_once('../class/SQL_INSERT.php');
use sql\SQL_INSERT;
class dop_info
{
    private $data; //Обработанные данные, которые мы получили от пользователя

    /**
     * @return mixed
     */
    public function getTables()
    {
        return 'dop_info';
    }

    public function load()
    {
        $valid = true;
        if (isset($_REQUEST['instruktaj_id']) && $_REQUEST['instruktaj_id'] != '') {
            $this->data['instruktaj_id'] = $_REQUEST['instruktaj_id'];
        } else {
            echo 'ОШИБКА. Выберите инструктаж';
            $valid = false;
        }

        $valid = true;
        if (isset($_REQUEST['sotrudniki_id']) && $_REQUEST['sotrudniki_id'] != '') {
            $this->data['sotrudniki_id'] = $_REQUEST['sotrudniki_id'];
        } else {
            echo 'ОШИБКА. Выберите сотрудника';
            $valid = false;
        }

        $valid = true;
        if (isset($_REQUEST['status_id']) && $_REQUEST['status_id'] != '') {
            $this->data['status_id'] = $_REQUEST['status_id'];
        }

        $valid = true;
        if (isset($_REQUEST['date']) && $_REQUEST['date'] != '') {
            $this->data['date'] = $_REQUEST['date'];
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
        $r->query();

        return $r->SQL;

    }
}