function consolemodule() {
    document.getElementById('left-container').style.display = "flex";
    document.getElementById('right-container').style.display = "flex";
    document.getElementById('ticketContent-container').style.display = "none";
    document.getElementById('unionContent-container').style.display = "none";
    number();
    sport();
    hygiene();
}
function tickets() {;
    document.getElementById('left-container').style.display = "none";
    document.getElementById('right-container').style.display = "none";
    document.getElementById('unionContent-container').style.display = "none";
    document.getElementById('ticketContent-container').style.display = "flex";
    document.getElementById('sleepModule-container').style.display = "none";
    number();
    getTicketSelect();
}
function unionstudent() {
    document.getElementById('left-container').style.display = "none";
    document.getElementById('right-container').style.display = "none";
    document.getElementById('ticketContent-container').style.display = "none";
    document.getElementById('unionContent-container').style.display = "flex";
    document.getElementById('sleepModule-container').style.display = "none";
    number();
    unionModuleQuery();
}
function sleep() {
    document.getElementById('left-container').style.display = "none";
    document.getElementById('right-container').style.display = "none";
    document.getElementById('ticketContent-container').style.display = "none";
    document.getElementById('unionContent-container').style.display = "none";
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
    number();
}
function classdetails() {
    document.getElementById('left-container').style.display = "none";
    document.getElementById('right-container').style.display = "none";
    document.getElementById('ticketContent-container').style.display = "none";
    document.getElementById('unionContent-container').style.display = "none";
    document.getElementById('sleepModule-container').style.display = "none";
    number();
}

