<?php
namespace Boot\Config;

class Login {
    public static function login() {

    }
    public static function loginDetection() {
        return isset($_SESSION['loginState']);
    }
}
?>