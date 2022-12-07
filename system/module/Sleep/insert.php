<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace Moduel\Sleep;

session_start();

require('../Mysql/connectMysql.php');
include '../../../vendor/autoload.php';

use Module\Account\detectionLoginStateFunction;

// User Login
detectionLoginStateFunction::detectionLogin();

$Class = $_POST['class'];
$sleepNumber = $_POST['sleepNumber'];
$item = $_POST['item'];
$Type = $_POST['type'];
$Time = time();

/**
 * 获取上报项
 * 优寝直接记录，差寝获取班级分数并减三记录表内
 */

// get TeacherName
$Teacher =  detectionLoginStateFunction::getTeacherName();

// good Sleep insert
if ($item == 'good') {
    $insertGoodSleep = "insert into goodsleep (SleepNumber,Class,Time,Teacher,SleepType) VALUE ('$sleepNumber','$Class','$Time','$Teacher','$Type');";
    // var_dump($insertGoodSleep);
    $insertGoodSleep_result = $db->query($insertGoodSleep);
    if (!$insertGoodSleep_result) {
        echo json_encode('上报失败！');
        
    } else {
        echo json_encode('True');
        exit;
    }
}

// get Class number
$selcetClass = "select * from class where Class='$Class'";
$selcetClass_result = $db->query($selcetClass)->fetch_array( MYSQLI_ASSOC );
if (!$selcetClass_result) {
    echo json_encode('请检查班级！');
    exit;
} else {
    $ClassScore = $selcetClass_result['Score'];
    $insertClassScore = $ClassScore - 3;
}

// bad Sleep insert
$insertBadSleep = "insert into badsleep (SleepNumber,Class,Time,Teacher,SleepType) VALUE ('$sleepNumber','$Class','$Time','$Teacher','$Type');";
$insertBadSleep_result = $db->query($insertBadSleep);
if (!$insertBadSleep_result) {
    echo json_encode('上报失败！');
    exit;
}

// count Class score
$updateClassScore = "update class set Score = '$insertClassScore' where Class = '$Class';";
$updateClassScore_result = $db->query($updateClassScore);
if (!$updateClassScore_result) {
    echo "上报失败！";
    exit;
}

echo json_encode('True');


?>