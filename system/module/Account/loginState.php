<?php
namespace Module\Account;

session_start();

$msg = '';

$msg = isset($_SESSION['loginState'])?true:false;
$msg?true:die(json_encode(false));

$user_arr = [
    'LoginState' => $msg,
    'Username' => $_COOKIE['Username'],
    'Index' => $_COOKIE['Index'],
    'AccountName' => $_COOKIE['TeacherName'],
    'Branch' => $_COOKIE['Branch'],
];

echo json_encode(array('error'=>'0','data'=>$user_arr));
?>