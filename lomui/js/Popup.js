var BackgroundColor = $('body').css('background-color');
// console.log(BackgroundColor);
if(BackgroundColor == 'rgba(0, 0, 0, 0)') {
    $('.pop_container').css('background-color','#f5f5f5');
}
// 针对纯白页面的适应


function PopUp(PopUptext) {
    var blur = document.getElementById('popup');
    if(PopUptext == undefined) {
        console.log("Warning: Parameter error(100)");  // 100错误代码是参数错误
        return;
    }
    $(".popText").text(PopUptext);
    blur.classList.toggle('active');
    setTimeout(function() {
        var blur = document.getElementById('popup');
        blur.classList.toggle('active');
    },3000);
    
}

function inpopup() {
    var newp = '<div id="inpopup"><h1>Hello</h1><input type="text" id="inpopupInput"><br><button id="determine" class="btn" onclick="inpopup();" style="margin-right: 20px;">确定</button><button id="cancel" class="btn" onclick="inpopup();">取消</button></div>';
    $("body").append(newp);

    setTimeout(function() {
        animationInpopup();
    },5);
}
function animationInpopup() {
    var popup = document.getElementById('inpopup');
    var determine = document.getElementById('determine');
    var inputText = document.getElementById('inpopupInput');
    determine.onclick = function() {
        var ReturnInputText = inputText.value;
        popup.classList.toggle('active');
        console.log(ReturnInputText);
    }   
    popup.classList.toggle('active');
}
//此函数使用必须传参

// inpopup();