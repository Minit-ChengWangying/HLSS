<?php
namespace Boot\Model;

use Boot\Config\MySQL;

class AdminModel {
    static $SQL,$result;
    public static function index() {
        return 'admin->index()';
    }
    public static function getTickets() {
        $countSQL = "select count(*) from tickets;";
        $count = self::db()->query($countSQL)->fetch_array(MYSQLI_ASSOC)['count(*)'];
        self::$SQL = "SELECT * FROM tickets order by ID desc;";
        self::$result = self::db()->query(self::$SQL);
        return [
            'data' => self::$result,
            'count' => $count,
        ];
    }
    public static function fuzzyQuery($queryData) {
        $countSQL = "select count(*) from tickets WHERE StudentName LIKE '%$queryData%';;";
        $count = self::db()->query($countSQL)->fetch_array(MYSQLI_ASSOC)['count(*)'];
        self::$SQL = "SELECT * FROM tickets WHERE StudentName LIKE '%$queryData%';";
        self::$result = self::db()->query(self::$SQL);
        return [
            'data' => self::$result,
            'count' => $count,
        ];
    }
    public static function unionSport() {
        $countSQL = "select count(*) from unionsport_reason;";
        $count = self::db()->query($countSQL)->fetch_array(MYSQLI_ASSOC)['count(*)'];
        self::$SQL = "SELECT * FROM unionsport_reason;";
        self::$result = self::db()->query(self::$SQL);
        return [
            'data' => self::$result,
            'count' => $count,
        ];
    }
    public static function unionHygiene() {
        $countSQL = "select count(*) from unionhygene_reason;";
        $count = self::db()->query($countSQL)->fetch_array(MYSQLI_ASSOC)['count(*)'];
        self::$SQL = "SELECT * FROM unionhygene_reason;";
        self::$result = self::db()->query(self::$SQL);
        return [
            'data' => self::$result,
            'count' => $count,
        ];
    }
    public static function sleepGood() {
        $countSQL = "select count(*) from goodsleep;";
        $count = self::db()->query($countSQL)->fetch_array(MYSQLI_ASSOC)['count(*)'];
        self::$SQL = "SELECT * FROM goodsleep;";
        self::$result = self::db()->query(self::$SQL);
        return [
            'data' => self::$result,
            'count' => $count,
        ];
    }
    public static function sleepBad() {
        $countSQL = "select count(*) from badsleep;";
        $count = self::db()->query($countSQL)->fetch_array(MYSQLI_ASSOC)['count(*)'];
        self::$SQL = "SELECT * FROM badsleep;";
        self::$result = self::db()->query(self::$SQL);
        return [
            'data' => self::$result,
            'count' => $count,
        ];
    }
    public static function commonUser() {
        $countSQL = "SELECT count(*) FROM user WHERE branch != 'classmaster';";
        $count = self::db()->query($countSQL)->fetch_array(MYSQLI_ASSOC)['count(*)'];
        self::$SQL = "SELECT * FROM user WHERE branch != 'classmaster';";
        self::$result = self::db()->query(self::$SQL);
        return [
            'data' => self::$result,
            'count' => $count,
        ];
    }
    public static function classMasterUser() {
        $countSQL = "SELECT count(*) FROM user WHERE branch = 'classmaster';";
        $count = self::db()->query($countSQL)->fetch_array(MYSQLI_ASSOC)['count(*)'];
        self::$SQL = "SELECT * FROM user WHERE branch = 'classmaster';";
        self::$result = self::db()->query(self::$SQL);
        return [
            'data' => self::$result,
            'count' => $count,
        ];
    }
    public static function getClass() {
        $countSQL = "SELECT count(*) FROM class";
        $count = self::db()->query($countSQL)->fetch_array(MYSQLI_ASSOC)['count(*)'];
        self::$SQL = "SELECT * FROM class";
        self::$result = self::db()->query(self::$SQL);
        return [
            'data' => self::$result,
            'count' => $count,
        ];
    }
    public static function registerClass($class) {
        $msg = '';
        // if(!self::checkUser($class_master)) {return '班主任账号不存在!';}   // 检测账号是否存在
        // if(!self::checkClassMaster($class_master)) {return '班主任账号已绑定!';}    // 检测班主任账号是否绑定其他班级
        if(!self::checkClass($class)) {return '班级存在!';}    // 检测班级是否已经存在 
        self::$SQL = "INSERT INTO class (`Class`,`Score`,`class_master`) VALUES ('$class','100','');";
        self::$result = self::db()->query(self::$SQL);
        if(self::$result) {
            $msg = '创建成功!';
        } else {
            $msg = '创建失败!';
        }
        return $msg;
    }
    public static function changeClass($class,$class_master) {
        $msg = '';
        if(!self::checkUser($class_master)) {return '班主任账号不存在!';}
        if(self::checkClass($class)) {return '班级不存在!';}
        self::$SQL = "UPDATE class SET class_master = '$class_master' WHERE class = '$class';";
        self::$result = self::db()->query(self::$SQL);
        if(self::$result) {
            $msg = '更改成功!';
        } else {
            $msg = '更改失败!';
        }
        return $msg;
    }
    public static function bonusClass($points,$class) {
        $msg = '';
        if(self::checkClass($class)) {return '班级不存在!';}
        self::$SQL = "UPDATE class SET Score = '$points' WHERE Class = '$class';";
        self::$result = self::db()->query(self::$SQL);
        if(self::$result) {
            $msg = '改分成功!';
        } else {
            $msg = '改分失败!';
        }
        return $msg;
    }
    public static function delete($sheet,$row,$value) {
        self::$SQL = "DELETE FROM `$sheet` WHERE `$row` = '$value';";
        self::$result = self::db()->query(self::$SQL);
        return self::$result;
    } 
    public static function systemSurvey() {
        $newTicketsSQL = "select count(*) from week where class_master_state = 'false';";
        $newTicketsNumber = self::db()->query($newTicketsSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        $newMajorTicketsSQL = "select count(*) from week where class_master_state = 'false' and tickettype = 'major';";
        $newMajorTicketNumber = self::db()->query($newMajorTicketsSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        $weekTicketSQL = "select count(*) from week;";
        $weekTicketNumber =  self::db()->query($weekTicketSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        $weekMajorTicketsSQL = "select count(*) from week where tickettype = 'major';";
        $weekMajorTicketsNumber = self::db()->query($weekMajorTicketsSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        $ticketsSQL = "select count(*) from tickets;";
        $ticketsNumber = self::db()->query($ticketsSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        $majorTicketsSQL = "select count(*) from tickets where tickettype = 'major';";
        $majorTicketsNumber = self::db()->query($majorTicketsSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        $userNumberSQL = "select count(*) from user;";
        $userNumber = self::db()->query($userNumberSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        $classMasterNumberSQL = "select count(*) from user where branch = 'classmaster';";
        $classMasterNumber = self::db()->query($classMasterNumberSQL)->fetch_array( MYSQLI_ASSOC )['count(*)'];
        return [
            'newTicketsNumber' => $newTicketsNumber,
            'newMajorTicketNumber' => $newMajorTicketNumber,
            'weekTicketNumber' => $weekTicketNumber,
            'weekMajorTicketsNumber' => $weekMajorTicketsNumber,
            'ticketsNumber' => $ticketsNumber,
            'majorTicketsNumber' => $majorTicketsNumber,
            'userNumber' => $userNumber,
            'classMasterNumber' => $classMasterNumber,
        ];
    }
    private static function checkClass($class) {
        $check_class_sql = "SELECT * FROM class WHERE class = '$class';";
        $check_class_result = self::db()->query($check_class_sql)->num_rows;
        if($check_class_result < 1) {
            return true;
        } else {
            return false;
        }
    }
    private static function checkUser($class_master) {
        $check_class_master_sql = "SELECT * FROM user WHERE username = '$class_master';";
        $check_class_master_result = self::db()->query($check_class_master_sql)->num_rows;
        if($check_class_master_result < 1) {
            return false;
        } else {
            return true;
        }
    }
    private static function checkClassMaster($class_master) {
        $check_class_master_sql = "SELECT * FROM class WHERE class_master = '$class_master';";
        $check_class_master_result = self::db()->query($check_class_master_sql)->num_rows;
        if($check_class_master_result < 1) {
            return true;
        } else {
            return false;
        }
    }
    private static function getMasterClass($class_master) {
        $get_master_class_sql = "SELECT * FROM class WHERE class_master = '$class_master';";
        $get_master_class_result = self::db()->query($get_master_class_sql)->fetch_array(MYSQLI_ASSOC)['Class'];
        return $get_master_class_result;
    }
    private static function db() {
        return MySQL::connect();
    }
}
?>