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
     * Author: WangMaixin
     * Version: 202212031520
     * @param 数据库连接信息
     */
    private static function db() {
        return MySQL::connect();
    }
}

?>