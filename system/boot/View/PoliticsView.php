<?php
namespace Boot\View;

use Boot\Model\PoliticsModel;

class PoliticsView {
    static $arrayRow,$Array;
    public static function getWeekTicket()  {
        self::$arrayRow = mysqli_fetch_all(PoliticsModel::queryWeekTicket(), MYSQLI_ASSOC);
        echo json_encode(array("error"=>0, "data" => self::$arrayRow));
    }
    public static function numberOfTicket() {
        self::$Array = array(
            "newticket" => PoliticsModel::newTicketNumber(),
            "newmajorticket" => PoliticsModel::newMajorTicketNumber(),
            "weekticket" => PoliticsModel::weekTicketNumber(),
            "weekmajorticket" => PoliticsModel::weekMajorTicketNumber(),
            "ticket" => PoliticsModel::TicketNumber(),
            "majorticket" => PoliticsModel::MajorTicketNumber(),
        );
        echo json_encode(array("error"=>0,"data"=>self::$Array));
    }
    public static function getTicekts() {
        self::$arrayRow = mysqli_fetch_all(PoliticsModel::queryTickets(), MYSQLI_ASSOC);
        echo json_encode(array("error"=>0, "data" => self::$arrayRow));
    }
    public static function getWeekMajorTicekts() {
        self::$arrayRow = mysqli_fetch_all(PoliticsModel::queryWeekMajorTickets(), MYSQLI_ASSOC);
        echo json_encode(array("error"=>0, "data" => self::$arrayRow));
    }
    public static function getMajorTicekts() {
        self::$arrayRow = mysqli_fetch_all(PoliticsModel::queryMajorTickets(), MYSQLI_ASSOC);
        echo json_encode(array("error"=>0, "data" => self::$arrayRow));
    }
    public static function getFuzzyQuery($queryCriteria,$queryInfo) {
        self::$arrayRow = mysqli_fetch_all(PoliticsModel::fuzzyQuery($queryCriteria,$queryInfo), MYSQLI_ASSOC);
        echo json_encode(array("error"=>0, "data" => self::$arrayRow));
    }
    public static function getUnionSportReason($Class) {
        self::$arrayRow = mysqli_fetch_all(PoliticsModel::unionSportReason($Class), MYSQLI_ASSOC);
        echo json_encode(array("error"=>0, "data" => self::$arrayRow));
    }
    public static function getUnionHygieneReason($Class) {
        self::$arrayRow = mysqli_fetch_all(PoliticsModel::unionHygieneReason($Class), MYSQLI_ASSOC);
        echo json_encode(array("error"=>0, "data" => self::$arrayRow));
    }
    public static function getSleepGood() {
        self::$arrayRow = mysqli_fetch_all(PoliticsModel::sleepGood(), MYSQLI_ASSOC);
        echo json_encode(array("error"=>0, "data" => self::$arrayRow));
    }
    public static function getSleepBad() {
        self::$arrayRow = mysqli_fetch_all(PoliticsModel::sleepBad(), MYSQLI_ASSOC);
        echo json_encode(array("error"=>0, "data" => self::$arrayRow));
    }
    public static function getSleepClassGood($Class) {
        self::$arrayRow = mysqli_fetch_all(PoliticsModel::sleepClassGood($Class), MYSQLI_ASSOC);
        echo json_encode(array("error"=>0, "data" => self::$arrayRow));
    }
    public static function getSleepClassBad($Class) {
        self::$arrayRow = mysqli_fetch_all(PoliticsModel::sleepClassBad($Class), MYSQLI_ASSOC);
        echo json_encode(array("error"=>0, "data" => self::$arrayRow));
    }
}
?>