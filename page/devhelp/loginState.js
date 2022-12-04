// 获取登录状态
function loginState () {
    $.ajax({
        type:"get",
        url:"../../../system/module/Account/detectionLogin.php",
        data:{'code':1000},
        success:function(Info) {
            var Info = JSON.parse(Info);
            if (Info == 'Flase') {
                alert('登陆超时，请重新登录');
                window.location = '../login.html';
            }
            if (Info == 'True') {
                console.log('登录成功');
            }
        }
    });
}
loginState();
