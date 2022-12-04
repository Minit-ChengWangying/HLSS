<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* Function: Desert
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace Module\Politics;

require('../Mysql/connectMysql.php');

$sport_class = $_GET['sportclass'];
$hygiene_class = $_GET['hygieneclass'];

// getSportClassScores
$querySportClassScores = "select * from unionsport where Class='$sport_class';";
$querySportClassScores_result = $db->query($querySportClassScores)->fetch_array( MYSQLI_ASSOC );

//getHygieneClassScores
$queryHygieneClassScores = "select * from unionhygene where Class='$hygiene_class';";
$queryHygieneClassScores_result = $db->query($queryHygieneClassScores)->fetch_array( MYSQLI_ASSOC );

$Score = array(
    'SportClass' => $querySportClassScores_result['Class'],
    'HyigeneClass' => $queryHygieneClassScores_result['Class'],
    'StandardBearer' => $querySportClassScores_result['StandardBearer'],
    'Queue' => $querySportClassScores_result['Queue'],
    'Slogan' => $querySportClassScores_result['Slogan'],
    'SportScore' => $querySportClassScores_result['Score'],
    'Area' => $queryHygieneClassScores_result['Area'],
    'Classroom' => $queryHygieneClassScores_result['Classroom'],
    'HyigeneScore' => $queryHygieneClassScores_result['Score'],
);

echo json_encode($Score);


?>