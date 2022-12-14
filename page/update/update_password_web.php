<?php
namespace User\update;

require_once('../../vendor/autoload.php');

use User\devhelp\user_login;

$Login = new user_login;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../src/lq/favicon.ico" rel="shortcut icon">
        <title>龙泉高中学分管理系统 - 更新密码</title>
        <link href="../../layui/css/layui.css" rel="stylesheet">
        <link rel="stylesheet" href="../config/index.css">
        <link rel="stylesheet" href="../css/update_pwd_web.css">
    </head>
    <body>
        <div class="Container flex cloumn">
            <div class="title-container flex shadow">
                <div class="title flex"><h2>龙泉高中学分管理系统</h2></div>
            </div>
            <div class="form-container flex cloumn shadow">
                <div class="form-input-container flex">
                    <h2 style="font-size: 1.5em;letter-spacing: 3px;">修改密码</h2>
                </div>
                <div class="form-input-container topMargin flex">
                    <p class="inputTitle">旧密码:</p><input type="text" id="oldPassword" class="minit-input" placeholder="请输入旧密码">
                </div>
                <div class="form-input-container topMargin flex">
                    <p class="inputTitle">新密码:</p><input type="password" id="newPassword" class="minit-input" placeholder="请输入旧密码">
                </div>
                <div class="form-input-container topMargin flex">
                    <p class="inputTitle">请确认:</p><input type="password" id="confirmPassword" class="minit-input" placeholder="请输入旧密码">
                </div>
                <div class="form-input-container topMargin flex">
                    <button id="submit">提交</button>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="../../js/jquery.min.js"></script>
        <script src="../../layui/layui.js"></script>
        <script src="submit.js" type="text/javascript"></script>
        <script>
            // Self-adaption
            if((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))){
                console.log('Mobile');
                alert('系统默认移动端无法访问此页面!');
                $.ajax({
                    type:"get",
                    url:"../../system/module/Account/quit.php",
                    success:function(Info) {
                        var Info = JSON.parse(Info);
                        console.log(Info);
                        location.reload(false);
                    }
                });
            } else{
                console.log('PC');
                
            }
        </script> 
    </body>
</html>