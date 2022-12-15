<?php
namespace Boot\Model;

use Boot\Config\MySQL;

class AccountModel {
    static $Sql,$queryResult;
    public static function index($accountInfo) {
        $modify_result = self::verify($accountInfo)?self::modify($accountInfo):false;
        $result = $modify_result?'true':'false';
        return $result;
    }
    private static function verify($accountInfo) {
        $Account = $_COOKIE['Username'];
        $Password = $accountInfo['oldPassword'];
        self::$Sql = "select * from Login where username='$Account' and password='".self::encryptionPwd($Password)."';";
        self::$queryResult = self::db()->query(self::$Sql);
        $queryState = self::$queryResult&&mysqli_num_rows(self::$queryResult);
        return $queryState;
    }
    private static function modify($accountInfo) {
        $Account = $_COOKIE['Username'];
        $newPassword = $accountInfo['newPassword'];
        self::$Sql = "UPDATE Login SET password='".self::encryptionPwd($newPassword)."' WHERE username='$Account';";
        self::$Sql .= "UPDATE user SET password='".self::encryptionPwd($newPassword)."' WHERE username='$Account';";
        self::$queryResult = self::db()->multi_query(self::$Sql);
        return self::$queryResult;
    }
    private static function encryptionPwd($pwd) {
        return md5($pwd);
    }
    public static function loginVerify() {
        
    }
    private static function db() {
        return MySQL::connect();
    }
}
?>