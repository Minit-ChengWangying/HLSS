<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* Function: get User information
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace User\devhelp;

session_start();

use User\config\DatabaseJSON;

class user_login {

    /**
     * Author: WangMaixin
     * version: 202211052238
     * @package detecting Login state
     */
    public function  __construct() {
        if (!isset($_SESSION['loginState'])) {
            echo "<script>alert('登录状态失效,请重新登录！');location.href='".DatabaseJSON::host()."';</script>";
            die('Login Error!');
        }
    }

    /**
     * Author: WangMaixin
     * version: 202211052238
     * @return Username
     */
    public static function getUsername () {
        $Username = isset($_SESSION['loginState'])?trim($_SESSION['loginState']):'NULL';
        return $Username;
    }

    /**
     * Author: WangMaixin
     * version: 202211052238
     * @return TeacherName
     */
    public function getTeacherName () {
        if (isset($_COOKIE['TeacherName'])) {
            return $_COOKIE['TeacherName'];
        } else {
            return 'Err!!!';
        }
    }

    /**
     * Author: WangMaixin
     * version:220211072258
     * @return Branch
     */
    public function getBranch () {
        if (isset($_COOKIE['Branch'])) {
            return $_COOKIE['Branch'];
        } else {
            return 'Err!!!';
        }
    }
}

?>