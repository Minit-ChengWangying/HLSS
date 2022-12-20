$.get('../../../../system/module/Account/loginState.php',function(data) {
    // console.log(data); 
    document.getElementById('AccountName').innerText = data['data']['AccountName'];
},"json");
// Login
function Quit_index() {
    var popup = confirm('是否退出当前账户');
    if (popup == true) {
        $.ajax({
            type:"get",
            url:"../../../../system/module/Account/quit.php",
            success:function(Info) {
                var Info = JSON.parse(Info);
                // console.log(Info);
                location.reload(false);
            }
        });
    }
}
// read
function ticketRead() {
    $.get("../../../../system/hlss.php?p=class/read",function(data) {
        console.log(data);
    },"json");
}
// class info
function consolemodule() {
    $.ajax({
        type:"get",
        url:"../../../../system/hlss.php?p=class/number",
        success:function(data) {
            // console.log(JSON.parse(data));
            document.getElementById('consoleNewTicketsNumber').innerText = JSON.parse(data)['data']['newTicketsNumber'];
            document.getElementById('consoleNewMajorTicketsNumber').innerText = JSON.parse(data)['data']['newMajorTicketNumber'];
            document.getElementById('weekTicketsNumber').innerText = JSON.parse(data)['data']['weekTicketNumber'];
            document.getElementById('weekMajorTicketsNumber').innerText = JSON.parse(data)['data']['weekMajorTicketsNumber'];
            document.getElementById('ticketsNumber').innerText = JSON.parse(data)['data']['ticketsNumber'];
            document.getElementById('majorTicketsNumber').innerText = JSON.parse(data)['data']['majorTicketsNumber'];
        }
    });
}
// search
$('#ticketsSearchButton').click(function() {
    var list = document.getElementById('ticketList');
    var searchValue = document.getElementById('ticketsSearchInput').value;
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"class/query","n":searchValue},
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
                if(dataArr[i].class_master_state == 'false') {
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
        },
        error:function(XMLHttpRequest, textStatus, errorThrown) {
            errorPopupApper();
            setTimeout(function() {
                popupDisappear();
            },4000);
        }
    });
});
// ticket list
function ticketsmodule() {
    var options = $("#ticketsSelect option:selected");
    var list = document.getElementById('ticketList');
    var param = "class/"+options.val();
    console.log(param);
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":param},
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
                if(dataArr[i].class_master_state == 'false') {
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
            ticketRead();
            popupDisappear();
        },
        error:function(XMLHttpRequest, textStatus, errorThrown) {
            errorPopupApper();
            setTimeout(function() {
                popupDisappear();
            },4000);
        }
    });
}
layui.use('form', function(){
    var form = layui.form;
    form.on('select(ticketstype)', function(data){
        ticketsmodule();
    });
});
// union
function studentunion() {
    $.get("../../../../system/hlss.php?p=class/union",function(data) {
        // console.log(data);
        document.getElementById('moduleStandardBearer').innerText = data['data']['StandardBearer'];
        document.getElementById('moduleQueue').innerText = data['data']['Queue'];
        document.getElementById('moduleSlogan').innerText = data['data']['Slogan'];
        document.getElementById('modulesportScore').innerText = data['data']['SportScore'];
        document.getElementById('modulearea').innerText = data['data']['Area'];
        document.getElementById('moduleclass').innerText = data['data']['Class'];
        document.getElementById('modulehygieneScore').innerText = data['data']['HygieneScore'];
    },"json");
    $.get("../../../../system/hlss.php?p=class/sportreason",function(data) {
        var data = data['data'];
        var list = document.getElementById('unionSportReason');
        var arrayHTML = "";
        var Time = "";
        for(var i=0;i<data.length;i++) {
            // 时间戳转换
            Time = new Date(parseInt(data[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
            arrayHTML += `<div class="union-reason-item-container flex">`;
            arrayHTML += `<p>班级：${data[i].Class}</p>`;
            arrayHTML += `<p>扣分原因：${data[i].TextReason}</p>`;
            arrayHTML += `<p>扣分时间：${Time}</p>`;
            arrayHTML += `<p>扣除分数：${data[i].Point}</p>`;
            arrayHTML += `</div>`;
        }
        list.innerHTML = arrayHTML;
    },"json");
    $.get("../../../../system/hlss.php?p=class/hygienereason",function(data) {
        var data = data['data'];
        var list = document.getElementById('unionHygieneList');
        var arrayHTML = "";
        var Time = "";
        for(var i=0;i<data.length;i++) {
            // 时间戳转换
            Time = new Date(parseInt(data[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
            arrayHTML += `<div class="union-reason-item-container flex">`;
            arrayHTML += `<p>班级：${data[i].Class}</p>`;
            arrayHTML += `<p>扣分原因：${data[i].TextReason}</p>`;
            arrayHTML += `<p>扣分时间：${Time}</p>`;
            arrayHTML += `<p>扣除分数：${data[i].Point}</p>`;
            arrayHTML += `</div>`;
        }
        list.innerHTML = arrayHTML;
    },"json");
}
function sleepmodule() {
    $.get("../../../../system/hlss.php?p=class/goodsleep",function(data) {
        var data = data['data'];
        var goodList = document.getElementById('goodSleep');
        var arrayHTML = "";
        var Time = "";
        for(var i=0;i<data.length;i++) {
            // 时间戳转换
            Time = new Date(parseInt(data[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
            arrayHTML += `<tr>`;
            arrayHTML += `<td>${data[i].SleepNumber}</td>`;
            arrayHTML += `<td>${data[i].Class}</td>`;
            arrayHTML += `<td>${Time}</td>`;
            arrayHTML += `<td>${data[i].SleepType}</td>`;
            arrayHTML += `<td>${data[i].Teacher}</td>`;
            arrayHTML += `</tr>`;
        }
        goodList.innerHTML = arrayHTML;
    },"json");  
    $.get("../../../../system/hlss.php?p=class/badsleep",function(data) {
        var data = data['data'];
        var goodList = document.getElementById('badSlepp');
        var arrayHTML = "";
        var Time = "";
        for(var i=0;i<data.length;i++) {
            // 时间戳转换
            Time = new Date(parseInt(data[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
            arrayHTML += `<tr>`;
            arrayHTML += `<td>${data[i].SleepNumber}</td>`;
            arrayHTML += `<td>${data[i].Class}</td>`;
            arrayHTML += `<td>${Time}</td>`;
            arrayHTML += `<td>${data[i].SleepType}</td>`;
            arrayHTML += `<td>${data[i].Teacher}</td>`;
            arrayHTML += `</tr>`;
        }
        goodList.innerHTML = arrayHTML;
    },"json"); 
} 
