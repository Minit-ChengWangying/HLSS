function bounsComfirmPoints() {
    var Class = $("#bounsModuleClass option:selected").val();
    var Points = $("#bounsModulePoints option:selected").val();
    if(Class == 'NULL') {
        alert('请选择一个班级!');
        throw SyntaxError('Please select a class!');
    }
    if(Points == 'NULL') {
        alert('请选择分数!');
        throw SyntaxError('Please select a score!');
    }
    var bounsConfirm = confirm('您确定给'+Class+'班加'+Points+'分吗?');
    if(bounsConfirm == true) {
        bounsPoints(Class,Points);
    }else {
        layer.msg('已取消');
    }
}

function bounsPoints(Class,Points) {
    $.ajax({
        type:"get",
        url:"../../system/hlss.php",
        data:{"p":"politics/bouns","class":Class,"points":Points},
        beforeSend:function(XMLHttpRequest){
            loadPopupAppear();
        },
        success:function(data) {
            var data = JSON.parse(data);
            console.log(data);
            if(data == true) {
                alert('加分成功');
            }else {
                alert('加分失败');
            }
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