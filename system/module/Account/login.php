<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace Module\Account;

require('../Mysql/connectMysql.php');
require('../mode/blackList.php');

$Username = $_POST['account'];
$Password = $_POST['password'];

// Data validation
if($Username == '') {
    echo json_encode("输入值不能为空！");
    exit;  
}
if($Password == '') {
    echo json_encode("输入值不能为空！");
    exit;
}

$Password = str_replace($blackList, 'm', $Password);
$encryptionPassword = md5($Password);

$loginSQL = "select * from Login where username='$Username' and password='$encryptionPassword'";

$result = $db->query($loginSQL);

if($result&&mysqli_num_rows($result)) {
    // SESSION
    session_start();
    $_SESSION['loginState'] = $Username;
    
    // 返回用户数据
    $selectUserInfo = "select * from user where username='$Username'";
    $selectTicket_result = $db->query($selectUserInfo);
    $userInfo = $selectTicket_result->fetch_array( MYSQLI_ASSOC );
    $userArray = array(
        "LoginState" => "True",
        "teachername" => $userInfo['teachername'],
        "branch" => $userInfo['branch'],
        "username" => $userInfo['username'],
        "index" => $userInfo['Index'],
    );
    echo json_encode($userArray);

    // COOKIE
    setcookie("Username", $userInfo['username'], 0,'/');
    setcookie("TeacherName", $userInfo['teachername'], 0,'/');
    setcookie("Branch", $userInfo['branch'], 0,'/');
    setcookie("Index", $userInfo['Index'], 0,'/');
}else {
    $LoginStateArray = array(
        "LoginState" => "Flase",
    );
	echo json_encode($LoginStateArray);
}

?>