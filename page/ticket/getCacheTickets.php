<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace Module\Account;

require('../config/connectMysql.php');
include '../../vendor/autoload.php';

date_default_timezone_set('PRC'); 

use User\devhelp\user_login;
use User\devhelp\user_limits;
use User\config\getLimitJson;

$Login = new user_login;
$Limits = new user_limits;

$LimitName = getLimitJson::get('getCacheTickets');
$Limits_result = $Limits->Limits($LimitName);
if ($Limits_result == 'NoLimit') {
    die('<h2>请联系系统管理员申请访问</h2>');
}

$Username = $Login->getUsername();
$TeacherName = $Login->getTeacherName();

// 查询
$selectTicket = "select * from cache  where teacherName='$TeacherName' ORDER BY id DESC;";
$selectTicket_result = $db->query($selectTicket);
$dataResult =  $selectTicket_result->fetch_array( MYSQLI_ASSOC );

// 循环数据
$selectCacheTicket = "select * from cache  where teacherName='$TeacherName' ORDER BY id DESC;";
$selectCacheTicket_result = $db->query($selectCacheTicket);

$rows = [];

while ($row = $selectCacheTicket_result->fetch_array( MYSQLI_ASSOC )) {
    $rows[] = $row;
}

$a = 1;
$c = 1;
$d = 1;
$e = 1;
$f = 1;
$g = 1;
$h = 1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../src/lq/favicon.ico" rel="shortcut icon">
    <title>罚单管理</title>
    <link rel="stylesheet" href="../css/getCacheTicket.css">
    <link rel="stylesheet" href="../config/index.css">
</head>
<body class="flex cloumn"><div class="quickAccess flex cloumn">
        <div class="record shadow flex" onclick="record();"><h2>创建罚单</h2></div>
        <div class="account shadow flex" onclick="account();"><h2>快捷访问</h2></div>
    </div>
    <p id="none" style="font-size: 2em;margin-top: 20px;"></p>

    <div class="loading" id="loading"><h3>正在操作请稍后...</h3></div>

    <?php
    foreach ($rows as $row) {
    ?>
        <div class="ticket_container flex cloumn" id="container">
            <div class="ticket flex cloumn">
                    <p class="Time"><?php echo date( "Y-m-d H:i:s",$row['Time']); ?></p>
                    <p class="studentName"><?php echo $row['StudentName']; ?></p>
                    <p class="Reason">罚单原因：<?php echo $row['TextReason']; ?></p>
                    <p class="Class">学生班级：<?php echo $row['Class']; ?></p>
                    <p class="deductPoints">扣除分数：<?php echo $row['DeductPoints']; ?></p>  
                    <p class="ticketNumber">罚单编号：<span id="Number_<?php if ( $row != 0) {echo $a;} $a++; ?>"><?php echo $row['ticketNumber']; ?></span></p>
            </div>
            <button id="submit" onclick="Submit_<?php if ( $row != 0) {echo $c;} $c++; ?>();" class="shadow" style="background-color: #0984e3;">提交</button>
            <button id="delete" onclick="Delete_<?php if ( $row != 0) {echo $f;} $f++; ?>();" class="shadow" style="background-color: #d63031;">删除</button>
        </div>
    <?php
    }
    ?>

    <div class="bottom"></div>

    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script>
        function get () {
            alert('Hello');
        }

        // Self-adaption
        if((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))){
            console.log('Mobile');
        } else{
            console.log('PC');
            alert('系统默认电脑端无法访问此页面!');
            $.ajax({
                type:"get",
                url:"../../system/module/Account/quit.php",
                success:function(Info) {
                    var Info = JSON.parse(Info);
                    console.log(Info);
                    location.reload(false);
                }
            });
        }

        // href
        function record () {
            window.location = "recordTicket.php";
        }
        function account () {
            window.location = "../index/index.php";
        }

        // operation
        <?php
        foreach ($rows as $row) {
        ?>
        // 提交罚单
        function Submit_<?php if ( $row != 0) {echo $e;} $e++; ?> () {
            var Number = document.getElementById('Number_<?php if ( $row != 0) {echo $d;} $d++; ?>').innerHTML;
            console.log(Number);
            $.ajax({
                type:"post",
                url:"../../system/module/Tickets/submitTicket.php",
                data:{'teachername':'<?php echo $TeacherName; ?>','ticketnumber':Number},
                beforeSend:function(XMLHttpRequest){
                    // alert('远程调用开始...');
                    var content = document.getElementsByClassName('ticket_container');
                    for( i = 0; i < content.length; i++ ) {
                        content.item(i).style.display = "none";
                    }
                    document.getElementById('loading').style.display = "block";
                },
                success:function(Info) {
                    var Info = JSON.parse(Info);
                    if (Info = 'True') {
                        // 自动刷新页面
                        alert('提交成功');
                        location.reload(true);
                    }
                },
                error:function(XMLHttpRequest, textStatus, errorThrown) {
                    var content = document.getElementsByClassName('ticket_container');
                    for( i = 0; i < content.length; i++ ) {
                        content.item(i).style.display = "flex";
                    }
                    document.getElementById('loading').style.display = "none";
                    alert('Error Code[' + XMLHttpRequest.status + ']Error Message[' + XMLHttpRequest.readyState + ']Server[' + textStatus + ']');
                }
            });
        }
        
        // 删除罚单
        function Delete_<?php if ( $row != 0) {echo $g;} $g++; ?> () {
            var Number = document.getElementById('Number_<?php if ( $row != 0) {echo $h;} $h++; ?>').innerHTML;
            console.log(Number);
            $.ajax({
                type:"post",
                url:"../../system/module/Tickets/delectTicket.php",
                data:{'ticketnumber':Number},
                beforeSend:function(XMLHttpRequest){
                    // alert('远程调用开始...');
                    var content = document.getElementsByClassName('ticket_container');
                    for( i = 0; i < content.length; i++ ) {
                        content.item(i).style.display = "none";
                    }
                    document.getElementById('loading').style.display = "block";
                },
                success:function(Info) {
                    var Info = JSON.parse(Info);
                    if (Info = 'True') {
                        // 自动刷新页面
                        alert('删除成功');
                        location.reload(true);
                    }
                },
                error:function(XMLHttpRequest, textStatus, errorThrown) {
                    var content = document.getElementsByClassName('ticket_container');
                    for( i = 0; i < content.length; i++ ) {
                        content.item(i).style.display = "flex";
                    }
                    document.getElementById('loading').style.display = "none";
                    alert('Error Code[' + XMLHttpRequest.status + ']Error Message[' + XMLHttpRequest.readyState + ']Server[' + textStatus + ']');
                }
            });
        }
        <?php
        }
        ?>

        
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            // document.write("移动")
        } else {
            // document.write("PC")
        }
    </script>
    <?php
    if (!$dataResult) {
        echo "<script>var none = document.getElementById('none'); none.innerHTML = '没有未提交的罚单';</script>";
    }
    ?>
</body>
</html>