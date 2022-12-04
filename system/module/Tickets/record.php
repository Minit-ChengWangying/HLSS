<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace Module\Tickets;

session_start();
date_default_timezone_set('PRC'); /* 时区 */

require('../Mysql/connectMysql.php');
include '../../../vendor/autoload.php';

use Module\Account\detectionLoginStateFunction;

detectionLoginStateFunction::detectionLogin();
$teacherName = detectionLoginStateFunction::getTeacherName();

$Type = $_POST['type'];
$studentName = $_POST['studentname'];
$textReason = $_POST['textreason'];
$imgReason = $_POST['imgreason'];
$Class = $_POST['class'];
$deductPoints = $_POST['deductpoints'];
$Time = time();
$State = 'Flase';
$ticketNumber = rand(1000,9999);


// 查询罚单编号是否重复
$selectTicketNumber = "select count(*) from cache where ticketNumber = '$ticketNumber';";
$selectTicketNumber_result = $db->query($selectTicketNumber);
if ($selectTicketNumber_result == '0') {
    die('Error');
}


// 查询违纪学生班级总分
$selcetClass = "select * from class where Class='$Class'";
$selcetClass_result = $db->query($selcetClass)->fetch_array( MYSQLI_ASSOC );
if (!$selcetClass_result) {
    echo json_encode('NULL');
    exit;
}


// 重大违纪直接记录在tickets表
if ($Type == 'major') {
    $msgName = 'tickets';
    $ticketType = 'major';

    $selcetScore = "select * from class where Class='$Class'";
    // 查询违纪学生班级总分
    $selcet_result = $db->query($selcetScore);
    $Score = $selcet_result->fetch_array( MYSQLI_ASSOC )['Score'];

    // 扣除班级总分表对应总分
    $deductScore = $Score - $deductPoints;
    $recordScore = "UPDATE class SET Score=$deductScore where Class='$Class'";
    $recordScore_result = $db->query($recordScore);
    if ($recordScore_result) { /* 扣除总分成功 */ } else { 
        echo json_encode('Err! 960');
        exit; 
    }

    // 记录在week表
    $recordMajorMsg = "INSERT INTO week (StudentName,TextReason,ImgReason,TeacherName,Class,DeductPoints,Time,State,ticketNumber,tickettype) 
    VALUES 
    ('$studentName','$textReason','$imgReason','$teacherName','$Class','$deductPoints','$Time','$State','$ticketNumber','major');";
    $recordMajorMsg_result = $db->query($recordMajorMsg);
    if ($recordMajorMsg_result) { /* 记录成功 */ } else {
        echo json_encode('Err! 960');
        exit; 
    }
} else {
    // 普通违纪记录在cache表
    $msgName = 'cache';
    $ticketType = 'common';
}

// 记录在对应表
$recordMsg = "INSERT INTO $msgName (StudentName,TextReason,ImgReason,TeacherName,Class,DeductPoints,Time,State,ticketNumber,tickettype) 
VALUES 
('$studentName','$textReason','$imgReason','$teacherName','$Class','$deductPoints','$Time','$State','$ticketNumber','$ticketType');";
$recordMsg_result = $db->query($recordMsg);

if ($recordMsg_result) {
    echo json_encode('True');
}else {
    echo json_encode('Flase');
}
?>
