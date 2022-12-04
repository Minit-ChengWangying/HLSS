<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace User\devhelp;

require('../config/connectMysql.php');

use User\devhelp\user_login;

$Login = new user_login;


// get Class
$selcet = "select * from class order by Class asc;";
$selcet_result = $db->query($selcet);

$row = $selcet_result->fetch_array( MYSQLI_ASSOC );
$rows = [$row];

while ($row = $selcet_result->fetch_array( MYSQLI_ASSOC )) {
    $rows[] = $row;
}

// var_dump( $rows );

?>