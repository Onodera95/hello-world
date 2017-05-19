<?php
/**
 * Created by PhpStorm.
 * User: stud03
 * Date: 19.05.2017
 * Time: 16:13
 */

namespace sql;


class connect
{
    private $host;
    private $port;
    private $user;
    private $password;
    private $db_name;

    private static $instance = null;

    private function __construct()
    {
        require_once '../connection_db.php';
        $this->host = HOST;
        $this->port = PORT;
        $this->db_name = DB;
        $this->user = USER;
        $this->password = PASSWORD;

        self::$instance = $this->connect_db();
        return self::$instance;
    }

    public static function getInstance(){
        if (self::$instance){
            return self::$instance;
        }
        else{
            $t = new self();
            return $t->getInstance();
        }
    }

    private function connect_db(){
        $db = new \mysqli($this->host, $this->user, $this->password, $this->db_name);
        $db->query('SET NAMES UTF8');
        
        if (is_object($db)){
            return $db;
        }
        return false;
    }


}