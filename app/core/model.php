<?php
namespace MVC\core;

use Dcblogdev\PdoWrapper\Database;

class model {
    static function db(){
        $options = [
            //required
            'username' => 'root',
            'database' => 'carly',
            //optional 
            'password' => '',
            'type' => 'mysql',
            'host' => 'localhost',
            'port' => '3306',

        ];

        return $db = new Database($options);

    }

}
