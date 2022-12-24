layui.use('form', function(){
    var form = layui.form;
    
});
function getCheckbox() {
    var Limit = document.getElementsByName('Limits');
    var check_val = [];
    for(k in Limit) {
        if(Limit[k].checked) {
            check_val.push(Limit[k].value);
        }
    }
    var Str_check_val = check_val.toString().replace(/,/g,"  ");
    return Str_check_val;
}