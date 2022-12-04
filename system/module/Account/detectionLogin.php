<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* Function: Desert
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
session_start();
require('../Mysql/connectMysql.php');

// Close
echo "Desert";
exit;

if (isset($_GET['code'])) {
    $Code = $_GET['code'];
} else {
    echo "Fatal Error!";
    exit;
}

switch($Code) {
case 1000:  // 用户是否登录
    if (isset($_SESSION['loginState'])) {
        echo json_encode('True');
    } else {
        echo json_encode('Flase');
    }
case 1001:  // 读取COOKIE存放的用户名
    if ($Code == '1001') {
        if (isset($_COOKIE['Username'])) {
            echo json_encode($_COOKIE['Username']);
        } else {
            echo json_encode('Flase');
        }
    }
case 1002:  // 读取COOKIE存放的教师姓名
    if ($Code == '1002') {
        if (isset($_COOKIE['TeacherName'])) {
            echo json_encode($_COOKIE['TeacherName']);
        } else {
            echo json_encode('Flase');
        }
    }
case 1003:  // 获取用户所属部门
    if ($Code == '1003') {
        if (isset($_SESSION['loginState'])) {
            $Username = $_COOKIE['Username'];
            $userBranchSQL = "select * from user where username='$Username';";
            $userBranchSQL_result = $db->query($userBranchSQL)->fetch_array( MYSQLI_ASSOC );
            echo json_encode($userBranchSQL_result['branch']);
        } else {
            echo json_encode('Flase');
        }
        
    }
case 1008:  // 清除所有SESSION
    if ($Code == '1008') {
        unset($_SESSION['loginState']);
        session_destroy();
        setcookie("Username", "" , time()-1, '/');
        setcookie("TeacherName", '', time()-1, '/');
        setcookie("Branch", '', time()-1, '/');
        if (isset($_SESSION['loginState'])) {
            echo json_encode('Flase');
        } else {
            echo json_encode('True');
        }
    }
    
case 1005:  // 请求新的COOKIE
    if ($Code == '1005') {
        if (isset($_SESSION['loginState'])) {
            // COOKIE
            // setcookie("Username", $_SESSION['loginState'], time()+600);
            echo json_encode('NULL');
        } else {
            echo json_encode('NULL');
        }
    }
}





// echo ;
// echo "<br>";

?>