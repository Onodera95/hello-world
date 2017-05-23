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

class sotrudniki
{
    private $data; //Обработанные данные, которые мы получили от пользователя
    private $id;

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
                    header("Location: ../tables/sotrudniki.php");
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
                header("Location: ../tables/sotrudniki.php");
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

