<?php
namespace User\config;

class DatabaseJSON {
    public static function get($Info) {
        $json_string = file_get_contents('../../config.json');
        $data = json_decode($json_string, true);
        return $data['database'][$Info];
    }
}
?>