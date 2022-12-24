<?php
    function get_server_info()
    {
        // 定义输出常量
        define('YES', 'Yes');
        define('NO', '<span style="color:red">No</span>');
        
        // 服务器系统
        $data['php_os'] = PHP_OS;
        // 服务器访问地址
        $data['http_host'] = $_SERVER['HTTP_HOST'];
        // 服务器名称
        $data['server_name'] = $_SERVER['SERVER_NAME'];
        // 服务器端口
        $data['server_port'] = $_SERVER['SERVER_PORT'];
        // 服务器地址
        $data['server_addr'] = isset($_SERVER['LOCAL_ADDR']) ? $_SERVER['LOCAL_ADDR'] : $_SERVER['SERVER_ADDR'];
        // 服务器软件
        $data['server_software'] = $_SERVER['SERVER_SOFTWARE'];
        // 站点目录
        $data['document_root'] = isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : DOC_PATH;
        // PHP版本
        $data['php_version'] = PHP_VERSION;
        // 数据库驱动
        // $data['db_driver'] = Config::get('database.type');
        // php配置文件
        // $data['php_ini'] = @php_ini_loaded_file();
        // 最大上传
        $data['upload_max_filesize'] = ini_get('upload_max_filesize');
        // 最大提交
        $data['post_max_size'] = ini_get('post_max_size');
        // 最大提交文件数
        $data['max_file_uploads'] = ini_get('max_file_uploads');
        // 内存限制
        $data['memory_limit'] = ini_get('memory_limit');
        // 检测gd扩展
        $data['gd'] = extension_loaded('gd') ? YES : NO;
        // 检测imap扩展
        $data['imap'] = extension_loaded('imap') ? YES : NO;
        // 检测socket扩展
        $data['sockets'] = extension_loaded('sockets') ? YES : NO;
        // 检测curl扩展
        $data['curl'] = extension_loaded('curl') ? YES : NO;
        // 会话保存路径
        $data['session_save_path'] = session_save_path() ?: $_SERVER['TMP'];
        // 检测standard库是否存在
        $data['standard'] = extension_loaded('standard') ? YES : NO;
        // 检测多线程支持
        $data['pthreads'] = extension_loaded('pthreads') ? YES : NO;
        // 检测XCache支持
        $data['xcache'] = extension_loaded('XCache') ? YES : NO;
        // 检测APC支持
        $data['apc'] = extension_loaded('APC') ? YES : NO;
        // 检测eAccelerator支持
        $data['eaccelerator'] = extension_loaded('eAccelerator') ? YES : NO;
        // 检测wincache支持
        $data['wincache'] = extension_loaded('wincache') ? YES : NO;
        // 检测ZendOPcache支持
        $data['zendopcache'] = extension_loaded('Zend OPcache') ? YES : NO;
        // 检测memcache支持
        $data['memcache'] = extension_loaded('memcache') ? YES : NO;
        // 检测memcached支持
        $data['memcached'] = extension_loaded('memcached') ? YES : NO;
        // 已经安装模块
        // $loaded_extensions = get_loaded_extensions();
        // $extensions = '';
        // foreach ($loaded_extensions as $key => $value) {
        //     $extensions .= $value . ', ';
        // }
        // $data['extensions'] = $extensions;
        return $data;
    }

    // var_dump(get_server_info());
echo json_encode(get_server_info());
?>