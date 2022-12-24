<?php
namespace Account\mode;

session_start();

isset($_SESSION['loginState'])?true:die('login error');

function detection_auth($auth_name,$db) {
    $Username = $_SESSION['loginState'];

    $selectUserLimits = "select * from user where username = '$Username' AND limits like '%$auth_name%';";
    $selectUserLimits_result = $db->query($selectUserLimits);

    $auth_result = mysqli_num_rows($selectUserLimits_result);

    if($auth_result < 1) {
        return false;
    } else {
        return true;
    }
}
?>