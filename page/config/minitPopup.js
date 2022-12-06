var popup = document.getElementById('minitPopUp');
function PopUp(Content,Time) {
    // popup.innerHTML = Content;
    popup.style.top = '20px';
    setTimeout(function() {
        popup.style.top = '-999px';
    },3000);
}
function popupAppear() {
    popup.style.top = '20px';
    return 'Minit LomUI,Make animation with heart.';
}
function popupDisappear() {
    popup.style.top = '-999px';
    // popup.innerHTML = '';
    return 'Minit LomUI,Make animation with heart.';
}
function loadPopupAppear() {
    popup.innerHTML = '<div class="minit-icon-container flex"><i class="layui-icon layui-anim layui-icon-loading layui-anim-rotate layui-anim-loop minit-icon"></i></div>';
    popup.style.top = '20px';
    return 'Minit LomUI,Make animation with heart.';
}
function loadDisappear() {
    popup.innerHTML = '<div class="minit-icon-container flex"><h2>加载完成</h2></div>';
    setTimeout(function() {
       popup.style.top = '-999px'; 
    },1000);
    return 'Minit LomUI,Make animation with heart.';
}
function errorPopupApper() {
    popup.innerHTML = '<div class="flex cloumn" style="text-align: center;"><i class="layui-icon layui-icon-close-fill" style="font-size: 4em;color: red;"></i><h2 class="">未知错误</h2></div>';
    popup.style.top = '20px';
    return 'Minit LomUI,Make animation with heart.';
}
function timeErrorPopup() {
    popup.innerHTML = '<div class="flex cloumn" style="text-align: center;"><i class="layui-icon layui-icon-close-fill" style="font-size: 4em;color: red;"></i><h2 class="">未知错误</h2></div>';
    popup.style.top = '20px';
    setTimeout(function() {
        popup.style.top = '-999px'; 
    },3000);
    return 'Minit LomUI,Make animation with heart.';
}
