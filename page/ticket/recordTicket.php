<?php
namespace User\ticket;

include '../../vendor/autoload.php';
require('../devhelp/getClass.php');

use User\devhelp\user_login;
use User\devhelp\user_limits;
use User\config\getLimitJson;

$Login = new user_login;
$Limits = new user_limits;
$teacherName = $Login->getTeacherName();
$LimitName = getLimitJson::get('recordTicket');
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
    <link href="../../src/lq/favicon.ico" rel="shortcut icon">
    <title>新乡县龙泉高中 - 创建罚单</title>
    <link rel="stylesheet" href="../css/recordTicket.css">
</head>
<body class="flex">
    <div class="flex container" id="container">
        <div class="flex lq_logo">
            <div class="flex logo">新乡县龙泉高级中学</div>
        </div>
        <div class="flex column ticket_container">
            <div class="flex ticketText">创建罚单</div>
            <div class="flex column ticketContent">
                <div class="flex account">欢迎你，<p id="teacherName"><?php echo $teacherName; ?></p></div>
                <div>学生姓名：<input type="text" id="studentName" placeholder="张三" style="width: 50vw;"></div>
                <div>开单原因：<input type="text" id="textReason" placeholder="餐厅讲话" style="width: 50vw;"></div>
                <div>学生班级：<select id="select" class="selectItem">
                    <?php
                        foreach ($rows as $row) {
                            $Info = array(
                                "Class" => $row['Class']
                            );
                            echo '<option value=' . $Info['Class'] . '>' . $Info['Class'] . '</option>';
                        }
                    ?>
                </select></div>
                <div>扣除分数：<input type="text" onkeyup="value=value.replace(/[^\d]/g,'') " id="deductPoints" placeholder="5" style="width: 50vw;"></div>
                <div>重大违纪：<input type="radio" id="Major" name="major" checked="true" value="major">是&emsp;<input type="radio" name="major" checked="true" value="null">否</div>
                <div><button onclick="submitTicket();">提交罚单</button></div>
                <!-- <div style="font-size: 14pt;">注意：普通罚单并不会直接提交需要进入罚单管理页面提交，当天提交的普通罚单会在每天晚上十一点自动提交，重大罚单会直接提交</div> -->
                
                <div class="fast flex column">
                    <h2>快速访问：</h2>
                    <div class="flex"> 
                        <a href="../index/index.php">快捷访问</a>
                        <a href="getCacheTickets.php">罚单管理</a>
                    </div>
                </div>
            </div>
            <!-- <div class="bottom"></div> -->
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

        /* 提交罚单 */
        function submitTicket () {
            var options = $("#select option:selected");
            // alert(options.val());
            var type = $('input:radio[name="major"]:checked').val();
            var studentName = document.getElementById('studentName').value;
            var textReason = document.getElementById('textReason').value;
            var deductPoints = document.getElementById('deductPoints').value;
            // console.log(studentName);
            if (studentName == '' | textReason == '' | deductPoints == '') {
                alert('请检查内容！');
                throw SyntaxError('check content'); // 停止并且抛出错误
            }
            $.ajax({
                type:"post",
                url:"../../system/module/Tickets/record.php",
                data:{'studentname':studentName,'textreason':textReason,"imgreason":'flase','class':options.val(),'deductpoints':deductPoints,'type':type},
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
                        alert('创建成功!');
                        location.reload(true);
                    } else {
                        alert('创建失败！');
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