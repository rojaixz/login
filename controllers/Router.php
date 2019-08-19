<?php
/**
 * Created by PhpStorm.
 * User: rojai
 * Date: 18-08-2019
 * Time: 18:21
 */

class Router
{
    private $route;
    public function __construct($route)
    {
        $this->route =$route;
        $session_options = array(
            'use_only_cookies' =>1,
            'read_and_close' =>true
        );
        session_start();



        if(isset($_SESSION['ok'])){
           //redireccion


            switch ($this->route){
                case "home":
                    $login_view = new ViewController();
                    $login_view->get_view('home');
                    break;

                case "acount":
                    $login_view = new ViewController();
                    $login_view->get_view('acount');
                    break;
                case "logout":
                    $user = new SessionController();
                    $user->logout();
                    break;
            }

        }else{

            if(!isset($_POST['name']) && !isset($_POST['pass'])){

                $login_view = new ViewController();
                $login_view->get_view('login');

            }else{

                $user = new SessionController();
                $result =$user->login($_POST['name'],$_POST['pass']);
                if(empty($result)){
                    header('Location: ./');
                }else{

                    $data = array();
                    foreach ($result as $key=>$list){
                        $_SESSION['nombre']= $list['nombre'];
                        $_SESSION['contraseña'] = $list['contraseña'];
                    }
                    $_SESSION['ok']= true;
                    header('Location: ./home');
                }




            }



        }




    }

}