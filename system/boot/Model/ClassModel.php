<?php
namespace Boot\Model;

use Boot\Config\MySQL;
use User\devhelp\user_login;

class ClassModel {
    static $SQL,$result;
    public static function getClassNumber() {
        self::$SQL = "SELECT * FROM class WHERE class_master = '".self::Username()."';";
        self::$result = self::db()->query(self::$SQL)->fetch_array( MYSQLI_ASSOC );
        return self::$result['Class'];
    }
    public static function classNumber() {
        $Class = self::getClassNumber();
        $newTicketsSQL = "select count(*) from week where class_master_state = 'false' and Class = '$Class';";
        $newTicketsNumber = self::db()->query($newTicketsSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        $newMajorTicketsSQL = "select count(*) from week where class_master_state = 'false' and tickettype = 'major' and Class = '$Class';";
        $newMajorTicketNumber = self::db()->query($newMajorTicketsSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        $weekTicketSQL = "select count(*) from week where Class = '$Class';";
        $weekTicketNumber =  self::db()->query($weekTicketSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        $weekMajorTicketsSQL = "select count(*) from week where tickettype = 'major' and Class = '$Class';";
        $weekMajorTicketsNumber = self::db()->query($weekMajorTicketsSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        $ticketsSQL = "select count(*) from tickets where Class = '$Class';";
        $ticketsNumber = self::db()->query($ticketsSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        $majorTicketsSQL = "select count(*) from tickets where tickettype = 'major' and Class = '$Class';";
        $majorTicketsNumber = self::db()->query($majorTicketsSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        return [
            'newTicketsNumber' => $newTicketsNumber,
            'newMajorTicketNumber' => $newMajorTicketNumber,
            'weekTicketNumber' => $weekTicketNumber,
            'weekMajorTicketsNumber' => $weekMajorTicketsNumber,
            'ticketsNumber' => $ticketsNumber,
            'majorTicketsNumber' => $majorTicketsNumber,
        ];
    }
    public static function getWeekTickets() {
        self::$SQL = "SELECT * FROM week WHERE Class = '".self::getClassNumber()."' order by ID desc;";
        self::$result = self::db()->query(self::$SQL);
        return self::$result;
    }
    public static function getWeekMajorTickets() {
        self::$SQL = "SELECT * FROM week WHERE Class = '".self::getClassNumber()."' AND tickettype = 'major' order by ID desc;";
        self::$result = self::db()->query(self::$SQL);
        return self::$result;
    }
    public static function getTickets() {
        self::$SQL = "SELECT * FROM tickets WHERE Class = '".self::getClassNumber()."' order by ID desc;";
        self::$result = self::db()->query(self::$SQL);
        return self::$result;
    }
    public static function getMajorTickets() {
        self::$SQL = "SELECT * FROM tickets WHERE Class = '".self::getClassNumber()."' AND tickettype = 'major' order by ID desc;";
        self::$result = self::db()->query(self::$SQL);
        return self::$result;
    }
    public static function fuzzyQuery($queryInfo) {
        self::$SQL = "SELECT * FROM tickets WHERE StudentName LIKE '%$queryInfo%' AND Class = '".self::getClassNumber()."';";
        self::$result = self::db()->query(self::$SQL);
        return self::$result;
    }
    public static function ticketRead() {
        $SQL = "UPDATE week SET class_master_state = 'True' WHERE class_master_state = 'false' AND Class = '".self::getClassNumber()."';";
        $SQL .= "UPDATE tickets SET class_master_state = 'True' WHERE class_master_state = 'false' AND Class = '".self::getClassNumber()."';";
        self::$result = self::db()->multi_query($SQL);
        return self::$result;
    }
    public static function getUnionScore() {
        $unionSportScoreSQL = "SELECT * FROM unionsport WHERE Class = '".self::getClassNumber()."';";
        $unionHygieneScoreSQL = "SELECT * FROM unionhygene WHERE Class = '".self::getClassNumber()."';";
        $unionSportScore = self::db()->query($unionSportScoreSQL)->fetch_array(MYSQLI_ASSOC);
        $unionHygieneScore = self::db()->query($unionHygieneScoreSQL)->fetch_array(MYSQLI_ASSOC);
        return [
            'StandardBearer' => $unionSportScore['StandardBearer'],
            'Queue' => $unionSportScore['Queue'],
            'Slogan' => $unionSportScore['Slogan'],
            'SportScore' => $unionSportScore['Score'],
            'Area' => $unionHygieneScore['Area'],
            'Class' => $unionHygieneScore['Classroom'],
            'HygieneScore' => $unionHygieneScore['Score'],
        ];
    }
    public static function getSportReason() {
        self::$SQL = "SELECT * FROM unionsport_reason WHERE Class = '".self::getClassNumber()."'";
        self::$result = self::db()->query(self::$SQL);
        return self::$result;
    }
    public static function getHygieneReason() {
        self::$SQL = "SELECT * FROM unionhygene_reason WHERE Class = '".self::getClassNumber()."'";
        self::$result = self::db()->query(self::$SQL);
        return self::$result;
    }
    public static function getGoodSleep() {
        self::$SQL = "SELECT * FROM goodsleep WHERE Class = '".self::getClassNumber()."'";
        self::$result = self::db()->query(self::$SQL);
        return self::$result;
    }
    public static function getBadSleep() {
        self::$SQL = "SELECT * FROM badsleep WHERE Class = '".self::getClassNumber()."'";
        self::$result = self::db()->query(self::$SQL);
        return self::$result;
    }
    private static function Username() {
        return user_login::getUsername();
    }
    private static function db() {
        return MySQL::connect();
    }
}