<?php
namespace Boot\Config;

use Boot\Config\DatabaseJSON;

class MySQL {
    public static function connect() {
        $host = DatabaseJSON::run('HOST');
        $databaseuser = DatabaseJSON::run('USERNAME');
        $password = DatabaseJSON::run('PASSWORD');
        $databasename = DatabaseJSON::run('DATABASESHEET');
        $db = mysqli_connect( $host, $databaseuser, $password, $databasename);
        if( $db->connect_errno <> 0){
            die('Database service is unavailable!');
        }
        $db->query("SET NAMES UTF8");

        return $db;
    }
}








?>