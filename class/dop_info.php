<?php
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 15.05.2017
 * Time: 14:07
 */

namespace form;

require_once('../class/SQL_INSERT.php');
require_once('../class/SQL_UPDATE.php');
require_once('../class/SQL_DELETE.php');
require_once('../class/SQL_SELECT.php');
use sql\SQL_DELETE;
use sql\SQL_INSERT;
use sql\SQL_SELECT;
use sql\SQL_UPDATE;

class dop_info
{
    private $data; //Обработанные данные, которые мы получили от пользователя
    private $id;

    /**
     * @return mixed
     */
    public function getTables()
    {
        return 'dop_info';
    }

    public function load(){

        $valid = true;
        if (isset($_REQUEST['date']) && $_REQUEST['date'] != ''){
            $this->data['date'] = $_REQUEST['date'];
        }
        else{
            echo 'ОШИБКА. Введите дату';
            $valid = false;
        }

        $valid = true;
        if (isset($_REQUEST['instruktaj_id']) && $_REQUEST['instruktaj_id'] != ''){
            $this->data['instruktaj_id'] = $_REQUEST['instruktaj_id'];
        }
        else{
            echo 'ОШИБКА. Выберите значение';
            $valid = false;
        }

        $valid = true;
        if (isset($_REQUEST['sotrudniki_id']) && $_REQUEST['sotrudniki_id'] != ''){
            $this->data['sotrudniki_id'] = $_REQUEST['sotrudniki_id'];
        }
        else{
            echo 'ОШИБКА. Выберите сотрудника';
            $valid = false;
        }

        $valid = true;
        if (isset($_REQUEST['status_id']) && $_REQUEST['status_id'] != ''){
            $this->data['status_id'] = $_REQUEST['status_id'];
        }
        else{
            echo 'ОШИБКА. Выберите значение';
            $valid = false;
        }

        if ($valid === false){
            return false;
        }

        return true;
    }

    public function save($update = false){
        if ($update !== false){
            $r=new SQL_UPDATE();
        }
        ELSE{
            $r = new SQL_INSERT();
        }
        $r->setTable($this->getTables());
        $r->setValues($this->data);


        return $r->query($this->id);

    }

    public function select($where = ''){
        $t = new SQL_SELECT();
        if (strpos($where,'where ') !== false){
            $t->where($where);
        }
        $t->setTable($this->getTables());
        return $t->select();
    }

    public function delete(){
        if ( !empty($_GET['id'])) {
            $id = $_GET['id'];
            $data = new SQL_SELECT();
            $data->setTable($this->getTables());
            $data->where('where id='.$id);
            $result = $data->select();
            return $result[0];
        }

        if ( !empty($_POST['id'])) {
            // keep track post values
            $id = $_POST['id'];

            $t = new SQL_DELETE();
            $t->setTable($this->getTables());
            return $t->Delete($id);
        }

    }

    public function update(){
        if ( !empty($_GET['id'])) {
            $id = $_GET['id'];
            $data = new SQL_SELECT();
            $data->setTable($this->getTables());
            $data->where('where id='.$id);
            $result = $data->select();
            return $result[0];
        }

        if ( !empty($_POST['id'])) {
            // keep track post values
            if ($this->load())
            {
                if ($this->save(true)){
                    header("Location: ../tables/dop_info.php");
                    return true;
                }
                header("Location: ".$_SERVER['HTTP_REFERER']);
            }
            return false;
        }
    }

    public function insert(){
        if ($this->load())
        {
            if ($this->save()){
                header("Location: ../tables/dop_info.php");
                return true;
            }
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
        return false;
    }

    public function form(){
        if ( !empty($_GET['id'])) {
            return $this->update();
        }
        elseif (!empty($_POST) && empty($_POST['id'])){
            return $this->insert();
        }
        elseif (!empty($_POST) && !empty($_POST['id'])){
            return $this->update();
        }
    }
}