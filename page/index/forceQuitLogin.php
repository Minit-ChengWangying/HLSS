<?php
session_start();
define('SUCCESS','<h1 style="margin: 20px auto;">Successful!</h1>');
define('FAIL','<h1 style="margin: 20px auto;">Fail!</h1>');

// 注销SESSION
unset($_SESSION['loginState']);
session_destroy();
setcookie("Username", "" , time()-1, '/');
setcookie("TeacherName", '', time()-1, '/');
setcookie("Branch", '', time()-1, '/');
setcookie("Index", '', time()-1, '/');
if (isset($_SESSION['loginState'])) {
    echo constant('FAIL');
} else {
    echo constant('SUCCESS');
}
?>