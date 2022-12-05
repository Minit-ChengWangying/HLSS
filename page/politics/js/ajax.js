// Login
function Quit() {
    var popup = confirm('是否退出当前账户');
    if (popup == false) {
        $.ajax({
            type:"get",
            url:"../../system/module/Account/quit.php",
            success:function(Info) {
                var Info = JSON.parse(Info);
                console.log(Info);
                // window.location = '../../index.php';
                location.reload(false);
            }
        });
    }
}
// Sport Score
function sport() {
    var sportOptions = $("#sportUnionSelect option:selected");
    var hygieneOptions = $("#hygieneUnionSelect option:selected");
    // alert(sportOptions.val());

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
    // alert(hygieneOptions.val());

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
        data:{"p":"politics/number"},
        beforeSend:function(XMLHttpRequest){
            loadPopupAppear();
        },
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