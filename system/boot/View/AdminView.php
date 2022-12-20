<?php
namespace Boot\View;

use Boot\Model\AdminModel;

class AdminView {
    public static function index() {
        var_dump(AdminModel::index());
    }
    public static function getTickets() {
        $row = mysqli_fetch_all(AdminModel::getTickets(), MYSQLI_ASSOC);
        echo json_encode(array("error"=>0, "data" => $row));
    }
}
?>