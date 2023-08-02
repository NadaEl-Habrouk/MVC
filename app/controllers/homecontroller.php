<?php
namespace MVC\controllers;
use MVC\core\controller;
use MVC\models\user;
use GUMP;
use MVC\core\Session;
use MVC\core\helpers;

class homecontroller extends controller {
    public function __construct(){
        Session::start();
    }
    public function index()  {
        $user = new user();
        $data = $user->GetAllUsers();


       // $data = $this->db()->rows("SELECT * FROM user");
     

        $title = 'home index';
        $h1 ="Nada" ;
       $this->view("home/index",['title'=>$title,'h1'=>$h1,'data' => $data ]);
    }
    public function add(){
        echo 'add';
    }
    public function login(){
        $this->view("home/login",['title'=>'login']);
    }
    public function postlogin(){
        $v =GUMP::is_valid($_POST,[
            'email'  => 'required'
        ]);
        if($v == 1){
            $user = new user();
            $data = $user->GetUser($_POST['email'],$_POST['password']);
            Session::Set('user',$data);
            helpers::redirect('user\index');
    

        }

    }
    public function logout(){
        Session::Stop();
    }
    public function register(){
        $this->view("home/register",['title'=>'register']);

    }
    public function postregister(){
        $v =GUMP::is_valid($_POST,[
            'username'  => 'required',
            'email'  => 'required',
            'password'=> 'required|between_len,4;100',

        ]);
        if($v == 1){
            $user = new user();
            $data = $user->InsertUser($_POST['username'],$_POST['email'],$_POST['password']);
            Session::Set('user',$data);
            helpers::redirect('user\index');
    

        }else{
            Session::Stop();  
        }

    }
}