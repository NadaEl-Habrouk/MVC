<?php
namespace MVC\controllers;
use MVC\core\controller;
use MVC\models\user;
use GUMP;
use MVC\core\Session;

class usercontroller extends controller{
    public function __construct(){
        Session::start();
        $user_date =  Session::Get('user');
        if(empty($user_date)){
            echo 'class not access';die;
        }
    }
    public function index(){
        echo 'user';

    }
    public function add(){
        echo 'add';
}



} 

    