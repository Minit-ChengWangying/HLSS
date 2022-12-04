<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace User\politics\module;

// 下面只有在调试时候才可以打开
// require('../../config/connectMysql.php'); 

// get Class
$queryClass = "select * from class order by Class asc";
$queryClass_result = $db->query($queryClass);

$firstClass = $queryClass_result->fetch_array( MYSQLI_ASSOC )['Class'];
$rows = [];

while ($row = $queryClass_result->fetch_array( MYSQLI_ASSOC )) {
    $rows[] = $row;
}
foreach ($rows as $row) {
    // var_dump($row['Class']);
}

?>