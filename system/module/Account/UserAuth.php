<?php
namespace Module\Account;

session_start();

require_once __DIR__ . '/../Mysql/connectMysql.php';

isset($_SESSION['loginState'])?true:die('login error');
$Limits = empty($_GET['auth'])?'null':trim($_GET['auth']);

$Username = $_SESSION['loginState'];

$selectUserLimits = "select * from user where username = '$Username' AND limits like '%$Limits%';";
$selectUserLimits_result = $db->query($selectUserLimits);

$auth_result = mysqli_num_rows($selectUserLimits_result);

if($auth_result < 1) {
    echo json_encode(false);
} else {
    echo json_encode(true);
}

?>