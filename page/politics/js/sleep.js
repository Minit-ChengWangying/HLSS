// Week Sleep
function sleepModuleWeek() {
    var badList = document.getElementById('sleepModuleBadSleep');
    var goodList = document.getElementById('sleepModuleGoodSleep');
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/goodsleep"},
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
                arrayHTML += `<td>${dataArr[i].SleepNumber}</td>`;
                arrayHTML += `<td>${dataArr[i].Class}</td>`;
                arrayHTML += `<td>${Time}</td>`;
                arrayHTML += `<td>${dataArr[i].SleepType}</td>`;
                arrayHTML += `<td>${dataArr[i].Teacher}</td>`;
                arrayHTML += `</tr>`;
            }
            goodList.innerHTML = arrayHTML;
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
        data:{"p":"politics/badsleep"},
        success:function(data) {
            var dataArr = JSON.parse(data).data;
            var arrayHTML = "";
            var Time = "";
            for(var i=0;i<dataArr.length;i++) {
                // 时间戳转换
                Time = new Date(parseInt(dataArr[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
                arrayHTML += `<tr>`;
                arrayHTML += `<td>${dataArr[i].SleepNumber}</td>`;
                arrayHTML += `<td>${dataArr[i].Class}</td>`;
                arrayHTML += `<td>${Time}</td>`;
                arrayHTML += `<td>${dataArr[i].SleepType}</td>`;
                arrayHTML += `<td>${dataArr[i].Teacher}</td>`;
                arrayHTML += `</tr>`;
            }
            badList.innerHTML = arrayHTML;
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
// Class Sleep
function sleepModuleClass() {
    var Class = $("#sleepModuleClass option:selected").val();
    var badClassList = document.getElementById('sleepModuleClassBadSleep');
    var goodClassList = document.getElementById('sleepModuleClassGoodSleep');
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/goodclasssleep","class":Class},
        beforeSend:function(XMLHttpRequest){
            loadPopupAppear();
        },
        success:function(data) {
            var dataArr = JSON.parse(data).data;
            var arrayHTML = "";
            var Time = "";
            for(var i=0;i<dataArr.length;i++) {
                // 时间戳转换
                Time = new Date(parseInt(dataArr[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
                arrayHTML += `<tr>`;
                arrayHTML += `<td>${dataArr[i].SleepNumber}</td>`;
                arrayHTML += `<td>${dataArr[i].Class}</td>`;
                arrayHTML += `<td>${Time}</td>`;
                arrayHTML += `<td>${dataArr[i].SleepType}</td>`;
                arrayHTML += `<td>${dataArr[i].Teacher}</td>`;
                arrayHTML += `</tr>`;
            }
            goodClassList.innerHTML = arrayHTML;
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
        data:{"p":"politics/badclasssleep","class":Class},
        beforeSend:function(XMLHttpRequest){
            loadPopupAppear();
        },
        success:function(data) {
            var dataArr = JSON.parse(data).data;
            var arrayHTML = "";
            var Time = "";
            for(var i=0;i<dataArr.length;i++) {
                // 时间戳转换
                Time = new Date(parseInt(dataArr[i].Time)*1000).toLocaleString().replace(/:\d{1,2}$/,'');
                arrayHTML += `<tr>`;
                arrayHTML += `<td>${dataArr[i].SleepNumber}</td>`;
                arrayHTML += `<td>${dataArr[i].Class}</td>`;
                arrayHTML += `<td>${Time}</td>`;
                arrayHTML += `<td>${dataArr[i].SleepType}</td>`;
                arrayHTML += `<td>${dataArr[i].Teacher}</td>`;
                arrayHTML += `</tr>`;
            }
            badClassList.innerHTML = arrayHTML;
            layer.msg('查询成功'); 
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