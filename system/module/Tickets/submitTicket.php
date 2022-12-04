<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace Module\Tickets;

require('../Mysql/connectMysql.php');

date_default_timezone_set('PRC'); 

$teacherName = $_POST['teachername'];
$ticketNumber = $_POST['ticketnumber'];

$selcet = "select * from cache where ticketNumber='$ticketNumber';";
$selcet_result = $db->query($selcet)->fetch_array( MYSQLI_ASSOC );

// 处理cache表没有的记录
if ($selcet_result == NULL) {
    echo json_encode("Error! 2000"); /* 2开头的状态码为数据库错误，2000错误为查询结果为空 */
    exit;
}

$Class = $selcet_result['Class'];
$studentName = $selcet_result['StudentName'];
$textReason = $selcet_result['TextReason'];
$imgReason = $selcet_result['ImgReason'];
$deductPoints = $selcet_result['DeductPoints'];
$Time = time();
$State = 'Flase';

// 查询此罚单是否为此教师记录
$selectTeacherName = "select * from cache where TeacherName='$teacherName' and ticketNumber='$ticketNumber';";
$selectTeacherName = $db->query($selectTeacherName);
if($selectTeacherName&&mysqli_num_rows($selectTeacherName)) {
    // echo json_encode("True");
}else {
	echo json_encode("Flase");
    exit;
}

// 查询违纪学生班级总分
$selcetScore = "select * from class where Class='$Class'";
$selcet_result = $db->query($selcetScore);
$Score = $selcet_result->fetch_array( MYSQLI_ASSOC )['Score'];

// 扣除班级总分表对应总分
$deductScore = $Score - $deductPoints;
$recordScore = "UPDATE class SET Score=$deductScore where Class='$Class'";
$recordScore_result = $db->query($recordScore);

// 记录在week表
$recordMajorMsg = "INSERT INTO week (StudentName,TextReason,ImgReason,TeacherName,Class,DeductPoints,Time,State,ticketNumber) 
VALUES 
('$studentName','$textReason','$imgReason','$teacherName','$Class','$deductPoints','$Time','$State','$ticketNumber');";
$recordMajorMsg_result = $db->query($recordMajorMsg);

// 记录在tickets表
$recordMsg = "INSERT INTO tickets (StudentName,TextReason,ImgReason,TeacherName,Class,DeductPoints,Time,State,ticketNumber) 
VALUES 
('$studentName','$textReason','$imgReason','$teacherName','$Class','$deductPoints','$Time','$State','$ticketNumber');";
$recordMsg_result = $db->query($recordMsg);

// 删除cache表中此条罚单
$deleteTicket = "DELETE FROM cache where ticketNumber = '$ticketNumber';";
$deleteTicket_result = $db->query($deleteTicket);
$selectCacheTicket = "select * from cache where ticketNumber='$ticketNumber'";
$selectCacheTicket_result = $db->query($selectCacheTicket)->fetch_array( MYSQLI_ASSOC );
if ( $selectCacheTicket_result == NULL ) {
    echo json_encode('True');
} else {
    echo json_encode('Flase');
}

?>