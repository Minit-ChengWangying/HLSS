<?php
namespace User\unionstudent;

include '../../vendor/autoload.php';
require('../devhelp/getClass.php');

use User\devhelp\user_login;
use User\devhelp\user_limits;
use User\config\getLimitJson;

$Login = new user_login;
$Limits = new user_limits;
$teacherName = $Login->getTeacherName();
$LimitName = getLimitJson::get('unionindex');
// echo $LimitName;
$Limits_result = $Limits->Limits($LimitName);
if ($Limits_result == 'NoLimit') {
    die('<h2>请联系系统管理员申请访问</h2><h2><a href="../index.php">快捷访问</a></h2>');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新乡县龙泉高中 - 学生会</title>
    <link href="../../src/lq/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="../css/unionstu_index.css">
</head>
<body class="flex">
    <div class="flex container" id="container">
        <div class="flex lq_logo">
            <div class="flex logo">新乡县龙泉高级中学</div>
        </div>
        <div class="flex column ticket_container">
            <div class="flex ticketText">学生会</div>
            <div class="flex column ticketContent">
                <div class="flex account">欢迎你，<p id="teacherName"><?php echo $teacherName; ?></p></div>
                <div>扣除分数：<input type="text" onkeyup="value=value.replace(/[^\d]/g,'') " id="deduct" placeholder="5" style="width: 50vw;"></div>
                <div>扣分原因：<input type="text" id="textReason" placeholder="你随意" style="width: 50vw;"></div>
                <div>扣分班级：<select id="selectClass" class="selectItem">
                    <?php
                        foreach ($rows as $row) {
                            $Info = array(
                                "Class" => $row['Class']
                            );
                            echo '<option value=' . $Info['Class'] . '>' . $Info['Class'] . '</option>';
                        }
                    ?>
                </select></div>
                <div>扣分项目：<select id="select" class="selectItem">
                    <?php
                        if ($Login->getBranch() == 'unionsport') {
                            echo '<option value="StandardBearer">旗手</option>';
                            echo '<option value="Queue">队列</option>';
                            echo '<option value="Slogan">口号</option>';
                        } else if ($Login->getBranch() == 'unionhygene') {
                            echo '<option value="Area">清洁区</option>';
                            echo '<option value="Classroom">教室</option>';
                        } else {
                            echo '<option value="NULL">NULL</option>';
                        }
                    ?>
                </select></div>
                <div><button onclick="submitTicket();">提交</button></div>
                <div class="fast flex column">
                    <h2>快速访问：</h2>
                    <a href="../index.php">快捷访问</a>
                </div>
            </div>
        </div>
    </div>

    <div class="loading" id="loading"><h3>正在提交请稍后...</h3></div>

    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script>
        // Self-adaption
        if((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))){
            console.log('Mobile');
        } else{
            console.log('PC');
            alert("推荐使用手机访问此页面否则可能会出现显示问题");
        }

        function submitTicket() {
            // 获取下拉框内容
            var options = $("#select option:selected");
            var optionsClass = $("#selectClass option:selected");
            // alert(optionsClass.val());

            var textReason = document.getElementById('textReason').value;
            var deduct = document.getElementById('deduct').value;
            // 过滤空值
            if (textReason == '' | deduct == '') {
                alert('请检查内容！');
                throw SyntaxError('check content');
            }
            $.ajax({
                type:"post",
                url:"../../system/module/unionStudents/deduct.php",
                data:{'class':optionsClass.val(),'deduct':deduct,"item":options.val(),'reason':textReason},
                beforeSend:function(XMLHttpRequest){
                    // alert('远程调用开始...');
                    document.getElementById('container').style.display = "none";
                    document.getElementById('loading').style.display = "block";
                },
                success:function(Info) {
                    document.getElementById('container').style.display = "flex";
                    document.getElementById('loading').style.display = "none";
                    var Info = JSON.parse(Info);
                    console.log(Info);
                    if (Info == 'True') {
                        alert('扣除成功');
                        location.reload(true);
                    } else if (Info == 'Flase') {
                        alert('请检查内容是否填写正确！');
                    } else {
                        alert(Info);
                    }
                },
                error:function(XMLHttpRequest, textStatus, errorThrown) {
                    document.getElementById('container').style.display = "flex";
                    document.getElementById('loading').style.display = "none";
                    alert('Error Code[' + XMLHttpRequest.status + ']Error Message[' + XMLHttpRequest.readyState + ']Server[' + textStatus + ']');
                }
            });
        }
    </script>
</body>
</html>