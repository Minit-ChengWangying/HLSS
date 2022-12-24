<?php
namespace User\update;

require_once('../../vendor/autoload.php');

use User\devhelp\user_login;

$Login = new user_login;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../src/lq/favicon.ico" rel="shortcut icon">
        <title>新乡县龙泉高中 - 更新密码</title>
        <link rel="stylesheet" href="../config/index.css">
        <link rel="stylesheet" href="../css/update_pwd_mobile.css">
    </head>
    <body class="flex cloumn">
        <div class="title-container flex shadow">
            <div class="flex"><h2>龙泉高中学分管理系统</h2></div>
        </div>
        <div class="content-container flex cloumn">
            <div class="form-input-container title flex">
                <h2 style="font-size: 1.5em;letter-spacing: 3px;">修改密码</h2>
            </div>
            <div class="form-input-container input topMargin flex">
                <p class="inputTitle">旧密码:</p><input type="text" id="oldPassword" class="minit-input" placeholder="请输入旧密码">
            </div>
            <div class="form-input-container input Margin flex">
                <p class="inputTitle">新密码:</p><input type="password" id="newPassword" class="minit-input" placeholder="请输入新密码">
            </div>
            <div class="form-input-container input Margin flex">
                <p class="inputTitle">请确认:</p><input type="password" id="confirmPassword" class="minit-input" placeholder="请再次输入新密码">
            </div>
            <div class="form-input-container button btnMargin flex">
                <button id="submit">提交</button>
            </div>
            <h2 class="fast">快速访问：</h2>
            <div class="fast-container flex">
                <a href="javascript:;" id="home">快捷访问</a>
            </div>
        </div>

        <script type="text/javascript" src="../../js/jquery.min.js"></script>
        <script src="submit.js" type="text/javascript"></script>
        <script>
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
            
            // Href
            $('#home').click(function() {
                window.location = '../index/index.php';
            })
        </script>
    </body>
</html>