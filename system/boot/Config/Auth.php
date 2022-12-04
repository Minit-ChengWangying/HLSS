<?php
namespace Boot\Config;

use Boot\Config\MySQL;

class Auth {
    static $SQL,$queryResult;
    public static function run($Limit) {
        self::queryLimit($Limit);
    }
    private static function getUsername() {
        return $_SESSION['loginState'];
    }
    private static function queryLimit($Limit) {
        self::$SQL = "select * from user where username = ".self::getUsername()." AND limits like '%$Limit%';";
        self::$queryResult = self::db()->query(self::$SQL)->fetch_array( MYSQLI_ASSOC );
        if(self::$queryResult == NULL) {
            die("<script>alert('请申请管理员访问!')</script>");
        }
    }
    private static function db() {
        return MySQL::connect();
    }
}
?>