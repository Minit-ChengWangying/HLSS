<?php
/** .-------------------------------------------------------------------
 * |  Software: [Xinxiang City Longquan High School Credit System]
 * |-------------------------------------------------------------------
 * |    Author: 王迈新
 * | Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace Boot;

class Error {
    /**
     * false: 生产环境
     * true: 开发环境
     */
    protected $debug;
    public function __construct($debug = true) {
        $this->debug = $debug;
    }
    public function error() {
        error_reporting(0);   // 关闭所有错误显示
        set_error_handler([$this,'handle'],E_ALL | E_STRICT);   
    }
    public function handle($code, $error, $file, $line) {
        $msg = $error . "($code)" . $file . "($line)";
        switch($code) {
            case E_NOTICE:
                if($this->debug) {   // 当debug = true时执行下面
                    echo $msg;
                }
                break;
            default:
                if($this->debug) {
                    echo $msg;
                }else {   // 当debug = false时执行下面
                    # 后续版本跟进
                }
                break;
        }
    }
}

?>