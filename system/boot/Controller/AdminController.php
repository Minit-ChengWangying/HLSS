<?php
namespace Boot\Controller;

use Boot\Controller\Controller;
use Boot\View\AdminView;

class AdminController extends Controller {
    public function index() {
        self::run('admin');
        AdminView::index();
    }
    public function tickets() {
        self::run('admin');
        AdminView::getTickets();
    }
}
?>