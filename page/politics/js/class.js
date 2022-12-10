// Query
function classModuleButton() {
    classModuleNavQuery();
    classModuleUnionScore();
    classModuleSleepQuery();
}
// get Class
function classModuleQuery() {
    var Class = $('#classModuleSelect option:selected').val();
    if(Class == 'NULL') {
        alert('请选择一个班级!');
        throw SyntaxError('Please select a class!');
    }
    return Class;
}
// Class week tickets
function classModuleWeekTickets() {
    var list = document.getElementById('classModuleTicketsTable');
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/classweektickets","class":classModuleQuery()},
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
// Class week major tickets
function classModuleWeekMajorTickets() {
    var list = document.getElementById('classModuleTicketsTable');
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/classweekmajortickets","class":classModuleQuery()},
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
// Class tickets
function classModuleTickets() {
    var list = document.getElementById('classModuleTicketsTable');
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/classtickets","class":classModuleQuery()},
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
// Class major tickets
function classModuleMajorTickets() {
    var list = document.getElementById('classModuleTicketsTable');
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/classmajortickets","class":classModuleQuery()},
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
// Class Union Scroe 
function classModuleUnionScore() {
    var sportList = document.getElementById('classModuleSportReason');
    var hygieneList = document.getElementById('classModuleHygieneReason');

    var StandardBearer = document.getElementById('classModuleStandardBearer');
    var Queue = document.getElementById('classModuleQueue');
    var Slogan = document.getElementById('classModuleSlogan');
    var sportScore = document.getElementById('classModuleSportScore');
    var area = document.getElementById('classModuleArea');
    var classnumber = document.getElementById('classModuleClass');
    var hygieneScore = document.getElementById('classModuleHygieneScore');
    // Union Student Score
    $.ajax({
        type:"get",
        url:"../../system/module/Politics/unionScore.php",
        data:{'sportclass':classModuleQuery(),'hygieneclass':classModuleQuery()},
        beforeSend:function(XMLHttpRequest){
            loadPopupAppear();
        },
        success:function(Info) {
            var Info = JSON.parse(Info);
            // console.log(Info);
            StandardBearer.innerHTML = Info['StandardBearer'];
            Queue.innerHTML = Info['Queue'];
            Slogan.innerHTML = Info['Slogan'];
            sportScore.innerHTML = Info['SportScore'];
            area.innerHTML = Info['Area'];
            classnumber.innerHTML = Info['HyigeneClass'];
            hygieneScore.innerHTML = Info['HyigeneScore'];
        }
    });
    // Sport Reason
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/sportReason","class":classModuleQuery()},
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
                arrayHTML += `<div class="classModule-log-reason-container flex">`;
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
        data:{"p":"politics/hygieneReason","class":classModuleQuery()},
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
                arrayHTML += `<div class="classModule-log-reason-container flex">`;
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
// Class good sleep
function classModuleSleepQuery() {
    var badClassList = document.getElementById('classModuleGoodSleep');
    var goodClassList = document.getElementById('classModuleBadSleep');
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/goodclasssleep","class":classModuleQuery()},
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
        data:{"p":"politics/badclasssleep","class":classModuleQuery()},
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
// Select
layui.use('form', function(){
    var form = layui.form;
    form.on('select(classModuleTicketSelect)', function(data){
        // console.log(data.value);
        var method = data.value;
        if(method == 'semester') {
            classModuleTickets();
        }else if(method == 'week') {
            classModuleWeekTickets();
        }else if(method == 'majorWeek') {
            classModuleWeekMajorTickets();
        }else if(method == 'major') {
            classModuleMajorTickets();
        }
    });
});
// Nav select query
function classModuleNavQuery() {
    var options = $("#classModuleTicketsSelect option:selected");
    if(options.val() == 'semester') {
        classModuleTickets();
    }else if(options.val() == 'week') {
        classModuleWeekTickets();
    }else if(options.val() == 'majorWeek') {
        classModuleWeekMajorTickets();
    }else if(options.val() == 'major') {
        classModuleMajorTickets();
    }
}