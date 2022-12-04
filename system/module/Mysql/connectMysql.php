<?php
namespace Module\Mysql;

$json_string = file_get_contents('../../../config.json');
$data = json_decode($json_string, true);

$host = $data['database']['HOST'];
$databaseuser = $data['database']['USERNAME'];
$password = $data['database']['PASSWORD'];
$databasename = $data['database']['DATABASESHEET'];
// 连接数据库
$db = mysqli_connect( $host, $databaseuser, $password, $databasename);
// 判断数据库连接是否成功
if( $db->connect_errno <> 0){
	die('数据库系统正在维护中');
}
// 定义与数据库传输的编码
$db->query("SET NAMES UTF8");

?>