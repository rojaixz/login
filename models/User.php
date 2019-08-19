<?php
class User extends Conexion
{
    private $id;
    private $nombre;
    private $pass;

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function read($id ="")
    {
        $this->query= (!$id=="")? "SELECT *FROM usuarios WHERE id=".$id : "SELECT *FROM usuarios";
        $result = $this->get_query();
        $data =array();
        foreach ($result as $key=>$value){
            array_push($data,$value);
        }
        array_pop($data);
        return $data;
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function validate_user($nombre,$pass){
         $this->query=  "SELECT *FROM usuarios WHERE nombre='$nombre' AND contraseña = '$pass'";
        $result = $this->get_query();
        $data =array();
        foreach ($result as $key=>$value){
            array_push($data,$value);
        }
        array_pop($data);
        return $data;
    }
}