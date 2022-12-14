function Quit() {
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
$('#submit').click(function() {
    var oldPassword = document.getElementById('oldPassword').value;
    var newPassword = document.getElementById('newPassword').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    if(oldPassword == '' | newPassword == '' | confirmPassword == '') {
        alert('密码不能为空');
        throw SyntaxError('Password cannot be empty!');
    }
    if(newPassword != confirmPassword) {
        alert('两次密码不一致!');
        throw SyntaxError('The two passwords are inconsistent!');
    }
    if(oldPassword == confirmPassword) {
        alert('旧密码和新密码不能一致!');
        throw SyntaxError('The old password and the new password cannot be consistent!');
    }
    $.ajax({
        type:"post",
        url:"../../system/hlss.php?p=account/index",
        data:{'pwd':oldPassword,'npwd':newPassword},
        success:function(data) {
            var data = JSON.parse(data);
            if(data == 'true') {
                alert('修改成功!（即将退出账户）');
                Quit();
            }else {
                alert('修改失败!（您可以尝试检查旧密码是否输入正确，如果多次不行请联系系统管理员）');
            }
        }
    });
});