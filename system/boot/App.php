<?php
/** .-------------------------------------------------------------------
 * |  Software: [Xinxiang City Longquan High School Credit System]
 * |-------------------------------------------------------------------
 * |    Author: 王迈新
 * | Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace Boot;

use Boot\router;

class App {
    public static function start() {
        self::loadConfig();
        self::runAction();
    }
    private static function loadConfig() {

    }
    private static function runAction() {
        $path_arr = router::Path();
        $class_name = $path_arr['class_name'];
        // var_dump($class_name);
        try {
            $class = new $class_name();
            $method = $path_arr['action'];
            if(method_exists($class,$method)) {
                return $class->$method();
            }else {
                throw new \Exception('控制器'.$class_name.'不存在方法'.$method);
            }
        }catch(\Throwable $e) {
            throw new \Exception('不存在控制器'.$class_name);
        }
    }
}

?>