<?php
namespace Boot\Controller;

// session_start();

use Boot\Controller\Controller;
use Boot\View\PoliticsView;

class PoliticsController extends Controller {
    protected $Action,$limitName;
    public function index() {
        self::run('politics');
    }
    public function ticket() {
        self::run('politics');
        sleep(1);   # 生产环境删去
        PoliticsView::get();
    }
    public function number() {
        self::run('politics');
        sleep(1);   # 生产环境删去
        PoliticsView::numberOfTicket();
    }
}

?>