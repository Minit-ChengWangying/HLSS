<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* Function: get config file limit name
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace User\config;

class getLimitJson {
    /**
     * Author: WangMaixin
     * version: 202211052128
     * @return
     */
    public static function get($filename) {
        $json_string = file_get_contents('../../config.json');
        $data = json_decode($json_string, true);
        return $data['Limits'][$filename];
    }
}