<?php
namespace Boot\Controller;

use Boot\Error;
use User\devhelp\user_login;
use Boot\Config\Auth;

class Controller {
    public static function run($Limit) {
        self::error(true);
        self::login();
        self::Limit($Limit);
    }
    private static function Limit($Limit) {
        Auth::run($Limit);
    }
    private static function error($system_state) {
        return (new Error($system_state))->error();
    }
    private static function login() {
        $Login = new user_login;
    }
}
?>