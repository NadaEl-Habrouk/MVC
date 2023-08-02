<?php
namespace MVC\models;
use MVC\core\model;
class user extends model{
    public function GetAllUsers(){
        $data = model::db()->rows("SELECT * FROM user");
        return $data;
    }
    public function GetUser($email,$password){
        $data = model::db()->row("SELECT * FROM `user` WHERE `email` = ? AND `password` = ?",[$email,$password]);
        return $data;
    }
    public function InsertUser($username,$email,$password){
        $data = model::db()->insert('user', ['first_name' => $username, 'email' => $email , 'password' => $password]);
        return $data;
    }
}
