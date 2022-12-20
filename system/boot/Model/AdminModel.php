<?php
namespace Boot\Model;

use Boot\Config\MySQL;

class AdminModel {
    static $SQL,$result;
    public static function index() {
        return 'admin->index()';
    }
    public static function getTickets() {
        self::$SQL = "SELECT * FROM tickets order by ID desc;";
        self::$result = self::db()->query(self::$SQL);
        return self::$result;
    }
    private static function db() {
        return MySQL::connect();
    }
}
?>