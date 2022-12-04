<?php
session_start();

// 注销SESSION
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


// echo 'Hello';
?>