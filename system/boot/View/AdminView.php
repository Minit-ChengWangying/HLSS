<?php
namespace Boot\View;

use Boot\Model\AdminModel;

class AdminView {
    public static function index() {
        var_dump(AdminModel::index());
    }
    public static function getTickets() {
        $row = mysqli_fetch_all(AdminModel::getTickets()['data'], MYSQLI_ASSOC);
        $count = AdminModel::getTickets()['count'];
        for($i=0;$i<$count;$i++) {
            $row[$i]['Times'] = date( "Y-m-d H:i:s",$row[$i]['Time']);
        }
        echo json_encode(array(
            "code"=>0,
            "msg"=>'',
            "count"=>AdminModel::getTickets()['count'],
            "data" => $row
        ));
    }
    public static function Query($queryData) {
        $row = mysqli_fetch_all(AdminModel::fuzzyQuery($queryData)['data'], MYSQLI_ASSOC);
        $count = AdminModel::fuzzyQuery($queryData)['count'];
        for($i=0;$i<$count;$i++) {
            $row[$i]['Times'] = date( "Y-m-d H:i:s",$row[$i]['Time']);
        }
        echo json_encode(array(
            "code"=>0,
            "msg"=>'',
            "count"=>AdminModel::getTickets()['count'],
            "data" => $row
        ));
    }
    public static function unionSport() {
        $row = mysqli_fetch_all(AdminModel::unionSport()['data'], MYSQLI_ASSOC);
        $count = AdminModel::unionSport()['count'];
        for($i=0;$i<$count;$i++) {
            $row[$i]['Times'] = date( "Y-m-d H:i:s",$row[$i]['Time']);
        }
        echo json_encode(array(
            "code"=>0,
            "msg"=>'',
            "count"=>AdminModel::unionSport()['count'],
            "data" => $row
        ));
    }
    public static function unionHygiene() {
        $row = mysqli_fetch_all(AdminModel::unionHygiene()['data'], MYSQLI_ASSOC);
        $count = AdminModel::unionHygiene()['count'];
        for($i=0;$i<$count;$i++) {
            $row[$i]['Times'] = date( "Y-m-d H:i:s",$row[$i]['Time']);
        }
        echo json_encode(array(
            "code"=>0,
            "msg"=>'',
            "count"=>AdminModel::unionHygiene()['count'],
            "data" => $row
        ));
    }
    public static function goodSleep() {
        $row = mysqli_fetch_all(AdminModel::sleepGood()['data'], MYSQLI_ASSOC);
        $count = AdminModel::sleepGood()['count'];
        for($i=0;$i<$count;$i++) {
            $row[$i]['Times'] = date( "Y-m-d H:i:s",$row[$i]['Time']);
        }
        echo json_encode(array(
            "code"=>0,
            "msg"=>'',
            "count"=>AdminModel::sleepGood()['count'],
            "data" => $row
        ));
    }
    public static function badSleep() {
        $row = mysqli_fetch_all(AdminModel::sleepBad()['data'], MYSQLI_ASSOC);
        $count = AdminModel::sleepBad()['count'];
        for($i=0;$i<$count;$i++) {
            $row[$i]['Times'] = date( "Y-m-d H:i:s",$row[$i]['Time']);
        }
        echo json_encode(array(
            "code"=>0,
            "msg"=>'',
            "count"=>AdminModel::sleepBad()['count'],
            "data" => $row
        ));
    }
    public static function commonUser() {
        $row = mysqli_fetch_all(AdminModel::commonUser()['data'], MYSQLI_ASSOC);
        $count = AdminModel::commonUser()['count'];
        echo json_encode(array(
            "code"=>0,
            "msg"=>'',
            "count"=>$count,
            "data" => $row
        ));
    }
    public static function classMasterUser() {
        $row = mysqli_fetch_all(AdminModel::classMasterUser()['data'], MYSQLI_ASSOC);
        $count = AdminModel::classMasterUser()['count'];
        echo json_encode(array(
            "code"=>0,
            "msg"=>'',
            "count"=>$count,
            "data" =>$row,
        ));
    }
    public static function getClass() {
        $row = mysqli_fetch_all(AdminModel::getClass()['data'], MYSQLI_ASSOC);
        $count = AdminModel::getClass()['count'];
        echo json_encode(array(
            "code"=>0,
            "msg"=>'',
            "count"=>$count,
            "data" =>$row,
        ));
    }
    public static function registerClass($class) {
        $result = AdminModel::registerClass($class);
        echo json_encode($result);
    }
    public static function changeClass($class,$class_master) {
        $result = AdminModel::changeClass($class,$class_master);
        echo json_encode($result);
    }
    public static function bonusClass($points,$class) {
        $result = AdminModel::bonusClass($points,$class);
        echo json_encode($result);
    }
    public static function delete($sheet,$row,$value) {
        echo json_encode(AdminModel::delete($sheet,$row,$value));
    }
    public static function systemSurvey() {
        echo json_encode(AdminModel::systemSurvey());
    }
}
?>