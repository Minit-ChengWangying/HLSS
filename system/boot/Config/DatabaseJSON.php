<?php
namespace Boot\Config;

class DatabaseJSON {
    public static function run($Info) {
        return self::getLimitData($Info);
    }
    private static function getLimitData($Info) {
        $json_string = file_get_contents('../config.json');
        $data = json_decode($json_string, true);
        return $data['database'][$Info];
    }
}
?>