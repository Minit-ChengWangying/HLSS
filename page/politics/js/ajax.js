// Login
function Quit() {
    var popup = confirm('是否退出当前账户');
    if (popup == true) {
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
}
// Sport Score
function sport() {
    var sportOptions = $("#sportUnionSelect option:selected");
    var hygieneOptions = $("#hygieneUnionSelect option:selected");
    if(sportOptions.val() == 'NULL') {
        alert('请选择一个班级!');
        throw SyntaxError('Please select a class!');
    }
    if(hygieneOptions.val() == 'NULL') {
        timeErrorPopup();
        throw SyntaxError('unknown error');
    }

    var StandardBearer = document.getElementById('StandardBearer');
    var Queue = document.getElementById('Queue');
    var Slogan = document.getElementById('Slogan');
    var sportScore = document.getElementById('sportScore');
    $.ajax({
        type:"get",
        url:"../../system/module/Politics/unionScore.php",
        data:{'sportclass':sportOptions.val(),'hygieneclass':hygieneOptions.val()},
        success:function(Info) {
            var Info = JSON.parse(Info);
            // console.log(Info);
            StandardBearer.innerHTML = Info['StandardBearer'];
            Queue.innerHTML = Info['Queue'];
            Slogan.innerHTML = Info['Slogan'];
            sportScore.innerHTML = Info['SportScore'];
            layer.msg('刷新成功'); 
        }
    });
}
// Hygiene Score
function hygiene() {
    var sportOptions = $("#sportUnionSelect option:selected");
    var hygieneOptions = $("#hygieneUnionSelect option:selected");
    // console.log(sportOptions.val());
    if(hygieneOptions.val() == 'NULL') {
        alert('请选择一个班级!');
        throw SyntaxError('Please select a class!');
    }
    if(sportOptions.val() == 'NULL') {
        timeErrorPopup();
        throw SyntaxError('unknown error');
    }

    var area = document.getElementById('area');
    var classnumber = document.getElementById('class');
    var hygieneScore = document.getElementById('hygieneScore');
    $.ajax({
        type:"get",
        url:"../../system/module/Politics/unionScore.php",
        data:{'sportclass':sportOptions.val(),'hygieneclass':hygieneOptions.val()},
        success:function(Info) {
            var Info = JSON.parse(Info);
            // console.log(Info);
            area.innerHTML = Info['Area'];
            classnumber.innerHTML = Info['Classroom'];
            hygieneScore.innerHTML = Info['HyigeneScore'];
            layer.msg('刷新成功'); 
        }
    });
}
// Number of ticket
function number() {
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/system"},
        beforeSend:function(XMLHttpRequest){
            loadPopupAppear();
        },
        success:function(data) {
            var numberData = JSON.parse(data).data;
            Time = new Date(parseInt(numberData[0].week_time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
            document.getElementById('weekNumber').innerText = numberData[0].week_number;
            document.getElementById('weekTime').innerText = Time;
        },
        error:function(XMLHttpRequest, textStatus, errorThrown) {
            errorPopupApper();
            setTimeout(function() {
                popupDisappear();
            },4000);
        }
    });
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/number"},
        success:function(data) {
            var numberData = JSON.parse(data).data;
            document.getElementById('newTicketSpan').innerText = numberData.newticket;
            document.getElementById('newTicket').innerText = numberData.newticket;
            document.getElementById('newMajorTicket').innerText = numberData.newmajorticket;
            document.getElementById('weekTicket').innerText = numberData.weekticket;
            document.getElementById('weekMajorTicket').innerText = numberData.weekmajorticket;
            document.getElementById('Ticket').innerText = numberData.ticket;
            document.getElementById('majorTicket').innerText = numberData.majorticket;
            loadDisappear();
        },
        error:function(XMLHttpRequest, textStatus, errorThrown) {
            errorPopupApper();
            setTimeout(function() {
                popupDisappear();
            },4000);
        }
    });
}
// $("#ticketSelect").find("option:contains('学期罚单')").attr("selected", true);
// Tickets read
function ticketModuleRead() {
     $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/ticketsread"},
        success:function(data) {
            var data = JSON.parse(data);
            if(data == true) {
                console.log('success');
            }else {
                alert('系统未知错误!');
            }
        }
    });
}
// Ticket module of week ticket
function ticketModule() {
    var list = document.getElementById('ticketList');
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/ticket"},
        beforeSend:function(XMLHttpRequest){
            loadPopupAppear();
        },
        success:function(data) {
            var dataArr = JSON.parse(data).data;
            var arrayHTML = "";
            var Time = "";
            for(var i=0;i<dataArr.length;i++) {
                var Type = "普通罚单";
                // 时间戳转换
                Time = new Date(parseInt(dataArr[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
                if(dataArr[i].tickettype == 'major') {
                    Type = '重大违纪罚单';
                }
                arrayHTML += `<tr>`;
                if(dataArr[i].State == 'Flase') {
                    arrayHTML += `<td><span class="layui-badge-dot" style="margin-right: 5px;"></span>${dataArr[i].StudentName}</td>`;
                }else {
                    arrayHTML += `<td>${dataArr[i].StudentName}</td>`;
                }
                arrayHTML += `<td>${dataArr[i].TextReason}</td>`;
                arrayHTML += `<td>${dataArr[i].TeacherName}</td>`;
                arrayHTML += `<td>${dataArr[i].Class}</td>`;
                arrayHTML += `<td>${dataArr[i].DeductPoints}</td>`;
                arrayHTML += `<td>${Time}</td>`;
                arrayHTML += `<td>${dataArr[i].ticketNumber}</td>`;
                arrayHTML += `<td>${Type}</td>`;
                arrayHTML += `</tr>`;
            }
            list.innerHTML = arrayHTML;
            popupDisappear();
            ticketModuleRead();
        },
        error:function(XMLHttpRequest, textStatus, errorThrown) {
            popupDisappear();
        }
    });
}
// Ticket module of tickets
function ticketsModule() {
    var list = document.getElementById('ticketList');
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/tickets"},
        beforeSend:function(XMLHttpRequest){
            loadPopupAppear();
        },
        success:function(data) {
            var dataArr = JSON.parse(data).data;
            var arrayHTML = "";
            var Time = "";
            for(var i=0;i<dataArr.length;i++) {
                var Type = "普通罚单";
                // 时间戳转换
                Time = new Date(parseInt(dataArr[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
                if(dataArr[i].tickettype == 'major') {
                    Type = '重大违纪罚单';
                }
                arrayHTML += `<tr>`;
                arrayHTML += `<td>${dataArr[i].StudentName}</td>`;
                arrayHTML += `<td>${dataArr[i].TextReason}</td>`;
                arrayHTML += `<td>${dataArr[i].TeacherName}</td>`;
                arrayHTML += `<td>${dataArr[i].Class}</td>`;
                arrayHTML += `<td>${dataArr[i].DeductPoints}</td>`;
                arrayHTML += `<td>${Time}</td>`;
                arrayHTML += `<td>${dataArr[i].ticketNumber}</td>`;
                arrayHTML += `<td>${Type}</td>`;
                arrayHTML += `</tr>`;
            }
            list.innerHTML = arrayHTML;
            popupDisappear();
            ticketModuleRead();
        },
        error:function(XMLHttpRequest, textStatus, errorThrown) {
            popupDisappear();
        }
    });
}
// Ticket module of major tickets
function majorticketsModule() {
    var list = document.getElementById('ticketList');
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/majorTickets"},
        beforeSend:function(XMLHttpRequest){
            loadPopupAppear();
        },
        success:function(data) {
            var dataArr = JSON.parse(data).data;
            var arrayHTML = "";
            var Time = "";
            for(var i=0;i<dataArr.length;i++) {
                var Type = "普通罚单";
                // 时间戳转换
                Time = new Date(parseInt(dataArr[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
                if(dataArr[i].tickettype == 'major') {
                    Type = '重大违纪罚单';
                }
                arrayHTML += `<tr>`;
                arrayHTML += `<td>${dataArr[i].StudentName}</td>`;
                arrayHTML += `<td>${dataArr[i].TextReason}</td>`;
                arrayHTML += `<td>${dataArr[i].TeacherName}</td>`;
                arrayHTML += `<td>${dataArr[i].Class}</td>`;
                arrayHTML += `<td>${dataArr[i].DeductPoints}</td>`;
                arrayHTML += `<td>${Time}</td>`;
                arrayHTML += `<td>${dataArr[i].ticketNumber}</td>`;
                arrayHTML += `<td>${Type}</td>`;
                arrayHTML += `</tr>`;
            }
            list.innerHTML = arrayHTML;
            popupDisappear();
            ticketModuleRead();
        },
        error:function(XMLHttpRequest, textStatus, errorThrown) {
            popupDisappear();
        }
    });
}
// Ticket module of week major tickets
function weekmajorticketsModule() {
    var list = document.getElementById('ticketList');
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/weekMajorTickets"},
        beforeSend:function(XMLHttpRequest){
            loadPopupAppear();
        },
        success:function(data) {
            var dataArr = JSON.parse(data).data;
            var arrayHTML = "";
            var Time = "";
            for(var i=0;i<dataArr.length;i++) {
                var Type = "普通罚单";
                // 时间戳转换
                Time = new Date(parseInt(dataArr[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
                if(dataArr[i].tickettype == 'major') {
                    Type = '重大违纪罚单';
                }
                arrayHTML += `<tr>`;
                arrayHTML += `<td>${dataArr[i].StudentName}</td>`;
                arrayHTML += `<td>${dataArr[i].TextReason}</td>`;
                arrayHTML += `<td>${dataArr[i].TeacherName}</td>`;
                arrayHTML += `<td>${dataArr[i].Class}</td>`;
                arrayHTML += `<td>${dataArr[i].DeductPoints}</td>`;
                arrayHTML += `<td>${Time}</td>`;
                arrayHTML += `<td>${dataArr[i].ticketNumber}</td>`;
                arrayHTML += `<td>${Type}</td>`;
                arrayHTML += `</tr>`;
            }
            list.innerHTML = arrayHTML;
            popupDisappear();
            ticketModuleRead();
        },
        error:function(XMLHttpRequest, textStatus, errorThrown) {
            popupDisappear();
        }
    });
}
// Select
layui.use('form', function(){
    var form = layui.form;
    form.on('select(ticketModule)', function(data){
        // console.log(data.value);
        var method = data.value;
        if(method == 'semester') {
            ticketsModule();
        }else if(method == 'week') {
            ticketModule();
        }else if(method == 'majorWeek') {
            weekmajorticketsModule();
        }else if(method == 'major') {
            majorticketsModule();
        }
    });
});
// Nav select query
function getTicketSelect() {
    var options = $("#ticketSelect option:selected");
    if(options.val() == 'semester') {
        ticketsModule();
    }else if(options.val() == 'week') {
        ticketModule();
    }else if(options.val() == 'majorWeek') {
        weekmajorticketsModule();
    }else if(options.val() == 'major') {
        majorticketsModule();
    }
}
// Search
function ticketModuleSearch() {
    var criteria = $("#ticketSearchSelect option:selected");
    var info = document.getElementById('ticketModuleSearchFrame').value;
    var list = document.getElementById('ticketList');
    if(criteria.val() == 'NULL') {
        alert('请选择一个查询条件!');
        throw SyntaxError('Please select a query criteria!');
    }
    if (info == '') {
        alert('请输入查询内容!');
        throw SyntaxError('Please enter the query content!');
    }
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/fuzzy","criteria":criteria.val(),"info":info},
        beforeSend:function(XMLHttpRequest){
            loadPopupAppear();
        },
        success:function(data) {
            var dataArr = JSON.parse(data).data;
            var arrayHTML = "";
            var Time = "";
            for(var i=0;i<dataArr.length;i++) {
                var Type = "普通罚单";
                // 时间戳转换
                Time = new Date(parseInt(dataArr[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
                if(dataArr[i].tickettype == 'major') {
                    Type = '重大违纪罚单';
                }
                arrayHTML += `<tr>`;
                arrayHTML += `<td>${dataArr[i].StudentName}</td>`;
                arrayHTML += `<td>${dataArr[i].TextReason}</td>`;
                arrayHTML += `<td>${dataArr[i].TeacherName}</td>`;
                arrayHTML += `<td>${dataArr[i].Class}</td>`;
                arrayHTML += `<td>${dataArr[i].DeductPoints}</td>`;
                arrayHTML += `<td>${Time}</td>`;
                arrayHTML += `<td>${dataArr[i].ticketNumber}</td>`;
                arrayHTML += `<td>${Type}</td>`;
                arrayHTML += `</tr>`;
            }
            list.innerHTML = arrayHTML;
            popupDisappear();
        },
        error:function(XMLHttpRequest, textStatus, errorThrown) {
            popupDisappear();
        }
    });
}
function unionModuleQuery() {
    var unionSelectVal = $('#unionItemSelect option:selected').val();
    if(unionSelectVal == 'NULL') {
        alert('请选择一个班级!');
        throw SyntaxError('Please select a class!');
    }
    var sportList = document.getElementById('unionModuleSportReason');
    var hygieneList = document.getElementById('unionModuleHygieneReason');
    var StandardBearer = document.getElementById('moduleStandardBearer');
    var Queue = document.getElementById('moduleQueue');
    var Slogan = document.getElementById('moduleSlogan');
    var sportScore = document.getElementById('modulesportScore');
    var area = document.getElementById('modulearea');
    var classnumber = document.getElementById('moduleclass');
    var hygieneScore = document.getElementById('modulehygieneScore');
    // Union Student Score
    $.ajax({
        type:"get",
        url:"../../system/module/Politics/unionScore.php",
        data:{'sportclass':unionSelectVal,'hygieneclass':unionSelectVal},
        beforeSend:function(XMLHttpRequest){
            loadPopupAppear();
        },
        success:function(Info) {
            var Info = JSON.parse(Info);
            console.log(Info);
            StandardBearer.innerHTML = Info['StandardBearer'];
            Queue.innerHTML = Info['Queue'];
            Slogan.innerHTML = Info['Slogan'];
            sportScore.innerHTML = Info['SportScore'];
            area.innerHTML = Info['Area'];
            classnumber.innerHTML = Info['Classroom'];
            hygieneScore.innerHTML = Info['HyigeneScore'];
        }
    });
    // Sport Reason
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/sportReason","class":unionSelectVal},
        success:function(data) {
            var dataArr = JSON.parse(data).data;
            var arrayHTML = "";
            var Time = "";
            for(var i=0;i<dataArr.length;i++) {
                var Type = "普通罚单";
                // 时间戳转换
                Time = new Date(parseInt(dataArr[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
                if(dataArr[i].tickettype == 'major') {
                    Type = '重大违纪罚单';
                }
                arrayHTML += `<div class="unionModule-log-rason-container flex">`;
                arrayHTML += `<p>班级:<span id="unionModuleSportReasonClass">${dataArr[i].Class}</span></p>`;
                arrayHTML += `<p>扣分原因:<span id="unionModuleSportReasonText">${dataArr[i].TextReason}</span></p>`;
                arrayHTML += `<p>扣分时间:<span id="unionModuleSportReasonTime">${Time}</span></p>`;
                arrayHTML += `<p>扣除分数:<span id="unionModuleSportReasonPoints">${dataArr[i].Point}</span></p>`;
                arrayHTML += `</div>`;
            }
            sportList.innerHTML = arrayHTML;
            // popupDisappear();
        },
        error:function(XMLHttpRequest, textStatus, errorThrown) {
            // popupDisappear();
        }
    });
    // Hygiene Reason
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/hygieneReason","class":unionSelectVal},
        success:function(data) {
            var dataArr = JSON.parse(data).data;
            var arrayHTML = "";
            var Time = "";
            for(var i=0;i<dataArr.length;i++) {
                var Type = "普通罚单";
                // 时间戳转换
                Time = new Date(parseInt(dataArr[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
                if(dataArr[i].tickettype == 'major') {
                    Type = '重大违纪罚单';
                }
                arrayHTML += `<div class="unionModule-log-rason-container flex">`;
                arrayHTML += `<p>班级:<span id="unionModuleSportReasonClass">${dataArr[i].Class}</span></p>`;
                arrayHTML += `<p>扣分原因:<span id="unionModuleSportReasonText">${dataArr[i].TextReason}</span></p>`;
                arrayHTML += `<p>扣分时间:<span id="unionModuleSportReasonTime">${Time}</span></p>`;
                arrayHTML += `<p>扣除分数:<span id="unionModuleSportReasonPoints">${dataArr[i].Point}</span></p>`;
                arrayHTML += `</div>`;
            }
            hygieneList.innerHTML = arrayHTML;
            loadDisappear();
        },
        error:function(XMLHttpRequest, textStatus, errorThrown) {
            loadDisappear();
        }
    });
}
function Settlement() {
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/settlement"},
        success:function(data) {
            var data = JSON.parse(data);
            if(data == true) {
                alert('结算成功');
                location.reload(false);
            }else {
                alert('结算失败');
            }
        }
    });
}
$('#Settlement').click(function() {
    var settlementConfirm = confirm('确定结算本周记录吗？(结算后一些信息无法找回重新开始新的记录)');
    if(settlementConfirm == true) {
        Settlement();
    }else if(settlementConfirm == false) {
        alert('取消成功');
    }
});