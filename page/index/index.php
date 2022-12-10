<?php
namespace User;

include '../../vendor/autoload.php';

use User\devhelp\user_login;

$Login = new user_login;
$teacherName = $Login->getTeacherName();
$json_string = file_get_contents('../../config.json');
$data = json_decode($json_string, true);
$version = $data['version'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>快捷访问</title>
        <link href="../../src/lq/favicon.ico" rel="shortcut icon">
        <link href="../../layui/css/layui.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../config/index.css">
    </head>
    <body class="flex cloumn">
        <p>快捷访问</p>
        <a href="../ticket/recordTicket.php" class="shadow">创建罚单</a>
        <a href="../unionstudent/index.php" class="shadow">学生会扣分</a>
        <a href="../ticket/getCacheTickets.php" class="shadow">提交罚单</a>
        <a href="../sleep/index.php" class="shadow">寝室上报</a>
        <a href="javascript:;" onclick="Quit();" class="shadow">退出登录</a>
        <div class="system shadow">
            <p class="version">系统版本:<?php echo $version; ?></p>
        </div>


        <script src="../../layui/layui.js"></script>
        <script type="text/javascript" src="../../../js/jquery.min.js"></script>
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

            layui.use(['layer', 'form'], function(){
                var layer = layui.layer;
                var form = layui.form;
                
                layer.msg('欢迎登录,<?php echo $teacherName; ?>老师');
            });

            function Quit () {
                var popup = confirm('是否退出当前账户');
                if (popup == true) {
                    $.ajax({
                        type:"get",
                        url:"../../system/module/Account/quit.php",
                        success:function(Info) {
                            var Info = JSON.parse(Info);
                            console.log(Info);
                            // window.location = '../../index.php';
                            location.reload(true);
                        },
                        error:function(XMLHttpRequest, textStatus, errorThrown) {
                            alert('退出失败!');
                        }
                    });
                }
            }
        </script> 
    </body>
</html>