<?php
namespace Boot\Controller;

use Boot\Controller\Controller;
use Boot\View\AccountView;
use Boot\Config\BlackList;

class AccountController extends Controller {
    public function index() {
        self::run('account');
        $oldPassword = $_POST['pwd'];
        $newPassword = $_POST['npwd'];
        $accountInfo = self::Filter($oldPassword,$newPassword);
        AccountView::index($accountInfo);
    }
    private static function Filter($oldPassword,$newPassword) {
        $oldPassword = empty($oldPassword)?die(json_encode('Waring! NULL')):$oldPassword;
        $newPassword = empty($newPassword)?die(json_encode('Waring! NULL')):$newPassword;
        $pwdArray =  [
            'oldPassword' => $oldPassword,
            'newPassword' => $newPassword,
        ];
        return self::StrFilter($pwdArray);
    }
    private static function StrFilter($pwdArray) {
        $pwdArray['newPassword'] = str_replace(BlackList::run(), 'm', $pwdArray['newPassword']);
        $pwdArray['oldPassword'] = str_replace(BlackList::run(), 'm' , $pwdArray['oldPassword']);
        return $pwdArray;
    }
}
?>