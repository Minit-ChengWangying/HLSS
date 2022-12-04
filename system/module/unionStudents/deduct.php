<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace Moduel\unionStudents;

session_start();

require('../Mysql/connectMysql.php');
include '../../../vendor/autoload.php';

use Module\Account\detectionLoginStateFunction;

// User Login
detectionLoginStateFunction::detectionLogin();

$Class = $_POST['class'];
$item = $_POST['item'];
$deduct = $_POST['deduct'];
$reason = $_POST['reason'];
$Time = time();



$DATESHEET = 'union';

// Limit
if ($item == 'NULL') {
    echo json_encode('Error:Please check the account status[LIMIT]');
    exit;
}

// get User branch
$Username = $_SESSION['loginState'];
$selcetUserBranch = "SELECT * FROM user where username = '$Username';";
$selcetUserBranch_result = $db->query($selcetUserBranch)->fetch_array( MYSQLI_ASSOC )['branch'];
if($selcetUserBranch_result == 'unionsport') {
    $DATESHEET = 'unionsport';
} else if($selcetUserBranch_result == 'unionhygene') {
    $DATESHEET = 'unionhygene';
} else {
    echo 'NoLimit!';
}

// get Class number
$selcetClass = "select * from class where Class='$Class'";
$selcetClass_result = $db->query($selcetClass)->fetch_array( MYSQLI_ASSOC );
if (!$selcetClass_result) {
    echo json_encode('请检查班级！');
    exit;
} else {
    $ClassScore = $selcetClass_result['Score'];
}

// get Union class score
$selcetUnionClassScore = "select * from $DATESHEET where Class='$Class'";
$selcetUnionClassScore_result = $db->query($selcetUnionClassScore)->fetch_array( MYSQLI_ASSOC );
if (!$selcetUnionClassScore_result) {
    echo json_encode('NULL');
    exit;
} else {
    $unionClassScore = $selcetUnionClassScore_result['Score'];
    //get Union item score
    $unionClassItemScore = $selcetUnionClassScore_result[$item];
}


$newUnionScore = $unionClassScore - $deduct;
$newItemScore = $unionClassItemScore - $deduct;
$newClassScore = $ClassScore - $deduct;

// count Union item score
$updateUnionItem = "update $DATESHEET set $item = '$newItemScore' where Class = '$Class';";
$updateUnionItem_result = $db->query($updateUnionItem);
if (!$updateUnionItem_result) {
    echo "Flase";
    exit;
}

// count UnionStudent score
$updateUnionScore = "update $DATESHEET set Score = '$newUnionScore' where Class = '$Class';";
$updateUnionScore_result = $db->query($updateUnionScore);
if (!$updateUnionScore_result) {
    echo "Flase";
    exit;
}

// count Class  score
$updateUnionItemScore = "update class set Score = '$newClassScore' where Class = '$Class';";
$updateUnionItemScore_result = $db->query($updateUnionItemScore);
if (!$updateUnionItemScore_result) {
    echo "Flase";
    exit;
}

$reasonDATESHEET = $DATESHEET . '_reason';
// record Deduct point reason
$recordUnionReason = "insert into $reasonDATESHEET (Class,TextReason,Time,Point) VALUE ('$Class','$reason','$Time','$deduct');";
$recordUnionReason_result = $db->query($recordUnionReason);
if (!$recordUnionReason_result) {
    echo 'Flase';
    exit;
}

echo json_encode('True');


?>