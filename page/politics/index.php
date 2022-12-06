<?php
namespace User\ticket;

include '../../vendor/autoload.php';
require('../devhelp/getClass.php');
require('../config/connectMysql.php');
require('module/queryUnion.php');
require('module/queryClass.php');

use User\devhelp\user_login;
use User\devhelp\user_limits;
use User\config\getLimitJson;

$Login = new user_login;
$Limits = new user_limits;
$teacherName = $Login->getTeacherName();
$LimitName = getLimitJson::get('politics');
$Limits_result = $Limits->Limits($LimitName);
if ($Limits_result == 'NoLimit') {
    die('<h2>请联系系统管理员申请访问</h2><h2><a href="../index.php">快捷访问</a></h2>');
}

$json_string = file_get_contents('../../config.json');
$data = json_decode($json_string, true);
$version = $data['version'];
$softwareName = $data['SystemName'];
$a = 1;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../src/lq/favicon.ico" rel="shortcut icon">
        <title>新乡县龙泉高中 - 政教处</title>
        <link rel="stylesheet" href="../../layui/css/layui.css">
        <link rel="stylesheet" href="../css/politicsindex.css">
        <link rel="stylesheet" href="../config/index.css">
        <link rel="stylesheet" href="../css/politicsTickets.css">
        <link rel="stylesheet" href="../config/minitPopup.css">
        <link rel="stylesheet" href="../css/politicsUnion.css">
    </head>
    <body>
        <div class="minit-popup-container" id="minitPopUp"></div>
        <!-- 顶部导航栏 -->
        <ul class="layui-nav">
            <li class="layui-nav-item" id="consolemodule" onclick="consolemodule();"><a href="javascript:;">控制台</a></li>
            <li class="layui-nav-item" id="tickets" onclick="tickets();"><a href="javascript:;">罚单<span class="layui-badge" id="newTicketSpan"></span></a></li>
            <li class="layui-nav-item" id="unionstudent" onclick="unionstudent();"><a href="javascript:;">学生会</a></li>
            <li class="layui-nav-item" onclick="sleep();"><a href="javascript:;">寝室</a></li>
            <li class="layui-nav-item" onclick="bonuspoints();"><a href="javascript:;">加分</a></li>
            <li class="layui-nav-item" onclick="classdetails();"><a href="javascript:;">班级详情</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;"><img src="
https://minitbeijingproduction.oss-cn-beijing.aliyuncs.com/LHSS/resources/public/user.png" class="layui-nav-img"><?php echo $teacherName; ?></a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;">修改密码</a></dd>
                    <dd><a href="javascript:;" onclick="Quit();">退出登录</a></dd>
                </dl>
            </li>
        </ul>
        <!-- 内容 -->
        <div class="minit-container flex" id="content-container">
            <!-- 学生会 -->
            <div class="unionContent-container flex cloumn shadow" id="unionContent-container">
                <h2 class="unionTitle">学生会班级分数</h2>
                <div class="union-title-container flex">
                    <form action="" lay-verify="" class="layui-form union-item-form">
                        <select id="unionItemSelect" lay-filter="unionItemSelect" name="quiz1"  lay-search="" class="unionItem">
                            <option value="NULL">请选择班级</option>
                                    <?php
                                        echo '<option value=' . $firstClass . ' selected>' . $firstClass . '</option>';
                                        foreach ($rows as $row) {
                                            echo '<option value=' . $row['Class'] . '>' . $row['Class'] . '</option>';
                                        }
                                    ?>
                        </select>
                    </form>   
                    <button class="layui-btn unionQueryButton" lay-submit lay-filter="formDemo" onclick="unionModuleQuery();">查询</button>
                </div>
                <div class="unionModule-score-container flex cloumn">
                    <p class="unionModuleScoreTitle">学生会体育部分数详情</p>
                    <table class="layui-table unionModuleTable">
                        <thead>
                            <tr>
                                <th>旗手</th>
                                <th>队列</th>
                                <th>口号</th>
                                <th>总分</th>
                            </tr> 
                        </thead>
                        <tbody>
                            <tr>
                                <td id="moduleStandardBearer">NULL</td>
                                <td id="moduleQueue">NULL</td>
                                <td id="moduleSlogan">NULL</td>
                                <td id="modulesportScore">NULL</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="unionModule-score-container flex cloumn">
                <p class="unionModuleScoreTitle">学生会卫生部分数详情</p>
                    <table class="layui-table unionModuleTable">
                        <thead>
                            <tr>
                                <th>清洁区</th>
                                <th>教室</th>
                                <th>总分</th>
                            </tr> 
                        </thead>
                        <tbody>
                            <tr>
                                <td id="modulearea">NULL</td>
                                <td id="moduleclass">NULL</td>
                                <td id="modulehygieneScore">NULL</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="unionModule-reason-container flex cloumn">
                    <p class="unionModuleScoreTitle">学生会体育部班级扣分详情</p>
                    <div class="unionModule-item-reason-container flex cloumn" id="unionModuleSportReason">
                        <div class="unionModule-log-rason-container flex">
                            <p>班级:<span id="unionModuleSportReasonClass">126</span></p>
                            <p>扣分原因:<span id="unionModuleSportReasonText">步伐不齐</span></p>
                            <p>扣分时间:<span id="unionModuleSportReasonTime">2022/12/5 22:53</span></p>
                            <p>扣除分数:<span id="unionModuleSportReasonPoints">5</span></p>
                        </div>
                    </div>
                    <p class="unionModuleScoreTitle unionModuleTitle">学生会卫生部班级扣分详情</p>
                    <div class="unionModule-item-reason-container flex cloumn"  id="unionModuleHygieneReason">
                        <div class="unionModule-log-rason-container flex">
                            <p>班级:<span id="unionModuleHygieneReasonClass">126</span></p>
                            <p>扣分原因:<span id="unionModuleHygieneReasonText">步伐不齐</span></p>
                            <p>扣分时间:<span id="unionModuleHygieneReasonTime">2022/12/5 22:53</span></p>
                            <p>扣除分数:<span id="unionModuleHygieneReasonPoints">5</span></p>
                        </div>
                    </div>
                </div>
                <div class="unionModuleButtom flex"></div>
            </div>

            <!-- 罚单 -->
            <div class="ticketContent-container flex cloumn" id="ticketContent-container">
                <div class="search-container flex">
                    <input type="text" name="title" required  lay-verify="required" placeholder="输入信息以查询罚单" autocomplete="off" id="ticketModuleSearchFrame" class="layui-input minit-search flex shadow">
                    <div class="ticket-search-select-container flex">
                        <form action="" lay-verify="" class="layui-form minit-search-select">
                            <select id="ticketSearchSelect" lay-filter="ticketModuleSearch" name="quiz1" class="searchSelect">
                                <option value="NULL">请选择一个查询条件</option>
                                <option value="StudentName" selected>学生姓名</option>
                                <option value="TextReason">罚单原因</option>
                                <option value="TeacherName">开单教师</option>
                                <option value="Class">开单班级</option>
                            </select>
                        </form>   
                    </div>
                    <button class="layui-btn minit-button shadow" lay-submit lay-filter="formDemo" onclick="ticketModuleSearch();">查询</button>
                </div>
                <div class="tickets-container flex cloumn shadow">
                    <form action="" lay-verify="" class="layui-form minit-select">
                        <select id="ticketSelect" lay-filter="ticketModule" name="quiz1" class="">
                            <option value="week" selected>本周罚单</option>
                            <option value="semester">学期罚单</option>
                            <option value="majorWeek">本周重大违纪罚单</option>
                            <option value="major">重大违纪罚单</option>
                        </select>
                    </form>
                    <table class="layui-table unionTable">
                        <thead>
                            <tr>
                                <th>学生姓名</th>
                                <th>原因</th>
                                <th>开单教师</th>
                                <th>学生班级</th>
                                <th>扣除分数</th>
                                <th>开单时间</th>
                                <th>罚单编号</th>
                                <th>罚单类型</th>
                            </tr> 
                        </thead>
                        <tbody id="ticketList">
                            <tr>
                                <td id="">NULL</td>
                                <td id="">NULL</td>
                                <td id="">NULL</td>
                                <td id="">NULL</td>
                                <td id="">NULL</td>
                                <td id="">NULL</td>
                                <td id="">NULL</td>
                                <td id="">NULL</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>



            <!-- 左侧内容 -->
            <div class="left-container flex cloumn shadow" id="left-container">
                <!-- 罚单 -->
                <div class="ticket-container flex cloumn">
                    <h2>罚单概览</h2>
                    <div class="ticket-information-container flex">
                        <div class="ticket-number-container flex">
                            <div class="ticket-number-a-container flex cloumn">
                                <span id="newTicket">NULL</span><a href="javascript:;"><p>新增罚单</p></a>
                            </div>
                            <div class="ticket-number-a-container flex cloumn">
                                <span id="newMajorTicket">NULL</span><a href="javascript:;"><p>新增重大违纪</p></a>
                            </div>
                            <div class="ticket-number-a-container flex cloumn">
                                <span id="weekTicket">NULL</span><a href="javascript:;"><p>本周罚单总数</p></a>
                            </div>
                            <div class="ticket-number-a-container flex cloumn">
                                <span id="weekMajorTicket">NULL</span><a href="javascript:;"><p>本周重大违纪总数</p></a>
                            </div>
                            <div class="ticket-number-a-container flex cloumn">
                                <span id="Ticket">NULL</span><a href="javascript:;"><p>学期罚单总数</p></a>
                            </div>
                            <div class="ticket-number-a-container flex cloumn">
                                <span id="majorTicket">NULL</span><a href="javascript:;"><p>学期重大违纪总数</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- 学生会 -->
                <div class="union-container flex cloumn">
                    <div class="union-sport-container flex cloumn">
                        <!-- 学生会体育部班级下拉框 -->
                        <h2>学生会体育部</h2>
                        <div class="union-class-container flex">
                            <form action="" class="layui-form unionClassSelect">
                                <select id="sportUnionSelect" name="quiz1" class="" lay-search="">
                                    <option value="NULL">请选择班级</option>
                                    <?php
                                        echo '<option value=' . $firstClass . ' selected>' . $firstClass . '</option>';
                                        foreach ($rows as $row) {
                                            echo '<option value=' . $row['Class'] . '>' . $row['Class'] . '</option>';
                                        }
                                    ?>
                                </select>
                            </form>
                            <button class="layui-btn unionClassButton" lay-submit lay-filter="formDemo" onclick="sport();">刷新</button>
                        </div>
                        <!-- 学生会体育部分数详情表格 -->
                        <div class="union-score-container flex">
                            <table class="layui-table unionTable">
                                <colgroup>
                                    <!-- <col width="150">
                                    <col width="200"> -->
                                    <!-- <col> -->
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>旗手</th>
                                        <th>队列</th>
                                        <th>口号</th>
                                        <th>总分</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="StandardBearer">NULL</td>
                                        <td id="Queue">NULL</td>
                                        <td id="Slogan">NULL</td>
                                        <td id="sportScore">NULL</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="union-hygiene-container flex cloumn">
                        <!-- 学生会卫生部班级下拉框 -->
                        <h2>学生会卫生部</h2>
                        <div class="union-class-container flex">
                            <form action="" class="layui-form unionClassSelect">
                            <select id="hygieneUnionSelect" name="quiz1" class="" lay-search="">
                                    <option value="NULL">请选择班级</option>
                                    <?php
                                        echo '<option value=' . $firstClass . ' selected>' . $firstClass . '</option>';
                                        foreach ($rows as $row) {
                                            echo '<option value=' . $row['Class'] . '>' . $row['Class'] . '</option>';
                                        }
                                    ?>
                                </select>
                            </form>
                            <button class="layui-btn unionClassButton" lay-submit lay-filter="formDemo" onclick="hygiene();">刷新</button>
                        </div>
                        <!-- 学生会卫生部分数详情表格 -->
                        <div class="union-score-container flex">
                            <table class="layui-table unionTable">
                                <colgroup>
                                    <!-- <col width="150">
                                    <col width="200">
                                    <col> -->
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>清洁区</th>
                                        <th>教室</th>
                                        <th>总分</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="area">NULL</td>
                                        <td id="class">NULL</td>
                                        <td id="hygieneScore">NULL</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="left-bottom-container flex">
                    <p class="Slogan">迷小软件 - 用心创作软件|系统版本:<?php echo $version; ?>|软件名称:<?php echo $softwareName; ?></p>
                </div>
            </div>

            <!-- 右侧内容 -->
            <div class="right-container flex cloumn shadow" id="right-container">
                <div class="right-title-container flex">
                    <h2>班级实时排行</h2><p class="updateTime">刷新时间:<?php echo date( "Y-m-d H:i:s",$refreshTime); ?></p>
                </div>
                <div class="right-class-container flex cloumn">
                    <?php
                        foreach ($classRows as $classRow) {
                            $classScoreArray = array(
                                "Class" => $classRow['Class'],
                                "Score" => $classRow['Score']
                            );
                            echo '<div class="right-classinformation-container flex">';
                            echo '<div class="classNumber flex"><p class="Rank">' . $a . '</p><p>Class:' . $classRow['Class'] . '</p></div>';
                            echo '<div class="Score"><p>Score:' . $classRow['Score'] . '</p></div> ';
                            echo '</div>';
                            echo '<hr class="ClassHr">';
                            $a++;
                        }
                    ?>
                </div>
            </div>
        </div>
            
        
        <script type="text/javascript" src="../../js/jquery.min.js"></script>
        <script type="text/javascript" src="../config/minitPopup.js"></script>
        <script src="../../layui/layui.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>                         
        <script type="text/javascript" src="js/nav.js"></script>     
        <script>
            // 禁止X轴滚动条
            document.body.parentNode.style.overflowX = "hidden";
            // 获取GET值
            function getUrlParam(paramName){
                var reg = new RegExp("(^|&)"+ paramName +"=([^&]*)(&|$)");
                var r = window.location.search.substr(1).match(reg);
                if (r!=null) return unescape(r[2]);
                return null;
            }
            var param = getUrlParam('page');
            document.getElementById(param).className = 'layui-nav-item layui-this';
            eval(param + '()');

            layui.use('element', function(){
                var element = layui.element;

            });
        </script> 
    </body>
</html>