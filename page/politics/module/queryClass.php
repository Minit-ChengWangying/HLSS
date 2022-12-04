<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
date_default_timezone_set('PRC'); /* 时区 */

$refreshTime = time();

$queryClassRank = "select * from class order by Score desc;";
$queryClassRank_result = $db->query($queryClassRank);

$classRow = $queryClassRank_result->fetch_array( MYSQLI_ASSOC );
$classRows = [$classRow];

while ($classRow = $queryClassRank_result->fetch_array( MYSQLI_ASSOC )) {
    $classRows[] = $classRow;
}
?>