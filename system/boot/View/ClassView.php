<?php
namespace Boot\View;

use Boot\Model\ClassModel;

class ClassView {
    public static function index() {
        var_dump(ClassModel::getClassNumber());
    }
    public static function classNumber() {
        echo json_encode(array('error'=>0,'data'=>ClassModel::classNumber()));
    }
    public static function getWeekTickets() {
        $row = mysqli_fetch_all(ClassModel::getWeekTickets(), MYSQLI_ASSOC);
        echo json_encode(array('error'=>0,'data'=>$row));
    }
    public static function getWeekMajorTickets() {
        $row = mysqli_fetch_all(ClassModel::getWeekMajorTickets(), MYSQLI_ASSOC);
        echo json_encode(array('error'=>0,'data'=>$row));
    }
    public static function getTickets() {
        $row = mysqli_fetch_all(ClassModel::getTickets(), MYSQLI_ASSOC);
        echo json_encode(array('error'=>0,'data'=>$row));
    }
    public static function getMajorTickets() {
        $row = mysqli_fetch_all(ClassModel::getMajorTickets(), MYSQLI_ASSOC);
        echo json_encode(array('error'=>0,'data'=>$row));
    }
    public static function fuzzyQuery($QueryInfo) {
        $row = mysqli_fetch_all(ClassModel::fuzzyQuery($QueryInfo), MYSQLI_ASSOC);
        echo json_encode(array('error'=>0,'data'=>$row));
    }
    public static function ticketRead() {
        echo json_encode(ClassModel::ticketRead());
    }
    public static function getUnionScore() {
        echo json_encode(array('error'=>0,'data'=>ClassModel::getUnionScore()));
    }
    public static function getSportReason() {
        $row = mysqli_fetch_all(ClassModel::getSportReason(), MYSQLI_ASSOC);
        echo json_encode(array('error'=>0,'data'=>$row));
    }
    public static function getHygieneReason() {
        $row = mysqli_fetch_all(ClassModel::getHygieneReason(), MYSQLI_ASSOC);
        echo json_encode(array('error'=>0,'data'=>$row));
    }
    public static function getGoodSleep() {
        $row = mysqli_fetch_all(ClassModel::getGoodSleep(), MYSQLI_ASSOC);
        echo json_encode(array('error'=>0,'data'=>$row));
    }
    public static function getBadSleep() {
        $row = mysqli_fetch_all(ClassModel::getBadSleep(), MYSQLI_ASSOC);
        echo json_encode(array('error'=>0,'data'=>$row));
    }
}