<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace Module\Account;

require('../Mysql/connectMysql.php');

$userName = $_POST['username'];
$Password = $_POST['password'];
$Branch = $_POST['branch'];
$teacherName = $_POST['teachername'];

# 此处需要加一个空值过滤

$encryptionPassword = md5($Password);
// var_dump($encryptionPassword);

$selcet = "select * from login where username='$userName'";
$selcet_result = $db->query($selcet);
// 判断用户名是否重复
if($selcet_result&&mysqli_num_rows($selcet_result)) {
    echo "用户名存在！";
    exit;
}else {
    $loginMsg = "INSERT INTO login (username,password) VALUES ('$userName','$encryptionPassword')";
    $userMsg = "INSERT INTO user (username,password,branch,teacherName) VALUES ('$userName','$encryptionPassword','$Branch','$teacherName')";
    $loginMsg_result = $db->query($loginMsg);
    $userMsg_result = $db->query($userMsg);

    if ($loginMsg_result) {
        echo '成功';
    }else {
        echo '失败';
    }
    // echo $result;
}




?>