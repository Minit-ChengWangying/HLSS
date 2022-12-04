<?php
namespace Boot;

class router {
    public static function Path() {
        $path = empty($_GET['p'])?'index/index':trim($_GET['p']);
        $path_arr = explode('/',$path);   // 将路径通过/分开
        $class_arr = explode('.',$path_arr[0]);
        $count = count($class_arr);   // 计算总数
        $class_name = '\\Boot\Controller\\';
        for($i=0;$i<$count;$i++) {
            if($i == $count-1) {
                $class_name .= ucfirst($class_arr[$i]).'Controller';
            }else {
                $class_name .= $class_name[$i].'\\';
            }
        }
        return [
            'class_name' => $class_name,   // 对象名
            'action' => $path_arr[1] ?? 'index'   // 方法名 
        ];
    }
}

?>