<?php
namespace Boot\Model;

use Boot\Config\MySQL;

class PoliticsModel {
    static $Sql,$queryResult;
    /**
     * Author: WangMaixin
     * Version: 202212031523
     * @return 本周罚单详细信息
     */
    public static function queryWeekTicket() {
        self::$Sql = 'SELECT * FROM week;';
        self::$queryResult = self::db()->query(self::$Sql);
        return self::$queryResult;
    }
    /**
     * Author: WangMaixin
     * Version: 202212042139
     * @return 学期罚单详细信息
     */
    public static function queryTickets() {
        self::$Sql = 'SELECT * FROM tickets;';
        self::$queryResult = self::db()->query(self::$Sql);
        return self::$queryResult;
    }
    /**
     * Author: WangMaixin
     * Version: 202212042150
     * @return 本周重大违纪罚单
     */
    public static function queryWeekMajorTickets() {
        self::$Sql = 'SELECT * FROM week where tickettype = "major";';
        self::$queryResult = self::db()->query(self::$Sql);
        return self::$queryResult;
    }
    /**
     * Author: WangMaixin
     * Version: 202212042150
     * @return 学期重大违纪罚单
     */
    public static function queryMajorTickets() {
        self::$Sql = 'SELECT * FROM tickets where tickettype = "major";';
        self::$queryResult = self::db()->query(self::$Sql);
        return self::$queryResult;
    }
    /**
     * Author: WangMaixin
     * Version: 202211242141
     * @return 新增罚单数
     */
    public static function newTicketNumber () {
        self::$Sql = "select count(*) from week where State = 'Flase';";
        self::$queryResult = self::db()->query(self::$Sql)->fetch_array( MYSQLI_ASSOC );
        return self::$queryResult['count(*)'];
    }
    /**
     * Author: WangMaixin
     * Version: 202211251023
     * @return 新增重大违纪罚单数
     */
    public static function newMajorTicketNumber () {
        self::$Sql = "select count(*) from week where State = 'Flase' and tickettype = 'major';";
        self::$queryResult = self::db()->query(self::$Sql)->fetch_array( MYSQLI_ASSOC );
        return self::$queryResult['count(*)'];
    }
    /**
     * Author: WangMaixin
     * Version: 202211251023
     * @return 本周新增罚单数
     */
    public static function weekTicketNumber () {
        self::$Sql = "select count(*) from week;";
        self::$queryResult = self::db()->query(self::$Sql)->fetch_array( MYSQLI_ASSOC );
        return self::$queryResult['count(*)'];
    }
    /**
     * Author: WangMaixin
     * Version: 202211251023
     * @return 本周新增重大违纪罚单数
     */
    public static function weekMajorTicketNumber () {
        self::$Sql = "select count(*) from week where tickettype = 'major';";
        self::$queryResult = self::db()->query(self::$Sql)->fetch_array( MYSQLI_ASSOC );
        return self::$queryResult['count(*)'];
    }
    /**
     * Author: WangMaixin
     * Version: 202211251023
     * @return 学期新增罚单数
     */
    public static function TicketNumber () {
        self::$Sql = "select count(*) from tickets";
        self::$queryResult = self::db()->query(self::$Sql)->fetch_array( MYSQLI_ASSOC );
        return self::$queryResult['count(*)'];
    }
    /**
     * Author: WangMaixin
     * Version: 202211251023
     * @return 学期新增重大违纪罚单数
     */
    public static function MajorTicketNumber () {
        self::$Sql = "select count(*) from tickets where tickettype = 'major';";
        self::$queryResult = self::db()->query(self::$Sql)->fetch_array( MYSQLI_ASSOC );
        return self::$queryResult['count(*)'];
    }
    /**
     * Version: 202212051531
     * @return 模糊查询
     */
    public static function fuzzyQuery($queryCriteria,$queryInfo) {
        self::$Sql = "SELECT * FROM tickets WHERE $queryCriteria LIKE '%$queryInfo%';";
        self::$queryResult = self::db()->query(self::$Sql);
        return self::$queryResult;
    }
    /**
     * Version: 202212060955
     * @return 学生会体育部扣分原因
     */
    public static function unionSportReason($Class) {
        self::$Sql = "SELECT * FROM unionsport_reason WHERE Class = '$Class';";
        self::$queryResult = self::db()->query(self::$Sql);
        return self::$queryResult;
    }
    /**
     * Version: 202212060955
     * @return 学生会卫生部扣分原因
     */
    public static function unionHygieneReason($Class) {
        self::$Sql = "SELECT * FROM unionhygene_reason WHERE Class = '$Class';";
        self::$queryResult = self::db()->query(self::$Sql);
        return self::$queryResult;
    }
    /**
     * Version: 202212060955
     * @return 本周优寝
     */
    public static function sleepGood() {
        self::$Sql = "SELECT * FROM goodsleep";
        self::$queryResult = self::db()->query(self::$Sql);
        return self::$queryResult;
    }
    /**
     * Version: 202212060955
     * @return 本周差寝
     */
    public static function sleepBad() {
        self::$Sql = "SELECT * FROM badsleep";
        self::$queryResult = self::db()->query(self::$Sql);
        return self::$queryResult;
    }
    /**
     * Version: 202212060955
     * @return 班级优寝
     */
    public static function sleepClassGood($Class) {
        self::$Sql = "SELECT * FROM goodsleep WHERE Class = '$Class'";
        self::$queryResult = self::db()->query(self::$Sql);
        return self::$queryResult;
    }
    /**
     * Version: 202212060955
     * @return 班级差寝
     */
    public static function sleepClassBad($Class) {
        self::$Sql = "SELECT * FROM badsleep WHERE Class = '$Class'";
        self::$queryResult = self::db()->query(self::$Sql);
        return self::$queryResult;
    }
    /**
     * Version: 202212081041
     * @abstract 班级加分
     */
    public static function bounsPoints($Class,$Points) {
        $ScoresSQL = "SELECT * FROM class WHERE class = '$Class'";
        $Score = self::db()->query($ScoresSQL)->fetch_array( MYSQLI_ASSOC )['Score']+$Points;
        self::$Sql = "UPDATE class SET Score = '$Score' WHERE Class = '$Class';";
        self::$queryResult = self::db()->query(self::$Sql);
        return self::$queryResult;
    }
    /**
     * Author: WangMaixin
     * Version: 202212031520
     * @param 数据库连接信息
     */
    private static function db() {
        return MySQL::connect();
    }
}


?>