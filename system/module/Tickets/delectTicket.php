<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace Module\Tickets;

require('../Mysql/connectMysql.php');

if (isset($_COOKIE['TeacherName'])) {
    $teacherName = $_COOKIE['TeacherName'];
} else {
    echo "Fatel Errer!";
    exit;
}
if (isset($_POST['ticketnumber'])) {
    $ticketNumber = $_POST['ticketnumber'];
} else {
    echo "Fatel Errer!";
    exit;
}

// 查询是否存在删除的对应罚单
$selcet = "SELECT * FROM cache where ticketNumber = '$ticketNumber' and teacherName = '$teacherName';";
$selcet_result = $db->query($selcet)->fetch_array( MYSQLI_ASSOC );
if ($selcet_result == NULL) {
    echo "NULL"; /* 2开头的状态码为数据库错误，2000错误为查询结果为空 */
    exit;
}

// 删除对应罚单
$deleteTicket = "DELETE FROM cache where ticketNumber = '$ticketNumber';";
$deleteTicket_result = $db->query($deleteTicket);
$selectCacheTicket = "select * from cache where ticketNumber='$ticketNumber'";  /* 删除对应罚单后查询是否还存在 */
$selectCacheTicket_result = $db->query($selectCacheTicket)->fetch_array( MYSQLI_ASSOC );
if ( $selectCacheTicket_result == NULL ) { 
    echo json_encode('True');
} else {
    echo json_encode('Flase');
    exit;
}
?>