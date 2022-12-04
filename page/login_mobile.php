<?php
session_start();
if (isset($_SESSION['loginState'])) {
    echo "<script>alert('您已登录');location.href=" . "'" . $_COOKIE['Index'] . "'" . ";</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../src/lq/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/login_mobile.css">
    <link rel="stylesheet" href="config/index.css">
    <title>龙泉高中学分管理系统 - 系统登录</title>
</head>
<body>

    <div class="flex cloumn container">
        <div class="flex shadow top_container">
            <div class="flex"><h2>龙泉高中学分管理系统</h2></div>
        </div>
        <div class="flex cloumn shadow login_container">
            <h2>登录系统</h2>
            <input type="text" id="username" class="shadow" placeholder="用户名">
            <input type="password" id="password" class="shadow" placeholder="密码">
            <button id="login" class="shadow">提交</button>
        </div>
    </div>

    

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script>
        if((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))){
            console.log('Mobile');
        } else{
            console.log('PC');
            window.location ='login_web.php';
        }


        // Login
        $('#login').click(
        function Login() {
            var account = $('#username').val();
            var password = $('#password').val();

            if(account == undefined||account == '') {
                alert('账号不能为空！');
                return false;
            }
            if(password == undefined||password == '') {
                alert('密码不能为空！');
                return false;
            }

            $.ajax({
                type:"post",
                url:"../system/module/Account/login.php",
                data:{'account':account,'password':password},
                success:function(loginInfo) {
                    var Info = JSON.parse(loginInfo);

                    if( Info['LoginState'] == 'True' ) {
                        console.log("True");
                        window.location = Info['index'];
                    } else if ( Info['LoginState'] = "False") {
                        console.log("Flase");
                        alert('请检查用户名或密码！');
                    } else {
                        alert( Info );
                    }
                },
                error:function(XMLHttpRequest, textStatus, errorThrown) {
                    alert('Error Code[' + XMLHttpRequest.status + ']Error Message[' + XMLHttpRequest.readyState + ']Server[' + textStatus + ']');
                }
            });
        }
    );
    </script>
</body>
</html>