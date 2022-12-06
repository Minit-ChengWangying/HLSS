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

class user_login {

    /**
     * Author: WangMaixin
     * version: 202211052238
     * @package detecting Login state
     */
    public function  __construct() {
        if (!isset($_SESSION['loginState'])) {
            echo "<script>alert('登录状态失效,请重新登录！');location.href='http://5j4a135711.zicp.vip';</script>";
            die('Login Error!');
        }
    }

    /**
     * Author: WangMaixin
     * version: 202211052238
     * @return Username
     */
    public function getUsername () {
        if (isset($_COOKIE['Username'])) {
            return $_COOKIE['Username'];
        } else {
            return 'Err!!!';
        }
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