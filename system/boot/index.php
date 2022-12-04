<?php
/** .-------------------------------------------------------------------
 * |  Software: [Xinxiang City Longquan High School Credit System]
 * |-------------------------------------------------------------------
 * |    Author: 王迈新
 * | Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace Boot;

require __DIR__ . '/../../vendor/autoload.php';

$msg = '';

if (constant('SYSTEM_MODE') == FALSE) {
    $msg .= 'The system is temporarily inaccessible!';
}
if ($msg) {
    die('<h1 align="center" style="margin-top: 20px;">' . $msg . '</h1>');
}

use Boot\App;
App::start();

?>