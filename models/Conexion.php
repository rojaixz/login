<?php

abstract class Conexion
{
    private static $db_host="localhost";
    private static $db_user="root";
    private static $db_pass="";
    private static $bd_name="login";
    private static $bd_charset="UTF8";
    protected $query;
    protected $rows=array();
    protected $conn;


    protected abstract function create();
    protected abstract function read();
    protected abstract function update();
    protected abstract function delete();

    private function bd_open(){
        $this->conn = new mysqli(
            self::$db_host,
            self::$db_user,
            self::$db_pass,
            self::$bd_name
        );
        $this->conn->set_charset(self::$bd_charset);
    }
    private function bd_close(){
        $this->conn->close();
    }

    protected function set_query(){
        $this->bd_open();
        $this->conn->query($this->query);
        $this->bd_close();
    }
    protected function get_query(){
        $this->bd_open();
        $result= $this->conn->query($this->query);
        while ($this->rows[]=$result->fetch_assoc());
        $result->close();
        $this->bd_close();

        return $this->rows;
    }

}