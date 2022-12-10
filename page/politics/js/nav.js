function consolemodule() {
    document.getElementById('ticketContent-container').style.display = "none";
    document.getElementById('unionContent-container').style.display = "none";
    document.getElementById('bonusModule-container').style.display = "none";
    document.getElementById('classModule-container').style.display = "none";
    document.getElementById('left-container').style.display = "flex";
    document.getElementById('right-container').style.display = "flex";
    number();
    sport();
    hygiene();
}
function tickets() {;
    document.getElementById('left-container').style.display = "none";
    document.getElementById('right-container').style.display = "none";
    document.getElementById('unionContent-container').style.display = "none";
    document.getElementById('sleepModule-container').style.display = "none";
    document.getElementById('bonusModule-container').style.display = "none";
    document.getElementById('classModule-container').style.display = "none";
    document.getElementById('ticketContent-container').style.display = "flex";
    document.getElementById('consolemodule').className = 'layui-nav-item';
    document.getElementById('tickets').className = 'layui-nav-item layui-this';
    number();
    getTicketSelect();
}
function unionstudent() {
    document.getElementById('left-container').style.display = "none";
    document.getElementById('right-container').style.display = "none";
    document.getElementById('ticketContent-container').style.display = "none";
    document.getElementById('sleepModule-container').style.display = "none";
    document.getElementById('bonusModule-container').style.display = "none";
    document.getElementById('classModule-container').style.display = "none";
    document.getElementById('unionContent-container').style.display = "flex";
    number();
    unionModuleQuery();
}
function sleep() {
    document.getElementById('left-container').style.display = "none";
    document.getElementById('right-container').style.display = "none";
    document.getElementById('ticketContent-container').style.display = "none";
    document.getElementById('unionContent-container').style.display = "none";
    document.getElementById('bonusModule-container').style.display = "none";
    document.getElementById('classModule-container').style.display = "none";
    document.getElementById('sleepModule-container').style.display = "flex";
    number();
    sleepModuleWeek();
    sleepModuleClass();
}
function bonuspoints() {
    document.getElementById('left-container').style.display = "none";
    document.getElementById('right-container').style.display = "none";
    document.getElementById('ticketContent-container').style.display = "none";
    document.getElementById('unionContent-container').style.display = "none";
    document.getElementById('sleepModule-container').style.display = "none";
    document.getElementById('classModule-container').style.display = "none";
    document.getElementById('bonusModule-container').style.display = "flex";
    number();
}
function classdetails() {
    document.getElementById('left-container').style.display = "none";
    document.getElementById('right-container').style.display = "none";
    document.getElementById('ticketContent-container').style.display = "none";
    document.getElementById('unionContent-container').style.display = "none";
    document.getElementById('sleepModule-container').style.display = "none";
    document.getElementById('bonusModule-container').style.display = "none";
    document.getElementById('classModule-container').style.display = "flex";
    number();
    classModuleNavQuery();
    classModuleUnionScore();    
    classModuleSleepQuery();
}

