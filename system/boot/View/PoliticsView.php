<?php
namespace Boot\View;

use Boot\Model\PoliticsModel;

class PoliticsView {
    static $arrayRow,$Array;
    public static function get()  {
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
}
?>