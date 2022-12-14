<?php
namespace Boot\Config;

class BlackList {
    static $Array;
    public static function run() {
        return self::list();
    }
    private static function list() {
        self::$Array = [
            '<',
            '>',
            '\'',
            '"',
            '台独',
        ];
        return self::$Array;
    }
}
?>