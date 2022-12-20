// Qiut Login
function Quit() {
    $.ajax({
        type:"get",
        url:"../../system/module/Account/quit.php",
        success:function(data) {
            var data = JSON.parse(data);
            console.log(data);
            location.reload(false);
        }
    });
}
// Login detection
$.get('../../../system/module/Account/loginState.php',function(data) {
    if(data == false) {
        alert('登录状态过期，请重新登录');
        window.location = "../../index.php";
    }   
},"json");
// Auth detection
var auth = document.getElementById('auth').value;
$.get('../../../system/module/Account/UserAuth.php',{'auth':auth},function(data) {
    if(data == false) {
        alert('您的账号无权访问此内容!');
        Quit();
    }
},"json");

