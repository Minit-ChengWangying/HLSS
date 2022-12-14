<?php
namespace Boot\View;

use Boot\Model\AccountModel;

class AccountView {
    public static function index($accountInfo) {
        echo json_encode(AccountModel::index($accountInfo));
    }
}
?>