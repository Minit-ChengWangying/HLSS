<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* Function: Provide account functions
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace Module\Account;

// session_start();

/**
 * .PHP get login state
 * @package
 */
class detectionLoginStateFunction {

    /**
     * Author: WangMaixin
     * version: 202211052238
     * @package detecting Login state
     */
    public static function detectionLogin () {  # 不被建议的方法，与user_login同时用会报错
        if (isset($_SESSION['loginState'])) {
            return json_encode('True');
        } else {
            echo "<script>alert('登录状态失效,请重新登录!');location.href='http://5j4a135711.zicp.vip';</script>";
            die('Login Error！');
        }
    } 

    /**
     * Author: WangMaixin
     * version: 202211052238
     * @throws suggested use User\devhelp\user_login;
     */
    public function getCookie () {
        if (isset($_COOKIE['Username'])) {
            return json_encode($_COOKIE['Username']);
        } else {
            $this::establishCookie();
        }
    }

    /**
     * Author: WangMaixin
     * version: 202211052238
     * @todo NOT
     */
    public static function establishCookie () {
        if (isset($_SESSION['loginState'])) {
            // setcookie("Username", $_SESSION['loginState'], time()+600,'/');
            return json_encode('NULL');
        } else {
            return json_encode('NULL');
        }
    }

    /**
     * Author: WangMaixin
     * version: 202211052238
     * @return Teachername
     */
    public static function getTeacherName () {
        if (isset($_COOKIE['TeacherName'])) {
            return $_COOKIE['TeacherName'];
        } else {
            return json_encode('Err!!!');
        }
    }

    /**
     * Author: WangMaixin
     * version 202211130015
     * @abstract quit Login
     */
    public static function Quit () {
        unset($_SESSION['loginState']);
        session_destroy();
        setcookie("Username", "" , time()-1, '/');
        setcookie("TeacherName", '', time()-1, '/');
        setcookie("Branch", '', time()-1, '/');
        if (isset($_SESSION['loginState'])) {
            return json_encode('Flase');
        } else {
            return json_encode('True');
        }
    }
}
?>