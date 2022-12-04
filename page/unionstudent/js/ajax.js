/* 教师姓名 */
$.ajax({
    type:"get",
    url:"../../../system/module/Account/detectionLogin.php",
    data:{'code':'1002'},
    success:function(Info) {
        var Info = JSON.parse(Info);
        document.getElementById('teacherName').innerText = Info;
    }
});
/* 鉴权 */
$.ajax({
    type:"get",
    url:"../../../system/module/Account/detectionLogin.php",
    data:{'code':'1003'},
    success:function(Info) {
        var Info = JSON.parse(Info);
        console.log(Info);
        if (Info != 'unionsport' && Info != 'admin') {
            alert('请联系系统管理员申请进行操作！');
            window.location = '../index.html';
        }
    }
});
