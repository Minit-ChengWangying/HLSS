<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace Module\Account;

use function Account\mode\detection_auth;

require_once __DIR__ . '/../mode/Auth.php';
require('../Mysql/connectMysql.php');
require_once('../mode/blackList.php');

// Auth
$auth_system = detection_auth('admin',$db);
$auth_system?true:die('ERROR![ACCOUNT]:You can try to check user permissions');

$msg = '';

$userName = $_POST['username'];
$Password = '1234';
$Branch = $_POST['branch'];
$teacherName = $_POST['teachername'];
$Auth = $_POST['Limits'];
$AccountType = $_POST['accounttype'];
$AccountClass = $_POST['class'];

$Auth_str_start = implode("&nbsp&nbsp",$Auth);
$Auth_str = 'account'.' '.' '.$Auth_str_start;

// Index
$Index = array(
    'politics' => 'politics/index.php?page=consolemodule',
    'teacher' => 'ticket/recordTicket.php',
    'unionsport' => 'unionstudent/index.php',
    'unionhygene' => 'unionstudent/index.php',
    'sleep' => 'sleep/index.php',
    'classmaster' => 'classmaster/index.html',
    'admin' => 'admin/index.html?nav=service&page=system',
);

$User_Index = $Index[$Branch];

$Password = str_replace($blackList, 'm', $Password);
$encryptionPassword = md5($Password);

$selcet = "select * from login where username='$userName'";
$selcet_result = $db->query($selcet);
// 判断用户名是否重复
if($selcet_result&&mysqli_num_rows($selcet_result)) {
    $msg = '用户名重复!<a href="../../../page/admin/index.html?nav=user&page=register">点击此处返回</a>';
    echo $msg;
    exit;
}else {
    // Class master register
    if($AccountType == 'classmaster') {
        $insertClass = "UPDATE class SET class_master = '$userName' WHERE class = '$AccountClass';";
        $insertClass .= "INSERT INTO login (username,`password`) VALUES ('$userName','$encryptionPassword');";
        $insertClass .= "INSERT INTO user (username,`password`,branch,teacherName,limits,`Index`,class_number) VALUES ('$userName','$encryptionPassword','$Branch','$teacherName','$Auth_str','$User_Index','$AccountClass')";
        $insertClass_result = $db->multi_query($insertClass);
        if(!$insertClass_result) {
            $msg = '班级错误!<a href="../../../page/admin/index.html?nav=user&page=register">点击此处返回';
        } else {
            $msg = '账号:'.$userName.',注册成功!<a href="../../../page/admin/index.html?nav=user&page=register">(3秒后自动返回)</a><script>setTimeout(function(){window.location="../../../page/admin/index.html?nav=user&page=register"},3000)</script>';
        }
        echo $msg;
        exit;
    }
    // Common register
    $loginMsg = "INSERT INTO login (username,`password`) VALUES ('$userName','$encryptionPassword')";
    $userMsg = "INSERT INTO user (username,`password`,branch,teachername,limits,`Index`,class_number) VALUES ('$userName','$encryptionPassword','$Branch','$teacherName','$Auth_str','$User_Index','0')";
    $loginMsg_result = $db->query($loginMsg);
    $userMsg_result = $db->query($userMsg);

    if ($loginMsg_result) {
        $msg = '账号:'.$userName.',注册成功!<a href="../../../page/admin/index.html?nav=user&page=register">(3秒后自动返回)</a><script>setTimeout(function(){window.location="../../../page/admin/index.html?nav=user&page=register"},3000)</script>';
    }else {
        $msg = '注册失败!<a href="../../../page/admin/index.html?nav=user&page=register">点击此处返回</a>';
    }
    echo $msg;
}

?>