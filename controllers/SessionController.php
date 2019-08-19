<?php
/**
 * Created by PhpStorm.
 * User: rojai
 * Date: 18-08-2019
 * Time: 18:21
 */

class SessionController
{
    private $session;

    public function __construct()
    {
        $this->session = new User();
    }

    public function login($nombre,$pass){
     return  $this->session->validate_user($nombre,$pass);
    }

    public function logout(){
        session_destroy();
        header('Location: ./');
    }

}