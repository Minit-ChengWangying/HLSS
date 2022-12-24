function get_delete(sheet,row,value) {
    $.get('../../../system/hlss.php?p=admin/delete',{'sheet':sheet,'row':row,'value':value},function(data) {
        if(data) {
            alert('删除成功!');
        }else {
            alert('删除失败');
        }
    },'json');
}
function query(Data) {
    layui.use('table', function(){
        var table = layui.table;
        
        // Tickets
        table.render({
            elem: '#ticketsTable'
            ,url: '../../system/hlss.php?p=admin/query&data='+Data //数据接口
            ,cols: [[ //表头
                {field: 'StudentName', title: '学生姓名'}
                ,{field: 'TextReason', title: '原因'}
                ,{field: 'TeacherName', title: '开单教师'}
                ,{field: 'Class', title: '学生班级', sort: true} 
                ,{field: 'DeductPoints', title: '扣除分数'}
                ,{field: 'Times', title: '开单时间', sort: true}
                ,{field: 'ticketNumber', title: '罚单编号'}
                ,{field: 'tickettype', title: '罚单类型'}
                ,{title: '操作', width: 200, templet: '#toolEventDemo', fixed: 'right'}
            ]]
        });
        table.on('tool(tickets)', function(obj){
            var data = obj.data;
            var layEvent = obj.event;
            var tr = obj.tr;
            
            if(layEvent === 'del'){
                layer.confirm('确定删除吗？', function(index){
                    obj.del();
                    layer.close(index);
                    // console.log(data);
                    get_delete('tickets','ticketNumber',data['ticketNumber']);
                    get_delete('week','ticketNumber',data['ticketNumber']);
                });
            }
        });
    });
}
function system() {
    $.get('../../../system/hlss.php?p=admin/survey',function(data) {
        document.getElementById('newTickets').innerText = data['newTicketsNumber'];
        document.getElementById('newMajorTickets').innerText = data['newMajorTicketNumber'];
        document.getElementById('weekTickets').innerText = data['weekTicketNumber'];
        document.getElementById('weekMajorTickets').innerText = data['weekMajorTicketsNumber'];
        document.getElementById('ticketsNumber').innerText = data['ticketsNumber'];
        document.getElementById('majorTicketsNumber').innerText = data['majorTicketsNumber'];
        document.getElementById('userNumber').innerText = data['userNumber'];
        document.getElementById('classMasterNumber').innerText = data['classMasterNumber'];
    },'json');
}
function tickets() {
    layui.use('form', function(){ 
        var form = layui.form;
        
        //方法提交
        $('#ticketsSearchButton').on('click', function(){
            var data = document.getElementById('ticketsSearchInput').value;
            query(data);
        });
    });
    layui.use('table', function(){
        var table = layui.table;
        
        // Tickets
        table.render({
            elem: '#ticketsTable'
            ,url: '../../system/hlss.php?p=admin/tickets' //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'StudentName', title: '学生姓名'}
                ,{field: 'TextReason', title: '原因'}
                ,{field: 'TeacherName', title: '开单教师'}
                ,{field: 'Class', title: '学生班级', sort: true} 
                ,{field: 'DeductPoints', title: '扣除分数'}
                ,{field: 'Times', title: '开单时间', sort: true}
                ,{field: 'ticketNumber', title: '罚单编号'}
                ,{field: 'tickettype', title: '罚单类型'}
                ,{title: '操作', width: 200, templet: '#toolEventDemo', fixed: 'right'}
            ]]
        });
        table.on('tool(tickets)', function(obj){
            var data = obj.data;
            var layEvent = obj.event;
            var tr = obj.tr;
            
            if(layEvent === 'del'){
                layer.confirm('确定删除吗？', function(index){
                    obj.del();
                    layer.close(index);
                    // console.log(data['ticketNumber']);
                    get_delete('tickets','ticketNumber',data['ticketNumber']);
                    get_delete('week','ticketNumber',data['ticketNumber']);
                });
            }
        });
    });
}
function union() {
    layui.use('table', function(){
        var table = layui.table;
        
        // Tickets
        table.render({
            elem: '#unionSportTable'
            ,height: '200'
            ,url: '../../system/hlss.php?p=admin/sport' //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'Class', title: '班级'}
                ,{field: 'TextReason', title: '原因'}
                ,{field: 'Times', title: '时间', sort: true}
                ,{field: 'Point', title: '扣除分数'} 
                ,{title: '操作', width: 200, templet: '#toolEventDemo', fixed: 'right'}
            ]]
        });
        table.on('tool(unionSport)', function(obj){
            var data = obj.data;
            var layEvent = obj.event;
            var tr = obj.tr;
            
            if(layEvent === 'del'){
                layer.confirm('确定删除吗？', function(index){
                    obj.del();
                    layer.close(index);
                    // console.log(data['ID']);
                    get_delete('unionsport_reason','ID',data['ID']);
                });
            }
        });
    });
    layui.use('table', function(){
        var table = layui.table;
        
        // Tickets
        table.render({
            elem: '#unionHygieneTable'
            ,height: '200'
            ,url: '../../system/hlss.php?p=admin/hygiene' //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'Class', title: '班级'}
                ,{field: 'TextReason', title: '原因'}
                ,{field: 'Times', title: '时间', sort: true}
                ,{field: 'Point', title: '扣除分数'} 
                ,{title: '操作', width: 200, templet: '#toolEventDemo', fixed: 'right'}
            ]]
        });
        table.on('tool(unionHygiene)', function(obj){
            var data = obj.data;
            var layEvent = obj.event;
            var tr = obj.tr;
            
            if(layEvent === 'del'){
                layer.confirm('确定删除吗？', function(index){
                    obj.del();
                    layer.close(index);
                    // console.log(data);
                    get_delete('unionhygene_reason','ID',data['ID']);
                });
            }
        });
    });
}
function ajaxTable(TableID,UrlData,TableFilter) {
    layui.use('table', function(){
        var table = layui.table;
        
        // Tickets
        table.render({
            elem: '#'+TableID
            ,height: '200'
            ,url: '../../system/hlss.php?p=admin/'+UrlData //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'Class', title: '班级'}
                ,{field: 'SleepNumber', title: '寝室编号'}
                ,{field: 'Times', title: '时间', sort: true}
                ,{field: "Teacher", title: '上报账号'}
                ,{field: "SleepType", title: '寝室类型'} 
                ,{title: '操作', width: 200, templet: '#toolEventDemo', fixed: 'right'}
            ]]
        });
        table.on('tool('+TableFilter+')', function(obj){
            var data = obj.data;
            var layEvent = obj.event;
            var tr = obj.tr;
            
            if(layEvent === 'del'){
                layer.confirm('确定删除吗？', function(index){
                    obj.del();
                    layer.close(index);
                    // console.log(data);
                    get_delete(TableFilter,'ID',data['ID']);
                });
            }
        });
    });
}
function sleep() {
    ajaxTable('goodSleep','good','goodSleep');
    ajaxTable('badSleep','bad','badSleep');
}
function userTable(TableID,UrlData,TableFilter) {
    layui.use('table', function(){
        var table = layui.table;
        
        // Tickets
        table.render({
            elem: '#'+TableID
            ,height: 'full'
            ,url: '../../system/hlss.php?p=admin/'+UrlData //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'username', title: '账号'}
                ,{field: 'branch', title: '分支'}
                ,{field: 'teachername', title: '教师名称'}
                ,{field: 'limits', title: '账户权限'} 
                ,{title: '操作', width: 200, templet: '#toolEventDemo', fixed: 'right'}
            ]]
        });
        table.on('tool('+TableFilter+')', function(obj){
            var data = obj.data;
            var layEvent = obj.event;
            var tr = obj.tr;
            
            if(layEvent === 'del'){
                layer.confirm('确定删除吗？', function(index){
                    obj.del();
                    layer.close(index);
                    // console.log(data['username']);
                    get_delete('user','userName',data['username']);
                    get_delete('login','userName',data['username']);
                });
            }
        });
    });
}
function user_common() {
    userTable('userTable','commonuser','userTable');
}
function classmaster() {
    layui.use('table', function(){
        var table = layui.table;
        
        // Tickets
        table.render({
            elem: '#classMasterTable'
            ,height: 'full'
            ,url: '../../system/hlss.php?p=admin/classmaster' //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'username', title: '账号'}
                ,{field: 'branch', title: '分支'}
                ,{field: 'teachername', title: '教师名称'}
                ,{field: 'class_number', title: "账号班级"}
                ,{field: 'limits', title: '账户权限'} 
                ,{title: '操作', width: 200, templet: '#toolEventDemo', fixed: 'right'}
            ]]
        });
        table.on('tool(classMasterTable)', function(obj){
            var data = obj.data;
            var layEvent = obj.event;
            var tr = obj.tr;
            
            if(layEvent === 'del'){
                layer.confirm('确定删除吗？', function(index){
                    obj.del();
                    layer.close(index);
                    // console.log(data);
                    get_delete('user','userName',data['username']);
                    get_delete('login','userName',data['username']);
                });
            }
        });
    });
}
function register() {
    // console.log('register');
}
function class_control() {
    layui.use('table', function(){
        var table = layui.table;
        
        // Tickets
        table.render({
            elem: '#classControlTable'
            ,height: 'full'
            ,url: '../../system/hlss.php?p=admin/class' //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'Class', title: '班级编号', sort: true}
                ,{field: 'Score', title: '班级分数', sort: true}
                ,{field: 'class_master', title: '班主任账号'}
                ,{title: '操作', width: 200, templet: '#toolEventDemo', fixed: 'right'}
            ]]
        });
        table.on('tool(classControlTable)', function(obj){
            var data = obj.data;
            var layEvent = obj.event;
            var tr = obj.tr;
            
            if(layEvent === 'del'){
                layer.confirm('确定删除吗？', function(index){
                    obj.del();
                    layer.close(index);
                    // console.log(data);
                    get_delete('class','Class',data['Class']);
                });
            }
        });
    });
}
function class_register() {
    document.getElementById('class_register_container').style.display = "flex";
    layui.use('form', function(){ 
        var form = layui.form;
        
        form.on('select(class_register_operation_type)', function(data){
            console.log(data.value);
            document.getElementById('class_register_container').style.display = "none";
            document.getElementById('class_change').style.display = "none";
            document.getElementById('class_bonus_points').style.display = "none";
            document.getElementById(data.value).style.display = "flex";
        });
    });
    $('#class_register_button').click(function() {
        var register_class_number = document.getElementById('class_register_number').value;
        $.get('../../../system/hlss.php?p=admin/register',{'class':register_class_number},function(data) {
            alert(data);
        },'json');
    });
    $('#class_change_button').click(function() {
        var register_change_number = document.getElementById('class_register_change_number').value;
        var register_change_master = document.getElementById('class_register_change_master').value;
        $.get('../../../system/hlss.php?p=admin/change',{'class':register_change_number,'master':register_change_master},function(data) {
            alert(data);
        },'json');
    });
    $('#class_bonus_button').click(function() {
        var register_bonus_number = document.getElementById('class_register_bonus_number').value;
        var register_bonus_points = document.getElementById('class_register_bonus_master').value;
        $.get('../../../system/hlss.php?p=admin/bonus',{'class':register_bonus_number,'points':register_bonus_points},function(data) {
            alert(data);
        },'json');
    });
}
function system_info() {
    $.get('../../../system/module/mode/system.php',function(data) {
        document.getElementById('php_os').innerHTML = data['php_os'];
        document.getElementById('gd').innerHTML = data['gd'];
        document.getElementById('http_host').innerHTML = data['http_host'];
        document.getElementById('server_name').innerHTML = data['server_name'];
        document.getElementById('server_port').innerHTML = data['server_port'];
        document.getElementById('server_addr').innerHTML = data['server_addr'];
        document.getElementById('server_software').innerHTML = data['server_software'];
        document.getElementById('document_root').innerHTML = data['document_root'];
        document.getElementById('php_version').innerHTML = data['php_version'];
        document.getElementById('upload_max').innerHTML = data['upload_max_filesize'];
        document.getElementById('post_max').innerHTML = data['post_max_size'];
        document.getElementById('file_max').innerHTML = data['max_file_uploads'];
        document.getElementById('memory_limit').innerHTML = data['memory_limit'];
        document.getElementById('imap').innerHTML = data['imap'];
        document.getElementById('socket').innerHTML = data['socket'];
        document.getElementById('curl').innerHTML = data['curl'];
        document.getElementById('session_path').innerHTML = data['session_save_path'];
        document.getElementById('standard').innerHTML = data['standard'];
        document.getElementById('pthreads').innerHTML = data['pthreads'];
        document.getElementById('xcache').innerHTML = data['xcache'];
        document.getElementById('apc').innerHTML = data['apc'];
        document.getElementById('eaccelerator').innerHTML = data['eaccelerator'];
        document.getElementById('wincache').innerHTML = data['wincache'];
        document.getElementById('zendopcache').innerHTML = data['zendopcache'];
        document.getElementById('memcache').innerHTML = data['memcache'];
        document.getElementById('memcached').innerHTML = data['memcached'];
        
    },'json');
}
function team() {
    console.log('team');
}
