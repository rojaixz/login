<?php
require_once "controllers/Autoload.php";
$autoload = new Autoload();
$get = (isset($_GET['r']))? $_GET['r']: "";
$route = new Router($get);