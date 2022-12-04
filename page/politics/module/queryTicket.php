<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace User\politics\module;

class queryTicket {
    static $sql = "NULL";  // 静态方法需要声明静态变量
    static $sql_result = "NULL";
    /**
     * Author: WangMaixin
     * Version: 202211242141
     * @return 新增罚单数
     */
    public static function newTicketNumber ($db) {
        self::$sql = "select count(*) from week where State = 'Flase';";
        self::$sql_result = $db->query(self::$sql)->fetch_array( MYSQLI_ASSOC );
        return self::$sql_result['count(*)'];
    }
    /**
     * Author: WangMaixin
     * Version: 202211251023
     * @return 新增重大违纪罚单数
     */
    public static function newMajorTicketNumber ($db) {
        self::$sql = "select count(*) from week where State = 'Flase' and tickettype = 'major';";
        self::$sql_result = $db->query(self::$sql)->fetch_array( MYSQLI_ASSOC );
        return self::$sql_result['count(*)'];
    }
    /**
     * Author: WangMaixin
     * Version: 202211251023
     * @return 本周新增罚单数
     */
    public static function weekTicketNumber ($db) {
        self::$sql = "select count(*) from week;";
        self::$sql_result = $db->query(self::$sql)->fetch_array( MYSQLI_ASSOC );
        return self::$sql_result['count(*)'];
    }
    /**
     * Author: WangMaixin
     * Version: 202211251023
     * @return 本周新增重大违纪罚单数
     */
    public static function weekMajorTicketNumber ($db) {
        self::$sql = "select count(*) from week where tickettype = 'major';";
        self::$sql_result = $db->query(self::$sql)->fetch_array( MYSQLI_ASSOC );
        return self::$sql_result['count(*)'];
    }
    /**
     * Author: WangMaixin
     * Version: 202211251023
     * @return 学期新增罚单数
     */
    public static function TicketNumber ($db) {
        self::$sql = "select count(*) from tickets";
        self::$sql_result = $db->query(self::$sql)->fetch_array( MYSQLI_ASSOC );
        return self::$sql_result['count(*)'];
    }
    /**
     * Author: WangMaixin
     * Version: 202211251023
     * @return 学期新增重大违纪罚单数
     */
    public static function MajorTicketNumber ($db) {
        self::$sql = "select count(*) from tickets where tickettype = 'major';";
        self::$sql_result = $db->query(self::$sql)->fetch_array( MYSQLI_ASSOC );
        return self::$sql_result['count(*)'];
    }
}

?>