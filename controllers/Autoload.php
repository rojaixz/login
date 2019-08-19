<?php
class Autoload
{
    public function __construct()
    {
        spl_autoload_register( function ($get_class){
            $path_model="./models/".$get_class.".php";
            $path_controller="./controllers/".$get_class.".php";

            if(file_exists($path_model)) require_once ($path_model);
            if(file_exists($path_controller)) require_once ($path_controller);
        });
    }

}